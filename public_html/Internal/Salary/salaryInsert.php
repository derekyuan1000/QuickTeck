<?php  
session_start();
include_once("../DAL/SalaryTitleService_Class.php");
include_once("../DAL/SalaryValueService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$holidayService = new HolidayService();
$salaryTitleService = new SalaryTitleService();
$salaryValueService = new SalaryValueService();
$salaryTitleArray = $salaryTitleService->GetAllSalaryTitles();
$salaryDefaultValueArray = $salaryValueService->GetAllSalaryDefaultValue();
$monthArray = $holidayService->GetMonthFirstDay();

$currentSelectMonth = date("Y-m-01");
$currentSelectAdminId = 0;
if($_GET[type] == "changeMonthOrAdmin"){
	$currentSelectMonth = $_POST[selectMonth];
	$currentSelectAdminId = $_POST[selectAdminId];
}
if($_GET[type] == "link"){
	$currentSelectMonth = $_GET[month];
}
if($currentSelectAdminId){
	$currentSelectAdmin = $adminService->GetAdminById($currentSelectAdminId);
}	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
	<?php
		$tempArray = $salaryValueService->GetSalaryValueByAdminIdAndMonth($currentSelectAdminId, $currentSelectMonth);
		if(count($tempArray) > 0){
			echo '<script type="text/javascript">alert("'.$currentSelectAdmin->Name.'\'s '.Common::ChangeDateFormat($currentSelectMonth,"month").' salary has been inserted")</script>';
			unset($currentSelectAdminId);
			unset($currentSelectAdmin);
		}
	?>
	<?php
	if($_SESSION[message]){
	?>
		<script type="text/javascript">alert('<?php echo $_SESSION[message]?>')</script>
	<?php
		unset($_SESSION[message]);
	}
	?>
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
</head>
<body>
	<div style="margin:3px;">
		<form id="form1" method="post" action="salaryInsert.php?type=changeMonthOrAdmin">
			<div style="font-size:14px;"><b>New ticket</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Month:</b>
			<select id="selectMonth" name="selectMonth" style="width:100px" onchange="salaryMonthOrAdminChange()">
				<option value="0">--Select--</option>
				<?php
				for($i=0; $i < count($monthArray); $i++)
				{
					if($currentSelectMonth == $monthArray[$i]->BasicDate){
						echo '<option value="'.$monthArray[$i]->BasicDate.'" selected="selected">'.Common::ChangeDateFormat($monthArray[$i]->BasicDate,"month").'</option>';
					}else{
						echo '<option value="'.$monthArray[$i]->BasicDate.'">'.Common::ChangeDateFormat($monthArray[$i]->BasicDate,"month").'</option>';
					}
				}
				?>
			</select>
			&nbsp;&nbsp;
			<b>Admin:</b>
			<select id="selectAdminId" name="selectAdminId" style="width:100px" onchange="salaryMonthOrAdminChange()">
				<option value="0" selected="selected">--Select--</option>
				<?php 
					$allAdmins = $adminService->GetAllAdmins();
					for($i=0; $i < count($allAdmins); $i++)
					{
						if(($allAdmins[$i]->Id==4||$allAdmins[$i]->Id==5||$allAdmins[$i]->Id==6||$allAdmins[$i]->Id==8||$allAdmins[$i]->Id==19
							||$allAdmins[$i]->Id==26||$allAdmins[$i]->Id==31)||
							($currentAdmin->LevelId != 1 && $currentAdmin->Id !=$allAdmins[$i]->Id))
							{
							continue;	
						}
						if($currentSelectAdminId == $allAdmins[$i]->Id){
							echo '<option value="'.$allAdmins[$i]->Id.'" selected="selected">'.$allAdmins[$i]->Name.'</option>';
						}else{
							echo '<option value="'.$allAdmins[$i]->Id.'">'.$allAdmins[$i]->Name.'</option>';
						}
					}
				?>
			</select>
			</div>
		</form>
		<form name="form2" method="post" action="../Do/doSalaryValueSubmit.php">
		<table width="50%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:left; font-size:13px">
			<?php 
			if($currentSelectMonth && $currentSelectAdminId){
			?>
				<tr style="background-color:#ffffff; color:#344b50;">
					<td style="width:100px; padding:3px">
						<b>工资月份:</b>
					</td>
					<td style="height:25px;padding-left:5px">
						<?php
							echo Common::ChangeDateFormat($currentSelectMonth,"month");
						?>
						<input id="salaryMonth" name="salaryMonth" type="hidden" value="<?php echo $currentSelectMonth ?>"/>
						<input id="salaryAdminId" name="salaryAdminId" type="hidden" value="<?php echo $currentSelectAdminId ?>"/>
						<input id="hiddenSubmitType" name="hiddenSubmitType" type="hidden" value="Insert"/>
					</td>
				</tr>
			<?php
				$salaryValueCount = 0;
				for($i=0; $i < count($salaryTitleArray); $i++){
					$defaultValue = $salaryValueService->GetSalaryDefaultValue($currentSelectAdminId,$salaryTitleArray[$i]->Id);
					if(($salaryTitleArray[$i]->Id==4||$salaryTitleArray[$i]->Id==10||$salaryTitleArray[$i]->Id==11||$salaryTitleArray[$i]->Id==12||$salaryTitleArray[$i]->Id==13||
						$salaryTitleArray[$i]->Id==14||$salaryTitleArray[$i]->Id==15||$salaryTitleArray[$i]->Id==16||$salaryTitleArray[$i]->Id==18
						||$salaryTitleArray[$i]->Id==19||$salaryTitleArray[$i]->Id==22||$salaryTitleArray[$i]->Id==23||$salaryTitleArray[$i]->Id==24||$salaryTitleArray[$i]->Id==26
						||$salaryTitleArray[$i]->Id==27) ||
						($currentAdmin->LevelId != 1 && ($salaryTitleArray[$i]->Id==1||$salaryTitleArray[$i]->Id==2||$salaryTitleArray[$i]->Id==3
						||$salaryTitleArray[$i]->Id==5||$salaryTitleArray[$i]->Id==6||$salaryTitleArray[$i]->Id==7||$salaryTitleArray[$i]->Id==8
						||$salaryTitleArray[$i]->Id==9||$salaryTitleArray[$i]->Id==10||$salaryTitleArray[$i]->Id==17||$salaryTitleArray[$i]->Id==20
						||$salaryTitleArray[$i]->Id==21||$salaryTitleArray[$i]->Id==22||$salaryTitleArray[$i]->Id==25 ||$salaryTitleArray[$i]->Id==28
						||$salaryTitleArray[$i]->Id==29||$salaryTitleArray[$i]->Id==30||$salaryTitleArray[$i]->Id==31||$salaryTitleArray[$i]->Id==32
						||$salaryTitleArray[$i]->Id==33))
						){
						echo '<tr style="background-color:#ffffff; color:#344b50; display:none">';
					}else{
						echo '<tr style="background-color:#ffffff; color:#344b50;">';
					}
				?>
					<td style="width:100px; padding:3px; <?php if($salaryTitleArray[$i]->Category==2||$salaryTitleArray[$i]->Category==3){echo "color:blue";}else if($salaryTitleArray[$i]->Category==4){echo "color:red";}  ?>">
						<b><?php echo $salaryTitleArray[$i]->Name ?>:</b>
					</td>
					<td style="height:25px;padding-left:5px">
						<?php  
							if($salaryTitleArray[$i]->ValueType == 1){
								if($salaryTitleArray[$i]->Id == 26){
						?>
								<input id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" type="text" class="adminMyInput50" value="<?php if($defaultValue->SalaryDoubleValue!=0.00){echo round($defaultValue->SalaryDoubleValue);} ?>"/>
						<?php
								}else{
						?>
								<input id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" type="text" class="adminMyInput50" value="<?php if($defaultValue->SalaryDoubleValue!=0.00){echo $defaultValue->SalaryDoubleValue;} ?>"/>
						<?php 
								} 
							}else if($salaryTitleArray[$i]->ValueType == 2){
						?>
						<input id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" type="text" class="adminMyInput400" value="<?php echo $defaultValue->SalaryVarcharValue ?>"/>
						<?php  
							}else if($salaryTitleArray[$i]->ValueType == 3){
						?>
						<textarea id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" rows="5" class="adminMyInput3" style="width:400px;margin-top:5px;margin-bottom:5px"><?php echo $defaultValue->SalaryVarcharValue ?></textarea>
						<?php  
							}
						?>
						<input id="<?php echo "titleId".$i?>" name="<?php echo "titleId".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->Id ?>"/>
						<input id="<?php echo "titleCategory".$i?>" name="<?php echo "titleCategory".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->Category ?>"/>
						<input id="<?php echo "titleValueType".$i?>" name="<?php echo "titleValueType".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->ValueType ?>"/>
					</td>
				</tr>
			<?php
					$salaryValueCount++;
				}
			?>
			<input id="salaryValueCount" name="salaryValueCount" type="hidden" value="<?php echo $salaryValueCount ?>"/>
			<tr style="background-color:#ffffff;">
				<td style="height:25px" colspan="2">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="height:25px; text-align:center">
				                <input id="image" type="image" value="submit" src="../Images/b_save.gif"/>
				            </td>
				        </tr>
				    </table>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
		</form>
	</div>
</body>
</html>