-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 08:08 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `check`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `Ranking` int(100) NOT NULL,
  `ProgrammingLanguage` varchar(100) NOT NULL,
  `Percentage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`Ranking`, `ProgrammingLanguage`, `Percentage`) VALUES
(1, 'Python', '28.251%(+10.300%)'),
(2, 'Java', '10.069%(-2.521%)'),
(3, 'JavaScript', '9.018%(-1.624%)'),
(4, 'C++', '8.428%(-1.414%)'),
(5, 'TypeScript', '6.465%(+0.217%)'),
(6, 'PHP', '5.901%(-0.704%)'),
(7, 'Go', '5.374%(-0.749%)'),
(8, 'C', '4.368%(+0.124%)'),
(9, 'Shell', '3.607%(-2.785%)'),
(10, 'Ruby', '3.544%(-1.151%)'),
(11, 'C#', '3.173%(-0.299%)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`Ranking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `Ranking` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
