<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Le poids du cuivre est utilisé pour déterminer l'épaisseur du cuivre sur chaque face de la carte. <br> 
1.0oz est l'épaisseur standard de nos feuilles de cuivre. En cas de besoins particuliers, contactez-nous pour un devis hors ligne.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Copper weight is used to specify the thickness of the copper on each layer of the board.<br> 1.0oz is our standard copper foil thickness. Any 
				special 
				requirements please contact us for off-line quote.</div>
EOF;
break;
}
?>



