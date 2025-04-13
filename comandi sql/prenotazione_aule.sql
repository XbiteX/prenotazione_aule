-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 12, 2025 alle 11:15
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prenotazione_aule`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `aule_risorse`
--

CREATE TABLE `aule_risorse` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `aule_risorse`
--

INSERT INTO `aule_risorse` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE `docenti` (
  `username` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `password` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `docenti`
--

INSERT INTO `docenti` (`username`, `nome`, `cognome`, `password`) VALUES
(1, 'Giovanni', 'Rossi', 'password12345678'),
(2, 'Maria', 'Bianchi', 'password12345678'),
(3, 'Antonio', 'Verdi', 'password12345678'),
(4, 'Luisa', 'Neri', 'password12345678'),
(5, 'Francesco', 'Gialli', 'password12345678');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotare`
--

CREATE TABLE `prenotare` (
  `username` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `data_prenotazione` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `prenotare`
--

INSERT INTO `prenotare` (`username`, `id`, `data_prenotazione`) VALUES
(1, 1, '2025-03-29 09:00:00'),
(1, 6, '2025-03-30 09:00:00'),
(2, 2, '2025-03-29 10:00:00'),
(2, 7, '2025-03-30 10:00:00'),
(3, 3, '2025-03-29 11:00:00'),
(3, 8, '2025-03-30 11:00:00'),
(4, 4, '2025-03-29 12:00:00'),
(4, 9, '2025-03-30 12:00:00'),
(5, 5, '2025-03-29 13:00:00'),
(5, 10, '2025-03-30 13:00:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `aule_risorse`
--
ALTER TABLE `aule_risorse`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `prenotare`
--
ALTER TABLE `prenotare`
  ADD PRIMARY KEY (`username`,`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `docenti`
--
ALTER TABLE `docenti`
  MODIFY `username` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotare`
--
ALTER TABLE `prenotare`
  ADD CONSTRAINT `prenotare_ibfk_1` FOREIGN KEY (`username`) REFERENCES `docenti` (`username`),
  ADD CONSTRAINT `prenotare_ibfk_2` FOREIGN KEY (`id`) REFERENCES `aule_risorse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
