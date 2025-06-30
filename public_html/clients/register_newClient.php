

<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Client_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Receiver_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
session_start();
$langdate['register'][0]['english']='Home';
$langdate['register'][0]['french']='Accueil';
$langdate['register'][0]['dutch']='';
$langdate['register'][0]['spanish']='';
$langdate['register'][1]['english']='Register';
$langdate['register'][1]['french']='S\'inscrire';
$langdate['register'][1]['dutch']='';
$langdate['register'][1]['spanish']='';
$langdate['register'][2]['english']='User ID';
$langdate['register'][2]['french']='Identifiant';
$langdate['register'][2]['dutch']='';
$langdate['register'][2]['spanish']='';
$langdate['register'][3]['english']='check';
$langdate['register'][3]['french']='vérification';
$langdate['register'][3]['dutch']='';
$langdate['register'][3]['spanish']='';
$langdate['register'][4]['english']='Password';
$langdate['register'][4]['french']='Mot de passe';
$langdate['register'][4]['dutch']='';
$langdate['register'][4]['spanish']='';
$langdate['register'][5]['english']='Confirm password';
$langdate['register'][5]['french']='Confirmation du mot de passe';
$langdate['register'][5]['dutch']='';
$langdate['register'][5]['spanish']='';
$langdate['register'][6]['english']='Billing Information';
$langdate['register'][6]['french']='Données de facturation';
$langdate['register'][6]['dutch']='';
$langdate['register'][6]['spanish']='';
$langdate['register'][7]['english']='Firstname';
$langdate['register'][7]['french']='Prénom';
$langdate['register'][7]['dutch']='';
$langdate['register'][7]['spanish']='';
$langdate['register'][8]['english']='Surname';
$langdate['register'][8]['french']='Nom';
$langdate['register'][8]['dutch']='';
$langdate['register'][8]['spanish']='';
$langdate['register'][9]['english']='Organization/Company';
$langdate['register'][9]['french']='Organisation/Entreprise';
$langdate['register'][9]['dutch']='';
$langdate['register'][9]['spanish']='';
$langdate['register'][10]['english']='Email';
$langdate['register'][10]['french']='Courriel';
$langdate['register'][10]['dutch']='';
$langdate['register'][10]['spanish']='';
$langdate['register'][11]['english']='Phone number';
$langdate['register'][11]['french']='Téléphone';
$langdate['register'][11]['dutch']='';
$langdate['register'][11]['spanish']='';
$langdate['register'][12]['english']='Billing address line1';
$langdate['register'][12]['french']='Adresse de facturation 1';
$langdate['register'][12]['dutch']='';
$langdate['register'][12]['spanish']='';
$langdate['register'][13]['english']='Billing address line2';
$langdate['register'][13]['french']='Adresse de facturation 2';
$langdate['register'][13]['dutch']='';
$langdate['register'][13]['spanish']='';
$langdate['register'][14]['english']='Town/City';
$langdate['register'][14]['french']='Ville';
$langdate['register'][14]['dutch']='';
$langdate['register'][14]['spanish']='';
$langdate['register'][15]['english']='Postcode';
$langdate['register'][15]['french']='Code Postal';
$langdate['register'][15]['dutch']='';
$langdate['register'][15]['spanish']='';
$langdate['register'][16]['english']='Country';
$langdate['register'][16]['french']='Pays';
$langdate['register'][16]['dutch']='';
$langdate['register'][16]['spanish']='';
$langdate['register'][17]['english']='Shipping information';
$langdate['register'][17]['french']='Informations de livraison';
$langdate['register'][17]['dutch']='';
$langdate['register'][17]['spanish']='';
$langdate['register'][18]['english']='Copy from billing information';
$langdate['register'][18]['french']='Utiliser l\'adresse de facturation';
$langdate['register'][18]['dutch']='';
$langdate['register'][18]['spanish']='';
$langdate['register'][19]['english']='Verification code';
$langdate['register'][19]['french']='Code de vérification';
$langdate['register'][19]['dutch']='';
$langdate['register'][19]['spanish']='';
$langdate['register'][20]['english']='Try a different image';
$langdate['register'][20]['french']='Essayer une autre image';
$langdate['register'][20]['dutch']='';
$langdate['register'][20]['spanish']='';
$langdate['register'][21]['english']='A indicates field is required';
$langdate['register'][21]['french']='Champs obligatoires';
$langdate['register'][21]['dutch']='';
$langdate['register'][21]['spanish']='';
$langdate['register'][22]['english']='Shipping address line1';
$langdate['register'][22]['french']='Adresse de livraison 1';
$langdate['register'][22]['dutch']='';
$langdate['register'][22]['spanish']='';
$langdate['register'][23]['english']='Shipping address line2';
$langdate['register'][23]['french']='Adresse de livraison 2';
$langdate['register'][23]['dutch']='';
$langdate['register'][23]['spanish']='';
$langdate['register'][24]['english']='Submit';
$langdate['register'][24]['french']='Soumettre';
$langdate['register'][24]['dutch']='';
$langdate['register'][24]['spanish']='';
$langdate['register'][25]['english']='/rescources/images/banner02.jpg';
$langdate['register'][25]['french']='/rescources/images/banner02_fr.jpg';
$langdate['register'][25]['dutch']='';
$langdate['register'][25]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>printed circuit board manufacturing in low price,UK PCB board manufacturer,PCB prototype manufacturing,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price,pcb fabrication." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<script src="../Management/Scripts/client.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
<script type="text/javascript">
function getNewPic() {
		$("#checkPic").attr("src",$("#checkPic").attr("src")+"?"+Math.random());
};

