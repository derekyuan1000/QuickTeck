<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/GuestBookInfoService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");


$name = $_POST[name];
$email = $_POST[email];
$countryId = $_POST[country];
$city = $_POST[city];
$comment = $_POST[comment];
$now = date("Y-m-d H:i:s");

$guestBookInfoService = new GuestBookInfoService();

$guestBookInfo = new GuestBookInfo(0, $name, $email, $countryId, $city, $comment, $now, null, null, null, 1);

$result = $guestBookInfoService->AddGuestBookInfo($guestBookInfo);
if($result){
	echo "Congratulations! Your message will be posted upon our approval.";
}
?>