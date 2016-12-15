-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2016 at 08:02 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaken_kodomottbj`
--

-- --------------------------------------------------------

--
-- Table structure for table `kodomo_manager`
--

CREATE TABLE `kodomo_manager` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kodomo_manager`
--

INSERT INTO `kodomo_manager` (`id`, `username`, `password`, `auth`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', 1),
(2, 'teacher', '96e79218965eb72c92a549dd5a330112', 0),
(3, 'teacher1', '698d51a19d8a121ce581499d7b701668', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kodomo_scores`
--

CREATE TABLE `kodomo_scores` (
  `id` int(128) NOT NULL,
  `test_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `user_answers` longtext COLLATE utf8_unicode_ci,
  `question_answer` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kodomo_stusers`
--

CREATE TABLE `kodomo_stusers` (
  `id` int(128) NOT NULL,
  `uid` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stuname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `school_type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `school_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `team` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_location` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `usergroup` int(128) NOT NULL,
  `lastdate` int(11) NOT NULL,
  `loginnum` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kodomo_stusers`
--

INSERT INTO `kodomo_stusers` (`id`, `uid`, `stuname`, `birthday`, `school_type`, `school_name`, `grade`, `team`, `num`, `school_location`, `usergroup`, `lastdate`, `loginnum`) VALUES
(1, 'kaca1', 'kaca', '1989/12/21', '日本公立学校', '根岸小学校', '1', '1', '2', '日本', 2, 1470069166, 0),
(2, 'fsd2\r\n', 'fsd', '2016/08/02', '日本公立学校', 'fd', '2', 'd', 'd', 'fsd', 1, 1470114773, 0),
(3, 'fsd3', 'fsd', '2016/08/02', '日本公立学校', 'fd', '2', 'd', 'd', 'fsd', 1, 1470114995, 0),
(4, 'fsd4', 'fsd', '2016/08/02', '日本公立学校', 'fd', '2', 'd', 'd', 'fsd', 1, 1470115021, 0),
(5, 'fsd5', 'fsd', '2016/08/02', '日本公立学校', 'fd', '2', 'd', 'd', 'fsd', 1, 1470115036, 0),
(6, 'fsd6', 'fsd', '2016/08/02', '日本公立学校', 'fd', '2', 'd', 'd', 'fsd', 1, 1470115325, 0),
(7, 'test7', 'test', '2009/02/03', '日本公立学校', 'yeji', '1', '1', '2', 'china', 1, 1470115898, 0),
(8, 'kanadajyunn8', 'kanadajyunn', '1999/12/27', '2', 'fd', '1', 'fd', 'fd', 's', 1, 1470115966, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kodomo_testsql`
--

CREATE TABLE `kodomo_testsql` (
  `id` int(8) UNSIGNED NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kodomo_testsql`
--

INSERT INTO `kodomo_testsql` (`id`, `data`) VALUES
(1, 'codomoTTBJ'),
(2, ' SQL'),
(3, ' Connection TEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kodomo_manager`
--
ALTER TABLE `kodomo_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kodomo_scores`
--
ALTER TABLE `kodomo_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kodomo_stusers`
--
ALTER TABLE `kodomo_stusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kodomo_testsql`
--
ALTER TABLE `kodomo_testsql`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kodomo_manager`
--
ALTER TABLE `kodomo_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kodomo_scores`
--
ALTER TABLE `kodomo_scores`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kodomo_stusers`
--
ALTER TABLE `kodomo_stusers`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kodomo_testsql`
--
ALTER TABLE `kodomo_testsql`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
