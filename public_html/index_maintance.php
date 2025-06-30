<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/News_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/NewsService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
$newsService=new NewsService();
$newsArray=$newsService->GetNewsArrayBySql("select * from news where Type='News' order by Id DESC limit 4");
$langdate['index'][0]['english']='Based in Hertfordshire, Quick-teck specialize in electronic design, PCB manufacturing, PCB assembly, and component sourcing services.';
$langdate['index'][0]['french']="Quick-teck est une entreprise située à Hertfortshire en Angleterre, spécialisée dans la conception électronique, la fabrication et l'assemblage de circuits imprimés, ainsi que dans les services de recherche de composants.";
$langdate['index'][0]['dutch']='';
$langdate['index'][0]['spanish']='';
$langdate['index'][1]['english']='We understand that bringing a product to market in a timely and cost effective manner can mean everything in business. Our quality, experience, service and pricing combine to become your efficient and reliable electronic supplier.';
$langdate['index'][1]['french']='Nous sommes conscients que le temps et le coût sont des paramètres importants dans la commercialisation d\'un produit. La qualité de nos produits et de notre service, notre expérience et nos prix sont autant d\'atouts qui font de nous un fournisseur électronique efficace et fiable.';
$langdate['index'][1]['dutch']='';
$langdate['index'][1]['spanish']='';
$langdate['index'][2]['english']='PCB Manufacture';
$langdate['index'][2]['french']='Fabrication de Circuits Imprimés';
$langdate['index'][2]['dutch']='';
$langdate['index'][2]['spanish']='';
$langdate['index'][3]['english']='Quick-teck manufactures PCB prototypes and large-volume orders at affordable costs while still maintaining the highest possible quality.';
$langdate['index'][3]['french']='Quickteck fabrique aussi bien des circuits imprimés prototypes que des séries
		de grandes quantités à des prix abordables, tout en maintenant la meilleure qualité possible.';
