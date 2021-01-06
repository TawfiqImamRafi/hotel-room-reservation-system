-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 06:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guest_id` int(11) NOT NULL,
  `check_in_time` varchar(255) NOT NULL,
  `check_out_time` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `issue_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `admin_id`, `user_id`, `guest_id`, `check_in_time`, `check_out_time`, `status`, `sub_total`, `vat`, `discount`, `grand_total`, `issue_date`) VALUES
(14, 2, NULL, 23, '01-04-2021', '01-05-2021', 1, '12000', '1800', '200', '13600', '2021-01-04 00:28:14'),
(15, 2, NULL, 24, '01-04-2021', '01-05-2021', 1, '12000', '1800', '200', '13600', '2021-01-04 17:32:35'),
(16, 2, NULL, 25, '01-04-2021', '01-05-2021', 1, '24000', '3600', '1200', '26400', '2021-01-04 17:35:06'),
(17, 2, NULL, 26, '', '', 1, '', '', '', '', '2021-01-05 17:18:58'),
(18, 2, NULL, 27, '01-05-2021', '01-07-2021', 1, '24000', '3600', '200', '27400', '2021-01-05 17:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `booking_room_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`booking_room_id`, `book_id`, `room_id`) VALUES
(1, 14, 1),
(2, 15, 1),
(3, 16, 1),
(4, 16, 2),
(5, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_age` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `guest_id`, `member_name`, `member_age`, `type`) VALUES
(1, 23, 'jon', 40, 'adult'),
(2, 23, 'ron', 12, 'child'),
(3, 24, 'pasha vai', 40, 'adult'),
(4, 24, 'kuddus', 54, 'adult'),
(5, 24, 'sotu', 12, 'child'),
(6, 25, 'momin', 54, 'adult'),
(7, 25, 'motu', 13, 'child'),
(8, 27, 'anna', 40, 'adult'),
(9, 27, 'bella', 12, 'child');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `book_id`, `paid`, `due`, `method`, `created_at`) VALUES
(1, 14, '4000', '9600', 'Cash', '2021-01-04 00:28:14'),
(2, 15, '4000', '9600', 'Bkash', '2021-01-04 17:32:35'),
(3, 16, '13000', '13400', 'Cash', '2021-01-04 17:35:06'),
(5, 18, '7000', '20400', 'Cash', '2021-01-05 17:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(16) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`) VALUES
(1, 'rafi', 'rafi@gmail.com', '01521333257', '202cb962ac59075b964b07152d234b70'),
(2, 'tawfiq', 'tawfiq@gmail.com', '122323435443', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(2, 'Single Bed', '2020-12-02 17:59:40'),
(16, 'Double Bed', '2020-12-03 16:27:45'),
(17, 'Large Room', '2020-12-03 16:27:54'),
(20, 'Small Room', '2020-12-06 16:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_facilities`
--

CREATE TABLE `tb_facilities` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_facilities`
--

INSERT INTO `tb_facilities` (`facility_id`, `facility_name`, `created_at`) VALUES
(1, 'Mini Bar', '2020-12-03 17:34:40'),
(2, 'Personal Swimming Pool', '2020-12-03 17:37:17'),
(4, 'Mini Refrigerator ', '2020-12-06 16:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guests`
--

CREATE TABLE `tb_guests` (
  `guest_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `guests_name` varchar(255) DEFAULT NULL,
  `guests_phone` varchar(255) DEFAULT NULL,
  `guests_address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guests`
--

INSERT INTO `tb_guests` (`guest_id`, `user_id`, `adult`, `child`, `guests_name`, `guests_phone`, `guests_address`, `created_at`) VALUES
(23, NULL, 1, 1, 'tawfiq', '12345678', 'xcvbn', '2021-01-04 00:28:14'),
(24, NULL, 2, 1, 'Samir', '12345678', 'Gazipur', '2021-01-04 17:32:35'),
(25, NULL, 1, 1, 'ramim', '4759847894', 'dhaka', '2021-01-04 17:35:06'),
(26, NULL, 0, 0, '', '', '', '2021-01-05 17:18:58'),
(27, NULL, 1, 1, 'mimi', '725662564', 'mati', '2021-01-05 17:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rooms`
--

CREATE TABLE `tb_rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rooms`
--

INSERT INTO `tb_rooms` (`room_id`, `room_name`, `cat_id`, `room_type_id`, `facilities`, `details`, `price`, `created_at`) VALUES
(1, 'RM-102', 17, 6, '[\"Mini Bar\",\"Personal Swimming Pool\",\"Mini Refrigerator \"]', 'Attached pool', '12000', '2020-12-10 16:39:52'),
(2, 'RM-103', 17, 6, '[\"Personal Swimming Pool\",\"Mini Refrigerator \"]', 'Attached pool', '12000', '2020-12-13 15:46:29'),
(3, 'RM-101', 16, 2, '[\"Personal Swimming Pool\",\"Mini Refrigerator \"]', 'Sea View', '13000', '2020-12-13 17:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_types`
--

CREATE TABLE `tb_room_types` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_room_types`
--

INSERT INTO `tb_room_types` (`room_type_id`, `room_type_name`, `created_at`) VALUES
(2, 'Air Condition', '2020-12-03 15:57:13'),
(6, 'Non Air Condition', '2020-12-03 16:18:09'),
(10, 'test type 12', '2020-12-08 17:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(16) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`booking_room_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_phone` (`admin_phone`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tb_facilities`
--
ALTER TABLE `tb_facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_name` (`room_name`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `tb_room_types`
--
ALTER TABLE `tb_room_types`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`user_email`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `booking_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_facilities`
--
ALTER TABLE `tb_facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_guests`
--
ALTER TABLE `tb_guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_room_types`
--
ALTER TABLE `tb_room_types`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`guest_id`) REFERENCES `tb_guests` (`guest_id`);

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `booking_room_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`),
  ADD CONSTRAINT `booking_room_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `tb_rooms` (`room_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `tb_guests` (`guest_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`);

--
-- Constraints for table `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD CONSTRAINT `tb_guests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`);

--
-- Constraints for table `tb_rooms`
--
ALTER TABLE `tb_rooms`
  ADD CONSTRAINT `tb_rooms_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tb_categories` (`cat_id`),
  ADD CONSTRAINT `tb_rooms_ibfk_2` FOREIGN KEY (`room_type_id`) REFERENCES `tb_room_types` (`room_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
