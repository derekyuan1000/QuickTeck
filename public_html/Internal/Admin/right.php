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
<body style="background-color:White; margin:0px; text-align:center; font-size:25px">
	Welcome to Internal platform<br/><br/>
</body>
</html>