<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/FindClientPasswordService_Class.php");
session_start();
$randomKey = $_GET[key];
$findClientPasswordService = new FindClientPasswordService();
$clientService = new ClientService();
$fcp = $findClientPasswordService->GetFindClientPasswordByRandomKey($randomKey);
$now_unix = time();

if($randomKey != "" && $fcp){
	$dateTimeArray = explode(' ', $fcp->CreateTime);
	$date = $dateTimeArray[0];
	$time = $dateTimeArray[1];
	$dateArray = explode('-', $date);
	$timeArray = explode(':', $time);
	
	$year = $dateArray[0];
	$month = $dateArray[1];
	$day = $dateArray[2];
	$hour = $timeArray[0];
	$minute= $timeArray[1];
	$second = $timeArray[2];
	$createTime_unix = mktime($hour, $minute, $second, $month, $day, $year);
	
	if($now_unix - $createTime_unix <= 60*60){
		$clientFindPW = $clientService->GetClientById($fcp->ClientId);
	}else{
		$_SESSION[message] = "<span style='color:red; font-size:16px'>Link expired!</span>";
		echo "<script type='text/javascript'>location.href='errorResetPassword_client.php';</script>";
		return;
	}	
}else{
	$_SESSION[message] = "<span style='color:red; font-size:16px'>Invalid link!</span>";
	echo "<script type='text/javascript'>location.href='errorResetPassword_client.php';</script>";
	return;
}
$langdate['reset_pw'][0]['english']='Home';
$langdate['reset_pw'][0]['french']='Accueil';
$langdate['reset_pw'][0]['dutch']='';
$langdate['reset_pw'][0]['spanish']='';
$langdate['reset_pw'][1]['english']='User ID';
$langdate['reset_pw'][1]['french']='Identifiant';
$langdate['reset_pw'][1]['dutch']='';
$langdate['reset_pw'][1]['spanish']='';
$langdate['reset_pw'][2]['english']='New Password';
$langdate['reset_pw'][2]['french']='Nouveau mot de passe';
$langdate['reset_pw'][2]['dutch']='';
$langdate['reset_pw'][2]['spanish']='';
$langdate['reset_pw'][3]['english']='Confirm Password';
$langdate['reset_pw'][3]['french']='Confirmer le mot de passe';
$langdate['reset_pw'][3]['dutch']='';
$langdate['reset_pw'][3]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost print circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script src="../Management/Scripts/client.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['reset_pw'][0]);?></a></div>
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
				<form  name="form1" method="post" action="doResetPassword_client.php">
				<input id="id" name="id" type="hidden" value="<?php echo $clientFindPW->Id ?>"/>
				<input id="key" name="key" type="hidden" value="<?php echo $randomKey ?>"/>
					<h3 class="title_main">Reset Password</h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					<tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['reset_pw'][1]);?>:</td>
						<td><?php echo $clientFindPW->LoginId ?></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['reset_pw'][2]);?>:</td>
						<td><input id="password" name="password" type="password" class="adminMyInput2"/></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['reset_pw'][3]);?>:</td>
						<td><input id="password2" name="password2" type="password" class="adminMyInput2"/></td>
					  </tr>
					</table>
					<p class="mt10 tc"><input type="submit" value="Submit" class="submit_bn" onclick="return checkModifyPwd()"/></p>
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