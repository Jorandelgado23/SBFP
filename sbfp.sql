-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 04:50 PM
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
(60, 'santa cruz laguna', 'sta cruz, laguna, oogong', 'oogong elementary school', '102283', 'jd malasin', 'bill jeff', '8aLYb1fv'),
(61, 'santa cruz laguna', 'sta cruz, laguna, oogong', 'oogong elementary school', '102283', 'jd malasin', 'bill jeff', '8aLYb1fv'),
(62, 'santa cruz laguna', 'sta cruz, laguna, duhat', 'duhat elementary school', '0909', 'cyrus gaza', 'jd malasin', 'cT4TmFpX'),
(63, '4564', 'sta cruz, laguna, oogong', 'mojon elementary school', '10945', 'ropdolf', 'sample person', '8aLYb1fv'),
(64, 'santa cruz laguna', 'sta cruz, laguna, oogong', 'oogong elementary school', '102345', 'sample ', 'bill jeff', '8aLYb1fv'),
(65, 'sample ', 'sta cruz, laguna, oogong', 'brgy oogong sta cruz laguna', '102345', 'ropdolf', 'bill jeff', '8aLYb1fv');

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
  `beneficiary_of_sbfp_in_previous_years` enum('Yes','No') NOT NULL,
  `session_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`id`, `beneficiary_id`, `name`, `sex`, `grade_section`, `date_of_birth`, `date_of_weighing`, `age`, `weight`, `height`, `bmi`, `nutritional_status_bmia`, `nutritional_status_hfa`, `dewormed`, `parents_consent_for_milk`, `participation_in_4ps`, `beneficiary_of_sbfp_in_previous_years`, `session_id`) VALUES
(35, 60, 'jelo dikitanan', 'Male', 'grade 6', '2018-07-19', '2024-06-05', '5', 45.00, 110.00, 37.19, 'Obese', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes', '8aLYb1fv'),
(36, 61, 'cyrus gaza', 'Female', 'grade 6', '2018-03-15', '2024-06-05', '6', 45.00, 120.00, 31.25, 'Obese', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', '8aLYb1fv'),
(37, 62, 'jelo dikitanan', 'Male', 'grade 6', '2021-07-23', '2024-06-05', '2', 34.00, 110.00, 28.10, 'Overweight', 'Normal', 'Yes', 'Yes', 'Yes', 'Yes', 'cT4TmFpX'),
(38, 63, 'sample name', 'Male', 'grade 6', '2021-07-21', '2024-06-05', '2', 34.00, 111.00, 27.60, 'Overweight', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes', '8aLYb1fv'),
(39, 64, 'jelo dikitanan', 'Female', 'grade 6', '2019-10-09', '2024-06-05', '4', 43.00, 112.00, 34.28, 'Obese', 'Tall', 'Yes', 'Yes', 'Yes', 'Yes', '8aLYb1fv'),
(40, 65, 'sample name', 'Female', 'grade 6', '2019-03-21', '2024-06-05', '5', 46.00, 113.00, 36.02, 'Obese', 'Stunted', 'Yes', 'Yes', 'Yes', 'Yes', '8aLYb1fv');

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
(16, 'laguna sta cruz', 'oogong elementary school', '102345', 'joranm', 'grade 5', 'With milk intolerance but willing to participate in milk feeding', '8aLYb1fv');

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

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `division_province`, `school_district_municipality`, `school_name`, `beis_id`, `school_address`, `barangay_name`, `supervisor_principal_name`, `contact_number`, `email_address`, `total_beneficiaries`, `session_id`) VALUES
(21, 'santa cruz laguna', 'santa cruz', 'laguna state polytechnic University', '108436', 'brgy. bubukal sta cruz laguna', 'bubukal', 'LOREVIE K. RIVERA', '503-6752', 'sample@gmail.com', 2000, '8aLYb1fv'),
(25, 'santa cruz laguna', 'oogong elementary school', 'laguna state polytechnic University', '108436', 'brgy. oogong sta cruz laguna', 'bagumbayan ', 'CARMELITA D. REODICA', '557-2898', 'sample@gmail.com', 3453, '8aLYb1fv'),
(26, 'sample ', 'oogong elementary school', 'oogong elementary school', '126502', 'brgy. bubukal sta cruz laguna', 'bubukal', 'CARMELITA D. REODICA', '09234223', 'sample@gmail.com', 345, '8aLYb1fv');

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
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone_number`, `birthday`, `created_at`, `role`, `profile_picture`, `session_id`) VALUES
(6, 'prince joran', 'delgado', 'jorandelgado23@gmail.com', '$2y$10$XmCvMr8.O7GqE7//bH49Fe.GGghfuQ1kbLZkKn0MLxJEsGt0DK11i', '09272484827', '2009-10-14', '2024-06-03 07:48:55', 'admin', NULL, ''),
(9, 'jeri dominic', 'palasin', 'jdpalasin@gmail.com', '$2y$10$4j3cOc0FWr143A9zRkM51.9um6nPgi6qR36NEqs9ziuu/DsN69fMG', '09123345435', '2006-02-03', '2024-06-03 08:05:52', 'admin', NULL, ''),
(11, 'jovin', 'delgado', 'jovindelgado@gmail.com', '$2y$10$U2TzdInX.sQIlrvo3VO9Fua2YsYC/O.tzTbOWO3kCS36w2exHvAdy', '09123345353', '2019-06-13', '2024-06-05 09:39:06', 'sbfp', NULL, 'cT4TmFpX'),
(12, 'jayvee', 'corollo', 'jayvee@gmail.com', '$2y$10$1rR18cvmLqIajSyd9X8.0ukBKHR01DpyN8ck.EgAREQPUis1INW06', '09207569581', '2011-06-15', '2024-06-05 10:31:00', 'sbfp', NULL, '8aLYb1fv'),
(13, 'cyrus', 'dominic', 'cyrusgaza@gmail.com', '$2y$10$mlSzPg2auWUU4z2hqdyHYuRqZCfk5Z8l2YXKIsL2BHoz515hvRVJe', '0954654654', '2002-10-17', '2024-06-05 12:36:50', 'admin', NULL, '7yE5xxCj'),
(14, 'jayvee', 'corollo', 'jayvee23@gmail.com', '$2y$10$FiAHjnpmXris.sCwAxQ3EOflSrCtNjTsOfkiLxPyKIcMmkiM13Poi', '09207569581', '2010-11-17', '2024-06-05 12:39:00', 'admin', NULL, ''),
(15, 'adrian', 'araza', 'araza1@gmail.com', '$2y$10$2T.T9//FJ71WfHqn7WRXAORMQYOT0.Jnb7GYHGFM2LoJC8bVCeT/a', '09123345353', '2012-10-05', '2024-06-05 12:39:34', 'sbfp', NULL, 'sKcTTJ3x');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `division_schools`
--
ALTER TABLE `division_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `milkcomponent`
--
ALTER TABLE `milkcomponent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quarterly_reportform8`
--
ALTER TABLE `quarterly_reportform8`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
