-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 mars 2022 à 21:12
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
-- Base de données : `osag`
--
CREATE DATABASE IF NOT EXISTS `osag` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `osag`;

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

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`ID_AG`, `NOM_AG`, `DESCRIPTION_AG`, `LOCALISATION`) VALUES
(1, 'Agence a', 'Vente de chargeur', 'Akwa'),
(2, 'Agence B', 'Vente Iphone', 'Palmier'),
(3, 'Agence C', 'Ventre Ordinateur', 'Bonamoussadi');

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

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_CAT`, `LIBELLE_CAT`, `DESCRIPTION_CAT`) VALUES
(1, 'Telephone Samsung', 'cathegorie de telephone de marque samsung'),
(2, 'Ordinateur Portable', 'Ordinateur transportable '),
(3, 'Appareil electro-menagé', 'Les appareils electronique de cuisine, de bureau et autre');

-- --------------------------------------------------------

--
-- Structure de la table `entrer`
--

DROP TABLE IF EXISTS `entrer`;
CREATE TABLE IF NOT EXISTS `entrer` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`,`ID_UTIL`),
  KEY `FK_ENTRER2` (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exposer`
--

DROP TABLE IF EXISTS `exposer`;
CREATE TABLE IF NOT EXISTS `exposer` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`,`ID_UTIL`),
  KEY `FK_EXPOSER2` (`ID_UTIL`)
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

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_P`, `ID_CAT`, `DESIGNATION`, `QUANTITE`, `PRIX`, `DATE_SAVE`, `DATE_UPDATE`, `STATUT`) VALUES
(1, 1, 'Note 8', '4', '28000', NULL, NULL, 1),
(2, 2, 'Dell latitude model 3023', '8', '12000', NULL, NULL, 1),
(3, 3, 'frigo', '2', '100000', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `retirer`
--

DROP TABLE IF EXISTS `retirer`;
CREATE TABLE IF NOT EXISTS `retirer` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  PRIMARY KEY (`ID_P`,`ID_UTIL`),
  KEY `FK_RETIRER2` (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `retirer`
--

INSERT INTO `retirer` (`ID_P`, `ID_UTIL`,`QUANTITE`) VALUES
(2, 1, 3),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `ID_FONCTION` int(11) NOT NULL,
  `FONCTION` enum('Directeur','Secretaire') DEFAULT NULL,
  PRIMARY KEY (`ID_FONCTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `fonction` (`ID_FONCTION`, `FONCTION`) VALUES
(1, 'Directeur'),
(2, 'Secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTIL` int(11) NOT NULL,
  `ID_FONCTION` int(11) NOT NULL,
  `ID_AG` int(11) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `NUM_CNI` varchar(15) DEFAULT NULL,
  `VILLE` varchar(100) DEFAULT NULL,
  `POSTE` varchar(100) DEFAULT NULL,
  `TELEPHONE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_UTIL`),
  KEY `FK_APPARTENIR` (`ID_AG`),
  KEY `FK_ASSOCIATION_6` (`ID_FONCTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTIL`, `ID_FONCTION`, `ID_AG`, `NOM`, `PRENOM`, `EMAIL`, `NUM_CNI`, `VILLE`, `POSTE`, `TELEPHONE`) VALUES
(1, 1, 1, 'Brown', 'junior', 'brown@gmail.com', '12345687', 'Douala', 'directeur generale', '674327587'),
(2, 2, 1, 'Guevou', 'Midrele', 'midrele@gmail.com', '3457842', 'Yaounde', 'Secretaire', '698563412'),
(3, 2, 2, 'irmeline', 'osag', 'osag@gmail.com', '32467895', 'Bafang', 'secretaire adjoint', '667890434');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entrer`
--
ALTER TABLE `entrer`
  ADD CONSTRAINT `FK_ENTRER` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `FK_ENTRER2` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`);

--
-- Contraintes pour la table `exposer`
--
ALTER TABLE `exposer`
  ADD CONSTRAINT `FK_EXPOSER` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `FK_EXPOSER2` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_POSSEDER` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`);

--
-- Contraintes pour la table `retirer`
--
ALTER TABLE `retirer`
  ADD CONSTRAINT `FK_RETIRER` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`),
  ADD CONSTRAINT `FK_RETIRER2` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_APPARTENIR` FOREIGN KEY (`ID_AG`) REFERENCES `agence` (`ID_AG`),
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`ID_FONCTION`) REFERENCES `fonction` (`ID_FONCTION`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
