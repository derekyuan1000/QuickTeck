<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Management/Models/EEShoppingCarItem_Class.php");


if(!empty($_SESSION[EEShoppingCar])){
	$shoppingCar = unserialize($_SESSION[EEShoppingCar]);
	$totalPrice = 0;
	foreach ($shoppingCar as $eeId_c => $shoppingCarItem_c) { 
		$totalPrice = $totalPrice + $shoppingCarItem_c->Total;
	}
}

?>
<p class="w_169">
	<a style="font-weight:bold" href="shoppingCar.php">Components cart: 
		<span style="color: Red;"><?php echo "&pound;".sprintf("%01.2f", $totalPrice); ?></span>
		(<?php echo count($shoppingCar) ?> Item<?php if(count($shoppingCar)>1){echo "s";} ?>)
	</a>
</p>
<p style="padding-top:2px;" class="w_169">
	<a style="10px;text-decoration:underline"  href="../order/checkout.php" onclick="return confirm('Please make sure you have finished your components shopping and ready to Checkout.')">Go to checkout </a>
</p>       