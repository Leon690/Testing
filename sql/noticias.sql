-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2015 at 06:53 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `fecha`, `userId`) VALUES
(24, 'THE MATRIX', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In finibus, mi a sollicitudin sagittis, lectus massa mattis diam, a semper erat dui vulputate urna. In at libero facilisis, bibendum sapien euLorem ipsum dolor sit amet, consectetur adipiscing elit. In finibus, mi a sollicitudin sagittis, lectus massa mattis diam, a semper erat dui vulputate urna. In at libero facilisis, bibendum sapien euLorem ipsum dolor sit amet, consectetur adipiscing elit. In finibus, mi a sollicitudin sagittis, lectus massa mattis diam, a semper erat dui vulputate urna. In at libero facilisis, bibendum sapien eu', '1441895421', 46),
(47, 'admin++', 'admin+9+', '1441996493', 96);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick` (`nick`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `pass`, `role`) VALUES
(92, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(93, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
