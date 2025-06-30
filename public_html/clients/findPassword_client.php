<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Client_Class.php");
session_start();
$langdate['forgetpwd'][0]['english']='Home';
$langdate['forgetpwd'][0]['french']='Accueil';
$langdate['forgetpwd'][0]['dutch']='';
$langdate['forgetpwd'][0]['spanish']='';
$langdate['forgetpwd'][1]['english']='Find password';
$langdate['forgetpwd'][1]['french']='Trouver son mot de passe';
$langdate['forgetpwd'][1]['dutch']='';
$langdate['forgetpwd'][1]['spanish']='';
$langdate['forgetpwd'][2]['english']='Reset Password';
$langdate['forgetpwd'][2]['french']='Réinitialiser le mot de passe';
$langdate['forgetpwd'][2]['dutch']='';
$langdate['forgetpwd'][2]['spanish']='';
$langdate['forgetpwd'][3]['english']='User ID';
$langdate['forgetpwd'][3]['french']='Identifiant';
$langdate['forgetpwd'][3]['dutch']='';
$langdate['forgetpwd'][3]['spanish']='';
$langdate['forgetpwd'][4]['english']='Email';
$langdate['forgetpwd'][4]['french']='Courriel';
$langdate['forgetpwd'][4]['dutch']='';
$langdate['forgetpwd'][4]['spanish']='';
$langdate['forgetpwd'][5]['english']='Verification code';
$langdate['forgetpwd'][5]['french']='Code de vérification';
$langdate['forgetpwd'][5]['dutch']='';
$langdate['forgetpwd'][5]['spanish']='';
$langdate['forgetpwd'][6]['english']='Try a different image';
$langdate['forgetpwd'][6]['french']='Essayer une autre image';
$langdate['forgetpwd'][6]['dutch']='';
$langdate['forgetpwd'][6]['spanish']='';
$langdate['forgetpwd'][7]['english']='If you have forgotten your ID and/or password,please enter your email address and user ID in the form and click the "Retrieve" button. You can then reset your password through the email we sent to you';
$langdate['forgetpwd'][7]['french']='Si vous avez oublié votre identifiant et/ou votre mot de passe, entrez votre adresse courriel et Identifiant dans le formulaire et cliquez sur "Retrieve". Vous pourrez ensuite réinitialiser votre mot de passe grâce au courriel que nous vous avons envoyé';
$langdate['forgetpwd'][7]['dutch']='';
$langdate['forgetpwd'][7]['spanish']='';
$langdate['forgetpwd'][8]['english']='/rescources/images/banner02.jpg'; 
$langdate['forgetpwd'][8]['french']='/rescources/images/banner02_fr.jpg';
$langdate['forgetpwd'][8]['dutch']='';
$langdate['forgetpwd'][8]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">

function getNewImage() {
		$("#checkPic").attr("src",$("#checkPic").attr("src")+"?"+Math.random());
}

</script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="<?php Lang::EchoString2($langdate['forgetpwd'][8]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['forgetpwd'][0]);?></a> -<a href="#" title=""><?php Lang::EchoString2($langdate['forgetpwd'][1]);?></a></div>

				<div class="auto pas_box ">
				<form name="form1" method="post" action="doFindPassword_client.php">
					<div class="pas_box_top"></div>
					<div class="pas_box_con">
						<p class="fs30 c_f30 bb_cfcfcf lh2em"><?php Lang::EchoString2($langdate['forgetpwd'][2]);?></p>
						<p class="lh2em fs18 mt20"><?php Lang::EchoString2($langdate['forgetpwd'][3]);?>:</p>
						<p><input id="loginId" name="loginId" type="text" class="txt5" value="<?php echo $_SESSION[clientFindPW]->LoginId ?>"/></p>
						<p class="lh2em fs18"><?php Lang::EchoString2($langdate['forgetpwd'][4]);?>:</p>
						<p><input id="email" name="email" type="text" class="txt5" value="<?php echo $_SESSION[clientFindPW]->Email ?>"/></p>
						<p class="lh2em fs18"><?php Lang::EchoString2($langdate['forgetpwd'][5]);?>:</p>
						<p><input id="checkString" name="checkString" type="text" class="txt6"/>&nbsp;&nbsp;&nbsp;<img id="checkPic" src="createCheckPic_client.php" alt="" style="margin-top:5px;vertical-align:center"/>&nbsp;&nbsp;&nbsp;
						<a id="getCheckPic" href="#" style="color:#005AA0" onclick="getNewImage()"><?php Lang::EchoString2($langdate['forgetpwd'][6]);?>.</a> </p>
						<p class="c_f30 lh1.6em mt10">
						 <?php unset($_SESSION[clientFindPW]); if(!empty($_SESSION[message])){echo '<script type="text/javascript">alert("'.strip_tags($_SESSION[message]).'");</script>';} $_SESSION[message]=""; ?></br>
						<?php Lang::EchoString2($langdate['forgetpwd'][7]);?>.
						</p>
						<p class="mt10 tc"><input type="submit" value="Retrieve" class="submit_bn2" /></p>
					</div>
					<div class="pas_box_bottom"></div>
					</form>
				</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>