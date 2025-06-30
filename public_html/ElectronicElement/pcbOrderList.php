<?php
session_start();
$langdate['pcborderlist'][0]['english']='Home';
$langdate['pcborderlist'][0]['french']='Accueil';
$langdate['pcborderlist'][0]['dutch']='';
$langdate['pcborderlist'][0]['spanish']='';
$langdate['pcborderlist'][1]['english']='Order Electronic Component';
$langdate['pcborderlist'][1]['french']='Commander des composants électroniques';
$langdate['pcborderlist'][1]['dutch']='';
$langdate['pcborderlist'][1]['spanish']='';
$langdate['pcborderlist'][2]['english']='Select PCB order';
$langdate['pcborderlist'][2]['french']='Select PCB order';
$langdate['pcborderlist'][2]['dutch']='';
$langdate['pcborderlist'][2]['spanish']='';
$langdate['pcborderlist'][3]['english']='Select your avaiable PCB order';
$langdate['pcborderlist'][3]['french']='Sélectionnez votre commande de PCBs en cours';
$langdate['pcborderlist'][3]['dutch']='';
$langdate['pcborderlist'][3]['spanish']='';
$langdate['pcborderlist'][4]['english']='The electronics components will be despatched together with your selected PCB order';
$langdate['pcborderlist'][4]['french']='Les composants électroniques vont être dispatchés ensemble avec votre commande de PCBs';
$langdate['pcborderlist'][4]['dutch']='';
$langdate['pcborderlist'][4]['spanish']='';
$langdate['pcborderlist'][5]['english']='Submit';
$langdate['pcborderlist'][5]['french']='Soumettre';
$langdate['pcborderlist'][5]['dutch']='';
$langdate['pcborderlist'][5]['spanish']='';
$langdate['pcborderlist'][6]['english']='Follow Us On';
$langdate['pcborderlist'][6]['french']='Suivez-Nous Sur';
$langdate['pcborderlist'][6]['dutch']='';
$langdate['pcborderlist'][6]['spanish']='';
$langdate['pcborderlist'][7]['english']='/rescources/images/banner02.jpg';
$langdate['pcborderlist'][7]['french']='/rescources/images/banner02_fr.jpg';
$langdate['pcborderlist'][7]['dutch']='';
$langdate['pcborderlist'][7]['spanish']='';
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderStatusService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EETypeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEElectronicElementService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");

if($_GET[isLogin] == "yes"){
	$isLogin = true;
}else{
	$isLogin = false;
}
if($isLogin && empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "../ElectronicElement/pcbOrderList.php?isLogin=yes";
	echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
	return;
}
$orderService = new OrderService();
$clientService = new ClientService();
$holidayService = new HolidayService();
$orderStatusService = new OrderStatusService();
$orderDetailService = new OrderDetailService();
$eeTypeService = new EETypeService();
$eeElectronicElementService = new EEElectronicElementService();

