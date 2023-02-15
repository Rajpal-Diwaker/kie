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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
