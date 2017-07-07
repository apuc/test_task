-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 07 2017 г., 17:03
-- Версия сервера: 5.5.53
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testSqlOne`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Dima'),
(2, 'Vasay'),
(3, 'kolya'),
(4, 'King');

-- --------------------------------------------------------

--
-- Структура таблицы `user_friends`
--

CREATE TABLE `user_friends` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_friends` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_friends`
--

INSERT INTO `user_friends` (`id`, `user_name`, `user_friends`) VALUES
(1, 'Dima', 'Vasya'),
(2, 'Dima', 'Kolya'),
(3, 'Dima', 'King'),
(4, 'Dima', 'Petya'),
(5, 'Vasya', 'Kolya'),
(6, 'Vasya', 'King'),
(7, 'Vasya', 'Petya'),
(8, 'Vasya', 'Dima'),
(9, 'Kolya', 'Vasya'),
(10, 'Petya', 'Vasya');

-- --------------------------------------------------------

--
-- Структура таблицы `user_friends_relation`
--

CREATE TABLE `user_friends_relation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_friends_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_friends_relation`
--

INSERT INTO `user_friends_relation` (`id`, `user_id`, `user_friends_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 2, 3),
(4, 3, 2),
(5, 3, 1),
(6, 4, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_friends`
--
ALTER TABLE `user_friends`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_friends_relation`
--
ALTER TABLE `user_friends_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user_friends`
--
ALTER TABLE `user_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `user_friends_relation`
--
ALTER TABLE `user_friends_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
