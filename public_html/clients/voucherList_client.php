<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "voucherList_client.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$clientService = new ClientService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$voucherService = new VoucherService();
$voucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1,2");
$unUsedvoucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
$messageService = new MessageService();
$unreadMessageArray = $messageService->GetUnreadMessagesByClientId($client->Id);
$langdate['clientVoucher'][0]['english']='Home';
$langdate['clientVoucher'][0]['french']='Accueil';
$langdate['clientVoucher'][0]['dutch']='';
$langdate['clientVoucher'][0]['spanish']='';
$langdate['clientVoucher'][1]['english']='My Quick-teck';
$langdate['clientVoucher'][1]['french']='Mon compte Quick-teck';
$langdate['clientVoucher'][1]['dutch']='';
$langdate['clientVoucher'][1]['spanish']='';
$langdate['clientVoucher'][2]['english']='Order list';
$langdate['clientVoucher'][2]['french']='Liste de commandes';
$langdate['clientVoucher'][2]['dutch']='';
$langdate['clientVoucher'][2]['spanish']='';
$langdate['clientVoucher'][3]['english']='Change password';
$langdate['clientVoucher'][3]['french']='Changer le mot de passe';
$langdate['clientVoucher'][3]['dutch']='';
$langdate['clientVoucher'][3]['spanish']='';
$langdate['clientVoucher'][4]['english']='My Profile';
$langdate['clientVoucher'][4]['french']='Mon profil';
$langdate['clientVoucher'][4]['dutch']='';
$langdate['clientVoucher'][4]['spanish']='';
$langdate['clientVoucher'][5]['english']='Voucher';
$langdate['clientVoucher'][5]['french']='Bon de réduction';
$langdate['clientVoucher'][5]['dutch']='';
$langdate['clientVoucher'][5]['spanish']='';
$langdate['clientVoucher'][6]['english']='Message';
$langdate['clientVoucher'][6]['french']='Message';
$langdate['clientVoucher'][6]['dutch']='';
$langdate['clientVoucher'][6]['spanish']='';
$langdate['clientVoucher'][7]['english']='Voucher List';
$langdate['clientVoucher'][7]['french']='Liste des bons de réduction';
$langdate['clientVoucher'][7]['dutch']='';
$langdate['clientVoucher'][7]['spanish']='';
$langdate['clientVoucher'][8]['english']='Voucher Number';
$langdate['clientVoucher'][8]['french']='Code du bon de réduction';
$langdate['clientVoucher'][8]['dutch']='';
$langdate['clientVoucher'][8]['spanish']='';
$langdate['clientVoucher'][9]['english']='Details';
$langdate['clientVoucher'][9]['french']='Détails';
$langdate['clientVoucher'][9]['dutch']='';
$langdate['clientVoucher'][9]['spanish']='';
$langdate['clientVoucher'][10]['english']='Expired Time';
$langdate['clientVoucher'][10]['french']='Date expirée';
$langdate['clientVoucher'][10]['dutch']='';
$langdate['clientVoucher'][10]['spanish']='';
$langdate['clientVoucher'][11]['english']='/rescources/images/banner02.jpg';
$langdate['clientVoucher'][11]['french']='/rescources/images/banner02_fr.jpg';
$langdate['clientVoucher'][11]['dutch']='';
$langdate['clientVoucher'][11]['spanish']='';
$langdate['clientVoucher'][12]['english']='Used';
$langdate['clientVoucher'][12]['french']='Valide';
$langdate['clientVoucher'][12]['dutch']='';
$langdate['clientVoucher'][12]['spanish']='';
$langdate['clientVoucher'][13]['english']='Yes';
$langdate['clientVoucher'][13]['french']='Oui';
$langdate['clientVoucher'][13]['dutch']='';
$langdate['clientVoucher'][13]['spanish']='';
$langdate['clientVoucher'][14]['english']='No';
$langdate['clientVoucher'][14]['french']='Non';
$langdate['clientVoucher'][14]['dutch']='';
$langdate['clientVoucher'][14]['spanish']='';
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
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['clientVoucher'][11]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['clientVoucher'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['clientVoucher'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['clientVoucher'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/clients/clientMain.php" title="" ><?php Lang::EchoString2($langdate['clientVoucher'][2]);?></a></li>
						<li><a href="/clients/clientModifyPassword.php" title=""><?php Lang::EchoString2($langdate['clientVoucher'][3]);?></a></li>
						<li><a href="/clients/clientInformation.php" title=""><?php Lang::EchoString2($langdate['clientVoucher'][4]);?></a></li>
						<li><a href="/clients/voucherList_client.php" title="" class="on"><?php Lang::EchoString2($langdate['clientVoucher'][5]);?>(<?php echo count($unUsedvoucherArray)?>)</a></li>
						<li><a href="/clients/messageList_client.php" title=""><?php Lang::EchoString2($langdate['clientVoucher'][6]);?>(<?php echo count($unreadMessageArray)?>)</a></li>
					</ul>
				</div>
				<div class="mt10">
	<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
<a href="/News/Atrcles.php" title=""><img src="/rescources/leftpic/08.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/></a>
				<a href="/PayMethod.php" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;" /></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['clientVoucher'][7]);?></h3>

					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mess mt10">
						<thead>
							<tr>
								<th  width="205" height="36"><?php Lang::EchoString2($langdate['clientVoucher'][8]);?></th>
						        <th width="269" ><?php Lang::EchoString2($langdate['clientVoucher'][9]);?></th>
						        <th width="229"> <?php Lang::EchoString2($langdate['clientVoucher'][12]);?></th>
						        <th width="229"> <?php Lang::EchoString2($langdate['clientVoucher'][10]);?></th>
						  </tr>
						<thead>
						<tbody>
						<?php 
						$now = date("Y-m-d H:i:s");
						for($i=0; $i < count($voucherArray); $i++)
						{
							//if($voucherArray[$i]->ExpiredTime >= $now)
							//{
						?>
							<tr>
								<td><?php echo $voucherArray[$i]->Number?></td>
								<td><?php echo ceil($voucherArray[$i]->Percent)."%(Up to &pound;".$voucherArray[$i]->MaxPrice.")"?></td>
								<td>
								<?php
									if($voucherArray[$i]->Status == 1){
										Lang::EchoString2($langdate['clientVoucher'][14]);
									}else if($voucherArray[$i]->Status == 2){
										Lang::EchoString2($langdate['clientVoucher'][13]);
									}
								?>
								</td>
								<td><?php echo Common::ChangeDateFormat($voucherArray[$i]->ExpiredTime,"date");?></td>
							</tr>
						<?php 
							//}
						}
						?>
							
						</tbody>
					</table>
					
  </div>


		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>