<?php
session_start();
include_once("../Models/AdminMessageSendbox_Class.php");
include_once("../DAL/AdminMessageSendboxService_Class.php");
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

$adminMessageSendboxService = new AdminMessageSendboxService();
$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}
$result = $adminMessageSendboxService->GetAdminMessageSendboxBySendAdminId($currentAdmin->Id, Config::$pageSize, $currentPage);
$recoudCount = $result[0];
$adminMessageSendboxArray = $result[1];
$pager = new Pager(Config::$mailPageSize,$recoudCount,$currentPage,"sendBox.php?page=");
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
					Sendbox
				</td>
                <td>
                    &nbsp;&nbsp;
                </td>
            </tr>
        </table>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:12%; height:20px;">Time</td>
				<td style="width:58%">Content</td>
				<td style="width:25%">To</td>
				<td style="width:5%">Control</td>
			</tr>
			<?php 
			for($i=0; $i < count($adminMessageSendboxArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50" 
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="height:20px;"><?php echo Common::ChangeDateFormat($adminMessageSendboxArray[$i]->CreateTime,"dateTime");?></td>
				<td style="text-align:left">&nbsp;&nbsp;<?php echo $adminMessageSendboxArray[$i]->Content?></td>
				<td>
				<?php 
						$adminIds = explode(',', $adminMessageSendboxArray[$i]->ReceiveAdminIds);
						for($j=0; $j < count($adminIds); $j++){
							$receiveAdmin = $adminService->GetAdminById($adminIds[$j]);
							echo $receiveAdmin->Name;
							if($j != count($adminIds)-1 && count($adminIds) != 1){
								echo ",&nbsp;";
							}
						}
				?>
				</td>
				<td>
					<!--<a href="messageModify.php?page=<?php echo $currentPage ?>&id=<?php echo $adminMessageSendboxArray[$i]->Id ?>"><img alt="edit" src="../Images/b_edit.png" border="0"/></a>
					&nbsp;|&nbsp;--><a href="../Do/doDeleteAdminMessageSendbox.php?page=<?php echo $currentPage ?>&id=<?php echo $adminMessageSendboxArray[$i]->Id ?>" onclick="return confirm('Confirm to delete?')"><img alt="delete" src="../Images/b_drop.png" border="0"/></a>
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