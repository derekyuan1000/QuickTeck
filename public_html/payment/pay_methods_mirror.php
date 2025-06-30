<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<title>Quick-teck,Low Cost PCB Manufacturer,UK PCB Manufacturer,Online Quote,PCB board manufacturer</title>
<meta name="description" content="Cheap PCB board about Quick-teck as a UK PCB manufacturer, PCB board manufacturer,offering prototypes to volume production fabrication PCBs at low price." />
<meta name="keywords" content="Cheap PCB board about Quick-teck as a UK PCB manufacturer, PCB board manufacturer,offering prototypes to volume production fabrication PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" href="/images/CSS.CSS" type="text/css"/>
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


<style type="text/css">
<!--
.style1 {
				margin-bottom: 0px;
}

.style2 {
				text-align: left;
				font-size: small;
}

.style3 {
				
			
				font-size:12px;
				font-family:Arial;
	            font-style:italic;
	            font-weight:bold;
}

.style5 {
				border-width: 0;
				font-size: medium;
}
.style6 {
				font-family: "Times New Roman";
}


.style13 {
				color: #FE680A;
}


.style16 {
				font-size: small;
				
}




.style31 {
				border: 1px solid #C0C0C0;
}




.style32 {
				font-family: Arial;
}




-->
</style>
<SCRIPT ID=clientEventHandlersJS LANGUAGE=javascript>
<!--

