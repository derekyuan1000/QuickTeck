<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
?>
<html>
<head>
<title>PHP Mail Sender</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.style1 {
	text-align: left;
	font-size: small;
	border: 1px solid #C0C0C0;
}
.style2 {
	text-align: center;
	font-size: small;
	border: 1px solid #C0C0C0;
	color:blue;
}
</style>
</head>
<body>
<?php 
$to = "pcb_prototype@hotmail.co.uk,info@quick-teck.co.uk";//English Email To
$bcc = "1226983621@qq.com,zhangming820919@hotmail.com";
$from = $_REQUEST['email'];//English Email From

$to_ch = "1206200302@qq.com,1120275135@qq.com,chenglong-1912@hotmail.com";//Chinese Email To
$from_ch = "quickte2@cl84.justhost.com";//Chinese Email From

$name = $_REQUEST['name']; 
$headers = "From:$from\r\nBCC:$bcc\r\nContent-type:text/html; charset=utf-8";


$target = "../../public_ftp/incoming/"; 
$target = $target . basename( $_FILES['uploaded']['name']) ; 
$informationok=1; 
$uploadok=1; 


$fields = array(); 
$fields{"name"} = "Name"; 
$fields{"phone"} = "phone"; 
$fields{"email"} = "email"; 
$fields{"deliveryaddress1"} = "Delivery address1"; 
$fields{"deliveryaddress2"} = "Delivery address2"; 
$fields{"deliverypostcode"} = "Postcode"; 
$fields{"company"} = "Company"; 
$fields{"layer"} = "Layer"; 
$fields{"quantity"} = "Quantity"; 
$fields{"length"} = "Length"; 
$fields{"width"} = "Width"; 
//$fields{"material"} = "Material"; 
$fields{"thickness"} = "Thickness"; 
$fields{"weight"} = "Copper weight"; 
$fields{"soldermask"} = "Soldermask"; 
$fields{"silkscreen"} = "Silkscreen"; 
$fields{"days"} = "Delivery days"; 
//$fields{"total"} = "Total price";


$body = "We have received an order request.<br>
		The uploaded CAM file is:\" ". basename( $_FILES['uploaded']['name']). " \" <br>
		The order information is the following: <br><br>";

foreach($fields as $a => $b){ 
	$body .= sprintf("%20s: %s<br>",$b,$_REQUEST[$a]); 
}
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

