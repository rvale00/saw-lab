-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Feb 12, 2022 alle 10:08
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
-- Struttura della tabella `articolo`
--

CREATE TABLE `articolo` (
  `IdArticolo` int(5) NOT NULL,
  `Titolo` varchar(100) COLLATE ascii_bin NOT NULL,
  `Descrizione` text COLLATE ascii_bin NOT NULL,
  `Immagine` text COLLATE ascii_bin NOT NULL,
  `prezzo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`IdArticolo`, `Titolo`, `Descrizione`, `Immagine`, `prezzo`) VALUES
(7, 'Papera manesky', 'Quock \'n\' roll', '/saw-lab/img/paperarock.jpg', 666),
(8, 'papera', 'quack', '/saw-lab/img/quack.png', 126.11);

-- --------------------------------------------------------

--
-- Struttura della tabella `compra`
--

CREATE TABLE `compra` (
  `IdArticolo` int(5) NOT NULL,
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `quantita` int(1) DEFAULT NULL,
  `dataOra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

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

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `psw` varchar(150) COLLATE ascii_bin NOT NULL,
  `_name` varchar(50) COLLATE ascii_bin NOT NULL,
  `_surname` varchar(50) COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

-- --------------------------------------------------------

--
-- Struttura della tabella `valuta`
--

CREATE TABLE `valuta` (
  `IdValutazione` int(5) NOT NULL,
  `IdArticolo` int(5) NOT NULL,
  `email` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `valutazione` int(11) NOT NULL,
  `commento` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
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
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `valuta`
--
ALTER TABLE `valuta`
  ADD PRIMARY KEY (`IdValutazione`),
  ADD KEY `email` (`email`),
  ADD KEY `IdArticolo` (`IdArticolo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articolo`
--
ALTER TABLE `articolo`
  MODIFY `IdArticolo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `valuta`
--
ALTER TABLE `valuta`
  MODIFY `IdValutazione` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`IdArticolo`) REFERENCES `articolo` (`IdArticolo`),
  ADD CONSTRAINT `fk_usr` FOREIGN KEY (`email`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD CONSTRAINT `indirizzo_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `valuta`
--
ALTER TABLE `valuta`
  ADD CONSTRAINT `valuta_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utente` (`email`),
  ADD CONSTRAINT `valuta_ibfk_2` FOREIGN KEY (`IdArticolo`) REFERENCES `articolo` (`IdArticolo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
