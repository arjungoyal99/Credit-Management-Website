-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 04:22 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `cred` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `sender`, `receiver`, `cred`) VALUES
(1, 'amit@gmail.com', 'mohit@gmail.com', 700),
(2, 'amit@gmail.com', 'mohit@gmail.com', 700),
(3, 'mohit@gmail.com', 'amit@gmail.com', 700),
(4, 'mohit@gmail.com', 'amit@gmail.com', 700),
(5, 'mohit@gmail.com', 'amit@gmail.com', 900),
(6, 'amit@gmail.com', 'mohit@gmail.com', 900),
(7, 'amit@gmail.com', 'apurva@gmail.com', 90),
(8, 'amit@gmail.com', 'apurva@gmail.com', 90),
(9, 'apurva@gmail.com', 'amit@gmail.com', 180),
(10, 'sandy@gmail.com', 'ajit@gmail.com', 90),
(11, 'ajit@gmail.com', 'sandy@gmail.com', 90),
(12, 'amar@gmail.com', 'ajit@gmail.com', 10),
(13, 'amar@gmail.com', 'ajit@gmail.com', 10),
(14, 'ajit@gmail.com', 'amar@gmail.com', 20),
(15, 'apurva@gmail.com', 'mohit@gmail.com', 700),
(16, 'apurva@gmail.com', 'mohit@gmail.com', 700),
(21, 'mohit@gmail.com', 'apurva@gmail.com', 700),
(22, 'mohit@gmail.com', 'apurva@gmail.com', 700),
(30, 'apurva@gmail.com', 'amar@gmail.com', 90),
(31, 'amar@gmail.com', 'apurva@gmail.com', 90),
(32, 'ajit@gmail.com', 'amar@gmail.com', 90),
(35, 'ajit@gmail.com', 'amit@gmail.com', 100),
(36, 'amit@gmail.com', 'ajit@gmail.com', 100),
(37, 'renu@gmail.com', 'vasu@gmail.com', 700),
(38, 'vasu@gmail.com', 'renu@gmail.com', 700),
(39, 'shefali@gmail.com', 'sandy@gmail.com', 900),
(40, 'sandy@gmail.com', 'shefali@gmail.com', 900),
(41, 'vasu@gmail.com', 'amit@gmail.com', 900),
(43, 'amit@gmail.com', 'vasu@gmail.com', 900);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `credit`) VALUES
('ajit@gmail.com', 'Ajit', 1000),
('amar@gmail.com', 'Amar', 1000),
('amit@gmail.com', 'Amit', 1000),
('apurva@gmail.com', 'Apurva', 1000),
('mohit@gmail.com', 'Mohit', 1000),
('renu@gmail.com', 'Renu', 1000),
('sandy@gmail.com', 'Sandy', 1000),
('shefali@gmail.com', 'Shefali', 1000),
('vasu@gmail.com', 'Vasu', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
