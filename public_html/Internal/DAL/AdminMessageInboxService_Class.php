<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/AdminMessageInbox_Class.php");
class AdminMessageInboxService  {
	public function AddAdminMessageInbox($adminMessageInbox){	
		$dbHelper = new DbHelper();
		$columnsName = "`ReceiveAdminId`,`Title`,`Content`,`Status`,`SendAdminId`,`CreateTime`,`IsEnable`,`Remark`";

		$values = "'".$adminMessageInbox->ReceiveAdminId."','".$adminMessageInbox->Title."','".$adminMessageInbox->Content."','".$adminMessageInbox->Status."',"
			."'".$adminMessageInbox->SendAdminId."','".$adminMessageInbox->CreateTime."','".$adminMessageInbox->IsEnable."','".$adminMessageInbox->Remark."'";
		return $dbHelper->Insert("AdminMessageInbox", $columnsName, $values);
	}
	
	public function DeleteAdminMessageInboxById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("AdminMessageInbox", $condition);
	}
	
	public function ModifyAdminMessageInbox($adminMessageInbox){
		$dbHelper = new DbHelper();
		$set = "`ReceiveAdminId`='".$adminMessageInbox->ReceiveAdminId."',`Title`='".$adminMessageInbox->Title."',`Content`='".$adminMessageInbox->Content."',"
			."`Status`='".$adminMessageInbox->Status."',`SendAdminId`='".$adminMessageInbox->SendAdminId."',`CreateTime`='".$adminMessageInbox->CreateTime."',"
			."`IsEnable`='".$adminMessageInbox->IsEnable."',`Remark`='".$adminMessageInbox->Remark."'";
		$condition = "Id=".$adminMessageInbox->Id;
		return $dbHelper->Update("AdminMessageInbox", $set, $condition);
	}
	
	private function GetAdminMessageInboxBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$adminMessageInbox = new AdminMessageInbox();
			$adminMessageInbox->Id = $row["Id"];
			$adminMessageInbox->ReceiveAdminId = $row["ReceiveAdminId"];
			$adminMessageInbox->Title = $row["Title"];
			$adminMessageInbox->Content = $row["Content"];
			$adminMessageInbox->Status = $row["Status"];
			$adminMessageInbox->SendAdminId = $row["SendAdminId"];
			$adminMessageInbox->CreateTime = $row["CreateTime"];
			$adminMessageInbox->IsEnable = $row["IsEnable"];
			$adminMessageInbox->Remark = $row["Remark"];
			return $adminMessageInbox;
		}else{
			return null;	
		}
	}
	
	private function GetAdminMessageInboxArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$adminMessageInboxArray = array();
		while($row = mysql_fetch_array($result)){
			$adminMessageInbox = new AdminMessageInbox();
			$adminMessageInbox->Id = $row["Id"];
			$adminMessageInbox->ReceiveAdminId = $row["ReceiveAdminId"];
			$adminMessageInbox->Title = $row["Title"];
			$adminMessageInbox->Content = $row["Content"];
			$adminMessageInbox->Status = $row["Status"];
			$adminMessageInbox->SendAdminId = $row["SendAdminId"];
			$adminMessageInbox->CreateTime = $row["CreateTime"];
			$adminMessageInbox->IsEnable = $row["IsEnable"];
			$adminMessageInbox->Remark = $row["Remark"];
			array_push($adminMessageInboxArray, $adminMessageInbox);
		}
		return $adminMessageInboxArray;
	}
	
	public function GetAdminMessageInboxById($id){
		$sql = 'SELECT * FROM AdminMessageInbox WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetAdminMessageInboxBySql($sql);
	}
	
	public function GetAllAdminMessageInboxByPage($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM AdminMessageInbox WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM AdminMessageInbox WHERE IsEnable = 1 ORDER BY CreateTime DESC LIMIT '.$begin.','.$pageSize;
		$adminMessageInboxArray = $this->GetAdminMessageInboxArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$adminMessageInboxArray);
		return $result;
	}
	
	public function GetAdminMessageInboxByReceiveAdminId($receiveAdminId, $pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM AdminMessageInbox WHERE IsEnable = 1 AND ReceiveAdminId = '.$receiveAdminId;
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM AdminMessageInbox WHERE IsEnable = 1 AND ReceiveAdminId = '.$receiveAdminId .' ORDER BY CreateTime DESC LIMIT '.$begin.','.$pageSize;
		$adminMessageInboxArray = $this->GetAdminMessageInboxArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$adminMessageInboxArray);
		return $result;
	}

	public function GetUnreadAdminMessageInboxByReceiveAdminId($receiveAdminId){
		$dbHelper = new DbHelper();
		$sql = 'SELECT * FROM AdminMessageInbox WHERE IsEnable = 1 AND Status = 0 AND ReceiveAdminId = '.$receiveAdminId;
		return $this->GetAdminMessageInboxArrayBySql($sql);
	}
	
	public function ModifyAdminMessageInboxIsEnable($adminMessageInbox){
		$dbHelper = new DbHelper();
		$set = "IsEnable='".$adminMessageInbox->IsEnable."'";
		$condition = "Id=".$adminMessageInbox->Id;
		return $dbHelper->Update("AdminMessageInbox", $set, $condition);
	}
	
	public function ModifyAdminMessageInboxStatus($adminMessageInbox){
		$dbHelper = new DbHelper();
		$set = "Status='".$adminMessageInbox->Status."'";
		$condition = "Id=".$adminMessageInbox->Id;
		return $dbHelper->Update("AdminMessageInbox", $set, $condition);
	}
}
?>