<?php 
session_start();
$langdate['by_paypal_eur'][0]['english']='Home';
$langdate['by_paypal_eur'][0]['french']='Accueil';
$langdate['by_paypal_eur'][0]['dutch']='';
$langdate['by_paypal_eur'][0]['spanish']='';
$langdate['by_paypal_eur'][1]['english']='Payment';
$langdate['by_paypal_eur'][1]['french']='Paiement';
$langdate['by_paypal_eur'][1]['dutch']='';
$langdate['by_paypal_eur'][1]['spanish']='';
$langdate['by_paypal_eur'][2]['english']='Make Payment Through Paypal';
$langdate['by_paypal_eur'][2]['french']='Faire un paiement avec PayPal';
$langdate['by_paypal_eur'][2]['dutch']='';
$langdate['by_paypal_eur'][2]['spanish']='';
$langdate['by_paypal_eur'][3]['english']='We use PayPal as a safe, reliable and free way of online payment. Simply fill the following form and click "Pay now", then you will be able to make your payment.';
$langdate['by_paypal_eur'][3]['french']='Nous utilisons PayPal comme un moyen sûr, fiable et gratuit de régler une commande. Cliquez simplement sur le lien suivant "Pay now",  vous pourrez ensuite effectuer votre paiement.';
$langdate['by_paypal_eur'][3]['dutch']='';
$langdate['by_paypal_eur'][3]['spanish']='';
$langdate['by_paypal_eur'][4]['english']='PayPal accepts the following cards:';
$langdate['by_paypal_eur'][4]['french']='PayPal accept les cartes bancaires suivantes:';
$langdate['by_paypal_eur'][4]['dutch']='';
$langdate['by_paypal_eur'][4]['spanish']='';

$langdate['by_paypal_eur'][7]['english']='3% surcharge will be applied to all transcations above &pound;500. Please note we never see your credit/debit card details.';
$langdate['by_paypal_eur'][7]['french']='3% surcharge will be applied to all transcations above &pound;500. Les détails de votre carte bancaire ou de crédit ne nous seront jamais communiqués';
$langdate['by_paypal_eur'][7]['dutch']='';
$langdate['by_paypal_eur'][7]['spanish']='';
$langdate['by_paypal_eur'][8]['english']='/rescources/images/banner02.jpg';
$langdate['by_paypal_eur'][8]['french']='/rescources/images/banner02_fr.jpg';
$langdate['by_paypal_eur'][8]['dutch']='';
$langdate['by_paypal_eur'][8]['spanish']='';
$langdate['by_paypal_eur'][9]['english']='Amount';
$langdate['by_paypal_eur'][9]['french']='Montant';
$langdate['by_paypal_eur'][9]['dutch']='';
$langdate['by_paypal_eur'][9]['spanish']='';
$langdate['by_paypal_eur'][10]['english']='Order Number';
$langdate['by_paypal_eur'][10]['french']='Numéro de Commande';
$langdate['by_paypal_eur'][10]['dutch']='';
$langdate['by_paypal_eur'][10]['spanish']='';
$langdate['by_paypal_eur'][11]['english']='Please select currency: &nbsp;';
$langdate['by_paypal_eur'][11]['french']='Espèce de monnaie';
$langdate['by_paypal_eur'][11]['dutch']='';
$langdate['by_paypal_eur'][11]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Printed circuit board Manufacturing,UK circuit board manufacture,Online Quote PCB manufacturing,UK PCB Manufacturer, Prototype manufacturer</title>
<meta name="description" content="Printed circuit board Manufacturing,Online Quote PCB manufacturer,pcb manufacturer, UK PCB Prototype Fabrication offering two layers prototype to multi-layer circuit board production." />
<meta name="keywords" content="Low Cost PCB Manufacturer,Online Quote printed circuit board manufacturing,pcb manufacturer,UK PCB Prototype Manufacturer,pcbs,PCB Prototype Fabrication,Fabrication,manufacturing, double layers prototype, multi-layer prototype, circuit board manufacturer,prototype" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
</style>

<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function selectCurrency(obj){
	document.getElementById("currency_code").value = obj.value;
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
function ShowDialog(obj,url)
{
	var oRect=obj.getBoundingClientRect();
	x=oRect.left;
	y=oRect.top;
	x+=20;y+=20+$(document).scrollTop();
	
	$("#dialogWindowBin").css({'left':x,'top':y});
	$("#dialogWindowBin").fadeIn(500,function()
	{
		$("#dialogWindowBin").load(url);
	}
	);
}

function checkRegularExpressions() {
    var val = document.getElementById("amount").value;
    var moneryPattern = /^[[0-9]+(.[0-9]{1,2})?$/;
    if (val.length > 0 && !moneryPattern.test(val)) {
        alert("Please input proper amount");
        return false;
    }
    return true;
}
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['by_paypal_eur'][8]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['by_paypal_eur'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['by_paypal_eur'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['by_paypal_eur'][1]);?></span> </div>
			<div class="left_box_c">

				<div class="mt10">
<img src="/rescources/images/01.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>				
<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['by_paypal_eur'][2]);?></h3>
					<div class="main_box lh2em mt10">
												<p><?php Lang::EchoString2($langdate['by_paypal_eur'][3]);?>  </p>
												<p class="tc mt10">
<form name="paynow" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
<div class="style11">
<input type="hidden" name="cmd" value="_xclick"/>
<input type="hidden" name="business" value="sales@quick-teck.co.uk"/> 
<input type="hidden" name="item_name" value="Quick-teck,Low cost PCB prototype manufacturer"/>
<input type="hidden" name="no_shipping" value="2"/> 
<input type="hidden" name="no_note" value="1"/> 
<input type="hidden" id="currency_code" name="currency_code" value="GBP"/> 
<table>
<tr><td><?php Lang::EchoString2($langdate['by_paypal_eur'][10]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/order_number_comment.php');">?</span>]</td><td><input type="text" name="item_number"/></td></tr>
<tr><td><?php Lang::EchoString2($langdate['by_paypal_eur'][9]);?>:</td><td><input id="amount" type="number" name="amount" step="0.01" style="width: 80px"/></td></tr>
<tr><td><?php Lang::EchoString2($langdate['by_paypal_eur'][11]);?></td><td>
<select name="currency" style="width: 67px; height: 22px;" onchange="selectCurrency(this)">
	<option value="GBP" selected="selected">GBP</option>
	<option value="EUR">EUR</option>
</select>
</td></tr>
</table>
<input type="image" src="/rescources/images/pay_now.png" align="middle" name="submit" style="margin-left: 280px;"
alt="Make payments with PayPal - it's fast, free and secure!" onclick="return checkRegularExpressions()"/> 
<br />
</div>
</form>
												</p>
												<p class="tc mt5"><img src="/rescources/images/yl.png" width="160" height="15" alt="" /></p>
												<p class="mt10"><?php Lang::EchoString2($langdate['by_paypal_eur'][4]);?></p>
												<p>
												<span class="c_f30">&#9658;</span>Visa/Delta/Electron<br/>
												<span class="c_f30">&#9658;</span>MasterCard/Eurocard<br/>
												<span class="c_f30">&#9658;</span>PayPal Top Up Card<br/>
												<span class="c_f30">&#9658;</span>Maestro<br/>
												<span class="c_f30">&#9658;</span>Solo<br/>
												<span class="c_f30">&#9658;</span> American Express
												</p>
												<p><?php Lang::EchoString2($langdate['by_paypal_eur'][7]);?></p>
												

					</div>
				</div>


		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>