function window_onload() {
<!--Page.OnLoad-->
}
// return the value of the radio button that is checked
// return an empty string if none are checked, or
// there are no radio buttons
function getCheckedValue(radioObj) 
{
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function getsizeband(size)
{

var d;
if(0<size && size<=100000)
 {
 d=99.99+(size*10/100000);
 return d;
 }
 
if(100000<size && size<=200000)
 {
 d=109.99+((size-100000)*20/100000);
 return d;
 }
 
if(200000<size && size<=300000)
 {
d=129.99+((size-200000)*20/100000);
 return d;
 }
 
if(300000<size && size<=400000)
 {
d=149.99+((size-300000)*30/100000);
 return d;
 }
 
if(400000<size && size<=500000)
{
d=179.99+((size-400000)*20/100000);
 return d;
 }
 if(500000<size && size<=600000)
 {
 d=199.99+((size-500000)*30/100000);
 return d;
 }

if(600000<size && size<=700000)
 {
 d=229.99+((size-600000)*30/100000);
 return d;
 }
 
if(700000<size && size<=800000)
 {
 d=259.99+((size-700000)*30/100000);
 return d;
 }

if(800000<size && size<=900000)
 {
 d=289.99+((size-800000)*30/100000);
 return d;
 }
if(900000<size && size<=1000000)
 {
 d=319.99+((size-900000)*30/100000);
 return d;
 }

if(1000000<size && size<=1400000)
 {
  d=349.99+((size-1000000)*90/400000);
 return d;
 }

 
if(1400000<size && size<=2000000)
 {
  d=439.99+((size-1400000)*110/600000);
 return d;
 }

if(2000000<size && size<=3000000)
 {
  d=549.99+((size-2000000)*220/1000000);
  return d;
 }
if(3000000<size && size<=4000000)
 {
 d=769.99+((size-3000000)*210/1000000);
 return d;
 }
if(4000000<size && size<=5000000)
 {
  d=979.99+((size-4000000)*220/1000000);
 return d;
 }
if(5000000<size && size<=10000000)
 {
  d=1199.99+((size-5000000)*810/5000000);
 return d;
 }
if(10000000<size && size<=11500000)
 {
 d=2009.99+((size-10000000)*260/1500000);
 return d;
 }
if(11500000<size && size<=12500000)
 {
 d=2269.99+((size-11500000)*90/1000000);
 return d;
 }

else 
 {
alert("Please contact us for your special offer!");
      return;
 }
}


 function calculate_total()
 {
   var t1 = 0;
   var t2 = 0;
   var t3 = 0;
   var t4 = 0;
   var t5 = 0;
   var t6 = 0;
   var t7 = 0;
   var t8 = 0;
   var t10 = 0;
   var t12 = 0;
   var t14 = 0;
   var t15=0;
   
   var len = document.calc.length.value;
   var wid = document.calc.width.value;
   
 //  var thick = document.calc.frame.value;
   var quan = document.calc.quantity.value;
      
   if (document.calc.length.value <10 || document.calc.length.value>500)
   {
     alert("For onlien order, the length need to between 10 to 500 mm");
      return;
   }

   if (document.calc.width.value <10 || document.calc.width.value>500)
   {
       alert("For online order, the width need to between 10 to 500 mm");
      return;
   }


   if(document.calc.quantity.value<1)
   {
   alert("The minimum order quantity is 1!");
   return;
   }
   
   if(document.calc.quantity.value>50)
   {
   alert("You can contact us for even better offer for large volume!");
   return;
   }
// if it is integer value.
  if(parseInt(document.calc.quantity.value)!=document.calc.quantity.value)
   {
     alert("You should put a integer as the board quantity!");
     return;
   }
 
// var re = /^[1-9]+[0-9]*]*$/&#65307; 
// if (!re.test(document.calc.quantity.value))   
//   {
//   alert("You should put a integer as the board quantity!");
 //   return;
//   }
             
  
//t1 is singal board size.
   t1 = len * wid;
//t2 is the total board size.    
      t2=t1 * quan
//b1 is the size band 
var b1=getsizeband(t2)

//t3 is the layers weight.
 t3 = getCheckedValue(document.calc.layer);
 t15= getCheckedValue(document.calc.surface); //t15 is surface value
 t6=  getCheckedValue(document.calc.days);
 t4=t3 * b1;   
 
//t4 is value with layers weight.
//t5 is the days weight.
//t6 is the value with layers and days weight.

t14= parseFloat(t4 * t6)+parseFloat(t15);

switch (t6)
{

case "1.52":
{
if(t14>550)
{document.getElementById('total').value = "Contact us";
 alert("Please contact us for offline quote or you can try other lead times!");
 return;

}
else
{
document.getElementById('total').value = Math.round(t14*100)/100;
document.paynow.amount.value = Math.round(t14*100)/100;
}
}
break;

case "1.22":
{
if(t14>900)
{document.getElementById('total').value = "Contact us";
alert("Please contact us for offline quote or you can try other lead times!");
 return;

}
else
{
document.getElementById('total').value = Math.round(t14*100)/100;
document.paynow.amount.value = Math.round(t14*100)/100;
}
}
break;

case "1.1":
{
if(t14>1200)
{document.getElementById('total').value = "Contact us";
alert("Please contact us for offline quote or you can try other lead times!");
 return;

}
else
{
document.getElementById('total').value = Math.round(t14*100)/100;
document.paynow.amount.value = Math.round(t14*100)/100;
}
}
break;

case "0.9":
{
if(t14>1400)
{document.getElementById('total').value = "Contact us";
alert("Please contact us for offline quote or you can try other lead times!");
 return;

}
else
{
document.getElementById('total').value = Math.round(t14*100)/100;
document.paynow.amount.value = Math.round(t14*100)/100;
}
}
break;

case "0.8":
{
if(t14>1650)
{document.getElementById('total').value = "Contact us";
alert("Please contact us for offline quote or you can try other lead times!");
 return;

}
else
{
document.getElementById('total').value = Math.round(t14*100)/100;
document.paynow.amount.value = Math.round(t14*100)/100;
}
}
break;

default:
{
document.getElementById('total').value = Math.round(t14*100)/100;
document.paynow.amount.value = Math.round(t14*100)/100;
}
}


} // end function definition
 

function fourleadtime() { 
document.calc.days[0].disabled=true;
document.calc.days[1].disabled=true;
 
}

function twoleadtime() { 
document.calc.days[0].disabled=false;
document.calc.days[1].disabled=false;

}


//-->
</SCRIPT>
</HEAD>
<BODY BGCOLOR=#cccc99 leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" LANGUAGE=javascript onload="return window_onload()">
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
        
      </table>
    </td>
    <td valign="top" style="width: 563px"> 
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px; height: 417px">
        <tr valign="top"> 
          <td> 
<!--IndexPage.Content.Begin-->
 <?php include("../Management/Client/row1.php") ?> 
   </td></tr> 
  <tr><td style="height: 45px">
<table style="width: 100%">
<tr><td>
<img alt="cheap PCB UK manufacturer" src="/images/payment.gif" width="521" height="43">
</td></tr>
</table>
</td></tr>


            <tr> 
 <td class="style31">


<span class="style16">
We accept payment by BACS transfer, wire transfers(Swift/IBAN) or&nbsp;through PayPal. <br>
<br>
<img alt="Cheap PCB manufacturer,Quick-teck" src="/images/mark1.gif" width="10" height="10"><span class="style3"> Option1: Through PayPal</span>
<br><br>
We use PayPal as a safe, reliable and fee-free way of online payment. You can pay by Credit/Debit card 
through PayPal even if you do not have PayPal account.<br>

<br>
<br>
Please note we never see your Credit/Debit card details.
</span>
<br><br>
<span class="style16">PayPal accepts the following cards: 
<br>
				<span class="style32">&#9658; </span>Visa/Delta/Electron<br>
<span class="style32">&#9658; </span>MasterCard/Eurocard <br>
<span class="style32">&#9658; </span>PayPal Top Up Card<br>
<span class="style32">&#9658; </span>Maestro<br>
<span class="style32">&#9658; </span>Solo<br>
<span class="style32">&#9658; </span>American Express<br>
 <br><img src="/images/paypal_logo.gif"  alt="by PalPal">

<br><br>


<img alt="Cheap PCB UK manufacturer, Quick-teck" src="/images/mark1.gif" width="10" height="10"><span class="style3"> Option2: 
BACS/wire transfer</span><br>

<br>We also accept BACS/wire transfers.  If you prefer to pay in this way, please click 
<a href="bank_account.php" target="_blank"><span class="style13">here</span></a>
to get the necessary information.<br><br>


<hr>
				
				</span>




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
</BODY>

<!-- Mirrored from web.hichina.com/sitemanager/templet/032/left3/ by HTTrack Website Copier/3.x [XR&CO'2003], Thu, 28 Aug 2003 00:02:19 GMT -->
</HTML>