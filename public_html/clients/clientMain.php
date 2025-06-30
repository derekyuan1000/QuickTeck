<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientBonusPointService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");

if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientMain.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$orderService = new OrderService();
$clientService = new ClientService();
$orderStatusService = new OrderStatusService();
$orderDetailService = new OrderDetailService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$orderArray = $orderService->GetOrdersByClientId($client->Id);

$messageService = new MessageService();
$unreadMessageArray = $messageService->GetUnreadMessagesByClientId($client->Id);
$voucherService = new VoucherService();
$unUsedvoucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1");


$clientBonusPointService = new ClientBonusPointService();
$bpArray3 = $clientBonusPointService->GetClientBonusPointsByClientId(3, $client->Id);
$bpArray1 = $clientBonusPointService->GetClientBonusPointsByClientId(1, $client->Id);

$now = date("Y-m-d H:i:s");
$date_mk = mktime();
$date_d = date("Y-m-d H:i:s",$date_mk);
$quarter = ceil((date('n', $date_mk))/3);
$beginDate = date('Y-m-d', mktime(0, 0, 0,$quarter*3-3+1,1,date('Y', $date_mk)));
$endDate = date('Y-m-d', mktime(23,59,59,$quarter*3,date('t',mktime(0, 0 , 0,$quarter*3,1,date("Y", $date_mk))),date('Y', $date_mk))); 
$endDateShow = date('d/m/Y', mktime(23,59,59,$quarter*3,date('t',mktime(0, 0 , 0,$quarter*3,1,date("Y", $date_mk))),date('Y', $date_mk))); 
$bpArrayExp = $clientBonusPointService->GetExpClientBonusPointsByClientId($client->Id, $endDate);

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
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturering,PCB prototype,PCB board manufacturer,online quote</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCB manufacturing at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../Management/Scripts/themes/base/jquery.ui.all.css">
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
	<script type="text/javascript" src="../Management/Scripts/external/jquery.bgiframe-2.1.2.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.mouse.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.draggable.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.position.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.resizable.js"></script>
	<script type="text/javascript" src="../Management/Scripts/ui/jquery.ui.dialog.js"></script>
	<script type="text/javascript">
		//var jq = jQuery.noConflict();
		$(document).ready(function() {
			$("#dialog:ui-dialog").dialog("destroy");
			$("[id^=dialog]").dialog({
				height: 600,
				width:800,
				autoOpen: false,
				modal: false
			});
		});
		
	function showDetail(id){
		$("#"+id).dialog("open");
	}
	function useBP(){
		var t = Math.random();
		if(confirm("Convert 10,000 loyalty points to a £30(up to 100% of the order amount) voucher?")){
		$.ajax({
			url:'clientUseBPs.php',
			data:{clientId: <?php echo $client->Id;?>, key : <?php echo "'".substr($client->Password,0,10)."'"; ?>, t: t},
			method: 'post',
			traditional: true,
			success:function(result){
				if(result == "1"){
					alert("Active a voucher successed");
					location.href="clientMain.php";
				}else{
					alert("Active a voucher failed");
				}
			}
		});
		}
	}
	</script>
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
                    <?php  if(count($bpArray3) > 0){ ?>
					<h3 class="title_main">You have earned <a href="#" onclick="showDetail('dialog')" style="text-decoration:underline; color:#f30;"><?php echo $bpArray3[0]->SurplusBPs?></a> loyalty points</h3>
					<?php }else{ ?>
					<h3 class="title_main">You have earned <a href="#" onclick="showDetail('dialog')" style="text-decoration:underline; color:#f30;">0</a> loyalty points</h3>
					<?php } ?>
					<div id="dialog" style="display:none">
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mess mt10">
						<thead>
							<tr>
								<th width="110" height="36">Counted Period</th>
								<th width="100">Updated date</th>
								<th width="100">Earned points</th>
								<th width="120">Used points</th>
								<th width="100">Remaining points</th>
								<th width="100">Expired date</th>
							</tr>
						<thead>
						<tbody>
						<?php 
						for($i=0; $i < count($bpArray1); $i++)
						{
							switch($bpArray1[$i]->Quarter){
								case 1:$quarterStr = "Q1";break;
								case 2:$quarterStr = "Q2";break;
								case 3:$quarterStr = "Q3";break;
								case 4:$quarterStr = "Q4";break;
							}
						?>
							<tr>
								<td><?php echo " ".$quarterStr." of ".$bpArray1[$i]->Year." "?></td>
								<td><?php echo Common::ChangeDateFormat($bpArray1[$i]->RecordTime1,"date");?></td>
								<td><?php echo $bpArray1[$i]->GetBPs;?></td>
								<td><?php echo $bpArray1[$i]->UseBPs;?></td>
								<td style="<?php if(Common::ChangeDateFormat($bpArray1[$i]->RecordTime2,"date") == $endDateShow){echo "color:red";}  ?>"><?php echo $bpArray1[$i]->SurplusBPs;?></td>
								<td style="<?php if(Common::ChangeDateFormat($bpArray1[$i]->RecordTime2,"date") == $endDateShow){echo "color:red";}  ?>"><?php echo Common::ChangeDateFormat($bpArray1[$i]->RecordTime2,"date");?></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
					<h5 style="color:#f30; margin-top:5px">Spend £<?php $spendBP = (ceil($bpArray3[0]->SurplusBPs/10000)*10000-$bpArray3[0]->SurplusBPs+$bpArrayExp[0]->SurplusBPs)/10; if($spendBP > 0){echo $spendBP;}else{echo 1000;}?> before <?php echo $endDateShow;?>, you will be eligible to get another voucher.</h5><br>
					<h5 style="color:#17202A; margin-top:5px">[1]The earned loyalty points will remain valid until the end of the next calendar year. 
					To avoid lost expired points, please convert points to a voucher(&pound;30,equal to a 3% discount) once your loyalty points reaches 10,000.</h5>
					<h5 style="color:#17202A; margin-top:5px">[2]£1 of your manufacturing spends equals to 10 points.
					£1 of the assembly spend equals to 3 points. £1 of the components spend equals to 2 points.</h5>
                    <h5 style="color:#17202A; margin-top:5px">[3]Loyalty points will be automatically calculated and list here quarterly(the first working day of the following quarter).</h5>
					</div>
					<?php if($bpArray3[0]->SurplusBPs >= 10000){ ?>
						<h3 class="title_main"><a href="#" style="text-decoration:underline; color:#f30;" onclick="useBP()">Convert points to voucher (10,000 points = £30)</a></h3>
					<?php } ?>
					
					<h3 class="title_main"></h3>
					<h3 class="title_main">Order List</h3>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="mess mt10">
						<thead>
							<tr>
								<th width="65" height="36"><?php Lang::EchoString2($langdate['clentMain'][7]);?></th>
								<th width="40"><?php Lang::EchoString2($langdate['clentMain'][8]);?></th>
								<th width="90"><?php Lang::EchoString2($langdate['clentMain'][9]);?></th>
								<th width="40"><?php Lang::EchoString2($langdate['clentMain'][10]);?></th>
								<th width="50"><?php Lang::EchoString2($langdate['clentMain'][11]);?></th>
								<th width="70"><?php Lang::EchoString2($langdate['clentMain'][12]);?></th>
								<th width="100"><?php Lang::EchoString2($langdate['clentMain'][13]);?></th>
								<th width="100"><?php Lang::EchoString2($langdate['clentMain'][17]);?></th>
								<th width="100"><?php Lang::EchoString2($langdate['clentMain'][14]);?></th>
							 	<th width="80"><?php Lang::EchoString2($langdate['clentMain'][15]);?></th>
						</tr>
						<thead>
						<tbody>
						<?php 
						for($i=0; $i < count($orderArray); $i++)
						{
							$orderDetailArray = $orderDetailService->GetOrderDetailByOrderId($orderArray[$i]->Id);
							if(count($orderDetailArray)>0){
								$orderDetail = $orderDetailArray[0];
							}
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
								<td>
								<?php echo $orderArray[$i]->Quantity;?>
								</td>
								<td>
								<?php 
									if($orderArray[$i]->IsPaid==1){
										echo "Yes";
									}else if($orderArray[$i]->IsPaid==0){
										echo "No";	
									}else if($orderArray[$i]->IsPaid==2){
										echo "Partly";
									}
								?>
								</td>
								<td>
									<?php echo $orderArray[$i]->TotalPrice;?>
								</td>
								<td>
								<?php 
									/*$clientId = $orderArray[$i]->ClientId;
									$client = $clientService->GetClientById($clientId);
									echo $client->Contact;*/
									echo $orderArray[$i]->FirstName." ".$orderArray[$i]->SurName;
								?>
								</td>
								<td style="width:130px;word-wrap:break-word;">
								<?php 
									echo $orderDetail->Varchar3;
								?>
								</td>
								<td  style="width:120px;">
								<?php 
									$orderStatusId = $orderArray[$i]->OrderStatusId;
									$orderStatus = $orderStatusService->GetOrderStatusById($orderStatusId);
									echo $orderStatus->Status;;
								?>
								</td>
								<td><a href="orderDetail_client.php?number=<?php echo $orderArray[$i]->Number ?>&key=<?php echo $orderArray[$i]->Remark ?>" title="" style="color:blue; text-decoration:underline">Details</a></td>
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