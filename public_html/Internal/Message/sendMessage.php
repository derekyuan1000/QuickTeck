<?php
session_start();
include_once("../DAL/AdminMessageInboxService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
	<script type="text/javascript">
		function mySelectAll(obj){
			var objs = document.getElementsByName("receiveAdmin[]");
			for (var i = 0; i < objs.length; i++) {
				objs[i].checked = obj.checked;
			}
		}
	</script>
    <title></title>
</head>
<body style="background-color:White; margin:3px;">
	<form name="form1" method="post" action="../Do/doInsertAdminMessage.php">
		<input id="clientId" name="clientId" type="hidden"/>
		<div style="font-size:14px; font-weight:bold">Send new notice</div>
		<table width="540px" border="0" cellpadding="0" cellspacing="1" style="background-color:#a8c7ce; font-size:12px; text-align:left">
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="width:120px; height:170px;">
					<b>&nbsp;Content:</b>
				</td>
				<td style="width:420px">
					<textarea id="content" name="content" rows="10" class="adminMyInput3" style="width:400px;margin:5px "></textarea>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
				<td style="height:30px;">
					<b>&nbsp;Receive admin:</b>
				</td>
				<td style="padding-left:4px">
					<input type="checkbox" name="selectAll" onclick="mySelectAll(this)"><b>Select all</b><br>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
					<?php
					$receiveAdminArray = $adminService->GetAllAdmins();
					$count = 0;
					for($i=0; $i < count($receiveAdminArray); $i++){
						if($receiveAdminArray[$i]->Id == 8|| $receiveAdminArray[$i]->Id == 26){
							continue;	
						}
						$count ++;
						echo '<td><input type="checkbox" name="receiveAdmin[]" value="'.$receiveAdminArray[$i]->Id.'">'.$receiveAdminArray[$i]->Name.'</td>';
						if($count % 5 == 0){
							echo "</tr><tr>";
						}
					}
					?>
					</tr>
					</table>
				</td>
			</tr>
			<tr style="background-color:#ffffff; color:#344b50;">
			    <td colspan="2">
				    <table width="540px" border="0" cellpadding="0" cellspacing="0">
				        <tr>
				            <td style="width:42%; height:25px; text-align:right">
				                <input id="image" type="image" value="submit" src="../Images/b_send.jpg"/>
				            </td>
				            <td style="width:16%">
				                
				            </td>
				            <td style="width:42%">
				                <a href="sendBox.php"><img alt="" src="../Images/b_return.gif" border="0"/></a>
				            </td>
				        </tr>
				    </table>
				</td>
			</tr>
		</table>
		<div id="js_Error" style="font-size:14px; font-weight:bold;">
			<?php echo $_SESSION[message]; $_SESSION[message]=""; ?>
		</div>
	</form>
</body>
</html>