-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 12:56 PM
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
-- Database: `palengke_go`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `stall_holder_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `stall_holder_id`, `stall_id`, `section_id`, `created_on`) VALUES
(14, 'Talong', '', 13, 1, 118, '2023-04-20'),
(15, 'Talong', '', 16, 4, 121, '2023-04-20'),
(16, 'Cabbage', '', 16, 3, 119, '2023-04-20'),
(17, 'Magic Sarap', '', 16, 3, 119, '2023-04-20'),
(18, 'Datu Puti Toyo', '', 16, 3, 119, '2023-04-20'),
(19, 'Sibuyas', '', 16, 3, 119, '2023-04-20'),
(20, 'Kamatis', '', 16, 3, 119, '2023-04-20'),
(21, 'Bawang', '', 16, 3, 119, '2023-04-20'),
(22, 'Carrots', '', 16, 3, 119, '2023-04-20'),
(23, 'Silver Swan Sukang Puti', '', 16, 3, 119, '2023-04-20'),
(24, 'Magic Sarap', '', 16, 4, 121, '2023-04-20'),
(25, 'Labanos', '', 16, 4, 121, '2023-04-20'),
(26, 'Ampalaya', '', 16, 4, 121, '2023-04-20'),
(27, 'Pechay', '', 16, 4, 121, '2023-04-20'),
(28, 'Kamatis', '', 16, 4, 121, '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `stalls_owned`
--

CREATE TABLE `stalls_owned` (
  `id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `stall_holder_id` int(11) NOT NULL,
  `stall_name` varchar(200) NOT NULL,
  `stall_photo` varchar(255) NOT NULL,
  `stall_status` int(1) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `unassigned_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stalls_owned`
--

