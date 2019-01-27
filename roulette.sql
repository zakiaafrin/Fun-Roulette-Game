-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 08:08 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roulette`
--

-- --------------------------------------------------------

--
-- Table structure for table `bet`
--

CREATE TABLE `bet` (
  `id` int(11) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `color` enum('Red','Black','Green','') NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(20) NOT NULL,
  `chips` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `email`, `username`, `password`, `chips`) VALUES
(1, 'anu@yahoo.com', 'Anu', '1234', '97.00'),
(2, 'rasif@yahoo.com', 'Rasif', '1234', '91.00'),
(3, 'nijhum@yahoo.com', 'Nijhum', '1234', '103.50'),
(4, 'afrin@yahoo.com', 'Afrin', '1234', '89.00'),
(5, 'zakia@yahoo.com', 'Zakia', '1234', '106.50');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `win_num` int(11) NOT NULL,
  `win_col` enum('Red','Green','Black','') NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bet_amount` int(11) NOT NULL,
  `bet_color` enum('Red','Green','Black','') NOT NULL,
  `bet_number` int(11) NOT NULL,
  `win_chips` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE `scoreboard` (
  `id` int(11) NOT NULL,
  `win_num` int(11) NOT NULL,
  `win_col` enum('Red','Green','Black','') NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bet_amount` int(11) NOT NULL,
  `bet_color` enum('Red','Green','Black','') NOT NULL,
  `bet_number` int(11) NOT NULL,
  `win_chips` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`id`, `win_num`, `win_col`, `name`, `status`, `bet_amount`, `bet_color`, `bet_number`, `win_chips`, `date`) VALUES
(1, 13, 'Red', 'Anu', 'Loser', 3, 'Green', 20, '0', '2019-01-27 18:55:18'),
(2, 13, 'Red', 'Nijhum', 'Winner', 7, 'Red', 25, '10.5', '2019-01-27 18:55:18'),
(3, 13, 'Red', 'Rasif', 'Loser', 9, 'Green', 19, '0', '2019-01-27 18:55:18'),
(4, 13, 'Red', 'Afrin', 'Loser', 11, 'Black', 31, '0', '2019-01-27 18:55:18'),
(5, 13, 'Red', 'Zakia', 'Winner', 18, 'Black', 35, '19.5', '2019-01-27 18:55:18'),
(8, 13, 'Black', 'Anu', 'Loser', 3, 'Red', 20, '0', '2019-01-27 06:28:39'),
(9, 13, 'Black', 'Nijhum', 'Winner', 7, 'Black', 25, '10.5', '2019-01-27 06:28:39'),
(10, 13, 'Black', 'Rasif', 'Loser', 9, 'Green', 19, '0', '2019-01-27 06:28:39'),
(11, 13, 'Black', 'Afrin', 'Loser', 11, 'Red', 31, '0', '2019-01-27 06:28:39'),
(12, 13, 'Black', 'Zakia', 'Winner', 13, 'Black', 35, '19.5', '2019-01-27 06:28:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bet`
--
ALTER TABLE `bet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
