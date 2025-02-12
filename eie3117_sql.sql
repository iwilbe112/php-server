-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 12:35 PM
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
  `password` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`login_id`, `nick_name`, `email`, `age`, `gender`, `password`) VALUES
(1, 'Zoe', 'zoe@gmail.com', 21, 'female', '213242343'),
(90, 'hHI', 'hi@gmail.com', 54, 'male', '75765'),
(98, 'Ben', 'ben@gmail.com', 54, 'male', '8234t23'),
(99, 'Ken', 'ken@gmail.com', 67, 'male', '2934'),
(112, 'edmond', '123@yahoo.com', 18, 'male', '11223344'),
(121, 'Charles', '123@gmail.com', 11, 'male', '123456'),
(123, 'Andy', '321@gmail.com', 12, 'male', '1234567'),
(23423, 'Alex', 'Alex@gmail.com', 91, 'male', '12424234'),
(2123411, 'Wtf james', 'jameswtf@gmail.com', 18, 'girl', '12345678');

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
