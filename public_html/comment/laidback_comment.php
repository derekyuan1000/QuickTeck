<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">
Choisissez cette option pour les commandes qui ne sont pas urgentes pour obtenir le meilleur prix possible.<br>
La date de livraison peut être entre 12 et 16 jours après la commande. Quick-teck a pour but de livrer 99% des commandes Laid-back Price dans les 16 jours.<br>
Notez que la garantie de livraison ne s'applique pas aux commandes Laid-back Price.<br>
</div>
EOF;
break;
default:
print<<<EOF
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<div style=" ">
Choose this 
option for these not time-critical orders to get the best possible price.<br>
 The delivery date 
can be any working days between 12 to 16. Quick-teck aim to meet 99% Laid-back Price orders delivered in 16 working days. <br>
Please be aware <a target="_blank" href="/FAQ/FAQ.php#q5">delivery warranty policy</a> don&#39;t apply to Laid-back Price order.<br>
</div>
EOF;
break;
}
?>

