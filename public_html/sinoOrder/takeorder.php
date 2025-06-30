<?php 
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
if($_GET[isLogin] == "yes"){
	$isLogin = true;
}else{
	$isLogin = false;
}
if(!empty($_SESSION[currentClient])){
	$isLogin = true;
}else {
	$isLogin = false;
}
if(!empty($_SESSION[sinoShoppingCartId])){
	$isRepeat = true;
}else{
	$isRepeat = false;
}
if($isLogin && empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "../sinoOrder/takeorder.php?isLogin=yes";
	echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
	return;
}
$clientService = new ClientService();
$receiverService = new ReceiverService();
if($isLogin){
	$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
	if($client)
	{
		$receivers = $receiverService->GetReceiverByClientId($client->Id);
		if(count($receivers) > 0){
			$receiver = $receivers[0];
		}
	}
}else{
	if($isRepeat){
		$client = $clientService->GetClientByLoginId($_SESSION[noLoginClient]);
	}
	if($client)
	{
		$receiver = new Receiver();
		$receiver->FirstName = $client->FirstName;
		$receiver->SurName = $client->SurName;
		
		$receiver->AddressLineOne = $client->AddressLineOne;
		$receiver->AddressLineTwo = $client->AddressLineTwo;
		$receiver->Name = $client->Contact;
		$receiver->Address = $client->Address;
		$receiver->Telephone = $client->Telephone;
		$receiver->Email = $client->Email;
		$receiver->PostCode = $client->PostCode;
		$receiver->CountryId = $client->CountryId;
		$receiver->CityTown = $client->CityTown;
		$receiver->Company = $client->Company;
	}
}
$langdate['takeorder'][0]['english']='Home';
$langdate['takeorder'][0]['french']='Accueil';
$langdate['takeorder'][0]['dutch']='';
$langdate['takeorder'][0]['spanish']='';
$langdate['takeorder'][1]['english']='Order now';
$langdate['takeorder'][1]['french']='Passer une commande';
$langdate['takeorder'][1]['dutch']='';
$langdate['takeorder'][1]['spanish']='';
$langdate['takeorder'][2]['english']='Billing Information';
$langdate['takeorder'][2]['french']='Données de Facturation';
$langdate['takeorder'][2]['dutch']='';
$langdate['takeorder'][2]['spanish']='';
$langdate['takeorder'][3]['english']='Firstname';
$langdate['takeorder'][3]['french']='Prénom';
$langdate['takeorder'][3]['dutch']='';
$langdate['takeorder'][3]['spanish']='';
$langdate['takeorder'][4]['english']='Surname';
$langdate['takeorder'][4]['french']='Nom';
$langdate['takeorder'][4]['dutch']='';
$langdate['takeorder'][4]['spanish']='';
$langdate['takeorder'][5]['english']='Organization/Company';
$langdate['takeorder'][5]['french']='Organisation/Entreprise';
$langdate['takeorder'][5]['dutch']='';
$langdate['takeorder'][5]['spanish']='';
$langdate['takeorder'][6]['english']='Email';
$langdate['takeorder'][6]['french']='Courriel';
$langdate['takeorder'][6]['dutch']='';
$langdate['takeorder'][6]['spanish']='';
$langdate['takeorder'][7]['english']='Phone number';
$langdate['takeorder'][7]['french']='Téléphone';
$langdate['takeorder'][7]['dutch']='';
$langdate['takeorder'][7]['spanish']='';
$langdate['takeorder'][8]['english']='Shipping address line1';
$langdate['takeorder'][8]['french']='Adresse de livraison 1';
$langdate['takeorder'][8]['dutch']='';
$langdate['takeorder'][8]['spanish']='';
$langdate['takeorder'][9]['english']='Shipping address line2';
$langdate['takeorder'][9]['french']='Adresse de livraison 2';
$langdate['takeorder'][9]['dutch']='';
$langdate['takeorder'][9]['spanish']='';
$langdate['takeorder'][10]['english']='Town/City';
$langdate['takeorder'][10]['french']='Ville';
$langdate['takeorder'][10]['dutch']='';
$langdate['takeorder'][10]['spanish']='';
$langdate['takeorder'][11]['english']='Postcode';
$langdate['takeorder'][11]['french']='Code Postal';
$langdate['takeorder'][11]['dutch']='';
$langdate['takeorder'][11]['spanish']='';
$langdate['takeorder'][12]['english']='Country';
$langdate['takeorder'][12]['french']='Pays';
$langdate['takeorder'][12]['dutch']='';
$langdate['takeorder'][12]['spanish']='';
$langdate['takeorder'][13]['english']='Shipping Information';
$langdate['takeorder'][13]['french']='Informations de livraison';
$langdate['takeorder'][13]['dutch']='';
$langdate['takeorder'][13]['spanish']='';
$langdate['takeorder'][14]['english']='A indicates  field is required';
$langdate['takeorder'][14]['french']='Champs obligatoires';
$langdate['takeorder'][14]['dutch']='';
$langdate['takeorder'][14]['spanish']='';
$langdate['takeorder'][15]['english']='/rescources/images/pcborderform_1.png';
$langdate['takeorder'][15]['french']='/rescources/images/pcborderform_1_fr.png';
$langdate['takeorder'][15]['dutch']='';
$langdate['takeorder'][15]['spanish']='';
$langdate['takeorder'][16]['english']='/rescources/images/banner02.jpg';
$langdate['takeorder'][16]['french']='/rescources/images/banner02_fr.jpg';
$langdate['takeorder'][16]['dutch']='';
$langdate['takeorder'][16]['spanish']='';
$langdate['takeorder'][17]['english']='Next';
$langdate['takeorder'][17]['french']='Continuer';
$langdate['takeorder'][17]['dutch']='';
$langdate['takeorder'][17]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacture,prototype</title>
<meta name="description" content="Low Cost PCB Manufacturer,Online Quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication, UK manufacturing, Europe multi-layers Printed circuit boards manufacturing,offering prototypes to volume production PCB." />
<meta name="keywords" content="Low Cost PCB Manufacture,Online Quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication, UK manufacturing, Europe multi-layers Printed circuit boards manufacturer,offering prototypes to volume production PCB." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function copyForm()
{
	//document.getElementById('firstName').value=document.getElementById('firstName_out').value;
	//document.getElementById('surname').value=document.getElementById('surname_out').value;
	//document.getElementById('company').value=document.getElementById('company_out').value;
	//document.getElementById('email').value=document.getElementById('email_out').value;
	//document.getElementById('phone').value=document.getElementById('phone_out').value;
	//document.getElementById('deliveryaddress1').value=document.getElementById('deliveryaddress1_out').value;
	//document.getElementById('deliveryaddress2').value=document.getElementById('deliveryaddress2_out').value;
	//document.getElementById('cityTown').value=document.getElementById('cityTown_out').value;
	//document.getElementById('deliverypostcode').value=document.getElementById('deliverypostcode_out').value;
	//document.getElementById('country').value=document.getElementById('country_out').value;
}
function checkForm()
{
	/*
	if(document.getElementById('firstName_out').value=="")
	{
		alert("Please input firstName!");
		return false;
	}
	if(document.getElementById('surname_out').value=="")
	{
		alert("Please input surname!");
		return false;
	}
	if(!checkEmail(document.getElementById('email_out').value))
	{
		alert("Please input your proper email address!");
		return false;
	}
	if(document.getElementById('deliveryaddress1_out').value=="")
	{
		alert("Please input address1!");
		return false;
	}
	if(document.getElementById('cityTown_out').value=="")
	{
		alert("Please input cityTown!");
		return false;
	}
	if(document.getElementById('deliverypostcode_out').value=="")
	{
		alert("Please input postcode!");
		return false;
	}
	*/
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
	if(document.calc.country.value==0)
	{
		alert("Please choose a country!");
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
		o[1]=o[1].replace(/%40/g,"@");
		o[1]=o[1].replace(/\+/g," ");
		o[1]=o[1].replace(/%2B/," ");
		o[1]=o[1].replace(/%2F/,"/");
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
<?php include '../static/header.php'?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['takeorder'][16]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['takeorder'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['takeorder'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['takeorder'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="#" title="" class="on"><?php Lang::EchoString2($langdate['takeorder'][1]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form enctype="multipart/form-data" name="calc" id="calc" action="takeorder2.php" method="post" style="width: 100%;" class="style1" onsubmit="return checkForm();">
				<input type="hidden" name="formRecord" value=""/>
				<?php if($isLogin){ ?>
				<input name="isLogin" type="hidden" value="yes"/>
				<?php }else{ ?>
				<input name="isLogin" type="hidden" value="no"/>
				<?php }?>
					<div class="lc_title"><img src="<?php Lang::EchoString2($langdate['takeorder'][15]);?>" width="710" height="39" alt="" /></div>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					<tr  style="display:none;"><td colspan="4"><span class="fw c_f30 fs14"><?php Lang::EchoString2($langdate['takeorder'][2]);?></span></td></tr>
					  <tr style="display:none;">
						<td width="186"><?php Lang::EchoString2($langdate['takeorder'][3]);?>:</td>
						<td width="206"><input id="firstName_out" name="firstName_out" type="text" style="width:80px" value="<?php echo $receiver->FirstName ?>"/><span class="c_f30"> *</span></td>
					    <td width="112"><?php Lang::EchoString2($langdate['takeorder'][4]);?>:</td>
					    <td width="206"><input id="surname_out" name="surname_out" type="text" style="width:80px" value="<?php echo $receiver->SurName ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr  style="display:none;">
						<td><?php Lang::EchoString2($langdate['takeorder'][5]);?>:</td>
						<td colspan="3"><input id="company_out" name="company_out" type="text" value="<?php echo $receiver->Company ?>"/></td>
					  </tr>
					  <tr  style="display:none;">
						<td><?php Lang::EchoString2($langdate['takeorder'][6]);?>:</td>
						<td colspan="3"><input id="email_out" name="email_out" type="text" value="<?php echo $receiver->Email ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr  style="display:none;">
						<td><?php Lang::EchoString2($langdate['takeorder'][7]);?>:</td>
						<td colspan="3"><input id="phone_out" name="phone_out" type="text" value="<?php echo $receiver->Telephone ?>"/></td>
					  </tr>
					  <tr  style="display:none;">
					   <td><?php Lang::EchoString2($langdate['takeorder'][8]);?>:</td>
						<td colspan="3"><input id="deliveryaddress1_out" name="deliveryaddress1_out" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineOne ?>" /><span class="c_f30"> *</span></td>
					  </tr>
                      <tr  style="display:none;">
					   <td><?php Lang::EchoString2($langdate['takeorder'][9]);?>:</td>
						<td colspan="3"><input id="deliveryaddress2_out" name="deliveryaddress2_out" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineTwo ?>" /></td>
					  </tr>
                      <tr  style="display:none;">
					   <td><?php Lang::EchoString2($langdate['takeorder'][10]);?>:</td>
						<td colspan="3"><input id="cityTown_out" name="cityTown_out" type="text" value="<?php echo $receiver->CityTown ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr  style="display:none;">
					   <td><?php Lang::EchoString2($langdate['takeorder'][11]);?>:</td>
						<td colspan="3"><input id="deliverypostcode_out" name="deliverypostcode_out" type="text" value="<?php echo $receiver->PostCode ?>"><span class="c_f30"> *</span></td>
					  </tr>
                      <tr  style="display:none;">
					   <td><?php Lang::EchoString2($langdate['takeorder'][12]);?>:</td>
						<td colspan="3">
							<!--<select name="country_out" id="country_out" style="width: 155px" onchange="">
								<option value="1" <?php if(!$isLogin){echo 'selected="selected"';}else{if($receiver->CountryId == 1){echo 'selected="selected"';}} ?>>UK</option>
								<option value="2" <?php if($receiver->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
								<option value="3" <?php if($receiver->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
								<option value="4" <?php if($receiver->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
								<option value="5" <?php if($receiver->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
								<option value="6" <?php if($receiver->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
								<option value="7" <?php if($receiver->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
								<option value="8" <?php if($receiver->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
								<option value="9" <?php if($receiver->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
								<option value="11" <?php if($receiver->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
							</select>-->
							<select name="country_out" id="country_out" style="width: 250px">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									$strSelect = '';
									if($i == 0){
										if(!$isLogin){
											$strSelect = ' selected="selected"';
										}
									}
									if($receiver->CountryId == $allCountries[$i]->Id){
										$strSelect = ' selected="selected"';
									}
									echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
								}
								?>
								<option value="999" <?php if($receiver->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
							</select>						
							</td>
					  </tr>
					<tr><td colspan="4"><span class="fw c_f30 fs14"><?php Lang::EchoString2($langdate['takeorder'][13]);?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#firstName" onclick="copyForm();" style="color:#D30;display:none;" >Copy from billing information</a></td></tr>
					  <tr>
						<td width="186"><?php Lang::EchoString2($langdate['takeorder'][3]);?>:</td>
						<td width="206"><input id="firstName" name="firstName" type="text" style="width:80px" value="<?php echo $receiver->FirstName ?>"/><span class="c_f30"> *</span></td>
					    <td width="112"><?php Lang::EchoString2($langdate['takeorder'][4]);?>:</td>
					    <td width="206"><input id="surname" name="surname" type="text" style="width:80px" value="<?php echo $receiver->SurName ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['takeorder'][5]);?>:</td>
						<td colspan="3"><input id="company" name="company" type="text" value="<?php echo $receiver->Company ?>"/></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['takeorder'][6]);?>:</td>
						<td colspan="3"><input id="email" name="email" type="text" value="<?php echo $receiver->Email ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['takeorder'][7]);?>:</td>
						<td colspan="3"><input id="phone" name="phone" type="text" value="<?php echo $receiver->Telephone ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder'][8]);?>:</td>
						<td colspan="3"><input id="deliveryaddress1" name="deliveryaddress1" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineOne ?>"><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder'][9]);?>:</td>
						<td colspan="3"><input id="deliveryaddress2" name="deliveryaddress2" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineTwo ?>"></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder'][10]);?>:</td>
						<td colspan="3"><input id="cityTown" name="cityTown" type="text" value="<?php echo $receiver->CityTown ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder'][11]);?>:</td>
						<td colspan="3"><input id="deliverypostcode" name="deliverypostcode" type="text" value="<?php echo $receiver->PostCode ?>"><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['takeorder'][12]);?>:</td>
						<td colspan="3">
							<!--<select name="country" id="country" style="width: 155px" onchange="">
								<option value="1" <?php if(!$isLogin){echo 'selected="selected"';}else{if($receiver->CountryId == 1){echo 'selected="selected"';}} ?>>UK</option>
								<option value="2" <?php if($receiver->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
								<option value="3" <?php if($receiver->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
								<option value="4" <?php if($receiver->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
								<option value="5" <?php if($receiver->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
								<option value="6" <?php if($receiver->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
								<option value="7" <?php if($receiver->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
								<option value="8" <?php if($receiver->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
								<option value="9" <?php if($receiver->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
								<option value="11" <?php if($receiver->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
							</select>-->
							<?php
								if(!$isRepeat){
							?>
							<select name="country" id="country" style="width: 250px;<?php if($isRepeat){echo "display:none";} ?> " >
								<?php 
								unset($_SESSION['country']);
								for($i=0; $i < count($allCountries); $i++)
								{
									$strSelect = '';
									if($i == 0){
										if(!$isLogin){
											$strSelect = ' selected="selected"';
										}
									}
									if($receiver->CountryId == $allCountries[$i]->Id){
										$strSelect = ' selected="selected"';
									}
									echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
								}
								?>
								<option value="999" <?php if($receiver->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
							</select>
							<?php
								}else{
									echo '<input type="hidden" value="'.$_SESSION['country'].'" id="country" name="country"/>';
									$country = Common::GetCountryById($_SESSION['country']);
									echo "&nbsp;".$country;
								}
							?>		
							</td>
					  </tr>
                      
                       <tr>
					  	 <td colspan="4" class="tc">
							<p><span class="c_f30 lh2em">*</span><?php Lang::EchoString2($langdate['takeorder'][14]);?></p>
						 </td>
					   </tr>
					</table>
					<p class="mt10 tc"><input type="submit" value="<?php Lang::EchoString2($langdate['takeorder'][17]);?>" class="submit_bn" onclick="getValues();"/>
					</p>
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php'?>
</body>
</html>