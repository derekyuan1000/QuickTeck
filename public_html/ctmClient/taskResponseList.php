<?php
session_start();
include_once("../Management/Jeremy/TaskService_Class.php");
include_once("../Management/Jeremy/Jeremy_Fun.php");
include_once("../Management/Jeremy/TaskCommentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");

$orderId = $_GET[orderId];
$taskId = $_GET[taskId];
if ($orderId != "" && $taskId != "") {
	$orderService = new OrderService();
	$order = $orderService->GetOrderById($orderId);
	if($order && $_GET[key]==$order->Remark){
		$taskService = new TaskService();
		$task = $taskService->GetTaskById($taskId);
		$Priority = array (
				'1' => 'extreme high',
				'2' => 'high',
				'3' => 'middle',
				'4' => 'low',
				);
		$tcs = new TaskCommentService();
		$tcArray = $tcs->GetTaskByTaskId($taskId);
		$num=count($tcArray);
	}else{
		echo "<script type='text/javascript'>location.href='../index.php';</script>";
		return;
	}
} else {
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
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
<script charset="utf-8" src="/kindeditor4/kindeditor.js"></script>
<script>
	var editor1;
    KindEditor.ready(function(K) {
        editor1 = K.create('#ccomment',{langType : 'en',width:'450px',height:'100',
        	items:['insertfile']
        });
    });
</script>
<link href="../Management/Styles/mainCss.css" type="text/css" rel="Stylesheet" />
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
	border-bottom:1px solid #C0C0C0;
}
.resright{ 
	width:410px; 
	border-left:1px solid #C0C0C0;
	border-bottom:1px solid #C0C0C0;
}
.top{ 
	border-top:1px solid #C0C0C0;
}
.hc{
    background:#FFFFDE;
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
<?php include("../Management/Client/topper.php") ?>
<table width="778" border="0" cellspacing="0" cellpadding="0" align="center" background="/images/index_bg.gif">
  <tr> 
    <td width="214" valign="top"> 
      <table width="214" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td valign="top"><br/>
            
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
      <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 524px;">
        <tr valign="top"> 
          <td> 
            <!--IndexPage.Content.Begin-->
            
          </td>
        </tr> 
        <tr> 
          <td class="style31">
				<div id="chead">
					Quick-teck Engineering Contact Form
				</div>
				<table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 520px;">
					<tr class="response top hc">
						<td class="resleft">
							<p><b><?php echo "Quick-teck";?></b></p>
							<p><?php echo date('d/m/Y H:i:s',$task->Ctime);?></p>
						</td>
						<td class="resright">
							<?php echo $task->Comment;?>
						</td>
					</tr>
				</table>
				<table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 520px;">
				<?php
				foreach($tcArray as $key=>$val)
				{
				?>
					<tr class="response <?php if((count($tcArray)%2!=0 && $num%2==0) || (count($tcArray)%2==0 && $num%2!=0)){echo 'hc';}?>">
						<td class="resleft">
							<p><b>
							<?php 
								if($val->Userid==$order->FirstName." ".$order->SurName){
									echo "You";
								}else{
									echo "Quick-teck";
								}
							?>
							</b></p>
							<p><?php echo date('d/m/Y H:i:s',$val->Ctime);?></p>
						</td>
						<td class="resright">
							<?php echo $val->Comment;?>
						</td>
					</tr>
				<?php
					$num--;
				}
				?>
				</table>
				<div class="response hc" style="height:150px;padding-top:5px;">
					<form method="post" action="doInsertResponse.php">
						<input type="hidden" id="tid" name="tid" value="<?php echo $taskId;?>" />
						<input type="hidden" id="orderId" name="orderId" value="<?php echo $orderId;?>" />
						<div style="float:left;">
							<textarea id="ccomment" name="comment" style=""></textarea>
						</div>
						<input type="submit" case="1" class="taskbt" value="submit" style="float:right;margin:30px 5px 0px 0px" />
					</form>
				</div>	
			<br/>
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