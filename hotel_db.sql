-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2016 at 12:44 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_date` date NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `total_room` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE IF NOT EXISTS `booking_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `description`, `date`) VALUES
(1, 'Kyaw Zin Tun', 'kyawzintun@gmail.com', 'feedback feedback feedback feedback ', '2016-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `address`, `email`, `rating`, `location_id`) VALUES
(14, 'Sedona', 'sedona@gmail.com', 'sedona@hotmail.com', 4, 1),
(16, 'Hotel Mandalay', 'Chan Aye Thar Zan Township', 'hotelmandalay@gmail.com', 5, 2),
(17, 'Hotel Bagan', 'Nyaung Oo', 'hotelbagan@gmail.com', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`) VALUES
(1, 'Yangon'),
(2, 'Mandalay'),
(3, 'Bagan');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `card_number` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `expire_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_db`
--

CREATE TABLE IF NOT EXISTS `room_db` (
  `id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `room_type` int(11) NOT NULL,
  `hotel_name` char(50) NOT NULL,
  `room_inform` text NOT NULL,
  `room_image` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_db`
--

INSERT INTO `room_db` (`id`, `room_no`, `room_type`, `hotel_name`, `room_inform`, `room_image`, `price`) VALUES
(52, 100, 1, '14', 'lorem lorem lorem lorem ', 'single.jpg', 120),
(53, 101, 1, '14', 'lorem lorem lorem lorem', 'single.jpg', 120),
(54, 102, 1, '14', 'lorem loremlorem loremlorem lorem', 'single.jpg', 120),
(55, 103, 1, '14', 'lorem loremlorem loremlorem lorem', 'single.jpg', 120),
(56, 104, 1, '14', 'lorem loremlorem loremlorem lorem', 'single.jpg', 120),
(57, 105, 1, '14', 'lorem loremlorem lorem', 'single.jpg', 120),
(58, 106, 1, '14', 'lorem loremlorem lorem', 'single.jpg', 120),
(59, 107, 1, '14', 'lorem loremlorem lorem', 'single.jpg', 120),
(60, 108, 1, '14', 'lorem loremlorem lorem', 'single.jpg', 120),
(61, 109, 1, '14', 'lorem loremlorem lorem', 'single.jpg', 120),
(62, 110, 1, '14', 'lorem loremlorem lorem', 'single.jpg', 120),
(63, 111, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(64, 112, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(65, 113, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(66, 114, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(67, 115, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(68, 116, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(69, 117, 2, '14', 'lorem loremlorem loremlorem lorem', 'double.jpg', 130),
(70, 118, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(71, 119, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(72, 120, 2, '14', 'lorem loremlorem lorem', 'double.jpg', 130),
(73, 121, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(74, 122, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(75, 123, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(76, 124, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(77, 125, 4, '14', '', 'Twin.jpg', 140),
(78, 126, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(79, 127, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(80, 128, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(81, 129, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(82, 130, 4, '14', 'lorem loremlorem lorem', 'Twin.jpg', 140),
(83, 200, 1, '16', 'lorem ip sum lorem ip sum', 'room1.jpg', 120),
(84, 201, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(85, 202, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(86, 203, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(87, 204, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(88, 205, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(89, 206, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(90, 207, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(91, 208, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(92, 209, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(93, 210, 1, '16', 'lorem ip sum lorem ipsum', 'room1.jpg', 120),
(94, 211, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(95, 212, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(96, 213, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(97, 214, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(98, 215, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(99, 216, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(100, 217, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(101, 218, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(102, 219, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(103, 220, 2, '16', 'lorem ip sum lorem ipsum', 'room2.jpg', 130),
(104, 221, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(105, 222, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(106, 223, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(107, 224, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(108, 225, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(109, 226, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(110, 227, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(111, 228, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(112, 229, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(113, 230, 4, '16', 'lorem ip sum lorem ipsum', 'room3.jpg', 140),
(114, 300, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(115, 301, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(116, 302, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(117, 303, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(118, 304, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(119, 305, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(120, 306, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(121, 307, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(122, 308, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(123, 309, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(124, 310, 1, '17', 'lorem ipsum lorem ipsum', 'bagan-single.jpg', 120),
(125, 311, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(126, 312, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(127, 313, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(128, 314, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(129, 315, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(130, 316, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(131, 317, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(132, 318, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(133, 319, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(134, 320, 2, '17', 'lorem ipsum lorem ipsum', 'bagan-double.jpg', 130),
(135, 321, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(136, 322, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(137, 323, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(138, 324, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(139, 325, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(140, 326, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(141, 327, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(142, 328, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(143, 329, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140),
(144, 330, 4, '17', 'lorem ipsum lorem ipsum', 'bagan-twin.jpg', 140);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Double'),
(4, 'Twin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `nrc_no` varchar(30) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `nrc_no`, `phone_no`, `email`, `address`, `password`, `confirm_password`, `status`) VALUES
(1, 'Admin', '', '123', 123, 'admin@gmail.com', 'Yangon', 'admin', 'admin', 1),
(2, 'Test', 'User', '456', 456, 'test@gmail.com', 'Yangon', 'test', 'test', 0),
(3, 'User', 'One', '789', 789, 'user@gmail.com', 'Yangon', 'user', 'user', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
