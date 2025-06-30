<?php
session_start();
include_once("../DAL/SalaryValueService_Class.php");
include_once("../DAL/SalaryProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}
$salaryValueService = new SalaryValueService();
$salaryValueCount = $_POST[salaryValueCount];
$salaryMonth = $_POST[salaryMonth];
$salaryAdminId = $_POST[salaryAdminId];

$jihuaneiTotal = 0;
$jihuawaiTotal = 0;
$kougongTotal = 0;

$salaryStatusInDBArray = $salaryValueService->GetSalaryValueByAdminIdAndMonth($salaryAdminId,$salaryMonth);

for($i=0; $i < $salaryValueCount; $i++)
{
	$titleId = $_POST[titleId.$i];
	$titleValueType = $_POST[titleValueType.$i];
	$valueId = trim($_POST[valueId.$i]);
	$txtValue = trim($_POST[txtValue.$i]);
	$titleCategory = $_POST[titleCategory.$i];
	if($titleCategory==2){
		$jihuaneiTotal += $txtValue;	
	}
	/*if($titleCategory==3){
		$jihuawaiTotal += $txtValue;	
	}*/
	if($titleCategory==4){
		$kougongTotal += $txtValue;	
	}
	
	if($valueId){
		//$salaryValue = $salaryValueService->GetSalaryValueById($valueId);
		$salaryValue = $salaryStatusInDBArray[$titleId];
		if($titleValueType == 1){
			$salaryValue->SalaryDoubleValue = $txtValue;
		}else if($titleValueType == 2 || $titleValueType == 3){
			$salaryValue->SalaryVarcharValue = $txtValue;
		}
		$result = $salaryValueService->ModifySalaryValue($salaryValue);
	}else{
		$salaryValue = new SalaryValue();
		$salaryValue->SalaryTitleId = $titleId;
		$salaryValue->AdminId = $salaryAdminId;
		$salaryValue->SalaryDate = $salaryMonth;
		if($titleValueType == 1){
			$salaryValue->SalaryDoubleValue = $txtValue;
		}else if($titleValueType == 2 || $titleValueType == 3){
			$salaryValue->SalaryVarcharValue = $txtValue;
		}
		$salaryValue->IsDefault = 0;
		$salaryValue->IsEnable = 1;
		$result = $salaryValueService->AddSalaryValue($salaryValue);
	}
}

$salaryStatusInDBArray = $salaryValueService->GetSalaryValueByAdminIdAndMonth($salaryAdminId,$salaryMonth);
$salaryStatusInDB = $salaryStatusInDBArray[27];
$jihuaneiTotalInDB = $salaryStatusInDBArray[11];
$jiaotongbuzuInDB = $salaryStatusInDBArray[14];
$wucanbuzuInDB = $salaryStatusInDBArray[16];
$jihuawaiTotalInDB = $salaryStatusInDBArray[18];
$kougongTotalInDB = $salaryStatusInDBArray[23];
$zuidiInDB = $salaryStatusInDBArray[5];
$yingfaInDB = $salaryStatusInDBArray[24];
$hkCountInDB = $salaryStatusInDBArray[13];
$wucanCountInDB = $salaryStatusInDBArray[15];
$jiangjinInDB = $salaryStatusInDBArray[17];
$wuxianerjinInDB = $salaryStatusInDBArray[29];
$yebanbuzuInDB = $salaryStatusInDBArray[7];
$gangweijintieInDB = $salaryStatusInDBArray[33];
$gonglinggongziInDB = $salaryStatusInDBArray[32];

$salaryStatus = $_POST[salaryStatus];
$now = date("Y-m-d H:i:s");
$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$salaryProcessing = new SalaryProcessing();
$salaryProcessingService = new SalaryProcessingService();
$salaryProcessing->SalaryDate = $salaryMonth;
$salaryProcessing->SalaryAdminId = $salaryAdminId;
$salaryProcessing->TypeId = 1;
$salaryProcessing->AdminId = $currentAdmin->Id;
$salaryProcessing->ProcessTime = $now;
if($salaryStatus){
	if($salaryStatusInDB->SalaryVarcharValue != $salaryStatus){
		$salaryStatusInDB->SalaryVarcharValue = $salaryStatus;
		$result = $salaryValueService->ModifySalaryValue($salaryStatusInDB);
		
		$salaryProcessing->StatusId = $salaryStatus;
		$salaryProcessingService->AddSalaryProcessing($salaryProcessing);
	}
}else{
	$salaryStatusInDB->SalaryVarcharValue = "1";
	$result = $salaryValueService->ModifySalaryValue($salaryStatusInDB);
	$salaryProcessing->StatusId = 1;
	$salaryProcessingService->AddSalaryProcessing($salaryProcessing);
}

$jiaotongbuzu = $hkCountInDB->SalaryDoubleValue*250;
$jihuawaiTotal += $hkCountInDB->SalaryDoubleValue*250;

$wucanbuzu = $wucanCountInDB->SalaryDoubleValue*40;
$jihuawaiTotal += $wucanCountInDB->SalaryDoubleValue*40;

$jihuawaiTotal += $yebanbuzuInDB->SalaryDoubleValue;

$jihuawaiTotal += $jiangjinInDB->SalaryDoubleValue;

$jihuawaiTotal += $gangweijintieInDB->SalaryDoubleValue;

$jihuawaiTotal += $gonglinggongziInDB->SalaryDoubleValue;

if($jihuaneiTotalInDB->SalaryDoubleValue != $jihuaneiTotal){
	$jihuaneiTotalInDB->SalaryDoubleValue = $jihuaneiTotal;
	$result = $salaryValueService->ModifySalaryValue($jihuaneiTotalInDB);
}

if($jiaotongbuzuInDB->SalaryDoubleValue != $jiaotongbuzu){
	$jiaotongbuzuInDB->SalaryDoubleValue = $jiaotongbuzu;
	$result = $salaryValueService->ModifySalaryValue($jiaotongbuzuInDB);
}

if($wucanbuzuInDB->SalaryDoubleValue != $wucanbuzu){
	$wucanbuzuInDB->SalaryDoubleValue = $wucanbuzu;
	$result = $salaryValueService->ModifySalaryValue($wucanbuzuInDB);
}

if($jihuawaiTotalInDB->SalaryDoubleValue != $jihuawaiTotal){
	$jihuawaiTotalInDB->SalaryDoubleValue = $jihuawaiTotal;
	$result = $salaryValueService->ModifySalaryValue($jihuawaiTotalInDB);
}

if($kougongTotalInDB->SalaryDoubleValue != $kougongTotal){
	$kougongTotalInDB->SalaryDoubleValue = $kougongTotal;
	$result = $salaryValueService->ModifySalaryValue($kougongTotalInDB);
}

if($zuidiInDB->SalaryDoubleValue > $jihuaneiTotal){
	$yingfa = $zuidiInDB->SalaryDoubleValue + $jihuawaiTotal - $kougongTotal + $wuxianerjinInDB->SalaryDoubleValue;
}else{
	$yingfa = $jihuaneiTotal + $jihuawaiTotal - $kougongTotal + $wuxianerjinInDB->SalaryDoubleValue;
}

if($yingfaInDB->SalaryDoubleValue != $yingfa){
	$yingfaInDB->SalaryDoubleValue = $yingfa;
	$result = $salaryValueService->ModifySalaryValue($yingfaInDB);
}

if($_POST[hiddenSubmitType] == "Insert"){
	if($result){
		echo "<script type='text/javascript'>location.href='../Salary/salaryInsert.php?type=link&month=".$salaryMonth."';</script>";
		$_SESSION[message] = "Insert salary successfully!";
	}else{
		echo "<script type='text/javascript'>location.href='../Salary/salaryInsert.php?type=link&month=".$salaryMonth."';</script>";
	}
}else{
	if($result){
		echo "<script type='text/javascript'>history.back();</script>";
		$_SESSION[message] = "Modify salary successfully!";
	}else{
		echo "<script type='text/javascript'>history.back();</script>";
	}
}
?>