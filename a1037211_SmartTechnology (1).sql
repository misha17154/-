-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.235.124
-- Время создания: Окт 08 2024 г., 12:12
-- Версия сервера: 5.7.37-40
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a1037211_SmartTechnology`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `userid`) VALUES
(10, 8),
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `basketToCloth`
--

CREATE TABLE `basketToCloth` (
  `id` int(11) NOT NULL,
  `basketid` int(11) NOT NULL,
  `technicid` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `basketToCloth`
--

INSERT INTO `basketToCloth` (`id`, `basketid`, `technicid`, `count`) VALUES
(4, 1, 1, 1),
(6, 1, 2, 1),
(7, 10, 1, 1),
(8, 11, 2, 1),
(10, 11, 4, 1),
(11, 11, 7, 1),
(12, 15, 10, 1),
(13, 15, 7, 1),
(14, 16, 8, 1),
(15, 16, 11, 1),
(16, 16, 12, 1),
(20, 17, 8, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorite`
--

INSERT INTO `favorite` (`id`, `userid`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 3),
(7, 7),
(8, 8),
(9, 10),
(10, 11),
(11, 12),
(12, 13),
(13, 14),
(14, 15),
(15, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `favoriteToTechnic`
--

CREATE TABLE `favoriteToTechnic` (
  `id` int(11) NOT NULL,
  `favoriteid` int(11) NOT NULL,
  `technicid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `adress` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payOffline` tinyint(1) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `userid`, `adress`, `payOffline`, `completed`) VALUES
(13, 8, 'Никифорова 8', 1, 1),
(14, 1, 'Никифорова 8', 1, 1),
(15, 1, '4', 5, 1),
(16, 1, '$adress', 2, 0),
(17, 10, '', 1, 0),
(18, 10, '', 1, 0),
(19, 10, 'Пушкина 11', 1, 1),
(20, 14, 'Пушкина 11', 0, 1),
(21, 15, '32132132132', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ordersToTechnic`
--

CREATE TABLE `ordersToTechnic` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `technicid` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ordersToTechnic`
--

INSERT INTO `ordersToTechnic` (`id`, `orderId`, `technicid`, `count`) VALUES
(13, 13, 1, 1),
(14, 14, 1, 1),
(15, 1, 2, 3),
(16, 17, 2, 1),
(17, 17, 2, 1),
(18, 17, 4, 1),
(19, 19, 7, 1),
(20, 20, 10, 1),
(21, 20, 7, 1),
(22, 21, 8, 1),
(23, 21, 11, 1),
(24, 21, 12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `technic`
--

CREATE TABLE `technic` (
  `id` int(11) NOT NULL,
  `technic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeTechnic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `imgSrc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Img/giroScooter.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `technic`
--

INSERT INTO `technic` (`id`, `technic`, `typeTechnic`, `color`, `brand`, `header`, `description`, `cost`, `imgSrc`) VALUES
(7, '', '', 'RED', 'HOT10', 'samokat', 'samokat', 10900, '../Img/photoCard.png'),
(8, '', '', 'Мульти-цвет', 'А-2345', 'Гиро-Скутер А-2345', 'Гиро-Скутер А-2345 самый лучший гиро-скутер в России', 40000, '../Img/giroScooter.png'),
(9, '', '', 'черный', 'TERMIT', 'Скейт борд TERMIT', 'Скейт борд TERMIT сделан из 7-ми слоев кедра ', 6990, '../Img/images (1).jfif'),
(10, '', '', 'черный', 'HOT10', 'Сигвей', 'Сигвей хороший', 30990, '../Img/сигвей.png'),
(11, '', '', 'Синий', 'Stern', 'Велосипед-Stern', 'Велосипед-Stern имеет 21 скорость тормаза Shimano и алюминевый сплав раммы', 40990, '../Img/Велосипед-Stern.jfif'),
(12, '', '', 'Красный', 'MI', 'Фитнес браслет MI', 'Фитнес браслет MI подходит для функциональных тренировок ', 3900, '../Img/Фитнес браслет MI.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `role`, `phone`, `email`) VALUES
(10, 'qerty', '827ccb0eea8a706c4c34a16891f84e7b', 'qerty', 'admin', '924563619', 'qerty@mail.ru'),
(14, 'tor', '3d77777910e3ea35610dbc922bb073c1', 'tor', 'user', '78923456', 'tor@mail.ru'),
(15, 'Rufus25', '6240fb0675c2534553891f2b98f7b2cb', 'Rufus25', 'user', 'Rufus25', 'Rufus25'),
(16, 'not', '827ccb0eea8a706c4c34a16891f84e7b', 'not', 'user', '1234567890', 'not');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basketToCloth`
--
ALTER TABLE `basketToCloth`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favoriteToTechnic`
--
ALTER TABLE `favoriteToTechnic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ordersToTechnic`
--
ALTER TABLE `ordersToTechnic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `technic`
--
ALTER TABLE `technic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `basketToCloth`
--
ALTER TABLE `basketToCloth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `favoriteToTechnic`
--
ALTER TABLE `favoriteToTechnic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `ordersToTechnic`
--
ALTER TABLE `ordersToTechnic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `technic`
--
ALTER TABLE `technic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
