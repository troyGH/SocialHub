-- MySQL dump 10.16  Distrib 10.1.9-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: tvay
-- ------------------------------------------------------
-- Server version	10.1.9-MariaDB

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
-- Table structure for table `assignment1`
--

DROP TABLE IF EXISTS `assignment1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignment1` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `School` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COMMENT='StudentInformation';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment1`
--

LOCK TABLES `assignment1` WRITE;
/*!40000 ALTER TABLE `assignment1` DISABLE KEYS */;
INSERT INTO `assignment1` VALUES ('Aidan','Nguyen','Male','San Jose State University',25),('Michelle','Tran','Female','San Jose State University',20),('John','Doe','Male','San Jose State University',22);
/*!40000 ALTER TABLE `assignment1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `FirstName` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `LastName` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `Email` varchar(50) CHARACTER SET armscii8 NOT NULL,
  `Phone` varchar(50) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii COMMENT='ContactInformation';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES ('Aidan','Nguyen','aidan.nguyen@sjsu.edu','714-717-7525'),('Troy','Nguyen','troy.nguyen@sjsu.edu','916-420-4484'),('Vinay','Ponnaganti','vinay.ponnaganti@gmail.com','408-439-1277'),('Yu-Kai','Huang','onays1239210@gmail.com','');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-16 21:25:28
