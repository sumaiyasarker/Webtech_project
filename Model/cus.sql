-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 07:00 PM
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
-- Database: `cus`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `f_name` varchar(1000) NOT NULL,
  `l_name` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `delivery_address` varchar(1000) NOT NULL,
  `password` text NOT NULL,
  `u_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `f_name`, `l_name`, `phone`, `email`, `address`, `delivery_address`, `password`, `u_id`) VALUES
(28, 'xdv', 'xcv', '01511405405', 'dfjh@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$WRL1CsQ0rbu9kgDA1g1w8OH.V/0j2sgd1CV72isr3ZM.6uFoxf82u', NULL),
(29, 'df', 'df', '01511405405', 'we@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$b5bUNy49pFNfHgJlDaZ1yeEuAgTUL5v2QcHWjFG1Dn..PDnbqEyzO', NULL),
(31, 'Noboni', 'Biswas', '01511405405', 'shraboni11@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$1dPqw5goh9lF628q43Ae3eRl0vJ1EutHUAxADdYQcPdv7wTvQd4gS', NULL),
(35, 'qw', 'qw', '01511405405', 'w@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$UBUTNLwDL1rDNzuA7AtdzeJSnJpX59X2N5PgAQNzsj8tsVHa8ltCG', NULL),
(36, 'qw', 'qw', '01511405405', 'shr1@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$YzKzLPwJC4GhBZ7uvCBnz.INLuaX.HE6WaPvMTVpFbCE6d2Kmff4u', NULL),
(39, 'qw', 'qw', '01511405405', 'l@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$5UFdUi6bppcwvETOcKwBjOuoY1rorIcMCtdfpylR3BeYqNi8sYYQK', NULL),
(43, 'qw', 'qw', '01511405405', 's@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$SNCdu9.eh3vI/Szof5lFVO.fgWz8FXWu3ZrJMJIceztFfuZi0.ALC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 'Chicken Biryani', 'Rich and aromatic rice delicacy', 250.00, '../photos/chicken_biryani.jpg'),
(2, 'Mutton Biryani', 'Tender mutton layered with flavorful rice', 300.00, '../photos/mutton_biryani.jpg'),
(3, 'Chicken Seekh Kebab', 'Spiced and grilled to perfection', 150.00, '../photos/chicken_seekh_kebab.png'),
(4, 'Mutton Shami Kebab', 'Delicate minced mutton patties', 200.00, '../photos/mutton_shami_kebab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `delivery_status` varchar(50) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `id`, `delivery_status`, `total_price`, `date`) VALUES
(2, 31, 'Pending', 150.00, '2025-01-03'),
(3, 31, 'Pending', 250.00, '2025-01-03'),
(4, 31, 'Pending', 150.00, '2025-01-03'),
(5, 31, 'Pending', 150.00, '2025-01-03'),
(6, 31, 'Pending', 600.00, '2025-01-03'),
(7, 31, 'Pending', 600.00, '2025-01-03'),
(8, 35, 'Pending', 0.00, '2025-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `usd1`
--

CREATE TABLE `usd1` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job` enum('male','female') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usd1`
--

INSERT INTO `usd1` (`id`, `name`, `email`, `password`, `job`, `created_at`) VALUES
(1, 'dd', 'mg@gmail.com', '$2y$10$1ghV92A2oSQ.v4lDR/DpDuCMdFcHBnV2jFfdt2VFDjzXTfzvz5Ob.', '', '2024-11-24 14:56:34'),
(3, 'dfv', 'asdf@gmail.com', '$2y$10$6Q2Pu6H3ydOXvjsWoVS.OuRSiU/2EgGL58NR4rGjFUDDRugoCJt8G', '', '2025-01-02 20:32:29'),
(4, 'noboni', '22-47701-2@student.aiub.edu', '$2y$10$4yoPo6zAqcYa6tM36KoAI.r3rGpdYKc24624X75wbXAvgApSRYRC.', '', '2025-01-02 20:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `password`, `phone`, `address`, `status`) VALUES
(3, 'behenchod1142@gmail.com', 'qw', 'qw', '22-47701-2@student.aiub.edu', '$2y$10$ILc2N4Sm3om1FRidgVHGAeX1tHOiwa.br0V.pCsXHWZJbmHOZInci', '01511405405', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'ghj'),
(4, 'naboni', 'qw', 'qw', 'a@gmail.com', '$2y$10$o4QPhdVbuPJs7qVmb2Dr2uaulkECr1/0wLZeFw/V69Xs.D1EDrRVy', '01511405405', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'ghj'),
(5, 'av', 'qw', 'qw', 'av@gmail.com', '$2y$10$7.wIS4UGKnkrK3amE5p8puvEf1.iKsrjEN9tOyfmICus.RDswMR7G', '01511405405', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'ghj'),
(6, 'behenchod1142@gmail.com', 'qw', 'qw', 'hi@gmail.com', '$2y$10$rGj2bOq2ZbblFaA5iwZxrevxQngr7tJtUwFFv8zd2oC8ibCVTXcKe', '01511405405', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'ghj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usd1`
--
ALTER TABLE `usd1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usd1`
--
ALTER TABLE `usd1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
