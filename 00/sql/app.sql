-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 02:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_in_list`
--

CREATE TABLE `cash_in_list` (
  `no` int(11) NOT NULL,
  `discription` varchar(200) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_in_list`
--

INSERT INTO `cash_in_list` (`no`, `discription`, `amount`, `time`) VALUES
(16, 'Nobab', 100000, '2021-07-08 11:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

CREATE TABLE `customer_list` (
  `mobile` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`mobile`, `name`, `address`, `time`) VALUES
(1738979446, 'Md Rafiqul Islam', 'shibpur', '2021-07-08 11:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `trans_list`
--

CREATE TABLE `trans_list` (
  `no` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `mobile` int(11) NOT NULL,
  `s_description` varchar(200) DEFAULT NULL,
  `price` float NOT NULL,
  `wight` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_list`
--

INSERT INTO `trans_list` (`no`, `date`, `mobile`, `s_description`, `price`, `wight`, `amount`) VALUES
(4, '2021-07-08 11:47:39', 1738979446, 'jira', 33.3333, 400, 13333),
(5, '2021-07-08 12:02:50', 1321, 'asd', 0.16, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_in_list`
--
ALTER TABLE `cash_in_list`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `trans_list`
--
ALTER TABLE `trans_list`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_in_list`
--
ALTER TABLE `cash_in_list`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `mobile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1738979447;

--
-- AUTO_INCREMENT for table `trans_list`
--
ALTER TABLE `trans_list`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
