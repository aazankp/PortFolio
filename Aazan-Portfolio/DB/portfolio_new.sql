/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.38-MariaDB : Database - portfolio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`portfolio` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `portfolio`;

/*Table structure for table `portfolioformdata` */

DROP TABLE IF EXISTS `portfolioformdata`;

CREATE TABLE `portfolioformdata` (
  `PortFolio_Id` int(11) NOT NULL AUTO_INCREMENT,
  `about` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `education` longtext NOT NULL,
  `services` longtext NOT NULL,
  `experiences` longtext NOT NULL,
  `skills` longtext NOT NULL,
  `projects` longtext NOT NULL,
  `portfolioUrl` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`PortFolio_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `portfolioformdata` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `oldPassword` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `workUrl` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otpSend` int(11) DEFAULT '0',
  `otpVerified` int(11) DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
