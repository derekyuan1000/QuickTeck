<?php
session_start();
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

$now = date("Y-m-d H:i:s");

$replyMailInfoService = new ReplyMailInfoService();
$replyMailAttachmentService = new ReplyMailAttachmentService();

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$replyMailAttachmentArray = $replyMailAttachmentService->GetReplyMailAttachmentByMailId($id);
$AttachmentsCount = count($replyMailAttachmentArray);

$replyMailInfo = $replyMailInfoService->GetReplyMailInfoById($id);
$replyMailInfo->Subject = $subject;
$replyMailInfo->ToList = $to;
$replyMailInfo->CcList = $cc;
$replyMailInfo->BccList = $bcc;
$replyMailInfo->AttachmentsCount = $AttachmentsCount;
$replyMailInfo->IntendantAdminId = $currentAdmin->Id;
$replyMailInfo->ApprovalTime = $now;
$replyMailInfo->MailStatus = 2;

$fd = fopen($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/ReplyMailBody/".$id.".html", "w+");
fputs($fd, stripslashes($mailBody));
fclose($fd);

$result = $replyMailInfoService->ModifyReplyMailInfo($replyMailInfo);
//if($result){
//	echo "<script type='text/javascript'>location.href='../Admin/mailInfoList.php?page=".$page."';</script>";
//}
if($result){
	$_SESSION[message] = "<span style='color:blue;'>Mail approve successfully!</span>";
	echo "<script type='text/javascript'>location.href='../Mail/sendMailSuccess.php';</script>";
}
?>