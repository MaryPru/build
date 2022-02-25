<?php
$pass1=strval(rand(111,999)); 
print($pass1."---pass1");
 $pass=str_split($pass1);
print('...расшифрованный пароль=');



 if($pass[1]>5){
     for($i=6; $i<=9; $i++ ){
     if($pass[1]==$i){
         $pass2=array_reverse($pass);
     }
   } 
 } 
 else {
     for($i=0; $i<=5; $i++ ){
    if($pass[1]==$i){
        $pass2[0]=$pass[1];
        $pass2[1]=$pass[2];
        $pass2[2]=$pass[0];
    }
  }
 }
echo json_encode($pass2). "--pass2";

?>
