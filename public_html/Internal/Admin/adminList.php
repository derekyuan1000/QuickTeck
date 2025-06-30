<?php  
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Admin_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminLevelService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$adminService = new AdminService();
$admin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($admin->LevelId != 1 && $admin->LevelId != 8 && $admin->LevelId != 9){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}

$result = $adminService->GetAdminByLevelIdAndPage(2, Config::$mailPageSize, $currentPage);
$recoudCount = $result[0];
$adminArray = $result[1];
$pager = new Pager(Config::$mailPageSize,$recoudCount,$currentPage,"adminList.php?page=");
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
					Admin List
				</td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:20%; height:20px;">LoginId</td>
				<td style="width:20%;">Name</td>
				<td style="width:20%;">Level</td>
				<td style="width:20%;">Is on duty</td>
				<td style="width:20%;">Control</td>
			</tr>
			<?php 
			for($i=0; $i < count($adminArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50" 
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="height:20px;"><?php echo $adminArray[$i]->LoginId?></td>
				<td><?php echo $adminArray[$i]->Name?></td>
				<td>
				<?php 
					$adminLevelId = $adminArray[$i]->LevelId;
					$adminLevelService = new AdminLevelService();
					$adminLevel = $adminLevelService->GetAdminLevelById($adminLevelId);
					echo $adminLevel->LevelName;
				?>
				</td>
				<td>
				<?php 
					if($adminArray[$i]->LevelId == 2){
						if($adminArray[$i]->IsOnDuty == 1){
							echo "Yes";	
						}else{
							echo "No";
						}
					}else{
						//echo "N/A";	
					}
				?>
				</td>
				<td>
					<?php
						if($adminArray[$i]->LevelId == 2){
					?>
					<a href="adminModify.php?page=<?php echo $currentPage ?>&id=<?php echo $adminArray[$i]->Id ?>"><img alt="edit" src="../Images/b_edit.png" border="0"/></a>
					<?php
					}
					?>
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