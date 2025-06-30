<?php
include_once("../DAL/MailAttachmentService_Class.php");
$id = $_GET[Id];
$mailAttachmentService = new MailAttachmentService();
$mailAttachment = $mailAttachmentService->GetMailAttachmentById($id);

$ua = $_SERVER["HTTP_USER_AGENT"]; 
$filename = $mailAttachment->FileName;
$encoded_filename = urlencode($filename); 
$encoded_filename = str_replace("+", "%20", $encoded_filename); 
header("Content-type: application/octet-stream");

if (preg_match("/MSIE/", $ua)) { 
	header('Content-Disposition: attachment; filename="' . $encoded_filename . '"'); 
} else if (preg_match("/Firefox/", $ua)) { 
	header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"'); 
} else { 
	header('Content-Disposition: attachment; filename="' . $filename . '"'); 
}
readfile($mailAttachment->FilePath);
?>