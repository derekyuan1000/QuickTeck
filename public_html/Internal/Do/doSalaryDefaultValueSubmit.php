<?php
session_start();
include_once("../DAL/SalaryValueService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$salaryValueService = new SalaryValueService();
$salaryDefaultValueCount = $_POST[salaryDefaultValueCount];
for($i=0; $i < $salaryDefaultValueCount; $i++)
{
	$id = $_POST[salaryValueId.$i];
	$adminId = $_POST[adminId.$i];
	$titleId = $_POST[titleId.$i];
	$doubleValue = trim($_POST[txtDoubleValue.$i]);
	$varcharValue = trim($_POST[txtVarcharValue.$i]);
	
	if($id){
		$salaryValue = $salaryValueService->GetSalaryValueById($id);
		//if($doubleValue || $varcharValue){
			if($salaryValue->SalaryTitleId != $titleId || $salaryValue->AdminId != $adminId || $salaryValue->SalaryDoubleValue != $doubleValue 
					|| $salaryValue->SalaryVarcharValue != $varcharValue){
				$salaryValue->SalaryTitleId = $titleId;
				$salaryValue->AdminId = $adminId;
				$salaryValue->SalaryDoubleValue = $doubleValue;
				$salaryValue->SalaryVarcharValue = $varcharValue;
				$result = $salaryValueService->ModifySalaryValue($salaryValue);
			}
		//}else{
			//$salaryValue->IsEnable = 0;
			//$result = $salaryValueService->ModifySalaryValue($salaryValue);
		//}
	}else{
		//if($doubleValue || $varcharValue){
			$salaryValue = new SalaryValue();
			$salaryValue->SalaryTitleId = $titleId;
			$salaryValue->AdminId = $adminId;
			$salaryValue->SalaryDoubleValue = $doubleValue;
			$salaryValue->SalaryVarcharValue = $varcharValue;
			$salaryValue->IsDefault = 1;
			$salaryValue->IsEnable = 1;
			$result = $salaryValueService->AddSalaryValue($salaryValue);
		//}
	}
}
//if($result){
//	echo "<script type='text/javascript'>location.href='../Admin/factoryList.php?page=".$page."';</script>";
//}
if($result){
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "Modify type successfully!";
}else{
	echo "<script type='text/javascript'>history.back();</script>";
}
?>