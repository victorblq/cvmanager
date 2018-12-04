-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: imobiliaria
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

--
-- Table structure for table `ci_sessions`
--
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `usuario`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--
INSERT INTO `users` VALUES 
(1, 'Administrator', 'admin', '390e9e095b372783208dcaa5119404e10a689388aecd5e59d71a699c81e7d538b66750303885143866b74d3d64a6d6721c5d91bca4365cee2d053663edd73adeiiT+yUyXG9MUAIbyrGNLzC6VCc3JdQXLV9xb5LUIQmQ=','admin@admin.com');

-- Dump completed on 2018-08-31 15:05:47