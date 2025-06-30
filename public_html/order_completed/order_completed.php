<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/OrderService_Class.php");
$number = $_GET['n'];
$key = $_GET['k'];
if(!$number){
	$number = $_GET['item_number'];
	if(!$key && $number){
		$orderService = new OrderService();
		$t_order = $orderService->GetOrderByNumber($number);
		$key = $t_order->ClientRandomCode;
	}
}

$langdate['ordercompleted'][0]['english']='Home';
$langdate['ordercompleted'][0]['french']='Accueil';
$langdate['ordercompleted'][0]['dutch']='';
$langdate['ordercompleted'][0]['spanish']='';
$langdate['ordercompleted'][1]['english']='Order completed';
$langdate['ordercompleted'][1]['french']='Commande terminée';
$langdate['ordercompleted'][1]['dutch']='';
$langdate['ordercompleted'][1]['spanish']='';
$langdate['ordercompleted'][2]['english']='Congratulations! '.$number.' order has been received.';
$langdate['ordercompleted'][2]['french']='Félicitations, nous avons maintenant reçu votre commande!('.$number.')';
$langdate['ordercompleted'][2]['dutch']='';
$langdate['ordercompleted'][2]['spanish']='';
$langdate['ordercompleted'][3]['english']='If there is any technical issues or enquires we will contact you in the next 6 hours. Otherwise a order confirmation email will be sent to you in the next 4 hours. 
									Should you have any problem, please feel free to contact us';
$langdate['ordercompleted'][3]['french']='En cas de problèmes techniques ou de questions de notre part, nous vous contacterons dans les 6 prochaines heures. Dans le cas contraire, vous recevrez une confirmation de commande par courriel dans les 4 prochaines heures. N\'hésitez pas à nous contacter en cas de problèmes';
$langdate['ordercompleted'][3]['dutch']='';
$langdate['ordercompleted'][3]['spanish']='';
$langdate['ordercompleted'][4]['english']='You can track the order status or download the invoice on our order tracking system';
$langdate['ordercompleted'][4]['french']='Vous pouvez suivre l\'état de la commande ou télécharger la facture depuis notre base de données.';
$langdate['ordercompleted'][4]['dutch']='';
$langdate['ordercompleted'][4]['spanish']='';
$langdate['ordercompleted'][5]['english']='by using the following information:';
$langdate['ordercompleted'][5]['french']='Utilisez les informations suivantes:';
$langdate['ordercompleted'][5]['dutch']='';
$langdate['ordercompleted'][5]['spanish']='';
$langdate['ordercompleted'][6]['english']='Order Number: ';
$langdate['ordercompleted'][6]['french']='Numéro de commande: ';
$langdate['ordercompleted'][6]['dutch']='';
$langdate['ordercompleted'][6]['spanish']='';
$langdate['ordercompleted'][7]['english']='Reference Number: ';
$langdate['ordercompleted'][7]['french']='Numéro de référence: ';
$langdate['ordercompleted'][7]['dutch']='';
$langdate['ordercompleted'][7]['spanish']='';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Circuit Board Manufacturer in UK,PCB from low cost PCB Manufacturer UK,PCB price,UK PCB factory, UK PCB Manufacturer,Prototype PCB manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,UK PCB manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,UK PCB manufacturer,offering prototype PCB to multilayer volume production PCBs at low price,online quote PCB." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
</head>
<body class="bg">
<?php include '../static/header.php';?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['ordercompleted'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['ordercompleted'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_box_t"></div>
			<div class="left_box_c">
				<div class="mt10">
					<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
<a href="/aboutus/why_us.php" title=""><img src="/rescources/leftpic/04.gif" width="233" height="75" alt="" class="ml10 " style="margin-top:10px;"/></a>
					<a href="/News/Atrcles.php" title=""><img src="/rescources/leftpic/08.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img1.gif" width="30" height="30" alt="" />&nbsp;&nbsp;&nbsp;<img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
							<div class="main_box clearbox">
							<img src="/rescources/images/draw.png" width="55" height="48" alt="" class="nr_m10 fl" />
							<div class="right_box1 fr lh2em">
								<p class="c_f30" style="font-size:16px"><?php Lang::EchoString2($langdate['ordercompleted'][2]);?></p><br>
								<?php if($number && $key){ ?>
								<p><?php Lang::EchoString2($langdate['ordercompleted'][4]);?><br>
									<a href="http://www.quick-teck.co.uk/trackingorder/trackingorder.php" target="_blank" style="color:blue">http://www.quick-teck.co.uk/trackingorder/trackingorder.php</a><br>
									<?php Lang::EchoString2($langdate['ordercompleted'][5]);?><br>
									<?php Lang::EchoString2($langdate['ordercompleted'][6]);?><?php echo $number;  ?><br>
									<?php Lang::EchoString2($langdate['ordercompleted'][7]);?><?php echo $key;  ?><br>
								</p>
								<?php } ?>
								<p>
									<?php Lang::EchoString2($langdate['ordercompleted'][3]);?>! 
								</p>
							</div>
							<div class="clear"></div>
						</div>
				</div>
	<div class="clear"></div>
</div>
<?php include '../static/footer.php'?>
</body>
</html>