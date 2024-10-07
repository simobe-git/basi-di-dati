-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 07, 2024 alle 19:48
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basi di dati`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comprano`
--

CREATE TABLE `comprano` (
  `metodo_pagamento` varchar(255) NOT NULL,
  `codice_videogioco` int(11) NOT NULL,
  `email_utente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `comprano`
--

INSERT INTO `comprano` (`metodo_pagamento`, `codice_videogioco`, `email_utente`) VALUES
('carta di debito', 11111, 'gius.verdi@libero.it'),
('paypal', 11112, 'mario.rossi@gmail.com'),
('conto corrente', 11223, 'rosfol@gmail.com'),
('carta di debito', 43712, 'ettoree@io.it'),
('carta di credito', 55321, 'robyoliva@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `contenuti_aggiuntivi`
--

CREATE TABLE `contenuti_aggiuntivi` (
  `nome` varchar(30) NOT NULL,
  `prezzo` decimal(2,2) NOT NULL,
  `codice_videogioco` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `contenuti_aggiuntivi`
--

INSERT INTO `contenuti_aggiuntivi` (`nome`, `prezzo`, `codice_videogioco`) VALUES
('Age of Ultron Pack', 0.99, 11112),
('Automatron', 0.99, 43712),
('Bundle Deluxe', 0.99, 11223),
('Magik Hero Pack', 0.00, 11112),
('The Lost and Damned', 0.99, 11111),
('Ultimate Edition', 0.99, 55321),
('Wasteland', 0.99, 43712);

-- --------------------------------------------------------

--
-- Struttura della tabella `editori`
--

CREATE TABLE `editori` (
  `nome` varchar(30) NOT NULL,
  `paese` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `editori`
--

INSERT INTO `editori` (`nome`, `paese`) VALUES
('Codemasters', 'Regno Unito'),
('Microsoft', 'Stati Uniti'),
('Nintendo', 'Giappone'),
('Sony', 'Giappone'),
('Ubisoft', 'Francia');

-- --------------------------------------------------------

--
-- Struttura della tabella `hardware`
--

CREATE TABLE `hardware` (
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `pegi`
--

CREATE TABLE `pegi` (
  `id` int(5) NOT NULL,
  `eta_minima` int(2) NOT NULL,
  `contenuto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pegi`
--

INSERT INTO `pegi` (`id`, `eta_minima`, `contenuto`) VALUES
(1, 16, 'Linguaggio inappropriato'),
(2, 18, 'Discriminazione'),
(3, 16, 'Droga'),
(4, 16, 'Horror'),
(5, 18, 'Gioco d\'azzardo'),
(6, 18, 'Sex'),
(7, 16, 'Violenza');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `email_utente` varchar(40) NOT NULL,
  `codice_videogioco` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `recensioni`
--

INSERT INTO `recensioni` (`email_utente`, `codice_videogioco`) VALUES
('anto99@bd.com', 11223),
('anto99@bd.com', 43712),
('basi@dati.it', 11223),
('enzopuglia@io.it', 55321),
('ettoree@io.it', 11111),
('gius.verdi@libero.it', 11112),
('rosfol@gmail.com', 43712);

-- --------------------------------------------------------

--
-- Struttura della tabella `studi`
--

CREATE TABLE `studi` (
  `nome` varchar(25) NOT NULL,
  `sede` varchar(15) NOT NULL,
  `nome_editore` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `studi`
--

INSERT INTO `studi` (`nome`, `sede`, `nome_editore`) VALUES
('EA', 'Stati Uniti', 'Codemasters'),
('Konami', 'Giappone', 'Ubisoft'),
('SEGA', 'Giappone', 'Nintendo'),
('Tencent', 'Cina', 'Microsoft'),
('Zynga', 'Stati Uniti', 'Sony');

-- --------------------------------------------------------

--
-- Struttura della tabella `supportano`
--

CREATE TABLE `supportano` (
  `codice_videogioco` int(5) NOT NULL,
  `nome_hardware` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`email`, `nome`, `password`) VALUES
('anto99@bd.com', 'Antonio Napoli', 'Napoli2!'),
('basi@dati.it', 'Nicola Fabris', 'Aaa321&'),
('enzopuglia@io.it', 'Enzo Puglia', '3nZop?'),
('ettoree@io.it', 'Ettore Carbone', 'EttCar9?'),
('gius.verdi@libero.it', 'Giuseppe Verdi', 'G1uV3r!'),
('mario.rossi@gmail.com', 'Mario Rossi', 'Mario123?'),
('robyoliva@gmail.com', 'Roberta Oliva', 'oL1v55!'),
('rosfol@gmail.com', 'Rosanna Follini', 'Abc123&');

-- --------------------------------------------------------

--
-- Struttura della tabella `videogiochi`
--

CREATE TABLE `videogiochi` (
  `codice` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `lingue_supportate` varchar(20) NOT NULL,
  `prezzo_originale` double(5,5) NOT NULL,
  `prezzo_attuale` double(5,5) NOT NULL,
  `genere` varchar(30) NOT NULL,
  `data_rilascio` date NOT NULL,
  `id_pegi` int(5) NOT NULL,
  `nome_studio` varchar(30) NOT NULL,
  `nome_editore` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `videogiochi`
--

INSERT INTO `videogiochi` (`codice`, `nome`, `lingue_supportate`, `prezzo_originale`, `prezzo_attuale`, `genere`, `data_rilascio`, `id_pegi`, `nome_studio`, `nome_editore`) VALUES
(11111, 'Grand Theft Auto IV', 'Italiano Inglese', 0.99999, 0.99999, 'Action', '2014-10-02', 7, 'Tencent', 'Codemasters'),
(11112, 'Marvel Heroes 2015', 'Inglese', 0.99999, 0.99999, 'Action', '2015-07-15', 7, 'Konami', 'Sony'),
(11223, 'Far Cry 3', 'Inglese Spagnolo', 0.99999, 0.99999, 'Avventura', '2018-12-18', 1, 'SEGA', 'Microsoft'),
(43712, 'Fallout 4', 'Inglese Francese', 0.99999, 0.99999, 'Avventura', '2020-02-04', 7, 'SEGA', 'Microsoft'),
(55321, 'FC 25', 'Italiano Inglese', 0.99999, 0.99999, 'Sport', '2024-09-10', 5, 'EA', 'Codemasters');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comprano`
--
ALTER TABLE `comprano`
  ADD PRIMARY KEY (`codice_videogioco`,`email_utente`),
  ADD KEY `codice_videogioco` (`codice_videogioco`),
  ADD KEY `email_utente` (`email_utente`) USING BTREE;

--
-- Indici per le tabelle `contenuti_aggiuntivi`
--
ALTER TABLE `contenuti_aggiuntivi`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `codice_videogioco` (`codice_videogioco`) USING BTREE;

--
-- Indici per le tabelle `editori`
--
ALTER TABLE `editori`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `pegi`
--
ALTER TABLE `pegi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`email_utente`,`codice_videogioco`),
  ADD KEY `email_utente` (`email_utente`),
  ADD KEY `codice_videogioco` (`codice_videogioco`);

--
-- Indici per le tabelle `studi`
--
ALTER TABLE `studi`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `nome_editore_ibfk_1` (`nome_editore`);

--
-- Indici per le tabelle `supportano`
--
ALTER TABLE `supportano`
  ADD PRIMARY KEY (`codice_videogioco`,`nome_hardware`),
  ADD KEY `codice_videogioco` (`codice_videogioco`),
  ADD KEY `nome_hardware` (`nome_hardware`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `videogiochi`
--
ALTER TABLE `videogiochi`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `id_pegi` (`id_pegi`),
  ADD KEY `nome_studio_ibfk_2` (`nome_studio`),
  ADD KEY `nome_editore_ibfk3_3` (`nome_editore`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `pegi`
--
ALTER TABLE `pegi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `videogiochi`
--
ALTER TABLE `videogiochi`
  MODIFY `codice` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55322;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comprano`
--
ALTER TABLE `comprano`
  ADD CONSTRAINT `comprano_ibfk_1` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`),
  ADD CONSTRAINT `comprano_ibfk_2` FOREIGN KEY (`email_utente`) REFERENCES `utenti` (`email`);

