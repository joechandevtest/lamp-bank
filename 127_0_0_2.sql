-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 07:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saving`
--
CREATE DATABASE IF NOT EXISTS `saving` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `saving`;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `password` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `email`, `creationDate`) VALUES
(1, 'mingwu1', 123456, 'mw@example', '2022-12-02'),
(2, 'joe', 123456, 'joe@ac.com', '2022-12-02'),
(15, 'apple', 123456, 'apple@exam', '2022-12-02'),
(16, 'tester', 234567, 'tester@ca.', '2022-12-02'),
(17, 'ban', 123456, 'ban@ac.com', '2022-12-02'),
(18, 'mary', 98765, 'ma@example', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `TransID` varchar(200) NOT NULL,
  `TransDate` date NOT NULL,
  `Username` tinytext NOT NULL,
  `ReceivedFrom` varchar(50) NOT NULL,
  `SentTo` varchar(50) NOT NULL,
  `Debit` int(10) NOT NULL,
  `Credit` int(10) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`TransID`, `TransDate`, `Username`, `ReceivedFrom`, `SentTo`, `Debit`, `Credit`, `Balance`) VALUES
('2022-12-02-1669955612', '2022-12-02', 'mingwu1', 'Account Creation', ' ', 0, 0, 0),
('2022-12-02-1669955643', '2022-12-02', 'joe', 'Account Creation', ' ', 0, 0, 0),
('2022-12-02-1669955723', '2022-12-02', 'apple', 'Account Creation', ' ', 0, 0, 0),
('2022-12-02-1669955860', '2022-12-02', 'apple', 'Cash In', '', 0, 50, 50),
('2022-12-02-1669955867', '2022-12-02', 'apple', '', 'Cash Out', 20, 0, 30),
('2022-12-02-1669955901', '2022-12-02', 'mingwu1', '', 'Cash Out', 100, 0, -100),
('2022-12-02-1669955906', '2022-12-02', 'mingwu1', 'Cash In', '', 0, 200, 100),
('2022-12-02-1669956165', '2022-12-02', 'tester', 'Account Creation', ' ', 0, 0, 0),
('2022-12-02-1669956219', '2022-12-02', 'tester', 'Cash In', '', 0, 20, 20),
('2022-12-02-1669956224', '2022-12-02', 'tester', '', 'Cash Out', 50, 0, -30),
('2022-12-02-1669960131', '2022-12-02', 'ban', 'Account Creation', ' ', 0, 0, 0),
('2022-12-03-1670091205', '2022-12-03', 'mary', 'Account Creation', ' ', 0, 0, 0),
('2022-12-03-1670091546', '2022-12-03', 'mary', 'Cash In', '', 0, 1000, 1000),
('2022-12-03-1670091820', '2022-12-03', 'mingwu1', 'Cash In', '', 0, 300, 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
