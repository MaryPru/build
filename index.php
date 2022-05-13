<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'mydeal');

if ($con == false) {
    print("Ошибка" . mysqli_connect_error());
} else {
    // print("Соединение установлено");
}

mysqli_set_charset($con, "utf8");
$isAuth = isset($_SESSION['user_active']) ? TRUE : FALSE;

if ($isAuth == true) {
    $user_id = $_SESSION['user_active']['id'];
    $sql = ("SELECT  login FROM `users` WHERE id=$user_id");
    $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MYSQL" . $error);
    }
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = ("SELECT  * FROM projects ");
    $result = mysqli_query($con, $sql);
    $projects_arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $user_active = $_SESSION['user_active']['login'];

    $sql = "SELECT t.name as task_name, t.id as task_id,t.date,t.file, t.completed, t.project_id, p.name as project_name, p.id FROM `tasks` t JOIN `projects` p ON t.project_id = p.id WHERE t.user_id=$user_id";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MYSQL" . $error);
    }

    $tasks_arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<?php

require('./helpers.php');

$show_complete_tasks = rand(0, 1);
$quest = include_template('guest.php');

$data = array(
    'main' => $quest,
    'title' => 'Дела в порядке',
    'isAuth' => $isAuth,
    'user_active' => null
);

if ($isAuth == true) {
    $main = include_template('main.php', [
        'tasks_arr' => $tasks_arr,
        'projects_arr' => $projects_arr,
        'show_complete_tasks' => $show_complete_tasks
    ]);

    $data = array(
        'main' => $main,
        'title' => 'Дела в порядке',
        'isAuth' => $isAuth,
        'user_active' => $user_active
    );
}
$search = $_GET['search'] ?? '';
if($search!==''){
    $tasks=[];

    mysqli_query($con, 'CREATE FULLTEXT INDEX task_ft_search ON tasks(name)');

    $sql="SELECT t.name as task_name, t.date,t.file, t.completed, t.project_id, p.name as project_name, p.id FROM `tasks` t JOIN `projects` p ON t.project_id = p.id AND t.user_id=$user_id  WHERE MATCH (t.name) AGAINST(?)";

    $stmt=db_get_prepare_stmt($con, $sql, [$search]);
    mysqli_stmt_execute($stmt);
    $res=mysqli_stmt_get_result($stmt);
    $tasks=mysqli_fetch_all($res, MYSQLI_ASSOC);


    $main = include_template('search.php', [
        'tasks_arr' => $tasks,
        'projects_arr' => $projects_arr,
        'show_complete_tasks' => $show_complete_tasks,
    ]);
    $data = array(
        'main' => $main,
        'title' => 'Дела в порядке',
        'isAuth' => $isAuth,
        'user_active' => $user_active
    );
}



$layout = include_template('layout.php', $data);


print($layout);
?>

