<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Le délai de livraison est le temps écoulé entre la confirmation de la commande et son arrivée (durée de fabrication + durée d'expédition). Nous ne pouvons pas être tenus responsables pour la performance du service de livraison, mais nous offrons tout de même une garantie de livraison à nos clients. Dans les 12 derniers mois, 98,3% de nos commandes ont été livrées à temps.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Lead time is considered as the period of time between order confirmation and order arrival(manufacturing time + shipping time). 
We are not in control of the performance of the shipping service, but we do still provide the delivery warranty to our customers. 98.3% orders were delivered 
on time in the last year. <br> Check our <a target="_blank" href="/FAQ/FAQ.php#q5">delivery warranty policy</a> for more information.</div>
EOF;
break;
}
?>



