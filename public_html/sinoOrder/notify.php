<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/SinoOrderService_Class.php");
$orderService = new OrderService();
$number = substr($_REQUEST['VendorTxCode'], 0, strpos($_REQUEST['VendorTxCode'], "-"));
$order = $orderService->GetSinoOrderByNumber($number);
$redirectFail = 'http://www.quick-teck.co.uk/order_completed/order_failed.php';
$redirectSuccess = 'http://www.quick-teck.co.uk/order_completed/order_completed.php?n='.$number.'&k='.$order->ClientRandomCode;

//$_REQUEST['VendorTxCode'] = "QU092141-30370-2041";
//strpos($_REQUEST['VendorTxCode'], "-") = 8
//strrpos($_REQUEST['VendorTxCode'], "-") = 14
//$price = substr($_REQUEST['VendorTxCode'], 8, 14-8-1)/100 = substr($_REQUEST['VendorTxCode'], 8, 5)/100
if (!empty($_REQUEST['Status']) && $_REQUEST['Status'] == 'OK') {
	$price = substr($_REQUEST['VendorTxCode'], strpos($_REQUEST['VendorTxCode'], "-")+1, strrpos($_REQUEST['VendorTxCode'], "-")-strpos($_REQUEST['VendorTxCode'], "-")-1)/100;
      @mail("info@quick-teck.co.uk", "Order " . $_REQUEST['VendorTxCode'] . " paid online", "An order has just been processed and paid for on the system. Details follow:

 Transaction ID: {$_REQUEST['VendorTxCode']}
 Status Details: {$_REQUEST['StatusDetail']}
 Transaction Authorisation Code: {$_REQUEST['TxAuthNo']}
 Payment Card Type: {$_REQUEST['CardType']}
 Last 4 Digits: {$_REQUEST['Last4Digits']}
 Total Price: $price",
 "From: info@quick-teck.co.uk\r\n" );
	die("Status=OK\r\nRedirectURL=" . $redirectSuccess);

	
} else {
	die("Status=INVALID\r\nRedirectURL=" . $redirectFail);
}
