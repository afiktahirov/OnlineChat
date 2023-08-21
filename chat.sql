-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 03:08 PM
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
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 2, 1, 'salam ', '2023-06-17 17:02:08'),
(2, 1, 2, 'aleykum', '2023-06-17 17:02:16'),
(3, 1, 2, 'aleykum 2', '2023-06-17 17:02:27'),
(4, 6, 1, 'Salam', '2023-06-17 17:02:49'),
(5, 1, 2, 'asdad', '2023-06-17 17:02:54'),
(6, 1, 2, 'asdsad', '2023-06-17 17:02:55'),
(7, 1, 2, 'asdasdsa', '2023-06-17 17:02:56'),
(8, 1, 2, 'asdasdsa', '2023-06-17 17:02:58'),
(9, 1, 2, 'asdsad', '2023-06-17 17:02:59'),
(10, 1, 2, 'asda', '2023-06-17 17:03:37'),
(11, 1, 2, 'asdsa', '2023-06-17 17:04:18'),
(12, 1, 2, 'asdasd', '2023-06-17 17:04:19'),
(13, 1, 2, 'asdasd', '2023-06-17 17:04:19'),
(14, 1, 2, 'asdasd', '2023-06-17 17:04:20'),
(15, 1, 2, 'asdasdas', '2023-06-17 17:04:20'),
(16, 1, 2, 'asdasdas', '2023-06-17 17:04:21'),
(17, 1, 2, 'dasdasd', '2023-06-17 17:04:21'),
(18, 1, 2, 'asdasd', '2023-06-17 17:04:22'),
(19, 1, 2, 'asdasd', '2023-06-17 17:04:22'),
(20, 1, 2, 'asdasd', '2023-06-17 17:04:23'),
(21, 1, 2, 'asdasd', '2023-06-17 17:04:23'),
(22, 1, 2, 'sdsad', '2023-06-17 17:04:23'),
(23, 1, 2, 'sdsdsdsd', '2023-06-17 17:04:27'),
(24, 1, 2, 'asdasdasd', '2023-06-17 17:04:30'),
(25, 1, 2, 'asdasd\\', '2023-06-17 17:04:31'),
(26, 1, 5, 'salam', '2023-06-17 17:05:26'),
(27, 1, 4, 'asdasd', '2023-06-17 17:05:37'),
(28, 6, 1, '11111', '2023-06-17 17:06:17'),
(29, 6, 1, '', '2023-06-17 17:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`) VALUES
(1, 'Nijat', 'Mammadli', 'laedriman', '$2y$10$gJtr/o4eVaZ4AQhLTwd96uH2E2.Jq7NzldJzEQd8lpXl.u5/XJ2iW'),
(2, 'Ramin', 'Ağabəyov', 'ramo', '$2y$10$W7/JXTl17KTSRzAilG1GRe58OC92rx1JG7mip41vhGHoeXBOYIuve'),
(3, 'Urfan', 'Vazirov', 'urfan123', '$2y$10$GpzNf/82Hd.jSvabB5XHquJWhfQraCtuRprFwxcIY/OUVriWWJYUG'),
(4, 'Salihat', 'Kutlasova', 'iboseli', '$2y$10$2TzV0DU/DREknQNdRA2H8uMjOi0W6.sB51KeRystGCQoSCHJ3LZpq'),
(5, 'Ramin', 'Aliyev', 'ramin111', '$2y$10$dse/lAP8.ff1hurH/3Tkjuxl6sq1fxmuEcIO7OxXUu9D7DxCw96A.'),
(6, 'Afik', 'Tahirov', 'afik22', '$2y$10$pkyMgdX8qDoSx9L0F6K4j.RfNAum.fT25EB76NeXw9Cu0n/snXEyi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
