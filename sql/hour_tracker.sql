
--Databse: hour_tracker


DROP TABLE IF EXISTS `hour_log`;

CREATE TABLE `hour_log`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `job_date` varchar(255) NOT NULL,
    `job_hours` decimal(10,2) NOT NULL,
    `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


LOCK TABLES `account` WRITE;
UNLOCK TABLES;