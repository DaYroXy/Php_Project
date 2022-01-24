-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 11:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopforce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `quantity`) VALUES
(60, 4, 12, 3),
(61, 4, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `quantity`, `category`) VALUES
(10, 'Green Jacket', 'The McMurdo Parka, our longest men\'s coat.', 'GreenJacket.webp', 180, 10, 'Men'),
(12, 'BlueJacket', 'this is a blue jacket for testing onlythis is a blue jacket for testing only', 'BlueJacket.webp', 300, 0, 'Men'),
(15, 'Tekno Logo Hoodie', 'The easygoing Tekno Logo Hoodie is made with a durablte.', 'Tekno Logo Hoodie.webp', 119, 0, 'Men'),
(16, 'Ceptor Jacket', 'The Ceptor Jacket is a sleek, water-repellent shell designed for snowsports.', 'Ceptor Jacket.webp', 400, 2, 'Men'),
(17, 'Chakal Jacket', 'Featuring waterproof, breathable DryVentâ„¢ 2L', 'Chakal Jacket.webp', 300, 8, 'Men'),
(18, '1996 Retro Nuptse Jacket', 'oversized baffles you know you\'re looking at our iconic Nuptse.', '1996 Retro Nuptse Jacket.webp', 280, 0, 'Men'),
(19, 'Arctic Parka', 'the Arctic Parka has you equipped to take on wintry conditions in the city', 'Menâ€™s Arctic Parka.webp', 350, 40, 'Men'),
(20, 'Arrowood TriclimateÂ® Jacket', 'the Menâ€™s Arrowood TriclimateÂ® Jacket has the versatility to take on anything.', 'Arrowood TriclimateÂ® Jacket.webp', 199, 34, 'Men'),
(21, 'McMurdo Parka', 'Our longest men\'s coat, has a long list of must-have features', 'McMurdo Parka.webp', 30, 0, 'Men'),
(22, 'Dragline Jacket', 'The vibrant Women\'s Dragline Jacket, made with a waterproof, breathable.', 'Dragline Jacket.webp', 425, 10, 'Women'),
(23, 'Lenado Jacket', 'The slim-fit Women\'s Lenado Jacket is made with our high-performance.', 'Lenado Jacket.webp', 300, 60, 'Women'),
(24, 'Ceptor Jacket', 'The Women\'s Ceptor Jacket is a sleek, water-repellent shell.', 'Women Ceptor Jacket.webp', 400, 0, 'Women'),
(25, 'Tanager Jacket', 'Whether you\'re taking park laps or hiking in search of an untracked line.', 'Womenâ€™s Tanager Jacket.webp', 180, 24, 'Women'),
(26, 'Eco Snow Triclimate', 'The versatile Womenâ€™s ThermoBallâ„¢ Eco Snow TriclimateÂ® Jacket is a waterproof.', 'Womenâ€™s ThermoBall.webp', 360, 47, 'Women'),
(27, 'Apex Bionic Jacket', 'The updated Women\'s Apex Bionic Jacket features a refined design.', 'Apex Bionic Jacket.webp', 150, 21, 'Women'),
(28, 'Shelbe Raschel Hoodie', 'The wind-resistant and water-repellent Shelbe Raschel Hoodie.', 'Shelbe Raschel Hoodie.webp', 150, 11, 'Women'),
(29, 'Colorblock Fleece Jacket', 'Fleece Jacket has the style and bold color-blocking.', 'NF0A5EIN_0TT_hero.webp', 99, 5, 'Kids'),
(30, 'McMurdo Parka', 'longest boys\' coat, includes a long list of must-have features.', 'NF0A5GGX_FN4_hero.webp', 250, 0, 'Kids'),
(31, 'McMurdo Parka', 'The Boys\' McMurdo Parka, our longest boys\' coat.', 'NF0A5GEF_A6M_hero.webp', 250, 87, 'Kids'),
(32, 'McMurdo Parka', 'McMurdo Parka, our longest boys\' coat, includes a long list of must-have.', 'NF0A5GEF_0M2_hero.webp', 250, 14, 'Kids'),
(33, 'Retro Nuptse Jacket', 'Nuptse Jacket is durable, water-resistant.', 'NF0A5IYC_3H1_hero.webp', 210, 84, 'Kids'),
(34, 'Swirl Parka', 'stylish warmth in the thigh-length Girls\' Printed Reversible Mossbud Swirl Parka.', 'NF0A5IYH_2H1_hero.webp', 139, 76, 'Kids'),
(35, 'Arctic Swirl Jacket', 'Girls\' Printed Reversible Arctic Swirl Jacket.', 'NF0A5J2Z_243_hero.webp', 119, 19, 'Kids'),
(36, 'Eco Parka', 'refined diagonal quilting pattern.', 'NF0A5GEH_JC0_hero.webp', 159, 18, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'anas', 'anas', 1),
(4, 'Amal', 'Amal', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
