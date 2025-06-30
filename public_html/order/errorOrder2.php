<?php
//Send mail to cancel a order
//Writen By bin 2012.8.30
$number=$_GET['number'];
$type=$_GET['type'];
$cartId=$_GET['cartId'];
$eeOrderId=$_GET['eeOrderId'];
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
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderDetailService_Class.php");

if($type=="order"){
	$orderService = new OrderService();
	$order = $orderService->GetOrderByNumber($number);
	$orderDetailService = new OrderDetailService();
	$orderDetailArray = $orderDetailService->GetOrderDetailByOrderId($order->Id);
	if(count($orderDetailArray)>0){
		$orderDetail = $orderDetailArray[0];
	}

	if($_GET[key]!=$order->Remark){
		echo "<script type='text/javascript'>location.href='checkout.php?shoppingCartId=".$cartId."&eeOrderId=".$eeOrderId."';</script>";
		return;
	}else{
		$id = $order->Id;
		$order->IsDelete = 1;
		$orderService->ModifyOrderIsDelete($order);
		
		$eeOrderService = new EEOrderService();
		$pcbOrderInEEOrderArray = $eeOrderService->GetEEOrdersByPCBOrderNumber($order->Number);
		for($i=0; $i < count($pcbOrderInEEOrderArray); $i++){
			$eeOrder = $pcbOrderInEEOrderArray[$i];
			$eeOrder->IsEnable = 0;
			$eeOrderService->ModifyEEOrderIsEnable($eeOrder);
		}
		
		$dbHelper = new DbHelper();
		$dbHelper->Query("update OrderDetails set IsEnable=0 where OrderId=$id");
		echo "<script type='text/javascript'>location.href='checkout.php?shoppingCartId=".$cartId."&eeOrderId=".$eeOrderId."';</script>";
	}
}else if($type=="eeOrder"){
	$eeOrderService = new EEOrderService();
	$eeOrder = $eeOrderService->GetEEOrderById($eeOrderId);
	
	if($_GET[key]!=$eeOrder->SystemRandomCode){
		echo "<script type='text/javascript'>location.href='checkout.php?shoppingCartId=".$cartId."&eeOrderId=".$eeOrder->Id."';</script>";
		return;
	}else{
		$eeOrder->IsEnable = 0;
		$eeOrderService->ModifyEEOrderIsEnable($eeOrder);
		echo "<script type='text/javascript'>location.href='checkout.php?shoppingCartId=".$cartId."&eeOrderId=".$eeOrder->Id."';</script>";
	}
}
?>