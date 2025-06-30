<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
if($_GET[isLogin] == "yes"){
	$isLogin = true;
}else{
	$isLogin = false;
}
if(!empty($_SESSION[shoppingCartId])){
	$isRepeat = true;
}else{
	$isRepeat = false;
}
if($isLogin && empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "../order/takeorder.php?isLogin=yes";
	echo "<script type='text/javascript'>location.href='../clients/clientLogin.php';</script>";
	return;
}

$clientService = new ClientService();
$receiverService = new ReceiverService();
if($isLogin){
	$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
	if($client)
	{
		$receivers = $receiverService->GetReceiverByClientId($client->Id);
		if(count($receivers) > 0){
			$receiver = $receivers[0];
		}
	}
}else{
	if($isRepeat){
		$client = $clientService->GetClientByLoginId($_SESSION[noLoginClient]);
	}
	if($client)
	{
		$receiver = new Receiver();
		$receiver->FirstName = $client->FirstName;
		$receiver->SurName = $client->SurName;
		$receiver->AddressLineOne = $client->AddressLineOne;
		$receiver->AddressLineTwo = $client->AddressLineTwo;
		$receiver->Telephone = $client->Telephone;
		$receiver->Email = $client->Email;
		$receiver->PostCode = $client->PostCode;
		$receiver->CountryId = $client->CountryId;
		$receiver->CityTown = $client->CityTown;
		$receiver->Company = $client->Company;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<HEAD>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script src="../../Management/Scripts/order.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/jquery-1.4.2.js"></script>
<script type="text/javascript">
	var jq = jQuery.noConflict();
	jq(document).ready(function() {
		jq(".h2_cat").mousemove(function() {
			jq(this).addClass("h2_cat active_cat");
		}).mouseout(function() {
			jq(this).removeClass("active_cat");
		});
		
		jq("[value=Take this order]").click(function(){
			if(jq("[name=sameDesign]:checked").val()==1 && jq("#historyOrderNumber").val()==""){
				alert("Pleas input your previous order number, otherwise tooling and setup cost cannot be deducted.");
				return false;
			}
			if(jq("#spanTotal").html()=="Contact us"){
				alert("Please use the fast quote form before you place this order.");
				window.location.href = "../fastquote/fastPCB_quote.php";
				return false;
			}
		});
		
		setSpanNo();
		
		jq("#country").change(function(){
			setSpanNo();
		});
	});
	
	function setSpanNo(){
		jq(".spanNo:visible").each(function(){
			jq(this).text(jq(".spanNo:visible").index(this)+15);
		});
	}
</script>
<link href="../Management/Styles/menu.css" type="text/css" rel="Stylesheet" />
<link rel="stylesheet" href="/images/CSS.CSS" type="text/css"/>
<style type="text/css">

<!--
.style1 {
				margin-bottom: 0px;
}

.style3 {
				text-align: left;
				font-size: small;
				border: 1px solid #C0C0C0;
}

.style4 {
				
				font-size: x-small;
				color:blue;
}

.style6 {
				color: #FF8040;
				cursor:pointer;
}

.style7 {
				
			
				color:blue;
}
.style8 {
				
			
				font-size:12px;
				font-family:Arial;
	            font-style:italic;
	            font-weight:bold;
				
}



.style10 {
                font-size: x-small;
				color: #FE680A;
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
				font-size: medium;
				color: #FF6600;
}
.style16 {
				font-size: small;
				
}

.style17 {
				font-size: small;
				color:white;
				background:#3366CC;
				}

.style18 {
				font-size: small;
}


.style31 {
				border: 1px solid #C0C0C0;
}

-->
</style>

<script language=JavaScript> 
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
</HEAD>
<BODY BGCOLOR=#cccc99 leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" LANGUAGE=javascript>
<!--Counter-->
<!--Something Here-->
<?php include("../Management/Client/topper.php") ?>
<table width="778" border="0" cellspacing="0" cellpadding="0" align="center" background="/images/index_bg.gif">
  <tr> 
    <td width="214" valign="top"> 
      <table width="214" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td valign="top"> <br/>
<?php include("../Management/Client/menu.php") ?>
          </td>
        </tr>
        
            <tr><td>
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
            </td></tr>
<!--Ad1.End-->

<!--Ad2.Begin-->
<tr><td>
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="88">
              <tr> 
                <td align="center"> 
               <table style="width: 180px" >
            <tr>
              <td><a href="/payment/pay_methods.php">
				<img src="/images/paypal_logo.gif" border="0" alt="by PalPal"></a>
                  </td>
            </tr>
        </table> 
                </td>
              </tr>
            </table>
            </td></tr>
<!--Ad2.End-->

<!--Ad3.Begin-->
<tr><td>
            <table width="214" border="0" cellspacing="0" cellpadding="0" height="58" >
              <tr> 
                <td align="center"> 
               <table style="width: 180px" >
            <tr>
              <td><a href="/stencil/buy_stencil.php">
				<img src="/images/want_stencil.gif" border="0" alt="stencil"></a>
                  </td>
            </tr>
        </table> 
                </td>
              </tr>
            </table>
            </td></tr>
<!--Ad3.End-->

      </table>
    </td>
    <td valign="top" style="width: 563px"> 
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px; height: 417px">
        <tr valign="top"> 
          <td> 
<!--IndexPage.Content.Begin-->
  <?php include("../Management/Client/row1.php") ?> 
  </td></tr> 
  	<tr><td colspan="2" style="height: 13px"></td></tr>  
            <tr> 
 <td class="style31">
<form enctype="multipart/form-data" name="calc" id="calc" action="order-submitN_mirror.php" method="post" style="width: 100%;" class="style1">
<?php if($isLogin){ ?>
<input name="isLogin" type="hidden" value="yes"/>
<?php }else{ ?>
<input name="isLogin" type="hidden" value="no"/>
<?php }?>

<table style="width: 100%">
<tr><td>
<img alt="" src="/images/order_form.gif" width="521" height="43">
</td></tr></table>
<hr>
<p class="style15"><strong>Step1 Your information</strong></p>
<table style="width: 100%">
	<tr>
		<td class="style3" style="width: 144px" ><span class="style13">*</span><span class="style16">Firstname:</span></td>
		<td class="style3"><input id="firstName" name="firstName" type="text" style="width:80px" value="<?php echo $receiver->FirstName ?>"/></td>
		<td class="style3" style="width: 84px" ><span class="style13">*</span><span class="style16">Surname:</span></td>
		<td class="style3" style="width:200px"><input id="surname" name="surname" type="text" style="width:80px" value="<?php echo $receiver->SurName ?>"/></td>
	</tr>
	<tr>
		<td class="style3" style="width: 144px" ><span class="style16">Organization/Company:</span></td>
		<td class="style3" colspan="3"><input id="company" name="company" type="text" value="<?php echo $receiver->Company ?>"/></td>
	</tr>
	<tr>
		<td  class="style3" style="width: 144px"><span class="style13">*</span><span class="style16">Email:</span></td>
		<td class="style3" colspan="3"><input id="email" name="email" type="text" value="<?php echo $receiver->Email ?>"/></td>
	</tr>
	<tr>
		<td  class="style3" style="width: 144px">Phone number:</td>
		<td class="style3" colspan="3"><input id="phone" name="phone" type="text" value="<?php echo $receiver->Telephone ?>"/></td>
	</tr>
	<tr>
		<td class="style3" style="width: 144px"><span class="style13">*</span><span class="style16">Shipping address line1:</span></td>
		<td class="style3" colspan="3"><input id="deliveryaddress1" name="deliveryaddress1" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineOne ?>"></td>
	</tr>
	<tr>
		<td class="style3" style="width: 144px"><span class="style16">Shipping address line2:</span></td>
		<td class="style3" colspan="3"><input id="deliveryaddress2" name="deliveryaddress2" type="text" style="width: 288px" value="<?php echo $receiver->AddressLineTwo ?>"></td>
	</tr>
	<tr>
		<td  class="style3" style="width: 144px"><span class="style13">*</span><span class="style16">Town/City:</span></td>
		<td class="style3" colspan="3"><input id="cityTown" name="cityTown" type="text" value="<?php echo $receiver->CityTown ?>"/></td>
	</tr>
	<tr>
		<td  class="style3" style="width: 144px"><span class="style13">*</span><span class="style16">Postcode:</span></td>
		<td class="style3" colspan="3"><input id="deliverypostcode" name="deliverypostcode" type="text" value="<?php echo $receiver->PostCode ?>"></td>
	</tr>
	<tr>
		<td  class="style3" style="width: 144px">Country: </td>
		<td class="style3" colspan="3">
			<select name="country" id="country" style="width: 155px" onchange="showVAT();calculate_total('takeOrder')">
				<option value="1" <?php if(!$isLogin){echo 'selected="selected"';}else{if($receiver->CountryId == 1){echo 'selected="selected"';}} ?>>UK</option>
				<option value="2" <?php if($receiver->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
				<option value="3" <?php if($receiver->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
				<option value="4" <?php if($receiver->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
				<option value="5" <?php if($receiver->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
				<option value="6" <?php if($receiver->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
				<option value="7" <?php if($receiver->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
				<option value="8" <?php if($receiver->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
				<option value="9" <?php if($receiver->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
				<option value="11" <?php if($receiver->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="style11" colspan=2>A <span class="style13">*</span>indicates a field is required </td>
	</tr>
</table>
<hr>
<p class="style15"><strong>Step2 Price check</strong></p>

<table>
<tr>
	<td colspan="2" style="height: 6px"></td>
</tr>
<tr>
	<td class="style3">
		1.Board layer: [<span class="style6"><strong onclick="myOpen('/comment/layer_comment.php',200,400)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="layer" type="radio" value="1" checked="checked" onclick="changeLayer('takeOrder');calculate_total('takeOrder')">1
		<input name="layer" type="radio" value="2" onclick="changeLayer('takeOrder');calculate_total('takeOrder')">2
		<input name="layer" type="radio" value="4" onclick="changeLayer('takeOrder');calculate_total('takeOrder')">4
		<input name="layer" type="radio" value="6" onclick="changeLayer('takeOrder');calculate_total('takeOrder')">6
		<input name="layer" type="radio" value="8" onclick="changeLayer('takeOrder');calculate_total('takeOrder')">8
	</td>
</tr>
<tr>
	<td class="style3">
		2.Quantity:[<span class="style6"><strong onclick="myOpen('/comment/quantity_comment.php',200,300)">?</strong></span>]
	</td> 
	<td class="style3">
		<input id="quantity" name="quantity" type="text" style="width: 74px" onblur="calculate_total('takeOrder')"> (1 to 150)
	</td>
</tr>
<tr>
	<td class="style3">
		3.Length in mm: [<span class="style6"><strong onclick="myOpen('/comment/dimension_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<input id="length" type="text" name="length" onblur="calculate_total('takeOrder')"> (10 to 500mm)
	</td>
</tr>
<tr>
	<td class="style3">
		4.Width in mm:
	</td>
	<td class="style3">
		<input id="width" type="text" name="width" onblur="calculate_total('takeOrder')"> (10 to 500mm)
	</td>
</tr>
<tr>
	<td class="style3">
		5.Base material:[<span class="style6"><strong onclick="myOpen('/comment/material_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<select name="material" id="material" onchange="calculate_total('takeOrder')">
			<option value="0" selected="selected">FR4 Tg 130 (standard)</option>
			<option value="1" >FR4 H Tg 170</option>
		</select>
	</td>
</tr>
<tr>
	<td class="style3">
		6.Thickness:[<span class="style6"><strong onclick="myOpen('/comment/thickness_comment.php',200,300)">?</strong></span>]
	</td>
    <td class="style3">
		<input name="thickness" type="radio" value="0.4" onclick="calculate_total('takeOrder')">0.4mm
		<input name="thickness" type="radio" value="0.6" onclick="calculate_total('takeOrder')">0.6mm
		<input name="thickness" type="radio" value="0.8" onclick="calculate_total('takeOrder')">0.8mm
		<input name="thickness" type="radio" value="1.0" onclick="calculate_total('takeOrder')">1.0mm
		<input name="thickness" type="radio" checked="checked" value="1.6" onclick="calculate_total('takeOrder')">1.6mm<br>
		<input name="thickness" type="radio" value="2.0" onclick="calculate_total('takeOrder')">2.0mm
		<input name="thickness" type="radio" value="2.4" onclick="calculate_total('takeOrder')">2.4mm
	</td>
</tr>
<tr>
	<td class="style3">
		7.Copper weight:[<span class="style6"><strong onclick="myOpen('/comment/copper_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="weight" type="radio" value="0.5" onclick="calculate_total('takeOrder')">0.5oz
		<input name="weight" type="radio" checked="checked" value="1.0" onclick="calculate_total('takeOrder')">1.0oz
		<input name="weight" type="radio" value="2.0" onclick="calculate_total('takeOrder')">2.0oz
	</td>
</tr>			
<tr>
	<td class="style3">
		8.Solder mask:[<span class="style6"><strong onclick="myOpen('/comment/soldermask_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="soldermask" type="radio" value="only top">only top 
        <input name="soldermask" type="radio" value="only bottom">only bottom
		<input name="soldermask" type="radio" checked="checked" value="both sides">both top &amp; bottom
		<input name="soldermask" type="radio" value="no">no
	</td>
</tr>
<tr>
	<td class="style3">
		9.Silk screen:[<span class="style6"><strong onclick="myOpen('/comment/silkscreen_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="silkscreen" type="radio" checked="checked" value="only top">only top
		<input name="silkscreen" type="radio" value="only bottom">only bottom
		<input name="silkscreen" type="radio" value="both sides">both top &amp; bottom
		<input name="silkscreen" type="radio" value="no">no
	</td>
</tr>		
<tr>
	<td class="style3">
		10.Surface:[<span class="style6"><strong onclick="myOpen('/comment/surface_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3"><input name="surface" type="radio" value="1" onclick="calculate_total('takeOrder')">HASL (not RoHS)
		<input name="surface" type="radio" checked="checked" value="2" onclick="calculate_total('takeOrder')">HASL (lead free) 
		<input name="surface" type="radio" value="3" onclick="calculate_total('takeOrder')">Electrolytic Gold<br>
		<input name="surface" type="radio" value="4" onclick="calculate_total('takeOrder')">OSP
		<input name="surface" type="radio" value="5" onclick="calculate_total('takeOrder')">Electroless Nickel/Immersion Gold
	</td>
</tr>
<tr>
	<td class="style3">
		11.Lead time in working days:[<span class="style6"><strong onclick="myOpen('/comment/leadtime_comment.php',200,300)">?</strong></span>]
	</td> 
	<td class="style3">
	    <input name="days" type="radio" style="width: 20px" value="5" onclick="changeDays('takeOrder');calculate_total('takeOrder')">5
		<input name="days" type="radio" style="width: 20px" value="6" onclick="changeDays('takeOrder');calculate_total('takeOrder')">6
		<input name="days" type="radio" style="width: 20px" value="7" onclick="changeDays('takeOrder');calculate_total('takeOrder')">7
		<input name="days" type="radio" style="width: 20px" checked="checked" value="8" onclick="changeDays('takeOrder');calculate_total('takeOrder')">8 
		<input name="days" type="radio" value="10" onclick="changeDays('takeOrder');calculate_total('takeOrder')">10
		<input name="days" type="radio" value="12" onclick="changeDays('takeOrder');calculate_total('takeOrder')">12<br>
		<input name="days" type="radio" value="20" style="margin-left:3px" onclick="changeDays('takeOrder');calculate_total('takeOrder')">Laid-back Price[<span class="style6"><strong onclick="myOpen('/comment/laidback_comment.php',200,300)">?</strong></span>]
	</td>
</tr>
<tr>
	<td class="style3">
		12.Repeat order:[<span class="style6"><strong onclick="myOpen('/comment/samedesign_comment.php',200,300)">?</strong></span>]
    </td>
	<td class="style3">
		<input name="sameDesign" id="sameDesign" type="radio" value="1" onclick="changeDays('takeOrder');showHistoryOrderNumber();calculate_total('takeOrder')">Yes
		<input name="sameDesign" id="sameDesign" type="radio" value="0" checked="checked" onclick="changeDays('takeOrder');showHistoryOrderNumber();calculate_total('takeOrder')">No	
		&nbsp;&nbsp;<span id="spanHistoryOrderNumber" style="display:none">Order Number:<input name="historyOrderNumber" id="historyOrderNumber" type="text"></span>
	</td> 
</tr>
<tr>
	<td class="style3">
		13.Saving option:[<span class="style6"><strong onclick="myOpen('/comment/prototype_comment.php',400,400)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="prototype" id="prototype" type="radio" value="1" onclick="calculate_total('takeOrder')">Yes
		<input name="prototype" id="prototype" type="radio" value="0" checked="checked" onclick="calculate_total('takeOrder')">No
	</td> 
</tr>
<tr>
	<td class="style3">
		14.Laser stencil:[<span class="style6"><strong onclick="myOpen('/comment/stencil_comment.php',200,300)">?</strong></span>]
    </td>
	<td class="style3">
		<input name="needStencil" id="needStencil" type="radio" value="1" onclick="changeStencil('takeOrder');">Yes
		<input name="needStencil" id="needStencil" type="radio" value="0" checked="checked" onclick="changeStencil('takeOrder');">No
		<br/>
		<span id="spanStencilType" style="display:none">
			<input name="stencilType" type="radio" checked="checked" value="1" onclick="calculate_total('takeOrder')">only top
			<input name="stencilType" type="radio" value="2" onclick="calculate_total('takeOrder')">only bottom
			<input name="stencilType" type="radio" value="3" onclick="calculate_total('takeOrder')">both top &amp; bottom
		</span>
	</td> 
</tr>
<tr style="display:none">
	<td class="style3">
		15.The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill: 
		[<span class="style6"><strong onclick="myOpen('/comment/tech_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="tech" id="tech" type="radio" value="1" onclick="calculate_total('takeOrder')">Yes
		<input name="tech" id="tech" type="radio" value="0" checked="checked" onclick="calculate_total('takeOrder')">No
	</td> 
</tr>
<tr id="trHaveVAT" style="display:none">
	<td class="style3">
		<span class="spanNo"></span>.Do you have VAT number? If so please put it here: 
		[<span class="style6"><strong onclick="myOpen('/comment/vat_number.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<input name="haveVAT" id="haveVAT" type="radio" value="1" onclick="showVATNumber();calculate_total('takeOrder')">Yes
		<input name="haveVAT" id="haveVAT" type="radio" value="0" checked="checked" onclick="showVATNumber();calculate_total('takeOrder')">No
		&nbsp;&nbsp;<span id="spanVATNumber" style="display:none">Your VAT Number:<input name="VATNumber" id="VATNumber" type="text" onblur="calculate_total('takeOrder')"></span>
	</td> 
</tr>
<tr>
	<td class="style3">
		<span class="spanNo"></span>.Input voucher code here if you have: 
		[<span class="style6"><strong onclick="myOpen('/comment/voucher_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		Voucher code: <input name="voucherNumber" id="voucherNumber" type="text" onblur="calculate_total('takeOrder')">
		<input name="Apply" onclick="ajaxUseVoucher()" type="button" value="Check Voucher" height="10" style="width: 110px" class="style18" >
		<br/><span id="spanVoucherResult"></span>
		<input name="discount" id="discount" type="hidden">
	</td> 
</tr>
<tr>
	<td class="style3" style="height: 30px">
		<input name="Button1" onclick="calculate_total('takeOrder')" type="button" value="Price check (&pound;)" height="10" style="width: 127px" class="style18" >
	</td>
	<td class="style3" style="height: 30px">
		Inc VAT:&nbsp;<span id="spanTotal"></span><br/>
		Exc VAT:<span id="spanPriceExcVAT"></span>
		<input name="total" id="total" type="hidden">
		<input name="price0" id="price0" type="hidden">
		<input name="price1" id="price1" type="hidden">
		<input name="price2" id="price2" type="hidden">
		<input name="price3" id="price3" type="hidden">
		<input name="price4" id="price4" type="hidden">
		<input name="price5" id="price5" type="hidden">
		<input name="price6" id="price6" type="hidden">
		<input name="price7" id="price7" type="hidden">
		<input name="price8" id="price8" type="hidden">
		<input name="price9" id="price9" type="hidden">
		<input name="price10" id="price10" type="hidden">
		<input name="price11" id="price11" type="hidden">
		<input name="price12" id="price12" type="hidden">
		<input name="price13" id="price13" type="hidden">
		<input name="price14" id="price14" type="hidden">
		<input name="price15" id="price15" type="hidden">
		<input name="price16" id="price16" type="hidden">
	</td>
</tr>
<tr>
	<td colspan="2" style="height: 10px">
		<font color=red>*</font> No hidden extra costs!  The price you get is the total price you pay.<br>
		<font color=red>*</font> Lead time is considered as manufacturing time + shipping time.<br>
		<font color=red>*</font> Shipping and E test costs included.
	</td>

</tr>
<tr>
	<td colspan="2" style="height: 12px"></td>
</tr>
<tr>
	<td class="style3">
		<span class="spanNo"></span>.Your comments: [<span class="style6"><strong onclick="myOpen('/comment/message_comment.php',200,300)">?</strong></span>]
	</td>
	<td class="style3">
		<textarea name="message" cols="45" rows="4"></textarea>
	</td>
</tr>
<tr>
	<td style="height: 10px" class="style3">
		<span class="spanNo"></span>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input id="terms" name="terms" type="checkbox" >
	</td>
	<td class="style3">
		Tick the box to confirm you have read and accept <a target="_blank" href="/T_and_C/TandC182.pdf"><span class="style7">the Terms and Conditions</span></a>.
	</td>
</tr>
<tr>
	<td colspan="2" style="height: 12px"></td>
</tr>
</table>									
<hr>
<p class="style15"><strong>Step3 Upload file</strong></p>
<table>
<tr><td style="width: 521px"><span class="style16">Please upload your PCB file here: [<span class="style6"><strong onclick="myOpen('/comment/upload_comment.php',200,300)">?</strong></span>] </span>
<input name="uploaded" type="file" class="style18" style="height: 25px" ><br><br>
<input type="submit" value="Take this order" style="width: 135px; height: 35px;" class="style17" onclick="return checkTakeOrder()"><small><span class="style13">&nbsp;*</span> 
<span class="style4">Click this button to submit your order information.</span></small>
</td></tr>
</table>
</form> 
<hr>
<!--<p class="style15"><strong>Step4 Check out</strong></p>

				<span class="style16">We accept payment by BACS transfer, wire transfers(Swift/IBAN) or&nbsp;through PayPal. Simply choose from one of the options below and feel 
				good - you've just done that. <br><br>
				<img alt="Quick-teck PCB manufacturer" src="/images/mark1.gif" width="10" height="10"><span class="style8"> Option1: Through PayPal</span>
				<br><br>
				We use 
				PayPal as a safe, reliable and fee-free way of paying. Simply 
				click the following &quot;Buy now&quot; link, and you will be able to complete 
				your purchase. If you don't have a PayPal account, don't worry. PayPal now supports buyers 
				without a PayPal account
				<a target="_blank" href="/payment/paypal_help.php"><span class="style10"> 
				[How to do]</span></a>.</span>
	<br>		
<form name="paynow" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">

<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sales@quick-teck.co.uk"> 
<input type="hidden" name="item_name" value="Quick-teck,Low cost PCB prototype provider">
<input type="hidden" name="item_number" value="PCB price"> 
<input type="hidden" name="amount"> 
<input type="hidden" name="no_shipping" value="2"> 
<input type="hidden" name="no_note" value="1"> 
<input type="hidden" name="currency_code" value="GBP"> 
<div class="style11">
<input type="image" src="/images/paypall_buynow.gif" name="submit" 
alt="Make payments with PayPal - it's fast, free and secure!" height="45"> </div>


<span class="style16"><br>
				<img alt="Quick-teck PCB manufacturer" src="/images/mark1.gif" width="10" height="10"><span class="style8"> Option2: 
BACS/wire transfer</span><br><br>
Click <a href="/payment/bank_account.php" target="_blank"><span class="style14">here</span></a> to find our Bank account information.
<br>	If you are paying from this way, please <a href="mailto:info@quick-teck.co.uk">
				<span class="style14">email</span></a> us the 
				remittance advice or a snapshot of your payment. A confirmation email will be sent to you once the remittance advice received.</span>
<hr>

</form>
-->

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
showVAT();
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12471272-1");
pageTracker._trackPageview();
} catch(err) {}</script>


</BODY>

</HTML>