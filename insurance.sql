-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 10:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `pk_claim_id` int(11) NOT NULL,
  `fk_claim_client_policy_id` int(11) NOT NULL,
  `claim_info` varchar(140) NOT NULL,
  `claim_investigator_report` varchar(140) DEFAULT NULL,
  `claim_investigator_post_datetime` datetime DEFAULT NULL,
  `claim_post_datetime` datetime NOT NULL,
  `claim_final_verdict` varchar(100) DEFAULT NULL,
  `claim_final_verdict_post_datetime` datetime DEFAULT NULL,
  `claim_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`pk_claim_id`, `fk_claim_client_policy_id`, `claim_info`, `claim_investigator_report`, `claim_investigator_post_datetime`, `claim_post_datetime`, `claim_final_verdict`, `claim_final_verdict_post_datetime`, `claim_status`) VALUES
(1, 1, 'Someone got hurt on dd/mm/yyy', 'Cleared to be paid', '2019-11-05 10:59:10', '2019-11-04 20:08:15', 'Okay, paid.', '2019-11-05 09:41:14', 'Pending final verdict'),
(2, 1, 'This is the second claim. Need the money', NULL, NULL, '2019-11-04 20:14:31', NULL, NULL, 'Pending Investigator Report');

-- --------------------------------------------------------

--
-- Table structure for table `claim_payment`
--

CREATE TABLE `claim_payment` (
  `pk_claim_payment_id` int(11) NOT NULL,
  `fk_claim_payment_claim_id` int(11) NOT NULL,
  `claim_payment_receipt_no` varchar(20) NOT NULL,
  `claim_payment_amount` double NOT NULL,
  `claim_payment_status` varchar(20) NOT NULL,
  `claim_payment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim_payment`
--

INSERT INTO `claim_payment` (`pk_claim_payment_id`, `fk_claim_payment_claim_id`, `claim_payment_receipt_no`, `claim_payment_amount`, `claim_payment_status`, `claim_payment_datetime`) VALUES
(1, 1, 'AZN123', 6000, 'Paid', '2019-11-05 10:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `pk_client_id` int(11) NOT NULL,
  `client_idno` varchar(8) NOT NULL,
  `client_fname` varchar(20) NOT NULL,
  `client_lname` varchar(20) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_occupation` varchar(50) NOT NULL,
  `client_dob` varchar(20) NOT NULL,
  `client_address` varchar(30) NOT NULL,
  `client_bank_details` varchar(100) NOT NULL,
  `client_photo` varchar(100) DEFAULT NULL,
  `client_username` varchar(20) NOT NULL,
  `client_password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`pk_client_id`, `client_idno`, `client_fname`, `client_lname`, `client_email`, `client_occupation`, `client_dob`, `client_address`, `client_bank_details`, `client_photo`, `client_username`, `client_password`, `created_at`, `updated_at`) VALUES
(1, '12345678', 'John', 'Doe', 'john.doe@mail.com', 'Developer', '01/01/1990', 'Nyeri', '1102-Equity, Nyeri', NULL, 'John', '123', '2019-10-19 21:21:44', '2019-10-19 21:21:44'),
(2, '87654321', 'Sarah', 'Doe', 'sarah.doe@mail.com', 'Designer', '10/04/1994', 'Nairobi', 'KCB; Nyeri; 12001', NULL, 'sarah', '123', '2019-10-19 21:30:55', '2019-10-19 21:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `client_car_policy`
--

CREATE TABLE `client_car_policy` (
  `pk_car_id` int(11) NOT NULL,
  `fk_cp_id` int(11) NOT NULL,
  `car_number_plate` varchar(10) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `car_carrying_capacity` int(11) NOT NULL,
  `car_year_of_manufacture` year(4) NOT NULL,
  `car_use` varchar(20) NOT NULL,
  `car_make` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_car_policy`
--

INSERT INTO `client_car_policy` (`pk_car_id`, `fk_cp_id`, `car_number_plate`, `car_model`, `car_carrying_capacity`, `car_year_of_manufacture`, `car_use`, `car_make`) VALUES
(1, 3, 'KAN 123 V', 'Marcedes Benz', 4, 2019, 'PSV', 'AMD');

-- --------------------------------------------------------

--
-- Table structure for table `client_policies`
--

