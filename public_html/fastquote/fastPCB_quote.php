<?php
session_start();
$langdate['fastquote'][0]['english']='Home';
$langdate['fastquote'][0]['french']='Accueil';
$langdate['fastquote'][0]['dutch']='';
$langdate['fastquote'][0]['spanish']='';
$langdate['fastquote'][1]['english']='Fast quote';
$langdate['fastquote'][1]['french']='Devis rapide';
$langdate['fastquote'][1]['dutch']='';
$langdate['fastquote'][1]['spanish']='';
$langdate['fastquote'][2]['english']='Fast PCB Quote';
$langdate['fastquote'][2]['french']='Devis Rapide de Circuit Imprimé';
$langdate['fastquote'][2]['dutch']='';
$langdate['fastquote'][2]['spanish']='';
$langdate['fastquote'][3]['english']='Enter details of the job information. We will get back to you with the PCB manufacturing quotation within 8 working hours';
$langdate['fastquote'][3]['french']='Communiquez-nous les détails de votre projet. Vous recevrez un devis de fabrication de circuit imprimé dans les 8 prochaines heures ouvrées';
$langdate['fastquote'][3]['dutch']='';
$langdate['fastquote'][3]['spanish']='';
$langdate['fastquote'][4]['english']='Your name';
$langdate['fastquote'][4]['french']='Nom';
$langdate['fastquote'][4]['dutch']='';
$langdate['fastquote'][4]['spanish']='';
$langdate['fastquote'][5]['english']='Email';
$langdate['fastquote'][5]['french']='Courriel';
$langdate['fastquote'][5]['dutch']='';
$langdate['fastquote'][5]['spanish']='';
$langdate['fastquote'][6]['english']='Company';
$langdate['fastquote'][6]['french']='Entreprise';
$langdate['fastquote'][6]['dutch']='';
$langdate['fastquote'][6]['spanish']='';
$langdate['fastquote'][7]['english']='Phone number';
$langdate['fastquote'][7]['french']='Téléphone';
$langdate['fastquote'][7]['dutch']='';
$langdate['fastquote'][7]['spanish']='';
$langdate['fastquote'][8]['english']='Country';
$langdate['fastquote'][8]['french']='Pays';
$langdate['fastquote'][8]['dutch']='';
$langdate['fastquote'][8]['spanish']='';
$langdate['fastquote'][9]['english']='Quantity';
$langdate['fastquote'][9]['french']='Quantité';
$langdate['fastquote'][9]['dutch']='';
$langdate['fastquote'][9]['spanish']='';
$langdate['fastquote'][10]['english']='Layers';
$langdate['fastquote'][10]['french']='Couches';
$langdate['fastquote'][10]['dutch']='';
$langdate['fastquote'][10]['spanish']='';
$langdate['fastquote'][11]['english']='Additional information';
$langdate['fastquote'][11]['french']='Informations complémentaires';
$langdate['fastquote'][11]['dutch']='';
$langdate['fastquote'][11]['spanish']='';
$langdate['fastquote'][12]['english']='Attach Manufacturing file';
$langdate['fastquote'][12]['french']='Joindre un ficher de fabrication';
$langdate['fastquote'][12]['dutch']='';
$langdate['fastquote'][12]['spanish']='';
$langdate['fastquote'][13]['english']='Submit';
$langdate['fastquote'][13]['french']='Soumettre';
$langdate['fastquote'][13]['dutch']='';
$langdate['fastquote'][13]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UK PCB Manufacturer,PCB manufacturer Quote,LOW COST UK PCB Manufacturer,Printed circuit board protype manufacturer</title>
<meta name="description" content="UK PCB manufacturing,low cost PCB,UK manufacturer,printed circuit board manufacturer,online quote prototype PCB to multilayer volume production PCBs at low price"/>
<meta name="keywords" content="UK PCB price check low cost PCB,UK manufacturer,printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/styles/nyroModal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
input[type=radio]{margin:0 5px 0 10px;}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.nyroModal.custom.js"></script> 
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
<!--[if IE 6]> 
<script type="text/javascript" src="js/jquery.nyroModal-ie6.js"></script> 
<![endif]--> 
<script type="text/javascript"> 
$(function() { 
$('.nyroModal').nyroModal(); 
}); 
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
function myOpen(url,height,width){
window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
}

