<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/WeeklyReportCCAdmin_Class.php");
class WeeklyReportCCAdminService  {
	public function AddWeeklyReportCCAdmin($weeklyReportCCAdmin){	
		$dbHelper = new DbHelper();
		$columnsName = "`WeeklyReportId`,`AdminId`,`IsEnable`,`Remark`";

		$values = "'".$weeklyReportCCAdmin->WeeklyReportId."','".$weeklyReportCCAdmin->AdminId."','".$weeklyReportCCAdmin->IsEnable."','".$weeklyReportCCAdmin->Remark."'";
		return $dbHelper->Insert("WeeklyReportCCAdmins", $columnsName, $values);
	}
	
	public function DeleteWeeklyReportCCAdminById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("WeeklyReportCCAdmins", $condition);
	}
	
	public function ModifyWeeklyReportCCAdmin($weeklyReportCCAdmin){
		$dbHelper = new DbHelper();
		$set = "`WeeklyReportId`='".$weeklyReportCCAdmin->WeeklyReportId."',`AdminId`='".$weeklyReportCCAdmin->AdminId."',`IsEnable`='".$weeklyReportCCAdmin->IsEnable."',"
			."`Remark`='".$weeklyReportCCAdmin->Remark."'";
		$condition = "Id=".$weeklyReportCCAdmin->Id;
		return $dbHelper->Update("WeeklyReportCCAdmins", $set, $condition);
	}
	
	private function GetWeeklyReportCCAdminBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$weeklyReportCCAdmin = new WeeklyReportCCAdmin();
			$weeklyReportCCAdmin->Id = $row["Id"];
			$weeklyReportCCAdmin->WeeklyReportId = $row["WeeklyReportId"];
			$weeklyReportCCAdmin->AdminId = $row["AdminId"];
			$weeklyReportCCAdmin->IsEnable = $row["IsEnable"];
			$weeklyReportCCAdmin->Remark = $row["Remark"];
			return $weeklyReportCCAdmin;
		}else{
			return null;
		}
	}
	
	private function GetWeeklyReportCCAdminsArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$weeklyReportCCAdminArray = array();
		while($row = mysql_fetch_array($result)){
			$weeklyReportCCAdmin = new WeeklyReportCCAdmin();
			$weeklyReportCCAdmin->Id = $row["Id"];
			$weeklyReportCCAdmin->WeeklyReportId = $row["WeeklyReportId"];
			$weeklyReportCCAdmin->AdminId = $row["AdminId"];
			$weeklyReportCCAdmin->IsEnable = $row["IsEnable"];
			$weeklyReportCCAdmin->Remark = $row["Remark"];
			array_push($weeklyReportCCAdminArray, $weeklyReportCCAdmin);
		}
		return $weeklyReportCCAdminArray;
	}
	
	public function GetWeeklyReportCCAdminById($id){
		$sql = 'SELECT * FROM WeeklyReportCCAdmins WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetWeeklyReportCCAdminBySql($sql);
	}
	
	public function GetAllWeeklyReportCCAdmins(){
		$sql = 'SELECT * FROM WeeklyReportCCAdmins WHERE IsEnable = 1 ORDER BY Id';
		return $this->GetWeeklyReportCCAdminsArrayBySql($sql);
	}
	
	public function GetWeeklyReportCCAdminByWeeklyReportId($weeklyReportId){
		$sql = 'SELECT * FROM WeeklyReportCCAdmins WHERE IsEnable = 1 AND WeeklyReportId = \''.$weeklyReportId.'\'';
		return $this->GetWeeklyReportCCAdminsArrayBySql($sql);
	}
}
?>