-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 02:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piesklep`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user`, `product`, `count`) VALUES
(26, 1, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `time`, `login`, `password`, `ip`, `action`) VALUES
(1, '2022-10-26 11:12:26', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(2, '2022-10-26 11:13:23', 'oli', '123', '::1', 'Pomyslne logowanie'),
(3, '2022-10-26 11:13:40', 'Damian', 'test', '::1', 'Logowanie zakonczone niepowodzeniem'),
(4, '2022-10-26 11:17:00', 'Damian', '123', '192.168.43.44', 'Pomyslne logowanie'),
(5, '2022-10-26 11:26:24', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(6, '2022-10-26 13:29:43', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(7, '2022-10-26 13:44:14', 'Damian', 'aaa', '::1', 'Logowanie zakonczone niepowodzeniem'),
(8, '2022-10-26 13:44:19', 'Damian', '12', '::1', 'Logowanie zakonczone niepowodzeniem'),
(9, '2022-10-26 13:44:26', 'oli', '123', '::1', 'Pomyslne logowanie'),
(10, '2022-10-26 13:44:31', 'admin', 'a', '::1', 'Logowanie zakonczone niepowodzeniem'),
(11, '2022-10-26 13:44:36', 'admin', 'aab', '::1', 'Logowanie zakonczone niepowodzeniem'),
(12, '2022-10-26 13:44:40', 'admin', 'haslo', '::1', 'Logowanie zakonczone niepowodzeniem'),
(13, '2022-10-26 13:44:44', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(14, '2022-10-26 13:44:52', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(15, '2022-10-26 13:45:16', 'Kuba', 'haslo', '::1', 'Logowanie zakonczone niepowodzeniem'),
(16, '2022-10-26 13:45:20', 'Kuba', 'hss', '::1', 'Logowanie zakonczone niepowodzeniem'),
(17, '2022-10-26 13:45:23', 'Kuba', 'test', '::1', 'Logowanie zakonczone niepowodzeniem'),
(18, '2022-10-26 13:45:28', 'Kuba', 'hacking', '::1', 'Logowanie zakonczone niepowodzeniem'),
(19, '2022-10-26 13:45:34', 'Kuba', 'kuba2004', '::1', 'Logowanie zakonczone niepowodzeniem'),
(20, '2022-10-26 13:45:39', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(21, '2022-10-27 12:34:56', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(22, '2022-10-27 12:38:07', 'ala', 'ala', '10.224.40.135', 'Pomyslne logowanie'),
(23, '2022-10-27 12:38:29', 'admin', 'admin', '::1', 'Pomyslne logowanie'),
(24, '2022-10-27 12:39:32', 'Damian', '1234', '10.224.40.137', 'Logowanie zakonczone niepowodzeniem');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `thumbnail`, `price`, `review`) VALUES
(1, 'Burek', 'Bezdomny piesek gotowy na sprzedaż', '/uploads/2022-10-26-13-14-49_burek-nr-493-20160603131823.png', '/thumbnails/2022-10-26-13-14-49_burek-nr-493-20160603131823.png', 99, 3),
(2, 'Pysia', 'Trzyletnia suczka z gliwic', '/uploads/2022-10-26-13-15-48_maxresdefault_live.jpg', '/thumbnails/2022-10-26-13-15-48_maxresdefault_live.jpg', 49, 2),
(3, 'Harry', 'Lubi herbatkę arizona i wszystkiego się boi', '/uploads/2022-10-26-13-15-54_xuhhpVv.jpg', '/thumbnails/2022-10-26-13-15-54_xuhhpVv.jpg', 199, 5),
(4, 'Zygfryd', 'Pies', '/uploads/2022-10-26-13-16-02_2XkdfIA.jpg', '/thumbnails/2022-10-26-13-16-02_2XkdfIA.jpg', 10, 1),
(33, 'Bartek', 'Miły, <strong>2-letni </strong>piesiek', '/uploads/2022-10-27_14-42-37_dog2.jpg', '/thumbnails/2022-10-27_14-42-37_dog2.jpg', 179, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `admin`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Administrator', 1),
(2, 'oli', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Oliver', 0),
(3, 'Kuba', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Kubus', 0),
(4, 'Damian', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '123', 1),
(5, 'ala', '5d530613969feac08946e337b5f3b1189b2f0b0ca73a812f4b83a504a0c773b2', 'Alicja', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
