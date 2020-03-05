-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 03:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `postcode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `mobile`, `email`, `postcode`) VALUES
(1, 'Peter', 'Rabbit', '400505123', 'peter@therabbit.com', 3121),
(2, 'Darth', 'Vader', '409123123', 'darth@theforce.com', NULL),
(3, 'Charlie', 'Brown', '408998112', 'living@thedream.com.au', 3020),
(4, 'Mickey', 'Mouse', '411211211', 'mouse@bestplace.com', NULL),
(5, 'Donald', 'Duck', '421121211', NULL, NULL),
(6, 'Julius', 'Caesar', '417878123', NULL, 4050),
(7, 'Mike', 'Tyson', '400500800', 'mike@ipunch.com.au', NULL),
(8, 'Clint', 'Eastwood', '419345345', 'clint@thebigdog.com', NULL),
(9, 'Daffy', 'Duck', '421121212', 'daffy@alltheducks.com.au', NULL),
(10, 'Michael', 'Jordan', '418765543', 'mike@idunk.com.au', 5050),
(11, 'Julia', 'Roberts', '409678332', NULL, 5052),
(12, 'Cyndi', 'Lauper', '408123123', 'cyndi@musicrocks.com.au', NULL),
(13, 'Dee', 'Potsangbam', '421229593', 'deepots@gmail.com', 3008),
(15, 'matthew', 'Mcdonald', '0456654345', 'matmcdonald@gmail.com', 4003),
(16, 'Pink', 'floyd', '0345765987', 'mat@yahoo', 5004);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
