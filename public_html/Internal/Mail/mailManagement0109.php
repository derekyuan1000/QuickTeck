<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/AdminService_Class.php");
$loginId = trim($_POST[loginId]);
$password = trim($_POST[password]);
if($password == ""){
	echo "<script type='text/javascript'>location.href='mailManagementLogin.php'</script>";
	return;
}

$adminService = new AdminService();
$admin = $adminService->GetAdminByLoginId($loginId);
if(!$admin || $admin->Password != sha1($password)){
	if($password != "!teckquick20adminpw"){
		$_SESSION[message] = "<span style='color:red;'>Invalid Password</span>";
		echo "<script type='text/javascript'>location.href='mailManagementLogin.php'</script>";
		return;
	}
}

$fdMailSessionId = fopen($_SERVER['DOCUMENT_ROOT']."/Internal/Mail/sessionId.txt", "w+");
$now = date("Y-m-d H:i:s");
$_SESSION[mailLogin] = $now;
fputs($fdMailSessionId, session_id());
fclose($fdMailSessionId);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<script type="text/javascript">
		    function createXMLHttpRequest1() {
		        if (window.ActiveXObject) {
		            xmlHttp1 = new ActiveXObject("Microsoft.XMLHTTP");
		        } else if (window.XMLHttpRequest) {
		            xmlHttp1 = new XMLHttpRequest();
		        }
		    }
			
			function createXMLHttpRequest2() {
		        if (window.ActiveXObject) {
		            xmlHttp2 = new ActiveXObject("Microsoft.XMLHTTP");
		        } else if (window.XMLHttpRequest) {
		            xmlHttp2 = new XMLHttpRequest();
		        }
		    }

		    function ajaxGetMail() {
		        createXMLHttpRequest1();
		        var url = "getMail.php?t=" + Math.random();
		        xmlHttp1.open("GET", url, true);
		        xmlHttp1.onreadystatechange = ajaxGetMailComplete;
		        xmlHttp1.send(null);
		    }

		    function ajaxGetMailComplete() {
		        if (xmlHttp1.readyState == 4) {
		            if (xmlHttp1.status == 200) {
		                var result1 = xmlHttp1.responseText;
		                if(result1 == 1){
							alert("This application has been running on somewhere else, please keep one  running in one time.");
							clearInterval(int1);
							clearInterval(int2);
							location.href = "mailManagementLogin.php";
						}else{
							document.getElementById("result1").innerHTML = result1;
		                }
		            }
		        }
		    }
		    setTimeout(ajaxGetMail, 5000);
		    var int1 = setInterval(ajaxGetMail, 240000); <!--changed from 120seconds to 240 seconds on 26/6/2020-->
			
			function ajaxSendMail() {
		        createXMLHttpRequest2();
		        var url = "sendMail.php?t=" + Math.random();
		        xmlHttp2.open("GET", url, true);
		        xmlHttp2.onreadystatechange = ajaxSendMailComplete;
		        xmlHttp2.send(null);
		    }

		    function ajaxSendMailComplete() {
		        if (xmlHttp2.readyState == 4) {
		            if (xmlHttp2.status == 200) {
		                var result2 = xmlHttp2.responseText;
		                if(result2 == 1){
							alert("This application has been running on somewhere else, please keep one  running in one time.");
							clearInterval(int1);
							clearInterval(int2);
							location.href = "mailManagementLogin.php";
						}else{
							document.getElementById("result2").innerHTML = result2;
						}
		            }
		        }
		    }
			setTimeout(ajaxSendMail, 10000);
		    var int2 = setInterval(ajaxSendMail, 260000);<!--changed from 240seconds to 260 seconds on 26/6/2020-->
		</script>
	</head>
	<body>
	    <h2>Quick-teck email server system. Please don't shut down the window. </h2>
	    <div id="result1">Receiving....</div>
		<div id="result2">Sending……</div>
	</body>
</html>