switch ($_POST[material]){
	case 0:$body.= "Material: FR4 Tg 130 (standard)<br>";$materialType="FR4 Tg 130 (standard)";break;
	case 1:$body.= "Material: FR4 H Tg 170<br>";$materialType="FR4 H Tg 170";break;
}
switch ($_POST[prototype]){
	case 0:$body.= "Saving option: No<br>";$prototype="No";break;
	case 1:$body.= "Saving option: Yes<br>";$prototype="Yes";break;
}
switch ($_POST[sameDesign]){
	case 0:$body.= "Repeat order: No<br>";$sameDesign="No";break;
	case 1:$body.= "Repeat order: Yes(Order Number: ".$_POST[historyOrderNumber].")<br>";$sameDesign="Yes";break;
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
switch ($_POST[surface]){
	case 1:$body.= "Surface: HASL(Not RoHS compliance)<br>";break;
	case 2:$body.= "Surface: HASL(Lead free)<br>";break;
	case 3:$body.= "Surface: Electrolytic Gold<br>";break;
	case 4:$body.= "Surface: OSP<br>";break;
	case 5:$body.= "Surface: Electroless Nickel/Immersion Gold<br>";break;
}
$countryId = $_POST[country];
$country = Common::GetCountryById($countryId);
$body.= "Country: ".$country."<br>";

$headers2 = "From: info@quick-teck.co.uk"; 
$subject2 = "Thank you for contacting us"; 
$autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usualy within 24 hours. If you have any more questions, please consult our website at www.quick-teck.co.uk";

echo "Submit process...... <br/>";

if($from == '') {
	print "You have not entered an email, please close this window go back to the previous page and try again";
	$informationok=0;
} else { 
	if($name == '') {
		print "You have not entered a name, please close this window go back to the previous page and try again";
		$informationok=0;
	} else { 
		if (isset($_POST['terms'])==0) {
			print "Tick the box to confirm you have read and accept the Terms and Conditions,please close this window go back to the previous page and try again.";
			$informationok=0;
		} else { 
			//----------------------------------auto add order to Quick-teck Management system----------------------------------
			try{
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderCommentService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/PdfMailer_Class.php");
				include_once($_SERVER['DOCUMENT_ROOT']."/Management/Client/doQuote2.php");
				$orderService = new OrderService();
				$holidayService = new HolidayService();
				$clientService = new ClientService();
				
				if($_POST[company]){
					$clientName = trim($_POST[company]);
				}else{
					$clientName = trim($_POST[name]);
				}
				$contact = trim($_POST[name]);
				
				$tempClient = $clientService->GetClientByContactAndEmail($contact, trim($_POST[email]));
				if(!$tempClient){
					$maxNumberClient = $clientService->GetMaxNumberClient();
					$clientNumber = $maxNumberClient->Number;
					$clientNumber = $clientNumber + 1;
					$loginId = $contact;
					$password = "0000";
					$address = trim($_POST[deliveryaddress1])."\n".trim($_POST[deliveryaddress2])."\n".trim($_POST[deliverypostcode])."\n".$country;
					$telephone = trim($_POST[phone]);
					$clientEmail = trim($_POST[email]);
					$postCode = trim($_POST[deliverypostcode]);
					$client = new Client(0, $loginId, sha1($password), $clientNumber, $clientName, $contact, $address, $telephone, $clientEmail, $postCode, $_POST[country], 0, 1);
					$clientId = $clientService->AddClient($client);
					if($clientId){
						$body .= "<br>Auto add a new client to Quick-teck Management system successfully!(Client Number:".$clientNumber.")";
					}
				}else{
					$clientId = $tempClient->Id;
				}
				

				$now = date("Y-m-d H:i:s");
				$dateArray = explode('-', date("Y-m-d"));	
				$year = $dateArray[0];
				$month = $dateArray[1];
				$day = $dateArray[2];
				$standard = $year."-".$month."-".$day." 10:30:00";
				
				$number = Common::GetNewOrderNumber($_POST[country]);
				
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
				switch ($_POST[surface])
				{
					case 1:$surface = "HASL(Not RoHS compliance)";break;
					case 2:$surface = "HASL(Lead free)";break;
					case 3:$surface = "Electrolytic Gold";break;
					case 4:$surface = "OSP";break;
					case 5:$surface = "Electroless Nickel/Immersion Gold";break;
				}
				$productDescription = "PCB:".basename($_FILES['uploaded']['name'])."\n".$_POST[layer]."layer PCBs based on Quick-teck standard specifications.\n(".$materialType.", "
					.$_POST[thickness]."mm thickness, ".$_POST[weight]."oz copper, ".$_POST[silkscreen]." Silkscreen, ".$_POST[soldermask]." Solder mask, ".$surface." finish)";
				$receiverName = trim($_POST[name]);
				$receiverEmail = trim($_POST[email]);
				$receiverTelephone = trim($_POST[phone]);
				$receiverPostCode = trim($_POST[deliverypostcode]);
				$receiverAddress = trim($_POST[name])."\n".trim($_POST[deliveryaddress1])."\n".trim($_POST[deliveryaddress2])."\n".trim($_POST[deliverypostcode])."\n".$country;
				$clientRandomCode = mt_rand(100000, 999999);
				$factoryQuote = GetFactoryQuote($layer, $quantity, $length, $width, $_POST[thickness], $_POST[weight], $surface);
				
				$tempOrder = $orderService->GetOrder01($orderTime, $totalPrice, $quantity, $receiverName);
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
					
					$order = new Order(0, $number, $orderTime, $workingDays, $targetDate, null, $expectToGZDate, null, null, $totalPrice, $factoryQuote, 400, 0, $comment, $quantity, 
						$productDescription, $receiverName, $receiverAddress, $receiverTelephone, $receiverEmail, $receiverPostCode,
						null, $clientRandomCode, 0, 0, null, $clientId, null, null, 1, 0, $remark);
					$result1 = $orderService->AddOrder($order);
					
					$orderProcessingService = new OrderProcessingService();
					$orderProcessing = new OrderProcessing(0, $result1, 1, 8, $now);
					$result2 = $orderProcessingService->AddOrderProcessing($orderProcessing);
					
					if($comment != ""){
						$orderCommentService = new OrderCommentService();
						$orderComment = new OrderComment(0, $result1, $comment, 8, $now);
						$result3 = $orderCommentService->AddOrderComment($orderComment);
					}else{
						$result3 = 1;	
					}
					
					$voucherNumber = trim($_POST[voucherNumber]);
					$voucherService = new VoucherService();
					$voucher = $voucherService->GetVoucherByNumber($voucherNumber);
					if($voucher){
						if($voucher->Status == 1 && $voucher->ExpiredTime >= $now){
							$voucher->Status = 2;
							$voucher->UsedTime = $now;
							$voucher->OrderNumber = $number;
							$result4 = $voucherService->ModifyVoucher($voucher);
							if($result4){
								$body .= "<br>Use voucher successfully!Voucher Number:".$voucher->Number."(".ceil($voucher->Percent)."%(£".$voucher->MaxPrice.")".")";
							}else{
								$voucherNumber = "";
							}
						}
					}
					
					
					$orderDetailService = new OrderDetailService();
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
						$_POST[historyOrderNumber],"","","","");
					$result5 = $orderDetailService->AddOrderDetail($orderDetail);
					
					if($result1 && $result2 && $result3 && $result5){
						$body .= "<br>Auto add a new order to Quick-teck Management system successfully!(Order Number:".$number.")";
					}
				}
			}catch(Exception $e){
				$body .= "<br>Auto add a new order to Quick-teck Management system failed!<br>".$e;
			}
			//--------------------------------------------end--------------------------------------------
			$subject = "PCB order form(".$number.")"; 
			$send = mail($to, $subject, $body, $headers);

			//--------------------------------------------Send  Chinese Email--------------------------------------------
			//This is our size condition 
			if ($uploaded_size > 10000000) { 
				echo "Your file is too large.<br>"; 
				$uploadok=0; 
			} 
			
			//This is our limit file type condition 
			if ($uploaded_type =="text/php") { 
				echo "No PHP files<br>"; 
				$uploadok=0; 
			} 
			
			//Here we check that $ok was not set to 0 by an error 
			if ($uploadok==0){ 
				echo "Sorry your file was not uploaded. Please contact with info@quick-teck.co.uk for help<br>"; 
			} else { 
				//If everything is ok we try to upload it
				if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){ 
					echo "<br>Your file \" ". basename( $_FILES['uploaded']['name']). " \" has been uploaded!  <br> ............... <br> Done! <br>"; 
				} else { 
					echo "Sorry, there was a problem uploading your file. Please contact with info@quick-teck.co.uk for help<br>"; 
					$uploadok=0;
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
						注意事宜：我的板不要贵司的编号 打上我们的单号就可以。此单号为".$number."<br><br>
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
				print " You have successfully submitted your order information!"; 
			} else {
				print "We encountered an error sending your mail, please notify info@quick-teck.co.uk";
				$informationok=0;
			}
        }
    }
}
?>

