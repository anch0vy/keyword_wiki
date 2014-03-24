-- Adminer 4.0.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+09:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `keyword_wiki` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `keyword_wiki`;

CREATE TABLE `keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `history_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE `keyword_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `synonyms` text NOT NULL,
  `link` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- 2014-03-24 22:39:02