if(!$isLogin){
	$surname = $_POST[surname];
	$postcode = $_POST[postcode];
	$orderArray = $orderService->GetOrdersBySurNameAndPostcode($surname, $postcode);
}else{
	$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
	$orderArray = $orderService->GetOrdersByClientId($client->Id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Manufacturing,UK printed circuit board Online Quote,UK PCB Manufacturer,circuit board Prototype manufacture</title>
<meta name="description" content="Low Cost PCB Manufacturing,Online Quote PCB,pcb manufacture,UK circuit board Prototype Fabrication offering two layers prototype to multilayer PTH printed circuit board." />
<meta name="keywords" content="Low Cost PCB Manufacturing,Online Quote PCB price,pcb manufacturer,UK PCB Prototype Manufacture,pcbs,PCB Prototype Fabrication,Fabrication, double layers PCB prototype" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/css/accordion.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{
	position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;
}
.tdright{
 text-align:right;
 padding-right:15px;
}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="scripts/Script.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/admin.js"></script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['pcborderlist'][7]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['pcborderlist'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['pcborderlist'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"><span class="ico_title" style="font-size:14px"><?php Lang::EchoString2($langdate['pcborderlist'][2]);?></span></div>
			<div class="left_box_c">
				<div class="mt10">
					<img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<a href="/forum/index.php" title="Quick-teck electronics engineering forum" target="_blank"><img src="/rescources/images/Electronics_forum.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['pcborderlist'][6]);?></span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
            <p class="c_f60 lh2em">
            </p>
            <h3 class="title_main">
                <?php Lang::EchoString2($langdate['pcborderlist'][3]);?></h3>
			<div style="margin:5px"><?php Lang::EchoString2($langdate['pcborderlist'][4]);?>.</div>
            <div class="online_from mt10">
                <table cellspacing="0" cellpadding="0" width="100%" border="0" style="text-align: center;">
                    <tr>
                        <td class="w_111"><span style="color: Red;">Number</span></td>
                        <td class="w_111"><span style="color: Red;">Order date</span></td>
                        <td class="w_111"><span style="color: Red;">Target date</span></td>
                        <td class="w_111"><span style="color: Red;">Qty</span></td>
                        <td class="w_60"><span style="color: Red;">Paid</span></td>
                        <td class="w_60"><span style="color: Red;">Amount</span></td>
                        <td class="w_111"><span style="color: Red;">Contact name</span></td>
						<td class="w_111"><span style="color: Red;">Manufacutre data</td>
                        <td class="w_111"><span style="color: Red;">Select</span></td>
                    </tr>
                    <?php 
					for($i=0; $i < count($orderArray); $i++)
					{
						
						$orderTime = $orderArray[$i]->OrderTime;
						
						$dateArray2 = $holidayService->GetTargetDay($orderTime, 2);
						$date2 =  $dateArray2[count($dateArray2)-1]->BasicDate;
						$dateArray3 = $holidayService->GetTargetDay($orderTime, 3);
						$date3 =  $dateArray3[count($dateArray3)-1]->BasicDate;
						$dateArray4 = $holidayService->GetTargetDay($orderTime, 4);
						$date4 =  $dateArray4[count($dateArray4)-1]->BasicDate;
						
						$now1 = strtotime(date("Y-m-d"));
						
						$datediff2 = (strtotime($date2) - $now1);
						$datediff3 = (strtotime($date3) - $now1);
						$datediff4 = (strtotime($date4) - $now1);
						
						if(($orderArray[$i]->WorkingDays == 5 && $datediff2 < 0) || ($orderArray[$i]->WorkingDays == 6 && $datediff3 < 0) ||($orderArray[$i]->WorkingDays >= 7 && $datediff4 < 0)){
							continue;	
						}
						
						$orderDetailArray = $orderDetailService->GetOrderDetailByOrderId($orderArray[$i]->Id);
						if(count($orderDetailArray)>0){
							$orderDetail = $orderDetailArray[0];
						}
					?>
					<tr>
						<td><?php echo $orderArray[$i]->Number;?></td>
						<td>
						<?php 
							echo date("d/m/Y",strtotime($orderArray[$i]->OrderTime));
						?>
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
						<td>
							<?php echo $orderDetail->Varchar3;?>
						</td>
						<!--<td>
						<?php 
							$orderStatusId = $orderArray[$i]->OrderStatusId;
							$orderStatus = $orderStatusService->GetOrderStatusById($orderStatusId);
							echo $orderStatus->Status;
						?>
						</td>-->
						<td>
							<input type="radio" name="radio1" value="<?php echo $orderDetail->OrderId ?>" onclick="setPcbOrderValue(this.value)">
							<input type="hidden" id="pcbNumber_<?php echo $orderDetail->OrderId ?>" name="pcbNumber_<?php echo $orderDetail->OrderId ?>" value="<?php echo $orderArray[$i]->Number ?>"/>
							<input type="hidden" id="pcbKey_<?php echo $orderDetail->OrderId ?>" name="pcbKey_<?php echo $orderDetail->OrderId ?>" value="<?php echo $orderDetail->Varchar2 ?>"/>
						</td>
					</tr>
				<?php }?>
                </table>
            </div>
            <br/>
			<form id="form1" action="eeList.php" method="get">
				<input type="hidden" id="pcbOrderId" name="pcbOrderId"/>
				<input type="hidden" id="pcbNumber" name="pcbNumber"/>
				<input type="hidden" id="pcbKey" name="pcbKey"/>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
					<td align="center">
						<input type="submit" value="<?php Lang::EchoString2($langdate['pcborderlist'][5]);?>" class="submit_bn" onclick="return checkSubmitEEPcbOrder()">
					</td>
					</td>
				</table>
			</form>
            <div class="clear">
            </div>
        </div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>