INSERT INTO `stalls_owned` (`id`, `stall_id`, `stall_holder_id`, `stall_name`, `stall_photo`, `stall_status`, `created_on`, `unassigned_on`) VALUES
(1, 118, 13, 'Ron  P. San Juan\'s Stall # 1', 'stall_photo_1681931117_3401.jpeg', 1, '2023-04-19', '2023-04-20'),
(3, 119, 16, 'Aaron Vince A. San Juan\'s Stall #1', 'stall_photo_1681971484_8197.jpeg', 1, '2023-04-20', '2023-04-20'),
(4, 121, 16, 'Aaron Vince A. San Juan\'s Stall #2', 'stall_photo_1681976227_3841.jpeg', 1, '2023-04-20', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `stall_holders`
--

CREATE TABLE `stall_holders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` text NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `religion` varchar(150) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `spouse_name` varchar(150) NOT NULL,
  `spouse_occupation` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `educational_attainment` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT 3,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `act` varchar(20) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stall_holders`
--

INSERT INTO `stall_holders` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `date_of_birth`, `place_of_birth`, `contact_number`, `religion`, `marital_status`, `spouse_name`, `spouse_occupation`, `gender`, `educational_attainment`, `email`, `username`, `password`, `valid_id`, `user_type`, `status`, `act`, `activate_code`, `reset_code`, `created_on`) VALUES
(13, 'Ron ', 'Pablo', 'San Juan', 'A108 Adam Street, New York, NY 535022', '2000-06-17', 'Novaliches, Quezon City', '09682267445', 'Roman Catholic', 'Single', '', '', 'Male', 'Tertiary', 'ronvincent.sanjuan_rvsj@yahoo.com', 'sitc_sanjuan', '$2y$10$ZYuht29KLUnJp0CuaVCdfO.LEVwTOdZta/yuIcySUalkA281cdOmG', 'valid_id__1681922832_1854.jpeg', 3, '1', '1', '', '', '2023-04-19'),
(15, 'Queen Amalia Mariz', 'Abeabe', 'Abella', 'A108 Adam Street, New York, NY 535022', '2000-06-17', 'Molino, Cavite', '09682267445', 'Dating Daan', 'Single', '', '', 'LGBTQ', 'ALS', 'queenamaliamariz123@gmail.com', 'queen123', '$2y$10$dVewNARIIZyk2VpNKGD7w.GoEmRQtiAEZJozXZ0QejvhnlhHvTnAy', 'valid_id__1681920101_7052.jpeg', 3, '0', '', '', '', '2023-04-19'),
(16, 'Aaron Vince', 'Abella', 'San Juan', 'Lot 4 Blk 25 Fiesta Communities, Balon-Anito, Mariveles, Bataan', '2000-06-17', 'Molino, Cavite', '09682267445', 'Dating Daan', 'Married', '', '', 'Male', 'Tertiary', 'aaronvincesanjuan@gmail.com', 'aaron_sanjuan123', '$2y$10$rfnQubS/k1MQx/DOzjuDKuNUBqBKoC9OMbj89VoaShkitdEhaR2V6', 'valid_id__1681927232_9780.jpeg', 3, '1', '1', '', '', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `stall_section`
--

CREATE TABLE `stall_section` (
  `id` int(11) NOT NULL,
  `stall_id` varchar(20) NOT NULL,
  `section` enum('Dry Goods','Dry Goods Annex Section','Grocery Section','Grocery Section Extension','Fish Section','Meat Section','Fruit Section','Vegetable Section','Fruit and Vegetable Section Extension','Processed Foods Section','Carinderia Section','Admin Office') NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stall_section`
--

INSERT INTO `stall_section` (`id`, `stall_id`, `section`, `timestamp`) VALUES
(1, 'DG-1-A', 'Dry Goods', '2023-01-23 22:03:10'),
(2, 'DG-1-B', 'Dry Goods', '2023-01-23 22:03:10'),
(3, 'DG-1-C', 'Dry Goods', '2023-01-23 22:03:10'),
(4, 'DG-1-D', 'Dry Goods', '2023-01-23 22:03:10'),
(5, 'DG-1-E', 'Dry Goods', '2023-01-23 22:03:10'),
(6, 'DG-2-A', 'Dry Goods', '2023-01-23 22:04:27'),
(7, 'DG-2-B', 'Dry Goods', '2023-01-23 22:04:27'),
(8, 'DG-2-C', 'Dry Goods', '2023-01-23 22:04:27'),
(9, 'DG-2-D', 'Dry Goods', '2023-01-23 22:04:27'),
(10, 'DG-3-A', 'Dry Goods', '2023-01-23 22:07:26'),
(11, 'DG-3-B', 'Dry Goods', '2023-01-23 22:07:26'),
(12, 'DG-3-C', 'Dry Goods', '2023-01-23 22:07:26'),
(13, 'DG-4-A', 'Dry Goods', '2023-01-23 22:07:26'),
(14, 'DG-4-B', 'Dry Goods', '2023-01-23 22:07:26'),
(15, 'DG-4-C', 'Dry Goods', '2023-01-23 22:07:26'),
(16, 'DG-4-D', 'Dry Goods', '2023-01-23 22:07:26'),
(17, 'DG-4-E', 'Dry Goods', '2023-01-23 22:07:26'),
(18, 'DG-5-A', 'Dry Goods', '2023-01-23 22:07:26'),
(19, 'DG-5-B', 'Dry Goods', '2023-01-23 22:07:26'),
(20, 'DG-5-C', 'Dry Goods', '2023-01-23 22:07:26'),
(21, 'DG-6-A', 'Dry Goods', '2023-01-23 22:07:26'),
(22, 'DG-6-B', 'Dry Goods', '2023-01-23 22:07:26'),
(23, 'DG-6-C', 'Dry Goods', '2023-01-23 22:07:26'),
(24, 'DG-6-D', 'Dry Goods', '2023-01-23 22:07:26'),
(25, 'DG-7-A', 'Dry Goods', '2023-01-23 22:07:26'),
(26, 'DG-7-B', 'Dry Goods', '2023-01-23 22:07:26'),
(27, 'DG-7-C', 'Dry Goods', '2023-01-23 22:07:26'),
(28, 'DG-7-D', 'Dry Goods', '2023-01-23 22:07:26'),
(29, 'DG-7-E', 'Dry Goods', '2023-01-23 22:07:26'),
(30, 'DG-8-A', 'Dry Goods', '2023-01-23 22:07:26'),
(31, 'DG-8-B', 'Dry Goods', '2023-01-23 22:07:26'),
(32, 'DG-8-C', 'Dry Goods', '2023-01-23 22:07:26'),
(33, 'DG-9-A', 'Dry Goods', '2023-01-23 22:07:26'),
(34, 'DG-9-B', 'Dry Goods', '2023-01-23 22:07:26'),
(35, 'DG-9-C', 'Dry Goods', '2023-01-23 22:07:26'),
(36, 'DG-10-A', 'Dry Goods', '2023-01-23 22:07:26'),
(37, 'DG-10-B', 'Dry Goods', '2023-01-23 22:07:26'),
(38, 'DG-10-C', 'Dry Goods', '2023-01-23 22:07:26'),
(39, 'DG-11-A', 'Dry Goods', '2023-01-23 22:09:24'),
(40, 'DG-11-B', 'Dry Goods', '2023-01-23 22:09:24'),
(41, 'DG-11-C', 'Dry Goods', '2023-01-23 22:09:24'),
(42, 'DG-11-D', 'Dry Goods', '2023-01-23 22:09:24'),
(43, 'DG-12-A', 'Dry Goods', '2023-01-23 22:18:23'),
(44, 'DG-12-B', 'Dry Goods', '2023-01-23 22:18:23'),
(45, 'DG-12-C', 'Dry Goods', '2023-01-23 22:18:23'),
(46, 'DG-12-D', 'Dry Goods', '2023-01-23 22:18:23'),
(47, 'DG-13-A', 'Dry Goods', '2023-01-23 22:18:23'),
(48, 'DG-13-B', 'Dry Goods', '2023-01-23 22:18:23'),
(49, 'DG-13-C', 'Dry Goods', '2023-01-23 22:18:23'),
(50, 'DG-13-D', 'Dry Goods', '2023-01-23 22:18:23'),
(51, 'DG-14-A', 'Dry Goods', '2023-01-23 22:18:23'),
(52, 'DG-14-B', 'Dry Goods', '2023-01-23 22:18:23'),
(53, 'DG-14-C', 'Dry Goods', '2023-01-23 22:18:23'),
(54, 'DG-14-D', 'Dry Goods', '2023-01-23 22:18:23'),
(55, 'DG-14-E', 'Dry Goods', '2023-01-23 22:18:23'),
(56, 'DG-15-A', 'Dry Goods', '2023-01-23 22:18:23'),
(57, 'DG-15-B', 'Dry Goods', '2023-01-23 22:18:23'),
(58, 'DG-15-C', 'Dry Goods', '2023-01-23 22:18:23'),
(59, 'DG-15-D', 'Dry Goods', '2023-01-23 22:18:23'),
(60, 'DG-16-A', 'Dry Goods', '2023-01-23 22:18:23'),
(61, 'DG-16-B', 'Dry Goods', '2023-01-23 22:18:23'),
(62, 'DG-16-C', 'Dry Goods', '2023-01-23 22:18:23'),
(63, 'DG-16-D', 'Dry Goods', '2023-01-23 22:18:23'),
(64, 'DG-17-A', 'Dry Goods', '2023-01-23 22:18:23'),
(65, 'DG-17-B', 'Dry Goods', '2023-01-23 22:18:23'),
(66, 'DG-17-C', 'Dry Goods', '2023-01-23 22:18:23'),
(67, 'DG-17-D', 'Dry Goods', '2023-01-23 22:18:23'),
(68, 'DG-18-A', 'Dry Goods', '2023-01-23 22:18:23'),
(69, 'DG-18-B', 'Dry Goods', '2023-01-23 22:18:23'),
(70, 'DG-18-C', 'Dry Goods', '2023-01-23 22:18:23'),
(71, 'DG-18-D', 'Dry Goods', '2023-01-23 22:18:23'),
(72, 'DG-19-A', 'Dry Goods', '2023-01-23 22:18:23'),
(73, 'DG-19-B', 'Dry Goods', '2023-01-23 22:18:23'),
(74, 'DG-19-C', 'Dry Goods', '2023-01-23 22:18:23'),
(75, 'DG-20-A', 'Dry Goods', '2023-01-23 22:18:23'),
(76, 'DG-20-B', 'Dry Goods', '2023-01-23 22:18:23'),
(77, 'DG-20-C', 'Dry Goods', '2023-01-23 22:18:23'),
(78, 'DG-20-D', 'Dry Goods', '2023-01-23 22:18:23'),
(79, 'DG-21-A', 'Dry Goods', '2023-01-23 22:18:23'),
(80, 'DG-21-B', 'Dry Goods', '2023-01-23 22:18:23'),
(81, 'DG-22-A', 'Dry Goods', '2023-01-23 22:18:23'),
(82, 'DG-22-B', 'Dry Goods', '2023-01-23 22:18:23'),
(83, 'DG-22-C', 'Dry Goods', '2023-01-23 22:18:23'),
(84, 'DG-22-D', 'Dry Goods', '2023-01-23 22:18:23'),
(85, 'DG-23-A', 'Dry Goods', '2023-01-23 22:18:23'),
(86, 'DG-23-B', 'Dry Goods', '2023-01-23 22:18:23'),
(87, 'DG-23-C', 'Dry Goods', '2023-01-23 22:18:23'),
(88, 'DG-24-A', 'Dry Goods', '2023-01-23 22:18:23'),
(89, 'DG-24-B', 'Dry Goods', '2023-01-23 22:18:23'),
(90, 'DG-24-C', 'Dry Goods', '2023-01-23 22:18:23'),
(91, 'DG-24-D', 'Dry Goods', '2023-01-23 22:18:23'),
(92, 'DG-25-A', 'Dry Goods', '2023-01-23 22:18:23'),
(93, 'DG-25-B', 'Dry Goods', '2023-01-23 22:18:23'),
(94, 'DG-25-C', 'Dry Goods', '2023-01-23 22:18:23'),
(95, 'DG-25-D', 'Dry Goods', '2023-01-23 22:18:23'),
(96, 'DG-26-A', 'Dry Goods', '2023-01-23 22:18:23'),
(97, 'DG-26-B', 'Dry Goods', '2023-01-23 22:18:23'),
(98, 'DG-26-C', 'Dry Goods', '2023-01-23 22:18:23'),
(99, 'DG-26-D', 'Dry Goods', '2023-01-23 22:18:23'),
(100, 'DG-27-A', 'Dry Goods', '2023-01-23 22:18:23'),
(101, 'DG-27-B', 'Dry Goods', '2023-01-23 22:18:23'),
(102, 'DG-27-C', 'Dry Goods', '2023-01-23 22:18:23'),
(103, 'DG-27-D', 'Dry Goods', '2023-01-23 22:18:23'),
(104, 'DG-27-E', 'Dry Goods', '2023-01-23 22:18:23'),
(105, 'DG-27-F', 'Dry Goods', '2023-01-23 22:18:23'),
(106, 'DG-27-G', 'Dry Goods', '2023-01-23 22:18:23'),
(107, 'DG-28-A', 'Dry Goods', '2023-01-23 22:18:23'),
(108, 'DG-28-B', 'Dry Goods', '2023-01-23 22:18:23'),
(109, 'DG-28-C', 'Dry Goods', '2023-01-23 22:18:23'),
(110, 'DG-28-D', 'Dry Goods', '2023-01-23 22:18:23'),
(111, 'DG-29-A', 'Dry Goods', '2023-01-23 22:18:23'),
(112, 'DG-29-B', 'Dry Goods', '2023-01-23 22:18:23'),
(113, 'DG-29-C', 'Dry Goods', '2023-01-23 22:18:23'),
(114, 'DG-29-D', 'Dry Goods', '2023-01-23 22:18:23'),
(115, 'DG-29-E', 'Dry Goods', '2023-01-23 22:18:23'),
(116, 'DG-30-A', 'Dry Goods', '2023-01-23 22:18:23'),
(117, 'DG-30-B', 'Dry Goods', '2023-01-23 22:18:23'),
(118, 'DG-31-A', 'Dry Goods', '2023-01-23 22:18:23'),
(119, 'DG-31-B', 'Dry Goods', '2023-01-23 22:18:23'),
(120, 'DG-32-A', 'Dry Goods', '2023-01-23 22:18:23'),
(121, 'DG-32-B', 'Dry Goods', '2023-01-23 22:18:23'),
(122, 'DG-32-C', 'Dry Goods', '2023-01-23 22:18:23'),
(123, 'DG-32-D', 'Dry Goods', '2023-01-23 22:18:23'),
(124, 'DG-33-A', 'Dry Goods', '2023-01-23 22:18:23'),
(125, 'DG-33-B', 'Dry Goods', '2023-01-23 22:18:23'),
(126, 'DG-33-C', 'Dry Goods', '2023-01-23 22:18:23'),
(127, 'DG-34-A', 'Dry Goods', '2023-01-23 22:18:23'),
(128, 'DG-34-B', 'Dry Goods', '2023-01-23 22:18:23'),
(129, 'DG-34-C', 'Dry Goods', '2023-01-23 22:18:23'),
(130, 'DG-34-D', 'Dry Goods', '2023-01-23 22:18:23'),
(131, 'DG-34-E', 'Dry Goods', '2023-01-23 22:18:23'),
(132, 'DG-35-A', 'Dry Goods', '2023-01-23 22:18:23'),
(133, 'DG-35-B', 'Dry Goods', '2023-01-23 22:18:23'),
(134, 'DG-35-C', 'Dry Goods', '2023-01-23 22:18:23'),
(135, 'DG-35-D', 'Dry Goods', '2023-01-23 22:18:23'),
(136, 'DG-36-A', 'Dry Goods', '2023-01-23 22:18:23'),
(137, 'DG-36-B', 'Dry Goods', '2023-01-23 22:18:23'),
(138, 'DG-36-C', 'Dry Goods', '2023-01-23 22:18:23'),
(139, 'DG-37-A', 'Dry Goods', '2023-01-23 22:18:23'),
(140, 'DG-37-B', 'Dry Goods', '2023-01-23 22:18:23'),
(141, 'DG-37-C', 'Dry Goods', '2023-01-23 22:18:23'),
(142, 'DG-37-D', 'Dry Goods', '2023-01-23 22:18:23'),
(143, 'DG-38-A', 'Dry Goods', '2023-01-23 22:18:23'),
(144, 'DG-38-B', 'Dry Goods', '2023-01-23 22:18:23'),
(145, 'DG-38-C', 'Dry Goods', '2023-01-23 22:18:23'),
(146, 'DG-38-D', 'Dry Goods', '2023-01-23 22:18:23'),
(147, 'DG-38-E', 'Dry Goods', '2023-01-23 22:18:23'),
(148, 'DG-39-A', 'Dry Goods', '2023-01-23 22:18:23'),
(149, 'DG-39-B', 'Dry Goods', '2023-01-23 22:18:23'),
(150, 'DG-39-C', 'Dry Goods', '2023-01-23 22:18:23'),
(151, 'DG-39-D', 'Dry Goods', '2023-01-23 22:18:23'),
(152, 'DG-40-A', 'Dry Goods', '2023-01-23 22:18:23'),
(153, 'DG-40-B', 'Dry Goods', '2023-01-23 22:18:23'),
(154, 'DG-40-C', 'Dry Goods', '2023-02-10 21:57:57'),
(155, 'DGAS-M-1', 'Dry Goods Annex Section', '2023-02-10 22:00:53'),
(156, 'DGAS-M-2', 'Dry Goods Annex Section', '2023-02-10 22:00:53'),
(157, 'DGAS-M-3', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(158, 'DGAS-M-4', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(159, 'DGAS-M-5', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(160, 'DGAS-M-6', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(161, 'DGAS-M-7', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(162, 'DGAS-M-8', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(163, 'DGAS-M-9', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(164, 'DGAS-M-10', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(165, 'DGAS-M-11', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(166, 'DGAS-M-12', 'Dry Goods Annex Section', '2023-02-10 22:06:11'),
(167, 'GS-1', 'Grocery Section', '2023-02-10 22:08:10'),
(168, 'GS-2', 'Grocery Section', '2023-02-10 22:08:10'),
(169, 'GS-3', 'Grocery Section', '2023-02-10 22:12:56'),
(170, 'GS-4', 'Grocery Section', '2023-02-10 22:12:56'),
(171, 'GS-5', 'Grocery Section', '2023-02-10 22:12:56'),
(172, 'GS-6', 'Grocery Section', '2023-02-10 22:12:56'),
(173, 'GS-7', 'Grocery Section', '2023-02-10 22:12:56'),
(174, 'GS-8', 'Grocery Section', '2023-02-10 22:12:56'),
(175, 'GS-9', 'Grocery Section', '2023-02-10 22:12:56'),
(176, 'GS-10', 'Grocery Section', '2023-02-10 22:12:56'),
(177, 'GS-11', 'Grocery Section', '2023-02-10 22:12:56'),
(178, 'GS-12', 'Grocery Section', '2023-02-10 22:12:56'),
(179, 'GS-13', 'Grocery Section', '2023-02-10 22:12:56'),
(180, 'GS-14', 'Grocery Section', '2023-02-10 22:12:56'),
(181, 'GS-15', 'Grocery Section', '2023-02-10 22:12:56'),
(182, 'GS-16', 'Grocery Section', '2023-02-10 22:12:56'),
(183, 'GS-17', 'Grocery Section', '2023-02-10 22:12:56'),
(184, 'GS-18', 'Grocery Section', '2023-02-10 22:12:56'),
(185, 'GS-19', 'Grocery Section', '2023-02-10 22:12:56'),
(186, 'GS-20', 'Grocery Section', '2023-02-10 22:12:56'),
(187, 'GS-21', 'Grocery Section', '2023-02-10 22:12:56'),
(188, 'GS-22', 'Grocery Section', '2023-02-10 22:12:56'),
(189, 'GS-23', 'Grocery Section', '2023-02-10 22:12:56'),
(190, 'GS-24', 'Grocery Section', '2023-02-10 22:12:56'),
(191, 'GS-25', 'Grocery Section', '2023-02-10 22:12:56'),
(192, 'GS-26', 'Grocery Section', '2023-02-10 22:12:56'),
(193, 'GS-27', 'Grocery Section', '2023-02-10 22:12:56'),
(194, 'GS-28', 'Grocery Section', '2023-02-10 22:12:56'),
(195, 'GS-29', 'Grocery Section', '2023-02-10 22:12:56'),
(196, 'GS-30', 'Grocery Section', '2023-02-10 22:12:56'),
(197, 'GS-31', 'Grocery Section', '2023-02-10 22:12:56'),
(198, 'GS-32', 'Grocery Section', '2023-02-10 22:12:56'),
(199, 'GS-33', 'Grocery Section', '2023-02-10 22:12:56'),
(200, 'GS-34', 'Grocery Section', '2023-02-10 22:12:56'),
(201, 'GS-35A', 'Grocery Section', '2023-02-10 22:12:56'),
(202, 'GS-35B', 'Grocery Section', '2023-02-10 22:12:56'),
(203, 'GS-36', 'Grocery Section', '2023-02-10 22:12:56'),
(204, 'GS-37', 'Grocery Section', '2023-02-10 22:12:56'),
(205, 'GS-38', 'Grocery Section', '2023-02-10 22:12:56'),
(206, 'GS-39', 'Grocery Section', '2023-02-10 22:12:56'),
(207, 'GS-40', 'Grocery Section', '2023-02-10 22:12:56'),
(208, 'GS-41', 'Grocery Section', '2023-02-10 22:12:56'),
(209, 'GS-42', 'Grocery Section', '2023-02-10 22:12:56'),
(210, 'GS-E-1', 'Grocery Section Extension', '2023-02-10 22:17:02'),
(211, 'GS-E-2', 'Grocery Section Extension', '2023-02-10 22:17:02'),
(212, 'GS-E-3', 'Grocery Section Extension', '2023-02-10 22:17:02'),
(213, 'GS-E-4', 'Grocery Section Extension', '2023-02-10 22:17:02'),
(214, 'GS-E-5', 'Grocery Section Extension', '2023-02-10 22:17:02'),
(215, 'MS-1', 'Meat Section', '2023-02-10 22:20:31'),
(216, 'MS-2', 'Meat Section', '2023-02-10 22:20:31'),
(217, 'MS-3', 'Meat Section', '2023-02-10 22:20:31'),
(218, 'MS-4', 'Meat Section', '2023-02-10 22:20:31'),
(219, 'MS-5', 'Meat Section', '2023-02-10 22:20:31'),
(220, 'MS-6', 'Meat Section', '2023-02-10 22:20:31'),
(221, 'MS-7', 'Meat Section', '2023-02-10 22:20:31'),
(222, 'MS-8', 'Meat Section', '2023-02-10 22:20:31'),
(223, 'MS-9', 'Meat Section', '2023-02-10 22:20:31'),
(224, 'MS-10', 'Meat Section', '2023-02-10 22:20:31'),
(225, 'MS-11', 'Meat Section', '2023-02-10 22:20:31'),
(226, 'MS-12', 'Meat Section', '2023-02-10 22:20:31'),
(227, 'MS-13', 'Meat Section', '2023-02-10 22:20:31'),
(228, 'MS-14', 'Meat Section', '2023-02-10 22:20:31'),
(229, 'MS-15', 'Meat Section', '2023-02-10 22:20:31'),
(230, 'MS-16', 'Meat Section', '2023-02-10 22:20:31'),
(231, 'MS-17', 'Meat Section', '2023-02-10 22:20:31'),
(232, 'MS-18', 'Meat Section', '2023-02-10 22:20:31'),
(233, 'MS-19', 'Meat Section', '2023-02-10 22:20:31'),
(234, 'MS-20', 'Meat Section', '2023-02-10 22:20:31'),
(235, 'MS-21', 'Meat Section', '2023-02-10 22:20:31'),
(236, 'MS-22', 'Meat Section', '2023-02-10 22:20:31'),
(237, 'MS-23', 'Meat Section', '2023-02-10 22:20:31'),
(238, 'MS-24', 'Meat Section', '2023-02-10 22:20:31'),
(239, 'MS-25', 'Meat Section', '2023-02-10 22:20:31'),
(240, 'MS-26', 'Meat Section', '2023-02-10 22:20:31'),
(241, 'MS-27', 'Meat Section', '2023-02-10 22:20:31'),
(242, 'MS-28', 'Meat Section', '2023-02-10 22:20:31'),
(243, 'MS-29', 'Meat Section', '2023-02-10 22:20:31'),
(244, 'MS-30', 'Meat Section', '2023-02-10 22:20:31'),
(245, 'MS-31', 'Meat Section', '2023-02-10 22:20:31'),
(246, 'MS-32', 'Meat Section', '2023-02-10 22:20:31'),
(247, 'MS-33', 'Meat Section', '2023-02-10 22:20:31'),
(248, 'MS-34', 'Meat Section', '2023-02-10 22:20:31'),
(249, 'MS-35', 'Meat Section', '2023-02-10 22:20:31'),
(250, 'MS-36', 'Meat Section', '2023-02-10 22:20:31'),
(251, 'MS-37', 'Meat Section', '2023-02-10 22:20:31'),
(252, 'MS-38', 'Meat Section', '2023-02-10 22:20:31'),
(253, 'MS-39', 'Meat Section', '2023-02-10 22:20:31'),
(254, 'MS-40', 'Meat Section', '2023-02-10 22:20:31'),
(255, 'MS-41', 'Meat Section', '2023-02-10 22:20:31'),
(256, 'MS-42', 'Meat Section', '2023-02-10 22:20:31'),
(257, 'MS-43', 'Meat Section', '2023-02-10 22:20:31'),
(258, 'MS-44', 'Meat Section', '2023-02-10 22:20:31'),
(259, 'MS-45', 'Meat Section', '2023-02-10 22:20:31'),
(260, 'MS-46', 'Meat Section', '2023-02-10 22:20:31'),
(261, 'MS-47', 'Meat Section', '2023-02-10 22:20:31'),
(262, 'MS-48', 'Meat Section', '2023-02-10 22:20:31'),
(263, 'MS-49', 'Meat Section', '2023-02-10 22:20:31'),
(264, 'MS-50', 'Meat Section', '2023-02-10 22:20:31'),
(265, 'MS-51', 'Meat Section', '2023-02-10 22:20:31'),
(266, 'MS-52', 'Meat Section', '2023-02-10 22:20:31'),
(267, 'MS-53', 'Meat Section', '2023-02-10 22:20:31'),
(268, 'MS-54', 'Meat Section', '2023-02-10 22:20:31'),
(269, 'MS-55', 'Meat Section', '2023-02-10 22:20:31'),
(270, 'MS-56', 'Meat Section', '2023-02-10 22:20:31'),
(271, 'MS-57', 'Meat Section', '2023-02-10 22:20:31'),
(272, 'MS-58', 'Meat Section', '2023-02-10 22:20:31'),
(273, 'MS-59', 'Meat Section', '2023-02-10 22:20:31'),
(274, 'MS-60', 'Meat Section', '2023-02-10 22:20:31'),
(275, 'MS-61', 'Meat Section', '2023-02-10 22:20:31'),
(276, 'MS-62', 'Meat Section', '2023-02-10 22:20:31'),
(277, 'MS-63', 'Meat Section', '2023-02-10 22:20:31'),
(278, 'MS-64', 'Meat Section', '2023-02-10 22:20:31'),
(279, 'FS-1', 'Fish Section', '2023-02-10 22:24:56'),
(280, 'FS-2', 'Fish Section', '2023-02-10 22:24:56'),
(281, 'FS-3', 'Fish Section', '2023-02-10 22:24:56'),
(282, 'FS-4', 'Fish Section', '2023-02-10 22:24:56'),
(283, 'FS-5', 'Fish Section', '2023-02-10 22:24:56'),
(284, 'FS-6', 'Fish Section', '2023-02-10 22:24:56'),
(285, 'FS-7', 'Fish Section', '2023-02-10 22:24:56'),
(286, 'FS-8', 'Fish Section', '2023-02-10 22:24:56'),
(287, 'FS-9', 'Fish Section', '2023-02-10 22:24:56'),
(288, 'FS-10', 'Fish Section', '2023-02-10 22:24:56'),
(289, 'FS-11', 'Fish Section', '2023-02-10 22:24:56'),
(290, 'FS-12', 'Fish Section', '2023-02-10 22:24:56'),
(291, 'FS-13', 'Fish Section', '2023-02-10 22:24:56'),
(292, 'FS-14', 'Fish Section', '2023-02-10 22:24:56'),
(293, 'FS-15', 'Fish Section', '2023-02-10 22:24:56'),
(294, 'FS-16', 'Fish Section', '2023-02-10 22:24:56'),
(295, 'FS-17', 'Fish Section', '2023-02-10 22:24:56'),
(296, 'FS-18', 'Fish Section', '2023-02-10 22:24:56'),
(297, 'FS-19', 'Fish Section', '2023-02-10 22:24:56'),
(298, 'FS-20', 'Fish Section', '2023-02-10 22:24:56'),
(299, 'FS-21', 'Fish Section', '2023-02-10 22:24:56'),
(300, 'FS-22', 'Fish Section', '2023-02-10 22:24:56'),
(301, 'FS-23', 'Fish Section', '2023-02-10 22:24:56'),
(302, 'FS-24', 'Fish Section', '2023-02-10 22:24:56'),
(303, 'FS-25', 'Fish Section', '2023-02-10 22:24:56'),
(304, 'FS-26', 'Fish Section', '2023-02-10 22:24:56'),
(305, 'FS-27', 'Fish Section', '2023-02-10 22:24:56'),
(306, 'FS-28', 'Fish Section', '2023-02-10 22:24:56'),
(307, 'FS-29', 'Fish Section', '2023-02-10 22:24:56'),
(308, 'FS-30', 'Fish Section', '2023-02-10 22:24:56'),
(309, 'FS-31', 'Fish Section', '2023-02-10 22:24:56'),
(310, 'FS-32', 'Fish Section', '2023-02-10 22:24:56'),
(311, 'FS-33', 'Fish Section', '2023-02-10 22:24:56'),
(312, 'FS-34', 'Fish Section', '2023-02-10 22:24:56'),
(313, 'FS-35', 'Fish Section', '2023-02-10 22:24:56'),
(314, 'FS-36', 'Fish Section', '2023-02-10 22:24:56'),
(315, 'FS-37', 'Fish Section', '2023-02-10 22:24:56'),
(316, 'FS-38', 'Fish Section', '2023-02-10 22:24:56'),
(317, 'FS-39', 'Fish Section', '2023-02-10 22:24:56'),
(318, 'FS-40', 'Fish Section', '2023-02-10 22:24:56'),
(319, 'FS-41', 'Fish Section', '2023-02-10 22:24:56'),
(320, 'FS-42', 'Fish Section', '2023-02-10 22:24:56'),
(321, 'FS-43', 'Fish Section', '2023-02-10 22:24:56'),
(322, 'FS-44', 'Fish Section', '2023-02-10 22:24:56'),
(323, 'FS-45', 'Fish Section', '2023-02-10 22:24:56'),
(324, 'FS-46', 'Fish Section', '2023-02-10 22:24:56'),
(325, 'FS-47', 'Fish Section', '2023-02-10 22:24:56'),
(326, 'FS-48', 'Fish Section', '2023-02-10 22:24:56'),
(327, 'FS-49', 'Fish Section', '2023-02-10 22:24:56'),
(328, 'FS-50', 'Fish Section', '2023-02-10 22:24:56'),
(329, 'FS-51', 'Fish Section', '2023-02-10 22:24:56'),
(330, 'FS-52', 'Fish Section', '2023-02-10 22:24:56'),
(331, 'FS-53', 'Fish Section', '2023-02-10 22:24:56'),
(332, 'FS-54', 'Fish Section', '2023-02-10 22:24:56'),
(333, 'FS-55', 'Fish Section', '2023-02-10 22:24:56'),
(334, 'FS-56', 'Fish Section', '2023-02-10 22:24:56'),
(335, 'FS-57', 'Fish Section', '2023-02-10 22:24:56'),
(336, 'FS-58', 'Fish Section', '2023-02-10 22:24:56'),
(337, 'FS-59', 'Fish Section', '2023-02-10 22:24:56'),
(338, 'FS-60', 'Fish Section', '2023-02-10 22:24:56'),
(339, 'FS-61', 'Fish Section', '2023-02-10 22:24:56'),
(340, 'FS-62', 'Fish Section', '2023-02-10 22:24:56'),
(341, 'FS-63', 'Fish Section', '2023-02-10 22:24:56'),
(342, 'FS-64', 'Fish Section', '2023-02-10 22:24:56'),
(343, 'VGTS-1', 'Vegetable Section', '2023-02-10 22:30:19'),
(344, 'VGTS-2', 'Vegetable Section', '2023-02-10 22:30:19'),
(345, 'VGTS-3', 'Vegetable Section', '2023-02-10 22:30:19'),
(346, 'VGTS-4', 'Vegetable Section', '2023-02-10 22:30:19'),
(347, 'VGTS-5', 'Vegetable Section', '2023-02-10 22:30:19'),
(348, 'VGTS-6', 'Vegetable Section', '2023-02-10 22:30:19'),
(349, 'VGTS-7', 'Vegetable Section', '2023-02-10 22:30:19'),
(350, 'VGTS-8', 'Vegetable Section', '2023-02-10 22:30:19'),
(351, 'VGTS-9', 'Vegetable Section', '2023-02-10 22:30:19'),
(352, 'VGTS-10', 'Vegetable Section', '2023-02-10 22:30:19'),
(353, 'VGTS-11', 'Vegetable Section', '2023-02-10 22:30:19'),
(354, 'VGTS-12', 'Vegetable Section', '2023-02-10 22:30:19'),
(355, 'VGTS-13', 'Vegetable Section', '2023-02-10 22:30:19'),
(356, 'VGTS-14', 'Vegetable Section', '2023-02-10 22:30:19'),
(357, 'VGTS-15', 'Vegetable Section', '2023-02-10 22:30:19'),
(358, 'VGTS-16', 'Vegetable Section', '2023-02-10 22:30:19'),
(359, 'VGTS-17', 'Vegetable Section', '2023-02-10 22:30:19'),
(360, 'VGTS-18', 'Vegetable Section', '2023-02-10 22:30:19'),
(361, 'VGTS-19', 'Vegetable Section', '2023-02-10 22:30:19'),
(362, 'VGTS-20', 'Vegetable Section', '2023-02-10 22:30:19'),
(363, 'VGTS-21', 'Vegetable Section', '2023-02-10 22:30:19'),
(364, 'VGTS-22', 'Vegetable Section', '2023-02-10 22:30:19'),
(365, 'VGTS-23', 'Vegetable Section', '2023-02-10 22:30:19'),
(366, 'VGTS-24', 'Vegetable Section', '2023-02-10 22:30:19'),
(367, 'VGTS-25', 'Vegetable Section', '2023-02-10 22:30:19'),
(368, 'VGTS-26', 'Vegetable Section', '2023-02-10 22:30:19'),
(369, 'VGTS-27', 'Vegetable Section', '2023-02-10 22:30:19'),
(370, 'VGTS-28', 'Vegetable Section', '2023-02-10 22:30:19'),
(371, 'VGTS-29', 'Vegetable Section', '2023-02-10 22:30:19'),
(372, 'VGTS-30', 'Vegetable Section', '2023-02-10 22:30:19'),
(373, 'VGTS-31', 'Vegetable Section', '2023-02-10 22:30:19'),
(374, 'VGTS-32', 'Vegetable Section', '2023-02-10 22:30:19'),
(375, 'VGTS-33', 'Vegetable Section', '2023-02-10 22:30:19'),
(376, 'VGTS-34', 'Vegetable Section', '2023-02-10 22:30:19'),
(377, 'VGTS-35', 'Vegetable Section', '2023-02-10 22:30:19'),
(378, 'VGTS-36', 'Vegetable Section', '2023-02-10 22:30:19'),
(379, 'VGTS-37', 'Vegetable Section', '2023-02-10 22:30:19'),
(380, 'VGTS-38', 'Vegetable Section', '2023-02-10 22:30:19'),
(381, 'VGTS-39', 'Vegetable Section', '2023-02-10 22:30:19'),
(382, 'VGTS-40', 'Vegetable Section', '2023-02-10 22:30:19'),
(383, 'VGTS-41', 'Vegetable Section', '2023-02-10 22:30:19'),
(384, 'VGTS-42', 'Vegetable Section', '2023-02-10 22:30:19'),
(385, 'VGTS-43', 'Vegetable Section', '2023-02-10 22:30:19'),
(386, 'VGTS-44', 'Vegetable Section', '2023-02-10 22:30:19'),
(387, 'VGTS-45', 'Vegetable Section', '2023-02-10 22:30:19'),
(388, 'VGTS-46', 'Vegetable Section', '2023-02-10 22:30:19'),
(389, 'VGTS-47', 'Vegetable Section', '2023-02-10 22:30:19'),
(390, 'VGTS-48', 'Vegetable Section', '2023-02-10 22:30:19'),
(391, 'VGTS-49', 'Vegetable Section', '2023-02-10 22:30:19'),
(392, 'VGTS-50', 'Vegetable Section', '2023-02-10 22:30:19'),
(393, 'VGTS-51', 'Vegetable Section', '2023-02-10 22:30:19'),
(394, 'VGTS-52', 'Vegetable Section', '2023-02-10 22:30:19'),
(395, 'VGTS-53', 'Vegetable Section', '2023-02-10 22:30:19'),
(396, 'VGTS-54', 'Vegetable Section', '2023-02-10 22:30:19'),
(397, 'VGTS-55', 'Vegetable Section', '2023-02-10 22:30:19'),
(398, 'VGTS-56', 'Vegetable Section', '2023-02-10 22:30:19'),
(399, 'VGTS-57', 'Vegetable Section', '2023-02-10 22:30:19'),
(400, 'VGTS-58', 'Vegetable Section', '2023-02-10 22:30:19'),
(401, 'VGTS-59', 'Vegetable Section', '2023-02-10 22:30:19'),
(402, 'VGTS-60', 'Vegetable Section', '2023-02-10 22:30:19'),
(403, 'VGTS-61', 'Vegetable Section', '2023-02-10 22:30:19'),
(404, 'VGTS-62', 'Vegetable Section', '2023-02-10 22:30:19'),
(405, 'VGTS-63', 'Vegetable Section', '2023-02-10 22:30:19'),
(406, 'VGTS-64', 'Vegetable Section', '2023-02-10 22:30:19'),
(407, 'FRTS-1', 'Fruit Section', '2023-02-10 22:34:14'),
(408, 'FRTS-2', 'Fruit Section', '2023-02-10 22:34:14'),
(409, 'FRTS-3', 'Fruit Section', '2023-02-10 22:34:14'),
(410, 'FRTS-4', 'Fruit Section', '2023-02-10 22:34:14'),
(411, 'FRTS-5', 'Fruit Section', '2023-02-10 22:34:14'),
(412, 'FRTS-6', 'Fruit Section', '2023-02-10 22:34:14'),
(413, 'FRTS-7', 'Fruit Section', '2023-02-10 22:34:14'),
(414, 'FRTS-8', 'Fruit Section', '2023-02-10 22:34:14'),
(415, 'FRTS-9', 'Fruit Section', '2023-02-10 22:34:14'),
(416, 'FRTS-10', 'Fruit Section', '2023-02-10 22:34:14'),
(417, 'FRTS-11', 'Fruit Section', '2023-02-10 22:34:14'),
(418, 'FRTS-12', 'Fruit Section', '2023-02-10 22:34:14'),
(419, 'FRTS-13', 'Fruit Section', '2023-02-10 22:34:14'),
(420, 'FRTS-14', 'Fruit Section', '2023-02-10 22:34:14'),
(421, 'FRTS-15', 'Fruit Section', '2023-02-10 22:34:14'),
(422, 'FRTS-16', 'Fruit Section', '2023-02-10 22:34:14'),
(423, 'FRTS-17', 'Fruit Section', '2023-02-10 22:34:14'),
(424, 'FRTS-18', 'Fruit Section', '2023-02-10 22:34:14'),
(425, 'FRTS-19', 'Fruit Section', '2023-02-10 22:34:14'),
(426, 'FRTS-20', 'Fruit Section', '2023-02-10 22:34:14'),
(427, 'FRTS-21', 'Fruit Section', '2023-02-10 22:34:14'),
(428, 'FRTS-22', 'Fruit Section', '2023-02-10 22:34:14'),
(429, 'FRTS-23', 'Fruit Section', '2023-02-10 22:34:14'),
(430, 'FRTS-24', 'Fruit Section', '2023-02-10 22:34:14'),
(431, 'FRTS-25', 'Fruit Section', '2023-02-10 22:34:14'),
(432, 'FRTS-26', 'Fruit Section', '2023-02-10 22:34:14'),
(433, 'FRTS-27', 'Fruit Section', '2023-02-10 22:34:14'),
(434, 'FRTS-28', 'Fruit Section', '2023-02-10 22:34:14'),
(435, 'FRTS-29', 'Fruit Section', '2023-02-10 22:34:14'),
(436, 'FRTS-30', 'Fruit Section', '2023-02-10 22:34:14'),
(437, 'FRTS-31', 'Fruit Section', '2023-02-10 22:34:14'),
(438, 'FRTS-32', 'Fruit Section', '2023-02-10 22:34:14'),
(439, 'FRTS-33', 'Fruit Section', '2023-02-10 22:34:14'),
(440, 'FRTS-34', 'Fruit Section', '2023-02-10 22:34:14'),
(441, 'FRTS-35', 'Fruit Section', '2023-02-10 22:34:14'),
(442, 'FRTS-36', 'Fruit Section', '2023-02-10 22:34:14'),
(443, 'FRTS-37', 'Fruit Section', '2023-02-10 22:34:14'),
(444, 'FRTS-38', 'Fruit Section', '2023-02-10 22:34:14'),
(445, 'FRTS-39', 'Fruit Section', '2023-02-10 22:34:14'),
(446, 'FRTS-40', 'Fruit Section', '2023-02-10 22:34:14'),
(447, 'FRTS-41', 'Fruit Section', '2023-02-10 22:34:14'),
(448, 'FRTS-42', 'Fruit Section', '2023-02-10 22:34:14'),
(449, 'FRTS-43', 'Fruit Section', '2023-02-10 22:34:14'),
(450, 'FRTS-44', 'Fruit Section', '2023-02-10 22:34:14'),
(451, 'FRTS-45', 'Fruit Section', '2023-02-10 22:34:14'),
(452, 'FRTS-46', 'Fruit Section', '2023-02-10 22:34:14'),
(453, 'FRTS-47', 'Fruit Section', '2023-02-10 22:34:14'),
(454, 'FRTS-48', 'Fruit Section', '2023-02-10 22:34:14'),
(455, 'FRTS-49', 'Fruit Section', '2023-02-10 22:34:14'),
(456, 'FRTS-50', 'Fruit Section', '2023-02-10 22:34:14'),
(457, 'FRTS-51', 'Fruit Section', '2023-02-10 22:34:14'),
(458, 'FRTS-52', 'Fruit Section', '2023-02-10 22:34:14'),
(459, 'FRTS-53', 'Fruit Section', '2023-02-10 22:34:14'),
(460, 'FRTS-54', 'Fruit Section', '2023-02-10 22:34:14'),
(461, 'FRTS-55', 'Fruit Section', '2023-02-10 22:34:14'),
(462, 'FRTS-56', 'Fruit Section', '2023-02-10 22:34:14'),
(463, 'FRTS-57', 'Fruit Section', '2023-02-10 22:34:14'),
(464, 'FRTS-58', 'Fruit Section', '2023-02-10 22:34:14'),
(465, 'FRTS-59', 'Fruit Section', '2023-02-10 22:34:14'),
(466, 'FRTS-60', 'Fruit Section', '2023-02-10 22:34:14'),
(467, 'FRTS-61', 'Fruit Section', '2023-02-10 22:34:14'),
(468, 'FRTS-62', 'Fruit Section', '2023-02-10 22:34:14'),
(469, 'FRTS-63', 'Fruit Section', '2023-02-10 22:34:14'),
(470, 'FRTS-64', 'Fruit Section', '2023-02-10 22:34:14'),
(471, 'FVE-1', 'Fruit and Vegetable Section Extension', '2023-03-02 19:13:35'),
(472, 'FVE-2', 'Fruit and Vegetable Section Extension', '2023-03-02 19:13:35'),
(473, 'FVE-3', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(474, 'FVE-4', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(475, 'FVE-5', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(476, 'FVE-6', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(477, 'FVE-7', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(478, 'FVE-8', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(479, 'FVE-9', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(480, 'FVE-10', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(481, 'FVE-11', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(482, 'FVE-12', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(483, 'FVE-13', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(484, 'FVE-14', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(485, 'FVE-15', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(486, 'FVE-16', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(487, 'FVE-17', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(488, 'FVE-18', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(489, 'FVE-19', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(490, 'FVE-20', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(491, 'FVE-21', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(492, 'FVE-22', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(493, 'FVE-23', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(494, 'FVE-24', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(495, 'FVE-25', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(496, 'FVE-26', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(497, 'FVE-27', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(498, 'FVE-28', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(499, 'FVE-29', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(500, 'FVE-30', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(501, 'FVE-31', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(502, 'FVE-32', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(503, 'FVE-33', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(504, 'FVE-34', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(505, 'FVE-35', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(506, 'FVE-36', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(507, 'FVE-37', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(508, 'FVE-38', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(509, 'FVE-39', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(510, 'FVE-40', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(511, 'FVE-41', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(512, 'FVE-42', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(513, 'FVE-43', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(514, 'FVE-44', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(515, 'FVE-45', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(516, 'FVE-46', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(517, 'FVE-47', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(518, 'FVE-48', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(519, 'FVE-49', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(520, 'FVE-50', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(521, 'FVE-51', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(522, 'FVE-52', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(523, 'FVE-53', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(524, 'FVE-54', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(525, 'FVE-55', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(526, 'FVE-56', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(527, 'FVE-57', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(528, 'FVE-58', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(529, 'FVE-59', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(530, 'FVE-60', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(531, 'FVE-61', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(532, 'FVE-62', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(533, 'FVE-63', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(534, 'FVE-64', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(535, 'FVE-65', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(536, 'FVE-66', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(537, 'FVE-67', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(538, 'FVE-68', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(539, 'FVE-69', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(540, 'FVE-70', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(541, 'FVE-71', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(542, 'FVE-72', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(543, 'FVE-73', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(544, 'FVE-74', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(545, 'FVE-75', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(546, 'FVE-76', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(547, 'FVE-77', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(548, 'FVE-78', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(549, 'FVE-79', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(550, 'FVE-80', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(551, 'FVE-81', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(552, 'FVE-82', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(553, 'FVE-83', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(554, 'FVE-84', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(555, 'FVE-85', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(556, 'FVE-86', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(557, 'FVE-87', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(558, 'FVE-88', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(559, 'FVE-89', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(560, 'FVE-90', 'Fruit and Vegetable Section Extension', '2023-03-02 19:17:57'),
(561, 'CS-1', 'Carinderia Section', '2023-03-02 19:22:00'),
(562, 'CS-2', 'Carinderia Section', '2023-03-02 19:22:00'),
(563, 'CS-3', 'Carinderia Section', '2023-03-02 19:22:00'),
(564, 'CS-4', 'Carinderia Section', '2023-03-02 19:22:00'),
(565, 'CS-5', 'Carinderia Section', '2023-03-02 19:22:00'),
(566, 'CS-6', 'Carinderia Section', '2023-03-02 19:22:00'),
(567, 'CS-7', 'Carinderia Section', '2023-03-02 19:22:00'),
(568, 'CS-8', 'Carinderia Section', '2023-03-02 19:22:00'),
(569, 'PFS-1', 'Processed Foods Section', '2023-03-02 19:29:47'),
(570, 'PFS-2', 'Processed Foods Section', '2023-03-02 19:29:47'),
(571, 'PFS-3', 'Processed Foods Section', '2023-03-02 19:29:47'),
(572, 'PFS-4', 'Processed Foods Section', '2023-03-02 19:29:47'),
(573, 'PFS-5', 'Processed Foods Section', '2023-03-02 19:29:47'),
(574, 'PFS-6', 'Processed Foods Section', '2023-03-02 19:29:47'),
(575, 'PFS-7', 'Processed Foods Section', '2023-03-02 19:29:47'),
(576, 'PFS-8', 'Processed Foods Section', '2023-03-02 19:29:47'),
(577, 'PFS-9', 'Processed Foods Section', '2023-03-02 19:29:47'),
(578, 'PFS-10', 'Processed Foods Section', '2023-03-02 19:29:47'),
(579, 'PFS-11', 'Processed Foods Section', '2023-03-02 19:29:47'),
(580, 'PFS-12', 'Processed Foods Section', '2023-03-02 19:29:47'),
(581, 'PFS-13A', 'Processed Foods Section', '2023-03-02 19:29:47'),
(582, 'PFS-13B', 'Processed Foods Section', '2023-03-02 19:29:47'),
(583, 'PFS-14', 'Processed Foods Section', '2023-03-02 19:29:47'),
(584, 'PFS-15A', 'Processed Foods Section', '2023-03-02 19:29:47'),
(585, 'PFS-15B', 'Processed Foods Section', '2023-03-02 19:29:47'),
(586, 'PFS-16', 'Processed Foods Section', '2023-03-02 19:29:47'),
(587, 'PFS-17', 'Processed Foods Section', '2023-03-02 19:29:47'),
(588, 'PFS-18', 'Processed Foods Section', '2023-03-02 19:29:47'),
(589, 'PFS-19', 'Processed Foods Section', '2023-03-02 19:29:47'),
(590, 'PFS-20', 'Processed Foods Section', '2023-03-02 19:29:47'),
(591, 'PFS-21', 'Processed Foods Section', '2023-03-02 19:29:47'),
(592, 'PFS-22', 'Processed Foods Section', '2023-03-02 19:29:47'),
(593, 'PFS-23', 'Processed Foods Section', '2023-03-02 19:29:47'),
(594, 'PFS-24', 'Processed Foods Section', '2023-03-02 19:29:47'),
(595, 'PFS-25', 'Processed Foods Section', '2023-03-02 19:29:47'),
(596, 'PFS-26', 'Processed Foods Section', '2023-03-02 19:29:47'),
(597, 'PFS-27', 'Processed Foods Section', '2023-03-02 19:29:47'),
(598, 'PFS-28', 'Processed Foods Section', '2023-03-02 19:29:47'),
(599, 'PFS-29', 'Processed Foods Section', '2023-03-02 19:29:47'),
(600, 'Admin-Office', 'Admin Office', '2023-04-10 08:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `stall_vendor_helper`
--

CREATE TABLE `stall_vendor_helper` (
  `id` int(11) NOT NULL,
  `stall_holder_id` int(11) NOT NULL,
  `vendor_helper_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stall_vendor_helper`
--

INSERT INTO `stall_vendor_helper` (`id`, `stall_holder_id`, `vendor_helper_name`, `address`, `contact_number`, `role`, `created_on`) VALUES
(4, 14, 'Queen Amalia Mariz', 'A108 Adam Street, New York, NY 535022', '09682267445', 'Vendor', '2023-04-19'),
(5, 13, 'Queen Amalia Mariz', 'A108 Adam Street, New York, NY 535022', '09682267445', 'Vendor', '2023-04-19'),
(6, 15, 'Ron Vincent San Juan', 'A108 Adam Street, New York, NY 535022', '09682267445', 'Helper', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `user_type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `act` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `contact_number`, `username`, `email`, `password`, `profile_picture`, `user_type`, `status`, `act`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'PalengkeGo', 'Admin', '09682267445', 'palengkego_mariveles', 'palengkego.mariveles@gmail.com', '$2y$10$ABmCBrPKnc2ziQ/mlQ8HoOAZHeHGLZ.9rc0tht6YDdNgPcZJqZKri', 'profile_picture__1681967487_7554.jpeg', 1, 1, 1, '049162', '', '2023-04-20'),
(2, 'Ron Vincent', 'San Juan', '09682267445', 'ronin123', 'ronvincent.sanjuan.rvsj@gmail.com', '$2y$10$kofFzD4Xd57iDJNh7Jxa.eQ5lDPOWGUpDp1WALLJdoBqJWlKtbbTG', 'profile_picture__1681970728_4186.jpeg', 0, 1, 1, '', '', '2023-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stalls_owned`
--
ALTER TABLE `stalls_owned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stall_holders`
--
ALTER TABLE `stall_holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stall_section`
--
ALTER TABLE `stall_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stall_vendor_helper`
--
ALTER TABLE `stall_vendor_helper`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stalls_owned`
--
ALTER TABLE `stalls_owned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stall_holders`
--
ALTER TABLE `stall_holders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stall_section`
--
ALTER TABLE `stall_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `stall_vendor_helper`
--
ALTER TABLE `stall_vendor_helper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
