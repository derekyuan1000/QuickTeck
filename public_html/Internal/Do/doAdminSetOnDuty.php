<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_POST[id];
$isOnDuty = $_POST[isOnDuty];
$adminService = new AdminService();
$admin = $adminService->GetAdminById($id);
$admin->IsOnDuty = $isOnDuty;
$result = $adminService->ModifyAdminIsOnDuty($admin);
if($result){
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message3] = "<span style='color:blue;'>Set on duty successfully!</span>";
}
?>