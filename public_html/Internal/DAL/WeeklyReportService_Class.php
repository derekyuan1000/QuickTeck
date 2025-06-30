<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/WeeklyReport_Class.php");
class WeeklyReportService  {
	public function AddWeeklyReport($weeklyReport){	
		$dbHelper = new DbHelper();
		if(!$weeklyReport->ApprovedAdminId){
			$weeklyReport->ApprovedAdminId = "NULL";
		}
		$columnsName = "`ReportContent`,`ApprovedContent`,`ReportTime`,`WriteReportTime`,`ApprovedTime`,`AdminId`,`ApprovedAdminId`,`OrderCount`,"
			."`EmailCount`,`StatusId`,`IsEnable`,`Remark`";
		
		$values = "'".$weeklyReport->ReportContent."','".$weeklyReport->ApprovedContent."','".$weeklyReport->ReportTime."','".$weeklyReport->WriteReportTime."',"
			."'".$weeklyReport->ApprovedTime."','".$weeklyReport->AdminId."','".$weeklyReport->ApprovedAdminId."','".$weeklyReport->OrderCount."',"
			."'".$weeklyReport->EmailCount."','".$weeklyReport->StatusId."','".$weeklyReport->IsEnable."','".$weeklyReport->Remark."'";
		return $dbHelper->Insert("WeeklyReports", $columnsName, $values);
	}
	
	public function DeleteWeeklyReportById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("WeeklyReports", $condition);
	}
	
	public function ModifyWeeklyReport($weeklyReport){
		$dbHelper = new DbHelper();
		if(!$weeklyReport->ApprovedAdminId){
			$weeklyReport->ApprovedAdminId = "NULL";
		}
		$set = "`ReportContent`='".$weeklyReport->ReportContent."',`ApprovedContent`='".$weeklyReport->ApprovedContent."',`ReportTime`='".$weeklyReport->ReportTime."',"
			."`WriteReportTime`='".$weeklyReport->WriteReportTime."',`ApprovedTime`='".$weeklyReport->ApprovedTime."',`AdminId`='".$weeklyReport->AdminId."',"
			."`ApprovedAdminId`=".$weeklyReport->ApprovedAdminId.",`OrderCount`='".$weeklyReport->OrderCount."',`EmailCount`='".$weeklyReport->EmailCount."',"
			."`StatusId`='".$weeklyReport->StatusId."',`IsEnable`='".$weeklyReport->IsEnable."',`Remark`='".$weeklyReport->Remark."'";
		$condition = "Id=".$weeklyReport->Id;
		return $dbHelper->Update("WeeklyReports", $set, $condition);
	}
	
	private function GetWeeklyReportBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$weeklyReport = new WeeklyReport();
			$weeklyReport->Id = $row["Id"];
			$weeklyReport->ReportContent = $row["ReportContent"];
			$weeklyReport->ApprovedContent = $row["ApprovedContent"];
			$weeklyReport->ReportTime = $row["ReportTime"];
			$weeklyReport->WriteReportTime = $row["WriteReportTime"];
			$weeklyReport->ApprovedTime = $row["ApprovedTime"];
			$weeklyReport->AdminId = $row["AdminId"];
			$weeklyReport->ApprovedAdminId = $row["ApprovedAdminId"];
			$weeklyReport->OrderCount = $row["OrderCount"];
			$weeklyReport->EmailCount = $row["EmailCount"];
			$weeklyReport->StatusId = $row["StatusId"];
			$weeklyReport->IsEnable = $row["IsEnable"];
			$weeklyReport->Remark = $row["Remark"];
			return $weeklyReport;
		}else{
			return null;	
		}
	}
	
	private function GetWeeklyReportsArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$weeklyReportArray = array();
		while($row = mysql_fetch_array($result)){
			$weeklyReport = new WeeklyReport();
			$weeklyReport->Id = $row["Id"];
			$weeklyReport->ReportContent = $row["ReportContent"];
			$weeklyReport->ApprovedContent = $row["ApprovedContent"];
			$weeklyReport->ReportTime = $row["ReportTime"];
			$weeklyReport->WriteReportTime = $row["WriteReportTime"];
			$weeklyReport->ApprovedTime = $row["ApprovedTime"];
			$weeklyReport->AdminId = $row["AdminId"];
			$weeklyReport->ApprovedAdminId = $row["ApprovedAdminId"];
			$weeklyReport->OrderCount = $row["OrderCount"];
			$weeklyReport->EmailCount = $row["EmailCount"];
			$weeklyReport->StatusId = $row["StatusId"];
			$weeklyReport->IsEnable = $row["IsEnable"];
			$weeklyReport->Remark = $row["Remark"];
			array_push($weeklyReportArray, $weeklyReport);
		}
		return $weeklyReportArray;
	}
	
	public function GetWeeklyReportById($id){
		$sql = 'SELECT * FROM WeeklyReports WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetWeeklyReportBySql($sql);
	}
	
	public function GetAllWeeklyReportsByPage($pageSize, $currentPage, $adminId, $approvedAdminId, $CCAdminId, $statusId){
		$dbHelper = new DbHelper();
		
		$condition = "";
		if($adminId){
			$condition .=  ' AND w.AdminId = ' . $adminId;
		}
		if($approvedAdminId){
			$condition .=  ' AND w.ApprovedAdminId = ' . $approvedAdminId;
		}
		if($CCAdminId){
			$condition .=  ' AND wc.AdminId = '.$CCAdminId;
		}
		if($statusId){
			$condition .=  ' AND w.StatusId in ('.$statusId. ')';
		}
		
		if($CCAdminId){
			$sql = 'SELECT count(*) FROM WeeklyReports w inner join WeeklyReportCCAdmins wc on w.Id = wc.WeeklyReportId WHERE w.IsEnable = 1'.$condition;
		}else{
			$sql = 'SELECT count(*) FROM WeeklyReports w WHERE w.IsEnable = 1'.$condition;
		}
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		if($CCAdminId){
			$sql = 'SELECT w.* FROM WeeklyReports w inner join WeeklyReportCCAdmins wc on w.Id = wc.WeeklyReportId WHERE w.IsEnable = 1 '.$condition.' ORDER BY w.Id DESC LIMIT '.$begin.','.$pageSize;
		}else{
			$sql = 'SELECT w.* FROM WeeklyReports w WHERE w.IsEnable = 1 '.$condition.' ORDER BY w.Id DESC LIMIT '.$begin.','.$pageSize;
		}
		$weeklyReportArray = $this->GetWeeklyReportsArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$weeklyReportArray);
		return $result;
	}
	
	public function GetAllWeeklyReportsByPage2($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM WeeklyReports WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM WeeklyReports WHERE IsEnable = 1 ORDER BY Id DESC LIMIT '.$begin.','.$pageSize;
		$weeklyReportArray = $this->GetWeeklyReportsArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$weeklyReportArray);
		return $result;
	}
}
?>