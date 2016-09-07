-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2016 at 11:06 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `radius`
--

CREATE TABLE IF NOT EXISTS `radius` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `radius`
--

INSERT INTO `radius` (`id`, `name`, `value`) VALUES
(1, '5 Km', 5),
(2, '10 Km', 10),
(3, '15 Km', 15),
(4, '20 Km', 20),
(5, '25 Km', 25);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_start` varchar(80) NOT NULL,
  `address_end` varchar(80) DEFAULT NULL,
  `lat_start_x` float(10,6) NOT NULL,
  `lng_start_y` float(10,6) NOT NULL,
  `lat_end_x` float(10,6) DEFAULT NULL,
  `lng_end_y` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `user_id`, `address_start`, `address_end`, `lat_start_x`, `lng_start_y`, `lat_end_x`, `lng_end_y`) VALUES
(17, 19, '224 Điện Biên Phủ, phường 7, Quận 3, Hồ Chí Minh, Vietnam', '125 Nguyễn Thị Tần, phường 2, Quận 8, Hồ Chí Minh, Vietnam', 10.782032, 106.689011, 10.746037, 106.686272),
(18, 19, '125 Nguyễn Thị Tần, phường 2, Quận 8, Hồ Chí Minh, Vietnam', '224 Điện Biên Phủ, phường 7, Quận 3, Hồ Chí Minh, Vietnam', 10.746037, 106.686272, 10.782032, 106.689011),
(19, 20, '157 Dương Bá Trạc, phường 1, Quận 8, Hồ Chí Minh, Vietnam', '145 Nam Kỳ Khởi Nghĩa, phường 6, Quận 3, Hồ Chí Minh, Vietnam', 10.747519, 106.688744, 10.781207, 106.692993),
(20, 20, '145 Nam Kỳ Khởi Nghĩa, phường 6, Quận 3, Hồ Chí Minh, Vietnam', '157 Dương Bá Trạc, phường 1, Quận 8, Hồ Chí Minh, Vietnam', 10.781207, 106.692993, 10.747519, 106.688744),
(27, 19, '100 Nguyễn Thị Minh Khai, phường 6, Quận 3, Hồ Chí Minh, Vietnam', '299 Trần Hưng Đạo, phường 10, Quận 5, Hồ Chí Minh, Vietnam', 10.780133, 106.695236, 10.751937, 106.662483),
(28, 19, '157 Dương Bá Trạc, phường 1, Quận 8, Hồ Chí Minh, Vietnam', '200 Nguyễn Thị Minh Khai, phường 6, Quận 3, Hồ Chí Minh, Vietnam', 10.747519, 106.688744, 10.775546, 106.690590);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `created_at`, `active`) VALUES
(19, 'batman', '$2y$08$ZfNjxHRa8dQZuU8pcZBsQOvTmUqQl/BA8HJ/DnrXvTeybORsIMzAi', 'Batman Return', 'batman@gmail.com', '2016-08-26 02:59:26', 'Y'),
(20, 'superman', '$2y$08$NMRpr02ovo0Rc5j4Nj5wQeNoPjz3jTFFQwrnw40OR.GnIhNu3IZvu', 'Superman Return', 'superman@gmail.com', '2016-08-26 04:17:47', 'Y'),
(21, 'lyphu', '$2y$08$uVwCYhpp5PJToFgcqjfsv.Eq8WDLkqAeHftM48mn71d/Lvd3zY/Xe', 'Ly Phu', 'lyphu@gmail.com', '2016-08-29 03:14:41', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_user_profile_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