<form  name="orderconfirm" style=" font-size:large;font-weight:bold; border:1px solid #C0C0C0; width:750px" >
<table style=" font-style:oblique; font-size:large;font-weight:bold; width:750px">
<tr>
<td colspan="2">
Dear <?php echo $name; ?>,<br>
Thanks for choosing quick-teck. <br>
The following is your order information. We will start to review your order as soon as possible. An order confirmation 
email will be sent to you once it completed. <br>
</td>
</tr>
</table>

<table style=" font-size:large;font-weight:bold; border:1px solid #C0C0C0; width:600px;" align="center"; cellspacing="1">
<tr>
<td colspan="2" align="center" class="style2">Customer information<br></td>
</tr>
<tr>
<td class="style1" style="width: 142px"> Customer name: </td>
<td class="style1"> 
<?php 
if($_REQUEST['name']==""){
	echo "<font size=\"3\" color=\"FF0033\">Your name is missing! Please close this window go back to the previous page and try again.</font>";
} else {
	echo $_REQUEST['name'];
}
?>
<br>
</td>
</tr>
<tr><td class="style1" style="width: 142px"> Contact number: </td><td class="style1"><?php echo $_REQUEST['phone']; ?> <br></td></tr>
<tr><td class="style1" style="width: 142px">Email: </td>
<td class="style1"> 
<?php if($_REQUEST['email']==""){
	echo "<font size=\"3\" color=\"FF0033\">Your email is missing! Please close this window go back to the previous page and try again. </font>";
} else {
	echo $_REQUEST['email'];
}
 ?> 
