<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");

include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/MailInfo_Class.php");

class MailInfoService  {

	public function AddMailInfo($mailInfo){	

		$dbHelper = new DbHelper();

		if(!$mailInfo->IntendantAdminId){

			$mailInfo->IntendantAdminId = "NULL";

		}

		if(!$mailInfo->BusinessAdminId){

			$mailInfo->BusinessAdminId = "NULL";

		}

		$columnsName = "`MailId`,`Subject`,`FromAddress`,`FromName`,`MailTime`,`ToString`,`CcString`,`ReplyToString`,"

			."`AttachmentsCount`,`MailStatus`,`IsRead`,`IsOrder`,`IsClose`,`AssignTime`,`ReplyTime`,`RatedVitalityTime`,"

			."`RealVitalityTime`,`IsNeedApproval`,`IntendantAdminId`,`BusinessAdminId`,`MailFlag`,`IsEnable`,`Remark`";

		

		$values = "'".$mailInfo->MailId."','".$mailInfo->Subject."','".$mailInfo->FromAddress."','".$mailInfo->FromName."',"

			."'".$mailInfo->MailTime."','".$mailInfo->ToString."','".$mailInfo->CcString."','".$mailInfo->ReplyToString."',"

			."'".$mailInfo->AttachmentsCount."','".$mailInfo->MailStatus."','".$mailInfo->IsRead."','".$mailInfo->IsOrder."',"

			."'".$mailInfo->IsClose."','".$mailInfo->AssignTime."','".$mailInfo->ReplyTime."','".$mailInfo->RatedVitalityTime."',"

			."'".$mailInfo->RealVitalityTime."','".$mailInfo->IsNeedApproval."',".$mailInfo->IntendantAdminId.",".$mailInfo->BusinessAdminId.","

			."'".$mailInfo->MailFlag."','".$mailInfo->IsEnable."','".$mailInfo->Remark."'";

			

		return $dbHelper->Insert("MailInfos", $columnsName, $values);

	}

	

	public function DeleteMailInfoById($id){

		$dbHelper = new DbHelper();

		$condition = "Id=".$id;

		return $dbHelper->Delete("MailInfos", $condition);

	}

	

	public function ModifyMailInfo($mailInfo){

		$dbHelper = new DbHelper();

		if(!$mailInfo->IntendantAdminId){

			$mailInfo->IntendantAdminId = "NULL";

		}

		if(!$mailInfo->BusinessAdminId){

			$mailInfo->BusinessAdminId = "NULL";

		}

		$set = "`MailId`='".$mailInfo->MailId."',`Subject`='".$mailInfo->Subject."',`FromAddress`='".$mailInfo->FromAddress."',"

			."`FromName`='".$mailInfo->FromName."',`MailTime`='".$mailInfo->MailTime."',`ToString`='".$mailInfo->ToString."',"

			."`CcString`='".$mailInfo->CcString."',`ReplyToString`='".$mailInfo->ReplyToString."',`AttachmentsCount`='".$mailInfo->AttachmentsCount."',"

			."`MailStatus`='".$mailInfo->MailStatus."',`IsRead`='".$mailInfo->IsRead."',`IsOrder`='".$mailInfo->IsOrder."',"

			."`IsClose`='".$mailInfo->IsClose."',`AssignTime`='".$mailInfo->AssignTime."',`ReplyTime`='".$mailInfo->ReplyTime."',"

			."`RatedVitalityTime`='".$mailInfo->RatedVitalityTime."',`RealVitalityTime`='".$mailInfo->RealVitalityTime."',`IsNeedApproval`='".$mailInfo->IsNeedApproval."',"

			."`IntendantAdminId`=".$mailInfo->IntendantAdminId.",`BusinessAdminId`=".$mailInfo->BusinessAdminId.",`MailFlag`='".$mailInfo->MailFlag."',`IsEnable`='".$mailInfo->IsEnable."',"

			."`Remark`='".$mailInfo->Remark."'";

		$condition = "Id=".$mailInfo->Id;

		return $dbHelper->Update("MailInfos", $set, $condition);

	}

	

