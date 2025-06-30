<?php
session_start();
$langdate['trackorder'][0]['english']='Home';
$langdate['trackorder'][0]['french']='Accueil';
$langdate['trackorder'][0]['dutch']='';
$langdate['trackorder'][0]['spanish']='';
$langdate['trackorder'][1]['english']='Tracking Order';
$langdate['trackorder'][1]['french']='Suivi de commande';
$langdate['trackorder'][1]['dutch']='';
$langdate['trackorder'][1]['spanish']='';
$langdate['trackorder'][2]['english']='Tracking order';
$langdate['trackorder'][2]['french']='Suivi de commande';
$langdate['trackorder'][2]['dutch']='';
$langdate['trackorder'][2]['spanish']='';
$langdate['trackorder'][3]['english']='You can track your order status here';
$langdate['trackorder'][3]['french']='Vous pouvez suivre l\'état de votre commande ci-dessous';
$langdate['trackorder'][3]['dutch']='';
$langdate['trackorder'][3]['spanish']='';
$langdate['trackorder'][4]['english']='Order Number';
$langdate['trackorder'][4]['french']='Numéro de Commande';
$langdate['trackorder'][4]['dutch']='';
$langdate['trackorder'][4]['spanish']='';
$langdate['trackorder'][5]['english']='Reference Number';
$langdate['trackorder'][5]['french']='Numéro de Référence';
$langdate['trackorder'][5]['dutch']='';
$langdate['trackorder'][5]['spanish']='';
$langdate['trackorder'][6]['english']='Track my order';
$langdate['trackorder'][6]['french']='Suivre ma commande';
$langdate['trackorder'][6]['dutch']='';
$langdate['trackorder'][6]['spanish']='';
$langdate['trackorder'][7]['english']='/rescources/images/banner02.jpg';
$langdate['trackorder'][7]['french']='/rescources/images/banner02_fr.jpg';
$langdate['trackorder'][7]['dutch']='';
$langdate['trackorder'][7]['spanish']='';
$langdate['trackorder'][8]['english']='Follow Us On';
$langdate['trackorder'][8]['french']='Suivez-Nous Sur';
$langdate['trackorder'][8]['dutch']='';
$langdate['trackorder'][8]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Manufacturing,UK printed circuit board Online Quote,UK PCB Manufacturer,circuit board Prototype manufacture</title>
<meta name="description" content="Low Cost PCB Manufacturing,Online Quote PCB,pcb manufacture,UK circuit board Prototype Fabrication offering two layers prototype to multilayer PTH printed circuit board." />
<meta name="keywords" content="Low Cost PCB Manufacturing,Online Quote PCB price,pcb manufacturer,UK PCB Prototype Manufacture,pcbs,PCB Prototype Fabrication,Fabrication, double layers PCB prototype" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
<script type="text/javascript">
function myOpen(url,height,width){
	window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
	}

</script>
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
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['trackorder'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['trackorder'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['trackorder'][2]);?></span> </div>
			<div class="left_box_c">
				<div class="mt10">
<img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<a href="/forum/index.php" title="Quick-teck electronics engineering forum" target="_blank"><img src="/rescources/images/Electronics_forum.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['trackorder'][8]);?></span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form name="form1" method="post" action="trackingResult.php">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['trackorder'][1]);?></h3>
					<div class="online_from" style="margin-top:25px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					  <tr>
						<td colspan="2"><span class="ico_j fs14 c_000"><?php Lang::EchoString2($langdate['trackorder'][3]);?>:</span></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['trackorder'][4]);?>[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/trackingorder_comment.php');">?</span>]:</td>
						<td><input type="text" name="number" id="number" /></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['trackorder'][5]);?>:</td>
						<td><input type="text" name="random" id="random" /></td>
					  </tr>
					</table>
					<p class="tc" style="margin-top:20px;"><input type="submit" value="<?php Lang::EchoString2($langdate['trackorder'][6]);?>" class="submit_bn" style="width:200px;background: url(/rescources/images/submit_bn180.png) no-repeat;"/></p>
				</div>

			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>