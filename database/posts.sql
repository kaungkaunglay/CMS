-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 04:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `user_id` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `body`, `img`, `user_id`, `created_at`, `username`) VALUES
(1, 'The lion in the kitchen & soliders', 'The lion', 'Efficiently drive open-source interfaces through multimedia based opportunities. Assertively productivate excellent web services rather than covalent potentialities. Completely utilize covalent solutions through focused solutions. Uniquely.\r\nEfficiently drive open-source interfaces through multimedia based opportunities. Assertively productivate excellent web services rather than covalent potentialities. Completely utilize covalent solutions through focused solutions. Uniquely.Efficiently drive open-source interfaces through multimedia based opportunities. Assertively productivate excellent web services rather than covalent potentialities. Completely utilize covalent solutions through focused solutions. Uniquely.', 'clouds.jpg', '2', '2023-01-08 07:48:09', ''),
(3, 'PHP', 'About PHP', 'Completely disseminate client-focused content without multifunctional e-business. Synergistically foster B2C systems rather than leading-edge interfaces. Monotonectally transform state of the art methodologies with cooperative \"outside the box\" thinking. Objectively aggregate enabled expertise vis-a-vis resource maximizing niche markets. Collaboratively initiate seamless value vis-a-vis an expanded array of human capital.\r\n\r\nDistinctively evisculate just in time architectures rather than future-proof customer service. Conveniently scale collaborative.', '9apM4GZWmgPnD_Z4xuE7MTO6+s65keWcIusmxdzJpaO1fqzFndDwMhvgGzaHrsP7gTlkdTveJ1nAmE6FPnisip9ddV6cqdw96aZJ+_fkU7A0qms92PI95+RRcz4yZFKj_8dntzXNkoYiGUn71aLIwwyn7yHH70GqUm+TZ1usKJ1hYRogcbJY_WWWlrpkfamV_FWvG7SC', '2', '2023-01-08 14:53:59', 'admin'),
(4, 'Javascript', 'About Javascript', 'Completely disseminate client-focused content without multifunctional e-business. Synergistically foster B2C systems rather than leading-edge interfaces. Monotonectally transform state of the art methodologies with cooperative \"outside the box\" thinking. Objectively aggregate enabled expertise vis-a-vis resource maximizing niche markets. Collaboratively initiate seamless value vis-a-vis an expanded array of human capital.\r\n\r\nDistinctively evisculate just in time architectures rather than future-proof customer service. Conveniently scale collaborative.', '08CnTkZop4XoP3kxZC1W72FB24wr_t2zhhDddXHcpeWEgiM9W60g4freHaLv1hAyQu1NPZ4_lIeEpOePdtWGXuQfJsMdcZo6yi4nI4vAHRkYXWgcrRK9lb6vLl87OCaC5gQ5PaX29pBHx9qJ4akk3zJVJaZVpJftzvFhfeLRcDxBebIe9x0bWekOJHDy0_kHZtGUCmx6', '2', '2023-01-08 14:54:29', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
