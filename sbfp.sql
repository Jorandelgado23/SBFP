-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 01:28 PM
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
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `grade_section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `student_name`, `attendance_date`, `status`, `grade_section`) VALUES
(34, 72, 'sample name', '2024-07-23', 'M', 'Grade 2'),
(35, 71, 'cyrus gaza', '2024-07-23', 'M', 'Grade 3'),
(36, 72, 'sample name', '2024-08-16', 'M', 'Grade 2'),
(37, 71, 'cyrus gaza', '2024-08-16', 'M', 'Grade 3'),
(38, 73, 'shedrick', '2024-08-16', 'H/M', 'Grade 6'),
(39, 72, 'sample name', '2024-09-13', 'M', 'Grade 2'),
(40, 71, 'cyrus gaza', '2024-09-13', 'M', 'Grade 3'),
(41, 73, 'shedrick', '2024-09-13', 'H/M', 'Grade 6'),
(42, 74, 'shy', '2024-09-13', 'M', 'Grade 6');

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
(101, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(102, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(103, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(104, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(105, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(106, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(107, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(108, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(109, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(110, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(111, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(112, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(113, 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'example name', 'bill jeff dominic', 'xSlPK41e'),
(114, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(115, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(116, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(117, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(118, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(119, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(120, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(121, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(122, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(123, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(124, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(125, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(126, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(127, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(128, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(129, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(130, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(131, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(132, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg'),
(133, 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'example name', 'araza palasin', 'FNgfOkmg');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_details`
--

CREATE TABLE `beneficiary_details` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) DEFAULT NULL,
  `lrn_no` varchar(12) NOT NULL,
  `student_section` varchar(255) NOT NULL,
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
  `selected` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`id`, `beneficiary_id`, `lrn_no`, `student_section`, `name`, `sex`, `grade_section`, `date_of_birth`, `date_of_weighing`, `age`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `dewormed`, `parents_consent_for_milk`, `participation_in_4ps`, `beneficiary_of_sbfp_in_previous_years`, `session_id`, `selected`) VALUES
