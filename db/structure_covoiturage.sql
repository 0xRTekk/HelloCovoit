-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 19, 2018 at 04:13 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`%` PROCEDURE `InsertAdvert` (IN `asTable` VARCHAR(50), IN `departure` VARCHAR(100), IN `arrival` VARCHAR(100), IN `author` VARCHAR(50), IN `asDate` DATE, IN `description` TEXT)  begin
declare cmd varchar(255);
set @sql = concat('INSERT INTO ',asTable,' (nom_ville_depart, nom_ville_arrive, autheur, date, description) VALUES (',departure,', ',arrival,', ',author,', ',asDate,', ',description,')');
prepare cmd from @sql;
execute cmd;
deallocate prepare cmd;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAll` (IN `asTable` VARCHAR(255))  begin
declare cmd varchar(255);
set @sql = concat('select * from ',asTable);
prepare cmd from @sql;
execute cmd;
deallocate prepare cmd;
end$$

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
  `id` int(11) NOT NULL,
  `num_trajet` int(11) NOT NULL,
  `nom_ville_etape` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etapes`
--

INSERT INTO `etapes` (`id`, `num_trajet`, `nom_ville_etape`) VALUES
(1, 6, '0'),
(2, 7, 'hole'),
(3, 7, 'hole');

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

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`mel`, `pseudo`, `pass`, `nom`, `prenom`, `tel_mobile`, `sexe`, `fumeur`, `voiture`, `moteur`, `annee_naissance`, `photo`, `type`, `confort`) VALUES
('admin@admin.fr', 'admin', 'a', 'Admin', 'Admin', '0606060606', 'M', 'Non fumeur', 'AdMobile', 'Admin', 2018, NULL, 'Conducteur', 'Luxe');

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

CREATE TABLE `trajet` (
  `num_trajet` int(11) NOT NULL,
  `depart_ville` varchar(11) NOT NULL,
  `arrivee_ville` varchar(11) NOT NULL,
  `etape1` varchar(255) NOT NULL,
  `etape2` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `precisions` text NOT NULL,
  `heure_depart` time NOT NULL,
  `mel_chauffeur` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trajet`
--

INSERT INTO `trajet` (`num_trajet`, `depart_ville`, `arrivee_ville`, `etape1`, `etape2`, `date`, `prix`, `places`, `precisions`, `heure_depart`, `mel_chauffeur`) VALUES
(1, 'Test1', 'Test2', 'Etape1', 'Etape2', '2018-11-30', 8, 5, 'Test', '15:15:00', 'admin@admin.fr'),
(2, 'aze', 'aze', 'Test001', 'Test0002', '2018-11-30', 24, 5, 'fqsfc<dqscfz', '15:15:00', 'admin@admin.fr'),
(3, 'dgfhnf', 'dfbsdf', 'qfbdqsf', 'qsdfbqdfsb', '2018-11-16', 12, 11, 'qfbdfbwesd', '06:04:00', 'admin@admin.fr'),
(4, 'fsf', 'sff', 'sdf', 'sfdffd', '2018-11-08', 5, 5, 'sdf', '05:04:00', 'admin@admin.fr'),
(5, 'dgddd', 'ddddddfg', 'dfgdfgdfg', 'dfgdfgdfg', '2018-11-19', 52, 25, '5<w4dfvqs', '15:47:16', 'admin@admin.fr'),
(6, 'test', 'test', 'Test001', 'Test0002', '2018-11-22', 6, 5, 'etqsdg', '15:45:00', 'admin@admin.fr'),
(7, 'hole', 'hole', 'hole', 'hole', '2018-12-02', 46, 7, 'qesf', '15:45:00', 'admin@admin.fr');

--
-- Triggers `trajet`
--
DELIMITER $$
CREATE TRIGGER `stepsToRoutes` AFTER INSERT ON `trajet` FOR EACH ROW begin
INSERT INTO etapes (num_trajet, nom_ville_etape) VALUES (new.num_trajet, new.etape1),
(new.num_trajet, new.etape2);
end
$$
DELIMITER ;

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
-- Indexes for table `etapes`
--
ALTER TABLE `etapes`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `num_trajet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
