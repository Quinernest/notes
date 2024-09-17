-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 09:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `note_id` int(11) NOT NULL,
  `archive_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`note_id`, `archive_id`) VALUES
(5, 4),
(7, 2),
(8, 5),
(13, 7),
(16, 8),
(21, 9);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `note_id` int(50) NOT NULL,
  `favorite_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`note_id`, `favorite_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `user_id` int(50) NOT NULL,
  `note_id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`user_id`, `note_id`, `title`, `content`, `created_at`) VALUES
(1, 1, 'hi', 'hellohehehe', '2024-04-17 03:00:15'),
(2, 4, 'hii', 'helllllooo', '2024-04-16 12:53:53'),
(1, 5, 'hello', 'hissssssssss', '2024-04-17 03:01:04'),
(3, 6, 'hi', 'hello', '2024-04-16 13:15:06'),
(1, 7, 'add ', 'note', '2024-04-16 13:15:40'),
(3, 8, 'yawa ka', 'hello', '2024-04-16 13:18:47'),
(1, 10, 'heelllloooooo', 'hiiiiiiiiiiiiiiiiiiii', '2024-04-17 15:22:24'),
(1, 11, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhoooooooooooooooooooollllllllllllllllllleeeeeeeeeeeeeeeeeeeeeeeee', '2024-04-17 15:29:00'),
(1, 12, 'yawa ', 'HAHHAHAHAHHAHAHAHAHAHAAHHAAHHAHAHAHAHAHAHAHAHAHANADEMONYOKA', '2024-04-18 15:34:38'),
(1, 13, 'heeeeeeeeeeellllllllllllllllloooo', 'allhdjgasdasdsa', '2024-04-19 11:54:44'),
(1, 14, 'authen', 'sad', '2024-04-19 13:01:11'),
(1, 15, 'sad', '    sadasdas', '2024-04-19 13:02:54'),
(11, 16, 'asdfasdf', 'sadfssdffasdfasdfasdf', '2024-04-19 13:26:19'),
(11, 17, 'asdasdas', 'dasdasdasd', '2024-04-19 14:13:55'),
(11, 18, 'asdasd', 'asdasd', '2024-04-19 14:13:59'),
(3, 19, 'helllpooo', 'hihihihihihihihihihihihihih', '2024-04-19 15:57:47'),
(3, 20, 'heeeeeee', 'ahdiashdjgasdgajlsdljahsdiashdlasjdasodasjbdjashdilhadashdhalsihdaskhdliashdlkashdkashdiashdkasdhoasidhasdnasldhihlashgsahgihaslf', '2024-04-19 16:02:16'),
(1, 21, 'afasda', 'sdasda', '2024-04-19 16:14:15'),
(1, 22, 'asdasd', 'sadasdasggs', '2024-04-19 16:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `trashnote`
--

CREATE TABLE `trashnote` (
  `trash_id` int(50) NOT NULL,
  `note_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trashnote`
--

INSERT INTO `trashnote` (`trash_id`, `note_id`) VALUES
(17, 6),
(18, 6),
(27, 11),
(28, 11),
(29, 14),
(30, 14),
(25, 15),
(26, 15),
(19, 20),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'ernest', 'quines', 'ejay', 'ejay@gmail.com', '$2y$10$FgcpQTE9c3fNvwRqP499juEo5BSz7tB1QXaJHgDwyUq3AhpDwxFwa'),
(2, 'james', 'quines', 'james', 'sad@gmail.com', '$2y$10$h9Mrp6LUFHRx5lfZ/LnAJOcKjwNLQYr9nruCPnpkkskWEZRqG2Tv.'),
(3, 'gian', 'recana', 'gian', 'saddasdh@jfskfajfas', '$2y$10$cPyMphgYlunLhreGKEwYfOf3mamMs21rrK0FTqdwrv17lmp6.fWAW'),
(11, 'dasd', 'adasd', 'sad', 'saddasdh@jfskfajfas', '$2y$10$mwlZQBjPX4hsNkbnp/XHcONzhDaredHCrQPtmZsolS0f8QDhz31X2'),
(14, 'sad', 'sad', 'sad', 'sad@aasd', '$2y$10$Szdbb1QWtn09YjXGA6T3.OGlfaIlkXaF.tHWrI7zJ3lGFeo7MhyLO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trashnote`
--
ALTER TABLE `trashnote`
  ADD PRIMARY KEY (`trash_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trashnote`
--
ALTER TABLE `trashnote`
  MODIFY `trash_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `note` (`note_id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `note` (`note_id`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `trashnote`
--
ALTER TABLE `trashnote`
  ADD CONSTRAINT `trashnote_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `note` (`note_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
