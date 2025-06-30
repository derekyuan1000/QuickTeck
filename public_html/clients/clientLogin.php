<?php 
session_start();
$langdate['login'][0]['english']='Home';
$langdate['login'][0]['french']='Accueil';
$langdate['login'][0]['dutch']='';
$langdate['login'][0]['spanish']='';
$langdate['login'][1]['english']='Clients login';
$langdate['login'][1]['french']='Espace client';
$langdate['login'][1]['dutch']='';
$langdate['login'][1]['spanish']='';
$langdate['login'][2]['english']='Login';
$langdate['login'][2]['french']='Connexion';
$langdate['login'][2]['dutch']='';
$langdate['login'][2]['spanish']='';
$langdate['login'][3]['english']='User ID';
$langdate['login'][3]['french']='Identifiant';
$langdate['login'][3]['dutch']='';
$langdate['login'][3]['spanish']='';
$langdate['login'][4]['english']='Password';
$langdate['login'][4]['french']='Mot de passe';
$langdate['login'][4]['dutch']='';
$langdate['login'][4]['spanish']='';
$langdate['login'][5]['english']='Forget Password';
$langdate['login'][5]['french']='Mot de passe oublié';
$langdate['login'][5]['dutch']='';
$langdate['login'][5]['spanish']='';
$langdate['login'][6]['english']='No account? Register here';
$langdate['login'][6]['french']='S\'inscrire ici';
$langdate['login'][6]['dutch']='';
$langdate['login'][6]['spanish']='';
$langdate['login'][7]['english']='/rescources/images/banner02.jpg';
$langdate['login'][7]['french']='/rescources/images/banner02_fr.jpg';
$langdate['login'][7]['dutch']='';
$langdate['login'][7]['spanish']='';
$langdate['login'][8]['english']='Login';
$langdate['login'][8]['french']='Valider';
$langdate['login'][8]['dutch']='';
$langdate['login'][8]['spanish']='';
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
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="<?php Lang::EchoString2($langdate['login'][7]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['login'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['login'][1]);?></a></div>
				<div class="auto pas_box ">
					<div class="pas_box_top"></div>
					<div class="pas_box_con">
					<form name="form1" method="post" action="doLogin_client.php">
					<input id="returnPage" name="returnPage" type="hidden" value="<?php echo $_SESSION[returnPage];?>"/>
						<p class="fs30 c_f30 bb_cfcfcf lh2em"><?php Lang::EchoString2($langdate['login'][2]);?></p>
						<p class="lh2em fs18 mt20"><?php Lang::EchoString2($langdate['login'][3]);?>:</p>
						<p><input type="text" class="txt5" id="loginId" name="loginId" value="<?php echo $_SESSION[clientLogin]?>" /></p>
						<p class="lh2em fs18"><?php Lang::EchoString2($langdate['login'][4]);?>:</p>
						<p><input class="txt7"  id="password" name="password" type="password" />&nbsp;&nbsp;&nbsp;<a href="/clients/findPassword_client.php" title=""><?php Lang::EchoString2($langdate['login'][5]);?>?</a></p>
						<p class="mt10">
						<input type="submit" value="<?php Lang::EchoString2($langdate['login'][8]);?>" class="submit_bn2" name="Submit"/>
						&nbsp;&nbsp;&nbsp;<a href="/clients/register_newClient.php" title="" class="c_f60"><?php Lang::EchoString2($langdate['login'][6]);?></a></p>
					</form>
					</div>
					<div class="pas_box_bottom"></div>
				</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
<?php 
if($_SESSION[message]!="")
{
	unset($_SESSION[clientLogin]);
	//echo '<script type="text/javascript">alert("'.strip_tags($_SESSION[message]).'");</script>';
	$_SESSION[message]="";
}
?>
</body>
</html>