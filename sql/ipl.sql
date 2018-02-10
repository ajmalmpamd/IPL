-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 06:12 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ipl`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `session_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `operation` varchar(36) NOT NULL,
  `description` varchar(200) NOT NULL,
  `tm` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `home_team` int(11) NOT NULL,
  `away_team` int(11) NOT NULL,
  `winner` int(11) NOT NULL DEFAULT '0',
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id`, `date`, `home_team`, `away_team`, `winner`, `status`) VALUES
(1, '2018-03-01', 1, 2, 0, ''),
(2, '2018-03-02', 3, 4, 0, ''),
(3, '2018-03-03', 1, 3, 0, ''),
(4, '2018-03-04', 2, 4, 0, ''),
(5, '2018-03-05', 2, 1, 0, ''),
(6, '2018-03-06', 4, 3, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
`id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `team` int(11) NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `designation`, `image`, `about`, `team`, `status`) VALUES
(1, 'Player1', 'Captain', 'p20580385.jpg', 'about', 1, 'Y'),
(2, 'Player b1', 'Captain', 'p20940255.jpg', 'about', 2, 'Y'),
(3, 'Player c1', 'Captain', 'p21000613.jpg', 'about', 3, 'Y'),
(4, 'Player d1', 'Captain', 'p21000848.jpg', 'about', 4, 'Y'),
(5, 'Player2', 'Batsman', 'p21060123.jpg', 'about', 1, 'Y'),
(6, 'Player3', 'Batsman', 'p21060750.jpg', 'about', 1, 'Y'),
(7, 'Player4', 'Batsman', 'p21060527.jpg', 'about', 1, 'Y'),
(8, 'Player b2', 'Batsman', 'p20940511.jpg', 'about', 2, 'Y'),
(9, 'Player b3', 'Batsman', 'p20940809.jpg', 'about', 2, 'Y'),
(10, 'Player b4', 'Batsman', 'p20940242.jpg', 'about', 2, 'Y'),
(11, 'Player c2', 'Batsman', 'p21000757.jpg', 'about', 3, 'Y'),
(12, 'Player c3', 'Batsman', 'p21000184.jpg', 'about', 3, 'Y'),
(13, 'Player c4', 'Batsman', 'p21000832.jpg', 'about', 3, 'Y'),
(14, 'Player d2', 'Batsman', 'p21000652.jpg', 'about', 4, 'Y'),
(15, 'Player d3', 'Batsman', 'p21060652.jpg', 'about', 4, 'Y'),
(16, 'Player d4', 'Batsman', 'p21060946.jpg', 'about', 4, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `venue`, `image`, `address`, `status`) VALUES
(1, 'Team A', 'venue1', 'p20400562.png', 'address1', 'Y'),
(2, 'Team B', 'venue2', 'p20400172.png', 'address2', 'Y'),
(3, 'Team C', 'venue3', 'p20400538.png', 'address3', 'Y'),
(4, 'Team D', 'venue4', 'p20400172.png', 'address4', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
