<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once("../DAL/MailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}

$adminService = new AdminService();
$mailInfoService = new MailInfoService();
$mailAttachmentService = new MailAttachmentService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 2 && $currentAdmin->LevelId != 5 && $currentAdmin->LevelId != 8 && $currentAdmin->LevelId != 9){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
$id = $_GET[id];
$page = $_GET[page];

$mailInfo = $mailInfoService->GetMailInfoById($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
    <title></title>
</head>
<body style="background-color:White; margin:3px;">
	<form name="form1" method="post" action="../Do/doMailRead.php">
		<input id="id" name="id" type="hidden" value="<?php echo $mailInfo->Id ?>"/>
		<input id="page" name="page" type="hidden" value="<?php echo $page ?>"/>
		<div style="font-size:14px; font-weight:bold">Mail Content&nbsp;&nbsp;
			<a href="mailReply.php?replyType=html&mailId=<?php echo $mailInfo->Id ?>" style="font-weight:bold; color:blue; text-decoration:underline;">Reply this mail</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="mailReply.php?replyType=text&mailId=<?php echo $mailInfo->Id ?>" style="font-weight:bold; color:blue; text-decoration:underline;">Reply this mail(Text)</a>
		</div>
		<table width="1000px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:120px; height:25px;">
					<b>&nbsp;Subject:</b>
				</td>
				<td style="width:880px;padding-left:6px;font-size:14px">
					<b><?php echo $mailInfo->Subject;?></b>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;From:</b>
				</td>
				<td style="padding-left:6px;">
					<?php 
						if($mailInfo->FromName){
							echo $mailInfo->FromName;
						}else{
							echo $mailInfo->FromAddress;
						}
						echo "&nbsp;&lt;".$mailInfo->FromAddress."&gt;";
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Time:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo Common::ChangeDateFormat($mailInfo->MailTime,"dateTime"); ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;To:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo htmlspecialchars($mailInfo->ToString); ?>
				</td>
			</tr>
			<?php
				if($mailInfo->CcString){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Cc:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo htmlspecialchars($mailInfo->CcString); ?>
				</td>
			</tr>
			<?php
				}
				if($mailInfo->AttachmentsCount){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Attachment:</b>
				</td>
				<td style="padding-left:6px;">
					<b><?php echo $mailInfo->AttachmentsCount; if($mailInfo->AttachmentsCount == 1){echo "&nbsp;item:";}else{echo "&nbsp;items:";}?></b>
					<?php 
						$mailAttachmentArray = $mailAttachmentService->GetMailAttachmentByMailIdAndFileType($mailInfo->Id,2);
						for($i=0; $i < count($mailAttachmentArray); $i++){
							echo "<br>";
							echo "<a href='downloadAttachment.php?Id=".$mailAttachmentArray[$i]->Id."' target='_blank' style='color:black;'>".$mailAttachmentArray[$i]->FileName."</a>";
							echo "&nbsp;&nbsp;<a href='".$mailAttachmentArray[$i]->FilePath."' target='_blank' style='color:blue;'>Preview</a>";
						}
					?>
				</td>
			</tr>
			<?php
				}
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Content:</b>
				</td>
				<td style="height:500px">
					<?php  
						$filesize = filesize($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/MailBody/".$mailInfo->Id."_Html.html");
						$filename = $filesize ? "_Html.html" : "_Text.html";
					?>
					<iframe id="contentFrame" name="contentFrame" height="100%" width="100%" frameborder="0" src="<?php echo "MailBody/".$mailInfo->Id.$filename  ?>" scrolling="auto"></iframe>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Status:</b>
				</td>
				<td style="padding-left:6px;">
					<?php if($mailInfo->MailStatus == 1){
							echo "Pending";
						}else if($mailInfo->MailStatus == 2){
							echo "Assigned";
						}else if($mailInfo->MailStatus == 3){
							echo "Replied";
						}
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Is Order:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="isOrder1" name="isOrder" type="radio" value="1" <?php if($mailInfo->IsOrder==1){echo 'checked="checked"';} ?>/>Yes&nbsp;&nbsp;
					<input id="isOrder0" name="isOrder" type="radio" value="0" <?php if($mailInfo->IsOrder==0){echo 'checked="checked"';} ?>/>No
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Is Close:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="isClose1" name="isClose" type="radio" value="1" <?php if($mailInfo->IsClose==1){echo 'checked="checked"';} ?>/>Yes&nbsp;&nbsp;
					<input id="isClose0" name="isClose" type="radio" value="0" <?php if($mailInfo->IsClose==0){echo 'checked="checked"';} ?>/>No
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Need approve:</b>
				</td>
				<td style="padding-left:6px;">
					<?php if($mailInfo->IsNeedApproval == 1){echo "Yes";	}else{echo "No";}?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Vitality(minutes):</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo $mailInfo->RatedVitalityTime?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Assign to:</b>
				</td>
				<td style="padding-left:6px;">
					<?php
						$businessAdmin = $adminService->GetAdminById($mailInfo->BusinessAdminId);
						echo $businessAdmin->Name;
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Assign time:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo Common::ChangeDateFormat($mailInfo->AssignTime,"dateTime"); ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Reply time:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo Common::ChangeDateFormat($mailInfo->ReplyTime,"dateTime"); ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="1000px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:30%; height:25px; text-align:right">
				                <input id="image" type="image" value="submit" src="../Images/b_save.gif"/>
				            </td>
				            <td style="width:5%">
				                
				            </td>
				            <td style="width:10%">
				                <a href="javascript:history.back();"><img alt="" src="../Images/b_return.gif" border="0"/></a>
							</td>
							<td style="width:55%">
								<div id="js_Error" style="font-size:14px; font-weight:bold;">
									<?php echo $_SESSION[message]; $_SESSION[message]=""; ?>
								</div>
							</td>
				        </tr>
				    </table>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>