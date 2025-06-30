<?php
session_start();

$_SESSION['saveForm']="";
$_SESSION['saveForm2']="";
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
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExchangeRateService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");

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
if(!empty($_SESSION[currentClient]))
{
	$isLogin = true;
}
else 
{
	$isLogin = false;
}
if(empty($_SESSION[shoppingCartId])){
	$shoppingCartId = md5(microtime());
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
$to_ch = "1203911670@qq.com,1745573722@qq.com,3388421316@qq.com,2821476870@qq.com";//Chinese Email To
$from_ch = "quickte2@cl84.justhost.com";//Chinese Email From
$bcc = "liam@quark-elec.com";//English and Chinese Email BCC

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

$firstName_out = trim($_POST[firstName_out]);
$surname_out = trim($_POST[surname_out]);
$company_out = trim($_POST[company_out]);
$telephone_out = trim($_POST[phone_out]);
$email_out = trim($_POST[email_out]);
$countryId_out = $_POST[country_out];
$country_out = Common::GetCountryById($countryId_out);
$cityTown_out = trim($_POST[cityTown_out]);
$postcode_out = trim($_POST[deliverypostcode_out]);
$addressLineOne_out = trim($_POST[deliveryaddress1_out]);
$addressLineTwo_out = trim($_POST[deliveryaddress2_out]);

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
	case 2:$body.= "Material: Aluminium based(0.5-0.8W/m.K)<br>";$materialType="Aluminium based(0.5-0.8W/m.K)";break;
	case 3:$body.= "Material: Aluminium based( ≥1.0W/m.K)<br>";$materialType="Aluminium based( ≥1.0W/m.K)";break;
}
$body.= "Thickness: ".$_POST[thickness]."<br>";
$body.= "Copper weight: ".$_POST[weight]."<br>";
$body.= "Soldermask: ".$_POST[soldermask]."<br>";
switch ($_POST[soldermaskcolor]){
	case 1:$body.= "Soldermask Color: Green<br>";$soldermaskcolor = "Green";break;
	case 2:$body.= "Soldermask Color: Red<br>";$soldermaskcolor = "Red";break;
	case 3:$body.= "Soldermask Color: Yellow<br>";$soldermaskcolor = "Yellow";break;
	case 4:$body.= "Soldermask Color: Blue<br>";$soldermaskcolor = "Blue";break;
	case 5:$body.= "Soldermask Color: White<br>";$soldermaskcolor = "White";break;
	case 6:$body.= "Soldermask Color: Black<br>";$soldermaskcolor = "Black";break;
	case 7:$body.= "Soldermask Color: None<br>";$soldermaskcolor = "";break;
	case 8:$body.= "Soldermask Color: Matte Green<br>";$soldermaskcolor = "Matte Green";break;
	case 9:$body.= "Soldermask Color: Matte Black<br>";$soldermaskcolor = "Matte Black";break;
}

$body.= "Silkscreen: ".$_POST[silkscreen]."<br>";
switch ($_POST[surface]){
	case 1:$body.= "Surface: HASL(Not RoHS compliance)<br>";$surface = "HASL(Not RoHS compliance)";break;
	case 2:$body.= "Surface: HASL(Lead free)<br>";$surface = "HASL(Lead free)";break;
	case 3:$body.= "Surface: Electrolytic Gold<br>";$surface = "Electrolytic Gold";break;
	case 4:$body.= "Surface: OSP<br>";$surface = "OSP";break;
	case 5:$body.= "Surface: Electroless Nickel/Immersion Gold<br>";$surface = "Electroless Nickel/Immersion Gold";break;
}
switch ($_POST[ULmarking]){
	case 0:$body.= "UL marking: No<br>";$ulMark="No";break;
	case 1:$body.= "UL marking: Yes<br>";$ulMark="Yes";break;
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
	case 2:$body.= "Need laser stencil: Framed stencil(".$stencilType1.")<br>";$needStencil="Framed stencil";break;
}

//switch ($_POST[tech]){
//	case 0:$body.= "The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: No<br>";$tech="No";break;
//	case 1:$body.= "The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: Yes<br>";$tech="Yes";break;
//}
if($countryId != 1){
	switch ($_POST[haveVAT]){
		case 0:$body.= "Have VAT number: No<br>";$haveVAT="No";break;
		case 1:$body.= "Have VAT number: Yes<br>";$haveVAT="Yes";break;
	}
	if($_POST[haveVAT]){
		$body.= "VAT number: ".$_POST[VATNumber]."<br>";
	}
}

