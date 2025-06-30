<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/OrderDetail_Class.php");
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
$langdate['onlinequote'][0]['english']='Home';
$langdate['onlinequote'][0]['french']='Accueil';
$langdate['onlinequote'][0]['dutch']='';
$langdate['onlinequote'][0]['spanish']='';
$langdate['onlinequote'][1]['english']='Online quote';
$langdate['onlinequote'][1]['french']='Devis en ligne';
$langdate['onlinequote'][1]['dutch']='';
$langdate['onlinequote'][1]['spanish']='';
$langdate['onlinequote'][2]['english']='Manufacture quote';
$langdate['onlinequote'][2]['french']='Devis de fabrication';
$langdate['onlinequote'][2]['dutch']='';
$langdate['onlinequote'][2]['spanish']='';
$langdate['onlinequote'][3]['english']='Assembly quote';
$langdate['onlinequote'][3]['french']='Devis d\'assemblage';
$langdate['onlinequote'][3]['dutch']='';
$langdate['onlinequote'][3]['spanish']='';
$langdate['onlinequote'][4]['english']='Other PCB specifications or volume production orders';
$langdate['onlinequote'][4]['french']='Commander des circuits imprimé avec d\'autres spécifications ou de larges volumes';
$langdate['onlinequote'][4]['dutch']='';
$langdate['onlinequote'][4]['spanish']='';
$langdate['onlinequote'][5]['english']='PCB Manufacture Quote';
$langdate['onlinequote'][5]['french']='Devis de fabrication';
$langdate['onlinequote'][5]['dutch']='';
$langdate['onlinequote'][5]['spanish']='';
$langdate['onlinequote'][6]['english']='Board layer';
$langdate['onlinequote'][6]['french']='Nombre de Couches';
$langdate['onlinequote'][6]['dutch']='';
$langdate['onlinequote'][6]['spanish']='';
$langdate['onlinequote'][7]['english']='Quantity';
$langdate['onlinequote'][7]['french']='Quantité';
$langdate['onlinequote'][7]['dutch']='';
$langdate['onlinequote'][7]['spanish']='';
$langdate['onlinequote'][8]['english']='Length in mm';
$langdate['onlinequote'][8]['french']='Longueur en mm';
$langdate['onlinequote'][8]['dutch']='';
$langdate['onlinequote'][8]['spanish']='';
$langdate['onlinequote'][9]['english']='Width in mm';
$langdate['onlinequote'][9]['french']='Largeur en mm';
$langdate['onlinequote'][9]['dutch']='';
$langdate['onlinequote'][9]['spanish']='';
$langdate['onlinequote'][10]['english']='Base material';
$langdate['onlinequote'][10]['french']='Support';
$langdate['onlinequote'][10]['dutch']='';
$langdate['onlinequote'][10]['spanish']='';
$langdate['onlinequote'][11]['english']='Thickness in mm';
$langdate['onlinequote'][11]['french']='Épaisseur en mm';
$langdate['onlinequote'][11]['dutch']='';
$langdate['onlinequote'][11]['spanish']='';
$langdate['onlinequote'][12]['english']='Copper weight';
$langdate['onlinequote'][12]['french']='Poids du cuivre';
$langdate['onlinequote'][12]['dutch']='';
$langdate['onlinequote'][12]['spanish']='';
$langdate['onlinequote'][13]['english']='Solder mask';
$langdate['onlinequote'][13]['french']='Vernis épargne';
$langdate['onlinequote'][13]['dutch']='';
$langdate['onlinequote'][13]['spanish']='';
$langdate['onlinequote'][14]['english']='Silk screen';
$langdate['onlinequote'][14]['french']='Sérigraphie';
$langdate['onlinequote'][14]['dutch']='';
$langdate['onlinequote'][14]['spanish']='';
$langdate['onlinequote'][15]['english']='Surface';
$langdate['onlinequote'][15]['french']='Finition';
$langdate['onlinequote'][15]['dutch']='';
$langdate['onlinequote'][15]['spanish']='';
$langdate['onlinequote'][16]['english']='Country';
$langdate['onlinequote'][16]['french']='Pays';
$langdate['onlinequote'][16]['dutch']='';
$langdate['onlinequote'][16]['spanish']='';
$langdate['onlinequote'][17]['english']='Repeat order';
$langdate['onlinequote'][17]['french']='Renouvellement de commande';
$langdate['onlinequote'][17]['dutch']='';
$langdate['onlinequote'][17]['spanish']='';
$langdate['onlinequote'][18]['english']='Saving option';
$langdate['onlinequote'][18]['french']='Option économique';
$langdate['onlinequote'][18]['dutch']='';
$langdate['onlinequote'][18]['spanish']='';
$langdate['onlinequote'][19]['english']='Laser stencil';
$langdate['onlinequote'][19]['french']='Pochoir';
$langdate['onlinequote'][19]['dutch']='';
$langdate['onlinequote'][19]['spanish']='';
$langdate['onlinequote'][20]['english']='The minimum track width/gap is smaller than 8 mill or the minimum hole size is smaller than 18mill';
$langdate['onlinequote'][20]['french']='La largeur minimale de la piste ou de l\'entrefer est inférieure à 8 mill ou la taille minimale des trous est inférieure à 18 mill.';
$langdate['onlinequote'][20]['dutch']='';
$langdate['onlinequote'][20]['spanish']='';
$langdate['onlinequote'][21]['english']='Your PCB job conforms to our';
$langdate['onlinequote'][21]['french']='Votre projet de circuits imprimés est conforme à nos';
$langdate['onlinequote'][21]['dutch']='';
$langdate['onlinequote'][21]['spanish']='';
$langdate['onlinequote'][22]['english']='standard manufacture specification';
$langdate['onlinequote'][22]['french']='normes spécifiques de fabrication';
$langdate['onlinequote'][22]['dutch']='';
$langdate['onlinequote'][22]['spanish']='';
$langdate['onlinequote'][23]['english']='Lead time in Working days';
$langdate['onlinequote'][23]['french']='Délai de livraison en jours ouvrables';
$langdate['onlinequote'][23]['dutch']='';
$langdate['onlinequote'][23]['spanish']='';
$langdate['onlinequote'][24]['english']='Lead time is considered as manufacturing time + shipping time';
$langdate['onlinequote'][24]['french']='Les délais de livraisons comprennent la duré de fabrication + la durée d\'expédition';
$langdate['onlinequote'][24]['dutch']='';
$langdate['onlinequote'][24]['spanish']='';
$langdate['onlinequote'][25]['english']='Shipping cost included in the price. No hidden extra costs';
$langdate['onlinequote'][25]['french']='Le coût de l\'expédition est inclus dans le prix. Pas de frais ultérieurs';
$langdate['onlinequote'][25]['dutch']='';
$langdate['onlinequote'][25]['spanish']='';
$langdate['onlinequote'][26]['english']='E-test costs are included';
$langdate['onlinequote'][26]['french']='Les prix des tests électriques sont compris';
$langdate['onlinequote'][26]['dutch']='';
$langdate['onlinequote'][26]['spanish']='';
$langdate['onlinequote'][27]['english']='Mass Production or Special Requirements';
$langdate['onlinequote'][27]['french']='Production en masse ou exigences particulières';
$langdate['onlinequote'][27]['dutch']='';
$langdate['onlinequote'][27]['spanish']='';
$langdate['onlinequote'][28]['english']='If you need high volume PCBs or have <a href="/doc_archive/std_spec.pdf" class="lh2em c_f60">special requirements</a> such as more than 8 layers, heavy copper, mixed copper, impedance control boards, metal-backed PCB, flexible PCBs or other options, please use <a href="/fastquote/fastPCB_quote.php" class="lh2em c_f60">fast quote</a> form';
$langdate['onlinequote'][28]['french']='Si vous avez besoin de larges volumes de circuits imprimés ou que vous avez des exigences particulières (plus de 8 couches, cuivre lourd, cuivre mixte, cartes de contrôle d\'impédance, circuits imprimés à faces arrières métalliques, circuits flexibles...), utilisez notre formulaire de devis rapide';
$langdate['onlinequote'][28]['dutch']='';
$langdate['onlinequote'][28]['spanish']='';
$langdate['onlinequote'][29]['english']='Prices exclude VAT';
$langdate['onlinequote'][29]['french']='Les prix sont exprimés hors TVA';
$langdate['onlinequote'][29]['dutch']='';
$langdate['onlinequote'][29]['spanish']='';
$langdate['onlinequote'][30]['english']='0.5oz';
$langdate['onlinequote'][30]['french']='18&micro;m';
$langdate['onlinequote'][30]['dutch']='';
$langdate['onlinequote'][30]['spanish']='';
$langdate['onlinequote'][31]['english']='1.0oz';
$langdate['onlinequote'][31]['french']='35&micro;m';
$langdate['onlinequote'][31]['dutch']='';
$langdate['onlinequote'][31]['spanish']='';
$langdate['onlinequote'][32]['english']='2.0oz';
$langdate['onlinequote'][32]['french']='70&micro;m';
$langdate['onlinequote'][32]['dutch']='';
$langdate['onlinequote'][32]['spanish']='';
$langdate['onlinequote'][33]['english']='/rescources/images/banner02.jpg'; 
$langdate['onlinequote'][33]['french']='/rescources/images/banner02_fr.jpg';
$langdate['onlinequote'][33]['dutch']='';
$langdate['onlinequote'][33]['spanish']='';
$langdate['onlinequote'][34]['english']='Calculate'; 
$langdate['onlinequote'][34]['french']='Calculer';
$langdate['onlinequote'][34]['dutch']='';
$langdate['onlinequote'][34]['spanish']='';
$langdate['onlinequote'][35]['english']='HASL (not RoHS)'; 
$langdate['onlinequote'][35]['french']='SnPb HAL(non RoHS)';
$langdate['onlinequote'][35]['dutch']='';
$langdate['onlinequote'][35]['spanish']='';
$langdate['onlinequote'][36]['english']='HASL (lead free)'; 
$langdate['onlinequote'][36]['french']='HAL sans plomb';
$langdate['onlinequote'][36]['dutch']='';
$langdate['onlinequote'][36]['spanish']='';
$langdate['onlinequote'][37]['english']='Electrolytic Gold'; 
$langdate['onlinequote'][37]['french']='Nickel-Or électrolytique';
$langdate['onlinequote'][37]['dutch']='';
$langdate['onlinequote'][37]['spanish']='';
$langdate['onlinequote'][38]['english']='Electroless Nickel/Immersion Gold'; 
$langdate['onlinequote'][38]['french']='Nickel-Or chimique';
$langdate['onlinequote'][38]['dutch']='';
$langdate['onlinequote'][38]['spanish']='';
$langdate['onlinequote'][39]['english']='only top'; 
$langdate['onlinequote'][39]['french']='sur la face avant';
$langdate['onlinequote'][39]['dutch']='';
$langdate['onlinequote'][39]['spanish']='';
$langdate['onlinequote'][40]['english']='only bottom'; 
$langdate['onlinequote'][40]['french']='sur la face arrière';
$langdate['onlinequote'][40]['dutch']='';
$langdate['onlinequote'][40]['spanish']='';
$langdate['onlinequote'][41]['english']='both top & bottom'; 
$langdate['onlinequote'][41]['french']='sur les faces avant et arrière';
$langdate['onlinequote'][41]['dutch']='';
$langdate['onlinequote'][41]['spanish']='';
$langdate['onlinequote'][42]['english']='no'; 
$langdate['onlinequote'][42]['french']='non';
$langdate['onlinequote'][42]['dutch']='';
$langdate['onlinequote'][42]['spanish']='';
$langdate['onlinequote'][43]['english']='yes'; 
$langdate['onlinequote'][43]['french']='oui';
$langdate['onlinequote'][43]['dutch']='';
$langdate['onlinequote'][43]['spanish']='';
$langdate['onlinequote'][44]['english']='Price in'; 
$langdate['onlinequote'][44]['french']='Prix en';
$langdate['onlinequote'][44]['dutch']='';
$langdate['onlinequote'][44]['spanish']='';
$langdate['onlinequote'][45]['english']='Expected delivery date(dd/mm/yyyy)'; 
$langdate['onlinequote'][45]['french']='Date de livraison prévue <br>(Jour/mois/année)';
$langdate['onlinequote'][45]['dutch']='';
$langdate['onlinequote'][45]['spanish']='';
$langdate['onlinequote'][46]['english']='Place order within'; 
$langdate['onlinequote'][46]['french']='Sur Commande dans les';
$langdate['onlinequote'][46]['dutch']='';
$langdate['onlinequote'][46]['spanish']='';
$langdate['onlinequote'][47]['english']='hours'; 
$langdate['onlinequote'][47]['french']='heures et';
$langdate['onlinequote'][47]['dutch']='';
$langdate['onlinequote'][47]['spanish']='';
$langdate['onlinequote'][48]['english']='mins, you\'ll get the PCB no later than'; 
$langdate['onlinequote'][48]['french']='minutes, vous obtiendrez le PCB sur/avant';
$langdate['onlinequote'][48]['dutch']='';
$langdate['onlinequote'][48]['spanish']='';
$langdate['onlinequote'][49]['english']='framed stencil'; 
$langdate['onlinequote'][49]['french']='framed stencil';
$langdate['onlinequote'][49]['dutch']='';
$langdate['onlinequote'][49]['spanish']='';
$langdate['onlinequote'][50]['english']='UL marking'; 
$langdate['onlinequote'][50]['french']='UL marking';
$langdate['onlinequote'][50]['dutch']='';
$langdate['onlinequote'][50]['spanish']='';
$langdate['onlinequote'][51]['english']='Order now';
$langdate['onlinequote'][51]['french']='Passer une commande';
$langdate['onlinequote'][51]['dutch']='';
$langdate['onlinequote'][51]['spanish']='';
$langdate['onlinequote'][52]['english']='1 to 300';
$langdate['onlinequote'][52]['french']='1 à 300';
$langdate['onlinequote'][52]['dutch']='';
$langdate['onlinequote'][52]['spanish']='';
$langdate['onlinequote'][53]['english']='10 to 500mm';
$langdate['onlinequote'][53]['french']='10 à 500mm';
$langdate['onlinequote'][53]['dutch']='';
$langdate['onlinequote'][53]['spanish']='';
$langdate['onlinequote'][54]['english']='10 to 500mm';
$langdate['onlinequote'][54]['french']='10 à 500mm';
$langdate['onlinequote'][54]['dutch']='';
$langdate['onlinequote'][54]['spanish']='';
$langdate['onlinequote'][55]['english']='Laid-back Price';
$langdate['onlinequote'][55]['french']='Laid-back Prix';
$langdate['onlinequote'][55]['dutch']='';
$langdate['onlinequote'][55]['spanish']='';
$langdate['onlinequote'][57]['english']='/rescources/images/banner04.jpg'; 
$langdate['onlinequote'][57]['french']='/rescources/images/banner04fr.jpg';
$langdate['onlinequote'][57]['dutch']='';
$langdate['onlinequote'][57]['spanish']='';
$langdate['onlinequote'][58]['english']='/rescources/images/assembly2.jpg'; 
$langdate['onlinequote'][58]['french']='/rescources/images/assembly2.jpg';
$langdate['onlinequote'][58]['dutch']='';
$langdate['onlinequote'][58]['spanish']='';
$langdate['onlinequote'][59]['english']='3D printing quote';
$langdate['onlinequote'][59]['french']='3D printing quote';
$langdate['onlinequote'][59]['dutch']='';
$langdate['onlinequote'][59]['spanish']='';
$langdate['onlinequote'][60]['english']='Solder mask color';
$langdate['onlinequote'][60]['french']='Solder mask color';
$langdate['onlinequote'][60]['dutch']='';
$langdate['onlinequote'][60]['spanish']='';
$langdate['onlinequote'][61]['english']='Green';
$langdate['onlinequote'][61]['french']='Green';
$langdate['onlinequote'][61]['dutch']='';
$langdate['onlinequote'][61]['spanish']='';
$langdate['onlinequote'][62]['english']='Red';
$langdate['onlinequote'][62]['french']='Red';
$langdate['onlinequote'][62]['dutch']='';
$langdate['onlinequote'][62]['spanish']='';
$langdate['onlinequote'][63]['english']='Yellow';
$langdate['onlinequote'][63]['french']='Yellow';
$langdate['onlinequote'][63]['dutch']='';
$langdate['onlinequote'][63]['spanish']='';
$langdate['onlinequote'][64]['english']='Blue';
$langdate['onlinequote'][64]['french']='Blue';
$langdate['onlinequote'][64]['dutch']='';
$langdate['onlinequote'][64]['spanish']='';
$langdate['onlinequote'][65]['english']='White';
$langdate['onlinequote'][65]['french']='White';
$langdate['onlinequote'][65]['dutch']='';
$langdate['onlinequote'][65]['spanish']='';
$langdate['onlinequote'][66]['english']='Black';
$langdate['onlinequote'][66]['french']='Black';
$langdate['onlinequote'][66]['dutch']='';
$langdate['onlinequote'][66]['spanish']='';
$langdate['onlinequote'][67]['english']='None';
$langdate['onlinequote'][67]['french']='None';
$langdate['onlinequote'][67]['dutch']='';
$langdate['onlinequote'][67]['spanish']='';
$langdate['onlinequote'][68]['english']='Need Assembly and components togethere with PCBs';
$langdate['onlinequote'][68]['french']='Need Assembly and components togethere with PCBs';
$langdate['onlinequote'][68]['dutch']='';
$langdate['onlinequote'][68]['spanish']='';
$langdate['onlinequote'][69]['english']='Assembly: get on online quote <a class="c_f30" target="_blank" href="/onlinequote/onlinequote.php">here</a>.<br>
Components: check our inventory of over 4000 components or send us a bill of materials (BOM) and we will calculate the cost for you. To find out more about the process and what information we will need from you, check our <a href="/FAQ/FAQ.php#PCB_Assembly_001" class="lh2em c_f60">FAQ</a>';
$langdate['onlinequote'][69]['french']='Assembly: get on online quote <a class="c_f30" target="_blank" href="/onlinequote/onlinequote.php">here</a>.<br>
Components: check our inventory of over 4000 components or send us a bill of materials (BOM) and we will calculate the cost for you. To find out more about the process and what information we will need from you, check our <a href="/FAQ/FAQ.php#PCB_Assembly_001" class="lh2em c_f60">FAQ</a>';
$langdate['onlinequote'][69]['dutch']='';
$langdate['onlinequote'][69]['spanish']='';
$langdate['onlinequote'][70]['english']='Matte Green';
$langdate['onlinequote'][70]['french']='Matte Green';
$langdate['onlinequote'][70]['dutch']='';
$langdate['onlinequote'][70]['spanish']='';
$langdate['onlinequote'][71]['english']='Matte Black';
$langdate['onlinequote'][71]['french']='Matte Black';
$langdate['onlinequote'][71]['dutch']='';
$langdate['onlinequote'][71]['spanish']='';

