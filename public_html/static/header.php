<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/lang/LauageService.php';
include_once($_SERVER['DOCUMENT_ROOT']."/Management/DAL/ClientService_Class.php");
$clientService = new ClientService();
$langdate['header'][0]['english']='Home';
$langdate['header'][0]['french']='Accueil';
$langdate['header'][0]['dutch']='';
$langdate['header'][0]['spanish']='';
$langdate['header'][1]['english']='About us';
$langdate['header'][1]['french']='A propos de nous';
$langdate['header'][1]['dutch']='';
$langdate['header'][1]['spanish']='';
$langdate['header'][2]['english']='Who we are';
$langdate['header'][2]['french']='Qui sommes-nous?';
$langdate['header'][2]['dutch']='';
$langdate['header'][2]['spanish']='';
$langdate['header'][3]['english']='Why choose us';
$langdate['header'][3]['french']='Pourquoi nous choisir?';
$langdate['header'][3]['dutch']='';
$langdate['header'][3]['spanish']='';
$langdate['header'][4]['english']='Technical capability';
$langdate['header'][4]['french']='Capacités techniques';
$langdate['header'][4]['dutch']='';
$langdate['header'][4]['spanish']='';
$langdate['header'][5]['english']='Product gallery';
$langdate['header'][5]['french']='Répertoire de produits';
$langdate['header'][5]['dutch']='';
$langdate['header'][5]['spanish']='';
$langdate['header'][6]['english']='Online quote';
$langdate['header'][6]['french']='Devis en ligne';
$langdate['header'][6]['dutch']='';
$langdate['header'][6]['spanish']='';
$langdate['header'][7]['english']='PCB Manufacture';
$langdate['header'][7]['french']='Devis de fabrication';
$langdate['header'][7]['dutch']='';
$langdate['header'][7]['spanish']='';
$langdate['header'][8]['english']='PCB Assembly';
$langdate['header'][8]['french']='Devis d\'assemblage';
$langdate['header'][8]['dutch']='';
$langdate['header'][8]['spanish']='';
$langdate['header'][9]['english']='Forum';
$langdate['header'][9]['french']='Forum';
$langdate['header'][9]['dutch']='';
$langdate['header'][9]['spanish']='';
$langdate['header'][10]['english']='Order now';
$langdate['header'][10]['french']='Passer une commande';
$langdate['header'][10]['dutch']='';
$langdate['header'][10]['spanish']='';
$langdate['header'][11]['english']='Services';
$langdate['header'][11]['french']='Services';
$langdate['header'][11]['dutch']='';
$langdate['header'][11]['spanish']='';
$langdate['header'][12]['english']='Laser stencil';
$langdate['header'][12]['french']='Pochoirs découpés au laser';
$langdate['header'][12]['dutch']='';
$langdate['header'][12]['spanish']='';
$langdate['header'][13]['english']='PCB assembly';
$langdate['header'][13]['french']='Assemblage de circuits imprimés';
$langdate['header'][13]['dutch']='';
$langdate['header'][13]['spanish']='';
$langdate['header'][14]['english']='Component sourcing';
$langdate['header'][14]['french']='Recherche de composants';
$langdate['header'][14]['dutch']='';
$langdate['header'][14]['spanish']='';
$langdate['header'][15]['english']='Electronic design';
$langdate['header'][15]['french']='Conception électronique';
$langdate['header'][15]['dutch']='';
$langdate['header'][15]['spanish']='';
$langdate['header'][16]['english']='Order tracking';
$langdate['header'][16]['french']='Suivi de commande';
$langdate['header'][16]['dutch']='';
$langdate['header'][16]['spanish']='';
$langdate['header'][17]['english']="FAQ's";
$langdate['header'][17]['french']="FAQ";
$langdate['header'][17]['dutch']="";
$langdate['header'][17]['spanish']="";
$langdate['header'][18]['english']='Contact us';
$langdate['header'][18]['french']='Contacts';
$langdate['header'][18]['dutch']='';
$langdate['header'][18]['spanish']='';
$langdate['header'][19]['english']='Contact form';
$langdate['header'][19]['french']='Formulaire de contact';
$langdate['header'][19]['dutch']='';
$langdate['header'][19]['spanish']='';
$langdate['header'][20]['english']='Testimonial';
$langdate['header'][20]['french']='Témoignage';
$langdate['header'][20]['dutch']='';
$langdate['header'][20]['spanish']='';
$langdate['header'][21]['english']='Your Account';
$langdate['header'][21]['french']='Mon Compte';
$langdate['header'][21]['dutch']='';
$langdate['header'][21]['spanish']='';
$langdate['header'][22]['english']='Register';
$langdate['header'][22]['french']='S\'inscrire';
$langdate['header'][22]['dutch']='';
$langdate['header'][22]['spanish']='';
$langdate['header'][23]['english']='Login';
$langdate['header'][23]['french']='Se connecter';
$langdate['header'][23]['dutch']='';
$langdate['header'][23]['spanish']='';
$langdate['header'][24]['english']='Pre-production review';
$langdate['header'][24]['french']='Examen indépendant du design';
$langdate['header'][24]['dutch']='';
$langdate['header'][24]['spanish']='';
$langdate['header'][25]['english']='Printed circuit board';
$langdate['header'][25]['french']='Circuits imprimés';
$langdate['header'][25]['dutch']='';
$langdate['header'][25]['spanish']='';
$langdate['header'][26]['english']='Electronic component';
$langdate['header'][26]['french']='Composants électroniques';
$langdate['header'][26]['dutch']='';
$langdate['header'][26]['spanish']='';
?>
<div id="head">
	<h1><a href="/" title=""><img src="/rescources/images/logo.png" width="175" height="85" alt="" /></a></h1>
	<h1><a href="/" title=""><img src="/rescources/images/QT_header.png" width="260" height="40" alt="" style="margin-top:30px;margin-left:80px" /></a></h1>
	<div class="toplogin">
		<div class="toplogin_top clearbox">
			<h3><?php Lang::EchoString2($langdate['header'][21]);?></h3>
			<div class="language">
				<h4>Language</h4>
				<div class="language_list clearbox">
					<ul >
						<li><a href="/lang/ChangeLang.php?lang=english" title=""><img src="/rescources/images/en_gq.png" alt="" />&nbsp;&nbsp;English</a></li>
						<li><a href="/lang/ChangeLang.php?lang=french" title=""><img src="/rescources/images/fr_gq.png" alt="" />&nbsp;&nbsp;French</a></li>
						<li style="display:none;"><a href="/lang/ChangeLang.php?lang=dutch" title=""><img src="/rescources/images/du_gq.png" alt="" />&nbsp;&nbsp;Dutch</a></li>
						<li  style="display:none;"><a href="/lang/ChangeLang.php?lang=spanish" title=""><img src="/rescources/images/sp_gq.png" alt="" />&nbsp;&nbsp;Spanish</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="toplogin_con">
		<?php 
		if(!empty($_SESSION['currentClient']))
		{
			$currentClient = $clientService->GetClientByLoginId($_SESSION['currentClient']);
			echo 'Welcome '.$currentClient->LoginId;
		?>
		<a href="/clients/clientMain.php" style="text-decoration:underline;color:black">My Quick-teck</a>
		&nbsp;<a href="/clients/doLogout_client.php" style="text-decoration:underline;color:black">Logout</a>
		<?php 
		}
		else 
		{
		?>
			<form name="form1" method="post" action="/clients/doLogin_client.php">
			<input id="returnPage" name="returnPage" type="hidden" />
			<input type="text" class="toplogin_txt"  name="loginId_header" />
			<input type="password" class="toplogin_txt" name="password_header"/>
			<input type="submit" value="<?php Lang::EchoString2($langdate['header'][23]);?>" class="toplogin_btn" name="Submit"/><a href="/clients/register_newClient.php" title="" class="c_f60 tu"><?php Lang::EchoString2($langdate['header'][22]);?></a>
			</form>
		<?php 
		}
		?>
		</div>
