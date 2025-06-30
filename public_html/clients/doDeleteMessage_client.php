<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientMain.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$id = $_GET[id];

$clientService = new ClientService();
$messageService = new MessageService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$message = $messageService->GetMessageById($id);
if($message->ClientId != $client->Id){
	echo "<script type='text/javascript'>location.href='messageList_client.php';</script>";
	return;
}else{
	$message->IsEnable = 0;
	$result = $messageService->ModifyMessageIsEnable($message);
	if($result){
		echo "<script type='text/javascript'>location.href='messageList_client.php';</script>";
	}
}
?>