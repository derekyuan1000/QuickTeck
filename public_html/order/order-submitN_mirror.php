<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderCommentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/PdfMailer_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Client/doQuote2.php");

if($_POST[isLogin] == "yes"){
	$isLogin = true;
}else{
	$isLogin = false;
}

if($isLogin && empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "../order/takeorder.php?isLogin=yes";
	echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
	return;
}

if(empty($_SESSION[shoppingCartId])){
	$shoppingCartId = mktime();
	$_SESSION[shoppingCartId] = $shoppingCartId;
}else{
	$shoppingCartId = $_SESSION[shoppingCartId];
}

if(!$_POST[firstName]){
	echo "<script type='text/javascript'>location.href='../clients/selectTakeOrderType.php';</script>";
	return;
}

$echoMessage =  "<b>Submit process...... </b><br/>";
$to = "pcb_prototype@hotmail.co.uk,info@quick-teck.co.uk";//English Email To
$from = $_POST['email'];//English Email From
$to_ch = "1206200302@qq.com,1120275135@qq.com,chenglong-1912@hotmail.com,1203911670@qq.com";//Chinese Email To
$from_ch = "quickte2@cl84.justhost.com";//Chinese Email From
$bcc = "1226983621@qq.com";//English and Chinese Email BCC

//$headers2 = "From: info@quick-teck.co.uk"; 
//$subject2 = "Thank you for contacting us"; 
//$autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usualy within 24 hours. If you have any more questions, please consult our website at www.quick-teck.co.uk";
//$subject = "PCB order form(".$number.")"; 
$headers = "From:$from\r\nBCC:$bcc\r\nContent-type:text/html; charset=utf-8";

$target = "../../public_ftp/incoming/"; 
$target = $target . basename( $_FILES['uploaded']['name']) ; 
$uploadok = 1; 

$firstName = trim($_POST[firstName]);
$surname = trim($_POST[surname]);
$company = trim($_POST[company]);
$telephone = trim($_POST[phone]);
$email = trim($_POST[email]);
$countryId = $_POST[country];
$country = Common::GetCountryById($countryId);
$cityTown = trim($_POST[cityTown]);
$postcode = trim($_POST[deliverypostcode]);
$addressLineOne = trim($_POST[deliveryaddress1]);
$addressLineTwo = trim($_POST[deliveryaddress2]);

$body = "We have received an order request.<br>
		The uploaded CAM file is:\" ". basename( $_FILES['uploaded']['name']). " \" <br>
		The order information is the following: <br><br>";
$body.= "Firstname: ".$firstName."<br>";
$body.= "Surname: ".$surname."<br>";
$body.= "Organization/Company: ".$company."<br>";
$body.= "Email: ".$email."<br>";
$body.= "Phone number: ".$telephone."<br>";
$body.= "Shipping address line1: ".$addressLineOne."<br>";
$body.= "Shipping address line2: ".$addressLineTwo."<br>";
$body.= "Town/City: ".$cityTown."<br>";
$body.= "Postcode: ".$postcode."<br>";
$body.= "Country: ".$country."<br>";

