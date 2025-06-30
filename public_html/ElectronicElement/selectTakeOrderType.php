<?php
session_start();
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
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
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
<body>
<?php 
if(!empty($_SESSION[currentClient]))
{
	echo "<script type='text/javascript'>location.href='eeOrderInfo.php?isLogin=yes';</script>";
	return;
}else{
	$_SESSION[returnPage] = "../ElectronicElement/eeOrderInfo.php?isLogin=yes";
}
?>
	<div class="dialogWindowBin" id="dialogWindowBin"></div>
	<div class="w710 mt10" style="margin:auto">
		<div class="main_box clearbox mt10">
			<img src="/rescources/images/img_b.gif" width="45" height="45" alt="" class="nr_m10 fl" />
			<div class="right_box1 fr lh2em mr10">
				<p style="font-size:18px;">You can choose one of the following ways to place your order.</p>
				<p class="txet_p"><a href="/clients/clientLogin.php" title="">Login and place an order</a></p>
				<p class="txet_p"><a href="/clients/register_newClient.php" title="">Register and place an order</a></p>
				<p class="txet_p"><a href="eeOrderInfo.php" title="">Place an order without registering</a> [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/not_register_comment.php');">?</span>]</p>
			</div>
			<div class="clear"></div>
		</div>

	</div>
	<div class="clear"></div>


</body>
</html>