<?php
session_start();
include_once("../Models/AdminMessageSendbox_Class.php");
include_once("../DAL/AdminMessageSendboxService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];
$adminMessageSendboxService = new AdminMessageSendboxService();
$adminMessageSendbox = $adminMessageSendboxService->GetAdminMessageSendboxById($id);
$adminMessageSendbox->IsEnable = 0;

$result = $adminMessageSendboxService->ModifyAdminMessageSendboxIsEnable($adminMessageSendbox);

if($result){
	echo "<script type='text/javascript'>location.href='../Message/sendBox.php?page=".$page."';</script>";
}
?>