<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/FindClientPasswordService_Class.php");

$id = $_POST[id];
$password = trim($_POST[password]);
$randomKey = $_POST[key];

$clientService = new ClientService();
$client = $clientService->GetClientById($id);

$client->Password = sha1($password);
$result1 = $clientService->ModifyClientPassword($client);

$findClientPasswordService = new FindClientPasswordService();
$fcp = $findClientPasswordService->GetFindClientPasswordByRandomKey($randomKey);
$fcp->IsEnable = 0;
$result2 = $findClientPasswordService->ModifyFindClientPassword($fcp);

if($result1 && $result2){
	echo "<script type='text/javascript'>location.href='successResetPassword_client.php';</script>";
	$_SESSION[message] = "<span style='color:blue;'>Reset password successfully!</span>";
}
?>