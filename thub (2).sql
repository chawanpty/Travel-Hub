-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2024 at 09:53 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thub`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `price_configuration_id` int(10) UNSIGNED NOT NULL,
  `flight_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(4) UNSIGNED NOT NULL,
  `number_of_customers` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(10) UNSIGNED NOT NULL,
  `flight_name` varchar(100) NOT NULL,
  `departure_date` datetime NOT NULL,
  `arrival_date` datetime NOT NULL,
  `location` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `flight_name`, `departure_date`, `arrival_date`, `location`) VALUES
(1, 'Korea', '2024-03-15 11:00:00', '2024-03-15 21:30:00', 'กรุงโซล (Seoul) Korea'),
(2, 'JAPAN', '2024-03-24 05:00:00', '2024-03-24 11:00:00', 'โตเกียว TOKYO '),
(3, 'India', '2024-03-20 17:00:00', '2024-03-20 21:30:00', 'เดลี อินเดีย'),
(4, 'France', '2024-03-16 02:00:00', '2024-03-17 23:00:00', 'ปารีส Paris'),
(5, 'USA', '2024-03-29 20:00:00', '2024-03-30 18:00:00', 'นครนิวยอร์ก New York');

-- --------------------------------------------------------

--
-- Table structure for table `price_configuration`
--

CREATE TABLE `price_configuration` (
  `configuration_id` int(10) UNSIGNED NOT NULL,
  `price_per_customer` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_configuration`
--

INSERT INTO `price_configuration` (`configuration_id`, `price_per_customer`) VALUES
(1, '500.00'),
(2, '900.00'),
(3, '1350.00'),
(4, '1850.00'),
(5, '2350.00'),
(6, '2850.00'),
(7, '3350.00'),
(8, '3850.00'),
(9, '4350.00'),
(10, '4850.00'),
(11, '5350.00'),
(12, '5850.00'),
(13, '6350.00'),
(14, '6850.00'),
(15, '7350.00'),
(16, '7850.00'),
(17, '8350.00'),
(18, '8850.00'),
(19, '9350.00'),
(20, '9850.00'),
(21, '10350.00'),
(22, '10850.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(4) UNSIGNED NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_username`, `user_firstname`, `user_lastname`, `user_email`, `user_phone`, `user_password`, `role`) VALUES
(1, 'Admin', 'chawanlak', 'jitman', 'chawanluck8659@gmail.com', '0642015546', '$2y$10$QCT/pEpvJfRLLKuR.l9xVOyXYIf.JqnNILrvyaQL8ZwOIWukCbdgq', 'admin'),
(14, 'Kankeemakkk', 'Heeok', 'boook', 'Heedum@gmail.com', '0854268452', '$2y$10$HDozemMVB2GGV/PI.HmraeTKhHHMjhWDe5ChIV69KmMMnnmZcF8RC', 'user'),
(15, 'Kankeemakkk', 'Heeok', 'boook', 'Heedum@gmail.com', '0854268452', '$2y$10$Lc7d05dc4IJoBGE.UL4j0OXxpEIjj4QypXMTGxkGDgBOjEsD9y94q', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_FKIndex1` (`users_id`),
  ADD KEY `booking_FKIndex2` (`flight_id`),
  ADD KEY `booking_FKIndex3` (`price_configuration_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `price_configuration`
--
ALTER TABLE `price_configuration`
  ADD PRIMARY KEY (`configuration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `price_configuration`
--
ALTER TABLE `price_configuration`
  MODIFY `configuration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`price_configuration_id`) REFERENCES `price_configuration` (`configuration_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
