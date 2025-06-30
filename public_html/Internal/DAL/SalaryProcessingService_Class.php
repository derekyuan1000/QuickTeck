<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once("../Models/SalaryProcessing_Class.php");
class SalaryProcessingService  {
	public function AddSalaryProcessing($salaryProcessing){	
		$dbHelper = new DbHelper();
		$columnsName = "`SalaryDate`,`SalaryAdminId`,`StatusId`,`TypeId`,`AdminId`,`ProcessTime`,`Remark`";
		$values = "'".$salaryProcessing->SalaryDate."','".$salaryProcessing->SalaryAdminId."','".$salaryProcessing->StatusId."','".$salaryProcessing->TypeId."',"
			."'".$salaryProcessing->AdminId."','".$salaryProcessing->ProcessTime."','".$salaryProcessing->Remark."'";
		return $dbHelper->Insert("SalaryProcessings", $columnsName, $values);
	}
	
	public function DeleteSalaryProcessingById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("SalaryProcessings", $condition);
	}
	
	public function ModifySalaryProcessing($salaryProcessing){
		$dbHelper = new DbHelper();
		$set = "`SalaryDate`='".$salaryProcessing->SalaryDate."',`SalaryAdminId`='".$salaryProcessing->SalaryAdminId."',`StatusId`='".$salaryProcessing->StatusId."',"
			."`TypeId`='".$salaryProcessing->TypeId."',`AdminId`='".$salaryProcessing->AdminId."',`ProcessTime`='".$salaryProcessing->ProcessTime."',"
			."`Remark`='".$salaryProcessing->Remark."'";
		$condition = "Id=".$salaryProcessing->Id;
		return $dbHelper->Update("SalaryProcessings", $set, $condition);
	}
	
	private function GetSalaryProcessingBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$salaryProcessing = new SalaryProcessing();
			$salaryProcessing->Id = $row["Id"];
			$salaryProcessing->SalaryDate = $row["SalaryDate"];
			$salaryProcessing->SalaryAdminId = $row["SalaryAdminId"];
			$salaryProcessing->StatusId = $row["StatusId"];
			$salaryProcessing->TypeId = $row["TypeId"];
			$salaryProcessing->AdminId = $row["AdminId"];
			$salaryProcessing->ProcessTime = $row["ProcessTime"];
			$salaryProcessing->Remark = $row["Remark"];
			return $salaryProcessing;
		}else{
			return null;	
		}
	}
	
	private function GetSalaryProcessingsArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$salaryProcessingArray = array();
		while($row = mysql_fetch_array($result)){
			$salaryProcessing = new SalaryProcessing();
			$salaryProcessing->Id = $row["Id"];
			$salaryProcessing->SalaryDate = $row["SalaryDate"];
			$salaryProcessing->SalaryAdminId = $row["SalaryAdminId"];
			$salaryProcessing->StatusId = $row["StatusId"];
			$salaryProcessing->TypeId = $row["TypeId"];
			$salaryProcessing->AdminId = $row["AdminId"];
			$salaryProcessing->ProcessTime = $row["ProcessTime"];
			$salaryProcessing->Remark = $row["Remark"];
			array_push($salaryProcessingArray, $salaryProcessing);
		}
		return $salaryProcessingArray;
	}
	
	public function GetSalaryProcessingById($id){
		$sql = 'SELECT * FROM SalaryProcessings WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetSalaryProcessingBySql($sql);
	}
	
	public function GetAllSalaryProcessingsByPage($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM SalaryProcessings WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM SalaryProcessings WHERE IsEnable = 1 ORDER BY UploadTime DESC LIMIT '.$begin.','.$pageSize;
		$salaryProcessingArray = $this->GetSalaryProcessingsArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$salaryProcessingArray);
		return $result;
	}
	
	public function GetSalaryProcessingsBySalaryAdminIdAndSalaryDate($salaryAdminId, $salaryDate, $typeId){
		$sql = 'SELECT * FROM SalaryProcessings WHERE SalaryDate = \''.$salaryDate.'\' AND SalaryAdminId = '.$salaryAdminId.' AND TypeId = '.$typeId.' ORDER BY Id';
		return $this->GetSalaryProcessingsArrayBySql($sql);
	}
	
	public function DeleteSalaryProcessingsBySalaryAdminIdAndMonth($salaryAdminId, $month){
		$dbHelper = new DbHelper();
		$condition = 'SalaryAdminId = '.$salaryAdminId.' AND SalaryDate = \''.$month.'\'';
		return $dbHelper->Delete("SalaryProcessings", $condition);
	}
}

?>