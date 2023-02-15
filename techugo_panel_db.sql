/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.10-MariaDB : Database - Techugo_backend_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `project_team_log` */

DROP TABLE IF EXISTS `project_team_log`;

CREATE TABLE `project_team_log` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `pId` int(11) DEFAULT NULL,
  `pUniqueId` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `pName` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pDescription` text COLLATE utf8mb4_bin DEFAULT NULL,
  `pDocument` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pStartDate` date DEFAULT NULL,
  `pEndDate` date DEFAULT NULL,
  `pHourlyRate` float(15,2) DEFAULT NULL,
  `pTotalHours` int(5) DEFAULT NULL COMMENT 'Duration in Hours (working days)',
  `clientId` int(11) DEFAULT NULL,
  `status` enum('Sales','R&D','InProduction','PendingApproval','Complete') COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'which stage of the project',
  `tStatus` enum('OnHold','Initial','Complete','Delay','Terminate','Running','Starting') COLLATE utf8mb4_bin DEFAULT NULL,
  `deleted` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT 'active' COMMENT 'project is on or off status',
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` int(11) DEFAULT NULL,
  `ptId` int(11) DEFAULT NULL,
  `ptProjectId` int(11) DEFAULT NULL,
  `ptTeamId` int(11) DEFAULT NULL,
  `ptTeamMemberId` int(11) DEFAULT NULL,
  `ptdailyHours` float(15,2) DEFAULT NULL,
  `ptTeamMemberStatus` enum('active','Inactive') CHARACTER SET utf8mb4 DEFAULT 'active',
  `logUpdatedDate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `project_team_log` */

LOCK TABLES `project_team_log` WRITE;

