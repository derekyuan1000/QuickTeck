<?php
session_start();
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/ReplyMailAttachmentService_Class.php");

$upFileArray=$_FILES["Filedata"];
$replyMailId = $_GET[replyMailId];

$name = $upFileArray["name"];
$type = $upFileArray["type"];
$size = $upFileArray["size"];
$error = $upFileArray["error"];
$tmp_name = $upFileArray["tmp_name"];
$pInfo = pathinfo($name);
$fileType = $pInfo['extension'];
$myTime = md5(microtime());

if($error!=0){
	$_SESSION[upload] = "<span style='color:red;'>Upload failed!</span>";
}else if($size > 31457280){
	$_SESSION[upload] = "<span style='color:red;'>File size must less than 30M!</span>";
}else if($size = 0){
	$_SESSION[upload] = "<span style='color:red;'>File size is zero!</span>";
}else if(is_uploaded_file($tmp_name)){
	$replyMailAttachmentService = new ReplyMailAttachmentService();
	$replyMailAttachment = new ReplyMailAttachment(0, $replyMailId, $name, "ReplyAttachments/".$myTime.".".$fileType, 1);
	$result = $replyMailAttachmentService->AddReplyMailAttachment($replyMailAttachment);
		
	if(move_uploaded_file($tmp_name, "ReplyAttachments/".$myTime.".".$fileType) && $result){
		$_SESSION[upload] = "<span style='color:blue;'>Upload successfully!</span>";
	}else{
		$_SESSION[upload] = "<span style='color:red;'>Upload failed!</span>";
	}
}else{
	$_SESSION[upload] = "<span style='color:red;'>Upload failed!</span>";
}
echo $_SESSION[upload];
?>