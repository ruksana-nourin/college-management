-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2026 at 08:05 PM
-- Server version: 8.0.46
-- PHP Version: 8.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_classes`
--

CREATE TABLE `academic_classes` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_classes`
--

INSERT INTO `academic_classes` (`id`, `course_id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 20, '2nd Year', 'CLS-493', 'Fuga accusantium et qui dolor deleniti numquam corrupti omnis et.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(2, 1, '1st Year', 'CLS-171', 'Possimus unde consequuntur optio nihil id reiciendis in optio.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(3, 5, '3rd Year', 'CLS-574', 'Perspiciatis non sit voluptas a rerum non velit repellendus impedit velit.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(4, 1, '4th Year', 'CLS-638', 'Veniam amet ducimus et et mollitia in itaque qui consectetur officia eum quae.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(5, 13, '2nd Year', 'CLS-453', 'Nulla laudantium modi dignissimos eum hic architecto voluptatibus earum consequatur.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(6, 2, '2nd Year', 'CLS-498', 'Reiciendis nam id ducimus quos modi numquam qui magnam numquam ea ipsam.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(7, 16, '3rd Year', 'CLS-103', 'Vel ad omnis impedit eos enim maiores.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(8, 14, '4th Year', 'CLS-478', 'Et reiciendis ipsum ea consequatur consequuntur facilis repellendus aut impedit voluptatem unde vel.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(9, 20, '3rd Year', 'CLS-153', 'Iusto cum laboriosam quidem ab nostrum nisi vero in neque aut velit velit.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(10, 1, '3rd Year', 'CLS-544', 'Est vero ea porro quo omnis velit repudiandae quibusdam.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(11, 18, '3rd Year', 'CLS-807', 'Corrupti et laboriosam nihil qui voluptatem minima at.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(12, 18, '1st Year', 'CLS-841', 'Deleniti tempore corrupti perferendis esse sit odit aliquid voluptates impedit voluptatem occaecati.', '2026-09-13 11:18:38', '2026-09-17 22:57:46'),
(13, 14, '4th Year', 'CLS-319', 'Culpa dignissimos dolor eum laboriosam quo reprehenderit quibusdam.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(14, 15, '1st Year', 'CLS-547', 'Nisi culpa consequatur aut veniam voluptatem incidunt illum vel.', '2026-09-13 11:18:38', '2026-09-17 23:00:29'),
(15, 14, '2nd Year', 'CLS-581', 'Distinctio est quas neque facilis sit dolor accusamus officia eveniet pariatur ipsum voluptate.', '2026-09-13 11:18:38', '2026-09-17 23:00:07'),
(16, 13, '1st Year', 'CLS-788', 'Esse laborum ex a impedit ipsam dicta soluta omnis dolor.', '2026-09-13 11:18:38', '2026-09-17 22:59:02'),
(18, 19, '3rd Year', 'CLS-252', 'Nisi laboriosam odio recusandae et vel aliquid consequatur est et inventore.', '2026-09-13 11:18:38', '2026-09-13 11:18:38'),
(19, 18, '3rd Year', 'CLS-875', 'Et adipisci similique corrupti commodi dicta nobis.', '2026-09-13 11:18:38', '2026-09-17 22:58:33'),
(20, 18, '2nd Year', 'CLS-339', 'Voluptatem iusto aut at est facilis qui enim.', '2026-09-13 11:18:38', '2026-09-17 22:58:13'),
(21, 18, '1 st year', 'CLS-840', NULL, '2026-09-13 12:18:45', '2026-09-17 22:57:57'),
(22, 17, '4th year', 'Cls- # 401', 'Et reiciendis omnis', '2026-09-13 12:19:39', '2026-09-17 23:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `academic_sessions`
--

CREATE TABLE `academic_sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_sessions`
--

INSERT INTO `academic_sessions` (`id`, `name`, `code`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(1, '2024-2025', '2024-25', '2024-01-01', '2025-12-31', 'Academic session 2024-2025', '2026-09-15 12:55:44', '2026-09-15 12:55:44'),
(2, '2025-2026', '2025-26', '2025-01-01', '2026-12-31', 'Academic session 2025-2026', '2026-09-15 12:55:44', '2026-09-15 12:55:44'),
(3, '2026-2027', '2026-27', '2026-01-01', '2027-12-31', 'Academic session 2026-2027', '2026-09-15 12:55:44', '2026-09-15 12:55:44'),
(4, '2027-2028', '2027-28', '2027-01-01', '2028-12-31', 'Academic session 2027-2028', '2026-09-15 12:55:44', '2026-09-15 12:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `id` bigint UNSIGNED NOT NULL,
  `attendance_session_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`id`, `attendance_session_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'Present', '2026-09-30 12:46:33', '2026-09-30 12:46:33'),
(2, 2, 1, 'Present', '2026-09-30 12:46:33', '2026-09-30 12:46:33'),
(3, 5, 6, 'Present', '2026-09-30 12:57:02', '2026-09-30 12:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_sessions`
--

CREATE TABLE `attendance_sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `class_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `academic_session_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_sessions`
--

INSERT INTO `attendance_sessions` (`id`, `subject_id`, `teacher_id`, `class_id`, `section_id`, `academic_session_id`, `semester_id`, `attendance_date`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 7, 19, 1, 1, '2026-09-30', '2026-09-30 12:16:16', '2026-09-30 12:16:16'),
(2, 1, 3, 7, 19, 1, 1, '2026-09-30', '2026-09-30 12:46:23', '2026-09-30 12:46:23'),
(3, 1, 3, 7, 19, 3, 9, '2026-09-30', '2026-09-30 12:52:07', '2026-09-30 12:52:07'),
(4, 1, 24, 7, 19, 4, 8, '2026-09-30', '2026-09-30 12:53:13', '2026-09-30 12:53:13'),
(5, 3, 1, 1, 1, 4, 7, '2026-09-30', '2026-09-30 12:56:15', '2026-09-30 12:56:15'),
(6, 1, 16, 7, 20, 1, 1, '2026-10-05', '2026-10-05 08:14:00', '2026-10-05 08:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint NOT NULL,
  `duration` tinyint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `department_id`, `duration`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sed sed et quia provident.', 'CRS-518', 4, 2, 'Beatae qui alias in provident voluptates voluptatibus aspernatur doloremque natus consequatur voluptates qui.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(2, 'Necessitatibus accusantium earum voluptatem.', 'CRS-276', 1, 2, 'Rem quam consequatur perspiciatis similique voluptatem sed quod aliquid voluptate voluptatem est tempora.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(3, 'Autem sapiente dolor est.', 'CRS-820', 6, 3, 'Numquam minus accusamus repudiandae et veritatis adipisci dignissimos soluta veniam ut.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(4, 'Error voluptatem numquam.', 'CRS-064', 7, 3, 'Quis aut maxime voluptatum alias nihil numquam.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(5, 'Fuga ipsa atque.', 'CRS-541', 1, 2, 'A sit et quia nostrum eum et ullam nesciunt et nesciunt.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(6, 'Tenetur non.', 'CRS-193', 6, 3, 'Quia sed quae a aut et quia earum qui voluptatibus possimus perferendis quia.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(7, 'Ad qui sit aut quo.', 'CRS-736', 5, 2, 'Vero dicta id voluptate non dicta tempora.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(8, 'Est sint nulla.', 'CRS-354', 1, 2, 'Id laboriosam et expedita explicabo quia voluptatum ut.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(9, 'Neque soluta eum.', 'CRS-229', 3, 4, 'Est et itaque modi et minus voluptatibus et.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(10, 'Eveniet recusandae sint adipisci.', 'CRS-959', 4, 2, 'Laborum exercitationem quod nulla ducimus quo in.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(11, 'Nemo velit provident.', 'CRS-261', 7, 2, 'Cupiditate atque minus voluptatem omnis magni qui rerum in.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(12, 'Sequi qui error quis.', 'CRS-981', 7, 4, 'Impedit similique aut nihil iure sunt fuga alias et in qui.', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(13, 'Diploma in Computer Science', 'CRS-899', 4, 4, 'Qui facere velit corporis quia ad reiciendis beatae vel incidunt ducimus eaque dolorum et.', '2026-09-13 10:07:04', '2026-09-17 22:50:03'),
(14, 'Bachelor of Arts in English', 'BA-ENG', 2, 3, 'Consectetur error quo eligendi saepe dignissimos voluptatem.', '2026-09-13 10:07:04', '2026-09-17 22:49:15'),
(15, 'Bachelor of Science in Mathematics', 'BSC-MAT', 3, 4, NULL, '2026-09-13 10:07:04', '2026-09-17 22:48:12'),
(16, 'Bachelor of Social Science in Economics', 'BSS-ECO', 6, 4, 'Nisi vel repellendus esse nisi facilis voluptates eum et est qui sint.', '2026-09-13 10:07:04', '2026-09-17 22:46:57'),
(17, 'Bachelor of Science in EEE', 'BSC-EEE', 5, 4, 'Expedita pariatur quia dolore quibusdam officia eaque ea mollitia rem.', '2026-09-13 10:07:04', '2026-09-17 22:45:17'),
(18, 'Bachelor of Business Administration', 'BBA', 8, 4, 'Qui quia officiis quia ullam est est qui sunt.', '2026-09-13 10:07:04', '2026-09-17 22:44:18'),
(19, 'Diploma in Computer Science', 'DIP-CSE', 4, 2, 'Optio placeat sit minus similique impedit eos provident quia eos.', '2026-09-13 10:07:04', '2026-09-17 22:43:31'),
(20, 'Bachelor of Science in CSE', 'BSC-CSE', 4, 4, 'Et necessitatibus tenetur voluptas rerum quasi neque quidem.', '2026-09-13 10:07:04', '2026-09-17 22:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Civil Engineering', 'CE', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(2, 'English', 'CSE', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(3, 'Mathematics', 'ENG', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(4, 'Computer Science', 'BBA', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(5, 'Electrical Engineering', 'MAT', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(6, 'Economics', 'PHY', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(7, 'Physics', 'EEE', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(8, 'Business Administration', 'ECO', '2026-09-13 10:07:04', '2026-09-13 10:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_session_id` bigint NOT NULL,
  `semester_id` bigint NOT NULL,
  `academic_class_id` bigint NOT NULL,
  `section_id` bigint NOT NULL,
  `group_id` bigint DEFAULT NULL,
  `exam_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `academic_session_id`, `semester_id`, `academic_class_id`, `section_id`, `group_id`, `exam_date`, `created_at`, `updated_at`) VALUES
(2, 'Samantha Trujillo', 1, 8, 9, 24, 1, '2020-01-12', '2026-10-06 11:19:24', '2026-10-06 11:19:24'),
(3, 'mid', 1, 1, 7, 19, NULL, '2026-10-07', '2026-10-06 11:24:47', '2026-10-06 11:25:58'),
(4, 'tuhor', 4, 7, 8, 22, NULL, '2026-10-10', '2026-10-09 11:47:21', '2026-10-09 11:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_id` bigint NOT NULL,
  `student_id` bigint NOT NULL,
  `total_marks` decimal(8,2) NOT NULL,
  `total_obtained` decimal(8,2) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `exam_id`, `student_id`, `total_marks`, `total_obtained`, `grade`, `grade_point`, `created_at`, `updated_at`) VALUES
(2, 3, 5, 100.00, 98.00, 'A+', 5.00, '2026-10-06 12:39:08', '2026-10-06 12:39:08'),
(3, 4, 7, 100.00, 67.00, 'A-', 3.50, '2026-10-09 11:49:49', '2026-10-09 11:49:49'),
(4, 3, 1, 100.00, 89.00, 'A+', 5.00, '2026-10-09 11:50:59', '2026-10-09 11:50:59'),
(8, 3, 5, 100.00, 39.00, 'D', 1.00, '2026-10-09 12:10:13', '2026-10-09 12:16:24'),
(9, 3, 5, 100.00, 59.00, 'B', 3.00, '2026-10-12 21:35:35', '2026-10-12 21:35:35'),
(10, 3, 1, 200.00, 145.00, 'A', 4.00, '2026-10-12 22:11:01', '2026-10-12 22:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result_details`
--

CREATE TABLE `exam_result_details` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_result_id` bigint NOT NULL,
  `subject_id` bigint NOT NULL,
  `full_marks` decimal(8,2) NOT NULL,
  `obtained_marks` decimal(8,2) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_result_details`
--

INSERT INTO `exam_result_details` (`id`, `exam_result_id`, `subject_id`, `full_marks`, `obtained_marks`, `grade`, `grade_point`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 100.00, 98.00, 'A+', 5.00, '2026-10-06 12:39:08', '2026-10-06 12:39:08'),
(4, 3, 4, 100.00, 67.00, 'A-', 3.50, '2026-10-09 11:49:49', '2026-10-09 11:49:49'),
(5, 4, 1, 100.00, 89.00, 'A+', 5.00, '2026-10-09 11:50:59', '2026-10-09 11:50:59'),
(8, 8, 1, 100.00, 39.00, 'D', 1.00, '2026-10-09 12:16:24', '2026-10-09 12:16:24'),
(9, 9, 1, 100.00, 59.00, 'B', 3.00, '2026-10-12 21:35:35', '2026-10-12 21:35:35'),
(10, 10, 1, 100.00, 89.00, 'A+', 5.00, '2026-10-12 22:11:01', '2026-10-12 22:11:01'),
(11, 10, 5, 100.00, 56.00, 'B', 3.00, '2026-10-12 22:11:01', '2026-10-12 22:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admission Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(2, 'Tuition Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(3, 'Examination Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(4, 'Library Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(5, 'Laboratory Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(6, 'Development Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(7, 'Transport Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(8, 'Other Fee', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(9, 'Hostel Fee', '2026-09-19 10:59:50', '2026-09-19 10:59:50'),
(12, 'Reading Fee', '2026-10-13 07:46:54', '2026-10-13 07:47:05'),
(13, 'Tution', '2026-10-14 09:43:01', '2026-10-14 09:43:01'),
(15, 'Sports', '2026-10-14 10:03:21', '2026-10-14 10:03:21'),
(16, 'Study Tour', '2026-10-14 10:04:07', '2026-10-14 10:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `fee_payments`
--

CREATE TABLE `fee_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint NOT NULL,
  `academic_session_id` bigint NOT NULL,
  `semester_id` bigint NOT NULL,
  `payment_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `due_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_payments`
--

INSERT INTO `fee_payments` (`id`, `receipt_no`, `student_id`, `academic_session_id`, `semester_id`, `payment_date`, `total_amount`, `payment_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(1, 'REC-2026-0001', 1, 1, 1, '2026-09-19', 5500.00, 4500.00, 1000.00, '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(2, 'REC-20260920144341', 1, 1, 1, '2026-09-20', 8000.00, 500.00, 3000.00, '2026-09-20 08:43:41', '2026-09-20 08:43:41'),
(3, 'REC-20260920145229', 1, 1, 1, '2026-09-20', 8000.00, 500.00, 2500.00, '2026-09-20 08:52:29', '2026-09-20 08:52:29'),
(4, 'REC-20260920173745', 3, 2, 4, '2026-09-20', 8000.00, 5000.00, 3000.00, '2026-09-20 11:37:45', '2026-09-20 11:37:45'),
(5, 'REC-20260920174121', 3, 2, 4, '2026-09-20', 8000.00, 3000.00, 0.00, '2026-09-20 11:41:21', '2026-09-20 11:41:21'),
(6, 'REC-20260920174238', 1, 1, 1, '2026-09-20', 8000.00, 2500.00, 0.00, '2026-09-20 11:42:38', '2026-09-20 11:42:38'),
(7, 'REC-20260920182358-HCUE', 4, 2, 3, '2012-05-16', 8000.50, 1000.00, 7000.50, '2026-09-20 12:23:58', '2026-09-20 12:23:58'),
(8, 'REC-20260920183425-IBY3', 4, 2, 3, '2026-09-20', 8000.50, 5000.00, 2000.50, '2026-09-20 12:34:25', '2026-09-20 12:34:25'),
(9, 'REC-20260920183522-TQQ4', 4, 2, 3, '2026-09-20', 8000.50, 2000.50, 0.00, '2026-09-20 12:35:22', '2026-09-20 12:35:22'),
(10, 'REC-20260921063358-NZNN', 3, 2, 3, '2026-09-21', 8000.50, 4000.00, 4000.50, '2026-09-21 00:33:58', '2026-09-21 00:33:58'),
(12, 'REC-20261016170012-QE9H', 3, 2, 3, '2026-10-16', 8000.50, 0.50, 4000.00, '2026-10-16 11:00:12', '2026-10-16 11:00:12'),
(13, 'REC-20261016171412-QAKS', 3, 2, 3, '2026-10-16', 8000.50, 2000.00, 2000.00, '2026-10-16 11:14:12', '2026-10-16 11:14:12'),
(14, 'REC-20261016174619-UMNY', 3, 2, 3, '2026-10-16', 8000.50, 1500.00, 500.00, '2026-10-16 11:46:19', '2026-10-16 11:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `fee_payment_details`
--

CREATE TABLE `fee_payment_details` (
  `id` bigint UNSIGNED NOT NULL,
  `fee_payment_id` bigint NOT NULL,
  `fee_category_id` bigint NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_payment_details`
--

INSERT INTO `fee_payment_details` (`id`, `fee_payment_id`, `fee_category_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5000.00, '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(2, 1, 4, 500.00, '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(3, 7, 2, 1000.00, '2026-09-20 12:23:58', '2026-09-20 12:23:58'),
(4, 8, 2, 4000.00, '2026-09-20 12:34:25', '2026-09-20 12:34:25'),
(5, 8, 3, 1000.00, '2026-09-20 12:34:25', '2026-09-20 12:34:25'),
(6, 9, 4, 500.50, '2026-09-20 12:35:22', '2026-09-20 12:35:22'),
(7, 9, 5, 1500.00, '2026-09-20 12:35:22', '2026-09-20 12:35:22'),
(8, 10, 2, 4000.00, '2026-09-21 00:33:58', '2026-09-21 00:33:58'),
(11, 12, 4, 0.50, '2026-10-16 11:00:12', '2026-10-16 11:00:12'),
(12, 13, 2, 500.00, '2026-10-16 11:14:12', '2026-10-16 11:14:12'),
(13, 13, 3, 1000.00, '2026-10-16 11:14:12', '2026-10-16 11:14:12'),
(14, 13, 4, 500.00, '2026-10-16 11:14:12', '2026-10-16 11:14:12'),
(15, 14, 2, 500.00, '2026-10-16 11:46:19', '2026-10-16 11:46:19'),
(16, 14, 5, 1000.00, '2026-10-16 11:46:19', '2026-10-16 11:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structures`
--

CREATE TABLE `fee_structures` (
  `id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint NOT NULL,
  `fee_category_id` bigint NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_structures`
--

INSERT INTO `fee_structures` (`id`, `semester_id`, `fee_category_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5000.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(2, 1, 3, 1000.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(3, 1, 4, 500.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(4, 1, 5, 1500.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(5, 2, 2, 5000.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(6, 2, 3, 1000.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(7, 2, 4, 500.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(8, 2, 5, 1500.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(9, 3, 2, 5000.00, '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(10, 3, 3, 1000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(11, 3, 4, 500.50, '2026-09-19 12:03:05', '2026-09-19 13:02:55'),
(12, 3, 5, 1500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(13, 4, 2, 5000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(14, 4, 3, 1000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(15, 4, 4, 500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(16, 4, 5, 1500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(21, 6, 2, 5000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(22, 6, 3, 1000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(23, 6, 4, 500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(24, 6, 5, 1500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(25, 7, 2, 5000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(26, 7, 3, 1000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(27, 7, 4, 500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(28, 7, 5, 1500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(29, 8, 2, 5000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(30, 8, 3, 1000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(31, 8, 4, 500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(32, 8, 5, 1500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(33, 9, 2, 5000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(34, 9, 3, 1000.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05'),
(35, 9, 4, 500.00, '2026-09-19 12:03:05', '2026-09-19 12:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Commerce', 'ART', 'Quas voluptas tempore quidem facere doloremque autem fugit ducimus quas qui repellendus.', '2026-09-15 12:10:03', '2026-09-15 12:10:03'),
(2, 'Science', 'COM', 'Non sit cum blanditiis eos ipsa quo et.', '2026-09-15 12:10:04', '2026-09-15 12:10:04'),
(3, 'Arts', 'SCI', 'Ad laboriosam vitae minus odit et expedita sapiente vel dolores aut.', '2026-09-15 12:10:04', '2026-09-15 12:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_06_181442_create_roles_table', 1),
(5, '2026_09_12_181826_create_departments_table', 1),
(6, '2026_09_12_195604_create_courses_table', 1),
(7, '2026_09_13_170147_create_academic_classes_table', 2),
(8, '2026_09_14_132700_create_sections_table', 3),
(9, '2026_09_14_140320_add_unique_constraint_to_sections_table', 4),
(10, '2026_09_15_180047_create_groups_table', 5),
(11, '2026_09_15_184223_create_academic_sessions_table', 6),
(12, '2026_09_17_173450_create_semesters_table', 7),
(14, '2026_09_18_150254_create_student_statuses_table', 9),
(15, '2026_09_18_051018_create_students_table', 10),
(16, '2026_09_19_143416_create_fee_categories_table', 11),
(17, '2026_09_19_174416_create_fee_structures_table', 12),
(18, '2026_09_19_192201_create_fee_payments_table', 13),
(19, '2026_09_19_192221_create_fee_payment_details_table', 13),
(21, '2026_09_28_152043_create_teachers_table', 14),
(22, '2026_09_29_150917_create_attendance_sessions_table', 15),
(23, '2026_09_29_151030_create_attendance_records_table', 15),
(24, '2026_09_29_154720_create_subjects_table', 16),
(26, '2026_10_03_063730_create_exams_table', 17),
(27, '2026_10_06_163204_create_exam_results_table', 18),
(28, '2026_10_06_163205_create_exam_result_details_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(2, 'Teacher', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(3, 'Student', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(4, 'Accountant', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(5, 'Librarian', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(6, 'Staff', '2026-09-13 10:07:04', '2026-09-13 10:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `academic_class_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `academic_class_id`, `name`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Section A', 'SEC-1-A', 'Section A of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(2, 1, 'Section B', 'SEC-1-B', 'Section B of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(3, 1, 'Section C', 'SEC-1-C', 'Section C of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(4, 2, 'Section A', 'SEC-2-A', 'Section A of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(5, 2, 'Section B', 'SEC-2-B', 'Section B of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(6, 2, 'Section C', 'SEC-2-C', 'Section C of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(7, 3, 'Section A', 'SEC-3-A', 'Section A of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(8, 3, 'Section B', 'SEC-3-B', 'Section B of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(9, 3, 'Section C', 'SEC-3-C', 'Section C of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(10, 4, 'Section A', 'SEC-4-A', 'Section A of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(11, 4, 'Section B', 'SEC-4-B', 'Section B of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(12, 4, 'Section C', 'SEC-4-C', 'Section C of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(13, 5, 'Section A', 'SEC-5-A', 'Section A of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(14, 5, 'Section B', 'SEC-5-B', 'Section B of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(15, 5, 'Section C', 'SEC-5-C', 'Section C of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(16, 6, 'Section A', 'SEC-6-A', 'Section A of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(17, 6, 'Section B', 'SEC-6-B', 'Section B of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(18, 6, 'Section C', 'SEC-6-C', 'Section C of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(19, 7, 'Section A', 'SEC-7-A', 'Section A of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(20, 7, 'Section B', 'SEC-7-B', 'Section B of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(21, 7, 'Section C', 'SEC-7-C', 'Section C of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(22, 8, 'Section A', 'SEC-8-A', 'Section A of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(23, 8, 'Section B', 'SEC-8-B', 'Section B of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(24, 8, 'Section C', 'SEC-8-C', 'Section C of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(25, 9, 'Section A', 'SEC-9-A', 'Section A of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(26, 9, 'Section B', 'SEC-9-B', 'Section B of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(27, 9, 'Section C', 'SEC-9-C', 'Section C of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(28, 10, 'Section A', 'SEC-10-A', 'Section A of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(29, 10, 'Section B', 'SEC-10-B', 'Section B of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(30, 10, 'Section C', 'SEC-10-C', 'Section C of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(31, 11, 'Section A', 'SEC-11-A', 'Section A of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(32, 11, 'Section B', 'SEC-11-B', 'Section B of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(33, 11, 'Section C', 'SEC-11-C', 'Section C of 3rd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(34, 12, 'Section A', 'SEC-12-A', 'Section A of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(35, 12, 'Section B', 'SEC-12-B', 'Section B of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(36, 12, 'Section C', 'SEC-12-C', 'Section C of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(37, 13, 'Section A', 'SEC-13-A', 'Section A of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(38, 13, 'Section B', 'SEC-13-B', 'Section B of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(39, 13, 'Section C', 'SEC-13-C', 'Section C of 4th Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(40, 14, 'Section A', 'SEC-14-A', 'Section A of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(41, 14, 'Section B', 'SEC-14-B', 'Section B of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(42, 14, 'Section C', 'SEC-14-C', 'Section C of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(43, 15, 'Section A', 'SEC-15-A', 'Section A of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(44, 15, 'Section B', 'SEC-15-B', 'Section B of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(45, 15, 'Section C', 'SEC-15-C', 'Section C of 2nd Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(46, 16, 'Section A', 'SEC-16-A', 'Section A of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(47, 16, 'Section B', 'SEC-16-B', 'Section B of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(48, 16, 'Section C', 'SEC-16-C', 'Section C of 1st Year', '2026-09-14 08:11:52', '2026-09-14 08:11:52'),
(49, 18, 'Section A', 'SEC-18-A', 'Section A of 3rd Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(50, 18, 'Section B', 'SEC-18-B', 'Section B of 3rd Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(51, 18, 'Section C', 'SEC-18-C', 'Section C of 3rd Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(52, 19, 'Section A', 'SEC-19-A', 'Section A of 1st Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(53, 19, 'Section B', 'SEC-19-B', 'Section B of 1st Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(54, 19, 'Section C', 'SEC-19-C', 'Section C of 1st Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(55, 20, 'Section A', 'SEC-20-A', 'Section A of 2nd Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(56, 20, 'Section B', 'SEC-20-B', 'Section B of 2nd Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(57, 20, 'Section C', 'SEC-20-C', 'Section C of 2nd Year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(58, 21, 'Section A', 'SEC-21-A', 'Section A of 1 st year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(60, 21, 'Section C', 'SEC-21-C', 'Section C of 1 st year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(61, 22, 'Section A', 'SEC-22-A', 'Section A of 4th year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(62, 22, 'Section B', 'SEC-22-B', 'Section B of 4th year', '2026-09-14 08:11:53', '2026-09-14 08:11:53'),
(64, 21, 'Section D', 'SEC - 22-D', NULL, '2026-09-14 09:59:22', '2026-09-14 10:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_session_id` bigint NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `academic_session_id`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(1, '1st Semester', 1, '2024-01-01', '2024-06-30', 'First semester of 2024-2025', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(2, '2nd Semester', 1, '2024-07-01', '2024-12-31', 'Second semester of 2024-2025', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(3, '1st Semester', 2, '2025-01-01', '2025-06-30', 'First semester of 2025-2026', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(4, '2nd Semester', 2, '2025-07-01', '2025-12-31', 'Second semester of 2025-2026', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(6, '2nd Semester', 3, '2026-07-01', '2026-12-31', 'Second semester of 2026-2027', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(7, '1st Semester', 4, '2027-01-01', '2027-06-30', 'First semester of 2027-2028', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(8, '2nd Semester', 4, '2027-07-01', '2027-12-31', 'Second semester of 2027-2028', '2026-09-17 12:11:49', '2026-09-17 12:11:49'),
(9, '1 st semester', 3, '2026-09-01', '2027-03-18', NULL, '2026-09-17 13:00:22', '2026-09-17 13:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7EyJ6VHTgnVVQWOACm19H2sg19SEaQUlopXgzYHI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJXNTZrTkxIM0dZV014V081TXV1d2p2a3M5YXIzRmJrSGRKOEM3Q0tPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2NvbGxlZ2UtbWFuYWdlbWVudC50ZXN0XC9mZWUtcGF5bWVudHNcLzE0XC9wcmludCIsInJvdXRlIjoiZmVlLXBheW1lbnRzLnByaW50In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792174827),
('aP4VA43SEMN8f52CS4GF6l4M4w7Yu6ZexGo6mgky', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJGb05jcWdycEc3VEU0TmlmTFJ4VmZQQUR1MVZMSWdVbm5mT1R3RlJnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2NvbGxlZ2UtbWFuYWdlbWVudC50ZXN0XC9mZWUtcGF5bWVudHNcL2NyZWF0ZSIsInJvdXRlIjoiZmVlLXBheW1lbnRzLmNyZWF0ZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1792166965),
('d8sVTOCpHh93lJF9uoGJVEbVr2qPhvVtPgK27wIT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJVVjRLdDRCcG1Udk5EZ3Fab0J4bW96cm9HMGd6OG1yRWV5NVNrc21uIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2NvbGxlZ2UtbWFuYWdlbWVudC50ZXN0XC91c2VycyIsInJvdXRlIjoidXNlcnMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1791993931),
('DPvMIhGUYwHILpy6PRIuYIezBrvtvokqnRvYInZ8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJmUXpiZDNhelZQc3BkRUpremlDdUY4SnFPcGZZWkZ4NHI1M2pNZXBYIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2NvbGxlZ2UtbWFuYWdlbWVudC50ZXN0XC9mZWUtcGF5bWVudHMiLCJyb3V0ZSI6ImZlZS1wYXltZW50cy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1791917845),
('x61rqvNBEao8BruZT50bFET3nWtt94cIq7ffSxz6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJwc3g0NWhaTlZwSjh0aDdxUmc2Qkg0MEJZMk44RUpFUnFxV2NEbk5WIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2NvbGxlZ2UtbWFuYWdlbWVudC50ZXN0XC9mZWUtc3RydWN0dXJlcyIsInJvdXRlIjoiZmVlLXN0cnVjdHVyZXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1792129379),
('ZUA3bWrZCf3LcOIo3pwgDjQKXFzGTDCeNnWcoV5p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJHRTRCc3BEcHpDd2xaR1hLbGpFSW15T3JTcjBqdnRtWU52Q3VuV2wxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2NvbGxlZ2UtbWFuYWdlbWVudC50ZXN0XC9mZWUtcGF5bWVudHMiLCJyb3V0ZSI6ImZlZS1wYXltZW50cy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1792138382);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `department_id` bigint NOT NULL,
  `course_id` bigint NOT NULL,
  `academic_class_id` bigint NOT NULL,
  `section_id` bigint NOT NULL,
  `group_id` bigint DEFAULT NULL,
  `academic_session_id` bigint NOT NULL,
  `admission_date` date NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_status_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `image`, `email`, `phone`, `gender`, `date_of_birth`, `blood_group`, `address`, `department_id`, `course_id`, `academic_class_id`, `section_id`, `group_id`, `academic_session_id`, `admission_date`, `guardian_name`, `guardian_phone`, `student_status_id`, `created_at`, `updated_at`) VALUES
(1, '1020301', 'Ruksana Nourin', 'uploads/students/1789826803.jpg', 'roxy@email.com', '011234567', 'Female', '2004-05-19', 'B+', NULL, 6, 16, 7, 19, 3, 1, '2026-09-19', 'abc', '123', 1, '2026-09-19 07:43:56', '2026-09-19 08:06:43'),
(3, '1020302', 'Francis Garrett', 'uploads/students/1789911929.jpg', 'vumihu@mailinator.com', '+1 (962) 233-9733', 'Other', '1986-01-17', 'AB-', 'Rerum explicabo Ut', 4, 13, 5, 14, 2, 2, '1988-09-30', 'Rosalyn Patel', '+1 (765) 426-2848', 1, '2026-09-20 07:45:29', '2026-09-20 21:13:01'),
(4, '1020303', 'Dean Travis', 'uploads/students/1789930355.jpg', 'tilys@mailinator.com', '+1 (122) 124-3452', 'Other', '2020-01-03', NULL, 'Perferendis ut illum', 5, 17, 22, 61, 2, 2, '2004-04-13', 'Zephr Rush', '+1 (568) 895-1945', 1, '2026-09-20 12:20:09', '2026-09-20 12:52:35'),
(5, '1020304', 'Maris Giles', 'uploads/students/1789930337.jpg', 'lugisy@mailinator.com', '+1 (405) 789-3413', 'Female', '1992-01-04', 'AB+', 'Illo velit ipsum ex', 6, 16, 7, 19, 2, 1, '2005-11-20', 'Quemby Kirby', '+1 (207) 159-6757', 1, '2026-09-20 12:51:54', '2026-10-06 11:28:18'),
(6, '1020305', 'Hyacinth Rivas', 'uploads/students/1789962589.jpg', 'viqugiloji@mailinator.com', '+1 (687) 853-8506', 'Male', '2017-08-15', 'O+', 'Explicabo Est dolor', 4, 20, 1, 1, NULL, 4, '2008-02-10', 'Zia Petersen', '+1 (218) 293-2492', 1, '2026-09-20 12:53:44', '2026-09-30 12:55:19'),
(7, '1020306', 'Idola Hopkins', 'uploads/students/1789962674.jpg', 'luwo@mailinator.com', '+1 (994) 737-3016', 'Female', '1978-02-07', 'B-', 'Non voluptatum ex es', 2, 14, 8, 22, NULL, 4, '1995-11-01', 'Troy Contreras', '+1 (653) 193-7973', 1, '2026-09-20 21:51:14', '2026-09-20 21:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_statuses`
--

CREATE TABLE `student_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_statuses`
--

INSERT INTO `student_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2026-09-18 09:11:46', '2026-09-18 09:11:46'),
(2, 'Inactive', '2026-09-18 09:11:46', '2026-09-18 09:11:46'),
(3, 'Graduated', '2026-09-18 09:11:46', '2026-09-18 09:11:46'),
(4, 'Suspended', '2026-09-18 09:11:46', '2026-09-18 09:11:46'),
(5, 'Withdrawn', '2026-09-18 09:11:46', '2026-09-18 09:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Islamic Economics', 16, '2026-09-29 10:06:05', '2026-09-29 10:16:27'),
(3, 'Laravel', 20, '2026-09-30 12:54:20', '2026-09-30 12:54:20'),
(4, 'Literature', 14, '2026-10-09 11:48:12', '2026-10-09 11:48:12'),
(5, 'Urban Economic', 16, '2026-10-12 22:10:35', '2026-10-12 22:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `teacher_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_code`, `name`, `email`, `phone`, `department_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 'TCH-4005', 'Providenci McClure', 'grimes.willy@example.com', '01141311939', 6, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(2, 'TCH-2873', 'Arnulfo Nicolas', 'kulas.janis@example.net', '01621068427', 8, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(3, 'TCH-7153', 'Elza Padberg', 'zemlak.joanny@example.net', '01025163104', 2, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(4, 'TCH-8993', 'Prof. Shawna Kassulke II', 'tierra18@example.com', '01045821211', 2, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(5, 'TCH-7979', 'Josue Mayert', 'jaida.dooley@example.net', '01724486002', 5, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(7, 'TCH-9140', 'Jacey Gutmann', 'raymond.hane@example.net', '01108383365', 6, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(8, 'TCH-7701', 'Elias Lindgren', 'juwan21@example.net', '01453703513', 3, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(9, 'TCH-1700', 'Mr. Ross Hackett Sr.', 'ookeefe@example.net', '01784781752', 2, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(10, 'TCH-3006', 'Orlando Hauck', 'nicolas.fermin@example.net', '01161822988', 2, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(11, 'TCH-5118', 'Jessyca Baumbach', 'daugherty.parker@example.net', '01186955672', 3, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(12, 'TCH-7402', 'Miss Margie Fadel III', 'jose58@example.com', '01252143652', 7, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(13, 'TCH-5204', 'Trudie Powlowski', 'madelynn.hirthe@example.net', '01310342174', 6, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(14, 'TCH-9118', 'Lindsey Thompson', 'margot02@example.com', '01384575036', 7, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(15, 'TCH-6506', 'Dr. Gus Bednar Jr.', 'abbie32@example.net', '01364103386', 3, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(16, 'TCH-6560', 'Mr. Merlin Rohan Sr.', 'stark.melyssa@example.com', '01785287968', 5, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(17, 'TCH-3068', 'Violet Renner', 'uprice@example.org', '01428125476', 3, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(18, 'TCH-9319', 'Hershel Konopelski', 'cjohns@example.net', '01743628703', 7, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(19, 'TCH-8900', 'Susie Heller', 'rogers.tremblay@example.com', '01058891730', 4, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(20, 'TCH-6102', 'Malika Simonis', 'khaley@example.com', '01299662142', 6, NULL, '2026-09-28 09:40:48', '2026-09-28 09:40:48'),
(21, 'Voluptatem enim repu', 'Iliana Hernandez', 'qanyqu@mailinator.com', '+1 (329) 187-6749', 7, 'uploads/teachers/1790618072.jpg', '2026-09-28 10:31:29', '2026-09-28 11:54:32'),
(22, 'Mollitia vel volupta', 'Macaulay Gallegos', 'vuqy@mailinator.com', '+1 (574) 953-3284', 6, 'uploads/teachers/1790618050.jpg', '2026-09-28 10:32:14', '2026-09-28 11:54:10'),
(23, 'Praesentium consequa', 'Phyllis Porter', 'wula@mailinator.com', '+1 (659) 925-6033', 6, 'uploads/teachers/1790618022.jpg', '2026-09-28 11:20:22', '2026-09-28 11:53:42'),
(24, 'Ab maiores et corrup', 'Cole Goodwin', 'xynifeto@mailinator.com', '+1 (741) 572-1671', 3, 'uploads/teachers/1790617701.jpg', '2026-09-28 11:48:21', '2026-09-28 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Lazaro Cormier Jr.', 'idella78@example.org', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'I0DpK900Rj', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(2, 'Liam Hand IV', 'hettinger.edgar@example.com', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'uCYHOoJadj', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(3, 'Charley Bahringer', 'schuppe.dannie@example.com', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'PA27NOWLCD', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(4, 'Keagan Bogisich', 'nicklaus.waters@example.com', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'BzhVcLM071', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(5, 'Ms. Deborah Auer V', 'aconsidine@example.net', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'nXXmrsRNqm', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(6, 'Rodolfo Graham', 'paucek.brown@example.net', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'W3ei88sHVu', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(7, 'Solon Cruickshank', 'lhirthe@example.org', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'gsUmWi3p5O', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(8, 'Berneice Koch Jr.', 'becker.lorna@example.net', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'j0O4CCp6w0', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(9, 'Dr. Adolphus Lebsack', 'adeline91@example.org', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'nB5hwk2MwW', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(10, 'Irving Quitzon', 'makenna68@example.net', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'gv9LL29vXr', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(11, 'Jett Dibbert II', 'kiera.pacocha@example.org', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'Et5LcJYaMd', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(12, 'Miss Rylee Veum Sr.', 'cathrine08@example.org', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'XqRJw0X9yo', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(13, 'Johnpaul Bernhard PhD', 'gladyce37@example.net', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'r8Yb9rkn5N', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(14, 'Pearl Borer', 'kayden.larson@example.net', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'XE9NhL5pSS', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(15, 'Dr. Vilma Von II', 'abailey@example.com', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'kivToZ2lP7', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(16, 'Mr. Gaston Kub Jr.', 'wuckert.carson@example.com', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'VnfZkpPFyb', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(17, 'Johnny Smitham', 'julia.nienow@example.org', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'ktnSN7GNr1', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(18, 'Dr. Gabrielle Wehner IV', 'boyle.coty@example.net', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'LGiXbLDBb4', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(19, 'Ms. Roxanne Sawayn', 'ydicki@example.org', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'uw021zkTZS', '2026-09-13 10:07:03', '2026-09-13 10:07:03'),
(20, 'Guadalupe Lueilwitz', 'jany78@example.org', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'LtQeThv5AJ', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(21, 'Antonette Rolfson', 'hansen.larue@example.org', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', '09rY3kYCac', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(22, 'Rocky Schaefer', 'obauch@example.com', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'l8DbEKSMny', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(23, 'Giles Kiehn', 'flatley.emilie@example.net', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'mHcdGYZgtH', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(24, 'Krista Lindgren', 'dane03@example.com', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 't6wB3jSwNm', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(25, 'Jayda Gottlieb', 'gleason.lois@example.net', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'M1dsEpp4ll', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(26, 'Mr. Jean Conroy', 'hfeil@example.org', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'Ab3qzC66cE', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(27, 'Prof. Stephon Rodriguez PhD', 'sgislason@example.net', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'QkeKKLeyXy', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(28, 'Effie Hudson', 'deanna.sipes@example.org', 2, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'RSi8RV4Ldj', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(29, 'Bridget Morar', 'murazik.laurianne@example.net', 1, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'Ut9WmAF9gu', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(30, 'Brian Wolf', 'uyundt@example.org', 3, '2026-09-13 10:07:03', '$2y$12$I1sFOe0dXBBO0T45MbR8FenTipYDFHhcUjegOA7rRSMsQzVGOTQPO', 'ATpIkLrgGn', '2026-09-13 10:07:04', '2026-09-13 10:07:04'),
(31, 'Guillermo Ankunding', 'cstiedemann@example.net', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'Q7ZBDZ2GtK', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(32, 'Kamron Schultz', 'schumm.saul@example.com', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'FUMuh4S0zh', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(33, 'Alphonso Batz', 'kyla.schroeder@example.com', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', '6IC5rGQbSJ', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(34, 'Matt Haley', 'vivian26@example.net', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'zH8L1QZAme', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(35, 'Tamara Hudson', 'pagac.theresia@example.net', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'LEKDww38q5', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(36, 'Everett Toy', 'carley65@example.org', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'ndUQQgmdic', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(37, 'Emilio McKenzie DDS', 'sporer.leonie@example.com', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', '3bGEGHGgn0', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(38, 'Mr. Simeon Adams IV', 'wconn@example.net', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'LOc5eCIQpX', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(39, 'Prof. Shawn Crist', 'tatyana.hand@example.net', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', '3jLzJXibdZ', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(40, 'Mrs. Kathlyn Paucek', 'raynor.marilyne@example.org', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'YYQ3yd7d4N', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(41, 'Emma Huel Sr.', 'rodriguez.ines@example.com', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'KHSYoQUAmd', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(42, 'Letha Kohler', 'estella69@example.net', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'qiGNtlB6Yz', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(43, 'Constance D\'Amore', 'jdavis@example.com', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'KtbZJXABED', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(44, 'Emilia Huel II', 'macejkovic.van@example.org', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'brr3Sg0nOv', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(45, 'Norene Weber III', 'ophelia.monahan@example.org', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'lkyrDkhisR', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(46, 'Estevan Harris', 'swaniawski.skylar@example.net', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'AMPysTFejA', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(47, 'Rhea Hagenes', 'queenie.doyle@example.net', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'HQLVEFKw9C', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(48, 'Ms. Hortense Cassin II', 'dquigley@example.net', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'HT42rE3ZVS', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(49, 'Lawson Reichel', 'stiedemann.desmond@example.org', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'PrXnLHL1yb', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(50, 'Rahul Brakus', 'fcummerata@example.net', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'J1eq6dDmLZ', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(51, 'Dusty Johnston', 'mcdermott.kenna@example.com', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'OkwMy0C6Yj', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(52, 'Prof. Marcus Auer III', 'alexander.kirlin@example.net', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'veLF7jq6vJ', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(53, 'Breanne Keebler PhD', 'umraz@example.com', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', '1KMGfGcbx6', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(54, 'Gerardo Wintheiser', 'hgusikowski@example.org', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'mRhCwSaMYu', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(55, 'Dr. Erich Beahan III', 'francesco43@example.net', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'Eqk8con5QF', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(56, 'Juvenal Daniel', 'brannon.harris@example.com', 2, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'oD4hqLENxz', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(57, 'Jayne Harris PhD', 'dsteuber@example.net', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', '35Dg149Le3', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(58, 'Theron Quigley', 'schultz.taylor@example.com', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'g0Mlo5kxUl', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(59, 'Lowell Roberts', 'mleannon@example.net', 3, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'DwkEilYAeN', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(60, 'Efren Hammes MD', 'xdach@example.org', 1, '2026-09-13 11:16:20', '$2y$12$2za6hQCJuHuM/gK6q8Epuu0snNalBXNdj0KSZXk9oraTc340uH8mW', 'G75UH4YOJ0', '2026-09-13 11:16:20', '2026-09-13 11:16:20'),
(61, 'Myriam Skiles', 'jimmy65@example.net', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'AmE3zr8ysU', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(62, 'Prof. Amie Beier DVM', 'enoch02@example.net', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'GCpsQtN4JO', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(63, 'Maverick Sporer V', 'lhamill@example.org', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'g7iFrpq7Zp', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(64, 'Dr. Odie Lind', 'cooper28@example.net', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'Yk4z0wgNee', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(65, 'Keeley Rodriguez I', 'osinski.ethel@example.net', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'BYr2dVsZ0u', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(66, 'Prof. Jett Koch DVM', 'kunze.jamison@example.org', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'UaveEmGyRf', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(67, 'Prof. Shaun Purdy', 'jhamill@example.net', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'hSkXIwzdWg', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(68, 'Dr. Edythe Ratke I', 'mariano.kuhic@example.com', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'vDtNcxzsWp', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(69, 'Chadd Hagenes', 'danderson@example.com', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'u4e9j9XRFB', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(70, 'Mr. Clifton Collins III', 'zbeatty@example.com', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'mmQdR9jjqX', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(71, 'Miss Loma Marquardt V', 'kassulke.abdiel@example.com', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'GFLOlD90HU', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(72, 'Layla Nolan', 'johnson86@example.net', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'auSdO8jzFv', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(73, 'Miss Cordia Veum I', 'igoodwin@example.com', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'mZttYNddDs', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(74, 'Ms. Destany Lueilwitz', 'jerdman@example.net', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'NP47TlLFaY', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(75, 'Louvenia O\'Reilly', 'iferry@example.org', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'Dm3TeNPzVg', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(76, 'Dr. Liana Hintz', 'kirlin.cornell@example.com', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', '8y8fatc5nm', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(77, 'Leone Keebler', 'jbaumbach@example.net', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'r1nqP6DY2f', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(78, 'Dr. Nick Mertz', 'klabadie@example.com', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'yhg0juQSV8', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(79, 'Zachariah Gerlach', 'elfrieda.swift@example.net', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'NGtV9OzPov', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(80, 'Eric Hauck PhD', 'rex.blanda@example.com', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', '2HuttW7C3W', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(81, 'Prof. Rosendo D\'Amore', 'eleanore66@example.com', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'cv6VPUNAsr', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(82, 'Archibald Littel', 'mschumm@example.com', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'LS4LZy4iDy', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(83, 'Prof. Ernest Schimmel', 'bahringer.jacquelyn@example.org', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'LyUVTYr0NU', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(84, 'Mrs. Makayla Hermiston DDS', 'emile.walsh@example.org', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'mDjHgVJQRv', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(85, 'Verna Goodwin III', 'olen.kutch@example.org', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'GOGae3nhbR', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(86, 'Amya Rogahn', 'crawford87@example.com', 2, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', '0J6VvYxSzF', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(87, 'Zackery Stanton Jr.', 'johns.bailey@example.net', 3, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'K0EPTIU6TT', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(88, 'Dr. Fabian Schmitt I', 'lhagenes@example.com', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'fkYdrYhKJ0', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(89, 'Dena Klein', 'yhaley@example.org', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'mEfkD4WwSp', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(90, 'Ms. Kellie Bednar', 'virgie.abbott@example.com', 1, '2026-09-19 10:33:52', '$2y$12$7qvJUDncbyf5RFtJswHLe.V/tlVd/FMWKjpPOlplJBvPH1n1Qbumq', 'ivzqfkipr2', '2026-09-19 10:33:52', '2026-09-19 10:33:52'),
(91, 'Felix Langworth', 'cummerata.trevion@example.org', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'EepOl8uPiK', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(92, 'Ronaldo Boyle', 'oberbrunner.jewel@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'sHsNJ1qkB3', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(93, 'Dr. Birdie Hintz DDS', 'wintheiser.erna@example.org', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', '5SxnvQ90eA', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(94, 'Leone Waelchi', 'reilly.madie@example.com', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'L07SdRfDAD', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(95, 'Dr. Jensen Grant Sr.', 'aryanna14@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'LyXJhRiOPo', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(96, 'Dr. Murphy Prohaska', 'osinski.hildegard@example.com', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'epsg6MUAiz', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(97, 'Marcos Okuneva', 'bennie.dibbert@example.net', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'hjscQ6J42Z', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(98, 'Prof. Gordon Luettgen', 'bergstrom.burdette@example.net', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'spOEQt0AEY', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(99, 'Cortez Wunsch II', 'bryce.heidenreich@example.net', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'BcsH87mGO6', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(100, 'Agustina Morissette', 'keeling.kayden@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', '3Z7DNex7so', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(101, 'Earnestine Goyette', 'ymcglynn@example.net', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', '9Xu6Cnfoa1', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(102, 'Karine Grant', 'nicolas.mike@example.com', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'jQeu16owFi', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(103, 'Stan Powlowski II', 'helene97@example.org', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'vJIocCNRp3', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(104, 'Ayla Blick', 'lrodriguez@example.com', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'z4wRTAxn1Q', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(105, 'Paolo Jacobs', 'leonel17@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'BqaOH0CRxu', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(106, 'Dr. Payton Bogisich II', 'kmarks@example.com', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'Un2KFbZRk1', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(107, 'Ariane Cummings', 'wbradtke@example.net', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', '8Tz4Emnpnr', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(108, 'Loyce Effertz', 'gustave.toy@example.com', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', '5CpKs7Guhw', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(109, 'Ebba Orn', 'volkman.tommie@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'ZikZAFXQPv', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(110, 'Russel Rau', 'veronica90@example.com', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'k19H9ojeD6', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(111, 'Allie Wunsch', 'gleichner.dianna@example.com', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'iQZiFWwRvt', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(112, 'Jamir Ziemann', 'abdullah62@example.com', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'WdcG8nK9m0', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(113, 'Dr. Marlen Kunze MD', 'joana87@example.net', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'GojY0rwjnv', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(114, 'Oren Cruickshank II', 'fabiola.bahringer@example.net', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'QUeoMChz8h', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(115, 'Angie Bosco', 'amir.bode@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'hTz4AxTtZM', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(116, 'Rafaela Toy', 'roman57@example.com', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'BDOi9iGo9L', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(117, 'Mrs. Annamarie Streich Jr.', 'bernhard.jack@example.net', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'YSRuAbx6Mb', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(118, 'June Stehr', 'coy41@example.org', 2, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'nkBcO5ZDlq', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(119, 'Dr. Dejuan Parker V', 'vivian.gislason@example.org', 3, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'ELbFdQEwiS', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(120, 'Lemuel Kiehn', 'little.emily@example.org', 1, '2026-09-19 10:35:51', '$2y$12$NMcvd2XD5VRyR9CnqZSNG..jH3ZfwM4wRc.ms9VT./TuJIgCF8HuS', 'IEfyyG27YX', '2026-09-19 10:35:51', '2026-09-19 10:35:51'),
(121, 'Blanche Gulgowski I', 'nkoepp@example.net', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'hqcMMkpl1q', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(122, 'Tressa Kerluke', 'ledner.katrina@example.org', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'aTcy8w2ND7', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(123, 'Ashleigh Mayert Jr.', 'streich.macy@example.com', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'bdHTfreqCz', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(124, 'Abdiel VonRueden', 'charity86@example.org', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', '8vMUJsTNWB', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(125, 'Jalen Cole Jr.', 'jayden06@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'FqofsqCr1W', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(126, 'Harvey Ortiz', 'reilly.cory@example.net', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'xb820sMkDE', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(127, 'Miss Sallie Grady DVM', 'norbert83@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'I2tSo6uM9W', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(128, 'Kelli Hill III', 'patrick.wilkinson@example.org', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'CtUAEWMQKA', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(129, 'Ms. Velma Batz Sr.', 'greenfelder.rhett@example.net', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'QOV2f3gpcA', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(130, 'Norris Gulgowski MD', 'jeromy.lebsack@example.org', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'T3EOmAxw1z', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(131, 'Aliya Reinger Sr.', 'blaise.sawayn@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'proQiJ4tVW', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(132, 'Margret Beatty', 'swaniawski.tania@example.org', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'lPbHaGhoCY', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(133, 'Theo Emmerich DVM', 'noel12@example.net', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'DM8HQNPhlf', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(134, 'Una Cronin', 'tiana19@example.net', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'ZxXnEHkOax', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(135, 'Cristal Jast', 'carolyne16@example.com', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'Vu3Yz1sioT', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(136, 'Green Rosenbaum PhD', 'jerod.becker@example.net', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'laJCxlUJyU', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(137, 'Shyanne Leuschke', 'sincere41@example.org', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'Vnrw1N4pgd', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(138, 'Desiree Adams', 'reba45@example.net', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'kP1IhHGtha', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(139, 'Roman Hirthe', 'woodrow.mcclure@example.net', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'DgYJXCLCSF', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(140, 'Kari Pfeffer', 'jerel.hickle@example.com', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'B0WJbBd1bL', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(141, 'Jessica Huel', 'nstiedemann@example.net', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'cTfop6hgpT', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(142, 'Lucas Torphy', 'fzboncak@example.net', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'Hr0PZ6Qqq0', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(143, 'Lurline Dibbert III', 'zella.hand@example.com', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'SMry5sLpAg', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(144, 'Prof. Libbie Kulas II', 'sylvia38@example.net', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'Ura2LS9I8W', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(145, 'Yvonne Rippin', 'khaag@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', '6JiwgAtJc0', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(146, 'Jerel Wolf', 'lesch.greyson@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'dg9k9e406G', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(147, 'Napoleon Swift', 'lucious69@example.net', 2, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'UAeaD0NDd4', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(148, 'Prof. Hilda Heathcote', 'goodwin.easter@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'HBbL89gjrN', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(149, 'Jettie Purdy', 'alysson.zieme@example.com', 3, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', 'QdV0u9OJ6j', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(150, 'Orpha Jenkins', 'shaylee.koss@example.com', 1, '2026-09-19 12:03:04', '$2y$12$j01zQGkXfcY77ablv.TaS.wjpVYbee4.wIxj7fuenZKrJwM3H.tjS', '8jcGc74t2H', '2026-09-19 12:03:04', '2026-09-19 12:03:04'),
(151, 'Prof. Zachery Smith', 'dibbert.myrtle@example.com', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'wUxe84dcMe', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(152, 'Mrs. Tiana Lemke I', 'sydni.trantow@example.net', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'jofIrNwlFC', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(153, 'Orpha Armstrong', 'okeefe.raymond@example.net', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'h1ceD0V9sS', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(154, 'Tomas Heidenreich', 'ykuhic@example.com', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'SU906JaY62', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(155, 'Presley Mraz', 'kirlin.henri@example.com', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'IkRZXVrKth', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(156, 'Susanna Powlowski', 'lwillms@example.org', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'jMKX5bh6Ep', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(157, 'Judah White', 'delores08@example.org', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'UaWdXiDAsV', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(158, 'Prof. Keshawn McKenzie Jr.', 'jada90@example.org', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'ryDq22diBw', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(159, 'Rosetta Gutkowski', 'cristian.jast@example.org', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', '8jxM9FzOs3', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(160, 'Rene McKenzie', 'ubeer@example.net', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 's0vuk5Slcs', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(161, 'Cali Kuhlman', 'eleazar.hamill@example.com', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'Rh7v500t8a', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(162, 'Wilbert O\'Conner', 'uglover@example.com', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'b11HrndfER', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(163, 'Mabel Bergnaum', 'nhowe@example.com', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'zPE6fp0WyB', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(164, 'Andreane Bednar', 'iruecker@example.net', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'zJz4TpAglc', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(165, 'Prof. Davon Rath', 'oscar10@example.com', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'eSjK6vOgui', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(166, 'Kirsten O\'Conner', 'gabrielle.lakin@example.org', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'KCQW3LMavt', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(167, 'Eldridge Murazik', 'orland56@example.com', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'xVKpR3D1G8', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(168, 'Guy Jakubowski', 'hsatterfield@example.net', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'o6BglpUIGJ', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(169, 'Mr. Moises Corkery I', 'art89@example.com', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'Ve84CDGo0j', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(170, 'Kacey Dare Jr.', 'nina.kihn@example.com', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'nS9vI8gZSt', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(171, 'Dwight Streich', 'rkoss@example.com', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'jfCbeNoMgv', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(172, 'Alexandrine Hills', 'hkoch@example.com', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'iac8QOJjCq', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(173, 'Miss Zella Leannon PhD', 'mose.zulauf@example.net', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'uLOUzqs1B8', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(174, 'Miss Neva Ryan III', 'jasper99@example.com', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'mBkBel7pVI', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(175, 'Elisa Koepp', 'wisozk.cara@example.net', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'LQJOEqObs8', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(176, 'Baron Quigley', 'langosh.breanna@example.net', 3, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'VQKtokiAds', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(177, 'Gussie Greenholt', 'giles48@example.net', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'BOPMaA2dcV', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(178, 'Dr. Adrien Hauck', 'amie.braun@example.org', 2, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', '7vyYe31c9l', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(179, 'Derek Wilderman', 'darryl02@example.com', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'uUZ0HHvm00', '2026-09-19 13:39:58', '2026-09-19 13:39:58'),
(180, 'Casandra Trantow', 'marcus83@example.org', 1, '2026-09-19 13:39:58', '$2y$12$joEpNyRBaCnNfUNBCOGaHusy8EtOqxMQcui86rp7JrUjEaXAMtXgu', 'RT9KuhIGu5', '2026-09-19 13:39:58', '2026-09-19 13:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_classes`
--
ALTER TABLE `academic_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_classes_code_unique` (`code`);

--
-- Indexes for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_sessions_name_unique` (`name`),
  ADD UNIQUE KEY `academic_sessions_code_unique` (`code`);

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_records_attendance_session_id_student_id_unique` (`attendance_session_id`,`student_id`);

--
-- Indexes for table `attendance_sessions`
--
ALTER TABLE `attendance_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_code_unique` (`code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`),
  ADD UNIQUE KEY `departments_code_unique` (`code`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result_details`
--
ALTER TABLE `exam_result_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_payments`
--
ALTER TABLE `fee_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_payments_receipt_no_unique` (`receipt_no`);

--
-- Indexes for table `fee_payment_details`
--
ALTER TABLE `fee_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_structures_semester_id_fee_category_id_unique` (`semester_id`,`fee_category_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`),
  ADD UNIQUE KEY `groups_code_unique` (`code`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_academic_class_name_unique` (`academic_class_id`,`name`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semesters_session_name_unique` (`academic_session_id`,`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_statuses`
--
ALTER TABLE `student_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_statuses_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_teacher_code_unique` (`teacher_code`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_classes`
--
ALTER TABLE `academic_classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `academic_sessions`
--
ALTER TABLE `academic_sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance_sessions`
--
ALTER TABLE `attendance_sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_result_details`
--
ALTER TABLE `exam_result_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fee_payments`
--
ALTER TABLE `fee_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fee_payment_details`
--
ALTER TABLE `fee_payment_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fee_structures`
--
ALTER TABLE `fee_structures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_statuses`
--
ALTER TABLE `student_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
