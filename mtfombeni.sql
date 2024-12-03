-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2024 at 12:36 PM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.14

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
(20, 'Score Taker', '1', '0', '2024-09-16 07:43:02', '2024-09-16 07:43:02', '0');

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
(1, '9', '195', '0', '0', 23, '2024-09-18 05:29:54', '2024-09-18 05:29:54', NULL);

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

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `reciever_id`, `message`, `file`, `status`, `created_date`, `created_at`, `updated_at`) VALUES
(1, '1', '23', 'Hey Sister How are you doing', NULL, '1', '2024-05-30 04:15:25', '2024-05-30 04:15:25', '2024-05-30 05:57:59'),
(2, '1', '23', NULL, '20240530061539yqgkmlmiqo0tut6bcpps.jpg', '1', '2024-05-30 04:15:39', '2024-05-30 04:15:39', '2024-05-30 05:57:59'),
(3, '23', '1', 'I am good my broo how are you', NULL, '1', '2024-05-30 05:58:26', '2024-05-30 05:58:26', '2024-05-30 06:19:21'),
(4, '1', '23', 'am also good sister was just checking kutsi kuyavela yini lapho', NULL, '1', '2024-05-30 06:19:56', '2024-05-30 06:19:56', '2024-05-30 06:21:22'),
(5, '23', '1', 'yeeeeeeeeeeees', NULL, '1', '2024-05-30 06:21:35', '2024-05-30 06:21:35', '2024-05-30 06:37:11');

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
(1, 'Line 1', '0', '2024-05-20 03:20:03', '2024-05-20 03:20:03', 1, '0'),
(2, 'Line 2', '0', '2024-05-27 03:21:52', '2024-05-27 03:21:52', 23, '0'),
(3, 'Line 3', '0', '2024-05-27 03:22:01', '2024-05-27 03:22:01', 23, '0'),
(4, 'Line 4', '0', '2024-05-27 03:22:10', '2024-05-27 03:22:10', 23, '0'),
(5, 'Line 5', '0', '2024-05-27 03:22:20', '2024-05-27 03:22:20', 23, '0'),
(6, 'Line 6', '0', '2024-05-27 03:22:29', '2024-05-27 03:22:29', 23, '0'),
(7, 'Line 7', '0', '2024-05-27 03:22:38', '2024-05-27 03:22:38', 23, '0'),
(8, 'Line 8', '0', '2024-05-27 03:22:51', '2024-05-27 03:22:51', 23, '0'),
(9, 'Cutting', '0', '2024-05-27 03:23:02', '2024-05-27 03:23:02', 23, '0'),
(10, 'Security', '0', '2024-05-27 03:23:22', '2024-05-27 03:23:22', 23, '0'),
(11, 'Cleaners', '0', '2024-05-27 03:23:36', '2024-05-27 03:23:36', 23, '0'),
(12, 'Maintenance', '0', '2024-05-27 03:24:01', '2024-05-27 03:24:01', 23, '0'),
(13, 'Machanic', '0', '2024-06-06 06:21:34', '2024-06-06 07:40:53', 23, '1'),
(14, 'Mechanic', '0', '2024-06-06 06:22:13', '2024-06-06 06:22:13', 23, '0');

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

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_id`, `subject_id`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 132, 4, 0, 0, 1, '2024-07-30 09:57:42', '2024-07-30 09:57:42'),
(2, 132, 3, 0, 0, 1, '2024-07-30 09:57:42', '2024-07-30 09:57:42'),
(3, 132, 2, 0, 0, 1, '2024-07-30 09:57:42', '2024-07-30 09:57:42'),
(4, 132, 7, 0, 0, 1, '2024-07-30 09:57:42', '2024-07-30 09:57:42'),
(5, 132, 10, 0, 0, 1, '2024-07-30 09:57:42', '2024-07-30 09:57:42'),
(6, 132, 1, 0, 0, 1, '2024-07-30 09:57:42', '2024-07-30 09:57:42');

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
(4, 'Learner Sewing Machinist A', 'An employee with less than 3 months on the job training to be a sewing machinist', '9.85', '23', '0', '2024-07-31 05:32:51', '2024-07-31 05:57:35'),
(5, 'Cleaner', 'Employee responsible for the cleaning of a factory, offices, toilets an canteen and who also performs tea making duties', '13.20', '23', '0', '2024-07-31 05:36:36', '2024-07-31 05:54:29'),
(6, 'Learner Mechanic B', 'Employee with 3 months or more on the job training but less than 6 months experience engaged in mechanical repairing and assembly of machinery', '13.20', '23', '0', '2024-07-31 05:47:06', '2024-07-31 05:57:09'),
(7, 'Fusers', 'An employee who irons pieces of materials through a fusing machine in the preparation section of clothing manufacture', '9.85', '23', '0', '2024-07-31 05:51:06', '2024-07-31 05:56:08'),
(8, 'Hand Trimmer', 'an employee who trims by means of a clipper all exceeds threads, binding and tapes after all closing operations have been done', '13.20', '23', '0', '2024-07-31 06:05:10', '2024-07-31 06:05:10'),
(9, 'Inline Examiner', 'An employee who examines the uncompleted garments during the manufacturing process', '13.20', '23', '0', '2024-07-31 06:12:46', '2024-07-31 06:12:46'),
(10, 'Layer-up', 'An employee who is engaged in the laying of material in one or more thicknesses on the cutting tables and may include the duty of slicing the ends', '13.20', '23', '0', '2024-07-31 06:15:43', '2024-07-31 06:15:43'),
(11, 'Packer', 'Packs clothes', '13.20', '23', '0', '2024-07-31 06:18:14', '2024-07-31 06:18:14'),
(12, 'Inline Presser', 'An employee who is employed to press parts of garments during the manufacturing process', '13.20', '23', '0', '2024-07-31 06:20:09', '2024-07-31 06:20:09'),
(13, 'Soberer', 'An employee who stamps information on to material or pieces of material by of a sober gun', '13.20', '23', '0', '2024-07-31 06:23:51', '2024-07-31 06:23:51'),
(14, 'Learner Sewing Machinist B', 'An employee with more than 3 months but less than 6 months training to be a sewing machinist', '13.20', '23', '0', '2024-07-31 06:26:17', '2024-07-31 06:26:17'),
(15, 'Dispatch Clerk', 'An employee who selects and packs good according to customers\' orders', '14.52', '23', '0', '2024-07-31 06:28:39', '2024-07-31 06:33:20'),
(16, 'Factory Clerk', 'An employee who is employed in the production area and who is wholly or mainly responsible for the recording of attendance and/or production data which may require further processing by office administrators', '14.52', '23', '0', '2024-07-31 06:32:57', '2024-07-31 06:32:57'),
(17, 'Checker', 'Checker', '14.52', '23', '0', '2024-07-31 06:34:51', '2024-07-31 06:34:51'),
(18, 'Re-Cutter', 'An employee who is engaged in the cutting out and/or marking in of materials for replacing damaged or missing parts of a garment', '16.34', '23', '0', '2024-07-31 06:38:11', '2024-07-31 07:38:21'),
(19, 'Sewing Machinist', 'An employee engaged to operate a sewing machine using a needle and a thread and, or an employee operating or an employee operating a rivet machine', '14.52', '23', '0', '2024-07-31 06:40:45', '2024-07-31 06:40:45'),
(20, 'Cutter', 'An employee who is engaged in cutting atrial by means of a machine in a factory', '16.34', '23', '0', '2024-07-31 06:43:21', '2024-07-31 06:43:21'),
(21, 'Driver', '', '16.34', '23', '0', '2024-07-31 06:46:41', '2024-07-31 06:46:41'),
(22, 'Driver Messager', 'An employee in possession of a valid driver\'s license who is mainly engaged in conveying messages, delivers and collects good or mail using a vehicle and also performs simple routines tasks in an office', '16.34', '23', '0', '2024-07-31 06:50:42', '2024-07-31 06:50:42'),
(23, 'Mechanic 2', 'An employee who has more than 6 months, but less than 12 months experience engaged mechanical in, repairing and assembly of machinery', '16.34', '23', '0', '2024-07-31 06:54:47', '2024-07-31 06:54:47'),
(24, 'Office/Computer Clerk', 'An employee who does general clerical duties including invoicing, data capturing and generally works on a computer in the office', '16.34', '23', '0', '2024-07-31 06:56:55', '2024-07-31 06:56:55'),
(25, 'Sorter', 'An employee performing the sorting out of garments or parts of garments', '13.20', '23', '0', '2024-07-31 07:05:23', '2024-07-31 07:05:23'),
(26, 'Roving  QC', 'Roving QC', '13.20', '23', '0', '2024-07-31 07:08:52', '2024-07-31 07:08:52'),
(27, 'Final QC', 'Final QC', '13.20', '23', '0', '2024-07-31 07:09:21', '2024-07-31 07:09:21'),
(28, 'Endline QC', 'Endline QC', '13.20', '23', '0', '2024-07-31 07:09:41', '2024-07-31 07:09:41'),
(29, 'Helper', 'Helper', '9.85', '23', '0', '2024-07-31 08:35:34', '2024-07-31 08:35:34'),
(30, 'Loader', 'Loader', '13.17', '155', '0', '2024-08-01 12:15:23', '2024-08-01 12:15:23'),
(31, 'Security Guard', 'Security Guard', '14.52', '1', '0', '2024-08-07 03:41:40', '2024-08-07 03:41:40');

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
(1, 'Mtfombeni Investments (PTY) Ltd.', '20240518052046.png', '20240518052046.png', '2023-10-28 06:48:02', '2024-05-19 14:02:02');

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
(7, '6', '2024-08-01', '171', '1', '1', '2024-08-01 10:47:58', '2024-08-01 10:47:58'),
(8, '6', '2024-08-01', '170', '1', '1', '2024-08-01 10:47:59', '2024-08-01 10:47:59'),
(9, '6', '2024-08-01', '156', '1', '1', '2024-08-01 10:48:00', '2024-08-01 10:48:00'),
(10, '6', '2024-08-01', '66', '1', '1', '2024-08-01 10:48:07', '2024-08-01 10:48:07'),
(11, '6', '2024-08-01', '154', '1', '1', '2024-08-01 10:48:13', '2024-08-01 10:48:13'),
(12, '6', '2024-08-01', '153', '1', '1', '2024-08-01 10:48:14', '2024-08-01 10:48:14'),
(13, '6', '2024-08-01', '134', '1', '1', '2024-08-01 10:48:15', '2024-08-01 10:48:15'),
(14, '6', '2024-08-01', '131', '1', '1', '2024-08-01 10:48:16', '2024-08-01 10:48:16'),
(15, '6', '2024-08-01', '126', '1', '1', '2024-08-01 10:48:18', '2024-08-01 10:48:18'),
(16, '6', '2024-08-01', '116', '1', '1', '2024-08-01 10:48:19', '2024-08-01 10:48:19'),
(17, '6', '2024-08-01', '115', '1', '1', '2024-08-01 10:48:19', '2024-08-01 10:48:19'),
(18, '6', '2024-08-01', '107', '1', '1', '2024-08-01 10:48:20', '2024-08-01 10:48:20'),
(19, '6', '2024-08-01', '103', '1', '1', '2024-08-01 10:48:22', '2024-08-01 10:48:22'),
(20, '6', '2024-08-01', '97', '1', '1', '2024-08-01 10:48:23', '2024-08-01 10:48:23'),
(21, '6', '2024-08-01', '96', '1', '1', '2024-08-01 10:48:23', '2024-08-01 10:48:23'),
(22, '6', '2024-08-01', '94', '1', '1', '2024-08-01 10:48:26', '2024-08-01 10:48:26'),
(23, '6', '2024-08-01', '92', '1', '1', '2024-08-01 10:48:27', '2024-08-01 10:48:27'),
(24, '6', '2024-08-01', '86', '1', '1', '2024-08-01 10:48:30', '2024-08-01 10:48:31'),
(25, '6', '2024-08-01', '77', '1', '1', '2024-08-01 10:48:33', '2024-08-01 10:48:33'),
(26, '6', '2024-08-01', '72', '1', '1', '2024-08-01 10:48:34', '2024-08-01 10:48:34'),
(27, '6', '2024-08-01', '71', '1', '1', '2024-08-01 10:48:35', '2024-08-01 10:48:35'),
(28, '6', '2024-08-01', '70', '1', '1', '2024-08-01 10:48:36', '2024-08-01 10:48:36'),
(29, '6', '2024-08-01', '68', '1', '1', '2024-08-01 10:48:37', '2024-08-01 10:48:37'),
(30, '6', '2024-08-01', '63', '1', '1', '2024-08-01 10:48:39', '2024-08-01 10:48:39'),
(31, '9', '2024-11-11', '59', '1', '1', '2024-11-11 05:19:24', '2024-11-11 05:19:24'),
(32, '9', '2024-11-11', '55', '2', '1', '2024-11-11 05:19:26', '2024-11-11 05:19:26'),
(33, '9', '2024-11-11', '53', '1', '1', '2024-11-11 05:19:28', '2024-11-11 05:19:28'),
(34, '9', '2024-11-11', '52', '1', '1', '2024-11-11 05:19:30', '2024-11-11 05:19:30'),
(35, '9', '2024-11-11', '50', '1', '1', '2024-11-11 05:19:49', '2024-11-11 05:19:49'),
(36, '9', '2024-11-11', '49', '1', '1', '2024-11-11 05:19:50', '2024-11-11 05:19:50'),
(37, '9', '2024-11-11', '48', '1', '1', '2024-11-11 05:19:51', '2024-11-11 05:19:51'),
(38, '9', '2024-11-11', '47', '1', '1', '2024-11-11 05:19:53', '2024-11-11 05:19:53'),
(39, '6', '2024-11-11', '213', '1', '1', '2024-11-11 05:20:10', '2024-11-11 05:20:10');

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
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `is_role` varchar(255) NOT NULL DEFAULT '3' COMMENT '1: Admin, 2: Teacher, 3: Student, 4: Parent',
  `admission_number` varchar(255) DEFAULT NULL,
  `roll_number` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `id_number` varchar(20) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `probation_date` date DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `probation_status` varchar(255) DEFAULT '0',
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
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `phone`, `is_role`, `admission_number`, `roll_number`, `class_id`, `gender`, `occupation`, `date_of_birth`, `id_number`, `age`, `address`, `admission_date`, `probation_date`, `work_experience`, `qualification`, `p_address`, `bank_name`, `bank_account`, `probation_status`, `marital_status`, `previous_school`, `document_file`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `is_delete`, `status`, `academic_year_id`, `note`) VALUES
(1, 2, 'Super Admin', 'IT', 'itcode08@gmail.com', '79294607', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dAsu6fAI.TStEPJ5Kz2nXO5MyTl9OCgt0OzRTtaoi0VYOvO07wnEy', 'NEdE21Gnzo4ynm8GBJAUeAA1b9R8Mg2HjtASeqTe14OPSWXxJv', NULL, '2024-12-02 08:51:47', '20231028013754.jpg', '10', 0, NULL, NULL),
(23, 2, 'Welile', 'Tsabedze', 'hr.mtfombeniinv@swazi.net', '76078888', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$maB90oPzESD7AdKZTf2YHe6FeNyH26TAy082CjKmtxHdC/WQvJxiS', 'n5VZkKjO0lAeOtPw9kYQmapiqmp0HPcag4GvuBnvNq1d3jr9Us', '2024-05-25 17:58:08', '2024-11-05 08:37:08', NULL, '0', 0, NULL, NULL),
(28, 2, 'Nosipho', 'Ngwenya', NULL, '+26876187925', '5', NULL, NULL, NULL, 'Female', '15', NULL, '', NULL, 'Goboyane Next to Distillers', '2024-02-12', '2024-05-12', NULL, NULL, NULL, '', '', '1', '', NULL, NULL, NULL, NULL, 'BVeBtK4IlSnGCLeI6bb8gUBfLvE4hmWnA1ip2HX9BAJmohNJQ1', '2024-05-26 14:50:37', '2024-11-19 11:10:31', NULL, '1', 0, NULL, NULL),
(30, NULL, 'Aurelio', 'Dos Santos', NULL, '76740361', '5', NULL, NULL, NULL, 'Male', '5', NULL, '', NULL, 'Ndzevane', '2024-01-18', '2024-04-18', NULL, NULL, NULL, '', '', '0', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-05-26 15:02:06', '2024-07-31 12:03:37', NULL, '0', 0, NULL, NULL),
(31, NULL, 'Ayanda', 'Ngwenya', NULL, '+26878527864', '5', NULL, NULL, NULL, 'Male', '6', '1990-12-11', '9012116100013', NULL, 'Goboyane Next to Distillers', '2024-04-02', '2024-07-02', NULL, NULL, NULL, 'FNB', '6298130393', '0', 'Single', NULL, '20240604084542.pdf', NULL, NULL, NULL, '2024-05-26 17:21:29', '2024-07-31 12:03:25', '20240527100316.jpg', '0', 0, NULL, NULL),
(33, NULL, 'Lindokuhle', 'Dlamini', NULL, '76900978', '5', '993', '8.96', 11, 'Female', '20', '1992-05-29', '9205291100176', '31', 'Mahlabaneni', '2024-05-09', '2024-08-09', NULL, NULL, NULL, '', '', '0', 'Single', 'Vusikhaya', NULL, NULL, NULL, NULL, '2024-05-27 03:54:15', '2024-09-16 07:43:52', NULL, '0', 0, '', NULL),
(34, NULL, 'Khetsiwe Snikiwe', 'Dlamini', NULL, '26876392575', '3', '789', '11.98', 11, 'Female', NULL, '1979-10-26', '7910261100575', '44', 'Goboyane', '2024-01-22', '2024-04-22', NULL, '5', NULL, '', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-05-27 04:07:50', '2024-07-31 07:38:53', NULL, '0', 0, '', NULL),
(35, NULL, 'Andreas M', 'Sigudla', NULL, '76047444 / 78091058', '5', NULL, NULL, NULL, 'Male', '8', '1967-03-03', '7603036100124', NULL, 'Lismore Lodge', '2024-04-26', '2024-07-26', NULL, NULL, NULL, '', '', '0', 'Married', NULL, NULL, NULL, NULL, NULL, '2024-05-27 04:20:34', '2024-07-31 12:03:01', '20240527095424.png', '0', 0, NULL, NULL),
(36, NULL, 'Gcinile', 'Mthembu', NULL, '78391545', '3', '91', '13.20', 3, 'Female', NULL, '1991-11-21', '9112116100013', '32', 'Mhlabaneni', '2024-03-05', '2024-06-05', NULL, '', NULL, '', '', '0', NULL, 'Mtfombeni Investment', NULL, NULL, NULL, NULL, '2024-05-27 05:09:40', '2024-06-27 09:08:34', NULL, '1', 0, '', NULL),
(37, NULL, 'Rosewell', 'Mziyako', 'managers.mtfombeniinv@swazi.net', '79323250', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '$2y$10$u1vl9Q1QSUe3rYA0hsf9XuXl9vAGEtAS3s7eqHfokzbYol5dz/PHS', 'pCkLrYdZoe2xT5gAOTmNwHDnG13CTRIAdlKX85w7dhpVR8nrG3BOjYw18hLo', '2024-05-27 06:10:56', '2024-07-31 13:54:32', NULL, '0', 0, NULL, NULL),
(38, NULL, 'Rosewell Simanga', 'Mziyako', NULL, '+268 76323250', '5', NULL, NULL, NULL, 'Male', '9', '1964-12-07', '6407186100104', NULL, 'Portion 13 of farm Picardie 457.', '2021-02-01', '2021-05-01', NULL, NULL, NULL, '', '', '1', 'Married', NULL, NULL, NULL, NULL, NULL, '2024-05-27 06:43:28', '2024-07-31 12:02:47', '2024052708432618tmixwca71nfvzyjjcm.jpg', '0', 0, NULL, NULL),
(39, NULL, 'Carol Nini', 'Sibandze', NULL, '+26878026707', '5', NULL, NULL, NULL, 'Female', '10', '1975-04-20', '7504201100181', NULL, 'Portion 13 of farm Picardie 457.', '1995-12-01', '1996-03-01', NULL, NULL, NULL, '', '', '1', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-05-27 06:56:40', '2024-07-31 12:02:33', NULL, '0', 0, NULL, NULL),
(40, NULL, 'Hlobsile', 'Gwebu', NULL, '78357452', '5', NULL, NULL, NULL, 'Female', '11', '1982-07-05', '8207051100587', NULL, 'Mahlabaneni', '2012-01-12', '2012-04-12', NULL, NULL, NULL, '', '', '1', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-05-27 08:45:50', '2024-08-14 07:56:36', NULL, '0', 0, NULL, NULL),
(41, NULL, 'Thaboluhle', 'Matsenjwa', NULL, '26876425947', '3', '227', '11.98', 9, 'Female', NULL, '1989-02-14', '8902141101104', '', 'Mahlabaneni', '2023-05-08', '2023-08-08', NULL, NULL, NULL, NULL, NULL, '0', NULL, 'Kalamazoo', NULL, NULL, NULL, NULL, '2024-05-27 11:38:36', '2024-05-27 11:48:50', NULL, '1', 0, '', NULL),
(43, NULL, 'Andreas', 'Sigudla', 'sigudlaandreas@gmail.com', '76047444', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '$2y$10$AnyACaZmGbnlp3iQe5qg2.wBXDz53Z4cOE3Kz9033USEyFaOl.idi', 'UxujVYWcoSnvPwYFzy60hxHfsaX3WF90pSsOFVsi9l357wiLtWVhZvCkNYfr', '2024-05-27 11:45:28', '2024-11-19 11:11:14', NULL, '1', 0, NULL, NULL),
(44, NULL, 'Thembi', 'Mahlangu', NULL, '26878183146', '3', '66', '13.17', 9, 'Female', NULL, '1992-11-19', '9211191100076', '32', 'Goboyane', '2022-10-10', '2023-01-10', NULL, '7', NULL, '', '', '1', NULL, 'Illovo', NULL, NULL, NULL, NULL, '2024-05-27 11:46:48', '2024-08-01 12:39:18', NULL, '0', 0, '', NULL),
(45, NULL, 'Nontobeko', 'Mthembu', NULL, '26878501273', '3', '875', '8.98', 9, 'Female', NULL, '1988-06-13', '8806131100531', '35', 'Mayaluka', '2024-03-04', '2024-06-04', NULL, NULL, NULL, NULL, NULL, '0', NULL, 'was and presitends', NULL, NULL, NULL, NULL, '2024-05-27 11:50:52', '2024-07-31 06:13:32', NULL, '1', 0, '', NULL),
(46, NULL, 'Thobekile', 'Sikhondze', NULL, '26876590730', '3', '874', '8.98', 9, 'Female', NULL, '2002-06-17', '0206172100615', '21', 'Big Bend', '2024-03-04', '2024-06-04', NULL, NULL, NULL, NULL, NULL, '0', NULL, 'Dubazala Investments', NULL, NULL, NULL, NULL, '2024-05-27 11:55:13', '2024-07-31 06:13:19', NULL, '1', 0, '', NULL),
(47, NULL, 'Xolile', 'Dlamini', NULL, '26878254261', '3', '817', '13.17', 9, 'Female', NULL, '1986-02-02', '8602021101451', '38', 'Kashoba', '2024-02-08', '2024-05-08', NULL, '10', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-27 12:02:55', '2024-08-01 11:19:02', NULL, '0', 0, '', NULL),
(48, NULL, 'Thobsile', 'Magagula', NULL, '26876640571', '3', '879', '13.17', 9, 'Female', NULL, '1988-11-18', '8811181100019', '35', 'Nkilongo', '2024-03-04', '2024-06-04', NULL, '10', NULL, 'Nedbank', '', '1', NULL, 'EBC', NULL, NULL, NULL, NULL, '2024-05-27 12:06:40', '2024-08-01 11:16:28', NULL, '0', 0, '', NULL),
(49, NULL, 'Gcebile', 'Sibandze', NULL, '26876701689', '3', '640', '13.17', 9, 'Female', NULL, '2003-10-13', '0310032100440', '', 'Goboyane', '2023-11-02', '2024-02-02', NULL, '25', NULL, '', '', '1', NULL, '', NULL, NULL, NULL, NULL, '2024-05-27 12:49:04', '2024-08-01 12:34:32', NULL, '0', 0, '', NULL),
(50, NULL, 'Tengetile', 'Dlamini', NULL, '26876646868', '3', '103', '14.52', 9, 'Female', NULL, '1994-10-14', '9410141100059', '30', 'Goboyane', '2024-02-05', '2024-05-05', NULL, '24', NULL, 'Nedbank', '', '1', NULL, 'Davin scot clothing', NULL, NULL, NULL, NULL, '2024-05-27 12:53:05', '2024-08-01 11:20:39', NULL, '0', 0, '', NULL),
(52, NULL, 'Thobile', 'Mngometulu', NULL, '26878178384', '3', '828', '13.17', 9, 'Female', NULL, '1984-06-12', '8406121100847', '40', 'Game 5', '2024-02-08', '2024-05-08', NULL, '10', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-05-27 12:55:40', '2024-08-01 11:17:10', NULL, '0', 0, '', NULL),
(53, NULL, 'Lindiwe', 'Dlamini', NULL, '76278500', '3', '818', '13.17', 9, 'Female', NULL, '2002-07-16', '0207162100433', '21', 'Ka Goboyane', '2024-02-07', '2024-05-07', NULL, '25', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-05-28 04:18:07', '2024-08-01 11:17:45', NULL, '0', 0, '', NULL),
(55, NULL, 'Thembi', 'Mdvoti', NULL, '26876557166', '3', '4', '16.34', 9, 'Female', NULL, '1982-01-05', '8201051100804', '42', 'Goboyane', '2021-04-10', '2021-07-10', NULL, '18', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-28 04:41:59', '2024-08-01 11:59:01', NULL, '0', 0, '', NULL),
(59, NULL, 'Wonder', 'Simelane', NULL, '26876586251', '3', '209', '16.34', 9, 'Male', NULL, '1983-10-31', '8310086100521', '40', 'Game 5', '2023-07-11', '2023-10-11', NULL, '18', NULL, 'Nedbank', '', '1', NULL, 'Matsapha', NULL, NULL, NULL, NULL, '2024-05-28 04:44:56', '2024-08-01 11:58:14', NULL, '0', 0, '', NULL),
(60, NULL, 'Lomthandazo', 'Hlophe', NULL, '26878633071', '3', '191', '13.17', 7, 'Female', NULL, '1997-06-17', '9706171100421', '26', 'Tractor pool', '2023-06-21', '2023-09-21', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-28 04:50:16', '2024-08-01 12:06:42', NULL, '0', 0, '', NULL),
(61, NULL, 'Nelsiwe', 'Ngcamphalala', NULL, '76418891', '5', NULL, NULL, NULL, 'Female', '12', '1984-10-14', '8410141100233', NULL, 'Mahlabaneni', '2024-01-08', '2024-04-08', NULL, NULL, NULL, '', '', '0', 'Married', NULL, NULL, NULL, NULL, NULL, '2024-05-30 03:56:42', '2024-11-19 11:10:17', NULL, '1', 0, NULL, NULL),
(62, NULL, 'Nkosikhona Oliva', 'Gumedze', NULL, '78098071', '3', '206', '14.52', 7, 'Male', NULL, '1992-05-06', '920506600740', '32', 'game 5', '2024-03-24', '2024-06-24', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'GAINT', NULL, NULL, NULL, NULL, '2024-05-30 03:57:30', '2024-08-01 11:56:04', NULL, '0', 0, '', NULL),
(63, NULL, 'Nomfundo', 'Chauke', NULL, '76501644', '3', '664', '14.52', 7, 'Female', NULL, '1999-02-01', '9901021100458', '25', 'game 5', '2023-11-17', '2024-02-17', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 04:01:35', '2024-08-01 12:31:33', NULL, '0', 0, '', NULL),
(65, NULL, 'Velile', 'Mamba', NULL, '76188799', '3', '609', '14.52', 6, 'Female', NULL, '2000-11-24', '0011242100565', '23', 'game 5', '2023-09-22', '2023-12-22', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 04:07:00', '2024-08-01 12:26:21', NULL, '0', 0, '', NULL),
(66, NULL, 'Khumbuzile', 'Nkambule', NULL, '78221908', '3', '173', '14.52', 7, 'Female', NULL, '2001-09-22', '010922100132', '22', 'Goboyane', '2023-07-10', '2023-10-10', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 04:10:18', '2024-08-01 12:30:51', NULL, '0', 0, '', NULL),
(67, NULL, 'Temvelo', 'Ngubane', NULL, '78116353', '3', '842', '13.17', 7, 'Female', NULL, '2001-01-09', '0101092100706', '23', 'Magwanyane', '2024-02-12', '2024-05-12', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'FTM Textile', NULL, NULL, NULL, NULL, '2024-05-30 04:14:30', '2024-08-01 11:02:54', NULL, '0', 0, '', NULL),
(68, NULL, 'Sibonelo', 'Nsimbini', NULL, '78729848', '3', '45', '14.52', 2, 'Female', NULL, '1988-12-27', '8812271100646', '35', 'Goboyane', '2022-06-01', '2022-09-01', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-30 04:19:22', '2024-08-01 12:00:29', NULL, '0', 0, '', NULL),
(69, NULL, 'Mercy', 'Khoza', NULL, '76280598', '3', '845', '14.52', 7, 'Female', NULL, '1969-05-05', '6905051100083', '55', 'LL', '2024-02-14', '2024-05-14', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'JUNITS', NULL, NULL, NULL, NULL, '2024-05-30 05:09:51', '2024-08-01 11:53:07', NULL, '0', 0, '', NULL),
(70, NULL, 'Colile', 'Matsenjwa', NULL, '78226415', '3', '164', '14.52', 7, 'Female', NULL, '1988-03-12', '8803121100266', '36', 'Goboyane', '2023-06-12', '2023-09-12', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:14:20', '2024-08-01 11:52:26', NULL, '0', 0, '', NULL),
(71, NULL, 'Gugu', 'Mbingo', NULL, '76931630', '3', '671', '14.52', 6, 'Female', NULL, '1990-03-09', '9003090011482', '34', 'Mayaluka', '2023-11-17', '2024-02-17', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:19:22', '2024-08-01 12:28:01', NULL, '0', 0, '', NULL),
(72, NULL, 'Nobuhle', 'Mvubu', NULL, '78707471', '3', '542', '14.52', 6, 'Female', NULL, '1999-01-01', '9901011101052', '25', 'Mayaluka', '2023-08-21', '2023-11-21', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:24:13', '2024-08-01 12:32:02', NULL, '0', 0, '', NULL),
(73, NULL, 'Nokuthula', 'Ginindza', NULL, '76472145', '3', '60', '14.52', 7, 'Female', NULL, '1987-07-08', '8708071100374', '36', 'Game 5', '2022-10-10', '2023-01-10', NULL, '19', NULL, '', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-30 05:29:07', '2024-08-01 11:53:41', NULL, '0', 0, '', NULL),
(77, NULL, 'Gabsile', 'Mdluli', NULL, '76418001', '3', '95', '14.52', 6, 'Female', NULL, '1982-08-10', '820810', '41', 'Goboyane', '2018-03-19', '2018-06-19', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:34:44', '2024-07-31 07:20:32', NULL, '0', 0, '', NULL),
(78, NULL, 'Zandile', 'Mazibuko', NULL, '78033867', '3', '644', '13.17', 2, 'Female', NULL, '2001-05-13', '010513200121', '23', 'Goboyane', '2023-11-17', '2024-02-17', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:41:20', '2024-08-01 12:10:51', NULL, '0', 0, '', NULL),
(79, NULL, 'Winile', 'Mdluli', NULL, '76937584', '3', '32', '14.52', 6, 'Female', NULL, '1988-02-12', '880212', '36', 'Mahlabaneni', '2010-01-04', '2010-04-04', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:44:06', '2024-08-01 11:43:43', NULL, '0', 0, '', NULL),
(81, NULL, 'Happiness', 'Simelane', NULL, '76682761', '3', '973', '13.20', 6, 'Female', NULL, '1988-09-07', '8809071100958', '35', 'Mayaluka', '2024-04-11', '2024-07-11', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'New life', NULL, NULL, NULL, NULL, '2024-05-30 05:53:23', '2024-08-01 11:44:32', NULL, '0', 0, '', NULL),
(82, NULL, 'Siphiwe', 'Magagula', NULL, '76531239', '3', '82', '14.52', 6, 'Female', NULL, '1975-09-23', '7509231100168', '48', 'Mkhalamfene', '2023-01-02', '2023-04-02', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 05:57:27', '2024-08-01 11:46:53', NULL, '0', 0, '', NULL),
(83, NULL, 'Nonhlanhla', 'Khumalo', NULL, '76207496', '3', '26', '14.52', 2, 'Female', NULL, '1984-06-04', '8406041100257', '39', 'Goboyane', '2022-04-05', '2022-07-05', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 06:01:42', '2024-08-01 11:37:38', NULL, '0', 0, '', NULL),
(86, NULL, 'Nosipho', 'Masango', NULL, '78525057', '3', '643', '14.52', 7, 'Female', NULL, '2002-05-13', '020513200327', '22', 'Goboyane', '2023-11-07', '2024-02-07', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-30 06:17:11', '2024-08-01 11:54:57', NULL, '0', 0, '', NULL),
(92, NULL, 'Siphiwe', 'Gumbi', NULL, '76364401', '3', '154', '14.52', 7, 'Female', NULL, '1985-11-29', '8511291100350', '38', 'Game 5', '2023-06-13', '2023-09-13', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 06:37:23', '2024-08-01 11:47:51', NULL, '0', 0, '', NULL),
(94, NULL, 'Mbali', 'Mhlanga', NULL, '76264052', '3', '775', '14.52', 6, 'Female', NULL, '2002-11-21', '0211212100393', '21', 'Big bend', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 06:43:48', '2024-08-01 10:57:49', NULL, '0', 0, '', NULL),
(96, NULL, 'Londiwe', 'LUkhele', NULL, '78019435', '3', '021', '11.98', 6, 'Female', NULL, '2000-02-08', '0002082100344', '24', 'Goboyane', '2022-08-16', '2022-11-16', NULL, '30', NULL, '', '', '0', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 06:46:07', '2024-08-07 03:46:11', NULL, '0', 0, '', NULL),
(97, NULL, 'Bawinile', 'Ndwandwe', NULL, '76282805', '3', '52', '14.52', 7, 'Female', NULL, '1980-05-18', '800518100347', '44', 'Big bend', '2022-09-15', '2022-12-15', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 06:53:10', '2024-08-01 12:26:43', NULL, '0', 0, '', NULL),
(98, NULL, 'Cebsile', 'Mvubu', NULL, '76586985', '3', '855', '14.52', 8, 'Female', NULL, '1994-02-24', '940224', '30', 'Mayaluka', '2024-03-13', '2024-06-13', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 06:58:38', '2024-07-31 08:40:42', NULL, '0', 0, '', NULL),
(100, NULL, 'Nonsikelelo', 'Gamedze', NULL, '76910411', '3', '649', '13.17', 6, 'Female', NULL, '2002-02-10', '0202102100353', '22', 'Mayaluka', '2023-11-17', '2024-02-17', NULL, '12', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:00:49', '2024-08-01 11:09:22', NULL, '0', 0, '', NULL),
(101, NULL, 'Mamba', 'Simanga', NULL, '78604277', '3', '784', '14.52', 7, 'Male', NULL, '1998-03-30', '9803306100650', '26', 'Nkilongo', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'Crime stop', NULL, NULL, NULL, NULL, '2024-05-30 07:03:32', '2024-08-01 11:01:53', NULL, '0', 0, '', NULL),
(103, NULL, 'Sonia', 'Mthembu', NULL, '78574662', '3', '599', '13.17', 2, 'Female', NULL, '1997-10-30', '971030100645', '26', 'Game 5', '2023-10-17', '2024-01-17', NULL, '11', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:06:25', '2024-08-01 12:40:00', NULL, '0', 0, '', NULL),
(104, NULL, 'Nelsiwe', 'Vilakati', NULL, '76353462', '3', '43', '14.52', 7, 'Female', NULL, '1978-09-20', '7809201100291', '45', 'Mayaluka', '2022-05-10', '2022-08-10', NULL, '27', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-30 07:09:39', '2024-08-01 11:57:23', NULL, '0', 0, '', NULL),
(105, NULL, 'Gcinile', 'Dlamini', NULL, '76795210', '3', '848', '13.17', 7, 'Female', NULL, '1997-12-10', '9712101100460', '26', 'Garage', '2024-02-14', '2024-05-14', NULL, '8', NULL, 'Nedbank', '', '0', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:11:53', '2024-08-01 11:12:55', NULL, '0', 0, '', NULL),
(106, NULL, 'Thandi', 'Mdluli', NULL, '79803525/ 78603885', '3', '703', '14.52', 7, 'Female', NULL, '1978-08-18', '7808181100164', '45', 'Goboyane', '2024-01-11', '2024-04-11', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'Newcastle', NULL, NULL, NULL, NULL, '2024-05-30 07:17:05', '2024-08-01 11:02:29', NULL, '0', 0, '', NULL),
(107, NULL, 'Thabo', 'Xaba', NULL, '78298515', '3', '783', '14.52', 7, 'Male', NULL, '1996-12-23', '961223', '27', 'Game 5', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:18:59', '2024-08-01 11:03:34', NULL, '0', 0, '', NULL),
(109, NULL, 'Phephile', 'Hlophe', NULL, '76772294', '3', '803', '14.52', 2, 'Female', NULL, '1993-07-06', '9307061100681', '30', 'Big bend', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'GAINT', NULL, NULL, NULL, NULL, '2024-05-30 07:24:04', '2024-08-01 12:20:36', NULL, '0', 0, '', NULL),
(110, NULL, 'Mphikeleli', 'Vilakati', NULL, '78459619', '3', '785', '14.52', 6, 'Male', NULL, '2005-01-01', '0501017100907', '19', 'Game 5', '2024-01-22', '2024-04-22', NULL, '19', NULL, '', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:26:26', '2024-08-01 10:58:24', NULL, '0', 0, '', NULL),
(111, NULL, 'Rita', 'Sithole', NULL, '76726525', '3', '10', '14.52', 2, 'Female', NULL, '1968-12-04', '6812041100365', '55', 'Goboyane', '2021-06-13', '2021-09-13', NULL, '12', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:28:39', '2024-08-01 11:24:52', NULL, '0', 0, '', NULL),
(113, NULL, 'Bongekile', 'Zwane', NULL, '76984887', '3', '158', '14.52', 6, 'Female', NULL, '1994-07-21', '9407211100092', '29', 'Goboyane', '2023-06-09', '2023-09-09', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:33:09', '2024-08-01 12:22:21', NULL, '0', 0, '', NULL),
(114, NULL, 'Gugu', 'Magagula', NULL, '76706255', '3', '799', '14.52', 6, 'Female', NULL, '1990-06-18', '900618', '33', 'Goboyane', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:35:15', '2024-08-01 11:00:36', NULL, '0', 0, '', NULL),
(115, NULL, 'Mbali', 'Zwane', NULL, '78333921', '3', '572', '14.52', 2, 'Female', NULL, '1987-03-01', '870301', '37', 'Game 5', '2023-09-18', '2023-12-18', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-05-30 07:37:46', '2024-08-01 12:01:57', NULL, '0', 0, '', NULL),
(116, NULL, 'Phumzile', 'Matsenjwa', NULL, '76511240', '3', '815', '14.52', 7, 'Female', NULL, '1978-11-16', '7811161100022', '45', 'Big bend', '2024-01-22', '2024-04-22', NULL, '27', NULL, '', '', '0', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:40:55', '2024-08-01 12:34:09', NULL, '0', 0, '', NULL),
(117, NULL, 'Phindile', 'Gamedze', NULL, '76492634', '3', '12', '14.52', 2, 'Female', NULL, '1979-11-21', '7911211100418', '44', 'Goboyane', '2021-03-03', '2021-06-03', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'none', NULL, NULL, NULL, NULL, '2024-05-30 07:44:48', '2024-08-01 11:38:32', NULL, '0', 0, '', NULL),
(119, 0, 'Angel', 'Sihlongonyane', NULL, '78318023', '3', '15', '13.20', 2, 'Female', NULL, '1994-01-21', '94012311100491', '30', 'Goboyane', '2022-04-10', '2022-07-10', NULL, '19', NULL, '', '', '1', NULL, 'DEVISCOT', NULL, NULL, NULL, NULL, '2024-05-30 08:56:27', '2024-07-31 07:51:35', NULL, '0', 0, '', NULL),
(120, 0, 'Hlobsile', 'Gwebu', 'admin.mtfombeni@swazi.net', '78357452', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '$2y$10$LwYg9QeBxscn5OS17GISLujw6LriFUxg8MxidtoAU2ry5Z7srXjrK', NULL, '2024-05-30 09:00:52', '2024-05-30 09:00:52', NULL, '0', 0, NULL, NULL),
(123, 0, 'MARVIS', 'Dlamini', NULL, '78476122', '2', NULL, NULL, NULL, 'Female', '', '1962-08-23', '6208231100028', NULL, 'Mahlabaneni', '2024-03-04', '2024-06-04', '7 YEARS', 'QC', 'Piggs peak', NULL, NULL, '', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-05-30 11:43:59', '2024-06-27 09:07:41', NULL, '1', 0, NULL, 'NONE'),
(124, 0, 'Judith Thabile', 'Dasilva', NULL, '78365022', '3', '549', '74.88', 10, 'Female', NULL, '1979-08-15', '7908151100846', '44', 'Mayaluka', '2023-08-20', '2023-11-20', NULL, '', NULL, NULL, NULL, '1', NULL, 'PHOENIX', '', NULL, NULL, NULL, '2024-05-30 11:56:16', '2024-06-01 10:13:30', NULL, '0', 0, '', NULL),
(125, 0, 'Sizwe', 'Vilakati', NULL, '76566445', '3', '141', '14.86', 14, 'Male', NULL, '2001-07-28', '0107287100732', '22', 'Game 5', '2023-06-17', '2023-09-17', NULL, '23', NULL, 'Swazibank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-06 06:25:36', '2024-07-31 08:04:51', NULL, '0', 0, '', NULL),
(126, 0, 'Luyanda', 'Dlamini', NULL, '76648890', '3', '184', '14.52', 7, 'Female', NULL, '1999-10-15', '9910151100303', '24', 'Goboyane', '2020-03-01', '2020-06-01', NULL, '19', NULL, 'FNB', '', '1', NULL, 'MTN', NULL, NULL, NULL, NULL, '2024-06-06 06:31:14', '2024-08-01 11:10:17', NULL, '0', 0, '', NULL),
(127, 0, 'Mphikeleli', 'Vilakati', NULL, '78459619', '3', '785', '11.98', 7, 'Male', NULL, '2005-10-01', '0501017100900', '18', 'GAME 5', '2024-01-22', '2024-04-22', NULL, 'Machinist', NULL, 'NEDBANK', '12991495507', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-06 06:40:14', '2024-07-04 12:51:19', NULL, '1', 0, '', NULL),
(130, 0, 'Thuli', 'Simelane', NULL, '76130269', '3', '579', '14.52', 7, 'Female', NULL, '1989-12-26', '8912261100', '34', 'Goboyane', '2023-08-06', '2023-11-06', NULL, '19', NULL, 'Swazibank', '', '1', NULL, 'Hlangano Hose', NULL, NULL, NULL, NULL, '2024-06-06 07:01:46', '2024-08-01 12:28:34', NULL, '0', 0, '', NULL),
(131, 0, 'Hlon\'phile', 'Mavimbela', NULL, '76946984', '3', '771', '13.20', 7, 'Female', NULL, '1989-03-23', '8903231011', '35', 'Goboyane', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'Swazibank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-06 07:09:06', '2024-08-01 10:55:36', NULL, '0', 0, '', NULL),
(132, 0, 'Prudence', 'Dlamini', NULL, '78603871', '3', '159', '14.52', 6, 'Female', NULL, '1974-10-10', '7410101011', '49', 'Game 5', '2023-05-10', '2023-08-10', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'Union investments', NULL, NULL, NULL, NULL, '2024-06-06 07:14:12', '2024-08-01 11:45:35', NULL, '0', 0, '', NULL),
(133, 0, 'Phiwe', 'Shongwe', NULL, '76972704', '3', '34', '14.52', 2, 'Female', NULL, '1991-02-14', '9102141011', '33', 'Siphofaneni', '2022-03-02', '2022-06-02', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'ZHEYONG', NULL, NULL, NULL, NULL, '2024-06-06 07:23:38', '2024-08-01 11:42:18', NULL, '0', 0, '', NULL),
(134, 0, 'Khetsiwe', 'Mhlanga', NULL, '76615042', '3', '100', '14.52', 7, 'Female', NULL, '1989-03-13', '8903131100056', '35', 'GAME 5', '2024-06-04', '2024-09-04', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'Hos', NULL, NULL, NULL, NULL, '2024-06-06 07:39:53', '2024-08-01 11:54:12', NULL, '0', 0, '', NULL),
(135, 0, 'Nonsikelelo', 'Shabangu', NULL, '76651301', '3', '961', '13.20', 7, 'Female', NULL, '1999-11-24', '9911241100154', '24', 'Goboyane', '2024-04-14', '2024-07-14', NULL, '19', NULL, 'FNB', '', '0', NULL, 'FastEast', NULL, NULL, NULL, NULL, '2024-06-06 07:45:02', '2024-08-01 11:32:18', NULL, '0', 0, '', NULL),
(136, 0, 'Zinhle', 'Gamedze', NULL, '78033084', '3', '949', '13.20', 2, 'Female', NULL, '1997-04-14', '9704141100246', '27', 'Lismore', '2024-04-12', '2024-07-12', NULL, '19', NULL, 'NEDBANK', '', '0', NULL, 'Kasumi', NULL, NULL, NULL, NULL, '2024-06-06 08:01:46', '2024-07-31 07:47:55', NULL, '0', 0, '', NULL),
(137, 0, 'Hlob\'sile', 'Matsebula', NULL, '76591041', '3', '953', '14.52', 6, 'Female', NULL, '1988-06-06', '88066061100451', '36', 'GAME 5', '2024-05-12', '2024-08-12', NULL, '19', NULL, 'FNB', '', '1', NULL, 'Newlife- Matsapha', NULL, NULL, NULL, NULL, '2024-06-06 08:09:11', '2024-08-01 11:43:22', NULL, '0', 0, '', NULL),
(138, 0, 'Nonduduzo', 'Mkhondvo', NULL, '76849512', '3', '910', '14.52', 7, 'Female', NULL, '1999-04-03', '9904031100856', '25', 'GAME 5', '2024-03-18', '2024-06-18', NULL, '19', NULL, 'FNB', '', '1', NULL, 'Crusher\'s fashion', NULL, NULL, NULL, NULL, '2024-06-06 08:25:27', '2024-08-01 12:30:03', NULL, '0', 0, '', NULL),
(139, 0, 'Nokubonga', 'Lukhele', NULL, '76517757', '3', '981', '9.85', 2, 'Female', NULL, '2000-05-10', '000510212566', '24', 'GAME 5', '2024-04-16', '2024-07-16', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'S\'phamadla ,Matsapha', NULL, NULL, NULL, NULL, '2024-06-06 08:31:09', '2024-08-01 12:07:30', NULL, '0', 0, '', NULL),
(140, 0, 'Sebenele', 'Simelane', NULL, '76973764', '3', '477', '14.52', 6, 'Female', NULL, '2002-04-05', '0204052100607', '22', 'GAME 5', '2023-08-04', '2023-11-04', NULL, '19', NULL, 'Swazibank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-06 11:16:16', '2024-08-01 12:25:33', NULL, '0', 0, '', NULL),
(141, 0, 'Sonto', 'Shongwe', NULL, '76797501', '3', '909', '13.17', 2, 'Female', NULL, '1990-09-30', '9009301100683', '33', 'GAME 5', NULL, '2024-11-01', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-06 11:22:40', '2024-08-01 12:03:18', NULL, '0', 0, '', NULL),
(142, 0, 'Nokuphila', 'Lukhele', NULL, '76785911', '3', '886', '14.52', 6, 'Female', NULL, '1996-04-15', '9604151100484', '28', 'Goboyane', '2024-03-12', '2024-06-12', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-06 11:26:58', '2024-08-01 12:23:02', NULL, '0', 0, '', NULL),
(143, 0, 'Cal\'sile', 'Kunene', NULL, '76402602', '3', '978', '14.52', 2, 'Female', NULL, '1990-01-20', '9001201101036', '34', 'GAME 5', '2024-04-14', '2024-07-14', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'S\'phamandla', NULL, NULL, NULL, NULL, '2024-06-06 11:33:50', '2024-07-31 09:10:16', NULL, '0', 0, '', NULL),
(144, 0, 'Mandlekhosi', 'Dlamini', NULL, '79260457', '3', '835', '14.52', 7, 'Male', NULL, '1999-01-21', '9901216100420', '25', 'GAME 5', '2024-02-12', '2024-05-12', NULL, '19', NULL, 'NEDBANK', '', '1', NULL, 'Simunye, RES', NULL, NULL, NULL, NULL, '2024-06-06 11:41:09', '2024-08-01 11:27:39', NULL, '0', 0, '', NULL),
(145, 0, 'Tengetile', 'Mthembu', NULL, '78311065', '3', '637', '14.52', 2, 'Female', NULL, '1996-07-22', '9607221100285', '27', 'Game 5', '2023-10-25', '2024-01-25', NULL, '19', NULL, 'Swazibank', '', '0', NULL, 'Manzini', NULL, NULL, NULL, NULL, '2024-06-06 11:49:05', '2024-08-01 12:04:36', NULL, '0', 0, '', NULL),
(147, 0, 'Audrey', 'Gama', NULL, '76191308', '3', '998', '13.20', 6, 'Female', NULL, '1989-03-14', '8903141100617', '35', '', '2024-06-10', '2024-09-10', NULL, '19', NULL, 'Ned Bank', '12991662640', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-06-07 11:36:32', '2024-08-02 09:26:07', NULL, '0', 0, '', NULL),
(148, 0, 'Nompilo', 'Shongwe', NULL, '76659499', '3', '1026', '13.20', 2, 'Female', NULL, '2000-01-04', '0001042100824', '24', 'Mbhekelweni', '2024-06-24', '2024-09-24', NULL, '27', NULL, 'Nedbank', '', '0', NULL, 'Great Spring', '20240624121745.pdf', NULL, NULL, NULL, '2024-06-24 09:59:24', '2024-08-01 11:36:17', NULL, '0', 0, '', NULL),
(149, 0, 'Ncamsile', 'Ndlovu', NULL, '76632181', '3', '1024', '13.20', 2, 'Female', NULL, '1979-11-11', '7911111101045', '44', 'Goboyane', '2024-06-25', '2024-09-25', NULL, '19', NULL, 'NEDBANK', '', '0', NULL, 'Zeng Yong', '20240624121703.pdf', NULL, NULL, NULL, '2024-06-24 10:09:10', '2024-07-31 09:07:46', NULL, '0', 0, '', NULL),
(153, 0, 'Ziyanda', 'Maliba', NULL, '76072950', '3', '1002', '13.17', 6, 'Female', NULL, '2002-06-26', '0212262100440', '22', 'New Village', '2024-06-12', '2024-09-12', NULL, '19', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-06-28 07:46:32', '2024-08-01 12:27:26', NULL, '0', 0, '', NULL),
(154, 0, 'Nomvula', 'Gina', NULL, '78136060', '3', '80', '14.52', 6, 'Female', NULL, '2001-09-12', '0109122100612', '22', 'Matata', '2023-01-08', '2023-04-08', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'Swatsi', NULL, NULL, NULL, NULL, '2024-06-28 07:51:17', '2024-08-01 11:49:32', NULL, '0', 0, '', NULL),
(155, 2, 'Nosipho', 'Sibandze', 'nosiphosibandzegoje@gmail.com', '76699288', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '$2y$10$w2WW8rAs1lr.WfBAMsxinO68fuxQWVLfPMz19jwlfbhSyO5ICNEaG', '47FCDj7WRObzy6skFvhl5cSBgXQF3tcHeSJnuWSQk3x0EKaiYhuI2XkCfUWP', '2024-07-01 05:37:51', '2024-08-02 12:52:01', NULL, '10', 0, NULL, NULL),
(156, 0, 'Lunga', 'Nkambule', NULL, '78673045', '3', '1037', '14.52', 7, 'Male', NULL, '1998-04-25', '9804256100461', '26', 'Goboyane', '2024-07-02', '2024-10-02', NULL, '19', NULL, 'nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 05:55:47', '2024-08-01 12:29:32', NULL, '0', 0, '', NULL),
(158, 0, 'Nomsa', 'Manyisa', NULL, '76964215', '3', '574', '9.85', 2, 'Female', NULL, '1998-04-05', '9804051100341', '26', 'Game 5', '2022-06-26', '2022-09-26', NULL, '12', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 06:47:27', '2024-07-31 09:05:14', NULL, '0', 0, '', NULL),
(159, 0, 'Duduzile Faith', 'Maseko', NULL, '76342148', '3', '1027', '9.85', 2, 'Female', NULL, '1975-11-24', '7511241100022', '48', 'Goboyane', '2024-06-25', '2024-09-25', NULL, '12', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 06:52:30', '2024-08-01 12:09:07', NULL, '0', 0, '', NULL),
(160, 0, 'Smangele', 'Simelane', NULL, '76736699', '3', '1032', '14.52', 2, 'Female', NULL, '1988-10-15', '8810151100108', '35', 'Lulakeni,Bigbend', '2024-06-25', '2024-09-25', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 06:54:53', '2024-07-31 09:03:54', NULL, '0', 0, '', NULL),
(161, 0, 'Nkosiyenzile', 'Zishwili', NULL, '76488400', '3', '1021', '9.85', 2, 'Female', NULL, '2002-11-25', '0211252100220', '21', 'Game 5', '2024-06-21', '2024-09-21', NULL, '12', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 07:06:47', '2024-08-01 11:08:15', NULL, '0', 0, '', NULL),
(162, 0, 'Smiso', 'Vilane', NULL, '78639067', '3', '1023', '9.85', 7, 'Female', NULL, '2002-03-25', '0203252100623', '22', 'Game 5', '2024-06-21', '2024-09-21', NULL, '12', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 07:16:46', '2024-07-31 09:02:58', NULL, '0', 0, '', NULL),
(163, 0, 'Ncamsile', 'Hlwatshwayo', NULL, '78687809', '3', '1020', '9.85', 7, 'Female', NULL, NULL, '', '', 'Goboyane', '2024-06-21', '2024-09-21', NULL, '12', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 07:20:05', '2024-07-31 09:02:09', NULL, '0', 0, '', NULL),
(164, 0, 'Lindokuhle', 'Zishwili', NULL, '76802635', '3', '1022', '9.85', 7, 'Female', NULL, '2000-04-22', '000222100705', '24', 'Goboyane', '2024-06-21', '2024-09-21', NULL, '16', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 07:27:48', '2024-08-01 11:14:00', NULL, '0', 0, '', NULL),
(165, 0, 'Dumsile', 'Hlatshwako', NULL, '76578333', '3', '1016', '9.85', 7, 'Female', NULL, '1984-02-12', '8402121100507', '40', 'Goboyane', '1984-06-21', '1984-09-21', NULL, '8', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 07:31:58', '2024-08-01 11:22:15', NULL, '0', 0, '', NULL),
(166, 0, 'Xoliswa', 'Dvuba', NULL, '76263621', '3', '1017', '9.85', 7, 'Female', NULL, NULL, '', '', 'Game 5', '2024-06-21', '2024-09-21', NULL, '8', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 07:47:35', '2024-07-31 08:59:48', NULL, '0', 0, '', NULL),
(167, 0, 'Gugu', 'Mpofana', NULL, '76547936', '2', NULL, NULL, NULL, 'Female', '', '1981-03-27', '8103271100467', NULL, 'Goboyane', '2024-06-18', '2024-09-18', '20 years', '', 'Goboyane', 'Standard bank', '9110006590929', '', 'Married', NULL, NULL, NULL, NULL, NULL, '2024-07-01 09:31:44', '2024-07-01 09:31:44', NULL, '0', 0, NULL, ''),
(168, 0, 'Temazomba', 'Dube', NULL, '78268517', '3', '1019', '9.85', 7, 'Female', NULL, '1999-02-09', '9902091100659', '25', 'Mankayane/Game 5', '2024-06-21', '2024-09-21', NULL, '11', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 11:28:39', '2024-08-01 11:15:51', NULL, '0', 0, '', NULL),
(169, 0, 'Sthembile', 'Mamba', NULL, '76725912', '3', '1041', '9.85', 2, 'Female', NULL, '1984-05-11', '8405111100346', '40', 'Mahlabaneni', '2024-07-02', '2024-10-02', NULL, '11', NULL, '', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 11:32:36', '2024-07-31 08:58:32', NULL, '0', 0, '', NULL),
(170, 0, 'Gcinile', 'Matsenjwa', NULL, '78405998', '3', '1040', '14.52', 6, 'Female', NULL, '1997-08-05', '9708051100302', '26', 'Lubuli', '2024-07-02', '2024-10-02', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-01 11:35:31', '2024-08-01 12:32:56', NULL, '0', 0, '', NULL),
(171, 0, 'Ncobile', 'Mkhonta', NULL, '76560061', '3', '27', '14.52', 7, 'Female', NULL, '1991-09-02', '9109021100490', '32', 'LL', '2022-05-11', '2022-08-11', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'Zheng Yong', NULL, NULL, NULL, NULL, '2024-07-08 03:39:13', '2024-08-01 11:55:32', NULL, '0', 0, '', NULL),
(172, 0, 'Xxxxx', 'Xxxxx', NULL, '85214785', '3', '88', 'Dddd', 5, 'Female', NULL, '2024-07-17', '77777777777777', '1', 'Duff 5eygtddyg6', '2024-07-11', '2024-10-11', NULL, 'Loader', NULL, 'Bfdc', 'E3324567990', '0', NULL, 'Gtd7h', NULL, NULL, NULL, NULL, '2024-07-12 07:40:01', '2024-07-12 07:40:11', NULL, '1', 0, '', NULL),
(173, 0, 'Thulsile', 'Vilakati', NULL, '78043878', '3', '621', '14.52', 2, 'Female', NULL, '1990-04-29', '900429000', '34', 'KaShoba', '2023-09-14', '2023-12-14', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'Newcastle (south Africa)', NULL, NULL, NULL, NULL, '2024-07-12 09:22:13', '2024-07-31 08:56:40', NULL, '0', 0, '', NULL),
(174, 0, 'Lindiwe', 'Magwaza', NULL, '79908675', '3', '957', '14.52', 2, 'Female', NULL, '1980-02-17', '8002170011405', '44', 'Matsetsa', '2024-07-15', '2024-10-15', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'Lismore lodge', NULL, NULL, NULL, NULL, '2024-07-12 09:22:25', '2024-07-31 08:56:12', NULL, '0', 0, '', NULL),
(175, 0, 'Khabonina', 'Simelane', NULL, '78380548', '3', '840', '13.20', 2, 'Female', NULL, '2000-11-28', '001128000', '23', 'Game 5', '2024-02-14', '2024-05-14', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-12 09:25:46', '2024-08-01 11:04:32', NULL, '0', 0, '', NULL),
(176, 0, 'Thulsile', 'Sibandze', NULL, '76753954', '3', '1008', '14.52', 2, 'Female', NULL, '1982-08-11', '8208111100450', '41', 'Mankayane', '2024-06-13', '2024-09-13', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'Lismore lodge', NULL, NULL, NULL, NULL, '2024-07-12 09:26:20', '2024-08-01 11:33:35', NULL, '0', 0, '', NULL),
(177, 0, 'Tebenguni', 'Simelane', NULL, '76750081', '3', '767', '13.17', 2, 'Female', NULL, '2003-05-28', '0305282100323', '21', 'Game 5', '2024-01-22', '2024-04-22', NULL, '19', NULL, 'FNB', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-12 09:28:49', '2024-08-01 10:56:46', NULL, '0', 0, '', NULL),
(178, 0, 'Andile', 'Ndlovu', NULL, '78270049', '3', '495', '14.52', 2, 'Female', NULL, '1992-10-02', '9210051100119', '31', 'Goboyane', '2018-07-12', '2018-10-12', NULL, '19', NULL, 'Eswatini bank', '', '1', NULL, 'Zheng yong', NULL, NULL, NULL, NULL, '2024-07-12 09:32:21', '2024-07-31 08:53:44', NULL, '0', 0, '', NULL),
(179, 0, 'Sindi', 'Magagula', NULL, '76835016', '3', '833', '13.20', 2, 'Female', NULL, '1989-12-27', '891271100255', '34', 'Mahlabaneni', '2024-02-15', '2024-05-15', NULL, 'Machinist', NULL, 'Nedbank', '', '1', NULL, 'Fareast', NULL, NULL, NULL, NULL, '2024-07-12 09:37:29', '2024-07-30 08:27:46', NULL, '0', 0, '', NULL),
(180, 0, 'Phindile Nonkululeko', 'Gamedze', NULL, '76146213', '3', '999', '13.17', 2, 'Female', NULL, '1984-11-04', '8411041100166', '39', 'Nkilongo', '2024-06-11', '2024-09-11', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'JJ - Siteki', NULL, NULL, NULL, NULL, '2024-07-12 09:41:45', '2024-08-01 12:09:38', NULL, '0', 0, '', NULL),
(181, 0, 'Thandi', 'Magagula', NULL, '76864781', '3', '36', '14.52', 2, 'Female', NULL, '1989-12-03', '8912031100496', '34', 'Big bend, Magwanyana', '2024-03-24', '2024-06-24', NULL, '19', NULL, 'Nedbank', '', '1', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-12 09:46:11', '2024-07-31 08:51:19', NULL, '0', 0, '', NULL),
(182, 0, 'Lindiwe', 'Mamba', NULL, '78602429', '3', '626', '13.20', 2, 'Female', NULL, '1986-09-18', '8609181100405', '37', 'Ngudzeni', '2023-07-12', '2023-10-12', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'Sangalum', NULL, NULL, NULL, NULL, '2024-07-12 09:48:46', '2024-07-31 08:49:44', NULL, '0', 0, '', NULL),
(183, 0, 'Zipho', 'Maziya', NULL, '55555555', '3', '186', '14.52', 2, 'Male', NULL, '2000-02-10', '000210000', '24', 'Carpool, kaHlandze', '2023-07-25', '2023-10-25', NULL, '19', NULL, 'Swazibank', '', '1', NULL, 'Newcastle', NULL, NULL, NULL, NULL, '2024-07-12 09:50:23', '2024-08-01 12:19:57', NULL, '0', 0, '', NULL),
(184, 0, 'Lindeni', 'Vilakati', NULL, '78640717', '3', '1012', '13.20', 2, 'Female', NULL, '1997-11-21', '9711211100154', '26', 'Siphofaneni', '2024-06-15', '2024-09-15', NULL, '19', NULL, 'Nedbank', '', '0', NULL, 'KaGaciphi, Siphofaneni', NULL, NULL, NULL, NULL, '2024-07-12 09:54:17', '2024-07-31 08:45:53', NULL, '0', 0, '', NULL),
(185, 0, 'Sandzisile', 'Fakudze', NULL, '78419637', '3', '1042', '13.17', 2, 'Female', NULL, '1995-11-04', '951104000', '28', 'Game 5, Gilgal', '2024-01-08', '2024-04-08', NULL, '', NULL, 'Standard bank', '', '0', NULL, 'Matsapha', NULL, NULL, NULL, NULL, '2024-07-12 09:58:48', '2024-08-01 12:05:32', NULL, '0', 0, '', NULL),
(186, 0, 'Colile', 'Ngcamphalala', NULL, '78293718', '3', '109', '13.17', 2, 'Female', NULL, '1998-01-28', '9801281100398', '26', 'Mpolonjeni', '2023-03-03', '2023-06-03', NULL, '30', NULL, 'Nedbank', '', '1', NULL, 'Mahlabaneni', NULL, NULL, NULL, NULL, '2024-07-12 10:04:17', '2024-08-01 12:16:19', NULL, '0', 0, '', NULL),
(187, 0, 'Sithembile', 'Ngwenya', NULL, '76388686', '3', '986', '13.17', 2, 'Female', NULL, '2000-01-06', '0001062100290', '24', 'Game 5,(nhlangano)', '2024-04-12', '2024-07-12', NULL, '27', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-12 10:07:48', '2024-08-01 12:12:51', NULL, '0', 0, '', NULL),
(188, 0, 'Thuli', 'Ngcamphalala', NULL, '76345125', '3', '140', '14.52', 2, 'Female', NULL, '1979-12-24', '7912241100111', '44', 'St philips', '2023-07-10', '2023-10-10', NULL, 'Presser', NULL, 'Swazibank', '', '1', NULL, 'Big bend', NULL, NULL, NULL, NULL, '2024-07-12 10:16:27', '2024-07-30 09:37:55', NULL, '0', 0, '', NULL),
(189, 0, 'Phicile', 'Mtsetfwa', NULL, '76584118', '3', '1004', '13.20', 2, 'Female', NULL, '1986-03-25', '8603251100247', '38', 'Goboyane (Mafutseni)', '2024-06-17', '2024-09-17', NULL, '28', NULL, 'Nedbank', '', '0', NULL, 'Kassum apparels', NULL, NULL, NULL, NULL, '2024-07-12 10:18:36', '2024-07-31 08:44:38', NULL, '0', 0, '', NULL),
(190, 0, 'Mbali', 'Zungu', NULL, '78152368', '3', '712', '13.17', 2, 'Female', NULL, '1998-12-24', '9812241100220', '25', 'Shoba', '2023-11-25', '2024-02-25', NULL, '12', NULL, 'Nedbank', '', '1', NULL, 'Big bend', NULL, NULL, NULL, NULL, '2024-07-12 10:19:55', '2024-08-01 12:08:05', NULL, '0', 0, '', NULL),
(191, 0, 'Ayanda', 'Mthembu', NULL, '76226028', '3', '830', '14.52', 2, 'Female', NULL, '1996-02-26', '9602231100664', '28', 'Goboyane', '2024-02-07', '2024-05-07', NULL, '12', NULL, 'Swazibank', '', '0', NULL, 'Mkhalamfene (store)', NULL, NULL, NULL, NULL, '2024-07-12 10:22:09', '2024-08-01 11:05:53', NULL, '0', 0, '', NULL),
(192, 0, 'Andiswa', 'Shongwe', NULL, '76292670', '3', '891', '9.85', 2, 'Female', NULL, '1998-01-23', '980123000', '26', 'Game 5 (Bulunga)', '2024-03-14', '2024-06-14', NULL, '29', NULL, 'Nedbank', '', '0', NULL, 'House keeper', NULL, NULL, NULL, NULL, '2024-07-12 10:25:25', '2024-08-01 11:05:07', NULL, '0', 0, '', NULL),
(193, 0, 'Happiness', 'Dlamini', NULL, '78014384', '3', '822', '13.17', 2, 'Female', NULL, '2000-10-26', '0010262100430', '23', 'Goboyane', '2024-02-07', '2024-05-07', NULL, '29', NULL, 'Nedbank', '', '0', NULL, 'N/A', NULL, NULL, NULL, NULL, '2024-07-12 10:29:49', '2024-08-01 11:06:39', NULL, '0', 0, '', NULL),
(194, 0, 'Sonani', 'Ngwenya', NULL, '76175728', '2', NULL, NULL, NULL, 'Female', '', '1981-07-04', '8107041100442', NULL, 'Mahlabaneni', NULL, '2024-10-31', '2 Years', 'None', 'Sithobelweni', '', '', '', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 06:07:04', '2024-07-31 06:07:04', NULL, '0', 0, NULL, ''),
(195, 0, 'Futhie', 'Mthembu', NULL, '76726947', '2', NULL, NULL, NULL, 'Female', '', '1989-11-19', '8911191100551', NULL, 'Ka Goboyane, Mahlabaneni', NULL, '2024-10-31', 'Since 2021', '', 'Mahlabaneni', '', '', '', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 06:09:24', '2024-07-31 06:09:24', NULL, '0', 0, NULL, ''),
(196, 0, 'Nosipho', 'Sibandze', NULL, '76699288', '5', NULL, NULL, NULL, 'Female', '', '2002-09-17', '0209182100054', NULL, 'Ngonini', '2024-06-10', '2024-09-10', NULL, NULL, NULL, 'Ned Bank', '', '0', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 12:12:58', '2024-09-16 07:47:46', NULL, '1', 1, NULL, NULL),
(197, 0, 'Sibusiso', 'Nkwanyana', NULL, '78628027', '5', NULL, NULL, NULL, 'Male', '17', '2000-12-12', '0012127100548', NULL, 'Lismore Lodge', '2023-06-19', '2023-09-19', NULL, NULL, NULL, 'Ned Bank', '', '0', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 12:19:23', '2024-07-31 12:19:23', NULL, '0', 0, NULL, NULL),
(198, 0, 'Tanele Wendy', 'Dlamini', NULL, '76571846', '5', NULL, NULL, NULL, 'Female', '13', '1994-09-21', '9409211100437', NULL, 'Goboyane', '2024-07-17', '2024-10-17', NULL, NULL, NULL, 'Ned Bank', '', '0', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 12:23:49', '2024-07-31 12:23:49', NULL, '0', 0, NULL, NULL),
(199, 0, 'Ceceshiwe', 'Nxumalo', NULL, '76444188', '5', NULL, NULL, NULL, 'Female', '14', '1995-05-26', '9505261100258', NULL, 'Goboyane', '2024-07-08', '2024-10-08', NULL, NULL, NULL, 'Ned Bank', '', '0', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 12:26:01', '2024-07-31 12:26:01', NULL, '0', 0, NULL, NULL),
(200, 0, 'Bagezile C', 'Maziya', NULL, '76319314', '3', '0001', '', 10, 'Female', NULL, '1976-10-16', '7610161100168', '47', '', '2024-07-17', '2024-10-17', NULL, '31', NULL, 'Ned Bank', '', '0', NULL, 'Big bend', NULL, NULL, NULL, NULL, '2024-07-31 12:31:12', '2024-08-07 03:43:26', NULL, '0', 0, '', NULL),
(201, 0, 'Majaha', 'Nxumalo', NULL, '76197303', '3', '0002', '', 10, 'Male', NULL, '1959-12-23', '5912236100294', '64', 'Lismore Lodge', '2023-03-01', '2023-06-01', NULL, '31', NULL, 'Ned Bank', '', '0', NULL, 'TM Woodland', NULL, NULL, NULL, NULL, '2024-07-31 12:36:10', '2024-08-07 03:42:33', NULL, '0', 0, '', NULL),
(202, 0, 'Bonginkosi Magalela', 'Simelane', NULL, '79819670', '5', NULL, NULL, NULL, 'Male', '', '1996-01-30', '9601306100047', NULL, 'Goboyane', '2024-05-29', '2024-08-29', NULL, NULL, NULL, 'Ned Bank', '', '0', 'Single', NULL, NULL, NULL, NULL, NULL, '2024-07-31 12:44:41', '2024-09-16 07:47:38', NULL, '1', 1, NULL, NULL),
(203, 0, 'Sihlangu', 'Dlamini', NULL, '76657487', '3', '1052', '9.85', 6, 'Male', NULL, '1998-08-15', '9808156100783', '25', 'Goboyane', '2024-07-08', '2024-10-08', NULL, '4', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 05:40:19', '2024-08-06 05:40:19', NULL, '0', 0, '', NULL),
(204, 0, 'Alicia', 'Anderson', NULL, '76835326', '3', '1045', '9.85', 6, 'Female', NULL, '2002-11-26', '0211262100293', '21', 'Mayakuka', '2024-07-08', '2024-10-08', NULL, '4', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 05:44:24', '2024-08-06 05:44:24', NULL, '0', 0, '', NULL),
(205, 0, 'Nelsiwe', 'Thwala', NULL, '76977027', '3', '1047', '9.85', 6, 'Female', NULL, '1992-08-08', '9208081100505', '31', 'Mayaluka', '2024-07-08', '2024-10-08', NULL, '4', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 05:48:30', '2024-08-06 05:48:30', NULL, '0', 0, '', NULL),
(206, 0, 'Nhlane', 'Masuku', NULL, '76577556', '3', '1048', '9.85', 7, 'Male', NULL, '1999-10-13', '9910136100147', '24', 'Goboyane', '2024-07-15', '2024-10-15', NULL, '4', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 05:53:12', '2024-08-06 05:53:12', NULL, '0', 0, '', NULL),
(207, 0, 'Saneliso', 'Dlamini', NULL, '79278806', '3', '941', '11.98', 6, 'Female', NULL, '2004-05-25', '0405252100509', '20', 'Mayaluka', '2024-03-28', '2024-06-28', NULL, '14', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 05:57:20', '2024-08-06 05:57:20', NULL, '0', 0, '', NULL),
(208, 0, 'Nolwazi', 'Ndzimandze', NULL, '78032476', '3', '748', '13.20', 7, 'Female', NULL, '2001-10-20', '0110202100852', '22', 'Game5', '2024-01-11', '2024-04-11', NULL, '26', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:02:17', '2024-08-06 06:02:17', NULL, '0', 0, '', NULL),
(209, 0, 'Nomzamo', 'Dlamini', NULL, '78688325', '3', '791', '13.20', 2, 'Female', NULL, '1988-12-27', '8812271100372', '35', 'Mayaluka', '2024-01-22', '2024-04-22', NULL, '11', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:10:56', '2024-08-06 06:10:56', NULL, '0', 0, '', NULL),
(210, 0, 'Nelsiwe', 'Gamedze', NULL, '76465150', '3', '897', '9.85', 6, 'Female', NULL, '1994-12-25', '9412251101216', '29', 'Big Bend', '2024-03-06', '2024-06-06', NULL, '4', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:22:47', '2024-08-06 06:30:13', NULL, '0', 0, '', NULL),
(211, 0, 'Samkelisiwe', 'Nhlabatsi', NULL, '78319690', '3', '1013', '9.85', 7, 'Female', NULL, '2004-07-07', '0407072100586', '20', 'Goboyane', '2024-06-19', '2024-09-19', NULL, '29', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:32:59', '2024-08-06 06:32:59', NULL, '0', 0, '', NULL),
(212, 0, 'Phindile', 'Lulane', NULL, '78637070', '3', '849', '9.85', 2, 'Female', NULL, '1998-07-31', '9807311100134', '26', 'Big bend', '2024-02-13', '2024-05-13', NULL, '29', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:37:24', '2024-08-07 03:39:48', NULL, '0', 0, '', NULL),
(213, 0, 'Noxolo', 'Chauke', NULL, '78032449', '3', '755', '13.20', 6, 'Female', NULL, '2000-10-12', '0010122100182', '23', 'Game 5', '2024-01-17', '2024-04-17', NULL, '14', NULL, 'Swazi bank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:40:58', '2024-08-06 06:40:58', NULL, '0', 0, '', NULL),
(214, 0, 'Temaswati', 'Msibi', NULL, '78041765', '3', '107', '9.85', 7, 'Female', NULL, '1980-01-02', '8001021100433', '44', 'Mahlabaneni', '2024-03-06', '2024-06-06', NULL, '8', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:44:59', '2024-08-06 06:44:59', NULL, '0', 0, '', NULL),
(215, 0, 'Cebsile', 'Maseko', NULL, '78216973', '3', '906', '9.85', 7, 'Female', NULL, '2000-04-29', '0004291111111', '24', 'Big bend', '2024-03-06', '2024-06-06', NULL, '8', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:50:06', '2024-08-06 06:50:06', NULL, '0', 0, '', NULL),
(216, 0, 'Nolizwi', 'Mkoko', NULL, '78324929', '3', '894', '9.85', 7, 'Female', NULL, '2003-07-12', '0307122100604', '21', 'Goboyane', '2024-03-06', '2024-06-06', NULL, '8', NULL, 'FNB', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:52:45', '2024-08-06 06:52:45', NULL, '0', 0, '', NULL);
INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `phone`, `is_role`, `admission_number`, `roll_number`, `class_id`, `gender`, `occupation`, `date_of_birth`, `id_number`, `age`, `address`, `admission_date`, `probation_date`, `work_experience`, `qualification`, `p_address`, `bank_name`, `bank_account`, `probation_status`, `marital_status`, `previous_school`, `document_file`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `is_delete`, `status`, `academic_year_id`, `note`) VALUES
(217, 0, 'Promise', 'Lukhele', NULL, '78406827', '3', '976', '9.85', 2, 'Female', NULL, '2002-09-20', '0209201111111', '21', 'Riverside', '2024-03-06', '2024-06-06', NULL, '29', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 06:57:13', '2024-08-06 06:57:13', NULL, '0', 0, '', NULL),
(218, 0, 'Annah', 'Dlamini', NULL, '78293287', '3', '936', '9.85', 7, 'Female', NULL, '1977-08-22', '7708221100341', '46', 'Mayaluka', '2024-03-21', '2024-06-21', NULL, '11', NULL, 'Nedbank', '', '1', NULL, '', NULL, NULL, NULL, NULL, '2024-08-06 07:02:06', '2024-08-07 07:49:58', NULL, '0', 0, '', NULL),
(219, 0, 'Ncobile', 'Nkambule', NULL, '76714751', '3', '76', '13.20', 4, 'Female', NULL, '1993-01-26', '9301261100062', '31', 'Goboyane', '2024-08-07', '2024-11-07', NULL, '14', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-12 03:52:28', '2024-08-12 03:52:28', NULL, '0', 0, '', NULL),
(220, 0, 'Owethu', 'Shabalala', NULL, '78192412', '3', '1058', '13.20', 4, 'Female', NULL, '2000-08-20', '0008202100783', '23', 'Goboyane', '2024-08-12', '2024-11-12', NULL, '14', NULL, 'Nedbank', '', '0', NULL, '', NULL, NULL, NULL, NULL, '2024-08-12 03:58:19', '2024-08-12 03:58:19', NULL, '0', 0, '', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_subject_timetables`
--
ALTER TABLE `class_subject_timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
