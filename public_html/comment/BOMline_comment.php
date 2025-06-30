<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Le nombre total de pièces avec une référence unique dans votre nomenclature. Ceci est le même nombre de lignes dans votre nomenclature lorsque chaque ligne représente un numéro de pièce unique.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">The total number of the unique manufacturer part numbers in your BOM. This is the same numbers with BOM lines when each line represents a unique part number.</div>
EOF;
break;
}
?>



