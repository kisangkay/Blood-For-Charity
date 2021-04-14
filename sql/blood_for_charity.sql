-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 11:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodforcharity`
--
CREATE DATABASE IF NOT EXISTS `bloodforcharity` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bloodforcharity`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentID` bigint(12) NOT NULL,
  `appointment_booker_id` int(12) NOT NULL,
  `requested_cancellation` varchar(1) NOT NULL DEFAULT '0',
  `appointmentbookerID` varchar(50) NOT NULL,
  `donationcenter` text NOT NULL,
  `donormessage` text NOT NULL,
  `appointment_date` datetime NOT NULL,
  `appointment_publication_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `appointment_booker_id`, `requested_cancellation`, `appointmentbookerID`, `donationcenter`, `donormessage`, `appointment_date`, `appointment_publication_date`) VALUES
(95, 5, '1', 'Donor 3', 'Malindi', 'I would like to participate in blood donation', '2021-04-09 13:04:00', '2021-04-13'),
(96, 2, '0', 'Stephen Donor', 'Donation Center', 'I Would like to participate in blood donation on blood for charity', '2021-04-16 20:16:00', '2021-04-13'),
(97, 7, '0', 'Donor 5', 'Donation Center', 'I am 20 years old and I would like to donate blood on Blood For Charity', '2021-04-22 15:06:00', '2021-04-13'),
(98, 6, '0', 'Donor4', 'Meru', 'SS', '2021-05-01 10:48:00', '2021-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articleId` bigint(12) NOT NULL,
  `article_authorId` int(12) NOT NULL,
  `article_title` text NOT NULL,
  `article_full_text` text NOT NULL,
  `article_photo` varchar(200) DEFAULT NULL,
  `article_publication_date` bigint(10) NOT NULL DEFAULT 0,
  `article_created_date` bigint(10) NOT NULL DEFAULT 0,
  `article_last_update` bigint(10) NOT NULL DEFAULT 0,
  `article_display` tinyint(1) NOT NULL DEFAULT 0,
  `article_order` bigint(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleId`, `article_authorId`, `article_title`, `article_full_text`, `article_photo`, `article_publication_date`, `article_created_date`, `article_last_update`, `article_display`, `article_order`) VALUES
(1, 1, 'Who needs the blood?', 'Globally, every two seconds someone needs a blood transfusion.\r\n<br><br>\r\n<p style=\"color:red\"> Transfusions are indicated in: </p>\r\n<br>\r\nMothers with complications during or after childbirth,\r\nNewborns and premature babies,\r\nTrauma victims (following accidents and burns)\r\n<br><br>\r\nPatient undergoing major surgery like heart surgery, organ transplants among others.\r\n<br>\r\nPatients with leukemia, cancer, sickle cell disease, thalassemia among others. \r\n\r\n				', NULL, 1539727200, 1540902422, 1618299042, 0, 0),
(2, 1, 'The 4 Steps of Blood Donation', 'The blood donation process can be broken down into four steps: <br>\r\n<br>\r\n1. Registration<br>\r\n2. Medical history and mini-physical<br>\r\n3. Donation<br>\r\n4. Refreshments<br><br>\r\n\r\nWhile the whole process, from the time you get to the facility to the time you leave, can take about an hour, the actual donation itself may take as little as 8-10 minutes. <br>\r\nIf you donate platelets, a machine filters the platelets out of your blood and returns the rest of your blood to you. <br>\r\nThis process takes longer (2-3 hours).', NULL, 1540977543, 1540977543, 1540977543, 0, 0),
(3, 1, 'Who Cannot donate blood?', 'Persons with the following conditions are not allowed to donate blood anyime:<br>\r\n\r\n1. Cancer. <br>\r\n2. Cardiac disease.<br>\r\n3. Sever lung disease.<br>\r\n4. Hepatitis B and C.<br>\r\n5. HIV infection, AIDS or Sexually Transmitted Diseases (STD)<br>\r\n6. High risk occupation (e.g. prostitution)<br>\r\n7. Unexplained weight loss of more than 5 kg over 6 months.<br>\r\n8. Chronic alcoholism.', NULL, 1617919200, 1617945577, 1617945577, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageId` int(10) NOT NULL,
  `msg_fullName` varchar(70) NOT NULL,
  `msg_email` varchar(70) NOT NULL,
  `msg_subject` text DEFAULT NULL,
  `msg_fullText` text DEFAULT NULL,
  `msg_datetime` bigint(10) DEFAULT 0,
  `msg_status` varchar(20) DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageId`, `msg_fullName`, `msg_email`, `msg_subject`, `msg_fullText`, `msg_datetime`, `msg_status`) VALUES
(1, 'Stephen Kipkemboi', 'kaykisang@gmail.com', 'Test Message Subject', ' Test Message Test MessageTest MessageTest Message', 1617642823, 'Unread'),
(2, 'Stephen Kipkemboi', 'kaykisang@gmail.com', 'Test Contact Us ', 'Test Contact Us Test Contact Us Test Contact Us Test Contact Us Test Contact Us ', 1617642953, 'Unread'),
(3, 'Stephen Kipkemboi', 'kaykisang@gmail.com', 'Test Contact Us 2', 'Test Contact Us Test Contact Us Test Contact Us Test Contact Us ', 1617642993, 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(12) NOT NULL,
  `fullName` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdtime` bigint(10) DEFAULT 0,
  `user_role` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullName`, `email`, `username`, `password`, `createdtime`, `user_role`) VALUES
(1, 'Stephen Kipkemboi', 'kaykisang@gmail.com', 'kisangkay', '$2y$10$PT6Gu7htkmkEFnHPjw.td.C7LDdw5/iwn.3f8kQybmpih0lXtotZe', 1617266186, 'Admin'),
(2, 'Stephen Donor', 'donor1@gmail.com', 'Donor1', '$2y$10$EwGhloVnO.meDzgjkj74/uU3tMH8PbqOqP/RWfisbMf80ssrfHkPm', 1617266529, 'Donor'),
(3, 'Stephen Donor 2', 'kaykisang@gmail.com3', 'Donor2', '$2y$10$1r4SOfT.1QcE1G3BSwJEcOFGddmvAWzWR/IxpEpZhSqsTcgpt9Ot.', 1617362302, 'Donor'),
(4, 'Zachariah Kihara', 'kaykisaang@gmail.com', 'zac', '$2y$10$YnnDX/JrVHICxadwsUnWBukAFYeXi3LocFiA8W8xd1eR8Oc5LcKwW', 1618214660, 'Donor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `FK_articles` (`appointmentbookerID`),
  ADD KEY `FK_bookerID` (`appointment_booker_id`) USING BTREE;

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleId`),
  ADD KEY `FK_articles` (`article_authorId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentID` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleId` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
