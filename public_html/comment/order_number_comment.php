<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Si vous n'avez pas encore de numéro de commande avec nous, remplissez la case avec ''QT0099T''<br>
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Please input "QT0099T" , if you have not got formal order number from us.<br>
</div>
EOF;
break;
}
?>



