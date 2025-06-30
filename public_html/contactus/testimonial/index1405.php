<?php  
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/GuestBookInfoService_Class.php");
include_once("Pager_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Config_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/CountryService_Class.php");

$guestBookInfoService = new GuestBookInfoService();
$countryService = new CountryService();
$allCountries = $countryService->GetAllCountries();
$currentPage = !empty($_GET['page'])?$_GET['page']:1;
if(!$currentPage){
	$currentPage = 1;
}

$result = $guestBookInfoService->GetAllGuestBookInfosByPage(20, $currentPage,2);
$recoudCount = $result[0];
$guestBookInfoArray = $result[1];
$num=count($guestBookInfoArray);
$pager = new Pager(20,$recoudCount,$currentPage,"index.php?page=");

if(!empty($_SESSION['message'])){
	echo "<script>alert('".$_SESSION['message']."')</script>";
	$_SESSION['message']="";
}
$langdate['testimonial'][0]['english']='Home';
$langdate['testimonial'][0]['french']='';
$langdate['testimonial'][0]['dutch']='';
$langdate['testimonial'][0]['spanish']='';
$langdate['testimonial'][1]['english']='Testimonial';
$langdate['testimonial'][1]['french']='';
$langdate['testimonial'][1]['dutch']='';
$langdate['testimonial'][1]['spanish']='';
$langdate['testimonial'][2]['english']='Contact us';
$langdate['testimonial'][2]['french']='';
$langdate['testimonial'][2]['dutch']='';
$langdate['testimonial'][2]['spanish']='';
$langdate['testimonial'][3]['english']='Contact form';
$langdate['testimonial'][3]['french']='';
$langdate['testimonial'][3]['dutch']='';
$langdate['testimonial'][3]['spanish']='';
$langdate['testimonial'][4]['english']='Testimonial';
$langdate['testimonial'][4]['french']='';
$langdate['testimonial'][4]['dutch']='';
$langdate['testimonial'][4]['spanish']='';
$langdate['testimonial'][5]['english']='Customer Testimonial Form ';
$langdate['testimonial'][5]['french']='';
$langdate['testimonial'][5]['dutch']='';
$langdate['testimonial'][5]['spanish']='';
$langdate['testimonial'][6]['english']='A indicates field is required';
$langdate['testimonial'][6]['french']='';
$langdate['testimonial'][6]['dutch']='';
$langdate['testimonial'][6]['spanish']='';
$langdate['testimonial'][7]['english']='Name';
$langdate['testimonial'][7]['french']='';
$langdate['testimonial'][7]['dutch']='';
$langdate['testimonial'][7]['spanish']='';
$langdate['testimonial'][8]['english']='Email';
$langdate['testimonial'][8]['french']='';
$langdate['testimonial'][8]['dutch']='';
$langdate['testimonial'][8]['spanish']='';
$langdate['testimonial'][9]['english']='Country';
$langdate['testimonial'][9]['french']='';
$langdate['testimonial'][9]['dutch']='';
$langdate['testimonial'][9]['spanish']='';
$langdate['testimonial'][10]['english']='City/Town';
$langdate['testimonial'][10]['french']='';
$langdate['testimonial'][10]['dutch']='';
$langdate['testimonial'][10]['spanish']='';
$langdate['testimonial'][11]['english']='Message';
$langdate['testimonial'][11]['french']='';
$langdate['testimonial'][11]['dutch']='';
$langdate['testimonial'][11]['spanish']='';
$langdate['testimonial'][12]['english']='Below are testimonial from many Quick-teck customers.';
$langdate['testimonial'][12]['french']='Below are testimonial from many Quick-teck customers.';
$langdate['testimonial'][12]['dutch']='';
$langdate['testimonial'][12]['spanish']='';
$langdate['testimonial'][13]['english']='We love working with our customers to make their project a success. If you have used Quick-teck\'s service, please fill out the form below to let other people know about your experience. ';
$langdate['testimonial'][13]['french']='We love working with our customers to make their project a success. If you have used Quick-teck\'s service, please fill out the form below to let other people know about your experience. ';
$langdate['testimonial'][13]['dutch']='';
$langdate['testimonial'][13]['spanish']='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Low cost printed circuit board manufacturer,UK PCB board manufacturer,PCB prototype,PCB board manufacturer</title>
<meta name="description" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta name="keywords" content="Order PCB from UK printed circuit board manufacturer,offering prototype PCB to multilayer volume production PCBs at low price." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/rescources/css/style.css" rel="stylesheet" type="text/css" />
<script src="../../Management/Scripts/client.js" type="text/javascript"></script>
<script type="text/javascript" src="/rescources/js/jquery.min.js"></script>
<script src="/rescources/js/ainatec.js" type="text/javascript"></script>
<script src="../../kindeditor4/kindeditor.js" type="text/javascript"></script>

