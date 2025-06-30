<?php
session_start();
include_once("../DAL/WeeklyReportService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];
$weeklyReportService = new WeeklyReportService();
$weeklyReport = $weeklyReportService->GetWeeklyReportById($id);
$weeklyReport->IsEnable = 0;
$weeklyReport->ReportContent = addslashes($weeklyReport->ReportContent);
$result = $weeklyReportService->ModifyWeeklyReport($weeklyReport);
if($result){
	//echo "<script type='text/javascript'>location.href='../WeeklyReport/weekReportList.php?page=".$page."';</script>";
	echo "<script type='text/javascript'>history.back();</script>";
}
?>