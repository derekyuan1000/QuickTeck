<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Le délai d'assemblage est le temps compris entre le commencement du travail d'assemblage et la fin des tests de qualité. La durée d'expédition n'est pas comprise. Vous pouvez trouver plus d'informations sur le délai d'assemblage  <a target="_blank" href="/FAQ/FAQ.php#PCB_Assembly_007"  style="color:red;" onclick="CloseDialog();">ici</a>.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Assembly lead time is considered as the total time between assembly job start and quality check finished. Shipping time is not included. More information about assembly lead time can be found <a target="_blank" href="/FAQ/FAQ.php#PCB_Assembly_007"  style="color:red;" onclick="CloseDialog();">here</a>.</div>
EOF;
break;
}
?>



