-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 10:24 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `appl`
--

CREATE TABLE `appl` (
  `sr` int(11) NOT NULL,
  `rollno` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `otherr` text NOT NULL,
  `days` varchar(50) NOT NULL,
  `cc` varchar(11) NOT NULL,
  `ccc` varchar(50) NOT NULL,
  `mentor` varchar(11) NOT NULL,
  `mentorco` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `hod` varchar(50) NOT NULL,
  `dep` varchar(20) NOT NULL,
  `ccst` int(11) NOT NULL,
  `cccst` int(11) NOT NULL,
  `mentorst` int(11) NOT NULL,
  `mentorcost` int(11) NOT NULL,
  `hodst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appl`
--

INSERT INTO `appl` (`sr`, `rollno`, `reason`, `otherr`, `days`, `cc`, `ccc`, `mentor`, `mentorco`, `status`, `comment`, `hod`, `dep`, `ccst`, `cccst`, `mentorst`, `mentorcost`, `hodst`) VALUES
(1, 'r', 'medical', '', '4', 'cc1', '', 'mentor1', 'mc1', '', '', 'hod1', 'comp', 1, 0, 0, 0, 0),
(2, 'r', 'medical', '', '1', 'cc1', '', 'mentor1', '', '1', '', '', 'comp', 0, 0, 0, 0, 0),
(3, 'r', 'medical', '', '1', 'cc1', '', 'mentor1', '', '2', '', '', 'comp', 2, 0, 0, 0, 0),
(4, 'r', 'medical', '', '1', 'cc1', '', 'mentor1', '', '', '', '', 'comp', 0, 0, 0, 0, 0),
(5, 'b', 'committee', '', '1', 'cc2', '', 'm1', 'mc1', '', '', 'hod2', 'it', 0, 0, 0, 0, 0),
(6, 'b', 'medical', '', '4', 'cc2', '', 'm1', 'mc1', '', '', '', 'it', 0, 0, 0, 0, 0),
(7, 'b', 'emergency', '', '2', 'cc2', '', 'm1', '', '', '', '', 'it', 0, 0, 0, 0, 0),
(8, 'c', 'emergency', '', '3', 'cc2', '', 'm2', 'mc1', '', '', '', 'comp', 0, 0, 0, 0, 0),
(9, 'a', 'medical', '', '6', 'cc1', 'ccc1', 'mentor1', 'mc1', '', '', 'hod1', 'comp', 0, 0, 1, 0, 0),
(10, 'r', 'emergency', '', '4', 'cc1', '', 'mentor1', '', '', '', '', 'comp', 0, 0, 0, 0, 0),
(11, 'r', 'other', '', '6', 'cc1', '', 'mentor1', '', '', '', '', 'comp', 0, 0, 0, 0, 0),
(12, 'r', 'committee', '', '3', 'cc1', '', 'mentor1', '', '', '', '', 'comp', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `sr` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`sr`, `name`, `position`, `dep`, `userid`, `password`, `mob`, `email`) VALUES
(1, 'ABC', 'mentor', 'comp', 'mentor1', '123', '9', '9'),
(2, 'XYZ', 'cc', 'comp', 'cc1', '123', '9', '9'),
(3, 'CVB', 'mentorco', 'comp', 'mc1', '123', '89', 'dfsf'),
(4, 'b', 'mentor', 'comp', 'm1', '123', '9', '8'),
(5, 'v', 'mentor', 'comp', 'm2', '123', '9', '8'),
(6, 'h', 'cc', 'comp', 'cc2', '123', '98', '98'),
(7, 'hjg', 'cc', 'it', '3', '123', '78', '87'),
(8, 'HOD', 'hod', 'comp', 'hod1', '123', '', ''),
(9, 'HOD', 'hod', 'it', 'hod2', '123', '', ''),
(10, 'ccc', 'ccc', 'comp', 'ccc1', '123', '', ''),
(11, 'ccc', 'ccc', 'it', 'ccc2', '123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sr` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mentor` varchar(50) NOT NULL,
  `cc` varchar(50) NOT NULL,
  `ccc` varchar(50) NOT NULL,
  `mentorco` varchar(50) NOT NULL,
  `hod` varchar(50) NOT NULL,
  `dep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sr`, `name`, `userid`, `password`, `mentor`, `cc`, `ccc`, `mentorco`, `hod`, `dep`) VALUES
(1, 'a', 'a', '123', 'mentor1', 'cc1', '', '', '', 'comp'),
(2, 'b', 'b', '123', 'm1', 'cc2', '', '', '', 'it'),
(3, 'c', 'c', '123', 'm2', 'cc2', '', '', '', 'comp'),
(4, 'rers', 'r', '123', 'mentor1', 'cc1', '', '', '', 'comp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appl`
--
ALTER TABLE `appl`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`sr`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appl`
--
ALTER TABLE `appl`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `sr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
