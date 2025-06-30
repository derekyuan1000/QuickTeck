<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderCommentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/PdfMailer_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExchangeRateService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/EEShoppingCarItem_Class.php");

if(!$_POST[firstName] || empty($_SESSION[EEShoppingCar])){
	echo "<script type='text/javascript'>location.href='selectTakeOrderType.php';</script>";
	return;
}
$shoppingCar = unserialize($_SESSION[EEShoppingCar]);

$to = "pcb_prototype@hotmail.co.uk,info@quick-teck.co.uk";//English Email To
$from = $_POST['email'];//English Email From
//$to_ch = "1206200302@qq.com,1120275135@qq.com,chenglong-1912@hotmail.com,1203911670@qq.com,2388283159@qq.com";//Chinese Email To
//$from_ch = "quickte2@cl84.justhost.com";//Chinese Email From
$bcc = "1226983621@qq.com";//English and Chinese Email BCC

$headers = "From:$from\r\nBCC:$bcc\r\nContent-type:text/html; charset=utf-8";

$firstName = trim($_POST[firstName]);
$surname = trim($_POST[surname]);
$company = trim($_POST[company]);
$telephone = trim($_POST[telephone]);
$email = trim($_POST[email]);
$countryId = $_POST[country];
$country = Common::GetCountryById($countryId);
$cityTown = trim($_POST[cityTown]);
$postcode = trim($_POST[postcode]);
$addressLineOne = trim($_POST[addressLineOne]);
$addressLineTwo = trim($_POST[addressLineTwo]);

$firstName2 = trim($_POST[firstName2]);
$surname2 = trim($_POST[surname2]);
$company2 = trim($_POST[company2]);
$telephone2 = trim($_POST[telephone2]);
$email2 = trim($_POST[email2]);
$countryId2 = $_POST[country2];
$country2 = Common::GetCountryById($countryId2);
$cityTown2 = trim($_POST[cityTown2]);
$postcode2 = trim($_POST[postcode2]);
$addressLineOne2 = trim($_POST[addressLineOne2]);
$addressLineTwo2 = trim($_POST[addressLineTwo2]);

$post_haveVAT = $_POST[haveVAT];
$VATNumber = trim($_POST[VATNumber]);
$message = trim($_POST[message]);
$terms = $_POST[terms];
$workingDays = $_POST[days];
$VATPrice = trim($_POST[VATPrice]);
$excVATPrice = trim($_POST[excVATPrice]);
$totalPrice = trim($_POST[total]);
$PCBOrderNumber = trim($_POST[PCBorderNumber]);

$voucherNumber = trim($_POST[voucherNumber]);

$body = "We have received an order request.<br>
		The order information is the following: <br><br>";
		
$body.= "Billing Information:<br>";	
$body.= "Firstname: ".$firstName."<br>";
$body.= "Surname: ".$surname."<br>";
$body.= "Organization/Company: ".$company."<br>";
$body.= "Email: ".$email."<br>";
$body.= "Phone number: ".$telephone."<br>";
$body.= "Shipping address line1: ".$addressLineOne."<br>";
$body.= "Shipping address line2: ".$addressLineTwo."<br>";
$body.= "Town/City: ".$cityTown."<br>";
$body.= "Postcode: ".$postcode."<br>";
$body.= "Country: ".$country."<br><br>";

$body.= "Shipping Information:<br>";
$body.= "Firstname: ".$firstName2."<br>";
$body.= "Surname: ".$surname2."<br>";
$body.= "Organization/Company: ".$company2."<br>";
$body.= "Email: ".$email2."<br>";
$body.= "Phone number: ".$telephone2."<br>";
$body.= "Shipping address line1: ".$addressLineOne2."<br>";
$body.= "Shipping address line2: ".$addressLineTwo2."<br>";
$body.= "Town/City: ".$cityTown2."<br>";
$body.= "Postcode: ".$postcode2."<br>";
$body.= "Country: ".$country2."<br><br>";

switch ($post_haveVAT){
	case 0:$body.= "Have VAT number: No<br>";$haveVAT="No";break;
	case 1:$body.= "Have VAT number: Yes<br>";$haveVAT="Yes";break;
}
if($post_haveVAT){
	$body.= "VAT number: ".$VATNumber."<br>";
}
if($totalPrice == 0){
	$body.= "Total price: Contact us<br>";
}else{
	$body.= "Total price: ".$totalPrice."<br>";
}
if($post_haveVAT && $VATNumber){
	$body.= "exc VAT price: ".$totalPrice."<br>";
}else{
	$body.= "exc VAT price: ".round($totalPrice / 1.2, 2)."<br>";
}

if($PCBOrderNumber){
	$body.= "PCB order number: ".$PCBOrderNumber."<br>";
}
$body.= "Message: ".$message."<br>";
$body.= "Terms and conditions: ".$terms."<br>";

