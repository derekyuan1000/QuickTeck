<?php
session_start();
$_SESSION['saveForm2']=$_POST['formRecord'];
if($_POST['total']==0)
{
	//header("Location:/fastquote/fastPCB_quote.php");
	echo '<script type="text/javascript">alert("Please use the fast quote form before you place this order!");window.location.href="/fastquote/fastPCB_quote.php";</script>';
	exit();
}
$langdate['takeorder3'][0]['english']='Home';
$langdate['takeorder3'][0]['french']='Accueil';
$langdate['takeorder3'][0]['dutch']='';
$langdate['takeorder3'][0]['spanish']='';
$langdate['takeorder3'][1]['english']='Order now';
$langdate['takeorder3'][1]['french']='Passer une commande';
$langdate['takeorder3'][1]['dutch']='';
$langdate['takeorder3'][1]['spanish']='';
$langdate['takeorder3'][2]['english']='Please upload your PCB file here';
$langdate['takeorder3'][2]['french']='Téléchargez votre ficihier de circuit imprimé ici';
$langdate['takeorder3'][2]['dutch']='';
$langdate['takeorder3'][2]['spanish']='';
$langdate['takeorder3'][3]['english']='Follow Us On';
$langdate['takeorder3'][3]['french']='Suivez-Nous Sur';
$langdate['takeorder3'][3]['dutch']='';
$langdate['takeorder3'][3]['spanish']='';
$langdate['takeorder3'][4]['english']='/rescources/images/pcborderform_3.png';
$langdate['takeorder3'][4]['french']='/rescources/images/pcborderform_3_fr.png';
$langdate['takeorder3'][4]['dutch']='';
$langdate['takeorder3'][4]['spanish']='';
$langdate['takeorder3'][5]['english']='Back';
$langdate['takeorder3'][5]['french']='Précédent';
$langdate['takeorder3'][5]['dutch']='';
$langdate['takeorder3'][5]['spanish']='';
$langdate['takeorder3'][6]['english']='Next';
$langdate['takeorder3'][6]['french']='Continuer';
$langdate['takeorder3'][6]['dutch']='';
$langdate['takeorder3'][6]['spanish']='';
$langdate['takeorder3'][7]['english']='/rescources/images/banner02.jpg';
$langdate['takeorder3'][7]['french']='/rescources/images/banner02_fr.jpg';
$langdate['takeorder3'][7]['dutch']='';
$langdate['takeorder3'][7]['spanish']='';
$langdate['takeorder3'][8]['english']='You don\'t need to upload the manufacturing files as the manufacturing documents for';
$langdate['takeorder3'][8]['french']='Vous n\'avez pas besoin d\'uploader les fichiers de productions si les fichiers de la précédente commande(';
$langdate['takeorder3'][8]['dutch']='';
$langdate['takeorder3'][8]['spanish']='';
$langdate['takeorder3'][9]['english']='will be used for this order';
$langdate['takeorder3'][9]['french']=')doivent être utilisées pour cette commande';
$langdate['takeorder3'][9]['dutch']='';
$langdate['takeorder3'][9]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
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
function checkfile()
{
	if(document.getElementById("uploadfile") != null){
		var filename=document.getElementById("uploadfile").value;
		if(filename==""){
			alert('Please zip your manufacture files and upload it here.');
			return false;
		}else{
			return true;
		}
	}else{
		return true;
	}
}
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['takeorder3'][7]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['takeorder3'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['takeorder3'][1]);?></a> </div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['takeorder3'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="#" title="" class="on"><?php Lang::EchoString2($langdate['takeorder3'][1]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
					<a href="/PayMethod.php" title=""><img src="/rescources/images/paypal.jpg" width="233" height="75" alt="" class="ml10" /></a>
					<a href="/OrderFromEurope.php" title=""><img src="/rescources/images/opb.jpg" width="233" height="75" alt="" class="ml10 mt10" /></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['takeorder3'][3]);?></span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form enctype="multipart/form-data" name="calc" id="calc" action="order-submitN.php" method="post" style="width: 100%;" class="style1" onsubmit="return checkfile();">
				<input type="hidden" name="formRecord" value=""/>
				<input type="hidden" name="firstName_out" value="<?php echo $_POST['firstName_out']?>"/>
				<input type="hidden" name="surname_out" value="<?php echo $_POST['surname_out']?>"/>
				<input type="hidden" name="company_out" value="<?php echo $_POST['company_out']?>"/>
				<input type="hidden" name="email_out" value="<?php echo $_POST['email_out']?>"/>
				<input type="hidden" name="phone_out" value="<?php echo $_POST['phone_out']?>"/>
				<input type="hidden" name="deliveryaddress1_out" value="<?php echo $_POST['deliveryaddress1_out']?>"/>
				<input type="hidden" name="deliveryaddress2_out" value="<?php echo $_POST['deliveryaddress2_out']?>"/>
				<input type="hidden" name="cityTown_out" value="<?php echo $_POST['cityTown_out']?>"/>
				<input type="hidden" name="deliverypostcode_out" value="<?php echo $_POST['deliverypostcode_out']?>"/>
				<input type="hidden" name="country_out" value="<?php echo $_POST['country_out']?>"/>  
				<input type="hidden" name="firstName" value="<?php echo $_POST['firstName']?>"/>
				<input type="hidden" name="surname" value="<?php echo $_POST['surname']?>"/>
				<input type="hidden" name="company" value="<?php echo $_POST['company']?>"/>
				<input type="hidden" name="email" value="<?php echo $_POST['email']?>"/>
				<input type="hidden" name="phone" value="<?php echo $_POST['phone']?>"/>
				<input type="hidden" name="deliveryaddress1" value="<?php echo $_POST['deliveryaddress1']?>"/>
				<input type="hidden" name="deliveryaddress2" value="<?php echo $_POST['deliveryaddress2']?>"/>
				<input type="hidden" name="cityTown" value="<?php echo $_POST['cityTown']?>"/>
				<input type="hidden" name="deliverypostcode" value="<?php echo $_POST['deliverypostcode']?>"/>
				<input type="hidden" name="country" value="<?php echo $_POST['country']?>"/> 
				<!--  mian 2 -->
				<input type="hidden" name="layer" value="<?php echo $_POST['layer']?>"/>
				<input type="hidden" name="quantity" value="<?php echo $_POST['quantity']?>"/>
				<input type="hidden" name="length" value="<?php echo $_POST['length']?>"/>
				<input type="hidden" name="width" value="<?php echo $_POST['width']?>"/>
				<input type="hidden" name="material" value="<?php echo $_POST['material']?>"/>
				<input type="hidden" name="thickness" value="<?php echo $_POST['thickness']?>"/>
				<input type="hidden" name="weight" value="<?php echo $_POST['weight']?>"/>
				<input type="hidden" name="soldermask" value="<?php echo $_POST['soldermask']?>"/>
				<input type="hidden" name="soldermaskcolor" value="<?php echo $_POST['soldermaskcolor']?>"/>
				<input type="hidden" name="silkscreen" value="<?php echo $_POST['silkscreen']?>"/>
				<input type="hidden" name="surface" value="<?php echo $_POST['surface']?>"/>
				<input type="hidden" name="days" value="<?php echo $_POST['days']?>"/>
				<input type="hidden" name="sameDesign" value="<?php echo $_POST['sameDesign']?>"/>
				<input type="hidden" name="historyOrderNumber" value="<?php echo $_POST['historyOrderNumber']?>"/>
				<input type="hidden" name="prototype" value="<?php echo $_POST['prototype']?>"/>
				<input type="hidden" name="needStencil" value="<?php echo $_POST['needStencil']?>"/>
				<input type="hidden" name="stencilType" value="<?php echo $_POST['stencilType']?>"/>
				<input type="hidden" name="tech" value="<?php echo $_POST['tech']?>"/>
				<input type="hidden" name="haveVAT" value="<?php echo $_POST['haveVAT']?>"/>
				<input type="hidden" name="VATNumber" value="<?php echo $_POST['VATNumber']?>"/>
				<input type="hidden" name="voucherNumber" value="<?php echo $_POST['voucherNumber']?>"/>
				<input type="hidden" name="Apply" value="<?php echo $_POST['Apply']?>"/>
				<input type="hidden" name="discount" value="<?php echo $_POST['discount']?>"/>
				<input type="hidden" name="Button1" value="<?php echo $_POST['Button1']?>"/>
				<input type="hidden" name="total" value="<?php echo $_POST['total']?>"/>
				<input type="hidden" name="price0" value="<?php echo $_POST['price0']?>"/>
				<input type="hidden" name="price1" value="<?php echo $_POST['price1']?>"/>
				<input type="hidden" name="price2" value="<?php echo $_POST['price2']?>"/>
				<input type="hidden" name="price3" value="<?php echo $_POST['price3']?>"/>
				<input type="hidden" name="price4" value="<?php echo $_POST['price4']?>"/>
				<input type="hidden" name="price5" value="<?php echo $_POST['price5']?>"/>
				<input type="hidden" name="price6" value="<?php echo $_POST['price6']?>"/>
				<input type="hidden" name="price7" value="<?php echo $_POST['price7']?>"/>
				<input type="hidden" name="price8" value="<?php echo $_POST['price8']?>"/>
				<input type="hidden" name="price9" value="<?php echo $_POST['price9']?>"/>
				<input type="hidden" name="price10" value="<?php echo $_POST['price10']?>"/>
				<input type="hidden" name="price11" value="<?php echo $_POST['price11']?>"/>
				<input type="hidden" name="price12" value="<?php echo $_POST['price12']?>"/>
				<input type="hidden" name="price13" value="<?php echo $_POST['price13']?>"/>
				<input type="hidden" name="price14" value="<?php echo $_POST['price14']?>"/>
				<input type="hidden" name="price15" value="<?php echo $_POST['price15']?>"/>
				<input type="hidden" name="price16" value="<?php echo $_POST['price16']?>"/>
				<input type="hidden" name="price17" value="<?php echo $_POST['price17']?>"/>
				<input type="hidden" name="price18" value="<?php echo $_POST['price18']?>"/>
				<input type="hidden" name="ULmarking" value="<?php echo $_POST['ULmarking']?>"/>
				<input type="hidden" name="message" value="<?php echo $_POST['message']?>"/>
				<input type="hidden" name="terms" value="<?php echo $_POST['terms']?>"/>
				<!--  end mian 2 -->
					<div class="lc_title"><img src="<?php Lang::EchoString2($langdate['takeorder3'][4]);?>" width="710" height="39" alt="" /></div>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
						<tr style="height:100px;">
					  	 <td colspan="4">
							<?php if(!$_POST['sameDesign']){ ?>
							<span style="font-size:16px;"><?php Lang::EchoString2($langdate['takeorder3'][2]);?>:</span> [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/upload_comment.php');">?</span>]  
							<br/><br/><input name="uploaded" id="uploadfile" type="file" class="style18" style="height: 25px;margin-left:30px;" />
							<?php }else{ ?>
								<span style="font-size:16px;"><?php Lang::EchoString2($langdate['takeorder3'][8]);?> <span style="color:blue"><?php echo $_POST['historyOrderNumber'] ?> </span><?php Lang::EchoString2($langdate['takeorder3'][9]);?>.</span>
							<?php } ?> 
						</td>
					   </tr>
					</table>
					<p class="mt10 tc"><input type="button" value="<?php Lang::EchoString2($langdate['takeorder3'][5]);?>" class="submit_bn" onclick="<?php if($_POST['material']==0||$_POST['material']==1){echo "window.location='/order/takeorder2.php';";}else{echo "window.location='/order/takeorderAC2.php';";} ?>"/>&nbsp;&nbsp;<input type="submit" value="<?php Lang::EchoString2($langdate['takeorder3'][6]);?>" class="submit_bn" />
					</p>
				</div>
			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>