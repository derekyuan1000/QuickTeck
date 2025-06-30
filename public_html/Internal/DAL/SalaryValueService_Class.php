<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/SalaryValue_Class.php");
class SalaryValueService  {
	public function AddSalaryValue($salaryValue){	
		$dbHelper = new DbHelper();
		$columnsName = "`SalaryTitleId`,`AdminId`,`SalaryDoubleValue`,`SalaryVarcharValue`,`SalaryDate`,`IsDefault`,`IsEnable`,`Remark`";
		
		$values = "'".$salaryValue->SalaryTitleId."','".$salaryValue->AdminId."','".$salaryValue->SalaryDoubleValue."','".$salaryValue->SalaryVarcharValue."',"
			."'".$salaryValue->SalaryDate."','".$salaryValue->IsDefault."','".$salaryValue->IsEnable."','".$salaryValue->Remark."'";
		return $dbHelper->Insert("SalaryValues", $columnsName, $values);
	}
	
	public function DeleteSalaryValueById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("SalaryValues", $condition);
	}
	
	public function ModifySalaryValue($salaryValue){
		$dbHelper = new DbHelper();
		$set = "`SalaryTitleId`='".$salaryValue->SalaryTitleId."',`AdminId`='".$salaryValue->AdminId."',`SalaryDoubleValue`='".$salaryValue->SalaryDoubleValue."',"
			."`SalaryVarcharValue`='".$salaryValue->SalaryVarcharValue."',`SalaryDate`='".$salaryValue->SalaryDate."',`IsDefault`='".$salaryValue->IsDefault."',"
			."`IsEnable`='".$salaryValue->IsEnable."',`Remark`='".$salaryValue->Remark."'";
		$condition = "Id=".$salaryValue->Id;
		return $dbHelper->Update("SalaryValues", $set, $condition);
	}
	
	private function GetSalaryValueBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$salaryValue = new SalaryValue();
			$salaryValue->Id = $row["Id"];
			$salaryValue->SalaryTitleId = $row["SalaryTitleId"];
			$salaryValue->AdminId = $row["AdminId"];
			$salaryValue->SalaryDoubleValue = $row["SalaryDoubleValue"];
			$salaryValue->SalaryVarcharValue = $row["SalaryVarcharValue"];
			$salaryValue->SalaryDate = $row["SalaryDate"];
			$salaryValue->IsDefault = $row["IsDefault"];
			$salaryValue->IsEnable = $row["IsEnable"];
			$salaryValue->Remark = $row["Remark"];
			return $salaryValue;
		}else{
			return null;	
		}
	}
	
	private function GetSalaryValuesArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$salaryValueArray = array();
		while($row = mysql_fetch_array($result)){
			$salaryValue = new SalaryValue();
			$salaryValue->Id = $row["Id"];
			$salaryValue->SalaryTitleId = $row["SalaryTitleId"];
			$salaryValue->AdminId = $row["AdminId"];
			$salaryValue->SalaryDoubleValue = $row["SalaryDoubleValue"];
			$salaryValue->SalaryVarcharValue = $row["SalaryVarcharValue"];
			$salaryValue->SalaryDate = $row["SalaryDate"];
			$salaryValue->IsDefault = $row["IsDefault"];
			$salaryValue->IsEnable = $row["IsEnable"];
			$salaryValue->Remark = $row["Remark"];
			array_push($salaryValueArray, $salaryValue);;
		}
		return $salaryValueArray;
	}
	
	private function GetSalaryValuesArrayBySql2($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$salaryValueArray = array();
		while($row = mysql_fetch_array($result)){
			$salaryValue = new SalaryValue();
			$salaryValue->Id = $row["Id"];
			$salaryValue->SalaryTitleId = $row["SalaryTitleId"];
			$salaryValue->AdminId = $row["AdminId"];
			$salaryValue->SalaryDoubleValue = $row["SalaryDoubleValue"];
			$salaryValue->SalaryVarcharValue = $row["SalaryVarcharValue"];
			$salaryValue->SalaryDate = $row["SalaryDate"];
			$salaryValue->IsDefault = $row["IsDefault"];
			$salaryValue->IsEnable = $row["IsEnable"];
			$salaryValue->Remark = $row["Remark"];
			$salaryValueArray[$salaryValue->SalaryTitleId] = $salaryValue;
		}
		return $salaryValueArray;
	}
	
	public function GetSalaryValueById($id){
		$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetSalaryValueBySql($sql);
	}
	
	public function GetAllSalaryValuesByPage($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM SalaryValues WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 ORDER BY Id LIMIT '.$begin.','.$pageSize;
		$salaryValueArray = $this->GetSalaryValuesArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$salaryValueArray);
		return $result;
	}
	
	public function GetAllSalaryValues(){
		$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 ORDER BY Id';
		return $this->GetSalaryValuesArrayBySql($sql);
	}
	
	public function GetAllSalaryDefaultValue(){
		$sql = 'SELECT A.* FROM SalaryValues A JOIN SalaryValues B WHERE A.AdminId = B.AdminId AND B.SalaryTitleId = 26 AND A.IsDefault = 1 AND A.IsEnable = 1 AND B.IsDefault = 1 AND B.IsEnable = 1 ORDER BY A.SalaryTitleId, B.SalaryDoubleValue';
		//$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 AND IsDefault = 1 ORDER BY Id';
		return $this->GetSalaryValuesArrayBySql($sql);
	}
	
	public function GetSalaryDefaultValueByTitleId($titleId){
		$sql = 'SELECT A.* FROM SalaryValues A JOIN SalaryValues B WHERE A.AdminId = B.AdminId AND A.SalaryTitleId = '.$titleId.' AND B.SalaryTitleId = 26 AND A.IsDefault = 1 AND A.IsEnable = 1 AND B.IsDefault = 1 AND B.IsEnable = 1 ORDER BY A.SalaryTitleId, B.SalaryDoubleValue';
		return $this->GetSalaryValuesArrayBySql($sql);
	}
	
	public function GetSalaryDefaultValue($adminId, $titleId){
		$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 AND AdminId = '.$adminId.' AND SalaryTitleId = '.$titleId.' AND IsDefault = 1';
		return $this->GetSalaryValueBySql($sql);
	}
	
	public function GetSalaryValueByTitleIdAndMonth($titleId, $month){
		$sql = 'SELECT A.* FROM SalaryValues A JOIN SalaryValues B WHERE A.AdminId = B.AdminId AND A.SalaryDate = \''.$month.'\' AND B.SalaryDate = \''.$month.'\' AND A.SalaryTitleId = '.$titleId. ' AND B.SalaryTitleId = 26 AND A.IsEnable = 1 AND B.IsEnable = 1 ORDER BY A.SalaryDate DESC, B.SalaryDoubleValue';
		return $this->GetSalaryValuesArrayBySql($sql);
	}
	
	public function GetSalaryValueByTitleId($titleId){
		$sql = 'SELECT A.* FROM SalaryValues A JOIN SalaryValues B WHERE A.AdminId = B.AdminId AND A.SalaryDate = B.SalaryDate AND A.SalaryTitleId = '.$titleId. ' AND B.SalaryTitleId = 26 AND A.IsEnable = 1 AND B.IsEnable = 1 AND A.IsDefault != 1 AND B.IsDefault != 1 ORDER BY A.SalaryDate DESC, B.SalaryDoubleValue';
		return $this->GetSalaryValuesArrayBySql($sql);
	}
	
	public function GetSalaryValue($adminId, $titleId, $month){
		$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 AND AdminId = '.$adminId.' AND SalaryTitleId = '.$titleId.' AND SalaryDate = \''.$month.'\'';
		return $this->GetSalaryValueBySql($sql);
	}
	
	public function GetSalaryValueByAdminIdAndMonth($adminId, $month){
		$sql = 'SELECT * FROM SalaryValues WHERE IsEnable = 1 AND AdminId = '.$adminId.' AND SalaryDate = \''.$month.'\'';
		return $this->GetSalaryValuesArrayBySql2($sql);
	}
	
	public function GetMaxXuHao(){
		$sql = 'SELECT * FROM SalaryValues WHERE IsDefault = 1 AND SalaryTitleId = 26 ORDER BY SalaryDoubleValue DESC LIMIT 0,1 ';
		return $this->GetSalaryValueBySql($sql);
	}
	
	public function DeleteSalaryValueByAdminIdAndMonth($adminId, $month){
		$dbHelper = new DbHelper();
		$condition = 'IsEnable = 1 AND AdminId = '.$adminId.' AND SalaryDate = \''.$month.'\'';
		return $dbHelper->Delete("SalaryValues", $condition);
	}
	
	public function DeleteSalaryDefaultValueByAdminId($adminId){
		$dbHelper = new DbHelper();
		$set = "IsEnable=0";
		$condition = "AdminId =".$adminId . " AND IsDefault = 1 AND SalaryTitleId = 26";
		return $dbHelper->Update("SalaryValues", $set, $condition);
	}
}
?>