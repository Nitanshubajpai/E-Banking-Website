-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 04:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `reg_date`, `balance`) VALUES
(1, 'John Flame', 'john12@gripbank.com', '2021-02-21 14:16:50', 1470),
(2, 'Chris Fanning', 'chris12@gripbank.com', '2021-02-21 13:40:30', 7032),
(3, 'Saoirse Ronan', 'saoirse12@gripbank.com', '2021-02-21 13:40:50', 4001),
(4, 'Mike Denver', 'Mike12@gripbank.com', '2021-02-21 13:40:50', 510653),
(5, 'Nora Grohl', 'Nora12@gripbank.com', '2021-02-21 13:31:45', 4686),
(6, 'Jack Jones', 'Jack12@gripbank.com', '2021-02-21 06:15:26', 785000),
(7, 'Miles Halter', 'miles12@gripbank.com', '2021-02-21 06:15:26', 815000),
(8, 'Alaska Young', 'alaska12@gripbank.com', '2021-02-21 06:15:26', 685000),
(9, 'Hazel Grace', 'hazel12@gripbank.com', '2021-02-21 06:15:26', 333000),
(10, 'Roger Waters', 'roger12@gripbank.com', '2021-02-21 06:15:26', 145300),
(12, 'John Grisham', 'grisham12@grip.com', '2021-02-21 14:16:50', 49500);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(6) NOT NULL,
  `senderid` int(6) NOT NULL,
  `rcverid` int(6) NOT NULL,
  `amountransfered` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `senderid`, `rcverid`, `amountransfered`) VALUES
(1, 7, 4, 21651),
(2, 7, 4, 21651),
(3, 7, 4, 21651),
(4, 5, 2, 514),
(5, 5, 2, 514),
(6, 6, 5, 548),
(7, 1, 5, 1985),
(8, 1, 5, 1985),
(9, 1, 5, 1985),
(10, 2, 4, 21545),
(11, 1, 5, 652),
(12, 1, 6, 10000),
(13, 6, 1, 20000),
(14, 1, 2, 2000),
(15, 1, 2, 1),
(16, 1, 2, 3),
(17, 1, 2, 100),
(18, 1, 2, 200),
(19, 3, 1, 10000),
(20, 1, 5, 4685),
(21, 1, 5, 4685),
(22, 1, 5, 4685),
(23, 1, 5, 4685),
(24, 1, 2, 5251),
(25, 1, 4, 520652),
(26, 1, 2, 2000),
(27, 3, 1, 6000),
(28, 1, 2, 30),
(29, 1, 2, 5000),
(30, 1, 2, 1),
(31, 4, 3, 10000),
(32, 12, 1, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderid` (`senderid`),
  ADD KEY `rcverid` (`rcverid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `TK1` FOREIGN KEY (`senderid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TK2` FOREIGN KEY (`rcverid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
