-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 02 2022 г., 21:05
-- Версия сервера: 8.0.28-0ubuntu0.20.04.3
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `content` text NOT NULL,
  `id_parent` int NOT NULL,
  `id_user` int NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `content`, `id_parent`, `id_user`, `updated_at`) VALUES
(1, 'Первый!', 0, 1, '2022-05-02 18:49:35'),
(2, 'Второй', 0, 1, '2022-05-02 18:49:41'),
(3, 'Третий', 0, 1, '2022-05-02 18:49:46'),
(4, '1 ответ', 1, 1, '2022-05-02 18:50:45'),
(5, '2 ответ', 4, 1, '2022-05-02 18:50:52'),
(6, '3', 5, 1, '2022-05-02 18:50:00'),
(7, '4 ответ', 6, 1, '2022-05-02 18:50:56'),
(8, '5 ответ', 7, 1, '2022-05-02 18:50:57'),
(9, '6 ответ', 8, 1, '2022-05-02 18:50:59'),
(10, '7 ответ', 9, 1, '2022-05-02 18:51:02'),
(11, '8 ответ', 10, 1, '2022-05-02 18:51:04'),
(12, '9 ответ', 11, 1, '2022-05-02 18:51:07'),
(13, '10 ответ', 12, 1, '2022-05-02 18:51:10'),
(14, 'Мой ответ', 3, 2, '2022-05-02 19:38:49'),
(15, 'Мой ответ на комментарий Второй', 2, 2, '2022-05-02 19:54:19'),
(16, 'Спасибо за ответ', 14, 1, '2022-05-02 19:57:53'),
(17, 'Спасибо за ответ', 15, 1, '2022-05-02 19:58:04'),
(18, 'Четвертый', 0, 3, '2022-05-02 20:02:56'),
(19, 'Мой ответ на комментарий Четвертый...', 18, 1, '2022-05-02 20:18:20'),
(20, 'Ещё раз спасибо!', 15, 1, '2022-05-02 20:49:20');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`) VALUES
(1, 'Пользователь 1'),
(2, 'Пользователь 2'),
(3, 'Новый пользователь');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
