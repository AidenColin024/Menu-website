-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 14 apr 2025 om 09:31
-- Serverversie: 5.7.44
-- PHP-versie: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Restaurant`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gebruikers`
--

CREATE TABLE `Gebruikers` (
  `id` int(11) NOT NULL,
  `Gebruiker` text NOT NULL,
  `Wachtwoord` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Gebruikers`
--

INSERT INTO `Gebruikers` (`id`, `Gebruiker`, `Wachtwoord`) VALUES
(1, 'Eigenaar', 'Geheim'),
(2, 'Admin', 'Geheim2'),
(3, 'Admin2', 'Geheim3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Menu`
--

CREATE TABLE `Menu` (
  `id` int(11) NOT NULL,
  `naam` text NOT NULL,
  `prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Menu`
--

INSERT INTO `Menu` (`id`, `naam`, `prijs`) VALUES
(1, 'Frikandel', 1.50),
(2, 'Kroket', 2.00),
(3, 'Bamischrijf', 1.50),
(4, 'Bitterballen 6 stuks', 3.50),
(5, 'kaassouflé', 1.75),
(6, 'friet zonder', 2.00),
(7, 'Friet met:Mayo,Ketchup,Curry,Satésaus', 2.50),
(8, 'Cola', 1.50),
(9, 'Fanta', 1.50),
(10, 'Sprite', 1.50),
(11, 'Fernandes', 1.75),
(12, 'Spa blauw/rood', 1.00);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Vragen`
--

CREATE TABLE `Vragen` (
  `Naam` text NOT NULL,
  `Bericht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Vragen`
--

INSERT INTO `Vragen` (`Naam`, `Bericht`) VALUES
('Aiden', 'test'),
('ty', 'ruben is niet gayy?'),
('Marx', 'heb je een berenklauw?');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Menu`
--
ALTER TABLE `Menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
