<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
session_start();
$id = $_POST[id];
$now = date("Y-m-d H:i:s");

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

$clientService = new ClientService();
$receiverService = new ReceiverService();

$client = $clientService->GetClientById($id);
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
$client->LastModifyDate = $now;
$client->LastModifyPeople = $client->LoginId;
$result1 = $clientService->ModifyClient($client);

if($result1){
	$temp = $receiverService->GetReceiverByClientId($id);
	$receiver = $temp[0];
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
	$receiver->LastModifyPeople = $client->LoginId;
	$result2 = $receiverService->ModifyReceiver($receiver);
}

if($result1 && $result2){
	echo "<script type='text/javascript'>location.href='clientInformation.php';</script>";
	$_SESSION[message] = "<span style='color:blue;'>Modify successfully!</span>";
}
?>