-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2025 at 03:54 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtfomben_textile`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `created_by`, `is_delete`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Human Resources Office', '1', '0', '2024-07-31 11:58:42', '2024-07-31 11:58:42', '0'),
(5, 'Procument Office', '1', '0', '2024-07-31 11:59:51', '2024-07-31 11:59:51', '0'),
(6, 'IT Department', '1', '0', '2024-07-31 12:00:08', '2024-07-31 12:00:08', '0'),
(7, 'Reception', '1', '0', '2024-07-31 12:00:21', '2024-07-31 12:00:21', '0'),
(8, 'Factory Manager', '1', '0', '2024-07-31 12:00:35', '2024-07-31 12:00:35', '0'),
(9, 'General Manager', '1', '0', '2024-07-31 12:00:51', '2024-07-31 12:00:51', '0'),
(10, 'Managing Director', '1', '0', '2024-07-31 12:01:04', '2024-07-31 12:01:04', '0'),
(11, 'Payroll Office', '1', '0', '2024-07-31 12:01:21', '2024-07-31 12:01:21', '0'),
(12, 'Dispatch', '1', '0', '2024-07-31 12:01:34', '2024-07-31 12:01:34', '0'),
(13, 'Technical', '1', '0', '2024-07-31 12:01:43', '2024-07-31 12:01:43', '0'),
(14, 'Sample Maker', '1', '0', '2024-07-31 12:01:52', '2024-07-31 12:01:52', '0'),
(15, 'Human Resources Office', '1', '0', '2024-07-31 12:04:23', '2024-07-31 12:04:23', '0'),
(16, 'Intern', '1', '0', '2024-07-31 12:04:57', '2024-07-31 12:04:57', '0'),
(17, 'Trim Stores and Receiving', '1', '0', '2024-07-31 12:14:38', '2024-07-31 12:20:23', '0'),
(18, 'Accounts', '1', '0', '2024-07-31 12:38:42', '2024-07-31 12:38:42', '0'),
(19, 'Accounts Assistant', '1', '0', '2024-07-31 12:45:25', '2024-07-31 12:45:25', '0'),
(20, 'Score Taker', '1', '0', '2024-09-16 07:43:02', '2024-09-16 07:43:02', '0'),
(21, 'IT Technician', '1', '0', '2025-01-16 03:59:03', '2025-01-16 03:59:03', '0'),
(22, 'Safety Officer', '1', '0', '2025-03-19 07:45:27', '2025-03-19 07:45:27', '0');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `assignment_date` varchar(255) DEFAULT NULL,
  `submission_date` varchar(255) DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submits`
--

CREATE TABLE `assignment_submits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_class_teachers`
--

CREATE TABLE `assign_class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_class_teachers`
--

