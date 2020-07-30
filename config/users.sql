-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 30 2020 г., 16:52
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `address_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `social_vk` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_telegram` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_instagram` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `job_title`, `phone_number`, `address`, `email`, `password`, `status_id`, `social_vk`, `social_telegram`, `social_instagram`, `image`) VALUES
(12, 'Vikor  Vardanyan', 'xaker', 944444344, '3 Mas', 'tricika96@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 1, 'https://vk.com/id168025548', 'https://www.facebook.com/vardanyanvictor?ref=bookmarks', 'https://www.instagram.com/vardanyan.viktor/?hl=ru', '116153862_2530412130604407_5476489084190256910_n.jpg'),
(14, 'Mario', 'Game Hero', 101, 'Super Mario', 'Mario@gmail.com', 'b0e8a3d7b0f5004fcb918eafbdaeb741', 1, '', '', '', 'download.jpg'),
(15, 'arses', 'Killer', 546546, 'sdadasas  seeee', 'trici1111ka96@gmail.com', 'aa8ae3b340c34010e4500a0d6294dc2c', 3, '', '', '', 'thumb-94393.jpg'),
(22, 'Alosh', 'driver', 834753479, 'hoktemberyan', 'alosh@mail', 'a37b2a637d2541a600d707648460397e', 3, 'https://vk.com/id168025548', '', '', 'thumb-117050.png'),
(23, 'karina', 'detective', 935444, 'mer tun ', 'karina@mail.ru', 'a37b2a637d2541a600d707648460397e', 3, 'vk.com/22221111', '', '', 'C:\\OSPanel\\userdata\\php_upload\\php8183.tmp'),
(24, 'kune', 'sadsda', 63545, 'Kansas City', 'tricika96666@gmail.com', 'a37b2a637d2541a600d707648460397e', 1, '', '', '', 'C:\\OSPanel\\userdata\\php_upload\\phpA713.tmp'),
(25, 'Lily love', 'doctor', 54545744, 'Kansas City 44 th street 5', 'tr111396@gmail.com', 'a37b2a637d2541a600d707648460397e', 1, '', '', '', 'thumb-176447.jpg'),
(26, 'Aiden Pearce', 'Hacker', 54575999, 'new york', 'aiden@gmail.com', 'a37b2a637d2541a600d707648460397e', 3, 'https://vk.com/id168025548', 'https://www.facebook.com/vardanyanvictor?ref=bookmarks', 'https://www.instagram.com/vardanyan.viktor/?hl=ru', 'thumb-69674.jpg'),
(27, 'Lilit', 'front-dev', 93444555, 'prospekt city', 'gulp@gmail.com', 'b0e8a3d7b0f5004fcb918eafbdaeb741', NULL, NULL, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
