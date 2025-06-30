<?php  
session_start();
include_once("../DAL/SalaryTitleService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
$salaryTitleService = new SalaryTitleService();
$salaryTitleArray = $salaryTitleService->GetAllSalaryTitles();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
	<?php
	if($_SESSION[message]){
		echo "<script type=\"text/javascript\">alert('".$_SESSION[message]."')</script>";
		unset($_SESSION[message]);
	}
	?>
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
</head>
<body>
	<div style="margin:3px;">
		<form name="form1" method="post" action="../Do/doSalaryTitleSubmit.php">
		<table width="70%" border="0" cellspacing="0" cellpadding="0" style="background-color:#353c44; color:#e1e2e3;">
            <tr>
                <td style="width:40px; height:24px; text-align:center;">
                    <img src="../Images/tb.gif" width="14" height="14" alt="" style="vertical-align:bottom"/>
                </td>
                <td style="width:200px; font-weight:bold">
					Salary title list
				</td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
		<table width="70%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:5%; height:20px;">Id</td>
				<td style="width:10%;">Pid</td>
				<td style="width:50%;">Name</td>
				<td style="width:10%;">Category</td>
				<td style="width:10%;">ValueType</td>
				<td style="width:15%;">Sort id</td>
			</tr>
			<?php 
			$salaryTitleCount = 0;
			for($i=0; $i < count($salaryTitleArray) + 5; $i++){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<?php 
						//if($salaryTitleArray[$i]->TypeLevel == 1){
							echo $salaryTitleArray[$i]->Id;
						//}
					?>
					<input id="<?php echo "salaryTitleId".$i?>" name="<?php echo "SalaryTitleId".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->Id ?>"/>
				</td>
				<td>
					<input id="<?php echo "txtSalaryTitlePid".$i?>" name="<?php echo "txtSalaryTitlePid".$i?>" type="text" class="adminMyInput30" value="<?php echo $salaryTitleArray[$i]->Pid ?>"/>
				</td>
				<td style="text-align:left; padding-left:5px">
					<?php 
						if($salaryTitleArray[$i]->TypeLevel == 2){
							echo "&nbsp;&nbsp;----&nbsp;";
						}
					?>
					<input id="<?php echo "txtSalaryTitleName".$i?>" name="<?php echo "txtSalaryTitleName".$i?>" type="text" class="adminMyInput3" value="<?php echo $salaryTitleArray[$i]->Name ?>"/>
				</td>
				<td>
					<input id="<?php echo "txtSalaryTitleCategory".$i?>" name="<?php echo "txtSalaryTitleCategory".$i?>" type="text" class="adminMyInput30" value="<?php echo $salaryTitleArray[$i]->Category ?>"/>
				</td>
				<td>
					<input id="<?php echo "txtSalaryTitleValueType".$i?>" name="<?php echo "txtSalaryTitleValueType".$i?>" type="text" class="adminMyInput30" value="<?php echo $salaryTitleArray[$i]->ValueType ?>"/>
				</td>
				<td style="text-align:left; padding-left:5px">
					<?php 
						if($salaryTitleArray[$i]->TypeLevel == 2){
							echo "&nbsp;&nbsp;----&nbsp;";
						}
					?>
					<input id="<?php echo "txtSalaryTitleSortId".$i?>" name="<?php echo "txtSalaryTitleSortId".$i?>" type="text" class="adminMyInput30" value="<?php echo $salaryTitleArray[$i]->SortId ?>"/>
				</td>
			</tr>
			<?php
				$salaryTitleCount++;
			}
			?>
			<input id="salaryTitleCount" name="salaryTitleCount" type="hidden" value="<?php echo $salaryTitleCount ?>"/>
			<tr style="background-color:#ffffff;">
				<td style="height:25px" colspan="6">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="height:25px; text-align:center">
				                <input id="image" type="image" value="submit" src="../Images/b_save.gif"/>
				            </td>
				        </tr>
				    </table>
				</td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>