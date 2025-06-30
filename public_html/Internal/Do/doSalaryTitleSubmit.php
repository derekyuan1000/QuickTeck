<?php
session_start();
include_once("../DAL/SalaryTitleService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$salaryTitleService = new SalaryTitleService();
$salaryTitleCount = $_POST[salaryTitleCount];
for($i=0; $i < $salaryTitleCount; $i++)
{
	$id = $_POST[SalaryTitleId.$i];
	$pid = trim($_POST[txtSalaryTitlePid.$i]);
	$name = trim($_POST[txtSalaryTitleName.$i]);
	$category = trim($_POST[txtSalaryTitleCategory.$i]);
	$valueType = trim($_POST[txtSalaryTitleValueType.$i]);
	$sortId = trim($_POST[txtSalaryTitleSortId.$i]);
	
	if($id){
		$salaryTitle = $salaryTitleService->GetSalaryTitleById($id);
		if($name){
			if($salaryTitle->Name != $name || $salaryTitle->Pid != $pid || $salaryTitle->Category != $category 
				|| $salaryTitle->ValueType != $valueType|| $salaryTitle->SortId != $sortId){
				$salaryTitle->Pid = $pid;
				$salaryTitle->Name = $name;
				$salaryTitle->Category = $category;
				$salaryTitle->ValueType = $valueType;
				$salaryTitle->TypeLevel = $salaryTitle->Pid ? 2 : 1;
				$salaryTitle->SortId = $sortId ? $sortId : 0;
				$result = $salaryTitleService->ModifySalaryTitle($salaryTitle);
			}
		}else{
			$salaryTitle->IsEnable = 0;
			$result = $salaryTitleService->ModifySalaryTitle($salaryTitle);
		}
	}else{
		if($name){
			$salaryTitle = new SalaryTitle();
			$salaryTitle->Pid = $pid;
			$salaryTitle->Name = $name;
			$salaryTitle->Category = $category;
			$salaryTitle->ValueType = $valueType;
			$salaryTitle->TypeLevel = $salaryTitle->Pid ? 2 : 1;
			$salaryTitle->SortId = $sortId ? $sortId : 0;
			$salaryTitle->IsEnable = 1;
			$result = $salaryTitleService->AddSalaryTitle($salaryTitle);
		}
	}
}
//if($result){
//	echo "<script type='text/javascript'>location.href='../Admin/factoryList.php?page=".$page."';</script>";
//}
if($result){
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "Modify salary title successfully!";
}else{
	echo "<script type='text/javascript'>history.back();</script>";
}
?>