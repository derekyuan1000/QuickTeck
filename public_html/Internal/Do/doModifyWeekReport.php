<?php
session_start();
include_once("../DAL/WeeklyReportService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$id = $_POST[id];
$page = $_POST[page];

$weeklyReportService = new WeeklyReportService();
$weeklyReport = $weeklyReportService->GetWeeklyReportById($id);

if(!is_null($_POST[content])){
	$content = trim($_POST[content]);
}else{
	$content = addslashes($weeklyReport->ReportContent);
}

if(!is_null($_POST[approveContent])){
	$approveContent = trim($_POST[approveContent]);
}else{
	$approveContent = addslashes($weeklyReport->ApprovedContent);
}

if(!is_null($_POST[date])){
	$reportDate = trim($_POST[date]);
}else{
	$reportDate = addslashes($weeklyReport->ReportTime);
}

if(!is_null($_POST[orderCount])){
	$orderCount = trim($_POST[orderCount]);
	$weeklyReport->OrderCount = $orderCount;
}

if(!is_null($_POST[emailCount])){
	$emailCount = trim($_POST[emailCount]);
	$weeklyReport->EmailCount = $emailCount;
}

$status = trim($_POST[isSubmit]);

$weeklyReport->ReportContent = $content;
$weeklyReport->ApprovedContent = $approveContent;
$weeklyReport->ReportTime = $reportDate;

$now = date("Y-m-d H:i:s");
if($status == 1 || $status == 2){
	$weeklyReport->WriteReportTime = $now;
}

if($status == 3 || $status == 4){
	$weeklyReport->ApprovedTime = $now;
}

$weeklyReport->StatusId = $status;
$result = $weeklyReportService->ModifyWeeklyReport($weeklyReport);
//if($result){
//	echo "<script type='text/javascript'>location.href='../Admin/factoryList.php?page=".$page."';</script>";
//}
if($result){
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "<span style='color:blue;'>Modify weekly report successfully!</span>";
}
?>