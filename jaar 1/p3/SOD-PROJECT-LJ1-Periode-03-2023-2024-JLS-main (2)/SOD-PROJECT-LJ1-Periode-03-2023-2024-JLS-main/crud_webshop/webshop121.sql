-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jun 2024 om 12:48
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
-- Database: `webshop121`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `bestelcode` int(11) NOT NULL,
  `klantcode` int(11) NOT NULL,
  `productcode` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`bestelcode`, `klantcode`, `productcode`, `aantal`) VALUES
(1, 1, 1, 2),
(8, 1, 2, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `logincode` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `klant e-adres` varchar(100) NOT NULL,
  `klantwoon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`logincode`, `username`, `klant e-adres`, `klantwoon`) VALUES
(1, 'k1', 'a1', 'p1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_`
--

CREATE TABLE `login_` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `login_`
--

INSERT INTO `login_` (`id`, `name`, `email`, `username`, `password`) VALUES
(8, '12', '12', '12', 'c20ad4d76fe97759aa27a0c99bff6710'),
(9, 'a', 'a@hotmail.com', 'a', '0cc175b9c0f1b6a831c399e269772661'),
(10, 'ahmet', '2@hotmail.com', 'ahmet', '7b379e79a50465b6410598a015cb11b5'),
(11, 'abc', 'abc@hotmail.com', 'abc', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `productcode` int(11) NOT NULL,
  `naam` varchar(200) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `prijs` decimal(6,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`productcode`, `naam`, `merk`, `prijs`, `foto`) VALUES
(1, 'nike air max plus', 'nike', 189.99, 'air-jordan-1-mid-damesschoenen-kNhbRG.webp'),
(2, 'nike air force 1 \'07', 'nike', 119.00, 'air-max-dn-schoenen-dCTQrV (1).webp'),
(3, 'nike air max plus III', 'nike', 189.00, 'dunk-low-kinderschoenen-MpPs6m (1).webp'),
(4, 'nike react vision', 'nike', 139.00, 'dunk-low-kinderschoenen-MpPs6m.webp'),
(5, 'nike air max plus drift', 'nike', 199.00, 'dunk-low-retro-herenschoen-wwlDHh.webp'),
(6, 'nike air max 97 \'something for thee hotties\'', 'nike', 229.00, 'hjdwvgcty.jpg'),
(7, 'nike acg air zoom gaiadome gore-tex', 'nike', 224.00, 'air-max-dn-schoenen-dCTQrV (1).webp'),
(10, 'aksn', 'joias', 0.00, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`bestelcode`),
  ADD KEY `productcode` (`productcode`),
  ADD KEY `klantcode` (`klantcode`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`logincode`);

--
-- Indexen voor tabel `login_`
--
ALTER TABLE `login_`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productcode`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `bestelcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `logincode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `login_`
--
ALTER TABLE `login_`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `productcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`klantcode`) REFERENCES `klant` (`logincode`),
  ADD CONSTRAINT `bestelling_ibfk_2` FOREIGN KEY (`productcode`) REFERENCES `product` (`productcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
