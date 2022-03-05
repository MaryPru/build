<?php

if ($_SERVER['SCRIPT_NAME']=='/index.php'){ //проверка сервером на ожидаемый путь в адресной строке
    printPage('/index.php', $database);

}elseif ($_SERVER['SCRIPT_NAME']=='/bytovka.php'){
    printPage('/bytovka.php', $database);

}elseif ($_SERVER['SCRIPT_NAME']=='/catalog.php'){
    printPage('/catalog.php', $database);

}elseif ($_SERVER['SCRIPT_NAME']=='/contacts.php') {
    printPage('/catalog.php', $database);

}

//функция подключения базы двнных со страницей сайта
function printPage($url_key, &$database){ // функция принимает на входе 2 переменные (ключ адресной страницы и саму базу данных)
    $data=searchData($database, '/index.php'); // переменной data присваивается массив данных, получаемые из функции поиска данных
    if(!empty($data)&& file_exists(PATH_TPL . $data['tpl'])){ // если переменная data не пуста и файл содержит шаблон страницы и данные для этой страницы,
        include_once (PATH_TPL. $data['tpl']);// то подключается этот файл
    } else {
        die('в базе данных нет данных для вызываемой страницы'); // иначе выводится сообщение об ошибке
    }
};