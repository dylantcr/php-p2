-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 mei 2024 om 10:24
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
-- Database: `case2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuwsberichten`
--

CREATE TABLE `nieuwsberichten` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `inhoud` text NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `aantal_lezers` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `nieuwsberichten`
--

INSERT INTO `nieuwsberichten` (`id`, `titel`, `inhoud`, `auteur`, `datum`, `aantal_lezers`, `title`) VALUES
(1, 'De mysterieuze Green Arrow weer gespot in Nederland: heldendaad na heldendaad', 'De mysterieuze Green Arrow weer gespot in Nederland: heldendaad na heldendaad\r\n\r\nIn een reeks opmerkelijke gebeurtenissen heeft de mysterieuze held, bekend als de Green Arrow, opnieuw zijn moed en vastberadenheid getoond door meerdere levens te redden in Nederland. Zijn optreden heeft de aandacht getrokken van zowel bewonderaars als nieuwsgierigen, die verbaasd waren over zijn onbaatzuchtige daden en zijn snelle ontsnappingen.\r\n\r\nDe avonturen van Green Arrow begonnen toen hij zeven kinderen redde uit een brandend weeshuis. Getuigen beschrijven hoe hij met een indrukwekkende koelbloedigheid te werk ging, zonder enige aarzeling het gevaar trotserend om de jonge levens te redden. Opvallend was zijn vertrek op een sportmotor zonder kenteken, waardoor zijn identiteit nog verder werd gehuld in mysterie.\r\n\r\nEenmaal buiten het zicht van de menigte, meldde een nieuwe noodsituatie zich aan. Een vrouw, in paniek en omringd door vlammen, smeekte om hulp. Green Arrow verscheen opnieuw als een wervelwind van gerechtigheid, waarbij hij zes criminelen van de beruchte arson-bende, The Fire Flies, versloeg voordat ze de kans kregen verdere chaos te veroorzaken.\r\n\r\nOndanks dat hij zichzelf talloze keren heeft bewezen als een beschermer van de samenleving, blijft de politie nog steeds op zoek naar de identiteit van Green Arrow. Zijn sluwe ontsnappingen en schijnbare vermogen om uit handen van de wet te blijven, voeden alleen maar de mystiek rondom deze moderne held.\r\n\r\nDeze recente daden hebben de roem van Green Arrow alleen maar vergroot, terwijl zijn ware identiteit een raadsel blijft voor het publiek en de autoriteiten. Hoewel sommigen zijn optreden als bovenmenselijk beschouwen, blijven anderen sceptisch en geloven dat er een rationele verklaring moet zijn voor zijn daden.\r\n\r\nHoe dan ook, de bevolking van Nederland kan zich voorlopig gerustgesteld voelen, wetende dat de Green Arrow over hun stad waakt en klaarstaat om te reageren op het moment dat de nood het hoogst is.\r\n\r\n\r\nNyssaNews', '', '2024-05-16 10:46:52', 0, ''),
(7, 'De mysterieuze Green Arrow weer gespot in Nederland: heldendaad na heldendaad', 'hij ygb f', '', '2024-05-23 08:18:15', 0, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `nieuwsberichten`
--
ALTER TABLE `nieuwsberichten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `nieuwsberichten`
--
ALTER TABLE `nieuwsberichten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
