<?php
$langdate['carousel'][33]['english']='/rescources/images/banner02.jpg'; 
$langdate['carousel'][33]['french']='/rescources/images/banner02_fr.jpg';
$langdate['carousel'][33]['dutch']='';
$langdate['carousel'][33]['spanish']='';
$langdate['carousel'][57]['english']='/rescources/images/banner04.jpg'; 
$langdate['carousel'][57]['french']='/rescources/images/banner04fr.jpg';
$langdate['carousel'][57]['dutch']='';
$langdate['carousel'][57]['spanish']='';
$langdate['carousel'][58]['english']='/rescources/images/assembly2.jpg'; 
$langdate['carousel'][58]['french']='/rescources/images/assembly2fr.jpg';
$langdate['carousel'][58]['dutch']='';
$langdate['carousel'][58]['spanish']='';
?>		
<div id="pages"></div>
<div id="carousel" class="w980 banner" style="position:static; display:none">
	<a href="/onlinequote/onlinequote.php" title=""><img src="<?php Lang::EchoString2($langdate['carousel'][33]);?>" width="980" height="170" alt="" /></a>
	<a href="/ElectronicElement/orderNow.php" title=""><img src="<?php Lang::EchoString2($langdate['carousel'][57]);?>" width="980" height="170" alt="" /></a>
	<a href="/3DPrinting/onlineQuote.php" title=""><img src="/rescources/images/offer_long.png" width="980" height="170" alt="" /></a>
	<a href="/onlinequote/assembly_quoteB.php" title=""><img src="<?php Lang::EchoString2($langdate['carousel'][58]);?>" width="980" height="170" alt="" /></a>
</div>
<input type="hidden" value="980" id="carouselWidth"/>
<input type="hidden" value="170" id="carouselHeight"/>
<input type="hidden" value="../images/" id="pagesUrl"/>