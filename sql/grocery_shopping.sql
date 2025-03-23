-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 06:44 AM
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
-- Database: `grocery_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '', '2018-04-09 07:36:18'),
(8, 'abc888', '6d0361d5777656072438f6e314a852bc', 'abc@gmail.com', 'QX5ZMN', '2018-04-13 18:12:30'),
(9, 'admin', '123456', '', '', '2024-02-23 11:30:40'),
(10, 'admin', '123456', '', '', '2024-02-23 11:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(33, 58, 'Maggie', 'Maggi Masala Instant Noodles Vegetarian 420 GRAMS Instant Noodles Vegetarian  (6 x 70 g)', 155.00, '65f587fdcaa12.jpg'),
(35, 58, 'LUX', 'LUX Velvet Glow Jasmine & Vitamin E Soap Bar, Bathing Soap  (8 x 150 g)', 415.00, '65f5885c6224a.jpg'),
(36, 58, 'Colgate', 'colgate Maxfresh Toothpaste, Red Gel paste with menthol for super fresh breath,300kg,150g x2 (spicy fresh))', 264.00, '65f5889a38c1b.jpg'),
(37, 58, 'DARK FANTASY', 'Sunfeast DARK FANTASY Cookies  (295 g).A rich, dark crunchy cookie with gooey, molten chocolate crème with a hint of coffee in the centre', 210.00, '65f5892b43471.jpg'),
(39, 58, 'Rice', 'Fortune Super Basmati Rice, Raw Rice, Aged to Perfection , 1 kg', 161.00, '65f58a94c278f.jpg'),
(40, 58, 'Surf Excel', 'surf excel 3 in 1 smart shots liquid detergent for front load & top load wahing machines.', 333.00, '65f58ac29da62.jpg'),
(41, 58, 'Toor Dal/Arhar Dal', 'tata sampann unpolished Toor Dal/Arhar Dal , 1kg', 188.00, '65f58ada29e06.jpg'),
(42, 58, 'wheat', '24 Mantra Organic Wheat Premium/Gehoon/Godhuma - 1 Kg | 100% Organic | Chemical Free & Pesticides Free | Rich & Strong Flavour', 402.00, '65f9bbd87e930.jpg'),
(43, 58, 'elaichi', 'Vedaka Whole Cardamom (Elaichi) | No Artificial Colours or Preservatives | 50g', 285.00, '65f9bc70a1de0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(62, 32, 'in process', 'hi', '2018-04-18 17:35:52'),
(63, 32, 'closed', 'cc', '2018-04-18 17:36:46'),
(64, 32, 'in process', 'fff', '2018-04-18 18:01:37'),
(65, 32, 'closed', 'its delv', '2018-04-18 18:08:55'),
(66, 34, 'in process', 'on a way', '2018-04-18 18:56:32'),
(67, 35, 'closed', 'ok', '2018-04-18 18:59:08'),
(68, 37, 'in process', 'on the way!', '2018-04-18 19:50:06'),
(69, 37, 'rejected', 'if admin cancel for any reason this box is for remark only for buter perposes', '2018-04-18 19:51:19'),
(70, 37, 'closed', 'delivered success', '2018-04-18 19:51:50'),
(71, 39, 'in process', 'on the way', '2021-06-26 05:19:09'),
(72, 39, 'closed', 'D', '2021-06-26 05:19:30'),
(73, 40, 'in process', 'ready', '2021-06-26 13:29:17'),
(74, 51, 'closed', 'Your product delivered', '2021-06-27 03:18:31'),
(75, 57, 'in process', 'Your order is on the way', '2021-06-27 06:38:52'),
(76, 58, 'closed', 'we delivered your order', '2021-06-27 06:39:28'),
(77, 59, 'rejected', 'Currently not available', '2021-06-27 06:39:57'),
(78, 60, 'closed', 'delivered', '2021-06-27 07:08:25'),
(79, 61, 'in process', 'on the way', '2021-06-27 07:08:56'),
(80, 62, 'rejected', 'Currently unavailable', '2021-06-27 07:09:29'),
(81, 64, 'closed', 'ook', '2024-03-16 12:26:09'),
(82, 68, 'rejected', 'ok', '2024-03-18 13:50:02'),
(83, 61, 'rejected', 'ok', '2024-03-19 16:28:36'),
(84, 61, 'in process', 'ok', '2024-03-20 07:34:54'),
(85, 72, 'in process', 'ok', '2024-03-21 10:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(58, 0, 'GROCERY MART', 'grocerymart@example.com', '9784512601', 'http://grocerywala.com', '9am', '7pm', 'mon-sun', '64,shivrangini crossing , satellite , near brts bus stand , ahmedabad', '\r\n65f5bc70ad575.jpg', '2024-03-16 15:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(32, 'navjot890', 'nav', 'singh', 'nds949405@gmail.com', '6232125458', '6d0361d5777656072438f6e314a852bc', 'badri col phase 1', 1, '2018-04-18 09:50:56'),
(33, 'rock', 'rock1', 'rock2', 'rock@gm.co', '1234567891', '983772fb9d34ee820b4fac9b62625e0b', 'ddfs', 1, '2021-06-26 04:54:49'),
(34, 'mikel', 'jon', 'kin', 'mjk@exampl.com', '9547210356', '60b889fc5594ef0979ce89e86a5dfca3', '48, sms street, Trichy, india', 1, '2021-06-27 00:19:42'),
(36, 'Vishnupriya', 'vishnupriya', 'dharshini', 'vish@gm.com', '7532146820', '81bfac29cb35d7915bfbbf638230aa78', '28, kamaraj street, india', 1, '2021-06-27 07:06:21'),
(37, 'zula', 'zula', 'prajapati', 'test1@gmail.com', '7621048017', '06e577bdca8785275d6fbc5b62d09246', 'Mumbai East', 1, '2024-02-24 04:53:13'),
(38, 'admin', 'admin', 'admin', 'abc@gmail.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 'vxmznm', 1, '2024-03-15 04:32:11'),
(40, 'zulaprajapati', 'zula', 'prajapati', 'gojeg67086@vasteron.com', '9876543213', '30d0519448be8478dd4fe6cb911ba73c', 'Ahmedabad-380001', 1, '2024-03-19 14:04:56'),
(41, 'test', 'mahi', 'singh', 'mahi@gmail.com', '3245619870', '0e774d072ad2e9c0052de3e72e7fe303', 'mumbai', 1, '2024-03-19 15:40:40'),
(42, 'arwa', 'arwa', 'mansuri', 'arwa@gmail.com', '7869054234', '0e774d072ad2e9c0052de3e72e7fe303', 'India', 1, '2024-03-19 16:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(61, 36, 'Rice', 1, 45.00, 'in process', '2024-03-20 07:34:54'),
(64, 36, 'Maize', 2, 60.00, 'closed', '2024-03-16 12:26:09'),
(68, 39, 'maggie', 2, 50.00, 'rejected', '2024-03-18 13:50:02'),
(69, 39, 'Maggie', 1, 155.00, NULL, '2024-03-16 17:22:41'),
(75, 40, 'Colgate', 1, 264.00, NULL, '2024-03-21 11:32:41'),
(76, 40, 'Surf Excel', 1, 333.00, NULL, '2024-03-21 11:32:41');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
-- (See below for the actual view)
--
CREATE TABLE `view1` (
`o_id` int(222)
,`u_id` int(222)
,`title` varchar(222)
,`quantity` int(222)
,`price` decimal(10,2)
,`status` varchar(222)
,`date` timestamp
,`username` varchar(222)
);

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1`  AS SELECT `users_orders`.`o_id` AS `o_id`, `users_orders`.`u_id` AS `u_id`, `users_orders`.`title` AS `title`, `users_orders`.`quantity` AS `quantity`, `users_orders`.`price` AS `price`, `users_orders`.`status` AS `status`, `users_orders`.`date` AS `date`, `users`.`username` AS `username` FROM (`users` join `users_orders` on(`users`.`u_id` = `users_orders`.`u_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
