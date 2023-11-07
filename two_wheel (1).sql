-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 07:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `two_wheel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike_table`
--

CREATE TABLE `bike_table` (
  `bike_id` int(11) NOT NULL,
  `bike_name` varchar(100) NOT NULL,
  `bike_img` mediumtext NOT NULL,
  `model` varchar(100) NOT NULL,
  `cc_engine` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `price_day` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bike_table`
--

INSERT INTO `bike_table` (`bike_id`, `bike_name`, `bike_img`, `model`, `cc_engine`, `rating`, `price_day`, `status`) VALUES
(1, 'Royal Enfield', 'img/motorcycle-5481889_1280.jpg', 'Royal Enfield Classic 350', '350cc Engine', 5, 1250, 1),
(2, 'BMW MoterCycle', 'img/bmw-1313343_1280.jpg', 'BMW G310 RR', '400cc Engine', 5, 1300, 1),
(3, 'Dirt Bike', 'img/dirt-bike-209489_1280.jpg', 'Kawasaki KLX450R', '500cc Engine', 5, 2000, 1),
(4, 'Electric Scooter', 'img/electric-scooter-4253797_1280.jpg', 'TVS iQube', 'No cc Engine', 5, 350, 1),
(5, 'Harley Davidson', 'img/motorcycle-3781800_1280.jpg', 'Harley Davidson X440', '107cc Engine', 5, 1750, 1),
(6, 'Bajaj Avenger', 'img/wp3804316.jpg', 'Bajaj Avenger 220 Street', '160cc Engine', 5, 1500, 1),
(7, 'Electric Bicycle', 'img/ebike-5063056_1280.jpg', 'Gear Head Motors L 2.0 Series Electric Cycle', 'No cc Engine', 5, 300, 1),
(8, 'Mountain Bike', 'img/bike-1541037_1280.jpg', 'Giant Anthem Advanced Pro 29', 'No cc Engine', 5, 400, 1),
(9, 'Folding Bike', 'img/folding-4047804_1280.jpg', 'Dahon Mariner D8', 'No cc Engine', 5, 300, 1),
(10, 'Bajaj Pulsor', 'img/1195117-pulsor-250.jpg', 'Bajaj Pulsar 250 Dual Channel ABS', '124.4cc Engine', 5, 500, 1),
(11, 'Hero Splendor Plus', 'img/splendor-plus-xtec63fc780455aa5.jpg', 'hero Splendor Plus BS6', '97.2cc Engine', 5, 500, 1),
(12, 'Bajaj Plantina', 'img/bajaj-platina-110.jpg', 'Bajaj Platina 110 Drum', '102 cc Engine', 5, 550, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `bike_id`, `pickup_date`, `return_date`, `total_days`, `total_amount`, `time`, `date`) VALUES
(10000794, 24, 1, '2023-08-04', '2023-08-05', 1, 1250, '2023-08-03 06:20:11', '2023-08-03'),
(10000795, 2, 2, '2023-08-04', '2023-08-05', 1, 1300, '2023-08-03 10:47:31', '2023-08-03'),
(10000796, 2, 5, '2023-08-04', '2023-08-05', 1, 1750, '2023-08-03 11:32:09', '2023-08-03'),
(10000797, 2, 2, '2023-08-04', '2023-08-05', 1, 1300, '2023-08-03 11:40:40', '2023-08-03'),
(10000798, 25, 5, '2023-08-04', '2023-08-06', 2, 3500, '2023-08-03 15:49:57', '2023-08-03'),
(10000799, 12, 5, '2023-08-06', '2023-08-08', 2, 3500, '2023-08-05 09:17:13', '2023-08-05'),
(10000800, 12, 4, '2023-08-06', '2023-08-20', 14, 4900, '2023-08-05 11:05:04', '2023-08-05'),
(10000801, 26, 4, '2023-08-06', '2023-08-08', 2, 700, '2023-08-05 13:46:19', '2023-08-05'),
(10000802, 27, 10, '2023-08-06', '2023-08-08', 2, 1000, '2023-08-05 15:20:14', '2023-08-05'),
(10000803, 27, 3, '2023-08-06', '2023-08-07', 1, 2000, '2023-08-05 15:21:28', '2023-08-05'),
(10000804, 12, 6, '2023-08-10', '2023-08-13', 3, 4500, '2023-08-07 07:28:57', '2023-08-07'),
(10000805, 12, 2, '2023-08-10', '2023-08-17', 7, 9100, '2023-08-07 07:29:32', '2023-08-07'),
(10000806, 12, 9, '2023-08-09', '2023-08-19', 10, 3000, '2023-08-07 07:30:26', '2023-08-07'),
(10000807, 12, 3, '2023-08-10', '2023-08-13', 3, 6000, '2023-08-07 07:31:35', '2023-08-07'),
(10000808, 2, 5, '2023-08-08', '2023-08-10', 2, 3500, '2023-08-07 08:01:39', '2023-08-07'),
(10000809, 2, 6, '2023-08-08', '2023-08-09', 1, 1500, '2023-08-07 08:02:13', '2023-08-07'),
(10000810, 2, 4, '2023-08-10', '2023-08-11', 1, 350, '2023-08-09 07:13:01', '2023-08-09'),
(10000811, 12, 2, '2023-08-10', '2023-08-12', 2, 2600, '2023-08-09 11:01:43', '2023-08-09'),
(10000812, 12, 12, '2023-08-10', '2023-08-11', 1, 550, '2023-08-09 11:02:34', '2023-08-09'),
(10000813, 28, 5, '2023-08-12', '2023-08-15', 3, 5250, '2023-08-11 06:57:27', '2023-08-11'),
(10000814, 28, 6, '2023-08-12', '2023-08-16', 4, 6000, '2023-08-11 06:58:53', '2023-08-11'),
(10000815, 2, 4, '2023-08-15', '2023-08-17', 2, 700, '2023-08-13 19:03:43', '2023-08-14'),
(10000816, 29, 5, '2023-08-16', '2023-08-20', 4, 7000, '2023-08-15 08:30:49', '2023-08-15'),
(10000817, 2, 3, '2023-09-21', '2023-09-23', 2, 4000, '2023-09-20 15:57:39', '2023-09-20'),
(10000818, 1, 3, '2023-09-26', '2023-09-29', 3, 6000, '2023-09-25 16:12:58', '2023-09-25'),
(10000819, 2, 3, '2023-10-20', '2023-10-22', 2, 4000, '2023-10-19 06:16:08', '2023-10-19'),
(10000820, 2, 1, '2023-11-06', '2023-11-08', 2, 2500, '2023-11-05 18:13:48', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(244) NOT NULL,
  `time` time DEFAULT current_timestamp(),
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`payment_id`, `user_id`, `bike_id`, `amount`, `payment_mode`, `time`, `date`) VALUES
(100007909, 24, 1, 1250, 'Google Pay', '11:50:11', '2023-08-03'),
(100007910, 2, 2, 0, 'UPI', '16:16:00', '2023-08-03'),
(100007911, 2, 2, 1300, 'Phone pe', '16:17:31', '2023-08-03'),
(100007912, 2, 5, 1750, 'Paytm', '17:02:09', '2023-08-03'),
(100007913, 2, 2, 1300, 'Phone pe', '17:10:40', '2023-08-03'),
(100007914, 25, 5, 3500, 'Wallet', '21:19:57', '2023-08-03'),
(100007915, 12, 5, 3500, 'Wallet', '14:47:13', '2023-08-05'),
(100007916, 12, 4, 4900, 'Wallet', '16:35:04', '2023-08-05'),
(100007917, 26, 4, 700, 'Wallet', '19:16:19', '2023-08-05'),
(100007918, 27, 10, 1000, 'Google Pay', '20:50:14', '2023-08-05'),
(100007919, 27, 3, 2000, 'Wallet', '20:51:28', '2023-08-05'),
(100007920, 12, 6, 4500, 'Pay Pal', '12:58:57', '2023-08-07'),
(100007921, 12, 2, 9100, 'Paytm', '12:59:32', '2023-08-07'),
(100007922, 12, 9, 3000, 'Wallet', '13:00:26', '2023-08-07'),
(100007923, 12, 3, 6000, 'Paytm', '13:01:35', '2023-08-07'),
(100007924, 2, 5, 3500, 'Wallet', '13:31:39', '2023-08-07'),
(100007925, 2, 6, 1500, 'Wallet', '13:32:13', '2023-08-07'),
(100007926, 2, 4, 350, 'Wallet', '12:43:01', '2023-08-09'),
(100007927, 12, 2, 2600, 'Wallet', '16:31:43', '2023-08-09'),
(100007928, 12, 12, 550, 'Net Banking', '16:32:34', '2023-08-09'),
(100007929, 28, 5, 5250, 'Paytm', '12:27:27', '2023-08-11'),
(100007930, 28, 6, 6000, 'Wallet', '12:28:53', '2023-08-11'),
(100007931, 2, 4, 700, 'Phone pe', '00:33:43', '2023-08-14'),
(100007932, 29, 5, 7000, 'Paytm', '14:00:49', '2023-08-15'),
(100007933, 2, 3, 4000, 'Phone pe', '21:27:39', '2023-09-20'),
(100007934, 1, 3, 6000, 'Phone pe', '21:42:58', '2023-09-25'),
(100007935, 2, 3, 4000, 'Phone pe', '11:46:08', '2023-10-19'),
(100007936, 2, 1, 2500, 'Phone pe', '23:43:48', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `id_num` varchar(255) NOT NULL,
  `mobile_num` varchar(255) NOT NULL,
  `wallet_balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `id_num`, `mobile_num`, `wallet_balance`) VALUES
