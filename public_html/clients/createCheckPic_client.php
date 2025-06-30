<?php
session_start(); 
Header("Content-type: image/PNG"); 

$im = imagecreate(60,20) or die("Cant's initialize new GD image stream!");
$black = ImageColorAllocate($im, 0,0,0);
$white = ImageColorAllocate($im, 255,255,255); 
$gray = ImageColorAllocate($im, 200,200,200);
imagefill($im,0,0,$gray);


$ychar="A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,1,2,3,4,5,6,7,8,9";
$list=explode(",",$ychar);
$authnum = "";
for($i=0;$i<4;$i++){
	$randnum=rand(0,34);
	$authnum.=$list[$randnum];
}
$_SESSION['authnum']=$authnum;

imagestring($im, 5, 10, 3, $authnum, $black);

for($i=0;$i<200;$i++){ 
	$randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
} 
imagePNG($im); 
imageDestroy($im);
?>
