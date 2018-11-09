-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 08:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teacher_assistance_tool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`ad_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `dept_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `user_name`, `password`, `full_name`, `dept_name`, `address`, `mobile`, `email`) VALUES
(1, 'admin', 'root', 'Md. Mamun Hossain', 'Computer Science and Engineering', 'Room: 412, Academic Building, NEUB', '+12345-123456', 'mamun.cse@sust.edu');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`crs_id` int(11) NOT NULL,
  `crs_code` varchar(25) NOT NULL,
  `crs_title` varchar(256) NOT NULL,
  `crs_credit` enum('1.00','1.50','2.00','3.00','4.00') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crs_id`, `crs_code`, `crs_title`, `crs_credit`, `status`) VALUES
(1, 'CSE-111', 'Fundamental of Computer', '3.00', 'Active'),
(2, 'CSE-113', 'Structure Programming Language', '3.00', 'Active'),
(3, 'CSE-114', 'Structure Programming Language Lab', '1.50', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`sl_no` int(11) NOT NULL,
  `dept_code` varchar(6) NOT NULL,
  `dept_name` varchar(256) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`sl_no`, `dept_code`, `dept_name`, `short_name`, `status`) VALUES
(1, '0201', 'Business Adminstrasion', 'BuA', 'Active'),
(2, '0302', 'Computer Science and Engineering', 'CSE', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
`rsl_id` int(11) NOT NULL,
  `ssn_crs_id` int(11) DEFAULT NULL,
  `std_id` int(11) DEFAULT NULL,
  `attendance` double NOT NULL,
  `class_test` double NOT NULL,
  `viva_presentation` double NOT NULL,
  `mid_sem` double NOT NULL,
  `final_sem` double NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`rsl_id`, `ssn_crs_id`, `std_id`, `attendance`, `class_test`, `viva_presentation`, `mid_sem`, `final_sem`, `remarks`) VALUES
(1, 1, 1, 8, 8, 8, 20, 28, ''),
(2, 1, 2, 8.5, 7, 7, 18, 25, ''),
(4, 1, 4, 10, 8, 7, 25, 30, ''),
(5, 1, 3, 10, 7, 7, 24, 30, ''),
(6, 1, 5, 10, 8, 10, 22, 28, ''),
(7, 1, 6, 9, 7, 7, 22, 25, ''),
(8, 3, 7, 8.5, 7, 8, 22, 25, ''),
(9, 3, 8, 8, 9, 7, 22, 24, ''),
(10, 3, 9, 10, 7, 7, 20, 25, ''),
(11, 3, 10, 8.5, 8.5, 8, 16, 31, ''),
(12, 3, 11, 9, 5, 8, 22, 30, ''),
(13, 3, 12, 8, 8, 5, 26, 35, ''),
(14, 3, 13, 8.5, 8, 7, 25, 30, ''),
(15, 3, 14, 10, 9, 8, 20, 24, ''),
(17, 3, 15, 8, 8, 5, 19, 26, ''),
(18, 3, 16, 5, 4, 5, 15, 20, ''),
(19, 3, 17, 8, 4, 4, 8, 10, ''),
(20, 3, 18, 5, 5, 6, 6, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
`ssn_id` int(11) NOT NULL,
  `year` varchar(256) NOT NULL,
  `semester` varchar(256) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ssn_id`, `year`, `semester`, `status`) VALUES
(1, '2014', 'summer', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `session_courses`
--

CREATE TABLE IF NOT EXISTS `session_courses` (
`ssn_crs_id` int(11) NOT NULL,
  `ssn_id` int(11) DEFAULT NULL,
  `crs_id` int(11) DEFAULT NULL,
  `sl_no` int(11) NOT NULL DEFAULT '0',
  `sc_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_courses`
--

INSERT INTO `session_courses` (`ssn_crs_id`, `ssn_id`, `crs_id`, `sl_no`, `sc_status`) VALUES
(1, 1, 2, 2, 'Active'),
(2, 1, 3, 2, 'Active'),
(3, 1, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`std_id` int(11) NOT NULL,
  `std_reg` varchar(20) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `ssn_id` int(11) DEFAULT NULL,
  `sl_no` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_reg`, `std_name`, `ssn_id`, `sl_no`, `status`) VALUES
(1, '140203020001', 'Humayra Rahman Joti', 1, 2, 'Active'),
(2, '140203020003', 'Rocksar Sultana Smriti', 1, 2, 'Active'),
(3, '140203020005', 'Topu Das Roy', 1, 2, 'Active'),
(4, '140203020004', 'Pranta Sarker', 1, 2, 'Active'),
(5, '140203020007', 'Shamima Khatun', 1, 2, 'Active'),
(6, '140203020010', 'Rubina Begum', 1, 2, 'Active'),
(7, '140202010001', 'Shafwat Mahadi Rahat', 1, 1, 'Active'),
(8, '140202010002', 'Sumel Ahmed Chowdhury', 1, 1, 'Active'),
(9, '140202010003', 'Ratib Hasan Mia', 1, 1, 'Active'),
(10, '140202010004', 'Mahad Bin Sarker', 1, 1, 'Active'),
(11, '140202010005', 'Katrina Kaif', 1, 1, 'Active'),
(12, '140202010006', 'Angelina Juli', 1, 1, 'Active'),
(13, '140202010007', 'Amir Khan', 1, 1, 'Active'),
(14, '140202010008', 'Salman Khan', 1, 1, 'Active'),
(15, '140202010009', 'Sharukh Khan', 1, 1, 'Active'),
(16, '140202010010', 'Disha Patani', 1, 1, 'Active'),
(17, '140202010011', 'Opu Bissash', 1, 1, 'Active'),
(18, '140202010012', 'Arman Malik', 1, 1, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`crs_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`rsl_id`), ADD KEY `ssn_crs_id` (`ssn_crs_id`), ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`ssn_id`);

--
-- Indexes for table `session_courses`
--
ALTER TABLE `session_courses`
 ADD PRIMARY KEY (`ssn_crs_id`), ADD KEY `ssn_id` (`ssn_id`), ADD KEY `crs_id` (`crs_id`), ADD KEY `fk_sl_no_1` (`sl_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`std_id`), ADD KEY `ssn_id` (`ssn_id`), ADD KEY `sl_no` (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
MODIFY `rsl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
MODIFY `ssn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `session_courses`
--
ALTER TABLE `session_courses`
MODIFY `ssn_crs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`ssn_crs_id`) REFERENCES `session_courses` (`ssn_crs_id`),
ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`);

--
-- Constraints for table `session_courses`
--
ALTER TABLE `session_courses`
ADD CONSTRAINT `fk_sl_no_1` FOREIGN KEY (`sl_no`) REFERENCES `department` (`sl_no`),
ADD CONSTRAINT `session_courses_ibfk_1` FOREIGN KEY (`ssn_id`) REFERENCES `session` (`ssn_id`),
ADD CONSTRAINT `session_courses_ibfk_2` FOREIGN KEY (`crs_id`) REFERENCES `courses` (`crs_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`ssn_id`) REFERENCES `session` (`ssn_id`),
ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`sl_no`) REFERENCES `department` (`sl_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
