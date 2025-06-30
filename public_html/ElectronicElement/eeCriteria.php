<?php
session_start();
$langdate['eeCriteria'][0]['english']='Home';
$langdate['eeCriteria'][0]['french']='Accueil';
$langdate['eeCriteria'][0]['dutch']='';
$langdate['eeCriteria'][0]['spanish']='';
$langdate['eeCriteria'][1]['english']='Order now';
$langdate['eeCriteria'][1]['french']='Passer une commande';
$langdate['eeCriteria'][1]['dutch']='';
$langdate['eeCriteria'][1]['spanish']='';
$langdate['eeCriteria'][2]['english']='Electronic Component';
$langdate['eeCriteria'][2]['french']='Composants Electroniques';
$langdate['eeCriteria'][2]['dutch']='';
$langdate['eeCriteria'][2]['spanish']='';
$langdate['eeCriteria'][3]['english']='Order Electronic Component';
$langdate['eeCriteria'][3]['french']='Commande de composants électroniques';
$langdate['eeCriteria'][3]['dutch']='';
$langdate['eeCriteria'][3]['spanish']='';
$langdate['eeCriteria'][4]['english']='We use the following criteria when considering the components we include here.';
$langdate['eeCriteria'][4]['french']='We use the following criteria when considering the components we include here.';
$langdate['eeCriteria'][4]['dutch']='';
$langdate['eeCriteria'][4]['spanish']='';
$langdate['eeCriteria'][5]['english']='--- Great prices: Although we never purchase the cheapest components from Asia, we value every penny the customer pays so we are constantly reviewing and negotiating with our suppliers to get the best possible prices. We have gained a very strong negotiating base with our suppliers as we place over a million pounds of orders for electronic components annually.';
$langdate['eeCriteria'][5]['french']='--- Great prices: Although we never purchase the cheapest components from Asia, we value every penny the customer pays so we are constantly reviewing and negotiating with our suppliers to get the best possible prices. We have gained a very strong negotiating base with our suppliers as we place over a million pounds of orders for electronic components annually.';
$langdate['eeCriteria'][5]['dutch']='';
$langdate['eeCriteria'][5]['spanish']='';
$langdate['eeCriteria'][6]['english']='';
$langdate['eeCriteria'][6]['french']='';
$langdate['eeCriteria'][6]['dutch']='';
$langdate['eeCriteria'][6]['spanish']='';
$langdate['eeCriteria'][7]['english']='--- High quality: All components have been fully tested and verified by our procurement engineering team. We never choose low-end quality components as we understand the quality standard our customers expect.';
$langdate['eeCriteria'][7]['french']='--- High quality: All components have been fully tested and verified by our procurement engineering team. We never choose low-end quality components as we understand the quality standard our customers expect.';
$langdate['eeCriteria'][7]['dutch']='';
$langdate['eeCriteria'][7]['spanish']='';
$langdate['eeCriteria'][8]['english']='--- Reliable lead times: Every component shown on the list has been used in at least three production jobs on our internal assembly line. We constantly review our stock levels and liaise with our suppliers to manage any changes in lead times. If there any issues with stock procurement the components will be removed from the list. Many design engineers use online international component suppliers to select the components but from time to time they find that once their design moves to the production phase, they have issues sourcing the components they require or they can be extremely expensive. So why not select the components from our list at the design phase?';
$langdate['eeCriteria'][8]['french']='--- Reliable lead times: Every component shown on the list has been used in at least three production jobs on our internal assembly line. We constantly review our stock levels and liaise with our suppliers to manage any changes in lead times. If there any issues with stock procurement the components will be removed from the list. Many design engineers use online international component suppliers to select the components but from time to time they find that once their design moves to the production phase, they have issues sourcing the components they require or they can be extremely expensive. So why not select the components from our list at the design phase?';
$langdate['eeCriteria'][8]['dutch']='';
$langdate['eeCriteria'][8]['spanish']='';
$langdate['eeCriteria'][9]['english']='Registered customer';
$langdate['eeCriteria'][9]['french']='Client enregistré';
$langdate['eeCriteria'][9]['dutch']='';
$langdate['eeCriteria'][9]['spanish']='';
$langdate['eeCriteria'][10]['english']='Non-registered customer';
$langdate['eeCriteria'][10]['french']='Pas client enregistré';
$langdate['eeCriteria'][10]['dutch']='';
$langdate['eeCriteria'][10]['spanish']='';
$langdate['eeCriteria'][11]['english']='/rescources/images/banner02.jpg';
$langdate['eeCriteria'][11]['french']='/rescources/images/banner02_fr.jpg';
$langdate['eeCriteria'][11]['dutch']='';
$langdate['eeCriteria'][11]['spanish']='';
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EETypeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEElectronicElementService_Class.php");
$eeTypeService = new EETypeService();
$eeElectronicElementService = new EEElectronicElementService();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Manufacturing,UK printed circuit board Online Quote,UK PCB Manufacturer,circuit board Prototype manufacture</title>
<meta name="description" content="Low Cost PCB Assembly,Online Quote PCB,pcb manufacture,UK circuit board Prototype Fabrication offering two layers prototype to multilayer PTH printed circuit board." />
<meta name="keywords" content="Low Cost PCB Manufacturing,PCB assembly,Online Quote PCB price,pcb manufacturer,UK PCB Prototype Manufacture,pcbs,PCB Prototype Fabrication,double layers PCB prototype" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<link href="/rescources/css/accordion.css" type="text/css" rel="stylesheet" />
<link href="/rescources/widget/css/rcarousel.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dialogWindowBin{
	position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;
}
.tdright{
 text-align:right;
 padding-right:15px;
}
#T td{
    padding: 10px 10px;
    font-size:14px;
    font-family:Arial;
}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="scripts/Script.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/accordion.js"></script>
<script type="text/javascript" src="../Management/Scripts/admin.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jquery.ui.rcarousel.min.js"></script>
<script type="text/javascript" src="/rescources/widget/lib/jammy.js"></script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<?php include '../static/carousel.php';?>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['eeCriteria'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['eeCriteria'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<?php
				$strClientTypeIds = $eeTypeService->GetAllEETypesString(1);
				$clientEE = $eeElectronicElementService->GetEEElectronicElementsByTypeIds($strClientTypeIds);
			?>
			<div class="left_nav_title">
				<span class="ico_title" style="font-size:12px">
					<a href="eeCriteria.php" style="color:red">
						<?php Lang::EchoString2($langdate['eeCriteria'][2]);?>&nbsp;
						<span style="font-weight:normal">(<?php echo count($clientEE) ?>)</span>
					</a>
				</span>
			</div>
			<div class="left_box_c">
				<?php include_once("category.php");?>
                <div class="mt10">
                </div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
            <p class="c_f60 lh2em"></p>
            <h3 class="title_main"><?php Lang::EchoString2($langdate['eeCriteria'][3]);?></h3>
            <div style="border:1px solid #cfcfcf; margin-top:10px; padding:10px; background-color:#f8f8f8;">
                <p style="padding-left: 5px; padding-top: 10px; font-size:14px;">
                    <?php Lang::EchoString2($langdate['eeCriteria'][4]);?>
                </p>
                <div style="width: 100%; padding: 10px;">
                    <table id="T">
                        <tr>
                            <td rowspan="3" valign="top">
                                <img alt="" src="../rescources/images/img_b.gif" style="margin-top:5px"/>
                            </td>
                            <td>
                                <img alt="" src="../rescources/images/orderNow_03.gif" /> <?php Lang::EchoString2($langdate['eeCriteria'][7]);?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="" src="../rescources/images/orderNow_03.gif" /> <?php Lang::EchoString2($langdate['eeCriteria'][8]);?></td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="" src="../rescources/images/orderNow_03.gif" /> <?php Lang::EchoString2($langdate['eeCriteria'][5]);?></td>
                        </tr>
                    </table>
                    <p class="mt10 tc" style="display:none">
                    <input class="submit_bn191" type="button" value="<?php Lang::EchoString2($langdate['eeCriteria'][9]);?>" name="Button1" onclick="toList('pcbOrderList.php?isLogin=yes')"/>&nbsp;&nbsp;
                    <input class="submit_bn191" type="button" value="<?php Lang::EchoString2($langdate['eeCriteria'][10]);?>" name="Button1" onclick="toList('enterPcbOrderInfo.php')"/></p>
                </div>
                <p class="mt10 tc"></p>
            </div>
            <div class="clear">
            </div>
        </div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>