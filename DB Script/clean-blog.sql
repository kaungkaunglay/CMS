-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 03:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `password`, `created_at`) VALUES
(2, 'admin@kaungkaung.tech', 'admin', '$2y$10$RoXctjx9lPs4GQtutYUm/ejx00RVYJWhk7CgaR3HXNmn1GNV44P.O', '2023-01-11 15:18:58'),
(3, 'afdasd@gmail.com', 'fasdf', '$2y$10$4u/YpasGK.3Tc7lyECu04OOdVMm5X9rAWuCXHO/oSXRLbQedy6bky', '2023-01-11 16:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'TV', '2023-01-09 15:21:08'),
(2, 'sports', '2023-01-09 15:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(3) NOT NULL,
  `post_id` int(3) NOT NULL,
  `comment_user` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_comment` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment_user`, `comment`, `created_at`, `status_comment`) VALUES
(1, 3, '0', 'first comment', '2023-01-13 12:59:31', 1),
(2, 3, 'kaungkaung', 'second comment', '2023-01-13 13:02:23', 1),
(3, 3, 'kaungkaung', 'memory follow me left and right', '2023-01-13 13:31:57', 1),
(4, 3, 'kaungkaung', 'hello', '2023-01-13 13:32:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `category_id` int(3) NOT NULL,
  `img` varchar(200) NOT NULL,
  `user_id` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `body`, `status`, `category_id`, `img`, `user_id`, `created_at`, `username`) VALUES
(1, 'The lion in the kitchen & soliders', 'The lion', 'Efficiently drive open-source interfaces through multimedia based opportunities. Assertively productivate excellent web services rather than covalent potentialities. Completely utilize covalent solutions through focused solutions. Uniquely.\r\nEfficiently drive open-source interfaces through multimedia based opportunities. Assertively productivate excellent web services rather than covalent potentialities. Completely utilize covalent solutions through focused solutions. Uniquely.Efficiently drive open-source interfaces through multimedia based opportunities. Assertively productivate excellent web services rather than covalent potentialities. Completely utilize covalent solutions through focused solutions. Uniquely.', 0, 2, 'clouds.jpg', '2', '2023-01-08 07:48:09', 'aungkhantzin'),
(3, 'PHP', 'About PHP', 'Completely disseminate client-focused content without multifunctional e-business. Synergistically foster B2C systems rather than leading-edge interfaces. Monotonectally transform state of the art methodologies with cooperative \"outside the box\" thinking. Objectively aggregate enabled expertise vis-a-vis resource maximizing niche markets. Collaboratively initiate seamless value vis-a-vis an expanded array of human capital.\r\n\r\nDistinctively evisculate just in time architectures rather than future-proof customer service. Conveniently scale collaborative.', 1, 1, '9apM4GZWmgPnD_Z4xuE7MTO6+s65keWcIusmxdzJpaO1fqzFndDwMhvgGzaHrsP7gTlkdTveJ1nAmE6FPnisip9ddV6cqdw96aZJ+_fkU7A0qms92PI95+RRcz4yZFKj_8dntzXNkoYiGUn71aLIwwyn7yHH70GqUm+TZ1usKJ1hYRogcbJY_WWWlrpkfamV_FWvG7SC', '2', '2023-01-08 14:53:59', 'admin'),
(4, 'Javascript', 'About Javascript', 'Completely disseminate client-focused content without multifunctional e-business. Synergistically foster B2C systems rather than leading-edge interfaces. Monotonectally transform state of the art methodologies with cooperative \"outside the box\" thinking. Objectively aggregate enabled expertise vis-a-vis resource maximizing niche markets. Collaboratively initiate seamless value vis-a-vis an expanded array of human capital.\r\n\r\nDistinctively evisculate just in time architectures rather than future-proof customer service. Conveniently scale collaborative.', 1, 2, '08CnTkZop4XoP3kxZC1W72FB24wr_t2zhhDddXHcpeWEgiM9W60g4freHaLv1hAyQu1NPZ4_lIeEpOePdtWGXuQfJsMdcZo6yi4nI4vAHRkYXWgcrRK9lb6vLl87OCaC5gQ5PaX29pBHx9qJ4akk3zJVJaZVpJftzvFhfeLRcDxBebIe9x0bWekOJHDy0_kHZtGUCmx6', '2', '2023-01-08 14:54:29', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'aungkhantzin881@gmail.com', 'aungkhantzin', 'Octoberkk2810#', '2023-01-07 02:56:58'),
(2, 'admin@kaungkaung.tech', 'kaungkaung', '$2y$10$RoXctjx9lPs4GQtutYUm/ejx00RVYJWhk7CgaR3HXNmn1GNV44P.O', '2023-01-07 02:59:58'),
(3, 'admin@gmail.com', 'admin', '$2y$10$vazwccOcAqICuiVPRLCH5.lIjW6lOQQ76PcgyYITAmccdQ80cFsIK', '2023-01-07 03:02:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
