-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 11:09 PM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bkd_table`
--

CREATE TABLE `bkd_table` (
  `booking_id` int(10) NOT NULL,
  `table_id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booked_date` date NOT NULL,
  `booked_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booked_rooms`
--

CREATE TABLE `booked_rooms` (
  `booking_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(5) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_rooms`
--

INSERT INTO `booked_rooms` (`booking_id`, `user_id`, `room_id`, `from_date`, `to_date`) VALUES
(48, 39, 34, '2023-10-20', '2023-10-24'),
(50, 37, 7, '2023-10-12', '2023-10-16'),
(54, 39, 10, '2023-10-05', '2023-10-10'),
(61, 14, 13, '2023-10-04', '2023-10-07'),
(62, 14, 4, '2023-10-26', '2023-10-28'),
(63, 39, 35, '2023-10-18', '2023-10-20'),
(64, 39, 28, '2023-10-16', '2023-10-18'),
(65, 39, 31, '2023-10-25', '2023-10-27'),
(66, 39, 4, '2023-10-23', '2023-10-25'),
(67, 39, 1, '2023-10-23', '2023-10-27'),
(68, 39, 2, '2023-10-25', '2023-10-27'),
(69, 39, 3, '2023-10-25', '2023-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tables_quantity` int(3) NOT NULL,
  `booking_price` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `tables_quantity`, `booking_price`) VALUES
(1, 'Ak Restaurant', 100, '10'),
(2, 'The Delicious', 70, '8'),
(3, 'The Well Cafe', 50, '5');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `guests_nb` int(2) NOT NULL,
  `king_beds` int(2) NOT NULL,
  `single_beds` int(2) NOT NULL,
  `floor` int(2) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `type`, `guests_nb`, `king_beds`, `single_beds`, `floor`, `price`) VALUES
(1, 0, 'classic', 1, 0, 1, 1, 50),
(2, 1, 'classic', 1, 0, 1, 1, 50),
(3, 2, 'classic', 1, 0, 1, 1, 50),
(4, 10, 'classic', 2, 1, 0, 1, 75),
(5, 11, 'classic', 2, 1, 0, 1, 75),
(6, 12, 'classic', 2, 1, 0, 1, 75),
(7, 20, 'classic', 2, 0, 2, 2, 85),
(8, 21, 'classic', 2, 0, 2, 2, 85),
(9, 22, 'classic', 2, 0, 2, 2, 85),
(10, 30, 'superior', 2, 1, 0, 3, 100),
(11, 31, 'superior', 2, 1, 0, 3, 100),
(12, 32, 'superior', 2, 1, 0, 3, 100),
(13, 40, 'superior', 2, 0, 2, 4, 100),
(14, 41, 'superior', 2, 0, 2, 4, 100),
(15, 42, 'superior', 2, 0, 2, 4, 100),
(16, 50, 'superior', 3, 1, 1, 5, 120),
(17, 51, 'superior', 3, 1, 1, 5, 120),
(18, 52, 'superior', 3, 1, 1, 5, 120),
(19, 60, 'superior', 3, 0, 3, 6, 120),
(20, 61, 'superior', 3, 0, 3, 6, 120),
(21, 62, 'superior', 3, 0, 3, 6, 120),
(22, 70, 'deluxe', 2, 1, 0, 4, 140),
(23, 71, 'deluxe', 2, 1, 0, 4, 140),
(24, 72, 'deluxe', 2, 1, 0, 4, 140),
(25, 80, 'deluxe', 2, 0, 2, 5, 150),
(26, 81, 'deluxe', 2, 0, 2, 5, 150),
(27, 82, 'deluxe', 2, 0, 2, 5, 150),
(28, 90, 'deluxe', 3, 1, 1, 6, 170),
(29, 91, 'deluxe', 3, 1, 1, 6, 170),
(30, 92, 'deluxe', 3, 1, 1, 6, 170),
(31, 100, 'deluxe', 3, 0, 3, 7, 180),
(32, 101, 'deluxe', 3, 0, 3, 7, 180),
(33, 102, 'deluxe', 3, 0, 3, 7, 180),
(34, 110, 'deluxe', 4, 1, 2, 8, 200),
(35, 111, 'deluxe', 4, 1, 2, 8, 200),
(36, 112, 'deluxe', 4, 1, 2, 8, 200),
(37, 120, 'deluxe', 4, 0, 4, 9, 215),
(38, 121, 'deluxe', 4, 0, 4, 9, 215),
(39, 122, 'deluxe', 4, 0, 4, 9, 215);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) NOT NULL,
  `number` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `with_google` varchar(5) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `fname`, `phone`, `email`, `with_google`, `password`, `user_code`) VALUES
(1, 'kassem darwish', '+971 4 345 4367', 'ali12@gmail.com', 'false', 'qwer1234?', ''),
(14, 'yousef', '44444444', 'yousef@gm', 'false', 'zaqxsw09876', ''),
(15, 'ghassan', '2237674', 'ghassan@gm', 'false', 'zxcvbnm123', ''),
(17, 'yaakob', '899998', 'yaakob@gm', 'false', 'zzzznnnmm76', ''),
(37, 'Joe Ap', '', 'uii32@gmail.com', 'true', '', '104205678374470632851'),
(39, 'Joeeee', '34635535345', 'aabb12@gmail.com', 'true', '', '118124185248861835097'),
(40, 'adam', '354326', 'adam@gm', 'false', 'hfuei385434', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bkd_table`
--
ALTER TABLE `bkd_table`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bkd_table`
--
ALTER TABLE `bkd_table`
  ADD CONSTRAINT `bkd_table_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `bkd_table_ibfk_3` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);

--
-- Constraints for table `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD CONSTRAINT `booked_rooms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`),
  ADD CONSTRAINT `booked_rooms_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
