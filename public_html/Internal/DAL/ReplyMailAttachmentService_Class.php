<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Internal/Models/ReplyMailAttachment_Class.php");
class ReplyMailAttachmentService  {
	public function AddReplyMailAttachment($replyMailAttachment){	
		$dbHelper = new DbHelper();
		$columnsName = "`MailId`,`FileName`,`FilePath`,`IsEnable`,`Remark`";
		
		$values = "'".$replyMailAttachment->MailId."','".$replyMailAttachment->FileName."','".$replyMailAttachment->FilePath."','".$replyMailAttachment->IsEnable."',"
			."'".$replyMailAttachment->Remark."'";
		return $dbHelper->Insert("ReplyMailAttachments", $columnsName, $values);
	}
	
	public function DeleteReplyMailAttachmentById($id){
		$dbHelper = new DbHelper();
		$condition = "Id=".$id;
		return $dbHelper->Delete("ReplyMailAttachments", $condition);
	}
	
	public function ModifyReplyMailAttachment($replyMailAttachment){
		$dbHelper = new DbHelper();
		$set = "`MailId`='".$replyMailAttachment->MailId."',`FileName`='".$replyMailAttachment->FileName."',`FilePath`='".$replyMailAttachment->FilePath."',"
			."`IsEnable`='".$replyMailAttachment->IsEnable."',`Remark`='".$replyMailAttachment->Remark."'";
		$condition = "Id=".$replyMailAttachment->Id;
		return $dbHelper->Update("ReplyMailAttachments", $set, $condition);
	}
	
	private function GetReplyMailAttachmentBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$row = mysql_fetch_array($result);
		if($row){
			$replyMailAttachment = new ReplyMailAttachment();
			$replyMailAttachment->Id = $row["Id"];
			$replyMailAttachment->MailId = $row["MailId"];
			$replyMailAttachment->FileName = $row["FileName"];
			$replyMailAttachment->FilePath = $row["FilePath"];
			$replyMailAttachment->IsEnable = $row["IsEnable"];
			$replyMailAttachment->Remark = $row["Remark"];
			return $replyMailAttachment;
		}else{
			return null;	
		}
	}
	
	private function GetReplyMailAttachmentsArrayBySql($sql){
		$dbHelper = new DbHelper();
		$result = $dbHelper->Query($sql);
		
		$replyMailAttachmentArray = array();
		while($row = mysql_fetch_array($result)){
			$replyMailAttachment = new ReplyMailAttachment();
			$replyMailAttachment->Id = $row["Id"];
			$replyMailAttachment->MailId = $row["MailId"];
			$replyMailAttachment->FileName = $row["FileName"];
			$replyMailAttachment->FilePath = $row["FilePath"];
			$replyMailAttachment->IsEnable = $row["IsEnable"];
			$replyMailAttachment->Remark = $row["Remark"];
			array_push($replyMailAttachmentArray, $replyMailAttachment);
		}
		return $replyMailAttachmentArray;
	}
	
	public function GetReplyMailAttachmentById($id){
		$sql = 'SELECT * FROM ReplyMailAttachments WHERE IsEnable = 1 AND Id = '.$id;
		return $this->GetReplyMailAttachmentBySql($sql);
	}
	
	public function GetReplyMailAttachmentByMailId($replyMailId){
		$sql = 'SELECT * FROM ReplyMailAttachments WHERE IsEnable = 1 AND MailId = '.$replyMailId;
		return $this->GetReplyMailAttachmentsArrayBySql($sql);
	}
	
	public function GetAllReplyMailAttachmentsByPage($pageSize, $currentPage){
		$dbHelper = new DbHelper();
		$sql = 'SELECT count(*) FROM ReplyMailAttachments WHERE IsEnable = 1';
		$count = $dbHelper->Select($sql);
		
		$begin = ($currentPage - 1) * $pageSize;
		$sql = 'SELECT * FROM ReplyMailAttachments WHERE IsEnable = 1 ORDER BY Category, Status, CreateTime DESC LIMIT '.$begin.','.$pageSize;
		$replyMailAttachmentArray = $this->GetReplyMailAttachmentsArrayBySql($sql);
		
		$result = array();
		array_push($result,$count[0][0]);
		array_push($result,$replyMailAttachmentArray);
		return $result;
	}
}
?>