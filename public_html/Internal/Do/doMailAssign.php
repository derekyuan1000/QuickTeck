<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_POST[id];
$page = $_POST[page];

$isOrder = trim($_POST[isOrder]);
$isClose = trim($_POST[isClose]);
$isNeedApproval = trim($_POST[isNeedApproval]);
$ratedVitalityTime = trim($_POST[ratedVitalityTime]);
$businessAdminId = trim($_POST[businessAdminId]);

$mailInfoService = new MailInfoService();
$mailInfo = $mailInfoService->GetMailInfoById($id);
$mailInfo->Subject = addslashes($mailInfo->Subject);
$mailInfo->FromAddress = addslashes($mailInfo->FromAddress);
$mailInfo->FromName = addslashes($mailInfo->FromName);
$mailInfo->ToString = addslashes($mailInfo->ToString);
$mailInfo->CcString = addslashes($mailInfo->CcString);
$mailInfo->BccString = addslashes($mailInfo->BccString);
$mailInfo->ReplyToString = addslashes($mailInfo->ReplyToString);
if($mailInfo->BusinessAdminId != $businessAdminId){
	$now = date("Y-m-d H:i:s");
	$mailInfo->BusinessAdminId = $businessAdminId;
	$mailInfo->AssignTime = $now;
	$mailInfo->MailStatus = 2;
	$mailInfo->RealVitalityTime = 0;
}
$mailInfo->IsOrder = $isOrder;
$mailInfo->IsClose = $isClose;
$mailInfo->IsNeedApproval = $isNeedApproval;
$mailInfo->RatedVitalityTime = $ratedVitalityTime;
$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
$mailInfo->IntendantAdminId = $currentAdmin->Id;
$result = $mailInfoService->ModifyMailInfo($mailInfo);
//if($result){
//	echo "<script type='text/javascript'>location.href='../Admin/mailInfoList.php?page=".$page."';</script>";
//}
if($result){
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "<span style='color:blue;'>Save successfully!</span>";
}
?>