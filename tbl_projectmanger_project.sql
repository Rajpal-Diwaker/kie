/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 5.7.28-0ubuntu0.18.04.4 : Database - Techugo_backend_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_projectmanger_project` */

DROP TABLE IF EXISTS `tbl_projectmanger_project`;

CREATE TABLE `tbl_projectmanger_project` (
  `ptId` int(11) NOT NULL AUTO_INCREMENT,
  `ptProjectId` int(11) DEFAULT NULL,
  `ptTeamId` int(11) DEFAULT NULL,
  `ptTeamMemberId` int(11) DEFAULT NULL,
  `ptdailyHours` float(15,2) DEFAULT NULL,
  `status` enum('active','Inactive') CHARACTER SET utf8mb4 DEFAULT 'active',
  `createdDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `createdAt` int(11) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL,
  PRIMARY KEY (`ptId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_projectmanger_project` */

LOCK TABLES `tbl_projectmanger_project` WRITE;

insert  into `tbl_projectmanger_project`(`ptId`,`ptProjectId`,`ptTeamId`,`ptTeamMemberId`,`ptdailyHours`,`status`,`createdDate`,`createdAt`,`updatedDate`,`updatedAt`) values 
(1,1,1,75,1.00,'active','2020-01-09 10:41:21',1,'2020-01-09 11:32:34',1),
(2,2,2,68,3.00,'active','2020-01-09 11:18:53',1,NULL,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