//$body.= "Total price: ".$_POST[total]."<br>";
if($_POST[total] == 0){
	$body.= "Total price: Contact us<br>";
}else{
	$body.= "Total price: ".$_POST[total]."<br>";
}
if($countryId != 1 && $_POST[haveVAT] && $_POST[VATNumber]){
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
	if ($_POST[ULmarking]){
		$ulMarkPD = ", UL Marking";
	}
	$productDescription = "PCB:".addslashes(basename($_FILES['uploaded']['name']))."\n".$_POST[layer]."layer PCBs based on Quick-teck standard specifications.\n(".$materialType.", "
		.$_POST[thickness]."mm thickness, ".$_POST[weight]."oz copper, ".$_POST[silkscreen]." Silkscreen, ".$_POST[soldermask]." ".$soldermaskcolor." Solder mask, ".$surface." finish".$ulMarkPD.")";
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
	//$tempOrder = $orderService->GetOrder01($orderTime, $totalPrice, $quantity, $email);
	//if(!$tempOrder){
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
			null, $clientRandomCode, 0, 0, null, $clientId, null, null, 1, 0, $remark, true,
			0, 0, 0, 0, 0,
			0, 0, $_POST[price15], 0.0, 0.0,
			false,true,false,false,false,
			"", "", "", "", "",
			"","","","","","","","","","",
			$countryId, $firstName, $surname, $cityTown, $addressLineOne, $addressLineTwo, $company,
			0, 0, 0, 0.0, 0.0);
			
		$result1 = $orderService->AddOrder($order);
		//Insert Order Processing
		$orderProcessingService = new OrderProcessingService();
		$orderProcessing = new OrderProcessing(0, $result1, 1, 1, 8, $now);
		$result2 = $orderProcessingService->AddOrderProcessing($orderProcessing);
		//Insert Order Comment
		if($comment != ""){
			$orderCommentService = new OrderCommentService();
			$orderComment = new OrderComment(0, $result1, $comment, 8, $now, 1);
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
			$_POST[stencilType],0,$_POST[soldermaskcolor],0,0,
			$_POST[price18],0.0,0.0,0.0,0.0,0.0,0.0,0.0,
			$_POST[ULmarking],false,false,false,false,
			$now,$now,
			$_POST[historyOrderNumber],$shoppingCartId,addslashes(basename($_FILES['uploaded']['name'])),"","");
		$result5 = $orderDetailService->AddOrderDetail($orderDetail);
		
		if($_POST[VATNumber] && $client->VatNumber!=$_POST[VATNumber]){
			$clientVAT = $clientService->GetClientById($clientId);
			$clientVAT->VatNumber = $_POST[VATNumber];
			$clientService->ModifyClient($clientVAT);
		}
		
		if($result1 && $result2 && $result3 && $result5){
			$body .= "<br>Auto add a new order to Quick-teck Management system successfully!(Order Number:".$number.")";
		}
	//}
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

