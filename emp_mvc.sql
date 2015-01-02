-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2015 at 06:36 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `bank_statement`
--

INSERT INTO `bank_statement` (`id`, `statement_name`, `time`) VALUES
(1, '1803-Bank-statement--.pdf', 1417694855),
(2, '2456-Bank-statement-January-2014.pdf', 1417758686),
(3, '9633-Bank-statement-January-2014.pdf', 1417845250),
(4, '3215-Bank-statement-January-2014.pdf', 1417845331),
(5, '5213-Bank-statement-December-2014.pdf', 1417845450),
(6, '2157-Bank-statement-July-2014.pdf', 1417845507),
(7, '3771-Bank-statement--.pdf', 1418201188),
(8, '2919-Bank-statement--.pdf', 1418201202),
(9, '1094-Bank-statement-January-2014.pdf', 1418201706),
(10, '5447-Bank-statement-January-2014.pdf', 1418202012),
(11, '5162-Bank-statement--.pdf', 1418202113),
(12, '7036-Bank-statement--.pdf', 1418202144),
(13, '7903-Bank-statement--.pdf', 1418202348),
(14, '6176-Bank-statement--.pdf', 1418202393),
(15, '4009-Bank-statement--.pdf', 1418202662),
(16, '3921-Bank-statement--.pdf', 1418202722),
(17, '7412-Bank-statement-January-2014.pdf', 1418202751),
(18, '3967-Bank-statement-November-2014.pdf', 1418723077),
(19, '7183-Bank-statement-November-2014.pdf', 1418723124),
(20, '9883-Bank-statement-November-2014.pdf', 1418723217),
(21, '2657-Bank-statement-January-2014.pdf', 1418724744),
(22, '3363-Bank-statement-December-2014.pdf', 1418724754),
(23, '6747-Bank-statement-December-2014.pdf', 1418724844),
(24, '9638-Bank-statement-April-2014.pdf', 1418821817),
(25, '5467-Bank-statement-January-2014.pdf', 1418821836),
(26, '6188-Bank-statement-January-2014.pdf', 1418821867),
(27, '4557-Bank-statement-September-2014.pdf', 1418821888),
(28, '1393-Bank-statement-July-2014.pdf', 1418826838),
(29, '7196-Bank-statement-June-2014.pdf', 1419406722),
(30, '9465-Bank-statement-July-2014.pdf', 1419407080),
(31, '6112-Bank-statement-March-2014.pdf', 1419407127),
(32, '2896-Bank-statement-August-2014.pdf', 1419407203),
(33, '6221-Bank-statement-May-2014.pdf', 1419407678),
(34, '6341-Bank-statement--.pdf', 1419654741),
(35, '7874-Bank-statement--.pdf', 1419654749),
(36, '1652-Bank-statement--.pdf', 1419655026),
(37, '3505-Bank-statement--.pdf', 1419655045),
(38, '1771-Bank-statement--.pdf', 1419655058),
(39, '6569-Bank-statement-January-2014.pdf', 1419655078),
(40, '9301-Bank-statement--.pdf', 1419655083),
(41, '5768-Bank-statement--.pdf', 1419655097),
(42, '3755-Bank-statement-January-2014.pdf', 1419655289),
(43, '3292-Bank-statement-May-2014.pdf', 1420019459),
(44, '3104-Bank-statement-January-2015.pdf', 1420105966),
(45, '9382-Bank-statement-February-2015.pdf', 1420106159),
(46, '7856-Bank-statement-March-2015.pdf', 1420106315),
(47, '8489-Bank-statement-September-2015.pdf', 1420106351),
(48, '5626-Bank-statement-October-2015.pdf', 1420106521),
(49, '7330-Bank-statement-November-2015.pdf', 1420106592);

-- --------------------------------------------------------

--
-- Table structure for table `holidays_list`
--

CREATE TABLE IF NOT EXISTS `holidays_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `h_id` varchar(10) NOT NULL,
  `h_date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `holidays_list`
--

