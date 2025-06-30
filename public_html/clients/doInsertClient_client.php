<?php

// grab recaptcha library
require_once "recaptchalib.php";

// your secret key
$secret = "6LeEUpQUAAAAABhU14YeCdRB_3SgNaq8mGABg2wS";

// empty response
$response = null;

// check our secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

?>

<?php
      if (!$response->success)
	   {
        echo "Hi just tick the box if you are not a robot!";
      } else { 
    ?>


<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
$authnum = $_SESSION['authnum'];
$checkString = trim($_POST[checkString]);

$now = date("Y-m-d H:i:s");
$clientService = new ClientService();
$receiverService = new ReceiverService();
$maxNumberClient = $clientService->GetMaxNumberClient();
$number = $maxNumberClient->Number;
$number = $number + 1;
$loginId = trim($_POST[loginId]);
$password = trim($_POST[password]);

$firstName = trim($_POST[firstName]);
$surname = trim($_POST[surname]);
$company = trim($_POST[company]);
$telephone = trim($_POST[telephone]);
$email = trim($_POST[email]);
$countryId = $_POST[country];
$country = Common::GetCountryById($countryId);
$cityTown = trim($_POST[cityTown]);
$postcode = trim($_POST[postcode]);
$addressLineOne = trim($_POST[addressLineOne]);
$addressLineTwo = trim($_POST[addressLineTwo]);


$firstName2 = trim($_POST[firstName2]);
$surname2 = trim($_POST[surname2]);
$company2 = trim($_POST[company2]);
$telephone2 = trim($_POST[telephone2]);
$email2 = trim($_POST[email2]);
$countryId2 = $_POST[country2];
$country2 = Common::GetCountryById($countryId2);
$cityTown2 = trim($_POST[cityTown2]);
$postcode2 = trim($_POST[postcode2]);
$addressLineOne2 = trim($_POST[addressLineOne2]);
$addressLineTwo2 = trim($_POST[addressLineTwo2]);

if($authnum != strtoupper($checkString)){
	$errorClient = new Client(0, $loginId, $password, $number, $name, $contact, $address, $telephone, $email, $postcode, $countryId, 0, 1, "",
		$firstName, $surname, $cityTown, $addressLineOne, $addressLineTwo, $company);
	$errorReceiver =  new Receiver(0, 0, $contact2, $address2, $telephone2, $email2, $postcode2, $countryId2, 1, 1,
		$firstName2, $surname2, $cityTown2, $addressLineOne2, $addressLineTwo2, $company2);
	$_SESSION[errorClient] = $errorClient;
	$_SESSION[errorReceiver] = $errorReceiver;
	$_SESSION[message] .= "<span style='color:red;'>Invalid verification code</span>";
	echo "<script type='text/javascript'>history.back();</script>";
}else{
	unset($_SESSION['authnum']);
	
	$testClient1 = $clientService->GetClientByLoginId($loginId);
	if($testClient1){
		$errorClient = new Client(0, $loginId, $password, $number, $name, $contact, $address, $telephone, $email, $postcode, $countryId, 0, 1, "",
			$firstName, $surname, $cityTown, $addressLineOne, $addressLineTwo, $company);
		$errorReceiver =  new Receiver(0, 0, $contact2, $address2, $telephone2, $email2, $postcode2, $countryId2, 1, 1,
			$firstName2, $surname2, $cityTown2, $addressLineOne2, $addressLineTwo2, $company2);
		$_SESSION[errorClient] = $errorClient;
		$_SESSION[errorReceiver] = $errorReceiver;
		$_SESSION[message] = "<span style='color:red;'>LoginId \"".$loginId."\" has been used!</span><br/>";;
		echo "<script type='text/javascript'>history.back();</script>";
		return;
	}
	$testClient2 = $clientService->GetClientByNumber($number);
	while($testClient2){
		$maxNumberClient = $clientService->GetMaxNumberClient();
		$number = $maxNumberClient->Number;
		$number = $number + 1;
		$testClient2 = $clientService->GetClientByNumber($number);
	}

	$client = new Client(0, $loginId, sha1($password), $number, $name, $contact, $address, $telephone, $email, $postcode, $countryId, 1, 1, "",
		$firstName, $surname, $cityTown, $addressLineOne, $addressLineTwo, $company, $now, $loginId);
	$result1 = $clientService->AddClient($client);

	if($result1){
		$receiver = new Receiver(0, $result1, $contact2, $address2, $telephone2, $email2, $postcode2, $countryId2, 1, 1,
			$firstName2, $surname2, $cityTown2, $addressLineOne2, $addressLineTwo2, $company2, $now, $loginId);
		$result2 = $receiverService->AddReceiver($receiver);
	}

	if($result1 && $result2){
		echo "<script type='text/javascript'>location.href='register_success.php';</script>";
		$_SESSION[registerClientId] = $result1;
		$_SESSION[message] = "<span style='color:blue;'>Register successfully! Please <a style='text-decoration:underline;color:blue' href='../order/takeorder.php?isLogin=yes'>click here</a> to login!</span>";
	
		$tempClientName = explode(' ', $contact);
		$contact = $tempClientName[0];
		$now = date("d/m/Y");
	
		$mailSubject = "Confirm account registration(Quick-teck)";
		$mailBody = "Dear ".$firstName.",<br>
				Thank you for registering with Quick-teck on ".$now.".<br> 
				Your user ID is: ".$client->LoginId.".<br>
				You can use the following link to login your account. Whenever your details need updating, or reset your password simply log in and click the links under 'My Quick-teck'.<br>
				<a href='http://www.quick-teck.co.uk/clients/clientLogin.php' target='_blank'>http://www.quick-teck.co.uk/clients/clientLogin.php</a><br>
				Should you have any enquiries, please feel free to contact us. We look forward to seeing you online again soon.<br><br>

				Customer Service Team<br>
				Quick-teck<br>
				E: info@quick-teck.co.uk<br>
				T: 01763-448118<br>
				F: 01763-802102";
				
		
		if(Config::$mode=="local"){
			$sendEmailResult = mail(Config::$smtpMailTo_local, $mailSubject, $mailBody, "From:".Config::$smtpMailFrom_local."\r\nBCC:".Config::$smtpMailBCC_local."\r\nContent-type:text/html; charset=utf-8");
		}else if(Config::$mode=="live"){
			$sendEmailResult = mail($email, $mailSubject, $mailBody, "From:".Config::$smtpMailFrom_live."\r\nBCC:".Config::$smtpMailBCC_live."\r\nContent-type:text/html; charset=utf-8");
		}else{
			$sendEmailResult = mail(Config::$smtpMailTo_test, $mailSubject, $mailBody, "From:".Config::$smtpMailFrom_test."\r\nBCC:".Config::$smtpMailBCC_test."\r\nContent-type:text/html; charset=utf-8");
		}

		/*if($sendEmailResult){
			$_SESSION[message] .= "<br/><span style='color:blue;'>Email send to client successfully!</span>";
		}else{
			$_SESSION[message] .= "<br/><span style='color:red;'>Email send to client failed!</span>";
		}*/
	}
}

?>
	
<?php } ?>