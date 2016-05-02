-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 08:42 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--
CREATE DATABASE IF NOT EXISTS `social_network` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `social_network`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `CommentID` bigint(20) NOT NULL,
  `Comment` longtext NOT NULL,
  PRIMARY KEY (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

DROP TABLE IF EXISTS `friendship`;
CREATE TABLE IF NOT EXISTS `friendship` (
  `UserID` bigint(20) NOT NULL,
  `FriendsID` bigint(20) NOT NULL,
  KEY `UserID` (`UserID`),
  KEY `FriendsID` (`FriendsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `ProfileID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Gender` enum('Male','Female','Other','') NOT NULL,
  `Age` tinyint(3) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Occupation` varchar(65) NOT NULL,
  `Interests` text NOT NULL,
  PRIMARY KEY (`ProfileID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profilecomment`
--

DROP TABLE IF EXISTS `profilecomment`;
CREATE TABLE IF NOT EXISTS `profilecomment` (
  `ProfileID` bigint(20) NOT NULL,
  `CommentID` bigint(11) NOT NULL,
  KEY `ProfileID` (`ProfileID`),
  KEY `CommentID` (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `senderrecievercomment`
--

DROP TABLE IF EXISTS `senderrecievercomment`;
CREATE TABLE IF NOT EXISTS `senderrecievercomment` (
  `CommentID` bigint(20) NOT NULL,
  `SenderID` bigint(20) NOT NULL,
  `RecieverID` bigint(20) NOT NULL,
  KEY `CommentID` (`CommentID`),
  KEY `SenderID` (`SenderID`),
  KEY `RecieverID` (`RecieverID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Email` varchar(65) NOT NULL,
  `Password` varchar(65) NOT NULL,
  `FirstName` varchar(65) NOT NULL,
  `LastName` varchar(65) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `FirstName`, `LastName`) VALUES
(23, 'troynguyen@gmail.com', '2121', 'Troy', 'Nguyen'),
(24, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

DROP TABLE IF EXISTS `userprofile`;
CREATE TABLE IF NOT EXISTS `userprofile` (
  `UserID` bigint(20) NOT NULL,
  `ProfileID` bigint(20) NOT NULL,
  KEY `UserID` (`UserID`),
  KEY `ProfileID` (`ProfileID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`FriendsID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `senderrecievercomment`
--
ALTER TABLE `senderrecievercomment`
  ADD CONSTRAINT `senderrecievercomment_ibfk_1` FOREIGN KEY (`CommentID`) REFERENCES `comment` (`CommentID`),
  ADD CONSTRAINT `senderrecievercomment_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `senderrecievercomment_ibfk_3` FOREIGN KEY (`RecieverID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`ProfileID`) REFERENCES `profile` (`ProfileID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
