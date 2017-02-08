-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 07:32 PM
-- Server version: 5.7.16
-- PHP Version: 5.6.28

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
-- Table structure for table `kodomo_exstatus`
--

CREATE TABLE `kodomo_exstatus` (
  `id` int(128) NOT NULL,
  `uid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `paper_name` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kodomo_exstatus`
--

INSERT INTO `kodomo_exstatus` (`id`, `uid`, `paper_name`, `level`) VALUES
(1, 'kaca1', 'spoty', 0),
(2, 'kaca1', 'spot', 0),
(3, 'kaca1', 'moji', 0),
(4, 'fsd2', 'spoty', 0),
(5, 'fsd2', 'spot', 0),
(6, 'fsd2', 'moji', 0),
(7, 'fsd3', 'spoty', 0),
(8, 'fsd3', 'spot', 0),
(9, 'fsd3', 'moji', 0),
(10, 'fsd4', 'spoty', 0),
(11, 'fsd4', 'spot', 0),
(12, 'fsd4', 'moji', 0),
(13, 'fsd5', 'spoty', 0),
(14, 'fsd5', 'spot', 0),
(15, 'fsd5', 'moji', 0),
(16, 'fsd6', 'spoty', 0),
(17, 'fsd6', 'spot', 0),
(18, 'fsd6', 'moji', 0),
(19, 'test7', 'spoty', 0),
(20, 'test7', 'spot', 0),
(21, 'test7', 'moji', 0),
(22, 'kanadajyunn8', 'spoty', 0),
(23, 'kanadajyunn8', 'spot', 0),
(24, 'kanadajyunn8', 'moji', 0),
(25, 'test9', 'spoty', 0),
(26, 'test9', 'spot', 0),
(27, 'test9', 'moji', 0),
(28, 'tarou10', 'spoty', 0),
(29, 'tarou10', 'spot', 0),
(30, 'tarou10', 'moji', 0),
(31, 'tarou11', 'spoty', 0),
(32, 'tarou11', 'spot', 0),
(33, 'tarou11', 'moji', 0),
(34, 'ああ12', 'spoty', 0),
(35, 'ああ12', 'spot', 0),
(36, 'ああ12', 'moji', 0),
(37, 'tarou13', 'spoty', 0),
(38, 'tarou13', 'spot', 0),
(39, 'tarou13', 'moji', 0),
(40, 'testStatus16', 'spoty', 0),
(41, 'testStatus16', 'spot', 0),
(42, 'testStatus16', 'moji', 0);

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
(3, 'teacher1', '698d51a19d8a121ce581499d7b701668', 0),
(4, 'dong', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'satou', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(6, 'test2', '96e79218965eb72c92a549dd5a330112', 0);

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
  `answer_times` longtext COLLATE utf8_unicode_ci,
  `question_answer` longtext COLLATE utf8_unicode_ci,
  `uuid` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kodomo_scores`
--

INSERT INTO `kodomo_scores` (`id`, `test_name`, `create_time`, `end_time`, `score`, `user_answers`, `answer_times`, `question_answer`, `uuid`) VALUES
(5, '12', '2016-12-15 18:06:38', '2016-12-15 18:28:19', NULL, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '4&2&2&1&1&1&1&1&2&1&1&1&1&1&1&1&1&1&1&1&2&2&2&1&1&1&1&1&1&1', NULL, 'test7'),
(6, '10', '2016-12-15 18:06:38', '2016-12-15 18:28:19', NULL, 'DDDDDDDEEEDDDDDDDDDCDEEECEEDCD', '3&5&2&2&2&2&2&2&1&1&2&2&2&2&2&2&2&2&3&2&2&1&1&1&3&2&2&2&2&3', NULL, 'test7'),
(7, '7', '2016-12-16 05:58:41', '2016-12-16 05:58:41', NULL, 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', '10&1&1&1&2&1&1&1&1&2&1&1&1&2&1&1&1&1&2&1&1&1&1&1&1&2&1&1&2&1', NULL, 'fsd6'),
(8, '9', '2016-12-16 05:58:41', '2016-12-16 05:58:41', NULL, 'EEEEEEEEEE', '7&1&1&1&1&1&1&1&1&1', NULL, 'fsd6'),
(9, '4', '2016-12-16 06:04:35', '2016-12-16 06:04:35', NULL, 'BBADBBEDDDDEEEEEEEEEEEEEEEEEEC', '10&7&7&3&9&5&17&5&3&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&16&2', NULL, 'fsd5'),
(10, '3', '2016-12-16 06:04:35', '2016-12-16 06:04:35', NULL, 'AAACCC', '2&1&1&1&1&1', NULL, 'fsd5'),
(11, '8', '2016-12-16 06:43:20', '2016-12-16 06:43:20', NULL, 'EEEEEEEEEEEEEEEEEEEEEEEEEEEEEE', '0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0&0', NULL, 'tarou13'),
(12, '10', '2016-12-16 06:43:20', '2016-12-16 06:43:20', NULL, 'CACAACAACCAACCCCCCCCEEEEEEEEEE', '3&2&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1&1', NULL, 'tarou13'),
(13, '7', '2016-12-16 06:43:20', '2016-12-16 06:43:20', NULL, 'EEEEEEEEAABDDEEEEEEEEDEEEEEDDD', '18&5&2&4&16&16&16&7&10&3&2&2&10&16&3&1&1&1&1&6&11&9&4&5&4&16&2&5&2&2', NULL, 'tarou13'),
(14, '12', '2016-12-16 08:17:54', '2016-12-16 08:17:54', NULL, 'BEEDADAEBBDEEEECEEEDDDCEEEEEED', '4&16&5&6&7&8&11&3&12&12&4&16&16&16&16&2&2&16&1&2&1&1&2&2&1&1&1&1&1&11', NULL, 'fsd4');

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
(8, 'kanadajyunn8', 'kanadajyunn', '1999/12/27', '2', 'fd', '1', 'fd', 'fd', 's', 1, 1470115966, 0),
(9, 'test9', 'test', '2015/12/01', '日本公立学校', '123', '1', '1', '1', '1', 4, 1470179207, 0),
(10, 'tarou10', 'tarou', '2008/12/28', '日本公立学校', '日本小学校', '1', '1', '43', '日本', 5, 1470188811, 0),
(11, 'tarou11', 'tarou', '2008/12/28', '日本公立学校', '日本小学校', '1', '1', '43', '日本', 5, 1470188964, 0),
(12, 'ああ12', 'ああ', '2017/07/13', '日本公立学校', '', '1', '', '', 'アメリカ', 6, 1480067026, 0),
(13, 'tarou13', 'tarou', '2016/11/25', '日本公立学校', '111', '1', '', '', 'アメリカ', 6, 1480067132, 0),
(16, 'testStatus16', 'testStatus', '2013/02/05', '日本公立学校', 'fdsf', '1', '1', '1', 'china', 2, 1486562453, 0);

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
-- Indexes for table `kodomo_exstatus`
--
ALTER TABLE `kodomo_exstatus`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kodomo_exstatus`
--
ALTER TABLE `kodomo_exstatus`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `kodomo_manager`
--
ALTER TABLE `kodomo_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kodomo_scores`
--
ALTER TABLE `kodomo_scores`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kodomo_stusers`
--
ALTER TABLE `kodomo_stusers`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kodomo_testsql`
--
ALTER TABLE `kodomo_testsql`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
