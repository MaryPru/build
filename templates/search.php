<?php
$search = $_GET['search'] ?? '';
//    echo "<pre>";
//    print_r($projects_arr);
//    echo "</pre>";
//
//    echo "<pre>";
//    print_r($tasks_arr);
//    echo "</pre>";
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
           href="pages/form-project.html" target="project_add">Добавить проект</a>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="get" autocomplete="off">
            <input class="search-form__input" type="text" name="search" value="<?=trim($search)?>" placeholder="Поиск по задачам">

            <input class="search-form__submit" type="submit" name="" value="Искать">
        </form>

        <div class="tasks-controls">
            <nav class="tasks-switch">
                <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                <a href="/" class="tasks-switch__item">Повестка дня</a>
                <a href="/" class="tasks-switch__item">Завтра</a>
                <a href="/" class="tasks-switch__item">Просроченные</a>
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
                    $task_name = $task['task_name'] ;
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
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" ';
                    if ($task_completed == true) {
                        echo "checked";
                    }
                    echo '  type="checkbox" value="1">';
                    if (isset($errors['password'])) echo ' form__input--error';
                    echo '    <span class="checkbox__text">' . $task_name . '</span>
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
            if($tasks_arr==[]){
                print('По вашему запросу ничего не найдено');
            }
            ?>
        </table>
    </main>
</div>
