<?php  
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/Admin_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminLevelService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/MyDictionaryService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
$adminService = new AdminService();
$admin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($admin->LevelId != 1){
	//echo "Sorry, you are not allowed to open this page!";
	//return;
}
$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}

$result = $adminService->GetIsShowAdminsByPage(Config::$mailPageSize, $currentPage);
$recoudCount = $result[0];
$adminArray = $result[1];
$pager = new Pager(Config::$mailPageSize,$recoudCount,$currentPage,"adminList.php?page=");
$myDictionaryService = new MyDictionaryService();
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
					Employee List
				</td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:10%;height:20px;">姓名</td>
				<td style="width:4%;">工号</td>
				<td style="width:6%;">性别</td>
				<td style="width:10%;">部门</td>
				<td style="width:10%;">职位</td>
				<td style="width:20%;">毕业院校</td>
				<td style="width:12%;">籍贯</td>
				<td style="width:10%;">入职时间</td>
				<td style="width:10%;">电话</td>
				<td style="width:8%;">详情</td>
			</tr>
			<?php 
			for($i=0; $i < count($adminArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50" 
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="height:20px;"><?php echo $adminArray[$i]->LastName.$adminArray[$i]->FirstName?></td>
				<td><?php echo $adminArray[$i]->Id?></td>
				<td>
				<?php 
					if($adminArray[$i]->Gender){
						$myDictionary = $myDictionaryService->GetMyDictionaryById($adminArray[$i]->Gender);
						echo $myDictionary->DValue;
					}
				?>
				</td>
				<td><?php echo $adminArray[$i]->Department?></td>
				<td><?php echo $adminArray[$i]->Position?></td>
				<td><?php echo $adminArray[$i]->School?></td>
				<td><?php echo $adminArray[$i]->Residency?></td>
				<td><?php $entryTime = explode(' ', $adminArray[$i]->EntryTime); echo Common::ChangeDateFormat($entryTime[0],"date");?></td>
				<td><?php echo $adminArray[$i]->Telephone?></td>
				<td><a href="employeeDetail.php?page=<?php echo $currentPage ?>&id=<?php echo $adminArray[$i]->Id ?>"><img alt="Detail" src="../Images/b_browse.png" border="0"/></a></td>
			</tr>
			<?php
			}
			?>
			<?php $pager->createPager();?>
		</table>
	</div>
	</body>
</html>