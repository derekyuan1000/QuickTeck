<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientBonusPointService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");

$clientBonusPointService = new ClientBonusPointService();
$clientService = new ClientService();

$clientId = $_REQUEST["clientId"];
$key = $_REQUEST["key"];
$clientBonusPointService->UseBp($clientId, 10000, 1);
$client = $clientService->GetClientById($clientId);
if($key != substr($client->Password,0,10)){
	echo "0";
	return;	
}
$a = array('a','b','c','d','e','f','g','h','i','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z');
$b = array('2','3','4','5','6','7','8','9');
$c = "";
for($i = 0; $i < 16; $i++){
	if(fmod(rand(0,9),2)==0){
		$c.= $a[rand(0, 23)];
	}else{
		$c.= $b[rand(0, 7)];
	}
}
$voucherService = new VoucherService();
$voucher = $voucherService->GetVoucherByNumber($c); 
while($voucher){
	$c = "";
	for($i = 0; $i < 16; $i++){
		if(fmod(rand(0,9),2)==0){
			$c.= $a[rand(0, 23)];
		}else{
			$c.= $b[rand(0, 7)];
		}
	}
	$voucher = $voucherService->GetVoucherByNumber($c); 
}

$now = date("Y-m-d H:i:s");

$holidayService = new HolidayService();
$expiredTimeArray = $holidayService->GetDay($now, 365);
$expiredTime = $expiredTimeArray[count($expiredTimeArray)-1]->BasicDate;
$expiredTime = $expiredTime." 23:59:59";

$nowShow = Common::ChangeDateFormat($now,"date");
$expiredTimeShow = Common::ChangeDateFormat($expiredTime,"date");
$category = 1;
$percent = 100;
$maxPrice = 30;
$adminId = 8;
$status = 1;
//$columnsName = "`Number`,`ClientId`,`Email`,`Percent`,`MaxPrice`,`Comment`,`AdminId`,`Status`,"
//	."`ExpiredTime`,`CreateTime`,`UsedTime`,`OrderNumber`,`Category`,`BeginTime`,`Message`,`IsEnable`,"
//	."`Remark`";
$voucher = new Voucher(0, $c, $client->Id, $client->Eemail, $percent, $maxPrice, $comment, $adminId, $status, $expiredTime, $now, null, 
	null, $category, $now, $message, 1);
$result = $voucherService->AddVoucher($voucher);
if($result){
	echo "1";
}else{
	echo "0";	
}
?>
