<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/FindClientPasswordService_Class.php");
$authnum = $_SESSION['authnum'];
$loginId = trim($_POST[loginId]);
$email = trim($_POST[email]);
$checkString = trim($_POST[checkString]);
if($authnum != strtoupper($checkString)){
	$errorClient = new Client(0, $loginId, "", "", "", "", "", "", $email);
	$_SESSION[clientFindPW] = $errorClient;
	$_SESSION[message] .= "<span style='color:red;'>Invalid verification code</span>";
	echo "<script type='text/javascript'>history.back();</script>";
}else{
	unset($_SESSION['authnum']);
	$clientService = new ClientService();
	$client = $clientService->GetClientByLoginId($loginId);
	if(!$client || $client->IsRegister == 0 || strtolower($client->Email) != strtolower($email)){
		$errorClient = new Client(0, $loginId, "", "", "", "", "", "", $email);
		$_SESSION[clientFindPW] = $errorClient;
		$_SESSION[message] = "<span style='color:red;'>Invalid user ID or email address</span>";
		echo "<script type='text/javascript'>history.back();</script>";
	}else{
		$a = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$b = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$c = array('1','2','3','4','5','6','7','8','9','0');
		$randomKey = "";
		for($i = 0; $i < 100; $i++){
			if(fmod(rand(0,9),3)==0){
				$randomKey.= $a[rand(0, 25)];
			}else if(fmod(rand(0,9),3)==1){
				$randomKey.= $b[rand(0, 25)];
			}else{
				$randomKey.= $c[rand(0,9)];
			}
		}
		$now = date("Y-m-d H:i:s");
		$fcp = new FindClientPassword(0, $randomKey, $client->Id, $now, 1);
		$findClientPasswordService = new FindClientPasswordService();
		$result = $findClientPasswordService->AddFindClientPassword($fcp);
		
		if($result){
			$mailSubject = "Quick-teck reset password";
			$mailBody = "Dear ".$client->FirstName."<br><br>
					As you requested, please click on the link below or copy and paste the URL into the address bar of your browser to change your password:<br>
					<a href='http://www.quick-teck.co.uk/clients/resetPassword_client.php?key=".$randomKey."' target='_blank'>http://www.quick-teck.co.uk/clients/resetPassword_client.php?key=".$randomKey."</a><br><br>
					For security reason, the link expires in one hour.<br><br>
					If you don't expect to receive this email, please contact info@quick-teck.co.uk to let us know. Don't worry -- your account is still secure and no one has been given access to it. Most likely, someone just mistyped their email address while trying to reset their own password.<br><br>
					Regards!<br><br>
					Customer service team<br><br>
					Quick-teck";
			
			if(Config::$mode=="local"){
				$sendEmailResult = mail(Config::$smtpMailTo_local, $mailSubject, $mailBody, "From:".Config::$smtpMailFrom_local."\r\nBCC:".Config::$smtpMailBCC_local."\r\nContent-type:text/html; charset=utf-8");
			}else if(Config::$mode=="live"){
				$sendEmailResult = mail($email, $mailSubject, $mailBody, "From:sales@quick-teck.co.uk\r\nBCC:".Config::$smtpMailBCC_live."\r\nContent-type:text/html; charset=utf-8");
			}else{
				$sendEmailResult = mail(Config::$smtpMailTo_test, $mailSubject, $mailBody, "From:".Config::$smtpMailFrom_test."\r\nBCC:".Config::$smtpMailBCC_test."\r\nContent-type:text/html; charset=utf-8");
			}
			
			if($sendEmailResult){
				echo "<script type='text/javascript'>location.href='successFindPassword_client.php';</script>";
				$_SESSION[message] .= "<br/><span style='color:blue;'>A password reset message has been sent to your registered email address. Please sign in and follow the instruction to reset your password.</span>";
			}else{
				echo "<script type='text/javascript'>history.back();</script>";
				$_SESSION[message] .= "<br/><span style='color:red;'>The email for reset password was send failed! Please try again!</span>";
			}
		}
	}
}
?>