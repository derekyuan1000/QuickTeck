<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();

// Configuration
$minimum_value = 0.00;
$maximum_value = 10000.00;
$payment_mode = 'LIVE'; // Change to LIVE when ready
$notify_url = 'https://www.quick-teck.co.uk/order/notify.php';

// Do not touch below here
$error = false;

if (isset($_POST['submit']) && !empty($_POST['payment_value']) && is_numeric($_POST['payment_value'])) {
	$payment_value = number_format($_POST['payment_value'], 2, '.', '');
	if ($payment_value < $minimum_value || $payment_value > $maximum_value) {
		$error = true;
		$errorMessage = "Your payment value is not between the minimum (" . $minimum_value . ") and maximum (" . $maximum_value . ") allowed range.";
	} else {	
		require_once 'sagepayeur.php';
		$sagepay_server = new SagePay_Server('quickteck', $payment_mode);
		$sagepay_server->setOptions($notify_url, 'Quick-Teck - Electronics design and products');
		//$sagepay_server->setEmail($row['ReceiverEmail']);
		// Customise to include delivery if required, uses existing Paypal Price variable
		$sagepay_server->addItem('Manual Payment', 1, $payment_value);
		
		$sagepay_server->setBillingAddress($_POST['firstname'], $_POST['surname'], $_POST['billing_line1'], $_POST['billing_line2'], $_POST['billing_city'], $_POST['billing_postcode'], 'GB', '', '');
		$sagepay_server->setReference($_POST['ordernumber']."EUR-".$payment_value*100);
		
		$url = $sagepay_server->getSagePayUrl();
		
		if (is_array($url)) {
			die($url['error']);
		}
		
		header('Location: ' . $url);
		die();
	}
} else {
	$payment_value = number_format($minimum_value, 2);
}
$langdate['manualpayment'][0]['english']='Home';
$langdate['manualpayment'][0]['french']='Accueil';
$langdate['manualpayment'][0]['dutch']='';
$langdate['manualpayment'][0]['spanish']='';
$langdate['manualpayment'][1]['english']='Payment';
$langdate['manualpayment'][1]['french']='Paiement';
$langdate['manualpayment'][1]['dutch']='';
$langdate['manualpayment'][1]['spanish']='';
$langdate['manualpayment'][2]['english']='First Name';
$langdate['manualpayment'][2]['french']='Prénom';
$langdate['manualpayment'][2]['dutch']='';
$langdate['manualpayment'][2]['spanish']='';
$langdate['manualpayment'][3]['english']='Surname';
$langdate['manualpayment'][3]['french']='Nom';
$langdate['manualpayment'][3]['dutch']='';
$langdate['manualpayment'][3]['spanish']='';
$langdate['manualpayment'][4]['english']='Amount';
$langdate['manualpayment'][4]['french']='Montant';
$langdate['manualpayment'][4]['dutch']='';
$langdate['manualpayment'][4]['spanish']='';
$langdate['manualpayment'][5]['english']='Order Number';
$langdate['manualpayment'][5]['french']='Numéro de Commande';
$langdate['manualpayment'][5]['dutch']='';
$langdate['manualpayment'][5]['spanish']='';
$langdate['manualpayment'][6]['english']='Billing Address Line 1';
$langdate['manualpayment'][6]['french']='Adresse de facturation 1';
$langdate['manualpayment'][6]['dutch']='';
$langdate['manualpayment'][6]['spanish']='';
$langdate['manualpayment'][7]['english']='Billing Address Line 2';
$langdate['manualpayment'][7]['french']='Adresse de facturation 2';
$langdate['manualpayment'][7]['dutch']='';
$langdate['manualpayment'][7]['spanish']='';
$langdate['manualpayment'][8]['english']='Billing City';
$langdate['manualpayment'][8]['french']='Ville de facturation';
$langdate['manualpayment'][8]['dutch']='';
$langdate['manualpayment'][8]['spanish']='';
$langdate['manualpayment'][9]['english']='Billing Post Code';
$langdate['manualpayment'][9]['french']='facturation code postal';
$langdate['manualpayment'][9]['dutch']='';
$langdate['manualpayment'][9]['spanish']='';
$langdate['manualpayment'][10]['english']='Billing Country';
$langdate['manualpayment'][10]['french']='Pays de facturation';
$langdate['manualpayment'][10]['dutch']='';
$langdate['manualpayment'][10]['spanish']='';
$langdate['manualpayment'][11]['english']='Make Payment';
$langdate['manualpayment'][11]['french']='Effectuer le paiement';
$langdate['manualpayment'][11]['dutch']='';
$langdate['manualpayment'][11]['spanish']='';
$langdate['manualpayment'][12]['english']='/rescources/images/banner02.jpg';
$langdate['manualpayment'][12]['french']='/rescources/images/banner02_fr.jpg';
$langdate['manualpayment'][12]['dutch']='';
$langdate['manualpayment'][12]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UK Printed circuit board manufacturer low cost,UK PCB circuit board manufacturer,PCB prototype manufacturing,PCB board manufacturer,make PCB</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB circuit board to multilayer volume production PCBs at low price,online quote for making circuit board." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,prototype PCB circuit board to multilayer volume production circuit board at low price,online quote for making circuit board." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.style13{color:red;margin:0 2px;}
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function checkEmail(val) {
    var emailPattern = /^([\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+,)*[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
    if (!emailPattern.test(val)) {
        return false;
    } else {
        return true;
    }
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
</script>
<script type="text/javascript">
var fields="<?php echo $_SESSION['saveForm'];$_SESSION['saveForm']="";unset($_SESSION['saveForm']);?>";
function getValues() {
      fields = $(":input").serialize();
      document.getElementsByName("formRecord").item(0).value=fields;
}
function setValues()
{
	var filed=new Array();
	field=fields.split('\&');
	for(var i=0;i<field.length;i++)
	{
		var o=new Array();
		var type;
		o=field[i].split('=');
		if(o.length!=2) continue;
		if(o[0]=="formRecord") continue;
		o[1]=o[1].replace("%40","@");
		if(document.getElementsByName(o[0]).length==1)
		{
			document.getElementsByName(o[0]).item(0).value=o[1];
		}
		else
		{
			type=document.getElementsByName(o[0]).item(0).type;
			if(type=="radio")
			{
				var length=document.getElementsByName(o[0]).length;
				for(var j=0;j<length;j++)
				{
					if(document.getElementsByName(o[0]).item(j).value==o[1])
					{
						document.getElementsByName(o[0]).item(j).checked=true;
					}
				}
			}
		}
	}
	
}
$(document).ready(function(){
	if(fields!="")
	{
		setValues();
	}
});
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php'?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['manualpayment'][12]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['manualpayment'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['manualpayment'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['manualpayment'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="mt10">
<img src="/rescources/images/01.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="https://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="https://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form  action="manualpaymentEUR.php" method="post">
					
					<div class="online_from mt10">
					<table style="width: 100%">
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][2]);?>:</td><td class="style3"><input type="text" name="firstname" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][3]);?>:</td><td class="style3"><input type="text" name="surname" style="width: 100px" /></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][4]);?>(&euro;):</td><td class="style3"><input type="number" name="payment_value" step="0.01" value="<?php echo $payment_value ?>" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][5]);?>:
					[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/order_number_comment.php');">?</span>]
					</td><td class="style3"><input type="text" name="ordernumber" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][6]);?>:</td>
					<td class="style3"><input type="text" name="billing_line1" style="width: 288px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><?php Lang::EchoString2($langdate['manualpayment'][7]);?>:</td><td class="style3"><input type="text" name="billing_line2" style="width: 288px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][8]);?>:</td>
					<td class="style3"><input type="text" name="billing_city" /></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span><?php Lang::EchoString2($langdate['manualpayment'][9]);?>:</td>
					<td class="style3"><input type="text" name="billing_postcode" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><?php Lang::EchoString2($langdate['manualpayment'][10]);?>:</td>
					<td class="style3">
					<!--<select name="country" id="country" >
						<option value="1" selected="selected">UK</option>
						<option value="2">France</option>
						<option value="3">Ireland</option>
						<option value="4">Germany</option>
						<option value="5">Belgium</option>
						<option value="6">Denmark</option>
						<option value="7">Netherlands</option>
						<option value="8">Spain</option>
						<option value="9">Italy</option>
						<option value="11">Other countries</option>
					</select>-->
					<select id="country" name="country" style="width: 250px">
						<?php 
						for($i=0; $i < count($allCountries); $i++)
						{
							echo '<option value="'.$allCountries[$i]->Id.'">'.$allCountries[$i]->ENShortName.'</option>';
						}
						?>
						<option value="999">Other countries</option>
					</select>
					</td>
				</tr>
				<tr>
					<td class="style3" colspan="2"><input type="submit" name="submit" value="<?php Lang::EchoString2($langdate['manualpayment'][11]);?>" style="width: 135px;margin-left:230px; height: 35px;" class="style17"/></td>
				</tr>
				</table>
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php'?>
</body>
</html>