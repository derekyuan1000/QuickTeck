<?php
session_start();
$langdate['selectTakeOrder'][0]['english']='Home';
$langdate['selectTakeOrder'][0]['french']='Accueil';
$langdate['selectTakeOrder'][0]['dutch']='';
$langdate['selectTakeOrder'][0]['spanish']='';
$langdate['selectTakeOrder'][1]['english']='Order now';
$langdate['selectTakeOrder'][1]['french']='Passer une commande';
$langdate['selectTakeOrder'][1]['dutch']='';
$langdate['selectTakeOrder'][1]['spanish']='';
$langdate['selectTakeOrder'][2]['english']='Order PCB';
$langdate['selectTakeOrder'][2]['french']='Commander des PCB';
$langdate['selectTakeOrder'][2]['dutch']='';
$langdate['selectTakeOrder'][2]['spanish']='';
$langdate['selectTakeOrder'][3]['english']='Order Portal';
$langdate['selectTakeOrder'][3]['french']='Portail de Commande';
$langdate['selectTakeOrder'][3]['dutch']='';
$langdate['selectTakeOrder'][3]['spanish']='';
$langdate['selectTakeOrder'][4]['english']='You can choose one of the following ways to place your PCB order.';
$langdate['selectTakeOrder'][4]['french']='Passer votre commande de l\'une des manières suivantes.';
$langdate['selectTakeOrder'][4]['dutch']='';
$langdate['selectTakeOrder'][4]['spanish']='';
$langdate['selectTakeOrder'][5]['english']='Login and place an order';
$langdate['selectTakeOrder'][5]['french']='Se connecter et passer une commande';
$langdate['selectTakeOrder'][5]['dutch']='';
$langdate['selectTakeOrder'][5]['spanish']='';
$langdate['selectTakeOrder'][6]['english']='Register and place an order';
$langdate['selectTakeOrder'][6]['french']='S\'inscrire et passer une commande';
$langdate['selectTakeOrder'][6]['dutch']='';
$langdate['selectTakeOrder'][6]['spanish']='';
$langdate['selectTakeOrder'][7]['english']='Place an order without registering';
$langdate['selectTakeOrder'][7]['french']='Passer une commande sans s\'inscrire';
$langdate['selectTakeOrder'][7]['dutch']='';
$langdate['selectTakeOrder'][7]['spanish']='';
$langdate['selectTakeOrder'][8]['english']='/rescources/images/banner02.jpg';
$langdate['selectTakeOrder'][8]['french']='/rescources/images/banner02_fr.jpg';
$langdate['selectTakeOrder'][8]['dutch']='';
$langdate['selectTakeOrder'][8]['spanish']='';
$langdate['selectTakeOrder'][9]['english']='Order Electronic components';
$langdate['selectTakeOrder'][9]['french']='Composants électroniques';
$langdate['selectTakeOrder'][9]['dutch']='';
$langdate['selectTakeOrder'][9]['spanish']='';
$langdate['selectTakeOrder'][10]['english']='Follow Us On';
$langdate['selectTakeOrder'][10]['french']='Suivez-Nous Sur';
$langdate['selectTakeOrder'][10]['dutch']='';
$langdate['selectTakeOrder'][10]['spanish']='';
$langdate['selectTakeOrder'][11]['english']='Order 3D Model';
$langdate['selectTakeOrder'][11]['french']='Order 3D Model';
$langdate['selectTakeOrder'][11]['dutch']='';
$langdate['selectTakeOrder'][11]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,circuit board manufacturering</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
.tab_switch{
	width: 590px;
	background-color:#EEE0E5;
	height: 34px;
	line-height: 34px;
    font-size: 16px;
    text-align: center;
    font-weight: normal;
    margin-top: 20px;
    border-bottom: 2px solid #ff8c00;
}
.tab-container{
	padding: 30px 10px;
	text-align: center;
	background-color: #FFFAFA;
    border-left: 1px solid #ff8c00;
    border-bottom: 1px solid #ff8c00;
    border-right: 1px solid #ff8c00;
}
.title_tab{width: 290px;display: inline-block;cursor: pointer;height: 34px;line-height: 34px;padding: 0 0;margin: 0 0;float:right;}
.default{float:left;}
.txet_p{margin-left: 118px;}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
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
<script type="text/javascript">
$(function(){
    $('.title_tab').each(function(){
        $(this).css({
            'background-color' : "#EEE0E5",
            'color'      : "#454545"
        });
        $($(this).attr('href')).hide();
    });
    $('.default').css({
        'background-color': '#ff8c00',
        'color'      : "#fff"
    });
    $($('.default').attr('href')).show();
    $('.title_tab').click(function(){
        $($(this).attr('href')).show();
        $('.title_tab').each(function(){
            $(this).css({
                'background-color' : "#EEE0E5",
                'color'      : "#454545"
            });
            $($(this).attr('href')).hide();
        });
        $($(this).attr('href')).show();
        $(this).css({
            'background-color': '#ff8c00',
            'color'      : "#fff"
        });
    });
});
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php 
if(!empty($_SESSION[currentClient]))
{
	echo "<script type='text/javascript'>location.href='../order/takeorder.php?isLogin=yes';</script>";
	exit();
}
?>
<?php include '../static/header.php';?>
	<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['selectTakeOrder'][8]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['selectTakeOrder'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/clients/selectTakeOrderType.php" title="" class="on"><?php Lang::EchoString2($langdate['selectTakeOrder'][2]);?></a></li>
						<li><a href="/ElectronicElement/orderNow.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][9]);?></a></li>
						<li><a href="/3DPrinting/selectTakeOrderType.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][11]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
					<img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['selectTakeOrder'][10]);?></span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>	
		</div>
		<div class="w710 fr mt10">
			<h3 class="title_main"><?php Lang::EchoString2($langdate['selectTakeOrder'][3]);?></h3>
			<div class="main_box clearbox mt10">
				<img src="/rescources/images/img_b.gif" width="45" height="45" alt="" class="nr_m10 fl" />
				<div class="right_box1 fr lh2em mr10" style="padding-bottom:30px;">
					<p style="font-size:18px;"><?php Lang::EchoString2($langdate['selectTakeOrder'][4]);?></p>

					<div class="tab_switch">
	                    <div class="title_tab default" href="#from_uk">Despatched from UK</div>
	                    <div class="title_tab"  href="#from_china">Despatched from China</div>
	                </div>
	                <div class="tab-container">
	                	<div id="from_uk">
		                	<p class="txet_p"><a href="clients/clientLogin.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][5]);?> [From UK]</a></p>
							<p class="txet_p"><a href="clients/register_newClient.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][6]);?> [From UK]</a></p>
							<p class="txet_p"><a href="order/takeorder.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][7]);?> [From UK]</a> [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'comment/not_register_comment.php');">?</span>]</p>
		                </div>
		                <div id="from_china">
		                	<p class="txet_p"><a href="clients/clientLogin.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][5]);?> [From China]</a></p>
							<p class="txet_p"><a href="clients/register_newClient.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][6]);?> [From China]</a></p>
							<p class="txet_p"><a href="sinoOrder/takeorder.php" title=""><?php Lang::EchoString2($langdate['selectTakeOrder'][7]);?> [From China]</a> [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'comment/not_register_comment.php');">?</span>]</p>
		                </div>
	                </div>

				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>