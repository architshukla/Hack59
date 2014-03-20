-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2014 at 10:53 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hack59`
--
CREATE DATABASE IF NOT EXISTS `hack59` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hack59`;

-- --------------------------------------------------------

--
-- Table structure for table `eventmembers`
--

CREATE TABLE IF NOT EXISTS `eventmembers` (
  `eventid` int(11) NOT NULL,
  `membername` varchar(40) NOT NULL,
  `amount` float NOT NULL,
  `what` varchar(50) NOT NULL,
  PRIMARY KEY (`eventid`,`membername`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventmembers`
--

INSERT INTO `eventmembers` (`eventid`, `membername`, `amount`, `what`) VALUES
(2, 'something', 9000, ''),
(3, 'archit', 794, ''),
(3, 'cat', 562, ''),
(3, 'rohit', 210, ''),
(3, 'sandeep', 371, ''),
(4, 'archit', 1000, 'food'),
(4, 'cat', 562, ''),
(4, 'rohit', 210, ''),
(4, 'sandeep', 371, '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(40) NOT NULL,
  `creatorname` varchar(40) NOT NULL,
  `settled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventid`,`creatorname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `eventname`, `creatorname`, `settled`) VALUES
(3, 'dummyevent', 'archit', 1),
(4, 'dummyevent', 'archit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poolevents`
--

CREATE TABLE IF NOT EXISTS `poolevents` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(40) NOT NULL,
  `creatorname` varchar(40) NOT NULL,
  `settled` tinyint(1) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `poolevents`
--

INSERT INTO `poolevents` (`eventid`, `eventname`, `creatorname`, `settled`, `amount`) VALUES
(1, 'dummyevent', 'archit', 1, 10000),
(2, 'dummyevent', 'archit', 0, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `poolmembers`
--

CREATE TABLE IF NOT EXISTS `poolmembers` (
  `eventid` int(11) NOT NULL,
  `membername` varchar(40) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poolmembers`
--

INSERT INTO `poolmembers` (`eventid`, `membername`, `amount`) VALUES
(1, 'rohit', 10000),
(1, 'sandeep', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
