<?php
session_start();
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/ReplyMailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}

$id = $_POST[id];
$replyMailInfoService = new ReplyMailInfoService();
$replyMailAttachmentService = new ReplyMailAttachmentService();
$result = $replyMailInfoService->MyReSendMail($id);

if($result){
	$_SESSION[message] = "<span style='color:blue;'>Mail resend successfully!</span>";
	echo "<script type='text/javascript'>location.href='../Mail/sendMailSuccess.php';</script>";
}
?>