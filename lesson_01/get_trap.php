<?php
$Why='';
$x=0;
$y=0;
$z1=$z2=0;
$Why = $_GET["Why"];
$x = $_GET["x"];
$y = $_GET["y"];
$z1 = $_GET["z1"];



$h=sqrt($z1*$z1 -pow(($y-$x)/2,2));
$P=$x+$y+$z1+$z2;
$S=($x+$y)/2*$h;


if($x>$y || $x<0 || $y<0){
    print ("Введите корректные данные!");
}

elseif ($Why=="true" ){
     echo "S=".$S;
}
else {
    echo "P=". $P;
}
?>