-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 12:23 AM
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
(1, 'anu@yahoo.com', 'Anu', '1234', '100.00'),
(2, 'rasif@yahoo.com', 'Rasif', '1234', '100.00'),
(3, 'afrin@yahoo.com', 'Afrin', '1234', '116.50'),
(4, 'nijhum@yahoo.com', 'Nijhum', '1234', '100.00'),
(5, 'zakia@yahoo.com', 'Zakia', '1234', '79.00');

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
(1, 8, 'Black', 'Anu', 'Winner', 9, 'Black', 11, '13.5', '2019-01-28 17:49:01'),
(2, 8, 'Black', 'Rasif', 'Loser', 11, 'Red', 33, '0', '2019-01-28 17:49:01'),
(3, 8, 'Black', 'Afrin', 'Loser', 28, 'Green', 35, '0', '2019-01-28 17:49:01'),
(4, 8, 'Black', 'Nijhum', 'Loser', 15, 'Red', 15, '0', '2019-01-28 17:49:01'),
(5, 8, 'Black', 'Zakia', 'Winner', 19, 'Black', 34, '28.5', '2019-01-28 17:49:01'),
(8, 2, 'Red', 'Afrin', 'Winner', 11, 'Red', 15, '16.5', '2019-01-28 17:54:52'),
(9, 2, 'Red', 'Anu', 'Loser', 3, 'Green', 13, '0', '2019-01-28 17:54:52'),
(10, 2, 'Red', 'Nijhum', 'Loser', 13, 'Black', 9, '0', '2019-01-28 17:54:52'),
(11, 2, 'Red', 'Rasif', 'Loser', 17, 'Green', 20, '0', '2019-01-28 17:54:52'),
(12, 2, 'Red', 'Zakia', 'Winner', 17, 'Red', 13, '25.5', '2019-01-28 17:54:52'),
(15, 33, 'Red', 'Afrin', 'Winner', 11, 'Red', 15, '16.5', '2019-01-28 23:19:04'),
(16, 33, 'Red', 'Anu', 'Loser', 3, 'Green', 13, '0', '2019-01-28 23:19:04'),
(17, 33, 'Red', 'Nijhum', 'Loser', 13, 'Black', 9, '0', '2019-01-28 23:19:04'),
(18, 33, 'Red', 'Rasif', 'Loser', 17, 'Green', 20, '0', '2019-01-28 23:19:04'),
(19, 33, 'Red', 'Zakia', 'Loser', 21, 'Black', 13, '0', '2019-01-28 23:19:04');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
