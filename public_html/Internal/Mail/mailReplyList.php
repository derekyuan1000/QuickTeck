<?php  
session_start();
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}

$adminService = new AdminService();
$replyMailInfoService = new ReplyMailInfoService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 9 && $currentAdmin->Id != 28){
	echo "Sorry, you are not allowed to open this page!";
	return;
}

$currentPage = $_GET[page];
if(!$currentPage){
	$currentPage = 1;
}

$searchText = $_POST[searchText];
$showAll = $_POST[showAll];
if($searchText){
	$_SESSION[mailReplyListSearchType] = "searchText";
	$_SESSION[mailReplyListSearchValue] = trim($searchText);
} else if($showAll){
		$_SESSION[mailReplyListSearchType] = "showAll";
	}

if($_SESSION[mailReplyListSearchType] == "searchText"){
	$result = $replyMailInfoService->GetAllReplyMailInfosByPage($_SESSION[mailReplyListSearchValue], Config::$mailPageSize, $currentPage);
} else {
	$result = $replyMailInfoService->GetAllReplyMailInfosByPage("",Config::$mailPageSize, $currentPage);
}

$recoudCount = $result[0];
$replyMailInfoArray = $result[1];
$pager = new Pager(Config::$mailPageSize,$recoudCount,$currentPage,"mailReplyList.php?page=");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="../Scripts/mail.js" type="text/javascript"></script>
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
</head>
<body>
	<div style="margin:3px;">
		<form name="form1" method="post" action="mailReplyList.php">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#353c44; color:#e1e2e3;">
            <tr>
                <td style="width:40px; height:24px; text-align:center;">
                    <img src="../Images/tb.gif" width="14" height="14" alt="" style="vertical-align:bottom"/>
                </td>
                <td style="width:300px; font-weight:bold">
					Mail reply
					<?php 
					if($_SESSION[mailReplyListSearchType] == "searchText"){
						echo "&nbsp;-Search: ".$_SESSION[mailReplyListSearchValue];
					} else{
						echo "&nbsp;-Show all";
					}
					?>
				</td>
 				<td style="width:450px;">
					<b>Search:&nbsp;</b>
                    <input id="searchText" name="searchText" type="text" class="adminMyInput3"/>
					<input type="submit" value="Search" class="adminButton">
                </td>
				<td style="width:100px;">
					<input id="showAll" name="showAll" type="hidden" value="showAll"/>
					<input type="submit" value="Show all" class="adminButton">
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; text-align:center; font-size:13px">
			<tr style="background-color:#d3eaef; font-weight:bold">
				<td style="width:15%; height:18px;">To</td>
				<td style="width:35%;">Subject</td>
				<td style="width:12%;">Sender</td>
				<td style="width:13%;">Reply time</td>
				<td style="width:12%;">Status</td>
				<td style="width:13%;">Control</td>
			</tr>
			<?php 
			for($i=0; $i < count($replyMailInfoArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50" 
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="text-align:left;height:18px;"><?php echo $replyMailInfoArray[$i]->ToList ?></td>
				<td style="text-align:left;">
					<?php if($replyMailInfoArray[$i]->AttachmentsCount > 0){ ?>
					<img src="../Images/attachment.jpg" width="10"/>
					<?php }else{ ?>
					&nbsp;&nbsp;&nbsp;
					<?php } ?>
					<?php echo Common::CutString($replyMailInfoArray[$i]->Subject, 75)?>
				</td>
				<td>
				<?php 
					if($replyMailInfoArray[$i]->BusinessAdminId){
						$businessAdmin = $adminService->GetAdminById($replyMailInfoArray[$i]->BusinessAdminId); 
						echo $businessAdmin->Name;
					}
				?>
				</td>
				<td><?php echo Common::ChangeDateFormat($replyMailInfoArray[$i]->ReplyTime,"dateTime");?></td>
				<td>
					<?php
						if($replyMailInfoArray[$i]->MailStatus == 1){
							echo "Under approve";
						}else if($replyMailInfoArray[$i]->MailStatus == 2){
							echo "Under send";
						}else if($replyMailInfoArray[$i]->MailStatus == 3){
							echo "Sent";
						}
					?>
				</td>
				</td>
				<td>
					<a href="replyMailRead.php?page=<?php echo $currentPage ?>&id=<?php echo $replyMailInfoArray[$i]->Id ?>"><img alt="browse" src="../Images/b_browse.png" border="0"/></a>
					&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../Do/doDeleteReplyMailInfo.php?page=<?php echo $currentPage ?>&id=<?php echo $replyMailInfoArray[$i]->Id ?>" onclick="return confirm('Confirm to delete?')"><img alt="delete" src="../Images/b_drop.png" border="0"/></a>
				</td>
			</tr>
			<?php
			}
			?>
			<?php $pager->createPager();?>
		</table>
		</form>
	</div>
	</body>
</html>