if(!empty($_SESSION[pcbOnlineCuoteData])){
	$orderDetail = unserialize($_SESSION[pcbOnlineCuoteData]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UK PCB manufacturing,low cost PCB Manufacturer online quote UK,circuit board manufacturer online quote,UK Printed circuit board Manufacturer,Prototype manufacturer,circuit board fabrication</title>
<meta name="description" content="UK PCB manufacturing,Low cost PCB Manufacturer UK,circuit board manufacturer online quote,circuit board manufacturer,UK Printed circuit board Prototype quote online,manufacturing metal core PCB,multi-layers Printed circuit boards manufacturing." />
<meta name="keywords" content="Low cost PCB manufacturing,UK PCB Manufacturer online quote,circuit board manufacturer online Quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing,multi-layers Printed circuit boards manufacturing." />
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
	<a href="/News/Content.php?Id=105">
    <img src="/images/info.png" align="middle">
      <p></p>
    <span style="color:#F30;"><br />5 day guaranteed lead time option is available!</span></a></br>
	<span style="display:block;float:right;color:#F30;cursor:pointer;" onclick="closeLeftWin();">close</span>
 </div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['onlinequote'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['onlinequote'][1]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['onlinequote'][2]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['onlinequote'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/onlinequote/onlinequote.php" title="" class="on"><?php Lang::EchoString2($langdate['onlinequote'][2]);?></a></li>
						<li><a href="/onlinequote/assembly_quoteB.php" title=""><?php Lang::EchoString2($langdate['onlinequote'][3]);?></a></li>
						<li><a href="/3DPrinting/onlineQuote.php" title=""><?php Lang::EchoString2($langdate['onlinequote'][59]);?></a></li>
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

				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				<form name="calc" id="calc" action="" method="post">
					<p class="c_f60 lh2em"><a class="lh2em c_f60" href="/fastquote/fastPCB_quote.php"><?php Lang::EchoString2($langdate['onlinequote'][4]);?></a>?</p>
					<h3 class="title_main"><?php Lang::EchoString2($langdate['onlinequote'][5]);?></h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					  <tr>
						<td width="168" class="w_168">1. <?php Lang::EchoString2($langdate['onlinequote'][6]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/layer_comment.php');">?</span>]</td>
						<td>
							<input name="layer" type="radio" value="1" onclick="changeLayer('onlineQuote');calculate_total('onlineQuote')" />1&nbsp;
							<input name="layer" type="radio" value="2" checked="checked" onclick="changeLayer('onlineQuote');calculate_total('onlineQuote')" />2&nbsp;
							<input name="layer" type="radio" value="4" onclick="changeLayer('onlineQuote');calculate_total('onlineQuote')" />4&nbsp;
							<input name="layer" type="radio" value="6" onclick="changeLayer('onlineQuote');calculate_total('onlineQuote')" />6&nbsp;
							<input name="layer" type="radio" value="8" onclick="changeLayer('onlineQuote');calculate_total('onlineQuote')" />8&nbsp;
						</td>
					  </tr>
					  <tr>
						<td class="w_168">2. <?php Lang::EchoString2($langdate['onlinequote'][7]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/quantity_comment.php');">?</span>]</td>
						<td><input name="quantity" type="text" onblur="calculate_total('onlineQuote')"  value="<?php echo $orderDetail->Quantity; ?>"/>&nbsp;(<?php Lang::EchoString2($langdate['onlinequote'][52]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">3. <?php Lang::EchoString2($langdate['onlinequote'][8]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/dimension_comment.php');">?</span>]</td>
						<td><input type="text" name="length" onblur="calculate_total('onlineQuote')"  value="<?php echo $orderDetail->Length; ?>"/>&nbsp; (<?php Lang::EchoString2($langdate['onlinequote'][53]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">4. <?php Lang::EchoString2($langdate['onlinequote'][9]);?>:</td>
						<td><input type="text" name="width" onblur="calculate_total('onlineQuote')"  value="<?php echo $orderDetail->Width; ?>"/>&nbsp; (<?php Lang::EchoString2($langdate['onlinequote'][54]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">5. <?php Lang::EchoString2($langdate['onlinequote'][10]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/material_comment.php');">?</span>]</td>
						<td>
							<select name="material" id="material" onchange="changeMaterial('onlineQuote');calculate_total('onlineQuote')">
								<option value="0" selected="selected">FR4 Tg 130 (standard)</option>
								<option value="1">FR4 H Tg 170</option>
								<option value="2">Aluminium based(0.5-0.8W/m.K)</option>
								<option value="3">Aluminium based( ≥1.0W/m.K)</option>
							</select>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">6. <?php Lang::EchoString2($langdate['onlinequote'][11]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/thickness_comment.php');">?</span>]</td>
						<td>
							<input name="thickness" type="radio" value="0.4" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">0.4&nbsp;&nbsp;
							<input name="thickness" type="radio" value="0.6" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">0.6&nbsp;&nbsp;
							<input name="thickness" type="radio" value="0.8" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">0.8&nbsp;&nbsp;
							<input name="thickness" type="radio" value="1.0" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">1.0&nbsp;&nbsp;
							<input name="thickness" type="radio" checked="checked" value="1.6" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">1.6&nbsp;&nbsp;
							<input name="thickness" type="radio" value="2.0" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">2.0&nbsp;&nbsp;
							<input name="thickness" type="radio" value="2.4" onclick="changeThickness('onlineQuote');calculate_total('onlineQuote')">2.4
						</td>
					  </tr>
					  <tr>
						<td class="w_168">7. <?php Lang::EchoString2($langdate['onlinequote'][12]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/copper_comment.php');">?</span>]</td>
						<td>
							<input name="weight" type="radio" value="0.5" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][30]);?>
							<input name="weight" type="radio" checked="checked" value="1.0" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][31]);?>
							<input name="weight" type="radio" value="2.0" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][32]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">8. <?php Lang::EchoString2($langdate['onlinequote'][13]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/soldermask_comment.php');">?</span>]</td>
						<td>
							<input name="soldermask" type="radio" value="only top" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][39]);?> 
					        <input name="soldermask" type="radio" value="only bottom" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][40]);?>
							<input name="soldermask" type="radio" checked="checked" value="both sides" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][41]);?>
							<input name="soldermask" type="radio" value="no" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
						</td>
					  </tr>
					<tr>
						<td class="w_168">9. <?php Lang::EchoString2($langdate['onlinequote'][60]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/soldermaskcolor_comment.php');">?</span>]</td>
						<td>
							<input name="soldermaskcolor" type="radio" checked="checked" value="1" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:green">■</span><?php Lang::EchoString2($langdate['onlinequote'][61]);?></li>
					        <input name="soldermaskcolor" type="radio" value="2" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:red">■</span><?php Lang::EchoString2($langdate['onlinequote'][62]);?></li>
							<input name="soldermaskcolor" type="radio" value="3" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:yellow">■</span><?php Lang::EchoString2($langdate['onlinequote'][63]);?></li>
							<input name="soldermaskcolor" type="radio" value="4" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:blue">■</span><?php Lang::EchoString2($langdate['onlinequote'][64]);?></li>
							<input name="soldermaskcolor" type="radio" value="5" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:#dddddd">■</span><?php Lang::EchoString2($langdate['onlinequote'][65]);?></li>
							<input name="soldermaskcolor" type="radio" value="6" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:black">■</span><?php Lang::EchoString2($langdate['onlinequote'][66]);?></li><br/>
							<input name="soldermaskcolor" type="radio" value="8" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:green">■</span><?php Lang::EchoString2($langdate['onlinequote'][70]);?></li>
							<input name="soldermaskcolor" type="radio" value="9" onclick="calculate_total('onlineQuote')"><span style="font-size:25px;color:black">■</span><?php Lang::EchoString2($langdate['onlinequote'][71]);?></li>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">10. <?php Lang::EchoString2($langdate['onlinequote'][14]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/silkscreen_comment.php');">?</span>]</td>
						<td>
							<input name="silkscreen" type="radio" checked="checked" value="only top" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][39]);?>
							<input name="silkscreen" type="radio" value="only bottom" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][40]);?>
							<input name="silkscreen" type="radio" value="both sides" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][41]);?>
							<input name="silkscreen" type="radio" value="no" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">11. <?php Lang::EchoString2($langdate['onlinequote'][15]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/surface_comment.php');">?</span>]</td>
						<td>
							<input name="surface" type="radio" value="1" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][35]);?>&nbsp;&nbsp;				<input name="surface" type="radio" checked="checked" value="2" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][36]);?> &nbsp;&nbsp;
							<input name="surface" type="radio" value="3" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][37]);?><br>					<input name="surface" type="radio" value="4" onclick="calculate_total('onlineQuote')">OSP&nbsp;&nbsp;
							<input name="surface" type="radio" value="5" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][38]);?>&nbsp;
						</td>
					  </tr>
					  
					   <tr>
						<td class="w_168">12. <?php Lang::EchoString2($langdate['onlinequote'][50]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/ULmarking.php');">?</span>]</td>
						<td>
							<input name="ULmarking" id="ULmarking" type="radio" value="1" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][43]);?>
							<input name="ULmarking" id="ULmarking" type="radio" checked="checked" value="0" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
						</td>
					  </tr>
					  
					  <tr>
						<td class="w_168">13. <?php Lang::EchoString2($langdate['onlinequote'][16]);?>:</td>
						<td>
							<!--<select name="country" id="country" style="width: 155px" onchange="changeCountry('onlineQuote');calculate_total('onlineQuote');">
								<option value="1" selected="selected">UK</option>
								<option value="2">France</option>
								<option value="3">Ireland</option>
								<option value="4">Germany</option>
								<option value="5">Belgium</option>
								<option value="6">Denmark</option>
								<option value="7">Netherlands</option>
								<option value="8">Spain</option>
								<option value="9">Italy</option>
								<option value="11">Other countries</option>
							</select>-->
							<select name="country" id="country" style="width: 250px" onchange="changeCountry('onlineQuote');calculate_total('onlineQuote');">
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
						<td class="w_168">14. <?php Lang::EchoString2($langdate['onlinequote'][17]);?>[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/samedesign_comment.php');">?</span>]</td>
						<td>
							<input name="sameDesign" id="sameDesign" type="radio" value="1" onclick="changeDays('onlineQuote');calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][43]);?>&nbsp;&nbsp;
							<input name="sameDesign" id="sameDesign" type="radio" value="0" checked="checked" onclick="changeDays('onlineQuote');calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">15. <?php Lang::EchoString2($langdate['onlinequote'][18]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/prototype_comment.php');">?</span>]</td>
						<td>
							<input name="prototype" id="prototype" type="radio" value="1" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][43]);?>&nbsp;&nbsp;
							<input name="prototype" id="prototype" type="radio" value="0" checked="checked" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
						</td>
					  </tr>
					  <tr>
						<td class="w_168">16. <?php Lang::EchoString2($langdate['onlinequote'][19]);?>[<span class="c_red helper" onmouseover="ShowDialog(this,'/comment/stencil_comment.php');">?</span>]</td>
						<td>
							<input name="needStencil" id="needStencil" type="radio" value="1" onclick="changeStencil('onlineQuote');calculate_total('onlineQuote');"><?php Lang::EchoString2($langdate['onlinequote'][43]);?>&nbsp;&nbsp;
							<input name="needStencil" id="needStencil" type="radio" value="0" checked="checked" onclick="changeStencil('onlineQuote');calculate_total('onlineQuote');"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
							<input name="needStencil" id="needStencil" type="radio" value="2" onclick="changeStencil('onlineQuote');calculate_total('onlineQuote');"><?php Lang::EchoString2($langdate['onlinequote'][49]);?>
							<br/>
							<span id="spanStencilType" style="display:none">
								<input name="stencilType" type="radio" checked="checked" value="1" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][39]);?>&nbsp;&nbsp;
								<input name="stencilType" type="radio" value="2" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][40]);?>&nbsp;&nbsp;
								<input name="stencilType" type="radio" value="3" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][41]);?>
							</span>
						</td>
					  </tr>
					  <tr style="display:none">
							<td >
								17. <?php Lang::EchoString2($langdate['onlinequote'][20]);?>: 
								[<span class="c_red helper dialogShow" onclick="ShowDialog(this,'/comment/tech_comment.php');">?</span>]
							</td>
							<td >
								<input name="tech" id="tech" type="radio" value="1" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][43]);?>&nbsp;&nbsp;
								<input name="tech" id="tech" type="radio" value="0" checked="checked" onclick="calculate_total('onlineQuote')"><?php Lang::EchoString2($langdate['onlinequote'][42]);?>
							</td> 
					  </tr>
					  <tr>
						<td colspan="2">17.&nbsp;<input type="checkbox" name="cbRule" id="cbRule" checked="checked"/>&nbsp;<?php Lang::EchoString2($langdate['onlinequote'][21]);?> <a href="/doc_archive/std_spec.pdf" title="" class="c_f30"><?php Lang::EchoString2($langdate['onlinequote'][22]);?>.</a></td>
					  </tr>
					</table>
					<p class="mt10 tc">
						<input type="button" value="<?php Lang::EchoString2($langdate['onlinequote'][34]);?>" class="submit_bn" name="Button1" onclick="calculate_total('onlineQuote');"/>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="<?php Lang::EchoString2($langdate['onlinequote'][51]);?>" class="submit_bn" name="Button2"  <?php $language = Common::GetLanguage(); if($language != "english"){echo 'style="width:200px;background: url(/rescources/images/submit_bn180.png) no-repeat;"';} ?>  onclick="calculate_total('onlineQuote');orderNow();"/>
					</p>
						
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10 tab1"  >
		 			 <tr>
								<td width="178" align="center"><?php Lang::EchoString2($langdate['onlinequote'][23]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/leadtime_comment.php');">?</span>]</td>
								<td width="64" align="center"><span style="font-weight:bold;">9</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">8</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">7</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">6</span></td>
					            <td width="64" align="center"><span style="font-weight:bold;">5</span></td>
					            <td width="120" align="center"><span style="font-weight:bold;"><?php Lang::EchoString2($langdate['onlinequote'][55]);?></span><br>[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/laidback_comment.php');">?</span>]</td>
					  </tr>
					  <tr>
							<td width="204">
								<span id="show_t1" name="show_t1" style="display:block;text-align:center;"><?php Lang::EchoString2($langdate['onlinequote'][45]);?></span>
								<span id="show_t" name="show_t" style="display:none"><?php Lang::EchoString2($langdate['onlinequote'][46]);?> 
									<span id="t_hour" name="t_hour" style="font-weight:bold;" >&nbsp;</span> <?php Lang::EchoString2($langdate['onlinequote'][47]);?>
									<span id="t_minute" name="t_minute" style="font-weight:bold;" >&nbsp;</span> <?php Lang::EchoString2($langdate['onlinequote'][48]);?>:
									[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/expected_date_comment.php');">?</span>]
								</span>
							</td>
						    <td align="center"><span class="c_red" id="day9" name="day9" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day8" name="day8" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day7" name="day7" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day6" name="day6" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day5" name="day5" >&nbsp;</span></td>
						    <td align="center"><span class="c_red" id="day16" name="day16" >&nbsp;</span></td>
						</tr>
							<tr>
								<td width="204">
								<select name="currency" style="width: 67px; height: 22px; display:none">
									<option value="GBP" selected="selected">GBP</option>
									<option value="EUR">EUR</option>
								</select>
								<span id="spanCurrency0" style="display:block;text-align:center;font-size:16px;"><?php Lang::EchoString2($langdate['onlinequote'][44]);?> <span style="color:red">GBP(&pound;)</span></span>
								<span id="spanCurrency1" style="display:none;text-align:center;font-size:16px;"><?php Lang::EchoString2($langdate['onlinequote'][44]);?> <span style="color:red">GBP(&pound;)</span></span>
								<span id="spanCurrency2" style="display:none;text-align:center;font-size:16px;"><?php Lang::EchoString2($langdate['onlinequote'][44]);?> <span style="color:red">EUR(&euro;)</span></span>
								</td>
							    <td align="center"><span class="c_red" id="total9" name="total9" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total8" name="total8" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total7" name="total7" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total6" name="total6" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total5" name="total5" style="font-weight:bold;">&nbsp;</span></td>
							    <td align="center"><span class="c_red" id="total16" name="total16" style="font-weight:bold;">&nbsp;</span></td>
							</tr>
					</table>

			<div class="main_box clearbox mt10">
				<img src="/rescources/images/stencil.png" width="42" height="57" alt="" class="nr_m10 fl" />
				<div class="right_box1 fr lh2em">
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][24]);?>. <br/>
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][25]);?>.  <br/>
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][26]);?>.<br/>
					<span class="c_f30">*</span><?php Lang::EchoString2($langdate['onlinequote'][29]);?>.
				</div>
				<div class="clear"></div>
			</div>

			<div class="main_box clearbox mt10">
				<img src="/rescources/images/round.png" width="42" height="55" alt="" class="nr_m10 fl" />
				<div class="right_box1 fr lh2em">
					<p class="c_f30"><?php Lang::EchoString2($langdate['onlinequote'][27]);?></p>
					<p><?php Lang::EchoString2($langdate['onlinequote'][28]);?>. </p>
					<p class="c_f30"><?php Lang::EchoString2($langdate['onlinequote'][68]);?></p>
					<p><?php Lang::EchoString2($langdate['onlinequote'][69]);?>. </p>
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
	echo "<script>changeLayer('onlineQuote');changeThickness('onlineQuote');changeDays('onlineQuote');changeStencil('onlineQuote');</script>";
	//unset($_SESSION[pcbOnlineCuoteData]);
}
?>