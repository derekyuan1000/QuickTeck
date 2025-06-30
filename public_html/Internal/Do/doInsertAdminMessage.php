<?php
session_start();
include_once("../Models/AdminMessageInbox_Class.php");
include_once("../Models/AdminMessageSendbox_Class.php");
include_once("../DAL/AdminMessageInboxService_Class.php");
include_once("../DAL/AdminMessageSendboxService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$adminService = new AdminService();
$admin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$title = "";
$content = trim($_POST[content]);
$status = 0;
$now = date("Y-m-d H:i:s");

$adminMessageInboxService = new AdminMessageInboxService();
$adminMessageSendboxService = new AdminMessageSendboxService();
$adminIds = "";
foreach ($_POST['receiveAdmin'] as $item)
{
	$adminMessageInbox = new AdminMessageInbox(0, $item, $title, $content, $status, $admin->Id, $now, 1);
	$result1 .= $adminMessageInboxService->AddAdminMessageInbox($adminMessageInbox);
	$adminIds .= $item.",";
}
$a= strlen($adminIds);
if(strlen($adminIds)>0){
	$adminIds = substr_replace($adminIds,"",strlen($adminIds)-1,1);
}
$adminMessageSendbox = new AdminMessageSendbox(0, $adminIds, $title, $content, $admin->Id, $now, 1);
$result2 = $adminMessageSendboxService->AddAdminMessageSendbox($adminMessageSendbox);

if($result1 && $result2){
	//echo "<script type='text/javascript'>location.href='../Admin/adminList.php?page=".$page."';</script>";
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "<span style='color:blue;'>Send message successfully!</span>";
}
?>