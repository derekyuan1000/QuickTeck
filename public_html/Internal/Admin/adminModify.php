<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminLevelService_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];
$adminService = new AdminService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $admin->LevelId != 8 && $admin->LevelId != 9){
	echo "Sorry, you are not allowed to open this page!";
	return;
}

$admin = $adminService->GetAdminById($id);
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
	<?php
		if($admin->LevelId == 2){
	?>
	<form name="form3" method="post" action="../Do/doAdminSetOnDuty.php">
		<input id="id" name="id" type="hidden" value="<?php echo $admin->Id ?>"/>
		<input id="page" name="page" type="hidden" value="<?php echo $page ?>"/>
		<div style="font-size:14px; font-weight:bold">Set on duty</div>
		<table width="370px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:120px; height:30px;">
					<b>&nbsp;On duty:</b>
				</td>
				<td style="width:250px;">
					&nbsp;&nbsp;<input id="isOnDuty1" name="isOnDuty" type="radio" value="1" <?php if($admin->IsOnDuty==1){echo 'checked="checked"';} ?>/>Yes
					&nbsp;&nbsp;<input id="isOnDuty0" name="isOnDuty" type="radio" value="0" <?php if($admin->IsOnDuty==0){echo 'checked="checked"';} ?>/>No
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="370px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:42%; height:25px; text-align:right">
				                <input id="image" type="image" value="submit" src="../Images/b_save.gif"/>
				            </td>
				            <td style="width:16%">
				                
				            </td>
				            <td style="width:42%">
				                <a href="javascript:history.back();"><img alt="" src="../Images/b_return.gif" border="0"/></a>
				            </td>
				        </tr>
				    </table>
				</td>
			</tr>
		</table>
		<div id="js_Error2" style="font-size:14px; font-weight:bold;">
			<?php echo $_SESSION[message3]; $_SESSION[message3]=""; ?>
		</div>
	</form>
	<?php
		}
	?>
</body>
</html>