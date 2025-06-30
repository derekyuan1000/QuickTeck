<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");

$number = trim($_POST[number]);
$random = trim($_POST[random]);

$orderService = new OrderService();
$clientService = new ClientService();

$order = $orderService->GetOrderByNumber($number);
if(!$order){
	$errorStr = "<span style='color:red;'>Invalid order number!</span><br/>";
	$_SESSION[errorSearchOrder] = array($number,$random);
	$_SESSION[message] = $errorStr;
	echo "<script type='text/javascript'>history.back();</script>";
}else{
	if($order->ClientRandomCode != $random){
		$errorStr = "<span style='color:red;'>Invalid reference number!</span><br/>";
		$_SESSION[errorSearchOrder] = array($number,$random);
		$_SESSION[message] = $errorStr;
		echo "<script type='text/javascript'>history.back();</script>";
	}else{
		$client = $clientService->GetClientById($order->ClientId);
		if($client->IsRegister){
			$errorStr = "<span style='color:red;'>You are already register!</span><br/>";
			$_SESSION[errorSearchOrder] = array($number,$random);
			$_SESSION[message] = $errorStr;
			echo "<script type='text/javascript'>history.back();</script>";
		}else{
			$_SESSION[searchOrder] = $order->ClientId;
			echo "<script type='text/javascript'>location.href='register_orderNumber2.php';</script>";
		}
	}	
}
?>