#
# SQL Export
# Created by Querious (201026)
# Created: May 4, 2018 at 11:32:15 PM GMT-4
# Encoding: Unicode (UTF-8)
#


DROP DATABASE IF EXISTS `hotelDB`;
CREATE DATABASE `hotelDB` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE `hotelDB`;




CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `desc` varchar(225) NOT NULL DEFAULT '',
  `image` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL DEFAULT '',
  `email` varchar(225) NOT NULL DEFAULT '',
  `password` char(64) NOT NULL DEFAULT '',
  `admin` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `approved` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `reservation_ibfk_3` (`user_id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