<!--
		<div class="toplogin_con2">
				Welcome to Quick-teck!&nbsp;&nbsp;<a href="#" title="" class="c_f60">admin123</a>&nbsp;&nbsp;<a href="#" title="" class="c_f60 tu">Logout</a>
		</div>
-->
	</div>
</div>
<div class="nav clearbox">
	<ul >
		<li ><a href="/index.php" title="" class="nav01 nav_a"><?php Lang::EchoString2($langdate['header'][0]);?></a></li>
		<li><a href="#" title="" class="nav02 nav_a <?php Lang::SetLines();?>"><?php Lang::EchoString2($langdate['header'][1]);?></a><i></i>
			<div class="navlist">
				<p><a href="/aboutus/aboutus.php" title=""><?php Lang::EchoString2($langdate['header'][2]);?></a></p>
				<p><a href="/aboutus/why_us.php" title=""><?php Lang::EchoString2($langdate['header'][3]);?></a></p>
				<p><a href="/aboutus/capability.php" title=""><?php Lang::EchoString2($langdate['header'][4]);?></a></p>
				<p><a href="/aboutus/pcb_samples.php" title=""><?php Lang::EchoString2($langdate['header'][5]);?></a></p>
			</div>
		</li>
		<li><a href="#" title="" class="nav03 nav_a"><?php Lang::EchoString2($langdate['header'][6]);?></a><i></i>
			<div class="navlist">
				<p><a href="/onlinequote/onlinequote.php" title=""><?php Lang::EchoString2($langdate['header'][7]);?></a></p>
				<p><a href="/onlinequote/assembly_quoteB.php" title=""><?php Lang::EchoString2($langdate['header'][8]);?></a></p>
			</div>
		</li>
		<li><a href="#" title="" class="nav05 nav_a <?php Lang::SetLines();?>"><?php Lang::EchoString2($langdate['header'][10]);?></a><i></i>
		<div class="navlist">
			<p><a href="<?php echo empty($_SESSION['currentClient'])?"/clients/selectTakeOrderType.php":"/order/takeorder.php?isLogin=yes";?>" title=""><?php Lang::EchoString2($langdate['header'][25]);?></a></p>
				<p><a href="/ElectronicElement/orderNow.php" title=""><?php Lang::EchoString2($langdate['header'][26]);?></a></p>
				</div>
		</li>
		<li><a href="#" title="" class="nav06 nav_a <?php Lang::SetLines();?>"><?php Lang::EchoString2($langdate['header'][11]);?></a><i></i>
			<div class="navlist">
				<p><a href="/design/design_quote.php" title=""><?php Lang::EchoString2($langdate['header'][15]);?></a></p>
				<p><a href="/stencil/buy_stencil.php" title=""><?php Lang::EchoString2($langdate['header'][12]);?></a></p>
				<p><a href="/assembly/assembly_quote.php" title=""><?php Lang::EchoString2($langdate['header'][13]);?></a></p>
				<p><a href="/component/component.php" title=""><?php Lang::EchoString2($langdate['header'][14]);?></a></p>
				<p><a href="/review/review.php" title=""><?php Lang::EchoString2($langdate['header'][24]);?></a></p>
			</div>
		</li>
		<li><a href="/trackingorder/trackingorder.php" title="" class="nav07 nav_a <?php Lang::SetLines();?>"><?php Lang::EchoString2($langdate['header'][16]);?></a></li>
		<!--<li><a href="/forum/index.php" title="" class="nav04 nav_a " target="_blank"><?php Lang::EchoString2($langdate['header'][9]);?></a></li>-->
		<li><a href="/FAQ/FAQ.php" title="" class="nav04 nav_a"><?php Lang::EchoString2($langdate['header'][17]);?></a></li>
		<li><a href="/contactus/contactus.php" title="" class="nav05 nav_a"><?php Lang::EchoString2($langdate['header'][18]);?></a><!--<i></i>-->
			<!--<div class="navlist" style="margin-left:-25px;">
				<p><a href="/contactus/contactus.php" title=""><?php Lang::EchoString2($langdate['header'][19]);?></a></p>
				<p><a href="/contactus/testimonial/index.php" title=""><?php Lang::EchoString2($langdate['header'][20]);?></a></p>
			</div>-->
		</li>
		<li><a href="/contactus/testimonial/index.php" title="" class="nav02 nav_a"><?php Lang::EchoString2($langdate['header'][20]);?></a></li>
	</ul>
</div>
