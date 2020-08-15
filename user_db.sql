-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: user_db
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `gavepoint_tb`
--

DROP TABLE IF EXISTS `gavepoint_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gavepoint_tb` (
  `ownerid` varchar(2000) NOT NULL,
  `joinid` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gavepoint_tb`
--

LOCK TABLES `gavepoint_tb` WRITE;
/*!40000 ALTER TABLE `gavepoint_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `gavepoint_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lamppoint_tb`
--

DROP TABLE IF EXISTS `lamppoint_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lamppoint_tb` (
  `googleid` varchar(2000) DEFAULT NULL,
  `username` varchar(2000) DEFAULT NULL,
  `pointcount` int(11) NOT NULL,
  `lamppoint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lamppoint_tb`
--

LOCK TABLES `lamppoint_tb` WRITE;
/*!40000 ALTER TABLE `lamppoint_tb` DISABLE KEYS */;
INSERT INTO `lamppoint_tb` VALUES ('VaHzrWk2gchdeECxmfe8XVBq6ic2','렁ㄴ밒ㄴ',0,0),('KM3XjSPZWWPG5ad4uuOvLEqqkPA2','김민성',0,0),('aLUJ5Y61fCZL4npe1ilnQttd8Mu1','2tle',0,0);
/*!40000 ALTER TABLE `lamppoint_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lol_tb`
--

DROP TABLE IF EXISTS `lol_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lol_tb` (
  `googleid` varchar(2000) DEFAULT NULL,
  `lol_username` varchar(500) DEFAULT NULL,
  `lol_solo_tier` varchar(200) DEFAULT NULL,
  `lol_team_tier` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lol_tb`
--

LOCK TABLES `lol_tb` WRITE;
/*!40000 ALTER TABLE `lol_tb` DISABLE KEYS */;
INSERT INTO `lol_tb` VALUES ('VaHzrWk2gchdeECxmfe8XVBq6ic2','아기밍성',' ','IRON I'),('KM3XjSPZWWPG5ad4uuOvLEqqkPA2','아기밍성',NULL,NULL),('aLUJ5Y61fCZL4npe1ilnQttd8Mu1','애쉬의부모',NULL,NULL);
/*!40000 ALTER TABLE `lol_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ow_tb`
--

DROP TABLE IF EXISTS `ow_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ow_tb` (
  `googleid` varchar(2000) DEFAULT NULL,
  `ow_username` varchar(1000) DEFAULT NULL,
  `ow_dealer_tier` varchar(200) DEFAULT NULL,
  `ow_tanker_tier` varchar(200) DEFAULT NULL,
  `ow_healer_tier` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ow_tb`
--

LOCK TABLES `ow_tb` WRITE;
/*!40000 ALTER TABLE `ow_tb` DISABLE KEYS */;
INSERT INTO `ow_tb` VALUES ('VaHzrWk2gchdeECxmfe8XVBq6ic2','고기만두#31698',NULL,NULL,NULL),('KM3XjSPZWWPG5ad4uuOvLEqqkPA2','고기만두#31698',NULL,NULL,NULL),('aLUJ5Y61fCZL4npe1ilnQttd8Mu1','김치만두#31118',NULL,NULL,NULL);
/*!40000 ALTER TABLE `ow_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partyjoin_tb`
--

DROP TABLE IF EXISTS `partyjoin_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partyjoin_tb` (
  `ownerid` varchar(2000) DEFAULT NULL,
  `joinid` varchar(2000) DEFAULT NULL,
  `discord` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partyjoin_tb`
--

LOCK TABLES `partyjoin_tb` WRITE;
/*!40000 ALTER TABLE `partyjoin_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `partyjoin_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partypost_tb`
--

DROP TABLE IF EXISTS `partypost_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partypost_tb` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `googleid` varchar(2000) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `gametype` varchar(10) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `discord_address` varchar(1000) DEFAULT NULL,
  `user_tier` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partypost_tb`
--

LOCK TABLES `partypost_tb` WRITE;
/*!40000 ALTER TABLE `partypost_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `partypost_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pubg_tb`
--

DROP TABLE IF EXISTS `pubg_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pubg_tb` (
  `googleid` varchar(2000) DEFAULT NULL,
  `pubg_username` varchar(500) DEFAULT NULL,
  `pubg_solo_tier` varchar(200) DEFAULT NULL,
  `pubg_duo_tier` varchar(200) DEFAULT NULL,
  `pubg_squad_tier` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubg_tb`
--

LOCK TABLES `pubg_tb` WRITE;
/*!40000 ALTER TABLE `pubg_tb` DISABLE KEYS */;
INSERT INTO `pubg_tb` VALUES ('VaHzrWk2gchdeECxmfe8XVBq6ic2','HeroesOS','0','0','0'),('KM3XjSPZWWPG5ad4uuOvLEqqkPA2','HeroesOS',NULL,NULL,NULL),('aLUJ5Y61fCZL4npe1ilnQttd8Mu1','2tle',NULL,NULL,NULL);
/*!40000 ALTER TABLE `pubg_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tb` (
  `googleid` varchar(2000) DEFAULT NULL,
  `email` varchar(2000) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `lamppoint` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tb`
--

LOCK TABLES `user_tb` WRITE;
/*!40000 ALTER TABLE `user_tb` DISABLE KEYS */;
INSERT INTO `user_tb` VALUES ('VaHzrWk2gchdeECxmfe8XVBq6ic2','beckum8282@gmail.com','렁ㄴ밒ㄴ',0),('KM3XjSPZWWPG5ad4uuOvLEqqkPA2','beckum8282@naver.com','김민성',0),('aLUJ5Y61fCZL4npe1ilnQttd8Mu1','iam@hyunjun.xyz','2tle',0);
/*!40000 ALTER TABLE `user_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-14 20:13:22
