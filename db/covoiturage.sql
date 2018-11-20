-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 20 nov. 2018 à 21:33
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

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `InsertAdvert`$$
CREATE DEFINER=`root`@`%` PROCEDURE `InsertAdvert` (IN `asTable` VARCHAR(50), IN `departure` VARCHAR(100), IN `arrival` VARCHAR(100), IN `author` VARCHAR(50), IN `asDate` DATE, IN `description` TEXT)  begin
declare cmd varchar(255);
set @sql = concat('INSERT INTO ',asTable,' (nom_ville_depart, nom_ville_arrive, autheur, date, description) VALUES (',departure,', ',arrival,', ',author,', ',asDate,', ',description,')');
prepare cmd from @sql;
execute cmd;
deallocate prepare cmd;
end$$

DROP PROCEDURE IF EXISTS `SelectAll`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAll` (IN `asTable` VARCHAR(255))  begin
declare cmd varchar(255);
set @sql = concat('select * from ',asTable);
prepare cmd from @sql;
execute cmd;
deallocate prepare cmd;
end$$

DROP PROCEDURE IF EXISTS `SelectDynam`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectDynam` (IN `asTable` VARCHAR(50), IN `asCols` VARCHAR(255), IN `asColWhere` VARCHAR(255), IN `asValeurs` VARCHAR(255))  begin
declare cmd varchar(255);
if asColWhere = '' then
set @sql = concat('select ',asCols,' from ',asTable);
else set @sql = concat('select ',asCols,' from ',asTable,' where ',asColWhere,' = ',asValeurs,'');
end if;
prepare cmd from @sql;
execute cmd;
deallocate prepare cmd;
end$$

DELIMITER ;

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

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`id`, `num_trajet`, `nom_ville_etape`) VALUES
(7, 1, 'Lyon'),
(6, 1, 'Dijon');

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

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`mel`, `pseudo`, `pass`, `nom`, `prenom`, `tel_mobile`, `sexe`, `fumeur`, `voiture`, `moteur`, `annee_naissance`, `photo`, `type`, `confort`) VALUES
('admin@admin.fr', 'admin', 'a', 'Admin', 'Admin', '0606060606', 'M', 'Non fumeur', 'AdMobile', 'Admin', 2018, NULL, 'Conducteur', 'Luxe');

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
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`num_trajet`, `depart_ville`, `arrivee_ville`, `etape1`, `etape2`, `date`, `prix`, `places`, `precisions`, `heure_depart`, `mel_chauffeur`) VALUES
(1, 'Paris', 'Marseille', 'Dijon', 'Lyon', '2018-11-19', 30, 3, 'Depart de place d\'Italie\r\nJe dépose au niveau des gares pour les villes étapes\r\nArrivé au port de Marseille', '07:30:00', 'admin@admin.fr');

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

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `depart`, `arrivee`, `num_trajet`, `date_depart`) VALUES
(12, 'Lyon', 'Marseille', 1, '2018-11-19'),
(11, 'Dijon', 'Marseille', 1, '2018-11-19'),
(10, 'Dijon', 'Lyon', 1, '2018-11-19'),
(9, 'Paris', 'Lyon', 1, '2018-11-19'),
(8, 'Paris', 'Dijon', 1, '2018-11-19'),
(7, 'Paris', 'Marseille', 1, '2018-11-19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
