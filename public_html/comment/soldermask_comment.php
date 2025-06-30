<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Le vernis épargne (solder mask) est une couche protectrice dans laquelle on fait des espacements pour les aires de soudures (comme les pads ou les boitiers) et pour les connecteurs.<br>
Le vert est la couleur ordinaire, mais d'autres couleurs sont disponibles.<br />
Si vous choisissez cette option, elle sera utilisée dans la configuration de fabrication. Par exemple, si vous sélectionnez 'non', les circuits imprimés seront fabriqués sans vernis épargne même si vous nous avez envoyés des données pour un vernis épargne. </div>
EOF;
break;
default:
print<<<EOF
<div style=" ">The solder mask(also called solder resist) is a protective covering in which clearances are made 
for solder areas(e.g. pads or pins) and for SMD connectors.<br>
Standard colour is green but other colours are available.<br />
 The option you select here will be used for the maunfacturing configuration. For example, if you select &quot;no&quot;, the PCBs will come out with &quot;no solder mask&quot; even you have sent us the solder mask data. </div>
EOF;
break;
}
?>