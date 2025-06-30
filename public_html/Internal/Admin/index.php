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
	<title>Internal platform</title>
</head>
<frameset rows="127,*,11" frameborder="no" border="0" framespacing="0">
	<frame src="top.php" name="topFrame" id="topFrame" scrolling="No" noresize="noresize"/>
	<frame src="center.php" name="mainFrame" id="mainFrame" scrolling="No" noresize="noresize"/>
	<frame src="bottom.php" name="bottomFrame" id="bottomFrame" scrolling="No" noresize="noresize"/>
</frameset>
<noframes>
	<body>
	</body>
</noframes>
</html>