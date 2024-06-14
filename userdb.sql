-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 07. Jun 2024 um 10:44
-- Server-Version: 8.3.0
-- PHP-Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `userdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benutzername` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwort_bestaetigen` varchar(255) NOT NULL,
  `Datum` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `vorname`, `benutzername`, `email`, `password`, `passwort_bestaetigen`, `Datum`) VALUES
(1, 'dffff', 'dgfdgd', '$2y$10$Uvqk.FuJVTMyC5/6QcBpOODI2VjmvigXqBUvA.ncOayYmZU2Q.6aG', NULL, NULL, '', NULL),
(2, 'dsfs', 'sdfs', '$2y$10$KA.VSt0u16Mfg.ChH.PL7e8NC.GuMOrDQ8IMVpSrFE.lAsV4ihWTy', NULL, NULL, '', NULL),
(3, 'Poly', 'polyores@outlook.de', '$2y$10$JTWvfATyUTnrTtpcbgguUuCvrrSqaWfmKSOVwh4wuy1McNlFyfCbG', NULL, NULL, '', NULL),
(4, 'lukas', 'kjhkafsjl@jhxlkfs.com', '123456', NULL, NULL, '', NULL),
(5, 'dgf', 'dfg', '$2y$10$qJR7jrN47EgJYQcOZlLjIOnhzPNJOduoJMRVXyHhUvJqqLzdlRtJG', NULL, NULL, '', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
