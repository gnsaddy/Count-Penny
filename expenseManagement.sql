-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2019 at 01:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expenseManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `adminId` varchar(20) NOT NULL,
  `fname` varchar(15) DEFAULT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`adminId`, `fname`, `lname`, `email`, `age`, `contact`, `address`) VALUES
('admin01', 'Aditya', 'Raj', 'aditya.x510@gmail.com', 21, 8271388851, 'Mailsandra Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `Expense`
--

CREATE TABLE `Expense` (
  `expenseId` varchar(20) NOT NULL,
  `expenseDate` date DEFAULT NULL,
  `miscelleneous` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Expense`
--

INSERT INTO `Expense` (`expenseId`, `expenseDate`, `miscelleneous`) VALUES
('exp01', '2019-02-11', 1500),
('exp02', '2019-01-15', NULL),
('exp03', '2019-02-20', 1000),
('exp04', '2019-03-01', 500),
('exp05', '2019-04-10', 600),
('exp06', '2019-04-02', NULL),
('exp07', '2019-03-15', 1800),
('exp08', '2019-03-20', 2200),
('exp09', '2019-02-25', 1500),
('exp10', '2019-02-27', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `FixedExpense`
--

CREATE TABLE `FixedExpense` (
  `expenseId` varchar(20) NOT NULL,
  `fixedType` varchar(30) NOT NULL,
  `fxAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FixedExpense`
--

INSERT INTO `FixedExpense` (`expenseId`, `fixedType`, `fxAmount`) VALUES
('exp01', 'bills', 1500),
('exp01', 'rent', 5000),
('exp02', 'bills', 4000),
('exp02', 'rent', 5000),
('exp03', 'bills', 2000),
('exp03', 'rent', 5500),
('exp04', 'rent', 7500),
('exp04', 'subscription', 250),
('exp04', 'transport', 400),
('exp05', 'bills', 2000),
('exp05', 'rent', 7000),
('exp06', 'rent', 5500),
('exp06', 'transport', 6000),
('exp07', 'bills', 1500),
('exp08', 'subscription', 1000),
('exp09', 'bills', 2000),
('exp09', 'rent', 5000),
('exp09', 'transport', 4000),
('exp10', 'rent', 7000),
('exp10', 'transport', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `FlexibleExpense`
--

CREATE TABLE `FlexibleExpense` (
  `expenseId` varchar(20) NOT NULL,
  `flexibleType` varchar(30) NOT NULL,
  `flAmount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FlexibleExpense`
--

INSERT INTO `FlexibleExpense` (`expenseId`, `flexibleType`, `flAmount`) VALUES
('exp01', 'food', 500),
('exp01', 'travel', 2000),
('exp02', 'food', 600),
('exp02', 'medical', 1000),
('exp02', 'travel', 5000),
('exp03', 'food', 1500),
('exp03', 'travel', 2000),
('exp04', 'food', 2000),
('exp04', 'medical', 500),
('exp05', 'clothing', 4500),
('exp05', 'food', 1500),
('exp06', 'travel', 1000),
('exp07', 'food', 2000),
('exp08', 'clothing', 1500),
('exp09', 'medical', 500),
('exp10', 'food', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `HasExpense`
--

CREATE TABLE `HasExpense` (
  `userId` varchar(20) NOT NULL,
  `expenseId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HasExpense`
--

INSERT INTO `HasExpense` (`userId`, `expenseId`) VALUES
('user01', 'exp01'),
('user02', 'exp02'),
('user03', 'exp03'),
('user04', 'exp04'),
('user05', 'exp05'),
('user06', 'exp06'),
('user07', 'exp07'),
('user08', 'exp08'),
('user09', 'exp09'),
('user10', 'exp10');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userId` varchar(20) NOT NULL,
  `adminId` varchar(20) DEFAULT NULL,
  `fname` varchar(15) DEFAULT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `netIncome` int(11) DEFAULT NULL,
  `otherIncome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userId`, `adminId`, `fname`, `lname`, `email`, `age`, `contact`, `address`, `netIncome`, `otherIncome`) VALUES
('user01', 'admin01', 'Bhaskar', 'U', 'bhaskar123@gmail.com', 20, 123456789, 'Kolkata', 22400, 2000),
('user02', 'admin01', 'Akash', 'p', 'akash123@gmail.com', 20, 456321789, 'Banglore', 6500, 1000),
('user03', 'admin01', 'Ajith', 'gv', 'ajith123@gmail.com', 21, 789654123, 'Sirsi', 15000, 500),
('user04', 'admin01', 'Akhil', 'S', 'akhil123@gmail.com', 22, 852369147, 'Kengeri', 9500, 4500),
('user05', 'admin01', 'Arun', 'GA', 'arun123@gmail.com', 22, 456258741, 'Shimoga', 26500, 2500),
('user06', 'admin01', 'Shrikant', 'p', 'shrikant123@gmail.com', 23, 95123546, 'Bidar', 4500, 5500),
('user07', 'admin01', 'Amit', 'S', 'amit123@gmail.com', 23, 963987412, 'Delhi', 42000, 1550),
('user08', 'admin01', 'Alok', 't', 'alok123@gmail.com', 20, 753159852, 'Banglore', 7500, 1500),
('user09', 'admin01', 'Adarsh', 't', 'adarsh123@gmail.com', 21, 125896321, 'Noida', 45000, 1250),
('user10', 'admin01', 'Suman', 'Du', 'suman123@gmail.com', 21, 26598741, 'Noida', 35000, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `userId` varchar(20) NOT NULL,
  `uType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`userId`, `uType`) VALUES
('user01', 'salaried'),
('user02', 'unsalaried'),
('user03', 'salaried'),
('user04', 'unsalaried'),
('user05', 'salaried'),
('user06', 'unsalaried'),
('user07', 'salaried'),
('user08', 'unsalaried'),
('user09', 'salaried'),
('user10', 'salaried');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `Expense`
--
ALTER TABLE `Expense`
  ADD PRIMARY KEY (`expenseId`);

--
-- Indexes for table `FixedExpense`
--
ALTER TABLE `FixedExpense`
  ADD PRIMARY KEY (`expenseId`,`fixedType`);

--
-- Indexes for table `FlexibleExpense`
--
ALTER TABLE `FlexibleExpense`
  ADD PRIMARY KEY (`expenseId`,`flexibleType`);

--
-- Indexes for table `HasExpense`
--
ALTER TABLE `HasExpense`
  ADD PRIMARY KEY (`userId`,`expenseId`),
  ADD KEY `fk_has_2` (`expenseId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`userId`,`uType`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FixedExpense`
--
ALTER TABLE `FixedExpense`
  ADD CONSTRAINT `fk_fixed` FOREIGN KEY (`expenseId`) REFERENCES `Expense` (`expenseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `FlexibleExpense`
--
ALTER TABLE `FlexibleExpense`
  ADD CONSTRAINT `fk_flexible` FOREIGN KEY (`expenseId`) REFERENCES `Expense` (`expenseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `HasExpense`
--
ALTER TABLE `HasExpense`
  ADD CONSTRAINT `fk_has_1` FOREIGN KEY (`userId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_has_2` FOREIGN KEY (`expenseId`) REFERENCES `Expense` (`expenseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `Admin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UserType`
--
ALTER TABLE `UserType`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`userId`) REFERENCES `User` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
