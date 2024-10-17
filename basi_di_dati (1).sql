-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 16, 2024 alle 17:48
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
-- Struttura della tabella `console`
--

CREATE TABLE `console` (
  `nome` varchar(30) NOT NULL,
  `esclusiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `console`
--

INSERT INTO `console` (`nome`, `esclusiva`) VALUES
('nintendo switch', 0),
('playstation 3', 0),
('playstation 4', 0),
('playstation 5', 0),
('playstation 5 slim', 0),
('xbox 360', 0),
('xbox one', 0),
('xbox series x', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `contenuti_aggiuntivi`
--

CREATE TABLE `contenuti_aggiuntivi` (
  `nome` varchar(30) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL,
  `codice_videogioco` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `contenuti_aggiuntivi`
--

INSERT INTO `contenuti_aggiuntivi` (`nome`, `prezzo`, `codice_videogioco`) VALUES
('Age of Ultron Pack', 2.99, 11112),
('Automatron', 12.99, 43712),
('Bundle Deluxe', 9.99, 11223),
('Magik Hero Pack', 3.49, 11112),
('The Lost and Damned', 1.09, 11111),
('Ultimate Edition', 2.39, 55321),
('Wasteland', 5.49, 43712);

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
-- Struttura della tabella `pc`
--

CREATE TABLE `pc` (
  `id` int(5) NOT NULL,
  `memoria` varchar(10) NOT NULL,
  `scheda video` varchar(40) NOT NULL,
  `RAM` varchar(10) NOT NULL,
  `sistema_operativo` varchar(30) NOT NULL,
  `processore` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pc`
--

INSERT INTO `pc` (`id`, `memoria`, `scheda video`, `RAM`, `sistema_operativo`, `processore`) VALUES
(19289, '8GB', 'Nvidia RTX 4060', '32GB', 'Windows 11 home', 'intel i7'),
(32613, '1000GB', 'RX 580', '16GB', 'Windows 11 Pro', 'intel i5'),
(73543, '1TB', 'Nvidia GTX750', '32GB', 'Windows 11', 'intel i7'),
(75411, '1000GB', 'RTX 4060 Ti 8GB', '32GB', 'Windows 11 pro', 'intel i7'),
(82821, '16GB', 'Nvidia RTX 4060', '16GB', 'Windows 11 home', 'AMD Ryzen 5 4500');

-- --------------------------------------------------------

--
-- Struttura della tabella `pegi`
--

CREATE TABLE `pegi` (
  `id` int(5) NOT NULL,
  `eta_minima` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `pegi`
--

INSERT INTO `pegi` (`id`, `eta_minima`) VALUES
(1, 3),
(2, 7),
(3, 12),
(4, 16),
(5, 18);

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
-- Struttura della tabella `supportato_console`
--

CREATE TABLE `supportato_console` (
  `nome_console` varchar(30) NOT NULL,
  `codice_videogioco` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `supportato_console`
--

INSERT INTO `supportato_console` (`nome_console`, `codice_videogioco`) VALUES
('nintendo switch', 11112),
('playstation 3', 11111),
('playstation 4', 11111),
('playstation 4', 11223),
('playstation 4', 55321),
('playstation 5', 11111),
('playstation 5', 11112),
('playstation 5', 11223),
('playstation 5', 43712),
('playstation 5', 55321),
('playstation 5 slim', 11111),
('playstation 5 slim', 11223),
('xbox 360', 55321),
('xbox one', 43712),
('xbox series x', 11112);

-- --------------------------------------------------------

--
-- Struttura della tabella `supportato_pc`
--

CREATE TABLE `supportato_pc` (
  `id_pc` int(5) NOT NULL,
  `codice_videogioco` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `supportato_pc`
--

INSERT INTO `supportato_pc` (`id_pc`, `codice_videogioco`) VALUES
(19289, 11112),
(32613, 11111),
(32613, 11112),
(32613, 11223),
(32613, 43712),
(32613, 55321),
(73543, 43712),
(73543, 55321),
(75411, 11223),
(75411, 55321),
(82821, 11112),
(82821, 43712);

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
  `lingua_originale` varchar(30) NOT NULL,
  `prezzo_originale` double(4,2) NOT NULL,
  `prezzo_attuale` double(4,2) NOT NULL,
  `genere` varchar(30) NOT NULL,
  `data_rilascio` date NOT NULL,
  `id_pegi` int(5) NOT NULL,
  `nome_studio` varchar(30) NOT NULL,
  `nome_editore` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `videogiochi`
--

INSERT INTO `videogiochi` (`codice`, `nome`, `lingua_originale`, `prezzo_originale`, `prezzo_attuale`, `genere`, `data_rilascio`, `id_pegi`, `nome_studio`, `nome_editore`) VALUES
(11111, 'Grand Theft Auto IV', 'Italiano', 79.99, 69.99, 'Azione', '2014-10-02', 3, 'Tencent', 'Codemasters'),
(11112, 'Marvel Heroes 2015', 'Inglese', 59.99, 39.99, 'Azione', '2015-07-15', 2, 'Konami', 'Sony'),
(11223, 'Far Cry 3', 'Inglese', 84.99, 69.99, 'Avventura', '2018-12-18', 3, 'SEGA', 'Microsoft'),
(43712, 'Fallout 4', 'Francese', 84.99, 79.99, 'Avventura', '2020-02-04', 4, 'SEGA', 'Microsoft'),
(55321, 'FC 25', 'Italiano', 74.49, 74.99, 'Sport', '2024-09-10', 1, 'EA', 'Codemasters');

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
-- Indici per le tabelle `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`nome`);

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
-- Indici per le tabelle `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

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
-- Indici per le tabelle `supportato_console`
--
ALTER TABLE `supportato_console`
  ADD PRIMARY KEY (`nome_console`,`codice_videogioco`),
  ADD KEY `nome_console_fk1` (`nome_console`),
  ADD KEY `codice_videogioco_fk1` (`codice_videogioco`);

--
-- Indici per le tabelle `supportato_pc`
--
ALTER TABLE `supportato_pc`
  ADD PRIMARY KEY (`id_pc`,`codice_videogioco`),
  ADD KEY `id_pc_fk1` (`id_pc`),
  ADD KEY `codice_videogioco_fk2` (`codice_videogioco`);

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
-- Limiti per la tabella `supportato_console`
--
ALTER TABLE `supportato_console`
  ADD CONSTRAINT `codice_videogioco_fk2` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`),
  ADD CONSTRAINT `nome_console_fk1` FOREIGN KEY (`nome_console`) REFERENCES `console` (`nome`);

--
-- Limiti per la tabella `supportato_pc`
--
ALTER TABLE `supportato_pc`
  ADD CONSTRAINT `codice_videogioco_ibfk` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`),
  ADD CONSTRAINT `id_pc_fk1` FOREIGN KEY (`id_pc`) REFERENCES `pc` (`id`);

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
