-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2014 at 11:37 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `block` varchar(2) NOT NULL,
  `flatnumber` int(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `block`, `flatnumber`, `mobile`, `password`, `filename`) VALUES
(1, 'Neeraj', 'Pant', 'neeraj@gmail.com', 'A1', 1203, '9999999999', 'e73efee274e35cd0f133624774d16006', 'neeraj@gmail.com.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `bulletin`
--

CREATE TABLE IF NOT EXISTS `bulletin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `summary` varchar(150) NOT NULL,
  `postdate` varchar(50) NOT NULL,
  `expirydate` varchar(50) NOT NULL,
  `filename` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_userinfo` varchar(100) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `chat_message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from_userinfo`, `from_email`, `chat_message`) VALUES
(1, 'Tanay Pant (A1-1203)', 'tanay@gmail.com', 'Hey!'),
(2, 'Neeraj Pant (A1-1203)', '', 'Hi Tanay');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `complaint` varchar(500) NOT NULL,
  `complainttype` varchar(50) NOT NULL,
  `complaintdate` varchar(50) NOT NULL,
  `solveddate` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `address`, `email`, `complaint`, `complainttype`, `complaintdate`, `solveddate`, `status`) VALUES
(44, 'A1-1203', 'tanay@gmail.com', 'Just Kidding!', '', '01-07-14', '06-08-14', 'Solved'),
(46, 'A1-1203', 'tanay@gmail.com', 'Washbasin not working!', '', '11-07-14', '11-07-14', 'Solved'),
(47, 'A1-1203', 'tanay@gmail.com', 'New design still messing up!', 'elec', '06-08-14', '', 'Pending'),
(48, 'A1-1203', 'tanay@gmail.com', 'Hackers attacking the base!', 'lift', '06-08-14', '06-08-14', 'Solved'),
(49, 'A1-1203', 'tanay@gmail.com', 'Boring', 'elec', '06-08-14', '', 'Pending'),
(50, 'A1-1203', 'tanay@gmail.com', 'Testing', 'plum', '06-08-14', '', 'Pending'),
(51, 'A1-1203', 'tanay@gmail.com', 'test', 'main', '06-08-14', '', 'Pending'),
(52, 'A1-1203', 'tanay@gmail.com', 'test', 'club', '06-08-14', '', 'Pending'),
(53, 'A1-1203', 'tanay@gmail.com', 'test', 'plum', '06-08-14', '', 'Pending'),
(54, 'A1-1203', 'tanay@gmail.com', 'test', 'lift', '06-08-14', '', 'Pending'),
(55, 'A1-1203', 'tanay@gmail.com', 'test', 'lift', '06-08-14', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `block` varchar(2) NOT NULL,
  `flatnumber` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `filename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `block`, `flatnumber`, `mobile`, `password`, `filename`) VALUES
(1, 'Tanay', 'Pant', 'tanay@gmail.com', 'A1', '1203', '8888888888', '9b1043f5a058ed9ab4b199137527c1c5', 'tanay@gmail.com.JPG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
