-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2015 at 10:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qp`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(11) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `dept`, `name`, `course_code`, `sem`) VALUES
(1, 'CSE', 'C# and .NET', '10GICINCSH', 7),
(2, 'CSE', 'Cryptography and Network Security', '11CICINCNS', 7),
(3, 'CSE', 'Cloud Computing', '10CI6GECCT', 6),
(4, 'CSE', '4 Dummy Course', '11CSCINCNS', 7),
(5, 'ISE', '5 Dummy Course', '11ISCINCNS', 7),
(6, 'ISE', '6 Dummy Course', '11ISCINCNS', 7),
(7, 'ISE', '7 Dummy Course', '11ISCINCNS', 7),
(8, 'ISE', '8 Dummy Course', '11ISCINCNS', 7),
(9, 'ISE', '9 Dummy Course', '11ISCINCNS', 7),
(10, 'ME', '10 Dummy Course', '11MECINCNS', 7),
(11, 'ME', '11 Dummy Course', '11MECINCNS', 7),
(12, 'ME', '12 Dummy Course', '11MECINCNS', 7),
(13, 'ME', '13 Dummy Course', '11MECINCNS', 7),
(14, 'ME', '14 Dummy Course', '11MECINCNS', 7),
(15, 'ECE', '15 Dummy Course', '11ECCINCNS', 7),
(16, 'ECE', '16 Dummy Course', '11ECCINCNS', 7),
(17, 'ECE', '17 Dummy Course', '11ECCINCNS', 7),
(18, 'ECE', '18 Dummy Course', '11ECCINCNS', 7),
(19, 'ECE', '19 Dummy Course', '11ECCINCNS', 7),
(20, 'TC', '20 Dummy Course', '11TCCINCNS', 7),
(21, 'TC', '21 Dummy Course', '11TCCINCNS', 7),
(22, 'TC', '22 Dummy Course', '11TCCINCNS', 7),
(23, 'TC', '23 Dummy Course', '11TCCINCNS', 7),
(24, 'TC', '24 Dummy Course', '11TCCINCNS', 7),
(25, 'CV', '25 Dummy Course', '11CVCINCNS', 7),
(26, 'CV', '26 Dummy Course', '11CVCINCNS', 7),
(27, 'CV', '27 Dummy Course', '11CVCINCNS', 7),
(28, 'CV', '28 Dummy Course', '11CVCINCNS', 7),
(29, 'CV', '29 Dummy Course', '11CVCINCNS', 7);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`question_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `marks` int(11) NOT NULL,
  `co` varchar(100) NOT NULL,
  `po` varchar(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `course_id`, `unit`, `text`, `marks`, `co`, `po`, `img`, `added`) VALUES