--
-- Limiti per la tabella `contenuti_aggiuntivi`
--
ALTER TABLE `contenuti_aggiuntivi`
  ADD CONSTRAINT `codice_videogioco_ibfk_1` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`);

--
-- Limiti per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  ADD CONSTRAINT `codice_videogioco_ibfk_2` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`),
  ADD CONSTRAINT `emai_utente_ibfk_1` FOREIGN KEY (`email_utente`) REFERENCES `utenti` (`email`);

--
-- Limiti per la tabella `studi`
--
ALTER TABLE `studi`
  ADD CONSTRAINT `nome_editore_ibfk_1` FOREIGN KEY (`nome_editore`) REFERENCES `editori` (`nome`);

--
-- Limiti per la tabella `supportano`
--
ALTER TABLE `supportano`
  ADD CONSTRAINT `codice_videogioco_ibfk2` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`),
  ADD CONSTRAINT `nome_hardware_ibfk_1` FOREIGN KEY (`nome_hardware`) REFERENCES `hardware` (`nome`);

--
-- Limiti per la tabella `videogiochi`
--
ALTER TABLE `videogiochi`
  ADD CONSTRAINT `nome_editore_ibfk3` FOREIGN KEY (`nome_editore`) REFERENCES `editori` (`nome`),
  ADD CONSTRAINT `nome_studio_ibfk_2` FOREIGN KEY (`nome_studio`) REFERENCES `studi` (`nome`),
  ADD CONSTRAINT `videogiochi_ibfk_1` FOREIGN KEY (`id_pegi`) REFERENCES `pegi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
