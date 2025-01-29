-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 12:15 AM
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
  `school_year` varchar(9) NOT NULL,
  `beneficiary_name` varchar(255) NOT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `beneficiary_id`, `division_province`, `city_municipality_barangay`, `name_of_school`, `school_id_number`, `name_of_principal`, `name_of_feeding_focal_person`, `school_year`, `beneficiary_name`, `session_id`) VALUES
(350, 350, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'LOREVIE K. RIVERA', 'icievy sandrino', '', 'tyr try', 'e55jUNtr'),
(397, 397, NULL, NULL, NULL, NULL, NULL, NULL, '', 'delgado', 'e55jUNtr');

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
(98, 297, '2025-01-18', 'Present', 'H', 'e55jUNtr', 'delgado', 'sample section', 'grade 1'),
(99, 298, '2025-01-18', 'Present', 'H', 'e55jUNtr', 'tyr try', 'kamagong', 'Grade 4');

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
  `parent_phone` varchar(15) NOT NULL,
  `school_year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`id`, `beneficiary_id`, `student_section`, `lrn_no`, `name`, `sex`, `grade_section`, `date_of_birth`, `date_of_weighing`, `age`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `dewormed`, `parents_consent_for_milk`, `participation_in_4ps`, `beneficiary_of_sbfp_in_previous_years`, `session_id`, `selected`, `parent_phone`, `school_year`) VALUES
(493, 397, 'lupet section', '', 'delgado', 'Male', 'grade 1', '2017-10-20', '2025-01-15', '7', 45.00, 140.00, 22.96, 'Normal', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'e55jUNtr', 0, '', '2025-2026');

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
  `completion_percentage` decimal(5,2) NOT NULL,
  `date_submitted` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division_schools`
--

