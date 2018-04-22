#
# SQL Export
# Created by Querious (201026)
# Created: April 22, 2018 at 4:11:30 PM GMT-4
# Encoding: Unicode (UTF-8)
#


CREATE DATABASE IF NOT EXISTS `hotelDB` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE `hotelDB`;




CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(25) NOT NULL,
  `hotel_desc` varchar(225) NOT NULL,
  `hotel_image` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(225) NOT NULL DEFAULT '',
  `user_email` varchar(225) NOT NULL,
  `user_password` char(64) NOT NULL,
  `user_admin` bit(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `reservation_approved` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`reservation_id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `reservation_ibfk_3` (`user_id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




