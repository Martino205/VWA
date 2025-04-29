-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 29.Apr 2025, 16:50
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `attractions`
--

CREATE TABLE `attractions` (
  `id` int(11) NOT NULL,
  `nameOfAttraction` varchar(100) NOT NULL,
  `costOfAttraction` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `attractions`
--

INSERT INTO `attractions` (`id`, `nameOfAttraction`, `costOfAttraction`) VALUES
(1, 'Bratislavský hrad', 5.50),
(2, 'Oravský hrad', 4.80),
(3, 'Bojnický zámok', 4.50),
(4, 'Starý zámok Banská Štiavnica', 5.00),
(5, 'Demänovská jaskyňa slobody', 6.70),
(6, 'Dobšinská ľadová jaskyňa', 6.20),
(7, 'Vysoké Tatry', 2.00),
(8, 'Slovenský raj', 3.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `numberOfTickets` int(11) NOT NULL,
  `totalCost` decimal(10,2) NOT NULL,
  `dateOfAttraction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `attraction_id`, `order_date`, `numberOfTickets`, `totalCost`, `dateOfAttraction`) VALUES
(1, 1, 3, '2025-03-18 18:57:14', 2, 0.00, '2025-03-12'),
(2, 1, 2, '2025-03-18 20:09:42', 1, 0.00, '2025-03-27'),
(3, 1, 1, '2025-03-18 20:22:27', 2, 0.00, '2025-03-28'),
(4, 1, 4, '2025-03-18 20:26:32', 3, 15.00, '2025-03-27'),
(5, 1, 4, '2025-03-24 07:19:25', 2, 10.00, '2025-03-26'),
(6, 4, 4, '2025-04-15 13:25:46', 2, 10.00, '2025-04-16');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pozition` enum('Študent','Učiteľ','Iné') NOT NULL,
  `classOfStudent` varchar(20) DEFAULT 'Žiadny',
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `lastname`, `email`, `pozition`, `classOfStudent`, `text`) VALUES
(1, 'Martin', 'Klingač', 'klingac@gmail.com', 'Študent', 'prvy', 'Veľmi pekne.'),
(2, 'Martin', 'Mohelník', 'martinmohelnik090@gmail.com', 'Iné', 'none', 'Jednoduché objednávanie. Proste perfektne.'),
(3, 'Jakub', 'Plánka', 'planka@gmail.com', 'Študent', 'stvrty', 'Príjemne prostredie. Jednoduché ovladanie'),
(4, 'Amália', 'Urbánková', 'amik@gmail.com', 'Iné', 'none', 'Pekná stránka. Chválim'),
(7, 'Jozko', 'Mrkva', 'mrkva@gmail.com', 'Učiteľ', 'none', 'Chválim známkou A');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `adress`, `password`) VALUES
(1, 'Martin', 'Mohelník', 'martinmohelnik090@gmail.com', 'Podvysoká 111', '$2y$10$3zG8LhNvkBGvrZDQjo0kEesq5vFYfxk5z8RYu0NegPIr96CiOnG7a'),
(2, 'Jakub', 'Plánka', 'planka@gmail.com', 'Olesna 222', '$2y$10$M5EGEKAAKEGjlF5ytPE0QeaD1lbMKRy9xWI5qCogKr8AqrvpkqtyO'),
(3, 'Amália', 'Urbánková', 'amik@gmail.com', 'Olesna 22', '$2y$10$R/hPt5We0brtSC3MxtAfS.svC.oZvcjjiPJe/0k.kQiPj22Ax7C7K'),
(4, 'Martin', 'Klingač', 'klingac@gmail.com', 'Olesna 2849', '$2y$10$Glyof5yxGdHLEjuVS8XZC.jYZhCiVqNyQZdwx/VfYe2jEAIMcMic.'),
(5, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$aLfoCvz28dYesu1X7SoQNeCUNY4XojEQKqMyMc3IghQCKRbqwcDZe');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `attraction_id` (`attraction_id`);

--
-- Indexy pre tabuľku `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `attractions`
--
ALTER TABLE `attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
