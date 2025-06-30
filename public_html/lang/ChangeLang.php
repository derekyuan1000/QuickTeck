<?php
session_start();
require 'LauageService.php';
if(in_array($_GET['lang'], array('english','french','dutch','spanish')))
{
	$_SESSION['lang']=$_GET['lang'];
	echo '<script type="text/javascript">history.back();</script>';
	exit();
}
else 
{
	echo '<script type="text/javascript">history.back();</script>';
	exit();
}
?>