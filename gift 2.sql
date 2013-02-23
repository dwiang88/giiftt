-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2013 at 02:16 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `giiftt`
--

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE IF NOT EXISTS `background` (
  `BackgroundID` int(11) NOT NULL AUTO_INCREMENT,
  `NamaBackground` varchar(100) NOT NULL,
  `BackgroundType` varchar(100) NOT NULL,
  PRIMARY KEY (`BackgroundID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--


-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `FotoID` int(11) NOT NULL AUTO_INCREMENT,
  `FotoName` text NOT NULL,
  `FotoType` varchar(10) NOT NULL,
  `FotoSize` int(11) NOT NULL,
  PRIMARY KEY (`FotoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--


-- --------------------------------------------------------

--
-- Table structure for table `fotocollection`
--

CREATE TABLE IF NOT EXISTS `fotocollection` (
  `FotoCollectionID` varchar(100) NOT NULL,
  `FotoCollectionDate` date NOT NULL,
  `FotoCollectionName` varchar(100) NOT NULL,
  `BisnisStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`FotoCollectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotocollection`
--


-- --------------------------------------------------------

--
-- Table structure for table `fotocollection_isi`
--

CREATE TABLE IF NOT EXISTS `fotocollection_isi` (
  `FotoCollectionID` varchar(100) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `FotoName` text NOT NULL,
  `Halaman` int(11) NOT NULL,
  `TemplateID` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Urutan` int(11) NOT NULL,
  `BackgroundID` int(11) NOT NULL,
  PRIMARY KEY (`FotoCollectionID`,`FotoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotocollection_isi`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_cart`
--

CREATE TABLE IF NOT EXISTS `order_cart` (
  `OrderID` varchar(100) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `TanggalOrder` datetime NOT NULL,
  `Ukuran` int(11) NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `JumlahHalaman` int(11) NOT NULL,
  `KuantitasBarang` int(11) NOT NULL,
  `StatusBayar` varchar(50) NOT NULL,
  `TanggalBayar` datetime NOT NULL,
  `Alamat` text NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `SendTo` text NOT NULL,
  `FotoCollectionID` varchar(100) NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `sessionlog`
--

CREATE TABLE IF NOT EXISTS `sessionlog` (
  `SessionID` varchar(200) NOT NULL,
  `IpAddress` varchar(50) NOT NULL,
  `UserAgent` varchar(200) NOT NULL,
  `SessionDate` datetime NOT NULL,
  PRIMARY KEY (`SessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessionlog`
--


-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `TemplateID` int(11) NOT NULL AUTO_INCREMENT,
  `TemplateName` varchar(100) NOT NULL,
  `MaxFoto` int(11) NOT NULL,
  PRIMARY KEY (`TemplateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NamaUser` varchar(200) NOT NULL,
  `AlamatUser` text NOT NULL,
  `KodePos` varchar(10) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Handphone` varchar(50) NOT NULL,
  `LoginType` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

