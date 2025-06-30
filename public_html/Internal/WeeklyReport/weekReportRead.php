<?php
session_start();
include_once("../DAL/WeeklyReportService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$weeklyReportService = new WeeklyReportService();

$id = $_GET[id];
$page = $_GET[page];
$weeklyReport = $weeklyReportService->GetWeeklyReportById($id);
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
	<form name="form1" method="post" action="../Do/doModifyWeekReport.php">
		<input id="id" name="id" type="hidden" value="<?php echo $weeklyReport->Id ?>"/>
		<input id="page" name="page" type="hidden" value="<?php echo $page ?>"/>
		<div style="font-size:14px; font-weight:bold">Read weekly report</div>
		<table width="780px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:160px; height:23px;">
					<b>&nbsp;Date:</b>
				</td>
				<td style="width:620px; padding-left:6px">
					<?php
						echo $weeklyReport->ReportTime;
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;Admin:</b>
				</td>
				<td style="padding-left:6px">
					<?php
						$admin1 = $adminService->GetAdminById($weeklyReport->AdminId);
						echo $admin1->Name;
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;Content:</b>
				</td>
				<td style="padding-left:6px">
					<?php
						echo nl2br($weeklyReport->ReportContent);
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;No of orders response for:</b>
				</td>
				<td style="padding-left:6px">
					<?php
						echo $weeklyReport->OrderCount;
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;No of emails response for:</b>
				</td>
				<td style="padding-left:6px">
					<?php
						echo $weeklyReport->EmailCount;
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:23px;">
					<b>&nbsp;Approve content:</b>
				</td>
				<td style="padding-left:6px">
					<?php
						echo nl2br($weeklyReport->ApprovedContent);
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="770px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:42%; height:25px; text-align:right">
								&nbsp;
				            </td>
				            <td style="width:16%">
				                
				            </td>
				            <td style="width:42%">
				                <a href="CCWeekReportList.php"><img alt="" src="../Images/b_return.gif" border="0"/></a>
				            </td>
				        </tr>
				    </table>
				</td>
			</tr>
		</table>
		<div id="js_Error" style="font-size:14px; font-weight:bold;">
			<?php echo $_SESSION[message]; $_SESSION[message]=""; ?>
		</div>
	</form>
</body>
</html>