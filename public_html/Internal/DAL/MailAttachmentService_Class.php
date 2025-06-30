<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/MailAttachment_Class.php");
class MailAttachmentService  {
	public function AddMailAttachment($mailAttachment){	
		$dbHelper = new DbHelper();
		$columnsName = "`MailId`,`FileName`,`FilePath`,`FileType`,`IsEnable`,`Remark`";
		
		$values = "'".$mailAttachment->MailId."','".$mailAttachment->FileName."','".$mailAttachment->FilePath."','".$mailAttachment->FileType."',"
			."'".$mailAttachment->IsEnable."','".$mailAttachment->Remark."'";
		return $dbHelper->Insert("MailAttachments", $columnsName, $values);
	}
	
	public function DeleteMailAttachmentById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("MailAttachments", $condition);
	}
	
	public function ModifyMailAttachment($mailAttachment){
		$dbHelper = new DbHelper();
		$set = "`MailId`='".$mailAttachment->MailId."',`FileName`='".$mailAttachment->FileName."',`FilePath`='".$mailAttachment->FilePath."',"
			."`FileType`='".$mailAttachment->FileType."',`IsEnable`='".$mailAttachment->IsEnable."',`Remark`='".$mailAttachment->Remark."'";
		$condition = "Id=".$mailAttachment->Id;
		return $dbHelper->Update("MailAttachments", $set, $condition);
	}
	
	private function GetMailAttachmentBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$mailAttachment = new MailAttachment();
			$mailAttachment->Id = $row["Id"];
			$mailAttachment->MailId = $row["MailId"];
			$mailAttachment->FileName = $row["FileName"];
			$mailAttachment->FilePath = $row["FilePath"];
			$mailAttachment->FileType = $row["FileType"];
			$mailAttachment->IsEnable = $row["IsEnable"];
			$mailAttachment->Remark = $row["Remark"];
			return $mailAttachment;
		}else{
			return null;	
		}
	}
	
	private function GetMailAttachmentsArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$mailAttachmentArray = array();
		while($row = mysql_fetch_array($result)){
			$mailAttachment = new MailAttachment();
			$mailAttachment->Id = $row["Id"];
			$mailAttachment->MailId = $row["MailId"];
			$mailAttachment->FileName = $row["FileName"];
			$mailAttachment->FilePath = $row["FilePath"];
			$mailAttachment->FileType = $row["FileType"];
			$mailAttachment->IsEnable = $row["IsEnable"];
			$mailAttachment->Remark = $row["Remark"];
			array_push($mailAttachmentArray, $mailAttachment);
		}
		return $mailAttachmentArray;
	}
	
	public function GetMailAttachmentById($id){
		$sql = 'SELECT * FROM MailAttachments WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetMailAttachmentBySql($sql);
	}
	
	public function GetMailAttachmentByMailId($mailId){
		$sql = 'SELECT * FROM MailAttachments WHERE IsEnable = 1 AND MailId = '.$mailId;
		return $this->GetMailAttachmentsArrayBySql($sql);
	}
	
	public function GetMailAttachmentByMailIdAndFileType($mailId, $fileType){
		$sql = 'SELECT * FROM MailAttachments WHERE IsEnable = 1 AND MailId = '.$mailId. ' AND FileType = ' . $fileType;
		return $this->GetMailAttachmentsArrayBySql($sql);
	}
	
	public function GetAllMailAttachmentsByPage($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM MailAttachments WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM MailAttachments WHERE IsEnable = 1 ORDER BY Category, Status, CreateTime DESC LIMIT '.$begin.','.$pageSize;
		$mailAttachmentArray = $this->GetMailAttachmentsArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$mailAttachmentArray);
		return $result;
	}
}
?>