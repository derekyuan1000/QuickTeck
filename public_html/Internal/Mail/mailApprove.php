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
$replyMailAttachmentService = new ReplyMailAttachmentService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 5 && $currentAdmin->LevelId != 8 && $currentAdmin->LevelId != 9){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
$id = $_GET[id];
$page = $_GET[page];

$replyMailInfo = $replyMailInfoService->GetReplyMailInfoById($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
	<script src="../Scripts/mail.js" type="text/javascript"></script>
	<script src="../../kindeditor4/kindeditor.js" type="text/javascript"></script>
	<script type="text/javascript">
		var editor1;
		KindEditor.ready(function(K) {
			editor1 = K.create('#mailBody',{langType : 'en',width:'850px',height:'600px',
    			items:['source', '|','undo', 'redo', 'cut', 'copy', 'paste', 'plainpaste','|',
    			'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'insertorderedlist', 'insertunorderedlist', '|',
    			'subscript', 'superscript','link', 'unlink'],
				newlineTag : 'br'
			});
		});
		setTimeout("ajaxGetAttachment('<?php echo $replyMailInfo->Id ?>')",2000);
		setInterval("ajaxGetAttachment('<?php echo $replyMailInfo->Id ?>')",5000);
	</script>
    <title></title>
</head>
<body style="background-color:White; margin:3px;">
	<form name="form1" method="post" action="../Do/doMailApprove.php">
		<input id="id" name="id" type="hidden" value="<?php echo $replyMailInfo->Id ?>"/>
		<input id="page" name="page" type="hidden" value="<?php echo $page ?>"/>
		<div style="font-size:14px; font-weight:bold">Mail approve</div>
		<table width="1000px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:120px; height:25px;">
					<b>&nbsp;To:</b>
				</td>
				<td style="width:880px;padding-left:6px;">
					<input id="to" name="to" type="text" class="adminMyInput700" value="<?php echo $replyMailInfo->ToList ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Subject:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="subject" name="subject" type="text" class="adminMyInput700" value="<?php echo $replyMailInfo->Subject ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;CC:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="cc" name="cc" type="text" class="adminMyInput700" value="<?php echo $replyMailInfo->CcList ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;BCC:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="bcc" name="bcc" type="text" class="adminMyInput700" value="<?php echo $replyMailInfo->BccList ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Attachment:</b>
				</td>
				<td style="padding-left:6px;">
					<a href="#" style="font-weight:bold; color:blue; text-decoration:underline; font-size:14px" onclick="uploadAttachment(<?php echo $replyMailInfo->Id ?>)">Add file</a>
					<div id="divAttachment">Loading...</div>
					<input id="hdDivAttachment" type="hidden" value="0"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Content:</b>
				</td>
				<td style="padding-left:6px;">
					<textarea id="mailBody" name="mailBody">
					<?php  
						$mailBody = file_get_contents($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/ReplyMailBody/".$replyMailInfo->Id.".html");
						echo $mailBody;
					?>
					</textarea>
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
				                <input id="image" type="image" value="submit" src="../Images/b_send.gif" onclick="return checkMailApprove()"/>
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