$langdate['index'][3]['dutch']='';
$langdate['index'][3]['spanish']='';
$langdate['index'][4]['english']='PCB Assembly';
$langdate['index'][4]['french']='Assemblage de Circuits Imprimés';
$langdate['index'][4]['dutch']='';
$langdate['index'][4]['spanish']='';
$langdate['index'][5]['english']='Quick-teck can build from simple PCB assemblies right through to complex finished products ready for direct shipment.';
$langdate['index'][5]['french']='Nos compétences s\'étendent de l\'assemblage d\'un simple circuit imprimé aux produits finis de natures complexes prêts pour la livraison.';
$langdate['index'][5]['dutch']='';
$langdate['index'][5]['spanish']='';
$langdate['index'][6]['english']='Laser Stencil';
$langdate['index'][6]['french']='Pochoirs Découpés au Laser';
$langdate['index'][6]['dutch']='';
$langdate['index'][6]['spanish']='';
$langdate['index'][7]['english']='Laser cut stainless steel stencils for printing solder pastes. Customer can select framed stencil or stencil sheet ordered together with PCBs.';
$langdate['index'][7]['french']='Laser cut stainless steel stencils for printing solder pastes. Customer can select framed stencil or stencil sheet ordered together with PCBs.';
$langdate['index'][7]['dutch']='';
$langdate['index'][7]['spanish']='';
$langdate['index'][8]['english']='Electronics Design';
$langdate['index'][8]['french']='Conception Electronique';
$langdate['index'][8]['dutch']='';
$langdate['index'][8]['spanish']='';
$langdate['index'][9]['english']='Quick-teck provides a wide range of electronics design to help you get from proposal to product painlessly';
$langdate['index'][9]['french']='Quick-Teck vous propose un choix étendu de conceptions électroniques pour vous aider à passer facilement de l\'étude à la réalisation.';
$langdate['index'][9]['dutch']='';
$langdate['index'][9]['spanish']='';
$langdate['index'][10]['english']='You can track your order status here';
$langdate['index'][10]['french']='Suivez votre commande';
$langdate['index'][10]['dutch']='';
$langdate['index'][10]['spanish']='';
$langdate['index'][11]['english']='Order Number';
$langdate['index'][11]['french']='Numéro de Commande';
$langdate['index'][11]['dutch']='';
$langdate['index'][11]['spanish']='';
$langdate['index'][12]['english']='Reference Number';
$langdate['index'][12]['french']='Numéro de Référence';
$langdate['index'][12]['dutch']='';
$langdate['index'][12]['spanish']='';
$langdate['index'][13]['english']='News';
$langdate['index'][13]['french']='Nouvelles';
$langdate['index'][13]['dutch']='';
$langdate['index'][13]['spanish']='';
$langdate['index'][14]['english']='Follow Us On';
$langdate['index'][14]['french']='Suivez-Nous Sur';
$langdate['index'][14]['dutch']='';
$langdate['index'][14]['spanish']='';
$langdate['index'][15]['english']='/rescources/images/banner01.jpg';
$langdate['index'][15]['french']='/rescources/images/banner01fr.jpg';
$langdate['index'][15]['dutch']='';
$langdate['index'][15]['spanish']='';
$langdate['index'][16]['english']='/rescources/images/inorderprocess.jpg';
$langdate['index'][16]['french']='/rescources/images/inorderprocess_fr.jpg';
$langdate['index'][16]['dutch']='';
$langdate['index'][16]['spanish']='';
$langdate['index'][17]['english']='Order number: e.g. QT020441; Reference number: 6 characters in your order confirmation email.';
$langdate['index'][17]['french']='Numéro de commande: par exemple QT020441; Numéro de référence: 6  caractères se trouvant dans le courriel de confirmation de commande.';
$langdate['index'][17]['dutch']='';
$langdate['index'][17]['spanish']='';
$langdate['index'][18]['english']='wel_title.png';
$langdate['index'][18]['french']='wel_title_fr.png';
$langdate['index'][18]['dutch']='';
$langdate['index'][18]['spanish']='';
$langdate['index'][19]['english']='intracking';
$langdate['index'][19]['french']='intrackingfr';
$langdate['index'][19]['dutch']='';
$langdate['index'][19]['spanish']='';
$langdate['index'][20]['english']='intracking_btn';
$langdate['index'][20]['french']='intracking_btnfr';
$langdate['index'][20]['dutch']='';
$langdate['index'][20]['spanish']='';
$langdate['index'][21]['english']='/rescources/images/banner03.jpg';
$langdate['index'][21]['french']='/rescources/images/banner03fr.jpg';
$langdate['index'][21]['dutch']='';
$langdate['index'][21]['spanish']='';
$langdate['index'][22]['english']='/rescources/images/assembly1.jpg';
$langdate['index'][22]['french']='/rescources/images/assembly1fr.jpg';
$langdate['index'][22]['dutch']='';
$langdate['index'][22]['spanish']='';
$langdate['index'][23]['english']='3D Printing';
$langdate['index'][23]['french']='3D Printing';
$langdate['index'][23]['dutch']='';
$langdate['index'][23]['spanish']='';
$langdate['index'][24]['english']='Design for Manufacturing';
$langdate['index'][24]['french']='Design for Manufacturing';
$langdate['index'][24]['dutch']='';
$langdate['index'][24]['spanish']='';
$langdate['index'][25]['english']='Design for Manufacturing';
$langdate['index'][25]['french']='Design for Manufacturing';
$langdate['index'][25]['dutch']='';
$langdate['index'][25]['spanish']='';
$langdate['index'][26]['english']='Industry standard 3D printing service helps shorten the new product time-to-market and reduces design costs.';
$langdate['index'][26]['french']='Industry standard 3D printing service helps shorten the new product time-to-market and reduces design costs.';
$langdate['index'][26]['dutch']='';
$langdate['index'][26]['spanish']='';
$langdate['index'][27]['english']='Early consideration of manufacturing issues shortens product development time and ensures a smooth transition into production. With 20 years EMS experience, Quick-teck can significantly improve your NPD release process. ';
$langdate['index'][27]['french']='Early consideration of manufacturing issues shortens product development time and ensures a smooth transition into production. With 20 years EMS experience, Quick-teck can significantly improve your NPD release process.';
$langdate['index'][27]['dutch']='';
$langdate['index'][27]['spanish']='';
$langdate['index'][28]['english']='Knowledge Zone';
$langdate['index'][28]['french']='Knowledge Zone';
$langdate['index'][28]['dutch']='';
$langdate['index'][28]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="UK manufacturer,low cost PCB,Printed circuit boards Manufacturing,PCB online quote assembly,Online Quote PCB manufacturing,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing, printed circuit boards manufacturing, online quote PCB." />
<meta name="keywords" content="Low Cost PCB,PCB Manufacturing,UK online quote PCB manufacturer,PCB assembly,PCB Online Quote,circuit board manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing, UK multi-layers Printed circuit boards manufacturing" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UK PCB Manufacturer,Low cost UK Printed circuit board Manufacturing,Online quote PCB manufacturing,low cost PCB,Metal core aluminum PCB manufacturer,circuit board manufacturing,PCB assembly,electronics components</title>
<link href="/rescources/css/style1.css" rel="stylesheet" type="text/css" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{position:absolute;left:0;top:150px;width:180px;background:#F9F9F9;border:1px #CCC solid;padding:10px;}
.dialogWindowBin2{position:absolute;right:0;top:140px;width:128px;background:#F9F9F9;border:1px #CCC solid;padding:4px;}
#pages {
	width: 150px;
	margin: 220px 0px 0px 570px;
	position:absolute;
	z-index:1;
}
.bullet {
	background: url(../Downloads/images/page-off.png) center center no-repeat;
	display: block;
	width: 18px;
	height: 18px;
	margin: 0;
	margin-right: 5px;
	float: left;				
}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript">
function closeLeftWin()
{
	$("#dialogWindowBin").fadeOut(1000);
}
function closeLeftWin2()
{
	$("#dialogWindowBin2").fadeOut(1000);
}
</script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin" style="display:none"><!-- use inline or none to switch on/off windows --> 
<a href="/News/Content.php?Id=105">
 <img src="/images/info.png" align="middle">
 <p></p>
<span style="color:#F30;"><br/>5 day guaranteed lead time option is available!<br></span></a></br>
<span style="display:block;float:right;color:#F30;cursor:pointer;" onclick="closeLeftWin();">close</span>
</div>
<?php include '../Downloads/static/header.php';?>
  <br />  <br />  <br />  <br />  <br />  <br />  <br />  <br />  <br />  <br />  <br />  <br /><br />  <br />  <br />
  
</div>
<p style="font-family:Georgia; color:Black; font-size: 20px;padding-left:4em; padding-right:4em ">Sorry for the inconvenience.<br />
Quick-teck website is currently undergoing scheduled maintenance. We are extending our website server today(22nd Oct 2020). The whole process could take from 4 to 6 hours.  <br />
Thank you for your understanding. You can contact us on <a href="mailto:info@quick-teck.co.uk" style="color:blue">info@quick-teck.co.uk</a> to place the order or 01763 448 118 for any urgent quires. </p>
<br />  <br />  <br />  <br />  <br />  
<p style="font-family:Georgia; color:Blue; font-size: 20px;padding-left:10em "> Quick-teck Electronics Limtied</p>

<?php include '../Downloads/static/footer.php';
?>
</body>
</html>