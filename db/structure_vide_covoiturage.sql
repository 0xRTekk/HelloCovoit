-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 19 nov. 2018 à 23:16
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville_depart` varchar(50) NOT NULL,
  `nom_ville_arrive` varchar(50) NOT NULL,
  `autheur` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
CREATE TABLE IF NOT EXISTS `etapes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_trajet` int(11) NOT NULL,
  `nom_ville_etape` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
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
  `confort` varchar(10) NOT NULL,
  PRIMARY KEY (`mel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `num_trajet` int(11) NOT NULL AUTO_INCREMENT,
  `depart_ville` varchar(11) NOT NULL,
  `arrivee_ville` varchar(11) NOT NULL,
  `etape1` varchar(255) NOT NULL,
  `etape2` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `precisions` text NOT NULL,
  `heure_depart` time NOT NULL,
  `mel_chauffeur` varchar(255) NOT NULL,
  PRIMARY KEY (`num_trajet`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déclencheurs `trajet`
--
DROP TRIGGER IF EXISTS `insertOnEtapes`;
DELIMITER $$
CREATE TRIGGER `insertOnEtapes` AFTER INSERT ON `trajet` FOR EACH ROW begin
INSERT INTO etapes (num_trajet, nom_ville_etape) VALUES (new.num_trajet, new.etape1),
(new.num_trajet, new.etape2);
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insertOnVille`;
DELIMITER $$
CREATE TRIGGER `insertOnVille` AFTER INSERT ON `trajet` FOR EACH ROW BEGIN
INSERT INTO ville (depart, arrivee, date_depart, num_trajet)
VALUES 
(new.depart_ville, new.arrivee_ville, new.date, new.num_trajet),
(new.depart_ville, new.etape1, new.date, new.num_trajet),
(new.depart_ville, new.etape2, new.date, new.num_trajet),
(new.etape1, new.etape2, new.date, new.num_trajet),
(new.etape1, new.arrivee_ville, new.date, new.num_trajet),
(new.etape2, new.arrivee_ville, new.date, new.num_trajet)
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart` varchar(255) NOT NULL,
  `arrivee` varchar(255) NOT NULL,
  `num_trajet` int(11) NOT NULL,
  `date_depart` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
