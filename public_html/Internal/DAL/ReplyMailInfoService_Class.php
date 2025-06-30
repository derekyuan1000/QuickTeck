<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/ReplyMailInfo_Class.php");
class ReplyMailInfoService  {
	public function AddReplyMailInfo($replyMailInfo){	
		$dbHelper = new DbHelper();
		if(!$replyMailInfo->IntendantAdminId){
			$replyMailInfo->IntendantAdminId = "NULL";
		}
		if(!$replyMailInfo->BusinessAdminId){
			$replyMailInfo->BusinessAdminId = "NULL";
		}
		$columnsName = "`Subject`,`ToList`,`CcList`,`BccList`,`AttachmentsCount`,`MailStatus`,`ReplyTime`,`ApprovalTime`,"
			."`SendTime`,`IsNeedApproval`,`IntendantAdminId`,`BusinessAdminId`,`IsEnable`,`Remark`";
		
		$values = "'".$replyMailInfo->Subject."','".$replyMailInfo->ToList."','".$replyMailInfo->CcList."','".$replyMailInfo->BccList."',"
			."'".$replyMailInfo->AttachmentsCount."','".$replyMailInfo->MailStatus."','".$replyMailInfo->ReplyTime."','".$replyMailInfo->ApprovalTime."',"
			."'".$replyMailInfo->SendTime."','".$replyMailInfo->IsNeedApproval."',".$replyMailInfo->IntendantAdminId.",".$replyMailInfo->BusinessAdminId.","
			."'".$replyMailInfo->IsEnable."','".$replyMailInfo->Remark."'";
		return $dbHelper->Insert("ReplyMailInfos", $columnsName, $values);
	}
	
