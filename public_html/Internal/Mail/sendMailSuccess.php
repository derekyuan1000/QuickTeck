<?php 
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
    <title></title>
</head>
<body style="background-color:White; margin:3px;">
	<div style="font-size:18px; font-weight:bold;">
		<?php echo $_SESSION[message]; $_SESSION[message]=""; ?>
	</div>
	<br>
	<div style="font-size:14px;">
		<a href="inBox.php" style="color:blue">Go to Inbox</a><br>
		<a href="outBox.php" style="color:blue">Go to Outbox</a><br>
		<a href="sendBox.php" style="color:blue">Go to Sendbox</a><br>
		<?php if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 5){ ?>
			<a href="mailApproveList.php" style="color:blue">Go to Mail approve</a><br>
		<?php }?>
	</div>
</body>