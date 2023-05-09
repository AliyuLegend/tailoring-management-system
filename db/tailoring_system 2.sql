-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 07:33 PM
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
  `dataClark_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `dataClark_id`, `name`, `gender`, `phoneNumber`, `address`, `created_at`, `updated_at`) VALUES
(1, 4, 'Shahuci Global Resources', 'Male', '09020128817', '12 City Center Kano State, Nigeria', '2023-05-08 15:42:15', '2023-05-08 15:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `data_clark`
--

CREATE TABLE `data_clark` (
  `dataClark_id` int(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `surName` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `dateOfBirth` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `maritalStatus` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `businessTitle` varchar(100) DEFAULT NULL,
  `businessMotto` varchar(100) DEFAULT NULL,
  `businessPhone1` varchar(100) DEFAULT NULL,
  `businessPhone2` varchar(100) DEFAULT NULL,
  `businessAddress` varchar(100) DEFAULT NULL,
  `businessLogo` varchar(1000) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_clark`
--

INSERT INTO `data_clark` (`dataClark_id`, `firstName`, `surName`, `emailAddress`, `dateOfBirth`, `gender`, `maritalStatus`, `nationality`, `education`, `address`, `picture`, `businessTitle`, `businessMotto`, `businessPhone1`, `businessPhone2`, `businessAddress`, `businessLogo`, `password`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Abdullahi', 'Aminu', 'gwaji@gmail.com', '2023-12-31', 'Male', '', '', '', '', '', 'Gwaji Tailoring and Bespoke Services', NULL, '09000000000', '08000000000', '12 City Center Kano State, Nigeria', NULL, 'b9eb1a6e514c644f196d6fbf9077760b', 1, '2023-04-30 07:33:19', NULL),
(5, 'Abdullahi', 'Aminu', 'gwaji1@gmail.com', '2023-12-31', 'Male', '', '', '', '', '', 'Gwaji Fashion', NULL, '09000000000', '08000000000', '12 City Center Kano State, Nigeria', NULL, 'f35304d918d1df86beb3cf9d4f21f768', 1, '2023-04-30 07:34:52', NULL);

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
  `dataClark_id` int(10) NOT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `staffID` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `dateOfBirth` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `dataClark_id`, `surName`, `firstName`, `staffID`, `type`, `dateOfBirth`, `gender`, `nationality`, `address`, `education`, `picture`, `created_at`, `updated_at`) VALUES
(1, 3, 'Gwaji', 'Gwaji', 'gwaji@gmail.com', '1', '2023-12-30', 'Male', NULL, NULL, NULL, NULL, '2023-03-23 09:28:17', NULL),
(3, 4, 'Aminu', 'Abdullahi', 'ASD345', 'Junior Staff', '2023-12-31', 'Male', 'Najeria', '12 City Center Kano State, Nigeria', 'None', 'vendor/uploads/staffs/staff-8845878411683554246.png', '2023-05-08 13:57:26', NULL),
(4, 4, 'Gwaji', 'Gwaji', '2023-81811AB', 'Junior Staff', '2023-12-23', 'Male', 'Najeria', '12 City Center Kano State, Nigeria', 'SSCE', 'vendor/uploads/staffs/staff-4533851661683554732.png', '2023-05-08 14:05:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `data_clark`
--
ALTER TABLE `data_clark`
  ADD PRIMARY KEY (`dataClark_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_clark`
--
ALTER TABLE `data_clark`
  MODIFY `dataClark_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
