-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 09:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `disabled` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission`, `disabled`) VALUES
(1, 1, 'view_dashbord', 0),
(2, 1, 'post_request', 1),
(3, 7, 'view_dashbord', 1),
(4, 7, 'post_request', 1),
(5, 7, 'view_requests', 1),
(6, 6, 'view_dashbord', 1),
(7, 6, 'post_request', 1),
(8, 6, 'view_requests', 1),
(9, 5, 'view_dashbord', 1),
(10, 5, 'post_request', 1),
(11, 5, 'view_requests', 1),
(12, 4, 'view_dashbord', 1),
(13, 4, 'post_request', 1),
(14, 4, 'view_requests', 1),
(15, 7, 'view_user', 1),
(16, 7, 'delete_user', 1),
(17, 7, 'edit_user', 1),
(18, 7, 'view_roles', 1),
(19, 7, 'view_users', 1),
(20, 1, 'view_tasks', 0),
(21, 1, 'assign_task', 1),
(22, 1, 'view_profile', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(40) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `disabled`) VALUES
(1, 'user', 0),
(2, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `assigned_by` varchar(255) NOT NULL,
  `task_description` varchar(1000) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `assigned_by`, `task_description`, `start_time`, `end_time`, `assigned_to`, `status`, `date`) VALUES
(1, 'coding', 'admin', 'coding task', '2024-02-08 00:00:00', '2024-02-23 00:00:00', '8', 'Pending', '2024-02-10 21:49:53'),
(2, 'Final', 'admin', 'Final', '2024-02-15 00:00:00', '2024-02-29 00:00:00', '8', 'Pending', '2024-02-10 22:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp(6) NULL DEFAULT NULL,
  `about` varchar(225) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `image`, `date`, `about`, `lastname`, `country`, `address`, `phone`, `slug`, `facebook_link`, `twitter_link`, `instagram_link`) VALUES
(1, 'Jack', 'jack@gmail.com', 2, 'Jack', 'uploads/images/1707740145BMW-Gina-Project-Opened-Doors-bmw-wallpapers-car-wallpapers-1920x1080.jpg', '2022-10-03 05:01:58.000000', 'Try and fail , but remember one day everything and i mean everything will be alright ,take it ease', 'Guru', 'Kenya', 'Kabarak University, Nakuru', '0745378674', NULL, '', '', ''),
(2, 'Dennis', 'dennis@gmail.com', 1, 'dennis', NULL, '2022-10-03 05:02:14.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'John', 'john@gmail.com', 1, 'John', NULL, '2022-10-03 05:23:12.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Elvis', 'elvis@gmail.com', 1, '1234', NULL, '2023-01-25 12:10:23.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Linda', 'linda@gmail.com', 2, '1234J', NULL, '2023-01-29 15:47:06.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'lonpach', 'mahlihep@gmail.com', 1, 'Mahlonlon@7', NULL, '2023-01-31 11:12:58.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Evans', 'evans@gmail.com', 1, '1234', NULL, '2023-02-04 18:44:20.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Oriel', 'oriel@gmail.com', 1, '1234', NULL, '2023-02-06 17:00:38.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'gld', 'kamaugladys@gmail.com', 1, '12354G', 'uploads/images/1677253877agri3.jpg', '2023-02-24 04:47:08.000000', 'marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing marketing ', 'Kamau', 'Kenya', 'kabarak', '0712345678', NULL, '', '', ''),
(11, 'Bezoes', 'jackmutiso37@gmail.com', 1, 'jack123', NULL, '2024-02-03 20:11:06.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Cesur', 'cesurelvis@gmail.com', 1, 'Elvis123', NULL, '2024-02-09 07:37:25.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permission`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `date` (`date`),
  ADD KEY `phone` (`phone`),
  ADD KEY `address` (`address`),
  ADD KEY `country` (`country`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `about` (`about`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
