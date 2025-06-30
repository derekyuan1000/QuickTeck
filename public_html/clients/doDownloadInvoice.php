<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExpressService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
if(empty($_SESSION[currentClient])){
	//$_SESSION[returnPage] = "clientMain.php";
	//echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	//return;
}
$orderService = new OrderService();
$order = $orderService->GetOrderByNumber($_GET[number]);
if($_GET[key]==$order->Remark){
	if(copy("../Management/UploadFiles/".$order->Id.".pdf","../Management/DownloadInvoice/".$order->Remark.".pdf")){
		echo "<script type='text/javascript'>location.href='../Management/DownloadInvoice/".$order->Remark.".pdf';</script>";
	}
}
?>