//----------------------------------Auto add order to Quick-teck Management system----------------------------------
try{
	$eeOrderService = new EEOrderService();
	$holidayService = new HolidayService();
	$clientService = new ClientService();
	
	$now = date("Y-m-d H:i:s");
	if($_SESSION[currentClient]){	
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
	$number = Common::GetNewEEOrderNumber($countryId);
	
	$dateArray = $holidayService->GetTargetDay($orderTime, $workingDays);
	$targetDate =  $dateArray[count($dateArray)-1]->BasicDate;
	

	$clientRandomCode = mt_rand(100000, 999999);	
	/*---------------------------------------Insert to DB---------------------------------------*/
		$a = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$b = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$c = array('1','2','3','4','5','6','7','8','9','0');
		$systemRandomCode = "";
		for($i = 0; $i < 25; $i++){
			if(fmod(rand(0,9),3)==0){
				$systemRandomCode.= $a[rand(0, 25)];
			}else if(fmod(rand(0,9),3)==1){
				$systemRandomCode.= $b[rand(0, 25)];
			}else{
				$systemRandomCode.= $c[rand(0,9)];
			}
		}
		
		//Use voucher
		$voucherService = new VoucherService();
		$voucher = $voucherService->GetVoucherByNumber($voucherNumber);
		if($voucher){
			if($voucher->Status == 1 && $voucher->BeginTime <= $now && $voucher->ExpiredTime >= $now){
				if($voucher->Category == 1){
					$voucher->Status = 2;
					$voucher->UsedTime = $now;
					$voucher->OrderNumber = $number;
					$result1 = $voucherService->ModifyVoucher($voucher);
				}else{
					$result1 = true;
				}
				if($result1){
					$body .= "<br>Use voucher successfully!Voucher Number:".$voucher->Number."(".ceil($voucher->Percent)."%(£".$voucher->MaxPrice.")".")";
				}else{
					$voucherNumber = "";
				}
			}
		}
		
		$eeOrderStatusId = 1;
		$isEnable = 1;
		$isPaid = 0;
		$isCombinedOrder = 1;
		
		//Insert Order	
		/*"`Number`,`OrderTime`,`WorkingDays`,`TargetDate`,`ActualDate`,`HaveVAT`,`VatNumber`,`VoucherNumber`,"
		."`ExcVATPrice`,`VATPrice`,`TotalPrice`,`UKShippingPrice`,`Comment`,`ExpressNumber`,`ClientRandomCode`,`IsPaid`,"
		."`PaymentComment`,`EEOrderStatusId`,`DutyPerson`,`MaterialCost`,`AdditionalCost`,`ClientId`,`FirstName1`,`SurName1`,"
		."`Company1`,`Email1`,`Telephone1`,`CityTown1`,`AddressLineOne1`,`AddressLineTwo1`,`Postcode1`,`CountryId1`,"
		."`FirstName2`,`SurName2`,`Company2`,`Email2`,`Telephone2`,`CityTown2`,`AddressLineOne2`,`AddressLineTwo2`,"
		."`Postcode2`,`CountryId2`,`SystemRandomCode`,`ExpressId`,`IsEnable`,`Remark`,`Int1`,`Int2`,"
		."`Int3`,`Int4`,`Int5`,`Double1`,`Double2`,`Double3`,`Double4`,`Double5`,"
		."`Bool1`,`Bool2`,`Bool3`,`Bool4`,`Bool5`,`DateTime1`,`DateTime2`,`DateTime3`,"
		."`DateTime4`,`DateTime5`,`Varchar1`,`Varchar2`,`Varchar3`,`Varchar4`,`Varchar5`";*/
		$eeOrder = new EEOrder(0, $number, $orderTime, $workingDays, $targetDate, $actualDate, $post_haveVAT, $VATNumber, $voucherNumber,
			$excVATPrice, $VATPrice, $totalPrice, $UKShippingPrice, $comment, $expressNumber, $clientRandomCode, $isPaid,
			$paymentComment, $eeOrderStatusId, $dutyPerson, $materialCost, $additionalCost, $clientId, $firstName, $surname,
			$company, $email, $telephone, $cityTown, $addressLineOne, $addressLineTwo, $postcode, $countryId,
			$firstName2, $surname2, $company2, $email2, $telephone2, $cityTown2, $addressLineOne2, $addressLineTwo2,
			$postcode2, $countryId2, $systemRandomCode, $expressId, $isEnable, $isCombinedOrder, $PCBOrderNumber, $remark,
			0, 0, 0, 0, 0,
			0.0, 0.0, 0.0, 0.0, 0.0,
			false,false,false,false,false,
			"", "", "", "", "",
			"","","","","");
			
		$result2 = $eeOrderService->AddEEOrder($eeOrder);
		//Insert Order Processing
		$eeOrderProcessingService = new EEOrderProcessingService();
		$eeOrderProcessing = new EEOrderProcessing(0, $result2, $eeOrderStatusId, 8, $now);
		$result3 = $eeOrderProcessingService->AddeeOrderProcessing($eeOrderProcessing);
		//Insert Order Comment
		if($comment != ""){
			$eeOrderCommentService = new EEOrderCommentService();
			$eeOrderComment = new EEOrderComment(0, $result2, $comment, 8, $now, 1);
			$result4 = $eeOrderCommentService->AddEEOrderComment($eeOrderComment);
		}else{
			$result4 = 1;	
		}
		//Insert Order Detail
		$eeOrderDetailService = new EEOrderDetailService();
		foreach ($shoppingCar as $eeId_c => $shoppingCarItem_c) { 
			$eeOrderDetail = new EEOrderDetail(0,$result2,$eeId_c,$shoppingCarItem_c->EENo, $shoppingCarItem_c->EEName, $shoppingCarItem_c->Quantity,
				$shoppingCarItem_c->Price,$shoppingCarItem_c->Total);
			$eeOrderDetailService->AddEEOrderDetail($eeOrderDetail);
			$body .= "<br>No: ".$shoppingCarItem_c->EENo."&nbsp;Name: ".$shoppingCarItem_c->EEName."&nbsp;Quantity: ".$shoppingCarItem_c->Quantity
				."&nbsp;Price: ".$shoppingCarItem_c->Price."&nbsp;Total: ".$shoppingCarItem_c->Total;
		}

		if($result2 && $result3 && $result4){
			$body .= "<br>Auto add a new order to Quick-teck Management system successfully!(Order Number:".$number.")";
		}
}catch(Exception $e){
	$body .= "<br>Auto add a new order to Quick-teck Management system failed!<br>".$e;
}
$subject = "Component order forum(".$number.")";
$send = mail($to, $subject, $body, $headers);
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
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/StyleSheet.css" type="text/css" rel="stylesheet" />
<style type="text/css">
		input{border:1px solid #cccccc}
		.table1{ 
			border-top:#aacded 1px solid;border-left:#aacded 1px solid; 
        }
        .table1 td
        {
            border-bottom:#aacded 1px solid; border-right:#aacded 1px solid;
        }
    </style>
</head>
<body>
	<div style="text-align: center;width: 800px; margin:auto; background-color:white; display:none">
	<table class="table1" width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td style="width:20%">

			</td>
			<!--<td style="width:40%">
			Billing information
			</td>-->
			<td style="width:80%">
			Shipping information
			</td>
		</tr>
		<tr>
			<td>Firstname:</td>
			<!--<td><?php echo $firstName; ?></td>-->
			<td><?php echo $firstName2; ?></td>
		</tr>
		<tr>
			<td>Surname:</td>
			<!--<td><?php echo $surname; ?></td>-->
			<td><?php echo $surname2; ?></td>
		</tr>
		<tr>
			<td>Organization/Company:</td>
			<!--<td><?php echo $company; ?></td>-->
			<td><?php echo $company2; ?></td>
		</tr>
		<tr>
			<td>Email:</td>
			<!--<td><?php echo $email; ?></td>-->
			<td><?php echo $email2; ?></td>
		</tr>
		<tr>
			<td>Phone number:</td>
			<!--<td><?php echo $telephone; ?></td>-->
			<td><?php echo $telephone2; ?></td>
		</tr>
		<tr>
			<td>Address line1:</td>
			<!--<td><?php echo $addressLineOne; ?></td>-->
			<td><?php echo $addressLineOne2; ?></td>
		</tr>
		<tr>
			<td>Address line2:</td>
			<!--<td><?php echo $addressLineTwo; ?></td>-->
			<td><?php echo $addressLineTwo2; ?></td>
		</tr>
		<tr>
			<td>Town/City:</td>
			<!--<td><?php echo $cityTown; ?></td>-->
			<td><?php echo $cityTown2; ?></td>
		</tr>
		<tr>
			<td>Postcode:</td>
			<!--<td><?php echo $postcode; ?></td>-->
			<td><?php echo $postcode2; ?></td>
		</tr>
		<tr>
			<td>Country:</td>
			<!--<td><?php echo $country; ?></td>-->
			<td><?php echo $country2; ?></td>
		</tr>

		<tr>
			<td colspan="3" style="font-weight:bold;">Order information</td>
		</tr>
		<tr>
			<td>Order number:</td>
			<td colspan="2"><?php echo $number; ?></td>
		</tr>
		<tr>
			<td>Lead time:</td>
			<td colspan="2">
			<?php
			switch ($workingDays)
			{
			case 5:echo "5 working days"; break;
			case 6:echo "6 working days"; break;
			case 7:echo "7 working days"; break;
			case 8:echo "8 working days"; break;
			case 10:echo "10 working days"; break;
			case 11:echo "11 working days"; break;
			case 20:echo "15-20 working days"; break;
			default:echo "You have select an incorrect lead time.";
			}
			?>
			</td>
		</tr>
		<?php if($country != "UK"){ ?>
			<tr>
				<td>Have VAT number: </td>
				<td colspan="2"> <?php echo $haveVAT; ?><br></td>
			</tr>
			<tr>
				<td>VAT number: </td>
				<td colspan="2"> <?php echo $VATNumber; ?><br></td>
			</tr>
		<?php } ?>
		<tr>
			<td>Total price(&pound;):</td>
			<td colspan="2"><?php echo $totalPrice; ?> 
			<?php 
			/*$language = Common::GetLanguage();
			if($language != "english"){
			$euroPrice = 0;
			$exchangeRateService = new ExchangeRateService();
			$exchangeRateUsed = $exchangeRateService->GetNewExchangeRate();
			$euroPrice =  $totalPrice * ($exchangeRateUsed->Rate + Config::$exchangeRateFactor);
			echo "&nbsp; &nbsp; (&euro;".round($euroPrice,2).")"; 
			}*/
			?>
			</td>
		</tr>
		<tr style="display:none">
			<td>Terms & conditions:</td>
			<td colspan="2">
				Agreed
			</td>
		</tr>
	</table>
	<br/>
	<table class="table1" border="0" cellpadding="0" cellspacing="0" width="550px">
		<tr style="background-color:#EFF7FF; font-weight:bold">
			<td style="height: 30px; width:30px">
				No</td>
			<td style="height: 30px; width:290px">
				Name</td>
			<td style="height: 30px; width:80px">
				Price</td>
			<td style="height: 30px; width:60px">
				Quantity</td>
			<td style="height: 30px; width:90px">
				Total</td>
		</tr>                
			<?php  
				$i = 0;
				foreach ($shoppingCar as $eeId_c => $shoppingCarItem_c) { 
			?>
				<tr>
					<td style="height: 28px; padding-left:5px">
						<?php 
							$i = $i + 1;
							echo $i;
						?>
					</td>
					<td style="text-align:left; padding-left:10px">
						<?php 
							echo "<a href='eeDetail.php?eeId=".$eeId_c."' target='_blank'>".$shoppingCarItem_c->EEName."</a>";
						?>
					</td>
					<td style="color:red; font-weight:bold">
						<?php 
							echo "&pound;".sprintf("%01.2f", $shoppingCarItem_c->Price);
						?>
					</td>
					<td>
						<?php echo $shoppingCarItem_c->Quantity;?>
					</td>
					<td>
						<?php 
							echo "&pound;".sprintf("%01.2f", $shoppingCarItem_c->Total);
						?>
					</td>
				</tr>
			<?php  
			}
			unset($_SESSION[EEShoppingCar]);
			?>
			<tr style="background-color:#EFF7FF">
				<td colspan="5" style="height: 25px; text-align: left; padding-left:380px">
					Total Price Exc VAT:&nbsp;<span style="color:Red; font-weight:bold;">&pound;<?php echo sprintf("%01.2f", $excVATPrice); ?>
				</td>
			</tr>
			<tr style="background-color:#EFF7FF">
				<td colspan="5" style="height: 25px; text-align: left; padding-left:380px">
					VAT:&nbsp;<span style="color:Red; font-weight:bold;"><?php if($post_haveVAT && $VATNumber){echo "N/A";}else{echo "&pound;".sprintf("%01.2f", $VATPrice);} ?>
				</td>
			</tr>
			<tr style="background-color:#EFF7FF">
				<td colspan="5" style="height: 25px; text-align: left; padding-left:380px">
					Total Price Inc VAT:&nbsp;<span style="color:Red; font-weight:bold;"><?php if($post_haveVAT && $VATNumber){echo "N/A";}else{echo "&pound;".sprintf("%01.2f", $totalPrice);} ?>
				</td>
			</tr>
	</table>
	<br/>
		<form id="form1" action="../order/checkout.php" method="post">
			<!--<input type="hidden" name="eeNumber" id="eeNumber" value="<?php echo $number; ?>"/>
			<input type="hidden" name="eeTotal" id="eeTotal" value="<?php echo $totalPrice; ?>"/>-->
			<input type="hidden" name="eeOrderId" id="eeOrderId" value="<?php echo $result2; ?>"/>
			<input type="submit" value="Checkout"/>
		</form>
	</div>
</body>
</html>
<?php  
echo "<script type='text/javascript'>location.href='../order/checkout.php?eeOrderId=".$result2."';</script>";
?>