<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">La sérigraphie contient des informations importantes pour aider les ingénieurs à réparer et installer les pièces. <br>
Vous pouvez choisir d'avoir une sérigraphie sur une ou deux faces. La couleur standard est le blanc, mais d'autres couleurs sont disponibles. 
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">The silkscreen (also called component idents or legend) contains important information that assists engineers to service and install the parts.<br>
You can select silkcreen on one or both sides. Standard colour is white but other colours are available.
</div>
EOF;
break;
}
?>

