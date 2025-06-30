<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];

$mailInfoService = new MailInfoService();
$result = $mailInfoService->MyDeleteMailInfo($id);

if($result){
	echo "<script type='text/javascript'>location.href='../Mail/mailAssignList.php?page=".$page."';</script>";
}
?>