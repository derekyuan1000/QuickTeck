<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once("../DAL/AdminMessageInboxService_Class.php");
if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
//$type = $_POST[type];
$adminId = $_POST[adminId];
$adminMessageInboxService = new AdminMessageInboxService();
//if($type == 1){
	$unReadAdminMessageInboxArray = $adminMessageInboxService->GetUnreadAdminMessageInboxByReceiveAdminId($adminId);
	echo count($unReadAdminMessageInboxArray);
//}
?>