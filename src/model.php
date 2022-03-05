<?php

function searchData(&$database, $url_key)
{

    foreach ($database['pages'] as $key => $value) {// перебор из массива данных с ключом 'pages', т.е. страниц сайта
        if ($value['url_key'] == $url_key) { // если значение ключа 'url_key' (адрес страницы) совпадает с переменной адреса страницы
            return $value; // то функция возвращает этот адрес страницы
        }
    }
    return false; // иначе функция возвращает ложь
}
