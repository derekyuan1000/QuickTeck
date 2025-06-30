<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Numéro de commande: par exemple QT020441; <br>
Numéro de référence: 6  caractères se trouvant dans le courriel de confirmation de commande.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Order number: e.g. QT020441; <br>
Reference number: 6 characters in your order confirmation email.</div>
EOF;
break;
}
?>