(1, 1, '1A', 'Question 1 from Unit 1A of course 1', 5, 'CO1', 'PO1', '', '0000-00-00 00:00:00'),
(35, 3, '2B', 'Write a note on the four generations of computers in the hardware framework evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(2, 1, '1A', 'List and describe the various methods to connect to Cloud service providers? ', 10, 'CO2', 'PO1, PO5', '', '0000-00-00 00:00:00'),
(3, 1, '3B', 'fghfghdfghfg', 10, 'CO1', ' PO1', ' ', '2015-01-04 13:41:52'),
(4, 2, '2B', 'This is a dummy question', 10, 'CO2', ' PO3, PO10', ' ', '2015-01-04 13:53:55'),
(5, 2, '4B', 'This is a Dummy question', 10, 'CO4', ' PO4, PO5, PO12', ' ', '2015-01-04 13:56:43'),
(6, 3, '1A', 'Describe any two technological advancements in parallel processing that lead to server    virtualization.', 10, 'CO1', 'PO1', '', '2015-01-04 19:00:49'),
(7, 3, '1B', 'List and describe the various methods to connect to Cloud service providers? ', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:01:37'),
(8, 3, '2A', 'By what common interface (software) would you connect to the internet? Explain briefly the evolution of it.      ', 5, 'CO1', 'PO1', '', '2015-01-04 19:02:21'),
(9, 3, '2A', 'Describe different types of client devices that can access the cloud. What are their advantages and disadvantages?', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:02:54'),
(10, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 10, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(11, 3, '2B', 'Is there a need for a framework for developing dynamic web applications? Justify your answer with an example.', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:03:59'),
(12, 2, '1A', 'Explain the different kinds of cryptographic attacks with examples.', 8, 'CO2', ' PO1, PO5', ' ', '2015-01-05 11:28:42'),
(13, 2, '1B', 'Explain the different services and mechanisms provided by cryptography.', 14, 'CO1', ' PO1', ' ', '2015-01-05 11:30:01'),
(14, 2, '1B', 'What is steganography? How is it different from cryptography ? Explain with examples.', 10, 'CO1', ' PO2', ' ', '2015-01-05 11:32:02'),
(15, 2, '2A', 'What is cryptanalysis ? Explain the various forms. ', 10, 'CO2', ' PO2', ' ', '2015-01-05 11:35:12'),
(16, 2, '2B', 'Explain the components of modern block cipher.', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:23'),
(17, 3, '2A', 'gfhgfhgf', 10, 'CO3', ' PO1, PO4', ' ', '2015-01-05 15:06:32'),
(18, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 10, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(19, 3, '2B', 'Is there a need for a framework for developing dynamic web applications? Justify your answer with an example.', 10, 'CO2', 'PO1, PO5', '', '2015-01-04 19:03:59'),
(20, 3, '2B', 'Is there a need for a framework for developing dynamic web applications? Justify your answer with an example.', 5, 'CO2', 'PO1, PO5', '', '2015-01-04 19:03:59'),
(21, 3, '2B', 'Is there a need for a framework for developing dynamic web applications? Justify your answer with an example.', 5, 'CO2', 'PO1, PO5', '', '2015-01-04 19:03:59'),
(22, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(23, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(24, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(25, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(26, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(27, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(28, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(29, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(30, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(31, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(32, 3, '2B', 'Write a note on the four generations of computers in the hardware evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33'),
(33, 1, '2B', 'asdfaj\r\n', 5, 'CO3', ' PO5', ' ', '2015-02-01 09:13:16'),
(34, 1, '2B', 'asdfaj\r\n', 5, 'CO3', ' PO5', ' ', '2015-02-01 09:20:22'),
(36, 3,'1A', 'This is a question for demonstration purpose with id36', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:36'),
(37, 3,'1A', 'This is a question for demonstration purpose with id37', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:37'),
(38, 3,'1A', 'This is a question for demonstration purpose with id38', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:38'),
(39, 3,'1A', 'This is a question for demonstration purpose with id39', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:39'),
(40, 3,'2A', 'This is a question for demonstration purpose with id40', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:40'),
(41, 3,'2A', 'This is a question for demonstration purpose with id41', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:41'),
(42, 3,'2A', 'This is a question for demonstration purpose with id42', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:42'),
(43, 3,'2A', 'This is a question for demonstration purpose with id43', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:43'),
(44, 3,'2A', 'This is a question for demonstration purpose with id44', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:44'),
(45, 3,'3A', 'This is a question for demonstration purpose with id45', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:45'),
(46, 3,'3A', 'This is a question for demonstration purpose with id46', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:46'),
(47, 3,'3A', 'This is a question for demonstration purpose with id47', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:47'),
(48, 3,'3A', 'This is a question for demonstration purpose with id48', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:48'),
(49, 3,'3A', 'This is a question for demonstration purpose with id49', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:49'),
(50, 3,'3B', 'This is a question for demonstration purpose with id50', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:50'),
(51, 3,'3B', 'This is a question for demonstration purpose with id51', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:51'),
(52, 3,'3B', 'This is a question for demonstration purpose with id52', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:52'),
(53, 3,'3B', 'This is a question for demonstration purpose with id53', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:53'),
(54, 3,'3B', 'This is a question for demonstration purpose with id54', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:54'),
(55, 3,'4A', 'This is a question for demonstration purpose with id55', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:55'),
(56, 3,'4A', 'This is a question for demonstration purpose with id56', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:56'),
(57, 3,'4A', 'This is a question for demonstration purpose with id57', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:57'),
(58, 3,'4A', 'This is a question for demonstration purpose with id58', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:58'),
(59, 3,'4A', 'This is a question for demonstration purpose with id59', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:59'),
(60, 3,'4B', 'This is a question for demonstration purpose with id60', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:60'),
(61, 3,'4B', 'This is a question for demonstration purpose with id61', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:61'),
(62, 3,'4B', 'This is a question for demonstration purpose with id62', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:62'),
(63, 3,'4B', 'This is a question for demonstration purpose with id63', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:63'),
(64, 3,'4B', 'This is a question for demonstration purpose with id64', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:64'),
(65, 3,'5A', 'This is a question for demonstration purpose with id65', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:65'),
(66, 3,'5A', 'This is a question for demonstration purpose with id66', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:66'),
(67, 3,'5A', 'This is a question for demonstration purpose with id67', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:67'),
(68, 3,'5A', 'This is a question for demonstration purpose with id68', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:68'),
(69, 3,'5A', 'This is a question for demonstration purpose with id69', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:69'),
(70, 3,'5B', 'This is a question for demonstration purpose with id70', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:70'),
(71, 3,'5B', 'This is a question for demonstration purpose with id71', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:71'),
(72, 3,'5B', 'This is a question for demonstration purpose with id72', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:72'),
(73, 3,'5B', 'This is a question for demonstration purpose with id73', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:73'),
(74, 3,'5B', 'This is a question for demonstration purpose with id74', 10, 'CO3', ' PO3, PO5', ' ', '2015-01-05 11:36:74'),
(75, 3, '2B', 'Write a note on the four generations of computers in the hardware framework dynamic evolution.', 5, 'CO1', 'PO1', '', '2015-01-04 19:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
