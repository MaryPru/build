<?php
$password = 12313213111111111111111111111111111111111111;
print(" пароль" . " " . $password . "==> ");
$pass = str_split($password);

//function first_item (&$arr){
//   $item=array_shift($arr);
//   print($item);
//  }

echo('<br/>');
print("ваш пароль==>" . " ");


//  for ($i=0;$i<count($arr_count); $i++){
//    first_item($arr);
//  }

function recursion($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        if (is_array($arr[$i])) {
            recursion($arr[$i]);
        } else {
            echo $arr[$i];
        }
    }
}

recursion($pass);


