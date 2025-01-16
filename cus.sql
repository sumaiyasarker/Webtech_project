-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 09:02 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'shimla', 'shimla@gmail.com', '123456');

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
(43, 'qw', 'qw', '01511405405', 's@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$SNCdu9.eh3vI/Szof5lFVO.fgWz8FXWu3ZrJMJIceztFfuZi0.ALC', NULL),
(49, 'qw', 'qw', '01511405405', 'b1142@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$isge0m10B7m6b5o/kv3PQ.tEjUzjKfp9s6TDYQ0Z/ppxpZRqh50c2', NULL),
(50, 'qw', 'qw', '01511405405', 'bod1142@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$FOfa5coaVLX8WrJM0GXux.1pGgH/BLPxUIvZrKScf6ncYNSfj77xq', NULL),
(51, 'ade', 'adfd', '12345678901', 'nobo@gmail.com', 'asDBFB fgb', 'XSdfs', '$2y$10$Z08aKKz9cJ9ukffqkj9UneUeTLWxP0QGPjnvWsNNzMrnBhh1PZp32', NULL);

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
(4, 'Mutton Shami Kebab', 'Delicate minced mutton patties', 200.00, '../photos/mutton_shami_kebab.jpg'),
(5, 'Chicken Dum Biryani', 'Flavorsome dum biryani cooked to perfection', 270.00, '../photos/chicken_dum_biriyani.png'),
(6, 'Hyderabadi Biryani', 'Authentic spicy Hyderabadi biryani', 280.00, '../photos/hyderabadi_briyani.png'),
(7, 'Chicken Tikka Masala', 'Classic curry rich in spices', 250.00, '../photos/chicken_tikka_masala.png'),
(8, 'Butter Chicken', 'Mild creamy chicken curry', 240.00, '../photos/butter_chicken.png'),
(9, 'Pav Bhaji', 'Spiced vegetable mash served with buttered buns', 150.00, '../photos/pav_bhaji.png'),
(10, 'Adana Kebab', 'A flavorful Turkish minced meat kebab', 400.00, '../photos/adana_kebab.png'),
(11, 'Turkish Kofte', 'Delicious and tender meatballs', 300.00, '../photos/turkish_kofte.png'),
(12, 'Chicken Shawarma', 'Succulent chicken in a flavorful wrap', 160.00, '../photos/chicken_sharma.png'),
(13, 'Baklava', 'Classic sweet dessert with layers of filo pastry', 450.00, '../photos/baklava.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `delivery_status` varchar(50) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `rider_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `id`, `delivery_status`, `total_price`, `date`, `rider_id`) VALUES
(2, 31, 'Accepted', 150.00, '2025-01-03', 4),
(3, 31, 'Accepted', 250.00, '2025-01-03', 4),
(4, 31, 'Accepted', 150.00, '2025-01-03', 4),
(5, 31, 'Accepted', 150.00, '2025-01-03', 4),
(6, 31, 'Pending', 600.00, '2025-01-03', NULL),
(7, 31, 'Pending', 600.00, '2025-01-03', NULL),
(11, 50, 'Pending', 400.00, '2025-01-16', NULL),
(12, 51, 'Pending', 750.00, '2025-01-16', NULL),
(13, 51, 'Pending', 750.00, '2025-01-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `o_id`, `d_id`, `comment`, `customer_id`) VALUES
(1, 2, 2, 'goood', 31),
(7, 21, 2, 'very yummy', 49),
(8, 21, 1, 'yummy', 49);

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `vehicle` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_id`, `name`, `email`, `phone`, `status`, `vehicle`, `admin_id`) VALUES
(1, 'mishi', 'mishi@gmail.com', '01306269685', 'active', 'cycle', 1),
(2, 'Alex', 'alex@gmail.com', '01407569823', 'inactive', 'bike', 1),
(3, 'Sara', 'sara@yahoo.com', '01706548732', 'active', 'car', 1),
(4, 'Rahul', 'rahul@hotmail.com', '01598756423', 'active', 'scooter', 1),
(5, 'Emily', 'emily@outlook.com', '01604785963', 'inactive', 'cycle', 1);

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
(6, 'behenchod1142@gmail.com', 'qw', 'qw', 'hi@gmail.com', '$2y$10$rGj2bOq2ZbblFaA5iwZxrevxQngr7tJtUwFFv8zd2oC8ibCVTXcKe', '01511405405', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'ghj'),
(7, 'behenchod1142@gmail.com', 'qw', 'qw', 'gh@gmail.com', '$2y$10$QAUJqe5HKgmuPLeasspVkuWV0jAg4ExhUy3.RwU1pIYJkaD36zHoe', '01511405405', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'ghj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admin_id` (`admin_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usd1`
--
ALTER TABLE `usd1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `riders`
--
ALTER TABLE `riders`
  ADD CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
