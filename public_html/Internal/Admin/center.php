<?php  
session_start();
if(empty($_SESSION[currentAdmin])){
	echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
	return;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body style="margin:0px">
    <table width="100%" style="height:100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="width:8px; background-color:#353c44">&nbsp;</td>
            <td style="width:163px; vertical-align:top">
                <iframe id="leftFrame" name="leftFrame" height="100%" width="100%" frameborder="0" src="left.php" scrolling="auto"></iframe>
            </td>
            <td style="width:10px; background-color:#add2da">&nbsp;</td>
            <td style="vertical-align:top">
                <iframe id="rightFrame" name="rightFrame" height="100%" width="100%" frameborder="0" src="right.php" scrolling="auto"></iframe>
            </td>
            <td style="width:8px; background-color:#353c44">&nbsp;</td>
        </tr>
    </table>
</body>
</html>