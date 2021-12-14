-- phpMyAdmin SQL Dump
-- version 5.1.1-2.fc35
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2021 at 11:08 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startSaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `startSawArticoli`
--

CREATE TABLE `startSawArticoli` (
  `IdArticolo` int(5) NOT NULL,
  `Titolo` varchar(100) COLLATE ascii_bin NOT NULL,
  `Descrizione` text COLLATE ascii_bin NOT NULL,
  `Immagine` text COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `startSawUser`
--

CREATE TABLE `startSawUser` (
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `psw` varchar(150) COLLATE ascii_bin NOT NULL,
  `_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `_surname` varchar(50) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Table structure for table `valuta`
--

CREATE TABLE `valuta` (
  `IdArticolo` int(5) NOT NULL,
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `valutazione` int(2) DEFAULT NULL,
  `commento` text COLLATE ascii_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `startSawArticoli`
--
ALTER TABLE `startSawArticoli`
  ADD PRIMARY KEY (`IdArticolo`);

--
-- Indexes for table `startSawUser`
--
ALTER TABLE `startSawUser`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `valuta`
--
ALTER TABLE `valuta`
  ADD PRIMARY KEY (`IdArticolo`,`email`),
  ADD KEY `fk_usr` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `valuta`
--
ALTER TABLE `valuta`
  ADD CONSTRAINT `fk_art` FOREIGN KEY (`IdArticolo`) REFERENCES `startSawArticoli` (`IdArticolo`),
  ADD CONSTRAINT `fk_usr` FOREIGN KEY (`email`) REFERENCES `startSawUser` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