$body.= "Layer: ".$_POST[layer]."<br>";
$body.= "Quantity: ".$_POST[quantity]."<br>";
$body.= "Length: ".$_POST[length]."<br>";
$body.= "Width: ".$_POST[width]."<br>";
switch ($_POST[material]){
	case 0:$body.= "Material: FR4 Tg 130 (standard)<br>";$materialType="FR4 Tg 130 (standard)";break;
	case 1:$body.= "Material: FR4 H Tg 170<br>";$materialType="FR4 H Tg 170";break;
}
$body.= "Thickness: ".$_POST[thickness]."<br>";
$body.= "Copper weight: ".$_POST[weight]."<br>";
$body.= "Soldermask: ".$_POST[soldermask]."<br>";
$body.= "Silkscreen: ".$_POST[silkscreen]."<br>";
switch ($_POST[surface]){
	case 1:$body.= "Surface: HASL(Not RoHS compliance)<br>";$surface = "HASL(Not RoHS compliance)";break;
	case 2:$body.= "Surface: HASL(Lead free)<br>";$surface = "HASL(Lead free)";break;
	case 3:$body.= "Surface: Electrolytic Gold<br>";$surface = "Electrolytic Gold";break;
	case 4:$body.= "Surface: OSP<br>";$surface = "OSP";break;
	case 5:$body.= "Surface: Electroless Nickel/Immersion Gold<br>";$surface = "Electroless Nickel/Immersion Gold";break;
}
$body.= "Delivery days: ".$_POST[days]."<br>";
switch ($_POST[sameDesign]){
	case 0:$body.= "Repeat order: No<br>";$sameDesign="No";break;
	case 1:$body.= "Repeat order: Yes(Order Number: ".$_POST[historyOrderNumber].")<br>";$sameDesign="Yes";break;
}
switch ($_POST[prototype]){
	case 0:$body.= "Saving option: No<br>";$prototype="No";break;
	case 1:$body.= "Saving option: Yes<br>";$prototype="Yes";break;
}
switch ($_POST[stencilType]){
	case 1:$stencilType1="only top";break;
	case 2:$stencilType1="only bottom";break;
	case 3:$stencilType1="both top & bottom";break;
}
switch ($_POST[needStencil]){
	case 0:$body.= "Need laser stencil: No<br>";$needStencil="No";break;
	case 1:$body.= "Need laser stencil: Yes(".$stencilType1.")<br>";$needStencil="Yes";break;
}

//switch ($_POST[tech]){
//	case 0:$body.= "The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: No<br>";$tech="No";break;
//	case 1:$body.= "The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: Yes<br>";$tech="Yes";break;
//}
switch ($_POST[haveVAT]){
	case 0:$body.= "Have VAT number: No<br>";$haveVAT="No";break;
	case 1:$body.= "Have VAT number: Yes<br>";$haveVAT="Yes";break;
}
if($_POST[haveVAT]){
	$body.= "VAT number: ".$_POST[VATNumber]."<br>";
}

$body.= "Total price: ".$_POST[total]."<br>";
if($_POST[total] == 0){
	$body.= "Total price: Contact us<br>";
}else{
	$body.= "Total price: ".$_POST[total]."<br>";
}
if($_POST[haveVAT] && $_POST[VATNumber]){
	$body.= "exc VAT price: ".$_POST[total]."<br>";
}else{
	$body.= "exc VAT price: ".round($_POST[total] / 1.2, 2)."<br>";
}
$body.= "Message: ".$_POST["message"]."<br>";
$body.= "Terms and conditions: ".$_POST["terms"]."<br>";