	private function GetMailInfoBySql($sql){

		$dbHelper = new DbHelper();

		$result = $dbHelper->Query($sql);

		

		$row = mysql_fetch_array($result);

		if($row){

			$mailInfo = new MailInfo();

			$mailInfo->Id = $row["Id"];

			$mailInfo->MailId = $row["MailId"];

			$mailInfo->Subject = $row["Subject"];

			$mailInfo->FromAddress = $row["FromAddress"];

			$mailInfo->FromName = $row["FromName"];

			$mailInfo->MailTime = $row["MailTime"];

			$mailInfo->ToString = $row["ToString"];

			$mailInfo->CcString = $row["CcString"];

			$mailInfo->ReplyToString = $row["ReplyToString"];

			$mailInfo->AttachmentsCount = $row["AttachmentsCount"];

			$mailInfo->MailStatus = $row["MailStatus"];

			$mailInfo->IsRead = $row["IsRead"];

			$mailInfo->IsOrder = $row["IsOrder"];

			$mailInfo->IsClose = $row["IsClose"];

			$mailInfo->AssignTime = $row["AssignTime"];

			$mailInfo->ReplyTime = $row["ReplyTime"];

			$mailInfo->RatedVitalityTime = $row["RatedVitalityTime"];

			$mailInfo->RealVitalityTime = $row["RealVitalityTime"];

			$mailInfo->IsNeedApproval = $row["IsNeedApproval"];

			$mailInfo->IntendantAdminId = $row["IntendantAdminId"];

			$mailInfo->BusinessAdminId = $row["BusinessAdminId"];

			$mailInfo->MailFlag = $row["MailFlag"];

			$mailInfo->IsEnable = $row["IsEnable"];

			$mailInfo->Remark = $row["Remark"];

			return $mailInfo;

		}else{

			return null;	

		}

	}

	

	private function GetMailInfosArrayBySql($sql){

		$dbHelper = new DbHelper();

		$result = $dbHelper->Query($sql);

		

		$mailInfoArray = array();

		while($row = mysql_fetch_array($result)){

			$mailInfo = new MailInfo();

			$mailInfo->Id = $row["Id"];

			$mailInfo->MailId = $row["MailId"];

			$mailInfo->Subject = $row["Subject"];

			$mailInfo->FromAddress = $row["FromAddress"];

			$mailInfo->FromName = $row["FromName"];

			$mailInfo->MailTime = $row["MailTime"];

			$mailInfo->ToString = $row["ToString"];

			$mailInfo->CcString = $row["CcString"];

			$mailInfo->ReplyToString = $row["ReplyToString"];

			$mailInfo->AttachmentsCount = $row["AttachmentsCount"];

			$mailInfo->MailStatus = $row["MailStatus"];

			$mailInfo->IsRead = $row["IsRead"];

			$mailInfo->IsOrder = $row["IsOrder"];

			$mailInfo->IsClose = $row["IsClose"];

			$mailInfo->AssignTime = $row["AssignTime"];

			$mailInfo->ReplyTime = $row["ReplyTime"];

			$mailInfo->RatedVitalityTime = $row["RatedVitalityTime"];

			$mailInfo->RealVitalityTime = $row["RealVitalityTime"];

			$mailInfo->IsNeedApproval = $row["IsNeedApproval"];

			$mailInfo->IntendantAdminId = $row["IntendantAdminId"];

			$mailInfo->BusinessAdminId = $row["BusinessAdminId"];

			$mailInfo->MailFlag = $row["MailFlag"];

			$mailInfo->IsEnable = $row["IsEnable"];

			$mailInfo->Remark = $row["Remark"];

			array_push($mailInfoArray, $mailInfo);

		}

		return $mailInfoArray;

	}

	

	public function GetMailInfoById($id){

		$sql = 'SELECT * FROM MailInfos WHERE IsEnable = 1 AND Id = '.$id;

		return $this->GetMailInfoBySql($sql);

	}

	

	public function GetMailInfoBySubjectAndFromAddressAndMailId($subject, $fromAddress, $mailId){

		//if(!$mailTime){

		//	$mailTime = "0000-00-00 00:00:00";	

		//}

		//$sql = 'SELECT * FROM MailInfos WHERE Subject = \''.$subject .'\' AND FromAddress = \'' . $fromAddress . '\' AND MailId = \'' .$mailId . '\'';

		//$sql = 'SELECT * FROM MailInfos WHERE FromAddress = \'' . $fromAddress . '\' AND MailId = \'' .$mailId . '\'';

		$sql = 'SELECT * FROM MailInfos WHERE MailId = \'' .$mailId . '\'';

		return $this->GetMailInfoBySql($sql);

	}

	

	//mailAssignList

	public function GetAllMailInfosByPage($searchText, $pageSize, $currentPage, $mailStatus = 0, $mailFlag = 0){

		$dbHelper = new DbHelper();

		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR FromAddress LIKE \'%'.$searchText.'%\' OR FromName LIKE \'%'.$searchText

			.'%\' OR CcString LIKE \'%'.$searchText.'%\'';

		$condition2 = "";

		if($mailStatus == 1){

			$condition2 .= " AND MailStatus = 1 AND IsClose != 1";

		}

		if($mailFlag){

			$condition2 .=	" AND MailFlag = " . $mailFlag;

		}

		$sql = 'SELECT count(*) FROM MailInfos WHERE IsEnable = 1 AND ('.$condition.')' . $condition2;

		$count = $dbHelper->Select($sql);

		

		$begin = ($currentPage - 1) * $pageSize;

		$sql = 'SELECT * FROM MailInfos WHERE IsEnable = 1 AND ('.$condition.') '.$condition2.' ORDER BY MailTime DESC LIMIT '.$begin.','.$pageSize;

		$mailInfoArray = $this->GetMailInfosArrayBySql($sql);

		

		$result = array();

		array_push($result,$count[0][0]);

		array_push($result,$mailInfoArray);

		return $result;

	}

	

