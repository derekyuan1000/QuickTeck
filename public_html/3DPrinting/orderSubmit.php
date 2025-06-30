<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ReceiverService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderProcessingService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderCommentService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderDetailService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/HolidayService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/VoucherService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/PdfMailer_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Client/doQuote2.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ExchangeRateService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ThreeDPrintingOrderService_Class.php");

$clientService = new ClientService();
$receiverService = new ReceiverService();

if(empty($_SESSION[currentClient]) || $_POST[total] == ""){
	$_SESSION[returnPage] = "../3DPrinting/orderNow.php";
	echo "<script type='text/javascript'>location.href='selectTakeOrderType.php';</script>";
	return;
}else{
	$_SESSION[returnPage] = "";
}

$now = date("Y-m-d H:i:s");

$echoMessage =  "<b>Submit process...... </b><br/>";
$to = "info@quick-teck.co.uk";//English Email To
$from = $_POST['email'];//English Email From
$bcc = "1226983621@qq.com";//English and Chinese Email BCC

$headers = "From:$from\r\nBCC:$bcc\r\nContent-type:text/html; charset=utf-8";
$headers2 = "From:$to\r\nBCC:$bcc\r\nContent-type:text/html; charset=utf-8";

$firstName = trim($_POST[firstName]);
$surname = trim($_POST[surname]);
$company = trim($_POST[company]);
$telephone = trim($_POST[phone]);
$email = trim($_POST[email]);
$countryId = $_POST[country];
$country = Common::GetCountryById($countryId);
$cityTown = trim($_POST[cityTown]);
$postcode = trim($_POST[deliverypostcode]);
$addressLineOne = trim($_POST[deliveryaddress1]);
$addressLineTwo = trim($_POST[deliveryaddress2]);
$totalPrice = trim($_POST[total]);
$quantity = trim($_POST[quantity]);
$width = trim($_POST[width]);
$length = trim($_POST[length]);
$fileName = trim($_POST[fileName]);
$clientFileName = trim($_POST[clientFileName]);

$orderNumber = date("YmdHis");

switch ($_POST['currencyType']) {
	case "1": $currencyString = "&pound;"; break;
	case "2": $currencyString = "&euro;"; break;
	case "3": $currencyString = "&#36;"; break;
}

$body = "Your 3D printing order has been submitted. The 3D modeling file will be reviewed once the payment been cleared. In the case if any issues noticed, we will contact you. Otherwise the printing job will start afterwards.<br>
		The uploaded 3D file is:\" ". $_POST[fileName]. " (".$_POST['clientFileName'].")\" <br>
		The order information is the following: <br><br>";
$body.= "Firstname: ".$firstName."<br>";
$body.= "Surname: ".$surname."<br>";
$body.= "Organization/Company: ".$company."<br>";
$body.= "Email: ".$email."<br>";
$body.= "Phone number: ".$telephone."<br>";
$body.= "Shipping address line1: ".$addressLineOne."<br>";
$body.= "Shipping address line2: ".$addressLineTwo."<br>";
$body.= "Town/City: ".$cityTown."<br>";
$body.= "Postcode: ".$postcode."<br>";
$body.= "Country: ".$country."<br>";
$body.= "Order Number: ".$orderNumber."<br>";
$body.= "Surface area: ".$_POST[area]."<br>";
$body.= "Quantity: ".$_POST[quantity]."<br>";
$body.= "Dimension: ".$_POST[size]."<br>";
$body.= "Volume: ".$_POST[volume]."<br>";
switch ($_POST[material]){
	case 1:$body.= "Material: ABS<br>";$materialType="ABS";break;
	case 2:$body.= "Material: PLA<br>";$materialType="PLA";break;
	case 3:$body.= "Material: Nelon<br>";$materialType="Nelon";break;
}
switch ($_POST[color]){
	case 1:$body.= "Color: White<br>";$color="White";break;
	case 2:$body.= "Color: Black<br>";$color="Blace";break;
	case 3:$body.= "Color: Red<br>";$color="Red";break;
}

