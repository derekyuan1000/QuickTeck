<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
if(empty($_SESSION[currentClient])){
	$_SESSION[returnPage] = "clientModifyPassword.php";
	echo "<script type='text/javascript'>location.href='clientLogin.php';</script>";
	return;
}
$clientService = new ClientService();
$client = $clientService->GetClientByLoginId($_SESSION[currentClient]);
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MessageService_Class.php");
$messageService = new MessageService();
$unreadMessageArray = $messageService->GetUnreadMessagesByClientId($client->Id);
$voucherService = new VoucherService();
$unUsedvoucherArray = $voucherService->GetVouchersByClientIdAndStatus($client->Id, "1");
$langdate['clientModifyPwd'][0]['english']='Home';
$langdate['clientModifyPwd'][0]['french']='Accueil';
$langdate['clientModifyPwd'][0]['dutch']='';
$langdate['clientModifyPwd'][0]['spanish']='';
$langdate['clientModifyPwd'][1]['english']='My Quick-teck';
$langdate['clientModifyPwd'][1]['french']='Mon compte Quick-teck';
$langdate['clientModifyPwd'][1]['dutch']='';
$langdate['clientModifyPwd'][1]['spanish']='';
$langdate['clientModifyPwd'][2]['english']='Order list';
$langdate['clientModifyPwd'][2]['french']='Liste de commandes';
$langdate['clientModifyPwd'][2]['dutch']='';
$langdate['clientModifyPwd'][2]['spanish']='';
$langdate['clientModifyPwd'][3]['english']='Change password';
$langdate['clientModifyPwd'][3]['french']='Changer le  mot de passe';
$langdate['clientModifyPwd'][3]['dutch']='';
$langdate['clientModifyPwd'][3]['spanish']='';
$langdate['clientModifyPwd'][4]['english']='My Profile';
$langdate['clientModifyPwd'][4]['french']='Mon profil';
$langdate['clientModifyPwd'][4]['dutch']='';
$langdate['clientModifyPwd'][4]['spanish']='';
$langdate['clientModifyPwd'][5]['english']='Voucher';
$langdate['clientModifyPwd'][5]['french']='Bon de réduction';
$langdate['clientModifyPwd'][5]['dutch']='';
$langdate['clientModifyPwd'][5]['spanish']='';
$langdate['clientModifyPwd'][6]['english']='Message';
$langdate['clientModifyPwd'][6]['french']='Message';
$langdate['clientModifyPwd'][6]['dutch']='';
$langdate['clientModifyPwd'][6]['spanish']='';
$langdate['clientModifyPwd'][7]['english']='Modify password';
$langdate['clientModifyPwd'][7]['french']='Changer le mot de passe';
$langdate['clientModifyPwd'][7]['dutch']='';
$langdate['clientModifyPwd'][7]['spanish']='';
$langdate['clientModifyPwd'][8]['english']='Old password';
$langdate['clientModifyPwd'][8]['french']='Ancien mot de passe';
$langdate['clientModifyPwd'][8]['dutch']='';
$langdate['clientModifyPwd'][8]['spanish']='';
$langdate['clientModifyPwd'][9]['english']='New password';
$langdate['clientModifyPwd'][9]['french']='Nouveau mot de passe';
$langdate['clientModifyPwd'][9]['dutch']='';
$langdate['clientModifyPwd'][9]['spanish']='';
$langdate['clientModifyPwd'][10]['english']='Confirm password';
$langdate['clientModifyPwd'][10]['french']='Confirmer le mot de passe';
$langdate['clientModifyPwd'][10]['dutch']='';
$langdate['clientModifyPwd'][10]['spanish']='';
$langdate['clientModifyPwd'][11]['english']='/rescources/images/banner02.jpg';
$langdate['clientModifyPwd'][11]['french']='/rescources/images/banner02_fr.jpg';
$langdate['clientModifyPwd'][11]['dutch']='';
$langdate['clientModifyPwd'][11]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>printed circuit board manufacturer,UK low cost PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype fabrication PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype fabrication PCB to multilayer volume production PCBs with low price online quote." />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script src="../Management/Scripts/client.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="<?php Lang::EchoString2($langdate['clientModifyPwd'][11]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['clientModifyPwd'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['clientModifyPwd'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<!--头<div class="left_box_t"></div>-->
			<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['clientModifyPwd'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/clients/clientMain.php" title=""><?php Lang::EchoString2($langdate['clientModifyPwd'][2]);?></a></li>
						<li><a href="/clients/clientModifyPassword.php" title="" class="on"><?php Lang::EchoString2($langdate['clientModifyPwd'][3]);?></a></li>
						<li><a href="/clients/clientInformation.php" title=""><?php Lang::EchoString2($langdate['clientModifyPwd'][4]);?></a></li>
						<li><a href="/clients/voucherList_client.php" title=""><?php Lang::EchoString2($langdate['clientModifyPwd'][5]);?>(<?php echo count($unUsedvoucherArray)?>)</a></li>
						<li><a href="/clients/messageList_client.php" title=""><?php Lang::EchoString2($langdate['clientModifyPwd'][6]);?>(<?php echo count($unreadMessageArray)?>)</a></li>
					</ul>
				</div>
				<div class="mt10">
	<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
<a href="/News/Atrcles.php" title=""><img src="/rescources/leftpic/08.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/></a>
					<a href="/aboutus/why_us.php" title=""><img src="/rescources/images/04.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>
		</div>

				<div class="w710 fr mt10">
				<form name="form1" method="post" action="doModifyClientPassword_client.php">
				<input id="id" name="id" type="hidden" value="<?php echo $client->Id ?>"/>
					<h3 class="title_main"><?php Lang::EchoString2($langdate['clientModifyPwd'][7]);?> </h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					  <tr>
						<td width="168" class="w_168"> <?php Lang::EchoString2($langdate['clientModifyPwd'][8]);?>: </td>
						<td><input id="oldPassword" name="oldPassword" type="password" class="adminMyInput2"/></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['clientModifyPwd'][9]);?>:</td>
						<td><input id="password" name="password" type="password" class="adminMyInput2"/></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['clientModifyPwd'][10]);?>:</td>
						<td><input id="password2" name="password2" type="password" class="adminMyInput2"/></td>
						</td>
					  </tr>
					</table>
					<p class="mt10 tc"><input type="submit" value="submit" class="submit_bn" onclick="return checkModifyPwd()"/></p>
				</div>
				<div id="js_Error" style="font-size:14px; font-weight:bold;">
					<?php echo $_SESSION[message]; $_SESSION[message]=""; ?>
				</div>
				</form>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>