(71, 101, '', '', 'cyrus gaza', 'Male', 'Grade 3', '2021-02-11', '2024-07-23', '3', 23.00, 112.00, 18.34, 'Wasted', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes', 'FNgfOkmg', 1),
(72, 102, '', '', 'sample name', 'Female', 'Grade 2', '2019-02-06', '2024-07-23', '5', 56.00, 155.00, 23.31, 'Normal', 'Tall', 'Yes', 'No', 'Yes', 'Yes', 'FNgfOkmg', 0),
(73, 103, '', '', 'shedrick', 'Male', 'Grade 6', '2024-08-16', '2024-08-16', '0', 34.00, 122.00, 22.84, 'Normal', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes', 'FNgfOkmg', 0),
(74, 104, '', '', 'shy', 'Male', 'Grade 6', '2010-06-24', '2024-09-13', '14', 34.00, 112.00, 27.10, 'Overweight', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes', 'FNgfOkmg', 0),
(79, 110, '', '', 'sample name', 'Male', 'Grade 4', '2017-03-08', '2024-09-15', '7', 34.00, 111.00, 27.60, 'Overweight', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes', 'xSlPK41e', 1),
(80, 111, '', '', 'gaza', 'Male', 'Grade 5', '2019-02-15', '2024-09-15', '5', 34.00, 112.00, 27.10, 'Overweight', 'Stunted', 'No', 'Yes', 'No', 'No', 'xSlPK41e', 0),
(81, 112, '', '', 'jd', 'Male', 'Grade 4', '2016-02-16', '2024-09-15', '8', 34.00, 112.00, 27.10, 'Overweight', 'Stunted', 'No', 'No', 'Yes', 'Yes', 'xSlPK41e', 0),
(82, 113, '', '', 'killer', 'Female', 'Grade 6', '2016-03-16', '2024-09-16', '8', 56.00, 112.00, 44.64, 'Obese', 'Stunted', 'Yes', 'No', 'Yes', 'Yes', 'xSlPK41e', 0),
(83, 114, '', '', 'ty', 'Male', 'Grade 4', '2018-06-19', '2024-09-20', '6', 56.00, 111.00, 45.45, 'Obese', 'Stunted', 'Yes', 'No', 'Yes', 'Yes', 'FNgfOkmg', 0),
(84, 115, '12131312', '', 'try ko lang', 'Male', 'Grade 5', '2019-06-13', '2024-09-20', '5', 45.00, 112.00, 35.87, 'Obese', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes', 'FNgfOkmg', 0),
(85, 123, '4342324234', '', 'try ko lang', 'Male', 'Grade 3', '2018-02-16', '2024-09-20', '6', 34.00, 112.00, 27.10, 'Overweight', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes', 'FNgfOkmg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `division_schools`
--

CREATE TABLE `division_schools` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `division_school` varchar(255) NOT NULL,
  `sdo_school` varchar(255) NOT NULL,
  `target_sbfp_school` int(11) NOT NULL,
  `actual_sbfp_school` int(11) NOT NULL,
  `percent` decimal(5,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `session_id` varchar(8) NOT NULL
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
(42, 'Laguna', 'Oogong Elementary School', '123465', 'cyrus gaza', 'Grade 3', 'Without milk intolerance and will participate in milk feeding', 'FNgfOkmg'),
(43, 'Laguna', 'Gatid Elementary School', '123461', 'sample name', 'Grade 4', 'Without milk intolerance and will participate in milk feeding', 'xSlPK41e');

-- --------------------------------------------------------

--
-- Table structure for table `quarterly_reportform8`
--

CREATE TABLE `quarterly_reportform8` (
  `report_id` int(11) NOT NULL,
  `region_division` varchar(255) NOT NULL,
  `amount_allocated` decimal(10,2) DEFAULT NULL,
  `first_liquidation` varchar(255) DEFAULT NULL,
  `second_liquidation` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session_id` varchar(8) NOT NULL
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
(391, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-18 08:08:01', 'new'),
(392, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-18 08:12:19', 'new'),
(393, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-18 08:12:32', 'new'),
(394, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-19 22:42:57', 'new'),
(395, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-19 22:46:47', 'new'),
(396, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 00:40:35', 'new'),
(397, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 00:41:04', 'new'),
(398, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 00:41:49', 'new'),
(399, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 01:41:21', 'new'),
(400, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 01:41:29', 'new'),
(401, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 01:42:07', 'new'),
(402, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 02:00:52', 'new'),
(403, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 02:27:10', 'new'),
(404, 'sample2@gmail.com', 'User logged out', 'logout', '2024-09-20 02:44:06', 'new'),
(405, 'jorandelgado23@gmail.com', 'User logged in', 'login', '2024-09-20 06:09:32', 'new'),
(406, 'sample2@gmail.com', 'User logged in', 'login', '2024-09-20 06:09:46', 'new'),
(407, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:11:14', 'new'),
(408, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:25:06', 'new'),
(409, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:48:46', 'new');

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
(49, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:25:06', 'new'),
(50, 'sample2@gmail.com', 'Inserted beneficiaries data', 'data_insert', '2024-09-20 06:48:46', 'new');

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
(9, 'jeri dominic', 'palasin', 'jdpalasin@gmail.com', '$2y$10$koG.6KAwDpAj/ss9HFnZ.u7f8mksqmG/40SNjLh7ZSzHyEpbL8YyO', '09123345435', '2006-02-03', '2024-06-03 08:05:52', 'admin', NULL, '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', NULL, NULL),
(16, 'prince jorani', 'solano', 'jorandelgado23@gmail.com', '$2y$10$8eIS1qzzYG.S8fF.ExRWc.CQVCvcqY7dyUHrjWZVLKD9C6bvfPUMq', '09277321745', '2016-11-17', '2024-06-17 13:02:10', 'admin', 'LOGO.jpg', '', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', NULL, NULL),
(45, 'araza', 'palasin', 'sample2@gmail.com', '$2y$10$Sa8Om1W0jRyUh26qlifjneAeokkKTdwHubDQhD/D58pqSfEmAkv8S', '09277321745', '2013-06-05', '2024-07-05 11:16:37', 'sbfp', NULL, 'FNgfOkmg', 'Laguna', 'Santa Cruz', 'Oogong Elementary School', '123465', 'Oogong, Santa Cruz, Laguna', 'Barangay Oogong', 'example name', NULL, NULL),
(46, 'bill jeff', 'dominic', 'sample1@gmail.com', '$2y$10$drieUF2FVxSbbQjxEePL/ue9pX1aPQu7crdSn/F01IY9bvxVm.rPa', '09123345353', '2015-05-13', '2024-07-08 14:50:48', 'sbfp', NULL, 'xSlPK41e', 'Laguna', 'Santa Cruz', 'Gatid Elementary School', '123461', 'Gatid, Santa Cruz, Laguna', 'Barangay Gatid', 'example name', NULL, NULL),
(47, 'jayvee', 'delgado', 'jorandelgado1@gmail.com', '$2y$10$.Uk8a7Sf6R3js9Zj7bJQLuaW3jfkqaXPssSVRUNS/mo5W2YCf.fKC', '09435567563', '2007-06-12', '2024-07-10 02:06:52', 'admin', NULL, '', 'Laguna', 'Santa Cruz', 'Bagumbayan Elementary School', '123458', 'Bagumbayan, Santa Cruz, Laguna', 'Barangay Bagumbayan', 'example name', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_attendance` (`student_id`,`attendance_date`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `division_schools`
--
ALTER TABLE `division_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recent_activity`
--
ALTER TABLE `recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `sbfp_recent_activity`
--
ALTER TABLE `sbfp_recent_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `beneficiary_details` (`id`);

--
-- Constraints for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  ADD CONSTRAINT `beneficiary_details_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`);

--
-- Constraints for table `division_schools`
--
ALTER TABLE `division_schools`
  ADD CONSTRAINT `division_schools_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `quarterly_reportform8` (`report_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
