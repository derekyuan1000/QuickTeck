<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");

$val = $_GET[val];
$type = $_GET[type];
$val1 = $_GET[val1];
$val2 = $_GET[val2];

if($type == "adminLoginId"){
	CheckAdminLoginId($val);
}else if($type == "clientLoginId"){
	CheckClientLoginId($val);
}else if($type == "clientLoginId2"){
	CheckClientLoginId2($val1, $val2);
}else if($type == "clientNumber"){
	CheckClientNumber($val);
}else if($type == "orderNumber"){
	CheckOrderNumber($val);
}else if($type == "clientPostCode"){
		CheckClientPostCode($val);
	}

function CheckAdminLoginId($loginId){
	$adminService = new AdminService();
	$testAdmin = $adminService->GetAdminByLoginId($loginId);
	if($testAdmin){
		echo "Sorry! \"".$loginId."\" has been used!";
	}else{
		echo "Congratulations! \"".$loginId."\" is available for using.";
	}
}

function CheckClientLoginId($loginId){
	$clientService = new ClientService();
	$testClient = $clientService->GetClientByLoginId($loginId);
	if($testClient){
		echo "Sorry! \"".$loginId."\" has been used!";
	}else{
		echo "Congratulations! \"".$loginId."\" is available for using.";
	}	
}

function CheckClientLoginId2($loginId, $id){
	$clientService = new ClientService();
	$testClient = $clientService->GetClientByLoginId($loginId);
	if($testClient && $testClient->Id != $id){
		echo "Sorry! \"".$loginId."\" has been used!";
	}else{
		echo "Congratulations! \"".$loginId."\" is available for using.";
	}	
}

function CheckClientNumber($number){
	$clientService = new ClientService();
	$testClient = $clientService->GetClientByNumber($number);
	if($testClient){
		echo "Sorry! \"".$number."\" has been used!";
	}else{
		echo "Congratulations! \"".$number."\" is available for using.";
	}
}

function CheckOrderNumber($number){
	$orderService = new OrderService();
	$testOrder = $orderService->GetOrderByNumber($number);
	if($testOrder){
		echo "Sorry! Order Number \"".$number."\" has been used!";
	}else{
		echo "Congratulations! \"".$number."\" is available for using.";
	}
}

function CheckClientPostCode($postCode){
	$clientService = new ClientService();
	$testClient = $clientService->GetClientByPostCode($postCode);
	if($testClient){
		echo "This postcode was used by \"".$testClient->Name."(".$testClient->Number.")\"!";
	}else{
		echo "This postcode was not used";
	}
}
?>