//if(!$tempOrder){
	$subject_ch =" 下单，单号：".$number;
	switch ($_POST[soldermask]){
		case "only top":$soldermask_ch = "阻焊：顶层，";break;
		case "only bottom":$soldermask_ch = "阻焊：底层，";break;
		case "both sides":$soldermask_ch = "阻焊：双面，";break;
		case "no":$soldermask_ch = "阻焊：无，";break;
	}
	switch ($_POST[soldermaskcolor]){
		case 1:$soldermaskcolor_ch = "颜色：绿色<br>";break;
		case 2:$soldermaskcolor_ch = "颜色：红色<br>";break;
		case 3:$soldermaskcolor_ch = "颜色：黄色<br>";break;
		case 4:$soldermaskcolor_ch = "颜色：蓝色<br>";break;
		case 5:$soldermaskcolor_ch = "颜色：白色<br>";break;
		case 6:$soldermaskcolor_ch = "颜色：黑色<br>";break;
		case 7:$soldermaskcolor_ch = "颜色：无<br>";break;
		case 8:$soldermaskcolor_ch = "颜色：亚光绿<br>";break;
		case 9:$soldermaskcolor_ch = "颜色：亚光黑<br>";break;
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
	switch ($_POST[ULmarking]){
		case 0:$ulMark_ch = "否";break;
		case 1:$ulMark_ch = "是";break;
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
	switch ($_POST[stencilType]){
		case 1:$stencilType_ch="正面";break;
		case 2:$stencilType_ch="反面";break;
		case 3:$stencilType_ch="双面";break;
	}
	$long = 0;
	$short = 0;
	if($length >= $width){
		$long = $length + 20;
		$short = $width + 20;
	}else{
		$long = $width + 20;
		$short= $length + 20;
	}
	if($long < 150 && $short < 100){
		$stencilType_ch2 = "300*400";	
	}else if($long < 200 && $short < 150){
		$stencilType_ch2 = "300*400";	
	}else if($long < 200 && $short < 200){
		$stencilType_ch2 = "300*400";	
	}else if($long < 300 && $short < 200){
		$stencilType_ch2 = "370*470";
	}else if($long < 300 && $short < 300){
		$stencilType_ch2 = "370*470";
	}else if($long < 400 && $short < 300){
		$stencilType_ch2 = "370*470";
	}else{
		$stencilType_ch2 = "420*520";	
	}
	switch ($_POST[needStencil]){
		case 0:$stencil_ch = "<br>";break;
		case 1:$stencil_ch = "钢片：(".$stencilType_ch.")<br>";break;
		case 2:$stencil_ch = "钢网：(".$stencilType_ch."   ".$stencilType_ch2.")<br>";break;
	}
	

	if(!$_POST[sameDesign]){
		$file_ch = "具体文件见附件";
	}else{
		$file_ch = "这是一个返单，使用订单".$_POST[historyOrderNumber]."的文件";
	}
							
	$body_ch = "您好，下一个单，单号：".$number."。".$file_ch."<br><br>
			数量：".$quantity."片，要求真空包装，并使用防潮袋。如有多余，请单独另外包装.<br>
			大小：".$width."mm*".$length."mm<br>
			层数：".$layer."层板<br>
			板材：".$materialType."<br>
			".$soldermask_ch.$soldermaskcolor_ch.$silkscreen_ch."
			厚度：".$_POST[thickness]."毫米<br>
			copper weight：".$_POST[weight]."oz厚<br>
			表面工艺：".$surface_ch."<br>
			UL marking：".$ulMark_ch."<br>
			".$stencil_ch."<br>
			注意事宜: 此单号为".$number."，从2013年5月23日起请不要再打我上司的单号！也不要打贵司的任何标记.<br>
			<br>
			工期：要求从下单后最多".$day_ch."天后送货<br><br>
			快递地址：<br>
			深圳市宝安区西乡街道固戍南昌旧村32号吉利大厦10F-6 快递请备注下午12:00之后送货<br>
			邮编：518126<br>
			收件人：钟友好，联系电话：18033446515<br>
			快递公司：顺丰<br><br>
			如有问题，请email我邮箱1203911670@qq.com<br>
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
//}
//--------------------------------------------Auto send Email end--------------------------------------------

if($send && $send_ch){
	$echoMessage .= "<b>You have successfully submitted your order information!</b>"; 
} else {
	$echoMessage .= "<font size=\"2\" color=\"FF0033\">We encountered an error sending your mail, please notify info@quick-teck.co.uk</font>";
}
$langdate['ordersubmit'][0]['english']='Home';
$langdate['ordersubmit'][0]['french']='Accueil';
$langdate['ordersubmit'][0]['dutch']='';
$langdate['ordersubmit'][0]['spanish']='';
$langdate['ordersubmit'][1]['english']='Order now';
$langdate['ordersubmit'][1]['french']='Passer une commande';
$langdate['ordersubmit'][1]['dutch']='';
$langdate['ordersubmit'][1]['spanish']='';
$langdate['ordersubmit'][2]['english']='Billing information';
$langdate['ordersubmit'][2]['french']='Données de facturation';
$langdate['ordersubmit'][2]['dutch']='';
$langdate['ordersubmit'][2]['spanish']='';
$langdate['ordersubmit'][3]['english']='Shipping information';
$langdate['ordersubmit'][3]['french']='Informations de livraison';
$langdate['ordersubmit'][3]['dutch']='';
$langdate['ordersubmit'][3]['spanish']='';
$langdate['ordersubmit'][4]['english']='Firstname';
$langdate['ordersubmit'][4]['french']='Prénom';
$langdate['ordersubmit'][4]['dutch']='';
$langdate['ordersubmit'][4]['spanish']='';
$langdate['ordersubmit'][5]['english']='Surname';
$langdate['ordersubmit'][5]['french']='Nom';
$langdate['ordersubmit'][5]['dutch']='';
$langdate['ordersubmit'][5]['spanish']='';
$langdate['ordersubmit'][6]['english']='Organization/Company';
$langdate['ordersubmit'][6]['french']='Organisation/Entreprise';
$langdate['ordersubmit'][6]['dutch']='';
$langdate['ordersubmit'][6]['spanish']='';
$langdate['ordersubmit'][7]['english']='Email';
$langdate['ordersubmit'][7]['french']='Courriel';
$langdate['ordersubmit'][7]['dutch']='';
$langdate['ordersubmit'][7]['spanish']='';
$langdate['ordersubmit'][8]['english']='Phone number';
$langdate['ordersubmit'][8]['french']='Téléphone';
$langdate['ordersubmit'][8]['dutch']='';
$langdate['ordersubmit'][8]['spanish']='';
$langdate['ordersubmit'][9]['english']='Shipping  address line1';
$langdate['ordersubmit'][9]['french']='Adresse de livraison 1';
$langdate['ordersubmit'][9]['dutch']='';
$langdate['ordersubmit'][9]['spanish']='';
$langdate['ordersubmit'][10]['english']='Shipping  address line2';
$langdate['ordersubmit'][10]['french']='Adresse de livraison 2';
$langdate['ordersubmit'][10]['dutch']='';
$langdate['ordersubmit'][10]['spanish']='';
$langdate['ordersubmit'][11]['english']='Town/City';
$langdate['ordersubmit'][11]['french']='Ville';
$langdate['ordersubmit'][11]['dutch']='';
$langdate['ordersubmit'][11]['spanish']='';
$langdate['ordersubmit'][12]['english']='Postcode';
$langdate['ordersubmit'][12]['french']='Code Postal';
$langdate['ordersubmit'][12]['dutch']='';
$langdate['ordersubmit'][12]['spanish']='';
$langdate['ordersubmit'][13]['english']='Country';
$langdate['ordersubmit'][13]['french']='Pays';
$langdate['ordersubmit'][13]['dutch']='';
$langdate['ordersubmit'][13]['spanish']='';
$langdate['ordersubmit'][14]['english']='PCB job information';
$langdate['ordersubmit'][14]['french']='Informations sur le circuit imprimé';
$langdate['ordersubmit'][14]['dutch']='';
$langdate['ordersubmit'][14]['spanish']='';
$langdate['ordersubmit'][15]['english']='Order number';
$langdate['ordersubmit'][15]['french']='Numéro de commande';
$langdate['ordersubmit'][15]['dutch']='';
$langdate['ordersubmit'][15]['spanish']='';
$langdate['ordersubmit'][16]['english']='Board layer';
$langdate['ordersubmit'][16]['french']='Nombre de couches';
$langdate['ordersubmit'][16]['dutch']='';
$langdate['ordersubmit'][16]['spanish']='';
$langdate['ordersubmit'][17]['english']='Quantity';
$langdate['ordersubmit'][17]['french']='Quantité';
$langdate['ordersubmit'][17]['dutch']='';
$langdate['ordersubmit'][17]['spanish']='';
$langdate['ordersubmit'][18]['english']='Length(mm)';
$langdate['ordersubmit'][18]['french']='Longueur (mm)';
$langdate['ordersubmit'][18]['dutch']='';
$langdate['ordersubmit'][18]['spanish']='';
$langdate['ordersubmit'][19]['english']='Width(mm)';
$langdate['ordersubmit'][19]['french']='Largeur (mm)';
$langdate['ordersubmit'][19]['dutch']='';
$langdate['ordersubmit'][19]['spanish']='';
$langdate['ordersubmit'][20]['english']='Material';
$langdate['ordersubmit'][20]['french']='Support';
$langdate['ordersubmit'][20]['dutch']='';
$langdate['ordersubmit'][20]['spanish']='';
$langdate['ordersubmit'][21]['english']='Thickness';
$langdate['ordersubmit'][21]['french']='Épaisseur';
$langdate['ordersubmit'][21]['dutch']='';
$langdate['ordersubmit'][21]['spanish']='';
$langdate['ordersubmit'][22]['english']='Copper weight';
$langdate['ordersubmit'][22]['french']='Poids du cuivre';
$langdate['ordersubmit'][22]['dutch']='';
$langdate['ordersubmit'][22]['spanish']='';
$langdate['ordersubmit'][23]['english']='Solder mask';
$langdate['ordersubmit'][23]['french']='Vernis épargne';
$langdate['ordersubmit'][23]['dutch']='';
$langdate['ordersubmit'][23]['spanish']='';
$langdate['ordersubmit'][24]['english']='Silkscreen';
$langdate['ordersubmit'][24]['french']='Sérigraphie';
$langdate['ordersubmit'][24]['dutch']='';
$langdate['ordersubmit'][24]['spanish']='';
$langdate['ordersubmit'][25]['english']='Surface finish';
$langdate['ordersubmit'][25]['french']='Finition';
$langdate['ordersubmit'][25]['dutch']='';
$langdate['ordersubmit'][25]['spanish']='';
$langdate['ordersubmit'][26]['english']='Lead time';
$langdate['ordersubmit'][26]['french']='Délai de livraison';
$langdate['ordersubmit'][26]['dutch']='';
$langdate['ordersubmit'][26]['spanish']='';
$langdate['ordersubmit'][27]['english']='Repeat order';
$langdate['ordersubmit'][27]['french']='Renouvellement de commande';
$langdate['ordersubmit'][27]['dutch']='';
$langdate['ordersubmit'][27]['spanish']='';
$langdate['ordersubmit'][28]['english']='Saving option';
$langdate['ordersubmit'][28]['french']='Option économique';
$langdate['ordersubmit'][28]['dutch']='';
$langdate['ordersubmit'][28]['spanish']='';
$langdate['ordersubmit'][29]['english']='Need laser stencil';
$langdate['ordersubmit'][29]['french']='Pochoir';
$langdate['ordersubmit'][29]['dutch']='';
$langdate['ordersubmit'][29]['spanish']='';
$langdate['ordersubmit'][30]['english']='The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill';
$langdate['ordersubmit'][30]['french']='La largeur minimale de la piste ou de l\'entrefer est inférieure à 8 mill ou la taille minimale des trous est inférieure à 18 mill';
$langdate['ordersubmit'][30]['dutch']='';
$langdate['ordersubmit'][30]['spanish']='';
$langdate['ordersubmit'][31]['english']='Have VAT number';
$langdate['ordersubmit'][31]['french']='Numéro de TVA disponible';
$langdate['ordersubmit'][31]['dutch']='';
$langdate['ordersubmit'][31]['spanish']='';
$langdate['ordersubmit'][32]['english']='VAT number';
$langdate['ordersubmit'][32]['french']='Numéro de TVA';
$langdate['ordersubmit'][32]['dutch']='';
$langdate['ordersubmit'][32]['spanish']='';
$langdate['ordersubmit'][33]['english']='Total price';
$langdate['ordersubmit'][33]['french']='Prix total';
$langdate['ordersubmit'][33]['dutch']='';
$langdate['ordersubmit'][33]['spanish']='';
$langdate['ordersubmit'][34]['english']='PCB file upload';
$langdate['ordersubmit'][34]['french']='Télécharger fichier de circuit imprimé';
$langdate['ordersubmit'][34]['dutch']='';
$langdate['ordersubmit'][34]['spanish']='';
$langdate['ordersubmit'][35]['english']='Terms & conditions';
$langdate['ordersubmit'][35]['french']='Conditions Générales de ventes';
$langdate['ordersubmit'][35]['dutch']='';
$langdate['ordersubmit'][35]['spanish']='';
$langdate['ordersubmit'][36]['english']='The above are this PCB job details. If you see any warning messages(in red colour) or you filled any improper information on this order, please click';
$langdate['ordersubmit'][36]['french']='Les détails ci-dessus sont relatifs à votre projet de circuit imprimé. En cas de message d\'erreur (les champs marqués en rouge) ou d\'information erronée, merci de cliquer';
$langdate['ordersubmit'][36]['dutch']='';
$langdate['ordersubmit'][36]['spanish']='';
$langdate['ordersubmit'][37]['english']='to re-submit this PCB job.(Doing this, '.$number.' will be deleted from your shopping cart) Otherwise, please select one of the following two buttons to the next step';
$langdate['ordersubmit'][37]['french']='pour soumettre à nouveau ce projet. (Ce faisant, '.$number.' sera effacé de votre panier) Si tout est en ordre, sélectionnez un des deux boutons pour procéder à l\'étape suivante';
$langdate['ordersubmit'][37]['dutch']='';
$langdate['ordersubmit'][37]['spanish']='';
$langdate['ordersubmit'][38]['english']='here';
$langdate['ordersubmit'][38]['french']='ici';
$langdate['ordersubmit'][38]['dutch']='';
$langdate['ordersubmit'][38]['spanish']='';
$langdate['ordersubmit'][39]['english']='/rescources/images/banner02.jpg';
$langdate['ordersubmit'][39]['french']='/rescources/images/banner02_fr.jpg';
$langdate['ordersubmit'][39]['dutch']='';
$langdate['ordersubmit'][39]['spanish']='';
$langdate['ordersubmit'][40]['english']='/rescources/images/pcborderform_4.png';
$langdate['ordersubmit'][40]['french']='/rescources/images/pcborderform_4_fr.png';
$langdate['ordersubmit'][40]['dutch']='';
$langdate['ordersubmit'][40]['spanish']='';
$langdate['ordersubmit'][41]['english']='Order another PCB job'; 
$langdate['ordersubmit'][41]['french']='Commander un autre circuit imprimé';
$langdate['ordersubmit'][41]['dutch']='';
$langdate['ordersubmit'][41]['spanish']='';
$langdate['ordersubmit'][42]['english']='Checkout'; 
$langdate['ordersubmit'][42]['french']='Valider la commande';
$langdate['ordersubmit'][42]['dutch']='';
$langdate['ordersubmit'][42]['spanish']='';
$langdate['ordersubmit'][43]['english']=''; 
$langdate['ordersubmit'][43]['french']='width:250px;background:url(/rescources/images/submit_bn250.png) no-repeat;';
$langdate['ordersubmit'][43]['dutch']='';
$langdate['ordersubmit'][43]['spanish']='';
$langdate['ordersubmit'][44]['english']='width:250px;background:url(/rescources/images/submit_bn250.png) no-repeat;'; 
$langdate['ordersubmit'][44]['french']='width:349px;background:url(/rescources/images/submit_bn349.png) no-repeat;';
$langdate['ordersubmit'][44]['dutch']='';
$langdate['ordersubmit'][44]['spanish']='';
$langdate['ordersubmit'][45]['english']='HASL (not RoHS)'; 
$langdate['ordersubmit'][45]['french']='SnPb HAL(non RoHS)';
$langdate['ordersubmit'][45]['dutch']='';
$langdate['ordersubmit'][45]['spanish']='';
$langdate['ordersubmit'][46]['english']='HASL (lead free)'; 
$langdate['ordersubmit'][46]['french']='HAL sans plomb';
$langdate['ordersubmit'][46]['dutch']='';
$langdate['ordersubmit'][46]['spanish']='';
$langdate['ordersubmit'][47]['english']='Electrolytic Gold'; 
$langdate['ordersubmit'][47]['french']='Nickel-Or électrolytique';
$langdate['ordersubmit'][47]['dutch']='';
$langdate['ordersubmit'][47]['spanish']='';
$langdate['ordersubmit'][48]['english']='Electroless Nickel/Immersion Gold'; 
$langdate['ordersubmit'][48]['french']='Nickel-Or chimique';
$langdate['ordersubmit'][48]['dutch']='';
$langdate['ordersubmit'][48]['spanish']='';
$langdate['ordersubmit'][49]['english']='0.5oz';
$langdate['ordersubmit'][49]['french']='18&micro;m';
$langdate['ordersubmit'][49]['dutch']='';
$langdate['ordersubmit'][49]['spanish']='';
$langdate['ordersubmit'][50]['english']='1.0oz';
$langdate['ordersubmit'][50]['french']='35&micro;m';
$langdate['ordersubmit'][50]['dutch']='';
$langdate['ordersubmit'][50]['spanish']='';
$langdate['ordersubmit'][51]['english']='2.0oz';
$langdate['ordersubmit'][51]['french']='70&micro;m';
$langdate['ordersubmit'][51]['dutch']='';
$langdate['ordersubmit'][51]['spanish']='';
$langdate['ordersubmit'][52]['english']='working days';
$langdate['ordersubmit'][52]['french']='jours ouvrés';
$langdate['ordersubmit'][52]['dutch']='';
$langdate['ordersubmit'][52]['spanish']='';
$langdate['ordersubmit'][53]['english']='only top'; 
$langdate['ordersubmit'][53]['french']='sur la face avant';
$langdate['ordersubmit'][53]['dutch']='';
$langdate['ordersubmit'][53]['spanish']='';
$langdate['ordersubmit'][54]['english']='only bottom'; 
$langdate['ordersubmit'][54]['french']='sur la face arrière';
$langdate['ordersubmit'][54]['dutch']='';
$langdate['ordersubmit'][54]['spanish']='';
$langdate['ordersubmit'][55]['english']='both top & bottom'; 
$langdate['ordersubmit'][55]['french']='sur les faces avant et arrière';
$langdate['ordersubmit'][55]['dutch']='';
$langdate['ordersubmit'][55]['spanish']='';
$langdate['ordersubmit'][56]['english']='no'; 
$langdate['ordersubmit'][56]['french']='non';
$langdate['ordersubmit'][56]['dutch']='';
$langdate['ordersubmit'][56]['spanish']='';
$langdate['ordersubmit'][57]['english']='yes'; 
$langdate['ordersubmit'][57]['french']='oui';
$langdate['ordersubmit'][57]['dutch']='';
$langdate['ordersubmit'][57]['spanish']='';
$langdate['ordersubmit'][58]['english']='framed stencil'; 
$langdate['ordersubmit'][58]['french']='framed stencil';
$langdate['ordersubmit'][58]['dutch']='';
$langdate['ordersubmit'][58]['spanish']='';
$langdate['ordersubmit'][59]['english']='UL marking'; 
$langdate['ordersubmit'][59]['french']='UL marking';
$langdate['ordersubmit'][59]['dutch']='';
$langdate['ordersubmit'][59]['spanish']='';
$langdate['ordersubmit'][60]['english']='Do you know you can now order the electronics components together with your PCBs. There are over 4000 different types components in stock for your choosing. Order them now or within the next two days, you will get the components and PCBs together.'; 
$langdate['ordersubmit'][60]['french']='Savez-vous que vous pouvez désormais commander les composants électroniques en même temps que vos PCBs. Nous avons plus de 4000 références en stock. Si vous commander maintenant ou sous deux jours, vous recevrez les composants et les PCBs ensembles.';
$langdate['ordersubmit'][60]['dutch']='';
$langdate['ordersubmit'][60]['spanish']='';
$langdate['ordersubmit'][61]['english']='Solder mask color'; 
$langdate['ordersubmit'][61]['french']='Solder mask color';
$langdate['ordersubmit'][61]['dutch']='';
$langdate['ordersubmit'][61]['spanish']='';
$langdate['ordersubmit'][62]['english']='Green';
$langdate['ordersubmit'][62]['french']='Green';
$langdate['ordersubmit'][62]['dutch']='';
$langdate['ordersubmit'][62]['spanish']='';
$langdate['ordersubmit'][63]['english']='Red';
$langdate['ordersubmit'][63]['french']='Red';
$langdate['ordersubmit'][63]['dutch']='';
$langdate['ordersubmit'][63]['spanish']='';
$langdate['ordersubmit'][64]['english']='Yellow';
$langdate['ordersubmit'][64]['french']='Yellow';
$langdate['ordersubmit'][64]['dutch']='';
$langdate['ordersubmit'][64]['spanish']='';
$langdate['ordersubmit'][65]['english']='Blue';
$langdate['ordersubmit'][65]['french']='Blue';
$langdate['ordersubmit'][65]['dutch']='';
$langdate['ordersubmit'][65]['spanish']='';
$langdate['ordersubmit'][66]['english']='White';
$langdate['ordersubmit'][66]['french']='White';
$langdate['ordersubmit'][66]['dutch']='';
$langdate['ordersubmit'][66]['spanish']='';
$langdate['ordersubmit'][67]['english']='Black';
$langdate['ordersubmit'][67]['french']='Black';
$langdate['ordersubmit'][67]['dutch']='';
$langdate['ordersubmit'][67]['spanish']='';
$langdate['ordersubmit'][68]['english']='None';
$langdate['ordersubmit'][68]['french']='None';
$langdate['ordersubmit'][68]['dutch']='';
$langdate['ordersubmit'][68]['spanish']='';
$langdate['ordersubmit'][69]['english']='Matte Green';
$langdate['ordersubmit'][69]['french']='Matte Green';
$langdate['ordersubmit'][69]['dutch']='';
$langdate['ordersubmit'][69]['spanish']='';
$langdate['ordersubmit'][70]['english']='Matte Black';
$langdate['ordersubmit'][70]['french']='Matte Black';
$langdate['ordersubmit'][70]['dutch']='';
$langdate['ordersubmit'][70]['spanish']='';

if(!empty($_SESSION[pcbOnlineCuoteData])){
	unset($_SESSION[pcbOnlineCuoteData]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function toCheckout(){
	//if(confirm('Do you confirm to checkout?')){
		location.href = "checkout.php";
	//}
}
function toTakeOrder(isLogin){
	if(isLogin=="yes"){
		location.href = "takeorder.php?isLogin=yes";
	}else{
		location.href = "takeorder.php";
	}
}
function toEEList(){
	location.href = "../ElectronicElement/pcbOrderListFromOrderSubmit.php";
}
</script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['ordersubmit'][39]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['ordersubmit'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['ordersubmit'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_box_c">
				<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['ordersubmit'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="#" title="" class="on"><?php Lang::EchoString2($langdate['ordersubmit'][1]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/>
<img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<div class="lc_title"><img src="<?php Lang::EchoString2($langdate['ordersubmit'][40]);?>" width="710" height="39" alt="" /></div>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					<tr>
						<td colspan="1" style="display:none;"><span class="c_f30 fs14 fw" style="width:40%">
						<?php Lang::EchoString2($langdate['ordersubmit'][2]);?></span>
						</td>
						<td colspan="2" style="width:20%"><span class="c_f30 fs14 fw">
						<?php Lang::EchoString2($langdate['ordersubmit'][3]);?></span>
						</td>
					  </tr>
					   <tr>
						<td width="20%"><?php Lang::EchoString2($langdate['ordersubmit'][4]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $firstName_out; ?></td>
						<td colspan="2"><?php echo $firstName; ?></td>
					  </tr>
					   <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][5]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $surname_out; ?></td>
						<td colspan="2"><?php echo $surname; ?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][6]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $company_out;?></td>
						<td colspan="1"><?php echo $company;?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][7]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $email_out;?></td>
						<td colspan="1"><?php echo $email;?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][8]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $telephone_out; ?></td>
						<td colspan="1"><?php echo $telephone; ?></td>
					  </tr>
					  <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][9]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $addressLineOne_out; ?></td>
						<td colspan="1"><?php echo $addressLineOne; ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][10]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $addressLineTwo_out ?></td>
						<td colspan="1"><?php echo $addressLineTwo ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][11]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $cityTown_out ?></td>
						<td colspan="1"><?php echo $cityTown ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][12]);?>:</td>
						<td colspan="1" style="display:none;"> <?php echo $postcode_out ?></td>
						<td colspan="1"> <?php echo $postcode ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][13]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $country_out ?></td>
						<td colspan="1"><?php echo $country?></td>
					  </tr>
					  <!-- 
                       <tr>
						<td colspan="4"><span class="c_f30 fs14 fw">Shipping information</span></td>
					  </tr>
					   <tr>
						<td>Firstname:</td>
						<td colspan="3"><?php echo $firstName; ?></td>
					  </tr>
					   <tr>
						<td>Sumame:</td>
						<td colspan="3"><?php echo $surname; ?></td>
					  </tr>
					  <tr>
						<td>Organization/Company:</td>
						<td colspan="3"><?php echo $company;?></td>
					  </tr>
					  <tr>
						<td>Email:</td>
						<td colspan="3"><?php echo $email;?></td>
					  </tr>
					  <tr>
						<td>Phone unmber:</td>
						<td colspan="3"><?php echo $telephone; ?></td>
					  </tr>
					  <tr>
					   <td>Shipping  address line1:</td>
						<td colspan="3"><?php echo $addressLineOne; ?></td>
					  </tr>
                      <tr>
					   <td>Shipping  address line2:</td>
						<td colspan="3"><?php echo $addressLineTwo ?></td>
					  </tr>
                      <tr>
					   <td>Town/City:</td>
						<td colspan="3"><?php echo $cityTown ?></td>
					  </tr>
                      <tr>
					   <td>Postcode:</td>
						<td colspan="3"> <?php echo $postcode ?></td>
					  </tr>
                      <tr>
					   <td>Country:</td>
						<td colspan="3"><?php echo $country ?></td>
					  </tr>
					   -->
                      <tr>
					   <td colspan="4"><span class="c_f30 fs14"><span class="fw"><?php Lang::EchoString2($langdate['ordersubmit'][14]);?></span><span class="tu"></span></span></td>
					  </tr>
					  <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][15]);?>:</td>
						 <td colspan="3"><?php echo $number; ?></td>
					   </tr>
                       <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][16]);?>:</td>
						 <td colspan="3">
						 <?php
							switch ($_POST['layer'])
							{
								case 1:echo "1";break;
								case 2:echo "2";break;
								case 4:echo "4";break;
								case 6:echo "6";break;
								case 8:echo "8";break;
								default:echo "You have select an incorrect layer number";
							}
						?>
						</td>
					   </tr>
					   <tr>
					  	 <td> <?php Lang::EchoString2($langdate['ordersubmit'][17]);?>:</td>
						 <td colspan="3"><?php echo $_POST['quantity']; ?></td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][18]);?>:</td>
						 <td colspan="3"><?php echo $_POST['length']; ?></td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][19]);?>:</td>
						 <td colspan="3"><?php echo $_POST['width']; ?></td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][20]);?>:</td>
						 <td colspan="3"><?php echo $materialType; ?></td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][21]);?>:</td>
						 <td colspan="3"><?php echo $_POST['thickness']."mm";?></td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][22]);?>:</td>
						 <td colspan="3">
						  <?php
							switch ($_POST['weight'])
							{
								case 0.5: Lang::EchoString2($langdate['ordersubmit'][49]); break;
								case 1: Lang::EchoString2($langdate['ordersubmit'][50]); break;
								case 2: Lang::EchoString2($langdate['ordersubmit'][51]); break;
								default:echo "You have select an incorrect copper weight option.";
							}
						 ?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][23]);?>:</td>
						 <td colspan="3">
						 <?php 
							if($_POST['soldermask'] == "only top"){
								Lang::EchoString2($langdate['ordersubmit'][53]);
							}else if($_POST['soldermask'] == "only bottom"){
								Lang::EchoString2($langdate['ordersubmit'][54]);
							}else if($_POST['soldermask'] == "both sides"){
								Lang::EchoString2($langdate['ordersubmit'][55]);
							}else if($_POST['soldermask'] == "no"){
								Lang::EchoString2($langdate['ordersubmit'][56]);
							}
						 ?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][61]);?>:</td>
						 <td colspan="3">
						 <?php 
							switch ($_POST['soldermaskcolor'])
							{
								case 1: Lang::EchoString2($langdate['ordersubmit'][62]); break;
								case 2: Lang::EchoString2($langdate['ordersubmit'][63]); break;
								case 3: Lang::EchoString2($langdate['ordersubmit'][64]); break;
								case 4: Lang::EchoString2($langdate['ordersubmit'][65]); break;
								case 5: Lang::EchoString2($langdate['ordersubmit'][66]); break;
								case 6: Lang::EchoString2($langdate['ordersubmit'][67]); break;
								case 7: Lang::EchoString2($langdate['ordersubmit'][68]); break;
								case 8: Lang::EchoString2($langdate['ordersubmit'][69]); break;
								case 9: Lang::EchoString2($langdate['ordersubmit'][70]); break;
							}
						 ?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][24]);?>:</td>
						 <td colspan="3">
						 <?php 
							if($_POST['silkscreen'] == "only top"){
								Lang::EchoString2($langdate['ordersubmit'][53]);
							}else if($_POST['silkscreen'] == "only bottom"){
								Lang::EchoString2($langdate['ordersubmit'][54]);
							}else if($_POST['silkscreen'] == "both sides"){
								Lang::EchoString2($langdate['ordersubmit'][55]);
							}else if($_POST['silkscreen'] == "no"){
								Lang::EchoString2($langdate['ordersubmit'][56]);
							}
						 ?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][25]);?>:</td>
						 <td colspan="3">
						 <?php
							switch ($_POST['surface'])
							{
								case 1: Lang::EchoString2($langdate['ordersubmit'][45]); break;
								case 2: Lang::EchoString2($langdate['ordersubmit'][46]); break;
								case 3: Lang::EchoString2($langdate['ordersubmit'][47]); break;
								case 4:echo "OSP";break;
								case 5: Lang::EchoString2($langdate['ordersubmit'][48]); break;
								default:echo "You have select an incorrect finish option.";
							}
						?>
						 </td>
					   </tr>
					<tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][59]);?>:</td>
						 <td colspan="3">
						 <?php 
							if($ulMark == "Yes"){
								Lang::EchoString2($langdate['ordersubmit'][57]);
							}else{
								Lang::EchoString2($langdate['ordersubmit'][56]);
							}
						?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][26]);?>:</td>
						 <td colspan="3">
						 <?php
							switch ($_POST['days'])
							{
								case 5:echo "5 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 6:echo "6 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 7:echo "7 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 8:echo "8 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 9:echo "9 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 10:echo "10 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 11:echo "11 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								case 16:echo "16 "; Lang::EchoString2($langdate['ordersubmit'][52]); break;
								default:echo "You have select an incorrect lead time.";
							}
						?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][27]);?>:</td>
						 <td colspan="3" style="text-align:left">
						 <?php 
							if($sameDesign == "Yes"){
								Lang::EchoString2($langdate['ordersubmit'][57]);
								echo "&nbsp;(";
								Lang::EchoString2($langdate['ordersubmit'][15]);
								echo ": ";
								echo $_POST[historyOrderNumber];
								echo ")";
							}else{
								Lang::EchoString2($langdate['ordersubmit'][56]);
							}
						?>
						</td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][28]);?>:</td>
						 <td colspan="3">
						 <?php 
							if($prototype == "Yes"){
								Lang::EchoString2($langdate['ordersubmit'][57]);
							}else{
								Lang::EchoString2($langdate['ordersubmit'][56]);
							}
						?>
						 </td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][29]);?>:</td>
						 <td colspan="3">
						 <?php 
							if($needStencil == "Yes"){
								Lang::EchoString2($langdate['ordersubmit'][57]);
								echo "(";
								if($stencilType1 == "only top"){
									Lang::EchoString2($langdate['ordersubmit'][53]);
								}else if($stencilType1 == "only bottom"){
									Lang::EchoString2($langdate['ordersubmit'][54]);
								}else if($stencilType1 == "both top & bottom"){
									Lang::EchoString2($langdate['ordersubmit'][55]);
								}
								echo ")";
							}else if($needStencil == "Framed stencil"){
								Lang::EchoString2($langdate['ordersubmit'][58]);
								echo "(";
								if($stencilType1 == "only top"){
									Lang::EchoString2($langdate['ordersubmit'][53]);
								}else if($stencilType1 == "only bottom"){
									Lang::EchoString2($langdate['ordersubmit'][54]);
								}else if($stencilType1 == "both top & bottom"){
									Lang::EchoString2($langdate['ordersubmit'][55]);
								}
								echo ")";
							}else if($needStencil == "No"){
								Lang::EchoString2($langdate['ordersubmit'][56]);
							}
						 ?>
						 </td>
					   </tr>
					   <tr style="display:none">
							<td ><?php Lang::EchoString2($langdate['ordersubmit'][30]);?>: </td>
							<td ><?php echo $tech; ?><br></td>
					   </tr>
						<?php if($country != "UK"){ ?>
						<tr><td ><?php Lang::EchoString2($langdate['ordersubmit'][31]);?>: </td><td colspan="3"> <?php echo $haveVAT; ?><br></td></tr>
						<tr><td ><?php Lang::EchoString2($langdate['ordersubmit'][32]);?>: </td><td colspan="3"> <?php echo $_POST['VATNumber']; ?><br></td></tr>
						<?php } ?>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][33]);?>(£):</td>
						 <td colspan="3"><?php echo $_POST['total']; ?> 
							<?php 
							$language = Common::GetLanguage();
							if($language != "english"){
								$euroPrice = 0;
								$exchangeRateService = new ExchangeRateService();
								$exchangeRateUsed = $exchangeRateService->GetNewExchangeRate();
								$euroPrice =  $totalPrice * ($exchangeRateUsed->Rate + Config::$exchangeRateFactor);
								echo "&nbsp; &nbsp; (&euro;".round($euroPrice,2).")"; 
							}
							?>
						</td>
					   </tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][34]);?>:</td>
						 <td colspan="3">
							<?php 
							if(!$_POST[sameDesign] && $uploadok == 0) {
								echo "<font size=\"2\" color=\"FF0033\">Sorry your file was not uploaded. Please close this window and try again. Alternatively, you can send the file to info@quick-teck.co.uk </font>";
							}else if(!$_POST[sameDesign] && $uploadok == 1){
								echo "\"".basename( $_FILES['uploaded']['name'])."\" file uploaded.";
							}
							?> 
						</td>
					   </tr>
					   	<tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][35]);?>:</td>
						 <td colspan="3">
						 
						 <?php 
							if($_POST['terms']=="on"){
								echo "Agreed";
							} else {
								echo "<font size=\"2\" color=\"FF0033\">Please close this window go back to the previous page to accept terms and conditions. </font>";
							}
						 ?> 
						 </td>
					   </tr>
                       <tr>
					  	 <td colspan="4">
					  	 	</br>
							<?php Lang::EchoString2($langdate['ordersubmit'][36]);?> <a href="errorOrder.php?number=<?php echo $number;?>&key=<?php echo $remark ?>" style="color:#F30;"><?php Lang::EchoString2($langdate['ordersubmit'][38]);?></a> <?php Lang::EchoString2($langdate['ordersubmit'][37]);?>.
						 </td>
					   </tr>
					</table>
					<p class="mt10 tc">
						<input style="font-size:16px;<?php Lang::EchoString2($langdate['ordersubmit'][44]);?>" type="button" value="<?php Lang::EchoString2($langdate['ordersubmit'][41]);?>" class="submit_bn" onclick="toTakeOrder(<?php if($isLogin){echo "'yes'"; }else{echo "'no'";} ?>)"/>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input style="font-size:16px;<?php Lang::EchoString2($langdate['ordersubmit'][43]);?>" type="button" value="<?php Lang::EchoString2($langdate['ordersubmit'][42]);?>" class="submit_bn" onclick="toCheckout();"/>
					</p>
					
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #ccc;width:710px;border-collapse:separate;background:White;margin-top:20px;">
						<tr>
							<td style="border:solid 1px white"><img alt="" src="../rescources/images/laba.png" /></td>
							<td style="border:solid 1px white"><?php Lang::EchoString2($langdate['ordersubmit'][60]);?><a href="/FAQ/FAQ.php#Components_001" title="" class="c_f60" target="_blank">[FAQ]</a></td>
						</tr>
						<tr>
							<td colspan="2" align="center" style="border:solid 1px white" >
								<input style="font-size:16px;width:250px;background:url(/rescources/images/submit_bn250.png) no-repeat;" type="button" value="Order electronic components" class="submit_bn" onclick="toEEList();"/>
							</td>
						</tr>
					</table>
				</div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>