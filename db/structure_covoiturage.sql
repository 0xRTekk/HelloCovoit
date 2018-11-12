-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 12, 2018 at 03:20 PM
-- Server version: 10.0.36-MariaDB-1~xenial
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covoiturage`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `nom_ville_depart` varchar(50) NOT NULL,
  `nom_ville_arrive` varchar(50) NOT NULL,
  `autheur` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etapes`
--

CREATE TABLE `etapes` (
  `num_trajet` int(11) NOT NULL,
  `num_ville` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `mel` varchar(50) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel_mobile` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `fumeur` varchar(10) NOT NULL,
  `voiture` varchar(50) NOT NULL,
  `moteur` varchar(10) NOT NULL,
  `annee_naissance` year(4) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `confort` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

CREATE TABLE `trajet` (
  `num_trajet` int(11) NOT NULL,
  `depart_ville` int(11) NOT NULL,
  `depart_precis` text NOT NULL,
  `arrivee_ville` int(11) NOT NULL,
  `arrivee_precis` text NOT NULL,
  `date_debut_periode` datetime NOT NULL,
  `date_fin_periode` datetime NOT NULL,
  `periodicite` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `mel_chauffeur` varchar(50) NOT NULL,
  `places` smallint(6) NOT NULL,
  `precisions` text NOT NULL,
  `type_trajet` varchar(2) NOT NULL,
  `heure_depart` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`mel`);

--
-- Indexes for table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`num_trajet`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `num_trajet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
