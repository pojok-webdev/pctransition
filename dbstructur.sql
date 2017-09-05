-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: localteknis
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `datacenters`
--

DROP TABLE IF EXISTS `datacenters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datacenters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `active` varchar(1) DEFAULT '1',
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `fbfees`
--

DROP TABLE IF EXISTS `fbfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fbfees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dpp` decimal(12,2) DEFAULT NULL,
  `ppn` decimal(12,2) DEFAULT NULL,
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fbpics`
--

DROP TABLE IF EXISTS `fbpics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fbpics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `idnum` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL COMMENT 'hp dan telp dibedakan(P Ketut,13 ags 2015)',
  `email` varchar(50) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fbs`
--

DROP TABLE IF EXISTS `fbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fbs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nofb` varchar(20) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL COMMENT 'fb terikat pada cabang pelanggan (P Ketut 7 Ags 2015)',
  `name` varchar(200) DEFAULT NULL,
  `businesstype` varchar(200) DEFAULT NULL,
  `siup` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `activationdate` datetime DEFAULT NULL COMMENT 'mandatory (P Ketut 7 ags 2015)',
  `period1` datetime DEFAULT NULL COMMENT 'periode kontrak, mandatory (P Ketut 7 ags 2015)',
  `period2` datetime DEFAULT NULL COMMENT 'periode kontrak, mandatory (P Ketut 7 ags 2015)',
  `services` text COMMENT 'services (typing)',
  `completed` varchar(1) DEFAULT '0' COMMENT '1: is completed, 0:isnot completed',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `install_images`
--

DROP TABLE IF EXISTS `install_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `install_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `install_site_id` int(11) DEFAULT NULL,
  `img` longblob,
  `path` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `roworder` int(11) DEFAULT NULL,
  `description` text,
  `username` varchar(40) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `site_apwifis`
--

DROP TABLE IF EXISTS `site_apwifis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_apwifis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `ioflag` varchar(1) DEFAULT '1' COMMENT '1: milik padinet,0:milik client',
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `ioflag` varchar(1) DEFAULT '1' COMMENT '1 @ client 0 otherwise',
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `ioflag` varchar(1) DEFAULT '1' COMMENT '1 @ client 0 @ warehouse',
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `site_routers`
--

DROP TABLE IF EXISTS `site_routers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_routers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `ioflag` varchar(1) DEFAULT '1',
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
  `withdrawdate` datetime DEFAULT NULL COMMENT 'the datetime when withdrawn',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
  `ioflag` varchar(1) DEFAULT '1' COMMENT '1: @ client,0: withdrawed',
  `name` varchar(200) DEFAULT NULL,
  `port` varchar(3) DEFAULT NULL COMMENT 'amount of port',
  `ismanaged` varchar(1) DEFAULT NULL COMMENT '1:yes 0:no',
  `user` varchar(50) DEFAULT NULL COMMENT 'device username',
  `password` varchar(50) DEFAULT NULL COMMENT 'device password',
  `mac` varchar(200) DEFAULT NULL,
  `serialno` varchar(200) DEFAULT NULL,
  `barcode` varchar(200) DEFAULT NULL,
  `description` text,
  `createuser` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `site_wireless_radios`
--

DROP TABLE IF EXISTS `site_wireless_radios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_wireless_radios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_site_id` int(11) DEFAULT NULL,
  `ioflag` varchar(1) DEFAULT '1' COMMENT '1: at client,0:withdrawed',
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `survey_images`
--

DROP TABLE IF EXISTS `survey_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_site_id` int(11) DEFAULT NULL,
  `img` mediumblob,
  `path` varchar(50) DEFAULT NULL,
  `roworder` int(11) DEFAULT NULL,
  `description` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `confirmationresult` text COMMENT 'confirmation from client',
  `description` text,
  `username` varchar(50) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `service` varchar(50) DEFAULT NULL,
  `kdticket` varchar(9) DEFAULT NULL,
  `requesttype` varchar(15) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `complaint` text,
  `reporter` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT '0',
  `prev_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticketstart` datetime DEFAULT NULL,
  `ticketend` datetime DEFAULT NULL,
  `downtimestart` datetime DEFAULT NULL,
  `downtimeend` datetime DEFAULT NULL,
  `cause` text,
  `solution` text,
  `user_id` int(11) DEFAULT NULL,
  `createuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger createkodeticket before insert on tickets
for each row
begin
case (new.requesttype)
when 'backbone'
then
select b.branch_id,a.abbr,'backbone' into @branchid, @abbr,@service_id from backbones b left outer join branches a on a.id=b.branch_id where b.id=new.client_id;  
when 'pelanggan'
then
select b.branch_id,a.abbr,c.name into @branchid, @abbr,@service_id from client_sites b left outer join branches a on a.id=b.branch_id left outer join services c on c.id=b.service_id where b.id=new.client_site_id;  
when 'datacenter'
then
select b.branch_id,a.abbr,'datacenter' into @branchid, @abbr,@service_id from datacenters b left outer join branches a on a.id=b.branch_id where b.id=new.client_id;  
when 'bts'
then
select b.branch_id,a.abbr,'bts' into @branchid, @abbr,@service_id from btstowers b left outer join branches a on a.id=b.branch_id where b.id=new.client_id;  
end case;
set new.branch_id = @branchid;
set new.service = @service_id;
select count(id) into @cnt from tickets where date_format(create_date,'%Y%m') = date_format(curdate(),'%Y%m');
set new.kdticket = concat(date_format(curdate(),'%Y%m'),lpad(@cnt+1,3,'0'));
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
-- Table structure for table `troubleshoot_officers`
--

DROP TABLE IF EXISTS `troubleshoot_officers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_officers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `createuser` varchar(40) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `troubleshoot_request_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `troubleshoot_requests`
--

DROP TABLE IF EXISTS `troubleshoot_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troubleshoot_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `client_site_id` int(11) DEFAULT NULL,
  `troubleshoottype` varchar(10) DEFAULT NULL,
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
  `activities` text COMMENT 'activities in site',
  `status` varchar(1) DEFAULT '0' COMMENT '0 blm selesai,1 selesai,2 monitoring',
  `solvedschedule` datetime DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `pic` mediumblob,
  `status` varchar(1) DEFAULT '1',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modul` varchar(20) DEFAULT 'troubleshoot',
  `device` varchar(20) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1' COMMENT '0:rusak,1:baik',
  `createuser` varchar(30) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-21 16:20:15
