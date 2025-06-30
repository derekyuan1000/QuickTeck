<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Entrez votre numéro européen de TVA ici pour que la TVA britannique ne soit pas appliquée à votre commande.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Please provide your EU VAT number here, then we will not charge UK VAT.</div>
EOF;
break;
}
?>

