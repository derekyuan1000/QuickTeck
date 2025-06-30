<?php
session_start();
$eeId = $_GET[eeId];
$quantity = $_GET[quantity];
$ctrl = $_GET[ctrl];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Manufacturing,UK printed circuit board Online Quote,UK PCB Manufacturer,circuit board Prototype manufacture</title>
<meta name="description" content="Low Cost PCB Manufacturing,Online Quote PCB,pcb manufacture,UK circuit board Prototype Fabrication offering two layers prototype to multilayer PTH printed circuit board." />
<meta name="keywords" content="Low Cost PCB Manufacturing,Online Quote PCB price,pcb manufacturer,UK PCB Prototype Manufacture,pcbs,PCB Prototype Fabrication,Fabrication, double layers PCB prototype" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/css/accordion.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{
	position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;
}
.tdright{
 text-align:right;
 padding-right:15px;
}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="/rescources/js/ainatec.js"></script>
<script type="text/javascript" src="scripts/Script.js"></script>
<script type="text/javascript" src="../Management/Scripts/admin.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	<?php
		if($ctrl && $eeId && $quantity){
			echo "ajaxEEShoppingCar('EEShoppingCar','add', ".$eeId.", ".$quantity.");";
		}else{
			echo "ajaxEEShoppingCar('EEShoppingCar','load','',1);";
		}
	?>
});
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title="">Home</a> - <a href="#" title="">Components cart:</a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"><span class="ico_title">Components cart</span></div>
			<div class="left_box_c">
				<div class="mt10">
					<img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<a href="/forum/index.php" title="Quick-teck electronics engineering forum" target="_blank"><img src="/rescources/images/Electronics_forum.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
            <p class="c_f60 lh2em">
            <img alt="" src="../rescources/images/shoppingCar.gif">
            
            
            </p>
            <h3 class="title_main">
                Your shopping items</h3>
            <div class="online_from mt10">
                <table id="resultTable" cellspacing="0" cellpadding="0" width="100%" border="0" style="text-align: center;">
                    <tr>
                        <td class="w_111"><span style="color: Red;">Order code</span></td>
                        <td class="w255"><span style="color: Red;">Name</span></td>
                        <td class="w_111"><span style="color: Red;">Price</span></td>
                        <td class="w_111"><span style="color: Red;">Qty</span></td>
                        <td class="w_111"><span style="color: Red;">Sub-total</span></td>
                        <td><span style="color: Red;">Delete</span></td>
                    </tr>
                    <tr id="trEXCVATPrice" >
                        <td colspan="6" class="tdright">
							Total(exc VAT):&nbsp;<span style="color: Red;">&pound;<span id="excVATPrice"></span></span>
                        </td>
                    </tr>
                </table>
                <br/>
                <span style="font-size:15px">Quick order input</span>
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
					<tr>
						<td style="height: 25px; width:100px">
							&nbsp;Order code:&nbsp;
						</td>
						<td style="width:170px">
							&nbsp;&nbsp;<input id="orderCode" name="orderCode" type="text" class="adminMyInput150"/>
						</td>
						<td style="width:50px">
							&nbsp;Qty:&nbsp;
						</td>
						<td>
							&nbsp;&nbsp;<input id="qty" name="qty" type="text" class="adminMyInput40"/>
							&nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="../rescources/images/btn_buy.gif" onclick="javascript:ajaxEEShoppingCar('EEShoppingCar','add', '', '');"/>
						</td>
                    </tr>
                </table>
                <p class="mt10 tc">
                <input id="itemCount" name="itemCount" type="hidden"/>
                <?php    
						if($_SESSION[searchKeyWord]){
							echo "<input class=\"submit_bn250\" type=\"button\" value=\"Continue shopping\" name=\"Button1\" onclick=\"toList('searchList.php')\"/>";
						}else if($_SESSION[shoppingCarTypeId]){
							echo "<input class=\"submit_bn250\" type=\"button\" value=\"Continue shopping\" name=\"Button1\" onclick=\"toList('eeList.php?typeId=".$_SESSION[shoppingCarTypeId]."')\"/>";
						}else{
							echo "<input class=\"submit_bn250\" type=\"button\" value=\"Continue shopping\" name=\"Button1\" onclick=\"toList('eeList.php')\"/>";
						}
						unset($_SESSION[shoppingCarTypeId]);
                    ?>
                &nbsp;&nbsp;&nbsp;&nbsp;<input class="submit_bn250" type="button" value="Check out" name="Button1" onclick="toOrderInfo()"/></p>
            </div>
            <div class="clear">
            </div>
        </div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>