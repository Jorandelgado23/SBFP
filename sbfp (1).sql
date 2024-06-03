-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `name_of_feeding_focal_person` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `division_province`, `city_municipality_barangay`, `name_of_school`, `school_id_number`, `name_of_principal`, `name_of_feeding_focal_person`) VALUES
(18, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(19, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(20, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(21, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(22, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(26, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(27, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(28, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(29, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(30, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(35, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(36, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(37, 'laguna', 'sta cruz, laguna, oogong', 'oogong elementary school', '102345', 'ropdolf', 'bill jeff'),
(38, 'laguna', 'sta cruz, laguna, oogong', 'oogong elementary school', '1003343253', 'ropdolf', 'bill jeff'),
(39, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person'),
(40, 'laguna', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '1003343253', 'sample', 'sample person');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_details`
--

CREATE TABLE `beneficiary_details` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) DEFAULT NULL,
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
  `beneficiary_of_sbfp_in_previous_years` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`id`, `beneficiary_id`, `name`, `sex`, `grade_section`, `date_of_birth`, `date_of_weighing`, `age`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `dewormed`, `parents_consent_for_milk`, `participation_in_4ps`, `beneficiary_of_sbfp_in_previous_years`) VALUES
(1, 21, 'sample name', 'Female', 'grade 6', '2009-10-14', '2024-05-16', '14', 34.00, 120.00, 23.61, 'Wasted', 'Normal', 'Yes', 'No', 'Yes', 'Yes'),
(2, 22, 'sample name', 'Female', 'grade 6', '2002-10-26', '2024-05-18', '21', 23.00, 129.00, 13.82, 'Severely Wasted', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes'),
(3, 26, 'sample name', 'Male', 'grade 6', '2004-07-07', '2024-05-18', '19', 34.00, 128.00, 20.75, 'Normal', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes'),
(7, 30, 'sample name', 'Male', 'grade 1', '2021-11-15', '2024-05-19', '2', 23.00, 120.00, 15.97, 'Severely Wasted', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes'),
(12, 35, 'sample name', 'Female', 'grade 1', '2020-10-19', '2024-05-19', '3', 34.00, 111.00, 27.60, 'Overweight', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes'),
(13, 36, 'sample name', 'Female', 'grade 6', '2001-10-16', '2024-05-21', '22', 34.00, 110.00, 28.10, 'Overweight', 'Stunted', 'No', 'No', 'Yes', 'Yes'),
(14, 37, 'jelo dikitanan', 'Female', 'grade 6', '2002-06-21', '2024-05-21', '21', 50.00, 172.00, 16.90, 'Wasted', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes'),
(15, 38, 'jelo dikitanan', 'Female', 'grade 1', '2003-10-15', '2024-05-21', '20', 50.00, 172.00, 16.90, 'Wasted', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes'),
(16, 39, 'sample name', 'Female', 'grade 6', '2008-10-21', '2024-05-21', '15', 34.00, 120.00, 23.61, 'Normal', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes'),
(17, 40, 'sample name', 'Female', 'grade 6', '2008-10-21', '2024-05-21', '15', 34.00, 120.00, 23.61, 'Normal', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes');

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
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division_schools`
--

INSERT INTO `division_schools` (`id`, `report_id`, `division_school`, `sdo_school`, `target_sbfp_school`, `actual_sbfp_school`, `percent`, `status`) VALUES
(1, 2, 'oogong sta cruz laguna ', '23', 213, 123, 123.00, '23423'),
(2, 3, 'school', '1234', 234, 345, 234.00, 'fthtf');

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
  `milk_tolerance` enum('Without milk intolerance and will participate in milk feeding','With milk intolerance but willing to participate in milk feeding','Not allowed by parents to participate in milk feeding') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `milkcomponent`
--

INSERT INTO `milkcomponent` (`id`, `region_division_district`, `name_of_school`, `school_id_number`, `student_name`, `grade_section`, `milk_tolerance`) VALUES
(1, 'laguna', 'oogong elementary school', '1003343253', 'joranm', 'grade 6', 'With milk intolerance but willing to participate in milk feeding'),
(2, 'laguna', 'oogong elementary school', '1003343253', 'joranm', 'grade 6', 'Without milk intolerance and will participate in milk feeding'),
(3, 'laguna', 'oogong elementary school', '1003343253', 'jelo', 'grade 7', 'Without milk intolerance and will participate in milk feeding'),
(4, 'laguna', 'oogong elementary school', '1003343253', 'bill jeff ', 'grade 1', 'With milk intolerance but willing to participate in milk feeding'),
(5, 'laguna', 'oogong elementary school', '102345', 'shyla delgado', 'grade 6 kamagong', 'Without milk intolerance and will participate in milk feeding'),
(6, 'laguna', 'oogong elementary school', '102345', 'joran delgado', 'grade 6 ewan', 'With milk intolerance but willing to participate in milk feeding'),
(7, 'laguna sta cruz', 'oogong elementary school', '102345', 'bill jeff', 'grade 5', 'With milk intolerance but willing to participate in milk feeding');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quarterly_reportform8`
--

INSERT INTO `quarterly_reportform8` (`report_id`, `region_division`, `amount_allocated`, `first_liquidation`, `second_liquidation`, `remarks`, `created_at`) VALUES
(1, 'laguna', 435.00, '435', '34534', '34534', '2024-05-24 10:45:06'),
(2, 'laguna', 23423.00, '2342', '2342', '2342', '2024-05-24 10:47:23'),
(3, 'sample', 473.00, '565', '6767', 'ewan', '2024-06-03 02:40:41');

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
  `total_beneficiaries` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `division_province`, `school_district_municipality`, `school_name`, `beis_id`, `school_address`, `barangay_name`, `supervisor_principal_name`, `contact_number`, `email_address`, `total_beneficiaries`) VALUES
(13, 'laguna', 'oogong elementary school', 'oogong elementary school', '126502', 'brgy. oogong sta cruz laguna', 'oogong', 'example name', '09207569581', 'sample@gmail.com', 47),
(14, 'laguna', 'oogong elementary school', 'oogong elementary school', '126502', 'brgy. bubukal sta cruz laguna', 'oogong', 'example name', '09234223', 'sample@gmail.com', 100);

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
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone_number`, `birthday`, `created_at`, `role`) VALUES
(4, 'joran', 'delgado', 'jorandelgado23@gmail.com', '$2y$10$BNZkMZGFJS78kIYXR6QcBeomgvzN6QRVnPT9Mij9wW06Bw1oET9EO', '09277321745', '2010-06-19', '2024-05-19 11:38:42', 'admin'),
(5, 'jd', 'palasin', 'jdmalasin@gmail.com', '$2y$10$fiXIotqwe7Jl2LsOk9zwxu8BAK7JuiEdrMwW6zOvQuVwmCEVDy6IK', '09207569581', '2001-06-29', '2024-06-03 02:55:07', 'sbfp');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `division_schools`
--
ALTER TABLE `division_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