//----------------------------------Auto add order to Quick-teck Management system----------------------------------
try{
	$orderService = new OrderService();
	$holidayService = new HolidayService();
	$clientService = new ClientService();
	$orderDetailService = new OrderDetailService();
	
	$now = date("Y-m-d H:i:s");
	if($isLogin){	
		$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
		$clientId = $client->Id;
	}else{
		$tempClient = $clientService->GetClientByNameAndEmail($firstName, $surname, $email);
		if(!$tempClient){
			$maxNumberClient = $clientService->GetMaxNumberClient();
			$clientNumber = $maxNumberClient->Number;
			$clientNumber = $clientNumber + 1;
			$loginId = $firstName.$surname.mt_rand(1000, 9999);
			$password = "0000";
			$client = new Client(0, $loginId, sha1($password), $clientNumber, $clientName, $contact, $address, $telephone, 
				$email, $postcode, $countryId, 0, 1, "",
				$firstName, $surname, $cityTown, $addressLineOne, $addressLineTwo, $company, $now, $loginId);
			$clientId = $clientService->AddClient($client);
			if($clientId){
				$body .= "<br>Auto add a new client to Quick-teck Management system successfully!(Client Number:".$clientNumber.")";
			}
			$_SESSION[noLoginClient] = $loginId;
		}else{
			$clientId = $tempClient->Id;
			$_SESSION[noLoginClient] = $tempClient->LoginId;
		}
		
	}
	
	$dateArray = explode('-', date("Y-m-d"));	
	$year = $dateArray[0];
	$month = $dateArray[1];
	$day = $dateArray[2];
	$standard = $year."-".$month."-".$day." 10:30:00";
	$orderTime = $year."-".$month."-".$day." 00:00:00";
	if($now < $standard){
		$tempDay = $holidayService->GetHolidayByBasicDate($year."-".$month."-".$day);
		$isHoliday = $tempDay->IsHoliday;
		if($isHoliday == 1){
			$dateArray = $holidayService->GetTargetDay($orderTime, 1);
			$orderTime =  $dateArray[count($dateArray)-1]->BasicDate;
		}
	}else{
		$dateArray = $holidayService->GetTargetDay($orderTime, 1);
		$orderTime =  $dateArray[count($dateArray)-1]->BasicDate;
	}
	$number = Common::GetNewOrderNumber($_POST[country]);
	$workingDays = $_POST[days];
	$dateArray = $holidayService->GetTargetDay($orderTime, $workingDays);
	$targetDate =  $dateArray[count($dateArray)-1]->BasicDate;
	$expectToGZDate = $targetDate;
	$totalPrice = trim($_POST[total]);
	$quantity = trim($_POST[quantity]);
	$width = trim($_POST[width]);
	$length = trim($_POST[length]);
	$layer = trim($_POST[layer]);
	if($layer==1 || $layer == 2){
		if($workingDays >= 7){
			$days = 5;
		}else{
			$days = 2;
		}
	}else if($layer==4 || $layer == 6 || $layer == 8){
			if($workingDays >= 7){
				$days = 7;
			}else{
				$days = 5;
			}
		}
	$dateArray2 = $holidayService->GetDay($orderTime, $days);
	$expectToGZDate =  $dateArray2[count($dateArray2)-1]->BasicDate;
	$comment = $layer."层板，".$quantity."块，".$width."mm*".$length."mm";
	$productDescription = "PCB:".basename($_FILES['uploaded']['name'])."\n".$_POST[layer]."layer PCBs based on Quick-teck standard specifications.\n(".$materialType.", "
		.$_POST[thickness]."mm thickness, ".$_POST[weight]."oz copper, ".$_POST[silkscreen]." Silkscreen, ".$_POST[soldermask]." Solder mask, ".$surface." finish)";
	$receiverName = trim($_POST[name]);
	$receiverEmail = $email;
	$receiverTelephone = $telephone;
	$receiverPostcode = $postcode;
//	if($isLogin){
//		$receiverAddress = trim($_POST[name])."\n".trim($_POST[address])."\n".trim($_POST[deliverypostcode])."\n".$country;
//	}else{
//		$receiverAddress = trim($_POST[name])."\n".trim($_POST[deliveryaddress1])."\n".trim($_POST[deliveryaddress2])."\n".trim($_POST[deliverypostcode])."\n".$country;
//	}
	$clientRandomCode = mt_rand(100000, 999999);
	$factoryQuote = GetFactoryQuote($layer, $quantity, $length, $width, $_POST[thickness], $_POST[weight], $surface);//doQuote2.php
	
	/*---------------------------------------Insert to DB---------------------------------------*/
	$tempOrder = $orderService->GetOrder01($orderTime, $totalPrice, $quantity, $email);
	if(!$tempOrder){
		$a = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$b = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$c = array('1','2','3','4','5','6','7','8','9','0');
		$remark = "";
		for($i = 0; $i < 25; $i++){
			if(fmod(rand(0,9),3)==0){
				$remark.= $a[rand(0, 25)];
			}else if(fmod(rand(0,9),3)==1){
					$remark.= $b[rand(0, 25)];
				}else{
					$remark.= $c[rand(0,9)];
				}
		}
		//Insert Order			
		$order = new Order(0, $number, $orderTime, $workingDays, $targetDate, null, $expectToGZDate, null, null, $totalPrice, $factoryQuote, 400, 0, $comment, $quantity, 
			$productDescription, $receiverName, $receiverAddress, $receiverTelephone, $receiverEmail, $receiverPostcode,
			null, $clientRandomCode, 0, 0, null, $clientId, null, null, 1, 0, $remark, false,
			0, 0, 0, 0, 0,
			0, 0, 0.0, 0.0, 0.0,
			true,true,true,true,true,
			$now, $now, $now, $now, $now,
			"","","","","","","","","","",
			$countryId, $firstName, $surname, $cityTown, $addressLineOne, $addressLineTwo, $company);
			
		$result1 = $orderService->AddOrder($order);
		//Insert Order Processing
		$orderProcessingService = new OrderProcessingService();
		$orderProcessing = new OrderProcessing(0, $result1, 1, 8, $now);
		$result2 = $orderProcessingService->AddOrderProcessing($orderProcessing);
		//Insert Order Comment
		if($comment != ""){
			$orderCommentService = new OrderCommentService();
			$orderComment = new OrderComment(0, $result1, $comment, 8, $now);
			$result3 = $orderCommentService->AddOrderComment($orderComment);
		}else{
			$result3 = 1;	
		}
		//Use voucher
		$voucherNumber = trim($_POST[voucherNumber]);
		$voucherService = new VoucherService();
		$voucher = $voucherService->GetVoucherByNumber($voucherNumber);
		if($voucher){
			if($voucher->Status == 1 && $voucher->BeginTime <= $now && $voucher->ExpiredTime >= $now){
				if($voucher->Category == 1){
					$voucher->Status = 2;
					$voucher->UsedTime = $now;
					$voucher->OrderNumber = $number;
					$result4 = $voucherService->ModifyVoucher($voucher);
				}else{
					$result4 = true;
				}
				if($result4){
					$body .= "<br>Use voucher successfully!Voucher Number:".$voucher->Number."(".ceil($voucher->Percent)."%(£".$voucher->MaxPrice.")".")";
				}else{
					$voucherNumber = "";
				}
			}
		}
		//Insert Order Detail
		$orderDetail = new OrderDetail(0, $result1, $layer, $quantity, $length, $width, $materialType, $_POST[thickness],
			$_POST[weight], $_POST[soldermask], $_POST[silkscreen], $surface, $workingDays, $_POST[sameDesign], $_POST[needStencil],
			$_POST[tech], $_POST[haveVAT], $_POST[VATNumber], $voucherNumber, $_POST[price0], $_POST[price1], $_POST[price2],
			$_POST[price3], $_POST[price4], $_POST[price5], $_POST[price6], $_POST[price7], $_POST[price8], $_POST[price9],
			$_POST[price10] , $_POST[price11], $_POST[price12], $_POST[price13], $_POST[price14], $_POST[price15], $_POST[price16],
			$totalPrice, 1, null, $_POST[prototype],
			$_POST[stencilType],0,0,0,0,
			0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,
			true,true,true,true,true,
			$now,$now,
			$_POST[historyOrderNumber],$shoppingCartId,"","","");
		$result5 = $orderDetailService->AddOrderDetail($orderDetail);
		
		if($result1 && $result2 && $result3 && $result5){
			$body .= "<br>Auto add a new order to Quick-teck Management system successfully!(Order Number:".$number.")";
		}
	}
}catch(Exception $e){
	$body .= "<br>Auto add a new order to Quick-teck Management system failed!<br>".$e;
}
$subject = "PCB order form(".$number.")";
$send = mail($to, $subject, $body, $headers);