INSERT INTO `assign_class_teachers` (`id`, `class_id`, `teacher_id`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`, `subject_id`) VALUES
(1, '7', '232', '0', '0', 1, '2024-12-04 12:45:03', '2025-02-07 16:02:32', NULL),
(2, '8', '231', '0', '0', 1, '2024-12-04 12:46:28', '2024-12-04 12:46:28', NULL),
(3, '5', '159', '0', '0', 1, '2025-03-25 04:53:13', '2025-03-25 04:56:32', NULL),
(4, '8', '160', '0', '0', 2, '2025-03-25 04:57:02', '2025-03-25 04:57:02', NULL),
(5, '7', '162', '0', '0', 2, '2025-03-25 05:16:54', '2025-03-25 05:16:54', NULL),
(7, '7', '165', '0', '0', 1, '2025-03-25 07:19:26', '2025-03-25 07:19:26', NULL),
(8, '7', '145', '0', '0', 1, '2025-03-25 07:19:26', '2025-03-25 07:19:26', NULL),
(9, '6', NULL, '0', '0', 1, '2025-03-25 07:33:03', '2025-03-25 07:33:26', NULL),
(10, '6', '166', '0', '0', 2, '2025-03-25 07:34:37', '2025-03-25 07:34:37', NULL),
(11, '1', '163', '0', '0', 2, '2025-03-25 07:35:15', '2025-03-25 07:35:15', NULL),
(12, '9', '164', '0', '0', 2, '2025-03-25 07:36:39', '2025-03-25 07:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `reciever_id` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinytext NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `status`, `created_at`, `updated_at`, `created_by`, `is_delete`) VALUES
(1, 'Line 7', '0', '2024-12-04 09:09:12', '2025-02-10 11:33:35', 1, '0'),
(2, 'Line 6', '0', '2024-12-04 10:34:23', '2025-02-10 11:33:23', 1, '0'),
(3, 'Line 5', '0', '2024-12-04 11:43:28', '2025-02-10 11:33:10', 1, '0'),
(4, 'Line 4', '0', '2024-12-04 11:43:51', '2025-02-10 11:32:56', 1, '0'),
(5, 'Line 3', '0', '2024-12-04 11:44:13', '2025-02-10 11:32:43', 1, '0'),
(6, 'Line 2', '0', '2024-12-04 11:44:42', '2025-02-10 11:32:27', 1, '0'),
(7, 'Line 1', '0', '2024-12-04 12:16:32', '2025-02-10 11:32:10', 1, '0'),
(8, 'Cutting', '0', '2024-12-04 12:46:10', '2025-02-10 11:31:55', 1, '0'),
(9, 'All lines', '0', '2025-03-25 07:38:05', '2025-03-25 07:38:05', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` tinyint(4) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetables`
--

CREATE TABLE `class_subject_timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subject_timetables`
--

INSERT INTO `class_subject_timetables` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 1, '10:30', '12:00', '2', '2023-10-28 16:28:46', '2023-10-28 16:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_status`
--

CREATE TABLE `employee_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_status`
--

INSERT INTO `employee_status` (`id`, `name`, `created_by`, `is_delete`, `created_at`, `updated_at`, `status`) VALUES
(0, 'Active', '1', '0', '2025-03-22 12:04:40', '2025-03-22 12:04:40', '0'),
(2, 'Exited', '1', '0', '2025-03-22 12:05:02', '2025-03-24 06:59:20', '0'),
(3, 'Suspended', '1', '0', '2025-03-22 17:39:51', '2025-03-22 17:39:51', '0'),
(4, 'Layoff', '1', '0', '2025-03-22 17:40:05', '2025-03-22 17:40:05', '0'),
(5, '8 Days Leave', '1', '0', '2025-04-01 11:40:29', '2025-04-01 11:40:29', '0');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `gazett_rate` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `note`, `gazett_rate`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(2, 'Learner Mechanic A', 'an employee who has less than 3 months on the job training', '9.85', '1', '0', '2024-07-31 04:23:16', '2024-07-31 05:56:33'),
(3, 'Casual Labourer', 'Employee who is employed for not more than 24 hours at a time', '9.85', '1', '0', '2024-07-31 04:23:33', '2024-07-31 05:53:38'),
(4, 'Learner Sewing Machinist A', 'An employee with less than 3 months on the job training to be a sewing machinist', '9.85', '1', '0', '2024-07-31 05:32:51', '2024-07-31 05:57:35'),
(5, 'Cleaner', 'Employee responsible for the cleaning of a factory, offices, toilets an canteen and who also performs tea making duties', '13.20', '1', '0', '2024-07-31 05:36:36', '2024-07-31 05:54:29'),
(6, 'Learner Mechanic B', 'Employee with 3 months or more on the job training but less than 6 months experience engaged in mechanical repairing and assembly of machinery', '13.20', '1', '0', '2024-07-31 05:47:06', '2024-07-31 05:57:09'),
(7, 'Fusers', 'An employee who irons pieces of materials through a fusing machine in the preparation section of clothing manufacture', '9.85', '1', '0', '2024-07-31 05:51:06', '2024-07-31 05:56:08'),
(8, 'Hand Trimmer', 'an employee who trims by means of a clipper all exceeds threads, binding and tapes after all closing operations have been done', '13.20', '1', '0', '2024-07-31 06:05:10', '2024-07-31 06:05:10'),
(9, 'Inline Examiner', 'An employee who examines the uncompleted garments during the manufacturing process', '13.20', '1', '0', '2024-07-31 06:12:46', '2024-07-31 06:12:46'),
(10, 'Layer-up', 'An employee who is engaged in the laying of material in one or more thicknesses on the cutting tables and may include the duty of slicing the ends', '13.20', '1', '0', '2024-07-31 06:15:43', '2024-07-31 06:15:43'),
(11, 'Packer', 'Packs clothes', '13.20', '1', '0', '2024-07-31 06:18:14', '2024-07-31 06:18:14'),
(12, 'Pressor', 'An employee who is employed to press parts of garments during the manufacturing process', '13.20', '1', '0', '2024-07-31 06:20:09', '2025-03-21 03:55:59'),
(13, 'Soberer', 'An employee who stamps information on to material or pieces of material by of a sober gun', '13.20', '1', '0', '2024-07-31 06:23:51', '2024-07-31 06:23:51'),
(14, 'Learner Sewing Machinist B', 'An employee with more than 3 months but less than 6 months training to be a sewing machinist', '13.20', '1', '0', '2024-07-31 06:26:17', '2024-07-31 06:26:17'),
(15, 'Dispatch Clerk', 'An employee who selects and packs good according to customers\' orders', '14.52', '1', '0', '2024-07-31 06:28:39', '2024-07-31 06:33:20'),
(16, 'Factory Clerk', 'An employee who is employed in the production area and who is wholly or mainly responsible for the recording of attendance and/or production data which may require further processing by office administrators', '14.52', '1', '0', '2024-07-31 06:32:57', '2024-07-31 06:32:57'),
(17, 'Checker', 'Checker', '14.52', '1', '0', '2024-07-31 06:34:51', '2024-07-31 06:34:51'),
(18, 'Re-Cutter', 'An employee who is engaged in the cutting out and/or marking in of materials for replacing damaged or missing parts of a garment', '16.34', '1', '0', '2024-07-31 06:38:11', '2024-07-31 07:38:21'),
(19, 'Sewing Machinist', 'An employee engaged to operate a sewing machine using a needle and a thread and, or an employee operating or an employee operating a rivet machine', '14.52', '1', '0', '2024-07-31 06:40:45', '2024-07-31 06:40:45'),
(20, 'Cutter', 'An employee who is engaged in cutting atrial by means of a machine in a factory', '16.34', '1', '0', '2024-07-31 06:43:21', '2024-07-31 06:43:21'),
(21, 'Driver', '', '16.34', '1', '0', '2024-07-31 06:46:41', '2024-07-31 06:46:41'),
(22, 'Driver Messager', 'An employee in possession of a valid driver\'s license who is mainly engaged in conveying messages, delivers and collects good or mail using a vehicle and also performs simple routines tasks in an office', '16.34', '1', '0', '2024-07-31 06:50:42', '2024-07-31 06:50:42'),
(23, 'Mechanic 2', 'An employee who has more than 6 months, but less than 12 months experience engaged mechanical in, repairing and assembly of machinery', '16.34', '1', '0', '2024-07-31 06:54:47', '2024-07-31 06:54:47'),
(24, 'Office/Computer Clerk', 'An employee who does general clerical duties including invoicing, data capturing and generally works on a computer in the office', '16.34', '1', '0', '2024-07-31 06:56:55', '2024-07-31 06:56:55'),
(25, 'Sorter', 'An employee performing the sorting out of garments or parts of garments', '13.20', '1', '0', '2024-07-31 07:05:23', '2024-07-31 07:05:23'),
(26, 'Roving  QC', 'Roving QC', '13.20', '1', '0', '2024-07-31 07:08:52', '2024-07-31 07:08:52'),
(27, 'Final QC', 'Final QC', '13.20', '1', '0', '2024-07-31 07:09:21', '2024-07-31 07:09:21'),
(28, 'Endline QC', 'Endline QC', '13.20', '1', '0', '2024-07-31 07:09:41', '2024-07-31 07:09:41'),
(29, 'Helper', 'Helper', '9.85', '1', '0', '2024-07-31 08:35:34', '2024-07-31 08:35:34'),
(30, 'Loader', 'Loader', '13.17', '1', '0', '2024-08-01 12:15:23', '2024-08-01 12:15:23'),
(31, 'Security Guard', 'Security Guard', '14.52', '1', '0', '2024-08-07 03:41:40', '2024-08-07 03:41:40'),
(32, 'Supervisor', 'Supervisor', '15.20', '1', '0', '2025-03-19 10:12:49', '2025-03-19 10:12:49'),
(33, 'Score Taker', '', '', '1', '0', '2025-03-19 10:13:56', '2025-03-19 10:13:56'),
(34, 'Inline Helper', '', '', '1', '0', '2025-03-19 10:20:34', '2025-03-20 12:47:14'),
(35, 'Elasticator', '', '', '1', '0', '2025-03-19 10:21:09', '2025-03-19 10:21:09'),
(36, 'Trimmer', '', '', '1', '0', '2025-03-19 11:29:52', '2025-03-19 11:29:52'),
(37, 'Elasticator', 'Elasticator', '10', '1', '0', '2025-03-20 11:06:39', '2025-03-20 11:06:39'),
(38, 'Dispatch Officer', '', '', '1', '0', '2025-04-02 12:16:57', '2025-04-02 12:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_date` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `full_marks` varchar(255) DEFAULT NULL,
  `passing_mark` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `percent_from` varchar(255) NOT NULL DEFAULT '0',
  `percent_to` varchar(255) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `name`, `percent_from`, `percent_to`, `created_by`, `created_at`, `updated_at`, `comments`) VALUES
(5, 'A*', '95', '100', 2, '2023-10-07 05:55:45', '2023-11-10 13:34:20', 'Very Good Keep it Up!!'),
(6, 'A', '90', '94', 2, '2023-10-07 05:56:43', '2023-10-07 05:56:43', NULL),
(7, 'B', '80', '89', 2, '2023-10-07 05:57:31', '2023-10-07 05:57:31', NULL),
(8, 'C', '70', '79', 2, '2023-10-07 05:57:45', '2023-11-11 10:30:31', 'Good but still room for improvement'),
(9, 'D', '60', '69', 2, '2023-10-07 05:58:19', '2023-10-07 05:58:19', NULL),
(10, 'E', '50', '59', 2, '2023-10-07 05:59:02', '2023-10-07 05:59:02', 'Good but still rooom for improvement'),
(11, 'F', '40', '49', 2, '2023-10-07 05:59:26', '2023-10-07 05:59:26', NULL),
(12, 'G', '0', '39', 2, '2023-10-07 05:59:46', '2023-10-07 05:59:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mark_registers`
--

CREATE TABLE `mark_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `exam_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `test_1_mark` varchar(255) DEFAULT '0',
  `test_2_mark` varchar(255) DEFAULT '0',
  `project_mark` varchar(255) DEFAULT '0',
  `exam_mark` varchar(255) DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_marks` varchar(255) NOT NULL DEFAULT '0',
  `passing_mark` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_04_18_032704_add_avatar_field_to_users_table', 1),
(6, '2023_08_11_152211_create_classrooms_table', 1),
(7, '2023_08_11_153213_add_created_by_to_classroom_table', 2),
(8, '2023_08_11_161025_add_is_delete_to_classroms_table', 3),
(9, '2023_08_12_050824_create_subjects_table', 4),
(10, '2023_08_12_071134_create_class_subjects_table', 5),
(11, '2023_08_24_165637_create_assign_class_teachers_table', 6),
(12, '2023_09_17_171945_create_weeks_table', 7),
(13, '2023_09_18_084436_create_class_subject_timetables_table', 8),
(14, '2023_09_24_161056_create_exams_table', 9),
(15, '2023_09_25_110304_create_exam_schedules_table', 10),
(16, '2023_09_26_182746_add_fullcalendar_day_to_wees_table', 11),
(17, '2023_10_02_055014_add_subject_id_to_assign_class_teachers_table', 12),
(18, '2023_10_03_114318_create_mark_registers_table', 13),
(19, '2023_10_06_062734_add_full_marks_to_mark_registers_table', 14),
(20, '2023_10_06_062805_add_passing_mark_to_mark_registers_table', 14),
(21, '2023_10_06_180334_create_marks_grades_table', 15),
(22, '2023_10_07_125138_create_student_attendances_table', 16),
(23, '2023_10_11_131227_create_notice_boards_table', 17),
(24, '2023_10_11_133806_create_notice_board_messages_table', 17),
(25, '2023_10_15_150410_add_academic_year_to_users_table', 18),
(26, '2023_10_15_150907_create_academic_years_table', 18),
(27, '2023_10_15_153943_add_status_to_academic_years_table', 19),
(28, '2023_10_16_191453_create_assignments_table', 20),
(29, '2023_10_21_063649_create_assignment_submits_table', 21),
(30, '2023_10_21_161015_add_amount_to_classrooms_table', 22),
(31, '2023_10_22_140040_create_student_add_fees_table', 23),
(32, '2023_10_24_124631_add_is_payment_to_student_add_fees_table', 24),
(33, '2023_10_27_195111_create_settings_table', 25),
(34, '2023_11_01_153332_create_chats_table', 26),
(35, '2023_11_05_062813_add_center_number_to_settings_table', 27),
(37, '2023_11_10_151511_add_comments_to_marks_grades_table', 28),
(38, '2023_11_11_043004_add_exam_description_to_settings_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `notice_boards`
--

CREATE TABLE `notice_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notice_date` varchar(255) DEFAULT NULL,
  `publish_date` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice_board_messages`
--

CREATE TABLE `notice_board_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_board_id` varchar(255) DEFAULT NULL,
  `message_to` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Mtfombeni Investments (PTY) Ltd.', '20250210010511.png', '20250210010511.png', '2023-10-28 06:48:02', '2025-02-10 11:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `student_add_fees`
--

CREATE TABLE `student_add_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) NOT NULL DEFAULT '0',
  `paid_amount` varchar(255) NOT NULL DEFAULT '0',
  `remaining_amount` varchar(255) NOT NULL DEFAULT '0',
  `payment_type` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_payment` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `attendance_date` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `attendance_type` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `class_id`, `attendance_date`, `student_id`, `attendance_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '6', '2024-12-04', '228', '1', '1', '2024-12-04 12:12:20', '2024-12-04 12:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `is_delete` varchar(255) NOT NULL DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'FLAT', '0', '0', '1', '2024-05-20 10:26:37', '2024-05-20 10:26:37'),
(2, '5 THREAD', '0', '0', '1', '2024-05-20 10:26:53', '2024-05-20 10:26:53'),
(3, '4 THREAD', '0', '0', '1', '2024-05-20 10:27:08', '2024-05-20 10:27:08'),
(4, '0/CLOCK', '0', '0', '1', '2024-05-20 10:27:25', '2024-05-20 10:27:25'),
(5, 'BUTTON HOLE', '0', '0', '1', '2024-05-20 10:27:51', '2024-05-20 10:27:51'),
(6, 'BUTTON SEW', '0', '0', '1', '2024-05-20 10:28:16', '2024-05-20 10:28:16'),
(7, 'COVER SEAM', '0', '0', '1', '2024-05-20 10:28:31', '2024-05-20 10:28:31'),
(8, 'BARTACK', '0', '0', '1', '2024-05-20 10:28:45', '2024-05-20 10:28:45'),
(9, 'FOA', '0', '0', '1', '2024-05-20 10:28:56', '2024-05-20 10:28:56'),
(10, 'COVER SEAM BIND', '0', '0', '1', '2024-05-20 10:29:12', '2024-05-20 10:29:12'),
(11, 'FLAT BIND', '0', '0', '1', '2024-05-20 10:29:29', '2024-05-20 10:29:29'),
(12, 'DOUBLE NEEDLE', '0', '0', '1', '2024-05-20 10:29:43', '2024-05-20 10:29:43'),
(13, 'BLIND STICH', '0', '0', '1', '2024-05-20 10:29:57', '2024-05-20 10:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `is_role` varchar(255) NOT NULL DEFAULT '3',
  `admission_number` varchar(255) DEFAULT NULL,
  `roll_number` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `probation_date` date DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `probation_status` bigint(20) DEFAULT 0,
  `marital_status` varchar(255) DEFAULT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `is_delete` tinytext NOT NULL DEFAULT '0' COMMENT '0:no, 1:yes',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Active 1:Inactive',
  `academic_year_id` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `nxt_name` varchar(255) DEFAULT NULL,
  `nxt_contact` varchar(255) DEFAULT NULL,
  `new_rate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `tax_number`, `email`, `phone`, `qualification`, `is_role`, `admission_number`, `roll_number`, `class_id`, `gender`, `occupation`, `date_of_birth`, `id_number`, `age`, `address`, `admission_date`, `probation_date`, `work_experience`, `designation`, `p_address`, `bank_name`, `bank_account`, `probation_status`, `marital_status`, `previous_school`, `document_file`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `is_delete`, `status`, `academic_year_id`, `note`, `relationship`, `nxt_name`, `nxt_contact`, `new_rate`) VALUES
(1, 2, 'SUPER-ADMIN', 'IT', NULL, 'itcode08@gmail.com', '79294607', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dAsu6fAI.TStEPJ5Kz2nXO5MyTl9OCgt0OzRTtaoi0VYOvO07wnEy', 'CkkdhClWXjObO3wzW7DqzkErxi6ofDzR1g8ltX4NcwmMJPB8X0', NULL, '2025-04-16 11:53:09', '20231028013754.jpg', '10', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'HR', 'Manager', NULL, 'hr.mtfombeniinv@swazi.net', '26823636066', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$SroZtne260nNMWfaWdl6.ugwZtfEkhLmfnio9Y.V/8x9Mqs/gXiua', 'WpPDX2GFNL6EFyulrY8O0JnxH0b6D4T1BeRqr8MCdm09JbEjHI', '2024-12-06 05:28:00', '2025-04-15 12:07:00', NULL, '0', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 'Sihlangu', 'Dlamini', '', NULL, '76657487', 'IGCSE Certificate', '3', '1052', '13.20', 5, 'Male', NULL, '1998-08-15', '9808156100783', '26', 'Bigbend, Lismore', '2024-07-09', '2024-10-09', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-18 11:58:27', '2025-03-21 10:25:53', NULL, '0', 0, '', NULL, 'Sister', 'Phindile Dlamini', '7670 7159', NULL),
(4, 0, 'Andile', 'Ndlovu', '', NULL, '78270049', 'O\'level Certificate', '3', '495', '14.52', 5, 'Female', NULL, '1992-10-05', '9210051100119', '32', 'Bigbend, kaGoboyane', '2023-08-08', '2023-11-08', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Zheng Houng', NULL, NULL, NULL, NULL, '2025-03-18 12:30:22', '2025-04-16 10:36:08', NULL, '0', 0, '', NULL, 'Sister', 'Ncobile Mkhonta', '76089332', '14.52'),
(5, 0, 'Ayanda', 'Ngwenya', '4301015442018', NULL, '78527864', 'Associate Degree in Business Information & Technology', '5', '1084I', '7000', NULL, 'Male', '21', '1990-12-11', '9012116100013', '34', 'Ka Goboyane', '2024-04-02', '2024-07-02', NULL, NULL, NULL, 'FNB', '62928130393', 0, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-19 07:26:57', '2025-03-21 10:50:29', '2025031909265748oa9xzhmjofyjlmsq35.png', '0', 0, NULL, NULL, 'Sister', 'Xolile Ngwenya', '78155966', NULL),
(6, 0, 'Gugu', 'Khumalo', '', NULL, '7648 5882', 'advance Diploma in accounting and finance', '5', 'MTF005', '4700', NULL, 'Female', '19', '1981-12-04', '8112041100244', '43', 'Mndobandoba ,Big Bend', '2023-05-12', '2023-08-12', NULL, NULL, NULL, '', '', 0, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-19 07:37:26', '2025-03-21 10:51:55', NULL, '0', 0, NULL, NULL, 'Mother', 'Costance', '7648 5882', NULL),
(7, 0, 'NONKULULEKO', 'MNGOMETULU', '', NULL, '76889151', 'FROM 3 CERTIFICATE', '3', '1155', '13.20', 7, 'Female', NULL, '1990-05-02', '9005021100656', '34', '', '2024-11-07', '2025-02-07', NULL, '19', NULL, 'NEDBANK', '12991878015', 0, 'Single', 'Davin scot clothing', NULL, NULL, NULL, NULL, '2025-03-19 08:51:15', '2025-03-21 07:12:53', NULL, '0', 0, '', NULL, 'MOTHER', 'NTOMBI NCUBE', '78445537', NULL),
(8, 0, 'Celiwe', 'Mkhaliphi', '', NULL, '76144616', 'Primary Certificate', '3', '22', '13.20', 1, 'Female', NULL, '1989-05-29', '8905291100149', '35', 'KaGoboyane', '2025-01-06', '2025-04-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 08:58:18', '2025-03-21 07:48:14', NULL, '0', 0, '', NULL, 'Husband', 'Mpendulo Maziya', '78275352', NULL),
(9, 0, 'Winile', 'Mdluli', '', NULL, '76937584', 'Primary Certificate', '3', '32', '14.52', 1, 'Female', NULL, '1988-02-22', '8802211100697', '37', '', '2000-02-01', '2000-05-01', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Nisela Farm', NULL, NULL, NULL, NULL, '2025-03-19 09:04:53', '2025-04-16 10:35:48', NULL, '0', 0, '', NULL, 'Child', 'Sitakele Matse', '78479130', '14.52'),
(10, 0, 'Gugu', 'Magagula', '', NULL, '76706255', 'Primary Certificate', '3', '799', '13.20', 1, 'Female', NULL, '1990-06-18', '9006181100304', '34', 'KaGoboyane', '2025-02-01', '2025-05-01', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 09:11:32', '2025-04-14 13:32:45', NULL, '0', 0, '', NULL, 'Aunt', 'Philisiwe Ntjangase', '76979696', NULL),
(11, 0, 'Hloniphile', 'Mavimbela', '', NULL, '76946984', 'Primary Certificate', '3', '771', '13.20', 6, 'Female', NULL, '1989-03-23', '8903231100196', '35', '', '2024-01-01', '2024-04-01', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Matsapha Union Textile Factory', NULL, NULL, NULL, NULL, '2025-03-19 09:18:08', '2025-03-21 07:24:07', NULL, '0', 0, '', NULL, 'Sister', 'Khanyisile Mavimbela', '76846257', NULL),
(12, 0, 'Mercy', 'Hillary Khoza', '', NULL, '76280598', 'Primary Certificate', '3', '845', '13.20', 1, 'Female', NULL, '1969-05-05', '6905051100460', '55', '', '2023-02-14', '2023-05-14', NULL, '19', NULL, 'Nedbank', '', 1, 'Married', 'Junit Textile KZN', NULL, NULL, NULL, NULL, '2025-03-19 09:25:34', '2025-03-21 07:25:11', NULL, '0', 0, '', NULL, 'Brother', 'Ernest Almedia', '76220885', NULL),
(13, 0, 'Nkosinathi', 'Sibandze', '', NULL, '76199107', 'IGCSE Certificate', '3', '1239', '13.20', 7, 'Male', NULL, '1999-04-06', '9904066100102', '25', 'Mafutseni,next Ngogola', '2025-02-11', '2025-05-11', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Newcastle', NULL, NULL, NULL, NULL, '2025-03-19 09:32:54', '2025-03-21 06:58:11', NULL, '0', 0, '', NULL, 'Mother', 'Rose Mamba', '76513146', NULL),
(14, 0, 'Nokuhle', 'Simelane', '', NULL, '78047844', 'Primaruy Certificate', '3', '1146', '13.20', 7, 'Female', NULL, '1982-05-07', '8207051100686', '42', 'Mahlabaneni next to Distillers', '2024-08-01', '2024-11-01', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-19 09:38:58', '2025-03-21 08:07:00', NULL, '0', 0, '', NULL, 'Mother', 'Sibongile Lukhele', '76920764', NULL),
(15, 0, 'Hlobisile', 'Dlamini', '', NULL, '78166510', 'Primary Certificate', '3', '1265', '13.20', 1, 'Female', NULL, '1977-06-06', '7706061101429', '47', '', '2025-02-12', '2025-05-12', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Master Garments Matsapha', NULL, NULL, NULL, NULL, '2025-03-19 09:44:16', '2025-03-21 10:09:03', NULL, '0', 0, '', NULL, 'Husband', 'Zakhele Dlamin', '76237819', NULL),
(16, 0, 'Nothando', 'Mthombo', '', NULL, '76735436', 'Primary Certificate', '3', '555', '13.20', 7, 'Female', NULL, '1992-11-05', '9205111100042', '32', '', '2024-08-01', '2024-11-01', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Distillers', NULL, NULL, NULL, NULL, '2025-03-19 09:49:57', '2025-03-21 07:23:08', NULL, '0', 0, '', NULL, 'Father', 'Widas Mthombo', '76072355', NULL),
(17, 0, 'Ngabisa', 'Dlamini', '', NULL, '76261042', 'Primary Certificate', '3', '1080', '13.20', 6, 'Female', NULL, '1998-08-20', '8704031100737', '26', 'Bigbend, Emabholoweni', '2024-02-06', '2024-05-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 09:55:31', '2025-03-21 08:14:42', NULL, '0', 0, '', NULL, 'Husband', 'Muzi Fakudze', '76262949', NULL),
(18, 0, 'Nomfundo', 'Chauke', '', NULL, '76501644', 'Matric Certificate', '3', '664', '13.20', 7, 'Female', NULL, '1999-01-02', '9901021100458', '26', 'Bigbend, Game 5', '2023-11-16', '2024-02-16', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 10:01:23', '2025-03-21 07:56:57', NULL, '0', 0, '', NULL, 'Mother', 'Nonhlanhla Mthembu', '76058317', NULL),
(19, 0, 'Angel', 'Sihlongonyane', '', NULL, '78318023', 'Primary Certificate', '3', '15', '14.52', 7, 'Female', NULL, '1994-01-21', '9401211100491', '31', 'Bigbend, kaGoboyane', '2022-04-10', '2022-07-10', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-19 10:06:57', '2025-04-16 10:35:31', NULL, '0', 0, '', NULL, 'Father', 'David Sihlongonyane', '78488692', '14.52'),
(20, 0, 'Nonduduzo', 'Masangu', '', NULL, '78241990', 'IGCSE Certificate', '3', '851', '13.20', 7, 'Female', NULL, '2003-01-13', '0301132100092', '22', 'Bigbend,Garage', '2025-02-10', '2025-05-10', NULL, '33', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 10:17:19', '2025-03-21 10:06:51', NULL, '0', 0, '', NULL, 'Mother', 'Nonhlanhla Dlamini', '76873191', NULL),
(21, 0, 'Nomphulelo', 'Shongwe', '', NULL, '76664284', '', '3', '1276', '9.85', 7, 'Female', NULL, '2005-03-04', '0504032100373', '20', '', '0025-04-01', '0025-07-01', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', '', NULL, NULL, NULL, NULL, '2025-03-19 10:26:01', '2025-03-21 10:04:47', NULL, '0', 0, '', NULL, 'Mother', 'Dorin Gumedze', '76452276', NULL),
(22, 0, 'Ncobile', 'Ntjangase', '', NULL, '76640464', '', '3', '1076', '13.20', 7, 'Female', NULL, '1989-01-31', '8901311100078', '36', '', '2024-08-10', '2024-11-10', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 10:30:30', '2025-03-21 07:24:32', NULL, '0', 0, '', NULL, 'Brother', 'Celumusa Ntjangase', '76335826', NULL),
(23, 0, 'Khetsiwe', 'Mhlanga', '', NULL, '76615042', 'OLEVEL', '3', '100', '14.52', 7, 'Female', NULL, '1989-03-13', '8404061100505', '36', 'Bigbend, Game 5', '2024-06-04', '2024-09-04', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'HOS Garment', NULL, NULL, NULL, NULL, '2025-03-19 10:36:30', '2025-04-16 10:35:09', NULL, '0', 0, '', NULL, 'Brother', 'Nduduzo Mhlanga', '76278140', '14.52'),
(24, 0, 'Vuyisile', 'Sikhondze', '', NULL, '76658627', '', '3', '1255', '13.20', 7, 'Female', NULL, '1987-02-14', '8702141100183', '38', 'Bigbend, Game 5', '2025-02-10', '2025-05-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'FTM Garments', NULL, NULL, NULL, NULL, '2025-03-19 10:40:50', '2025-03-21 10:03:58', NULL, '0', 0, '', NULL, 'Brother', 'Manqoba Sikhondze', '76733907', NULL),
(25, 0, 'Nompumelelo', 'Gamedze', '', NULL, '76265660', 'Primary Certificate', '3', '1248', '9.85', 7, 'Female', NULL, '1993-04-25', '9304251100753', '31', 'Bigbend,Game 5', '2025-02-11', '2025-05-11', NULL, '34', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 10:46:30', '2025-03-21 10:02:51', NULL, '0', 0, '', NULL, 'Mother', 'Nelisiwe Sithole', '76340575', NULL),
(26, 0, 'Thandekile', 'Hlatjwako', '', NULL, '76692773', 'JC Certificate', '3', '1160', '13.20', 7, 'Female', NULL, '1987-05-04', '8705041100625', '37', 'Bigbend, Lasmore', '2024-11-12', '2025-02-12', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-19 11:00:39', '2025-03-21 07:57:21', NULL, '0', 0, '', NULL, 'Mother', 'Jabulile Mdluli', '76328985', NULL),
(27, 0, 'Tebenguni', 'Simelane', '', NULL, '78773698', 'IGCSE', '3', '767', '13.20', 7, 'Female', NULL, '2003-05-28', '0305282100323', '21', 'Bigbend, Game 5', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'FNB', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 11:06:34', '2025-03-21 07:47:26', NULL, '0', 0, '', NULL, 'Mother', 'Khetsiwe Mngometulu', '76753705', NULL),
(29, 0, 'Maliba', 'Ziyane', '', NULL, '79289006', 'IGCSE Certifivate', '3', '1002', '11.98', 7, 'Female', NULL, '2002-12-26', '0212262100440', '22', 'Bigbend, Newvillage', '2024-06-21', '2024-09-21', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 11:13:42', '2025-03-21 08:19:20', NULL, '0', 0, '', NULL, 'Father', 'Anthon Malima', '76134875', NULL),
(30, 0, 'Nono', 'Gamedze', '', NULL, '76643631', 'Junior Primary Certifacate', '3', '175', '14.20', 2, 'Female', NULL, '1988-06-02', '8806241100082', '36', 'Kashoba,Mpholonjeni Siteki road', '2023-06-15', '2023-09-15', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'African Neatwear Matsapa', NULL, NULL, NULL, NULL, '2025-03-19 11:20:51', '2025-03-21 07:02:02', NULL, '0', 0, '', NULL, 'Mother', 'Gladis Gamedze', '76212936', NULL),
(31, 0, 'Nomvula', 'Gina', '', NULL, '78136060', 'JC Certificate', '3', '80', '14.52', 7, 'Female', NULL, '2001-09-12', '', '23', 'Bigbend,Kagoboyane', '2023-01-08', '2023-04-08', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Swads Textile Matsapha', NULL, NULL, NULL, NULL, '2025-03-19 11:26:24', '2025-04-16 10:34:45', NULL, '0', 0, '', NULL, 'Husband', 'Mpumelelo Mbamali', '78237814', '14.52'),
(32, 0, 'Lungile', 'Vilakati', '', NULL, '76530042', 'Junior Certificate', '3', '1249', '9.85', 7, 'Female', NULL, '1997-03-28', '9703281100263', '27', 'Bigbend,Kagoboyane', '2025-02-12', '2025-05-12', NULL, '34', NULL, 'Nedbank', '', 0, 'Single', 'Shop Assistant', NULL, NULL, NULL, NULL, '2025-03-19 11:33:07', '2025-03-21 09:36:05', NULL, '0', 0, '', NULL, 'Mother', 'Winile Simelane', '76961258', NULL),
(33, 0, 'Namile', 'Matsentjwa', '', NULL, '76614865', 'IGCSE', '3', '33', '14.52', 7, 'Female', NULL, '1995-05-20', '', '29', 'Bigbend, kaGoboyane', '2021-06-15', '2021-09-15', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 11:39:48', '2025-04-16 10:34:12', NULL, '0', 0, '', NULL, 'Sister', 'Ngcinile Matsentjwa', '78405998', '14.52'),
(35, 0, 'Sisana', 'Nyaweni', '', NULL, '766453105', 'Tertiary', '3', '1134', '13.20', 7, 'Female', NULL, '1985-06-14', '8506141100279', '39', 'Bigbend, Game 5', '2024-09-24', '2024-12-24', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Pasture Valley', NULL, NULL, NULL, NULL, '2025-03-19 11:49:46', '2025-03-21 09:35:15', NULL, '0', 0, '', NULL, 'Niece', 'Manqoba Nyaweni', '76428756', NULL),
(36, 0, 'Nokuphila', 'Lukhele', '', NULL, '76785911', 'IGCSE Certificate', '3', '886', '13.20', 7, 'Female', NULL, '1996-04-15', '9604151100848', '28', 'Bigbend, kaGoboyane', '2024-03-12', '2024-06-12', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 11:57:28', '2025-03-21 09:24:12', NULL, '0', 0, '', NULL, 'Sister', 'Nqobile Lukhele', '78057384', NULL),
(37, 0, 'HLOBSILE', 'MMANGO', '', NULL, '78051297', 'NONE', '3', '1132', '9.85', 7, 'Female', NULL, '1983-06-05', '8306051100413', '41', 'Goboyane', '2024-09-26', '2024-12-26', NULL, '12', NULL, 'NEDBANK', '12991833879', 0, 'Single', 'ZWANE FAMILY (DOMESTIC WORKER)', NULL, NULL, NULL, NULL, '2025-03-19 11:59:01', '2025-03-21 07:27:35', NULL, '0', 0, '', NULL, 'SISTER', 'PHETSENI MMNGO', '78350138', NULL),
(38, 0, 'Phetsile Hlobsile', 'Mthembu', '', NULL, '78518433', 'IGCSE Certificate', '3', '1186', '13.20', 7, 'Female', NULL, '1998-10-01', '9810011100529', '26', 'Bigbend, Game 5', '2024-12-06', '2025-03-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-19 12:03:03', '2025-03-21 07:37:48', NULL, '0', 0, '', NULL, 'Mother', 'Busisiwe Ndzimandze', '78625029', NULL),
(39, 0, 'Cebile', 'Maseko', '', NULL, '76278996', 'Junior Primary Certificate', '3', '906', '13.20', 7, 'Female', NULL, '2000-04-29', '0004292100767', '24', 'Bigbend, eNkilongo', '2024-03-06', '2024-06-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-19 12:14:40', '2025-03-21 09:23:25', NULL, '0', 0, '', NULL, 'Brother', 'Gift Tsabedze', '78216973', NULL),
(40, 0, 'NCAMSILE', 'HLATSHWAKO', '', NULL, '78687809', 'NONE', '3', '1020', '9.85', 5, 'Female', NULL, '1987-07-22', '8707221100946', '37', 'GOBOYANE', '0000-00-00', '2025-06-21', NULL, '12', NULL, 'NEDBANK', '12991683206', 0, 'Single', 'MAKE GWEBU\'S SALON', NULL, NULL, NULL, NULL, '2025-03-19 12:16:41', '2025-03-21 07:55:20', NULL, '0', 0, '', NULL, 'MOTHER', 'THOBHI NXUMALO', '78415959', NULL),
(41, 0, 'Thembi', 'Mathunywa', '', NULL, '76153544', 'Junior Primary Certifacate', '3', '1161', '9.85', 7, 'Female', NULL, '1984-01-24', '8401241100934', '41', 'Bigbend,Lismore', '2024-11-08', '2025-02-08', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-19 12:19:56', '2025-03-21 07:17:23', NULL, '0', 0, '', NULL, 'Mother', 'Makhalatsi Sihlongonyane', '76116835', NULL),
(42, 0, 'Nelisiwe', 'Myeni', '', NULL, '78192823', 'Junior Primary Certificate', '3', '1201', '13.20', 7, 'Female', NULL, '1983-10-18', '8310181100590', '41', 'Bigbend,Lismore', '2025-01-10', '2025-04-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-19 12:24:55', '2025-03-21 07:53:17', NULL, '0', 0, '', NULL, 'Mother', 'Gizili Dlamini', '76310281', NULL),
(43, 0, 'Nontobeko Gezephi', 'Myeni', '', NULL, '78502364', 'JC CERTIFICATE', '3', '1184', '9.85', 6, 'Female', NULL, '2002-06-12', '0206122100541', '22', 'MAYALUKA', '2024-11-25', '2025-02-25', NULL, '12', NULL, 'NEDBANK', '', 0, 'Single', 'NONE', NULL, NULL, NULL, NULL, '2025-03-19 12:28:00', '2025-03-21 09:22:03', NULL, '0', 0, '', NULL, 'MOTHER', 'MERRY MAMBA', '76186454', NULL),
(44, 0, 'Philile', 'Mavimbela', '', NULL, '76179939', 'Junior Primary Certifacate', '3', '51', '13.20', 7, 'Female', NULL, '1981-12-04', '8112041100517', '43', 'Bigbend, kaGoboyane', '2022-02-22', '2022-05-22', NULL, '8', NULL, 'Nedbank', '', 0, 'Single', 'FTM Garments', NULL, NULL, NULL, NULL, '2025-03-19 12:34:19', '2025-03-21 07:32:24', NULL, '0', 0, '', NULL, 'Mother', 'Flora Mavimbela', '78516807', NULL),
(45, 0, 'TEMALANGENI', 'DLAMINI', '', NULL, '76481576', 'IGCSE', '3', '1176', '9.85', 6, 'Female', NULL, '2004-02-19', '', '21', 'MAHLABANENI', '2024-11-18', '2025-02-18', NULL, '26', NULL, 'NEDBANK', '', 0, 'Single', 'NONE', NULL, NULL, NULL, NULL, '2025-03-19 12:35:43', '2025-03-21 04:16:43', NULL, '0', 0, '', NULL, 'MOTHER', 'THULI MASUKU', '76764914', NULL),
(46, 0, 'Sibonelo', 'Mngometulu', '', NULL, '78132006', 'Junior Primary Certificate', '3', '1195', '13.20', 7, 'Female', NULL, '1989-01-08', '8901081100118', '36', 'Ncandweni', '2025-01-06', '2025-04-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Ingweni Security', NULL, NULL, NULL, NULL, '2025-03-20 05:05:48', '2025-03-21 07:36:54', NULL, '0', 0, '', NULL, 'Sister', 'Cebile Mngometulu', '78328090', NULL),
(47, 0, 'Nokuthuka', 'Ginidza', '', NULL, '76472145', 'Tertiary', '3', '60', '14.52', 7, 'Female', NULL, '1987-07-07', '', '37', 'Bigbend, Game 5', '2022-10-10', '2023-01-10', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 05:09:34', '2025-04-16 10:33:36', NULL, '0', 0, '', NULL, 'Sister', 'Thandeka Ginindza', '76410012', '14.52'),
(48, 0, 'Velile', 'Mamba', '', NULL, '76647699', 'IGCSE Certificate', '3', '609', '13.20', 7, 'Female', NULL, '2000-11-24', '0011242100565', '24', 'Bigbend, kaGoboyane', '2023-09-22', '2023-12-22', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 05:15:13', '2025-03-21 06:56:28', NULL, '0', 0, '', NULL, 'Sister', 'Tanele Mamba', '783130876', NULL),
(49, 0, 'Thandi', 'Mdluli', '', NULL, '79803525', 'JC Certificate', '3', '703', '13.20', 7, 'Female', NULL, '1978-08-18', '7808181100164', '46', 'Bigbend, kaGoboyane', '2024-01-08', '2024-04-08', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Newcastle Textile', NULL, NULL, NULL, NULL, '2025-03-20 05:21:31', '2025-03-21 07:39:08', NULL, '0', 0, '', NULL, 'Brother', 'Mduduzi Ngwenya', '76346275', NULL),
(50, 0, 'Nombuso', 'Mbingo', '', NULL, '76739960', 'IGCSE Certificate', '3', '1275', '9.85', 7, 'Female', NULL, '2002-05-28', '0205282100788', '22', 'Bigbend, kaGoboyane', '2025-02-15', '2025-05-15', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 05:27:17', '2025-03-21 09:06:22', NULL, '0', 0, '', NULL, 'Brother', 'Mlungisi Zondo', '78345171', NULL),
(51, 0, 'Ngabisa', 'Dlamini', '', NULL, '78661905', 'Primary Certificate', '3', '1173', '9.85', 7, 'Female', NULL, '1987-04-02', '8704031100737', '37', 'Bigbend,Lismore', '2024-11-10', '2025-02-10', NULL, '8', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-20 05:38:24', '2025-03-21 07:31:04', NULL, '0', 0, '', NULL, 'Sister', 'Thabisile Gumbi', '7842186', NULL),
(52, 0, 'Temaswati', 'Msibi', '', NULL, '78041765', 'IGCSE Certificate', '3', '107', '13.20', 7, 'Female', NULL, '1980-01-02', '8001021100433', '45', 'Bigbend, kaGoboyane', '2024-03-06', '2024-06-06', NULL, '8', NULL, 'Nedbank', '', 0, 'Single', 'Sikhulele Guest House,Matata', NULL, NULL, NULL, NULL, '2025-03-20 05:44:36', '2025-03-21 07:33:06', NULL, '0', 0, '', NULL, 'Mother', 'Nikiwe Tsabedze', '76371580', NULL),
(53, 0, 'Thobile', 'Lulane', '', NULL, '76199880', 'JC Certificate', '3', '57', '13.20', 7, 'Female', NULL, '1997-01-15', '9701151100215', '28', 'Bigbend, Garage', '2022-09-17', '2022-12-17', NULL, '26', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 05:50:28', '2025-03-21 07:46:23', NULL, '0', 0, '', NULL, 'Mother', 'Khanyisile Lulane', '76361030', NULL),
(54, 0, 'Jabulile', 'Nhlandze', '', NULL, '78481327', 'Primary Certificate', '3', '619', '13.20', 7, 'Female', NULL, '1993-08-07', '9308071100521', '31', 'Bigbend, Mahlabaneni', '2023-09-20', '2023-12-20', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 05:56:29', '2025-03-21 09:01:03', NULL, '0', 0, '', NULL, 'Sister', 'Siphiwe Magagula', '76531239', NULL),
(55, 0, 'Phicile', 'Mtsetfwa', '', NULL, '76584118', 'O\"level Cetificate', '3', '1004', '13.20', 7, 'Female', NULL, '1986-03-25', '8603251100247', '38', 'Bigbend, Mahlabaneni', '2024-06-12', '2024-09-12', NULL, '27', NULL, 'Nedbank', '', 0, 'Married', 'KASSUM Textile', NULL, NULL, NULL, NULL, '2025-03-20 06:04:06', '2025-03-21 07:44:21', NULL, '0', 0, '', NULL, 'Husband', 'Celumusa Matfuntjwa', '76269550', NULL),
(56, 0, 'NOMZAMO', 'DLAMINI', '', NULL, '78688325', 'NONE', '3', '791', '13.20', 7, 'Female', NULL, '1988-12-27', '8812271100372', '36', 'MAYALUKA', '0000-00-00', '2025-06-21', NULL, '11', NULL, 'NEDBANK', '', 0, 'Single', 'NONE', NULL, NULL, NULL, NULL, '2025-03-20 06:13:56', '2025-03-21 07:11:01', NULL, '0', 0, '', NULL, 'HUSBAND', 'NKOSINPHILE MASUKU', '76241629', NULL),
(57, 0, 'Nokwanda', 'Dlamini', '', NULL, '78139398', 'IGCSE Certificate', '3', '1122', '13.20', 7, 'Female', NULL, '2003-12-29', '0312292100111', '21', 'Bigbend, Mahlabaneni', '2024-09-26', '2024-12-26', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'Lismore Lodge', NULL, NULL, NULL, NULL, '2025-03-20 06:34:04', '2025-03-21 07:45:55', NULL, '0', 0, '', NULL, 'Sister', 'Nonsikelelo Dlamini', '76675204', NULL),
(58, 0, 'Nonduduzo', 'Matsentjwa', '', NULL, '78438072', 'IGCSE Certificate', '3', '5', '9.89', 7, 'Female', NULL, '2000-02-14', '0002142100797', '25', 'Bigbend, kaGoboyane', '2025-03-13', '2025-06-13', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 06:40:35', '2025-03-21 08:59:33', NULL, '0', 0, '', NULL, 'Mother', 'Hlobisile Shongwe', '76430903', NULL),
(59, 0, 'Sithembile', 'Mamba', '', NULL, '76725912', 'JC Certificate', '3', '1041', '13.20', 7, 'Female', NULL, '1984-05-11', '8405111100346', '40', 'Bigbend,Mahlabaneni', '2024-07-01', '2024-10-01', NULL, '11', NULL, 'Nedbank', '', 0, 'Single', 'Riverside Butchery', NULL, NULL, NULL, NULL, '2025-03-20 06:46:20', '2025-03-21 07:36:21', NULL, '0', 0, '', NULL, 'Mother', 'Busisiwe Mamba', '76527190', NULL),
(60, 0, 'Thuli', 'Ngcamphalala', '', NULL, '76345125', 'Primary Certificate', '3', '140', '13.20', 7, 'Female', NULL, '1979-12-24', '7912211100691', '45', 'Bigbend,Ngogo', '2023-07-10', '2023-10-10', NULL, '11', NULL, 'SwaziBank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 06:55:38', '2025-03-21 07:35:20', NULL, '0', 0, '', NULL, 'Uncle', 'Shedrack Lukhele', '78164532', NULL),
(61, 0, 'Wendy', 'Msibi', '', NULL, '76702975', 'IGCSE Certificate', '3', '673', '9.85', 5, 'Female', NULL, '2002-09-17', '0209172100932', '22', 'Bigbend, kaGoboyane', '2025-02-10', '2025-05-10', NULL, '11', NULL, 'Nedbank', '', 0, 'Single', 'Malindza Cuban', NULL, NULL, NULL, NULL, '2025-03-20 07:04:43', '2025-03-21 08:55:50', NULL, '0', 0, '', NULL, 'Mother', 'Jabulile Mazibuko', '76878506', NULL),
(62, 0, 'Happiness', 'Dlamini', '', NULL, '796321220', 'IGCSE Certificate', '3', '822', '9.85', 5, 'Female', NULL, '2000-10-26', '0010262100430', '24', 'Bigbend, kaGoboyane', '2024-02-07', '2024-05-07', NULL, '30', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 07:10:38', '2025-03-21 07:44:55', NULL, '0', 0, '', NULL, 'Uncle', 'Assan Twaybo', '76278500', NULL),
(63, 0, 'Sebenele', 'Makhanya', '', NULL, '76270879', 'Primary Certificate', '3', '1177', '9.85', 5, 'Female', NULL, '2001-04-11', '0104112100623', '23', 'Bigbend, kaGoboyane', '2024-11-25', '2025-02-25', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 07:16:13', '2025-03-21 06:51:17', NULL, '0', 0, '', NULL, 'Sister', 'Philile Dlamini', '78332794', NULL),
(64, 0, 'Temalangeni', 'Dlamini', '', NULL, '78557722', 'IGCSE', '3', '924', '13.20', 6, 'Female', NULL, '2004-07-03', '0402192100814', '20', 'Bigbend, Mdobandoba', '2024-10-15', '2025-01-15', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 07:21:33', '2025-03-21 07:34:50', NULL, '0', 0, '', NULL, 'Grany', 'Dudu Dlamini', '76236053', NULL),
(65, 0, 'Noncedo', 'Gamedze', '', NULL, '76260679', 'JC Certificate', '3', '1127', '9.85', 7, 'Female', NULL, '2005-10-03', '0510032100040', '19', 'Kashoba,Mpholonjeni Siteki road', '2024-09-25', '2024-12-25', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 07:29:27', '2025-03-21 07:54:44', NULL, '0', 0, '', NULL, 'Sister', 'Thandekile Mabundza', '76534763', NULL),
(66, 0, 'Sindi', 'Dlamini', '', NULL, '78546569', 'Jc Certificate', '3', '1198', '13.20', 1, 'Female', NULL, '1993-05-22', '9305221100090', '31', 'Bigbend, Emabholoweni', '2025-01-13', '2025-04-13', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Matsapha Fashion Textile', NULL, NULL, NULL, NULL, '2025-03-20 07:35:32', '2025-03-21 08:55:06', NULL, '0', 0, '', NULL, 'Sister', 'Beaty Dlamini', '76369831', NULL),
(67, 0, 'Ayanda', 'Mthembu', '', NULL, '76226028', 'Jc Certificate', '3', '830', '9.85', 5, 'Female', NULL, '1996-02-23', '9602231100664', '29', 'Bigbend, kaGoboyane', '2024-02-07', '2024-05-07', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 07:45:27', '2025-03-21 08:53:44', NULL, '0', 0, '', NULL, 'Father', 'Eric Mthembu', '76269142', NULL),
(68, 0, 'Nomthantazo', 'Sithole', '', NULL, '78317763', 'IGCSE Certificate', '3', '1199', '13.20', 5, 'Female', NULL, '2000-02-16', '', '25', 'Bigbend, kaGoboyane', '2025-01-11', '2025-04-11', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 07:51:02', '2025-03-21 04:31:32', NULL, '0', 0, '', NULL, 'Sister', 'Nontobeko Simelane', '78243605', NULL),
(69, 0, 'Nokuphiwa', 'Mngometulu', '', NULL, '76220248', '', '3', '1165', '13.20', 7, 'Female', NULL, '1992-07-22', '9207221100151', '32', 'Bigbend, Lismore', '2024-11-11', '2025-02-11', NULL, '26', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 08:00:42', '2025-03-21 07:14:02', NULL, '0', 0, '', NULL, 'Mother', 'Catrine Mngomezulu', '76125268', NULL),
(70, 0, 'Nelisiwe', 'Vikakati', '', NULL, '76353462', 'Primary Certificate', '3', '43', '14.52', 6, 'Female', NULL, '1978-09-20', '7809201100291', '46', '', '2022-05-11', '2022-08-11', NULL, '27', NULL, 'Nedbank', '', 1, 'Single', 'Simunye Sugar', NULL, NULL, NULL, NULL, '2025-03-20 08:58:19', '2025-04-16 10:33:12', NULL, '0', 0, '', NULL, 'Father', 'Amos Vilakati', '76614700', '14.52'),
(71, 0, 'Jabulile', 'Shabangu', '', NULL, '76271684', 'Jc Certificate', '3', '1071', '13.20', 6, 'Female', NULL, '1983-04-15', '8304151100599', '41', 'Bigbend, Mayaluka', '2024-08-13', '2024-11-13', NULL, '12', NULL, 'Nedbank', '', 0, 'Single', 'Fareast Matsapha', NULL, NULL, NULL, NULL, '2025-03-20 09:05:55', '2025-03-21 07:35:52', NULL, '0', 0, '', NULL, 'Brother', 'Clement Magagula', '76222394', NULL),
(72, 0, 'Zethu', 'Motsa', '', NULL, '76324705', 'IGCSE Certificate', '3', '1007', '13.20', 6, 'Female', NULL, '2003-03-25', '0303252100423', '21', 'Bigbend, Mayaluka', '2025-06-12', '2025-09-12', NULL, '28', NULL, 'Nedbank', '', 0, 'Single', 'Fareast Matsapha', NULL, NULL, NULL, NULL, '2025-03-20 09:11:41', '2025-03-21 07:03:00', NULL, '0', 0, '', NULL, 'Sister', 'Lindelwa Motsa', '76196877', NULL),
(73, 0, 'Khabonina', 'Motsa', '', NULL, '76374323', 'JC Certificate', '3', '1065', '13.20', 7, 'Female', NULL, '1996-04-02', '9604021100714', '28', 'Siphofaneni', '2024-08-13', '2024-11-13', NULL, '11', NULL, 'Nedbank', '', 0, 'Single', 'World Vision', NULL, NULL, NULL, NULL, '2025-03-20 09:19:13', '2025-03-21 07:29:06', NULL, '0', 0, '', NULL, 'Aunt', 'Muntuza Motsa', '76186867', NULL),
(74, 0, 'Thembelihle', 'Ndwandwe', '', NULL, '76548798', 'Primary Certificate', '3', '1006', '13.20', 6, 'Female', NULL, '2001-08-02', '0108042100215', '23', 'Bigbend, Lismore', '2024-06-10', '2024-09-10', NULL, '8', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 09:30:41', '2025-03-21 06:57:25', NULL, '0', 0, '', NULL, 'Mother', 'Phindile Mbatha', '78353868', NULL),
(75, 0, 'Thembi', 'Mahlangu', '', NULL, '78183146', 'Jc Certificate', '3', '66', '13.20', 5, 'Female', NULL, '1992-11-19', '9211191100076', '32', 'Bigbend, kaGoboyane', '2022-10-10', '2023-01-10', NULL, '28', NULL, 'Nedbank', '', 0, 'Single', 'Bigbend Factory Illovo', NULL, NULL, NULL, NULL, '2025-03-20 09:35:55', '2025-03-21 07:01:05', NULL, '0', 0, '', NULL, 'Mother', 'Thuli Mahlangu', '76389379', NULL),
(76, 0, 'Ntombi', 'Ngcamphalala', '', NULL, '78550340', 'Primary Certificate', '3', '1231', '9.85', 6, 'Female', NULL, '1981-03-28', '8103281100259', '43', 'Bigbend, kaGoboyane', '2025-02-11', '2025-05-11', NULL, '11', NULL, 'Nedbank', '', 0, 'Single', 'Crooks Plantation', NULL, NULL, NULL, NULL, '2025-03-20 09:40:48', '2025-03-21 08:47:29', NULL, '0', 0, '', NULL, 'Son', 'Tomlin Gamedze', '76275293', NULL),
(77, 0, 'Thembi', 'Sibandze', '', NULL, '76848431', 'Primary Certificate', '3', '736', '14.20', 7, 'Female', NULL, '1990-01-25', '9001251100201', '35', 'Bigbend, kaGoboyane', '2024-01-08', '2024-04-08', NULL, '28', NULL, 'Nedbank', '', 0, 'Single', 'Duris', NULL, NULL, NULL, NULL, '2025-03-20 09:47:14', '2025-03-21 07:45:28', NULL, '0', 0, '', NULL, 'Sister', 'Samu Sibandze', '78051438', NULL),
(78, 0, 'Nontsikelelo', 'Nhlabatsi', '', NULL, '76609236', 'IGCSE Certificate', '3', '1059', '13.20', 6, 'Female', NULL, '2002-10-09', '0010092100311', '22', 'Bigbend, Mayaluka', '2024-08-12', '2024-11-12', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 09:57:16', '2025-03-21 08:46:34', NULL, '0', 0, '', NULL, 'Sister', 'Nokulunga Nhlabatsi', '78244767', NULL),
(79, 0, 'Ncobile', 'Mamba', '', NULL, '76555265', 'Primary Certificate', '3', '1214', '9.85', 6, 'Female', NULL, '1999-04-15', '9904151100769', '25', '', '2025-02-05', '2025-05-05', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'ZingHoung Factory', NULL, NULL, NULL, NULL, '2025-03-20 10:07:52', '2025-03-21 08:44:48', NULL, '0', 0, '', NULL, 'Sister', 'Nora Mamba', '76182944', NULL),
(80, 0, 'Tholakele', 'Ndwandwe', '', NULL, '78363383', 'Primary Certificate', '3', '1113', '13.20', 6, 'Female', NULL, '1996-06-20', '9606201100513', '28', 'Bigbend, Mayaluka', '2024-08-10', '2024-11-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 10:13:04', '2025-03-21 07:43:34', NULL, '0', 0, '', NULL, 'Mother', 'Alitha Shongwe', '76480546', NULL),
(81, 0, 'Nontobeko', 'Nxumalo', '', NULL, '76296337', 'Primary Certificate', '3', '659', '13.20', 6, 'Female', NULL, '1999-04-17', '9904171100294', '25', '', '2024-06-09', '2024-09-09', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Bigbend Agriculture', NULL, NULL, NULL, NULL, '2025-03-20 10:18:33', '2025-03-21 07:21:38', NULL, '0', 0, '', NULL, 'Father', 'Robert Nxumalo', '76660979', NULL),
(82, 0, 'Mphikeleli', 'Vilakati', '', NULL, '768459619', 'IGCSE Certificate', '3', '785', '13.20', 6, 'Male', NULL, '2005-01-01', '0501017100907', '20', 'Bigbend, Game 5', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Giant Textile Factory', NULL, NULL, NULL, NULL, '2025-03-20 10:24:04', '2025-03-21 07:41:28', NULL, '0', 0, '', NULL, 'Mother', 'Lomkhosi Mndlovu', '76406931', NULL),
(83, 0, 'Thantazile', 'Tsela', '', NULL, '79353089', 'IGCSE Certificate', '3', '912', '13.20', 6, 'Female', NULL, '2005-05-31', '0505312100686', '19', 'Bigbend, Game 5', '2024-03-21', '2024-06-21', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 10:30:45', '2025-03-31 05:44:13', NULL, '0', 0, '', NULL, 'Mother', 'Hlengiwe Tsela', '76504341', NULL),
(84, 0, 'Phindile G.', 'Gamedze', '', NULL, '76834812', 'Jc Certificate', '3', '1267', '13.20', 6, 'Female', NULL, '1985-10-16', '8510161100375', '39', 'Bigbend,CT', '2025-02-10', '2025-05-10', NULL, '26', NULL, 'Nedbank', '', 0, 'Single', 'Fashion International Factory', NULL, NULL, NULL, NULL, '2025-03-20 10:38:50', '2025-03-21 08:38:27', NULL, '0', 0, '', NULL, 'Sister', 'Nomsa Gamedze', '76767581', NULL),
(85, 0, 'Tengetile', 'Mthembu', '', NULL, '78311065', 'IGCSE Certificate', '3', '637', '13.20', 6, 'Female', NULL, '1996-07-22', '', '28', 'Bigbend, Game 5', '2025-02-12', '2025-05-12', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Panda Fashion shop', NULL, NULL, NULL, NULL, '2025-03-20 10:52:10', '2025-03-21 03:50:40', NULL, '0', 0, '', NULL, 'Mother', 'Busisiwe Ndzimandze', '78625029', NULL),
(86, 0, 'Siphelele', 'Dlamini', '', NULL, '78532113', 'Primary Certificate', '3', '724', '13.20', 6, 'Female', NULL, '1995-03-03', '9503031101144', '30', '', '2024-01-10', '2024-04-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Buhle Textile Factory', NULL, NULL, NULL, NULL, '2025-03-20 11:01:14', '2025-03-21 07:10:38', NULL, '0', 0, '', NULL, 'Sister', 'Nosimilo Gwebu', '78550858', NULL),
(87, 0, 'Fikile', 'Mngometulu', '', NULL, '78155353', 'Primary Certificate', '3', '1203', '13.20', 6, 'Female', NULL, '1992-02-15', '9202111100222', '', 'Bigbend, Lismore', '2025-01-20', '2025-04-20', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-20 11:08:25', '2025-03-21 07:58:11', NULL, '0', 0, '', NULL, 'Niece', 'Busisiwe Khumalo', '76861540', NULL),
(88, 0, 'Nokuthula', 'Masuku', '', NULL, '76319356', 'Primary Certificate', '3', '1288', '13.20', 6, 'Female', NULL, '1978-04-16', '7804161100571', '46', '', '2025-02-18', '2025-05-18', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-20 11:12:44', '2025-03-21 08:32:21', NULL, '0', 0, '', NULL, 'Brother', 'Jerome Masuku', '76114523', NULL),
(89, 0, 'Bongekile', 'Zwane', '', NULL, '76984887', 'IGCSE Certificate', '3', '158', '14.52', 6, 'Female', NULL, '1994-07-21', '9407211100092', '30', 'Bigbend, Mayaluka', '2023-06-09', '2023-09-09', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 11:18:15', '2025-04-16 10:32:47', NULL, '0', 0, '', NULL, 'Mother', 'Sonto Zwane', '78501094', '14.52'),
(90, 0, 'Dumsile H.', 'Dlamini', '', NULL, '76285995', 'O\'level', '3', '76', '14.52', 6, 'Female', NULL, '1975-11-02', '7511021100309', '49', '', '2024-08-10', '2024-11-10', NULL, '19', NULL, 'Nedbank', '', 1, 'Married', 'Newlife Garments Matsapha', NULL, NULL, NULL, NULL, '2025-03-20 11:23:37', '2025-04-16 10:32:24', NULL, '0', 0, '', NULL, 'Husband', 'Abraham Nndzinisa', '76159811', '14.52'),
(91, 0, 'Andiswa', 'Shongwe', '', NULL, '76292670', 'Jc Certificate', '3', '891', '13.20', 6, 'Female', NULL, '1998-01-23', '9801231100290', '27', '', '2024-03-06', '2024-06-06', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 11:30:46', '2025-03-21 07:09:33', NULL, '0', 0, '', NULL, 'Sister', 'Temanene Shongwe', '76451737', NULL),
(92, 0, 'Siphiwe C.', 'Magagula', '', NULL, '76778507', 'Primary Certificate', '3', '1207', '13.20', 6, 'Female', NULL, '1987-11-04', '8711041100201', '37', 'Bigbend, kaGoboyane', '2025-02-10', '2025-05-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Thedrake Clothing,Matsapha', NULL, NULL, NULL, NULL, '2025-03-20 11:36:59', '2025-03-21 08:30:59', NULL, '0', 0, '', NULL, 'Aunt', 'Dudu Mamba', '76786398', NULL),
(93, 0, 'Prudence', 'Dlamini', '', NULL, '78603871', 'O\'level Certificate', '3', '159', '14.52', 6, 'Female', NULL, '1974-10-10', '7410041100516', '50', 'Bigbend, Game 5', '2023-05-10', '2023-08-10', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'Texray, Matsapha', NULL, NULL, NULL, NULL, '2025-03-20 11:42:37', '2025-04-16 10:31:45', NULL, '0', 0, '', NULL, 'Mother', 'Elizabeth Dlamini', '76641125', '14.52'),
(94, 0, 'Siphiwe', 'Magagula', '', NULL, '76531239', 'Primary Certificate', '3', '82', '14.52', 6, 'Female', NULL, '1975-09-23', '8711041100201', '49', '', '2023-01-08', '2023-04-08', NULL, '19', NULL, 'FNB', '', 1, 'Married', 'Cottona Factory, Matata', NULL, NULL, NULL, NULL, '2025-03-20 11:49:46', '2025-04-16 10:31:19', NULL, '0', 0, '', NULL, 'Husband', 'Welcome Mamba', '76626161', '14.52'),
(95, 0, 'Phindile M.', 'Gamedze', '', NULL, '76492634', 'Primary Certificate', '3', '12', '14.52', 6, 'Female', NULL, '1979-11-21', '8406041100257', '45', '', '2021-03-03', '2021-06-03', NULL, '19', NULL, 'Nedbank', '', 1, 'Single', 'HR Textile,Siphofaneni', NULL, NULL, NULL, NULL, '2025-03-20 11:54:51', '2025-04-16 10:30:46', NULL, '0', 0, '', NULL, 'Brother', 'Wayaba Gamedze', '76110756', '14.52'),
(96, 0, 'Nonsikelelo', 'Simelane', '', NULL, '76716926', 'JC Certifcate', '3', '167', '13.20', 6, 'Female', NULL, '1994-11-24', '9411241100924', '30', 'Bigbend, Game 5', '2023-03-23', '2023-06-23', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-20 12:05:15', '2025-03-21 07:40:37', NULL, '0', 0, '', NULL, 'Mother', 'Ntombikayise Mamba', '76582033', NULL),
(97, 0, 'Nokuphiwa', 'Zwane', '', NULL, '78500774', 'Primary Certificate', '3', '1148', '13.20', 6, 'Female', NULL, '1983-01-23', '8301231100300', '42', 'Bigbend, kaGoboyane', '2024-11-09', '2025-02-09', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-20 12:11:16', '2025-03-21 07:11:41', NULL, '0', 0, '', NULL, 'Mother', 'Albethina Zwane', '76513374', NULL),
(98, 0, 'Siphiwe', 'Sithole', '', NULL, '76919371', 'IGCSE Certificate', '3', '995', '9.85', 6, 'Female', NULL, '1989-05-20', '8905201100635', '35', 'Bigbend, Game 5', '2025-02-02', '2025-05-02', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'ZingHoung Factory', NULL, NULL, NULL, NULL, '2025-03-20 12:16:08', '2025-03-21 08:30:12', NULL, '0', 0, '', NULL, 'Sister', 'Winile Sithole', '76460830', NULL),
(99, 0, 'Gcinile', 'Dlamini', '', NULL, '76795210', 'JC Certifcate', '3', '848', '13.20', 6, 'Female', NULL, '1997-12-10', '9712101100460', '27', 'Bigbend, kaGoboyane', '2024-02-14', '2024-05-14', NULL, '8', NULL, 'Nedbank', '', 0, 'Single', 'HR Textile,Siphofaneni', NULL, NULL, NULL, NULL, '2025-03-20 12:20:54', '2025-03-21 06:55:37', NULL, '0', 0, '', NULL, 'Mother', 'Gladice Dlamini', '76773131', NULL),
(100, 0, 'Sebentile', 'Mbuli', '', NULL, '78300501', 'Matric Certificate', '3', '1159', '13.20', 6, 'Female', NULL, '1976-08-08', '7608261100377', '48', 'Bigbend,Lismore', '2024-11-13', '2025-02-13', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-20 12:26:23', '2025-03-21 07:26:42', NULL, '0', 0, '', NULL, 'Mother', 'Jelina Mngometulu', '76826647', NULL),
(101, 0, 'Zodwa', 'Sikhondze', '', NULL, '78654970', 'JC Certificate', '3', '696', '13.20', 6, 'Female', NULL, '1991-10-25', '9110251100515', '33', 'Bigbend, Game 5', '2025-02-05', '2025-05-05', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-20 12:31:45', '2025-03-21 07:57:48', NULL, '0', 0, '', NULL, 'Mother', 'Tfobhi Makhanya', '76858637', NULL),
(102, 0, 'Hlobisile', 'Matsebula', '', NULL, '76591041', 'Primary Certificate', '3', '953', '13.20', 6, 'Female', NULL, '1988-06-06', '8806061100451', '36', 'Bigbend,Mndobandoba', '2024-05-06', '2024-08-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'New Life', NULL, NULL, NULL, NULL, '2025-03-21 04:58:06', '2025-03-21 08:03:24', NULL, '0', 0, '', NULL, 'Mother', 'Lungile Mamba', '766767454', NULL),
(103, 0, 'Khulile', 'Dlamini', '', NULL, '78311638', 'JC Certifcate', '3', '1223', '9.85', 6, 'Female', NULL, '2003-02-25', '0302252100433', '22', 'Bigbend, kaGoboyane', '2025-02-12', '2025-05-12', NULL, '36', NULL, 'Nedbank', '', 0, 'Single', 'Shop Assistant', NULL, NULL, NULL, NULL, '2025-03-21 05:03:10', '2025-03-21 08:29:21', NULL, '0', 0, '', NULL, 'Aunt', 'Ncamisile Dlamini', '76325215', NULL),
(104, 0, 'Promise', 'Lukhele', '', NULL, '78406827', 'Primary Certificate', '3', '976', '13.20', 6, 'Female', NULL, '2002-09-20', '9203161100608', '22', 'Bigbend,Riverside', '2024-03-06', '2024-06-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 05:08:04', '2025-03-21 07:33:45', NULL, '0', 0, '', NULL, 'Mother', 'Sibongile E.Dlamini', '76939102', NULL),
(105, 0, 'Thobile', 'Mngometulu', '', NULL, '78178384', 'JC Certificate', '3', '828', '13.20', 8, 'Female', NULL, '1984-06-12', '8406121100847', '40', 'Bigbend, Game 5', '2024-02-08', '2024-05-08', NULL, '10', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 05:17:39', '2025-03-21 07:08:38', NULL, '0', 0, '', NULL, 'Husband', 'Sabelo Sibandze', '78334476', NULL),
(106, 0, 'Sibonakaliso', 'Mlotsa', '', NULL, '76286917', 'JC Certifcate', '3', '1250', '9.85', 8, 'Male', NULL, '2005-12-05', '0512057100376', '19', 'Bigbend, kaGoboyane', '2025-02-11', '2025-05-11', NULL, '10', NULL, 'Nedbank', '', 0, 'Single', 'New Life', NULL, NULL, NULL, NULL, '2025-03-21 05:25:15', '2025-03-21 05:25:46', NULL, '0', 0, '', NULL, 'Brother', 'Mxolisi Mlotsa', '76738963', NULL),
(107, 0, 'Happy', 'Magagula', '', NULL, '78030873', 'IGCSE', '3', '1069', '9.85', 8, 'Female', NULL, '2002-12-12', '02121222100929', '22', 'Ka Goboyane', '2024-08-15', '2024-11-15', NULL, '7', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Invetmenst', NULL, NULL, NULL, NULL, '2025-03-21 05:52:50', '2025-03-21 05:52:50', NULL, '0', 0, '', NULL, 'Mother', 'Sindi Dlamini', '78159353', NULL),
(108, 0, 'Eugene', 'Johnson', '', NULL, '76123430', 'Diploma', '5', 'S1', '', NULL, 'Male', '22', '1979-04-08', '7904086100183', '45', 'Bigbend, kaGoboyane', '2024-11-10', '2025-02-10', NULL, NULL, NULL, 'FNB', '', 0, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-21 06:08:35', '2025-03-21 06:08:35', NULL, '0', 0, NULL, NULL, 'Aunt', 'Jabulisile Nzima', '76050043', NULL),
(109, 0, 'Thob\'sile', 'Magagula', '', NULL, '76640571', 'JC Certificate', '3', '879', '13.20', 8, 'Female', NULL, '1988-11-18', '8881118110019', '36', 'Bigbend, Mahlabaneni', '2024-03-02', '2024-06-02', NULL, '10', NULL, 'Nedbank', '', 0, 'Single', 'EBC', NULL, NULL, NULL, NULL, '2025-03-21 06:21:02', '2025-03-21 06:21:02', NULL, '0', 0, '', NULL, 'Mother', 'Thandiwe Magagula', '76608474', NULL),
(110, 0, 'Kimberly', 'Mbetse', '', NULL, '76312148', 'Tertiary', '3', '1144', '9.85', 8, 'Female', NULL, '2001-09-29', '0109292100038', '23', 'Bigbend, Mayaluka', '2024-10-15', '2025-01-15', NULL, '30', NULL, 'FNB', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 06:27:37', '2025-03-21 06:36:54', NULL, '0', 0, '', NULL, 'Husband', 'Christopher Mbetse', '76377507', NULL),
(111, 0, 'Gcebile', 'Sibandze', '', NULL, '76701689', 'Primary Certificate', '3', '640', '13.20', 8, 'Female', NULL, '2003-10-13', '0310132100440', '21', 'Bigbend, Game 5', '2023-11-02', '2024-02-02', NULL, '25', NULL, 'SwaziBank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 06:35:35', '2025-03-21 06:35:35', NULL, '0', 0, '', NULL, 'Brother', 'Mbusweni Sibandze', '76413853', NULL),
(112, 0, 'Happy', 'Ndwandwe', '', NULL, '78114159', 'Primary Certificate', '3', '1070', '9.85', 8, 'Female', NULL, '1997-02-14', '9702141100778', '28', 'Bigbend, kaGoboyane', '2024-08-15', '2024-11-15', NULL, '25', NULL, 'Nedbank', '', 0, 'Single', 'De', NULL, NULL, NULL, NULL, '2025-03-21 06:44:21', '2025-03-21 06:44:21', NULL, '0', 0, '', NULL, 'Sister', 'Sonto Ndwandwe', '78356242', NULL),
(113, 0, 'Wonder', 'Simelane', '', NULL, '76586251', 'JC Certificate', '3', '209', '16.34', 8, 'Male', NULL, '1983-10-08', '8310086100521', '41', 'Bigbend, Game 5', '2023-07-11', '2023-10-11', NULL, '20', NULL, 'Nedbank', '', 0, 'Single', 'Tantax Factory', NULL, NULL, NULL, NULL, '2025-03-21 07:06:46', '2025-03-21 07:06:46', NULL, '0', 0, '', NULL, 'Brother', 'Mthokozisi Simelane', '76501121', NULL),
(114, 0, 'Thembi', 'Mvoti', '', NULL, '76557166', 'Primary Certificate', '3', '4', '14.52', 8, 'Female', NULL, '1998-01-05', '8201051100804', '27', 'Bigbend, kaGoboyane', '2021-04-10', '2021-07-10', NULL, '20', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 07:12:50', '2025-03-21 07:12:50', NULL, '0', 0, '', NULL, 'Son', 'Thabo Dlamini', '76409221', NULL),
(115, 0, 'Sincobile', 'Nhlabatsi', '', NULL, '76616333', 'Jc Certificate', '3', '622', '13.20', 5, 'Female', NULL, '1997-05-21', '9705211100602', '27', '', '2024-06-18', '2024-09-18', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mlawula Nature Reserve', NULL, NULL, NULL, NULL, '2025-03-21 07:20:27', '2025-03-24 08:58:39', NULL, '0', 0, '', NULL, 'Mother', 'Busisiwe Nhlabatsi', '76501851', NULL),
(116, 0, 'Lungisile', 'Zwane', '', NULL, '76323046', 'Primary Certificate', '3', '1169', '13.20', 5, 'Female', NULL, '1980-09-09', '8009091100241', '44', 'Bigbend, kaGoboyane', '2024-11-11', '2025-02-11', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-21 07:30:32', '2025-03-21 07:30:32', NULL, '0', 0, '', NULL, 'Mother', 'Albethina Zwane', '76513374', NULL),
(117, 0, 'Anele', 'Msibi', '', NULL, '78211545', 'EGCSE', '3', '1178', '13.20', 5, 'Male', NULL, '2003-09-02', '0309027100325', '21', '', '2024-11-20', '2025-02-20', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Newcastle Textile', NULL, NULL, NULL, NULL, '2025-03-21 07:35:41', '2025-03-21 07:35:41', NULL, '0', 0, '', NULL, 'Mother', 'Nompumelelo Kunene', '76447547', NULL),
(118, 0, 'Happy', 'Mamba', '', NULL, '76874293', 'Primary Certificate', '3', '1163', '13.20', 5, 'Female', NULL, '1979-12-22', '7912221100638', '45', 'Bigbend,Lismore', '2024-11-06', '2025-02-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-21 07:42:39', '2025-03-21 07:42:39', NULL, '0', 0, '', NULL, 'Husband', 'Bonginkosi Mamba', '78212012', NULL),
(119, 0, 'Thubelihle', 'Ntshangase', '', NULL, '76690581', 'JC Certificate', '3', '1088', '13.20', 5, 'Male', NULL, '1999-01-22', '9901226100485', '26', '', '2024-08-12', '2024-11-12', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Montigny Investment', NULL, NULL, NULL, NULL, '2025-03-21 07:48:07', '2025-03-21 07:48:07', NULL, '0', 0, '', NULL, 'Father', 'Jabulani Ntshangase', '76652425', NULL),
(120, 0, 'Sibongile', 'Mamba', '', NULL, '78267565', 'Diploma', '3', '1269', '9.85', 5, 'Female', NULL, '1987-10-10', '9710101101794', '37', 'Bigbend, kaGoboyane', '2025-02-17', '2025-05-17', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 07:55:02', '2025-03-21 07:55:02', NULL, '0', 0, '', NULL, 'Sister', 'Zandile Mbingo', '78265164', NULL),
(121, 0, 'Simangele', 'Magagula', '', NULL, '76571019', 'JC Certificate', '3', '101', '13.20', 5, 'Female', NULL, '1983-05-07', '8305071100155', '41', 'Bigbend, Mayaluka', '2023-02-20', '2023-05-20', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Zing Houng Factory', NULL, NULL, NULL, NULL, '2025-03-21 09:12:39', '2025-03-21 09:12:39', NULL, '0', 0, '', NULL, 'Mother', 'Ester Shabangu', '78184603', NULL),
(122, 0, 'NELISWA', 'DLAMINI', '', NULL, '79036090', 'IGCSE', '3', '1268', '9.85', 5, 'Female', NULL, '2006-05-25', '0605252100785', '18', 'GARAGE, BIG BEND', '2025-02-14', '2025-05-14', NULL, '29', NULL, 'NEDANK', '', 0, 'Single', 'NONE', NULL, NULL, NULL, NULL, '2025-03-21 09:49:31', '2025-03-21 10:25:09', NULL, '0', 0, '', NULL, 'FATHER', 'MAFONDO DLAMINI', '76227554', NULL);
INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `tax_number`, `email`, `phone`, `qualification`, `is_role`, `admission_number`, `roll_number`, `class_id`, `gender`, `occupation`, `date_of_birth`, `id_number`, `age`, `address`, `admission_date`, `probation_date`, `work_experience`, `designation`, `p_address`, `bank_name`, `bank_account`, `probation_status`, `marital_status`, `previous_school`, `document_file`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `is_delete`, `status`, `academic_year_id`, `note`, `relationship`, `nxt_name`, `nxt_contact`, `new_rate`) VALUES
(123, 0, 'Mnotfo', 'Mabuyakhulu', '', NULL, '76893820', 'Matric', '3', '1204', '13.20', 5, 'Male', NULL, '2003-08-13', '0308137100555', '21', 'Bigbend, kaGoboyane', '2025-01-27', '2025-04-27', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 09:57:12', '2025-03-21 09:57:12', NULL, '0', 0, '', NULL, 'Grany', 'Sithembile Ngcamphalala', '76442795', NULL),
(124, 0, 'Samkelisiwe', 'Nhlabatsi', '', NULL, '78319690', 'EGCSE Certificate', '3', '1013', '13.20', 5, 'Female', NULL, '2004-07-07', '0407072100586', '20', '', '2024-06-19', '2024-09-19', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mlawula Nature Reserve', NULL, NULL, NULL, NULL, '2025-03-21 10:02:23', '2025-03-21 10:02:23', NULL, '0', 0, '', NULL, 'Sister', 'Sincobile Nhlabatsi', '76616333', NULL),
(125, 0, 'Nothando', 'Dlamini', '', NULL, '76408053', 'JC Certificate', '3', '1164', '13.20', 5, 'Female', NULL, '1991-01-31', '91101311100330', '34', 'Bigbend, kaGoboyane', '2024-11-10', '2025-02-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Deviskot, Matsantjeni Textile', NULL, NULL, NULL, NULL, '2025-03-21 10:08:31', '2025-03-21 10:08:31', NULL, '0', 0, '', NULL, 'Mother', 'Thoko Dlamini', '76371021', NULL),
(126, 0, 'Cebile', 'Ndzimandze', '', NULL, '78542370', 'Primary Certificate', '3', '1205', '13.20', 5, 'Female', NULL, '1998-02-13', '9802131100331', '27', 'Bigbend, Sangwalume', '2025-01-29', '2025-04-29', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Leo Garments,Matsapha', NULL, NULL, NULL, NULL, '2025-03-21 10:14:59', '2025-03-21 10:14:59', NULL, '0', 0, '', NULL, 'Father', 'Solomon Ndzimadze', '76335596', NULL),
(127, 0, 'Bonisile', 'Matsentjwa', '', NULL, '76985680', 'Primary Certificate', '3', '1251', '9.85', 4, 'Female', NULL, '1995-05-16', '9505161100630', '29', 'Bigbend, Mayaluka', '2025-02-12', '2025-05-12', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'SWIM Factory', NULL, NULL, NULL, NULL, '2025-03-21 10:32:44', '2025-03-21 10:32:44', NULL, '0', 0, '', NULL, 'Mother', 'Sithembile Vilane', '76800803', NULL),
(128, 0, 'Hlane', 'Masuku', '', NULL, '76577556', 'EGCSE Certificate', '3', '1048', '13.20', 5, 'Male', NULL, '1999-10-13', '9910136100147', '25', 'Bigbend, kaGoboyane', '2024-06-09', '2024-09-09', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 10:37:47', '2025-03-21 10:37:47', NULL, '0', 0, '', NULL, 'Mother', 'Gugu Mamba', '76420054', NULL),
(129, 0, 'Lunga', 'Nkambule', '', NULL, '78673045', 'EGCSE Certificate', '3', '1037', '14.52', 5, 'Male', NULL, '1998-04-25', '9804256100641', '26', 'Bigbend, kaGoboyane', '2023-06-10', '2023-09-10', NULL, '19', NULL, 'FNB', '', 1, 'Single', 'Moneni Filling Station', NULL, NULL, NULL, NULL, '2025-03-21 10:43:54', '2025-04-16 10:30:25', NULL, '0', 0, '', NULL, 'Sister', 'Makhosazana Dlamini', '76042985', '14.52'),
(130, 0, 'Zandile', 'Fakudze', '', NULL, '76432132', 'SGCSE Certificate', '3', '1078', '9.85', 5, 'Female', NULL, '1995-04-09', '9504091100190', '29', 'Bigbend, Mayaluka', '2024-08-25', '2024-11-25', NULL, '33', NULL, 'Nedbank', '', 0, 'Single', 'Mobile Vender', NULL, NULL, NULL, NULL, '2025-03-21 10:49:22', '2025-03-21 10:49:22', NULL, '0', 0, '', NULL, 'Mother', 'Duduzile Nxumalo', '78263343', NULL),
(131, 0, 'Tanele', 'Groening', '', NULL, '76211381', 'O\'level Certificate', '3', '1283', '9.85', 5, 'Female', NULL, '1986-03-03', '8605031100298', '39', 'Bigbend,Mahlabaneni', '2025-02-16', '2025-05-16', NULL, '26', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 10:55:55', '2025-03-21 10:55:55', NULL, '0', 0, '', NULL, 'Sister', 'Kholiwe Groening', '7676612', NULL),
(132, 0, 'Mbali', 'Zungu', '', NULL, '78152368', 'Primary Certificate', '3', '7112', '13.20', 5, 'Female', NULL, '1998-12-24', '98112241100220', '26', 'Bigbend,Mahlabaneni', '2023-11-25', '2024-02-25', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 11:05:21', '2025-03-21 11:05:21', NULL, '0', 0, '', NULL, 'Mother', 'Jabu Matsentjwa', '76865760', NULL),
(133, 0, 'Thabo', 'Xaba', '', NULL, '78298515', 'EGCSE Certificate', '3', '783', '13.20', 5, 'Male', NULL, '1996-12-23', '9612236100593', '28', 'Bigbend, Game 5', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mphonhlo Construction', NULL, NULL, NULL, NULL, '2025-03-21 11:09:35', '2025-03-21 11:09:35', NULL, '0', 0, '', NULL, 'Mother', 'Ntombizodwa Mkhwanazi', '76864164', NULL),
(134, 0, 'Bongekile', 'Simelane', '', NULL, '78727780', 'EGCSE Certificate', '3', '138', '13.20', 5, 'Female', NULL, '1996-09-26', '9609261100878', '28', 'Bigbend, kaGoboyane', '2025-01-06', '2025-04-06', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Fashion International Factory', NULL, NULL, NULL, NULL, '2025-03-21 11:15:06', '2025-03-21 11:15:06', NULL, '0', 0, '', NULL, 'Aunt', 'Nelisiwe Simelane', '7668241', NULL),
(135, 0, 'Siswe', 'Vilakat', '', NULL, '76566445', 'EGCSE Certificate', '3', '141', '13.20', 5, 'Male', NULL, '2001-07-28', '0107287100732', '23', 'Bigbend, Game 5', '2023-06-12', '2023-09-12', NULL, '19', NULL, 'SwaziBank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 11:27:02', '2025-03-21 11:27:02', NULL, '0', 0, '', NULL, 'Mother', 'Gugu Mbuyisa', '78281643', NULL),
(136, 0, 'Khumbuzile', 'Nkambule', '', NULL, '78221908', 'Primary Certificate', '3', '173', '13.20', 5, 'Female', NULL, '2001-09-22', '0109222100132', '23', '', '2023-07-10', '2023-10-10', NULL, '19', NULL, 'SwaziBank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 11:32:05', '2025-03-21 11:32:05', NULL, '0', 0, '', NULL, 'Mother', 'Thembekile Malinga', '78649694', NULL),
(137, 0, 'Zandile', 'Mbingo', '', NULL, '78265164', 'Primary Certificates', '3', '6112', '9.85', 5, 'Female', NULL, '1993-02-25', '9302251100625', '32', 'Bigbend, kaGoboyane', '2025-02-10', '2025-05-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'FTM Garments', NULL, NULL, NULL, NULL, '2025-03-21 11:36:55', '2025-03-21 11:36:55', NULL, '0', 0, '', NULL, 'Brother', 'Mandla Mbingo', '76198483', NULL),
(138, 0, 'Siphesihle', 'Sithole', '', NULL, '78771626', 'Primary Certificate', '3', '1247', '9.85', 5, 'Female', NULL, '2006-11-15', '0611152100370', '18', 'Bigbend, eNkilongo', '2025-02-11', '2025-05-11', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'ZingHoung Factory', NULL, NULL, NULL, NULL, '2025-03-21 11:43:51', '2025-03-21 11:43:51', NULL, '0', 0, '', NULL, 'Brother', 'Mongi Ngcamphalala', '76263079', NULL),
(139, 0, 'Zanele', 'Nhleko', '', NULL, '76701172', 'Primary Certificate', '3', '1244', '9.85', 5, 'Female', NULL, '1993-06-06', '9306061100857', '31', 'Bigbend, kaGoboyane', '2025-02-11', '2025-05-11', NULL, '29', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 11:54:14', '2025-03-21 11:54:14', NULL, '0', 0, '', NULL, 'Father', 'Albert Nhleko', '76350044', NULL),
(140, 0, 'Gcina', 'Nhlanze', '', NULL, '78360169', 'Primary Certificate', '3', '611', '13.20', 4, 'Male', NULL, '1996-06-26', '9606266100341', '28', 'Bigbend, Game 5', '2025-02-11', '2025-05-11', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 12:03:23', '2025-03-21 12:13:33', NULL, '0', 0, '', NULL, 'Sister', 'Ntombikayise Mahlambi', '76416418', NULL),
(141, 0, 'Mndeni M.', 'Dlamini', '', NULL, '76883549', 'Tertiary', '3', '1185', '13.20', 1, 'Male', NULL, '1985-10-26', '8510266100205', '39', 'Bigbend, Game 5', '2024-11-26', '2025-02-26', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Zing Houng Factory', NULL, NULL, NULL, NULL, '2025-03-21 12:08:08', '2025-03-21 12:12:51', NULL, '0', 0, '', NULL, 'Sister', 'Nokuhle Dlamini', '78209800', NULL),
(142, 0, 'Ncobile', 'Shongwe', '', NULL, '78183600', 'JC Certificate', '3', '1062', '13.20', 1, 'Female', NULL, '2001-10-08', '0110082100667', '23', 'Bigbend, Game 5', '2024-09-14', '2024-12-14', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Zing Houng Factory', NULL, NULL, NULL, NULL, '2025-03-21 12:23:47', '2025-03-21 12:23:47', NULL, '0', 0, '', NULL, 'Husband', 'Machawe Maseko', '76664176', NULL),
(143, 0, 'Lindokuhle', 'Fakudze', '', NULL, '78185284', 'JC Certificate', '3', '1112', '13.20', 1, 'Female', NULL, '1993-12-15', '9312151100211', '31', 'Bigbend, kaGoboyane', '2024-09-12', '2024-12-12', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 12:31:01', '2025-03-21 12:31:01', NULL, '0', 0, '', NULL, 'Sister', 'Sibonelo Fakundze', '76290646', NULL),
(144, 0, 'Ncobile', 'Nkambule', '', NULL, '76714751', 'EGCSE Certificate', '3', '1067', '13.20', 1, 'Female', NULL, '1993-01-26', '9301261100062', '32', 'Bigbend, kaGoboyane', '2023-01-11', '2023-04-11', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-21 12:35:50', '2025-03-24 08:02:16', NULL, '0', 0, '', NULL, 'Sister', 'Rose Nkambule', '76614244', NULL),
(146, 0, 'Celiwe', 'Dlamini', '', NULL, '76507810', 'JC Certificate', '3', '1212', '13.20', 1, 'Female', NULL, '1988-09-06', '88009066100176', '36', '', '2025-02-02', '2025-05-02', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Union Taxray Factory', NULL, NULL, NULL, NULL, '2025-03-24 10:09:39', '2025-03-24 10:09:39', NULL, '0', 0, '', NULL, 'Sister', 'Cebsile Dlamini', '76822772', NULL),
(147, 0, 'Sonia', 'Mthembu', '', NULL, '78574662', 'JC Certificate', '3', '599', '13.20', 1, 'Female', NULL, '1997-10-30', '9710301100645', '27', 'Bigbend, Game 5', '2023-09-20', '2023-12-20', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Stenga Shop', NULL, NULL, NULL, NULL, '2025-03-24 10:19:18', '2025-03-24 10:19:18', NULL, '0', 0, '', NULL, 'Mother', 'Phindile Ndlovu', '76336622', NULL),
(148, 0, 'Thuli', 'Simelane', '', NULL, '76130269', 'JC Certificate', '3', '579', '14.52', 7, 'Female', NULL, '1989-12-26', '8912260011868', '35', 'Bigbend, Mahlabaneni', '2023-08-09', '2023-11-09', NULL, '19', NULL, 'SwaziBank', '', 1, 'Single', 'Nedbank', NULL, NULL, NULL, NULL, '2025-03-24 10:25:03', '2025-04-16 10:29:46', NULL, '0', 0, '', NULL, 'Mother', 'Thabisile Simelane', '76553448', '14.52'),
(149, 0, 'Colile', 'Matsentjwa', '', NULL, '78226415', 'Primary Certificate', '3', '164', '13.20', 1, 'Female', NULL, '1988-03-12', '8803121100266', '37', 'Bigbend, Mayaluka', '2023-02-01', '2023-05-01', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'SIGMA FACTORY, Matsapha', NULL, NULL, NULL, NULL, '2025-03-24 10:32:37', '2025-03-24 10:32:37', NULL, '0', 0, '', NULL, 'Mother', 'Thoko Matsentjwa', '76475312', NULL),
(150, 0, 'Nosimilo', 'Gwebu', '', NULL, '78550858', 'EGCSE Certificate', '3', '687', '13.20', 1, 'Female', NULL, '2002-05-12', '0205122100659', '22', 'Bigbend, Game 5', '2024-01-10', '2024-04-10', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Newcastle Textile', NULL, NULL, NULL, NULL, '2025-03-24 10:38:30', '2025-03-24 10:38:30', NULL, '0', 0, '', NULL, '', 'Sibonisile Gwebu', '', NULL),
(151, 0, 'Ncobile', 'Mavuso', '', NULL, '76046159', 'EGCSE Certificate', '3', '1187', '13.20', 1, 'Female', NULL, '1987-02-02', '8702021100519', '38', 'Ncandweni', '2024-08-10', '2024-11-10', NULL, '19', NULL, 'SwaziBank', '', 0, 'Single', 'Piggs Peak Hotel', NULL, NULL, NULL, NULL, '2025-03-24 10:45:50', '2025-03-24 10:45:50', NULL, '0', 0, '', NULL, 'Cousin', 'Dumsile Shongwe', '76123374', NULL),
(152, 0, 'Phinky', 'Mphungose', '', NULL, '76566993', 'IGCSE Certificate', '3', '667', '13.20', 1, 'Female', NULL, '1991-03-25', '9103251100650', '34', 'Bigbend, Game 5', '2024-03-08', '2024-06-08', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-24 10:53:16', '2025-03-24 10:53:16', NULL, '0', 0, '', NULL, 'Husband', 'Sifiso Gumedze', '76354763', NULL),
(153, 0, 'Beaty', 'Langa', '', NULL, '76369831', 'JC Certificate', '3', '1197', '13.20', 1, 'Female', NULL, '1990-10-21', '9010211100037', '34', 'Bigbend, Emabholoweni', '2025-01-14', '2025-04-14', NULL, '19', NULL, 'Nedbank', '', 0, 'Married', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-24 10:58:25', '2025-03-24 10:58:25', NULL, '0', 0, '', NULL, 'Husband', 'Bafana Matsebula', '78303004', NULL),
(154, 0, 'Nosipho', 'Masangu', '', NULL, '78525057', 'Matric Certificate', '3', '643', '13.20', 1, 'Female', NULL, '2002-05-13', '0205132100327', '22', 'Bigbend, kaGoboyane', '2023-11-07', '2024-02-07', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-24 11:04:59', '2025-03-24 11:04:59', NULL, '0', 0, '', NULL, 'Grany', 'Thoko Maziya', '76332463', NULL),
(155, 0, 'Ntom\'futhi', 'Vilakati', '', NULL, '78410319', 'Primary Certificate', '3', '614', '13.20', 1, 'Female', NULL, '1983-06-20', '8311201100347', '41', 'Bigbend, kaGoboyane', '2023-09-21', '2023-12-21', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-24 11:18:34', '2025-03-24 11:18:34', NULL, '0', 0, '', NULL, 'Sister', 'Colile Vilakati', '78184995', NULL),
(156, 0, 'Thulisile', 'Vilakati', '', NULL, '78043878', 'Primary Certificate', '3', '621', '13.20', 1, 'Female', NULL, '1990-04-29', '9004291100413', '34', 'Siteki road Kashoba', '2023-09-20', '2023-12-20', NULL, '19', NULL, 'SwaziBank', '', 0, 'Single', 'Newcastle Textile', NULL, NULL, NULL, NULL, '2025-03-24 11:24:41', '2025-03-24 11:24:41', NULL, '0', 0, '', NULL, 'Mother', 'Thandiwe Dlamini', '76318243', NULL),
(157, 0, 'Colile', 'Ngcamphalala', '', NULL, '78293718', 'EGCSE Certificate', '3', '109', '13.20', 1, 'Female', NULL, '1998-01-28', '9801281100398', '27', 'Bigbend, Mahlabaneni', '2023-03-03', '2023-06-03', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-24 11:31:15', '2025-03-24 11:31:15', NULL, '0', 0, '', NULL, 'Sister', 'Happiness Ngcamphalala', '76679206', NULL),
(158, 0, 'Xolile', 'Dlamini', '', NULL, '78254261', 'JC Certificate', '3', '817', '13.20', 1, 'Female', NULL, '1986-02-02', '8602021101451', '39', 'Bigbend, Game 5', '2024-02-08', '2024-05-08', NULL, '19', NULL, 'Nedbank', '', 0, 'Single', 'Illovo Agriculture', NULL, NULL, NULL, NULL, '2025-03-24 11:40:22', '2025-03-25 07:21:48', NULL, '0', 0, '', NULL, 'Son', 'Innocent Sithole', '78896252', NULL),
(159, 0, 'SIBONELO', 'NSIMBINI', '', '', '7872 9848', 'NONE', '2', '45', '15.52', NULL, 'Female', '', '1988-12-27', '8812271100646', '36', 'GOBOYANE', '2022-06-14', '2022-09-14', 'WOLRD VISION', NULL, 'LUBULINI', 'NEDBANK', '', 1, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-25 04:41:14', '2025-04-16 11:51:45', NULL, '0', 0, NULL, '', 'MOTHER', 'JELINA MNGOMETULU', '7682 6647', '15.52'),
(160, 0, 'TENGETILE', 'DLAMINI', '791', '', '7664 6868', 'NONE', '2', '103', '15.52', NULL, 'Female', '', '1994-10-14', '9410141100059', '30', 'GOBOYANE', '2024-02-05', '2024-05-05', 'WOLRD VISION', NULL, 'MBOLONJENI, SITEKI', 'NEDBANK', '', 1, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-25 04:50:51', '2025-04-16 11:51:29', NULL, '0', 0, NULL, '', 'SPOUSE', 'NJABULO TSABEDZE', '7615 7012', '15.52'),
(161, 0, 'PHINDA', 'MSIBI', '', NULL, '7934 7301', 'BACHELOR OF COMMERCE DEGREE', '5', 'MC192', 'FIXED', NULL, 'Male', '15', '2000-08-28', '0008287100351', '24', 'GOBOYANE', '2024-09-25', '2024-12-25', NULL, NULL, NULL, 'FNB', '62890464367', 0, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-25 05:04:52', '2025-03-25 05:04:52', NULL, '0', 0, NULL, NULL, 'GOGO', 'NOMSA MTSWENI', '79537352', NULL),
(162, 0, 'GABSILE', 'MDLULI', '', '', '7641 8001', 'NONE', '2', '95', '14.52', NULL, 'Female', '', '1982-02-05', '8201171100312', '43', 'GOBOYANE', '2019-10-07', '2020-01-07', 'SIX (6) YEARS EXPIRINCE', NULL, 'MACETJENI, SGCAWENI', 'NEDBANK', '', 1, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-25 05:15:19', '2025-04-16 11:51:06', NULL, '0', 0, NULL, '', 'SISTER', 'SIBUSISO MSIBI', '7852 9427', '14.52'),
(163, 0, 'SITHEMBISO', 'NHLEKO', '', '', '7829 7490', 'CERTIFICATE IN SEWING', '2', 'MTF26', 'FIXED', NULL, 'Male', '', '1984-06-28', '8408286100293', '40', 'GOBOYANE', '2023-03-03', '2023-06-03', '21 (TWENTY-ONE) YEARS', NULL, 'MBOWANE, NHLANGANO', 'NEDBANK', '', 1, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-25 05:46:51', '2025-04-16 11:50:52', NULL, '0', 0, NULL, '', 'WIFE', 'NQOBILE MKHONTA', '7656 0061', 'Fixed'),
(164, 0, 'GUGU', 'MPOFANA', '', '', '7654 7936', 'NONE', '2', 'MTF025', 'Fixed', NULL, 'Female', '', '1981-03-27', '8103271100467', '43', 'GOBOYANE', '2024-06-18', '2024-09-18', 'TENTY-TWO (22) YEARS EXPIRINCE', NULL, 'GOBOYANE', 'NEDBANK', '', 1, 'Married', NULL, NULL, NULL, NULL, NULL, '2025-03-25 06:14:26', '2025-04-16 11:50:40', NULL, '0', 0, NULL, '', 'SON', 'SIKHULISO MHLONGO', '7848 9132', 'Fixed'),
(166, 0, 'Ruth', 'Mngometulu', '', '', '7624 9753', 'NONE', '2', '170', '16.20', NULL, 'Female', '', '1978-04-05', '7804051100228', '46', 'GOBOYANE', '2021-01-11', '2021-04-11', 'TWELVE YEARS (12) EXPIREINCE', NULL, 'GOBOYANE', 'NEDBANK', '', 1, 'Single', NULL, NULL, NULL, NULL, NULL, '2025-03-25 07:30:12', '2025-04-16 11:50:20', NULL, '0', 0, NULL, '', 'DAUGHTER', 'CEBILE DLAMINI', '7665 1015', '16.20'),
(167, 0, 'Temazomba', 'Dube', '', NULL, '79477915', 'EGCSE Certificate', '3', '1019', '13.20', 6, 'Female', NULL, '1999-02-09', '9902091100659', '26', 'Bigbend, Game 5', '2024-06-20', '2024-09-20', NULL, '33', NULL, 'Nedbank', '', 0, 'Single', 'Mtfombeni Investment(Pty) Ltd', NULL, NULL, NULL, NULL, '2025-03-26 05:24:37', '2025-03-26 05:24:37', NULL, '0', 0, '', NULL, 'Sister', 'Ncobile Dube', '78603113', NULL),
(168, 0, 'Rita S.', 'Sithole', '', NULL, '76726525', 'Primary Certificate', '3', '10', '14.52', 1, 'Female', NULL, '1968-04-12', '6812041100365', '56', 'Bigbend, kaGoboyane', '2021-06-13', '2021-09-13', NULL, '11', NULL, 'Nedbank', '', 1, 'Single', 'Nisela Farm', NULL, NULL, NULL, NULL, '2025-03-26 05:46:06', '2025-04-16 10:29:20', NULL, '0', 0, '', NULL, 'Son', 'Thokozane Zungu', '76612289', '14.52'),
(169, 0, 'Factory', 'Manager', NULL, 'factory.manager@mtfombeniinv.co.za', '79091058', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '$2y$10$WeLLH5dCiR55v4pxn8wWaOtLvqED/hY6tfb7Im.lrXLIOLpDsfL1u', NULL, '2025-04-01 10:58:44', '2025-04-01 12:06:45', NULL, '0', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 0, 'Londiwe', 'Lukhele', '', NULL, '78019435', 'IGCSE', '3', '21', '13.20', 9, 'Female', NULL, '2000-02-08', '0002082100344', '25', 'Goboyane', '2022-08-15', '2022-11-15', NULL, '33', NULL, 'Nedbank', '', 1, 'Single', 'None', NULL, NULL, NULL, NULL, '2025-04-02 12:03:10', '2025-04-04 03:49:40', NULL, '0', 0, '', NULL, 'Mother', 'Hellen Shongwe', '7677 0300', NULL),
(171, 0, 'Sonani', 'Ngwenya', '', NULL, '76175728', 'O\'level', '3', '166', '16.50', 9, 'Female', NULL, '1981-07-04', '8107041100442', '43', 'Mahlabaneni next to Distillers', '2023-05-10', '2023-08-10', NULL, '15', NULL, 'FNB', '', 1, 'Single', 'Riverside Butchery', NULL, NULL, NULL, NULL, '2025-04-02 12:18:24', '2025-04-04 03:48:24', NULL, '0', 0, '', NULL, 'Sister', 'Nelisiwe Ngwenya', '76227687', NULL),
(172, 0, 'Jane', 'Khumalo', '', NULL, '78706548', 'JC - Certificate', '3', '1358', '13.20', 5, 'Female', NULL, '1993-08-24', '9308241100393', '31', '', '2025-03-13', '2025-06-13', NULL, '35', NULL, 'Nedbank', '12992066995', 1, 'Single', 'Deviscot', NULL, NULL, NULL, NULL, '2025-04-15 11:26:48', '2025-04-16 11:45:15', NULL, '0', 0, '', NULL, 'Mother', 'Elizabeth Khumalo', '78075420', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fullcalendar_day` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `name`, `fullcalendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, '2023-09-17 17:23:46', '2023-09-17 17:23:46'),
(2, 'Tuesday', 2, '2023-09-17 17:24:13', '2023-09-17 17:24:13'),
(3, 'Wednesday', 3, '2023-09-17 17:24:31', '2023-09-17 17:24:31'),
(4, 'Thursday', 4, '2023-09-17 17:24:31', '2023-09-17 17:24:31'),
(5, 'Friday', 5, '2023-09-17 17:24:31', '2023-09-17 17:24:31'),
(6, 'Saturday', 6, '2023-09-17 17:24:31', '2023-09-17 17:24:31'),
(7, 'Sunday', 0, '2023-09-17 17:24:31', '2023-09-17 17:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_submits`
--
ALTER TABLE `assignment_submits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_class_teachers`
--
ALTER TABLE `assign_class_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject_timetables`
--
ALTER TABLE `class_subject_timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_status`
--
ALTER TABLE `employee_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_registers`
--
ALTER TABLE `mark_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_boards`
--
ALTER TABLE `notice_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board_messages`
--
ALTER TABLE `notice_board_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment_submits`
--
ALTER TABLE `assignment_submits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_class_teachers`
--
ALTER TABLE `assign_class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_subject_timetables`
--
ALTER TABLE `class_subject_timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_status`
--
ALTER TABLE `employee_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mark_registers`
--
ALTER TABLE `mark_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notice_boards`
--
ALTER TABLE `notice_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_board_messages`
--
ALTER TABLE `notice_board_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
