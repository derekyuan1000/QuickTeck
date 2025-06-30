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
$langdate['index'][13]['english']='Knowledge Zone';
$langdate['index'][13]['french']='Zone de Connaissances';
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="UK low cost PCB,Printed circuit boards Manufacturing,PCB online quote assembly,Online Quote PCB manufacturing,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing,Europe printed circuit boards manufacturing,offering online quote PCB." />
<meta name="keywords" content="Low Cost PCB Manufacturing, UK online quote PCB manufacturer,PCB assembly,PCB Online Quote,pcb manufacturer,UK Printed circuit board Prototype Fabrication,UK manufacturing, UK multi-layers Printed circuit boards manufacturing" />
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
	background: url(images/page-off.png) center center no-repeat;
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
<div class="dialogWindowBin" id="dialogWindowBin" style="display:inline"><!-- use inline or none to switch on/off windows --> 
<a href="https://www.quick-teck.co.uk/News/Content.php?Id=105">
 <img src="/images/info.png" align="middle">
 <p></p>
<span style="color:#F30;"><br/>Updates regarding the impacts of Coronavirus<br></span></a></br>
<span style="display:block;float:right;color:#F30;cursor:pointer;" onclick="closeLeftWin();">close</span>
</div>
<?php include 'static/header.php';?>
<div class="w980 auto clearbox mt5">
	<div id="pages"></div>
	<div id="carousel" class="banner fl" style="position:static; display:none">
		<a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['index'][15]);?>" width="660" height="240" alt="" /></a>
		<a href="/ElectronicElement/orderNow.php" title=""><img src="<?php Lang::EchoString2($langdate['index'][21]);?>" width="660" height="240" alt="" /></a>
		<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/offer_news.png" width="660" height="240" alt="" /></a><!--/images/3dprint1.jpg --> 
		<a href="/onlinequote/assembly_quoteB.php" title=""><img src="<?php Lang::EchoString2($langdate['index'][22]);?>" width="660" height="240" alt="" /></a>
	</div>
	<input type="hidden" value="660" id="carouselWidth"/>
	<input type="hidden" value="240" id="carouselHeight"/>
	<input type="hidden" value="images/" id="pagesUrl"/>
	
	<div class="banner fr">
		<a href="/orderprocess/order_process.php" title=""><img src="<?php Lang::EchoString2($langdate['index'][16]);?>" width="310" height="240" alt="" /></a>
	</div>
	<div class="clear"></div>
	<div class="inwelcome mt10 w660 fl">
		<h3><img src="/rescources/images/<?php Lang::EchoString2($langdate['index'][18]);?>" height="50" alt="" /></h3>
		<p><?php Lang::EchoString2($langdate['index'][0]);?></p>
		<p><?php Lang::EchoString2($langdate['index'][1]);?> </p>
	</div>
	<div class="w310 fr">
		<div class="inknowledge mt10">
			<div class="title01">
				<h3><a href="/News/Atrcles.php" style="color:#F30;"><?php Lang::EchoString2($langdate['index'][13]);?></a></h3>
				<a href="/News/Atrcles.php" title="" class="more01"><img src="/rescources/images/more01.gif" alt="" /></a>
			</div>
			<ul class="inknowledge_list">
			<?php foreach ($newsArray as $v) {?>
				<li><a href="/News/Content.php?Id=<?php echo $v->Id;?>" title=""><?php Lang::EchoString(Common::CutString($v->Title_english,50),Common::CutString($v->Title_french,30),Common::CutString($v->Title_dutch,30),Common::CutString($v->Title_spanish,30));?></a></li>
				<?php }?>
			</ul>
		</div>
		<div class="inshare mt5">
			<strong><?php Lang::EchoString2($langdate['index'][14]);?></strong><a href="http://twitter.com/quickteck" target="_blank" title=""><img src="/rescources/images/share01.png" width="22" height="22" alt="" /></a><a href="http://www.facebook.com/quickteck"  target="_blank" title=""><img src="/rescources/images/share02.png" width="22" height="22" alt="" /></a>
		</div>
	</div>
	<div class="clear"></div>
	<div class="w660 fl oh">
		<ul class="inpro_list clearbox">
		    <li>
				<a href="/design/design_quote.php" title=""><img src="/rescources/images/inpro05.jpg" width="142" height="133" alt="" /></a>
				<div class="inpro_list_r">
					<h3><a href="/design/design_quote.php" title="" <?php Lang::SetLineHeight(18)?>><?php Lang::EchoString2($langdate['index'][8]);?> </a></h3>
					<p <?php Lang::SetLineHeight(14)?>><?php Lang::EchoString2($langdate['index'][9]);?>...</p>
				</div>
			</li>
		   <li>
				<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/inpro01.jpg" width="142" height="133" alt="" /></a>
				<div class="inpro_list_r">
					<h3><a href="/onlinequote/onlinequote.php" title="" <?php Lang::SetLineHeight(18)?>><?php Lang::EchoString2($langdate['index'][2]);?></a></h3>
					<p <?php Lang::SetLineHeight(14)?>><?php Lang::EchoString2($langdate['index'][3]);?></p>
				</div>
			</li>
			<li>
				<a href="/onlinequote/assembly_quoteB.php" title=""><img src="/rescources/images/inpro02.jpg" width="142" height="133" alt="" /></a>
				<div class="inpro_list_r">
					<h3><a href="/assembly/assembly_quote.php" title="" <?php Lang::SetLineHeight(18)?>><?php Lang::EchoString2($langdate['index'][4]);?></a></h3>
					<p <?php Lang::SetLineHeight(14)?>><?php Lang::EchoString2($langdate['index'][5]);?></p>
				</div>
			</li>
			<li>
				<a href="/stencil/buy_stencil.php" title=""><img src="/rescources/images/inpro03.jpg" width="142" height="133" alt="" /></a>
				<div class="inpro_list_r">
					<h3><a href="/stencil/buy_stencil.php" title="" <?php Lang::SetLineHeight(18)?>><?php Lang::EchoString2($langdate['index'][6]);?> </a></h3>
					<p <?php Lang::SetLineHeight(14)?>><?php Lang::EchoString2($langdate['index'][7]);?><a style="color:#F30;display:none;" href="/stencil/buy_stencil.php">here</a></p>
				</div>
			</li>
			<li>
			  <a href="/3DPrinting/onlineQuote.php" title=""><img src="/rescources/images/inpro06.jpg" width="142" height="133" alt="" /></a>
			  <div class="inpro_list_r">
					<h3><a href="/3DPrinting/onlineQuote.php" title="" <?php Lang::SetLineHeight(18)?>><?php Lang::EchoString2($langdate['index'][23]);?></a></h3>
					<p <?php Lang::SetLineHeight(14)?>><?php Lang::EchoString2($langdate['index'][26]);?></p>
				</div>
			</li>
			<li>
			  <a href="/review/review.php" title=""><img src="/rescources/images/inpro04.jpg" width="142" height="133" alt="" /></a>
			  <div class="inpro_list_r">
					<h3><a href="/review/review.php" title="" <?php Lang::SetLineHeight(18)?>><?php Lang::EchoString2($langdate['index'][24]);?> </a></h3>
					<p <?php Lang::SetLineHeight(14)?>><?php Lang::EchoString2($langdate['index'][27]);?><a style="color:#F30;display:none;" href="/stencil/buy_stencil.php">here</a></p>
				</div>
			</li>
		</ul>
  </div>
	<div class="w310 fr">
		<div class="<?php Lang::EchoString2($langdate['index'][19]);?> mt10">
		<form action="/trackingorder/trackingResult.php" method="post">
			<p ><?php Lang::EchoString2($langdate['index'][10]);?>:</p>
			<div class="intracking_form">
			
				<ul >
					<li><span <?php Lang::SetLineHeight(14);?>><?php Lang::EchoString2($langdate['index'][11]);?>[<a style="color:#F30;font-weight:bold;" href="#" title="<?php Lang::EchoString2($langdate['index'][17]);?>" onclick="return false;">?</a>]:</span><input name="number" type="text" class="intracking_txt" <?php Lang::SetVertical(50)?>/></li>
					<li><span <?php Lang::SetLineHeight(14);?>><?php Lang::EchoString2($langdate['index'][12]);?>:</span><input name="random" type="text" class="intracking_txt" <?php Lang::SetVertical(50)?>/></li>
				</ul>
				
			</div>
			<input type="submit" value=" " class="<?php Lang::EchoString2($langdate['index'][20]);?>"/>
		  </form>
			<div class="clear"></div>
		</div>
		<div class="banner mt10">
			<img src="/rescources/images/01_big.gif" alt="" width="310" height="75" />
		</div>
		<div class="banner mt10">
			<img src="/rescources/images/Certification.jpg" alt="" width="310" height="75" />
		</div>
		<div class="banner mt10">
			<img src="/rescources/images/leadtime_gu.jpg" alt="" width="310" height="75" />
		</div>
		<div class="banner mt10">
			<img src="/rescources/images/paypalbtn.jpg" alt="" width="310" height="75" />
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php include 'static/footer.php';
?>
</body>
</html>