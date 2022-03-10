<?php

$lang = rand(0, 1) == 0 ? 'en' : 'ru';
$day = rand(1, 7);
$arr = [
    'ru' => ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
    'en' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
];

print('day:' . $arr[$lang][$day - 1]);

//$arr_ru=$arr['ru'];
//$arr_en=$arr['en'];
//
//if($lang=='ru'){
//      foreach($arr_ru as $key => $value){
//        if(($key+1)==$day){
//         print ($value);
//        }
//     }
//  } else{
//       foreach($arr_en as $key => $value){
//       if(($key+1)==$day){
//       print ($value);
//      }
//    }
//   }
//
//?>