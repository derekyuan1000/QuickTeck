<?php
$key=$_SESSION['lang'];
switch($key){
case 'french':
print<<<EOF
<div style=" ">Vous n'avez pas besoin de vous inscrire pour passer une commande. Cependant, ouvrir un compte avec Quick-teck vous permet d'accéder un contenu plus large:
<br><br>
-Sauvergarde de vos détails personnels, tels que vos adresses de livraisons;<br>
-Accès aux articles techniques réservés aux membres;<br>
-Vérification de votre historique de commande en ligne;<br>
-Vue et téléchargement de vos factures en ligne;<br>
-Collection de points et obtention de réductions sur de prochaines commandes;<br>
-Etre informé de nos offres les plus récentes.<br>
</div>
EOF;
break;
default:
print<<<EOF
<div style=" ">You don't have to register with Quick-teck to place an order. However setting up an account allows you to access more features.
<br><br>
-Saving your personal details, such as delivery addresses for future use.<br>
-Having access to members-only technical articles.<br>
-Checking history order records online.<br>
-Viewing and downloading invoice online.<br>
-Collecting points and getting discount for future use.<br>
-Keeping up to date with our latest offers.<br>
</div>
EOF;
break;
}
?>


