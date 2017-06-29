-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 02:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'ajoke', 'pearlz'),
(2, 'micheal', 'mike'),
(3, 'ajokeade', '5ec8d3d1a3c1e35fadc543b8a10968cb');

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `asset_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` char(5) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `asset` text NOT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_id`, `staff_id`, `staff_name`, `date`, `asset`) VALUES
(1, '89587', 'James Babalola', '2016-02-06', 'COMPUTERS - 100000'),
(2, '89587', 'James Babalola', '2018-08-06', 'Chairs - 7000');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `grade_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_num` char(5) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `session` char(9) NOT NULL,
  `term` char(11) NOT NULL,
  `present` char(2) NOT NULL,
  `absent` char(2) NOT NULL,
  `grades` varchar(200) NOT NULL,
  `t_remarks` varchar(100) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `student_num`, `student_name`, `session`, `term`, `present`, `absent`, `grades`, `t_remarks`, `t_name`, `date`) VALUES
(1, '40596', 'Taiwo Maja', '2016/2017', 'Second Term', '45', '20', 'English - 50 -C', 'HE''S improving.', 'ajoke', '2017-03-01 16:53:04'),
(2, '74827', 'Wale Ahmed', '2016/2017', 'First Term', '50', '10', 'Mathematics - B\r\nEnglish - A\r\nChemistry - B\r\nBiology - C\r\nPhysics - B', 'Brilliant student but can do better.', 'Damilola', '2017-03-02 14:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_num` int(5) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` char(6) NOT NULL,
  `marital` char(7) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `dob` date NOT NULL,
  `desig` varchar(20) NOT NULL,
  `d_employ` date NOT NULL,
  `salary` float(10,2) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_num`, `fname`, `lname`, `email`, `gender`, `marital`, `address`, `phone`, `dob`, `desig`, `d_employ`, `salary`, `password`) VALUES
(1, 89587, 'James', 'Babalola', 'babalolaj@yahoo.com', 'm', 'single', 'Maryland', '09023456789', '2008-08-16', 'Lead facilitator', '2013-09-09', 500000.00, 'b4cc344d25a2efe540adbf2678e2304c');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_num` int(5) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `gender` char(6) NOT NULL,
  `dob` date NOT NULL,
  `dept` char(11) NOT NULL,
  `add` varchar(100) NOT NULL,
  `guardian` varchar(25) NOT NULL,
  `guardian_n` char(11) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_num`, `fname`, `lname`, `gender`, `dob`, `dept`, `add`, `guardian`, `guardian_n`, `password`) VALUES
(1, 40596, 'Taiwo', 'Maja', 'male', '1997-08-09', 'Science', 'Maryland, Lagos.', 'Mrs Maja', '08023456789', '5cf7573f250dd48c04cce437c37bebf5'),
(2, 74827, 'Wale', 'Ahmed', 'male', '1995-01-13', 'Science', 'Lagos, Nigeria.', 'Mrs Ahmed', '09098765432', '12a9c8f6d7991e6e5039cb209086b4e0'),
(3, 49608, 'Olatunde', 'Balogun', 'male', '1996-11-09', 'Arts', 'Orunyabo street, bet9ja lane', 'Mr Ajanaku', '08055221144', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_num` char(5) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `gender` char(6) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` char(11) NOT NULL,
  `dob` date NOT NULL,
  `subject` varchar(30) NOT NULL,
  `employment` date NOT NULL,
  `salary` float(10,2) NOT NULL,
  `marital` char(7) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_num`, `fname`, `lname`, `email`, `gender`, `address`, `phone`, `dob`, `subject`, `employment`, `salary`, `marital`, `password`) VALUES
(1, '31590', 'ajoke', 'pearlz', 'ola@gmail.com', 'f', 'maryland', '08163608148', '2002-07-16', 'english', '2016-05-10', 500000.00, 'single', '5ec8d3d1a3c1e35fadc543b8a10968cb'),
(2, '84031', 'Damilola', 'Adio', 'damilolo93@gmail.com', 'm', 'Lagos', '08020777010', '2006-02-16', 'english', '2015-10-04', 150000.00, 'mrried', '01644a8128eb6ecca58989067e1a9a47'),
(3, '82454', 'Babatunde', 'Babalola', 'baba@yahoo.com', 'f', '					5, Idiroko road', '08065224314', '2016-11-18', ' 			Commerce	', '2015-05-14', 2000000.00, 'mrried', 'd3830a83f89191c09ffa44285ea8612b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
