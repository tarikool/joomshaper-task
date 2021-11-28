-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2021 at 05:49 AM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joomshaper_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `own_products`
--

CREATE TABLE `own_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `baught_from` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `own_products`
--

INSERT INTO `own_products` (`id`, `user_id`, `baught_from`, `name`, `description`, `unit_price`, `quantity`, `image_1`, `image_2`, `created_at`) VALUES
(1, 1, NULL, 'candidate02', '', 1, 10, NULL, NULL, '2021-11-27 23:28:57'),
(2, 1, NULL, 'candidate02', '', 1, 10, NULL, NULL, '2021-11-27 23:29:03'),
(3, 1, NULL, 'asd', 'asadsad', 23, 12, NULL, NULL, '2021-11-27 23:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `sold_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_seller` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_seller`) VALUES
(1, 'candidate02', 'candidate02@candidate.com', '$2y$10$UwEmCtOE97ywvDcBaTgTH.F/05qpSlXLkUeq4Vjq8VBUpsfMN.mfW', 0),
(2, 'candidate02', 'candidate02@candidate.coms', '$2y$10$iBgv/ckhNuP9v0bsX1IFQ.un5vMG9XOa.sW/.hsptcY1bB0scSmQm', 0),
(3, 'candidate02', 'candidate@candidate.com', '$2y$10$WbLgpXmlQFud4DSYQ08mFux0gWscbSSevv/gkeNYxoDU2.g.1IfEq', 0),
(4, 'candidate02', 'ami@email.com', '$2y$10$Le8mMjEf5WbPOwXc0wJ4M.Jntqo5N6Cz3xFNcM4uJFeT0ablxY8R6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `own_products`
--
ALTER TABLE `own_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `own_products`
--
ALTER TABLE `own_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
