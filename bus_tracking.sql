-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 12:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `busmaster`
--

CREATE TABLE `busmaster` (
  `busId` int(11) NOT NULL,
  `busno` varchar(100) NOT NULL,
  `busname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `busmaster`
--

INSERT INTO `busmaster` (`busId`, `busno`, `busname`) VALUES
(1, 'MH-09-CV-0719', 'Siddhanerli'),
(2, 'MH-51-C-0507', 'Bamani Nadi Kinara'),
(3, 'MH-09-FL-6693', 'Kagal'),
(4, 'MH-04-GP-0844', 'Unchgaon'),
(5, 'MH-09-GJ-0735', 'Sangrul'),
(6, 'MH-09-GL-0874', 'Kale'),
(7, 'MH-09-GJ-0506', 'Beed-Chafodi'),
(8, 'MH-09-CA-0263', 'Bhogawati'),
(9, 'MH-12-HB-2391', 'Kandgaon'),
(10, 'MH-15-EF-2727', 'Vashi Naka'),
(11, 'MH-09-CV-0697', 'Phulewadi-Ka-Bawada'),
(12, 'MH-09-CV-0265', 'Wadanage'),
(13, 'MH-51-C-0437', 'Bhuyewadi'),
(14, 'MH-09-BC-8652', 'Ambap Padali'),
(15, 'MH-09-GJ-1037', 'Satave'),
(16, 'MH-09-BC-6466', 'Sarud-Bambawade'),
(17, 'MH-09-GJ-1034', 'Ambawade'),
(18, 'MH-51-C-0435', 'Shirala-Managle'),
(19, 'MH-09-CV-0663', 'Kurlap'),
(20, 'MH-09-CV-0664', 'Tung'),
(21, 'MH-51-C-0436', 'Ashta'),
(22, 'MH-09-GJ-0736', 'Bahadurwadi'),
(23, 'MH-09-EM-3495', 'Ichalkaranji1'),
(24, 'MH-48-K-0102', 'Ichalkaranji2'),
(25, 'MH-15-EF-0054', 'Ichalkaranji3'),
(26, 'MH-09-CV-0665', 'Ichalkaranji4'),
(27, 'MH-09-FL-0012', 'Kumbhoj-Danoli'),
(28, 'MH-51-C-0434', 'Narande'),
(29, 'MH-09-EM-4736', 'Sangli Phata(IGM)'),
(30, 'MH-15-EF-0189', 'Rukadi-Mangaon'),
(31, 'MH-09-GJ-0802', 'Kumbhoj(IGM)'),
(32, 'MH-09-GJ-1646', 'Yadrav(IGM)'),
(33, 'MH-09-EM-2697', 'Ambap-Vadgaon(IGM)'),
(34, 'MH-46-BB-8919', 'Yadrav(IGM)');

-- --------------------------------------------------------

--
-- Table structure for table `bus_assign_master`
--

CREATE TABLE `bus_assign_master` (
  `assignid` int(11) NOT NULL,
  `busid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `locationfrom` int(11) NOT NULL,
  `locationto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_assign_master`
--

INSERT INTO `bus_assign_master` (`assignid`, `busid`, `userid`, `locationfrom`, `locationto`) VALUES
(1, 1, 3, 1, 3),
(2, 3, 2, 1, 2),
(3, 2, 4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bus_tracking`
--

CREATE TABLE `bus_tracking` (
  `trackingid` int(11) NOT NULL,
  `tracking_date` date DEFAULT NULL,
  `busid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `locationfrom` int(11) NOT NULL,
  `locationto` int(11) NOT NULL,
  `latitude` varchar(500) NOT NULL,
  `longitude` varchar(500) NOT NULL,
  `latitude_end` text DEFAULT NULL,
  `longitude_end` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_tracking`
--

INSERT INTO `bus_tracking` (`trackingid`, `tracking_date`, `busid`, `userid`, `locationfrom`, `locationto`, `latitude`, `longitude`, `latitude_end`, `longitude_end`) VALUES
(1, '2025-02-02', 1, 3, 1, 3, '16.7510016', '74.4882176', '', NULL),
(2, '2025-02-02', 2, 4, 3, 4, '16.7492196', '74.4902428', '16.7510016', '74.4882176');

-- --------------------------------------------------------

--
-- Table structure for table `locationmaster`
--

CREATE TABLE `locationmaster` (
  `locationId` int(11) NOT NULL,
  `locationname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locationmaster`
--

INSERT INTO `locationmaster` (`locationId`, `locationname`) VALUES
(1, 'Siddhanerli'),
(2, 'Bamani Nadi Kinara'),
(3, 'Kagal'),
(4, 'Unchgaon'),
(5, 'Sangrul'),
(6, 'Kale'),
(7, 'Beed-Chafodi'),
(8, 'Bhogawati'),
(9, 'Kandgaon'),
(10, 'Vashi Naka'),
(11, 'Phulewadi-Ka-Bawada'),
(12, 'Wadanage'),
(13, 'Bhuyewadi'),
(14, 'Ambap Padali'),
(15, 'Satave'),
(16, 'Sarud-Bambawade'),
(17, 'Ambawade'),
(18, 'Shirala-Managle'),
(19, 'Kurlap'),
(20, 'Tung'),
(21, 'Ashta'),
(22, 'Bahadurwadi'),
(23, 'Ichalkaranji1'),
(24, 'Ichalkaranji2'),
(25, 'Ichalkaranji3'),
(26, 'Ichalkaranji4'),
(27, 'Kumbhoj-Danoli'),
(28, 'Narande'),
(29, 'Sangli Phata(IGM)'),
(30, 'Rukadi-Mangaon'),
(31, 'Kumbhoj(IGM)'),
(32, 'Yadrav(IGM)'),
(33, 'Ambap-Vadgaon(IGM)'),
(34, 'Yadrav(IGM)'),
(35, 'Siddhanerli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$3SVlUAPko9jGLdPnsWD6oOga0K2UcvRHZwI.mcmUoP3XwhzLr.DZi', 'admin'),
(2, 'Simran', '$2y$10$FWdfZ3IORBIrDgxPOvJlJuOIJduanLAMf4vzXmMS7tHiFWjMehT/W', 'driver'),
(3, 'Amol', '$2y$10$GZRo1sTZADC40DTYqLr.veNZbu7Qv7b9vU9XUN6bWsalNAiZ6zpc.', 'driver'),
(4, 'Sakshi', '$2y$10$V/qyO37RKG8NtNSmUtC44eKJo/x8Uw50CpS1wwgrnuPdrcBLl4iaC', 'driver');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busmaster`
--
ALTER TABLE `busmaster`
  ADD PRIMARY KEY (`busId`);

--
-- Indexes for table `bus_assign_master`
--
ALTER TABLE `bus_assign_master`
  ADD PRIMARY KEY (`assignid`),
  ADD UNIQUE KEY `busid` (`busid`,`userid`);

--
-- Indexes for table `bus_tracking`
--
ALTER TABLE `bus_tracking`
  ADD PRIMARY KEY (`trackingid`);

--
-- Indexes for table `locationmaster`
--
ALTER TABLE `locationmaster`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busmaster`
--
ALTER TABLE `busmaster`
  MODIFY `busId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `bus_assign_master`
--
ALTER TABLE `bus_assign_master`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bus_tracking`
--
ALTER TABLE `bus_tracking`
  MODIFY `trackingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locationmaster`
--
ALTER TABLE `locationmaster`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
