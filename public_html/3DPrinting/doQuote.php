<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExchangeRateService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/DHLFreightService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ThreeDPrintingOrderService_Class.php");

function GetBaseCost($volume, $quantity, $material){
	$result = 0;
	if($material != 3){
		$result = $volume / 1000 * 2.3 * 0.5 * $quantity;
	}else{
		$result = $volume / 1000 * 2.3 * 0.6 * $quantity;
	}
	if($result < 15.99){
		$result = 15.99;	
	}
	return $result;
}


function GetWeightByCountry($countryId, $price){
	if($countryId == 1){
		$price += 4.99;
	}else{
		$price += 11.95;
	}
	return $price;
}

function GetCurrencyType($countryId){
	if(!$countryId){
		$countryId = 180;
	}
	$countryService = new CountryService();
	$DHLFreightService = new DHLFreightService();
	$country = $countryService->GetCountryById($countryId);
	return $country->District4;
}

function GetWeightByCurrency($countryId, $price){
	$currencyType = GetCurrencyType($countryId);
	
	$exchangeRateService = new ExchangeRateService();
	$exchangeRateUsed = $exchangeRateService->GetNewExchangeRate(1);
	$exchangeRateUSDUsed = $exchangeRateService->GetNewExchangeRate(2);
	switch($currencyType){
		case "1": return $price;
		case "2": return $price * ($exchangeRateUsed->Rate + Config::$exchangeRateFactor);
		case "3": return $price * ($exchangeRateUSDUsed->Rate + Config::$exchangeRateUSDFactor);
	}
}

function GetPrice($volume, $quantity, $material, $currency, $countryId){
	$baseCost = 0;
	$countryPrice = 0;
	
	$baseCost = GetBaseCost($volume, $quantity, $material);

	$tempPrice = $baseCost;
	
	$price = GetWeightByCountry($countryId, $tempPrice);
	$countryPrice = $price - $tempPrice;
	$tempPrice = $price;
	
	$price = GetWeightByCurrency($countryId, $tempPrice);
	$currencyPrice = $price - $tempPrice;
	$tempPrice = $price;
	
	$price = round($tempPrice, 2);
	
	$currencyType = GetCurrencyType($countryId);
	
	$result = $price;
	
	$countryService = new CountryService();
	$countryQuote = $countryService->GetCountryById($countryId);
	if(!($countryQuote->District3>=49 && $countryQuote->District3<=93) && $countryId != 999){
		$result = "not available";
	}
	
	$resultArray = array();
	$resultArray[0] = $baseCost;
	$resultArray[1] = $countryPrice;
	$resultArray[2] = $currencyPrice;
	$resultArray[3] = $result;
	$resultArray[4] = $currencyType;
	return $resultArray;
}

$val = $_GET[val];
//$val = "2,50,300,100,1.6,1.0,1,GBP";
$val = explode(',', $val);
$quantity = trim($val[0]);
$volume = trim($val[1]);
$material = $val[2];
$countryId = $val[3];
$fileName = $val[4];
$color = $val[5];
$area = $val[6];
$size = $val[7];
$clientFileName = $val[8];
$type = $_GET[type];

if($type == "onlineQuote"){
	if(empty($_SESSION[threeDPrintingOnlineCuoteData])){
		$threeDPrintingOrder = new ThreeDPrintingOrder();
	}else{
		$threeDPrintingOrder = unserialize($_SESSION[threeDPrintingOnlineCuoteData]);
	}

	$threeDPrintingOrder->FileName = $fileName;
	$threeDPrintingOrder->Dimension = $size;
	$threeDPrintingOrder->Volume = $volume;
	$threeDPrintingOrder->SurfaceArea = $area;
	$threeDPrintingOrder->Material = $material;
	$threeDPrintingOrder->Color = $color;
	$threeDPrintingOrder->Quantity = $quantity;
	$threeDPrintingOrder->CountryId1 = $countryId;
	$threeDPrintingOrder->ClientFileName = $clientFileName;
	
	$_SESSION[threeDPrintingOnlineCuoteData] = serialize($threeDPrintingOrder);
	$priceArray = GetPrice($volume, $quantity, $material, $currency, $countryId);
	
}else if($type == "takeOrder"){
	$priceArray = GetPrice($volume, $quantity, $material, $currency, $countryId);
		
	$isVAT = $val[9];
	if($isVAT){
		$priceArray[5] = round($priceArray[3] * 1.2,2);
		
	}else{
		$priceArray[5] = $priceArray[3];
	}
	$priceArray[6] = $priceArray[5]  - $priceArray[3];
}
$result = $priceArray[0]. "|" . $priceArray[1]. "|" . $priceArray[2]. "|" . $priceArray[3]. "|" . $priceArray[4]. "|" . $priceArray[5]. "|" . $priceArray[6];
echo $result;
?>