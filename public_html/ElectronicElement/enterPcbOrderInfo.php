<?php
session_start();
$langdate['selectPCBorder'][0]['english']='Surname';
$langdate['selectPCBorder'][0]['french']='Nom';
$langdate['selectPCBorder'][0]['dutch']='';
$langdate['selectPCBorder'][0]['spanish']='';
$langdate['selectPCBorder'][1]['english']='Postcode';
$langdate['selectPCBorder'][1]['french']='Code postal';
$langdate['selectPCBorder'][1]['dutch']='';
$langdate['selectPCBorder'][1]['spanish']='';
$langdate['selectPCBorder'][2]['english']='Select your avaiable PCB order';
$langdate['selectPCBorder'][2]['french']='Sélectionnez votre commande de PCBs courante';
$langdate['selectPCBorder'][2]['dutch']='';
$langdate['selectPCBorder'][2]['spanish']='';
$langdate['selectPCBorder'][3]['english']='Please input your Surname and postcode then select the available PCB order, which your components order will be despatched together with';
$langdate['selectPCBorder'][3]['french']='Merci d\'entrer votre prénom et code postal puis sélectionner votre commande de PCBs à laquelle sera jointe votre commande de composants';
$langdate['selectPCBorder'][3]['dutch']='';
$langdate['selectPCBorder'][3]['spanish']='';
$langdate['selectPCBorder'][4]['english']='Follow Us On';
$langdate['selectPCBorder'][4]['french']='Suivez-Nous Sur';
$langdate['selectPCBorder'][4]['dutch']='';
$langdate['selectPCBorder'][4]['spanish']='';
$langdate['selectPCBorder'][5]['english']='Submit';
$langdate['selectPCBorder'][5]['french']='Soumettre';
$langdate['selectPCBorder'][5]['dutch']='';
$langdate['selectPCBorder'][5]['spanish']='';
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EETypeService_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/EEElectronicElementService_Class.php");
$eeTypeService = new EETypeService();
$eeElectronicElementService = new EEElectronicElementService();

$eeId = $_GET[eeId];
$quantity = $_GET[quantity];
$ctrl = $_GET[ctrl];
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
<style type="text/css">
.dialogWindowBin{
	position:absolute;left:0;top:0;background:#F9F9F9;border:1px #CCC solid;display:none;padding:10px;
}
.tdright{
 text-align:right;
 padding-right:15px;
}
#T td{
    padding: 5px 0px;
}
.sumit_txt{
    width: 249px;
    padding-left: 3px;
    height:37px;
    line-height: 19px;
    border: 1px solid #d6d6d6;
    background-color:#fbfbef;
    border-radius: 5px;
}
</style>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script type="text/javascript" src="scripts/Script.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script type="text/javascript" src="../Management/Scripts/admin.js"></script>
</head>
<body class="bg">
<div class="dialogWindowBin" id="dialogWindowBin"></div>
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title="">Home</a> - <a href="#" title="">Select PCB order:</a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"><span class="ico_title" style="font-size:14px">Select PCB order</span></div>
			<div class="left_box_c">
				<div class="mt10">
					<img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<img src="/rescources/leftpic/10.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/>
					<a href="/forum/index.php" title="Quick-teck electronics engineering forum" target="_blank"><img src="/rescources/images/Electronics_forum.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333"><?php Lang::EchoString2($langdate['selectPCBorder'][4]);?></span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
			<div class="left_box_b"></div>
		</div>
		<div class="w710 fr mt10">
            <p class="c_f60 lh2em"></p>
            <h3 class="title_main"><?php Lang::EchoString2($langdate['selectPCBorder'][2]);?></h3>
			<form name="form1" method="post" action="pcbOrderList.php">
			<div style="border:1px solid #cfcfcf; margin-top:10px; padding:10px 10px 30px 10px; background-color:#f8f8f8;">
                <p style="padding-left: 5px; padding-top: 10px; font-size:14px; font-family:Arial;"><?php Lang::EchoString2($langdate['selectPCBorder'][3]);?>.</p>
                <div align="center" style="font-size: 18px; padding: 10px; font-family:Arial; margin-top:26px;">
                    <table id="T">
                        <tr>
                            <td>
								<span style="padding-right:5px;"><?php Lang::EchoString2($langdate['selectPCBorder'][0]);?>:</span>
                            </td>
                            <td>
                                <input class="sumit_txt" id="surname" name="surname" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="padding-right:5px;"><?php Lang::EchoString2($langdate['selectPCBorder'][1]);?>:</span>
                            </td>
                            <td>
                                <input class="sumit_txt" id="postcode" name="postcode" type="text" />
                            </td>
                        </tr>
                    </table>
                    <p style="text-align:center; padding-top:25px; padding-bottom:23px;">
                    <input class="submit_bn3" type="submit" value="<?php Lang::EchoString2($langdate['selectPCBorder'][5]);?>" name="Button1"/></p>
                </div>
            </div>
            </form>
            <div class="clear">
            </div>
        </div>
	</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php';?>
</body>
</html>