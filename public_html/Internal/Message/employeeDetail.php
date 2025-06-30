<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminLevelService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MyDictionaryService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$id = $_GET[id];
$page = $_GET[page];
$adminService = new AdminService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1){
	//echo "Sorry, you are not allowed to open this page!";
	//return;
}

$admin = $adminService->GetAdminById($id);

$myDictionaryService = new MyDictionaryService();
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
	<form name="form1" method="post" action="../Do/doModifyEmployee.php">
		<input id="id" name="id" type="hidden" value="<?php echo $admin->Id ?>"/>
		<input id="page" name="page" type="hidden" value="<?php echo $page ?>"/>
		<div style="font-size:14px; font-weight:bold">Employee detail</div>
		<table width="600px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:150px; height:23px;">
					<b>&nbsp;LoginId:</b>
				</td>
				<td style="width:300px;">
					&nbsp;&nbsp;<?php echo $admin->LoginId ?>
				</td>
				<td style="padding:2px" rowspan="9">
					<img src="../../Management/UploadEmployeeImages/<?php echo $admin->Id  ?>.jpg" width="146" height="203" border="0"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;姓名:</b>
				</td>
				<td>
					&nbsp;&nbsp;<?php echo $admin->LastName.$admin->FirstName?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;性别:</b>
				</td>
				<td>
					&nbsp;
					<?php 
					if($admin->Gender){
						$myDictionary = $myDictionaryService->GetMyDictionaryById($admin->Gender);
						echo $myDictionary->DValue;
					}
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;入职时间:</b>
				</td>
				<td>
					&nbsp;
					<?php
						$entryTime = explode(' ', $admin->EntryTime);
						echo Common::ChangeDateFormat($entryTime[0],"date");
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;籍贯:</b>
				</td>
				<td>
					&nbsp;&nbsp;<?php echo $admin->Residency ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;毕业院校:</b>
				</td>
				<td>
					&nbsp;&nbsp;<?php echo $admin->School ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;部门:</b>
				</td>
				<td>
					&nbsp;&nbsp;<?php echo $admin->Department ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;职位:</b>
				</td>
				<td>
					&nbsp;&nbsp;<?php echo $admin->Position ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;联系电话:</b>
				</td>
				<td>
					&nbsp;&nbsp;<?php echo $admin->Telephone ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;个人介绍:</b>
				</td>
				<td colspan="2" style="padding:5px">
					<?php echo $admin->FacePage ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td style="height:23px;" colspan="3" align="center">
					<a href="javascript:history.back();"><img alt="" src="../Images/b_return.gif" border="0"/></a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>