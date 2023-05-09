-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 11:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailoring_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `staff_id` int(10) NOT NULL,
  `style` varchar(1000) DEFAULT NULL,
  `dateCollected` varchar(100) DEFAULT NULL,
  `dateFinished` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(10) NOT NULL,
  `tailor_id` int(10) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(100) DEFAULT NULL,
  `dateOfBirth` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `maritalStatus` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `tailor_id`, `role`, `surName`, `firstName`, `emailAddress`, `dateOfBirth`, `gender`, `maritalStatus`, `nationality`, `address`, `education`, `picture`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Admin', 'Gwaji', 'Gwaji', 'gwaji@gmail.com', '2023-12-30', 'Male', NULL, NULL, NULL, NULL, NULL, 'b9eb1a6e514c644f196d6fbf9077760b', 1, '2023-03-23 09:28:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tailors`
--

CREATE TABLE `tailors` (
  `tailor_id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `motto` varchar(100) DEFAULT NULL,
  `phoneNumber1` varchar(100) DEFAULT NULL,
  `phoneNumber2` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `logo` varchar(1000) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `staff_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tailors`
--

INSERT INTO `tailors` (`tailor_id`, `title`, `motto`, `phoneNumber1`, `phoneNumber2`, `address`, `logo`, `status`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 'Gwaji Tailoring Service', NULL, '09000000000', '08000000000', '12 City Center Kano State, Nigeria', NULL, 1, 0, '2023-03-23 09:22:42', NULL),
(2, 'Gwaji Tailoring Service', NULL, '09000000000', '08000000000', '12 City Center Kano State, Nigeria', NULL, 1, 0, '2023-03-23 09:26:49', NULL),
(3, 'Gwaji Tailoring Service', NULL, '09000000000', '08000000000', '12 City Center Kano State, Nigeria', NULL, 1, 0, '2023-03-23 09:28:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tailors`
--
ALTER TABLE `tailors`
  ADD PRIMARY KEY (`tailor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tailors`
--
ALTER TABLE `tailors`
  MODIFY `tailor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
