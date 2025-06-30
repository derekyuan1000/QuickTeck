<?php
session_start();
include_once("../Models/AdminMessageInbox_Class.php");
include_once("../DAL/AdminMessageInboxService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];
$adminMessageInboxService = new AdminMessageInboxService();
$adminMessageInbox = $adminMessageInboxService->GetAdminMessageInboxById($id);
$adminMessageInbox->IsEnable = 0;

$result = $adminMessageInboxService->ModifyAdminMessageInboxIsEnable($adminMessageInbox);

if($result){
	echo "<script type='text/javascript'>location.href='../Message/inBox.php?page=".$page."';</script>";
}
?>