	//mailTrackiingList

	public function GetTrackingMailInfosByPage($searchText, $pageSize, $currentPage, $mailStatus = 0, $mailFlag = 0){

		$dbHelper = new DbHelper();

		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR FromAddress LIKE \'%'.$searchText.'%\' OR FromName LIKE \'%'.$searchText

			.'%\' OR CcString LIKE \'%'.$searchText.'%\'';

		$condition2 = "";

		if($mailStatus == 1){

			$condition2 .= " AND MailStatus = 1 AND IsClose != 1";

		}

		if($mailFlag){

			$condition2 .=	" AND MailFlag = " . $mailFlag;

		}

		$sql = 'SELECT count(*) FROM MailInfos WHERE IsEnable = 1 AND MailFlag != 1 AND ('.$condition.')' . $condition2;

		$count = $dbHelper->Select($sql);

		

		$begin = ($currentPage - 1) * $pageSize;

		$sql = 'SELECT * FROM MailInfos WHERE IsEnable = 1 AND MailFlag != 1 AND ('.$condition.') '.$condition2.' ORDER BY MailTime DESC LIMIT '.$begin.','.$pageSize;

		$mailInfoArray = $this->GetMailInfosArrayBySql($sql);

		

		$result = array();

		array_push($result,$count[0][0]);

		array_push($result,$mailInfoArray);

		return $result;

	}

	

	//inBox

	public function GetMailInfosByBusinessAdminIdAndPage($searchText, $businessAdminId, $pageSize, $currentPage, $mailFlag = 0){

		$dbHelper = new DbHelper();

		$condition = 'Subject LIKE \'%'.$searchText.'%\' OR FromAddress LIKE \'%'.$searchText.'%\' OR FromName LIKE \'%'.$searchText

			.'%\' OR CcString LIKE \'%'.$searchText.'%\'';

		$condition2 = "";

		if($mailFlag){

			$condition2 .=	" AND MailFlag = " . $mailFlag;

		}

		$sql = 'SELECT count(*) FROM MailInfos WHERE IsEnable = 1 AND ('.$condition.') AND BusinessAdminId = '.$businessAdminId. $condition2;

		$count = $dbHelper->Select($sql);

		

		$begin = ($currentPage - 1) * $pageSize;

		$sql = 'SELECT * FROM MailInfos WHERE IsEnable = 1 AND ('.$condition.') AND BusinessAdminId = '.$businessAdminId. $condition2.' ORDER BY MailTime DESC LIMIT '.$begin.','.$pageSize;

		$mailInfoArray = $this->GetMailInfosArrayBySql($sql);

		

		$result = array();

		array_push($result,$count[0][0]);

		array_push($result,$mailInfoArray);

		return $result;

	}

	

	public function GetMailInfoByMailStatus($mailStatus){

		$sql = 'SELECT * FROM MailInfos WHERE IsEnable = 1 AND IsClose != 1 AND MailStatus = ' .$mailStatus;

		return $this->GetMailInfosArrayBySql($sql);

	}

	

	public function GetMailInfoByMailStatusAndBusinessAdminId($mailStatus, $businessAdminId){

		$sql = 'SELECT * FROM MailInfos WHERE IsEnable = 1 AND IsClose != 1 AND MailStatus = ' .$mailStatus .' AND BusinessAdminId = '.$businessAdminId;

		return $this->GetMailInfosArrayBySql($sql);

	}

	

	public function MyDeleteMailInfo($id){

		$dbHelper = new DbHelper();

		$set = "IsEnable='0'";

		$condition = "Id = ".$id;

		return $dbHelper->Update("MailInfos", $set, $condition);

	}

	

	public function ModifyMailInfoAttachmentsCount($id, $count){

		$dbHelper = new DbHelper();

		$set = "AttachmentsCount=".$count;

		$condition = "Id = ".$id;

		return $dbHelper->Update("MailInfos", $set, $condition);

	}

	

	public function ModifyMailInfoMailFlag($id, $mailFlag){

		$dbHelper = new DbHelper();

		$set = "MailFlag=".$mailFlag;

		$condition = "Id = ".$id;

		return $dbHelper->Update("MailInfos", $set, $condition);

	}

}

?>