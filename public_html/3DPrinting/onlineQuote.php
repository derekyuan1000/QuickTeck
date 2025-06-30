<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
$_SESSION['saveForm']=$_POST['formRecord'];
$langdate['onlinequote'][0]['english']='Home';
$langdate['onlinequote'][0]['french']='Accueil';
$langdate['onlinequote'][0]['dutch']='';
$langdate['onlinequote'][0]['spanish']='';
$langdate['onlinequote'][1]['english']='Online Quote';
$langdate['onlinequote'][1]['french']='Online Quote';
$langdate['onlinequote'][1]['dutch']='';
$langdate['onlinequote'][1]['spanish']='';
$langdate['onlinequote'][2]['english']='3D printing quote';
$langdate['onlinequote'][2]['french']='3D printing quote';
$langdate['onlinequote'][2]['dutch']='';
$langdate['onlinequote'][2]['spanish']='';
$langdate['onlinequote'][3]['english']='Quantity';
$langdate['onlinequote'][3]['french']='Quantité';
$langdate['onlinequote'][3]['dutch']='';
$langdate['onlinequote'][3]['spanish']='';
$langdate['onlinequote'][4]['english']='Manufacture quote';
$langdate['onlinequote'][4]['french']='Manufacture quote';
$langdate['onlinequote'][4]['dutch']='';
$langdate['onlinequote'][4]['spanish']='';
$langdate['onlinequote'][5]['english']='Assembly quote';
$langdate['onlinequote'][5]['french']='Assembly quote';
$langdate['onlinequote'][5]['dutch']='';
$langdate['onlinequote'][5]['spanish']='';
$langdate['onlinequote'][6]['english']='Base material';
$langdate['onlinequote'][6]['french']='Support';
$langdate['onlinequote'][6]['dutch']='';
$langdate['onlinequote'][6]['spanish']='';
$langdate['onlinequote'][7]['english']='Thickness';
$langdate['onlinequote'][7]['french']='Épaisseur';
$langdate['onlinequote'][7]['dutch']='';
$langdate['onlinequote'][7]['spanish']='';
$langdate['onlinequote'][8]['english']='Simply upload your 3D *STL file via below online quote form, this will provide you with an instant price. The accepted maximum product size is 200x200x180 (LxWxH mm). The uploaded 3D module will be automatically shrunk within this dimension if it beyond this requirment';
$langdate['onlinequote'][8]['french']='Simply upload your 3D *STL file via below online quote form, this will provide you with an instant price. The accepted maximum product size is 200x200x180 (LxWxH mm). The uploaded 3D module will be automatically shrunk within this dimension if it beyond this requirment';
$langdate['onlinequote'][8]['dutch']='';
$langdate['onlinequote'][8]['spanish']='';
$langdate['onlinequote'][9]['english']='The standard layer resolution(also called accuracy) is 0.2mm';
$langdate['onlinequote'][9]['french']='The standard layer resolution(also called accuracy) is 0.2mm';
$langdate['onlinequote'][9]['dutch']='';
$langdate['onlinequote'][9]['spanish']='';
$langdate['onlinequote'][10]['english']='The standard lead time(print + shipping time) is 7 working days ';
$langdate['onlinequote'][10]['french']='The standard lead time(print + shipping time) is 7 working days';
$langdate['onlinequote'][10]['dutch']='';
$langdate['onlinequote'][10]['spanish']='';
$langdate['onlinequote'][11]['english']='Quick-teck now have a new service to help somebody who don\'t have CAD, we can convert 2D drawings or sketches to printable 3D CAD files. The 3D modeling file will be send to customer for confirmation before printing the 3D model';
$langdate['onlinequote'][11]['french']='Quick-teck now have a new service to help somebody who don\'t have CAD, we can convert 2D drawings or sketches to printable 3D CAD files. The 3D modeling file will be send to customer for confirmation before printing the 3D model';
$langdate['onlinequote'][11]['dutch']='';
$langdate['onlinequote'][11]['spanish']='';
$langdate['onlinequote'][12]['english']='Lead time in working days';
$langdate['onlinequote'][12]['french']='Délai de livraison en jours ouvrables';
$langdate['onlinequote'][12]['dutch']='';
$langdate['onlinequote'][12]['spanish']='';
$langdate['onlinequote'][13]['english']='Repeat order';
$langdate['onlinequote'][13]['french']='Renouvellement de commande';
$langdate['onlinequote'][13]['dutch']='';
$langdate['onlinequote'][13]['spanish']='';
$langdate['onlinequote'][14]['english']='Order Number';
$langdate['onlinequote'][14]['french']='Numéro de Commande';
$langdate['onlinequote'][14]['dutch']='';
$langdate['onlinequote'][14]['spanish']='';
$langdate['onlinequote'][15]['english']='Saving option';
$langdate['onlinequote'][15]['french']='Option économique';
$langdate['onlinequote'][15]['dutch']='';
$langdate['onlinequote'][15]['spanish']='';
$langdate['onlinequote'][16]['english']='Laser stencil';
$langdate['onlinequote'][16]['french']='Pochoir';
$langdate['onlinequote'][16]['dutch']='';
$langdate['onlinequote'][16]['spanish']='';
$langdate['onlinequote'][17]['english']='The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill';
$langdate['onlinequote'][17]['french']='La largeur minimale de la piste ou de l\'entrefer est inférieure à 8 mill ou la taille minimale des trous est inférieure à 18 mill';
$langdate['onlinequote'][17]['dutch']='';
$langdate['onlinequote'][17]['spanish']='';
$langdate['onlinequote'][18]['english']='Do you have EU VAT number? If so please put it here';
$langdate['onlinequote'][18]['french']='Numéro européen de TVA le cas échéant';
$langdate['onlinequote'][18]['dutch']='';
$langdate['onlinequote'][18]['spanish']='';
$langdate['onlinequote'][19]['english']='Input voucher code here if you have';
$langdate['onlinequote'][19]['french']='Code bon d\'achat le cas échéant';
$langdate['onlinequote'][19]['dutch']='';
$langdate['onlinequote'][19]['spanish']='';
$langdate['onlinequote'][20]['english']='Voucher code';
$langdate['onlinequote'][20]['french']='Code bon d\'achat';
$langdate['onlinequote'][20]['dutch']='';
$langdate['onlinequote'][20]['spanish']='';
$langdate['onlinequote'][21]['english']=' No hidden extra costs! The price you get is the total price you pay';
$langdate['onlinequote'][21]['french']='Pas de frais supplémentaires! Le prix communiqué est le prix final';
$langdate['onlinequote'][21]['dutch']='';
$langdate['onlinequote'][21]['spanish']='';
$langdate['onlinequote'][22]['english']='Lead time is considered as  manufacturing time + shipping time';
$langdate['onlinequote'][22]['french']='Les délais de livraisons comprennent la duré de fabrication + la durée d\'expédition';
$langdate['onlinequote'][22]['dutch']='';
$langdate['onlinequote'][22]['spanish']='';
$langdate['onlinequote'][23]['english']='Shipping and E-test costs included';
$langdate['onlinequote'][23]['french']='Les prix des tests électriques sont compris';
$langdate['onlinequote'][23]['dutch']='';
$langdate['onlinequote'][23]['spanish']='';
$langdate['onlinequote'][24]['english']='Your comments';
$langdate['onlinequote'][24]['french']='Commentaires';
$langdate['onlinequote'][24]['dutch']='';
$langdate['onlinequote'][24]['spanish']='';
$langdate['onlinequote'][25]['english']='Tick the box to confirm you have read and accept';
$langdate['onlinequote'][25]['french']='Veuillez cocher la case pour confirmer que vous avez lu et accepté';
$langdate['onlinequote'][25]['dutch']='';
$langdate['onlinequote'][25]['spanish']='';
$langdate['onlinequote'][26]['english']='the Terms and Conditions';
$langdate['onlinequote'][26]['french']='les Conditions Générales de ventes';
$langdate['onlinequote'][26]['dutch']='';
$langdate['onlinequote'][26]['spanish']='';
$langdate['onlinequote'][27]['english']='0.5oz';
$langdate['onlinequote'][27]['french']='18&micro;m';
$langdate['onlinequote'][27]['dutch']='';
$langdate['onlinequote'][27]['spanish']='';
$langdate['onlinequote'][28]['english']='1.0oz';
$langdate['onlinequote'][28]['french']='35&micro;m';
$langdate['onlinequote'][28]['dutch']='';
$langdate['onlinequote'][28]['spanish']='';
$langdate['onlinequote'][29]['english']='2.0oz';
$langdate['onlinequote'][29]['french']='70&micro;m';
$langdate['onlinequote'][29]['dutch']='';
$langdate['onlinequote'][29]['spanish']='';
$langdate['onlinequote'][30]['english']='/rescources/images/banner02.jpg'; 
$langdate['onlinequote'][30]['french']='/rescources/images/banner02_fr.jpg';
$langdate['onlinequote'][30]['dutch']='';
$langdate['onlinequote'][30]['spanish']='';
$langdate['onlinequote'][31]['english']='/rescources/images/pcborderform_2.png'; 
$langdate['onlinequote'][31]['french']='/rescources/images/pcborderform_2_fr.png';
$langdate['onlinequote'][31]['dutch']='';
$langdate['onlinequote'][31]['spanish']='';
$langdate['onlinequote'][32]['english']='Your VAT Number:'; 
$langdate['onlinequote'][32]['french']='Votre numéro européen de TVA:';
$langdate['onlinequote'][32]['dutch']='';
$langdate['onlinequote'][32]['spanish']='';
$langdate['onlinequote'][33]['english']='Back'; 
$langdate['onlinequote'][33]['french']='Précédent';
$langdate['onlinequote'][33]['dutch']='';
$langdate['onlinequote'][33]['spanish']='';
$langdate['onlinequote'][34]['english']='Next'; 
$langdate['onlinequote'][34]['french']='Continuer';
$langdate['onlinequote'][34]['dutch']='';
$langdate['onlinequote'][34]['spanish']='';
$langdate['onlinequote'][35]['english']='HASL (not RoHS)'; 
$langdate['onlinequote'][35]['french']='SnPb HAL(non RoHS)';
$langdate['onlinequote'][35]['dutch']='';
$langdate['onlinequote'][35]['spanish']='';
$langdate['onlinequote'][36]['english']='HASL (lead free)'; 
$langdate['onlinequote'][36]['french']='HAL sans plomb';
$langdate['onlinequote'][36]['dutch']='';
$langdate['onlinequote'][36]['spanish']='';
$langdate['onlinequote'][37]['english']='Electrolytic Gold'; 
$langdate['onlinequote'][37]['french']='Nickel-Or électrolytique';
$langdate['onlinequote'][37]['dutch']='';
$langdate['onlinequote'][37]['spanish']='';
$langdate['onlinequote'][38]['english']='Electroless Nickel/Immersion Gold'; 
$langdate['onlinequote'][38]['french']='Nickel-Or chimique';
$langdate['onlinequote'][38]['dutch']='';
$langdate['onlinequote'][38]['spanish']='';
$langdate['onlinequote'][39]['english']='only top'; 
$langdate['onlinequote'][39]['french']='sur la face avant';
$langdate['onlinequote'][39]['dutch']='';
$langdate['onlinequote'][39]['spanish']='';
$langdate['onlinequote'][40]['english']='only bottom'; 
$langdate['onlinequote'][40]['french']='sur la face arrière';
$langdate['onlinequote'][40]['dutch']='';
$langdate['onlinequote'][40]['spanish']='';
$langdate['onlinequote'][41]['english']='both top & bottom'; 
$langdate['onlinequote'][41]['french']='sur les faces avant et arrière';
$langdate['onlinequote'][41]['dutch']='';
$langdate['onlinequote'][41]['spanish']='';
$langdate['onlinequote'][42]['english']='no'; 
$langdate['onlinequote'][42]['french']='non';
$langdate['onlinequote'][42]['dutch']='';
$langdate['onlinequote'][42]['spanish']='';
$langdate['onlinequote'][43]['english']='yes'; 
$langdate['onlinequote'][43]['french']='oui';
$langdate['onlinequote'][43]['dutch']='';
$langdate['onlinequote'][43]['spanish']='';
$langdate['onlinequote'][44]['english']='Price check'; 
$langdate['onlinequote'][44]['french']='Calculer';
$langdate['onlinequote'][44]['dutch']='';
$langdate['onlinequote'][44]['spanish']='';
$langdate['onlinequote'][45]['english']='You will get the PCBs on or before'; 
$langdate['onlinequote'][45]['french']='Vous obtiendrez les PCB avant le';
$langdate['onlinequote'][45]['dutch']='';
$langdate['onlinequote'][45]['spanish']='';
$langdate['onlinequote'][46]['english']='framed stencil'; 
$langdate['onlinequote'][46]['french']='framed stencil';
$langdate['onlinequote'][46]['dutch']='';
$langdate['onlinequote'][46]['spanish']='';
$langdate['onlinequote'][47]['english']='UL marking'; 
$langdate['onlinequote'][47]['french']='UL marking';
$langdate['onlinequote'][47]['dutch']='';
$langdate['onlinequote'][47]['spanish']='';
$langdate['onlinequote'][48]['english']='to'; 
$langdate['onlinequote'][48]['french']='à';
$langdate['onlinequote'][48]['dutch']='';
$langdate['onlinequote'][48]['spanish']='';
$langdate['onlinequote'][49]['english']='Follow Us On'; 
$langdate['onlinequote'][49]['french']='Suivez-Nous Sur';
$langdate['onlinequote'][49]['dutch']='';
$langdate['onlinequote'][49]['spanish']='';

