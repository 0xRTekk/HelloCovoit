-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 11 nov. 2018 à 18:49
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `nom_ville_depart`, `nom_ville_arrive`, `autheur`, `date`, `description`) VALUES
(1, 'Mon lit', 'Ton lit', 'Satan', '2018-11-01', 'Ouvre les fesses, j\'arrive à toute vitesse'),
(2, 'Paris', 'Lille', 'Théo', '2018-11-01', 'Est ce qu\'on peut avoir plusieurs clés primaires ?'),
(3, 'Kaamelot', 'Kaamelot', 'Arthur', '2018-11-01', 'Putain la vache je comprends pas un mot de ce que vous racontez'),
(4, 'Admin-ville', 'Root-ville', 'Admin', '2018-11-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam urna nunc, aliquam non nunc vitae, egestas porta risus. Vestibulum maximus metus non turpis auctor pulvinar. Mauris vulputate ac sapien sit amet malesuada. Donec porta mi ligula, sit amet commodo purus cursus vel. Cras placerat lacinia arcu eu ornare. Fusce mollis lectus ut commodo efficitur. Cras at volutpat diam, at commodo nulla. Ut pretium pharetra consectetur. Integer sagittis leo arcu, non scelerisque dui maximus sed. Pellentesque imperdiet lorem in ex auctor viverra. Pellentesque at lectus augue. Cras at est luctus nulla luctus luctus. Quisque ut tincidunt massa. Nam dapibus lorem sed mollis dapibus. Curabitur est lectus, mollis at aliquet at, molestie eu elit. ');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

DROP TABLE IF EXISTS `etapes`;
CREATE TABLE IF NOT EXISTS `etapes` (
  `num_trajet` int(11) NOT NULL,
  `num_ville` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
('admin@admin.fr', 'admin', 'a', 'admin', 'admin', '0606060606', 'M', 'Non fumeur', 'AdMobile', 'admin', 2013, NULL, 'Passager', 'Normal'),
('tekky@gmail.com', 'Tekky', 'tekky', 'Sulpice', 'Rémi', '0712345678', 'M', 'Fumeur', 'Renault Clio 2', 'Essence', 1993, NULL, 'Conducteur', 'Basique');

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `num_trajet` int(11) NOT NULL AUTO_INCREMENT,
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
  `heure_depart` datetime NOT NULL,
  PRIMARY KEY (`num_trajet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
