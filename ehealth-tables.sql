-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 09:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `alcohol_options`
--

CREATE TABLE `alcohol_options` (
  `GUID` int(11) NOT NULL,
  `response0` text NOT NULL,
  `response1` text NOT NULL,
  `response2` text NOT NULL,
  `response3` text NOT NULL,
  `response4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alcohol_options`
--

INSERT INTO `alcohol_options` (`GUID`, `response0`, `response1`, `response2`, `response3`, `response4`) VALUES
(1, 'Never', 'Monthly or less', '2 - 4 times per month', '2 - 3 timer per week', '4+ times per week'),
(2, '1 - 2', '3 - 4', '5 - 6', '7 - 8', '10+'),
(3, 'Never', 'Less than monthly', 'Monthly', 'Weekly', 'Daily or almost daily'),
(4, 'No', '', 'Yes but not in the last year ', '', 'Yes, during the last year');

-- --------------------------------------------------------

--
-- Table structure for table `alcohol_questions`
--

CREATE TABLE `alcohol_questions` (
  `GUID` int(11) NOT NULL,
  `optionsid` int(11) NOT NULL,
  `Question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alcohol_questions`
--

INSERT INTO `alcohol_questions` (`GUID`, `optionsid`, `Question`) VALUES
(1, 1, 'How often do you have a drink containing alcohol?'),
(2, 2, 'How many units of alcohol do you drink on a typical day when you are drinking?'),
(3, 3, 'How often have you had 6 or more  units if female, or 8 or more if male, on a single occasion in the last year?'),
(4, 3, 'How often during the last year have you found that you were not able to stop drinking once you have started?'),
(5, 3, 'How often during the last year have you failed to do what was expected from you because of drinking?'),
(6, 3, 'How often during the last year have you needed an alcoholic drink in the morning to get yourself going after a heavy drinking session?'),
(7, 3, 'How often during the last year have you had a feeling of guilt or remorse after drinking?'),
(8, 3, 'How often during the last year have you been unable to remember what happened the night before because you had been drinking?'),
(9, 4, 'Have you or somebody else been injured as a result of your drinking?'),
(10, 4, 'Has a relative or friend, doctor or other health worker been concerned about your drinking or suggested you cut down?');

-- --------------------------------------------------------

--
-- Table structure for table `alcohol_responses`
--

CREATE TABLE `alcohol_responses` (
  `GUID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `response` varchar(255) NOT NULL,
  `response_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alcohol_responses`
--

INSERT INTO `alcohol_responses` (`GUID`, `userid`, `questionid`, `response`, `response_score`) VALUES
(39, 2, 1, 'response0', 0),
(40, 2, 2, 'response2', 2),
(41, 2, 3, 'response2', 2),
(42, 2, 4, 'response2', 2),
(43, 2, 5, 'response3', 3),
(44, 2, 6, 'response4', 4),
(45, 2, 7, 'response2', 2),
(46, 2, 8, 'response3', 3),
(47, 2, 9, 'response2', 2),
(48, 2, 10, 'response0', 0),
(49, 3, 1, 'response0', 0),
(50, 3, 2, 'response0', 0),
(51, 3, 3, 'response0', 0),
(52, 3, 4, 'response0', 0),
(53, 3, 5, 'response2', 2),
(54, 3, 6, 'response2', 2),
(55, 3, 7, 'response3', 3),
(56, 3, 8, 'response4', 4),
(57, 3, 9, 'response4', 4),
(58, 3, 10, 'response4', 4),
(59, 4, 1, 'response4', 4),
(60, 4, 2, 'response4', 4),
(61, 4, 3, 'response0', 0),
(62, 4, 4, 'response3', 3),
(63, 4, 5, 'response2', 2),
(64, 4, 6, 'response2', 2),
(65, 4, 7, 'response4', 4),
(66, 4, 8, 'response4', 4),
(67, 4, 9, 'response4', 4),
(68, 4, 10, 'response2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

CREATE TABLE `allergies` (
  `GUID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `allergy_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`GUID`, `userid`, `allergy_details`) VALUES
(1, 2, ''),
(2, 3, 'carrots'),
(3, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `lifestyle`
--

CREATE TABLE `lifestyle` (
  `GUID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `exercise` varchar(2) NOT NULL,
  `exercise_minutes` int(11) NOT NULL,
  `exercise_days` int(11) NOT NULL,
  `diet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lifestyle`
--

INSERT INTO `lifestyle` (`GUID`, `userid`, `exercise`, `exercise_minutes`, `exercise_days`, `diet`) VALUES
(1, 2, 'Y', 434, 5, 'Vegetarian'),
(2, 3, 'N', 1, 1, 'Low fat'),
(3, 4, 'Y', 22, 2, 'Vegan');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `GUID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `has_cancer` varchar(255) NOT NULL,
  `has_heart_disease` varchar(255) NOT NULL,
  `has_stroke` varchar(255) NOT NULL,
  `has_other` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`GUID`, `userid`, `has_cancer`, `has_heart_disease`, `has_stroke`, `has_other`) VALUES
(1, 2, 'N', 'N', 'Y', 'N'),
(2, 3, 'Y', 'Y', 'N', 'Y'),
(3, 4, 'N', 'N', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `GUID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Medication_YN` varchar(255) NOT NULL,
  `Medication_1` text NOT NULL,
  `Medication_2` text NOT NULL,
  `Medication_3` text NOT NULL,
  `medication_frequency_1` int(11) NOT NULL,
  `medication_frequency_2` int(11) NOT NULL,
  `medication_frequency_3` int(11) NOT NULL,
  `medication_dosage_1` int(11) NOT NULL,
  `medication_dosage_2` int(11) NOT NULL,
  `medication_dosage_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`GUID`, `userid`, `Medication_YN`, `Medication_1`, `Medication_2`, `Medication_3`, `medication_frequency_1`, `medication_frequency_2`, `medication_frequency_3`, `medication_dosage_1`, `medication_dosage_2`, `medication_dosage_3`) VALUES
(1, 2, 'N', '', '', '', 0, 0, 0, 0, 0, 0),
(2, 3, 'Y', '', '', '', 0, 0, 0, 0, 0, 0),
(3, 4, 'N', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `smoking`
--

CREATE TABLE `smoking` (
  `GUID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `smoke_status` varchar(250) NOT NULL,
  `smoke_type` varchar(255) NOT NULL,
  `start_smoking` int(11) NOT NULL,
  `quit_smoking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smoking`
--

INSERT INTO `smoking` (`GUID`, `userid`, `smoke_status`, `smoke_type`, `start_smoking`, `quit_smoking`) VALUES
(1, 2, 'current smoker', '', 0, ''),
(2, 3, 'current smoker', '', 0, ''),
(3, 4, 'never smoked', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `GUID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `dob` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postcode` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `home_telephone` varchar(255) NOT NULL,
  `SMS_YN` varchar(255) NOT NULL,
  `occupation` text NOT NULL,
  `email_yn` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `kin_name` text NOT NULL,
  `kin_relationship` text NOT NULL,
  `kin_telephone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`GUID`, `username`, `password`, `email`, `firstname`, `surname`, `dob`, `title`, `marital_status`, `address`, `postcode`, `mobile`, `home_telephone`, `SMS_YN`, `occupation`, `email_yn`, `gender`, `height`, `weight`, `kin_name`, `kin_relationship`, `kin_telephone`, `status`) VALUES
(1, 'adminJSMP', 'apple20', 'admin@ehealth.com', 'Admin', 'Admin', '2019-04-25', '', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '', ''),
(2, 'Bob', 'Letmein', 'bob@bob.com', 'Bob', 'Bob', '2021-02-02', 'Miss', 'Divorced', '5 bob', 'M15444', '54444444444', '55434444456', 'N', 'bartender', 'Y', 'Non-Binary', '44', '344', 'joe', 'brother', '32235555555', 'Accepted'),
(3, 'jim', 'pass', 'jim@jim.com', 'Jim', 'Jim', '2021-02-01', 'Mr', 'Civil Partnership', '7 jim rd', 'm45 666', '46787878678', '66445654654', 'Y', 'teacher', 'N', 'Male', '34', '66', 'emily', 'mother', '32345656654', 'Rejected'),
(4, 'gale', 'password', 'gale@gale.com', 'gale', 'gale', '2021-01-01', 'mrs', 'Other', '55 gale drive', 'm33 555', '33333333333', '33333333333', 'N', 'tv presenter', 'Y', 'Female', '55', '57', 'harry', 'father', '35434534543', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alcohol_options`
--
ALTER TABLE `alcohol_options`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `alcohol_questions`
--
ALTER TABLE `alcohol_questions`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `alcohol_responses`
--
ALTER TABLE `alcohol_responses`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `lifestyle`
--
ALTER TABLE `lifestyle`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`GUID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `smoking`
--
ALTER TABLE `smoking`
  ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`GUID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alcohol_options`
--
ALTER TABLE `alcohol_options`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alcohol_questions`
--
ALTER TABLE `alcohol_questions`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `alcohol_responses`
--
ALTER TABLE `alcohol_responses`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `allergies`
--
ALTER TABLE `allergies`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lifestyle`
--
ALTER TABLE `lifestyle`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smoking`
--
ALTER TABLE `smoking`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `GUID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
