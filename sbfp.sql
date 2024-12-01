-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 02:17 PM
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
  `beneficiary_id` int(11) NOT NULL,
  `division_province` varchar(255) DEFAULT NULL,
  `city_municipality_barangay` varchar(255) DEFAULT NULL,
  `name_of_school` varchar(255) DEFAULT NULL,
  `school_id_number` varchar(50) DEFAULT NULL,
  `name_of_principal` varchar(255) DEFAULT NULL,
  `name_of_feeding_focal_person` varchar(255) DEFAULT NULL,
  `beneficiary_name` varchar(255) NOT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `beneficiary_id`, `division_province`, `city_municipality_barangay`, `name_of_school`, `school_id_number`, `name_of_principal`, `name_of_feeding_focal_person`, `beneficiary_name`, `session_id`) VALUES
(245, 245, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'LOREVIE K. RIVERA', 'icievy sandrino', 'gaza', 'e55jUNtr'),
(246, 246, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'LOREVIE K. RIVERA', 'icievy sandrino', 'carl baldonado', 'e55jUNtr'),
(247, 247, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'LOREVIE K. RIVERA', 'icievy sandrino', 'icievy sandrino', 'e55jUNtr'),
(249, 249, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'LOREVIE K. RIVERA', 'icievy sandrino', 'prince joran delgado', 'e55jUNtr'),
(250, 250, 'Laguna', 'Santa Cruz', 'San Juan Elementary School', '123469', 'sample', 'jayvee corollo', 'christian S delgado', 'CZP8JeWl');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_attendance`
--

CREATE TABLE `beneficiary_attendance` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL,
  `meal_served` enum('H','M','H/M','A','H2','M2','H/M2') DEFAULT 'H',
  `session_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_section` varchar(255) NOT NULL,
  `grade_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_attendance`
--

INSERT INTO `beneficiary_attendance` (`id`, `beneficiary_id`, `attendance_date`, `status`, `meal_served`, `session_id`, `name`, `student_section`, `grade_section`) VALUES
(80, 167, '2024-11-23', 'Absent', 'A', 'e55jUNtr', 'carl baldonado', 'sample', 'Kinder'),
(81, 166, '2024-11-23', 'Present', 'M', 'e55jUNtr', 'gaza', 'kamagong', 'Grade 5'),
(82, 168, '2024-11-23', 'Present', 'M', 'e55jUNtr', 'icievy sandrino', 'kamagong', 'Grade 5');

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
(166, 245, 'kamagong', '4342324234', 'Gaza dominic', 'Male', 'Grade 5', '2017-10-20', '2024-11-23', '7', 20.00, 120.00, 13.89, 'Severely Wasted', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'e55jUNtr', 0, '+639207569581'),
(167, 246, 'sample', '345657757657', 'carl baldonado', 'Male', 'Kinder', '2018-10-20', '2024-11-23', '6', 45.00, 130.00, 26.63, 'Overweight', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'e55jUNtr', 0, '+639207569581'),
(168, 247, 'kamagong', '345657757657', 'icievy sandrino', 'Male', 'Grade 5', '2019-10-29', '2024-11-23', '5', 20.00, 120.00, 13.89, 'Severely Wasted', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'e55jUNtr', 0, '+639207569581'),
(170, 249, 'apple', '234234456456', 'prince joran delgado', 'Male', 'Grade 4', '2019-10-20', '2024-11-24', '5', 45.00, 140.00, 22.96, 'Normal', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'e55jUNtr', 0, '+63965807848'),
(171, 250, 'example', '234234456456', 'christian delgado', 'Male', 'Grade 4', '2017-10-02', '2024-11-24', '7', 45.00, 130.00, 26.63, 'Overweight', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'CZP8JeWl', 0, '+639123456789');

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
  `session_id` varchar(8) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `student_section` varchar(50) DEFAULT NULL,
  `grade_section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_progress`
--

INSERT INTO `beneficiary_progress` (`id`, `beneficiary_id`, `date_of_progress`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `session_id`, `name`, `student_section`, `grade_section`) VALUES
(88, 167, '2024-11-23', 45.00, 130.00, 26.63, 'Overweight', 'Normal', 'e55jUNtr', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division_schools`
--

