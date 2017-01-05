-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 12:12 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer__masters`
--

DROP TABLE IF EXISTS `customer__masters`;
CREATE TABLE IF NOT EXISTS `customer__masters` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Customer_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_Contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Customer_ID` (`Customer_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enabledisables`
--

DROP TABLE IF EXISTS `enabledisables`;
CREATE TABLE IF NOT EXISTS `enabledisables` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `enabledisable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enabledisables`
--

INSERT INTO `enabledisables` (`id`, `enabledisable`, `created_at`, `updated_at`) VALUES
(1, 'Enabled', NULL, NULL),
(2, 'Disabled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fpdatas`
--

DROP TABLE IF EXISTS `fpdatas`;
CREATE TABLE IF NOT EXISTS `fpdatas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `INREC_DateTime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FunctionCode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LastSyncDate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RdrValue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `In_Out_Evt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `DateRdrId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fpdatas_inrec_datetime_unique` (`INREC_DateTime`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fpdatas`
--

INSERT INTO `fpdatas` (`id`, `INREC_DateTime`, `UserId`, `UserName`, `FunctionCode`, `LastSyncDate`, `RdrValue`, `In_Out_Evt`, `DateRdrId`, `created_at`, `updated_at`) VALUES
(1, '4/May/2016 14:30:43', '1', 'user1', 'P2', '2016-05-31 14:08:47.333799', 'O-G113', 'OUT', '4/May/2016 14:30:43O-G113', NULL, NULL),
(3, '31/May/2016 13:54:47', 'Jason', 'Jayson', 'P1', '2016-05-31 14:09:06.753805', 'O-G113', 'OUT', '31/May/2016 13:54:47O-G113', NULL, NULL),
(4, '31/May/2016 13:55:1', 'Jason', 'Jayson', 'P2', '2016-05-31 14:09:06.783343', 'O-G113', 'OUT', '31/May/2016 13:55:1O-G113', NULL, NULL),
(8, '31/May/2016 14:23:41', 'Jason', 'Jason', 'P1', '2016-05-31 14:24:16.720757', 'O-G113', 'OUT', '31/May/2016 14:23:41O-G113', NULL, NULL),
(12, '31/May/2016 14:14:5', 'Jason', 'Jason', 'P1', '2016-05-31 14:30:16.380639', 'O-G113', 'OUT', '31/May/2016 14:14:5O-G113', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `informationdetails` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `informationdetails`) VALUES
(1, 'Knowledge Sharing - All employee expected to give training on project including system purpose\r\n – Operation of the system\r\n – Sytem architecture \r\n – frequent problems faced'),
(7, 'MCC 1.2 version  up gradation is successfully Completed.'),
(8, 'Today is a great day'),
(9, 'End of the day'),
(10, 'An Apple a day makes your doctor away - Manjunath Badi'),
(11, 'Today is a demo day'),
(12, 'If you want something all the universe conspires in helping you to achieve'),
(13, 'When your mind is clear action will be focused.');

-- --------------------------------------------------------

--
-- Table structure for table `leaveinfos`
--

DROP TABLE IF EXISTS `leaveinfos`;
CREATE TABLE IF NOT EXISTS `leaveinfos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Leave_Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Leave_From` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Leave_To` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Approval_Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Leavedays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leaveinfos`
--

INSERT INTO `leaveinfos` (`id`, `Name`, `Leave_Type`, `Leave_From`, `Leave_To`, `created_at`, `updated_at`, `Reason`, `Approval_Status`, `Leavedays`) VALUES
(8, 'Lorine', 'CL', '02-05-2016', '04-05-2016', NULL, NULL, 'Personal', 'Approved', ''),
(7, 'Lorine', 'CL', '02-05-2016', '04-05-2016', NULL, NULL, '', 'Approved', ''),
(11, 'Lorine', 'CL', '02-05-2016', '04-05-2016', NULL, NULL, 'Fever and Cold', 'Approved', ''),
(14, 'Lorine', 'ML', '02-05-2016', '04-05-2016', NULL, NULL, 'Fever and Cold', 'Approved', ''),
(15, 'Lorine', 'ML', '02-05-2016', '04-05-2016', NULL, NULL, 'Fever', 'Rejected', ''),
(13, 'Manjunath', 'ML', '02-05-2016', '04-05-2016', NULL, NULL, 'Fever', 'Approved', ''),
(16, 'Lorine', 'ML', '02-05-2016', '04-05-2016', NULL, NULL, 'Fever and Cold', 'Approved', ''),
(17, 'Lorine', 'CL', '14-05-2016 09:32', '17-05-2016 10:33', NULL, NULL, 'Fever', 'Approved', ''),
(18, 'Lorine', 'CL', '25-05-2016', '28-05-2016 ', NULL, NULL, 'Fever', 'Approved', ''),
(24, 'Tester1', 'CL', '02-05-2016 12:10', '02-05-2016 12:10', NULL, NULL, '', 'Approved', 'Half Day'),
(23, 'Tester1', 'CL', '02-05-2016', '02-05-2016', NULL, NULL, 'Fever and Cold', 'Approved', 'Full Day'),
(25, 'Tester1', 'CL', '02-05-2016', '02-05-2016', NULL, NULL, '', 'Approved', 'Half Day'),
(26, 'Tester1', 'CL', '02-05-2016', '06-05-2016', NULL, NULL, 'qqqq', 'Approved', 'Full Day'),
(27, 'Tester1', 'ML', '03-05-2016 12:34', '03-05-2016 12:34', NULL, NULL, '', 'Approved', 'Half Day'),
(28, 'Tester1', 'ML', '03-05-2016 12:34', '03-05-2016 12:34', NULL, NULL, '', 'Approved', 'Half Day'),
(29, 'Tester1', 'EL', '03-05-2016 12:34', '04-05-2016 12:34', NULL, NULL, '', 'Approved', 'Full Day'),
(30, 'Tester1', 'CL', '02-05-2016', '03-05-2016', NULL, NULL, '', 'Approved', 'Full Day'),
(31, 'Tester1', 'CL', '02-05-2016', '03-05-2016', NULL, NULL, '', 'Approved', 'Full Day'),
(32, 'Tester1', 'CL', '02-05-2016', '04-05-2016', NULL, NULL, '', 'Approved', 'Full Day'),
(33, 'Tester1', 'CL', '02-05-2016', '04-05-2016', NULL, NULL, '', 'Rejected', 'Full Day'),
(34, 'Tester1', 'CL', '02-05-2016 12:59', '04-05-2016 12:59', NULL, NULL, '', 'Rejected', 'Full Day'),
(35, 'Tester1', 'CL', '09-05-2016 13:01', '09-05-2016 13:01', NULL, NULL, '', 'Rejected', 'Half Day'),
(36, 'Tester1', 'EL', '02-05-2016 13:05', '10-05-2016 13:05', NULL, NULL, 'Fever and Cold', 'Approved', 'Full Day'),
(37, 'Tester1', 'EL', '03-05-2016 13:05', '03-05-2016 13:05', NULL, NULL, 'Fever and Cold', 'Approved', 'Half Day'),
(38, 'Lorine', 'EL', '02-05-2016', '02-05-2016', NULL, NULL, 'Fever', 'Scheduled', 'Half Day'),
(39, 'Tester1', 'CL', '02-05-2016 12:20', '02-05-2016 12:20', NULL, NULL, 'Fever', 'Scheduled', 'Half Day'),
(40, 'Tester1', 'ML', '16-05-2016 12:48', '16-05-2016 12:48', NULL, NULL, 'Fever and Cold', 'Scheduled', 'Half Day');

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

DROP TABLE IF EXISTS `leavetypes`;
CREATE TABLE IF NOT EXISTS `leavetypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `leavetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leavetypes`
--

INSERT INTO `leavetypes` (`id`, `leavetype`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'ML', NULL, NULL),
(3, 'EL', NULL, NULL),
(4, 'CL', NULL, NULL),
(5, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs_services`
--

DROP TABLE IF EXISTS `logs_services`;
CREATE TABLE IF NOT EXISTS `logs_services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date_call_recieved` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Company_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Site_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Problem_Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Service_Start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Service_End` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Total_Time_Spent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_Feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Feedback_Rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mactus_Service_Person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs_services`
--

INSERT INTO `logs_services` (`id`, `Date_call_recieved`, `Company_Name`, `Site_Name`, `Customer_name`, `Problem_Description`, `Service_Start`, `Service_End`, `Total_Time_Spent`, `Customer_Feedback`, `Feedback_Rating`, `Mactus_Service_Person`, `created_at`, `updated_at`) VALUES
(1, '01-06-2016 09:25', 'Mylan ', 'OTL', 'Mahesh v', 'aaaaaaaaaaaaaaa', '02-06-2016 09:00', '02-06-2016 13:00', '4', 'Satisfied', '4', 'Lorine', '2016-05-31 18:30:00', NULL),
(2, '30-05-2016 09:45', 'Mylan ', 'HSF', 'Mahesh v', 'Password recovery', '31-05-2016 10:00', '31-05-2016 17:00', '7', 'Satisfied', '2', 'Lorine', '2016-05-29 18:30:00', NULL),
(3, '31-05-2016 09:45', 'Mylan ', 'HSF', 'Mahesh v', 'Password recovery', '31-05-2016 10:00', '31-05-2016 17:00', '7', 'Satisfied', '3', 'Tester1', '2016-05-30 18:30:00', NULL),
(5, '02-05-2016 10:30', 'Mylan ', 'SFF', 'Surech C', 'Network Communication Failure', '03-05-2016 09:00', '03-05-2016 18:00', '9', 'Satisfied', '4', 'Lorine', '2016-05-02 05:00:00', NULL),
(6, '10-05-2016 09:15', 'Mylan ', 'SFF', 'Surech C', 'Network Communication Failure', '11-05-2016 09:00', '11-06-2016 18:00', '753', 'Satisfied', '4', 'Manjunath', '2016-05-10 03:45:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_30_091514_create_projects_table', 2),
('2016_05_03_083350_create_projectdetails_table', 3),
('2016_05_08_113113_add_name_to_projectdetails_table', 4),
('2016_05_09_045856_add_role_to_users_table', 5),
('2016_05_17_040800_add_duration_to_projectdetails_table', 6),
('2016_05_21_033948_create_info_notifications_table', 7),
('2016_05_21_034428_create_information_table', 8),
('2016_05_23_044502_create_mactus_teams_table', 9),
('2016_05_23_045351_create_teammembers_table', 10),
('2016_05_23_070247_create_leavetables_table', 11),
('2016_05_23_072819_create_leaveinfos_table', 12),
('2016_05_23_152643_create_sitenames_table', 13),
('2016_05_23_152853_add_site_to_projectdetails', 14),
('2016_05_23_171351_add_Reason_to_leaveinfos', 15),
('2016_05_24_061438_add_companyid_to_users', 16),
('2016_05_25_045409_add_estimatedtime_projects_table', 17),
('2016_05_25_070910_add_projectstatus_projects_table', 18),
('2016_05_26_040729_add_Approval_Status_leaveinfos_table', 19),
('2016_05_27_055418_create_leavetype_table', 20),
('2016_05_27_060207_create_leavetypes_table', 21),
('2016_05_27_061139_create_leavetypes_table', 22),
('2016_05_27_062047_create_enabledisables_table', 23),
('2016_05_27_064122_create_approvalstatuses_table', 24),
('2016_05_27_065049_create_statusapproves_table', 25),
('2016_05_28_062735_add_Leavedays_leaveinfos_table', 26),
('2016_05_28_082541_add_Projectstartdate_projects_table', 27),
('2016_05_28_094407_add_companyid_to_users_table', 28),
('2016_05_30_070537_add_Timespent_to_projects_table', 28),
('2016_06_02_052932_create_service_logs_table', 29),
('2016_06_02_080246_create_log_services_table', 30),
('2016_06_02_081014_create_log__services_table', 31),
('2016_06_02_090119_create_logs_services_table', 32),
('2016_06_03_070023_create_customermasters_table', 33),
('2016_06_03_085109_create_customer__masters_table', 34),
('2016_06_03_100659_add_invoicepo_projects_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lorine.22@gmail.com', '8caf44ee9e67eb800e5f7aa7fb3ef45e8bd65a55de5e3599cad9164a67639d57', '2016-05-22 13:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `projectdetails`
--

DROP TABLE IF EXISTS `projectdetails`;
CREATE TABLE IF NOT EXISTS `projectdetails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `projectstart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `projectend` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=290 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projectdetails`
--

INSERT INTO `projectdetails` (`id`, `project_name`, `projectstart`, `projectend`, `created_at`, `updated_at`, `name`, `duration`, `site`) VALUES
(90, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:36:21', '2016-05-07 12:36:21', '', '', ''),
(88, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:27:45', '2016-05-07 12:27:45', '', '', ''),
(89, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:28:10', '2016-05-07 12:28:10', '', '', ''),
(86, 'Agnello_1.2', '02-05-2016 09:06:10', '03-05-2016 09:06:10', NULL, NULL, '', '', ''),
(87, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:27:15', '2016-05-07 12:27:15', '', '', ''),
(70, 'Oxygen Monitoring System', '1', '', '2016-05-07 06:08:58', '2016-05-07 06:08:58', '', '', ''),
(71, 'Fire alaram System', '1', '03-05-2016 09:06:10', '2016-05-07 06:08:58', '2016-05-07 06:08:58', '', '', ''),
(72, 'AHU Automation System', '1', '03-05-2016 09:06:10', '2016-05-07 06:08:58', '2016-05-07 06:08:58', '', '', ''),
(73, 'MCC_1.2v', '1', '02-05-2016 09:06:10', '2016-05-07 06:09:28', '2016-05-07 06:09:28', '', '', ''),
(74, 'Oxygen Monitoring System', '1', '', '2016-05-07 06:09:28', '2016-05-07 06:09:28', '', '', ''),
(75, 'Fire alaram System', '1', '03-05-2016 09:06:10', '2016-05-07 06:09:28', '2016-05-07 06:09:28', '', '', ''),
(69, 'MCC_1.2v', '1', '02-05-2016 09:06:10', '2016-05-07 06:08:58', '2016-05-07 06:08:58', '', '', ''),
(83, 'Fire alaram System', '1', '', '2016-05-07 11:49:27', '2016-05-07 11:49:27', '', '', ''),
(84, 'AHU Automation System', '1', '03-05-2016 09:06:10', '2016-05-07 11:49:27', '2016-05-07 11:49:27', '', '', ''),
(85, 'MCC_1.2', '02-05-2016 09:06:10', '03-05-2016 09:06:10', NULL, NULL, '', '', ''),
(91, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:40:22', '2016-05-07 12:40:22', '', '', ''),
(92, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:40:22', '2016-05-07 12:40:22', '', '', ''),
(93, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:40:22', '2016-05-07 12:40:22', '', '', ''),
(94, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:40:42', '2016-05-07 12:40:42', '', '', ''),
(95, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:40:42', '2016-05-07 12:40:42', '', '', ''),
(96, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:40:42', '2016-05-07 12:40:42', '', '', ''),
(97, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:41:17', '2016-05-07 12:41:17', '', '', ''),
(98, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:41:17', '2016-05-07 12:41:17', '', '', ''),
(99, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:41:17', '2016-05-07 12:41:17', '', '', ''),
(100, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:53:47', '2016-05-07 12:53:47', '', '', ''),
(101, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:53:47', '2016-05-07 12:53:47', '', '', ''),
(102, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:53:47', '2016-05-07 12:53:47', '', '', ''),
(103, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:54:12', '2016-05-07 12:54:12', '', '', ''),
(104, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:54:12', '2016-05-07 12:54:12', '', '', ''),
(105, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 12:54:12', '2016-05-07 12:54:12', '', '', ''),
(106, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 13:04:52', '2016-05-07 13:04:52', '', '', ''),
(107, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-07 22:52:21', '2016-05-07 22:52:21', '', '', ''),
(108, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-07 23:29:56', '2016-05-07 23:29:56', '', '', ''),
(109, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 23:29:56', '2016-05-07 23:29:56', '', '', ''),
(110, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-07 23:30:35', '2016-05-07 23:30:35', '', '', ''),
(111, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 23:30:35', '2016-05-07 23:30:35', '', '', ''),
(112, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 23:30:35', '2016-05-07 23:30:35', '', '', ''),
(113, 'AHU Automation System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-07 23:30:35', '2016-05-07 23:30:35', '', '', ''),
(114, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-08 04:29:14', '2016-05-08 04:29:14', '', '', ''),
(115, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 06:07:04', '2016-05-08 06:07:04', 'Tester1', '', ''),
(116, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-08 06:23:16', '2016-05-08 06:23:16', 'Tester1', '', ''),
(117, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 06:23:16', '2016-05-08 06:23:16', 'Tester1', '', ''),
(118, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 06:23:16', '2016-05-08 06:23:16', 'Tester1', '', ''),
(119, 'AHU Automation System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 06:23:16', '2016-05-08 06:23:16', 'Tester1', '', ''),
(120, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-08 08:18:57', '2016-05-08 08:18:57', 'Tester1', '', ''),
(121, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-08 22:01:19', '2016-05-08 22:01:19', 'Tester1', '', ''),
(122, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 22:01:19', '2016-05-08 22:01:19', 'Tester1', '', ''),
(123, 'AHU Automation System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 22:01:19', '2016-05-08 22:01:19', 'Tester1', '', ''),
(124, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-08 23:44:47', '2016-05-08 23:44:47', 'Lorine', '', ''),
(125, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-08 23:44:47', '2016-05-08 23:44:47', 'Lorine', '', ''),
(126, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-11 00:36:24', '2016-05-11 00:36:24', 'Tester1', '', ''),
(127, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-11 01:32:44', '2016-05-11 01:32:44', 'Jayson', '', ''),
(128, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-11 01:32:44', '2016-05-11 01:32:44', 'Jayson', '', ''),
(129, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-11 01:32:44', '2016-05-11 01:32:44', 'Jayson', '', ''),
(130, 'AHU Automation System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-11 01:32:44', '2016-05-11 01:32:44', 'Jayson', '', ''),
(131, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-11 01:34:44', '2016-05-11 01:34:44', 'Jayson', '', ''),
(132, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-11 01:34:44', '2016-05-11 01:34:44', 'Jayson', '', ''),
(133, 'Access Control System', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-11 03:40:54', '2016-05-11 03:40:54', 'Lorine', '', ''),
(134, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-11 03:53:45', '2016-05-11 03:53:45', 'Tester1', '', ''),
(135, 'Fire alaram System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-11 03:53:45', '2016-05-11 03:53:45', 'Tester1', '', ''),
(136, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 09:06:10', '2016-05-11 10:06:29', '2016-05-11 10:06:29', 'Lorine', '', ''),
(137, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-11 10:06:29', '2016-05-11 10:06:29', 'Lorine', '', ''),
(139, 'MCC_1.2v', '02-05-2016 09:06:10', '04-05-2016 09:06:10', '2016-05-16 22:52:10', '2016-05-16 22:52:10', 'Tester1', '2', ''),
(140, 'Access Control System', '02-05-2016 09:06:10', '03-05-2016 11:27:10', '2016-05-17 00:15:43', '2016-05-17 00:15:43', 'Tester1', '26.35', ''),
(141, 'AHU Automation System', '02-05-2016 09:06:10', '05-05-2016 11:06:10', '2016-05-17 00:16:23', '2016-05-17 00:16:23', 'Tester1', '74', ''),
(142, 'Access Control System', '02-05-2016 09:06:10', '03-05-2016 11:27:10', '2016-05-17 00:16:23', '2016-05-17 00:16:23', 'Tester1', '26.35', ''),
(143, 'AHU Automation System', '02-05-2016 09:06:10', '05-05-2016 11:06:10', '2016-05-17 00:17:36', '2016-05-17 00:17:36', 'Tester1', '74hours', ''),
(144, 'Access Control System', '02-05-2016 09:06:10', '03-05-2016 11:27:10', '2016-05-17 00:17:36', '2016-05-17 00:17:36', 'Tester1', '26.35hours', ''),
(145, 'AHU Automation System', '02-05-2016 09:06:10', '05-05-2016 11:06:10', '2016-05-17 00:18:06', '2016-05-17 00:18:06', 'Tester1', '74  hours', ''),
(146, 'Access Control System', '02-05-2016 09:06:10', '03-05-2016 11:27:10', '2016-05-17 00:18:06', '2016-05-17 00:18:06', 'Tester1', '26.35  hours', ''),
(147, 'Door Interlock System', '02-05-2016 09:06:10', '12-05-2016 09:06:10', '2016-05-17 01:25:03', '2016-05-17 01:25:03', 'Tester1', '240 hours', ''),
(288, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-31 03:45:02', '2016-05-31 03:45:02', 'Tester1', '10 hours', 'HSF'),
(152, 'Door Interlock System', '02-05-2016 09:06:10', '05-05-2016 10:06:10', '2016-05-17 01:33:29', '2016-05-17 01:33:29', 'Tester1', '73 hours', ''),
(153, 'Door Interlock System', '02-05-2016 09:06:10', '05-05-2016 10:36:10', '2016-05-17 01:33:57', '2016-05-17 01:33:57', 'Tester1', '73.5 hours', ''),
(154, 'AHU Automation System', '02-05-2016 09:06:10', '05-05-2016 11:06:10', '2016-05-17 06:21:50', '2016-05-17 06:21:50', 'Lorine', '74 hours', ''),
(155, 'MCC_1.2v', '02-05-2016 09:06:10', '03-05-201610:06:10', '2016-05-19 04:28:12', '2016-05-19 04:28:12', 'Tester1', '25 hours', ''),
(156, 'MCC_1.2v', '02-05-2016 09:06:10', '03-05-201610:06:10', '2016-05-19 04:29:25', '2016-05-19 04:29:25', 'Tester1', '25 hours', ''),
(157, 'AHU Automation System', '02-05-2016 09:06:10', '05-05-2016 11:06:10', '2016-05-19 04:29:25', '2016-05-19 04:29:25', 'Tester1', '74 hours', ''),
(158, 'Door Interlock System', '02-05-2016 09:06:10', '05-05-2016 10:06:10', '2016-05-19 04:29:25', '2016-05-19 04:29:25', 'Tester1', '73 hours', ''),
(159, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-201611:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '2 hours', ''),
(160, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '03-05-2016 09:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '24 hours', ''),
(161, 'Fire alaram System', '03-05-2016 09:06:10', '03-05-2016 19:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '10 hours', ''),
(162, 'AHU Automation System', '06-05-2016 09:06:10', '07-05-2016 09:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '24 hours', ''),
(163, 'Access Control System', '08-05-2016 09:06:10', '09-05-2016 09:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '24 hours', ''),
(164, 'EBMR', '10-05-2016 09:06:10', '11-05-2016 09:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '24 hours', ''),
(165, 'Door Interlock System', '12-05-2016 09:06:10', '13-05-2016 09:06:10', '2016-05-19 05:04:30', '2016-05-19 05:04:30', 'Jayson', '24 hours', ''),
(166, 'EBMR', '14-05-2016 09:06:10', '15-05-2016 09:06:10', '2016-05-19 06:27:47', '2016-05-19 06:27:47', 'Lorine', '24 hours', ''),
(167, 'MCC_1.2v', '04-05-2016 09:06:10', '06-05-2016 09:06:10', '2016-05-20 03:16:13', '2016-05-20 03:16:13', 'Tester1', '48 hours', ''),
(168, 'MCC_1.2v', '04-05-2016 09:06:10', '04-05-2016 18:06:10', '2016-05-20 03:20:27', '2016-05-20 03:20:27', 'Tester1', '9 hours', ''),
(169, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-20 03:25:20', '2016-05-20 03:25:20', 'Tester1', '9 hours', ''),
(170, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 03:57:25', '2016-05-20 03:57:25', 'Tester1', '7 hours', ''),
(171, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-20 03:57:35', '2016-05-20 03:57:35', 'Tester1', '10 hours', ''),
(172, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-20 03:59:20', '2016-05-20 03:59:20', 'Tester1', '3 hours', ''),
(173, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-20 04:00:20', '2016-05-20 04:00:20', 'Tester1', '3 hours', ''),
(174, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 04:01:44', '2016-05-20 04:01:44', 'Tester1', '7 hours', ''),
(175, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 04:01:50', '2016-05-20 04:01:50', 'Tester1', '7 hours', ''),
(176, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 04:04:42', '2016-05-20 04:04:42', 'Tester1', '7 hours', ''),
(177, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-20 04:34:08', '2016-05-20 04:34:08', 'Tester1', '6 hours', ''),
(178, 'EBMR', '01-05-2016 09:09:10', '01-05-2016 14:09:10', '2016-05-20 04:58:19', '2016-05-20 04:58:19', 'Tester1', '5 hours', ''),
(179, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 10:00:13', '2016-05-20 10:00:13', 'Tester1', '7 hours', ''),
(180, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 10:01:10', '2016-05-20 10:01:10', 'Tester1', '7 hours', ''),
(181, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 10:04:35', '2016-05-20 10:04:35', 'Tester1', '7 hours', ''),
(182, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-20 10:05:44', '2016-05-20 10:05:44', 'Tester1', '7 hours', ''),
(183, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-20 22:55:07', '2016-05-20 22:55:07', 'Tester1', '9 hours', ''),
(184, 'MCC_1.2v', '08-05-2016 09:06:10', '08-05-2016 16:06:10', '2016-05-21 09:38:32', '2016-05-21 09:38:32', 'Tester1', '7 hours', ''),
(185, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 13:06:10', '2016-05-22 12:38:27', '2016-05-22 12:38:27', 'Lorine', '4 hours', ''),
(186, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 13:06:10', '2016-05-22 12:47:35', '2016-05-22 12:47:35', 'Lorine', '4 hours', ''),
(187, 'Access Control System', '02-05-2016 09:06:10', '02-05-2016 14:06:10', '2016-05-22 12:47:35', '2016-05-22 12:47:35', 'Lorine', '5 hours', ''),
(188, 'project2', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-22 12:48:53', '2016-05-22 12:48:53', 'Lorine', '3 hours', ''),
(189, 'Project3', '02-05-2016 09:06:10', '02-05-2016 14:06:10', '2016-05-22 12:48:53', '2016-05-22 12:48:53', 'Lorine', '5 hours', ''),
(190, 'project4', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-22 13:07:20', '2016-05-22 13:07:20', 'Tester1', '7 hours', ''),
(191, 'Project5', '02-05-2016 09:06:10', '02-05-2016 17:06:10', '2016-05-22 21:34:19', '2016-05-22 21:34:19', 'Tester1', '8 hours', ''),
(192, 'Project5', '02-05-2016 09:06:10', '02-05-2016 17:06:10', '2016-05-22 22:20:52', '2016-05-22 22:20:52', 'Tester1', '8 hours', ''),
(193, 'Project5', '02-05-2016 09:06:10', '02-05-2016 17:06:10', '2016-05-22 22:21:27', '2016-05-22 22:21:27', 'Tester5', '8 hours', ''),
(194, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 17:06:10', '2016-05-22 22:34:41', '2016-05-22 22:34:41', 'Tester5', '8 hours', ''),
(195, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-23 11:30:00', '2016-05-23 11:30:00', 'Jayson', '6 hours', 'SPD'),
(241, 'aaaaa', '02-05-2016 12:49', '02-05-2016 19:49', '2016-05-30 01:53:01', '2016-05-30 01:53:01', 'Lorine', '7 hours', 'Cepha'),
(197, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-23 11:30:27', '2016-05-23 11:30:27', 'Jayson', '6 hours', 'SPD'),
(198, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-23 11:30:27', '2016-05-23 11:30:27', 'Jayson', '7 hours', 'Cepha'),
(199, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-23 11:31:23', '2016-05-23 11:31:23', 'Jayson', '3 hours', 'SPD'),
(200, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-23 11:31:53', '2016-05-23 11:31:53', 'Jayson', '3 hours', 'SPD'),
(201, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-23 11:32:25', '2016-05-23 11:32:25', 'Jayson', '3 hours', 'SPD'),
(202, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-23 11:35:55', '2016-05-23 11:35:55', 'Jayson', '10 hours', 'SPD'),
(203, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-23 11:36:01', '2016-05-23 11:36:01', 'Jayson', '10 hours', 'SPD'),
(204, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-23 11:36:39', '2016-05-23 11:36:39', 'Jayson', '10 hours', 'SPD'),
(205, 'Access Control System', '02-05-2016 09:06:10', '02-05-2016 13:06:10', '2016-05-23 11:36:39', '2016-05-23 11:36:39', 'Jayson', '4 hours', 'SFF'),
(206, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-23 11:37:30', '2016-05-23 11:37:30', 'Jayson', '10 hours', 'SPD'),
(207, 'Access Control System', '02-05-2016 09:06:10', '02-05-2016 13:06:10', '2016-05-23 11:37:30', '2016-05-23 11:37:30', 'Jayson', '4 hours', 'SFF'),
(208, 'Project5', '02-05-2016 09:06:10', '02-05-2016 17:06:10', '2016-05-23 11:37:30', '2016-05-23 11:37:30', 'Jayson', '8 hours', 'HSF'),
(209, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-23 12:00:28', '2016-05-23 12:00:28', 'Lorine', '10 hours', 'SPD'),
(210, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-23 23:43:17', '2016-05-23 23:43:17', 'Jayson', '7 hours', ''),
(211, 'AHU Automation System', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-23 23:43:17', '2016-05-23 23:43:17', 'Jayson', '7 hours', ''),
(212, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-23 23:43:38', '2016-05-23 23:43:38', 'Jayson', '7 hours', ''),
(213, 'AHU Automation System', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-23 23:43:38', '2016-05-23 23:43:38', 'Jayson', '7 hours', ''),
(214, 'Access Control System', '08-05-2016 09:06:10', '08-05-2016 16:06:10', '2016-05-23 23:43:38', '2016-05-23 23:43:38', 'Jayson', '7 hours', ''),
(215, 'EBMR', '10-05-2016 09:06:10', '10-05-2016 17:06:10', '2016-05-23 23:43:38', '2016-05-23 23:43:38', 'Jayson', '8 hours', ''),
(216, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-24 22:29:13', '2016-05-24 22:29:13', 'Lorine', '7 hours', 'SPD'),
(217, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-24 23:37:13', '2016-05-24 23:37:13', 'Tester1', '6 hours', 'SPD'),
(218, 'Project6', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-24 23:42:10', '2016-05-24 23:42:10', 'Tester1', '6 hours', 'SPD'),
(219, 'Project6', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-25 00:02:50', '2016-05-25 00:02:50', 'Tester1', '6 hours', 'SPD'),
(220, 'Project6', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-25 00:03:24', '2016-05-25 00:03:24', 'Tester1', '6 hours', 'SPD'),
(221, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-25 03:20:09', '2016-05-25 03:20:09', 'Tester1', '7 hours', 'SPD'),
(222, 'Project3', '02-05-2016 09:06:10', '02-05-2016 14:06:10', '2016-05-25 03:20:09', '2016-05-25 03:20:09', 'Tester1', '5 hours', 'BLD'),
(223, 'Project3', '02-05-2016 09:06:10', '02-05-2016 14:06:10', '2016-05-25 03:25:58', '2016-05-25 03:25:58', 'Tester1', '5 hours', 'BLD'),
(224, 'project2', '02-05-2016 09:06:10', '02-05-2016 12:06:10', '2016-05-25 04:13:42', '2016-05-25 04:13:42', 'Tester1', '3 hours', 'SPD'),
(225, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-25 05:46:49', '2016-05-25 05:46:49', 'Ganesh', '7 hours', 'SPD'),
(226, 'fire alarm system', '03-05-2016 09:06:10', '03-05-2016 19:06:10', '2016-05-25 05:46:49', '2016-05-25 05:46:49', 'Ganesh', '10 hours', 'BLD'),
(227, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-25 06:02:43', '2016-05-25 06:02:43', 'Lorine', '7 hours', 'SPD'),
(228, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-25 06:03:01', '2016-05-25 06:03:01', 'Lorine', '7 hours', 'SPD'),
(229, 'fire alarm system', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-25 06:03:01', '2016-05-25 06:03:01', 'Lorine', '10 hours', 'BLD'),
(230, 'Access Control System', '02-05-2016 09:06:10', '02-05-2016 11:06:10', '2016-05-25 06:03:01', '2016-05-25 06:03:01', 'Lorine', '2 hours', 'SFF'),
(231, 'Automatic solution control dispensing system', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-25 23:56:11', '2016-05-25 23:56:11', 'Tester1', '6 hours', 'SPD'),
(232, 'Automatic solution control dispensing system', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-25 23:56:56', '2016-05-25 23:56:56', 'Tester1', '6 hours', 'SPD'),
(233, 'project9', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-25 23:56:56', '2016-05-25 23:56:56', 'Tester1', '6 hours', 'SPD'),
(234, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-25 23:57:45', '2016-05-25 23:57:45', 'Tester1', '7 hours', 'SPD'),
(235, 'Door Interlock System', '02-05-2016 09:06:10', '02-05-2016 10:06:10', '2016-05-25 23:57:45', '2016-05-25 23:57:45', 'Tester1', '1 hours', 'SFF'),
(236, 'project9', '02-05-2016 09:06:10', '02-05-2016 15:06:10', '2016-05-25 23:57:45', '2016-05-25 23:57:45', 'Tester1', '6 hours', 'SPD'),
(237, 'project2', '02-05-2016 09:06:10', '02-05-2016 10:06:10', '2016-05-26 00:42:12', '2016-05-26 00:42:12', 'Tester1', '1 hours', 'SFF'),
(238, 'Automatic solution control dispensing system', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-27 00:15:43', '2016-05-27 00:15:43', 'Lorine', '7 hours', 'HSF'),
(239, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-27 00:34:09', '2016-05-27 00:34:09', 'Lorine', '7 hours', 'Cepha'),
(240, 'MCC_1.2v', '21-05-2016 09:45', '21-05-2016 16:48', '2016-05-27 22:48:53', '2016-05-27 22:48:53', 'Tester1', '7.05 hours', 'Cepha'),
(242, 'aaaaa', '02-05-2016 12:49', '02-05-2016 19:49', '2016-05-30 01:55:55', '2016-05-30 01:55:55', 'Lorine', '7 hours', 'Cepha'),
(243, 'aaaaa', '02-05-2016 14:43', '02-05-2016 21:43', '2016-05-30 03:59:11', '2016-05-30 03:59:11', 'Lorine', '7 hours', 'Cepha'),
(244, 'aaaaa', '02-05-2016 14:43', '02-05-2016 21:43', '2016-05-30 04:12:47', '2016-05-30 04:12:47', 'Lorine', '7 hours', 'Cepha'),
(245, 'aaaaa', '02-05-2016 14:43', '02-05-2016 21:43', '2016-05-30 04:37:45', '2016-05-30 04:37:45', 'Lorine', '7 hours', 'Cepha'),
(246, 'MCC_1.2v', '21-05-2016 09:50', '21-05-2016 15:50', '2016-05-30 04:51:15', '2016-05-30 04:51:15', 'Lorine', '6 hours', 'Cepha'),
(247, 'EBMR', '21-05-2016 09:50', '21-05-2016 15:50', '2016-05-30 04:51:15', '2016-05-30 04:51:15', 'Lorine', '6 hours', 'HSF'),
(248, 'aaaaa', '21-05-2016 09:50', '21-05-2016 15:50', '2016-05-30 04:51:15', '2016-05-30 04:51:15', 'Lorine', '6 hours', 'OTL'),
(249, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:14', '2016-05-30 04:52:14', 'Lorine', '9 hours', 'Cepha'),
(250, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:25', '2016-05-30 04:52:25', 'Lorine', '9 hours', 'Cepha'),
(251, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:29', '2016-05-30 04:52:29', 'Lorine', '9 hours', 'Cepha'),
(252, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:33', '2016-05-30 04:52:33', 'Lorine', '9 hours', 'Cepha'),
(253, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:36', '2016-05-30 04:52:36', 'Lorine', '9 hours', 'Cepha'),
(254, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:39', '2016-05-30 04:52:39', 'Lorine', '9 hours', 'Cepha'),
(255, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 18:06:10', '2016-05-30 04:52:52', '2016-05-30 04:52:52', 'Lorine', '9 hours', 'Cepha'),
(256, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(257, 'Oxygen Monitoring System', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(258, 'fire alarm system', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(259, 'AHU Automation System', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(260, 'Access Control System', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(261, 'EBMR', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(262, 'Door Interlock System', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(263, 'project4', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(264, 'Project5', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(265, 'Automatic solution control dispensing system', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(266, 'project7', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(267, 'project9', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(268, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(269, 'project100', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(270, 'project200', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:26:15', '2016-05-30 05:26:15', 'Lorine', '10 hours', 'SPD'),
(271, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:37:42', '2016-05-30 05:37:42', 'Lorine', '10 hours', 'SPD'),
(272, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 05:40:38', '2016-05-30 05:40:38', 'Tester1', '10 hours', 'SPD'),
(273, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-30 05:57:16', '2016-05-30 05:57:16', 'Tester1', '7 hours', 'SPD'),
(274, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-30 05:59:35', '2016-05-30 05:59:35', 'Tester1', '7 hours', ''),
(275, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:15:54', '2016-05-30 06:15:54', 'Tester1', '10 hours', 'Cepha'),
(276, 'fire alarm system', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:15:54', '2016-05-30 06:15:54', 'Tester1', '10 hours', 'Cepha'),
(277, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:16', '2016-05-30 06:17:16', 'Tester1', '10 hours', ''),
(278, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:18', '2016-05-30 06:17:18', 'Tester1', '10 hours', ''),
(279, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:21', '2016-05-30 06:17:21', 'Tester1', '10 hours', ''),
(280, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:28', '2016-05-30 06:17:28', 'Tester1', '10 hours', ''),
(281, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:31', '2016-05-30 06:17:31', 'Tester1', '10 hours', ''),
(282, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:33', '2016-05-30 06:17:33', 'Tester1', '10 hours', ''),
(283, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:36', '2016-05-30 06:17:36', 'Tester1', '10 hours', ''),
(284, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:38', '2016-05-30 06:17:38', 'Tester1', '10 hours', ''),
(285, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:41', '2016-05-30 06:17:41', 'Tester1', '10 hours', ''),
(286, 'aaaaa', '02-05-2016 09:06:10', '02-05-2016 19:06:10', '2016-05-30 06:17:43', '2016-05-30 06:17:43', 'Tester1', '10 hours', ''),
(287, 'MCC_1.2v', '02-05-2016 09:06:10', '02-05-2016 16:06:10', '2016-05-31 01:09:55', '2016-05-31 01:09:55', 'Tester1', '7 hours', 'Cepha'),
(289, 'MCC_1.2v', '01-06-2016 09:53', '01-06-2016 17:53', '2016-06-01 06:54:13', '2016-06-01 06:54:13', 'Jayson', '8 hours', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estimated_Time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_StartDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_EndDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Timespent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PO_Number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PO_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PO_Value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PO_Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `created_at`, `updated_at`, `Estimated_Time`, `Status`, `Project_StartDate`, `Project_EndDate`, `Timespent`, `PO_Number`, `PO_Date`, `PO_Value`, `PO_Description`, `Project_ID`) VALUES
(1, 'MCC_1.2v', '2016-04-30 02:50:30', NULL, '500', 'Enabled', '', '', '38', '', '', '', '', ''),
(2, 'Oxygen Monitoring System', '2016-04-30 03:42:35', NULL, '500', 'Enabled', '', '', '10', '', '', '', '', ''),
(3, 'fire alarm system', '2016-05-02 00:52:35', NULL, '500', 'Enabled', '', '', '20', '', '', '', '', ''),
(4, 'AHU Automation System', '2016-05-05 07:11:28', '2016-05-07 11:09:39', '500', 'Enabled', '', '', '10', '', '', '', '', ''),
(5, 'Access Control System', '2016-05-11 03:38:07', NULL, '500', 'Enabled', '', '', '10', '', '', '', '', ''),
(6, 'EBMR', '2016-05-11 05:57:25', NULL, '300', 'Enabled', '', '', '16', '', '', '', '', ''),
(7, 'Door Interlock System', '2016-05-11 10:08:32', NULL, '150', 'Enabled', '', '', '10', '', '', '', '', ''),
(8, 'project2', '2016-05-21 00:41:31', NULL, '100', 'Disabled', '', '', '', '', '', '', '', ''),
(9, 'Project3', '2016-05-21 00:41:49', NULL, '100', 'Disabled', '', '', '', '', '', '', '', ''),
(10, 'project4', '2016-05-22 13:06:50', NULL, '150', 'Disabled', '', '', '10', '', '', '', '', ''),
(11, 'Project5', '2016-05-22 21:33:57', NULL, '100', 'Disabled', '', '', '10', '', '', '', '', ''),
(13, 'Project6', '2016-05-24 23:30:56', NULL, '20', 'Disabled', '', '', '', '', '', '', '', ''),
(15, 'Automatic solution control dispensing system', '2016-05-25 03:33:01', NULL, '250', 'Disabled', '', '', '10', '', '', '', '', ''),
(16, 'project7', '2016-05-25 03:37:11', NULL, '150', 'Disabled', '', '', '10', '', '', '', '', ''),
(17, 'project9', '2016-05-25 04:05:38', NULL, '120', 'Disabled', '', '', '10', '', '', '', '', ''),
(18, 'Project12', '2016-05-25 05:55:07', NULL, '150', 'Disabled', '', '', '', '', '', '', '', ''),
(19, 'aaaaa', '2016-05-28 03:39:31', NULL, '175', 'Enabled', '02-05-2016', '26-05-2016', '220', '', '', '', '', ''),
(21, 'project100', '2016-05-28 03:48:03', NULL, '175', 'Disabled', '02-05-2016', '26-05-2016', '10', '', '', '', '', ''),
(22, 'project200', '2016-05-28 03:59:00', NULL, '175', 'Disabled', '02-05-2016', '26-05-2016', '10', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sitenames`
--

DROP TABLE IF EXISTS `sitenames`;
CREATE TABLE IF NOT EXISTS `sitenames` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sitenames`
--

INSERT INTO `sitenames` (`id`, `site`, `created_at`, `updated_at`) VALUES
(1, '', '2016-05-23 10:27:34', NULL),
(2, 'Cepha', '2016-05-23 11:16:54', NULL),
(3, 'SFF', '2016-05-23 11:17:03', NULL),
(4, 'HSF', '2016-05-23 11:17:12', NULL),
(5, 'OTL', '2016-05-27 01:28:03', NULL),
(6, 'SPD', '2016-05-30 12:11:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statusapproves`
--

DROP TABLE IF EXISTS `statusapproves`;
CREATE TABLE IF NOT EXISTS `statusapproves` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ApprovalStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statusapproves`
--

INSERT INTO `statusapproves` (`id`, `ApprovalStatus`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'Approved', NULL, NULL),
(3, 'Rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

DROP TABLE IF EXISTS `teammembers`;
CREATE TABLE IF NOT EXISTS `teammembers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MemeberDetails` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teammembers`
--

INSERT INTO `teammembers` (`id`, `name`, `MemeberDetails`, `Designation`, `created_at`, `updated_at`) VALUES
(1, 'Jayson', 'Over 20 years of experience\r\nEmbedded Systems for Air force - DRDO\r\nProcess Control Systems for Industrial Automation - Honeywell\r\nIntegrated Building Management Automation Solutions – Honeywell\r\nAutomation Technologies and software', 'Director', NULL, NULL),
(2, 'Ganesh', 'Over 30 years of experience\r\nPower plant projects – BHEL\r\nProduct Development for power plants - ABB\r\nProduct development for industrial controls - Honeywell\r\nProduct development for building management Honeywell\r\nAutomation Technologies and software', 'Director', NULL, NULL),
(3, 'Manjunath', 'Ball Dispensing System.\r\nSpecial Access Control System \r\nDepartment : Software Development.', 'Automation Engineer', NULL, NULL),
(4, 'Lorine', '3 years 9 month Experience - Mactus Technology Solution,\r\n\r\nMCC version 1.2, Computer System Validation\r\nDepartment : Software Development ', 'Software Engineer', NULL, NULL),
(5, 'Vishnujith', 'Projects : Automatic Solution Dispensing System.\r\nIndusoft Evaluation.\r\nQLS Printing.\r\nupgradation of ASDS.\r\nMCC demo.\r\n\r\nDepartment : Project Execution', 'Automation Engineer\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Company_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `Role`, `Company_id`) VALUES
(1, 'Tester1', 'Tester1@gmail.com', '$2y$10$iiJLneJ8EYrzGGw8KFiFGO6y5Oj2Z/utcXrm3grr5nd1YfQ..XqZK', 'UdxXqop7mhwzk4HWsGrhPGNSQnweJhvsKBWv9AP2ooBowOP2jFHx90VIR2B3', '2016-04-30 04:04:08', '2016-05-31 09:45:58', 'Admin', 'Mactus'),
(2, 'Lorine', 'lorine.22@gmail.com', '$2y$10$aMbRBlKtm9f/pvGQ48zVA.pzA0kgevkZU7k4ztCXb6DNcsueR3K9O', 'nPoayZyV4NlCrSOMIZntUJSzH5hAHvNi4TZckG3XWFB83CMaG2ZW6Bgpb09H', '2016-05-08 23:38:51', '2016-06-03 01:45:54', 'Manager', 'Mactus'),
(4, 'Ganesh', 'Ganesh@gmail.com', '$2y$10$sSJcNc1clRf7cbY3wljbJuP9w.IaWKQNzULAgRGoD1aHKw2i30sM6', 'GImkpN2jyAxow6VIGeCVdPKubkquBtYkh1ew9QYAcqUM2IMCdA0V9b9zEhzh', '2016-05-11 00:56:00', '2016-05-28 04:46:31', 'Admin', 'Mactus'),
(3, 'Jayson', 'Jayson@gmail.com', '$2y$10$dN1RzcJkm4t5fwzT3Gfx5eQ5DpzdaPwBasF3P2ZoIUBliAO6AJMXS', 'ZELySePP7ygiJ193GSaN33c8ic71lhyseJO3FkkeYnwzzmGNVTP7YoZrluWi', '2016-05-09 00:02:33', '2016-06-02 23:12:39', 'Admin', 'Mactus'),
(7, 'Tester4', 'Tester4@gmail.com', '$2y$10$pweEoDdqHE4ygBvHu..rSuMcLjsi9scabh5jIrzzyGAewjBsyIPBy', 'RBekivSKYCINCxypeVNtsdFScneXHQMjMLuhvSOLOG2AVWPfSBv0zQZbKdqk', '2016-05-22 22:17:29', '2016-05-25 06:06:14', 'Manager', 'Greenleap'),
(8, 'Tester5', 'Tester5@gmail.com', '$2y$10$QkIaOYiQt0YxFmQvQtDjNuZRTxaiBVloWtgOwmQJSULBLn5JLWEiG', 'AM9E24Thh5tr6G6wFpMPigxZrAJvbtCCQI9hU48TAQLUxaNsMAUAiz8T9GoB', '2016-05-22 22:19:22', '2016-05-22 22:38:35', 'Admin', 'Greenleap'),
(9, 'Manjunath', 'badimanjunath@gmail.com', '$2y$10$0iIYon/EtV/4eERNMcrmoOLq/vsIuTDP91SVSBCIEee5aAzDEbuCK', 'GGQNqTFlm6awSxF8cv7ZxJF4qa3eMfIUTr6s25bzmbr0YTgvarzNYwo0Ojnx', '2016-05-23 23:58:08', '2016-05-31 04:23:39', 'User', 'Mactus'),
(10, 'Vishnujith', 'vishnujith@mactus.in', '$2y$10$ve4KjkITh/msklPqJzyaLeYiQukSNQaN2f1YF49eTgD8D2Oa9.r9G', 'Fpa4JkbyUt0TU97ZHOEAlUbCoFg1cT9hcpkpZxcOqTZ3Bzg2c7sKHUM3RCkT', '2016-05-25 00:58:01', '2016-05-31 05:21:15', 'User', 'Mactus'),
(11, 'Tester10', 'Tester10@gmail.com', '$2y$10$a215Wl1rZ2jCNTgGrmKWwuTMCWGYUPMlYEQbkbX1UU8F9OqOOLIlW', NULL, '2016-05-28 04:19:33', '2016-05-28 04:19:33', 'User', ''),
(12, 'Tester11', 'Tester11@gmail.com', '$2y$10$iqDSX5Jb62JFJxOdPYtcCO/IZEyo59TKIbmHygAaYQX3UAJIkBrCm', NULL, '2016-05-28 04:26:06', '2016-05-28 04:26:06', 'User', 'Mactus'),
(13, '', '', '', NULL, NULL, NULL, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
