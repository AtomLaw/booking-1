-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2012 at 03:32 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `argie_tamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
  `amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(100) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`amenities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenities_id`, `pic`, `des`) VALUES
(1, 'amenities/IconAC.jpg', 'Every room in the Tamera Plaza Inn has Air Conditioning. Each room has an easy-to-use remote control to set your comfort level without having to leave the bed.'),
(2, 'amenities/IconBkfst.jpg', 'Upon your arrival, you will recieve a complimentary "Welcome Drink" for your travel here. Also, there is Free Breakfast for all accomodations.'),
(3, 'amenities/IconCocktail.jpg', 'Located in the lobby, we offer a full-service Bar & Coffee Shop with a variety of beverages. '),
(4, 'amenities/IconFunction.jpg', 'Located on the 4th floor, we hold many activities for all occasions here in the Function Room. One can reserve this room for conferences, parties, and more.'),
(5, 'amenities/IconGen.jpg', 'We have generators on standby 24 hours a day, 7 days a week in an event of a "Brown Out", providing uninterrupted electricity service to the building.'),
(6, 'amenities/IconLaundry.jpg', 'Whether on business or pleasure, we provide laundry and pressing service here. We deliver your clothes to your room, or in person to accomodate your schedule.'),
(7, 'amenities/IconLongDist.jpg', 'Need to call home or send documents? We provide Fax services and phones equipped for Long Distance calls to home, the office, or anywhere in between.'),
(8, 'amenities/restaurantLG.jpg', 'Not only a great place to eat, but has great street-side view of Bacolod City. Try the famous "Tamera Chicken", great for the whole family!'),
(9, 'amenities/IconShower.jpg', 'Every room is individualy equipped with personal water heaters in the showers. Fully adjustable, you''ll always have a comfortable shower without burning or freezing yourself.'),
(10, 'amenities/IconTaxi.jpg', 'Have a meeting to go to or just want to go out? You can schedule trips anywhere around Bacolod City by utilizing our transportation service offered here.'),
(11, 'amenities/IconTV.jpg', 'No room would be complete without complimentary Cable TV and telephone service in every room. Channels may vary.'),
(12, 'amenities/SmIconWiFi.png', 'All area of Tamera Plaza Inn is wifi ready');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `content`) VALUES
(15, 'mecile', 'mecile_26oligo@yahoo.com', 'bhjkadgasj,dsads'),
(14, 'arlene', 'arlenepasigado@yahoo.com', 'ka gamai ka bed....\r\n\r\n\r\n\r\n\r\n'),
(13, 'qke.weqe', 'hannah@hotmail.com', 'wala ko mai e komment'),
(12, 'jhgjhgjhgjh', 'jhg', 'jhgjhg'),
(11, 'ttuyt', 'tuyt', 'uytuy'),
(10, 'gf', 'hfhgfhgfh', 'gfhgf'),
(16, 'poalo', 'i_love_jigen@yahoo.com', 'fdfd'),
(17, 'Firstname', 'i_love_jigen@yahoo.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE IF NOT EXISTS `recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `adult_start` int(11) NOT NULL,
  `adult_end` int(11) NOT NULL,
  `child_start` int(11) NOT NULL,
  `child_end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `depositDate` varchar(50) NOT NULL,
  `depositAmount` float NOT NULL,
  `depositBranch` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `province` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `adults` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `no_room` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  `eta` varchar(50) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `depositDate`, `depositAmount`, `depositBranch`, `firstname`, `lastname`, `city`, `zip`, `province`, `country`, `email`, `contact`, `username`, `password`, `arrival`, `departure`, `adults`, `child`, `result`, `room_id`, `no_room`, `payable`, `status`, `confirmation`, `eta`) VALUES
(1, '', 0, '', 'Paolo', 'Manarang', '', 0, '', '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, 0, 'out', '', ''),
(2, '', 0, '', '555', '555', '555', 555, '555', '555', 'paolo@email.com', 5555, '', '555', '', '', 0, 0, 0, 0, 0, 0, 'out', 'w632m4d8', ''),
(3, '', 0, '', 'Firstname', 'Lastname', 'City', 0, 'Address', '', 'Email', 0, '', 'Password', '', '', 0, 0, 0, 0, 0, 0, '', 'nemd0vp2', ''),
(4, '', 0, '', 'rere', 'ewew', 'ewe', 0, 'ewew', '', 'ewew@email.com', 3232, '', '', '01/03/2012', '08/03/2012', 1, 0, 7, 6, 1, 105000, '', '7h80znd6', ''),
(5, '', 0, '', 'rere', 'ewew', 'ewe', 0, 'ewew', '', 'ewew@email.com', 3232, '', '', '01/03/2012', '08/03/2012', 1, 0, 7, 6, 1, 105000, 'out', 't6yzaviv', ''),
(7, '', 0, '', 'rere', 'ewew', 'ewe', 0, 'ewew', '', 'ewew@email.com', 3232, '', '', '01/03/2012', '08/03/2012', 1, 0, 7, 6, 1, 105000, '', 'ibqz4wig', ''),
(8, '', 0, '', 'red', 'fd', 'fd', 0, 'fdfd', '', 'fdfd@email.com', 4343, '', '', '01/03/2012', '08/03/2012', 1, 0, 7, 6, 1, 105000, '', '5i3tzkx4', ''),
(9, '', 0, '', 'fd', 'fd', 'fd', 0, 'fd', '', 'fdfd@email.com', 4343, '', '', '01/03/2012', '08/03/2012', 1, 0, 7, 6, 1, 105000, '', 'tataw70t', ''),
(10, '', 0, '', 'fd', 'fd', 'fd', 0, 'fd', '', 'fdfd@email.com', 4343, '', '', '01/03/2012', '08/03/2012', 1, 0, 7, 6, 1, 105000, '', '4fexoqno', ''),
(12, '', 0, '', 'Paolo', 'Manarang', 'San Pablo City', 0, 'Teomora Village', '', 'paolo@email.com', 29, '', '', '', '', 0, 0, 0, 0, 0, 0, '', '4zg3kvpd', ''),
(13, 'Amount of Deposit', 0, '', 'poalo', 'Manarang', 'San Pablo City', 0, 'Teomora Village', '', 'paoloxandro@yahoo.com', 121212, '', '', '', '', 0, 0, 0, 0, 0, 0, '', 'ra2pr0g5', ''),
(14, 'Amount of Deposit', 0, '', 'poalo', 'Manarang', 'San Pablo City', 0, 'Teomora Village', '', 'paoloxandro@yahoo.com', 121212, '', '', '', '', 0, 0, 0, 0, 0, 0, '', 'edo4n6mf', ''),
(15, 'Amount of Deposit', 0, '', 'poalo', 'Manarang', 'San Pablo City', 0, 'Teomora Village', '', 'paoloxandro@yahoo.com', 121212, '', '', '10/03/2012', '11/03/2012', 0, 0, 1, 9, 1, 1100, 'out', 'dang5bp3', ''),
(16, '', 0, '', 'poalo', 'Manarang', 'San Pablo City', 0, 'Teomora Village', '', 'paoloxandro@yahoo.com', 121212, '', '', '10/03/2012', '11/03/2012', 1, 0, 1, 9, 1, 1100, '', 'pnkzg6q3', ''),
(17, '2012-03-04', 2000, 'Makati', 'poalo', 'Manarang', 'San Pablo City', 0, 'Teomora Village', '', 'paoloxandro@yahoo.com', 121212, '', '', '10/03/2012', '11/03/2012', 1, 0, 1, 9, 1, 1100, 'out', 'v8g7qyfd', ''),
(18, '', 0, '', 'roc', 'monte', 'sg', 0, 'sg', '', 'sg@email.com', 23324, '', '', '10/03/2012', '11/03/2012', 1, 0, 1, 9, 1, 1100, '', 's2cymvgy', '02:30'),
(19, '', 0, '', 'roc', 'monte', 'sg', 0, 'sg', '', 'paolo@email.com', 21232, '', '', '10/03/2012', '11/03/2012', 1, 0, 1, 9, 1, 1100, '', 'o7y62gtr', '01:30');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `min_adult` int(11) NOT NULL,
  `max_adult` int(11) NOT NULL,
  `min_child` int(11) NOT NULL,
  `max_child` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `type`, `rate`, `description`, `image`, `qty`, `min_adult`, `max_adult`, `min_child`, `max_child`) VALUES
(6, 'Superior', 15000, 'Fully air conditioned', 'photos/addemployee.png', 15, 4, 10, 4, 10),
(7, 'Deluxe', 1300, 'Fully air conditioned', 'photos/DeLuxe.jpg', 5, 3, 4, 3, 4),
(8, 'Standard Single', 950, 'Fully air conditioned', 'photos/Single.jpg', 3, 2, 3, 2, 3),
(9, 'Standard Double', 1100, 'Fully air conditioned', 'photos/images.jpg', 3, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roominventory`
--

CREATE TABLE IF NOT EXISTS `roominventory` (
  `roominventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `qty_reserve` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `eta` varchar(50) NOT NULL,
  PRIMARY KEY (`roominventory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `roominventory`
--

INSERT INTO `roominventory` (`roominventory_id`, `arrival`, `departure`, `qty_reserve`, `room_id`, `confirmation`, `status`, `eta`) VALUES
(1, '', '', 0, 0, 'w632m4d8', 'out', ''),
(2, '', '', 0, 0, 'nemd0vp2', 'Active', ''),
(3, '01/03/2012', '08/03/2012', 1, 6, '7h80znd6', 'Active', ''),
(4, '01/03/2012', '08/03/2012', 1, 6, 't6yzaviv', 'out', ''),
(5, '01/03/2012', '08/03/2012', 1, 6, 'emkmcpgb', 'Active', ''),
(6, '01/03/2012', '08/03/2012', 1, 6, 'ibqz4wig', 'Active', ''),
(7, '01/03/2012', '08/03/2012', 1, 6, '5i3tzkx4', 'Active', ''),
(8, '01/03/2012', '08/03/2012', 1, 6, 'tataw70t', 'Active', ''),
(9, '01/03/2012', '08/03/2012', 1, 6, '4fexoqno', 'Active', ''),
(10, '', '', 0, 0, '', '', ''),
(11, '', '', 0, 0, '4zg3kvpd', 'Active', ''),
(12, '', '', 0, 0, 'ra2pr0g5', 'Active', ''),
(13, '', '', 0, 0, 'edo4n6mf', 'Active', ''),
(14, '10/03/2012', '11/03/2012', 1, 9, 'dang5bp3', 'out', ''),
(15, '10/03/2012', '11/03/2012', 1, 9, 'pnkzg6q3', 'Active', ''),
(16, '10/03/2012', '11/03/2012', 1, 9, 'v8g7qyfd', 'out', '02:30'),
(17, '10/03/2012', '11/03/2012', 1, 9, 's2cymvgy', 'Active', '02:30'),
(18, '10/03/2012', '11/03/2012', 1, 9, 'o7y62gtr', 'Active', '01:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'argie', 'argie', 'frontdesk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
