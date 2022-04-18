<?php

$con =  mysqli_connect('localhost','root','','mydeal');

if($con==false){
    print("Ошибка" .mysqli_connect_error());
}
else{
    // print("Соединение установлено");
}

mysqli_set_charset($con,"utf8");

$sql =( "SELECT  `login` FROM `users` WHERE id=2");
$result=mysqli_query($con,$sql);
if(!$result){
    $error=mysqli_error($con);
    print("Ошибка MYSQL".$error);
    }
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = ("SELECT  * FROM projects ");
$result=mysqli_query($con,$sql);
$projects_arr = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT t.name as task_name, t.date, t.completed, t.project_id, p.name as project_name, p.id FROM `tasks` t JOIN `projects` p ON t.project_id = p.id WHERE t.user_id=2 ";
$result=mysqli_query($con,$sql);
if(!$result){
$error=mysqli_error($con);
print("Ошибка MYSQL".$error);
}

$tasks_arr=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<?php

require('./helpers.php');

$show_complete_tasks = rand(0, 1);

$main=include_template('main.php',[
    'tasks_arr'=>$tasks_arr,
    'projects_arr'=>$projects_arr,
    'show_complete_tasks'=>$show_complete_tasks
]);


$user=  $users[0]['login'] ;

$data=array(
    'main'=>$main,
    'title' => 'Дела в порядке', 
    'user'=>$user
);
$layout = include_template('layout.php',$data);

print($layout);

?>

