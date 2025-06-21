-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 07:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concertdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artistid` int(10) UNSIGNED NOT NULL,
  `artistname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artistid`, `artistname`) VALUES
(10123, 'Lalisa Manoban'),
(10124, 'Roseanne Park'),
(10125, 'Jennie Kim'),
(10126, 'Jisoo');

-- --------------------------------------------------------

--
-- Table structure for table `artist_has_concert`
--

CREATE TABLE `artist_has_concert` (
  `artist_artistid` int(10) UNSIGNED NOT NULL,
  `concert_concertname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `artist_has_concert`
--

INSERT INTO `artist_has_concert` (`artist_artistid`, `concert_concertname`) VALUES
(10123, 'Blackpink'),
(10124, 'Blackpink'),
(10125, 'Blackpink'),
(10126, 'Blackpink');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `concertname` varchar(255) NOT NULL,
  `seat_name` varchar(255) NOT NULL,
  `booking_name` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_price` int(11) NOT NULL,
  `dateCreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `concertname`, `seat_name`, `booking_name`, `booking_date`, `booking_time`, `booking_price`, `dateCreate`) VALUES
(120, 'Blackpink', 'D15', 'Aki', '2023-10-21', '16:08:00', 5800, '2023-10-21 16:09:03'),
(121, 'Blackpink', 'D14', 'Aki', '2023-10-21', '16:09:00', 5800, '2023-10-21 16:09:11'),
(123, 'Blackpink', 'A04', 'mina', '2023-10-21', '16:09:00', 9600, '2023-10-21 16:09:30'),
(124, 'Blackpink', 'A05', 'mina', '2023-10-21', '16:09:00', 9600, '2023-10-21 16:09:35'),
(125, 'Blackpink', 'B01', 'momo', '2023-10-21', '16:09:00', 6800, '2023-10-21 16:09:44'),
(126, 'Blackpink', 'B02', 'momo', '2023-10-21', '16:09:00', 6800, '2023-10-21 16:09:56'),
(128, 'Blackpink', 'A10', 'Moomanow', '2023-10-21', '16:10:00', 9600, '2023-10-21 16:10:15'),
(130, 'Blackpink', 'B10', 'nayeon', '2023-10-21', '16:10:00', 6800, '2023-10-21 16:10:32'),
(132, 'Blackpink', 'B09', 'nayeon', '2023-10-21', '16:10:00', 6800, '2023-10-21 16:10:56'),
(134, 'Blackpink', 'B08', 'nayeon', '2023-10-21', '16:11:00', 6800, '2023-10-21 16:11:16'),
(135, 'Blackpink', 'B05', 'piie', '2023-10-21', '16:11:00', 6800, '2023-10-21 16:11:31'),
(136, 'Blackpink', 'C02', 'sana', '2023-10-21', '16:11:00', 6600, '2023-10-21 16:11:43'),
(137, 'Blackpink', 'C03', 'sana', '2023-10-21', '16:11:00', 6600, '2023-10-21 16:11:48'),
(146, 'Blackpink', 'A08', 'fern', '2023-10-22', '14:26:00', 9600, '2023-10-22 14:26:26'),
(147, 'Blackpink', 'B04', 'fern', '2023-10-22', '14:29:00', 6800, '2023-10-22 14:29:12'),
(150, 'Blackpink', 'G06', 'momo', '2023-10-25', '15:22:00', 3800, '2023-10-25 15:22:36'),
(151, 'Blackpink', 'F04', 'tzuyu', '2023-10-25', '15:22:00', 4800, '2023-10-25 15:22:42'),
(160, 'Blackpink', 'A12', 'Aki', '2023-10-25', '22:16:00', 9600, '2023-10-25 22:16:26'),
(164, 'Blackpink', 'D06', 'fern', '2023-10-25', '23:22:00', 5800, '2023-10-25 23:22:19'),
(165, 'Blackpink', 'D01', 'Mook', '2023-10-25', '23:25:00', 5800, '2023-10-25 23:25:20'),
(166, 'Blackpink', 'H01', 'Mook', '2023-10-25', '23:25:00', 2800, '2023-10-25 23:25:52'),
(167, 'Blackpink', 'E03', 'mina', '2023-10-25', '23:27:00', 5600, '2023-10-25 23:27:59'),
(168, 'Blackpink', 'B07', 'Mook', '2023-10-25', '23:54:40', 6800, '2023-10-25 23:55:00'),
(169, 'Blackpink', 'J15', 'Mook', '2023-10-25', '23:55:40', 1200, '2023-10-25 23:55:48'),
(170, 'Blackpink', 'D08', 'Aki', '2023-10-25', '23:57:54', 5800, '2023-10-25 23:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `concertname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`concertname`) VALUES
('Blackpink');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_name` varchar(50) NOT NULL,
  `seat_status` int(1) NOT NULL COMMENT '0 =ว่าง , 1 = จอง',
  `seat_price` varchar(10) NOT NULL,
  `seat_showdate` date NOT NULL,
  `seat_showtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_name`, `seat_status`, `seat_price`, `seat_showdate`, `seat_showtime`) VALUES
('A01', 1, '9600', '2024-01-07', '17:00:00'),
('A02', 1, '9600', '2024-01-07', '17:00:00'),
('A03', 0, '9600', '2024-01-07', '17:00:00'),
('A04', 1, '9600', '2024-01-07', '17:00:00'),
('A05', 1, '9600', '2024-01-07', '17:00:00'),
('A06', 0, '9600', '2024-01-07', '17:00:00'),
('A07', 0, '9600', '2024-01-07', '17:00:00'),
('A08', 1, '9600', '2024-01-07', '17:00:00'),
('A09', 0, '9600', '2024-01-07', '17:00:00'),
('A10', 1, '9600', '2024-01-07', '17:00:00'),
('A11', 0, '9600', '2024-01-07', '17:00:00'),
('A12', 1, '9600', '2024-01-07', '17:00:00'),
('A13', 0, '9600', '2024-01-07', '17:00:00'),
('A14', 0, '9600', '2024-01-07', '17:00:00'),
('A15', 0, '9600', '2024-01-07', '17:00:00'),
('B01', 1, '6800', '2024-01-07', '17:00:00'),
('B02', 1, '6800', '2024-01-07', '17:00:00'),
('B03', 0, '6800', '2024-01-07', '17:00:00'),
('B04', 1, '6800', '2024-01-07', '17:00:00'),
('B05', 1, '6800', '2024-01-07', '17:00:00'),
('B06', 0, '6800', '2024-01-07', '17:00:00'),
('B07', 1, '6800', '2024-01-07', '17:00:00'),
('B08', 1, '6800', '2024-01-07', '17:00:00'),
('B09', 1, '6800', '2024-01-07', '17:00:00'),
('B10', 1, '6800', '2024-01-07', '17:00:00'),
('B11', 0, '6800', '2024-01-07', '17:00:00'),
('B12', 0, '6800', '2024-01-07', '17:00:00'),
('B13', 0, '6800', '2024-01-07', '17:00:00'),
('B14', 0, '6800', '2024-01-07', '17:00:00'),
('B15', 0, '6800', '2024-01-07', '17:00:00'),
('C01', 0, '6600', '2024-01-07', '17:00:00'),
('C02', 1, '6600', '2024-01-07', '17:00:00'),
('C03', 1, '6600', '2024-01-07', '17:00:00'),
('C04', 0, '6600', '2024-01-07', '17:00:00'),
('C05', 0, '6600', '2024-01-07', '17:00:00'),
('C06', 0, '6600', '2024-01-07', '17:00:00'),
('C07', 0, '6600', '2024-01-07', '17:00:00'),
('C08', 0, '6600', '2024-01-07', '17:00:00'),
('C09', 0, '6600', '2024-01-07', '17:00:00'),
('C10', 0, '6600', '2024-01-07', '17:00:00'),
('C11', 0, '6600', '2024-01-07', '17:00:00'),
('C12', 0, '6600', '2024-01-07', '17:00:00'),
('C13', 0, '6600', '2024-01-07', '17:00:00'),
('C14', 0, '6600', '2024-01-07', '17:00:00'),
('C15', 0, '6600', '2024-01-07', '17:00:00'),
('D01', 1, '5800', '2024-01-07', '17:00:00'),
('D02', 0, '5800', '2024-01-07', '17:00:00'),
('D03', 0, '5800', '2024-01-07', '17:00:00'),
('D04', 0, '5800', '2024-01-07', '17:00:00'),
('D05', 0, '5800', '2024-01-07', '17:00:00'),
('D06', 1, '5800', '2024-01-07', '17:00:00'),
('D07', 0, '5800', '2024-01-07', '17:00:00'),
('D08', 1, '5800', '2024-01-07', '17:00:00'),
('D09', 0, '5800', '2024-01-07', '17:00:00'),
('D10', 0, '5800', '2024-01-07', '17:00:00'),
('D11', 0, '5800', '2024-01-07', '17:00:00'),
('D12', 0, '5800', '2024-01-07', '17:00:00'),
('D13', 0, '5800', '2024-01-07', '17:00:00'),
('D14', 1, '5800', '2024-01-07', '17:00:00'),
('D15', 1, '5800', '2024-01-07', '17:00:00'),
('E01', 0, '5600', '2024-01-07', '17:00:00'),
('E02', 0, '5600', '2024-01-07', '17:00:00'),
('E03', 1, '5600', '2024-01-07', '17:00:00'),
('E04', 0, '5600', '2024-01-07', '17:00:00'),
('E05', 0, '5600', '2024-01-07', '17:00:00'),
('E06', 0, '5600', '2024-01-07', '17:00:00'),
('E07', 0, '5600', '2024-01-07', '17:00:00'),
('E08', 0, '5600', '2024-01-07', '17:00:00'),
('E09', 0, '5600', '2024-01-07', '17:00:00'),
('E10', 0, '5600', '2024-01-07', '17:00:00'),
('E11', 0, '5600', '2024-01-07', '17:00:00'),
('E12', 0, '5600', '2024-01-07', '17:00:00'),
('E13', 0, '5600', '2024-01-07', '17:00:00'),
('E14', 0, '5600', '2024-01-07', '17:00:00'),
('E15', 0, '5600', '2024-01-07', '17:00:00'),
('F01', 0, '4800', '2024-01-07', '17:00:00'),
('F02', 0, '4800', '2024-01-07', '17:00:00'),
('F03', 0, '4800', '2024-01-07', '17:00:00'),
('F04', 1, '4800', '2024-01-07', '17:00:00'),
('F05', 0, '4800', '2024-01-07', '17:00:00'),
('F06', 0, '4800', '2024-01-07', '17:00:00'),
('F07', 0, '4800', '2024-01-07', '17:00:00'),
('F08', 0, '4800', '2024-01-07', '17:00:00'),
('F09', 0, '4800', '2024-01-07', '17:00:00'),
('F10', 0, '4800', '2024-01-07', '17:00:00'),
('F11', 0, '4800', '2024-01-07', '17:00:00'),
('F12', 0, '4800', '2024-01-07', '17:00:00'),
('F13', 0, '4800', '2024-01-07', '17:00:00'),
('F14', 0, '4800', '2024-01-07', '17:00:00'),
('F15', 0, '4800', '2024-01-07', '17:00:00'),
('G01', 0, '3800', '2024-01-07', '17:00:00'),
('G02', 0, '3800', '2024-01-07', '17:00:00'),
('G03', 0, '3800', '2024-01-07', '17:00:00'),
('G04', 0, '3800', '2024-01-07', '17:00:00'),
('G05', 0, '3800', '2024-01-07', '17:00:00'),
('G06', 1, '3800', '2024-01-07', '17:00:00'),
('G07', 0, '3800', '2024-01-07', '17:00:00'),
('G08', 0, '3800', '2024-01-07', '17:00:00'),
('G09', 0, '3800', '2024-01-07', '17:00:00'),
('G10', 0, '3800', '2024-01-07', '17:00:00'),
('G11', 0, '3800', '2024-01-07', '17:00:00'),
('G12', 0, '3800', '2024-01-07', '17:00:00'),
('G13', 0, '3800', '2024-01-07', '17:00:00'),
('G14', 0, '3800', '2024-01-07', '17:00:00'),
('G15', 0, '3800', '2024-01-07', '17:00:00'),
('H01', 1, '2800', '2024-01-07', '17:00:00'),
('H02', 0, '2800', '2024-01-07', '17:00:00'),
('H03', 0, '2800', '2024-01-07', '17:00:00'),
('H04', 0, '2800', '2024-01-07', '17:00:00'),
('H05', 0, '2800', '2024-01-07', '17:00:00'),
('H06', 0, '2800', '2024-01-07', '17:00:00'),
('H07', 0, '2800', '2024-01-07', '17:00:00'),
('H08', 0, '2800', '2024-01-07', '17:00:00'),
('H09', 0, '2800', '2024-01-07', '17:00:00'),
('H10', 0, '2800', '2024-01-07', '17:00:00'),
('H11', 0, '2800', '2024-01-07', '17:00:00'),
('H12', 0, '2800', '2024-01-07', '17:00:00'),
('H13', 0, '2800', '2024-01-07', '17:00:00'),
('H14', 0, '2800', '2024-01-07', '17:00:00'),
('H15', 0, '2800', '2024-01-07', '17:00:00'),
('I01', 0, '2000', '2024-01-07', '17:00:00'),
('I02', 0, '2000', '2024-01-07', '17:00:00'),
('I03', 0, '2000', '2024-01-07', '17:00:00'),
('I04', 0, '2000', '2024-01-07', '17:00:00'),
('I05', 0, '2000', '2024-01-07', '17:00:00'),
('I06', 0, '2000', '2024-01-07', '17:00:00'),
('I07', 0, '2000', '2024-01-07', '17:00:00'),
('I08', 0, '2000', '2024-01-07', '17:00:00'),
('I09', 0, '2000', '2024-01-07', '17:00:00'),
('I10', 0, '2000', '2024-01-07', '17:00:00'),
('I11', 0, '2000', '2024-01-07', '17:00:00'),
('I12', 0, '2000', '2024-01-07', '17:00:00'),
('I13', 0, '2000', '2024-01-07', '17:00:00'),
('I14', 0, '2000', '2024-01-07', '17:00:00'),
('I15', 0, '2000', '2024-01-07', '17:00:00'),
('J01', 0, '1200', '2024-01-07', '17:00:00'),
('J02', 0, '1200', '2024-01-07', '17:00:00'),
('J03', 0, '1200', '2024-01-07', '17:00:00'),
('J04', 0, '1200', '2024-01-07', '17:00:00'),
('J05', 1, '1200', '2024-01-07', '17:00:00'),
('J06', 0, '1200', '2024-01-07', '17:00:00'),
('J07', 1, '1200', '2024-01-07', '17:00:00'),
('J08', 0, '1200', '2024-01-07', '17:00:00'),
('J09', 0, '1200', '2024-01-07', '17:00:00'),
('J10', 0, '1200', '2024-01-07', '17:00:00'),
('J11', 0, '1200', '2024-01-07', '17:00:00'),
('J12', 0, '1200', '2024-01-07', '17:00:00'),
('J13', 0, '1200', '2024-01-07', '17:00:00'),
('J14', 0, '1200', '2024-01-07', '17:00:00'),
('J15', 1, '1200', '2024-01-07', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_username`, `user_firstname`, `user_lastname`, `user_email`, `user_phone`, `user_password`, `role`) VALUES
('Admin', 'chawanlak', 'jitman', 'chawanluck8659@gmail.com', '0642015546', '$2y$10$QCT/pEpvJfRLLKuR.l9xVOyXYIf.JqnNILrvyaQL8ZwOIWukCbdgq', 'admin'),
('Aki', 'Akijaa', 'Kuy', 'Aki.com', '0975164418', '$2y$10$mFL6wZgBqXfiys5TFUPBo.nP.XUeS5OW2fIX2t7YSNogFPaOnNXM.', 'customer'),
('fern', 'fernny', 'jah', 'fern@gmail.com', '0932373524', '$2y$10$w04BKdQS4OKfKdy2mjRvl.3c2vTl4JxpTLQdZrjdgWygvNXWQ1XQW', 'customer'),
('jihyo', 'jihyo', 'park', 'jihyoo@gmail.com', '0841235679', '$2y$10$Zm/j1KszQ5h5jq0YcTlo7Ogs10Wg.JJDv4hm4SE0N/3ZSMmLnpG9u', 'customer'),
('momo', 'hiraii', 'momojung', 'momo@gmail.com', '0854796321', '$2y$10$6M/2GtunnFG7LXx5.SGbAut.qNZHLkVb0KIxycaiD51V5vcLV1HNO', 'customer'),
('Mook', 'Hatairat', 'titnam', 'annayoy47@gmail.com', '0954561452', '$2y$10$oSpo4xNGuUnnfj1N...4QuWendZOKy7lmoLr17.V4B4USEgao4OoW', 'customer'),
('Moomanow', 'Mooooo', 'Manow', 'Moonow@gmail.com', '0909297218', '$2y$10$ozKTysVNgvAAS3/1dbSc9uqPtb.ICd.WUKEF/RKvMO0V4k3Khcu7i', 'customer'),
('nayeon', 'nayeon', 'im', 'nayeon@gmail.com', '0896544121', '$2y$10$F4EUqqtZQkGeYXYJr/KqVuj8wkX1VBKltxkfNQ/cCtoUAHnojrNRC', 'customer'),
('piie', 'piiey', 'jitman', 'piie@gmail.com', '0854796215', '$2y$10$Fx95Q/7j85tFhTTxHyy4xuEnCZsWxAoowgXvdW4Vm40gWPlPWio/K', 'customer'),
('sana', 'minatozaki', 'sanajung', 'sana@gmail.com', '0832145796', '$2y$10$0LNlES2dxz3L5uvhI7Bca.UcQ0uvQVM18dW46rd.WG/ClIe4iVw3.', 'customer'),
('Soba', 'sharon', 'myoi', 'sharon@gmail.com', '0875741827', '$2y$10$XvmRm8Y6K1Fs4l0THOPcvuKVZ3rGMzquOmCLWxMzK2KNXsBKhavZy', 'customer'),
('tzuyu', 'tzuyu', 'chou', 'tzutzu@gmail.com', '0853214569', '$2y$10$09NxWCN1ygkx3WKTwmNoXuXkQebxCOS8PuhaFfXPr5dwas/iMzJWS', 'customer'),
('UOOkkkkk', 'Ulipy', 'vloue', 'prat@gmail.com', '0932762100', '$2y$10$XCmHmnS8g.uZuvVi0xQqRush7PFcZzL6TecUXKUXPlBMh4J/VrUbC', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artistid`);

--
-- Indexes for table `artist_has_concert`
--
ALTER TABLE `artist_has_concert`
  ADD PRIMARY KEY (`artist_artistid`,`concert_concertname`),
  ADD KEY `artist_has_concert_FKIndex1` (`artist_artistid`),
  ADD KEY `artist_has_concert_FKIndex2` (`concert_concertname`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`concertname`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artistid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10127;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artist_has_concert`
--
ALTER TABLE `artist_has_concert`
  ADD CONSTRAINT `artist_has_concert_ibfk_1` FOREIGN KEY (`artist_artistid`) REFERENCES `artist` (`artistid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `artist_has_concert_ibfk_2` FOREIGN KEY (`concert_concertname`) REFERENCES `concert` (`concertname`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
