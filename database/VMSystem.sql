-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 02:30 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VMSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `picturePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `password`, `picturePath`) VALUES
(0, 'admin', 'admin1@admin.com', 'Male', 'admin', 'default-admin-icon.png');

-- --------------------------------------------------------


--
-- Table structure for table `employee`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `EoC` varchar(255) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `picturePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

-- INSERT INTO `employee` (`id`, `name`, `email`, `gender`, `dob`, `password`, `salary`, `dp`) VALUES
-- (13, 'emp1', 'emp1@emp.com', 'Male', '1998-06-25', '1234', 121123, '60df10fa13c124.43381995marco-mons-ROWNIiEV9iM-unsplash.jpg');

CREATE TABLE `leave` (
    `id` int(11) NOT NULL,
    `reason` varchar(255) NOT NULL,
    `start_date` date NOT NULL,
    `last_date` date NOT NULL,
    `email` varchar(255) NOT NULL,
    `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave`
--

-- INSERT INTO `emp_leave` (`id`, `reason`, `start_date`, `last_date`, `email`, `status`) VALUES
-- (9, 'I got sick', '2021-07-28', '2021-07-30', 'test@gmail.com', 'Canceled'),
-- (15, ' drnrdng', '2021-07-09', '2021-07-11', 'emp1@emp.com', 'Accepted'),
-- (16, ' drnrdng', '2021-07-14', '2021-07-25', 'emp1@emp.com', 'Canceled'),
-- (17, ' drnrdng', '2021-07-16', '2021-07-25', 'emp1@emp.com', 'pending'),
-- (20, ' dcw', '2021-07-10', '2021-07-11', 'emp3@emp.com', 'Accepted'),
-- (21, ' efwe', '2021-07-23', '2021-07-25', 'emp3@emp.com', 'Canceled'),
-- (22, ' ewfew', '2021-07-24', '2021-07-18', 'emp3@emp.com', 'Accepted'),
-- (23, ' drnrdng', '2021-07-01', '2021-07-02', 'emp3@emp.com', 'Canceled'),
-- (24, ' i got sick', '2021-07-03', '2021-07-06', 'test@gmail.com', 'Accepted'),
-- (25, ' i got sick', '2021-07-04', '2021-07-07', 'test@gmail.com', 'Canceled'),
-- (26, ' drnrdng', '2021-07-04', '2021-07-07', 'test@gmail.com', 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





