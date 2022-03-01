<?php
$password=12313213111111111111111111111111111111111111;
print(" пароль". " ". $password."==> ");
 $arr=str_split($password);
$arr_count=$arr;


function first_item (&$arr){
   $item=array_shift($arr);
   print($item);
  }

     echo('<br/>');
     print("ваш пароль==>"." ");


  for ($i=0;$i<count($arr_count); $i++){
    first_item($arr);
  }


?>