CREATE TABLE `division_schools` (
  `id` int(11) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `division_school` varchar(255) NOT NULL,
  `sdo_school` int(11) NOT NULL,
  `target_sbfp_school` int(11) NOT NULL,
  `actual_sbfp_school` int(11) NOT NULL,
  `percent` decimal(5,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `target_beneficiaries` int(11) NOT NULL,
  `actual_beneficiaries` int(11) NOT NULL,
  `completion_percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division_schools`
--

INSERT INTO `division_schools` (`id`, `report_id`, `division_school`, `sdo_school`, `target_sbfp_school`, `actual_sbfp_school`, `percent`, `status`, `target_beneficiaries`, `actual_beneficiaries`, `completion_percentage`) VALUES
(26, 26, 'gatid elementary school', 23, 20, 20, 100.00, 'active', 300, 200, 66.67);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade_name`) VALUES
(1, 'Kinder'),
(2, 'Grade 1'),
(3, 'Grade 2'),
(4, 'Grade 3'),
(5, 'Grade 4'),
(6, 'Grade 5'),
(7, 'Grade 6');

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

--
-- Dumping data for table `quarterly_reportform8`
--

INSERT INTO `quarterly_reportform8` (`report_id`, `region_division`, `amount_allocated`, `amount_downloaded`, `status_fund_downloading`, `first_liquidation`, `second_liquidation`, `total_liquidation`, `liquidation_status`, `remarks`) VALUES
(26, 'Laguna', 1000000.00, 950000.00, 'Completed', 500000.00, 450000.00, 950000.00, 'Fully', 'non');

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
(1460, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2024-11-23 04:26:40', 'read'),
(1461, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2024-11-23 04:26:40', 'read'),
(1462, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2024-11-23 04:26:40', 'read'),
(1463, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 04:48:16', 'read'),
(1464, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 04:48:35', 'read'),
(1465, 'gaza@gmail.com', 'Deleted user with email: gaza@gmail.com (ID: 61)', 'delete', '2024-11-23 05:13:30', 'read'),
(1466, 'jaynigger@gmail.com', 'User logged in', 'login', '2024-11-23 05:33:26', 'read'),
(1467, 'jaynigger@gmail.com', 'User logged out', 'logout', '2024-11-23 05:33:31', 'read'),
(1468, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 05:37:30', 'read'),
(1469, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 05:37:36', 'read'),
(1470, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 05:37:47', 'read'),
(1471, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-11-23 05:38:41', 'read'),
(1472, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 05:50:25', 'read'),
(1473, 'jorandelgado23@gmail.com', 'Updated user with email: jorandelgado23@gmail.com (ID: 16)', 'update', '2024-11-23 05:53:11', 'read'),
(1474, 'jayvee23@gmail.com', 'Updated user with email: jayvee23@gmail.com (ID: 64)', 'update', '2024-11-23 05:53:45', 'read'),
(1475, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 05:54:43', 'read'),
(1476, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 05:54:49', 'read'),
(1477, 'jayvee23@gmail.com', 'Updated user with email: jayvee23@gmail.com (ID: 64)', 'update', '2024-11-23 05:55:08', 'read'),
(1478, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-11-23 05:55:18', 'read'),
(1479, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-11-23 05:56:01', 'read'),
(1480, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-11-23 05:56:04', 'read'),
(1481, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-11-23 06:07:14', 'read'),
(1482, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 06:07:36', 'read'),
(1483, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-11-23 06:13:15', 'read'),
(1484, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 06:23:05', 'read'),
(1485, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 07:07:13', 'read'),
(1486, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-11-23 07:08:37', 'read'),
(1487, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 07:29:48', 'read'),
(1488, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 09:21:21', 'read'),
(1489, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:22:21', 'read'),
(1490, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 09:23:09', 'read'),
(1491, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:25:11', 'read'),
(1492, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 09:25:14', 'read'),
(1493, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 09:25:23', 'read'),
(1494, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:29:37', 'read'),
(1495, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 09:29:44', 'read'),
(1496, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:37:12', 'read'),
(1497, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-23 09:57:51', 'read'),
(1498, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 10:10:43', 'read'),
(1499, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 16:31:56', 'read'),
(1500, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 16:34:59', 'read'),
(1501, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 16:35:09', 'read'),
(1502, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-23 16:36:45', 'read'),
(1503, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 02:52:11', 'read'),
(1504, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 02:53:11', 'read'),
(1505, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 03:00:13', 'read'),
(1506, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-11-24 03:29:22', 'read'),
(1507, 'jayvee23@gmail.com', 'Updated beneficiary details for ID: 171', 'update', '2024-11-24 03:31:13', 'read'),
(1508, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-11-24 03:32:00', 'read'),
(1509, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 03:32:11', 'read'),
(1510, 'shyladelgado@gmail.com', 'Created user with email: shyladelgado@gmail.com', 'create', '2024-11-24 03:41:15', 'read'),
(1511, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 03:58:28', 'read'),
(1512, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 04:21:18', 'new'),
(1513, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 04:36:52', 'new'),
(1514, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 04:37:09', 'new'),
(1515, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 04:38:28', 'new'),
(1516, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 05:58:00', 'new'),
(1517, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 05:58:14', 'new'),
(1518, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 05:59:01', 'new'),
(1519, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 06:00:54', 'new'),
(1520, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 06:01:38', 'new');

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
(870, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2024-11-23 04:26:40', 'read'),
(871, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2024-11-23 04:26:40', 'read'),
(872, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2024-11-23 04:26:40', 'read'),
(873, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 04:48:16', 'read'),
(874, 'jaynigger@gmail.com', 'User logged in', 'login', '2024-11-23 05:33:26', 'read'),
(875, 'jaynigger@gmail.com', 'User logged out', 'logout', '2024-11-23 05:33:31', 'read'),
(876, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 05:37:30', 'read'),
(877, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 05:37:36', 'read'),
(878, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-11-23 05:55:18', 'read'),
(879, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-11-23 05:56:01', 'read'),
(880, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-11-23 05:56:04', 'read'),
(881, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-11-23 06:07:14', 'read'),
(882, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 06:23:05', 'read'),
(883, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 07:07:13', 'read'),
(884, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:22:21', 'read'),
(885, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 09:23:09', 'read'),
(886, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:25:11', 'read'),
(887, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 09:25:14', 'read'),
(888, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:29:37', 'read'),
(889, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 09:29:44', 'read'),
(890, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 09:37:12', 'read'),
(891, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-23 09:57:51', 'read'),
(892, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 10:10:43', 'read'),
(893, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-23 16:31:56', 'read'),
(894, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-23 16:34:59', 'read'),
(895, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 03:00:13', 'read'),
(896, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-11-24 03:29:22', 'read'),
(897, 'jayvee23@gmail.com', 'Updated beneficiary details for ID: 171', 'update', '2024-11-24 03:31:13', 'read'),
(898, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-11-24 03:32:00', 'read'),
(899, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 03:58:28', 'read'),
(900, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 04:21:18', 'read'),
(901, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 04:36:52', 'read'),
(902, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 04:38:28', 'read'),
(903, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 05:58:00', 'new'),
(904, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 06:00:54', 'new'),
(905, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 06:01:38', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bmi` decimal(5,2) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL
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
  `reset_token_expiry` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone_number`, `birthday`, `created_at`, `role`, `profile_picture`, `session_id`, `Division/Province`, `school_district_municipality`, `school_name`, `beis_id`, `school_address`, `barangay_name`, `supervisor_principal_name`, `reset_token`, `reset_token_expiry`, `is_active`) VALUES
(16, 'prince', 'delgado', 'jorandelgado23@gmail.com', '$2y$10$Urf8Eqaxj/JxAlb11aTkae2f.FEJdfBSYEzgyGumFGRsvfmh.O2QC', '09883273453', '0000-00-00', '2024-06-17 13:02:10', 'admin', 'LOGO.jpg', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', NULL, NULL, 1),
(58, 'icievy', 'sandrino', 'icievy@gmail.com', '$2y$10$0BIp35xtpImPTzhHaCsAcecfCC.VenPl1GPOeD/oQ0X8v8YFoTZ.S', '09883273453', '2002-10-29', '2024-09-30 17:29:43', 'sbfp', NULL, 'e55jUNtr', 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'Gatid, Santa Cruz, Laguna', 'Barangay Gatid', 'LOREVIE K. RIVERA', NULL, NULL, 1),
(60, 'jeri dominic', 'palasin', 'palasin@gmail.com', '$2y$10$1Bw0Ka1aCg9DGI4vdaKxb.53hu62loEMcXnIJCFOK6Xtz24ZeqbOm', '09123456789', '2002-09-19', '2024-09-30 18:07:53', 'admin', NULL, '', 'Laguna', 'Santa Cruz', 'Labuin Elementary School', '123462', 'Labuin, Santa Cruz, Laguna', 'Barangay Labuin', 'MARIFE F. DUMA', NULL, NULL, 1),
(64, 'jayvee', 'corollo', 'jayvee23@gmail.com', '$2y$10$ZwvquO9hOwyjeuzsS.f73u0p6.zv5JlfX5Q0TlsQtnS70tNqaEar.', '09123456789', '2002-08-20', '2024-10-15 11:47:56', 'sbfp', NULL, 'CZP8JeWl', 'Laguna', 'Santa Cruz', 'San Juan Elementary School', '123469', 'San Juan, Santa Cruz, Laguna', 'Barangay San Juan', 'sample', NULL, NULL, 1),
(76, 'MAIN', 'ADMIN', 'mainadmin@sbfp.ph', '$2y$10$0q6zeV7NaWPczyCWxbcqrujg20.FNUx0sailYM3EQlabHArQXxBnS', NULL, NULL, '2024-11-04 11:54:35', 'admin', NULL, 'default_session_id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(77, 'shyla', 'delgado', 'shyladelgado@gmail.com', '$2y$10$FBUZtrzxDmToxvN5qCllGefFU55t3c2cOKEqepkWfL5hC24uVcK9m', '09123456789', '2007-02-16', '2024-11-24 10:41:15', 'sbfp', NULL, 'x976G5nr', 'Laguna', 'Santa Cruz', 'Labuin Elementary School', '123462', 'Labuin, Santa Cruz, Laguna', 'Barangay Labuin', 'example name', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weighing_sessions`
--

CREATE TABLE `weighing_sessions` (
  `session_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`),
  ADD KEY `session_id` (`session_id`);

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `weighing_sessions`
--
ALTER TABLE `weighing_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `beneficiary_attendance`
--
ALTER TABLE `beneficiary_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `beneficiary_progress`
--
ALTER TABLE `beneficiary_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `division_schools`
--
ALTER TABLE `division_schools`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `recent_activity`
--
ALTER TABLE `recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1521;

--
-- AUTO_INCREMENT for table `sbfp_recent_activity`
--
ALTER TABLE `sbfp_recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `weighing_sessions`
--
ALTER TABLE `weighing_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `division_schools_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `quarterly_reportform8` (`report_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
