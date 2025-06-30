<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");

if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientInformation.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$clientService = new ClientService();
$receiverService = new ReceiverService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
$temp = $receiverService->GetReceiverByClientId($client->Id);
$receiver = $temp[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<script src="../Management/Scripts/client.js" type="text/javascript"></script>
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
    <td valign="top" style="width: 563px"> 
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px; height: 417px">
        <tr valign="top"> 
          <td> 
            <!--IndexPage.Content.Begin-->
            <?php include("../Management/Client/row1.php") ?> 
          </td>
        </tr> 
        <tr> 
          <td class="style31">
			<div>
				<div style="font-size: medium; color: #FF6600; font-weight:bold">My information</div>
                <form name="form1" method="post" action="doModifyClient2_client.php">
				<input id="id" name="id" type="hidden" value="<?php echo $client->Id ?>"/>
				<table width="530px" border="0" cellpadding="0" cellspacing="1" style="background-color:#C0C0C0; font-size:12px; text-align:left">
					<tr style="background-color:#D7D59D">
                        <td style="height:30px; color:red" colspan="4">
                            <b>&nbsp;Billing information:</b>
                        </td>
                    </tr>
                    <tr style="background-color:#D7D59D">
                        <td style="width:150px; height:30px;">
                            <b>&nbsp;Firstname:</b>
                        </td>
                        <td style="width:110px">
                            &nbsp;&nbsp;<input id="firstName" name="firstName" style="width:80px" type="text" value="<?php echo $client->FirstName ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                        <td style="width:80px;">
                            <b>&nbsp;Surname:</b>
                        </td>
                        <td style="width:190px">
                            &nbsp;&nbsp;<input id="surname" name="surname" style="width:80px" type="text" value="<?php echo $client->SurName ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Organization/Company:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="company" name="company" type="text" value="<?php echo $client->Company ?>"/>
                        </td>
                    </tr>
                    <tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Email:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="email" name="email" type="text" value="<?php echo $client->Email ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Phone number:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="telephone" name="telephone" type="text" value="<?php echo $client->Telephone ?>"/>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Billing address line1:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="addressLineOne" name="addressLineOne" style="width: 280px" type="text" value="<?php echo $client->AddressLineOne ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Billing address line2:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="addressLineTwo" name="addressLineTwo" style="width: 280px" type="text" value="<?php echo $client->AddressLineTwo ?>"/>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Town/City:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="cityTown" name="cityTown" type="text" value="<?php echo $client->CityTown ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Postcode:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="postcode" name="postcode" type="text" value="<?php echo $client->PostCode ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
                    <tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Country:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<select name="country" id="country" style="width: 180px">
		                        <option value="1" <?php if($client->CountryId == 1){echo 'selected="selected"';} ?>>UK</option>
		                        <option value="2" <?php if($client->CountryId == 2){echo 'selected="selected"';} ?>>France</option>
		                        <option value="3" <?php if($client->CountryId == 3){echo 'selected="selected"';} ?>>Ireland</option>
		                        <option value="4" <?php if($client->CountryId == 4){echo 'selected="selected"';} ?>>Germany</option>
		                        <option value="5" <?php if($client->CountryId == 5){echo 'selected="selected"';} ?>>Belgium</option>
		                        <option value="6" <?php if($client->CountryId == 6){echo 'selected="selected"';} ?>>Denmark</option>
		                        <option value="7" <?php if($client->CountryId == 7){echo 'selected="selected"';} ?>>Netherlands</option>
		                        <option value="8" <?php if($client->CountryId == 8){echo 'selected="selected"';} ?>>Spain</option>
		                        <option value="9" <?php if($client->CountryId == 9){echo 'selected="selected"';} ?>>Italy</option>
		                        <option value="11" <?php if($client->CountryId == 11){echo 'selected="selected"';} ?>>Other European Countries</option>
	                        </select>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px; color:red" colspan="4">
                            <b>&nbsp;Shipping information:</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:copyForm()" style="text-decoration:underline; color:red">Copy from billing information</a>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Firstname:</b>
                        </td>
                        <td>
                            &nbsp;&nbsp;<input id="firstName2" name="firstName2" style="width:80px" type="text" value="<?php echo $receiver->FirstName ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                        <td>
                            <b>&nbsp;Surname:</b>
                        </td>
                        <td>
                            &nbsp;&nbsp;<input id="surname2" name="surname2" style="width:80px" type="text" value="<?php echo $receiver->SurName ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Organization/Company:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="company2" name="company2" type="text" value="<?php echo $receiver->Company ?>"/>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Email:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="email2" name="email2" type="text" value="<?php echo $receiver->Email ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Phone number:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="telephone2" name="telephone2" type="text" value="<?php echo $receiver->Telephone ?>"/>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Shipping address line1:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="addressLineOne2" name="addressLineOne2" style="width: 280px" type="text" value="<?php echo $receiver->AddressLineOne ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Shipping address line2:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="addressLineTwo2" name="addressLineTwo2" style="width: 280px" type="text" value="<?php echo $receiver->AddressLineTwo ?>"/>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Town/City:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="cityTown2" name="cityTown2" type="text" value="<?php echo $receiver->CityTown ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Postcode:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<input id="postcode2" name="postcode2" type="text" value="<?php echo $receiver->PostCode ?>"/>
							<span style="color:red; font-size:20px; vertical-align:middle">*</span>
                        </td>
                    </tr>
					<tr style="background-color:#D7D59D">
                        <td style="height:30px;">
                            <b>&nbsp;Country:</b>
                        </td>
                        <td colspan="3">
                            &nbsp;&nbsp;<select name="country2" id="country2" style="width: 180px">
	                            <option value="1" <?php if($receiver->CountryId == 1){echo 'selected="selected"';}  if(!$receiver){echo 'selected="selected"';} ?>>UK</option>
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
					<tr style="background-color:#D7D59D">
						<td class="style11" colspan="4">A <span class="style13">*</span>indicates a field is required </td>
					</tr>
                    <tr style="background-color:#D7D59D">
                        <td colspan="4" style="text-align:center">
                            <input id="image2" type="image" value="submit" src="/Management/Images/b_save.gif" onclick="return checkModifyClient()"/>
                        </td>
                    </tr>
                </table>
				</form>
            </div>
            <div id="js_Error" style="font-size:14px; font-weight:bold;">
				<?php unset($_SESSION[searchOrder]); //echo $_SESSION[message]; //$_SESSION[message]=""; ?>
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

<?php
if($_SESSION[message] != ""){
	$_SESSION[message]="";
	echo "<script type='text/javascript'>alert('Modify successfully!');</script>";
}
?>