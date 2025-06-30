<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Des informations complémentaires sur votre projet de fabrication peuvent concerner: <br>
1.Matériel de support (FR4-Hg, circuit imprimé flexible, matériau RF)?<br>
2.Technologies avancées (perçages intérieures, contrôle d'impédance, barrette or, cuivre lourd)?<br>
3.Panélisation (partition en V, dimension des panneaux)?<br>
4.Rapport de test (échantillon d'une section transversale d'empilement)?<br>
5.Ajouts sur la carte (date, logo, revêtement conforme)?<br>
6.Livraison (date de livraison, différente adresse)?<br>
7.Commande mensuelle régulière?<br>
...<br>
<br>
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Any advanced information related to this manufacturing job, could be: <br>
1.Base material(FR4-Hg,flexble PCB, RF material)?<br>
2.Advanced technologies(buried/blind vias,impedance control,gold finger,heavy copper)?<br>
3.Panelization(V-scoring,panel dimension)?<br>
4.Need test record(test report,Stack up cross-section sample)?<br>
5.Additional requirment on the board(date,logo,conformal coating)?<br>
6.Delivery requirement( lead time, different address)?<br>
7.Regular monthly order?<br>
...<br>
<br>
</div>
EOF;
break;
}
?>