$langdate['onlinequote'][54]['english']='The standard 7 workding days lead time is considered as printing + shipping time';
$langdate['onlinequote'][54]['french']='The standard 7 workding days lead time is considered as printing + shipping time';
$langdate['onlinequote'][54]['dutch']='';
$langdate['onlinequote'][54]['spanish']='';
$langdate['onlinequote'][55]['english']='Shipping cost included in the price. No hidden extra costs';
$langdate['onlinequote'][55]['french']='Le coût de l\'expédition est inclus dans le prix. Pas de frais ultérieurs';
$langdate['onlinequote'][55]['dutch']='';
$langdate['onlinequote'][55]['spanish']='';
$langdate['onlinequote'][56]['english']='The standard layer resolution(also called accuracy) is 0.2mm';
$langdate['onlinequote'][56]['french']='The standard layer resolution(also called accuracy) is 0.2mm';
$langdate['onlinequote'][56]['dutch']='';
$langdate['onlinequote'][56]['spanish']='';
$langdate['onlinequote'][59]['english']='Prices exclude VAT';
$langdate['onlinequote'][59]['french']='Les prix sont exprimés hors TVA';
$langdate['onlinequote'][59]['dutch']='';
$langdate['onlinequote'][59]['spanish']='';
$langdate['onlinequote'][64]['english']='Calculate'; 
$langdate['onlinequote'][64]['french']='Calculer';
$langdate['onlinequote'][64]['dutch']='';
$langdate['onlinequote'][64]['spanish']='';
$langdate['onlinequote'][71]['english']='Order now';
$langdate['onlinequote'][71]['french']='Passer une commande';
$langdate['onlinequote'][71]['dutch']='';
$langdate['onlinequote'][71]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UK low cost PCB manufacturing, PCB online quote,3D printing,online quote,3D printing price,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="UK low cost PCB manufacturing, PCB online quote,3D modeling printing service in the UK, Order PCB from UK printed circuit board manufacturer,PCB UK at low price." />
<meta name="keywords" content="UK low cost PCB manufacturing,3D printing service in UK with low price,3D modeling service,3D printing online quote,Order PCB from UK printed circuit board manufacturer,3D printing UK" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" /> 
<meta http-equiv="Cache-Control" content="no-cache" /> 
<meta http-equiv="Expires" content="0" /> 
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
input[type=radio]{margin:0 3px 0 10px;}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script src="3DPrinting.js?t=<?php echo time(); ?>" type="text/javascript"></script>
<script src="STL/three.js" type="text/javascript"></script>
<script src="STL/STL.js" charset="utf-8" type="text/javascript"></script>
<script type="text/javascript">
function checkForm()
{
	if(document.getElementById('firstName').value=="")
	{
		alert("Please input firstName!");
		return false;
	}
	if(document.getElementById('surname').value=="")
	{
		alert("Please input surname!");
		return false;
	}
	if(!checkEmail(document.getElementById('email').value))
	{
		alert("Please input your proper email address!");
		return false;
	}
	if(document.getElementById('phone').value=="")
	{
		alert("Please input phone number!");
		return false;
	}
	if(document.getElementById('deliveryaddress1').value=="")
	{
		alert("Please input address1!");
		return false;
	}
	if(document.getElementById('cityTown').value=="")
	{
		alert("Please input cityTown!");
		return false;
	}
	if(document.getElementById('deliverypostcode').value=="")
	{
		alert("Please input postcode!");
		return false;
	}
	return true;
}
function checkEmail(val) {
    var emailPattern = /^([\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+,)*[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
    if (!emailPattern.test(val)) {
        return false;
    } else {
        return true;
    }
}

$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
	$("#dialogWindowBin").click(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
function CloseDialog()
{
	$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});
}
function closeLeftWin()
{
	$("#dialogWindowBin2").fadeOut(1000);
}
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

function orderNow(){
	location.href='orderNow.php';
}
</script>

</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
   <?php include '../static/carousel.php';?>
	<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['onlinequote'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['onlinequote'][1]);?></a>-<a href="#" title="" class="on"><?php Lang::EchoString2($langdate['onlinequote'][2]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['onlinequote'][1]);?></span></div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/onlinequote/onlinequote.php" title=""><?php Lang::EchoString2($langdate['onlinequote'][4]);?></a></li>
						<li><a href="/onlinequote/assembly_quoteB.php" title="" ><?php Lang::EchoString2($langdate['onlinequote'][5]);?></a></li>
						<li><a href="#" title="" class="on"><?php Lang::EchoString2($langdate['onlinequote'][2]);?></a></li>
						
					</ul>
				</div>
				<div class="mt10">
					<a href="#" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" /></a>
					<a href="#" title=""><img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['onlinequote'][49]);?></span>&nbsp;&nbsp;&nbsp;
					<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
					&nbsp;&nbsp;&nbsp;
					<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>
				
				<div class="w710 fr mt10">
				<h3 class="title_main">3D Prototypes Printing Quote</h3>
				<div class="main_box lh2em mt10">
				<p><?php Lang::EchoString2($langdate['onlinequote'][8]);?>.</p>
                <p><?php Lang::EchoString2($langdate['onlinequote'][11]);?>. Please <a href="/contactus/contactus.php" title="" class="c_f60">contact us</a> for more details.</p>
				
			</div>
				
				<form enctype="multipart/form-data" name="calc" id="calc" action="orderSubmit.php" method="post" style="width: 100%;" class="style1" >
					<div>
						<div id="div_result" style="width:49%;height:200px; float:left" class="online_from mt5">
							<table style="width:100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
					  			 <td style="height:25px" colspan="2">
					  				<div id="upload" style="height:15px">Upload 3D printing model (*.stl)</div>
									<!--<div id="upload2" style="height:15px;display:none">Uploading......</div>-->
									<div id="upload3" style="height:15px;display:none">
										<span id="progressBg"><span id="progressRun"></span></span>
									</div>
								</td>
						      </tr>
								
							   <tr>
					  			 <td style="width:110px;height:25px">File name:</td>
								 <td><span id="spanFileName"></span></td>
							   </tr>
							   <tr>
					  			 <td style="width:110px;height:25px">Dimension(mm):</td>
								 <td><span id="spanSize"></span><input id="size" name="size" type="hidden"></td>
							   </tr>
							   <tr>
					  			 <td style="height:25px">Volume(mm&sup3;):</td>
								 <td><span id="spanVolume"></span><input id="volume" name="volume" type="hidden"></td>
							   </tr>
							   <tr>
					  			 <td style="height:25px">Surface area(mm&sup2;):</td>
								 <td><span id="spanArea"></span><input id="area" name="area" type="hidden"></td>
							   </tr>
						  </table>
							<div align="center">Upload process：<span id="progressNumber"> - </span></div>
						</div>
						<div id="con" style="width:50%;height:200px; float:right; margin-top:5px; margin-bottom:10px"></div>
						<div style="float:clear"></div>
					</div>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                       <tr>
					  	 <td>Material:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/3d_material_comment.php');">?</span>]</td>
						 <td colspan="3">
							<select name="material" id="material" onchange="changeMaterial();" style="width:100px">
								<option value="1">ABS</option>
								<option value="2">PLA</option>
								<option value="3">Nelon</option>
							</select>
						</td>
					   </tr>
                       <tr>
					  	 <td>Color:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/3d_color_comment.php');">?</span>]</td>
						 <td colspan="3">
							<select name="color" id="color" style="width:100px">
								<option value="1">White</option>
								<option value="2">Black</option>
								<option value="3">Red</option>
							</select>
							<input id="fileName" name="fileName" type="hidden">
							<input id="clientFileName" name="clientFileName" type="hidden">
						</td>
					   </tr>
                       <tr>
					  	 <td>Quantity:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/3d_quantity_comment.php');">?</span>]</td>
						 <td colspan="3"><input id="quantity" name="quantity" type="text" style="width:100px"> (1 to 100)</td>
					   </tr>
                      <tr>
						<td class="w_168">Country:</td>
						<td>
							<select name="country" id="country" style="width: 250px">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									echo '<option value="'.$allCountries[$i]->Id.'">'.$allCountries[$i]->ENShortName.'</option>';
								}
								?>
								<option value="999">Other countries</option>
							</select>
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
							<input name="currencyType" id="currencyType" type="hidden">
						</td>
					  </tr>
					</table>
					<p class="mt10 tc">
						<input type="button" value="<?php Lang::EchoString2($langdate['onlinequote'][64]);?>" class="submit_bn" name="Button1" onclick="calculate_total('onlineQuote');"/>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="<?php Lang::EchoString2($langdate['onlinequote'][71]);?>" class="submit_bn" name="Button2"  <?php $language = Common::GetLanguage(); if($language != "english"){echo 'style="width:200px;background: url(/rescources/images/submit_bn180.png) no-repeat;"';} ?>  onclick="calculate_total('onlineQuote');orderNow();"/>
					</p>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10 tab1"  >
						<tr>
							<td style="height:30px; text-align:center">
								<span id="spanCurrencyType" class="c_f30" style="line-height:15px;font-size:20px;"></span>
								<span id="spanTotal" class="c_f30" style="line-height:15px;font-size:20px;"></span>
							</td>
						</tr>
					</table>

					<div class="main_box clearbox mt10">
						<img src="/rescources/images/stencil.png" width="42" height="57" alt="" class="nr_m10 fl" />
						<div class="right_box1 fr lh2em">
							<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][54]);?>. <br/>
							<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][56]);?>.  <br/>
							<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][55]);?>.  <br/>
							<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][59]);?>.
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php'?>
</body>
</html>

