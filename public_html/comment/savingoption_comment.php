<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<div style=" ">
Sélectionnez cette option pour faire des économies sur les commandes non-urgentes.<br> 
Le délai de livraison sera étendu de 15 à 20 jours ouvrés. Quick-teck a pour ambition de délivrer 99% des commandes options économiques dans les 20 jours ouvrés suivants.<br>
Veuillez noter que la <a target="_blank" href="/FAQ/FAQ.php#q5">garantie de livraison ne s'applique</a>  pas aux commandes option économiques.<br>
</div>
EOF;
break;
default:
print<<<EOF
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<div style=" ">
Choose this 
option for these not time-critical orders to saving your money.<br> The delivery date 
could be any working days between 15 to 20. Quick-teck aim to meet 99% saving 
option orders delivered in 20 working days. <br>
Please be aware <a target="_blank" href="/FAQ/FAQ.php#q5">delivery warranty policy</a> don&#39;t apply to saving option order.<br>
</div>
EOF;
break;
}
?>