//--------------------------------------------Send  Chinese Email--------------------------------------------
//This is our size condition 
if ($uploaded_size > 10000000) { 
	$echoMessage .= "<font size=\"2\" color=\"FF0033\">Your file is too large.</font><br>"; 
	$uploadok = 0; 
} 
//This is our limit file type condition 
if ($uploaded_type =="text/php") { 
	$echoMessage .= "<font size=\"2\" color=\"FF0033\">No PHP files</font><br>"; 
	$uploadok = 0; 
} 
//Here we check that $ok was not set to 0 by an error 
if ($uploadok == 0){ 
	$echoMessage .= "<font size=\"2\" color=\"FF0033\">Sorry your file was not uploaded. Please contact with info@quick-teck.co.uk for help</font><br>"; 
} else {
	//If everything is ok we try to upload it
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){ 
		$echoMessage .= "<b>Your file \" ". basename( $_FILES['uploaded']['name']). " \" has been uploaded!  <br> ............... <br> Done! </b><br>"; 
	} else { 
		$echoMessage .= "<font size=\"2\" color=\"FF0033\">Sorry, there was a problem uploading your file. Please contact with info@quick-teck.co.uk for help</font><br>"; 
		$uploadok = 0;
	} 
}

if(!$tempOrder){
	$subject_ch =" 下单，单号：".$number;
	switch ($_POST[soldermask]){
		case "only top":$soldermask_ch = "阻焊颜色：顶层绿色<br>";break;
		case "only bottom":$soldermask_ch = "阻焊颜色：底层绿色<br>";break;
		case "both sides":$soldermask_ch = "阻焊颜色：双面绿色<br>";break;
		case "no":$soldermask_ch = "阻焊：无<br>";break;
	}
	switch ($_POST[silkscreen]){
		case "only top":$silkscreen_ch = "丝印：顶层白色<br>";break;
		case "only bottom":$silkscreen_ch = "丝印：底层白色<br>";break;
		case "both sides":$silkscreen_ch = "丝印：双面白色<br>";break;
		case "no":$silkscreen_ch = "丝印：无<br>";break;
	}
	switch ($_POST[surface])
	{
		case 1:$surface_ch = "有铅喷锡";break;
		case 2:$surface_ch = "无铅喷锡";break;
		case 3:$surface_ch = "镀金";break;
		case 4:$surface_ch = "抗氧化";break;
		case 5:$surface_ch = "沉金";break;
	}
	if($layer == 1 || $layer == 2) {
		if($workingDays == 5){
			$day_ch = 2;
		}else if($workingDays == 6){
				$day_ch = 3;
			}else{
				$day_ch = 4;
			}
	}else{
		if($workingDays == 8){
			$day_ch = 5;
		}else{
			$day_ch = 7;
		}
	}
	$body_ch = "您好，下一个单，单号：".$number."。具体文件见附件<br><br>
			数量：".$quantity."片，要求真空包装。如有多余，请单独另外包装<br>
			大小：".$width."mm*".$length."mm<br>
			层数：".$layer."层板<br>
			板材：".$materialType."<br>
			".$soldermask_ch.$silkscreen_ch."
			厚度：".$_POST[thickness]."毫米<br>
			copper weight：".$_POST[weight]."oz厚<br>
			表面工艺：".$surface_ch."<br><br>
			注意事宜：我的板不要贵司的编号 打上我们的单号就可以。此单号为".$number."<br>
			如果此订单有多个拼板，请按照顺序在每个板子的订单号的最后增加A、B、C等，比如<br>
			此订单为：".$number."A、".$number."B，以此类推。<br><br>
			工期：要求从下单后最多".$day_ch."天后送货<br><br>
			快递地址：<br>
			广州市新怡印务有限公司 广东省广州市天河区大观中路 490号<br>
			张兆伟, 联系电话:13802977980<br>
			快递公司：请选用联昊通或顺丰<br><br>
			如有问题，请email我邮箱1206200302@qq.com,1120275135@qq.com<br>
			谢谢";
	$mail_ch = new PdfMailer();
	$mail_ch->setFrom($from_ch);
	$mail_ch->setTo($to_ch);
	$mail_ch->setBCC($bcc);
	$mail_ch->setSubject($subject_ch);
	$mail_ch->buildTextMessage($body_ch);
	if(is_file($target)){
		$mail_ch->appendFiles($target, basename( $_FILES['uploaded']['name']));
	}
	$send_ch = $mail_ch->sendMail();
}
//--------------------------------------------Auto send Email end--------------------------------------------