insert  into `project_team_log`(`logid`,`pId`,`pUniqueId`,`pName`,`pDescription`,`pDocument`,`pStartDate`,`pEndDate`,`pHourlyRate`,`pTotalHours`,`clientId`,`status`,`tStatus`,`deleted`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`,`ptId`,`ptProjectId`,`ptTeamId`,`ptTeamMemberId`,`ptdailyHours`,`ptTeamMemberStatus`,`logUpdatedDate`) values 
(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:54',NULL,'0000-00-00 00:00:00',NULL,8,2,12,68,4.00,'active','2019-12-25 22:49:54'),
(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:54',NULL,'0000-00-00 00:00:00',NULL,9,2,12,99,8.00,'active','2019-12-25 22:49:54'),
(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:55',NULL,'0000-00-00 00:00:00',NULL,10,2,12,84,1.00,'active','2019-12-25 22:49:55'),
(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:55',NULL,'0000-00-00 00:00:00',NULL,11,2,12,139,8.00,'active','2019-12-25 22:49:55'),
(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:55',NULL,'0000-00-00 00:00:00',NULL,12,2,12,149,2.00,'active','2019-12-25 22:49:55'),
(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:55',NULL,'0000-00-00 00:00:00',NULL,13,2,12,159,8.00,'active','2019-12-25 22:49:55'),
(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:55',NULL,'0000-00-00 00:00:00',NULL,14,2,12,97,1.00,'active','2019-12-25 22:49:55'),
(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-25 22:49:55',NULL,'0000-00-00 00:00:00',NULL,16,2,12,109,2.00,'active','2019-12-25 22:49:55'),
(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:22:41',NULL,'0000-00-00 00:00:00',NULL,9,2,12,99,8.00,'active','2019-12-26 08:22:41'),
(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:22:47',NULL,'0000-00-00 00:00:00',NULL,10,2,12,84,1.00,'active','2019-12-26 08:22:47'),
(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:29:11',NULL,'0000-00-00 00:00:00',NULL,9,2,12,99,8.00,'Inactive','2019-12-26 08:29:11'),
(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:29:15',NULL,'0000-00-00 00:00:00',NULL,10,2,12,84,1.00,'Inactive','2019-12-26 08:29:15'),
(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:36:17',NULL,'0000-00-00 00:00:00',NULL,10,2,12,84,1.00,'active','2019-12-26 08:36:17'),
(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:36:35',NULL,'0000-00-00 00:00:00',NULL,10,2,12,84,1.00,'Inactive','2019-12-26 08:36:35'),
(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:36:44',NULL,'0000-00-00 00:00:00',NULL,10,2,12,84,1.00,'active','2019-12-26 08:36:44'),
(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:36:58',NULL,'0000-00-00 00:00:00',NULL,11,2,12,139,8.00,'active','2019-12-26 08:36:58'),
(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 08:37:03',NULL,'0000-00-00 00:00:00',NULL,13,2,12,159,8.00,'active','2019-12-26 08:37:03'),
(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:26',NULL,'0000-00-00 00:00:00',NULL,12,2,12,149,2.00,'active','2019-12-26 09:47:26'),
(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:30',NULL,'0000-00-00 00:00:00',NULL,24,2,12,125,1.00,'active','2019-12-26 09:47:30'),
(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:34',NULL,'0000-00-00 00:00:00',NULL,9,2,12,99,8.00,'active','2019-12-26 09:47:34'),
(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:41',NULL,'0000-00-00 00:00:00',NULL,8,2,12,68,4.00,'active','2019-12-26 09:47:41'),
(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:41',NULL,'0000-00-00 00:00:00',NULL,25,2,12,0,0.00,'active','2019-12-26 09:47:41'),
(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:41',NULL,'0000-00-00 00:00:00',NULL,25,2,12,0,0.00,'active','2019-12-26 09:47:41'),
(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:41',NULL,'0000-00-00 00:00:00',NULL,14,2,12,97,1.00,'active','2019-12-26 09:47:41'),
(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 09:47:41',NULL,'0000-00-00 00:00:00',NULL,16,2,12,109,2.00,'active','2019-12-26 09:47:41'),
(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:28',NULL,'0000-00-00 00:00:00',NULL,35,5,15,113,8.00,'active','2019-12-26 14:16:28'),
(27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,33,5,15,148,1.50,'active','2019-12-26 14:16:31'),
(28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,34,5,15,135,7.00,'active','2019-12-26 14:16:31'),
(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,36,5,15,118,8.00,'active','2019-12-26 14:16:31'),
(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,37,5,15,125,3.00,'active','2019-12-26 14:16:31'),
(31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,39,5,15,95,5.00,'active','2019-12-26 14:16:31'),
(32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,33,5,15,148,1.50,'active','2019-12-26 14:16:31'),
(33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,34,5,15,135,7.00,'active','2019-12-26 14:16:31'),
(34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,36,5,15,118,8.00,'active','2019-12-26 14:16:31'),
(35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,37,5,15,125,3.00,'active','2019-12-26 14:16:31'),
(36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 14:16:31',NULL,'0000-00-00 00:00:00',NULL,39,5,15,95,5.00,'active','2019-12-26 14:16:31'),
(37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 16:02:50',NULL,'0000-00-00 00:00:00',NULL,1,1,1,66,1.00,'active','2019-12-26 16:02:50'),
(38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 16:14:15',NULL,'0000-00-00 00:00:00',NULL,1,1,1,66,1.00,'active','2019-12-26 16:14:15'),
(39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 16:14:15',NULL,'0000-00-00 00:00:00',NULL,2,1,1,145,3.00,'active','2019-12-26 16:14:15'),
(40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 16:14:15',NULL,'0000-00-00 00:00:00',NULL,3,1,1,154,3.00,'active','2019-12-26 16:14:15'),
(41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 16:14:16',NULL,'0000-00-00 00:00:00',NULL,4,1,1,97,3.00,'active','2019-12-26 16:14:16'),
(42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:30',NULL,'0000-00-00 00:00:00',NULL,1,1,1,66,1.00,'active','2019-12-26 17:15:30'),
(43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:30',NULL,'0000-00-00 00:00:00',NULL,2,1,1,145,3.00,'active','2019-12-26 17:15:30'),
(44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:30',NULL,'0000-00-00 00:00:00',NULL,5,1,1,98,7.00,'active','2019-12-26 17:15:30'),
(45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:30',NULL,'0000-00-00 00:00:00',NULL,3,1,1,154,3.00,'active','2019-12-26 17:15:30'),
(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:31',NULL,'0000-00-00 00:00:00',NULL,6,1,1,136,6.00,'active','2019-12-26 17:15:31'),
(47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:31',NULL,'0000-00-00 00:00:00',NULL,7,1,1,126,4.00,'active','2019-12-26 17:15:31'),
(48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:31',NULL,'0000-00-00 00:00:00',NULL,8,1,1,124,6.00,'active','2019-12-26 17:15:31'),
(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:15:31',NULL,'0000-00-00 00:00:00',NULL,4,1,1,97,3.00,'active','2019-12-26 17:15:31'),
(50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:11',NULL,'0000-00-00 00:00:00',NULL,1,1,1,131,1.00,'active','2019-12-26 17:19:11'),
(51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,2,1,1,145,3.00,'active','2019-12-26 17:19:12'),
(52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,5,1,1,98,7.00,'active','2019-12-26 17:19:12'),
(53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,3,1,1,154,3.00,'active','2019-12-26 17:19:12'),
(54,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,6,1,1,136,6.00,'active','2019-12-26 17:19:12'),
(55,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,7,1,1,126,4.00,'active','2019-12-26 17:19:12'),
(56,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,8,1,1,124,6.00,'active','2019-12-26 17:19:12'),
(57,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:19:12',NULL,'0000-00-00 00:00:00',NULL,4,1,1,97,3.00,'active','2019-12-26 17:19:12'),
(58,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-26 17:20:55',NULL,'0000-00-00 00:00:00',NULL,1,1,1,157,2.00,'active','2019-12-26 17:20:55');

UNLOCK TABLES;

/*Table structure for table `tbl_access_token` */

DROP TABLE IF EXISTS `tbl_access_token`;

CREATE TABLE `tbl_access_token` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `access_token` varchar(800) DEFAULT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp(),
  `expire_datetime` timestamp NULL DEFAULT NULL,
  `logout` enum('Y','N') DEFAULT 'N',
  `deleted` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`token_id`),
  KEY `user_Id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_access_token` */

LOCK TABLES `tbl_access_token` WRITE;

insert  into `tbl_access_token`(`token_id`,`user_id`,`access_token`,`created_datetime`,`expire_datetime`,`logout`,`deleted`) values 
(1,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-22 16:30:01','2019-12-23 16:30:01','N','Y'),
(2,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-23 08:25:14','2019-12-24 08:25:14','N','Y'),
(3,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-23 16:21:34','2019-12-24 16:21:34','N','Y'),
(4,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-24 08:22:16','2019-12-25 08:22:16','N','Y'),
(5,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-24 22:34:12','2019-12-25 22:34:12','N','Y'),
(6,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-25 11:25:49','2019-12-26 11:25:49','N','Y'),
(7,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-25 22:08:33','2019-12-26 22:08:33','N','Y'),
(8,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-26 08:17:45','2019-12-27 08:17:45','N','Y'),
(9,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-26 12:10:41','2019-12-27 12:10:41','N','Y'),
(10,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-26 14:12:35','2019-12-27 14:12:35','N','Y'),
(11,1,'d41d8cd98f00b204e9800998ecf8427e','2019-12-27 10:01:35','2019-12-28 10:01:35','N','N');

UNLOCK TABLES;

/*Table structure for table `tbl_activity` */

DROP TABLE IF EXISTS `tbl_activity`;

CREATE TABLE `tbl_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','deactive') CHARACTER SET latin1 DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_activity` */

LOCK TABLES `tbl_activity` WRITE;

insert  into `tbl_activity`(`id`,`description`,`status`) values 
(1,'Project Started','active'),
(2,'Project Manager Assigned','active'),
(3,'Ios  Developer assign','active'),
(4,'Android  Developer assign','active'),
(5,'Backend Developer assign','active'),
(6,'HTML  Developer assign','active'),
(7,'Designer assign','active'),
(8,'New Ios Developer assign','active'),
(9,'New Android Developer assign','active'),
(10,'New HTML Developer assign','active'),
(11,'New Backend Developer assign','active'),
(12,'New Project Manager assign','active'),
(13,'New Designer assign','active'),
(14,'Change Project Status','active'),
(15,'Team Created','active'),
(16,'QA Developer assign','active'),
(17,'Project details updated','active'),
(18,'Project Manager detail changed','active'),
(19,'Ios developer detail changed','active'),
(20,'Android developer detail changed','active'),
(21,'Backend developer detail changed','active'),
(22,'QA developer detail changed','active'),
(23,'HTML developer detail changed','active'),
(24,'Designer detail changed','active'),
(25,'New QA developer assign','active'),
(26,'Remove Team Member','active');

UNLOCK TABLES;

/*Table structure for table `tbl_activity_log` */

DROP TABLE IF EXISTS `tbl_activity_log`;

CREATE TABLE `tbl_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `status` enum('active','deactive') CHARACTER SET latin1 DEFAULT 'active',
  `createdDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_activity_log` */

LOCK TABLES `tbl_activity_log` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_clients` */

DROP TABLE IF EXISTS `tbl_clients`;

CREATE TABLE `tbl_clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `Industry` varchar(255) DEFAULT NULL,
  `Revenue` varchar(255) DEFAULT NULL,
  `Description` varchar(512) DEFAULT '',
  `Phone` varchar(255) DEFAULT NULL,
  `Street1` varchar(255) DEFAULT NULL,
  `Street2` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Zip` int(11) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_clients` */

LOCK TABLES `tbl_clients` WRITE;

insert  into `tbl_clients`(`id`,`Name`,`Website`,`Industry`,`Revenue`,`Description`,`Phone`,`Street1`,`Street2`,`City`,`State`,`Zip`,`Country`,`Notes`) values 
(1,'Test_1',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `tbl_contacts` */

DROP TABLE IF EXISTS `tbl_contacts`;

CREATE TABLE `tbl_contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Middle` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Occupation` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Notes` varchar(255) DEFAULT NULL,
  `ClientID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client` (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_contacts` */

LOCK TABLES `tbl_contacts` WRITE;

insert  into `tbl_contacts`(`id`,`Title`,`FirstName`,`Middle`,`LastName`,`Email`,`Gender`,`Occupation`,`Phone`,`Birthday`,`Notes`,`ClientID`) values 
(1,NULL,'Test1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);

UNLOCK TABLES;

/*Table structure for table `tbl_department` */

DROP TABLE IF EXISTS `tbl_department`;

CREATE TABLE `tbl_department` (
  `dId` int(11) NOT NULL AUTO_INCREMENT,
  `dName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `dDescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`dId`),
  KEY `createdAt` (`createdAt`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_department` */

LOCK TABLES `tbl_department` WRITE;

insert  into `tbl_department`(`dId`,`dName`,`dDescription`,`status`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,'IOS',NULL,'active','2019-12-18 09:31:49',NULL,NULL,NULL),
(2,'Android',NULL,'active','2019-12-18 09:31:56',NULL,NULL,NULL),
(3,'Backend','PHP+Node+Anguler','active','2019-12-18 09:32:02',NULL,NULL,NULL),
(4,'QA',NULL,'active','2019-12-18 09:32:08',NULL,NULL,NULL),
(5,'HTML','Angular + HTML','active','2019-12-18 09:32:13',NULL,NULL,NULL),
(6,'Design',NULL,'active','2019-12-18 09:32:17',NULL,NULL,NULL),
(7,'Project-Incharge',NULL,'active','2019-12-18 09:32:24',NULL,NULL,NULL),
(8,'Sales-Marketing','','active','2019-12-18 09:33:46',NULL,NULL,NULL),
(9,'Delivery',NULL,'active','2019-12-18 09:34:18',NULL,NULL,NULL),
(10,'Network',NULL,'active','2019-12-18 09:34:22',NULL,NULL,NULL),
(11,'HR',NULL,'active','2019-12-18 09:34:25',NULL,NULL,NULL),
(12,'Management',NULL,'active','2019-12-18 11:04:20',NULL,NULL,NULL),
(13,'Admin Staff',NULL,'active','2019-12-18 11:04:20',NULL,NULL,NULL),
(14,'admin',NULL,'active','2019-12-20 06:33:11',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `tbl_milestone` */

DROP TABLE IF EXISTS `tbl_milestone`;

CREATE TABLE `tbl_milestone` (
  `mId` int(11) NOT NULL AUTO_INCREMENT,
  `mName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mProjectId` int(11) DEFAULT NULL,
  `mDueDate` datetime DEFAULT NULL,
  `mDeliveryDate` datetime DEFAULT NULL,
  `mDeliveryable` text DEFAULT NULL,
  `mTotalHours` int(11) DEFAULT NULL,
  `status` enum('active','pending','completed','delay') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`mId`),
  KEY `mProjectId` (`mProjectId`),
  KEY `createdAt` (`createdAt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_milestone` */

LOCK TABLES `tbl_milestone` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_project` */

DROP TABLE IF EXISTS `tbl_project`;

CREATE TABLE `tbl_project` (
  `pId` int(11) NOT NULL AUTO_INCREMENT,
  `pUniqueId` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `pName` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pDescription` text COLLATE utf8mb4_bin DEFAULT NULL,
  `pDocument` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pStartDate` date DEFAULT NULL,
  `pEndDate` date DEFAULT NULL,
  `pHourlyRate` float(15,2) DEFAULT NULL,
  `pTotalHours` int(5) DEFAULT NULL COMMENT 'Duration in Hours (working days)',
  `clientId` int(11) DEFAULT NULL,
  `status` enum('Sales','R&D','InProduction','PendingApproval','Complete') COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'which stage of the project',
  `tStatus` enum('OnHold','Initial','Complete','Delay','Terminate','Running','Starting') COLLATE utf8mb4_bin DEFAULT NULL,
  `deleted` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT 'active' COMMENT 'project is on or off status',
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`pId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_project` */

LOCK TABLES `tbl_project` WRITE;

insert  into `tbl_project`(`pId`,`pUniqueId`,`pName`,`pDescription`,`pDocument`,`pStartDate`,`pEndDate`,`pHourlyRate`,`pTotalHours`,`clientId`,`status`,`tStatus`,`deleted`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,NULL,'Test_1',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'OnHold','active','2019-12-26 16:01:30',1,'2019-12-27 12:17:47',1);

UNLOCK TABLES;

/*Table structure for table `tbl_project_team` */

DROP TABLE IF EXISTS `tbl_project_team`;

CREATE TABLE `tbl_project_team` (
  `ptId` int(11) NOT NULL AUTO_INCREMENT,
  `ptProjectId` int(11) DEFAULT NULL,
  `ptTeamId` int(11) DEFAULT NULL,
  `ptTeamMemberId` int(11) DEFAULT NULL,
  `ptdailyHours` float(15,2) DEFAULT NULL,
  `status` enum('active','Inactive') DEFAULT 'active',
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`ptId`),
  KEY `ptProjectId` (`ptProjectId`),
  KEY `ptTeamId` (`ptTeamId`),
  KEY `createdAt` (`createdAt`),
  KEY `ptTeamMemberId` (`ptTeamMemberId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_project_team` */

LOCK TABLES `tbl_project_team` WRITE;

insert  into `tbl_project_team`(`ptId`,`ptProjectId`,`ptTeamId`,`ptTeamMemberId`,`ptdailyHours`,`status`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,1,1,148,2.00,'active','2019-12-26 16:01:30',1,'2019-12-26 17:20:55',1),
(2,1,1,145,3.00,'active','2019-12-26 16:02:50',1,'2019-12-27 12:31:26',1),
(3,1,1,154,3.00,'active','2019-12-26 16:02:50',1,'2019-12-27 12:24:20',1),
(4,1,1,97,3.00,'active','2019-12-26 16:02:50',1,'2019-12-26 17:19:12',1),
(5,1,1,98,7.00,'active','2019-12-26 16:14:15',1,'2019-12-26 17:19:12',1),
(6,1,1,136,6.00,'active','2019-12-26 16:14:15',1,'2019-12-27 12:26:25',1),
(7,1,1,126,4.00,'active','2019-12-26 16:14:15',1,'2019-12-27 12:27:32',1),
(8,1,1,124,6.00,'active','2019-12-26 16:14:15',1,'2019-12-27 12:26:14',1);

UNLOCK TABLES;

/*Table structure for table `tbl_resource` */

DROP TABLE IF EXISTS `tbl_resource`;

CREATE TABLE `tbl_resource` (
  `rId` int(11) NOT NULL AUTO_INCREMENT,
  `rName` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `rDepartment` enum('ios','android','backend','designer','tester','sales','pmanager') COLLATE utf8mb4_bin DEFAULT NULL,
  `rlanguage` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT NULL,
  `creaetedDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`rId`),
  KEY `createdAt` (`createdAt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_resource` */

LOCK TABLES `tbl_resource` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `rId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT 'active',
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`rId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_role` */

LOCK TABLES `tbl_role` WRITE;

insert  into `tbl_role`(`rId`,`roleName`,`status`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,'admin','active','2019-12-16 17:37:02',1,NULL,NULL),
(2,'user','active','2019-12-16 22:24:47',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `tbl_tasks` */

DROP TABLE IF EXISTS `tbl_tasks`;

CREATE TABLE `tbl_tasks` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `tDescription` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tTotalHours` int(11) DEFAULT NULL,
  `tProjectId` int(11) DEFAULT NULL,
  `tMileStoneId` int(11) DEFAULT NULL,
  `status` enum('Pendingstart','PendingFeedback','Active','Completed') COLLATE utf8mb4_bin DEFAULT NULL,
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`tId`),
  KEY `tProjectId` (`tProjectId`),
  KEY `createdAt` (`createdAt`),
  KEY `tMileStoneId` (`tMileStoneId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_tasks` */

LOCK TABLES `tbl_tasks` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_team` */

DROP TABLE IF EXISTS `tbl_team`;

CREATE TABLE `tbl_team` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `tName` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `tDescription` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT NULL,
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`tId`),
  KEY `createdAt` (`createdAt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_team` */

LOCK TABLES `tbl_team` WRITE;

insert  into `tbl_team`(`tId`,`tName`,`tDescription`,`status`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,'Test_1','Test_1','active','2019-12-26 16:01:30',1,'2019-12-26 17:20:55',1);

UNLOCK TABLES;

/*Table structure for table `tbl_team_members` */

DROP TABLE IF EXISTS `tbl_team_members`;

CREATE TABLE `tbl_team_members` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `tTeamId` int(11) DEFAULT NULL,
  `tTeamMemberId` int(11) DEFAULT NULL,
  `status` enum('active','Inactive') DEFAULT 'active',
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`tId`),
  KEY `ptTeamMemberId` (`tTeamMemberId`),
  KEY `createdAt` (`createdAt`),
  KEY `tTeamId` (`tTeamId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_team_members` */

LOCK TABLES `tbl_team_members` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_timesheet` */

DROP TABLE IF EXISTS `tbl_timesheet`;

CREATE TABLE `tbl_timesheet` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `times` float(15,2) DEFAULT NULL,
  `taskId` int(11) DEFAULT NULL,
  `projectId` int(11) DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT NULL,
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`tId`),
  KEY `taskId` (`taskId`),
  KEY `projectId` (`projectId`),
  KEY `createdAt` (`createdAt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_timesheet` */

LOCK TABLES `tbl_timesheet` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `uId` int(11) NOT NULL AUTO_INCREMENT,
  `uEmpId` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `uFirstName` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `uLastName` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `uEmail` varchar(76) COLLATE utf8mb4_bin DEFAULT NULL,
  `uMobileNo` bigint(11) DEFAULT NULL,
  `uPassword` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `uDeptId` int(11) DEFAULT NULL,
  `uRoleId` int(11) DEFAULT NULL,
  `status` enum('active','Inactive') COLLATE utf8mb4_bin DEFAULT 'active',
  `createdDate` datetime DEFAULT current_timestamp(),
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`uId`),
  KEY `roleId` (`uRoleId`),
  KEY `departmentId` (`uDeptId`)
) ENGINE=InnoDB AUTO_INCREMENT=337 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(`uId`,`uEmpId`,`uFirstName`,`uLastName`,`uEmail`,`uMobileNo`,`uPassword`,`uDeptId`,`uRoleId`,`status`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,NULL,'admin','admin','admin@admin.com',989899989,'e10adc3949ba59abbe56e057f20f883e',14,1,'active','2019-12-16 17:37:38',1,NULL,NULL),
(65,'TUG001','Abhinav ','Kumar Singh','abhinav@techugo.com',8130300085,'e10adc3949ba59abbe56e057f20f883e',12,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(66,'TUG002','Preeti ','Singh','preeti@techugo.com',9910111669,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(67,'TUG004','Ankit ','Singh','ankit.singh@techugo.com',7042209821,'e10adc3949ba59abbe56e057f20f883e',12,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(68,'TUG005','Purushottam','Kumar','purushottam@techugo.com',9711340700,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(69,'TUG011','Lakshman','Kumar','lakshman@techugo.com',7028714296,'e10adc3949ba59abbe56e057f20f883e',9,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(70,'TUG014','Alok ','Kumar Jha','alok@techugo.com',8630461835,'e10adc3949ba59abbe56e057f20f883e',9,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(71,'TUG019','Ankit ','Malhotra','ankit.malhotra@techugo.com',8699424717,'e10adc3949ba59abbe56e057f20f883e',6,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(72,'TUG026','Md','Junaid','junaid@techugo.com',9971602039,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(73,'TUG028','Rahul ','Kumar','rahul@techugo.com',8802606239,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(74,'TUG029','Beenu ','Rai','beenu.rai@techugo.com',9717431052,'e10adc3949ba59abbe56e057f20f883e',6,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(75,'TUG035','Arun ','Sharma','arun.sharma@techugo.com',8744802351,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(76,'TUG038','Henna ','Zakir','henna@techugo.com',8586972527,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(77,'TUG042','Ravendra','Kumar Singh','ravendra.singh@techugo.com',7017526371,'e10adc3949ba59abbe56e057f20f883e',5,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(78,'TUG048','Gunjan','Manral','gunjan.manral@techugo.com',8447880473,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(79,'TUG050','Qamar ','Abbas','qamar.abbas@techugo.com',9910985450,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(80,'TUG060','Namrata ','Kumari','namrata@techugo.com',8447809442,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(81,'TUG061','Bhavna','Puri','bhavna@techugo.com',0,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(82,'TUG062','Harjot','Kaur','harjot@techugo.com',8744862506,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(83,'TUG066','Deepak','Kumar Sharma','deepak.sharma@techugo.com',7065286213,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(84,'TUG068','Sunil ','Kumar Tripathi','sunil@techugo.com',8052512968,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(85,'TUG072','Naveen ','Shahi','naveen@techugo.com',8506814629,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(86,'TUG073','Ajay ','Pal','',7678363352,'e10adc3949ba59abbe56e057f20f883e',13,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(87,'TUG081','Kashish','Makkar','Kashish@techugo.com',8054183455,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(88,'TUG084','Deep ','Verma','Deep@techugo.com',9717975164,'e10adc3949ba59abbe56e057f20f883e',4,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(89,'TUG087','Shubham','Singh','shubham@techugo.com',9911225601,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(90,'TUG088','Ashutosh','Kumar','ashuthosh@techugo.com',8743888923,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(91,'TUG090','Love','Mahajan','lovemahajan@techugo.com',9855989824,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(92,'TUG092','Jullie','Singh','jullie@techugo.com',8368897541,'e10adc3949ba59abbe56e057f20f883e',11,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(93,'TUG094','Somesh','Mendiratta','somesh@techugo.com',7988489232,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(94,'TUG101','Deepak ','Kumar','',7065286213,'e10adc3949ba59abbe56e057f20f883e',13,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(95,'TUG102','Abhay ','Narayan','abhay@techugo.com',7840033848,'e10adc3949ba59abbe56e057f20f883e',4,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(96,'TUG104','Jahar','Singh','Jahar@techugo.com',9588868150,'e10adc3949ba59abbe56e057f20f883e',11,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(97,'TUG105','Anuradha','Jaiswal','anuradha@techugo.com',9971636562,'e10adc3949ba59abbe56e057f20f883e',5,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(98,'TUG107','Himanshu','Gupta','himanshu@techugo.com',9917050982,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(99,'TUG111','Vivek ','Indra','vivek.indra@techugo.com',9334383025,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(100,'TUG113','Tripti ','Bhardwaj','tripti@techugo.com',7500670455,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(101,'TUG114','Khushboo','Mohila','khushboo@techugo.com',7668999834,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(102,'TUG115','Manish','Kumar','manish@techugo.com',9650323295,'e10adc3949ba59abbe56e057f20f883e',6,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(103,'TUG117','Deepak ','Bansal','deepak.bansal@techugo.com',9467168209,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(104,'TUG118','Rishabh','Anand','rishabh.anand@techugo.com',9012239952,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(105,'TUG119','Ambuj ','Srivastava','Ambuj@techugo.com',7568317186,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(106,'TUG121','Raghu','Thakur','raghu@techugo.com',8368809060,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(107,'TUG122','Rakesh','','rakesh@techugo.com',9917015570,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(108,'TUG123','Nirmala','Gond','nirmala@techugo.com',8527387857,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(109,'TUG124','Akriti','Sharma','akriti@techugo.com',8630943809,'e10adc3949ba59abbe56e057f20f883e',4,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(110,'TUG125','Amar','Singh','amar@techugo.com',9999897377,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(111,'TUG129','Varsha','','varsha@techugo.com',8373920080,'e10adc3949ba59abbe56e057f20f883e',11,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(112,'TUG131','Rishabh','Arora','rishabh_arora@techugo.com',8527769961,'e10adc3949ba59abbe56e057f20f883e',6,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(113,'TUG134','Nadiya','Khatoon','nadiya@techugo.com',7379205515,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(114,'TUG135','Anand','Yadav','anand@techugo.com',7800130710,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(115,'TUG136','Anshu ','Shukla','anshu@techugo.com',7860180457,'e10adc3949ba59abbe56e057f20f883e',4,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(116,'TUG137','Somya','Bodoniya','somya@techugo.com',9519176636,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(117,'TUG141','Sumit ','Ruhela','sumit@techugo.com',8439389857,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(118,'TUG146','Shally ','Pathak','shally.pathak@techugo.com',8318548835,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(119,'TUG148','Akanksha','Singh','akansha.singh@techugo.com',9161042548,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(120,'TUG149','Ashish','Mishra','ashish.mishra@techugo.com',8004386091,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(121,'TUG150','Bhavya','Khatri','bhavya.khatri@techugo.com',8743840495,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(122,'TUG151','Abhinav ','Gupta','abhinav.gupta@techugo.com',9910165698,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(123,'TUG152','Deeksha','Srivastav','deekhsa@techugo.com',8299066768,'e10adc3949ba59abbe56e057f20f883e',5,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(124,'TUG153','Arjun','Sisodiya','arjun.sisodia@techugo.com',7983292471,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(125,'TUG154','Ishu','Mishra','ishu@techugo.com',8755474229,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(126,'TUG156','Shubham','','shubham.tyagi@techugo.com',9716429352,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(127,'TUG157','Mohd ','Shahnazar','shahnazar@techugo.com',8006112812,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(128,'TUG158','Aishwarya','Agarwal','aishwarya@techugo.com',9560908303,'e10adc3949ba59abbe56e057f20f883e',9,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(129,'TUG159','Amandeep','','amandeep@techugo.com',7428612346,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(130,'TUG160','Deepshikha','Garg','deepshikha@techugo.com',9953126208,'e10adc3949ba59abbe56e057f20f883e',6,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(131,'TUG161','Prakhar','Anand','prakhar.anand@techugo.com',6200556460,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(132,'TUG163','Manish','Sharma','manish.sharma@techugo.com',9910628991,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(133,'TUG165','Archana ','Rathore','archana@techugo.com',8076810162,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(134,'TUG166','Kamal ','Sharma','kamal@techugo.com',9873057350,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(135,'TUG168','Anuj','Garg','anuj@techugo.com',7838896008,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(136,'TUG169','Kunal ','Panday','kunal@techugo.com',9910536202,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(137,'TUG170','Deeksha','Singh','deeksha.singh@techugo.com',9711002063,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(138,'TUG171','Aastha','Sharma','astha.sharma@techugo.com',8377030284,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(139,'TUG172','Abdul','Rehman','abdul.rehman@techugo.com',9582089810,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(140,'TUG173','Veerendra','Kumar','veerendra@techugo.com',8003280043,'e10adc3949ba59abbe56e057f20f883e',5,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(141,'TUG175','Shwet','Shreyansh','shwet.sreyansh@techugo.com',7091521418,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(142,'TUG177','Vishivdeep ','Singh Hanspal','vishivdeep.singh@techugo.com',8882434435,'e10adc3949ba59abbe56e057f20f883e',6,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(143,'TUG178','Kuldeep ','Singh','kuldeep.singh@techugo.com',9354010866,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(144,'TUG179','Akash ','Kaushik','akash.kaushik@techugo.com',9758979777,'e10adc3949ba59abbe56e057f20f883e',5,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(145,'TUG181','Pawan','Kumar Agrahari','pawan@techugo.com',9696031782,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(146,'TUG182','Sandeep ','Rai','sandeep@techugo.com',9999341373,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(147,'TUG183','Vikash','Kumar','vikas@techugo.com',8130927259,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(148,'TUG184','Devesh','Chitkara','devesh@techugo.com',8700308240,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(149,'TUG186','Indranil','Chatterjee','indranil@techugo.com',8130728411,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(150,'TUG187','Vijay','Nailwal','vijay@techugo.com',9582973777,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(151,'TUG188','Vishal','Kumar','vishal.rana@techugo.com',9654197004,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(152,'TUG190','Arpit','Javerya','arpit@techugo.com',8851108434,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(153,'TUG191','Akshay ','Kumar','akshay@techugo.com',8076519909,'e10adc3949ba59abbe56e057f20f883e',10,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(154,'TUG192','Rakesh','Kumar Singh','rakesh.singh@techugo.com',7387654180,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(155,'TUG194','Priya ','Kaushik','priya@techugo.com',8510012066,'e10adc3949ba59abbe56e057f20f883e',11,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(156,'TUG195','Sandeep','Vishwakarma','sandeep.vishwakarma@techugo.com',9540978586,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(157,'TUG196','Neha ','Chaudhary','neha@techugo.com',8512828745,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(158,'TUG197','Prakash','Singh','prakash@techugo.com',7303423430,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(159,'TUG202','Rajpal','','rajpal@tecugo.com',9667472268,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(160,'TUG203','Vishal','Rana','vishal@techugo.com',8789111455,'e10adc3949ba59abbe56e057f20f883e',2,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(161,'TUG204','Ram','Vinay Kumar','ram.vinay@techugo.com',9911620103,'e10adc3949ba59abbe56e057f20f883e',1,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(162,'TUG205','Kanchan ','Chauhan','kanchan@techugo.com',8178436983,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(163,'TUG206','Akshit','Chaku','akshit@techugo.com',9990769273,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(164,'TUG207','Priya ','Chaudhary','priya.chaudhary@techugo.com',8860098581,'e10adc3949ba59abbe56e057f20f883e',5,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(165,'TUG208','Fajal','Muhammad','fajal@techugo.com',8630047406,'e10adc3949ba59abbe56e057f20f883e',10,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(166,'TUG209','Siddiqui','Sazid Ali','siddiqui.sazid@techugo.com',7982649286,'e10adc3949ba59abbe56e057f20f883e',3,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(167,'','Hashim ','Ilyas','hashim@techugo.com',8929888242,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(168,'','Piyush','Ahuja','piyush@techugo.com',8950345345,'e10adc3949ba59abbe56e057f20f883e',7,2,'active','2019-12-20 12:11:47',1,NULL,NULL),
(169,'','Sachin ','Raghav','Sachin@techugo.com',9990756109,'e10adc3949ba59abbe56e057f20f883e',8,2,'active','2019-12-20 12:11:47',1,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `tbl_user_email` */

DROP TABLE IF EXISTS `tbl_user_email`;

CREATE TABLE `tbl_user_email` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject` text CHARACTER SET utf8 DEFAULT NULL,
  `to` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `message` text CHARACTER SET utf8 DEFAULT NULL,
  `status` enum('pending','sending','sent','failed') CHARACTER SET utf8 DEFAULT 'pending',
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `tbl_user_email` */

LOCK TABLES `tbl_user_email` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