<script type="text/javascript">
var editor1;
KindEditor.ready(function(K) {
    editor1 = K.create('#comment',{langType : 'en',width:'500px',height:'150px',
    	items:['emoticons']
    });
});
function update_flag(objet){
	if (objet.value)
		document.getElementById("img_flags").src = 'images/'+objet.value+'.jpg';
}
function verif_mail(adresse) {
	var place = adresse.indexOf("@",1);
	var point = adresse.indexOf(".",place+1);

	if ((place > -1)&&(adresse.length >2)&&(point > 1))
		return true;
	else
		return false;
}
function verif_add(){
	//var F = document.getElementById("form_add_guest");
	//var name = F.name.value;	
	//var mail= F.email.value;
	var name = document.getElementById("name").value;	
	var mail= document.getElementById("email").value;

	if (name==""){
		alert("Please mention your name ");
		return
	}else if (editor1.isEmpty()){
		alert("Please add your message ");
		return
	}else if (!verif_mail(mail) || mail==""){
		alert("Your Email is incorrect ");
		return
	}

    
	ajaxAddGuestForm();
}
</script>
</head>
<body class="bg">
<?php include '../../static/header.php'?>
<div class="w980 auto clearbox mt5">
		<div class="w980 banner"><a href="#" title=""><img src="/rescources/images/banner02.jpg" width="980" height="170" alt="" /></a></div>
		<div class="bnav ico_home mt10"><a href="/" title=""><?php Lang::EchoString2($langdate['testimonial'][0]);?></a> - <a href="#" title=""><?php Lang::EchoString2($langdate['testimonial'][1]);?></a></div>
		<div class="fl mt10 left_box">
			<div class="left_nav_title"> <span class="ico_title"><?php Lang::EchoString2($langdate['testimonial'][2]);?></span> </div>
			<div class="left_box_c">
				<div class="left_nav">
					<ul>
						<li><a href="/contactus/contactus.php" title="" ><?php Lang::EchoString2($langdate['testimonial'][3]);?></a></li>
						<li><a href="/contactus/guestForm/index.php" title="" class="on"><?php Lang::EchoString2($langdate['testimonial'][4]);?></a></li>
					</ul>
				</div>
				<div class="mt10">
					<a href="/onlinequote/onlinequote.php" title=""><img src="/rescources/leftpic/06.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/FAQ/FAQ.php#Shipping_001" title=""><img src="/rescources/leftpic/07.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/OrderFromEurope.php" title=""><img src="/rescources/leftpic/09.jpg" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<a href="/News/Atrcles.php" title=""><img src="/rescources/leftpic/08.gif" width="233" height="75" alt="" class="ml10" style="margin-top:10px;"/></a>
					<p class="mt10 ml10">&nbsp;&nbsp;&nbsp;<span class="fs14 c_333">Follow Us On</span>&nbsp;&nbsp;&nbsp;<a href="http://twitter.com/quickteck" target="_blank"><img src="/rescources/images/img1.gif" width="30" height="30" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com/quickteck"  target="_blank"><img src="/rescources/images/img2.gif" width="30" height="30" alt="" /></a></p>
				</div>
			</div>
		<div class="left_box_b"></div>
			
		</div>

				<div class="w710 fr mt10">
					<h3 class="title_main"><?php Lang::EchoString2($langdate['testimonial'][5]);?> </h3>
			    <div class="main_box lh2em mt10">
				<p><?php Lang::EchoString2($langdate['testimonial'][12]);?></p>
				<p><?php Lang::EchoString2($langdate['testimonial'][13]);?></p>
     			</div>
					<div class="online_from mt10">
					    <p> <span class="c_f30 lh2em">*</span><?php Lang::EchoString2($langdate['testimonial'][6]);?></p>
					<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
					  <tr>
						<td width="168" class="w_168"><span class="c_f30">*</span><?php Lang::EchoString2($langdate['testimonial'][7]);?>:</td>
						<td><input class="i_text" type="text" id="name" name="name" size="34" maxlength="50"/></td>
					  </tr>
					  <tr>
						<td class="w_168"><span class="c_f30">*</span> <?php Lang::EchoString2($langdate['testimonial'][8]);?>:</td>
						<td><input class="i_text" type="text" id="email" name="email" size="34" maxlength="150"/></td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['testimonial'][9]);?>:</td>
						<td>
							<!--<select tabindex="4" size="1" id="country" name="country" onchange="update_flag(this)">
								<option value="1" selected="selected">UK</option>
								<option value="2">France</option>
								<option value="3">Ireland</option>
								<option value="4">Germany</option>
								<option value="5">Belgium</option>
								<option value="6">Denmark</option>
								<option value="7">Netherlands</option>
								<option value="8">Spain</option>
								<option value="9">Italy</option>
								<option value="10">Portugal</option>
								<option value="11">Greece</option>
								<option value="12">Finland</option>
								<option value="13">Sweden</option>
								<option value="99">Other Countries</option>
							</select>-->
							<select tabindex="4" size="1" id="country" name="country" onchange="update_flag(this)" style="width: 250px">
								<?php 
								for($i=0; $i < count($allCountries); $i++)
								{
									echo '<option value="'.$allCountries[$i]->Id.'">'.$allCountries[$i]->ENShortName.'</option>';
								}
								?>
								<option value="999">Other countries</option>
							</select>
						&nbsp;&nbsp;<img id="img_flags" src="images/1.jpg" width="18" height="12" alt="" title="Flag" />
						</td>
					  </tr>
					  <tr>
						<td class="w_168"><?php Lang::EchoString2($langdate['testimonial'][10]);?>:</td>
						<td><input class="i_text" type="text" id="city" name="city" size="34" maxlength="60"/></td>
					  </tr>
					  <tr>
					   <td class="w_168">
							<?php Lang::EchoString2($langdate['testimonial'][11]);?>:
					</td>
						<td><textarea id="comment" name="comment"></textarea></td>
					  </tr>
					 
					</table>
					<p class="mt10 tc"><input type="submit" value="submit" class="submit_bn" name="ajouter" onclick="verif_add()"/>
					</p>
				</div>
				
				<div class="contact mt10">
					<table>
					<?php 
					for($i=0; $i < count($guestBookInfoArray); $i++)
					{
						$country = Common::GetCountryById($guestBookInfoArray[$i]->CountryId);
						$createTime = Common::ChangeDateFormat($guestBookInfoArray[$i]->CreateTime,"dateTime");
						$replyTime = Common::ChangeDateFormat($guestBookInfoArray[$i]->ReplyTime,"dateTime");
					?>
						<tr>
							<td width="168" class="w_168">
								<?php echo $createTime;?> <br/>
								<a href="#" title="" class="c_f60"><?php echo $guestBookInfoArray[$i]->ClientName;?></a> (<?php echo $guestBookInfoArray[$i]->City;?> <?php echo $country;?>)<br/>
								<img src="images/<?php echo $guestBookInfoArray[$i]->CountryId;?>.jpg" width="18" height="12" alt="" />
								<a href="#" title="" style="display:none;"><img src="/rescources/images/ico_em.gif" width="16" height="12" alt="" /></a>
							</td>
							<td>
								<p>
						<?php echo $guestBookInfoArray[$i]->ClientMessage;?>
						<?php  
						if($guestBookInfoArray[$i]->ReplyMessage){
							echo "<br /><br /><div class='reponse'><strong>Webmaster's reply</strong> : ".$guestBookInfoArray[$i]->ReplyMessage."&nbsp;&nbsp;(".$replyTime.")</div>";
						}
						?>
								</p>
							</td>
						</tr>
						<?php
						$num--;
					}
					?>
						<tr>
							<?php $pager->createPager2();?>
						</tr>
					</table>
				</div>


		</div>
	<div class="clear"></div>
</div>
<?php include '../../static/footer.php';?>
</body>
</html>