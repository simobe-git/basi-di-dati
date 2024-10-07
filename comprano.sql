-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Creato il: Ott 07, 2024 alle 16:29
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
  `nome_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comprano`
--
ALTER TABLE `comprano`
  ADD KEY `codice_videogioco` (`codice_videogioco`),
  ADD KEY `nome_email` (`nome_email`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comprano`
--
ALTER TABLE `comprano`
  ADD CONSTRAINT `comprano_ibfk_1` FOREIGN KEY (`codice_videogioco`) REFERENCES `videogiochi` (`codice`),
  ADD CONSTRAINT `comprano_ibfk_2` FOREIGN KEY (`nome_email`) REFERENCES `utenti` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
