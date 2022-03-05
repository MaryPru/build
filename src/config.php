<?php

define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);
const PATH_SRC = ROOT_PATH . '/src/';
const PATH_TPL = ROOT_PATH . '/templates/';

$baseFiles=[]; // массив файлов ядра, которые нужно подключать в программе

$baseFiles[]=PATH_SRC . 'database.php';//в этом файле хранятся контентные данные для страниц
$baseFiles[]=PATH_SRC . 'model.php';//файл с функциями для поиска нужной информации в database
$baseFiles[]=PATH_SRC . 'controller.php';//файл реализует логику связи данных и шаблонов

//подключение всех файлов

foreach ($baseFiles as $key=>$value){
    include_once ($value);
}