switch ($_POST[haveVAT]){
	case 0:$body.= "Have VAT number: No<br>";$haveVAT="No";break;
	case 1:$body.= "Have VAT number: Yes<br>";$haveVAT="Yes";break;
}
if($_POST[haveVAT]){
	$body.= "VAT number: ".$_POST[VATNumber]."<br>";
}
if($_POST[haveVAT] && $_POST[VATNumber]){
	$body.= "exc VAT price: ".$_POST[total]."<br>";
}else{
	$body.= "exc VAT price: ".round($_POST[total] / 1.2, 2)."<br>";
}
if($_POST[total] == 0){
	$body.= "Total price: Contact us<br>";
}else{
	$body.= "Total price: ".$currencyString.$_POST[total]."<br>";
}
$body.= "Message: ".$_POST["message"]."<br>";
$body.= "Terms and conditions: ".$_POST["terms"]."<br>";

$subject = "3DPrinting order form";
$send = mail($to, $subject, $body, $headers);
$send2 = mail($from, $subject, $body, $headers2);

if($send){
	$echoMessage .= "<b>You have successfully submitted your order information!</b>"; 
} else {
	$echoMessage .= "<font size=\"2\" color=\"FF0033\">We encountered an error sending your mail, please notify info@quick-teck.co.uk</font>";
}

if(empty($_SESSION[threeDPrintingOrderSubmit])){
	$threeDPrintingOrder = new ThreeDPrintingOrder();
}else{
	$threeDPrintingOrder = unserialize($_SESSION[threeDPrintingOrderSubmit]);
}


$threeDPrintingOrder->Number = $orderNumber;
$threeDPrintingOrder->FileName = $_POST[fileName];
$threeDPrintingOrder->Dimension = $_POST[size];
$threeDPrintingOrder->Volume = $_POST[volume];
$threeDPrintingOrder->SurfaceArea = $_POST[area];
$threeDPrintingOrder->Material = $materialType;
$threeDPrintingOrder->Color = $color;
$threeDPrintingOrder->Quantity = $_POST[quantity];
$threeDPrintingOrder->CountryId1 = $country;
$threeDPrintingOrder->ClientFileName = $_POST['clientFileName'];
$threeDPrintingOrder->VATPrice = $_POST['price6'];
$threeDPrintingOrder->TotalPrice = $_POST['price5'];
$threeDPrintingOrder->ExcVATPrice = $_POST['price3'];
$threeDPrintingOrder->CurrencyType = $_POST['currencyType'];
$threeDPrintingOrder->FirstName1 = $firstName;
$threeDPrintingOrder->SurName1 = $surname;
$threeDPrintingOrder->Company1 = $company;
$threeDPrintingOrder->Email1 = $email;
$threeDPrintingOrder->Telephone1 = $telephone;
$threeDPrintingOrder->CityTown1 = $cityTown;
$threeDPrintingOrder->AddressLineOne1 = $addressLineOne;
$threeDPrintingOrder->AddressLineTwo1 = $addressLineTwo;
$threeDPrintingOrder->Postcode1 = $postcode;
$threeDPrintingOrder->CountryId1 = $countryId;

$_SESSION[threeDPrintingOrderSubmit] = serialize($threeDPrintingOrder);

