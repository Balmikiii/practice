-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2024 at 10:40 AM
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
-- Database: `chait_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender_id`, `receiver_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 4),
(4, 4, 4),
(5, 4, 1),
(6, 5, 1),
(7, 5, 5),
(8, 1, 1),
(9, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `message_text`
--

CREATE TABLE `message_text` (
  `id` int(11) NOT NULL,
  `message_text` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `conversations_id` int(11) NOT NULL DEFAULT '1',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unique_time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_text`
--

INSERT INTO `message_text` (`id`, `message_text`, `file`, `sender_id`, `receiver_id`, `conversations_id`, `created_time`, `unique_time`) VALUES
(1, 'hii', NULL, 3, 1, 1, '2024-11-05 06:45:06', '1730789106'),
(2, 'Hii, ratan', NULL, 3, 2, 2, '2024-11-05 06:49:05', '1730789345'),
(3, 'Hello, Arun', NULL, 3, 4, 3, '2024-11-05 06:49:20', '1730789360'),
(4, 'yes, Rahul', NULL, 4, 3, 3, '2024-11-05 06:50:34', '1730789434'),
(5, 'my chat', NULL, 4, 4, 4, '2024-11-05 07:06:44', '1730790404'),
(6, 'hii', NULL, 4, 4, 4, '2024-11-05 07:08:35', '1730790515'),
(7, 'o', NULL, 4, 1, 5, '2024-11-05 07:08:46', '1730790526'),
(8, 'dx', NULL, 4, 4, 4, '2024-11-05 07:13:59', '1730790839'),
(9, 'as', NULL, 4, 4, 4, '2024-11-05 07:17:07', '1730791027'),
(10, 'asdf', NULL, 4, 4, 4, '2024-11-05 07:25:38', '1730791538'),
(11, 's', NULL, 5, 1, 6, '2024-11-05 11:21:51', '1730805711'),
(12, 'hii', NULL, 5, 5, 7, '2024-11-05 11:26:24', '1730805984'),
(13, 'hii', NULL, 1, 5, 6, '2024-11-05 11:27:04', '1730806024'),
(14, 'how are u?', NULL, 5, 1, 6, '2024-11-05 11:27:18', '1730806038'),
(15, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:03', '1730865723'),
(16, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:10', '1730865730'),
(17, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:14', '1730865734'),
(18, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:15', '1730865735'),
(19, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:16', '1730865736'),
(20, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:18', '1730865738'),
(21, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:19', '1730865739'),
(22, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:21', '1730865741'),
(23, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:23', '1730865743'),
(24, 'hii', NULL, 1, 1, 8, '2024-11-06 04:02:26', '1730865746'),
(25, 'abc', NULL, 1, 5, 6, '2024-11-06 04:29:42', '1730867382'),
(26, 'asdf', NULL, 1, 3, 1, '2024-11-06 05:55:53', '1730872553'),
(27, 'dasfs', NULL, 1, 3, 1, '2024-11-06 05:56:43', '1730872603'),
(28, 'balmiki', NULL, 1, 3, 1, '2024-11-06 05:57:39', '1730872659'),
(29, 'kumar', NULL, 1, 3, 1, '2024-11-06 05:59:03', '1730872743'),
(30, 'hello', NULL, 1, 3, 1, '2024-11-06 06:00:14', '1730872814'),
(31, 'gf', NULL, 1, 3, 1, '2024-11-06 06:01:44', '1730872904'),
(32, 'mohit', NULL, 1, 3, 1, '2024-11-06 06:05:22', '1730873122'),
(33, 'a', NULL, 1, 2, 9, '2024-11-06 06:06:39', '1730873199'),
(34, 's', NULL, 1, 2, 9, '2024-11-06 06:06:48', '1730873208'),
(35, 'g', NULL, 1, 2, 9, '2024-11-06 06:15:24', '1730873724'),
(36, 'f', NULL, 1, 3, 1, '2024-11-06 06:15:29', '1730873729'),
(37, 'f', NULL, 1, 4, 5, '2024-11-06 06:15:33', '1730873733'),
(38, NULL, '1730884008_38.png', 1, 2, 9, '2024-11-06 09:06:48', '1730884008'),
(39, NULL, '1730884613_39_1_2.png', 1, 2, 9, '2024-11-06 09:16:53', '1730884613'),
(40, 'hii', NULL, 1, 2, 9, '2024-11-06 09:17:56', '1730884676'),
(41, 'now send image', NULL, 2, 1, 9, '2024-11-06 09:35:33', '1730885733'),
(42, NULL, '1730885752_42_2_1.png', 2, 1, 9, '2024-11-06 09:35:52', '1730885752'),
(43, NULL, '1730885803_43_2_1.png', 2, 1, 9, '2024-11-06 09:36:43', '1730885803'),
(44, NULL, '1730885861_44_1_2.png', 1, 2, 9, '2024-11-06 09:37:41', '1730885861'),
(45, NULL, '1730887959_45_1_2.png', 1, 2, 9, '2024-11-06 10:12:39', '1730887959'),
(46, NULL, '1730889495_46_1_2.png', 1, 2, 9, '2024-11-06 10:38:15', '1730889495'),
(47, NULL, '1730889495_47_1_2.png', 1, 2, 9, '2024-11-06 10:38:15', '1730889495'),
(48, NULL, '1730889495_48_1_2.png', 1, 2, 9, '2024-11-06 10:38:15', '1730889495');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(55) NOT NULL DEFAULT 'ok',
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `isactive`, `last_login`) VALUES
(1, 'Balmiki', 'balmiki@gmail.com', 'Balmiki', 'Balmiki_1.png', 1, '2024-11-06 14:34:31'),
(2, 'Arun', 'balmiki@arun.com', 'Balmiki', 'Arun_2.png', 1, '2024-11-06 15:05:06'),
(3, 'Aditya', 'balmiki@aditya.com', 'Balmiki', 'Aditya_3.png', 0, '2024-11-05 16:39:34'),
(4, 'Mohit', 'balmiki@mohit.com', 'Balmiki', 'Mohit_4.png', 0, '2024-11-06 15:04:55'),
(5, 'Radha', 'balmiki@radha.com', 'Balmiki', 'Radha_5.png', 0, '2024-11-05 17:57:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_text`
--
ALTER TABLE `message_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
