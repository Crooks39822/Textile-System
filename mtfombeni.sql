-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 02:15 PM
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
-- Database: `mtfombeni`
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
(2, '8', '231', '0', '0', 1, '2024-12-04 12:46:28', '2024-12-04 12:46:28', NULL);

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
(1, 'Rural (James)', '0', '2024-12-04 09:09:12', '2025-01-18 09:03:25', 1, '0'),
(2, 'Muzi\'s Crew', '0', '2024-12-04 10:34:23', '2024-12-04 10:34:23', 1, '0'),
(3, 'NRAP', '0', '2024-12-04 11:43:28', '2024-12-04 11:43:28', 1, '0'),
(4, 'Melusi\'s crew', '0', '2024-12-04 11:43:51', '2024-12-04 11:43:51', 1, '0'),
(5, 'Mtsetfwa\'s crew', '0', '2024-12-04 11:44:13', '2025-01-18 09:03:52', 1, '0'),
(6, 'Mngometulu\'s crew', '0', '2024-12-04 11:44:42', '2025-01-18 09:04:37', 1, '0'),
(7, 'Big Bend', '0', '2024-12-04 12:16:32', '2024-12-04 12:16:32', 1, '0'),
(8, 'Services', '0', '2024-12-04 12:46:10', '2024-12-04 12:46:10', 1, '0');

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
(12, 'Inline Presser', 'An employee who is employed to press parts of garments during the manufacturing process', '13.20', '1', '0', '2024-07-31 06:20:09', '2024-07-31 06:20:09'),
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
  `note` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `nxt_name` varchar(255) DEFAULT NULL,
  `nxt_contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `tax_number`, `email`, `phone`, `qualification`, `is_role`, `admission_number`, `roll_number`, `class_id`, `gender`, `occupation`, `date_of_birth`, `id_number`, `age`, `address`, `admission_date`, `probation_date`, `work_experience`, `designation`, `p_address`, `bank_name`, `bank_account`, `probation_status`, `marital_status`, `previous_school`, `document_file`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `is_delete`, `status`, `academic_year_id`, `note`, `relationship`, `nxt_name`, `nxt_contact`) VALUES
(1, 2, 'SUPER-ADMIN', 'IT', NULL, 'itcode08@gmail.com', '79294607', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dAsu6fAI.TStEPJ5Kz2nXO5MyTl9OCgt0OzRTtaoi0VYOvO07wnEy', 'OZhcWg8UzBokWLXX5JLZQ1G5iuR2vW7YuVYWH9HwjlBSaDt9nIkMd1qIFmtm', NULL, '2025-02-10 11:13:27', '20231028013754.jpg', '10', 0, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'HR', 'Manager', NULL, 'hr.electrical@mtfombeniinv.co.za', '26823636066', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '$2y$10$T/z01.qFzujdg629lSrnXO8eDxGrFCJXZR/yFKADod4Z0/TTZ1dPq', 'IkgKM9cDkTKV5qrYYctFdlCijBudU94x7bkh8uTVkTLXOmPUKI', '2024-12-06 05:28:00', '2025-01-27 02:58:29', NULL, '0', 0, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
