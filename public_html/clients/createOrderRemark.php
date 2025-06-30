<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/DbHelper_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Order_Class.php");

$orderService = new OrderService();
for($i=0; $i < 1000; $i++){
	$order = $orderService->GetOrderById($i);
	if($order && $order->Remark==""){
		$a = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$b = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$c = array('1','2','3','4','5','6','7','8','9','0');
		$remark = "";
		for($j = 0; $j < 25; $j++){
			if(fmod(rand(0,9),3)==0){
				$remark.= $a[rand(0, 25)];
			}else if(fmod(rand(0,9),3)==1){
				$remark.= $b[rand(0, 25)];
			}else{
				$remark.= $c[rand(0,9)];
			}
		}
		
		$order->Remark=$remark;
		$dbHelper = new DbHelper();
		
		$set = "Remark='".$order->Remark."'";
		$condition = "Id=".$order->Id;
		$dbHelper->Update("Orders", $set, $condition);
	}
	echo $i." ";
}
?>