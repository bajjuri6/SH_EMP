-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2014 at 09:46 AM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emp_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_statement`
--

CREATE TABLE IF NOT EXISTS `bank_statement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statement_name` varchar(40) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `fromdate` varchar(20) NOT NULL,
  `todate` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `apply_date` varchar(20) NOT NULL,
  `manager_status` varchar(30) NOT NULL,
  `manager_aprve_tme` int(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `new_emp`
--

CREATE TABLE IF NOT EXISTS `new_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(30) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `mothername` varchar(30) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `age` varchar(5) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `spousename` varchar(20) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `emr_name` varchar(30) NOT NULL,
  `emr_relation` varchar(30) NOT NULL,
  `emr_phone` varchar(30) NOT NULL,
  `emr_email` varchar(20) NOT NULL,
  `bank_account` varchar(30) NOT NULL,
  `pf_account` varchar(30) NOT NULL,
  `pan` varchar(30) NOT NULL,
  `ifsc_code` varchar(30) NOT NULL,
  `basic_salarie` varchar(10) NOT NULL,
  `date_of_joining` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `new_emp`
--

INSERT INTO `new_emp` (`id`, `emp_name`, `emp_id`, `emp_email`, `password`, `fathername`, `mothername`, `phone_no`, `dob`, `age`, `bloodgroup`, `address`, `gender`, `spousename`, `designation`, `department`, `emr_name`, `emr_relation`, `emr_phone`, `emr_email`, `bank_account`, `pf_account`, `pan`, `ifsc_code`, `basic_salarie`, `date_of_joining`) VALUES
(1, 'Jeswanth reddy', '1', 'hr@saddahaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'father name', 'mother name', '9491209805', '10-08-1992', '25', 'B+', 'Hyderabad', 'male', 'un married', 'hr_manager', 'HR', 'nope', 'nope', 'nope', 'nope', '58063497', '1234567', '789456123', 'HDFC123456', '50000', '10-08-2013');

-- --------------------------------------------------------

--
-- Table structure for table `new_updates`
--

CREATE TABLE IF NOT EXISTS `new_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `new_update` varchar(300) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slips`
--

CREATE TABLE IF NOT EXISTS `slips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `slip` varchar(30) NOT NULL,
  `month_of_payslip` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
