<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Anything you want us to know, pleae input them here.</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">Anything you want us to know, pleae input them here.</div>
EOF;
break;
}
?>



