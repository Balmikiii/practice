-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2024 at 12:23 PM
-- Server version: 5.7.19
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_events`
--

CREATE TABLE `add_events` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_events`
--

INSERT INTO `add_events` (`id`, `date`, `msg`) VALUES
(104, '2024-10-01', 'hello'),
(105, '1970-01-01', 'hello'),
(106, '1970-01-02', 'hello'),
(107, '2024-10-02', 'hello'),
(108, '2024-10-03', 'hello'),
(109, '2024-10-14', 'ok'),
(110, '2024-10-15', 'ok'),
(111, '2024-10-16', 'ok'),
(112, '2024-10-24', 'w'),
(113, '2024-10-25', 'w'),
(114, '2024-10-29', 'r');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_events`
--
ALTER TABLE `add_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_events`
--
ALTER TABLE `add_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
