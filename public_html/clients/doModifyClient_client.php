<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
session_start();

$authnum = $_SESSION['authnum'];
$checkString = trim($_POST[checkString]);

$now = date("Y-m-d H:i:s");
$id = $_POST[id];
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
	$_SESSION[searchOrder] = $id;//clientId
	$_SESSION[message] .= "<span style='color:red;'>Invalid verification code</span>";
	echo "<script type='text/javascript'>history.back();</script>";
}else{
	unset($_SESSION['authnum']);
	
	$clientService = new ClientService();
	$receiverService = new ReceiverService();
	$testClient1 = $clientService->GetClientByLoginId($loginId);
	if($testClient1 && $testClient1->Id != $id){
		$errorStr = "<span style='color:red;'>LoginId \"".$loginId."\" has been used!</span><br/>";
		$_SESSION[message] = $errorStr;
		$_SESSION[searchOrder] = $id;//clientId
		echo "<script type='text/javascript'>history.back();</script>";
		return;
	}

	$client = $clientService->GetClientById($id);
	$client->LoginId = $loginId;
	$client->Password = sha1($password);
	$client->FirstName = $firstName;
	$client->SurName = $surname;
	$client->Company = $company;
	$client->Telephone = $telephone;
	$client->Email = $email;
	$client->CountryId = $countryId;
	$client->CityTown = $cityTown;
	$client->PostCode = $postcode;
	$client->AddressLineOne = $addressLineOne;
	$client->AddressLineTwo = $addressLineTwo;
	$client->IsRegister = 1;
	$client->LastModifyDate = $now;
	$client->LastModifyPeople = $loginId;
	$result1 = $clientService->ModifyClient($client);

	if($result1){
		$temp = $receiverService->GetReceiverByClientId($id);
		$receiver = $temp[0];
		if($receiver){
			$receiver->FirstName = $firstName2;
			$receiver->SurName = $surname2;
			$receiver->Company = $company2;
			$receiver->Telephone = $telephone2;
			$receiver->Email = $email2;
			$receiver->CountryId = $countryId2;
			$receiver->CityTown = $cityTown2;
			$receiver->PostCode = $postcode2;
			$receiver->AddressLineOne = $addressLineOne2;
			$receiver->AddressLineTwo = $addressLineTwo2;
			$receiver->LastModifyDate = $now;
			$receiver->LastModifyPeople = $loginId;
			$result2 = $receiverService->ModifyReceiver($receiver);
		}else{
			$receiver = new Receiver(0, $id, $contact2, $address2, $telephone2, $email2, $postcode2, $countryId2, 1, 1,
				$firstName2, $surname2, $cityTown2, $addressLineOne2, $addressLineTwo2, $company2, $now, $loginId);
			$result2 = $receiverService->AddReceiver($receiver);
		}
	}

	if($result1 && $result2){
		echo "<script type='text/javascript'>location.href='register_success.php';</script>";
		$_SESSION[registerClientId] = $id;
		$_SESSION[message] = "<span style='color:blue;'>Register successfully! Please <a style='text-decoration:underline;color:blue' href='../order/takeorder.php?isLogin=yes'>click here</a> to login!</span>";
	
		$tempClientName = explode(' ', $contact);
		$contact = $tempClientName[0];
		$now = date("d/m/Y");
	
		$mailSubject = "Confirm account registration(Quick-teck)";
		$mailBody = "Dear ".$firstName.", <br>
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