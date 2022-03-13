<div class="content">
    <section class="content__side">
        <h2 class="content__side-heading">Проекты</h2>

        <nav class="main-navigation">
            <ul class="main-navigation__list">
                <?php
                foreach ($projects_arr as $project) {
                    echo '
                              <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="#">' . $project . '</a>
                            <span class="main-navigation__list-item-count">' . tasks_count($tasks_arr, $project) . '</span>
                        </li>
                            ';
                }
                ?>

            </ul>
        </nav>

        <a class="button button--transparent button--plus content__side-button"
           href="pages/form-project.html" target="project_add">Добавить проект</a>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Список задач</h2>

        <form class="search-form" action="index.php" method="post" autocomplete="off">
            <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

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

                <input class="checkbox__input visually-hidden show_completed"   <?php
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
            <tr class="tasks__item task">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                        <span class="checkbox__text">Сделать главную страницу Дела в порядке</span>
                    </label>
                </td>


                <td class="task__file">
                    <a class="download-link" href="#">Home.psd</a>
                </td>

                <td class="task__date"></td>
            </tr>
            <?php

            foreach ($tasks_arr as $key => $value) {
                $task_name = $value['name'];
                $task_date = $value['date'];
                $task_completed = $value['completed'];
                if ($show_complete_tasks == 0 && $task_completed == true) {
                    continue;
                }

                echo ' <tr class="tasks__item '; if ($task_completed == false) {echo date_important($task_date);}echo' task ';
                if ($task_completed == true) {
                    echo 'task--completed';
                }
                echo '">';
                echo ' <td class="task__select  ">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" '; if ($task_completed == true) { echo "checked";}
                echo '  type="checkbox" value="1">';
                echo '    <span class="checkbox__text">' . $task_name . '</span>
                            </label>
                        </td>
                        <td class="task__file">
                            <a class="download-link" href="#"></a>
                        </td>
                        <td class="task__date ">' . $task_date . '</td>
                    </tr>
                            ';
            }
            {

            }
            ?>

            <?php
            if ($show_complete_tasks == 1) {
                echo
                ' <tr class="tasks__item task task--completed">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden" type="checkbox" checked>
                                <span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span>
                            </label>
                        </td>
                        <td class="task__date">10.10.2019</td>
                        <td class="task__controls"></td>
                    </tr>';
            }
            ?>
        </table>
    </main>
</div>
