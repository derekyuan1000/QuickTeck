<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");

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
    <link href="../../Management/Styles/adminCss.css" type="text/css" rel="Stylesheet" />
	<script src="../../Management/Scripts/admin.js" type="text/javascript"></script>
	<script src="../../Management/Scripts/jquery-1.4.2.js" type="text/javascript"></script>
	<style type="text/css">
	a:link{
	    color: white;
    }
    a:visited{
	    color:white;
    }
    a:active{
	    color: white;
    }
    a:hover{
	    color: white;
    }
	</style>
</head>
<body>
<div id="webHead">
    <div id="topHead">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <!--<td style="width:378px; height:57px; background-image:url(../Images/main_01.gif)">&nbsp;</td>-->
                <td style="width:378px; height:57px; font-size:20px; font-weight:bold; color:White; padding-left:60px">Internal platform</td>
                <td>&nbsp;</td>
                <td style="width:281px; vertical-align:bottom">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width:33px; height:27px; background-image:url(../Images/main_05.gif)"></td>
                            <td style="width:248px; background-image:url(../Images/main_06.gif); text-align:center">
                                <table width="225px" border="0" cellpadding="0" cellspacing="0" style="text-align:right">
                                    <tr>
                                        <td style="height:17px;">
											<a href="../../Management/Admin/adminModifyPassword.php" target="rightFrame"><img src="../Images/pass.gif" width="69" height="17" alt="pass" border="0"/></a>
										</td>
                                        <td>
											<a href="../../Management/Admin/adminInfo.php" target="rightFrame"><img src="../Images/user.gif" width="69" height="17" alt="user" border="0"/></a>
										</td>
                                        <td>
											<a href="../../Management/Do/doLogout.php"><img src="../Images/quit.gif" width="69" height="17" alt="quit" border="0"/></a>
										</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div><!--topHead End-->
    <div id="middleHead">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:White; text-align:center">
            <tr>
                <td style="width:30px; height:40px; background-image:url(../Images/main_07.gif)">&nbsp;</td>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="width:21px;"><img src="../Images/main_13.gif" width="19" height="14" alt="Home"/></td>
                            <td style="width:40px;"><a href="right.php" target="rightFrame">Home</a></td>
                            <td style="width:21px;"><img src="../Images/main_19.gif" width="19" height="14" alt="Refresh"/></td>
                            <td style="width:50px;">Refresh</td>
                            <td style="width:21px;"><img src="../Images/main_21.gif" width="19" height="14" alt="Help"/></td>
                            <td style="width:40px;">Help</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td style="width:248px; background-image:url(../Images/main_11.gif); padding-left:5px">
                    <span style="font-weight:bold">Current time:</span>&nbsp;&nbsp;<span id="currentTime"><?php echo date("H:i:s d/m/Y")?></span>
                </td>
            </tr>
        </table>
    </div><!--middleHead End-->
    <div id="bottomHead">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:Black">
        <tr>
            <td style="width:8px; height:30px; background-image:url(../Images/main_28.gif)"></td>
            <td style="width:147px; background-image:url(../Images/main_29.gif);">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:40px">
                    <tr>
                        <td style="height:20px; vertical-align:bottom; font-weight:bold">Main menu</td>
                    </tr>
                </table>
            </td>
            <td style="width:39px; background-image:url(../Images/main_30.gif)"></td>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td style="width:200px; height:20px; vertical-align:bottom">
                        <span style="font-weight:bold">Current administrator:</span>&nbsp;&nbsp;<?php echo $_SESSION[currentAdmin]?>
                    </td>
                    <td style="width:200px; height:20px; vertical-align:bottom">
                        <span style="font-weight:bold">IP:</span>&nbsp;&nbsp;<?php echo $_SERVER["REMOTE_ADDR"];?>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                  </tr>
                </table>
            </td>
            <td style="width:17px; background-image:url(../Images/main_32.gif)"></td>
        </tr>
    </table>
    </div><!--bottomHead End-->
</div><!--webHead End-->
</body>
</html>
<script type="text/javascript">
	setInterval("showTime()",1000);
</script>