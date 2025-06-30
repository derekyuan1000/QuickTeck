<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
$langdate['assembly'][0]['english']='Home';
$langdate['assembly'][0]['french']='Accueil';
$langdate['assembly'][0]['dutch']='';
$langdate['assembly'][0]['spanish']='';
$langdate['assembly'][1]['english']='Online quote';
$langdate['assembly'][1]['french']='Devis en ligne';
$langdate['assembly'][1]['dutch']='';
$langdate['assembly'][1]['spanish']='';
$langdate['assembly'][2]['english']='Assembly quote';
$langdate['assembly'][2]['french']='Devis d\'assemblage';
$langdate['assembly'][2]['dutch']='';
$langdate['assembly'][2]['spanish']='';
$langdate['assembly'][3]['english']='Manufacture quote';
$langdate['assembly'][3]['french']='Devis de fabrication';
$langdate['assembly'][3]['dutch']='';
$langdate['assembly'][3]['spanish']='';
$langdate['assembly'][4]['english']='PCB Assembly Quote';
$langdate['assembly'][4]['french']='Devis d\'assemblage de circuit imprimé';
$langdate['assembly'][4]['dutch']='';
$langdate['assembly'][4]['spanish']='';
$langdate['assembly'][5]['english']='Board Quantity';
$langdate['assembly'][5]['french']='Nombre de cartes';
$langdate['assembly'][5]['dutch']='';
$langdate['assembly'][5]['spanish']='';
$langdate['assembly'][6]['english']='PCB length in mm';
$langdate['assembly'][6]['french']='Longueur du circuit imprimé en mm';
$langdate['assembly'][6]['dutch']='';
$langdate['assembly'][6]['spanish']='';
$langdate['assembly'][7]['english']='PCB width in mm';
$langdate['assembly'][7]['french']='Largeur du circuit imprimé en mm';
$langdate['assembly'][7]['dutch']='';
$langdate['assembly'][7]['spanish']='';
$langdate['assembly'][8]['english']='BOM line numbers';
$langdate['assembly'][8]['french']='Nombre de lignes dans la nomenclature';
$langdate['assembly'][8]['dutch']='';
$langdate['assembly'][8]['spanish']='';
$langdate['assembly'][9]['english']='SMT Components qty';
$langdate['assembly'][9]['french']='Quantité de composants SMT';
$langdate['assembly'][9]['dutch']='';
$langdate['assembly'][9]['spanish']='';
$langdate['assembly'][10]['english']='Double side SMT';
$langdate['assembly'][10]['french']='SMT double-face';
$langdate['assembly'][10]['dutch']='';
$langdate['assembly'][10]['spanish']='';
$langdate['assembly'][11]['english']='PTH Components qty';
$langdate['assembly'][11]['french']='Quantité de composants enfichables';
$langdate['assembly'][11]['dutch']='';
$langdate['assembly'][11]['spanish']='';
$langdate['assembly'][12]['english']='Service Type';
$langdate['assembly'][12]['french']='Service Type';
$langdate['assembly'][12]['dutch']='';
$langdate['assembly'][12]['spanish']='';
$langdate['assembly'][13]['english']='Lead time in Working days';
$langdate['assembly'][13]['french']='Délai de livraison en jours ouvrables';
$langdate['assembly'][13]['dutch']='';
$langdate['assembly'][13]['spanish']='';
$langdate['assembly'][14]['english']='Price in';
$langdate['assembly'][14]['french']='Prix en';
$langdate['assembly'][14]['dutch']='';
$langdate['assembly'][14]['spanish']='';
$langdate['assembly'][15]['english']='Calculate';
$langdate['assembly'][15]['french']='Calculer';
$langdate['assembly'][15]['dutch']='';
$langdate['assembly'][15]['spanish']='';
$langdate['assembly'][16]['english']='/rescources/images/banner02.jpg'; 
$langdate['assembly'][16]['french']='/rescources/images/banner02_fr.jpg';
$langdate['assembly'][16]['dutch']='';
$langdate['assembly'][16]['spanish']='';
$langdate['assembly'][17]['english']='1 to 100'; 
$langdate['assembly'][17]['french']='1 à 100';
$langdate['assembly'][17]['dutch']='';
$langdate['assembly'][17]['spanish']='';
$langdate['assembly'][18]['english']='10 to 500mm'; 
$langdate['assembly'][18]['french']='10 à 500mm';
$langdate['assembly'][18]['dutch']='';
$langdate['assembly'][18]['spanish']='';
$langdate['assembly'][19]['english']='10 to 500mm'; 
$langdate['assembly'][19]['french']='10 à 500mm';
$langdate['assembly'][19]['dutch']='';
$langdate['assembly'][19]['spanish']='';
$langdate['assembly'][20]['english']='1 to 200'; 
$langdate['assembly'][20]['french']='1 à 200';
$langdate['assembly'][20]['dutch']='';
$langdate['assembly'][20]['spanish']='';
$langdate['assembly'][21]['english']='0 to 500'; 
$langdate['assembly'][21]['french']='0 à 500';
$langdate['assembly'][21]['dutch']='';
$langdate['assembly'][21]['spanish']='';
$langdate['assembly'][22]['english']='0 to 500'; 
$langdate['assembly'][22]['french']='0 à 500';
$langdate['assembly'][22]['dutch']='';
$langdate['assembly'][22]['spanish']='';
$langdate['assembly'][23]['english']='yes'; 
$langdate['assembly'][23]['french']='oui';
$langdate['assembly'][23]['dutch']='';
$langdate['assembly'][23]['spanish']='';
$langdate['assembly'][24]['english']='no'; 
$langdate['assembly'][24]['french']='non';
$langdate['assembly'][24]['dutch']='';
$langdate['assembly'][24]['spanish']='';
$langdate['assembly'][25]['english']='If possible, we strongly suggest using our in stock components for your products. This is the most cost-effectively and quickest way to run the assembly service. Quick-teck keeps over 4000 electronics components in stock. These carefully selected parts are most common used in our Far East factory. The average price for these components is just one third of Europe suppliers.'; 
$langdate['assembly'][25]['french']='Si possible, nous vous recommandons fortement d’utiliser nos composants en stock pour vos produits. C’est le moyen le plus économique et le plus rapide pour démarrer le service de montage. Quick-Teck maintient près de 4000 composants électroniques en stock. Ces pièces sont soigneusement sélectionnés parmi le plus couramment utilisées dans notre usine d’Extrême-Orient. Le prix moyen de ces composants représente seulement un tiers de celui des fournisseurs européens.';
$langdate['assembly'][25]['dutch']='';
$langdate['assembly'][25]['spanish']='';
$langdate['assembly'][26]['english']='To check our in stock components, please click <a class="c_f30" target="_blank" href="http://www.quick-teck.co.uk/ElectronicElement/eeList.php?typeId=6">here.</a>'; 
$langdate['assembly'][26]['french']='Pour vérifier nos composants en stock, cliquez <a class="c_f30" target="_blank" href="http://www.quick-teck.co.uk/ElectronicElement/eeList.php?typeId=6">ICI.</a>';
$langdate['assembly'][26]['dutch']='';
$langdate['assembly'][26]['spanish']='';
$langdate['assembly'][27]['english']='The standard PCB manufacturing + assembly lead time is 4 weeks. Unlike PCB manufacturing service, Quick-teck don’t guarantee the delivery date for manufacturing+assembly service. Last year, the average lead time for this service is 19 working days. Customer can track the PCB manufacturing + assembly job status online. More details about the online tracking service for assembly order can be found <a class="c_f30" target="_blank" href="/assembly/Assembly_job_tracking_samples.pdf">here</a>.'; 
$langdate['assembly'][27]['french']='Le delai standard pour la fabrication de PCB + assemblage est
de 4 semaines. Contrairement au service de fabrication de PCB, Quick-teck ne
garantit pas la date de livraison pour le service de fabrication + assemblage. L\'année
dernière, le délai moyen de ce service était de 19 jours ouvrables. Le client peut suivre
la fabrication des PCB + l\'avancée des travaux de montage en ligne. Plus de détails
sur le service de suivi en ligne des commandes d\'assemblage peuvent être trouvés <a class="c_f30" target="_blank" href="/assembly/Assembly_job_tracking_samples.pdf">ICI</a>.';
$langdate['assembly'][27]['dutch']='';
$langdate['assembly'][27]['spanish']='';
$langdate['assembly'][28]['english']='Lead time'; 
$langdate['assembly'][28]['french']='Lead time';
$langdate['assembly'][28]['dutch']='';
$langdate['assembly'][28]['spanish']='';
$langdate['assembly'][29]['english']='Component sourcing'; 
$langdate['assembly'][29]['french']='Sourcing des composants';
$langdate['assembly'][29]['dutch']='';
$langdate['assembly'][29]['spanish']='';
$langdate['assembly'][31]['english']='Need PCBs too'; 
$langdate['assembly'][31]['french']='Need PCBs too';
$langdate['assembly'][31]['dutch']='';
$langdate['assembly'][31]['spanish']='';
$langdate['assembly'][32]['english']='Get on online quote for PCB manufacturing <a class="c_f30" target="_blank" href="/onlinequote/onlinequote.php">here</a>. To find out more about the manufacturing and assembly process, check <a class="c_f30" target="_blank" href="/orderprocess/order_flow.jpg">here</a> please.'; 
$langdate['assembly'][32]['french']='Get on online quote for PCB manufacturing <a class="c_f30" target="_blank" href="/onlinequote/onlinequote.php">here</a>. To find out more about the manufacturing and assembly process, check <a class="c_f30" target="_blank" href="/orderprocess/order_flow.jpg">here</a> please.';
$langdate['assembly'][32]['dutch']='';
$langdate['assembly'][32]['spanish']='';
$langdate['assembly'][33]['english']='Lead time in Working days';
$langdate['assembly'][33]['french']='Délai de livraison en jours ouvrables';
$langdate['assembly'][33]['dutch']='';
$langdate['assembly'][33]['spanish']='';
$langdate['assembly'][34]['english']='Express UK assembly'; 
$langdate['assembly'][34]['french']='Express UK assembly';
$langdate['assembly'][34]['dutch']='';
$langdate['assembly'][34]['spanish']='';
$langdate['assembly'][35]['english']='Standard assembly'; 
$langdate['assembly'][35]['french']='Standard assembly';
$langdate['assembly'][35]['dutch']='';
$langdate['assembly'][35]['spanish']='';
$langdate['assembly'][36]['english']='Although our China-based Assembly factory keep providing the service as normal, in the UK we provide a fast turnaround, low volume PCB circuit assembly service where we assemble your order and despatch in up to 3 days after receipt of PCB\'s and components. More details can be found <a class="c_f30" target="_blank" href="https://www.quick-teck.co.uk/News/Content.php?Id=111">here</a>.'; 
$langdate['assembly'][36]['french']='Although our China-based Assembly factory keep providing the service as normal, in the UK we provide a fast turnaround, low volume PCB circuit assembly service where we assemble your order and despatch in up to 3 days after receipt of PCB\'s and components. More details can be found <a class="c_f30" target="_blank" href="https://www.quick-teck.co.uk/News/Content.php?Id=111">here</a>.';
$langdate['assembly'][36]['dutch']='';
$langdate['assembly'][36]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Assembly,Manufacturering,Online Quote PCB manufacture,UK Printed circuit board Manufacturer,Prototype manufacturer assembly</title>
<meta name="description" content="PCB assembly,SMD assembly,Manufacturering,Online Quote circuit board assembly,printed circuit board manufacturer,UK PCB Prototype Fabrication manufacture,surface mount PCB assembly,manufacturing,PCB assembly, circuit board prototype assembly." />
<meta name="keywords" content="PCB Assembly,Manufacturer,Online Quote PCB manufacturing Assembly,pcb manufacture,UK PCB Prototype Manufacturer,pcbs,PCB Prototype Fabrication, Fabrication,SMD assembly,surface mount PCB assembly,3D printing,3D Printing online quote" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/styles/nyroModal.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;}
input[type=radio]{margin:5px;}
</style>
<script src="../Management/Scripts/order.js?t=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.nyroModal.custom.js"></script> 
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
<!--[if IE 6]> 
<script type="text/javascript" src="js/jquery.nyroModal-ie6.js"></script> 
<![endif]--> 
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
$(function() { 
$('.nyroModal').nyroModal(); 
}); 
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
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['assembly'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['assembly'][1]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['assembly'][2]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['assembly'][1]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/onlinequote/onlinequote.php" title="" ><?php Lang::EchoString2($langdate['assembly'][3]);?></a></li>
						<li><a href="/onlinequote/assembly_quoteB.php" title="" class="on"><?php Lang::EchoString2($langdate['assembly'][2]);?></a></li>
						
					</ul>
				</div>
				<div class="mt10">
					<a href="/contactus/testimonial/index.php" title=""><img src="/rescources/images/03.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
				<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
				<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
				 <form name="calc" id="calc" >
					<h3 class="title_main"><?php Lang::EchoString2($langdate['assembly'][4]);?></h3>
					<div class="online_from mt10">
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					  <tr>
						<td width="168" class="w_168"> 1. <?php Lang::EchoString2($langdate['assembly'][5]);?>:</td>
						<td><input name="quantity" type="text" width="74px" />&nbsp;(<?php Lang::EchoString2($langdate['assembly'][17]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">2. <?php Lang::EchoString2($langdate['assembly'][6]);?>:</td>
						<td><input type="text" name="length" width="100px" />&nbsp; (<?php Lang::EchoString2($langdate['assembly'][18]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">3. <?php Lang::EchoString2($langdate['assembly'][7]);?>:</td>
						<td><input type="text" name="width" width="100px" />&nbsp; (<?php Lang::EchoString2($langdate['assembly'][19]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">4. <?php Lang::EchoString2($langdate['assembly'][8]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/BOMline_comment.php');">?</span>]</td>
						<td><input type="text" name="line" width="100px" />&nbsp; (<?php Lang::EchoString2($langdate['assembly'][20]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">5. <?php Lang::EchoString2($langdate['assembly'][9]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/SMTcomponent_comment.php');">?</span>]</td>
						<td><input type="text" name="smtQty" width="100px" />&nbsp; (<?php Lang::EchoString2($langdate['assembly'][21]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">6.<?php Lang::EchoString2($langdate['assembly'][10]);?>:</td>
						<td>
							<input name="doubleSmt" id="doubleSmt" type="radio" value="1" onclick="calculate_assemblyB('onlineQuote')"><?php Lang::EchoString2($langdate['assembly'][23]);?>
							<input name="doubleSmt" id="doubleSmt" type="radio" value="0" checked="checked" onclick="calculate_assemblyB('onlineQuote')"><?php Lang::EchoString2($langdate['assembly'][24]);?></td>
					  </tr>
					  <tr>
						<td class="w_168">7. <?php Lang::EchoString2($langdate['assembly'][11]);?>:</td>
						<td><input type="text" name="pthQty" width="100px"> &nbsp; (<?php Lang::EchoString2($langdate['assembly'][22]);?>)</td>
					  </tr>
					  <tr>
						<td class="w_168">8. <?php Lang::EchoString2($langdate['assembly'][12]);?>: [<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/BOMline_comment.php');">?</span>]</td>
						<td>
							<input name="leadFree" id="leadFree" type="radio" value="1" onclick="calculate_assemblyB('onlineQuote')"><?php Lang::EchoString2($langdate['assembly'][34]);?>
							<input name="leadFree" id="leadFree" type="radio" value="0" checked="checked" onclick="calculate_assemblyB('onlineQuote')"><?php Lang::EchoString2($langdate['assembly'][35]);?></td>
					  </tr>
					</table>
					<p class="mt10 tc">
					<input name="Button1" onclick="calculate_assemblyB('onlineQuote')" type="button" value="<?php Lang::EchoString2($langdate['assembly'][15]);?>" class="submit_bn" /></p>
						
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10 tab1"  >
							<!--<tr>
								<td width="168" class="w_168"> <?php Lang::EchoString2($langdate['assembly'][13]);?>:[<span class="c_red helper" onmouseover="ShowDialog(this,'/comment/Assemblyleadtime_comment.php');">?</span>] </td>
								<td><span id="leadtime" name="leadtime" class="c_f30" style="font-weight:bold;margin-left:20px;"></span></td>
							</tr>-->
							<?php 
							$language = Common::GetLanguage();
							if($language == "english"){
								echo '<input id="currency" name="currency" type="hidden" value="GBP"/>';
							}else{
								echo '<input id="currency" name="currency" type="hidden" value="EUR"/>';
							}
							?>
							<tr>
								<td width="168" class="w_168">
									<span style="text-align:center;font-size:16px;">
									<?php 
										Lang::EchoString2($langdate['assembly'][14]);
										echo "<span style='color:red'>";
										if($language == "english"){
											echo ' GBP(&pound;)';
										}else{
											echo ' EUR(&euro;)';
										}
										echo "</span>";
									?>
									</span>
									<!--<select name="currency" onchange="calculate_assemblyB('onlineQuote')" style="width: 67px; height: 22px;">
										<option value="GBP">GBP</option>
										<option value="EUR">EUR</option>
									</select>-->
								</td>
								<td>
								<span id="assembleprice" name="assembleprice" class="c_f30" style="font-weight:bold;margin-left:20px;"></span>
								</td>
							</tr>
							<tr>
								<td><?php Lang::EchoString2($langdate['assembly'][33]);?>:[<span class="c_red helper dialogShow" onmouseover="ShowDialog(this,'/comment/leadtime_comment.php');">?</span>]</td>
								<td><span id="leadtime" class="c_f30" style="font-weight:bold;margin-left:20px;"></span></td>
							</tr>
					</table>
						
				</div>
				</form>
					<div class="main_box clearbox mt10">
						<img src="/rescources/images/stencil.png" width="42" height="57" alt="" class="nr_m10 fl" style="margin-top:50px"/>
						<div class="right_box1 fr lh2em">
							<strong><?php Lang::EchoString2($langdate['assembly'][28]);?></strong>---<?php Lang::EchoString2($langdate['assembly'][27]);?><br/>
                            <strong><?php Lang::EchoString2($langdate['assembly'][34]);?></strong>---<?php Lang::EchoString2($langdate['assembly'][36]);?><br/>
							<strong><?php Lang::EchoString2($langdate['assembly'][29]);?>---</strong><?php Lang::EchoString2($langdate['assembly'][25]);?><?php Lang::EchoString2($langdate['assembly'][26]);?><br/>
							<strong><?php Lang::EchoString2($langdate['assembly'][31]);?>---</strong><?php Lang::EchoString2($langdate['assembly'][32]);?><br/>
						</div>
						<div class="clear"></div>
					</div>
		</div>
	<div class="clear"></div>
	

</div>
<?php include '../static/footer.php';?>
</body>
</html>