<?php
session_start();
include_once("../DAL/SalaryValueService_Class.php");
include_once("../DAL/SalaryProcessingService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$adminId = $_GET[adminId];
$month = $_GET[month];

$salaryValueService = new SalaryValueService();
$result1 = $salaryValueService->DeleteSalaryValueByAdminIdAndMonth($adminId,$month);

$salaryProcessingService = new SalaryProcessingService();
$result2 = $salaryProcessingService->DeleteSalaryProcessingsBySalaryAdminIdAndMonth($adminId,$month);

if($result1 && $result2){
	echo "<script type='text/javascript'>location.href='../Salary/salaryList.php?type=link&month=".$month."';</script>";
}
?>