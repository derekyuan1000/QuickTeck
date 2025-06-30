<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once("../DAL/MailAttachmentService_Class.php");
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/ReplyMailAttachmentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}

$adminService = new AdminService();
$mailInfoService = new MailInfoService();
$replyMailInfoService = new ReplyMailInfoService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION[currentAdmin]);
if($currentAdmin->LevelId != 1 && $currentAdmin->LevelId != 2 && $currentAdmin->LevelId != 5 && $currentAdmin->LevelId != 8 && $currentAdmin->LevelId != 9){
	echo "Sorry, you are not allowed to open this page!";
	return;
}
$mailId = $_GET[mailId];
$replyType = $_GET[replyType];
$mailInfo = $mailInfoService->GetMailInfoById($mailId);

$subject = "Re:".$mailInfo->Subject;
//$to = $mailInfo->ReplyToString ? $mailInfo->ReplyToString : $mailInfo->FromAddress;
$to = $mailInfo->FromAddress;
$toArray = explode(',', $mailInfo->ToString);
for($j=0; $j < count($toArray); $j++){
	if(strpos(trim($toArray[$j]),"info@quick-teck.co.uk")===0){
		continue;
	}
	$to .= ",".trim($toArray[$j]);
}
$cc = $mailInfo->CcString;
$bcc = "info@quick-teck.co.uk";
$now = date("Y-m-d H:i:s");

$replyMailInfo = new ReplyMailInfo();
$replyMailInfo->Subject = addslashes($subject);
$replyMailInfo->ToList = $to;
$replyMailInfo->CcList = $cc;
$replyMailInfo->BccList = $bcc;
$replyMailInfo->AttachmentsCount = 0;
$replyMailInfo->MailStatus = 4;
$replyMailInfo->ReplyTime = null;
$replyMailInfo->ApprovalTime = null;
$replyMailInfo->SendTime = null;
$replyMailInfo->IsNeedApproval = $mailInfo->IsNeedApproval;
$replyMailInfo->IntendantAdminId = null;
$replyMailInfo->BusinessAdminId = $currentAdmin->Id;
$replyMailInfo->IsEnable = 1;
$replyMailInfo->Remark = $Remark;
$result = $replyMailInfoService->AddReplyMailInfo($replyMailInfo);

$replyMailInfo->Id = $result;

$mailFrom =  $mailInfo->FromName ? $mailInfo->FromName : $mailInfo->FromAddress;
$mailFrom .=  "[".$mailInfo->FromAddress."]";

$filesize = filesize($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/MailBody/".$mailId."_Html.html");
$filename = $filesize ? "_Html.html" : "_Text.html";
if($replyType=="text"){
	$filename = "_Text.html";
}

$mailBody = file_get_contents($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/MailBody/".$mailId.$filename);
$replyMailBody = 
"<div style='font-family:Verdana; font-size:10pt'><br><br><br><br><br><br><br>".
"<div style='float:left;'>".
"<a href='http://www.quick-teck.co.uk/News/Content.php?Id=93' title=''><img src='http://www.quick-teck.co.uk/Internal/Images/cdv.png' width='184' height='115' alt='' /></a>".
"</div>".
"<div style='float:left; border-left:1px solid #cccccc;margin-left:5px; padding-left:5px'>".
"Regards<br>".
$currentAdmin->Name."<br>".
"Sales Team<br>".
"Quick-teck Electronics Limited<br><br>".
"Tel: 01763-448118 | Fax: 01763-802102<br>".
"Unit 7, The Quadrant, Newark Close, Royston, UK, SG8 5HL<br>".
"</div>".
"<div style='clear:both'>".
"</div>".
"</div>".
"<div style='font-family:Verdana; font-size:8pt; display:none'>".
"You have received this information because you have previously subscribed to our services and information.<br>".
"If you are not interested in receiving future information or offers from us please <a href='#'>unsubscribe here</a>.".
"</div>".
"------------------ The following is the content of the forwarded email ------------------<br>".
"From: " .$mailFrom."<br>".
"Time: ".Common::ChangeDateFormat($mailInfo->MailTime,"dateTime")."<br>".
"To: ".str_replace(">","]",str_replace("<","[",$mailInfo->ToString))."<br>".
"Subject: ".$mailInfo->Subject."<br><br>".
$mailBody;
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
	<form name="form1" method="post" action="../Do/doMailReply.php">
		<input id="id" name="id" type="hidden" value="<?php echo $mailInfo->Id ?>"/>
		<input id="page" name="page" type="hidden" value="<?php echo $page ?>"/>
		<input id="replyMailId" name="replyMailId" type="hidden" value="<?php echo $replyMailInfo->Id ?>"/>
		<div style="font-size:14px; font-weight:bold">Mail reply</div>
		<table width="1000px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:120px; height:25px;">
					<b>&nbsp;To:</b>
				</td>
				<td style="width:880px;padding-left:6px;">
					<input id="to" name="to" type="text" class="adminMyInput700" value="<?php echo $to ?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Subject:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="subject" name="subject" type="text" class="adminMyInput700" value="<?php echo $subject?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;CC:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="cc" name="cc" type="text" class="adminMyInput700" value="<?php echo $cc?>"/>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;BCC:</b>
				</td>
				<td style="padding-left:6px;">
					<input id="bcc" name="bcc" type="text" class="adminMyInput700" value="<?php echo $bcc?>"/>
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
					<textarea id="mailBody" name="mailBody"><?php echo $replyMailBody; ?></textarea>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:25px;">
					<b>&nbsp;Need approve:</b>
				</td>
				<td style="padding-left:6px;">
					<?php if($replyMailInfo->IsNeedApproval == 1){echo "Yes";}else{echo "No";}?>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="1000px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:30%; height:25px; text-align:right">
				                <input id="image" type="image" value="submit" src="../Images/b_send.gif" onclick="return checkMailReply()"/>
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