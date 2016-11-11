-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 05:11 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicantbasic`
--

CREATE TABLE `applicantbasic` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `UniqueId` varchar(10) NOT NULL,
  `Date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicantbasic`
--

INSERT INTO `applicantbasic` (`Id`, `Name`, `Mobile`, `email`, `Password`, `UniqueId`, `Date`) VALUES
(1, 'Nishit Sakariya', 9833001580, 'ns11251@gmail.com', '11e3e073d82b5236e1bdbcfcfdafa9ff5c5cb08a', 'nsne1bdb83', '08/11/16'),
(2, 'Tanisha Sakaria', 2223736331, 'tanisha@gmail.com', '11e3e073d82b5236e1bdbcfcfdafa9ff5c5cb08a', 'tste1bdb22', '09/11/16');

-- --------------------------------------------------------

--
-- Table structure for table `applicantmoreinfo`
--

CREATE TABLE `applicantmoreinfo` (
  `Id` int(11) NOT NULL,
  `uniqueid` varchar(10) NOT NULL,
  `PanNo` bigint(20) NOT NULL,
  `AadharId` bigint(20) NOT NULL,
  `reserveId` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `Income` bigint(20) NOT NULL,
  `Familymembers` int(11) NOT NULL,
  `benefittype` text,
  `beneselect` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicantmoreinfo`
--

INSERT INTO `applicantmoreinfo` (`Id`, `uniqueid`, `PanNo`, `AadharId`, `reserveId`, `Address`, `Income`, `Familymembers`, `benefittype`, `beneselect`) VALUES
(0, 'nsne1bdb83', 65667686, 111111111111, 'ugygvyv', 'jhv jgg 67t y tf j', 56789087654, 9, 'A', 'Educational'),
(2, 'tste1bdb22', 9876543234567, 111111111111, 'jhgu7ttggv', 'hvtuy uf7 uy  uyf', 987688, 9, 'C', 'Taxation benefits');

-- --------------------------------------------------------

--
-- Table structure for table `benefitset`
--

CREATE TABLE `benefitset` (
  `id` int(11) NOT NULL,
  `instituteId` varchar(10) NOT NULL,
  `uniqueId` varchar(10) NOT NULL,
  `benefittype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefitset`
--

INSERT INTO `benefitset` (`id`, `instituteId`, `uniqueId`, `benefittype`) VALUES
(1, 'SBI12345', 'nsne1bdb83', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(10) NOT NULL,
  `merit` mediumint(9) NOT NULL,
  `reservemerit` mediumint(9) NOT NULL,
  `aggregate` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `Pincode` mediumint(9) NOT NULL,
  `InstituteId` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`Name`, `Address`, `Pincode`, `InstituteId`, `Password`, `Id`, `type`) VALUES
('Dwarkadas J. Sanghvi College of Engineering', 'Vileparle, Mumbai', 400010, 'DJSCE053', 'dj123', 1, 1),
('State Bank of India', 'Borivali, Mumbai', 400010, 'SBI12345', 'sbi123', 2, 2),
('Taxation Dept of Mumbai', 'Mumbai', 400010, 'TAX54321', 'tax123', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `refname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `uniqueid`, `amount`, `refname`) VALUES
(1, 'nsne1bdb83', 8768785, 'niuc');

-- --------------------------------------------------------

--
-- Table structure for table `onlybenefits`
--

CREATE TABLE `onlybenefits` (
  `id` int(11) NOT NULL,
  `Benefits` varchar(40) NOT NULL,
  `Class` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `uniqueid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicantbasic`
--
ALTER TABLE `applicantbasic`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `applicantmoreinfo`
--
ALTER TABLE `applicantmoreinfo`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `benefitset`
--
ALTER TABLE `benefitset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlybenefits`
--
ALTER TABLE `onlybenefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicantbasic`
--
ALTER TABLE `applicantbasic`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `applicantmoreinfo`
--
ALTER TABLE `applicantmoreinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `benefitset`
--
ALTER TABLE `benefitset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `onlybenefits`
--
ALTER TABLE `onlybenefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
