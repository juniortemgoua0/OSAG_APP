-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ges_stock`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ges_stock` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ges_stock`;

--
-- Table structure for table `agence`
--

DROP TABLE IF EXISTS `agence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agence` (
  `ID_AG` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_AG` varchar(250) DEFAULT NULL,
  `DESCRIPTION_AG` varchar(500) DEFAULT NULL,
  `LOCALISATION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_AG`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agence`
--

LOCK TABLES `agence` WRITE;
/*!40000 ALTER TABLE `agence` DISABLE KEYS */;
INSERT INTO `agence` VALUES (1,'nawa','sdasfasfasfasf','douala'),(2,'itune','adasdasdasdasd','Yassah');
/*!40000 ALTER TABLE `agence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `ID_CAT` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE_CAT` varchar(40) DEFAULT NULL,
  `DESCRIPTION_CAT` longtext DEFAULT NULL,
  PRIMARY KEY (`ID_CAT`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (2,'telephone','dsfvdsgfdhdfhdhdzfh'),(3,'television','asdfasfasfasfasf'),(4,'tablette','asdasdasdasdasd'),(5,'pochette','dsfsdfsdfsdf');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrer`
--

DROP TABLE IF EXISTS `entrer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrer` (
  `ID_ENTRER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `QUANTITE_EN_COURS` int(11) NOT NULL,
  `DATE_AJOUT` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_ENTRER`),
  KEY `id_e2` (`ID_UTIL`),
  KEY `ID_P` (`ID_P`),
  CONSTRAINT `entrer_ibfk_1` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`),
  CONSTRAINT `entrer_ibfk_2` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrer`
--

