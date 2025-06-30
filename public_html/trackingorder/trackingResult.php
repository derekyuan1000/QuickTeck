<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExpressService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ParcelInfoService_Class.php");

$number = trim($_POST[number]);
$random = trim($_POST[random]);

$holidayService = new HolidayService();
$parcelInfoService = new ParcelInfoService();
if(strlen($number)==9 && substr($number, 2, 1) == "P"){
	$eeOrderService = new EEOrderService();
	$eeOrderDetailService = new EEOrderDetailService();
	$eeOrder = $eeOrderService->GetEEOrderByNumber($number);
	$eeOrderDetailArray = $eeOrderDetailService->GetOrderDetailByOrderId($eeOrder->Id);
}else{
	$orderService = new OrderService();
	
	$order = $orderService->GetOrderByNumber($number);
	
	$dateArray45 = $holidayService->GetTargetDay($order->OrderTime, 45);
	$date45 =  $dateArray45[count($dateArray45)-1]->BasicDate;
	
	$now1 = strtotime(date("Y-m-d"));
	
	$datediff45 = (strtotime($date45) - $now1);
	if($datediff45 < 0){
		unset($order);
	}
}

$langdate['trackingOrder'][0]['english']='Home';
$langdate['trackingOrder'][0]['french']='Accueil';
$langdate['trackingOrder'][0]['dutch']='';
$langdate['trackingOrder'][0]['spanish']='';
$langdate['trackingOrder'][1]['english']='Tracking order';
$langdate['trackingOrder'][1]['french']='Suivi de commande';
$langdate['trackingOrder'][1]['dutch']='';
$langdate['trackingOrder'][1]['spanish']='';
$langdate['trackingOrder'][2]['english']=' Order information';
$langdate['trackingOrder'][2]['french']=' Détails de la commande';
$langdate['trackingOrder'][2]['dutch']='';
$langdate['trackingOrder'][2]['spanish']='';
$langdate['trackingOrder'][3]['english']='Firstname';
$langdate['trackingOrder'][3]['french']='Prénom';
$langdate['trackingOrder'][3]['dutch']='';
$langdate['trackingOrder'][3]['spanish']='';
$langdate['trackingOrder'][4]['english']='Surname';
$langdate['trackingOrder'][4]['french']='Nom';
$langdate['trackingOrder'][4]['dutch']='';
$langdate['trackingOrder'][4]['spanish']='';
$langdate['trackingOrder'][5]['english']='Client email';
$langdate['trackingOrder'][5]['french']='Courriel';
$langdate['trackingOrder'][5]['dutch']='';
$langdate['trackingOrder'][5]['spanish']='';
$langdate['trackingOrder'][6]['english']='Delivery address line';
$langdate['trackingOrder'][6]['french']='Adresse de livraison';
$langdate['trackingOrder'][6]['dutch']='';
$langdate['trackingOrder'][6]['spanish']='';
$langdate['trackingOrder'][7]['english']='Order date';
$langdate['trackingOrder'][7]['french']='Date de commande';
$langdate['trackingOrder'][7]['dutch']='';
$langdate['trackingOrder'][7]['spanish']='';
$langdate['trackingOrder'][8]['english']='Expected delivery date';
$langdate['trackingOrder'][8]['french']='Date de livraison prévue';
$langdate['trackingOrder'][8]['dutch']='';
$langdate['trackingOrder'][8]['spanish']='';
$langdate['trackingOrder'][9]['english']='Order status';
$langdate['trackingOrder'][9]['french']='Situation de la commande';
$langdate['trackingOrder'][9]['dutch']='';
$langdate['trackingOrder'][9]['spanish']='';
$langdate['trackingOrder'][10]['english']='Tracking number';
$langdate['trackingOrder'][10]['french']='Numéro de suivi';
$langdate['trackingOrder'][10]['dutch']='';
$langdate['trackingOrder'][10]['spanish']='';
$langdate['trackingOrder'][11]['english']='You can track your parcel status by logging into the below link';
$langdate['trackingOrder'][11]['french']='Vous pouvez suivre la situation de votre commande en vous connectant via le lien ci-dessous';
$langdate['trackingOrder'][11]['dutch']='';
$langdate['trackingOrder'][11]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB manufacturing UK,Low cost printed circuit board manufacturer,PCB prototype assembly,PCB board manufacturing,PCB online quote UK</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer production PCBs at low price in UK, PCB manufacturing PCB assembly." />
<meta name="keywords" content="PCB manufacturing, printed circuit board assembly from UK, printed circuit board manufacturer, PCB prototype to multilayer volume production PCBs at low price UK, PCB assembly." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="../rescources/css/flowstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['trackingOrder'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['trackingOrder'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_box_t"></div>
			<div class="left_box_c">
				<div class="mt10">
				<a href="/onlinequote/assembly_quoteB.php" title="PCB assembly quote" target="_blank"><img src="/rescources/images/assembly_quote.jpg" width="233" height="150" alt="" class="ml10" style="margin-top:10px;"/></a>
					<img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;" />
					<a href="/contactus/testimonial/index.php" title=""><img src="/rescources/images/03.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/News/Atrcles.php" title=""><img src="/rescources/leftpic/08.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
                    <a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="quick-teck twitter" /></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="quick-teck facebook" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
				<?php
				if(!$order && !$eeOrder){
					echo '<div style="font-size:14px; font-weight:bold; color:red">Invalid Order Number!</div>';
				}else{
					if($random== "" || ($order->ClientRandomCode != $random && $eeOrder->ClientRandomCode != $random)){
						echo '<div style="font-size:14px; font-weight:bold; color:red">Invalid Reference Number!</div>';
					}else{
						if(strlen($number)==9 && substr($number, 2, 1) == "P"){
			?>
					<h3 class="title_main"><?php echo $eeOrder->Number ?><?php Lang::EchoString2($langdate['trackingOrder'][2]);?></h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                       <tr>
						<td colspan="4"><span class="c_f30 fs14 fw">Billing Information</span></td>
					  </tr>
					  <tr>
						<td width="186">Firstname:</td>
						<td width="206"><?php echo $eeOrder->FirstName1?></td>
					    <td width="112">Sumame:</td>
					    <td width="206"><?php echo $eeOrder->SurName1 ?></td>
					  </tr>
					  <tr>
						<td>Organization/Company:</td>
						<td colspan="3"><?php echo $eeOrder->Company1 ?></td>
					  </tr>
					  <tr>
						<td>Email:</td>
						<td colspan="3"><?php echo $eeOrder->Email1 ?></td>
					  </tr>
					  <tr>
						<td>Phone unmber:</td>
						<td colspan="3"><?php echo $eeOrder->Telephone1 ?></td>
					  </tr>
					  <tr>
					   <td>Billing address line1:</td>
						<td colspan="3"><?php echo $eeOrder->AddressLineOne1; ?> </td>
					  </tr>
                      <tr>
					   <td>Billing address line2:</td>
						<td colspan="3"><?php echo $eeOrder->AddressLineTwo1; ?> </td>
					  </tr>
                      <tr>
					   <td>Town/City:</td>
						<td colspan="3"><?php echo $eeOrder->CityTown1; ?> </td>
					  </tr>
                      <tr>
					   <td>Postcode:</td>
						<td colspan="3"><?php echo $eeOrder->Postcode1; ?> </td>
					  </tr>
                      <tr>
					   <td>Country:</td>
						<td colspan="3"><?php $country = Common::GetCountryById($eeOrder->CountryId1); echo $country;?></td>
					  </tr>
					  <tr>
						<td colspan="4"><span class="c_f30 fs14 fw">Shipping Information</span></td>
					  </tr>
					  <tr>
						<td width="186">Firstname:</td>
						<td width="206"><?php echo $eeOrder->FirstName2?></td>
					    <td width="112">Sumame:</td>
					    <td width="206"><?php echo $eeOrder->SurName2 ?></td>
					  </tr>
					  <tr>
						<td>Organization/Company:</td>
						<td colspan="3"><?php echo $eeOrder->Company2 ?></td>
					  </tr>
					  <tr>
						<td>Email:</td>
						<td colspan="3"><?php echo $eeOrder->Email2 ?></td>
					  </tr>
					  <tr>
						<td>Phone unmber:</td>
						<td colspan="3"><?php echo $eeOrder->Telephone2 ?></td>
					  </tr>
					  <tr>
					   <td>Billing address line1:</td>
						<td colspan="3"><?php echo $eeOrder->AddressLineOne2; ?> </td>
					  </tr>
                      <tr>
					   <td>Billing address line2:</td>
						<td colspan="3"><?php echo $eeOrder->AddressLineTwo2; ?> </td>
					  </tr>
                      <tr>
					   <td>Town/City:</td>
						<td colspan="3"><?php echo $eeOrder->CityTown2; ?> </td>
					  </tr>
                      <tr>
					   <td>Postcode:</td>
						<td colspan="3"><?php echo $eeOrder->Postcode2; ?> </td>
					  </tr>
                      <tr>
					   <td>Country:</td>
						<td colspan="3"><?php $country = Common::GetCountryById($eeOrder->CountryId2); echo $country;?></td>
					  </tr>
						<tr>
					   <td>Order Date:</td>
						<td colspan="3"> <?php $orderTime = explode(' ', $eeOrder->OrderTime); echo Common::ChangeDateFormat($orderTime[0],"date");?></td>
					  </tr>
                      <tr>
					   <td>Expected delivery date:</td>
						<td colspan="3"><?php $targetDate = explode(' ', $eeOrder->TargetDate); echo Common::ChangeDateFormat($targetDate[0],"date"); ?></td>
					  </tr>
					</table>
					
					
					<table class="table1" border="0" cellpadding="0" cellspacing="0" width="550px">
						<tr style="background-color:#EFF7FF; font-weight:bold">
							<td style="height: 20px; width:30px">
								No</td>
							<td style="width:290px">
								Name</td>
							<td style="width:80px">
								Price</td>
							<td style="width:60px">
								Quantity</td>
							<td style="width:90px">
								Total</td>
						</tr>                
							<?php  
								for($i=0; $i < count($eeOrderDetailArray); $i++)
								{
							?>
								<tr>
									<td style="height: 20px; padding-left:5px">
										<?php 
											echo $i+1;
										?>
									</td>
									<td style="text-align:left; padding-left:10px">
										<?php 
											echo "<a href='../ElectronicElement/eeDetail.php?eeId=".$eeOrderDetailArray[$i]->EEOrderId."' target='_blank'>".$eeOrderDetailArray[$i]->EEName."</a>";
										?>
									</td>
									<td style="color:red; font-weight:bold">
										<?php 
											echo "&pound;".$eeOrderDetailArray[$i]->Price;
										?>
									</td>
									<td>
										<?php echo $eeOrderDetailArray[$i]->Quantity;?>
									</td>
									<td>
										<?php 
											echo "&pound;".$eeOrderDetailArray[$i]->TotalPrice;
										?>
									</td>
								</tr>
							<?php  
							}
							?>
							<tr style="background-color:#EFF7FF">
								<td colspan="5" style="height: 20px; text-align: left; padding-left:430px">
									Total Price:&nbsp;<span style="color:Red; font-weight:bold;">&pound;<?php echo $eeOrder->TotalPrice; ?>
								</td>
							</tr>
					</table>
					<h3 class="title_main tc mt10"><?php Lang::EchoString2($langdate['trackingOrder'][9]);?></h3>
					<?php 
					$eeOrderProcessingService = new EEOrderProcessingService();
					$allOrderProcessings = $eeOrderProcessingService->GetEEOrderProcessingByOrderId($eeOrder->Id);
					for($i=0; $i < count($allOrderProcessings); $i++)
					{
					?>
					<p class="tc mt10" style="border:1px solid #ccc; height:30px;line-height:30px;"><span style=" width:300px;border-right:1px solid #ccc; height:30px;display:block;float:left;"> <?php echo Common::ChangeDateFormat($allOrderProcessings[$i]->ProcessTime,"dateTime"); ?></span>  
						<?php 
						$eeOrderStatusService = new EEOrderStatusService(); 
						$orderStatus=$eeOrderStatusService->GetEEOrderStatusById($allOrderProcessings[$i]->StatusId);
						echo $orderStatus->Status; 
						?>
					</p>
					<?php 
					}
					?>
					<?php
					if($eeOrder->OrderStatusId >= 6)
					{
					?>
							
					<table width="100%" border="0" cellspacing="0" cellpadding="0" >
						<tr colspan="2"><td><span class="c_f30 fs14 fw">Delivery tracking</span></td></tr>
						<tr >
							<td >
								<b>Tracking number:</b>
							</td>
							<td>
								<?php echo $eeOrder->ExpressNumber; ?>
							</td>
						</tr>
						<tr >
							<td colspan="2">
								You can track your parcel status by logging into the below link:<br/>
						<?php 
							$expressService = new ExpressService(); 
							$express = $expressService->GetExpressById($eeOrder->ExpressId);
							$expressTrackingPage = $express->TrackingPage;
							$expressHomePage = $express->expressHomePage;
							if(!$expressTrackingPage){
								$expressTrackingPage = $expressHomePage;
							}
							echo "<a href='".$expressTrackingPage."' target='_blank'>".$expressTrackingPage."</a>";
						?>
							</td>
						</tr>
					</table>
			<?php
					}				
				}else{
			?>
			<h3 class="title_main"><?php echo $order->Number ?><?php Lang::EchoString2($langdate['trackingOrder'][2]);?></h3>
			<div class="online_from mt10">
				<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
				  <tr>
					<td class="w_168"><?php Lang::EchoString2($langdate['trackingOrder'][3]);?>:</td>
					<td><?php $clientService = new ClientService(); $client = $clientService->GetClientById($order->ClientId); echo $client->FirstName;?></td>
				  </tr>
				  <tr>
					<td class="w_168"> <?php Lang::EchoString2($langdate['trackingOrder'][4]);?>:</td>
					<td><?php echo $client->SurName;?></td>
				  </tr>
				   <tr>
					<td class="w_168"><?php Lang::EchoString2($langdate['trackingOrder'][5]);?>:</td>
					<td><?php echo $client->Email ?></td>
				  </tr>
				   <tr>
					<td class="w_168"><?php Lang::EchoString2($langdate['trackingOrder'][6]);?>1:</td>
					<td><?php echo nl2br($order->AddressLineOne); ?></td>
				  </tr>
				   <tr>
					<td class="w_168"><?php Lang::EchoString2($langdate['trackingOrder'][6]);?>2:</td>
					<td><?php echo nl2br($order->AddressLineTwo); ?></td>
				  </tr>
				   <tr>
					<td class="w_168"> <?php Lang::EchoString2($langdate['trackingOrder'][7]);?>:</td>
					<td><?php $orderTime = explode(' ', $order->OrderTime); echo Common::ChangeDateFormat($orderTime[0],"date");?></td>
				  </tr>
				   <tr>
					<td class="w_168"><?php Lang::EchoString2($langdate['trackingOrder'][8]);?>:</td>
					<td><?php $targetDate = explode(' ', $order->TargetDate); echo Common::ChangeDateFormat($targetDate[0],"date"); ?></td>
				  </tr>
				</table>
			</div>

			<h3 class="title_main tc mt10"><?php Lang::EchoString2($langdate['trackingOrder'][9]);?></h3>
				<?php
				$orderProcessingService = new OrderProcessingService();
				$orderStatusService = new OrderStatusService(); 
				$expressService = new ExpressService(); 
				$parcelInfo = $parcelInfoService->GetParcelInfoByOrderNumber($order->Number);
				if($order->IsAssembly!=1){
				?>
			<div class="online_from mt10">
				<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
				<?php 
				$allOrderProcessings = $orderProcessingService->GetOrderProcessingByOrderId($order->Id,1);
				if($order->IsAssembly!=1){
					for($i=0; $i < count($allOrderProcessings); $i++)
					{
				?>
				  <tr>
					<td class="w_168"><?php echo Common::ChangeDateFormat($allOrderProcessings[$i]->ProcessTime,"dateTime"); ?>	</td>
					<td>
					<?php 
						$orderStatus=$orderStatusService->GetOrderStatusById($allOrderProcessings[$i]->StatusId);
						echo $orderStatus->Status; 
						if($orderStatus->Id==5){
							if($parcelInfo->ExpressId){
								$express = $expressService->GetExpressById($parcelInfo->ExpressId);
								echo "&nbsp;&nbsp;(".$express->Name.", Int'l tracking no: " .$parcelInfo->TrackingNumber.")";
							}
							
						}
					?>
					</td>
				  </tr>
				<?php 
					}
				}
				?>
				<?php 
				if($order->OrderStatusId == 6 || $order->OrderStatusId == 7){
				?>
				   <tr>
					<td class="w_168"><?php Lang::EchoString2($langdate['trackingOrder'][10]);?>:</td>
					<td><?php echo $order->ExpressNumber; ?></td>
				  </tr>
				   <tr>
					<td colspan="2" >
						<p><?php Lang::EchoString2($langdate['trackingOrder'][11]);?>:</p>
						<p class="mt5">
					
						<?php 
								$express = $expressService->GetExpressById($order->ExpressId);
								$expressTrackingPage = $express->TrackingPage;
								$expressHomePage = $express->expressHomePage;
								if(!$expressTrackingPage){
									$expressTrackingPage = $expressHomePage;
								}
								echo "<a href='".$expressTrackingPage."' target='_blank' class='c_f60'>".$expressTrackingPage."</a>";
						?>
						</p>
					</td>
				  </tr>
				<?php }?>
				</table>
			</div>
			
			<?php
			}
			$orderStatus=$orderStatusService->GetOrderStatusById($order->OrderStatusId);
			if($order->CSStatusId){
				$CSStatus=$orderStatusService->GetOrderStatusById($order->CSStatusId);
			}
			if($order->CustomerCSStatusId){
				$CustomerCSStatus=$orderStatusService->GetOrderStatusById($order->CustomerCSStatusId);
			}
			?>
			
			<script>
			$(document).ready(function() {
				var a = <?php echo $orderStatus->SortId; ?>;
				if (a != null && $.isNumeric(a)) {
					while (a > 0) {
						$("#a" + a).attr("class", $("#a" + a).attr("class") + "-2");
						a--;
					}
				}
				var b = <?php echo $CustomerCSStatus->SortId?$CustomerCSStatus->SortId:0; ?>;
				if (b != null && $.isNumeric(b)) {
					while (b > 0) {
						$("#b" + b).attr("class", $("#b" + b).attr("class") + "-2");
						b--;
					}
				}
				var c = <?php echo $CSStatus->SortId?$CSStatus->SortId:0; ?>;
				if (c != null && $.isNumeric(c)) {
					while (c > 0) {
						$("#c" + c).attr("class", $("#c" + c).attr("class") + "-2");
						c--;
					}
				}

			}); 
			</script>
			<?php 
			if($order->IsAssembly==1){
				if($order->CSTypeId == 1){
					include 'Orderflow1.php';
				}else if($order->CSTypeId == 2){
					include 'Orderflow2.php';
				}else if($order->CSTypeId == 3){
					include 'Orderflow3.php';
				}else{
					include 'Orderflow1.php';
				}
			}
			
			if (file_exists("../Management/UploadFiles/".$order->Id.".pdf")){
				echo '<p class="tc mt10"><a target="_blank" style="font-size:14px; font-weight:bold; color:blue;text-decoration:underline" href="../clients/doDownloadInvoice.php?number='.$order->Number.'&key='.$order->Remark.'">Download invoice</a></p>';
			}
		}
	}
}
			?>
		</div>
		<div class="clear"></div>
	</div>
	<?php include '../static/footer.php'?>
</body>
</html>