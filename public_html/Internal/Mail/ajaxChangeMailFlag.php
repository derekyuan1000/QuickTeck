<?php
include_once("../DAL/MailInfoService_Class.php");

$mailId = $_GET[mailId];
$mailInfoService = new MailInfoService();
$mailInfo = $mailInfoService->GetMailInfoById($mailId);

//$now = date("Y-m-d H:i:s");
//$t = $_GET[t];
//$fd = fopen("test.txt", "a+");
//fputs($fd, "\r\n".$now."|".$t."|".$mailId."|".$mailInfo->MailFlag);
//fclose($fd);

if($mailInfo->MailFlag == 1){
	$mailInfoService->ModifyMailInfoMailFlag($mailId, 2);
	echo $mailId."|2";
}else if($mailInfo->MailFlag == 2){
	$mailInfoService->ModifyMailInfoMailFlag($mailId, 3);
	echo $mailId."|3";
}else if($mailInfo->MailFlag == 3){
	$mailInfoService->ModifyMailInfoMailFlag($mailId, 1);
	echo $mailId."|1";
}
?>