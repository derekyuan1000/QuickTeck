<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Une variété de finitions peuvent être appliquées ici. N'hésitez pas à nous contacter en cas d'exigences particulières.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">A range of surface finishes can be applied here. Feel free to contact us if you have special requirements.</div>
EOF;
break;
}
?>




