-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 07:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hourscharge`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Emp_Number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Emp_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Emp_Number`, `Emp_Name`) VALUES
('11660045', 'Samer Alataona'),
('3254547', 'Roi Orad');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `Emp_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Project_Name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Task_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Task_Number` int(11) NOT NULL,
  `Task_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Hours` float NOT NULL,
  `Comments` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`Emp_Name`, `Project_Name`, `Project_ID`, `Task_Name`, `Task_Number`, `Task_ID`, `Date`, `Hours`, `Comments`) VALUES
('1', '1', 1, '1', 1, 1, '2019-01-11', 1, '1'),
('11660045', '12345', 12345, '', 1, 0, '0000-00-00', 2, ''),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-09', 22, 'sdqwe qwe qw e'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-16', 23, 'qwwwww'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw d'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw da'),
('11660045', '12345', 12345, '333', 1, 333, '2019-01-23', 5, 'dqwd awd aw da'),
('Samer Alataona', 'Intel Unite Installation', 0, 'Monitor installing', 1, 0, '2019-01-11', 3, 'asd asd qwqw'),
('Roi Orad', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 0, '2019-01-14', 1, 'wqyi wu ewiquq'),
('Roi Orad', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 0, '2019-01-14', 1, 'wqyi wu ewiquq'),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-03', 7, 'asd asd a dzxc'),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-02', 123, 'as asdf klahsdkjf haskjdfh kalsj dhfasd f'),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-02', 123, 'as asdf klahsdkjf haskjdfh kalsj dhfasd f'),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-02', 123, 'as asdf klahsdkjf haskjdfh kalsj dhfasd f'),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-02', 123, 'as asdf klahsdkjf haskjdfh kalsj dhfasd f'),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-09', 34, ''),
('Samer Alataona', 'Intel Unite Installation', 12345, 'Monitor installing', 1, 333, '2019-01-02', 22, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Project_ID` int(11) NOT NULL,
  `Project_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Project_ID`, `Project_Name`) VALUES
(12345, 'Intel Unite Installation'),
(56789, 'Software Deployment'),
(343434, 'Upgrading OS'),
(676765, 'Office Move');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Task_ID` int(11) NOT NULL,
  `Task_Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Estimate_Hours` int(11) NOT NULL,
  `Task_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Task_ID`, `Task_Name`, `Project_ID`, `Estimate_Hours`, `Task_Number`) VALUES
(333, 'Monitor installing', 12345, 100, 333);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
