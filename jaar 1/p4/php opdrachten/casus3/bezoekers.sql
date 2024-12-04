-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mei 2024 om 11:53
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statistiekensysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoekers`
--

CREATE TABLE `bezoekers` (
  `id` int(11) NOT NULL,
  `land` varchar(100) DEFAULT NULL,
  `ip_adres` varchar(45) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `datum_tijd` datetime DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bezoekers`
--

INSERT INTO `bezoekers` (`id`, `land`, `ip_adres`, `provider`, `browser`, `datum_tijd`, `referer`) VALUES
(5, 'Onbekend', '::1', 'DESKTOP-CMO0O7I', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Sa', '2024-05-30 11:17:40', 'http://localhost/PHP-P4/'),
(6, 'Onbekend', '::1', 'DESKTOP-CMO0O7I', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Sa', '2024-05-30 11:19:34', 'http://localhost/PHP-P4/'),
(7, 'Onbekend', '::1', 'DESKTOP-CMO0O7I', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Sa', '2024-05-30 11:24:38', 'http://localhost/PHP-P4/Opdracht%2018C/');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
