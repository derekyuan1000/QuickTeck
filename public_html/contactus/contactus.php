<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEAttributeValueService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Client_Class.php");
$langdate['contactus'][0]['english']='Home';
$langdate['contactus'][0]['french']='Accueil';
$langdate['contactus'][0]['dutch']='';
$langdate['contactus'][0]['spanish']='';
$langdate['contactus'][1]['english']='Contact us';
$langdate['contactus'][1]['french']='Contacts';
$langdate['contactus'][1]['dutch']='';
$langdate['contactus'][1]['spanish']='';
$langdate['contactus'][2]['english']='Contact us';
$langdate['contactus'][2]['french']='Formulaire de contact';
$langdate['contactus'][2]['dutch']='';
$langdate['contactus'][2]['spanish']='';
$langdate['contactus'][3]['english']='‘Quick-teck’ is a trading name of Quick-teck Electronics UK Ltd. <br>The company registered in England and Wales with company number 09615552, VAT number 114535342.';
$langdate['contactus'][3]['french']='‘Quick-teck’ is a trading name of Quick-teck Electronics UK Ltd. <br> The company registered in England and Wales with company number 09615552, VAT number 114535342.';
$langdate['contactus'][3]['dutch']='';
$langdate['contactus'][3]['spanish']='';
$langdate['contactus'][4]['english']='Contact Us';
$langdate['contactus'][4]['french']='Formulaire de contact';
$langdate['contactus'][4]['dutch']='';
$langdate['contactus'][4]['spanish']='';
$langdate['contactus'][5]['english']='A indicates field is required';
$langdate['contactus'][5]['french']='Champs obligatoires';
$langdate['contactus'][5]['dutch']='';
$langdate['contactus'][5]['spanish']='';
$langdate['contactus'][6]['english']='Testimonial';
$langdate['contactus'][6]['french']='Testimonial';
$langdate['contactus'][6]['dutch']='';
$langdate['contactus'][6]['spanish']='';
$langdate['contactus'][7]['english']='Email';
$langdate['contactus'][7]['french']='Courriel';
$langdate['contactus'][7]['dutch']='';
$langdate['contactus'][7]['spanish']='';
$langdate['contactus'][8]['english']='Company';
$langdate['contactus'][8]['french']='Entreprise';
$langdate['contactus'][8]['dutch']='';
$langdate['contactus'][8]['spanish']='';
$langdate['contactus'][9]['english']='Phone';
$langdate['contactus'][9]['french']='Téléphone';
$langdate['contactus'][9]['dutch']='';
$langdate['contactus'][9]['spanish']='';
$langdate['contactus'][10]['english']='Message';
$langdate['contactus'][10]['french']='Message';
$langdate['contactus'][10]['dutch']='';
$langdate['contactus'][10]['spanish']='';
$langdate['contactus'][11]['english']='/rescources/images/banner02.jpg';
$langdate['contactus'][11]['french']='/rescources/images/banner02_fr.jpg';
$langdate['contactus'][11]['dutch']='';
$langdate['contactus'][11]['spanish']='';
$langdate['contactus'][12]['english']='Submit';
$langdate['contactus'][12]['french']='Soumettre';
$langdate['contactus'][12]['dutch']='';
$langdate['contactus'][12]['spanish']='';
$langdate['contactus'][14]['english']='visibility:hidden;';
$langdate['contactus'][14]['french']='';
$langdate['contactus'][14]['dutch']='';
$langdate['contactus'][14]['spanish']='';
$langdate['contactus'][15]['english']='Verification code';
$langdate['contactus'][15]['french']='Code de vérification';
$langdate['contactus'][15]['dutch']='';
$langdate['contactus'][15]['spanish']='';
$langdate['contactus'][16]['english']='Try a different image';
$langdate['contactus'][16]['french']='Essayer une autre image';
$langdate['contactus'][16]['dutch']='';
$langdate['contactus'][16]['spanish']='';

$eeId = !empty($_GET['eeId'])?$_GET['eeId']:"";
$type = !empty($_GET['type'])?$_GET['type']:"";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UK PCB Manufacturer quote online,UK PCB low cost Manufacturer, low cost printed circuit board manufacture,Prototype manufacturer,pcb fabrication</title>
<meta name="description" content="Contact low cost PCB manufacturing as UK Printed circuit board manufacturer,offering prototypes to volume production PCBs at low price,online quote." />
<meta name="keywords" content="Quick-teck Printed Circuit board manufacturing in UK, online quote as UK PCB manufacturer, offering prototypes to volume production PCBs at low price and instant online price quote." />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><!--CharSet-->
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
<script type="text/javascript">
function getNewPic() {
		$("#checkPic").attr("src",$("#checkPic").attr("src")+"?"+Math.random());
};
</script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['contactus'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['contactus'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['contactus'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/contactus/contactus.php" title="" class="on"><?php Lang::EchoString2($langdate['contactus'][2]);?></a></li>
						<li><a href="/contactus/testimonial/index.php" title=""><?php Lang::EchoString2($langdate['contactus'][6]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
					<a href="/contactus/testimonial/index.php" title=""><img src="/rescources/images/03.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/FAQ/FAQ.php#Shipping_001" title=""><img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form method="post">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['contactus'][4]);?></h3>
					<div class="online_from mt10">


                    <br /> <br />
<p style="font-size:15px;"><?php Lang::EchoString2($langdate['contactus'][3]);?></p>					
				
					<div style="background:#F9F9F9;border:1px solid #F30;margin-top:20px;padding:20px;height:190px;">
					<p style="float:left;width:250px;font-size:15px;">
					
                         Email:  <a href="mailto:info@quick-teck.co.uk">info@quick-teck.co.uk</a><br />
                         Tel: 01480-764976<br />
				      
						 <br/>
                         Contact address:<br />
					     &nbsp;&nbsp;&nbsp;&nbsp;Quick-teck Electronics Ltd<br />
						 &nbsp;&nbsp;&nbsp;&nbsp;Unit 3,Clare Hall<br />
				         &nbsp;&nbsp;&nbsp;&nbsp;St. Ives Business Park<br />
				         &nbsp;&nbsp;&nbsp;&nbsp;St Ives, Cambridgeshire<br />
				         &nbsp;&nbsp;&nbsp;&nbsp;PE27 4WY<br /><br />
                          UK VAT No:114535342<br />
					   UK Company No:09615552<br /> 
					</p>
				    
					</div>
					<div style="background:#F9F9F9;border:1px solid #ccc;margin-top:10px;padding:3px 5px 5px 3px;height:75px; <?php Lang::EchoString2($langdate['contactus'][14]);?>">

					</div>
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>