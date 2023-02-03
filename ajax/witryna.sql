-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 03 Lut 2023, 12:27
-- Wersja serwera: 8.0.32-0ubuntu0.20.04.2
-- Wersja PHP: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `witryna`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `liczba` int NOT NULL,
  `tekst` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`liczba`, `tekst`) VALUES
(1, 'pierwszy'),
(2, 'drugi'),
(3, 'trzeci'),
(4, 'czwarty'),
(5, 'piąty'),
(6, 'szósty'),
(7, 'siódmy'),
(8, 'ósmy'),
(9, 'dziewiąty'),
(10, 'dziesiąty'),
(11, 'jedenasty'),
(12, 'dwunasty'),
(13, 'trzynasty'),
(14, 'czternasty'),
(15, 'piętnasty'),
(16, 'szesnasty');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`liczba`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
