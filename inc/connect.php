<?php
$con = mysqli_connect('localhost','root','','mydeal');

if($con==false){
    print("Ошибка" .mysqli_connect_error());
}
else{
    // print("Соединение установлено");
}