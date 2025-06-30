<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");
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
$langdate['onlinequote'][28]['english']='If you need high volume PCBs or have <a target="_blank" href="/doc_archive/std_spec.pdf" class="lh2em c_f60">special requirements</a> such as more than 8 layers, heavy copper, mixed copper, impedance control boards, metal-backed PCB, flexible PCBs or other options, please use <a target="_blank" href="/fastquote/fastPCB_quote.php" class="lh2em c_f60">fast quote</a> form';
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
$langdate['onlinequote'][56]['english']='Follow Us On';
$langdate['onlinequote'][56]['french']='Suivez-Nous Sur';
$langdate['onlinequote'][56]['dutch']='';
$langdate['onlinequote'][56]['spanish']='';
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Assembly, PCB Manufacturing,circuit board manufacture online quote,UK Printed circuit board Manufacturer,Prototype manufacturer,circuit board fabrication</title>
<meta name="description" content="PCB Assembly, PCB Manufacturing,circuit board manufacture online quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing,Europe multi-layers Printed circuit boards manufacturing." />
<meta name="keywords" content="PCB Assembly,PCB Manufacturing,circuit board manufacturer online Quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing,Europe multi-layers Printed circuit boards manufacturing." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
.dialogWindowBin2{position:absolute;left:0;top:150px;width:180px;background:#F9F9F9;border:1px #CCC solid;padding:10px;}
input[type=radio]{margin:5px;}
.tab_switch{
    width: 100%;
    background-color:#EEE0E5;
    height: 34px;
    line-height: 34px;
    font-size: 16px;
    text-align: center;
    font-weight: normal;
    margin-top: 10px;
    border-bottom: 2px solid #ff8c00;
}
.title_tab{width: 350px;display: inline-block;cursor: pointer;height: 34px;line-height: 34px;padding: 0 0;margin: 0 0;float:right;}
.default{float:left;}
#calcUK,#calcCN{
    padding: 10px 9px;
    background-color: #fff;
    border-left:1px solid #ff8c00;
    border-right:1px solid #ff8c00;
    border-bottom:1px solid #ff8c00;
}
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

function openWindow(url,height,width){
    var top = (window.screen.availHeight-30-height)/2; //获得窗口的垂直位置;
    var left = (window.screen.availWidth-10-width)/2; //获得窗口的水平位置;
    window.open(url,'','height='+height+', width='+width+', top='+top+', left='+left+', location=no, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no');
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

// function iFrameHeight(id) {   
//     var ifm= document.getElementById(id);   
//     var subWeb = document.frames ? document.frames[id].document : ifm.contentDocument; 
//     if(ifm != null && subWeb != null) {
//        ifm.height = subWeb.body.scrollHeight;
//        ifm.width = subWeb.body.scrollWidth;
//     }   
// } 
</script>
<script type="text/javascript">
$(function(){
    $('.title_tab').each(function(){
        $(this).css({
            'background-color' : "#EEE0E5",
            'color'      : "#454545"
        });
        $($(this).attr('href')).hide();
    });
    $('.default').css({
        'background-color': '#ff8c00',
        'color'      : "#fff"
    });
    $($('.default').attr('href')).show();
    $('.title_tab').click(function(){
        $($(this).attr('href')).show();
        $('.title_tab').each(function(){
            $(this).css({
                'background-color' : "#EEE0E5",
                'color'      : "#454545"
            });
            $($(this).attr('href')).hide();
        });
        $($(this).attr('href')).show();
        $(this).css({
            'background-color': '#ff8c00',
            'color'      : "#fff"
        });
    });
});
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<!--<div class="dialogWindowBin2" id="dialogWindowBin2">
	<a href="http://www.quick-teck.co.uk/News/Content.php?Id=74"><span style="color:#F30;">Chinese 2015 National Holiday Period Arrangement<br><br></br></span></a></br>
	<span style="display:block;float:right;color:#F30;cursor:pointer;" onclick="closeLeftWin();">close</span>
</div>-->
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

				<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['onlinequote'][56]);?></span>&nbsp;&nbsp;&nbsp;
				<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>
				&nbsp;&nbsp;&nbsp;
				<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
			</div>
		</div>
	    <div class="left_box_b"></div>	
	</div>

	<div class="w710 fr mt10">
        <p class="title_main"><?php Lang::EchoString2($langdate['onlinequote'][5]);?></p>
        <div class="main_box clearbox mt10">
            <img src="/rescources/images/img_b.gif" width="45" height="45" alt="" class="nr_m10 fl" />
            <div class="right_box1 fr lh2em">
                <p><img alt="" src="../rescources/images/orderNow_03.gif" />  It is recommended that customers from non-EU countries to use ‘Despatched from China’ service. Customers in the UK and other EU countries, please choose your proper services according to your project requirements. More details about the difference can be found <a href="/onlinequote/service_difference.php" target="_blank" class="c_f60">here</a>.</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="tab_switch">
            <div class="title_tab default" href="#calcUK">Despatched from UK</div>
            <div class="title_tab" href="#calcCN">Despatched from China</div>
        </div>

        <iframe src="onlinequoteUK.php"  marginheight="0" marginwidth="0" frameborder="0" scrolling="no" name="calcUK" id="calcUK" style="width:690px;height:985px;"></iframe>
        <iframe src="onlinequoteCN.php"  marginheight="0" marginwidth="0" frameborder="0" scrolling="no" name="calcCN" id="calcCN" style="width:690px;height:1180px;"></iframe>	
    </div>
    <div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>