-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 12:10 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(25) NOT NULL,
  `hotel_desc` varchar(225) NOT NULL,
  `hotel_image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_desc`, `hotel_image`) VALUES
(1, 'Best Western', 'Located in downtown Montreal, with a free parking space and a very cozy ambience. Perfect for family vacations. Breakfast included.', '../assets/bestwestern.jpg'),
(2, 'Holiday Inn', 'Holiday Inn is located in the heart of the historic center of Old Montreal in an extremely quiet and lively area within short walk distance to all sites and is surrounded by the extraordinary beauty of churches.', '../assets/holidayinn.jpg'),
(3, 'Hotel Le Dauphin', 'The hotel Le Dauphin is the right choice for visitors who are searching for a combination of charm, peace and quiet, and a convenient position from which to explore Montreal.', '../assets/ledauphin.jpg'),
(4, 'Marriott', 'Great for businesses trips, very well located near downtown. Since we try to keep this ambience, kids are not allowed in this hotel.', '../assets/marriott.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `reservation_approved` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `hotel_id`, `reservation_approved`) VALUES
(1, 22, 3, b'1'),
(2, 19, 4, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL DEFAULT '',
  `user_email` varchar(225) NOT NULL,
  `user_password` char(64) NOT NULL,
  `user_admin` bit(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_admin`) VALUES
(19, 'daniel', 'daniel@hotmail.com', '$2y$10$oVpwO/IDULs0F1kmtdH70OjHUOkeD.7ZK7IdieN7mGg9OMLuc28lC', NULL),
(20, 'jiawei', 'jiawei@hotmail.com', '$2y$10$a9wUMQfy2bCKJZQvJm5jsuErdK.lgPHYfF.3zBcudvZlLjrB3H.Mi', NULL),
(22, 'admin', 'admin@admin.com', 'admin', b'1'),
(23, 'Jiawei', 'jiaweizhao@hotmail.com', '$2y$10$A4EawNwxPo75/56UQ/CKBuxAx731fM/68KdCN2m6OlOWO.aa.HsK2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `reservation_ibfk_3` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