INSERT INTO `division_schools` (`id`, `report_id`, `division_school`, `sdo_school`, `target_sbfp_school`, `actual_sbfp_school`, `percent`, `status`, `target_beneficiaries`, `actual_beneficiaries`, `completion_percentage`, `date_submitted`) VALUES
(32, 30, 'gatid elementary school', 26, 200, 100, 100.00, 'complete', 400, 200, 50.00, '2025-01-12');

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
  `remarks` text DEFAULT NULL,
  `date_submitted` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quarterly_reportform8`
--

INSERT INTO `quarterly_reportform8` (`report_id`, `region_division`, `amount_allocated`, `amount_downloaded`, `status_fund_downloading`, `first_liquidation`, `second_liquidation`, `total_liquidation`, `liquidation_status`, `remarks`, `date_submitted`) VALUES
(30, 'Laguna', 4000000.00, 99999999.99, '200000342324', 99999999.99, 200000.00, 99999999.99, 'Fully', 'complkete', '2025-01-12');

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
(1512, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 04:21:18', 'read'),
(1513, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 04:36:52', 'read'),
(1514, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 04:37:09', 'read'),
(1515, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 04:38:28', 'read'),
(1516, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 05:58:00', 'read'),
(1517, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 05:58:14', 'read'),
(1518, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-11-24 05:59:01', 'read'),
(1519, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 06:00:54', 'read'),
(1520, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 06:01:38', 'read'),
(1521, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 06:22:19', 'read'),
(1522, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-24 06:23:16', 'read'),
(1523, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-24 06:23:27', 'read'),
(1524, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-24 06:23:45', 'read'),
(1525, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 167 on date: 2024-11-24 Updated beneficiary details.', 'progress_insert_details_update', '2024-11-24 06:24:03', 'read'),
(1526, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 06:25:08', 'read'),
(1527, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-30 06:50:51', 'read'),
(1528, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 06:51:08', 'read'),
(1529, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:00:51', 'read'),
(1530, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:03:52', 'read'),
(1531, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2024-11-30 07:06:41', 'read'),
(1532, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:09:18', 'read'),
(1533, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:11:05', 'read'),
(1534, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-11-30 07:28:12', 'read'),
(1535, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:36:40', 'read'),
(1536, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:37:21', 'read'),
(1537, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:38:05', 'read'),
(1538, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-30 07:38:18', 'read'),
(1539, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-30 07:39:15', 'read'),
(1540, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-30 21:04:37', 'read'),
(1541, 'icievy@gmail.com', 'Updated beneficiary details for ID: 167', 'update', '2024-11-30 21:11:18', 'read'),
(1542, 'icievy@gmail.com', 'Updated beneficiary details for ID: 170', 'update', '2024-11-30 21:11:37', 'read'),
(1543, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-30 21:11:46', 'read'),
(1544, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2024-11-30 21:11:56', 'read'),
(1545, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 251', 'delete', '2024-11-30 21:13:52', 'read'),
(1546, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 253', 'delete', '2024-11-30 21:13:57', 'read'),
(1547, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 21:24:38', 'read'),
(1548, 'icievy@gmail.com', 'Updated beneficiary details for ID: 168', 'update', '2024-11-30 21:36:47', 'read'),
(1549, 'icievy@gmail.com', 'Updated beneficiary details for ID: 175', 'update', '2024-11-30 21:38:11', 'read'),
(1550, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-30 21:43:07', 'read'),
(1551, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 03:27:00', 'read'),
(1552, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 03:28:48', 'read'),
(1553, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2024-12-01 03:29:01', 'read'),
(1554, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 03:33:08', 'read'),
(1555, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 255', 'delete', '2024-12-01 04:11:07', 'read'),
(1556, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-12-01 04:15:20', 'read'),
(1557, 'icievy@gmail.com', 'Updated milk tolerance for ID: 90', 'update', '2024-12-01 04:15:26', 'read'),
(1558, 'icievy@gmail.com', 'Updated milk tolerance for ID: 90', 'update', '2024-12-01 04:15:30', 'read'),
(1559, 'icievy@gmail.com', 'Updated milk tolerance for ID: 90', 'update', '2024-12-01 04:15:35', 'read'),
(1560, 'icievy@gmail.com', 'Deleted milk component record for student: carl baldonado (ID: 90)', 'delete', '2024-12-01 04:15:37', 'read'),
(1561, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:20:49', 'read'),
(1562, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-12-01 04:21:13', 'read'),
(1563, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 04:23:27', 'read'),
(1564, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 167 on date: 2024-12-01 Updated beneficiary details.', 'progress_insert_details_update', '2024-12-01 04:30:43', 'read'),
(1565, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:32:18', 'read'),
(1566, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-12-01 04:32:48', 'read'),
(1567, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-12-01 04:34:59', 'read'),
(1568, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 04:35:09', 'read'),
(1569, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 167 on date: 2024-12-01 Updated beneficiary details.', 'progress_update_details_update', '2024-12-01 04:40:18', 'read'),
(1570, 'icievy@gmail.com', 'Updated beneficiary details for ID: 177', 'update', '2024-12-01 04:54:54', 'read'),
(1571, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 256', 'delete', '2024-12-01 04:56:04', 'read'),
(1572, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-12-01 04:56:54', 'read'),
(1573, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-12-01 04:57:21', 'read'),
(1574, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:57:24', 'read'),
(1575, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 04:57:31', 'read'),
(1576, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:57:40', 'read'),
(1577, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-12-01 04:57:49', 'read'),
(1578, 'jorandelgado23@gmail.com', 'Changed password', 'password_change', '2024-12-01 04:59:02', 'read'),
(1579, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-12-01 04:59:08', 'read'),
(1580, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:01:38', 'read'),
(1581, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-12-01 05:01:49', 'read'),
(1582, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:03:24', 'read'),
(1583, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:03:28', 'read'),
(1584, 'icievy@gmail.com', 'Changed password', 'password_change', '2024-12-01 05:05:45', 'read'),
(1585, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:05:48', 'read'),
(1586, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:05:50', 'read'),
(1587, 'icievy23@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-12-01 05:06:22', 'read'),
(1588, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:06:35', 'read'),
(1589, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:06:45', 'read'),
(1590, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-12-01 05:07:27', 'read'),
(1591, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-12-01 05:07:35', 'read'),
(1592, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:07:44', 'read'),
(1593, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:07:50', 'read'),
(1594, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:08:06', 'read'),
(1595, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:08:58', 'read'),
(1596, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-12-01 05:09:19', 'read'),
(1597, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:10:06', 'read'),
(1598, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-16 14:28:20', 'read'),
(1599, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-12-16 14:28:37', 'read'),
(1600, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-16 14:29:44', 'read'),
(1601, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-26 15:53:08', 'read'),
(1602, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-26 15:54:22', 'read'),
(1603, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-02 06:14:59', 'read'),
(1604, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 91)', 'delete', '2025-01-02 06:20:04', 'read'),
(1605, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:22:41', 'read'),
(1606, 'icievy@gmail.com', 'Updated beneficiary details for ID: 168', 'update', '2025-01-02 06:23:03', 'read'),
(1607, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:23:11', 'read'),
(1608, 'icievy@gmail.com', 'Deleted milk component record for student: carl baldonado (ID: 92)', 'delete', '2025-01-02 06:23:52', 'read'),
(1609, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 93)', 'delete', '2025-01-02 06:23:54', 'read'),
(1610, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:24:07', 'read'),
(1611, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:24:16', 'read'),
(1612, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:28:55', 'read'),
(1613, 'icievy@gmail.com', 'Updated milk tolerance for ID: 95', 'update', '2025-01-02 06:29:01', 'read'),
(1614, 'icievy@gmail.com', 'Deleted milk component record for student: christian S delgado (ID: 95)', 'delete', '2025-01-02 06:29:04', 'read'),
(1615, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:32:29', 'read'),
(1616, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2025-01-02 06:37:19', 'read'),
(1617, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:41:58', 'read'),
(1618, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:42:02', 'read'),
(1619, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:42:07', 'read'),
(1620, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:00:31', 'read'),
(1621, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:33:48', 'read'),
(1622, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:33:56', 'read'),
(1623, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:34:05', 'read'),
(1624, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-02 07:39:26', 'read'),
(1625, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-02 07:40:19', 'read'),
(1626, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 257', 'delete', '2025-01-02 07:41:06', 'read'),
(1627, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 166 on date: 2025-01-02 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-02 07:41:17', 'read'),
(1628, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-02 07:42:14', 'read'),
(1629, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-05 02:19:06', 'read'),
(1630, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-07 22:00:15', 'read'),
(1631, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1632, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 173', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1633, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1634, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1635, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 170', 'attendance_update', '2025-01-07 23:07:14', 'read'),
(1636, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-07 23:23:11', 'read'),
(1637, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2025-01-07 23:45:13', 'read'),
(1638, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 173', 'attendance_update', '2025-01-07 23:45:16', 'read'),
(1639, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2025-01-07 23:45:17', 'read'),
(1640, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2025-01-07 23:45:19', 'read'),
(1641, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 170', 'attendance_update', '2025-01-07 23:45:21', 'read'),
(1642, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-10 03:38:45', 'read'),
(1643, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-10 03:38:45', 'read'),
(1644, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-10 03:41:43', 'read'),
(1645, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-10 03:48:36', 'read'),
(1646, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-10 03:49:11', 'read'),
(1647, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-10 03:54:32', 'read'),
(1648, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 18:58:00', 'read'),
(1649, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:12:02', 'read'),
(1650, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:21:13', 'read'),
(1651, 'icievy@gmail.com', 'Changed password', 'password_change', '2025-01-11 19:24:30', 'read'),
(1652, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-11 19:24:32', 'read'),
(1653, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:24:35', 'read'),
(1654, 'icievy@gmail.com', 'Updated beneficiary details for ID: 179', 'update', '2025-01-11 19:25:21', 'read'),
(1655, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 258', 'delete', '2025-01-11 19:25:27', 'read'),
(1656, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-11 19:25:42', 'read'),
(1657, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-11 19:25:53', 'read'),
(1658, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:29:11', 'read'),
(1659, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:40:19', 'read'),
(1660, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2025-01-11 19:48:51', 'read'),
(1661, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 173', 'attendance_update', '2025-01-11 19:48:51', 'read'),
(1662, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2025-01-11 19:48:51', 'read'),
(1663, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2025-01-11 19:48:51', 'read'),
(1664, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 170', 'attendance_update', '2025-01-11 19:48:51', 'read'),
(1665, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-11 19:50:18', 'read'),
(1666, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-12 03:43:21', 'read'),
(1667, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 03:47:05', 'read'),
(1668, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-12 04:29:16', 'read'),
(1669, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-12 04:39:24', 'read'),
(1670, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 04:41:38', 'read'),
(1671, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-12 04:42:03', 'read'),
(1672, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 08:34:41', 'read'),
(1673, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-12 08:38:46', 'read'),
(1674, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-12 08:38:59', 'read'),
(1675, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-12 08:40:32', 'new'),
(1676, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-12 08:40:38', 'new'),
(1677, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 14:51:27', 'new'),
(1678, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 14:51:29', 'new'),
(1679, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-12 14:55:26', 'new'),
(1680, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 15:01:15', 'new'),
(1681, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 00:52:34', 'new'),
(1682, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 01:33:19', 'new'),
(1683, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-14 03:11:48', 'new'),
(1684, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-14 03:11:57', 'new'),
(1685, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 03:13:37', 'new'),
(1686, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 03:50:23', 'new'),
(1687, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 254', 'delete', '2025-01-14 03:50:34', 'new'),
(1688, 'icievy@gmail.com', 'Updated beneficiary details for ID: 216', 'update', '2025-01-14 03:51:00', 'new'),
(1689, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 03:51:06', 'new'),
(1690, 'icievy@gmail.com', 'Updated beneficiary details for ID: 216', 'update', '2025-01-14 03:51:24', 'new'),
(1691, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 03:51:28', 'new'),
(1692, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 04:21:27', 'new'),
(1693, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-14 04:22:39', 'new'),
(1694, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 17:19:44', 'new'),
(1695, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 17:29:40', 'new'),
(1696, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 17:29:57', 'new'),
(1697, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 260', 'delete', '2025-01-14 17:32:48', 'new'),
(1698, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 17:46:25', 'new'),
(1699, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 18:34:22', 'new'),
(1700, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 277', 'delete', '2025-01-14 18:59:44', 'new'),
(1701, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 278', 'delete', '2025-01-14 19:32:58', 'new'),
(1702, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 279', 'delete', '2025-01-14 19:42:45', 'new'),
(1703, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 280', 'delete', '2025-01-14 19:50:59', 'new'),
(1704, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 281', 'delete', '2025-01-14 19:51:17', 'new'),
(1705, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 282', 'delete', '2025-01-14 19:52:58', 'new'),
(1706, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 283', 'delete', '2025-01-14 20:09:21', 'new'),
(1707, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 284', 'delete', '2025-01-14 20:14:39', 'new'),
(1708, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2025-01-14 20:14:47', 'new'),
(1709, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-14 20:17:37', 'new'),
(1710, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 20:19:17', 'new'),
(1711, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 23:29:54', 'new'),
(1712, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 285', 'delete', '2025-01-14 23:30:50', 'new'),
(1713, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 286', 'delete', '2025-01-14 23:49:00', 'new'),
(1714, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 287', 'delete', '2025-01-14 23:53:33', 'new'),
(1715, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 00:12:34', 'new'),
(1716, 'mainadmin@sbfp.ph', 'User logged in', 'login', '2025-01-15 00:12:43', 'new'),
(1717, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 00:13:44', 'new'),
(1718, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 297', 'delete', '2025-01-15 00:37:45', 'new'),
(1719, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 298', 'delete', '2025-01-15 00:37:56', 'new'),
(1720, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 02:55:46', 'new'),
(1721, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2025-01-15 03:11:42', 'new'),
(1722, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 299', 'delete', '2025-01-15 03:16:06', 'new'),
(1723, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 03:17:26', 'new'),
(1724, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2025-01-15 03:17:33', 'new'),
(1725, 'jayvee23@gmail.com', 'User logged in', 'login', '2025-01-15 03:18:09', 'new'),
(1726, 'jayvee23@gmail.com', 'User logged out', 'logout', '2025-01-15 03:18:36', 'new'),
(1727, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 03:18:42', 'new'),
(1728, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 300', 'delete', '2025-01-15 03:18:49', 'new'),
(1729, 'icievy@gmail.com', 'Updated beneficiary details for ID: 264', 'update', '2025-01-15 03:57:59', 'new'),
(1730, 'icievy@gmail.com', 'Updated beneficiary details for ID: 264', 'update', '2025-01-15 03:58:07', 'new'),
(1731, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 303', 'delete', '2025-01-15 04:03:37', 'new'),
(1732, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 304', 'delete', '2025-01-15 04:03:42', 'new'),
(1733, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 305', 'delete', '2025-01-15 04:06:20', 'new'),
(1734, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 04:09:45', 'new'),
(1735, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 04:38:19', 'new'),
(1736, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 04:41:55', 'new'),
(1737, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 04:42:54', 'new'),
(1738, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 04:44:04', 'new'),
(1739, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 311', 'delete', '2025-01-15 05:01:09', 'new'),
(1740, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 312', 'delete', '2025-01-15 05:10:41', 'new'),
(1741, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 313', 'delete', '2025-01-15 05:21:31', 'new'),
(1742, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 249', 'delete', '2025-01-15 05:21:32', 'new'),
(1743, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 247', 'delete', '2025-01-15 05:21:33', 'new'),
(1744, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 246', 'delete', '2025-01-15 05:21:35', 'new'),
(1745, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 245', 'delete', '2025-01-15 05:21:36', 'new'),
(1746, 'icievy@gmail.com', 'Deleted milk component record for student: prince joran delgado (ID: 94)', 'delete', '2025-01-15 05:23:04', 'new'),
(1747, 'icievy@gmail.com', 'Deleted milk component record for student: christian S delgado (ID: 96)', 'delete', '2025-01-15 05:23:06', 'new'),
(1748, 'icievy@gmail.com', 'Deleted milk component record for student: carl baldonado (ID: 97)', 'delete', '2025-01-15 05:23:07', 'new'),
(1749, 'icievy@gmail.com', 'Deleted milk component record for student: tyr try (ID: 98)', 'delete', '2025-01-15 05:23:09', 'new'),
(1750, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 99)', 'delete', '2025-01-15 05:23:10', 'new'),
(1751, 'icievy@gmail.com', 'Deleted milk component record for student: Gaza dominic (ID: 100)', 'delete', '2025-01-15 05:23:12', 'new'),
(1752, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 316', 'delete', '2025-01-15 05:30:15', 'new'),
(1753, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 317', 'delete', '2025-01-15 05:31:34', 'new'),
(1754, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 318', 'delete', '2025-01-15 05:36:17', 'new'),
(1755, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 320', 'delete', '2025-01-15 05:39:19', 'new'),
(1756, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 321', 'delete', '2025-01-15 05:39:55', 'new'),
(1757, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:43:04', 'new'),
(1758, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 05:44:38', 'new'),
(1759, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:45:26', 'new'),
(1760, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:54:11', 'new'),
(1761, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:59:49', 'new'),
(1762, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 324', 'delete', '2025-01-15 06:03:35', 'new'),
(1763, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 06:26:42', 'new'),
(1764, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 326', 'delete', '2025-01-15 06:33:31', 'new'),
(1765, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 325', 'delete', '2025-01-15 06:33:39', 'new'),
(1766, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 06:34:10', 'new'),
(1767, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:27:16', 'new'),
(1768, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 328', 'delete', '2025-01-15 17:28:07', 'new'),
(1769, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:36:41', 'new'),
(1770, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:40:08', 'new'),
(1771, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:47:11', 'new'),
(1772, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 329', 'delete', '2027-01-15 17:53:13', 'new'),
(1773, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 330', 'delete', '2028-01-15 17:53:40', 'new'),
(1774, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 335', 'delete', '2025-01-15 18:32:47', 'new'),
(1775, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 337', 'delete', '2025-01-15 18:40:24', 'new'),
(1776, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 339', 'delete', '2025-01-15 18:47:02', 'new'),
(1777, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 18:51:33', 'new'),
(1778, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 18:52:02', 'new'),
(1779, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 18:55:52', 'new'),
(1780, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 343', 'delete', '2025-01-15 19:12:56', 'new'),
(1781, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 344', 'delete', '2025-01-15 19:14:16', 'new'),
(1782, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 345', 'delete', '2025-01-15 19:14:52', 'new'),
(1783, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 19:15:45', 'new'),
(1784, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 348', 'delete', '2025-01-15 19:36:00', 'new'),
(1785, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 346', 'delete', '2025-01-15 19:36:03', 'new'),
(1786, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-16 01:55:53', 'new'),
(1787, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-16 04:42:30', 'new'),
(1788, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 04:50:12', 'new'),
(1789, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-03-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 04:51:18', 'new'),
(1790, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 04:56:55', 'new'),
(1791, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 05:02:57', 'new'),
(1792, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-02-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 05:03:59', 'new'),
(1793, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-16 05:20:15', 'new'),
(1794, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-17 07:13:45', 'new'),
(1795, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-03-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:27:03', 'new'),
(1796, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-04-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:28:53', 'new'),
(1797, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2010-10-20 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:47:54', 'new'),
(1798, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:49:01', 'new'),
(1799, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2025-02-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:58:41', 'new'),
(1800, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 08:21:40', 'new'),
(1801, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:25:02', 'new'),
(1802, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:39:37', 'new'),
(1803, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:41:31', 'new'),
(1804, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:42:30', 'new'),
(1805, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:44:22', 'new'),
(1806, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:44:52', 'new'),
(1807, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-17 09:03:43', 'new'),
(1808, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-17 17:43:09', 'new'),
(1809, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-18 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 17:50:10', 'new'),
(1810, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2025-01-18 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 17:50:10', 'new'),
(1811, 'icievy@gmail.com', 'Updated beneficiary details for ID: 297', 'update', '2025-01-17 18:09:00', 'new'),
(1812, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-18 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 18:13:30', 'new'),
(1813, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-18 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 18:13:31', 'new'),
(1814, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-17 18:35:25', 'new'),
(1815, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 19:52:33', 'new'),
(1816, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 19:52:33', 'new'),
(1817, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 19:54:29', 'new'),
(1818, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 19:54:29', 'new'),
(1819, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 19:54:38', 'new'),
(1820, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 19:54:38', 'new'),
(1821, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:28:24', 'new'),
(1822, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:28:24', 'new'),
(1823, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:28:40', 'new'),
(1824, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:28:40', 'new'),
(1825, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 352', 'delete', '2025-01-17 20:31:06', 'new'),
(1826, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:34:37', 'new'),
(1827, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:34:37', 'new'),
(1828, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:35:42', 'new'),
(1829, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:35:42', 'new'),
(1830, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:37:08', 'new'),
(1831, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:37:08', 'new'),
(1832, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:39:56', 'new'),
(1833, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:39:56', 'new'),
(1834, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:45:08', 'new'),
(1835, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:45:08', 'new'),
(1836, 'icievy@gmail.com', 'Updated beneficiary details for ID: 297', 'update', '2025-01-17 20:45:51', 'new'),
(1837, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:46:03', 'new'),
(1838, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:46:03', 'new'),
(1839, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 297', 'attendance_update', '2025-01-17 20:47:21', 'new'),
(1840, 'icievy@gmail.com', 'Updated attendance for beneficiary ID: 298', 'attendance_update', '2025-01-17 20:47:21', 'new'),
(1841, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-17 20:49:12', 'new'),
(1842, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-18 05:35:50', 'new'),
(1843, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-18 06:38:01', 'new'),
(1844, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 353', 'delete', '2025-01-18 06:43:30', 'new'),
(1845, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 356', 'delete', '2025-01-18 06:52:26', 'new'),
(1846, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 357', 'delete', '2025-01-18 07:01:27', 'new'),
(1847, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 358', 'delete', '2025-01-18 07:03:24', 'new'),
(1848, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 359', 'delete', '2025-01-18 07:03:49', 'new'),
(1849, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 360', 'delete', '2025-01-18 07:05:31', 'new'),
(1850, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-19 03:47:33', 'new'),
(1851, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 361', 'delete', '2025-01-19 03:48:01', 'new'),
(1852, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-23 05:20:09', 'new'),
(1853, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-23 07:30:25', 'new'),
(1854, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-23 18:02:31', 'new'),
(1855, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-28 02:00:29', 'new'),
(1856, 'icievy@gmail.com', 'Updated beneficiary details for ID: 297', 'update', '2025-01-28 03:10:59', 'new'),
(1857, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-28 04:15:52', 'new'),
(1858, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-28 04:15:56', 'new'),
(1859, 'icievy@gmail.com', 'Deleted milk component record for student: delgado (ID: 101)', 'delete', '2025-01-28 04:16:12', 'new'),
(1860, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 362', 'delete', '2025-01-28 04:16:41', 'new'),
(1861, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-29 00:33:56', 'new'),
(1862, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 349', 'delete', '2025-01-29 01:16:19', 'new'),
(1863, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 351', 'delete', '2025-01-29 01:26:23', 'new'),
(1864, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 363', 'delete', '2026-01-29 01:34:53', 'new'),
(1865, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 364', 'delete', '2025-01-29 01:38:11', 'new'),
(1866, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 365', 'delete', '2025-01-29 01:42:23', 'new'),
(1867, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 366', 'delete', '2025-01-29 01:44:33', 'new'),
(1868, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 367', 'delete', '2025-01-29 01:54:38', 'new'),
(1869, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 368', 'delete', '2027-01-29 01:55:07', 'new'),
(1870, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 369', 'delete', '2025-01-29 01:55:27', 'new'),
(1871, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 370', 'delete', '2025-01-29 01:57:30', 'new'),
(1872, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 371', 'delete', '2025-01-29 01:58:21', 'new'),
(1873, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 372', 'delete', '2025-01-29 02:01:04', 'new'),
(1874, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 373', 'delete', '2026-01-29 02:01:30', 'new'),
(1875, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 374', 'delete', '2025-01-29 02:03:26', 'new'),
(1876, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 375', 'delete', '2025-01-29 02:06:10', 'new'),
(1877, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 376', 'delete', '2025-01-29 02:11:09', 'new'),
(1878, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-29 02:13:42', 'new'),
(1879, 'icievy@gmail.com', 'Deleted milk component record for student: delgado (ID: 102)', 'delete', '2025-01-29 02:13:44', 'new'),
(1880, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 377', 'delete', '2025-01-29 02:13:48', 'new'),
(1881, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 378', 'delete', '2025-01-29 02:14:48', 'new'),
(1882, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 379', 'delete', '2025-01-29 02:17:40', 'new'),
(1883, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 380', 'delete', '2025-01-29 02:24:50', 'new'),
(1884, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 381', 'delete', '2025-01-29 02:26:55', 'new'),
(1885, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 382', 'delete', '2025-01-29 02:30:52', 'new'),
(1886, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 383', 'delete', '2026-01-29 02:43:05', 'new'),
(1887, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 384', 'delete', '2027-01-29 02:49:09', 'new'),
(1888, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 385', 'delete', '2027-01-29 02:49:34', 'new'),
(1889, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 386', 'delete', '2025-01-29 02:52:55', 'new'),
(1890, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 387', 'delete', '2025-01-29 03:03:25', 'new'),
(1891, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 388', 'delete', '2025-01-29 03:03:53', 'new'),
(1892, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 389', 'delete', '2025-01-29 03:05:12', 'new'),
(1893, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 390', 'delete', '2025-01-29 03:09:25', 'new'),
(1894, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 391', 'delete', '2025-01-29 03:10:35', 'new'),
(1895, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 392', 'delete', '2025-01-29 03:11:11', 'new'),
(1896, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 393', 'delete', '2025-01-29 03:12:49', 'new'),
(1897, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 393', 'delete', '2025-01-29 03:12:51', 'new'),
(1898, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 394', 'delete', '2025-01-29 03:13:52', 'new'),
(1899, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-29 03:22:02', 'new'),
(1900, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 395', 'delete', '2025-01-29 03:33:08', 'new'),
(1901, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-29 03:38:11', 'new'),
(1902, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 396', 'delete', '2025-01-29 03:38:18', 'new'),
(1903, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 401', 'delete', '2025-01-29 04:02:35', 'new'),
(1904, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 403', 'delete', '2025-01-29 04:05:14', 'new'),
(1905, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 406', 'delete', '2025-01-29 04:06:50', 'new'),
(1906, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 407', 'delete', '2025-01-29 04:10:55', 'new'),
(1907, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 409', 'delete', '2025-01-29 06:40:19', 'new'),
(1908, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 411', 'delete', '2025-01-29 06:45:32', 'new'),
(1909, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 412', 'delete', '2025-01-29 06:57:27', 'new'),
(1910, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 414', 'delete', '2025-01-29 07:18:21', 'new'),
(1911, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 413', 'delete', '2025-01-29 07:18:24', 'new'),
(1912, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 415', 'delete', '2025-01-29 07:18:52', 'new'),
(1913, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 416', 'delete', '2027-01-29 07:19:43', 'new'),
(1914, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 418', 'delete', '2027-01-29 07:27:23', 'new'),
(1915, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 419', 'delete', '2027-01-29 07:32:17', 'new'),
(1916, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 420', 'delete', '2027-01-29 07:32:47', 'new'),
(1917, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-29 15:20:00', 'new'),
(1918, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 424', 'delete', '2027-01-29 15:40:27', 'new'),
(1919, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 425', 'delete', '2027-01-29 15:44:44', 'new');
INSERT INTO `recent_activity` (`id`, `email`, `activity`, `activity_type`, `timestamp`, `status`) VALUES
(1920, 'icievy@gmail.com', 'Updated beneficiary details for ID: 493', 'update', '2025-01-29 15:51:36', 'new'),
(1921, 'icievy@gmail.com', 'Updated beneficiary details for ID: 493', 'update', '2025-01-29 15:56:02', 'new'),
(1922, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 428', 'delete', '2025-01-29 16:10:15', 'new');

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
(903, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 05:58:00', 'read'),
(904, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 06:00:54', 'read'),
(905, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 06:01:38', 'read'),
(906, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-24 06:22:19', 'read'),
(907, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-24 06:23:16', 'read'),
(908, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-24 06:23:27', 'read'),
(909, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-24 06:23:45', 'read'),
(910, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 167 on date: 2024-11-24 Updated beneficiary details.', 'progress_insert_details_update', '2024-11-24 06:24:03', 'read'),
(911, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-24 06:25:08', 'read'),
(912, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-30 06:50:51', 'read'),
(913, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 06:51:08', 'read'),
(914, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:00:51', 'read'),
(915, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:03:52', 'read'),
(916, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2024-11-30 07:06:41', 'read'),
(917, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:09:18', 'read'),
(918, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:11:05', 'read'),
(919, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:36:40', 'read'),
(920, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:37:21', 'read'),
(921, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 07:38:05', 'read'),
(922, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-30 07:38:18', 'read'),
(923, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-30 07:39:15', 'read'),
(924, 'icievy@gmail.com', 'User logged in', 'login', '2024-11-30 21:04:37', 'read'),
(925, 'icievy@gmail.com', 'Updated beneficiary details for ID: 167', 'update', '2024-11-30 21:11:18', 'read'),
(926, 'icievy@gmail.com', 'Updated beneficiary details for ID: 170', 'update', '2024-11-30 21:11:37', 'read'),
(927, 'icievy@gmail.com', 'Updated beneficiary details for ID: 172', 'update', '2024-11-30 21:11:46', 'read'),
(928, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2024-11-30 21:11:56', 'read'),
(929, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 251', 'delete', '2024-11-30 21:13:52', 'read'),
(930, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 253', 'delete', '2024-11-30 21:13:57', 'read'),
(931, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-11-30 21:24:38', 'read'),
(932, 'icievy@gmail.com', 'Updated beneficiary details for ID: 168', 'update', '2024-11-30 21:36:47', 'read'),
(933, 'icievy@gmail.com', 'Updated beneficiary details for ID: 175', 'update', '2024-11-30 21:38:11', 'read'),
(934, 'icievy@gmail.com', 'User logged out', 'logout', '2024-11-30 21:43:07', 'read'),
(935, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 03:27:00', 'read'),
(936, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 03:28:48', 'read'),
(937, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 03:33:08', 'read'),
(938, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 255', 'delete', '2024-12-01 04:11:07', 'read'),
(939, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-12-01 04:15:20', 'read'),
(940, 'icievy@gmail.com', 'Updated milk tolerance for ID: 90', 'update', '2024-12-01 04:15:26', 'read'),
(941, 'icievy@gmail.com', 'Updated milk tolerance for ID: 90', 'update', '2024-12-01 04:15:30', 'read'),
(942, 'icievy@gmail.com', 'Updated milk tolerance for ID: 90', 'update', '2024-12-01 04:15:35', 'read'),
(943, 'icievy@gmail.com', 'Deleted milk component record for student: carl baldonado (ID: 90)', 'delete', '2024-12-01 04:15:37', 'read'),
(944, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:20:49', 'read'),
(945, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 04:23:27', 'read'),
(946, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 167 on date: 2024-12-01 Updated beneficiary details.', 'progress_insert_details_update', '2024-12-01 04:30:43', 'read'),
(947, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:32:18', 'read'),
(948, 'jayvee23@gmail.com', 'User logged in', 'login', '2024-12-01 04:32:48', 'read'),
(949, 'jayvee23@gmail.com', 'User logged out', 'logout', '2024-12-01 04:34:59', 'read'),
(950, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 04:35:09', 'read'),
(951, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 167 on date: 2024-12-01 Updated beneficiary details.', 'progress_update_details_update', '2024-12-01 04:40:18', 'read'),
(952, 'icievy@gmail.com', 'Updated beneficiary details for ID: 177', 'update', '2024-12-01 04:54:54', 'read'),
(953, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 256', 'delete', '2024-12-01 04:56:04', 'read'),
(954, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2024-12-01 04:56:54', 'read'),
(955, 'icievy@gmail.com', 'Updated firstname and lastname', 'name_update', '2024-12-01 04:57:21', 'read'),
(956, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:57:24', 'read'),
(957, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 04:57:31', 'read'),
(958, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 04:57:40', 'read'),
(959, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:01:38', 'read'),
(960, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:03:24', 'read'),
(961, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:03:28', 'read'),
(962, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:05:48', 'read'),
(963, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:05:50', 'read'),
(964, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:06:35', 'read'),
(965, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:06:45', 'read'),
(966, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:07:44', 'read'),
(967, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:07:50', 'read'),
(968, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:08:06', 'read'),
(969, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-01 05:08:58', 'read'),
(970, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-12-01 05:09:19', 'read'),
(971, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-01 05:10:06', 'read'),
(972, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-16 14:28:20', 'read'),
(973, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2024-12-16 14:28:37', 'read'),
(974, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-16 14:29:44', 'read'),
(975, 'icievy@gmail.com', 'User logged in', 'login', '2024-12-26 15:53:08', 'read'),
(976, 'icievy@gmail.com', 'User logged out', 'logout', '2024-12-26 15:54:22', 'read'),
(977, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-02 06:14:59', 'read'),
(978, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 91)', 'delete', '2025-01-02 06:20:04', 'read'),
(979, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:22:41', 'read'),
(980, 'icievy@gmail.com', 'Updated beneficiary details for ID: 168', 'update', '2025-01-02 06:23:03', 'read'),
(981, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:23:11', 'read'),
(982, 'icievy@gmail.com', 'Deleted milk component record for student: carl baldonado (ID: 92)', 'delete', '2025-01-02 06:23:52', 'read'),
(983, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 93)', 'delete', '2025-01-02 06:23:54', 'read'),
(984, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:24:07', 'read'),
(985, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:24:16', 'read'),
(986, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:28:55', 'read'),
(987, 'icievy@gmail.com', 'Updated milk tolerance for ID: 95', 'update', '2025-01-02 06:29:01', 'read'),
(988, 'icievy@gmail.com', 'Deleted milk component record for student: christian S delgado (ID: 95)', 'delete', '2025-01-02 06:29:04', 'read'),
(989, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 06:32:29', 'read'),
(990, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2025-01-02 06:37:19', 'read'),
(991, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:41:58', 'read'),
(992, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:42:02', 'read'),
(993, 'icievy@gmail.com', 'Updated milk tolerance for ID: 94', 'update', '2025-01-02 06:42:07', 'read'),
(994, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:00:31', 'read'),
(995, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:33:48', 'read'),
(996, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:33:56', 'read'),
(997, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-02 07:34:05', 'read'),
(998, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-02 07:39:26', 'read'),
(999, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-02 07:40:19', 'read'),
(1000, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 257', 'delete', '2025-01-02 07:41:06', 'read'),
(1001, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 166 on date: 2025-01-02 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-02 07:41:17', 'read'),
(1002, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-02 07:42:14', 'read'),
(1003, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-05 02:19:06', 'read'),
(1004, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-07 22:00:15', 'read'),
(1005, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1006, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 173', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1007, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1008, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2025-01-07 23:07:12', 'read'),
(1009, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 170', 'attendance_update', '2025-01-07 23:07:14', 'read'),
(1010, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-07 23:23:11', 'read'),
(1011, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 167', 'attendance_update', '2025-01-07 23:45:13', 'read'),
(1012, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 173', 'attendance_update', '2025-01-07 23:45:16', 'read'),
(1013, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 166', 'attendance_update', '2025-01-07 23:45:17', 'read'),
(1014, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 168', 'attendance_update', '2025-01-07 23:45:19', 'read'),
(1015, 'icievy@gmail.com', 'Inserted attendance for beneficiary ID: 170', 'attendance_update', '2025-01-07 23:45:21', 'read'),
(1016, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-10 03:41:43', 'read'),
(1017, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-10 03:48:36', 'read'),
(1018, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-10 03:49:11', 'read'),
(1019, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-10 03:54:32', 'read'),
(1020, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 18:58:00', 'read'),
(1021, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:12:02', 'read'),
(1022, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:21:13', 'read'),
(1023, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-11 19:24:32', 'read'),
(1024, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:24:35', 'read'),
(1025, 'icievy@gmail.com', 'Updated beneficiary details for ID: 179', 'update', '2025-01-11 19:25:21', 'read'),
(1026, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 258', 'delete', '2025-01-11 19:25:27', 'read'),
(1027, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-11 19:25:42', 'read'),
(1028, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:29:11', 'read'),
(1029, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-11 19:40:19', 'read'),
(1030, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-11 19:50:18', 'read'),
(1031, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 03:47:05', 'read'),
(1032, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-12 04:39:24', 'read'),
(1033, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 04:41:38', 'read'),
(1034, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-12 04:42:03', 'read'),
(1035, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 08:34:41', 'read'),
(1036, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-12 08:38:46', 'read'),
(1037, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 14:51:27', 'read'),
(1038, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 14:51:29', 'read'),
(1039, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-12 15:01:15', 'read'),
(1040, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 00:52:34', 'read'),
(1041, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 01:33:19', 'read'),
(1042, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-14 03:11:48', 'read'),
(1043, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 03:13:37', 'read'),
(1044, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 03:50:23', 'read'),
(1045, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 254', 'delete', '2025-01-14 03:50:34', 'read'),
(1046, 'icievy@gmail.com', 'Updated beneficiary details for ID: 216', 'update', '2025-01-14 03:51:00', 'read'),
(1047, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 03:51:06', 'read'),
(1048, 'icievy@gmail.com', 'Updated beneficiary details for ID: 216', 'update', '2025-01-14 03:51:24', 'read'),
(1049, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 03:51:28', 'read'),
(1050, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 04:21:27', 'read'),
(1051, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-14 04:22:39', 'read'),
(1052, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 17:19:44', 'read'),
(1053, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 17:29:40', 'read'),
(1054, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 17:29:57', 'read'),
(1055, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 260', 'delete', '2025-01-14 17:32:48', 'read'),
(1056, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-14 17:46:25', 'read'),
(1057, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 18:34:22', 'read'),
(1058, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 277', 'delete', '2025-01-14 18:59:44', 'read'),
(1059, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 278', 'delete', '2025-01-14 19:32:58', 'read'),
(1060, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 279', 'delete', '2025-01-14 19:42:45', 'read'),
(1061, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 280', 'delete', '2025-01-14 19:50:59', 'read'),
(1062, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 281', 'delete', '2025-01-14 19:51:17', 'read'),
(1063, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 282', 'delete', '2025-01-14 19:52:58', 'read'),
(1064, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 283', 'delete', '2025-01-14 20:09:21', 'read'),
(1065, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 284', 'delete', '2025-01-14 20:14:39', 'read'),
(1066, 'icievy@gmail.com', 'Updated beneficiary details for ID: 173', 'update', '2025-01-14 20:14:47', 'read'),
(1067, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-14 20:17:37', 'read'),
(1068, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 20:19:17', 'read'),
(1069, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-14 23:29:54', 'read'),
(1070, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 285', 'delete', '2025-01-14 23:30:50', 'read'),
(1071, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 286', 'delete', '2025-01-14 23:49:00', 'read'),
(1072, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 287', 'delete', '2025-01-14 23:53:33', 'read'),
(1073, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 00:12:34', 'read'),
(1074, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 00:13:44', 'read'),
(1075, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 297', 'delete', '2025-01-15 00:37:45', 'read'),
(1076, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 298', 'delete', '2025-01-15 00:37:56', 'read'),
(1077, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 02:55:46', 'read'),
(1078, 'icievy@gmail.com', 'Updated beneficiary details for ID: 166', 'update', '2025-01-15 03:11:42', 'read'),
(1079, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 299', 'delete', '2025-01-15 03:16:06', 'read'),
(1080, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 03:17:26', 'read'),
(1081, 'jayvee23@gmail.com', 'User logged in', 'login', '2025-01-15 03:18:09', 'read'),
(1082, 'jayvee23@gmail.com', 'User logged out', 'logout', '2025-01-15 03:18:36', 'read'),
(1083, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 03:18:42', 'read'),
(1084, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 300', 'delete', '2025-01-15 03:18:49', 'read'),
(1085, 'icievy@gmail.com', 'Updated beneficiary details for ID: 264', 'update', '2025-01-15 03:57:59', 'read'),
(1086, 'icievy@gmail.com', 'Updated beneficiary details for ID: 264', 'update', '2025-01-15 03:58:07', 'read'),
(1087, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 303', 'delete', '2025-01-15 04:03:37', 'read'),
(1088, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 304', 'delete', '2025-01-15 04:03:42', 'read'),
(1089, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 305', 'delete', '2025-01-15 04:06:20', 'read'),
(1090, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 04:09:45', 'read'),
(1091, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 04:38:19', 'read'),
(1092, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 04:41:55', 'read'),
(1093, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 04:42:54', 'read'),
(1094, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 04:44:04', 'read'),
(1095, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 311', 'delete', '2025-01-15 05:01:09', 'read'),
(1096, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 312', 'delete', '2025-01-15 05:10:41', 'read'),
(1097, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 313', 'delete', '2025-01-15 05:21:31', 'read'),
(1098, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 249', 'delete', '2025-01-15 05:21:32', 'read'),
(1099, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 247', 'delete', '2025-01-15 05:21:33', 'read'),
(1100, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 246', 'delete', '2025-01-15 05:21:35', 'read'),
(1101, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 245', 'delete', '2025-01-15 05:21:36', 'read'),
(1102, 'icievy@gmail.com', 'Deleted milk component record for student: prince joran delgado (ID: 94)', 'delete', '2025-01-15 05:23:04', 'read'),
(1103, 'icievy@gmail.com', 'Deleted milk component record for student: christian S delgado (ID: 96)', 'delete', '2025-01-15 05:23:06', 'read'),
(1104, 'icievy@gmail.com', 'Deleted milk component record for student: carl baldonado (ID: 97)', 'delete', '2025-01-15 05:23:07', 'read'),
(1105, 'icievy@gmail.com', 'Deleted milk component record for student: tyr try (ID: 98)', 'delete', '2025-01-15 05:23:09', 'read'),
(1106, 'icievy@gmail.com', 'Deleted milk component record for student: icievy sandrino (ID: 99)', 'delete', '2025-01-15 05:23:10', 'read'),
(1107, 'icievy@gmail.com', 'Deleted milk component record for student: Gaza dominic (ID: 100)', 'delete', '2025-01-15 05:23:12', 'read'),
(1108, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 316', 'delete', '2025-01-15 05:30:15', 'read'),
(1109, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 317', 'delete', '2025-01-15 05:31:34', 'read'),
(1110, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 318', 'delete', '2025-01-15 05:36:17', 'read'),
(1111, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 320', 'delete', '2025-01-15 05:39:19', 'read'),
(1112, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 321', 'delete', '2025-01-15 05:39:55', 'read'),
(1113, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:43:04', 'read'),
(1114, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-15 05:44:38', 'read'),
(1115, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:45:26', 'read'),
(1116, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:54:11', 'read'),
(1117, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 05:59:49', 'read'),
(1118, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 324', 'delete', '2025-01-15 06:03:35', 'read'),
(1119, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 06:26:42', 'read'),
(1120, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 326', 'delete', '2025-01-15 06:33:31', 'read'),
(1121, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 325', 'delete', '2025-01-15 06:33:39', 'read'),
(1122, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 06:34:10', 'read'),
(1123, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:27:16', 'read'),
(1124, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 328', 'delete', '2025-01-15 17:28:07', 'read'),
(1125, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:36:41', 'read'),
(1126, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:40:08', 'read'),
(1127, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 17:47:11', 'read'),
(1128, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 329', 'delete', '2027-01-15 17:53:13', 'read'),
(1129, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 330', 'delete', '2028-01-15 17:53:40', 'read'),
(1130, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 335', 'delete', '2025-01-15 18:32:47', 'read'),
(1131, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 337', 'delete', '2025-01-15 18:40:24', 'read'),
(1132, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 339', 'delete', '2025-01-15 18:47:02', 'read'),
(1133, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 18:51:33', 'read'),
(1134, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 18:52:02', 'read'),
(1135, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 18:55:52', 'read'),
(1136, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 343', 'delete', '2025-01-15 19:12:56', 'read'),
(1137, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 344', 'delete', '2025-01-15 19:14:16', 'read'),
(1138, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 345', 'delete', '2025-01-15 19:14:52', 'read'),
(1139, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-15 19:15:45', 'read'),
(1140, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 348', 'delete', '2025-01-15 19:36:00', 'read'),
(1141, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 346', 'delete', '2025-01-15 19:36:03', 'read'),
(1142, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-16 01:55:53', 'read'),
(1143, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-16 04:42:30', 'read'),
(1144, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 04:50:12', 'read'),
(1145, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-03-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 04:51:18', 'read'),
(1146, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 04:56:55', 'read'),
(1147, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 05:02:57', 'read'),
(1148, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-02-16 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-16 05:03:59', 'read'),
(1149, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-16 05:20:15', 'read'),
(1150, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-17 07:13:45', 'read'),
(1151, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-03-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:27:03', 'read'),
(1152, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-04-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:28:53', 'read'),
(1153, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2010-10-20 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:47:54', 'read'),
(1154, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:49:01', 'read'),
(1155, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2025-02-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 07:58:41', 'read'),
(1156, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 08:21:40', 'read'),
(1157, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:25:02', 'read'),
(1158, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:39:37', 'read'),
(1159, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:41:31', 'read'),
(1160, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:42:30', 'read'),
(1161, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:44:22', 'read'),
(1162, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-17 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 08:44:52', 'read'),
(1163, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-17 09:03:43', 'read'),
(1164, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-17 17:43:09', 'read'),
(1165, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 297 on date: 2025-01-18 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 17:50:10', 'read'),
(1166, 'icievy@gmail.com', 'Inserted progress for beneficiary ID: 298 on date: 2025-01-18 Updated beneficiary details.', 'progress_insert_details_update', '2025-01-17 17:50:10', 'read'),
(1167, 'icievy@gmail.com', 'Updated beneficiary details for ID: 297', 'update', '2025-01-17 18:09:00', 'read'),
(1168, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 297 on date: 2025-01-18 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 18:13:30', 'read'),
(1169, 'icievy@gmail.com', 'Updated progress for beneficiary ID: 298 on date: 2025-01-18 Updated beneficiary details.', 'progress_update_details_update', '2025-01-17 18:13:31', 'read'),
(1170, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-17 18:35:25', 'read'),
(1171, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 352', 'delete', '2025-01-17 20:31:06', 'read'),
(1172, 'icievy@gmail.com', 'Updated beneficiary details for ID: 297', 'update', '2025-01-17 20:45:51', 'read'),
(1173, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-17 20:49:12', 'read'),
(1174, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-18 05:35:50', 'read'),
(1175, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-18 06:38:01', 'new'),
(1176, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 353', 'delete', '2025-01-18 06:43:30', 'new'),
(1177, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 356', 'delete', '2025-01-18 06:52:26', 'new'),
(1178, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 357', 'delete', '2025-01-18 07:01:27', 'new'),
(1179, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 358', 'delete', '2025-01-18 07:03:24', 'new'),
(1180, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 359', 'delete', '2025-01-18 07:03:49', 'new'),
(1181, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 360', 'delete', '2025-01-18 07:05:31', 'new'),
(1182, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-19 03:47:33', 'new'),
(1183, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 361', 'delete', '2025-01-19 03:48:01', 'new'),
(1184, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-23 05:20:09', 'new'),
(1185, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-23 07:30:25', 'new'),
(1186, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-23 18:02:31', 'new'),
(1187, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-28 02:00:29', 'new'),
(1188, 'icievy@gmail.com', 'Updated beneficiary details for ID: 297', 'update', '2025-01-28 03:10:59', 'new'),
(1189, 'icievy@gmail.com', 'User logged out', 'logout', '2025-01-28 04:15:52', 'new'),
(1190, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-28 04:15:56', 'new'),
(1191, 'icievy@gmail.com', 'Deleted milk component record for student: delgado (ID: 101)', 'delete', '2025-01-28 04:16:12', 'new'),
(1192, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 362', 'delete', '2025-01-28 04:16:41', 'new'),
(1193, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-29 00:33:56', 'new'),
(1194, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 349', 'delete', '2025-01-29 01:16:19', 'new'),
(1195, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 351', 'delete', '2025-01-29 01:26:23', 'new'),
(1196, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 363', 'delete', '2026-01-29 01:34:53', 'new'),
(1197, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 364', 'delete', '2025-01-29 01:38:11', 'new'),
(1198, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 365', 'delete', '2025-01-29 01:42:23', 'new'),
(1199, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 366', 'delete', '2025-01-29 01:44:33', 'new'),
(1200, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 367', 'delete', '2025-01-29 01:54:38', 'new'),
(1201, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 368', 'delete', '2027-01-29 01:55:07', 'new'),
(1202, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 369', 'delete', '2025-01-29 01:55:27', 'new'),
(1203, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 370', 'delete', '2025-01-29 01:57:30', 'new'),
(1204, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 371', 'delete', '2025-01-29 01:58:21', 'new'),
(1205, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 372', 'delete', '2025-01-29 02:01:04', 'new'),
(1206, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 373', 'delete', '2026-01-29 02:01:30', 'new'),
(1207, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 374', 'delete', '2025-01-29 02:03:26', 'new'),
(1208, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 375', 'delete', '2025-01-29 02:06:10', 'new'),
(1209, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 376', 'delete', '2025-01-29 02:11:09', 'new'),
(1210, 'icievy@gmail.com', 'Inserted milkcomponent data', 'data_insert', '2025-01-29 02:13:42', 'new'),
(1211, 'icievy@gmail.com', 'Deleted milk component record for student: delgado (ID: 102)', 'delete', '2025-01-29 02:13:44', 'new'),
(1212, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 377', 'delete', '2025-01-29 02:13:48', 'new'),
(1213, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 378', 'delete', '2025-01-29 02:14:48', 'new'),
(1214, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 379', 'delete', '2025-01-29 02:17:40', 'new'),
(1215, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 380', 'delete', '2025-01-29 02:24:50', 'new'),
(1216, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 381', 'delete', '2025-01-29 02:26:55', 'new'),
(1217, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 382', 'delete', '2025-01-29 02:30:52', 'new'),
(1218, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 383', 'delete', '2026-01-29 02:43:05', 'new'),
(1219, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 384', 'delete', '2027-01-29 02:49:09', 'new'),
(1220, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 385', 'delete', '2027-01-29 02:49:34', 'new'),
(1221, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 386', 'delete', '2025-01-29 02:52:55', 'new'),
(1222, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 387', 'delete', '2025-01-29 03:03:25', 'new'),
(1223, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 388', 'delete', '2025-01-29 03:03:53', 'new'),
(1224, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 389', 'delete', '2025-01-29 03:05:12', 'new'),
(1225, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 390', 'delete', '2025-01-29 03:09:25', 'new'),
(1226, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 391', 'delete', '2025-01-29 03:10:35', 'new'),
(1227, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 392', 'delete', '2025-01-29 03:11:11', 'new'),
(1228, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 393', 'delete', '2025-01-29 03:12:49', 'new'),
(1229, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 393', 'delete', '2025-01-29 03:12:51', 'new'),
(1230, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 394', 'delete', '2025-01-29 03:13:52', 'new'),
(1231, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-29 03:22:02', 'new'),
(1232, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 395', 'delete', '2025-01-29 03:33:08', 'new'),
(1233, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: ', 'delete', '2025-01-29 03:38:11', 'new'),
(1234, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 396', 'delete', '2025-01-29 03:38:18', 'new'),
(1235, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 401', 'delete', '2025-01-29 04:02:35', 'new'),
(1236, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 403', 'delete', '2025-01-29 04:05:14', 'new'),
(1237, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 406', 'delete', '2025-01-29 04:06:50', 'new'),
(1238, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 407', 'delete', '2025-01-29 04:10:55', 'new'),
(1239, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 409', 'delete', '2025-01-29 06:40:19', 'new'),
(1240, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 411', 'delete', '2025-01-29 06:45:32', 'new'),
(1241, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 412', 'delete', '2025-01-29 06:57:27', 'new'),
(1242, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 414', 'delete', '2025-01-29 07:18:21', 'new'),
(1243, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 413', 'delete', '2025-01-29 07:18:24', 'new'),
(1244, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 415', 'delete', '2025-01-29 07:18:52', 'new'),
(1245, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 416', 'delete', '2027-01-29 07:19:43', 'new'),
(1246, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 418', 'delete', '2027-01-29 07:27:23', 'new'),
(1247, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 419', 'delete', '2027-01-29 07:32:17', 'new'),
(1248, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 420', 'delete', '2027-01-29 07:32:47', 'new'),
(1249, 'icievy@gmail.com', 'User logged in', 'login', '2025-01-29 15:20:00', 'new'),
(1250, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 424', 'delete', '2027-01-29 15:40:27', 'new'),
(1251, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 425', 'delete', '2027-01-29 15:44:44', 'new'),
(1252, 'icievy@gmail.com', 'Updated beneficiary details for ID: 493', 'update', '2025-01-29 15:51:36', 'new'),
(1253, 'icievy@gmail.com', 'Updated beneficiary details for ID: 493', 'update', '2025-01-29 15:56:02', 'new'),
(1254, 'icievy@gmail.com', 'Deleted beneficiary details for Beneficiary ID: 428', 'delete', '2025-01-29 16:10:15', 'new');

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

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `grade_id`, `created_at`, `session_id`) VALUES
(12, 'hahahahah', 1, '2025-01-15 12:42:02', 'e55jUNtr');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `birthday`, `weight`, `height`, `gender`, `bmi`, `section_id`, `session_id`) VALUES
(9, 'joran2312', '2025-01-15', 34.00, 134.00, 'Female', 18.94, 12, 'e55jUNtr');

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
(16, 'prince', 'delgado', 'jorandelgado23@gmail.com', '$2y$10$IZVDuMSja6Zvsg0hrLx/GOs9MHV.GA39nOZyB0PK5YXEASYSSpeB6', '09883273453', '0000-00-00', '2024-06-17 13:02:10', 'admin', 'LOGO.jpg', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', NULL, NULL, 1),
(58, 'icievy', 'sandrino', 'icievy@gmail.com', '$2y$10$hxBC.Sx1OH23k1ps3oURJubJsPTPlrcnE1JTrirR1.Giu.KMQ5.zu', '09883273453', '2002-10-29', '2024-09-30 17:29:43', 'sbfp', NULL, 'e55jUNtr', 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'Gatid, Santa Cruz, Laguna', 'Barangay Gatid', 'LOREVIE K. RIVERA', NULL, NULL, 1),
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
-- Dumping data for table `weighing_sessions`
--

INSERT INTO `weighing_sessions` (`session_id`, `session_date`, `school_year`, `section_id`, `status`, `user_session_id`) VALUES
(4, '2025-01-15', '2025-2026', 12, 'pending', 'e55jUNtr');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `beneficiary_attendance`
--
ALTER TABLE `beneficiary_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT for table `beneficiary_progress`
--
ALTER TABLE `beneficiary_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `division_schools`
--
ALTER TABLE `division_schools`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `recent_activity`
--
ALTER TABLE `recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1923;

--
-- AUTO_INCREMENT for table `sbfp_recent_activity`
--
ALTER TABLE `sbfp_recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1255;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `weighing_sessions`
--
ALTER TABLE `weighing_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
