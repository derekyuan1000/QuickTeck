<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/ReplyMailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_POST[id];
$page = $_POST[page];
$subject = $_POST[subject];
$to = $_POST[to];
$cc = $_POST[cc];
$bcc = $_POST[bcc];
$mailBody = $_POST[mailBody];
$replyMailId = $_POST[replyMailId];

$mailInfoService = new MailInfoService();
$replyMailInfoService = new ReplyMailInfoService();
$replyMailAttachmentService = new ReplyMailAttachmentService();

$mailInfo = $mailInfoService->GetMailInfoById($id);

$mailInfo->Subject = addslashes($mailInfo->Subject);
$mailInfo->FromAddress = addslashes($mailInfo->FromAddress);
$mailInfo->FromName = addslashes($mailInfo->FromName);
$mailInfo->ToString = addslashes($mailInfo->ToString);
$mailInfo->CcString = addslashes($mailInfo->CcString);
$mailInfo->BccString = addslashes($mailInfo->BccString);
$mailInfo->MailBody = addslashes($mailInfo->MailBody);

if($mailInfo->IsNeedApproval == 1){
	$replyMailStatus = 1;
}else{
	$replyMailStatus = 2;
}

$now = date("Y-m-d H:i:s");
$mailInfo->ReplyTime = $now;
$mailInfo->MailStatus = 3;

$assignTime = strtotime($mailInfo->AssignTime);
$nowTime = time();

$diff = ceil(($nowTime - $assignTime)/60);
$mailInfo->RealVitalityTime = $diff;

$result1 = $mailInfoService->ModifyMailInfo($mailInfo);

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$replyMailAttachmentArray = $replyMailAttachmentService->GetReplyMailAttachmentByMailId($replyMailId);
$AttachmentsCount = count($replyMailAttachmentArray);

$replyMailInfo = $replyMailInfoService->GetReplyMailInfoById($replyMailId);
$replyMailInfo->Subject = $subject;
$replyMailInfo->ToList = $to;
$replyMailInfo->CcList = $cc;
$replyMailInfo->BccList = $bcc;
$replyMailInfo->AttachmentsCount = $AttachmentsCount;
$replyMailInfo->MailStatus = $replyMailStatus;
$replyMailInfo->ReplyTime = $now;
$replyMailInfo->IsNeedApproval = $mailInfo->IsNeedApproval;

$fd = fopen($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/ReplyMailBody/".$replyMailId.".html", "w+");
fputs($fd, stripslashes($mailBody));
fclose($fd);

$result2 = $replyMailInfoService->ModifyReplyMailInfo($replyMailInfo);

//if($result){
//	echo "<script type='text/javascript'>location.href='../Admin/mailInfoList.php?page=".$page."';</script>";
//}

if($result1 && $result2){
	$_SESSION[message] = "<span style='color:blue;'>Mail send successfully!</span>";
	echo "<script type='text/javascript'>location.href='../Mail/sendMailSuccess.php';</script>";
}
?>