<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExpressService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ParcelInfoService_Class.php");

if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientMain.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$orderService = new OrderService();
$order = $orderService->GetOrderByNumber($_GET[number]);
if($_GET[key]!=$order->Remark){
	echo "<script type='text/javascript'>location.href='clientMain.php';</script>";
	return;
}
$clientService = new ClientService();
$messageService = new MessageService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$messageArray = $messageService->GetMessagesByClientId($client->Id);
$unreadMessageArray = $messageService->GetUnreadMessagesByClientId($client->Id);
$voucherService = new VoucherService();
$unUsedvoucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1");
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
		<div class="bnav ico_home mt10"><a href="#" title="">Home</a> - <a href="#" title="">Online quote</a> - <a href="#" title="">Manufacture Quote</a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> My Quick-teck</span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/clients/clientMain.php" title="" class="on">Order list</a></li>
						<li><a href="/clients/clientModifyPassword.php" title="">Change password</a></li>
						<li><a href="/clients/clientInformation.php" title="">My Profile</a></li>
						<li><a href="/clients/voucherList_client.php" title="">Voucher(<?php echo count($unUsedvoucherArray)?>)</a></li>
						<li><a href="/clients/messageList_client.php" title="">Message(<?php echo count($unreadMessageArray)?>)</a></li>
					</ul>
				</div>
				<div class="mt10">
					<a href="#" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" /></a>
					<a href="#" title=""><img src="/rescources/images/opb.jpg" width="233" height="75" alt="" class="ml10 mt10" /></a>
						<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img1.gif" width="30" height="30" alt="" />&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<h3 class="title_main"><?php echo $order->Number ?> Order information </h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                       <tr>
						<td colspan="4"><span class="c_f30 fs14 fw">Billing Information</span></td>
					  </tr>
					  <tr>
						<td width="186">Firstname:</td>
						<td width="206"><?php echo $order->FirstName;?></td>
					    <td width="112">Sumame:</td>
					    <td width="206"><?php echo $order->SurName ?></td>
					  </tr>
					  <tr>
						<td>Organization/Company:</td>
						<td colspan="3"><?php echo $order->Company ?></td>
					  </tr>
					  <tr>
						<td>Email:</td>
						<td colspan="3"><?php echo $order->ReceiverEmail ?></td>
					  </tr>
					  <tr>
						<td>Phone unmber:</td>
						<td colspan="3"><?php echo $order->ReceiverTelephone ?></td>
					  </tr>
					  <tr>
					   <td>Billing address line1:</td>
						<td colspan="3"><?php echo $order->AddressLineOne; ?> </td>
					  </tr>
                      <tr>
					   <td>Billing address line2:</td>
						<td colspan="3"><?php echo $order->AddressLineTwo; ?> </td>
					  </tr>
                      <tr>
					   <td>Town/City:</td>
						<td colspan="3"><?php echo $order->CityTown; ?> </td>
					  </tr>
                      <tr>
					   <td>Postcode:</td>
						<td colspan="3"><?php echo $order->ReceiverPostCode; ?> </td>
					  </tr>
                      <tr>
					   <td>Country:</td>
						<td colspan="3"><?php $country = Common::GetCountryById($order->CountryId); echo $country;?></td>
					  </tr>
						<tr>
					   <td>Order Date:</td>
						<td colspan="3"> <?php $orderTime = explode(' ', $order->OrderTime); echo Common::ChangeDateFormat($orderTime[0],"date");?></td>
					  </tr>
                      <tr>
					   <td>Expected delivery date:</td>
						<td colspan="3"><?php $targetDate = explode(' ', $order->TargetDate); echo Common::ChangeDateFormat($targetDate[0],"date"); ?></td>
					  </tr>
					</table>
					<p class="c_f30 fs14 fw mt20 tc">Order status</p>
					<?php 
					$orderProcessingService = new OrderProcessingService();
					$orderStatusService = new OrderStatusService();
					$parcelInfoService = new ParcelInfoService();
					$expressService = new ExpressService(); 
					$parcelInfo = $parcelInfoService->GetParcelInfoByOrderNumber($order->Number);
					$allOrderProcessings = $orderProcessingService->GetOrderProcessingByOrderId($order->Id,1);
					for($i=0; $i < count($allOrderProcessings); $i++)
					{
					?>
					<p class="tc mt10" style="border:1px solid #ccc; height:30px;line-height:30px;"><span style=" width:300px;border-right:1px solid #ccc; height:30px;display:block;float:left;"> <?php echo Common::ChangeDateFormat($allOrderProcessings[$i]->ProcessTime,"dateTime"); ?></span>  
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
					</p>
					<?php 
					}
					?>
					<?php
					if($order->OrderStatusId == 6 || $order->OrderStatusId == 7)
					{
					?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" >
						<tr ><td colspan="2"><span class="c_f30 fs14 fw">Delivery tracking</span></td></tr>
						<tr >
							<td >
								<b>Tracking number:</b>
							</td>
							<td>
								<?php echo $order->ExpressNumber; ?>
							</td>
						</tr>
						<tr >
							<td colspan="2">
								You can track your parcel status by logging into the below link:<br/>
						<?php 
							
							$express = $expressService->GetExpressById($order->ExpressId);
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
					?>
					
					<p class="tc mt20 ">
					<?php
						if (file_exists("../Management/UploadFiles/".$order->Id.".pdf"))
						{
							echo '<br><a target="_blank" style="font-size:14px; font-weight:bold; color:blue;text-decoration:underline" href="doDownloadInvoice.php?number='.$order->Number.'&key='.$order->Remark.'">Download invoice</a>';
						}
					?>
					<br /><br />
					<a href="clientMain.php" title="" class="c_f60" style="text-decoration:underline">Return to Order list </a>
					</p>
				</div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>