<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Le nombre de composants à monter en surface (SMD) sur chaque carte, incluant les boitiers QFN et pièces à pas fins. Dans le cas du montage d'un boitier à billes BGA, veuillez utiliser le formulaire de devis d'assemblage  <a target="_blank" href="/assembly/assembly_quote.php">pour nous contacter</a>.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">The total number of any SMD parts on each board, this includes QFN and fine pitch parts. If you have BGA package component please contact us with <a target="_blank" href="/assembly/assembly_quote.php">assembly quote form</a>.</div>
EOF;
break;
}
?>



