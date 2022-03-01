<?php

 $arr = [
    'cms'=>['joomla', 'wordpress', 'drupal'],
    'colors'=>['blue'=>'голубой', 'red'=>'красный', 'green'=>'зеленый']
];

print($arr['cms'][0]. '  '. $arr['cms'][2]);
echo '<br/>';
print($arr['colors']['green']. '  '. $arr['colors']['red']);



?>