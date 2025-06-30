<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExpressService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEOrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientMain.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$eeOrderService = new EEOrderService();
$eeOrderDetailService = new EEOrderDetailService();
$eeOrder = $eeOrderService->GetEEOrderByNumber($_GET[number]);
$eeOrderDetailArray = $eeOrderDetailService->GetOrderDetailByOrderId($eeOrder->Id);
if($_GET[key]!=$eeOrder->SystemRandomCode){
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
					<h3 class="title_main"><?php echo $eeOrder->Number ?> Order information </h3>
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
											echo "<a href='eeDetail.php?eeId=".$eeOrderDetailArray[$i]->EEOrderId."' target='_blank'>".$eeOrderDetailArray[$i]->EEName."</a>";
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
					
					
					
					<p class="c_f30 fs14 fw mt20 tc">Order status</p>
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
					?>
					
					<p class="tc mt20 ">
					<?php
						if (file_exists("../Management/UploadFiles/".$eeOrder->Id.".pdf"))
						{
							echo '<br><a target="_blank" style="font-size:14px; font-weight:bold; color:#FF6600;"; href="doDownloadInvoice.php?number='.$eeOrder->Number.'&key='.$eeOrder->Remark.'">Download invoice</a>';
						}
					?>
					<br /><br />
					<a href="clientEEOrderList.php" title="" class="c_f60">Return to Order list </a>
					</p>
				</div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>