INSERT INTO `holidays_list` (`id`, `img`, `title`, `desc`, `h_id`, `h_date`) VALUES
(1, 'h1\r\n', 'New year', 'New Year is the time at which a new calendar year begins and the calendar''s year count is incremented\r\n', 'h1', 'JAN 1'),
(2, 'h2\r\n', 'Sankranti', 'Sankranti means transmigration of the Sun from one R?shi to the next\r\n', 'h2', 'JAN 14'),
(3, 'h3', 'Republic Day', 'Republic Day is the name of a holiday in several countries to commemorate the day when they became republics.\r\n', 'h3', 'JAN 26'),
(4, 'h4\r\n', 'Shivaratri', 'The Maha Shivratri festival, also popularly known as ''Shivratri'' or ''Great Night of Lord Shiva\r\n', 'h4', 'FEB 17'),
(5, 'h5\r\n', 'Holi', 'Holi is a spring festival also known as the festival of colours or the festival of love.\r\n', 'h5', 'MAR 6'),
(6, 'h6\r\n', 'Ugadi', 'Ugadi/Yugadi  is the New Year''s Day for the people of the Deccan region of India.\r\n', 'h6', 'MAR 21'),
(7, 'h7\r\n', 'Good Friday', 'Good Friday is a religious holiday, observed primarily by Christians, commemorating the crucifixion of Jesus Christ and his death at Calvary.\r\n', 'h7', 'APR 3'),
(8, 'h8\r\n', 'May day', 'May 1st, often called May Day\r\n', 'h8', 'MAY 1'),
(9, 'h9\r\n', 'Ramzan', 'Eid al-Fitr (Ramzan Id, Eid-ul-Fitar, or Idul-Fitr) is a gazetted holiday in India. It celebrates the end of Ramadan and marks the first day of the Islamic month of Shawwal.\r\n', 'h9', 'JUL 18'),
(10, 'h10\r\n', 'Independence Day', 'Independence Day, observed annually on 15 August, is a National Holiday in India commemorating the nation''s independence from the British Empire on 15 August 1947. \r\n', 'h10', 'AUG 15'),
(11, 'h11\r\n', 'Rakhi', 'Raksha Bandhan or ''Rakhi'' is a special occasion to celebrate the chaste bond of love between a brother and a sister, by tying a sacred thread around the wrist.\r\n', 'h11', 'AUG 29'),
(12, 'h12\r\n', 'Vinayaka Chavithi', 'Ganesha Chaturthi  is the Hindu festival celebrated in honour of the god Ganesha\r\n', 'h12', 'SEP 17'),
(13, 'h13\r\n', 'Gandhi Jayanti', 'Gandhi Jayanti is a national holiday celebrated in India to mark the occasion of the birthday of Mohandas Karamchand Gandhi, the "Father of the Nation".\r\n', 'h13', 'OCT 2'),
(14, 'h14\r\n', 'Dasara', 'Vijayadashami also known as Dussehra or Dasara or Dashain or Tenth day of Navratri or Durgotsav is one of the most important Hindu festivals celebrated in various forms, across India, Nepal, Sri Lanka, and Bangladesh.\r\n', 'h14', 'OCT 22'),
(15, 'h15\r\n', 'Deepavali', 'Diwali or Divali also known as Deepavali and the "festival of lights", is an ancient Hindu festival celebrated in autumn every year.\r\n', 'h15', 'NOV 11'),
(16, 'h16\r\n', 'Christmas', 'Christmas Day is an annual festival commemorating the birth of Jesus Christ, observed most commonly on December as a religious and cultural celebration among billions of people around the world.\r\n', 'h16', 'DEC 25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `emp_name`, `email`, `emp_id`, `subject`, `fromdate`, `todate`, `description`, `apply_date`, `manager_status`, `manager_aprve_tme`, `status`) VALUES
(1, 'Jeswanth reddy', 'hr@saddahaq.com', '1', 'first leave in new bd', '1417804200', '1417890600', 'nothing', '1417786001', '1', 1417790859, '1'),
(2, 'Jeswanth reddy', 'hr@saddahaq.com', '1', 'and one other', '1417804200', '1417890600', 'hmmmm', '1417786036', '1', 1417790876, '1'),
(3, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'saddahaq mail template ', '1418149800', '1418236200', 'Checking for mail', '1418209644', '1', 0, ''),
(4, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'mail checking', '1418149800', '1418236200', 'nothing', '1418209926', '0', 0, ''),
(5, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'bdfdfbdfb', '1418149800', '1418236200', 'fdbfdbfd', '1418209986', '0', 0, ''),
(6, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'final', '1418149800', '1418236200', 'nope\n', '1418210031', '0', 0, ''),
(7, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'final', '1418149800', '1418236200', 'nope\n', '1418210096', '0', 0, ''),
(8, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'bfdbfdbdf', '1418149800', '1418236200', 'bfdbfd', '1418210145', '0', 0, ''),
(9, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'dbdfbdsb', '1418149800', '1418236200', 'bsdbsbsdb', '1418210473', '0', 0, ''),
(10, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdv', '1418149800', '1418236200', 'vdsvsd', '1418210561', '0', 0, ''),
(11, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdvdsv', '1418149800', '1418236200', 'vdsvdsvsdv', '1418213884', '0', 0, ''),
(12, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdvds', '1418149800', '1418841000', 'vdsvsdvsdvsd', '1418215772', '0', 0, ''),
(13, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdvds', '1418149800', '1418841000', 'vdsvsdvsdvsd', '1418215930', '0', 0, ''),
(14, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdvds', '1418149800', '1418841000', 'vdsvsdvsdvsd', '1418216116', '0', 0, ''),
(15, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdvds', '1418149800', '1418841000', 'vdsvsdvsdvsd', '1418216617', '0', 0, ''),
(16, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'dsvsdsd', '1418149800', '1418236200', 'vdsvds', '1418216631', '0', 0, ''),
(17, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'ewwegwe', '1418754600', '1419186600', 'gwegwegweg', '1418218245', '0', 0, ''),
(18, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vdsfvdsv', '1418149800', '1418236200', '', '1418220299', '0', 0, ''),
(19, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'new subject', '1418754600', '1418927400', 'desc', '1418722758', '1', 1418722850, '1'),
(20, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'hmm', '1418668200', '1418754600', 'bvfdbf', '1418723703', '1', 1418725820, '0'),
(21, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'dvdsvdsvdsvsd', '1418841000', '1419013800', 'vsddsvsd', '1418821679', '0', 0, ''),
(22, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'bfdbfdb', '1418841000', '1419013800', 'bfdbfdb', '1418821732', '0', 0, ''),
(23, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vdsvdsv', '1418841000', '1418927400', 'vsdvdsv', '1418821769', '0', 0, ''),
(24, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vsdvsdv', '1418841000', '1419964200', 'vsdvsdvs', '1418823956', '0', 0, ''),
(25, 'Jeswanth reddy', 'hr@saddahaq.com', '00001', 'vdsgvsgd', '1419618600', '1419964200', 'dfdsdsf', '1418826735', '0', 0, ''),
(26, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'need leave', '1419359400', '1419445800', 'joining date', '1419412534', '0', 1419412651, ''),
(27, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'hmm ', '1419445800', '1419445800', 'dump', '1419412925', '1', 1419412944, ''),
(28, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'hai', '1419359400', '1419445800', 'no need', '1419413358', '1', 0, ''),
(29, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'my newwwwwww', '1419445800', '1419532200', 'offfffoooooo', '1419413618', '0', 1419413642, ''),
(30, 'kiran', 'kiran@saddaq.com', '00005', 'gabbarsing', '1419532200', '1419618600', 'attarintiki', '1419414184', '1', 1419414357, ''),
(31, 'kiran', 'kiran@saddaq.com', '00005', 'srk', '1419445800', '1419532200', 'new lear', '1419414870', '1', 1419415668, '0'),
(32, 'kiran', 'kiran@saddaq.com', '00005', 'zero', '1419445800', '1419618600', 'hmmm\n', '1419416084', '0', 0, ''),
(33, 'kiran', 'kiran@saddaq.com', '00005', 'postion', '1419359400', '1419445800', 'dump', '1419416157', '1', 1419437579, '1'),
(34, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'bfdbdbfd', '1419445800', '1419445800', 'But for those who don\\sqt know PHP, and to give PHP programmers additional food for thought, I have also written a simple PHP page that allows the user to choose and then download any of the files in a designated "downloads" directory. This code demonstrates two useful techniques:', '1419431626', '', 0, ''),
(35, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'sdvdsgvdsgdsgvsd', '1419532200', '1419618600', 'But for those who don\\sqt know PHP, and to give PHP programmers additional food for thought, I have also written a simple PHP page that allows the user to choose and then download any of the files in a designated "downloads" directory. This code demonstrates two useful techniques:', '1419431701', '', 0, ''),
(36, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'now', '1419445800', '1419618600', 'checking', '1419431937', '', 0, ''),
(37, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdvdsvds', '1419618600', '1419877800', 'vsdvdsvsd', '1419431979', '', 0, ''),
(38, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'bdfbdfbfd', '1419445800', '1419445800', 'fdbfdbfd', '1419432708', '', 0, ''),
(39, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'bdfbdbfdb', '1419445800', '1419532200', 'bdfbfdbdf', '1419432747', '', 0, ''),
(40, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdsvds', '1419532200', '1419791400', 'dsvsdsd', '1419432790', '', 0, ''),
(41, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdsvdsv', '1419445800', '1419964200', 'vsdvsdvsdvsd', '1419432843', '', 0, ''),
(42, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dbdfgbdf', '1419445800', '1419445800', 'fdbfbfd', '1419433172', '', 0, ''),
(43, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'gfdvdf', '1419532200', '-19800', 'gdfg', '1419433190', '', 0, ''),
(44, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'sdvdsvds', '1419532200', '1419445800', 'vsdsdsd', '1419433260', '', 0, ''),
(45, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vsdvsdv', '1419618600', '1419445800', 'vdsvsdvsvd', '1419433385', '', 0, ''),
(46, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdssd', '1419532200', '1419877800', 'vdsvsdvsdv', '1419433438', '', 0, ''),
(47, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dbvdfbdf', '1419532200', '1419877800', 'fdbdfbsdf', '1419433473', '', 0, ''),
(48, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'svsdvsd', '1419532200', '1419877800', 'vsdvsdvsv', '1419433507', '', 0, ''),
(49, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdsvdsv', '1419445800', '1419532200', 'vsdvsdvdvs', '1419435166', '', 0, ''),
(50, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dfbdfb', '1419618600', '1419877800', 'bfdb', '1419435201', '', 0, ''),
(51, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dsvdsv', '1419532200', '1419877800', 'dsvsdv', '1419435248', '', 0, ''),
(52, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vsdvds', '1419532200', '1419877800', 'vdsvsd', '1419435289', '', 0, ''),
(53, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dsvdsvs', '1419445800', '1419791400', 'sdvsdv', '1419435388', '', 0, ''),
(54, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dvdsvsdv', '1419618600', '1419877800', 'dsvsdvsdv', '1419435698', '', 0, ''),
(55, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'bfdbfdb', '1419618600', '1419964200', 'fbfdbfdbfd', '1419435903', '0', 1419437736, ''),
(56, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'bfdbdf', '1419532200', '1419877800', 'dfbdfd', '1419436006', '1', 1419437500, ''),
(57, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'dsbsdsd', '1419532200', '1419964200', 'bsdbssb', '1419436045', '0', 1419442222, '0'),
(58, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'gegvedsdvfsd', '1419618600', '1419791400', 'sdgdsgdssd', '1419576207', '', 0, ''),
(59, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdsdsv', '1419964200', '1419791400', 'sdvdsvds', '1419671481', '', 0, ''),
(60, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vdsvdsv', '1419618600', '1419705000', 'vsdvsv', '1419672344', '', 0, ''),
(61, 'Jeswanth reddy 143', 'hr@saddahaq.com', '00001', 'vsdvsd', '1419964200', '1421087400', 'vdsvsd', '1419673669', '', 0, '');

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
  `user_level` int(5) NOT NULL,
  `leaves_alert` int(11) DEFAULT NULL,
  `bdy_alert` int(11) DEFAULT NULL,
  `notice_alert` int(11) DEFAULT NULL,
  `hldys_list` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `new_emp`
--

INSERT INTO `new_emp` (`id`, `emp_name`, `emp_id`, `emp_email`, `password`, `fathername`, `mothername`, `phone_no`, `dob`, `age`, `bloodgroup`, `address`, `gender`, `spousename`, `designation`, `department`, `emr_name`, `emr_relation`, `emr_phone`, `emr_email`, `bank_account`, `pf_account`, `pan`, `ifsc_code`, `basic_salarie`, `date_of_joining`, `user_level`, `leaves_alert`, `bdy_alert`, `notice_alert`, `hldys_list`) VALUES
(1, 'Jeswanth reddy HR', '00001', 'hr@saddahaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'father name', 'mother name', '9491209805', '1418725928', '25', 'B+', 'new &nbsp;', 'male', 'un married', 'tech', 'HR', 'nope', 'nope', 'nope', 'nope', '5000000', '1234567', '789456123', 'HDFC123456', '50000', '1417458600', 1, 0, NULL, 0, 'h1,h2,h3,h4,h5,h16'),
(2, 'sathish kumar', '00002', 'project_manager@saddahaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'nope', 'nope', '9948983078', '1418250729', 'Male', 'B+', 'nope', 'Male', 'kala', 'project manager', 'tech', 'nope', 'nope', '1234567890', 'nope@gmail.com', '685456456', '64646443', '4686899', 'HDFC123', '100000', '1417458600', 2, 1, NULL, 1, ''),
(4, 'kiran', '00005', 'kiran@saddaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'nope', 'nope', '1234567891', '1419445800', 'Male', 'B+', 'sdfgvdsfgvb', 'Male', 'nope', 'nope', 'tech', 'nope', 'nope', '9874561237', 'nope@gmail.com', '468984641698', '65494565894', '654654964647', 'HDFC449744', '4598465', '1417458600', 2, 1, NULL, 1, ''),
(5, 'kiran', '00007', 'kiran@saddaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'nope', 'nope', '1234567891', '1419445800', 'Male', 'B+', 'sdfgvdsfgvb', 'Male', 'nope', 'nope', 'tech', 'nope', 'nope', '9874561237', 'nope@gmail.com', '468984641698', '65494565894', '654654964647', 'HDFC449744', '4598465', '1417458600', 0, 1, NULL, 1, ''),
(11, 'sandeep', '0008', 'sandeep@saddahaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'nope', 'nope', '8096934497', '661372200', '', 'B+', 'nope', '', 'nope', 'nope', 'nope', 'nope', 'nope', '9948983078', 'nope@gmail.com', '54974998749', '8546759', '89765498797', 'HDEC54646', '123456', '1406831400', 0, 1, NULL, 1, ''),
(10, 'sudakar', '1234', 'suda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nope', 'nope', '806394494', '1419445800', 'Male', 'b+', '54654', 'Male', 'nope', 'v dsvdv', 'vdsvsdv', 'vsdvsdv', 'vvssd', '9784563210', 'dvsd@sfds.com', '548749', '7987896', '654654', '4654984', '5464', '1417372200', 0, 1, NULL, 1, ''),
(7, 'vdsvds', '205467', 'gffdg@grdef.com', 'e10adc3949ba59abbe56e057f20f883e', 'v fiv', 'vcjnb jkdnb', '9948983078', '1417372200', 'Male', 'b+', 'svsdvsd', 'Male', 'sdvsdvdsvs', 'bfdsbdsf', 'bdfsbdsb', 'bsdbsd', 'bbbdsb', '9978945612', 'bdsbds@fbfdb.com', '5498744694', '65496365469', '5546746665+6', '146549865694', '649684654', '1417458600', 0, 1, NULL, 1, ''),
(9, 'Jeswanth reddy HR', 'bfdbfdbfdb', 'hr@saddahaq.com', 'e10adc3949ba59abbe56e057f20f883e', 'bfdbfdb', 'bfdbfdbdf', '9491209805', '1419445800', 'Femal', 'fbdbdf', 'new &nbsp;', 'Female', 'bdffdbfd', 'tech', 'fdbdffd', 'bfdbdf', 'ddbdbd', '9948983078', 'bdfbfddf@gdfgvbd.com', '5000000', '1234567', '789456123', 'HDFC123456', '50000', '1417458600', 0, 0, NULL, 0, 'h1,h2,h3,h4,h5,h16'),
(13, 'birthday', 'dsgdsg', 'bdfbdfbd@vsd.com', 'e10adc3949ba59abbe56e057f20f883e', 'dvdsgvdsds', 'gvdsgvsdgsd', '9948983078', '1419532200', '25', 'b+', 'bdfbvdsb', 'Male', 'vdsvsd', 'vsdv', 'dsvdsvdsv', 'vdsv', 'dsvdsvv', '9948983078', 'vdsvvsd@gdgv.com', '5466684', '6846464', '465464', '65464864', '546484', '1419618600', 0, 1, NULL, 1, ''),
(12, 'ee', 'eee', 'hre@saddahaq.com', 'e2537517c5c777846964d4470ef855d2', 'eee', 'eee', '123456', '1419445800', '', 'ee', 'eee', '', 'ee', 'ewrew', 'werwerewr', '456', '444', '1234567890', '3e3233232@gmail.com', '233', '3333333', 'dsfds', 's', '123456', '1418063400', 2, 1, NULL, 1, ''),
(6, 'nope', 'nope', 'sddvsd@gdf.com', '92016dfee1f551a11764da38a30bdd3d', 'nope', 'nope', '1234567890', '1419445800', 'Male', 'b+', 'fbdfbdf', 'Male', 'bbfdbfdb', 'bfdb', 'bfdbdf', 'bdfbf', 'dbdfbfd', '9784561237', 'bdf@gredf.com', '5494946589', '44654984956', '4654789456496', '49846549647', '9848948', '1417458600', 0, 1, NULL, 1, ''),
(8, 'bdsfbdsfb', 'sdbsdbvsd', 'dgvdsfgvbds@erqfsd.om', '0b22d6d9cb38420d2b78614d746b3331', 'dvvdsvs', 'vdv', '9784563210', '1419445800', 'Male', 'dfvdsf', 'xcv sdvsdvb', 'Male', 'ffbfdsbdsfbdsf', 'vsdvdsv', 'bdsbds', 'bdsbsddfsb', 'bdbdfb', '9874561230', 'dsbvds@bvdfvb.com', '549648496', '464368496', '65464684', '64646974', '12234', '1417977000', 0, 1, NULL, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `new_updates`
--

CREATE TABLE IF NOT EXISTS `new_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `new_update` varchar(300) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `new_updates`
--

INSERT INTO `new_updates` (`id`, `new_update`, `time`) VALUES
(1, 'SaddaHaq''s social network and application platform wrap around a news core. ', 661372200),
(2, 'testing new update', 661372200),
(3, 'testing update', 661372200),
(4, 'hello', 1418725527),
(5, '', 1418820706),
(6, '    ', 1418820775),
(7, '   ', 1418820797),
(8, '    ', 1418820829),
(9, ' ', 1418821032),
(10, 'new notice', 1419576081),
(11, 'for all emp', 1419577576),
(12, 'bdfbfdbdsbdf', 1419578976),
(13, 'ggegsg', 1419592907),
(14, 'Happy new year', 1420105622);

-- --------------------------------------------------------

--
-- Table structure for table `Sheet1`
--

CREATE TABLE IF NOT EXISTS `Sheet1` (
  `A` varchar(3) DEFAULT NULL,
  `B` varchar(16) DEFAULT NULL,
  `C` varchar(217) DEFAULT NULL,
  `D` varchar(3) DEFAULT NULL,
  `E` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Sheet1`
--

INSERT INTO `Sheet1` (`A`, `B`, `C`, `D`, `E`) VALUES
('h1', 'New year', 'New Year is the time at which a new calendar year begins and the calendar''s year count is incremented', 'h1', 'THU JAN 1'),
('h2', 'Sankranti', 'Sankranti means transmigration of the Sun from one Rāshi to the next', 'h2', ''),
('h3', 'Republic Day', 'Republic Day is the name of a holiday in several countries to commemorate the day when they became republics.', 'h3', 'MON JAN '),
('h4', 'Shivaratri', 'The Maha Shivratri festival, also popularly known as ''Shivratri'' or ''Great Night of Lord Shiva', 'h4', 'TUE FEB '),
('h5', 'Holi', 'Holi is a spring festival also known as the festival of colours or the festival of love.', 'h5', ''),
('h6', 'Ugadi', 'Ugadi/Yugadi is the New Year''s Day for the people of the Deccan region of India.', 'h6', 'SAT MAR 21'),
('h7', 'Good Friday', 'Good Friday is a religious holiday, observed primarily by Christians, commemorating the crucifixion of Jesus Christ and his death at Calvary.', 'h7', 'FRI APR 3'),
('h8', 'May day', 'May 1st, often called May Day', 'h8', ''),
('h9', 'Ramzan', 'Eid al-Fitr (Ramzan Id, Eid-ul-Fitar, or Idul-Fitr) is a gazetted holiday in India. It celebrates the end of Ramadan and marks the first day of the Islamic month of Shawwal.', 'h9', 'SAT JUL '),
('h10', 'Independence Day', 'Independence Day, observed annually on 15 August, is a National Holiday in India commemorating the nation''s independence from the British Empire on 15 August 1947. ', 'h10', ''),
('h11', 'Rakhi', 'Raksha Bandhan or ''Rakhi'' is a special occasion to celebrate the chaste bond of love between a brother and a sister, by tying a sacred thread around the wrist.', 'h11', ''),
('h12', 'Vinayaka Cavithi', 'Ganesha Chaturthi is the Hindu festival celebrated in honour of the god Ganesha', 'h12', ''),
('h13', 'Gandhi Jayanti', 'Gandhi Jayanti is a national holiday celebrated in India to mark the occasion of the birthday of Mohandas Karamchand Gandhi, the "Father of the Nation".', 'h13', ''),
('h14', 'Dasara', 'Vijayadashami also known as Dussehra or Dasara or Dashain or Tenth day of Navratri or Durgotsav is one of the most important Hindu festivals celebrated in various forms, across India, Nepal, Sri Lanka, and Bangladesh.', 'h14', ''),
('h15', 'Deepavali', 'Diwali or Divali also known as Deepavali and the "festival of lights", is an ancient Hindu festival celebrated in autumn every year.', 'h15', ''),
('h16', 'Christmas', 'Christmas Day is an annual festival commemorating the birth of Jesus Christ, observed most commonly on December as a religious and cultural celebration among billions of people around the world.', 'h16', ''),
('h1', 'New year', 'New Year is the time at which a new calendar year begins and the calendar''s year count is incremented', 'h1', 'THU JAN 1'),
('h2', 'Sankranti', 'Sankranti means transmigration of the Sun from one Rāshi to the next', 'h2', ''),
('h3', 'Republic Day', 'Republic Day is the name of a holiday in several countries to commemorate the day when they became republics.', 'h3', 'MON JAN '),
('h4', 'Shivaratri', 'The Maha Shivratri festival, also popularly known as ''Shivratri'' or ''Great Night of Lord Shiva', 'h4', 'TUE FEB '),
('h5', 'Holi', 'Holi is a spring festival also known as the festival of colours or the festival of love.', 'h5', ''),
('h6', 'Ugadi', 'Ugadi/Yugadi is the New Year''s Day for the people of the Deccan region of India.', 'h6', 'SAT MAR 21'),
('h7', 'Good Friday', 'Good Friday is a religious holiday, observed primarily by Christians, commemorating the crucifixion of Jesus Christ and his death at Calvary.', 'h7', 'FRI APR 3'),
('h8', 'May day', 'May 1st, often called May Day', 'h8', ''),
('h9', 'Ramzan', 'Eid al-Fitr (Ramzan Id, Eid-ul-Fitar, or Idul-Fitr) is a gazetted holiday in India. It celebrates the end of Ramadan and marks the first day of the Islamic month of Shawwal.', 'h9', 'SAT JUL '),
('h10', 'Independence Day', 'Independence Day, observed annually on 15 August, is a National Holiday in India commemorating the nation''s independence from the British Empire on 15 August 1947. ', 'h10', ''),
('h11', 'Rakhi', 'Raksha Bandhan or ''Rakhi'' is a special occasion to celebrate the chaste bond of love between a brother and a sister, by tying a sacred thread around the wrist.', 'h11', ''),
('h12', 'Vinayaka Cavithi', 'Ganesha Chaturthi is the Hindu festival celebrated in honour of the god Ganesha', 'h12', ''),
('h13', 'Gandhi Jayanti', 'Gandhi Jayanti is a national holiday celebrated in India to mark the occasion of the birthday of Mohandas Karamchand Gandhi, the "Father of the Nation".', 'h13', ''),
('h14', 'Dasara', 'Vijayadashami also known as Dussehra or Dasara or Dashain or Tenth day of Navratri or Durgotsav is one of the most important Hindu festivals celebrated in various forms, across India, Nepal, Sri Lanka, and Bangladesh.', 'h14', ''),
('h15', 'Deepavali', 'Diwali or Divali also known as Deepavali and the "festival of lights", is an ancient Hindu festival celebrated in autumn every year.', 'h15', ''),
('h16', 'Christmas', 'Christmas Day is an annual festival commemorating the birth of Jesus Christ, observed most commonly on December as a religious and cultural celebration among billions of people around the world.', 'h16', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `slips`
--

INSERT INTO `slips` (`id`, `email`, `slip`, `month_of_payslip`, `time`) VALUES
(1, 'hr@saddahaq.com', 'Payslip-January-2014.pdf', 'January2014', '1417758686'),
(2, 'hr@saddahaq.com', 'Payslip-January-2014.pdf', 'January2014', '1417845249'),
(3, 'hr@saddahaq.com', 'Payslip-January-2014.pdf', 'January2014', '1417845331'),
(4, 'hr@saddahaq.com', 'Payslip-December-2014.pdf', 'December2014', '1417845450'),
(5, 'hr@saddahaq.com', 'Payslip-July-2014.pdf', 'July2014', '1417845507'),
(6, 'project_manager@saddahaq.com', 'Payslip-January-2014.pdf', 'January2014', '1418201705'),
(7, 'kiran@saddaq.com', 'Payslip-January-2014.pdf', 'January2014', '1418202012'),
(8, 'sandeep@saddahaq.com', 'Payslip-January-2014.pdf', 'January2014', '1418202751'),
(9, 'hr@saddahaq.com', 'Payslip-November-2014.pdf', 'November2014', '1418723077'),
(10, 'project_manager@saddahaq.com', 'Payslip-November-2014.pdf', 'November2014', '1418723122'),
(11, 'kiran@saddaq.com', 'Payslip-November-2014.pdf', 'November2014', '1418723123'),
(12, 'sandeep@saddahaq.com', 'Payslip-November-2014.pdf', 'November2014', '1418723123'),
(13, 'suda@gmail.com', 'Payslip-November-2014.pdf', 'November2014', '1418723123'),
(14, 'gffdg@grdef.com', 'Payslip-November-2014.pdf', 'November2014', '1418723217'),
(15, 'dgvdsfgvbds@erqfsd.om', 'Payslip-November-2014.pdf', 'November2014', '1418723217'),
(16, 'suda@gmail.com', 'Payslip-January-2014.pdf', 'January2014', '1418724743'),
(17, 'project_manager@saddahaq.com', 'Payslip-December-2014.pdf', 'December2014', '1418724753'),
(18, 'kiran@saddaq.com', 'Payslip-December-2014.pdf', 'December2014', '1418724843'),
(19, 'kiran@saddaq.com', 'Payslip-December-2014.pdf', 'December2014', '1418724844'),
(20, 'sandeep@saddahaq.com', 'Payslip-December-2014.pdf', 'December2014', '1418724844'),
(21, 'hr@saddahaq.com', 'Payslip-April-2014.pdf', 'April2014', '1418821817'),
(22, 'gffdg@grdef.com', 'Payslip-January-2014.pdf', 'January2014', '1418821835'),
(23, 'hre@saddahaq.com', 'Payslip-January-2014.pdf', 'January2014', '1418821836'),
(24, 'sddvsd@gdf.com', 'Payslip-January-2014.pdf', 'January2014', '1418821867'),
(25, 'hr@saddahaq.com', 'Payslip-September-2014.pdf', 'September2014', '1418821888'),
(26, 'project_manager@saddahaq.com', 'Payslip-September-2014.pdf', 'September2014', '1418821888'),
(27, 'kiran@saddaq.com', 'Payslip-September-2014.pdf', 'September2014', '1418821888'),
(28, 'project_manager@saddahaq.com', 'Payslip-July-2014.pdf', 'July2014', '1418826838'),
(29, 'kiran@saddaq.com', 'Payslip-July-2014.pdf', 'July2014', '1418826838'),
(30, 'hr@saddahaq.com', 'Payslip-June-2014.pdf', 'June2014', '1419406722'),
(31, 'sandeep@saddahaq.com', 'Payslip-July-2014.pdf', 'July2014', '1419407080'),
(32, 'hr@saddahaq.com', 'Payslip-March-2014.pdf', 'March2014', '1419407127'),
(33, 'hr@saddahaq.com', 'Payslip-August-2014.pdf', 'August2014', '1419407203'),
(34, 'hr@saddahaq.com', 'Payslip-May-2014.pdf', 'May2014', '1419407678'),
(35, 'bdfbdfbd@vsd.com', 'Payslip-January-2014.pdf', 'January2014', '1419655078'),
(36, 'dgvdsfgvbds@erqfsd.om', 'Payslip-January-2014.pdf', 'January2014', '1419655288'),
(37, 'project_manager@saddahaq.com', 'Payslip-May-2014.pdf', 'May2014', '1420019458'),
(38, 'kiran@saddaq.com', 'Payslip-May-2014.pdf', 'May2014', '1420019459'),
(39, 'hr@saddahaq.com', 'Payslip-January-2015.pdf', 'January2015', '1420105965'),
(40, 'project_manager@saddahaq.com', 'Payslip-January-2015.pdf', 'January2015', '1420105966'),
(41, 'kiran@saddaq.com', 'Payslip-January-2015.pdf', 'January2015', '1420105966'),
(42, 'hr@saddahaq.com', 'Payslip-February-2015.pdf', 'February2015', '1420106158'),
(43, 'hr@saddahaq.com', 'Payslip-March-2015.pdf', 'March2015', '1420106315'),
(44, 'hr@saddahaq.com', 'Payslip-September-2015.pdf', 'September2015', '1420106350'),
(45, 'hr@saddahaq.com', 'Payslip-October-2015.pdf', 'October2015', '1420106521'),
(46, 'hr@saddahaq.com', 'Payslip-November-2015.pdf', 'November2015', '1420106592');

-- --------------------------------------------------------

--
-- Table structure for table `TABLE 8`
--

CREATE TABLE IF NOT EXISTS `TABLE 8` (
  `COL 1` varchar(179) DEFAULT NULL,
  `COL 2` varchar(135) DEFAULT NULL,
  `COL 3` varchar(152) DEFAULT NULL,
  `COL 4` varchar(10) DEFAULT NULL,
  `COL 5` varchar(33) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TABLE 8`
--

INSERT INTO `TABLE 8` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`) VALUES
('h1	New year	New Year is the time at which a new calendar year begins and the calendar''s year count is incremented	h1	THU JAN 1st', NULL, NULL, NULL, NULL),
('h2	Sankranti	Sankranti means transmigration of the Sun from one Rāshi to the next	h2	WED JAN 14th', NULL, NULL, NULL, NULL),
('h3	Republic Day	Republic Day is the name of a holiday in several countries to commemorate the day when they became republics.	h3	MON JAN 14th', NULL, NULL, NULL, NULL),
('h4	Shivaratri	The Maha Shivratri festival', ' also popularly known as ''Shivratri'' or ''Great Night of Lord Shiva	h4	TUE FEB 17th', NULL, NULL, NULL),
('h5	Holi	Holi is a spring festival also known as the festival of colours or the festival of love.	h5	FRI MAR 6th', NULL, NULL, NULL, NULL),
('h6	Ugadi	Ugadi/Yugadi  is the New Year''s Day for the people of the Deccan region of India.	h6	SAT MAR 21th', NULL, NULL, NULL, NULL),
('h7	Good Friday	Good Friday is a religious holiday', ' observed primarily by Christians', ' commemorating the crucifixion of Jesus Christ and his death at Calvary.	h7	FRI APR 3rd', NULL, NULL),
('h8	May day	May 1st', ' often called May Day	h8	FRI MAY 1ST', NULL, NULL, NULL),
('h9	Ramzan	Eid al-Fitr (Ramzan Id', ' Eid-ul-Fitar', ' or Idul-Fitr) is a gazetted holiday in India. It celebrates the end of Ramadan and marks the first day of the Islamic month of Shawwal.	h9	SAT JUL 18th', NULL, NULL),
('h10	Independence Day	Independence Day', ' observed annually on 15 August', ' is a National Holiday in India commemorating the nation''s independence from the British Empire on 15 August 1947. 	h10	SAT AUG 15th', NULL, NULL),
('h11	Rakhi	Raksha Bandhan or ''Rakhi'' is a special occasion to celebrate the chaste bond of love between a brother and a sister', ' by tying a sacred thread around the wrist.	h11	SAT AUG 29th', NULL, NULL, NULL),
('h12	Vinayaka Cavithi	Ganesha Chaturthi  is the Hindu festival celebrated in honour of the god Ganesha	h12	THU SEP 17th', NULL, NULL, NULL, NULL),
('h13	Gandhi Jayanti	Gandhi Jayanti is a national holiday celebrated in India to mark the occasion of the birthday of Mohandas Karamchand Gandhi', ' the "Father of the Nation".	h13	FRI OCT 2ND', NULL, NULL, NULL),
('h14	Dasara	Vijayadashami also known as Dussehra or Dasara or Dashain or Tenth day of Navratri or Durgotsav is one of the most important Hindu festivals celebrated in various forms', ' across India', ' Nepal', ' Sri Lanka', ' and Bangladesh.	h14	THU OCT 22ND'),
('h15	Deepavali	Diwali or Divali also known as Deepavali and the "festival of lights"', ' is an ancient Hindu festival celebrated in autumn every year.	h15	WED NOV 11TH', NULL, NULL, NULL),
('h16	Christmas	Christmas Day is an annual festival commemorating the birth of Jesus Christ', ' observed most commonly on December as a religious and cultural celebration among billions of people around the world.	h16	FRI DEC 25th', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
