<?php
//Send mail to cancel a order
//Writen By bin 2012.8.30
$number=$_GET['number'];
$from_ch="no-reply@quick-teck.co.uk";
$to_ch="info@quick-teck.co.uk";
$bcc="";
$subject="Order $number Cancelled";
$body="A order which order number is $number has been cancelled by client. Please delete it from sales system.";

include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/PdfMailer_Class.php");
$mail_ch = new PdfMailer(); 
$mail_ch->setFrom($from_ch); 
$mail_ch->setTo($to_ch);
$mail_ch->setBCC($bcc);
$mail_ch->setSubject($subject);
$mail_ch->buildTextMessage($body);
$send_ch = $mail_ch->sendMail();

//Del the order
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");

$orderService = new OrderService();
$order = $orderService->GetOrderByNumber($number);

if($_GET[key]!=$order->Remark){
	echo "<script type='text/javascript'>location.href='../clients/selectTakeOrderType.php';</script>";
	return;
}else{
	$id = $order->Id;
	$order->IsDelete = 1;
	$orderService->ModifyOrderIsDelete($order);
	
	$dbHelper = new DbHelper();
	//$dbHelper->Query("update orderdetails set IsEnable=0 where OrderId=$id");
	$dbHelper->Query("update OrderDetails set IsEnable=0 where OrderId=$id");
	echo "<script type='text/javascript'>location.href='../clients/selectTakeOrderType.php';</script>";
}
?>