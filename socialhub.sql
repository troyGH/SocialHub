-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2016 at 02:59 AM
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
  `CommentID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Comment` longtext NOT NULL,
  PRIMARY KEY (`CommentID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `Comment`) VALUES
(1, 'Test Comment'),
(2, 'Hi Jane - Tom'),
(3, 'Testing'),
(5, 'Taylor Swift commenting'),
(6, 'Taylor&#39;s comment'),
(7, 'I&#39;m John Doe');

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

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`UserID`, `FriendsID`) VALUES
(25, 27),
(27, 25),
(25, 28),
(28, 25),
(26, 25),
(25, 26),
(26, 27),
(27, 26),
(23, 25),
(25, 23),
(23, 27),
(27, 23),
(28, 26),
(26, 28),
(28, 27),
(27, 28);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ProfileID`, `Gender`, `Age`, `City`, `State`, `Occupation`, `Interests`) VALUES
(12, 'Female', 19, 'San Jose', 'CA', 'Singer', 'Music'),
(13, 'Male', 7, 'cc', 'cc', 'cc', 'cc'),
(14, 'Female', 24, 'Los Angeles', 'CA', 'Singer', 'Music'),
(15, 'Male', 30, 'San Francisco', 'CA', 'Actor', 'Acting'),
(19, 'Male', 25, 'Test', 'Test', 'Test', 'Test');

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

--
-- Dumping data for table `profilecomment`
--

INSERT INTO `profilecomment` (`ProfileID`, `CommentID`) VALUES
(12, 1),
(12, 2),
(19, 3),
(13, 5),
(12, 6),
(14, 7);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `UserID` bigint(20) NOT NULL,
  `FriendID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`UserID`, `FriendID`) VALUES
(28, 23),
(26, 23);

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

--
-- Dumping data for table `senderrecievercomment`
--

INSERT INTO `senderrecievercomment` (`CommentID`, `SenderID`, `RecieverID`) VALUES
(1, 23, 25),
(2, 28, 25),
(3, 25, 23),
(5, 27, 26),
(6, 27, 25),
(7, 26, 27);

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `FirstName`, `LastName`) VALUES
(23, 'troynguyen@gmail.com', '111', 'Troy', 'Nguyen'),
(25, 'janedoe@gmail.com', '111', 'Jane', 'Doe'),
(26, 'johndoe@gmail.com', '111', 'John', 'Doe'),
(27, 'ts@gmail.com', '111', 'Taylor ', 'Swift'),
(28, 'tom@gmail.com', '111', 'Tom', 'Smith');

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
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`UserID`, `ProfileID`) VALUES
(25, 12),
(26, 13),
(27, 14),
(28, 15),
(23, 19);

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
