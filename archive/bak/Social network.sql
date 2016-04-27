-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2016 at 07:17 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Social network`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` bigint(20) NOT NULL,
  `Comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `UserID` bigint(20) NOT NULL,
  `FriendsID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ProfileID` bigint(20) NOT NULL,
  `URL` varchar(65) NOT NULL,
  `FirstName` varchar(65) NOT NULL,
  `LastName` varchar(65) NOT NULL,
  `Age` tinyint(3) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Occupation` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ProfileID`, `URL`, `FirstName`, `LastName`, `Age`, `City`, `State`, `Occupation`) VALUES
(1, 'djdjdsadsd', 'Aiden', 'Aiden', 20, 'San jose', 'California', 'Student'),
(2, 'bobby', 'Bob ', 'Jackson', 20, 'San jose', 'California', 'Dentist'),
(3, 'troynguyen', 'Troy', 'Nguyen', 99, 'San jose', 'California', 'Student'),
(4, '', 'Student', 'CS', 11, 'San jose', 'California', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `profilecomment`
--

CREATE TABLE `profilecomment` (
  `ProfileID` bigint(20) NOT NULL,
  `CommentID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `senderrecievercomment`
--

CREATE TABLE `senderrecievercomment` (
  `CommentID` bigint(20) NOT NULL,
  `SenderID` bigint(20) NOT NULL,
  `RecieverID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` bigint(20) NOT NULL,
  `Email` varchar(65) NOT NULL,
  `Username` varchar(65) NOT NULL,
  `Password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Username`, `Password`) VALUES
(1, '', 'aidan', '123'),
(2, '', 'bob', '123'),
(3, 'tt@gmail.com', 'troynguyen', '123'),
(4, 'student@gmail.com', 'student', '333');

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
(1, 1),
(2, 2),
(3, 3),
(4, 4);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ProfileID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`FriendsID`) REFERENCES `user` (`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
