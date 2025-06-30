<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low Cost PCB Manufacturer,Online Quote,UK PCB Manufacturer,Printed circuit board manufacturer,low price PCB,online quote</title>
<meta name="description" content="UK PCB Manufacturer, Online quote,printed circuit board manufacturer,UK PCB Prototype Fabrication offering two layers prototype to multi-layer printed circuit boards,online quote." />
<meta name="keywords" content="Low Cost PCB Manufacturer,Printed circuit board Online quote, pcb manufacturer, UK PCB Prototype Manufacturer,pcbs,PCB Prototype Fabrication, Fabrication,two layers prototype, multi-layers printed circuit boards prototype online quote" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
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
</script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title="">Home</a> - <a href="#" title="">Fast PCB quote</a> </div>
		<div class="fl mt10 left_box">
			<div class="left_box_t"></div>
			<div class="left_box_c">
				<div class="mt10">
					<a href="/PayMethod.php" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" /></a>
					<a href="/OrderFromEurope.php" title=""><img src="/rescources/images/opb.jpg" width="233" height="75" alt="" class="ml10 mt10" /></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
					<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
					&nbsp;&nbsp;&nbsp;
					<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
							<div class="main_box clearbox">
							<img src="/rescources/images/em.png" width="46" height="46" alt="" class="nr_m10 fl" />
							<div class="right_box1 fr lh1.6em mt15">
								<span class="c_f30 ">&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
$to = "pcb_prototype@hotmail.co.uk,info@quick-teck.co.uk" ; 
$from = $_REQUEST['email'] ; 
$bcc = "1226983621@qq.com";

$to_ch = "info@quick-teck.co.uk";//Chinese Email To
$from_ch = $_REQUEST['email'] ; //Chinese Email From

$name = $_REQUEST['name'] ; 
//$headers = "From: $from"; 
$headers = "From:$from\r\nBCC:$bcc\r\nContent-type:text/html; charset=utf-8";
$subject = "Fast PCB Quote Form"; 

$fields = array(); 
$fields{"name"} = "Name"; 
$fields{"email"} = "Email";
$fields{"phone"} = "Phone"; 
$fields{"company"} = "Company"; 
$fields{"country"} = "Country"; 
$fields{"quantity"} = "Quantity"; 
$fields{"layers"} = "Layers"; 
$fields{"surface"} = "Surface"; 
$fields{"message"} = "Message"; 

/*$body = "We have received a PCB job quotation:
		The uploade manufacturing file is:\" ". basename( $_FILES['uploaded']['name']). " \"
		<br>The order information is the following: <br>";*/
$body = "Fast PCB quote form.<br><br>The uploade manufacturing file is:\" ". basename( $_FILES['uploaded']['name']). " \"<br>";

foreach($fields as $a => $b){ $body .= sprintf("%20s: %s<br>",$b,$_REQUEST[$a]); } 

$headers2 = "From: info@quick-teck.co.uk"; 
$subject2 = "Thank you for contacting us."; 
$autoreply = "Thank you for contacting us. Somebody will get back to you as soon as possible, usualy within 24 hours. If you have any more questions, please consult our website at www.quick-teck.co.uk";

if($from == '') {print "You have not entered an email, please go back and try again";} 
else { 
if($name == '') {print "You have not entered a name, please go back and try again";} 
else { 
$send = mail($to, $subject, $body, $headers); 
/*$send2 = mail($from, $subject2, $autoreply, $headers2); */

if($send) 
/*{header( "Location: http://www.quick-teck.co.uk/thankyou.html" );} */
{
print "<br />"; 
print " Hi $name, <br/><br/>
Thank you for contacting us."; 
}

else 
{print "We encountered an error sending your mail, please notify info@quick-teck.co.uk"; } 
}
}


$target = "../../public_ftp/layout_quote/"; 
$target = $target . basename( $_FILES['uploaded']['name']) ; 
$ok=1; 

//This is our size condition 
if ($uploaded_size > 2000000) 
{ 
echo "Your file is too large.<br>"; 
$ok=0; 
} 

//This is our limit file type condition 
if ($uploaded_type =="text/php") 
{ 
echo "No PHP files<br>"; 
$ok=0; 
} 
 
//Here we check that $ok was not set to 0 by an error 

if ($ok==0) 
{ 
Echo "Sorry your file was not uploaded. Please contact with info@quick-teck.co.uk for help"; 
} 

//If everything is ok we try to upload it 
else 
{ 
if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
{ 
echo "Your file \" ".basename( $_FILES['uploaded']['name']). " \" has been uploaded.<br> ";
echo " We will contact you shortly."; 
echo " <br><br><br>"; 
echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Quick-teck ";

} 
else 
{ 
echo " We will contact you shortly."; 
echo " <br><br><br>"; 
echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Quick-teck"; 
} 
} 

include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/PdfMailer_Class.php");
$mail_ch = new PdfMailer(); 
$mail_ch->setFrom($from_ch); 
$mail_ch->setTo($to_ch);
$mail_ch->setBCC($bcc);
$mail_ch->setSubject($subject);
$mail_ch->buildTextMessage($body);
if(is_file($target)){
	$mail_ch->appendFiles($target, basename( $_FILES['uploaded']['name']));
}
$send_ch = $mail_ch->sendMail();
?>			
</span>
								</p>
							</div>
							<div class="clear"></div>
						</div>
				</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>