</script>
</head>
<body class="bg">
    
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
	
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['register'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['register'][1]);?></a></div>

				<div class="mt40 auto reg_box ">
					<div class="reg_box_top"></div>
					<div class="reg_box_con">
						<div class="online_from mt10">
						<form name="form1" method="post" action="doInsertClient_client.php">
						<div class="reg_title c_f30"><?php Lang::EchoString2($langdate['register'][1]);?></div>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10"  >
						    <tr>
							<td><?php Lang::EchoString2($langdate['register'][2]);?>:</td>
							<td colspan="3"><input id="loginId" name="loginId" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->LoginId;} ?>"/><span class="c_f30"> *</span>&nbsp;&nbsp;&nbsp;<a href="#" title="" class="tu c_f60" onclick="ajaxCheck('clientLoginId','loginId')"><?php Lang::EchoString2($langdate['register'][3]);?></a></td>
						  </tr>
						    <tr>
							<td><?php Lang::EchoString2($langdate['register'][4]);?>:</td>
							<td colspan="3"><input id="password" name="password" type="password" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->Password;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						    <tr>
							<td><?php Lang::EchoString2($langdate['register'][5]);?>: </td>
							<td colspan="3"><input id="password2" name="password2" type="password" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->Password;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						   <tr>
							<td colspan="4"><span class="c_f30"><?php Lang::EchoString2($langdate['register'][6]);?></span></td>
						  </tr>
						  <tr>
							<td width="186"><?php Lang::EchoString2($langdate['register'][7]);?>:</td>
							<td width="206"><input id="firstName" name="firstName" style="width:80px" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->FirstName;} ?>"/><span class="c_f30"> *</span></td>
							<td width="112"><?php Lang::EchoString2($langdate['register'][8]);?>:</td>
							<td width="206"><input id="surname" name="surname" style="width:80px" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->SurName;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
							<td><?php Lang::EchoString2($langdate['register'][9]);?>:</td>
							<td colspan="3"><input id="company" name="company" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->Company;} ?>"/></td>
						  </tr>
						  <tr>
							<td><?php Lang::EchoString2($langdate['register'][10]);?>:</td>
							<td colspan="3"><input id="email" name="email" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->Email;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
							<td><?php Lang::EchoString2($langdate['register'][11]);?>:</td>
							<td colspan="3"><input id="telephone" name="telephone" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->Telephone;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][12]);?>:</td>
							<td colspan="3"><input id="addressLineOne" name="addressLineOne" style="width: 280px" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->AddressLineOne;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][13]);?>:</td>
							<td colspan="3"><input id="addressLineTwo" name="addressLineTwo" style="width: 280px" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->AddressLineTwo;} ?>"/></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][14]);?>:</td>
							<td colspan="3"><input id="cityTown" name="cityTown" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->CityTown;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][15]);?>:</td>
							<td colspan="3"><input id="postcode" name="postcode" type="text" value="<?php if(isset($_SESSION['errorClient'])){echo $_SESSION['errorClient']->PostCode;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][16]);?>:</td>
							<td colspan="3">
								<!--<select name="country" id="country" style="width: 180px">
									<option value="1" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 1){echo 'selected="selected"';} ?>>UK</option>
									<option value="2" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
									<option value="3" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
									<option value="4" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
									<option value="5" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
									<option value="6" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
									<option value="7" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
									<option value="8" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
									<option value="9" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
									<option value="11" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
								</select>-->
								<select name="country" id="country" style="width: 250px">
									<?php 
									for($i=0; $i < count($allCountries); $i++)
									{
										$strSelect = '';
										if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == $allCountries[$i]->Id){
											$strSelect = ' selected="selected"';
										}
										echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
									}
									?>
									<option value="999" <?php if(isset($_SESSION['errorClient']) && $_SESSION['errorClient']->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
								</select>
							</td>
						  </tr>
						  <tr>
						   <td colspan="4"><span class="c_f30"><?php Lang::EchoString2($langdate['register'][17]);?>: &nbsp;&nbsp;<a href="javascript:copyForm()" class="tu"  style="color:#D30;"><?php Lang::EchoString2($langdate['register'][18]);?></a></span></td>
						  </tr>
						  <tr>
							<td width="186"><?php Lang::EchoString2($langdate['register'][7]);?>:</td>
							<td width="206"><input id="firstName2" name="firstName2" style="width:80px" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->FirstName;} ?>"/><span class="c_f30"> *</span></td>
							<td width="112"><?php Lang::EchoString2($langdate['register'][8]);?>:</td>
							<td width="206"><input id="surname2" name="surname2" style="width:80px" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->SurName;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][9]);?>:</td>
							<td colspan="3"><input id="company2" name="company2" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->Company;} ?>"/></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][10]);?>:</td>
							<td colspan="3"><input id="email2" name="email2" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->Email;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][11]);?>:</td>
							<td colspan="3"><input id="telephone2" name="telephone2" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->Telephone;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						 
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][22]);?>:</td>
							<td colspan="3"><input id="addressLineOne2" name="addressLineOne2" style="width: 280px" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->AddressLineOne;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][23]);?>:</td>
							<td colspan="3"><input id="addressLineTwo2" name="addressLineTwo2" style="width: 280px" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->AddressLineTwo;} ?>"/></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][14]);?>:</td>
							<td colspan="3"><input id="cityTown2" name="cityTown2" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->CityTown;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][15]);?>:</td>
							<td colspan="3"><input id="postcode2" name="postcode2" type="text" value="<?php if(isset($_SESSION['errorReceiver'])){echo $_SESSION['errorReceiver']->PostCode;} ?>"/><span class="c_f30"> *</span></td>
						  </tr>
						  <tr>
						   <td><?php Lang::EchoString2($langdate['register'][16]);?>:</td>
							<td colspan="3">
								<!--<select name="country2" id="country2" style="width: 180px">
									<option value="1" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 1){echo 'selected="selected"';} ?>>UK</option>
									<option value="2" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
									<option value="3" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
									<option value="4" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
									<option value="5" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
									<option value="6" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
									<option value="7" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
									<option value="8" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
									<option value="9" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
									<option value="11" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
								</select>-->
								<select name="country2" id="country2" style="width: 250px">
									<?php 
									for($i=0; $i < count($allCountries); $i++)
									{
										$strSelect = '';
										if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == $allCountries[$i]->Id){
											$strSelect = ' selected="selected"';
										}
										echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
									}
									?>
									<option value="999" <?php if(isset($_SESSION['errorReceiver']) && $_SESSION['errorReceiver']->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
								</select>
							</td>
						  </tr>
						   <tr>
						   <td><?php Lang::EchoString2($langdate['register'][19]);?>:</td>
							<td colspan="3"><input id="checkString" name="checkString" type="text" class="myInput"/>
							&nbsp;<img id="checkPic" src="createCheckPic_client.php" alt="" style="margin-top:5px;vertical-align:bottom"/>
							&nbsp;<a id="getCheckPic" href="#checkString" style="color:#005AA0" onclick="getNewPic();"><?php Lang::EchoString2($langdate['register'][20]);?>.</a></td>
						  </tr>
						   <tr>
						   <td colspan="4" align="center"><span class="c_f30"> *</span><?php Lang::EchoString2($langdate['register'][21]);?></td>
	  					  </tr>
                         
						</table>
                               <div class="g-recaptcha" data-sitekey="6LeEUpQUAAAAABbLjeiujLMQDcQXUmNfTKtDukRM"></div>
            <br/>
                                              
						<p class="mt10 tc"><input id="image2" type="submit" value="<?php Lang::EchoString2($langdate['register'][24]);?>"  class="submit_bn2 mt25 mb25" onclick="return checkAddClient();"/>
						</p>
					  <div id="js_Error" style="font-size:16px; font-weight:bold;">
				<?php 
					if(isset($_SESSION["message"])){
						$temp = $_SESSION["message"]; 
						$temp = str_replace("<span style='color:red;'>","",$temp);
						$temp = str_replace("</span>","",$temp);
						$temp = str_replace("<br/>","",$temp);
						echo '<script>alert(\''.$temp.'\');</script>';
						echo $_SESSION["message"];
					}
					if(isset($_SESSION['errorClient'])){unset($_SESSION["errorClient"]);}
					if(isset($_SESSION['errorReceiver'])){unset($_SESSION["errorReceiver"]);}
					if(isset($_SESSION['message'])){unset($_SESSION["message"]);}
				?>
			</div>
						</p>
                      
						</form>
        
        			</div>
					<div class="clear"></div>
				</div>
				<div class="reg_box_bottom"></div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>