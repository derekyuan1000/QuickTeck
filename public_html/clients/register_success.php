<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
session_start();
$clientService = new ClientService();
$receiverService = new ReceiverService();
if($_SESSION[registerClientId]){
	$client = $clientService->GetClientById($_SESSION[registerClientId]);
}else{
	return;	
}
$temp = $receiverService->GetReceiverByClientId($client->Id);
$receiver = $temp[0];
$langdate['reg_success'][0]['english']='Home';
$langdate['reg_success'][0]['french']='Accueil';
$langdate['reg_success'][0]['dutch']='';
$langdate['reg_success'][0]['spanish']='';
$langdate['reg_success'][1]['english']='Register';
$langdate['reg_success'][1]['french']='S\'inscrire';
$langdate['reg_success'][1]['dutch']='';
$langdate['reg_success'][1]['spanish']='';
$langdate['reg_success'][2]['english']='My information';
$langdate['reg_success'][2]['french']='Mes informations';
$langdate['reg_success'][2]['dutch']='';
$langdate['reg_success'][2]['spanish']='';
$langdate['reg_success'][3]['english']='User ID';
$langdate['reg_success'][3]['french']='Identifiant';
$langdate['reg_success'][3]['dutch']='';
$langdate['reg_success'][3]['spanish']='';
$langdate['reg_success'][4]['english']='Billing information';
$langdate['reg_success'][4]['french']='Données de facturation';
$langdate['reg_success'][4]['dutch']='';
$langdate['reg_success'][4]['spanish']='';
$langdate['reg_success'][5]['english']='Firstname';
$langdate['reg_success'][5]['french']='Prénom';
$langdate['reg_success'][5]['dutch']='';
$langdate['reg_success'][5]['spanish']='';
$langdate['reg_success'][6]['english']='Surname';
$langdate['reg_success'][6]['french']='Nom';
$langdate['reg_success'][6]['dutch']='';
$langdate['reg_success'][6]['spanish']='';
$langdate['reg_success'][7]['english']='Organization/Company';
$langdate['reg_success'][7]['french']='Organisation/Entreprise';
$langdate['reg_success'][7]['dutch']='';
$langdate['reg_success'][7]['spanish']='';
$langdate['reg_success'][8]['english']='Email';
$langdate['reg_success'][8]['french']='Courriel';
$langdate['reg_success'][8]['dutch']='';
$langdate['reg_success'][8]['spanish']='';
$langdate['reg_success'][9]['english']='Phone number';
$langdate['reg_success'][9]['french']='Téléphone';
$langdate['reg_success'][9]['dutch']='';
$langdate['reg_success'][9]['spanish']='';
$langdate['reg_success'][10]['english']='Billing address line1';
$langdate['reg_success'][10]['french']='Adresse de facturation 1';
$langdate['reg_success'][10]['dutch']='';
$langdate['reg_success'][10]['spanish']='';
$langdate['reg_success'][11]['english']='Billing address line2';
$langdate['reg_success'][11]['french']='Adresse de facturation 2';
$langdate['reg_success'][11]['dutch']='';
$langdate['reg_success'][11]['spanish']='';
$langdate['reg_success'][12]['english']='Town/City';
$langdate['reg_success'][12]['french']='Ville';
$langdate['reg_success'][12]['dutch']='';
$langdate['reg_success'][12]['spanish']='';
$langdate['reg_success'][13]['english']='Postcode';
$langdate['reg_success'][13]['french']='Code Postal';
$langdate['reg_success'][13]['dutch']='';
$langdate['reg_success'][13]['spanish']='';
$langdate['reg_success'][14]['english']='Country';
$langdate['reg_success'][14]['french']='Pays';
$langdate['reg_success'][14]['dutch']='';
$langdate['reg_success'][14]['spanish']='';
$langdate['reg_success'][15]['english']='Shipping information';
$langdate['reg_success'][15]['french']='Informations de livraison';
$langdate['reg_success'][15]['dutch']='';
$langdate['reg_success'][15]['spanish']='';
$langdate['reg_success'][16]['english']='Firstname';
$langdate['reg_success'][16]['french']='Prénom';
$langdate['reg_success'][16]['dutch']='';
$langdate['reg_success'][16]['spanish']='';
$langdate['reg_success'][17]['english']='Surname';
$langdate['reg_success'][17]['french']='Nom';
$langdate['reg_success'][17]['dutch']='';
$langdate['reg_success'][17]['spanish']='';
$langdate['reg_success'][18]['english']='Organization/Company';
$langdate['reg_success'][18]['french']='Organisation/Entreprise';
$langdate['reg_success'][18]['dutch']='';
$langdate['reg_success'][18]['spanish']='';
$langdate['reg_success'][19]['english']='Email';
$langdate['reg_success'][19]['french']='Courriel';
$langdate['reg_success'][19]['dutch']='';
$langdate['reg_success'][19]['spanish']='';
$langdate['reg_success'][20]['english']='Phone number';
$langdate['reg_success'][20]['french']='Téléphone';
$langdate['reg_success'][20]['dutch']='';
$langdate['reg_success'][20]['spanish']='';
$langdate['reg_success'][21]['english']='Shipping address line1';
$langdate['reg_success'][21]['french']='Adresse de livraison 1';
$langdate['reg_success'][21]['dutch']='';
$langdate['reg_success'][21]['spanish']='';
$langdate['reg_success'][22]['english']='Shipping address line2';
$langdate['reg_success'][22]['french']='Adresse de livraison 2';
$langdate['reg_success'][22]['dutch']='';
$langdate['reg_success'][22]['spanish']='';
$langdate['reg_success'][23]['english']='Town/City';
$langdate['reg_success'][23]['french']='Ville';
$langdate['reg_success'][23]['dutch']='';
$langdate['reg_success'][23]['spanish']='';
$langdate['reg_success'][24]['english']='Postcode';
$langdate['reg_success'][24]['french']='Code Postal';
$langdate['reg_success'][24]['dutch']='';
$langdate['reg_success'][24]['spanish']='';
$langdate['reg_success'][25]['english']='Country';
$langdate['reg_success'][25]['french']='Pays';
$langdate['reg_success'][25]['dutch']='';
$langdate['reg_success'][25]['spanish']='';
$langdate['reg_success'][26]['english']='Register successfully! Please click';
$langdate['reg_success'][26]['french']='Enregistrement réussi! Cliquez';
$langdate['reg_success'][26]['dutch']='';
$langdate['reg_success'][26]['spanish']='';
$langdate['reg_success'][27]['english']='here';
$langdate['reg_success'][27]['french']='ici';
$langdate['reg_success'][27]['dutch']='';
$langdate['reg_success'][27]['spanish']='';
$langdate['reg_success'][28]['english']='to login';
$langdate['reg_success'][28]['french']='pour vous identifier';
$langdate['reg_success'][28]['dutch']='';
$langdate['reg_success'][28]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['reg_success'][0]);?></a>  - <a href="#" title=""><?php Lang::EchoString2($langdate['reg_success'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_box_t"></div>
			<div class="left_box_c">
				<div class="mt10">
<a href="/contactus/testimonial/index.php" title=""><img src="/rescources/images/03.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
<img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/>
<img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;" /></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img1.gif" width="30" height="30" alt="" />&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['reg_success'][2]);?></h3>
					<div class="online_from mt10">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                       <tr>
						<td><?php Lang::EchoString2($langdate['reg_success'][3]);?>:</td>
						<td colspan="3"><?php echo $client->LoginId ?></td>
					  </tr>
					  <tr>
						<td colspan="4"><span class="c_f30 fs14 fw"><?php Lang::EchoString2($langdate['reg_success'][4]);?>:</span></td>
						</tr>
					  <tr>
						<td width="186"><?php Lang::EchoString2($langdate['reg_success'][5]);?>:</td>
						<td width="206"><?php echo $client->FirstName ?> </td>
					    <td width="112"><?php Lang::EchoString2($langdate['reg_success'][6]);?>:</td>
					    <td width="206"><?php echo $client->SurName ?></td>
					  </tr>
					  <tr>
						<td> <?php Lang::EchoString2($langdate['reg_success'][7]);?>:</td>
						<td colspan="3"><?php echo $client->Company ?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['reg_success'][8]);?>:</td>
						<td colspan="3"><?php echo $client->Email ?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['reg_success'][9]);?>:</td>
						<td colspan="3"><?php echo $client->Telephone ?></td>
					  </tr>
					  <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][10]);?>:</td>
						<td colspan="3"><?php echo $client->AddressLineOne ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][11]);?>:</td>
						<td colspan="3"><?php echo $client->AddressLineTwo ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][12]);?>:</td>
						<td colspan="3"><?php echo $client->CityTown ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][13]);?>:</td>
						<td colspan="3"><?php echo $client->PostCode ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][14]);?>: </td>
						<td colspan="3"><?php $country = Common::GetCountryById($client->CountryId); echo $country ?></td>
					  </tr>
                      <tr>
					   <td colspan="4"><span class="c_f30 fs14 fw"><?php Lang::EchoString2($langdate['reg_success'][15]);?>: </span></td>
					  </tr>
                      <tr>
						<td width="186"><?php Lang::EchoString2($langdate['reg_success'][16]);?>:</td>
						<td width="206"><?php echo $receiver->FirstName ?></td>
					    <td width="112"><?php Lang::EchoString2($langdate['reg_success'][17]);?>:</td>
					    <td width="206"><?php echo $receiver->SurName ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][18]);?>:</td>
						<td colspan="3"><?php echo $receiver->Company ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][19]);?>:</td>
						<td colspan="3"><?php echo $receiver->Email ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][20]);?>:</td>
						<td colspan="3"><?php echo $receiver->Telephone ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][21]);?>:</td>
						<td colspan="3"><?php echo $receiver->AddressLineOne ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][22]);?>:</td>
						<td colspan="3"><?php echo $receiver->AddressLineTwo ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][23]);?>:</td>
						<td colspan="3"><?php echo $receiver->CityTown ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][24]);?>:</td>
						<td colspan="3"><?php echo $receiver->PostCode ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['reg_success'][25]);?>:</td>
						<td colspan="3">
							<?php $country2 = Common::GetCountryById($receiver->CountryId); echo $country2 ?></td>
					  </tr>
                       <tr>
						<td colspan="4"><span class="c_f30 fs14"><?php Lang::EchoString2($langdate['reg_success'][26]);?> <a href="/clients/clientLogin.php" title="" class="c_f60 tu"><?php Lang::EchoString2($langdate['reg_success'][27]);?></a> <?php Lang::EchoString2($langdate['reg_success'][28]);?>!</span></td>
					  </tr>
					</table>

				</div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>