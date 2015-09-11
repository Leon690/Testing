-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2015 at 01:58 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `noticias`
--

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `fecha` text NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `fecha`, `userId`) VALUES
(15, '222', '22', '1441891946', 46),
(16, 'asdasd', 'asdasdas', '1441893272', 46),
(18, 'NUMBER', 'number numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumber numbernumbe', '1441893343', 46),
(19, 'LOREM IPSUM', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. In finibus, mi a sollicitudin sagittis, lectus massa mattis diam, a semper erat dui vulputate urna. In at libero facilisis, bibendum sapien eu', '1441893419', 46);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
