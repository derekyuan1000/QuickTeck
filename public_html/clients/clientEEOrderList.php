<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientEEOrderList.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$eeOrderService = new EEOrderService();
$clientService = new ClientService();
$eeOrderStatusService = new EEOrderStatusService();
$eeOrderDetailService = new EEOrderDetailService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$orderArray = $eeOrderService->GetEEOrdersByClientId($client->Id);
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
$messageService = new MessageService();
$unreadMessageArray = $messageService->GetUnreadMessagesByClientId($client->Id);
$voucherService = new VoucherService();
$unUsedvoucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1");
$langdate['clentMain'][0]['english']='Home';
$langdate['clentMain'][0]['french']='Accueil';
$langdate['clentMain'][0]['dutch']='';
$langdate['clentMain'][0]['spanish']='';
$langdate['clentMain'][1]['english']='My Quick-teck';
$langdate['clentMain'][1]['french']='Mon compte Quick-teck';
$langdate['clentMain'][1]['dutch']='';
$langdate['clentMain'][1]['spanish']='';
$langdate['clentMain'][2]['english']='Order list';
$langdate['clentMain'][2]['french']='Liste de commandes';
$langdate['clentMain'][2]['dutch']='';
$langdate['clentMain'][2]['spanish']='';
$langdate['clentMain'][3]['english']='Change password';
$langdate['clentMain'][3]['french']='Changer le mot de passe';
$langdate['clentMain'][3]['dutch']='';
$langdate['clentMain'][3]['spanish']='';
$langdate['clentMain'][4]['english']='My Profile';
$langdate['clentMain'][4]['french']='Mon profil';
$langdate['clentMain'][4]['dutch']='';
$langdate['clentMain'][4]['spanish']='';
$langdate['clentMain'][5]['english']='Voucher';
$langdate['clentMain'][5]['french']='Bon de réduction';
$langdate['clentMain'][5]['dutch']='';
$langdate['clentMain'][5]['spanish']='';
$langdate['clentMain'][6]['english']='Message';
$langdate['clentMain'][6]['french']='Message';
$langdate['clentMain'][6]['dutch']='';
$langdate['clentMain'][6]['spanish']='';
$langdate['clentMain'][7]['english']='Number';
$langdate['clentMain'][7]['french']='Numéro';
$langdate['clentMain'][7]['dutch']='';
$langdate['clentMain'][7]['spanish']='';
$langdate['clentMain'][8]['english']='WDs';
$langdate['clentMain'][8]['french']='Jours Ouvrés';
$langdate['clentMain'][8]['dutch']='';
$langdate['clentMain'][8]['spanish']='';
$langdate['clentMain'][9]['english']='Target date';
$langdate['clentMain'][9]['french']='Date de livraison souhaitée';
$langdate['clentMain'][9]['dutch']='';
$langdate['clentMain'][9]['spanish']='';
$langdate['clentMain'][10]['english']='Qty';
$langdate['clentMain'][10]['french']='Quantité';
$langdate['clentMain'][10]['dutch']='';
$langdate['clentMain'][10]['spanish']='';
$langdate['clentMain'][11]['english']='Paid';
$langdate['clentMain'][11]['french']='Déjà payé';
$langdate['clentMain'][11]['dutch']='';
$langdate['clentMain'][11]['spanish']='';
$langdate['clentMain'][12]['english']='Amount';
$langdate['clentMain'][12]['french']='Montant';
$langdate['clentMain'][12]['dutch']='';
$langdate['clentMain'][12]['spanish']='';
$langdate['clentMain'][13]['english']='Contact name';
$langdate['clentMain'][13]['french']='Nom du contact';
$langdate['clentMain'][13]['dutch']='';
$langdate['clentMain'][13]['spanish']='';
$langdate['clentMain'][14]['english']='Order status';
$langdate['clentMain'][14]['french']='Situation de la commande';
$langdate['clentMain'][14]['dutch']='';
$langdate['clentMain'][14]['spanish']='';
$langdate['clentMain'][15]['english']='Details';
$langdate['clentMain'][15]['french']='Détails';
$langdate['clentMain'][15]['dutch']='';
$langdate['clentMain'][15]['spanish']='';
$langdate['clentMain'][16]['english']='/rescources/images/banner02.jpg';
$langdate['clentMain'][16]['french']='/rescources/images/banner02_fr.jpg';
$langdate['clentMain'][16]['dutch']='';
$langdate['clentMain'][16]['spanish']='';
$langdate['clentMain'][17]['english']='Manufacutre data';
$langdate['clentMain'][17]['french']='fichier de circuit imprimé';
$langdate['clentMain'][17]['dutch']='';
$langdate['clentMain'][17]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturering,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCB manufacturing at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['clentMain'][16]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['clentMain'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['clentMain'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['clentMain'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/clients/clientMain.php" title="" class="on"><?php Lang::EchoString2($langdate['clentMain'][2]);?></a></li>
						<li><a href="/clients/clientModifyPassword.php" title=""><?php Lang::EchoString2($langdate['clentMain'][3]);?></a></li>
						<li><a href="/clients/clientInformation.php" title=""><?php Lang::EchoString2($langdate['clentMain'][4]);?></a></li>
						<li><a href="/clients/voucherList_client.php" title=""><?php Lang::EchoString2($langdate['clentMain'][5]);?>(<?php echo count($unUsedvoucherArray)?>)</a></li>
						<li><a href="/clients/messageList_client.php" title=""><?php Lang::EchoString2($langdate['clentMain'][6]);?>(<?php echo count($unreadMessageArray)?>)</a></li>
					</ul>
				</div>
				<div class="mt10">
					<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
<a href="/aboutus/why_us.php" title=""><img src="/rescources/leftpic/04.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/></a>
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
					<h3 class="title_main">Order List</h3>

					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mess mt10">
						<thead>
							<tr>
								<th width="65" height="36"><?php Lang::EchoString2($langdate['clentMain'][7]);?></th>
								<th width="40"><?php Lang::EchoString2($langdate['clentMain'][8]);?></th>
								<th width="90"><?php Lang::EchoString2($langdate['clentMain'][9]);?></th>
								<th width="50"><?php Lang::EchoString2($langdate['clentMain'][11]);?></th>
								<th width="70"><?php Lang::EchoString2($langdate['clentMain'][12]);?></th>
								<th width="100"><?php Lang::EchoString2($langdate['clentMain'][13]);?></th>
								<th width="100"><?php Lang::EchoString2($langdate['clentMain'][14]);?></th>
							 	<th width="80"><?php Lang::EchoString2($langdate['clentMain'][15]);?></th>
		</tr>
						<thead>
						<tbody>
						<?php 
						for($i=0; $i < count($orderArray); $i++)
						{
						?>
							<tr>
								<td><?php echo $orderArray[$i]->Number;?></td>
								<td>
								<?php echo $orderArray[$i]->WorkingDays;?>
								</td>
								<td>
								<?php 
									//$targetDate = explode(' ', $orderArray[$i]->TargetDate);
									//echo Common::ChangeDateFormat($targetDate[0],"date");
									echo date("d/m/Y",strtotime($orderArray[$i]->TargetDate));
								?>
								</td>
								<td><span class="c_red">
								<?php 
									if($orderArray[$i]->IsPaid==1){
										echo "Yes";
									}else if($orderArray[$i]->IsPaid==0){
										echo "No";	
									}else if($orderArray[$i]->IsPaid==2){
										echo "Partly";
									}
								?>
								</span></td>
								<td>
								<span class="c_red">
									<?php echo $orderArray[$i]->TotalPrice;?>
								</span>
								</td>
								<td>
								<?php 
									/*$clientId = $orderArray[$i]->ClientId;
									$client = $clientService->GetClientById($clientId);
									echo $client->Contact;*/
									echo $orderArray[$i]->FirstName2." ".$orderArray[$i]->SurName2;
								?>
								</td>
								<td>
								<?php 
									$eeOrderStatusId = $orderArray[$i]->EEOrderStatusId;
									$eeOrderStatus = $eeOrderStatusService->GetEEOrderStatusById($eeOrderStatusId);
									echo $eeOrderStatus->Status;;
								?>
								</td>
								<td><a href="clientEEOrderDetail.php?number=<?php echo $orderArray[$i]->Number ?>&key=<?php echo $orderArray[$i]->SystemRandomCode ?>" title="" target='_blank'>Details</a></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
					
  </div>


		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>