<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Entrez le code du bon de réduction le cas échéant. Ceci sera utilisé pour calculer le prix de votre commande.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Please provide voucher code here if you have. This will be used to calculated your order price.</div>
EOF;
break;
}
?>