<?php
// $price=strval(11212);
$price=rand(11111,99999);
$arr=str_split($price);
$kop = array_slice($arr, -2, 2);
$rub = array_slice($arr, 0, -2); 
$lastrub=end($rub);
$lastkop=end($kop);
$rub_dec=array_slice($rub,-2,2);
$rub_dec_str=implode('',$rub_dec);
$kop_dec=implode('',$kop);
$number='';


    $r = ['рубль', 'рубля', 'рублей'];
    $k = ['копейка', 'копейки', 'копеек'];   


echo json_encode($arr)."arr";
echo "<br>\n";
echo json_encode($rub)."rub";
echo "<br>\n";
echo json_encode($kop)."kop";
echo "<br>\n";
echo json_encode($lastrub)."lastrub";
echo "<br>\n";
echo json_encode($lastkop)."lastkop";
echo "<br>\n";

switch (count($rub)==1) {
    case ($lastrub==1):
         $new_price_rub=[implode('',$rub),$r[0]];
        break;
    case ($lastrub<5 && $lastrub>1 ):
          $new_price_rub=[implode('',$rub),$r[1]];
        break;
    default:
      $new_price_rub=[implode('',$rub),$r[2]];
        break;
}

if(count($rub)==2 && ($rub_dec_str>=11 && $rub_dec_str<=19)) {
         $new_price_rub=[implode('',$rub),$r[2]];
}
elseif ($lastrub<5 && $lastrub>1 ) {
          $new_price_rub=[implode('',$rub),$r[1] ];
    }
    elseif ($lastrub==1) {
    $new_price_rub=[implode('',$rub),$r[0]];
    }
    else {
    $new_price_rub=[implode('',$rub),$r[2]];
    }



if( $lastkop==1  ) {
    $new_price_kop=[implode('',$kop),$k[0]]; 
} 

elseif ($kop_dec>=11 && $kop_dec<=19 ) {
     $new_price_kop=[implode('',$kop),$k[2] ];
}
elseif ($lastkop<5 && $lastkop>1 ) {
     $new_price_kop=[implode('',$kop),$k[1] ]; 
}

else{
    $new_price_kop=[implode('',$kop),$k[2]]; 
}



for($i=0; $i<count($arr);$i++){
    $number.=$arr[$i];
}

print($number);
echo "<br>\n";
var_dump($number);
echo "<br>\n";
$num=$number/100;
var_dump($num);
echo "<br>\n";

$percent13=$num*13/100; ;
$new_price=$num+$percent13;

print(implode(" ", $new_price_rub )); 
print(' ');
print(implode(" ", $new_price_kop ));
echo "<br>\n";
print(implode('',$rub).'.'.implode('',$kop) .' руб');
echo "<br>\n";
print(round($new_price,2)." руб"." "." new_price + 13%");


