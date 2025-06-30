<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExpressService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script src="../Management/Scripts/order.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/jquery-1.4.2.js"></script>
<script type="text/javascript">
	var jq = jQuery.noConflict();
	jq(document).ready(function() {
		jq(".h2_cat").mousemove(function() {
			jq(this).addClass("h2_cat active_cat");
		}).mouseout(function() {
			jq(this).removeClass("active_cat");
		});
	});
</script>
<link href="../Management/Styles/menu.css" type="text/css" rel="Stylesheet" />
<link rel="stylesheet" href="../images/CSS.CSS" type="text/css"/>
<style type="text/css">
<!--
.style1 {
				margin-bottom: 0px;
}
.style3 {
				text-align: left;font-size: small;border: 1px solid #C0C0C0;
}
.style4 {
				font-size: x-small;color:blue;
}
.style6 {
				color: #FF8040;cursor:hand;
}
.style7 {
				color:blue;
}
.style8 {
				font-size:12px;font-family:Arial;font-style:italic;font-weight:bold;
}
.style10 {
                font-size: x-small;color: #FE680A;
}
.style11 {
				text-align: center;
}
.style13 {
				color: #FE680A;
}
.style14 {
				color: #FF6600;
}
.style15 {
				font-size: medium;color: #FF6600;
}
.style16 {
				font-size: small;
}
.style17 {
				font-size: small;color:white;background:#3366CC;
}
.style18 {
				font-size: small;
}
.style31 {
				border: 1px solid #C0C0C0;
}
-->
</style>

<script language="JavaScript" type="text/javascript"> 
<!--
var bannerAD=new Array(); 
var bannerADlink=new Array(); 
var adNum=0; 

bannerAD[0]="/images/pcb1.jpg"; 
bannerADlink[0]="/design/design_quote.php"

bannerAD[1]="/images/pcb2.jpg"; 
bannerADlink[1]="/design/design_quote.php"

bannerAD[1]="/images/pcb3.gif"; 
bannerADlink[1]="/design/design_quote.php"

var preloadedimages=new Array(); 
for (i=1;i<bannerAD.length;i++){ 
preloadedimages[i]=new Image(); 
preloadedimages[i].src=bannerAD[i]; 
} 

function setTransition(){ 
if (document.all){ 
bannerADrotator.filters.revealTrans.Transition=Math.floor(Math.random()*23); 
bannerADrotator.filters.revealTrans.apply(); 
} 
} 

function playTransition(){ 
if (document.all) 
bannerADrotator.filters.revealTrans.play() 
} 

function nextAd(){ 
if(adNum<bannerAD.length-1)adNum++ ; 
else adNum=0; 
setTransition(); 
document.images.bannerADrotator.src=bannerAD[adNum]; 
playTransition(); 
theTimer=setTimeout("nextAd()", 5000); 
} 

function jump2url(){ 
jumpUrl=bannerADlink[adNum]; 
jumpTarget='_blank'; 
if (jumpUrl != ''){ 
if (jumpTarget != '')window.open(jumpUrl,jumpTarget); 
else location.href=jumpUrl; 
} 
} 
function displayStatusMsg() { 
status=bannerADlink[adNum]; 
document.returnValue = true; 
} 
function closeDiv(){
	$("mscroll").style.display = "none";
}
function myOpen(url,height,width){
window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
}

