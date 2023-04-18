-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 04:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `recommend` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `firstName`, `lastName`, `gender`, `recommend`, `phone`) VALUES
(13, 'Fahao', 'Wen', 'male', 'D.Yang', '404-940-6861');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `p_id` int(50) NOT NULL,
  `v_id` int(50) NOT NULL,
  `s_id` int(50) NOT NULL,
  `approved` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`p_id`, `v_id`, `s_id`, `approved`) VALUES
(15, 16, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `englishName` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `bringFamily` varchar(50) NOT NULL,
  `retu` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `faset6` varchar(50) NOT NULL,
  `school` varchar(150) NOT NULL,
  `major` varchar(150) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `wechat` varchar(150) NOT NULL,
  `vaccine` varchar(50) NOT NULL,
  `attention` varchar(50) NOT NULL,
  `scomment` varchar(500) NOT NULL,
  `acomment` varchar(500) NOT NULL,
  `pickup` varchar(50) NOT NULL,
  `flightInfo` varchar(50) NOT NULL,
  `aflightnum` varchar(80) NOT NULL,
  `aairline` varchar(80) NOT NULL,
  `aDate` date NOT NULL,
  `aTime` varchar(150) NOT NULL,
  `lflightnum` varchar(80) NOT NULL,
  `lairline` varchar(150) NOT NULL,
  `lDate` date NOT NULL,
  `lTime` varchar(150) NOT NULL,
  `smalllug` int(50) DEFAULT NULL,
  `biglug` int(50) DEFAULT NULL,
  `flightComment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `firstName`, `lastName`, `englishName`, `gender`, `bringFamily`, `retu`, `purpose`, `faset6`, `school`, `major`, `phone`, `wechat`, `vaccine`, `attention`, `scomment`, `acomment`, `pickup`, `flightInfo`, `aflightnum`, `aairline`, `aDate`, `aTime`, `lflightnum`, `lairline`, `lDate`, `lTime`, `smalllug`, `biglug`, `flightComment`) VALUES
(15, 'Fahao', 'Wen', '', 'male', 'yes', 'Returning', 'ud', 'f6', 'sds', 'Information Technology', '4049406861', 'sda', 'Yes', 'No', '    sdasd', '    ', 'yes', 'yes', '7777777', 'Fahao Wen', '2023-12-20', '11:22', '14512345', 'Delta', '3333-11-22', '01:00', 2, 3, '  33333'),
(13, 'Fahao', 'Wen', 'Nick', 'male', 'yes', '', 'gd', 'f6', 'Chinese School', 'Nursing', '4049406861', 'weid', 'ss', 'Yes', 'sdas', '', 'yes', 'yes', '14512345', 'Fahao Wen', '2023-12-20', '11:22', '7777777', 'Delta', '3333-11-22', '01:00', 2, 3, '22222'),
(21, 'Fahao', 'Wen', 'Nick', 'other', 'yes', 'Returning', 'ud', 'f6', 'N/A', 'Nursing', '4049406861', '', '', 'No', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pw` varchar(150) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pw`, `type`) VALUES
(3, 'jan@ggc.edu', '333', 2),
(4, 'test132@gmail.com', '444', 2),
(5, 'Jenny@ggc.edu', '555', 2),
(6, 'lalal@gmail.com', '666', 2),
(7, '111@gmail.com', '777', 2),
(8, '222@gmail.com', '888', 2),
(10, '444@gmail.com', '111', 1),
(11, '1231231@ggc.edu', '123456', 1),
(13, 'admin@test.edu', 'admin', 0),
(15, 's1@test.com', 's1', 2),
(16, 'v1@test.com', 'v1', 1),
(17, 's2@test.com', 's2', 2),
(18, 'v2@test.com', 'v2', 1),
(19, 's3@test.com', 's3', 2),
(20, 'v3@test.com', 'v3', 1),
(21, 's4@test.com', 's4', 2),
(22, 'adminaa@test.edu', '2', 1),
(23, 'sdsd@qq.cpm', '111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `v_id` int(50) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `phone` varchar(120) NOT NULL,
  `car_model` varchar(120) NOT NULL,
  `car_year` varchar(120) NOT NULL,
  `manufacture` varchar(120) NOT NULL,
  `seat` int(50) NOT NULL,
  `handle_big_luggage` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ename` varchar(150) NOT NULL,
  `wechat` varchar(150) NOT NULL,
  `vaccine` varchar(20) NOT NULL,
  `v_comment` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`v_id`, `first_name`, `last_name`, `phone`, `car_model`, `car_year`, `manufacture`, `seat`, `handle_big_luggage`, `gender`, `ename`, `wechat`, `vaccine`, `v_comment`) VALUES
(16, 'Janny', 'Chen', '456-789-5454', 'Camela', '1009', 'Hoda', 2, 1, 'female', 'Jenny', 'jenny', 'no', '  123'),
(18, 'Mingyuan', 'Zhao', '555-666-9999', 'Tesla 2534', '2022', 'Tesla', 4, 2, 'male', 'Ming', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
