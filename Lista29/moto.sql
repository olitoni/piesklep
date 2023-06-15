-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 11:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoimport`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `idKategorii` int(11) NOT NULL,
  `nazwa` varchar(53) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`idKategorii`, `nazwa`) VALUES
(1, 'Elektryka'),
(2, 'Hamulce'),
(3, 'Nadwozie'),
(4, 'Silnik'),
(5, 'Tuning / dodatki'),
(6, 'Wulkanizacja Motocykle sportowe, enduro i turystyczne'),
(7, 'Zawieszenie');

-- --------------------------------------------------------

--
-- Table structure for table `oplaty`
--

CREATE TABLE `oplaty` (
  `idOplaty` int(11) NOT NULL,
  `oplata` varchar(22) DEFAULT NULL,
  `kwota` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `oplaty`
--

INSERT INTO `oplaty` (`idOplaty`, `oplata`, `kwota`) VALUES
(1, 'przegląd rejestracyjny', 162.00),
(2, 'holowanie 1km', 120.00),
(3, 'opłaty parkingowe', 7.70),
(4, 'ubezpieczenie', 1467.00);

-- --------------------------------------------------------

--
-- Table structure for table `towary`
--

CREATE TABLE `towary` (
  `idTowaru` int(11) NOT NULL,
  `towar` varchar(21) DEFAULT NULL,
  `cena` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `towary`
--

INSERT INTO `towary` (`idTowaru`, `towar`, `cena`) VALUES
(1, 'filtr paliwa', 122.00),
(2, 'filtr powietrza', 196.60),
(3, 'filtr oleju', 83.00),
(4, 'olej', 71.00),
(5, 'płyn hamulcowy', 39.99),
(6, 'klocki hamulcowe', 53.51),
(7, 'żarówka reflektora', 20.78),
(8, 'amortyzator', 203.92),
(9, 'poduszka amortyzatora', 112.29),
(10, 'czujnik cofania', 48.10);

-- --------------------------------------------------------

--
-- Table structure for table `uslugi`
--

CREATE TABLE `uslugi` (
  `idUslugi` int(11) NOT NULL,
  `kategoria` int(1) DEFAULT NULL,
  `usluga` varchar(71) DEFAULT NULL,
  `cenaOd` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uslugi`
--

