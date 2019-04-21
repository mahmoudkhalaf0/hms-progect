-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 08:22 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `fname` varchar(80) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `doctor` varchar(80) NOT NULL,
  `payment` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`fname`, `lname`, `email`, `contact`, `doctor`, `payment`) VALUES
('ali', 'mahmoud', 'mahmoudkhalaf00@gmail.com', '888', 'Dr. Ahmed', 'paid'),
('zaki', 'ahmed', 'ahmed@gmail.com', '111', 'Dr. Mostafa', 'Pay later'),
('hassen', 'mahmoud', 'hassen@gmail.com', '222', 'Dr. Ibrahim', 'Pay later'),
('khaled', 'mohamed', 'khaled@gmail.com', '333', 'Dr. Ibrahim', 'Pay later'),
('hossem', 'ali', 'hossem@gmail.com', '444', 'Dr. Mohamady', 'Pay later'),
('taha', 'hassen', 'taha@gmail.com', '555', 'Dr. Mohamady', 'Pay later'),
('fatma', 'ali', 'fatama@gmail.com', '100', 'Dr. Mostafa', 'Pay later');

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `name` varchar(50) NOT NULL,
  `id` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`name`, `id`) VALUES
('Dr. Ali', 8),
('Dr. Mohamed', 7),
('Dr. Ibrahim', 6),
('Dr. Ahmed', 5),
('Dr. Mostafa', 9),
('Dr. Mohamady', 10),
('Dr. Alaa', 11);

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`username`, `password`) VALUES
('mahmoud', 'mahmoud22'),
('mostafa', 'mostafa33'),
('ahmed', 'ahmed44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`fname`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `doctb`
--
ALTER TABLE `doctb`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctb`
--
ALTER TABLE `doctb`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