//--> 
</script>
</head>
<body BGCOLOR=#cccc99 leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" LANGUAGE=javascript>
<!--Counter-->
<!--Something Here-->
<?php include("../Management/Client/topper.php") ?>
<table width="778" border="0" cellspacing="0" cellpadding="0" align="center" background="/images/index_bg.gif">
  <tr> 
    <td width="214" valign="top"> 
      <table width="214" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td valign="top"><br/>
            <?php include("../Management/Client/menu.php") ?>
          </td>
        </tr>
        <tr>
          <td>
            <!--Ad1.Begin-->
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="50">
              <tr> 
                <td align="center" style="width: 214px"> 
                    <table  border="0" cellpadding="1" cellspacing="2" bgcolor="#E8E8E8" style="width: 170px">
                        <tr>
                          <td bgcolor="#FFFFFF"><a onMouseOver="displayStatusMsg();return document.returnValue" href="javascript:jump2url()">
				            <img src="/images/pcb3.gif" name=bannerADrotator width=176 height=120 border=0 align="middle" alt="" style="FILTER: revealTrans(duration=2,transition=40)"/></a>
                              <script language=JavaScript>nextAd()</script></td>
                        </tr>
                    </table> 
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!--Ad1.End-->

        <!--Ad2.Begin-->
        <tr>
            <td>
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="88">
              <tr> 
                <td align="center"> 
                    <table style="width: 180px" >
                    <tr>
                      <td><a href="/payment/pay_methods.php"><img src="/images/paypal_logo.gif" border="0" alt="by PalPal"></a>
                      </td>
                    </tr>
                    </table> 
                </td>
              </tr>
            </table>
            </td>
        </tr>
        <!--Ad2.End-->

        <!--Ad3.Begin-->
        <tr>
        <td>
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="58" >
              <tr> 
                <td align="center"> 
                   <table style="width: 180px" >
                        <tr>
                          <td><a href="/stencil/buy_stencil.php"><img src="/images/want_stencil.gif" border="0" alt="stencil"></a>
                          </td>
                        </tr>
                    </table> 
                </td>
              </tr>
            </table>
        </td>
        </tr>
        <!--Ad3.End-->
      </table>
    </td>
    <td valign="top" style="width: 563px;"> 
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px; height:600px;">
        <tr valign="top"> 
          <td> 
            <!--IndexPage.Content.Begin-->
            <?php include("../Management/Client/row1.php") ?> 
          </td>
        </tr> 
        <tr valign="top"> 
          <td class="style31">
			<div align="center" style="font-size:14px; font-weight:bold; height:16px; color:black">
				<?php echo $order->Number ?>
			</div>
			<div align="center" style="font-size:14px; font-weight:bold; height:16px; color:#FF6600; margin-top:5px">
				<span style="color:#FF6600">Order information</span>
			</div>
			<table align="center" width="530px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="width:150px; height:23px;">
						<b>&nbsp;Firstname:</b>
					</td>
					<td style="width:150px">
						<?php echo $order->FirstName;?>
					</td>
					<td style="width:80px">
						<b>&nbsp;Surname:</b>
					</td>
					<td style="width:150px">
						<?php echo $order->SurName ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Organization/Company:</b>
					</td>
					<td colspan="3">
						<?php echo $order->Company ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Email:</b>
					</td>
					<td colspan="3">
						<?php echo $order->ReceiverEmail ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Phone number:</b>
					</td>
					<td colspan="3">
						<?php echo $order->ReceiverTelephone ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Delivery address line1:</b>
					</td>
					<td colspan="3">
						<?php echo $order->AddressLineOne; ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Delivery address line2:</b>
					</td>
					<td colspan="3">
						<?php echo $order->AddressLineTwo; ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Town/City:</b>
					</td>
					<td colspan="3">
						<?php echo $order->CityTown; ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Postcode:</b>
					</td>
					<td colspan="3">
						<?php echo $order->ReceiverPostCode; ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Country:</b>
					</td>
					<td colspan="3">
						<?php $country = Common::GetCountryById($order->CountryId); echo $country;?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Order Date:</b>
					</td>
					<td colspan="3">
						<?php $orderTime = explode(' ', $order->OrderTime); echo Common::ChangeDateFormat($orderTime[0],"date");?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>&nbsp;Expected delivery date:</b>
					</td>
					<td colspan="3">
						<?php $targetDate = explode(' ', $order->TargetDate); echo Common::ChangeDateFormat($targetDate[0],"date"); ?>
					</td>
				</tr>
			</table>
			
			<!--<div style="font-size:14px; font-weight:bold">Order Detail:</div>
			<table width="370px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="width:140px; height:23px;">
						Order Detail:
					</td>
					<td style="width:210px">
						<?php echo $order->ProductDescription; ?>
					</td>
				</tr>
			</table>-->
			<br>
			<div align="center" style="font-size:14px; font-weight:bold; height:16px; color:#FF6600">Order status</div>
			<table align="center" width="450px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<?php 
			$orderProcessingService = new OrderProcessingService();
			$allOrderProcessings = $orderProcessingService->GetOrderProcessingByOrderId($order->Id);
			for($i=0; $i < count($allOrderProcessings); $i++)
			{
			?>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="width:150px; height:23px;">
						<?php echo Common::ChangeDateFormat($allOrderProcessings[$i]->ProcessTime,"dateTime"); ?>
					</td>
					<td style="width:300px">
				<?php 
				$orderStatusService = new OrderStatusService(); 
				$orderStatus=$orderStatusService->GetOrderStatusById($allOrderProcessings[$i]->StatusId);
				echo $orderStatus->Status; 
						?>
					</td>
				</tr>
			<?php
			}
			?>
			</table>
			
			<?php
			if($order->OrderStatusId >= 6)
			{
			?>
			<br>
			<div align="center" style="font-size:14px; font-weight:bold; height:16px; color:#FF6600">Delivery tracking</div>
			<table align="center" width="370px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td style="height:23px;">
						<b>Tracking number:</b>
					</td>
					<td>
						<?php echo $order->ExpressNumber; ?>
					</td>
				</tr>
				<tr style="background-color:#D7D59D; color:#344b50;">
					<td colspan="2">
						You can track your parcel status by logging into the below link:<br/>
				<?php 
					$expressService = new ExpressService(); 
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
			<div align="center">
			<?php
				if (file_exists("../Management/UploadFiles/".$order->Id.".pdf"))
				{
					echo '<br><a target="_blank" style="font-size:14px; font-weight:bold; color:#FF6600;"; href="doDownloadInvoice.php?number='.$order->Number.'&key='.$order->Remark.'">Download invoice</a>';
				}
			?>
			<br><br>
			<a href="clientMain.php" style="color:blue; font-size:12px;">Return to Order list</a>
			</div>
          </td>
        </tr>
      </table>
<!--IndexPage.Content.End-->
        <table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr> 
            <td> <b><font size="3"><br>
              </font></b> 
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="englishfont" height="1">
                <tr> 
                  <td bgcolor="#000000"> </td>
                </tr>
              </table>
              <br>
            </td>
          </tr>
        </table>
 <?php include("../Management/Client/bottom.php") ?>  
         <br>
     </td>
     <td valign="top" width="20">&nbsp;</td>
     </tr>
     </table>
    
    <table width="778" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td>
	    <img src="/images/index_bottom.gif"></td>
      </tr>
    </table>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12471272-1");
pageTracker._trackPageview();
} catch(err) {}</script>


</body>
</html>