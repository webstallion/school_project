-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2018 at 04:45 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `acedmic_year`
--

DROP TABLE IF EXISTS `acedmic_year`;
CREATE TABLE IF NOT EXISTS `acedmic_year` (
  `acdmc_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`acdmc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acedmic_year`
--

INSERT INTO `acedmic_year` (`acdmc_id`, `name`, `date_from`, `date_to`, `create_date`, `created_by`, `flag`) VALUES
(5, '17_18', '1/02/2017', '1/02/2018', '2018-11-06 06:14:12', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `create_date`, `created_by`, `flag`) VALUES
(1, 'Noida', '2018-11-03 04:28:12', 'admin', 1),
(2, 'gaziabad', '2018-11-03 04:31:30', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `class_no` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `class_no`, `create_date`, `created_by`, `flag`) VALUES
(26, 'nursery', 'nursery', '2018-11-06 06:09:08', 'admin', 1),
(27, 'lkg', 'lkg', '2018-11-06 06:09:27', 'admin', 1),
(28, 'ukg', 'ukg', '2018-11-06 06:10:11', 'admin', 1),
(29, 'first', '1st', '2018-11-06 06:10:25', 'admin', 1),
(30, 'second', '2nd', '2018-11-06 06:10:49', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_module`
--

DROP TABLE IF EXISTS `employee_module`;
CREATE TABLE IF NOT EXISTS `employee_module` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `post` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expanses`
--

DROP TABLE IF EXISTS `expanses`;
CREATE TABLE IF NOT EXISTS `expanses` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_type`
--

DROP TABLE IF EXISTS `fee_type`;
CREATE TABLE IF NOT EXISTS `fee_type` (
  `ftype_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_name` varchar(200) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `flage` int(1) NOT NULL,
  PRIMARY KEY (`ftype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ftype_month`
--

DROP TABLE IF EXISTS `ftype_month`;
CREATE TABLE IF NOT EXISTS `ftype_month` (
  `month_id` int(11) NOT NULL AUTO_INCREMENT,
  `month_value` int(11) NOT NULL,
  `ftype_id` int(11) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `created_type` varchar(200) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

DROP TABLE IF EXISTS `login_table`;
CREATE TABLE IF NOT EXISTS `login_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `scode` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `username`, `password`, `type`, `scode`, `post`, `created_by`, `create_date`, `flag`) VALUES
(1, 'admin', 'admin12345', 'admin', '12345', 'principle', '', '2018-10-15 18:30:00', 1),
(4, 'pawan', 'sonimayank', 'user', '123', 'software developer', 'admin', '2018-11-05 01:34:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_name`, `class_id`, `create_date`, `created_by`, `flag`) VALUES
(17, 'a', 26, '2018-11-06 06:11:29', 'admin', 1),
(18, 'b', 26, '2018-11-06 06:11:37', 'admin', 1),
(19, 'a', 27, '2018-11-06 06:11:44', 'admin', 1),
(20, 'b', 27, '2018-11-06 06:11:57', 'admin', 1),
(21, 'a', 28, '2018-11-06 06:12:25', 'admin', 1),
(22, 'b', 28, '2018-11-06 06:12:33', 'admin', 1),
(23, 'a', 29, '2018-11-07 20:31:36', 'admin', 1),
(24, 'b', 29, '2018-11-07 20:31:49', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(200) NOT NULL,
  `section_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `admission_no` varchar(100) NOT NULL,
  `parents_name` varchar(100) NOT NULL,
  `rollno` varchar(100) NOT NULL,
  `acedmic_year_id` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_name`, `section_id`, `class_id`, `admission_no`, `parents_name`, `rollno`, `acedmic_year_id`, `branch_id`, `create_date`, `created_by`, `flag`) VALUES
(29, 'Pushpendra sh201arma', 17, 26, '201', 'Ram sharma', '2312', '5', 1, '2018-11-08 20:29:30', 'admin', 1),
(30, 'pawan', 18, 26, '202', 'Rajesh', '2036', '5', 1, '2018-11-08 20:30:05', 'admin', 1),
(31, 'plkesh', 20, 27, '203', 'ramesh', '3214', '5', 1, '2018-11-08 20:30:34', 'admin', 1),
(32, 'naresh', 21, 28, '204', 'riteshjai', '3656', '5', 1, '2018-11-08 20:31:35', 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
