-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 14, 2023 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'COMPUTER SERVICES', '');

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbox`
--

INSERT INTO `chatbox` (`id`, `order_id`, `user_id`, `message`, `created_date`) VALUES
(369, 113, 141, '123', '2023-11-14 22:59:59'),
(370, 113, 141, '123', '2023-11-14 22:59:59'),
(371, 113, 141, '123', '2023-11-14 23:00:00'),
(372, 113, 141, '123', '2023-11-14 23:00:00'),
(373, 113, 141, '123', '2023-11-14 23:00:00'),
(374, 113, 141, '123', '2023-11-14 23:00:00'),
(375, 113, 141, '123', '2023-11-14 23:00:00'),
(376, 113, 141, '123', '2023-11-14 23:00:01'),
(377, 113, 141, '123', '2023-11-14 23:00:01'),
(378, 113, 141, '123', '2023-11-14 23:00:01'),
(379, 113, 141, '123', '2023-11-14 23:00:01'),
(380, 113, 141, '123', '2023-11-14 23:00:43'),
(381, 113, 141, '123', '2023-11-14 23:00:43'),
(382, 113, 141, '123', '2023-11-14 23:00:43'),
(383, 113, 141, '', '2023-11-14 23:00:45'),
(384, 113, 141, '', '2023-11-14 23:00:46'),
(385, 113, 141, '', '2023-11-14 23:00:46'),
(386, 113, 141, '', '2023-11-14 23:00:46'),
(387, 113, 141, '', '2023-11-14 23:00:46'),
(388, 113, 141, '', '2023-11-14 23:00:46'),
(389, 113, 141, '', '2023-11-14 23:00:47'),
(390, 113, 141, '', '2023-11-14 23:00:47'),
(391, 113, 141, '', '2023-11-14 23:00:47'),
(392, 113, 141, '', '2023-11-14 23:00:47'),
(393, 113, 141, '', '2023-11-14 23:00:47'),
(394, 113, 141, '', '2023-11-14 23:00:47'),
(395, 113, 141, '', '2023-11-14 23:00:48'),
(396, 113, 141, '', '2023-11-14 23:00:48'),
(397, 113, 141, '', '2023-11-14 23:00:48'),
(398, 113, 141, '', '2023-11-14 23:00:48'),
(399, 113, 141, '', '2023-11-14 23:00:48'),
(400, 113, 141, '', '2023-11-14 23:00:48'),
(401, 113, 141, '', '2023-11-14 23:00:49'),
(402, 113, 141, '', '2023-11-14 23:00:49'),
(403, 113, 141, '', '2023-11-14 23:00:49'),
(404, 113, 141, '', '2023-11-14 23:00:49'),
(405, 113, 141, '', '2023-11-14 23:00:49'),
(406, 113, 141, '', '2023-11-14 23:00:49'),
(407, 113, 141, '', '2023-11-14 23:00:50'),
(408, 113, 141, '', '2023-11-14 23:00:50'),
(409, 113, 141, '', '2023-11-14 23:00:50'),
(410, 113, 141, '', '2023-11-14 23:00:50'),
(411, 113, 141, '', '2023-11-14 23:00:50'),
(412, 113, 141, '', '2023-11-14 23:00:51'),
(413, 113, 141, '', '2023-11-14 23:00:51'),
(414, 113, 141, '', '2023-11-14 23:00:51'),
(415, 113, 141, '', '2023-11-14 23:00:51'),
(416, 113, 141, '', '2023-11-14 23:00:51'),
(417, 113, 141, '', '2023-11-14 23:00:51'),
(418, 113, 141, '', '2023-11-14 23:00:52'),
(419, 113, 141, '', '2023-11-14 23:00:52'),
(420, 113, 141, '', '2023-11-14 23:00:52'),
(421, 113, 141, '', '2023-11-14 23:00:52'),
(422, 113, 141, '', '2023-11-14 23:00:52'),
(423, 113, 141, '', '2023-11-14 23:00:53'),
(424, 113, 141, '', '2023-11-14 23:00:53'),
(425, 113, 141, '', '2023-11-14 23:00:53'),
(426, 113, 141, '', '2023-11-14 23:00:56'),
(427, 113, 141, '', '2023-11-14 23:00:56'),
(428, 113, 141, '', '2023-11-14 23:00:58'),
(429, 113, 141, '', '2023-11-14 23:00:59'),
(430, 113, 141, '', '2023-11-14 23:00:59'),
(431, 113, 141, '', '2023-11-14 23:01:00'),
(432, 113, 141, '', '2023-11-14 23:01:00'),
(433, 113, 141, '', '2023-11-14 23:01:00'),
(434, 113, 141, '', '2023-11-14 23:01:00'),
(435, 113, 141, '', '2023-11-14 23:01:00'),
(436, 113, 141, '', '2023-11-14 23:01:01'),
(437, 113, 141, 'sdf', '2023-11-14 23:01:21'),
(438, 113, 141, 'sdf', '2023-11-14 23:01:21'),
(439, 113, 141, 'sdf', '2023-11-14 23:01:21'),
(440, 113, 141, 'sdf', '2023-11-14 23:01:22'),
(441, 113, 141, 'sdf', '2023-11-14 23:01:22'),
(442, 113, 141, 'sdf', '2023-11-14 23:01:22'),
(443, 113, 141, 'sdf', '2023-11-14 23:01:22'),
(444, 113, 141, 'sdf', '2023-11-14 23:01:22'),
(445, 113, 141, 'sdf', '2023-11-14 23:01:23'),
(446, 113, 141, 'sdf', '2023-11-14 23:01:23'),
(447, 113, 141, 'sdf', '2023-11-14 23:01:23'),
(448, 113, 141, 'sdf', '2023-11-14 23:01:23'),
(449, 113, 141, 'sdf', '2023-11-14 23:01:23'),
(450, 113, 141, 'sdf', '2023-11-14 23:01:24'),
(451, 113, 141, 'sdf', '2023-11-14 23:01:24'),
(452, 113, 141, 'sdf', '2023-11-14 23:01:24'),
(453, 113, 141, 'sdf', '2023-11-14 23:01:24'),
(454, 113, 141, 'sdf', '2023-11-14 23:01:24'),
(455, 113, 141, 'sdf', '2023-11-14 23:01:24'),
(456, 113, 141, 'sdf', '2023-11-14 23:01:25'),
(457, 113, 141, 'sdf', '2023-11-14 23:01:25'),
(458, 113, 141, 'sdf', '2023-11-14 23:01:25'),
(459, 113, 141, 'sdf', '2023-11-14 23:01:25'),
(460, 113, 141, 'sdf', '2023-11-14 23:01:25'),
(461, 113, 141, 'sdf', '2023-11-14 23:01:26'),
(462, 113, 141, '', '2023-11-14 23:01:41'),
(463, 113, 141, '', '2023-11-14 23:01:44'),
(464, 113, 141, '', '2023-11-14 23:02:20'),
(465, 113, 141, '', '2023-11-14 23:02:56'),
(466, 113, 141, '', '2023-11-14 23:03:20'),
(467, 113, 141, '', '2023-11-14 23:03:20'),
(468, 113, 141, '', '2023-11-14 23:03:21'),
(469, 113, 141, '', '2023-11-14 23:03:21'),
(470, 113, 141, '', '2023-11-14 23:03:21'),
(471, 113, 141, '', '2023-11-14 23:03:21'),
(472, 113, 141, '', '2023-11-14 23:03:21'),
(473, 113, 141, '', '2023-11-14 23:03:22'),
(474, 113, 141, '', '2023-11-14 23:03:22'),
(475, 113, 141, '', '2023-11-14 23:03:22'),
(476, 113, 141, '', '2023-11-14 23:03:22'),
(477, 113, 141, '', '2023-11-14 23:03:22'),
(478, 113, 141, '', '2023-11-14 23:03:23'),
(479, 113, 141, '', '2023-11-14 23:03:23'),
(480, 113, 141, '', '2023-11-14 23:03:23'),
(481, 113, 141, '', '2023-11-14 23:03:23'),
(482, 113, 141, '', '2023-11-14 23:03:23'),
(483, 113, 141, '', '2023-11-14 23:03:23'),
(484, 113, 141, '', '2023-11-14 23:03:24'),
(485, 113, 141, '', '2023-11-14 23:03:59'),
(486, 113, 141, '', '2023-11-14 23:04:00'),
(487, 113, 141, '', '2023-11-14 23:04:00'),
(488, 113, 141, '', '2023-11-14 23:04:00'),
(489, 113, 141, '', '2023-11-14 23:04:01'),
(490, 113, 141, '', '2023-11-14 23:04:01'),
(491, 113, 141, '', '2023-11-14 23:04:01'),
(492, 113, 141, '', '2023-11-14 23:04:01'),
(493, 113, 141, '', '2023-11-14 23:04:01'),
(494, 113, 141, '', '2023-11-14 23:04:01'),
(495, 113, 141, '', '2023-11-14 23:04:02'),
(496, 113, 141, '', '2023-11-14 23:04:02'),
(497, 113, 141, '', '2023-11-14 23:04:02'),
(498, 113, 141, '123123', '2023-11-14 23:04:04'),
(499, 113, 141, '123123', '2023-11-14 23:04:04'),
(500, 113, 141, '123123', '2023-11-14 23:04:04'),
(501, 113, 141, '123123123123', '2023-11-14 23:04:06'),
(502, 113, 141, '123123123123', '2023-11-14 23:04:07'),
(503, 113, 141, '123123123123', '2023-11-14 23:04:07'),
(504, 113, 141, '123123123123', '2023-11-14 23:04:07'),
(505, 113, 141, '123123123123', '2023-11-14 23:04:07'),
(506, 113, 141, '123123123123', '2023-11-14 23:04:07'),
(507, 113, 141, '123123123123', '2023-11-14 23:04:07'),
(508, 113, 141, '231', '2023-11-14 23:05:39'),
(509, 114, 141, '123123', '2023-11-14 23:08:51'),
(510, 114, 141, '123123', '2023-11-14 23:09:33'),
(511, 114, 141, '123', '2023-11-14 23:09:46'),
(512, 114, 137, '', '2023-11-14 23:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `tel_no` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE `job_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `request_description` text DEFAULT NULL,
  `status` varchar(1) DEFAULT 'P' COMMENT 'P=>''PENDING'',\r\nA=>''APPROVE''\r\nC=>''CANCEL''\r\nO=>''ONGOING''\r\nF=>''FINISH''',
  `request_date` date DEFAULT NULL,
  `emp_assigned_id` int(11) DEFAULT NULL,
  `expected_date` date DEFAULT NULL,
  `actual_wip_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `user_id`, `product_id`, `request_description`, `status`, `request_date`, `emp_assigned_id`, `expected_date`, `actual_wip_date`, `finish_date`, `rate`, `feedback`) VALUES
(114, 137, 38, 'wala naman akong kailangan', 'F', '2023-11-14', 141, '2023-11-14', '2023-11-14', '2023-11-14', 3, 'bobo to wag kayo mag pagawa dito!'),
(115, 137, 38, '123123123', 'A', '2023-11-14', 141, '2023-11-14', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'P' COMMENT 'P => ''PENDING'',\r\nA => ''APPROVED'',\r\nD => ''DECLINE'',\r\nI => ''IN-ACTIVE'','
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `category_id`, `name`, `description`, `slug`, `price`, `date_view`, `counter`, `status`) VALUES
(38, 139, 1, 'PC / LAPTOP REFORMAT', '', 'pc-laptop-reformat', 123, '2023-11-14', 31, 'I'),
(40, 139, 1, '123123qweqweqwe', '', '123123qweqweqwe', 12332212, '0000-00-00', 0, 'I');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL COMMENT '0=>customer,\r\n1=>admin,\r\n2=>seller,\r\n3=employee\r\n',
  `company` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `company`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(137, 'harry@den.com', '$2y$10$f9n9m.gSu6yKADYeD4dcYuAVVBeH5gquPj.s4k9HgK4fqcq7jKI4i', 0, '', 'harry@den.com', 'harry@den.com', 'Bagbag, Novaliches, Quezon City, Metro Manila, Philippines', '12345', 'female3.jpg', 1, 'o1bz85CkIceR', '', '2023-10-18'),
(138, 'admin@admin.com', '$2y$10$uOKr6ygb4o7gFoA52lYwDeBTisdLkPuG713quXBek.iyTasfYHjKW', 1, 'admin@admin.com', 'admin', '-', '', '', '', 1, 'hU9G7FsbTxWN', '', '2023-10-18'),
(139, 'johnmarkromero.dev@gmail.com', '$2y$10$2fzAFezOWcW2jZVadkUMOemdrD/i/vG5Np4Gls54caqqFkdlxPvuS', 2, 'johnmarkromero.dev@gmail.com', 'johnmarkromero.dev@gmail.com', 'johnmarkromero.dev@gmail.com', '', '', '', 1, 'mSMRBIGPVdo6', '', '2023-10-18'),
(141, 'johnmark.romero23@gmail.com', '$2y$10$RF1I.MJiK.Am57s2A/qmi.T.pXBLxuqEQXfV3zlADvDkwwQ3cWRrG', 3, 'johnmarkromero.dev@gmail.com', 'JOHN MARK', 'ROMERO', 'Silay City, Negros Occidental', '7542214500', '', 1, '', '', '2023-10-18'),
(147, 'johnmark.romero233333@gmail.com', '$2y$10$lURjSLbKHXtDMRTtmTZG.OOF5H5bqHA2oJMgfWKBfcjMbyRKDVgI2', 3, 'johnmarkromero.dev@gmail.com', 'johnmark.romero233333@gmail.com', 'johnmark.romero233333@gmail.com', 'johnmark.romero233333@gmail.com', 'johnmark.romero233333@gmail.com', '', 0, '', '', '2023-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
