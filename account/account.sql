-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors_pay`
--

CREATE TABLE `doctors_pay` (
  `dr_payment_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_pay`
--

INSERT INTO `doctors_pay` (`dr_payment_id`, `doctor_name`, `phone_number`, `amount`) VALUES
(1, '', '', 0.00),
(2, 'a', 'a', 0.00),
(3, 'a', 'a', 0.00),
(4, 'a', 'a', 0.00),
(5, 'd', 'd', 0.00),
(6, '', '', 0.00),
(7, '', '', 0.00),
(8, 'asdf', 'asdf', 3.00),
(9, '', '', 0.00),
(10, '', '', 0.00),
(11, '', '', 0.00),
(12, 'a', '12', 2.00),
(13, 'a', '12', 2.00),
(14, 'a222', 'a', 222.00),
(15, 'asdf', '23123', 4555.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment_received`
--

CREATE TABLE `payment_received` (
  `payment_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_received`
--

INSERT INTO `payment_received` (`payment_id`, `patient_name`, `phone_no`, `address`, `amount`, `date`) VALUES
(1, 'Saiba Khatun', '0934', '0', 23332.00, '2024-05-30'),
(3, 'jahanara Imam', '0934', 'kuril', 345.00, '2024-05-24'),
(4, 'nafias', '8776', 'asdfki', 8787.00, '2024-05-23'),
(5, '', '', '', 0.00, '0000-00-00'),
(6, 'jhon', '12345', 'adad', 2500.00, '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refund_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`refund_id`, `patient_name`, `phone_no`, `address`, `amount`, `date`) VALUES
(1, 'jahanara Imam', '0934', 'kuril', 4.00, '2024-05-15'),
(2, 'nafias', '1979210166', 'asdfki', 454.00, '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `staffsalary`
--

CREATE TABLE `staffsalary` (
  `id` int(11) NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `post` varchar(50) NOT NULL,
  `paymentDate` date NOT NULL,
  `bankAcc` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffsalary`
--

INSERT INTO `staffsalary` (`id`, `staffName`, `phoneNumber`, `address`, `amount`, `post`, `paymentDate`, `bankAcc`, `created_at`) VALUES
(1, 'ss', '1979210166', 'asdfa', 45.00, 'Pharmacist', '2024-05-09', '55as', '2024-05-14 05:40:42'),
(2, 'sg', '4545', 'fgfgdf', 45.00, 'Nurse', '2024-05-13', 'erltklj', '2024-05-14 05:48:20'),
(3, 'mmn', '2155', 'asdfki', 4522.00, 'Nurse', '2024-05-17', 'sdgbvfgb', '2024-05-14 06:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `user_name` varchar(14) NOT NULL,
  `lastname` varchar(14) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `gender` enum('m','f','o') DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `lastname`, `phone`, `address`, `gender`, `email`, `password`) VALUES
(1, 'kaniz', 'suberna', 1712545192, '35/4,shyamoli', 'f', 'kaniz@gmail.com', '123456'),
(3, 'moumet', 'siddiq', 1941286044, '35/9, road#4, shyamoli', '', 'moumetsiddiq62@gmail.com', '654321'),
(4, 'binty', 'suberna', 1858092277, 'narayanganj', '', 'kaniz2000@gmail.com', '8520'),
(5, 'a', 'a', 342, 'asdfsdf', 'm', 'n@gmail.com', 'a'),
(6, 'jessica', 'asdf', 3433, 'asdfa ', '', 'asdf@g.com', 'Rasf34!///&gt;asf-='),
(7, 'asdfasdf', 'afd', 6664, 'asdf', '', 'sakibjim08@gmail.com', 'sdfdsf888YYjj77jjhHhH55669+*/'),
(8, 'df', 'df', 0, 'df', '', 'sakibjim08@gmail.com', 'Jh7874()8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors_pay`
--
ALTER TABLE `doctors_pay`
  ADD PRIMARY KEY (`dr_payment_id`);

--
-- Indexes for table `payment_received`
--
ALTER TABLE `payment_received`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `staffsalary`
--
ALTER TABLE `staffsalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors_pay`
--
ALTER TABLE `doctors_pay`
  MODIFY `dr_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_received`
--
ALTER TABLE `payment_received`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffsalary`
--
ALTER TABLE `staffsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
