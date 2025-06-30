<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" "><b>FR4 PCB:</b><br>
FR4 Tg 130 and FR4 H Tg 170 are the standard materials we used for rigid PCB substrates.<br>
<b>Aluminium PCB:</b><br>
Aluminium PCB is also called aluminum based PCB, aluminium clad PCB, Insulated Metal Substrate (IMS), metal clad PCB(MCPCB). It features a thermal clad layer that dissipates heat in a highly efficient manner. This is very common used in LED lighting, automotive and other power device designs.<br>
Thermal conductivity is the key value measuring the ability of the material to transfer heat. Quick-teck keep two types of aluminium PCB materials in stock. The standard one measured at 0.5-08W/m.K, while the other one is above 1.0W/m.K.  As a reference, a normal FR4 material is around 0.25W/m.K<br>
We also offer other type of materials (e.g. CEM-3, Polyester), feel free to contact us if you have these requirements.
</div>
EOF;
break;
default:
print<<<EOF
<div style=" "><b>FR4 PCB:</b><br>
FR4 Tg 130 and FR4 H Tg 170 are the standard materials we used for rigid PCB substrates.<br>
<b>Aluminium PCB:</b><br>
Aluminium PCB is also called aluminum based PCB, aluminium clad PCB, Insulated Metal Substrate (IMS), metal clad PCB(MCPCB). It features a thermal clad layer that dissipates heat in a highly efficient manner. This is very common used in LED lighting, automotive and other power device designs.<br>
Thermal conductivity is the key value measuring the ability of the material to transfer heat. Quick-teck keep two types of aluminium PCB materials in stock. The standard one measured at 0.5-08W/m.K, while the better one is above 1.0W/m.K. As a reference, a normal FR4 material is around 0.25W/m.K<br>
We also offer other type of materials (e.g. CEM-3, Polyester), feel free to contact us if you have these requirements.
</div>
EOF;
break;
}
?>



