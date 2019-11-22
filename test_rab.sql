-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 22 2019 г., 12:37
-- Версия сервера: 5.6.41
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_rab`
--

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `surname` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `mail` text NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `managers`
--

INSERT INTO `managers` (`id`, `surname`, `name`, `password`, `mail`, `phone`) VALUES
(1, 'Tolmachev', 'Andrey', '5372err', 'tolmachev@mail.ru', '8986237645'),
(2, 'Ivanov', 'Ivan', 'Ert123', 'ivanivanov@mail.ru', '8914212412'),
(3, 'Petrov', 'Egor', 'frek32', 'egorpetr@mail.ru', '8982235645'),
(4, 'Toropova', 'Nataliya', 'tyu74', 'toropova@mail.ru', '8914212465');

-- --------------------------------------------------------

--
-- Структура таблицы `zayava`
--

CREATE TABLE `zayava` (
  `id_zay` int(11) NOT NULL,
  `FIO` text NOT NULL,
  `Address` text NOT NULL,
  `email` varchar(19) NOT NULL,
  `phone` int(11) NOT NULL,
  `opis` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zayava`
--

INSERT INTO `zayava` (`id_zay`, `FIO`, `Address`, `email`, `phone`, `opis`) VALUES
(1, 'Безумов', 'Улица Пушкина', 'Антон ', 0, 'Позвонить в удобное для вас время'),
(2, 'Петров Петр ', 'Москва, улица Гаккеля', 'asc@yandex.ru', 9072, 'Перенести дату встречи'),
(3, 'Василий В.В', 'vas@yandex.ru', 'Улица Ленина 12', 2147483647, 'Позвонить в удобное для вас время');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zayava`
--
ALTER TABLE `zayava`
  ADD PRIMARY KEY (`id_zay`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `zayava`
--
ALTER TABLE `zayava`
  MODIFY `id_zay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
