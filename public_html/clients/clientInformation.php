<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");

if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientInformation.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$clientService = new ClientService();
$receiverService = new ReceiverService();
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$temp = $receiverService->GetReceiverByClientId($client->Id);
$receiver = $temp[0];
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
$messageService = new MessageService();
$unreadMessageArray = $messageService->GetUnreadMessagesByClientId($client->Id);
$voucherService = new VoucherService();
$unUsedvoucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1");
$langdate['clientInformation'][0]['english']='Home';
$langdate['clientInformation'][0]['french']='Accueil';
$langdate['clientInformation'][0]['dutch']='';
$langdate['clientInformation'][0]['spanish']='';
$langdate['clientInformation'][1]['english']='My Quick-teck';
$langdate['clientInformation'][1]['french']='Mon compte Quick-teck';
$langdate['clientInformation'][1]['dutch']='';
$langdate['clientInformation'][1]['spanish']='';
$langdate['clientInformation'][2]['english']='Order list';
$langdate['clientInformation'][2]['french']='Liste de commandes';
$langdate['clientInformation'][2]['dutch']='';
$langdate['clientInformation'][2]['spanish']='';
$langdate['clientInformation'][3]['english']='Change password';
$langdate['clientInformation'][3]['french']='Changer le mot de passe';
$langdate['clientInformation'][3]['dutch']='';
$langdate['clientInformation'][3]['spanish']='';
$langdate['clientInformation'][4]['english']='My Profile';
$langdate['clientInformation'][4]['french']='Mon profil';
$langdate['clientInformation'][4]['dutch']='';
$langdate['clientInformation'][4]['spanish']='';
$langdate['clientInformation'][5]['english']='Voucher';
$langdate['clientInformation'][5]['french']='Bon de réduction';
$langdate['clientInformation'][5]['dutch']='';
$langdate['clientInformation'][5]['spanish']='';
$langdate['clientInformation'][6]['english']='Message';
$langdate['clientInformation'][6]['french']='Message';
$langdate['clientInformation'][6]['dutch']='';
$langdate['clientInformation'][6]['spanish']='';
$langdate['clientInformation'][7]['english']='My information';
$langdate['clientInformation'][7]['french']='Mes informations';
$langdate['clientInformation'][7]['dutch']='';
$langdate['clientInformation'][7]['spanish']='';
$langdate['clientInformation'][8]['english']='A * indicates a field is required';
$langdate['clientInformation'][8]['french']='Champs obligatoires';
$langdate['clientInformation'][8]['dutch']='';
$langdate['clientInformation'][8]['spanish']='';
$langdate['clientInformation'][9]['english']='Billing Information';
$langdate['clientInformation'][9]['french']='Données de facturation';
$langdate['clientInformation'][9]['dutch']='';
$langdate['clientInformation'][9]['spanish']='';
$langdate['clientInformation'][10]['english']='Firstname';
$langdate['clientInformation'][10]['french']='Prénom';
$langdate['clientInformation'][10]['dutch']='';
$langdate['clientInformation'][10]['spanish']='';
$langdate['clientInformation'][11]['english']='Surname';
$langdate['clientInformation'][11]['french']='Nom';
$langdate['clientInformation'][11]['dutch']='';
$langdate['clientInformation'][11]['spanish']='';
$langdate['clientInformation'][12]['english']='Organization/Company';
$langdate['clientInformation'][12]['french']='Organisation/Entreprise';
$langdate['clientInformation'][12]['dutch']='';
$langdate['clientInformation'][12]['spanish']='';
$langdate['clientInformation'][13]['english']='Email';
$langdate['clientInformation'][13]['french']='Courriel';
$langdate['clientInformation'][13]['dutch']='';
$langdate['clientInformation'][13]['spanish']='';
$langdate['clientInformation'][14]['english']='Phone number';
$langdate['clientInformation'][14]['french']='Téléphone';
$langdate['clientInformation'][14]['dutch']='';
$langdate['clientInformation'][14]['spanish']='';
$langdate['clientInformation'][15]['english']='Billing address line1';
$langdate['clientInformation'][15]['french']='Adresse de facturation 1';
$langdate['clientInformation'][15]['dutch']='';
$langdate['clientInformation'][15]['spanish']='';
$langdate['clientInformation'][16]['english']='Billing address line2';
$langdate['clientInformation'][16]['french']='Adresse de facturation 2';
$langdate['clientInformation'][16]['dutch']='';
$langdate['clientInformation'][16]['spanish']='';
$langdate['clientInformation'][17]['english']='Town/City';
$langdate['clientInformation'][17]['french']='Ville';
$langdate['clientInformation'][17]['dutch']='';
$langdate['clientInformation'][17]['spanish']='';
$langdate['clientInformation'][18]['english']='Postcode';
$langdate['clientInformation'][18]['french']='Code Postal';
$langdate['clientInformation'][18]['dutch']='';
$langdate['clientInformation'][18]['spanish']='';
$langdate['clientInformation'][19]['english']='Country';
$langdate['clientInformation'][19]['french']='Pays';
$langdate['clientInformation'][19]['dutch']='';
$langdate['clientInformation'][19]['spanish']='';
$langdate['clientInformation'][20]['english']='A * indicates a field is required';
$langdate['clientInformation'][20]['french']='* Champs obligatoires';
$langdate['clientInformation'][20]['dutch']='';
$langdate['clientInformation'][20]['spanish']='';
$langdate['clientInformation'][21]['english']='Shipping address line1';
$langdate['clientInformation'][21]['french']='Adresse de livraison 1';
$langdate['clientInformation'][21]['dutch']='';
$langdate['clientInformation'][21]['spanish']='';
$langdate['clientInformation'][22]['english']='Shipping address line2';
$langdate['clientInformation'][22]['french']='Adresse de livraison 2';
$langdate['clientInformation'][22]['dutch']='';
$langdate['clientInformation'][22]['spanish']='';
$langdate['clientInformation'][23]['english']='/rescources/images/banner02.jpg';
$langdate['clientInformation'][23]['french']='/rescources/images/banner02_fr.jpg';
$langdate['clientInformation'][23]['dutch']='';
$langdate['clientInformation'][23]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Printed circuit board manufacturer,Quick-teck,UK PCB board manufacturer,PCB prototype fabrication,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price online." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price with high quality." />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script src="../Management/Scripts/client.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="<?php Lang::EchoString2($langdate['clientInformation'][23]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['clientInformation'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['clientInformation'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['clientInformation'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/clients/clientMain.php" title="" ><?php Lang::EchoString2($langdate['clientInformation'][2]);?></a></li>
						<li><a href="/clients/clientModifyPassword.php" title=""><?php Lang::EchoString2($langdate['clientInformation'][3]);?></a></li>
						<li><a href="/clients/clientInformation.php" title="" class="on"><?php Lang::EchoString2($langdate['clientInformation'][4]);?></a></li>
						<li><a href="/clients/voucherList_client.php" title=""><?php Lang::EchoString2($langdate['clientInformation'][5]);?>(<?php echo count($unUsedvoucherArray)?>)</a></li>
						<li><a href="/clients/messageList_client.php" title=""><?php Lang::EchoString2($langdate['clientInformation'][6]);?>(<?php echo count($unreadMessageArray)?>)</a></li>
					</ul>
				</div>
				<div class="mt10">
	<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
<a href="/aboutus/why_us.php" title=""><img src="/rescources/leftpic/04.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/></a>
<img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;" />
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form name="form1" method="post" action="doModifyClient2_client.php">
				<input id="id" name="id" type="hidden" value="<?php echo $client->Id ?>"/>
					<h3 class="title_main"><?php Lang::EchoString2($langdate['clientInformation'][7]);?></h3>
					<div class="online_from mt10">
						<p><span class="c_f30 lh2em">*</span><?php Lang::EchoString2($langdate['clientInformation'][8]);?></p>
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                       <tr>
						<td colspan="4"><span class="c_f30 fs14 fw"><?php Lang::EchoString2($langdate['clientInformation'][9]);?></span></td>
					  </tr>
					  <tr>
						<td width="186"><?php Lang::EchoString2($langdate['clientInformation'][10]);?>:</td>
						<td width="206"><input id="firstName" name="firstName" style="width:80px" type="text" value="<?php echo $client->FirstName ?>"/><span class="c_f30"> *</span></td>
					    <td width="112"><?php Lang::EchoString2($langdate['clientInformation'][11]);?>:</td>
					    <td width="206"><input id="surname" name="surname" style="width:80px" type="text" value="<?php echo $client->SurName ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['clientInformation'][12]);?>:</td>
						<td colspan="3"><input id="company" name="company" type="text" value="<?php echo $client->Company ?>"/></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['clientInformation'][13]);?>:</td>
						<td colspan="3"><input id="email" name="email" type="text" value="<?php echo $client->Email ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['clientInformation'][14]);?>:</td>
						<td colspan="3"><input id="telephone" name="telephone" type="text" value="<?php echo $client->Telephone ?>"/><span class="c_f30"> *</span></td>
					  </tr>
					  <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][15]);?>:</td>
						<td colspan="3"><input id="addressLineOne" name="addressLineOne" style="width: 280px" type="text" value="<?php echo $client->AddressLineOne ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][16]);?>:</td>
						<td colspan="3"><input id="addressLineTwo" name="addressLineTwo" style="width: 280px" type="text" value="<?php echo $client->AddressLineTwo ?>"/></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][17]);?>:</td>
						<td colspan="3"><input id="cityTown" name="cityTown" type="text" value="<?php echo $client->CityTown ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][18]);?>:</td>
						<td colspan="3"><input id="postcode" name="postcode" type="text" value="<?php echo $client->PostCode ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][19]);?>:</td>
						<td colspan="3">
							<!--<select name="country" id="country" style="width: 180px">
		                        <option value="1" <?php if($client->CountryId == 1){echo 'selected="selected"';} ?>>UK</option>
		                        <option value="2" <?php if($client->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
		                        <option value="3" <?php if($client->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
		                        <option value="4" <?php if($client->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
		                        <option value="5" <?php if($client->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
		                        <option value="6" <?php if($client->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
		                        <option value="7" <?php if($client->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
		                        <option value="8" <?php if($client->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
		                        <option value="9" <?php if($client->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
		                        <option value="11" <?php if($client->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
	                        </select>-->
	                        <select name="country" id="country" style="width: 250px">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									$strSelect = '';
									if($client->CountryId == $allCountries[$i]->Id){
										$strSelect = ' selected="selected"';
									}
									echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
								}
								?>
								<option value="999" <?php if($client->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
							</select>
						</td>
					  </tr>
                      <tr>
					   <td colspan="4"><span class="c_f30 fs14"><span class="fw">Shipping information:</span> <a href="#firstName2" onclick="copyForm();"  class="tu">Copy from billing information</a></span></td>
					  </tr>
                      <tr>
						<td width="186"><?php Lang::EchoString2($langdate['clientInformation'][10]);?>:</td>
						<td width="206"><input id="firstName2" name="firstName2" style="width:80px" type="text" value="<?php echo $receiver->FirstName ?>"/><span class="c_f30"> *</span></td>
					    <td width="112"><?php Lang::EchoString2($langdate['clientInformation'][11]);?>:</td>
					    <td width="206"><input id="surname2" name="surname2" style="width:80px" type="text" value="<?php echo $receiver->SurName ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][12]);?>:</td>
						<td colspan="3"><input id="company2" name="company2" type="text" value="<?php echo $receiver->Company ?>"/></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][13]);?>:</td>
						<td colspan="3"><input id="email2" name="email2" type="text" value="<?php echo $receiver->Email ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][14]);?>:</td>
						<td colspan="3"><input id="telephone2" name="telephone2" type="text" value="<?php echo $receiver->Telephone ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                     
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][21]);?>:</td>
						<td colspan="3"><input id="addressLineOne2" name="addressLineOne2" style="width: 280px" type="text" value="<?php echo $receiver->AddressLineOne ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][22]);?>:</td>
						<td colspan="3"><input id="addressLineTwo2" name="addressLineTwo2" style="width: 280px" type="text" value="<?php echo $receiver->AddressLineTwo ?>"/></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][17]);?>:</td>
						<td colspan="3"><input id="cityTown2" name="cityTown2" type="text" value="<?php echo $receiver->CityTown ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][18]);?>:</td>
						<td colspan="3"><input id="postcode2" name="postcode2" type="text" value="<?php echo $receiver->PostCode ?>"/><span class="c_f30"> *</span></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['clientInformation'][19]);?>:</td>
						<td colspan="3">
							<!--<select name="country2" id="country2" style="width: 180px">
	                            <option value="1" <?php if($receiver->CountryId == 1){echo 'selected="selected"';}  if(!$receiver){echo 'selected="selected"';} ?>>UK</option>
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
                            <select name="country2" id="country2" style="width: 250px">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									$strSelect = '';
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
                       <tr>
					   <td colspan="4" align="center"> <span class="c_f30"> *</span><?php Lang::EchoString2($langdate['clientInformation'][20]);?></td>
					  </tr>
					</table>
					<p class="mt10 tc"><input id="image2" type="submit" value="Save" class="submit_bn" onclick="return checkModifyClient()"/>
					</p>
					<p>
				     <?php unset($_SESSION[searchOrder]); //echo $_SESSION[message]; //$_SESSION[message]=""; ?>
			       </p>
			       <div id="js_Error" style="font-size:16px; font-weight:bold;">
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
<?php
if($_SESSION[message] != ""){
	$_SESSION[message]="";
	echo "<script type='text/javascript'>alert('Modify successfully!');</script>";
}
?>
</body>
</html>