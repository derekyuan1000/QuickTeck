<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Vous pouvez trouver plus d'informations sur les pochoirs découpés au laser <a target="_blank" href="/stencil/buy_stencil.php" style="color:red;" onclick="CloseDialog();">ici</a>.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">More information about laser stencil can be found <a target="_blank" href="/stencil/buy_stencil.php" style="color:red;" onclick="CloseDialog();">here</a>.</div>
EOF;
break;
}
?>