	public function DeleteReplyMailInfoById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("ReplyMailInfos", $condition);
	}
	
	public function ModifyReplyMailInfo($replyMailInfo){
		$dbHelper = new DbHelper();
		if(!$replyMailInfo->IntendantAdminId){
			$replyMailInfo->IntendantAdminId = "NULL";
		}
		if(!$replyMailInfo->BusinessAdminId){
			$replyMailInfo->BusinessAdminId = "NULL";
		}
		$set = "`Subject`='".$replyMailInfo->Subject."',`ToList`='".$replyMailInfo->ToList."',`CcList`='".$replyMailInfo->CcList."',"
			."`BccList`='".$replyMailInfo->BccList."',`AttachmentsCount`='".$replyMailInfo->AttachmentsCount."',`MailStatus`='".$replyMailInfo->MailStatus."',"
			."`ReplyTime`='".$replyMailInfo->ReplyTime."',`ApprovalTime`='".$replyMailInfo->ApprovalTime."',`SendTime`='".$replyMailInfo->SendTime."',"
			."`IsNeedApproval`='".$replyMailInfo->IsNeedApproval."',`IntendantAdminId`=".$replyMailInfo->IntendantAdminId.",`BusinessAdminId`=".$replyMailInfo->BusinessAdminId.","
			."`IsEnable`='".$replyMailInfo->IsEnable."',`Remark`='".$replyMailInfo->Remark."'";
		$condition = "Id=".$replyMailInfo->Id;
		return $dbHelper->Update("ReplyMailInfos", $set, $condition);
	}
	
	private function GetReplyMailInfoBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$replyMailInfo = new ReplyMailInfo();
			$replyMailInfo->Id = $row["Id"];
			$replyMailInfo->Subject = $row["Subject"];
			$replyMailInfo->ToList = $row["ToList"];
			$replyMailInfo->CcList = $row["CcList"];
			$replyMailInfo->BccList = $row["BccList"];
			$replyMailInfo->AttachmentsCount = $row["AttachmentsCount"];
			$replyMailInfo->MailStatus = $row["MailStatus"];
			$replyMailInfo->ReplyTime = $row["ReplyTime"];
			$replyMailInfo->ApprovalTime = $row["ApprovalTime"];
			$replyMailInfo->SendTime = $row["SendTime"];
			$replyMailInfo->IsNeedApproval = $row["IsNeedApproval"];
			$replyMailInfo->IntendantAdminId = $row["IntendantAdminId"];
			$replyMailInfo->BusinessAdminId = $row["BusinessAdminId"];
			$replyMailInfo->IsEnable = $row["IsEnable"];
			$replyMailInfo->Remark = $row["Remark"];
			return $replyMailInfo;
		}else{
			return null;	
		}
	}
	
	private function GetReplyMailInfosArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$replyMailInfoArray = array();
		while($row = mysql_fetch_array($result)){
			$replyMailInfo = new ReplyMailInfo();
			$replyMailInfo->Id = $row["Id"];
			$replyMailInfo->Subject = $row["Subject"];
			$replyMailInfo->ToList = $row["ToList"];
			$replyMailInfo->CcList = $row["CcList"];
			$replyMailInfo->BccList = $row["BccList"];
			$replyMailInfo->AttachmentsCount = $row["AttachmentsCount"];
			$replyMailInfo->MailStatus = $row["MailStatus"];
			$replyMailInfo->ReplyTime = $row["ReplyTime"];
			$replyMailInfo->ApprovalTime = $row["ApprovalTime"];
			$replyMailInfo->SendTime = $row["SendTime"];
			$replyMailInfo->IsNeedApproval = $row["IsNeedApproval"];
			$replyMailInfo->IntendantAdminId = $row["IntendantAdminId"];
			$replyMailInfo->BusinessAdminId = $row["BusinessAdminId"];
			$replyMailInfo->IsEnable = $row["IsEnable"];
			$replyMailInfo->Remark = $row["Remark"];
			array_push($replyMailInfoArray, $replyMailInfo);
		}
		return $replyMailInfoArray;
	}
	
	public function GetReplyMailInfoById($id){
		$sql = 'SELECT * FROM ReplyMailInfos WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetReplyMailInfoBySql($sql);
	}
	
	//mailReplyList
	public function GetAllReplyMailInfosByPage($searchText, $pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR ToList LIKE \'%'.$searchText.'%\' OR CcList LIKE \'%'.$searchText
			.'%\' OR BccList LIKE \'%'.$searchText.'%\'';
		$sql = 'SELECT count(*) FROM ReplyMailInfos WHERE MailStatus != 4 AND IsEnable = 1 AND ('.$condition.')';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM ReplyMailInfos WHERE MailStatus != 4 AND IsEnable = 1 AND ('.$condition.') ORDER BY ReplyTime DESC LIMIT '.$begin.','.$pageSize;
		$replyMailInfoArray = $this->GetReplyMailInfosArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$replyMailInfoArray);
		return $result;
	}
	
	//outBox
	public function GetOutMailInfosByBusinessAdminIdAndPage($searchText, $businessAdminId, $pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR ToList LIKE \'%'.$searchText.'%\' OR CcList LIKE \'%'.$searchText
			.'%\' OR BccList LIKE \'%'.$searchText.'%\'';
		$sql = 'SELECT count(*) FROM ReplyMailInfos WHERE IsEnable = 1 AND ('.$condition.') AND MailStatus = 1 AND BusinessAdminId = '.$businessAdminId;
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM ReplyMailInfos WHERE IsEnable = 1 AND ('.$condition.') AND MailStatus = 1 AND BusinessAdminId = '.$businessAdminId.' ORDER BY ReplyTime DESC LIMIT '.$begin.','.$pageSize;
		$replyMailInfoArray = $this->GetReplyMailInfosArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$replyMailInfoArray);
		return $result;
	}
	
	//sendBox
	public function GetSendMailInfosByBusinessAdminIdAndPage($searchText, $businessAdminId, $pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR ToList LIKE \'%'.$searchText.'%\' OR CcList LIKE \'%'.$searchText
			.'%\' OR BccList LIKE \'%'.$searchText.'%\'';
		$sql = 'SELECT count(*) FROM ReplyMailInfos WHERE IsEnable = 1 AND ('.$condition.') AND (MailStatus = 2 OR MailStatus = 3) AND BusinessAdminId = '.$businessAdminId;
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM ReplyMailInfos WHERE IsEnable = 1 AND ('.$condition.') AND (MailStatus = 2 OR MailStatus = 3) AND BusinessAdminId = '.$businessAdminId.' ORDER BY ReplyTime DESC LIMIT '.$begin.','.$pageSize;
		$replyMailInfoArray = $this->GetReplyMailInfosArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$replyMailInfoArray);
		return $result;
	}
	
	//mailApproveList
	public function GetNeedApproveMailInfosByPage($searchText, $pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR ToList LIKE \'%'.$searchText.'%\' OR CcList LIKE \'%'.$searchText
			.'%\' OR BccList LIKE \'%'.$searchText.'%\'';
		$sql = 'SELECT count(*) FROM ReplyMailInfos WHERE IsEnable = 1 AND ('.$condition.') AND IsNeedApproval = 1 AND MailStatus != 4';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM ReplyMailInfos WHERE IsEnable = 1 AND ('.$condition.') AND IsNeedApproval = 1 AND MailStatus != 4 ORDER BY ReplyTime DESC LIMIT '.$begin.','.$pageSize;
		$replyMailInfoArray = $this->GetReplyMailInfosArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$replyMailInfoArray);
		return $result;
	}
	
	public function GetMailInfoByMailStatus($mailStatus){
		$sql = 'SELECT * FROM ReplyMailInfos WHERE IsEnable = 1 AND MailStatus = ' .$mailStatus;
		return $this->GetReplyMailInfosArrayBySql($sql);
	}
	
	public function MySendMail($id){
		$dbHelper = new DbHelper();
		$now = date("Y-m-d H:i:s");
		$set = "`MailStatus`='3',`SendTime`='".$now."'";
		$condition = "Id = ".$id." AND IsEnable = 1";
		return $dbHelper->Update("ReplyMailInfos", $set, $condition);
	}
	
	public function MyReSendMail($id){
		$dbHelper = new DbHelper();
		$set = "`MailStatus`='2',`SendTime`=''";
		$condition = "Id = ".$id." AND IsEnable = 1";
		return $dbHelper->Update("ReplyMailInfos", $set, $condition);
	}
	
	public function MyDeleteMail($id){
		$dbHelper = new DbHelper();
		$set = "IsEnable='0'";
		$condition = "Id = ".$id;
		return $dbHelper->Update("ReplyMailInfos", $set, $condition);
	}
}
?>