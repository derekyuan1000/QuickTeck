<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Common/Common_Class.php");
$orderTime = $_SESSION['doQuote2OrderTime'];
$orderTime = Common::ChangeDateFormat($orderTime,"date");

$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Ceci est sujet à:<br>-La soumission de la commande<br>-La finalisation du paiement
<br>-Le transfert de vos fichiers et la vérification des DRC par nos ingénieurs
<br>-Tout ceci avant 
EOF;
print $orderTime." 10h30 heure anglaise.</div>";
break;
default:
print<<<EOF
<div style=" ">This is subject to:<br>-Order submitted;<br>-Payment made and accepted;<br>
-Manufacture data uploaded and passed Quick-teck DRC check;<br>All above done by 10:30am on &#32;
EOF;
print $orderTime."(UK time).</div>";
break;
}
?>