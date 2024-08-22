-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2024 at 11:01 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pageant_socotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `configName` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `configName` (`configName`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `configName`, `value`) VALUES
(1, 'Pageant Name', 'MISS SOCOTECH CRIMINOLOGY 2024'),
(2, 'Finals', '1'),
(3, 'Judges Divisor', '5'),
(4, 'Category Divisor', '7'),
(5, 'Set Initial Data', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'Semifinals', '0'),
(7, 'isAutoRefresh', '1'),
(9, 'Show Interview Result', '0');

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

DROP TABLE IF EXISTS `judges`;
CREATE TABLE IF NOT EXISTS `judges` (
  `judgeID` int NOT NULL AUTO_INCREMENT,
  `judgeName` varchar(50) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`judgeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`judgeID`, `judgeName`, `status`) VALUES
(1, 'Judge 1', 1),
(2, 'Judge 2', 1),
(3, 'Judge 3', 1),
(4, 'Judge 4', 1),
(5, 'Judge 5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `miss_candidates`
--

DROP TABLE IF EXISTS `miss_candidates`;
CREATE TABLE IF NOT EXISTS `miss_candidates` (
  `canNo` int NOT NULL,
  `fullname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `isSemiFinalist` tinyint NOT NULL,
  `isFinalist` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`canNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miss_candidates`
--

INSERT INTO `miss_candidates` (`canNo`, `fullname`, `remarks`, `isSemiFinalist`, `isFinalist`) VALUES
(1, 'BAROBO', '', 0, 1),
(2, 'PROSPERIDAD', '', 0, 1),
(3, 'ESPERANZA', '', 0, 1),
(4, 'TALACOGON', '', 0, 1),
(5, 'SAN LUIS- LORETO- LA PAZ', '', 0, 1),
(6, 'ROSARIO', '', 0, 1),
(7, 'SAN FRANCISCO', '', 0, 1),
(8, 'VERUELA- SIBAGAT- STA. JOSEFA', '', 0, 1),
(9, 'SURIGAO DEL SUR', '', 0, 1),
(10, 'TRENTO- BUNAWAN', '', 0, 1),
(11, 'BAYUGAN CITY', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `miss_casual_rating`
--

DROP TABLE IF EXISTS `miss_casual_rating`;
CREATE TABLE IF NOT EXISTS `miss_casual_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_casual_rating`
--

INSERT INTO `miss_casual_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_finals_rating`
--

DROP TABLE IF EXISTS `miss_finals_rating`;
CREATE TABLE IF NOT EXISTS `miss_finals_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `beauty` int NOT NULL,
  `intelligence` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miss_finals_rating`
--

INSERT INTO `miss_finals_rating` (`id`, `judgeID`, `canNo`, `beauty`, `intelligence`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_gown_rating`
--

DROP TABLE IF EXISTS `miss_gown_rating`;
CREATE TABLE IF NOT EXISTS `miss_gown_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `elegance` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_gown_rating`
--

INSERT INTO `miss_gown_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `elegance`, `score`) VALUES
(1, 1, 1, 0, 0, 0, 0),
(2, 1, 2, 0, 0, 0, 0),
(3, 1, 3, 0, 0, 0, 0),
(4, 1, 4, 0, 0, 0, 0),
(5, 1, 5, 0, 0, 0, 0),
(6, 1, 6, 0, 0, 0, 0),
(7, 1, 7, 0, 0, 0, 0),
(8, 1, 8, 0, 0, 0, 0),
(9, 1, 9, 0, 0, 0, 0),
(10, 1, 10, 0, 0, 0, 0),
(11, 1, 11, 0, 0, 0, 0),
(12, 2, 1, 0, 0, 0, 0),
(13, 2, 2, 0, 0, 0, 0),
(14, 2, 3, 0, 0, 0, 0),
(15, 2, 4, 0, 0, 0, 0),
(16, 2, 5, 0, 0, 0, 0),
(17, 2, 6, 0, 0, 0, 0),
(18, 2, 7, 0, 0, 0, 0),
(19, 2, 8, 0, 0, 0, 0),
(20, 2, 9, 0, 0, 0, 0),
(21, 2, 10, 0, 0, 0, 0),
(22, 2, 11, 0, 0, 0, 0),
(23, 3, 1, 0, 0, 0, 0),
(24, 3, 2, 0, 0, 0, 0),
(25, 3, 3, 0, 0, 0, 0),
(26, 3, 4, 0, 0, 0, 0),
(27, 3, 5, 0, 0, 0, 0),
(28, 3, 6, 0, 0, 0, 0),
(29, 3, 7, 0, 0, 0, 0),
(30, 3, 8, 0, 0, 0, 0),
(31, 3, 9, 0, 0, 0, 0),
(32, 3, 10, 0, 0, 0, 0),
(33, 3, 11, 0, 0, 0, 0),
(34, 4, 1, 0, 0, 0, 0),
(35, 4, 2, 0, 0, 0, 0),
(36, 4, 3, 0, 0, 0, 0),
(37, 4, 4, 0, 0, 0, 0),
(38, 4, 5, 0, 0, 0, 0),
(39, 4, 6, 0, 0, 0, 0),
(40, 4, 7, 0, 0, 0, 0),
(41, 4, 8, 0, 0, 0, 0),
(42, 4, 9, 0, 0, 0, 0),
(43, 4, 10, 0, 0, 0, 0),
(44, 4, 11, 0, 0, 0, 0),
(45, 5, 1, 0, 0, 0, 0),
(46, 5, 2, 0, 0, 0, 0),
(47, 5, 3, 0, 0, 0, 0),
(48, 5, 4, 0, 0, 0, 0),
(49, 5, 5, 0, 0, 0, 0),
(50, 5, 6, 0, 0, 0, 0),
(51, 5, 7, 0, 0, 0, 0),
(52, 5, 8, 0, 0, 0, 0),
(53, 5, 9, 0, 0, 0, 0),
(54, 5, 10, 0, 0, 0, 0),
(55, 5, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_playsuit_rating`
--

DROP TABLE IF EXISTS `miss_playsuit_rating`;
CREATE TABLE IF NOT EXISTS `miss_playsuit_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_playsuit_rating`
--

INSERT INTO `miss_playsuit_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_production_rating`
--

DROP TABLE IF EXISTS `miss_production_rating`;
CREATE TABLE IF NOT EXISTS `miss_production_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_production_rating`
--

INSERT INTO `miss_production_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_sports_rating`
--

DROP TABLE IF EXISTS `miss_sports_rating`;
CREATE TABLE IF NOT EXISTS `miss_sports_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_sports_rating`
--

INSERT INTO `miss_sports_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_tourism_rating`
--

DROP TABLE IF EXISTS `miss_tourism_rating`;
CREATE TABLE IF NOT EXISTS `miss_tourism_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_tourism_rating`
--

INSERT INTO `miss_tourism_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `miss_uniform_rating`
--

DROP TABLE IF EXISTS `miss_uniform_rating`;
CREATE TABLE IF NOT EXISTS `miss_uniform_rating` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judgeID` int NOT NULL,
  `canNo` int NOT NULL,
  `pose` int NOT NULL,
  `beauty` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `judgeID` (`judgeID`,`canNo`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_uniform_rating`
--

INSERT INTO `miss_uniform_rating` (`id`, `judgeID`, `canNo`, `pose`, `beauty`, `score`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 2, 1, 0, 0, 0),
(13, 2, 2, 0, 0, 0),
(14, 2, 3, 0, 0, 0),
(15, 2, 4, 0, 0, 0),
(16, 2, 5, 0, 0, 0),
(17, 2, 6, 0, 0, 0),
(18, 2, 7, 0, 0, 0),
(19, 2, 8, 0, 0, 0),
(20, 2, 9, 0, 0, 0),
(21, 2, 10, 0, 0, 0),
(22, 2, 11, 0, 0, 0),
(23, 3, 1, 0, 0, 0),
(24, 3, 2, 0, 0, 0),
(25, 3, 3, 0, 0, 0),
(26, 3, 4, 0, 0, 0),
(27, 3, 5, 0, 0, 0),
(28, 3, 6, 0, 0, 0),
(29, 3, 7, 0, 0, 0),
(30, 3, 8, 0, 0, 0),
(31, 3, 9, 0, 0, 0),
(32, 3, 10, 0, 0, 0),
(33, 3, 11, 0, 0, 0),
(34, 4, 1, 0, 0, 0),
(35, 4, 2, 0, 0, 0),
(36, 4, 3, 0, 0, 0),
(37, 4, 4, 0, 0, 0),
(38, 4, 5, 0, 0, 0),
(39, 4, 6, 0, 0, 0),
(40, 4, 7, 0, 0, 0),
(41, 4, 8, 0, 0, 0),
(42, 4, 9, 0, 0, 0),
(43, 4, 10, 0, 0, 0),
(44, 4, 11, 0, 0, 0),
(45, 5, 1, 0, 0, 0),
(46, 5, 2, 0, 0, 0),
(47, 5, 3, 0, 0, 0),
(48, 5, 4, 0, 0, 0),
(49, 5, 5, 0, 0, 0),
(50, 5, 6, 0, 0, 0),
(51, 5, 7, 0, 0, 0),
(52, 5, 8, 0, 0, 0),
(53, 5, 9, 0, 0, 0),
(54, 5, 10, 0, 0, 0),
(55, 5, 11, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
