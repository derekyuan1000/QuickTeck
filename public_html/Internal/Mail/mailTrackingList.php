<?php  
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}

$adminService = new AdminService();
$mailInfoService = new MailInfoService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 5 && $currentAdmin->LevelId != 8 && $currentAdmin->LevelId != 9){
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
	$_SESSION[mailTrackingListSearchType] = "searchText";
	$_SESSION[mailTrackingListSearchValue] = trim($searchText);
}else if($showAll){
	$_SESSION[mailTrackingListSearchType] = "showAll";
}


if($_SESSION[mailTrackingListSearchType] == "searchText"){
	$result = $mailInfoService->GetTrackingMailInfosByPage($_SESSION[mailTrackingListSearchValue], Config::$mailPageSize, $currentPage, 0, 0);
}else{
	$result = $mailInfoService->GetTrackingMailInfosByPage("",Config::$mailPageSize, $currentPage, 0, 0);
}

$recoudCount = $result[0];
$mailInfoArray = $result[1];
$pager = new Pager(Config::$mailPageSize,$recoudCount,$currentPage,"mailTrackingList.php?page=");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
	<script src="../../Management/Scripts/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="../Scripts/mail.js?t=<?php echo time(); ?>" type="text/javascript"></script>
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
</head>
<body>
	<div style="margin:3px;">
		<form name="form1" method="post" action="mailTrackingList.php">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#353c44; color:#e1e2e3;">
            <tr>
                <td style="width:40px; height:24px; text-align:center;">
                    <img src="../Images/tb.gif" width="14" height="14" alt="" style="vertical-align:bottom"/>
                </td>
                <td style="width:300px; font-weight:bold">
					Mail tracking
					<?php 
					if($_SESSION[mailTrackingListSearchType] == "searchText"){
						echo "&nbsp;(Search: ".$_SESSION[mailTrackingListSearchValue].")";
					} else{
						echo "&nbsp;(Show all)";
					}
					?>
				</td>
				<td style="width:450px;">
					<b>Search:&nbsp;</b>
                    <input id="searchText" name="searchText" type="text" class="adminMyInput3"/>
					&nbsp;&nbsp;&nbsp;&nbsp;
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
				<td style="width:5%; height:18px;">Flag</td>
				<td style="width:14%;">Sender</td>
				<td style="width:34%;">Subject</td>
				<td style="width:12%;">Time</td>
				<td style="width:7%;">Assign to</td>
				<td style="width:7%;">Vitality(min)</td>
				<td style="width:8%;">Status</td>
				<td style="width:5%;">Add</td>
				<td style="width:8%;">Control</td>
			</tr>
			<?php 
			for($i=0; $i < count($mailInfoArray); $i++)
			{
			?>
			<tr style="background-color:#ffffff; color:#344b50" 
				onmouseover="currentcolor=this.style.backgroundColor;this.style.backgroundColor='#d5f4fe'" 
				onmouseout="this.style.backgroundColor=currentcolor">
				<td style="text-align:center;height:18px;">
					<img id="flag<?php echo $mailInfoArray[$i]->Id; ?>" src="../Images/<?php if($mailInfoArray[$i]->MailFlag==2){echo "yellowflag.png";}else if($mailInfoArray[$i]->MailFlag==3){echo "redflag.png";}else{echo "whiteflag.png";}  ?>" height="16px" style="cursor:pointer" onclick="changeMailFlag('<?php echo $mailInfoArray[$i]->Id; ?>')"/>
				</td>
				<td style="text-align:left;">
					<?php 
						if($mailInfoArray[$i]->FromName){
							echo $mailInfoArray[$i]->FromName;
						}else{
							echo $mailInfoArray[$i]->FromAddress;
						}
					?>
				</td>
				<td style="text-align:left;">
					<?php if($mailInfoArray[$i]->AttachmentsCount > 0){ ?>
					<img src="../Images/attachment.jpg" width="10"/>
					<?php }else{ ?>
					&nbsp;&nbsp;&nbsp;
					<?php } ?>
					<?php 
						if(!$mailInfoArray[$i]->IsClose && $mailInfoArray[$i]->MailStatus == 1){
							echo "<b>".Common::CutString($mailInfoArray[$i]->Subject, 120)."</b>";
						}else{
							echo Common::CutString($mailInfoArray[$i]->Subject, 120);
						}
					?>
				</td>
				<td><?php echo Common::ChangeDateFormat($mailInfoArray[$i]->MailTime,"dateTime"); ?></td>
				<td>
				<?php 
					if($mailInfoArray[$i]->BusinessAdminId){
						$businessAdmin = $adminService->GetAdminById($mailInfoArray[$i]->BusinessAdminId); 
						echo $businessAdmin->Name;
					}
				?>
				</td>
				<td>
				<?php 
					$ratedVitalityTime = $mailInfoArray[$i]->RatedVitalityTime;
					$realVitalityTime = $mailInfoArray[$i]->RealVitalityTime;
					if($mailInfoArray[$i]->IsClose){
						echo $realVitalityTime."/".$ratedVitalityTime;
					}else {
						if($mailInfoArray[$i]->MailStatus == 2){
							$assignTime = strtotime($mailInfoArray[$i]->AssignTime);
							$nowTime = time();
							$diff = ceil(($nowTime - $assignTime)/60);
							
							if($diff - $ratedVitalityTime > 120){
								echo "<span style='color:red'>".$diff."/".$ratedVitalityTime."</span>";
							}else if($diff - $ratedVitalityTime > 0){
								echo "<span style='color:blue'>".$diff."/".$ratedVitalityTime."</span>";
							}else{
								echo $diff."/".$ratedVitalityTime;
							}
						}else if($mailInfoArray[$i]->MailStatus == 3){
							echo $realVitalityTime."/".$ratedVitalityTime;
						}
					}
				?>
				</td>
				<td>
					<?php
						if($mailInfoArray[$i]->MailStatus == 1){
							echo "Pending";
						}else if($mailInfoArray[$i]->MailStatus == 2){
							echo "Assigned";
						}else if($mailInfoArray[$i]->MailStatus == 3){
							echo "Replied";
						}
					?>
				</td>
				<td>
					<?php 
						if($mailInfoArray[$i]->IsOrder){
							echo "O";
						}
						if($mailInfoArray[$i]->IsClose){
							echo "C";
						}
					?>
				</td>
				<td>
					<a href="mailRead.php?page=<?php echo $currentPage ?>&id=<?php echo $mailInfoArray[$i]->Id ?>"><img alt="edit" src="../Images/b_edit.png" border="0"/></a>
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