-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: localteknis
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

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
-- Table structure for table `Camels`
--

DROP TABLE IF EXISTS `Camels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Camels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Camels`
--

LOCK TABLES `Camels` WRITE;
/*!40000 ALTER TABLE `Camels` DISABLE KEYS */;
INSERT INTO `Camels` VALUES (1,'2015-02-17 07:37:18','2015-02-17 07:37:18');
/*!40000 ALTER TABLE `Camels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CamelsOases`
--

DROP TABLE IF EXISTS `CamelsOases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CamelsOases` (
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `OaseId` int(11) NOT NULL DEFAULT '0',
  `CamelId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`OaseId`,`CamelId`),
  KEY `CamelId` (`CamelId`),
  CONSTRAINT `CamelsOases_ibfk_1` FOREIGN KEY (`OaseId`) REFERENCES `Oases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CamelsOases_ibfk_2` FOREIGN KEY (`CamelId`) REFERENCES `Camels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CamelsOases`
--

LOCK TABLES `CamelsOases` WRITE;
/*!40000 ALTER TABLE `CamelsOases` DISABLE KEYS */;
/*!40000 ALTER TABLE `CamelsOases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Oases`
--

DROP TABLE IF EXISTS `Oases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Oases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Oases`
--

LOCK TABLES `Oases` WRITE;
/*!40000 ALTER TABLE `Oases` DISABLE KEYS */;
INSERT INTO `Oases` VALUES (1,'2015-02-17 07:37:19','2015-02-17 07:37:19');
/*!40000 ALTER TABLE `Oases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `access_logs`
--

DROP TABLE IF EXISTS `access_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) DEFAULT NULL,
  `action` varchar(200) DEFAULT NULL,
  `ipaddr` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_logs`
--

LOCK TABLES `access_logs` WRITE;
/*!40000 ALTER TABLE `access_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `targetuser` varchar(30) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alerts`
--

LOCK TABLES `alerts` WRITE;
/*!40000 ALTER TABLE `alerts` DISABLE KEYS */;
/*!40000 ALTER TABLE `alerts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alter_routers`
--

DROP TABLE IF EXISTS `alter_routers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alter_routers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(200) DEFAULT NULL,
  `ip_public` varchar(15) DEFAULT NULL,
  `ip_private` varchar(15) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `milikpadinet` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alter_routers`
--

LOCK TABLES `alter_routers` WRITE;
/*!40000 ALTER TABLE `alter_routers` DISABLE KEYS */;
/*!40000 ALTER TABLE `alter_routers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alterexecutors`
--

DROP TABLE IF EXISTS `alterexecutors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alterexecutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `altergrade_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alterexecutors`
--

LOCK TABLES `alterexecutors` WRITE;
/*!40000 ALTER TABLE `alterexecutors` DISABLE KEYS */;
/*!40000 ALTER TABLE `alterexecutors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `altergrades`
--

DROP TABLE IF EXISTS `altergrades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `altergrades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `altertype` varchar(1) DEFAULT NULL COMMENT '"1" upgrade "0" downgrade',
  `client_site_id` int(11) DEFAULT NULL,
  `altertime` datetime DEFAULT NULL,
  `executiontime` datetime DEFAULT NULL,
  `trialstart` datetime DEFAULT NULL,
  `trialend` datetime DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `servicebefore` varchar(30) DEFAULT NULL,
  `serviceafter` varchar(30) DEFAULT NULL,
  `downtimeexists` varchar(1) DEFAULT '0',
  `downtime_hour_approximately` varchar(8) DEFAULT NULL,
  `description` text,
  `reason` text,
  `payable` varchar(1) DEFAULT '1',
  `active` varchar(1) DEFAULT '1',
  `status` varchar(1) DEFAULT '0',
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `altergrades`
--

LOCK TABLES `altergrades` WRITE;
/*!40000 ALTER TABLE `altergrades` DISABLE KEYS */;
/*!40000 ALTER TABLE `altergrades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_logs`
--

DROP TABLE IF EXISTS `app_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(40) DEFAULT NULL,
  `description` text,
  `ipaddr` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=394 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_logs`
--

LOCK TABLES `app_logs` WRITE;
/*!40000 ALTER TABLE `app_logs` DISABLE KEYS */;
INSERT INTO `app_logs` VALUES (1,'2015-04-06 03:11:12','Didik','login','192.168.0.193'),(2,'2015-04-06 06:22:37',NULL,'Logout','202.6.224.6'),(3,'2015-04-06 06:22:49','amir','login','202.6.224.6'),(4,'2015-04-06 22:04:26','puji','login','127.0.0.1'),(5,'2015-04-07 07:19:47','amir','login','202.6.224.6'),(6,'2015-04-07 07:33:36','amir','login','202.6.224.6'),(7,'2015-04-08 01:29:14','puji','login','202.6.224.6'),(8,'2015-04-08 02:50:54',NULL,'Logout','202.6.224.6'),(9,'2015-04-08 02:51:01','amir','login','202.6.224.6'),(10,'2015-04-08 04:11:24',NULL,'Logout','202.6.224.6'),(11,'2015-04-08 04:11:28','puji','login','202.6.224.6'),(12,'2015-04-09 08:20:20',NULL,'Logout','192.168.0.201'),(13,'2015-04-09 08:20:34','puji','login','192.168.0.201'),(14,'2015-04-09 08:21:05','yanto','login','192.168.0.193'),(15,'2015-04-09 08:22:17','jami','login','192.168.0.79'),(16,'2015-04-09 08:28:19','ketut','login','192.168.0.71'),(17,'2015-04-09 08:29:58','jami','login','192.168.0.79'),(18,'2015-04-09 08:32:12','sisca','login','192.168.0.93'),(19,'2015-04-09 08:32:39',NULL,'Logout','192.168.0.193'),(20,'2015-04-09 08:32:42','reinhard','login','192.168.0.91'),(21,'2015-04-09 08:33:00','yanto','login','192.168.0.193'),(22,'2015-04-09 08:40:54','dhoni','login','192.168.0.155'),(23,'2015-04-09 08:41:37','dwi','login','192.168.0.186'),(24,'2015-04-09 08:43:48','naning','login','192.168.0.183'),(25,'2015-04-09 08:54:45',NULL,'Logout','192.168.0.71'),(26,'2015-04-09 08:55:02','ketut','login','192.168.0.71'),(27,'2015-04-09 09:41:43','dhoni','login','192.168.0.155'),(28,'2015-04-09 09:46:57','dhani','login','192.168.0.95'),(29,'2015-04-09 09:58:33','reinhard','login','192.168.0.91'),(30,'2015-04-09 10:05:20','jami','login','192.168.0.79'),(31,'2015-04-09 10:05:55',NULL,'Logout','192.168.0.91'),(32,'2015-04-09 10:06:06','dhoni','login','192.168.0.91'),(33,'2015-04-09 10:06:16',NULL,'Logout','192.168.0.91'),(34,'2015-04-09 10:06:29','dwi','login','192.168.0.91'),(35,'2015-04-09 10:22:29',NULL,'Logout','192.168.0.183'),(36,'2015-04-09 10:30:23','jami','login','192.168.0.79'),(37,'2015-04-09 11:33:12',NULL,'Logout','192.168.0.93'),(38,'2015-04-09 23:02:54','Rega','login','192.168.0.195'),(39,'2015-04-10 07:05:38',NULL,'Logout','192.168.0.211'),(40,'2015-04-10 07:06:13','yudi','login','192.168.0.211'),(41,'2015-04-10 07:09:08',NULL,'Logout','192.168.0.211'),(42,'2015-04-10 08:01:18','ketut','login','192.168.0.71'),(43,'2015-04-10 08:14:41','yudi','login','192.168.0.200'),(44,'2015-04-10 08:15:01','dhani','login','192.168.0.160'),(45,'2015-04-10 08:15:47',NULL,'Logout','192.168.0.200'),(46,'2015-04-10 08:15:56','yudi','login','192.168.0.200'),(47,'2015-04-10 09:07:16',NULL,'Logout','192.168.0.200'),(48,'2015-04-10 09:07:23','yudi','login','192.168.0.200'),(49,'2015-04-10 09:07:44',NULL,'Logout','192.168.0.200'),(50,'2015-04-10 09:10:27','yudi','login','192.168.0.200'),(51,'2015-04-10 09:10:33',NULL,'Logout','192.168.0.200'),(52,'2015-04-10 09:10:48','yudi','login','192.168.0.200'),(53,'2015-04-10 09:10:56',NULL,'Logout','192.168.0.200'),(54,'2015-04-10 10:00:24',NULL,'Logout','192.168.0.71'),(55,'2015-04-10 10:05:12',NULL,'Logout','192.168.0.71'),(56,'2015-04-10 11:20:51','arif','login','192.168.0.217'),(57,'2015-04-10 11:29:41',NULL,'Logout','192.168.0.217'),(58,'2015-04-10 11:32:12','arif','login','192.168.0.217'),(59,'2015-04-10 12:00:20',NULL,'Logout','192.168.0.217'),(60,'2015-04-10 12:00:31','Kholis','login','192.168.0.217'),(61,'2015-04-10 12:19:46',NULL,'Logout','192.168.0.217'),(62,'2015-04-11 17:26:23','Didik','login','192.168.0.195'),(63,'2015-04-11 17:27:21',NULL,'Logout','192.168.0.195'),(64,'2015-04-12 13:02:39',NULL,'Logout','192.168.0.90'),(65,'2015-04-12 13:02:50','yanto','login','192.168.0.90'),(66,'2015-04-13 01:36:21','iwan','login','192.168.0.111'),(67,'2015-04-13 01:37:42',NULL,'Logout','192.168.0.111'),(68,'2015-04-13 01:59:18','yudi','login','192.168.0.200'),(69,'2015-04-13 02:12:50',NULL,'Logout','192.168.0.200'),(70,'2015-04-13 02:15:58','arif','login','192.168.0.195'),(71,'2015-04-13 02:16:34','Taufik','login','192.168.0.187'),(72,'2015-04-13 02:19:18',NULL,'Logout','192.168.0.195'),(73,'2015-04-13 02:19:24','amir','login','192.168.0.197'),(74,'2015-04-13 02:19:25','arif','login','192.168.0.195'),(75,'2015-04-13 02:20:49',NULL,'Logout','192.168.0.187'),(76,'2015-04-13 02:22:06',NULL,'Logout','192.168.0.195'),(77,'2015-04-13 03:03:58','ketut','login','192.168.0.71'),(78,'2015-04-13 03:15:43','dhani','login','192.168.0.95'),(79,'2015-04-13 03:22:18','yudi','login','192.168.0.200'),(80,'2015-04-13 03:27:19',NULL,'Logout','192.168.0.200'),(81,'2015-04-13 03:28:02','yanto','login','192.168.0.175'),(82,'2015-04-13 03:29:54',NULL,'Logout','192.168.0.95'),(83,'2015-04-13 03:30:05','dhani','login','192.168.0.95'),(84,'2015-04-13 03:35:02','Taufik','login','192.168.0.208'),(85,'2015-04-13 03:39:05',NULL,'Logout','192.168.0.208'),(86,'2015-04-13 03:40:45',NULL,'Logout','192.168.0.95'),(87,'2015-04-13 03:52:40','dhani','login','192.168.0.95'),(88,'2015-04-13 04:30:21','yanto','login','192.168.0.205'),(89,'2015-04-13 06:23:28','arif','login','192.168.0.195'),(90,'2015-04-13 06:26:42','Taufik','login','192.168.0.187'),(91,'2015-04-13 06:31:23',NULL,'Logout','192.168.0.187'),(92,'2015-04-13 09:34:00','ketut','login','192.168.0.213'),(93,'2015-04-13 09:34:10','ketut','login','192.168.0.213'),(94,'2015-04-13 09:51:56',NULL,'Logout','192.168.0.195'),(95,'2015-04-13 10:01:53','Didik','login','192.168.0.195'),(96,'2015-04-13 10:06:31',NULL,'Logout','192.168.0.195'),(97,'2015-04-13 10:06:41','Didik','login','192.168.0.195'),(98,'2015-04-13 10:06:48',NULL,'Logout','192.168.0.195'),(99,'2015-04-13 10:07:00','Didik','login','192.168.0.195'),(100,'2015-04-13 10:07:02',NULL,'Logout','192.168.0.195'),(101,'2015-04-13 10:07:53','Didik','login','192.168.0.195'),(102,'2015-04-13 10:08:04',NULL,'Logout','192.168.0.195'),(103,'2015-04-13 10:15:36','Didik','login','192.168.0.195'),(104,'2015-04-13 10:15:43',NULL,'Logout','192.168.0.195'),(105,'2015-04-13 10:15:56','arif','login','192.168.0.210'),(106,'2015-04-13 10:49:06',NULL,'Logout','192.168.0.210'),(107,'2015-04-13 11:24:47','Catur','login','192.168.0.154'),(108,'2015-04-13 11:56:15','Catur','login','192.168.0.154'),(109,'2015-04-13 12:51:45',NULL,'Logout','192.168.0.154'),(110,'2015-04-13 12:52:00','Catur','login','192.168.0.154'),(111,'2015-04-13 12:53:14',NULL,'Logout','192.168.0.154'),(112,'2015-04-13 12:53:30','Catur','login','192.168.0.154'),(113,'2015-04-13 12:53:35',NULL,'Logout','192.168.0.154'),(114,'2015-04-13 13:01:20','bagus','login','192.168.0.187'),(115,'2015-04-14 00:39:42','Rega','login','192.168.0.195'),(116,'2015-04-14 00:57:54',NULL,'Logout','192.168.0.195'),(117,'2015-04-14 01:06:27','Rega','login','192.168.0.195'),(118,'2015-04-14 01:07:16',NULL,'Logout','192.168.0.195'),(119,'2015-04-14 01:38:03','yudi','login','192.168.0.200'),(120,'2015-04-14 01:41:50','Catur','login','192.168.0.75'),(121,'2015-04-14 01:47:41','Suhartono','login','192.168.0.154'),(122,'2015-04-14 01:48:42',NULL,'Logout','192.168.0.75'),(123,'2015-04-14 01:58:35',NULL,'Logout','192.168.0.200'),(124,'2015-04-14 02:05:45','arif','login','192.168.0.195'),(125,'2015-04-14 02:11:58','Catur','login','192.168.0.75'),(126,'2015-04-14 02:22:49',NULL,'Logout','192.168.0.75'),(127,'2015-04-14 02:30:55',NULL,'Logout','192.168.0.195'),(128,'2015-04-14 05:20:36',NULL,'Logout','192.168.0.154'),(129,'2015-04-14 12:26:18','yanto','login','192.168.0.90'),(130,'2015-04-14 12:27:08','yanto','login','192.168.0.90'),(131,'2015-04-14 16:46:35',NULL,'Logout','192.168.0.187'),(132,'2015-04-14 16:47:11','Rega','login','192.168.0.187'),(133,'2015-04-14 16:48:06',NULL,'Logout','192.168.0.187'),(134,'2015-04-15 01:43:09','arif','login','192.168.0.210'),(135,'2015-04-15 03:00:35','yudi','login','192.168.0.200'),(136,'2015-04-15 04:15:05','Taufik','login','192.168.0.187'),(137,'2015-04-15 04:16:14',NULL,'Logout','192.168.0.197'),(138,'2015-04-15 04:16:26','amir','login','192.168.0.197'),(139,'2015-04-15 04:17:09',NULL,'Logout','192.168.0.200'),(140,'2015-04-15 04:18:29',NULL,'Logout','192.168.0.197'),(141,'2015-04-15 05:28:48',NULL,'Logout','192.168.0.187'),(142,'2015-04-15 08:53:15','amir','login','192.168.0.197'),(143,'2015-04-15 08:56:28','Kholis','login','192.168.0.195'),(144,'2015-04-15 08:59:20','amir','login','192.168.0.197'),(145,'2015-04-15 09:03:30',NULL,'Logout','192.168.0.197'),(146,'2015-04-15 09:03:53','Taufik','login','192.168.0.161'),(147,'2015-04-15 09:04:16','amir','login','192.168.0.197'),(148,'2015-04-15 09:04:31',NULL,'Logout','192.168.0.161'),(149,'2015-04-15 09:05:10',NULL,'Logout','192.168.0.197'),(150,'2015-04-15 09:17:47',NULL,'Logout','192.168.0.197'),(151,'2015-04-15 09:24:06',NULL,'Logout','192.168.0.195'),(152,'2015-04-15 09:24:26','Kholis','login','192.168.0.195'),(153,'2015-04-15 09:41:39','yudi','login','192.168.0.200'),(154,'2015-04-15 09:51:30',NULL,'Logout','192.168.0.200'),(155,'2015-04-15 10:54:31',NULL,'Logout','192.168.0.195'),(156,'2015-04-15 12:57:56','bagus','login','192.168.0.64'),(157,'2015-04-16 04:50:56','amir','login','192.168.0.197'),(158,'2015-04-16 05:13:41',NULL,'Logout','192.168.0.197'),(159,'2015-04-16 08:18:48','Kholis','login','192.168.0.195'),(160,'2015-04-16 09:49:32','arif','login','192.168.0.68'),(161,'2015-04-16 09:49:49','arif','login','192.168.0.68'),(162,'2015-04-16 10:16:41',NULL,'Logout','192.168.0.68'),(163,'2015-04-16 10:20:05','amir','login','192.168.0.197'),(164,'2015-04-16 10:36:37',NULL,'Logout','192.168.0.197'),(165,'2015-04-16 10:40:54','arif','login','192.168.0.187'),(166,'2015-04-16 10:45:35','Suhartono','login','192.168.0.154'),(167,'2015-04-16 10:46:26','Suhartono','login','192.168.0.154'),(168,'2015-04-16 12:19:15','Suhartono','login','192.168.0.154'),(169,'2015-04-16 12:20:52','Suhartono','login','192.168.0.154'),(170,'2015-04-16 12:59:14',NULL,'Logout','192.168.0.195'),(171,'2015-04-16 12:59:30','Suhartono','login','192.168.0.195'),(172,'2015-04-16 13:08:35',NULL,'Logout','192.168.0.195'),(173,'2015-04-16 14:44:43',NULL,'Logout','192.168.0.154'),(174,'2015-04-16 14:44:57','Catur','login','192.168.0.154'),(175,'2015-04-16 15:31:22','Catur','login','192.168.0.154'),(176,'2015-04-16 15:31:35','Catur','login','192.168.0.154'),(177,'2015-04-16 15:34:45',NULL,'Logout','192.168.0.154'),(178,'2015-04-17 00:23:09','yudi','login','192.168.0.200'),(179,'2015-04-17 00:32:25',NULL,'Logout','192.168.0.200'),(180,'2015-04-17 00:32:44','yudi','login','192.168.0.200'),(181,'2015-04-17 00:33:01',NULL,'Logout','192.168.0.200'),(182,'2015-04-17 00:50:59','yudi','login','192.168.0.200'),(183,'2015-04-17 00:53:17',NULL,'Logout','192.168.0.200'),(184,'2015-04-17 00:59:32','yudi','login','192.168.0.200'),(185,'2015-04-17 01:04:57',NULL,'Logout','192.168.0.200'),(186,'2015-04-17 01:43:14','Suhartono','login','192.168.0.211'),(187,'2015-04-17 02:16:54','amir','login','192.168.0.197'),(188,'2015-04-17 02:19:41',NULL,'Logout','192.168.0.197'),(189,'2015-04-17 02:19:48','amir','login','192.168.0.197'),(190,'2015-04-17 03:10:34','yudi','login','192.168.0.200'),(191,'2015-04-17 03:13:33',NULL,'Logout','192.168.0.200'),(192,'2015-04-17 07:51:07',NULL,'Logout','192.168.0.197'),(193,'2015-04-17 08:37:27','amir','login','192.168.0.197'),(194,'2015-04-17 08:37:56','Kholis','login','192.168.0.195'),(195,'2015-04-17 09:35:21',NULL,'Logout','192.168.0.91'),(196,'2015-04-17 09:35:35','reinhard','login','192.168.0.91'),(197,'2015-04-17 09:37:51',NULL,'Logout','192.168.0.91'),(198,'2015-04-17 09:38:11','reinhard','login','192.168.0.91'),(199,'2015-04-17 10:02:07',NULL,'Logout','192.168.0.197'),(200,'2015-04-17 12:33:25',NULL,'Logout','192.168.0.187'),(201,'2015-04-18 01:32:29',NULL,'Logout','192.168.0.195'),(202,'2015-04-19 14:31:47','yanto','login','192.168.0.90'),(203,'2015-04-20 01:19:57','arif','login','192.168.0.68'),(204,'2015-04-20 01:42:35','Suhartono','login','192.168.0.154'),(205,'2015-04-20 02:09:24','gilang','login','192.168.0.70'),(206,'2015-04-20 02:23:30','reinhard','login','192.168.0.206'),(207,'2015-04-20 02:29:47','yanto','login','192.168.0.185'),(208,'2015-04-20 02:35:43','reinhard','login','202.6.231.34'),(209,'2015-04-20 02:35:47','puji','login','202.6.224.6'),(210,'2015-04-20 02:36:36',NULL,'Logout','202.6.231.34'),(211,'2015-04-20 02:37:26','puji','login','202.6.224.6'),(212,'2015-04-20 02:38:22','reinhard','login','192.168.0.78'),(213,'2015-04-20 02:38:45',NULL,'Logout','192.168.0.78'),(214,'2015-04-20 02:41:08','reinhard','login','192.168.0.202'),(215,'2015-04-20 02:42:38',NULL,'Logout','192.168.0.202'),(216,'2015-04-20 02:46:10','yanto','login','192.168.0.185'),(217,'2015-04-20 02:46:44','yanto','login','192.168.0.185'),(218,'2015-04-20 02:47:23','jami','login','192.168.0.94'),(219,'2015-04-20 02:51:41','jami','login','192.168.0.94'),(220,'2015-04-20 02:57:01',NULL,'Logout','192.168.0.206'),(221,'2015-04-20 02:57:33','yanto','login','192.168.0.206'),(222,'2015-04-20 02:58:08','jami','login','192.168.0.76'),(223,'2015-04-20 03:00:50','reinhard','login','192.168.0.76'),(224,'2015-04-20 03:07:46','yudi','login','192.168.0.200'),(225,'2015-04-20 03:13:45',NULL,'Logout','192.168.0.200'),(226,'2015-04-20 03:38:03','yudi','login','192.168.0.200'),(227,'2015-04-20 03:40:27',NULL,'Logout','192.168.0.200'),(228,'2015-04-20 08:25:19','Suhartono','login','192.168.0.154'),(229,'2015-04-20 08:26:26','Suhartono','login','192.168.0.154'),(230,'2015-04-20 08:30:34','Suhartono','login','192.168.0.154'),(231,'2015-04-20 08:35:53','Suhartono','login','192.168.0.154'),(232,'2015-04-20 08:37:27','Suhartono','login','192.168.0.154'),(233,'2015-04-20 09:40:13','Rega','login','192.168.0.195'),(234,'2015-04-20 10:57:39',NULL,'Logout','192.168.0.195'),(235,'2015-04-21 05:48:32','Taufik','login','192.168.0.187'),(236,'2015-04-21 07:15:46','amir','login','192.168.0.197'),(237,'2015-04-21 07:17:43',NULL,'Logout','192.168.0.197'),(238,'2015-04-21 07:24:05','amir','login','192.168.0.197'),(239,'2015-04-21 07:45:12',NULL,'Logout','192.168.0.197'),(240,'2015-04-21 07:45:18','amir','login','192.168.0.197'),(241,'2015-04-21 08:01:54',NULL,'Logout','192.168.0.197'),(242,'2015-04-21 08:49:57','amir','login','192.168.0.197'),(243,'2015-04-21 08:55:08','yudi','login','192.168.0.200'),(244,'2015-04-21 09:01:08',NULL,'Logout','192.168.0.200'),(245,'2015-04-21 09:02:44',NULL,'Logout','192.168.0.197'),(246,'2015-04-21 09:11:32','dwi','login','192.168.0.186'),(247,'2015-04-21 09:23:21','yudi','login','192.168.0.200'),(248,'2015-04-21 09:25:15',NULL,'Logout','192.168.0.200'),(249,'2015-04-21 09:47:21',NULL,'Logout','192.168.0.154'),(250,'2015-04-21 22:03:53','arif','login','192.168.0.128'),(251,'2015-04-22 05:42:06','yudi','login','192.168.0.200'),(252,'2015-04-22 05:43:21',NULL,'Logout','192.168.0.200'),(253,'2015-04-22 05:57:38','gilang','login','192.168.0.75'),(254,'2015-04-22 07:57:28',NULL,'Logout','192.168.0.187'),(255,'2015-04-22 13:03:26','Suhartono','login','192.168.0.154'),(256,'2015-04-22 13:09:53',NULL,'Logout','192.168.0.154'),(257,'2015-04-23 01:26:26','arif','login','192.168.0.68'),(258,'2015-04-23 01:33:39','yudi','login','192.168.0.200'),(259,'2015-04-23 01:34:58',NULL,'Logout','192.168.0.200'),(260,'2015-04-23 02:29:12','Taufik','login','192.168.0.187'),(261,'2015-04-23 02:49:42',NULL,'Logout','192.168.0.79'),(262,'2015-04-23 02:49:44','jami','login','192.168.0.79'),(263,'2015-04-23 02:50:22',NULL,'Logout','192.168.0.68'),(264,'2015-04-23 02:50:27','arif','login','192.168.0.68'),(265,'2015-04-23 02:59:28','arif','login','192.168.0.68'),(266,'2015-04-23 03:06:58','gilang','login','192.168.0.75'),(267,'2015-04-23 03:13:48','yudi','login','192.168.0.200'),(268,'2015-04-23 03:14:23',NULL,'Logout','192.168.0.200'),(269,'2015-04-23 06:19:58',NULL,'Logout','192.168.0.187'),(270,'2015-04-23 06:38:33','Taufik','login','192.168.0.187'),(271,'2015-04-23 07:24:24',NULL,'Logout','192.168.0.187'),(272,'2015-04-24 00:48:31','yudi','login','192.168.0.200'),(273,'2015-04-24 00:49:00',NULL,'Logout','192.168.0.200'),(274,'2015-04-24 02:43:53','arif','login','192.168.0.195'),(275,'2015-04-24 03:50:32','amir','login','192.168.0.197'),(276,'2015-04-24 04:04:37','iwan','login','192.168.0.111'),(277,'2015-04-24 04:06:08',NULL,'Logout','192.168.0.197'),(278,'2015-04-24 04:06:14',NULL,'Logout','192.168.0.111'),(279,'2015-04-24 04:06:23','iwan','login','192.168.0.111'),(280,'2015-04-24 04:07:09',NULL,'Logout','192.168.0.111'),(281,'2015-04-24 04:09:56','Suhartono','login','192.168.0.154'),(282,'2015-04-24 04:57:30','Suhartono','login','192.168.0.154'),(283,'2015-04-24 06:22:59','Suhartono','login','192.168.0.154'),(284,'2015-04-24 08:45:06',NULL,'Logout','192.168.0.154'),(285,'2015-04-24 08:45:20','Catur','login','192.168.0.154'),(286,'2015-04-24 10:14:21','Catur','login','192.168.0.154'),(287,'2015-04-24 10:14:49','Catur','login','192.168.0.154'),(288,'2015-04-24 10:15:10','Catur','login','192.168.0.154'),(289,'2015-04-24 10:16:06',NULL,'Logout','192.168.0.195'),(290,'2015-04-24 10:16:22','Kholis','login','192.168.0.195'),(291,'2015-04-24 10:18:33',NULL,'Logout','192.168.0.154'),(292,'2015-04-24 10:19:14','Catur','login','192.168.0.154'),(293,'2015-04-24 10:20:21',NULL,'Logout','192.168.0.154'),(294,'2015-04-24 13:09:31','bagus','login','192.168.0.64'),(295,'2015-04-24 14:07:39','bagus','login','192.168.0.64'),(296,'2015-04-24 14:34:38',NULL,'Logout','192.168.0.64'),(297,'2015-04-24 14:35:15','bagus','login','192.168.0.64'),(298,'2015-04-24 14:45:40','bagus','login','192.168.0.64'),(299,'2015-04-24 15:01:40','bagus','login','192.168.0.64'),(300,'2015-04-24 15:03:35',NULL,'Logout','192.168.0.64'),(301,'2015-04-24 15:03:56','bagus','login','192.168.0.64'),(302,'2015-04-27 00:32:44','Didik','login','192.168.0.195'),(303,'2015-04-27 00:52:51','yudi','login','192.168.0.66'),(304,'2015-04-27 00:53:40',NULL,'Logout','192.168.0.66'),(305,'2015-04-27 01:47:12','Taufik','login','192.168.0.187'),(306,'2015-04-27 01:56:46',NULL,'Logout','192.168.0.154'),(307,'2015-04-27 09:25:48','yudi','login','192.168.0.66'),(308,'2015-04-27 09:26:35',NULL,'Logout','192.168.0.66'),(309,'2015-04-27 10:55:49','Suhartono','login','192.168.0.154'),(310,'2015-04-27 11:10:07','gilang','login','192.168.0.211'),(311,'2015-04-27 11:12:55',NULL,'Logout','192.168.0.154'),(312,'2015-04-27 11:13:05','Suhartono','login','192.168.0.154'),(313,'2015-04-27 11:17:04','Suhartono','login','192.168.0.154'),(314,'2015-04-27 11:19:52',NULL,'Logout','192.168.0.154'),(315,'2015-04-27 11:21:24','Suhartono','login','192.168.0.154'),(316,'2015-04-27 12:07:29','yanto','login','192.168.0.90'),(317,'2015-04-27 12:30:32','Suhartono','login','192.168.0.154'),(318,'2015-04-27 12:31:08','Rega','login','192.168.0.195'),(319,'2015-04-27 12:33:37',NULL,'Logout','192.168.0.154'),(320,'2015-04-27 12:34:01','Suhartono','login','192.168.0.154'),(321,'2015-04-27 12:38:28','Suhartono','login','192.168.0.154'),(322,'2015-04-27 12:39:00','Suhartono','login','192.168.0.154'),(323,'2015-04-27 12:39:21','Suhartono','login','192.168.0.154'),(324,'2015-04-27 12:41:38',NULL,'Logout','192.168.0.154'),(325,'2015-04-28 00:49:06','yudi','login','192.168.0.66'),(326,'2015-04-28 00:50:54',NULL,'Logout','192.168.0.66'),(327,'2015-04-28 00:51:01','yudi','login','192.168.0.66'),(328,'2015-04-28 00:51:05',NULL,'Logout','192.168.0.66'),(329,'2015-04-28 01:38:06','dhoni','login','192.168.0.153'),(330,'2015-04-28 02:26:56','Taufik','login','192.168.0.187'),(331,'2015-04-28 03:36:32',NULL,'Logout','192.168.0.154'),(332,'2015-04-28 03:36:46','Suhartono','login','192.168.0.154'),(333,'2015-04-28 04:45:18','yudi','login','192.168.0.66'),(334,'2015-04-28 04:48:27',NULL,'Logout','192.168.0.66'),(335,'2015-04-28 04:56:00','Suhartono','login','192.168.0.154'),(336,'2015-04-28 04:59:00',NULL,'Logout','192.168.0.187'),(337,'2015-04-28 05:01:26','Suhartono','login','192.168.0.154'),(338,'2015-04-29 03:32:54','puji','login','127.0.0.1'),(339,'2015-05-01 06:15:01','puji','login','127.0.0.1'),(340,'2015-05-01 06:16:14','puji','login','127.0.0.1'),(341,'2015-05-01 22:40:15','puji','login','127.0.0.1'),(342,'2015-05-02 22:54:08',NULL,'Logout','127.0.0.1'),(343,'2015-05-02 22:55:01','amir','login','127.0.0.1'),(344,'2015-05-02 22:55:40',NULL,'Logout','127.0.0.1'),(345,'2015-05-02 22:55:54','dhani','login','127.0.0.1'),(346,'2015-05-03 02:32:31','dhani','login','127.0.0.1'),(347,'2015-05-03 03:18:35','dhani','login','127.0.0.1'),(348,'2015-05-03 08:41:41','dhani','login','127.0.0.1'),(349,'2015-05-03 08:57:21','puji','login','192.168.0.14'),(350,'2015-05-03 09:00:04','puji','login','192.168.0.14'),(351,'2015-05-03 13:15:15','puji','login','127.0.0.1'),(352,'2015-05-03 13:23:15',NULL,'Logout','192.168.0.14'),(353,'2015-05-03 13:23:24','dhani','login','192.168.0.14'),(354,'2015-05-03 13:35:19',NULL,'Logout','127.0.0.1'),(355,'2015-05-03 13:35:29','dhani','login','127.0.0.1'),(356,'2015-05-04 09:25:32',NULL,'Logout','127.0.0.1'),(357,'2015-05-04 09:25:38','puji','login','127.0.0.1'),(358,'2015-05-04 14:04:13','puji','login','127.0.0.1'),(359,'2015-05-05 01:04:40','puji','login','127.0.0.1'),(360,'2015-05-05 01:43:50','puji','login','127.0.0.1'),(361,'2015-05-05 02:19:49',NULL,'Logout','127.0.0.1'),(362,'2015-05-05 02:19:57','amir','login','127.0.0.1'),(363,'2015-05-05 02:28:48','puji','login','127.0.0.1'),(364,'2015-05-05 08:59:59','puji','login','127.0.0.1'),(365,'2015-05-05 09:18:13','puji','login','127.0.0.1'),(366,'2015-05-06 01:34:44',NULL,'Logout','127.0.0.1'),(367,'2015-05-06 01:34:51','puji','login','127.0.0.1'),(368,'2015-05-06 02:14:06','puji','login','127.0.0.1'),(369,'2015-05-06 02:36:51','puji','login','127.0.0.1'),(370,'2015-05-12 06:10:16','puji','login','127.0.0.1'),(371,'2015-05-13 01:04:53',NULL,'Logout','127.0.0.1'),(372,'2015-05-13 01:05:05','puji','login','127.0.0.1'),(373,'2015-05-13 01:06:20',NULL,'Logout','127.0.0.1'),(374,'2015-05-13 01:06:51','puji','login','127.0.0.1'),(375,'2015-05-13 01:08:14',NULL,'Logout','127.0.0.1'),(376,'2015-05-13 01:08:37','Taufik','login','127.0.0.1'),(377,'2015-05-13 01:08:49',NULL,'Logout','127.0.0.1'),(378,'2015-05-13 01:09:08','Taufik','login','127.0.0.1'),(379,'2015-05-13 01:10:07',NULL,'Logout','127.0.0.1'),(380,'2015-05-13 01:10:14','Taufik','login','127.0.0.1'),(381,'2015-05-13 01:11:45',NULL,'Logout','127.0.0.1'),(382,'2015-05-13 01:11:52','Taufik','login','127.0.0.1'),(383,'2015-05-13 01:14:58',NULL,'Logout','127.0.0.1'),(384,'2015-05-13 01:15:05','Taufik','login','127.0.0.1'),(385,'2015-05-13 01:17:21',NULL,'Logout','127.0.0.1'),(386,'2015-05-13 01:17:27','Taufik','login','127.0.0.1'),(387,'2015-05-13 01:19:40',NULL,'Logout','127.0.0.1'),(388,'2015-05-13 01:19:50','puji','login','127.0.0.1'),(389,'2015-05-13 01:31:42',NULL,'Logout','127.0.0.1'),(390,'2015-05-13 01:31:54','puji','login','127.0.0.1'),(391,'2015-05-13 01:45:59',NULL,'Logout','127.0.0.1'),(392,'2015-05-13 01:46:04','puji','login','127.0.0.1'),(393,'2015-05-13 02:52:30','puji','login','127.0.0.1');
/*!40000 ALTER TABLE `app_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_settings`
--

DROP TABLE IF EXISTS `app_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(20) DEFAULT NULL,
  `per_page` smallint(6) DEFAULT NULL,
  `default_url` varchar(100) DEFAULT NULL,
  `page_segment` tinyint(4) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `header` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_settings`
--

LOCK TABLES `app_settings` WRITE;
/*!40000 ALTER TABLE `app_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (1,'Browsing','2012-08-29 02:16:41'),(2,'Email','2012-08-29 02:16:41'),(3,'Download','2012-08-29 02:16:41'),(4,'FTP','2012-08-29 02:16:41'),(5,'VOIP','2012-08-29 02:16:41'),(6,'VPN','2012-08-29 02:16:41'),(7,'CCTV','2012-08-29 02:16:41'),(8,'Online Game','2012-08-29 02:16:41'),(9,'Teleconference','2012-08-29 02:16:41');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aps`
--

DROP TABLE IF EXISTS `aps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btstower_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ipaddr` varchar(50) DEFAULT NULL,
  `description` text,
  `active` varchar(1) DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aps`
--

LOCK TABLES `aps` WRITE;
/*!40000 ALTER TABLE `aps` DISABLE KEYS */;
INSERT INTO `aps` VALUES (1,1,'AP Sutos (10.100.102.2)','10.100.102.2',NULL,'1','2012-12-06 18:54:23','puji'),(2,2,'AP Neo Pasuruan (10.100.100.118)','10.100.100.118',NULL,'1','2012-12-06 19:32:43','puji'),(3,2,'AP Neo Benjeng (10.100.100.67)','10.100.100.67',NULL,'1','2012-12-06 19:53:23','puji'),(4,2,'AP Neo Somerset (10.100.100.67)','10.100.100.67',NULL,'1','2012-12-06 19:54:58','puji'),(5,2,'AP Neo Timur (10.100.100.97)','10.100.100.97',NULL,'1','2014-03-03 08:34:21','puji'),(6,2,'AP Neo Dukuh Kupang (10.100.105.4)','10.100.105.4',NULL,'1','2014-03-03 08:34:21','puji'),(7,2,'AP Neo Artotel (10.100.100.94)','10.100.100.94',NULL,'1','2014-03-03 08:34:21','puji'),(8,2,'AP Neo Gwalk (10.100.100.69)','10.100.100.69',NULL,'1','2014-03-03 08:34:21','puji'),(9,2,'AP Neo Tenggara (10.100.100.86)','10.100.100.86',NULL,'1','2014-03-03 08:34:21','puji'),(10,2,'AP Neo Omni (117.102.226.226)','117.102.226.226',NULL,'1','2014-03-03 08:34:21','puji'),(11,2,'AP Neo Barat Boulevard (10.100.100.90)','10.100.100.90',NULL,'1','2014-03-03 08:34:21','puji'),(12,2,'AP Neo Selatan (10.100.100.125)','10.100.100.125',NULL,'1','2014-03-03 08:34:21','puji'),(13,2,'AP Neo Timur 2 (10.100.100.92)','10.100.100.92','','1','2014-03-03 08:34:21','puji'),(14,2,'AP Neo Barat (10.100.100.83)','10.100.100.83',NULL,'1','2014-03-03 08:34:21','puji'),(15,3,'AP Architect Barat Daya (10.100.100.35)','10.100.100.35',NULL,'1','2014-03-03 08:36:51','puji'),(16,3,'AP Architect Colors (10.100.100.59)','10.100.100.59',NULL,'1','2014-03-03 08:36:51','puji'),(17,3,'AP Architect Omni (10.100.100.33)','10.100.100.33',NULL,'1','2014-03-03 08:36:51','puji'),(18,3,'AP Architect CiptaDjajaMedika (10.100.100.4)','10.100.100.4',NULL,'1','2014-03-03 08:36:51','puji'),(19,3,'AP Architect Utara (10.100.100.22)','10.100.100.22',NULL,'1','2014-03-03 08:36:51','puji'),(20,3,'AP Architect Barat Laut (10.100.100.6)','10.100.100.6',NULL,'1','2014-03-03 08:36:51','puji'),(21,3,'AP Architect Barat Laut2 (10.100.100.17)','10.100.100.17',NULL,'1','2014-03-03 08:36:51','puji'),(22,3,'AP Architect Timur (10.100.100.12)','10.100.100.12',NULL,'1','2014-03-03 08:36:51','puji'),(23,3,'AP Architect Timur2 (10.100.100.61)','10.100.100.61',NULL,'1','2014-03-03 08:36:51','puji'),(24,3,'AP Architect Selatan (10.100.100.30)','10.100.100.30',NULL,'1','2014-03-03 08:36:51','puji'),(25,4,'AP Oracle Omni (10.100.100.147)','10.100.100.147',NULL,'0','2014-03-03 08:39:23','puji'),(26,4,'AP Oracle Selatan (10.100.100.148)','10.100.100.148',NULL,'0','2014-03-03 08:39:23','puji'),(27,4,'AP Oracle UPN (10.100.100.133)','10.100.100.133',NULL,'0','2014-03-03 08:39:23','puji'),(28,4,'AP Oracle Tenggara (10.100.100.138)','10.100.100.138',NULL,'0','2014-03-03 08:39:23','puji'),(29,4,'AP Oracle Tenggara2 (10.100.100.145)','10.100.100.145',NULL,'0','2014-03-03 08:39:23','puji'),(30,4,'AP Oracle Barat (10.100.100.135)','10.100.100.135',NULL,'0','2014-03-03 08:39:23','puji'),(31,5,'AP Smith Utara (10.100.103.11)','10.100.103.11',NULL,'0','2014-03-03 08:40:47','puji'),(32,5,'AP Smith Utara2 (10.100.103.20)','10.100.103.20',NULL,'0','2014-03-03 08:40:47','puji'),(33,5,'AP Smith Omni (117.102.226.250)','117.102.226.250',NULL,'0','2014-03-03 08:40:47','puji'),(34,5,'AP Smith Selatan (10.100.103.29)','10.100.103.29',NULL,'0','2014-03-03 08:40:47','puji'),(35,5,'AP Smith Barat (10.100.103.19)','10.100.103.19',NULL,'0','2014-03-03 08:40:47','puji'),(36,5,'AP Smith Barat2 (10.100.103.22)','10.100.103.22',NULL,'0','2014-03-03 08:40:47','puji'),(37,6,'AP Keymaker Barat (10.100.100.199)','10.100.100.199',NULL,'1','2014-03-03 08:42:16','puji'),(38,6,'AP Keymaker SDA(10.100.100.198)','10.100.100.198','','1','2014-03-03 08:42:16','puji'),(39,6,'AP Keymaker Ngoro (10.100.100.196)','10.100.100.196',NULL,'1','2014-03-03 08:42:16','puji'),(40,6,'AP Keymaker Timur Laut (10.100.100.210)','10.100.100.210',NULL,'1','2014-03-03 08:42:16','puji'),(41,6,'Ap Keymaker Utara (10.100.100.194)','10.100.100.194',NULL,'1','2014-03-03 08:42:16','puji'),(42,7,'AP Roland Panel (10.100.101.132)','10.100.101.132',NULL,'1','2014-03-03 08:43:34','puji'),(43,7,'AP Roland Omni (10.100.101.145)','10.100.101.145',NULL,'1','2014-03-03 08:43:35','puji'),(44,7,'AP Roland Selatan (10.100.101.133)','10.100.101.133',NULL,'1','2014-03-03 08:43:35','puji'),(45,8,'AP Cypher Barat Daya (10.100.102.68)','10.100.102.68',NULL,'1','2014-03-03 08:44:40','puji'),(46,8,'AP Cypher Selatan (10.100.102.66)','10.100.102.66',NULL,'1','2014-03-03 08:44:40','puji'),(47,8,'AP Cypher Selatan2 (10.100.102.71)','10.100.102.71',NULL,'1','2014-03-03 08:44:40','puji'),(48,9,'AP Twins Selatan (10.100.103.67)','10.100.103.67',NULL,'1','2014-03-03 08:45:53','puji'),(49,10,'AP Soren Timur Laut (10.100.101.68)','10.100.101.68',NULL,'1','2014-03-03 08:46:32','puji'),(50,11,'AP Niobe Barat (10.100.101.195)','10.100.101.195',NULL,'1','2014-03-03 08:47:59','puji'),(51,11,'AP Niobe Barat Laut (10.100.101.194)','10.100.101.194',NULL,'1','2014-03-03 08:47:59','puji'),(52,12,'AP Dozer Utara (10.100.103.132)','10.100.103.132',NULL,'1','2014-03-03 08:48:36','puji'),(53,2,'AP Neo Label (10.100.100.77)','10.100.100.77','AP untuk klien label jaya','1','2015-04-13 06:55:27','arif'),(54,3,'AP Architect Biliton (10.100.100.15)','10.100.100.15','','1','2015-04-13 07:01:13','arif'),(55,8,'AP Cypher Utara (10.100.102.72)','10.100.102.72','','1','2015-04-13 07:02:21','arif'),(56,8,'AP Cypher Barat (10.100.102.66)','10.100.102.66','','1','2015-04-13 07:02:46','arif'),(57,12,'AP Dozer Bunder (10.100.103.133)','10.100.103.133','','1','2015-04-13 07:04:04','arif'),(58,6,'AP Keymaker Timur 2 (10.100.100.220)','10.100.100.220','','1','2015-04-13 07:09:24','arif'),(59,4,'AP Oracle Timur Laut (10.100.100.130)','10.100.100.130','','1','2015-04-13 07:15:15','arif'),(60,7,'AP Roland Tenggara (10.100.101.137)','10.100.101.137','','1','2015-04-13 07:19:24','arif'),(61,10,'AP Soren Selatan (10.100.101.69)','10.100.101.69','','1','2015-04-13 07:21:06','arif'),(62,10,'AP Soren Barat (10.100.101.71)','10.100.101.71','','1','2015-04-13 07:21:37','arif'),(63,1,'AP Trinity Tenggara (10.100.102.6)','10.100.102.6','','1','2015-04-13 07:22:35','arif'),(64,5,'AP Trinity Timur Laut (10.100.110.11)','10.100.110.11','','1','2015-04-13 07:24:28','arif');
/*!40000 ALTER TABLE `aps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backbones`
--

DROP TABLE IF EXISTS `backbones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backbones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` text,
  `active` varchar(1) DEFAULT '1',
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backbones`
--

LOCK TABLES `backbones` WRITE;
/*!40000 ALTER TABLE `backbones` DISABLE KEYS */;
INSERT INTO `backbones` VALUES (1,1,'XL',NULL,'1','puji','2013-11-13 07:24:25'),(2,2,'Indosat',NULL,'1','puji','2013-11-13 07:24:28'),(3,1,'Icon+',NULL,'1','puji','2013-11-13 07:24:32'),(4,1,'Napinfo',NULL,'1','puji','2013-11-13 08:44:51'),(5,1,'Lintasarta',NULL,'1',NULL,'2014-03-03 08:15:12'),(6,1,'Telkom',NULL,'1',NULL,'2014-03-03 08:15:12'),(7,1,'OpenIXP',NULL,'1',NULL,'2014-03-03 08:15:12'),(8,1,'IIX-APJII',NULL,'1',NULL,'2014-03-03 08:15:12'),(9,1,'IIX-JI',NULL,'1',NULL,'2014-03-03 08:15:12'),(10,1,'CNI',NULL,'1',NULL,'2014-03-03 08:15:12'),(11,1,'SangatCepat',NULL,'1',NULL,'2014-03-03 08:15:12'),(12,1,'Maxindo',NULL,'1',NULL,'2014-03-03 08:15:12'),(13,1,'Indofiber',NULL,'1',NULL,'2014-03-03 08:15:12'),(14,1,'Jetcom',NULL,'1',NULL,'2014-03-03 08:15:12'),(15,1,'Jatakom',NULL,'1',NULL,'2014-03-03 08:15:12'),(16,1,'HTSolusi',NULL,'1',NULL,'2014-03-03 08:15:12'),(17,1,'Nusanet',NULL,'1',NULL,'2014-03-03 08:15:12'),(18,1,'BMP',NULL,'1',NULL,'2014-03-03 08:15:14'),(19,2,'MCS-IX','','1','jami','2015-04-09 09:24:01'),(20,2,'PGAS','','1','jami','2015-04-09 09:26:20'),(21,2,'PGAS-IX','','1','jami','2015-04-09 09:26:58');
/*!40000 ALTER TABLE `backbones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(20) DEFAULT NULL,
  `abbr` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'2014-10-10 08:51:26','Surabaya','S'),(2,'2014-10-10 08:51:33','Jakarta','J'),(3,'2014-10-10 08:51:42','Malang','M'),(4,'2014-10-10 08:51:51','Bali','B');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches_users`
--

DROP TABLE IF EXISTS `branches_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches_users` (
  `branch_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches_users`
--

LOCK TABLES `branches_users` WRITE;
/*!40000 ALTER TABLE `branches_users` DISABLE KEYS */;
INSERT INTO `branches_users` VALUES (3,9),(2,9),(4,9),(2,1),(3,1),(4,1),(2,11),(1,11),(1,2),(3,11),(4,11),(1,3),(1,4),(1,5),(1,6),(1,7),(2,7),(3,7),(4,7),(1,8),(1,9),(1,10),(1,12),(1,17),(2,17),(3,17),(4,17),(1,15),(1,27),(1,32),(2,32),(3,32),(4,32),(1,20),(2,18),(2,37),(1,13),(2,36),(2,6),(3,6),(4,6),(1,29),(4,50),(2,40),(1,52),(1,14),(1,19);
/*!40000 ALTER TABLE `branches_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `btstowers`
--

DROP TABLE IF EXISTS `btstowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `btstowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text,
  `active` varchar(1) DEFAULT '1' COMMENT '"0":deleted,"1":active',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `btstowers`
--

LOCK TABLES `btstowers` WRITE;
/*!40000 ALTER TABLE `btstowers` DISABLE KEYS */;
INSERT INTO `btstowers` VALUES (1,1,'Trinity (Mayjend)','Mayjend',NULL,'1','2014-03-03 08:26:42',NULL),(2,1,'Neo (Paragon)','Paragon','Paragon Hotel','1','2014-03-03 08:26:42',''),(3,1,'Architect (Garden)','Garden',NULL,'1','2014-03-03 08:26:42',NULL),(4,1,'Oracle (Label Jaya)','Label Jaya','','1','2014-03-03 08:26:42',''),(5,1,'Trinity New','Mayjen','','1','2014-03-03 08:26:42',''),(6,1,'Keymaker (Trosobo)','Trosobo',NULL,'1','2014-03-03 08:26:42',NULL),(7,1,'Roland (KBIH)','KBIH',NULL,'1','2014-03-03 08:26:42',NULL),(8,1,'Cypher (ColorsFM)','Colors FM',NULL,'1','2014-03-03 08:26:42',NULL),(9,1,'Twins (WarnaFM)','Warna FM',NULL,'1','2014-03-03 08:26:42',NULL),(10,1,'Soren (KTI)','KTI',NULL,'1','2014-03-03 08:26:42',NULL),(11,1,'Niobe (Swadaya)','Swadaya',NULL,'1','2014-03-03 08:26:42',NULL),(12,1,'Dozer (Unmuh)','Unmuh',NULL,'1','2014-03-03 08:26:42',NULL),(13,1,'Seraph','-','Seraph','1','2014-04-28 08:32:31',''),(14,1,'Morpheus','Raci','Morpheus','1','2014-04-28 08:33:59',''),(15,2,'Semeru','Malang','Malang','1','2014-04-28 09:02:13',''),(16,2,'Graha','Malang','Malang','1','2014-04-28 09:02:31',''),(17,2,'Agrobatu','Malang','Malang','1','2014-04-28 09:02:44',''),(18,2,'Precet','Malang','Malang','1','2014-04-28 09:03:01',''),(19,NULL,'Benoa','Benoa Square ','','1','2015-04-12 13:04:45',''),(20,NULL,'Kuta','Hotel Everyday Kuta','Central Park Patih Jelantik Kuta Bali','1','2015-04-12 13:05:54','');
/*!40000 ALTER TABLE `btstowers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets` DISABLE KEYS */;
INSERT INTO `budgets` VALUES (1,'2012-08-29 09:16:41','<350 rb'),(2,'2012-08-29 09:16:41','350 - 500 rb'),(3,'2012-08-29 09:16:41','500 - 750 rb'),(4,'2012-08-29 09:16:41','750rb - 1.5 jt'),(5,'2012-08-29 09:16:41','>1.5 jt - 3jt'),(6,'2012-08-29 09:16:41','>3 - 5 jt'),(7,'2012-08-29 09:16:41','>5 - 10 jt'),(8,'2012-08-29 09:16:41','>10 jt');
/*!40000 ALTER TABLE `budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_fields`
--

DROP TABLE IF EXISTS `business_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_fields`
--

LOCK TABLES `business_fields` WRITE;
/*!40000 ALTER TABLE `business_fields` DISABLE KEYS */;
INSERT INTO `business_fields` VALUES (1,'2012-08-29 09:16:41','Badan Usaha','1'),(2,'2012-08-29 09:16:41','Perorangan','1'),(3,'2012-08-29 09:16:41','Wargame','1'),(4,'2012-08-29 09:16:41','Institusi','1'),(5,'2015-04-07 07:21:25','Lainnya','1');
/*!40000 ALTER TABLE `business_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbreviation` varchar(1) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) DEFAULT NULL,
  `sendername` varchar(50) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `receivername` varchar(50) DEFAULT NULL,
  `unread` varchar(1) DEFAULT '1',
  `content` text,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,8,'amir',9,'dhani','1','Hello dhani','2015-05-03 02:13:16'),(2,13,'dhani',9,'amir','1','Hello amir','2015-05-03 02:13:34'),(3,8,'amir',9,'dhani','1','ono opo ?','2015-05-03 02:15:34'),(4,13,'dhani',9,'amir','1','gak popo','2015-05-03 02:15:47'),(5,13,'dhani',9,'amir','1','cumak ngetes aplikasi chat','2015-05-03 02:15:59'),(6,13,'dhani',9,'amir','1','cuanggih','2015-05-03 02:19:35'),(7,13,'dhani',9,'amir','1','ok puoll','2015-05-03 02:19:48'),(8,13,'dhani',9,'amir','1','mosok','2015-05-03 02:19:59'),(9,8,'amir',9,'dhani','1','iyo tah','2015-05-03 02:20:34'),(10,8,'amir',9,'dhani','1','test','2015-05-03 02:40:10'),(11,13,'dhani',9,NULL,'1','test juga','2015-05-03 02:40:33'),(12,13,'dhani',9,'Aji','1','test','2015-05-03 02:41:01'),(13,13,'dhani',34,'Akbar','1','hao akbar','2015-05-03 02:46:48'),(14,13,'dhani',27,'Bima','1','hao bima','2015-05-03 02:47:09'),(15,13,'dhani',43,'Aji','1','test gia','2015-05-03 02:49:04'),(16,13,'dhani',21,'Aden','1','xxxxxx','2015-05-03 02:55:18'),(17,13,'dhani',1,'administrator','1','sate','2015-05-03 02:55:31'),(18,13,'dhani',43,'Aji','1','fdsf','2015-05-03 02:55:44'),(19,13,'dhani',21,'Aden','1','test','2015-05-03 03:00:05'),(20,13,'dhani',34,'Akbar','1','hao akbar','2015-05-03 03:00:35'),(21,13,'dhani',8,'amir','0','hao amt','2015-05-03 04:22:49'),(22,8,'amir',13,'dhani','0','hao dhani','2015-05-03 04:23:39'),(23,17,'puji',13,'dhani','0','assalamu\'alykum','2015-05-03 09:00:39'),(24,13,'dhani',17,'puji','0','wa\'alaykum salam','2015-05-03 09:01:07'),(25,17,'puji',13,'dhani','0','bgm, app lancar?','2015-05-03 09:01:42'),(26,13,'dhani',17,'puji','0','iyes','2015-05-03 09:01:56'),(27,17,'puji',13,'dhani','0','alhamdulillah','2015-05-03 09:02:09'),(28,13,'dhani',17,'puji','0','wis bayaran ?','2015-05-03 09:03:34'),(29,17,'puji',13,'dhani','0','wis','2015-05-03 09:03:41'),(30,17,'puji',13,'dhani','0','sameyan durung tah?','2015-05-03 09:03:49'),(31,13,'dhani',17,'puji','0','wis','2015-05-03 09:04:05'),(32,17,'puji',13,'dhani','0','yo ws nek wis','2015-05-03 09:04:23'),(33,13,'dhani',17,'puji','0','oi','2015-05-03 09:15:41'),(34,13,'dhani',17,'puji','0','','2015-05-03 09:15:41'),(35,13,'dhani',17,'puji','0','test','2015-05-03 09:22:54'),(36,17,'puji',13,'dhani','0','sorryy error','2015-05-03 09:49:18'),(37,13,'dhani',17,'puji','0','napa ?','2015-05-03 09:57:40'),(38,17,'puji',13,'dhani','0','ngetes fitur baru','2015-05-03 09:57:57'),(39,17,'puji',13,'dhani','0','masih ada bug','2015-05-03 09:58:08'),(40,17,'puji',13,'dhani','0','sudah  normal skr','2015-05-03 10:00:27'),(41,13,'dhani',17,'puji','0','ok','2015-05-03 10:05:01'),(42,13,'dhani',17,'puji','0','halooo','2015-05-03 13:23:51'),(43,17,'puji',13,'dhani','0','holaa','2015-05-03 13:24:01'),(44,8,'amir',17,'puji','0','mas','2015-05-04 13:56:57'),(45,17,'puji',8,'amir','0','yoi','2015-05-04 13:57:22'),(46,8,'amir',17,'puji','0','ana error','2015-05-04 13:57:32'),(47,17,'puji',8,'amir','0','nopo?','2015-05-04 13:57:41'),(48,8,'amir',17,'puji','0','er','2015-05-04 13:57:52'),(49,17,'puji',8,'amir','0','tes','2015-05-04 22:19:31'),(50,17,'puji',8,'amir','0','test','2015-05-04 22:24:38'),(51,17,'puji',8,'amir','0','test 34','2015-05-04 22:25:28'),(52,8,'amir',17,'puji','0','xxxxx','2015-05-04 22:28:09'),(53,8,'amir',17,'puji','0','abcd','2015-05-04 22:30:55'),(54,8,'amir',17,'puji','0','halo','2015-05-05 00:57:23'),(55,8,'amir',17,'puji','0','0000','2015-05-05 01:32:23'),(56,8,'amir',17,'puji','0','zzzzzz','2015-05-05 01:42:34'),(57,8,'amir',17,'puji','0','test','2015-05-05 02:20:42'),(58,17,'puji',8,'amir','0','hola','2015-05-05 02:21:20'),(59,17,'puji',8,'amir','0','hie','2015-05-05 02:21:35');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) DEFAULT '0',
  `user_agent` varchar(100) DEFAULT NULL,
  `last_activity` int(10) unsigned DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('aaffe7c43f79f24054c9ab170f0abe20','202.6.224.6','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1428371271,'a:6:{s:8:\"identity\";s:16:\"amir@padi.net.id\";s:8:\"username\";s:4:\"amir\";s:5:\"email\";s:16:\"amir@padi.net.id\";s:7:\"user_id\";s:1:\"8\";s:14:\"old_last_login\";s:10:\"1427943191\";s:4:\"role\";s:5:\"Sales\";}'),('ebb3e78d0626210c66da8aaf4d333216','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1428358383,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1427943241\";s:4:\"role\";s:5:\"Sales\";}'),('93d87240c536336554feaf63a0dd5732','202.6.224.6','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1428391180,'a:6:{s:8:\"identity\";s:16:\"amir@padi.net.id\";s:8:\"username\";s:4:\"amir\";s:5:\"email\";s:16:\"amir@padi.net.id\";s:7:\"user_id\";s:1:\"8\";s:14:\"old_last_login\";s:10:\"1428301369\";s:4:\"role\";s:5:\"Sales\";}'),('ac4baa53d6d101384f6a36d376549789','192.168.0.201','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430198484,'a:7:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1428466288\";s:4:\"role\";s:5:\"Sales\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('cb2dae20c6d5d6a910bf44acdfa63142','202.6.224.6','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430103256,'a:7:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1428456554\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('d04560a44c878a7c852a6c787b36650d','192.168.0.79','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:37.0) Gecko',1428573911,'a:7:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1427367486\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('a8dfe12575c3fe845e57eedc23f2a353','192.168.0.71','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko',1428652849,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"ketut@padi.net.id\";s:8:\"username\";s:5:\"ketut\";s:5:\"email\";s:17:\"ketut@padi.net.id\";s:7:\"user_id\";s:1:\"9\";s:14:\"old_last_login\";s:10:\"1428568099\";s:4:\"role\";s:5:\"Sales\";}'),('a75d79baeb4714c4199ebc3afe3d2826','192.168.0.79','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53',1428983826,'a:7:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1428567737\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('608126c4903fde51ffd233c2a65ac1ba','192.168.0.93','Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0)',1428568186,NULL),('4d65353dbb2c55902030c2ab344f4b6f','192.168.0.91','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428570240,'a:6:{s:8:\"identity\";s:20:\"reinhard@padi.net.id\";s:8:\"username\";s:8:\"reinhard\";s:5:\"email\";s:20:\"reinhard@padi.net.id\";s:7:\"user_id\";s:2:\"10\";s:14:\"old_last_login\";s:10:\"1413443199\";s:4:\"role\";s:5:\"Sales\";}'),('2d5aa1c586f19af3406e7d8da39e73d8','192.168.0.93','Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/201001',1428579192,NULL),('a908cff739c2ab3cada241fdf587526f','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428620551,'a:6:{s:8:\"identity\";s:16:\"rega@padi.net.id\";s:8:\"username\";s:4:\"Rega\";s:5:\"email\";s:16:\"rega@padi.net.id\";s:7:\"user_id\";s:2:\"23\";s:14:\"old_last_login\";s:10:\"1427946153\";s:4:\"role\";s:2:\"TS\";}'),('92dda49c901fbc40009bab207f3e08d9','192.168.0.90','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko',1428844545,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1428568380\";s:4:\"role\";s:2:\"TS\";}'),('890cffdb24ea8dbd16c43404f9d5c9cb','192.168.0.186','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429607446,'a:7:{s:8:\"identity\";s:21:\"dwiwutomo@padi.net.id\";s:8:\"username\";s:3:\"dwi\";s:5:\"email\";s:21:\"dwiwutomo@padi.net.id\";s:7:\"user_id\";s:2:\"52\";s:14:\"old_last_login\";N;s:4:\"role\";s:5:\"Sales\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('20afa905e8a74929367f0344d6f90286','192.168.0.155','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1428572482,'a:6:{s:8:\"identity\";s:17:\"dhoni@padi.net.id\";s:8:\"username\";s:5:\"dhoni\";s:5:\"email\";s:17:\"dhoni@padi.net.id\";s:7:\"user_id\";s:2:\"12\";s:14:\"old_last_login\";s:10:\"1387506589\";s:4:\"role\";s:5:\"Sales\";}'),('ce86a3d1cc2655df059ce16cf75f2208','192.168.0.183','Mozilla/5.0 (Windows NT 6.1; rv:39.0) Gecko/201001',1428899605,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('c8eca88a7fc80808f431282aec9e734d','192.168.0.79','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:37.0) Gecko',1428575143,NULL),('1617b49a300f13751a11f488681f730c','192.168.0.155','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1428572482,NULL),('8494300fcce12fbd02a133b09a2033c0','192.168.0.155','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1428659920,'a:6:{s:8:\"identity\";s:17:\"dhoni@padi.net.id\";s:8:\"username\";s:5:\"dhoni\";s:5:\"email\";s:17:\"dhoni@padi.net.id\";s:7:\"user_id\";s:2:\"12\";s:14:\"old_last_login\";s:10:\"1428568854\";s:4:\"role\";s:5:\"Sales\";}'),('10b537174db7ad95cd4fe9827a0ee30a','192.168.0.95','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53',1429697025,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1415269098\";s:4:\"role\";s:5:\"Sales\";}'),('1b22450ab86745ead9d04df363ef4097','192.168.0.91','Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/201001',1428573955,NULL),('3716cc832a3496496dec897864145580','192.168.0.79','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:37.0) Gecko',1428573911,NULL),('87968e4968a2214a78e9c40967a3dcfd','192.168.0.79','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:37.0) Gecko',1428575143,'a:6:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1428568198\";s:4:\"role\";s:2:\"TS\";}'),('ee7a4f16ca31d23a408b5946768047ed','192.168.0.91','Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/201001',1428573955,NULL),('9a7a533ffc0434ba95dc370738f287e0','192.168.0.71','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko',1428652849,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('2ae3539ab3934644900ea6779a31c172','192.168.0.79','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:37.0) Gecko',1429757382,'a:6:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1429498688\";s:4:\"role\";s:2:\"TS\";}'),('038fa7f6f80ea9ff9e3b4a23076deb93','192.168.0.71','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko',1428660312,NULL),('0ecdc3f263dea118924a8b2bfc8bd80c','192.168.0.70','Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (K',1429495744,'a:6:{s:8:\"identity\";s:18:\"gilang@padi.net.id\";s:8:\"username\";s:6:\"gilang\";s:5:\"email\";s:18:\"gilang@padi.net.id\";s:7:\"user_id\";s:2:\"51\";s:14:\"old_last_login\";s:10:\"1427951257\";s:4:\"role\";s:2:\"TS\";}'),('7be6b0d3c39af42ab5dce0a60fd8c4e5','192.168.0.160','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1428660158,'a:7:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1428572817\";s:4:\"role\";s:5:\"Sales\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('1fc3122830d373fe86e5d2339574ecdd','192.168.0.213','Mozilla/5.0 (BlackBerry; U; BlackBerry 9860; en) A',1428917518,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"ketut@padi.net.id\";s:8:\"username\";s:5:\"ketut\";s:5:\"email\";s:17:\"ketut@padi.net.id\";s:7:\"user_id\";s:1:\"9\";s:14:\"old_last_login\";s:10:\"1428917640\";s:4:\"role\";s:5:\"Sales\";}'),('67f95ed90cf4e9eaf2e3d3aef41fac4c','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428773241,NULL),('9762b40331764401fbe60cd1c6cced6d','192.168.0.111','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429848429,NULL),('b733c0aa64ba06e810cc73a7c1d99504','192.168.0.200','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428894902,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('4bd278468b20a15b0c69d8ee774c548f','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428920143,NULL),('524705914b6821b1648489544e086762','192.168.0.71','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1430198049,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"ketut@padi.net.id\";s:8:\"username\";s:5:\"ketut\";s:5:\"email\";s:17:\"ketut@padi.net.id\";s:7:\"user_id\";s:1:\"9\";s:14:\"old_last_login\";s:10:\"1428652878\";s:4:\"role\";s:5:\"Sales\";}'),('d8b0a4e98f1775644291ee9f7a87b575','192.168.0.197','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429088291,'a:6:{s:8:\"identity\";s:16:\"amir@padi.net.id\";s:8:\"username\";s:4:\"amir\";s:5:\"email\";s:16:\"amir@padi.net.id\";s:7:\"user_id\";s:1:\"8\";s:14:\"old_last_login\";s:10:\"1429071386\";s:4:\"role\";s:5:\"Sales\";}'),('15e665ec96871d238e82f4b6e5df9ea5','192.168.0.205','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko',1430111222,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1428895682\";s:4:\"role\";s:2:\"TS\";}'),('c03056117bc8c27c64f4e5059d5b4671','192.168.0.95','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36',1430187688,'a:7:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1428895805\";s:4:\"role\";s:5:\"Sales\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('08233079d725df0dde685599f5cb6f40','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428978655,NULL),('b6694c0c8bff31c6935d81199300607f','192.168.0.175','Mozilla/5.0 (Windows NT 5.1; rv:37.0) Gecko/201001',1430183175,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1428843770\";s:4:\"role\";s:2:\"TS\";}'),('35bc8020babfd77b8e9c2c4bb185b162','192.168.0.208','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:37.0) Gecko',1428896345,NULL),('6284ca7ef983d08026ec6a8443d8d25d','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428924996,'a:7:{s:8:\"identity\";s:17:\"catur@padi.net.id\";s:8:\"username\";s:5:\"Catur\";s:5:\"email\";s:17:\"catur@padi.net.id\";s:7:\"user_id\";s:2:\"26\";s:14:\"old_last_login\";s:10:\"1427941228\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('cdabdb9bc4713f9c492a9625fcb5b928','192.168.0.68','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53',1429653493,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:16:\"arif@padi.net.id\";s:8:\"username\";s:4:\"arif\";s:5:\"email\";s:16:\"arif@padi.net.id\";s:7:\"user_id\";s:1:\"4\";s:14:\"old_last_login\";s:10:\"1429180854\";s:4:\"role\";s:2:\"TS\";}'),('319b8efba3c051c3ceac54295d259b30','192.168.0.167','Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/201001',1428909941,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('c9e5f03fbd32c55074e152bf13c5584c','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428924681,NULL),('43cc23206f294f64935472a282c07620','192.168.0.197','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429088291,NULL),('0b3162ec7dea08041c6c435818a0fee9','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1428973636,NULL),('bb94afb5827a6db71a87c767762e21f4','192.168.0.197','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429088292,NULL),('dafd7a305be050ae024916893b95f6e1','192.168.0.186','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429093849,NULL),('a53eaf8a9187880aed8333992da6b159','192.168.0.197','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429088292,NULL),('cc431e386a759fdd5b86bf45eadf8de7','192.168.0.197','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429088291,NULL),('909f5bac6ae2184dce996613a84b9353','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429180958,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1428976061\";s:4:\"role\";s:2:\"TS\";}'),('d3915015ce73c1735fbcb30bf1e5f33a','192.168.0.90','Mozilla/5.0 (Linux; U; Android 4.2.2; en-us; H30-U',1429496444,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1429014378\";s:4:\"role\";s:2:\"TS\";}'),('f2c5dc6471e1cff7965fc1e1dec6d124','192.168.0.75','Mozilla/5.0 (Windows NT 6.2; rv:35.0) Gecko/201001',1428978169,NULL),('30b3d99e193515d3fa8b6a1e034d00e2','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429103152,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('d31cea523610cd38dee7f774a8afbc4b','192.168.0.64','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1429878646,'a:7:{s:8:\"identity\";s:17:\"bagus@padi.net.id\";s:8:\"username\";s:5:\"bagus\";s:5:\"email\";s:17:\"bagus@padi.net.id\";s:7:\"user_id\";s:2:\"15\";s:14:\"old_last_login\";s:10:\"1428930080\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('04a0f9f1acbb7a54da1c9867f52b0c97','192.168.0.186','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429093849,NULL),('ef05c34d2c9e5a5f1eaa248b57fd6f84','192.168.0.161','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) Ap',1429088671,NULL),('1f2e0e3ce5afe48b473996e5d347973f','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429206562,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('e8e1400c19c9a05ca696c104fee83891','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429182877,'a:7:{s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1429181135\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('477f030a0c3b37e788c796f1de6beb9c','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429184238,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('a4bdead18ece599ca4e72f3c6370e0cc','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429184563,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('f45ee41b93f815adea0672f78aaa55c9','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429197530,'a:7:{s:8:\"identity\";s:17:\"catur@padi.net.id\";s:8:\"username\";s:5:\"Catur\";s:5:\"email\";s:17:\"catur@padi.net.id\";s:7:\"user_id\";s:2:\"26\";s:14:\"old_last_login\";s:10:\"1428977518\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('9ecde4711ab4f74bbe213a488830b66b','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429495654,'a:7:{s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1429234994\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('977282c37feeb2021912457a922a4721','192.168.0.90','Mozilla/5.0 (Linux; Android 4.2.2; H30-U10 Build/H',1429496913,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1429014428\";s:4:\"role\";s:2:\"TS\";}'),('a02b02684dc93c131dadb061755d5d8f','192.168.0.91','Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/201001',1429492935,'a:6:{s:8:\"identity\";s:20:\"reinhard@padi.net.id\";s:8:\"username\";s:8:\"reinhard\";s:5:\"email\";s:20:\"reinhard@padi.net.id\";s:7:\"user_id\";s:2:\"10\";s:14:\"old_last_login\";s:10:\"1429263335\";s:4:\"role\";s:5:\"Sales\";}'),('a0b7c510252fa19977f1051afccab077','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429704379,'a:7:{s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1429518953\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('003936f1084be9b17c8a953b8b06dca1','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429320749,NULL),('15230b3918c7ebdb7c9269b7e363a555','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429263459,NULL),('4f68ce425e2f73137935b20706dcae11','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429263459,NULL),('195f6d9d666583c22a3ca90fb9af70f1','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429496218,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('fbf886ebb793092dc186177212517a73','192.168.0.128','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53',1429752140,'a:7:{s:8:\"identity\";s:16:\"arif@padi.net.id\";s:8:\"username\";s:4:\"arif\";s:5:\"email\";s:16:\"arif@padi.net.id\";s:7:\"user_id\";s:1:\"4\";s:14:\"old_last_login\";s:10:\"1429492797\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('8b0666c290e4e935d60444c1a754a824','192.168.0.206','Mozilla/5.0 (Linux; U; Android 4.2.2; en-us; Polym',1429498621,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1429498004\";s:4:\"role\";s:2:\"TS\";}'),('68a328a8ad29dfae109329a3d3fcc8e3','192.168.0.76','Mozilla/5.0 (BB10; Touch) AppleWebKit/537.35+ (KHT',1429498643,'a:6:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1429498301\";s:4:\"role\";s:2:\"TS\";}'),('c459f2baebbb860c2565141a40b373f2','192.168.0.185','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36',1429497954,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1429497970\";s:4:\"role\";s:2:\"TS\";}'),('00844a5cae662b81e4f2d753149fa6ee','192.168.0.185','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/534.24',1429497905,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1429453907\";s:4:\"role\";s:2:\"TS\";}'),('c2ebb54f5ae6b50ebd13fa2562c36382','202.6.224.6','Mozilla/5.0 (Linux; Android 4.4.2; Smartfren Andro',1429498790,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1429497347\";s:4:\"role\";s:2:\"TS\";}'),('52d5b5c816df3576ec7fcd7dfb991dbf','202.6.231.34','Mozilla/5.0 (iPad; CPU OS 8_2 like Mac OS X) Apple',1429497396,NULL),('f07a78b2020a98f067c2714f18dd7430','192.168.0.78','Mozilla/5.0 (Linux; U; Android 4.1.2; en-US; GT-I8',1429497525,NULL),('76782e38914e497d44deaa577dc7683f','192.168.0.202','Mozilla/5.0 (Linux; Android 4.1.2; EVDO1000 Build/',1429497758,NULL),('5a941986bb424b93b47b085c02c9f74c','192.168.0.94','Mozilla/5.0 (iPhone; CPU iPhone OS 8_2 like Mac OS',1429497996,'a:6:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1428575423\";s:4:\"role\";s:2:\"TS\";}'),('e917b63a51ef68cced35a1538a634fae','192.168.0.94','Mozilla/5.0 (iPhone; CPU iPhone OS 8_2 like Mac OS',1429498252,'a:6:{s:8:\"identity\";s:19:\"zamroni@padi.net.id\";s:8:\"username\";s:4:\"jami\";s:5:\"email\";s:19:\"zamroni@padi.net.id\";s:7:\"user_id\";s:1:\"7\";s:14:\"old_last_login\";s:10:\"1429498043\";s:4:\"role\";s:2:\"TS\";}'),('ce9702b6059fd4a1e2926d7f0e36cefb','192.168.0.76','Mozilla/5.0 (BB10; Touch) AppleWebKit/537.35+ (KHT',1429498819,'a:6:{s:8:\"identity\";s:20:\"reinhard@padi.net.id\";s:8:\"username\";s:8:\"reinhard\";s:5:\"email\";s:20:\"reinhard@padi.net.id\";s:7:\"user_id\";s:2:\"10\";s:14:\"old_last_login\";s:10:\"1429497668\";s:4:\"role\";s:5:\"Sales\";}'),('5b39137bfd9a03c05a07c583e41aa302','192.168.0.186','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430196459,'a:7:{s:8:\"identity\";s:21:\"dwiwutomo@padi.net.id\";s:8:\"username\";s:3:\"dwi\";s:5:\"email\";s:21:\"dwiwutomo@padi.net.id\";s:7:\"user_id\";s:2:\"52\";s:14:\"old_last_login\";s:10:\"1428573989\";s:4:\"role\";s:5:\"Sales\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('157f08af199b35fbf4cfbd8ccc935884','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429609641,NULL),('0e645ee2cf60c1c2b9568a948d524023','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429527459,NULL),('79b4af7b0dd7a1e2b5ddbba8d2f59b92','192.168.0.197','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko',1429848973,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('0a4037b8318bafc622ec95cabb272eeb','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429704771,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('ffa48cb69fde8952f29796a4abb8f293','192.168.0.186','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429607446,NULL),('de380132e1759aec7dfb0175cef4867d','192.168.0.186','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429607446,NULL),('619709c72f194c363a47371012108980','192.168.0.75','Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (K',1429757733,'a:7:{s:8:\"identity\";s:18:\"gilang@padi.net.id\";s:8:\"username\";s:6:\"gilang\";s:5:\"email\";s:18:\"gilang@padi.net.id\";s:7:\"user_id\";s:2:\"51\";s:14:\"old_last_login\";s:10:\"1429495764\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('790ba24223a1a8a4e823bfb81429677a','202.6.224.6','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53',1429607533,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('d3bb5f1d8a01a279ead5d14679e14a16','192.168.0.75','Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (K',1429758065,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('d93ad40a5df4d0e7dfbf4966976d4614','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429704387,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('9a9643213508f456cad547931d8342db','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429705424,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('67a8e677bc23b80f073dc7b9f2b9c2b2','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429849911,'a:7:{s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1429707806\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('68159390ee1b568452651da4a440ca44','192.168.0.68','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53',1429751593,NULL),('29be12933b67168488a3568b2c2753a1','192.168.0.68','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53',1429757736,'a:7:{s:8:\"identity\";s:16:\"arif@padi.net.id\";s:8:\"username\";s:4:\"arif\";s:5:\"email\";s:16:\"arif@padi.net.id\";s:7:\"user_id\";s:1:\"4\";s:14:\"old_last_login\";s:10:\"1429752386\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('62125038bcd25dd388e4067539baa62b','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429850229,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('10f4a1e49f300e747864ceeaeb76a90c','192.168.0.187','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gec',1429769998,NULL),('8e4a3cabb95b4060fb2517359b3bd163','192.168.0.187','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gec',1429769998,NULL),('eef7fb72c4d0581eae845166338287af','192.168.0.68','Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53',1430098825,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:16:\"arif@padi.net.id\";s:8:\"username\";s:4:\"arif\";s:5:\"email\";s:16:\"arif@padi.net.id\";s:7:\"user_id\";s:1:\"4\";s:14:\"old_last_login\";s:10:\"1429757427\";s:4:\"role\";s:2:\"TS\";}'),('a33b3b5c884ebb37c5d14b89aaac72ef','192.168.0.75','Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (K',1430132346,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:18:\"gilang@padi.net.id\";s:8:\"username\";s:6:\"gilang\";s:5:\"email\";s:18:\"gilang@padi.net.id\";s:7:\"user_id\";s:2:\"51\";s:14:\"old_last_login\";s:10:\"1429682258\";s:4:\"role\";s:2:\"TS\";}'),('718f5ab7585103517920dfcf1134f1a2','192.168.0.187','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gec',1429773864,NULL),('17bf2afc0e863de41ee10eb8711b5cd2','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429955898,'a:7:{s:8:\"identity\";s:18:\"kholis@padi.net.id\";s:8:\"username\";s:6:\"Kholis\";s:5:\"email\";s:18:\"kholis@padi.net.id\";s:7:\"user_id\";s:2:\"22\";s:14:\"old_last_login\";s:10:\"1429259876\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('476d58cc90f7fbbc9548af03420fcb70','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430135361,'a:7:{s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1430133424\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('bc231682e56011201c718fe6de0d58ab','192.168.0.175','Mozilla/5.0 (Windows NT 5.1; rv:37.0) Gecko/201001',1430102880,NULL),('a26133e3118a9f79e79ba8f531b340d6','192.168.0.175','Mozilla/5.0 (Windows NT 5.1; rv:37.0) Gecko/201001',1430102880,NULL),('e0b0ad15404aad68c9121e98fd978ff0','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1429869773,'a:7:{s:8:\"identity\";s:17:\"catur@padi.net.id\";s:8:\"username\";s:5:\"Catur\";s:5:\"email\";s:17:\"catur@padi.net.id\";s:7:\"user_id\";s:2:\"26\";s:14:\"old_last_login\";s:10:\"1429198295\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('86aa40e73798e3511f061f3faaa60892','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430138498,NULL),('ae19028ded7dcee539b29ae4820ac230','192.168.0.64','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1429879456,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('060fdc44e548f043306758a901e19265','192.168.0.64','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1429883419,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"bagus@padi.net.id\";s:8:\"username\";s:5:\"bagus\";s:5:\"email\";s:17:\"bagus@padi.net.id\";s:7:\"user_id\";s:2:\"15\";s:14:\"old_last_login\";s:10:\"1429102676\";s:4:\"role\";s:2:\"TS\";}'),('2759b9541e9a4c5e6035608ec52ed555','192.168.0.64','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1429886435,'a:7:{s:8:\"identity\";s:17:\"bagus@padi.net.id\";s:8:\"username\";s:5:\"bagus\";s:5:\"email\";s:17:\"bagus@padi.net.id\";s:7:\"user_id\";s:2:\"15\";s:14:\"old_last_login\";s:10:\"1429884459\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('70687b480ff77a73fbfdde4571edf3e2','192.168.0.64','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1429887067,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"bagus@padi.net.id\";s:8:\"username\";s:5:\"bagus\";s:5:\"email\";s:17:\"bagus@padi.net.id\";s:7:\"user_id\";s:2:\"15\";s:14:\"old_last_login\";s:10:\"1429886115\";s:4:\"role\";s:2:\"TS\";}'),('d0020257657c5e6e54ffb061d1f9bc10','192.168.0.64','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K',1429887815,'a:6:{s:8:\"identity\";s:17:\"bagus@padi.net.id\";s:8:\"username\";s:5:\"bagus\";s:5:\"email\";s:17:\"bagus@padi.net.id\";s:7:\"user_id\";s:2:\"15\";s:14:\"old_last_login\";s:10:\"1429887700\";s:4:\"role\";s:2:\"TS\";}'),('a35dd03020af079625afcae94cc08024','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430094730,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:17:\"didik@padi.net.id\";s:8:\"username\";s:5:\"Didik\";s:5:\"email\";s:17:\"didik@padi.net.id\";s:7:\"user_id\";s:2:\"20\";s:14:\"old_last_login\";s:10:\"1428920136\";s:4:\"role\";s:2:\"TS\";}'),('ac01607b8bf114112387f92d2d351cf9','192.168.0.187','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gec',1430139255,'a:7:{s:8:\"identity\";s:18:\"taufik@padi.net.id\";s:8:\"username\";s:6:\"Taufik\";s:5:\"email\";s:18:\"taufik@padi.net.id\";s:7:\"user_id\";s:2:\"19\";s:14:\"old_last_login\";s:10:\"1429771113\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('f7235e7b8445266941e409a0cd1f2397','192.168.0.211','Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (K',1430132673,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('58d759bd459c4cc7b98965ae8e7bfe6e','192.168.0.211','Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (K',1430132997,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:18:\"gilang@padi.net.id\";s:8:\"username\";s:6:\"gilang\";s:5:\"email\";s:18:\"gilang@padi.net.id\";s:7:\"user_id\";s:2:\"51\";s:14:\"old_last_login\";s:10:\"1429758418\";s:4:\"role\";s:2:\"TS\";}'),('2739a93c24fea56cc69b0ede8eae9bf6','192.168.0.153','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430185061,'a:6:{s:8:\"identity\";s:17:\"dhoni@padi.net.id\";s:8:\"username\";s:5:\"dhoni\";s:5:\"email\";s:17:\"dhoni@padi.net.id\";s:7:\"user_id\";s:2:\"12\";s:14:\"old_last_login\";s:10:\"1428573966\";s:4:\"role\";s:5:\"Sales\";}'),('de435141a787754a011eac494e4752d4','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430135685,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('2b2ca88b7cfb86171176f30baa46dfa1','192.168.0.90','Mozilla/5.0 (Linux; Android 4.2.2; H30-U10 Build/H',1430136433,'a:6:{s:8:\"identity\";s:17:\"yanto@padi.net.id\";s:8:\"username\";s:5:\"yanto\";s:5:\"email\";s:17:\"yanto@padi.net.id\";s:7:\"user_id\";s:2:\"16\";s:14:\"old_last_login\";s:10:\"1429498653\";s:4:\"role\";s:2:\"TS\";}'),('09a58bff63743d58be9bac746b9c475b','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430193000,'a:7:{s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1430138361\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('33598a036c04ebb9cd07bc357f5de363','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430137846,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:16:\"rega@padi.net.id\";s:8:\"username\";s:4:\"Rega\";s:5:\"email\";s:16:\"rega@padi.net.id\";s:7:\"user_id\";s:2:\"23\";s:14:\"old_last_login\";s:10:\"1429522813\";s:4:\"role\";s:2:\"TS\";}'),('410343a7bb78267d20a9167c51959a08','192.168.0.195','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430186741,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('c3040d29af0c93c70216d97a265297bc','192.168.0.187','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:20.0) Gec',1430197140,NULL),('5276bd7dece28cfcf964a1fcaf979c23','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430193441,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('de5b42464cf341de35ee2a8bc9e574e2','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430195224,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('2baf6645c01b6df7397f9fbc588aaf5c','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430196944,'a:1:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('a5e441d89a0e7c03e82eca693e971b4b','192.168.0.66','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430196507,NULL),('183613d58d72f2c71df372d5f34e2208','192.168.0.154','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K',1430197281,'a:7:{s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";s:8:\"identity\";s:21:\"suhartono@padi.net.id\";s:8:\"username\";s:9:\"Suhartono\";s:5:\"email\";s:21:\"suhartono@padi.net.id\";s:7:\"user_id\";s:2:\"25\";s:14:\"old_last_login\";s:10:\"1430196960\";s:4:\"role\";s:2:\"TS\";}'),('9a3e0db0d4226b61a2581f0191c093f5','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430275171,NULL),('4629d76f94c6ae80373e8ab70eb559e3','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430275171,NULL),('fe75b2c5240e2a54727cb69488b3a25a','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430790223,'a:6:{s:8:\"identity\";s:16:\"amir@padi.net.id\";s:8:\"username\";s:4:\"amir\";s:5:\"email\";s:16:\"amir@padi.net.id\";s:7:\"user_id\";s:1:\"8\";s:14:\"old_last_login\";s:10:\"1429847432\";s:4:\"role\";s:5:\"Sales\";}'),('a67a4c73862af230998328bfd9199e6d','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430519976,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430460901\";s:4:\"role\";s:5:\"Sales\";}'),('1c8d69f80a2b3fbe9731ff988eac4bd2','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430620144,'a:6:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1428897160\";s:4:\"role\";s:5:\"Sales\";}'),('f84eb0781dfb609ad7d37e223ec5a4ce','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430623058,'a:6:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1430607353\";s:4:\"role\";s:5:\"Sales\";}'),('baf524348ac5adec89252d501707f516','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430620483,NULL),('949798180274b46d13e3df063f7205f4','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430622311,NULL),('4480c1b05889c36f3781438cbbf007d4','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430623058,NULL),('9dc5d72a4305b81cb328e3801b93e4b3','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430642467,'a:6:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1430620351\";s:4:\"role\";s:5:\"Sales\";}'),('427fe0501a2bba8bad1f77bde247c261','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430626048,NULL),('66014f14c8581b31a84c1b093c430c1f','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430658864,'a:6:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1430623115\";s:4:\"role\";s:5:\"Sales\";}'),('0687a9b69c8c6c39b442440c28bb3d67','192.168.0.14','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430643424,'a:5:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430520015\";}'),('cfae1bff0faec25780fba871dcf8181e','192.168.0.14','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430659395,'a:6:{s:8:\"identity\";s:17:\"dhani@padi.net.id\";s:8:\"username\";s:5:\"dhani\";s:5:\"email\";s:17:\"dhani@padi.net.id\";s:7:\"user_id\";s:2:\"13\";s:14:\"old_last_login\";s:10:\"1430642501\";s:4:\"role\";s:5:\"Sales\";}'),('68f2d498c6119c0e472661c3fd3377ad','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430660119,NULL),('e303d6c10f6fc0ab7b66333666b50f0f','192.168.0.14','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430747675,NULL),('84b2875611a4ade1bc66b9731d67f039','192.168.0.14','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430747675,NULL),('0acb1aadf257adfa63e3b8244937ef61','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430748234,'a:7:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430658915\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('1c44a2cea23fcbb1a67624386c18dcc8','192.168.0.14','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430747677,NULL),('7fde4e35ccce2d157566643cb9fea623','192.168.0.14','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430747677,NULL),('9ced65e555c9cb4959410fb38460022d','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430748234,NULL),('32234ed2a8a470d110d88f4b891ea1f8','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430787733,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430731538\";s:4:\"role\";s:5:\"Sales\";}'),('0e7021e315ee811bba6698762cc73273','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430787733,NULL),('5adae9153d34b110c745362bc993ff62','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430792901,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430748253\";s:4:\"role\";s:5:\"Sales\";}'),('c008af7531151cebd6a3a9873d090258','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430788075,NULL),('5a77db4469893363cb3d9e40e3414163','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430789448,NULL),('2926340864fee4193a6f84038655a64a','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430790137,NULL),('1ca5d1b974fee1812eb6a4ac644e503b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430877773,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430817493\";s:4:\"role\";s:2:\"TS\";}'),('a228e96c7bc291fb2e99644f760e8922','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430792579,NULL),('ab24bab769c03dca767024e9eb652408','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430792579,NULL),('67c25b1adac6ca729f375d6c73ad1e50','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430792579,NULL),('b8243a8a72c91669014db8dea80b1b92','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430795061,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430790230\";s:4:\"role\";s:2:\"TS\";}'),('4f1199b53400db7a90dc2c6fab29314f','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430816461,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430792928\";s:4:\"role\";s:2:\"TS\";}'),('ffe79999f995127808e1546068bcf567','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430795439,NULL),('f42811212827d1c14697c07c5fd5a696','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430796249,NULL),('875bafa74a8d0f06ab1656500d50729a','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430796597,NULL),('13e6cfb8ac807c7e0060ab213bbc160b','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430797470,NULL),('ee96556393b9b013a7066c46ce99b3f3','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430797971,NULL),('cb7cb4a045b9d018891573376a8df0ee','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430798391,NULL),('6378f3ef41b24ed42ec5eba60c5a7b57','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430799426,NULL),('13ecce8597d5114c055f03aa9d300361','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430806887,NULL),('e376f7598023997536a0f3722b6cd7ac','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430807439,NULL),('b21bcc58ef4912c56995226b211c6dfd','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430807928,NULL),('92cdc0b12864881e1c6ed31adfc84320','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430808462,NULL),('7947a58600120f8ddf4270d78dd989f0','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430810081,NULL),('6845b713d5bd4dcaf894ba0a92233399','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430810433,NULL),('a285b10e9eb844383848c779fe5780bf','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430810790,NULL),('bed738473e450571dfde008c66cf1c54','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430811192,NULL),('04f4514f8dcbfab7d777ea705057060c','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430814676,NULL),('73b997bafc4c05f82134eb0c6a544b2a','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430815305,NULL),('87dc4f72734ca945ac2b18adffd1d92a','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430815608,NULL),('c8e92e47af01139166dcaee26caabb9b','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430816144,NULL),('928efbc89a2e6e1a9c081da7664a87e8','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1431488229,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1431481564\";s:4:\"role\";s:2:\"TS\";}'),('aa408ffc70a847c4c8d7b726c3c10fa4','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1430819337,NULL),('f9266fa11c97229ffd4aef8af14a1bb4','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430877773,NULL),('2c58afc9fa609d32e64014c4e5cd732d','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430879653,'a:7:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430876091\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('89b8583c97d85aedea730d132ae01883','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430879653,NULL),('0d53b0d782cbdc98649b001262e00a7f','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430905104,'a:7:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1430878446\";s:4:\"role\";s:2:\"TS\";s:11:\"pending_url\";s:30:\"https://teknis/surveys/edit/13\";}'),('824bb3b5b8a34c2e99b67d0cef23f442','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430883483,NULL),('fa68e30ce59c3b6f461016d2bc412dd1','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430895851,NULL),('b3bec8c55f318fa068fa431895cb7f71','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1430902014,NULL),('79590455398f70b513b056f08e9072a1','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:37.0) Gecko/20100',1431485375,'a:6:{s:8:\"identity\";s:16:\"puji@padi.net.id\";s:8:\"username\";s:4:\"puji\";s:5:\"email\";s:16:\"puji@padi.net.id\";s:7:\"user_id\";s:2:\"17\";s:14:\"old_last_login\";s:10:\"1431480714\";s:4:\"role\";s:2:\"TS\";}'),('af4ea9651765bc4184ffdf1636bb00bf','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (',1431479841,'a:7:{s:11:\"pending_url\";s:56:\"https://teknis/install_requests/install_edit/favicon.ico\";s:8:\"identity\";s:18:\"taufik@padi.net.id\";s:8:\"username\";s:6:\"Taufik\";s:5:\"email\";s:18:\"taufik@padi.net.id\";s:7:\"user_id\";s:2:\"19\";s:14:\"old_last_login\";s:10:\"1431479705\";s:4:\"role\";s:2:\"TS\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Surabaya','Kota Pahlawan','1','0000-00-00 00:00:00',NULL),(2,'Sidoarjo',NULL,'1','0000-00-00 00:00:00',NULL),(3,'Gresik','Gersikx','0','0000-00-00 00:00:00',NULL),(5,'Malang','Malang melintang','1','2012-09-21 00:57:50',NULL),(6,'Pasuruan','','1','2012-09-21 01:04:05',NULL),(7,'Mojokerto','Mojokerto','1','2012-09-21 01:04:23',NULL),(8,'Jombang','Jombang','1','2012-09-21 01:04:45',NULL),(9,'Jember','','1','2012-09-21 01:05:00',NULL),(10,'Banyuwangi','Banyuwangi','1','2012-09-21 01:05:11',NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_applications`
--

DROP TABLE IF EXISTS `client_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_applications`
--

LOCK TABLES `client_applications` WRITE;
/*!40000 ALTER TABLE `client_applications` DISABLE KEYS */;
INSERT INTO `client_applications` VALUES (1,16,'2014-10-28 08:55:54','Browsing'),(2,16,'2014-10-28 08:55:54','Download'),(3,16,'2014-10-28 08:55:54','Email'),(4,20,'2014-12-15 02:05:31','Browsing'),(5,20,'2014-12-15 02:05:31','Email'),(6,20,'2014-12-15 02:05:32','Download'),(7,20,'2014-12-15 02:05:32','FTP'),(8,20,'2014-12-15 02:05:32','VOIP'),(9,25,'2015-03-26 08:20:31','Browsing'),(10,25,'2015-03-26 08:20:31','Email'),(11,25,'2015-03-26 08:20:31','streaming'),(12,1,'2015-04-09 08:35:07','Browsing'),(13,1,'2015-04-09 08:35:07','Email'),(14,1,'2015-04-09 08:35:07','Download'),(15,3,'2015-04-09 08:45:56','Browsing'),(16,3,'2015-04-09 08:45:56','Email'),(17,3,'2015-04-09 08:45:56','Download'),(18,3,'2015-04-09 08:45:56','FTP'),(19,5,'2015-04-09 08:48:04','Browsing'),(20,5,'2015-04-09 08:48:04','Email'),(21,5,'2015-04-09 08:48:05','FTP'),(22,6,'2015-04-10 08:28:27','FTP'),(23,7,'2015-04-10 08:28:37','Browsing'),(24,7,'2015-04-10 08:28:37','Email'),(25,7,'2015-04-10 08:28:37','Download'),(26,9,'2015-04-10 08:31:14','Browsing'),(27,9,'2015-04-10 08:31:14','Email'),(28,9,'2015-04-10 08:31:14','Download'),(29,9,'2015-04-10 08:31:14','CCTV'),(30,1,'2015-04-13 02:08:21','Browsing'),(31,1,'2015-04-13 02:08:21','Email'),(32,1,'2015-04-13 02:08:21','Download'),(33,6,'2015-04-15 09:45:23','Browsing'),(34,6,'2015-04-15 09:45:23','Email'),(35,6,'2015-04-15 09:45:23','Download'),(36,6,'2015-04-15 09:45:24','FTP'),(37,21,'2015-04-27 03:21:06','Browsing'),(38,21,'2015-04-27 03:21:06','Email'),(39,21,'2015-04-27 03:21:06','Download'),(40,21,'2015-04-27 03:21:06','Online Game'),(41,22,'2015-04-28 05:05:04','Browsing'),(42,22,'2015-04-28 05:05:04','Email'),(43,22,'2015-04-28 05:05:04','VPN');
/*!40000 ALTER TABLE `client_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_priorities`
--

DROP TABLE IF EXISTS `client_priorities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_priorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  `priority` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_priorities`
--

LOCK TABLES `client_priorities` WRITE;
/*!40000 ALTER TABLE `client_priorities` DISABLE KEYS */;
INSERT INTO `client_priorities` VALUES (19,1,'2015-04-13 02:09:39','Kualitas Link',1),(2,1,'2015-04-09 08:36:34','Support Teknis',2),(3,1,'2015-04-09 08:36:34','Harga',3),(4,3,'2015-04-09 08:47:11','Kualitas Link',1),(5,3,'2015-04-09 08:47:11','Harga',2),(6,3,'2015-04-09 08:47:11','Support Teknis',3),(7,5,'2015-04-09 08:54:11','Harga',1),(8,5,'2015-04-09 08:54:11','Kualitas Link',2),(9,5,'2015-04-09 08:54:11','Support Teknis',3),(25,6,'2015-04-15 09:46:10','Harga',1),(11,6,'2015-04-10 08:30:38','Support Teknis',2),(12,6,'2015-04-10 08:30:38','Harga',3),(34,9,'2015-04-15 10:36:43','Kualitas Link',1),(14,9,'2015-04-10 08:33:10','Kualitas Link',2),(15,9,'2015-04-10 08:33:10','Support Teknis',3),(28,7,'2015-04-15 10:07:38','Kualitas Link',1),(17,7,'2015-04-10 08:41:01','Kualitas Link',2),(18,7,'2015-04-10 08:41:01','Support Teknis',3),(20,1,'2015-04-13 02:09:39','Harga',2),(21,1,'2015-04-13 02:09:39','Support Teknis',3),(22,4,'2015-04-15 04:11:25','Harga',1),(23,4,'2015-04-15 04:11:25','Kualitas Link',2),(24,4,'2015-04-15 04:11:25','Support Teknis',3),(26,6,'2015-04-15 09:46:10','Kualitas Link',2),(27,6,'2015-04-15 09:46:10','Support Teknis',3),(29,7,'2015-04-15 10:07:38','Support Teknis',3),(30,7,'2015-04-15 10:07:38','Harga',2),(31,8,'2015-04-15 10:27:40','Kualitas Link',1),(32,8,'2015-04-15 10:27:40','Harga',2),(33,8,'2015-04-15 10:27:40','Support Teknis',3),(35,9,'2015-04-15 10:36:43','Support Teknis',3),(36,9,'2015-04-15 10:36:43','Harga',2),(37,10,'2015-04-15 10:43:43','Kualitas Link',1),(38,10,'2015-04-15 10:43:43','Harga',2),(39,10,'2015-04-15 10:43:43','Support Teknis',3),(40,11,'2015-04-15 10:50:13','Kualitas Link',1),(41,11,'2015-04-15 10:50:13','Support Teknis',3),(42,11,'2015-04-15 10:50:13','Harga',2),(43,12,'2015-04-15 10:54:24','Kualitas Link',1),(44,12,'2015-04-15 10:54:24','Harga',2),(45,12,'2015-04-15 10:54:24','Support Teknis',3),(46,13,'2015-04-15 10:59:40','Kualitas Link',1),(47,13,'2015-04-15 10:59:40','Harga',2),(48,13,'2015-04-15 10:59:40','Support Teknis',3),(49,14,'2015-04-15 11:05:53','Kualitas Link',1),(50,14,'2015-04-15 11:05:53','Harga',2),(51,14,'2015-04-15 11:05:53','Support Teknis',3),(52,15,'2015-04-15 11:13:57','Kualitas Link',1),(53,15,'2015-04-15 11:13:57','Harga',2),(54,15,'2015-04-15 11:13:57','Support Teknis',3),(55,16,'2015-04-15 11:18:45','Kualitas Link',1),(56,16,'2015-04-15 11:18:45','Harga',2),(57,16,'2015-04-15 11:18:45','Support Teknis',3),(58,21,'2015-04-27 03:22:08','Kualitas Link',1),(59,21,'2015-04-27 03:22:08','Harga',2),(60,21,'2015-04-27 03:22:08','Support Teknis',3),(61,22,'2015-04-28 05:05:30','Kualitas Link',1),(62,22,'2015-04-28 05:05:30','Harga',2),(63,22,'2015-04-28 05:05:30','Support Teknis',3);
/*!40000 ALTER TABLE `client_priorities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_sites`
--

DROP TABLE IF EXISTS `client_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_request_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL COMMENT 'cabang padiNET yang menangani',
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `install_area` int(11) DEFAULT NULL,
  `pic_phone_area` varchar(5) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(100) DEFAULT NULL,
  `pic_name` varchar(50) DEFAULT NULL,
  `pic_position` varchar(50) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `modified` varchar(1) DEFAULT '0',
  `createuser` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_sites`
--

LOCK TABLES `client_sites` WRITE;
/*!40000 ALTER TABLE `client_sites` DISABLE KEYS */;
INSERT INTO `client_sites` VALUES (1,1,1,NULL,14,1,'Jl. Veteran Tama Utara No. 10-11, Gresik','Gresik',1,'031','7497421',NULL,NULL,NULL,'1','0','yudi','2015-04-13 02:11:22'),(2,2,2,NULL,13,1,'Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng','Gresik ',1,'031','3905234',NULL,NULL,NULL,'0','0','dhani','2015-04-13 03:21:38'),(3,3,2,NULL,13,1,'Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng Watangrejo, Gresik','Gresik ',1,'031','3905234 ',NULL,NULL,NULL,'1','0','dhani','2015-04-13 03:29:33'),(4,4,3,NULL,13,1,'Jl. Kapten Darmo Sugondo 88 Gresik ','Gresik ',1,'031','3991719',NULL,NULL,NULL,'0','0','dhani','2015-04-13 04:27:56'),(5,5,3,NULL,13,1,'Jalan Bung Tomo No. 99 X Denpasar','Denpasar',4,'+62',' 81703210546',NULL,NULL,NULL,'1','0','dhani','2015-04-13 04:43:24'),(6,6,4,7,14,1,'Jl. Laksda M. Natsir No. 17, Surabaya','Surabaya',1,'031','7490754',NULL,NULL,NULL,'1','0','yudi','2015-04-15 04:12:46'),(7,7,5,NULL,8,1,'Raya Kepatihan 168A Menganti Gresik','Gresik',1,'031','7993816 ',NULL,NULL,NULL,'1','0','amir','2015-04-15 09:02:17'),(8,8,6,NULL,14,1,'Jl. Bangkingan Gadung, Lidah Kulon - Surabaya','Surabaya',1,'081','703707050',NULL,NULL,NULL,'1','0','yudi','2015-04-15 09:47:28'),(9,9,7,NULL,52,1,'jl bader no 3 kalirejo pasuruan','pasuruan',1,'(0343','741873',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:10:16'),(10,10,8,NULL,52,1,'jl dr soetomo pandaan pasuruan','pasuruan',1,'0234','3631593',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:30:29'),(11,11,9,NULL,52,1,'jl dau darmorejo kepulungan gempol','pasuruan',1,'0343','635726',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:37:21'),(12,12,9,NULL,52,1,'jl dau darmorejo kepulungan gempol','pasuruan',1,'0343','635726',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:37:26'),(13,13,10,NULL,52,1,'Jalan Raya Sumurwaru No.32 Nguling','Pasuruan',1,'0343','481017',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:44:38'),(14,14,11,NULL,52,1,'JL. DR. SUTOMO 69 NGULING','Pasuruan',1,'0343',' 483833',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:50:47'),(15,15,12,NULL,52,1,'Jalan Raya Bromo Nomor 33 Gondangwetan','Pasuruan',1,'0343','441331',NULL,NULL,NULL,'1','0','dwi','2015-04-15 10:55:11'),(16,16,13,NULL,52,1,'Jl. Kabupaten Sladi Kejayan','Pasuruan',1,'0343','426595',NULL,NULL,NULL,'1','0','dwi','2015-04-15 11:00:38'),(17,17,14,NULL,52,1,'Jl. Pegadaian No 1 Purwosari','Pasuruan',1,'0343','611067',NULL,NULL,NULL,'0','0','dwi','2015-04-15 11:06:39'),(18,18,15,NULL,52,1,'Jalan pecalukan Ledug Prigen','Pasuruan',1,'0343','885332',NULL,NULL,NULL,'1','0','dwi','2015-04-15 11:14:40'),(19,19,16,NULL,52,1,' Jl. Raya Rembang ','Pasuruan',1,' 0343','745225',NULL,NULL,NULL,'1','0','dwi','2015-04-15 11:19:39'),(20,20,18,NULL,8,1,'Jl. Dukuh Kupang Gg Lebar No.119 Surabaya','SURABAYA',1,'031  ','00000001  ',NULL,NULL,NULL,'1','0','amir','2015-04-21 08:54:26'),(21,21,19,NULL,13,1,'Villa Kalijudan Indah IX/M-5 Surabaya ','Surabaya ',1,'031  ',' 3890 322 ',NULL,NULL,NULL,'1','0','dhani','2015-04-22 10:07:09'),(22,22,20,NULL,8,1,'taman international I B6/30 Kompleks Citra Raya Surabaya','SURABAYA',1,'031 ','081331090331 ',NULL,NULL,NULL,'1','0','amir','2015-04-24 03:55:38'),(23,23,21,NULL,17,1,'kemantren 1 gang brawijaya no 11','malang',1,'   ','081232534066   ',NULL,NULL,NULL,'1','0','puji','2015-04-29 03:33:31');
/*!40000 ALTER TABLE `client_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `tanggal_kontrak` date DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `siup` varchar(50) DEFAULT NULL,
  `kode_pelanggan` varchar(100) DEFAULT NULL,
  `random_identifier` varchar(32) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(200) DEFAULT NULL,
  `business_field` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `phone_area` varchar(5) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax_area` varchar(5) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `has_internet_connection` varchar(1) DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `speed` varchar(20) DEFAULT NULL,
  `ratio` varchar(50) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `usage_period` varchar(10) DEFAULT NULL,
  `user_amount` varchar(10) DEFAULT NULL,
  `fee` varchar(20) DEFAULT NULL,
  `operator` varchar(20) DEFAULT NULL,
  `end_of_contract` date DEFAULT NULL,
  `problems` varchar(20) DEFAULT NULL,
  `internet_demand` varchar(1) DEFAULT NULL,
  `known_us` varchar(1) DEFAULT NULL,
  `known_from` varchar(20) DEFAULT NULL,
  `interested` varchar(1) DEFAULT NULL,
  `reason2not_interested` text,
  `service_id` int(11) DEFAULT NULL,
  `service_interested_to` varchar(20) DEFAULT NULL,
  `budget` varchar(20) DEFAULT NULL,
  `implementation_target` datetime DEFAULT NULL,
  `follow_up` datetime DEFAULT NULL,
  `followed_up` varchar(1) DEFAULT NULL,
  `prospect` varchar(1) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,14,1,NULL,NULL,NULL,NULL,NULL,'2015-04-13 02:10:13','Cipta Mapan Logistik, PT','Institusi','Jl. Veteran Tama Utara No. 10-11, Gresik','Gresik','031','7497421','','','1','Wireless','>512 kbps - 1 Mb',NULL,'4 - 8 jam','OH','1 - 2','>1,5 jt - 3 jt','Crossnet','2015-04-14','kualitas link','1','1','Teman','1',NULL,NULL,'1','5','2015-04-15 00:00:00','2015-04-14 08:00:36',NULL,NULL,14,'1','0'),(2,13,1,NULL,NULL,NULL,NULL,NULL,'2015-04-13 03:29:19','PT. Indomarco Prismatama ','Badan Usaha','Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng Watangrejo, Gresik','Gresik ','031','3905234 ','',' ','1','ADSL','>2 Mb - 5 Mb','0',' ',' ',' ',' ',' ','0000-00-00',' ','0','0','','0','',NULL,'Enterprise',NULL,NULL,NULL,NULL,NULL,13,'p','0'),(3,13,1,NULL,NULL,NULL,NULL,NULL,'2015-04-13 04:24:36','Putra Bintang Timur Lestari, T','Badan Usaha','Tambak Langon Indah I/12 Surabaya ','Surabaya ','031','7493808','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,'1','0'),(4,14,1,NULL,NULL,NULL,NULL,NULL,'2015-04-21 09:42:50','PT. Sarana Bhakti Timur (Depo JAPFA)','Institusi','Jl. Laksda M. Natsir No. 17','Surabaya','031','7490754','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Teman','1',NULL,7,'7','3','2015-04-20 00:00:00','2015-04-16 08:00:39',NULL,NULL,14,'1','0'),(5,8,1,NULL,NULL,NULL,NULL,NULL,'2015-04-23 05:41:40','Tjakrindo Mas, PT Divisi Beton','Badan Usaha','Raya Kepatihan 168A Menganti Gresik','Gresik','031','7993816 ','031','7993816 ','0',' ',' ','0',' ',' ',' ',' ',' ','0000-00-00',' ','0','0','','0','',NULL,'Enterprise',NULL,NULL,NULL,NULL,NULL,8,'1','1'),(6,14,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 09:46:15','PT. Bumi Arden','Institusi','Jl. Bangkingan Gadung, Lidah Kulon - Surabaya','Surabaya','081','703707050','','','1','ADSL','>1 Mb - 2 Mb',NULL,'4 - 8 jam','OH','3 - 5','500 - 750 rb','Telkom Speedy','2015-04-23','kualitas link','1','1','Teman','1',NULL,NULL,'7','3','2015-04-22 00:00:00','2015-04-22 08:00:21',NULL,NULL,14,'1','0'),(7,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:07:47','SMAN ! BANGIL','Institusi','jl bader no 3 kalirejo pasuruan','pasuruan','(0343','741873','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-16 07:00:24',NULL,NULL,52,'1','0'),(8,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:27:47','SMAN 1 Pandaan','Institusi','jl dr soetomo pandaan pasuruan','pasuruan','0234','3631593','0234','3631593','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-15 07:00:25',NULL,NULL,52,'1','0'),(9,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:36:49','SMK 1 Gempol','Institusi','jl dau darmorejo kepulungan gempol','pasuruan','0343','635726','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-16 07:00:29',NULL,NULL,52,'1','0'),(10,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:43:55','SMAN 1 GRATI','Institusi','Jalan Raya Sumurwaru No.32 Nguling','Pasuruan','0343','481017','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-16 07:00:29',NULL,NULL,52,'1','0'),(11,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:50:20','SMK 1 Nguling','Institusi','JL. DR. SUTOMO 69 NGULING','Pasuruan','0343',' 483833','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'1','4','2015-04-19 00:00:00','2015-04-16 07:00:59',NULL,NULL,52,'1','0'),(12,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:54:34','SMAN 1 Gondang wetan','Institusi','Jalan Raya Bromo Nomor 33 Gondangwetan','Pasuruan','0343','441331','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'1','4','2015-04-19 00:00:00','2015-04-16 07:00:10',NULL,NULL,52,'1','0'),(13,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 10:59:47','SMAN 1 Kejayan','Institusi','Jl. Kabupaten Sladi Kejayan','Pasuruan','0343','426595','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-16 07:00:25',NULL,NULL,52,'1','0'),(14,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-27 00:25:51','SMAN 1 Purwosari','Institusi','Jl. Pegadaian No 1 Purwosari','Pasuruan','0343','611067','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-19 07:00:39',NULL,NULL,52,'0','0'),(15,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 11:14:03','SMK 1 Prigen','Institusi','Jalan pecalukan Ledug Prigen','Pasuruan','0343','885332','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-16 07:00:42',NULL,NULL,52,'1','0'),(16,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-15 11:18:52','SMKN 1 Rembang','Institusi',' Jl. Raya Rembang ','Pasuruan',' 0343','745225','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Website','1',NULL,NULL,'7','4','2015-04-19 00:00:00','2015-04-19 07:00:31',NULL,NULL,52,'1','0'),(17,8,1,NULL,NULL,NULL,NULL,NULL,'2015-04-24 03:54:25','Doni Lukianto','Perorangan','Jl. Dukuh Kupang Gg Lebar 119 Surabaya','SURABAYA','  031','085850875150   ','031  ','    08585087515','0','','','','','','','','','0000-00-00','','1','1','teman','1','',NULL,'Enterprise','>1.5 jt - 3jt','2015-05-02 00:00:00','2015-04-23 08:00:41',NULL,NULL,8,'0','0'),(18,8,1,NULL,NULL,NULL,NULL,NULL,'2015-04-21 08:50:53','Doni Lukiyanto','Perorangan','Jl. Dukuh Kupang Gg Lebar No.119 Surabaya','SURABAYA','031  ','00000001  ','031  ','00000001  ','0','Wireless','>1 Mb - 2 Mb','1:1','>8 jam','24 jam','6 - 10','>1,5 jt - 3 jt','Indosat','2015-04-02','harga','1','1','teman','1','',NULL,'Enterprise','>1.5 jt - 3jt','2015-04-16 00:00:00','2015-04-23 10:00:50',NULL,NULL,8,'1','0'),(19,13,1,NULL,NULL,NULL,NULL,NULL,'2015-04-22 10:05:57','Universal Trading, CV','Badan Usaha','Villa Kalijudan Indah IX/M-5 Surabaya ','Surabaya ','031  ',' 3890 322 ','031 ','3823 627 ','1','Wireless','>1 Mb - 2 Mb','','>8 jam','OH','6 - 10','750 rb - 1,5 jt','Hypernet','0000-00-00','support teknis','1','0','Mantan Pelanggan ','1','',NULL,'Business','750rb - 1.5 jt','2015-04-29 00:00:00','2015-04-22 11:00:53',NULL,NULL,13,'1','0'),(20,8,1,NULL,NULL,NULL,NULL,NULL,'2015-04-24 03:54:04','Ibu San San','Perorangan','taman international I B6/30 Kompleks Citra Raya Surabaya','SURABAYA','031 ','081331090331 ','031 ','081331090331 ','0','ADSL','>1 Mb - 2 Mb','1:10','>8 jam','24 jam','3 - 5','750 rb - 1,5 jt','Telkom Speedy','2015-04-30','kualitas link','1','1','teman','1','',NULL,'Smart Value','750rb - 1.5 jt','2015-05-01 00:00:00','2015-04-27 09:00:09',NULL,NULL,8,'1','0'),(21,52,1,NULL,NULL,NULL,NULL,NULL,'2015-04-27 04:05:10','David','Wargame','kemantren 1 gang brawijaya no 11','malang','   ','081232534066   ','  034','  08123253406  ','1','ADSL','>1 Mb - 2 Mb','5','>8 jam','24 jam','6 - 10','500 - 750 rb','Telkom Speedy','2015-04-30','kualitas link','1','1','Website','1','',1,'Enterprise','<350 rb','2015-04-30 00:00:19','2015-04-28 00:00:19',NULL,NULL,52,'1','0'),(22,9,1,NULL,NULL,NULL,NULL,NULL,'2015-04-28 05:09:00','Hatsonsurya Electric PT','Badan Usaha','Bukit Darmo Boulevard No.12','Surabaya','031  ','7321212    ','031  ','7325222    ','1','Wireless','>2 Mb - 5 Mb','','>8 jam','24 jam','>20','>10 jt','Telkom Speedy','0000-00-00','harga','1','1','Teman','1','',NULL,'Enterprise','<350 rb','2015-06-01 09:00:19','2015-04-28 13:00:19',NULL,NULL,9,'1','0');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients_neighbours`
--

DROP TABLE IF EXISTS `clients_neighbours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients_neighbours` (
  `client_id` int(11) DEFAULT NULL,
  `neighbour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_neighbours`
--

LOCK TABLES `clients_neighbours` WRITE;
/*!40000 ALTER TABLE `clients_neighbours` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients_neighbours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datacenters`
--

DROP TABLE IF EXISTS `datacenters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datacenters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datacenters`
--

LOCK TABLES `datacenters` WRITE;
/*!40000 ALTER TABLE `datacenters` DISABLE KEYS */;
INSERT INTO `datacenters` VALUES (1,1,'IDC Cyber Lt. 7','1','puji','2013-11-13 08:51:38'),(2,1,'IDC 3D','1','puji','2013-11-13 08:51:45'),(3,1,'APJII Cyber Lt. 1','1',NULL,'2014-03-03 08:17:46'),(4,1,'Office Mayjend','1',NULL,'2014-03-03 08:17:46'),(5,1,'Office Sucofindo','1',NULL,'2014-03-03 08:17:46'),(6,1,'Office Malang','1',NULL,'2014-03-03 08:17:46');
/*!40000 ALTER TABLE `datacenters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbp_pic`
--

DROP TABLE IF EXISTS `dbp_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbp_pic` (
  `plg` varchar(200) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `phone_area` varchar(4) DEFAULT NULL,
  `telp_hp` varchar(50) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `hp2` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `ktp` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbp_pic`
--

LOCK TABLES `dbp_pic` WRITE;
/*!40000 ALTER TABLE `dbp_pic` DISABLE KEYS */;
INSERT INTO `dbp_pic` VALUES ('ANTODINA','Febrianto','031','','08121090824','','febrianto@bankmandiri.co.id','','','pemohon'),('ANTODINA','Febrianto','031','','08121090824','','febrianto@bankmandiri.co.id','Jl. H. Samali No. 10 H3 Kalibata, Pasar Minggu, Jakarta','','administrasi'),('ANTODINA','Febrianto','031','','08121090824','','febrianto@bankmandiri.co.id','Jl. H. Samali No. 10 H3 Kalibata, Pasar Minggu, Jakarta','','penagihan'),('ANTODINA','Febrianto','031','','08121090824','','febrianto@bankmandiri.co.id','Jl. H. Samali No. 10 H3 Kalibata, Pasar Minggu, Jakarta','','support/teknis'),('ANTODINA','Febrianto','031','','08121090824','','febrianto@bankmandiri.co.id','Jl. H. Samali No. 10 H3 Kalibata, Pasar Minggu, Jakarta','','penanggungjawab'),('AUTOGLYM','David Santoso Tandra','031','5021234','0811319000','','sentra@autoglym.co.id; davidtandra@yahoo.com','Jl. Raya Menur No. 44, Surabaya','','pemohon'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','','','pemohon'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','Jl. Pameti Karata Lewa (87152), Sumba NTT','','administrasi'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','','','setup/teknis'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','Jl. Pameti Karata Lewa (87152), Sumba NTT','','penagihan'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','Jl. Pameti Karata Lewa (87152), Sumba NTT','','support/teknis'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','Jl. Pameti Karata Lewa (87152), Sumba NTT','','penanggungjawab'),('BUDIYANTO KARWELO','Budianto Karwelo','','','081333142496','','b_karwelo@yahoo.de','Jl. Pameti Karata Lewa (87152), Sumba NTT','','setup/teknis'),('COLORS RADIO','Dani','031','5993222','','','dani@colorsfm.com','','','pemohon'),('COLORS RADIO','Dani','031','5993222','','','dani@colorsfm.com','Jl. Darmahusada Indah Utara Bl U/111, Surabaya','','administrasi'),('COLORS RADIO','Herby','031','5993222','','','herb_soul@yahoo.com','','','setup/teknis'),('COLORS RADIO','Dani','031','5993222','','','dani@colorsfm.com','Jl. Darmahusada Indah Utara Bl U/111, Surabaya','','penagihan'),('COLORS RADIO','Herby','031','5993222','','','herb_soul@yahoo.com','','','support/teknis'),('COLORS RADIO','Dani','031','5993222','','','dani@colorsfm.com','Jl. Darmahusada Indah Utara Bl U/111, Surabaya','','penanggungjawab'),('Cowholdings','Ronald Walla','031','5616330','','','ronald@wismilak.com','','','pemohon'),('Cowholdings','Ronald Walla','031','5616330','','','ronald@wismilak.com','Jl. Dharmahusada Indah, Surabaya','','administrasi'),('Cowholdings','Ronald Walla','031','5616330','','','ronald@wismilak.com','Jl. Dharmahusada Indah, Surabaya','','setup/teknis'),('Cowholdings','Ronald Walla','031','5616330','','','ronald@wismilak.com','Jl. Dharmahusada Indah, Surabaya','','penagihan'),('Cowholdings','Ronald Walla','031','5616330','','','ronald@wismilak.com','Jl. Dharmahusada Indah, Surabaya','','support/teknis'),('Cowholdings','Ronald Walla','031','5616330','','','ronald@wismilak.com','Jl. Dharmahusada Indah, Surabaya','','penanggungjawab'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','','357822240679.0001','pemohon'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','J.Siwalankerto 141 Surabaya','357822240679.0001','administrasi'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','J.Siwalankerto 141 Surabaya','357822240679.0001','setup/teknis'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','J.Siwalankerto 141 Surabaya','357822240679.0001','penagihan'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','J.Siwalankerto 141 Surabaya','357822240679.0001','support/teknis'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','J.Siwalankerto 141 Surabaya','357822240679.0001','penanggungjawab'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','70272733','','','edpgloria@gloriaschool.org; aditia_unggul@gloriasc','','','pemohon'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','70272733','','','edpgloria@gloriaschool.org; aditia_unggul@gloriasc','','','administrasi'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','70272733','','','edpgloria@gloriaschool.org; aditia_unggul@gloriasc','','','penagihan'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','70272733','','','edpgloria@gloriaschool.org; aditia_unggul@gloriasc','','','support/teknis'),('GMII Filipi Jakarta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('GPS','Joko Riyanto','0354','7081857','','','masyantosaja@gmail.com','','','pemohon'),('GPS','Joko Riyanto','0354','7081857','','','masyantosaja@gmail.com','Jl. KH. Wachid Hasyim 68, Kediri','','administrasi'),('GPS','Joko Riyanto','0354','7081857','','','masyantosaja@gmail.com','Jl. KH. Wachid Hasyim 68, Kediri','','setup/teknis'),('GPS','Joko Riyanto','0354','7081857','','','masyantosaja@gmail.com','Jl. KH. Wachid Hasyim 68, Kediri','','penagihan'),('GPS','Joko Riyanto','0354','7081857','','','masyantosaja@gmail.com','Jl. KH. Wachid Hasyim 68, Kediri','','support/teknis'),('GPS','Joko Riyanto','0354','7081857','','','masyantosaja@gmail.com','Jl. KH. Wachid Hasyim 68, Kediri','','penanggungjawab'),('JAMES THOMASOUW','James Thomasouw','031','70502007','','','jamesft@ymail.com','Jl. Sekawan Elok A6/102, Bumi Citra Fajar, Surabaya','','administrasi'),('JAMES THOMASOUW','James Thomasouw','031','70502007','','','jamesft@ymail.com','Jl. Sekawan Elok A6/102, Bumi Citra Fajar, Surabaya','','pemohon'),('KOOLPEOPLE','Ronald Walla','031','','0816528545','','','Jl. Dharmahusada Indah','','pemohon'),('MAJALAH FAKTA','Stefanus Gunawan','031','5450352','','','stefanusinfor@gmail.com','','','pemohon'),('MAJALAH FAKTA','Stefanus Gunawan','031','5450352','','','stefanusinfor@gmail.com','Jl. Kalisari Sayangan III / 11, Surabaya','','setup/teknis'),('MAJALAH FAKTA','Stefanus Gunawan','031','5450352','','','stefanusinfor@gmail.com','Jl. Kalisari Sayangan III / 11, Surabaya','','administrasi'),('MAJALAH FAKTA','Stefanus Gunawan','031','5450352','','','stefanusinfor@gmail.com','Jl. Kalisari Sayangan III / 11, Surabaya','','penagihan'),('MAJALAH FAKTA','Stefanus Gunawan','031','5450352','','','stefanusinfor@gmail.com','Jl. Kalisari Sayangan III / 11, Surabaya','','support/teknis'),('MILLIONAIRE BRAIN POWER INDONESIA','Sarno Wibowo','0341','7558778','','','indonesiapower@yahoo.com','Semplak Kaum RT01/RW02, Semplak Barat - Kemang, Bogor','','pemohon'),('MILLIONAIRE BRAIN POWER INDONESIA','Sarno Wibowo','0341','7558778','','','indonesiapower@yahoo.com','Semplak Kaum RT01/RW02, Semplak Barat - Kemang, Bogor','','administrasi'),('MILLIONAIRE BRAIN POWER INDONESIA','Sarno Wibowo','0341','7558778','','','indonesiapower@yahoo.com','Semplak Kaum RT01/RW02, Semplak Barat - Kemang, Bogor','','setup/teknis'),('MILLIONAIRE BRAIN POWER INDONESIA','Sarno Wibowo','0341','7558778','','','indonesiapower@yahoo.com','Semplak Kaum RT01/RW02, Semplak Barat - Kemang, Bogor','','penagihan'),('MILLIONAIRE BRAIN POWER INDONESIA','Sarno Wibowo','0341','7558778','','','indonesiapower@yahoo.com','Semplak Kaum RT01/RW02, Semplak Barat - Kemang, Bogor','','support/teknis'),('PT NETMARKS INDONESIA','Wicaksono Wibowo','021','83793007','','','wwibowo@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','pemohon'),('PT NETMARKS INDONESIA','Wicaksono Wibowo','021','83793007','','','wwibowo@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','administrasi'),('PT NETMARKS INDONESIA','Bayu Seno Adji','021','83793007','','','bayu@netmarks.co.id','','','setup/teknis'),('PT NETMARKS INDONESIA','Roesjadi','021','83793007','','','roesjadi@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','penagihan'),('PT NETMARKS INDONESIA','Wicaksono Wibowo','021','83793007','','','wwibowo@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','penanggungjawab'),('PT. ANTIKA RAYA','Teddy Sarosa','031','5322662','','','tedy@antikaraya.co.id','Jl. Demak 153, Surabaya','','pemohon'),('PT. ANTIKA RAYA','Teddy Sarosa','031','5322662','','','tedy@antikaraya.co.id','Jl. Demak 153, Surabaya','','administrasi'),('PT. ANTIKA RAYA','Teddy Sarosa','031','5322662','','','tedy@antikaraya.co.id','Jl. Demak 153, Surabaya','','setup/teknis'),('PT. ANTIKA RAYA','Teddy Sarosa','031','5322662','','','tedy@antikaraya.co.id','Jl. Demak 153, Surabaya','','penagihan'),('PT. ANTIKA RAYA','Teddy Sarosa','031','5322662','','','tedy@antikaraya.co.id','Jl. Demak 153, Surabaya','','support/teknis'),('PT. ANTIKA RAYA','Teddy Sarosa','031','5322662','','','tedy@antikaraya.co.id','Jl. Demak 153, Surabaya','','penanggungjawab'),('PT. BAMBANG DJAJA','Robert','031','8438703','','','robert@bambangdjaja.com','Jl. Rungkut Industri 3 / 56, Surabaya','','pemohon'),('JAMU IBOE, PT','Hendrikus','031','5681898','','','hendrikus.johan@jamuiboe.com','Jl. Kutai No. 22, Surabaya','','pemohon'),('JAMU IBOE, PT','Hendrikus','031','5681898','','','hendrikus.johan@jamuiboe.com','Jl. Kutai No. 22, Surabaya','','administrasi'),('JAMU IBOE, PT','Hendrikus','031','5681898','','','hendrikus.johan@jamuiboe.com','Jl. Kutai No. 22, Surabaya','','setup/teknis'),('JAMU IBOE, PT','Hendrikus','031','5681898','','','hendrikus.johan@jamuiboe.com','Jl. Kutai No. 22, Surabaya','','penagihan'),('JAMU IBOE, PT','Hendrikus','031','5681898','','','hendrikus.johan@jamuiboe.com','Jl. Kutai No. 22, Surabaya','','support/teknis'),('JAMU IBOE, PT','Hendrikus','031','5681898','','','hendrikus.johan@jamuiboe.com','Jl. Kutai No. 22, Surabaya','','penanggungjawab'),('PT. TRIMITRA LUMBA (RIVERSIDE)','Francisca Poppy','0341','419000','0811366398','','poppyfrancisca@yahoo.com','Jl. A. Yani Utara, Riverside Blok AA/1, Malang','','pemohon'),('PT. TRIMITRA LUMBA (RIVERSIDE)','Francisca Poppy','0341','419000','0811366398','','poppyfrancisca@yahoo.com','Jl. A. Yani Utara, Riverside Blok AA/1, Malang','','administrasi'),('PT. TRIMITRA LUMBA (RIVERSIDE)','Francisca Poppy','0341','419000','0811366398','','poppyfrancisca@yahoo.com','Jl. A. Yani Utara, Riverside Blok AA/1, Malang','','penagihan'),('PT DAFASS INDONESIA','Abdurrahman, ST','031','8275978','','','abdurrahman@dafassindonesia.com','Jl. Gayungan AD, Kav. 12','','pemohon'),('PT DAFASS INDONESIA','Zaki Zaini','031','8275978','','','zaki.zaini@dafassindonesia.com','Jl. Gayungan AD, Kav. 12','','support/teknis'),('MEGA SURYA ERATAMA, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','pemohon'),('MEGA SURYA ERATAMA, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','administrasi'),('MEGA SURYA ERATAMA, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','setup/teknis'),('MEGA SURYA ERATAMA, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','penagihan'),('MEGA SURYA ERATAMA, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','support/teknis'),('MEGA SURYA ERATAMA, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','penanggungjawab'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','','','thomas_l@mikatasa.com','Jl. Rungkut Industri II / 2-4, Surabaya','','pemohon'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','','','thomas_l@mikatasa.com','Jl. Rungkut Industri II / 2-4, Surabaya','','administrasi'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','','','thomas_l@mikatasa.com','Jl. Rungkut Industri II / 2-4, Surabaya','','setup/teknis'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','','','thomas_l@mikatasa.com','Jl. Rungkut Industri II / 2-4, Surabaya','','penagihan'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','','','thomas_l@mikatasa.com','Jl. Rungkut Industri II / 2-4, Surabaya','','support/teknis'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','','','thomas_l@mikatasa.com','Jl. Rungkut Industri II / 2-4, Surabaya','','penanggungjawab'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','pemohon'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','administrasi'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','setup/teknis'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','penagihan'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','support/teknis'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','Jl. Raya Beringin Bendo No. 42 , Taman, Sidoarjo','','penanggungjawab'),('NEW MINATEX, PT','Harry Onggowarsito','031','426380','','','newminatex@indo.net.id','Jl. Indrokilo Selatan No. 7, Lawang, Malang','','pemohon'),('NEW MINATEX, PT','Harry Onggowarsito','031','426380','','','newminatex@indo.net.id','Jl. Indrokilo Selatan No. 7, Lawang, Malang','','administrasi'),('PT. PADI INTERNET','Maria Fransisca','031','5616330','','','sisca@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. PADI INTERNET','Bima','031','5616330','','','hostingsupport@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('PT. PADI INTERNET','Sisca Maria','031','5616330','','','sisca@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penanggungjawab'),('PT. PADI INTERNET','Maria Fransisca','031','5616330','','','','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('PT. PADI INTERNET','Bima','031','5616330','','','hostingsupport@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','setup/teknis'),('PT. PADI INTERNET','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('PT. PADI INTERNET','Bima','031','5616330','','','hostingsupport@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','support/teknis'),('PT. PADI INTERNET','Maria Fransisca','031','5616330','','','','Jl. Mayjend Sungkono No. 83, Surabaya','','penanggungjawab'),('PT. PADI INTERNET','Bayu Sri Raharjo','031','5616330','','','bayu@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. PADI INTERNET','Bayu Sri Raharjo','031','5616330','','','bayu@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('PT. PADI INTERNET','Bayu Sri Raharjo','031','5616330','','','bayu@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','setup/teknis'),('PT. PADI INTERNET','Bayu Sri Raharjo','031','5616330','','','bayu@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('PT. PADI INTERNET','Bayu Sri Raharjo','031','5616330','','','bayu@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','support/teknis'),('PT. PADI INTERNET','Bayu Sri Raharjo','031','5616330','','','bayu@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penanggungjawab'),('PT. PADI INTERNET','Ketut Ariana','031','5616330','','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. PADI INTERNET','Ketut Ariana','031','5616330','','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('PT. PADI INTERNET','Ketut Ariana','031','5616330','','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','setup/teknis'),('PT. PADI INTERNET','Ketut Ariana','031','5616330','','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('PT. PADI INTERNET','Ketut Ariana','031','5616330','','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','support/teknis'),('PT. PADI INTERNET','Ketut Ariana','031','5616330','','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penanggungjawab'),('PT. PADI INTERNET','Felix Suhendar','031','5616330','','','felix@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. PADI INTERNET','Felix Suhendar','031','5616330','','','felix@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('PT. PADI INTERNET','Felix Suhendar','031','5616330','','','felix@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','setup/teknis'),('PT. PADI INTERNET','Felix Suhendar','031','5616330','','','felix@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('PT. PADI INTERNET','Felix Suhendar','031','5616330','','','felix@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','support/teknis'),('PT. PADI INTERNET','Felix Suhendar','031','5616330','','','felix@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penanggungjawab'),('PT. PADI INTERNET','M Zamroni','031','5616330','','','zamroni@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. PADI INTERNET','Ananda Suryansayah','031','5616330','','','nanda@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. SATIVA RIA CENDANA','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','Jl. Kutai No. 22 Surabaya','','pemohon'),('PT. SATIVA RIA CENDANA','Andy Hendro','031','5680330','','','andy.hendro@sativa.com','Jl. Kutai No. 22 Surabaya','','administrasi'),('RSK Sumber Glagah','Bambang Kuntoro','0321','690441','081559645832','','bambangkw@gmail.com','Jl. Sumber Glagah, Pacet','','penanggungjawab'),('SUPARMA Tbk, PT','Tony','031','3539888 - 3533776','','','purchasing@ptsuparmatbk.com; marketing@ptsuparmatb','Jl. Sulung Sekolahan 6A, Surabaya','','pemohon'),('SUPARMA Tbk, PT','Tony','031','3539888 - 3533776','','','purchasing@ptsuparmatbk.com; marketing@ptsuparmatb','Jl. Sulung Sekolahan 6A, Surabaya','','administrasi'),('SUPARMA Tbk, PT','Tony','031','3539888 - 3533776','','','purchasing@ptsuparmatbk.com; marketing@ptsuparmatb','Jl. Sulung Sekolahan 6A, Surabaya','','penagihan'),('SUPARMA Tbk, PT','Tony','031','3539888 - 3533776','','','purchasing@ptsuparmatbk.com; marketing@ptsuparmatb','Jl. Sulung Sekolahan 6A, Surabaya','','support/teknis'),('REGULAR EXCHANGE GROUP','Louis Larry','031','5616330','','','louis@padi.net.id','','','pemohon'),('REGULAR EXCHANGE GROUP','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('REGULAR EXCHANGE GROUP','Bima','031','5616330','','','hostingsupport@padi.net.id','','','setup/teknis'),('REGULAR EXCHANGE GROUP','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('REGULAR EXCHANGE GROUP','Bima','031','5616330','','','hostingsupport@padi.net.id','','','support/teknis'),('REGULAR EXCHANGE GROUP','Louis Larry','031','5616330','','','louis@padi.net.id','','','penanggungjawab'),('PT. SATIVA GROUP','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','','','pemohon'),('PT. SATIVA GROUP','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','','','administrasi'),('PT. SATIVA GROUP','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','','','setup/teknis'),('PT. SATIVA GROUP','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','','','penagihan'),('PT. SATIVA GROUP','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','','','support/teknis'),('PT. SATIVA GROUP','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','','','penanggungjawab'),('Ria Restaurant','Stephen Walla','031','5680330','','','stephen.walla@sativa.com','Jl. Kutai No. 22, Surabaya','','pemohon'),('RSUD PROF. Dr. MARGONO SOEKARJO','Yunita Dyah Suminar','031','632708','','','yankes@rsmargono.go.id','','','pemohon'),('RSUD PROF. Dr. MARGONO SOEKARJO','Yunita Dyah Suminar','031','632708','','','yankes@rsmargono.go.id','Jl. Dr. Gumbreg No. 1, Purwokerto','','administrasi'),('RSUD PROF. Dr. MARGONO SOEKARJO','Yunita Dyah Suminar','031','632708','','','yankes@rsmargono.go.id','Jl. Dr. Gumbreg No. 1, Purwokerto','','setup/teknis'),('RSUD PROF. Dr. MARGONO SOEKARJO','Yunita Dyah Suminar','031','632708','','','yankes@rsmargono.go.id','Jl. Dr. Gumbreg No. 1, Purwokerto','','penagihan'),('RSUD PROF. Dr. MARGONO SOEKARJO','Yunita Dyah Suminar','031','632708','','','yankes@rsmargono.go.id','Jl. Dr. Gumbreg No. 1, Purwokerto','','support/teknis'),('RSUD PROF. Dr. MARGONO SOEKARJO','Yunita Dyah Suminar','031','632708','','','yankes@rsmargono.go.id','Jl. Dr. Gumbreg No. 1, Purwokerto','','penanggungjawab'),('RUMBA CLUB','Louis Larry','031','5616330','','','louis@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('RUMBA CLUB','Bima','031','5616330','','','hostingsupport@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','support/teknis'),('PT ARTHA PERMAI KENCANA','Endy Hartono Ongkowibowo','031','','081332291999','','endy_ongko@apk.co.id','Trunojoyo 80 Surabaya','3578051711810001','pemohon'),('PT ARTHA PERMAI KENCANA','Utami','031','3718489','','','hrd@apk.co.id','','','administrasi'),('PT ARTHA PERMAI KENCANA','Tan Mei Lie','031','3718489','','','cashier@apk.co.id','','','penagihan'),('PT ARTHA PERMAI KENCANA','Hary Purnomo','031','','082140916622','','hary.qsofe@gmail.com','','','setup/teknis'),('PT ARTHA PERMAI KENCANA','Hary Purnomo','031','','082140916622','','hary.qsofe@gmail.com','','','support/teknis'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Saldy Mansyur','0474','321654','','','smclub89@yahoo.com','','','pemohon'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Zaenab','0474','321654','','','znb_08@yahoo.com','Jl. Sam Ratulangi No. 3 Malili, Luwu Timur','','administrasi'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Zaenab','0474','321654','','','znb_08@yahoo.com','Jl. Sam Ratulangi No. 3 Malili, Luwu Timur','','setup/teknis'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Zaenab','0474','321654','','','znb_08@yahoo.com','Jl. Sam Ratulangi No. 3 Malili, Luwu Timur','','penagihan'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Zaenab','0474','321654','','','znb_08@yahoo.com','Jl. Sam Ratulangi No. 3 Malili, Luwu Timur','','support/teknis'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Zaenab','0474','321654','','','znb_08@yahoo.com','Jl. Sam Ratulangi No. 3 Malili, Luwu Timur','','penanggungjawab'),('SMANU 1 GRESIK','Mukhtar Khuluk, ST','031','3970735','','','mk_khuluk@yahoo.com','Jl. Raden Santri V / 22, Gresik','','pemohon'),('SMANU 1 GRESIK','Mukhtar Khuluk, ST','031','3970735','','','mk_khuluk@yahoo.com','','','administrasi'),('SMANU 1 GRESIK','Mukhtar Khuluk, ST','031','3970735','','','mk_khuluk@yahoo.com','Jl. Raden Santri V / 22, Gresik','','setup/teknis'),('SMANU 1 GRESIK','Mukhtar Khuluk, ST','031','3970735','','','mk_khuluk@yahoo.com','Jl. Raden Santri V / 22, Gresik','','penagihan'),('SMANU 1 GRESIK','Mukhtar Khuluk, ST','031','3970735','','','mk_khuluk@yahoo.com','Jl. Raden Santri V / 22, Gresik','','support/teknis'),('SMANU 1 GRESIK','Mukhtar Khuluk, ST','031','3970735','','','mk_khuluk@yahoo.com','Jl. Raden Santri V / 22, Gresik','','penanggungjawab'),('SMK ISLAM BATU','Chanafi','0341','597079','','','smakisbest@yahoo.co.id','','3579010911530003','pemohon'),('SMK ISLAM BATU','Chanafi','0341','597079','','','smakisbest@yahoo.co.id','Jl. Barat Stadion, Batu','3579010911530003','administrasi'),('SMK ISLAM BATU','Chanafi','0341','597079','','','smakisbest@yahoo.co.id','Jl. Barat Stadion, Batu','3579010911530003','setup/teknis'),('SMK ISLAM BATU','Chanafi','0341','597079','','','smakisbest@yahoo.co.id','Jl. Barat Stadion, Batu','3579010911530003','penagihan'),('SMK ISLAM BATU','Chanafi','0341','597079','','','smakisbest@yahoo.co.id','Jl. Barat Stadion, Batu','3579010911530003','support/teknis'),('SMK ISLAM BATU','Chanafi','0341','597079','','','smakisbest@yahoo.co.id','Jl. Barat Stadion, Batu','3579010911530003','penanggungjawab'),('TANDRA LAW OFFICE','Soedeson Tandra','031','7347651','','','soedeson2.tandralawoffice@gmail.com','','','pemohon'),('TANDRA LAW OFFICE','Soedeson Tandra','031','7347651','','','soedeson2.tandralawoffice@gmail.com','Jl. Plasa Segi 8 Kav. D-861, Surabaya','','administrasi'),('TANDRA LAW OFFICE','Soedeson Tandra','031','7347651','','','soedeson2.tandralawoffice@gmail.com','Jl. Plasa Segi 8 Kav. D-861, Surabaya','','setup/teknis'),('TANDRA LAW OFFICE','Soedeson Tandra','031','7347651','','','soedeson2.tandralawoffice@gmail.com','Jl. Plasa Segi 8 Kav. D-861, Surabaya','','penagihan'),('TANDRA LAW OFFICE','Soedeson Tandra','031','7347651','','','soedeson2.tandralawoffice@gmail.com','Jl. Plasa Segi 8 Kav. D-861, Surabaya','','support/teknis'),('TANDRA LAW OFFICE','Soedeson Tandra','031','7347651','','','soedeson2.tandralawoffice@gmail.com','Jl. Plasa Segi 8 Kav. D-861, Surabaya','','penanggungjawab'),('US ALUMNI OF SURABAYA','Ronald Walla','031','5616330','','','ronald@padi.net.id','','','pemohon'),('US ALUMNI OF SURABAYA','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','','','administrasi'),('US ALUMNI OF SURABAYA','Bima','031','5616330','','','hostingsupport@padi.net.id','','','setup/teknis'),('US ALUMNI OF SURABAYA','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','','','penagihan'),('US ALUMNI OF SURABAYA','Bima','031','5616330','','','hostingsupport@padi.net.id','','','support/teknis'),('US ALUMNI OF SURABAYA','Ronald Walla','031','5616330','','','ronald@padi.net.id','','','penanggungjawab'),('WEB INDONESIA','Ronald Walla','031','5616330','','','ronald@padi.net.id','','','pemohon'),('WEB INDONESIA','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('WEB INDONESIA','Bima','031','5616330','','','hostingsupport@padi.net.id','','','setup/teknis'),('WEB INDONESIA','Siti Khoiriyah','031','5616330','','','yaya@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('WEB INDONESIA','Bima','031','5616330','','','hostingsupport@padi.net.id','','','support/teknis'),('WEB INDONESIA','Ronald Walla','031','5616330','','','ronald@padi.net.id','','','penanggungjawab'),('WISMILAK','Surjanto','031','7493556','','','surjanto@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','penanggungjawab'),('WISMILAK','Wiwid Wijanarka','031','7493556','','','wiwid.wijanarka@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','support/teknis'),('R DWIDJO KURNIAWAN','R Dwijo Kurniawan','031','70507249','0812492356','','dwidjo_k@yahoo.com','Nginden Intan Timur 17/4 A7-31 Surabaya','357809170575001','setup/teknis'),('R DWIDJO KURNIAWAN','R Dwijo Kurniawan','031','70507249','0812492356','','dwidjo_k@yahoo.com','Nginden Intan Timur 17/4 A7-31 Surabaya','357809170575001','penagihan'),('R DWIDJO KURNIAWAN','R Dwijo Kurniawan','031','70507249','0812492356','','dwidjo_k@yahoo.com','Nginden Intan Timur 17/4 A7-31 Surabaya','357809170575001','support/teknis'),('R DWIDJO KURNIAWAN','R Dwijo Kurniawan','031','70507249','0812492356','','dwidjo_k@yahoo.com','Nginden Intan Timur 17/4 A7-31 Surabaya','357809170575001','administrasi'),('R DWIDJO KURNIAWAN','R Dwijo Kurniawan','031','70507249','0812492356','','dwidjo_k@yahoo.com','Nginden Intan Timur 17/4 A7-31 Surabaya','357809170575001','pemohon'),('STARTEL COMMUNICATION, PT','Edwin Widjaja','021','58902099','','','edwin@kayindo.com','Puri Indah Blok J 2/15 Kembangan Selatan, Jakarta Barat','09.5001.181072.0214','pemohon'),('STARTEL COMMUNICATION, PT','Herlambang Setjiawan','021','58902099','08128655785','','herlambang@kayindo.com','','','administrasi'),('STARTEL COMMUNICATION, PT','Gugun Gunawan','021','58902099','08561888835','','gugun@tele-west.net','','','setup/teknis'),('STARTEL COMMUNICATION, PT','Tridharmanto','021','58902099','0818713183','','billing@tele-west.net','','','penagihan'),('STARTEL COMMUNICATION, PT','Gugun Gunawan','021','58902099','08561888835','','gugun@tele-west.net','','','support/teknis'),('STARTEL COMMUNICATION, PT','Edwin Widjaja','021','58902099','','','edwin@kayindo.com','Puri Indah Blok J 2/15 Kembangan Selatan, Jakarta Barat','09.5001.181072.0214','penanggungjawab'),('Abdillah Wicaksana Basri','Abdillah Wicaksana Basri','031','5921609','','','linuxish.d.netron@gmail.com','','1235655445','pemohon'),('Abdillah Wicaksana Basri','Abdillah Wicaksana Basri','031','5921609','','','linuxish.d.netron@gmail.com','','1235655445','administrasi'),('Abdillah Wicaksana Basri','Abdillah Wicaksana Basri','031','5921609','','','linuxish.d.netron@gmail.com','','1235655445','setup/teknis'),('Abdillah Wicaksana Basri','Abdillah Wicaksana Basri','031','5921609','','','linuxish.d.netron@gmail.com','','1235655445','penagihan'),('Abdillah Wicaksana Basri','Abdillah Wicaksana Basri','031','5921609','','','linuxish.d.netron@gmail.com','','1235655445','support/teknis'),('Abdillah Wicaksana Basri','Abdillah Wicaksana Basri','031','5921609','','','linuxish.d.netron@gmail.com','','1235655445','penanggungjawab'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','03171988359','','daud-kristiawan@yahoo.com','','1258222102780001','pemohon'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','03171988359','','daud-kristiawan@yahoo.com','Jl.Raya Kenjeran 432 Surabaya','1258222102780001','administrasi'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','03171988359','','daud-kristiawan@yahoo.com','Jl.Raya Kenjeran 432 Surabaya','1258222102780001','setup/teknis'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','03171988359','','daud-kristiawan@yahoo.com','Jl.Raya Kenjeran 432 Surabaya','1258222102780001','penagihan'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','03171988359','','daud-kristiawan@yahoo.com','Jl.Raya Kenjeran 432 Surabaya','1258222102780001','support/teknis'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','03171988359','','daud-kristiawan@yahoo.com','Jl.Sutorejo prima utara 2/4 (PT 2) Surabaya','1258222102780001','penanggungjawab'),('PT DAFASS INDONESIA','Abdurrahman, Ir','031','8275978','085648201910','','abdurrahman@dafassindonesia.com','Jl,Gayungsari XI/54 Surabaya','3578232803690003','pemohon'),('PT DAFASS INDONESIA','Fahry Romadhan, ST','031','8275978','085732304754','','fahri@dafassindonesia.com','','','administrasi'),('PT DAFASS INDONESIA','Fahry Romadhan, ST','031','8275978','085732304754','','fahri@dafassindonesia.com','','','setup/teknis'),('PT DAFASS INDONESIA','Abdurrahman, Ir','031','8275978','085648201910','','abdurrahman@dafassindonesia.com','Jl,Gayungsari XI/54 Surabaya','3578232803690003','penagihan'),('PT DAFASS INDONESIA','Fahry Romadhan, ST','031','8275978','085732304754','','fahri@dafassindonesia.com','','','support/teknis'),('PT DAFASS INDONESIA','Abdurrahman, Ir','031','8275978','085648201910','','abdurrahman@dafassindonesia.com','Jl,Gayungsari XI/54 Surabaya','3578232803690003','penanggungjawab'),('ANTAR MITRA SEMBADA, PT','Agus Triwahyono','031','5962550','08123106224','','agustri@sby.ams.co.id','','12.5621.240870.0001','pemohon'),('ANTAR MITRA SEMBADA, PT','Vika','021','5310330','','','vika@ams.co.id','Jl.Pos Pengumben Raya No.8 Sukabumi Selatan-Jakarta DKI Jakarta Indonesia 11560','','administrasi'),('ANTAR MITRA SEMBADA, PT','Agus/Valens','031','5962546','03191745346','','agustri@sby.ams.co.id; valens@sby.ams.co.id','','','setup/teknis'),('ANTAR MITRA SEMBADA, PT','Vika','021','5310330','','','vika@ams.co.id','Jl.Pos Pengumben Raya No.8 Sukabumi Selatan-Jakarta DKI Jakarta Indonesia 11560','','penagihan'),('ANTAR MITRA SEMBADA, PT','Agus Triwahyono','031','5962546','03191745346','','agustri@sby.ams.co.id','Jl.Pos Pengumben Raya No.8 Sukabumi Selatan-Jakarta DKI Jakarta Indonesia 11560','12.5621.240870.0001','support/teknis'),('ANTAR MITRA SEMBADA, PT','Agus Triwahyono','031','5962550','08123106224','','agustri@sby.ams.co.id','Semolowaru Elok AD/10 Surabaya','12.5621.240870.0001','penanggungjawab'),('CHOMSATUN','Chomsatun','031','8670931','085731234568','','','Kepuh Kiriman Masjid Kav 8 RT 04 RW 01 Kel. kepuh Kiriman Kec.Waru','12.14.14.470767.0007','pemohon'),('ANGGA DARMA PUTRI NING AYU ','Angga Darma Putra Ning Ayu','031','8782763','085645555088','','angga@ningayu.com','Purimas regency B2-37 Rungkut, Surabaya','3578034306850003','pemohon'),('Sunarto Budiono',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('LIK MARGOMULYO','Indawati','031','7484953','081330610629','','oindawati79@yahoo.com','Jl.Teratai 68 RT 03 RW 08 Ds.Candimulyo, Jombang','3517095504790008','pemohon'),('LIK MARGOMULYO','Indawati','031','7484953','081330610629','','oindawati79@yahoo.com','Jl.Teratai 68 RT 03 RW 08 Ds.Candimulyo, Jombang','3517095504790008','administrasi'),('LIK MARGOMULYO','Chanda','031','7484953','0811291553','','','','','penanggungjawab'),('LIK MARGOMULYO','Indawati','031','7484953','081330610629','','oindawati79@yahoo.com','Jl.Teratai 68 RT 03 RW 08 Ds.Candimulyo, Jombang','3517095504790008','penagihan'),('LIK MARGOMULYO','Indawati','031','7484953','081330610629','','oindawati79@yahoo.com','Jl.Teratai 68 RT 03 RW 08 Ds.Candimulyo, Jombang','3517095504790008','setup/teknis'),('LIK MARGOMULYO','Indawati','031','7484953','081330610629','','oindawati79@yahoo.com','Jl.Teratai 68 RT 03 RW 08 Ds.Candimulyo, Jombang','3517095504790008','support/teknis'),('PETRO GRAHA MEDIKA, PT','dr.Singgih Priyanto, MARS','031','3978658/3981232','0811305292','','Rspg2004@yahoo.co.id','','3525160410600002','pemohon'),('PETRO GRAHA MEDIKA, PT','dr.Singgih Priyanto, MARS','031','3978658/3981232','0811305292','','Rspg2004@yahoo.co.id','','3525160410600002','penanggungjawab'),('PETRO GRAHA MEDIKA, PT','Mustaqimah','031','3978658/3981232','08155022450','','kinoynoki@gmail.com','','','administrasi'),('PETRO GRAHA MEDIKA, PT','Dya Inda Rahma','031','3978658/3981232','085640433556','','','','','penagihan'),('PETRO GRAHA MEDIKA, PT','Yanriska Udayana','031','3978658/3981232','081703397669','','el_yanriska@yahoo.co.id','','','setup/teknis'),('PETRO GRAHA MEDIKA, PT','Yanriska Udayana','031','3978658/3981232','081703397669','','el_yanriska@yahoo.co.id','','','support/teknis'),('PETRO GRAHA MEDIKA, PT','dr.Singgih Priyanto, MARS','','','0811305292','','rspg2004@yahoo.co.id','Jl.kapulaga No.6 Karangturi, Gresik','3525160410600002','pemohon'),('PETRO GRAHA MEDIKA, PT','Mustaqimah','031','','08155022450','','kinoynoki@gmail.com','','','administrasi'),('PETRO GRAHA MEDIKA, PT','Dya Inda Rahma','031','','085640433556','','','','','penagihan'),('PETRO GRAHA MEDIKA, PT','Yanriska Udayana','','','081703397669','','el_yanriska@yahoo.co.id','','','setup/teknis'),('PETRO GRAHA MEDIKA, PT','Yanriska Udayana','','','081703397669','','el_yanriska@yahoo.co.id','','','support/teknis'),('KNT DUNIA, CV','Yenie Yulistin','031','8545894','081231417885','','kntc_marketing@sby.dnet.net.id','','3578016607750001','pemohon'),('KNT DUNIA, CV','Yenie Yulistin','031','8545894','081231417885','','kntc_marketing@sby.dnet.net.id','','3578016607750001','administrasi'),('KNT DUNIA, CV','Yenie Yulistin','031','8545894','081231417885','','kntc_marketing@sby.dnet.net.id','','3578016607750001','setup/teknis'),('KNT DUNIA, CV','Yenie Yulistin','031','8545894','081231417885','','kntc_marketing@sby.dnet.net.id','','3578016607750001','support/teknis'),('KNT DUNIA, CV','Chien Hui Chen','031','','','','kntc@sby.dnet.id','Unimas Garden D-26 Waru, Sidoarjo','3515185611610001','penanggungjawab'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','51162899','081235039356','085733561593','moestova@yahoo.com','','3515170305720005','pemohon'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','51162899','081235039356','085733561593','moestova@yahoo.com','','3515170305720005','administrasi'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','David Tong','031','','081358219999','','davidtong72@gmail.com','','3275102905720007','penanggungjawab'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Angshio Huang','031','','7318666','','','','','penagihan'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','','085733561593','','moestova@yahoo.com','','','setup/teknis'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','','085733561593','','moestova@yahoo.com','','','support/teknis'),('KNT DUNIA, CV','Chien Hui Chen','','','081231417885','','kntc@sby.dnet.net.id','Unimas Garden D-26 Waru, Sidoarjo','3515185611610001','penanggungjawab'),('LINDA OWEN WARDHANA','Linda owen Wardhana','031','','081217720088','','kotamassurabaya@yahoo.com','Pandegiling No.24 RT 011 RW 01 Kel.Keputran Kec.Tegalsari, Surabaya','1256124909880003','pemohon'),('RS WILLIAM BOOTH ','dr.Purnama Nugraha, M.Kes','031','','0818374336','','','','3578312012610001','pemohon'),('RS WILLIAM BOOTH ','Harold Jules Ambitan','031','','08113540384','','','','1050230905493002','penanggungjawab'),('RS WILLIAM BOOTH ','Edwin Higgi, SKM, MARS','031','','081330327214','','','','','penagihan'),('RS WILLIAM BOOTH ','Edwin Higgi, SKM, MARS','031','','081330327214','','','','','administrasi'),('RS WILLIAM BOOTH ','J.Setiyo Tri P.','031','','085725110434','','','','','setup/teknis'),('RS WILLIAM BOOTH ','Edwin Higgi, SKM, MARS','031','','081330327214','','','','','support/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi','031','7507021','03170606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20','','penanggungjawab'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi','031','7507021','03170606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20 Driyorejo Gresik','','penanggungjawab'),('PT MATAHARI PUTRA MAKMUR','Jefry Prijadi','0343','659926','','','rupin_office@yahoo.com','','','pemohon'),('PT MATAHARI PUTRA MAKMUR','Maria / Lia','0343','659926-29','','','','','','administrasi'),('PT MATAHARI PUTRA MAKMUR','Josephine','0343','659926-29','','','','','','penagihan'),('PT MATAHARI PUTRA MAKMUR','Erant / Setia','','','081703701718','08993928580','gabriel.erant@yahoo.com / z7ia@yahoo.com','','','setup/teknis'),('PT MATAHARI PUTRA MAKMUR','Erant / Setia','','','081703701718','08993928580','gabriel.erant@yahoo.com / z7ia@yahoo.com','','','support/teknis'),('WISMILAK','Wiwid Wijanarka','031','7493556','','','wiwid.wijanarka@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','setup/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi','031','7507021','03170606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20 Driyorejo Gresik','','pemohon'),('KOOLPEOPLE','Ronald Walla','031','','0816528545','','','Jl. Dharmahusada Indah Surabaya','','pemohon'),('PT NETMARKS INDONESIA','Bayu Seno Adji','021','83793007','','','bayu@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','support/teknis'),('PT NETMARKS INDONESIA','Aminuddin Al Fathoni','021','83793007','','','afathoni@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','administrasi'),('PT NETMARKS INDONESIA','Juhaeri Mumin','021','83793007','','','j.mumin@netmarks.co.id','Menara Bidakara 2nd Floor Jl. Gatot Subroto Kav. 71-73, Jakarta','','penagihan'),('TAKIRON INDONESIA, PT','Bambang Nur Cahyono','0343','659060','','','bambang@takiron.co.id','Jl. Kabupaten Cangkringan Malang, Beji, Pasuruan','','pemohon'),('TAKIRON INDONESIA, PT','Lala','0343','659060','','','lala_ehw@takiron.co.id','Jl. Kabupaten Cangkringan Malang, Beji, Pasuruan','','penagihan'),('TAKIRON INDONESIA, PT','Aminuddin Al Fathoni','0343','659060','','','afathoni@netmarks.co.id','Jl. Kalimantan 11 B-C, Surabaya','','administrasi'),('RSK Sumber Glagah','Kuntoro','0321','690441','','','bambangkw@gmail.com','Jl. Sumber Glagah, Pacet, Mojokerto','','pemohon'),('AUTOGLYM','David Santoso Tandra','031','3531515','','','','Jl. Arca, Desa Kemloko, Trawas, Mojokerto','','pemohon'),('PT. PADI INTERNET','Puji','031','5616330','','','puji@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('PT. PADI INTERNET','Thomas Balthazar','031','5616630','08123208712','','thomas@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','08165403268','','thomas_l@mikatasa.com','Jl. Rungkut Industri 2 / 2-4','','pemohon'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','08165403268','','thomas_l@mikatasa.com','Jl. Rungkut Industri 2 / 2-4','','administrasi'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','08165403268','','thomas_l@mikatasa.com','Jl. Rungkut Industri 2 / 2-4','','penagihan'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8420986','08165403268','','thomas_l@mikatasa.com','Jl. Rungkut Industri 2 / 2-4','','support/teknis'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Saldy Mansyur','0474','321654','081343529999','','','Jl. Sam Ratulangi No. 3, Malili, Luwu Timur','','pemohon'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Juwita','0474','321654','081355797460','','alwijuwita@yahoo.co.id','Jl. Sam Ratulangi No. 3, Malili, Luwu Timur','','administrasi'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','Juwita','0474','321654','081355797460','','alwijuwita@yahoo.co.id','Jl. Sam Ratulangi No. 3, Malili, Luwu Timur','','penagihan'),('JAMES THOMASOUW','James Thomasouw','031','70009292, 5020505','08175274007','08553206007','jamesft@ymail.com','Jl. Dharmawangsa 7 / 4','','pemohon'),('JAMES THOMASOUW','James Thomasouw','031','70502007','08553206007','','jamesft@ymail.com','Jl. Dharmawangsa 7 / 4','','pemohon'),('PT HRL INTERNASIONAL','Heru Prasanta Wijaya','031','08885275543','08885275543','','heru.p.wijaya@fuboru.co.id','Desa Mondoluku RT. 001 / RW. 001, Kec. Wringinanom, Gresik','','pemohon'),('PT HRL INTERNASIONAL','Heru Prasanta Wijaya','031','08885275543','08885275543','','heru.p.wijaya@fuboru.co.id','Desa Mondoluku RT. 001 / RW. 001, Kec. Wringinanom, Gresik','','penanggungjawab'),('PT HRL INTERNASIONAL','Alex Wijoyo','031','60503689','60503689','','alex.wijoyo.ng@gmail.com','Desa Mondoluku RT. 001 / RW. 001, Kec. Wringinanom, Gresik','','support/teknis'),('PT. WATTARI TERANG ABADI','Andi Winarto','031','3570166','70603976','','wattarita@gmail.com','Jl. Kunir No. 10-12','','pemohon'),('PT. WATTARI TERANG ABADI','Andi Winarto','031','3570166','70603976','','wattarita@gmail.com','Jl. Kunir No. 10-12','','penanggungjawab'),('PT. WATTARI TERANG ABADI','Surya Wiyono','031','3570166','70603976','','wattarita@gmail.com','Jl. Kunir No. 10-12','','penagihan'),('PT. WATTARI TERANG ABADI','Surya Wiyono','031','3570166','70603976','','wattarita@gmail.com','Jl. Kunir No. 10-12','','support/teknis'),('TIANGAPI (MR. YULIANSUN)','Yuliansun','031','60772771','\'08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','pemohon'),('TIANGAPI (MR. YULIANSUN)','Yuliansun','031','60772771','\'08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','penanggungjawab'),('OLYMPIC SPRINGBED','Nicolas Budi Setiadi','031','7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok I / 2, Surabaya','','pemohon'),('OLYMPIC SPRINGBED','Nicolas Budi Setiadi','031','7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok I / 2, Surabaya','','support/teknis'),('OLYMPIC SPRINGBED','Nicolas Budi Setiadi','031','7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok I / 2, Surabaya','','penagihan'),('PT. FUBORU INDONESIA','Heru Prasanta Wijaya','031','8971668/9','0811323445','','heru.p.wijaya@fuboru.co.id','Jl. Raya Trosobo Komplek Industri Kav. 5, Sidoarjo','','pemohon'),('PT. FUBORU INDONESIA','Heru Prasanta Wijaya','031','8971668/9','0811323445','','heru.p.wijaya@fuboru.co.id','Jl. Raya Trosobo Komplek Industri Kav. 5, Sidoarjo','','penanggungjawab'),('PT. FUBORU INDONESIA','Alex Wijoyo','031','8971668/9','60503689','','alex.wijoyo.ng@gmail.com','Jl. Raya Trosobo Komplek Industri Kav. 5, Sidoarjo','','penagihan'),('PT. FUBORU INDONESIA','Alex Wijoyo','031','8971668/9','60503689','','alex.wijoyo.ng@gmail.com','Jl. Raya Trosobo Komplek Industri Kav. 5, Sidoarjo','','support/teknis'),('MALEEQA MUSLIM WEAR','Lovrita Permana Sari','031','5352371','085733885680','','lovrita.maleeqa@gmail.com','Jl. Jagalan IX-9, Surabaya','','pemohon'),('MALEEQA MUSLIM WEAR','Lovrita Permana Sari','031','5352371','085733885680','','lovrita.maleeqa@gmail.com','Jl. Jagalan IX-9, Surabaya','','penanggungjawab'),('MALEEQA MUSLIM WEAR','Lovrita Permana Sari','031','5352371','085733885680','','lovrita.maleeqa@gmail.com','Jl. Jagalan IX-9, Surabaya','','penagihan'),('CV. GLOBAL INC','Dewi Sufia','031','8669000','085331756576','','cvglobal.inc4@gmail.com','Jl. Sedati Agung No. 27, Juanda, Sidoarjo','','pemohon'),('CV. GLOBAL INC','Dewi Sufia','031','8669000','085331756576','','cvglobal.inc4@gmail.com','Jl. Sedati Agung No. 27, Juanda, Sidoarjo','','penagihan'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara II/D-23, Surabaya','','pemohon'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara II/D-23, Surabaya','','penanggungjawab'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara II/D-23, Surabaya','','support/teknis'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara II/D-23, Surabaya','','penagihan'),('PT HRL INTERNASIONAL','lengdyarto','031','8971668','','','bio_leng@yahoo.com','Jl.RAYA TROSOBO KOMPLEK INDUSTRI KAV.V - TROSOBO - SIDOARJO- INDONESIA','','support/teknis'),('PT HRL INTERNASIONAL','Heru Prasanta Wijaya','031','08885275543','0811323445','','heru.p.wijaya@fuboru.co.id','Jl.RAYA TROSOBO KOMPLEK INDUSTRI KAV.V - TROSOBO - SIDOARJO- INDONESIA','','pemohon'),('STEFANUS GUNAWAN','Stefanus Gunawan','031','72560072','085648574889','','stefanusinfor@gmail.com','Jl. Kapas Gading Madya III D / 19 A, Surabaya','','pemohon'),('STEFANUS GUNAWAN','Stefanus Gunawan','031','72560072','085648574889','','stefanusinfor@gmail.com','Jl. Kapas Gading Madya III D / 19 A, Surabaya','','penanggungjawab'),('STEFANUS GUNAWAN','Stefanus Gunawan','031','72560072','085648574889','','stefanusinfor@gmail.com','Jl. Kapas Gading Madya III D / 19 A, Surabaya','','support/teknis'),('STEFANUS GUNAWAN','Stefanus Gunawan','031','72560072','085648574889','','stefanusinfor@gmail.com','Jl. Kapas Gading Madya III D / 19 A, Surabaya','','penagihan'),('PT. NUSA TOYOTETSU ENGINEERING','Unang F. Hakim','021','8980777','08111101101','','uf_hakim@yahoo.co.id','Kawasan Industri MM 2100Blok J-12, 14, 15, Cibitung, Bekasi','','pemohon'),('PT. NUSA TOYOTETSU ENGINEERING','Unang F. Hakim','021','8980777','08111101101','','uf_hakim@yahoo.co.id','Kawasan Industri MM 2100Blok J-12, 14, 15, Cibitung, Bekasi','','penanggungjawab'),('PT. NUSA TOYOTETSU ENGINEERING','Unang F. Hakim','021','8980777','08111101101','','uf_hakim@yahoo.co.id','Kawasan Industri MM 2100Blok J-12, 14, 15, Cibitung, Bekasi','','penagihan'),('PT. NUSA TOYOTETSU ENGINEERING','Unang F. Hakim','021','8980777','08111101101','','uf_hakim@yahoo.co.id','Kawasan Industri MM 2100Blok J-12, 14, 15, Cibitung, Bekasi','','support/teknis'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','','djajadi@ciptajayamedika.com','Jl. Biliton No. 15, Surabaya','','pemohon'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','','djajadi@ciptajayamedika.com','Jl. Biliton No. 15, Surabaya','','penanggungjawab'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','','djajadi@ciptajayamedika.com','Jl. Biliton No. 15, Surabaya','','penagihan'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','','djajadi@ciptajayamedika.com','Jl. Biliton No. 15, Surabaya','','support/teknis'),('PT. SUKO MITRA SEJATI','Eko Yulianto','031','71483673','085648339033','','ekoyid@yahoo.com','Perum Taman Suko Asri Blok C-28, Sukodono, Sidoarjo','','pemohon'),('PT. SUKO MITRA SEJATI','Eko Yulianto','031','71483673','085648339033','','ekoyid@yahoo.com','Perum Taman Suko Asri Blok C-28, Sukodono, Sidoarjo','','penanggungjawab'),('PT. SUKO MITRA SEJATI','Eko Yulianto','031','71483673','085648339033','','ekoyid@yahoo.com','Perum Taman Suko Asri Blok C-28, Sukodono, Sidoarjo','','penagihan'),('PT. SUKO MITRA SEJATI','Eko Yulianto','031','71483673','085648339033','','ekoyid@yahoo.com','Perum Taman Suko Asri Blok C-28, Sukodono, Sidoarjo','','support/teknis'),('PT. UNINEXUS INDONESIA','Dahlan','021','80206354','08175274007','','dahlan@bakrie.co.id','Jl. Tebet Barat XIII No. 7,Jakarta','','pemohon'),('PT. UNINEXUS INDONESIA','Dahlan','021','80206354','08175274007','','dahlan@bakrie.co.id','Jl. Tebet Barat XIII No. 7,Jakarta','','penanggungjawab'),('PT. UNINEXUS INDONESIA','Dahlan','021','80206354','08175274007','','dahlan@bakrie.co.id','Jl. Tebet Barat XIII No. 7,Jakarta','','support/teknis'),('PT. UNINEXUS INDONESIA','Dahlan','021','80206354','08175274007','','dahlan@bakrie.co.id','Jl. Tebet Barat XIII No. 7,Jakarta','','penagihan'),('PT. EFFERTECH','Merry Chiang','031','60906666','08123510999','','pt.effertech@gmail.com','Jl. Pucang Anom 7/15, Surabaya','','pemohon'),('PT. EFFERTECH','Merry Chiang','031','60906666','08123510999','','pt.effertech@gmail.com','Jl. Pucang Anom 7/15, Surabaya','','penanggungjawab'),('PT. EFFERTECH','Merry Chiang','031','60906666','08123510999','','pt.effertech@gmail.com','Jl. Pucang Anom 7/15, Surabaya','','support/teknis'),('PT. EFFERTECH','Merry Chiang','031','60906666','08123510999','','pt.effertech@gmail.com','Jl. Pucang Anom 7/15, Surabaya','','penagihan'),('PT. INDOPIPE ','Kukuh W.S','031','3990550','08179673194','','kukuh@indopipe.com','Jl. Kawasan Industri Gresik Raya Selatan Blok D12A-26, Gresik','','pemohon'),('PT. INDOPIPE ','Kukuh W.S','031','3990550','08179673194','','kukuh@indopipe.com','Jl. Kawasan Industri Gresik Raya Selatan Blok D12A-26, Gresik','','penanggungjawab'),('PT. INDOPIPE ','Syarief Husain','031','3990550','08113448652','','syarief.husain@indopipe.com','Jl. Kawasan Industri Gresik Raya Selatan Blok D12A-26, Gresik','','support/teknis'),('PT. INDOPIPE ','Syarief Husain','031','3990550','08113448652','','syarief.husain@indopipe.com','Jl. Kawasan Industri Gresik Raya Selatan Blok D12A-26, Gresik','','penagihan'),('CV. JARDINE HOUSE PARTNER','Herosan Soesilo','031','70979630','','','jardine_house_partner@yahoo.com','Ruko Sentra Darmo Villa C-15, Jl. Raya Darmo Permai Selatan, Surabaya','','pemohon'),('CV. JARDINE HOUSE PARTNER','Herosan Soesilo','031','70979630','','','jardine_house_partner@yahoo.com','Ruko Sentra Darmo Villa C-15, Jl. Raya Darmo Permai Selatan, Surabaya','','penanggungjawab'),('CV. JARDINE HOUSE PARTNER','Sritanti Hendrawati','031','70979630','','','t_hendrawati@yahoo.com','Ruko Sentra Darmo Villa C-15, Jl. Raya Darmo Permai Selatan, Surabaya','','penagihan'),('CV. JARDINE HOUSE PARTNER','Sritanti Hendrawati','031','70979630','','','t_hendrawati@yahoo.com','Ruko Sentra Darmo Villa C-15, Jl. Raya Darmo Permai Selatan, Surabaya','','administrasi'),('PT. HARSONO HERMANTO STRATEGIC CONSULTING','Julius Hardianto','021','57936777','08151818215','','julius.hardianto@harsono-strategic.com','Sudirman Plaza, Plaza Marien 9th Floor, Jl. Jendral Sudirman Kav. 76-78, Jakarta Selatan','','pemohon'),('PT. HARSONO HERMANTO STRATEGIC CONSULTING','Julius Hardianto','021','57936777','08151818215','','julius.hardianto@harsono-strategic.com','Sudirman Plaza, Plaza Marien 9th Floor, Jl. Jendral Sudirman Kav. 76-78, Jakarta Selatan','','penanggungjawab'),('PT. HARSONO HERMANTO STRATEGIC CONSULTING','Syaiful Rahman','021','57936777','08151822299','','syaiful.rahman@harsono-strategic.com','Sudirman Plaza, Plaza Marien 9th Floor, Jl. Jendral Sudirman Kav. 76-78, Jakarta Selatan','','penagihan'),('PT. HARSONO HERMANTO STRATEGIC CONSULTING','Syaiful Rahman','021','57936777','08151822299','','syaiful.rahman@harsono-strategic.com','Sudirman Plaza, Plaza Marien 9th Floor, Jl. Jendral Sudirman Kav. 76-78, Jakarta Selatan','','support/teknis'),('CV. INLINE','Harry Hardjanto','031','8275053','','','info@inline.co.id','Jl. Ketintang Baru II No. 48, Surabaya','','pemohon'),('CV. INLINE','Harry Hardjanto','031','8275053','','','info@inline.co.id','Jl. Ketintang Baru II No. 48, Surabaya','','penanggungjawab'),('CV. INLINE','Nia','031','8275053','','','nia.inline@gmail.com','Jl. Ketintang Baru II No. 48, Surabaya','','penagihan'),('CV. INLINE','Nia','031','8275053','','','nia.inline@gmail.com','Jl. Ketintang Baru II No. 48, Surabaya','','support/teknis'),('SDK ST XAVERIUS','Dra. Marthalita','031','3538556','','','','Candi Lontar Tengah 42-P/08 Surabaya','3578314610590003','pemohon'),('SDK ST XAVERIUS','Astimunah','031','3538556','','','','Kandangan mulya 3-D/19 Surabaya ','3578194406700001','penagihan'),('SDK ST XAVERIUS','M. Indra Patmoko ','031','3538556','03177770427','','indra.ptmk@gmail.com','','','setup/teknis'),('SDK ST XAVERIUS','Astimunah','031','3538556','','','','Kandangan mulya 3-D/19 Surabaya ','3578194406700001','administrasi'),('SDK ST XAVERIUS','Dra. Marthalita','031','3538556','','','','Candi Lontar Tengah 42-P/08 Surabaya','3578314610590003','penanggungjawab'),('YULIA ARIEF (DANIEL)','Yulia Arief','','','081234567733','081234567733','yulia_cen733@yahoo.co.id','Raya Kertajaya Indah','3578095908760005','pemohon'),('YULIA ARIEF (DANIEL)','Yulia Arief','','','081234567733','081234567733','yulia_cen733@yahoo.co.id','Raya Kertajaya Indah Surabaya','3578095908760005','penagihan'),('YULIA ARIEF (DANIEL)','Yulia Arief','','','081234567733','081234567733','yulia_cen733@yahoo.co.id','Raya Kertajaya Indah Surabaya','3578095908760005','setup/teknis'),('YULIA ARIEF (DANIEL)','Yulia Arief','','','081234567733','081234567733','yulia_cen733@yahoo.co.id','Raya Kertajaya Indah surabaya','3578095908760005','support/teknis'),('GRAHA MULTI BINTANG, PT','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Tambak Langon Indah I/2 Surabaya','3515071506760004','pemohon'),('GRAHA MULTI BINTANG, PT','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Tambak Langon Indah I/2 Surabaya','3515071506760004','administrasi'),('GRAHA MULTI BINTANG, PT','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Tambak Langon Indah I/2 Surabaya','3515071506760004','setup/teknis'),('GRAHA MULTI BINTANG, PT','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Tambak Langon Indah I/2 Surabaya','3515071506760004','penagihan'),('KUKUH TRIATNO KUSUMA ','Kukuh Triatno Kusuma ','031','7494468','085231128666','','kutrima@gmail.com','Jl. Tambak Asri 103 Surabaya ','3578152306820004','pemohon'),('KUKUH TRIATNO KUSUMA ','Kukuh Triatno Kusuma ','031','7494468','085231128666','','kutrima@gmail.com','Jl. Tambak Asri 103 Surabaya ','3578152306820004','administrasi'),('KUKUH TRIATNO KUSUMA ','Kukuh Triatno Kusuma ','031','7494468','085231128666','','kutrima@gmail.com','Jl. Tambak Asri 103 Surabaya ','3578152306820004','setup/teknis'),('KUKUH TRIATNO KUSUMA ','Kukuh Triatno Kusuma ','031','7494468','085231128666','','kutrima@gmail.com','Jl. Tambak Asri 103 Surabaya ','3578152306820004','penagihan'),('PROFESCIPTA WAHANATEHNIK,PT','Yulius Irwan Rachim Rachmantio Ph.D','021','8580515','0811943184','','julius.rachmantio@profescipta.com','Gd. Titan Lt.3 Jl. Slamet Riyadi No.7 Matraman Jakarta 13150','09.5005.200968.0296','pemohon'),('PROFESCIPTA WAHANATEHNIK,PT','Yulius Irwan Rachim Rachmantio Ph.D','021','8580515','0811943184','','julius.rachmantio@profescipta.com','Gd. Titan Lt.3 Jl. Slamet Riyadi No.7 Matraman Jakarta 13150','09.5005.200968.0296','penanggungjawab'),('PROFESCIPTA WAHANATEHNIK,PT','Firdawan Fauziah','021','8580515','08888163614','','firda.fauziah@profescipta.com','','','administrasi'),('PROFESCIPTA WAHANATEHNIK,PT','Verrysoon','021','8580515','085776645100','','verrysoon@profescipta.com','','','setup/teknis'),('PROFESCIPTA WAHANATEHNIK,PT','Verrysoon','021','8580515','085776645100','','verrysoon@profescipta.com','','','support/teknis'),('PROFESCIPTA WAHANATEHNIK,PT','Firdawan Fauziah','021','8580515','08888163614','','firda.fauziah@profescipta.com','','','penagihan'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13C / 6','','pemohon'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13C / 6','','penanggungjawab'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13C / 6','','penagihan'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13C / 6','','support/teknis'),('SUPARMA Tbk, PT','Mei Lan','031','70035788','','','info@langgengkaryamakmur.com','Jl. MH. Thamrin No. 71','','pemohon'),('SUPARMA Tbk, PT','Tony / Jusak','031','3539888 / 3533776','','','purchasing@ptsuparmatbk.com','Jl. Sulung Sekolahan 6A, Surabaya','','penanggungjawab'),('SUPARMA Tbk, PT','Tony / Jusak','031','3539888 / 3533776','','','purchasing@ptsuparmatbk.com','Jl. Sulung Sekolahan 6A, Surabaya','','penagihan'),('SUPARMA Tbk, PT','Tony / Jusak','031','3539888 / 3533776','','','purchasing@ptsuparmatbk.com','Jl. Sulung Sekolahan 6A, Surabaya','','support/teknis'),('PT. CITARASA SUKSES','Tatang Waluyo','031','8677868','088803247856','','citarasasukses@yahoo.co.id','Jl. Tambak Jabon F-3, Waru, Sidoarjo','','pemohon'),('PT. CITARASA SUKSES','Tatang Waluyo','031','8677868','088803247856','','citarasasukses@yahoo.co.id','Jl. Tambak Jabon F-3, Waru, Sidoarjo','','penanggungjawab'),('PT. CITARASA SUKSES','Tatang Waluyo','031','8677868','088803247856','','citarasasukses@yahoo.co.id','Jl. Tambak Jabon F-3, Waru, Sidoarjo','','penagihan'),('PT. CITARASA SUKSES','Tatang Waluyo','031','8677868','088803247856','','citarasasukses@yahoo.co.id','Jl. Tambak Jabon F-3, Waru, Sidoarjo','','support/teknis'),('SUMATERA HOMESTAY','Hardjono','031','5030662','','','','Indragiri FH-01 RT 57 RW 06 Kel.Tropodo, Waru-Sidoarjo','3515180103520001','pemohon'),('CV RAMAYANA PUTRA MOTOR (Surabaya)','Winata Budhi Prayitno','031','3930253, 3930254','','','winatabp@gmail.com','Basuki rachmad 49 RT 02 RW 08 Kel.Embong Kaliasin Kec.Genteng Surabaya','1256112501750001','pemohon'),('CV RAMAYANA PUTRA MOTOR (Surabaya)','Arsyah Febriantara Sundjani','031','3930253','085730049251','','','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','3525100602860004','support/teknis'),('FAKHRUDDIN','Fakhruddin','','081333797877','081333797877','','udinalie@aol.com','Jl. Belibis PV 29 Rewwin Waru Sidoarjo ','351518049750006','pemohon'),('FAKHRUDDIN','Fakhruddin','','081333797877','081333797877','','udinalie@aol.com','Jl. Belibis PV 29 Rewwin Waru Sidoarjo','351518049750006','administrasi'),('FAKHRUDDIN','Fakhruddin','031','','081333797877','','udinalie@aol.com','Jl. Belibis PV 29 Rewwin Waru Sidoarjo','351518049750006','setup/teknis'),('FAKHRUDDIN','Fakhruddin','','081333797877','081333797877','','udinalie@aol.com','Jl. Belibis PV 29 Rewwin Waru Sidoarjo','351518049750006','penagihan'),('FAKHRUDDIN','Fakhruddin','','081333797877','081333797877','','udinalie@aol.com','Jl. Belibis PV 29 Rewwin Waru Sidoarjo','351518049750006','penanggungjawab'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','081235328001','','matrix_mpg@yahoo.com','Jl.Melati BF-19 RT 01 RW 06 Kel.Madegondo Kec.Grogol , Sukoharjo','3311092604730004','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','Jl.Melati BF-19 RT 01 RW 06 Kel.Madegondo Kec.Grogol , Sukoharjo','3311092604730004','pemohon'),('GRAHA MULTI BINTANG, PT','Asan','031','7493808','0817104119','','mr_assan@yahoo.com','Kupang Jaya 5/15 RT 004 RW 006 Kel.Sono Kwijenan Kec.Sukomanunggal, Surabaya','3578272612690004','pemohon'),('ADI SUSANTO','Adi Susanto','031','72449804','','','dadevil_13@yahoo.com','Gubeng Kertajaya 11E/12 RT 09 RW 06 Kel.Airlangga Kec.Gubeng, Surabaya','3578082709830003','pemohon'),('RUDY SUGIHARTO','Rudy Sugiharto','031','91710344','08123001544','','rsugihar@gmail.com','Sidomulyo I/15 RT 02 RW 03 Kel.Mentikan Kec.Prajurit Kulon, Mojokerto','3576010404760004','pemohon'),('TAN STEFAN OKANTJANDRA ','Tan Stefan Okantjandra','031','8477011','0811337173','','stayfun18@live.com','Kendangsari RT 03 RW 01 Kel.Kendangsari Kec.Tenggilis Mejoyo, Surabaya','3578243007800002','pemohon'),('WIDI TRI HATMOKO','Widi tri Hatmoko','031','','089675732344','','frogzz_hollows@hotmail.com','Jl.Wilis I/16 RT 04 RW 01 Kel.Wates Kec.Magersari, Mojokerto','3576021905890002','pemohon'),('ALBERT PASTRIONO TANDRA ','Albert Pastriono Tandra','031','8722255','081332984953','','albert_tandra1@yahoo.com','Klampis Semolo Barat 54 RT 07 RW 01 Kel.Semolowaru Kec.Sukolilo,Surabaya','3578262405870002','pemohon'),('M MIFTAKHUL RIZAL ','M Miftakhul Rizal','031','','085257457536','','','Margorejo 101 G RT 02 RW 03 Kel.Margorejo Kec.Wonocolo, Surabaya','','pemohon'),('JAMES ARTHUR PAKASI ','James Arthur Pakasi','031','70211459','081234100789','','jamesdv19@yahoo.com','Jl.Wuni No.10 RT 38 RW 12 Kel.Kejuron Kec.Taman, Madiun','3577030707840003','pemohon'),('KARSONO SETIOKUSUMO','Karsono Setiokusumo','031','70411257','','','youglh@yahoo.com','','35780328085700','pemohon'),('GRAHA MULTI BINTANG, PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('KUKUH WAHYU PUTRANTO','Kukuh Wahyu Putranto','031','7410438','083849212608','','kukuh_wp@telkom.net','Jl.manukan Lor 6A-23 RT 05 RW 02 Kel.Banjarsugihan Kec.Tandes, Surabaya','3578142602750002','pemohon'),('KRISTANTO WICAKSONO','Kristanto Wicaksono','031','60726272','082112200021','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','pemohon'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','082112200021','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','pemohon'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','082112200021','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','administrasi'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','082112200021','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','setup/teknis'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','082112200021','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','support/teknis'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Rahel','031','5472422','','','info@momentum.or.id','','','penagihan'),('GEREJA REFORMED INJILI INDONESIA (GRII)','James Hartono Setio','031','5472422','','','','Raya Kupang Indah 27 Surabaya','3578210110820001','penanggungjawab'),('CHRISTIAN JUWANTORO','Christian Juwantoro','031','8290015, 60749777','','','concepttuner@yahoo.com','Gayungsari Barat 05/38 Surabaya','3578222507860001','pemohon'),('CICILIA WENYNATA TANUJAYA','Cicilia Wnynata Tanujaya','031','7533399','0816524805','','','Taman Pondok Indah XX/12A RT 03 RW 09 Kel.Wiyung Kec.Wiyung, Surabaya','1256144109810003','pemohon'),('DANIEL WIJAYA AMARTA','Daniel Wijaya Amarta','031','60605114','08563002346','','ikon.multi.service@gmail.com','Jl.Argopuro 30 Krajan Kidul RT 02 RW 18 Kel.Rambigundam Kec.Rambipuji, Jember','3509130904810007','pemohon'),('VICTOR AHOLIAB','Victor Aholiab','031','','0816535815','','vicah@hotmail.com','Lebak Timur 8/20 RT 02 RW 15 Kel.Gading Kec.tambaksari, Surabaya','3578102510760007','pemohon'),('ABDILLAH WICAKSANA BASRI','Abdillah Wicaksana Basri','031','','085645808919','','linuxish.d.nefron@gmail.com','RT 02 RW 04 Kel.Resomulyo Kec.Kras, Kediri 64172','3578081405580001','pemohon'),('AGUS PURNOMO','Agus Purnomo','031','70954356','08123216140','','pipin1@gmail.com','Pondok Tanjung Permai E-8 RT 04 RW 08 Kel.Wonorejo Kec.Rungkut, Surabaya','12.5620.070174.0006','pemohon'),('MELYANA STEFANI','Melyana Stefani','031','7347990','081330315678','','kevin.wibisono@yahoo.com','Graha Family Utara Blok D-143A Surabaya','3578215410680001','pemohon'),('GEREJA BETHANY','Moho Setiya Putra','031','','085931222722','','moho@bethanygraha.org','Banyu Urip lor IVB/11','3578151610810004','pemohon'),('GEREJA BETHANY','Moho Setiya Putra','031','','085931222722','','moho@bethanygraha.org','Jl.Banyu Urip Lor IVB/11 Surabaya','3578151610810004','pemohon'),('PG RAJAWALI I','Agus Wachit Saifudin','031','','08123225310','','agus_sbycity@yahoo.co.id','Jl.Ploso I/19A RT 01 RW 05 Kel.Ploso Kec.tambaksari, Surabaya','3578182608700000','pemohon'),('GRAHA MULTI BINTANG, PT','Asan','031','7493808','0817104119','','mr_assan@yahoo.com','Kupang Jaya V/15 RT 004 RW 006 Kel.Sono Kwijenan Kec.Sukomanunggal, Surabaya','3578272612690004','pemohon'),('ISPANJI PRATAMA','Ispanji Pratama','031','5941329','70239011','','ispanjipratama@gmail.com','Manyar Indah V/14 Surabaya','3578090412890001','pemohon'),('PD AIR BERSIH PROVINSI JATIM','Ibrahim Sahara','031','8413551','','','pdab.teknik@yahoo.co.id','Jl.Patimur 60 RT 24 RW 05 Kel.Sengon, Jombang','3517093012830003','pemohon'),('TJOEK WAHYU SETYOADI','Tjoek Wahyu Setyoadi','031','70315669','0816516841','','dinograph@gmail.com','Gubeng Kertajaya V/54 RT 08 RW 03 Kel.Airlangga Kec.Gubeng, Surabaya','3578081811710003','pemohon'),('PT PANIN SEKURITAS','Lydia Handaya','031','','0818510018','','','Kertajaya Indah 4/26 RT 02 RW 10 Kel.Manyar Sabrangan Kec.Mulyorejo, Surabaya','3578265807810001','pemohon'),('MITRA BALI INDAH (MITRA 10)','Yonatan Refa Christian','031','8961893','087852162963','','yonatan.christian@mitra10.co.id','Jl.Kalitengah Selatan 22 RT 02 RW 03 Kel.Kalitengah Kec.tanggulangin, Sidoarjo','3515062409850002','pemohon'),('BAGHDAD GAME','Achmad Farid B','031','','085230383838','','jipayz@yahoo.com','Ikan kerapu Barat 4/16 RT 04 RW 08 Kel.Sidokumpul, Gresik','3525161511810001','pemohon'),('BAGHDAD GAME','Achmad Farid B','031','','085230383838','','jipayz@yahoo.com','Ikan kerapu Barat 4/16 RT 04 RW 08 Kel.Sidokumpul, Gresik','3525161511810001','administrasi'),('BAGHDAD GAME','Achmad Farid B','031','','085230383838','','jipayz@yahoo.com','Ikan kerapu Barat 4/16 RT 04 RW 08 Kel.Sidokumpul, Gresik','3525161511810001','penagihan'),('BAGHDAD GAME','Achmad Farid B','031','','085230383838','','jipayz@yahoo.com','Ikan kerapu Barat 4/16 RT 04 RW 08 Kel.Sidokumpul, Gresik','3525161511810001','setup/teknis'),('BAGHDAD GAME','Achmad Farid B','031','','085230383838','','jipayz@yahoo.com','Ikan kerapu Barat 4/16 RT 04 RW 08 Kel.Sidokumpul, Gresik','3525161511810001','support/teknis'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','71988359','','daud-kristiawan@yahoo.com','Sutorejo Prima Utara 2/4 (PT-2) Surabaya','12.5622.210278.0001','pemohon'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','71988359','','daud-kristiawan@yahoo.com','Sutorejo Prima Utara 2/4 (PT-2) Surabaya','12.5622.210278.0001','administrasi'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','71988359','','daud-kristiawan@yahoo.com','Sutorejo Prima Utara 2/4 (PT-2) Surabaya','12.5622.210278.0001','setup/teknis'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','71988359','','daud-kristiawan@yahoo.com','Sutorejo Prima Utara 2/4 (PT-2) Surabaya','12.5622.210278.0001','penagihan'),('BREAKSHOT MULTI PLAYER GAME','Daud Kristiawan','031','3824151','71988359','','daud-kristiawan@yahoo.com','Sutorejo Prima Utara 2/4 (PT-2) Surabaya','12.5622.210278.0001','support/teknis'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','','pemohon'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','','administrasi'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','','setup/teknis'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','','penagihan'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','','support/teknis'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','3578152106860001','pemohon'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','3578152106860001','administrasi'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','3578152106860001','setup/teknis'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','3578152106860001','penagihan'),('BREAKSHOT MULTI PLAYER GAME','Yulius Santoso','031','60453844','085648105410','','yulius86@gmail.com','','3578152106860001','support/teknis'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','Gayungsari 11/63','3578222406790001','pemohon'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','Gayungsari 11/63','3578222406790001','setup/teknis'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','Gayungsari 11/63','3578222406790001','penagihan'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','Gayungsari 11/63','3578222406790001','support/teknis'),('D\'AUTHIZT MPG','Roy Pratama','031','60747068','08563072873','','authizt@gmail.com','Gayungsari 11/63','3578222406790001','administrasi'),('DWAN CYBERGAMES','Iwan Purwanto','031','7671511','081231266658','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','pemohon'),('DWAN CYBERGAMES','Iwan Purwanto','031','7671511','081231266658','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','penagihan'),('DWAN CYBERGAMES','Koko Ityamardy','031','','081654888424','','','','','setup/teknis'),('DWAN CYBERGAMES','Koko Ityamardy','031','','081654888424','','','','','support/teknis'),('DWAN CYBERGAMES','Iwan Purwanto','031','7671511','081231266658','','','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','pemohon'),('DWAN CYBERGAMES','Iwan Purwanto','031','7671511','081231266658','','','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','penagihan'),('DWAN CYBERGAMES','Koko Ityawamady','031','','081654888424','','','','','setup/teknis'),('DWAN CYBERGAMES','Koko Ityawamady','031','','081654888424','','','','','support/teknis'),('DWAN CYBERGAMES','Iwan Purwanto','031','71868658','0812316550','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','pemohon'),('DWAN CYBERGAMES','Iwan Purwanto','031','71868658','0812316550','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','administrasi'),('DWAN CYBERGAMES','Iwan Purwanto','031','71868658','0812316550','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','penanggungjawab'),('DWAN CYBERGAMES','Iwan Purwanto','031','71868658','0812316550','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','setup/teknis'),('DWAN CYBERGAMES','Iwan Purwanto','031','71868658','0812316550','','lanlinlun73@yahoo.com','Griya Kebraon Selatan FA/32 Kel.Kebraon Kec.Karangpilang, Surabaya','12.5601.060774.0003','support/teknis'),('ESA NET (BAMBANG MEI SANTOSO)','Bambang Mei Santoso','031','7591190','08123099424','','bambang_esa_net@yahoo.co.id','Simo Pomahan 1/12 RT 08 RW 10 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271105660003','pemohon'),('ESA NET (BAMBANG MEI SANTOSO)','Bambang Mei Santoso','031','7591190','08123099424','','bambang_esa_net@yahoo.co.id','Simo Pomahan 1/12 RT 08 RW 10 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271105660003','administrasi'),('ESA NET (BAMBANG MEI SANTOSO)','Bambang Mei Santoso','031','7591190','08123099424','','bambang_esa_net@yahoo.co.id','Simo Pomahan 1/12 RT 08 RW 10 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271105660003','penagihan'),('ESA NET (BAMBANG MEI SANTOSO)','Yosua yerri','031','','081328881062','','yosuayerri@yahoo.co.id','','','setup/teknis'),('ESA NET (BAMBANG MEI SANTOSO)','Yosua yerri','031','','081328881062','','yosuayerri@yahoo.co.id','','','support/teknis'),('LUNAR ZONE ONLINE','Christianto Adi Wicksono G','031','72841315','0899367740','','lunarzone@padinet.com','Pondok Alam Sigura Gura A2/20 Kel.Karangbesuki Kec.Sukun, Malang','3573041512850006','pemohon'),('LUNAR ZONE ONLINE','Christianto Adi Wicksono G','031','72841315','0899367740','','lunarzone@padinet.com','Pondok Alam Sigura Gura A2/20 Kel.Karangbesuki Kec.Sukun, Malang','3573041512850006','administrasi'),('LUNAR ZONE ONLINE','Christianto Adi Wicksono G','031','72841315','0899367740','','lunarzone@padinet.com','Pondok Alam Sigura Gura A2/20 Kel.Karangbesuki Kec.Sukun, Malang','3573041512850006','penagihan'),('LUNAR ZONE ONLINE','Roy','031','','085730471451','','','','','setup/teknis'),('LUNAR ZONE ONLINE','Roy','031','','085730471451','','','','','support/teknis'),('LYNX NET','Setiawan Gondodiharjo','031','51505208','087851363773','','setiawan.gondodiharjo@yahoo.com','','','pemohon'),('LYNX NET','Setiawan Gondodiharjo','031','51505208','087851363773','','setiawan.gondodiharjo@yahoo.com','','','administrasi'),('LYNX NET','Setiawan Gondodiharjo','031','51505208','087851363773','','setiawan.gondodiharjo@yahoo.com','','','penagihan'),('LYNX NET','Setiawan Gondodiharjo','031','51505208','087851363773','','setiawan.gondodiharjo@yahoo.com','','','setup/teknis'),('LYNX NET','Setiawan Gondodiharjo','031','51505208','087851363773','','setiawan.gondodiharjo@yahoo.com','','','support/teknis'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','','pemohon'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','','administrasi'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','','penagihan'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','','setup/teknis'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','','support/teknis'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','12.5618.310580.0010','pemohon'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','12.5618.310580.0010','administrasi'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','12.5618.310580.0010','setup/teknis'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','12.5618.310580.0010','penagihan'),('LYNX NET','Setiawan Gondodiharjo','031','','087851363773','','setiawan.gondodiharjo@yahoo.com','','12.5618.310580.0010','support/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','08123532800','','','','','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','08123532800','','','','','administrasi'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','08123532800','','','','','penagihan'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','08123532800','','','','','setup/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','08123532800','','','','','support/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','','','','','','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','','','','','','administrasi'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','','','','','','penagihan'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','','','','','','setup/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','70108060','','','','','','support/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','8418492','08123532800','','matrix@padinet.com','','','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','8418492','08123532800','','matrix@padinet.com','','','administrasi'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','8418492','08123532800','','matrix@padinet.com','','','setup/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','8418492','08123532800','','matrix@padinet.com','','','penagihan'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','8418492','08123532800','','matrix@padinet.com','','','support/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','administrasi'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','setup/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','penagihan'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','support/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','1127082604730002','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','1127082604730002','administrasi'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','1127082604730002','setup/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','1127082604730002','support/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','1127082604730002','penagihan'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','pemohon'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','administrasi'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','setup/teknis'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','penagihan'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','support/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','pemohon'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','administrasi'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','setup/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','penagihan'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','3311092604730004','support/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','pemohon'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','administrasi'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','setup/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','penagihan'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','matrix@padinet.com','','','support/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','','','','pemohon'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','','','','administrasi'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','','','','setup/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','','','','support/teknis'),('MATRIX RELOADED','Sunarto Budihono','031','','08123532800','','','','','penagihan'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','3578223103770001','pemohon'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','3578223103770001','administrasi'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','3578223103770001','setup/teknis'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','3578223103770001','support/teknis'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','3578223103770001','penagihan'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','08133190311','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','357822310377001','pemohon'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','08133190311','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','357822310377001','administrasi'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','08133190311','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','357822310377001','setup/teknis'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','08133190311','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','357822310377001','penagihan'),('ONLINE MEDIA GAMES','Muschram Machmud Fadli','031','77086811','08133190311','','fadli_media@yahoo.co.id','Jl.Ketintang No.18 RT 02 RW 06 Kel.Ketintang Kec.Gayungan, Surabaya','357822310377001','support/teknis'),('RICKYNET','Abdul Bahry','031','5030124','77055416','','','Jl.Gubeng Kertajaya 9-C/1 Surabaya','3578082109590001','pemohon'),('RICKYNET','Abdul Bahry','031','5030124','77055416','','','Jl.Gubeng Kertajaya 9-C/1 Surabaya','3578082109590001','administrasi'),('RICKYNET','Abdul Bahry','031','5030124','77055416','','','Jl.Gubeng Kertajaya 9-C/1 Surabaya','3578082109590001','setup/teknis'),('RICKYNET','Abdul Bahry','031','5030124','77055416','','','Jl.Gubeng Kertajaya 9-C/1 Surabaya','3578082109590001','penagihan'),('RICKYNET','Abdul Bahry','031','5030124','77055416','','','Jl.Gubeng Kertajaya 9-C/1 Surabaya','3578082109590001','support/teknis'),('RICKYNET','Abdul Bahry','031','5030124','77055415','','','Jl.Kertajaya 9C/1 Surabaya','3578082109590001','pemohon'),('RICKYNET','Abdul Bahry','031','5030124','77055415','','','Jl.Kertajaya 9C/1 Surabaya','3578082109590001','administrasi'),('RICKYNET','Abdul Bahry','031','5030124','77055415','','','Jl.Kertajaya 9C/1 Surabaya','3578082109590001','setup/teknis'),('RICKYNET','Abdul Bahry','031','5030124','77055415','','','Jl.Kertajaya 9C/1 Surabaya','3578082109590001','penagihan'),('RICKYNET','Abdul Bahry','031','5030124','77055415','','','Jl.Kertajaya 9C/1 Surabaya','3578082109590001','support/teknis'),('SURF N PLAY','Gigih Birista','031','71068624','081331066557','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','pemohon'),('SURF N PLAY','Gigih Birista','031','71068624','081331066557','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','administrasi'),('SURF N PLAY','Gigih Birista','031','71068624','081331066557','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','setup/teknis'),('SURF N PLAY','Gigih Birista','031','71068624','081331066557','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','penagihan'),('SURF N PLAY','Gigih Birista','031','71068624','081331066557','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','support/teknis'),('SURF N PLAY','Gigih Birista','031','71068624','','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','pemohon'),('SURF N PLAY','Gigih Birista','031','71068624','','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','administrasi'),('SURF N PLAY','Gigih Birista','031','71068624','','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','setup/teknis'),('SURF N PLAY','Gigih Birista','031','71068624','','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','penagihan'),('SURF N PLAY','Gigih Birista','031','71068624','','','gigih.personal@gmail.com','Teluk Bone Utara 12 Rt 07 RW 04 Kel.Perak Utara Kec.Pabean Cantian, Surabaya','12.5623.071277.0001','support/teknis'),('SNIPER','Alena','031','91008712','','','august.gunawan@gmail.com','','12.5612.520569.0002','pemohon'),('SNIPER','Alena','031','91008712','','','august.gunawan@gmail.com','','12.5612.520569.0002','setup/teknis'),('SNIPER','Alena','031','91008712','','','august.gunawan@gmail.com','','12.5612.520569.0002','penagihan'),('SNIPER','Alena','031','91008712','','','august.gunawan@gmail.com','','12.5612.520569.0002','support/teknis'),('SNIPER','Alena','031','91008712','','','august.gunawan@gmail.com','','12.5612.520569.0002','administrasi'),('SNIPER','Alena','031','91008712','','','','','12.5612.520569.0002','pemohon'),('SNIPER','Alena','031','91008712','','','','','12.5612.520569.0002','administrasi'),('SNIPER','Alena','031','91008712','','','','','12.5612.520569.0002','setup/teknis'),('SNIPER','Alena','031','91008712','','','','','12.5612.520569.0002','penagihan'),('SNIPER','Alena','031','91008712','','','','','12.5612.520569.0002','support/teknis'),('SNIPER','Alena','031','5678962','0811376254','','','','','pemohon'),('SNIPER','Alena','031','5678962','0811376254','','','','','administrasi'),('SNIPER','Alena','031','5678962','0811376254','','','','','setup/teknis'),('SNIPER','Alena','031','5678962','0811376254','','','','','penagihan'),('SNIPER','Alena','031','5678962','0811376254','','','','','support/teknis'),('SNIPER','Alena','031','70510297','5678962','0811376254','','','','pemohon'),('SNIPER','Alena','031','70510297','5678962','0811376254','','','','administrasi'),('SNIPER','Alena','031','70510297','5678962','0811376254','','','','setup/teknis'),('SNIPER','Alena','031','70510297','5678962','0811376254','','','','penagihan'),('SNIPER','Alena','031','70510297','5678962','0811376254','','','','support/teknis'),('SNIPER','Alena','031','70510297','','','','','','pemohon'),('SNIPER','Alena','031','70510297','','','','','','administrasi'),('SNIPER','Alena','031','70510297','','','','','','setup/teknis'),('SNIPER','Alena','031','70510297','','','','','','penagihan'),('SNIPER','Alena','031','70510297','','','','','','support/teknis'),('SNIPER','Alena','031','5678962','08121726318','08121726308','','','','pemohon'),('SNIPER','Alena','031','5678962','08121726318','08121726308','','','','administrasi'),('SNIPER','Alena','031','5678962','08121726318','08121726308','','','','setup/teknis'),('SNIPER','Alena','031','5678962','08121726318','08121726308','','','','penagihan'),('SNIPER','Putra/Dharlie','031','70579923','0811376254 (P','7673939 (Dhar','','','','support/teknis'),('SMART GAME CENTER','Andy Sugeng','031','8721446','77815167','','Rungkut Asri Tengah 8/7 Surabaya','','12.5622.150977.0001','pemohon'),('SMART GAME CENTER','Siti Jumaidah','031','8721446','77815167','','griya_jp@yahoo.com','','','administrasi'),('SMART GAME CENTER','Siti Jumaidah','031','8721446','77815167','','griya_jp@yahoo.com','','','penagihan'),('SMART GAME CENTER','Soin Wahyudi','031','70044892','','','','','','setup/teknis'),('SMART GAME CENTER','Soin Wahyudi','031','70044892','','','','','','support/teknis'),('SMART GAME CENTER','Andy Sugeng','031','8721446','77815167','','','Rungkut Asri Tengah 8/7 Surabaya','12.5622.150977.0001','pemohon'),('SMART GAME CENTER','Siti Jumaidah','031','8721446','','','griya_jp@yahoo.com','','','administrasi'),('SMART GAME CENTER','Siti Jumaidah','031','8721446','','','griya_jp@yahoo.com','','','penagihan'),('SMART GAME CENTER','Andy Sugeng','031','7781516','','','','Rungkut Asri Tengah 8/7 Surabaya','12.5622.150977.0001','pemohon'),('TOP ONE','Angela','031','8968535','70570367','','angelalesmana37@yahoo.com.hk','Salam RT 15 RW 4 Suko Sidoarjo','12.14.11.631063.0003','pemohon'),('TOP ONE','Angela','031','8968535','70570367','','angelalesmana37@yahoo.com.hk','Salam RT 15 RW 4 Suko Sidoarjo','12.14.11.631063.0003','administrasi'),('TOP ONE','Angela','031','8968535','70570367','','angelalesmana37@yahoo.com.hk','Salam RT 15 RW 4 Suko Sidoarjo','12.14.11.631063.0003','setup/teknis'),('TOP ONE','Angela','031','8968535','70570367','','angelalesmana37@yahoo.com.hk','Salam RT 15 RW 4 Suko Sidoarjo','12.14.11.631063.0003','penagihan'),('TOP ONE','Angela','031','8968535','70570367','','angelalesmana37@yahoo.com.hk','Salam RT 15 RW 4 Suko Sidoarjo','12.14.11.631063.0003','support/teknis'),('TOP ONE','Angela','031','8968535','','','','','','administrasi'),('TOP ONE','Angela','031','8968535','','','','','','pemohon'),('TOP ONE','Angela','031','8968535','','','','','','setup/teknis'),('TOP ONE','Angela','031','8968535','','','','','','penagihan'),('TOP ONE','Angela','031','8968535','','','','','','support/teknis'),('TOP ONE','Angela','031','8968535','8964016','08123299009','','','','pemohon'),('TOP ONE','Angela','031','8968535','8964016','08123299009','','','','administrasi'),('TOP ONE','Angela','031','8968535','8964016','08123299009','','','','setup/teknis'),('TOP ONE','Angela','031','8968535','8964016','08123299009','','','','penagihan'),('TOP ONE','Angela','031','8968535','8964016','08123299009','','','','support/teknis'),('TOP ONE','Angela','031','8964016','08123299009','70570367','','','','pemohon'),('TOP ONE','Angela','031','8964016','08123299009','70570367','','','','administrasi'),('TOP ONE','Angela','031','8964016','08123299009','70570367','','','','setup/teknis'),('TOP ONE','Angela','031','8964016','08123299009','70570367','','','','penagihan'),('TOP ONE','Angela','031','8964016','08123299009','70570367','','','','support/teknis'),('WARLOCK ONLINE','Robby Laksono','031','','081331011122','','koko_faisal@yahoo.com','Bratang Wetan 1-C/9 Ngagelrejo, Surabaya','3578042108830004','pemohon'),('WARLOCK ONLINE','Robby Laksono','031','','081331011122','','koko_faisal@yahoo.com','Bratang Wetan 1-C/9 Ngagelrejo, Surabaya','3578042108830004','administrasi'),('WARLOCK ONLINE','Robby Laksono','031','','081331011122','','koko_faisal@yahoo.com','Bratang Wetan 1-C/9 Ngagelrejo, Surabaya','3578042108830004','setup/teknis'),('WARLOCK ONLINE','Robby Laksono','031','','081331011122','','koko_faisal@yahoo.com','Bratang Wetan 1-C/9 Ngagelrejo, Surabaya','3578042108830004','penagihan'),('WARLOCK ONLINE','Robby Laksono','031','','081331011122','','koko_faisal@yahoo.com','Bratang Wetan 1-C/9 Ngagelrejo, Surabaya','3578042108830004','support/teknis'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail.com','Lebak Timur Indah no.8','12.5619.190482.0001','pemohon'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail.com','Lebak Timur Indah no.8','12.5619.190482.0001','administrasi'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail.com','Lebak Timur Indah no.8','12.5619.190482.0001','setup/teknis'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail.com','Lebak Timur Indah no.8','12.5619.190482.0001','penagihan'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail.com','Lebak Timur Indah no.8','12.5619.190482.0001','support/teknis'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail','Lebak Timur Indah No.8 Tambaksari Surabaya','12.5619.190482.0001','administrasi'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail','Lebak Timur Indah No.8 Tambaksari Surabaya','12.5619.190482.0001','pemohon'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail','Lebak Timur Indah No.8 Tambaksari Surabaya','12.5619.190482.0001','setup/teknis'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail','Lebak Timur Indah No.8 Tambaksari Surabaya','12.5619.190482.0001','penagihan'),('ZAGA MULTIPLAYER GAME','Richard','031','60407040','','','bun_hao@hotmail','Lebak Timur Indah No.8 Tambaksari Surabaya','12.5619.190482.0001','support/teknis'),('2 ETERNITY MULTI PLAYER GAME','Claudine Felicia Hartanto','031','','083854604111','','claudine_felicia@yahoo.com','Dukuh Kupang 24/20 Surabaya','12.5602.491180.0001','pemohon'),('2 ETERNITY MULTI PLAYER GAME','Claudine Felicia Hartanto','031','','083854604111','','claudine_felicia@yahoo.com','Dukuh Kupang 24/20 Surabaya','12.5602.491180.0001','administrasi'),('2 ETERNITY MULTI PLAYER GAME','Claudine Felicia Hartanto','031','','083854604111','','claudine_felicia@yahoo.com','Dukuh Kupang 24/20 Surabaya','12.5602.491180.0001','setup/teknis'),('2 ETERNITY MULTI PLAYER GAME','Claudine Felicia Hartanto','031','','083854604111','','claudine_felicia@yahoo.com','Dukuh Kupang 24/20 Surabaya','12.5602.491180.0001','penagihan'),('2 ETERNITY MULTI PLAYER GAME','Claudine Felicia Hartanto','031','','083854604111','','claudine_felicia@yahoo.com','Dukuh Kupang 24/20 Surabaya','12.5602.491180.0001','support/teknis'),('RIYAN PUTRA TJANDRA','Riyan Putra Tjandra','031','8435585','085931236222','','','','12.5608.300889.0003','pemohon'),('RIYAN PUTRA TJANDRA','Riyan Putra Tjandra','031','8435585','085931236222','','','','12.5608.300889.0003','administrasi'),('RIYAN PUTRA TJANDRA','Riyan Putra Tjandra','031','8435585','085931236222','','','','12.5608.300889.0003','setup/teknis'),('RIYAN PUTRA TJANDRA','Riyan Putra Tjandra','031','8435585','085931236222','','','','12.5608.300889.0003','penagihan'),('RIYAN PUTRA TJANDRA','Riyan Putra Tjandra','031','8435585','085931236222','','','','12.5608.300889.0003','support/teknis'),('PT HASIL RIMBA JAYA','Jhonny Chan','031','','081938678888','','jhonny_chan@yahoo.com','Dr.Wahidin SHD 04 Rt 04 RW 04 Kel.Dahanrejo Kec.Kebomas, Gresik','1218143112760003','pemohon'),('PT HASIL RIMBA JAYA','Jhonny Chan','031','','081938678888','','jhonny_chan@yahoo.com','Dr.Wahidin SHD 04 Rt 04 RW 04 Kel.Dahanrejo Kec.Kebomas, Gresik','1218143112760003','administrasi'),('PT HASIL RIMBA JAYA','Jhonny Chan','031','','081938678888','','jhonny_chan@yahoo.com','Dr.Wahidin SHD 04 Rt 04 RW 04 Kel.Dahanrejo Kec.Kebomas, Gresik','1218143112760003','penagihan'),('PT HASIL RIMBA JAYA','Jhonny Chan','031','','081938678888','','jhonny_chan@yahoo.com','Dr.Wahidin SHD 04 Rt 04 RW 04 Kel.Dahanrejo Kec.Kebomas, Gresik','1218143112760003','support/teknis'),('PT HASIL RIMBA JAYA','Surya','031','','083830366695','','','','','setup/teknis'),('GEREJA BETHANY','Yohanes Poo gwan','031','5936880','','','info@bethanygraha.org','','','pemohon'),('GEREJA BETHANY','Moho Setiya Putra','031','5936880','71102977','','moho@bethanygraha.org','','','administrasi'),('GEREJA BETHANY','Moho Setiya Putra','031','5936880','71102977','','moho@bethanygraha.org','','','setup/teknis'),('GEREJA BETHANY','Moho Setiya Putra','031','5936880','71102977','','moho@bethanygraha.org','','','penagihan'),('GEREJA BETHANY','Moho Setiya Putra','031','5936880','71102977','','moho@bethanygraha.org','','','support/teknis'),('BETHANY YOUTH CENTRE','David Novandi','031','','08155050541','','','','','pemohon'),('BETHANY YOUTH CENTRE','Hizkiah','031','70803447','60253218','','','','','administrasi'),('BINTANG-NET','Joko Purwanto','031','','081703839131','','tion_tk@yahoo.com','','1256102011780003','pemohon'),('BINTANG-NET','Joko Purwanto','031','','081703839131','','tion_tk@yahoo.com','','1256102011780003','administrasi'),('BINTANG-NET','Joko Purwanto','031','','081703839131','','tion_tk@yahoo.com','','1256102011780003','penagihan'),('BINTANG-NET','Dheny','031','','081234562453','','','dhenycyber@yahoo.com','','setup/teknis'),('BINTANG-NET','Dheny','031','','081234562453','','','dhenycyber@yahoo.com','','support/teknis'),('PT PADMATIRTA WISESA','Andrew Soehartono','031','','0818303003','','andrew.soehartono@padmatirtawisesa.com','Darmahusada Indah Timur 1/3 Surabaya','3578261907810004','pemohon'),('PT PADMATIRTA WISESA','Andrew Soehartono','031','','0818303003','','andrew.soehartono@padmatirtawisesa.com','Darmahusada Indah Timur 1/3 Surabaya','3578261907810004','penanggungjawab'),('PT PADMATIRTA WISESA','Rini','031','','08385583003','','','','','administrasi'),('PT PADMATIRTA WISESA','Rini','031','','08385583003','','','','','penagihan'),('PT PADMATIRTA WISESA','Eko Nurcahyo','031','','081938287774','','eko.nurcahyo@padmatirtawisesa.com','','','setup/teknis'),('PT PADMATIRTA WISESA','Eko Nurcahyo','031','','081938287774','','eko.nurcahyo@padmatirtawisesa.com','','','support/teknis'),('ALBERT THIODORIS ','Albert Thiodoris','031','','08165415195','','','HR Muhammad Square L-12 RT 05 RW 01 Kel.Pradahkalikendal Kec.Dukuh Pakis, Surabaya','3578211708830006','pemohon'),('ALBERT THIODORIS ','Albert Thiodoris','031','','08165415195','','','HR Muhammad Square L-12 RT 05 RW 01 Kel.Pradahkalikendal Kec.Dukuh Pakis, Surabaya','3578211708830006','administrasi'),('ALBERT THIODORIS ','Albert Thiodoris','031','','08165415195','','','HR Muhammad Square L-12 RT 05 RW 01 Kel.Pradahkalikendal Kec.Dukuh Pakis, Surabaya','3578211708830006','penagihan'),('ALBERT THIODORIS ','Tommy Berlianto Haryono','031','','08563065785','','','Darmo Harapan Indah I/SS-37 Rt 02 RW 03 Kel.Tandes Lor Kec.Tandes, Surabaya','12.5627.260885.0002','setup/teknis'),('ALBERT THIODORIS ','Tommy Berlianto Haryono','031','','08563065785','','','Darmo Harapan Indah I/SS-37 Rt 02 RW 03 Kel.Tandes Lor Kec.Tandes, Surabaya','12.5627.260885.0002','support/teknis'),('ADHI KARYA, PT','Rangga Wahono','031','','08123082546','','r2pardjo@yahoo.com','','','pemohon'),('ADHI KARYA, PT','Rangga Wahono','031','','08123082546','','r2pardjo@yahoo.com','','','setup/teknis'),('ADHI KARYA, PT','Rangga Wahono','031','','08123082546','','r2pardjo@yahoo.com','','','support/teknis'),('ADHI KARYA, PT','Rangga Wahono','031','','08123082546','','r2pardjo@yahoo.com','','','administrasi'),('ADHI KARYA, PT','Magdiyana Wardhani','031','','8287251','','','','','penanggungjawab'),('ADHI KARYA, PT','Bagyo','031','8287251','','','adhi_sby@yahoo.com','','','penagihan'),('PT ARTHAWENASAKTI GEMILANG','Rudy Ongkojoyo','0341','468500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','pemohon'),('PT ARTHAWENASAKTI GEMILANG','Rudy Ongkojoyo','0341','468500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','administrasi'),('PT ARTHAWENASAKTI GEMILANG','Rudy Ongkojoyo','0341','468500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','penagihan'),('PT ARTHAWENASAKTI GEMILANG','Rudy Ongkojoyo','0341','468500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','setup/teknis'),('PT ARTHAWENASAKTI GEMILANG','Rudy Ongkojoyo','0341','468500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','support/teknis'),('PT ARTHAWENASAKTI GEMILANG','Rudy Sugiharto','0310','48500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','pemohon'),('PT ARTHAWENASAKTI GEMILANG','Rudy Sugiharto','0310','48500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','administrasi'),('PT ARTHAWENASAKTI GEMILANG','Rudy Sugiharto','0310','48500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','setup/teknis'),('PT ARTHAWENASAKTI GEMILANG','Rudy Sugiharto','0310','48500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','penagihan'),('PT ARTHAWENASAKTI GEMILANG','Rudy Sugiharto','0310','48500','','','rudiongko@gmail.com','Jl.Raya Mojorejo 23 RT 11 RW 05 Kel Mojorejo Kec.Junrejo, Batu','3579030810790001','support/teknis'),('BUDI LOEKITO','Budi Loekito','031','','0811304301','','budi.loekito@wingsfood.com','Graha Family Blok U-96 Surabaya','12.5604.240254.0001','pemohon'),('BUDI LOEKITO','Budi Loekito','031','','0811304301','','budi.loekito@wingsfood.com','Graha Family Blok U-96 Surabaya','12.5604.240254.0001','administrasi'),('BUDI LOEKITO','Budi Loekito','031','','0811304301','','budi.loekito@wingsfood.com','Graha Family Blok U-96 Surabaya','12.5604.240254.0001','setup/teknis'),('BUDI LOEKITO','Budi Loekito','031','','0811304301','','budi.loekito@wingsfood.com','Graha Family Blok U-96 Surabaya','12.5604.240254.0001','penagihan'),('BUDI LOEKITO','Budi Loekito','031','','0811304301','','budi.loekito@wingsfood.com','Graha Family Blok U-96 Surabaya','12.5604.240254.0001','support/teknis'),('BIANDA HALIM (LAM WEN FUNG)','Bianda Halim (Lam Wen Fung)','031','7342669','0818588689','','bianda.lin@gmail.com','Simo Jawar 3-5 RT 02 RW 11 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271407520001','pemohon'),('BIANDA HALIM (LAM WEN FUNG)','Bianda Halim (Lam Wen Fung)','031','7342669','0818588689','','bianda.lin@gmail.com','Simo Jawar 3-5 RT 02 RW 11 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271407520001','administrasi'),('BIANDA HALIM (LAM WEN FUNG)','Bianda Halim (Lam Wen Fung)','031','7342669','0818588689','','bianda.lin@gmail.com','Simo Jawar 3-5 RT 02 RW 11 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271407520001','setup/teknis'),('BIANDA HALIM (LAM WEN FUNG)','Bianda Halim (Lam Wen Fung)','031','7342669','0818588689','','bianda.lin@gmail.com','Simo Jawar 3-5 RT 02 RW 11 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271407520001','penagihan'),('BIANDA HALIM (LAM WEN FUNG)','Bianda Halim (Lam Wen Fung)','031','7342669','0818588689','','bianda.lin@gmail.com','Simo Jawar 3-5 RT 02 RW 11 Kel.Simomulyo Kec.Sukomanunggal, Surabaya','3578271407520001','support/teknis'),('PT BEON INTERMEDIA','Danton Prabawanto','031','','08563021021','','danton@beon.co.id','YKP Pandugo I/PD-22 RT 01 RW 08 Kel.Penjaringan Sari Kec.Rungkut, Surabaya','3578032909830003','pemohon'),('PT BEON INTERMEDIA','Lona Putri Rikasasi','031','8419700','','','lona@beon.coid','','','administrasi'),('PT BEON INTERMEDIA','Lona Putri Rikasasi','031','8419700','','','lona@beon.coid','','','penagihan'),('PT BEON INTERMEDIA','Putri Sinta','031','8419700','','','putri@beon.co.id','','','setup/teknis'),('PT BEON INTERMEDIA','cs jagoan hosting','031','8419700','','','sales@jagoanhosting.com','','','support/teknis'),('BAMBANG WIJANARKO','Bambang Wijanarko','031','','08385782226','','wiwid.wijanarka@wismilak.com','Perum ITS Jl.T.Sipil Blok G/14  Keputih Surabaya','3578091811860002','pemohon'),('BAMBANG WIJANARKO','Bambang Wijanarko','031','','08385782226','','wiwid.wijanarka@wismilak.com','Perum ITS Jl.T.Sipil Blok G/14  Keputih Surabaya','3578091811860002','administrasi'),('BAMBANG WIJANARKO','Bambang Wijanarko','031','','08385782226','','wiwid.wijanarka@wismilak.com','Perum ITS Jl.T.Sipil Blok G/14  Keputih Surabaya','3578091811860002','setup/teknis'),('BAMBANG WIJANARKO','Bambang Wijanarko','031','','08385782226','','wiwid.wijanarka@wismilak.com','Perum ITS Jl.T.Sipil Blok G/14  Keputih Surabaya','3578091811860002','penagihan'),('BAMBANG WIJANARKO','Bambang Wijanarko','031','','08385782226','','wiwid.wijanarka@wismilak.com','Perum ITS Jl.T.Sipil Blok G/14  Keputih Surabaya','3578091811860002','support/teknis'),('BAMBANG WIJANARKO','Bambang Wijanarko','031','','08385782226','','wiwid.wijanarka@wismilak.com','Perum ITS Jl.T.Sipil Blok G/14  Keputih Surabaya','3578091811860002','penanggungjawab'),('PT BOGA REMBILAN (DOME CAFE)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT BOGA REMBILAN (DOME CAFE)','Maryanto','031','5633896','081938333318','','dome_sutos@yahoo.com','Sutos Mall, Jl.Adityawarman 55 Lt.Plasa Level, Surabaya','','administrasi'),('PT BOGA REMBILAN (DOME CAFE)','Setiawati Tenoyo','031','','','','','Jl.Sulawesi No.60 Surabaya','','penanggungjawab'),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','pemohon'),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','administrasi'),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','setup/teknis'),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','support/teknis'),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','penagihan'),('CIPTO DIHARTO (WEB WAHANA WISATA)','Cipto Diharto','031','','081217771119','','admin@webwahanawisata.com','Veteran V/16 RT 03 RW 03 Kel.Singosari Kec.Kebomas, Gresik','3517210407720001','pemohon'),('CIPTO DIHARTO (WEB WAHANA WISATA)','Cipto Diharto','031','','081217771119','','admin@webwahanawisata.com','Veteran V/16 RT 03 RW 03 Kel.Singosari Kec.Kebomas, Gresik','3517210407720001','administrasi'),('CIPTO DIHARTO (WEB WAHANA WISATA)','Cipto Diharto','031','','081217771119','','admin@webwahanawisata.com','Veteran V/16 RT 03 RW 03 Kel.Singosari Kec.Kebomas, Gresik','3517210407720001','setup/teknis'),('CIPTO DIHARTO (WEB WAHANA WISATA)','Cipto Diharto','031','','081217771119','','admin@webwahanawisata.com','Veteran V/16 RT 03 RW 03 Kel.Singosari Kec.Kebomas, Gresik','3517210407720001','penagihan'),('CIPTO DIHARTO (WEB WAHANA WISATA)','Cipto Diharto','031','','081217771119','','admin@webwahanawisata.com','Veteran V/16 RT 03 RW 03 Kel.Singosari Kec.Kebomas, Gresik','3517210407720001','support/teknis'),('CHANDRA ELEKTRONIK','Yongki','031','','0816536315','','chandra_electronic@yahoo.com','Larangan RT 16 RW 05 Larangan kec.Candi, Sidoarjo','12.4.07.090374.0006','pemohon'),('CHANDRA ELEKTRONIK','Yongki','031','','0816536315','','chandra_electronic@yahoo.com','Larangan RT 16 RW 05 Larangan kec.Candi, Sidoarjo','12.4.07.090374.0006','administrasi'),('CHANDRA ELEKTRONIK','Yongki','031','','0816536315','','chandra_electronic@yahoo.com','Larangan RT 16 RW 05 Larangan kec.Candi, Sidoarjo','12.4.07.090374.0006','setup/teknis'),('CHANDRA ELEKTRONIK','Yongki','031','','0816536315','','chandra_electronic@yahoo.com','Larangan RT 16 RW 05 Larangan kec.Candi, Sidoarjo','12.4.07.090374.0006','penagihan'),('CHANDRA ELEKTRONIK','Yongki','031','','0816536315','','chandra_electronic@yahoo.com','Larangan RT 16 RW 05 Larangan kec.Candi, Sidoarjo','12.4.07.090374.0006','support/teknis'),('PT DAFASS INDONESIA','Ahmad Helmi, MMT','031','','0811334199','','helmi@dafassindonesia.com','Babatan Pratama 28/OO-46 Wiyung, Surabaya','12.5601.080866.0001','pemohon'),('PT DAFASS INDONESIA','Daviek Makhyudin Mohan','031','','085648201910','','daviek@dafassindonesia.com','','','administrasi'),('PT DAFASS INDONESIA','Daviek Makhyudin Mohan','031','','085648201910','','daviek@dafassindonesia.com','','','setup/teknis'),('PT DAFASS INDONESIA','Daviek Makhyudin Mohan','031','','085648201910','','daviek@dafassindonesia.com','','','support/teknis'),('PT DAFASS INDONESIA','Ir.Abdurrahman','031','','081330621520','','abdurrahman@dafassindonesia.com','Jl.Gayungsari XI/54 Surabaya','3578232803690003','penagihan'),('PT DIGITAL MUSIC FACTORY','Jusuf Agustian Widodo','031','','0817173433','','jusuf@dmf-indonesia.com','Jl.Gading Indah VI NF-3/38 Jakarta Utara','09.5106.110274.0472','pemohon'),('PT DIGITAL MUSIC FACTORY','Veronika','021','45869925','98768685','','veronika@dmf-indonesia.com','','','administrasi'),('PT DIGITAL MUSIC FACTORY','Veronika','021','45869925','98768685','','veronika@dmf-indonesia.com','','','penagihan'),('PT DIGITAL MUSIC FACTORY','Rahmat Gunawan','','','081511936573','0818689910','rahmat@dmf-indonesia.com','','','setup/teknis'),('PT DIGITAL MUSIC FACTORY','Rahmat Gunawan','','','081511936573','0818689910','rahmat@dmf-indonesia.com','','','support/teknis'),('PT DIGITAL MUSIC FACTORY','Jusuf Agustian Widodo','031','45869925','','','jusuf@dmf-indonesia.com','Jl.Gading Indah VI NF-3/38 Jakarta Utara','09.5106.110274.0472','pemohon'),('PT DIGITAL MUSIC FACTORY','Edwin Ninaber','021','45869925','','','edwin@dmf-indonesia.com','','','administrasi'),('PT DIGITAL MUSIC FACTORY','Veronica','021','45869925','','','veronica@dmf-indonesia.com','','','penagihan'),('PT DIGITAL MUSIC FACTORY','Herry Setiono','021','30451488','','','herry@kapanlagi.net','','','setup/teknis'),('PT DIGITAL MUSIC FACTORY','Herry Setiono','021','30451488','','','herry@kapanlagi.net','','','support/teknis'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','0818338787','ciptajayamedika@yahoo.com','','','pemohon'),('CIPTA JAYA MEDIKA, PT','Grace','031','5035258','','','admin@ciptajayamedika.com','','','administrasi'),('CIPTA JAYA MEDIKA, PT','Erina','031','5035258','','','admin@ciptajayamedika.com','','','penagihan'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','0818338787','ciptajayamedika@yahoo.com','','','setup/teknis'),('CIPTA JAYA MEDIKA, PT','Djajadi Tjipto','031','5035258','0818371828','0818338787','ciptajayamedika@yahoo.com','','','support/teknis'),('ERNI LISAWATI','Erni Lisawati','031','','08123043889','','3578146103500002','Darmo Harapan Indah II/RR-31 Tandes, Surabaya','3578146103500002','pemohon'),('ERNI LISAWATI','Erni Lisawati','031','','08123043889','','3578146103500002','Darmo Harapan Indah II/RR-31 Tandes, Surabaya','3578146103500002','penanggungjawab'),('ERNI LISAWATI','Erni Lisawati','031','','08123043889','','3578146103500002','Darmo Harapan Indah II/RR-31 Tandes, Surabaya','3578146103500002','administrasi'),('ERNI LISAWATI','Erni Lisawati','031','','08123043889','','3578146103500002','Darmo Harapan Indah II/RR-31 Tandes, Surabaya','3578146103500002','penagihan'),('ERNI LISAWATI','Sugi Usanto','031','70498869','','','usanto@telkom.net','','','setup/teknis'),('ERNI LISAWATI','Sugi Usanto','031','70498869','','','usanto@telkom.net','','','support/teknis'),('PT ELSON BERNARDI','Ivan Bernardi','0343','639710','','','mail@elsonbernardi.co.id','Jl.Diponegoro 18 Lemahputro, Sidoarjo','3515081710770003','pemohon'),('PT ELSON BERNARDI','Allen Lingganata','0343','639710','','','allen_lingganata@elsonbernardi.co.id','','','administrasi'),('PT ELSON BERNARDI','Allen Lingganata','0343','639710','','','allen_lingganata@elsonbernardi.co.id','','','setup/teknis'),('PT ELSON BERNARDI','Allen Lingganata','0343','639710','','','allen_lingganata@elsonbernardi.co.id','','','support/teknis'),('PT ELSON BERNARDI','Heriyanto','0343','639710','','','yantoe@elsonbernardi.co.id','','','penagihan'),('PT ELSON BERNARDI','Heriyanto','0343','639710','','','yantoe@elsonbernardi.co.id','','','pemohon'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','','08123039356','085733561593','moestova@yahoo.com','Pabean Asri G-28 Sedati, Sidoarjo','3515170305720005','pemohon'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','','08123039356','085733561593','moestova@yahoo.com','Pabean Asri G-28 Sedati, Sidoarjo','3515170305720005','administrasi'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','','08123039356','085733561593','moestova@yahoo.com','Pabean Asri G-28 Sedati, Sidoarjo','3515170305720005','support/teknis'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Mustofa','031','','08123039356','085733561593','moestova@yahoo.com','Pabean Asri G-28 Sedati, Sidoarjo','3515170305720005','setup/teknis'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Angshio Huang','031','7318666','','','','','','penagihan'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','Tongkahu David T','','','081358219999','','davidtong72@gmail.com','Rafles Hils Blok T 3 No.7 RT 02 RW 08 Kel.Jatikarya Kec.Jatisampurna, Bekasi','3275102905720007','penanggungjawab'),('PT GLOBAL WAY','Su, Wen-Te','031','8917526','','','wente-su@longway.com.tw','','210146895 ','pemohon'),('PT GLOBAL WAY','Su, Wen-Te','031','8917526','','','wente-su@longway.com.tw','','210146895 ','administrasi'),('PT GLOBAL WAY','Shi, Congming','031','8917526','','','acc2pgl-org.com','','G46690247','penagihan'),('PT GLOBAL WAY','Moch.Nailul Alie','031','8917526','','','nailul-ali@id.longwaycorpcom','','','setup/teknis'),('PT GLOBAL WAY','Moch.Nailul Alie','031','8917526','','','nailul-ali@id.longwaycorpcom','','','support/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Eduard Rudolf Pangkerego','031','','08129834949','','eduard@artotelindonesia.com','Jl.Nusa Indah Raya I No.4 Duren Sawit, Jakarta Timur','09.5407.281073.0313','pemohon'),('GRAHA SAMARA, PT  (ARTOTEL)','Eduard Rudolf Pangkerego','031','','08129834949','','eduard@artotelindonesia.com','Jl.Nusa Indah Raya I No.4 Duren Sawit, Jakarta Timur','09.5407.281073.0313','penanggungjawab'),('GRAHA SAMARA, PT  (ARTOTEL)','Julius Hendro','031','5508079','085331138800','','julius@artotelindonesia.com','','','administrasi'),('GRAHA SAMARA, PT  (ARTOTEL)','Hendrawan','031','','0818315250','','hendrawan@artotelindonesia.com','','','setup/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Hendrawan','031','','0818315250','','hendrawan@artotelindonesia.com','','','support/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Julius Hendro','031','5508079','085331138800','','julius@artotelindonesia.com','','','penagihan'),('GADING MURNI, PT','Eddy Ruslim, Liem','031','60123628','','','eddy.ruslim@gadingmurni.co.id','Taman Puspa Raya Blok B-9/11 Sambikerep, Surabaya','3578310303750001','pemohon'),('GADING MURNI, PT','Eddy Ruslim, Liem','031','60123628','','','eddy.ruslim@gadingmurni.co.id','Taman Puspa Raya Blok B-9/11 Sambikerep, Surabaya','3578310303750001','administrasi'),('GADING MURNI, PT','Eddy Ruslim, Liem','031','60123628','','','eddy.ruslim@gadingmurni.co.id','Taman Puspa Raya Blok B-9/11 Sambikerep, Surabaya','3578310303750001','setup/teknis'),('GADING MURNI, PT','Eddy Ruslim, Liem','031','60123628','','','eddy.ruslim@gadingmurni.co.id','Taman Puspa Raya Blok B-9/11 Sambikerep, Surabaya','3578310303750001','penagihan'),('GADING MURNI, PT','Eddy Ruslim, Liem','031','60123628','','','eddy.ruslim@gadingmurni.co.id','Taman Puspa Raya Blok B-9/11 Sambikerep, Surabaya','3578310303750001','support/teknis'),('PT GD INDONESIA','Cortelli Giancarlo','031','3985295','08165403715','','giancarlo.cortelli@gmail.com','Wisata Bukit Mas Zona Madrid D5/34A Lidah Wetan, Surabaya','2C21CD1477-J','pemohon'),('PT GD INDONESIA','ratnawati dewi','031','3985295','','','ratna.gdindo@telkom.net','','','administrasi'),('PT GD INDONESIA','ratnawati dewi','031','3985295','','','ratna.gdindo@telkom.net','','','penagihan'),('PT GD INDONESIA','Teguh Setiyono','031','','081330004757','','teguh.gdindo@gmail.com','','','setup/teknis'),('PT GD INDONESIA','Teguh Setiyono','031','','081330004757','','teguh.gdindo@gmail.com','','','support/teknis'),('PT GELORA DJAJA','Akim Hermanto','031','2952821','','','akim.hermanto@wismilak.com','Petemon 2/65 RT 04 RW 09 Sawahan, Surabaya','12.5616.270365.0007','pemohon'),('PT GELORA DJAJA','Budi Harto Nugroho','031','2952821','','','budiharto@wismilak.com','','','setup/teknis'),('PT GELORA DJAJA','Budi Harto Nugroho','031','2952821','','','budiharto@wismilak.com','','','administrasi'),('PT GELORA DJAJA','Budi Harto Nugroho','031','2952821','','','budiharto@wismilak.com','','','penagihan'),('PT GELORA DJAJA','Budi Harto Nugroho','031','2952821','','','budiharto@wismilak.com','','','support/teknis'),('PT GAWIH JAYA','Ronald Walla','031','5681128','','','','','','pemohon'),('PT GAWIH JAYA','Yusuf Tikupadang','031','5681128','','','','','','administrasi'),('PT GAWIH JAYA','Yusuf Tikupadang','031','5681128','','','','','','setup/teknis'),('PT GAWIH JAYA','Yusuf Tikupadang','031','5681128','','','','','','support/teknis'),('PT GAWIH JAYA','Yusuf Tikupadang','031','5681128','','','','','','penagihan'),('PT GAWIH JAYA','Muyanto Kosasih','031','','','','','','','pemohon'),('PT GAWIH JAYA','Edrinal/Ibu Eva','031','5681128','5681264','08123564564','','','','penagihan'),('PT GAWIH JAYA','Edrinal','031','5681128','5681264','','','','','support/teknis'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','pemohon'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','administrasi'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','setup/teknis'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','support/teknis'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Mettasari','031','5472422','','','info@momentum.or.id','','','penagihan'),('GEREJA REFORMED INJILI INDONESIA (GRII)','Kristanto Wicaksono','031','60726272','','','kristanto@momentum.or.id','Perum ITS Blok B-7 Humaniora RT 01 RW 04 Kel.Keputih Kec.Sukolilo, Surabaya','3578091406750005','penagihan'),('CV GLOBAL SOLUSI MANDIRI (RALSTON)','Frans Agus Budiharto','022','7331850','08122335312','','frans@hosthunter.net','Jl.Babatan Ciparay No.3C RT 005 RW 007 Bandung','','pemohon'),('CV GLOBAL SOLUSI MANDIRI (RALSTON)','Frans Agus Budiharto','022','7331850','08122335312','','frans@hosthunter.net','Jl.Babatan Ciparay No.3C RT 005 RW 007 Bandung','','setup/teknis'),('CV GLOBAL SOLUSI MANDIRI (RALSTON)','Frans Agus Budiharto','022','7331850','08122335312','','frans@hosthunter.net','Jl.Babatan Ciparay No.3C RT 005 RW 007 Bandung','','support/teknis'),('CV GLOBAL SOLUSI MANDIRI (RALSTON)','Agus Gunawan','022','7331850','','','agus@globalsolusi.net','','','penagihan'),('CV GLOBAL SOLUSI MANDIRI (RALSTON)','Agus Gunawan','022','7331850','','','agus@globalsolusi.net','','','administrasi'),('GRAHA CHALA INDONESIA, PT  (TRS DINER)','Pratono Arif','031','5633893','0811308627','','pr4t4rf@yahoo.com','Jojoran 5 Timur Blok D/50-52 Surabaya','3578080811690002','support/teknis'),('GRAHA CHALA INDONESIA, PT  (TRS DINER)','Pratono Arif','031','5633893','0811308627','','pr4t4rf@yahoo.com','Jojoran 5 Timur Blok D/50-52 Surabaya','3578080811690002','administrasi'),('GRAHA CHALA INDONESIA, PT  (TRS DINER)','Charial Aldriansyah Kameron','','','','','','Jl.Malinjo 5B Depdiknas B V/2 Jakarta Selatan','09.5304.131169.7019','penanggungjawab'),('PT HASWIN HIJAU PERKASA','Lim Suat Nee','031','83052323','','','','','2C11CD0539-K','pemohon'),('PT HASWIN HIJAU PERKASA','Lim Suat Nee','031','83052323','','','','','2C11CD0539-K','penanggungjawab'),('PT HASWIN HIJAU PERKASA','Chen Chen','031','3972933','','','','','','administrasi'),('PT HASWIN HIJAU PERKASA','Chen Chen','031','3972933','','','','','','penagihan'),('PT HASWIN HIJAU PERKASA','Christian','031','60749777','','','conzepttuner@yahoo.com','','','setup/teknis'),('PT HASWIN HIJAU PERKASA','Christian','031','60749777','','','conzepttuner@yahoo.com','','','support/teknis'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','Djaja Muljadi Oetama','031','7321212(1105)','08988709000','','djaja@hartonoelektronika.com','Wonorejo Permai Selatan 4/CC-288 Surabaya','35.7803.260576.0007','pemohon'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','Rika Sisilia maria','031','7321212(1356)','','','rika@hartonoelektronika.com','','','administrasi'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','Rika Sisilia maria','031','7321212(1356)','','','rika@hartonoelektronika.com','','','penagihan'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','Basuki','031','91727217','','','basuki@hartonoelektronika.com','','','setup/teknis'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','Basuki','031','91727217','','','basuki@hartonoelektronika.com','','','support/teknis'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','Djaja Muljadi Oetama','031','7321212(1105)','081332833989','','djaja@hartonoelektronika.com','Wonorejo Permai Selatan 4/CC-288 Surabaya','35.7803.260576.0007','pemohon'),('PT HYPERNET INDODATA (PHAROS)','Soeganda Prawira','0021','99299103','','','william@hyper.net.id','Jl.Jelambar Jaya II No.11 grogol Petamburan, Jakarta Barat','3173022811830010','pemohon'),('PT HYPERNET INDODATA (PHAROS)','Kent Febrian','021','56949988','','','presales@hyper.net.id','','','administrasi'),('PT HYPERNET INDODATA (PHAROS)','Tony','021','56949988','','','tony@hyper.net.id','','','penagihan'),('PT HYPERNET INDODATA (PHAROS)','Bram','021','56949988','','','bram@hyper.net.id','','','setup/teknis'),('PT HYPERNET INDODATA (PHAROS)','NOC','021','56949988','','','noc@hyper.net.id','','','support/teknis'),('PT HYPERNET INDODATA (UNITED BIKE)','Soeganda Prawira','021','99299103','','','william@hyper.net.id','Jl.Jelambar Jaya II No.11 grogol Petamburan, Jakarta Barat','3173022811830010','pemohon'),('PT HYPERNET INDODATA (UNITED BIKE)','Kent Febrian','021','56949988','','','presales@hyper.net.id','','','administrasi'),('PT HYPERNET INDODATA (UNITED BIKE)','Tony','021','56949988','','','tony@hyper.net.id','','','penagihan'),('PT HYPERNET INDODATA (UNITED BIKE)','Bram','021','56949988','','','bram@hyper.net.id','','','setup/teknis'),('PT HYPERNET INDODATA (UNITED BIKE)','NOC','021','56949988','','','noc@hyper.net.id','','','support/teknis'),('PT INDO VEGETABLE OIL INDUSTRY','Merry Tombokan','031','5621141','','','','Jl.Taman Slamet No.7 Klojen, Malang','3573024712720005','pemohon'),('PT INDO VEGETABLE OIL INDUSTRY','Moch.Solikin ','031','77214141','','','mochamad_solikin@yahoo.co.id','','','administrasi'),('PT INDO VEGETABLE OIL INDUSTRY','Moch.Solikin ','031','77214141','','','mochamad_solikin@yahoo.co.id','','','penagihan'),('PT INDO VEGETABLE OIL INDUSTRY','Moch.Solikin ','031','77214141','','','mochamad_solikin@yahoo.co.id','','','setup/teknis'),('PT INDO VEGETABLE OIL INDUSTRY','Moch.Solikin ','031','77214141','','','mochamad_solikin@yahoo.co.id','','','support/teknis'),('PT INTEGRA  ASP','Manuel D Irwan Putera','021','57941919','08161895988','','manuel@integraasp.com','Green Ville A/41 Kebon Jeruk Jakarta Barat','31.7305.060975.0012','pemohon'),('PT INTEGRA  ASP','Suparto','021','57941919','0811873368','','ato@integraasp.com','','','administrasi'),('PT INTEGRA  ASP','Suparto','021','57941919','0811873368','','ato@integraasp.com','','','penagihan'),('PT INTEGRA  ASP','Reyno Andriano','021','57941919','0817539333','','reyno@integraasp.com','Pondok Blimbing Indah P9/7 Blimbing, Malang','3573010806780008','setup/teknis'),('PT INTEGRA  ASP','Nanang A Rofiq','021','57941919','0817163433','','rofiq@integraasp.com','','','support/teknis'),('PT KAPANLAGI DOTCOM NETWORKS','Jacqueline E.A.Losung','021','57942014','0817881611','','jacqueline@kapanlagi.net','Jl.Taman Cilandak V/B3 Cilandak, Jakarta Selatan','09.5306.550665.0497','pemohon'),('PT KAPANLAGI DOTCOM NETWORKS','jenni','021','57942014','08159446767','','jenni@kapanlagi.net','','','administrasi'),('PT KAPANLAGI DOTCOM NETWORKS','jenni','021','57942014','08159446767','','jenni@kapanlagi.net','','','penagihan'),('PT KAPANLAGI DOTCOM NETWORKS','Herry','021','30451488','081945754448','','herynovice@gmail.com','','','setup/teknis'),('PT KAPANLAGI DOTCOM NETWORKS','Herry','021','30451488','081945754448','','herynovice@gmail.com','','','support/teknis'),('IELENNA SUMAMPOW','Iellena Sumampow','031','738005','732555','','','Jl.Permata Hijau F-II/39 Kebayoran Lama, Jakarta Selatan','09.5305.541281.7016','pemohon'),('IELENNA SUMAMPOW','Tjoa Liiy Phing','031','7325555','08123506969','','liiyphing@bukitdarmoproperty.com','','','administrasi'),('IELENNA SUMAMPOW','Tjoa Liiy Phing','031','7325555','08123506969','','liiyphing@bukitdarmoproperty.com','','','setup/teknis'),('IELENNA SUMAMPOW','Tjoa Liiy Phing','031','7325555','08123506969','','liiyphing@bukitdarmoproperty.com','','','penagihan'),('IELENNA SUMAMPOW','Iellena Sumampow','031','738005','732555','','','Jl.Permata Hijau F-II/39 Kebayoran Lama, Jakarta Selatan','09.5305.541281.7016','support/teknis'),('IELENNA SUMAMPOW','Iellena Sumampow','031','7380055','','','','Jl.Permata Hijau F-II/39 Kebayoran Lama, Jakarta Selatan','09.5305.541281.7016','pemohon'),('IELENNA SUMAMPOW','Iellena Sumampow','031','7380055','','','','Jl.Permata Hijau F-II/39 Kebayoran Lama, Jakarta Selatan','09.5305.541281.7016','support/teknis'),('IGOR\'S PASTRY','Stevanli Widjaja','','','087851906620','','stevanli@igors-pastry.com','Wisma Kedung Asem Indah D-18 Kedung Baruk, Surabaya','3578032309760002','pemohon'),('IGOR\'S PASTRY','Stevanli Widjaja','','','087851906620','','stevanli@igors-pastry.com','Wisma Kedung Asem Indah D-18 Kedung Baruk, Surabaya','3578032309760002','administrasi'),('IGOR\'S PASTRY','Stevanli Widjaja','','','087851906620','','stevanli@igors-pastry.com','Wisma Kedung Asem Indah D-18 Kedung Baruk, Surabaya','3578032309760002','setup/teknis'),('IGOR\'S PASTRY','Stevanli Widjaja','','','087851906620','','stevanli@igors-pastry.com','Wisma Kedung Asem Indah D-18 Kedung Baruk, Surabaya','3578032309760002','penagihan'),('IGOR\'S PASTRY','Stevanli Widjaja','','','087851906620','','stevanli@igors-pastry.com','Wisma Kedung Asem Indah D-18 Kedung Baruk, Surabaya','3578032309760002','support/teknis'),('IGOR\'S PASTRY','Innico Wirawan Sjahandi','','','','','igors@sby.dnet.net.id','Biliton 55 Surabaya','3578081708680002','pemohon'),('IGOR\'S PASTRY','Kartika Loemanto','','','087851356678','','kartika@igors-pastry.com','','','administrasi'),('IGOR\'S PASTRY','Kartika Loemanto','','','087851356678','','kartika@igors-pastry.com','','','penagihan'),('IGOR\'S PASTRY','Yoga','031','087759975410','','','yoga@igors-pastry.com','','','setup/teknis'),('IGOR\'S PASTRY','Yoga','031','087759975410','','','yoga@igors-pastry.com','','','support/teknis'),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','pemohon'),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','administrasi'),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','setup/teknis'),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','penagihan'),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)','Sentiono Leowinata','031','70901998','08123008808','','sentiono@catalyst.co.id','','','support/teknis'),('PT JASPIS','Robiyanto','031','5669000','0811339730','','robby325@indosat.net.id','','','pemohon'),('PT JASPIS','Robiyanto','031','5669000','0811339730','','robby325@indosat.net.id','','','administrasi'),('PT JASPIS','Robiyanto','031','5669000','0811339730','','robby325@indosat.net.id','','','setup/teknis'),('PT JASPIS','Robiyanto','031','5669000','0811339730','','robby325@indosat.net.id','','','penagihan'),('PT JATIM TAMAN STEEL','Heru Widjaja','031','92501777','0817595939','','info@jts.co.id','Babatan Pratama 25/LL-47 Wiyung, Surabaya','12.5616.070772.0005','pemohon'),('PT JATIM TAMAN STEEL','Heru Widjaja','031','92501777','0817595939','','info@jts.co.id','Babatan Pratama 25/LL-47 Wiyung, Surabaya','12.5616.070772.0005','administrasi'),('PT JATIM TAMAN STEEL','Heru Widjaja','031','92501777','0817595939','','info@jts.co.id','Babatan Pratama 25/LL-47 Wiyung, Surabaya','12.5616.070772.0005','setup/teknis'),('PT JATIM TAMAN STEEL','Heru Widjaja','031','92501777','0817595939','','info@jts.co.id','Babatan Pratama 25/LL-47 Wiyung, Surabaya','12.5616.070772.0005','support/teknis'),('PT JATIM TAMAN STEEL','Nur Cholifah','031','7881139','','','','','','penagihan'),('PT JATIM TAMAN STEEL','Heru Widjaja','031','92501777','0817595939','','info@jts.co.id','Babatan Pratama 25/LL-47 Wiyung, Surabaya','12.5616.070772.0005','penagihan'),('PT JATIM TAMAN STEEL','Nur Cholifah','031','7881139','','','','','','pemohon'),('SOMAGEDE INDONESIA, PT','Efril Busyra','021','641 0730','081 866 9610','','efril@sgp-dkp.com','','','pemohon'),('SOMAGEDE INDONESIA, PT','Aprilia','021','','0858 1044 437','','aprilia@sgp-dkp.com','','','administrasi'),('PT. SARANA MEDIA SELARAS (SMS ABADI)','Nurrahma','021','','081 874 7373','','aee @ smsabadi.com','','','pemohon'),('PT. SARANA MEDIA SELARAS (SMS ABADI)','Herdian','021','','081 2336 8855','','','','','support/teknis'),('ANDALAS MEDIA INFORMATIKA , PT','Bambang Ade Nugroho','021','','0852 9038 443','','ade @ andalasmedia.net.id','','','pemohon'),('ANDALAS MEDIA INFORMATIKA , PT','Moch. Ade Fadillah','021','9308 2001','','','angga @ andalasmedia.net.id','','','support/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','0321','619911','08123049890','','august.gunawan@gmail.com','','','pemohon'),('PT KING HALIM JEWELERY','Agus Gunawan','0321','619911','08123049890','','august.gunawan@gmail.com','','','administrasi'),('PT KING HALIM JEWELERY','Agus Gunawan','0321','619911','08123049890','','august.gunawan@gmail.com','','','setup/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','0321','619911','08123049890','','august.gunawan@gmail.com','','','support/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','0321','619911','08123049890','','august.gunawan@gmail.com','','','penagihan'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','agust.gunawan@gmail.com','','','pemohon'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','august.gunawan@gmail.com','','','administrasi'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','august.gunawan@gmail.com','','','setup/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','august.gunawan@gmail.com','','','support/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','august.gunawan@gmail.com','','','penagihan'),('PT KING HALIM JEWELERY','Wahyudi Honggo Widjoyo','0321','619911','','','','','','pemohon'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','agust.gunawan@gmail.com','','','administrasi'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','agust.gunawan@gmail.com','','','setup/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','agust.gunawan@gmail.com','','','support/teknis'),('PT KING HALIM JEWELERY','Agus Gunawan','','','08123049890','','agust.gunawan@gmail.com','','','penagihan'),('LIM SANJAYA SUNDJOTO ','Lim Sanjaya Sundjoto','031','7877756','0811321665','','','Dharmahusada Indah Timur 1/31 Surabaya','12.5622.020480.0007','pemohon'),('LIM SANJAYA SUNDJOTO ','Lim Sanjaya Sundjoto','031','7877756','0811321665','','','Dharmahusada Indah Timur 1/31 Surabaya','12.5622.020480.0007','administrasi'),('LIM SANJAYA SUNDJOTO ','Lim Sanjaya Sundjoto','031','7877756','0811321665','','','Dharmahusada Indah Timur 1/31 Surabaya','12.5622.020480.0007','setup/teknis'),('LIM SANJAYA SUNDJOTO ','Lim Sanjaya Sundjoto','031','7877756','0811321665','','','Dharmahusada Indah Timur 1/31 Surabaya','12.5622.020480.0007','penagihan'),('LIM SANJAYA SUNDJOTO ','Lim Sanjaya Sundjoto','031','7877756','0811321665','','','Dharmahusada Indah Timur 1/31 Surabaya','12.5622.020480.0007','support/teknis'),('CV MIXMEDIA','Bunga Ayu Rosvita','031','58251062','083834272005','','bunga.rosvita@yahoo.co.id, bunga@mixmedia.co.id','','','pemohon'),('CV MIXMEDIA','Bunga Ayu Rosvita','031','58251062','083834272005','','bunga.rosvita@yahoo.co.id, bunga@mixmedia.co.id','','','administrasi'),('CV MIXMEDIA','Bunga Ayu Rosvita','031','58251062','083834272005','','bunga.rosvita@yahoo.co.id, bunga@mixmedia.co.id','','','setup/teknis'),('CV MIXMEDIA','Bunga Ayu Rosvita','031','58251062','083834272005','','bunga.rosvita@yahoo.co.id, bunga@mixmedia.co.id','','','support/teknis'),('CV MIXMEDIA','Bunga Ayu Rosvita','031','58251062','083834272005','','bunga.rosvita@yahoo.co.id, bunga@mixmedia.co.id','','','penagihan'),('PT MATAHARI PUTRA MAKMUR','Jefry Prijadi','0343','6599','659936-29','','mpm_office@!yahoo.com','','3578131911790002','pemohon'),('PT MATAHARI PUTRA MAKMUR','Maria / Lia','031','7407800','081914445005','081938333537','','','','administrasi'),('PT MATAHARI PUTRA MAKMUR','Josephine','031','7407800','60288227','','','','','penagihan'),('PT MATAHARI PUTRA MAKMUR','Erant / Setia','','','081703701718','083857227076','gabriel.erant@yahoo.com / z7ia@yahoo.com','','','setup/teknis'),('PT MATAHARI PUTRA MAKMUR','Erant / Setia','','','081703701718','083857227076','gabriel.erant@yahoo.com / z7ia@yahoo.com','','','support/teknis'),('MEGA SURYA ERATAMA, PT','Marini Halim','031','7886564','','','','','','pemohon'),('MEGA SURYA ERATAMA, PT','Yokanan T','031','7886564','70034669','','yokanan@mitrapackaging.com','Dukuh Kupang X/17-19 Surabaya','','administrasi'),('MEGA SURYA ERATAMA, PT','Yokanan T','031','7886564','','','yokanan@mitrapackaging.com','Dukuh Kupang X/17-19 Surabaya','','penagihan'),('MEGA SURYA ERATAMA, PT','Eko Budi','031','7886564','','','edp@mitrapackaging.com','','','setup/teknis'),('MEGA SURYA ERATAMA, PT','Eko Budi','031','7886564','','','edp@mitrapackaging.com','','','support/teknis'),('MIKATASA AGUNG, PT','Martin Hendriadi','031','8438427','08155000639','','martin_hendriadi@mikatasa.com','Jl.Soka No.3 RT 04 RW 07 Tambaksari, Surabaya','3578100803810002','pemohon'),('MIKATASA AGUNG, PT','Thomas lazuardi','031','8438427','08165403268','','thomas_l@mikatasa.com','','','administrasi'),('MIKATASA AGUNG, PT','Thomas lazuardi','031','8438427','08165403268','','thomas_l@mikatasa.com','','','support/teknis'),('MIKATASA AGUNG, PT','Christine','031','8438427','','','','','','penagihan'),('MIKATASA AGUNG, PT','Martin Hendriadi','031','8438427','08155000639','','martin_hendriadi@mikatasa.com','Jl.Soka No.3 RT 04 RW 07 Tambaksari, Surabaya','3578100303810002','pemohon'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8438427','08165403268','','thomas_l@mikatasa.com','','','setup/teknis'),('MIKATASA AGUNG, PT','Thomas Lazuardi','031','8438427','08165403268','','thomas_l@mikatasa.com','','','penagihan'),('MITRACITRA MANDIRIOFFSET, PT','Marini Halim','031','7886564','','','','','','pemohon'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','','','administrasi'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan','031','7886564','','','yokanan@mitrapackaging.com','','','penagihan'),('MITRACITRA MANDIRIOFFSET, PT','Eko Budi','031','7886564','','','edp@mitrapackaging.com','','','setup/teknis'),('MITRACITRA MANDIRIOFFSET, PT','Yokanan / Eko Budi','031','7886564','','','yokanan@mitrapackaging.com / edp@mitrapackaging.co','','','support/teknis'),('PT MULTI MAYAKA','Ikhsan Efendi','','','081316016182','','ikhsan.efendi@multimayaka.co.id','Walungan Poncol Kalideres, Jakarta Barat','3173060404770015','pemohon'),('PT MULTI MAYAKA','Ira Eternita','031','5349414','','','ira.eternita@multimayaka.co.id','','','administrasi'),('PT MULTI MAYAKA','Ira Eternita','031','5349414','','','ira.eternita@multimayaka.co.id','','','penagihan'),('PT MULTI MAYAKA','Lie Hin','021','46832522','08129953926','','liehin@multimayaka.co.id','','','setup/teknis'),('PT MULTI MAYAKA','Abdul Azis','','','08567755265','','abdul.azis@multimayaka.co.id','','','support/teknis'),('PT MULTI MAYAKA','Hendrik Pranajaya','031','5349411','0818769','0818769228','hendrik.pranajaya@multimayaka.co.id','','3603122409800005','pemohon'),('PT MULTI MAYAKA','Hendrik Pranajaya','031','5349411','0818769','0818769228','hendrik.pranajaya@multimayaka.co.id','','3603122409800005','administrasi'),('PT MULTI MAYAKA','Hendrik Pranajaya','031','5349411','0818769','0818769228','hendrik.pranajaya@multimayaka.co.id','','3603122409800005','penagihan'),('PT MULTI MAYAKA','Ahin','021','4601228','08129953926','','edp@multitehaka.co.id','','','setup/teknis'),('PT MULTI MAYAKA','Ahin','021','4601228','08129953926','','edp@multitehaka.co.id','','','support/teknis'),('PT MULTI MAYAKA','Fendi','','','08819037999','08165421289','','','12.5608.180876.0003','pemohon'),('PT MULTI MAYAKA','Fendi','','','08819037999','08165421289','','','12.5608.180876.0003','administrasi'),('PT MULTI MAYAKA','Fendi','','','08819037999','08165421289','','','12.5608.180876.0003','penagihan'),('PT MOCOPLUS TECHNOLOGY','Nurrachma','021','45867696','45867697','','aee@mocoplus.com','Jl.Pisangan Lama III/4 Pulo Gadung, Jakarta Timur','09.5402.550173.0394','pemohon'),('PT MOCOPLUS TECHNOLOGY','Marizca','021','45867696','45867697','','marizca@mocoplus.com','','','administrasi'),('PT MOCOPLUS TECHNOLOGY','Marizca','021','45867696','45867697','','marizca@mocoplus.com','','','penagihan'),('PT MOCOPLUS TECHNOLOGY','Herdhian Ferdhianto','0341','474889','','','ferdhie@mocoplus.com','','','setup/teknis'),('PT MOCOPLUS TECHNOLOGY','Herdhian Ferdhianto','0341','474889','','','ferdhie@mocoplus.com','','','support/teknis'),('PT MONSTERMOB INDONESIA','Manuel D Irwan Putera','021','45840583','','','manuel@kapanlagi.net','','09.5202.060975.0232','pemohon'),('PT MONSTERMOB INDONESIA','Ajeng M W','021','45840583','','','','','','administrasi'),('PT MONSTERMOB INDONESIA','Ersa','031','45840583','','','ersa@kapanlagi.net','','','penagihan'),('PT MONSTERMOB INDONESIA','M Khalid Andriano','','','0817539333','','reyno@kapanlagi.net','','','setup/teknis'),('PT MONSTERMOB INDONESIA','M Khalid Andriano','','','0817539333','','reyno@kapanlagi.net','','','support/teknis'),('PT MONSTERMOB INDONESIA','Manuel D Irwan Putera','021','45840583','','','manuel@kapanlagi.net','','','pemohon'),('PT MONSTERMOB INDONESIA','Ajeng M W','021','45840583','','','ajeng@kapanlagi.net','','','administrasi'),('PT MONSTERMOB INDONESIA','Maya Reski M','021','45840583','','','maya@kapanlagi.net','','','penagihan'),('PAULUS HALIM','Paulus Halim ','031','7403839','0811332268','','liem.paulus@gmail.com','Citraland Fullerton TF3/23a','357804209890004','pemohon'),('PAULUS HALIM','Paulus Halim ','031','7403839','0811332268','','liem.paulus@gmail.com','Citraland Fullerton TF3/23a','357804209890004','administrasi'),('PAULUS HALIM','Paulus Halim ','031','7403839','0811332268','','liem.paulus@gmail.com','Citraland Fullerton TF3/23a','357804209890004','setup/teknis'),('PAULUS HALIM','Paulus Halim ','031','7403839','0811332268','','liem.paulus@gmail.com','Citraland Fullerton TF3/23a','357804209890004','penagihan'),('PAULUS HALIM','Paulus Halim ','031','7403839','0811332268','','liem.paulus@gmail.com','Citraland Fullerton TF3/23a','357804209890004','penanggungjawab'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Aminuddin Al Fathoni','031','5017002','081357111333','','afathoni@netmarks.co.id','Jl.KH.Abdul Karim 26 Kel.Pangeranan Kec. Bangkalan, Bangkalan','3526012209740001','pemohon'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Bayu Seno Adji','031','5017002','08113314352','','bayu@netmarks.co.id','','','setup/teknis'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Bayu Seno Adji','031','5017002','08113314352','','bayu@netmarks.co.id','','','support/teknis'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Aminuddin Al Fathoni','031','5017002','081357111333','','afathoni@netmarks.co.id','Jl.KH.Abdul Karim 26 Kel.Pangeranan Kec. Bangkalan, Bangkalan','3526012209740001','administrasi'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Aminuddin Al Fathoni','031','5017002','081357111333','','afathoni@netmarks.co.id','Jl.KH.Abdul Karim 26 Kel.Pangeranan Kec. Bangkalan, Bangkalan','3526012209740001','penagihan'),('PT WAHANA GITA (CHIPMUNK LENMARC)','Shanti Tjahjadi','031','51163099','0811333492','','shanti.tjahjadi@gmail.com','','12.5628.700377.001','pemohon'),('PT WAHANA GITA (CHIPMUNK LENMARC)','Shanti Tjahjadi','031','51163099','0811333492','','shanti.tjahjadi@gmail.com','','12.5628.700377.001','penanggungjawab'),('PT WAHANA GITA (CHIPMUNK LENMARC)','Deffi Indria','031','51163099','085733769555','','chid01.finance@yahoo.com','','','administrasi'),('PT WAHANA GITA (CHIPMUNK LENMARC)','Deffi Indria','031','51163099','085733769555','','shanti.tjahjadi@gmail.com','','','penagihan'),('PT WAHANA GITA (CHIPMUNK LENMARC)','Alex','031','51163099','085733337906','','','','','setup/teknis'),('PT WAHANA GITA (CHIPMUNK LENMARC)','Alex','031','51163099','085733337906','','','','','support/teknis'),('MOCH FUAD HASAN','Moch Fuad Hasan','031','085646211230','','','koephenk1188@yahoo.com','Ketegan tengah Gg Langgar Ketegan Sidoarjo','KTP','pemohon'),('DENNY SUGIARTO WIJAYA','Denny Sugiarto Wijaya','031','3538372','','','denny1419@gmail.com','Babatan Pantai Timur V/7 Surabaya`','KTP','pemohon'),('PT KREASINDO JAYATAMA SUKSES','Rachel Andrew T. Jauhari','031','','08124424291','','raseruz@yahoo.com','Jl. Pegangsaan Dua Raya KM 3,5 Pegangsaan Dua Jakarta Utara','KTP','pemohon'),('PT KREASINDO JAYATAMA SUKSES','Rachel Andrew T. Jauhari','031','','08124424291','','raseruz@yahoo.com','Jl. Pegangsaan Dua Raya KM 3,5 Pegangsaan Dua Jakarta Utara','KTP','administrasi'),('PT KREASINDO JAYATAMA SUKSES','Rachel Andrew T. Jauhari','031','','08124424291','','raseruz@yahoo.com','Jl. Pegangsaan Dua Raya KM 3,5 Pegangsaan Dua Jakarta Utara','KTP','setup/teknis'),('PT KREASINDO JAYATAMA SUKSES','Henry setiawan','031','','','','','Jl. Pegangsaan Dua Raya KM 3,5 Pegangsaan Dua Jakarta Utara','KTP','penanggungjawab'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Aminuddin Al Fathoni','031','5017002','081357111333','','afathoni@netmarks.co.id','Jl.KH.Abdul Karim 26 Kel.Pangeranan Kec. Bangkalan, Bangkalan`','3526012209740001','pemohon'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Oktavia Ika Shanti Widia P','031','5017002','081231456874','','santi@netmarks.co.id','','','administrasi'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','Oktavia Ika Shanti Widia P','031','5017002','081231456874','','santi@netmarks.co.id','','','penagihan'),('IUWASH - USAID','Sihol Halomoan Sinaga','031','5660956','081392520120','','sihol_sinaga@dai.com','','KTP','pemohon'),('IUWASH - USAID','Sihol Halomoan Sinaga','031','5660956','081392520120','','sihol_sinaga@dai.com','','KTP','administrasi'),('IUWASH - USAID','Sihol Halomoan Sinaga','031','5660956','','','chatarina_dewi@dai.com','','','penagihan'),('IUWASH - USAID','Laksmi Cahyaniwati','031','5660956','','','laksmi_cahyaniwati@dai.com','','','penanggungjawab'),('IUWASH - USAID','Agus Winarto','021','5220540','','','agus_winarto@dai.com','','','setup/teknis'),('IUWASH - USAID','Nana Noerhajati','031','5660956','','','nana_noerhajati@dai.com','','','support/teknis'),('RS ROYAL SURABAYA','Muhammad Fadzaruddin','031','8476095','031-91829912','','fadzaruddin@gmail.com','','KTP','pemohon'),('RS ROYAL SURABAYA','Muhammad Fadzaruddin','031','8476095','031-91829912','','fadzaruddin@gmail.com','','KTP','support/teknis'),('RS ROYAL SURABAYA','Muhammad Fadzaruddin','031','8476095','031-91829912','','fadzaruddin@gmail.com','','KTP','setup/teknis'),('RS ROYAL SURABAYA','Muhammad Fadzaruddin','031','8476095','031-91829912','','fadzaruddin@gmail.com','','KTP','administrasi'),('RS ROYAL SURABAYA','Ibu Dwi Putri (Ninik)','031','8476095','','','','','','penagihan'),('RS ROYAL SURABAYA','Hadi Sunaryo, Dr','031','8476095','','','','','','penanggungjawab'),('ERIC WIBISONO','Eric Wibisono','031','08113652531','','','ericwibisono@gmail.com','Graha Family L-88 Surabaya','KTP','pemohon'),('ERIC WIBISONO','Eric Wibisono','031','08113652531','','','ericwibisono@gmail.com','Graha Family L-88 Surabaya','KTP','administrasi'),('ERIC WIBISONO','Eric Wibisono','031','08113652531','','','ericwibisono@gmail.com','Graha Family L-88 Surabaya','KTP','setup/teknis'),('ERIC WIBISONO','Eric Wibisono','031','08113652531','','','ericwibisono@gmail.com','Graha Family L-88 Surabaya','KTP','penanggungjawab'),('ERIC WIBISONO','Eric Wibisono','031','08113652531','','','ericwibisono@gmail.com','Graha Family L-88 Surabaya','KTP','support/teknis'),('PT. JAVA CONSULTING INDONESIA','Andry Kosasih','031','3575523','08123042488','','andry.kosasih@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','pemohon'),('PT. JAVA CONSULTING INDONESIA','Andry Kosasih','031','3575523','08123042488','','andry.kosasih@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','penanggungjawab'),('PT. JAVA CONSULTING INDONESIA','Meilistia','031','3575523','','','meilistia@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','penagihan'),('PT. JAVA CONSULTING INDONESIA','Meilistia','031','3575523','','','meilistia@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','support/teknis'),('PT. SWABINA GATRA','Drs. Wismadi Marsongko, AK','031','3984719','081331701669','','wismadi@swabinagatra.co.id','Jl. R.A. Kartini No. 21 A, Gresik','','pemohon'),('PT. SWABINA GATRA','Drs. Wismadi Marsongko, AK','031','3984719','081331701669','','wismadi@swabinagatra.co.id','Jl. R.A. Kartini No. 21 A, Gresik','','penanggungjawab'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','','','aan.swabina@gmail.com','Jl. R.A. Kartini No. 21 A, Gresik','','penagihan'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','','','aan.swabina@gmail.com','Jl. R.A. Kartini No. 21 A, Gresik','','support/teknis'),('CV. QODITEC','Agung Wibudi','031','8434457','081330701271','','awibudi@yahoo.com ; agung.wibudi@gmail.com','Jl. Rungkut Mejoyo Selatan 9 / 7, Surabaya','','pemohon'),('CV. QODITEC','Agung Wibudi','031','8434457','081330701271','','awibudi@yahoo.com ; agung.wibudi@gmail.com','Jl. Rungkut Mejoyo Selatan 9 / 7, Surabaya','','penanggungjawab'),('CV. QODITEC','Agung Wibudi','031','8434457','081330701271','','awibudi@yahoo.com ; agung.wibudi@gmail.com','Jl. Rungkut Mejoyo Selatan 9 / 7, Surabaya','','penagihan'),('CV. QODITEC','Agung Wibudi','031','8434457','081330701271','','awibudi@yahoo.com ; agung.wibudi@gmail.com','Jl. Rungkut Mejoyo Selatan 9 / 7, Surabaya','','support/teknis'),('RONNY NJOTO','Ronny Njoto','031','70107777','08123289998','','','Jl. Raya Kertajaya No. 80, Surabaya','','pemohon'),('RONNY NJOTO','Ronny Njoto','031','70107777','08123289998','','','Jl. Raya Kertajaya No. 80, Surabaya','','penanggungjawab'),('RONNY NJOTO','Ronny Njoto','031','70107777','08123289998','','','Jl. Raya Kertajaya No. 80, Surabaya','','penagihan'),('RONNY NJOTO','Ronny Njoto','031','70107777','08123289998','','','Jl. Raya Kertajaya No. 80, Surabaya','','support/teknis'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','08993888508','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13 C / 6, Surabaya','','pemohon'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','08993888508','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13 C / 6, Surabaya','','penanggungjawab'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','08993888508','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13 C / 6, Surabaya','','penagihan'),('LOUIS GERALDO','Louis Geraldo','031','5038866','081330626969','08993888508','louismercury@yahoo.com','Jl. Gubeng Kertajaya 13 C / 6, Surabaya','','support/teknis'),('PT. NUANSA SEHAT ALAMI','Dr. Jeremy Ackland','031','5634477','71179611','08113642372','surabayachiropractic@hotmail.com','Jl. Mayjend Sungkono, Ruko Rich Palace R-21, Surabaya','','pemohon'),('PT. NUANSA SEHAT ALAMI','Dr. Jeremy Ackland','031','5634477','71179611','08113642372','surabayachiropractic@hotmail.com','Jl. Mayjend Sungkono, Ruko Rich Palace R-21, Surabaya','','penanggungjawab'),('PT. NUANSA SEHAT ALAMI','Dr. Jeremy Ackland','031','5634477','71179611','08113642372','surabayachiropractic@hotmail.com','Jl. Mayjend Sungkono, Ruko Rich Palace R-21, Surabaya','','penagihan'),('PT. NUANSA SEHAT ALAMI','Dr. Jeremy Ackland','031','5634477','71179611','08113642372','surabayachiropractic@hotmail.com','Jl. Mayjend Sungkono, Ruko Rich Palace R-21, Surabaya','','support/teknis'),('PT OVIS SENDNSAVE','Sulastri','021','3520520','','','accounting@sendnsave.com','','','administrasi'),('PT OVIS SENDNSAVE','Sulastri','021','3520520','','','accounting@sendnsave.com','','','penagihan'),('PT OVIS SENDNSAVE','Kelvin Kurnawan','021','3520520','','','kkelvin@sendnsave.com','','','pemohon'),('PT OVIS SENDNSAVE','Herwanto','021','3520520','','','herwanto@sendnsave.com','','','setup/teknis'),('PT OVIS SENDNSAVE','Ridho','021','3520520','081316360081','','ridho@sendnsave.com','','','support/teknis'),('PETRO GRAHA MEDIKA, PT','dr.Singgih Priyanto, MARS','','','0811305292','','RSPG2004@yahoo.co.id','Jl.kapulaga No.6 Karangturi, Gresik','3525.160410600002','pemohon'),('PETRO GRAHA MEDIKA, PT','dr.Singgih Priyanto, MARS','','','0811305292','','RSPG2004@yahoo.co.id','Jl.kapulaga No.6 Karangturi, Gresik','3525.160410600002','penanggungjawab'),('PETRO GRAHA MEDIKA, PT','Mustaqimah','','','08155022450','','kinoynoki@gmail.com','','','administrasi'),('PETRO GRAHA MEDIKA, PT','Dya Indra Rahma','','','085640433556','','','','','penagihan'),('PETRO GRAHA MEDIKA, PT','Yanriska Udayana','031','','081703397669','','el_yanriska@yahoo.co.id','','','setup/teknis'),('PETRO GRAHA MEDIKA, PT','Yanriska Udayana','031','','081703397669','','el_yanriska@yahoo.co.id','','','support/teknis'),('PT PELAYARAN ALKAN ABADI','Bambang Widodo','031','3573062-64','081331612223','','alkenlines@gmail.com','Jl.Kapasan 23 Simokerto, Surabaya','3578112008750002','pemohon'),('PT PELAYARAN ALKAN ABADI','Bambang Widodo','031','3573062-64','081331612223','','alkenlines@gmail.com','Jl.Kapasan 23 Simokerto, Surabaya','3578112008750002','setup/teknis'),('PT PELAYARAN ALKAN ABADI','Bambang Widodo','031','3573062-64','081331612223','','alkenlines@gmail.com','Jl.Kapasan 23 Simokerto, Surabaya','3578112008750002','support/teknis'),('PT PELAYARAN ALKAN ABADI','Effy','031','3573062-64','','','','','','administrasi'),('PT PELAYARAN ALKAN ABADI','Effy','031','3573062-64','','','','','','penagihan'),('PT PELAYARAN ALKAN ABADI','Enny','031','3573062-64','','','','','','administrasi'),('PT PELAYARAN ALKAN ABADI','Enny','031','3573062-64','','','','','','penagihan'),('PETROLOG MULTI USAHA MANDIRI, PT','Henky Setiarko','031','8708818','08165416731','','henky@petrologmum.co.id','Jl.Citra Melati 79 Tropodo, Waru, Sidoarjo','12.14.14.160768.0003','pemohon'),('PETROLOG MULTI USAHA MANDIRI, PT','Henky Setiarko','031','8708818','08165416731','','henky@petrologmum.co.id','Jl.Citra Melati 79 Tropodo, Waru, Sidoarjo','12.14.14.160768.0003','administrasi'),('PETROLOG MULTI USAHA MANDIRI, PT','Henky Setiarko','031','8708818','08165416731','','henky@petrologmum.co.id','Jl.Citra Melati 79 Tropodo, Waru, Sidoarjo','12.14.14.160768.0003','setup/teknis'),('PETROLOG MULTI USAHA MANDIRI, PT','Henky Setiarko','031','8708818','08165416731','','henky@petrologmum.co.id','Jl.Citra Melati 79 Tropodo, Waru, Sidoarjo','12.14.14.160768.0003','support/teknis'),('PETROLOG MULTI USAHA MANDIRI, PT','Ika Yuniawati','031','8708818','','','ika.yuniawati@petrologmum.co.id','','','penagihan'),('PT PUTRI GELORA JAYA','Wahyudi Nuzul Irwansyah','031','7991615','','','wahyudi@putrigelorajaya.com','','3578143108770003','pemohon'),('PT PUTRI GELORA JAYA','Wahyudi Nuzul Irwansyah','031','7991615','','','wahyudi@putrigelorajaya.com','','3578143108770003','administrasi'),('PT PUTRI GELORA JAYA','Wahyudi Nuzul Irwansyah','031','7991615','','','wahyudi@putrigelorajaya.com','','3578143108770003','setup/teknis'),('PT PUTRI GELORA JAYA','Wahyudi Nuzul Irwansyah','031','7991615','','','wahyudi@putrigelorajaya.com','','3578143108770003','support/teknis'),('PT PUTRI GELORA JAYA','Wahyudi Nuzul Irwansyah','031','7991615','','','wahyudi@putrigelorajaya.com','','3578143108770003','penagihan'),('PT PENGUIN TRADING','Jimmy Dharsono','','','081298116789','','jimmy.dharsono@penguin.co.id','','09.5201.040580.0357','pemohon'),('PT PENGUIN TRADING','Jimmy Dharsono','','','081298116789','','jimmy.dharsono@penguin.co.id','','09.5201.040580.0357','setup/teknis'),('PT PENGUIN TRADING','Jimmy Dharsono','','','081298116789','','jimmy.dharsono@penguin.co.id','','09.5201.040580.0357','support/teknis'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','Arsyah Febriantara Sundjani','0313','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','352510.060286.0004','pemohon'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','Arsyah Febriantara Sundjani','0313','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','352510.060286.0004','administrasi'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','Arsyah Febriantara Sundjani','0313','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','352510.060286.0004','setup/teknis'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','Arsyah Febriantara Sundjani','0313','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','352510.060286.0004','support/teknis'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','Arsyah Febriantara Sundjani','0313','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','352510.060286.0004','penagihan'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','Winata Budhi Prayitno','031','3930253-54','','','winatabp@yahoo.com','Basuki rachmad 49 RT 02 RW 08 Kel.Embong Kaliasin Kec.Genteng Surabaya','12.5611.250175.0001','penanggungjawab'),('RS ROYAL SURABAYA','Mohammad Fadzaruddin','0857','085852006355','','','fadzaruddin@gmail.com','Suronatan III/58 Magersari, Mojokerto','3576022111760001','pemohon'),('RS ROYAL SURABAYA','Mohammad Fadzaruddin','0857','085852006355','','','fadzaruddin@gmail.com','Suronatan III/58 Magersari, Mojokerto','3576022111760001','administrasi'),('RS ROYAL SURABAYA','Mohammad Fadzaruddin','0857','085852006355','','','fadzaruddin@gmail.com','Suronatan III/58 Magersari, Mojokerto','3576022111760001','setup/teknis'),('RS ROYAL SURABAYA','Mohammad Fadzaruddin','0857','085852006355','','','fadzaruddin@gmail.com','Suronatan III/58 Magersari, Mojokerto','3576022111760001','support/teknis'),('RS ROYAL SURABAYA','Dwi Putri (Ninik)','','','08123157991','','','','','penagihan'),('CV RAMAYANA PUTRA MOTOR (Gresik)','Arsyah Febriantara Sundjani','','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','3525100602860004','pemohon'),('CV RAMAYANA PUTRA MOTOR (Gresik)','Arsyah Febriantara Sundjani','','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','3525100602860004','administrasi'),('CV RAMAYANA PUTRA MOTOR (Gresik)','Arsyah Febriantara Sundjani','','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','3525100602860004','setup/teknis'),('CV RAMAYANA PUTRA MOTOR (Gresik)','Arsyah Febriantara Sundjani','','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','3525100602860004','support/teknis'),('CV RAMAYANA PUTRA MOTOR (Gresik)','Arsyah Febriantara Sundjani','','','085730049251','','ramayanaputra@gmail.com','Jl.Banjar Baru 1 No.27 GKB Kec.Manyar, Gresik','3525100602860004','penagihan'),('CV RAMAYANA PUTRA MOTOR (Gresik)','Winata Budhi Prayitno','031','3930253-54','','','winatabp@yahoo.com','Basuki Rachmad 49 RT 02 RW 08 Kel.Embong Kaliasin Kec.Genteng Surabaya','12.5611.250175.0001','penanggungjawab'),('RONI PRASETYA','Roni Prasetya','031','5451899','0811332965','','','','','pemohon'),('RONI PRASETYA','Roni Prasetya','031','5451899','0811332965','','','','','setup/teknis'),('RONI PRASETYA','Roni Prasetya','031','5451899','0811332965','','','','','support/teknis'),('RONI PRASETYA','Erliani','031','5451899','70532165','','','','','administrasi'),('RONI PRASETYA','Erliani','031','5451899','70532165','','','','','penagihan'),('PT SATIVA RIA CENDANA (Kombes)','Leodra Pontoh','031','5682714','','','leodra@padinet.com, leodra.pontoh@sativa.com','','','pemohon'),('PT SATIVA RIA CENDANA (Kombes)','Leodra Pontoh','031','5682714','','','leodra@padinet.com, leodra.pontoh@sativa.com','','','administrasi'),('PT SATIVA RIA CENDANA (Kombes)','Yudi','031','5343130','71150699','','','','','setup/teknis'),('PT SATIVA RIA CENDANA (Kombes)','Yudi','031','5343130','71150699','','','','','support/teknis'),('PT SATIVA RIA CENDANA (Kombes)','Maria Pramudito','031','5682714','','','','','','penagihan'),('PT RAJA FREIGHT EXPRESS','Irwanto Salim','','0816523837','','','irwanto@kecegroup.com','Jl.Kutisari XI No.3 Siwalankerto, Wonocolo, Surabaya','3578042101600000','pemohon'),('PT RAJA FREIGHT EXPRESS','Wiwit','031','3575100','','','fin-sby@kecegroup.com','','','administrasi'),('PT RAJA FREIGHT EXPRESS','Wiwit','031','3575100','','','fin-sby@kecegroup.com','','','penagihan'),('PT RAJA FREIGHT EXPRESS','Abd.Haris','031','3575100','','','doc-exp-sby@kecegroup.com','','','setup/teknis'),('PT RAJA FREIGHT EXPRESS','Abd.Haris','031','3575100','','','doc-exp-sby@kecegroup.com','','','support/teknis'),('PT RAPINDO PLASTAMA','Iddent Cong','','','08158787878','','iddent@rapindoplastama.com','','09.5102.210480.4031','pemohon'),('PT RAPINDO PLASTAMA','Iddent Cong','','','08158787878','','iddent@rapindoplastama.com','','09.5102.210480.4031','administrasi'),('PT RAPINDO PLASTAMA','Iddent Cong','','','08158787878','','iddent@rapindoplastama.com','','09.5102.210480.4031','setup/teknis'),('PT RAPINDO PLASTAMA','Iddent Cong','','','08158787878','','iddent@rapindoplastama.com','','09.5102.210480.4031','support/teknis'),('PT RAPINDO PLASTAMA','Iddent Cong','','','08158787878','','iddent@rapindoplastama.com','','09.5102.210480.4031','penagihan'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Donny Manuarva','031','5451899','','','donny.manuarva@icbc-center.com','Darmahusada Indah timur XI/3-5-J-25, Mulyorejo, Surabaya','3578262503690002','pemohon'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Rita Magdalena','031','5451899','','','rita@icbc-center.com','','','administrasi'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Rita Magdalena','031','5451899','','','rita@icbc-center.com','','','penagihan'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Anton','031','5451899','','','anton@icbc-center.com','','','setup/teknis'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Anton','031','5451899','','','anton@icbc-center.com','','','support/teknis'),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)','Egon Lassmann','031','562234 ext.6100','0811375180','','gm@javaparagon.com','Java paragon, Jl.Mayjend Sungkono 101-103 Surabaya','','pemohon'),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)','Soesijanto','031','5621234 ext.6500','','','fc@javaparagon.com','','','administrasi'),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)','Eka','031','5621234 ext.6503','','','ap@javaparagon.com','','','penagihan'),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)','Tenny Kolanus','031','5621234 ext.6600','','','itm@javaparagon.com','','','setup/teknis'),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)','Benny/Bhaskoro','031','5621234 ext.6601','','','it_support@javaparagon.com','','','support/teknis'),('PT SALAM PACIFIC INDONESIA LINES','Roland N Wetik','','','081331548910','','roland.wetik@spil.co.id','Pandugo Timur 15 P2F/46 Penjaringan Sari, Rungkut, Surabaya','3578030607720002','pemohon'),('PT SALAM PACIFIC INDONESIA LINES','Roland N Wetik','','','081331548910','','roland.wetik@spil.co.id','Pandugo Timur 15 P2F/46 Penjaringan Sari, Rungkut, Surabaya','3578030607720002','administrasi'),('PT SALAM PACIFIC INDONESIA LINES','Roland N Wetik','','','081331548910','','roland.wetik@spil.co.id','Pandugo Timur 15 P2F/46 Penjaringan Sari, Rungkut, Surabaya','3578030607720002','setup/teknis'),('PT SALAM PACIFIC INDONESIA LINES','Roland N Wetik','','','081331548910','','roland.wetik@spil.co.id','Pandugo Timur 15 P2F/46 Penjaringan Sari, Rungkut, Surabaya','3578030607720002','support/teknis'),('PT SALAM PACIFIC INDONESIA LINES','Roland N Wetik','','','081331548910','','roland.wetik@spil.co.id','Pandugo Timur 15 P2F/46 Penjaringan Sari, Rungkut, Surabaya','3578030607720002','penagihan'),('CV SURYA INTI INDOCOM','Harianto','031','70760899','','','','Nginden Makam 2/14 Kel.Nginden Jangkungan Kec.Sukolilo, Surabaya','3578091007660003','pemohon'),('CV SURYA INTI INDOCOM','Harianto','031','70760899','','','','Nginden Makam 2/14 Kel.Nginden Jangkungan Kec.Sukolilo, Surabaya','3578091007660003','administrasi'),('CV SURYA INTI INDOCOM','Harianto','031','70760899','','','','Nginden Makam 2/14 Kel.Nginden Jangkungan Kec.Sukolilo, Surabaya','3578091007660003','penagihan'),('CV SURYA INTI INDOCOM','hendra Dwi k','','','089652418853','','suryaintiindocom@yahoo.com','','','setup/teknis'),('CV SURYA INTI INDOCOM','hendra Dwi k','','','089652418853','','suryaintiindocom@yahoo.com','','','support/teknis'),('SUPARMA Tbk, PT','Maria Bernadette Laniwati','031','60018888','','','commercial@ptsuparmatbk.com','','','pemohon'),('SUPARMA Tbk, PT','Shirly','031','60018888','','','purchasing@ptsuparmatbk.com','','','administrasi'),('SUPARMA Tbk, PT','Shirly','031','60018888','','','purchasing@ptsuparmatbk.com','','','penagihan'),('SUPARMA Tbk, PT','Heru','031','7666666','','','factory@ptsuparmatbk.com','','','setup/teknis'),('SUPARMA Tbk, PT','hendrik','031','7666666','','','factory@ptsuparmatbk.com','','','support/teknis'),('SUPARMA Tbk, PT','Maria Bernadette Laniwati','031','3555050','','','commercial@ptsuparmatbk.com','','','pemohon'),('SUPARMA Tbk, PT','Shirly','031','3555050','','','purchasing@ptsuparmatbk.com','','','administrasi'),('SUPARMA Tbk, PT','Shirly','031','3555050','','','purchasing@ptsuparmatbk.com','','','penagihan'),('SUPARMA Tbk, PT','Meilan','031','3555050','','','purchasing@ptsuparmatbk.com','','','administrasi'),('SUPARMA Tbk, PT','Meilan','031','3555050','','','purchasing@ptsuparmatbk.com','','','penagihan'),('SUPARMA Tbk, PT','Sandy','031','7666666','','','factory@ptsuparmatbk.com','','','setup/teknis'),('SUPARMA Tbk, PT','Sandy','031','7666666','','','factory@ptsuparmatbk.com','','','support/teknis'),('SUPARMA Tbk, PT','Tony/Meilan','031','3555050 / 3558668','','','purchasing@ptsuparmatbk.com','','','administrasi'),('SUPARMA Tbk, PT','Tony/Meilan','031','3555050 / 3558668','','','purchasing@ptsuparmatbk.com','','','penagihan'),('SUPARMA Tbk, PT','Budiawan / Sandy','031','7666666','','','factory@ptsuparmatbk.com','','','setup/teknis'),('SUPARMA Tbk, PT','Budiawan / Sandy','031','7666666','','','factory@ptsuparmatbk.com','','','support/teknis'),('SUPARMA Tbk, PT','Tony','031','3555050','','','purchasing@ptsuparmatbk.com','','','administrasi'),('SUPARMA Tbk, PT','Tony','031','3555050','','','purchasing@ptsuparmatbk.com','','','penagihan'),('SUPARMA Tbk, PT','Widjaya','031','7666666','','','factory@ptsuparmatbk.com','','','setup/teknis'),('SUPARMA Tbk, PT','Widjaya','031','7666666','','','factory@ptsuparmatbk.com','','','support/teknis'),('STARTEL COMMUNICATION, PT','Edwin Widjaja','021','58902099','081585128588','','edwin@kayindo.com','Puri Indah Blok J 2/15 Kembangan Selatan, Jakarta Barat','09.5001.181072.0214','pemohon'),('PT SAKALAGUNA SEMESTA','Ardhian Martha Kusuma','031','60169969','085649209969','','ardhian@sakalaguna.com','','','pemohon'),('PT SAKALAGUNA SEMESTA','Buisan','021','306000000','','','buisan@sakalaguna.com','','','administrasi'),('PT SAKALAGUNA SEMESTA','Buisan','021','306000000','','','buisan@sakalaguna.com','','','setup/teknis'),('PT SAKALAGUNA SEMESTA','Ardhian Martha Kusuma','031','60169969','085649209969','','ardhian@sakalaguna.com','','','support/teknis'),('PT SAKALAGUNA SEMESTA','enny','021','63852366','','','enny@sakalaguna.com','','','penagihan'),('SATIVA KUTAI','Leodra P','031','5682714','','','','','','pemohon'),('PT SATIVA RIA CENDANA (Sutos Mall)','Leodra Pontoh','031','5636079','','','','','','pemohon'),('PT SATIVA RIA CENDANA (Sutos Mall)','Leodra Pontoh','031','5636079','','','','','','administrasi'),('PT SATIVA RIA CENDANA (Sutos Mall)','Leodra Pontoh','031','5636079','','','','','','penagihan'),('PT SATIVA RIA CENDANA (Sutos Mall)','Hartono','031','60311311','','','','','','setup/teknis'),('PT SATIVA RIA CENDANA (RESTO 9 - Mayjend)','Leodra P','031','5682714','','','','','','pemohon'),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)','M Irza Ghozali','0542','875570','081553124543','','irza@satnetcom.com','Jl.Puri Alamanda Blok P A-11/17 RT 070 Kel.Sepinggan, Balikpapan Selatan','','pemohon'),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)','Dwi Cahyo','0542','875570','0811295923','','dwi.cahyo@satnetcom.net','Jl.Bukit Niaga No.19 RT 15 Kel.klandasan Ilir Kec.Balikpapan Selatan','','administrasi'),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)','Rafles Lumbantoruan','0542','875570','081934566040','','rafles@satnetcom.net','','','penagihan'),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)','Marky Yehezkiel','0542','875570','0811546077','','marky@satnetcom.net','','','setup/teknis'),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)','NOC SatNetCom','0542','875570','','','noc@satnetcom.com','','','support/teknis'),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)','Andrew Mah','031','7328738','','','','','2C11CD0612-H','pemohon'),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)','Yanrio Marpaung','031','7328738 ext.1155','0811337429','','yanrio.marpaung@the-ascott.com','','','administrasi'),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)','Yanrio Marpaung','031','7328738 ext.1155','0811337429','','yanrio.marpaung@the-ascott.com','','','penagihan'),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)','Denny Yuniarta','031','7328738 ext.1155','081330561210','','denny.yuniarta@the-ascott.com','','','setup/teknis'),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)','Denny Yuniarta','031','7328738 ext.1155','081330561210','','denny.yuniarta@the-ascott.com','','','support/teknis'),('PT. SWABINA GATRA','Drs.Wismadi Marsongko, Ak','031','3984719 (104)','','','wismadi@swabinagatra.co.id','Jl.Jawa Asri II No.14 GKB Kel.Yosowilangun Kec.Manyar, Gresik','352308.260963.0001','pemohon'),('PT. SWABINA GATRA','Erna Setyawati','031','3984719 (215)','','','erna@swabinagatra.co.id','','','administrasi'),('PT. SWABINA GATRA','Soeprijadi','031','3984719 (131)','','','soeprijadi@swabinagatra.co.id','','','penagihan'),('PT. SWABINA GATRA','Aan Saputra','031','3984719 (227)','','','aan_saputra@swabinagatra.co.id','','','setup/teknis'),('PT. SWABINA GATRA','Muhammad Yudi/Arief Faishol','','081357614880 / 081332782969','','','yudigol@swabinagatra.co.id / faishol@swabinagatra.','','','support/teknis'),('PT. SWABINA GATRA','Drs.Wismadi Marsongko, Ak','031','3984719','','','wismadi@swabinagatra.co.id','Jl.Jawa Asri II No.14 GKB Kel.Yosowilangun Kec.Manyar, Gresik','3523082609630001','pemohon'),('PT. SWABINA GATRA','Erna Setyawati','031','3984719','','','erna@swabinagatra.co.id','','','administrasi'),('PT. SWABINA GATRA','Soeprijadi','031','3984719','','','soeprijadi@swabinagatra.co.id','','','penagihan'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','081331701669','','aan_saputra@swabinagatra.co.id','','','setup/teknis'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','081331701669','','aan_saputra@swabinagatra.co.id','','','support/teknis'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','','','aan_saputra@swabinagatra.co.id','','','setup/teknis'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','','','aan_saputra@swabinagatra.co.id','','','support/teknis'),('PT. SWABINA GATRA','Drs.Wismadi Marsongko, Ak','031','3984719','','','swabina@indo.net.id','Jl.Jawa Asri II No.14 GKB Kel.Yosowilangun Kec.Manyar, Gresik','3523082609630001','pemohon'),('PT. SWABINA GATRA','Dyah Aristanti','031','3984719','','','','','','administrasi'),('PT. SWABINA GATRA','Sugeng','031','3984719','','','','','','pemohon'),('PT. SWABINA GATRA','Aan Saputra','031','3984719','70292974','','','','','pemohon'),('SWADAYA GRAHA, PT','Ir.Chabib Bahari','031','3984477','','','cbahari@swadayagraha.com','Jl.Proklamasi 47B kel.Sidomoro Kec.Kebomas, Gresik','3525141309560022','pemohon'),('SWADAYA GRAHA, PT','Susi Ningsih','031','3984477','','','sningsih@swadayagraha.com','','','administrasi'),('SWADAYA GRAHA, PT','Agus Susanto','031','3984477','','','agus.ak@swadayagraha.com','','','penagihan'),('SWADAYA GRAHA, PT','Nanang Arif','031','3984477','08113514064','','nanang.as@swadayagraha.com','','','setup/teknis'),('SWADAYA GRAHA, PT','Ir. Syamsul Arifin','031','3984477','','','','','','pemohon'),('SWADAYA GRAHA, PT','Nanang Suteja','031','3984477','','','','','','administrasi'),('SWADAYA GRAHA, PT','Nanang Arief','031','3984477','0818309829','','nanang.as@swadayagraha.com','','','setup/teknis'),('SWADAYA GRAHA, PT','Nanang Arief','031','3984477','0818309829','','nanang.as@swadayagraha.com','','','support/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Eduard Rudolf Pangkerego','031','08129834949','','','eduard@artotelindonesia.com','Jl.Nusa Indah Raya I No.4 Duren Sawit, Jakarta Timur','09.5407.281073.0313','penanggungjawab'),('GRAHA SAMARA, PT  (ARTOTEL)','Eduard Rudolf Pangkerego','031','08129834949','','','eduard@artotelindonesia.com','Jl.Nusa Indah Raya I No.4 Duren Sawit, Jakarta Timur','09.5407.281073.0313','pemohon'),('GRAHA SAMARA, PT  (ARTOTEL)','Julius Hendro','031','5508079','','','julius@artotelindonesia.com','','','administrasi'),('GRAHA SAMARA, PT  (ARTOTEL)','Julius Hendro','031','5508079','','','julius@artotelindonesia.com','','','penagihan'),('GRAHA SAMARA, PT  (ARTOTEL)','Hendrawan','031','5508079','0818315250','','hendrawan@artotelindonesia.com','','','setup/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Hendrawan','031','5508079','0818315250','','hendrawan@artotelindonesia.com','','','support/teknis'),('PT SURABAYA MEKABOX','Iwan Gondowahyudi','031','3524041','','','procurement@sbymekabox.com','Villa Bukit Indah AA 6/10 Surabaya','590815140532','pemohon'),('PT SURABAYA MEKABOX','Susanto Eko','031','3524041','','','eko_cakrawala@yahoo.com','','','administrasi'),('PT SURABAYA MEKABOX','Susi','031','3524041','','','','','','pemohon'),('PT SURABAYA MEKABOX','Effendi Listjabudhi','031','7507266','08155100873','','elistijabudhi@gmail.com','','','setup/teknis'),('PT SURABAYA MEKABOX','Effendi Listjabudhi','031','7507266','08155100873','','elistijabudhi@gmail.com','','','support/teknis'),('TEDDY A SUDIRMAN (ROMIE)','Teddy A Sudirman','031','5017494','','','rmdjapri@gmail.com','','3174040401710010','pemohon'),('TEDDY A SUDIRMAN (ROMIE)','Romie','','','081511766433','','rmdjapri@gmail.com','','','administrasi'),('TEDDY A SUDIRMAN (ROMIE)','Romie','','','081511766433','','rmdjapri@gmail.com','','','penagihan'),('TEDDY A SUDIRMAN (ROMIE)','Teddy A Sudirman','031','5017494','','','rmdjapri@gmail.com','','3174040401710010','setup/teknis'),('TEDDY A SUDIRMAN (ROMIE)','Teddy A Sudirman','031','5017494','','','rmdjapri@gmail.com','','3174040401710010','support/teknis'),('PT TRIDJAYA KARTIKA (CAFE APARTEMEN PUNCAK MARINA)','Yoyok Sigit H','031','71539481','083849856888','','yoyoksigit358@gmail.com','Griya Kebon Agung II Blok H1-12A','3515140607740005','pemohon'),('PT TRIDJAYA KARTIKA (CAFE APARTEMEN PUNCAK MARINA)','Selly','031','72198989','','','selly.aic@yahoo.com','','','administrasi'),('PT TRIDJAYA KARTIKA (CAFE APARTEMEN PUNCAK MARINA)','M.Taufik','031','081231417164','','','','','','setup/teknis'),('PT TRIDJAYA KARTIKA (CAFE APARTEMEN PUNCAK MARINA)','M.Taufik','031','081231417164','','','','','','support/teknis'),('PT TIRTAKENCANA TATAWARNA','hendrik','','','085850723289','','it_manager@tirtakencana.com','Jl. Jambu no 26 Tambaksari, Surabaya','3578103012750010','pemohon'),('PT TIRTAKENCANA TATAWARNA','Lisa/Hendrik','031','8556888 ext.309','','','','','','administrasi'),('PT TIRTAKENCANA TATAWARNA','hendrik','','','085850723289','','it_manager@tirtakencana.com','Jl. Jambu no 26 Tambaksari, Surabaya','3578103012750010','penagihan'),('PT TIRTAKENCANA TATAWARNA','hendrik','','','085850723289','','it_manager@tirtakencana.com','Jl. Jambu no 26 Tambaksari, Surabaya','3578103012750010','setup/teknis'),('PT TIRTAKENCANA TATAWARNA','hendrik','','','085850723289','','it_manager@tirtakencana.com','Jl. Jambu no 26 Tambaksari, Surabaya','3578103012750010','support/teknis'),('PT VARIA USAHA BETON','Hery Wahyudi','031','8535049','','','','Jl.Malang 73 Kel.Yosowilangun Kec.Manyar Gresik','3525102305650002','pemohon'),('PT VARIA USAHA BETON','Herry Widodo','031','8535049','081330652256','','herry_wdd@variabeton.com','','','administrasi'),('PT VARIA USAHA BETON','Herry Widodo','031','8535049','081330652256','','herry_wdd@variabeton.com','','','penagihan'),('PT VARIA USAHA BETON','Herry Widodo','031','8535049','081330652256','','herry_wdd@variabeton.com','','','setup/teknis'),('PT VARIA USAHA BETON','Herry Widodo','031','8535049','081330652256','','herry_wdd@variabeton.com','','','support/teknis'),('PT VARIA USAHA BETON','Rizky Prayudhi','031','8535049','70284049','','','','','administrasi'),('PT VARIA USAHA BETON','Hery Wahyudi','031','8535049','','','','Jl.Malang 73 Kel.Yosowilangun Kec.Manyar Gresik','3525102305650002','penagihan'),('PT VARIA USAHA BETON','Rizky Prayudhi','031','8535049','70284049','','','','','setup/teknis'),('PT VARIA USAHA BETON','Rizky Prayudhi','031','8535049','70284049','','','','','support/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi Amin','031','7502021','70606199','08123158629','cipsi@wimcycle.biz','Babatan Mukti 8-38/G-43 Kel.Babatan Kec.Wiyung, Surabaya','12.5602.220974.0002','pemohon'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi Amin','031','7502021','70606199','08123158629','cipsi@wimcycle.biz','Babatan Mukti 8-38/G-43 Kel.Babatan Kec.Wiyung, Surabaya','12.5602.220974.0002','administrasi'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi Amin','031','7502021','70606199','08123158629','cipsi@wimcycle.biz','Babatan Mukti 8-38/G-43 Kel.Babatan Kec.Wiyung, Surabaya','12.5602.220974.0002','penagihan'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Hoedan Soekamto','031','7502021','085232773275','','hoedan@wimcycle.biz','','','setup/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Hoedan Soekamto','031','7502021','085232773275','','hoedan@wimcycle.biz','','','support/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi Amin','031','7502021','70606199','08123158629','cipsi@wimcycle.biz','Babatan Mukti 8-38/G-43 Kel.Babatan Kec.Wiyung, Surabaya','12.5602.220974.0002','setup/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi Amin','031','7502021','70606199','08123158629','cipsi@wimcycle.biz','Babatan Mukti 8-38/G-43 Kel.Babatan Kec.Wiyung, Surabaya','12.5602.220974.0002','support/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Anne Widjaja','031','7507021','','','','','','pemohon'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Lisia/Cipsi/Syam/herlina','031','7507021','','','','','','penagihan'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi/Syam','031','7507021','','','','','','support/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Hoedan A Soekamto','031','7502021','085232773275','','hoedan@wimcycle.biz','','','setup/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Hoedan A Soekamto','031','7502021','085232773275','','hoedan@wimcycle.biz','','','support/teknis'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','Cipsi Amin','031','7507021','','','cipsi@wimcycle.biz','Babatan Mukti 8-38/G-43 Kel.Babatan Kec.Wiyung, Surabaya','12.5602.220974.0002','pemohon'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Syafik Gadi','031','8290140','','','','Gayungsari 4/21 Surabaya','3578223006480007','pemohon'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Mohammad Zahri','031','8290140','','','akademik@alhikmahsby.com','','','administrasi'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Abdul Rohim','031','8290140','','','','','','penagihan'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Herlambang Yudiono, S.Kom','031','8290140','71457725','','herlambank@alhikmahsy.com, herlambank@gmail.com','','','setup/teknis'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Herlambang Yudiono, S.Kom','031','8290140','71457725','','herlambank@alhikmahsy.com, herlambank@gmail.com','','','support/teknis'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Mohammad Zahri','031','8290140','8299093','','akademik@alhikmahsby.com','','','administrasi'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Abd. Rohim','031','8290140','8299093','','','','','penagihan'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Abdur Rohim','031','8290140','8299093','','','','','administrasi'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Abdur Rohim','031','8290140','8299093','','','','','penagihan'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Herlambang Yudiono, S.Kom','031','71457725','','','herlambank@alhikmahsy.com, herlambank@gmail.com','','','setup/teknis'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Herlambang Yudiono, S.Kom','031','71457725','','','herlambank@alhikmahsy.com, herlambank@gmail.com','','','support/teknis'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Tjio Andreas Tjahjo','','','081450001559','','abenayo@gmail.com','','3578260605700001','pemohon'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Tjio Andreas Tjahjo','','','081450001559','','abenayo@gmail.com','','3578260605700001','administrasi'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Tjio Andreas Tjahjo','','','081450001559','','abenayo@gmail.com','','3578260605700001','setup/teknis'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Tjio Andreas Tjahjo','','','081450001559','','abenayo@gmail.com','','3578260605700001','support/teknis'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Tjio Andreas Tjahjo','','','081450001559','','abenayo@gmail.com','','3578260605700001','penagihan'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Ni\'matur Rozida','','','085732562114','','yrozida@yahoo.com','','','setup/teknis'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','Ni\'matur Rozida','','','085732562114','','yrozida@yahoo.com','','','support/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Klampis Indah 7/8 Blok E-37 Kel.Klampis Ngasem Kec.Sukolilo, Surabaya','12.5811.091262.0001','pemohon'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','johanes Gualbertus Hendra','','','0818303340','','yohanes_hendra.gloria@yahoo.com','','','administrasi'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Farida','031','7346901','','','','','','penagihan'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','70272733','','','aditia_unggul.gloria@yahoo.com','','','setup/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Davit Rijadi','031','7346901 ext.119','','','davit.rijadi@gloriaschool.org','','','support/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Klampis Indah 7/8  Blok E-37 Kel.Klampis Ngasem kec.Sukolilo, Surabaya','12.5811.091262.0001','pemohon'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Johanes Gualbertus Hendra','031','7346901','0818303340','','yohanes_hendra.gloria@yahoo.com','','','administrasi'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','7346901','','','aditia_unggul.gloria@yahoo.com','','','setup/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Davit Rijadi','031','7314599 ext.119','','','davit.rijadi@gloriaschool.org','','','support/teknis'),('ANTONIUS WIRAWAN','Antonius Wirawan','','','','','antonius.geblek@yahoo.com','','830112050009','pemohon'),('ADRIWARA KRIDA, PT','Alexander Hadwinning Arso','','','0811814119','','hadwinning.arso@eurorscg.com','Komplek BDN Srikaya 4 No.7 Jatiwaringin, Pondok Gede, Bekasi','3275082602770026','pemohon'),('ADRIWARA KRIDA, PT','Alexander Hadwinning Arso','','','0811814119','','hadwinning.arso@eurorscg.com','Komplek BDN Srikaya 4 No.7 Jatiwaringin, Pondok Gede, Bekasi','3275082602770026','administrasi'),('ADRIWARA KRIDA, PT','Alexander Hadwinning Arso','','','0811814119','','hadwinning.arso@eurorscg.com','Komplek BDN Srikaya 4 No.7 Jatiwaringin, Pondok Gede, Bekasi','3275082602770026','setup/teknis'),('ADRIWARA KRIDA, PT','Synthia Winata','021','8309302','','','synthia.winata@eurorscg.com','','','penagihan'),('ADRIWARA KRIDA, PT','Muhammad Adha','','','085697021616','','muhammad.adha@eurorscg.com','','','support/teknis'),('PT AUSTIN TECHNOLOGY TELEMATIKA','Iqbal','','','0811889277','0818886097','iqbal@austin.net.id','','','pemohon'),('PT AUSTIN TECHNOLOGY TELEMATIKA','Muhamamd Fadil','','','085692611872','','fadil@austin.net.id','','','administrasi'),('PT AUSTIN TECHNOLOGY TELEMATIKA','Muhamamd Fadil','','','085692611872','','fadil@austin.net.id','','','penagihan'),('PT AUSTIN TECHNOLOGY TELEMATIKA','Alun','','','081932307418','','alun@austin.net.id','','','setup/teknis'),('PT AUSTIN TECHNOLOGY TELEMATIKA','Feldi','','','082113506195','','feldi@austin.net.id','','','support/teknis'),('ASIASOFT INDONESIA, PT','Sugianto Legiman','','','081513418016','','sugi.anto@asiasoft.net.id','Jl.Mawar Merah 2/2/224 Duren Sawit, Jakarta Timur','09.5407.311075.0242','pemohon'),('BINARA GUNA MEDIKTAMA, PT  (RS PONDOK INDAH PURI INDAH)','Ir.Anna R Subagdja','','','','','','','','pemohon'),('BROADBAND BROADCAST SERVICES INDONESIA, PT','Nusrat Ali Ghanjar','021','46824641','081586408742','','nusrat@bbs-sat.com','','31.74050400276','pemohon'),('BROADBAND BROADCAST SERVICES INDONESIA, PT','Endang','021','46824641','','','endang@bbs-sat.com','','','administrasi'),('BROADBAND BROADCAST SERVICES INDONESIA, PT','Erly','021','46324641','','','erly@bbs-sat.com','','','penagihan'),('BROADBAND BROADCAST SERVICES INDONESIA, PT','Saidin ','','08128139660','','','saidin@bbs-sat.com','','','setup/teknis'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Jl.Margomulyo Permai M-25 Surabaya ','3515071506760004','pemohon'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Jl.Margomulyo Permai M-25 Surabaya ','3515071506760004','administrasi'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Jl.Margomulyo Permai M-25 Surabaya ','3515071506760004','setup/teknis'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Jl.Margomulyo Permai M-25 Surabaya ','3515071506760004','penanggungjawab'),('PT. WAHANA TRITUNGGAL PERKASA ','Agustien ','031','7483439','','','','Jl.Margomulyo Permai M-25 Surabaya','','penagihan'),('CAKRA STUDIO, CV  (www.mobistrimi.com)','Dudi Elvianto','021','965809049','085710277137','','dj.elvianto@mobistrimi.com, dj.elvianto@pipstream.','','3278911293710001','pemohon'),('CAKRA STUDIO, CV  (www.mobistrimi.com)','Indra Prihadi','021','44316886','','','indra.prihadi@mobistrimi.com','','','administrasi'),('CAKRA STUDIO, CV  (www.mobistrimi.com)','Adnan Wiranto','','','087888181156','','adnan.wiranto@mobistrimi.com','','','penagihan'),('CAKRA STUDIO, CV  (www.mobistrimi.com)','Teguh B Prianto','','','085814292527','','teguhbp@gmail.com','','','setup/teknis'),('CAKRA STUDIO, CV  (www.mobistrimi.com)','Romie Indra','','','081283967546','','romie.indra@mobistrimi.com','','','support/teknis'),('PT NETMARKS INDONESIA (PT CIKARANG PERKASA MANUFACTURING)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT NETMARKS INDONESIA (PT CIKARANG PERKASA MANUFACTURING)','Wicaksono Wibowo','','','0811950548','','wwibowo@netmarks.co.id','','','pemohon'),('PT NETMARKS INDONESIA (PT CIKARANG PERKASA MANUFACTURING)','Jon Hendriko ','021','83793009','','','j.hendriko@netmarks.co.id','','','support/teknis'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','Irmawan Poedjoadi','','','','','','Jl.Karang Asri II C2/36 RT 13 RW 03 Lebak Bulus, Cilandak, Jakarta Sea','09.5308.080157.0225','pemohon'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','Erman Nazar','021','7661533','','','erman@clo.co.id','','','support/teknis'),('CYBERPLUS MEDIA PRATAMA, PT','Jury C Aritonang','','','081808280055','','aritonang@cyberplus.net.id','','','pemohon'),('CYBERPLUS MEDIA PRATAMA, PT','Friska Ariesta','021','82430441','','','accounting@cyberplus.net.id','','','penagihan'),('CYBERPLUS MEDIA PRATAMA, PT','Wishnu Adhi Pahlevi','','','08118401489','','wizznoe@cyberplus.net.id','','','setup/teknis'),('CYBERPLUS MEDIA PRATAMA, PT','SUPPORT','021','82418811','','','noc@cyberplus.net.id','','','support/teknis'),(' EQUNIX BUSINESS SOLUTIONS, PT','Julyanto Sutandang','','','08164858028','','juyanto@equnix.co.id','','3603170407740002','pemohon'),(' EQUNIX BUSINESS SOLUTIONS, PT','Dian Nurita','021','68881898','','','dian@equnix.co.id','','','administrasi'),(' EQUNIX BUSINESS SOLUTIONS, PT','Dian Nurita','021','68881898','','','dian@equnix.co.id','','','penagihan'),(' EQUNIX BUSINESS SOLUTIONS, PT','Ali','021','68881898','081585855875','','lee@equnix.co.id','','','setup/teknis'),(' EQUNIX BUSINESS SOLUTIONS, PT','Ali','021','68881898','081585855875','','lee@equnix.co.id','','','support/teknis'),('NETMARKS INDONESIA, PT ( FERRO MAS DINAMIKA, PT - BEKASI)','Wicaksono Wibowo','','','0811950548','','wwibowo@netmarks.co.id','','','pemohon'),('NETMARKS INDONESIA, PT ( FERRO MAS DINAMIKA, PT - BEKASI)','Rosita','021','83793009','','','rosita@netmarks.co.id','','','administrasi'),('NETMARKS INDONESIA, PT ( FERRO MAS DINAMIKA, PT - BEKASI)','Rosita','021','83793009','','','rosita@netmarks.co.id','','','penagihan'),('NETMARKS INDONESIA, PT ( FERRO MAS DINAMIKA, PT - BEKASI)','Dwi Winanto','','','08158047291','','d.winanto@netmarks.co.id','','','setup/teknis'),('GLOBAL MEDIA TEKNOLOGI, CV','Agus Rianto','0274','3803845','08122797210','','agusr@gmedia.co.id','','','pemohon'),('GLOBAL MEDIA TEKNOLOGI, CV','Rahmat Aji Setiawan','','','0816699899','','rahmat@gmedia.co.id','','','administrasi'),('GLOBAL MEDIA TEKNOLOGI, CV','Rahmat Aji Setiawan','','','0816699899','','rahmat@gmedia.co.id','','','penagihan'),('GLOBAL MEDIA TEKNOLOGI, CV','Agus Rianto','0274','3803845','08122797210','','agusr@gmedia.co.id','','','setup/teknis'),('GLOBAL MEDIA TEKNOLOGI, CV','Agus Rianto','0274','3803845','08122797210','','agusr@gmedia.co.id','','','support/teknis'),('HAEGOONG INTERACTIVE, PT','Hee Young Park','','','0811891104','','','','2C11JF1287-J','pemohon'),('HAEGOONG INTERACTIVE, PT','Vonny Tanoto','','','083870553562','','vonxie@gmail.com','','','administrasi'),('HAEGOONG INTERACTIVE, PT','Vonny Tanoto','','','083870553562','','vonxie@gmail.com','','','penagihan'),('HAEGOONG INTERACTIVE, PT','Ferry','','','081318766656','','ferry45@live.com','','','setup/teknis'),('HAEGOONG INTERACTIVE, PT','Ferry','','','081318766656','','ferry45@live.com','','','support/teknis'),('HANTAR LINTAS DATA, PT','Aries Mariano Desuro','021','80798818','081317497170','','aries@halinda.com, ariesthezuro@yahoo.com','','700313054762','pemohon'),('HANTAR LINTAS DATA, PT','Novia','021','7507722','','','novia@halinda.com','','','administrasi'),('HANTAR LINTAS DATA, PT','Novia','021','7507722','','','novia@halinda.com','','','penagihan'),('HANTAR LINTAS DATA, PT','Aries Mariano Desuro','021','80798818','081317497170','','aries@halinda.com, ariesthezuro@yahoo.com','','700313054762','setup/teknis'),('HANTAR LINTAS DATA, PT','Aries Mariano Desuro','021','80798818','081317497170','','aries@halinda.com, ariesthezuro@yahoo.com','','700313054762','support/teknis'),('INTER.NET','Tedy Martiana Pribadi ','0341','794956','9389747','','','Blimbing Indah Utara VIII/05 D4-03 Polowijen, Blimbing, Malang','3573011503760009','pemohon'),('INTER.NET','Tedy Martiana Pribadi ','0341','794956','9389747','','','Blimbing Indah Utara VIII/05 D4-03 Polowijen, Blimbing, Malang','3573011503760009','administrasi'),('INTER.NET','Tedy Martiana Pribadi ','0341','794956','9389747','','','Blimbing Indah Utara VIII/05 D4-03 Polowijen, Blimbing, Malang','3573011503760009','penagihan'),('PT ELANG NUSANTARA INVESTAMA','Edy Suprayitno ','','','08563542377','','admin@eni.co.id','Dusun Bukol RT 11 RW 06 Kel. Pandansari Kec.Kedungjajang, Lumajang','3508161405810003','pemohon'),('PT ELANG NUSANTARA INVESTAMA','Edy Suprayitno ','','','08563542377','','admin@eni.co.id','Dusun Bukol RT 11 RW 06 Kel. Pandansari Kec.Kedungjajang, Lumajang','3508161405810003','administrasi'),('PT ELANG NUSANTARA INVESTAMA','Edy Suprayitno ','','','08563542377','','admin@eni.co.id','Dusun Bukol RT 11 RW 06 Kel. Pandansari Kec.Kedungjajang, Lumajang','3508161405810003','penagihan'),('TOKO ISTANA SANDANG MUTIARA','Rita Mayasari','','','','','','Jl.Anjasmoro No 7 Kel.Oro-Oro Dowo Kec.Klojen, Malang','3573026806870006','pemohon'),('ACER CUSTOMER SERVICE POINT MALANG (ACSP)','Bambang Sugeng Purboyono','','','08123311620','','','Perum Sukun Pondok Indah BB-05 Kel.Bandungrejosari Kec.Sukun, Malang','3573041406660008','pemohon'),('ACER CUSTOMER SERVICE POINT MALANG (ACSP)','Bambang Sugeng Purboyono','','','08123311620','','','Perum Sukun Pondok Indah BB-05 Kel.Bandungrejosari Kec.Sukun, Malang','3573041406660008','administrasi'),('ACER CUSTOMER SERVICE POINT MALANG (ACSP)','Bambang Sugeng Purboyono','','','08123311620','','','Perum Sukun Pondok Indah BB-05 Kel.Bandungrejosari Kec.Sukun, Malang','3573041406660008','penagihan'),('HERDIANTO','Herdianto','','','08123368855','','herdianferdianto.com','','','pemohon'),('HERDIANTO','Herdianto','','','08123368855','','herdianferdianto.com','','','setup/teknis'),('HERDIANTO','Herdianto','','','08123368855','','herdianferdianto.com','','','support/teknis'),(' HEXING TECHNOLOGY, PT','Valiant P Averoes','','','','','','Jl.Karet Ps Baru Barat II RT 10 RW 08 Karet Tengsin Kec.Tanah Abang, Jakarta Pusat','09.5007.031069.2009','pemohon'),(' HEXING TECHNOLOGY, PT','Vina Galih','','','08568451543','','vina_g@hexing.co.id','','','administrasi'),(' HEXING TECHNOLOGY, PT','Rizky Adriadhie','','','085643347171','','rizky_a@hexing.co.id','','','support/teknis'),(' HEXING TECHNOLOGY, PT','Nita Rosmawati','','','085697272721','','nita_r@hexing.co.id','','','penagihan'),(' HEXING TECHNOLOGY, PT','Rizky Adriadhie','','','085643347171','','rizky_a@hexing.co.id','','','setup/teknis'),('PT. SETIA KARYA SENTOSA','Mario Stevano','031','7340298','08113523875','','mario.stevano@gmail.com','Ruko Surya Inti Permata B-56, Surabaya','','pemohon'),('PT. SETIA KARYA SENTOSA','Mario Stevano','031','7340298','08113523875','','mario.stevano@gmail.com','Ruko Surya Inti Permata B-56, Surabaya','','administrasi'),('PT. SETIA KARYA SENTOSA','Mario Stevano','031','7340298','08113523875','','mario.stevano@gmail.com','Ruko Surya Inti Permata B-56, Surabaya','','support/teknis'),('PT. SETIA KARYA SENTOSA','Mario Stevano','031','7340298','08113523875','','mario.stevano@gmail.com','Ruko Surya Inti Permata B-56, Surabaya','','penagihan'),('ADRIWARA KRIDA, PT','Hadwinning Arso','021','8309302','0811814119','','hadwinning.arso@eurorscg.co.id','Jl. Guntur No. 48, Setiabudi, Jaksel','','pemohon'),('ADRIWARA KRIDA, PT','Hadwinning Arso','021','8309302','0811814119','','hadwinning.arso@eurorscg.co.id','Jl. Guntur No. 48, Setiabudi, Jaksel','','administrasi'),('ADRIWARA KRIDA, PT','Hadwinning Arso','021','8309302','0811814119','','hadwinning.arso@eurorscg.co.id','Jl. Guntur No. 48, Setiabudi, Jaksel','','support/teknis'),('ADRIWARA KRIDA, PT','Hadwinning Arso','021','8309302','0811814119','','hadwinning.arso@eurorscg.co.id','Jl. Guntur No. 48, Setiabudi, Jaksel','','penagihan'),('PT. BENTONITE INDONESIA','Adnan Karamoy','021','83793411/12','081932388829','','adnan.karamoy@indobent.com','Menara Bedikara 1 Lt. 2, Jl. Gatoto Subroto Kav. 71-73, Jakarta Selatan','','pemohon'),('PT. BENTONITE INDONESIA','Adnan Karamoy','021','83793411/12','081932388829','','adnan.karamoy@indobent.com','Menara Bedikara 1 Lt. 2, Jl. Gatoto Subroto Kav. 71-73, Jakarta Selatan','','penanggungjawab'),('PT. BENTONITE INDONESIA','Ima','021','83793411/12','081281910596','','adnan.karamoy@indobent.com','Menara Bedikara 1 Lt. 2, Jl. Gatoto Subroto Kav. 71-73, Jakarta Selatan','','administrasi'),('PT. BENTONITE INDONESIA','Ima','021','83793411/12','081281910596','','adnan.karamoy@indobent.com','Menara Bedikara 1 Lt. 2, Jl. Gatoto Subroto Kav. 71-73, Jakarta Selatan','','penagihan'),('PT. BENTONITE INDONESIA','Ima','021','83793411/12','081281910596','','adnan.karamoy@indobent.com','Menara Bedikara 1 Lt. 2, Jl. Gatoto Subroto Kav. 71-73, Jakarta Selatan','','support/teknis'),('RESTU WILUJENG','Restu Wilujeng','031','5679244','081654927999','','restu@sinergiprima.com','Jl. Pakis Tirtosari IX/40, Surabaya','','pemohon'),('RESTU WILUJENG','Restu Wilujeng','031','5679244','081654927999','','restu@sinergiprima.com','Jl. Pakis Tirtosari IX/40, Surabaya','','penanggungjawab'),('RESTU WILUJENG','Yohanes Ricky','031','5679244','085645609698','','ricky@sinergiprima.com','Jl. Pakis Tirtosari IX/40, Surabaya','','support/teknis'),('RESTU WILUJENG','Restu Wilujeng','031','5679244','081654927999','','restu@sinergiprima.com','Jl. Pakis Tirtosari IX/40, Surabaya','','administrasi'),('RESTU WILUJENG','Restu Wilujeng','031','5679244','081654927999','','restu@sinergiprima.com','Jl. Pakis Tirtosari IX/40, Surabaya','','penagihan'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','H. Syafik Gadi','031','8299093, 8290140','71457725','','humas@alhikmahsby.com','Jl. Gayungsari IV/25, Surabaya','','pemohon'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','H. Syafik Gadi','031','8299093, 8290140','71457725','','humas@alhikmahsby.com','Jl. Gayungsari IV/25, Surabaya','','penanggungjawab'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Zahri','031','8299093, 8290140','','','akademik@alhikmahsby.com','Jl. Gayungsari IV/25, Surabaya','','administrasi'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Zahri','031','8299093, 8290140','','','akademik@alhikmahsby.com','Jl. Gayungsari IV/25, Surabaya','','support/teknis'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','Zahri','031','8299093, 8290140','','','akademik@alhikmahsby.com','Jl. Gayungsari IV/25, Surabaya','','penagihan'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Perum Regency21 H-79 Surabaya ','3578032601190002','pemohon'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Perum Regency21 H-79 Surabaya ','3578032601190002','setup/teknis'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Perum Regency21 H-79 Surabaya ','3578032601190002','administrasi'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Perum Regency21 H-79 Surabaya ','3578032601190002','penagihan'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Perum Regency21 H-79 Surabaya ','3578032601190002','penanggungjawab'),('JESKA MITRA ENERGI, PT  (JME)','Adnan Karamoy','021','83793417','','','adnan.karamoy@indobent.com','','09.5307.190847.0074','pemohon'),('JESKA MITRA ENERGI, PT  (JME)','Tantri','021','','83793417','','','indobent, menara bidakara Lt.2','','administrasi'),('JESKA MITRA ENERGI, PT  (JME)','Tantri','021','83793417','','','','indobent, menara bidakara Lt.2','','administrasi'),('IFORTE SOLUSI INFOTEK, PT','Purwahono','021','8310301','08118887145','','purwahono@i4tecom','','','pemohon'),('IFORTE SOLUSI INFOTEK, PT','Mike Linggawati','021','8310301','','','','','','penagihan'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Ronny ','','','081316381638','','ronnyliem@naga1001.com','Jl.Raya Pos Pengumben RT 1 RW 9 Kelapa Dua, Kebon Jeruk, Jakarta Barat','09.5001.011076.0028','pemohon'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Bram','021','92358975','','','bram007yuli@yahoo.com','','','setup/teknis'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Bram','021','92358975','','','bram007yuli@yahoo.com','','','support/teknis'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Marlen','021','57937711','','','marlenmmc@yahoo.com','','','penagihan'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Ronny','','081316381638','','','ronnyliem@naga1001.com','Jl.Raya Pos Pengumben RT 1 RW 9 Kelapa Dua, Kebon Jeruk, Jakarta Barat','09.5001.011076.0028','pemohon'),('INFINYS SYSTEM INDONESIA, PT','Dondy Bappedyanto','021','5152828','081807332717','','dondy@isi.co.id','','09.5106.070976.0477','pemohon'),('INFINYS SYSTEM INDONESIA, PT','Louis Larry','021','5152828','0811310359','','louis@isi.co.id','','','pemohon'),('INFINYS SYSTEM INDONESIA, PT','Martina Suhandini','021','5152828','08121981332','','martina.suhandini@isi.co.id','','','administrasi'),('INFINYS SYSTEM INDONESIA, PT','Sully Syahlevi','021','5152828','08888098281','','sulli.syahlevi@isi.co.id','','','setup/teknis'),('INFINYS SYSTEM INDONESIA, PT','Erly Avianti','021','5152828','081310510944','','erly.avianti@infinysystem.com','','','penagihan'),('INFINYS SYSTEM INDONESIA, PT','Sully Syahlevi','021','5152828','08888098281','','sulli.syahlevi@infinysystem.com','','','setup/teknis'),('INFINYS SYSTEM INDONESIA, PT','Sully Syahlevi','021','5152828','08888098281','','sulli.syahlevi@infinysystem.com','','','support/teknis'),('INFINYS SYSTEM INDONESIA, PT','Louis Larry','021','5152828','0811310359','','louis@infinysystem.com','','','pemohon'),('INFINYS SYSTEM INDONESIA, PT','Martina Suhandini','021','5152828','08121981332','','martina.suhandini@infinysystem.com','','','administrasi'),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)','Wicaksono Wibowo','','','0811950548','','wwibowo@netmarks.co.id','','','pemohon'),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)','Rosita','021','83793009','','','rosita@netmarks.co.id','','','administrasi'),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)','Rosita','021','83793009','','','rosita@netmarks.co.id','','','penagihan'),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)','Erly','021','83793009','','','engineer@netmarks.co.id','','','setup/teknis'),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)','Erly','021','83793009','','','engineer@netmarks.co.id','','','support/teknis'),('JAYA TATA TELEKOM, PT  (JATAKOM)','Taras Siahaan','','','083898607890','','taras.siahaan@jatakom.com','Jl.Duta Raya Blok HH-18 RT 06 RW 22 Kel. Bojong Rawalumbu Kec.Rawalumbu, Bekasi','327 505070 3640018','pemohon'),('JAYA TATA TELEKOM, PT  (JATAKOM)','Leli H.W','021','7995930','','','admin@jatakom.com','','','administrasi'),('JAYA TATA TELEKOM, PT  (JATAKOM)','Leli H.W','021','7995930','','','admin@jatakom.com','','','penagihan'),('JAYA TATA TELEKOM, PT  (JATAKOM)','Heri Kiswanto','021','7995930','','','heri@jatakom.com','','','setup/teknis'),('JAYA TATA TELEKOM, PT  (JATAKOM)','Heri Kiswanto','021','7995930','','','heri@jatakom.com','','','support/teknis'),('JURAGAN.NET','Ayatullah Pascka P.Salim','021','98556689','08176746848','','juragan2juragan.net','Komplek KFT Blk C-1 No.12 RT 06 RW 11 Kel.Cengkareng Barat, Jakarta Barat','790 1120 50119','pemohon'),('JURAGAN.NET','Ayatullah Pascka P.Salim','021','98556689','08176746848','','juragan2juragan.net','Komplek KFT Blk C-1 No.12 RT 06 RW 11 Kel.Cengkareng Barat, Jakarta Barat','790 1120 50119','administrasi'),('KAJIMA INDONESIA, PT','Jun Adachi','021','5724477','','','j.adachi@kajima.co.id','','IM2JA84091','pemohon'),('KAJIMA INDONESIA, PT','R.Achsan','','','08881541664','','08881541664','','','administrasi'),('KAJIMA INDONESIA, PT','LF.Yanti','021','5724477','','','accounting@kajima.co.id','','','penagihan'),('KAJIMA INDONESIA, PT','Moch.Nur','','','08159156846','','moch.nur@kajima.co.id','','','setup/teknis'),('KAJIMA INDONESIA, PT','Moch.Nur','','','08159156846','','moch.nur@kajima.co.id','','','support/teknis'),('KIWOOM SECURITIES INDONESIA, PT','Bandoro Susilo','021','5261326','081271737372','','bandoro@kiwoom.co.id','','','pemohon'),('KIWOOM SECURITIES INDONESIA, PT','Nuke','021','5361326','','','nuke13@kiwoom.co.id','','','administrasi'),('KIWOOM SECURITIES INDONESIA, PT','Asria Manik','021','5361326','','','asria@kiwoom.co.id','','','penagihan'),('KIWOOM SECURITIES INDONESIA, PT','Bandoro Susilo','021','5261326','081271737372','','bandoro@kiwoom.co.id','','','setup/teknis'),('PT. KARYA ANUGERAH (AYOBU)','Handoko Hartono','031','8014838','0811308260','','handoko_1@indo.net.id','Komplek Pergudangan Meiko Abadi 1 No. A.28 Jl. Raya Betro, Gedangan','','pemohon'),('PT. KARYA ANUGERAH (AYOBU)','Handoko Hartono','031','8014838','0811308260','','handoko_1@indo.net.id','Komplek Pergudangan Meiko Abadi 1 No. A.28 Jl. Raya Betro, Gedangan','','penanggungjawab'),('PT. KARYA ANUGERAH (AYOBU)','Ajeng Erwita','031','8014838','081703168100','','ajengerwita@yahoo.com','Komplek Pergudangan Meiko Abadi 1 No. A.28 Jl. Raya Betro, Gedangan','','administrasi'),('PT. KARYA ANUGERAH (AYOBU)','Ajeng Erwita','031','8014838','081703168100','','ajengerwita@yahoo.com','Komplek Pergudangan Meiko Abadi 1 No. A.28 Jl. Raya Betro, Gedangan','','penagihan'),('PT. KARYA ANUGERAH (AYOBU)','Ajeng Erwita','031','8014838','081703168100','','ajengerwita@yahoo.com','Komplek Pergudangan Meiko Abadi 1 No. A.28 Jl. Raya Betro, Gedangan','','support/teknis'),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)','Sebastianus Santoso','031','8438883','0811311050','','chdgroup@rad.net.id','Jl. Rungkut Industri 1/8, Surabaya','','pemohon'),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)','Sebastianus Santoso','031','8438883','0811311050','','chdgroup@rad.net.id','Jl. Rungkut Industri 1/8, Surabaya','','penanggungjawab'),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)','Sebastianus Santoso','031','8438883','0811311050','','chdgroup@rad.net.id','Jl. Rungkut Industri 1/8, Surabaya','','administrasi'),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)','Sebastianus Santoso','031','8438883','0811311050','','chdgroup@rad.net.id','Jl. Rungkut Industri 1/8, Surabaya','','penagihan'),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)','Sebastianus Santoso','031','8438883','0811311050','','chdgroup@rad.net.id','Jl. Rungkut Industri 1/8, Surabaya','','support/teknis'),('WISMILAK','Akim Hermanto','031','2952828','08123260054','','akim.hermanto@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','pemohon'),('WISMILAK','Akim Hermanto','031','2952828','08123260054','','akim.hermanto@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','penanggungjawab'),('WISMILAK','Surjanto','031','2952828','','','surjanto@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','administrasi'),('WISMILAK','Surjanto','031','2952828','','','surjanto@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','penagihan'),('WISMILAK','Wiwid Wijanarka','031','2952828','083857822226','','wiwid.wijanarka@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','penagihan'),('KANTOR IMIGRASI KELAS II JEMBER','Bambang Gustiyanto','0331','333177','081934755758','','satria_benk@yahoo.com','Jl. Letjend Panjaitan No. 47, Jember','','pemohon'),('KANTOR IMIGRASI KELAS II JEMBER','Bambang Gustiyanto','0331','333177','081934755758','','satria_benk@yahoo.com','Jl. Letjend Panjaitan No. 47, Jember','','penanggungjawab'),('KANTOR IMIGRASI KELAS II JEMBER','Bambang Gustiyanto','0331','333177','081934755758','','satria_benk@yahoo.com','Jl. Letjend Panjaitan No. 47, Jember','','administrasi'),('KANTOR IMIGRASI KELAS II JEMBER','Bambang Gustiyanto','0331','333177','081934755758','','satria_benk@yahoo.com','Jl. Letjend Panjaitan No. 47, Jember','','penagihan'),('KANTOR IMIGRASI KELAS II JEMBER','Bambang Gustiyanto','0331','333177','081934755758','','satria_benk@yahoo.com','Jl. Letjend Panjaitan No. 47, Jember','','support/teknis'),('SMP KATOLIK AGELUS CUSTOS II','Yosaphat Novi Hartanto','031','7662763','082134442939','','yosa_yosaphat@yahoo.co.id','Jl. J.A. Suprapto 21, Samaan, Klojen, Malang','','pemohon'),('SMP KATOLIK AGELUS CUSTOS II','Yosaphat Novi Hartanto','031','7662763','082134442939','','yosa_yosaphat@yahoo.co.id','Jl. J.A. Suprapto 21, Samaan, Klojen, Malang','','penanggungjawab'),('SMP KATOLIK AGELUS CUSTOS II','Yosaphat Novi Hartanto','031','7662763','082134442939','','yosa_yosaphat@yahoo.co.id','Jl. J.A. Suprapto 21, Samaan, Klojen, Malang','','administrasi'),('SMP KATOLIK AGELUS CUSTOS II','Yosaphat Novi Hartanto','031','7662763','082134442939','','yosa_yosaphat@yahoo.co.id','Jl. J.A. Suprapto 21, Samaan, Klojen, Malang','','penagihan'),('SMP KATOLIK AGELUS CUSTOS II','Yosaphat Novi Hartanto','031','7662763','082134442939','','yosa_yosaphat@yahoo.co.id','Jl. J.A. Suprapto 21, Samaan, Klojen, Malang','','support/teknis'),('LINTAS NIAGA, PT (JAKARTA)','Reynald Reynaldo UN','0313','03170010502','','','admin@pt-lnj.com','','','pemohon'),('LINTAS NIAGA, PT (JAKARTA)','Reynald Reynaldo UN','0313','03170010502','','','admin@pt-lnj.com','','','setup/teknis'),('LINTAS NIAGA, PT (JAKARTA)','Reynald Reynaldo UN','0313','03170010502','','','admin@pt-lnj.com','','','support/teknis'),('LINTAS NIAGA, PT (JAKARTA)','Fonda Ari','0313','0313578001','','','fonda@pt-lnj.com','','','penanggungjawab'),('LINTAS NIAGA, PT (JAKARTA)','Tanti','0313','0313578001','','','tanti@pt-lnj.com','','','administrasi'),('LINTAS NIAGA, PT (JAKARTA)','Tanti','0313','0313578001','','','tanti@pt-lnj.com','','','penagihan'),('NETMARKS INDONESIA, PT  (YAMAHA PULO GADUNG) ','Rusyadi','021 ','8379 3009','0813 8579 068','','roesjadi @ netmarks.co.id','','','pemohon'),('NETMARKS INDONESIA, PT  (YAMAHA PULO GADUNG) ','Rosita','021','8379 3009','','','rosita @ netmarks.co.id','','','administrasi'),('PT NETMARKS INDONESIA','Rusyadi','021','8379 3009','0813 8579 068','','roesjadi @ netmarks.co.id','','','pemohon'),('PT NETMARKS INDONESIA','Rosita','021','8379 3009','','','rosita @ netmarks.co.id','','','administrasi'),('PT. KOMPAS CYBER MEDIA','Ari Sasongko','021','0215483008','08128917146','','','','','pemohon'),(' INFO MOBILE NUSA MEDIA, PT  (IMOB)','Ni Nyoman Tripitasih ','0361','245 156','081 2390 0023','','info @ imob.co.id','','','pemohon'),(' INFO MOBILE NUSA MEDIA, PT  (IMOB)','NI WAYAN SUARNI','0361','245156','0819 1616 604','','accounting @ imob.co.id','','','penagihan'),(' INFO MOBILE NUSA MEDIA, PT  (IMOB)','RUDY CAYADI','0361','245156','0878 3922 923','','support @ imob.co.id','','','setup/teknis'),('KOMUNITAS DEMOKRASI','RUDY CAYADI','021','7280 1219','0878 3922 923','','rcayadi @ yahoo.com','','','pemohon'),('KOMUNITAS DEMOKRASI','REZA ARIEF SIMAMORA','021','7280 1219','0813 1655 451','','reza.simamora @ komunitasdemokrasi.or.id','','','penanggungjawab'),('KOMUNITAS DEMOKRASI','RIAWATI HANDAYANI','021','7280 1219','0812 2775 686','','riawati.handayani @ komunitasdemokrasi.or.id','','','penagihan'),('KOMUNITAS DEMOKRASI','RUDY CAYADI','021','7280 1219','0878 3922 923','','rcayadi @ yahoo.com','','','setup/teknis'),('KOMUNITAS DEMOKRASI','RUDY CAYADI','021','7280 1219','0878 3922 923','','rcayadi @ yahoo.com','','','support/teknis'),('PRAKARSA KPU','EKO ANGGORO S.','021','5795 6795','0856 5403 740','','eko @ ifesindonesia.org','','','pemohon'),('PRAKARSA KPU','WITRI MARIANTI','021','5795 6795','0811 917 312','','witri @ ifesindonesia.org','','','penagihan'),('CAHAYA ANGKASA ABADI, PT','Suwito Hadiprayitno','031','8432010','0811336009','','suwito@focuselectric.com','Jl. Berbek Industri 1/6, Sidoarjo','','pemohon'),('CAHAYA ANGKASA ABADI, PT','Suwito Hadiprayitno','031','8432010','0811336009','','suwito@focuselectric.com','Jl. Berbek Industri 1/6, Sidoarjo','','penanggungjawab'),('CAHAYA ANGKASA ABADI, PT','Alexius Junaedy','031','8432010','0811377884','','alex@focuselectric.com','Jl. Berbek Industri 1/6, Sidoarjo','','administrasi'),('CAHAYA ANGKASA ABADI, PT','Alexius Junaedy','031','8432010','0811377884','','alex@focuselectric.com','Jl. Berbek Industri 1/6, Sidoarjo','','penagihan'),('CAHAYA ANGKASA ABADI, PT','Alexius Junaedy','031','8432010','0811377884','','alex@focuselectric.com','Jl. Berbek Industri 1/6, Sidoarjo','','support/teknis'),('GLOBAL EDUCATION CENTER','Roland Wetik','031','34394505','081331548910','','roland.wetik@gmail.com','Jl. Pandugo Timur 15 Blok P2F No. 46','','pemohon'),('GLOBAL EDUCATION CENTER','Roland Wetik','031','34394505','081331548910','','roland.wetik@gmail.com','Jl. Pandugo Timur 15 Blok P2F No. 46','','penanggungjawab'),('GLOBAL EDUCATION CENTER','Roland Wetik','031','34394505','081331548910','','roland.wetik@gmail.com','Jl. Pandugo Timur 15 Blok P2F No. 46','','administrasi'),('GLOBAL EDUCATION CENTER','Roland Wetik','031','34394505','081331548910','','roland.wetik@gmail.com','Jl. Pandugo Timur 15 Blok P2F No. 46','','penagihan'),('GLOBAL EDUCATION CENTER','Roland Wetik','031','34394505','081331548910','','roland.wetik@gmail.com','Jl. Pandugo Timur 15 Blok P2F No. 46','','support/teknis'),('KOMUNITAS DEMOKRASI','Shanti Josephine','021','72801223','','','shanti@komunitasdemokrasi.or.id','Jl.Dewi Kinthi I No.15 RT 03 RW 16 Kel.Tegal Gundil Kec.Bogor Utara, Bogor','32.7105.630169.0005','pemohon'),('KOMUNITAS DEMOKRASI','Rudy Cayadi','','','081314000477','','rcayadi@yahoo.com','Jl.Perintis Bawah RT 08 RW 12 Kel.Kedaung Kec.Pamulang, Tangerang Selatan','3674060804770002','administrasi'),('KOMUNITAS DEMOKRASI','Riawati Handayani','021','72801219','','','as.finance@komunitasdemokrasi.or.id','','','administrasi'),('KOMUNITAS DEMOKRASI','Rudy Cayadi','','','081314000477','','rcayadi@yahoo.com','Jl.Perintis Bawah RT 08 RW 12 Kel.Kedaung Kec.Pamulang, Tangerang Selatan','3674060804770002','setup/teknis'),('KOMUNITAS DEMOKRASI','Rudy Cayadi','','','081314000477','','rcayadi@yahoo.com','Jl.Perintis Bawah RT 08 RW 12 Kel.Kedaung Kec.Pamulang, Tangerang Selatan','3674060804770002','support/teknis'),('MANTENBOSHI CREATIVE INDONESIA, PT','Fenny Medika Tohir','','','08119916223','','fenny@mantenboshi.co.id','Peninggaran Barat III RT 09 RW 11 Kel.Kemayoran Lama Utara Kec.Kebayoran Lama, Jakarta Selatan','3174054902720008','pemohon'),('MANTENBOSHI CREATIVE INDONESIA, PT','Fenny Medika Tohir','','','08119916223','','fenny@mantenboshi.co.id','Peninggaran Barat III RT 09 RW 11 Kel.Kemayoran Lama Utara Kec.Kebayoran Lama, Jakarta Selatan','3174054902720008','administrasi'),('MANTENBOSHI CREATIVE INDONESIA, PT','Fenny Medika Tohir','','','08119916223','','fenny@mantenboshi.co.id','Peninggaran Barat III RT 09 RW 11 Kel.Kemayoran Lama Utara Kec.Kebayoran Lama, Jakarta Selatan','3174054902720008','penagihan'),('MANTENBOSHI CREATIVE INDONESIA, PT','Fenny Medika Tohir','','','08119916223','','fenny@mantenboshi.co.id','Peninggaran Barat III RT 09 RW 11 Kel.Kemayoran Lama Utara Kec.Kebayoran Lama, Jakarta Selatan','3174054902720008','penanggungjawab'),('MANTENBOSHI CREATIVE INDONESIA, PT','Rismal Bachri','','','081808233786','','','','','setup/teknis'),('MANTENBOSHI CREATIVE INDONESIA, PT','Tendy Wijaya','','','085782729287','','','','','support/teknis'),('MANTENBOSHI CREATIVE INDONESIA, PT','Gerald Hutagalung','021','57950702','','','geraldhtg@gmail.com','Wisma DPR RI Blok C-1 No.192 RT 06 RW 02 Kel.Rawajati Kec.Pancoran, Jakarta Selatan','09.5308.210669.0399','pemohon'),('MANTENBOSHI CREATIVE INDONESIA, PT','Christeddy Parapat','021','57950702','','','christeddy.parapat@mtbintl.com','','','administrasi'),('MANTENBOSHI CREATIVE INDONESIA, PT','Christeddy Parapat','021','57950702','','','christeddy.parapat@mtbintl.com','','','setup/teknis'),('MANTENBOSHI CREATIVE INDONESIA, PT','Yogi M','021','57950702','','','yogi.marsahala@mtbintl.com','','','penagihan'),('MANTENBOSHI CREATIVE INDONESIA, PT','Yogi M','021','57950702','','','yogi.marsahala@mtbintl.com','','','support/teknis'),('NAVIGA TECH ASIA, PT','Eddy Prayitno','021','65701155','','','ep@navigatech.com','','','pemohon'),('NAVIGA TECH ASIA, PT','Silvia','021','65701155','08128473328','','silvia.tirta@navigatech.com','','','administrasi'),('NAVIGA TECH ASIA, PT','Silvia','021','65701155','08128473328','','silvia.tirta@navigatech.com','','','penagihan'),('NAVIGA TECH ASIA, PT','Bayu bondo Prakoso','021','65701155','081310966852','','bayu.prakoso@navigatech.com','','','setup/teknis'),('NAVIGA TECH ASIA, PT','Bayu bondo Prakoso','021','65701155','081310966852','','bayu.prakoso@navigatech.com','','','support/teknis'),('ONELIFE INDONESIA, PT','Rusli budianto','021','92871429','','','rusli.budinto@onelife.web.id','','','administrasi'),('ONELIFE INDONESIA, PT','Suyudi Koeswanto','','','08123027521','','suyudi.koeswanto@onelife.web.id','','','pemohon'),('ONELIFE INDONESIA, PT','Suyudi Koeswanto','','','08123027521','','suyudi.koeswanto@onelife.web.id','','','penagihan'),('ONELIFE INDONESIA, PT','Suyudi Koeswanto','','','08123027521','','suyudi.koeswanto@onelife.web.id','','','support/teknis'),('ONELIFE INDONESIA, PT','Pramintio / Rusli','021','52905151','','','pramintio.suhartanto@onelife.web.id','','','setup/teknis'),(' PREMIER EQUITY FUTURES, PT','Yudi Indrawan','021','57954888','087884778668','','yudiindr@gmail.com','Petamburan Rt 03 RW 04 Kel.Petamburan Kec.Tanah Abang, Jakarta Pusat','3171072306690004','pemohon'),(' PREMIER EQUITY FUTURES, PT','Ani','021','57954888','','','ani_e1@yahoo.com','','','administrasi'),(' PREMIER EQUITY FUTURES, PT','Desti','021','57954888','','','dhea_kie@yahoo.com','','','penagihan'),(' PREMIER EQUITY FUTURES, PT','Handarudjati','021','57954888','','','','','','setup/teknis'),(' PREMIER EQUITY FUTURES, PT','Yudi/handarudjati','021','57954888','','','','','','pemohon'),(' PREMIER EQUITY FUTURES, PT','Yudi Indrawan','','','087884778668','','yudiindr@gmail.com','Petamburan RT 03 RW 04 Kel.Petamburan Kec.Tanah Abang, Jakarta Pusat','3171072306690004','pemohon'),(' PREMIER EQUITY FUTURES, PT','Ani','','','08128376550','','ani_e1@yahoo.com','','','administrasi'),(' PREMIER EQUITY FUTURES, PT','Desti Adrina Sirad','','','085888884183','','dhea_kie@yahoo.com','','','penagihan'),(' PREMIER EQUITY FUTURES, PT','Aldrin','021','57954888','','','aldrin_kencana@yahoo.co.id','','','setup/teknis'),(' PREMIER EQUITY FUTURES, PT','Aldrin','021','57954888','','','aldrin_kencana@yahoo.co.id','','','support/teknis'),('QUIROS NETWORK, PT','Teguh Santosa','','','081399882211','','teguh@quiros.co.id','','360 328 050683 6005','pemohon'),('QUIROS NETWORK, PT','Febby','','','081586106637','','febby@quiros.co.id','','','administrasi'),('QUIROS NETWORK, PT','Febby','','','081586106637','','febby@quiros.co.id','','','penagihan'),('QUIROS NETWORK, PT','Jefry Sutanto','','','083898989695','','jefrY@quiros.co.id','','','setup/teknis'),('QUIROS NETWORK, PT','Jefry Sutanto','','','083898989695','','jefrY@quiros.co.id','','','support/teknis'),('QUIROS NETWORK, PT','Teguh Santosa','021','53660813','','','teguh@quiros.co.id','','360 328 050683 6005','pemohon'),('QUIROS NETWORK, PT','Febby','021','53660813','','','febby@quiros.co.id','','','administrasi'),('QUIROS NETWORK, PT','Febby','021','53660813','','','febby@quiros.co.id','','','penagihan'),('QUIROS NETWORK, PT','Erik Gordon','021','53660813','','','erik@quiros.co.id','','','setup/teknis'),('QUIROS NETWORK, PT','Jefry','021','53660813','','','jefrY@quiros.co.id','','','support/teknis'),('RANTISIA ABADI UTAMA, CV','Ferdinan','021','99932770','08568712827','','ferdi@rantisia.com; dferdi22@yahoo.com','Jl.Swasembada Barat V No.28 Tanjung Priok Jakarta Utara','09.5103.221073.0099','pemohon'),(' REGAWA MOBINDO KREASI NUSA, PT','Tomi Riza Noviandi','021','7248811','','','','','3174062711740006','pemohon'),(' REGAWA MOBINDO KREASI NUSA, PT','Rini Trihastuti','021','7248811','','','rini.tinihastuti@regawa.com','','','administrasi'),(' REGAWA MOBINDO KREASI NUSA, PT','Rini Trihastuti','021','7248811','','','rini.tinihastuti@regawa.com','','','penagihan'),(' REGAWA MOBINDO KREASI NUSA, PT','Budi','021','7248811 / 70777892','','','hostmaster@regawa.com','','','setup/teknis'),(' REGAWA MOBINDO KREASI NUSA, PT','Budi','021','7248811 / 70777892','','','hostmaster@regawa.com','','','support/teknis'),(' REGAWA MOBINDO KREASI NUSA, PT','Tomi Riza','021','7248811','','','tomi.riza@regawa.com','','','pemohon'),(' REGAWA MOBINDO KREASI NUSA, PT','Putri','021','7248811','','','putri.utami@regawa.com','','','administrasi'),(' REGAWA MOBINDO KREASI NUSA, PT','Linawati','021','7248811','','','','','','penagihan'),(' REGAWA MOBINDO KREASI NUSA, PT','Linawati','021','7248811','','','linawati@regawa.com','','','penagihan'),('NETMARKS INDONESIA, PT  ( SAKURA)','Taofik Hidayat','021','83793009','0811810875','','fik@netmarks.co.id','','','pemohon'),('NETMARKS INDONESIA, PT  ( SAKURA)','John Hendriko','','','081372366480','','j.hendriko@netmarks.co.id','','','administrasi'),('SOMAGEDE INDONESIA, PT','Efril Busyra','021','6410730','0818669610','','efril@sgp-dkp.com','','','pemohon'),('SOMAGEDE INDONESIA, PT','Lidya','021','6410730','','','lidya@somagede.com','','','administrasi'),('SOMAGEDE INDONESIA, PT','Lidya','021','6410730','','','lidya@somagede.com','','','penagihan'),('SPACE NET INDONESIA, PT','Nedo Russuluando','021','75818176','08153104648','','nedo@spacenet-id.com','','09.5407.090773.8505','pemohon'),('SPACE NET INDONESIA, PT','Nedo Russuluando','021','75818176','08153104648','','nedo@spacenet-id.com','','09.5407.090773.8505','administrasi'),('SPACE NET INDONESIA, PT','Siswanti Ahemi (Yeni)','021','91460157','','','yeni@spacenet-id.com','','','penagihan'),('SPACE NET INDONESIA, PT','Nur Adi','021','75818176','08153104748','','adi@spacenet-id.com','','','setup/teknis'),('SPACE NET INDONESIA, PT','Nur Adi','021','75818176','08153104748','','adi@spacenet-id.com','','','support/teknis'),('TPIL LOGISTICS, PT','Sarah E.BR.Tobing','021','6911111','','','sarah.tobing@tpil.co.id','Jl.Kayu Putih IX E/27 RT 10 RW 05 Kel.Pulo Gadung Kec.Pulo Gadung, Jakarta Timur','3175024909740010','pemohon'),('TPIL LOGISTICS, PT','Sarah E.BR.Tobing','021','6911111','','','sarah.tobing@tpil.co.id','Jl.Kayu Putih IX E/27 RT 10 RW 05 Kel.Pulo Gadung Kec.Pulo Gadung, Jakarta Timur','3175024909740010','penanggungjawab'),('TPIL LOGISTICS, PT','Ariyadi Saputro','021','6911111','','','ariyadi.saputro@tpil.co.id','','','administrasi'),('TPIL LOGISTICS, PT','Ariyadi Saputro','021','6911111','','','ariyadi.saputro@tpil.co.id','','','setup/teknis'),('TPIL LOGISTICS, PT','Ariyadi Saputro','021','6911111','','','ariyadi.saputro@tpil.co.id','','','support/teknis'),('TPIL LOGISTICS, PT','Novelia Hendra','021','6911111','','','novelia.hendra@tpil.co.id','','','penagihan'),('TPIL LOGISTICS, PT','Sarah E.BR.Tobing','021','6911111','','','branchmanager@jkt.tpil.co.id','Jl.Kayu Putih IX E/27 RT 10 RW 05 Kel.Pulo Gadung Kec.Pulo Gadung, Jakarta Timur','3175024909740010','pemohon'),('TPIL LOGISTICS, PT','Ariyadi Saputro','021','6911111','','','it@jkt.tpil.co.id','','','administrasi'),('TPIL LOGISTICS, PT','Ariyadi Saputro','021','6911111','','','it@jkt.tpil.co.id','','','setup/teknis'),('TPIL LOGISTICS, PT','Ariyadi Saputro','021','6911111','','','it@jkt.tpil.co.id','','','support/teknis'),('TPIL LOGISTICS, PT','Novel','021','6911111','','','finance@jkt.tpil.co.id','','','penagihan'),('KURNIA NET ','Ony Kurniawan','0341','327920','085235866383','','','Pondok Indah Borobudur Kav 17 RT 09 RW 05 Kel.Tunjungsekar Kec.Lowokwaru, Malang','357300412760002','pemohon'),('LAMPU MERAH NET','Agung Purnomo Adi','0341','477985','081933017433','','','Jl.Kebudayaa No.28 Denpasar Tengah Kel.Sidakarya Kec.Denpasar Selatan,Denpasar','3171012709880001','pemohon'),('LAMPU MERAH NET','Agung Purnomo Adi','0341','477985','081933017433','','','Jl.Kebudayaa No.28 Denpasar Tengah Kel.Sidakarya Kec.Denpasar Selatan,Denpasar','3171012709880001','penagihan'),('D3 MITEK UNIVERSITAS BRAWIJAYA','Muslikh','0341','581033','','','','','','pemohon'),('D3 MITEK UNIVERSITAS BRAWIJAYA','Wuri','0341','581033','','','','','','administrasi'),('D3 MITEK UNIVERSITAS BRAWIJAYA','Wuri','0341','581033','','','','','','penagihan'),('D3 MITEK UNIVERSITAS BRAWIJAYA','Karyadi','0341','569447','7677980','','','','','setup/teknis'),('D3 MITEK UNIVERSITAS BRAWIJAYA','Karyadi','0341','569447','7677980','','','','','support/teknis'),('MM NET','Paulus Rendra Bima Sentosa','','','085746028388','081944861768','mm.net-mlg@yahoo.com','Jl.Simpang Raya Langsep No.14 RT 01 RW 02 Kel.Pisang Candi Kec.Sukun, Malang','3573040912790009','pemohon'),('X-TRONIK','M.Istnaeny Hudha, ST.MT','','','08123315867','','xtronik_malang@yahoo.co.id','Jl.Mertojoyo Selatan Blok A No.6 RT 02 RW 01 Kel.Merjosari Kec.Lowokwaru, Malang','3573050309730001','pemohon'),('X-TRONIK','Lisa Kartikasari','','','08123315867','','xtronik_malang@yahoo.co.id','','','administrasi'),('X-TRONIK','Lisa Kartikasari','','','08123315867','','xtronik_malang@yahoo.co.id','','','penagihan'),('WE-NET','Refki Nanda Suranto','0341','5489747','','','','Mangliawan Pakis Rt 04 RW 04 Malang','880815260303 (SIM)','pemohon'),('WE-NET','Refki Nanda Suranto','0341','5489747','','','','Mangliawan Pakis Rt 04 RW 04 Malang','880815260303 (SIM)','administrasi'),('WE-NET','Refki Nanda Suranto','0341','5489747','','','','Mangliawan Pakis Rt 04 RW 04 Malang','880815260303 (SIM)','penagihan'),('SEVEN TRONIK','Deddy Arifianto','0341','512191','7010777','','','','','pemohon'),('SEVEN TRONIK','Deddy Arifianto','0341','512191','7010777','','','','','administrasi'),('TAUFIK HIDAYAT','Taufik Hidayat','','','082143526001','','','Jl.Ir.Sutami 107 RT 04 RW 02 Kel.Pakistaji Kec. Wonoasih, Probolinggo','3574023107840002','pemohon'),('TAUFIK HIDAYAT','Taufik Hidayat','','','082143526001','','','Jl.Ir.Sutami 107 RT 04 RW 02 Kel.Pakistaji Kec. Wonoasih, Probolinggo','3574023107840002','administrasi'),('TAUFIK HIDAYAT','Taufik Hidayat','','','082143526001','','','Jl.Ir.Sutami 107 RT 04 RW 02 Kel.Pakistaji Kec. Wonoasih, Probolinggo','3574023107840002','penagihan'),('SUHARIONO','Suhariono','0341','9265905','','','','Bocek RT 03 RW 04 Karangploso, Malang','3507231508690002','pemohon'),('SUHARIONO','Suhariono','0341','9265905','','','','Bocek RT 03 RW 04 Karangploso, Malang','3507231508690002','administrasi'),('SKY NET','King Kiarto','','','085746104159','','kink_kitaro@yahoo.co.id','Jl.Gadang 19/28 RT 08 RW 03 Kel.Gadang Kec.Sukun, Malang','3573041207870013','pemohon'),('SKY NET','King Kiarto','','','085746104159','','kink_kitaro@yahoo.co.id','Jl.Gadang 19/28 RT 08 RW 03 Kel.Gadang Kec.Sukun, Malang','3573041207870013','penagihan'),('SEVEN ONLINE GAME','Irfan Quadrinata','','','08563553463','','jogja_fresh@yahoo.co.id','Warungboto UH 4/858 RT 31 RW 08 Kel.Warungboto Kec.Umbulharjo, Yogyakarta','34.7113.020385.0002','pemohon'),('SEVEN ONLINE GAME','Irfan Quadrinata','','','08563553463','','jogja_fresh@yahoo.co.id','Warungboto UH 4/858 RT 31 RW 08 Kel.Warungboto Kec.Umbulharjo, Yogyakarta','34.7113.020385.0002','administrasi'),('SEVEN ONLINE GAME','Irfan Quadrinata','','','08563553463','','jogja_fresh@yahoo.co.id','Warungboto UH 4/858 RT 31 RW 08 Kel.Warungboto Kec.Umbulharjo, Yogyakarta','34.7113.020385.0002','penagihan'),('RUDY IKSANTO','Rudy Iksanto','','','085855060045','','rioworks@yahoo.com','Bukit Dieng Blok S-1 RT 07 RW 05 Kel.Pisang Candi Kec.Sukun, Malang','3573042106680002','pemohon'),('RUDY IKSANTO','Rudy Iksanto','','','085855060045','','rioworks@yahoo.com','Bukit Dieng Blok S-1 RT 07 RW 05 Kel.Pisang Candi Kec.Sukun, Malang','3573042106680002','administrasi'),('RUDY IKSANTO','Rudy Iksanto','','','085855060045','','rioworks@yahoo.com','Bukit Dieng Blok S-1 RT 07 RW 05 Kel.Pisang Candi Kec.Sukun, Malang','3573042106680002','penagihan'),('REDISA','Syaiful Anwar','','','08121082095','0811551024','','Jl.Arif Margono No.36 RT 05 RW 07 Kel.Kasin Kec.Klojen, Malang','3573021110550002','pemohon'),('REDISA','Syaiful Anwar','','','08121082095','0811551024','','Jl.Arif Margono No.36 RT 05 RW 07 Kel.Kasin Kec.Klojen, Malang','3573021110550002','administrasi'),('REDISA','Syaiful Anwar','','','08121082095','0811551024','','Jl.Arif Margono No.36 RT 05 RW 07 Kel.Kasin Kec.Klojen, Malang','3573021110550002','penagihan'),('REDISA','Novi','','','0818380932','','','','','setup/teknis'),('BFI FINANCE INDONESIA Tbk, PT','Nina Faurina','0341','475400','081805385758','','','','3507144309830001','pemohon'),('BFI FINANCE INDONESIA Tbk, PT','Nina Faurina','0341','475400','081805385758','','','','3507144309830001','administrasi'),('BFI FINANCE INDONESIA Tbk, PT','Nina Faurina','0341','475400','081805385758','','','','3507144309830001','penagihan'),('KOSMETIKAMA SUPER INDAH, PT','Arif Budi Hartoyo','','','081945572600','','arifdotcom@gmail.com','Gondang Utara RT 04 RW 06 Ds.Randuagung Kec.Singosari Kab.Malang','3507241706790004','pemohon'),('KOSMETIKAMA SUPER INDAH, PT','Arif Budi Hartoyo','','','081945572600','','arifdotcom@gmail.com','Gondang Utara RT 04 RW 06 Ds.Randuagung Kec.Singosari Kab.Malang','3507241706790004','administrasi'),('KOSMETIKAMA SUPER INDAH, PT','Laila Al Qodriani','','','08123322326','','laila_purchasing@inez.co.id','','','penagihan'),('KOSMETIKAMA SUPER INDAH, PT','Arif Budi Hartoyo','','','081945572600','','arifdotcom@gmail.com','Gondang Utara RT 04 RW 06 Ds.Randuagung Kec.Singosari Kab.Malang','3507241706790004','support/teknis'),('KOSMETIKAMA SUPER INDAH, PT','Moh.Nasrul Ridho ','','','085755744277','','ridlo.nasrul@gmail.com','','','setup/teknis'),('OSITHOK','Irsyad Mahardhika ','0341','571222','6566161','','','Jl.Kedawung VIII-D/11 RT 01 RW 06 Kel.Tulusrejo Kec.Lowokwaru, Malang','3573051912800007','pemohon'),('OSITHOK','Irsyad Mahardhika ','0341','571222','6566161','','','Jl.Kedawung VIII-D/11 RT 01 RW 06 Kel.Tulusrejo Kec.Lowokwaru, Malang','3573051912800007','administrasi'),('OSITHOK','Irsyad Mahardhika ','0341','571222','6566161','','','Jl.Kedawung VIII-D/11 RT 01 RW 06 Kel.Tulusrejo Kec.Lowokwaru, Malang','3573051912800007','penagihan'),('MAN 3 MALANG','Drs.Moch.Jazuli ','','','081252650303','','admin@man3malang.com','','3507220904660001','pemohon'),('MAN 3 MALANG','Drs. Djoko Setiono','','','081805198764','','mbahmo2004@gmail.com','','','administrasi'),('MAN 3 MALANG','Drs.Suwito','','','085234230201','','admin@man3malang.com','','','penagihan'),('MAN 3 MALANG','Rio Arie Purnama','','','08180500667','','sunryo@gmail.com','','','setup/teknis'),('MAN 3 MALANG','Rio Arie Purnama','','','08180500667','','sunryo@gmail.com','','','support/teknis'),('JIMMY RUSDI','Jimmy Rusdi','','','0811313634','','jimmyrusdi@gmail.com','Jl.Indragiri Kav.2 RT 02 RW 01 Kel.Purwantoro Kec.Blimbing Malang','3573012403770006','pemohon'),('JIMMY RUSDI','Jimmy Rusdi','','','0811313634','','jimmyrusdi@gmail.com','Jl.Indragiri Kav.2 RT 02 RW 01 Kel.Purwantoro Kec.Blimbing Malang','3573012403770006','administrasi'),('JIMMY RUSDI','Jimmy Rusdi','','','0811313634','','jimmyrusdi@gmail.com','Jl.Indragiri Kav.2 RT 02 RW 01 Kel.Purwantoro Kec.Blimbing Malang','3573012403770006','penagihan'),('JIMMY RUSDI','Jimmy Rusdi','','','0811313634','','jimmyrusdi@gmail.com','Jl.Indragiri Kav.2 RT 02 RW 01 Kel.Purwantoro Kec.Blimbing Malang','3573012403770006','setup/teknis'),('JIMMY RUSDI','Jimmy Rusdi','','','0811313634','','jimmyrusdi@gmail.com','Jl.Indragiri Kav.2 RT 02 RW 01 Kel.Purwantoro Kec.Blimbing Malang','3573012403770006','support/teknis'),('INFERNO','Ahmad Mujtahid','0341','7554442','085257774442','','','','','pemohon'),('INFERNO','Ahmad Mujtahid','0341','7554442','085257774442','','','','','administrasi'),('INFERNO','Ahmad Mujtahid','0341','7554442','085257774442','','','','','penagihan'),('IHYA ULUMUDDIN','Ihya Ulumuddin','0341','9337933','','','','Perum Joyogrand XI/145 RT 05 RW 08 Kel.Merjosari Kec.Lowokwaru, Malang','3573051305830002','pemohon'),('IHYA ULUMUDDIN','Ihya Ulumuddin','0341','9337933','','','','Perum Joyogrand XI/145 RT 05 RW 08 Kel.Merjosari Kec.Lowokwaru, Malang','3573051305830002','administrasi'),('IHYA ULUMUDDIN','Ihya Ulumuddin','0341','9337933','','','','Perum Joyogrand XI/145 RT 05 RW 08 Kel.Merjosari Kec.Lowokwaru, Malang','3573051305830002','penagihan'),('MATRADATA INFORMATIKA, CV','Eko Budianto','','','081234673000','','im.echozz@yahoo.com','Perum Sukodono Permai G-7 RT 24 RW 05 Kel.Selokbesuki Kec.Sukodono, Lumajang','','pemohon'),('KRISTO RADION PURBA','Kristo Radion Purba','','','085726913353','','duke_dreadmoore@yahoo.com','Kedawung 8A/4 RT 04 RW 06 kel.Tulusrejo Kec.Lowokwaru, Malang','3573050910880001','pemohon'),('PUTRA BINTANG TIMUR LESTARI, PT','Sandra Dewi','0341','480022','08121707745','','pbtlarema@yahoo.com','Jl.Cidanau No.21 Malang','3573014504730001','pemohon'),('SD MANDALA  II','Lusiana Maryati','031','3810199','081230655663','','lm4anti@yahoo.co.id','','','pemohon'),('SD MANDALA  II','Lusiana Maryati','031','3810199','081230655663','','lm4anti@yahoo.co.id','','','administrasi'),('SD MANDALA  II','Lusiana Maryati','031','3810199','081230655663','','lm4anti@yahoo.co.id','','','setup/teknis'),('SD MANDALA  II','Lusiana Maryati','031','3810199','081230655663','','lm4anti@yahoo.co.id','','','penagihan'),('SD MANDALA  II','Lusiana Maryati','031','3810199','081230655663','','lm4anti@yahoo.co.id','','','support/teknis'),('SD MANDALA  II','Itje Martha Gunawan','031','3810199','081230655663','','lm4anti@yahoo.co.id','','','penanggungjawab'),('LINTAS NIAGA, PT ( SURABAYA)','Reynald Reynaldo UN','031','0313578001','','','admin@pt-lnj.com','','','pemohon'),('LINTAS NIAGA, PT ( SURABAYA)','Tanti','031','0313578001','','','admin@pt-lnj.com','','','administrasi'),('LINTAS NIAGA, PT ( SURABAYA)','Reynald Reynaldo UN','031','0313578001','','','admin@pt-lnj.com','','','setup/teknis'),('LINTAS NIAGA, PT ( SURABAYA)','Reynald Reynaldo UN','031','0313578001','','','admin@pt-lnj.com','','','support/teknis'),('LINTAS NIAGA, PT ( SURABAYA)','Tanti','031','0313578001','','','tanti@pt-lnj.com','','','support/teknis'),('LINTAS NIAGA, PT ( SURABAYA)','Fonda Ari','031','0313578001','','','fonda@pt-lnj.com','','','penanggungjawab'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumapauw','031','7497666','','','arthur@jawaindah.co.id','Jl. Tanjungsari No. 42, Surabaya','','pemohon'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumapauw','031','7497666','','','arthur@jawaindah.co.id','Jl. Tanjungsari No. 42, Surabaya','','penanggungjawab'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Lina','031','7497666','','','lina@jawaindah.co.id','Jl. Tanjungsari No. 42, Surabaya','','administrasi'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Lina','031','7497666','','','lina@jawaindah.co.id','Jl. Tanjungsari No. 42, Surabaya','','penagihan'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Lina','031','7497666','','','lina@jawaindah.co.id','Jl. Tanjungsari No. 42, Surabaya','','support/teknis'),('SDK SANTA ANGELA','Johannes R.S','031','3523978','78278446','085855023662','sdksantaangela@yahoo.com','Jl. Kepanjen No. 5, Surabaya','','pemohon'),('SDK SANTA ANGELA','Johannes R.S','031','3523978','78278446','085855023662','sdksantaangela@yahoo.com','Jl. Kepanjen No. 5, Surabaya','','penanggungjawab'),('SDK SANTA ANGELA','Johannes R.S','031','3523978','78278446','085855023662','sdksantaangela@yahoo.com','Jl. Kepanjen No. 5, Surabaya','','administrasi'),('SDK SANTA ANGELA','Johannes R.S','031','3523978','78278446','085855023662','sdksantaangela@yahoo.com','Jl. Kepanjen No. 5, Surabaya','','support/teknis'),('SDK SANTA ANGELA','Johannes R.S','031','3523978','78278446','085855023662','sdksantaangela@yahoo.com','Jl. Kepanjen No. 5, Surabaya','','penagihan'),('PT MESIN KASIR ONLINE','Benny Kuncoro','031','70123888','08123205540','','benny@ptmko.co.id','Taman Suko Asri P-12 Sukodono, Sidoarjo','3515143107750005','pemohon'),('PT MESIN KASIR ONLINE','Suci Aulia','031','5953333','34600600','','admmesinkasir@yahoo.com','','','administrasi'),('PT MESIN KASIR ONLINE','Suci Aulia','031','5953333','34600600','','admmesinkasir@yahoo.com','','','penagihan'),('PT MESIN KASIR ONLINE','Alief','','','08563007242','','ssmesinkasir@yahoo.com','','','setup/teknis'),('PT MESIN KASIR ONLINE','Alief','','','08563007242','','ssmesinkasir@yahoo.com','','','support/teknis'),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ','Daniel Pranoto','031','71123338','','','','','','pemohon'),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ','Wena Dwi Wijayani','031','71859689','','','','','','administrasi'),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ','Wena Dwi Wijayani','031','71859689','','','','','','penagihan'),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ','Wena Dwi Wijayani','031','71859689','','','','','','setup/teknis'),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ','Wena Dwi Wijayani','031','71859689','','','','','','support/teknis'),('IRWANTO ALIM','Irwanto Alim','031','7406399','','','ialim84@yahoo.com','Jl.MH Thamrin 66 Tegalsari, Surabaya','12.5612.200184.0012','pemohon'),('IRWANTO ALIM','Cik Aylen','031','3530333','08165431618','','satria@maspion.com','','','administrasi'),('IRWANTO ALIM','Cik Aylen','031','3530333','08165431618','','satria@maspion.com','','','penagihan'),('IRWANTO ALIM','Irwanto Alim','031','7406399','','','ialim84@yahoo.com','Jl.MH Thamrin 66 Tegalsari, Surabaya','12.5612.200184.0012','setup/teknis'),('IRWANTO ALIM','Irwanto Alim','031','7406399','','','ialim84@yahoo.com','Jl.MH Thamrin 66 Tegalsari, Surabaya','12.5612.200184.0012','support/teknis'),('SEVEN WORLD TOURS','David Harianto','','','0811322269','','mgds2003@yahoo.com','Kupang Baru 1/138 Rt 07 RW 05 Kel.Son Kwijenan Kec.Sukomanunggal, Surabaya','3578271011690004','pemohon'),('SEVEN WORLD TOURS','David Harianto','','','0811322269','','mgds2003@yahoo.com','Kupang Baru 1/138 Rt 07 RW 05 Kel.Son Kwijenan Kec.Sukomanunggal, Surabaya','3578271011690004','administrasi'),('SEVEN WORLD TOURS','David Harianto','','','0811322269','','mgds2003@yahoo.com','Kupang Baru 1/138 Rt 07 RW 05 Kel.Son Kwijenan Kec.Sukomanunggal, Surabaya','3578271011690004','penagihan'),('SEVEN WORLD TOURS','Agus','','','0811322269','','mgds2003@yahoo.com','','','setup/teknis'),('SEVEN WORLD TOURS','Agus','','','0811322269','','mgds2003@yahoo.com','','','support/teknis'),('PT KURNIA ANGGUN','Sebastian Tigran Gazali','0321','595604','','','sebastian@kurniaanggun.com','Margorejo Indah A-704 Kel.Margorejo Kec.Wonocolo, Surabya','12.5618.130873.0001','pemohon'),('PT KURNIA ANGGUN','Nanik','0321','595604','','','','','','administrasi'),('PT KURNIA ANGGUN','Nanik','0321','595604','','','','','','penagihan'),('PT KURNIA ANGGUN','Sebastian Tigran Gazali','0321','595604','','','sebastian@kurniaanggun.com','Margorejo Indah A-704 Kel.Margorejo Kec.Wonocolo, Surabya','12.5618.130873.0001','setup/teknis'),('PT KURNIA ANGGUN','Sebastian Tigran Gazali','0321','595604','','','sebastian@kurniaanggun.com','Margorejo Indah A-704 Kel.Margorejo Kec.Wonocolo, Surabya','12.5618.130873.0001','support/teknis'),('PT KURNIA ANGGUN','Sebastian Tigran Gazali','0321','595604','','','sebastian@kurniaanggun.com','Margorejo Indah A-704 Kel.Margorejo Kec.Wonocolo, Surabaya','12.5618.130873.0001','pemohon'),('PT KURNIA ANGGUN','Sebastian Tigran Gazali','0321','595604','','','sebastian@kurniaanggun.com','Margorejo Indah A-704 Kel.Margorejo Kec.Wonocolo, Surabaya','12.5618.130873.0001','setup/teknis'),('PT KURNIA ANGGUN','Sebastian Tigran Gazali','0321','595604','','','sebastian@kurniaanggun.com','Margorejo Indah A-704 Kel.Margorejo Kec.Wonocolo, Surabaya','12.5618.130873.0001','support/teknis'),('PT KURNIA ANGGUN','Nanik','0321','593085','591341','','','','','administrasi'),('PT KURNIA ANGGUN','Nanik','0321','593085','591341','','','','','penagihan'),('SMK MUHAMMADIYAH 1 GRESIK','Drs.M.Matfuh','','','08121662780','','smkmutu@live.com','Dsn.Bungah RT 09 RW 03 KelBungah Kec.Bungah, Gresik','352512.040664.0003','pemohon'),('SMK MUHAMMADIYAH 1 GRESIK','Drs.M.Matfuh','','','08121662780','','smkmutu@live.com','Dsn.Bungah RT 09 RW 03 KelBungah Kec.Bungah, Gresik','352512.040664.0003','administrasi'),('SMK MUHAMMADIYAH 1 GRESIK','Drs.M.Matfuh','','','08121662780','','smkmutu@live.com','Dsn.Bungah RT 09 RW 03 KelBungah Kec.Bungah, Gresik','352512.040664.0003','penagihan'),('SMK MUHAMMADIYAH 1 GRESIK','Drs.M.Matfuh','','','08121662780','','smkmutu@live.com','Dsn.Bungah RT 09 RW 03 KelBungah Kec.Bungah, Gresik','352512.040664.0003','setup/teknis'),('SMK MUHAMMADIYAH 1 GRESIK','Hendra Ari Winarno','','','081703003666','','arindbalthazar@yahoo.com','','','support/teknis'),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)','Raymond Siarta','031','7490256','','','lojingti2000@mac.com','Kutai 60 RT 11 RW 06 Kel.Darmo Kec.Wonokromo, Surabaya','3578043001780001','pemohon'),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)','Raymond Siarta','031','7490256','','','lojingti2000@mac.com','Kutai 60 RT 11 RW 06 Kel.Darmo Kec.Wonokromo, Surabaya','3578043001780001','administrasi'),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)','Raymond Siarta','031','7490256','','','lojingti2000@mac.com','Kutai 60 RT 11 RW 06 Kel.Darmo Kec.Wonokromo, Surabaya','3578043001780001','penagihan'),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)','Raymond Siarta','031','7490256','','','lojingti2000@mac.com','Kutai 60 RT 11 RW 06 Kel.Darmo Kec.Wonokromo, Surabaya','3578043001780001','support/teknis'),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)','Edmund','031','7490256','','','','','','setup/teknis'),('PT RAPINDO PLASTAMA','Iddent Chong','','','08158787878','','iddent@rapindoplastama.com','Vikamas Raya Blok B.IV No.20 RT 07 RW 05 Kel.Kapuk Muara Kec.Penjaringan, Jakarta Utara','09.5102.210480.4031','pemohon'),('PT RAPINDO PLASTAMA','Iddent Chong','','','08158787878','','iddent@rapindoplastama.com','Vikamas Raya Blok B.IV No.20 RT 07 RW 05 Kel.Kapuk Muara Kec.Penjaringan, Jakarta Utara','09.5102.210480.4031','administrasi'),('PT RAPINDO PLASTAMA','Iddent Chong','','','08158787878','','iddent@rapindoplastama.com','Vikamas Raya Blok B.IV No.20 RT 07 RW 05 Kel.Kapuk Muara Kec.Penjaringan, Jakarta Utara','09.5102.210480.4031','penagihan'),('PT RAPINDO PLASTAMA','Iddent Chong','','','08158787878','','iddent@rapindoplastama.com','Vikamas Raya Blok B.IV No.20 RT 07 RW 05 Kel.Kapuk Muara Kec.Penjaringan, Jakarta Utara','09.5102.210480.4031','setup/teknis'),('PT RAPINDO PLASTAMA','Iddent Chong','','','08158787878','','iddent@rapindoplastama.com','Vikamas Raya Blok B.IV No.20 RT 07 RW 05 Kel.Kapuk Muara Kec.Penjaringan, Jakarta Utara','09.5102.210480.4031','support/teknis'),('CV MANDIRI UNICANE','Yulius Wibowo','031','7993281','','','yulius@unicane.com','Bukit Palma Blok F-3/5 RT 07 RW 04 Kel.Babat Jerawat Kec.Pakal, Surabaya','12.5617.280580.0002','pemohon'),('CV MANDIRI UNICANE','Ria Purwanti','031','7993281','081553007797','','mu@unicane.com','','','administrasi'),('CV MANDIRI UNICANE','M.Irsan','031','7993281','','','','','','penagihan'),('CV MANDIRI UNICANE','Sonny Tjiang','031','7993281','08155008666','','sonny@unicane.com','','','setup/teknis'),('CV MANDIRI UNICANE','Sonny Tjiang','031','7993281','08155008666','','sonny@unicane.com','','','support/teknis'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','pemohon'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','administrasi'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','penagihan'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','setup/teknis'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','support/teknis'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budiloe@rad.net.id; budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','pemohon'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budiloe@rad.net.id; budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','administrasi'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budiloe@rad.net.id; budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','penagihan'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budiloe@rad.net.id; budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','setup/teknis'),('BUDI LOEKITO','Budi Loekito','','','0811304301','','budiloe@rad.net.id; budi.loekito@wingsfood.com','Jl.Raya Jemursari No.98 Surabaya','12.5604.240254.0001','support/teknis'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','','','081230159999','','t30rudy@gmail.com','Royal Residence C1/39 Wiyung, Surabaya','3578100812780015','pemohon'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','','','081230159999','','t30rudy@gmail.com','Royal Residence C1/39 Wiyung, Surabaya','3578100812780015','administrasi'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','','','081230159999','','t30rudy@gmail.com','Royal Residence C1/39 Wiyung, Surabaya','3578100812780015','penagihan'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','','','081230159999','','t30rudy@gmail.com','Royal Residence C1/39 Wiyung, Surabaya','3578100812780015','support/teknis'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','','','081230159999','','t30rudy@gmail.com','Royal Residence C1/39 Wiyung, Surabaya','3578100812780015','setup/teknis'),('PT HASWIN HIJAU PERKASA','Lim Suat Nee','031','83052323','','','veronica@hockaik.com','','2C11CD0539-K','pemohon'),('PT HASWIN HIJAU PERKASA','Chen Chen','031','7324006 ext 307','','','','','','administrasi'),('PT HASWIN HIJAU PERKASA','Chen Chen','031','7324006 ext 307','','','','','','penagihan'),('PT HASWIN HIJAU PERKASA','Christian','031','60749777','','','','','','setup/teknis'),('PT HASWIN HIJAU PERKASA','Christian','031','60749777','','','','','','support/teknis'),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)','Moch. Farid Ridwan','031','60835272','','','mf4121dr@gmail.com','Wonorejo 4/106 RT 04 RW 06 Kel.Wonorejo Kec.Tegalsari, Surabaya','3578050403770001','pemohon'),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)','Moch. Farid Ridwan','031','60835272','','','mf4121dr@gmail.com','Wonorejo 4/106 RT 04 RW 06 Kel.Wonorejo Kec.Tegalsari, Surabaya','3578050403770001','administrasi'),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)','Moch. Farid Ridwan','031','60835272','','','mf4121dr@gmail.com','Wonorejo 4/106 RT 04 RW 06 Kel.Wonorejo Kec.Tegalsari, Surabaya','3578050403770001','setup/teknis'),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)','Moch. Farid Ridwan','031','60835272','','','mf4121dr@gmail.com','Wonorejo 4/106 RT 04 RW 06 Kel.Wonorejo Kec.Tegalsari, Surabaya','3578050403770001','support/teknis'),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)','Cherly Juliardi','031','8543111','','','','','','penagihan'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumanpauw','031','7497666','70100166','7315315','arthur.lumanpauw@gmail.com','Jl.HR.Muhammad No.374 Surabaya','12.5628.060762.0001','pemohon'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumanpauw','031','7497666','70100166','7315315','arthur.lumanpauw@gmail.com','Jl.HR.Muhammad No.374 Surabaya','12.5628.060762.0001','administrasi'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumanpauw','031','7497666','70100166','7315315','arthur.lumanpauw@gmail.com','Jl.HR.Muhammad No.374 Surabaya','12.5628.060762.0001','penagihan'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumanpauw','031','7497666','70100166','7315315','arthur.lumanpauw@gmail.com','Jl.HR.Muhammad No.374 Surabaya','12.5628.060762.0001','setup/teknis'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','Arthur Lumanpauw','031','7497666','70100166','7315315','arthur.lumanpauw@gmail.com','Jl.HR.Muhammad No.374 Surabaya','12.5628.060762.0001','support/teknis'),('UD BERKAT JAYA','Loe Chiu Man','031','60488839','081933757888','','ibi_truss@yahoo.com','Jl.Nanas V/518 PCI RT 03 RW 06 Tambakrejo Kec.Waru ','12.14.14.690466.0004','pemohon'),('UD BERKAT JAYA','Amanda','031','604888839','','','','','','administrasi'),('UD BERKAT JAYA','Amanda','031','604888839','','','','','','penagihan'),('UD BERKAT JAYA','Yeyen','','','087851785044','','','','','setup/teknis'),('UD BERKAT JAYA','Yeyen','','','087851785044','','','','','support/teknis'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Ngagel Jaya Selatan 103 Surabaya','3578082004770001','pemohon'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Ngagel Jaya Selatan 103 Surabaya','3578082004770001','administrasi'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Ngagel Jaya Selatan 103 Surabaya','3578082004770001','penagihan'),('PT.BILKA','Jimmy','','','0818523347','','','','','setup/teknis'),('PT.BILKA','Jimmy','','','0818523347','','','','','support/teknis'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Jl.Ngagel Jaya Selatan 103 Surabaya','3578082004770001','pemohon'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Jl.Ngagel Jaya Selatan 103 Surabaya','3578082004770001','penagihan'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Jl.Ngagel Jaya Selatan 103 Surabaya','3578082004770001','administrasi'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Jl.Ngagel Jaya Selatan 103 Surabaya','3578082004770001','setup/teknis'),('PT.BILKA','Donny Kurniawan','','','08155299999','','donny2004@gmail.com','Jl.Ngagel Jaya Selatan 103 Surabaya','3578082004770001','support/teknis'),('PT BINTANG RUBERINDO','Umar Dianata','031','3959789','081331868789','','','Komp.Bintang Diponggo Kav 738 Surabaya','12.5616.101145.0001','pemohon'),('PT BINTANG RUBERINDO','Umar Dianata','031','3959789','081331868789','','','Komp.Bintang Diponggo Kav 738 Surabaya','12.5616.101145.0001','administrasi'),('PT BINTANG RUBERINDO','Umar Dianata','031','3959789','081331868789','','','Komp.Bintang Diponggo Kav 738 Surabaya','12.5616.101145.0001','penagihan'),('PT BINTANG RUBERINDO','Umar Dianata','031','3959789','081331868789','','','Komp.Bintang Diponggo Kav 738 Surabaya','12.5616.101145.0001','setup/teknis'),('PT BINTANG RUBERINDO','Umar Dianata','031','3959789','081331868789','','','Komp.Bintang Diponggo Kav 738 Surabaya','12.5616.101145.0001','support/teknis'),('MENARAMEGAH (Mr. Yuliansun)','Yuliansun Harjanto','031','60772771','08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','pemohon'),('MENARAMEGAH (Mr. Yuliansun)','Yuliansun Harjanto','031','60772771','08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','penanggungjawab'),('MENARAMEGAH (Mr. Yuliansun)','Yuliansun Harjanto','031','60772771','08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','administrasi'),('MENARAMEGAH (Mr. Yuliansun)','Yuliansun Harjanto','031','60772771','08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','support/teknis'),('MENARAMEGAH (Mr. Yuliansun)','Yuliansun Harjanto','031','60772771','08165405198','','yuliansunh@hotmail.com','Jl. Selangor No. 8, Surabaya','','penagihan'),('PT. TRENDWOOD','Trio Susanto','031','7345100-102','081703096999','','trend@sby.dnet.net.id','Jl. Raya Darmo Permai Selatan Gg. 3 D/A Plasa segi 8 D-816, Surabaya','','pemohon'),('PT. TRENDWOOD','Trio Susanto','031','7345100-102','081703096999','','trend@sby.dnet.net.id','Jl. Raya Darmo Permai Selatan Gg. 3 D/A Plasa segi 8 D-816, Surabaya','','penanggungjawab'),('PT. TRENDWOOD','Trio Susanto','031','7345100-102','081703096999','','trend@sby.dnet.net.id','Jl. Raya Darmo Permai Selatan Gg. 3 D/A Plasa segi 8 D-816, Surabaya','','administrasi'),('PT. TRENDWOOD','Trio Susanto','031','7345100-102','081703096999','','trend@sby.dnet.net.id','Jl. Raya Darmo Permai Selatan Gg. 3 D/A Plasa segi 8 D-816, Surabaya','','support/teknis'),('PT. TRENDWOOD','Trio Susanto','031','7345100-102','081703096999','','trend@sby.dnet.net.id','Jl. Raya Darmo Permai Selatan Gg. 3 D/A Plasa segi 8 D-816, Surabaya','','penagihan'),('GMII FILIPI JAKARTA','Thomas Balthazar','021','4702369','08123208712','','t_balthazar@yahoo.com','Jl. Kayu Mas Tengah 5/10A, Pulo Gadung, Jakarta','','pemohon'),('GMII FILIPI JAKARTA','Thomas Balthazar','021','4702369','08123208712','','t_balthazar@yahoo.com','Jl. Kayu Mas Tengah 5/10A, Pulo Gadung, Jakarta','','penanggungjawab'),('GMII FILIPI JAKARTA','Thomas Balthazar','021','4702369','08123208712','','t_balthazar@yahoo.com','Jl. Kayu Mas Tengah 5/10A, Pulo Gadung, Jakarta','','administrasi'),('GMII FILIPI JAKARTA','Thomas Balthazar','021','4702369','08123208712','','t_balthazar@yahoo.com','Jl. Kayu Mas Tengah 5/10A, Pulo Gadung, Jakarta','','support/teknis'),('GMII FILIPI JAKARTA','Thomas Balthazar','021','4702369','08123208712','','t_balthazar@yahoo.com','Jl. Kayu Mas Tengah 5/10A, Pulo Gadung, Jakarta','','penagihan'),('SWADAYA GRAHA, PT','Ferry William T.','031','3984477','081330602259','','ferry_wt@swadayagraha.com','Jl. R.A Kartini No. 25, Gresik','','pemohon'),('SWADAYA GRAHA, PT','Ferry William T.','031','3984477','081330602259','','ferry_wt@swadayagraha.com','Jl. R.A Kartini No. 25, Gresik','','penanggungjawab'),('SWADAYA GRAHA, PT','Ferry William T.','031','3984477','081330602259','','ferry_wt@swadayagraha.com','Jl. R.A Kartini No. 25, Gresik','','administrasi'),('SWADAYA GRAHA, PT','Ferry William T.','031','3984477','081330602259','','ferry_wt@swadayagraha.com','Jl. R.A Kartini No. 25, Gresik','','penagihan'),('SWADAYA GRAHA, PT','Ferry William T.','031','3984477','081330602259','','ferry_wt@swadayagraha.com','Jl. R.A Kartini No. 25, Gresik','','support/teknis'),('JAVA PARAGON HOTEL & RESIDENCES','Tenny Reinhard Paulus Kolanus','031','5621234','92268909','','itm@javaparagon.com','Jl. Mayjend Sungkono No. 101-103, Surabaya','','pemohon'),('JAVA PARAGON HOTEL & RESIDENCES','Tenny Reinhard Paulus Kolanus','031','5621234','92268909','','itm@javaparagon.com','Jl. Mayjend Sungkono No. 101-103, Surabaya','','penanggungjawab'),('JAVA PARAGON HOTEL & RESIDENCES','Tenny Reinhard Paulus Kolanus','031','5621234','92268909','','itm@javaparagon.com','Jl. Mayjend Sungkono No. 101-103, Surabaya','','administrasi'),('JAVA PARAGON HOTEL & RESIDENCES','Tenny Reinhard Paulus Kolanus','031','5621234','92268909','','itm@javaparagon.com','Jl. Mayjend Sungkono No. 101-103, Surabaya','','support/teknis'),('JAVA PARAGON HOTEL & RESIDENCES','Tenny Reinhard Paulus Kolanus','031','5621234','92268909','','itm@javaparagon.com','Jl. Mayjend Sungkono No. 101-103, Surabaya','','penagihan'),('KETUT ARIANA','Ketut Ariana','031','5616330','08123585124','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','pemohon'),('KETUT ARIANA','Ketut Ariana','031','5616330','08123585124','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penanggungjawab'),('KETUT ARIANA','Ketut Ariana','031','5616330','08123585124','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','administrasi'),('KETUT ARIANA','Ketut Ariana','031','5616330','08123585124','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','penagihan'),('KETUT ARIANA','Ketut Ariana','031','5616330','08123585124','','ketut@padi.net.id','Jl. Mayjend Sungkono No. 83, Surabaya','','support/teknis'),('ONE TEAM GLOBAL','Roy Dwi Saputra','021','','0818924368','','roy.saputra@gmail.com','Jl. Mayjend DI Pandjaitan Kav. 73, Jakarta','','pemohon'),('ONE TEAM GLOBAL','Roy Dwi Saputra','021','','0818924368','','roy.saputra@gmail.com','Jl. Mayjend DI Pandjaitan Kav. 73, Jakarta','','penanggungjawab'),('ONE TEAM GLOBAL','Roy Dwi Saputra','021','','0818924368','','roy.saputra@gmail.com','Jl. Mayjend DI Pandjaitan Kav. 73, Jakarta','','administrasi'),('ONE TEAM GLOBAL','Roy Dwi Saputra','021','','0818924368','','roy.saputra@gmail.com','Jl. Mayjend DI Pandjaitan Kav. 73, Jakarta','','penagihan'),('ONE TEAM GLOBAL','Roy Dwi Saputra','021','','0818924368','','roy.saputra@gmail.com','Jl. Mayjend DI Pandjaitan Kav. 73, Jakarta','','support/teknis'),('GRAHA MULTI BINTANG, PT','Budi Setiadi','031','7494116 / 7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok i No. 2, Surabaya','','pemohon'),('GRAHA MULTI BINTANG, PT','Budi Setiadi','031','7494116 / 7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok i No. 2, Surabaya','','penanggungjawab'),('GRAHA MULTI BINTANG, PT','Budi Setiadi','031','7494116 / 7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok i No. 2, Surabaya','','administrasi'),('GRAHA MULTI BINTANG, PT','Budi Setiadi','031','7494116 / 7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok i No. 2, Surabaya','','penagihan'),('GRAHA MULTI BINTANG, PT','Budi Setiadi','031','7494116 / 7493808','08175299990','','nicolasbudi@yahoo.com; nicolasbudi@gmail.com','Jl. Tambak Langon Indah Blok i No. 2, Surabaya','','support/teknis'),('WISMILAK','Wiwid Wijanarka','031','2952828','083857822226','','wiwid.wijanarka@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','administrasi'),('WISMILAK','Wiwid Wijanarka','031','2952828','083857822226','','wiwid.wijanarka@wismilak.com','Jl. Dr. Soetomo No. 27, Surabaya','','support/teknis'),('RSK SUMBER GLAGAH PACET','Kuntoro','0321','690441','081559645832','','bambangkw@gmail.com','Jl. Sumber Glagah Pacet, Mojokerto','','pemohon'),('RSK SUMBER GLAGAH PACET','Kuntoro','0321','690441','081559645832','','bambangkw@gmail.com','Jl. Sumber Glagah Pacet, Mojokerto','','penanggungjawab'),('RSK SUMBER GLAGAH PACET','Kuntoro','0321','690441','081559645832','','bambangkw@gmail.com','Jl. Sumber Glagah Pacet, Mojokerto','','administrasi'),('RSK SUMBER GLAGAH PACET','Kuntoro','0321','690441','081559645832','','bambangkw@gmail.com','Jl. Sumber Glagah Pacet, Mojokerto','','penagihan'),('RSK SUMBER GLAGAH PACET','Kuntoro','0321','690441','081559645832','','bambangkw@gmail.com','Jl. Sumber Glagah Pacet, Mojokerto','','support/teknis'),('PT. KENDALI PARAMITA','Eko Prasetyo','021','6500691','0811153431','','praseko@kendali.co.id','Komplek Griya Inti Sentosa Jl. Griya Agung Blok N3/42, Sunter Agung, Jakarta Utara','','pemohon'),('PT. KENDALI PARAMITA','Duma Simatupang','021','6500691','08129561259','','duma@kendali.co.id','Komplek Griya Inti Sentosa Jl. Griya Agung Blok N3/42, Sunter Agung, Jakarta Utara','','administrasi'),('PT. KENDALI PARAMITA','Duma Simatupang','021','6500691','08129561259','','duma@kendali.co.id','Komplek Griya Inti Sentosa Jl. Griya Agung Blok N3/42, Sunter Agung, Jakarta Utara','','penagihan'),('PT. KENDALI PARAMITA','Duma Simatupang','021','6500691','08129561259','','duma@kendali.co.id','Komplek Griya Inti Sentosa Jl. Griya Agung Blok N3/42, Sunter Agung, Jakarta Utara','','support/teknis'),('PT. KENDALI PARAMITA','Eko Prasetyo','021','6500691','0811153431','','praseko@kendali.co.id','Komplek Griya Inti Sentosa Jl. Griya Agung Blok N3/42, Sunter Agung, Jakarta Utara','','penanggungjawab'),('CV. JASATECH INFORMATIKA','Jimmy Pangestu','031','3575523','081332179392','','jimmy.pangestu@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','pemohon'),('CV. JASATECH INFORMATIKA','Jimmy Pangestu','031','3575523','081332179392','','jimmy.pangestu@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','penanggungjawab'),('CV. JASATECH INFORMATIKA','Andry Kosasih','031','3575523','08123042488','','andry.kosasih@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','administrasi'),('CV. JASATECH INFORMATIKA','Andry Kosasih','031','3575523','08123042488','','andry.kosasih@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','penagihan'),('CV. JASATECH INFORMATIKA','Andry Kosasih','031','3575523','08123042488','','andry.kosasih@javaconsulting.co.id','Jl. Merak No. 12, Surabaya','','support/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Kupang Indah I/3 Surabaya ','12.5811.091262.0001','pemohon'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul','031','7346901','03170272733','','aditia_unggul@gloriaschool.org','Kupang Indah I/3 Surabaya ','','setup/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Wiwid','031','7346901','','','','Kupang Indah I/3 Surabaya ','','administrasi'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Rebecca ','031','7346901','','','','','','penagihan'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Kupang Indah I/3 Surabaya ','12.5811.091262.0001','penanggungjawab'),('CV. TRISTAR CHEMICALS','Juwono','031','8708071','0818317828','','tristarchemical@yahoo.co.id','Jl. Rungkut Mapan Utara Blok CA No. 24, Surabaya','','pemohon'),('CV. TRISTAR CHEMICALS','Juwono','031','8708071','0818317828','','tristarchemical@yahoo.co.id','Jl. Rungkut Mapan Utara Blok CA No. 24, Surabaya','','penanggungjawab'),('CV. TRISTAR CHEMICALS','Irfan','031','8708071','085731051010','','tristarchemical@yahoo.co.id','Jl. Rungkut Mapan Utara Blok CA No. 24, Surabaya','','administrasi'),('CV. TRISTAR CHEMICALS','Irfan','031','8708071','085731051010','','tristarchemical@yahoo.co.id','Jl. Rungkut Mapan Utara Blok CA No. 24, Surabaya','','penagihan'),('CV. TRISTAR CHEMICALS','Irfan','031','8708071','085731051010','','tristarchemical@yahoo.co.id','Jl. Rungkut Mapan Utara Blok CA No. 24, Surabaya','','support/teknis'),('PT. DEMACITRA INTERNUSA','George Benny Lumanto','021','4516835','0811329223','','demaworld@cbn.net.id','Gading Marina 3rd Floor #301. Jl. Raya Boulevard Barat No. 1, Kelapa Gading, Jakarta Utara','','pemohon'),('PT. DEMACITRA INTERNUSA','George Benny Lumanto','021','4516835','0811329223','','demaworld@cbn.net.id','Gading Marina 3rd Floor #301. Jl. Raya Boulevard Barat No. 1, Kelapa Gading, Jakarta Utara','','penanggungjawab'),('PT. DEMACITRA INTERNUSA','Sisca','021','4516835','08179929029','','sisca@demaworld.com','Gading Marina 3rd Floor #301. Jl. Raya Boulevard Barat No. 1, Kelapa Gading, Jakarta Utara','','administrasi'),('PT. DEMACITRA INTERNUSA','Sisca','021','4516835','08179929029','','sisca@demaworld.com','Gading Marina 3rd Floor #301. Jl. Raya Boulevard Barat No. 1, Kelapa Gading, Jakarta Utara','','penagihan'),('PT. DEMACITRA INTERNUSA','Sisca','021','4516835','08179929029','','sisca@demaworld.com','Gading Marina 3rd Floor #301. Jl. Raya Boulevard Barat No. 1, Kelapa Gading, Jakarta Utara','','support/teknis'),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES','Cipsi','031','7507021','70606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20, Gresik','','pemohon'),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES','Cipsi','031','7507021','70606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20, Gresik','','penanggungjawab'),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES','Cipsi','031','7507021','70606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20, Gresik','','administrasi'),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES','Cipsi','031','7507021','70606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20, Gresik','','penagihan'),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES','Cipsi','031','7507021','70606199','','cipsi@wimcycle.biz','Jl. Raya Bambe KM 20, Gresik','','support/teknis'),('PT. EVARINDO MEGA MAKMUR','Adi Soetrisno','0343','856633','031-70596668','','evarindo@gmail.com','Jl. Raya Ngerong KM 41, Gempol, Pasuruan','12.5616.100374.0002','pemohon'),('PT. EVARINDO MEGA MAKMUR','Adi Soetrisno','0343','856633','031-70596668','','evarindo@gmail.com','Jl. Raya Ngerong KM 41, Gempol, Pasuruan','12.5616.100374.0002','penanggungjawab'),('PT. EVARINDO MEGA MAKMUR','Rini S','0343','856633','','','evarindo@gmail.com','Jl. Raya Ngerong KM 41, Gempol, Pasuruan','','administrasi'),('PT. EVARINDO MEGA MAKMUR','Rini S','0343','856633','','','evarindo@gmail.com','Jl. Raya Ngerong KM 41, Gempol, Pasuruan','','penagihan'),('PT. EVARINDO MEGA MAKMUR','Rini S','0343','856633','','','evarindo@gmail.com','Jl. Raya Ngerong KM 41, Gempol, Pasuruan','','support/teknis'),('CV. GLOBAL LOGISTIC','Bahagiyanto','031','8284108','031-70092249','','antok@global-surabaya.com','Jl. Kebonsari 3 No. 11A, Surabaya','','pemohon'),('CV. GLOBAL LOGISTIC','Bahagiyanto','031','8284108','031-70092249','','antok@global-surabaya.com','Jl. Kebonsari 3 No. 11A, Surabaya','','penanggungjawab'),('CV. GLOBAL LOGISTIC','Bu Sulis','031','8284108','','','ops@global-surabaya.com','Jl. Kebonsari 3 No. 11A, Surabaya','','administrasi'),('CV. GLOBAL LOGISTIC','Bu Sulis','031','8284108','','','ops@global-surabaya.com','Jl. Kebonsari 3 No. 11A, Surabaya','','penagihan'),('CV. GLOBAL LOGISTIC','Bu Sulis','031','8284108','','','ops@global-surabaya.com','Jl. Kebonsari 3 No. 11A, Surabaya','','support/teknis'),('ADHI KARYA, PT','Gani Sudirman','031','8290910','','','gani_ak@yahoo.co.id','Jl. Gayung Kebonsari 167A, Surabaya','','pemohon'),('ADHI KARYA, PT','Gani Sudirman','031','8290910','','','gani_ak@yahoo.co.id','Jl. Gayung Kebonsari 167A, Surabaya','','penanggungjawab'),('ADHI KARYA, PT','Gani Sudirman','031','8290910','','','gani_ak@yahoo.co.id','Jl. Gayung Kebonsari 167A, Surabaya','','administrasi'),('ADHI KARYA, PT','Gani Sudirman','031','8290910','','','gani_ak@yahoo.co.id','Jl. Gayung Kebonsari 167A, Surabaya','','penagihan'),('ADHI KARYA, PT','Gani Sudirman','031','8290910','','','gani_ak@yahoo.co.id','Jl. Gayung Kebonsari 167A, Surabaya','','support/teknis'),('PT. LIGHTING SOLUTION','Linggaryani Sarwono','031','8687000','81269297','','solution@rad.net.id','Jl. Berbek Industri VII/17-19, Surabaya','','pemohon'),('PT. LIGHTING SOLUTION','Linggaryani Sarwono','031','8687000','81269297','','solution@rad.net.id','Jl. Berbek Industri VII/17-19, Surabaya','','penanggungjawab'),('PT. LIGHTING SOLUTION','Freddy A.','031','8687000','','','the.lightingsolution.company@gmail.com','Jl. Berbek Industri VII/17-19, Surabaya','','support/teknis'),('PT. LIGHTING SOLUTION','Freddy A.','031','8687000','','','the.lightingsolution.company@gmail.com','Jl. Berbek Industri VII/17-19, Surabaya','','administrasi'),('PT. LIGHTING SOLUTION','Freddy A.','031','8687000','','','the.lightingsolution.company@gmail.com','Jl. Berbek Industri VII/17-19, Surabaya','','penagihan'),(' BINTANG LIMA, PT','Dhea Buyung Piliang','0341','529448','083834284824','','dhea.piliang@gmail.com','Jl. Gajahmada 2 No. 13, Batu, Malang','','pemohon'),(' BINTANG LIMA, PT','Dhea Buyung Piliang','0341','529448','083834284824','','dhea.piliang@gmail.com','Jl. Gajahmada 2 No. 13, Batu, Malang','','penanggungjawab'),(' BINTANG LIMA, PT','Dhea Buyung Piliang','0341','529448','083834284824','','dhea.piliang@gmail.com','Jl. Gajahmada 2 No. 13, Batu, Malang','','administrasi'),(' BINTANG LIMA, PT','Dhea Buyung Piliang','0341','529448','083834284824','','dhea.piliang@gmail.com','Jl. Gajahmada 2 No. 13, Batu, Malang','','penagihan'),(' BINTANG LIMA, PT','Dhea Buyung Piliang','0341','529448','083834284824','','dhea.piliang@gmail.com','Jl. Gajahmada 2 No. 13, Batu, Malang','','support/teknis'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23','','pemohon'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23','','penanggungjawab'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23','','administrasi'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23','','penagihan'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23','','support/teknis'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','pemohon'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','penanggungjawab'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','administrasi'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','penagihan'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','71385361','0811322525','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','support/teknis'),('PT INTEGRA ASP','Manuel D.Irwanputera','021','57941919','08161895988','','manuel@integraasp.com','Green Ville A/41 RT 003 RW 009 Kel.Duri Kepa Kec.Kebon Jeruk, Jakarta Barat','3173050609750012','pemohon'),('PT INTEGRA ASP','Suparto','021','57941919','0811873368','','ato@integraasp.com','','','administrasi'),('PT INTEGRA ASP','Suparto','021','57941919','0811873368','','ato@integraasp.com','','','penagihan'),('PT INTEGRA ASP','Reyno Andriano','021','57941919','0817539333','','reyno@integraasp.com','','','setup/teknis'),('PT INTEGRA ASP','Nanang A Rofiq','021','57941919','','','rofiq@integraasp.com','','','support/teknis'),('YOGI GUNAWAN','Yogi gunawan ','031','','0811377177','','kemenangan777@hotmail.com','Perum Royal Residence B-8 /107 Surabaya ','12.5628.050579.0001','pemohon'),('YOGI GUNAWAN','Yogi gunawan ','031','','0811377177','','kemenangan777@hotmail.com','Perum Royal Residence B-8 /107 Surabaya ','12.5628.050579.0001','penagihan'),('YOGI GUNAWAN','Yogi gunawan ','031','','0811377177','','kemenangan777@hotmail.com','Perum Royal Residence B-8 /107 Surabaya ','12.5628.050579.0001','support/teknis'),('YOGI GUNAWAN','Yogi gunawan ','031','','0811377177','','kemenangan777@hotmail.com','Perum Royal Residence B-8 /107 Surabaya ','12.5628.050579.0001','penanggungjawab'),('MULTIPLAST INDO MAKMUR, PT','Steven Jundika','031','0315030450','03191015338','03191015338','steven@suryasukses.com','','','pemohon'),('MULTIPLAST INDO MAKMUR, PT','Steven Jundika','031','0315030450','03191015338','03191015338','steven@suryasukses.com','','','administrasi'),('MULTIPLAST INDO MAKMUR, PT','Steven Jundika','031','0315030450','03191015338','03191015338','steven@suryasukses.com','','','setup/teknis'),('MULTIPLAST INDO MAKMUR, PT','Steven Jundika','031','0315030450','03191015338','03191015338','steven@suryasukses.com','','','support/teknis'),('MULTIPLAST INDO MAKMUR, PT','Chen Chen','031','0315030450','','','chenchen@suryasukses.com','','','penagihan'),('MULTIPLAST INDO MAKMUR, PT','Ongko Wardjojo','031','0315030450','','','info@suryasukses.com','','','penanggungjawab'),('GLOBAL TRADING SOLUTION, PT','Dwi Astutik','031','0315347525','081216531212','','info@globaltrading.com','','','pemohon'),('GLOBAL TRADING SOLUTION, PT','Dwi Astutik','031','0315347525','081216531212','','info@globaltrading.com','','','setup/teknis'),('GLOBAL TRADING SOLUTION, PT','Dwi Astutik','031','0315347525','081216531212','','info@globaltrading.com','','','penagihan'),('GLOBAL TRADING SOLUTION, PT','Dwi Astutik','031','0315347525','081216531212','','info@globaltrading.com','','','support/teknis'),('GLOBAL TRADING SOLUTION, PT','Tri Indayani','031','0315347525','','','yanie_0709@yahoo.com','','','penanggungjawab'),('TRIDJAYA KARTIKA, PT (MART POINT)','Yoyok Sigit Handrianto','031','0318493685','083849856888','','yoyoksigit358@gmail.com','','','pemohon'),('TRIDJAYA KARTIKA, PT (MART POINT)','Yoyok Sigit Handrianto','031','0318493685','083849856888','','yoyoksigit358@gmail.com','','','setup/teknis'),('TRIDJAYA KARTIKA, PT (MART POINT)','Yoyok Sigit Handrianto','031','0318493685','083849856888','','yoyoksigit358@gmail.com','','','support/teknis'),('TRIDJAYA KARTIKA, PT (MART POINT)','Ibu lolita','031','0318493685','','','','','','administrasi'),('TRIDJAYA KARTIKA, PT (MART POINT)','Ibu lolita','031','0318493685','','','','','','penagihan'),('TRIDJAYA KARTIKA, PT (MART POINT)','Ibu Jenny Said','031','0318493685','','','','','','penanggungjawab'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','71385361','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','pemohon'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','71385361','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','penanggungjawab'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','71385361','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','administrasi'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','71385361','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','support/teknis'),('EDWIN YAPETER','Edwin Yapeter','031','31227326','0811322525','71385361','hinpeter.2011@yahoo.com','Perumahan Graha Family Utara 2 / D-23, Surabaya','','penagihan'),('ERMA SUPPLIER','Verawati Maria','031','7535425','081216535051','','ermasupplier@yahoo.com','Lembah Harapan Blok S No. 7, Surabaya','','pemohon'),('ERMA SUPPLIER','Verawati Maria','031','7535425','081216535051','','ermasupplier@yahoo.com','Lembah Harapan Blok S No. 7, Surabaya','','penanggungjawab'),('ERMA SUPPLIER','Verawati Maria','031','7535425','081216535051','','ermasupplier@yahoo.com','Lembah Harapan Blok S No. 7, Surabaya','','administrasi'),('ERMA SUPPLIER','Verawati Maria','031','7535425','081216535051','','ermasupplier@yahoo.com','Lembah Harapan Blok S No. 7, Surabaya','','penagihan'),('ERMA SUPPLIER','Verawati Maria','031','7535425','081216535051','','ermasupplier@yahoo.com','Lembah Harapan Blok S No. 7, Surabaya','','support/teknis'),('CV. ARTHA BOOK CEMERLANG','I Dewa Made Sadiartha','021','5358994','0858088999','','made@plasabuku.com','Jl. H. Domang No. 19, Kelapa Dua-Kebon Jeruk, Jakarta Barat','','pemohon'),('CV. ARTHA BOOK CEMERLANG','I Dewa Made Sadiartha','021','5358994','0858088999','','made@plasabuku.com','Jl. H. Domang No. 19, Kelapa Dua-Kebon Jeruk, Jakarta Barat','','penanggungjawab'),('CV. ARTHA BOOK CEMERLANG','I Dewa Made Sadiartha','021','5358994','0858088999','','made@plasabuku.com','Jl. H. Domang No. 19, Kelapa Dua-Kebon Jeruk, Jakarta Barat','','administrasi'),('CV. ARTHA BOOK CEMERLANG','I Dewa Made Sadiartha','021','5358994','0858088999','','made@plasabuku.com','Jl. H. Domang No. 19, Kelapa Dua-Kebon Jeruk, Jakarta Barat','','penagihan'),('CV. ARTHA BOOK CEMERLANG','I Dewa Made Sadiartha','021','5358994','0858088999','','made@plasabuku.com','Jl. H. Domang No. 19, Kelapa Dua-Kebon Jeruk, Jakarta Barat','','support/teknis'),('PT. AGRIPRO INDONESIA','Johnson Lim','031','5353905','','','johnson@ptagripro.com','Jl. Raya Arjuno No. 95, Gedung Jiwa Sraya Lt. 4, Surabaya','','pemohon'),('PT. AGRIPRO INDONESIA','Johnson Lim','031','5353905','','','johnson@ptagripro.com','Jl. Raya Arjuno No. 95, Gedung Jiwa Sraya Lt. 4, Surabaya','','penanggungjawab'),('PT. AGRIPRO INDONESIA','Novi ','031','5353905','','','nopie_4@hotmail.com; finance@ptagripro.com','Jl. Raya Arjuno No. 95, Gedung Jiwa Sraya Lt. 4, Surabaya','','administrasi'),('PT. AGRIPRO INDONESIA','Novi ','031','5353905','','','nopie_4@hotmail.com; finance@ptagripro.com','Jl. Raya Arjuno No. 95, Gedung Jiwa Sraya Lt. 4, Surabaya','','penagihan'),('PT. AGRIPRO INDONESIA','Novi ','031','5353905','','','nopie_4@hotmail.com; finance@ptagripro.com','Jl. Raya Arjuno No. 95, Gedung Jiwa Sraya Lt. 4, Surabaya','','support/teknis'),('BANGUN ASRI PERSADA','Ir. Agus Sudarminto, MM.','031','8710050','081332037344','','agus.sudarminto@bangunasripersada.com','Jl. Medokan Asri Barat 6 MA 1-J, No. 29-30, Surabaya','','pemohon'),('BANGUN ASRI PERSADA','Ir. Agus Sudarminto, MM.','031','8710050','081332037344','','agus.sudarminto@bangunasripersada.com','Jl. Medokan Asri Barat 6 MA 1-J, No. 29-30, Surabaya','','penanggungjawab'),('BANGUN ASRI PERSADA','Eko Subagyo','031','8710050','','','eko@bangunasripersada.com','Jl. Medokan Asri Barat 6 MA 1-J, No. 29-30, Surabaya','','administrasi'),('BANGUN ASRI PERSADA','Eko Subagyo','031','8710050','','','eko@bangunasripersada.com','Jl. Medokan Asri Barat 6 MA 1-J, No. 29-30, Surabaya','','penagihan'),('BANGUN ASRI PERSADA','Eko Subagyo','031','8710050','','','eko@bangunasripersada.com','Jl. Medokan Asri Barat 6 MA 1-J, No. 29-30, Surabaya','','support/teknis'),('DINAS TENAGA KERJA KABUPATEN GRESIK','Drs. Kencono Subroto, MM.','031','3954041','08123082375','','disnaker.gresik@gmail.com','Jl. Dr. Wahidin Sudirohusodo No. 233, Gresik','','pemohon'),('DINAS TENAGA KERJA KABUPATEN GRESIK','Drs. Kencono Subroto, MM.','031','3954041','08123082375','','disnaker.gresik@gmail.com','Jl. Dr. Wahidin Sudirohusodo No. 233, Gresik','','penanggungjawab'),('DINAS TENAGA KERJA KABUPATEN GRESIK','Drs. Kencono Subroto, MM.','031','3954041','08123082375','','disnaker.gresik@gmail.com','Jl. Dr. Wahidin Sudirohusodo No. 233, Gresik','','administrasi'),('DINAS TENAGA KERJA KABUPATEN GRESIK','Drs. Kencono Subroto, MM.','031','3954041','08123082375','','disnaker.gresik@gmail.com','Jl. Dr. Wahidin Sudirohusodo No. 233, Gresik','','penagihan'),('DINAS TENAGA KERJA KABUPATEN GRESIK','Drs. Kencono Subroto, MM.','031','3954041','08123082375','','disnaker.gresik@gmail.com','Jl. Dr. Wahidin Sudirohusodo No. 233, Gresik','','support/teknis'),('SAMUDERA MAHKOTA BEACH, PT','Sylvia','031','3528449','','','smb_sby@yahoo.com','','','pemohon'),('PT. Green Energy Natural gas ','OEI Edward Wijaya ','031','7995151','','','','','12.5628.0401561.0002','pemohon'),('PT. Green Energy Natural gas ','Tandius ','031','7992959','03177294068','','','Jl. Kepatihan Industri No 7 Menganti Gresik ','3515180310740002','pemohon'),('PT. Green Energy Natural gas ','Rosa ','031','7995151','','','rosa_candra@yahoo.com ','Jl. A. Yani 1 Balongbendo Sidoarjo ','','administrasi'),('PT. Green Energy Natural gas ','Ratna','031','7995151','03170170048','','hana.kurnia77@yahoo.com ','Jl. A. Yani 1 Balongbendo Sidoarjo ','','administrasi'),('PT. Green Energy Natural gas ','Agus','031','91511170','','','agus_tjandra11@yahoo.com','','','setup/teknis'),('PT. SURABAYA COUNTRY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT. SURABAYA COUNTRY','Andrew Kenny Purniawan','031','3533105','083830581001','','','Jl. Pahlwan 118 Surabaya ','3578100305840009','pemohon'),('PT. SURABAYA COUNTRY','Andrew Kenny Purniawan','031','3533105','083830581001','','','Jl. Pahlwan 118 Surabaya ','3578100305840009','penanggungjawab'),('PT. SURABAYA COUNTRY','Ninik ','031','3533105','','','','Jl. Pahlwan 118 Surabaya ','','administrasi'),('PT. SURABAYA COUNTRY','Ninik ','031','3533105','','','','Jl. Pahlwan 118 Surabaya ','','setup/teknis'),('PT. SURABAYA COUNTRY','Andrew Kenny Purniawan','031','3533105','083830581001','','','Jl. Pahlwan 118 Surabaya ','3578100305840009','support/teknis'),('ROBBY LUKITO ','Robby Lukito ','','081217652201','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /G-8  Surabaya ','3578201103930003','pemohon'),('ROBBY LUKITO ','Robby Lukito ','','081217652201','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /G-8  Surabaya ','3578201103930003','administrasi'),('ROBBY LUKITO ','Robby Lukito ','','081217652201','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /G-8  Surabaya ','3578201103930003','setup/teknis'),('ROBBY LUKITO ','Robby Lukito ','','081217652201','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /G-8  Surabaya ','3578201103930003','penagihan'),('ROBBY LUKITO ','Robby Lukito ','','081217652201','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /G-8  Surabaya ','3578201103930003','support/teknis'),('ROBBY LUKITO ','Robby Lukito ','','081217652201','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /G-8  Surabaya ','3578201103930003','penanggungjawab'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Jl. Kupang Indah I/3 Surabaya ','12.5811.091262.0001','pemohon'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Jl. Kupang Indah I/3 Surabaya ','12.5811.091262.0001','penanggungjawab'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul W ','031','7346901','03170272733','','aditia_unggul@gloriaschool.org','Jl. Kupang Indah I/3 Surabaya ','','setup/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul W ','031','7346901','03170272733','','aditia_unggul@gloriaschool.org','Jl. Kupang Indah I/3 Surabaya ','','support/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Wiwid','031','7346901','','','','Jl. Kupang Indah I/3 Surabaya ','','administrasi'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Rebecca','031','7346901','','','','Jl. Kupang Indah I/3 Surabaya ','','penagihan'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Jl. Kupang Indah I / 3 Surabaya ','12.5811.091262.0001','pemohon'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Sunarko Hadipranata','031','7346901','','','','Jl. Kupang Indah I / 3 Surabaya ','12.5811.091262.0001','penanggungjawab'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul Widianto ','031','7346901','031 70272733','','aditia_unggul@gloriaschool.org','Jl. Kupang Indah I / 3 Surabaya ','','support/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Aditia Unggul Widianto ','031','7346901','031 70272733','','aditia_unggul@gloriaschool.org','Jl. Kupang Indah I / 3 Surabaya ','','setup/teknis'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Rebecca','031','7346901','031 70272733','','','Jl. Kupang Indah I / 3 Surabaya ','','penagihan'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','Wiwid ','031','7346901','','','','Jl. Kupang Indah I / 3 Surabaya ','','administrasi'),('ARYA SUGIETA MULYONO','Arya Sugieta Mulyono','031','7345268','08385700800','','sugieta1@yahoo.com','Graha Family E-27 Surabaya ','3578062804910005','pemohon'),('ARYA SUGIETA MULYONO','Arya Sugieta Mulyono','031','7345268','08385700800','','sugieta1@yahoo.com','Graha Family E-27 Surabaya ','3578062804910005','administrasi'),('ARYA SUGIETA MULYONO','Arya Sugieta Mulyono','031','7345268','08385700800','','sugieta1@yahoo.com','Graha Family E-27 Surabaya ','3578062804910005','setup/teknis'),('ARYA SUGIETA MULYONO','Arya Sugieta Mulyono','031','7345268','08385700800','','sugieta1@yahoo.com','Graha Family E-27 Surabaya ','3578062804910005','penagihan'),('ARYA SUGIETA MULYONO','Arya Sugieta Mulyono','031','7345268','08385700800','','sugieta1@yahoo.com','Graha Family E-27 Surabaya ','3578062804910005','penanggungjawab'),('ARYA SUGIETA MULYONO','Arya Sugieta Mulyono','031','7345268','08385700800','','sugieta1@yahoo.com','Graha Family E-27 Surabaya ','3578062804910005','support/teknis'),('ROLAS NUSANTARA MANDIRI','Hasan Subhani','031','3551896','08123516488','','hasansubhanif@yahoo.co.id','','','pemohon'),('ROLAS NUSANTARA MANDIRI','Bram Lukmanto','031','3551896','0313551896','','hilir_n12@ymail.com','','','administrasi'),('ROLAS NUSANTARA MANDIRI','Bram Lukmanto','031','3551896','0313551896','','hilir_n12@ymail.com','','','penagihan'),('ROLAS NUSANTARA MANDIRI','Bram Lukmanto','031','3551896','0313551896','','hilir_n12@ymail.com','','','setup/teknis'),('ROLAS NUSANTARA MANDIRI','Bram Lukmanto','031','3551896','0313551896','','hilir_n12@ymail.com','','','support/teknis'),('ROLAS NUSANTARA MANDIRI','Setyo Wuryanto','031','3551896','','','','','','penanggungjawab'),('IGOR\'S PASTRY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('MULTIPLAST INDO MAKMUR, PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT BEON INTERMEDIA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('CAHAYA GUNUNG JATI, PT','Indratono','031','7492090','0317492090','','indratonotedjokumolo@hotmail.com','','','pemohon'),('CAHAYA GUNUNG JATI, PT','Indratono','031','7492090','0317492090','','indratonotedjokumolo@hotmail.com','','','penanggungjawab'),('CAHAYA GUNUNG JATI, PT','Indratono','031','7492090','0317492090','','indratonotedjokumolo@hotmail.com','','','administrasi'),('CAHAYA GUNUNG JATI, PT','Indratono','031','7492090','0317492090','','indratonotedjokumolo@hotmail.com','','','penagihan'),('CAHAYA GUNUNG JATI, PT','Bpk. Ade','031','7492090','71725758','','grand57@hotmail.com','','','setup/teknis'),('CAHAYA GUNUNG JATI, PT','Bpk. Ade','031','7492090','71725758','','grand57@hotmail.com','','','support/teknis'),('ALBERT THIODORIS ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT SURABAYA MEKABOX',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PAULUS TJOKRO WIJOYO','Paulus Tjokro Wijoyo','031','7315128','085733122013','','aquabenedicta@yahoo.com','','','pemohon'),('PAULUS TJOKRO WIJOYO','Paulus Tjokro Wijoyo','031','7315128','085733122013','','aquabenedicta@yahoo.com','','','penanggungjawab'),('PAULUS TJOKRO WIJOYO','Paulus Tjokro Wijoyo','031','7315128','085733122013','','aquabenedicta@yahoo.com','','','administrasi'),('PAULUS TJOKRO WIJOYO','Paulus Tjokro Wijoyo','031','7315128','085733122013','','aquabenedicta@yahoo.com','','','penagihan'),('PAULUS TJOKRO WIJOYO','Paulus Tjokro Wijoyo','031','7315128','085733122013','','aquabenedicta@yahoo.com','','','setup/teknis'),('PAULUS TJOKRO WIJOYO','Paulus Tjokro Wijoyo','031','7315128','085733122013','','aquabenedicta@yahoo.com','','','support/teknis'),('ROBIN WIDOYO','Robin Widoyo','031','081808055123','','','robinwidoyo@gmail.com','','','pemohon'),('ROBIN WIDOYO','Robin Widoyo','031','081808055123','','','robinwidoyo@gmail.com','','','penanggungjawab'),('ROBIN WIDOYO','Robin Widoyo','031','081808055123','','','robinwidoyo@gmail.com','','','administrasi'),('ROBIN WIDOYO','Robin Widoyo','031','081808055123','','','robinwidoyo@gmail.com','','','penagihan'),('ROBIN WIDOYO','Robin Widoyo','031','081808055123','','','robinwidoyo@gmail.com','','','setup/teknis'),('ROBIN WIDOYO','Robin Widoyo','031','081808055123','','','robinwidoyo@gmail.com','','','support/teknis'),('ROBIN WIDOYO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('GRAHA MULTI BINTANG, PT','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Tambak langon Indah I/2 Surabaya ','3515071506760004','support/teknis'),('GRAHA MULTI BINTANG, PT','Jonny Santoso ','031','7493808','087859555777','','jonnygmb@yahoo.com','Tambak langon Indah I/2 Surabaya ','3515071506760004','penanggungjawab'),('24 KTV & LOUNGE','Sonny Prasetyo ','031','','081246453333','','sonnytjiang@yahoo.com','','3578022504810004','pemohon'),('24 KTV & LOUNGE','Sonny Prasetyo ','031','','081246453333','','sonnytjiang@yahoo.com','','3578022504810004','penanggungjawab'),('24 KTV & LOUNGE','Sonny Prasetyo ','031','','081246453333','','sonnytjiang@yahoo.com','','3578022504810004','support/teknis'),('24 KTV & LOUNGE','Sonny Prasetyo ','031','','081246453333','','sonnytjiang@yahoo.com','','3578022504810004','penagihan'),('24 KTV & LOUNGE','Sonny Prasetyo ','031','','081246453333','','sonnytjiang@yahoo.com','','3578022504810004','setup/teknis'),('24 KTV & LOUNGE','Sonny Prasetyo ','031','','081246453333','','sonnytjiang@yahoo.com','','3578022504810004','administrasi'),('ANTAR MITRA SEMBADA, PT','Agus Tri Wahyono ','031','5962550 - 51','08123106244','','agustri@sby.ams.co.id','Jl. Manyar Kartika VII/10 - 16 Surabaya ','12.5621240870.0001','pemohon'),('ANTAR MITRA SEMBADA, PT','Agus Tri Wahyono ','031','5962550 - 51','08123106244','','agustri@sby.ams.co.id','Jl. Manyar Kartika VII/10 - 16 Surabaya ','12.5621240870.0001','setup/teknis'),('ANTAR MITRA SEMBADA, PT','Valens','031','5962550 - 51','03191745346','','valens@sby.ams.co.id','Jl. Manyar Kartika VII/10 - 16 Surabaya ','','support/teknis'),('ANTAR MITRA SEMBADA, PT','Vika','021','5310330 ext 4004','','','vika@ams.co.id','Jl. Pos Pengumben raya No. 8 Sukabumi selatan - Jakarta','','penagihan'),('ANTAR MITRA SEMBADA, PT','Vika','021','5310330 ext 4004','','','vika@ams.co.id','Jl. Pos Pengumben raya No. 8 Sukabumi selatan - Jakarta','','administrasi'),('ANTAR MITRA SEMBADA, PT','Ifan Sugiharto ','031','5962550 - 51','','','','Jl. Manyar Kartika VII/10 - 16 Surabaya ','','penanggungjawab'),('SUROPATI CAHAYA TIMUR, PT','Tandius ','031','7995151','03177294068','','','Jl. Tanggulangin No.8 Kejayan Pasuruan ','','pemohon'),('SUROPATI CAHAYA TIMUR, PT','OEI Edward Wijaya ','031','7995151','','','','Jl. Tanggulangin No.8 Kejayan Pasuruan ','12.5628.0401561.0002','penanggungjawab'),('SUROPATI CAHAYA TIMUR, PT','Rosa ','031','7995151','','','rosa_candra@yahoo.com ','Jl. Tanggulangin No.8 Kejayan Pasuruan ','','administrasi'),('SUROPATI CAHAYA TIMUR, PT','Kurnia','031','7995151','','','hana.kurnia77@yahoo.com ','Jl. Tanggulangin No.8 Kejayan Pasuruan ','','penagihan'),('SUROPATI CAHAYA TIMUR, PT','Agus','031','91511170','','','agus_tjandra11@yahoo.com','Jl. Tanggulangin No.8 Kejayan Pasuruan ','','setup/teknis'),('SUROPATI CAHAYA TIMUR, PT','Agus','031','91511170','','','agus_tjandra11@yahoo.com','Jl. Tanggulangin No.8 Kejayan Pasuruan ','','support/teknis'),('PT. Prime Energy Supply ','OEI Edward Wijaya ','031','0317995151','','','','Jl. Martadinata No 1 RT.001 RW.001 Lumpur Gresik','12.5628.040561.0002','penanggungjawab'),('PT. Prime Energy Supply ','Tandius','031','0317995151','','','','Jl. Martadinata No 1 RT.001 RW.001 Lumpur Gresik','3515180310740002','pemohon'),('PT. Prime Energy Supply ','Agus','031','0317995151','03191511170','','agus_tjandra11@yahoo.com','Jl. Martadinata No 1 RT.001 RW.001 Lumpur Gresik','','support/teknis'),('PT. Prime Energy Supply ','Agus','031','0317995151','03191511170','','agus_tjandra11@yahoo.com','Jl. Martadinata No 1 RT.001 RW.001 Lumpur Gresik','','setup/teknis'),('PT. Prime Energy Supply ','Rosa','031','0317995151','03191511170','','rosa_candra@yahoo.co.id','Jl. Martadinata No 1 RT.001 RW.001 Lumpur Gresik','','administrasi'),('PT. Prime Energy Supply ','Kurnia','031','0317995151','70170048','','hana.kurnia77@yahoo.co.id','Jl. Martadinata No 1 RT.001 RW.001 Lumpur Gresik','','penagihan'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','Wiwid Wijanarko ','031','','08385782226','','wiwid.wijanarka@wismilak.com','Jl. Ngagel Jaya Selatan 168 Surabaya','3578091811860002','pemohon'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','Wiwid Wijanarko ','031','','08385782226','','wiwid.wijanarka@wismilak.com','Jl. Ngagel Jaya Selatan 168 Surabaya','3578091811860002','administrasi'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','Wiwid Wijanarko ','031','','08385782226','','wiwid.wijanarka@wismilak.com','Jl. Ngagel Jaya Selatan 168 Surabaya','3578091811860002','setup/teknis'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','Wiwid Wijanarko ','031','','08385782226','','wiwid.wijanarka@wismilak.com','Jl. Ngagel Jaya Selatan 168 Surabaya','3578091811860002','support/teknis'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','Wiwid Wijanarko ','031','','08385782226','','wiwid.wijanarka@wismilak.com','Jl. Ngagel Jaya Selatan 168 Surabaya','3578091811860002','penagihan'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','Wiwid Wijanarko ','031','','08385782226','','wiwid.wijanarka@wismilak.com','Jl. Ngagel Jaya Selatan 168 Surabaya','3578091811860002','penanggungjawab'),('PT. WONOKOYO JAYA  CORPORINDO','DJOJO KUSUMO','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1 - 7 Surabaya ','','penanggungjawab'),('PT. WONOKOYO JAYA  CORPORINDO','Prasetyo Pribadi ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1 - 7 Surabaya ','','pemohon'),('PT. WONOKOYO JAYA  CORPORINDO','Rizky A. Wijayanto ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1 - 7 Surabaya ','','support/teknis'),('PT. WONOKOYO JAYA  CORPORINDO','Rizky A. Wijayanto ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1 - 7 Surabaya ','','setup/teknis'),('PT. WONOKOYO JAYA  CORPORINDO','Dedik Hermanto ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1 - 7 Surabaya ','','administrasi'),('PT. WONOKOYO JAYA  CORPORINDO','Dedik Hermanto ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1 - 7 Surabaya ','','penagihan'),('Koperasi Tunas Arindo','Farid Manfaluti','031','3990931','','','','Dusun Krajan 02, Pangkah Wetan, Ujung Pangkah, Gresik','','pemohon'),('Delta Pratama Balongpanggang',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Kedungpring',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Paciran',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Sukodadi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Lamongan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Soko',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Tuban',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Tikung',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Rengel',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Delta Pratama Merakurak',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Virus Net','Eko Edi Sutanto, SE','0341','9504924','0816553467','','','Jl. Sulfat Agung I/30, Purwantoro, Blimbing, Malang','','pemohon'),('Randha Net','Didit Agus Setiawan','0341','7333939','','','','','','pemohon'),('PUTRA BINTANG TIMUR LESTARI, PT','Sandra Dewi','0341','402835','','','','Jl. Karya Barat No. 7, Malang','','pemohon'),('ESKAINET','Rinaldi Bayu Ardiyanto','0341','7730000','','','','','','pemohon'),('DIAN ABADI CELL','Rinaldi Bayu Ardiyanto','0341','7730000','','','','','','pemohon'),('KEVIN PONTHY ','Kevin Ponthy','0341','','083896777321','','','Apartemen Soekarno-Hatta Unit 953 Malang','','pemohon'),('ALBERT LEONARD ','Albert Leonard','0341','413335','','','','','','pemohon'),('IFORTE SOLUSI INFOTEK, PT','NOVA KAROLINA','021','8310301','','','novakarolina@iforte.co.id.','WISMA MILENIA LT. 4 ; JL. MT. HARIYONO KAV. 16','','pemohon'),('SOMAGEDE INDONESIA, PT','EFRIL BUSYRA','021','641 0730','081 866 9610','','efril.busyra@sgp-dkp.com','JL. KALIMANTAN NO. 11 B-11 C ; SURABAYA','','pemohon'),(' HEXING TECHNOLOGY, PT','Valiant P. Averoes','0267','8610077','','','','','','penanggungjawab'),(' HEXING TECHNOLOGY, PT','Vina Galih','021','','085 6845 1543','','vina_g@hexing.co.id','','','administrasi'),(' HEXING TECHNOLOGY, PT','Rizky Adriadhie','021','','0856 4334 717','','rizky_a@hexing.co.id','','','support/teknis'),(' HEXING TECHNOLOGY, PT','Nita Rosmawati','021','','0856 9727 272','','nita_r@hexing.co.id','','','penagihan'),('KIWOOM SECURITIES INDONESIA, PT','BANDORO SUSILO','021','526 1326','0812 7173 737','','bandoro@kiwoom.co.id','','','pemohon'),('KIWOOM SECURITIES INDONESIA, PT','NUKE','021','','','','nuke13@kiwoom.co.id','','','administrasi'),('KIWOOM SECURITIES INDONESIA, PT','ASRIA MANIK','021','','','','asria@kiwoom.co.id','','','penagihan'),(' REGAWA MOBINDO KREASI NUSA, PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('TIMUR KENCANA','HENRY','021','628 7028','0816 865 759','','htw@eastraco.com','','','penanggungjawab'),('TRANS INDONESIA NETWORK','WIBOWO','021','','0811991917','','WIBOWO@TRANSINDO.BIZ','','','pemohon'),('EQUITY SECURITIES INDONESIA, PT','Denny David','021','','089 9064 8710','','t-support@esi-on.com','','','pemohon'),('PT. MUNTJUL DIAMOND','Shenny Wong ','031','8929993','','','shenny103a@yahoo.com','','','pemohon'),('PT. MUNTJUL DIAMOND','Kijantoro Purnomo ','031','8929993','','','','Jl Kesatrian 18 Buduran Sidoarjo ','3515162208410001','penanggungjawab'),('PT. MUNTJUL DIAMOND','Rudy ','031','8929993','','','','Jl Kesatrian 18 Buduran Sidoarjo ','','penagihan'),('PT. MUNTJUL DIAMOND','Rudy ','031','8929993','','','','Jl Kesatrian 18 Buduran Sidoarjo ','','administrasi'),('PT. MUNTJUL DIAMOND','Rohadi ','031','8929993','','','diamondsda@yahoo.com','Jl Kesatrian 18 Buduran Sidoarjo ','','support/teknis'),('PT. MUNTJUL DIAMOND','Rohadi ','031','8929993','','','diamondsda@yahoo.com','Jl Kesatrian 18 Buduran Sidoarjo ','','setup/teknis'),('3Arena Futsal','Bpk. Paulus B.SH','031','7887891','','','info@3arena.com','','','penanggungjawab'),('3Arena Futsal','Ibu Dherry','031','7887891','','','info@3arena.com','','','pemohon'),('3Arena Futsal','Ibu Dherry','031','7887891','','','info@3arena.com','','','administrasi'),('3Arena Futsal','Ibu Dherry','031','7887891','','','info@3arena.com','','','penagihan'),('3Arena Futsal','Bpk. Heru widjaja','031','0817595939','','','heru.widjaja@jts.co.id','','','setup/teknis'),('3Arena Futsal','Bpk. Heru widjaja','031','0817595939','','','heru.widjaja@jts.co.id','','','support/teknis'),('Daniel Kristanto','Daniel Kristanto','031','081217171732','','','dances733@gmail.com','','','pemohon'),('Daniel Kristanto','Daniel Kristanto','031','081217171732','','','dances733@gmail.com','','','penanggungjawab'),('Daniel Kristanto','Daniel Kristanto','031','081217171732','','','dances733@gmail.com','','','administrasi'),('Daniel Kristanto','Daniel Kristanto','031','081217171732','','','dances733@gmail.com','','','penagihan'),('Daniel Kristanto','Daniel Kristanto','031','081217171732','','','dances733@gmail.com','','','setup/teknis'),('Daniel Kristanto','Daniel Kristanto','031','081217171732','','','dances733@gmail.com','','','support/teknis'),('MATAHARI ARTHA ABADI, PT','Muljono','031','7483595','08123999396','','muljono396@gmail.com','','','pemohon'),('MATAHARI ARTHA ABADI, PT','Muljono','031','7483595','08123999396','','muljono396@gmail.com','','','setup/teknis'),('MATAHARI ARTHA ABADI, PT','Muljono','031','7483595','08123999396','','muljono396@gmail.com','','','support/teknis'),('MATAHARI ARTHA ABADI, PT','Muljono','031','7483595','08123999396','','muljono396@gmail.com','','','administrasi'),('MATAHARI ARTHA ABADI, PT','Muljono','031','7483595','08123999396','','muljono396@gmail.com','','','penagihan'),('MATAHARI ARTHA ABADI, PT','Ferdy Setio','031','7483595','','','fsetio@yahoo.com','','','penanggungjawab'),('PETRO JORDAN ABADI, PT','Bpk. Sadeli Said','031','3991887','','','','','','pemohon'),('PETRO JORDAN ABADI, PT','Bpk. Sadeli Said','031','3991887','','','','','','penanggungjawab'),('PETRO JORDAN ABADI, PT','Bpk. Yanuar Arda Raja','031','3991887','','','yanuarardaraja@gmail.com','','','administrasi'),('PETRO JORDAN ABADI, PT','Bpk. Yanuar Arda Raja','031','3991887','','','yanuarardaraja@gmail.com','','','setup/teknis'),('PETRO JORDAN ABADI, PT','Bpk. Yanuar Arda Raja','031','3991887','','','yanuarardaraja@gmail.com','','','penagihan'),('PETRO JORDAN ABADI, PT','Bpk. Yanuar Arda Raja','031','3991887','','','yanuarardaraja@gmail.com','','','support/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Daniel Sunu Prasetyo','031','5689000','085815828220','','daniel@artotelindonesia.com','','','pemohon'),('GRAHA SAMARA, PT  (ARTOTEL)','Daniel Sunu Prasetyo','031','5689000','','','daniel@artotelindonesia.com','','','penanggungjawab'),('GRAHA SAMARA, PT  (ARTOTEL)','Hendrawan','031','5689000','','','hendrawan@artotelindonesia.com','','','setup/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Hendrawan','031','5689000','','','hendrawan@artotelindonesia.com','','','support/teknis'),('GRAHA SAMARA, PT  (ARTOTEL)','Amril Paidja','031','5689000','','','amril@artotelindonesia.com','','','administrasi'),('GRAHA SAMARA, PT  (ARTOTEL)','Amril Paidja','031','5689000','','','amril@artotelindonesia.com','','','penagihan'),('BREAKSHOT MULTI PLAYER GAME',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('KREATIGO SOLUTIVE PARTNER, CV','Budi Santoso ','031','8296845','','','','','3578221702800001','pemohon'),('KREATIGO SOLUTIVE PARTNER, CV','Tri Harmono Adi Susetyo ','031','8296845','','','','','35782615108000002','penanggungjawab'),('KREATIGO SOLUTIVE PARTNER, CV','Tri Harmono Adi Susetyo ','031','8296845','','','','','35782615108000002','setup/teknis'),('KREATIGO SOLUTIVE PARTNER, CV','Paulus','031','8296845','','','','Jl. Kebonsari Maununggal 10 Surabaya','','support/teknis'),('KREATIGO SOLUTIVE PARTNER, CV','Novita Nur Fitri','031','8296845','','','','','','administrasi'),('KREATIGO SOLUTIVE PARTNER, CV','Novita Nur Fitri','031','8296845','','','','Jl. Kebonsari Maununggal 10 Surabaya','','penagihan'),('NOVITA PRASETYA','Novita Prasetya','','','0812357777222','','abigail.novita.ne@gmail.com','Perum Royal Residence B9/32 Surabaya','3578315511870001','pemohon'),('NOVITA PRASETYA','Anye Nikenraras Rekian Prabosiwi','','','085749649869','','anyeniken9@gmail.com','Perum Royal Residence B9/32 Surabaya','35781643079200002','penanggungjawab'),('NOVITA PRASETYA','Anye Nikenraras Rekian Prabosiwi','','','085749649869','','anyeniken9@gmail.com','Perum Royal Residence B9/32 Surabaya','35781643079200002','administrasi'),('NOVITA PRASETYA','Anye Nikenraras Rekian Prabosiwi','','','085749649869','','anyeniken9@gmail.com','Perum Royal Residence B9/32 Surabaya','35781643079200002','setup/teknis'),('NOVITA PRASETYA','Anye Nikenraras Rekian Prabosiwi','','','085749649869','','anyeniken9@gmail.com','Perum Royal Residence B9/32 Surabaya','35781643079200002','support/teknis'),('NOVITA PRASETYA','Anye Nikenraras Rekian Prabosiwi','','','085749649869','','anyeniken9@gmail.com','Perum Royal Residence B9/32 Surabaya','35781643079200002','penagihan'),('YODANET','Ngurah Sidarta M','031','31000600','081332361970','','','Jl. Batu Mulia - Kompleks Ruko Permata Sari Kavling No. 33, Driyorejo - Gresik','12.5619.110941.0001','pemohon'),('YODANET','Ngurah Sidarta M','031','31000600','081332361970','','','Jl. Batu Mulia - Kompleks Ruko Permata Sari Kavling No. 33, Driyorejo - Gresik','12.5619.110941.0001','penanggungjawab'),('YODANET','Soegeng Waloejo Herwandono','031','31000600','081330095666','','','','','administrasi'),('YODANET','Soegeng Waloejo Herwandono','031','31000600','081330095666','','','','','setup/teknis'),('YODANET','Soegeng Waloejo Herwandono','031','31000600','081330095666','','','','','penagihan'),('YODANET','Soegeng Waloejo Herwandono','031','31000600','081330095666','','','','','support/teknis'),('PT. ESA ZONA EKSPRES','Machfudin','031','3281355','08175065009','','udin@ezexpress.net','Jl. Perak Timur No. 296','01.813.469.2-613.000','pemohon'),('PT. ESA ZONA EKSPRES','Sugianto','','','','','','','3578062402670005','penanggungjawab'),('PT. ESA ZONA EKSPRES','Indria Eka Hartanti','031','3281355','081332606121','','tanti_ezex@yahoo.co.id','','','administrasi'),('PT. ESA ZONA EKSPRES','Machfudin','','','08175065009','','udin@ezexpress.net','','','setup/teknis'),('PT. ESA ZONA EKSPRES','Rahman Setiawan','031','3281355','','','','','','penagihan'),('PT. ESA ZONA EKSPRES','Machfudin','','','08175065009','','udin@ezexpress.net','','','support/teknis'),('PRIMAGAMA (PERAK)','Pudjiyanto','','','08123596690','','jrbbrother2@yahoo.com','Jl. Perak Timur No. 40-40 A','3578101202710007','pemohon'),('PRIMAGAMA (PERAK)','Raymond Steven','','','08179917235','','roli.runtukahu@gmail.com','Jl. Perak Timur No. 40-40 A','12.2605.220779.0001','penanggungjawab'),('PRIMAGAMA (PERAK)','Pudjiyanto','031','3550333','08123596690','','jrbbrother2@yahoo.com','','','administrasi'),('PRIMAGAMA (PERAK)','Pudjiyanto','031','3550333','08123596690','','jrbbrother2@yahoo.com','','','setup/teknis'),('PRIMAGAMA (PERAK)','Pudjiyanto','031','3550333','','','jrbbrother2@yahoo.com','','','penagihan'),('PRIMAGAMA (PERAK)','Pudjiyanto','031','3550333','','','jrbbrother2@yahoo.com','','','support/teknis'),('TOKO VIRGO','Adi Tjandra','','','08121711000','','virgocard@gmail.com','Jl. Teluk Nibung No. 22','3578120906800002','pemohon'),('TOKO VIRGO','Adi Tjandra','','','08121711000','','virgocard@gmail.com','Jl. Teluk Nibung No. 22','3578120906800002','penanggungjawab'),('TOKO VIRGO','Adi Tjandra','','','08121711000','','virgocard@gmail.com','','','administrasi'),('TOKO VIRGO','Adi Tjandra','','','08121711000','','virgocard@gmail.com','','','setup/teknis'),('TOKO VIRGO','Adi Tjandra','','','08121711000','','virgocard@gmail.com','','','penagihan'),('TOKO VIRGO','Adi Tjandra','','','08121711000','','virgocard@gmail.com','','','support/teknis'),('BERKAT ABBA INDONESIA, PT','Sumarli Tri Wahyuni','031','7885122','08121642166','','marli_udl@yahoo.com','Jl. Raya Trosobo No. 35, Sidoarjo','3578087105770004','pemohon'),('BERKAT ABBA INDONESIA, PT','Sumarli Tri Wahyuni','031','7885122','08121642166','','marli_udl@yahoo.com','Jl. Raya Trosobo No. 35, Sidoarjo','3578087105770004','penanggungjawab'),('BERKAT ABBA INDONESIA, PT','Sumarli Tri Wahyuni','031','7885122','08121642166','','marli_udl@yahoo.com','','','administrasi'),('BERKAT ABBA INDONESIA, PT','Sumarli Tri Wahyuni','031','7885122','08121642166','','marli_udl@yahoo.com','','','setup/teknis'),('BERKAT ABBA INDONESIA, PT','Sumarli Tri Wahyuni','031','7885122','08121642166','','marli_udl@yahoo.com','','','penagihan'),('BERKAT ABBA INDONESIA, PT','Sumarli Tri Wahyuni','031','7885122','08121642166','','marli_udl@yahoo.com','','','support/teknis'),('INSAN CENDEKIA, CV','Wisudana Arisaptono','031','3813021','0811348602','','wisudana@yahoo.com','Jl. Kaliwaron No. 58','3578100712850010','pemohon'),('INSAN CENDEKIA, CV','Wisudana Arisaptono','031','3813021','0811348602','','wisudana@yahoo.com','Jl. Kaliwaron No. 58','3578100712850010','penanggungjawab'),('INSAN CENDEKIA, CV','Farizah Haryono','031','5936652','','','farizahic@yahoo.com','','','administrasi'),('INSAN CENDEKIA, CV','Moch. Hasanuddin','','','087702645616','','lehosic@yahoo.com','','','setup/teknis'),('INSAN CENDEKIA, CV','Farizah Haryono','031','5936652','','','farizahic@yahoo.com','','','penagihan'),('INSAN CENDEKIA, CV','Moch. Hasanuddin','','','087702645616','','lehosic@yahoo.com','','','support/teknis'),('NAILANET','Guntur Nur Cahyo','031','70845274','','','petirrr@yahoo.co.id','Jl. Pagesangan III-A/54','12.5623.300781.0004','pemohon'),('NAILANET','Guntur Nur Cahyo','031','70845274','','','petirrr@yahoo.co.id','Jl. Pagesangan III-A/54','12.5623.300781.0004','penanggungjawab'),('NAILANET','Guntur Nur Cahyo','031','70845274','','','petirrr@yahoo.co.id','','','administrasi'),('NAILANET','Guntur Nur Cahyo','031','70845274','','','petirrr@yahoo.co.id','','','setup/teknis'),('NAILANET','Guntur Nur Cahyo','031','70845274','','','petirrr@yahoo.co.id','','','penagihan'),('NAILANET','Guntur Nur Cahyo','031','70845274','','','petirrr@yahoo.co.id','','','support/teknis'),('KSP ADIYATRA UTAMA','Rocky Tanumihardjo','031','5321178','0817324632','','rocky_tanumihardjo@yahoo.co.id','Jl. Raya Keputran No. 59-61','3578290803820001','pemohon'),('KSP ADIYATRA UTAMA','Rocky Tanumihardjo','031','5321178','0817324632','','rocky_tanumihardjo@yahoo.co.id','Jl. Raya Keputran No. 59-61','3578290803820001','penanggungjawab'),('KSP ADIYATRA UTAMA','Rocky Tanumihardjo','031','5321178','0817324632','','rocky_tanumihardjo@yahoo.co.id','','','administrasi'),('KSP ADIYATRA UTAMA','Rocky Tanumihardjo','031','5321178','0817324632','','rocky_tanumihardjo@yahoo.co.id','','','setup/teknis'),('KSP ADIYATRA UTAMA','Rocky Tanumihardjo','031','5321178','0817324632','','rocky_tanumihardjo@yahoo.co.id','','','penagihan'),('KSP ADIYATRA UTAMA','Rocky Tanumihardjo','031','5321178','0817324632','','rocky_tanumihardjo@yahoo.co.id','','','support/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Liauw Yudhi','021','021-3929828','08156459877','','yudhi.liauw@mncland.com','Jl. Kertajaya Indah Timur Blok S-III No. 27','3173021309850005','pemohon'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Hari Dhoho Tampubolon','021','3929828','','','','','3175022510730002','penanggungjawab'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Liauw Yudhi','021','3929828','','','yudhi.liauw@mncland.com','','','administrasi'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Liauw Yudhi','021','3929828','','','yudhi.liauw@mncland.com','','','setup/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Idha','021','3929828','','','idha.kusumowati@mncland.com','','','penagihan'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Liauw Yudhi','','','08156459877','','yudhi.liauw@mncland.com','','','support/teknis'),('DAKWAH INTI MEDIA, PT (TV 9)','Ahmad Hakim Jayli','','','08123022899','','hakimjayli@yahoo.com','Jl. Raya Darmo No. 96','3514232405720002','pemohon'),('DAKWAH INTI MEDIA, PT (TV 9)','Ahmad Hakim Jayli','','','08123022899','','hakimjayli@yahoo.com','Jl. Raya Darmo No. 96','3514232405720002','penanggungjawab'),('DAKWAH INTI MEDIA, PT (TV 9)','Asmahanik','','','085855525893','','haniktv9@gmail.com','','','administrasi'),('DAKWAH INTI MEDIA, PT (TV 9)','Budi Tri Satiyo','','','085234655175','','buditri.satiyo@yahoo.co.id','','','setup/teknis'),('DAKWAH INTI MEDIA, PT (TV 9)','Asmahanik','','','085855525893','','haniktv9@gmail.com','','','penagihan'),('DAKWAH INTI MEDIA, PT (TV 9)','Budi Tri Satiyo','','','085234655175','','buditri.satiyo@yahoo.co.id','','','support/teknis'),('JESSIE ADHISTIA ','Jessie Adhistia','','','0811819292','','jessie_adhistia@yahoo.com','Jl. Imperial Beach F-15 No. 32, Pakuwon City - Palm Beach','3515084707870004','pemohon'),('JESSIE ADHISTIA ','Jessi Adhistia','','','0811819292','','jessie_adhistia@yahoo.com','','3515084707870004','penanggungjawab'),('JESSIE ADHISTIA ','Eric Kurniawan','','','08123028882','','','','','administrasi'),('JESSIE ADHISTIA ','Eric Kurniawan','','','08123028882','','','','','setup/teknis'),('JESSIE ADHISTIA ','Eric Kurniawan','','','08123028882','','','','','penagihan'),('JESSIE ADHISTIA ','Eric Kurniawan','','','08123028882','','','','','support/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Hari Dhoho Tampubolon','021','3929828','','','','','0954022510730267','penanggungjawab'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Dian Andika Prasetyo','','','081319757399','','dian.prasetyo@mncland.com','','','setup/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Dian Andika Prasetyo','','','081319757399','','dian.prasetyo@mncland.com','','','support/teknis'),('SUSHI TEI SURABAYA, PT','Michael','031','99001002','081234066608','087851582922','michael@sushitei.com','Jl. Darmo Permai 2 No 89 Surabaya ','3201011409810013','pemohon'),('SUSHI TEI SURABAYA, PT','Michael','031','99001002','081234066608','087851582922','michael@sushitei.com','Jl. Darmo Permai 2 No 89 Surabaya ','3201011409810013','administrasi'),('SUSHI TEI SURABAYA, PT','Michael','031','99001002','081234066608','087851582922','michael@sushitei.com','Jl. Darmo Permai 2 No 89 Surabaya ','3201011409810013','setup/teknis'),('SUSHI TEI SURABAYA, PT','Michael','031','99001002','081234066608','087851582922','michael@sushitei.com','Jl. Darmo Permai 2 No 89 Surabaya ','3201011409810013','support/teknis'),('SUSHI TEI SURABAYA, PT','Michael','031','99001002','081234066608','087851582922','michael@sushitei.com','Jl. Darmo Permai 2 No 89 Surabaya ','3201011409810013','penagihan'),('SUSHI TEI SURABAYA, PT','Michael','031','99001002','081234066608','087851582922','michael@sushitei.com','Jl. Darmo Permai 2 No 89 Surabaya ','3201011409810013','penanggungjawab'),('SEKAR PRIMA ABADI, PT','BASKORO DWI CAHYONO','021','','085697719083','','slashcore@yahoo.com','','','pemohon'),('PT. Dovechem Maspion Terminal ','Titi Riady Kurniawan ','031','3955560','08121766601','03160222080','titiriady@hotmail.com','Kawasan Industri Maspion Manyar Gresik ','3525160910750001','pemohon'),('PT. Dovechem Maspion Terminal ','Titi Riady Kurniawan ','031','3955560','08121766601','03160222080','titiriady@hotmail.com','Kawasan Industri Maspion Manyar Gresik ','3525160910750001','penanggungjawab'),('PT. Dovechem Maspion Terminal ','Nitra','031','3955560','','','','Kawasan Industri Maspion Manyar Gresik ','','administrasi'),('PT. Dovechem Maspion Terminal ','Nitra','031','3955560','','','','Kawasan Industri Maspion Manyar Gresik ','','penagihan'),('PT. Dovechem Maspion Terminal ','Cucuk ','031','3955560','','','','Kawasan Industri Maspion Manyar Gresik ','','setup/teknis'),('PT. Dovechem Maspion Terminal ','Dedi S','031','3955560','','','','Kawasan Industri Maspion Manyar Gresik ','','support/teknis'),('BIOMETRIC CITRA SOLUSI, PT','Hendry Kartono','031','031-7401416','','','hendry@fingerspot.com','','','pemohon'),('BIOMETRIC CITRA SOLUSI, PT','Hendry Kartono','031','031-7401416','','','hendry@fingerspot.com','','','penanggungjawab'),('BIOMETRIC CITRA SOLUSI, PT','Niswatin Halimah','031','031-7401416','','','fingerspot.manage@gmail.com','','','administrasi'),('BIOMETRIC CITRA SOLUSI, PT','Niswatin Halimah','031','031-7401416','','','fingerspot.manage@gmail.com','','','penagihan'),('BIOMETRIC CITRA SOLUSI, PT','Januar weool','031','031-7401416','','','januar@fingerspot.net','','','setup/teknis'),('BIOMETRIC CITRA SOLUSI, PT','Januar weool','031','031-7401416','','','januar@fingerspot.net','','','support/teknis'),('GARRY CHEN, Mr','Gerry Chen, Mr','031','081234207650','','','chengan1005@gmail.com','','','pemohon'),('GARRY CHEN, Mr','Gerry Chen, Mr','031','081234207650','','','chengan1005@gmail.com','','','penanggungjawab'),('GARRY CHEN, Mr','Gerry Chen, Mr','031','081234207650','','','chengan1005@gmail.com','','','administrasi'),('GARRY CHEN, Mr','Gerry Chen, Mr','031','081234207650','','','chengan1005@gmail.com','','','penagihan'),('GARRY CHEN, Mr','Gerry Chen, Mr','031','081234207650','','','chengan1005@gmail.com','','','setup/teknis'),('GARRY CHEN, Mr','Gerry Chen, Mr','031','081234207650','','','chengan1005@gmail.com','','','support/teknis'),('GADING MURNI, PT (Manukan)','Zaldy Siswanto','031','7440033','0816539214','','zaldy.siswanto@gadingmurni.co.id','','','pemohon'),('GADING MURNI, PT (Manukan)','Zaldy Siswanto','031','7440033','0816539214','','zaldy.siswanto@gadingmurni.co.id','','','penanggungjawab'),('GADING MURNI, PT (Manukan)','Ibu Wita/Ibu Lina','031','5460384','','','','','','administrasi'),('GADING MURNI, PT (Manukan)','Ibu Wita/Ibu Lina','031','5460384','','','','','','penagihan'),('GADING MURNI, PT (Manukan)','Eddy Ruslim','031','5460384','','','','','','setup/teknis'),('GADING MURNI, PT (Manukan)','Eddy Ruslim','031','5460384','','','','','','support/teknis'),('PT. MUNTJUL DIAMOND','Shenny Wong ','031','8929993','','','shenny103a@yahoo.com','Jl Kesatrian 18 Buduran Sidoarjo ','','pemohon'),('PT. MUNTJUL DIAMOND','Kijantoro Purnomo ','031','8929993','','','diamondsda@yahoo.com','Jl. Kesatrian 18 Buduran Sidoarjo ','','penanggungjawab'),('PT. MUNTJUL DIAMOND','Rohadi ','031','8929993','','','diamondsda@yahoo.com','','','setup/teknis'),('PT. MUNTJUL DIAMOND','Rohadi ','031','8929993','','','diamondsda@yahoo.com','','','support/teknis'),('NOVITA PRASETYA','Novita Prasetya','081','081235777222','081235777222','','abigail.novita.np@gmail.com ','Perum Royal Residence B9/32','357831551180001','pemohon'),('NOVITA PRASETYA','Anye Nikenraras Rekian Probosiwi','081','085749649869','','','anyeniken9@gmail.com','Perum Royal Residence B9/32','3578164307920002','administrasi'),('NOVITA PRASETYA','Anye Nikenraras Rekian Probosiwi','081','085749649869','','','anyeniken9@gmail.com','Perum Royal Residence B9/32','3578164307920002','setup/teknis'),('NOVITA PRASETYA','Anye Nikenraras Rekian Probosiwi','081','085749649869','','','anyeniken9@gmail.com','Perum Royal Residence B9/32','3578164307920002','penagihan'),('NOVITA PRASETYA','Anye Nikenraras Rekian Probosiwi','081','085749649869','','','anyeniken9@gmail.com','Perum Royal Residence B9/32','3578164307920002','support/teknis'),('NOVITA PRASETYA','Anye Nikenraras Rekian Probosiwi','081','085749649869','','','anyeniken9@gmail.com','Perum Royal Residence B9/32','3578164307920002','penanggungjawab'),('PT ELSON BERNARDI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7510307','081281281212','','hanny_stb@yahoo.com ','Prambanan Residence AF 7 Surabaya ','3578272110760001','pemohon'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7510307','081281281212','','hanny_stb@yahoo.com ','Prambanan Residence AF 7 Surabaya ','3578272110760001','penanggungjawab'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7510307','081281281212','','hanny_stb@yahoo.com ','Prambanan Residence AF 7 Surabaya ','3578272110760001','administrasi'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7510307','081281281212','','hanny_stb@yahoo.com ','Prambanan Residence AF 7 Surabaya ','3578272110760001','setup/teknis'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7510307','081281281212','','hanny_stb@yahoo.com ','Prambanan Residence AF 7 Surabaya ','3578272110760001','penagihan'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7510307','081281281212','','hanny_stb@yahoo.com ','Prambanan Residence AF 7 Surabaya ','3578272110760001','support/teknis'),('SEKAR PRIMA ABADI, PT','BASKORO DWI TJAHJONO','021','','085697719083','','slashcore@yahoo.com','','','pemohon'),('BANGUN ABADI TEKNOLOGI INDONESIA, PT','JOKY ARTO SETIAWAN','021','','0838 9669 968','','joky @ mybati.co.id','','','pemohon'),('BANGUN ABADI TEKNOLOGI INDONESIA, PT','JOE MASHARI','021','5366 2075','','','joe @ mybati.co.id','','','support/teknis'),('BANGUN ABADI TEKNOLOGI INDONESIA, PT','FITRI','021','5366 2075','','','fitri @ mybati.co.id','','','administrasi'),('LIK MARGOMULYO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','91015338','','steven@suryasukses.com','','','pemohon'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','91015338','','steven@suryasukses.com','','','setup/teknis'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','91015338','','steven@suryasukses.com','','','support/teknis'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','91015338','','steven@suryasukses.com','','','administrasi'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Ongko Wardoyo','031','5030450','','','','','','penanggungjawab'),('MULTIPLAST INDO MAKMUR, PT','Ibu Chen Chen','031','5030450','','','','','','penagihan'),('PETRO GRAHA MEDIKA, PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('RS ROYAL SURABAYA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('LINTAS NIAGA, PT ( SURABAYA)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('IUWASH - USAID',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('ADHI KARYA, PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT INDO VEGETABLE OIL INDUSTRY',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','Mig Marsen Saleh','031','7322800','081216282650','','migmarsensaleh@yahoo.co.id','','','pemohon'),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','Mig Marsen Saleh','031','7322800','081216282650','','migmarsensaleh@yahoo.co.id','','','setup/teknis'),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','Mig Marsen Saleh','031','7322800','081216282650','','migmarsensaleh@yahoo.co.id','','','support/teknis'),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','Christin','031','7322800','','','','','','administrasi'),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','Christin','031','7322800','','','','','','penagihan'),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','Susanto Hendradihardja','031','7322800','','','','','','penanggungjawab'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Donny Manuarva','031','5451899','0811307693','','donny.manuarva@icbc-center.com','','','pemohon'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Donny Manuarva','031','5451899','0811307693','','donny.manuarva@icbc-center.com','','','penanggungjawab'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Shanty','031','5451899','','','','','','administrasi'),('SUPRAINTI LAND, PT  (ICBC CENTER)','Zulfa','031','5451899','','','','','','penagihan'),('SUPRAINTI LAND, PT  (ICBC CENTER)','karjani','031','5451899','','','','','','setup/teknis'),('SUPRAINTI LAND, PT  (ICBC CENTER)','karjani','031','5451899','','','','','','support/teknis'),('BASELINE COMMUNICATE (BC TRACK)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('BASELINE COMMUNICATE (BC TRACK)','AGIEL BAABUD','021','7918 7050','0821 243 8888','','agiel @ bctrack.com','','','pemohon'),('BASELINE COMMUNICATE (BC TRACK)','METI INDRIANI','021','7918 7050','','','meti.finance @ bctrack.com','','','penagihan'),('BASELINE COMMUNICATE (BC TRACK)','MAULANA KURNIANTORO','021','7918 7050','','','maulana.technicalsupport @ bctrack.com','','','support/teknis'),('PARADISE PERKASA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PARADISE PERKASA','SEAN ISMAIL','021','628 8319','0815 910 6555','','sean @ paradiseperkasa.com','','','pemohon'),('PARADISE PERKASA','DANIEL LUN','021','628 8319','','','daniellun @ paradiseperkasa.com','','','penanggungjawab'),('PARADISE PERKASA','BUDI LAMBOK','021','628 8319','','','budi.lambok @ paradiseperkasa.com','','','penagihan'),('KAJIMA INDONESIA, PT','RADEN ACHSAN','021','572 4477 ','','','r.achsan @ kajima.co.id','','','pemohon'),('KAJIMA INDONESIA, PT','LF. YANTI ','021','572 4477','','','accounting @ kajima.co.id ','','','penagihan'),('IWAN SULISTIANTO','IWAN SULISTIANTO','031','841 4398','0815 8587 343','','iwan @ platinumlogistic.com','','','pemohon'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Wahyu Tri Lakasono','021','3929828','','','wahyu.laksono@mncland.com','','3174100310900002','pemohon'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Wahyu Tri Lakasono','021','3929828','','','wahyu.laksono@mncland.com','','','administrasi'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Ibnu Hisyam','','','085716374547','','ibnu.hisyam@mncland.com','','','setup/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Ibnu Hisyam','','','085716374547','','ibnu.hisyam@mncland.com','','','support/teknis'),('JESSIE ADHISTIA ','Jessi Adhistia','','','0811819292','','jessie_adhistia@yahoo.com','Jl. Imperial Beach F-15 No. 32, Pakuwon City - Palm Beach','3515084707870004','pemohon'),('KARYA MITRA BERSAMA, PT','Edwin Hanafy','','','08123003338','','leicht_surabaya@yahoo.com','','3578070311830002','pemohon'),('KARYA MITRA BERSAMA, PT','Edwin Hanafy','','','08123003338','','leicht_surabaya@yahoo.com','','3578070311830002','penanggungjawab'),('KARYA MITRA BERSAMA, PT','Arinda','031','81118088','','','hunterdouglas_adm@yahoo.com','','','administrasi'),('KARYA MITRA BERSAMA, PT','Djoen','','','08155012551','','leicht_surabaya@yahoo.com','','','setup/teknis'),('KARYA MITRA BERSAMA, PT','Arinda','031','81118088','','','hunterdouglas_adm@yahoo.com','','','penagihan'),('KARYA MITRA BERSAMA, PT','Djoen','','','08155012551','','leicht_surabaya@yahoo.com','','','support/teknis'),('IMEDIA CIPTA, PT','Jannes Halim','','','081330388938','','jannes@imediacipta.com','','3578221105720002','pemohon'),('IMEDIA CIPTA, PT','Jannes Halim','','','081330388938','','jannes@imediacipta.com','','3578221105720002','penanggungjawab'),('IMEDIA CIPTA, PT','Fanny Ang','','','081357379300','','fanny@imediacipta.com','','','administrasi'),('IMEDIA CIPTA, PT','Jannes Halim','','','081330388938','','jannes@imediacipta.com','','','setup/teknis'),('IMEDIA CIPTA, PT','Fanny Ang','','','081357379300','','fanny@imediacipta.com','','','penagihan'),('IMEDIA CIPTA, PT','Jannes Halim','','','081330388938','','jannes@imediacipta.com','','','support/teknis'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@chiropractic-first.org','','3578154905750001','pemohon'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@chiropractic-first.org','','3578154905750001','penanggungjawab'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@chiropractic-first.org','','','administrasi'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@chiropractic-first.org','','','setup/teknis'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@chiropractic-first.org','','','penagihan'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@chiropractic-first.org','','','support/teknis'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','031','7522559','08113348853','','asihsrigati@gmail.com','','3578295506760001','pemohon'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','031','7522559','08113348853','','asihsrigati@gmail.com','','3578295506760001','penanggungjawab'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','','','08113348853','','asihsrigati@gmail.com','','','administrasi'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','','','08113348853','','asihsrigati@gmail.com','','','setup/teknis'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','','','08113348853','','asihsrigati@gmail.com','','','penagihan'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','','','08113348853','','asihsrigati@gmail.com','','','support/teknis'),('PAULUS OTTO HARMAN','Paulus Otto Harman','','','087888639158','','lonewolfffffff@yahoo.com','','3578312710730002','pemohon'),('PAULUS OTTO HARMAN','Paulus Otto Harman','','','087888639158','','lonewolfffffff@yahoo.com','','3578312710730002','penanggungjawab'),('PAULUS OTTO HARMAN','Aneke Johana','','','081615101620','','anneke_wawolangi@yahoo.com','','','administrasi'),('PAULUS OTTO HARMAN','Paulus Otto Harman','','','087888639158','','lonewolfffffff@yahoo.com','','','setup/teknis'),('PAULUS OTTO HARMAN','Aneke Johana','','','081615101620','','anneke_wawolangi@yahoo.com','','','penagihan'),('PAULUS OTTO HARMAN','Paulus Otto Harman','','','087888639158','','lonewolfffffff@yahoo.com','','','support/teknis'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','Agus Widjaja','','','081331976789','','vp@zoomsmarthotels.com','','3578241708860001','pemohon'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','Agus Widjaja','','','081331976789','','vp@zoomsmarthotels.com','','3578241708860001','penanggungjawab'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','Rina Rosmataty','','','081232967911','','exec.sec@zoomsmarthotels.com','','','administrasi'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','Achmad Ali','','','087852325233','','eng.zjs@zoomsmarthotels.com','','','setup/teknis'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','Rina Rosmataty','','','081232967911','','exec.sec@zoomsmarthotels.com','','','penagihan'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','Achmad Ali','','','087852325233','','eng.zjs@zoomsmarthotels.com','','','support/teknis'),('SINAR PULAU SERIBU, PT','Benedictus Wiryanto ','031','5343915','083849951300','','bennyliciouz@gmail.com','Jl. jaksa Agung Suprapto 41 Kav. 8 - 10 Surabaya ','3578041007860005','pemohon'),('SINAR PULAU SERIBU, PT','Benedictus Wiryanto ','031','5343915','083849951300','','bennyliciouz@gmail.com','Jl. jaksa Agung Suprapto 41 Kav. 8 - 10 Surabaya ','3578041007860005','setup/teknis'),('SINAR PULAU SERIBU, PT','Benedictus Wiryanto ','031','5343915','083849951300','','bennyliciouz@gmail.com','Jl. jaksa Agung Suprapto 41 Kav. 8 - 10 Surabaya ','3578041007860005','support/teknis'),('SINAR PULAU SERIBU, PT','Harry Buddymin Prasetyo ','031','5343915','','','','Jl. Jaksa Agung Suprapto 41 Kav. 8 - 10 Surabaya ','12.5612.041047.0001','penanggungjawab'),('SINAR PULAU SERIBU, PT','Maria ','031','5343915','','','','Jl. Jaksa Agung Suprapto 41 Kav. 8 - 10 Surabaya ','','administrasi'),('SINAR PULAU SERIBU, PT','MEME','031','534532','','','','Jl. Jaksa Agung Suprapto 41 Kav. 8 - 10 Surabaya ','','penagihan'),('PT. MULTI BETON KARYA MANDIRI','Nanik Hariani','031','8052000','081331159799','','multi_beton01@yahoo.co.id','Jl. Pondok Jati Blok AI No. 5, Sidoarjo','3525136101690001','pemohon'),('PT. MULTI BETON KARYA MANDIRI','Hadi Sunaryo','','','08123276077','','multi_beton01@yahoo.co.id','Jl. Pondok Jati Blok AI No. 5, Sidoarjo','3515081804610001','penanggungjawab'),('PT. MULTI BETON KARYA MANDIRI','Nanik Hariani','031','8052000','081331159799','','multi_beton01@yahoo.co.id','','','administrasi'),('PT. MULTI BETON KARYA MANDIRI','Putut','','','081330336296','','multi_beton01@yahoo.co.id','','','setup/teknis'),('PT. MULTI BETON KARYA MANDIRI','Nanik Hariani','031','8052000','081331159799','','multi_beton01@yahoo.co.id','','','penagihan'),('PT. MULTI BETON KARYA MANDIRI','Putut','','','081330336296','','multi_beton01@yahoo.co.id','','','support/teknis'),('PT. WONOKOYO JAYA  CORPORINDO','Prasetyo Pribadi','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1- 7 Surabaya ','3578101110068003','pemohon'),('PT. WONOKOYO JAYA  CORPORINDO','Djojo Kusumo ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1- 7 Surabaya ','12.5611.150443.0002','penanggungjawab'),('PT. WONOKOYO JAYA  CORPORINDO','Dedik Hermanto ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1- 7 Surabaya ','','administrasi'),('PT. WONOKOYO JAYA  CORPORINDO','Dedik Hermanto ','031','2956000','','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1- 7 Surabaya ','','penagihan'),('PT. WONOKOYO JAYA  CORPORINDO','Arditya ','031','2956000','085648048011','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1- 7 Surabaya ','','support/teknis'),('PT. WONOKOYO JAYA  CORPORINDO','Arditya ','031','2956000','085648048011','','wjcpusat@indo.net.id','Jl. Taman Bungkul 1- 7 Surabaya ','','setup/teknis'),('JENNY RACHMAN ','Jenny Rachman','031','91920088','','','jrachman@hotmail.com','Jl. San Antonio N9/23, Pakuwon City','317526404810007','pemohon'),('JENNY RACHMAN ','Jenny Rachman','031','91920088','','','jrachman@hotmail.com','Jl. San Antonio N9/23, Pakuwon City','317526404810007','penanggungjawab'),('JENNY RACHMAN ','Jenny Rachman','031','91920088','','','jrachman@hotmail.com','','','administrasi'),('JENNY RACHMAN ','Jenny Rachman','031','91920088','','','jrachman@hotmail.com','','','setup/teknis'),('JENNY RACHMAN ','Jenny Rachman','031','91920088','','','jrachman@hotmail.com','','','penagihan'),('JENNY RACHMAN ','Jenny Rachman','031','91920088','','','jrachman@hotmail.com','','','support/teknis'),('JESSIE ADHISTIA ','Jessie Adhistia','','','0811819292','','jessie_adhistia@yahoo.com','','3515084707870004','penanggungjawab'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','','','081234509997','','dwi@geospasia.com','Jl. Spring Tomorrow, Spring to Park No. 12, Kedungturi - Sidoarjo','3515072010790002','pemohon'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','','','081234509997','','dwi@geospasia.com','','3515072010790002','penanggungjawab'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','','','081234509997','','dwi@geospasia.com','','','administrasi'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','','','081234509997','','dwi@geospasia.com','','','setup/teknis'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','','','081234509997','','dwi@geospasia.com','','','penagihan'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','','','081234509997','','dwi@geospasia.com','','','support/teknis'),('PT. ESA ZONA EKSPRES','Machfudin','031','3281355','08175065009','','udin@ezexpress.net','Jl. Perak timur No. 296','3578082103810003','pemohon'),('STEPHEN LEONARD','Stephen Leonard','031','8492021','','','behemoth378@yahoo.co.id','Jl. Raya Kendangsari No. 40','3578242705910001','pemohon'),('STEPHEN LEONARD','Stephen Leonard','031','8492021','','','behemoth378@yahoo.co.id','Jl. Raya Kendangsari No. 40','3578242705910001','penanggungjawab'),('STEPHEN LEONARD','Stephen Leonard','031','8492021','','','behemoth378@yahoo.co.id','','','administrasi'),('STEPHEN LEONARD','Stephen Leonard','031','8492021','','','behemoth378@yahoo.co.id','','','setup/teknis'),('STEPHEN LEONARD','Stephen Leonard','031','8492021/3530288','','','behemoth378@yahoo.co.id','Jl. Rajawali No. 64 B','','penagihan'),('STEPHEN LEONARD','Stephen Leonard','031','8492021','','','behemoth378@yahoo.co.id','','','support/teknis'),('PT. MAHAGHORA','Harry Triono','031','3821487','081803899698','','harry@mahaghora.com','Jl. Kenjeran No. 546','3573022603370004','pemohon'),('PT. MAHAGHORA','Belly Atmadjaja','031','3821487','','','belly@mahaghora.com','Jl. Kenjeran No. 546','1256111102740001','penanggungjawab'),('PT. MAHAGHORA','Henny D','031','3821487','','','henny@mahaghora.com','','','administrasi'),('PT. MAHAGHORA','Harry Triono','','','081803899698','','harry@mahaghora.com','','','setup/teknis'),('PT. MAHAGHORA','Henny D','031','3821487','','','henny@mahaghora.com','','','penagihan'),('PT. MAHAGHORA','Harry Triono','','','081803899698','','harry@mahaghora.com','','','support/teknis'),('Indra','Indra ','031','8483136','0818579644','','indrajacobus@gmail.com','Pulo Wonokromo Wetan GgII No 2C Surabaya ','3578242008730001','pemohon'),('Indra','Indra ','031','8483136','0818579644','','indrajacobus@gmail.com','Pulo Wonokromo Wetan GgII No 2C Surabaya ','3578242008730001','administrasi'),('Indra','Indra ','031','8483136','0818579644','','indrajacobus@gmail.com','Pulo Wonokromo Wetan GgII No 2C Surabaya ','3578242008730001','setup/teknis'),('Indra','Indra ','031','8483136','0818579644','','indrajacobus@gmail.com','Pulo Wonokromo Wetan GgII No 2C Surabaya ','3578242008730001','penagihan'),('Indra','Indra ','031','8483136','0818579644','','indrajacobus@gmail.com','Pulo Wonokromo Wetan GgII No 2C Surabaya ','3578242008730001','penanggungjawab'),('PT. ROYAL STANDARD','Jaspis Permata','031','5676047','085731001343','','jpermata@royalstandard.co.id','Jl. Kapuk Kamal No. 45, Jakarta Utara','12.14.16.290975.0011','pemohon'),('PT. ROYAL STANDARD','Jhonny Katikno','031','5676047','081332076697','','jhonnybuy66@yahoo.com','Jl. Kapuk Kamal No. 45, Jakarta Utara','3578212308660001','penanggungjawab'),('PT. ROYAL STANDARD','Devi','031','5676047','','','','','','administrasi'),('PT. ROYAL STANDARD','Jaspis Permata','','','085731001343','','jpermata@royalstandard.co.id','','','setup/teknis'),('PT. ROYAL STANDARD','Devi','031','5676047','','','','','','penagihan'),('PT. ROYAL STANDARD','Jaspis Permata','','','085731001343','','jpermata@royalstandard.co.id','','','support/teknis'),('PT. SINMA LINES','Rudy Sujono','031','3291976','','','nautilus@rad.net.id','Jl. Perak Barat No. 245','3578212805660003','pemohon'),('PT. SINMA LINES','Rudy Sujono','031','3291976','','','nautilus@rad.net.id','Jl. Perak Barat No. 245','3578212805660003','penanggungjawab'),('PT. SINMA LINES','Tri Wuryani','031','3291976','','','reta_sinma@yahoo.com','','','administrasi'),('PT. SINMA LINES','Reta','031','3291976','','','reta_sinma@yahoo.com','','','setup/teknis'),('PT. SINMA LINES','Tri Wuryani','031','3291976','','','reta_sinma@yahoo.com','','','penagihan'),('PT. SINMA LINES','Reta','031','3291976','','','reta_sinma@yahoo.com','','','support/teknis'),('ISWAHJU SOEBAGIJO','Iswahju Soebagijo','031','3821202','0818301204','','isoebagijo@tigabeka.com','Jl. Pantai Mentari Blok B-III, Kenjeran-Bulak','3578101612660006','pemohon'),('ISWAHJU SOEBAGIJO','Iswahju Soebagijo','031','3821202','0818301204','','isoebagijo@tigabeka.com','Jl. Pantai Mentari Blok B-III, Kenjeran-Bulak','3578101612660006','penanggungjawab'),('ISWAHJU SOEBAGIJO','Dyah Ayu Dharmawati','031','3821202','081230038006','','dyah_ayu@tigabeka.com','','','administrasi'),('ISWAHJU SOEBAGIJO','Iswahju Soebagijo','','','0818301204','','isoebagijo@tigabeka.com','','','setup/teknis'),('ISWAHJU SOEBAGIJO','Dyah Ayu Dharmawati','031','3821202','081230038006','','dyah_ayu@tigabeka.com','','','penagihan'),('ISWAHJU SOEBAGIJO','Iswahju Soebagijo','','','0818301204','','isoebagijo@tigabeka.com','','','support/teknis'),('PIAZZA ITALIA','Nomensen Bia','031','51162967','081333330569','','nomensenbia@yahoo.com','','','pemohon'),('PIAZZA ITALIA','Nomensen Bia','031','51162967','081333330569','','nomensenbia@yahoo.com','','','setup/teknis'),('PIAZZA ITALIA','Nomensen Bia','031','51162967','081333330569','','nomensenbia@yahoo.com','','','support/teknis'),('PIAZZA ITALIA','Nomensen Bia','031','51162967','081333330569','','nomensenbia@yahoo.com','','','administrasi'),('PIAZZA ITALIA','Ibu Tiya','031','51162967','','','','','','penagihan'),('PIAZZA ITALIA','Ibu Naila Rahmawati','031','51162967','','','','','','penanggungjawab'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','','','steven@suryasukses.com','','','pemohon'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','','','steven@suryasukses.com','','','setup/teknis'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','','','steven@suryasukses.com','','','support/teknis'),('MULTIPLAST INDO MAKMUR, PT','Bpk. Steven','031','5030450','','','steven@suryasukses.com','','','administrasi'),('Singapore National Academy','Ms Sophy Octavia Alim','031','8531920','','','sophyalim@snaedu.org','','','pemohon'),('Singapore National Academy','Ms Sophy Octavia Alim','031','8531920','','','sophyalim@snaedu.org','','','penanggungjawab'),('Singapore National Academy','Ibu Anita','031','8531920','','','anitathomasyen@snaedu.org','','','administrasi'),('Singapore National Academy','Bpk. Satria','031','8531920','','','satriaramadhan@snaedu.org','','','setup/teknis'),('Singapore National Academy','Bpk. Satria','031','8531920','','','satriaramadhan@snaedu.org','','','support/teknis'),('Singapore National Academy','Ibu Happy Sulistiyowati','031','8531920','','',' Happysulistiyowati@snaedu.org','','','penagihan'),('Pulau Jaya Mandiri, PT','Ita Dwi Jayanti','031','8913888','087853861299','','ita@pulau jaya.com','','','pemohon'),('Pulau Jaya Mandiri, PT','Ita Dwi Jayanti','031','8913888','087853861299','','ita@pulau jaya.com','','','administrasi'),('Pulau Jaya Mandiri, PT','Ita Dwi Jayanti','031','8913888','087853861299','','ita@pulau jaya.com','','','penagihan'),('Pulau Jaya Mandiri, PT','Martin Fajar','031','8913888','','','fajar@drindonesia.com','','','setup/teknis'),('Pulau Jaya Mandiri, PT','Martin Fajar','031','8913888','','','fajar@drindonesia.com','','','support/teknis'),('Pulau Jaya Mandiri, PT','Daniel Pranoto','031','8913888','','','','','','penanggungjawab'),('LPJK','bapak hariyanto','031 ','','08121626171','','har_i20002000@yahoo.com','jl gayung sari X no 27','','setup/teknis'),('M qauzar','M qauzar','031','8495562','0817332021','','qautzar@gmail.com','jl. bendul merisi tengah  40 surabaya','','penanggungjawab'),('PUTRA LAUTAN SEJAHTERA PT','elisabeth tanaya','031','8710969','081703288551','','elisabeth_tanaya@yahoo.com','komplek pergudangan osowilangun permai B-20','','pemohon'),('WASKAWAN SUTANTO','waskawan sutanto','031','8674995','08212773911','','waskawan@yahoo.com','jl. pergudangan permata blok E 1 - 2 waru SDA','','penanggungjawab'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493439','0878595557777','','jonnygmb@yahoo.com','Margomulyo Permai Q21A Surabaya','3515071506760004','pemohon'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493439','0878595557777','','jonnygmb@yahoo.com','Margomulyo Permai Q21A Surabaya','3515071506760004','support/teknis'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493439','0878595557777','','jonnygmb@yahoo.com','Margomulyo Permai Q21A Surabaya','3515071506760004','penanggungjawab'),('PT. WAHANA TRITUNGGAL PERKASA ','Jonny Santoso ','031','7493439','0878595557777','','jonnygmb@yahoo.com','Margomulyo Permai Q21A Surabaya','3515071506760004','setup/teknis'),('PT. WAHANA TRITUNGGAL PERKASA ','Agustien ','031','7483439','','','','Margomulyo Permai Q21A Surabaya','','administrasi'),('PT. WAHANA TRITUNGGAL PERKASA ','Agustien ','031','7483439','','','','Margomulyo Permai Q21A Surabaya','','penagihan'),('BBTKLPP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('BBTKLPP','bapak ronny','031','3528847','08179341391','','ronnybtklsby@gmail.com','jl. sidoluhur no 12','','penanggungjawab'),('PT ELSON BERNARDI','Ivan Bernardi ','0343','639710','','','capcom_id@yahoo.com','','3515081710770003','pemohon'),('PT ELSON BERNARDI','Ivan Bernardi ','0343','639710','','','capcom_id@yahoo.com','','3515081710770003','penanggungjawab'),('PT ELSON BERNARDI','Yuni','0343','639710','','','','','','administrasi'),('PT ELSON BERNARDI','Yuni','0343','639710','','','','','','penagihan'),('PT ELSON BERNARDI','Kurnia Medianto ','0343','639710','087854557516','','kurnia@elsonbernardi.co.id','','','setup/teknis'),('PT ELSON BERNARDI','Kurnia Medianto ','0343','639710','087854557516','','kurnia@elsonbernardi.co.id','','','support/teknis'),('SEKAR BUMI, PT','bapak suryadi','031','8951910','081802194180','','edp@sekarbumi.com','j. sidoluhur 12','','support/teknis'),('PT. Eloda Mitra ','Ivan Bernardi ','031','8921995','','','capcom_id@yahoo.com','Komp. Industri Pergudangan Sinar Buduran B1 - B8 Raya Lingkar Timur Buduran SDA','357081710770003','pemohon'),('PT. Eloda Mitra ','Ivan Bernardi ','031','8921995','','','capcom_id@yahoo.com','Komp. Industri Pergudangan Sinar Buduran B1 - B8 Raya Lingkar Timur Buduran SDA','357081710770003','penanggungjawab'),('PT. Eloda Mitra ','Diah Retno ','031','8921995','','','diah@bernardi.co.id','Komp. Industri Pergudangan Sinar Buduran B1 - B8 Raya Lingkar Timur Buduran SDA','','administrasi'),('PT. Eloda Mitra ','Erik Purwaningtyas ','031','8921995','','','','Komp. Industri Pergudangan Sinar Buduran B1 - B8 Raya Lingkar Timur Buduran SDA','','penagihan'),('PT. Eloda Mitra ','Agung Kurniawan ','031','8921995','','','agung.kurniawan@bernardi.co.id','Komp. Industri Pergudangan Sinar Buduran B1 - B8 Raya Lingkar Timur Buduran SDA','','support/teknis'),('RAMA MANDIRI BANGKIT ABADI, PT','kuswana rama destian','031','8684848','081321727272','','rama.rmba@yahoo.co.id','jl raya tropodo 108','','pemohon'),('AUW ADE AUYONG','Aw Ade Auyong','031','','0818328707','08135722002','awade_auyong@yahoo.com','Pakuwon Indah Imperial Golf Regency AB6/60 Surabaya ','3578122609810002','pemohon'),('AUW ADE AUYONG','Aw Ade Auyong','031','','0818328707','08135722002','awade_auyong@yahoo.com','Pakuwon Indah Imperial Golf Regency AB6/60 Surabaya ','3578122609810002','penanggungjawab'),('AUW ADE AUYONG','Aw Ade Auyong','031','','0818328707','08135722002','awade_auyong@yahoo.com','Pakuwon Indah Imperial Golf Regency AB6/60 Surabaya ','3578122609810002','penagihan'),('AUW ADE AUYONG','Putri ','031','','08563107011','','putri.digital@gmail.com','Pakuwon Indah Imperial Golf Regency AB6/60 Surabaya ','','administrasi'),('AUW ADE AUYONG','Putri ','031','','08563107011','','putri.digital@gmail.com','Pakuwon Indah Imperial Golf Regency AB6/60 Surabaya ','','setup/teknis'),('AUW ADE AUYONG','Putri ','031','','08563107011','','putri.digital@gmail.com','Pakuwon Indah Imperial Golf Regency AB6/60 Surabaya ','','support/teknis'),('M91 RELOAD','Sareh Sudadi ','031','5911010','','','sas_sudadi@yahoo.com','Jl. Manyar Rejo VI/1 Surabaya ','12.5622.140373.0005','pemohon'),('M91 RELOAD','Liem Peter Sudjaja','031','5911010','','','sas_sudadi@yahoo.com','Jl. Manyar Rejo VI/1 Surabaya ','3578072403690001','penanggungjawab'),('M91 RELOAD','Yetik Sartika','031','5911010','','','','Jl. Manyar Rejo VI/1 Surabaya ','','administrasi'),('M91 RELOAD','Yetik Sartika','031','5911010','','','','Jl. Manyar Rejo VI/1 Surabaya ','','penagihan'),('M91 RELOAD','Sareh Sudadi ','031','5911010','','','sas_sudadi@yahoo.com','Jl. Manyar Rejo VI/1 Surabaya ','12.5622.140373.0005','support/teknis'),('M91 RELOAD','Sareh Sudadi ','031','5911010','','','sas_sudadi@yahoo.com','Jl. Manyar Rejo VI/1 Surabaya ','12.5622.140373.0005','setup/teknis'),('PT. DINAMIKA MAKMUR SENTOSA ','ADOLF RAGANG TEJOMONO ','031','8012054','081385043721','','ragang@dms.co.id','Pergudangan Sianr Gedangan B-23 Sidoarjo ','3216191808710002','pemohon'),('PT. DINAMIKA MAKMUR SENTOSA ','Daniel Utomo ','021','89841476','','','daniel@dms.co.id','Pergudangan Sianr Gedangan B-23 Sidoarjo ','3174061404680015','pemohon'),('PT. DINAMIKA MAKMUR SENTOSA ','Evy ','031','8012054','','','evy@dms.co.id','Pergudangan Sianr Gedangan B-23 Sidoarjo ','','administrasi'),('PT. DINAMIKA MAKMUR SENTOSA ','Evy ','031','8012054','','','evy@dms.co.id','Pergudangan Sianr Gedangan B-23 Sidoarjo ','','penagihan'),('PT. DINAMIKA MAKMUR SENTOSA ','Poedjo Sasongko ','031','8012054','','','poedjo@dms.co.id','Pergudangan Sianr Gedangan B-23 Sidoarjo ','','setup/teknis'),('PT. DINAMIKA MAKMUR SENTOSA ','Poedjo Sasongko ','031','8012054','','','poedjo@dms.co.id','Pergudangan Sianr Gedangan B-23 Sidoarjo ','','support/teknis'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','031','7491125','08123234760','','arief_poerniawan@yahoo.com','Jl. Margomulyo No. 44 Blok G 20-C','3578070507800002','pemohon'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','031','7491125','08123234760','','arief_poerniawan@yahoo.com','Jl. Margomulyo No. 44 Blok G 20-C','3578070507800002','penanggungjawab'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','','','08123234760','','arief_poerniawan@yahoo.com','','','administrasi'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','','','08123234760','','arief_poerniawan@yahoo.com','','','setup/teknis'),('PT. SUBUR BUANA RAYA','Natalina','','','08123009547','','arief_poerniawan@yahoo.com','','','penagihan'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','','','08123234760','','arief_poerniawan@yahoo.com','','','support/teknis'),('KOMUNITAS DEMOKRASI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('TOKO ASIA GOLF','Sadimin','031','5670430','081330363932','','','Jl. Mayjend Sungkono No. 142 Blok A-17','3517041002690002','pemohon'),('TOKO ASIA GOLF','Amardeep Singh','','','0811159992','','asiasport@cbn.net.id','Jl. Mayjend Sungkono No. 142 Blok A-17','3171020705840004','penanggungjawab'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','','','','administrasi'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','','','','setup/teknis'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','','','','penagihan'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','','','','support/teknis'),('ROBERT GUNAWAN','Robert Gunawan','','','081803899698','','harry@mahaghora.com','Jl. Wisata Bukit Mas Blok G No. 52','3174021205860006','pemohon'),('ROBERT GUNAWAN','Robert Gunawan','','','081803899698','','harry@mahaghora.com','Jl. Wisata Bukit Mas Blok G No. 52','3174021205860006','penanggungjawab'),('ROBERT GUNAWAN','Margaret','','','087851332338','','margaret@mahaghora.com','','','administrasi'),('ROBERT GUNAWAN','Harry Triono','','','081803899698','','harry@mahaghora.com','','','setup/teknis'),('ROBERT GUNAWAN','Margaret','','','087851332338','','margaret@mahaghora.com','','','penagihan'),('ROBERT GUNAWAN','Harry Triono','','','081803899698','','harry@mahaghora.com','','','support/teknis'),('PT. MAHAGHORA','Harry Triono','031','3821487','081803899698','','harry@mahaghora.com','Jl. Kenjeran No. 546','3573022603770004','pemohon'),('PT. MAHAGHORA','Titin','031','3894466','','','titin@mahaghora.com','','','administrasi'),('PT. MAHAGHORA','Titin','031','3894466','','','titin@mahaghora.com','','','penagihan'),('HERRI PRIJANTO','Herri Prijanto','031','8538051','0811318344','','eduardo.hendrianta@gmail.com','Jl. Muncul No. 16, Gedangan - Sidoarjo','3578082504630001','pemohon'),('HERRI PRIJANTO','Herri Prijanto','031','8538051','0811318344','','eduardo.hendrianta@gmail.com','Jl. Muncul No. 16, Gedangan - Sidoarjo','3578082504630001','penanggungjawab'),('HERRI PRIJANTO','Herri Prijanto','','','0811318344','','eduardo.hendrianta@gmail.com','','','administrasi'),('HERRI PRIJANTO','Eduardo Hendrianta','','','081703263747','','eduardo.hendrianta@gmail.com','','','setup/teknis'),('HERRI PRIJANTO','Herri Prijanto','','','0811318344','','eduardo.hendrianta@gmail.com','','','penagihan'),('HERRI PRIJANTO','Eduardo Hendrianta','','','081703263747','','eduardo.hendrianta@gmail.com','','','support/teknis'),('JOVITA HADI SUWITO','Jovita Hadi Suwito','031','5999747','','','pitscake@hotmail.com','Jl. Mulyosari Timur No. 68','3578266605820003','pemohon'),('JOVITA HADI SUWITO','Jovita Hadi Suwito','031','5999747','','','pitscake@hotmail.com','Jl. Mulyosari Timur No. 68','3578266605820003','penanggungjawab'),('JOVITA HADI SUWITO','Jovita Hadi Suwito','031','5999747','','','pitscake@hotmail.com','','','administrasi'),('JOVITA HADI SUWITO','Jovita Hadi Suwito','031','5999747','','','pitscake@hotmail.com','','','setup/teknis'),('JOVITA HADI SUWITO','Jovita Hadi Suwito','031','5999747','','','pitscake@hotmail.com','','','penagihan'),('JOVITA HADI SUWITO','Jovita Hadi Suwito','031','5999747','','','pitscake@hotmail.com','','','support/teknis'),('PT. UNINET MEDIA SAKTI','Sunaryo','031','5466615','031-71111804','','ryo@sby.uninet.net.id','Jl. Panglima Sudirman No. 101-103 (Intiland Tower Lantai 11 No. 3 A)','3574031211800006','pemohon'),('PT. UNINET MEDIA SAKTI','Lie Widjaja Hermawan','021','5702074','','','lwh@uninet.net.id','Jl. Panglima Sudirman No. 101-103 (Intiland Tower Lantai 11 No. 3 A)','620512057810','penanggungjawab'),('PT. UNINET MEDIA SAKTI','Trias Rahmawati','031','5466615','','','trias@sby.uninet.net.id','','','administrasi'),('PT. UNINET MEDIA SAKTI','Gunawan','031','5466615','','','gunawan@sby.uninet.net.id','','','setup/teknis'),('PT. UNINET MEDIA SAKTI','Naptali','021','7940911','','','naptali@uninet.net.id','','','penagihan'),('PT. UNINET MEDIA SAKTI','Gunawan','031','5466615','','','gunawan@sby.uninet.net.id','','','support/teknis'),('VINCENTIUS CHRISTOFAN','Vincentius Christofan','031','3552632','083857125042','','dedek_kevin@yahoo.com','Jl. Bongkaran No. 67','1256233112900001','pemohon'),('VINCENTIUS CHRISTOFAN','Vincentius Christofan','031','3552632','083857125042','','dedek_kevin@yahoo.com','Jl. Bongkaran No. 67','1256233112900001','penanggungjawab'),('VINCENTIUS CHRISTOFAN','Vincentius Christofan','031','3552632','083857125042','','dedek_kevin@yahoo.com','','','administrasi'),('VINCENTIUS CHRISTOFAN','Vincentius Christofan','031','3552632','083857125042','','dedek_kevin@yahoo.com','','','setup/teknis'),('VINCENTIUS CHRISTOFAN','Vincentius Christofan','031','3552632','083857125042','','dedek_kevin@yahoo.com','','','penagihan'),('VINCENTIUS CHRISTOFAN','Vincentius Christofan','031','3552632','083857125042','','dedek_kevin@yahoo.com','','','support/teknis'),('DEVIN EFENDI','Devin Efendi','031','7385855','083899227777','','devinefendi1@gmail.com','Jl. Graha Family Blok L No. 159','3578270506900001','pemohon'),('DEVIN EFENDI','Devin Efendi','031','7385855','083899227777','','devinefendi1@gmail.com','Jl. Graha Family Blok L No. 159','3578270506900001','penanggungjawab'),('DEVIN EFENDI','Devin Efendi','','','083899227777','','devinefendi1@gmail.com','','','administrasi'),('DEVIN EFENDI','Devin Efendi','','','083899227777','','devinefendi1@gmail.com','','','setup/teknis'),('DEVIN EFENDI','Devin Efendi','','','083899227777','','devinefendi1@gmail.com','','','penagihan'),('DEVIN EFENDI','Devin Efendi','','','083899227777','','devinefendi1@gmail.com','','','support/teknis'),('JESSIE ADHISTIA ','Jessie Adhistia','','','0811819292','','jessie_adhistia@yahoo.com','Jl. Pakuwon City Imperial Beach Blok F 15 No. 32','3515084707870004','pemohon'),('JESSIE ADHISTIA ','Jessie Adhistia','','','0811819292','','jessie_adhistia@yahoo.com','Jl. Pakuwon City Imperial Beach Blok F 15 No. 32','3515084707870004','penanggungjawab'),('JESSIE ADHISTIA ','Eric Kurniawan','','','0811819292','08123028882','','','','administrasi'),('JESSIE ADHISTIA ','Eric Kurniawan','','','0811819292','08123028882','','','','setup/teknis'),('JESSIE ADHISTIA ','Eric Kurniawan','','','0811819292','08123028882','','','','penagihan'),('JESSIE ADHISTIA ','Eric Kurniawan','','','0811819292','08123028882','','','','support/teknis'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','081803297471','','melford_d@yahoo.com','Jl. Graha Family Blok I No. 37','3578211403730001','pemohon'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','081803297471','','melford_d@yahoo.com','Jl. Graha Family Blok I No. 37','3578211403730001','penanggungjawab'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','','','melford_d@yahoo.com','','','administrasi'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','','','melford_d@yahoo.com','','','setup/teknis'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','','','melford_d@yahoo.com','','','penagihan'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','','','melford_d@yahoo.com','','','support/teknis'),('TOKO VIRGO','Adi Tjandra','031','3281087','08121711000','','virgocard@gmail.com','Jl. Teluk Nibung No. 22','3578120906800002','pemohon'),('TOKO VIRGO','Adi Tjandra','031','3281087','08121711000','','virgocard@gmail.com','Jl. Teluk Nibung No. 22','3578120906800002','penanggungjawab'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','031','7327533','081703524493','','wa2n_setiawan38@yahoo.com','Jl. Darmo Permai Timur No. 4 A','3578102805720009','pemohon'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','031','7327533','085230008087','','m3riani@yahoo.com','Jl. Darmo Permai Timur No. 4 A','3578185010840006','penanggungjawab'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','','','085230008087','','m3riani@yahoo.com','','','administrasi'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','','','081703524493','','wa2n_setiawan38@yahoo.com','','','setup/teknis'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','','','085230008087','','m3riani@yahoo.com','','','penagihan'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','','','081703524493','','wa2n_setiawan38@yahoo.com','','','support/teknis'),('PT. DOLE FOOD INDONESIA','Anggi Setyawan','031','7492588','081373438500','','anggi.setyawan@doleintl.com','Jl. Margomulyo Permai Blok N No. 21','1871110803890001','pemohon'),('PT. DOLE FOOD INDONESIA','Anggi Setyawan','031','7492588','081373438500','','anggi.setyawan@doleintl.com','Jl. Margomulyo Permai Blok N No. 21','1871110803890001','penanggungjawab'),('PT. DOLE FOOD INDONESIA','Anggi Setyawan','','','081373438500','','anggi.setyawan@doleintl.com','','','administrasi'),('PT. DOLE FOOD INDONESIA','Anggi Setyawan','','','081373438500','','anggi.setyawan@doleintl.com','','','setup/teknis'),('PT. DOLE FOOD INDONESIA','Amir Farid','','','085715111713','','amir.farid@doleintl.com','','','penagihan'),('PT. DOLE FOOD INDONESIA','Anggi Setyawan','','','081373438500','','anggi.setyawan@doleintl.com','','','support/teknis'),('PT. TLATAH GEMA ANUGRAH','Yusak','031','99005376','081232656857','','yusakinah@yahoo.com','Jl. Dr. Ir. Soekarno - MERR (Ruko Icon 21 Blok S-10)','3578201201730001','pemohon'),('PT. TLATAH GEMA ANUGRAH','Hengky Budiharto','031','99005376','','','yusakinah@yahoo.com','Jl. Dr. Ir. Soekarno - MERR (Ruko Icon 21 Blok S-10)','3578260209610002','penanggungjawab'),('PT. TLATAH GEMA ANUGRAH','Yusak','','','081232656857','','yusakinah@yahoo.com','','','administrasi'),('PT. TLATAH GEMA ANUGRAH','Aris Sunapta','','','087830702844','','arismysql07@yahoo.co.id','','','setup/teknis'),('PT. TLATAH GEMA ANUGRAH','Yusak','','','081232656857','','yusakinah@yahoo.com','','','penagihan'),('PT. TLATAH GEMA ANUGRAH','Aris Sunapta','','','087830702844','','arismysql07@yahoo.co.id','','','support/teknis'),('PT. BENTENG PERSADA MULTINDO','Dicky Christanto','031','3766722','081331060699','','dicky2mail@gmail.com','Jl. Kedung Cowek No. 235','3626020705700002','pemohon'),('PT. BENTENG PERSADA MULTINDO','Dicky Christanto','031','3766722','081331060699','','dicky2mail@gmail.com','Jl. Kedung Cowek No. 235','3626020705700002','penanggungjawab'),('PT. BENTENG PERSADA MULTINDO','Desy','031','3766722','','','dicky2mail@gmail.com','','','administrasi'),('PT. BENTENG PERSADA MULTINDO','Dicky Christanto','','','081331060699','','dicky2mail@gmail.com','','','setup/teknis'),('PT. BENTENG PERSADA MULTINDO','Desy','031','3766722','','','dicky2mail@gmail.com','','','penagihan'),('PT. BENTENG PERSADA MULTINDO','Dicky Christanto','','','081331060699','','dicky2mail@gmail.com','','','support/teknis'),('HAEGOONG INTERACTIVE, PT','HEE YOUNG PARK','021','','081 189 1104','','henrypark @ gmail.com','','','pemohon'),('SEKAR PRIMA ABADI, PT','BASKORO DWI TJAHJONO','021','0856 9771 9083','','','slashcore@yahoo.com','','','pemohon'),('CITRA GEMILANG OTOMOTIF, PT (MASERATTI)','AHMAD SUTIAWAN','021','7591 8775','0821 2551 410','','ahmad @ maserati-indonesia.com','','','pemohon'),('CITRA GEMILANG OTOMOTIF, PT (MASERATTI)','NILA','021','','0877 7456 946','','nila @ maserati-indonesia.com','','','administrasi'),('CITRA GEMILANG OTOMOTIF, PT (MASERATTI)','SHINTA','021','','081 7986 7239','','shinta @ clo.co.id','','','penagihan'),('CITRA GEMILANG OTOMOTIF, PT (MASERATTI)','ERMAN','021','','0812 9468 082','','erman @ clo.co.id','','','support/teknis'),('EVERYDAY SMART HOTEL','RACHMAN FAJAR S.','021','','0821 8223 236','','hm.manggabesar @ everydaysmarthotels.com','','','pemohon'),('PT. AREK SURABAYA TELEVISI JATIM','Tommy Hartopo','031','91000048','081802721578','','tommyhartopo@yahoo.com','Jl. Raya Kahuripan - Ruko Boulevard Blok R No. 39 (Perumahan KNV), Sidoarjo','357.305.071278.0001','pemohon'),('PT. AREK SURABAYA TELEVISI JATIM','Rahardjo Zaini','031','91000048','','','tommyhartopo@yahoo.com','Jl. Raya Kahuripan - Ruko Boulevard Blok R No. 39 (Perumahan KNV), Sidoarjo','','penanggungjawab'),('PT. AREK SURABAYA TELEVISI JATIM','Khafid R Wastuyana','','','081217671800','','khafid.wastuyana@gmail.com','','','administrasi'),('PT. AREK SURABAYA TELEVISI JATIM','Atok Suparyanto','','','081556668439','08883026396','batoksuratok@yahoo.com','','','setup/teknis'),('PT. AREK SURABAYA TELEVISI JATIM','Khafid R Wastuyana','','','081217671800','','khafid.wastuyana@gmail.com','','','penagihan'),('PT. AREK SURABAYA TELEVISI JATIM','Atok Suparyanto','','','081556668439','08883026396','batoksuratok@yahoo.com','','','support/teknis'),('PT. MAHAGHORA','Harry Triono','031','3821487','081803899698','','harry@mahaghora.com','Jl. Raya Kenjeran No. 546','3573022603770004','pemohon'),('PT. MAHAGHORA','Belly Atmajaya','031','3821487','','','belly@mahaghora.com','Jl. Raya Kenjeran No. 546','1256111102740001','penanggungjawab'),('BERKAT ABBA INDONESIA, PT','Machfudin','031','3281355','08175065009','','udin@ezexpress.net','Jl. Raya Trosobo No. 35, Sidoarjo','3578082103810003','pemohon'),('BERKAT ABBA INDONESIA, PT','Machfudin','031','3281355','08175065009','','udin@ezexpress.net','Jl. Raya Trosobo No. 35, Sidoarjo','3578082103810003','penanggungjawab'),('BERKAT ABBA INDONESIA, PT','Tika Adelia','031','7885122','','','tika_berkatabba@yahoo.co.id','','','administrasi'),('BERKAT ABBA INDONESIA, PT','Machfudin','','','08175065009','','udin@ezexpress.net','','','setup/teknis'),('BERKAT ABBA INDONESIA, PT','Tika Adelia','031','7885122','','','tika_berkatabba@yahoo.co.id','','','penagihan'),('BERKAT ABBA INDONESIA, PT','Machfudin','','','08175065009','','udin@ezexpress.net','','','support/teknis'),('INSAN CENDEKIA, CV','Wisudana Arisaptomo','031','3813021','0811348602','','wisudana@yahoo.com','Jl. Kaliwaron No. 58','3578100712850010','pemohon'),('INSAN CENDEKIA, CV','Wisudana Arisaptomo','031','3813021','0811348602','','wisudana@yahoo.com','Jl. Kaliwaron No. 58','3578100712850010','penanggungjawab'),('Test Malang',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Test Malang','ketut','031','5616330','08123585124','','ketut@padi.net.id','Mayjend Sungkono 83 Surabaya','123499992222000','pemohon'),('Test Malang','Suyanto','031','5616330','0812345567','','yanto@padi.net.id','Mayjend Sungkono 83 Surabaya','123499992222000','support/teknis'),('Test Malang','naning','031','5616330','','','naning@padi.net.id','Mayjend Sungkono 83 Surabaya','123499992222000','administrasi'),('Test Malang','Suyanto','031','5616330','0812345567','','yanto@padi.net.id','Mayjend Sungkono 83 Surabaya','123499992222000','setup/teknis'),('Test Malang','naning','031','5616330','','','naning@padi.net.id','Mayjend Sungkono 83 Surabaya','123499992222000','penagihan'),('P.Yuseen ( Pak Rahmadi )',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('SUHARIONO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('REDISA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('NOTARIS MAYAHASANAH',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT.Essilor Indonesia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('KIWOOM SECURITIES INDONESIA, PT','FERNANDUS STEWARD','021','526 1326','0856 184 2020','','fernandus @ kiwoom.co.id ','','','pemohon'),('KIWOOM SECURITIES INDONESIA, PT','NUKE','021','536 1326','','','nuke13 @ kiwoom.co.id ','','','administrasi'),('KIWOOM SECURITIES INDONESIA, PT','ASRIA MANIK','021','536 1326','','','asria @ kiwoom.co.id ','','','penagihan'),('SARANA MEDIA SELARAS (SMS) ABADI','YUDHO ARIE WIBOWO','021','','081 7493 9956','','yodho @ smsabadi.com','','','pemohon'),('SARANA MEDIA SELARAS (SMS) ABADI','HERDIAN FERDIANTO','021','','081 2336 8855','','herdian @ smsabadi.com','','','setup/teknis'),('SUCOFINDO - SBU GOVERMENT','SURYADENIE RAHMAT SOMANTRI','021','','081 198 3314','','srahmat @ sucofindo.co.id','','','pemohon'),('SUCOFINDO - SBU GOVERMENT','ENDANG SUNARDI','021','','0812 8830 136','','endang @ sucofindo.co.id','','','support/teknis'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','ARIE CHRISTOPER S','021','766 1533','','','arie @ sso.co.id','','','pemohon'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','ERMAN','021','766 1533','','','erman @ clo.co.id','','','setup/teknis'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','SHINTA','021','766 1533','','','shinta @ clo.co.id','','','administrasi'),('FAJAR DIRGANTARA','FAJAR DIRGHANTARA','021','','081 820 6079','','fajar @ transsolver.com','','','pemohon'),('FAJAR DIRGANTARA','RAHMADIAN L. A.','021','','081 122 7703','','endhooot @ gmail.com','','','penagihan'),('PT. BORWITA INDAH','Alex Wijoyo','031','7889777','08884396041','','alex.w@borwita.co.id','Jl. Kunir No. 9','3578260202760006','pemohon'),('PT. BORWITA INDAH','Alex Wijoyo','031','7889777','08884396041','','alex.w@borwita.co.id','Jl. Kunir No. 9','3578260202760006','penanggungjawab'),('PT. BORWITA INDAH','Alex Wijoyo','031','7889777','08884396041','','alex.w@borwita.co.id','','','administrasi'),('PT. BORWITA INDAH','Raditya','','','08883062696','','it.radit@borwita.co.id','','','setup/teknis'),('PT. BORWITA INDAH','Feniam','031','3522405/3526762','','','','','','penagihan'),('PT. BORWITA INDAH','Raditya','','','08883062696','','it.radit@borwita.co.id','','','support/teknis'),('The British Institute ( TBI )',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','031','71708778','087855277767','','spicy_4165@yahoo.com','Jl. Manyar Sabrangan IX C/1 A','3578262510820001','pemohon'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','031','71708778','087855277767','','spicy_4165@yahoo.com','Jl. Manyar Sabrangan IX C/1 A','3578262510820001','penanggungjawab'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','','','087855277767','','spicy_4165@yahoo.com','','','administrasi'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','','','087855277767','','spicy_4165@yahoo.com','','','setup/teknis'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','','','087855277767','','spicy_4165@yahoo.com','','','penagihan'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','','','087855277767','','spicy_4165@yahoo.com','','','support/teknis'),('PT. MELILEA INTERNATIONAL INDONESIA','Nur Azizah','031','7325977','','','chici_nurazizah@yahoo.com','Jl. Raya Sukomanunggal Jaya No. 5 (Ruko Satelit Town Square Blok A No. 17-19)','3571014252800004','pemohon'),('PT. MELILEA INTERNATIONAL INDONESIA','Nur Azizah','031','7325977','','','chici_nurazizah@yahoo.com','Jl. Raya Sukomanunggal Jaya No. 5 (Ruko Satelit Town Square Blok A No. 17-19)','3571014252800004','penanggungjawab'),('PT. MELILEA INTERNATIONAL INDONESIA','Nur Azizah','031','7325977','','','chici_nurazizah@yahoo.com','','','administrasi'),('PT. MELILEA INTERNATIONAL INDONESIA','Nur Azizah','031','7325977','','','chici_nurazizah@yahoo.com','','','setup/teknis'),('PT. MELILEA INTERNATIONAL INDONESIA','Nur Azizah','031','7325977','','','chici_nurazizah@yahoo.com','','','penagihan'),('PT. MELILEA INTERNATIONAL INDONESIA','Nur Azizah','031','7325977','','','chici_nurazizah@yahoo.com','','','support/teknis'),('PT. UNINET MEDIA SAKTI','Sunaryo','031','5466615','03171111804','','ryo@sby.uninet.net.id','Jl. Panglima Sudirman No. 101-103 (Intiland Tower Lantai 11 No. 3 A)','3574031211800006','pemohon'),('PT. UNINET MEDIA SAKTI','Lie Widjaja Hermawan','021','5702074','','','lwh@uninet.net.id','Jl. Warung Buncit Raya No. 25','620512057810','penanggungjawab'),('tes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('MIMI SCHOOL','Ratna Endang Hartatiek','031','7314144','','','ratnaeht@yahoo.com','Jl. H.R. Muhammad No. 104','3578058302590001','pemohon'),('MIMI SCHOOL','Ratna Endang Hartatiek','031','7314144','','','ratnaeht@yahoo.com','Jl. H.R. Muhammad No. 104','3578058302590001','penanggungjawab'),('MIMI SCHOOL','Iqmal Cahyo Kurniawan','031','7314144','08883507777','','mimi.school@yahoo.co.id','','','administrasi'),('MIMI SCHOOL','Iqmal Cahyo Kurniawan','031','7314144','08883507777','','mimi.school@yahoo.co.id','','','setup/teknis'),('MIMI SCHOOL','Iqmal Cahyo Kurniawan','031','7314144','08883507777','','mimi.school@yahoo.co.id','','','penagihan'),('MIMI SCHOOL','Iqmal Cahyo Kurniawan','031','7314144','08883507777','','mimi.school@yahoo.co.id','','','support/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Ibnu Hisyam','031','5957111','085716374547','','ibnu.hisyam@mncgroup.com','Jl. Kertajaya Indah Timur Blok S-III No. 27','3172022105840025','pemohon'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Hari Dhoho Tampubolon','021','3929828','','','','Jl. Kebon Sirih No. 17-19, Jakarta','0954022510730267','penanggungjawab'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Ibnu Hisyam','031','5957111','085716374547','','ibnu.hisyam@mncgroup.com','','','administrasi'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Ibnu Hisyam','031','5957111','085716374547','','ibnu.hisyam@mncgroup.com','','','setup/teknis'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Idha','021','3299828','','','idha.kusumawati@mncgroup.com','','','penagihan'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','Ibnu Hisyam','031','5957111','085716374547','','ibnu.hisyam@mncgroup.com','','','support/teknis'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','','','melford_d@yahoo.com','Jl. Graha Family Blok I No. 37','3578211403730001','pemohon'),('MELFORD DHARMAWAN','Melford Dharmawan','031','71671888','','','melford_d@yahoo.com','Jl. Graha Family Blok I No. 37','3578211403730001','penanggungjawab'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','','','','081703524493','wa2n_setiawan38@yahoo.com','','','support/teknis'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','','','','081703524493','wa2n_setiawan38@yahoo.com','','','setup/teknis'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','','','','085230008087','m3riani@yahoo.com','','','penagihan'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','','','','085230008087','m3riani@yahoo.com','','','administrasi'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','031','7327533','','081703524493','wa2n_setiawan38@yahoo.com','Jl. Ruko Plaza Graha Family B-1','3578102805720009','pemohon'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','031','7327533','','085230008087','m3riani@yahoo.com','Jl. Ruko Plaza Graha Family B-1','3578185010840006','penanggungjawab'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Hendri Anggoro','031','7319788','0816504390','','hendri@miracle-clinic.com','Jl. Bukit Darmo Boulevard No. 10','3578090610800003','pemohon'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Hendri Anggoro','031','7319788','0816504390','','hendri@miracle-clinic.com','Jl. Bukit Darmo Boulevard No. 10','3578090610800003','penanggungjawab'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Windra/Hervid','031','5616668','','','windra@miracle-clinic.com','','','administrasi'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Windra','031','5616668','','','windra@miracle-clinic.com','','','setup/teknis'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Novi','031','7319788','','','tax.bdv@the-emdee.com','','','penagihan'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Windra/Hervid','031','5616668','','','windra@miracle-clinic.com','','','support/teknis'),('PT. NUSA RAYA CIPTA','Didik Setiyanto','031','8437207','082131747818','','diksty@gmail.com','Jl. Rungkut Industri II No. 45 D','3578032408720002','pemohon'),('PT. NUSA RAYA CIPTA','Didik Setiyanto','031','8437207','082131747818','','nrc@indo.net.id','Jl. Rungkut Industri II No. 45 D','3578032408720002','penanggungjawab'),('PT. NUSA RAYA CIPTA','Didik Setiyanto','','','082131747818','','diksty@gmail.com','','','administrasi'),('PT. NUSA RAYA CIPTA','Didik Setiyanto','','','082131747818','','diksty@gmail.com','','','setup/teknis'),('PT. NUSA RAYA CIPTA','Didik Setiyanto','','','082131747818','','diksty@gmail.com','','','penagihan'),('PT. NUSA RAYA CIPTA','Didik Setiyanto','','','082131747818','','diksty@gmail.com','','','support/teknis'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Hendri Anggoro','031','5616668','0816504390','','hendri@miracle-clinic.com','Jl. Nginden Semolo 101 Kav. 1','3578090610800003','pemohon'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Hendri Anggoro','031','5616668','0816504390','','hendri@miracle-clinic.com','Jl. Nginden Semolo 101 Kav. 1','3578090610800003','penanggungjawab'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Windra','031','5616668','','','windra@miracle-clinic.com','','','administrasi'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','Windra','031','5616668','','','windra@miracle-clinic.com','','','support/teknis'),('BILLY SAPUTRA SUSANTO','Billy Saputra Susanto','','','08123009965','','billysaputra06@yahoo.com','Jl. Graha Family Blok P No. 60','3578200606930001','pemohon'),('BILLY SAPUTRA SUSANTO','Billy Saputra Susanto','','','08123009965','','billysaputra06@yahoo.com','Jl. Graha Family Blok P No. 60','3578200606930001','penanggungjawab'),('BILLY SAPUTRA SUSANTO','Billy Saputra Susanto','','','08123009965','','billysaputra06@yahoo.com','','','administrasi'),('BILLY SAPUTRA SUSANTO','Billy Saputra Susanto','','','08123009965','','billysaputra06@yahoo.com','','','setup/teknis'),('BILLY SAPUTRA SUSANTO','Billy Saputra Susanto','','','08123009965','','billysaputra06@yahoo.com','','','penagihan'),('BILLY SAPUTRA SUSANTO','Billy Saputra Susanto','','','08123009965','','billysaputra06@yahoo.com','','','support/teknis'),('PT. MENTARI SEJATI PERKASA ','Emanuel Kristijanto, Drs','031','3292727','0811349963','','ekrist@mentariline.com','Jl. Perak Barat 231 Surabaya ','3578152512580001','pemohon'),('PT. MENTARI SEJATI PERKASA ','dr. Soenardi Sudartan, SpS','031','3292727','','','soenardi@mentariline.com','Jl. Perak Barat 231 Surabaya ','3578261808570001','pemohon'),('PT. MENTARI SEJATI PERKASA ','Stephanus Andi Priambodo ','031','3292727','085730128784','','andy@mentariline.com','Jl. Perak Barat 231 Surabaya ','','setup/teknis'),('PT. MENTARI SEJATI PERKASA ','Septyo Pamungkas','031','3292727','08560725581','','septyo20@gmail.com','Jl. Perak Barat 231 Surabaya ','','support/teknis'),('PT. MENTARI SEJATI PERKASA ','Nita ','031','3292727','','','nita@mentariline.com','Jl. Perak Barat 231 Surabaya ','','administrasi'),('PT. MENTARI SEJATI PERKASA ','Catur Wismanto ','031','3292727','0811371033','','catur@mentariline.com','Jl. Perak Barat 231 Surabaya ','','penagihan'),('PT. MENTARI SEJATI PERKASA ','dr. Soenardi Sudartan, SpS','031','3292727','','','soenardi@mentariline.com','Jl. Perak Barat 231 Surabaya ','3578261808570001','penanggungjawab'),('PT. MENTARI SEJATI PERKASA ','Stephanus Andi Priambodo ','031','3292727','085730128784','','andy@mentariline.com','Jl. Perak Barat 231 Surabaya ','','pemohon'),('PT. MENTARI SEJATI PERKASA ','Septyo Pamungkas','031','3292727','08560725581','','septyo20@gmail.com','Jl. Perak Barat 231 Surabaya ','','pemohon'),('PT. WONOKOYO JAYA  CORPORINDO','Prasetyo Pribadi ','031','2956000','','','wjcpusat@indo.net.id','Taman Bungkul 1- 7 Surabaya ','3578101110680003','pemohon'),('PT. WONOKOYO JAYA  CORPORINDO','Iwan Tirto Kusumo ','031','2956000','','','wjcpusat@indo.net.id','Taman Bungkul 1- 7 Surabaya ','3578072003750004','penanggungjawab'),('PT. WONOKOYO JAYA  CORPORINDO','Dedik Hermanto ','031','2956000','','','wjcpusat@indo.net.id','Taman Bungkul 1- 7 Surabaya ','','administrasi'),('PT. WONOKOYO JAYA  CORPORINDO','Dedik Hermanto ','031','2956000','','','wjcpusat@indo.net.id','Taman Bungkul 1- 7 Surabaya ','','penagihan'),('PT. WONOKOYO JAYA  CORPORINDO','Rizky A. Wijayanto ','031','2956000','085648048011','','wjcpusat@indo.net.id','Taman Bungkul 1- 7 Surabaya ','','setup/teknis'),('PT. WONOKOYO JAYA  CORPORINDO','Rizky A. Wijayanto ','031','2956000','085648048011','','wjcpusat@indo.net.id','Taman Bungkul 1- 7 Surabaya ','','penagihan'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Regency 21 H-79 Jl. Arif Rahman hakim 138 Surabaya ','3578032607790002','pemohon'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Regency 21 H-79 Jl. Arif Rahman hakim 138 Surabaya ','3578032607790002','penanggungjawab'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Regency 21 H-79 Jl. Arif Rahman hakim 138 Surabaya ','3578032607790002','setup/teknis'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Regency 21 H-79 Jl. Arif Rahman hakim 138 Surabaya ','3578032607790002','support/teknis'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Regency 21 H-79 Jl. Arif Rahman hakim 138 Surabaya ','3578032607790002','penagihan'),('TAN RICHARD WESUTAN ','Tan Richard Wesutan ','031','60760761','08563040975','','icadss@yahoo.com','Regency 21 H-79 Jl. Arif Rahman hakim 138 Surabaya ','3578032607790002','administrasi'),('PENTAKOM','Effendie','031','7406281','085850312365','','effendie@gmail.com','Jl. Dukuh Jelidro No. 1 Desa 1, Kec. Sambikerep','3515081509750001','pemohon'),('PENTAKOM','Effendie','031','7406281','085850312365','','effendie@gmail.com','Jl. Dukuh Jelidro No. 1 Desa 1, Kec. Sambikerep','3515081509750001','penanggungjawab'),('PENTAKOM','Effendie','','','085850312365','','effendie@gmail.com','','','administrasi'),('PENTAKOM','Effendie','','','085850312365','','effendie@gmail.com','','','setup/teknis'),('PENTAKOM','Effendie','','','085850312365','','effendie@gmail.com','','','penagihan'),('PENTAKOM','Effendie','','','085850312365','','effendie@gmail.com','','','support/teknis'),('PT. INTERNET PRATAMA INDONESIA','Sastro Haris Djatmiko','031','5940573','0811326693','','sastro@fc-network.com','Jl. Klampis Jaya No. 31-E','3578021812750001','pemohon'),('PT. INTERNET PRATAMA INDONESIA','Sastro Haris Djatmiko','031','5940573','0811326693','','sastro@fc-network.com','Jl. Klampis Jaya No. 31-E','3578021812750001','penanggungjawab'),('PT. INTERNET PRATAMA INDONESIA','Pamungkas Sudarsono','031','5940573','082244428054','','pamungkas.sudarsono@fc-network.com','','','administrasi'),('PT. INTERNET PRATAMA INDONESIA','Henry Kusuma','031','5940573','08155050389','','henry@fc-network.com','','','setup/teknis'),('PT. INTERNET PRATAMA INDONESIA','Pamungkas Sudarsono','031','5940573','082244428054','','pamungkas.sudarsono@fc-network.com','','','penagihan'),('PT. INTERNET PRATAMA INDONESIA','Henry Kusuma','031','5940573','08155050389','','henry@fc-network.com','','','support/teknis'),('PT. UNINET MEDIA SAKTI','Sunaryo','031','5466615','71111804','','ryo@sby.uninet.net.id','Jl. Panglima Sudirman No. 101-103 (Intiland Tower Lantai 11 No. 3 A)','3574031211800006','pemohon'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','031','5915643','08155065978','','imelda.mandeli@cfg.sg','Jl. Galaxy Mall Lantai 2 No. 255-256','3578154905750001','pemohon'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','031','5915643','08155065978','','imelda.mandeli@cfg.sg','Jl. Galaxy Mall Lantai 2 No. 255-256','3578154905750001','penanggungjawab'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@cfg.sg','','','administrasi'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@cfg.sg','','','setup/teknis'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@cfg.sg','','','penagihan'),('CHIRO FIRST INDONESIA, PT','Imelda Mandeli','','','08155065978','','imelda.mandeli@cfg.sg','','','support/teknis'),('Kreasi Energi Alam, PT (Ibu Regina)','Regina Agnes W','031','7522430','081231000085','','kreasi.energi.alam@gmail.com','','','pemohon'),('Kreasi Energi Alam, PT (Ibu Regina)','Regina Agnes W','031','7522430','081231000085','','kreasi.energi.alam@gmail.com','','','penanggungjawab'),('Kreasi Energi Alam, PT (Ibu Regina)','Regina Agnes W','031','7522430','081231000085','','kreasi.energi.alam@gmail.com','','','administrasi'),('Kreasi Energi Alam, PT (Ibu Regina)','Regina Agnes W','031','7522430','081231000085','','kreasi.energi.alam@gmail.com','','','setup/teknis'),('Kreasi Energi Alam, PT (Ibu Regina)','Regina Agnes W','031','7522430','081231000085','','kreasi.energi.alam@gmail.com','','','penagihan'),('Kreasi Energi Alam, PT (Ibu Regina)','Regina Agnes W','031','7522430','081231000085','','kreasi.energi.alam@gmail.com','','','support/teknis'),('lima mandiri propertindo, pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('Herman Chandra','Herman Chandra ','031','5685690','08123019606','03160262000','talentamedia@gmail.com','Villa Bukit Mas F - 7 Surabaya ','3578161804640010','pemohon'),('Herman Chandra','Herman Chandra ','031','5685690','08123019606','03160262000','talentamedia@gmail.com','Villa Bukit Mas F - 7 Surabaya ','3578161804640010','administrasi'),('Herman Chandra','Herman Chandra ','031','5685690','08123019606','03160262000','talentamedia@gmail.com','Villa Bukit Mas F - 7 Surabaya ','3578161804640010','penanggungjawab'),('Herman Chandra','Herman Chandra ','031','5685690','08123019606','03160262000','talentamedia@gmail.com','Villa Bukit Mas F - 7 Surabaya ','3578161804640010','setup/teknis'),('Herman Chandra','Herman Chandra ','031','5685690','08123019606','03160262000','talentamedia@gmail.com','Villa Bukit Mas F - 7 Surabaya ','3578161804640010','support/teknis'),('Herman Chandra','Herman Chandra ','031','5685690','08123019606','03160262000','talentamedia@gmail.com','Villa Bukit Mas F - 7 Surabaya ','3578161804640010','penagihan'),('lima mandiri propertindo, pt','alwin cahyadi','031 ','031 5685577','','','alwincahyadi79@gmail.com','jl. dr soetomo no 37','3578221803790001','pemohon'),('NASIONAL SYSPOLY INDONESIA, PT','Harianto Hosman','031','8012655','70436744','','','','','pemohon'),('NASIONAL SYSPOLY INDONESIA, PT','Hendro Andri Yuwono','031','8012655','77701129','','','','','penanggungjawab'),('NASIONAL SYSPOLY INDONESIA, PT','Hardono','031','8012655','70000191','','info@sispoly.com','','','administrasi'),('NASIONAL SYSPOLY INDONESIA, PT','Hardono','031','8012655','70000191','','info@sispoly.com','','','setup/teknis'),('NASIONAL SYSPOLY INDONESIA, PT','Hardono','031','8012655','70000191','','info@sispoly.com','','','support/teknis'),('NASIONAL SYSPOLY INDONESIA, PT','Novita','031','8012655','','','info@sispoly.com','','','penagihan'),('MAHADHIKA PERMATA WIJAYA PT','Yanrio Marpaung','031','70999991','','','yanriomarpaung@yahoo.com','','3578080301630002','pemohon'),('MAHADHIKA PERMATA WIJAYA PT','Ronny Prasetya','031','5350572','','','','','3578080509780002','penanggungjawab'),('MAHADHIKA PERMATA WIJAYA PT','Ricky Ferryanto Njoo','031','','087854392987','','rickyfn_20@yahoo.com','','','administrasi'),('MAHADHIKA PERMATA WIJAYA PT','Ricky Ferryanto Njoo','031','','087854392987','','rikyfn_20@yahoo.com','','','support/teknis'),('MAHADHIKA PERMATA WIJAYA PT','Lusia Kristina Winarsih','031','','085217655200','','lusia_kristina@yahoo.com','','','penagihan'),('SEANG WAN INDONESIA, PT','Teh Chee Kong','031','087854482233','','','ckteh616@gmail.com','','','pemohon'),('SEANG WAN INDONESIA, PT','Teh Chee Kong','031','087854482233','','','ckteh616@gmail.com','','','penanggungjawab'),('SEANG WAN INDONESIA, PT','Teh Chee Kong','031','087854482233','','','ckteh616@gmail.com','','','setup/teknis'),('SEANG WAN INDONESIA, PT','Teh Chee Kong','031','087854482233','','','ckteh616@gmail.com','','','support/teknis'),('SEANG WAN INDONESIA, PT','Arofah','031','085646369882','','','','','','administrasi'),('PT. Cipta Mandiri Konstruksi ','Evelina Kristanti ','031','7325205','0811305259','','evelina@ciptamandiri.com','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','pemohon'),('PT. Cipta Mandiri Konstruksi ','Evelina Kristanti ','031','7325205','0811305259','','evelina@ciptamandiri.com','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','administrasi'),('PT. Cipta Mandiri Konstruksi ','Evelina Kristanti ','031','7325205','0811305259','','evelina@ciptamandiri.com','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','support/teknis'),('PT. Cipta Mandiri Konstruksi ','Evelina Kristanti ','031','7325205','0811305259','','evelina@ciptamandiri.com','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','setup/teknis'),('PT. Cipta Mandiri Konstruksi ','Hadi Erwanto ','031','7325205','','','info@ciptamandiri.com','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3515040501550001','penanggungjawab'),('PT. Cipta Mandiri Konstruksi ','Fiutin Kristika','031','7325205','','','fiutin.kristika@ciptamandiri.com','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','','penagihan'),('Scienwerk Studio ','Evelina Kristanti ','031','72325223','0811305259','','eve@sciencewerk.net','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','pemohon'),('Scienwerk Studio ','Evelina Kristanti ','031','72325223','0811305259','','eve@sciencewerk.net','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','penanggungjawab'),('Scienwerk Studio ','Evelina Kristanti ','031','72325223','0811305259','','eve@sciencewerk.net','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','administrasi'),('Scienwerk Studio ','Evelina Kristanti ','031','72325223','0811305259','','eve@sciencewerk.net','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','support/teknis'),('Scienwerk Studio ','Evelina Kristanti ','031','72325223','0811305259','','eve@sciencewerk.net','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','setup/teknis'),('Scienwerk Studio ','Evelina Kristanti ','031','72325223','0811305259','','eve@sciencewerk.net','Jl. Raya Sukomanunggal Jaya BB-33 Surabaya ','3578185905820002','penagihan'),('PT MATAHARI PUTRA MAKMUR','Rizky Wicaksono','0343','659926','081333837602','','rizky@trilliun.com','','3573021205830004','pemohon'),('PT MATAHARI PUTRA MAKMUR','Bambang Hermanto','0343','659926','','','','','3506100812740001','pemohon'),('PT MATAHARI PUTRA MAKMUR','Ichsan Moestofa','0343','659926','','','ichsan_mpm@trillium.com','','','pemohon'),('PT MATAHARI PUTRA MAKMUR','Rizky Wicaksono','0343','659926','081333837602','','rizky@trilliun.com','','3573021205830004','setup/teknis'),('PT MATAHARI PUTRA MAKMUR','Rizky Wicaksono','0343','659926','081333837602','','rizky@trilliun.com','','3573021205830004','support/teknis'),('ROBBY LUKITO ','Robby Lukito ','031','','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /Blok G-8 Surabaya ','3578201103930003','pemohon'),('ROBBY LUKITO ','Robby Lukito ','031','','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /Blok G-8 Surabaya ','3578201103930003','penanggungjawab'),('ROBBY LUKITO ','Robby Lukito ','031','','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /Blok G-8 Surabaya ','3578201103930003','administrasi'),('ROBBY LUKITO ','Robby Lukito ','031','','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /Blok G-8 Surabaya ','3578201103930003','setup/teknis'),('ROBBY LUKITO ','Robby Lukito ','031','','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /Blok G-8 Surabaya ','3578201103930003','support/teknis'),('ROBBY LUKITO ','Robby Lukito ','031','','081217652201','','robby1193@gmail.com','Jajar Tunggal Utara 6 No 10 /Blok G-8 Surabaya ','3578201103930003','penagihan'),('TRANS PASIFIC ATLANTIC, PT','Izhar','031','3283412','082230592112','','zrdukes@yahoo.com','','','penanggungjawab'),('TRANS PASIFIC ATLANTIC, PT','Izhar','031','3283412','082230592112','','zrdukes@yahoo.com','','','pemohon'),('TRANS PASIFIC ATLANTIC, PT','Izhar','031','3283412','082230592112','','zrdukes@yahoo.com','','','setup/teknis'),('TRANS PASIFIC ATLANTIC, PT','Izhar','031','3283412','082230592112','','zrdukes@yahoo.com','','','support/teknis'),('TRANS PASIFIC ATLANTIC, PT','Ruly','031','3283412','','','','','','administrasi'),('TRANS PASIFIC ATLANTIC, PT','Ruly','031','3283412','','','','','','penagihan'),('indraco pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('indraco pt','iwan setiawan','031','7668777','081216182458','','edp@indraco.com','jl semeru I industri no 135','','pemohon'),('Faliana (Hendro Asem)','Faliana','031','5345580','0811371986','','faliana_tan@yahoo.com','','','pemohon'),('Faliana (Hendro Asem)','Faliana','031','5345580','0811371986','','faliana_tan@yahoo.com','','','penanggungjawab'),('Faliana (Hendro Asem)','Faliana','031','5345580','0811371986','','faliana_tan@yahoo.com','','','administrasi'),('Faliana (Hendro Asem)','Faliana','031','5345580','0811371986','','faliana_tan@yahoo.com','','','penagihan'),('Faliana (Hendro Asem)','Hendro','031','5345580','085649444436','','henkusumo@gmail.com','','','setup/teknis'),('Faliana (Hendro Asem)','Hendro','031','5345580','085649444436','','henkusumo@gmail.com','','','support/teknis'),('pita mas, pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('pita mas, pt','fengky wijaya','031','8913141','08175055876','','it@pitamas.com','desa betro sidoarjo','','pemohon'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','Chilton Theodoroes','031','081335500035','','','chiltontheo@yahoo.com','','','pemohon'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','Chilton Theodoroes','031','081335500035','','','chiltontheo@yahoo.com','','','administrasi'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','Chilton Theodoroes','031','081335500035','','','chiltontheo@yahoo.com','','','penagihan'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','Chilton Theodoroes','031','081335500035','','','chiltontheo@yahoo.com','','','support/teknis'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','Chilton Theodoroes','031','081335500035','','','chiltontheo@yahoo.com','','','setup/teknis'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','Hendrik Theodoroes','031','','','','chilz93@gmail.com','','','penanggungjawab'),('PT Jaya Logam Perkasa','Jap Peter japardana','031 ','7990700','081330755236','','jayalogam@yahoo.com','jl Palemwatu no 199 menganti gresik','','pemohon'),('sari ruqindo,cv','bactiar dwi','031','8531079','081938153341','','bachtiar@sariruqindo.com','jl. jeruk III c no 177','','setup/teknis'),('roto rooter, pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('roto rooter, pt','widi tri hatmoko','031','5483333','081230159988','','widi.rotorooter@yahoo.com','jl. raya arjuna 136 A','','pemohon'),('koprasi warga semen gresik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('koprasi warga semen gresik','achmad husain chumaidi','031','3985761','08123013095','081553003988','hasan@kwsg.co.id','jl. tauchid perum pt semen gresik, gresik jatim','','pemohon'),('moor sukses internationa. pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('moor sukses internationa. pt','andri tito','031','8923440','082235588588','','andri@moorlife.co.id','jl. mangundiprojo buduran sidoarjo','','pemohon'),('PT. Padmatirta Wisesa ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('PT. Padmatirta Wisesa ','Andrew Julius Soehartono ','031','8054545','','','andrew.soehartono@padmatirtawisesa.com','Jl. Lingkar Timur 88 Sidoarjo ','3578261907810004','pemohon'),('PT. Padmatirta Wisesa ','Andrew Julius Soehartono ','031','8054545','','','andrew.soehartono@padmatirtawisesa.com','Jl. Lingkar Timur 88 Sidoarjo ','3578261907810004','penanggungjawab'),('PT. Padmatirta Wisesa ','Vida Rachma ','031','8054545','','','vida.rahma@padmatirtawisesa.com','Jl. Lingkar Timur 88 Sidoarjo ','','setup/teknis'),('PT. Padmatirta Wisesa ','Vida Rachma ','031','8054545','','','vida.rahma@padmatirtawisesa.com','Jl. Lingkar Timur 88 Sidoarjo ','','support/teknis'),('PT. Padmatirta Wisesa ','Rini ','031','8054545','','','sri.cahyorini@padmatirtawisesa.com','Jl. Lingkar Timur 88 Sidoarjo ','','administrasi'),('PT. Padmatirta Wisesa ','Rini ','031','8054545','','','sri.cahyorini@padmatirtawisesa.com','Jl. Lingkar Timur 88 Sidoarjo ','','penagihan'),('Wawan Hermanto ','Wawan Hermanto ','031','','081282439758','','wherman275@gmail.com','Jl. Kupang Jaya Kav. 14 1AT','','pemohon'),('Wawan Hermanto ','Wawan Hermanto ','031','','081282439758','','wherman275@gmail.com','Jl. Kupang Jaya Kav. 14 1AT','','administrasi'),('Wawan Hermanto ','Wawan Hermanto ','031','','081282439758','','wherman275@gmail.com','Jl. Kupang Jaya Kav. 14 1AT','','penanggungjawab'),('Wawan Hermanto ','Wawan Hermanto ','031','','081282439758','','wherman275@gmail.com','Jl. Kupang Jaya Kav. 14 1AT','','setup/teknis'),('Wawan Hermanto ','Wawan Hermanto ','031','','081282439758','','wherman275@gmail.com','Jl. Kupang Jaya Kav. 14 1AT','','support/teknis'),('Wawan Hermanto ','Wawan Hermanto ','031','','081282439758','','wherman275@gmail.com','Jl. Kupang Jaya Kav. 14 1AT','','penagihan'),('IMEDIA CIPTA, PT','Jannes Halim','031','5326274','081330388938','','jannes@imediacipta.com','Jl. Simpang Pojok No. 15-17','3578221105720002','pemohon'),('IMEDIA CIPTA, PT','Jannes Halim','031','5326274','081330388938','','jannes@imediacipta.com','Jl. Simpang Pojok No. 15-17','3578221105720002','penanggungjawab'),('PT Sandi Bahari Nusantara','Adi Tri Cahya','031','70446000','03170446000','','aditc_sbn@yahoo.co.id','jl Laksdam M Natsir 29 A 10','','pemohon'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','031','0811363539','','','cvroyaljaya@gmail.com','','','pemohon'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','031','0811363539','','','cvroyaljaya@gmail.com','','','penanggungjawab'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','031','0811363539','','','cvroyaljaya@gmail.com','','','administrasi'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','031','0811363539','','','cvroyaljaya@gmail.com','','','setup/teknis'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','031','0811363539','','','cvroyaljaya@gmail.com','','','support/teknis'),('THIO RUDY HARYANTO','Thio Rudy Haryanto','031','0811363539','','','cvroyaljaya@gmail.com','','','penagihan'),('DANIEL KURNIAWAN','Daniel Kurniawan','031','081299190531','','','daniel.kurnia176@gmail.com','','','pemohon'),('DANIEL KURNIAWAN','Daniel Kurniawan','031','081299190531','','','daniel.kurnia176@gmail.com','','','penanggungjawab'),('DANIEL KURNIAWAN','Daniel Kurniawan','031','081299190531','','','daniel.kurnia176@gmail.com','','','administrasi'),('DANIEL KURNIAWAN','Daniel Kurniawan','031','081299190531','','','daniel.kurnia176@gmail.com','','','setup/teknis'),('DANIEL KURNIAWAN','Daniel Kurniawan','031','081299190531','','','daniel.kurnia176@gmail.com','','','support/teknis'),('DANIEL KURNIAWAN','Daniel Kurniawan','031','081299190531','','','daniel.kurnia176@gmail.com','','','penagihan'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','Donny Roberto Manuarva','031','5315399','','','donny.manuarva@midtownindonesia.com','','','pemohon'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','Ronny Prasetya','031','5315399','','','ronny.prasetya@midtownindonesia.com','','','penanggungjawab'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','M. Masbuchin','031','5315399','','','buchin@midtownindonesia.com','','','setup/teknis'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','M. Masbuchin','031','5315399','','','buchin@midtownindonesia.com','','','support/teknis'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','Astri','031','5315399','','','ap@midtownindonesia.com','','','penagihan'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','M. Masbuchin','031','5315399','','','buchin@midtownindonesia.com','','','administrasi'),('GRII COLOCATION','Kristanto Wicaksono','031','5472422','','','kristanto@momentum.or.id','','','pemohon'),('GRII COLOCATION','Kristanto Wicaksono','031','5472422','','','kristanto@momentum.or.id','','','setup/teknis'),('GRII COLOCATION','Kristanto Wicaksono','031','5472422','','','kristanto@momentum.or.id','','','support/teknis'),('GRII COLOCATION','Kristanto Wicaksono','031','5472422','','','kristanto@momentum.or.id','','','administrasi'),('GRII COLOCATION','Rahel','031','5472422','','','info@momentum.or.id','','','penagihan'),('GRII COLOCATION','James Hartono Setya','031','5472422','','','info@momentum.or.id','','','penanggungjawab'),('LABEL JAYA PRATAMA','Yudiarto Angdias','031','7990501','08123004219','','yudi@labeljaya.com','','','pemohon'),('LABEL JAYA PRATAMA','Yudiarto Angdias','031','7990501','08123004219','','yudi@labeljaya.com','','','penanggungjawab'),('LABEL JAYA PRATAMA','Yudiarto Angdias','031','7990501','08123004219','','yudi@labeljaya.com','','','administrasi'),('LABEL JAYA PRATAMA','Yudiarto Angdias','031','7990501','08123004219','','yudi@labeljaya.com','','','setup/teknis'),('LABEL JAYA PRATAMA','Yudiarto Angdias','031','7990501','08123004219','','yudi@labeljaya.com','','','support/teknis'),('LABEL JAYA PRATAMA','Dhinik','031','7990501','','','dhinik@labeljaya.com','','','penagihan'),('FIBER NETWORKS INDONESIA (HARVEST)','Muhammad Haris','021','02193050986','','','haris@fiber.net.id','','','pemohon'),('FIBER NETWORKS INDONESIA (HARVEST)','Faisal Mulia Nasution','021','02178833478','','','faisal@fiber.net.id','','','penanggungjawab'),('FIBER NETWORKS INDONESIA (HARVEST)','Yuni','021','02178833478','','','billing@fiber.net.id','','','administrasi'),('FIBER NETWORKS INDONESIA (HARVEST)','Meina R','021','02178833478','','','meina@fiber.net.id','','','penagihan'),('FIBER NETWORKS INDONESIA (HARVEST)','Muhammad Haris','021','02193050986','','','haris@fiber.net.id','','','setup/teknis'),('FIBER NETWORKS INDONESIA (HARVEST)','Edi','021','0217532726','','','support@fiber.net.id','','','support/teknis'),('WARNATAMA CEMERLANG','Windi Sutijono','031','8975487','081233775111','','windy_sby@yahoo.com','','','pemohon'),('WARNATAMA CEMERLANG','Windi Sutijono','031','8975487','081233775111','','windy_sby@yahoo.com','','','administrasi'),('WARNATAMA CEMERLANG','Windi Sutijono','031','8975487','081233775111','','windy_sby@yahoo.com','','','setup/teknis'),('WARNATAMA CEMERLANG','Windi Sutijono','031','8975487','081233775111','','windy_sby@yahoo.com','','','support/teknis'),('WARNATAMA CEMERLANG','irfan Fandawa','031','8975487','','','','','','penanggungjawab'),('WARNATAMA CEMERLANG','Yuliana','031','8975487','','','','','','penagihan'),('TJAKRINDO MAS - DIVISI PIPA PVC','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','pemohon'),('TJAKRINDO MAS - DIVISI PIPA PVC','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','administrasi'),('TJAKRINDO MAS - DIVISI PIPA PVC','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','setup/teknis'),('TJAKRINDO MAS - DIVISI PIPA PVC','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','support/teknis'),('TJAKRINDO MAS - DIVISI PIPA PVC','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','penagihan'),('TJAKRINDO MAS - DIVISI PIPA PVC','Ronny Wijaya','031','7993818','','','','','','penanggungjawab'),('TJAKRINDO MAS DIVISI OFFICE','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','pemohon'),('TJAKRINDO MAS DIVISI OFFICE','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','administrasi'),('TJAKRINDO MAS DIVISI OFFICE','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','setup/teknis'),('TJAKRINDO MAS DIVISI OFFICE','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','support/teknis'),('TJAKRINDO MAS DIVISI OFFICE','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','penagihan'),('TJAKRINDO MAS DIVISI OFFICE','Ronny Wijaya','031','7993818','','','','','','penanggungjawab'),('TJAKRINDO MAS - DIVISI KAYU','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','pemohon'),('TJAKRINDO MAS - DIVISI KAYU','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','administrasi'),('TJAKRINDO MAS - DIVISI KAYU','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','setup/teknis'),('TJAKRINDO MAS - DIVISI KAYU','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','support/teknis'),('TJAKRINDO MAS - DIVISI KAYU','Jonny Sudibyo','031','7993818','08123296096','','jonny@tjakrindomas.co.id','','','penagihan'),('TJAKRINDO MAS - DIVISI KAYU','Ronny Wijaya','031','7993818','','','','','','penanggungjawab'),('PADIMAS INDAH, PT','surya','031','5660515','08165419899','','surya_cq@yahoo.com','','','pemohon'),('PADIMAS INDAH, PT','surya','031','5660515','08165419899','','surya_cq@yahoo.com','','','penanggungjawab'),('PADIMAS INDAH, PT','surya','031','5660515','08165419899','','surya_cq@yahoo.com','','','setup/teknis'),('PADIMAS INDAH, PT','surya','031','5660515','08165419899','','surya_cq@yahoo.com','','','support/teknis'),('PADIMAS INDAH, PT','surya','031','5660515','08165419899','','surya_cq@yahoo.com','','','penagihan'),('PADIMAS INDAH, PT','surya','031','5660515','08165419899','','surya_cq@yahoo.com','','','administrasi'),('ADICITRA BHIRAWA, PT','Priska','031','7671888','0811309010','','priskels@yahoo.com','','','pemohon'),('ADICITRA BHIRAWA, PT','Priska','031','7671888','0811309010','','priskels@yahoo.com','','','penanggungjawab'),('ADICITRA BHIRAWA, PT','yuli','031','7671888','','','adicitrabhirawa@yahoo.com','','','administrasi'),('ADICITRA BHIRAWA, PT','yuli','031','7671888','','','adicitrabhirawa@yahoo.com','','','penagihan'),('ADICITRA BHIRAWA, PT','Nana','031','7671888','','','adicitrabhirawa@yahoo.com','','','setup/teknis'),('ADICITRA BHIRAWA, PT','Nana','031','7671888','','','adicitrabhirawa@yahoo.com','','','support/teknis'),('graha melandas/ice hill',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('graha melandas/ice hill','nani widya agustin','031','7321907','087851409666','','melandas_cs@yahoo.co.id','graha family raya','','pemohon'),('PT. Yamamori Indonesia ','Andika S. Isman ','031','8911419','','','andika-isman@yamamori-id.com','Jl. Sedati Desa Ketajen Gedangan Sidoarjo','3603251812640001','pemohon'),('PT. Yamamori Indonesia ','Shioya Motto ','031','8911419','','','info@yamamori-id.com','Jl. Sedati Desa Ketajen Gedangan Sidoarjo','','penanggungjawab'),('PT. Yamamori Indonesia ','Lia Daniati ','031','8911419','','','lia.daniati@yamamori-id.com','Jl. Sedati Desa Ketajen Gedangan Sidoarjo','','administrasi'),('PT. Yamamori Indonesia ','Lia Daniati ','031','8911419','','','lia.daniati@yamamori-id.com','Jl. Sedati Desa Ketajen Gedangan Sidoarjo','','penagihan'),('PT. Yamamori Indonesia ','Akhmad Khamim ','031','8911419','081515140004','','ahmad.khamim@yamamori-id.com','Jl. Sedati Desa Ketajen Gedangan Sidoarjo','','setup/teknis'),('PT. Yamamori Indonesia ','Akhmad Khamim ','031','8911419','081515140004','','ahmad.khamim@yamamori-id.com','Jl. Sedati Desa Ketajen Gedangan Sidoarjo','','support/teknis'),('CV. Sarana Multi Transidno ','Harto Wijaya ','031','777160001','081234500998','','lojingti2000@mac.com','Jl. Kalianak 51P  Surabaya ','3578212909830001','pemohon'),('CV. Sarana Multi Transidno ','Harto Wijaya ','031','777160001','081234500998','','lojingti2000@mac.com','Jl. Kalianak 51P  Surabaya ','3578212909830001','penanggungjawab'),('CV. Sarana Multi Transidno ','Harto Wijaya ','031','777160001','081234500998','','lojingti2000@mac.com','Jl. Kalianak 51P  Surabaya ','3578212909830001','penagihan'),('CV. Sarana Multi Transidno ','Harto Wijaya ','031','777160001','081234500998','','lojingti2000@mac.com','Jl. Kalianak 51P  Surabaya ','3578212909830001','setup/teknis'),('CV. Sarana Multi Transidno ','Harto Wijaya ','031','777160001','081234500998','','lojingti2000@mac.com','Jl. Kalianak 51P  Surabaya ','3578212909830001','support/teknis'),('CV. Sarana Multi Transidno ','Harto Wijaya ','031','777160001','081234500998','','lojingti2000@mac.com','Jl. Kalianak 51P  Surabaya ','3578212909830001','administrasi'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','Jerry ','031','7328725','70602183','','jerry@bogaservice.com','Satelit Indah AN1 Kav. D surabaya ','3578071409810003','pemohon'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','Steven Johnsons Tjan ','031','7328725','','','steventjan@sushitei.com','Satelit Indah AN1 Kav. D surabaya ','','penanggungjawab'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','Lisa','031','7328725','','','','Satelit Indah AN1 Kav. D surabaya ','','penagihan'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','Novi ','031','7328725','','','','Satelit Indah AN1 Kav. D surabaya ','','administrasi'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','Trimay Noorman ','031','7328725','081113343486','','it.sby@sushitei.com','Satelit Indah AN1 Kav. D surabaya ','','setup/teknis'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','Trimay Noorman ','031','7328725','081113343486','','it.sby@sushitei.com','Satelit Indah AN1 Kav. D surabaya ','','support/teknis'),('lautan dana securindo, pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('lautan dana securindo, pt','liliana','031','5622555','','','liliana@lautandhana.com','jl. diponegoro 48 D - E','','pemohon'),('PT. Apik Komunika Indonesia ','Hermanto ','031','5322000','','','heranto76@gmail.com','Jl. Tidar 186 Surabaya ','3578262004700002','pemohon'),('PT. Apik Komunika Indonesia ','Hermanto ','031','5322000','','','heranto76@gmail.com','Jl. Tidar 186 Surabaya ','3578262004700002','administrasi'),('PT. Apik Komunika Indonesia ','Hermanto ','031','5322000','','','heranto76@gmail.com','Jl. Tidar 186 Surabaya ','3578262004700002','setup/teknis'),('PT. Apik Komunika Indonesia ','Hermanto ','031','5322000','','','heranto76@gmail.com','Jl. Tidar 186 Surabaya ','3578262004700002','support/teknis'),('PT. Apik Komunika Indonesia ','Mulyadi Hadibroto ','031','5322000','','','heranto76@gmail.com','Jl. Tidar 186 Surabaya ','3578262004700002','pemohon'),('PT. Apik Komunika Indonesia ','Lina','031','5322000','','','sp.linasungkono@gmail.com','Jl. Tidar 186 Surabaya ','3578262004700002','penagihan'),('GRAHA BUNDER UTAMA, PT','Asep Wirajaya','031','3957872','087752820930','','pt.grahabunderutama@gmail.com','','','pemohon'),('GRAHA BUNDER UTAMA, PT','Asep Wirajaya','031','3957872','087752820930','','pt.grahabunderutama@gmail.com','','','administrasi'),('GRAHA BUNDER UTAMA, PT','Asep Wirajaya','031','3957872','087752820930','','pt.grahabunderutama@gmail.com','','','setup/teknis'),('GRAHA BUNDER UTAMA, PT','Asep Wirajaya','031','3957872','087752820930','','pt.grahabunderutama@gmail.com','','','penagihan'),('GRAHA BUNDER UTAMA, PT','Asep Wirajaya','031','3957872','087752820930','','pt.grahabunderutama@gmail.com','','','support/teknis'),('GRAHA BUNDER UTAMA, PT','Suhartono','031','3957872','','','pt.grahabunderutama@gmail.com','','','penanggungjawab'),('Forestreet Cafe (Ibu Claudia)','Ibu Claudia','031','081339100280','','','claudya.sylvianie@yahoo.com','','','pemohon'),('Forestreet Cafe (Ibu Claudia)','Ibu Claudia','031','081339100280','','','claudya.sylvianie@yahoo.com','','','administrasi'),('Forestreet Cafe (Ibu Claudia)','Ibu Claudia','031','081339100280','','','claudya.sylvianie@yahoo.com','','','setup/teknis'),('Forestreet Cafe (Ibu Claudia)','Ibu Claudia','031','081339100280','','','claudya.sylvianie@yahoo.com','','','penagihan'),('Forestreet Cafe (Ibu Claudia)','Ibu Claudia','031','081339100280','','','claudya.sylvianie@yahoo.com','','','support/teknis'),('Forestreet Cafe (Ibu Claudia)','Ibu Claudia','031','081339100280','','','claudya.sylvianie@yahoo.com','','','penanggungjawab'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','Endang Rahayu','031','5347525','','','info@gtsglobal.co.id','','','pemohon'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','Endang Rahayu','031','5347525','','','info@gtsglobal.co.id','','','penanggungjawab'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','Dwi Astutik','031','5347525','','','dwi@gtsglobal.co.id','','','administrasi'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','Dwi Astutik','031','5347525','','','dwi@gtsglobal.co.id','','','penagihan'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','Dwi Astutik','031','5347525','','','dwi@gtsglobal.co.id','','','support/teknis'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','Dwi Astutik','031','5347525','','','dwi@gtsglobal.co.id','','','setup/teknis'),('TOKO VIRGO','Adi Tjandra','031','3539194','08121711000','','virgocard@gmail.com','Jl. Rajawali No. 115-B','3578120906800002','pemohon'),('TOKO VIRGO','Adi Tjandra','031','3539194','08121711000','','virgocard@gmail.com','Jl. Rajawali No. 115-B','3578120906800002','penanggungjawab'),('KARYA MITRA BERSAMA, PT','Edwin Hanafy','031','81118088','08123003338','','leicht_surabaya@yahoo.com','Jl. Pakuwon Square Blok AK II No. 51','leicht_surabaya@yaho','pemohon'),('KARYA MITRA BERSAMA, PT','Edwin Hanafy','031','81118088','08123003338','','leicht_surabaya@yahoo.com','Jl. Pakuwon Square Blok AK II No. 51','leicht_surabaya@yaho','penanggungjawab'),('sumber daya abadi, pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('sumber daya abadi, pt','iwan setiawan','031','7482194','081216182458','','edp@indraco.com','margomulyo indah 1A no 7 - 8','','support/teknis'),('topanugrah multindo, CV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('topanugrah multindo, CV','hastono bahrun','031','081223344400','','','hastono@yahoo.com','puri surya jaya H3 53 sidoarjo','','pemohon'),('PT. Bina Rasano Engineering ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('WELLY HERMANTO','Welly Hermanto','031','7322166','081231886666','','willyhermanto@yahoo.co.id','Jl. Graha Family Blok N No. 166','3578092012740002','pemohon'),('WELLY HERMANTO','Welly Hermanto','031','7322166','081231886666','','willyhermanto@yahoo.co.id','Jl. Graha Family Blok N No. 166','3578092012740002','penanggungjawab'),('WELLY HERMANTO','Welly Hermanto','','','081231886666','','willyhermanto@yahoo.co.id','','','administrasi'),('WELLY HERMANTO','Welly Hermanto','','','081231886666','','willyhermanto@yahoo.co.id','','','penagihan'),('WELLY HERMANTO','Welly Hermanto','','','081231886666','','willyhermanto@yahoo.co.id','','','setup/teknis'),('WELLY HERMANTO','Welly Hermanto','','','081231886666','','willyhermanto@yahoo.co.id','','','support/teknis'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7495684','081281281212','','hanny_stb@yahoo.com','Margomulyo Permai AD 17 Surabaya','3578272110760001','pemohon'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7495684','081281281212','','hanny_stb@yahoo.com','Margomulyo Permai AD 17 Surabaya','3578272110760001','penanggungjawab'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7495684','081281281212','','hanny_stb@yahoo.com','Margomulyo Permai AD 17 Surabaya','3578272110760001','setup/teknis'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7495684','081281281212','','hanny_stb@yahoo.com','Margomulyo Permai AD 17 Surabaya','3578272110760001','administrasi'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7495684','081281281212','','hanny_stb@yahoo.com','Margomulyo Permai AD 17 Surabaya','3578272110760001','support/teknis'),('Hanny Kurniawan Suprajaya ','Hanny Kurniawan Suprajaya ','031','7495684','081281281212','','hanny_stb@yahoo.com','Margomulyo Permai AD 17 Surabaya','3578272110760001','penagihan'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','031','7522559','08113348853','','asihsrigati@gmail.com','Jl. Pakuwon Villa Regency Blok AT III No. 18','3578295506760001','pemohon'),('CONTINENTS SOURCING ENTERPRISE LTD','Asih Srigati','031','7522559','08113348853','','asihsrigati@gmail.com','Jl. Pakuwon Villa Regency Blok AT III No. 18','3578295506760001','penanggungjawab'),('PT. ADITYA SARANA GRAHA','Wahyudi','021','6344555','08561038889','','wahyudi@aditya.co.id','Jl. Alaydrus No. 83 C, Jakarta Pusat','3174030307780007','pemohon'),('PT. ADITYA SARANA GRAHA','Wahyudi','021','6344555','08561038889','','wahyudi@aditya.co.id','Jl. Alaydrus No. 83 C, Jakarta Pusat','3174030307780007','penanggungjawab'),('PT. ADITYA SARANA GRAHA','Wahyudi','','','08561038889','','wahyudi@aditya.co.id','','','administrasi'),('PT. ADITYA SARANA GRAHA','Wahyudi','','','08561038889','','wahyudi@aditya.co.id','','','setup/teknis'),('PT. ADITYA SARANA GRAHA','Wahyudi','021','6344555','08561038889','','wahyudi@aditya.co.id','','','penagihan'),('PT. ADITYA SARANA GRAHA','Wahyudi','','','08561038889','','wahyudi@aditya.co.id','','','support/teknis'),('FERRY SOEPRAPTO','Ferry Soeprapto','','','081357555550','','ferry888@yahoo.com','Jl. Graha Natura Blok B No. 11','3578183101760002','pemohon'),('FERRY SOEPRAPTO','Ferry Soeprapto','','','081357555550','','ferry888@yahoo.com','Jl. Graha Natura Blok B No. 11','3578183101760002','penanggungjawab'),('FERRY SOEPRAPTO','Ferry Soeprapto','','','081357555550','','ferry888@yahoo.com','','','administrasi'),('FERRY SOEPRAPTO','Ferry Soeprapto','','','081357555550','','ferry888@yahoo.com','','','setup/teknis'),('FERRY SOEPRAPTO','Ferry Soeprapto','','','081357555550','','ferry888@yahoo.com','','','penagihan'),('FERRY SOEPRAPTO','Ferry Soeprapto','','','081357555550','','ferry888@yahoo.com','','','support/teknis'),('CV. BERKAT WIDA ABADI','Wiryo Basuki','031','7993438','0811308703','','chekak_wb@yahoo.com','Jl. Pelem Watu No. 10, Menganti - Gresik','3578111303620002','pemohon'),('CV. BERKAT WIDA ABADI','Wiryo Basuki','031','7993438','0811308703','','chekak_wb@yahoo.com','Jl. Pelem Watu No. 10, Menganti - Gresik','3578111303620002','penanggungjawab'),('CV. BERKAT WIDA ABADI','Dwi','031','7993438','','','wida_bwa@yahoo.com','','','administrasi'),('CV. BERKAT WIDA ABADI','Hendra','','','085731668420','','wida_bwa@yahoo.com','','','setup/teknis'),('CV. BERKAT WIDA ABADI','Dwi','031','7993438','','','wida_bwa@yahoo.com','','','penagihan'),('CV. BERKAT WIDA ABADI','Hendra','','','085731668420','','wida_bwa@yahoo.com','','','support/teknis'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','031','70976297','081234509997','','dwi@geospasia.com','Jl. Spring Tomorrow, Spring Park No. 12, Sidoarjo','3515072010790002','pemohon'),('GEOSPASIA WAHANA JAYA, PT','Dwi Hananto','031','70976297','081234509997','','dwi@geospasia.com','Jl. Spring Tomorrow, Spring Park No. 12, Sidoarjo','3515072010790002','penanggungjawab'),('CV. PILAR KENCANA STEEL','Ferry Soeprapto','031','7497550','081357555550','','ferry888@yahoo.com','Jl. Margomulyo Indah, Pergudangan Mutiara Blok D No. 11','3578183101760002','pemohon'),('CV. PILAR KENCANA STEEL','Ferry Soeprapto','031','7497550','081357555550','','ferry888@yahoo.com','Jl. Margomulyo Indah, Pergudangan Mutiara Blok D No. 11','3578183101760002','penanggungjawab'),('CV. PILAR KENCANA STEEL','Febri','031','7497550','','','pilarsteel@gmail.com','','','administrasi'),('CV. PILAR KENCANA STEEL','Chandra','031','7497550','','','pilarsteel@gmail.com','','','setup/teknis'),('CV. PILAR KENCANA STEEL','Febri','031','7497550','','','pilarsteel@gmail.com','','','penagihan'),('CV. PILAR KENCANA STEEL','Chandra','031','7497550','','','pilarsteel@gmail.com','','','support/teknis'),('CV. DORKAS INDONESIA','Denny Tandoyo','031','51503397','031-70600394','','wahyupaper@hotmail.com','Jl. Jatirejo No. 12, Mojokerto','3578101010850003','pemohon'),('CV. DORKAS INDONESIA','Denny Tandoyo','031','51503397','031-70600394','','wahyupaper@hotmail.com','Jl. Jatirejo No. 12, Mojokerto','3578101010850003','penanggungjawab'),('CV. DORKAS INDONESIA','Tri Ferawati','031','51503397','','','wahyupaper@hotmail.com','','','administrasi'),('CV. DORKAS INDONESIA','Denny Tandoyo','','','031-70600394','','wahyupaper@hotmail.com','','','setup/teknis'),('CV. DORKAS INDONESIA','Sri','031','51503397','','','wahyupaper@hotmail.com','','','penagihan'),('CV. DORKAS INDONESIA','Denny Tandoyo','','','031-70600394','','wahyupaper@hotmail.com','','','support/teknis'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','085232567283','','neni.id@melilea.com','Jl. Raya Sukomanunggal Jaya No. 5 (Ruko Satelit Town Square Blok A No. 17-19)','3578095605780001','pemohon'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','085232567283','','neni.id@melilea.com','Jl. Raya Sukomanunggal Jaya No. 5 (Ruko Satelit Town Square Blok A No. 17-19)','3578095605780001','penanggungjawab'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea.com','','','administrasi'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea.com','','','setup/teknis'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea.com','','','penagihan'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea.com','','','support/teknis'),('GEREJA BETHANY NGINDEN','Moho Setiya Putra','031','5936880','085931222722','','moho@bethanygraha.org','Jl. Nginden Intan Timur I No. 29','3578151610810004','pemohon'),('GEREJA BETHANY NGINDEN','Moho Setiya Putra','031','5936880','085931222722','','moho@bethanygraha.org','Jl. Nginden Intan Timur I No. 29','3578151610810004','penanggungjawab'),('GEREJA BETHANY NGINDEN','Moho Setiya Putra','031','5936880','085931222722','','moho@bethanygraha.org','','','administrasi'),('GEREJA BETHANY NGINDEN','Moho Setiya Putra','031','5936880','085931222722','','moho@bethanygraha.org','','','setup/teknis'),('GEREJA BETHANY NGINDEN','Moho Setiya Putra','031','5936880','085931222722','','moho@bethanygraha.org','','','penagihan'),('GEREJA BETHANY NGINDEN','Moho Setiya Putra','031','5936880','085931222722','','moho@bethanygraha.org','','','support/teknis'),('TOKO ASIA GOLF','Sadimin','031','5670430','081330363932','','asiasport@cbn.net.id','Jl. Mayjend Sungkono No. 192, Blok A-17','3517041002690002','pemohon'),('TOKO ASIA GOLF','Amardeep Singh','031','5670430','0811159992','','asiasport@cbn.net.id','Jl. Mayjend Sungkono No. 192, Blok A-17','3171020705840004','penanggungjawab'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','asiasport@cbn.net.id','','','administrasi'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','asiasport@cbn.net.id','','','setup/teknis'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','asiasport@cbn.net.id','','','penagihan'),('TOKO ASIA GOLF','Sadimin','','','081330363932','','asiasport@cbn.net.id','','','support/teknis'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','031','7491125','08123234760','','arief_poerniawan@yahoo.com','Jl. Margomulyo No. 44 Blok G/20-C','3578070507800002','pemohon'),('PT. SUBUR BUANA RAYA','Arief Poerniawan','031','7491125','08123234760','','arief_poerniawan@yahoo.com','Jl. Margomulyo No. 44 Blok G/20-C','3578070507800002','penanggungjawab'),('PT. SUBUR BUANA RAYA','Natalina','','','08123009547','','g_natalina@yahoo.com','','','penagihan'),('ISWAHJU SOEBAGIJO','Iswahju Soebagijo','031','3821202','0818301204','','isoebagijo@tigabeka.com','Jl. Pantai Mentari Blok B-III','3578101612660006','pemohon'),('ISWAHJU SOEBAGIJO','Iswahju Soebagijo','031','3821202','0818301204','','isoebagijo@tigabeka.com','Jl. Pantai Mentari Blok B-III','3578101612660006','penanggungjawab'),('PT. ROYAL STANDARD','Lisa Darwis','031','5676047','083857086689','','lisa.darwis@yahoo.com','Jl. Villa Bukit Mas Blok RC No. 18','3578254908840002','pemohon'),('PT. ROYAL STANDARD','Jhonny Katikno','031','5676047','081332076697','','jhonnyboy66@yahoo.com','Jl. Villa Bukit Mas Blok RC No. 18','3578212308660001','penanggungjawab'),('PT. ROYAL STANDARD','Dina','031','5676047','','','dina@royalstandard.co.id','','','administrasi'),('PT. ROYAL STANDARD','Lisa Darwis','','','083857086689','','lisa.darwis@yahoo.com','','','setup/teknis'),('PT. ROYAL STANDARD','Dina','031','5676047','','','dina@royalstandard.co.id','','','penagihan'),('PT. ROYAL STANDARD','Lisa Darwis','','','083857086689','','lisa.darwis@yahoo.com','','','support/teknis'),('STEPHEN LEONARD','Stephen Leonard','031','8492021/3530288','','','behemoth378@yahoo.co.id','','','penagihan'),('CV. DORKAS INDONESIA','Denny Tandoyo','031','51503397','031-70600394','','wahyupaper@hotmail.com','Jl. Kedinding Tengah Jaya III No. 21','3578101010850003','pemohon'),('CV. DORKAS INDONESIA','Denny Tandoyo','031','51503397','031-70600394','','wahyupaper@hotmail.com','Jl. Kedinding Tengah Jaya III No. 21','3578101010850003','penanggungjawab'),('CV. DORKAS INDONESIA','Sri','031','51503397','','','wahyupaper@hotmail.com','','','administrasi'),('PT. MAHAGHORA','Yenny','031','3894466','','','finance@mahaghora.com','','','administrasi'),('PT. MAHAGHORA','Yenny','031','3894466','','','finance@mahaghora.com','','','penagihan'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','Ivan Setiawan ','','','081294421102','','ivan.setiawan@envirotechintl.com','Jl. Harun Tohir Gresik ','','pemohon'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','Afin ','021','45866148','','','afin@envirotechintl.com','Rukan Gading Bukit Indah Blok RC7  Jl.  Gading Bukit Indah – Kelapa Gading Jakarta Utara','3172067010710003','pemohon'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','Iswari Kusumaning Ati ','021','45866148','','','Iswari@envirotechintl.com','Rukan Gading Bukit Indah Blok RC7  Jl.  Gading Bukit Indah ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ Kelapa Gading Jakarta Utara','','administrasi'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','Sri Mulyani ','021','45866148','','','acounting07@envirotechintl.com','Rukan Gading Bukit Indah Blok RC7  Jl.  Gading Bukit Indah ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ Kelapa Gading Jakarta Utara','','penagihan'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','Jatmiko ','021','45866148','','','jatmiko@envirotechintl.com','Jl. Harun Tohir Gresik ','','setup/teknis'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','Rio Fernandi ','021','45866148','','','rio@envirotechintl.com','Rukan Gading Bukit Indah Blok RC7  Jl.  Gading Bukit Indah – Kelapa Gading Jakarta Utara','','support/teknis'),('CV. 77 ADVERTISING SUKSES BERSAMA','Diana Mayasari','','','081931529818','','dianawm05@yahoo.com','Jl. Kalilom Lor Timur','3578105406870004','pemohon'),('CV. 77 ADVERTISING SUKSES BERSAMA','Witono','','','081553155696','','witono_promosi@yahoo.com','Jl. Kalilom Lor Timur','3578101301850007','penanggungjawab'),('CV. 77 ADVERTISING SUKSES BERSAMA','Diana Mayasari','','','081931529818','','dianawm05@yahoo.com','','','administrasi'),('CV. 77 ADVERTISING SUKSES BERSAMA','Diana Mayasari','','','081931529818','','dianawm05@yahoo.com','','','setup/teknis'),('CV. 77 ADVERTISING SUKSES BERSAMA','Diana Mayasari','','','081931529818','','dianawm05@yahoo.com','','','penagihan'),('CV. 77 ADVERTISING SUKSES BERSAMA','Diana Mayasari','','','081931529818','','dianawm05@yahoo.com','','','support/teknis'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Wawan','031','7327533','081703524493','','wa2n_setiawan38@yahoo.com','Jl. Ruko Plaza Graha Family B-1','3578102805720009','pemohon'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','Meriani','031','7327533','085230008087','','m3riani@yahoo.com','Jl. Ruko Plaza Graha Family B-1','3578185010840006','penanggungjawab'),('PT. DANTRINDO','Iguh Yuwono','031','8552680','088803221946','','iguhyuwono@dantrade.info','Jl. Muncul Industri No. 5-7, Sidoarjo','3578043110710001','pemohon'),('PT. DANTRINDO','Rio Satryanegara S.','031','8552680','','','rio@dantrindo.com','Jl. Muncul Industri No. 5-7, Sidoarjo','3515162006830005','penanggungjawab'),('PT. DANTRINDO','Iguh Yuwono','031','8552680','','','iguhyuwono@dantrade.info','','','administrasi'),('PT. DANTRINDO','Iguh Yuwono','031','8552680','','','iguhyuwono@dantrade.info','','','setup/teknis'),('PT. DANTRINDO','Kushendarti','031','8552680','','','arti@dantrade.info','','','penagihan'),('PT. DANTRINDO','Iguh Yuwono','031','8552680','','','iguhyuwono@dantrade.info','','','support/teknis'),('PT. DOLE FOOD INDONESIA','Anggi Setyawan','','','081373438500','','anggi.setyawan@doleintl.com','','','penagihan'),('PT. ESA ZONA EKSPRES','Sugianto','031','3281355','','','','Jl. Perak Timur No. 296','3578062402670005','penanggungjawab'),('PT. BENTENG PERSADA MULTINDO','Andrias Tjondro','031','3766722','','','vp.east@yahoo.com','Jl. Kedung Cowek No. 235','3578312106800001','pemohon'),('PT. BENTENG PERSADA MULTINDO','Andrias Tjondro','031','3766722','','','vp.east@yahoo.com','Jl. Kedung Cowek No. 235','3578312106800001','penanggungjawab'),('PT. BENTENG PERSADA MULTINDO','Dessy','031','3766722','','','vp.east@yahoo.com','','','administrasi'),('PT. BENTENG PERSADA MULTINDO','Andrias Tjondro','031','3766722','','','vp.east@yahoo.com','','','setup/teknis'),('PT. BENTENG PERSADA MULTINDO','Dessy','031','3766722','','','vp.east@yahoo.com','','','penagihan'),('PT. BENTENG PERSADA MULTINDO','Andrias Tjondro','031','3766722','','','vp.east@yahoo.com','','','support/teknis'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','Ria Cahyani','0274','512095','','','purchasing.sec2@quick.co.id','Jl. Magelang No. 144, Yogyakarta','34.7101.550973.0001','pemohon'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','Hendro Wijayanto','0274','512095','','','director@quick.co.id','Jl. Magelang No. 144, Yogyakarta','34.7101.125126.00001','penanggungjawab'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','Ida Ayu Normadewi S. P','0274','512095','','','purchasing.sec7@quick.co.id','','','administrasi'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','Adi Sasongko','031','3525687','','','sby@quick.co.id','','','setup/teknis'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','Ida Ayu Normadewi S. P','0274','512095','','','purchasing.sec7@quick.co.id','','','penagihan'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','Johanes','0274','512095','','','it.sec1@quick.co.id','','','support/teknis'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','','','087855277767','','spicy_4165@yahoo.com','Jl. Manyar Sabrangan IX C/1 A','3578262510820001','pemohon'),('TAN SAMUEL KRISTANTO','Tan Samuel Kristanto','','','087855277767','','spicy_4165@yahoo.com','Jl. Manyar Sabrangan IX C/1 A','3578262510820001','penanggungjawab'),('INSAN CENDEKIA, CV','Farizah Haryono','031','5936652','','','farizah@yahoo.com','','','administrasi'),('INSAN CENDEKIA, CV','Farizah Haryono','031','5936652','','','farizah@yahoo.com','','','penagihan'),('PT. AREK SURABAYA TELEVISI JATIM','Tommy Hartopo','031','91000048','081802721578','','tommyhartopo@yahoo.com','Jl. Raya Kahuripan - Ruko Boulevard Blok R No. 39, Sidoarjo','3573050712780001','pemohon'),('PT. AREK SURABAYA TELEVISI JATIM','Bambang Prasetyo Widodo','031','91000048','','','tommyhartopo@yahoo.com','Jl. Raya Kahuripan - Ruko Boulevard Blok R No. 39, Sidoarjo','3578312402600001','penanggungjawab'),('PT. AREK SURABAYA TELEVISI JATIM','Khafid R. Wastuyana','','','081217671800','','khafid.wastuyana@gmail.com','','','administrasi'),('PT. AREK SURABAYA TELEVISI JATIM','Adam Fahamdani','','','081938885048','','aadamreareo@gmail.com','','','setup/teknis'),('PT. AREK SURABAYA TELEVISI JATIM','Khafid R. Wastuyana','','','081217671800','','khafid.wastuyana@gmail.com','','','penagihan'),('PT. AREK SURABAYA TELEVISI JATIM','Adam Fahamdani','','','081938885048','','aadamreareo@gmail.com','','','support/teknis'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','Edwar Mualim','','','08999063714','081383268001','edwar.mualim@uceintl.com','Jl. Ronggolawe No. 2, Malang','3276112012770002','pemohon'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','Lee Bon Kong (Daniel Lee)','021','7202155','','','daniel.lee@uceintl.com','Jl. Antasari No. 15 A, Jakarta','750804145743','penanggungjawab'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','Dewi Idayanti','','','085781234801','','procurement.id@uceintl.com','','','administrasi'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','Shanty Eka Purwandasari','','','081333993737','','shanty.wanda@gmail.com','','','setup/teknis'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','Shanty Eka Purwandasari','','','081333993737','','shanty.wanda@gmail.com','','','support/teknis'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','Dewi Idayanti','','','085781234801','','procurement.id@uceintl.com','','','penagihan'),('PT. REKAJASA AKSES (ACSATA)','Iskandar Zulkarnaen','021','52971861','','','iskandar.zulkarnaen@acsata.com','Gedung Atrium Setiabudi Lt. 7 Suite 703 (Jl. HR. Rasuna Said Kav. 62), Jakarta Selatan','3174090309780002','pemohon'),('PT. REKAJASA AKSES (ACSATA)','Iskandar Zulkarnaen','021','52971861','','','iskandar.zulkarnaen@acsata.com','Gedung Atrium Setiabudi Lt. 7 Suite 703 (Jl. HR. Rasuna Said Kav. 62), Jakarta Selatan','3174090309780002','penanggungjawab'),('PT. REKAJASA AKSES (ACSATA)','Arief Budiman/Alfi Sahrianto','021','52971861','95212033','','alfi@acsata.com/arief_b@acsata.com','','','administrasi'),('PT. REKAJASA AKSES (ACSATA)','Denty Prananjaya','021','52971861','0711-9152000','','denty.prananjaya@acsata.com','','','setup/teknis'),('PT. REKAJASA AKSES (ACSATA)','Yanyan Sopyan','021','52971861','','','yanyan@acsata.com','','','penagihan'),('PT. REKAJASA AKSES (ACSATA)','Solution Support','021','51180000','52971861','','solution.support@acsata.com','','','support/teknis'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','085232567283','','neni.id@melilea,com','Jl. Raya Sukomanunggal Jaya No. 5 (Ruko Satelite Town Square Blok A. 17 - A. 19','3578095605780001','pemohon'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','085232567283','','neni.id@melilea,com','Jl. Raya Sukomanunggal Jaya No. 5 (Ruko Satelite Town Square Blok A. 17 - A. 19','3578095605780001','penanggungjawab'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea,com','','','administrasi'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea,com','','','setup/teknis'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea,com','','','penagihan'),('PT. MELILEA INTERNATIONAL INDONESIA','Neni Artha Br Doloksaribu','031','7325975','','','neni.id@melilea,com','','','support/teknis'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','Daniel','031','8438702','081931073725','','daniel@imcp.co.id','Jl. Rungkut Industri I No. 10','3578261801780001','pemohon'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','Dicky Stefanus','031','8438702','081330071777','','dicky@imcp.co.id','Jl. Rungkut Industri I No. 10','3578031602780002','penanggungjawab'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','Dicky Stefanus','','','081330071777','','dicky@imcp.co.id','','','administrasi'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','Daniel','','','081931073725','','daniel@imcp.co.id','','','setup/teknis'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','Ira','031','8438702','','','ira@imcp.co.id','','','penagihan'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','Daniel','','','081931073725','','daniel@imcp.co.id','','','support/teknis');
/*!40000 ALTER TABLE `dbp_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `device_history`
--

DROP TABLE IF EXISTS `device_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) DEFAULT NULL,
  `device_name` varchar(100) DEFAULT NULL,
  `location` varchar(1) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `mutation_date` datetime DEFAULT NULL,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device_history`
--

LOCK TABLES `device_history` WRITE;
/*!40000 ALTER TABLE `device_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `device_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devicetype_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `description` text,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (21,1,'Mikrotik RB411','buah','1','','naning','2013-12-20 08:52:51'),(23,1,'Mikrotik RB 411L','buah','1','Mikrotik RB 411L','jami','2013-12-20 08:53:13'),(25,1,'Mikrotik RB 433','buah','1','Mikrotik RB 433','jami','2013-12-20 08:53:35'),(26,1,'Mikrotik RB 433AH','buah','1','Mikrotik RB 433AH','jami','2013-12-20 08:55:12'),(27,1,'Mikrotik RB 433L','buah','1','Mikrotik RB 433L','jami','2013-12-20 08:55:32'),(28,1,'Mikrotik RB 800','buah','1','Mikrotik RB 800','jami','2013-12-20 08:55:44'),(29,2,'WLM54AG','buah','1','WLM54AG','jami','2013-12-20 08:56:08'),(30,2,'CM9','buah','1','CM9','jami','2013-12-20 08:56:27'),(31,2,'CM9 GP','buah','1','CM9 GP','jami','2013-12-20 08:56:39'),(32,2,'R52','buah','1','R52','jami','2013-12-20 08:56:53'),(33,2,'R52-350','buah','1','R52-350','jami','2013-12-20 08:57:07'),(34,2,'R52-Hn','buah','1','R52-Hn','jami','2013-12-20 08:57:21'),(35,2,'XR2','buah','1','XR2','jami','2013-12-20 08:57:33'),(36,2,'XR5','buah','1','','amir','2013-12-20 08:57:40'),(37,2,'SR 71 A','buah','1','','amir','2013-12-20 08:58:03'),(38,2,'WMIA166AGH/E','buah','1','','amir','2013-12-20 08:58:24'),(39,3,'UFL to NF','buah','1','','jami','2013-12-20 08:59:07'),(40,3,'MMCX to NF','buah','1','','amir','2013-12-20 08:59:24'),(41,4,'RB 411','buah','1','','amir','2013-12-20 09:00:38'),(42,4,'RB 433','buah','1','','jami','2013-12-20 09:00:55'),(43,4,'RB 800','buah','1','','jami','2013-12-20 09:01:11'),(44,5,'Mikrotik','buah','1','','jami','2013-12-20 09:01:35'),(45,5,'Groove','buah','1','','amir','2013-12-20 09:01:47'),(46,5,'Nano Station5','buah','1','','amir','2013-12-20 09:01:56'),(47,5,'Metal 5 SHPn','buah','1','','amir','2013-12-20 09:02:42'),(133,18,'APC 1000 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(48,2,'WLM54AGP23','buah','1','WLM54AGP23','jami','2014-01-07 02:46:48'),(137,18,'prolink 650 P',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(138,18,'vektor 1000 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(139,18,'Vektor 625 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(135,18,'UC 1000 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(136,18,'powerware 1000 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(55,1,'Mikrotik RB 411AH','buah','1','xxx','jami','2014-01-07 06:35:09'),(56,1,'Mikrotik RB 411A','buah','1','test 1234','puji','2014-01-07 06:36:46'),(145,19,'SVC 500 VA (Flazer)',NULL,'1',NULL,'puji','2014-03-03 09:54:56'),(144,19,'SM 2000 Minamoto',NULL,'1',NULL,'puji','2014-03-03 09:54:56'),(134,18,'APC 1400VA,1500 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(132,18,'APC 500 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(143,18,'ICA (1082 B) 2000 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(141,18,'vektor ablerec 2000 VA ',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(140,18,'Kenika 1000 VA',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(142,18,'Sinewafe 1000 VA (kenika)',NULL,'1',NULL,'puji','2014-03-03 09:52:39'),(70,6,'12V 1A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(69,6,'12V 0.5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(71,6,'12V 1.25A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(72,6,'18V 1A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(73,6,'18V 1.5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(74,6,'24V 0.8A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(75,6,'24V 1A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(76,6,'24V 1.2A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(77,6,'24V 1.25A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(78,6,'24V 1.5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(79,6,'24V 3A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(80,6,'24V 4A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(81,6,'24V 4.5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(82,6,'24V 5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(83,6,'48V 3A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(84,6,'Switch D-Link 5V 1A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(85,6,'Switch 3Com',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(86,6,'Linksys WRT54GL 12V 1A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(87,6,'Ruckus Zoneflex 2942  12V 1A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(88,6,'Linksys PAP2T  5V 2A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(89,6,'Cisco SPA112 ',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(90,6,'Planet ITG  VIP 12V 1.5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(91,6,'UniFi POE Adaptor 24V 0.5A',NULL,'1',NULL,NULL,'2014-02-19 02:24:39'),(92,8,' Grid 24 dBi 2.4 GHz','','1','','naning','2014-02-19 02:29:32'),(93,8,' Grid 27 dBi 5.8 GHz','','1','','naning','2014-02-19 02:29:32'),(94,8,' Solid Dish 28.5 dBi 5.8 GHz','','1','','naning','2014-02-19 02:29:32'),(95,8,'Solid Dish 34 dBi 5.8 GHz',NULL,'1',NULL,NULL,'2014-02-19 02:29:32'),(96,9,'Grid 24 dBi 2.4 GHz','','1','','naning','2014-02-19 02:32:26'),(97,9,'Grid 27 dBi 5.8 GHz','','1','','naning','2014-02-19 02:32:26'),(98,9,'Solid Dish 28.5 dBi 5.8 GHz','','1','','naning','2014-02-19 02:32:26'),(99,9,'Solid Dish 34 dBi 5.8 GHz','','1','','naning','2014-02-19 02:32:26'),(100,1,'Mikrotik Groove A-5HN','','1','','naning','2014-02-19 02:35:16'),(101,1,'Mikrotik Groove 5 HN','','1','','naning','2014-02-19 02:35:16'),(102,1,'NanoStation 5 Loco','','1','','naning','2014-02-19 02:37:18'),(103,1,'NanoStation 5 (5GHz Indoor/Outdoor Dual-Polarity 1','','1','','naning','2014-02-19 02:37:18'),(104,13,'Linksys WRT54GL',NULL,'1',NULL,NULL,'2014-02-19 02:40:12'),(105,13,'Unifi AP',NULL,'1',NULL,NULL,'2014-02-19 02:40:12'),(106,13,'Unifi AP Long Range',NULL,'1',NULL,NULL,'2014-02-19 02:40:12'),(107,13,'Ruckus Zoneflex 2942',NULL,'1',NULL,NULL,'2014-02-19 02:40:12'),(108,14,'Mikrotik RB 450',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(109,14,'Mikrotik RB 450G',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(110,14,'Mikrotik RB 750',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(111,14,'Mikrotik RB 750G',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(112,14,'Mikrotik RB 750GL',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(113,14,'Mikrotik RB 751',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(114,14,'Mikrotik RB 1100',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(115,14,'Mikrotik RB 2011 L-IN',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(116,14,'Mikrotik RB 2011 LS-IN',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(117,14,'Mikrotik RB 2011 UAS-RM',NULL,'1',NULL,NULL,'2014-02-19 02:43:30'),(118,15,'D-Link8Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(119,15,'D-Link16Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(120,15,'3Com8Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(121,15,'3Com16Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(122,15,'3com24Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(123,15,'AlliedTelesisAT-FSW71616Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(124,15,'AlliedTelesisATI24Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(125,15,'AlliedTelesisAT-FSW724-5024Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(126,15,'CiscoSF90-2424Port',NULL,'1',NULL,NULL,'2014-02-19 02:46:09'),(127,16,'stratex XP 4',NULL,'1',NULL,NULL,'2014-02-19 02:48:12'),(128,16,'2.4 Ghz',NULL,'1',NULL,NULL,'2014-02-19 02:48:12'),(129,16,'5.8 Ghz',NULL,'1',NULL,NULL,'2014-02-19 02:48:12'),(130,17,'APC',NULL,'1',NULL,NULL,'2014-02-19 02:50:04'),(131,17,'Canopy',NULL,'1',NULL,NULL,'2014-02-19 02:50:04'),(146,20,'Box Wallmount Rack','-','1','Box Wallmount Rack','jami','2014-04-21 03:11:51'),(147,20,'Box Panel Listrik','-','1','Box Panel Listrik','jami','2014-04-21 03:12:09'),(148,21,'SFP','-','1','small form-factor pluggable','jami','2014-04-21 03:14:59'),(149,1,'Canopy AP','-','1','-','naning','2014-04-29 06:46:27'),(150,1,'Canopy SM','-','1','-','naning','2014-04-29 06:46:34'),(151,5,'Canopy 24 V','-','1','-','puji','2014-04-29 06:46:56'),(152,8,'Reflector Canopy','-','1','-','puji','2014-04-29 06:47:18'),(153,14,'Microtik CCR1016-12G','-','1','-','puji','2014-04-29 06:47:53'),(154,14,'Cisco7200','-','1','-','puji','2014-04-29 06:48:07'),(155,14,'Cisco2600','-','1','-','puji','2014-04-29 06:48:19'),(156,14,'Cisco2800','-','1','-','puji','2014-04-29 06:48:29'),(157,15,'Cisco2970G','-','1','-','puji','2014-04-29 06:48:51'),(158,15,'Cisco2950T','-','1','-','puji','2014-04-29 06:49:06'),(159,15,'HP Procruve 2510G','-','1','-','puji','2014-04-29 06:49:32'),(160,23,'Surge Protector','-','1','-','puji','2014-04-29 06:49:56'),(161,23,'Ethernet Arrester','-','1','-','puji','2014-04-29 06:50:08'),(162,23,'Ground Rod','-','1','-','puji','2014-04-29 06:50:18'),(163,23,'Skun','-','1','-','puji','2014-04-29 06:50:26'),(164,23,'Spitter','-','1','-','puji','2014-04-29 06:50:34'),(165,23,'Busbar','-','1','-','puji','2014-04-29 06:50:42'),(166,7,'Jumper','buah','1','Jumper','jami','2014-08-28 01:14:14'),(167,1,'Mikrotik Metal 5 SHPN','buah','1','Mikrotik','naning','2014-08-28 01:15:21'),(168,10,'A-52HPn','','1','','naning','2014-12-04 08:31:09'),(169,1,'Mikrotik Groove A-52HPn','','1','','naning','2014-12-04 08:40:40'),(170,3,'N Male to N Female','','1','Jumper Groove','naning','2015-04-01 02:40:13');
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devicetypes`
--

DROP TABLE IF EXISTS `devicetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devicetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devicetypes`
--

LOCK TABLES `devicetypes` WRITE;
/*!40000 ALTER TABLE `devicetypes` DISABLE KEYS */;
INSERT INTO `devicetypes` VALUES (1,'Board','1','Board',NULL,'2013-12-18 01:47:13'),(2,'Mini PCI','1','Mini PCI','jami','2013-12-18 01:55:09'),(3,'Pigtail','1','Pigtail','jami','2013-12-18 01:57:12'),(4,'Outdoor Box','1','Kotak luar','jami','2013-12-18 02:00:10'),(5,'POE','1','Power Over Ethernet','jami','2013-12-18 02:01:54'),(6,'Adaptor','1','Power Adaptor','jami','2013-12-18 02:04:06'),(7,'Jumper','1','Jumper','jami','2013-12-18 02:04:50'),(8,'Antena','1','Antena','jami','2013-12-18 02:38:14'),(9,'Pole Antena','1','Pole Antena','jami','2013-12-18 02:38:26'),(10,'Mikrotik Groove','1','Mikrotik Groove','jami','2013-12-18 02:38:57'),(11,'Mikrotik Metal 5 SHPN','1','Mikrotik Metal 5 SHPN','jami','2013-12-18 02:42:05'),(12,'Nano station 5','1','Nano station 5','jami','2013-12-18 02:43:24'),(13,'AP Wifi Indoor','1','AP Wifi Indoor','jami','2013-12-18 02:43:56'),(14,'Router','1','Router','jami','2013-12-18 02:49:43'),(15,'Switch','1','Switch','jami','2013-12-18 02:49:56'),(16,'Surge Arrester','1','Surge Arrester','jami','2013-12-18 02:50:30'),(17,'Ethernet Arrester','1','Ethernet Arrester','jami','2013-12-18 02:51:00'),(18,'UPS','1','UPS','jami','2013-12-18 02:51:14'),(19,'Stavolt','1','Stavolt','jami','2013-12-18 02:51:33'),(20,'Box','1','Box','jami','2014-04-21 03:11:02'),(21,'Transceiver','1','Transceiver','jami','2014-04-21 03:14:24'),(22,'Canopy','1','Canopy  - request by Vincent','puji','2014-04-29 06:45:29'),(23,'Grounding','1','Grounding  - request by Vincent','puji','2014-04-29 06:45:51');
/*!40000 ALTER TABLE `devicetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disconnection_operators`
--

DROP TABLE IF EXISTS `disconnection_operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disconnection_operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disconnection_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disconnection_operators`
--

LOCK TABLES `disconnection_operators` WRITE;
/*!40000 ALTER TABLE `disconnection_operators` DISABLE KEYS */;
/*!40000 ALTER TABLE `disconnection_operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disconnectionlogs`
--

DROP TABLE IF EXISTS `disconnectionlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disconnectionlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disconnection_id` int(11) DEFAULT NULL,
  `datelog` varchar(10) DEFAULT NULL,
  `hourlog` varchar(2) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disconnectionlogs`
--

LOCK TABLES `disconnectionlogs` WRITE;
/*!40000 ALTER TABLE `disconnectionlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `disconnectionlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disconnections`
--

DROP TABLE IF EXISTS `disconnections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disconnections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disconnectiontype` varchar(1) DEFAULT NULL COMMENT '"0":reaktivasi "1":isolir "2":temporer "3":permanen',
  `client_site_id` int(11) DEFAULT NULL,
  `period` varchar(1) DEFAULT '1' COMMENT '"1":1month "2":2month "3":3month',
  `reason` text,
  `fee` decimal(10,2) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `finishdate` datetime DEFAULT NULL,
  `executiondate` datetime DEFAULT NULL,
  `reactivationdate` datetime DEFAULT NULL,
  `permanentdate` datetime DEFAULT NULL,
  `executed` varchar(1) DEFAULT '0' COMMENT '0:not yet, 1:already',
  `withdrawaldate` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL COMMENT '"0":propose disconnect "1" disconnected "2":reactivation "3":activated',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disconnections`
--

LOCK TABLES `disconnections` WRITE;
/*!40000 ALTER TABLE `disconnections` DISABLE KEYS */;
/*!40000 ALTER TABLE `disconnections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `durations`
--

DROP TABLE IF EXISTS `durations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `durations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `durations`
--

LOCK TABLES `durations` WRITE;
/*!40000 ALTER TABLE `durations` DISABLE KEYS */;
INSERT INTO `durations` VALUES (1,'<2 jam','2012-08-29 09:16:41','1'),(2,'2 - 4 jam','2012-08-29 09:16:41','1'),(3,'4 - 8 jam','2012-08-29 09:16:41','1'),(4,'>8 jam','2012-08-29 09:16:41','1');
/*!40000 ALTER TABLE `durations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follow_ups`
--

DROP TABLE IF EXISTS `follow_ups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow_ups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text,
  `follow_up_date` datetime DEFAULT NULL,
  `next_follow_up_date` datetime DEFAULT NULL,
  `followed_up` varchar(1) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `follow_up_user` varchar(20) DEFAULT NULL,
  `telemarketer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow_ups`
--

LOCK TABLES `follow_ups` WRITE;
/*!40000 ALTER TABLE `follow_ups` DISABLE KEYS */;
/*!40000 ALTER TABLE `follow_ups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'I','Golongan I','puji','2014-05-11 03:32:17'),(2,'II','Golongan II','puji','2014-05-11 03:32:24'),(3,'III','Golongan III','puji','2014-05-11 03:32:30'),(4,'IV','Golongan IV','puji','2014-05-11 03:32:36'),(5,'V','Golongan V','puji','2014-05-11 03:32:42');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades_users`
--

DROP TABLE IF EXISTS `grades_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades_users` (
  `grade_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades_users`
--

LOCK TABLES `grades_users` WRITE;
/*!40000 ALTER TABLE `grades_users` DISABLE KEYS */;
INSERT INTO `grades_users` VALUES (5,11),(4,11),(2,2),(3,11),(2,11),(3,3),(3,4),(2,5),(3,6),(4,7),(3,8),(4,9),(3,10),(2,12),(1,17),(3,15),(2,27),(4,32),(2,20),(3,18),(3,37),(2,13),(2,36),(3,29),(4,50);
/*!40000 ALTER TABLE `grades_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_preferences`
--

DROP TABLE IF EXISTS `group_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_preferences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `label` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_preferences`
--

LOCK TABLES `group_preferences` WRITE;
/*!40000 ALTER TABLE `group_preferences` DISABLE KEYS */;
INSERT INTO `group_preferences` VALUES (1,'show_users',NULL,NULL,NULL,'2012-10-29 23:48:11',NULL),(2,'add_user',NULL,NULL,NULL,'2012-10-29 23:48:20',NULL),(3,'create survey request',NULL,NULL,NULL,'2012-10-30 00:10:41',NULL),(4,'show survey requests',NULL,NULL,NULL,'2012-10-30 00:10:56',NULL),(5,'show_install_requests',NULL,NULL,NULL,'2013-01-09 23:50:27','puji'),(6,'create survey request',NULL,NULL,NULL,'2013-03-25 09:55:28',NULL),(7,'show survey request',NULL,NULL,NULL,'2013-03-25 09:55:39',NULL),(8,'show survey requests',NULL,NULL,NULL,'2013-03-25 09:57:48',NULL);
/*!40000 ALTER TABLE `group_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Administrator','Admin'),(2,'Umum dan Warehouse','Umum dan Warehouse'),(3,'Sales','Sales'),(4,'TS','Teknis'),(5,'Accounting','Accounting');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups_old`
--

DROP TABLE IF EXISTS `groups_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups_old`
--

LOCK TABLES `groups_old` WRITE;
/*!40000 ALTER TABLE `groups_old` DISABLE KEYS */;
INSERT INTO `groups_old` VALUES (1,'Administrators','2012-08-29 09:16:41'),(2,'telemarketers','2012-08-29 09:16:41'),(3,'sales','2012-08-29 09:16:41'),(4,'TS','2013-03-25 07:24:41');
/*!40000 ALTER TABLE `groups_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups_users`
--

DROP TABLE IF EXISTS `groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups_users` (
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups_users`
--

LOCK TABLES `groups_users` WRITE;
/*!40000 ALTER TABLE `groups_users` DISABLE KEYS */;
INSERT INTO `groups_users` VALUES (2,4),(4,4),(3,4),(6,2),(7,4),(8,3),(9,3),(11,3),(10,3),(12,3),(17,1),(15,4),(27,4),(20,4),(18,4),(37,4),(13,3),(36,4),(29,5),(31,5),(32,5),(30,5),(16,4),(40,3),(11,4),(11,1),(11,2),(1,1),(5,2),(14,3),(19,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(28,3),(33,3),(34,3),(35,4),(38,4),(39,3),(41,3),(42,3),(43,3),(44,3),(45,3),(46,3),(47,3),(48,3),(49,3),(50,3),(17,2),(17,4),(17,5),(17,3),(51,4),(52,3),(10,5),(10,2),(10,4),(10,1);
/*!40000 ALTER TABLE `groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `implementation_targets`
--

DROP TABLE IF EXISTS `implementation_targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `implementation_targets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `implementation_targets`
--

LOCK TABLES `implementation_targets` WRITE;
/*!40000 ALTER TABLE `implementation_targets` DISABLE KEYS */;
INSERT INTO `implementation_targets` VALUES (1,'2012-08-29 09:16:41','<1 mg'),(2,'2012-08-29 09:16:41','>1mg - <1bln'),(3,'2012-08-29 09:16:41','1 - 2 bln'),(4,'2012-08-29 09:16:41','3 - 6 bln'),(5,'2012-08-29 09:16:41','> 6bln');
/*!40000 ALTER TABLE `implementation_targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_antennas`
--

DROP TABLE IF EXISTS `install_antennas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_antennas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `location` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_antennas`
--

LOCK TABLES `install_antennas` WRITE;
/*!40000 ALTER TABLE `install_antennas` DISABLE KEYS */;
INSERT INTO `install_antennas` VALUES (1,1,' Grid 27 dBi 5.8 GHz',NULL,'Tower 20 meter',NULL,'2015-04-17 12:09:20');
/*!40000 ALTER TABLE `install_antennas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `site_antenna` AFTER INSERT ON `install_antennas`
 FOR EACH ROW begin
select modified from client_sites a left outer join install_sites b on b.client_site_id=a.id where b.id=new.install_site_id into @modified;
if @modified='0' then
insert into site_antennas (client_site_id,name,amount,location,createuser) select client_site_id,new.name,new.amount,new.location,new.createuser from install_sites where id=new.install_site_id;
end if ;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `install_ap_wifis`
--

DROP TABLE IF EXISTS `install_ap_wifis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_ap_wifis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(32) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `essid` varchar(32) DEFAULT NULL,
  `security_key` varchar(100) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_ap_wifis`
--

LOCK TABLES `install_ap_wifis` WRITE;
/*!40000 ALTER TABLE `install_ap_wifis` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_ap_wifis` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `site_ap_wifi` AFTER INSERT ON `install_ap_wifis`
 FOR EACH ROW begin
select modified from client_sites a left outer join install_sites b on b.client_site_id=a.id where b.id=new.install_site_id into @modified;
if @modified='0' then
insert into site_ap_wifis (client_site_id,tipe,macboard,ip_address,essid,security_key,user,password,location,owner,user_name) select client_site_id,new.tipe,new.macboard,new.ip_address,new.essid,new.security_key,new.user,new.password,new.location,new.owner,new.user_name from install_sites where id = new.install_site_id; 
end if ;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `install_bas`
--

DROP TABLE IF EXISTS `install_bas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_bas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_bas`
--

LOCK TABLES `install_bas` WRITE;
/*!40000 ALTER TABLE `install_bas` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_bas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_dates`
--

DROP TABLE IF EXISTS `install_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_request_id` int(11) DEFAULT NULL,
  `schedule_date` datetime DEFAULT NULL,
  `reason` text,
  `username` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_dates`
--

LOCK TABLES `install_dates` WRITE;
/*!40000 ALTER TABLE `install_dates` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_files`
--

DROP TABLE IF EXISTS `install_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_request_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ftype` varchar(20) DEFAULT NULL,
  `description` text,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_files`
--

LOCK TABLES `install_files` WRITE;
/*!40000 ALTER TABLE `install_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_images`
--

DROP TABLE IF EXISTS `install_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `roworder` int(11) DEFAULT NULL,
  `description` text,
  `username` varchar(40) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_images`
--

LOCK TABLES `install_images` WRITE;
/*!40000 ALTER TABLE `install_images` DISABLE KEYS */;
INSERT INTO `install_images` VALUES (1,2,'konfigurasi.png','Dokumentasi Foto',NULL,'Konfigurasi router mikrotik groove','arif','2015-04-21 21:58:58'),(2,2,'speedtest sby.png','Speed Test',NULL,'Speedtest Padinet Surabaya','arif','2015-04-21 21:59:51'),(3,2,'Speedtest jkt.png','Speed Test',NULL,'Speedtest Jakarta','arif','2015-04-21 22:00:26'),(4,2,'Speedtest Sng.png','Speed Test',NULL,'Speedtest Singapore','arif','2015-04-21 22:00:39'),(5,1,'dok1.jpg','Speed Test',NULL,'Speedtest Padinet Surabaya','arif','2015-04-23 01:13:27'),(6,1,'dok2.jpg','Speed Test',NULL,'Speedtest Padinet Jakarta','arif','2015-04-23 01:13:39'),(7,1,'jalurkabelmasukplafon.png','Dokumentasi Foto',NULL,'','arif','2015-04-23 01:22:25'),(8,1,'rungkut1.png','Dokumentasi Foto',NULL,'','arif','2015-04-23 01:23:53'),(9,1,'rungkut1.png','Dokumentasi Foto',NULL,'','arif','2015-04-23 01:25:11'),(10,1,'rungkut1.png','Dokumentasi Foto',NULL,'','arif','2015-04-23 01:25:18'),(11,1,'topologi_jaringan.png','Topologi Jaringan',NULL,'','arif','2015-04-23 02:44:52'),(13,2,'IMG_20150420_155811.jpg','Dokumentasi Foto',NULL,'lokasi adaptor dan poe','arif','2015-04-23 02:55:45'),(14,2,'Topologi Tjakrindo Beton.jpg','Topologi Jaringan',NULL,'Topologi','arif','2015-04-23 05:37:01'),(15,2,'IMG_20150420_160437.jpg','Dokumentasi Foto',NULL,'Foto antena di tower','arif','2015-04-23 05:37:32'),(16,2,'bw-test.JPG','Dokumentasi Foto',NULL,'bandwidth test 4 Mbps both','arif','2015-04-23 05:38:17'),(17,4,'DeepinScreenshot20150217104718.png','Topologi Jaringan',NULL,'work from home','puji','2015-05-06 02:03:12'),(18,2,'point areas big kendo.jpg','Topologi Jaringan',NULL,'should be','puji','2015-05-06 02:24:32'),(19,2,'LOGO_KOPASSUS.png','Topologi Jaringan',NULL,'logo kopasus','puji','2015-05-06 02:28:49'),(20,2,'violenceisoption.jpg','Topologi Jaringan',NULL,'vio','puji','2015-05-06 02:34:20'),(21,2,'cut_nya_dien.jpeg','Topologi Jaringan',NULL,'cnd','puji','2015-05-06 02:36:10'),(32,6,'abc.png','Topologi Jaringan',NULL,'abcd','puji','2015-05-11 13:17:16'),(31,5,'hilal.jpg','Topologi Jaringan',NULL,'hilal','puji','2015-05-11 09:52:01'),(30,5,'deepinscreenshot20150112123904.png','Topologi Jaringan',NULL,'tokoperalatankantor','puji','2015-05-11 09:39:26'),(29,3,'hilal.jpg','Topologi Jaringan',NULL,'Hilal','puji','2015-05-11 07:46:29'),(27,6,'never_give_up.jpg','Topologi Jaringan',NULL,'ngu','puji','2015-05-08 01:20:06'),(28,6,'violence_is_option.jpg','Topologi Jaringan',NULL,'vio','puji','2015-05-08 01:22:23');
/*!40000 ALTER TABLE `install_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_installers`
--

DROP TABLE IF EXISTS `install_installers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_installers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_installers`
--

LOCK TABLES `install_installers` WRITE;
/*!40000 ALTER TABLE `install_installers` DISABLE KEYS */;
INSERT INTO `install_installers` VALUES (1,1,'arif','2015-04-17 01:22:09',NULL),(2,1,'catur','2015-04-17 01:22:14',NULL),(3,2,'arif','2015-04-20 02:53:19',NULL),(4,2,'catur','2015-04-20 02:53:26',NULL),(5,6,'suhartono','2015-04-27 00:25:26',NULL),(6,2,'kholis','2015-05-06 02:27:41',NULL);
/*!40000 ALTER TABLE `install_installers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_materials`
--

DROP TABLE IF EXISTS `install_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_materials`
--

LOCK TABLES `install_materials` WRITE;
/*!40000 ALTER TABLE `install_materials` DISABLE KEYS */;
INSERT INTO `install_materials` VALUES (1,2,0,'Pangkon antena','Pangkon Antenna','','','2015-04-21 22:01:13'),(2,2,20,'Klem ','20 mm','3 pcs','','2015-04-21 22:01:54'),(3,2,5,'Klem kabel ','5 mm','','','2015-04-21 22:02:20'),(4,1,0,'Pangkon antena','Pangkon Antenna','','','2015-04-23 01:09:37'),(5,1,20,'Klem ','20 mm','','','2015-04-23 01:10:27'),(6,1,0,'Kabel Jaringan','UTP Cat5e','70 meter','','2015-04-23 01:10:51'),(7,1,3,'Isolasi rubber','3M','','','2015-04-23 01:11:03'),(8,1,0,'Isolasi listrik','Isolasi Listrik','','','2015-04-23 01:11:09'),(10,2,0,'Kabel Jaringan','UTP Cat5e','70 meter','','2015-04-23 05:38:54'),(11,2,0,'Isolasi listrik','Isolasi Listrik','','','2015-04-23 05:39:34'),(12,2,3,'Isolasi rubber','3M','','','2015-04-23 05:39:38');
/*!40000 ALTER TABLE `install_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_pccards`
--

DROP TABLE IF EXISTS `install_pccards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_pccards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `macaddress` varchar(50) DEFAULT NULL,
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_pccards`
--

LOCK TABLES `install_pccards` WRITE;
/*!40000 ALTER TABLE `install_pccards` DISABLE KEYS */;
INSERT INTO `install_pccards` VALUES (2,1,'XR5','00:15:6D:6C:67:02',NULL,NULL,'2015-04-17 12:08:00'),(3,6,'XR5','',NULL,NULL,'2015-04-27 00:24:51');
/*!40000 ALTER TABLE `install_pccards` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `site_pccard` AFTER INSERT ON `install_pccards`
 FOR EACH ROW begin
select modified from client_sites a left outer join install_sites b on b.client_site_id=a.id where b.id=new.install_site_id into @modified;
if @modified='0' then
insert into site_pccards ( client_site_id,name,macaddress,description,createuser) select client_site_id,new.name,new.macaddress,new.description,new.createuser from install_sites where id=new.install_site_id;
end if ;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `install_requests`
--

DROP TABLE IF EXISTS `install_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_request_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `direction` varchar(1) DEFAULT '0',
  `pic_name` varchar(30) DEFAULT NULL,
  `pic_position` varchar(20) DEFAULT NULL,
  `pic_phone_area` varchar(5) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(50) DEFAULT NULL,
  `install_date` datetime DEFAULT NULL,
  `trial_permanent` varchar(1) DEFAULT '0',
  `trial_periode1` datetime DEFAULT NULL,
  `trial_periode2` datetime DEFAULT NULL,
  `accepted` varchar(1) DEFAULT '1',
  `permit` varchar(1) DEFAULT '0',
  `reschedule1` datetime DEFAULT NULL,
  `reschedule2` datetime DEFAULT NULL,
  `create_shapper` varchar(1) DEFAULT '0',
  `create_whatsup` varchar(1) DEFAULT '0',
  `create_mrtg` varchar(1) DEFAULT '0',
  `fix_install_date` datetime DEFAULT NULL,
  `user_close` varchar(50) DEFAULT NULL,
  `description` text,
  `active` varchar(1) DEFAULT '1',
  `status` varchar(1) DEFAULT '0',
  `createuser` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_requests`
--

LOCK TABLES `install_requests` WRITE;
/*!40000 ALTER TABLE `install_requests` DISABLE KEYS */;
INSERT INTO `install_requests` VALUES (1,NULL,NULL,9,7,'0','edwin','lainnya','(0343','741873','rachmad.y.winarno@gmail.com','2015-04-17 08:00:17','0',NULL,NULL,'1','1',NULL,NULL,'0','0','0',NULL,NULL,'','1','0','dwi','2015-04-17 01:17:26'),(2,NULL,NULL,7,1,'0','Jonny','IT Dept','031','7993816 ','jonny@tjakrindomas.co.id','2015-04-20 13:00:50','0',NULL,NULL,'1','1',NULL,NULL,'0','0','0',NULL,NULL,'minta tolong diinstalasi ya pak... thnks','1','1','arif','2015-04-17 02:18:52'),(3,NULL,NULL,6,7,'0','Rosianang','IT Dept','031','7490754','rosianang.brilian@yahoo.com','2015-04-20 08:00:20','0',NULL,NULL,'1','1',NULL,NULL,'0','0','0',NULL,NULL,'Padi Smart Value Up to 2 Mbps','1','u','yudi','2015-04-21 08:57:42'),(4,NULL,NULL,19,7,'0','edwin','lainnya',' 0343','745225','rachmad.y.winarno@gmail.com','2015-04-23 08:00:03','0',NULL,NULL,'1','1',NULL,NULL,'0','0','0',NULL,NULL,'','1','0','dwi','2015-04-22 13:09:55'),(5,NULL,NULL,10,7,'0','edwin','lainnya','0234','3631593','rachmad.y.winarno@gmail.com','2015-04-24 08:00:22','0',NULL,NULL,'1','1',NULL,NULL,'0','0','0',NULL,NULL,'','1','0','dwi','2015-04-23 02:47:13'),(6,NULL,NULL,17,1,'0','Edwin','lainnya','0343','611067','rachmad.y.winarno@gmail.com','2015-04-27 08:00:12','0',NULL,NULL,'1','1',NULL,NULL,'0','0','0',NULL,NULL,'','1','0','yanto','2015-04-24 06:20:57');
/*!40000 ALTER TABLE `install_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_requests_users`
--

DROP TABLE IF EXISTS `install_requests_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_requests_users` (
  `install_request_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_requests_users`
--

LOCK TABLES `install_requests_users` WRITE;
/*!40000 ALTER TABLE `install_requests_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_requests_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_routers`
--

DROP TABLE IF EXISTS `install_routers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_routers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(200) DEFAULT NULL,
  `ip_public` varchar(15) DEFAULT NULL,
  `ip_private` varchar(15) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `milikpadinet` varchar(1) DEFAULT '1',
  `serialno` varchar(50) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_routers`
--

LOCK TABLES `install_routers` WRITE;
/*!40000 ALTER TABLE `install_routers` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_routers` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `site_router` AFTER INSERT ON `install_routers`
 FOR EACH ROW begin
select modified from client_sites a left outer join install_sites b on b.client_site_id=a.id where b.id=new.install_site_id into @modified;
if @modified='0' then
insert into site_routers (client_site_id,tipe,macboard,ip_public,ip_private,user,password,location,milikpadinet) select client_site_id,new.tipe,new.macboard,new.ip_public,new.ip_private,new.user,new.password,new.location,new.milikpadinet from install_sites where id=new.install_site_id;
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `install_sites`
--

DROP TABLE IF EXISTS `install_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pic_name` varchar(50) DEFAULT NULL,
  `pic_position` varchar(50) DEFAULT NULL,
  `pic_phone_area` varchar(10) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(50) DEFAULT NULL,
  `install_date` datetime DEFAULT NULL,
  `permit` varchar(1) DEFAULT '1',
  `description` text,
  `active` varchar(1) DEFAULT '1',
  `status` varchar(1) DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_sites`
--

LOCK TABLES `install_sites` WRITE;
/*!40000 ALTER TABLE `install_sites` DISABLE KEYS */;
INSERT INTO `install_sites` VALUES (1,1,9,7,'jl bader no 3 kalirejo pasuruan','pasuruan','edwin','lainnya','(0343','741873','rachmad.y.winarno@gmail.com','2015-04-17 08:00:17','1','','1','0','2015-04-17 01:17:26','dwi'),(2,2,7,1,'Raya Kepatihan 168A Menganti Gresik','Gresik','Jonny','IT Dept','031','7993816 ','jonny@tjakrindomas.co.id','2015-04-20 13:00:50','1','minta tolong diinstalasi ya pak... thnks','1','1','2015-04-17 02:18:52','arif'),(3,3,6,7,'Jl. Laksda M. Natsir No. 17','Surabaya','Rosianang','IT Dept','031','7490754','rosianang.brilian@yahoo.com','2015-04-20 08:00:20','1','Padi Smart Value Up to 2 Mbps','1','u','2015-04-21 08:57:42','yudi'),(4,4,19,7,' Jl. Raya Rembang ','Pasuruan','edwin','lainnya',' 0343','745225','rachmad.y.winarno@gmail.com','2015-04-23 08:00:03','1','','1','0','2015-04-22 13:09:56','dwi'),(5,5,10,7,'jl dr soetomo pandaan pasuruan','pasuruan','edwin','lainnya','0234','3631593','rachmad.y.winarno@gmail.com','2015-04-24 08:00:22','1','','1','0','2015-04-23 02:47:13','dwi'),(6,6,17,1,'Jl. Pegadaian No 1 Purwosari','Pasuruan','Edwin','lainnya','0343','611067','rachmad.y.winarno@gmail.com','2015-04-27 08:00:12','1','','1','0','2015-04-24 06:20:57','yanto');
/*!40000 ALTER TABLE `install_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_switches`
--

DROP TABLE IF EXISTS `install_switches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_switches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `port` varchar(3) DEFAULT NULL,
  `ismanaged` varchar(1) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_switches`
--

LOCK TABLES `install_switches` WRITE;
/*!40000 ALTER TABLE `install_switches` DISABLE KEYS */;
/*!40000 ALTER TABLE `install_switches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `install_wireless_radios`
--

DROP TABLE IF EXISTS `install_wireless_radios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_wireless_radios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(200) DEFAULT NULL,
  `ip_radio` varchar(32) DEFAULT NULL,
  `ip_ap` varchar(32) DEFAULT NULL,
  `ip_ethernet` varchar(50) DEFAULT NULL,
  `essid` varchar(50) DEFAULT NULL,
  `freqwency` varchar(10) DEFAULT NULL,
  `polarization` varchar(30) DEFAULT NULL,
  `signal` varchar(30) DEFAULT NULL,
  `quality` varchar(30) DEFAULT NULL,
  `throughput_udp` varchar(30) DEFAULT NULL,
  `throughput_tcp` varchar(30) DEFAULT NULL,
  `noise` varchar(50) DEFAULT NULL COMMENT 'noise needed by report',
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `install_wireless_radios`
--

LOCK TABLES `install_wireless_radios` WRITE;
/*!40000 ALTER TABLE `install_wireless_radios` DISABLE KEYS */;
INSERT INTO `install_wireless_radios` VALUES (2,1,'Mikrotik RB 411L','D4:CA:6D:84:C1:51','10.100.105.87','AP Neo Pasuruan (10.100.100.118)','','pd-neo-javanet','5775 MHz','vertical','-70/-70 dBm','80%','1 Mbps','1 Mbps','31','admin','mkmpds989'),(3,2,'Mikrotik Groove A-52HPn','4C:5E:0C:CC:3F:2A','202.6.238.246','AP Oracle Timur Laut (10.100.100','192.168.5.250','pd-oracle-timurlaut','5180 MHz','vertical','-38/-56 dBm','100/100 %','10 Mbps','5 Mbps','-116 dBm','admin','mkmpdt989'),(4,6,'Mikrotik RB 411L','','','Belum ada AP','','','','vertical','','','','','','','');
/*!40000 ALTER TABLE `install_wireless_radios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `site_wireless_radio` AFTER INSERT ON `install_wireless_radios`
 FOR EACH ROW begin
select modified from client_sites a left outer join install_sites b on b.client_site_id=a.id where b.id=new.install_site_id into @modified;
if @modified='0' then
insert into site_wireless_radios ( client_site_id,tipe,macboard,ip_radio,ip_ap,ip_ethernet,essid,freqwency,polarization,`signal`,quality,throughput_udp,throughput_tcp,user,password) select client_site_id,new.tipe,new.macboard,new.ip_radio,new.ip_ap,new.ip_ethernet,new.essid,new.freqwency,new.polarization,new.signal,new.quality,new.throughput_udp,new.throughput_tcp,new.user,new.password from install_sites where id=new.install_site_id;
end if ;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `internal_messages`
--

DROP TABLE IF EXISTS `internal_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internal_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT NULL,
  `obj_type` varchar(30) DEFAULT 'survey_request',
  `content` text,
  `proposed_date1` datetime DEFAULT NULL,
  `proposed_date2` datetime DEFAULT NULL,
  `message_type` varchar(1) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `recipient_group` int(11) DEFAULT '0',
  `hasread` varchar(1) DEFAULT '0',
  `followuplink` varchar(60) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internal_messages`
--

LOCK TABLES `internal_messages` WRITE;
/*!40000 ALTER TABLE `internal_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `internal_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internet_fees`
--

DROP TABLE IF EXISTS `internet_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internet_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internet_fees`
--

LOCK TABLES `internet_fees` WRITE;
/*!40000 ALTER TABLE `internet_fees` DISABLE KEYS */;
INSERT INTO `internet_fees` VALUES (1,'<350 rb','2012-08-29 09:16:41','1'),(2,'350 - 500 rb','2012-08-29 09:16:41','1'),(3,'500 - 750 rb','2012-08-29 09:16:41','1'),(4,'750 rb - 1,5 jt','2012-08-29 09:16:41','1'),(5,'>1,5 jt - 3 jt','2012-08-29 09:16:41','1'),(6,'>3 - 5 jt','2012-08-29 09:16:41','1'),(7,'>5 - 10 jt','2012-08-29 09:16:41','1'),(8,'>10 jt','2012-08-29 09:16:41','1');
/*!40000 ALTER TABLE `internet_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internet_problems`
--

DROP TABLE IF EXISTS `internet_problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internet_problems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internet_problems`
--

LOCK TABLES `internet_problems` WRITE;
/*!40000 ALTER TABLE `internet_problems` DISABLE KEYS */;
INSERT INTO `internet_problems` VALUES (1,'Kualitas link','2012-08-29 09:16:41','1'),(2,'Support teknis','2012-08-29 09:16:41','1'),(3,'Harga','2012-08-29 09:16:41','1');
/*!40000 ALTER TABLE `internet_problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internet_speeds`
--

DROP TABLE IF EXISTS `internet_speeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internet_speeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internet_speeds`
--

LOCK TABLES `internet_speeds` WRITE;
/*!40000 ALTER TABLE `internet_speeds` DISABLE KEYS */;
INSERT INTO `internet_speeds` VALUES (1,'<=512 Kbps','2012-08-29 09:16:41','1'),(2,'512 Kbps - 1 Mbps','2012-08-29 09:16:41','1'),(3,'1 Mbps - 2 Mbps','2012-08-29 09:16:41','1'),(4,'2 Mbps - 5 Mbps','2012-08-29 09:16:41','1'),(5,'>5 Mbps','2012-08-29 09:16:41','1');
/*!40000 ALTER TABLE `internet_speeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internet_users`
--

DROP TABLE IF EXISTS `internet_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internet_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internet_users`
--

LOCK TABLES `internet_users` WRITE;
/*!40000 ALTER TABLE `internet_users` DISABLE KEYS */;
INSERT INTO `internet_users` VALUES (1,'1 - 2','2012-08-29 09:16:41','1'),(2,'3 - 5','2012-08-29 09:16:41','1'),(3,'6 - 10','2012-08-29 09:16:41','1'),(4,'11 - 20','2012-08-29 09:16:41','1'),(5,'>20','2012-08-29 09:16:41','1');
/*!40000 ALTER TABLE `internet_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ionauthgroups`
--

DROP TABLE IF EXISTS `ionauthgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ionauthgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ionauthgroups`
--

LOCK TABLES `ionauthgroups` WRITE;
/*!40000 ALTER TABLE `ionauthgroups` DISABLE KEYS */;
INSERT INTO `ionauthgroups` VALUES (1,'admin','Administrator'),(2,'members','General User');
/*!40000 ALTER TABLE `ionauthgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ionauths`
--

DROP TABLE IF EXISTS `ionauths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ionauths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(80) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ionauths`
--

LOCK TABLES `ionauths` WRITE;
/*!40000 ALTER TABLE `ionauths` DISABLE KEYS */;
INSERT INTO `ionauths` VALUES (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1387503695,1,'Admin','istrator','ADMIN','0'),(2,'\0\0','jarwo','0',NULL,'jarwo@gmail.com',NULL,NULL,NULL,NULL,1387443426,1387443426,1,NULL,NULL,NULL,NULL),(3,'\0\0','bagro','03276094f21d9f2e9dfda910b8816533a077c09f',NULL,'bagro@gmail.com',NULL,NULL,NULL,NULL,1387443523,1387443523,1,NULL,NULL,NULL,NULL),(4,'\0\0','eko','1e3e69423a216f997f166a16d9626a036b9818c3',NULL,'eko@eko.com',NULL,NULL,NULL,NULL,1387443807,1387443993,1,NULL,NULL,NULL,NULL),(5,'\0\0','makbongki','95968b56af1ccee49b9b0fca158299e39c622476',NULL,'makbongki@makbongki.com',NULL,NULL,NULL,NULL,1387444021,1387444021,1,'mak','bongki',NULL,NULL),(6,'\0\0','jami','d63c61bf4762e0128844b0618a2061f0044c918e',NULL,'zamroni@padi.net.id',NULL,NULL,NULL,NULL,1387506121,1387506121,1,NULL,NULL,NULL,NULL),(7,'\0\0','naning','80b06b541220cb7c134b1577eb3a09f279b496f4',NULL,'naning@padi.net.id',NULL,NULL,NULL,NULL,1387506160,1387506160,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ionauths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ionauths_ionauthgroups`
--

DROP TABLE IF EXISTS `ionauths_ionauthgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ionauths_ionauthgroups` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ionauths_ionauthgroups`
--

LOCK TABLES `ionauths_ionauthgroups` WRITE;
/*!40000 ALTER TABLE `ionauths_ionauthgroups` DISABLE KEYS */;
INSERT INTO `ionauths_ionauthgroups` VALUES (1,1,1),(2,1,2),(3,2,1),(4,3,1),(5,4,1),(6,5,1),(0,6,2),(0,7,2);
/*!40000 ALTER TABLE `ionauths_ionauthgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_images`
--

DROP TABLE IF EXISTS `maintenance_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_request_id` int(11) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_images`
--

LOCK TABLES `maintenance_images` WRITE;
/*!40000 ALTER TABLE `maintenance_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_operators`
--

DROP TABLE IF EXISTS `maintenance_operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance_operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_request_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_operators`
--

LOCK TABLES `maintenance_operators` WRITE;
/*!40000 ALTER TABLE `maintenance_operators` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_pics`
--

DROP TABLE IF EXISTS `maintenance_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_pics`
--

LOCK TABLES `maintenance_pics` WRITE;
/*!40000 ALTER TABLE `maintenance_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_requests`
--

DROP TABLE IF EXISTS `maintenance_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `maintenance_type` varchar(100) DEFAULT NULL,
  `nameofmtype` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `period` varchar(1) DEFAULT NULL COMMENT '1:one time,2:yearly,3:monthly,4:bimonthly,5:quarter,6:semester,7:daily,8:weekly',
  `description` text,
  `pic_name` varchar(30) DEFAULT NULL,
  `pic_position` varchar(50) DEFAULT NULL,
  `pic_phone_area` varchar(6) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(50) DEFAULT NULL,
  `downtime_exist` varchar(1) DEFAULT '0',
  `downtime_duration_hour` varchar(2) DEFAULT NULL,
  `downtime_duration_minute` varchar(2) DEFAULT NULL,
  `required_time1` datetime DEFAULT NULL,
  `required_time2` datetime DEFAULT NULL,
  `notes` text,
  `is_payable` varchar(1) DEFAULT NULL,
  `follow_up` varchar(1) DEFAULT NULL,
  `rescheduledate` datetime DEFAULT NULL,
  `permit` varchar(1) DEFAULT '1',
  `confirm_by_mail` varchar(1) DEFAULT NULL,
  `maintenance_date` datetime DEFAULT NULL,
  `fix_maintenance_date` datetime DEFAULT NULL,
  `user_close` varchar(50) DEFAULT NULL,
  `real_downtime_hour` varchar(2) DEFAULT NULL,
  `real_downtime_minute` varchar(2) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `status` varchar(1) DEFAULT '0',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_requests`
--

LOCK TABLES `maintenance_requests` WRITE;
/*!40000 ALTER TABLE `maintenance_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_requests_users`
--

DROP TABLE IF EXISTS `maintenance_requests_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance_requests_users` (
  `maintenance_request_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_requests_users`
--

LOCK TABLES `maintenance_requests_users` WRITE;
/*!40000 ALTER TABLE `maintenance_requests_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_requests_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenancelogs`
--

DROP TABLE IF EXISTS `maintenancelogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenancelogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_id` int(11) DEFAULT NULL,
  `datelog` varchar(10) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenancelogs`
--

LOCK TABLES `maintenancelogs` WRITE;
/*!40000 ALTER TABLE `maintenancelogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenancelogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenanceoperators`
--

DROP TABLE IF EXISTS `maintenanceoperators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenanceoperators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_request_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenanceoperators`
--

LOCK TABLES `maintenanceoperators` WRITE;
/*!40000 ALTER TABLE `maintenanceoperators` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenanceoperators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenances`
--

DROP TABLE IF EXISTS `maintenances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `maintenance_type` varchar(100) DEFAULT NULL,
  `nameofmtype` int(11) DEFAULT NULL,
  `period_type` varchar(1) DEFAULT '1' COMMENT '1:one time,2:yearly,3:monthly,4:bimonthly,5:quarter,6:semester,7:daily,8:weekly',
  `perioddetail` varchar(1) DEFAULT '1',
  `mdatetime` datetime DEFAULT NULL,
  `reminder` varchar(1) DEFAULT '0' COMMENT '0:H-3 , 1:H-1, 3:J-1',
  `ispayable` varchar(1) DEFAULT NULL,
  `scheduletime` datetime DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenances`
--

LOCK TABLES `maintenances` WRITE;
/*!40000 ALTER TABLE `maintenances` DISABLE KEYS */;
INSERT INTO `maintenances` VALUES (1,0,NULL,'pelanggan',1,'1','1','2014-11-14 00:00:00','4','1',NULL,'test','jami','2014-11-10 08:16:55'),(2,NULL,NULL,'datacenter',1,'2','1','2014-11-14 00:00:00','4','1',NULL,'test','jami','2014-11-10 09:21:12'),(3,NULL,7,'backbone',2,'3','1','2014-11-12 00:00:00','2','1',NULL,'','jami','2014-11-10 09:23:18'),(4,NULL,7,'bts',17,'4','1','2014-11-13 00:00:00','3','1',NULL,'','jami','2014-11-10 09:25:31'),(5,5,8,'pelanggan',6,'2','1','2014-11-13 00:00:00','1','1',NULL,'test','amir','2014-11-12 06:23:21');
/*!40000 ALTER TABLE `maintenances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materialtype_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `satuan` varchar(40) DEFAULT NULL,
  `description` text,
  `active` varchar(1) DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,6,'pipa','meter','Pipa panjang','1','0000-00-00 00:00:00',NULL),(3,23,'kawel','bh','Kawel','1','2013-05-02 08:08:20','puji'),(4,NULL,'besi',NULL,'Besi','1','2013-05-02 08:08:35','puji'),(5,NULL,'klem','bh','Klem','1','2013-05-02 08:08:47','puji'),(6,NULL,'isolasi',NULL,'Isolasi','1','2013-05-02 08:09:03','puji'),(7,NULL,'selang',NULL,'Selang','1','2013-05-02 08:09:13','puji'),(8,NULL,'grounding','gr','Grounding','1','2013-05-02 08:09:27','puji'),(9,NULL,'seling',NULL,'Seling','1','2013-05-02 08:09:49','puji'),(10,2,'NYMHY','buah','test','1','2014-01-08 02:11:32','jami'),(11,1,'UTP Cat5e','meter','Kabel Jaringan','1','2014-01-08 02:12:49','jami'),(12,2,'NYM',NULL,NULL,'1','2014-02-19 02:58:12',NULL),(13,1,'UTP Cat6',NULL,NULL,'1','2014-02-19 02:58:12',NULL),(14,1,'STP Cat5e',NULL,NULL,'1','2014-02-19 02:58:12',NULL),(15,1,'STP Cat6',NULL,NULL,'1','2014-02-19 02:58:12',NULL),(16,3,'NYA ',NULL,NULL,'1','2014-03-04 01:29:41','puji'),(17,3,'NYAF',NULL,NULL,'1','2014-03-04 01:29:41','puji'),(18,3,'BC',NULL,NULL,'1','2014-03-04 01:29:41','puji'),(19,6,'1.25 inch',NULL,NULL,'1','2014-03-04 01:33:54','puji'),(20,6,'1.5 inch',NULL,NULL,'1','2014-03-04 01:33:54','puji'),(21,6,'2 inch',NULL,NULL,'1','2014-03-04 01:33:54','puji'),(22,7,'4 x 4 mm',NULL,NULL,'1','2014-03-04 01:43:43','puji'),(23,9,'2',NULL,NULL,'1','2014-03-04 01:45:34','puji'),(24,9,'2.5',NULL,NULL,'1','2014-03-04 01:45:34','puji'),(25,9,'3',NULL,NULL,'1','2014-03-04 01:45:34','puji'),(26,10,'3 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(27,11,'5 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(28,12,'M8 ',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(29,12,'M10',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(30,13,'20 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(31,14,'20 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(32,15,'20 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(33,16,'TC',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(34,17,'20 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(35,18,'2.5 m',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(36,19,'3/4\"   ',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(37,19,'1\"',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(38,20,'10 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(39,22,'3M',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(40,23,'20 cm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(41,24,'5 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(42,25,'8 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(43,26,'6 mm',NULL,NULL,'1','2014-03-04 02:26:37','puji'),(44,6,'1,5 dim','dim','','1','2014-04-03 08:38:28','jami'),(45,6,'2 dim','dim','','1','2014-04-03 08:38:44','jami'),(46,6,'1,25 dim','dim','','1','2014-04-03 08:38:53','jami'),(47,31,'Penangkal Petir','m','Penangkal Petir','1','2014-04-21 03:09:33','jami'),(48,30,'Tower Triangle','m','Tower Triangle','1','2014-04-21 03:10:04','jami'),(49,29,'Cat','kaleng','','1','2014-12-18 04:38:27','puji'),(50,21,'Isolasi Listrik','Roll','','1','2014-12-18 04:38:45','puji'),(51,8,'Pangkon Antenna','buah','','1','2014-12-18 04:39:05','puji'),(52,9,'Klem Knalpo','buah','','1','2014-12-18 04:39:22','puji'),(53,4,'1 Lubang','bj','','1','2014-12-18 07:10:00','puji'),(54,4,'2 Lubang','bj','','1','2014-12-18 07:10:10','puji'),(55,4,'3 Lubang','bj','','1','2014-12-18 07:10:26','puji'),(56,4,'4 Lubang','bj','','1','2014-12-18 07:10:31','puji'),(57,4,'5 Lubang','bj','','1','2014-12-18 07:10:36','puji'),(58,4,'6 Lubang','bj','','1','2014-12-18 07:10:40','puji'),(59,27,'Aquaproof','bj','Aqua Proof','1','2014-12-18 07:13:25','puji');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materialtypes`
--

DROP TABLE IF EXISTS `materialtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materialtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materialtypes`
--

LOCK TABLES `materialtypes` WRITE;
/*!40000 ALTER TABLE `materialtypes` DISABLE KEYS */;
INSERT INTO `materialtypes` VALUES (1,'Kabel Jaringan','1','Kabel Jaringan','jami','2013-12-18 06:18:00'),(2,'Kabel Listrik','1','Kabel Listrik','jami','2013-12-18 06:18:36'),(3,'Kabel Grounding','1','Kabel Grounding','','2014-03-03 09:59:58'),(4,'Stop kontak','1','Stop kontak','','2014-03-03 09:59:58'),(5,'Steker','1','Steker','','2014-03-03 09:59:58'),(6,'Pipa Galvanized','1','Pipa Galvanized','','2014-03-03 09:59:58'),(7,'Besi siku','1',NULL,'puji','2014-03-03 09:59:58'),(8,'Pangkon antena','1','Pangkon antena','','2014-03-03 09:59:58'),(9,'Klem knalpot','1','Klem knalpot','','2014-03-03 09:59:58'),(10,'Seling','1',NULL,'puji','2014-03-03 09:59:58'),(11,'Klem seling','1','Klem seling','','2014-03-03 09:59:58'),(12,'Spanscrew','1',NULL,'puji','2014-03-03 09:59:58'),(13,'Pipa conduit','1',NULL,'puji','2014-03-03 09:59:58'),(14,'Klem ','1',NULL,'puji','2014-03-03 09:59:58'),(15,'Sok ','1',NULL,'puji','2014-03-03 09:59:58'),(16,'Cable duct','1',NULL,'puji','2014-03-03 09:59:58'),(17,'Selang flexible','1',NULL,'puji','2014-03-03 09:59:58'),(18,'Ground rod','1',NULL,'puji','2014-03-03 09:59:58'),(19,'Splitzen','1','Splitzen','','2014-03-03 09:59:58'),(20,'Dinabolt','1',NULL,'puji','2014-03-03 09:59:58'),(21,'Isolasi listrik','1',NULL,'puji','2014-03-03 09:59:58'),(22,'Isolasi rubber','1',NULL,'puji','2014-03-03 09:59:58'),(23,'Kabel ties','1',NULL,'puji','2014-03-03 09:59:58'),(24,'Klem kabel ','1',NULL,'puji','2014-03-03 09:59:58'),(25,'Baut SDS','1',NULL,'puji','2014-03-03 09:59:58'),(26,'Fisher + sekrup','1',NULL,'puji','2014-03-03 09:59:58'),(27,'Aquaproof','1',NULL,'puji','2014-03-03 09:59:58'),(28,'Serat fiber','1',NULL,'puji','2014-03-03 09:59:58'),(29,'Cat','1',NULL,'puji','2014-03-03 09:59:58'),(30,'Tower','1','Tower','jami','2014-04-21 02:56:52'),(31,'Penangkal Petir','1','Penangkal Petir','jami','2014-04-21 02:57:17');
/*!40000 ALTER TABLE `materialtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medias`
--

DROP TABLE IF EXISTS `medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medias`
--

LOCK TABLES `medias` WRITE;
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
INSERT INTO `medias` VALUES (1,'3G / CDMA Modems','2012-08-29 09:16:41','1'),(2,'ADSL','2012-08-29 09:16:41','1'),(3,'Wireless','2012-08-29 09:16:41','1'),(4,'FO','2012-08-29 09:16:41','1'),(5,'VSAT','2012-08-29 09:16:41','1'),(6,'Copper','2012-08-29 09:16:41','1');
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `targetuser` varchar(50) DEFAULT NULL,
  `description` text,
  `status` varchar(1) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) DEFAULT NULL,
  `state` varchar(1) DEFAULT '0' COMMENT 'status of this modul',
  `chapter_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'2013-03-26 03:22:29','clients','0',NULL),(2,'2013-03-26 03:22:41','survey_request','0',NULL),(3,'2013-03-26 03:22:49','surveys','0',NULL);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules_users`
--

DROP TABLE IF EXISTS `modules_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules_users` (
  `module_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `c` varchar(1) DEFAULT '0',
  `r` varchar(1) DEFAULT '0',
  `u` varchar(1) DEFAULT '0',
  `d` varchar(1) DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules_users`
--

LOCK TABLES `modules_users` WRITE;
/*!40000 ALTER TABLE `modules_users` DISABLE KEYS */;
INSERT INTO `modules_users` VALUES (1,2,'1','1','1','0','2012-11-19 18:08:10','puji'),(2,2,'1','1','1','0','2012-11-19 18:08:10','puji'),(1,15,'1','1','1','0','2012-11-19 18:10:16','puji'),(2,15,'1','1','0','1','2012-11-19 18:10:16','puji'),(1,14,'1','0','0','0','2012-11-19 18:15:53','puji'),(2,14,'1','0','0','0','2012-11-19 18:15:53','puji'),(1,13,'0','1','0','0','2012-11-19 18:18:42','puji'),(2,13,'0','1','0','0','2012-11-19 18:18:42','puji'),(1,16,'0','0','0','0','2012-11-19 20:23:49','dasril'),(2,16,'1','1','1','1','2012-11-19 20:23:49','dasril'),(1,17,'0','0','0','0','2012-11-19 20:24:08','dasril'),(2,17,'1','1','1','1','2012-11-19 20:24:08','dasril'),(1,1,'0','0','0','0','2012-11-19 20:25:14','puji'),(2,1,'1','0','1','0','2012-11-19 20:25:14','puji'),(1,18,'1','1','1','1','2012-11-19 23:16:18','puji'),(2,18,'1','1','1','1','2012-11-19 23:16:18','puji'),(1,12,'0','0','0','0','2012-11-23 00:16:00','dasril'),(2,12,'1','1','1','1','2012-11-23 00:16:00','dasril'),(3,12,'0','0','0','0','2012-11-23 00:16:00','dasril'),(3,16,'0','0','0','0','2012-11-23 00:22:53','dasril'),(3,17,'0','0','0','0','2012-11-23 00:23:23','dasril'),(1,19,'0','0','0','0','2012-12-04 02:30:27','puji'),(2,19,'0','0','0','0','2012-12-04 02:30:27','puji'),(3,19,'1','1','1','1','2012-12-04 02:30:27','puji'),(1,6,'0','0','0','0','2013-03-26 04:01:08','puji'),(2,6,'1','1','1','1','2013-03-26 04:01:33','puji'),(3,6,'0','0','0','0','2013-03-26 04:01:57','puji'),(2,22,'1','1','1','1','2013-04-01 04:35:05','puji'),(3,22,'1','1','1','1','2013-04-01 04:36:34','puji');
/*!40000 ALTER TABLE `modules_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observers_observeds`
--

DROP TABLE IF EXISTS `observers_observeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `observers_observeds` (
  `observed_id` int(11) DEFAULT NULL,
  `observer_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observers_observeds`
--

LOCK TABLES `observers_observeds` WRITE;
/*!40000 ALTER TABLE `observers_observeds` DISABLE KEYS */;
INSERT INTO `observers_observeds` VALUES (15,2),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(15,17),(16,17),(19,17);
/*!40000 ALTER TABLE `observers_observeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
INSERT INTO `operators` VALUES (1,'Telkom Speedy','2012-08-29 09:16:41'),(2,'Dnet','2012-08-29 09:16:41'),(3,'Data Utama','2012-08-29 09:16:41'),(4,'Crossnet','2012-08-29 09:16:41'),(5,'Radnet','2012-08-29 09:16:41'),(6,'Indonet','2012-08-29 09:16:41'),(7,'Uninet','2012-08-29 09:16:41'),(8,'Hypernet','2012-08-29 09:16:41'),(9,'Mitranet','2012-08-29 09:16:41'),(10,'SCBDNet','2012-08-29 09:16:41'),(11,'Laxo','2012-08-29 09:16:41'),(12,'Indosat','2012-08-29 09:16:41'),(13,'XL','2012-08-29 09:16:41'),(14,'3','2012-08-29 09:16:41'),(15,'Axis','2012-08-29 09:16:41'),(16,'Esia','2012-08-29 09:16:41'),(17,'Smartfren','2012-08-29 09:16:41'),(18,'Universal','2012-08-29 09:16:41'),(19,'Biznet','2012-08-29 09:16:41'),(20,'Alusio','2012-08-29 09:16:41'),(21,'Primanet','2012-08-29 09:16:41'),(22,'Nusanet','2012-08-29 09:16:41'),(23,'Telkomsel','2012-08-29 09:16:41'),(24,'Centrin','2012-08-29 09:16:41'),(25,'Fastnet','2012-08-29 09:16:41'),(26,'Velonet','2012-08-29 09:16:41'),(27,'Maxindo','2012-08-29 09:16:41'),(28,'Icon+','2012-08-29 09:16:41'),(29,'Jasatel','2012-08-29 09:16:41');
/*!40000 ALTER TABLE `operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'ADSL','2012-08-29 09:16:41'),(2,'Community','2012-08-29 09:16:41'),(3,'Biz','2012-08-29 09:16:41'),(4,'Enterprize','2012-08-29 09:16:41'),(5,'IIX','2012-08-29 09:16:41'),(6,'Local Loop','2012-08-29 09:16:41'),(7,'Mix','2012-08-29 09:16:41'),(8,'Hosting','2012-08-29 09:16:41'),(9,'Domain','2012-08-29 09:16:41'),(10,'Website','2012-08-29 09:16:41'),(11,'VSAT','2012-08-29 09:16:41');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padilogin`
--

DROP TABLE IF EXISTS `padilogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padilogin` (
  `id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padilogin`
--

LOCK TABLES `padilogin` WRITE;
/*!40000 ALTER TABLE `padilogin` DISABLE KEYS */;
/*!40000 ALTER TABLE `padilogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paqs`
--

DROP TABLE IF EXISTS `paqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paqs`
--

LOCK TABLES `paqs` WRITE;
/*!40000 ALTER TABLE `paqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `paqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pics`
--

DROP TABLE IF EXISTS `pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(100) DEFAULT NULL,
  `phone_area` varchar(4) DEFAULT NULL,
  `telp_hp` varchar(50) DEFAULT NULL,
  `position` varchar(15) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `hp2` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pics`
--

LOCK TABLES `pics` WRITE;
/*!40000 ALTER TABLE `pics` DISABLE KEYS */;
INSERT INTO `pics` VALUES (1,1,'2015-04-13 02:06:46','Yaser',NULL,NULL,'IT Dept','08563455593',NULL,'yaser.arafat@lincgrp.com',NULL,NULL),(2,2,'2015-04-13 03:20:55','Wahyudi ',NULL,NULL,'IT Dept','',NULL,'edp_spv_2@grs.indomaret.co.id',NULL,NULL),(3,3,'2015-04-13 04:24:28','M. Taufik Bastomo ',NULL,NULL,'IT Dept','0817500298',NULL,'it_pbtlsby@yahoo.com',NULL,NULL),(4,4,'2015-04-15 04:10:12','Rosianang',NULL,NULL,'IT Dept','085853348815',NULL,'rosianang.brilian@yahoo.com',NULL,NULL),(5,5,'2015-04-15 08:58:24','Jonny',NULL,NULL,'IT Dept','08123296096',NULL,'jonny@tjakrindomas.co.id',NULL,NULL),(6,7,'2015-04-15 10:06:34','edwin',NULL,NULL,'lainnya','081252728043',NULL,'',NULL,NULL),(7,8,'2015-04-15 10:26:48','edwin',NULL,NULL,'lainnya','081252728043',NULL,'',NULL,NULL),(8,9,'2015-04-15 10:36:03','edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(9,10,'2015-04-15 10:42:47','edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(10,11,'2015-04-15 10:49:08','edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(11,12,'2015-04-15 10:53:41','Edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(12,13,'2015-04-15 10:58:55','Edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(13,14,'2015-04-15 11:05:11','Edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(14,15,'2015-04-15 11:13:12','Edwin',NULL,NULL,'Pemilik','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(15,16,'2015-04-15 11:18:03','edwin',NULL,NULL,'lainnya','081252728043',NULL,'rachmad.y.winarno@gmail.com',NULL,NULL),(17,17,'2015-04-21 07:41:48','Bpk. Doni',NULL,NULL,'Pemilik','085850875150',NULL,'dzikra_er@yahoo.co.id',NULL,NULL),(18,18,'2015-04-21 07:50:05','Doni',NULL,NULL,'Pemilik','085850875150',NULL,'dzikra_er@yahoo.co.id',NULL,NULL),(19,19,'2015-04-22 10:03:36','Ida',NULL,NULL,'Pemilik','081510012172',NULL,'ida@universaltrading-int.com',NULL,NULL),(20,20,'2015-04-24 03:53:49','Ibu San San',NULL,NULL,'Pemilik','081331090331',NULL,'virijani@gmail.com',NULL,NULL),(21,21,'2015-04-27 03:19:26','david',NULL,NULL,'Pemilik','081217162788',NULL,'frandavid14@gmail.com',NULL,NULL),(22,22,'2015-04-28 05:02:25','Roy Suprapto',NULL,NULL,'Direktur','',NULL,'roy@hartonoelektronika.com',NULL,NULL),(23,22,'2015-04-28 05:03:09','Gunawan',NULL,NULL,'IT Dept','08385556020',NULL,'gunawan@hartonoelektronika.com',NULL,NULL),(24,22,'2015-04-28 05:03:58','Basuki',NULL,NULL,'IT Dept','081554226232',NULL,'basuki@hartonoelektronika.com',NULL,NULL),(25,21,'2015-04-29 03:33:25','petrus',NULL,NULL,'Manajer','8904853',NULL,'p@yahoo.com',NULL,NULL);
/*!40000 ALTER TABLE `pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'2012-08-29 09:16:41','Pemilik',NULL),(2,'2012-08-29 09:16:41','Direktur',NULL),(3,'2012-08-29 09:16:41','Manajer',NULL),(4,'2012-08-29 09:16:41','Purchasing',NULL),(5,'2012-08-29 09:16:41','IT Dept',NULL),(6,'2012-08-29 09:16:41','Sekretaris',NULL),(7,'2015-03-26 08:14:04','referral',''),(8,'2015-03-26 08:14:10','lainnya','');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preclients`
--

DROP TABLE IF EXISTS `preclients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preclients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `random_identifier` varchar(32) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(200) DEFAULT NULL,
  `business_field` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `phone_area` varchar(5) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax_area` varchar(5) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `has_internet_connection` varchar(1) DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `speed` varchar(20) DEFAULT NULL,
  `ratio` varchar(50) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `usage_period` varchar(10) DEFAULT NULL,
  `user_amount` varchar(10) DEFAULT NULL,
  `fee` varchar(20) DEFAULT NULL,
  `operator` varchar(20) DEFAULT NULL,
  `end_of_contract` date DEFAULT NULL,
  `problems` varchar(20) DEFAULT NULL,
  `internet_demand` varchar(1) DEFAULT NULL,
  `known_us` varchar(1) DEFAULT NULL,
  `known_from` varchar(20) DEFAULT NULL,
  `interested` varchar(1) DEFAULT NULL,
  `reason2not_interested` text,
  `service_interested_to` varchar(20) DEFAULT NULL,
  `budget` varchar(20) DEFAULT NULL,
  `implementation_target` date DEFAULT NULL,
  `follow_up` datetime DEFAULT NULL,
  `followed_up` varchar(1) DEFAULT NULL,
  `prospect` varchar(1) DEFAULT NULL,
  `sales_id` smallint(6) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preclients`
--

LOCK TABLES `preclients` WRITE;
/*!40000 ALTER TABLE `preclients` DISABLE KEYS */;
/*!40000 ALTER TABLE `preclients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `language` varchar(10) DEFAULT 'indonesia',
  `row_per_page` varchar(2) DEFAULT '10',
  `phone_area` varchar(7) DEFAULT '031',
  `application_name` varchar(60) DEFAULT 'Telemarketing',
  `default_page` varchar(60) DEFAULT 'calendars/index/month/1/year/2012',
  `theme_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
INSERT INTO `preferences` VALUES (1,1,'2012-08-29 09:16:54','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(2,2,'2012-08-29 09:17:29','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(3,3,'2012-08-29 09:17:47','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(4,4,'2012-08-29 09:18:05','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(5,5,'2012-08-29 09:18:25','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(6,6,'2012-08-29 09:18:42','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(7,7,'2012-08-29 09:19:02','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(8,8,'2012-08-29 09:19:25','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(9,9,'2012-11-10 02:54:56','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(10,10,'2012-11-10 02:55:25','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(11,11,'2012-11-10 02:56:13','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(12,12,'2012-11-10 02:56:46','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(13,13,'2012-11-10 02:57:12','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(14,14,'2012-11-10 02:57:37','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(15,15,'2012-11-10 07:29:18','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(16,16,'2012-11-10 07:29:40','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(17,17,'2012-11-10 07:30:49','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(18,18,'2012-11-20 09:29:17','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(19,19,'2012-11-26 07:22:42','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(20,20,'2012-12-18 03:00:18','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(21,21,'2013-01-22 01:27:18','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1),(22,22,'2013-03-25 07:26:55','indonesia','10','031','Telemarketing','calendars/index/month/1/year/2012',1);
/*!40000 ALTER TABLE `preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prepics`
--

DROP TABLE IF EXISTS `prepics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prepics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preclient_id` int(11) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(15) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prepics`
--

LOCK TABLES `prepics` WRITE;
/*!40000 ALTER TABLE `prepics` DISABLE KEYS */;
/*!40000 ALTER TABLE `prepics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (1,'kualitas link','2012-11-28 07:37:14','puji'),(2,'harga','2012-11-28 07:37:21','puji'),(3,'support teknis','2012-11-28 07:37:29','puji');
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminderlogs`
--

DROP TABLE IF EXISTS `reminderlogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminderlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder_id` int(11) DEFAULT NULL,
  `datelog` varchar(20) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminderlogs`
--

LOCK TABLES `reminderlogs` WRITE;
/*!40000 ALTER TABLE `reminderlogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminderlogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(1) DEFAULT '1' COMMENT '1:hourly 2:daily 3:weekly 4:monthly 5:yearly',
  `perioddetail` varchar(10) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text,
  `expiredate` datetime DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

LOCK TABLES `reminders` WRITE;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
INSERT INTO `reminders` VALUES (1,'0','2015-4-9','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Java Paragon. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/1',NULL,'1','2015-04-09 08:44:35'),(2,'0','2015-4-9','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Bali Paragon. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/2',NULL,'1','2015-04-09 08:51:43'),(3,'0','2015-4-9','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey portex international. PT. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/3',NULL,'1','2015-04-09 08:52:38'),(4,'0','2015-4-9','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Suryo,Bpk. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/4',NULL,'1','2015-04-09 08:58:54'),(5,'0','2015-4-10','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Interactive, Pt. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/5',NULL,'1','2015-04-10 08:32:36'),(6,'0','2015-4-10 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-10 08:41:52'),(7,'0','2015-4-10 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-10 08:41:55'),(8,'0','2015-4-10','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Cipta Mapan Logistik, PT. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/6',NULL,'1','2015-04-10 08:49:04'),(9,'0','2015-4-10','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey PT. Putra Bintang Timur Lestari . Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/7',NULL,'1','2015-04-10 09:18:11'),(10,'0','2015-4-10','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey PT. Putra Bintang Timur Lestari . Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/8',NULL,'1','2015-04-10 09:25:25'),(11,'0','2015-4-10','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Satya . Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/9',NULL,'1','2015-04-10 09:49:05'),(12,'0','2015-4-13','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Cipta Mapan Logistik, PT. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/1',NULL,'1','2015-04-13 02:11:22'),(13,'0','2015-4-13','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey PT. Indomarco Prismatama . Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/2',NULL,'1','2015-04-13 03:21:38'),(14,'0','2015-4-13 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-13 03:26:56'),(15,'0','2015-4-13 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-13 03:27:10'),(16,'0','2015-4-13 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-13 03:28:16'),(17,'0','2015-4-13 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-13 03:28:19'),(18,'0','2015-4-13 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-13 03:28:19'),(19,'0','2015-4-13','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey PT. Indomarco Prismatama . Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/3',NULL,'1','2015-04-13 03:29:33'),(20,'0','2015-4-13','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Putra Bintang Timur Lestari, T. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/4',NULL,'1','2015-04-13 04:27:56'),(21,'0','2015-4-13','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Putra Bintang Timur Lestari, T. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/5',NULL,'1','2015-04-13 04:43:25'),(22,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey PT. Sarana Bhakti Timur (Depo JAPFA). Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/6',NULL,'1','2015-04-15 04:12:46'),(23,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:15:53'),(24,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:15:54'),(25,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:15:58'),(26,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:15:59'),(27,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:15:59'),(28,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:16:00'),(29,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:16:05'),(30,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:16:05'),(31,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:16:06'),(32,'0','2015-4-15 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-15 04:16:06'),(33,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Tjakrindo Mas, PT Divisi Beton. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/7',NULL,'1','2015-04-15 09:02:18'),(34,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey PT. Bumi Arden. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/8',NULL,'1','2015-04-15 09:47:28'),(35,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMAN ! BANGIL. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/9',NULL,'1','2015-04-15 10:10:16'),(36,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMAN 1 Pandaan. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/10',NULL,'1','2015-04-15 10:30:29'),(37,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMK 1 Gempol. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/11',NULL,'1','2015-04-15 10:37:21'),(38,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMK 1 Gempol. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/12',NULL,'1','2015-04-15 10:37:27'),(39,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMAN 1 GRATI. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/13',NULL,'1','2015-04-15 10:44:39'),(40,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMK 1 Nguling. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/14',NULL,'1','2015-04-15 10:50:47'),(41,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMAN 1 Gondang wetan. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/15',NULL,'1','2015-04-15 10:55:12'),(42,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMAN 1 Kejayan. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/16',NULL,'1','2015-04-15 11:00:39'),(43,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMAN 1 Purwosari. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/17',NULL,'1','2015-04-15 11:06:39'),(44,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMK 1 Prigen. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/18',NULL,'1','2015-04-15 11:14:40'),(45,'0','2015-4-15','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey SMKN 1 Rembang. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/19',NULL,'1','2015-04-15 11:19:39'),(46,'0','2015-4-17 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-17 00:51:50'),(47,'0','2015-4-17 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-17 00:51:52'),(48,'0','2015-4-17 ','puji@padi.net.id',NULL,NULL,NULL,'1','2015-04-17 00:53:03'),(49,'0','2015-4-21','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Doni Lukiyanto. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/20',NULL,'1','2015-04-21 08:54:26'),(50,'0','2015-4-22','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Universal Trading, CV. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/21',NULL,'1','2015-04-22 10:07:09'),(51,'0','2015-4-24','puji@padi.net.id','Pengajuan Survey','Berikut adalah pengajuan Survey Ibu San San. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://database.padinet.com/surveys/edit/22',NULL,'1','2015-04-24 03:55:38'),(52,'0','2015-4-29','puji@padi.net.id','Pengajuan Survey','DH, <br /><br />Berikut adalah pengajuan Survey David. Untuk lebih lengkapnya, silakan menelusuri tautan berikut : https://teknis/surveys/edit/23<br /><br /><br />Best Regards<br /><br />PadiApp',NULL,'1','2015-04-29 03:33:32');
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `abbreviation` varchar(4) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Enterprise','ENTP','puji','2013-03-28 08:26:33','1'),(2,'Business','BUSI','puji','2013-03-28 08:26:33','1'),(3,'Web + Applications','WEBS','puji','2013-03-28 08:26:33','1'),(4,'Colocation','COLO','puji','2013-03-28 08:26:33','1'),(5,'Game / IIX','GAME','puji','2013-03-28 08:26:33','1'),(6,'Local Loop','LOCL','puji','2013-03-28 08:26:33','1'),(7,'Smart Value','COMM','puji','2014-10-16 07:30:26','1'),(8,'Hosting & Domain','HOST','puji','2013-03-28 08:26:33','1'),(9,'Mix','MIXS','puji','2013-03-28 08:26:33','1'),(10,'Others (Wifi, ADSL, dll)','OTHE','puji','2013-03-28 08:26:33','1'),(11,'Proyek','PRYK','puji','2013-03-28 08:26:33','1'),(12,'Perangkat','PRKT','puji','2013-03-28 08:26:33','1'),(13,'Setup & Instalasi','INST','puji','2013-03-28 08:26:33','1');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_antennas`
--

DROP TABLE IF EXISTS `site_antennas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_antennas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `location` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_antennas`
--

LOCK TABLES `site_antennas` WRITE;
/*!40000 ALTER TABLE `site_antennas` DISABLE KEYS */;
INSERT INTO `site_antennas` VALUES (1,9,' Grid 27 dBi 5.8 GHz',NULL,'Tower 20 meter',NULL,'2015-04-17 12:09:20');
/*!40000 ALTER TABLE `site_antennas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_ap_wifis`
--

DROP TABLE IF EXISTS `site_ap_wifis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_ap_wifis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(32) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `essid` varchar(32) DEFAULT NULL,
  `security_key` varchar(100) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_ap_wifis`
--

LOCK TABLES `site_ap_wifis` WRITE;
/*!40000 ALTER TABLE `site_ap_wifis` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_ap_wifis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_apwifis`
--

DROP TABLE IF EXISTS `site_apwifis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_apwifis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(32) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `essid` varchar(32) DEFAULT NULL,
  `security_key` varchar(100) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_apwifis`
--

LOCK TABLES `site_apwifis` WRITE;
/*!40000 ALTER TABLE `site_apwifis` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_apwifis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_devices`
--

DROP TABLE IF EXISTS `site_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `devicetype` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `location` text,
  `barcode` varchar(50) DEFAULT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_devices`
--

LOCK TABLES `site_devices` WRITE;
/*!40000 ALTER TABLE `site_devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_pccards`
--

DROP TABLE IF EXISTS `site_pccards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_pccards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `macaddress` varchar(50) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `serialno` varchar(100) DEFAULT NULL,
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_pccards`
--

LOCK TABLES `site_pccards` WRITE;
/*!40000 ALTER TABLE `site_pccards` DISABLE KEYS */;
INSERT INTO `site_pccards` VALUES (1,NULL,585,'XR5','00:08:34:sr:00',NULL,NULL,NULL,NULL,'2015-04-09 10:12:20'),(2,NULL,9,'XR5','',NULL,NULL,NULL,NULL,'2015-04-17 01:22:34'),(3,NULL,9,'XR5','00:15:6D:6C:67:02',NULL,NULL,NULL,NULL,'2015-04-17 12:08:00'),(4,NULL,17,'XR5','',NULL,NULL,NULL,NULL,'2015-04-27 00:24:51');
/*!40000 ALTER TABLE `site_pccards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_pics`
--

DROP TABLE IF EXISTS `site_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `createuser` varchar(20) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_pics`
--

LOCK TABLES `site_pics` WRITE;
/*!40000 ALTER TABLE `site_pics` DISABLE KEYS */;
INSERT INTO `site_pics` VALUES (1,16,NULL,'edwin','lainnya','081252728043','rahmad.y.winarno@gmail.com',NULL,'2015-04-21 01:22:48'),(2,21,23,'david','Pemilik','081232534066   ','frandavid14@gmail.com',NULL,'2015-04-29 03:33:32');
/*!40000 ALTER TABLE `site_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_routers`
--

DROP TABLE IF EXISTS `site_routers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_routers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(200) DEFAULT NULL,
  `ip_public` varchar(15) DEFAULT NULL,
  `ip_private` varchar(15) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `milikpadinet` varchar(1) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_routers`
--

LOCK TABLES `site_routers` WRITE;
/*!40000 ALTER TABLE `site_routers` DISABLE KEYS */;
INSERT INTO `site_routers` VALUES (1,585,'mikrotik','1a:cf:0e:9d:0f','202.6.233.50','192.168.0.1','portex','portex123','Kamar',NULL,NULL,'0','2015-04-09 10:10:31');
/*!40000 ALTER TABLE `site_routers` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `alteraddrouter` AFTER INSERT ON `site_routers`
 FOR EACH ROW begin
select modified from client_sites where id=new.client_site_id into @modified;

if @modified='1' then
insert into alter_routers (client_site_id,tipe,macboard,ip_public,ip_private,user,password,location,milikpadinet) values (new.client_site_id,new.tipe,new.macboard,new.ip_public,new.ip_private,new.user,new.password,new.location,new.milikpadinet);
end if ;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `site_switches`
--

DROP TABLE IF EXISTS `site_switches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_switches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mac` varchar(200) DEFAULT NULL,
  `serialno` varchar(200) DEFAULT NULL,
  `barcode` varchar(200) DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_switches`
--

LOCK TABLES `site_switches` WRITE;
/*!40000 ALTER TABLE `site_switches` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_switches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_wireless_radios`
--

DROP TABLE IF EXISTS `site_wireless_radios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_wireless_radios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(200) DEFAULT NULL,
  `ip_radio` varchar(32) DEFAULT NULL,
  `ip_ap` varchar(32) DEFAULT NULL,
  `ip_ethernet` varchar(50) DEFAULT NULL,
  `essid` varchar(50) DEFAULT NULL,
  `freqwency` varchar(10) DEFAULT NULL,
  `polarization` varchar(30) DEFAULT NULL,
  `signal` varchar(30) DEFAULT NULL,
  `quality` varchar(30) DEFAULT NULL,
  `throughput_udp` varchar(30) DEFAULT NULL,
  `throughput_tcp` varchar(30) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_wireless_radios`
--

LOCK TABLES `site_wireless_radios` WRITE;
/*!40000 ALTER TABLE `site_wireless_radios` DISABLE KEYS */;
INSERT INTO `site_wireless_radios` VALUES (1,585,'Mikrotik RB 411A','03:40:er:rt:pw','10.100.100.123','AP Architect Barat Daya (10.100.','','arc-barat','5850','vertical','','100/100','','','portex','mkmpdp989'),(2,9,'Mikrotik RB 411L','','','Belum ada AP','','','','vertical','','','','','',''),(3,9,'Mikrotik RB 411L','D4:CA:6D:84:C1:51','10.100.105.87','AP Neo Pasuruan (10.100.100.118)','','pd-neo-javanet','5775 MHz','vertical','-70/-70 dBm','80%','1 Mbps','1 Mbps','admin','mkmpds989'),(4,7,'Mikrotik Groove A-52HPn','4C:5E:0C:CC:3F:2A','202.6.238.246','AP Oracle Timur Laut (10.100.100','192.168.5.250','pd-oracle-timurlaut','5180 MHz','vertical','-38/-56 dBm','100/100 %','10 Mbps','5 Mbps','admin','mkmpdt989'),(5,17,'Mikrotik RB 411L','','','Belum ada AP','','','','vertical','','','','','','');
/*!40000 ALTER TABLE `site_wireless_radios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speeds`
--

DROP TABLE IF EXISTS `speeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `speeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speeds`
--

LOCK TABLES `speeds` WRITE;
/*!40000 ALTER TABLE `speeds` DISABLE KEYS */;
INSERT INTO `speeds` VALUES (1,'<512 kbps','2012-08-29 09:16:41'),(2,'>512 kbps - 1 Mb','2012-08-29 09:16:41'),(3,'>1 Mb - 2 Mb','2012-08-29 09:16:41'),(4,'>2 Mb - 5 Mb','2012-08-29 09:16:41'),(5,'>5 Mb','2012-08-29 09:16:41');
/*!40000 ALTER TABLE `speeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisors_users`
--

DROP TABLE IF EXISTS `supervisors_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisors_users` (
  `user_id` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisors_users`
--

LOCK TABLES `supervisors_users` WRITE;
/*!40000 ALTER TABLE `supervisors_users` DISABLE KEYS */;
INSERT INTO `supervisors_users` VALUES (12,9),(13,9),(14,9),(7,9),(52,9),(27,9),(10,9),(8,9),(9,17);
/*!40000 ALTER TABLE `supervisors_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_bts_distances`
--

DROP TABLE IF EXISTS `survey_bts_distances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_bts_distances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `btstower_id` int(11) DEFAULT NULL,
  `distance` varchar(20) DEFAULT NULL,
  `los` varchar(1) DEFAULT '0',
  `ap` varchar(50) DEFAULT NULL,
  `description` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  `obstacle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_bts_distances`
--

LOCK TABLES `survey_bts_distances` WRITE;
/*!40000 ALTER TABLE `survey_bts_distances` DISABLE KEYS */;
INSERT INTO `survey_bts_distances` VALUES (1,1,3,'13,49 Km','1','AP Architect Barat Daya (10.100.100.35)','AP AJBS','2015-04-14 02:14:30','Catur',''),(2,1,2,'13,75 Km','1','Belum ada AP','AP Ardiles 73','2015-04-14 02:15:36','Catur',''),(3,7,4,'2.01 Km','1','AP Oracle Timur Laut (10.100.100.130)','Sudah ada AP yang mencover  ke site Tjakrindo untuk site Office dan pipa','2015-04-16 11:53:34','Suhartono','tidak ada penghalang'),(4,9,7,'16,54 Km','1','Belum ada AP','','2015-04-16 14:49:31','Catur',''),(5,9,8,'21,14 Km','1','Belum ada AP','','2015-04-16 14:50:05','Catur',''),(6,9,5,'33,03 Km','2','Belum ada AP','','2015-04-16 14:51:14','Catur',''),(7,9,2,'33,3 Km','1','AP Neo Pasuruan (10.100.100.118)','','2015-04-16 14:51:05','Catur',''),(8,6,3,'3.93 Km','1','AP Architect Barat Laut2 (10.100.100.17)','sudah Ada AP yang mencover ke arah Pt.Sarana Bakti Timur','2015-04-20 02:48:51','Suhartono','tidak ada penghalang'),(9,19,7,'23.47 Km','2','AP Roland Tenggara (10.100.101.137)','','2015-04-22 12:47:55','Suhartono','pohon dengan ketinggian  (±) 18 meter'),(10,10,7,'23,2 Km','2','Belum ada AP','','2015-04-23 02:20:54','gilang','Pohon di depan'),(11,3,12,'5,25 Km','1','AP Dozer Bunder (10.100.103.133)','','2015-04-23 02:49:59','gilang',''),(12,3,4,'8,97 Km','1','Belum ada AP','','2015-04-23 02:55:02','gilang',''),(13,17,9,'22,7 Km','1','AP Twins Selatan (10.100.103.67)','pemsangan antenna di ketinggian 15 meter','2015-04-24 04:49:34','Suhartono','LOS'),(14,21,3,'3,76 Km','2','AP Architect Timur (10.100.100.12)','','2015-04-24 09:17:32','Catur','sedikit terhalang bangunan di depannya'),(15,21,10,'2,6 Km','0','Belum ada AP','','2015-04-24 09:06:50','Catur','Bangunan di depannya'),(16,13,9,'20.7','2','Belum ada AP','','2015-04-24 12:48:05','bagus','Elevasi tanah 12 meter'),(17,18,9,'14.8','2','Belum ada AP','','2015-04-24 13:55:39','bagus','Elevasi tanah 12 meter + pepohonan'),(18,18,7,'43','0','Belum ada AP','','2015-04-24 13:58:28','bagus','Elevasi tanah 50 meter + pepohonan'),(19,14,9,'20.7','0','Belum ada AP','','2015-04-24 14:55:51','bagus','Elevasi tanah dengan ketinggian 27 meter + pepohonan'),(20,14,7,'49.1','0','Belum ada AP','','2015-04-24 14:56:35','bagus','Elevasi tanah dengan ketinggian 27 meter + pepohonan'),(21,8,2,'8,08 Km','0','Belum ada AP','','2015-04-27 10:39:48','gilang','Pohon 25 m'),(22,8,8,'10,03 Km','0','Belum ada AP','','2015-04-27 10:40:24','gilang','Pohon 25 m dan elevasi tinggi'),(23,16,9,'6.78 km','2','AP Twins Selatan (10.100.103.67)','Kondisi tower di SMAN 1 Kejayan dengan ketinggian 20 meter ,untuk pemasangan cable  grounding penangkal  hanya di ketinggian 12 meter,tidak sampai ke tanah.','2015-04-27 12:08:47','Suhartono','pohon dengan ketinggian  (±) 18 meter'),(24,23,12,'1,3 Km','1','Belum ada AP','test saja puji','2015-05-06 09:10:47','puji','menara');
/*!40000 ALTER TABLE `survey_bts_distances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_client_distances`
--

DROP TABLE IF EXISTS `survey_client_distances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_client_distances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `distance` decimal(6,2) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_client_distances`
--

LOCK TABLES `survey_client_distances` WRITE;
/*!40000 ALTER TABLE `survey_client_distances` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_client_distances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_dates`
--

DROP TABLE IF EXISTS `survey_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_request_id` int(11) DEFAULT NULL,
  `schedule_date` datetime DEFAULT NULL,
  `reason` text,
  `username` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_dates`
--

LOCK TABLES `survey_dates` WRITE;
/*!40000 ALTER TABLE `survey_dates` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_devices`
--

DROP TABLE IF EXISTS `survey_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` smallint(6) DEFAULT NULL,
  `description` text,
  `status` varchar(1) DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_devices`
--

LOCK TABLES `survey_devices` WRITE;
/*!40000 ALTER TABLE `survey_devices` DISABLE KEYS */;
INSERT INTO `survey_devices` VALUES (1,19,21,'Mikrotik RB411',1,'','0','2015-04-23 01:54:21','yanto'),(2,19,36,'XR5',1,'','0','2015-04-23 01:54:36','yanto'),(3,19,76,'24V 1.2A',1,'','0','2015-04-23 01:54:51','yanto'),(4,19,166,'Jumper',1,'','0','2015-04-23 01:55:03','yanto'),(5,19,93,' Grid 27 dBi 5.8 GHz',1,'','0','2015-04-23 01:55:13','yanto'),(7,19,40,'MMCX to NF',1,'','0','2015-04-23 01:56:17','yanto'),(8,19,41,'RB 411',1,'','0','2015-04-23 01:56:58','yanto'),(9,19,44,'Mikrotik',1,'','0','2015-04-23 01:57:08','yanto');
/*!40000 ALTER TABLE `survey_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_gps_datas`
--

DROP TABLE IF EXISTS `survey_gps_datas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_gps_datas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location_e` varchar(32) DEFAULT NULL,
  `location_s` varchar(32) DEFAULT NULL,
  `elevation_ground` decimal(6,2) DEFAULT NULL,
  `elevation_rooftop` decimal(6,2) DEFAULT NULL,
  `bearing` decimal(6,2) DEFAULT NULL,
  `leg_course` decimal(6,2) DEFAULT NULL,
  `leg_dist` decimal(6,2) DEFAULT NULL,
  `amsl` decimal(6,2) DEFAULT NULL,
  `agl` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_gps_datas`
--

LOCK TABLES `survey_gps_datas` WRITE;
/*!40000 ALTER TABLE `survey_gps_datas` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_gps_datas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_images`
--

DROP TABLE IF EXISTS `survey_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `roworder` int(11) DEFAULT NULL,
  `description` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_images`
--

LOCK TABLES `survey_images` WRITE;
/*!40000 ALTER TABLE `survey_images` DISABLE KEYS */;
INSERT INTO `survey_images` VALUES (1,1,'SAM_6864.JPG',1,'Gb1.Tampak depan lokasi klien','2015-04-13 11:31:47','Catur'),(2,1,'architect.jpg',2,'Gb2.Arah BTS Architect','2015-04-13 11:32:22','Catur'),(4,1,'to neo.jpg',3,'Gb3.Arah BTS Neo','2015-04-13 11:33:32','Catur'),(5,1,'1.jpg',4,'Gb4.Proposed penempatan pole antena','2015-04-13 11:34:03','Catur'),(6,1,'2.jpg',5,'Gb5.Jalur Instalasi kabel','2015-04-13 11:35:09','Catur'),(7,1,'3.jpg',6,'Gb6.Jalur instalasi kabel (Inlet kabel to Indoor)','2015-04-13 11:36:27','Catur'),(8,1,'SAM_6863.JPG',7,'Gb7.Letak switch/Hub klien','2015-04-13 11:37:05','Catur'),(9,7,'P1130189.JPG',1,'tampak depan ','2015-04-16 11:14:59','Suhartono'),(11,7,'P1130200.JPG',2,'Arah ke Bts Oracle','2015-04-16 11:18:56','Suhartono'),(13,7,'P1130191.JPG',3,'Tower triangle 24 meter ','2015-04-16 11:42:04','Suhartono'),(14,7,'P1130192.JPG',4,'inlet jalur cable to ruang komputer/ server','2015-04-16 11:43:55','Suhartono'),(15,7,'P1130182.JPG',5,'ruang komputer &  letak switch  / hub clien','2015-04-16 11:46:03','Suhartono'),(16,9,'SAM_6898.JPG',1,'Gb1.Tampak depan lokasi klien','2015-04-16 15:19:08','Catur'),(17,9,'to neo.jpg',2,'Gb2.Arah BTS Neo','2015-04-16 15:19:34','Catur'),(18,9,'to color.jpg',3,'Gb3.Arah BTS Chyper','2015-04-16 15:19:59','Catur'),(19,9,'3.jpg',4,'Gb4.Proposed penempatan antena','2015-04-16 15:20:49','Catur'),(20,9,'2.jpg',5,'Gb5.Jalur Instalasi klien','2015-04-16 15:21:25','Catur'),(21,9,'4.jpg',6,'Gb6.Jalur Instalasi klien','2015-04-16 15:21:44','Catur'),(22,9,'1.jpg',7,'Gb7.Jalur Instalasi klien ke ruang server klien','2015-04-16 15:22:11','Catur'),(26,6,'P1130218.JPG',1,'Tampak depan','2015-04-20 02:10:12','Suhartono'),(27,6,'P1130214.JPG',2,'Ttower monopole 18 meter','2015-04-20 02:16:36','Suhartono'),(28,6,'P1130213.JPG',3,'Penempatan pole  Antenna','2015-04-20 02:17:18','Suhartono'),(29,6,'P1130209.JPG',4,'Arah ke Bts Architec','2015-04-20 02:18:23','Suhartono'),(30,6,'P1130221.JPG',5,'Letak komputer Clien','2015-04-20 02:18:51','Suhartono'),(31,19,'P1130243.JPG',1,' Tampak depan SMAN 1 Rembang Pasuruan','2015-04-22 12:07:13','Suhartono'),(32,19,'P1130234.JPG',2,'Arah ke BTS Rolland','2015-04-22 12:13:06','Suhartono'),(33,19,'P1130236.JPG',3,'Tower Triangle 20 meter ','2015-04-22 12:14:02','Suhartono'),(34,19,'P1130239.JPG',4,'Letak Komputer server dan Switch Hub','2015-04-22 12:15:25','Suhartono'),(35,19,'Capture elevasi dan AP arah BTS Rolland.JPG',5,'Capture Elevasi dan AP arah BTS Rolland','2015-04-22 12:24:23','Suhartono'),(36,19,'Capture RMW  SMAN 1Rembang.JPG',6,'Capture perhitungan RMW SMAN 1Rembang to BTS Rolland','2015-04-22 12:26:42','Suhartono'),(37,10,'20150420_125115.jpg',1,'Gb 1. Client arah to BTS Roland','2015-04-23 02:22:51','gilang'),(38,10,'20150420_125834.jpg',2,'Gb 2. Penempatan antena','2015-04-23 02:23:25','gilang'),(39,10,'20150420_125904.jpg',3,'Gb 3. Letak switch','2015-04-23 02:24:16','gilang'),(40,3,'20150417_150313.jpg',1,'Gb 1. Foto tampak depan tempat client','2015-04-23 02:55:50','gilang'),(41,3,'20150417_145039.jpg',2,'Gb 2. LOS arah ke BTS Dozer','2015-04-23 02:56:29','gilang'),(42,3,'20150417_145101.jpg',4,'Gb 3. LOS arah BTS Oracle','2015-04-23 02:58:39','gilang'),(43,3,'20150417_145458.jpg',3,'Gb 4. Penempatan antena','2015-04-23 02:59:28','gilang'),(44,3,'20150417_145739.jpg',5,'Gb 5. Jalur kabel menuju ke switch dekat tower','2015-04-23 03:00:23','gilang'),(45,3,'20150417_145821.jpg',6,'Gb 6. Letak switch ada di kantin dekat tower','2015-04-23 03:01:35','gilang'),(46,17,'P1130298.JPG',1,'Tampak depan SMA 1 Purwosari','2015-04-24 04:32:44','Suhartono'),(47,17,'P1130285.JPG',2,'Tower Triangle 20 meter dan penempatan pole antenna','2015-04-24 04:35:18','Suhartono'),(48,17,'P1130291.JPG',3,'Arah ke BTS Twins','2015-04-24 04:35:54','Suhartono'),(49,17,'P1130293.JPG',4,'Jalur Instalasi kabel jaringan ','2015-04-24 04:37:58','Suhartono'),(50,17,'Capture elevasi SMA 1 purwosari dan AP arah BTS Tw',5,'Cover AP arah BTS Twins to SMA 1 Purwosari','2015-04-24 04:40:29','Suhartono'),(51,17,'Capture RMW SMA 1 Purwosari to BTS Twins.JPG',6,'Capture RMW  ','2015-04-24 04:41:49','Suhartono'),(52,21,'SAM_6909.JPG',1,'Gb1,Tampak depan lokasi klien','2015-04-24 10:03:14','Catur'),(53,21,'SAM_6902.JPG',2,'Gb2.Obstacle to BTS Soren','2015-04-24 10:04:56','Catur'),(54,21,'SAM_6904.JPG',3,'Gb3.Arah BTS Architect','2015-04-24 10:05:20','Catur'),(55,21,'pole.jpg',4,'Gb4.Proposed penempatan pole antena','2015-04-24 10:06:06','Catur'),(56,21,'jalur kabel.jpg',5,'Gb5.Jalur instalasi kabel','2015-04-24 10:06:55','Catur'),(57,21,'kabel1.jpg',6,'Gb6.Jalur instalasi kabel','2015-04-24 10:07:11','Catur'),(58,21,'SAM_6900.JPG',7,'Gb7.Letak Switch / hub klien','2015-04-24 10:07:37','Catur'),(59,13,'DSC_0265.jpg',1,'Bangunan tampak depan','2015-04-24 12:39:43','bagus'),(60,13,'DSC_0259.jpg',2,'Posisi tower 20 meter','2015-04-24 12:40:18','bagus'),(61,13,'DSC_0256.jpg',3,'Link ke BTS Twins nLOS','2015-04-24 12:41:13','bagus'),(62,13,'DSC_0257.jpg',4,'Link ke SMK 1 Nguling NLOS','2015-04-24 12:42:35','bagus'),(63,13,'DSC_0261.jpg',5,'Jalur kabel ke lab komputer','2015-04-24 12:43:51','bagus'),(64,13,'DSC_0262.jpg',6,'Jalur kabel masuk ke dalam ruangan','2015-04-24 12:44:37','bagus'),(65,13,'DSC_0263.jpg',7,'Ruang lab komputer','2015-04-24 12:45:22','bagus'),(66,18,'DSC_0265.jpg',1,'Bangunan tampak depan','2015-04-24 13:48:06','bagus'),(67,18,'DSC_0259.jpg',2,'Ketinggian  tower 20 m','2015-04-24 13:49:58','bagus'),(68,18,'DSC_0263.jpg',3,'Posisi switch didalam lab komputer','2015-04-24 13:50:40','bagus'),(69,18,'DSC_0256.jpg',4,'Link ke BTS Twins nLOS','2015-04-24 13:51:34','bagus'),(70,18,'DSC_0261.jpg',5,'Jalur kabel dari tower menuju lab komputer','2015-04-24 13:52:24','bagus'),(71,14,'DSC_0276.jpg',1,'Bangunan tampak depan','2015-04-24 14:49:02','bagus'),(72,14,'DSC_0271.jpg',2,'Tower 20 meter','2015-04-24 14:49:51','bagus'),(73,14,'DSC_0267.jpg',3,'link ke BTS NLOS','2015-04-24 14:51:27','bagus'),(74,14,'DSC_0268.jpg',4,'Link ke SMK lainnya NLOS','2015-04-24 14:52:16','bagus'),(75,14,'DSC_0275.jpg',5,'Posisi switch','2015-04-24 14:52:46','bagus'),(76,8,'20150422_144745.jpg',1,'Gb 1. Foto tampak depan tempat client','2015-04-27 10:59:27','gilang'),(77,8,'20150422_143750.jpg',2,'Gb 2. NLOS to BTS Neo','2015-04-27 11:00:00','gilang'),(78,8,'20150422_143754.jpg',3,'Gb 3. NLOS to BTS Chyper','2015-04-27 11:01:02','gilang'),(79,8,'Elevasi to BTS Chyper.png',4,'Gb 4. Elevasi to BTS Chyper','2015-04-27 11:01:41','gilang'),(80,8,'Elevasi to BTS Neo.png',5,'Gb 5. Elevasi to BTS Neo','2015-04-27 11:04:47','gilang'),(81,8,'20150422_141122.jpg',6,'Gb 6. Letak switch client','2015-04-27 11:11:15','gilang'),(82,16,'P1130284.JPG',1,'Tampak depan SMAN 1 Kejayan','2015-04-27 11:46:47','Suhartono'),(83,16,'P1130270.JPG',2,'Arah ke BTS Twins','2015-04-27 11:48:00','Suhartono'),(84,16,'P1130264.JPG',3,'Arah ke BTS Rolland','2015-04-27 11:49:30','Suhartono'),(85,16,'P1130275.JPG',4,'Cable Grounding tower terputus di ketinggian 12 meter','2015-04-27 11:51:41','Suhartono'),(86,16,'P1130281.JPG',5,'letak komputer server','2015-04-27 11:52:58','Suhartono'),(87,16,'SMA Kejayan to BTS TWINS.JPG',6,'SMAN 1 Kejayan to BTS Twins','2015-04-27 11:54:31','Suhartono'),(88,16,'rmw sma kejayan to BTS twins.JPG',7,'SMAN 1 kejayan to BTS Twins\n(RMW )','2015-04-27 11:56:12','Suhartono'),(89,16,'RMW to BTS Rolland.JPG',8,'SMAN 1 Kejayan to BTS Rolland','2015-04-27 11:56:53','Suhartono'),(90,15,'P1130261.JPG',1,'Tampak depan ','2015-04-28 03:50:21','Suhartono'),(91,15,'P1130250.JPG',2,'Arah ke BTS Twins','2015-04-28 03:51:38','Suhartono'),(92,15,'P1130244.JPG',3,'Arah ke BTS Rolland','2015-04-28 03:54:29','Suhartono'),(93,15,'P1130252.JPG',4,'Tower triangle 20 meter ','2015-04-28 03:55:31','Suhartono'),(94,15,'P1130256.JPG',5,'Ruang computer/ server','2015-04-28 03:58:10','Suhartono'),(95,15,'SMA 1 Gondang to BTS Rolland.JPG',6,'SMA 1 Gondang to BTS Rolland','2015-04-28 04:27:53','Suhartono'),(97,15,'SMA Gondang to BTS Rolland.JPG',7,'SMA 1 Gondang to BTS Rolland','2015-04-28 04:32:31','Suhartono'),(98,23,'logo_instantweb.png',1,'foto 1','2015-05-06 02:14:47','puji'),(99,23,'karate.jpg',2,'foto 2','2015-05-06 02:15:02','puji'),(100,23,'metrogoldwynmayer.jpg',3,'foto 3','2015-05-06 02:15:23','puji'),(101,23,'logo_padinet.png',4,'foto 4','2015-05-06 02:15:43','puji'),(102,23,'hilal.jpg',5,'foto 5','2015-05-06 02:15:55','puji'),(103,23,'x.png',6,'foto 6','2015-05-06 02:16:14','puji'),(104,23,'tbl_simpan.png',7,'foto 7','2015-05-06 02:16:38','puji'),(105,23,'mac.jpg',8,'foto 8\n','2015-05-06 02:16:53','puji'),(106,23,'DeepinScreenshot20150407162610.png',9,'foot 9','2015-05-06 02:17:12','puji'),(107,23,'kucing_programmer_ndik_omah.png',10,'kucingxx','2015-05-11 08:18:28','puji'),(108,23,'pensil_warna_warni.jpg',11,'pensil','2015-05-11 08:19:46','puji'),(109,23,'jusuf-kala-quote.jpg',12,'pemenang','2015-05-12 06:15:47','puji'),(110,23,'port_internet_di_tp_link_wifi.jpg',13,'port','2015-05-12 06:19:55','puji');
/*!40000 ALTER TABLE `survey_images` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger initsurveyroworder before insert on survey_images
for each row
begin
select count(roworder) into @maxroworder from survey_images where survey_site_id=new.survey_site_id;
if @maxroworder is null then
set new.roworder = 1;
end if ;
if @maxroworder is not null then
set new.roworder = @maxroworder+1;
end if ;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `survey_materials`
--

DROP TABLE IF EXISTS `survey_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `material_type` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_materials`
--

LOCK TABLES `survey_materials` WRITE;
/*!40000 ALTER TABLE `survey_materials` DISABLE KEYS */;
INSERT INTO `survey_materials` VALUES (1,1,'Seling','3 mm','10 m','2015-04-13 11:38:10','Catur'),(2,1,'Spanscrew','M8 ','3 pcs','2015-04-13 11:38:35','Catur'),(3,1,'Klem knalpot','2','2 pcs','2015-04-13 11:39:31','Catur'),(4,1,'Pipa Galvanized','1,5 dim','3 m','2015-04-13 11:40:10','Catur'),(5,1,'Kabel Jaringan','UTP Cat5e','± 45 m','2015-04-13 11:40:35','Catur'),(6,1,'Besi siku','4 x 4 mm','20 cm','2015-04-13 11:41:37','Catur'),(7,1,'Aquaproof','Aquaproof','secukupnya','2015-04-13 11:42:23','Catur'),(8,1,'Serat fiber','','secukupnya','2015-04-13 11:42:41','Catur'),(9,1,'Baut SDS','8 mm','12 pcs','2015-04-14 02:16:24','Catur'),(15,7,'Pangkon antena','Pangkon Antenna','1','2015-04-16 11:04:23','Suhartono'),(19,7,'Klem knalpot','2','4','2015-04-16 12:11:30','Suhartono'),(13,7,'Kabel Jaringan','UTP Cat5e','75 meter','2015-04-16 11:01:51','Suhartono'),(20,9,'Pangkon antena','Pangkon Antenna','1 pcs','2015-04-16 14:46:17','Catur'),(21,9,'Klem knalpot','2.5','4 pcs','2015-04-16 14:46:46','Catur'),(22,9,'Kabel Jaringan','UTP Cat5e','± 70 m','2015-04-16 14:47:49','Catur'),(23,9,'Kabel ties','20 cm','secukupnya','2015-04-16 15:18:09','Catur'),(24,6,'Pangkon antena','Pangkon Antenna','1','2015-04-20 02:03:34','Suhartono'),(25,6,'Klem knalpot','2','1','2015-04-20 02:04:07','Suhartono'),(26,6,'Kabel Jaringan','UTP Cat5e','1','2015-04-20 02:04:21','Suhartono'),(27,19,'Pangkon antena','Pangkon Antenna','1','2015-04-22 12:04:10','Suhartono'),(28,19,'Kabel Jaringan','UTP Cat5e','75 meter','2015-04-22 12:36:31','Suhartono'),(29,19,'Klem knalpot','2','2','2015-04-22 12:36:57','Suhartono'),(30,19,'Klem kabel ','5 mm','1','2015-04-22 12:38:14','Suhartono'),(31,10,'Pangkon antena','Pangkon Antenna','1','2015-04-23 02:33:23','gilang'),(32,10,'Klem knalpot','2.5','2','2015-04-23 02:34:56','gilang'),(33,10,'Klem knalpot','2','2','2015-04-23 02:35:04','gilang'),(34,10,'Kabel Jaringan','UTP Cat5e','30 m','2015-04-23 02:36:42','gilang'),(35,3,'Pangkon antena','Pangkon Antenna','1','2015-04-23 03:01:51','gilang'),(36,3,'Kabel Jaringan','UTP Cat5e','60 m','2015-04-23 03:03:06','gilang'),(37,17,'Pangkon antena','Pangkon Antenna','1','2015-04-24 04:24:30','Suhartono'),(38,17,'Kabel Jaringan','UTP Cat5e','50 meter','2015-04-24 04:27:20','Suhartono'),(39,17,'Klem knalpot','2','2','2015-04-24 04:28:13','Suhartono'),(40,17,'Klem knalpot','2.5','2','2015-04-24 04:28:48','Suhartono'),(41,17,'Klem kabel ','5 mm','1','2015-04-24 04:29:34','Suhartono'),(42,21,'Pipa Galvanized','1,5 dim','6 m','2015-04-24 08:46:42','Catur'),(43,21,'Besi siku','4 x 4 mm','20 cm','2015-04-24 08:46:57','Catur'),(44,21,'Klem kabel ','5 mm','1 pak','2015-04-24 08:47:16','Catur'),(45,21,'Dinabolt','10 mm','8 pcs','2015-04-24 08:47:32','Catur'),(46,21,'Kabel Jaringan','UTP Cat5e','± 40 m','2015-04-24 08:48:06','Catur'),(47,21,'Klem knalpot','2','4 pcs','2015-04-24 08:48:40','Catur'),(48,21,'Seling','3 mm','18 m','2015-04-24 08:49:04','Catur'),(49,21,'Spanscrew','M8 ','3 pcs','2015-04-24 08:49:24','Catur'),(50,13,'Kabel Jaringan','UTP Cat5e','40','2015-04-24 12:35:35','bagus'),(51,13,'Pangkon antena','Pangkon Antenna','1','2015-04-24 12:36:07','bagus'),(52,18,'Kabel Jaringan','UTP Cat5e','40','2015-04-24 13:46:05','bagus'),(53,18,'Pangkon antena','Pangkon Antenna','1','2015-04-24 13:46:20','bagus'),(54,18,'Klem knalpot','2','2','2015-04-24 13:46:43','bagus'),(55,8,'Tower','Tower Triangle','30 m','2015-04-27 10:53:29','gilang'),(56,16,'Pangkon antena','Pangkon Antenna','1','2015-04-27 12:09:19','Suhartono'),(57,16,'Kabel Jaringan','UTP Cat5e','64 meter','2015-04-27 12:10:23','Suhartono'),(58,16,'Klem kabel ','5 mm','1','2015-04-27 12:10:50','Suhartono'),(59,15,'Pangkon antena','Pangkon Antenna','1','2015-04-28 03:42:44','Suhartono'),(60,15,'Kabel Jaringan','UTP Cat5e','45 meter','2015-04-28 03:43:30','Suhartono'),(61,15,'Klem knalpot','2','2','2015-04-28 03:43:56','Suhartono'),(62,15,'Klem kabel ','5 mm','1pcs','2015-04-28 03:44:41','Suhartono');
/*!40000 ALTER TABLE `survey_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_requests`
--

DROP TABLE IF EXISTS `survey_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL COMMENT 'cabang PadiNEt yang melakukan survey',
  `service_id` int(11) DEFAULT NULL,
  `direction` varchar(1) DEFAULT '0',
  `survey_date` datetime DEFAULT NULL,
  `execution_date` datetime DEFAULT NULL,
  `pic_name` varchar(50) DEFAULT NULL,
  `pic_phone_area` varchar(10) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(100) DEFAULT NULL,
  `pic_position` varchar(50) DEFAULT NULL,
  `address` text,
  `city` varchar(50) DEFAULT NULL,
  `install_area` int(11) DEFAULT NULL COMMENT 'the area where the installation will be occured',
  `covering_letter` varchar(1) DEFAULT '0',
  `has_ladder` varchar(1) DEFAULT '0',
  `resume` varchar(1) DEFAULT '0',
  `description` text,
  `active` varchar(1) DEFAULT '1',
  `status` varchar(1) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_close` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_requests`
--

LOCK TABLES `survey_requests` WRITE;
/*!40000 ALTER TABLE `survey_requests` DISABLE KEYS */;
INSERT INTO `survey_requests` VALUES (1,1,NULL,NULL,NULL,'0','2015-04-13 09:00:20','2015-04-13 09:00:07','Yaser','031','7497421','yaser.arafat@lincgrp.com','IT Dept','Jl. Veteran Tama Utara No. 10-11, Gresik','Gresik',1,'0','0','1','','1',NULL,'yudi','2015-04-13 02:11:22',NULL),(2,2,NULL,NULL,NULL,'0','2015-04-16 10:00:57',NULL,'Wahyudi ','031','3905234','edp_spv_2@grs.indomaret.co.id','IT Dept','Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng','Gresik ',1,'0','0','0','','0',NULL,'dhani','2015-04-13 03:21:38',NULL),(3,2,NULL,NULL,NULL,'0','2015-04-16 10:00:11','2015-04-17 00:00:24','Wahyudi ','031','3905234 ','edp_spv_2@grs.indomaret.co.id','IT Dept','Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng','Gresik ',1,'0','0','1','','1',NULL,'dhani','2015-04-13 03:29:33',NULL),(4,3,NULL,NULL,NULL,'0','2015-02-13 10:00:34',NULL,'Fahruz','031','3991719','it_pbtlsby@yahoo.com','IT Dept','Jl. Kapten Darmo Sugondo 88 Gresik ','Gresik ',1,'0','0','0','','0',NULL,'dhani','2015-04-13 04:27:56',NULL),(5,3,NULL,NULL,NULL,'0','2015-04-15 10:00:02',NULL,'M. Taufik Bastomo ','+62',' 81703210546','it_pbtlsby@yahoo.com','Ibu Mei','Jalan Bung Tomo No. 99 X Denpasar','Denpasar',4,'0','0','0','','1',NULL,'dhani','2015-04-13 04:43:24',NULL),(6,4,NULL,NULL,7,'0','2015-04-15 08:00:24','2015-04-16 09:00:09','Rosianang','031','7490754','rosianang.brilian@yahoo.com','IT Dept','Jl. Laksda M. Natsir No. 17, Surabaya','Surabaya',1,'0','0','1','','1',NULL,'yudi','2015-04-15 04:12:46',NULL),(7,5,NULL,NULL,NULL,'0','2015-04-16 10:00:04','0000-00-00 00:00:00','Jonny','031','7993816 ','jonny@tjakrindomas.co.id','IT Dept','Raya Kepatihan 168A Menganti Gresik','Gresik',1,'0','0','1','minta tolong disurvey ya pak... thnks','1',NULL,'amir','2015-04-15 09:02:17',NULL),(8,6,NULL,NULL,NULL,'0','2015-04-17 08:00:06','0000-00-00 00:00:09','Matius','081','703707050','graha_intrieur@yahoo.com','IT Dept.','Jl. Bangkingan Gadung, Lidah Kulon - Surabaya','Surabaya',1,'0','0','2','','1',NULL,'yudi','2015-04-15 09:47:28',NULL),(9,7,NULL,NULL,NULL,'0','2015-04-16 08:00:02','2015-04-16 13:00:13','edwin','(0343','741873','rachmad.y.winarno@gmail.com','lainnya','jl bader no 3 kalirejo pasuruan','pasuruan',1,'0','0','1','','1',NULL,'dwi','2015-04-15 10:10:16',NULL),(10,8,NULL,NULL,NULL,'0','2015-04-16 08:00:15','2015-04-16 14:00:29','edwin','0234','3631593','rachmad.y.winarno@gmail.com','lainnya','jl dr soetomo pandaan pasuruan','pasuruan',1,'0','0','2','','1',NULL,'dwi','2015-04-15 10:30:29',NULL),(11,9,NULL,NULL,NULL,'0','2015-04-15 08:00:06',NULL,'edwin','0343','635726','rachmad.y.winarno@gmail.com','lainnya','jl dau darmorejo kepulungan gempol','pasuruan',1,'0','0','0','','1',NULL,'dwi','2015-04-15 10:37:21',NULL),(12,9,NULL,NULL,NULL,'0','2015-04-15 08:00:12',NULL,'edwin','0343','635726','rachmad.y.winarno@gmail.com','lainnya','jl dau darmorejo kepulungan gempol','pasuruan',1,'0','0','0','','1',NULL,'dwi','2015-04-15 10:37:26',NULL),(13,10,NULL,NULL,NULL,'0','2015-04-16 08:00:24',NULL,'edwin','0343','481017','rachmad.y.winarno@gmail.com','lainnya','Jalan Raya Sumurwaru No.32 Nguling','Pasuruan',1,'0','0','0','','1',NULL,'dwi','2015-04-15 10:44:38',NULL),(14,11,NULL,NULL,NULL,'0','2015-04-15 08:00:32','0000-00-00 00:00:15','edwin','0343',' 483833','rachmad.y.winarno@gmail.com','lainnya','JL. DR. SUTOMO 69 NGULING','Pasuruan',1,'0','0','3','','1',NULL,'dwi','2015-04-15 10:50:46',NULL),(15,12,NULL,NULL,NULL,'0','2015-04-15 08:00:57','2015-04-22 09:00:07','Edwin','0343','441331','rachmad.y.winarno@gmail.com','lainnya','Jalan Raya Bromo Nomor 33 Gondangwetan','Pasuruan',1,'0','0','0','','1',NULL,'dwi','2015-04-15 10:55:11',NULL),(16,13,NULL,NULL,NULL,'0','2015-04-15 08:00:24','2015-04-22 09:00:46','Edwin','0343','426595','rachmad.y.winarno@gmail.com','lainnya','Jl. Kabupaten Sladi Kejayan','Pasuruan',1,'0','0','2','','1',NULL,'dwi','2015-04-15 11:00:38',NULL),(17,14,NULL,NULL,NULL,'0','2015-04-16 08:00:25','2015-04-22 09:00:34','Edwin','0343','611067','rachmad.y.winarno@gmail.com','lainnya','Jl. Pegadaian No 1 Purwosari','Pasuruan',1,'0','0','1','','1',NULL,'dwi','2015-04-15 11:06:39',NULL),(18,15,NULL,NULL,NULL,'0','2015-04-15 08:00:26',NULL,'Edwin','0343','885332','rachmad.y.winarno@gmail.com','Pemilik','Jalan pecalukan Ledug Prigen','Pasuruan',1,'0','0','0','','1',NULL,'dwi','2015-04-15 11:14:40',NULL),(19,16,NULL,NULL,NULL,'0','2015-04-16 08:00:25','2015-04-22 09:00:06','edwin',' 0343','745225','rachmad.y.winarno@gmail.com','lainnya',' Jl. Raya Rembang ','Pasuruan',1,'0','0','1','','1',NULL,'dwi','2015-04-15 11:19:39',NULL),(20,18,NULL,NULL,NULL,'0','2015-04-23 09:30:31','2015-04-23 09:30:39','Doni','031  ','00000001  ','dzikra_er@yahoo.co.id','Pemilik','Jl. Dukuh Kupang Gg Lebar No.119 Surabaya','SURABAYA',1,'0','0','0','','1',NULL,'amir','2015-04-21 08:54:26',NULL),(21,19,NULL,NULL,NULL,'0','2015-04-24 10:00:16','2015-04-24 10:00:24','Ida','031  ',' 3890 322 ','ida@universaltrading-int.com','Pemilik','Villa Kalijudan Indah IX/M-5 Surabaya ','Surabaya ',1,'0','0','2','Mohon calling dulu sebelum berangkat','1',NULL,'dhani','2015-04-22 10:07:09',NULL),(22,20,NULL,NULL,NULL,'0','2015-04-27 10:00:54','2015-04-27 10:00:34','Ibu San San','031 ','081331090331 ','virijani@gmail.com','Pemilik','taman international I B6/30 Kompleks Citra Raya Surabaya','SURABAYA',1,'0','0','0','Call dulu sebelum berangkat','1',NULL,'amir','2015-04-24 03:55:38',NULL),(23,21,NULL,NULL,NULL,'0','2015-04-29 08:00:30',NULL,'david','   ','081232534066   ','frandavid14@gmail.com','Pemilik','kemantren 1 gang brawijaya no 11','malang',1,'0','0','0','','1',NULL,'puji','2015-04-29 03:33:30',NULL);
/*!40000 ALTER TABLE `survey_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_requests_users`
--

DROP TABLE IF EXISTS `survey_requests_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_requests_users` (
  `user_id` int(11) DEFAULT NULL,
  `survey_request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_requests_users`
--

LOCK TABLES `survey_requests_users` WRITE;
/*!40000 ALTER TABLE `survey_requests_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_requests_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_resumes`
--

DROP TABLE IF EXISTS `survey_resumes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `name` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_resumes`
--

LOCK TABLES `survey_resumes` WRITE;
/*!40000 ALTER TABLE `survey_resumes` DISABLE KEYS */;
INSERT INTO `survey_resumes` VALUES (1,1,'Kondisi bangunan klien adalah bangunan pabrik dengan atap berupa setengah lingkaran.','arif','2015-04-13 12:00:59'),(2,1,'Jika dilihat dari Google Earth BTS yang bisa mengcover adalah BTS Architect dan BTS Neo (Saat survey kondisi berasap jadi view ke arah BTS tidak terlihat)','arif','2015-04-13 12:01:39'),(3,1,'Penempatan pole antena dekat dengan tiang existing dengan 3 tarikan suspender.','arif','2015-04-13 12:02:10'),(6,1,'Jalur kabel ikut existing turun di gedung office  (container).','arif','2015-04-13 12:08:24'),(10,7,'Tjakrindo Divisi Beton merupakan banguanan satu lantai','Suhartono','2015-04-16 12:06:00'),(11,7,'Sudah ada Tower Triangle 24 meter dengan kondisi tower  safety untuk dipanjat','Suhartono','2015-04-16 12:06:20'),(12,7,'Jalur instalasi kabel dari tower menuju ke ruang computer ± 75 meter','Suhartono','2015-04-16 12:07:07'),(13,9,'Kebutuhan klien adalah koneksi internet 5 Mbps dan sudah ada tower existing 20 m','Catur','2015-04-16 15:23:04'),(14,9,'Pemasangan antena di tower existing klien dengan mounting / pangkon antena','Catur','2015-04-16 15:23:57'),(15,9,'Jalur kabel ikut existing dengan panjang ± 70 m','Catur','2015-04-16 15:25:22'),(16,9,'Dilihat dari Google earth BTS yang bisa mengcover adalah :BTS Neo(33,3 Km),Color(31,14 km),Roland (16,54 Km).','Catur','2015-04-16 15:28:48'),(17,19,'Kondisi Gedung merupakan Banguanan Sekolah','Suhartono','2015-04-22 12:50:43'),(18,10,'Bangunan client berupa sekolah dan mempunyai tower existing dengan ketinggian 20 m','gilang','2015-04-23 02:29:46'),(20,10,'Penempatan antena di tower existing dengan mounting/pangkon antena','gilang','2015-04-23 02:30:39'),(21,10,'Jalur kabel masuk switch di dekat tower existing karena jarak antara server dengan tower jauh.','gilang','2015-04-23 02:31:52'),(22,10,'BTS yang bisa mencover yaitu BTS Roland dengan status nLOS','gilang','2015-04-23 02:33:01'),(23,3,'Bangunan client merupakan pergudangan indomaret','gilang','2015-04-23 03:05:14'),(24,3,'Di tempat client sudah ada Tower dengan ketinggian 60 m','gilang','2015-04-23 03:05:46'),(25,3,'BTS yang bisa mencover yaitu BTS Dozer & Oracle','gilang','2015-04-23 03:06:23'),(26,17,'kondisi banguanan merupakan banguanan sekolah','Suhartono','2015-04-24 04:50:23'),(27,17,'sudah ada tower triangle dengan ketinggian 20 meter','Suhartono','2015-04-24 04:51:00'),(28,17,'Arah ke BTS  Rolland  (NLOS) terhalang oleh pohon di depan nya dengan ketinggian  (±) 25 meter','Suhartono','2015-04-24 04:55:48'),(29,21,'Kondisi bangunan klien adalah gedung 2 lantai','Catur','2015-04-24 10:08:11'),(30,21,'BTS yang bisa mengcover hanya BTS Architect dengan status nLOS','Catur','2015-04-24 10:08:53'),(31,21,'Penempatan pole antena di dinding pembatas dengan 3 tarikan suspender,dengan tinggi tiang 6 m','Catur','2015-04-24 10:10:08'),(32,21,'Jalur kabel lewat luar (ikut existing) turun di office (Lt.1)','Catur','2015-04-24 10:11:49'),(33,18,'Ketinggian tower 20 meter','bagus','2015-04-24 13:58:55'),(34,18,'Link ke arah BTS terhalang elevasi tanah 12 - 50 meter.','bagus','2015-04-24 14:00:27'),(35,18,'Posisi penempatan switch berada didalam lab komputer.','bagus','2015-04-24 14:01:36'),(36,18,'Jarak tower ke lab komputer 20 meter','bagus','2015-04-24 14:02:16'),(37,18,'BTS yang direkomendasiakn adalah BTS Twins','bagus','2015-04-24 14:03:20'),(38,14,'Link ke BTS dan ke SMK lainya terhalang bukit / elevasi tanah dengan ketinggian 27 meter','bagus','2015-04-24 14:57:38'),(39,14,'Tower kurang safety, karena jarak tarikan tower ke angker suspender hanya 3 meter.','bagus','2015-04-24 14:59:16'),(40,8,'Lokasi client berupa bangunan pabrik dengan ketinggian 12 m','gilang','2015-04-27 11:05:48'),(41,8,'Elevasi di tempat client terlalu rendah','gilang','2015-04-27 11:06:19'),(42,8,'Pandangan ke arah BTS terhalang pohon 20-25 m','gilang','2015-04-27 11:07:05'),(44,8,'Instalasi dapat dilaksanakan dengan asumsi mendirikan tower 30 m agar bisa mencapai LOS ke arah BTS','gilang','2015-04-27 11:09:39'),(45,16,'- kondisi gedung merupakan bangunan sekolah','Suhartono','2015-04-27 12:18:08'),(46,16,'- sudah ada tower triangle dengan ketinggian 20 meter','Suhartono','2015-04-27 12:18:52'),(47,16,'- cable grounding tower terputus di ketinggian 12 meter','Suhartono','2015-04-27 12:20:01'),(48,16,'- Arah ke BTS Rolland terhalang oleh Bukit','Suhartono','2015-04-27 12:21:18'),(49,16,'- Arah ke BTS  Twins terhalang oleh pepohonan lumayan tinggi dengan ketinggian  (±) 18 meter','Suhartono','2015-04-27 12:23:40'),(52,16,'- Perlu ditambahkan untuk ketinggian  tower triangle yang sekarang 20 meter menjadi 30 meter','Suhartono','2015-04-27 12:29:56'),(53,15,'kondisi gedung  merupakan bangunan sekolah','Suhartono','2015-04-28 04:45:33'),(54,15,'Sudah ada tower triangle dengan ketinggian 20 meter','Suhartono','2015-04-28 04:46:06'),(55,15,'Arah ke BTS Rolland terhalang oleh bukit dengan elevasi tanah tinggi','Suhartono','2015-04-28 04:47:11'),(56,15,'Arah ke BTS Twins( nLos)  terhalang pohon dengan ketinggian  (±) 18 meter','Suhartono','2015-04-28 04:48:53'),(57,15,'Perlu di tambahkan ketinggian tower yang sekarang 20 meter di tambahkan  menjadi 30 meter','Suhartono','2015-04-28 04:50:58');
/*!40000 ALTER TABLE `survey_resumes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_site_distances`
--

DROP TABLE IF EXISTS `survey_site_distances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_site_distances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `distance` varchar(10) DEFAULT NULL,
  `los` varchar(1) DEFAULT '1',
  `obstacle` varchar(100) DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_site_distances`
--

LOCK TABLES `survey_site_distances` WRITE;
/*!40000 ALTER TABLE `survey_site_distances` DISABLE KEYS */;
INSERT INTO `survey_site_distances` VALUES (2,1,'sidoarjo','2km','1',NULL,'testing','puji','2015-05-04 09:46:57'),(6,23,'kemantren 1 gang brawijaya no 11','11','1','bangunan','tes123123','puji','2015-05-06 08:37:33'),(7,23,'kemantren 1 gang brawijaya no 11','45','2','mobil','testzzz','puji','2015-05-06 08:39:04'),(8,23,'kemantren 1 gang brawijaya no 11','22','0','mobilqwe','testzzzwww','puji','2015-05-06 08:39:31');
/*!40000 ALTER TABLE `survey_site_distances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_sites`
--

DROP TABLE IF EXISTS `survey_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_request_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL COMMENT 'cabang PadiNEt yang melakukan survey',
  `service_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `direction` varchar(1) DEFAULT '0',
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `pic_name` varchar(50) DEFAULT NULL,
  `pic_position` varchar(50) DEFAULT NULL,
  `pic_phone_area` varchar(5) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(100) DEFAULT NULL,
  `location_e` varchar(50) DEFAULT NULL,
  `location_e_d` varchar(5) DEFAULT NULL,
  `location_e_m` varchar(5) DEFAULT NULL,
  `location_e_s` varchar(5) DEFAULT NULL,
  `location_s` varchar(50) DEFAULT NULL,
  `location_s_d` varchar(5) DEFAULT NULL,
  `location_s_m` varchar(5) DEFAULT NULL,
  `location_s_s` varchar(5) DEFAULT NULL,
  `bearing` varchar(50) DEFAULT NULL,
  `amsl` varchar(50) DEFAULT NULL,
  `agl` varchar(50) DEFAULT NULL,
  `has_ladder` varchar(1) DEFAULT '0',
  `survey_date` datetime DEFAULT NULL,
  `execution_date` datetime DEFAULT NULL,
  `description` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_sites`
--

LOCK TABLES `survey_sites` WRITE;
/*!40000 ALTER TABLE `survey_sites` DISABLE KEYS */;
INSERT INTO `survey_sites` VALUES (1,1,1,1,NULL,NULL,14,'0','Jl. Veteran Tama Utara No. 10-11, Gresik','Gresik','Yaser','IT Dept','031','7497421','yaser.arafat@lincgrp.com',NULL,'112','39','18.48',NULL,'7','10','57.58','','30 m','12 m','0','2015-04-13 09:00:20','2015-04-13 09:00:07','Bangunan Berupa Pabrik / Gudang dengan atap setengah lingkaran','2015-04-13 02:11:22','yudi','1'),(2,2,2,2,NULL,NULL,13,'0','Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng','Gresik ','Wahyudi ','IT Dept','031','3905234','edp_spv_2@grs.indomaret.co.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-04-16 10:00:57',NULL,'','2015-04-13 03:21:38','dhani','0'),(3,3,2,3,NULL,NULL,13,'0','Jl. Raya Duduk Sampean RT.11/ RW IV, Ambeng-Ambeng','Gresik ','Wahyudi ','IT Dept','031','3905234 ','edp_spv_2@grs.indomaret.co.id',NULL,'112','34','7.55',NULL,'7','10','13.32','','5','6','0','2015-04-16 10:00:11','2015-04-17 00:00:24','','2015-04-13 03:29:33','dhani','1'),(4,4,3,4,NULL,NULL,13,'0','Jl. Kapten Darmo Sugondo 88 Gresik ','Gresik ','Fahruz','IT Dept','031','3991719','it_pbtlsby@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-02-13 10:00:34',NULL,'','2015-04-13 04:27:56','dhani','0'),(5,5,3,5,NULL,NULL,13,'0','Jalan Bung Tomo No. 99 X Denpasar','Denpasar','M. Taufik Bastomo ','Ibu Mei','+62',' 81703210546','it_pbtlsby@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-04-15 10:00:02',NULL,'','2015-04-13 04:43:24','dhani','1'),(6,6,4,6,NULL,7,14,'0','Jl. Laksda M. Natsir No. 17, Surabaya','Surabaya','Rosianang','IT Dept','031','7490754','rosianang.brilian@yahoo.com',NULL,'','','',NULL,'','','','','','','0','2015-04-15 08:00:24','2015-04-16 09:00:36','','2015-04-15 04:12:46','yudi','1'),(7,7,5,7,NULL,NULL,8,'0','Raya Kepatihan 168A Menganti Gresik','Gresik','Jonny','IT Dept','031','7993816 ','jonny@tjakrindomas.co.id',NULL,'112°','35\'.5','4',NULL,' 07°','14\'01','5','263°','46','24','0','2015-04-16 10:00:04','0000-00-00 00:00:00','minta tolong disurvey ya pak... thnks','2015-04-15 09:02:17','amir','1'),(8,8,6,8,NULL,NULL,14,'0','Jl. Bangkingan Gadung, Lidah Kulon - Surabaya','Surabaya','Matius','IT Dept.','081','703707050','graha_intrieur@yahoo.com',NULL,'112','39','2.29',NULL,'7','19','30.03','','11','12','0','2015-04-17 08:00:06','0000-00-00 00:00:09','','2015-04-15 09:47:28','yudi','1'),(9,9,7,9,NULL,NULL,52,'0','jl bader no 3 kalirejo pasuruan','pasuruan','edwin','lainnya','(0343','741873','rachmad.y.winarno@gmail.com',NULL,'112','47','32.24',NULL,'7','34','59.81','','4 m','20 m','0','2015-04-16 08:00:02','2015-04-16 13:00:13','','2015-04-15 10:10:16','dwi','1'),(10,10,8,10,NULL,NULL,52,'0','jl dr soetomo pandaan pasuruan','pasuruan','edwin','lainnya','0234','3631593','rachmad.y.winarno@gmail.com',NULL,'112','41','0.32',NULL,'7','39','11.26','','208','20','0','2015-04-16 08:00:15','2015-04-16 14:00:29','','2015-04-15 10:30:29','dwi','1'),(11,11,9,11,NULL,NULL,52,'0','jl dau darmorejo kepulungan gempol','pasuruan','edwin','lainnya','0343','635726','rachmad.y.winarno@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-04-15 08:00:07',NULL,'','2015-04-15 10:37:21','dwi','1'),(12,12,9,12,NULL,NULL,52,'0','jl dau darmorejo kepulungan gempol','pasuruan','edwin','lainnya','0343','635726','rachmad.y.winarno@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-04-15 08:00:12',NULL,'','2015-04-15 10:37:26','dwi','1'),(13,13,10,13,NULL,NULL,52,'0','Jalan Raya Sumurwaru No.32 Nguling','Pasuruan','edwin','lainnya','0343','481017','rachmad.y.winarno@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-04-16 08:00:24',NULL,'','2015-04-15 10:44:39','dwi','1'),(14,14,11,14,NULL,NULL,52,'0','JL. DR. SUTOMO 69 NGULING','Pasuruan','edwin','lainnya','0343',' 483833','rachmad.y.winarno@gmail.com',NULL,'113','4','38.43',NULL,'07','42','47.11','','23','20','0','2015-04-15 08:00:33','0000-00-00 00:00:15','','2015-04-15 10:50:47','dwi','1'),(15,15,12,15,NULL,NULL,52,'0','Jalan Raya Bromo Nomor 33 Gondangwetan','Pasuruan','Edwin','lainnya','0343','441331','rachmad.y.winarno@gmail.com',NULL,'112°','54’00','1”',NULL,'07°','42’39','1”','121°','55 m','20 m','0','2015-04-15 08:00:57','2015-04-22 09:00:07','','2015-04-15 10:55:12','dwi','1'),(16,16,13,16,NULL,NULL,52,'0','Jl. Kabupaten Sladi Kejayan','Pasuruan','Edwin','lainnya','0343','426595','rachmad.y.winarno@gmail.com',NULL,'112°','52’22','9”',NULL,'07°','42’13','5”','126°','59 m','20 m','0','2015-04-15 08:00:24','2015-04-22 09:00:46','SMAN 1 Kejayan','2015-04-15 11:00:38','dwi','1'),(17,17,14,17,NULL,NULL,52,'0','Jl. Pegadaian No 1 Purwosari','Pasuruan','Edwin','lainnya','0343','611067','rachmad.y.winarno@gmail.com',NULL,'112°','44’27','5”',NULL,'07°','46’45','7”','204°','270 meter','20 meter','0','2015-04-16 08:00:25','2015-04-22 09:00:35','TS : Rizal','2015-04-15 11:06:39','dwi','1'),(18,18,15,18,NULL,NULL,52,'0','Jalan pecalukan Ledug Prigen','Pasuruan','Edwin','Pemilik','0343','885332','rachmad.y.winarno@gmail.com',NULL,'113','1','9.54',NULL,'07','42','48.94','','25','20','0','2015-04-15 08:00:26','2015-04-24 00:00:21','','2015-04-15 11:14:40','dwi','1'),(19,19,16,19,NULL,NULL,52,'0',' Jl. Raya Rembang ','Pasuruan','edwin','lainnya',' 0343','745225','rachmad.y.winarno@gmail.com',NULL,'','','',NULL,'','','','','','','0','2015-04-16 08:00:25','2015-04-22 09:00:06','','2015-04-15 11:19:39','dwi','1'),(20,20,18,20,NULL,NULL,8,'0','Jl. Dukuh Kupang Gg Lebar No.119 Surabaya','SURABAYA','Doni','Pemilik','031  ','00000001  ','dzikra_er@yahoo.co.id',NULL,'','','',NULL,'','','','','','','0','2015-04-23 09:30:31','2015-04-23 09:30:39','','2015-04-21 08:54:26','amir','1'),(21,21,19,21,NULL,NULL,13,'0','Villa Kalijudan Indah IX/M-5 Surabaya ','Surabaya ','Ida','Pemilik','031  ',' 3890 322 ','ida@universaltrading-int.com',NULL,'112','46','50',NULL,'7','15','35,5','','2 m','± 7 m','0','2015-04-24 10:00:16','2015-04-24 10:00:24','Mohon calling dulu sebelum berangkat','2015-04-22 10:07:09','dhani','1'),(22,22,20,22,NULL,NULL,8,'0','taman international I B6/30 Kompleks Citra Raya Surabaya','SURABAYA','Ibu San San','Pemilik','031 ','081331090331 ','virijani@gmail.com',NULL,'','','',NULL,'','','','','','','0','2015-04-27 10:00:54','2015-04-27 10:00:34','Call dulu sebelum berangkat','2015-04-24 03:55:38','amir','1'),(23,23,21,23,NULL,NULL,17,'0','kemantren 1 gang brawijaya no 11','malang','david','Pemilik','   ','081232534066   ','frandavid14@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','2015-04-29 08:00:31',NULL,'','2015-04-29 03:33:31','puji','1');
/*!40000 ALTER TABLE `survey_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_surveyors`
--

DROP TABLE IF EXISTS `survey_surveyors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_surveyors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_request_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_surveyors`
--

LOCK TABLES `survey_surveyors` WRITE;
/*!40000 ALTER TABLE `survey_surveyors` DISABLE KEYS */;
INSERT INTO `survey_surveyors` VALUES (6,1,'arif','arif@padi.net.id',NULL,'2015-04-13 12:12:25',NULL),(2,1,'Catur','catur@padi.net.id',NULL,'2015-04-13 03:30:18',NULL),(8,9,'Catur','catur@padi.net.id',NULL,'2015-04-15 15:01:33',NULL),(20,10,'gilang','gilang@padi.net.id',NULL,'2015-04-23 02:18:53',NULL),(10,6,'Suhartono','suhartono@padi.net.id',NULL,'2015-04-15 15:05:42',NULL),(11,7,'Suhartono','suhartono@padi.net.id',NULL,'2015-04-16 11:06:33',NULL),(13,19,'Suhartono','suhartono@padi.net.id',NULL,'2015-04-22 01:36:51',NULL),(14,17,'Suhartono','suhartono@padi.net.id',NULL,'2015-04-22 01:38:03',NULL),(15,16,'Suhartono','suhartono@padi.net.id',NULL,'2015-04-22 01:38:46',NULL),(16,15,'Suhartono','suhartono@padi.net.id',NULL,'2015-04-22 01:39:50',NULL),(17,20,'Catur','catur@padi.net.id',NULL,'2015-04-22 09:57:17',NULL),(21,3,'gilang','gilang@padi.net.id',NULL,'2015-04-23 02:55:14',NULL),(22,21,'arif','arif@padi.net.id',NULL,'2015-04-24 04:12:13',NULL),(23,21,'Catur','catur@padi.net.id',NULL,'2015-04-24 04:12:17',NULL),(24,13,'bagus','bagus@padi.net.id',NULL,'2015-04-24 12:36:40',NULL),(25,18,'bagus','bagus@padi.net.id',NULL,'2015-04-24 13:47:11',NULL),(26,14,'bagus','bagus@padi.net.id',NULL,'2015-04-24 14:40:04',NULL),(27,22,'gilang','gilang@padi.net.id',NULL,'2015-04-27 00:30:00',NULL),(28,8,'gilang','gilang@padi.net.id',NULL,'2015-04-27 10:53:43',NULL),(29,8,'arif','arif@padi.net.id',NULL,'2015-04-27 10:53:49',NULL),(33,23,'Kholis','kholis@padi.net.id',NULL,'2015-05-06 02:16:40',NULL),(34,23,'Kholis','kholis@padi.net.id',NULL,'2015-05-06 02:17:00',NULL);
/*!40000 ALTER TABLE `survey_surveyors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveypackagedetails`
--

DROP TABLE IF EXISTS `surveypackagedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveypackagedetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surveypackage_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(5) DEFAULT NULL,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveypackagedetails`
--

LOCK TABLES `surveypackagedetails` WRITE;
/*!40000 ALTER TABLE `surveypackagedetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `surveypackagedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveypackages`
--

DROP TABLE IF EXISTS `surveypackages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveypackages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveypackages`
--

LOCK TABLES `surveypackages` WRITE;
/*!40000 ALTER TABLE `surveypackages` DISABLE KEYS */;
/*!40000 ALTER TABLE `surveypackages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_request_id` int(11) DEFAULT NULL,
  `survey_date` datetime DEFAULT NULL,
  `surat_ijin` varchar(1) DEFAULT '0',
  `problems` text,
  `conclusion` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveys`
--

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_followups`
--

DROP TABLE IF EXISTS `ticket_followups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_followups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `followUpDate` datetime DEFAULT NULL,
  `picname` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `result` varchar(1) DEFAULT '1' COMMENT '"0":Progress,"1":OK,"3":tidak dapat dihubungi',
  `description` text,
  `username` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_followups`
--

LOCK TABLES `ticket_followups` WRITE;
/*!40000 ALTER TABLE `ticket_followups` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_followups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticketcauses`
--

DROP TABLE IF EXISTS `ticketcauses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticketcauses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticketcauses`
--

LOCK TABLES `ticketcauses` WRITE;
/*!40000 ALTER TABLE `ticketcauses` DISABLE KEYS */;
INSERT INTO `ticketcauses` VALUES (1,'Problem LAN pelanggan','2014-02-21 07:38:31'),(2,'Last mile','2014-02-21 07:38:31'),(3,'Radio plg down','2014-02-21 07:38:31'),(4,'AP BTS down','2014-02-21 07:38:31'),(5,'BTS down','2014-02-21 07:38:31'),(6,'Problem upstream','2014-02-21 07:38:31'),(7,'FO Cut','2014-02-21 07:38:31'),(8,'NOC sby down','2014-02-21 07:38:31'),(9,'NOC jkt down','2014-02-21 07:38:31'),(10,'Bw plg penuh','2014-02-21 07:38:31'),(11,'Interferensi','2014-02-21 07:38:31'),(12,'Data Rate Turun','2014-02-21 07:38:31'),(13,'Flooding','2014-02-21 07:38:31'),(14,'Hosting','2014-02-21 07:38:31'),(15,'Colo','2014-02-21 07:38:31'),(16,'Website','2014-02-21 07:38:31'),(17,'Lainnya','2014-02-21 07:38:31');
/*!40000 ALTER TABLE `ticketcauses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `kdticket` varchar(6) DEFAULT NULL,
  `requesttype` varchar(15) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `content` text,
  `reporter` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0',
  `prev_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticketstart` datetime DEFAULT NULL,
  `ticketend` datetime DEFAULT NULL,
  `downtimestart` datetime DEFAULT NULL,
  `downtimeend` datetime DEFAULT NULL,
  `cause` text,
  `user_id` int(11) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger createkodeticket
before insert on tickets
for each row
begin 
case (new.requesttype)
when 'backbone'
then
select b.branch_id,a.abbr into @branchid, @abbr from backbones b left outer join branches a on a.id=b.branch_id where b.id=new.client_id;  
when 'pelanggan'
then
select b.branch_id,a.abbr into @branchid, @abbr from client_sites b left outer join branches a on a.id=b.branch_id where b.id=new.client_site_id;  
when 'datacenter'
then
select b.branch_id,a.abbr into @branchid, @abbr from datacenters b left outer join branches a on a.id=b.branch_id where b.id=new.client_id;  
when 'bts'
then
select b.branch_id,a.abbr into @branchid, @abbr from btstowers b left outer join branches a on a.id=b.branch_id where b.id=new.client_id;  
end case;
set new.branch_id = @branchid;
select count(id) into @cnt from tickets where branch_id=@branchid; 
set new.kdticket=concat(@abbr,lpad(@cnt+1,5,'0')); 
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tmptbl`
--

DROP TABLE IF EXISTS `tmptbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmptbl` (
  `clientname` varchar(200) DEFAULT NULL,
  `sales` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmptbl`
--

LOCK TABLES `tmptbl` WRITE;
/*!40000 ALTER TABLE `tmptbl` DISABLE KEYS */;
INSERT INTO `tmptbl` VALUES ('ANTODINA','bima'),('AUTOGLYM','bima'),('BUDIYANTO KARWELO','bima'),('BUDIYANTO KARWELO','bima'),('COLORS RADIO','bima'),('Cowholdings','bima'),('D\'AUTHIZT MPG','amir'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','bima'),('GMII Filipi Jakarta','bima'),('GPS','bima'),('JAMES THOMASOUW','bima'),('KOOLPEOPLE','bima'),('MAJALAH FAKTA','bima'),('MILLIONAIRE BRAIN POWER INDONESIA','bima'),('PT NETMARKS INDONESIA','bima'),('PT. ANTIKA RAYA','bima'),('PT. BAMBANG DJAJA','bima'),('JAMU IBOE, PT','bima'),('PT. TRIMITRA LUMBA (RIVERSIDE)','bima'),('PT DAFASS INDONESIA','bima'),('MEGA SURYA ERATAMA, PT','bima'),('MIKATASA AGUNG, PT','bima'),('MITRACITRA MANDIRIOFFSET, PT','bima'),('NEW MINATEX, PT','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('PT. SATIVA RIA CENDANA','bima'),('RSK Sumber Glagah','reinhard'),('SUPARMA Tbk, PT','bima'),('REGULAR EXCHANGE GROUP','bima'),('PT. SATIVA GROUP','bima'),('Ria Restaurant','bima'),('RSUD PROF. Dr. MARGONO SOEKARJO','bima'),('RUMBA CLUB','bima'),('PT ARTHA PERMAI KENCANA','amir'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','bima'),('SMANU 1 GRESIK','bima'),('SMK ISLAM BATU','bima'),('TANDRA LAW OFFICE','bima'),('US ALUMNI OF SURABAYA','bima'),('WEB INDONESIA','bima'),('WISMILAK','bima'),('WISMILAK','bima'),('R DWIDJO KURNIAWAN','amir'),('STARTEL COMMUNICATION, PT','ketut'),('Abdillah Wicaksana Basri','amir'),('BREAKSHOT MULTI PLAYER GAME','dhani'),('PT DAFASS INDONESIA','amir'),('ANTAR MITRA SEMBADA, PT','dhani'),('CHOMSATUN','dhani'),('ANGGA DARMA PUTRI NING AYU ','amir'),('Sunarto Budiono',NULL),('Sunarto Budiono',NULL),('LIK MARGOMULYO','amir'),('PETRO GRAHA MEDIKA, PT',NULL),('PETRO GRAHA MEDIKA, PT','amir'),('KNT DUNIA, CV','amir'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)',NULL),('KNT DUNIA, CV','amir'),('LINDA OWEN WARDHANA','amir'),('RS WILLIAM BOOTH ','dhani'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT',NULL),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','bima'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','bima'),('PT MATAHARI PUTRA MAKMUR','ketut'),('WISMILAK','bima'),('PT. BENTONITE INDONESIA','bima'),('WISMILAK','bima'),('WISMILAK','bima'),('WISMILAK','bima'),('WISMILAK','bima'),('WISMILAK','bima'),('WISMILAK','bima'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','bima'),('KOOLPEOPLE','bima'),('PT NETMARKS INDONESIA','bima'),('PT NETMARKS INDONESIA','bima'),('PT NETMARKS INDONESIA','bima'),('TAKIRON INDONESIA, PT','bima'),('RSK Sumber Glagah','bima'),('AUTOGLYM','bima'),('AUTOGLYM','bima'),('PT. PADI INTERNET','bima'),('PT. PADI INTERNET','bima'),('MIKATASA AGUNG, PT','bima'),('MIKATASA AGUNG, PT','bima'),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)','bima'),('JAMES THOMASOUW','bima'),('JAMES THOMASOUW','bima'),('PT HRL INTERNASIONAL','bima'),('PT. WATTARI TERANG ABADI','bima'),('TIANGAPI (MR. YULIANSUN)','bima'),('OLYMPIC SPRINGBED','bima'),('PT. FUBORU INDONESIA','bima'),('MALEEQA MUSLIM WEAR','bima'),('CV. GLOBAL INC','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('PT HRL INTERNASIONAL','reinhard'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('STEFANUS GUNAWAN','bima'),('PT. NUSA TOYOTETSU ENGINEERING','bima'),('CIPTA JAYA MEDIKA, PT','bima'),('PT. SUKO MITRA SEJATI','bima'),('PT. UNINEXUS INDONESIA','bima'),('PT. EFFERTECH','bima'),('PT. INDOPIPE ','bima'),('CV. JARDINE HOUSE PARTNER','bima'),('PT. HARSONO HERMANTO STRATEGIC CONSULTING','bima'),('CV. INLINE','bima'),('SDK ST XAVERIUS','dhani'),('YULIA ARIEF (DANIEL)','amir'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','ketut'),('GRAHA MULTI BINTANG, PT','dhani'),('GRAHA MULTI BINTANG, PT',NULL),('KUKUH TRIATNO KUSUMA ','dhani'),('PROFESCIPTA WAHANATEHNIK,PT','ketut'),('LOUIS GERALDO','bima'),('LOUIS GERALDO','bima'),('STEFANUS GUNAWAN','bima'),('SUPARMA Tbk, PT','bima'),('PT. CITARASA SUKSES','bima'),('SUMATERA HOMESTAY','ketut'),('CV RAMAYANA PUTRA MOTOR (Surabaya)','dhani'),('FAKHRUDDIN','ketut'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('GRAHA MULTI BINTANG, PT','dhani'),('ADI SUSANTO','amir'),('RUDY SUGIHARTO','amir'),('TAN STEFAN OKANTJANDRA ','amir'),('WIDI TRI HATMOKO','amir'),('ALBERT PASTRIONO TANDRA ','amir'),('M MIFTAKHUL RIZAL ','amir'),('JAMES ARTHUR PAKASI ','amir'),('KARSONO SETIOKUSUMO','amir'),('GRAHA MULTI BINTANG, PT','dhani'),('KUKUH WAHYU PUTRANTO','amir'),('KRISTANTO WICAKSONO','amir'),('GEREJA REFORMED INJILI INDONESIA (GRII)','amir'),('GEREJA REFORMED INJILI INDONESIA (GRII)','amir'),('CHRISTIAN JUWANTORO','amir'),('KRISTANTO WICAKSONO','amir'),('CICILIA WENYNATA TANUJAYA','ketut'),('DANIEL WIJAYA AMARTA','dhani'),('VICTOR AHOLIAB','amir'),('ABDILLAH WICAKSANA BASRI','amir'),('AGUS PURNOMO','ketut'),('MELYANA STEFANI','dhani'),('GEREJA BETHANY','ketut'),('GEREJA BETHANY','ketut'),('PG RAJAWALI I','amir'),('GRAHA MULTI BINTANG, PT','dhani'),('ISPANJI PRATAMA','amir'),('DANIEL WIJAYA AMARTA','dhani'),('PD AIR BERSIH PROVINSI JATIM','dhani'),('TJOEK WAHYU SETYOADI','amir'),('PT PANIN SEKURITAS','amir'),('MITRA BALI INDAH (MITRA 10)','amir'),('BAGHDAD GAME','amir'),('BREAKSHOT MULTI PLAYER GAME','dhani'),('BREAKSHOT MULTI PLAYER GAME','dhani'),('BREAKSHOT MULTI PLAYER GAME','dhani'),('D\'AUTHIZT MPG','amir'),('D\'AUTHIZT MPG','amir'),('D\'AUTHIZT MPG','amir'),('DWAN CYBERGAMES','dhani'),('DWAN CYBERGAMES','dhani'),('DWAN CYBERGAMES','dhani'),('DWAN CYBERGAMES','dhani'),('ESA NET (BAMBANG MEI SANTOSO)','dhani'),('LUNAR ZONE ONLINE','dhani'),('LYNX NET','ketut'),('LYNX NET','ketut'),('LYNX NET','ketut'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)','amir'),('MATRIX RELOADED','amir'),('MATRIX RELOADED','amir'),('MATRIX RELOADED','amir'),('MATRIX RELOADED','amir'),('ONLINE MEDIA GAMES','dhani'),('ONLINE MEDIA GAMES','dhani'),('RICKYNET','dhani'),('RICKYNET','dhani'),('SURF N PLAY','amir'),('SURF N PLAY','amir'),('SNIPER','ketut'),('SNIPER','ketut'),('SNIPER','ketut'),('SNIPER','ketut'),('SNIPER','ketut'),('SNIPER','ketut'),('SNIPER','ketut'),('SNIPER','ketut'),('SMART GAME CENTER','amir'),('SMART GAME CENTER','amir'),('SMART GAME CENTER','amir'),('TOP ONE','dhani'),('TOP ONE','dhani'),('TOP ONE','dhani'),('TOP ONE','dhani'),('TOP ONE','dhani'),('TOP ONE','dhani'),('TOP ONE','dhani'),('WARLOCK ONLINE','amir'),('ZAGA MULTIPLAYER GAME','ketut'),('ZAGA MULTIPLAYER GAME','ketut'),('2 ETERNITY MULTI PLAYER GAME','dhani'),('2 ETERNITY MULTI PLAYER GAME','dhani'),('RIYAN PUTRA TJANDRA','amir'),('PT HASIL RIMBA JAYA','amir'),('GEREJA BETHANY','ketut'),('BETHANY YOUTH CENTRE','ketut'),('BINTANG-NET','amir'),('PT PADMATIRTA WISESA','dhani'),('ALBERT THIODORIS ','amir'),('ADHI KARYA, PT','amir'),('PT ARTHAWENASAKTI GEMILANG','Siswanto'),('PT ARTHAWENASAKTI GEMILANG','Siswanto'),('BUDI LOEKITO','amir'),('BIANDA HALIM (LAM WEN FUNG)','dhani'),('PT BEON INTERMEDIA','amir'),('BAMBANG WIJANARKO','dhani'),('BAMBANG WIJANARKO','dhani'),('PT BOGA REMBILAN (DOME CAFE)',NULL),('PT BOGA REMBILAN (DOME CAFE)','ketut'),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)','ketut'),('CIPTO DIHARTO (WEB WAHANA WISATA)','amir'),('CHANDRA ELEKTRONIK','ketut'),('CHANDRA ELEKTRONIK','ketut'),('PT DAFASS INDONESIA','amir'),('PT DIGITAL MUSIC FACTORY','ketut'),('PT DIGITAL MUSIC FACTORY','ketut'),('CIPTA JAYA MEDIKA, PT','ketut'),('ERNI LISAWATI','ketut'),('PT ELSON BERNARDI','dhani'),('PT ELSON BERNARDI','dhani'),('PT ELSON BERNARDI','dhani'),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)','amir'),('PT GLOBAL WAY','dhani'),('GRAHA SAMARA, PT  (ARTOTEL)','amir'),('GADING MURNI, PT','amir'),('PT GD INDONESIA','amir'),('PT GELORA DJAJA','ketut'),('PT GELORA DJAJA','ketut'),('PT GAWIH JAYA','ketut'),('PT GAWIH JAYA','ketut'),('GEREJA REFORMED INJILI INDONESIA (GRII)','amir'),('GEREJA REFORMED INJILI INDONESIA (GRII)','amir'),('GEREJA REFORMED INJILI INDONESIA (GRII)','amir'),('CV GLOBAL SOLUSI MANDIRI (RALSTON)','ketut'),('GRAHA CHALA INDONESIA, PT  (TRS DINER)','ketut'),('PT HASWIN HIJAU PERKASA','amir'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','ketut'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','ketut'),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)','ketut'),('PT HYPERNET INDODATA (PHAROS)','ketut'),('PT HYPERNET INDODATA (UNITED BIKE)','ketut'),('PT INDO VEGETABLE OIL INDUSTRY','amir'),('PT INTEGRA  ASP','ketut'),('PT KAPANLAGI DOTCOM NETWORKS','ketut'),('IELENNA SUMAMPOW','ketut'),('IELENNA SUMAMPOW','ketut'),('IGOR\'S PASTRY','amir'),('IGOR\'S PASTRY','amir'),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)','ketut'),('PT JASPIS','ketut'),('PT JASPIS','ketut'),('PT JATIM TAMAN STEEL','amir'),('PT JATIM TAMAN STEEL','amir'),('PT JATIM TAMAN STEEL','amir'),('SOMAGEDE INDONESIA, PT','Thomas'),('PT. SARANA MEDIA SELARAS (SMS ABADI)','Thomas'),('ANDALAS MEDIA INFORMATIKA , PT','Thomas'),('PT KING HALIM JEWELERY','ketut'),('PT KING HALIM JEWELERY','ketut'),('PT KING HALIM JEWELERY','ketut'),('PT KING HALIM JEWELERY','ketut'),('LIM SANJAYA SUNDJOTO ','dhani'),('CV MIXMEDIA','ketut'),('PT MATAHARI PUTRA MAKMUR','ketut'),('MEGA SURYA ERATAMA, PT','ketut'),('MIKATASA AGUNG, PT','ketut'),('MIKATASA AGUNG, PT','ketut'),('MITRACITRA MANDIRIOFFSET, PT','ketut'),('PT MULTI MAYAKA','amir'),('PT MULTI MAYAKA','amir'),('PT MULTI MAYAKA','amir'),('PT MOCOPLUS TECHNOLOGY','ketut'),('PT MOCOPLUS TECHNOLOGY','ketut'),('PT MOCOPLUS TECHNOLOGY','ketut'),('PT MONSTERMOB INDONESIA','ketut'),('PT MONSTERMOB INDONESIA','ketut'),('PAULUS HALIM','dhani'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','ketut'),('PT WAHANA GITA (CHIPMUNK LENMARC)','ketut'),('MOCH FUAD HASAN','amir'),('DENNY SUGIARTO WIJAYA','amir'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','ketut'),('PT KREASINDO JAYATAMA SUKSES','amir'),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)','ketut'),('IUWASH - USAID','amir'),('RS ROYAL SURABAYA','amir'),('ERIC WIBISONO','amir'),('PT. JAVA CONSULTING INDONESIA','bima'),('PT. SWABINA GATRA','bima'),('CV. QODITEC','bima'),('RONNY NJOTO','bima'),('LOUIS GERALDO','bima'),('LOUIS GERALDO','bima'),('PT. NUANSA SEHAT ALAMI','bima'),('PT OVIS SENDNSAVE','ketut'),('PETRO GRAHA MEDIKA, PT','amir'),('PT PELAYARAN ALKAN ABADI','ketut'),('PT PELAYARAN ALKAN ABADI','ketut'),('PT PELAYARAN ALKAN ABADI','ketut'),('PETROLOG MULTI USAHA MANDIRI, PT','amir'),('PETROLOG MULTI USAHA MANDIRI, PT','amir'),('PT PUTRI GELORA JAYA','amir'),('PT PENGUIN TRADING','dhani'),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)','dhani'),('RS ROYAL SURABAYA','amir'),('CV RAMAYANA PUTRA MOTOR (Gresik)','dhani'),('RONI PRASETYA','ketut'),('PT SATIVA RIA CENDANA (Kombes)','ketut'),('PT RAJA FREIGHT EXPRESS','dhani'),('PT RAPINDO PLASTAMA','amir'),('SUPRAINTI LAND, PT  (ICBC CENTER)','ketut'),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)','ketut'),('PT SALAM PACIFIC INDONESIA LINES','ketut'),('CV SURYA INTI INDOCOM','ketut'),('SUPARMA Tbk, PT','ketut'),('SUPARMA Tbk, PT','ketut'),('SUPARMA Tbk, PT','ketut'),('SUPARMA Tbk, PT','ketut'),('SUPARMA Tbk, PT','ketut'),('SUPARMA Tbk, PT','ketut'),('STARTEL COMMUNICATION, PT','ketut'),('PT SAKALAGUNA SEMESTA','dhani'),('SATIVA KUTAI','ketut'),('PT SATIVA RIA CENDANA (Sutos Mall)','ketut'),('PT SATIVA RIA CENDANA (RESTO 9 - Mayjend)','ketut'),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)','ketut'),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)','Thomas'),('PT SURABAYA MEKABOX','amir'),('PT. SWABINA GATRA','ketut'),('PT. SWABINA GATRA','ketut'),('PT. SWABINA GATRA','ketut'),('PT. SWABINA GATRA','ketut'),('PT. SWABINA GATRA','ketut'),('SWADAYA GRAHA, PT','ketut'),('SWADAYA GRAHA, PT','ketut'),('TEDDY A SUDIRMAN (ROMIE)','amir'),('PT TRIDJAYA KARTIKA (CAFE APARTEMEN PUNCAK MARINA)','amir'),('PT TIRTAKENCANA TATAWARNA','ketut'),('PT VARIA USAHA BETON','ketut'),('PT VARIA USAHA BETON','ketut'),('PT VARIA USAHA BETON','ketut'),('PT VARIA USAHA BETON','ketut'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','ketut'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','ketut'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','ketut'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','ketut'),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT','ketut'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','ketut'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','ketut'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','amir'),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)','amir'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','dhani'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','dhani'),('ANTONIUS WIRAWAN','Thomas'),('ADRIWARA KRIDA, PT','Thomas'),('PT AUSTIN TECHNOLOGY TELEMATIKA','Thomas'),('ASIASOFT INDONESIA, PT','Thomas'),('BINARA GUNA MEDIKTAMA, PT  (RS PONDOK INDAH PURI INDAH)','Thomas'),('BROADBAND BROADCAST SERVICES INDONESIA, PT','Thomas'),('PT. WAHANA TRITUNGGAL PERKASA ','dhani'),('CAKRA STUDIO, CV  (www.mobistrimi.com)','Thomas'),('PT NETMARKS INDONESIA (PT CIKARANG PERKASA MANUFACTURING)',NULL),('PT NETMARKS INDONESIA (PT CIKARANG PERKASA MANUFACTURING)','Thomas'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','Thomas'),('CYBERPLUS MEDIA PRATAMA, PT','Thomas'),(' EQUNIX BUSINESS SOLUTIONS, PT','Thomas'),('NETMARKS INDONESIA, PT ( FERRO MAS DINAMIKA, PT - BEKASI)','Thomas'),('GLOBAL MEDIA TEKNOLOGI, CV','Thomas'),('GLOBAL MEDIA TEKNOLOGI, CV','Thomas'),('HAEGOONG INTERACTIVE, PT','Thomas'),('HANTAR LINTAS DATA, PT','Thomas'),('INTER.NET','Yanuar'),('TOKO ISTANA SANDANG MUTIARA','Yanuar'),('PT ELANG NUSANTARA INVESTAMA','Yanuar'),('ACER CUSTOMER SERVICE POINT MALANG (ACSP)','Yanuar'),('HERDIANTO','Thomas'),(' HEXING TECHNOLOGY, PT','Thomas'),(' HEXING TECHNOLOGY, PT','Thomas'),('PT. SETIA KARYA SENTOSA','bima'),('ADRIWARA KRIDA, PT','bima'),('RESTU WILUJENG','bima'),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH','bima'),('TAN RICHARD WESUTAN ','dhani'),('JESKA MITRA ENERGI, PT  (JME)','Thomas'),('JESKA MITRA ENERGI, PT  (JME)','Thomas'),('IFORTE SOLUSI INFOTEK, PT','Thomas'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Thomas'),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)','Thomas'),('INFINYS SYSTEM INDONESIA, PT','Thomas'),('INFINYS SYSTEM INDONESIA, PT','Thomas'),('INFINYS SYSTEM INDONESIA, PT','Thomas'),('INFINYS SYSTEM INDONESIA, PT','Thomas'),('INFINYS SYSTEM INDONESIA, PT','Thomas'),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)','Thomas'),('JAYA TATA TELEKOM, PT  (JATAKOM)','Thomas'),('JURAGAN.NET','Thomas'),('KAJIMA INDONESIA, PT','Thomas'),('KIWOOM SECURITIES INDONESIA, PT','Thomas'),('PT. KARYA ANUGERAH (AYOBU)','bima'),('KIWOOM SECURITIES INDONESIA, PT','Thomas'),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)','bima'),('WISMILAK','bima'),('KANTOR IMIGRASI KELAS II JEMBER','bima'),('SMP KATOLIK AGELUS CUSTOS II','bima'),('LINTAS NIAGA, PT (JAKARTA)','amir'),('GRAHA SAMARA, PT  (ARTOTEL)','amir'),('NETMARKS INDONESIA, PT  (YAMAHA PULO GADUNG) ','Thomas'),('PT NETMARKS INDONESIA','Thomas'),('PT. KOMPAS CYBER MEDIA','amir'),(' INFO MOBILE NUSA MEDIA, PT  (IMOB)','Thomas'),('KOMUNITAS DEMOKRASI','Thomas'),('PRAKARSA KPU','Thomas'),('CAHAYA ANGKASA ABADI, PT','bima'),('CAHAYA ANGKASA ABADI, PT','bima'),('CAHAYA ANGKASA ABADI, PT','bima'),('GLOBAL EDUCATION CENTER','bima'),('KOMUNITAS DEMOKRASI','Thomas'),('MANTENBOSHI CREATIVE INDONESIA, PT','Thomas'),('MANTENBOSHI CREATIVE INDONESIA, PT','Thomas'),('NAVIGA TECH ASIA, PT','Thomas'),('ONELIFE INDONESIA, PT','Thomas'),(' PREMIER EQUITY FUTURES, PT','Thomas'),(' PREMIER EQUITY FUTURES, PT','Thomas'),('QUIROS NETWORK, PT','Thomas'),('QUIROS NETWORK, PT','Thomas'),('RANTISIA ABADI UTAMA, CV','Thomas'),('RANTISIA ABADI UTAMA, CV','Thomas'),(' REGAWA MOBINDO KREASI NUSA, PT','Thomas'),(' REGAWA MOBINDO KREASI NUSA, PT','Thomas'),(' REGAWA MOBINDO KREASI NUSA, PT','Thomas'),('NETMARKS INDONESIA, PT  ( SAKURA)','Thomas'),('SOMAGEDE INDONESIA, PT','Thomas'),('SPACE NET INDONESIA, PT','Thomas'),('TPIL LOGISTICS, PT','Thomas'),('KURNIA NET ','Yanuar'),('TPIL LOGISTICS, PT','Thomas'),('LAMPU MERAH NET','Yanuar'),('D3 MITEK UNIVERSITAS BRAWIJAYA','Yanuar'),('MM NET','Yanuar'),('X-TRONIK','Yanuar'),('WE-NET','Yanuar'),('SEVEN TRONIK','Yanuar'),('TAUFIK HIDAYAT','Yanuar'),('SUHARIONO','Yanuar'),('SKY NET','Yanuar'),('SEVEN ONLINE GAME','Yanuar'),('RUDY IKSANTO','Yanuar'),('REDISA','solikin'),('ROBBY LUKITO ','dhani'),('BFI FINANCE INDONESIA Tbk, PT','Yanuar'),('KOSMETIKAMA SUPER INDAH, PT','Yanuar'),('OSITHOK','Yanuar'),('MAN 3 MALANG','Yanuar'),('JIMMY RUSDI','Yanuar'),('INFERNO','Yanuar'),('IHYA ULUMUDDIN','Yanuar'),('MATRADATA INFORMATIKA, CV','Yanuar'),('KRISTO RADION PURBA','Yanuar'),('PUTRA BINTANG TIMUR LESTARI, PT','Yanuar'),('SD MANDALA  II','amir'),('LINTAS NIAGA, PT ( SURABAYA)','amir'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','bima'),('SDK SANTA ANGELA','bima'),('PT MESIN KASIR ONLINE','dhani'),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ','ketut'),('IRWANTO ALIM','amir'),('SEVEN WORLD TOURS','amir'),('PT KURNIA ANGGUN','ketut'),('PT KURNIA ANGGUN','ketut'),('PT KURNIA ANGGUN','ketut'),('PT KURNIA ANGGUN','ketut'),('PT KURNIA ANGGUN','ketut'),('SMK MUHAMMADIYAH 1 GRESIK','amir'),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)','ketut'),('PT RAPINDO PLASTAMA','amir'),('CV MANDIRI UNICANE','ketut'),('BUDI LOEKITO','amir'),('BUDI LOEKITO','amir'),('BUDI LOEKITO','amir'),('BIANDA HALIM (LAM WEN FUNG)','dhani'),('THIO RUDY HARYANTO','dhani'),('PT HASWIN HIJAU PERKASA','amir'),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)','amir'),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)','dhani'),('UD BERKAT JAYA','amir'),('PT.BILKA','amir'),('PT.BILKA','amir'),('PT BINTANG RUBERINDO','amir'),('MENARAMEGAH (Mr. Yuliansun)','bima'),('PT. TRENDWOOD','bima'),('GMII FILIPI JAKARTA','bima'),('SWADAYA GRAHA, PT','bima'),('JAVA PARAGON HOTEL & RESIDENCES','bima'),('KETUT ARIANA','bima'),('ONE TEAM GLOBAL','bima'),('GRAHA MULTI BINTANG, PT','bima'),('WISMILAK','bima'),('RSK SUMBER GLAGAH PACET','bima'),('PT. KENDALI PARAMITA','bima'),('CV. JASATECH INFORMATIKA','bima'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','dhani'),('CV. TRISTAR CHEMICALS','bima'),('PT. DEMACITRA INTERNUSA','bima'),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES','bima'),('PT. EVARINDO MEGA MAKMUR','bima'),('CV. GLOBAL LOGISTIC','bima'),('ADHI KARYA, PT','bima'),('PT. LIGHTING SOLUTION','bima'),(' BINTANG LIMA, PT','bima'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('PT INTEGRA ASP','ketut'),('YOGI GUNAWAN','dhani'),('MULTIPLAST INDO MAKMUR, PT','amir'),('GLOBAL TRADING SOLUTION, PT','amir'),('TRIDJAYA KARTIKA, PT (MART POINT)','amir'),('EDWIN YAPETER','bima'),('EDWIN YAPETER','bima'),('ERMA SUPPLIER','bima'),('CV. ARTHA BOOK CEMERLANG','bima'),('PT. AGRIPRO INDONESIA','bima'),('BANGUN ASRI PERSADA','bima'),('DINAS TENAGA KERJA KABUPATEN GRESIK','bima'),('SAMUDERA MAHKOTA BEACH, PT','amir'),('NOVITA PRASETYA','dhani'),('PT. Green Energy Natural gas ','dhani'),('PT. SURABAYA COUNTRY',NULL),('PT. SURABAYA COUNTRY','dhani'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','dhani'),('YAYASAN PENDIDIKAN KRISTEN GLORIA','dhani'),('ARYA SUGIETA MULYONO','dhani'),('ROLAS NUSANTARA MANDIRI','amir'),('IGOR\'S PASTRY','amir'),('MULTIPLAST INDO MAKMUR, PT','amir'),('MULTIPLAST INDO MAKMUR, PT','amir'),('PT BEON INTERMEDIA','amir'),('CAHAYA GUNUNG JATI, PT','amir'),('ALBERT THIODORIS ','amir'),('PT SURABAYA MEKABOX','amir'),('PAULUS TJOKRO WIJOYO','amir'),('ROBIN WIDOYO','amir'),('ROBIN WIDOYO','amir'),('GRAHA MULTI BINTANG, PT','dhani'),('24 KTV & LOUNGE','dhani'),('ANTAR MITRA SEMBADA, PT','dhani'),('SUROPATI CAHAYA TIMUR, PT','dhani'),('PT. Prime Energy Supply ','dhani'),('GEREJA KRISTEN JAWI WETAN-NGAGEL ','dhani'),('PT. WONOKOYO JAYA  CORPORINDO','dhani'),('Koperasi Tunas Arindo','Yanuar'),('Delta Pratama Balongpanggang',NULL),('Delta Pratama Kedungpring','Yanuar'),('Delta Pratama Paciran','Yanuar'),('Delta Pratama Sukodadi','Yanuar'),('Delta Pratama Lamongan','Yanuar'),('Delta Pratama Soko','Yanuar'),('Delta Pratama Tuban','Yanuar'),('Delta Pratama Tikung','Yanuar'),('Delta Pratama Rengel','Yanuar'),('Delta Pratama Merakurak','Yanuar'),('Virus Net','Yanuar'),('Randha Net','Yanuar'),('PUTRA BINTANG TIMUR LESTARI, PT','Yanuar'),('ESKAINET','Yanuar'),('DIAN ABADI CELL','Yanuar'),('KEVIN PONTHY ','Yanuar'),('ALBERT LEONARD ','Yanuar'),('SOMAGEDE INDONESIA, PT','Thomas'),('IFORTE SOLUSI INFOTEK, PT','Thomas'),(' HEXING TECHNOLOGY, PT','Thomas'),('KIWOOM SECURITIES INDONESIA, PT','Thomas'),(' REGAWA MOBINDO KREASI NUSA, PT','Thomas'),('TIMUR KENCANA','Thomas'),('TRANS INDONESIA NETWORK','Thomas'),('EQUITY SECURITIES INDONESIA, PT','Thomas'),('PT. MUNTJUL DIAMOND','dhani'),('3Arena Futsal','amir'),('Daniel Kristanto','amir'),('MATAHARI ARTHA ABADI, PT','amir'),('PETRO JORDAN ABADI, PT','ketut'),('Test Malang',NULL),('GRAHA SAMARA, PT  (ARTOTEL)','amir'),('BREAKSHOT MULTI PLAYER GAME','dhani'),('KREATIGO SOLUTIVE PARTNER, CV','dhani'),('YODANET','yudi'),('PT. ESA ZONA EKSPRES','yudi'),('PRIMAGAMA (PERAK)','yudi'),('TOKO VIRGO','yudi'),('BERKAT ABBA INDONESIA, PT','yudi'),('INSAN CENDEKIA, CV','yudi'),('NAILANET','yudi'),('KSP ADIYATRA UTAMA','yudi'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','yudi'),('DAKWAH INTI MEDIA, PT (TV 9)','yudi'),('JESSIE ADHISTIA ','yudi'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','yudi'),('SUSHI TEI SURABAYA, PT','dhani'),('SEKAR PRIMA ABADI, PT','Thomas'),('PT. Dovechem Maspion Terminal ','dhani'),('BIOMETRIC CITRA SOLUSI, PT','amir'),('GARRY CHEN, Mr','amir'),('GADING MURNI, PT (Manukan)','amir'),('PT. MUNTJUL DIAMOND','dhani'),('NOVITA PRASETYA','dhani'),('PT ELSON BERNARDI','dhani'),('Hanny Kurniawan Suprajaya ','dhani'),('SEKAR PRIMA ABADI, PT','Thomas'),('BANGUN ABADI TEKNOLOGI INDONESIA, PT','Thomas'),('LIK MARGOMULYO','amir'),('MULTIPLAST INDO MAKMUR, PT','amir'),('MULTIPLAST INDO MAKMUR, PT','amir'),('PETRO GRAHA MEDIKA, PT','amir'),('RS ROYAL SURABAYA','amir'),('LINTAS NIAGA, PT ( SURABAYA)','amir'),('IUWASH - USAID','amir'),('ADHI KARYA, PT','amir'),('ADHI KARYA, PT','amir'),('PT INDO VEGETABLE OIL INDUSTRY','amir'),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)','amir'),('SUPRAINTI LAND, PT  (ICBC CENTER)','amir'),('BASELINE COMMUNICATE (BC TRACK)',NULL),('BASELINE COMMUNICATE (BC TRACK)','Thomas'),('PARADISE PERKASA',NULL),('PARADISE PERKASA','Thomas'),('KAJIMA INDONESIA, PT','Thomas'),('IWAN SULISTIANTO','Thomas'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','yudi'),('JESSIE ADHISTIA ','yudi'),('KARYA MITRA BERSAMA, PT','yudi'),('IMEDIA CIPTA, PT','yudi'),('CHIRO FIRST INDONESIA, PT','yudi'),('CONTINENTS SOURCING ENTERPRISE LTD','yudi'),('PAULUS OTTO HARMAN','yudi'),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)','yudi'),('SINAR PULAU SERIBU, PT','dhani'),('PT. MULTI BETON KARYA MANDIRI','yudi'),('PT. WONOKOYO JAYA  CORPORINDO','dhani'),('JENNY RACHMAN ','yudi'),('JESSIE ADHISTIA ','yudi'),('GEOSPASIA WAHANA JAYA, PT','yudi'),('PT. ESA ZONA EKSPRES','yudi'),('STEPHEN LEONARD','yudi'),('PT. MAHAGHORA','yudi'),('PT. MAHAGHORA','yudi'),('Indra','dhani'),('PT. MAHAGHORA','yudi'),('PT. ROYAL STANDARD','yudi'),('PT. SINMA LINES','yudi'),('ISWAHJU SOEBAGIJO','yudi'),('PIAZZA ITALIA','amir'),('MULTIPLAST INDO MAKMUR, PT','amir'),('Singapore National Academy','amir'),('Pulau Jaya Mandiri, PT','amir'),('LPJK','dhoni'),('M qauzar','dhoni'),('PUTRA LAUTAN SEJAHTERA PT','dhoni'),('WASKAWAN SUTANTO','dhoni'),('PT. WAHANA TRITUNGGAL PERKASA ','dhani'),('BBTKLPP',NULL),('BBTKLPP','dhoni'),('PT. Eloda Mitra ','dhani'),('PT ELSON BERNARDI','dhani'),('SEKAR BUMI, PT','dhoni'),('RAMA MANDIRI BANGKIT ABADI, PT','dhoni'),('AUW ADE AUYONG','dhani'),('M91 RELOAD','dhani'),('PT. DINAMIKA MAKMUR SENTOSA ','dhani'),('PT. SUBUR BUANA RAYA','yudi'),('PT. SINMA LINES','yudi'),('KOMUNITAS DEMOKRASI','Thomas'),('TOKO ASIA GOLF','yudi'),('ROBERT GUNAWAN','yudi'),('PT. MAHAGHORA','yudi'),('HERRI PRIJANTO','yudi'),('HERRI PRIJANTO','yudi'),('JOVITA HADI SUWITO','yudi'),('PT. UNINET MEDIA SAKTI','yudi'),('VINCENTIUS CHRISTOFAN','yudi'),('DEVIN EFENDI','yudi'),('JESSIE ADHISTIA ','yudi'),('MELFORD DHARMAWAN','yudi'),('TOKO VIRGO','yudi'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','yudi'),('PT. DOLE FOOD INDONESIA','yudi'),('PT. TLATAH GEMA ANUGRAH','yudi'),('PT. BENTENG PERSADA MULTINDO','yudi'),('HAEGOONG INTERACTIVE, PT','Thomas'),('SEKAR PRIMA ABADI, PT','Thomas'),('CITRA GEMILANG OTOMOTIF, PT (MASERATTI)','Thomas'),('EVERYDAY SMART HOTEL','Thomas'),('PT. AREK SURABAYA TELEVISI JATIM','yudi'),('PT. MAHAGHORA','yudi'),('BERKAT ABBA INDONESIA, PT','yudi'),('INSAN CENDEKIA, CV','yudi'),('Test Malang','ketut'),('P.Yuseen ( Pak Rahmadi )','solikin'),('PT.Essilor Indonesia',NULL),('PT.Essilor Indonesia','reinhard'),('KIWOOM SECURITIES INDONESIA, PT','Thomas'),('SUHARIONO','Yanuar'),('SUHARIONO','Yanuar'),('SARANA MEDIA SELARAS (SMS) ABADI','Thomas'),('REDISA','solikin'),('REDISA','solikin'),('NOTARIS MAYAHASANAH',NULL),('SUCOFINDO - SBU GOVERMENT','Thomas'),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)','Thomas'),('FAJAR DIRGANTARA','Thomas'),('PT. BORWITA INDAH','yudi'),('The British Institute ( TBI )',NULL),('TAN SAMUEL KRISTANTO','yudi'),('PT. MELILEA INTERNATIONAL INDONESIA','yudi'),('PT. UNINET MEDIA SAKTI','yudi'),('tes',NULL),('tes','reinhard'),('tes','reinhard'),('MIMI SCHOOL','yudi'),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)','yudi'),('MELFORD DHARMAWAN','yudi'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','yudi'),('BILLY SAPUTRA SUSANTO','yudi'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','yudi'),('PT. NUSA RAYA CIPTA','yudi'),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)','yudi'),('PT. MULTI BETON KARYA MANDIRI','yudi'),('PT. MENTARI SEJATI PERKASA ','dhani'),('PT. MENTARI SEJATI PERKASA ','dhani'),('PT. WONOKOYO JAYA  CORPORINDO','dhani'),('TAN RICHARD WESUTAN ','dhani'),('DAKWAH INTI MEDIA, PT (TV 9)','yudi'),('PENTAKOM','yudi'),('PT. MULTI BETON KARYA MANDIRI','yudi'),('PT. INTERNET PRATAMA INDONESIA','yudi'),('PT. UNINET MEDIA SAKTI','yudi'),('CHIRO FIRST INDONESIA, PT','yudi'),('Kreasi Energi Alam, PT (Ibu Regina)','amir'),('lima mandiri propertindo, pt',NULL),('Herman Chandra','dhani'),('lima mandiri propertindo, pt','dhoni'),('PT. Cipta Mandiri Konstruksi ','dhani'),('NASIONAL SYSPOLY INDONESIA, PT','amir'),('MAHADHIKA PERMATA WIJAYA PT','ketut'),('Scienwerk Studio ','dhani'),('SEANG WAN INDONESIA, PT','amir'),('PT MATAHARI PUTRA MAKMUR','ketut'),('ROBBY LUKITO ','dhani'),('TRANS PASIFIC ATLANTIC, PT','amir'),('indraco pt',NULL),('indraco pt','dhoni'),('Faliana (Hendro Asem)','amir'),('pita mas, pt',NULL),('pita mas, pt','dhoni'),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)','amir'),('PT Jaya Logam Perkasa','dwiwutomo'),('roto rooter, pt',NULL),('sari ruqindo,cv','dhoni'),('roto rooter, pt','dhoni'),('koprasi warga semen gresik',NULL),('koprasi warga semen gresik','dhoni'),('moor sukses internationa. pt',NULL),('moor sukses internationa. pt','dhoni'),('PT. Padmatirta Wisesa ',NULL),('PT. Padmatirta Wisesa ','dhani'),('Wawan Hermanto ','dhani'),('PT. Padmatirta Wisesa ','dhani'),('PT. Bina Rasano Engineering ','dhani'),('IMEDIA CIPTA, PT','yudi'),('PT Sandi Bahari Nusantara','dwiwutomo'),('THIO RUDY HARYANTO','amir'),('DANIEL KURNIAWAN','amir'),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)','amir'),('GRII COLOCATION','amir'),('LABEL JAYA PRATAMA','amir'),('FIBER NETWORKS INDONESIA (HARVEST)','amir'),('WARNATAMA CEMERLANG','amir'),('TJAKRINDO MAS - DIVISI PIPA PVC','amir'),('TJAKRINDO MAS DIVISI OFFICE','amir'),('TJAKRINDO MAS - DIVISI KAYU','amir'),('PADIMAS INDAH, PT','amir'),('ADICITRA BHIRAWA, PT','amir'),('graha melandas/ice hill',NULL),('graha melandas/ice hill','dhoni'),('PT. Yamamori Indonesia ','dhani'),('CV. Sarana Multi Transidno ','dhani'),('PT. Boga Lima Radja Inti (Sushi Tei Group) ','dhani'),('lautan dana securindo, pt',NULL),('lautan dana securindo, pt','dhoni'),('PT. Apik Komunika Indonesia ','dhani'),('GRAHA BUNDER UTAMA, PT','amir'),('Forestreet Cafe (Ibu Claudia)','amir'),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)','amir'),('TOKO VIRGO','yudi'),('KARYA MITRA BERSAMA, PT','yudi'),('sumber daya abadi, pt',NULL),('sumber daya abadi, pt','reinhard'),('sumber daya abadi, pt','dhoni'),('topanugrah multindo, CV','dhoni'),('topanugrah multindo, CV',NULL),('WELLY HERMANTO','yudi'),('Hanny Kurniawan Suprajaya ','dhani'),('CONTINENTS SOURCING ENTERPRISE LTD','yudi'),('PT. ADITYA SARANA GRAHA','yudi'),('FERRY SOEPRAPTO','yudi'),('CV. BERKAT WIDA ABADI','yudi'),('GEOSPASIA WAHANA JAYA, PT','yudi'),('WELLY HERMANTO','yudi'),('CV. PILAR KENCANA STEEL','yudi'),('CV. DORKAS INDONESIA','yudi'),('PT. MELILEA INTERNATIONAL INDONESIA','yudi'),('GEREJA BETHANY NGINDEN','yudi'),('TOKO ASIA GOLF','yudi'),('PT. SUBUR BUANA RAYA','yudi'),('ISWAHJU SOEBAGIJO','yudi'),('ROBERT GUNAWAN','yudi'),('VINCENTIUS CHRISTOFAN','yudi'),('PT. ROYAL STANDARD','yudi'),('STEPHEN LEONARD','yudi'),('PT. SINMA LINES','yudi'),('CV. DORKAS INDONESIA','yudi'),('PT. MAHAGHORA','yudi'),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ','dhani'),('CV. 77 ADVERTISING SUKSES BERSAMA','yudi'),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL','yudi'),('PT. DANTRINDO','yudi'),('PT. DOLE FOOD INDONESIA','yudi'),('DEVIN EFENDI','yudi'),('PT. ESA ZONA EKSPRES','yudi'),('JOVITA HADI SUWITO','yudi'),('PT. BENTENG PERSADA MULTINDO','yudi'),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)','yudi'),('PT. DANTRINDO','yudi'),('TAN SAMUEL KRISTANTO','yudi'),('PT. BORWITA INDAH','yudi'),('INSAN CENDEKIA, CV','yudi'),('PT. NUSA RAYA CIPTA','yudi'),('PT. AREK SURABAYA TELEVISI JATIM','yudi'),('PT. Universal Cellular Engineering (PT. UCE Indonesia)','yudi'),('PT. REKAJASA AKSES (ACSATA)','yudi'),('PT. REKAJASA AKSES (ACSATA)','yudi'),('PT. MELILEA INTERNATIONAL INDONESIA','yudi'),('MIMI SCHOOL','yudi'),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)','yudi');
/*!40000 ALTER TABLE `tmptbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmptbl2`
--

DROP TABLE IF EXISTS `tmptbl2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmptbl2` (
  `clientname` varchar(200) DEFAULT NULL,
  `id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmptbl2`
--

LOCK TABLES `tmptbl2` WRITE;
/*!40000 ALTER TABLE `tmptbl2` DISABLE KEYS */;
INSERT INTO `tmptbl2` VALUES ('ANTODINA',27),('AUTOGLYM',27),('BUDIYANTO KARWELO',27),('COLORS RADIO',27),('Cowholdings',27),('D\'AUTHIZT MPG',8),('YAYASAN PENDIDIKAN KRISTEN GLORIA',27),('GMII Filipi Jakarta',27),('GPS',27),('JAMES THOMASOUW',27),('KOOLPEOPLE',27),('MAJALAH FAKTA',27),('MILLIONAIRE BRAIN POWER INDONESIA',27),('PT NETMARKS INDONESIA',27),('PT. ANTIKA RAYA',27),('PT. BAMBANG DJAJA',27),('JAMU IBOE, PT',27),('PT. TRIMITRA LUMBA (RIVERSIDE)',27),('PT DAFASS INDONESIA',27),('MEGA SURYA ERATAMA, PT',27),('MIKATASA AGUNG, PT',27),('MITRACITRA MANDIRIOFFSET, PT',27),('NEW MINATEX, PT',27),('PT. PADI INTERNET',27),('PT. SATIVA RIA CENDANA',27),('RSK Sumber Glagah',10),('SUPARMA Tbk, PT',27),('REGULAR EXCHANGE GROUP',27),('PT. SATIVA GROUP',27),('Ria Restaurant',27),('RSUD PROF. Dr. MARGONO SOEKARJO',27),('RUMBA CLUB',27),('PT ARTHA PERMAI KENCANA',8),('BADAN AMIL ZAKAT LUWU TIMUR (BAZLUTIM)',27),('SMANU 1 GRESIK',27),('SMK ISLAM BATU',27),('TANDRA LAW OFFICE',27),('US ALUMNI OF SURABAYA',27),('WEB INDONESIA',27),('WISMILAK',27),('R DWIDJO KURNIAWAN',8),('STARTEL COMMUNICATION, PT',9),('Abdillah Wicaksana Basri',8),('BREAKSHOT MULTI PLAYER GAME',13),('PT DAFASS INDONESIA',8),('ANTAR MITRA SEMBADA, PT',13),('CHOMSATUN',13),('ANGGA DARMA PUTRI NING AYU ',8),('LIK MARGOMULYO',8),('PETRO GRAHA MEDIKA, PT',8),('KNT DUNIA, CV',8),('LINDA OWEN WARDHANA',8),('RS WILLIAM BOOTH ',13),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT',27),('PT MATAHARI PUTRA MAKMUR',9),('PT. BENTONITE INDONESIA',27),('TAKIRON INDONESIA, PT',27),('RSK Sumber Glagah',27),('PT HRL INTERNASIONAL',27),('PT. WATTARI TERANG ABADI',27),('TIANGAPI (MR. YULIANSUN)',27),('OLYMPIC SPRINGBED',27),('PT. FUBORU INDONESIA',27),('MALEEQA MUSLIM WEAR',27),('CV. GLOBAL INC',27),('EDWIN YAPETER',27),('PT HRL INTERNASIONAL',10),('STEFANUS GUNAWAN',27),('PT. NUSA TOYOTETSU ENGINEERING',27),('CIPTA JAYA MEDIKA, PT',27),('PT. SUKO MITRA SEJATI',27),('PT. UNINEXUS INDONESIA',27),('PT. EFFERTECH',27),('PT. INDOPIPE ',27),('CV. JARDINE HOUSE PARTNER',27),('PT. HARSONO HERMANTO STRATEGIC CONSULTING',27),('CV. INLINE',27),('SDK ST XAVERIUS',13),('YULIA ARIEF (DANIEL)',8),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH',9),('GRAHA MULTI BINTANG, PT',13),('KUKUH TRIATNO KUSUMA ',13),('PROFESCIPTA WAHANATEHNIK,PT',9),('LOUIS GERALDO',27),('PT. CITARASA SUKSES',27),('SUMATERA HOMESTAY',9),('CV RAMAYANA PUTRA MOTOR (Surabaya)',13),('FAKHRUDDIN',9),('MATRIX ONLINE MULTIPLAYER (SUNARTO BUDIHONO)',8),('ADI SUSANTO',8),('RUDY SUGIHARTO',8),('TAN STEFAN OKANTJANDRA ',8),('WIDI TRI HATMOKO',8),('ALBERT PASTRIONO TANDRA ',8),('M MIFTAKHUL RIZAL ',8),('JAMES ARTHUR PAKASI ',8),('KARSONO SETIOKUSUMO',8),('KUKUH WAHYU PUTRANTO',8),('KRISTANTO WICAKSONO',8),('GEREJA REFORMED INJILI INDONESIA (GRII)',8),('CHRISTIAN JUWANTORO',8),('CICILIA WENYNATA TANUJAYA',9),('DANIEL WIJAYA AMARTA',13),('VICTOR AHOLIAB',8),('AGUS PURNOMO',9),('MELYANA STEFANI',13),('GEREJA BETHANY',9),('PG RAJAWALI I',8),('ISPANJI PRATAMA',8),('PD AIR BERSIH PROVINSI JATIM',13),('TJOEK WAHYU SETYOADI',8),('PT PANIN SEKURITAS',8),('MITRA BALI INDAH (MITRA 10)',8),('BAGHDAD GAME',8),('DWAN CYBERGAMES',13),('ESA NET (BAMBANG MEI SANTOSO)',13),('LUNAR ZONE ONLINE',13),('LYNX NET',9),('MATRIX RELOADED',8),('ONLINE MEDIA GAMES',13),('RICKYNET',13),('SURF N PLAY',8),('SNIPER',9),('SMART GAME CENTER',8),('TOP ONE',13),('WARLOCK ONLINE',8),('ZAGA MULTIPLAYER GAME',9),('2 ETERNITY MULTI PLAYER GAME',13),('RIYAN PUTRA TJANDRA',8),('PT HASIL RIMBA JAYA',8),('BETHANY YOUTH CENTRE',9),('BINTANG-NET',8),('PT PADMATIRTA WISESA',13),('ALBERT THIODORIS ',8),('ADHI KARYA, PT',8),('BUDI LOEKITO',8),('BIANDA HALIM (LAM WEN FUNG)',13),('PT BEON INTERMEDIA',8),('BAMBANG WIJANARKO',13),('PT BOGA REMBILAN (DOME CAFE)',9),('PT CATALYST SOLUSI INTEGRASI (BUMBLE BEE PRESCHOOL)',9),('CIPTO DIHARTO (WEB WAHANA WISATA)',8),('CHANDRA ELEKTRONIK',9),('PT DIGITAL MUSIC FACTORY',9),('CIPTA JAYA MEDIKA, PT',9),('ERNI LISAWATI',9),('PT ELSON BERNARDI',13),('FABES INTERNATIONAL, PT  (CAPITAL RESTAURANT)',8),('PT GLOBAL WAY',13),('GRAHA SAMARA, PT  (ARTOTEL)',8),('GADING MURNI, PT',8),('PT GD INDONESIA',8),('PT GELORA DJAJA',9),('PT GAWIH JAYA',9),('CV GLOBAL SOLUSI MANDIRI (RALSTON)',9),('GRAHA CHALA INDONESIA, PT  (TRS DINER)',9),('PT HASWIN HIJAU PERKASA',8),('PT HATSONSURYA ELECTRIC (HARTONO ELEKTRONIK)',9),('PT HYPERNET INDODATA (PHAROS)',9),('PT HYPERNET INDODATA (UNITED BIKE)',9),('PT INDO VEGETABLE OIL INDUSTRY',8),('PT INTEGRA  ASP',9),('PT KAPANLAGI DOTCOM NETWORKS',9),('IELENNA SUMAMPOW',9),('IGOR\'S PASTRY',8),('PT CATALYST SOLUSI INTEGRASI (PT JAYA LESTARI)',9),('PT JASPIS',9),('PT JATIM TAMAN STEEL',8),('SOMAGEDE INDONESIA, PT',40),('PT. SARANA MEDIA SELARAS (SMS ABADI)',40),('ANDALAS MEDIA INFORMATIKA , PT',40),('PT KING HALIM JEWELERY',9),('LIM SANJAYA SUNDJOTO ',13),('CV MIXMEDIA',9),('MEGA SURYA ERATAMA, PT',9),('MIKATASA AGUNG, PT',9),('MITRACITRA MANDIRIOFFSET, PT',9),('PT MULTI MAYAKA',8),('PT MOCOPLUS TECHNOLOGY',9),('PT MONSTERMOB INDONESIA',9),('PAULUS HALIM',13),('PT NETMARKS INDONESIA (PT FERRO MAS DINAMIKA - SIDOARJO)',9),('PT WAHANA GITA (CHIPMUNK LENMARC)',9),('MOCH FUAD HASAN',8),('DENNY SUGIARTO WIJAYA',8),('PT KREASINDO JAYATAMA SUKSES',8),('IUWASH - USAID',8),('RS ROYAL SURABAYA',8),('ERIC WIBISONO',8),('PT. JAVA CONSULTING INDONESIA',27),('PT. SWABINA GATRA',27),('CV. QODITEC',27),('RONNY NJOTO',27),('PT. NUANSA SEHAT ALAMI',27),('PT OVIS SENDNSAVE',9),('PT PELAYARAN ALKAN ABADI',9),('PETROLOG MULTI USAHA MANDIRI, PT',8),('PT PUTRI GELORA JAYA',8),('PT PENGUIN TRADING',13),('CV RAMAYANA PUTRA MOTOR (Sidoarjo)',13),('CV RAMAYANA PUTRA MOTOR (Gresik)',13),('RONI PRASETYA',9),('PT SATIVA RIA CENDANA (Kombes)',9),('PT RAJA FREIGHT EXPRESS',13),('PT RAPINDO PLASTAMA',8),('SUPRAINTI LAND, PT  (ICBC CENTER)',9),('PT SEKAWAN BHAKTI INTILAND (JAVA PARAGON HOTEL & RESIDENCE)',9),('PT SALAM PACIFIC INDONESIA LINES',9),('CV SURYA INTI INDOCOM',9),('SUPARMA Tbk, PT',9),('PT SAKALAGUNA SEMESTA',13),('SATIVA KUTAI',9),('PT SATIVA RIA CENDANA (Sutos Mall)',9),('PT SATIVA RIA CENDANA (RESTO 9 - Mayjend)',9),('PT SATNETCOM BALIKPAPAN (PT COATESHIRE INDONESIA)',9),('DEVERINDO INDOGRAHA RAYA, PT  (SOMERSET SURABAYA HOTEL & SERVICED RESIDENCE)',40),('PT SURABAYA MEKABOX',8),('PT. SWABINA GATRA',9),('SWADAYA GRAHA, PT',9),('TEDDY A SUDIRMAN (ROMIE)',8),('PT TRIDJAYA KARTIKA (CAFE APARTEMEN PUNCAK MARINA)',8),('PT TIRTAKENCANA TATAWARNA',9),('PT VARIA USAHA BETON',9),('WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES, PT',9),('YAMAHA YES GROUP (TJIO ANDREAS TJAHJO)',8),('YAYASAN PENDIDIKAN KRISTEN GLORIA',13),('ANTONIUS WIRAWAN',40),('ADRIWARA KRIDA, PT',40),('PT AUSTIN TECHNOLOGY TELEMATIKA',40),('ASIASOFT INDONESIA, PT',40),('BINARA GUNA MEDIKTAMA, PT  (RS PONDOK INDAH PURI INDAH)',40),('BROADBAND BROADCAST SERVICES INDONESIA, PT',40),('PT. WAHANA TRITUNGGAL PERKASA ',13),('CAKRA STUDIO, CV  (www.mobistrimi.com)',40),('PT NETMARKS INDONESIA (PT CIKARANG PERKASA MANUFACTURING)',40),('CITRA LANGGENG OTOMOTIF, PT (FERARRI)',40),('CYBERPLUS MEDIA PRATAMA, PT',40),(' EQUNIX BUSINESS SOLUTIONS, PT',40),('NETMARKS INDONESIA, PT ( FERRO MAS DINAMIKA, PT - BEKASI)',40),('GLOBAL MEDIA TEKNOLOGI, CV',40),('HAEGOONG INTERACTIVE, PT',40),('HANTAR LINTAS DATA, PT',40),('HERDIANTO',40),(' HEXING TECHNOLOGY, PT',40),('PT. SETIA KARYA SENTOSA',27),('ADRIWARA KRIDA, PT',27),('RESTU WILUJENG',27),('YAYASAN LEMBAGA PENDIDIKAN ISLAM AL HIKMAH',27),('TAN RICHARD WESUTAN ',13),('JESKA MITRA ENERGI, PT  (JME)',40),('IFORTE SOLUSI INFOTEK, PT',40),('INDONESIA KONSORSIUM INVESTAMA, PT  (IKI)',40),('INFINYS SYSTEM INDONESIA, PT',40),('NETMARKS INDONESIA, PT  (IHARA MANUFACTURE INDONESIA)',40),('JAYA TATA TELEKOM, PT  (JATAKOM)',40),('JURAGAN.NET',40),('KAJIMA INDONESIA, PT',40),('KIWOOM SECURITIES INDONESIA, PT',40),('PT. KARYA ANUGERAH (AYOBU)',27),('PT. SINAR ANGKASA RUNGKUT (CHIYODA)',27),('KANTOR IMIGRASI KELAS II JEMBER',27),('SMP KATOLIK AGELUS CUSTOS II',27),('LINTAS NIAGA, PT (JAKARTA)',8),('NETMARKS INDONESIA, PT  (YAMAHA PULO GADUNG) ',40),('PT NETMARKS INDONESIA',40),('PT. KOMPAS CYBER MEDIA',8),(' INFO MOBILE NUSA MEDIA, PT  (IMOB)',40),('KOMUNITAS DEMOKRASI',40),('PRAKARSA KPU',40),('CAHAYA ANGKASA ABADI, PT',27),('GLOBAL EDUCATION CENTER',27),('MANTENBOSHI CREATIVE INDONESIA, PT',40),('NAVIGA TECH ASIA, PT',40),('ONELIFE INDONESIA, PT',40),(' PREMIER EQUITY FUTURES, PT',40),('QUIROS NETWORK, PT',40),('RANTISIA ABADI UTAMA, CV',40),(' REGAWA MOBINDO KREASI NUSA, PT',40),('NETMARKS INDONESIA, PT  ( SAKURA)',40),('SPACE NET INDONESIA, PT',40),('TPIL LOGISTICS, PT',40),('REDISA',45),('ROBBY LUKITO ',13),('SD MANDALA  II',8),('LINTAS NIAGA, PT ( SURABAYA)',8),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)',27),('SDK SANTA ANGELA',27),('PT MESIN KASIR ONLINE',13),('PULAU JAYA MANDIRI, PT  (DANIEL PRANOTO) ',9),('IRWANTO ALIM',8),('SEVEN WORLD TOURS',8),('PT KURNIA ANGGUN',9),('SMK MUHAMMADIYAH 1 GRESIK',8),('SARANA MULTI TRANSINDO, CV (EMKL SARANABHAKTI TIMUR)',9),('CV MANDIRI UNICANE',9),('THIO RUDY HARYANTO',13),('RS MITRA KELUARGA WARU (PT ALPEN AGUNGRAYA)',8),('JAWA TRANS INDAH TRANSPORT, PT  (DJAWA INDAH)',13),('UD BERKAT JAYA',8),('PT.BILKA',8),('PT BINTANG RUBERINDO',8),('MENARAMEGAH (Mr. Yuliansun)',27),('PT. TRENDWOOD',27),('SWADAYA GRAHA, PT',27),('JAVA PARAGON HOTEL & RESIDENCES',27),('KETUT ARIANA',27),('ONE TEAM GLOBAL',27),('GRAHA MULTI BINTANG, PT',27),('RSK SUMBER GLAGAH PACET',27),('PT. KENDALI PARAMITA',27),('CV. JASATECH INFORMATIKA',27),('CV. TRISTAR CHEMICALS',27),('PT. DEMACITRA INTERNUSA',27),('PT. WIJAYA INDONESIA MAKMUR BICYCLE INDUSTRIES',27),('PT. EVARINDO MEGA MAKMUR',27),('CV. GLOBAL LOGISTIC',27),('ADHI KARYA, PT',27),('PT. LIGHTING SOLUTION',27),(' BINTANG LIMA, PT',27),('PT INTEGRA ASP',9),('YOGI GUNAWAN',13),('MULTIPLAST INDO MAKMUR, PT',8),('GLOBAL TRADING SOLUTION, PT',8),('TRIDJAYA KARTIKA, PT (MART POINT)',8),('ERMA SUPPLIER',27),('CV. ARTHA BOOK CEMERLANG',27),('PT. AGRIPRO INDONESIA',27),('BANGUN ASRI PERSADA',27),('DINAS TENAGA KERJA KABUPATEN GRESIK',27),('SAMUDERA MAHKOTA BEACH, PT',8),('NOVITA PRASETYA',13),('PT. Green Energy Natural gas ',13),('PT. SURABAYA COUNTRY',13),('ARYA SUGIETA MULYONO',13),('ROLAS NUSANTARA MANDIRI',8),('CAHAYA GUNUNG JATI, PT',8),('PAULUS TJOKRO WIJOYO',8),('ROBIN WIDOYO',8),('24 KTV & LOUNGE',13),('SUROPATI CAHAYA TIMUR, PT',13),('PT. Prime Energy Supply ',13),('GEREJA KRISTEN JAWI WETAN-NGAGEL ',13),('PT. WONOKOYO JAYA  CORPORINDO',13),('TIMUR KENCANA',40),('TRANS INDONESIA NETWORK',40),('EQUITY SECURITIES INDONESIA, PT',40),('PT. MUNTJUL DIAMOND',13),('3Arena Futsal',8),('Daniel Kristanto',8),('MATAHARI ARTHA ABADI, PT',8),('PETRO JORDAN ABADI, PT',9),('KREATIGO SOLUTIVE PARTNER, CV',13),('YODANET',14),('PT. ESA ZONA EKSPRES',14),('PRIMAGAMA (PERAK)',14),('TOKO VIRGO',14),('BERKAT ABBA INDONESIA, PT',14),('INSAN CENDEKIA, CV',14),('NAILANET',14),('KSP ADIYATRA UTAMA',14),(' INVESTASI HASIL SEJAHTERA, PT  ( MNC Land)',14),('DAKWAH INTI MEDIA, PT (TV 9)',14),('JESSIE ADHISTIA ',14),('SUSHI TEI SURABAYA, PT',13),('SEKAR PRIMA ABADI, PT',40),('PT. Dovechem Maspion Terminal ',13),('BIOMETRIC CITRA SOLUSI, PT',8),('GARRY CHEN, Mr',8),('GADING MURNI, PT (Manukan)',8),('Hanny Kurniawan Suprajaya ',13),('BANGUN ABADI TEKNOLOGI INDONESIA, PT',40),('GRAHA BINTANG TEKNIS, PT (Graha Indo Sound)',8),('SUPRAINTI LAND, PT  (ICBC CENTER)',8),('BASELINE COMMUNICATE (BC TRACK)',40),('PARADISE PERKASA',40),('IWAN SULISTIANTO',40),('KARYA MITRA BERSAMA, PT',14),('IMEDIA CIPTA, PT',14),('CHIRO FIRST INDONESIA, PT',14),('CONTINENTS SOURCING ENTERPRISE LTD',14),('PAULUS OTTO HARMAN',14),('GRAHA PERSADA MAS, PT  (HOTEL ZOOM)',14),('SINAR PULAU SERIBU, PT',13),('PT. MULTI BETON KARYA MANDIRI',14),('JENNY RACHMAN ',14),('GEOSPASIA WAHANA JAYA, PT',14),('STEPHEN LEONARD',14),('PT. MAHAGHORA',14),('Indra',13),('PT. ROYAL STANDARD',14),('PT. SINMA LINES',14),('ISWAHJU SOEBAGIJO',14),('PIAZZA ITALIA',8),('Singapore National Academy',8),('Pulau Jaya Mandiri, PT',8),('LPJK',12),('M qauzar',12),('PUTRA LAUTAN SEJAHTERA PT',12),('WASKAWAN SUTANTO',12),('BBTKLPP',12),('PT. Eloda Mitra ',13),('SEKAR BUMI, PT',12),('RAMA MANDIRI BANGKIT ABADI, PT',12),('AUW ADE AUYONG',13),('M91 RELOAD',13),('PT. DINAMIKA MAKMUR SENTOSA ',13),('PT. SUBUR BUANA RAYA',14),('TOKO ASIA GOLF',14),('ROBERT GUNAWAN',14),('HERRI PRIJANTO',14),('JOVITA HADI SUWITO',14),('PT. UNINET MEDIA SAKTI',14),('VINCENTIUS CHRISTOFAN',14),('DEVIN EFENDI',14),('MELFORD DHARMAWAN',14),('PT. LUMBA - LUMBA SERVINDO TOUR & TRAVEL',14),('PT. DOLE FOOD INDONESIA',14),('PT. TLATAH GEMA ANUGRAH',14),('PT. BENTENG PERSADA MULTINDO',14),('CITRA GEMILANG OTOMOTIF, PT (MASERATTI)',40),('EVERYDAY SMART HOTEL',40),('PT. AREK SURABAYA TELEVISI JATIM',14),('Test Malang',9),('P.Yuseen ( Pak Rahmadi )',45),('PT.Essilor Indonesia',10),('SARANA MEDIA SELARAS (SMS) ABADI',40),('SUCOFINDO - SBU GOVERMENT',40),('FAJAR DIRGANTARA',40),('PT. BORWITA INDAH',14),('TAN SAMUEL KRISTANTO',14),('PT. MELILEA INTERNATIONAL INDONESIA',14),('tes',10),('MIMI SCHOOL',14),('BILLY SAPUTRA SUSANTO',14),('PT. MEDIKA DERMA LESTARI (EMDEE SKIN CLINIC)',14),('PT. NUSA RAYA CIPTA',14),('PT. MENTARI SEJATI PERKASA ',13),('PENTAKOM',14),('PT. INTERNET PRATAMA INDONESIA',14),('Kreasi Energi Alam, PT (Ibu Regina)',8),('Herman Chandra',13),('lima mandiri propertindo, pt',12),('PT. Cipta Mandiri Konstruksi ',13),('NASIONAL SYSPOLY INDONESIA, PT',8),('MAHADHIKA PERMATA WIJAYA PT',9),('Scienwerk Studio ',13),('SEANG WAN INDONESIA, PT',8),('TRANS PASIFIC ATLANTIC, PT',8),('indraco pt',12),('Faliana (Hendro Asem)',8),('pita mas, pt',12),('SUMBER ANUGERAH UTAMA, PT (Hendrik Theodoroes)',8),('sari ruqindo,cv',12),('roto rooter, pt',12),('koprasi warga semen gresik',12),('moor sukses internationa. pt',12),('PT. Padmatirta Wisesa ',13),('Wawan Hermanto ',13),('PT. Bina Rasano Engineering ',13),('THIO RUDY HARYANTO',8),('DANIEL KURNIAWAN',8),('WAHANA DIAN KENTJANA (MIDTOWN HOTEL)',8),('GRII COLOCATION',8),('LABEL JAYA PRATAMA',8),('FIBER NETWORKS INDONESIA (HARVEST)',8),('WARNATAMA CEMERLANG',8),('TJAKRINDO MAS - DIVISI PIPA PVC',8),('TJAKRINDO MAS DIVISI OFFICE',8),('TJAKRINDO MAS - DIVISI KAYU',8),('PADIMAS INDAH, PT',8),('ADICITRA BHIRAWA, PT',8),('graha melandas/ice hill',12),('PT. Yamamori Indonesia ',13),('CV. Sarana Multi Transidno ',13),('PT. Boga Lima Radja Inti (Sushi Tei Group) ',13),('lautan dana securindo, pt',12),('PT. Apik Komunika Indonesia ',13),('GRAHA BUNDER UTAMA, PT',8),('Forestreet Cafe (Ibu Claudia)',8),('GLOBAL TRADING SOLUTION (IBU ENDANG RAHAYU)',8),('sumber daya abadi, pt',10),('sumber daya abadi, pt',12),('topanugrah multindo, CV',12),('WELLY HERMANTO',14),('PT. ADITYA SARANA GRAHA',14),('FERRY SOEPRAPTO',14),('CV. BERKAT WIDA ABADI',14),('CV. PILAR KENCANA STEEL',14),('CV. DORKAS INDONESIA',14),('GEREJA BETHANY NGINDEN',14),('PT. ENVIROMATE TECHNOLOGY INTERNATIONAL ',13),('CV. 77 ADVERTISING SUKSES BERSAMA',14),('PT. DANTRINDO',14),('CV. KARYA HIDUP SENTOSA (TRACTOR QUICK)',14),('PT. Universal Cellular Engineering (PT. UCE Indonesia)',14),('PT. REKAJASA AKSES (ACSATA)',14),('PT. INDONESIA MULTI COLOUR PRINTING (IMCP)',14);
/*!40000 ALTER TABLE `tmptbl2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trialofficers`
--

DROP TABLE IF EXISTS `trialofficers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trialofficers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trial_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trialofficers`
--

LOCK TABLES `trialofficers` WRITE;
/*!40000 ALTER TABLE `trialofficers` DISABLE KEYS */;
/*!40000 ALTER TABLE `trialofficers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trials`
--

DROP TABLE IF EXISTS `trials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `trialtype` varchar(1) DEFAULT '1' COMMENT '0 lama;1 baru',
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `startexecdate` datetime DEFAULT NULL,
  `endexecdate` datetime DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trials`
--

LOCK TABLES `trials` WRITE;
/*!40000 ALTER TABLE `trials` DISABLE KEYS */;
/*!40000 ALTER TABLE `trials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_antennas`
--

DROP TABLE IF EXISTS `troubleshoot_antennas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_antennas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `location` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_antennas`
--

LOCK TABLES `troubleshoot_antennas` WRITE;
/*!40000 ALTER TABLE `troubleshoot_antennas` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_antennas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_apwifis`
--

DROP TABLE IF EXISTS `troubleshoot_apwifis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_apwifis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(32) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `essid` varchar(32) DEFAULT NULL,
  `security_key` varchar(100) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `owner` varchar(20) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1' COMMENT '"0":"hilang","1":"baik","2":"rusak"',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_apwifis`
--

LOCK TABLES `troubleshoot_apwifis` WRITE;
/*!40000 ALTER TABLE `troubleshoot_apwifis` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_apwifis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_devices`
--

DROP TABLE IF EXISTS `troubleshoot_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `devicetype` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `location` text,
  `barcode` varchar(50) DEFAULT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1' COMMENT '0:hilang,1:baik,2:rusak',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_devices`
--

LOCK TABLES `troubleshoot_devices` WRITE;
/*!40000 ALTER TABLE `troubleshoot_devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_implementers`
--

DROP TABLE IF EXISTS `troubleshoot_implementers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_implementers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_implementers`
--

LOCK TABLES `troubleshoot_implementers` WRITE;
/*!40000 ALTER TABLE `troubleshoot_implementers` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_implementers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_materials`
--

DROP TABLE IF EXISTS `troubleshoot_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_materials`
--

LOCK TABLES `troubleshoot_materials` WRITE;
/*!40000 ALTER TABLE `troubleshoot_materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_pccards`
--

DROP TABLE IF EXISTS `troubleshoot_pccards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_pccards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `macaddress` varchar(40) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `serialno` varchar(100) DEFAULT NULL,
  `description` text,
  `status` varchar(1) DEFAULT '1' COMMENT '0:hilang,1:baik,2:rusak',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_pccards`
--

LOCK TABLES `troubleshoot_pccards` WRITE;
/*!40000 ALTER TABLE `troubleshoot_pccards` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_pccards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_requestrevisions`
--

DROP TABLE IF EXISTS `troubleshoot_requestrevisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_requestrevisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_date1` datetime DEFAULT NULL,
  `request_date2` datetime DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_requestrevisions`
--

LOCK TABLES `troubleshoot_requestrevisions` WRITE;
/*!40000 ALTER TABLE `troubleshoot_requestrevisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_requestrevisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_requests`
--

DROP TABLE IF EXISTS `troubleshoot_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `troubleshoot_type` varchar(1) DEFAULT '0',
  `nameofmtype` varchar(100) DEFAULT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `pic_position` varchar(50) DEFAULT NULL,
  `pic_phone_area` varchar(50) DEFAULT NULL,
  `pic_phone` varchar(50) DEFAULT NULL,
  `pic_name` varchar(50) DEFAULT NULL,
  `pic_email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `troubleshoot_date` datetime DEFAULT NULL,
  `request_date1` datetime DEFAULT NULL,
  `request_date2` datetime DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `is_payable` varchar(1) DEFAULT '0',
  `surat_ijin` varchar(1) DEFAULT '0',
  `pendamping` varchar(100) DEFAULT NULL,
  `description` text,
  `status` varchar(1) DEFAULT '0',
  `username` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_requests`
--

LOCK TABLES `troubleshoot_requests` WRITE;
/*!40000 ALTER TABLE `troubleshoot_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_routers`
--

DROP TABLE IF EXISTS `troubleshoot_routers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_routers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `ioflag` varchar(1) DEFAULT '1' COMMENT '"1":in ,"0":out ',
  `tipe` varchar(50) DEFAULT NULL,
  `macboard` varchar(200) DEFAULT NULL,
  `ip_public` varchar(15) DEFAULT NULL,
  `ip_private` varchar(15) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `serialno` varchar(50) DEFAULT NULL,
  `milikpadinet` varchar(1) DEFAULT '1',
  `status` varchar(1) DEFAULT '1' COMMENT '"0":"hilang","1":"baik","2":"rusak"',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_routers`
--

LOCK TABLES `troubleshoot_routers` WRITE;
/*!40000 ALTER TABLE `troubleshoot_routers` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_routers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_sites`
--

DROP TABLE IF EXISTS `troubleshoot_sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `pic_name` varchar(40) DEFAULT NULL,
  `pic_position` varchar(40) DEFAULT NULL,
  `pic_phone_area` varchar(5) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(40) DEFAULT NULL,
  `createuser` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_sites`
--

LOCK TABLES `troubleshoot_sites` WRITE;
/*!40000 ALTER TABLE `troubleshoot_sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshoot_switches`
--

DROP TABLE IF EXISTS `troubleshoot_switches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_switches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mac` varchar(200) DEFAULT NULL,
  `serialno` varchar(200) DEFAULT NULL,
  `barcode` varchar(200) DEFAULT NULL,
  `description` text,
  `status` varchar(1) DEFAULT '1' COMMENT '0:hilang,1:baik,2:rusak',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshoot_switches`
--

LOCK TABLES `troubleshoot_switches` WRITE;
/*!40000 ALTER TABLE `troubleshoot_switches` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshoot_switches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshootdevices`
--

DROP TABLE IF EXISTS `troubleshootdevices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshootdevices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshootsite_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `description` text,
  `createuser` varchar(40) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshootdevices`
--

LOCK TABLES `troubleshootdevices` WRITE;
/*!40000 ALTER TABLE `troubleshootdevices` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshootdevices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troubleshootsites`
--

DROP TABLE IF EXISTS `troubleshootsites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshootsites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `pic_name` varchar(60) DEFAULT NULL,
  `pic_position` varchar(30) DEFAULT NULL,
  `pic_phone_area` varchar(6) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `pic_email` varchar(100) DEFAULT NULL,
  `description` text,
  `createuser` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troubleshootsites`
--

LOCK TABLES `troubleshootsites` WRITE;
/*!40000 ALTER TABLE `troubleshootsites` DISABLE KEYS */;
/*!40000 ALTER TABLE `troubleshootsites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troublesites`
--

DROP TABLE IF EXISTS `troublesites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troublesites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troublesites`
--

LOCK TABLES `troublesites` WRITE;
/*!40000 ALTER TABLE `troublesites` DISABLE KEYS */;
/*!40000 ALTER TABLE `troublesites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usage_periods`
--

DROP TABLE IF EXISTS `usage_periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usage_periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usage_periods`
--

LOCK TABLES `usage_periods` WRITE;
/*!40000 ALTER TABLE `usage_periods` DISABLE KEYS */;
INSERT INTO `usage_periods` VALUES (1,'OH','2012-08-29 02:16:41','1'),(2,'Non OH','2012-08-29 02:16:41','1'),(3,'24 jam','2012-08-29 02:16:41','1');
/*!40000 ALTER TABLE `usage_periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `golongan` varchar(1) DEFAULT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(80) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'0','','administrator','ee858e9bd450d4bec296687ee992bf9766bda71b','9462e8eee0','admin@padi.net.id','',NULL,NULL,NULL,1268889823,1398587982,1,'Admin','istrator','ADMIN','admin@padi.net.id   ','0000-00-00',NULL,'1','0000-00-00 00:00:00'),(2,4,'2','','iwan','cc79abd7a4d68ea930bebac757d1694f9c7e78be',NULL,'iwan@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1429848383,1,'Iwan','Santoso',NULL,'031 5616330         ',NULL,NULL,'1','0000-00-00 00:00:00'),(3,4,'0','','henry','03276094f21d9f2e9dfda910b8816533a077c09f',NULL,'henry@padi.net.id',NULL,NULL,NULL,NULL,1387443523,1387443523,1,'','',NULL,'031 5616330 ',NULL,NULL,'1','0000-00-00 00:00:00'),(4,NULL,'0','','arif','3a8edb92a23a48f207038731b94bb03d1cef1961',NULL,'arif@padi.net.id',NULL,NULL,NULL,NULL,1387443807,1429843433,1,'','',NULL,'arif@padi.net.id','0000-00-00',NULL,'1','0000-00-00 00:00:00'),(5,2,'2','','ruri','95968b56af1ccee49b9b0fca158299e39c622476',NULL,'ruri@padi.net.id',NULL,NULL,NULL,NULL,1387444021,1387444021,1,'ruri','abdie',NULL,'031 5616330         ',NULL,NULL,'1','0000-00-00 00:00:00'),(6,3,'0','','naning','14f3a450293aa31b1e4f227ddb625d6850ebbdde',NULL,'naning@padi.net.id',NULL,NULL,NULL,NULL,1387506318,1428569028,1,'','',NULL,'031 5616330 ',NULL,NULL,'1','2013-12-20 02:25:18'),(7,4,'0','','jami','b41af3fae498168751eed0b49ea70a0225643140',NULL,'zamroni@padi.net.id',NULL,NULL,NULL,NULL,1387506432,1429757384,1,'','',NULL,'zamroni@padi.net.id','0000-00-00',NULL,'1','2013-12-20 02:27:12'),(8,3,'0','','amir','8b41fdd6a82895eeb1c84b3c31aacd808d7d8a1f',NULL,'amir@padi.net.id',NULL,NULL,NULL,NULL,1387506468,1430792397,1,'','',NULL,'031 5616330 ','0000-00-00',NULL,'1','2013-12-20 02:27:48'),(9,3,'0','','ketut','edd6dd13be055bfe69112de9971e36894234a951',NULL,'ketut@padi.net.id',NULL,NULL,NULL,NULL,1387506508,1428917650,1,'','',NULL,'08123585124','0000-00-00',NULL,'1','2013-12-20 02:28:28'),(10,3,'P','','reinhard','08c309ee4570a661d131280cd53ad61d19d9d474',NULL,'reinhard@padi.net.id',NULL,NULL,NULL,NULL,1387506529,1429498850,1,'','',NULL,'031 5616330 ',NULL,NULL,'1','2013-12-20 02:28:49'),(11,3,NULL,'','sisca','425a67344299893460047b77aaaa6a0748ea5011',NULL,'sisca@padi.net.id',NULL,NULL,NULL,NULL,1387506558,1428568332,1,NULL,NULL,NULL,'031 5616330',NULL,NULL,'1','2013-12-20 02:29:18'),(12,3,NULL,'','dhoni','e54081f6c4a02ec34a39f860a9194952f3e708fd',NULL,'dhoni@padi.net.id',NULL,NULL,NULL,NULL,1387506589,1430185086,1,NULL,NULL,NULL,'dhoni@padi.net.id','0000-00-00',NULL,'1','2013-12-20 02:29:49'),(13,3,'P','','dhani','19f9012b8f60c55173f96283f3cff99284f7fd04',NULL,'dhani@padi.net.id',NULL,NULL,NULL,NULL,1387506612,1430660129,1,'','',NULL,'031 5616330 ',NULL,NULL,'1','2013-12-20 02:30:12'),(14,3,'P','','yudi','d9e9965956f2d1b96b097bf3b4c506a5d654982d',NULL,'yudi@padi.net.id',NULL,NULL,NULL,NULL,1387506633,1430196318,1,'','',NULL,'031 5616330 ',NULL,NULL,'1','2013-12-20 02:30:33'),(15,4,NULL,'','bagus','9efdc907fe0f9417278efd853a5e07804a81d929',NULL,'bagus@padi.net.id',NULL,NULL,NULL,NULL,1387506659,1429887836,1,NULL,NULL,NULL,'031 5616330',NULL,NULL,'1','2013-12-20 02:30:59'),(16,4,NULL,'','yanto','378762121c7623ab8d88ade3e8b9cac0d000d559',NULL,'yanto@padi.net.id',NULL,NULL,NULL,NULL,1387506738,1430136449,1,NULL,NULL,NULL,'yanto@padi.net.id','0000-00-00',NULL,'1','2013-12-20 02:32:18'),(17,1,'0','','puji','1a29966312ab530a3bd2fbf6116c6aa1c4f0fa21',NULL,'puji@padi.net.id',NULL,NULL,NULL,NULL,1387506781,1431485550,1,'puji','prayitno',NULL,'031 5616330 ',NULL,NULL,'1','2013-12-20 02:33:01'),(18,4,'2','','Budiyanto','',NULL,'budiyanto@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Budiyanto','T',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(19,4,'2','','Taufik','c95d7d94e5a08397278275193dee691391d5f99e',NULL,'taufik@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1431479847,1,'Akhmad','Taufik',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(20,4,'2','','Didik','5a992c3581cbc359b8d0d30fd64689392ec64192',NULL,'didik@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1430094763,1,'Didik','Eko P',NULL,'didik@padi.net.id','0000-00-00',NULL,'1','2014-03-12 07:46:53'),(21,4,'2','','Aden','',NULL,'aden@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Aden','Y',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(22,4,'2','','Kholis','3e7e6c5342a055f0b66acd694bec657a92520b7d',NULL,'kholis@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1429870582,1,'Nur','Kholis',NULL,'085736072090','0000-00-00',NULL,'1','2014-03-12 07:46:53'),(23,4,'2','','Rega','ee4f2502f4a63671ffd9c111aa279b18a7f60ea3',NULL,'rega@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1430137868,1,'Rega','K',NULL,'rega@padi.net.id','0000-00-00',NULL,'1','2014-03-12 07:46:53'),(24,4,'2','','Genta','',NULL,'genta@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Genta','PP',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(25,4,'2','','Suhartono','94fcb3f200628de6b7e56601cdede4dfb00271f8',NULL,'suhartono@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1430197286,1,'Suhartono','',NULL,'suhartono@padi.net.i','0000-00-00',NULL,'1','2014-03-12 07:46:53'),(26,4,'2','','Catur','910d054207a0b7b7eccef4b31d97b75e6a309440',NULL,'catur@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1429870754,1,'Catur','',NULL,'catur@padi.net.id','0000-00-00',NULL,'1','2014-03-12 07:46:53'),(27,4,'2','','Bima','',NULL,'bima@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Bima','Putra P',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(28,4,'3','','Anang','',NULL,'anang@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Anang','Elang P',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(29,5,'3','','Miny','',NULL,'miny@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Miny','',NULL,' ',NULL,NULL,'1','2014-03-12 07:46:53'),(30,5,'3','','Yenny','',NULL,'yenny@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Yenny','Nurwiyani',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(31,5,'3','','Yaya','',NULL,'yaya@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Siti','Khoiriyah',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(32,5,'4','','Felix','7b603e3581583a134a86abb760ef96df2c4ddd6e',NULL,'felix@padi.net.id',NULL,NULL,NULL,NULL,1387443426,1416470604,1,'Felix','Suhendar',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(33,2,'2','','Novie','',NULL,'novie@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Novie','R',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(34,4,'2','','Akbar','',NULL,'akbar@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Akbar','Ibnu A',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(35,4,'2','','Hendry','',NULL,'hendry@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Hendry','Eka P',NULL,'     ',NULL,NULL,'1','2014-03-12 07:46:53'),(36,4,'2','','Ikmal','',NULL,'ikmal@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Ikmal','Q Ilyas',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(37,4,'3','','Danang','',NULL,'danang@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Danang','W',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(38,4,'4','','Vincent','',NULL,'vincent@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Vincent','S',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(39,3,'2','','Nelfi','',NULL,'nelfi@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Nelfi','',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(40,3,'3','','Thomas','',NULL,'thomas@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Thomas','HB',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(41,2,'2','','Ferina','69f3b00df8be58ddab27b5730eacf18d71ad9a22',NULL,'ferina@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Ferina','RA',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(42,4,'2','','Soni','',NULL,'soni@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'M','Soni P',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(43,4,'2','','Aji','',NULL,'aji@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Aji','Saifudin',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(44,4,'3','','Pisa','',NULL,'pisa@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Paulus','Pisa',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(45,3,'2','','Solikin','',NULL,'solikin@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Solikin','',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(46,0,'','','Retno','',NULL,'retno@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Retno','Astuti',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(47,4,'2','','Anjar','',NULL,'anjar@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Sri','Anjar P',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(48,4,'2','','Riza','',NULL,'riza@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,'Riza','Aminuddin',NULL,NULL,NULL,NULL,'1','2014-03-12 07:46:53'),(49,NULL,NULL,'','putra','putra',NULL,'putra@padi.net.id',NULL,NULL,NULL,NULL,1387443426,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1','2014-04-22 07:06:36'),(50,NULL,NULL,'','Rezi','6a52309d43b85432cea0c22a5372da69f753ee16',NULL,'rezi@padi.net.id',NULL,NULL,NULL,NULL,1398151275,1398151275,1,NULL,NULL,NULL,NULL,NULL,NULL,'1','2014-04-22 07:21:15'),(51,4,'2','','gilang','e7116030bf42c7ab2eaf8db6a531f97824a36025',NULL,'gilang@padi.net.id',NULL,NULL,NULL,NULL,0,1430133007,1,'','',NULL,' ',NULL,NULL,'1','2015-04-02 02:29:28'),(52,NULL,'P','','dwi','c759a2fa607d663ab0c708962319c28e99336057',NULL,'dwiwutomo@padi.net.id',NULL,NULL,NULL,NULL,0,1429607492,1,'dwi','utomo',NULL,'dwiwutomo@padi.net.i','0000-00-00',NULL,'1','2015-04-09 08:23:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2),(3,2,1),(4,3,1),(5,4,1),(6,5,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_lama`
--

DROP TABLE IF EXISTS `users_lama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_lama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_lama`
--

LOCK TABLES `users_lama` WRITE;
/*!40000 ALTER TABLE `users_lama` DISABLE KEYS */;
INSERT INTO `users_lama` VALUES (1,1,'2013-11-18 08:06:34','puji','puji@padi.net.id',NULL,NULL,'avatar-y.JPG','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(2,1,'2013-11-25 15:06:36','naning','naning@padi.net.id',NULL,NULL,'helen.jpg','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(3,1,'2013-11-07 08:35:56','ketut','ketut@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(4,1,'2013-11-07 08:35:56','sisca','sisca@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(5,2,'2013-11-07 08:35:56','dyas','dyas@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(6,3,'2013-11-15 08:47:49','amir','amir@padi.net.id',NULL,NULL,'76486.png','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(7,3,'2013-11-07 08:35:56','dhani','dhani@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(8,3,'2013-11-07 08:35:56','reinhard','reinhard@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(9,1,'2013-11-07 08:35:56','melinda','melinda@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(10,3,'2013-11-07 08:35:56','thomas','thomas@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(11,3,'2013-11-07 08:35:56','yanuar','yanuar@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(12,3,'2013-11-07 08:35:56','yesis','yesis@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(13,3,'2013-11-07 08:35:56','siswanto','siswanto@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(14,3,'2013-11-07 08:35:56','ferina','ferina@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(15,3,'2013-11-07 08:35:56','yudi','yudi@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(16,3,'2013-11-07 08:35:56','doni','doni@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(17,4,'2013-11-07 08:35:56','versa','versa@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(18,4,'2013-11-25 09:42:26','fanty','fanty@padi.net.id',NULL,NULL,'katarax.jpeg','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(19,2,'2013-11-07 08:35:56','lasmono','lasmono@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(20,3,'2013-11-07 08:35:56','dhoni','dhoni@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(21,3,'2013-11-07 08:35:56','retno','retno@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(22,4,'2013-12-04 07:30:34','jami','zamroni@padi.net.id','1234345111','1978-08-24','thank-you-earth.gif','07a5c9bfc808700603306a90658100c1175e88a8','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1');
/*!40000 ALTER TABLE `users_lama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_old`
--

DROP TABLE IF EXISTS `users_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_old`
--

LOCK TABLES `users_old` WRITE;
/*!40000 ALTER TABLE `users_old` DISABLE KEYS */;
INSERT INTO `users_old` VALUES (1,1,'2013-11-18 08:06:34','puji','puji@padi.net.id',NULL,NULL,'avatar-y.JPG','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(2,1,'2013-11-25 15:06:36','naning','naning@padi.net.id',NULL,NULL,'helen.jpg','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(3,1,'2013-11-07 08:35:56','ketut','ketut@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(4,1,'2013-11-07 08:35:56','sisca','sisca@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(5,2,'2013-11-07 08:35:56','dyas','dyas@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(6,3,'2013-11-15 08:47:49','amir','amir@padi.net.id',NULL,NULL,'76486.png','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(7,3,'2013-11-07 08:35:56','dhani','dhani@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(8,3,'2013-11-07 08:35:56','reinhard','reinhard@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(9,1,'2013-11-07 08:35:56','melinda','melinda@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(10,3,'2013-11-07 08:35:56','thomas','thomas@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(11,3,'2013-11-07 08:35:56','yanuar','yanuar@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(12,3,'2013-11-07 08:35:56','yesis','yesis@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(13,3,'2013-11-07 08:35:56','siswanto','siswanto@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(14,3,'2013-11-07 08:35:56','ferina','ferina@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(15,3,'2013-11-07 08:35:56','yudi','yudi@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(16,3,'2013-11-07 08:35:56','doni','doni@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(17,4,'2013-11-07 08:35:56','versa','versa@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(18,4,'2013-11-25 09:42:26','fanty','fanty@padi.net.id',NULL,NULL,'katarax.jpeg','10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(19,2,'2013-11-07 08:35:56','lasmono','lasmono@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(20,3,'2013-11-07 08:35:56','dhoni','dhoni@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(21,3,'2013-11-07 08:35:56','retno','retno@padi.net.id',NULL,NULL,NULL,'10dfa1f3944ab5cf4f08cd5bcd15d2b3ffa7134c','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1'),(22,4,'2013-12-04 07:30:34','jami','zamroni@padi.net.id','1234345111','1978-08-24','thank-you-earth.gif','07a5c9bfc808700603306a90658100c1175e88a8','b11f81c373e9771244a0d4962f586cbfae6e9a4a','1');
/*!40000 ALTER TABLE `users_old` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `usr_pref` AFTER INSERT ON `users_old`
 FOR EACH ROW begin insert into preferences (user_id) values (new.id);end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `web_settings`
--

DROP TABLE IF EXISTS `web_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_settings` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(20) DEFAULT NULL,
  `website_title` varchar(30) DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `master_email` varchar(50) DEFAULT NULL,
  `maintenance_mode` varchar(1) DEFAULT '0',
  `property_auto_moderation` varchar(1) DEFAULT '1',
  `news_auto_moderation` varchar(1) DEFAULT '1',
  `advertise_auto_moderation` varchar(1) DEFAULT '1',
  `advertise_max_char` varchar(10) DEFAULT NULL,
  `theme` varchar(20) DEFAULT 'default',
  `language` varchar(50) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `news1` int(11) NOT NULL,
  `news2` int(11) NOT NULL,
  `head_banner` int(11) NOT NULL,
  `side_banner1` int(11) NOT NULL,
  `side_banner2` int(11) NOT NULL,
  `content_banner1` int(11) NOT NULL,
  `content_banner2` int(11) NOT NULL,
  `content_banner3` int(11) NOT NULL,
  `footer_text` text,
  `tw_url` varchar(200) DEFAULT NULL,
  `fb_url` varchar(200) DEFAULT NULL,
  `header_type` varchar(1) DEFAULT '0',
  `header_color` varchar(32) DEFAULT NULL,
  `header_image` varchar(200) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `mailing` varchar(1) DEFAULT '1' COMMENT 'jika 1 enabled, jika -1 disabled',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_settings`
--

LOCK TABLES `web_settings` WRITE;
/*!40000 ALTER TABLE `web_settings` DISABLE KEYS */;
INSERT INTO `web_settings` VALUES (1,'Database Teknis','Database Teknis','Database Teknis PadiNet','KPI, PKI','puji@padi.net.id','0','1','1','1','25','mytheme','english','logokpi.png',1,2,1,2,3,4,5,6,'<p style=\"text-align: center;\">\n	Copyright PadiNET 2012</p>\n','twitter.com/xxx','twitter.com/xxx','1','#000FFC','plumer.jpg','favicon.png','1');
/*!40000 ALTER TABLE `web_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-23 12:45:21
