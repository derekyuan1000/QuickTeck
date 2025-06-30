<?php  
session_start();
include_once("../DAL/SalaryTitleService_Class.php");
include_once("../DAL/SalaryValueService_Class.php");
include_once("../DAL/SalaryProcessingService_Class.php");
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
$salaryProcessingService = new SalaryProcessingService();

$salaryTitleArray = $salaryTitleService->GetAllSalaryTitles();
$salaryDefaultValueArray = $salaryValueService->GetAllSalaryDefaultValue();
$monthArray = $holidayService->GetMonthFirstDay();

$currentSelectMonth = $_GET[month];
$currentSelectAdminId = $_GET[adminId];

if($currentAdmin->LevelId != 1 && ($currentAdmin->Id!=$currentSelectAdminId||date("d") > 31)){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
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
		<div style="font-size:14px; font-weight:bold">Modify salary</div>
		<form name="form2" method="post" action="../Do/doSalaryValueSubmit.php">
		<table width="50%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:left; font-size:13px">
			<?php 
			if($currentSelectMonth && $currentSelectAdminId){
				$salaryValue = $salaryValueService->GetSalaryValueByAdminIdAndMonth($currentSelectAdminId,$currentSelectMonth);
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
					</td>
				</tr>
			<?php
				$salaryValueCount = 0;
				for($i=0; $i < count($salaryTitleArray); $i++){
					if(($salaryTitleArray[$i]->Id==4||$salaryTitleArray[$i]->Id==10||$salaryTitleArray[$i]->Id==11||$salaryTitleArray[$i]->Id==12||
						$salaryTitleArray[$i]->Id==14||$salaryTitleArray[$i]->Id==16||$salaryTitleArray[$i]->Id==18
						||$salaryTitleArray[$i]->Id==19||$salaryTitleArray[$i]->Id==22||$salaryTitleArray[$i]->Id==23||$salaryTitleArray[$i]->Id==24
						||$salaryTitleArray[$i]->Id==27) ||
						($currentAdmin->LevelId != 1 && ($salaryTitleArray[$i]->Id==1||$salaryTitleArray[$i]->Id==2||$salaryTitleArray[$i]->Id==3
						||$salaryTitleArray[$i]->Id==5||$salaryTitleArray[$i]->Id==6||$salaryTitleArray[$i]->Id==7||$salaryTitleArray[$i]->Id==8
						||$salaryTitleArray[$i]->Id==9||$salaryTitleArray[$i]->Id==10||$salaryTitleArray[$i]->Id==17||$salaryTitleArray[$i]->Id==20
						||$salaryTitleArray[$i]->Id==21||$salaryTitleArray[$i]->Id==22||$salaryTitleArray[$i]->Id==25||$salaryTitleArray[$i]->Id==26
						||$salaryTitleArray[$i]->Id==28||$salaryTitleArray[$i]->Id==29||$salaryTitleArray[$i]->Id==31||$salaryTitleArray[$i]->Id==32
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
								if($salaryTitleArray[$i]->Id == 26 || $salaryTitleArray[$i]->Id == 13 || $salaryTitleArray[$i]->Id == 15){
						?>
								<input id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" type="text" class="adminMyInput50" value="<?php if($salaryValue[$salaryTitleArray[$i]->Id]->SalaryDoubleValue!=0.00){echo round($salaryValue[$salaryTitleArray[$i]->Id]->SalaryDoubleValue);} ?>"/>
						<?php
								}else{
						?>
								<input id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" type="text" class="adminMyInput50" value="<?php if($salaryValue[$salaryTitleArray[$i]->Id]->SalaryDoubleValue!=0.00){echo $salaryValue[$salaryTitleArray[$i]->Id]->SalaryDoubleValue;} ?>"/>
						<?php 
								} 
							}else if($salaryTitleArray[$i]->ValueType == 2){
						?>
						<input id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" type="text" class="adminMyInput400" value="<?php echo $salaryValue[$salaryTitleArray[$i]->Id]->SalaryVarcharValue ?>"/>
						<?php  
							}else if($salaryTitleArray[$i]->ValueType == 3){
						?>
						<textarea id="<?php echo "txtValue".$i?>" name="<?php echo "txtValue".$i?>" rows="5" class="adminMyInput3" style="width:400px;margin-top:5px;margin-bottom:5px"><?php echo $salaryValue[$salaryTitleArray[$i]->Id]->SalaryVarcharValue ?></textarea>
						<?php
							}
						?>
						<input id="<?php echo "titleId".$i?>" name="<?php echo "titleId".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->Id ?>"/>
						<input id="<?php echo "titleCategory".$i?>" name="<?php echo "titleCategory".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->Category ?>"/>
						<input id="<?php echo "titleValueType".$i?>" name="<?php echo "titleValueType".$i?>" type="hidden" value="<?php echo $salaryTitleArray[$i]->ValueType ?>"/>
						<input id="<?php echo "valueId".$i?>" name="<?php echo "valueId".$i?>" type="hidden" value="<?php echo $salaryValue[$salaryTitleArray[$i]->Id]->Id ?>"/>
					</td>
				</tr>
			<?php
					$salaryValueCount++;
				}
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:100px; padding:3px;">
					<b>
					<?php 
						$t_title = $salaryTitleService->GetSalaryTitleById(27);
						echo $t_title->Name;
					?>:</b>
				</td>
				<td style="height:25px;padding-left:5px">
					<select id="salaryStatus" name="salaryStatus" style="width:100px">
						<option value="1" <?php if($salaryValue[27]->SalaryVarcharValue==1){echo "selected=\"selected\"";}?>>待审核</option>
						<option value="2" <?php if($salaryValue[27]->SalaryVarcharValue==2){echo "selected=\"selected\"";}?>>已审核</option>
						<option value="3" <?php if($salaryValue[27]->SalaryVarcharValue==3){echo "selected=\"selected\"";}?>>已发放</option>
					</select>
					<input id="salaryValueCount" name="salaryValueCount" type="hidden" value="<?php echo $salaryValueCount ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:100%; padding:3px;" colspan="2">
					<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:center;">
						<tr style="background-color:#ffffff; color:#344b50;">
							<td style="width:120px; height:23px;">
								<b>Time:</b>
							</td>
							<td style="width:120px">
								<b>Status:</b>
							</td>
							<td style="width:120px;">
								<b>Admin:</b>
							</td>
						</tr>
						<?php 
						$allSalaryProcessing = $salaryProcessingService->GetSalaryProcessingsBySalaryAdminIdAndSalaryDate($currentSelectAdminId, $currentSelectMonth, 1);
						for($i=0; $i < count($allSalaryProcessing); $i++)
						{
						?>
						<tr style="background-color:#ffffff; color:#344b50;">
							<td style="height:23px;">
								<?php echo Common::ChangeDateFormat($allSalaryProcessing[$i]->ProcessTime,"dateTime"); ?>
							</td>
							<td>
								<?php 
									if($allSalaryProcessing[$i]->StatusId==1){
										echo "待审核";
									}else if($allSalaryProcessing[$i]->StatusId==2){
										echo "已审核";
									}else if($allSalaryProcessing[$i]->StatusId==3){
										echo "已发放";	
									}
								?>
							</td>
							<td>
								<?php $admin = $adminService->GetAdminById($allSalaryProcessing[$i]->AdminId); echo $admin->Name?>
							</td>
						</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<tr style="background-color:#ffffff;">
				<td style="height:25px" colspan="2">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:42%; height:25px; text-align:right">
								<?php if($currentAdmin->LevelId==1 || ($currentAdmin->LevelId!=1 && $salaryValue[27]->SalaryVarcharValue==1)){ ?>
				                <input id="image" type="image" value="submit" src="../Images/b_save.gif"/>
				                <?php } ?>
				            </td>
				            <td style="width:16%">
				                
				            </td>
				            <td style="width:42%">
				                <a href="<?php echo "salaryList.php?type=link&month=".$currentSelectMonth ?>"><img alt="" src="../Images/b_return.gif" border="0"/></a>
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