if($send && $send_ch){
	$echoMessage .= "<b>You have successfully submitted your order information!</b>"; 
} else {
	$echoMessage .= "<font size=\"2\" color=\"FF0033\">We encountered an error sending your mail, please notify info@quick-teck.co.uk</font>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script src="../Management/Scripts/order.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/jquery-1.4.2.js"></script>
<script type="text/javascript">
	var jq = jQuery.noConflict();
	jq(document).ready(function() {
		jq(".h2_cat").mousemove(function() {
			jq(this).addClass("h2_cat active_cat");
		}).mouseout(function() {
			jq(this).removeClass("active_cat");
		});
	});
</script>
<link rel="Stylesheet" href="../Management/Styles/menu.css" type="text/css"  />
<link rel="stylesheet" href="../images/CSS.CSS" type="text/css"/>
<style type="text/css">
<!--
.style1 {
				margin-bottom: 0px;
}
.style2 {
				font-size:large;
				font-weight:bold;
}
.style3 {
				text-align: left;font-size: small;border: 1px solid #C0C0C0;
}
.style4 {
				font-size: x-small;color:blue;
}
.style5 {
				font-size:large;
				font-weight:bold;
			    color:blue;
}
.style6 {
				color: #FF8040;cursor:pointer;
}
.style7 {	
				color:blue;
}
.style8 {
				font-size:12px;font-family:Arial;font-style:italic;font-weight:bold;			
}
.style10 {
                font-size: x-small;color: #FE680A;
}
.style11 {
				text-align: center;
}
.style13 {
				color: #FE680A;
}
.style14 {
				color: #FF6600;
}
.style15 {
				font-size: medium;color: #FF6600;
}
.style16 {
				font-size: small;			
}
.style17 {
				font-size: small;color:white;background:#3366CC;
}
.style18 {
				font-size: small;
}
.style31 {
				border: 1px solid #C0C0C0;
}
#tableMessage td{
	border: 1px solid #C0C0C0;
}
-->
</style>

