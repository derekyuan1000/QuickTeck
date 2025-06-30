<?php
session_start();
include_once("../DAL/MailInfoService_Class.php");
include_once("../DAL/ReplyMailInfoService_Class.php");
include_once("../DAL/AdminMessageInboxService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");

if(empty($_SESSION['currentAdmin'])){
  echo "<script type='text/javascript'>location.href='../../Management/index.php';</script>";
  return;
}

$mailInfoService = new MailInfoService();
$replyMailInfoService = new ReplyMailInfoService();
$adminService = new AdminService();
$adminMessageInboxService = new AdminMessageInboxService();

$currentAdmin = $adminService->GetAdminByLoginId($_SESSION['currentAdmin']);

$needAssignMailInfoArray = $mailInfoService->GetMailInfoByMailStatus(1);
$needReplyMailInfoArray = $mailInfoService->GetMailInfoByMailStatusAndBusinessAdminId(2, $currentAdmin->Id);
$needApproveMailArray = $replyMailInfoService->GetMailInfoByMailStatus(1);
$unReadAdminMessageInboxArray = $adminMessageInboxService->GetUnreadAdminMessageInboxByReceiveAdminId($currentAdmin->Id);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
  <script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
  
  <!--
  <script src="../../Management/Scripts/jquery-1.4.2.js" type="text/javascript"></script>
  -->
  <script src="../../Management/Scripts/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  var jq = jQuery.noConflict();
  
  var isRun1 = 0;
  var isRun2 = 0;
  var isRun3 = 0;
  var isRun4 = 0;
  
  function getMailCount(){
    if(0 == isRun1 && 0 == isRun2 && 0 == isRun3 && 0 == isRun4){
      isRun1=1;
      isRun2=1;
      isRun3=1;
      isRun4=1;
      
      var t = Math.random();
      var adminId = <?php echo $currentAdmin->Id ?>;
      jq.post("../Do/doAjaxGetMailCount.php",{t:t, type:1                  },function(data){jq("#needAssignMailCount"         ).html(data);isRun1 = 0;console.info('isRun1=0');}).error(function(){isRun1 = 0});
      jq.post("../Do/doAjaxGetMailCount.php",{t:t, type:2, adminId:adminId },function(data){jq("#needReplyMailCount"          ).html(data);isRun2 = 0;console.info('isRun2=0');}).error(function(){isRun2 = 0});
      jq.post("../Do/doAjaxGetMailCount.php",{t:t, type:3                  },function(data){jq("#needApproveMailCount"        ).html(data);isRun3 = 0;console.info('isRun3=0');}).error(function(){isRun3 = 0});
      jq.post("../Do/doAjaxGetMessageCount.php",{t:t, adminId:adminId      },function(data){jq("#unReadAdminMessageInboxCount").html(data);isRun4 = 0;console.info('isRun4=0');}).error(function(){isRun4 = 0});
    }else{
      console.info('running'+isRun1+isRun2+isRun3+isRun4);
    }
  }
  setInterval("getMailCount()",5000);
  </script>
  <style type="text/css">
  a:link{
      color: black;
    }
    a:visited{
      color:black;
    }
    a:active{
      color: blue;
    }
    a:hover{
      color: blue;
    }
  </style>
</head>
<body style="margin:0px; background-color:White">
<table width="147px" border="0" cellpadding="0" cellspacing="0" style="height:100%; text-align:center; font-size:12px">
    <tr>
        <td style="height:23px; background-image:url(../Images/main_34.gif); vertical-align:middle; cursor:pointer" id="imgMenu1" onclick="showSubMenu(1)">Mail management</td>
    </tr>
    <tr id="subMenu1">
        <td style="height:70px;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0" style="text-align:left; font-size:12px">
        <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Admin/adminList.php" target="rightFrame">Set on duty</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/inBox.php" target="rightFrame">Inbox(<span id="needReplyMailCount"><?php echo count($needReplyMailInfoArray); ?></span>)</a>
                    </td>
                </tr>
                 <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/outBox.php" target="rightFrame">Outbox</a>
                    </td>
                </tr>
                 <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/sendBox.php" target="rightFrame">Sendbox</a>
                    </td>
                </tr>
         <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/mailAssignList.php" target="rightFrame">Mail assign(<span id="needAssignMailCount"><?php echo count($needAssignMailInfoArray); ?></span>)</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/mailTrackingList.php" target="rightFrame">Mail tracking</a>
                    </td>
                </tr>
        <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/mailApproveList.php" target="rightFrame">Mail approve(<span id="needApproveMailCount"><?php echo count($needApproveMailArray); ?></span>)</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Mail/mailReplyList.php" target="rightFrame">All reply mail</a>
                    </td>
                </tr>
                <tr>
                    <td style="line-height:5px;">
            &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="height:23px; background-image:url(../Images/main_34.gif); vertical-align:middle; cursor:pointer" id="imgMenu2" onclick="showSubMenu(2)">Notice board</td>
    </tr>
    <tr id="subMenu2">
        <td style="height:70px;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0" style="text-align:left; font-size:12px">
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Message/sendMessage.php" target="rightFrame">Send new notice</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Message/inBox.php" target="rightFrame">Inbox(<span id="unReadAdminMessageInboxCount"><?php echo count($unReadAdminMessageInboxArray); ?></span>)</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Message/sendBox.php" target="rightFrame">Sendbox</a>
                    </td>
                </tr>
        <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../Message/employeeList.php" target="rightFrame">Employee list</a>
                    </td>
                </tr>
                <tr>
                    <td style="line-height:5px;">
            &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
  <tr>
        <td style="height:23px; background-image:url(../Images/main_34.gif); vertical-align:middle; cursor:pointer" id="imgMenu3" onclick="showSubMenu(3)">Weekly report</td>
    </tr>
  <tr id="subMenu3">
        <td style="height:50px;">
            <table width="80%" border="0" cellpadding="0" cellspacing="0" style="text-align:left; font-size:12px">
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../WeeklyReport/weekReportInsert.php" target="rightFrame">New ticket</a>
                    </td>
                </tr>
                 <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../WeeklyReport/myWeekReportList.php" target="rightFrame">My ticket list</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../WeeklyReport/approveWeekReportList.php" target="rightFrame">Approve ticket list</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:23px;" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">
                        <img src="../Images/left.gif" alt=""/>
                        <a href="../WeeklyReport/CCWeekReportList.php" target="rightFrame">CC ticket list</a>
                    </td>
                </tr>
                <tr>
                    <td style="line-height:5px;">
            &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>