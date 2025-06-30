<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Utilisez cet espace pour toute information supplémentaire concernant cette commande, par exemple votre numéro de référence, une adresse de facturation différente, une couleur spécifique de vernis épargne...</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Please enter here if you want to send us any additional information regarding to this order. 
				e.g., your reference number, different billing address, un-standard solder mask colour(no additional charges if the total size is less than 1.0 sqm).</div>
EOF;
break;
}
?>



