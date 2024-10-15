-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 10:45 AM
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
-- Database: `sbfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` int(11) NOT NULL,
  `division_province` varchar(255) DEFAULT NULL,
  `city_municipality_barangay` varchar(255) DEFAULT NULL,
  `name_of_school` varchar(255) DEFAULT NULL,
  `school_id_number` varchar(50) DEFAULT NULL,
  `name_of_principal` varchar(255) DEFAULT NULL,
  `name_of_feeding_focal_person` varchar(255) DEFAULT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `division_province`, `city_municipality_barangay`, `name_of_school`, `school_id_number`, `name_of_principal`, `name_of_feeding_focal_person`, `session_id`) VALUES
(198, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'LOREVIE K. RIVERA', 'icievy sandrino', 'e55jUNtr');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_attendance`
--

CREATE TABLE `beneficiary_attendance` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL,
  `meal_served` enum('H','M','H/M','A','H2','M2','H/M2') DEFAULT 'H'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_details`
--

CREATE TABLE `beneficiary_details` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) DEFAULT NULL,
  `student_section` varchar(255) NOT NULL,
  `lrn_no` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `grade_section` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_weighing` date NOT NULL,
  `age` varchar(20) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `bmi` decimal(10,2) NOT NULL,
  `nutritional_status_bmia` enum('Severely Wasted','Wasted','Normal','Overweight','Obese') NOT NULL,
  `nutritional_status_hfa` enum('Stunted','Normal','Tall') NOT NULL,
  `dewormed` enum('Yes','No') NOT NULL,
  `parents_consent_for_milk` enum('Yes','No') NOT NULL,
  `participation_in_4ps` enum('Yes','No') NOT NULL,
  `beneficiary_of_sbfp_in_previous_years` enum('Yes','No') NOT NULL,
  `session_id` varchar(8) NOT NULL,
  `selected` tinyint(1) DEFAULT 0,
  `parent_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`id`, `beneficiary_id`, `student_section`, `lrn_no`, `name`, `sex`, `grade_section`, `date_of_birth`, `date_of_weighing`, `age`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `dewormed`, `parents_consent_for_milk`, `participation_in_4ps`, `beneficiary_of_sbfp_in_previous_years`, `session_id`, `selected`, `parent_phone`) VALUES
