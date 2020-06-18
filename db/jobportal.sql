-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 10:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_addresses`
--

CREATE TABLE `candidate_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_personal_infos`
--

CREATE TABLE `candidate_personal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `nissue_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Education/Training', 1, '2020-05-11 11:19:20', '2020-05-11 11:19:20'),
(2, 'IT/Telecommunication', 1, '2020-05-11 11:19:43', '2020-05-11 11:19:43'),
(3, 'Engineer/Architects', 1, '2020-05-11 11:21:10', '2020-05-11 11:21:10'),
(4, 'Marketing/Sales', 1, '2020-05-11 11:22:50', '2020-05-11 11:22:50'),
(5, 'Accounting/Finance', 1, '2020-05-11 11:23:33', '2020-05-11 11:23:33'),
(6, 'Bank/Non-Bank Fin.', 1, '2020-05-11 11:24:18', '2020-05-11 11:24:18'),
(7, 'Garments/Textile', 1, '2020-05-11 11:25:40', '2020-05-11 11:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `industary_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_licen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_rl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_per_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_per_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_per_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_per_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `username`, `password`, `password2`, `company_name`, `company_address`, `industary_type`, `business_description`, `company_licen`, `company_rl`, `company_web`, `con_per_name`, `con_per_designation`, `con_per_email`, `con_per_mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shamim009', '$2y$10$tGiNCovTDyEnqtPGofzeJeXBD49wRJ6pNgfQnAwHWh.LiaHcaTH3q', '$2y$10$hHJOITdJGE.BWIPfvSnGJuTVqCalaNIVM.yWvWU2eZV.8Pv3c5vTe', 'DDetect IT Ltd', 'House#12 Road#11 Sector#10 Uttara Dhaka-1210', '2', 'DDetect IT is a design and development firm. We work across the design and implementation of ideas that helps businesses to navigate in the competitive marketplace. We specialize\r\nin creating branding solutions that has an enduring impact for businesses. We drive results by\r\nuncovering, crafting and sharing client`s compelling ideas to create desirable solutions.', '726489274', '7364556473', 'www.ddetect.com', 'Shamim Hassan', 'MD & CEO', 'shamim009@gmail.com', '01749386163', NULL, '2020-05-11 11:48:17', '2020-05-11 11:48:17'),
(2, 'shamim007', '$2y$10$24nMCZZqQe66cL4tq1HZkOZj4.Sae6yuZHA6nvy76GIpZiCHDKmTe', '$2y$10$CrPm0wscQgRQCeEfeH6fze83PPUQcTZhOIUYbBdS6JPAAGpZ/9TWq', 'Dynamicflow', 'E2, Eastern Housing, Pallabi 2nd Phase, Mirpur, Dhaka - 1216, Bangladesh', '2', 'Design with meaning. DynamicFlow IT is a design and development firm. We work across the design and\r\nimplementation of ideas that helps businesses to navigate in the competitive marketplace. We specialize\r\nin creating branding solutions that has an enduring impact for businesses. We drive results by\r\nuncovering, crafting and sharing client`s compelling ideas to create desirable solutions.', '7263548', '924657837', 'www.dynamicflow', 'Towhedul Islam', 'CEO', 'towhid009@gmail.com', '01749386163', NULL, '2020-05-11 12:39:33', '2020-05-11 12:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `employers_id` int(11) UNSIGNED NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_vacancy` int(11) NOT NULL,
  `job_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_responsibilities` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_requirements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_benefits` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_deadline` date NOT NULL,
  `published_date` date NOT NULL,
  `salary` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `employers_id`, `job_title`, `job_location`, `email`, `job_vacancy`, `job_category`, `job_description`, `job_responsibilities`, `educational_requirements`, `employment_status`, `experience_requirements`, `additional_requirements`, `other_benefits`, `application_deadline`, `published_date`, `salary`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Developer', 'Uttara, Dhaka', 'shamim009@gmail.com', 2, '2', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Full-time (11:00 PM to 7:00 AM)</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Job Location : Mirpur, Dhaka-1216</li></ul>', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Convert PSD to WordPress</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Strong knowledge in working with visual composer and Elementor page builder</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Need good experience of working in different paid themes</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Development and customization of WordPress sites using custom or pre-made themes</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">WordPress Bug fixing capabilities</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Solid understanding of WordPress Action/Hooks and its API\'s</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">PHP application development writing custom theme functionality on WordPress sites</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Integration of content into WordPress themes</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Front end interface development of WordPress themes using HTML / CSS / PHP and JavaScript</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">WordPress plugin integration and development</li></ul>', '<span style=\"color: rgb(92, 92, 92); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\">Bachelor of Science (BSc)</span>', 'Full-time', 'At most 2 year(s)', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">The applicants should have experience in the following area(s): o HTML &amp; CSS, Web Developer/ Web Designer</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">The applicants should have experience in the following business area(s): o Development Agency, E-commerce, IT Enabled Service</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">This position is not for any Freshers</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Must have a can do attitude</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Proven work experience as a WordPress Developer - a portfolio is required</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Ability to work under pressure</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Problem solving skills</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Hard working</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Team player</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Strong understanding in OOP with PHP 7</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Two days of weekly holidays (Saturday &amp; Sunday)</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Yearly two bonuses (after the successful completion of 3 months` probation period)</li></ul>', '2020-05-20', '2020-05-11', '20-25k', '5eb996f466280.png', '2020-05-11 12:18:28', '2020-05-11 12:18:28'),
(2, 2, 'Junior Software Engineer(Laravel)', 'Dhaka (Mirpur)', 'towhidshamim009@gmail.com', 1, '2', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Integration of content into WordPress themes</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Front end interface development of WordPress themes using HTML / CSS / PHP and JavaScript</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">WordPress plugin integration and development</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Oversee basic on-site Search Engine Optimization best practice implementation</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Dedication to complete &amp; deliver assigned task within given time frame</li></ul>', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Convert PSD to WordPress</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Strong knowledge in working with visual composer and Elementor page builder</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Need good experience of working in different paid themes</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Development and customization of WordPress sites using custom or pre-made themes</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">WordPress Bug fixing capabilities</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Solid understanding of WordPress Action/Hooks and its API\'s</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">PHP application development writing custom theme functionality on WordPress sites</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Integration of content into WordPress themes</li></ul>', '<span style=\"color: rgb(92, 92, 92); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\">Bachelor of Science (BSc)</span>', 'Part-time', 'At most 3 year(s)', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">The applicants should have experience in the following area(s): o HTML &amp; CSS, Web Developer/ Web Designer</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">The applicants should have experience in the following business area(s): o Development Agency, E-commerce, IT Enabled Service</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">This position is not for any Freshers</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Must have a can do attitude</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Proven work experience as a WordPress Developer - a portfolio is required</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Ability to work under pressure</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Problem solving skills</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Hard working</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Team player</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Strong understanding in OOP with PHP 7</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Strong Knowledge in Codeigniter &amp; Laravel will be a plus point</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Any approved plugin/theme at wordpress.org/any marketplace will be a plus point</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Should have experience in working with different paid themes</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Two days of weekly holidays (Saturday &amp; Sunday)</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Yearly two bonuses (after the successful completion of 3 months` probation period)</li></ul>', '2020-05-15', '2020-05-11', '30-35k', '5eb99d4c39c6f.png', '2020-05-11 12:45:32', '2020-05-11 12:45:32'),
(4, 2, 'General Manager- Marketing', 'Dhaka (Mirpur)', 'towhidshamim007@gmail.com', 1, '4', '<span style=\"color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\">Looking for a dynamic and self driven professional to lead the Marketing Department as General Manager, Marketing</span>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Lead and deal with the buyers independently for all the Marketing activities, instant price quotation, negotiation and sourcing.</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Arrange all kinds of yarns, fabrics and accessories both from local and foreign sources required for sampling and production by leading a team effectively.</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Keep liaison with buyer for all the merchandising activities like order booking, processi, order follow-up and export planning.</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">To act as a leader among all concerned parties with a view to ensure timely execution of order.</li></ul>', '<span style=\"color: rgb(92, 92, 92); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\">Masters degree in any discipline</span>', 'Full-time', 'At least 10 year(s)', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li class=\"bn\" style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px; font-family: solaimanlipi, sans-serif !important; font-size: 15px !important;\">Age 35 to 50 years</li><li class=\"bn\" style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px; font-family: solaimanlipi, sans-serif !important; font-size: 15px !important;\">Only males are allowed to apply</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Candidates having minimum 10-15 years of experience in managing activities of export oriented Woven Garments products in reputed manufacturing companies and dealing with EU, USA and UK buyers.</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Well conversant in managing foreign buyers, competently.</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Must have sound knowledge in woven products and it\'s costing.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 40px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif, solaimanlipi; font-size: 14px;\"><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">T/A, Mobile bill</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Lunch Facilities: Partially Subsidize</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Salary Review: Yearly</li><li style=\"color: rgb(92, 92, 92); line-height: 24px; padding-bottom: 5px;\">Festival Bonus: 2</li></ul>', '2020-05-22', '2020-05-11', '22-27k', '5eb9a4cfadebf.png', '2020-05-11 13:17:35', '2020-05-11 13:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_30_131224_create_candidates_table', 1),
(5, '2020_03_31_155644_create_candidate_personal_infos_table', 1),
(6, '2020_04_01_063612_create_candidate_addresses_table', 1),
(7, '2020_04_03_041942_create_employers_table', 1),
(8, '2020_05_11_034055_create_categories_table', 2),
(9, '2020_05_11_045037_create_employers_table', 3),
(10, '2020_05_11_051846_create_job_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shamim Hassan', 'shamim009@gmail.com', NULL, '$2y$10$1T4.3pjswPgB.w/7jq4u8e1gBLpmO/EXrsPjrA3cf0NVvGmnq/nqW', NULL, '2020-05-11 11:07:41', '2020-05-11 11:07:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidates_email_unique` (`email`);

--
-- Indexes for table `candidate_addresses`
--
ALTER TABLE `candidate_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_personal_infos`
--
ALTER TABLE `candidate_personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidate_personal_infos_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_con_per_email_unique` (`con_per_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_posts_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_addresses`
--
ALTER TABLE `candidate_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_personal_infos`
--
ALTER TABLE `candidate_personal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