<script language=JavaScript> 
<!--
var bannerAD=new Array(); 
var bannerADlink=new Array(); 
var adNum=0; 

bannerAD[0]="/images/pcb1.jpg"; 
bannerADlink[0]="/design/design_quote.php"

bannerAD[1]="/images/pcb2.jpg"; 
bannerADlink[1]="/design/design_quote.php"

bannerAD[1]="/images/pcb3.gif"; 
bannerADlink[1]="/design/design_quote.php"

var preloadedimages=new Array(); 
for (i=1;i<bannerAD.length;i++){ 
preloadedimages[i]=new Image(); 
preloadedimages[i].src=bannerAD[i]; 
} 

function setTransition(){ 
if (document.all){ 
bannerADrotator.filters.revealTrans.Transition=Math.floor(Math.random()*23); 
bannerADrotator.filters.revealTrans.apply(); 
} 
} 

function playTransition(){ 
if (document.all) 
bannerADrotator.filters.revealTrans.play() 
} 

function nextAd(){ 
if(adNum<bannerAD.length-1)adNum++ ; 
else adNum=0; 
setTransition(); 
document.images.bannerADrotator.src=bannerAD[adNum]; 
playTransition(); 
theTimer=setTimeout("nextAd()", 5000); 
} 

function jump2url(){ 
jumpUrl=bannerADlink[adNum]; 
jumpTarget='_blank'; 
if (jumpUrl != ''){ 
if (jumpTarget != '')window.open(jumpUrl,jumpTarget); 
else location.href=jumpUrl; 
} 
} 
function displayStatusMsg() { 
status=bannerADlink[adNum]; 
document.returnValue = true; 
} 
function closeDiv(){
	$("mscroll").style.display = "none";
}
function myOpen(url,height,width){
window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
}

