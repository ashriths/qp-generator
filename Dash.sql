
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2015 at 05:14 AM
-- Server version: 5.1.67
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u849719601_qp`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `dept`, `name`, `course_code`, `sem`) VALUES
(1, 'CSE', 'C# and .NET', '10GICINCSH', 7),
(2, 'CSE', 'Cryptography and Network Security', '11CICINCNS', 7),
(3, 'CSE', 'Cloud Computing', '10CI6GECCT', 6);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `marks` int(11) NOT NULL,
  `co` varchar(100) NOT NULL,
  `po` varchar(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `course_id`, `unit`, `text`, `marks`, `co`, `po`, `img`, `added`) VALUES
(1, 1, '1A', 'Describe any two technological advancements in parallel processing that lead to server    virtualization.', 10, 'CO1', 'PO1', '', '0000-00-00 00:00:00'),
(2, 1, '1A', 'List and describe the various methods to connect to Cloud service providers? ', 10, 'CO2', 'PO1, PO5', '', '0000-00-00 00:00:00'),
(3, 1, '3B', 'fghfghdfghfg', 10, 'CO1', ' PO1', ' ', '2015-01-04 13:41:52'),
(4, 2, '2B', 'This is a dummy question', 10, 'CO2', ' PO3, PO10', ' ', '2015-01-04 13:53:55'),
(5, 2, '4B', 'This is a Dummy question', 10, 'CO4', ' PO4, PO5, PO12', ' ', '2015-01-04 13:56:43'),
(6, 3, '1A', 'Describe any two technological advancements in parallel processing that lead to server    virtualization.', 10, 'CO1', 'PO1', '', '2015-01-04 19:00:49'),
(7, 3, '1B', 'List and describe the various methods to connect to Cloud service providers? ', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:01:37'),
(8, 3, '2A', 'By what common interface (software) would you connect to the internet? Explain briefly the evolution of it.      ', 10, 'CO1', 'PO1', '', '2015-01-04 19:02:21'),
(9, 3, '2A', 'Describe different types of client devices that can access the cloud. What are their advantages and disadvantages?', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:02:54'),
(10, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 10, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(11, 3, '2B', 'Is there a need for a framework for developing dynamic web applications? Justify your answer with an example.', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:03:59'),
(12, 2, '1A', 'Explain the different kinds of cryptographic attacks with examples.', 8, 'CO2', ' PO1, PO5', ' ', '2015-01-05 11:28:42'),
(13, 2, '1B', 'Explain the different services and mechanisms provided by cryptography.', 14, 'CO1', ' PO1', ' ', '2015-01-05 11:30:01'),
(14, 2, '1B', 'What is steganography? How is it different from cryptography ? Explain with examples.', 10, 'CO1', ' PO2', ' ', '2015-01-05 11:32:02'),
(15, 2, '2A', 'What is cryptanalysis ? Explain the various forms. ', 10, 'CO2', ' PO2', ' ', '2015-01-05 11:35:12'),
(16, 2, '2B', 'Explain the components of modern block cipher.', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:23'),
(17, 3, '2A', 'gfhgfhgf', 10, 'CO3', ' PO1, PO4', ' ', '2015-01-05 15:06:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
