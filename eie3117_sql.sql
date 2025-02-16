-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 02:48 PM
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
-- Database: `eie3117`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `login_id` int(11) NOT NULL,
  `nick_name` char(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `password` char(12) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `identity` text NOT NULL,
  `expertise_area` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`login_id`, `nick_name`, `email`, `age`, `gender`, `password`, `profile_image`, `identity`, `expertise_area`, `description`) VALUES
(1, 'admin', 'admin@gmail.com', 11, 'Male', '1234', 'admin.png', 'Student', '', ''),
(2, 'tutor_1', 'tutor1@gmail.com', 1, 'Male', '1234', 'download.jfif', 'Tutor', 'math', 'DSE math 5**'),
(3, 'tutor_2', 'tutor2@gmail.com', 94, 'Male', '1234', 'admin.png', 'Tutor', '', 'i am strong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
