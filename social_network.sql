-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 04:16 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` bigint(20) NOT NULL,
  `Comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `Comment`) VALUES
(1, 'Test Comment');

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `UserID` bigint(20) NOT NULL,
  `FriendsID` bigint(20) NOT NULL
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
(27, 26);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ProfileID` bigint(20) NOT NULL,
  `Gender` enum('Male','Female','Other','') NOT NULL,
  `Age` tinyint(3) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Occupation` varchar(65) NOT NULL,
  `Interests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ProfileID`, `Gender`, `Age`, `City`, `State`, `Occupation`, `Interests`) VALUES
(12, 'Female', 4, 'aa', 'aa', 'aa', 'aa'),
(13, 'Male', 7, 'cc', 'cc', 'cc', 'cc'),
(14, 'Female', 2, 'bb', 'bb', 'bb', 'bb'),
(15, 'Female', 1, 'dd', 'dd', 'dd', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `profilecomment`
--

CREATE TABLE `profilecomment` (
  `ProfileID` bigint(20) NOT NULL,
  `CommentID` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilecomment`
--

INSERT INTO `profilecomment` (`ProfileID`, `CommentID`) VALUES
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `UserID` bigint(20) NOT NULL,
  `FriendID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`UserID`, `FriendID`) VALUES
(28, 27);

-- --------------------------------------------------------

--
-- Table structure for table `senderrecievercomment`
--

CREATE TABLE `senderrecievercomment` (
  `CommentID` bigint(20) NOT NULL,
  `SenderID` bigint(20) NOT NULL,
  `RecieverID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senderrecievercomment`
--

INSERT INTO `senderrecievercomment` (`CommentID`, `SenderID`, `RecieverID`) VALUES
(1, 23, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` bigint(20) NOT NULL,
  `Email` varchar(65) NOT NULL,
  `Password` varchar(65) NOT NULL,
  `FirstName` varchar(65) NOT NULL,
  `LastName` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `FirstName`, `LastName`) VALUES
(23, 'troynguyen@gmail.com', '2121', 'Troy', 'Nguyen'),
(25, 'aa@aa.com', 'aa', 'aa', 'aa'),
(26, 'cc@cc.com', 'cc', 'cc', 'cc'),
(27, 'bb@bb.com', 'bb', 'bb', 'bb'),
(28, 'dd@dd.com', 'dd', 'dd', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `UserID` bigint(20) NOT NULL,
  `ProfileID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`UserID`, `ProfileID`) VALUES
(25, 12),
(26, 13),
(27, 14),
(28, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FriendsID` (`FriendsID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ProfileID`);

--
-- Indexes for table `profilecomment`
--
ALTER TABLE `profilecomment`
  ADD KEY `ProfileID` (`ProfileID`),
  ADD KEY `CommentID` (`CommentID`);

--
-- Indexes for table `senderrecievercomment`
--
ALTER TABLE `senderrecievercomment`
  ADD KEY `CommentID` (`CommentID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `RecieverID` (`RecieverID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProfileID` (`ProfileID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ProfileID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
