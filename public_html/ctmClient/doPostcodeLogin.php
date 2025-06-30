<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
$postcode = trim($_POST[postcode]);
$orderId = $_POST[orderId];
$taskId = $_POST[taskId];
$orderService = new OrderService();
$order = $orderService->GetOrderById($orderId);

if($order && $order->ReceiverPostCode == $postcode){
	echo "<script type='text/javascript'>location.href='taskResponseList.php?taskId=".$taskId."&orderId=".$orderId."&key=".$order->Remark."';</script>";
}else{
	$_SESSION[message] = "<span style='color:red;'>Invalid  Postcode</span>";
	echo "<script type='text/javascript'>history.back();</script>";
}
?>