function toTakeOrder(isLogin){
	if(isLogin=="yes"){
		location.href = "takeorder.php?isLogin=yes";
	}else{
		location.href = "takeorder.php";
	}
}
function toCheckout(){
	//if(confirm('Do you confirm to checkout?')){
		location.href = "checkout.php";
	//}
}
//--> 
</script>
</head>
<body BGCOLOR=#cccc99 leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" LANGUAGE=javascript>
<!--Counter-->
<!--Something Here-->
<?php include("../Management/Client/topper.php") ?>
<table width="778" border="0" cellspacing="0" cellpadding="0" align="center" background="/images/index_bg.gif">
  <tr> 
    <td width="214" valign="top"> 
      <table width="214" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td valign="top"><br/>
			<?php include("../Management/Client/menu.php") ?>
          </td>
        </tr>
        <tr>
		   <td>
			<!--Ad1.Begin-->
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="50">
              <tr> 
                <td align="center" style="width: 214px"> 
					<table  border="0" cellpadding="1" cellspacing="2" bgcolor="#E8E8E8" style="width: 170px">
						<tr>
						  <td bgcolor="#FFFFFF"><a onMouseOver="displayStatusMsg();return document.returnValue" href="javascript:jump2url()">
							<img src="/images/pcb3.gif" name=bannerADrotator width=176 height=120 border=0 align="middle" alt="" style="FILTER: revealTrans(duration=2,transition=40)"/></a>
							  <script language=JavaScript>nextAd()</script></td>
						</tr>
					</table> 
                </td>
              </tr>
            </table>
          </td>
		</tr>
		<!--Ad1.End-->

		<!--Ad2.Begin-->
		<tr>
			<td>
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="88">
              <tr> 
                <td align="center"> 
					<table style="width: 180px" >
					<tr>
					  <td><a href="/payment/pay_methods.php"><img src="/images/paypal_logo.gif" border="0" alt="by PalPal"></a>
					  </td>
					</tr>
					</table> 
                </td>
              </tr>
            </table>
            </td>
		</tr>
		<!--Ad2.End-->

		<!--Ad3.Begin-->
		<tr>
		<td>
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="58" >
              <tr> 
                <td align="center"> 
				   <table style="width: 180px" >
						<tr>
						  <td><a href="/stencil/buy_stencil.php"><img src="/images/want_stencil.gif" border="0" alt="stencil"></a>
						  </td>
						</tr>
					</table> 
                </td>
              </tr>
            </table>
        </td>
		</tr>
		<!--Ad3.End-->
      </table>
    </td>
    <td valign="top" style="width: 563px"> 
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px; height: 417px">
        <tr valign="top"> 
          <td> 
			<!--IndexPage.Content.Begin-->
			<?php include("../Management/Client/row1.php") ?> 
		  </td>
		</tr>
  		<tr><td colspan="2" style="height: 13px"></td></tr>  
        <tr> 
			<td class="style31">
