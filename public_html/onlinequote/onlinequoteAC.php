<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/OrderDetail_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
$langdate['onlinequoteAC'][0]['english']='Home';
$langdate['onlinequoteAC'][0]['french']='Accueil';
$langdate['onlinequoteAC'][0]['dutch']='';
$langdate['onlinequoteAC'][0]['spanish']='';
$langdate['onlinequoteAC'][1]['english']='Online quote';
$langdate['onlinequoteAC'][1]['french']='Devis en ligne';
$langdate['onlinequoteAC'][1]['dutch']='';
$langdate['onlinequoteAC'][1]['spanish']='';
$langdate['onlinequoteAC'][2]['english']='Manufacture quote';
$langdate['onlinequoteAC'][2]['french']='Devis de fabrication';
$langdate['onlinequoteAC'][2]['dutch']='';
$langdate['onlinequoteAC'][2]['spanish']='';
$langdate['onlinequoteAC'][3]['english']='Assembly quote';
$langdate['onlinequoteAC'][3]['french']='Devis d\'assemblage';
$langdate['onlinequoteAC'][3]['dutch']='';
$langdate['onlinequoteAC'][3]['spanish']='';
$langdate['onlinequoteAC'][4]['english']='Other PCB specifications or volume production orders';
$langdate['onlinequoteAC'][4]['french']='Commander des circuits imprimé avec d\'autres spécifications ou de larges volumes';
$langdate['onlinequoteAC'][4]['dutch']='';
$langdate['onlinequoteAC'][4]['spanish']='';
$langdate['onlinequoteAC'][5]['english']='PCB Manufacture Quote';
$langdate['onlinequoteAC'][5]['french']='Devis de fabrication';
$langdate['onlinequoteAC'][5]['dutch']='';
$langdate['onlinequoteAC'][5]['spanish']='';
$langdate['onlinequoteAC'][6]['english']='Board layer';
$langdate['onlinequoteAC'][6]['french']='Nombre de Couches';
$langdate['onlinequoteAC'][6]['dutch']='';
$langdate['onlinequoteAC'][6]['spanish']='';
$langdate['onlinequoteAC'][7]['english']='Quantity';
$langdate['onlinequoteAC'][7]['french']='Quantité';
$langdate['onlinequoteAC'][7]['dutch']='';
$langdate['onlinequoteAC'][7]['spanish']='';
$langdate['onlinequoteAC'][8]['english']='Length in mm';
$langdate['onlinequoteAC'][8]['french']='Longueur en mm';
$langdate['onlinequoteAC'][8]['dutch']='';
$langdate['onlinequoteAC'][8]['spanish']='';
$langdate['onlinequoteAC'][9]['english']='Width in mm';
$langdate['onlinequoteAC'][9]['french']='Largeur en mm';
$langdate['onlinequoteAC'][9]['dutch']='';
$langdate['onlinequoteAC'][9]['spanish']='';
$langdate['onlinequoteAC'][10]['english']='Base material';
$langdate['onlinequoteAC'][10]['french']='Support';
$langdate['onlinequoteAC'][10]['dutch']='';
$langdate['onlinequoteAC'][10]['spanish']='';
$langdate['onlinequoteAC'][11]['english']='Thickness in mm';
$langdate['onlinequoteAC'][11]['french']='Épaisseur en mm';
$langdate['onlinequoteAC'][11]['dutch']='';
$langdate['onlinequoteAC'][11]['spanish']='';
$langdate['onlinequoteAC'][12]['english']='Copper weight';
$langdate['onlinequoteAC'][12]['french']='Poids du cuivre';
$langdate['onlinequoteAC'][12]['dutch']='';
$langdate['onlinequoteAC'][12]['spanish']='';
$langdate['onlinequoteAC'][13]['english']='Solder mask';
$langdate['onlinequoteAC'][13]['french']='Vernis épargne';
$langdate['onlinequoteAC'][13]['dutch']='';
$langdate['onlinequoteAC'][13]['spanish']='';
$langdate['onlinequoteAC'][14]['english']='Silk screen';
$langdate['onlinequoteAC'][14]['french']='Sérigraphie';
$langdate['onlinequoteAC'][14]['dutch']='';
$langdate['onlinequoteAC'][14]['spanish']='';
$langdate['onlinequoteAC'][15]['english']='Surface';
$langdate['onlinequoteAC'][15]['french']='Finition';
$langdate['onlinequoteAC'][15]['dutch']='';
$langdate['onlinequoteAC'][15]['spanish']='';
$langdate['onlinequoteAC'][16]['english']='Country';
$langdate['onlinequoteAC'][16]['french']='Pays';
$langdate['onlinequoteAC'][16]['dutch']='';
$langdate['onlinequoteAC'][16]['spanish']='';
$langdate['onlinequoteAC'][17]['english']='Repeat order';
$langdate['onlinequoteAC'][17]['french']='Renouvellement de commande';
$langdate['onlinequoteAC'][17]['dutch']='';
$langdate['onlinequoteAC'][17]['spanish']='';
$langdate['onlinequoteAC'][18]['english']='Saving option';
$langdate['onlinequoteAC'][18]['french']='Option économique';
$langdate['onlinequoteAC'][18]['dutch']='';
$langdate['onlinequoteAC'][18]['spanish']='';
$langdate['onlinequoteAC'][19]['english']='Laser stencil';
$langdate['onlinequoteAC'][19]['french']='Pochoir';
$langdate['onlinequoteAC'][19]['dutch']='';
$langdate['onlinequoteAC'][19]['spanish']='';
$langdate['onlinequoteAC'][20]['english']='The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill';
$langdate['onlinequoteAC'][20]['french']='La largeur minimale de la piste ou de l\'entrefer est inférieure à 8 mill ou la taille minimale des trous est inférieure à 18 mill.';
$langdate['onlinequoteAC'][20]['dutch']='';
$langdate['onlinequoteAC'][20]['spanish']='';
$langdate['onlinequoteAC'][21]['english']='Your PCB job conforms to our';
$langdate['onlinequoteAC'][21]['french']='Votre projet de circuits imprimés est conforme à nos';
$langdate['onlinequoteAC'][21]['dutch']='';
$langdate['onlinequoteAC'][21]['spanish']='';
$langdate['onlinequoteAC'][22]['english']='standard manufacture specification';
$langdate['onlinequoteAC'][22]['french']='normes spécifiques de fabrication';
$langdate['onlinequoteAC'][22]['dutch']='';
$langdate['onlinequoteAC'][22]['spanish']='';
$langdate['onlinequoteAC'][23]['english']='Lead time in Working days';
$langdate['onlinequoteAC'][23]['french']='Délai de livraison en jours ouvrables';
$langdate['onlinequoteAC'][23]['dutch']='';
$langdate['onlinequoteAC'][23]['spanish']='';
$langdate['onlinequoteAC'][24]['english']='Lead time is considered as manufacturing time + shipping time';
$langdate['onlinequoteAC'][24]['french']='Les délais de livraisons comprennent la duré de fabrication + la durée d\'expédition';
$langdate['onlinequoteAC'][24]['dutch']='';
$langdate['onlinequoteAC'][24]['spanish']='';
$langdate['onlinequoteAC'][25]['english']='Shipping cost included in the price. No hidden extra costs';
$langdate['onlinequoteAC'][25]['french']='Le coût de l\'expédition est inclus dans le prix. Pas de frais ultérieurs';
$langdate['onlinequoteAC'][25]['dutch']='';
$langdate['onlinequoteAC'][25]['spanish']='';
$langdate['onlinequoteAC'][26]['english']='E-test costs are included';
$langdate['onlinequoteAC'][26]['french']='Les prix des tests électriques sont compris';
$langdate['onlinequoteAC'][26]['dutch']='';
$langdate['onlinequoteAC'][26]['spanish']='';
$langdate['onlinequoteAC'][27]['english']='Mass Production or Special Requirements';
$langdate['onlinequoteAC'][27]['french']='Production en masse ou exigences particulières';
$langdate['onlinequoteAC'][27]['dutch']='';
$langdate['onlinequoteAC'][27]['spanish']='';
$langdate['onlinequoteAC'][28]['english']='If you need high volume PCBs or have <a href="/doc_archive/std_spec.pdf" class="lh2em c_f60">special requirements</a> such as more than 8 layers, heavy copper, mixed copper, impedance control boards, metal-backed PCB, flexible PCBs or other options, please use <a href="/fastquote/fastPCB_quote.php" class="lh2em c_f60">fast quote</a> form';
$langdate['onlinequoteAC'][28]['french']='Si vous avez besoin de larges volumes de circuits imprimés ou que vous avez des exigences particulières (plus de 8 couches, cuivre lourd, cuivre mixte, cartes de contrôle d\'impédance, circuits imprimés à faces arrières métalliques, circuits flexibles...), utilisez notre formulaire de devis rapide';
$langdate['onlinequoteAC'][28]['dutch']='';
$langdate['onlinequoteAC'][28]['spanish']='';
$langdate['onlinequoteAC'][29]['english']='Prices exclude VAT';
$langdate['onlinequoteAC'][29]['french']='Les prix sont exprimés hors TVA';
$langdate['onlinequoteAC'][29]['dutch']='';
$langdate['onlinequoteAC'][29]['spanish']='';
$langdate['onlinequoteAC'][30]['english']='0.5oz';
$langdate['onlinequoteAC'][30]['french']='18&micro;m';
$langdate['onlinequoteAC'][30]['dutch']='';
$langdate['onlinequoteAC'][30]['spanish']='';
$langdate['onlinequoteAC'][31]['english']='1.0oz';
$langdate['onlinequoteAC'][31]['french']='35&micro;m';
$langdate['onlinequoteAC'][31]['dutch']='';
$langdate['onlinequoteAC'][31]['spanish']='';
$langdate['onlinequoteAC'][32]['english']='2.0oz';
$langdate['onlinequoteAC'][32]['french']='70&micro;m';
$langdate['onlinequoteAC'][32]['dutch']='';
$langdate['onlinequoteAC'][32]['spanish']='';
$langdate['onlinequoteAC'][33]['english']='/rescources/images/banner02.jpg'; 
$langdate['onlinequoteAC'][33]['french']='/rescources/images/banner02_fr.jpg';
$langdate['onlinequoteAC'][33]['dutch']='';
$langdate['onlinequoteAC'][33]['spanish']='';
$langdate['onlinequoteAC'][34]['english']='Calculate'; 
$langdate['onlinequoteAC'][34]['french']='Calculer';
$langdate['onlinequoteAC'][34]['dutch']='';
$langdate['onlinequoteAC'][34]['spanish']='';
$langdate['onlinequoteAC'][35]['english']='HASL (not RoHS)'; 
$langdate['onlinequoteAC'][35]['french']='SnPb HAL(non RoHS)';
$langdate['onlinequoteAC'][35]['dutch']='';
$langdate['onlinequoteAC'][35]['spanish']='';
$langdate['onlinequoteAC'][36]['english']='HASL (lead free)'; 
$langdate['onlinequoteAC'][36]['french']='HAL sans plomb';
$langdate['onlinequoteAC'][36]['dutch']='';
$langdate['onlinequoteAC'][36]['spanish']='';
$langdate['onlinequoteAC'][37]['english']='Electrolytic Gold'; 
$langdate['onlinequoteAC'][37]['french']='Nickel-Or électrolytique';
$langdate['onlinequoteAC'][37]['dutch']='';
$langdate['onlinequoteAC'][37]['spanish']='';
$langdate['onlinequoteAC'][38]['english']='Electroless Nickel/Immersion Gold'; 
$langdate['onlinequoteAC'][38]['french']='Nickel-Or chimique';
$langdate['onlinequoteAC'][38]['dutch']='';
$langdate['onlinequoteAC'][38]['spanish']='';
$langdate['onlinequoteAC'][39]['english']='only top'; 
$langdate['onlinequoteAC'][39]['french']='sur la face avant';
$langdate['onlinequoteAC'][39]['dutch']='';
$langdate['onlinequoteAC'][39]['spanish']='';
$langdate['onlinequoteAC'][40]['english']='only bottom'; 
$langdate['onlinequoteAC'][40]['french']='sur la face arrière';
$langdate['onlinequoteAC'][40]['dutch']='';
$langdate['onlinequoteAC'][40]['spanish']='';
$langdate['onlinequoteAC'][41]['english']='both top & bottom'; 
$langdate['onlinequoteAC'][41]['french']='sur les faces avant et arrière';
$langdate['onlinequoteAC'][41]['dutch']='';
$langdate['onlinequoteAC'][41]['spanish']='';
$langdate['onlinequoteAC'][42]['english']='no'; 
$langdate['onlinequoteAC'][42]['french']='non';
$langdate['onlinequoteAC'][42]['dutch']='';
$langdate['onlinequoteAC'][42]['spanish']='';
$langdate['onlinequoteAC'][43]['english']='yes'; 
$langdate['onlinequoteAC'][43]['french']='oui';
$langdate['onlinequoteAC'][43]['dutch']='';
$langdate['onlinequoteAC'][43]['spanish']='';
$langdate['onlinequoteAC'][44]['english']='Price in'; 
$langdate['onlinequoteAC'][44]['french']='Prix en';
$langdate['onlinequoteAC'][44]['dutch']='';
$langdate['onlinequoteAC'][44]['spanish']='';
$langdate['onlinequoteAC'][45]['english']='Expected delivery date(dd/mm/yyyy)'; 
$langdate['onlinequoteAC'][45]['french']='Date de livraison prévue <br>(Jour/mois/année)';
$langdate['onlinequoteAC'][45]['dutch']='';
$langdate['onlinequoteAC'][45]['spanish']='';
$langdate['onlinequoteAC'][46]['english']='Place order within'; 
$langdate['onlinequoteAC'][46]['french']='Sur Commande dans les';
$langdate['onlinequoteAC'][46]['dutch']='';
$langdate['onlinequoteAC'][46]['spanish']='';
$langdate['onlinequoteAC'][47]['english']='hours'; 
$langdate['onlinequoteAC'][47]['french']='heures et';
$langdate['onlinequoteAC'][47]['dutch']='';
$langdate['onlinequoteAC'][47]['spanish']='';
$langdate['onlinequoteAC'][48]['english']='mins, you\'ll get the PCB no later than'; 
$langdate['onlinequoteAC'][48]['french']='minutes, vous obtiendrez le PCB sur/avant';
$langdate['onlinequoteAC'][48]['dutch']='';
$langdate['onlinequoteAC'][48]['spanish']='';
$langdate['onlinequoteAC'][49]['english']='framed stencil'; 
$langdate['onlinequoteAC'][49]['french']='framed stencil';
$langdate['onlinequoteAC'][49]['dutch']='';
$langdate['onlinequoteAC'][49]['spanish']='';
$langdate['onlinequoteAC'][50]['english']='UL marking'; 
$langdate['onlinequoteAC'][50]['french']='UL marking';
$langdate['onlinequoteAC'][50]['dutch']='';
$langdate['onlinequoteAC'][50]['spanish']='';
$langdate['onlinequoteAC'][51]['english']='Order now';
$langdate['onlinequoteAC'][51]['french']='Passer une commande';
$langdate['onlinequoteAC'][51]['dutch']='';
$langdate['onlinequoteAC'][51]['spanish']='';
$langdate['onlinequoteAC'][52]['english']='1 to 300';
$langdate['onlinequoteAC'][52]['french']='1 à 300';
$langdate['onlinequoteAC'][52]['dutch']='';
$langdate['onlinequoteAC'][52]['spanish']='';
$langdate['onlinequoteAC'][53]['english']='10 to 500mm';
$langdate['onlinequoteAC'][53]['french']='10 à 500mm';
$langdate['onlinequoteAC'][53]['dutch']='';
$langdate['onlinequoteAC'][53]['spanish']='';
$langdate['onlinequoteAC'][54]['english']='10 to 500mm';
$langdate['onlinequoteAC'][54]['french']='10 à 500mm';
$langdate['onlinequoteAC'][54]['dutch']='';
$langdate['onlinequoteAC'][54]['spanish']='';
$langdate['onlinequoteAC'][55]['english']='Laid-back Price';
$langdate['onlinequoteAC'][55]['french']='Laid-back Prix';
$langdate['onlinequoteAC'][55]['dutch']='';
$langdate['onlinequoteAC'][55]['spanish']='';
$langdate['onlinequoteAC'][56]['english']='Follow Us On';
$langdate['onlinequoteAC'][56]['french']='Suivez-Nous Sur';
$langdate['onlinequoteAC'][56]['dutch']='';
$langdate['onlinequoteAC'][56]['spanish']='';
$langdate['onlinequoteAC'][57]['english']='/rescources/images/banner04.jpg'; 
$langdate['onlinequoteAC'][57]['french']='/rescources/images/banner04fr.jpg';
$langdate['onlinequoteAC'][57]['dutch']='';
$langdate['onlinequoteAC'][57]['spanish']='';
$langdate['onlinequoteAC'][58]['english']='/rescources/images/assembly2.jpg'; 
$langdate['onlinequoteAC'][58]['french']='/rescources/images/assembly2.jpg';
$langdate['onlinequoteAC'][58]['dutch']='';
$langdate['onlinequoteAC'][58]['spanish']='';
$langdate['onlinequoteAC'][59]['english']='3D printing quote';
$langdate['onlinequoteAC'][59]['french']='3D printing quote';
$langdate['onlinequoteAC'][59]['dutch']='';
$langdate['onlinequoteAC'][59]['spanish']='';
$langdate['onlinequoteAC'][60]['english']='Solder mask color';
$langdate['onlinequoteAC'][60]['french']='Solder mask color';
$langdate['onlinequoteAC'][60]['dutch']='';
$langdate['onlinequoteAC'][60]['spanish']='';
$langdate['onlinequoteAC'][61]['english']='Green';
$langdate['onlinequoteAC'][61]['french']='Green';
$langdate['onlinequoteAC'][61]['dutch']='';
$langdate['onlinequoteAC'][61]['spanish']='';
$langdate['onlinequoteAC'][62]['english']='Red';
$langdate['onlinequoteAC'][62]['french']='Red';
$langdate['onlinequoteAC'][62]['dutch']='';
$langdate['onlinequoteAC'][62]['spanish']='';
$langdate['onlinequoteAC'][63]['english']='Yellow';
$langdate['onlinequoteAC'][63]['french']='Yellow';
$langdate['onlinequoteAC'][63]['dutch']='';
$langdate['onlinequoteAC'][63]['spanish']='';
$langdate['onlinequoteAC'][64]['english']='Blue';
$langdate['onlinequoteAC'][64]['french']='Blue';
$langdate['onlinequoteAC'][64]['dutch']='';
$langdate['onlinequoteAC'][64]['spanish']='';
$langdate['onlinequoteAC'][65]['english']='White';
$langdate['onlinequoteAC'][65]['french']='White';
$langdate['onlinequoteAC'][65]['dutch']='';
$langdate['onlinequoteAC'][65]['spanish']='';
$langdate['onlinequoteAC'][66]['english']='Black';
$langdate['onlinequoteAC'][66]['french']='Black';
$langdate['onlinequoteAC'][66]['dutch']='';
$langdate['onlinequoteAC'][66]['spanish']='';
$langdate['onlinequoteAC'][67]['english']='None';
$langdate['onlinequoteAC'][67]['french']='None';
$langdate['onlinequoteAC'][67]['dutch']='';
$langdate['onlinequoteAC'][67]['spanish']='';
$langdate['onlinequoteAC'][68]['english']='Need Assembly and components togethere with PCBs';
$langdate['onlinequoteAC'][68]['french']='Need Assembly and components togethere with PCBs';
$langdate['onlinequoteAC'][68]['dutch']='';
$langdate['onlinequoteAC'][68]['spanish']='';
$langdate['onlinequoteAC'][69]['english']='Assembly: get on online quote <a class="c_f30" target="_blank" href="/onlinequote/onlinequote.php">here</a>.<br>
		Components: check our inventory of over 4000 components or send us a bill of materials (BOM) and we will calculate the cost for you. To find out more about the process and what information we will need from you, check our <a href="/FAQ/FAQ.php#PCB_Assembly_001" class="lh2em c_f60">FAQ</a>';
