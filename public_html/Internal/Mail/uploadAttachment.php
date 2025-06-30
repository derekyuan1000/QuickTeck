<?php
session_start();
$replyMailId = $_GET[replyMailId];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="../SWFUpload/css/default.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../SWFUpload/swfupload/swfupload.js"></script>
	<script type="text/javascript" src="../SWFUpload/js/swfupload.queue.js"></script>
	<script type="text/javascript" src="../SWFUpload/js/fileprogress.js"></script>
	<script type="text/javascript" src="../SWFUpload/js/handlers.js"></script>
	
	<script type="text/javascript">
		var swfu;
		window.onload = function() {
			var settings = {
				flash_url : "../SWFUpload/swfupload/swfupload.swf",
				upload_url: "doUploadAttachment.php?replyMailId=<?php echo $replyMailId ?>",
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_size_limit : "30720",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 50,
				file_queue_limit : 10,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "../SWFUpload/images/XPButtonUploadText_61x22.png",
				button_width: "61",
				button_height: "22",
				button_placeholder_id: "spanButtonPlaceHolder",
				
				// The event handler functions are defined in handlers.js
				file_dialog_start_handler : fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
			};
			swfu = new SWFUpload(settings);
	     };
		</script>
    <title></title>
</head>
<body style="background-color:White; margin:3px;">
	<form name="form1" method="post" action="uploadAttachment.php" enctype="multipart/form-data">
		<table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td>
					<div class="fieldset flash" id="fsUploadProgress">
						<span class="legend">File Upload</span>
					</div>
					<div id="divStatus"></div>
					<div>
						<span id="spanButtonPlaceHolder"></span>
						<input id="btnCancel" type="button" value="Cancel Uploads" onclick="cancelQueue(swfu);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
					</div>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>