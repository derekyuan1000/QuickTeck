<?php  
session_start();
include_once("../DAL/SalaryTitleService_Class.php");
include_once("../DAL/SalaryValueService_Class.php");
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
$salaryValueService = new SalaryValueService();
$salaryTitleArray = $salaryTitleService->GetAllSalaryTitles();


$currentSalaryTitle = 1;
if($_GET[titleId]){
	$currentSalaryTitle = $_GET[titleId];
}

$salaryDefaultValueArray = $salaryValueService->GetSalaryDefaultValueByTitleId($currentSalaryTitle);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
	<?php
	if($_SESSION[message]){
		echo '<script type="text/javascript">alert(\''.$_SESSION[message].'\')</script>';
		unset($_SESSION[message]);
	}
	?>
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
</head>
<body>
	<div style="margin:3px;">
		<form id="form1" name="form1" method="get" action="salaryDefaultValueList.php" style="margin:0px;">
		<table width="70%" border="0" cellspacing="0" cellpadding="0" style="background-color:#353c44; color:#e1e2e3;">
            <tr>
                <td style="width:40px; height:24px; text-align:center;">
                    <img src="../Images/tb.gif" width="14" height="14" alt="" style="vertical-align:bottom"/>
                </td>
                <td style="width:200px; font-weight:bold">
					Salary default value list
				</td>
                <td style="font-weight:bold">
                    <b>Title:</b>
					<select id="titleId" name="titleId" style="width:180px" onchange="document.getElementById('form1').submit()">
					<?php 
					for($i=0; $i < count($salaryTitleArray); $i++)
					{
						if($currentSalaryTitle == $salaryTitleArray[$i]->Id){
							echo '<option value="'.$salaryTitleArray[$i]->Id.'" selected="selected">'.$salaryTitleArray[$i]->Name.'</option>';
						}else{
							echo '<option value="'.$salaryTitleArray[$i]->Id.'">'.$salaryTitleArray[$i]->Name.'</option>';
						}
					}
					?>
					</select>
                </td>
            </tr>
        </table>
		</form>
		<form name="form2" method="post" action="../Do/doSalaryDefaultValueSubmit.php">
		<table width="70%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:5%; height:20px;">Id</td>
				<td style="width:5%;">Id2</td>
				<td style="width:15%;">Admin</td>
				<td style="width:20%;">Title</td>
				<td style="width:10%;">DoubleValue</td>
				<td style="width:45%;">VarcharValue</td>
			</tr>
			<?php 
			$salaryDefaultValueCount = 0;
			$t_titleIdNo = 1;
			if($currentAdmin->Id == 4)
			{
				$t_count = count($salaryDefaultValueArray) + 10;
			}else{
				$t_count = count($salaryDefaultValueArray);
			}
			for($i=0; $i < $t_count; $i++){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<?php 
						echo $salaryDefaultValueArray[$i]->Id;
						//echo $i+1;
					?>
				</td>
				<td>
					<?php 
						if($t_titleId != $salaryDefaultValueArray[$i]->SalaryTitleId){
							$t_titleId = $salaryDefaultValueArray[$i]->SalaryTitleId;
							$t_titleIdNo = 1;
						}else{
							$t_titleIdNo++;
						}
						echo $t_titleIdNo;
					?>
				</td>
				<td>
					<input id="<?php echo "salaryValueId".$i?>" name="<?php echo "salaryValueId".$i?>" type="hidden" value="<?php echo $salaryDefaultValueArray[$i]->Id ?>"/>
					<?php
					if($currentAdmin->Id == 4)
					{
					?>
					<select id="<?php echo "adminId".$i?>" name="<?php echo "adminId".$i?>" style="width:100px">
					<option value="0" selected="selected">--Select--</option>
					<?php 
						$allAdmins = $adminService->GetAllAdmins();
						for($j=0; $j < count($allAdmins); $j++)
						{
							if($allAdmins[$j]->Id==4||$allAdmins[$j]->Id==5||$allAdmins[$j]->Id==6||$allAdmins[$j]->Id==8||$allAdmins[$j]->Id==19
								||$allAdmins[$j]->Id==26||$allAdmins[$j]->Id==31){
								continue;	
							}
							if($salaryDefaultValueArray[$i]->AdminId == $allAdmins[$j]->Id){
								echo '<option value="'.$allAdmins[$j]->Id.'" selected="selected">'.$allAdmins[$j]->Name.'</option>';
							}else{
								echo '<option value="'.$allAdmins[$j]->Id.'">'.$allAdmins[$j]->Name.'</option>';
							}
						}
					?>
					</select>
					<?php
					}else{
						$t_admin = $adminService->GetAdminById($salaryDefaultValueArray[$i]->AdminId);
						echo $t_admin->Name;
					?>
						<input id="<?php echo "adminId".$i?>" name="<?php echo "adminId".$i?>"  type="hidden" value="<?php echo $t_admin->Id ?>"/>
					<?php
					}
					?>
				</td>
				<td>
					<?php
					if($currentAdmin->Id == 4)
					{
					?>
					<select id="<?php echo "titleId".$i?>" name="<?php echo "titleId".$i?>" style="width:120px">
					<option value="0" selected="selected">--Select--</option>
					<?php 
						for($j=0; $j < count($salaryTitleArray); $j++)
						{
							
							if($salaryDefaultValueArray[$i]->SalaryTitleId == $salaryTitleArray[$j]->Id){
								echo '<option value="'.$salaryTitleArray[$j]->Id.'" selected="selected">'.$salaryTitleArray[$j]->Name.'</option>';
							}else{
								echo '<option value="'.$salaryTitleArray[$j]->Id.'">'.$salaryTitleArray[$j]->Name.'</option>';
							}
						}
					?>
					</select>
					<?php
					}else{
						$t_title = $salaryTitleService->GetSalaryTitleById($salaryDefaultValueArray[$i]->SalaryTitleId);
						echo $t_title->Name;
					?>
						<input id="<?php echo "titleId".$i?>" name="<?php echo "titleId".$i?>" type="hidden" value="<?php echo $t_title->Id ?>"/>
					<?php
					}
					?>
				</td>
				<td>
					<input id="<?php echo "txtDoubleValue".$i?>" name="<?php echo "txtDoubleValue".$i?>" type="text" class="adminMyInput50" value="<?php if(!$salaryDefaultValueArray[$i]->SalaryVarcharValue){echo $salaryDefaultValueArray[$i]->SalaryDoubleValue;}?>"/>
				</td>
				<td style="text-align:left; padding-left:5px">
					<input id="<?php echo "txtVarcharValue".$i?>" name="<?php echo "txtVarcharValue".$i?>" type="text" class="adminMyInput350" value="<?php echo $salaryDefaultValueArray[$i]->SalaryVarcharValue ?>"/>
				</td>
			</tr>
			<?php
				$salaryDefaultValueCount++;
			}
			?>
			<input id="salaryDefaultValueCount" name="salaryDefaultValueCount" type="hidden" value="<?php echo $salaryDefaultValueCount ?>"/>
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