$langdate['onlinequoteAC'][69]['french']='Assembly: get on online quote <a class="c_f30" target="_blank" href="/onlinequote/onlinequote.php">here</a>.<br>
		Components: check our inventory of over 4000 components or send us a bill of materials (BOM) and we will calculate the cost for you. To find out more about the process and what information we will need from you, check our <a href="/FAQ/FAQ.php#PCB_Assembly_001" class="lh2em c_f60">FAQ</a>';
$langdate['onlinequoteAC'][69]['dutch']='';
$langdate['onlinequoteAC'][69]['spanish']='';
$langdate['onlinequoteAC'][70]['english']='Matte Green';
$langdate['onlinequoteAC'][70]['french']='Matte Green';
$langdate['onlinequoteAC'][70]['dutch']='';
$langdate['onlinequoteAC'][70]['spanish']='';
$langdate['onlinequoteAC'][71]['english']='Matte Black';
$langdate['onlinequoteAC'][71]['french']='Matte Black';
$langdate['onlinequoteAC'][71]['dutch']='';
$langdate['onlinequoteAC'][71]['spanish']='';

if(!empty($_SESSION[pcbOnlineCuoteData])){
	$orderDetail = unserialize($_SESSION[pcbOnlineCuoteData]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aluminum PCB,Metal clad PCB UK quote,PCB manufacturing,PCB Assembly,PCB Manufacturer,circuit board manufacturer online quote,UK Printed circuit board Manufacturer,Prototype manufacturer,circuit board fabrication</title>
<meta name="description" content="Aluminum PCB,Metal clad PCB UK quote,PCB Assembly,PCB Manufacturing,circuit board manufacture online quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing,Printed circuit boards manufacturing" />
<meta name="keywords" content="Aluminum PCB,Metal clad PCB UK quote,PCB Assembly,PCB Manufacturing,circuit board manufacturer online Quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing,Printed circuit boards manufacturing" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
.dialogWindowBin2{position:absolute;left:0;top:150px;width:180px;background:#F9F9F9;border:1px #CCC solid;padding:10px;}
input[type=radio]{margin:5px;}
</style>
<script src="../Management/Scripts/order.js?t=<?php echo time(); ?>" type="text/javascript"></script>
<script src="/rescources/js/jquery.min.js" type="text/javascript"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
<script type="text/javascript">
var bannerAD=new Array(); 
var bannerADlink=new Array(); 
var adNum=0; 


bannerAD[0]="/images/pcb1.jpg"; 
bannerADlink[0]="/design/design_quote.php"

bannerAD[1]="/images/pcb2.jpg"; 
bannerADlink[1]="/design/design_quote.php"

bannerAD[1]="/images/pcb3.gif"; 
bannerADlink[1]="/design/design_quote.php"



var preloadedimages=new Array(); 
for (i=1;i<bannerAD.length;i++){ 
preloadedimages[i]=new Image(); 
preloadedimages[i].src=bannerAD[i]; 
} 

function setTransition(){ 
if (document.all){ 
bannerADrotator.filters.revealTrans.Transition=Math.floor(Math.random()*23); 
bannerADrotator.filters.revealTrans.apply(); 
} 
} 

function playTransition(){ 
if (document.all) 
bannerADrotator.filters.revealTrans.play() 
} 

function nextAd(){ 
if(adNum<bannerAD.length-1)adNum++ ; 
else adNum=0; 
setTransition(); 
document.images.bannerADrotator.src=bannerAD[adNum]; 
playTransition(); 
theTimer=setTimeout("nextAd()", 5000); 
} 

function jump2url(){ 
jumpUrl=bannerADlink[adNum]; 
jumpTarget='_blank'; 
if (jumpUrl != ''){ 
if (jumpTarget != '')window.open(jumpUrl,jumpTarget); 
else location.href=jumpUrl; 
} 
} 
function displayStatusMsg() { 
status=bannerADlink[adNum]; 
document.returnValue = true; 
} 
function closeDiv(){
	$("mscroll").style.display = "none";
}

function myOpen(url,height,width){
window.open(url,'','height='+height+', width='+width+', top=100, left=100, location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
}


function window_onload() {
<!--Page.OnLoad-->
}

</script>
<script type="text/javascript">
$(document).ready(function(){
	$(".dialogShow").mouseout(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
	$("#dialogWindowBin").click(function(){$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});});
});
function CloseDialog()
{
	$("#dialogWindowBin").fadeOut(500,function(){$("#dialogWindowBin").html("");});
}
function closeLeftWin()
{
	$("#dialogWindowBin2").fadeOut(1000);
}
function ShowDialog(obj,url)
{
	var oRect=obj.getBoundingClientRect();
	x=oRect.left;
	y=oRect.top;
	x+=20;y+=20+$(document).scrollTop();
	
	$("#dialogWindowBin").css({'left':x,'top':y});
	$("#dialogWindowBin").fadeIn(500,function()
	{
		$("#dialogWindowBin").load(url);
	}
	);
}
function orderNow(){
	location.href='../clients/selectTakeOrderType.php';
}
</script>

</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<div class="dialogWindowBin2" id="dialogWindowBin2" style="display:none"><!-- use inline or none to switch on/off windows --> 
	<a href="https://www.quick-teck.co.uk/News/Content.php?Id=91"><span style="color:#F30;">Chinese New Year Holiday Period Arrangement<br></span></a></br>
	<span style="display:block;float:right;color:#F30;cursor:pointer;" onclick="closeLeftWin();">close</span>
</div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['onlinequoteAC'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['onlinequoteAC'][1]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['onlinequoteAC'][2]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['onlinequoteAC'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/onlinequote/onlinequote.php" title="" class="on"><?php Lang::EchoString2($langdate['onlinequoteAC'][2]);?></a></li>
						<li><a href="/onlinequote/assembly_quoteB.php" title=""><?php Lang::EchoString2($langdate['onlinequoteAC'][3]);?></a></li>
						<li><a href="/3DPrinting/onlineQuote.php" title=""><?php Lang::EchoString2($langdate['onlinequoteAC'][59]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
				<a href="/News/Content.php?Id=45" title="PCB manufacturing quote" target="_blank"><img src="/rescources/images/earlybird01.gif" width="233" height="150" alt="" class="ml10" style="margin-top:10px;"/></a>
				<a href="/onlinequote/assembly_quoteB.php" title="PCB assembly quote" target="_blank"><img src="/rescources/images/assembly_quote.jpg" width="233" height="150" alt="" class="ml10" style="margin-top:10px;"/></a>
					<img src="/rescources/images/01.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<a href="/FAQ/FAQ.php#Shipping_001" title=""><img src="/rescources/images/02.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/contactus/testimonial/index.php" title=""><img src="/rescources/images/03.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/News/Atrcles.php" title=""><img src="/rescources/leftpic/08.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>

					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['onlinequoteAC'][56]);?></span>&nbsp;&nbsp;&nbsp;
					<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
					&nbsp;&nbsp;&nbsp;
					<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form name="calc" id="calc" action="" method="post">
					<p class="c_f60 lh2em"><a class="lh2em c_f60" href="/fastquote/fastPCB_quote.php"><?php Lang::EchoString2($langdate['onlinequoteAC'][4]);?></a>?</p>
					<h3 class="title_main"><?php Lang::EchoString2($langdate['onlinequoteAC'][5]);?></h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					  <tr>
						<td width="168" class="w_168">1. <?php Lang::EchoString2($langdate['onlinequoteAC'][6]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/layer_comment.php');">?</span>]</td>
						<td>
							<input name="layer" type="radio" value="1" checked="checked" onclick="calculate_totalAC('onlineQuote')" />1&nbsp;
							<!--<input name="layer" type="radio" value="2" onclick="calculate_totalAC('onlineQuote')" />2&nbsp;-->
						</td>
					  </tr>
					  <tr>
						<td class="w_168">2. <?php Lang::EchoString2($langdate['onlinequoteAC'][7]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/quantity_comment.php');">?</span>]</td>
						<td><input name="quantity" type="text" onblur="calculate_totalAC('onlineQuote')"  value="<?php echo $orderDetail->Quantity; ?>"/>&nbsp;(<?php Lang::EchoString2($langdate['onlinequoteAC'][52]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">3. <?php Lang::EchoString2($langdate['onlinequoteAC'][8]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/dimension_comment.php');">?</span>]</td>
						<td><input type="text" name="length" onblur="calculate_totalAC('onlineQuote')"  value="<?php echo $orderDetail->Length; ?>"/>&nbsp; (<?php Lang::EchoString2($langdate['onlinequoteAC'][53]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">4. <?php Lang::EchoString2($langdate['onlinequoteAC'][9]);?>:</td>
						<td><input type="text" name="width" onblur="calculate_totalAC('onlineQuote')"  value="<?php echo $orderDetail->Width; ?>"/>&nbsp; (<?php Lang::EchoString2($langdate['onlinequoteAC'][54]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">5. <?php Lang::EchoString2($langdate['onlinequoteAC'][10]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/material_comment.php');">?</span>]</td>
						<td>
							<select name="material" id="material" onchange="changeMaterial('onlineQuote');calculate_totalAC('onlineQuote')">
								<option value="0">FR4 Tg 130 (standard)</option>
								<option value="1">FR4 H Tg 170</option>
								<option value="2" selected="selected">Aluminium based(0.5-0.8W/m.K)</option>
								<option value="3">Aluminium based( ≥1.0W/m.K)</option>
							</select>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">6. <?php Lang::EchoString2($langdate['onlinequoteAC'][11]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/thickness_comment.php');">?</span>]</td>
						<td>
							<input name="thickness" type="radio" value="0.8" onclick="calculate_totalAC('onlineQuote')">0.8&nbsp;&nbsp;
							<input name="thickness" type="radio" value="1.0" onclick="calculate_totalAC('onlineQuote')">1.0&nbsp;&nbsp;
							<input name="thickness" type="radio" checked="checked" value="1.6" onclick="calculate_totalAC('onlineQuote')">1.6&nbsp;&nbsp;
							<input name="thickness" type="radio" value="2.0" onclick="calculate_totalAC('onlineQuote')">2.0&nbsp;&nbsp;
						</td>
					  </tr>
					  <tr>
						<td class="w_168">7. <?php Lang::EchoString2($langdate['onlinequoteAC'][12]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/copper_comment.php');">?</span>]</td>
						<td>
							<input name="weight" type="radio" value="0.5" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][30]);?>
							<input name="weight" type="radio" checked="checked" value="1.0" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][31]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">8. <?php Lang::EchoString2($langdate['onlinequoteAC'][13]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/soldermask_comment.php');">?</span>]</td>
						<td>
							<input name="soldermask" type="radio" value="only top" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][39]);?> 
					        <input name="soldermask" type="radio" value="only bottom" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][40]);?>
							<input name="soldermask" type="radio" checked="checked" value="both sides" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][41]);?>
							<input name="soldermask" type="radio" value="no" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
						</td>
					  </tr>
					<tr>
						<td class="w_168">9. <?php Lang::EchoString2($langdate['onlinequoteAC'][60]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/soldermaskcolor_comment.php');">?</span>]</td>
						<td>
							<input name="soldermaskcolor" type="radio" checked="checked" value="5" onclick="calculate_totalAC('onlineQuote')"><span style="font-size:25px;color:#dddddd">■</span><?php Lang::EchoString2($langdate['onlinequoteAC'][65]);?></li>
							<input name="soldermaskcolor" type="radio" value="6" onclick="calculate_totalAC('onlineQuote')"><span style="font-size:25px;color:black">■</span><?php Lang::EchoString2($langdate['onlinequoteAC'][66]);?></li>
							<input name="soldermaskcolor" type="radio" value="9" onclick="calculate_totalAC('onlineQuote')"><span style="font-size:25px;color:black">■</span><?php Lang::EchoString2($langdate['onlinequoteAC'][71]);?></li>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">10. <?php Lang::EchoString2($langdate['onlinequoteAC'][14]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/silkscreen_comment.php');">?</span>]</td>
						<td>
							<input name="silkscreen" type="radio" checked="checked" value="only top" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][39]);?>
							<input name="silkscreen" type="radio" value="only bottom" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][40]);?>
							<input name="silkscreen" type="radio" value="both sides" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][41]);?>
							<input name="silkscreen" type="radio" value="no" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">11. <?php Lang::EchoString2($langdate['onlinequoteAC'][15]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/surface_comment.php');">?</span>]</td>
						<td>
							<input name="surface" type="radio" checked="checked" value="2" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][36]);?>&nbsp;&nbsp;
							<input name="surface" type="radio" value="4" onclick="calculate_totalAC('onlineQuote')">OSP&nbsp;&nbsp;
						</td>
					  </tr>
					  
					   <tr>
						<td class="w_168">12. <?php Lang::EchoString2($langdate['onlinequoteAC'][50]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/ULmarking.php');">?</span>]</td>
						<td>
							<input name="ULmarking" id="ULmarking" type="radio" value="1" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][43]);?>
							<input name="ULmarking" id="ULmarking" type="radio" checked="checked" value="0" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
						</td>
					  </tr>
					  
					  <tr>
						<td class="w_168">13. <?php Lang::EchoString2($langdate['onlinequoteAC'][16]);?>:</td>
						<td>
							<select name="country" id="country" style="width: 250px" onchange="calculate_totalAC('onlineQuote');">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									echo '<option value="'.$allCountries[$i]->Id.'">'.$allCountries[$i]->ENShortName.'</option>';
								}
								?>
								<option value="999">Other countries</option>
							</select>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">14. <?php Lang::EchoString2($langdate['onlinequoteAC'][17]);?>[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/samedesign_comment.php');">?</span>]</td>
						<td>
							<input name="sameDesign" id="sameDesign" type="radio" value="1" onclick="changeDays('onlineQuote');calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][43]);?>&nbsp;&nbsp;
							<input name="sameDesign" id="sameDesign" type="radio" value="0" checked="checked" onclick="changeDays('onlineQuote');calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">15. <?php Lang::EchoString2($langdate['onlinequoteAC'][18]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/prototype_comment.php');">?</span>]</td>
						<td>
							<input name="prototype" id="prototype" type="radio" value="1" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][43]);?>&nbsp;&nbsp;
							<input name="prototype" id="prototype" type="radio" value="0" checked="checked" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">16. <?php Lang::EchoString2($langdate['onlinequoteAC'][19]);?>[<span class="c_red helper" onmouseover="ShowDialog(this,'/comment/stencil_comment.php');">?</span>]</td>
						<td>
							<input name="needStencil" id="needStencil" type="radio" value="1" onclick="changeStencil('onlineQuote');calculate_totalAC('onlineQuote');"><?php Lang::EchoString2($langdate['onlinequoteAC'][43]);?>&nbsp;&nbsp;
							<input name="needStencil" id="needStencil" type="radio" value="0" checked="checked" onclick="changeStencil('onlineQuote');calculate_totalAC('onlineQuote');"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
							<input name="needStencil" id="needStencil" type="radio" value="2" onclick="changeStencil('onlineQuote');calculate_totalAC('onlineQuote');"><?php Lang::EchoString2($langdate['onlinequoteAC'][49]);?>
							<br/>
							<span id="spanStencilType" style="display:none">
								<input name="stencilType" type="radio" checked="checked" value="1" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][39]);?>&nbsp;&nbsp;
								<input name="stencilType" type="radio" value="2" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][40]);?>&nbsp;&nbsp;
								<input name="stencilType" type="radio" value="3" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][41]);?>
							</span>
						</td>
					  </tr>
					  <tr style="display:none">
							<td >
								17. <?php Lang::EchoString2($langdate['onlinequoteAC'][20]);?>: 
								[<span class="c_red helper dialogShow" onclick="ShowDialog(this,'/comment/tech_comment.php');">?</span>]
							</td>
							<td >
								<input name="tech" id="tech" type="radio" value="1" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][43]);?>&nbsp;&nbsp;
								<input name="tech" id="tech" type="radio" value="0" checked="checked" onclick="calculate_totalAC('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequoteAC'][42]);?>
							</td> 
					  </tr>
					  <tr>
						<td colspan="2">17.&nbsp;<input type="checkbox" name="cbRule" id="cbRule" checked="checked"/>&nbsp;<?php Lang::EchoString2($langdate['onlinequoteAC'][21]);?> <a href="/doc_archive/std_spec.pdf" title="" class="c_f30"><?php Lang::EchoString2($langdate['onlinequoteAC'][22]);?>.</a></td>
					  </tr>
					</table>
					<p class="mt10 tc">
						<input type="button" value="<?php Lang::EchoString2($langdate['onlinequoteAC'][34]);?>" class="submit_bn" name="Button1" onclick="calculate_totalAC('onlineQuote');"/>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="<?php Lang::EchoString2($langdate['onlinequoteAC'][51]);?>" class="submit_bn" name="Button2"  <?php $language = Common::GetLanguage(); if($language != "english"){echo 'style="width:200px;background: url(/rescources/images/submit_bn180.png) no-repeat;"';} ?>  onclick="calculate_totalAC('onlineQuote');orderNow();"/>
					</p>
						
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10 tab1"  >
		 			 <tr>
								<td width="178" align="center"><?php Lang::EchoString2($langdate['onlinequoteAC'][23]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/leadtime_comment.php');">?</span>]</td>
								<td width="64" align="center"><span style="font-weight:bold;">9</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">8</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">7</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">6</span></td>
					            <td width="120" align="center"><span style="font-weight:bold;"><?php Lang::EchoString2($langdate['onlinequoteAC'][55]);?></span><br>[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/laidback_comment.php');">?</span>]</td>
					  </tr>
					  <tr>
							<td width="204">
								<span id="show_t1" name="show_t1" style="display:block;text-align:center;"><?php Lang::EchoString2($langdate['onlinequoteAC'][45]);?></span>
								<span id="show_t" name="show_t" style="display:none"><?php Lang::EchoString2($langdate['onlinequoteAC'][46]);?> 
									<span id="t_hour" name="t_hour" style="font-weight:bold;" >&nbsp;</span> <?php Lang::EchoString2($langdate['onlinequoteAC'][47]);?>
									<span id="t_minute" name="t_minute" style="font-weight:bold;" >&nbsp;</span> <?php Lang::EchoString2($langdate['onlinequoteAC'][48]);?>:
									[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/expected_date_comment.php');">?</span>]
								</span>
							</td>
						    <td align="center"><span class="c_red" id="day9" name="day9" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day8" name="day8" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day7" name="day7" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day6" name="day6" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day16" name="day16" >&nbsp;</span></td>
						</tr>
							<tr>
								<td width="204">
								<select name="currency" style="width: 67px; height: 22px; display:none">
									<option value="GBP" selected="selected">GBP</option>
									<option value="EUR">EUR</option>
								</select>
								<span id="spanCurrency0" style="display:block;text-align:center;font-size:16px;"><?php Lang::EchoString2($langdate['onlinequoteAC'][44]);?> <span style="color:red">GBP(&pound;)</span></span>
								<span id="spanCurrency1" style="display:none;text-align:center;font-size:16px;"><?php Lang::EchoString2($langdate['onlinequoteAC'][44]);?> <span style="color:red">GBP(&pound;)</span></span>
								<span id="spanCurrency2" style="display:none;text-align:center;font-size:16px;"><?php Lang::EchoString2($langdate['onlinequoteAC'][44]);?> <span style="color:red">EUR(&euro;)</span></span>
								</td>
							    <td align="center"><span class="c_red" id="total9" name="total9" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total8" name="total8" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total7" name="total7" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total6" name="total6" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total16" name="total16" style="font-weight:bold;">&nbsp;</span></td>
							</tr>
					</table>

			<div class="main_box clearbox mt10">
				<img src="/rescources/images/stencil.png" width="42" height="57" alt="" class="nr_m10 fl" />
				<div class="right_box1 fr lh2em">
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequoteAC'][24]);?>. <br/>
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequoteAC'][25]);?>.  <br/>
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequoteAC'][26]);?>.<br/>
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequoteAC'][29]);?>.
				</div>
				<div class="clear"></div>
			</div>

			<div class="main_box clearbox mt10">
				<img src="/rescources/images/round.png" width="42" height="55" alt="" class="nr_m10 fl" />
				<div class="right_box1 fr lh2em">
					<p class="c_f30"><?php Lang::EchoString2($langdate['onlinequoteAC'][27]);?></p>
					<p><?php Lang::EchoString2($langdate['onlinequoteAC'][28]);?>. </p>
					<p class="c_f30"><?php Lang::EchoString2($langdate['onlinequoteAC'][68]);?></p>
					<p><?php Lang::EchoString2($langdate['onlinequoteAC'][69]);?>. </p>
				</div>
				<div class="clear"></div>
			</div>
						
				</div>

			</form>
		</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>

<?php
if(!empty($_SESSION[pcbOnlineCuoteData])){
	echo "<script>changeDays('onlineQuote');changeStencil('onlineQuote');</script>";
	//unset($_SESSION[pcbOnlineCuoteData]);
}
?>