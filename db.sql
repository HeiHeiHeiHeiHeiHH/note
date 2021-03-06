-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: jumei_encrypt_15
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `token_map_120`
--

DROP TABLE IF EXISTS `token_map_120`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_120` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_121`
--

DROP TABLE IF EXISTS `token_map_121`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_121` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_122`
--

DROP TABLE IF EXISTS `token_map_122`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_122` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_123`
--

DROP TABLE IF EXISTS `token_map_123`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_123` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_124`
--

DROP TABLE IF EXISTS `token_map_124`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_124` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_125`
--

DROP TABLE IF EXISTS `token_map_125`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_125` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_126`
--

DROP TABLE IF EXISTS `token_map_126`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_126` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `token_map_127`
--

DROP TABLE IF EXISTS `token_map_127`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_map_127` (
  `id` int(8) NOT NULL DEFAULT '10000000',
  `ciphertext` char(40) NOT NULL,
  `map_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_120`
--

DROP TABLE IF EXISTS `trusteeship_data_120`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_120` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_121`
--

DROP TABLE IF EXISTS `trusteeship_data_121`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_121` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_122`
--

DROP TABLE IF EXISTS `trusteeship_data_122`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_122` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_123`
--

DROP TABLE IF EXISTS `trusteeship_data_123`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_123` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_124`
--

DROP TABLE IF EXISTS `trusteeship_data_124`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_124` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_125`
--

DROP TABLE IF EXISTS `trusteeship_data_125`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_125` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_126`
--

DROP TABLE IF EXISTS `trusteeship_data_126`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_126` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trusteeship_data_127`
--

DROP TABLE IF EXISTS `trusteeship_data_127`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trusteeship_data_127` (
  `id` int(9) NOT NULL,
  `data` varchar(128) NOT NULL,
  `ciphertext` char(40) NOT NULL,
  `token` char(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-24  9:56:51
