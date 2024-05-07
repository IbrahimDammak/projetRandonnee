-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 10:59 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_randonnee`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `matricule` varchar(20) NOT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `etat` enum('disponible','occupé','en maintenance') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`matricule`, `marque`, `couleur`, `DATE`, `etat`) VALUES
('172TU1236', 'Toyota', 'Blue', '2024-04-23', 'disponible'),
('201TU16', 'Ford', 'Red', '2024-04-22', 'disponible'),
('190TU4658', 'Volkswagen', 'Green', '2024-04-21', 'en maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `randonnee`
--

CREATE TABLE `randonnee` (
  `idRandonnee` int(11) NOT NULL,
  `objectif` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `description` text,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `etat` varchar(20) DEFAULT NULL,
  `commentaire` text,
  `login` varchar(50) NOT NULL,
  `matricule` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `randonnee`
--

INSERT INTO `randonnee` (`idRandonnee`, `objectif`, `ville`, `description`, `date_debut`, `date_fin`, `etat`, `commentaire`, `login`, `matricule`) VALUES
(1, 'Exploration des montagnes de Zaghouan', 'Zaghouan', 'Explorez les magnifiques montagnes de Zaghouan avec ses vues panoramiques.', '2024-05-01', '2024-05-01', 'en cours', 'Apportez de l eau et des collations.', ' ibrahim ', ' 172TU1236 '),
(2, ' Randonnee dans le desert de Sahara ', ' Tozeur ', ' Randonnee dans le desert de Sahara avec ses dunes de sable majestueuses.', '2024-04-26', '2024-04-27', 'en attente', ' Apportez des vetements appropries et de la protection solaire.', ' aymen ', '172TU1236'),
(3, 'exploration beja', 'Beja', 'rodbelik mil mtar la tezla9', '2024-05-02', '2025-05-02', 'en attente', 'jib zouz 9laset wo zouz srewil', ' hamza ', '172TU1236');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `cin` varchar(20) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('randonneur','admin') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `PASSWORD`, `nom`, `cin`, `date_naiss`, `email`, `role`) VALUES
('ibrahim', '123456', 'ibrahim damak', '11', '2002-09-10', 'ibrahimdamak0@gmail.com', 'randonneur'),
('ibrahim1', '123456789', 'ibrahim damak', '11175788', '2002-09-10', 'ibrahimdamak0@gmail.com', 'randonneur'),
('ibrahim3', '123456789', 'ibrahim damak', '11175788', '2002-09-10', 'ibrahimdamak0@gmail.com', 'randonneur'),
('SuperAdmin', 'ibrahimadmin', 'ibrahim damak', '11175788', '2002-09-10', 'ibrahimdamak0@gmail.com', 'admin'),
('ibrahim6', '123456789', 'ibrahim damak', '11175788', '2002-09-10', 'ibrahimdamak0@gmail.com', 'randonneur'),
('firas', '123456', 'firas bouaziz', '11113590', '1998-03-31', 'firas.bouaziz98@gmail.com', 'randonneur'),
('hedi', 'hedi123', 'hedi kamoun', '11100000', '2005-03-05', 'hedihadhouda@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `randonnee`
--
ALTER TABLE `randonnee`
  ADD PRIMARY KEY (`idRandonnee`,`login`),
  ADD KEY `login` (`login`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `randonnee`
--
ALTER TABLE `randonnee`
  MODIFY `idRandonnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