$langdate['ordersubmit'][0]['english']='Home';
$langdate['ordersubmit'][0]['french']='Accueil';
$langdate['ordersubmit'][0]['dutch']='';
$langdate['ordersubmit'][0]['spanish']='';
$langdate['ordersubmit'][1]['english']='Order now';
$langdate['ordersubmit'][1]['french']='Passer une commande';
$langdate['ordersubmit'][1]['dutch']='';
$langdate['ordersubmit'][1]['spanish']='';
$langdate['ordersubmit'][2]['english']='Billing information';
$langdate['ordersubmit'][2]['french']='Données de facturation';
$langdate['ordersubmit'][2]['dutch']='';
$langdate['ordersubmit'][2]['spanish']='';
$langdate['ordersubmit'][3]['english']='Shipping information';
$langdate['ordersubmit'][3]['french']='Informations de livraison';
$langdate['ordersubmit'][3]['dutch']='';
$langdate['ordersubmit'][3]['spanish']='';
$langdate['ordersubmit'][4]['english']='Firstname';
$langdate['ordersubmit'][4]['french']='Prénom';
$langdate['ordersubmit'][4]['dutch']='';
$langdate['ordersubmit'][4]['spanish']='';
$langdate['ordersubmit'][5]['english']='Surname';
$langdate['ordersubmit'][5]['french']='Nom';
$langdate['ordersubmit'][5]['dutch']='';
$langdate['ordersubmit'][5]['spanish']='';
$langdate['ordersubmit'][6]['english']='Organization/Company';
$langdate['ordersubmit'][6]['french']='Organisation/Entreprise';
$langdate['ordersubmit'][6]['dutch']='';
$langdate['ordersubmit'][6]['spanish']='';
$langdate['ordersubmit'][7]['english']='Email';
$langdate['ordersubmit'][7]['french']='Courriel';
$langdate['ordersubmit'][7]['dutch']='';
$langdate['ordersubmit'][7]['spanish']='';
$langdate['ordersubmit'][8]['english']='Phone number';
$langdate['ordersubmit'][8]['french']='Téléphone';
$langdate['ordersubmit'][8]['dutch']='';
$langdate['ordersubmit'][8]['spanish']='';
$langdate['ordersubmit'][9]['english']='Shipping  address line1';
$langdate['ordersubmit'][9]['french']='Adresse de livraison 1';
$langdate['ordersubmit'][9]['dutch']='';
$langdate['ordersubmit'][9]['spanish']='';
$langdate['ordersubmit'][10]['english']='Shipping  address line2';
$langdate['ordersubmit'][10]['french']='Adresse de livraison 2';
$langdate['ordersubmit'][10]['dutch']='';
$langdate['ordersubmit'][10]['spanish']='';
$langdate['ordersubmit'][11]['english']='Town/City';
$langdate['ordersubmit'][11]['french']='Ville';
$langdate['ordersubmit'][11]['dutch']='';
$langdate['ordersubmit'][11]['spanish']='';
$langdate['ordersubmit'][12]['english']='Postcode';
$langdate['ordersubmit'][12]['french']='Code Postal';
$langdate['ordersubmit'][12]['dutch']='';
$langdate['ordersubmit'][12]['spanish']='';
$langdate['ordersubmit'][13]['english']='Country';
$langdate['ordersubmit'][13]['french']='Pays';
$langdate['ordersubmit'][13]['dutch']='';
$langdate['ordersubmit'][13]['spanish']='';
$langdate['ordersubmit'][14]['english']='Printing job information';
$langdate['ordersubmit'][14]['french']='Printing job information';
$langdate['ordersubmit'][14]['dutch']='';
$langdate['ordersubmit'][14]['spanish']='';
$langdate['ordersubmit'][15]['english']='Order number';
$langdate['ordersubmit'][15]['french']='Numéro de commande';
$langdate['ordersubmit'][15]['dutch']='';
$langdate['ordersubmit'][15]['spanish']='';
$langdate['ordersubmit'][16]['english']='Board layer';
$langdate['ordersubmit'][16]['french']='Nombre de couches';
$langdate['ordersubmit'][16]['dutch']='';
$langdate['ordersubmit'][16]['spanish']='';
$langdate['ordersubmit'][17]['english']='Quantity';
$langdate['ordersubmit'][17]['french']='Quantité';
$langdate['ordersubmit'][17]['dutch']='';
$langdate['ordersubmit'][17]['spanish']='';
$langdate['ordersubmit'][18]['english']='Length(mm)';
$langdate['ordersubmit'][18]['french']='Longueur (mm)';
$langdate['ordersubmit'][18]['dutch']='';
$langdate['ordersubmit'][18]['spanish']='';
$langdate['ordersubmit'][19]['english']='Width(mm)';
$langdate['ordersubmit'][19]['french']='Largeur (mm)';
$langdate['ordersubmit'][19]['dutch']='';
$langdate['ordersubmit'][19]['spanish']='';
$langdate['ordersubmit'][20]['english']='Material';
$langdate['ordersubmit'][20]['french']='Support';
$langdate['ordersubmit'][20]['dutch']='';
$langdate['ordersubmit'][20]['spanish']='';
$langdate['ordersubmit'][21]['english']='Thickness';
$langdate['ordersubmit'][21]['french']='Épaisseur';
$langdate['ordersubmit'][21]['dutch']='';
$langdate['ordersubmit'][21]['spanish']='';
$langdate['ordersubmit'][22]['english']='Copper weight';
$langdate['ordersubmit'][22]['french']='Poids du cuivre';
$langdate['ordersubmit'][22]['dutch']='';
$langdate['ordersubmit'][22]['spanish']='';
$langdate['ordersubmit'][23]['english']='Solder mask';
$langdate['ordersubmit'][23]['french']='Vernis épargne';
$langdate['ordersubmit'][23]['dutch']='';
$langdate['ordersubmit'][23]['spanish']='';
$langdate['ordersubmit'][24]['english']='Silkscreen';
$langdate['ordersubmit'][24]['french']='Sérigraphie';
$langdate['ordersubmit'][24]['dutch']='';
$langdate['ordersubmit'][24]['spanish']='';
$langdate['ordersubmit'][25]['english']='Surface finish';
$langdate['ordersubmit'][25]['french']='Finition';
$langdate['ordersubmit'][25]['dutch']='';
$langdate['ordersubmit'][25]['spanish']='';
$langdate['ordersubmit'][26]['english']='Lead time';
$langdate['ordersubmit'][26]['french']='Délai de livraison';
$langdate['ordersubmit'][26]['dutch']='';
$langdate['ordersubmit'][26]['spanish']='';
$langdate['ordersubmit'][27]['english']='Repeat order';
$langdate['ordersubmit'][27]['french']='Renouvellement de commande';
$langdate['ordersubmit'][27]['dutch']='';
$langdate['ordersubmit'][27]['spanish']='';
$langdate['ordersubmit'][28]['english']='Saving option';
$langdate['ordersubmit'][28]['french']='Option économique';
$langdate['ordersubmit'][28]['dutch']='';
$langdate['ordersubmit'][28]['spanish']='';
$langdate['ordersubmit'][29]['english']='Need laser stencil';
$langdate['ordersubmit'][29]['french']='Pochoir';
$langdate['ordersubmit'][29]['dutch']='';
$langdate['ordersubmit'][29]['spanish']='';
$langdate['ordersubmit'][30]['english']='The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill';
$langdate['ordersubmit'][30]['french']='La largeur minimale de la piste ou de l\'entrefer est inférieure à 8 mill ou la taille minimale des trous est inférieure à 18 mill';
$langdate['ordersubmit'][30]['dutch']='';
$langdate['ordersubmit'][30]['spanish']='';
$langdate['ordersubmit'][31]['english']='Have VAT number';
$langdate['ordersubmit'][31]['french']='Numéro de TVA disponible';
$langdate['ordersubmit'][31]['dutch']='';
$langdate['ordersubmit'][31]['spanish']='';
$langdate['ordersubmit'][32]['english']='VAT number';
$langdate['ordersubmit'][32]['french']='Numéro de TVA';
$langdate['ordersubmit'][32]['dutch']='';
$langdate['ordersubmit'][32]['spanish']='';
$langdate['ordersubmit'][33]['english']='Total price';
$langdate['ordersubmit'][33]['french']='Prix total';
$langdate['ordersubmit'][33]['dutch']='';
$langdate['ordersubmit'][33]['spanish']='';
$langdate['ordersubmit'][34]['english']='PCB file upload';
$langdate['ordersubmit'][34]['french']='Télécharger fichier de circuit imprimé';
$langdate['ordersubmit'][34]['dutch']='';
$langdate['ordersubmit'][34]['spanish']='';
$langdate['ordersubmit'][35]['english']='Terms & conditions';
$langdate['ordersubmit'][35]['french']='Conditions Générales de ventes';
$langdate['ordersubmit'][35]['dutch']='';
$langdate['ordersubmit'][35]['spanish']='';
$langdate['ordersubmit'][36]['english']='The above are this PCB job details. If you see any warning messages(in red colour) or you filled any improper information on this order, please click';
$langdate['ordersubmit'][36]['french']='Les détails ci-dessus sont relatifs à votre projet de circuit imprimé. En cas de message d\'erreur (les champs marqués en rouge) ou d\'information erronée, merci de cliquer';
$langdate['ordersubmit'][36]['dutch']='';
$langdate['ordersubmit'][36]['spanish']='';
$langdate['ordersubmit'][37]['english']='to re-submit this PCB job.(Doing this, '.$number.' will be deleted from your shopping cart) Otherwise, please select one of the following two buttons to the next step';
$langdate['ordersubmit'][37]['french']='pour soumettre à nouveau ce projet. (Ce faisant, '.$number.' sera effacé de votre panier) Si tout est en ordre, sélectionnez un des deux boutons pour procéder à l\'étape suivante';
$langdate['ordersubmit'][37]['dutch']='';
$langdate['ordersubmit'][37]['spanish']='';
$langdate['ordersubmit'][38]['english']='here';
$langdate['ordersubmit'][38]['french']='ici';
$langdate['ordersubmit'][38]['dutch']='';
$langdate['ordersubmit'][38]['spanish']='';
$langdate['ordersubmit'][39]['english']='/rescources/images/banner02.jpg';
$langdate['ordersubmit'][39]['french']='/rescources/images/banner02_fr.jpg';
$langdate['ordersubmit'][39]['dutch']='';
$langdate['ordersubmit'][39]['spanish']='';
$langdate['ordersubmit'][40]['english']='/rescources/images/pcborderform_4.png';
$langdate['ordersubmit'][40]['french']='/rescources/images/pcborderform_4_fr.png';
$langdate['ordersubmit'][40]['dutch']='';
$langdate['ordersubmit'][40]['spanish']='';
$langdate['ordersubmit'][41]['english']='Order another PCB job'; 
$langdate['ordersubmit'][41]['french']='Commander un autre circuit imprimé';
$langdate['ordersubmit'][41]['dutch']='';
$langdate['ordersubmit'][41]['spanish']='';
$langdate['ordersubmit'][42]['english']='Checkout'; 
$langdate['ordersubmit'][42]['french']='Valider la commande';
$langdate['ordersubmit'][42]['dutch']='';
$langdate['ordersubmit'][42]['spanish']='';
$langdate['ordersubmit'][43]['english']=''; 
$langdate['ordersubmit'][43]['french']='width:250px;background:url(/rescources/images/submit_bn250.png) no-repeat;';
$langdate['ordersubmit'][43]['dutch']='';
$langdate['ordersubmit'][43]['spanish']='';
$langdate['ordersubmit'][44]['english']='width:250px;background:url(/rescources/images/submit_bn250.png) no-repeat;'; 
$langdate['ordersubmit'][44]['french']='width:349px;background:url(/rescources/images/submit_bn349.png) no-repeat;';
$langdate['ordersubmit'][44]['dutch']='';
$langdate['ordersubmit'][44]['spanish']='';
$langdate['ordersubmit'][45]['english']='HASL (not RoHS)'; 
$langdate['ordersubmit'][45]['french']='SnPb HAL(non RoHS)';
$langdate['ordersubmit'][45]['dutch']='';
$langdate['ordersubmit'][45]['spanish']='';
$langdate['ordersubmit'][46]['english']='HASL (lead free)'; 
$langdate['ordersubmit'][46]['french']='HAL sans plomb';
$langdate['ordersubmit'][46]['dutch']='';
$langdate['ordersubmit'][46]['spanish']='';
$langdate['ordersubmit'][47]['english']='Electrolytic Gold'; 
$langdate['ordersubmit'][47]['french']='Nickel-Or électrolytique';
$langdate['ordersubmit'][47]['dutch']='';
$langdate['ordersubmit'][47]['spanish']='';
$langdate['ordersubmit'][48]['english']='Electroless Nickel/Immersion Gold'; 
$langdate['ordersubmit'][48]['french']='Nickel-Or chimique';
$langdate['ordersubmit'][48]['dutch']='';
$langdate['ordersubmit'][48]['spanish']='';
$langdate['ordersubmit'][49]['english']='0.5oz';
$langdate['ordersubmit'][49]['french']='18&micro;m';
$langdate['ordersubmit'][49]['dutch']='';
$langdate['ordersubmit'][49]['spanish']='';
$langdate['ordersubmit'][50]['english']='1.0oz';
$langdate['ordersubmit'][50]['french']='35&micro;m';
$langdate['ordersubmit'][50]['dutch']='';
$langdate['ordersubmit'][50]['spanish']='';
$langdate['ordersubmit'][51]['english']='2.0oz';
$langdate['ordersubmit'][51]['french']='70&micro;m';
$langdate['ordersubmit'][51]['dutch']='';
$langdate['ordersubmit'][51]['spanish']='';
$langdate['ordersubmit'][52]['english']='working days';
$langdate['ordersubmit'][52]['french']='jours ouvrés';
$langdate['ordersubmit'][52]['dutch']='';
$langdate['ordersubmit'][52]['spanish']='';
$langdate['ordersubmit'][53]['english']='only top'; 
$langdate['ordersubmit'][53]['french']='sur la face avant';
$langdate['ordersubmit'][53]['dutch']='';
$langdate['ordersubmit'][53]['spanish']='';
$langdate['ordersubmit'][54]['english']='only bottom'; 
$langdate['ordersubmit'][54]['french']='sur la face arrière';
$langdate['ordersubmit'][54]['dutch']='';
$langdate['ordersubmit'][54]['spanish']='';
$langdate['ordersubmit'][55]['english']='both top & bottom'; 
$langdate['ordersubmit'][55]['french']='sur les faces avant et arrière';
$langdate['ordersubmit'][55]['dutch']='';
$langdate['ordersubmit'][55]['spanish']='';
$langdate['ordersubmit'][56]['english']='no'; 
$langdate['ordersubmit'][56]['french']='non';
$langdate['ordersubmit'][56]['dutch']='';
$langdate['ordersubmit'][56]['spanish']='';
$langdate['ordersubmit'][57]['english']='yes'; 
$langdate['ordersubmit'][57]['french']='oui';
$langdate['ordersubmit'][57]['dutch']='';
$langdate['ordersubmit'][57]['spanish']='';
$langdate['ordersubmit'][58]['english']='framed stencil'; 
$langdate['ordersubmit'][58]['french']='framed stencil';
$langdate['ordersubmit'][58]['dutch']='';
$langdate['ordersubmit'][58]['spanish']='';
$langdate['ordersubmit'][59]['english']='UL marking'; 
$langdate['ordersubmit'][59]['french']='UL marking';
$langdate['ordersubmit'][59]['dutch']='';
$langdate['ordersubmit'][59]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>3D printing service in the UK, 3D modeling printing, Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="3D printing service,Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="3D printing service, 3D modeling printing,Order PCB from UK printed circuit board manufacturer,offering prototype PCB at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function toCheckout(){
	//if(confirm('Do you confirm to checkout?')){
		location.href = "checkout.php";
	//}
}
function toTakeOrder(isLogin){
	if(isLogin=="yes"){
		location.href = "takeorder.php?isLogin=yes";
	}else{
		location.href = "takeorder.php";
	}
}
function toEEList(){
	location.href = "../ElectronicElement/pcbOrderListFromOrderSubmit.php";
}
</script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['ordersubmit'][39]);?>" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="#" title=""><?php Lang::EchoString2($langdate['ordersubmit'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['ordersubmit'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_box_c">
				<div class="left_nav_title"> <span class="ico_title"> <?php Lang::EchoString2($langdate['ordersubmit'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="#" title="" class="on"><?php Lang::EchoString2($langdate['ordersubmit'][1]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
<img src="/rescources/leftpic/05.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/>
<img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;
<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<div class="lc_title"><img src="<?php Lang::EchoString2($langdate['ordersubmit'][40]);?>" width="710" height="39" alt="" /></div>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					<tr>
						<td colspan="1" style="display:none;"><span class="c_f30 fs14 fw" style="width:40%">
						<?php Lang::EchoString2($langdate['ordersubmit'][2]);?></span>
						</td>
						<td colspan="2" style="width:20%"><span class="c_f30 fs14 fw">
						<?php Lang::EchoString2($langdate['ordersubmit'][3]);?></span>
						</td>
					  </tr>
					   <tr>
						<td width="20%"><?php Lang::EchoString2($langdate['ordersubmit'][4]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $firstName_out; ?></td>
						<td colspan="2"><?php echo $firstName; ?></td>
					  </tr>
					   <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][5]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $surname_out; ?></td>
						<td colspan="2"><?php echo $surname; ?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][6]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $company_out;?></td>
						<td colspan="1"><?php echo $company;?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][7]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $email_out;?></td>
						<td colspan="1"><?php echo $email;?></td>
					  </tr>
					  <tr>
						<td><?php Lang::EchoString2($langdate['ordersubmit'][8]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $telephone_out; ?></td>
						<td colspan="1"><?php echo $telephone; ?></td>
					  </tr>
					  <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][9]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $addressLineOne_out; ?></td>
						<td colspan="1"><?php echo $addressLineOne; ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][10]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $addressLineTwo_out ?></td>
						<td colspan="1"><?php echo $addressLineTwo ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][11]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $cityTown_out ?></td>
						<td colspan="1"><?php echo $cityTown ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][12]);?>:</td>
						<td colspan="1" style="display:none;"> <?php echo $postcode_out ?></td>
						<td colspan="1"> <?php echo $postcode ?></td>
					  </tr>
                      <tr>
					   <td><?php Lang::EchoString2($langdate['ordersubmit'][13]);?>:</td>
						<td colspan="1" style="display:none;"><?php echo $country_out ?></td>
						<td colspan="1"><?php echo $country?></td>
					  </tr>
                      <tr>
					   <td colspan="4"><span class="c_f30 fs14"><span class="fw"><?php Lang::EchoString2($langdate['ordersubmit'][14]);?></span><span class="tu"></span></span></td>
					  </tr>
					   <tr>
					  	 <td>Material:</td>
						 <td colspan="3"><?php echo $materialType; ?></td>
					   </tr>
					   <tr>
					  	 <td>Color:</td>
						 <td colspan="3"><?php echo $color; ?></td>
					   </tr>
					   <tr>
					  	 <td>Quantity:</td>
						 <td colspan="3"><?php echo $_POST['quantity']; ?></td>
					   </tr>
					   <tr>
					  	 <td>Dimension:</td>
						 <td colspan="3"><?php echo $_POST['size']."mm";?></td>
					   </tr>
					   <tr>
					  	 <td>Volume:</td>
						 <td colspan="3"><?php echo $_POST['volume']."mm&sup3;";?></td>
					   </tr>
					   <tr>
					  	 <td>Surface area:</td>
						 <td colspan="3"><?php echo $_POST['area']."mm&sup2;";?></td>
					   </tr>
					   <tr>
					  	 <td>File Name:</td>
						 <td colspan="3"><?php echo $_POST['clientFileName'];?> 
						</td>
					   </tr>
					   <tr>
					  	 <td>Order Number:</td>
						 <td colspan="3"><b><?php echo $orderNumber;?></b>
						</td>
					   </tr>
					   <tr><td ><?php Lang::EchoString2($langdate['ordersubmit'][31]);?>: </td><td colspan="3"> <?php echo $haveVAT; ?><br></td></tr>
					   <tr><td ><?php Lang::EchoString2($langdate['ordersubmit'][32]);?>: </td><td colspan="3"> <?php echo $_POST['VATNumber']; ?><br></td></tr>
					   <tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][33]);?>:</td>
						 <td colspan="3">
							<?php 
								echo $currencyString.round($_POST['total'],2); 
							?>
						</td>
					   </tr>
					   	<tr>
					  	 <td><?php Lang::EchoString2($langdate['ordersubmit'][35]);?>:</td>
						 <td colspan="3">
						 
						 <?php 
							if($_POST['terms']=="on"){
								echo "Agreed";
							} else {
								echo "<font size=\"2\" color=\"FF0033\">Please close this window go back to the previous page to accept terms and conditions. </font>";
							}
						 ?> 
						 </td>
					   </tr>
					</table>
					<p class="mt10 tc">
						<input style="font-size:16px;<?php Lang::EchoString2($langdate['ordersubmit'][43]);?>" type="button" value="<?php Lang::EchoString2($langdate['ordersubmit'][42]);?>" class="submit_bn" onclick="toCheckout();"/>
					</p>
				</div>

		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>