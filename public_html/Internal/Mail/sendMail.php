<?php
session_start();
ini_set("memory_limit","128M");
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/ReplyMailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/PHPMailer/class.phpmailer.php");

$sessionId = file_get_contents($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/sessionId.txt");
if($sessionId != session_id()){
  echo "1";
  return;
}

try{
  if(Config::$mode=="local"){
    $mailServer = Config::$sendMailServer_local;
    $mailUser = Config::$mailUser_local;
    $mailPassword = Config::$mailPassword_local;
  }else if(Config::$mode=="live"){
    $mailServer = Config::$sendMailServer_live;
    $mailUser = Config::$mailUser_live;
    $mailPassword = Config::$mailPassword_live;
  }else{
    $mailServer = Config::$sendMailServer_test;
    $mailUser = Config::$mailUser_test;
    $mailPassword = Config::$mailPassword_test;
  }
  
  $today = date("Y-m-d");
  $now = date("Y-m-d H:i:s");
  $logFileName = "sendMailLog.txt";
  $logString = $now . "&nbsp;&nbsp;";
  
  $replyMailInfoService = new ReplyMailInfoService();
  $replyMailAttachmentService = new ReplyMailAttachmentService();
  
  $replyMailArray = $replyMailInfoService->GetMailInfoByMailStatus(2);
  
  $log = count($replyMailArray)." email(s) need to be send out.";
  $logString .= $log . "<br>";
  Common::WriteLog($log, $logFileName);
  
  for($i=0; $i < count($replyMailArray); $i++){  
    $mail = new PHPMailer();
    $mail->IsSMTP();      // telling the class to use SMTP
    $mail->SMTPAuth=true;    // enable SMTP authentication
    $mail->Host=$mailServer;  // sets the SMTP server
    $mail->SMTPSecure="ssl";
    $mail->CharSet = "utf-8";
    $mail->Port=465;      // set the SMTP port for the GMAIL server
    $mail->SMTPDebug=0;
    $mail->Username=$mailUser;
    $mail->Password=$mailPassword;
    $mail->SetFrom($mailUser, '');
    $mail->AddReplyTo($mailUser,'');
    $mail->Subject=$replyMailArray[$i]->Subject;
    //$mail->AltBody    = "To view the message"; // optional, comment out and test
    $mailBody = file_get_contents($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/ReplyMailBody/".$replyMailArray[$i]->Id.".html");
    $mail->MsgHTML($mailBody);
    $toArray = explode(',', $replyMailArray[$i]->ToList);
    $bccArray = explode(',', $replyMailArray[$i]->BccList);
    $ccArray = explode(',', $replyMailArray[$i]->CcList);
    
    for($j=0; $j < count($toArray); $j++){
      $mail->AddAddress(trim($toArray[$j]));
    }
    for($k=0; $k < count($bccArray); $k++){
      $mail->AddBCC(trim($bccArray[$k]));
    }
    for($l=0; $l < count($ccArray); $l++){
      $mail->AddCC(trim($ccArray[$l]));
    }
    
    if ($replyMailArray[$i]->AttachmentsCount > 0){
      $replyMailAttachmentArray = $replyMailAttachmentService->GetReplyMailAttachmentByMailId($replyMailArray[$i]->Id);
      for($j=0; $j < count($replyMailAttachmentArray); $j++){
        $mail->AddAttachment($replyMailAttachmentArray[$j]->FilePath, $replyMailAttachmentArray[$j]->FileName);
      }
    }
    
    if($mail->Send()) {
      $replyMailInfoService->MySendMail($replyMailArray[$i]->Id);
    }else{
      $log = "邮件".$replyMailArray[$i]->Id."(".$replyMailArray[$i]->Subject.")发送失败";
      echo "<pre>";
      echo '发送error:' . $mail->ErrorInfo;
      echo "<br>mailServer={$mailServer}";
      echo "<br>mailUser={$mailUser}";
      echo "<br>mailPassword={$mailPassword}<br>";
      
      
      Common::WriteLog($log, $logFileName);
    }
   
    //var_dump('toArray=', $toArray);
   
    $log = "----------------------------";
    Common::WriteLog($log, $logFileName);
    unset($mail);
  }
  $now = date("Y-m-d H:i:s");
  $logString .= $now." Job done.<br>";
  $log = "--------------------------------------------------------\r\n\r\n";
  Common::WriteLog($log, $logFileName);
  echo $logString;
}catch(Exception $e){
  Common::WriteLog($e, "sendMailError.txt");
}
?>