(1, 'Parul', 'parul123@gmail.com', '933636401278', '8505868062', 600),
(2, 'Parul Singh', 'parulsingh1301200@gmail.com', '933636401278', '8810230433', 1510),
(3, 'Nishant', 'nishant123@gmail.com', '933636401278', '1234567890', 1000),
(4, 'Pooja', 'pooja123@gmail.com', '933636401278', '9650880248', 1500),
(5, 'Bharat', 'bharat123@gmail.com', '933636401278', '9717499248', 2000),
(6, 'Vandana', 'vandana123@gmail.com', '933636401278', '8505868062', 500),
(7, 'Arpita', 'simran11234@gmail.com', '123456789', '1234567893', 950),
(9, 'Parul Singh', 'parulsingh13012002@gmail.com', '38949835034', '1234565431', 0),
(10, 'Ahana yadav', 'ahana2002@gmail.com', '324798-0184-', '1234567899', 0),
(11, 'Sidharth Mahlotra', 'sidharth1301@gmail.com', '933646501719', '9431302457', 0),
(12, 'Ravi Kumar', 'ravikumar123@gmail.com', '933646501719', '8810230434', 50),
(17, 'Shalini', 'shalini_123@gmail.com', '933646501719', '8810230439', 0),
(22, 'Priya Kumari', 'priya12345@gmail.com', '933646501719', '8810230431', 1050),
(23, 'Ashwani Kumar', 'ashwin149@gmail.com', '933646501719', '8810230436', 500),
(24, 'Neeti Ahuja', 'neeti123@gmail.com', '933646501719', '8505868065', 1000),
(25, 'Pooja Singh', 'singhvivek9271@gmail.com', '933646501719', '8820230433', 500),
(26, 'Nishant', 'sneha123@gmail.com', '933646501719', '8447730389', 300),
(27, 'Ishika Kashyap', 'ishika123@gmail.com', '933646501719', '9953506686', 3000),
(28, 'Dhruv Singh', 'singhtara@gmail.com', '933646501719', '8448958413', 1000),
(29, 'Killer Joker', 'rohan123@gmail.com', '933646501719', '6353289511', 600000);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transaction`
--

CREATE TABLE `wallet_transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_type` varchar(200) NOT NULL,
  `transaction_mode` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `current_balance` int(11) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_transaction`
