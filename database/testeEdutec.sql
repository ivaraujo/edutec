CREATE DATABASE  IF NOT EXISTS `teste_edutec` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `teste_edutec`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: teste_edutec
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anfitrioes`
--

DROP TABLE IF EXISTS `anfitrioes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anfitrioes` (
  `idanfitrioes` int NOT NULL AUTO_INCREMENT,
  `nome_anfitrioes` varchar(45) NOT NULL,
  `cpf_anfitrioes` varchar(14) NOT NULL,
  `senha_anfitrioes` varchar(8) NOT NULL,
  PRIMARY KEY (`idanfitrioes`),
  UNIQUE KEY `cpf_anfitrioes_UNIQUE` (`cpf_anfitrioes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anfitrioes`
--

LOCK TABLES `anfitrioes` WRITE;
/*!40000 ALTER TABLE `anfitrioes` DISABLE KEYS */;
/*!40000 ALTER TABLE `anfitrioes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `idcategorias` int NOT NULL AUTO_INCREMENT,
  `nome_categorias` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout` (
  `idcheckout` int NOT NULL AUTO_INCREMENT,
  `convidados_idconvidados` int NOT NULL,
  `presentes_idpresentes` int NOT NULL,
  `eventos_ideventos` int NOT NULL,
  PRIMARY KEY (`idcheckout`),
  KEY `fk_checkout_convidados1_idx` (`convidados_idconvidados`),
  KEY `fk_checkout_presentes1_idx` (`presentes_idpresentes`),
  KEY `fk_checkout_eventos1_idx` (`eventos_ideventos`),
  CONSTRAINT `fk_checkout_convidados1` FOREIGN KEY (`convidados_idconvidados`) REFERENCES `convidados` (`idconvidados`),
  CONSTRAINT `fk_checkout_eventos1` FOREIGN KEY (`eventos_ideventos`) REFERENCES `eventos` (`ideventos`),
  CONSTRAINT `fk_checkout_presentes1` FOREIGN KEY (`presentes_idpresentes`) REFERENCES `presentes` (`idpresentes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convidados`
--

DROP TABLE IF EXISTS `convidados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `convidados` (
  `idconvidados` int NOT NULL AUTO_INCREMENT,
  `cpf_convidados` varchar(14) NOT NULL,
  `nome_convidados` varchar(45) NOT NULL,
  `telefone_convidados` varchar(13) NOT NULL,
  `email_convidados` varchar(150) NOT NULL,
  `senha_convidados` varchar(8) NOT NULL,
  PRIMARY KEY (`idconvidados`),
  UNIQUE KEY `cpf_convidados_UNIQUE` (`cpf_convidados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convidados`
--

LOCK TABLES `convidados` WRITE;
/*!40000 ALTER TABLE `convidados` DISABLE KEYS */;
/*!40000 ALTER TABLE `convidados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `ideventos` int NOT NULL AUTO_INCREMENT,
  `nome_eventos` varchar(45) NOT NULL,
  `data_eventos` date NOT NULL,
  `localizacao_eventos` varchar(255) NOT NULL,
  `anfitrioes_idanfitrioes` int NOT NULL,
  `senha_eventos` varchar(6) NOT NULL,
  PRIMARY KEY (`ideventos`),
  KEY `fk_eventos_anfitrioes1_idx` (`anfitrioes_idanfitrioes`),
  CONSTRAINT `fk_eventos_anfitrioes1` FOREIGN KEY (`anfitrioes_idanfitrioes`) REFERENCES `anfitrioes` (`idanfitrioes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista`
--

DROP TABLE IF EXISTS `lista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lista` (
  `idlista` int NOT NULL AUTO_INCREMENT,
  `checkout_idcheckout` int NOT NULL,
  PRIMARY KEY (`idlista`),
  KEY `fk_lista_checkout1_idx` (`checkout_idcheckout`),
  CONSTRAINT `fk_lista_checkout1` FOREIGN KEY (`checkout_idcheckout`) REFERENCES `checkout` (`idcheckout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista`
--

LOCK TABLES `lista` WRITE;
/*!40000 ALTER TABLE `lista` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagamentos` (
  `idpagamentos` int NOT NULL AUTO_INCREMENT,
  `nome_pagamentos` varchar(45) NOT NULL,
  PRIMARY KEY (`idpagamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentes`
--

DROP TABLE IF EXISTS `presentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presentes` (
  `idpresentes` int NOT NULL AUTO_INCREMENT,
  `nome_presentes` varchar(45) NOT NULL,
  `preco_presentes` float NOT NULL,
  `limite_presentes` int NOT NULL,
  `categorias_idcategorias` int NOT NULL,
  `pagamentos_idpagamentos` int NOT NULL,
  PRIMARY KEY (`idpresentes`),
  KEY `fk_presentes_categorias_idx` (`categorias_idcategorias`),
  KEY `fk_presentes_pagamentos1_idx` (`pagamentos_idpagamentos`),
  CONSTRAINT `fk_presentes_categorias` FOREIGN KEY (`categorias_idcategorias`) REFERENCES `categorias` (`idcategorias`),
  CONSTRAINT `fk_presentes_pagamentos1` FOREIGN KEY (`pagamentos_idpagamentos`) REFERENCES `pagamentos` (`idpagamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentes`
--

LOCK TABLES `presentes` WRITE;
/*!40000 ALTER TABLE `presentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `presentes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-16 14:14:51
