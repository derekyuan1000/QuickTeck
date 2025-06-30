<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/AdminMessageSendbox_Class.php");
class AdminMessageSendboxService  {
	public function AddAdminMessageSendbox($adminMessageSendbox){	
		$dbHelper = new DbHelper();
		$columnsName = "`ReceiveAdminIds`,`Title`,`Content`,`SendAdminId`,`CreateTime`,`IsEnable`,`Remark`";
		
		$values = "'".$adminMessageSendbox->ReceiveAdminIds."','".$adminMessageSendbox->Title."','".$adminMessageSendbox->Content."','".$adminMessageSendbox->SendAdminId."',"
			."'".$adminMessageSendbox->CreateTime."','".$adminMessageSendbox->IsEnable."','".$adminMessageSendbox->Remark."'";
		return $dbHelper->Insert("AdminMessageSendbox", $columnsName, $values);
	}
	
	public function DeleteAdminMessageSendboxById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("AdminMessageSendbox", $condition);
	}
	
	public function ModifyAdminMessageSendbox($adminMessageSendbox){
		$dbHelper = new DbHelper();
		$set = "`ReceiveAdminIds`='".$adminMessageSendbox->ReceiveAdminIds."',`Title`='".$adminMessageSendbox->Title."',`Content`='".$adminMessageSendbox->Content."',"
			."`SendAdminId`='".$adminMessageSendbox->SendAdminId."',`CreateTime`='".$adminMessageSendbox->CreateTime."',`IsEnable`='".$adminMessageSendbox->IsEnable."',"
			."`Remark`='".$adminMessageSendbox->Remark."'";
		$condition = "Id=".$adminMessageSendbox->Id;
		return $dbHelper->Update("AdminMessageSendbox", $set, $condition);
	}
	
	private function GetAdminMessageSendboxBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$adminMessageSendbox = new AdminMessageSendbox();
			$adminMessageSendbox->Id = $row["Id"];
			$adminMessageSendbox->ReceiveAdminIds = $row["ReceiveAdminIds"];
			$adminMessageSendbox->Title = $row["Title"];
			$adminMessageSendbox->Content = $row["Content"];
			$adminMessageSendbox->SendAdminId = $row["SendAdminId"];
			$adminMessageSendbox->CreateTime = $row["CreateTime"];
			$adminMessageSendbox->IsEnable = $row["IsEnable"];
			$adminMessageSendbox->Remark = $row["Remark"];
			return $adminMessageSendbox;
		}else{
			return null;	
		}
	}
	
	private function GetAdminMessageSendboxArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$adminMessageSendboxArray = array();
		while($row = mysql_fetch_array($result)){
			$adminMessageSendbox = new AdminMessageSendbox();
			$adminMessageSendbox->Id = $row["Id"];
			$adminMessageSendbox->ReceiveAdminIds = $row["ReceiveAdminIds"];
			$adminMessageSendbox->Title = $row["Title"];
			$adminMessageSendbox->Content = $row["Content"];
			$adminMessageSendbox->SendAdminId = $row["SendAdminId"];
			$adminMessageSendbox->CreateTime = $row["CreateTime"];
			$adminMessageSendbox->IsEnable = $row["IsEnable"];
			$adminMessageSendbox->Remark = $row["Remark"];
			array_push($adminMessageSendboxArray, $adminMessageSendbox);
		}
		return $adminMessageSendboxArray;
	}
	
	public function GetAdminMessageSendboxById($id){
		$sql = 'SELECT * FROM AdminMessageSendbox WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetAdminMessageSendboxBySql($sql);
	}
	
	public function GetAllAdminMessageSendboxByPage($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM AdminMessageSendbox WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM AdminMessageSendbox WHERE IsEnable = 1 ORDER BY CreateTime DESC LIMIT '.$begin.','.$pageSize;
		$adminMessageSendboxArray = $this->GetAdminMessageSendboxArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$adminMessageSendboxArray);
		return $result;
	}
	
	public function GetAdminMessageSendboxBySendAdminId($sendAdminId, $pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM AdminMessageSendbox WHERE IsEnable = 1 AND SendAdminId = '.$sendAdminId;
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM AdminMessageSendbox WHERE IsEnable = 1 AND SendAdminId = '.$sendAdminId .' ORDER BY CreateTime DESC LIMIT '.$begin.','.$pageSize;
		$adminMessageSendboxArray = $this->GetAdminMessageSendboxArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$adminMessageSendboxArray);
		return $result;
	}
	
	public function ModifyAdminMessageSendboxIsEnable($adminMessageSendbox){
		$dbHelper = new DbHelper();
		$set = "IsEnable='".$adminMessageSendbox->IsEnable."'";
		$condition = "Id=".$adminMessageSendbox->Id;
		return $dbHelper->Update("AdminMessageSendbox", $set, $condition);
	}
}
?>