--

INSERT INTO `wallet_transaction` (`transaction_id`, `user_id`, `transaction_type`, `transaction_mode`, `amount`, `current_balance`, `time`, `date`) VALUES
(10000905, 1, 'Credited', 'Google Pay', 100, 100, '11:42:27', '2023-08-03'),
(10000906, 2, 'Credited', 'Google Pay', 500, 500, '11:42:56', '2023-08-03'),
(10000907, 3, 'Credited', 'Phone pe', 1000, 1000, '11:43:09', '2023-08-03'),
(10000908, 4, 'Credited', 'Pay Pal', 1500, 1500, '11:44:03', '2023-08-03'),
(10000909, 5, 'Credited', 'Paytm', 2000, 2000, '11:44:44', '2023-08-03'),
(10000910, 6, 'Credited', 'Net Banking', 500, 500, '11:46:09', '2023-08-03'),
(10000911, 7, 'Credited', 'Pay Pal', 950, 950, '11:46:52', '2023-08-03'),
(10000912, 22, 'Credited', 'Paytm', 1050, 1050, '11:47:37', '2023-08-03'),
(10000913, 24, 'Credited', 'Phone pe', 1000, 1000, '11:50:38', '2023-08-03'),
(10000914, 2, 'Credited', 'Pay Pal', 200, 700, '17:12:26', '2023-08-03'),
(10000915, 25, 'Credited', 'Phone pe', 4000, 4000, '21:19:38', '2023-08-03'),
(10000916, 25, 'Debited', 'Wallet', 3500, 500, '21:19:57', '2023-08-03'),
(10000917, 12, 'Credited', 'Phone pe', 1000, 1000, '14:46:10', '2023-08-05'),
(10000918, 12, 'Credited', 'Google Pay', 3000, 4000, '14:47:06', '2023-08-05'),
(10000919, 12, 'Debited', 'Wallet', 3500, 500, '14:47:13', '2023-08-05'),
(10000920, 12, 'Credited', 'Google Pay', 5000, 5500, '16:34:07', '2023-08-05'),
(10000921, 12, 'Credited', 'Phone pe', 50, 5550, '16:34:17', '2023-08-05'),
(10000922, 12, 'Debited', 'Wallet', 4900, 650, '16:35:04', '2023-08-05'),
(10000923, 26, 'Credited', 'Phone pe', 1000, 1000, '19:15:30', '2023-08-05'),
(10000924, 26, 'Debited', 'Wallet', 700, 300, '19:16:19', '2023-08-05'),
(10000925, 27, 'Credited', 'Paytm', 5000, 5000, '20:50:48', '2023-08-05'),
(10000926, 27, 'Debited', 'Wallet', 2000, 3000, '20:51:28', '2023-08-05'),
(10000927, 12, 'Credited', 'Paytm', 3000, 3650, '13:00:19', '2023-08-07'),
(10000928, 12, 'Debited', 'Wallet', 3000, 650, '13:00:26', '2023-08-07'),
(10000929, 2, 'Credited', 'UPI', 5000, 5700, '13:31:15', '2023-08-07'),
(10000930, 2, 'Debited', 'Wallet', 3500, 2200, '13:31:39', '2023-08-07'),
(10000931, 2, 'Debited', 'Wallet', 1500, 700, '13:32:12', '2023-08-07'),
(10000932, 2, 'Credited', 'Paytm', 50, 750, '13:32:32', '2023-08-07'),
(10000933, 2, 'Debited', 'Wallet', 350, 400, '12:43:01', '2023-08-09'),
(10000934, 12, 'Credited', 'Phone pe', 2000, 2650, '16:30:33', '2023-08-09'),
(10000935, 12, 'Debited', 'Wallet', 2600, 50, '16:31:42', '2023-08-09'),
(10000936, 23, 'Credited', 'Phone pe', 500, 500, '12:04:44', '2023-08-10'),
(10000937, 28, 'Credited', 'Pay Pal', 7000, 7000, '12:27:52', '2023-08-11'),
(10000938, 28, 'Debited', 'Wallet', 6000, 1000, '12:28:53', '2023-08-11'),
(10000939, 29, 'Credited', 'Phone pe', 600000, 600000, '14:01:17', '2023-08-15'),
(10000940, 2, 'Credited', 'Paytm', 100, 500, '12:01:57', '2023-09-10'),
(10000941, 2, 'Credited', 'Net Banking', 5, 505, '21:28:18', '2023-09-20'),
(10000942, 1, 'Credited', 'Paytm', 500, 600, '21:42:18', '2023-09-25'),
(10000943, 2, 'Credited', 'UPI', 1000, 1505, '11:45:37', '2023-10-19'),
(10000944, 2, 'Credited', 'Paytm', 5, 1510, '23:45:44', '2023-11-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike_table`
--
ALTER TABLE `bike_table`
  ADD PRIMARY KEY (`bike_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bike_id` (`bike_id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bike_id` (`bike_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bike_table`
--
ALTER TABLE `bike_table`
  MODIFY `bike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000821;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100007937;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000945;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bike_table` (`bike_id`);

--
-- Constraints for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD CONSTRAINT `payment_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `payment_table_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bike_table` (`bike_id`);

--
-- Constraints for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD CONSTRAINT `wallet_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