CREATE TABLE `client_policies` (
  `pk_cp_id` int(11) NOT NULL,
  `fk_cp_client_id` int(11) NOT NULL,
  `fk_cp_policy_id` int(11) NOT NULL,
  `cp_policy_period` int(11) NOT NULL COMMENT 'In Months',
  `cp_policy_amount` double NOT NULL,
  `cp_policy_expiry_date` datetime NOT NULL,
  `cp_policy_count` int(11) NOT NULL,
  `cp_approval` int(11) NOT NULL,
  `cp_action_reason` varchar(140) NOT NULL,
  `cp_status` varchar(20) NOT NULL,
  `cp_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_policies`
--

INSERT INTO `client_policies` (`pk_cp_id`, `fk_cp_client_id`, `fk_cp_policy_id`, `cp_policy_period`, `cp_policy_amount`, `cp_policy_expiry_date`, `cp_policy_count`, `cp_approval`, `cp_action_reason`, `cp_status`, `cp_paid`) VALUES
(1, 1, 1, 7, 1400, '2020-05-21 23:22:00', 2, 1, 'Good to go', 'Active', 1),
(2, 1, 3, 3, 1732.5, '2020-02-02 10:20:28', 1, 0, '', 'Pending Approval', 0),
(3, 1, 2, 2, 1000, '2020-01-02 14:02:44', 2, 0, '', 'Pending Approval', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_policy_payment`
--

CREATE TABLE `client_policy_payment` (
  `pk_policy_payment_id` int(11) NOT NULL,
  `fk_policy_payment_cp_id` int(11) NOT NULL,
  `policy_payment_amount` double NOT NULL,
  `policy_payment_receipt_no` varchar(20) NOT NULL,
  `policy_payment_status` varchar(50) NOT NULL,
  `policy_payment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_policy_payment`
--

INSERT INTO `client_policy_payment` (`pk_policy_payment_id`, `fk_policy_payment_cp_id`, `policy_payment_amount`, `policy_payment_receipt_no`, `policy_payment_status`, `policy_payment_datetime`) VALUES
(1, 1, 1400, 'NK19NQCV2F', 'Paid', '2019-11-02 13:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `investigator`
--

CREATE TABLE `investigator` (
  `pk_investigator_id` int(11) NOT NULL,
  `fk_investigator_provider_id` int(11) NOT NULL,
  `investigator_idno` int(8) NOT NULL,
  `investigator_full_name` varchar(100) NOT NULL,
  `investigator_email` varchar(50) NOT NULL,
  `investigator_photo` varchar(100) DEFAULT NULL,
  `investigator_username` varchar(20) NOT NULL,
  `investigator_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigator`
--

INSERT INTO `investigator` (`pk_investigator_id`, `fk_investigator_provider_id`, `investigator_idno`, `investigator_full_name`, `investigator_email`, `investigator_photo`, `investigator_username`, `investigator_password`) VALUES
(2, 2, 12345678, 'James Oloo', 'oloo@domain.com', 'James_Oloo_investigator_photo_1572729940.png', 'james', 'oloo');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `pk_policy_id` int(11) NOT NULL COMMENT 'will serve as policy number',
  `fk_policy_provider_id` int(11) NOT NULL,
  `policy_cover_type` varchar(30) NOT NULL,
  `policy_price` double NOT NULL,
  `policy_period` int(3) NOT NULL COMMENT 'In months (for the set price)',
  `policy_description` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`pk_policy_id`, `fk_policy_provider_id`, `policy_cover_type`, `policy_price`, `policy_period`, `policy_description`) VALUES
(1, 2, 'Life', 1200, 12, 'life assurance\r\n'),
(2, 2, 'Car', 3000, 12, 'car comprehensive'),
(3, 2, 'Imarisha', 2310, 4, 'Imarisha maisha'),
(4, 2, 'Busy Boda', 1200, 10, 'For bodas');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `pk_provider_id` int(11) NOT NULL,
  `provider_full_name` varchar(100) NOT NULL,
  `provider_email` varchar(50) NOT NULL,
  `provider_logo` varchar(100) DEFAULT NULL,
  `provider_username` varchar(20) NOT NULL,
  `provider_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`pk_provider_id`, `provider_full_name`, `provider_email`, `provider_logo`, `provider_username`, `provider_password`) VALUES
(1, 'Admin One', 'admin@insurance.com', NULL, 'admin', 'one'),
(2, 'Admin Two', 'admin.2@mail.com', 'Admin_Two_provider_logo_1572729568.png', 'admin2', '12'),
(3, 'Britam Assurance', 'brit.am@insu.com', 'Britam_Assurance_provider_logo_1571663346.jpg', 'britam', 'britam'),
(4, 'APA Insurance', 'apa@mail.com', 'APA_Insurance_provider_logo_1571664497.png', 'apa', 'apa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`pk_claim_id`),
  ADD KEY `fk_claim_policy_id` (`fk_claim_client_policy_id`);

--
-- Indexes for table `claim_payment`
--
ALTER TABLE `claim_payment`
  ADD PRIMARY KEY (`pk_claim_payment_id`),
  ADD KEY ` fkClaimPaymentClaim` (`fk_claim_payment_claim_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`pk_client_id`);

--
-- Indexes for table `client_car_policy`
--
ALTER TABLE `client_car_policy`
  ADD PRIMARY KEY (`pk_car_id`),
  ADD KEY `fk_cp_id` (`fk_cp_id`);

--
-- Indexes for table `client_policies`
--
ALTER TABLE `client_policies`
  ADD PRIMARY KEY (`pk_cp_id`),
  ADD KEY `fk_cp_client_id` (`fk_cp_client_id`),
  ADD KEY `fk_cp_policy_id` (`fk_cp_policy_id`);

--
-- Indexes for table `client_policy_payment`
--
ALTER TABLE `client_policy_payment`
  ADD PRIMARY KEY (`pk_policy_payment_id`),
  ADD KEY `fkPolicyPaymentCp` (`fk_policy_payment_cp_id`);

--
-- Indexes for table `investigator`
--
ALTER TABLE `investigator`
  ADD PRIMARY KEY (`pk_investigator_id`),
  ADD KEY `fkInvestigatorProvider` (`fk_investigator_provider_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`pk_policy_id`),
  ADD KEY `fkPolicyProviderId` (`fk_policy_provider_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`pk_provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `pk_claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `claim_payment`
--
ALTER TABLE `claim_payment`
  MODIFY `pk_claim_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `pk_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_car_policy`
--
ALTER TABLE `client_car_policy`
  MODIFY `pk_car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_policies`
--
ALTER TABLE `client_policies`
  MODIFY `pk_cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_policy_payment`
--
ALTER TABLE `client_policy_payment`
  MODIFY `pk_policy_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investigator`
--
ALTER TABLE `investigator`
  MODIFY `pk_investigator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `pk_policy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'will serve as policy number', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `pk_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `fkClaimClientPolicyId` FOREIGN KEY (`fk_claim_client_policy_id`) REFERENCES `client_policies` (`pk_cp_id`);

--
-- Constraints for table `claim_payment`
--
ALTER TABLE `claim_payment`
  ADD CONSTRAINT ` fkClaimPaymentClaim` FOREIGN KEY (`fk_claim_payment_claim_id`) REFERENCES `claims` (`pk_claim_id`);

--
-- Constraints for table `client_car_policy`
--
ALTER TABLE `client_car_policy`
  ADD CONSTRAINT `fkClientPolicy` FOREIGN KEY (`fk_cp_id`) REFERENCES `client_policies` (`pk_cp_id`);

--
-- Constraints for table `client_policies`
--
ALTER TABLE `client_policies`
  ADD CONSTRAINT `fkCpClientId` FOREIGN KEY (`fk_cp_client_id`) REFERENCES `clients` (`pk_client_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkCpPolicyId` FOREIGN KEY (`fk_cp_policy_id`) REFERENCES `policy` (`pk_policy_id`);

--
-- Constraints for table `client_policy_payment`
--
ALTER TABLE `client_policy_payment`
  ADD CONSTRAINT `fkPolicyPaymentCp` FOREIGN KEY (`fk_policy_payment_cp_id`) REFERENCES `client_policies` (`pk_cp_id`);

--
-- Constraints for table `investigator`
--
ALTER TABLE `investigator`
  ADD CONSTRAINT `fkInvestigatorProvider` FOREIGN KEY (`fk_investigator_provider_id`) REFERENCES `provider` (`pk_provider_id`);

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `fkPolicyProviderId` FOREIGN KEY (`fk_policy_provider_id`) REFERENCES `provider` (`pk_provider_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
