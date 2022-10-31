-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 02:26 PM
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
-- Database: `empdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(191) NOT NULL,
  `dept` varchar(191) NOT NULL,
  `post` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `bday`, `gender`, `dept`, `post`, `email`, `phone`) VALUES
(2, 'Angel', 'Azarraga', '2001-07-30', 'FEMALE', 'Animation', 'Head Animator', 'aazarraga@rtu.edu.ph', '1265497988'),
(3, 'Jake', 'Sim', '2002-11-15', 'MALE', 'Contracts Department', 'Contracts Manager', 'helaur@yahoo.com', '7845468745'),
(4, 'Heeseung', 'Lee', '2001-10-15', 'Prefer not to say', 'HR Department', 'Assistant Manager', 'lhs@enha.com', '7842198544'),
(5, 'Vanessa', 'Clarine', '0000-00-00', '', 'Contracts Department', 'Contracts Coordinator', 'vanny.bunny@mnl.org', '25798462895'),
(6, 'Jay', 'Park', '2002-04-20', 'MALE', 'HR Department', 'Payroll Officer', 'jeongsaengp@mnl.org', '19894534982'),
(9, 'Jungwon', 'Yang', '2004-02-09', 'MALE', 'Contracts Department', 'Contracts Clerk', 'yang_jungwon@mnl.org', '15874968527'),
(10, 'Seonwoo', 'Kim', '2003-06-24', 'MALE', 'Animation', 'Assistant Head', 'kimsunoo@mnl.org', '03985745287');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
