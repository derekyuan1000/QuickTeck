<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[shoppingCartId])){
	echo "<script type='text/javascript'>location.href='../clients/selectTakeOrderType.php';</script>";
	return;
}

$orderService = new OrderService();
$clientService = new ClientService();
$orderDetailService = new OrderDetailService();
$orderDetailArray = $orderDetailService->GetOrderDetailByShippingCartId($_SESSION[shoppingCartId]);
//$orderDetailArray = $orderDetailService->GetOrderDetailByShippingCartId("1327756884");
if(count($orderDetailArray) == 0){
	echo "<script type='text/javascript'>location.href='../clients/selectTakeOrderType.php';</script>";
	return;
}
unset($_SESSION[shoppingCartId]);
unset($_SESSION[noLoginClient]);
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
<script type="text/javascript" src="../Management/Scripts/external/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.draggable.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.resizable.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.dialog.js"></script>
	
<script type="text/javascript">
	var jq = jQuery.noConflict();
	jq(document).ready(function() {
		jq(".h2_cat").mousemove(function() {
			jq(this).addClass("h2_cat active_cat");
		}).mouseout(function() {
			jq(this).removeClass("active_cat");
		});
	});
	
	jq(document).ready(function() {
		jq("#dialog:ui-dialog").dialog("destroy");
		jq("[id^=dialog_]").dialog({
			height: 460,
			width:420,
			autoOpen: false,
			modal: true
		});
	});
	
	function showDetail(id){
		jq("#"+id).dialog("open");
	}

