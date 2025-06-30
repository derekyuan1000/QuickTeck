<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Notre quantité minimum est seulement une carte. <br>
Pour une commande de plus de 200 unités, contactez-nous pour un devis de fabrication.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Our minimum quantity is just one board. <br>
If you need more than 200 units, please contact us for volume production quote.</div>
EOF;
break;
}
?>



