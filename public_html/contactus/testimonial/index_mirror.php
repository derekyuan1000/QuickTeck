<?php  
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/GuestBookInfoService_Class.php");
include_once("Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

$guestBookInfoService = new GuestBookInfoService();
$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}

$result = $guestBookInfoService->GetAllGuestBookInfosByPage(20, $currentPage,2);
$recoudCount = $result[0];
$guestBookInfoArray = $result[1];
$num=count($guestBookInfoArray);
$pager = new Pager(20,$recoudCount,$currentPage,"index.php?page=");

if($_SESSION[message]){
	echo "<script>alert('".$_SESSION[message]."')</script>";
	$_SESSION[message]="";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../Management/Scripts/client.js" type="text/javascript"></script>
<script src="../../Management/Scripts/jquery-1.4.2.js" type="text/javascript"></script>
<script src="../../kindeditor4/kindeditor.js" type="text/javascript"></script>
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
<script type="text/javascript">
	var editor1;
    KindEditor.ready(function(K) {
        editor1 = K.create('#comment',{langType : 'en',width:'500px',height:'150px',
        	items:['emoticons']
        });
    });
</script>
<script language="javascript" type="text/javascript">
function verif_mail(adresse) {
	var place = adresse.indexOf("@",1);
	var point = adresse.indexOf(".",place+1);

	if ((place > -1)&&(adresse.length >2)&&(point > 1))
		return true;
	else
		return false;
}

function verif_add(){
	//var F = document.getElementById("form_add_guest");
	//var name = F.name.value;	
	//var mail= F.email.value;
	var name = $("name").value;	
	var mail= $("email").value;

	if (!name){
		alert("Please mention your name ");
		return
	}else if (editor1.isEmpty()){
		alert("Please add your message ");
		return
	}else if (!verif_mail(mail) && mail){
		alert("Your Email is incorrect ");
		return
	}
	ajaxAddGuestForm();
}

function update_flag(objet){
	if (objet.value)
		document.getElementById("img_flags").src = 'images/'+objet.value+'.jpg';
}

</script>
<link href="../../Management/Styles/mainCss.css" type="text/css" rel="Stylesheet"/>
<link href="../../Management/Styles/menu.css" type="text/css" rel="Stylesheet"/>
<link href="../../images/CSS.CSS" type="text/css" rel="stylesheet"/>
<style type="text/css">
<!--
.style1 {
				margin-bottom: 0px;
}
.style2 {
				text-align: center;
				font-size: 20px;
				color: #FFFFFF;
				font-weight:bold;
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
a:link{
	color: #0000ff;
	text-decoration: none
}
a:visited{
	color: #0000ff;
	text-decoration: none
}
a:active{
	color: #0000ff;
	text-decoration: none
}
a:hover{
	color: #0000ff;
	text-decoration: none
}
#chead{ 
	height:30px; 
	width:520px; 
	margin:0px 0px 5px 0px; 
	background:#f9880e; 
	text-align:center; 
	line-height:30px; 
	color:#FFF; 
	font-weight:bold;
    font-size:16px;
}
.response{ 
	width:520px; 
	margin:0 auto; 
	background:#FFFFFF;
}
.resleft{ 
	width:100px;
	font-weight:bold;
	padding:2px;
	border-bottom:1px solid #C0C0C0;
}
.resright{ 
	width:410px; 
	padding:2px;
	border-left:1px solid #C0C0C0;
	border-bottom:1px solid #C0C0C0;
}
.top{ 
	border-top:1px solid #C0C0C0;
}
.hc{
    background:#FFFFDE;
}
.reponse {
	border: #b4b4b4 1px solid; 
	background-color: #ffffff;
	padding: 5px; 
}
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
<?php include("../../Management/Client/topper.php") ?>
<table width="778" border="0" cellspacing="0" cellpadding="0" align="center" background="/images/index_bg.gif">
  <tr> 
    <td width="214" valign="top"> 
      <table width="214" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td valign="top"><br/>
            <?php include("../../Management/Client/menu.php") ?>
          </td>
        </tr>
      </table>
    </td>
    <td valign="top" style="width: 563px"> 
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px;">
        <tr valign="top"> 
          <td> 
            <!--IndexPage.Content.Begin-->
            <?php include("../../Management/Client/row1.php") ?> 
          </td>
        </tr>
		<tr>
			<td  bgcolor="99cc33" class="style2" width="100%" height="40">
				<strong>Customer Testimonial Form</strong>
			</td>
		</tr>
		<tr>
			<td style="line-height:2px">&nbsp;
			</td>
		</tr>
		<tr>
	       <td><br>
		   <span class="style16">Quick-teck highly depends on personal recommendations. If you would like to let others know what you think of our service and products feel free to use this form. Your help in supporting us is always really appreciated.<br></span><br>
		   </td> 	
		</tr>
        <tr> 
          <td class="style31">
			<!--<form id="form_add_guest" method="post" action="doInsertMessage.php" onsubmit="javascript:return verif_add();">-->
			<table width="520px" border="0" cellpadding="7" cellspacing="0">
				<tr>
					<td class="style3" style="width: 150px" >
						Name or nickname : *
					</td>
					<td class="style3">
						<input class="i_text" type="text" id="name" name="name" size="34" maxlength="50"/>
					</td>
				</tr>
				<tr>
					<td class="style3">
						Email address :
					</td>
                    <td class="style3">
                        <input class="i_text" type="text" id="email" name="email" size="34" maxlength="150"/>
                    </td>
				</tr>
				<tr>
					<td class="style3">
						Country :
					</td>
                    <td class="style3">
                        <select tabindex="4" size="1" id="country" name="country" onchange="update_flag(this)">
							<option value="1" selected="selected">UK</option>
							<option value="2">France</option>
							<option value="3">Ireland</option>
							<option value="4">Germany</option>
							<option value="5">Belgium</option>
							<option value="6">Denmark</option>
							<option value="7">Netherlands</option>
							<option value="8">Spain</option>
							<option value="9">Italy</option>
							<option value="10">Portugal</option>
							<option value="11">Greece</option>
							<option value="12">Finland</option>
							<option value="13">Sweden</option>
							<option value="99">Other Countries</option>
						</select>&nbsp;<img id="img_flags" src="images/1.jpg" width="18" height="12" alt="" title="Flag" />
                    </td>
				</tr>
				<tr>
					<td class="style3">
						City/Town :
					</td>
                    <td class="style3">
                        <input class="i_text" type="text" id="city" name="city" size="34" maxlength="60"/>
                    </td>
				</tr>
				<tr>
                    <td class="style3" colspan="2">
						Your message : *<br/>
                        <textarea id="comment" name="comment"></textarea>
						<input type="submit" tabindex="9" value="Add this message" name="ajouter" class="btn_add" style="margin-top:5px" onclick="verif_add()"/>
					</td>
				</tr>
				<tr>
                    <td colspan="2" style="text-align:center;">
                        <div id="js_Error" style="font-size:14px; font-weight:bold;">
		                    <?php unset($_SESSION[clientLogin]); echo $_SESSION[message]; $_SESSION[message]=""; ?>
	                    </div>
                    </td>
                </tr>
			</table>
			<!--</form>-->
			<table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 520px;">
			<?php 
				for($i=0; $i < count($guestBookInfoArray); $i++)
				{
					$country = Common::GetCountryById2($guestBookInfoArray[$i]->CountryId);
					$createTime = Common::ChangeDateFormat($guestBookInfoArray[$i]->CreateTime,"dateTime");
					$replyTime = Common::ChangeDateFormat($guestBookInfoArray[$i]->ReplyTime,"dateTime");
			?>
				<tr class="response <?php if($num%2==0){echo 'hc';}?>">
					<td class="resleft">
						<p>
						<?php echo $createTime;?><br/>
						<?php echo $guestBookInfoArray[$i]->ClientName;?> (<?php echo $guestBookInfoArray[$i]->City;?> <?php echo $country;?>)<br/>
						<img src="images/<?php echo $guestBookInfoArray[$i]->CountryId;?>.jpg" width="14" height="10" style="border: 0px" alt="" title="<?php echo $country;?>" />
						<!--<a href="mailto:<?php echo $guestBookInfoArray[$i]->Email;?>"><img src="images/mail.gif" alt="" title="Send an email to <?php echo $guestBookInfoArray[$i]->ClientName;?> [<?php echo $guestBookInfoArray[$i]->Email;?>]" style="border: 0px" width="12" height="10" /></a>-->
						</p>
					</td>
					<td class="resright">
						<p>
						<?php echo $guestBookInfoArray[$i]->ClientMessage;?>
						<?php  
						if($guestBookInfoArray[$i]->ReplyMessage){
							echo "<br /><br /><div class='reponse'><strong>Webmaster's reply</strong> : ".$guestBookInfoArray[$i]->ReplyMessage."&nbsp;&nbsp;(".$replyTime.")</div>";
						}
						?>
						</p>
					</td>
				</tr>
			<?php
				$num--;
			}
			?>
			</table>
			<?php 
				//if($recoudCount > 5){
					$pager->createPager();
				//}
			?>
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
 <?php include("../../Management/Client/bottom.php") ?>  
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