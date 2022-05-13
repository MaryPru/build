<?php
$con = mysqli_connect('localhost','root','','mydeal');

if($con==false){
    print("Ошибка" .mysqli_connect_error());
}
else{
    // print("Соединение установлено");
}

$search = $_GET['search'] ?? '';

$date = " ";
if (isset($_GET['date']) && !empty($_GET['date'])) {   
    $date = $_GET['date'];
  print($date);
if($date=='today'){
    $sql="SELECT t.name as task_name ,t.id as task_id, t.date , t.file, t.completed, t.project_id, p.name as project_name, p.id FROM `tasks` t JOIN `projects` p ON t.project_id = p.id AND t.user_id=1  WHERE  t.date =  CURRENT_DATE()";

    $stmt=db_get_prepare_stmt($con, $sql);
    mysqli_stmt_execute($stmt);
    $res=mysqli_stmt_get_result($stmt);
    $tasks_arr=mysqli_fetch_all($res, MYSQLI_ASSOC);
//     echo "<pre>";
//     print_r( $tasks_arr );
//  echo "</pre>";
}

if($date=='tomorrow'){
    $sql="SELECT t.name as task_name,t.id as task_id, t.date , t.file, t.completed, t.project_id, p.name as project_name, p.id FROM `tasks` t JOIN `projects` p ON t.project_id = p.id AND t.user_id=1  WHERE  t.date =  CURRENT_DATE()+1";

    $stmt=db_get_prepare_stmt($con, $sql);
    mysqli_stmt_execute($stmt);
    $res=mysqli_stmt_get_result($stmt);
    $tasks_arr=mysqli_fetch_all($res, MYSQLI_ASSOC);
//     echo "<pre>";
//     print_r($tasks_arr );
//  echo "</pre>";
}
if($date=='late'){
    $sql="SELECT t.name as task_name,t.id as task_id, t.date , t.file, t.completed, t.project_id, p.name as project_name, p.id FROM `tasks` t JOIN `projects` p ON t.project_id = p.id AND t.user_id=1 WHERE  t.date <  CURRENT_DATE() ";
    $stmt=db_get_prepare_stmt($con, $sql);
    mysqli_stmt_execute($stmt);
    $res=mysqli_stmt_get_result($stmt);
    $tasks_arr=mysqli_fetch_all($res, MYSQLI_ASSOC);
//     echo "<pre>";
//     print_r( $tasks_arr );
//  echo "</pre>";
} 
}


?>


<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <?php foreach ($projects_arr as $key => $value) : ?>
                    <?php $project_id = $value['id'];
                    $project_name = $value['name'];
                    $project = $value; ?>
                    <li class="main-navigation__list-item <?php if (isset($_GET['project']) && $_GET['project'] == $project_id) echo 'main-navigation__list-item--active'; ?>">
                        <a class="main-navigation__list-item-link"
                           href="/?project=<?= $project_id ?>"><?= $project_name; ?></a>
                        <span
                            class="main-navigation__list-item-count"><?= tasks_count($tasks_arr, $project_id); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button"
           href="/templates/add-project.php" target="project_add">Добавить проект</a>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="get" autocomplete="off">
            <input class="search-form__input" type="text" name="search" value="<?=trim($search)?>" placeholder="Поиск по задачам">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <nav class="tasks-switch">
                <a href="/" class="tasks-switch__item <?php if ((isset($_GET['date']) && $_GET['date'] == ' ') ||  (empty($_GET)))  echo 'tasks-switch__item--active'; ?>">Все задачи</a>
                <a href="/?date=today" class="tasks-switch__item <?php if (isset($_GET['date']) && $_GET['date'] == 'today') echo 'tasks-switch__item--active'; ?>">Повестка дня</a>
                <a href="/?date=tomorrow" class="tasks-switch__item <?php if (isset($_GET['date']) && $_GET['date'] == 'tomorrow') echo 'tasks-switch__item--active'; ?>">Завтра</a>
                <a href="/?date=late" class="tasks-switch__item <?php if (isset($_GET['date']) && $_GET['date'] == 'late') echo 'tasks-switch__item--active'; ?>">Просроченные</a>
            </nav>

            <label class="checkbox">

                <input class="checkbox__input visually-hidden show_completed" <?php
                if ($show_complete_tasks == 1) {
                    echo "checked";
                } else {
                    echo "";
                }
                ?> type="checkbox">
                <span class="checkbox__text">Показывать выполненные</span>
            </label>
        </div>
        <form method="POST" >
        <table class="tasks">

            <?php


            if (isset($_GET['project'])) {
                $activeProjectId = $_GET['project'];
                $projectActive = TRUE;

            } else {
                $projectActive = FALSE;
            }


            if ($projectActive && !IsProjectBD($activeProjectId, $projects_arr)) {
                print('404');
            } else {
                foreach ($tasks_arr as $task) {
                    $project_id = $task['project_id'];
                    $task_id = $task['task_id'];
                    $task_name = $task['task_name'];
                    $task_date = $task['date'];
                    $task_completed = $task['completed'];
                    $task_file = $task['file'];

                    if ($projectActive && $activeProjectId !== $project_id) {
                        continue;
                    }
                    if ($show_complete_tasks == 0 && $task_completed == true) {
                        continue;
                    }


                    echo ' <tr class="tasks__item ';
                    if ($task_completed == false) {
                        echo date_important($task_date);
                    }
                    echo ' task ';
                    if ($task_completed == true) {
                        echo 'task--completed';
                    }
                    echo '">';

                    echo ' <td class="task__select  ">
                         <label class="checkbox task__checkbox">';
                    echo '          <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" name="task_'. $task_id.'" value="'. $task_id.'">';
                    echo '   <span class="checkbox__text">' . $task_name . '</span>
                            </label>
                         </td>
                         <td class="task__file">';
                    if ($task['file'] == '') {
                        echo '<a class="download-link"  style ="display:none" href="#"></a>';
                    } else {
                        echo ' <a class="download-link" href="' . $task_file . '"></a>';
                    }
                    echo '

                         </td>
                         <td class="task__date ">' . $task_date . '</td>
                    </tr>
                            ';
                }
            }
            ?>
        </table>
        <div class="form__row form__row--controls">
                        <input class="button" type="submit" name="" value="записать">
                    </div>
      </form>
    </main>
</div>
<?php





if (!empty($_POST)){
//   echo "<pre>";
//   print_r( $_POST);
//    echo "</pre>";
    $arTaskID= array_values($_POST);
   
//     print_r($arTaskID);

//   echo "<pre>";
//   print_r( $arTaskID);
//    echo "</pre>";
   $id = implode(',', $arTaskID);  
   
//    print($id);
$sql = 'SELECT id, completed FROM tasks WHERE id IN ('.$id.')';
$res = mysqli_query($con, $sql);
$task_res = mysqli_fetch_all($res, MYSQLI_ASSOC);

// echo "<pre>";
//   print_r($task_res);
//    echo "</pre>";

for($i=0; $i <count($task_res); ++$i) {
    if($task_res[$i]['completed'] == 1){
        $sql = 'UPDATE tasks SET completed = "0" WHERE id = "'.$task_res[$i]['id'].'"';
    }else {
        $sql = 'UPDATE tasks SET completed = "1" WHERE id = "'.$task_res[$i]['id'].'"';
    }                
    $res = mysqli_query($con, $sql);
    header('Location:/');
 }   
}        
?>