<?php


$Ivanov=[
[126,-131,345345,456476,-342],
[126,-131,-345345,456476,-342]
];

$Petrov=[
[-12,-131,345345,456476,-342],
[-12,-131,345345,-456476,-342],
];

$Sidorov=[
[12,4476,22888,-3492,-445],
[2222,465,345345,456476,-342]
];

$Semenov=[
[-12,-131,242,415,-342],
[12,4476,22888,-3492,-445],
];

$Golubev=[
[2222,465,345345,456476,-342],
[-12,-131,345345,456476,-342],
];


function get_sum($arr) {
    $sum = 0;
    foreach($arr as $elem)
        $sum += $elem;
    return $sum;
}

function result_sum($array){
$rez=0;
 foreach($array as $elem)
     $rez+=get_sum($elem);
  return $rez;
}




print (result_sum($Ivanov)) ; print('--Баланс Иванова');
echo '<br/>';
print (result_sum($Petrov));print('--Баланс Петрова');
echo '<br/>';
print (result_sum($Sidorov));print('--Баланс Сидорова');
echo '<br/>';
print (result_sum($Semenov));print('--Баланс Семенова');
echo '<br/>';
print (result_sum($Golubev));print('--Баланс Голубева');
echo '<br/>';

$balans[]=(result_sum($Ivanov));
$balans[]=(result_sum($Petrov));
$balans[]=(result_sum($Sidorov));
$balans[]=(result_sum($Semenov));
$balans[]=(result_sum($Golubev));
[$Ivanov,$Petrov, $Sidorov, $Semenov, $Golubev]=$balans;
print_r($balans);
sort($balans);
echo '<br/>';
print_r($balans);


foreach($balans as $key=>$value){
echo '<br/>';
echo  'у '. ($key+1).'  '.'человека  '.$value. '  сумма денег';
}

?>