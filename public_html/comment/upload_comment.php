<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">En cas de plusieurs fichiers, veuillez les compresser et les télécharger sous un fichier commun. Envoyez les fichiers de taille supérieure à 3Mb par courriel à info@quick-teck.co.uk.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">For more than one file, please zip the various files and upload them under one file. <br>If the file is 
				bigger than 3Mb, please send us your file to info@quick-teck.co.uk .</div>
EOF;
break;
}
?>

