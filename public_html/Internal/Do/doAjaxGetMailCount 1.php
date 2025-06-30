<?php

session_start();

include_once("../DAL/MailInfoService_Class.php");

include_once("../DAL/ReplyMailInfoService_Class.php");

if(empty($_SESSION[currentAdmin])){

	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";

	return;

}

$type = $_POST[type];



$adminId = $_POST[adminId];



$mailInfoService = new MailInfoService();

$replyMailInfoService = new ReplyMailInfoService();

if($type == 1){

	$needAssignMailInfoArray = $mailInfoService->GetMailInfoByMailStatus(1);

	echo count($needAssignMailInfoArray);

}else if($type == 2){

	$needReplyMailInfoArray = $mailInfoService->GetMailInfoByMailStatusAndBusinessAdminId(2, $adminId);

	echo count($needReplyMailInfoArray);

}else if($type == 3){

	$needApproveMailArray = $replyMailInfoService->GetMailInfoByMailStatus(1);

	echo count($needApproveMailArray);

}

?>