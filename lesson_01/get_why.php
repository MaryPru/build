<?php
$Why='';
$Why = $_GET["Why"];
$x=3;
$y=10;
$z1=$z2=4;
$h=4;
$P=$x+$y+$z1+$z2;
$S=($x+$y)/2*$h;

if ($Why=="true" ){
     echo "S=".$S;
}
else {
    echo "P=". $P;
}
?>