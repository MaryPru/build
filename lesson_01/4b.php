<?php
$password=rand(000001,999999);
print("рaндомный пароль". " ". $password."==> ");
 $arr=str_split($password);
print_r(str_split($password));
print("ваш пароль==>"." ");

for($j=0;$j<6;$j++){
     for($i=0; $i<1000000; $i++ ){
       if($arr[$j] == $i){
           print($i); 
      }
   }
}
  
?>
   
  
 
 