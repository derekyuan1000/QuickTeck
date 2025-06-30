<?php
session_start();
include_once("../DAL/ReplyMailInfoService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];

$replyMailInfoService = new ReplyMailInfoService();
$result = $replyMailInfoService->MyDeleteMail($id);

if($result){
	//echo "<script type='text/javascript'>location.href='../Mail/mailReplyList.php?page=".$page."';</script>";
	echo "<script type='text/javascript'>history.back();</script>";
}
?>