-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 20 mars 2022 à 18:11
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ges_stock`
--
CREATE DATABASE IF NOT EXISTS `ges_stock` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ges_stock`;

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `ID_AG` int(11) NOT NULL,
  `NOM_AG` varchar(250) DEFAULT NULL,
  `DESCRIPTION_AG` varchar(500) DEFAULT NULL,
  `LOCALISATION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_AG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bon_sortie`
--

DROP TABLE IF EXISTS `bon_sortie`;
CREATE TABLE IF NOT EXISTS `bon_sortie` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`,`ID_UTIL`),
  KEY `id_s2` (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CAT` int(11) NOT NULL,
  `LIBELLE_CAT` varchar(250) DEFAULT NULL,
  `DESCRIPTION_CAT` longtext,
  PRIMARY KEY (`ID_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entrer`
--

DROP TABLE IF EXISTS `entrer`;
CREATE TABLE IF NOT EXISTS `entrer` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`,`ID_UTIL`),
  KEY `id_e2` (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exposer`
--

DROP TABLE IF EXISTS `exposer`;
CREATE TABLE IF NOT EXISTS `exposer` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`,`ID_UTIL`),
  KEY `id_ex2` (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ID_P` int(11) NOT NULL,
  `ID_CAT` int(11) DEFAULT NULL,
  `DESIGNATION` varchar(250) DEFAULT NULL,
  `QUANTITE` decimal(10,0) NOT NULL,
  `PRIX` decimal(10,0) DEFAULT NULL,
  `DATE_SAVE` datetime DEFAULT NULL,
  `DATE_UPDATE` datetime DEFAULT NULL,
  `STATUT` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_P`),
  KEY `FK_POSSEDER` (`ID_CAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTIL` int(11) NOT NULL,
  `ID_AG` int(11) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `NUM_CNI` varchar(15) DEFAULT NULL,
  `VILLE` varchar(100) DEFAULT NULL,
  `POSTE` varchar(100) DEFAULT NULL,
  `TELEPHONE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_UTIL`),
  KEY `FK_APPARTENIR` (`ID_AG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bon_sortie`
--
ALTER TABLE `bon_sortie`
  ADD CONSTRAINT `id_s` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `id_s2` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`);

--
-- Contraintes pour la table `entrer`
--
ALTER TABLE `entrer`
  ADD CONSTRAINT `id_e` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `id_e2` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`);

--
-- Contraintes pour la table `exposer`
--
ALTER TABLE `exposer`
  ADD CONSTRAINT `id_ex` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `id_ex2` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_POSSEDER` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_APPARTENIR` FOREIGN KEY (`ID_AG`) REFERENCES `agence` (`ID_AG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
