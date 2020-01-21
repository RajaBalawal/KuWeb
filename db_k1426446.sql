-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2018 at 08:04 PM
-- Server version: 10.0.21-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_k1426446`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_uploaded`
--

CREATE TABLE IF NOT EXISTS `cv_uploaded` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `role_category_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `upload_datetime` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'P',
  `feedback` text NOT NULL,
  `share_permission` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_uploaded`
--

INSERT INTO `cv_uploaded` (`id`, `student_id`, `role_category_id`, `file`, `upload_datetime`, `status`, `feedback`, `share_permission`) VALUES
(6, 0, 10, '170505130913_CVPDF.pdf', '2017-05-05 13:09:13', 'I', 'not good', 0),
(7, 2, 10, '170505174600_CI5220 Exam Answers 2015-16.doc', '2017-05-05 17:46:00', 'P', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_categories`
--

CREATE TABLE IF NOT EXISTS `role_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_categories`
--

INSERT INTO `role_categories` (`id`, `category_name`) VALUES
(4, 'Accountancy'),
(6, 'Advertising, Marketing and PR'),
(7, 'Banking and Finance'),
(8, 'Built Environment '),
(9, 'Energy and Utilities'),
(10, 'Engineering'),
(11, 'Environment and Agriculture'),
(12, 'Fashion'),
(13, 'FMCG'),
(14, 'HR and Recruitment'),
(15, 'Information Technology'),
(16, 'LAW'),
(17, 'Retail'),
(18, 'Science '),
(19, 'Sport and Leisure'),
(20, 'Tourism '),
(21, 'Transport and Logistics');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_name`, `father_name`, `contact`, `address`) VALUES
(1, 2, 'test', 'nothing', 'test', '161a merton road'),
(4, 6, 'balawal', '1234', '12341234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` int(11) NOT NULL,
  `expiry` datetime DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `expiry`, `active`) VALUES
(1, 'admin@admin.com', '1234', 1, NULL, 0),
(2, 'test@hotmail.com', 'TVRJek5BPT0=', 1, NULL, 1),
(3, 'test2@hotmail.com', 'TVRJek5BPT0=', 2, NULL, 1),
(4, 'nick@hotmail.com', 'TVRJek5EVTI=', 3, '2017-05-06 12:20:00', 1),
(5, 'balawal@hotmail.com', 'TVRJek5BPT0=', 2, NULL, 1),
(6, 'balawalhotmail.com', 'TVRJek5BPT0=', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`, `active`) VALUES
(1, 'Admin', 1),
(2, 'Student', 1),
(3, 'Employer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_uploaded`
--
ALTER TABLE `cv_uploaded`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_categories`
--
ALTER TABLE `role_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_uploaded`
--
ALTER TABLE `cv_uploaded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role_categories`
--
ALTER TABLE `role_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
