<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once("../DAL/MailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/ImapMailbox.php");

$mailInfoService = new MailInfoService();
$mailAttachmentService = new MailAttachmentService();
$imapMailbox = null;

$sessionId = file_get_contents($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/sessionId.txt");
if($sessionId != session_id()){
	echo "1";
	return;
}

try{
	if(Config::$mode=="local"){
		$mailServer = Config::$getMailServer_local;
		$mailUser = Config::$mailUser_local;
		$mailPassword = Config::$mailPassword_local;
	}else if(Config::$mode=="live"){
		$mailServer = Config::$getMailServer_live;
		$mailUser = Config::$mailUser_live;
		$mailPassword = Config::$mailPassword_live;
	}else{
		$mailServer = Config::$getMailServer_test;
		$mailUser = Config::$mailUser_test;
		$mailPassword = Config::$mailPassword_test;
	}
	$imapMailbox = new ImapMailbox(
		//"{mail.quick-teck.co.uk/novalidate-cert}INBOX",
		//"{imap.139.com/novalidate-cert}INBOX",
		//"gzjammy@139.com",
		//"ming000831sandy",
		"{".$mailServer."}INBOX",
		$mailUser,
		$mailPassword, 
		"Attachments"
	);
	
	$mailSearchDate = date("Y-m-d",strtotime("-1 day"));
	//$mailSearchDate = date("Y-m-d");
	$mailArray = $imapMailbox->searchMailbox("SINCE \"".$mailSearchDate."\"");

	$now = date("Y-m-d H:i:s");
	$logFileName = "getMailLog.txt";
	
	$log = "共需要处理".count($mailArray)."封邮件";
	Common::WriteLog($log, $logFileName);
	
	$echoString = $now." Receiving....<br>";
	$insertDBcount = 0;

	foreach($mailArray as $mailId) {
		//$mailId = "35984";	
		$mail = $imapMailbox->getMail($mailId);
		$mId = $mail->id;
		$subject = addslashes($mail->subject);
		$fromAddress = addslashes($mail->fromAddress);
		$fromName = addslashes($mail->fromName);
		$mailTime = $mail->date;
		$toArray = $mail->to;
		$toString = Common::GetMailString($mail->to);
		$ccString = Common::GetMailString($mail->cc);
		$replyToString = Common::GetMailString($mail->replyTo);
		$mailBodyHtml = $mail->textHtml;
		$mailBodyText = nl2br($mail->textPlain);
		$attachmentsArray = $mail->getAttachments();
		
		$tempMail = $mailInfoService->GetMailInfoBySubjectAndFromAddressAndMailId($subject, $fromAddress, $mId);
		if(!$tempMail){
			$mailInfo = new MailInfo();
			$mailInfo->MailId = $mId;
			$mailInfo->Subject = $subject;
			$mailInfo->FromAddress = $fromAddress;
			$mailInfo->FromName = $fromName;
			$mailInfo->MailTime = $mailTime;
			$mailInfo->ToString = $toString;
			$mailInfo->CcString = $ccString;
			$mailInfo->ReplyToString = $replyToString;
			$mailInfo->AttachmentsCount = 0;
			$mailInfo->MailStatus = 1;
			$mailInfo->IsRead = 0;
			$mailInfo->IsOrder = 0;
			$mailInfo->IsClose = 0;
			$mailInfo->AssignTime = null;
			$mailInfo->ReplyTime = null;
			$mailInfo->RatedVitalityTime = 0;
			$mailInfo->RealVitalityTime = 0;
			$mailInfo->IsNeedApproval = 0;
			$mailInfo->IntendantAdminId = null;
			$mailInfo->BusinessAdminId = null;
			$mailInfo->MailFlag = 1;
			$mailInfo->IsEnable = 1;
			$mailInfo->Remark = null;
			$result1 = $mailInfoService->AddMailInfo($mailInfo);
			
			if($result1){			
				foreach($attachmentsArray as $key => $fileInfo){
					$pathInfo = pathinfo($fileInfo->filePath);
					$mailAttachment = new MailAttachment();
					$mailAttachment->MailId = $result1;
					$mailAttachment->FileName = $fileInfo->name;
					$mailAttachment->FilePath = "Attachments/".$pathInfo['basename'];
					$mailAttachment->IsEnable = 1;
					
					if(strpos($mailBodyHtml,"cid:".$key)){
						$mailBodyHtml = str_replace("cid:".$key, "../".$mailAttachment->FilePath, $mailBodyHtml);
						$mailAttachment->FileType = "1";
					}else{
						$mailAttachment->FileType = "2";
						$mailInfo->AttachmentsCount = $mailInfo->AttachmentsCount + 1;
					}
					
					$result2 = $mailAttachmentService->AddMailAttachment($mailAttachment);
					if(!$result2){
						$log = "邮件".$mId."附件".$pathInfo['basename']."写入数据库失败";
						Common::WriteLog($log, $logFileName);
					}
				}
				$mailInfoService->ModifyMailInfoAttachmentsCount($result1, $mailInfo->AttachmentsCount);
				
				$fd1 = fopen($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/MailBody/".$result1."_Html.html", "a+");
				fputs($fd1, $mailBodyHtml);
				fclose($fd1);
				$fd2 = fopen($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/MailBody/".$result1."_Text.html", "a+");
				fputs($fd2, $mailBodyText);
				fclose($fd2);

				$insertDBcount = $insertDBcount + 1;
			}
			
			if(!$result1){
				$log = "邮件".$mId."(".$mail->subject.")写入数据库失败";
				Common::WriteLog($log, $logFileName);
			}
		}
	}
	$now = date("Y-m-d H:i:s");
	$echoString .= $now." Receiving completed. ".$insertDBcount." email(s) were received successfully.<br>";
	$log = "--------------------------处理完成，获取了".$insertDBcount."封邮件--------------------------\r\n\r\n";
	Common::WriteLog($log, $logFileName);
	echo $echoString;
}catch(Exception $e){
	Common::WriteLog($e, "mailError.txt");
}
?>