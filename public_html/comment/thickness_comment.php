<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Pour toutes exigences autres que celles listées, merci de nous contacter pour un devis hors ligne. <br>
Nous avons la possibilité de fabriquer des circuits imprimés d'une épaisseur entre 0.4mm et 3.2mm. Pour les commandes de circuits imprimés ordinaire nous utilisons une épaisseur de 1.6mm.  </div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Any other special requirements beyond these listed, please contact us for off-line quote.<br>
We can make PCBs from 0.4mm to 3.2mm thickness.	And 1.6mm is used for these standard PCB orders. </div>
EOF;
break;
}
?>




