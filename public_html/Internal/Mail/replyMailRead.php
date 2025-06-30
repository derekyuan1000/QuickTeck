<?php
session_start();
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/ReplyMailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}

$adminService = new AdminService();
$replyMailInfoService = new ReplyMailInfoService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 2 && $currentAdmin->LevelId != 5 && $currentAdmin->LevelId != 8 && $currentAdmin->LevelId != 9){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
$id = $_GET[id];
$page = $_GET[page];

$replyMailAttachmentService = new ReplyMailAttachmentService();
$replyMailInfo = $replyMailInfoService->GetReplyMailInfoById($id);
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
	<form name="form1" method="post" action="../Do/doMailResend.php">
		<input id="id" name="id" type="hidden" value="<?php echo $replyMailInfo->Id ?>"/>
		<div style="font-size:14px; font-weight:bold">Mail approval</div>
		<table width="1000px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:120px; height:25px;">
					<b>&nbsp;Subject:</b>
				</td>
				<td style="width:880px;padding-left:6px;font-size:14px">
					<b><?php echo $replyMailInfo->Subject;?></b>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;To:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo htmlspecialchars($replyMailInfo->ToList); ?>
				</td>
			</tr>
			<?php
				if($replyMailInfo->CcList){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;CC:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo htmlspecialchars($replyMailInfo->CcList); ?>
				</td>
			</tr>
			<?php
				}
				if($replyMailInfo->BccList){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;BCC:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo htmlspecialchars($replyMailInfo->BccList); ?>
				</td>
			</tr>
			<?php
				}
				if($replyMailInfo->AttachmentsCount){
			?>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Attachment:</b>
				</td>
				<td style="padding-left:6px;">
					<b><?php echo $replyMailInfo->AttachmentsCount; if($replyMailInfo->AttachmentsCount == 1){echo "&nbsp;item:";}else{echo "&nbsp;items:";}?></b>
					<?php 
						$replyMailAttachmentArray = $replyMailAttachmentService->GetReplyMailAttachmentByMailId($replyMailInfo->Id);
						for($i=0; $i < count($replyMailAttachmentArray); $i++){
							echo "<br>";
							echo "<a href='downloadReplyAttachment.php?Id=".$replyMailAttachmentArray[$i]->Id."' target='_blank' style='color:black;'>".$replyMailAttachmentArray[$i]->FileName."</a>";
							echo "&nbsp;&nbsp;<a href='".$replyMailAttachmentArray[$i]->FilePath."' target='_blank' style='color:blue;'>Preview</a>";
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
					<iframe id="contentFrame" name="contentFrame" height="100%" width="100%" frameborder="0" src="<?php echo "ReplyMailBody/".$replyMailInfo->Id.".html"  ?>" scrolling="auto"></iframe>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Reply time:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo Common::ChangeDateFormat($replyMailInfo->ReplyTime,"dateTime"); ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Need approve:</b>
				</td>
				<td style="padding-left:6px;">
					<?php if($replyMailInfo->IsNeedApproval == 1){echo "Yes";	}else{echo "No";}?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Approve time:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo Common::ChangeDateFormat($replyMailInfo->ApprovalTime,"dateTime"); ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Send time:</b>
				</td>
				<td style="padding-left:6px;">
					<?php echo Common::ChangeDateFormat($replyMailInfo->SendTime,"dateTime"); ?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Replier:</b>
				</td>
				<td style="padding-left:6px;">
					<?php
						$businessAdmin = $adminService->GetAdminById($replyMailInfo->BusinessAdminId);
						echo $businessAdmin->Name;
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Approver:</b>
				</td>
				<td style="padding-left:6px;">
					<?php
						if($replyMailInfo->IntendantAdminId){
							$businessAdmin = $adminService->GetAdminById($replyMailInfo->IntendantAdminId);
							echo $businessAdmin->Name;
						}
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Status:</b>
				</td>
				<td style="padding-left:6px;">
					<?php if($replyMailInfo->MailStatus == 1){
							echo "Under approve";
						}else if($replyMailInfo->MailStatus == 2){
							echo "Under send";
						}else if($replyMailInfo->MailStatus == 3){
							echo "Sent";
						}
					?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="1000px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
							<td style="width:30%; height:25px; text-align:right">
								<?php if($replyMailInfo->MailStatus == 3){?>
								<input id="image" type="image" value="submit" src="../Images/b_resend.gif" onclick="return confirm('Confirm to resend?')"/>
				                <?php }?>&nbsp;
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