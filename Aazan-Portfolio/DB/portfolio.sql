/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.21-MariaDB : Database - portfolio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`portfolio` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `portfolio`;

/*Table structure for table `portfolioformdata` */

DROP TABLE IF EXISTS `portfolioformdata`;

CREATE TABLE `portfolioformdata` (
  `PortFolio_Id` binary(16) NOT NULL,
  `about` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `education` longtext NOT NULL,
  `services` longtext NOT NULL,
  `experiences` longtext NOT NULL,
  `skills` longtext NOT NULL,
  `projects` longtext NOT NULL,
  `portfolioUrl` varchar(255) NOT NULL,
  `userId` binary(16) NOT NULL,
  PRIMARY KEY (`PortFolio_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `portfolioformdata` */

insert  into `portfolioformdata`(`PortFolio_Id`,`about`,`contact`,`education`,`services`,`experiences`,`skills`,`projects`,`portfolioUrl`,`userId`) values ('0f56ba43-20e7-4d','{\"aboutDescription\":\"ksjhfdkshfkjsdhf\"}','{\"Description\":\"ksjhfdkshfkjsdhf\"}','','','','','','localhost/new_work/Verge/PortFolio/Aazan-Portfolio/portfolio.php?pId=47b18925-aa89-49','47b18925-aa89-49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` binary(16) NOT NULL,
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
  `otpSend` int(11) DEFAULT 0,
  `otpVerified` int(11) DEFAULT 0,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userId`,`fullName`,`email`,`address`,`mobile`,`password`,`oldPassword`,`profile`,`occupation`,`workUrl`,`resume`,`otp`,`otpSend`,`otpVerified`) values ('47b18925-aa89-49','Aazan Khan','aazank517@gmail.com','Pathan goth','03118679523','0a3604d01bfddeb1e5ee946ecd1c8272','0a3604d01bfddeb1e5ee946ecd1c8272','4839_1716897176.jpg','Software Engineer','https://github.com/aazankp/PortFolio.git','5272_1716889447.pdf',NULL,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
