<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ThreeDPrintingOrderService_Class.php");
$countryService = new CountryService();
$clientService = new ClientService();
$receiverService = new ReceiverService();

if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "../3DPrinting/orderNow.php";
	echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
	return;
}else{
	$_SESSION[returnPage] = "";
}

$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
if($client)
{
	$receivers = $receiverService->GetReceiverByClientId($client->Id);
	if(count($receivers) > 0){
		$receiver = $receivers[0];
	}
}
$allCountries = $countryService->GetAllCountries();
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
$langdate['takeorder2'][22]['english']='The standard 7 workding days lead time is considered as printing + shipping time';
$langdate['takeorder2'][22]['french']='The standard 7 workding days lead time is considered as printing + shipping time';
$langdate['takeorder2'][22]['dutch']='';
$langdate['takeorder2'][22]['spanish']='';
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
$langdate['takeorder2'][44]['english']='Price check'; 
$langdate['takeorder2'][44]['french']='Calculer';
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

$langdate['takeorder2'][63]['english']='Firstname';
$langdate['takeorder2'][63]['french']='Prénom';
$langdate['takeorder2'][63]['dutch']='';
$langdate['takeorder2'][63]['spanish']='';
$langdate['takeorder2'][64]['english']='Surname';
$langdate['takeorder2'][64]['french']='Nom';
$langdate['takeorder2'][64]['dutch']='';
$langdate['takeorder2'][64]['spanish']='';
$langdate['takeorder2'][65]['english']='Organization/Company';
$langdate['takeorder2'][65]['french']='Organisation/Entreprise';
$langdate['takeorder2'][65]['dutch']='';
$langdate['takeorder2'][65]['spanish']='';
$langdate['takeorder2'][66]['english']='Email';
$langdate['takeorder2'][66]['french']='Courriel';
$langdate['takeorder2'][66]['dutch']='';
$langdate['takeorder2'][66]['spanish']='';
$langdate['takeorder2'][67]['english']='Phone number';
$langdate['takeorder2'][67]['french']='Téléphone';
$langdate['takeorder2'][67]['dutch']='';
$langdate['takeorder2'][67]['spanish']='';
$langdate['takeorder2'][68]['english']='Shipping address line1';
$langdate['takeorder2'][68]['french']='Adresse de livraison 1';
$langdate['takeorder2'][68]['dutch']='';
$langdate['takeorder2'][68]['spanish']='';
$langdate['takeorder2'][69]['english']='Shipping address line2';
$langdate['takeorder2'][69]['french']='Adresse de livraison 2';
$langdate['takeorder2'][69]['dutch']='';
$langdate['takeorder2'][69]['spanish']='';
$langdate['takeorder2'][70]['english']='Town/City';
$langdate['takeorder2'][70]['french']='Ville';
$langdate['takeorder2'][70]['dutch']='';
$langdate['takeorder2'][70]['spanish']='';
$langdate['takeorder2'][71]['english']='Postcode';
$langdate['takeorder2'][71]['french']='Code Postal';
$langdate['takeorder2'][71]['dutch']='';
$langdate['takeorder2'][71]['spanish']='';
$langdate['takeorder2'][72]['english']='Country';
$langdate['takeorder2'][72]['french']='Pays';
$langdate['takeorder2'][72]['dutch']='';
$langdate['takeorder2'][72]['spanish']='';
$langdate['takeorder2'][73]['english']='Shipping Information';
$langdate['takeorder2'][73]['french']='Informations de livraison';
$langdate['takeorder2'][73]['dutch']='';
$langdate['takeorder2'][73]['spanish']='';


