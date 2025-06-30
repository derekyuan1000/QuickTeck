<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/OrderDetail_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
$_SESSION['saveForm']=$_POST['formRecord'];
$langdate['takeorder2'][0]['english']='Home';
$langdate['takeorder2'][0]['french']='Accueil';
$langdate['takeorder2'][0]['dutch']='';
$langdate['takeorder2'][0]['spanish']='';
$langdate['takeorder2'][1]['english']='Order now';
$langdate['takeorder2'][1]['french']='Passer une commande';
$langdate['takeorder2'][1]['dutch']='';
$langdate['takeorder2'][1]['spanish']='';
$langdate['takeorder2'][2]['english']='Board layer';
$langdate['takeorder2'][2]['french']='Nombre de couches';
$langdate['takeorder2'][2]['dutch']='';
$langdate['takeorder2'][2]['spanish']='';
$langdate['takeorder2'][3]['english']='Quantity';
$langdate['takeorder2'][3]['french']='Quantité';
$langdate['takeorder2'][3]['dutch']='';
$langdate['takeorder2'][3]['spanish']='';
$langdate['takeorder2'][4]['english']='Length in mm';
$langdate['takeorder2'][4]['french']='Longueur en mm';
$langdate['takeorder2'][4]['dutch']='';
$langdate['takeorder2'][4]['spanish']='';
$langdate['takeorder2'][5]['english']='Width in mm';
$langdate['takeorder2'][5]['french']='Largeur en mm';
$langdate['takeorder2'][5]['dutch']='';
$langdate['takeorder2'][5]['spanish']='';
$langdate['takeorder2'][6]['english']='Base material';
$langdate['takeorder2'][6]['french']='Support';
$langdate['takeorder2'][6]['dutch']='';
$langdate['takeorder2'][6]['spanish']='';
$langdate['takeorder2'][7]['english']='Thickness';
$langdate['takeorder2'][7]['french']='Épaisseur';
$langdate['takeorder2'][7]['dutch']='';
$langdate['takeorder2'][7]['spanish']='';
$langdate['takeorder2'][8]['english']='Copper weight';
$langdate['takeorder2'][8]['french']='Poids du cuivre';
$langdate['takeorder2'][8]['dutch']='';
$langdate['takeorder2'][8]['spanish']='';
$langdate['takeorder2'][9]['english']='Solder mask';
$langdate['takeorder2'][9]['french']='Vernis épargne';
$langdate['takeorder2'][9]['dutch']='';
$langdate['takeorder2'][9]['spanish']='';
$langdate['takeorder2'][10]['english']='Silk screen';
$langdate['takeorder2'][10]['french']='Sérigraphie';
$langdate['takeorder2'][10]['dutch']='';
$langdate['takeorder2'][10]['spanish']='';
$langdate['takeorder2'][11]['english']='Surface';
$langdate['takeorder2'][11]['french']='Finition';
$langdate['takeorder2'][11]['dutch']='';
$langdate['takeorder2'][11]['spanish']='';
$langdate['takeorder2'][12]['english']='Lead time in working days';
$langdate['takeorder2'][12]['french']='Délai de livraison en jours ouvrables';
$langdate['takeorder2'][12]['dutch']='';
$langdate['takeorder2'][12]['spanish']='';
$langdate['takeorder2'][13]['english']='Repeat order';
$langdate['takeorder2'][13]['french']='Renouvellement de commande';
$langdate['takeorder2'][13]['dutch']='';
$langdate['takeorder2'][13]['spanish']='';
$langdate['takeorder2'][14]['english']='Order Number';
$langdate['takeorder2'][14]['french']='Numéro de Commande';
$langdate['takeorder2'][14]['dutch']='';
$langdate['takeorder2'][14]['spanish']='';
$langdate['takeorder2'][15]['english']='Saving option';
$langdate['takeorder2'][15]['french']='Option économique';
$langdate['takeorder2'][15]['dutch']='';
$langdate['takeorder2'][15]['spanish']='';
$langdate['takeorder2'][16]['english']='Laser stencil';
$langdate['takeorder2'][16]['french']='Pochoir';
$langdate['takeorder2'][16]['dutch']='';
$langdate['takeorder2'][16]['spanish']='';
$langdate['takeorder2'][17]['english']='The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill';
$langdate['takeorder2'][17]['french']='La largeur minimale de la piste ou de l\'entrefer est inférieure à 8 mill ou la taille minimale des trous est inférieure à 18 mill';
$langdate['takeorder2'][17]['dutch']='';
$langdate['takeorder2'][17]['spanish']='';
$langdate['takeorder2'][18]['english']='Do you have EU VAT number? If so please put it here';
$langdate['takeorder2'][18]['french']='Numéro européen de TVA le cas échéant';
$langdate['takeorder2'][18]['dutch']='';
$langdate['takeorder2'][18]['spanish']='';
$langdate['takeorder2'][19]['english']='Input voucher code here if you have';
$langdate['takeorder2'][19]['french']='Code bon d\'achat le cas échéant';
$langdate['takeorder2'][19]['dutch']='';
$langdate['takeorder2'][19]['spanish']='';
$langdate['takeorder2'][20]['english']='Voucher code';
$langdate['takeorder2'][20]['french']='Code bon d\'achat';
$langdate['takeorder2'][20]['dutch']='';
$langdate['takeorder2'][20]['spanish']='';
$langdate['takeorder2'][21]['english']=' No hidden extra costs! The price you get is the total price you pay';
$langdate['takeorder2'][21]['french']='Pas de frais supplémentaires! Le prix communiqué est le prix final';
$langdate['takeorder2'][21]['dutch']='';
$langdate['takeorder2'][21]['spanish']='';
$langdate['takeorder2'][22]['english']='Lead time is considered as   manufacturing time + shipping time';
$langdate['takeorder2'][22]['french']='Les délais de livraisons comprennent la duré de fabrication + la durée d\'expédition';
$langdate['takeorder2'][22]['dutch']='';
$langdate['takeorder2'][22]['spanish']='';
$langdate['takeorder2'][23]['english']='Shipping and E-test costs included';
$langdate['takeorder2'][23]['french']='Les prix des tests électriques sont compris';
$langdate['takeorder2'][23]['dutch']='';
$langdate['takeorder2'][23]['spanish']='';
$langdate['takeorder2'][24]['english']='Your comments';
$langdate['takeorder2'][24]['french']='Commentaires';
$langdate['takeorder2'][24]['dutch']='';
$langdate['takeorder2'][24]['spanish']='';
$langdate['takeorder2'][25]['english']='Tick the box to confirm you have read and accept';
$langdate['takeorder2'][25]['french']='Veuillez cocher la case pour confirmer que vous avez lu et accepté';
$langdate['takeorder2'][25]['dutch']='';
$langdate['takeorder2'][25]['spanish']='';
$langdate['takeorder2'][26]['english']='the Terms and Conditions';
$langdate['takeorder2'][26]['french']='les Conditions Générales de ventes';
$langdate['takeorder2'][26]['dutch']='';
$langdate['takeorder2'][26]['spanish']='';
$langdate['takeorder2'][27]['english']='0.5oz';
$langdate['takeorder2'][27]['french']='18&micro;m';
$langdate['takeorder2'][27]['dutch']='';
$langdate['takeorder2'][27]['spanish']='';
$langdate['takeorder2'][28]['english']='1.0oz';
$langdate['takeorder2'][28]['french']='35&micro;m';
$langdate['takeorder2'][28]['dutch']='';
$langdate['takeorder2'][28]['spanish']='';
$langdate['takeorder2'][29]['english']='2.0oz';
$langdate['takeorder2'][29]['french']='70&micro;m';
$langdate['takeorder2'][29]['dutch']='';
$langdate['takeorder2'][29]['spanish']='';
$langdate['takeorder2'][30]['english']='/rescources/images/banner02.jpg'; 
$langdate['takeorder2'][30]['french']='/rescources/images/banner02_fr.jpg';
$langdate['takeorder2'][30]['dutch']='';
$langdate['takeorder2'][30]['spanish']='';
$langdate['takeorder2'][31]['english']='/rescources/images/pcborderform_2.png'; 
$langdate['takeorder2'][31]['french']='/rescources/images/pcborderform_2_fr.png';
$langdate['takeorder2'][31]['dutch']='';
$langdate['takeorder2'][31]['spanish']='';
$langdate['takeorder2'][32]['english']='Your VAT Number:'; 
$langdate['takeorder2'][32]['french']='Votre numéro européen de TVA:';
$langdate['takeorder2'][32]['dutch']='';
$langdate['takeorder2'][32]['spanish']='';
$langdate['takeorder2'][33]['english']='Back'; 
$langdate['takeorder2'][33]['french']='Précédent';
$langdate['takeorder2'][33]['dutch']='';
$langdate['takeorder2'][33]['spanish']='';
$langdate['takeorder2'][34]['english']='Next'; 
$langdate['takeorder2'][34]['french']='Continuer';
$langdate['takeorder2'][34]['dutch']='';
$langdate['takeorder2'][34]['spanish']='';
$langdate['takeorder2'][35]['english']='HASL (not RoHS)'; 
$langdate['takeorder2'][35]['french']='SnPb HAL(non RoHS)';
$langdate['takeorder2'][35]['dutch']='';
$langdate['takeorder2'][35]['spanish']='';
$langdate['takeorder2'][36]['english']='HASL (lead free)'; 
$langdate['takeorder2'][36]['french']='HAL sans plomb';
$langdate['takeorder2'][36]['dutch']='';
$langdate['takeorder2'][36]['spanish']='';
$langdate['takeorder2'][37]['english']='Electrolytic Gold'; 
$langdate['takeorder2'][37]['french']='Nickel-Or électrolytique';
$langdate['takeorder2'][37]['dutch']='';
$langdate['takeorder2'][37]['spanish']='';
$langdate['takeorder2'][38]['english']='Electroless Nickel/Immersion Gold'; 
$langdate['takeorder2'][38]['french']='Nickel-Or chimique';
$langdate['takeorder2'][38]['dutch']='';
$langdate['takeorder2'][38]['spanish']='';
$langdate['takeorder2'][39]['english']='only top'; 
$langdate['takeorder2'][39]['french']='sur la face avant';
$langdate['takeorder2'][39]['dutch']='';
$langdate['takeorder2'][39]['spanish']='';
$langdate['takeorder2'][40]['english']='only bottom'; 
$langdate['takeorder2'][40]['french']='sur la face arrière';
$langdate['takeorder2'][40]['dutch']='';
$langdate['takeorder2'][40]['spanish']='';
$langdate['takeorder2'][41]['english']='both top & bottom'; 
$langdate['takeorder2'][41]['french']='sur les faces avant et arrière';
$langdate['takeorder2'][41]['dutch']='';
$langdate['takeorder2'][41]['spanish']='';
$langdate['takeorder2'][42]['english']='no'; 
$langdate['takeorder2'][42]['french']='non';
$langdate['takeorder2'][42]['dutch']='';
$langdate['takeorder2'][42]['spanish']='';
$langdate['takeorder2'][43]['english']='yes'; 
$langdate['takeorder2'][43]['french']='oui';
$langdate['takeorder2'][43]['dutch']='';
$langdate['takeorder2'][43]['spanish']='';
$langdate['takeorder2'][44]['english']='Price check (&pound;)'; 
$langdate['takeorder2'][44]['french']='Calculer (&pound;)';
$langdate['takeorder2'][44]['dutch']='';
$langdate['takeorder2'][44]['spanish']='';
$langdate['takeorder2'][45]['english']='You will get the PCBs on or before'; 
$langdate['takeorder2'][45]['french']='Vous obtiendrez les PCB avant le';
$langdate['takeorder2'][45]['dutch']='';
$langdate['takeorder2'][45]['spanish']='';
$langdate['takeorder2'][46]['english']='framed stencil'; 
$langdate['takeorder2'][46]['french']='framed stencil';
$langdate['takeorder2'][46]['dutch']='';
$langdate['takeorder2'][46]['spanish']='';
$langdate['takeorder2'][47]['english']='UL marking'; 
$langdate['takeorder2'][47]['french']='UL marking';
$langdate['takeorder2'][47]['dutch']='';
$langdate['takeorder2'][47]['spanish']='';
$langdate['takeorder2'][48]['english']='to'; 
$langdate['takeorder2'][48]['french']='à';
$langdate['takeorder2'][48]['dutch']='';
$langdate['takeorder2'][48]['spanish']='';
$langdate['takeorder2'][49]['english']='Follow Us On'; 
$langdate['takeorder2'][49]['french']='Suivez-Nous Sur';
$langdate['takeorder2'][49]['dutch']='';
$langdate['takeorder2'][49]['spanish']='';
$langdate['takeorder2'][50]['english']='Green';
$langdate['takeorder2'][50]['french']='Green';
$langdate['takeorder2'][50]['dutch']='';
$langdate['takeorder2'][50]['spanish']='';
$langdate['takeorder2'][51]['english']='Red';
$langdate['takeorder2'][51]['french']='Red';
$langdate['takeorder2'][51]['dutch']='';
$langdate['takeorder2'][51]['spanish']='';
$langdate['takeorder2'][52]['english']='Yellow';
$langdate['takeorder2'][52]['french']='Yellow';
$langdate['takeorder2'][52]['dutch']='';
$langdate['takeorder2'][52]['spanish']='';
$langdate['takeorder2'][53]['english']='Blue';
$langdate['takeorder2'][53]['french']='Blue';
$langdate['takeorder2'][53]['dutch']='';
$langdate['takeorder2'][53]['spanish']='';
$langdate['takeorder2'][54]['english']='White';
$langdate['takeorder2'][54]['french']='White';
$langdate['takeorder2'][54]['dutch']='';
$langdate['takeorder2'][54]['spanish']='';
$langdate['takeorder2'][55]['english']='Black';
$langdate['takeorder2'][55]['french']='Black';
$langdate['takeorder2'][55]['dutch']='';
$langdate['takeorder2'][55]['spanish']='';
$langdate['takeorder2'][56]['english']='None';
$langdate['takeorder2'][56]['french']='None';
$langdate['takeorder2'][56]['dutch']='';
$langdate['takeorder2'][56]['spanish']='';
$langdate['takeorder2'][57]['english']='Solder mask color';
$langdate['takeorder2'][57]['french']='Solder mask color';
$langdate['takeorder2'][57]['dutch']='';
$langdate['takeorder2'][57]['spanish']='';
$langdate['takeorder2'][58]['english']='Matte Green';
$langdate['takeorder2'][58]['french']='Matte Green';
$langdate['takeorder2'][58]['dutch']='';
$langdate['takeorder2'][58]['spanish']='';
$langdate['takeorder2'][59]['english']='Matte Black';
$langdate['takeorder2'][59]['french']='Matte Black';
$langdate['takeorder2'][59]['dutch']='';
$langdate['takeorder2'][59]['spanish']='';

