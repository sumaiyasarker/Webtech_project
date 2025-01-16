-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 11:00 AM
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
(25, 'qw', 'qw', '01511405405', '22-47701-2@student.aiub.edu', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$1OAMg2v/jsnB19fMcGQHNusIbMy90AVXyg33gIe5ryYgTVpdf84pm', NULL),
(26, 'qw', 'qw', '01511405405', '22-47701-2@student.aiub.edu', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$3NTpKZ3y7PQXbxmziJHKM.b0b9Fu3uI9tc3EN.Z1y6Jyr3rC9ScCO', NULL),
(27, 'qw', 'qw', '01511405405', '22-47701-2@student.aiub.edu', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$dmZBIRBvCJmgzHYUO6sYY.qOEWoYa1r0G39YNGDZEjZnKxmHbQzDK', NULL),
(28, 'xdv', 'xcv', '01511405405', 'dfjh@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$WRL1CsQ0rbu9kgDA1g1w8OH.V/0j2sgd1CV72isr3ZM.6uFoxf82u', NULL),
(29, 'df', 'df', '01511405405', 'we@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$b5bUNy49pFNfHgJlDaZ1yeEuAgTUL5v2QcHWjFG1Dn..PDnbqEyzO', NULL),
(30, 'qw', 'as', '01511405405', 'shraboni1142@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$HwG5X0j8rFyp3E8JY8.gPu5.3ZFPV1rcmOuV9wuNwMtyF6PmrqFlO', NULL),
(31, 'Noboni', 'Biswas', '01511405405', 'shraboni11@gmail.com', '1/8/k kadamtola purbo bashabo ,dhaka -1214', 'safdf', '$2y$10$1dPqw5goh9lF628q43Ae3eRl0vJ1EutHUAxADdYQcPdv7wTvQd4gS', NULL);

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
(1, 'Chicken Biryani', 'Rich and aromatic rice delicacy', 250.00, 'photos/chicken_biryani.jpg'),
(2, 'Mutton Biryani', 'Tender mutton layered with flavorful rice', 300.00, 'photos/mutton_biryani.jpg'),
(3, 'Chicken Seekh Kebab', 'Spiced and grilled to perfection', 150.00, 'photos/chicken_seekh_kebab.png'),
(4, 'Mutton Shami Kebab', 'Delicate minced mutton patties', 200.00, 'photos/mutton_shami_kebab.jpg');

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
(7, 31, 'Pending', 600.00, '2025-01-03');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
