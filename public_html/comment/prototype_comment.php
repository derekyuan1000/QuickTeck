<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">
Nous sommes conscients que pour la majorité des prototypes de circuits imprimés, beaucoup recherchent une QUALITÉ ACCEPTABLE au MEILLEUR PRIX. L'option économique est spécialement désignée pour cette raison et offre les mêmes délais de livraison que les autres commandes (5 à 9 jours ouvrés). <br/>
L'option économique est également intéressante pour les bricoleurs, les étudiants et les semi-professionnels qui désirent des circuits imprimés à des prix abordables.<br/><br/>
Les différences entre les commandes normales et l'option économique sont les suivantes: <br/>
1. Une encre de sérigraphie économique et des matériaux de supports de base.<br/>
2. Les tests à sondes mobiles ne concernent que 60% à 80% des circuits imprimés, et non 100% comme pour les commandes normales.<br/>
<br/>
Pour le reste, les procédés de fabrication sont les mêmes. Veuillez noter cependant que l'option économique n'est pas disponible pour toutes les commandes en ligne.
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">
We understand that for many prototyping PCBs, people like BEST POSSIBLE price with GOOD ENOUGH quality. Saving options is specifically designed to meet this marketing requirement. This option has the same lead time choices (5WDs to 9WDs) as the standard orders. <br/>
Saving option is also a good choice for hobbyists, college students, semi-professionals to make affordable PCBs.<br/><br/>
The followings are the difference on Saving option orders comparing with standard orders. <br/>
1. For these Saving option orders, economic screen printing inks, and base materials were used in the manufacturing process.<br/>
2. Flying probe tests only cover 60% to 80% PCBs for Saving option ordres, NOT 100%.<br/>
<br/>
Apart from the above, all the operation processes are the same as the standard orders. <br/>
Please note that not all online orders are allowed to choose the saving option.<br/>
</div>
EOF;
break;
}
?>
