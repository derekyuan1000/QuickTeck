<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/SalaryTitle_Class.php");
class SalaryTitleService  {
	public function AddSalaryTitle($salaryTitle){	
		$dbHelper = new DbHelper();
		if(!$salaryTitle->Pid){
			$salaryTitle->Pid = "NULL";
		}
		$columnsName = "`Pid`,`Name`,`TypeLevel`,`Category`,`ValueType`,`SortId`,`IsEnable`,`Remark`";
		
		$values = $salaryTitle->Pid.",'".$salaryTitle->Name."','".$salaryTitle->TypeLevel."','".$salaryTitle->Category."',"
			."'".$salaryTitle->ValueType."','".$salaryTitle->SortId."','".$salaryTitle->IsEnable."','".$salaryTitle->Remark."'";
		
		return $dbHelper->Insert("SalaryTitles", $columnsName, $values);
	}
	
	public function DeleteSalaryTitleById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("SalaryTitles", $condition);
	}
	
	public function ModifySalaryTitle($salaryTitle){
		$dbHelper = new DbHelper();
		if(!$salaryTitle->Pid){
			$salaryTitle->Pid = "NULL";
		}
		
		$set = "`Pid`=".$salaryTitle->Pid.",`Name`='".$salaryTitle->Name."',`TypeLevel`='".$salaryTitle->TypeLevel."',"
			."`Category`='".$salaryTitle->Category."',`ValueType`='".$salaryTitle->ValueType."',`SortId`='".$salaryTitle->SortId."',"
			."`IsEnable`='".$salaryTitle->IsEnable."',`Remark`='".$salaryTitle->Remark."'";
		$condition = "Id=".$salaryTitle->Id;
		return $dbHelper->Update("SalaryTitles", $set, $condition);
	}
	
	private function GetSalaryTitleBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$salaryTitle = new SalaryTitle();
			$salaryTitle->Id = $row["Id"];
			$salaryTitle->Pid = $row["Pid"];
			$salaryTitle->Name = $row["Name"];
			$salaryTitle->TypeLevel = $row["TypeLevel"];
			$salaryTitle->Category = $row["Category"];
			$salaryTitle->ValueType = $row["ValueType"];
			$salaryTitle->SortId = $row["SortId"];
			$salaryTitle->IsEnable = $row["IsEnable"];
			$salaryTitle->Remark = $row["Remark"];
			return $salaryTitle;
		}else{
			return null;	
		}
	}
	
	private function GetSalaryTitlesArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$salaryTitleArray = array();
		while($row = mysql_fetch_array($result)){
			$salaryTitle = new SalaryTitle();
			$salaryTitle->Id = $row["Id"];
			$salaryTitle->Pid = $row["Pid"];
			$salaryTitle->Name = $row["Name"];
			$salaryTitle->TypeLevel = $row["TypeLevel"];
			$salaryTitle->Category = $row["Category"];
			$salaryTitle->ValueType = $row["ValueType"];
			$salaryTitle->SortId = $row["SortId"];
			$salaryTitle->IsEnable = $row["IsEnable"];
			$salaryTitle->Remark = $row["Remark"];
			array_push($salaryTitleArray, $salaryTitle);
		}
		return $salaryTitleArray;
	}
	
	private function GetSalaryTitlesArrayBySql2($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$salaryTitleArray = array();
		while($row = mysql_fetch_array($result)){
			$salaryTitle = new SalaryTitle();
			$salaryTitle->Id = $row["Id"];
			$salaryTitle->Pid = $row["Pid"];
			$salaryTitle->Name = $row["Name"];
			$salaryTitle->TypeLevel = $row["TypeLevel"];
			$salaryTitle->Category = $row["Category"];
			$salaryTitle->ValueType = $row["ValueType"];
			$salaryTitle->SortId = $row["SortId"];
			$salaryTitle->IsEnable = $row["IsEnable"];
			$salaryTitle->Remark = $row["Remark"];
			$salaryTitleArray[$salaryTitle->Id] = $salaryTitle;
		}
		return $salaryTitleArray;
	}
	
	public function GetAllFirstLevelSalaryTitles(){
		$sql = 'SELECT * FROM SalaryTitles WHERE IsEnable = 1 AND Pid is null ORDER BY SortId';
		return $this->GetSalaryTitlesArrayBySql($sql);
	}
	
	public function GetSecondLevelSalaryTitles($pid){
		$sql = 'SELECT * FROM SalaryTitles WHERE IsEnable = 1 AND Pid = '.$pid.' ORDER BY SortId';
		return $this->GetSalaryTitlesArrayBySql($sql);
	}
	
	public function GetSalaryTitleById($id){
		$sql = 'SELECT * FROM SalaryTitles WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetSalaryTitleBySql($sql);
	}
	
	public function GetAllSalaryTitles(){
		$salaryTitleArray = array();
		$firstLevelSalaryTitleArray = $this->GetAllFirstLevelSalaryTitles();
		for($i=0; $i < count($firstLevelSalaryTitleArray); $i++)
		{
			array_push($salaryTitleArray,$firstLevelSalaryTitleArray[$i]);
			$secondLevelSalaryTitleArray = $this->GetSecondLevelSalaryTitles($firstLevelSalaryTitleArray[$i]->Id);
			for($j=0; $j < count($secondLevelSalaryTitleArray); $j++)
			{
				array_push($salaryTitleArray,$secondLevelSalaryTitleArray[$j]);
			}
		}
		return $salaryTitleArray;
	}
	
	public function GetAllSalaryTitles2(){
		$sql = 'SELECT * FROM SalaryTitles WHERE IsEnable = 1 ORDER BY SortId';
		return $this->GetSalaryTitlesArrayBySql2($sql);
	}
	
	public function GetSalaryTitlesByTypeId($typeId){
		if($typeId){
			$sql = 'SELECT * FROM SalaryTitles WHERE TypeId = '.$typeId.' AND IsEnable = 1 ORDER BY SortId';
		}else{
			$sql = 'SELECT * FROM SalaryTitles WHERE TypeId IS NULL AND IsEnable = 1 ORDER BY SortId';
		}
		return $this->GetSalaryTitlesArrayBySql($sql);
	}
	
	public function GetSalaryTitlesByStrTypeIds($strTypeIds){
		if($strTypeIds){
			$sql = 'SELECT * FROM SalaryTitles WHERE (TypeId in ('.$strTypeIds.') or TypeId IS NULL) AND IsEnable = 1 ORDER BY TypeId, SortId';
		}else{
			$sql = 'SELECT * FROM SalaryTitles WHERE TypeId IS NULL AND IsEnable = 1 ORDER BY SortId';
		}
		return $this->GetSalaryTitlesArrayBySql($sql);
	}
	
	public function GetSalaryTitlesByStrTypeIds2($strTypeIds){
		if($strTypeIds){
			$sql = 'SELECT * FROM SalaryTitles WHERE (TypeId in ('.$strTypeIds.') or TypeId IS NULL) AND IsEnable = 1 ORDER BY TypeId, SortId';
		}else{
			$sql = 'SELECT * FROM SalaryTitles WHERE TypeId IS NULL AND IsEnable = 1 ORDER BY SortId';
		}
		return $this->GetSalaryTitlesArrayBySql2($sql);
	}
	
	public function GetShowOnClientSalaryTitlesByStrTypeIds($strTypeIds){
		if($strTypeIds){
			$sql = 'SELECT * FROM SalaryTitles WHERE (TypeId in ('.$strTypeIds.') or TypeId IS NULL) AND IsEnable = 1 AND IsShowOnClient = 1 ORDER BY TypeId, SortId';
		}else{
			$sql = 'SELECT * FROM SalaryTitles WHERE TypeId IS NULL AND IsEnable = 1 AND IsShowOnClient = 1 ORDER BY SortId';
		}
		return $this->GetSalaryTitlesArrayBySql($sql);
	}
}
?>