<?php  session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UK Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price, online quote PCB." />
<meta name="keywords" content="Order PCB from UK print circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../rescources/css/style.css" rel="stylesheet" type="text/css" />
<script src="../../rescources/js/jquery.min.js" type="text/javascript" ></script>
<script src="../../rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body>
<div class="w980 auto clearbox mt5">
	<form name="form1" method="post" action="mailManagement.php">
		<div class="pas_box_top"></div>
		<div class="pas_box_con">
			<p class="fs30 c_f30 bb_cfcfcf lh2em">登录邮件处理页</p>
			<p class="lh2em fs18 mt20">LoginId:</p>
			<p>MailAdmin<input id="loginId" name="loginId" type="hidden" class="txt5" value="MailAdmin"/></p>
			<p class="lh2em fs18">Password:</p>
			<p><input id="password" name="password" type="password" class="txt5"/></p>
			<p id="js_Error" style="font-size:14px; font-weight:bold;">
				<?php echo $_SESSION[message]; $_SESSION[message]=""; ?>
			</p>
			<p class="mt10"><input name="Submit"  type="submit" value="Login" class="submit_bn2"/></p>
		</div>
		<div class="pas_box_bottom" style="height:26px"></div>
	</form>
</div>
</body>
</html>