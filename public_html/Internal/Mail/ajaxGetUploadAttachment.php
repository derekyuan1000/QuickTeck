<?php
include_once("../DAL/ReplyMailAttachmentService_Class.php");
$replyMailId = $_GET[replyMailId];
$replyMailAttachmentService = new ReplyMailAttachmentService();
$replyMailAttachmentArray = $replyMailAttachmentService->GetReplyMailAttachmentByMailId($replyMailId);
$result = "";
for($i=0; $i < count($replyMailAttachmentArray); $i++){
	$result .= "<a href='downloadReplyAttachment.php?Id=".$replyMailAttachmentArray[$i]->Id."' target='_blank' style='font-weight:normal; color:black;'>".$replyMailAttachmentArray[$i]->FileName."</a>";
	$result .= "&nbsp;&nbsp;<a href='".$replyMailAttachmentArray[$i]->FilePath."' target='_blank' style='font-weight:normal; color:blue;'>Preview</a>";
	$result .= "&nbsp;&nbsp;<a href='#' onclick='ajaxDeleteAttachment(".$replyMailAttachmentArray[$i]->Id.")'><img alt='delete' src='../Images/b_drop.png' border='0' width='12'/></a>";
	if($i < count($replyMailAttachmentArray) - 1){
		$result .= "<br>";
	}
}
$result = count($replyMailAttachmentArray)."|".$result;
echo $result;
?>