-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Feb 03, 2022 alle 12:13
-- Versione del server: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `IdArticolo` int(5) NOT NULL,
  `Titolo` varchar(100) COLLATE ascii_bin NOT NULL,
  `Descrizione` text COLLATE ascii_bin NOT NULL,
  `Immagine` text COLLATE ascii_bin NOT NULL,
  `prezzo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`IdArticolo`, `Titolo`, `Descrizione`, `Immagine`, `prezzo`) VALUES
(1, 'babera 1 test', 'test papera no vabebeeeeeeee', 'https://cdn.discordapp.com/attachments/377841704746745856/938741368090673152/quack.png', 69.42),
(2, 'appera 2 test', 'abbera 2 test no vabbee amoooo', 'https://cdn.discordapp.com/attachments/377841704746745856/938741368090673152/quack.png', 420.69),
(3, 'papera no vabbe', 'E\' proprio una papera no vabbe', 'https://cdn.discordapp.com/attachments/547120216459575308/824002350200520744/bruh2.png', 6969.69),
(4, 'papera damiano dei maneschi', 'ti amo damyu', 'https://cdn.discordapp.com/attachments/377841704746745856/938742268196683776/paperarock.jpg', 6969.69);

-- --------------------------------------------------------

--
-- Struttura della tabella `compra`
--

CREATE TABLE `compra` (
  `IdArticolo` int(5) NOT NULL,
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `commento` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valutazione` int(2) DEFAULT NULL,
  `quantita` int(1) DEFAULT NULL,
  `dataOra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dump dei dati per la tabella `compra`
--

INSERT INTO `compra` (`IdArticolo`, `email`, `commento`, `valutazione`, `quantita`, `dataOra`) VALUES
(1, 'a@a.it', '<p>damy</p>', 3, 1, '2022-02-01 16:04:51'),
(1, 'a@a.it', '<p>damy</p>', 3, 1, '2022-02-01 16:10:18'),
(1, 'a@a.it', '<p>damy</p>', 3, 1, '2022-02-01 18:37:20'),
(1, 'a@a.it', '<p>damy</p>', 3, 1, '2022-02-03 10:18:18'),
(1, 'asd@asd.it', NULL, NULL, 2, '2022-02-01 16:25:25'),
(1, 'asd@asd.it', NULL, NULL, 1, '2022-02-01 16:27:32'),
(1, 'rino@pape.com', NULL, NULL, 3, '2021-12-31 16:10:29'),
(2, 'a@a.it', NULL, NULL, 1, '2022-02-01 18:28:13'),
(2, 'a@a.it', NULL, NULL, 1, '2022-02-01 18:30:04'),
(2, 'a@a.it', NULL, NULL, 1, '2022-02-01 18:30:36'),
(2, 'asd@asd.it', NULL, NULL, 1, '2022-02-01 16:28:56'),
(3, 'a@a.it', '<p>bruh</p>', 2, 1, '2022-02-03 11:49:12');

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo`
--

CREATE TABLE `indirizzo` (
  `email` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `regione` varchar(30) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `citta` varchar(30) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `indirizzo` varchar(50) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `cap` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `indirizzo`
--

INSERT INTO `indirizzo` (`email`, `regione`, `citta`, `indirizzo`, `cap`) VALUES
('a@a.it', 'Lazio', 'Roma', 'via Roma', 10000),
('asd@asd.it', 'Abruzzo', 'hjjhsdjch', 'sdcdfv', 54533),
('pu@pu.pu', NULL, NULL, NULL, NULL),
('rino@pape.com', 'Liguria', ',dfnb,.sdfn', 'dfbgdfg', 12354);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `psw` varchar(150) COLLATE ascii_bin NOT NULL,
  `_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `_surname` varchar(50) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`email`, `psw`, `_name`, `_surname`) VALUES
('a@a.it', '$2y$10$2I9Nf9B2LXL21Ctfsrp3EO/8Tpws6PripTs.o1v1J3In8vU55ad6e', 'a', 'a'),
('asd@asd.it', '$2y$10$WLKUEU5owjah9sYUzyKebubD0wuL9vct2uvxZAjeCgg2zXznRunqq', 'asd', 'asd'),
('pu@pu.pu', '$2y$10$TAlETMY9wwpp7HsdwRWlGeyuszbRrzyPMFK7AM/mMU7lfjAPHUIG6', 'cacca', 'merda'),
('rino@pape.com', '$2y$10$EbBbYdYfRfvc72YhzXVBN.D6WMRafz..4kWXYGPoUxSTRMxsN05fa', 'rino', 'pape');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`IdArticolo`);

--
-- Indici per le tabelle `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdArticolo`,`email`,`dataOra`) USING BTREE,
  ADD KEY `fk_usr` (`email`);

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_art` FOREIGN KEY (`IdArticolo`) REFERENCES `articoli` (`IdArticolo`),
  ADD CONSTRAINT `fk_usr` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`);

--
-- Limiti per la tabella `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD CONSTRAINT `indirizzo_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
