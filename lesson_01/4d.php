<?php

$pass1='472';

$large=['A','B','C','D'];
$small=['a','b','c','d'];
    
if($pass1[1]>5){
    for($i=6; $i<=9; $i++ ){
    
        $pass2='$pass2'.array_rand(array_flip($large),1).array_rand(array_flip($small),1);
         echo $pass2;
         break;
  } 
} 
else {
    for($i=0; $i<=5; $i++ ){
   if($pass1[1]==$i){
    $pass2='$pass2'.array_rand(array_flip($small),1).array_rand(array_flip($large),1);
    echo $pass2;
   }
 }
}