</script>
<link rel="Stylesheet" href="../Management/Styles/menu.css" type="text/css"  />
<link rel="stylesheet" href="../images/CSS.CSS" type="text/css"/>
<link rel="stylesheet" href="../Management/Scripts/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="../Management/Scripts/demos.css" type="text/css"/>
<style type="text/css">
<!--
.style1 {
				margin-bottom: 0px;
}
.style3 {
				text-align: left;font-size: small;border: 1px solid #C0C0C0;
}
.style4 {
				font-size: x-small;color:blue;
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
.style9 {
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
			&nbsp;
          </td>
        </tr>
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
				<div style="font-size: medium; color: #FF6600; font-weight:bold">Orders for checkout(<?php echo count($orderDetailArray)?>):</div>
				<table width="550px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:center">
					<tr style="background-color:#D7D59D; color:#344b50; font-weight:bold">
						<td style="width:15%; height:20px;">Number</td>
						<td style="width:15%;">Price</td>
						<td style="width:15%;">VAT</td>
						<td style="width:15%;">Subtotal</td>
						<td style="width:40%;"></td>
					</tr>
					<?php 
					$totalPrice = 0;
					for($i=0; $i < count($orderDetailArray); $i++)
					{
						$orderInShoppingCart = $orderService->GetOrderById($orderDetailArray[$i]->OrderId);
						$clientForOrder = $clientService->GetClientById($orderInShoppingCart->ClientId);
						switch ($orderDetailArray[$i]->Int1){
							case 1:$stencilType1="only top";break;
							case 2:$stencilType1="only bottom";break;
							case 3:$stencilType1="both top & bottom";break;
						}
						$totalPrice = $totalPrice + $orderDetailArray[$i]->TotalPrice;
						if($i == 0){
							$paypalOrderNumber = $orderInShoppingCart->Number;
						}
					?>
					<tr style="background-color:#D7D59D; color:#344b50">
						<td style="height:20px;">
							<?php echo $orderInShoppingCart->Number;?>
						</td>
						<td>
							&pound;<?php echo $orderDetailArray[$i]->ExcVATPrice;?>
						</td>
						<td>
							&pound;<?php echo $orderDetailArray[$i]->VATPrice;?>
						</td>
						<td>
							&pound;<?php echo $orderDetailArray[$i]->TotalPrice;?>
						</td>
						<td>
						<a onclick="showDetail('dialog_<?php echo $orderInShoppingCart->Id?>')" style="color:#344b50; text-decoration:underline" href="#">Details</a>
						<div id="dialog_<?php echo $orderInShoppingCart->Id;?>">
							
<table id="tableMessage" style=" font-size:large;font-weight:bold; border:1px solid #C0C0C0; border-collapse:collapse; width:98%;" align="center"; border="0" cellspacing="0">
	<tr><td colspan="2" align="center" class="style2">Customer information<br></td></tr>
	<tr><td class="style1" style="width: 142px">Firstname: </td><td class="style1"> <?php echo $orderInShoppingCart->FirstName; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Surname: </td><td class="style1"> <?php echo $orderInShoppingCart->SurName; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Organization/Company: </td><td class="style1"> <?php echo $orderInShoppingCart->Company;?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Email: </td><td class="style1"> <?php echo $orderInShoppingCart->ReceiverEmail;?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Phone number: </td><td class="style1"> <?php echo $orderInShoppingCart->ReceiverTelephone; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Shipping address line1: </td><td class="style1"> <?php echo $orderInShoppingCart->AddressLineOne; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Shipping address line2: </td><td class="style1"> <?php echo $orderInShoppingCart->AddressLineTwo; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Town/City: </td><td class="style1"> <?php echo $orderInShoppingCart->CityTown; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Postcode: </td><td class="style1"> <?php echo $orderInShoppingCart->ReceiverPostCode; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Country: </td><td class="style1"> <?php $countryId = $orderInShoppingCart->CountryId; $country = Common::GetCountryById($countryId); echo $country;?><br></td></tr>
	<tr><td colspan="2" align="center" class="style2">PCB information<br></td></tr>
	<tr><td class="style1" style="width: 142px">Board layer: </td>
		<td class="style1"> 
		<?php
			switch ($orderDetailArray[$i]->Layer)
			{
				case 1:echo "1 layer";break;
				case 2:echo "2 layers";break;
				case 4:echo "4 layers";break;
				case 6:echo "6 layers";break;
				case 8:echo "8 layers";break;
			}
		?>
		<br>
		</td>
	</tr>
	<tr><td class="style1" style="width: 142px">Quantity: </td><td class="style1"> <?php echo $orderDetailArray[$i]->Quantity; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Length(mm): </td><td class="style1"> <?php echo $orderDetailArray[$i]->Length; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Width(mm): </td><td class="style1"> <?php echo $orderDetailArray[$i]->Width; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Material: </td><td class="style1"> <?php echo $orderDetailArray[$i]->BaseMaterial; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Thickness: </td><td class="style1"> <?php echo $orderDetailArray[$i]->Thickness."mm";?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Copper weight: </td><td class="style1"> <?php echo $orderDetailArray[$i]->CopperWeight."oz";?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Solder mask: </td><td class="style1"> <?php echo $orderDetailArray[$i]->SolderMask; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Silkscreen: </td><td class="style1"> <?php echo $orderDetailArray[$i]->SilkScreen; ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Surface finish: </td><td class="style1"> <?php echo $orderDetailArray[$i]->Surface; ?><br></td>
	</tr>
	<tr><td class="style1" style="width: 142px">Lead time: </td>
		<td class="style1"> 
		<?php
			switch ($orderDetailArray[$i]->WorkingDays)
			{
				case 5:echo "5 working days";break;
				case 6:echo "6 working days";break;
				case 7:echo "7 working days";break;
				case 8:echo "8 working days";break;
				case 10:echo "10 working days";break;
				case 12:echo "12 working days";break;
				case 20:echo "Laid-back Price(15-20 working days)";break;
			}
		?>
		<br>
		</td>
	</tr>
	<tr><td class="style1" style="width: 142px">Repeat order: </td><td class="style1"> <?php if($orderDetailArray[$i]->IsRepeatOrder == "1"){echo "Yes(Order Number: ".$orderDetailArray[$i]->Varchar1.")";}else{echo "No";} ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Saving option: </td><td class="style1"> <?php if($orderDetailArray[$i]->IsPrototype == "1"){echo "Yes";}else{echo "No";} ?><br></td></tr>
	<tr><td class="style1" style="width: 142px">Need laser stencil: </td><td class="style1"> <?php if($orderDetailArray[$i]->IsLaserStencil == "1"){echo "Yes(".$stencilType1.")";}else{echo "No";} ?><br></td></tr>
	<tr style="display:none">
		<td class="style1" style="width: 142px">The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: </td>
		<td class="style1"> <?php echo $tech; ?><br></td>
	</tr>
	<?php if(!$orderDetailArray[$i]->VatNumber){ ?>
	<tr><td class="style1" style="width: 142px">VAT number: </td><td class="style1"> <?php echo $orderDetailArray[$i]->VatNumber; ?><br></td></tr>
	<?php } ?>
	<tr><td class="style1" style="width: 142px">Total price(&pound;): </td><td class="style1"> <?php echo $orderDetailArray[$i]->TotalPrice; ?><br></td></tr>
</table>
				
						</div>
						</td>
					</tr>
					<?php
					}
					?>
				</table>
<?php
$od5 = $orderDetailArray[0]->BaseMaterial;
$od6 = $orderDetailArray[0]->Thickness;
$od7 = $orderDetailArray[0]->CopperWeight;
$od8 = $orderDetailArray[0]->SolderMask;
$od9 = $orderDetailArray[0]->SilkScreen;
$od10 = $orderDetailArray[0]->Surface;
$od11 = $orderDetailArray[0]->WorkingDays;
if(count($orderDetailArray) > 1){
	$odFlag = true;
}else{
	$odFlag = false;
}
for($i=1; $i < count($orderDetailArray); $i++)
{
	if($od5 != $orderDetailArray[$i]->BaseMaterial || $od6 != $orderDetailArray[$i]->Thickness || 
		$od7 != $orderDetailArray[$i]->CopperWeight || $od8 != $orderDetailArray[$i]->SolderMask ||
		$od9 != $orderDetailArray[$i]->SilkScreen || $od10 != $orderDetailArray[$i]->Surface ||
		$od11 != $orderDetailArray[$i]->WorkingDays){
		$odFlag = false;
		break;
	}
}
//if(count($orderDetailArray) > 1){
//	$discountForCheckout = 0.05;
//	if($odFlag){
//		$discountForCheckout = 0.1;
//	}
//}else{
//	$discountForCheckout = 0;
//}
$discountForCheckout = 0;
$checkoutPrice = $totalPrice * (1 - $discountForCheckout);
$checkoutPrice = round($checkoutPrice, 2);
//if($checkoutPrice > 300){
	//$paypalPrice = round($checkoutPrice * 1.03, 2);
//}else{
	$paypalPrice = $checkoutPrice;
//}
?>
<br>
<input type="hidden" id="totalPrice" value="<?php echo $totalPrice; ?>" />
<span style="font-size: 16px; color: black; font-weight:bold">Total price:</span>
<span style="font-size: 16px; color: #FF6600; font-weight:bold"> &pound; <?php echo $totalPrice; ?></span>
<br><br>
<!--<span style="font-size: 16px; color: black; font-weight:bold">Discount:</span>
<span style="font-size: 16px; color: #FF6600; font-weight:bold"><?php echo ($discountForCheckout*100)."%"; ?></span>
<br>
<span style="font-size: 16px; color: black; font-weight:bold">Price(transfer):</span>
<span style="font-size: 16px; color: #FF6600; font-weight:bold">&pound;<?php echo $checkoutPrice; ?></span>
<br>
<span style="font-size: 16px; color: black; font-weight:bold">Price(PayPal):</span>
<span style="font-size: 16px; color: #FF6600; font-weight:bold">&pound;<?php echo $paypalPrice ?></span>
<br>
<hr>
<div style="font-size: medium; color: #FF6600; font-weight:bold">Use voucher:</div>
<table width="550px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:center">
	<tr>
		<td class="style3">
			Input voucher code here if you have: 
			[<span class="style6"><strong onclick="myOpen('/comment/voucher_comment.php',200,300)">?</strong></span>]
		</td>
		<td class="style3">
			Voucher code: <input name="voucherNumber" id="voucherNumber" type="text">
			<input name="Apply" onclick="ajaxUseVoucher()" type="button" value="Used Voucher" height="10" style="width: 110px" class="style18" >
			<br/><span id="spanVoucherResult"></span>
			<input name="discount" id="discount" type="hidden">
		</td> 
	</tr>
</table>-->
<hr>
<span class="style16">
We accept payment by Credit/Debit Card, BACS transfer, wire transfers(Swift/IBAN) or&nbsp;through PayPal. Simply choose from one of the options to complete your online order. </span><br>
<br>
<div style="clear: both">&nbsp;</div>
<div style="float: left; width: 268px; height: 115px; margin-right: 10px; margin-bottom: 10px;">
<?php
require_once 'sagepay.php';
$enable_payment_gateway = true;

if(Config::$mode=="local"){
	$mode = 'TEST';
	$sagepay_server = new SagePay_Server('quickteck', $mode);
	$sagepay_server->setOptions('http://test.quick-teck.co.uk/order/notify.php', 'Quick-Teck - Low Cost PCB Prototype Manufacturer'); 
}else if(Config::$mode=="live" || Config::$mode=="test"){
	$mode = 'LIVE';
	$sagepay_server = new SagePay_Server('quickteck', $mode);
	$sagepay_server->setOptions('http://www.quick-teck.co.uk/order/notify.php', 'Quick-Teck - Low Cost PCB Prototype Manufacturer');
}else{
	$mode = 'TEST';
	$sagepay_server = new SagePay_Server('quickteck', $mode);
	$sagepay_server->setOptions('http://test.quick-teck.co.uk/order/notify.php', 'Quick-Teck - Low Cost PCB Prototype Manufacturer'); 
}
$sagepay_server->setEmail($orderInShoppingCart->ReceiverEmail);
$sagepay_server->setReference($paypalOrderNumber);
$sagepay_server->addItem('PCB Board Manufacture', 1, $paypalPrice);

$map = array(
	'France' => 'FR',
	'Ireland' => 'IE',
	'Germany' => 'DE',
	'Belgium' => 'BE',
	'Denmark' => 'DK',
	'Netherlands' => 'NL',
	'Spain' => 'ES',
	'Italy' => 'IT'
);
if (in_array($country, $map)) {
	$countryShort = $map[$country];
} else {
	$countryShort = 'GB';
}

$now = date("Y-m-d H:i:s");
$fd = fopen("pay.txt", "a+");
fputs($fd, "\r\n".$now."\r\n".$orderInShoppingCart->FirstName."\r\n". $orderInShoppingCart->SurName."\r\n"
		.$orderInShoppingCart->AddressLineOne."\r\n".$orderInShoppingCart->AddressLineTwo.
		"\r\n".$orderInShoppingCart->CityTown."\r\n".$orderInShoppingCart->ReceiverPostCode.
		"\r\n".$countryShort."\r\n".$orderInShoppingCart->ReceiverTelephone);
fclose($fd);

$sagepay_server->setBillingAddress($orderInShoppingCart->FirstName, $orderInShoppingCart->SurName, $orderInShoppingCart->AddressLineOne, $orderInShoppingCart->AddressLineTwo, $orderInShoppingCart->CityTown,
	$orderInShoppingCart->ReceiverPostCode, $countryShort, '', $orderInShoppingCart->ReceiverTelephone);
	
$url = $sagepay_server->getSagePayUrl();
if (is_array($url)) {
	$enable_payment_gateway = false;
	$error = $url['error'];
}

if ($enable_payment_gateway) {
?>
<a href="<?php echo $url ?>" target="_blank"><img src="/images/option_1_cc.png" alt="Pay by Credit / Debit Card"  style=" border:none" /></a>
<?php } else {
if ($mode == 'TEST') {
	echo '<strong>Error (TEST Mode):</strong> ' . $error . '<br />';
} else {
	@mail('gelukmobile@hotmail.com', 'Payment Gateway Error', "An error occurred with the payment gateway:\r\n\r\n" . $error, "From: gelukmobile@hotmail.com\r\nCc: rudi@rudiv.se");
}
?>
There seems to be an issue with our payment provider at the moment, please use an alternative method or try again later. Our technical support team has been notified.
<?php } ?>
</div>
<div style="float: left; width: 268px; height: 115px; margin-bottom: 10px;">
<form name="paynow" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
	<input type="hidden" name="cmd" value="_xclick" />
	<input type="hidden" name="business" value="sales@quick-teck.co.uk" />  
	<input type="hidden" name="item_name" value="Quick-teck,Low cost PCB and Assembly Partner" />
	<input type="hidden" name="item_number" value="<?php echo $paypalOrderNumber ?>" /> 
	<input type="hidden" name="amount" value="<?php echo $paypalPrice ?>" /> 
	<input type="hidden" name="no_shipping" value="2" /> 
	<input type="hidden" name="no_note" value="1" />
	<input type="hidden" name="currency_code" value="GBP" />
	<input type="image" src="/images/option_2_paypal.png" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
</form>
</div>
<div style="clear: both"></div>
<a href="../payment/bank_account.php" target="_blank"><img src="/images/option_3_bacs.png" alt="Pay by BACS / Instant Bank Transfer"  style="border: none"/></a>
<br>If paying by BACS, please <a href="mailto:info@quick-teck.co.uk"><span class="style14">email</span></a> us the remittance advice.</span><br>

<hr>

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