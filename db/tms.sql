-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2020 at 04:33 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_info`
--

DROP TABLE IF EXISTS `attendance_info`;
CREATE TABLE IF NOT EXISTS `attendance_info` (
  `aten_id` int(20) NOT NULL AUTO_INCREMENT,
  `atn_user_id` int(20) NOT NULL,
  `in_time` varchar(200) DEFAULT NULL,
  `out_time` varchar(150) DEFAULT NULL,
  `total_duration` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aten_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_info`
--

DROP TABLE IF EXISTS `task_info`;
CREATE TABLE IF NOT EXISTS `task_info` (
  `task_id` int(50) NOT NULL AUTO_INCREMENT,
  `t_title` varchar(120) NOT NULL,
  `t_description` text,
  `t_start_time` varchar(100) DEFAULT NULL,
  `t_end_time` varchar(100) DEFAULT NULL,
  `t_user_id` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = incomplete, 1 = In progress, 2 = complete',
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_password` varchar(100) DEFAULT NULL,
  `user_role` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `fullname`, `username`, `email`, `password`, `temp_password`, `user_role`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
