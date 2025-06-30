<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Il y a des restrictions de taille pour les commandes en ligne.<br>
1 à 2 couches: dimensions maximum de 500x500mm;<br>
4 à 6 couches: dimensions maximum de 400x350mm;<br>
8 couches: dimensions maximum de 350x300mm.';
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">There are maximum dimension requirements for online orders.<br>
1,2 layers: maximum dimension is 500* 500mm;<br>
4,6 layers: maximum dimension is 400*350mm;<br>
8 layers: maximum dimension is 350*300mm;
</div>
EOF;
break;
}
?>