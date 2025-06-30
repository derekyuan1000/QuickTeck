<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Les dimensions maximum pour les devis en lignes sont:<br> 
				200x300mm pour les circuits d'une épaisseur entre 0.4 et 0.8mm.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Maximum dimensions for online quote are the followings:<br>
500×500 mm for PCB&#39;s thickness over 1.0 mm,<br> 
				200×300 mm for PCB&#39;s thickness between 0.4 to 0.8 mm.</div>
EOF;
break;
}
?>

