<?php
session_start();
$langdate['EEordernow'][0]['english']='Home';
$langdate['EEordernow'][0]['french']='Accueil';
$langdate['EEordernow'][0]['dutch']='';
$langdate['EEordernow'][0]['spanish']='';
$langdate['EEordernow'][1]['english']='Order now';
$langdate['EEordernow'][1]['french']='Passer une commande';
$langdate['EEordernow'][1]['dutch']='';
$langdate['EEordernow'][1]['spanish']='';
$langdate['EEordernow'][2]['english']='Electronic Component';
$langdate['EEordernow'][2]['french']='Composants Electroniques';
$langdate['EEordernow'][2]['dutch']='';
$langdate['EEordernow'][2]['spanish']='';
$langdate['EEordernow'][3]['english']='Order Electronic Component';
$langdate['EEordernow'][3]['french']='Commande de composants électroniques';
$langdate['EEordernow'][3]['dutch']='';
$langdate['EEordernow'][3]['spanish']='';
$langdate['EEordernow'][4]['english']='Your ordered components will be despatched together with your PCB order(s). So
if you did not order PCBs from us in the last three working days please don\'t use this service';
$langdate['EEordernow'][4]['french']='Votre commande de composants sera dispatché avec votre commande de PCBs. Si vous n\'avez pas commandé de PCBs chez nous dans les trois derniers jours, merci de ne pas utiliser ce service';
$langdate['EEordernow'][4]['dutch']='';
$langdate['EEordernow'][4]['spanish']='';
$langdate['EEordernow'][5]['english']='FAQ\'s';
$langdate['EEordernow'][5]['french']='FAQ';
$langdate['EEordernow'][5]['dutch']='';
$langdate['EEordernow'][5]['spanish']='';
$langdate['EEordernow'][6]['english']='You have two ways to select the PCB order number which you want the components to be despatched together with';
$langdate['EEordernow'][6]['french']='Vous avez deux façon de sélectionner le numéro de commande de PCBs auquel vous souhaiter joindre des composants';
$langdate['EEordernow'][6]['dutch']='';
$langdate['EEordernow'][6]['spanish']='';
$langdate['EEordernow'][7]['english']='If you are registered customer,please log into your account and then you will be able to select the available order number.';
$langdate['EEordernow'][7]['french']='Si vous êtes un client enregistré, merci de vous connecter à votre compte, vous serez alors en mesure de choisir le numéro de
commande.';
$langdate['EEordernow'][7]['dutch']='';
$langdate['EEordernow'][7]['spanish']='';
$langdate['EEordernow'][8]['english']='If you are not registered customer,please input your Surname and postcode then select your available PCB order number.';
$langdate['EEordernow'][8]['french']='Si vous n\'êtes pas un client enregistré, entrer votre prénom et code postal puis sélectionner votre numéro de commande dans ceux disponibles.';
$langdate['EEordernow'][8]['dutch']='';
$langdate['EEordernow'][8]['spanish']='';
$langdate['EEordernow'][9]['english']='Registered customer';
$langdate['EEordernow'][9]['french']='Client enregistré';
$langdate['EEordernow'][9]['dutch']='';
$langdate['EEordernow'][9]['spanish']='';
$langdate['EEordernow'][10]['english']='Non-registered customer';
$langdate['EEordernow'][10]['french']='Pas client enregistré';
$langdate['EEordernow'][10]['dutch']='';
$langdate['EEordernow'][10]['spanish']='';
$langdate['EEordernow'][11]['english']='/rescources/images/banner02.jpg';
$langdate['EEordernow'][11]['french']='/rescources/images/banner02_fr.jpg';
$langdate['EEordernow'][11]['dutch']='';
$langdate['EEordernow'][11]['spanish']='';
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EETypeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEElectronicElementService_Class.php");
$eeTypeService = new EETypeService();
$eeElectronicElementService = new EEElectronicElementService();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PCB Manufacturing,UK printed circuit board Online Quote,UK PCB Manufacturer,circuit board Prototype manufacture</title>
<meta name="description" content="Low Cost PCB Manufacturing,Online Quote PCB,pcb manufacture,UK circuit board Prototype Fabrication offering two layers prototype to multilayer PTH printed circuit board." />
<meta name="keywords" content="Low Cost PCB Manufacturing,Online Quote PCB price,pcb manufacturer,UK PCB Prototype Manufacture,pcbs,PCB Prototype Fabrication,Fabrication, double layers PCB prototype" />
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
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['EEordernow'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['EEordernow'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<?php
				$strClientTypeIds = $eeTypeService->GetAllEETypesString(1);
				$clientEE = $eeElectronicElementService->GetEEElectronicElementsByTypeIds($strClientTypeIds);
			?>
			<div class="left_nav_title">
				<span class="ico_title" style="font-size:12px">
					<a href="eeCriteria.php" style="color:red">
						<?php Lang::EchoString2($langdate['EEordernow'][2]);?>&nbsp;
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
			<form name="form1" method="get" action="searchList.php">
				<p class="title_main" style="text-align: left; padding-left: 5px;">
					<?php //echo $eeType->Name; ?><span style="color: Black; padding-left: 10px; font-size: 14px;">Category:</span>
					<select id="searchTypeId" name="searchTypeId" style="width:200px">
						<option value="-1">--All--</option>
						<?php
						for($i=0; $i < count($eeTypeArray); $i++)
						{
							if($eeTypeArray[$i]->TypeLevel == 2){
						?>
							<option value="<?php echo $eeTypeArray[$i]->Id ?>">&nbsp;&nbsp;--<?php echo $eeTypeArray[$i]->Name ?></option>
						<?php
							}else{
						?>
							<option value="<?php echo $eeTypeArray[$i]->Id ?>"><?php echo $eeTypeArray[$i]->Name ?></option>
						<?php
							}
						}
						?>
					</select>
					<span style="color: Black; padding-left: 10px; font-size: 14px;">Key word:&nbsp;</span>
					<input id="searchKeyWord" name="searchKeyWord" type="text" value="<?php echo $searchKeyWord;?>" style="width:150px"/>
					<input class="toplogin_btn" id="Button1" type="submit" value="Search" />
				</p>
            </form>
            <h3 class="title_main"><?php Lang::EchoString2($langdate['EEordernow'][3]);?></h3>
            <div style="border:1px solid #cfcfcf; margin-top:10px; padding:10px; background-color:#f8f8f8;">
                <p style="padding-left: 5px; padding-top: 10px; font-size:14px; font-family:Arial;">
                    <?php Lang::EchoString2($langdate['EEordernow'][4]);?><a href="/FAQ/FAQ.php#Components_001" title="" class="c_f60" target="_blank">[<?php Lang::EchoString2($langdate['EEordernow'][5]);?>]</a>. <?php Lang::EchoString2($langdate['EEordernow'][6]);?>.
                </p>
                <div style="width: 100%; padding: 10px;">
                    <table id="T">
                        <tr>
                            <td rowspan="2">
                                <img alt="" src="../rescources/images/img_b.gif" />
                            </td>
                            <td>
                                <img alt="" src="../rescources/images/orderNow_03.gif" /> <?php Lang::EchoString2($langdate['EEordernow'][7]);?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img alt="" src="../rescources/images/orderNow_03.gif" /> <?php Lang::EchoString2($langdate['EEordernow'][8]);?></td>
                        </tr>
                    </table>
                    <p class="mt10 tc">
                    <input class="submit_bn191" type="button" value="<?php Lang::EchoString2($langdate['EEordernow'][9]);?>" name="Button1" onclick="toList('pcbOrderList.php?isLogin=yes')"/>&nbsp;&nbsp;
                    <input class="submit_bn191" type="button" value="<?php Lang::EchoString2($langdate['EEordernow'][10]);?>" name="Button1" onclick="toList('enterPcbOrderInfo.php')"/></p>
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