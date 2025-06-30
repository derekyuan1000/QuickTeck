<?php  
session_start();
include_once("../DAL/WeeklyReportService_Class.php");
include_once("../DAL/WeeklyReportCCAdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);

$weeklyReportService = new WeeklyReportService();
$weeklyReportCCAdminService = new WeeklyReportCCAdminService();

$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}

//$pageSize, $currentPage, $adminId, $approvedAdminId, $CCAdminId, $statusId
$result = $weeklyReportService->GetAllWeeklyReportsByPage(Config::$pageSize, $currentPage, $currentAdmin->Id, 0, 0, 0);

$recoudCount = $result[0];
$weeklyReportArray = $result[1];
$pager = new Pager(Config::$pageSize,$recoudCount,$currentPage,"weekReportList.php?page=");
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
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#353c44; color:#e1e2e3;">
            <tr>
                <td style="width:40px; height:24px; text-align:center;">
                    <img src="../Images/tb.gif" width="14" height="14" alt="" style="vertical-align:bottom"/>
                </td>
                <td style="width:200px; font-weight:bold">
					My week report list
				</td>
                <td>
                    <img src="../Images/add.gif" width="10" height="10" alt="Add" style="vertical-align:middle"/>&nbsp;&nbsp;
					<a href="weekReportInsert.php" style="color:#e1e2e3;">Add New Ticket</a>
                </td>
            </tr>
        </table>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:12%; height:20px;">Date</td>
				<td style="width:12%;">Modify time</td>
				<td style="width:8%;">Admin</td>
				<td style="width:8%;">Approve</td>
				<td style="width:22%;">CC</td>
				<td style="width:8%;">Order count</td>
				<td style="width:8%;">Email count</td>
				<td style="width:10%;">Status</td>
				<td style="width:12%;">Control</td>
			</tr>
			<?php 
			for($i=0; $i < count($weeklyReportArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50;"
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="height:20px;"><?php echo $weeklyReportArray[$i]->ReportTime?></td>
				<td><?php echo $weeklyReportArray[$i]->WriteReportTime?></td>
				<td><?php $admin1 = $adminService->GetAdminById($weeklyReportArray[$i]->AdminId); echo $admin1->Name?></td>
				<td><?php $admin2 = $adminService->GetAdminById($weeklyReportArray[$i]->ApprovedAdminId); echo $admin2->Name?></td>
				<td>
				<?php 
					$weeklyReportCCAdminArray = $weeklyReportCCAdminService->GetWeeklyReportCCAdminByWeeklyReportId($weeklyReportArray[$i]->Id);
					for($j=0; $j < count($weeklyReportCCAdminArray); $j++)
					{
						$admin3 = $adminService->GetAdminById($weeklyReportCCAdminArray[$j]->AdminId); 
						echo $admin3->Name;
						if($j != count($weeklyReportCCAdminArray)-1){
							echo ", ";
						}
					}
				?>
				</td>
				<td><?php echo $weeklyReportArray[$i]->OrderCount?></td>
				<td><?php echo $weeklyReportArray[$i]->EmailCount?></td>
				<td>
				<?php 
					if($weeklyReportArray[$i]->StatusId == 1){
						echo "已创建";	
					}else if($weeklyReportArray[$i]->StatusId == 2){
						echo "已提交";
					}else if($weeklyReportArray[$i]->StatusId == 3){
						echo "打回修改";
					}else if($weeklyReportArray[$i]->StatusId == 4){
						echo "通过审核";
					}
				?>
				</td>
				<td>
					<a href="weekReportModify.php?page=<?php echo $currentPage ?>&id=<?php echo $weeklyReportArray[$i]->Id ?>"><img alt="edit" src="../Images/b_edit.png" border="0"/></a>
					<?php if($weeklyReportArray[$i]->StatusId ==1 || $weeklyReportArray[$i]->StatusId ==3){?>
					&nbsp;|&nbsp;<a href="../Do/doDeleteWeekReport.php?page=<?php echo $currentPage ?>&id=<?php echo $weeklyReportArray[$i]->Id ?>" onclick="return confirm('Confirm to delete?')"><img alt="delete" src="../Images/b_drop.png" border="0"/></a>
					<?php } ?>
				</td>
			</tr>
			<?php
			}
			?>
			<?php $pager->createPager();?>
		</table>
	</div>
	</body>
</html>