INSERT INTO `uslugi` (`idUslugi`, `kategoria`, `usluga`, `cenaOd`) VALUES
(1, 4, 'uszczelnienie wycieków płynu', '50.00'),
(2, 4, 'uszczelnienie wycieków oleju', '50.00'),
(3, 4, 'naprawy elektryczne', '50.00'),
(4, 4, 'sprawdzanie kompresji (cena za cylinder)', '50.00'),
(5, 4, 'wymiana oleju', '50.00'),
(6, 4, 'wymiana świec', '40.00'),
(7, 4, 'uszczelnienie kolektora wydechowego', '50.00'),
(8, 4, 'wymiana filtra powietrza', '40.00'),
(9, 4, 'wymiana płynu chłodniczego', '50.00'),
(10, 4, 'naprawa uszkodzonych gwintów', '50.00'),
(11, 4, 'czyszczenie filtra powietrza K&N', '50.00'),
(12, 4, 'wymiana tarcz sprzęgłowych', '100.00'),
(13, 4, 'diagnoza usterek silnika', '100.00'),
(14, 4, 'regulacja luzów zaworowych (silniki jednocylindrowe)', '100.00'),
(15, 4, 'czyszczenie i regulacja gaźników (silniki jednocylindrowe)', '100.00'),
(16, 4, 'czyszczenie i regulacja gaźników (silniki dwucylindrowe)', '150.00'),
(17, 4, 'regulacja luzów zaworowych (silniki rzędowe)', '250.00'),
(18, 4, 'regulacja luzów zaworowych (silniki typu V)', '300.00'),
(19, 4, 'wymiana rozrządu', '400.00'),
(20, 4, 'demontaż głowicy (silniki jednocylindrowe)', '300.00'),
(21, 4, 'czyszczenie i regulacja gaźników (silniki czterocylindrowe)', '300.00'),
(22, 4, 'wymiana silnika', '500.00'),
(23, 4, 'demontaż głowicy (silniki dwucylindrowe)', '400.00'),
(24, 4, 'wymiana tłoka w motocyklach typu cross', '400.00'),
(25, 4, 'demontaż głowicy (silniki czterocylindrowe)', '400.00'),
(26, 4, 'naprawa skrzyni biegów', '600.00'),
(27, 1, 'Podstawowa diagnostyka komputerowa', '150.00'),
(28, 1, 'kasowanie Dtc', '150.00'),
(29, 1, 'diagnozowanie układów elektronicznych (PGM-FI, MPI, ABS, MTC, TC, itd.)', '250.00'),
(30, 1, 'naprawy elektryczne 1/h', '100.00'),
(31, 1, 'montaz akcesoriów elektrycznych', '50.00'),
(32, 1, 'inne naprawy elektryczne/elektroniczne', '(do uzgodnienia)'),
(33, 7, 'wymiana łożysk koła (przód)', '100.00'),
(34, 7, 'wymiana łożysk koła (tył)', '100.00'),
(35, 7, 'wymiana amortyzatora (tył)', '100.00'),
(36, 7, 'wymiana uszczelniaczy zawieszenia przedniego', '250.00'),
(37, 7, 'wymiana łożysk wahacza', '250.00'),
(38, 7, 'wymiana łożysk główki ramy', '250.00'),
(39, 7, 'wymiana uszczelniaczy zawieszenia przedniego + czyszczenie', '350.00'),
(40, 2, 'wymiana uszczelek (cena za jeden tłoczek)', '50.00'),
(41, 2, 'odpowietrzanie hamulców tył', '50.00'),
(42, 2, 'wymiana klocków', '40.00'),
(43, 2, 'wymiana płynu tył', '40.00'),
(44, 2, 'wymiana tarcz', '50.00'),
(45, 2, 'odpowietrzanie hamulców przód (jeden zacisk)', '50.00'),
(46, 2, 'wymiana szczęk', '80.00'),
(47, 2, 'wymiana płynu przód (dwa zaciski)', '80.00'),
(48, 2, 'wymiana zestawu naprawczego pompy (przód)', '80.00'),
(49, 2, 'wymiana zestawu naprawczego pompy (tył)', '80.00'),
(50, 3, 'wymiana lusterek (cena za sztukę)', '20.00'),
(51, 3, 'wymiana żarówki', '10.00'),
(52, 3, 'wymiana akumulatora', '40.00'),
(53, 3, 'wymiana klamek (cena za sztukę)', '30.00'),
(54, 3, 'wymiana oleju w dyferencjale', '40.00'),
(55, 3, 'wymiana lampy / kierunkowskazu', '40.00'),
(56, 3, 'wymiana kierownicy', '30.00'),
(57, 3, 'wymiana / montaż szyby', '30.00'),
(58, 3, 'wymiana napędu', '150.00'),
(59, 3, 'wymiana owiewek (pług, czacha, zadupek, boki)', 'cena do ustalenia'),
(60, 5, 'montaż osłony pod silnik', '40.00'),
(61, 5, 'montaż tłumika', '50.00'),
(62, 5, 'montaż gmoli / crashpadów', '100.00'),
(63, 5, 'montaż gniazda zapalniczki', '80.00'),
(64, 5, 'montaż kufra / sakw', '80.00'),
(65, 5, 'montaż uchwytu nawigacji wraz z zasilaniem', '100.00'),
(66, 5, 'montaż podgrzewanych manetek', '120.00'),
(67, 5, 'montaż klatki do stuntu', '180.00'),
(68, 5, 'montaż kompletnego układu wydechowego', '200.00'),
(69, 5, 'montaż dodatkowego oświetlenia', 'cena do ustalenia'),
(70, 5, 'przygotowanie motocykla do wyścigów', 'cena do ustalenia'),
(71, 5, 'przygotowanie motocykla do stuntu', 'cena do ustalenia'),
(72, 5, 'tuning wizualny motocykla', 'cena do ustalenia'),
(73, 5, 'renowacja starego motocykla', 'cena do ustalenia'),
(74, 6, 'wymiana wentyla przy wymianie lub naprawie opony', '5.00'),
(75, 6, 'wyważenie zdemontowanego koła', '40.00'),
(76, 6, 'wyważanie koła przód', '35.00'),
(77, 6, 'wymiana opony wraz z wyważeniem koła', '60.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idKategorii`);

--
-- Indexes for table `oplaty`
--
ALTER TABLE `oplaty`
  ADD PRIMARY KEY (`idOplaty`);

--
-- Indexes for table `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`idTowaru`);

--
-- Indexes for table `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`idUslugi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idKategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oplaty`
--
ALTER TABLE `oplaty`
  MODIFY `idOplaty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `towary`
--
ALTER TABLE `towary`
  MODIFY `idTowaru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `idUslugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