if(!empty($_SESSION[pcbOnlineCuoteData])){
	$orderDetail = unserialize($_SESSION[pcbOnlineCuoteData]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Printed circuit board manufacturer in low cost,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" /> 
<meta http-equiv="Cache-Control" content="no-cache" /> 
<meta http-equiv="Expires" content="0" /> 
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
input[type=radio]{margin:0 3px 0 10px;}
</style>
<script src="../../Management/Scripts/order.js?t=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function myOpen(url,height,width){
	window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
}
function checkFormbin()
{
	var quantity=document.getElementById('quantity').value;
	var length=document.getElementById('length').value;
	var width=document.getElementById('width').value;
	var layer = getCheckedValue(document.calc.layer);
	if(layer==""||isNaN(layer))
	{
		alert("Please select board layer!");
		return false;
	}
	else if(quantity==""||isNaN(quantity))
	{
		alert("Please input connrect quantity!");
		return false;
	}
	else if(quantity<1||quantity>300)
	{
		alert("quantity is 1 to 300");
		return false;
	}
	if(length==""||isNaN(length))
	{
		alert("Please input connrect length!");
		return false;
	}
	else if(length<=1||length>=500)
	{
		alert("length is 10 to 500!");
		return false;
	}
	if(width==""||isNaN(width))
	{
		alert("Please input connrect width!");
		return false;
	}
	else if(width<=1||width>=500)
	{
		alert("width is 10 to 500!");
		return false;
	}
	if($("[name=sameDesign]:checked").val()==1 && $("#historyOrderNumber").val()=="")
	{
		alert("Pleas input your previous order number, otherwise tooling and setup cost cannot be deducted.");
		return false;
	}
	if($("[name=sameDesign]:checked").val()==1 && document.getElementById("checkHistoryOrderNumberResult").value == 1){
		alert("The provided order was not made in the last 18 months by Quick-teck, please input it again.");
		return false;
	}
	if($("[name=haveVAT]:checked").val()==1 && $("#VATNumber").val()=="")
	{
		alert("You need input your EU VAT number otherwise UK VAT will be charged.");
		return false;
	}
	if(document.getElementById("terms").checked==false)
	{
		alert("You need read and accept the Terms and Conditions");
		return false;
	}
	return true;
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
var fields="<?php echo $_SESSION['saveForm2'];$_SESSION['saveForm2']="";unset($_SESSION['saveForm2']);?>";

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
		o[1]=o[1].replace(/%40/g,"@");
		o[1]=o[1].replace(/\+/g," ");
		o[1]=o[1].replace(/%2B/," ");
		o[1]=o[1].replace(/%2F/,"/");
		if(o[0]=="length")
		{
			document.getElementById("length").value=o[1];
			continue;
		}
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
		calculate_total('takeOrder');
	}
});
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['takeorder2'][30]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['takeorder2'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['takeorder2'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['takeorder2'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="#" title="" class="on"><?php Lang::EchoString2($langdate['takeorder2'][1]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
					<a href="#" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" /></a>
					<a href="#" title=""><img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['takeorder2'][49]);?></span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form enctype="multipart/form-data" name="calc" id="calc" action="takeorder3.php" method="post" style="width: 100%;" class="style1" onsubmit="return checkFormbin();">
				<input type="hidden" name="formRecord" value=""/>
				<input type="hidden" name="firstName" value="<?php echo $_POST['firstName']?>"/>
				<input type="hidden" name="surname" value="<?php echo $_POST['surname']?>"/>
				<input type="hidden" name="company" value="<?php echo $_POST['company']?>"/>
				<input type="hidden" name="email" value="<?php echo $_POST['email']?>"/>
				<input type="hidden" name="phone" value="<?php echo $_POST['phone']?>"/>
				<input type="hidden" name="deliveryaddress1" value="<?php echo $_POST['deliveryaddress1']?>"/>
				<input type="hidden" name="deliveryaddress2" value="<?php echo $_POST['deliveryaddress2']?>"/>
				<input type="hidden" name="cityTown" value="<?php echo $_POST['cityTown']?>"/>
				<input type="hidden" name="deliverypostcode" value="<?php echo $_POST['deliverypostcode']?>"/>
				<input type="hidden" name="country" value="<?php echo $_POST['country']?>"/> 
				<input type="hidden" name="firstName_out" value="<?php echo $_POST['firstName_out']?>"/>
				<input type="hidden" name="surname_out" value="<?php echo $_POST['surname_out']?>"/>
				<input type="hidden" name="company_out" value="<?php echo $_POST['company_out']?>"/>
				<input type="hidden" name="email_out" value="<?php echo $_POST['email_out']?>"/>
				<input type="hidden" name="phone_out" value="<?php echo $_POST['phone_out']?>"/>
				<input type="hidden" name="deliveryaddress1_out" value="<?php echo $_POST['deliveryaddress1_out']?>"/>
				<input type="hidden" name="deliveryaddress2_out" value="<?php echo $_POST['deliveryaddress2_out']?>"/>
				<input type="hidden" name="cityTown_out" value="<?php echo $_POST['cityTown_out']?>"/>
				<input type="hidden" name="deliverypostcode_out" value="<?php echo $_POST['deliverypostcode_out']?>"/>
				<input type="hidden" name="country_out" value="<?php echo $_POST['country_out']?>"/> 
					<div class="lc_title"><img src="<?php Lang::EchoString2($langdate['takeorder2'][31]);?>" width="710" height="39" alt="" /></div>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                       <tr>
					  	 <td>1.<?php Lang::EchoString2($langdate['takeorder2'][2]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/layer_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="layer" type="radio" value="1" <?php if($orderDetail->Layer == 1){echo 'checked="checked"';} ?> onclick="changeLayer('takeOrder');calculate_total('takeOrder')"/>1
							<input name="layer" type="radio" value="2" <?php if($orderDetail->Layer == 2){echo 'checked="checked"';} ?> onclick="changeLayer('takeOrder');calculate_total('takeOrder')"/>2
							<input name="layer" type="radio" value="4" <?php if($orderDetail->Layer == 4){echo 'checked="checked"';} ?> onclick="changeLayer('takeOrder');calculate_total('takeOrder')"/>4
							<input name="layer" type="radio" value="6" <?php if($orderDetail->Layer == 6){echo 'checked="checked"';} ?> onclick="changeLayer('takeOrder');calculate_total('takeOrder')"/>6
							<input name="layer" type="radio" value="8" <?php if($orderDetail->Layer == 8){echo 'checked="checked"';} ?> onclick="changeLayer('takeOrder');calculate_total('takeOrder')"/>8
						</td>
					   </tr>
                      
                       <tr>
					  	 <td>2.<?php Lang::EchoString2($langdate['takeorder2'][3]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/quantity_comment.php');">?</span>] </td>
						 <td colspan="3"><input id="quantity" name="quantity" type="text" value="<?php echo $orderDetail->Quantity; ?>" style="width: 74px;behavior:url(#default#savehistory);" onblur="calculate_total('takeOrder')"> (1 <?php Lang::EchoString2($langdate['takeorder2'][48]);?> 300) </td>
					   </tr>
                       <tr>
					  	 <td>3.<?php Lang::EchoString2($langdate['takeorder2'][4]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/dimension_comment.php');">?</span>] </td>
						 <td colspan="3"><input id="length" type="text" name="length" value="<?php echo $orderDetail->Length; ?>" onblur="calculate_total('takeOrder')">(10 <?php Lang::EchoString2($langdate['takeorder2'][48]);?> 500mm)</td>
					   </tr>
                       <tr>
					  	 <td>4.<?php Lang::EchoString2($langdate['takeorder2'][5]);?>:</td>
						 <td colspan="3"><input id="width" type="text" name="width" value="<?php echo $orderDetail->Width; ?>" onblur="calculate_total('takeOrder')"> (10 <?php Lang::EchoString2($langdate['takeorder2'][48]);?> 500mm)</td>
					   </tr>
                       <tr>
					  	 <td>5.<?php Lang::EchoString2($langdate['takeorder2'][6]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/material_comment.php');">?</span>] </td>
						 <td colspan="3"><select name="material" id="material" onchange="calculate_total('takeOrder')">
								<option value="0" <?php if(!$orderDetail->BaseMaterial){echo 'selected="selected"';} if(!$orderDetail){echo 'selected="selected"';}?>>FR4 Tg 130 (standard)</option>
								<option value="1" <?php if($orderDetail->BaseMaterial == 1){echo 'selected="selected"';} ?>>FR4 H Tg 170</option>
							</select></td>
					   </tr>
                       <tr>
					  	 <td>6.<?php Lang::EchoString2($langdate['takeorder2'][7]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/thickness_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="thickness" type="radio" value="0.4" <?php if($orderDetail->Thickness == "0.4"){echo 'checked="checked"';} ?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">0.4mm
							<input name="thickness" type="radio" value="0.6" <?php if($orderDetail->Thickness == "0.6"){echo 'checked="checked"';} ?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">0.6mm
							<input name="thickness" type="radio" value="0.8" <?php if($orderDetail->Thickness == "0.8"){echo 'checked="checked"';} ?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">0.8mm
							<input name="thickness" type="radio" value="1.0" <?php if($orderDetail->Thickness == "1.0"){echo 'checked="checked"';} ?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">1.0mm
							<input name="thickness" type="radio" value="1.6" <?php if($orderDetail->Thickness == "1.6"){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">1.6mm<br>
							<input name="thickness" type="radio" value="2.0" <?php if($orderDetail->Thickness == "2.0"){echo 'checked="checked"';} ?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">2.0mm
							<input name="thickness" type="radio" value="2.4" <?php if($orderDetail->Thickness == "2.4"){echo 'checked="checked"';} ?> onclick="changeThickness('takeOrder');calculate_total('takeOrder')">2.4mm
						</td>
					   </tr>
                       <tr>
					  	 <td>7.<?php Lang::EchoString2($langdate['takeorder2'][8]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/copper_comment.php');">?</span>] </td>
						 <td colspan="3">
					<!--			<input name="weight" type="radio" value="0.5" <?php if($orderDetail->CopperWeight == "0.5"){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][27]);?> -->
							<input name="weight" type="radio" value="1.0" <?php if($orderDetail->CopperWeight == "1.0"){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][28]);?>
							<input name="weight" type="radio" value="2.0" <?php if($orderDetail->CopperWeight == "2.0"){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][29]);?>
						</td>
					   </tr>
                       <tr>
					  	 <td>8.<?php Lang::EchoString2($langdate['takeorder2'][9]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/soldermask_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="soldermask" type="radio" value="only top" <?php if($orderDetail->SolderMask == "only top"){echo 'checked="checked"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][39]);?> 
					        <input name="soldermask" type="radio" value="only bottom" <?php if($orderDetail->SolderMask == "only bottom"){echo 'checked="checked"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][40]);?>
							<input name="soldermask" type="radio" value="both sides" <?php if($orderDetail->SolderMask == "both sides"){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?>><?php Lang::EchoString2($langdate['takeorder2'][41]);?><br>
							<input name="soldermask" type="radio" value="no" <?php if($orderDetail->SolderMask == "no"){echo 'checked="checked"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][42]);?>
						</td>
					   </tr>
					  <tr>
						<td class="w_168">9. <?php Lang::EchoString2($langdate['takeorder2'][57]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/soldermaskcolor_comment.php');">?</span>]</td>
						<td>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "1"){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';} ?> value="1"><span style="font-size:25px;color:green">■</span><?php Lang::EchoString2($langdate['takeorder2'][50]);?>
					        <input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "2"){echo 'checked="checked"';} ?> value="2"><span style="font-size:25px;color:red">■</span><?php Lang::EchoString2($langdate['takeorder2'][51]);?>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "3"){echo 'checked="checked"';} ?> value="3"><span style="font-size:25px;color:yellow">■</span><?php Lang::EchoString2($langdate['takeorder2'][52]);?>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "4"){echo 'checked="checked"';} ?> value="4"><span style="font-size:25px;color:blue">■</span><?php Lang::EchoString2($langdate['takeorder2'][53]);?>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "5"){echo 'checked="checked"';} ?> value="5"><span style="font-size:25px;color:#dddddd">■</span><?php Lang::EchoString2($langdate['takeorder2'][54]);?>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "6"){echo 'checked="checked"';} ?> value="6"><span style="font-size:25px;color:black">■</span><?php Lang::EchoString2($langdate['takeorder2'][55]);?><br/>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "8"){echo 'checked="checked"';} ?> value="8"><span style="font-size:25px;color:green">■</span><?php Lang::EchoString2($langdate['takeorder2'][58]);?>
							<input name="soldermaskcolor" type="radio" <?php if($orderDetail->Int3 == "9"){echo 'checked="checked"';} ?> value="9"><span style="font-size:25px;color:black">■</span><?php Lang::EchoString2($langdate['takeorder2'][59]);?>
						</td>
					  </tr>
                       <tr>
					  	 <td>10.<?php Lang::EchoString2($langdate['takeorder2'][10]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/silkscreen_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="silkscreen" type="radio" value="only top" <?php if($orderDetail->SilkScreen == "only top"){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?>><?php Lang::EchoString2($langdate['takeorder2'][39]);?>
							<input name="silkscreen" type="radio" value="only bottom" <?php if($orderDetail->SilkScreen == "only bottom"){echo 'checked="checked"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][40]);?>
							<input name="silkscreen" type="radio" value="both sides" <?php if($orderDetail->SilkScreen == "both sides"){echo 'checked="checked"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][41]);?><br>
							<input name="silkscreen" type="radio" value="no" <?php if($orderDetail->SilkScreen == "no"){echo 'checked="checked"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][42]);?>
						</td>
					   </tr>
                       <tr>
					  	 <td>11.<?php Lang::EchoString2($langdate['takeorder2'][11]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/surface_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="surface" type="radio" value="2" <?php if($orderDetail->Surface == 2){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][36]);?> 
							<input name="surface" type="radio" value="3" <?php if($orderDetail->Surface == 3){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][37]);?>
							<input name="surface" type="radio" value="4" <?php if($orderDetail->Surface == 4){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')">OSP
							<input name="surface" type="radio" value="5" <?php if($orderDetail->Surface == 5){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][38]);?>
						</td>
					   </tr>
					  <tr>
						<td>12.<?php Lang::EchoString2($langdate['takeorder2'][47]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/ULmarking.php');">?</span>]</td>
						<td>
							<input name="ULmarking" id="ULmarking" type="radio" value="1" <?php if($orderDetail->Bool1){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][43]);?>
							<input name="ULmarking" id="ULmarking" type="radio" value="0" <?php if(!$orderDetail->Bool1){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][42]);?>
						</td>
					  </tr>
                       <tr>
					  	 <td rowspan="2">13.<?php Lang::EchoString2($langdate['takeorder2'][12]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/leadtime_comment.php');">?</span>] </td>
						 <td colspan="3" style="border-bottom-width:0px;padding-bottom:0px">
<!--<span style= "display:none">-->

               <!--         	<input name="days" type="radio" style="width: 20px" value="5" onclick="changeDays('takeOrder');calculate_total('takeOrder')">5  -->
	
							<input name="days" type="radio" style="width: 20px" value="6" onclick="changeDays('takeOrder');calculate_total('takeOrder')">6

							<input name="days" type="radio" style="width: 20px" value="7" onclick="changeDays('takeOrder');calculate_total('takeOrder')">7
							<input name="days" type="radio" style="width: 20px" value="8" onclick="changeDays('takeOrder');calculate_total('takeOrder')" checked="checked">8 

                            <input name="days" type="radio" style="width: 20px" value="9" onclick="changeDays('takeOrder');calculate_total('takeOrder')">9
                      
							<input name="days" type="radio" style="width: 20px" value="16" onclick="changeDays('takeOrder');calculate_total('takeOrder')">Laid-back Price[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/laidback_comment.php');">?</span>] <br /></td>
						</tr>
					   <tr>
						<td style="border-top-width:0px; font-style:italic; padding-top:5px">
							<span id="show_t" name="show_t" style="display:none; ">
							&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" title="" class="c_f60">*</a>&nbsp;<?php Lang::EchoString2($langdate['takeorder2'][45]);?>
							<span id="targetDay" name="targetDay">&nbsp;</span> [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/expected_date_comment.php');">?</span>]
							</span>
						</td>
					   </tr>
                       <tr>
					  	 <td>14.<?php Lang::EchoString2($langdate['takeorder2'][13]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/samedesign_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="sameDesign" id="sameDesign" type="radio" value="1" <?php if($orderDetail->IsRepeatOrder){echo 'checked="checked"';} ?> onclick="changeDays('takeOrder');showHistoryOrderNumber();calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][43]);?>						
							<input name="sameDesign" id="sameDesign" type="radio" value="0" <?php if(!$orderDetail->IsRepeatOrder){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="changeDays('takeOrder');showHistoryOrderNumber();calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][42]);?>	
							&nbsp;&nbsp;<span id="spanHistoryOrderNumber"  <?php if(!$orderDetail->IsRepeatOrder){echo 'style="display:none"';} ?>><?php Lang::EchoString2($langdate['takeorder2'][14]);?>&nbsp;:&nbsp;<input name="historyOrderNumber" id="historyOrderNumber" type="text" onblur="ajaxCheckHistoryOrderNumber()"/></span>
							<input id="checkHistoryOrderNumberResult" type="hidden" value="0"/>
						</td>
					   </tr>
                       <tr>
					  	 <td>15.<?php Lang::EchoString2($langdate['takeorder2'][15]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/prototype_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="prototype" id="prototype" type="radio" value="1" <?php if($orderDetail->IsPrototype){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][43]);?>
							<input name="prototype" id="prototype" type="radio" value="0" <?php if(!$orderDetail->IsPrototype){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][42]);?>
						</td>
					   </tr>
                       <tr>
					  	 <td>16.<?php Lang::EchoString2($langdate['takeorder2'][16]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/stencil_comment.php');">?</span>] </td>
						 <td colspan="3">
							<input name="needStencil" id="needStencil" type="radio" value="1" <?php if($orderDetail->IsLaserStencil == 1){echo 'checked="checked"';} ?> onclick="changeStencil('takeOrder');calculate_total('takeOrder');"><?php Lang::EchoString2($langdate['takeorder2'][43]);?>
							<input name="needStencil" id="needStencil" type="radio" value="0" <?php if($orderDetail->IsLaserStencil == 0){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="changeStencil('takeOrder');calculate_total('takeOrder');"><?php Lang::EchoString2($langdate['takeorder2'][42]);?>
							<input name="needStencil" id="needStencil" type="radio" value="2" <?php if($orderDetail->IsLaserStencil == 2){echo 'checked="checked"';} ?> onclick="changeStencil('takeOrder');calculate_total('takeOrder');"><?php Lang::EchoString2($langdate['takeorder2'][46]);?><br/>
							<span id="spanStencilType" <?php if(!$orderDetail->IsLaserStencil){echo 'style="display:none"';} ?>>
								<input name="stencilType" type="radio" value="1" <?php if($orderDetail->Int1 == 1){echo 'checked="checked"';} if(!$orderDetail){echo 'checked="checked"';}?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][39]);?>
								<input name="stencilType" type="radio" value="2" <?php if($orderDetail->Int1 == 2){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][40]);?>
								<input name="stencilType" type="radio" value="3" <?php if($orderDetail->Int1 == 3){echo 'checked="checked"';} ?> onclick="calculate_total('takeOrder')"><?php Lang::EchoString2($langdate['takeorder2'][41]);?>
							</span>
						 </td>
					   </tr>
					    <tr  style="display:none">
					  	 <td>17.<?php Lang::EchoString2($langdate['takeorder2'][17]);?>: 
								[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/tech_comment.php');">?</span>]</td>
						<td colspan="3">
							<input name="tech" id="tech" type="radio" value="1" onclick="calculate_total('takeOrder')">Yes
							<input name="tech" id="tech" type="radio" value="0" checked="checked" onclick="calculate_total('takeOrder')">No
						</td>
					   </tr>
					   
					    <tr id="trHaveVAT" <?php if($_POST['country']==1) echo 'style="display:none;"'?>>
					  	 <td><span class="spanNo"></span>17.<?php Lang::EchoString2($langdate['takeorder2'][18]);?>: 
							[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/vat_number.php');">?</span>]</td>
						<td colspan="3">
							<input name="haveVAT" id="haveVAT" type="radio" value="1" onclick="showVATNumber();calculate_total('takeOrder')">Yes
							<input name="haveVAT" id="haveVAT" type="radio" value="0" checked="checked" onclick="showVATNumber();calculate_total('takeOrder')">No
							&nbsp;&nbsp;<span id="spanVATNumber" style="display:none"><?php Lang::EchoString2($langdate['takeorder2'][32]);?> &nbsp;<input name="VATNumber" id="VATNumber" type="text" onblur="calculate_total('takeOrder')" value="<?php $client = $clientService->GetClientByLoginId($_SESSION[currentClient]); echo $client->VatNumber?>"/></span>
						</td>
					   </tr>
					   
                       <tr>
					  	 <td><?php echo $_POST['country']!=1?"18":"17";?>.<?php Lang::EchoString2($langdate['takeorder2'][19]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/voucher_comment.php');">?</span>] </td>
						<td colspan="3">
							<?php Lang::EchoString2($langdate['takeorder2'][20]);?>: <input name="voucherNumber" id="voucherNumber" type="text" onblur="calculate_total('takeOrder')" />
							<input name="Apply" onclick="ajaxUseVoucher();" type="button" value="Check Voucher" height="10" style="width: 110px" class="style18" >
							<br/><span id="spanVoucherResult"></span>
							<input name="discount" id="discount" type="hidden">
						</td>
					   </tr>
                       <tr>
					  	 <td><input name="Button1" onclick="calculate_total('takeOrder')" type="button" value="<?php Lang::EchoString2($langdate['takeorder2'][44]);?>" height="10" style="width:160px;height:40px;margin-left:40px;font-size:16px;color:red;" class="style18" ></td>
						 <td colspan="3">
						 Inc VAT:&nbsp;&nbsp;&nbsp;&nbsp;<span id="spanTotal" class="c_f30" style="line-height:15px;font-size:20px;"></span><br/><br/>
						 Exc VAT:&nbsp;&nbsp;&nbsp;&nbsp;<span id="spanPriceExcVAT"  class="c_f30" style="line-height:15px;font-size:20px;"></span>
						<input name="total" id="total" type="hidden">
						<input name="price0" id="price0" type="hidden">
						<input name="price1" id="price1" type="hidden">
						<input name="price2" id="price2" type="hidden">
						<input name="price3" id="price3" type="hidden">
						<input name="price4" id="price4" type="hidden">
						<input name="price5" id="price5" type="hidden">
						<input name="price6" id="price6" type="hidden">
						<input name="price7" id="price7" type="hidden">
						<input name="price8" id="price8" type="hidden">
						<input name="price9" id="price9" type="hidden">
						<input name="price10" id="price10" type="hidden">
						<input name="price11" id="price11" type="hidden">
						<input name="price12" id="price12" type="hidden">
						<input name="price13" id="price13" type="hidden">
						<input name="price14" id="price14" type="hidden">
						<input name="price15" id="price15" type="hidden">
						<input name="price16" id="price16" type="hidden">
						<input name="price17" id="price17" type="hidden">
						<input name="price18" id="price18" type="hidden">
					     </td>
					   </tr>
                       <tr>
					  	 <td colspan="4">
							<a href="#" title="" class="c_f60">*</a> <?php Lang::EchoString2($langdate['takeorder2'][21]);?>.<br />
					  	    <a href="#" title="" class="c_f60">*</a> <?php Lang::EchoString2($langdate['takeorder2'][22]);?>.<br />
							<a href="#" title="" class="c_f60">*</a> <?php Lang::EchoString2($langdate['takeorder2'][23]);?>. </td>
					   </tr>
                       <tr>
					  	 <td><?php Lang::EchoString2($langdate['takeorder2'][24]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/message_comment.php');">?</span>] </td>
						 <td colspan="3">
							<textarea name="message" cols="45" rows="4"></textarea>
						</td>
					   </tr>
                       <tr>
					  	 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="terms" name="terms" type="checkbox" > </td>
						 <td colspan="3"><?php Lang::EchoString2($langdate['takeorder2'][25]);?> <a target="_blank" href="/T_and_C/TandC182.pdf" class="c_f60">the Terms and Conditions</a>. </td>
					   </tr>
					</table>
					<p class="mt10 tc"><input type="button" value="<?php Lang::EchoString2($langdate['takeorder2'][33]);?>" class="submit_bn" onclick="window.location='/order/takeorder.php';"/>&nbsp;&nbsp;<input type="submit" value="<?php Lang::EchoString2($langdate['takeorder2'][34]);?>" class="submit_bn" onclick="getValues();"/>
					</p>
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php'?>
</body>
</html>

<?php
if(!empty($_SESSION[pcbOnlineCuoteData])){
	echo "<script>changeLayer('takeOrder');changeThickness('takeOrder');changeDays('takeOrder');changeStencil('takeOrder');</script>";
	//unset($_SESSION[pcbOnlineCuoteData]);
}
?>