function openwindow(url,name,iWidth,iHeight)
{
var url;
var name;
var iWidth;
var iHeight;
var iTop = (window.screen.availHeight-30-iHeight)/2;
var iLeft = (window.screen.availWidth-10-iWidth)/2;
window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
}
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['fastquote'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['fastquote'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['fastquote'][2]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/fastquote/fastPCB_quote.php" title="" class="on"><?php Lang::EchoString2($langdate['fastquote'][2]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
				<a href="#" title=""><img src="/rescources/images/01.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<a href="#" title=""><img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<a href="#" title=""><img src="/rescources/images/03.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<a href="#" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<a href="#" title=""><img src="/rescources/images/04.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img1.gif" width="30" height="30" alt="" />&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></p>
			</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>
				<div class="w710 fr mt10">
				<form name="form2" method="post"  action="fast_quote_form.php" enctype="multipart/form-data">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['fastquote'][2]);?> </h3>
					<div class="online_from mt10">
					<p class="fs14"><?php Lang::EchoString2($langdate['fastquote'][3]);?>.</p>
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="mt10" >
					  <tr>
						<td width="168" class="w_168"><span class="c_f30">*</span><?php Lang::EchoString2($langdate['fastquote'][4]);?>: </td>
						<td><input type=text name="name" size="28" /></td>
					  </tr>
					  <tr>
						<td class="w_168"><span class="c_f30">*</span><?php Lang::EchoString2($langdate['fastquote'][5]);?>:  </td>
						<td><input type=text name="email" size="28" />&nbsp; </td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['fastquote'][6]);?>:  </td>
						<td><input type=text name="company" size="28" />&nbsp; </td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['fastquote'][7]);?>:  </td>
						<td><input type=text name="phone" />&nbsp; </td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['fastquote'][8]);?>:  </td>
						<td>
							<select name="country" id="country" style="width: 155px">
								<option value="UK" selected="selected">UK</option>
								<option value="France">France</option>
								<option value="Ireland">Ireland</option>
								<option value="Germany">Germany</option>
								<option value="Belgium">Belgium</option>
								<option value="Denmark">Denmark</option>
								<option value="Netherlands">Netherlands</option>
								<option value="Spain">Spain</option>
								<option value="Italy">Italy</option>
								<option value="Other countries">Other countries</option>
							</select>
						</td>
					  </tr>
					  <tr>
						<td class="w_168"><span class="c_f30">*</span><?php Lang::EchoString2($langdate['fastquote'][9]);?>:  </td>
						<td><input name="quantity" type="text" /></td>
					  </tr>
					  <tr>
						<td class="w_168"><span class="c_f30">*</span><?php Lang::EchoString2($langdate['fastquote'][10]);?>: </td>
						<td><input name="layers" type="text" /></td>
					  </tr>
					  <tr>
						<td class="w_168">Surface:</td>
						<td>
							<input name="surface" type="radio" value="HASL (not RoHS)" />HASL (not RoHS)
							<input name="surface" type="radio" value="HASL (lead free)" />HASL (lead free) 
							<input name="surface" type="radio" value="Electrolytic Gold" />Electrolytic Gold
							<input name="surface" type="radio" value="OSP" />OSP
							<input name="surface" type="radio" value="Electroless Nickel/Immersion Gold" />Electroless Nickel/Immersion Gold
						</td>
					  </tr>
					   <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['fastquote'][11]);?>[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/fastPCBquote_comment.php');">?</span>]:</td>
						<td>
							<textarea name="message" cols="42" rows="5"></textarea>
						</td>
					  </tr>
					   <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['fastquote'][12]);?>:
							(Max. file size 2MB)</td>
						<td>
							<input type="file" name="uploaded" style="width: 191px; height: 23px"/> <br/>
							RS274-X format Gerber is the standard manufacturing data we used. 
						</td>
					  </tr>
					</table>
					<p class="mt10 tc"><input type="submit" value="<?php Lang::EchoString2($langdate['fastquote'][13]);?>" class="submit_bn" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
			</form>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>