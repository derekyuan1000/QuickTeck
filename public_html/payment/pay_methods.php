<?php 
session_start();
$langdate['paymethod'][0]['english']='Home';
$langdate['paymethod'][0]['french']='';
$langdate['paymethod'][0]['dutch']='';
$langdate['paymethod'][0]['spanish']='';
$langdate['paymethod'][1]['english']='Pay Methods';
$langdate['paymethod'][1]['french']='';
$langdate['paymethod'][1]['dutch']='';
$langdate['paymethod'][1]['spanish']='';
$langdate['paymethod'][2]['english']='We accept payment by most major credit and debit cards. Our online payment system is secured by SagePay, UK leading online payment service provider';
$langdate['paymethod'][2]['french']='';
$langdate['paymethod'][2]['dutch']='';
$langdate['paymethod'][2]['spanish']='';
$langdate['paymethod'][3]['english']='We also accept payment by BACS transfer, wire transfers (Swift/IBAN) or through PayPal';
$langdate['paymethod'][3]['french']='';
$langdate['paymethod'][3]['dutch']='';
$langdate['paymethod'][3]['spanish']='';
$langdate['paymethod'][4]['english']='Option 1 Pay with your Credit/Debit Card';
$langdate['paymethod'][4]['french']='';
$langdate['paymethod'][4]['dutch']='';
$langdate['paymethod'][4]['spanish']='';
$langdate['paymethod'][5]['english']='Option 2 Pay with PayPal';
$langdate['paymethod'][5]['french']='';
$langdate['paymethod'][5]['dutch']='';
$langdate['paymethod'][5]['spanish']='';
$langdate['paymethod'][6]['english']='Option 3 Pay by BACS / Instant Bank Transfer';
$langdate['paymethod'][6]['french']='';
$langdate['paymethod'][6]['dutch']='';
$langdate['paymethod'][6]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Manufacturer of single sided, plated-through and multilayer PCB boards,offering prototypes to volume production PCBs at low price." />
<meta name="keywords" content="Manufacturer of single sided, plated-through and multilayer PCB boards,offering prototypes to volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>Low Cost PCB Manufacturer,UK PCB Manufacturer,Online quote,PCB board manufacturer</title>
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['paymethod'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['paymethod'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_box_t"></div>
			<div class="left_box_c">
				<div class="mt10">
					<a href="/PayMethod.php" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" /></a>
					<a href="/OrderFromEurope.php" title=""><img src="/rescources/images/opb.jpg" width="233" height="75" alt="" class="ml10 mt10" /></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
					<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
					&nbsp;&nbsp;&nbsp;
					<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['paymethod'][1]);?></h3>
					<div class="main_box mt10 lh2em fs14">
						<p>
						<?php Lang::EchoString2($langdate['paymethod'][2]);?>. </p>
						<p><?php Lang::EchoString2($langdate['paymethod'][3]);?>. </p>
						<div class="text_box2 mt10">
							<p class="fl ml10 mt15"><?php Lang::EchoString2($langdate['paymethod'][4]);?></p>
							<p class="fr img_zu mt10">
								<a href="#" title=""><img src="/rescources/images/img_001.png" width="60" height="40" alt="" /></a><a href="#" title=""><img src="/rescources/images/img_002.png" width="64" height="40" alt="" /></a><a href="#" title=""><img src="/rescources/images/img_003.png" width="60" height="40" alt="" /></a><a href="#" title=""><img src="/rescources/images/img_004.png" width="60" height="40" alt="" /></a><a href="#" title=""><img src="/rescources/images/img_005.png" width="60" height="40" alt="" /></a>
							</p>
						</div>
						<div class="text_box2 mt10">
							<p class="fl ml10 mt15"><?php Lang::EchoString2($langdate['paymethod'][5]);?></p>
							<p class="fr img_zu mt10">
								<a href="#" title=""><img src="/rescources/images/img_pay.png" width="150" height="40" alt="" /></a>
							</p>
						</div>
						<div class="text_box2 mt10">
							<p class="fl ml10 mt15"><?php Lang::EchoString2($langdate['paymethod'][6]);?></p>
						</div>

					</div>
				</div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>