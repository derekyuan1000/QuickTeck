<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Jeremy/TaskService_Class.php");

if(empty($_POST['LoginId'])){
	echo "<script type='text/javascript'>alert('please login');history.back();</script>";
	return;
}
$LoginId = trim($_POST['LoginId']);
$Begin = mktime();
$Priority = '3';
$Projectnum = trim($_POST['projectnum']);
$Deadline = $Begin+7*24*3600;
$Comment = $LoginId.' request voucher .Expected delivery date:'.$_POST['Begin1'].' Actually delivery date:'.$_POST['Begin2'].' num:'.$Projectnum;
$Assignerids = 'Daniel';
$Ccids = 'Harrison';
$Auditids = 'Daniel';
$State = 'assign to Daniel';
$Attachment = '';
$Subject='Request voucher';
$Ctime=mktime();

$TaskService = new TaskService();
$task = new Task(null,$Begin, $Priority,$Projectnum,$Deadline,$Comment,$Assignerids,$Ccids,$Auditids,$State,$Attachment,$LoginId,1,$Subject,$Ctime);

$result = $TaskService->AddTask($task);


if($result){
	//echo "<script type='text/javascript'>location.href='../Admin/adminList.php?page=".$page."';</script>";
	echo "<script type='text/javascript'>alert('submit success!');history.back();</script>";

}
?>