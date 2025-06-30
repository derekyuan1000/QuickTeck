<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");

if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientMain.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$id = $_POST[id];
$oldPassword = trim($_POST[oldPassword]);
$newPassword = trim($_POST[password]);

$clientService = new ClientService();
$client = $clientService->GetClientById($id);
if($client->Password != sha1($oldPassword)){
	echo "<script type='text/javascript'>history.back();</script>";
	$_SESSION[message] = "<span style='color:red;'>Invalid  Old Password</span>";
	return;
}else{
	$client->Password = sha1($newPassword);
	$result = $clientService->ModifyClientPassword($client);
	if($result){
		echo "<script type='text/javascript'>history.back();</script>";
		$_SESSION[message] = "<span style='color:blue;'>Change Password Successfully!</span>";
	}
}
?>