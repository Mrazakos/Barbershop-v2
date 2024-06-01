-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jún 01. 12:05
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `barbershop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `appointment`
--

CREATE TABLE `appointment` (
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `barber` text NOT NULL,
  `trim_nose` tinyint(1) NOT NULL,
  `trim_ear` tinyint(1) NOT NULL,
  `date_day` varchar(100) NOT NULL,
  `date_hour` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'foglalt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `appointment`
--

INSERT INTO `appointment` (`user_name`, `email`, `barber`, `trim_nose`, `trim_ear`, `date_day`, `date_hour`, `service`, `status`) VALUES
('admin', 'admin@gmail.com', 'Berto', 0, 0, '2024-06-01', '14:00PM-15:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '10:00AM-11:00AM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '11:00AM-12:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 0, 0, '2024-06-02', '12:00PM-13:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 0, 0, '2024-06-02', '13:00PM-14:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '14:00PM-15:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '15:00PM-16:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '16:00PM-17:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '17:00PM-18:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-02', '18:00PM-19:00PM', '', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-03', '18:00PM-19:00PM', 'Klasszikus', 'booked'),
('admin', 'admin@gmail.com', 'Berto', 1, 0, '2024-06-03', '12:00PM-13:00PM', 'Klasszikus', 'booked');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) NOT NULL,
  `barberName` varchar(100) NOT NULL,
  `imgFullName` varchar(100) NOT NULL,
  `orderGallery` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `gallery`
--

INSERT INTO `gallery` (`id`, `barberName`, `imgFullName`, `orderGallery`) VALUES
(45, 'Titán', 'Titán-Tépőzár.jpg.66181d846d1a2.jpg', 1),
(46, 'Titán', 'hatter.jpg.66181daef1370.jpg', 2),
(47, 'Titán', 'Titán-Tépőzár.jpg.66181db3456d3.jpg', 3),
(48, 'Titán', 'hatter.jpg.66181db74c714.jpg', 4),
(49, 'Titán', 'Titán-Tépőzár.jpg.66181dbbac3d6.jpg', 5),
(50, 'Titán', 'ollo.png.66181dc4282b0.png', 6),
(51, 'Titán', 'hajfestes.png.66181dca27ba0.png', 7),
(52, 'Titán', 'Titán-Tépőzár.jpg.66181dce0d9d0.jpg', 8),
(53, 'Titán', 'hatter.jpg.66181dd2b9757.jpg', 9),
(54, 'Titán', 'gyerekhajvagas.png.66181dd7a5cb5.png', 10),
(55, 'Titán', 'Titán-Tépőzár.jpg.66181ddfd604f.jpg', 11),
(56, 'Titán', 'teljesatalakitas.png.66181de7de974.png', 12),
(57, 'Titán', 'Titán-Tépőzár.jpg.66181dee57146.jpg', 13),
(58, 'Titán', 'Titán-Tépőzár.jpg.66181df982721.jpg', 14),
(59, 'Titán', 'Titán-Tépőzár.jpg.66181e2585812.jpg', 15),
(60, 'Titán', 'hatter.jpg.66181e643e115.jpg', 16),
(61, 'Titán', 'Titán-Tépőzár.jpg.66181eb1a90b2.jpg', 17),
(62, 'Titán', 'Titán-Tépőzár.jpg.66181ecf0c6f5.jpg', 18),
(63, 'Titán', 'Titán-Tépőzár.jpg.66181f505c980.jpg', 19),
(64, 'Titán', 'hatter.jpg.66181fcd391c1.jpg', 20),
(65, 'Titán', 'Titán-Tépőzár.jpg.66181fec8c1bf.jpg', 21),
(66, 'Titán', 'hatter.jpg.66181ff699970.jpg', 22),
(67, 'BárBár', '2023_TTIK_Gólyatábor_1_412.jpg.662cb325218ff.jpg', 23);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `imgFullName` varchar(256) NOT NULL DEFAULT 'default_profile.jpg',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `barber` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `email`, `password`, `imgFullName`, `date`, `barber`) VALUES
(9, 48107252480807, 'akoska', 'valaki@gmail.com', '$2y$10$7Dso2yEpX2XFKT0vWp5xQOiv9uGI8SZJihJz4KnGCDxS28W3gpzq.', 'google_profilkep.jpg.66250fa98d650.jpg', '2024-04-21 13:08:06', 0),
(10, 52510778139, 'admin', 'admin@gmail.com', '$2y$10$J2FZ5VMVBUBVGZBK2M1Cv.c9CcxhrXbYpjKK8febJ/qyuJ4tJy6X.', 'Titán-Tépőzár.jpg.66181ddfd604f.jpg.662cb485474f1.jpg', '2024-04-27 08:17:09', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barberName` (`barberName`),
  ADD KEY `orderGallery` (`orderGallery`),
  ADD KEY `imgFullName` (`imgFullName`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`),
  ADD KEY `email` (`email`),
  ADD KEY `barber` (`barber`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
