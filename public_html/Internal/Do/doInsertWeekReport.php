<?php
session_start();
include_once("../DAL/WeeklyReportService_Class.php");
include_once("../DAL/WeeklyReportCCAdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$adminService = new AdminService();
$weeklyReportService = new WeeklyReportService();
$weeklyReportCCAdminService = new WeeklyReportCCAdminService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$reportDate = trim($_POST[date]);
$content = trim($_POST[content]);
$isSubmit = trim($_POST[isSubmit]);
$reportTo = $_POST[reportTo];
$orderCount = $_POST[orderCount];
$emailCount = $_POST[emailCount];
$status = $isSubmit== 2 ? 2 : 1;
$now = date("Y-m-d H:i:s");

$weeklyReport = new WeeklyReport(0, $content, null, $reportDate, $now, null, $currentAdmin->Id, $reportTo, $orderCount, $emailCount, $status, 1);
$result1 = $weeklyReportService->AddWeeklyReport($weeklyReport);

if($_POST['CCAdmin']){
	foreach ($_POST['CCAdmin'] as $item)
	{
		$weeklyReportCCAdmin = new WeeklyReportCCAdmin(0, $result1, $item, 1);
		$result2 = $weeklyReportCCAdminService->AddWeeklyReportCCAdmin($weeklyReportCCAdmin);
	}
}

if($result1){
	//echo "<script type='text/javascript'>location.href='../Admin/adminList.php?page=".$page."';</script>";
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "<span style='color:blue;'>Add weekly report successfully!</span>";
}
?>