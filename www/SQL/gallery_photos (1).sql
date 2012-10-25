-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2012 at 08:27 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site-idcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE IF NOT EXISTS `gallery_photos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `slideShow` enum('0','1') NOT NULL,
  `idAlbum` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`id`, `path`, `slideShow`, `idAlbum`) VALUES
(1, '/files/photos/1.jpg', '1', 1),
(2, '/files/photos/2.jpg', '1', 2),
(3, '/files/photos/3.jpg', '1', 3),
(4, '/files/photos/4.jpg', '1', 4),
(5, '/files/photos/5.jpg', '1', 1),
(6, '/files/photos/6.jpg', '1', 1);
