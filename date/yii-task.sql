-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2018 г., 16:10
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii-task`
--
CREATE DATABASE IF NOT EXISTS `yii-task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yii-task`;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1539604671),
('m181015_114321_create_users_table', 1539604682),
('m181015_134213_create_roles_table', 1539611074),
('m181015_144311_create_task_table', 1539615022),
('m181016_130613_rename_columm_login_table_users', 1539695239);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name_id` int(11) NOT NULL,
  `task` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `name_id`, `task`, `description`, `created`) VALUES
(4, 2, 'тест', 'тут будет описание', '2018-10-15 17:53:39'),
(5, 2, 'тест2', 'тут будет описание 2', '2018-10-15 17:53:39'),
(6, 2, 'тест3', 'тут будет описание3', '2018-10-15 17:53:39'),
(7, 2, 'тест_сентябрь', 'тут будет описание сентября', '2018-09-26 11:23:54'),
(8, 2, 'тест2_сентябрь', 'тут будет описание 2сентября', '2018-09-26 11:23:54'),
(9, 2, 'тест3 сентябрь', 'тут будет описание3 сентября', '2018-09-26 11:23:54');

-- --------------------------------------------------------

--
-- Структура таблицы `task_old`
--

CREATE TABLE `task_old` (
  `id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `task` varchar(256) NOT NULL,
  `description` varchar(512) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_old`
--

INSERT INTO task (`id`, `name_user`, `task`, `description`, `created`) VALUES
(1, 'user', 'тест', 'тут будет описание', '2018-10-15 13:40:54'),
(2, 'user2', 'тест2', 'тут будет описание 2', '2018-10-15 13:40:54'),
(3, 'user', 'тест3', 'тут будет описание3', '2018-10-15 13:40:54');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO users (`id`, login, `password`, `role_id`) VALUES
(7, 'test3', '$2y$13$F/nyn9nigTIn85f7979izO5hlubvhckCE1Yo6uAH2/s.odeYmD/2C', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_old`
--
ALTER TABLE task
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ix_users_login` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `task_old`
--
ALTER TABLE task
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE users
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
