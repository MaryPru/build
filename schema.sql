CREATE
DATABASE `mydeal`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE
`mydeal`;

CREATE TABLE `projects`
(
  `id`    int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name`  CHAR(128)
);

CREATE TABLE `tasks`
(
  `id`         int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `name`       CHAR(128),
  `date`       date,
  `completed`  BOOLEAN DEFAULT FALSE,
  `file`       varchar(255),
  `project_id` INT,
  `user_id`    INT
);

CREATE TABLE `users`
(
  `id`         int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `login`      varchar(20) NOT NULL,
  `email`      varchar(30) NOT NULL UNIQUE ,
  `password`   varchar(10) NOT NULL,
) ;


ALTER TABLE `tasks` ADD FOREIGN KEY (`project_id`) REFERENCES `projects`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `tasks` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
