<?php
session_start();
include_once("../Models/AdminMessageInbox_Class.php");
include_once("../DAL/AdminMessageInboxService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../index.php';</script>";
	return;
}

$adminService = new AdminService();
$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
//if($currentAdmin->LevelId != 1){
//	echo "Sorry, you are not allowed to open this page!";
//	return;
//}

$adminMessageInboxService = new AdminMessageInboxService();
$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}
$result = $adminMessageInboxService->GetAdminMessageInboxByReceiveAdminId($currentAdmin->Id, Config::$mailPageSize, $currentPage);
$recoudCount = $result[0];
$adminMessageInboxArray = $result[1];
$pager = new Pager(Config::$mailPageSize,$recoudCount,$currentPage,"inBox.php?page=");


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
					Inbox
				</td>
                <td>
                    &nbsp;&nbsp;
                </td>
            </tr>
        </table>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:12%; height:20px;">Time</td>
				<td style="width:68%">Content</td>
				<td style="width:15%">From</td>
				<td style="width:5%">Control</td>
			</tr>
			<?php 
			for($i=0; $i < count($adminMessageInboxArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50; <?php if(!$adminMessageInboxArray[$i]->Status){echo "font-weight:bold";} ?>"
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="height:20px;"><?php echo Common::ChangeDateFormat($adminMessageInboxArray[$i]->CreateTime,"dateTime");?></td>
				<td style="text-align:left">&nbsp;&nbsp;<?php echo $adminMessageInboxArray[$i]->Content?></td>
				<td>
				<?php 
						$sendAdminId = $adminMessageInboxArray[$i]->SendAdminId;
						$sendAdmin = $adminService->GetAdminById($sendAdminId);
						echo $sendAdmin->Name;
						
						$adminMessageInboxArray[$i]->Status = 1;
						$adminMessageInboxService->ModifyAdminMessageInboxStatus($adminMessageInboxArray[$i]);
				?>
				</td>
				<td>
					<!--<a href="messageModify.php?page=<?php echo $currentPage ?>&id=<?php echo $messageArray[$i]->Id ?>"><img alt="edit" src="../Images/b_edit.png" border="0"/></a>
					&nbsp;|&nbsp;--><a href="../Do/doDeleteAdminMessageInbox.php?page=<?php echo $currentPage ?>&id=<?php echo $adminMessageInboxArray[$i]->Id ?>" onclick="return confirm('Confirm to delete?')"><img alt="delete" src="../Images/b_drop.png" border="0"/></a>
					
				</td>
			</tr>
			<?php
			}
			?>
			<tr style="background-color:#ffffff;">
				<td style="height:25px" colspan="4">
					<?php $pager->createPager();?>
				</td>
			</tr>
		</table>
	</div>
	</body>
</html>