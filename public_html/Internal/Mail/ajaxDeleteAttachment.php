<?php
include_once("../DAL/ReplyMailAttachmentService_Class.php");
$attachmentId = $_GET[attachmentId];
$replyMailAttachmentService = new ReplyMailAttachmentService();
$replyMailAttachment = $replyMailAttachmentService->GetReplyMailAttachmentById($attachmentId);
$replyMailAttachment->IsEnable = 0;
$result = $replyMailAttachmentService->ModifyReplyMailAttachment($replyMailAttachment);
echo $result;
?>