<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Si vous nous avez déjà passé la même commande dans les 12 derniers mois, sélectionnez 'Oui'. Nous ne facturons pas les coûts d'outillage pour les renouvellements de commande.<br>
N'oubliez pas de remplir le 'Numéro de Commande' avec celui de votre dernière commande, afin que ceci ne soit pas considérée comme une nouvelle commande.
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">If you have ordered this design from us in the last twelve months please select "Yes".We don't charge the tooling cost for repeat orders.<br>
The previous order number should be input in "Order Number" area, otherwise it will be treated as a new order. 
</div>
EOF;
break;
}
?>


