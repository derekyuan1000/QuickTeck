<?php
session_start();
include_once ("../Management/Jeremy/TaskService_Class.php");
include_once ("../Management/Jeremy/TaskCommentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");

$Taskid = $_POST[tid];
$Comment = $_POST[comment];
$Ctime = mktime();
$IsEnable = 1;
$orderId = $_POST[orderId];
$orderService = new OrderService();
$order = $orderService->GetOrderById($orderId);

$taskService = new TaskService();
$task = $taskService->GetTaskById($Taskid);
$Userid = $order->FirstName." ".$order->SurName;
$Action = 'Task Reply';
$Adminid = $task->Auditids;
$session_str = 'Reply Success';
$taskCommentService = new TaskCommentService();
$taskComment = new TaskComment(null, $Taskid, $Userid, $Adminid, $Comment, $Ctime, $Action, $IsEnable);
$result = $taskCommentService->AddTaskComment($taskComment);
$_SESSION[message]= "<br/><span style='color:blue;'>Your comment has been forward to our engineering team!</span>";
if ($result) {
	echo "<script type='text/javascript'>alert('Your comment has been forward to our engineering team!');history.back();</script>";
}
?>
