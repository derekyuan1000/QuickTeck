<?php
session_start();
include_once("../DAL/WeeklyReportService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$holidayService = new HolidayService();
$weeklyReportService = new WeeklyReportService();

$daysFront = $holidayService->GetDay2(date("Y-m-d"), 7);
$daysBack = $holidayService->GetDay(date("Y-m-d"), 7);
for($i=0; $i < count($daysFront); $i++)
{
	if($daysFront[$i]->DayOfWeek == 'Sun'){
		$firstWeekDay = Common::ChangeDateFormat($daysFront[$i]->BasicDate,"date");
		break;
	}
}
for($i=0; $i < count($daysBack); $i++)
{
	if($daysBack[$i]->DayOfWeek == 'Sat'){
		$endWeekDay = Common::ChangeDateFormat($daysBack[$i]->BasicDate,"date");
		break;
	}
}
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
	<form name="form1" method="post" action="../Do/doInsertWeekReport.php">
		<div style="font-size:14px; font-weight:bold">New weekly report</div>
		<table width="780px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:160px; height:28px;">
					<b>&nbsp;Date:</b>
				</td>
				<td style="width:620px">
					&nbsp;&nbsp;<input id="date" name="date" type="text" class="adminMyInput2" value="<?php  echo $firstWeekDay."-".$endWeekDay; ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:28px;">
					<b>&nbsp;Report to:</b>
				</td>
				<td>
					&nbsp;
					<select id="reportTo" name="reportTo" style="width:180px">
					<option value="0" selected="selected">--Select--</option>
					<?php 
						$allAdmins = $adminService->GetAllAdmins();
						for($i=0; $i < count($allAdmins); $i++)
						{
							if($allAdmins[$i]->Id == 8|| $allAdmins[$i]->Id == 26 || $allAdmins[$i]->Id==$currentAdmin->Id){
								continue;	
							}
							echo '<option value="'.$allAdmins[$i]->Id.'">'.$allAdmins[$i]->Name.'</option>';
						}
					?>
					</select>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td>
					<b>&nbsp;CC to:</b>
				</td>
				<td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-left:5px">
					<tr>
					<?php
					$CCAdminArray = $adminService->GetAllAdmins();
					$count = 0;
					for($i=0; $i < count($CCAdminArray); $i++){
						if($CCAdminArray[$i]->Id == 8|| $CCAdminArray[$i]->Id == 26|| $allAdmins[$i]->Id==$currentAdmin->Id){
							continue;	
						}
						$count ++;
						echo '<td><input type="checkbox" name="CCAdmin[]" value="'.$CCAdminArray[$i]->Id.'">'.$CCAdminArray[$i]->Name.'</td>';
						if($count % 4 == 0){
							echo "</tr><tr>";
						}
					}
					?>
					</tr>
					</table>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td>
					<b>&nbsp;Content:</b>
				</td>
				<td>
					<textarea id="content" name="content" rows="18" class="adminMyInput3" style="width:600px;margin:5px "></textarea>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:28px;">
					<b>&nbsp;No of orders response for:</b>
				</td>
				<td >
					&nbsp;&nbsp;<input id="orderCount" name="orderCount" type="text" class="adminMyInput50"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:28px;">
					<b>&nbsp;No of emails response for:</b>
				</td>
				<td>
					&nbsp;&nbsp;<input id="emailCount" name="emailCount" type="text" class="adminMyInput50"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:28px;">
					<b>&nbsp;Is Submit:</b>
				</td>
				<td>
					&nbsp;&nbsp;<input id="isSubmit1" name="isSubmit" type="radio" value="2"/>Yes
					&nbsp;&nbsp;<input id="isSubmit2" name="isSubmit" type="radio" value="1" checked="checked"/>No
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="770px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:42%; height:25px; text-align:right">
				                <input id="image" type="image" value="submit" src="../Images/b_save.gif"/>
				            </td>
				            <td style="width:16%">
				                
				            </td>
				            <td style="width:42%">
				                <a href="myWeekReportList.php"><img alt="" src="../Images/b_return.gif" border="0"/></a>
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