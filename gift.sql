/*
SQLyog Trial v11.01 (64 bit)
MySQL - 5.5.8 : Database - giiftt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`giiftt` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `giiftt`;

/*Table structure for table `background` */

DROP TABLE IF EXISTS `background`;

CREATE TABLE `background` (
  `BackgroundID` int(11) NOT NULL AUTO_INCREMENT,
  `NamaBackground` varchar(100) NOT NULL,
  `BackgroundType` varchar(100) NOT NULL,
  PRIMARY KEY (`BackgroundID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `background` */

/*Table structure for table `foto` */

DROP TABLE IF EXISTS `foto`;

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL AUTO_INCREMENT,
  `FotoName` text NOT NULL,
  `FotoType` varchar(10) NOT NULL,
  `FotoSize` int(11) NOT NULL,
  PRIMARY KEY (`FotoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `foto` */

/*Table structure for table `fotocollection` */

DROP TABLE IF EXISTS `fotocollection`;

CREATE TABLE `fotocollection` (
  `FotoCollectionID` varchar(100) NOT NULL,
  `FotoCollectionDate` date NOT NULL,
  `FotoCollectionName` varchar(100) NOT NULL,
  `BisnisStatus` enum('public','private','public_sell') NOT NULL,
  PRIMARY KEY (`FotoCollectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fotocollection` */

/*Table structure for table `fotocollection_isi` */

DROP TABLE IF EXISTS `fotocollection_isi`;

CREATE TABLE `fotocollection_isi` (
  `FotoCollectionID` varchar(100) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `FotoName` text NOT NULL,
  `Halaman` int(11) NOT NULL,
  `TemplateID` int(11) NOT NULL,
  `Type` enum('canvas','halaman','cover') NOT NULL,
  `Urutan` int(11) NOT NULL,
  `BackgroundID` int(11) NOT NULL,
  PRIMARY KEY (`FotoCollectionID`,`FotoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fotocollection_isi` */

/*Table structure for table `order_cart` */

DROP TABLE IF EXISTS `order_cart`;

CREATE TABLE `order_cart` (
  `OrderID` varchar(100) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `TanggalOrder` datetime NOT NULL,
  `Ukuran` int(11) NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `JumlahHalaman` int(11) NOT NULL,
  `KuantitasBarang` int(11) NOT NULL,
  `StatusBayar` enum('pending','paid','checkout','cancel') NOT NULL DEFAULT 'checkout',
  `TanggalBayar` datetime NOT NULL,
  `Alamat` text NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `SendTo` text NOT NULL,
  `FotoCollectionID` varchar(100) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `order_cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_cart` */

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_uri` varchar(50) NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `business_status` enum('public','private') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_uri` (`product_uri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

/*Table structure for table `product_detail` */

DROP TABLE IF EXISTS `product_detail`;

CREATE TABLE `product_detail` (
  `product_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_detail` */

/*Table structure for table `sessionlog` */

DROP TABLE IF EXISTS `sessionlog`;

CREATE TABLE `sessionlog` (
  `SessionID` varchar(200) NOT NULL,
  `IpAddress` varchar(50) NOT NULL,
  `UserAgent` varchar(200) NOT NULL,
  `SessionDate` datetime NOT NULL,
  PRIMARY KEY (`SessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sessionlog` */

/*Table structure for table `template` */

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template` (
  `TemplateID` int(11) NOT NULL AUTO_INCREMENT,
  `TemplateName` varchar(100) NOT NULL,
  `MaxFoto` int(11) NOT NULL,
  PRIMARY KEY (`TemplateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `template` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `UserID` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NamaUser` varchar(200) NOT NULL,
  `AlamatUser` text NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Handphone` varchar(50) NOT NULL,
  `LoginType` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
