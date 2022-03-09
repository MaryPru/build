<?php
$data = array(
    'title'=>'Дела в порядке',
    'user'=>'Константин'
);

?>
<?php
require('./helpers.php');

$layout = include_template('layout.php',$data);

print($layout);
?>