(121, 198, 'exmple section', '345657757657', 'icievy sandrino', 'Female', 'Grade 5', '2006-02-06', '2024-10-11', '18', 26.00, 116.00, 19.32, 'Normal', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes', 'e55jUNtr', 1, '+639207569581');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_progress`
--

CREATE TABLE `beneficiary_progress` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `date_of_progress` date NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `bmi` decimal(10,2) NOT NULL,
  `nutritional_status_bmia` enum('Severely Wasted','Wasted','Normal','Overweight','Obese') NOT NULL,
  `nutritional_status_hfa` enum('Stunted','Normal','Tall') NOT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_progress`
--

INSERT INTO `beneficiary_progress` (`id`, `beneficiary_id`, `date_of_progress`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `session_id`) VALUES
(64, 121, '2024-10-11', 26.00, 116.00, 19.32, 'Normal', 'Stunted', 'e55jUNtr');

-- --------------------------------------------------------

--
-- Table structure for table `division_schools`
--

CREATE TABLE `division_schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `division_school` varchar(255) NOT NULL,
  `sdo_school` int(11) NOT NULL,
  `target_sbfp_school` int(11) NOT NULL,
  `actual_sbfp_school` int(11) NOT NULL,
  `percent` decimal(5,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `target_beneficiaries` int(11) NOT NULL,
  `actual_beneficiaries` int(11) NOT NULL,
  `completion_percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milkcomponent`
--

CREATE TABLE `milkcomponent` (
  `id` int(11) NOT NULL,
  `region_division_district` varchar(255) NOT NULL,
  `name_of_school` varchar(255) NOT NULL,
  `school_id_number` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `grade_section` varchar(255) NOT NULL,
  `milk_tolerance` enum('Without milk intolerance and will participate in milk feeding','With milk intolerance but willing to participate in milk feeding','Not allowed by parents to participate in milk feeding') NOT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `milkcomponent`
--

INSERT INTO `milkcomponent` (`id`, `region_division_district`, `name_of_school`, `school_id_number`, `student_name`, `grade_section`, `milk_tolerance`, `session_id`) VALUES
(81, 'Laguna', 'Gatid Elementary School', '123461', 'icievy sandrino', 'Grade 5', 'With milk intolerance but willing to participate in milk feeding', 'e55jUNtr');

-- --------------------------------------------------------

--
-- Table structure for table `quarterly_reportform8`
--

CREATE TABLE `quarterly_reportform8` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `region_division` varchar(255) NOT NULL,
  `amount_allocated` decimal(10,2) NOT NULL,
  `amount_downloaded` decimal(10,2) NOT NULL,
  `status_fund_downloading` varchar(255) DEFAULT NULL,
  `first_liquidation` decimal(10,2) DEFAULT NULL,
  `second_liquidation` decimal(10,2) DEFAULT NULL,
  `total_liquidation` decimal(10,2) DEFAULT NULL,
  `liquidation_status` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_activity`
--

CREATE TABLE `recent_activity` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activity` text NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','read') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_activity`
--

INSERT INTO `recent_activity` (`id`, `email`, `activity`, `activity_type`, `timestamp`, `status`) VALUES
(127, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 18:56:56', 'read'),
(128, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 19:44:30', 'read'),
(129, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-07-02 19:44:34', 'read'),
(130, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-07-02 19:44:37', 'read'),
(131, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 19:46:00', 'read'),
(132, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 19:46:10', 'read'),
(133, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-07-02 19:46:14', 'read'),
(134, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-07-02 19:46:21', 'read'),
(135, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 19:47:45', 'read'),
(136, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 19:53:53', 'read'),
(137, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-07-02 19:53:55', 'read'),
(138, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-07-02 19:53:59', 'read'),
(139, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 19:54:06', 'read'),
(140, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 19:55:17', 'read'),
(141, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-07-02 19:55:23', 'read'),
(142, 'jorandelgado1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 19:56:07', 'read'),
(143, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-07-02 20:08:49', 'read'),
(144, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 21:17:40', 'read'),
(145, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 21:18:02', 'read'),
(146, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 21:23:09', 'read'),
(147, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-07-02 21:23:53', 'read'),
(148, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 21:24:21', 'read'),
(149, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 22:26:28', 'read'),
(150, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 22:26:49', 'read'),
(151, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 23:20:08', 'read'),
(152, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 23:27:32', 'read'),
(153, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 23:28:20', 'read'),
(154, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 23:31:06', 'read'),
(155, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-07-02 23:31:10', 'read'),
(156, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-07-02 23:31:17', 'read'),
(157, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-02 23:31:22', 'read'),
(158, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 23:35:09', 'read'),
(159, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 23:35:48', 'read'),
(160, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-02 23:35:53', 'read'),
(161, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-07-02 23:35:57', 'read'),
(162, 'jorandelgado1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 23:36:37', 'read'),
(163, 'jorandelgado1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-02 23:37:16', 'read'),
(164, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-07-02 23:37:21', 'read'),
(165, 'araza@gmail.com', 'User logged in', 'login', '2024-07-05 04:14:34', 'read'),
(166, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-05 05:17:06', 'read'),
(167, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-05 05:17:22', 'read'),
(168, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-08 08:24:47', 'read'),
(169, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-08 08:25:06', 'read'),
(170, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-08 08:26:34', 'read'),
(171, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-08 08:48:59', 'read'),
(172, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-08 08:49:11', 'read'),
(173, 'sample1@gmail.com', 'User logged in', 'login', '2024-07-08 08:51:04', 'read'),
(174, 'sample1@gmail.com', 'User logged out', 'logout', '2024-07-08 08:53:25', 'read'),
(175, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-08 08:55:53', 'read'),
(176, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-08 08:55:57', 'read'),
(177, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-08 22:10:58', 'read'),
(178, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-08 22:11:18', 'read'),
(179, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-08 22:22:48', 'read'),
(180, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-08 22:29:21', 'read'),
(181, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-08 22:30:46', 'read'),
(182, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-08 22:31:20', 'read'),
(183, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-09 00:31:38', 'read'),
(184, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-07-09 00:48:52', 'read'),
(185, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-07-09 00:56:18', 'read'),
(186, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-09 01:19:22', 'read'),
(187, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-09 01:20:03', 'read'),
(188, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-09 01:26:17', 'read'),
(189, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-09 23:26:09', 'read'),
(190, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-09 23:33:28', 'read'),
(191, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-09 23:40:13', 'read'),
(192, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-09 23:42:39', 'read'),
(193, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-09 23:43:57', 'read'),
(194, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-12 17:54:54', 'read'),
(195, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-12 18:11:40', 'read'),
(196, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-12 18:12:47', 'read'),
(197, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-07-12 18:35:03', 'read'),
(198, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-12 21:29:16', 'read'),
(199, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-15 16:06:52', 'read'),
(200, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-15 16:07:45', 'read'),
(201, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-15 16:41:16', 'read'),
(202, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-15 17:01:20', 'read'),
(203, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-15 17:11:19', 'read'),
(204, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-15 17:12:22', 'read'),
(205, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-16 03:38:37', 'read'),
(206, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-16 03:45:42', 'read'),
(207, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-22 02:13:01', 'read'),
(208, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-22 03:06:40', 'read'),
(209, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-22 03:46:00', 'read'),
(210, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-22 03:52:19', 'read'),
(211, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-22 03:54:41', 'read'),
(212, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-22 03:54:53', 'read'),
(213, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-22 03:56:38', 'read'),
(214, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 00:26:42', 'read'),
(215, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 00:50:28', 'read'),
(216, 'sample1@gmail.com', 'User logged in', 'login', '2024-07-23 00:50:47', 'read'),
(217, 'sample1@gmail.com', 'User logged out', 'logout', '2024-07-23 00:54:21', 'read'),
(218, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 00:54:25', 'read'),
(219, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-23 01:10:16', 'read'),
(220, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-23 01:19:02', 'read'),
(221, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-07-23 01:20:06', 'read'),
(222, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 01:20:52', 'read'),
(223, 'sample1@gmail.com', 'User logged in', 'login', '2024-07-23 01:21:00', 'read'),
(224, 'sample1@gmail.com', 'User logged out', 'logout', '2024-07-23 01:21:12', 'read'),
(225, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 01:21:16', 'read'),
(226, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 01:54:50', 'read'),
(227, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 01:56:59', 'read'),
(228, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 01:57:05', 'read'),
(229, 'sample1@gmail.com', 'User logged in', 'login', '2024-07-23 01:57:09', 'read'),
(230, 'sample1@gmail.com', 'User logged out', 'logout', '2024-07-23 01:57:23', 'read'),
(231, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 01:57:35', 'read'),
(232, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 01:58:45', 'read'),
(233, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 16:23:54', 'read'),
(234, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 16:24:22', 'read'),
(235, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 16:28:19', 'read'),
(236, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 16:28:41', 'read'),
(237, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 16:35:38', 'read'),
(238, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 16:35:49', 'read'),
(239, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-23 16:56:04', 'read'),
(240, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-23 16:57:15', 'read'),
(241, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-24 19:33:43', 'read'),
(242, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-07-24 19:35:22', 'read'),
(243, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-24 19:36:43', 'read'),
(244, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-30 18:14:38', 'read'),
(245, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-30 18:15:20', 'read'),
(246, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-30 18:16:16', 'read'),
(247, 'jorandelgado23@gmail.com', 'Changed password', 'password_change', '2024-07-30 18:22:26', 'read'),
(248, 'sample2@gmail.com', 'User logged in', 'login', '2024-07-30 18:45:22', 'read'),
(249, 'sample2@gmail.com', 'User logged out', 'logout', '2024-07-30 18:45:28', 'read'),
(250, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-01 22:24:55', 'read'),
(251, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-01 22:25:00', 'read'),
(252, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-01 22:28:43', 'read'),
(253, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-01 22:29:34', 'read'),
(254, 'jorandelgado23@gmail.com', 'Changed password', 'password_change', '2024-08-05 17:00:05', 'read'),
(255, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-05 17:06:04', 'read'),
(256, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-05 17:12:24', 'read'),
(257, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-05 17:12:29', 'read'),
(258, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-05 17:12:32', 'read'),
(259, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-06 16:56:32', 'read'),
(260, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-06 16:57:58', 'read'),
(261, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-06 17:06:15', 'read'),
(262, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-06 17:06:19', 'read'),
(263, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-06 17:08:07', 'read'),
(264, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-11 16:22:28', 'read'),
(265, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-11 16:22:56', 'read'),
(266, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-16 04:11:28', 'read'),
(267, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-08-16 04:12:45', 'read'),
(268, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-16 04:13:30', 'read'),
(269, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-20 18:21:03', 'read'),
(270, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-26 03:27:08', 'read'),
(271, 'sample2@gmail.com', 'User logged in', 'login', '2024-08-31 08:14:01', 'read'),
(272, 'sample2@gmail.com', 'User logged out', 'logout', '2024-08-31 08:14:16', 'read'),
(273, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-10 07:09:08', 'read'),
(274, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-10 07:10:44', 'read'),
(275, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-12 20:04:38', 'read'),
(276, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-12 20:23:03', 'read'),
(277, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-12 20:24:33', 'read'),
(278, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-12 20:35:32', 'read'),
(279, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-12 20:41:18', 'read'),
(280, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-12 20:41:28', 'read'),
(281, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-12 20:49:01', 'read'),
(282, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-12 20:51:24', 'read'),
(283, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-12 21:05:23', 'read'),
(284, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-12 21:29:21', 'read'),
(285, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-12 21:29:27', 'read'),
(286, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-12 21:39:19', 'read'),
(287, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-12 21:39:42', 'read'),
(288, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-13 00:01:55', 'read'),
(289, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-13 00:05:20', 'read'),
(290, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-13 01:19:48', 'read'),
(291, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-13 01:25:38', 'read'),
(292, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-13 06:25:27', 'read'),
(293, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-13 06:27:36', 'read'),
(294, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-13 06:31:56', 'read'),
(295, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-13 06:32:12', 'read'),
(296, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-13 06:32:21', 'read'),
(297, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-13 06:33:13', 'read'),
(298, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 18:50:38', 'read'),
(299, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 22:34:41', 'read'),
(300, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 22:50:40', 'read'),
(301, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-14 22:51:22', 'read'),
(302, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 22:51:26', 'read'),
(303, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-14 22:58:06', 'read'),
(304, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 22:58:09', 'read'),
(305, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-14 23:04:41', 'read'),
(306, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 23:04:47', 'read'),
(307, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-14 23:05:15', 'read'),
(308, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 23:05:18', 'read'),
(309, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-14 23:12:00', 'read'),
(310, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-14 23:12:04', 'read'),
(311, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-14 23:28:48', 'read'),
(312, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-14 23:29:07', 'read'),
(313, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-14 23:29:12', 'read'),
(314, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-14 23:32:58', 'read'),
(315, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-14 23:33:06', 'read'),
(316, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-14 23:34:12', 'read'),
(317, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-14 23:34:17', 'read'),
(318, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-14 23:36:53', 'read'),
(319, 'sample1@gmail.com', 'Inserted beneficiaries data', 'login', '2024-09-14 23:43:40', 'read'),
(320, 'sample1@gmail.com', 'Inserted beneficiaries data', 'login', '2024-09-14 23:43:55', 'read'),
(321, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-14 23:44:39', 'read'),
(322, 'sample1@gmail.com', 'Inserted beneficiaries data', 'login', '2024-09-14 23:46:11', 'read'),
(323, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-14 23:49:45', 'read'),
(324, 'sample1@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-14 23:57:09', 'read'),
(325, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:05:01', 'read'),
(326, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:05:05', 'read'),
(327, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:05:09', 'read'),
(328, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:05:13', 'read'),
(329, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:06:17', 'read'),
(330, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:06:19', 'read'),
(331, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:06:25', 'read'),
(332, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:06:27', 'read'),
(333, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:06:33', 'read'),
(334, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:06:35', 'read'),
(335, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:06:42', 'read'),
(336, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 00:06:53', 'read'),
(337, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-15 00:09:58', 'read'),
(338, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:10:06', 'read'),
(339, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:14:40', 'read'),
(340, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:14:44', 'read'),
(341, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:17:07', 'read'),
(342, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:17:10', 'read'),
(343, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:17:13', 'read'),
(344, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:17:21', 'read'),
(345, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:17:41', 'read'),
(346, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:17:54', 'read'),
(347, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-15 00:18:53', 'read'),
(348, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-15 00:20:41', 'read'),
(349, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:22:24', 'read'),
(350, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:22:43', 'read'),
(351, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:36:53', 'read'),
(352, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:36:59', 'read'),
(353, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:38:55', 'read'),
(354, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:39:52', 'read'),
(355, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-15 23:06:14', 'read'),
(356, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:07:36', 'read'),
(357, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:08:31', 'read'),
(358, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-15 23:14:25', 'read'),
(359, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:14:31', 'read'),
(360, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:20:29', 'read'),
(361, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:20:32', 'read'),
(362, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:23:17', 'read'),
(363, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:23:19', 'read'),
(364, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:26:58', 'read'),
(365, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-15 23:27:05', 'read'),
(366, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:27:09', 'read'),
(367, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:32:42', 'read'),
(368, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:32:45', 'read'),
(369, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:32:55', 'read'),
(370, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:33:28', 'read'),
(371, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-15 23:34:16', 'read'),
(372, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-16 00:05:49', 'read'),
(373, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-16 00:19:28', 'read'),
(374, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-16 00:27:31', 'read'),
(375, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-16 00:27:37', 'read'),
(376, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-16 00:29:29', 'read'),
(377, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-16 00:29:40', 'read'),
(378, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-16 00:29:46', 'read'),
(379, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 00:53:26', 'read'),
(380, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 01:25:40', 'read'),
(381, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 01:25:56', 'read'),
(382, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 01:33:11', 'read'),
(383, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 01:46:48', 'read'),
(384, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 07:10:42', 'read'),
(385, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:13:57', 'read'),
(386, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:18:32', 'read'),
(387, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:19:46', 'read'),
(388, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:32:05', 'read'),
(389, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 07:55:17', 'read'),
(390, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 07:55:24', 'read'),
(391, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 08:08:01', 'read'),
(392, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 08:12:19', 'read'),
(393, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 08:12:32', 'read'),
(394, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-19 22:42:57', 'read'),
(395, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-19 22:46:47', 'read'),
(396, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 00:40:35', 'read'),
(397, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 00:41:04', 'read'),
(398, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 00:41:49', 'read'),
(399, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 01:41:21', 'read'),
(400, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 01:41:29', 'read'),
(401, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 01:42:07', 'read'),
(402, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 02:00:52', 'read'),
(403, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 02:27:10', 'read'),
(404, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 02:44:06', 'read'),
(405, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 06:09:32', 'read'),
(406, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 06:09:46', 'read'),
(407, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:11:14', 'read'),
(408, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:25:06', 'read'),
(409, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:48:46', 'read'),
(410, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-22 23:04:21', 'read'),
(411, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-22 23:06:46', 'read'),
(412, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-22 23:07:07', 'read'),
(413, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-22 23:07:14', 'read'),
(414, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 05:22:47', 'read'),
(415, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 06:11:25', 'read'),
(416, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 06:49:49', 'read'),
(417, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 06:51:22', 'read'),
(418, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 06:51:57', 'read'),
(419, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 06:52:31', 'read'),
(420, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 06:53:27', 'read'),
(421, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 07:22:35', 'read'),
(422, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 07:22:52', 'read'),
(423, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 07:40:53', 'read'),
(424, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 07:41:18', 'read'),
(425, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 07:42:15', 'read'),
(426, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 07:43:00', 'read'),
(427, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 07:43:07', 'read'),
(428, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 07:45:03', 'read'),
(429, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-25 09:04:33', 'read'),
(430, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-25 09:06:25', 'read'),
(431, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 09:07:07', 'read'),
(432, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 09:08:17', 'read'),
(433, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 09:08:44', 'read'),
(434, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 09:08:50', 'read'),
(435, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-25 09:10:54', 'read'),
(436, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-25 09:11:39', 'read'),
(437, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 09:11:58', 'read'),
(438, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-25 09:12:37', 'read'),
(439, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 09:13:39', 'read'),
(440, 'jorandelgado23@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-09-25 09:17:59', 'read'),
(441, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-25 09:18:21', 'read'),
(442, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-25 09:21:21', 'read'),
(443, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-25 09:26:48', 'read'),
(444, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 17:25:24', 'read'),
(445, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 17:35:10', 'read'),
(446, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 17:52:40', 'read'),
(447, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 17:54:15', 'read'),
(448, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 17:54:28', 'read'),
(449, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-26 18:01:59', 'read'),
(450, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-26 18:02:05', 'read'),
(451, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 18:04:24', 'read'),
(452, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-26 18:05:05', 'read'),
(453, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-26 18:05:11', 'read'),
(454, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 18:07:25', 'read'),
(455, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 18:07:39', 'read'),
(456, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:09:01', 'read'),
(457, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:10:09', 'read'),
(458, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:12:37', 'read'),
(459, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:19:20', 'read'),
(460, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:21:49', 'read'),
(461, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:22:28', 'read'),
(462, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:26:59', 'read'),
(463, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:30:15', 'read'),
(464, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:32:42', 'read'),
(465, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 18:33:29', 'read'),
(466, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:34:11', 'read'),
(467, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:37:59', 'read'),
(468, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 19:00:38', 'read'),
(469, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-26 19:08:33', 'read'),
(470, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-26 19:08:41', 'read'),
(471, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 19:44:35', 'read'),
(472, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-26 19:46:32', 'read'),
(473, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-26 19:46:38', 'read'),
(474, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 19:55:39', 'read'),
(475, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 19:56:38', 'read'),
(476, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-26 19:56:56', 'read'),
(477, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 20:19:16', 'read'),
(478, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 20:19:50', 'read'),
(479, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 02:31:59', 'read'),
(480, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 02:33:03', 'read'),
(481, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 03:25:15', 'read'),
(482, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 03:46:00', 'read'),
(483, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 03:46:09', 'read'),
(484, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 03:48:21', 'read'),
(485, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 04:05:46', 'read'),
(486, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 04:06:54', 'read'),
(487, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 04:55:59', 'read'),
(488, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:00:39', 'read'),
(489, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:12:28', 'read'),
(490, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:22:59', 'read'),
(491, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:46:46', 'read'),
(492, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 06:03:10', 'read'),
(493, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 06:32:12', 'read'),
(494, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-27 06:54:12', 'read'),
(495, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-27 06:54:53', 'read'),
(496, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 07:12:36', 'read'),
(497, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-27 07:21:59', 'read'),
(498, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-27 07:23:38', 'read'),
(499, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-27 07:23:45', 'read'),
(500, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 07:36:36', 'read'),
(501, 'icievy@gmail.com', 'Updated milk tolerance for ID: 63', 'update', '2024-09-27 07:56:13', 'read'),
(502, 'icievy@gmail.com', 'Updated beneficiary details for ID: 90', 'update', '2024-09-27 08:05:45', 'read'),
(503, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-27 08:06:21', 'read'),
(504, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-27 08:06:28', 'read'),
(505, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-27 08:06:35', 'read'),
(506, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 105', 'delete', '2024-09-27 08:07:21', 'read'),
(507, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 08:08:07', 'read'),
(508, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 08:09:20', 'read'),
(509, 'icievy@gmail.com', 'Deleted milk component record for student: ewan diba (ID: 66)', 'delete', '2024-09-27 08:09:23', 'read'),
(510, 'jdpalasin@gmail.com', 'Deleted user with email: jdpalasin@gmail.com (ID: 9)', 'delete', '2024-09-27 08:12:51', 'read'),
(511, 'sample2@gmail.com', 'Deleted user with email: sample2@gmail.com (ID: 45)', 'delete', '2024-09-27 08:13:08', 'read'),
(512, 'icievy@gmail.com', 'Updated milk tolerance for ID: 63', 'update', '2024-09-27 08:53:30', 'read'),
(513, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-29 00:47:28', 'read'),
(514, 'icievy@gmail.com', 'Updated beneficiary details for ID: 104', 'update', '2024-09-29 00:47:40', 'read'),
(515, 'icievy@gmail.com', 'Deleted milk component record for student: sino ba yan (ID: 63)', 'delete', '2024-09-29 00:47:48', 'read'),
(516, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-29 00:47:59', 'read'),
(517, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-29 00:48:39', 'read'),
(518, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-29 00:49:01', 'read'),
(519, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-29 00:49:12', 'read'),
(520, 'sample1@gmail.com', 'Deleted user with email: sample1@gmail.com (ID: 46)', 'delete', '2024-09-29 00:49:24', 'read'),
(521, 'icievy@gmail.com', 'Deleted user with email: icievy@gmail.com (ID: 48)', 'delete', '2024-09-29 00:52:32', 'read'),
(522, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-29 00:53:25', 'read'),
(523, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-29 00:54:16', 'read'),
(524, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-29 00:54:23', 'read'),
(525, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-29 00:54:34', 'read'),
(526, 'icievy@gmail.com', 'Deleted user with email: icievy@gmail.com (ID: 49)', 'delete', '2024-09-29 00:54:41', 'read'),
(527, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-29 00:57:45', 'read'),
(528, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 06:00:04', 'read'),
(529, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 07:01:03', 'read'),
(530, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 07:11:52', 'read'),
(531, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 07:44:33', 'read'),
(532, 'jorandelgado1@gmail.com', 'Deleted user with email: jorandelgado1@gmail.com (ID: 47)', 'delete', '2024-09-30 07:56:17', 'read'),
(533, 'jayvee1@gmail.com', 'Deleted user with email: jayvee1@gmail.com (ID: 50)', 'delete', '2024-09-30 08:30:53', 'read'),
(534, 'jayvee1@gmail.com', 'Deleted user with email: jayvee1@gmail.com (ID: 53)', 'delete', '2024-09-30 09:10:46', 'read'),
(535, 'icievy@gmail.com', 'Deleted user with email: icievy@gmail.com (ID: 55)', 'delete', '2024-09-30 09:10:51', 'read'),
(536, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 09:32:53', 'read'),
(537, 'jayvee1@gmail.com', 'User logged in', 'login', '2024-09-30 09:57:42', 'read'),
(538, 'jayvee1@gmail.com', 'User logged out', 'logout', '2024-09-30 10:00:34', 'read'),
(539, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 10:00:51', 'read'),
(540, 'jayvee1@gmail.com', 'User logged in', 'login', '2024-09-30 10:05:46', 'read'),
(541, 'jayvee1@gmail.com', 'User logged out', 'logout', '2024-09-30 10:05:51', 'read'),
(542, 'jayvee1@gmail.com', 'User logged in', 'login', '2024-09-30 10:22:00', 'read'),
(543, 'jayvee1@gmail.com', 'User logged out', 'logout', '2024-09-30 10:22:07', 'read'),
(544, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 10:22:14', 'read'),
(545, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 10:23:41', 'read'),
(546, 'icievy@gmail.com', 'Deleted user with email: icievy@gmail.com (ID: 57)', 'delete', '2024-09-30 10:33:13', 'read'),
(547, 'jayvee1@gmail.com', 'Deleted user with email: jayvee1@gmail.com (ID: 56)', 'delete', '2024-09-30 11:24:52', 'read'),
(548, 'jorandelgado23@gmail.com', 'Updated user with email: jorandelgado23@gmail.com (ID: 16)', 'update', '2024-09-30 11:27:02', 'read'),
(549, 'jorandelgado23@gmail.com', 'Updated user with email: jorandelgado23@gmail.com (ID: 16)', 'update', '2024-09-30 11:29:03', 'read'),
(550, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-09-30 11:29:59', 'read'),
(551, 'javee@gmail.com', 'Created user with email: javee@gmail.com', 'create', '2024-09-30 11:31:26', 'read'),
(552, 'javee@gmail.com', 'User logged in', 'login', '2024-09-30 11:31:57', 'read'),
(553, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:32:15', 'read'),
(554, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-30 11:36:06', 'read'),
(555, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:40:58', 'read'),
(556, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:42:12', 'read'),
(557, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:43:20', 'read'),
(558, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:43:25', 'read'),
(559, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:44:13', 'read'),
(560, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:44:18', 'read'),
(561, 'icievy@gmail.com', 'Deleted milk component record for student: try ko lang (ID: 68)', 'delete', '2024-09-30 11:44:21', 'read'),
(562, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-30 11:44:26', 'read'),
(563, 'icievy@gmail.com', 'Updated milk tolerance for ID: 69', 'update', '2024-09-30 11:44:37', 'read'),
(564, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-09-30 11:45:20', 'read'),
(565, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:45:29', 'read'),
(566, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:45:36', 'read'),
(567, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-09-30 11:45:46', 'read'),
(568, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:45:49', 'read'),
(569, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:45:55', 'read'),
(570, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-09-30 11:48:52', 'read'),
(571, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-09-30 11:51:16', 'read'),
(572, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-09-30 11:57:27', 'read'),
(573, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:57:45', 'read'),
(574, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:57:51', 'read'),
(575, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-09-30 11:58:03', 'read'),
(576, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:58:43', 'read'),
(577, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 12:01:47', 'read'),
(578, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 12:02:45', 'read'),
(579, 'icievy@gmail.com', 'Updated milk tolerance for ID: 69', 'update', '2024-09-30 12:05:31', 'read'),
(580, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 12:05:46', 'read'),
(581, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 12:06:01', 'read'),
(582, 'javee@gmail.com', 'Deleted user with email: javee@gmail.com (ID: 59)', 'delete', '2024-09-30 12:06:48', 'read'),
(583, 'palasin@gmail.com', 'Created user with email: palasin@gmail.com', 'create', '2024-09-30 12:07:53', 'read'),
(584, 'gaza@gmail.com', 'Created user with email: gaza@gmail.com', 'create', '2024-09-30 12:08:56', 'read'),
(585, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 17:36:51', 'read'),
(586, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-30 17:49:47', 'read'),
(587, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 18:15:35', 'read'),
(588, 'icievy@gmail.com', 'Updated beneficiary details for ID: 107', 'update', '2024-09-30 18:41:44', 'read'),
(589, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 19:08:50', 'read'),
(590, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-01 00:31:28', 'read'),
(591, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-01 00:33:18', 'read'),
(592, 'jorandelgado23@gmail.com', 'Updated user with email: jorandelgado23@gmail.com (ID: 16)', 'update', '2024-10-01 00:34:17', 'read'),
(593, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 00:35:09', 'read'),
(594, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 00:51:50', 'read'),
(595, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 00:51:53', 'read'),
(596, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 00:51:55', 'read'),
(597, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 00:52:12', 'read'),
(598, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 00:54:58', 'read'),
(599, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-01 00:55:10', 'read'),
(600, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:42:00', 'read'),
(601, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 01:48:45', 'read'),
(602, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:48:50', 'read'),
(603, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:48:53', 'read'),
(604, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 01:56:43', 'read'),
(605, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:56:51', 'read'),
(606, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:03:04', 'read'),
(607, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:03:12', 'read'),
(608, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:03:31', 'read'),
(609, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:03:39', 'read'),
(610, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:42:04', 'read'),
(611, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:42:08', 'read'),
(612, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 02:43:25', 'read'),
(613, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:43:29', 'read'),
(614, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:43:31', 'read'),
(615, 'icievy@gmail.com', 'Updated milk tolerance for ID: 69', 'update', '2024-10-01 02:52:22', 'read'),
(616, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-01 02:52:39', 'read'),
(617, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-01 02:53:26', 'read'),
(618, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 02:54:43', 'read'),
(619, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:55:22', 'read'),
(620, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:55:41', 'read'),
(621, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:04:39', 'read'),
(622, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:14:23', 'read'),
(623, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 03:35:39', 'read'),
(624, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 03:35:43', 'read'),
(625, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 03:35:48', 'read'),
(626, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 03:36:53', 'read'),
(627, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 03:36:55', 'read'),
(628, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 03:36:58', 'read'),
(629, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 03:40:54', 'read'),
(630, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 03:41:52', 'read'),
(631, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:46:39', 'read'),
(632, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:46:45', 'read'),
(633, 'icievy@gmail.com', 'Updated beneficiary details for ID: 107', 'update', '2024-10-01 03:59:11', 'read'),
(634, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 108', 'delete', '2024-10-01 03:59:17', 'read'),
(635, 'icievy@gmail.com', 'Deleted milk component record for student: try ko lang (ID: 71)', 'delete', '2024-10-01 03:59:31', 'read'),
(636, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-01 03:59:40', 'read'),
(637, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 04:00:03', 'read'),
(638, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-01 04:01:07', 'read'),
(639, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-01 04:22:43', 'read'),
(640, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 04:35:09', 'read'),
(641, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 04:35:52', 'read'),
(642, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-01 04:35:59', 'read'),
(643, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 04:51:49', 'read'),
(644, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 07:11:36', 'read'),
(645, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 04:54:55', 'read'),
(646, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:18:26', 'read'),
(647, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-02 06:18:38', 'read'),
(648, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 06:30:50', 'read'),
(649, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:35:50', 'read'),
(650, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-02 06:35:59', 'read'),
(651, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 06:36:52', 'read'),
(652, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:36:59', 'read'),
(653, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-02 06:37:06', 'read'),
(654, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 06:38:34', 'read'),
(655, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:40:13', 'read'),
(656, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:40:17', 'read'),
(657, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:55:34', 'read'),
(658, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:55:41', 'read'),
(659, 'icievy@gmail.com', 'Deleted milk component record for student: try ko lang (ID: 72)', 'delete', '2024-10-02 06:55:44', 'read'),
(660, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-02 06:55:49', 'read'),
(661, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:59:33', 'read'),
(662, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-02 06:59:38', 'read'),
(663, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-02 07:03:23', 'read'),
(664, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 07:11:21', 'read'),
(665, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 08:18:28', 'read'),
(666, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 02:54:40', 'read'),
(667, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 03:22:06', 'read'),
(668, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 04:10:57', 'read'),
(669, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 04:11:07', 'read'),
(670, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-04 04:46:58', 'read'),
(671, 'jorandelgado1@gmail.com', 'Created user with email: jorandelgado1@gmail.com', 'create', '2024-10-04 04:47:39', 'read'),
(672, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-04 04:47:48', 'read');
INSERT INTO `recent_activity` (`id`, `email`, `activity`, `activity_type`, `timestamp`, `status`) VALUES
(673, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-04 04:48:09', 'read'),
(674, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:02:03', 'read'),
(675, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:02:20', 'read'),
(676, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:03:25', 'read'),
(677, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:04:04', 'read'),
(678, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-04 05:08:46', 'read'),
(679, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 07:49:06', 'read'),
(680, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 07:50:59', 'read'),
(681, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 08:00:39', 'read'),
(682, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-04 18:25:57', 'read'),
(683, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 18:26:22', 'read'),
(684, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-04 18:44:00', 'read'),
(685, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-04 21:24:30', 'read'),
(686, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-04 21:25:29', 'read'),
(687, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-04 21:49:29', 'read'),
(688, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 22:17:05', 'read'),
(689, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 22:20:10', 'read'),
(690, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 22:20:51', 'read'),
(691, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 22:22:56', 'read'),
(692, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 22:23:43', 'read'),
(693, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 00:45:28', 'read'),
(694, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 73)', 'delete', '2024-10-05 00:46:56', 'read'),
(695, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 02:27:19', 'read'),
(696, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-05 02:32:11', 'read'),
(697, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 04:08:57', 'read'),
(698, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-05 05:25:55', 'read'),
(699, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-05 05:27:03', 'read'),
(700, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 17:24:41', 'read'),
(701, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-05 20:28:42', 'read'),
(702, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 21:16:20', 'read'),
(703, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-05 22:44:44', 'read'),
(704, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 04:27:23', 'read'),
(705, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 06:21:56', 'read'),
(706, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 06:25:01', 'read'),
(707, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 06:29:00', 'read'),
(708, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 18:19:16', 'read'),
(709, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 18:19:24', 'read'),
(710, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 18:20:16', 'read'),
(711, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 18:22:15', 'read'),
(712, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 18:22:18', 'read'),
(713, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-06 18:30:18', 'read'),
(714, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-06 18:40:02', 'read'),
(715, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:17', 'read'),
(716, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:27', 'read'),
(717, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:33', 'read'),
(718, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:40', 'read'),
(719, 'icievy@gmail.com', 'Updated milk tolerance for ID: 74', 'update', '2024-10-06 18:58:58', 'read'),
(720, 'icievy@gmail.com', 'Updated milk tolerance for ID: 75', 'update', '2024-10-06 18:59:04', 'read'),
(721, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-10-06 18:59:22', 'read'),
(722, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-10-06 18:59:30', 'read'),
(723, 'jayvee@gmail.com', 'Created user with email: jayvee@gmail.com', 'create', '2024-10-06 19:03:23', 'read'),
(724, 'jayvee@gmail.com', 'Updated user with email: jayvee@gmail.com (ID: 63)', 'update', '2024-10-06 19:04:00', 'read'),
(725, 'jayvee@gmail.com', 'Deleted user with email: jayvee@gmail.com (ID: 63)', 'delete', '2024-10-06 19:04:07', 'read'),
(726, 'jorandelgado23@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-10-06 19:04:25', 'read'),
(727, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-06 19:07:24', 'read'),
(728, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 19:11:01', 'read'),
(729, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 19:11:03', 'read'),
(730, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 19:30:36', 'read'),
(731, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 19:30:37', 'read'),
(732, 'jorandelgado23@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-10-06 19:32:40', 'read'),
(733, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-06 19:33:20', 'read'),
(734, 'jorandelgado1@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 19:34:01', 'read'),
(735, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-06 19:34:17', 'read'),
(736, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-06 19:34:26', 'read'),
(737, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 19:36:41', 'read'),
(738, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 19:50:39', 'read'),
(739, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 21:01:20', 'read'),
(740, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 03:17:47', 'read'),
(741, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 03:32:26', 'read'),
(742, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 18:11:06', 'read'),
(743, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 18:12:18', 'read'),
(744, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 18:12:37', 'read'),
(745, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 18:21:02', 'read'),
(746, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:16:38', 'read'),
(747, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:16:59', 'read'),
(748, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:17:04', 'read'),
(749, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:18:10', 'read'),
(750, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:18:14', 'read'),
(751, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:25:32', 'read'),
(752, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:25:38', 'read'),
(753, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:30:20', 'read'),
(754, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:30:25', 'read'),
(755, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:18:16', 'read'),
(756, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:18:21', 'read'),
(757, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:24:05', 'read'),
(758, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:24:10', 'read'),
(759, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:30:37', 'read'),
(760, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:30:48', 'read'),
(761, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:36:07', 'read'),
(762, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:36:16', 'read'),
(763, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 20:39:05', 'read'),
(764, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 20:52:38', 'read'),
(765, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:13:31', 'read'),
(766, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:18:21', 'read'),
(767, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:20:53', 'read'),
(768, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:22:23', 'read'),
(769, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:23:43', 'read'),
(770, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:25:00', 'read'),
(771, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:25:29', 'read'),
(772, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:33:41', 'read'),
(773, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:33:57', 'read'),
(774, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:38:53', 'read'),
(775, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 21:39:24', 'read'),
(776, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 21:40:06', 'read'),
(777, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:42:43', 'read'),
(778, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-07 21:43:44', 'read'),
(779, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 21:43:53', 'read'),
(780, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 21:43:56', 'read'),
(781, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 03:40:19', 'read'),
(782, 'icievy@gmail.com', 'Updated milk tolerance for ID: 74', 'update', '2024-10-08 04:43:00', 'read'),
(783, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 06:40:03', 'read'),
(784, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 06:45:39', 'read'),
(785, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 06:45:54', 'read'),
(786, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 08:04:45', 'read'),
(787, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 08:05:54', 'read'),
(788, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 08:09:27', 'read'),
(789, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 08:11:49', 'read'),
(790, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 08:13:07', 'read'),
(791, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 08:38:29', 'read'),
(792, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 09:26:53', 'read'),
(793, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 09:27:08', 'read'),
(794, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 09:35:16', 'read'),
(795, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 09:47:55', 'read'),
(796, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 10:26:20', 'read'),
(797, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 10:37:54', 'read'),
(798, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 10:38:10', 'read'),
(799, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 10:38:18', 'read'),
(800, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:21:07', 'read'),
(801, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:25:43', 'read'),
(802, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 17:26:01', 'read'),
(803, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:29:57', 'read'),
(804, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-08 17:35:17', 'read'),
(805, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:35:24', 'read'),
(806, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:35:27', 'read'),
(807, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:36:36', 'read'),
(808, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 17:36:45', 'read'),
(809, 'jorandelgado23@gmail.com', 'Changed password', 'password_change', '2024-10-08 17:38:00', 'read'),
(810, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 17:38:05', 'read'),
(811, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:51:08', 'read'),
(812, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:53:21', 'read'),
(813, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 17:53:29', 'read'),
(814, 'jorandelgado1@gmail.com', 'Deleted user with email: jorandelgado1@gmail.com (ID: 62)', 'delete', '2024-10-08 17:57:21', 'read'),
(815, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:01:48', 'read'),
(816, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-08 18:04:06', 'read'),
(817, 'icievy@gmail.com', 'Updated beneficiary details for ID: 111', 'update', '2024-10-08 18:04:13', 'read'),
(818, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 115', 'delete', '2024-10-08 18:06:28', 'read'),
(819, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:07:23', 'read'),
(820, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 18:07:32', 'read'),
(821, 'jorandelgado23@gmail.com', 'Updated user with email: jorandelgado23@gmail.com (ID: 16)', 'update', '2024-10-08 18:08:13', 'read'),
(822, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:09:36', 'read'),
(823, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:10:24', 'read'),
(824, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 18:14:20', 'read'),
(825, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 18:15:02', 'read'),
(826, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:17:23', 'read'),
(827, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:31:52', 'read'),
(828, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:31:58', 'read'),
(829, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:32:02', 'read'),
(830, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 18:32:46', 'read'),
(831, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 19:25:12', 'read'),
(832, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 19:28:31', 'read'),
(833, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 19:29:19', 'read'),
(834, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-08 19:29:29', 'read'),
(835, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 19:29:34', 'read'),
(836, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 19:29:42', 'read'),
(837, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-08 19:33:37', 'read'),
(838, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 19:33:55', 'read'),
(839, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 19:38:23', 'read'),
(840, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-09 04:06:58', 'read'),
(841, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-09 04:07:27', 'read'),
(842, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 117', 'delete', '2024-10-09 04:48:11', 'read'),
(843, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-09 07:34:54', 'read'),
(844, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-09 08:54:19', 'read'),
(845, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 05:59:29', 'read'),
(846, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 06:51:12', 'read'),
(847, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 06:52:32', 'read'),
(848, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 06:54:03', 'read'),
(849, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-10 06:55:16', 'read'),
(850, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 09:24:12', 'read'),
(851, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 10:33:36', 'read'),
(852, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-10 10:33:46', 'read'),
(853, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 10:48:31', 'read'),
(854, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-10 11:15:00', 'read'),
(855, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-10 11:15:23', 'read'),
(856, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 11:26:49', 'read'),
(857, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-10 11:26:59', 'read'),
(858, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 11:30:30', 'read'),
(859, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 11:39:42', 'read'),
(860, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-10 11:39:56', 'read'),
(861, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 11:41:04', 'read'),
(862, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 11:41:34', 'read'),
(863, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-10 11:42:35', 'read'),
(864, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 11:44:55', 'read'),
(865, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-10-10 11:49:50', 'read'),
(866, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-10-10 11:49:50', 'read'),
(867, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-10-10 11:51:08', 'read'),
(868, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-10-10 11:52:02', 'read'),
(869, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-10-10 11:52:37', 'read'),
(870, 'icievy@gmail.com', 'Updated user with email: icievy@gmail.com (ID: 58)', 'update', '2024-10-10 11:53:14', 'read'),
(871, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 12:00:38', 'read'),
(872, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 23:21:16', 'read'),
(873, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-11 01:25:00', 'read'),
(874, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-11 06:07:33', 'read'),
(875, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-13 05:46:10', 'read'),
(876, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-13 05:50:36', 'read'),
(877, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-13 05:50:45', 'read'),
(878, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-13 06:14:08', 'read'),
(879, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-13 08:16:56', 'read'),
(880, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 74)', 'delete', '2024-10-13 08:47:58', 'read'),
(881, 'icievy@gmail.com', 'Deleted milk component record for student: sample name (ID: 75)', 'delete', '2024-10-13 08:48:00', 'read'),
(882, 'icievy@gmail.com', 'Deleted milk component record for student: jelo dikitanan (ID: 76)', 'delete', '2024-10-13 08:48:02', 'read'),
(883, 'icievy@gmail.com', 'Deleted milk component record for student: bill jeff (ID: 77)', 'delete', '2024-10-13 08:48:04', 'read'),
(884, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-13 08:48:17', 'read'),
(885, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-13 09:04:26', 'read'),
(886, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-13 09:04:41', 'read'),
(887, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-13 09:41:38', 'read'),
(888, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 03:53:34', 'read'),
(889, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 06:54:40', 'read'),
(890, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 06:55:46', 'read'),
(891, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 06:55:56', 'read'),
(892, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 06:56:07', 'read'),
(893, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-14 07:46:57', 'read'),
(894, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 07:48:06', 'read'),
(895, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-14 07:48:22', 'read'),
(896, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 17:38:36', 'read'),
(897, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-14 17:44:17', 'read'),
(898, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:30:09', 'new'),
(899, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-14 18:37:16', 'new'),
(900, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-14 18:37:24', 'new'),
(901, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:38:58', 'new'),
(902, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 18:42:17', 'new'),
(903, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:48:43', 'new'),
(904, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 79)', 'delete', '2024-10-14 18:51:20', 'new'),
(905, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:53:03', 'new'),
(906, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-10-14 18:57:08', 'new'),
(907, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 19:00:11', 'new'),
(908, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-15 01:40:49', 'new'),
(909, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-15 01:41:14', 'new'),
(910, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 01:54:55', 'new'),
(911, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 01:55:06', 'new'),
(912, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 01:59:59', 'new'),
(913, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 02:00:10', 'new'),
(914, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 80)', 'delete', '2024-10-15 02:00:20', 'new'),
(915, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-15 02:01:14', 'new'),
(916, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-15 02:43:06', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `sbfp_recent_activity`
--

CREATE TABLE `sbfp_recent_activity` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','read') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sbfp_recent_activity`
--

INSERT INTO `sbfp_recent_activity` (`id`, `email`, `activity`, `activity_type`, `timestamp`, `status`) VALUES
(1, 'sample1@gmail.com', 'User logged in', '', '2024-09-15 00:14:44', 'read'),
(2, 'sample1@gmail.com', 'User logged in', '', '2024-09-15 00:17:54', 'read'),
(3, 'sample1@gmail.com', 'Inserted beneficiaries data', '', '2024-09-15 00:18:53', 'read'),
(4, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-15 00:20:41', 'read'),
(5, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:22:24', 'read'),
(6, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:22:43', 'read'),
(7, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:36:53', 'read'),
(8, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:36:59', 'read'),
(9, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 00:38:55', 'read'),
(10, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 00:39:52', 'read'),
(11, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:07:36', 'read'),
(12, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:08:31', 'read'),
(13, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-15 23:14:25', 'read'),
(14, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:14:31', 'read'),
(15, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:20:29', 'read'),
(16, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:20:32', 'read'),
(17, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:23:17', 'read'),
(18, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:23:19', 'read'),
(19, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:26:58', 'read'),
(20, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-15 23:27:05', 'read'),
(21, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-15 23:27:09', 'read'),
(22, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:32:42', 'read'),
(23, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:32:45', 'read'),
(24, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-15 23:32:55', 'read'),
(25, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-15 23:33:28', 'read'),
(26, 'sample1@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-15 23:34:16', 'read'),
(27, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-16 00:19:28', 'read'),
(28, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-16 00:27:31', 'read'),
(29, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-16 00:29:29', 'read'),
(30, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-16 00:29:40', 'read'),
(31, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 00:53:26', 'read'),
(32, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 01:25:40', 'read'),
(33, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:13:57', 'read'),
(34, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:18:32', 'read'),
(35, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:19:46', 'read'),
(36, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 07:32:05', 'read'),
(37, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 07:55:17', 'read'),
(38, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 08:08:01', 'read'),
(39, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 08:12:19', 'read'),
(40, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-19 22:46:47', 'read'),
(41, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 00:40:35', 'read'),
(42, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 00:41:49', 'read'),
(43, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 01:41:21', 'read'),
(44, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 01:42:07', 'read'),
(45, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 02:00:52', 'read'),
(46, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 02:44:06', 'read'),
(47, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 06:09:46', 'read'),
(48, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:11:14', 'read'),
(49, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:25:06', 'read'),
(50, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:48:46', 'read'),
(51, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-22 23:06:46', 'read'),
(52, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-22 23:07:07', 'read'),
(53, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 06:11:25', 'read'),
(54, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 06:51:22', 'read'),
(55, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 06:53:27', 'read'),
(56, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 07:22:35', 'read'),
(57, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 07:40:53', 'read'),
(58, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 07:41:18', 'read'),
(59, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 07:42:15', 'read'),
(60, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 07:43:00', 'read'),
(61, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-25 07:45:03', 'read'),
(62, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-25 09:04:33', 'read'),
(63, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-25 09:06:25', 'read'),
(64, 'sample2@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 09:08:17', 'read'),
(65, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-25 09:08:44', 'read'),
(66, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-25 09:10:54', 'read'),
(67, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-25 09:11:39', 'read'),
(68, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-25 09:11:58', 'read'),
(69, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-25 09:12:37', 'read'),
(70, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-25 09:21:21', 'read'),
(71, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-25 09:26:48', 'read'),
(72, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 17:25:24', 'read'),
(73, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 17:35:10', 'read'),
(74, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 17:52:40', 'read'),
(75, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 17:54:15', 'read'),
(76, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 17:54:28', 'read'),
(77, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 18:04:24', 'read'),
(78, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 18:07:25', 'read'),
(79, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 18:07:39', 'read'),
(80, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:09:01', 'read'),
(81, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:10:09', 'read'),
(82, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:12:37', 'read'),
(83, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:19:20', 'read'),
(84, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:21:49', 'read'),
(85, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:22:28', 'read'),
(86, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:26:59', 'read'),
(87, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:30:15', 'read'),
(88, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:32:42', 'read'),
(89, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 18:33:29', 'read'),
(90, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:34:11', 'read'),
(91, 'icievy@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-26 18:37:59', 'read'),
(92, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 19:00:38', 'read'),
(93, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-26 19:08:33', 'read'),
(94, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 19:44:35', 'read'),
(95, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-26 19:46:32', 'read'),
(96, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 19:55:39', 'read'),
(97, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 19:56:38', 'read'),
(98, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-26 19:56:56', 'read'),
(99, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-26 20:19:16', 'read'),
(100, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-26 20:19:50', 'read'),
(101, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 02:31:59', 'read'),
(102, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 02:33:03', 'read'),
(103, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 03:25:15', 'read'),
(104, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 03:46:00', 'read'),
(105, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 03:46:09', 'read'),
(106, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 03:48:21', 'read'),
(107, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 04:05:46', 'read'),
(108, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 04:06:54', 'read'),
(109, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 04:55:59', 'read'),
(110, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:00:39', 'read'),
(111, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:12:28', 'read'),
(112, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:22:59', 'read'),
(113, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 05:46:46', 'read'),
(114, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 06:03:10', 'read'),
(115, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 06:32:12', 'read'),
(116, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-27 06:54:12', 'read'),
(117, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 07:12:36', 'read'),
(118, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-27 07:21:59', 'read'),
(119, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-27 07:23:38', 'read'),
(120, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-27 07:36:36', 'read'),
(121, 'icievy@gmail.com', 'Updated milk tolerance for ID: 63', 'update', '2024-09-27 07:56:13', 'read'),
(122, 'icievy@gmail.com', 'Updated beneficiary details for ID: 90', 'update', '2024-09-27 08:05:45', 'read'),
(123, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-27 08:06:21', 'read'),
(124, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-27 08:06:28', 'read'),
(125, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 105', 'delete', '2024-09-27 08:07:21', 'read'),
(126, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 08:08:07', 'read'),
(127, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-27 08:09:20', 'read'),
(128, 'icievy@gmail.com', 'Deleted milk component record for student: ewan diba (ID: 66)', 'delete', '2024-09-27 08:09:23', 'read'),
(129, 'icievy@gmail.com', 'Updated milk tolerance for ID: 63', 'update', '2024-09-27 08:53:30', 'read'),
(130, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-29 00:47:28', 'read'),
(131, 'icievy@gmail.com', 'Updated beneficiary details for ID: 104', 'update', '2024-09-29 00:47:40', 'read'),
(132, 'icievy@gmail.com', 'Deleted milk component record for student: sino ba yan (ID: 63)', 'delete', '2024-09-29 00:47:48', 'read'),
(133, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-29 00:47:59', 'read'),
(134, 'sample1@gmail.com', 'User logged in', 'login', '2024-09-29 00:48:39', 'read'),
(135, 'sample1@gmail.com', 'User logged out', 'logout', '2024-09-29 00:49:01', 'read'),
(136, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-29 00:53:25', 'read'),
(137, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-29 00:54:16', 'read'),
(138, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-29 00:54:23', 'read'),
(139, 'jayvee1@gmail.com', 'User logged in', 'login', '2024-09-30 09:57:42', 'read'),
(140, 'jayvee1@gmail.com', 'User logged out', 'logout', '2024-09-30 10:00:34', 'read'),
(141, 'jayvee1@gmail.com', 'User logged in', 'login', '2024-09-30 10:05:46', 'read'),
(142, 'jayvee1@gmail.com', 'User logged out', 'logout', '2024-09-30 10:05:51', 'read'),
(143, 'jayvee1@gmail.com', 'User logged in', 'login', '2024-09-30 10:22:00', 'read'),
(144, 'jayvee1@gmail.com', 'User logged out', 'logout', '2024-09-30 10:22:07', 'read'),
(145, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:32:15', 'read'),
(146, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-30 11:36:06', 'read'),
(147, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:40:58', 'read'),
(148, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:42:12', 'read'),
(149, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:43:20', 'read'),
(150, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:43:25', 'read'),
(151, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:44:13', 'read'),
(152, 'icievy@gmail.com', 'Updated milk tolerance for ID: 68', 'update', '2024-09-30 11:44:18', 'read'),
(153, 'icievy@gmail.com', 'Deleted milk component record for student: try ko lang (ID: 68)', 'delete', '2024-09-30 11:44:21', 'read'),
(154, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-09-30 11:44:26', 'read'),
(155, 'icievy@gmail.com', 'Updated milk tolerance for ID: 69', 'update', '2024-09-30 11:44:37', 'read'),
(156, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:45:29', 'read'),
(157, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:45:36', 'read'),
(158, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:45:49', 'read'),
(159, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:45:55', 'read'),
(160, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-09-30 11:48:52', 'read'),
(161, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-09-30 11:57:27', 'read'),
(162, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:57:45', 'read'),
(163, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 11:57:51', 'read'),
(164, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-09-30 11:58:03', 'read'),
(165, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 11:58:43', 'read'),
(166, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 12:02:45', 'read'),
(167, 'icievy@gmail.com', 'Updated milk tolerance for ID: 69', 'update', '2024-09-30 12:05:31', 'read'),
(168, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 12:05:46', 'read'),
(169, 'icievy@gmail.com', 'User logged in', 'login', '2024-09-30 18:15:35', 'read'),
(170, 'icievy@gmail.com', 'Updated beneficiary details for ID: 107', 'update', '2024-09-30 18:41:44', 'read'),
(171, 'icievy@gmail.com', 'User logged out', 'logout', '2024-09-30 19:08:50', 'read'),
(172, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 00:35:09', 'read'),
(173, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 00:51:50', 'read'),
(174, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 00:51:53', 'read'),
(175, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 00:51:55', 'read'),
(176, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 00:52:12', 'read'),
(177, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 00:54:58', 'read'),
(178, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:42:00', 'read'),
(179, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 01:48:45', 'read'),
(180, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:48:50', 'read'),
(181, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:48:53', 'read'),
(182, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 01:56:43', 'read'),
(183, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 01:56:51', 'read'),
(184, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:03:04', 'read'),
(185, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:03:12', 'read'),
(186, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:03:31', 'read'),
(187, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:03:39', 'read'),
(188, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:42:04', 'read'),
(189, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:42:08', 'read'),
(190, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 02:43:25', 'read'),
(191, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:43:29', 'read'),
(192, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:43:31', 'read'),
(193, 'icievy@gmail.com', 'Updated milk tolerance for ID: 69', 'update', '2024-10-01 02:52:22', 'read'),
(194, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-01 02:53:26', 'read'),
(195, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 02:54:43', 'read'),
(196, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 02:55:22', 'read'),
(197, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 02:55:41', 'read'),
(198, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:04:39', 'read'),
(199, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:14:23', 'read'),
(200, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 03:35:39', 'read'),
(201, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 03:35:43', 'read'),
(202, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 03:35:48', 'read'),
(203, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-01 03:36:53', 'read'),
(204, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 03:36:55', 'read'),
(205, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 03:36:58', 'read'),
(206, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 03:40:54', 'read'),
(207, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 03:41:52', 'read'),
(208, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:46:39', 'read'),
(209, 'icievy@gmail.com', 'Updated milk tolerance for ID: 71', 'update', '2024-10-01 03:46:45', 'read'),
(210, 'icievy@gmail.com', 'Updated beneficiary details for ID: 107', 'update', '2024-10-01 03:59:11', 'read'),
(211, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 108', 'delete', '2024-10-01 03:59:17', 'read'),
(212, 'icievy@gmail.com', 'Deleted milk component record for student: try ko lang (ID: 71)', 'delete', '2024-10-01 03:59:31', 'read'),
(213, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-01 03:59:40', 'read'),
(214, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 04:00:03', 'read'),
(215, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 04:35:09', 'read'),
(216, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 04:35:52', 'read'),
(217, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-01 04:51:49', 'read'),
(218, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-01 07:11:36', 'read'),
(219, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 04:54:55', 'read'),
(220, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:18:26', 'read'),
(221, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 06:30:50', 'read'),
(222, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:35:50', 'read'),
(223, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 06:36:52', 'read'),
(224, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:36:59', 'read'),
(225, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 06:38:34', 'read'),
(226, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:40:13', 'read'),
(227, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:40:17', 'read'),
(228, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:55:34', 'read'),
(229, 'icievy@gmail.com', 'Updated milk tolerance for ID: 72', 'update', '2024-10-02 06:55:41', 'read'),
(230, 'icievy@gmail.com', 'Deleted milk component record for student: try ko lang (ID: 72)', 'delete', '2024-10-02 06:55:44', 'read'),
(231, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-02 06:55:49', 'read'),
(232, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 06:59:33', 'read'),
(233, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-02 07:11:21', 'read'),
(234, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-02 08:18:28', 'read'),
(235, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 02:54:40', 'read'),
(236, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 03:22:06', 'read'),
(237, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 04:10:57', 'read'),
(238, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 04:11:07', 'read'),
(239, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-04 04:47:48', 'read'),
(240, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-04 04:48:09', 'read'),
(241, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:02:03', 'read'),
(242, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:02:20', 'read'),
(243, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:03:25', 'read'),
(244, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 05:04:04', 'read'),
(245, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-04 05:08:46', 'read'),
(246, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 07:49:06', 'read'),
(247, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 07:50:59', 'read'),
(248, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 08:00:39', 'read'),
(249, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 18:26:22', 'read'),
(250, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-04 21:24:30', 'read'),
(251, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-04 21:25:29', 'read'),
(252, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 22:17:05', 'read'),
(253, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 22:20:10', 'read'),
(254, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 22:20:51', 'read'),
(255, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-04 22:22:56', 'read'),
(256, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-04 22:23:43', 'read'),
(257, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 00:45:28', 'read'),
(258, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 73)', 'delete', '2024-10-05 00:46:56', 'read'),
(259, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 02:27:19', 'read'),
(260, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-05 02:32:11', 'read'),
(261, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 04:08:57', 'read'),
(262, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-05 05:25:55', 'read'),
(263, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-05 05:27:03', 'read'),
(264, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 17:24:41', 'read'),
(265, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-05 20:28:42', 'read'),
(266, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-05 21:16:20', 'read'),
(267, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-05 22:44:44', 'read'),
(268, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 04:27:23', 'read'),
(269, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 06:21:56', 'read'),
(270, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 06:25:01', 'read'),
(271, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 06:29:00', 'read'),
(272, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 18:19:16', 'read'),
(273, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 18:19:24', 'read'),
(274, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 18:20:16', 'read'),
(275, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 18:22:15', 'read'),
(276, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 18:22:18', 'read'),
(277, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-06 18:30:18', 'read'),
(278, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:17', 'read'),
(279, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:27', 'read'),
(280, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:33', 'read'),
(281, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 18:58:40', 'read'),
(282, 'icievy@gmail.com', 'Updated milk tolerance for ID: 74', 'update', '2024-10-06 18:58:58', 'read'),
(283, 'icievy@gmail.com', 'Updated milk tolerance for ID: 75', 'update', '2024-10-06 18:59:04', 'read'),
(284, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-10-06 18:59:22', 'read'),
(285, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-10-06 18:59:30', 'read'),
(286, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 19:11:01', 'read'),
(287, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 19:11:03', 'read'),
(288, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 19:30:36', 'read'),
(289, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 19:30:37', 'read'),
(290, 'jorandelgado1@gmail.com', 'User logged in', 'login', '2024-10-06 19:33:20', 'read'),
(291, 'jorandelgado1@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-06 19:34:01', 'read'),
(292, 'jorandelgado1@gmail.com', 'User logged out', 'logout', '2024-10-06 19:34:17', 'read'),
(293, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 19:36:41', 'read'),
(294, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-06 19:50:39', 'read'),
(295, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-06 21:01:20', 'read'),
(296, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 03:17:47', 'read'),
(297, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 03:32:26', 'read'),
(298, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 18:11:06', 'read'),
(299, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 18:12:18', 'read'),
(300, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:16:38', 'read'),
(301, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:16:59', 'read'),
(302, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:17:04', 'read'),
(303, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:18:10', 'read'),
(304, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:18:14', 'read'),
(305, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:25:32', 'read'),
(306, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:25:38', 'read'),
(307, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 19:30:20', 'read'),
(308, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 19:30:25', 'read'),
(309, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:18:16', 'read'),
(310, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:18:21', 'read'),
(311, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:24:05', 'read'),
(312, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:24:10', 'read'),
(313, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:30:37', 'read'),
(314, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:30:48', 'read'),
(315, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 20:36:07', 'read'),
(316, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 20:36:16', 'read'),
(317, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 21:39:24', 'read'),
(318, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 21:40:06', 'read'),
(319, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-07 21:43:53', 'read'),
(320, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-07 21:43:56', 'read'),
(321, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 03:40:19', 'read'),
(322, 'icievy@gmail.com', 'Updated milk tolerance for ID: 74', 'update', '2024-10-08 04:43:00', 'read'),
(323, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 06:40:03', 'read'),
(324, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 06:45:39', 'read'),
(325, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 06:45:54', 'read'),
(326, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 08:04:45', 'read'),
(327, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 08:05:54', 'read'),
(328, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 08:09:27', 'read'),
(329, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 08:11:49', 'read'),
(330, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 08:13:07', 'read'),
(331, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 08:38:29', 'read'),
(332, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 09:26:53', 'read'),
(333, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 09:35:16', 'read'),
(334, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 10:26:20', 'read'),
(335, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 10:37:54', 'read'),
(336, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 10:38:10', 'read'),
(337, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:21:07', 'read'),
(338, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:25:43', 'read'),
(339, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:29:57', 'read'),
(340, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-08 17:35:17', 'read'),
(341, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:35:24', 'read'),
(342, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:35:27', 'read'),
(343, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:36:36', 'read'),
(344, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 17:51:08', 'read'),
(345, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 17:53:21', 'read'),
(346, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:01:48', 'read'),
(347, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-08 18:04:06', 'read'),
(348, 'icievy@gmail.com', 'Updated beneficiary details for ID: 111', 'update', '2024-10-08 18:04:13', 'read'),
(349, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 115', 'delete', '2024-10-08 18:06:28', 'read'),
(350, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:07:23', 'read'),
(351, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:09:36', 'read'),
(352, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:10:24', 'read'),
(353, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:17:23', 'read'),
(354, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:31:52', 'read'),
(355, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 18:31:58', 'read'),
(356, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 18:32:02', 'read'),
(357, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 19:29:19', 'read'),
(358, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-10-08 19:29:29', 'read'),
(359, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 19:29:34', 'read'),
(360, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-08 19:33:55', 'read'),
(361, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-08 19:38:23', 'read'),
(362, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-09 04:07:27', 'read'),
(363, 'icievy@gmail.com', 'Deleted beneficiary details for ID: 117', 'delete', '2024-10-09 04:48:11', 'read'),
(364, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-09 07:34:54', 'read'),
(365, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-09 08:54:19', 'read'),
(366, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 05:59:29', 'read'),
(367, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 06:51:12', 'read'),
(368, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 06:52:32', 'read'),
(369, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 06:54:03', 'read'),
(370, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 09:24:12', 'read'),
(371, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 10:33:36', 'read'),
(372, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 10:48:31', 'read'),
(373, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-10 11:15:00', 'read'),
(374, 'icievy@gmail.com', 'Updated beneficiary details for ID: 110', 'update', '2024-10-10 11:15:23', 'read'),
(375, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 11:26:49', 'read'),
(376, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 11:30:30', 'read'),
(377, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 11:39:42', 'read'),
(378, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 11:41:04', 'read'),
(379, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 11:41:34', 'read'),
(380, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 11:44:55', 'read'),
(381, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-10 12:00:38', 'read'),
(382, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-10 23:21:16', 'read'),
(383, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-11 01:25:00', 'read'),
(384, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-11 06:07:33', 'read'),
(385, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-13 05:46:10', 'read'),
(386, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-13 05:50:36', 'read'),
(387, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-13 08:16:56', 'read'),
(388, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 74)', 'delete', '2024-10-13 08:47:58', 'read'),
(389, 'icievy@gmail.com', 'Deleted milk component record for student: sample name (ID: 75)', 'delete', '2024-10-13 08:48:00', 'read'),
(390, 'icievy@gmail.com', 'Deleted milk component record for student: jelo dikitanan (ID: 76)', 'delete', '2024-10-13 08:48:02', 'read'),
(391, 'icievy@gmail.com', 'Deleted milk component record for student: bill jeff (ID: 77)', 'delete', '2024-10-13 08:48:04', 'read'),
(392, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-13 08:48:17', 'read'),
(393, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-13 09:04:41', 'read'),
(394, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-13 09:41:38', 'read'),
(395, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 03:53:34', 'read'),
(396, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 06:54:40', 'read'),
(397, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 06:55:46', 'read'),
(398, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 06:55:56', 'read'),
(399, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 06:56:07', 'read'),
(400, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-14 07:46:57', 'read'),
(401, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 07:48:06', 'read'),
(402, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-14 07:48:22', 'read'),
(403, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 17:38:36', 'read'),
(404, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:30:09', 'new'),
(405, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-14 18:37:16', 'new'),
(406, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:38:58', 'new'),
(407, 'icievy@gmail.com', 'Updated milk tolerance for ID: 79', 'update', '2024-10-14 18:42:17', 'new'),
(408, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:48:43', 'new'),
(409, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 79)', 'delete', '2024-10-14 18:51:20', 'new'),
(410, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 18:53:03', 'new'),
(411, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-14 19:00:11', 'new'),
(412, 'icievy@gmail.com', 'User logged in', 'login', '2024-10-15 01:40:49', 'new'),
(413, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-15 01:41:14', 'new'),
(414, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 01:54:55', 'new'),
(415, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 01:55:06', 'new'),
(416, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 01:59:59', 'new'),
(417, 'icievy@gmail.com', 'Updated beneficiary details for ID: 121', 'update', '2024-10-15 02:00:10', 'new'),
(418, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 80)', 'delete', '2024-10-15 02:00:20', 'new'),
(419, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-10-15 02:01:14', 'new'),
(420, 'icievy@gmail.com', 'User logged out', 'logout', '2024-10-15 02:43:06', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `division_province` varchar(255) NOT NULL,
  `school_district_municipality` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `beis_id` varchar(50) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `supervisor_principal_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `total_beneficiaries` int(11) DEFAULT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL,
  `Division/Province` varchar(100) DEFAULT NULL,
  `school_district_municipality` varchar(100) DEFAULT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `beis_id` varchar(50) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `barangay_name` varchar(100) DEFAULT NULL,
  `supervisor_principal_name` varchar(100) DEFAULT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone_number`, `birthday`, `created_at`, `role`, `profile_picture`, `session_id`, `Division/Province`, `school_district_municipality`, `school_name`, `beis_id`, `school_address`, `barangay_name`, `supervisor_principal_name`, `reset_token`, `reset_token_expiry`) VALUES
(16, 'prince joran', 'solano', 'jorandelgado23@gmail.com', '$2y$10$9x08kjkpKUmeZT2NjCUZ/OW7CyqZKWcZGJPBwMTl60mLvk1IdABUG', '09883273453', '2002-10-26', '2024-06-17 13:02:10', 'admin', 'LOGO.jpg', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', NULL, NULL),
(58, 'icievy', 'sandrino', 'icievy@gmail.com', '$2y$10$dcgTtdRy4y51vI8pudJCn.f4TBe6jvvaTtyG7mYNCEaDGv/JxCKFe', '09883273453', '2002-10-29', '2024-09-30 17:29:43', 'sbfp', NULL, 'e55jUNtr', 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'Gatid, Santa Cruz, Laguna', 'Barangay Gatid', 'LOREVIE K. RIVERA', NULL, NULL),
(60, 'jeri dominic', 'palasin', 'palasin@gmail.com', '$2y$10$1Bw0Ka1aCg9DGI4vdaKxb.53hu62loEMcXnIJCFOK6Xtz24ZeqbOm', '09123456789', '2002-09-19', '2024-09-30 18:07:53', 'admin', NULL, '', 'Laguna', 'Santa Cruz', 'Labuin Elementary School', '123462', 'Labuin, Santa Cruz, Laguna', 'Barangay Labuin', 'MARIFE F. DUMA', NULL, NULL),
(61, 'dominic', 'gaza', 'gaza@gmail.com', '$2y$10$QtlbuEgIFufUJIwcKG5M/ORSR.rVU9C2Qe.0NSi3O4m9e9.vsE/ue', '09213546554', '2000-10-29', '2024-09-30 18:08:56', 'admin', NULL, 'QTeGprdV', 'Laguna', 'Santa Cruz', 'Labuin Elementary School', '123462', 'Labuin, Santa Cruz, Laguna', 'Barangay Labuin', 'example name', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_attendance`
--
ALTER TABLE `beneficiary_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- Indexes for table `beneficiary_progress`
--
ALTER TABLE `beneficiary_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- Indexes for table `division_schools`
--
ALTER TABLE `division_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_id` (`report_id`);

--
-- Indexes for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `recent_activity`
--
ALTER TABLE `recent_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbfp_recent_activity`
--
ALTER TABLE `sbfp_recent_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `beneficiary_attendance`
--
ALTER TABLE `beneficiary_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `beneficiary_progress`
--
ALTER TABLE `beneficiary_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `division_schools`
--
ALTER TABLE `division_schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `recent_activity`
--
ALTER TABLE `recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917;

--
-- AUTO_INCREMENT for table `sbfp_recent_activity`
--
ALTER TABLE `sbfp_recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  ADD CONSTRAINT `beneficiary_details_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`);

--
-- Constraints for table `beneficiary_progress`
--
ALTER TABLE `beneficiary_progress`
  ADD CONSTRAINT `beneficiary_progress_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `division_schools`
--
ALTER TABLE `division_schools`
  ADD CONSTRAINT `division_schools_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `quarterly_reportform8` (`report_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
