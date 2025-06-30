<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
$email = trim($_POST[email]);
$password = trim($_POST[password]);

$clientService = new ClientService();
$client = $clientService->GetClientByLoginId($loginId);
if(!$client || $client->Password != sha1($password)){
	$_SESSION[clientLogin] = $loginId;
	$_SESSION[message] = "<span style='color:red;'>Invalid  LoginId or Password</span>";
	echo "<script type='text/javascript'>history.back();</script>";
}else{
	$_SESSION[currentClient] = $loginId;
	if($_POST[returnPage]){
		unset($_SESSION[returnPage]);
		echo "<script type='text/javascript'>location.href='".$_POST[returnPage]."';</script>";
	}else{
		echo "<script type='text/javascript'>location.href='clientMain.php';</script>";
	}
}
?>