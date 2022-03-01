<?php

$lang='en';
$day=rand(1,7);
 $arr = [
    'ru'=>['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
    'en'=>['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
];

$arr_ru=$arr['ru'];
$arr_en=$arr['en'];

if($lang=='ru'){
      foreach($arr_ru as $key => $value){
        if(($key+1)==$day){
         print ($value);
        }
     }
  } else{
       foreach($arr_en as $key => $value){
       if(($key+1)==$day){
       print ($value);
      }
    }
   }

?>