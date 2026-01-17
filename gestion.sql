-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2026 at 10:35 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

DROP TABLE IF EXISTS `absences`;
CREATE TABLE IF NOT EXISTS `absences` (
  `idAbsence` int NOT NULL AUTO_INCREMENT,
  `dateAbsence` date NOT NULL,
  `nombreHeure` int DEFAULT NULL,
  `justifie` int DEFAULT '0',
  `justificatif` varchar(255) DEFAULT NULL,
  `idTdtp` int DEFAULT NULL,
  `idEtudiant` int DEFAULT NULL,
  PRIMARY KEY (`idAbsence`),
  KEY `idTdtp` (`idTdtp`),
  KEY `idEtudiant` (`idEtudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`idAbsence`, `dateAbsence`, `nombreHeure`, `justifie`, `justificatif`, `idTdtp`, `idEtudiant`) VALUES
(1, '2024-02-15', 2, 1, 'Certificat médical', 101, 10),
(2, '2024-02-16', 1, 2, NULL, 102, 11),
(3, '2024-02-17', 2, 0, NULL, 101, 11),
(4, '0000-00-00', 10, 0, '', 102, 11),
(5, '0000-00-00', 20, 0, '', 101, 12),
(6, '0000-00-00', 10, 0, '', 101, 12);

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `idEtudiant` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idFiliere` int DEFAULT NULL,
  PRIMARY KEY (`idEtudiant`),
  KEY `idFiliere` (`idFiliere`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`idEtudiant`, `nom`, `prenom`, `email`, `adresse`, `idFiliere`) VALUES
(10, 'Sami', 'Yassine', 'y.sami@ecole.ma', NULL, 2),
(11, 'Alami', 'Sara', 's.alami@ecole.ma', NULL, 1),
(12, 'issam', 'imran', 'test@example.com', 'Errachidia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE IF NOT EXISTS `filieres` (
  `idFiliere` int NOT NULL,
  `designation` varchar(50) NOT NULL,
  PRIMARY KEY (`idFiliere`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`idFiliere`, `designation`) VALUES
(1, 'MIP1'),
(2, 'INFO3'),
(3, 'BCG1');

-- --------------------------------------------------------

--
-- Table structure for table `tdtps`
--

DROP TABLE IF EXISTS `tdtps`;
CREATE TABLE IF NOT EXISTS `tdtps` (
  `idTdtp` int NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `type` int DEFAULT NULL,
  `idProf` int DEFAULT NULL,
  `idFiliere` int DEFAULT NULL,
  PRIMARY KEY (`idTdtp`),
  KEY `idFiliere` (`idFiliere`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tdtps`
--

INSERT INTO `tdtps` (`idTdtp`, `libelle`, `type`, `idProf`, `idFiliere`) VALUES
(101, 'Programmation C', 2, 50, 2),
(102, 'Analyse Mathématique', 1, 51, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