LOCK TABLES `entrer` WRITE;
/*!40000 ALTER TABLE `entrer` DISABLE KEYS */;
INSERT INTO `entrer` VALUES (1,2,1,0,0,'2022-03-24 23:01:49'),(2,4,1,0,0,'2022-03-24 23:03:21'),(3,4,1,0,0,'2022-03-24 23:05:08'),(4,4,1,0,0,'2022-03-24 23:05:10'),(5,4,1,0,0,'2022-03-24 23:05:12'),(6,2,1,0,0,'2022-03-24 23:37:15'),(7,2,1,0,0,'2022-03-24 23:37:17'),(8,4,1,1,0,'2022-03-25 01:10:30'),(9,5,1,2,0,'2022-03-25 01:10:56'),(10,5,1,4,0,'2022-03-25 01:10:59'),(11,2,1,2,0,'2022-03-25 03:30:28'),(12,2,1,3,0,'2022-03-25 08:27:46'),(13,2,1,2,0,'2022-03-25 08:28:29'),(14,10,1,6,3,'2022-03-25 09:22:09'),(15,11,1,7,5,'2022-03-25 09:32:12'),(16,12,1,12,0,'2022-03-25 09:43:55'),(17,12,1,6,3,'2022-03-25 09:45:17'),(18,13,1,20,0,'2022-03-25 09:51:10'),(19,13,1,3,0,'2022-03-25 21:58:54'),(20,14,1,10,10,'2022-03-25 22:06:32'),(21,2,9,15,10,'2022-03-25 22:34:45'),(22,13,9,5,0,'2022-03-25 23:33:52'),(23,13,9,6,5,'2022-03-25 23:34:11');
/*!40000 ALTER TABLE `entrer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exposer`
--

DROP TABLE IF EXISTS `exposer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exposer` (
  `ID_EXPOSER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `QUANTITE_EN_COURS` int(11) NOT NULL,
  `DATE_AJOUT` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_EXPOSER`),
  KEY `id_ex2` (`ID_UTIL`),
  KEY `ID_P` (`ID_P`),
  CONSTRAINT `exposer_ibfk_1` FOREIGN KEY (`ID_UTIL`) REFERENCES `utilisateur` (`ID_UTIL`),
  CONSTRAINT `exposer_ibfk_2` FOREIGN KEY (`ID_P`) REFERENCES `produit` (`ID_P`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exposer`
--

LOCK TABLES `exposer` WRITE;
/*!40000 ALTER TABLE `exposer` DISABLE KEYS */;
INSERT INTO `exposer` VALUES (1,2,1,1,0,'2022-03-25 02:14:54'),(2,2,1,2,0,'2022-03-25 02:19:57'),(3,2,1,3,0,'2022-03-25 02:23:06'),(4,4,1,8,0,'2022-03-25 02:23:58'),(5,2,1,1,0,'2022-03-25 02:28:09'),(7,4,1,2,0,'2022-03-25 03:17:23'),(8,4,1,2,0,'2022-03-25 03:17:37'),(9,5,1,0,0,'2022-03-25 03:17:46'),(10,5,1,2,0,'2022-03-25 03:17:59'),(11,2,1,3,0,'2022-03-25 08:36:35'),(12,2,1,2,0,'2022-03-25 08:36:56'),(13,2,1,2,0,'2022-03-25 08:41:08'),(14,10,1,2,0,'2022-03-25 09:24:19'),(15,10,1,3,0,'2022-03-25 09:27:03'),(16,10,1,1,0,'2022-03-25 09:27:18'),(17,10,1,1,0,'2022-03-25 09:27:36'),(18,11,1,2,0,'2022-03-25 09:32:22'),(19,11,1,2,0,'2022-03-25 09:32:43'),(20,11,1,2,0,'2022-03-25 09:38:15'),(21,12,1,2,0,'2022-03-25 09:44:23'),(22,12,1,2,0,'2022-03-25 09:44:37'),(23,12,1,2,0,'2022-03-25 09:44:48'),(24,12,1,2,0,'2022-03-25 09:45:03'),(25,12,1,5,0,'2022-03-25 09:45:27'),(26,13,1,3,3,'2022-03-25 09:51:35'),(27,13,1,3,3,'2022-03-25 09:51:56'),(28,12,1,2,2,'2022-03-25 21:45:36'),(29,10,1,2,2,'2022-03-25 21:56:38'),(30,13,1,3,3,'2022-03-25 22:00:09'),(31,13,1,12,12,'2022-03-25 22:00:56'),(32,2,9,5,5,'2022-03-25 22:36:26'),(33,13,9,4,4,'2022-03-25 23:35:01'),(34,13,9,2,2,'2022-03-25 23:43:54'),(35,13,9,2,2,'2022-03-25 23:44:54');
/*!40000 ALTER TABLE `exposer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonction` (
  `ID_FONCTION` int(11) NOT NULL AUTO_INCREMENT,
  `FONCTION` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_FONCTION`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonction`
--

LOCK TABLES `fonction` WRITE;
/*!40000 ALTER TABLE `fonction` DISABLE KEYS */;
INSERT INTO `fonction` VALUES (1,'secretaire'),(2,'directeur');
/*!40000 ALTER TABLE `fonction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `ID_P` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CAT` int(11) DEFAULT NULL,
  `DESIGNATION` varchar(250) DEFAULT NULL,
  `MARQUE` varchar(40) NOT NULL,
  `QUANTITE` decimal(10,0) NOT NULL,
  `PRIX` decimal(10,0) DEFAULT NULL,
  `DATE_SAVE` datetime DEFAULT current_timestamp(),
  `DATE_UPDATE` datetime DEFAULT NULL,
  `STATUT` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`ID_P`),
  KEY `FK_POSSEDER` (`ID_CAT`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (2,2,'SAMSUNG S8','SAMSUNG',32,300000,'2022-03-22 08:05:29',NULL,0),(3,4,'IPAD MINI','APPLE',3,100000,'2022-03-22 08:05:29',NULL,1),(4,2,'yann@gmail.com','1234',0,3424,'2022-03-24 22:29:01',NULL,1),(5,2,'iphone 5','apple',0,30000,'2022-03-24 22:35:07',NULL,0),(6,4,'iphone 5','apple',0,2000,'2022-03-24 23:35:33',NULL,0),(8,2,'s7','samsung',0,3244324,'2022-03-25 03:19:56',NULL,0),(9,2,'s4','samsung',0,20000,'2022-03-25 08:50:14',NULL,0),(10,2,'S3','samsung',0,15000,'2022-03-25 09:20:14',NULL,0),(11,2,'S2','samsung',0,20000,'2022-03-25 09:31:35',NULL,0),(12,2,'s1','samsung',0,10000,'2022-03-25 09:43:38',NULL,0),(13,2,'IPHONE X','apple',0,200000,'2022-03-25 09:50:49',NULL,0),(14,2,'iphone 9','apple',0,300000,'2022-03-25 22:03:14',NULL,0);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sortie` (
  `ID_P` int(11) NOT NULL,
  `ID_UTIL` int(11) NOT NULL,
  `QUATITE` int(11) NOT NULL,
  KEY `id_s2` (`ID_UTIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sortie`
--

LOCK TABLES `sortie` WRITE;
/*!40000 ALTER TABLE `sortie` DISABLE KEYS */;
/*!40000 ALTER TABLE `sortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `ID_UTIL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_AG` int(11) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `NUM_CNI` varchar(15) DEFAULT NULL,
  `VILLE` varchar(100) DEFAULT NULL,
  `POSTE` varchar(100) DEFAULT NULL,
  `TELEPHONE` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `DATE_SAVE` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_FONCTION` int(11) NOT NULL,
  `STATUT` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_UTIL`),
  KEY `FK_APPARTENIR` (`ID_AG`),
  KEY `ID_FONCTION` (`ID_FONCTION`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_FONCTION`) REFERENCES `fonction` (`ID_FONCTION`),
  CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`ID_AG`) REFERENCES `agence` (`ID_AG`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,1,'sankeuh','yann','yann@gmail.com','56565656','douala','sdfsd','43563445','1234','2022-03-22 09:14:41',2,1),(2,2,'temgoua','junior','junior@gmail.com','56565656','douala','pppp','43563445','1234','2022-03-22 09:14:41',1,0),(3,1,'mamak','claki','claki@gmail.com','56565656','douala','addsf','43563445','1234','2022-03-22 09:14:41',1,1),(4,1,'Junior','Browdon','juniortemgoua0@gmail.com','234234','Souza',NULL,'0694978595','1234','2022-03-24 19:03:19',1,0),(5,1,'Junior','Browdon','sonia@gmail.com','234234','Souza',NULL,'0694978595','1234','2022-03-24 19:10:04',1,0),(6,1,'TEMGOUA','Browdon','juniortemgoua0@gmail.com','234234','Souza',NULL,'0694978595','1234','2022-03-24 23:50:57',1,0),(7,1,'Tegomo','midrelle','midrelle@gmail.com','4234324234','Souza',NULL,'694978595','1234','2022-03-25 03:32:13',2,0),(8,1,'POUANI','Ulrich','ulrich@gmail.com','234234','Douala',NULL,'325423553','1234','2022-03-25 22:18:48',1,0),(9,2,'Irmeline ','midrelle','midrelle1@gmail.com','1221323','Douala',NULL,'23452345','1234','2022-03-25 22:32:28',2,0);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
