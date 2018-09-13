-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: hour_tracker
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `hour_log`
--


DROP TABLE IF EXISTS `hour_log`;

CREATE TABLE `hour_log`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `job_date` varchar(255) NOT NULL,
    `job_hours` decimal(10,2) NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


LOCK TABLES `hour_log` WRITE;
UNLOCK TABLES;



DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`email` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;

INSERT INTO `admin` VALUES(
    1, 'hourlog@test.com',
    'password'
);

UNLOCK TABLES;