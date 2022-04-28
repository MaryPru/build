<?php
/**
 * Проверяет переданную дату на соответствие формату 'ГГГГ-ММ-ДД'
 *
 * Примеры использования:
 * is_date_valid('2019-01-01'); // true
 * is_date_valid('2016-02-29'); // true
 * is_date_valid('2019-04-31'); // false
 * is_date_valid('10.10.2010'); // false
 * is_date_valid('10/10/2010'); // false
 *
 * @param string $date Дата в виде строки
 *
 * @return bool true при совпадении с форматом 'ГГГГ-ММ-ДД', иначе false
 */
function is_date_valid(string $date) : bool {
    $format_to_check = 'Y-m-d';
    $dateTimeObj = date_create_from_format($format_to_check, $date);

    return $dateTimeObj !== false && array_sum(date_get_last_errors()) === 0;
}

/**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных
 *
 * @param $link mysqli Ресурс соединения
 * @param $sql string SQL запрос с плейсхолдерами вместо значений
 * @param array $data Данные для вставки на место плейсхолдеров
 *
 * @return mysqli_stmt Подготовленное выражение
 */
function db_get_prepare_stmt($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt === false) {
        $errorMsg = 'Не удалось инициализировать подготовленное выражение: ' . mysqli_error($link);
        die($errorMsg);
    }

    if ($data) {
        $types = '';
        $stmt_data = [];

        foreach ($data as $value) {
            $type = 's';

            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_string($value)) {
                $type = 's';
            }
            else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);

        $func = 'mysqli_stmt_bind_param';
        $func(...$values);

        if (mysqli_errno($link) > 0) {
            $errorMsg = 'Не удалось связать подготовленное выражение с параметрами: ' . mysqli_error($link);
            die($errorMsg);
        }
    }

    return $stmt;
}



/**
 * Возвращает корректную форму множественного числа
 * Ограничения: только для целых чисел
 *
 * Пример использования:
 * $remaining_minutes = 5;
 * echo "Я поставил таймер на {$remaining_minutes} " .
 *     get_noun_plural_form(
 *         $remaining_minutes,
 *         'минута',
 *         'минуты',
 *         'минут'
 *     );
 * Результат: "Я поставил таймер на 5 минут"
 *
 * @param int $number Число, по которому вычисляем форму множественного числа
 * @param string $one Форма единственного числа: яблоко, час, минута
 * @param string $two Форма множественного числа для 2, 3, 4: яблока, часа, минуты
 * @param string $many Форма множественного числа для остальных чисел
 *
 * @return string Рассчитанная форма множественнго числа
 */
function get_noun_plural_form (int $number, string $one, string $two, string $many): string
{
    $number = (int) $number;
    $mod10 = $number % 10;
    $mod100 = $number % 100;

    switch (true) {
        case ($mod100 >= 11 && $mod100 <= 20):
            return $many;

        case ($mod10 > 5):
            return $many;

        case ($mod10 === 1):
            return $one;

        case ($mod10 >= 2 && $mod10 <= 4):
            return $two;

        default:
            return $many;
    }
}

/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function include_template($name, array $data = []) {
    $name = 'templates/' . $name; //подключаем шаблон
    $result = '';

    if (!is_readable($name)) { // если файл не доступен
        return $result;   //вернуть ''
    }

    ob_start();   //включается буферизация вывода
    extract($data); //происходит импорт из массива
    require $name;  //подключает файл

    $result = ob_get_clean(); // получение текущего буфера и удаление

    return $result;   //функция возвращает значение в буфере
}
//функция подсчета количества задач в проекте
function tasks_count(&$tasks_arr, &$project_id)
{
    $count = 0;
    foreach ($tasks_arr as $key => $value) {
        $category = $value['project_id'];
        if ($category == $project_id) {
            $count = $count + 1;
        }
    }
    return $count;
}

function date_important ($date){
    $today =  strtotime(date("Ymd"));
    $search_date=strtotime($date);
    $difference=abs(($today-$search_date)/3600);


    if ($date !== "null"){
        if($difference <=24){
            return 'task--important';
        }
        return '';
    }
}

function IsProjectBD($project_Id, &$projects_arr){
    foreach ($projects_arr as $project) {
       if ($project['id'] === $project_Id) {
           return TRUE;
       }
    }
    return FALSE;
}

function getPostVal($name){
   if(isset($_POST[$name])){
        return  $_POST[$name]??'';
}
}

function validate (&$fields){
    $errors=[];
    foreach ($fields as $key=>$value){   
        if ($fields[$key]['required'] && empty($fields[$key]['val'])){
            $errors[$key]="<li>Необходимо заполнить поле{$fields[$key]['field_name']}</li>";
        }
     }
         
    return $errors;
}



function validateDate ($postDate){
    $errors=[];
    $tempDate = date("Ymd");
    $today = strtotime("$tempDate GMT");
    $date = strtotime("$postDate GMT");
      if ( $date  <$today ){
          $errors['date']="<li>Укажите правильную дату!</li>";
       }        
   return $errors;
}

    

function debug ($data){
    echo '<pre>' .print_r($data).'</pre>';
}

function load (&$fields){
    foreach($_POST as $key=>$value){
        if(array_key_exists($key, $fields)){
            $fields[$key]['val']=trim($value);
        }
    }
    return $fields;
}