<?php
// Configuration
$minimum_value = 0.00;
$maximum_value = 10000.00;
$payment_mode = 'LIVE'; // Change to LIVE when ready
$notify_url = 'http://www.quick-teck.co.uk/order/notify.php';

// Do not touch below here
$error = false;

if (isset($_POST['submit']) && !empty($_POST['payment_value']) && is_numeric($_POST['payment_value'])) {
	$payment_value = number_format($_POST['payment_value'], 2, '.', '');
	if ($payment_value < $minimum_value || $payment_value > $maximum_value) {
		$error = true;
		$errorMessage = "Your payment value is not between the minimum (" . $minimum_value . ") and maximum (" . $maximum_value . ") allowed range.";
	} else {	
		require_once 'sagepay.php';
		$sagepay_server = new SagePay_Server('quickteck', $payment_mode);
		$sagepay_server->setOptions($notify_url, 'Quick-Teck - Low Cost PCB and Assembly Partner');
		//$sagepay_server->setEmail($row['ReceiverEmail']);
		// Customise to include delivery if required, uses existing Paypal Price variable
		$sagepay_server->addItem('Manual Payment', 1, $payment_value);
		
		$sagepay_server->setBillingAddress($_POST['firstname'], $_POST['surname'], $_POST['billing_line1'], $_POST['billing_line2'], $_POST['billing_city'], $_POST['billing_postcode'], 'GB', '', '');
		$sagepay_server->setReference($_POST['ordernumber']);
		
		$url = $sagepay_server->getSagePayUrl();
		
		if (is_array($url)) {
			die($url['error']);
		}
		
		header('Location: ' . $url);
		die();
	}
} else {
	$payment_value = number_format($minimum_value, 2);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<HEAD>
<title>Manual Payment - QuickTeck</title>
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
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px; height: 350px">
        <tr valign="top"> 
          <td> 
<!--IndexPage.Content.Begin-->
  <?php include("../Management/Client/row1.php") ?> 
  </td></tr> 
  	<tr><td colspan="2" style="height: 13px"></td></tr>  
            <tr> 
				<td class="style31">
				<form action="manualpayment.php" method="post">
				<div style="font-size: medium; color: #FF6600; font-weight:bold" align="center">Manual Payment Form </div>
				<table style="width: 100%">
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>First Name:</td><td class="style3"><input type="text" name="firstname" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>Surname:</td><td class="style3"><input type="text" name="surname" style="width: 100px" /></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>Amount(&pound):</td><td class="style3"><input type="number" name="payment_value" value="<?php echo $payment_value ?>" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>Order Number:
					[<span class="style6"><strong onclick="myOpen('/comment/order_number_comment.php',200,400)">?</strong></span>]
					</td><td class="style3"><input type="text" name="ordernumber" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>Billing Address Line 1:</td>
					<td class="style3"><input type="text" name="billing_line1" style="width: 288px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px">Billing Address Line 2:</td><td class="style3"><input type="text" name="billing_line2" style="width: 288px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>Billing City:</td>
					<td class="style3"><input type="text" name="billing_city" /></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"><span class="style13">*</span>Billing Post Code:</td>
					<td class="style3"><input type="text" name="billing_postcode" style="width: 100px"/></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px">Billing Country:</td>
					<td class="style3">
					<select name="country" id="country" >
						<option value="1" selected="selected">UK</option>
						<option value="2">France</option>
						<option value="3">Ireland</option>
						<option value="4">Germany</option>
						<option value="5">Belgium</option>
						<option value="6">Denmark</option>
						<option value="7">Netherlands</option>
						<option value="8">Spain</option>
						<option value="9">Italy</option>
						<option value="11">Other countries</option>
					</select>
					</td>
				</tr>
				<tr>
				<td colspan="2" style="height: 18px"></td>
				</tr>
				<tr>
					<td class="style3" style="width: 170px"></td><td class="style3"><input type="submit" name="submit" value="Make Payment" style="width: 135px; height: 35px;" class="style17"/></td>
				</tr>
				</table>
				</form>


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


</BODY>

</HTML>