<br>
</td>
</tr>
<tr><td class="style1" style="width: 142px">Deliver address:</td><td class="style1"> <?php echo $_REQUEST['deliveryaddress1']; ?><br>
<?php echo $_REQUEST['deliveryaddress2']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Deliver postcode: </td><td class="style1"> <?php echo $_REQUEST['deliverypostcode']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Company: </td><td class="style1"> <?php echo $_REQUEST['company']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Country: </td><td class="style1"> <?php echo $country ?><br></td></tr>
<tr><td colspan="2" align="center" class="style2">PCB information<br></td></tr>
<tr><td class="style1" style="width: 142px">Layer: </td>
<td class="style1"> 
<?php
switch ($_REQUEST['layer'])
{
	case 1:
		echo "1 layer";
		break;
	case 2:
		echo "2 layers";
		break;
	case 4:
		echo "4 layers";
		break;
	case 6:
		echo "6 layers";
		break;
	case 8:
		echo "8 layers";
		break;
	default:
		echo "You have select an incorrect layer number";
}
?>
</td>
</tr>
<tr><td class="style1" style="width: 142px">Quantity: </td><td class="style1"><?php echo $_REQUEST['quantity']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Length(mm):</td><td class="style1"> <?php echo $_REQUEST['length']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Width(mm):  </td><td class="style1"><?php echo $_REQUEST['width']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Material:</td><td class="style1"><?php echo $materialType; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Thickness:</td>
<td class="style1">
<?php
switch ($_REQUEST['thickness'])
{
	case 0.4:
		echo "0.4mm";
		break;
	case 0.6:
		echo "0.6mm";
		break;
	case 0.8:
		echo "0.8mm";
		break;
	case 1.0:
		echo "1.0mm";
		break;
	case 1.6:
		echo "1.6mm";
		break;
	case 2.0:
		echo "2.0mm";
		break;
	case 2.4:
		echo "2.4mm";
		break;
	default:
		echo "You have select an incorrect thickness value";
}
?>
<br>
</td>
</tr>
<tr>
<td class="style1" style="width: 142px">Copper weight:</td><td class="style1">
<?php
switch ($_REQUEST['weight'])
{
	case 0.5:
		echo "0.5 oz";
		break;
	case 1.0:
		echo "1.0 oz";
		break;
	case 2.0:
		echo "2.0 oz";
		break;
	default:
		echo "You have select an incorrect copper thickness value";
}
?>
<br>
</td>
</tr>
<tr><td class="style1" style="width: 142px">Solder mask:</td><td class="style1"> <?php echo $_REQUEST['soldermask']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Silkscreen:</td><td class="style1"> <?php echo $_REQUEST['silkscreen']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Surface finish:</td><td class="style1">
<?php
switch ($_REQUEST['surface'])
{
	case 1:
		echo "HASL(Not RoHS compliance)";
		break;
	case 2:
		echo "HASL(Lead free)";
		break;
	case 3:
		echo "Electrolytic Gold";
		break;
	case 4:
		echo "OSP";
		break;
	case 5:
		echo "Electroless Nickel/Immersion Gold";
		break;
	default:
		echo "You have select an incorrect finish option.";
}
?>
<br>
</td>
</tr>
<tr>
<td class="style1" style="width: 142px">Lead time:</td>
<td class="style1"> 
<?php
switch ($_REQUEST['days'])
{
	case 5:
		echo "5 working days";
		break;
	case 6:
		echo "6 working days";
		break;
	case 7:
		echo "7 working days";
		break;
	case 8:
		echo "8 working days";
		break;
	case 10:
		echo "10 working days";
		break;
	case 12:
		echo "12 working days";
		break;
	case 20:
		echo "Laid-back Price(15-20 working days)";
		break;
	default:
		echo "You have select an incorrect lead time.";
}
?>
<br>
</td>
</tr>
<tr><td class="style1" style="width: 142px">Saving option:</td><td class="style1"> <?php echo $prototype; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Repeat order:</td><td class="style1"> <?php echo $sameDesign."(Order Number: ".$_POST[historyOrderNumber].")"; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">Need laser stencil:</td><td class="style1"> <?php if($needStencil == "Yes"){echo $needStencil."(".$stencilType1.")";}else{echo $needStencil;}; ?><br></td></tr>
<tr style="display:none">
	<td class="style1" style="width: 142px">The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill:</td>
	<td class="style1"> <?php echo $tech; ?><br></td>
</tr>
<?php
if($country != "UK"){
?>
<tr><td class="style1" style="width: 142px">Have VAT number:</td><td class="style1"> <?php echo $haveVAT; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">VAT number:</td><td class="style1"> <?php echo $_REQUEST['VATNumber']; ?><br></td></tr>
<?php
}
?>
<tr><td class="style1" style="width: 142px">Total price(&pound;):</td><td class="style1"> <?php echo $_REQUEST['total']; ?><br></td></tr>
<tr><td class="style1" style="width: 142px">PCB file upload:</td>
<td class="style1"> 
<?php 
if ($uploadok==0) {
	echo "<font size=\"3\" color=\"FF0033\">Sorry your file was not uploaded. Please close this window and try again. Alternatively, you can send the file to info@quick-teck.co.uk";
} else {
	echo "PCB file uploaded.  </font>";
}
?> 
<br>
</td>
</tr>
<tr><td class="style1" style="width: 142px">Terms &amp; conditions:</td>
<td class="style1"> 
<?php 
if($_REQUEST['terms']=="on"){
	echo "Agreed";
} else {
	echo "<font size=\"3\" color=\"FF0033\">Please close this window go back to the previous page to accept terms and conditions. </font>";
}
 ?> 
<br>
</td>
</tr>
</table>

<table style=" font-style:oblique; font-size:large;font-weight:bold; width:750px">
<tr><td>
<br>
If you see any warning messages(in red colour) in the above table please close this window and re-submit your order information again. Otherwise, please 
close this window and go to next step to complete your payment process.<br>
Any problem please let us know. <br>
Regards!<br>
<br>
Quick-teck <br>
</td>
</tr>
</table>
</form>

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