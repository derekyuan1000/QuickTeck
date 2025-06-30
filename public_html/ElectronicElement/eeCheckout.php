<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExchangeRateService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/order/sagepay.php");

$totalPrice = trim($_POST[eeTotal]);
$orderNumber = trim($_POST[eeNumber]);
$orderId = trim($_POST[eeOrderId]);
$eeOrderService = new EEOrderService();
$order = $eeOrderService->GetEEOrderById($orderId);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />

</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/external/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.draggable.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.resizable.js"></script>
<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.dialog.js"></script>
<script type="text/javascript">
function showDetail(id){
	document.getElementById(id).style.display="block";
}
$(document).ready(function() {
	$("#dialog:ui-dialog").dialog("destroy");
	$("[id^=dialog_]").dialog({
		height: 720,
		width:750,
		autoOpen: false,
		modal: true
	});
});

function showDetail(id){
	$("#"+id).dialog("open");
}
</script>
<link rel="stylesheet" href="../Management/Scripts/themes/base/jquery.ui.all.css">
</head>
<body>
		<div class="main_box mt10 lh2em fs14">
			<p>We accept payment by most major credit and debit cards. Our online payment system is secured by SagePay, UK leading online payment service provider.</p>
			<p>We also accept payment by BACS transfer, wire transfers (Swift/IBAN) or through PayPal.</br></p>
			<div style="float: left; width: 268px; height: 115px; margin-right: 10px; margin-bottom: 10px;margin-left:30px;">
				<?php
				$enable_payment_gateway = true;
				$mode = 'LIVE';
				$sagepay_server = new SagePay_Server('quickteck', $mode);
				$sagepay_server->setOptions('http://www.quick-teck.co.uk/order/notify.php', 'Quick-Teck - Low Cost PCB Prototype Manufacturer');
				$sagepay_server->setEmail($order->Email);
				$sagepay_server->setReference($order->Number."-".$totalPrice*100);
				$sagepay_server->addItem('PCB Board Manufacture', 1, $totalPrice);
				
				$countryId = $order->CountryId1;
				$country = Common::GetCountryById($countryId);

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
				fputs($fd, "\r\n".$now."\r\n".$order->FirstName1."\r\n". $order->SurName1."\r\n"
						.$order->AddressLineOne1."\r\n".$order->AddressLineTwo1.
						"\r\n".$order->CityTown1."\r\n".$order->Postcode1.
						"\r\n".$countryShort."\r\n".$order->Telephone1);
				fclose($fd);

				$sagepay_server->setBillingAddress($order->FirstName1, $order->SurName1, $order->AddressLineOne1, $order->AddressLineTwo1, $order->CityTown1,
					$order->Postcode1,  $countryShort, '', $order->Telephone1);

				$url = $sagepay_server->getSagePayUrl();
				if (is_array($url)) {
					$enable_payment_gateway = false;
					$error = $url['error'];
				}

				if ($enable_payment_gateway) {
				?>
				<a href="<?php echo $url ?>" target="_blank"><img src="/rescources/images/option_1_cc.png" alt="Pay by Credit / Debit Card"  style=" border:none" /></a>
				<?php 
				} else {
					if ($mode == 'TEST') {
						echo '<strong>Error (TEST Mode):</strong> ' . $error . '<br />';
					} else {
						@mail('gelukmobile@hotmail.com', 'Payment Gateway Error', "An error occurred with the payment gateway:\r\n\r\n" . $error, "From: gelukmobile@hotmail.com\r\nCc: pcb_prototype@hotmail.co.uk");
					}
				?>
					There seems to be an issue with our payment provider at the moment, please use an alternative method or try again later. Our technical support team has been notified.
				<?php 
				}
				?>
			</div>
			
			<div style="float: left; width: 268px; height: 115px; margin-bottom: 10px;">
				<form name="paynow" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
					<input type="hidden" name="cmd" value="_xclick" />
					<input type="hidden" name="business" value="sales@quick-teck.co.uk" />  
					<input type="hidden" name="item_name" value="Quick-teck,Low cost PCB and Assembly Partner" />
					<input type="hidden" name="item_number" value="<?php echo $orderNumber ?>" /> 
					<input type="hidden" name="amount" value="<?php echo $totalPrice ?>" /> 
					<input type="hidden" name="no_shipping" value="2" /> 
					<input type="hidden" name="no_note" value="1" />
					<input type="hidden" name="currency_code" value="GBP" />
					<input type="image" src="/rescources/images/option_2_paypal.png" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
				</form>
			</div>
			
			<div style="clear: both"></div>
			<a href="../payment/bank_account.php" target="_blank"><img src="/rescources/images/option_3_bacs.png" alt="Pay by BACS / Instant Bank Transfer"  style="border: none;margin-left:30px;"/></a>
		</div>
	</div>
	<div class="clear"></div>
</body>
</html>