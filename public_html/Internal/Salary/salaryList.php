<?php
session_start();
include_once("../DAL/SalaryTitleService_Class.php");
include_once("../DAL/SalaryValueService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
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
$orderService = new OrderService();
$orderDetailService = new OrderDetailService();
$salaryTitleService = new SalaryTitleService();
$salaryValueService = new SalaryValueService();
$salaryTitleArray = $salaryTitleService->GetAllSalaryTitles2();
$monthArray = $holidayService->GetMonthFirstDay();

//$currentSelectMonth = date("Y-m-01");
$tempMonth = date('m')-1;
$tempYear = date("Y")-1;
if($tempMonth == 0){
	$currentSelectMonth = $tempYear.'-12-01';
}else if($tempMonth < 10){
	$currentSelectMonth = date('Y').'-0'.$tempMonth.'-01';
}else{
	$currentSelectMonth = date('Y').'-'.$tempMonth.'-01';
}

if($_GET[type] == "changeMonth"){
	$currentSelectMonth = $_POST[selectMonth];
}
if($_GET[type] == "link"){
	$currentSelectMonth = $_GET[month];
}

if($currentSelectMonth != "all"){
	$salarySortIdValueArray = $salaryValueService->GetSalaryValueByTitleIdAndMonth(26, $currentSelectMonth);
}else{
	$salarySortIdValueArray = $salaryValueService->GetSalaryValueByTitleId(26);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
</head>
<body>
	<div style="margin:3px;">
		<form id="form1" method="post" action="salaryList.php?type=changeMonth">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#353c44; color:#e1e2e3;">
				<tr>
					<td style="width:40px; height:24px; text-align:center;">
						<img src="../Images/tb.gif" width="14" height="14" alt="" style="vertical-align:bottom"/>
					</td>
					<td style="width:100px; font-weight:bold">
						工资表
					</td>
					<td>
						<b>Month:</b>
						<select id="selectMonth" name="selectMonth" style="width:100px" onchange="salaryMonthOrAdminChange()">
							<option value="0">--Select--</option>
							<option value="all" <?php  if($currentSelectMonth == "all"){echo 'selected="selected"';}?>>--All--</option>
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
					</td>
				</tr>
			</table>
        </form>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<!--<td rowspan="2" style="width:3%; height:20px;"><?php echo $salaryTitleArray[26]->Name  ?></td>-->
				<td rowspan="2" style="width:4%"><?php echo $salaryTitleArray[1]->Name  ?></td>
				<td rowspan="2" style="width:4%">月份</td>
				<!--<td rowspan="2" style="width:4%"><?php echo $salaryTitleArray[2]->Name  ?></td>-->
				<td rowspan="2" style="width:4%"><?php echo $salaryTitleArray[3]->Name  ?></td>
				<td rowspan="2" style="width:3%"><?php echo $salaryTitleArray[31]->Name  ?></td>
				<td colspan="4"><?php echo $salaryTitleArray[4]->Name  ?></td>
				<td rowspan="2" style="width:3%"><?php echo $salaryTitleArray[5]->Name  ?></td>
				<td colspan="7"><?php echo $salaryTitleArray[12]->Name  ?></td>
				<td rowspan="2" style="width:3%"><?php echo $salaryTitleArray[29]->Name  ?></td>
				<td colspan="3"><?php echo $salaryTitleArray[19]->Name  ?></td>
				<td rowspan="2" style="width:4%"><?php echo $salaryTitleArray[24]->Name  ?></td>
				<td rowspan="2" style="width:4%"><?php echo $salaryTitleArray[27]->Name  ?></td>
				<td rowspan="2" style="width:4%"><?php echo $salaryTitleArray[28]->Name  ?></td>
				<td rowspan="2" style="width:4%">负责订单数</td>
				<td rowspan="2" style="width:4%">采购效率</td>
				<td rowspan="2" style="width:4%">操作</td>
			</tr>
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:4%; height:20px;"><?php echo $salaryTitleArray[6]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[8]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[9]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[11]->Name  ?></td>
				<td style="width:3%"><?php echo $salaryTitleArray[14]->Name  ?></td>
				<td style="width:3%"><?php echo $salaryTitleArray[16]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[7]->Name  ?></td>
				<td style="width:3%"><?php echo $salaryTitleArray[17]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[33]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[32]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[18]->Name  ?></td>
				<td style="width:3%"><?php echo $salaryTitleArray[20]->Name  ?></td>
				<td style="width:3%"><?php echo $salaryTitleArray[21]->Name  ?></td>
				<td style="width:4%"><?php echo $salaryTitleArray[23]->Name  ?></td>
			</tr>
			<?php 
			for($i=0; $i < count($salarySortIdValueArray); $i++)
			{
				$orderArray = $orderService->GetOrdersByDutyPerson($salarySortIdValueArray[$i]->AdminId, substr($salarySortIdValueArray[$i]->SalaryDate, 0, 7)."%", 1);
				if(count($orderArray) == 0){
					$orderArray = $orderService->GetOrdersByDutyPerson($salarySortIdValueArray[$i]->AdminId, substr($salarySortIdValueArray[$i]->SalaryDate, 0, 7)."%", 2);
				}
				$totalFactoryQuote = 0;
				$totalExcVATPrice = 0;
				for($j=0; $j < count($orderArray); $j++){
					$orderDetailArray = $orderDetailService->GetOrderDetailByOrderId($orderArray[$j]->Id);
					if(count($orderDetailArray)>0){
						$orderDetail = $orderDetailArray[0];
					}
					$totalFactoryQuote += $orderArray[$j]->FactoryQuote;
					if($orderArray[$j]->IsAssembly && $orderArray[$j]->Double3!=0.00){
						$totalExcVATPrice += $orderArray[$j]->Double3;
					}else{
						$totalExcVATPrice += $orderDetail->ExcVATPrice;
					}
				}
				if($currentSelectMonth != "all"){
					$salaryValueArray = $salaryValueService->GetSalaryValueByAdminIdAndMonth($salarySortIdValueArray[$i]->AdminId, $currentSelectMonth);
				}else{
					$salaryValueArray = $salaryValueService->GetSalaryValueByAdminIdAndMonth($salarySortIdValueArray[$i]->AdminId, $salarySortIdValueArray[$i]->SalaryDate);
				}
			?>
			<tr style="background-color:#ffffff; color:#344b50; <?php if($currentAdmin->LevelId != 1 && $currentAdmin->Id != $salarySortIdValueArray[$i]->AdminId){echo "display:none";}?>" 
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<!--<td style="height:20px;"><?php echo round($salaryValueArray[26]->SalaryDoubleValue);?></td>-->
				<td><?php echo $salaryValueArray[1]->SalaryVarcharValue;?></td>
				<td><?php echo Common::ChangeDateFormat($salaryValueArray[27]->SalaryDate,"month");?></td>
				<!--<td><?php echo $salaryValueArray[2]->SalaryVarcharValue;?></td>-->
				<td><?php echo $salaryValueArray[3]->SalaryVarcharValue;?></td>
				<td><?php echo $salaryValueArray[31]->SalaryDoubleValue;?></td>
				<td><?php echo round($salaryValueArray[6]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[8]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[9]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[11]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[5]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[14]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[16]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[7]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[17]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[33]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[32]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[18]->SalaryDoubleValue);?></td>
				<td><?php echo round($salaryValueArray[29]->SalaryDoubleValue);?></td>
				<td style="color:red"><?php echo round($salaryValueArray[20]->SalaryDoubleValue);?></td>
				<td style="color:red"><?php echo round($salaryValueArray[21]->SalaryDoubleValue);?></td>
				<td style="color:red"><?php echo round($salaryValueArray[23]->SalaryDoubleValue);?></td>
				<td style="color:blue;font-weight:bold"><?php echo round($salaryValueArray[24]->SalaryDoubleValue);?></td>
				<td>
					<?php 
					if($salaryValueArray[27]->SalaryVarcharValue==1){
						echo "待审核";
					}else if($salaryValueArray[27]->SalaryVarcharValue==2){
						echo "已审核";
					}else if($salaryValueArray[27]->SalaryVarcharValue==3){
						echo "已发放";	
					}
					?>
				</td>
				<td><?php echo round($salaryValueArray[28]->SalaryDoubleValue);?></td>
				<td><?php echo count($orderArray);?></td>
				<td>
				<?php 
					if($totalExcVATPrice!=0){
						echo round($totalFactoryQuote/($totalExcVATPrice*10)*100,2);
					}else{
						echo "0";	
					}
				?>
				</td>
				<td>
					<a href="salaryModify.php?adminId=<?php echo $salarySortIdValueArray[$i]->AdminId ?>&month=<?php echo $salaryValueArray[27]->SalaryDate; ?>"><img alt="edit" src="../Images/b_edit.png" border="0"/></a>
					<?php if($currentAdmin->LevelId==1){?>
					&nbsp;|&nbsp;<a href="../Do/doDeleteSalaryValue.php?adminId=<?php echo $salarySortIdValueArray[$i]->AdminId ?>&month=<?php echo $salaryValueArray[27]->SalaryDate; ?>" onclick="return confirm('Confirm to delete?')"><img alt="delete" src="../Images/b_drop.png" border="0"/></a>
					<?php } ?>
				</td>
			</tr>
			<?php 
			}
			?>
		</table>
	</div>
	</body>
</html>