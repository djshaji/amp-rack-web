-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc38
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2023 at 06:26 AM
-- Server version: 10.5.19-MariaDB
-- PHP Version: 8.2.6RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amp`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `uid` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Screenshot` text DEFAULT NULL,
  `Preview` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `filename` text DEFAULT NULL,
  `approved` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `Download` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`uid`, `type`, `Title`, `Description`, `Screenshot`, `Preview`, `likes`, `filename`, `approved`, `id`, `Download`) VALUES
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, NULL, NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, 1, NULL),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, NULL, NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, 2, NULL),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 3, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 4, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 5, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 6, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 7, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 8, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 9, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', NULL, 'asd', 'asd', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 10, 'files/Screenshot from 2023-04-19 10-45-41.png.png'),
('LKwQKKxMi1PS0P5hnVu2DLT00OC3', 'Presets', '333', '222', NULL, 'files/Screenshot from 2023-04-19 10-45-41.png.png', NULL, NULL, NULL, 11, 'files/Screenshot from 2023-04-19 10-45-41.png.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
