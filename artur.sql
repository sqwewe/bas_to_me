-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 28 2023 г., 19:34
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `artur`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blank`
--

CREATE TABLE `blank` (
  `id` int(11) NOT NULL,
  `number` varchar(60) NOT NULL,
  `date_time_blank` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `blank`
--

INSERT INTO `blank` (`id`, `number`, `date_time_blank`) VALUES
(1, '+7 (952) 612-55-45', '28.01.23 15:59');

-- --------------------------------------------------------

--
-- Структура таблицы `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `marka` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `id_traili` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `bus`
--

INSERT INTO `bus` (`id`, `marka`, `model`, `id_traili`, `number`, `description`) VALUES
(1, 'Mercedes-Benz', 'Intouro M OM 926 LA', 2, 'А789УЕ 38', 'Длина: 1298 м Ширина: 692 м Высота: 3360 м Вместимость салон'),
(2, 'Hyundai', 'Universe Express Noble', 2, 'П129УК 38', 'Габариты: 30м на 10 Количество мест: 43 ');

-- --------------------------------------------------------

--
-- Структура таблицы `trail`
--

CREATE TABLE `trail` (
  `id` int(11) NOT NULL,
  `halt` varchar(120) NOT NULL,
  `schedue` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `trail`
--

INSERT INTO `trail` (`id`, `halt`, `schedue`) VALUES
(1, 'Областная больница\r\nЮбилейный м-н\r\nШкола 4\r\nПодстанция (м-н Юбилейный)\r\nБиблиоте', '6:00 6:20 6:40 7:00 7:20 7:40 8:00 8:20 8:40 9:00 9:20 9:40 '),
(2, 'мкр. Первомайский - Боково', '8:40 9:40 10:40 12:40 15:40 16:40 17:40 19:40 21:40       '),
(3, 'Центральный рынок (Дзержинского)  - 7 микрорайон', '8:30 9:40 10:20 12:20 13:20 14:20 15:10 16:40 17:40 18:20 19:40 21:40   ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blank`
--
ALTER TABLE `blank`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trail` (`id_traili`);

--
-- Индексы таблицы `trail`
--
ALTER TABLE `trail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blank`
--
ALTER TABLE `blank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `trail`
--
ALTER TABLE `trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`id_traili`) REFERENCES `trail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