<table id="tableMessage" style=" font-size:large;font-weight:bold; border:1px solid #FFFFCC; border-collapse:collapse; width:98%;" align="center"; border="0" cellspacing="0">
	<tr><td colspan="2" align="center" class="style5">Shipping information<br></td></tr>
	<tr><td class="style1" style="width: 142px">Firstname: </td><td class="style1"> <?php echo $firstName; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Surname: </td><td class="style1"> <?php echo $surname; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Organization/Company: </td><td class="style1"> <?php echo $company;?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Email: </td><td class="style1"> <?php echo $email;?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Phone number: </td><td class="style1"> <?php echo $telephone; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Shipping address line1: </td><td class="style1"><?php echo $addressLineOne; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Shipping address line2: </td><td class="style1"><?php echo $addressLineTwo ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Town/City: </td><td class="style1"> <?php echo $cityTown ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Postcode: </td><td class="style1"> <?php echo $postcode ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Country: </td><td class="style1"> <?php echo $country ?><br></td></tr>
	<tr>
	  <td colspan="2" align="center" class="style5">PCB job information<br></td></tr>
	<tr><td class="style1" style="width: 142px">Board layer: </td>
		<td class="style1"> 
		<?php
			switch ($_POST['layer'])
			{
				case 1:echo "1 layer";break;
				case 2:echo "2 layers";break;
				case 4:echo "4 layers";break;
				case 6:echo "6 layers";break;
				case 8:echo "8 layers";break;
				default:echo "You have select an incorrect layer number";
			}
		?>
		<br>
		</td>
	</tr>
	<tr><td class="style1" style="width: 142px">Quantity: </td><td class="style1"> <?php echo $_POST['quantity']; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Length(mm): </td><td class="style1"> <?php echo $_POST['length']; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Width(mm): </td><td class="style1"> <?php echo $_POST['width']; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Material: </td><td class="style1"> <?php echo $materialType; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Thickness: </td><td class="style1"> <?php echo $_POST['thickness']."mm";?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Copper weight: </td><td class="style1"> <?php echo $_POST['weight']."oz";?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Solder mask: </td><td class="style1"> <?php echo $_POST['soldermask']; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Silkscreen: </td><td class="style1"> <?php echo $_POST['silkscreen']; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Surface finish: </td>
		<td class="style1">
		<?php
			switch ($_POST['surface'])
			{
				case 1:echo "HASL(Not RoHS compliance)";break;
				case 2:echo "HASL(Lead free)";break;
				case 3:echo "Electrolytic Gold";break;
				case 4:echo "OSP";break;
				case 5:echo "Electroless Nickel/Immersion Gold";break;
				default:echo "You have select an incorrect finish option.";
			}
		?>
		<br>
		</td>
	</tr>
	<tr><td class="style1" style="width: 142px">Lead time: </td>
		<td class="style1"> 
		<?php
			switch ($_POST['days'])
			{
				case 5:echo "5 working days";break;
				case 6:echo "6 working days";break;
				case 7:echo "7 working days";break;
				case 8:echo "8 working days";break;
				case 10:echo "10 working days";break;
				case 12:echo "12 working days";break;
				case 20:echo "Laid-back Price(15-20 working days)";break;
				default:echo "You have select an incorrect lead time.";
			}
		?>
		<br>
		</td>
	</tr>
	<tr><td class="style1" style="width: 142px">Repeat order: </td><td class="style1"> <?php if($sameDesign == "Yes"){echo $sameDesign."(Order Number: ".$_POST[historyOrderNumber].")";}else{echo $sameDesign;} ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Saving option: </td><td class="style1"> <?php echo $prototype; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Need laser stencil: </td><td class="style1"> <?php if($needStencil == "Yes"){echo $needStencil."(".$stencilType1.")";}else{echo $needStencil;} ?><br></td></tr>
	<tr style="display:none">
		<td class="style1" style="width: 142px">The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: </td>
		<td class="style1"> <?php echo $tech; ?><br></td>
	</tr>
	<?php if($country != "UK"){ ?>
	<tr><td class="style1" style="width: 142px">Have VAT number: </td><td class="style1"> <?php echo $haveVAT; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">VAT number: </td><td class="style1"> <?php echo $_POST['VATNumber']; ?><br></td></tr>
	<?php } ?>
	<tr><td class="style1" style="width: 142px">Total price(&pound;): </td><td class="style1"> <?php echo $_POST['total']; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">PCB file upload: </td>
		<td class="style1"> 
		<?php 
		if ($uploadok == 0) {
			echo "<font size=\"2\" color=\"FF0033\">Sorry your file was not uploaded. Please close this window and try again. Alternatively, you can send the file to info@quick-teck.co.uk </font>";
		} else {
			echo "\"".basename( $_FILES['uploaded']['name'])."\" file uploaded.";
		}
		?> 
		<br>
		</td>
	</tr>
	<tr><td class="style1" style="width: 142px">Terms &amp; conditions: </td>
		<td class="style1"> 
		<?php 
			if($_POST['terms']=="on"){
				echo "Agreed";
			} else {
				echo "<font size=\"2\" color=\"FF0033\">Please close this window go back to the previous page to accept terms and conditions. </font>";
			}
		 ?> 
		<br>
		</td>
	</tr>
</table>
<table style="font-size:large;font-weight:bold; width:100%">
	<tr class="style2">
		<td>
<br>
The above are this order information. If you see any warning messages(in red colour) in this table please click <a style="color:#FF6600" href="/clients/selectTakeOrderType.php">here</a> to re-submit your order. Otherwise, please select one of the following two buttons to the next step.<br>
<br>

		</td>
	</tr>
	<tr style="background-color:#D7D59D; color:#344b50; font-weight:bold; font-size:16px">
		<td align="center" style="font-size: 14px;">
			<input type="button" value="Order another PCB job" style="width: 180px; height: 35px;" class="style17" onclick="toTakeOrder(<?php if($isLogin){echo "'yes'"; }else{echo "'no'";} ?>)">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="Check out" style="width: 180px; height: 35px;" class="style17" onclick="toCheckout()">
		</td>
	</tr>
</table>			

				</td>
              </tr>
            </table>
<!--IndexPage.Content.End-->
            <table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
                <td> <b><font size="3"><br>
                  </font></b> 
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="englishfont" height="1">
                    <tr> 
                      <td bgcolor="#000000"> </td>
                    </tr>
                  </table>
                  <br>
                </td>
              </tr>
            </table>
			<?php include("../Management/Client/bottom.php") ?>  
            <br>
          </td>
         <td valign="top" width="20">&nbsp;</td>
        </tr>
      </table>
    
<table width="778" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
	<img src="/images/index_bottom.gif"></td>
  </tr>
</table>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12471272-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>

</html>