-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 06:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `email`, `username`, `password`) VALUES
(1, '20ucc003@lnmiit.ac.in', '20UCC003', '$2y$10$48HmKsVy3WuOUX6P0MP.QOZRBsnsD8gkRCXLRFfCjeR/vW3aAon5i'),
(4, 'abhijeet177@gmail.com', 'Abhijeet177', '$2y$10$oFrxtmRrdD16RTgId/smnuIC1uFIhmUOv/mTEXXQsdeB.1JmF2pfe'),
(5, 'akshat112@gmail.com', 'akshat112', '$2y$10$4vXho1z9TZlcb.8AFrWzpuhfwYQP3AtZVcJS808rPQyTj.eEIkr9e'),
(8, 'bhavika112@gmail.com', 'bhavika112', '$2y$10$BkSCsFXd2AVxBEuwjIrHKepdoxBlKGyWM858ARvWBw5K8iW7KC2Am'),
(9, 'mayank223@gmail.com', 'mayank223', '$2y$10$Nb16Mt9lmM1nIKLg/624CeC1ycWSnRBrWehiEyYZLtwOjLqLy7Tx6'),
(10, 'paraduman@gmail.com', 'praduman ', '$2y$10$ynNdU.DqVrCekzja3EChpegGtTsvWyToulG36xSuCDfGtwKPzfA5S'),
(11, 'vansh003@gmail.com', 'vansh003', '$2y$10$u7VEhNWkFabw7pax/1AlfOaZkWqdHOSTVDclrXteaa9XsrEuTNM3e'),
(14, 'vansh07@gmail.com', 'vansh07', '$2y$10$WwEtH9D52c3iwLfvLIe3/eA2LFUTvM9ronsRBxiJbdNEPEfBWhswC'),
(15, 'ak@gmail', 'akshatm', '$2y$10$ORf189t5dBFaNt949UhKwuwNlXrsFyRFIAT6ahwJg0cqLYzOVe21C');

-- --------------------------------------------------------

--
-- Table structure for table `cus_info`
--

CREATE TABLE `cus_info` (
  `Sno` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Addhar` varchar(50) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `app_date` date NOT NULL DEFAULT current_timestamp(),
  `app_time` varchar(30) NOT NULL,
  `VaccineName` varchar(50) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_info`
--

INSERT INTO `cus_info` (`Sno`, `Name`, `Addhar`, `Sex`, `Phone`, `app_date`, `app_time`, `VaccineName`, `acc_id`) VALUES
(60, 'abhijeet', '388522966455', 'M', '8825149293', '2021-11-27', '9:00 am - 12:00 pm', 'Covid Sheild', 0),
(65, 'Akshat Mathur', '1234', 'M', '5555555555', '2021-12-10', '1:00 pm - 3:00 pm', 'Covaccine', 5),
(66, 'Akshat Mathur', '1234', 'M', '5555555555', '2021-11-27', '1:00 pm - 3:00 pm', 'Covaccine', 5),
(69, 'akshita singh', '1234', 'F', '8888888888', '2021-11-27', '1:00 pm - 3:00 pm', 'Vacc1', 10),
(70, 'bhavika', '388522966455', 'F', '1111111111', '2021-12-05', '4:00 pm - 6:00pm', 'Covaccine', 10),
(74, 'Abhijeet jha', '86494944696', 'M', '0882514929', '2021-11-10', '9:00 am - 12:00 pm', 'Vacc2', 1),
(75, 'vansh patel', '86494944696', 'M', '0882514929', '2021-11-28', '9:00 am - 12:00 pm', 'Vacc1', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cus_info`
--
ALTER TABLE `cus_info`
  ADD PRIMARY KEY (`Sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cus_info`
--
ALTER TABLE `cus_info`
  MODIFY `Sno` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
