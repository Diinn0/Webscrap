-- MySQL dump 10.13  Distrib 8.0.32, for Linux (aarch64)
--
-- Host: localhost    Database: Scrap
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Cours`
--

DROP TABLE IF EXISTS `Cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Cours` (
  `idCours` int NOT NULL AUTO_INCREMENT,
  `cours` decimal(12,4) NOT NULL,
  `date_heure` datetime NOT NULL,
  `ouverture_cours` decimal(12,4) NOT NULL,
  `cloture_veille` decimal(12,4) NOT NULL,
  `cours_haut` decimal(12,4) NOT NULL,
  `cours_bas` decimal(12,4) NOT NULL,
  `limite_haut` decimal(12,4) NOT NULL,
  `limite_bas` decimal(12,4) NOT NULL,
  `volume` decimal(12,0) NOT NULL,
  `variation` decimal(3,2) NOT NULL,
  `idEntreprise` int NOT NULL,
  PRIMARY KEY (`idCours`),
  UNIQUE KEY `idCours_UNIQUE` (`idCours`),
  KEY `idEntreprise_idx` (`idEntreprise`),
  CONSTRAINT `idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cours`
--

LOCK TABLES `Cours` WRITE;
/*!40000 ALTER TABLE `Cours` DISABLE KEYS */;
INSERT INTO `Cours` VALUES (2,2001.0000,'2023-06-17 00:00:00',12.0000,21.0000,51.0000,2.0000,100.0000,0.0000,5100,0.23,1),(3,2001.0000,'2023-06-17 11:22:01',12.0000,21.0000,51.0000,2.0000,100.0000,0.0000,5100,0.23,1);
/*!40000 ALTER TABLE `Cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cours_jour`
--

DROP TABLE IF EXISTS `Cours_jour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Cours_jour` (
  `idCours_jour` int NOT NULL,
  `cours` decimal(12,4) NOT NULL,
  `date` datetime NOT NULL,
  `ouverture_cours` decimal(12,4) NOT NULL,
  `cloture_cours` decimal(12,4) NOT NULL,
  `cours_haut` decimal(12,4) NOT NULL,
  `cours_bas` decimal(12,4) NOT NULL,
  `limite_haut` decimal(12,4) NOT NULL,
  `limite_bas` decimal(12,4) NOT NULL,
  `volume` tinyint NOT NULL,
  `variation` decimal(3,2) NOT NULL,
  `idEntreprise` int NOT NULL,
  PRIMARY KEY (`idCours_jour`),
  KEY `idEntreprise_idx` (`idEntreprise`),
  CONSTRAINT `fk_id-entreprise_cours-jour` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cours_jour`
--

LOCK TABLES `Cours_jour` WRITE;
/*!40000 ALTER TABLE `Cours_jour` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cours_jour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Entreprise`
--

DROP TABLE IF EXISTS `Entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Entreprise` (
  `idEntreprise` int NOT NULL AUTO_INCREMENT,
  `label` varchar(75) NOT NULL,
  `codeISIN` char(12) NOT NULL,
  `codeEnt` varchar(4) NOT NULL,
  PRIMARY KEY (`idEntreprise`),
  UNIQUE KEY `idEntreprise_UNIQUE` (`idEntreprise`),
  UNIQUE KEY `codeISIN_UNIQUE` (`codeISIN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entreprise`
--

LOCK TABLES `Entreprise` WRITE;
/*!40000 ALTER TABLE `Entreprise` DISABLE KEYS */;
INSERT INTO `Entreprise` VALUES (1,'Test','FR00TEST0012','ABC');
/*!40000 ALTER TABLE `Entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Message` (
  `idMessage` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(75) NOT NULL,
  `contenu` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `idMessageTo` int NOT NULL DEFAULT '-1',
  `idEntreprise` int NOT NULL,
  PRIMARY KEY (`idMessage`),
  UNIQUE KEY `idMessage_UNIQUE` (`idMessage`),
  KEY `fk_id-entreprise_message_idx` (`idEntreprise`),
  CONSTRAINT `fk_id-entreprise_message` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
INSERT INTO `Message` VALUES (1,'Test','Michel','2023-06-17 00:00:00',-1,1),(2,'Test','Michel','2023-06-17 15:59:14',-1,1);
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-18 21:09:04