<script type="text/javascript">
$("#upload").click(function(){
	var fileDOM=$('<input type="file" name="file" id="file" style="display:none"/>').appendTo($("body"));//插入一个隐藏的file dom。
	$("#file").change(function(){
		if(this.files.length!=0){
			//本示例仅供参考演示接口。
			var fd = new FormData();
			var ajax = new XMLHttpRequest();
			fd.append("file", document.getElementById('file').files[0]);//获取上传的文件
			ajax.open("post", "upload.php", true);
			ajax.upload.addEventListener("progress", function(evt){
				if (evt.lengthComputable) {
					var percentComplete = Math.round(evt.loaded * 100 / evt.total);
					document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
					
					$('#progressRun').css('width',percentComplete.toString()+'%');
					
					if(percentComplete.toString()=="100"){
						document.getElementById('progressNumber').innerHTML = "rending...";
						$("#upload").show();
						//$("#upload2").hide();
						$("#upload3").hide();
					}else{
						$("#upload").hide();
						//$("#upload2").show();
						$("#upload3").show();
					}
				  }
				  else {
					document.getElementById('progressNumber').innerHTML = 'unable to compute';
				  }
			}, false);
			

			ajax.onload = function () {
				console.log(ajax.responseText);
				var e=ajax.responseText;
				var result=eval('('+e+')');//返回json结果，并把它变为js对象。
				if(result.message=="error"){
					alert("错误,error。");
					return;
				}
				
				//在页面上显示相关数值
				$("#size").val(result.width.toFixed(2)+" * "+result.height.toFixed(2)+" * "+result.depth.toFixed(2));
				$("#volume").val(result.volume.toFixed(2));
				$("#area").val(result.area.toFixed(2));
				$("#fileName").val(result.file);
				$("#clientFileName").val(result.clientFile);
				
				$("#spanSize").html(result.width.toFixed(2)+" * "+result.height.toFixed(2)+" * "+result.depth.toFixed(2));
				$("#spanVolume").html(result.volume.toFixed(2));
				$("#spanArea").html(result.area.toFixed(2));
				$("#spanFileName").html(result.clientFile);
				document.getElementById('progressNumber').innerHTML = "completed";
				
				$("#con").children().remove();
				
				
				//必须设定全局变量thingiurlbase，指向的是/STL文件夹(里面有几个JS脚本，请勿删除、修改任何脚本，否则插件将无法工作)。
				thingiurlbase = "STL";
				//核心函数 displaySTL
				//需要传入一个设置对象，他分别有下面的值：
				//
				//		dom		表明要显示的那个dom元素的ID。
				//		width		表明显示的宽度
				//		height	表明显示的高度
				//		file		表明要显示的STL文件，他应该是服务器上的某个位置，比如"/upload/1.stl"，具体的请看upload.php
				displaySTL({
					dom:"con",
					width:$("#con").width(),
					height:$("#con").height(),
					file:"../"+result.file
				});
				
				fileDOM.remove();
			};

			ajax.send(fd);
			
		}
	}).click();
});

$(document).ready(function(){
	thingiurlbase = "STL";
	displaySTL({
		dom:"con",
		width:$("#con").width(),
		height:$("#con").height(),
		file:"../upload/demo.stl"
	});
});
</script>