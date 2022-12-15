-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 07:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriofficer`
--
CREATE DATABASE IF NOT EXISTS `agriofficer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `agriofficer`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `create_at`) VALUES
(1, 1, 'Potato Cultivation', 'Please be aware there is ongoing fungus attack on potato cultivation. Get some precautions.', '2022-12-15 07:20:31'),
(2, 1, 'qwqewq', 'asffdgfh', '2022-12-15 09:15:39'),
(3, 2, 'asdfsd', 'asfsdgdhgdf', '2022-12-15 09:19:01'),
(4, NULL, 'abc', 'asahjhsajk', '2022-12-15 14:36:54'),
(5, NULL, 'iij', 'ygy', '2022-12-15 16:07:25'),
(6, NULL, 'hfuhu', 'hbbewf', '2022-12-15 16:08:48'),
(7, 1, 'sdfsg', 'sdgdfh', '2022-12-15 17:25:37'),
(8, 3, 'asdasd', 'dsgsdfhgfd', '2022-12-15 21:05:22'),
(9, 1, 'asda', 'sdffdsfdfgsd', '2022-12-15 23:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `create_at`) VALUES
(1, 'Rumindu', 'rumindu@gmail.com', '$2y$10$9lKbazkA169EPEIvX2JR4OQYgZOoZhExoKOtXhQ20319u73eAr4uO', '2022-12-15 07:18:09'),
(2, 'Kavishka', 'kavishka@gmail.com', '$2y$10$Nz5dnqDhbQ9cOp5oTKK6OeuRAZ9i/gLo/i4Wyg7DGUUqyYr1bh5WW', '2022-12-15 07:21:24'),
(3, 'sandul', 'sandul@gmail.com', '$2y$10$3.APLqLEg5GTfL5loB6Kk.F7E78mcxqr3XegApeD78LP2v1tDvjuy', '2022-12-15 18:07:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts`
-- (See below for the actual view)
--
CREATE TABLE `v_posts` (
`post_id` int(11)
,`user_id` int(11)
,`user_name` varchar(255)
,`title` varchar(255)
,`body` text
,`post_created_at` datetime
,`user_created_at` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_posts`
--
DROP TABLE IF EXISTS `v_posts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts`  AS SELECT `posts`.`id` AS `post_id`, `users`.`id` AS `user_id`, `users`.`name` AS `user_name`, `posts`.`title` AS `title`, `posts`.`body` AS `body`, `posts`.`create_at` AS `post_created_at`, `users`.`create_at` AS `user_created_at` FROM (`posts` join `users` on(`posts`.`user_id` = `users`.`id`)) ORDER BY `posts`.`create_at` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