if(!empty($_SESSION[threeDPrintingOnlineCuoteData])){
	$threeDPrintingOnlineCuoteData = unserialize($_SESSION[threeDPrintingOnlineCuoteData]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
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
	if(document.getElementById("total").value=="")
	{
		alert("Please upload SLT file and check the price");
		return false;
	}
	if(document.getElementById("terms").checked==false)
	{
		alert("You need read and accept the Terms and Conditions");
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
				<h3 class="title_main">3D Prototypes Printing Order</h3>
				<form enctype="multipart/form-data" name="calc" id="calc" action="orderSubmit.php" method="post" style="width: 100%;" class="style1" onsubmit="return checkForm();">
					<div>
						<div id="div_result" style="width:49%;height:200px; float:left" class="online_from mt5">
							<table style="width:100%" border="0" cellspacing="0" cellpadding="0">
							   <tr>
					  			 <td style="width:110px;height:25px">File name:</td>
								 <td><span id="spanFileName"><?php echo $threeDPrintingOnlineCuoteData->ClientFileName; ?></span></td>
							   </tr>
							   <tr>
					  			 <td style="width:110px;height:25px">Dimension(mm):</td>
								 <td><span id="spanSize"><?php echo $threeDPrintingOnlineCuoteData->Dimension; ?></span><input id="size" name="size" type="hidden" value="<?php echo $threeDPrintingOnlineCuoteData->Dimension; ?>"></td>
							   </tr>
							   <tr>
					  			 <td style="height:25px">Volume(mm&sup3;):</td>
								 <td><span id="spanVolume"><?php echo $threeDPrintingOnlineCuoteData->Volume; ?></span><input id="volume" name="volume" type="hidden" value="<?php echo $threeDPrintingOnlineCuoteData->Volume; ?>"></td>
							   </tr>
							   <tr>
					  			 <td style="height:25px">Surface area(mm&sup2;):</td>
								 <td><span id="spanArea"><?php echo $threeDPrintingOnlineCuoteData->SurfaceArea; ?></span><input id="area" name="area" type="hidden" value="<?php echo $threeDPrintingOnlineCuoteData->SurfaceArea; ?>"></td>
							   </tr>
							   <tr>
					  			 <td style="height:25px" colspan="2">
					  				<div id="upload" style="height:15px">Upload 3d printer model (*.STL)</div>
									<div id="upload2" style="height:15px;display:none">Uploading......</div>
								</td>
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
								<option value="1" <?php if($threeDPrintingOnlineCuoteData->Material == 1){echo 'selected="selected"';} ?>>ABS</option>
								<option value="2" <?php if($threeDPrintingOnlineCuoteData->Material == 2){echo 'selected="selected"';} ?>>PLA</option>
								<option value="3" <?php if($threeDPrintingOnlineCuoteData->Material == 3){echo 'selected="selected"';} ?>>Nelon</option>
							</select>
						</td>
					   </tr>
                       <tr>
					  	 <td>Color:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/3d_color__comment.php');">?</span>]</td>
						 <td colspan="3">
							<select name="color" id="color" style="width:100px">
								<option value="1" <?php if($threeDPrintingOnlineCuoteData->Color == 1){echo 'selected="selected"';} ?>>White</option>
								<option value="2" <?php if($threeDPrintingOnlineCuoteData->Color == 2){echo 'selected="selected"';} ?>>Black</option>
								<option value="3" <?php if($threeDPrintingOnlineCuoteData->Color == 3){echo 'selected="selected"';} ?>>Red</option>
							</select>
							<input id="fileName" name="fileName" type="hidden" value="<?php echo $threeDPrintingOnlineCuoteData->FileName; ?>">
							<input id="clientFileName" name="clientFileName" type="hidden" value="<?php echo $threeDPrintingOnlineCuoteData->ClientFileName; ?>">
						</td>
					   </tr>
                       <tr>
					  	 <td>Quantity:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/3d_quantity__comment.php');">?</span>]</td>
						 <td colspan="3"><input id="quantity" name="quantity" type="text" style="width:100px" value="<?php echo $threeDPrintingOnlineCuoteData->Quantity; ?>"> (1 to 100)</td>
					   </tr>
                      <tr>
						<td class="w_168">Country:</td>
						<td colspan="3">
							<select name="country" id="country" style="width: 250px" onchange="changeCountry()">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									if($threeDPrintingOnlineCuoteData->CountryId1 == $allCountries[$i]->Id){
										echo '<option value="'.$allCountries[$i]->Id.'" selected="selected">'.$allCountries[$i]->ENShortName.'</option>';
									}else{
										echo '<option value="'.$allCountries[$i]->Id.'">'.$allCountries[$i]->ENShortName.'</option>';
									}
								}
								?>
								<option value="999">Other countries</option>
							</select>
						</td>
					  </tr>
					  <tr id="trHaveVAT" style="display:none;">
					  	 <td><?php Lang::EchoString2($langdate['takeorder2'][18]);?>: 
							[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/vat_number.php');">?</span>]</td>
						<td colspan="3">
							<input name="haveVAT" id="haveVAT" type="radio" value="1" onclick="showVATNumber();">Yes
							<input name="haveVAT" id="haveVAT" type="radio" value="0" checked="checked" onclick="showVATNumber();">No
							&nbsp;&nbsp;<span id="spanVATNumber" style="display:none"><?php Lang::EchoString2($langdate['takeorder2'][32]);?> &nbsp;<input name="VATNumber" id="VATNumber" type="text" onblur="" value="<?php echo $client->VatNumber?>"/></span>
						</td>
					   </tr>
                       <tr>
					  	 <td>
					  		<input name="Button1" onclick="calculate_total('takeOrder')" type="button" value="<?php Lang::EchoString2($langdate['takeorder2'][44]);?>" height="10" style="width:160px;height:40px;margin-left:40px;font-size:16px;color:red;" class="style18" >	
					  	</td>
						 <td colspan="3">
						 Inc VAT:&nbsp;&nbsp;&nbsp;&nbsp;<span id="spanCurrencyType1" class="c_f30" style="line-height:15px;font-size:20px;"></span><span id="spanTotal" class="c_f30" style="line-height:15px;font-size:20px;"></span><br/><br/>
						 Exc VAT:&nbsp;&nbsp;&nbsp;&nbsp;<span id="spanCurrencyType2" class="c_f30" style="line-height:15px;font-size:20px;"></span><span id="spanPriceExcVAT"  class="c_f30" style="line-height:15px;font-size:20px;"></span>
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
                       <tr>
					  	 <td colspan="4">
							<a href="#" title="" class="c_f60">*</a> <?php Lang::EchoString2($langdate['takeorder2'][21]);?>.<br />
					  	    <a href="#" title="" class="c_f60">*</a> <?php Lang::EchoString2($langdate['takeorder2'][22]);?>.<br />
						 </tr>
					   <tr><td colspan="4"><span class="fw c_f30 fs14"><?php Lang::EchoString2($langdate['takeorder2'][73]);?></span></td></tr>
					   <tr>
						<td width="186"><?php Lang::EchoString2($langdate['takeorder2'][63]);?>:</td>
						<td width="206"><input id="firstName" name="firstName" type="text" style="width:80px" value="<?php echo $receiver->FirstName ?>"/><span class="c_f30"> *</span></td>
					    <td width="112"><?php Lang::EchoString2($langdate['takeorder2'][64]);?>:</td>
					    <td width="206"><input id="surname" name="surname" type="text" style="width:80px" value="<?php echo $receiver->SurName ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['takeorder2'][65]);?>:</td>
						<td colspan="3"><input id="company" name="company" type="text" value="<?php echo $receiver->Company ?>"/></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['takeorder2'][66]);?>:</td>
						<td colspan="3"><input id="email" name="email" type="text" value="<?php echo $receiver->Email ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['takeorder2'][67]);?>:</td>
						<td colspan="3"><input id="phone" name="phone" type="text" value="<?php echo $receiver->Telephone ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder2'][68]);?>:</td>
						<td colspan="3"><input id="deliveryaddress1" name="deliveryaddress1" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineOne ?>"><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder2'][69]);?>:</td>
						<td colspan="3"><input id="deliveryaddress2" name="deliveryaddress2" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineTwo ?>"></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder2'][70]);?>:</td>
						<td colspan="3"><input id="cityTown" name="cityTown" type="text" value="<?php echo $receiver->CityTown ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder2'][71]);?>:</td>
						<td colspan="3"><input id="deliverypostcode" name="deliverypostcode" type="text" value="<?php echo $receiver->PostCode ?>"><span class="c_f30"> *</span></td>
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
					<p class="mt10 tc"><input type="submit" value="<?php Lang::EchoString2($langdate['takeorder2'][34]);?>" class="submit_bn" />
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
if(!empty($_SESSION[threeDPrintingOnlineCuoteData])){
	echo "<script>changeMaterial();calculate_total('takeOrder');</script>";
	unset($_SESSION[threeDPrintingOnlineCuoteData]);
}
?>

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
					if(percentComplete.toString()=="100"){
						document.getElementById('progressNumber').innerHTML = "rending...";
						$("#upload").show();
						$("#upload2").hide();
					}else{
						$("#upload").hide();
						$("#upload2").show();
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
		file:"../<?php if($threeDPrintingOnlineCuoteData->FileName){ echo $threeDPrintingOnlineCuoteData->FileName;}else{echo 'upload/demo.stl';} ?>"
	});
});
</script>