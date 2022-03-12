use mydeal;
INSERT INTO projects (name)
VALUES ('Входящие'), ('Учеба'), ('Работа'), ('Домашние дела'), ('Авто');

INSERT INTO users (login,email, password)
VALUES
  ('Марина', 'maryprudyus@gmail.com', 'qwer'),
  ('Андрей', ' creator13rus@gmail.com ', 'zxcv');

INSERT INTO tasks (name, date, completed, file,project_id, user_id)
VALUES
  ('Собеседование в IT компании', '2022-03-10-', '0', '', '3', '1'),
  ('Выполнить тестовое задание', '2022-03-12', '0', '', '3', '1'),
  ('Сделать задание первого раздела', '2022-03-09', '1', '', '2', '1'),
  ('Встреча с другом','2022-03-13','0','','1','1'),
  ('Купить корм для кота',null,'0','','4','1'),
  ('Заказать пиццу',null,'0','','4','1');


# получить все поля из таблицы tasks
SELECT * FROM tasks;
# получить все поля из таблицы users
SELECT * FROM users;
# получить все поля из таблицы projects
SELECT * FROM projects;

# получить  поля из таблицы tasks, которые соответсвуют пользователю с id 1
SELECT * FROM tasks WHERE user_id = '1';

# получить  поля из таблицы tasks, которые соответсвуют проекту с id 1
SELECT * FROM tasks WHERE project_id = '1';

# пометить задачу, как выполненную = id 1
UPDATE tasks SET completed = '1' WHERE id = '1';

# поменять имя задачи id 1
UPDATE tasks SET name = 'Новое имя задачи' WHERE id = '1';

# вывести все поля из таблицы tasks, где они будут отсортированы по дате по нарастанию
SELECT * FROM tasks ORDER BY date ASC ;

# вывести login из таблицы users, где email='maryprudyus@gmail.com'
SELECT login FROM users WHERE email='maryprudyus@gmail.com';
