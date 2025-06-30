<?php  
session_start();
if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>
<body style="margin:0px">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="line-height:11px; width:181px; background-image:url(../Images/main_71.gif);">&nbsp;</td>
            <td style="line-height:11px; background-image:url(../Images/main_72.gif);">&nbsp;</td>
            <td style="line-height:11px; width:17px; background-image:url(../Images/main_74.gif);">&nbsp;</td>
        </tr>
    </table>
</body>
</html>