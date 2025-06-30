<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/EEShoppingCarItem_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");

$orderService = new OrderService();
$clientService = new ClientService();
$orderDetailService = new OrderDetailService();
$receiverService = new ReceiverService();
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();

if(empty($_SESSION[EEShoppingCar])){
	//$shoppingCar = array();
	echo "<script type='text/javascript'>location.href='eeList.php';</script>";
	return;
}else{
	$shoppingCar = unserialize($_SESSION[EEShoppingCar]);
}
$_SESSION[EEShoppingCar] = serialize($shoppingCar);

if(!$_SESSION[PCBOrderId] && empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "../ElectronicElement/eeOrderInfo.php";
	echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
	return;
}
$testFlag = false;
if($_SESSION[currentClient] == "jammy1" || $_SESSION[currentClient] == "harrison11" || $_SESSION[currentClient] == "Liam Rao"){
	$testFlag = true;
}

if(!$_SESSION[PCBOrderId] && !$testFlag){
	$_SESSION[returnPage] = "../order/takeorder.php?isLogin=yes";
	echo "<script type='text/javascript'>alert(\"Please take PCB order first!\");location.href='../clients/selectTakeOrderType.php';</script>";
	return;	
}
if (!$_SESSION[PCBOrderId] && $testFlag){
	$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
	if($client)
	{
		$receivers = $receiverService->GetReceiverByClientId($client->Id);
		if(count($receivers) > 0){
			$orderInShoppingCart = $receivers[0];//receiver
		}
	}
}else{
	$orderInShoppingCart = $orderService->GetOrderById($_SESSION[PCBOrderId]);
	$orderDetailArray = $orderDetailService->GetOrderDetailByOrderId($_SESSION[PCBOrderId]);
	if(count($orderDetailArray)>0){
		$orderDetail = $orderDetailArray[0];	
	}
	$client = $clientService->GetClientById($orderInShoppingCart->ClientId);
	$receivers = $receiverService->GetReceiverByClientId($client->Id);
	if(count($receivers) > 0){
		$receiver = $receivers[0];
	}
}
//echo "Submit process...... <br/>";
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
#T td{
    padding: 10px 10px;
    font-size:14px;
    font-family:Arial;
}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="scripts/Script.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/admin.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
	$("#dialogWindowBin").click(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
function CloseDialog()
{
	$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});
}
function ShowDialog(obj,url)
{
	var oRect=obj.getBoundingClientRect();
	x=oRect.left;
	y=oRect.top;
	x+=20;y+=20+$(document).scrollTop();
	
	$("#dialogWindowBin").css({'left':x,'top':y});
	$("#dialogWindowBin").fadeIn(500,function()
	{
		$("#dialogWindowBin").load(url);
	}
	);
}
function checkForm()
{
	if(document.getElementById('firstName').value=="")
	{
		alert("Please input firstName!");
		return false;
	}
	if(document.getElementById('surname').value=="")
	{
		alert("Please input surname!");
		return false;
	}
	if(!checkEmail(document.getElementById('email').value))
	{
		alert("Please input your proper email address!");
		return false;
	}
	if(document.getElementById('telephone').value=="")
	{
		alert("Please input phone number!");
		return false;
	}
	if(document.getElementById('addressLineOne').value=="")
	{
		alert("Please input billing  address line1!");
		return false;
	}
	if(document.getElementById('cityTown').value=="")
	{
		alert("Please input town/city!");
		return false;
	}
	if(document.getElementById('postcode').value=="")
	{
		alert("Please input postcode!");
		return false;
	}
	
	if(document.getElementById('firstName2').value=="")
	{
		alert("Please input firstName!");
		return false;
	}
	if(document.getElementById('surname2').value=="")
	{
		alert("Please input surname!");
		return false;
	}
	if(!checkEmail(document.getElementById('email2').value))
	{
		alert("Please input your proper email address!");
		return false;
	}
	if(document.getElementById('telephone2').value=="")
	{
		alert("Please input phone number!");
		return false;
	}
	if(document.getElementById('deliveryaddress1').value=="")
	{
		alert("Please input shipping address line1!");
		return false;
	}
	if(document.getElementById('cityTown').value=="")
	{
		alert("Please input town/city!");
		return false;
	}
	if(document.getElementById('postcode2').value=="")
	{
		alert("Please input postcode!");
		return false;
	}
	return true;
}
function checkEmail(val) {
    var emailPattern = /^([\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+,)*[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
    if (!emailPattern.test(val)) {
        return false;
    } else {
        return true;
    }
}
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title="">Home</a> - <a href="#" title="">Order Electronic Component:</a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"><span class="ico_title" style="font-size:12px">Order Electronic Component</span></div>
			<div class="left_box_c">
				<div class="mt10">
					<img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<a href="/forum/index.php" title="Quick-teck electronics engineering forum" target="_blank"><img src="/rescources/images/Electronics_forum.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
            <form enctype="multipart/form-data" id="form1" action="eeOrderSubimt.php" method="post" onsubmit="return checkForm();">
            <p class="c_f60 lh2em">
            </p>
            <h3 class="title_main">
                Components Order Information</h3>
            <div class="online_from mt10">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tr>
						<td colspan="4" style="font-size:16px">
							<span style="color: Red;">Billing Information</span>
						</td>
					</tr>
					<tr >
						<td class="w_210">Firstname:</td>
						<td class="w_210"><input id="firstName" name="firstName" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->FirstName ?>"/><?php if($_SESSION[PCBOrderId]){echo $client->FirstName;} ?></td>
						<td class="w_111">Surname:</td>
						<td ><input id="surname" name="surname" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->SurName ?>"/><?php if($_SESSION[PCBOrderId]){echo $client->SurName;} ?></td>
					</tr>
					<tr>
						<td>Organization/Company:</td>
						<td colspan="3"><input id="company" name="company" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->Company ?>"/><?php if($_SESSION[PCBOrderId]){echo $client->Company;} ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td colspan="3"><input id="email" name="email" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->Email ?>"/><?php if($_SESSION[PCBOrderId]){echo $client->Email;} ?></td>
					</tr>
					<tr>
						<td>Phone number:</td>
						<td colspan="3"><input id="telephone" name="telephone" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->Telephone ?>"/><?php if($_SESSION[PCBOrderId]){echo $client->Telephone;} ?></td>
					</tr>
					<tr>
						<td>Billing  address line1:</td>
						<td colspan="3"><input id="addressLineOne" name="addressLineOne" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->AddressLineOne ?>" /><?php if($_SESSION[PCBOrderId]){echo $client->AddressLineOne;} ?></td>
					</tr>
					<tr>
						<td>Billing  address line2:</td>
						<td colspan="3"><input id="addressLineTwo" name="addressLineTwo" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->AddressLineTwo ?>" /><?php if($_SESSION[PCBOrderId]){echo $client->AddressLineTwo;} ?></td>
					</tr>
					<tr>
						<td>Town/City:</td>
						<td colspan="3"><input id="cityTown" name="cityTown" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->CityTown ?>"/><?php if($_SESSION[PCBOrderId]){echo $client->CityTown;} ?></td>
					</tr>
					<tr>
						<td>Postcode:</td>
						<td colspan="3"><input id="postcode" name="postcode" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $client->PostCode ?>"><?php if($_SESSION[PCBOrderId]){echo $client->PostCode;} ?></td>
					</tr>
					<tr>
						<td>Country:</td>
						<td colspan="3">
							<?php 
								if($_SESSION[PCBOrderId]){
									echo '<input id="country" name="country" type="hidden" value="'.$client->CountryId.'">';
									echo Common::GetCountryById($client->CountryId);
								}else{
							?>
								<select name="country" id="country" style="width: 250px">
									<?php 
									for($i=0; $i < count($allCountries); $i++)
									{
										$strSelect = '';
										if($i == 0){
											if(!$isLogin){
												$strSelect = ' selected="selected"';
											}
										}
										if($client->CountryId == $allCountries[$i]->Id){
											$strSelect = ' selected="selected"';
										}
										echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
									}
									?>
									<option value="999" <?php if($client->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
								</select>
							<?php		
								} 
							?>
						</td>
					</tr>			
					<tr>
						<td colspan="4" style="font-size:16px">
							<span style="color: Red;">Shipping Information</span>
						</td>
					</tr>
					<tr>
						<td>Firstname:</td>
						<td><input id="firstName2" name="firstName2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->FirstName ?>"/><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->FirstName;} ?></td>
						<td>Surname:</td>
						<td><input id="surname2" name="surname2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->SurName ?>"/><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->SurName;} ?></td>
					</tr>
					<tr>
						<td>Organization/Company:</td>
						<td colspan="3"><input id="company2" name="company2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->Company ?>"/><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->Company;} ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td colspan="3"><input id="email2" name="email2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->ReceiverEmail ?>"/><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->ReceiverEmail;} ?></td>
					</tr>
					<tr>
						<td>Phone number:</td>
						<td colspan="3"><input id="telephone2" name="telephone2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->ReceiverTelephone ?>"/><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->ReceiverTelephone;} ?></td>
					</tr>
					<tr>
						<td>Shipping  address line1:</td>
						<td colspan="3"><input id="addressLineOne2" name="addressLineOne2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->AddressLineOne ?>"><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->AddressLineOne;} ?></td>
					</tr>
					<tr>
						<td>Shipping  address line2:</td>
						<td colspan="3"><input id="addressLineTwo2" name="addressLineTwo2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->AddressLineTwo ?>"><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->AddressLineTwo;} ?></td>
					</tr>
					<tr>
						<td>Town/City:</td>
						<td colspan="3"><input id="cityTown2" name="cityTown2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->CityTown ?>"/><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->CityTown;} ?></td>
					</tr>
					<tr>
						<td>Postcode:</td>
						<td colspan="3"><input id="postcode2" name="postcode2" type="<?php if($_SESSION[PCBOrderId]){echo "hidden";}else{echo "text";} ?>" value="<?php echo $orderInShoppingCart->ReceiverPostCode ?>"><?php if($_SESSION[PCBOrderId]){echo $orderInShoppingCart->ReceiverPostCode;} ?></td>
					</tr>
					<tr>
						<td>Country:</td>
						<td colspan="3">
							<?php 
								if($_SESSION[PCBOrderId]){
									echo '<input id="country2" name="country2" type="hidden" value="'.$orderInShoppingCart->CountryId.'">';
									echo Common::GetCountryById($orderInShoppingCart->CountryId);
								}else{
							?>
								<select name="country2" id="country2" style="width: 250px">
									<?php 
									for($i=0; $i < count($allCountries); $i++)
									{
										$strSelect = '';
										if($i == 0){
											if(!$isLogin){
												$strSelect = ' selected="selected"';
											}
										}
										if($orderInShoppingCart->CountryId == $allCountries[$i]->Id){
											$strSelect = ' selected="selected"';
										}
										echo '<option value="'.$allCountries[$i]->Id.'"'.$strSelect.'>'.$allCountries[$i]->ENShortName.'</option>';
									}
									?>
									<option value="999" <?php if($orderInShoppingCart->CountryId == 999){echo 'selected="selected"';} ?>>Other countries</option>
								</select>
							<?php		
								} 
							?>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr id="trHaveVAT" <?php if($orderInShoppingCart->CountryId==1) {echo 'style="display:none;"';} ?>>
				  		<td>
				  			Have EU VAT number: 
						</td>
						<td colspan="3">
							<input name="haveVAT" id="haveVAT" type="hidden" value="<?php echo $orderDetail->HaveVAT;?>">
							<input name="VATNumber" id="VATNumber" type="hidden" value="<?php echo $orderDetail->VatNumber;?>"/></span>
							<?php if($orderDetail->HaveVAT==1){echo "Yes";}else{echo "No";}?>
							<?php if($orderDetail->HaveVAT==1){  ?>
							&nbsp;<span id="spanVATNumber">(Your VAT Number: &nbsp;<?php echo $orderDetail->VatNumber;?>)</span>
							<?php } ?>
						</td>
					</tr>
                </table>
                <br />
                <table cellspacing="0" cellpadding="0" width="100%" border="0" style="text-align: center;">
                    <tr>
                        <td class="w_111">
                            <span style="color: Red;">No</span>
                        </td>
                        <td class="w255">
                            <span style="color: Red;">Name</span>
                        </td>
                        <td class="w_111">
                            <span style="color: Red;">Price</span>
                        </td>
                        <td class="w_111">
                            <span style="color: Red;">Qty</span>
                        </td>
                        <td>
                            <span style="color: Red;">Sub-total</span>
                        </td>
                    </tr>
					<?php  
						$i = 0;
						$totalPrice = 0;
						foreach ($shoppingCar as $eeId_c => $shoppingCarItem_c) { 
					?>
						<tr>
							<td style="height: 28px; padding-left:5px">
								<?php 
									$i = $i + 1;
									$totalPrice = $totalPrice + $shoppingCarItem_c->Total;
									echo $i;
								?>
							</td>
							<td style="text-align:left; padding-left:10px">
								<?php 
									echo "<a href='eeDetail.php?eeId=".$eeId_c."' target='_blank'>".$shoppingCarItem_c->EEName."</a>";
								?>
							</td>
							<td style="color:red; font-weight:bold">
								<?php 
									echo "&pound;".sprintf("%01.2f", $shoppingCarItem_c->Price);
								?>
							</td>
							<td>
								<?php echo $shoppingCarItem_c->Quantity;?>
							</td>
							<td>
								<?php 
									echo "&pound;".sprintf("%01.2f", $shoppingCarItem_c->Total);
								?>
							</td>
						</tr>
					<?php  
					}
					?>
                    <tr>
                        <td colspan="5" class="tdright">
                         Total Exc VAT:&nbsp;<span style="color:Red; font-weight:bold;">&pound;<?php $excVATPrice = $totalPrice; echo sprintf("%01.2f", $excVATPrice); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="tdright">
                         VAT:&nbsp;<span style="color:Red; font-weight:bold;"><?php if($orderDetail->HaveVAT && $orderDetail->VatNumber){$VATPrice = 0; echo "N/A";}else{$VATPrice = round($totalPrice*0.2, 2); echo "&pound;".sprintf("%01.2f", $VATPrice);} ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="tdright">
                         Total Inc VAT:&nbsp;<span style="color:Red; font-weight:bold;"><?php if($orderDetail->HaveVAT && $orderDetail->VatNumber){$totalPrice = $excVATPrice; echo "N/A";}else{$totalPrice = $excVATPrice + $VATPrice;echo "&pound;".sprintf("%01.2f", $totalPrice);} ?>
                        </td>
                    </tr>
                </table>
				<br>
				<table cellspacing="0" cellpadding="0" width="100%" border="0">
					<tr>
					  	 <td>Your comments: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'../comment/component_comment.php');">?</span>] </td>
						 <td>
							<textarea name="message" cols="45" rows="4"></textarea>
						</td>
				   </tr>
                   <tr>
				  		<td colspan="2">
				  			<input id="terms" name="terms" type="checkbox" >
							Tick the box to confirm you have read and accept <a target="_blank" href="../T_and_C/TandC182.pdf" class="c_f60">the Terms and Conditions</a>.
						</td>
				   </tr>
				</table>
                <p class="mt10 tc">
                <input class="submit_bn" type="button" value="Back" name="Button1" onclick="toList('shoppingCar.php')"/>&nbsp;&nbsp;
                <input class="submit_bn" type="button" value="Submit" name="Button1" onclick="toTakeOrder(<?php echo count($shoppingCar) ?>)"/></p>
                <input type="hidden" name="days" id="days" value="<?php echo $orderInShoppingCart->WorkingDays;?>"/></span>
				<input type="hidden" name="VATPrice" id="VATPrice" value="<?php echo $VATPrice; ?>"/>
				<input type="hidden" name="excVATPrice" id="excVATPrice" value="<?php echo $excVATPrice; ?>"/>
				<input type="hidden" name="total" id="total" value="<?php echo $totalPrice; ?>"/>
				<input type="hidden" name="PCBorderNumber" id="PCBorderNumber" value="<?php echo $orderInShoppingCart->Number; ?>"/>
            </div>
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