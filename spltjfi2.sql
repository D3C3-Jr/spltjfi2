-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 08:26 AM
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
-- Database: `spltjfi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Super Admin'),
(11, 'Manager Accounting', 'First Approval'),
(12, 'Manager HRGA', 'Second Approval'),
(13, 'Accounting', 'Admin Accounting'),
(14, 'Manager Purchasing', 'First Approval'),
(15, 'Purchasing', 'Admin Purchasing'),
(16, 'Admin HRGA', 'Admin HRGA'),
(17, 'Sales', 'Admin Sales'),
(18, 'Manager Sales', 'First Approval');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `groups_users_id` int(11) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`groups_users_id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(8, 1, 9),
(12, 11, 12),
(14, 12, 14),
(13, 13, 13),
(17, 14, 17),
(16, 15, 16),
(15, 16, 15),
(18, 17, 18),
(19, 18, 19);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 03:07:25', 1),
(2, '::1', 'dwi.cahyono@ijtt-id.com', NULL, '2024-01-09 03:23:37', 0),
(3, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 03:23:46', 1),
(4, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 03:24:53', 1),
(5, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 03:28:00', 1),
(6, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 03:28:37', 1),
(7, '::1', 'leaderforging@ijtt-id.com', 2, '2024-01-09 03:34:16', 1),
(8, '::1', 'leaderforging@ijtt-id.com', 2, '2024-01-09 03:38:40', 1),
(9, '::1', 'foremanforging@ijtt-id.com', 3, '2024-01-09 03:51:36', 1),
(10, '::1', 'managerforging@ijtt-id.com', 4, '2024-01-09 03:53:08', 1),
(11, '::1', 'managerforging@ijtt-id.com', 4, '2024-01-09 03:57:37', 1),
(12, '::1', 'foremanforging@ijtt-id.com', 3, '2024-01-09 04:00:43', 1),
(13, '::1', 'managerforging@ijtt-id.com', 4, '2024-01-09 04:04:35', 1),
(14, '::1', 'foremanforging@ijtt-id.com', 3, '2024-01-09 04:06:33', 1),
(15, '::1', 'leaderforging@ijtt-id.com', 2, '2024-01-09 04:09:09', 1),
(16, '::1', 'managerforging@ijtt-id.com', 4, '2024-01-09 04:09:53', 1),
(17, '::1', 'leaderforging@ijtt-id.com', 2, '2024-01-09 04:37:04', 1),
(18, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 04:58:51', 1),
(19, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 05:00:13', 1),
(20, '::1', 'leaderaccounting@ijtt-id.com', 5, '2024-01-09 05:02:36', 1),
(21, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 06:04:27', 1),
(22, '::1', 'dummy@dummy.com', 7, '2024-01-09 06:50:57', 1),
(23, '::1', 'dummy@dummy.com', 7, '2024-01-09 06:51:26', 1),
(24, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 06:51:53', 1),
(25, '::1', 'zulfy@ijtt-id.com', 8, '2024-01-09 07:37:27', 1),
(26, '::1', 'leaderforging@ijtt-id.com', 2, '2024-01-09 07:39:36', 1),
(27, '::1', 'leadaccounting@ijtt-id.com', NULL, '2024-01-09 07:44:10', 0),
(28, '::1', 'leaderaccounting@ijtt-id.com', 5, '2024-01-09 07:45:09', 1),
(29, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 07:50:40', 1),
(30, '::1', 'heni.priyanti@ijtt-id.com', 10, '2024-01-09 08:20:37', 1),
(31, '::1', 'ai_fitria@ijtt-id.com', NULL, '2024-01-09 08:25:49', 0),
(32, '::1', 'ai_fitria@ijtt-id.com', NULL, '2024-01-09 08:26:00', 0),
(33, '::1', 'ai_fitria@ijtt-id.com', NULL, '2024-01-09 08:26:39', 0),
(34, '::1', 'ai_fitria@ijtt-id.com', 11, '2024-01-09 08:27:09', 1),
(35, '::1', 'corry@ijtt-id.com', 13, '2024-01-09 09:04:06', 1),
(36, '::1', 'ai_fitria@ijtt-id.com', 14, '2024-01-09 09:04:26', 1),
(37, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 09:05:26', 1),
(38, '::1', 'ai_fitria@ijtt-id.com', 14, '2024-01-09 09:05:57', 1),
(39, '::1', 'ai_fitria@ijtt-id.com', 14, '2024-01-09 09:06:20', 1),
(40, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 09:06:57', 1),
(41, '::1', 'ai_fitria@ijtt-id.com', 14, '2024-01-09 09:08:15', 1),
(42, '::1', 'ai_fitria@ijtt-id.com', 14, '2024-01-09 09:10:22', 1),
(43, '::1', 'ai_fitria@ijtt-id.com', 14, '2024-01-09 09:11:06', 1),
(44, '::1', 'rochmat@ijtt-id.com', 12, '2024-01-09 09:11:37', 1),
(45, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 09:48:14', 1),
(46, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 01:15:00', 1),
(47, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 02:57:42', 1),
(48, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 03:00:23', 1),
(49, '192.168.174.186', 'corry@ijtt-id.com', 13, '2024-01-10 03:02:13', 1),
(50, '192.168.174.186', 'rochmat@ijtt-id.com', 12, '2024-01-10 03:04:05', 1),
(51, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 03:48:34', 1),
(52, '192.168.174.186', 'corry@ijtt-id.com', 13, '2024-01-10 03:59:25', 1),
(53, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 07:25:12', 1),
(54, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-10 07:28:36', 1),
(55, '192.168.174.186', 'janiar@ijtt-id.com', 17, '2024-01-10 07:29:53', 1),
(56, '192.168.174.186', 'ai_fitria@ijtt-id.com', 14, '2024-01-10 07:31:05', 1),
(57, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-10 07:31:44', 1),
(58, '192.168.174.186', 'corry@ijtt-id.com', 13, '2024-01-10 07:39:05', 1),
(59, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-10 07:46:54', 1),
(60, '192.168.174.186', 'corry@ijtt-id.com', 13, '2024-01-10 07:48:07', 1),
(61, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-10 08:04:25', 1),
(62, '192.168.174.186', 'ai_fitria@ijtt-id.com', 14, '2024-01-10 08:05:09', 1),
(63, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 08:27:52', 1),
(64, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-10 09:27:48', 1),
(65, '192.168.174.186', 'corry@ijtt-id.com', 13, '2024-01-10 09:28:16', 1),
(66, '192.168.174.186', 'heni.priyanti@ijtt-id.com', 15, '2024-01-10 09:28:54', 1),
(67, '192.168.174.186', 'heni.priyanti@ijtt-id.com', 15, '2024-01-10 09:29:57', 1),
(68, '192.168.174.186', 'heni.priyanti@ijtt-id.com', 15, '2024-01-10 09:31:32', 1),
(69, '192.168.174.186', 'heni.priyanti@ijtt-id.com', 15, '2024-01-10 09:32:03', 1),
(70, '192.168.174.186', 'heni.priyanti@ijtt-id.com', 15, '2024-01-10 09:34:06', 1),
(71, '192.168.174.186', 'corry@ijtt-id.com', 13, '2024-01-10 09:35:56', 1),
(72, '192.168.174.186', 'rochmat@ijtt-id.com', 12, '2024-01-10 09:39:04', 1),
(73, '192.168.174.186', 'ai_fitria@ijtt-id.com', 14, '2024-01-10 09:40:30', 1),
(74, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-17 03:32:15', 1),
(75, '192.168.175.125', 'heni.priyanti@ijtt-id.com', 15, '2024-01-17 03:33:15', 1),
(76, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-17 03:34:41', 1),
(77, '192.168.174.186', 'janiar@ijtt-id.com', 17, '2024-01-17 03:52:32', 1),
(78, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-17 04:05:22', 1),
(79, '192.168.174.186', 'ipul@ijtt-id.com', 16, '2024-01-17 04:31:22', 1),
(80, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', NULL, '2024-01-17 05:48:11', 0),
(81, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-17 05:48:20', 1),
(82, '192.168.175.105', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 01:07:34', 1),
(83, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 01:35:22', 1),
(84, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 04:15:10', 1),
(85, '192.168.174.186', 'ida.rusdiansyah@ijtt-id.com', 18, '2024-01-18 04:34:01', 1),
(86, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 04:35:03', 1),
(87, '192.168.174.186', 'ida.rusdiansyah@ijtt-id.com', 18, '2024-01-18 04:38:33', 1),
(88, '192.168.174.186', 'aris.mamun@ijtt-id.com', 19, '2024-01-18 04:39:30', 1),
(89, '192.168.174.186', 'heni.priyanti@ijtt-id.com', 15, '2024-01-18 04:40:51', 1),
(90, '192.168.174.186', 'ida.rusdiansyah@ijtt-id.com', 18, '2024-01-18 04:53:06', 1),
(91, '192.168.175.105', 'dwi.cahyono@ijtt-id.com', NULL, '2024-01-18 05:42:49', 0),
(92, '192.168.175.105', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 05:42:56', 1),
(93, '192.168.175.105', 'ida.rusdiansyah@ijtt-id.com', 18, '2024-01-18 06:04:32', 1),
(94, '192.168.175.105', 'ipul@ijtt-id.com', 16, '2024-01-18 06:09:20', 1),
(95, '192.168.175.105', 'janiar@ijtt-id.com', 17, '2024-01-18 06:10:01', 1),
(96, '192.168.175.105', 'heni.priyanti@ijtt-id.com', 15, '2024-01-18 06:10:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `departement_id` int(10) UNSIGNED NOT NULL,
  `departement_code` varchar(100) NOT NULL,
  `departement_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_code`, `departement_name`) VALUES
(1, '1', 'Assembling'),
(2, '2', 'EXIM'),
(3, '3', 'Fin & Acc'),
(4, '4', 'Forging'),
(5, '5', 'HRGA'),
(6, '6', 'IT Dept'),
(7, '7', 'Machining'),
(8, '8', 'Maintenance'),
(9, '9', 'PPIC'),
(10, '10', 'Production'),
(12, '12', 'Purchasing'),
(13, '13', 'QA & QC'),
(14, '14', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` int(10) UNSIGNED NOT NULL,
  `karyawan_code` varchar(100) NOT NULL,
  `karyawan_name` varchar(100) NOT NULL,
  `departement_id` int(11) NOT NULL,
  `plant` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `karyawan_code`, `karyawan_name`, `departement_id`, `plant`) VALUES
(1, '13050007', 'CHORRIDATUL MAHMUDDAH', 3, 'Plant 1'),
(2, '13050008', 'RULI KRISTIAN MASUDIANTO', 4, 'Plant 1'),
(3, '13050009', 'ADUNG SUWELA', 4, 'Plant 1'),
(4, '13050010', 'KARMO', 4, 'Plant 1'),
(5, '13050012', 'GUN GUN', 4, 'Plant 1'),
(6, '13050013', 'EDDIE RAINALDI HS', 8, 'Plant 1'),
(7, '13050014', 'JONG BERNAT', 5, 'Plant 2'),
(8, '13050015', 'JAROT KOERNIAWAN', 8, 'Plant 1'),
(9, '13060017', 'HADI HANDOKO', 7, 'Plant 1'),
(10, '13060018', 'ABDUL MALIK', 7, ''),
(11, '13060019', 'AGUS PRIMA MUHARAM', 4, 'Plant 1'),
(12, '13060020', 'SUGIYANTO', 8, ''),
(13, '13060021', 'TRI LAKSONO', 8, ''),
(14, '13070025', 'AGUS MUKHOTIB', 13, 'Plant 1'),
(15, '13070026', 'AHMAD NURHIDAYAT', 8, ''),
(16, '13070027', 'BIR ALI', 13, 'Plant 1'),
(17, '13070028', 'DIAN RUSDIANA', 7, 'Plant 1'),
(18, '13070029', 'HASIAN SUSANTO SITIO', 7, 'Plant 1'),
(19, '13070031', 'MAMAY KURNIAWAN', 8, 'Plant 1'),
(20, '13070032', 'ONGKI WIJAYA', 7, 'Plant 1'),
(21, '13090035', 'DAUD KHOERUL MURSALIN', 7, 'Plant 1'),
(22, '13090036', 'AJI SURYADI', 7, 'Plant 1'),
(23, '13090037', 'TIAN IDWAR', 7, 'Plant 2'),
(24, '13090038', 'SURYA HADINATA', 8, 'Plant 1'),
(25, '13090039', 'WW SIGIT PURWOKO', 9, 'Plant 1'),
(26, '13090041', 'NANDANG SUPRIYADI', 4, 'Plant 1'),
(27, '13100042', 'ADE IRMA SURYANA', 4, 'Plant 1'),
(28, '13100044', 'ERDI JULIASTA', 4, 'Plant 1'),
(29, '13110045', 'ANTO', 4, 'Plant 1'),
(30, '13110046', 'NANDANG LUKMANSYAH', 3, 'Plant 1'),
(31, '13110047', 'PRAPTO', 4, 'Plant 1'),
(32, '13110049', 'MUH MUKLIS', 13, 'Plant 1'),
(33, '13110050', 'M. USUP SUPRIYATNA', 4, 'Plant 1'),
(34, '13120051', 'NANANG TRIANA', 4, 'Plant 1'),
(35, '13120052', 'BUDI RIYANTO', 13, 'Plant 1'),
(36, '14010057', 'PIAN SOPIAN', 9, 'Plant 2'),
(37, '14010058', 'ABDUL SYUKRI ALBANA', 4, 'Plant 1'),
(38, '14010059', 'MINAL MUTTAQIN', 13, 'Plant 1'),
(39, '14010060', 'ADE SUPARDI', 4, 'Plant 1'),
(40, '14020065', 'RIDWAN MAOLANA', 8, ''),
(41, '14020066', 'RIO ROMADONA', 8, 'Plant 1'),
(42, '14020067', 'DEDI YUSUF', 13, 'Plant 2'),
(43, '14030068', 'ASEP SOPANDI', 4, 'Plant 1'),
(44, '14030069', 'BAYU DWI CAHYONO', 4, 'Plant 1'),
(45, '14030070', 'DODI IRAWAN', 4, 'Plant 1'),
(46, '14030072', 'MUHAMMAD FATHONI', 4, 'Plant 1'),
(47, '14030073', 'TOTO SUKMARAMDANA', 4, 'Plant 1'),
(48, '14030074', 'WAWAN GUNAWAN', 4, 'Plant 1'),
(49, '14030075', 'DIFI ROHMADHA APRITA WICAKSO', 4, 'Plant 1'),
(50, '14030076', 'FAISAL IBRAHIM', 7, ''),
(51, '14030078', 'SITTA WAHYU ANDIKA', 7, ''),
(52, '14040080', 'ANOWO IDRIS', 4, 'Plant 1'),
(53, '14040082', 'M. SOHIBUL FAIZIN', 8, 'Plant 1'),
(54, '14040083', 'RANTA DINATA', 4, 'Plant 1'),
(55, '14040084', 'RUKI FAUZAIN', 9, 'Plant 2'),
(56, '14040087', 'TRIYANTO', 7, ''),
(57, '14040089', 'ALFHAN RISYAD FADILAH', 7, ''),
(58, '14040092', 'IRPAN SEPTIAN', 7, ''),
(59, '14040094', 'JONAWAN MARBUN', 7, ''),
(60, '14040095', 'JONI IRAWAN', 13, 'Plant 1'),
(61, '14050098', 'AGUS HERMAWAN', 9, ''),
(62, '14050099', 'AJI NUGROHO', 7, ''),
(63, '14050100', 'BONI FACIUS', 8, 'Plant 1'),
(64, '14050101', 'DWI ATMAJA', 13, ''),
(65, '14050102', 'IRFAN FARDIANSYAH', 13, ''),
(66, '14050104', 'RIAN ARDIYANTO', 9, 'Plant 1'),
(67, '14050105', 'IMAM SONJAYA', 8, 'Plant 1'),
(68, '14050107', 'WASIS UTOMO', 2, 'Plant 1'),
(69, '14060109', 'AGUNG LAKSONO', 13, 'Plant 2'),
(70, '14060111', 'ANDRI IRAWAN', 8, 'Plant 2'),
(71, '14060112', 'DEDE MARJUKI', 8, 'Plant 2'),
(72, '14060113', 'ARIS ZAENUDIN', 8, 'Plant 2'),
(73, '14060115', 'IWAN HERMAWAN', 8, ''),
(74, '14060116', 'SETYAWAN AGUNG NUGROHO ', 8, 'Plant 2'),
(75, '14060117', 'SUBAGDIYONO', 4, 'Plant 1'),
(76, '14060118', 'YOGI TRI LAKSONO', 13, 'Plant 2'),
(77, '14060119', 'HARI RAMDHANI', 4, 'Plant 1'),
(78, '14060120', 'MUHAMMAD SUHONO', 4, 'Plant 1'),
(79, '14060121', 'RINALDI BUDIAWAN', 4, 'Plant 1'),
(80, '14060122', 'DARYANTO', 8, 'Plant 1'),
(81, '14060123', 'ASEP SUPRIATNA', 4, 'Plant 1'),
(82, '14060124', 'PATONI', 5, 'Plant 1'),
(83, '14060128', 'AI FITRIA WIJAYANTI', 5, 'Plant 1'),
(84, '14070129', 'SYAIFUL HIDAYAT', 1, 'Plant 2'),
(85, '14070131', 'MUHAMMAD TAUFIK', 7, ''),
(86, '14070132', 'ZAINAL ARIFIN', 1, 'Plant 2'),
(87, '14070133', 'RONI KOSAERI KOSASIH', 1, 'Plant 2'),
(88, '14070135', 'ASEP MUHIDIN', 1, 'Plant 2'),
(89, '14070137', 'DELBI ERLANDA', 1, 'Plant 2'),
(90, '14070138', 'AGUS NUR ROKHMAN', 1, 'Plant 2'),
(91, '14070139', 'SOPYAN ISKANDAR', 7, ''),
(92, '14070140', 'SUBARNA', 7, ''),
(93, '14070141', 'RIZKA AWALIA RAMADAN', 1, 'Plant 2'),
(94, '14070142', 'EDWARD EKA FEBRIAN', 8, ''),
(95, '14070144', 'ADI SUNARDI', 7, ''),
(96, '14070146', 'M. SUKUR', 8, ''),
(97, '14070148', 'YAN YAN MULYANA', 13, 'Plant 2'),
(98, '14070149', 'YULIANTO', 7, ''),
(99, '14070150', 'IMAN RAMDHANA', 3, 'Plant 1'),
(100, '14080152', 'SURYADI', 7, 'Plant 2'),
(101, '14080153', 'MOHAMAD SYAIFULLOH', 12, 'Plant 1'),
(102, '14080161', 'ISWANTO', 7, 'Plant 2'),
(103, '14080162', 'EKSI ROMIASIH', 5, 'Plant 1'),
(104, '14080164', 'SINGGIH RAHARJO', 7, ''),
(105, '14080165', 'MUSTOPA KAMAL', 7, ''),
(106, '14080167', 'ABDUL ROHIM ', 7, ''),
(107, '14080168', 'BEJO KRISTIYANTO ', 13, ''),
(108, '14080169', 'BHUDI NARIMO ', 13, ''),
(109, '14080171', 'MAHDUM ', 8, ''),
(110, '14090172', 'DAVID MUHAMAD YUSUP', 4, 'Plant 1'),
(111, '14090173', 'AHMAD GANDI', 4, 'Plant 1'),
(112, '14090174', 'DENI ISKANDAR', 4, 'Plant 1'),
(113, '14090177', 'OGI ABDUL RAHMAN ', 4, 'Plant 1'),
(114, '14090178', 'ALI SYAMSUDIN ', 4, 'Plant 1'),
(115, '14090180', 'IDA RUSDIANSYAH ', 14, 'Plant 1'),
(116, '14090181', 'MAHFUDZ', 4, 'Plant 1'),
(117, '14100182', 'SEPTIAN KURNIAWAN ', 4, 'Plant 1'),
(118, '14100183', 'ANA ANDRIYATNO', 13, ''),
(119, '14100185', 'ANDRIANSYAH', 13, ''),
(120, '14100186', 'HENDRO ', 13, ''),
(121, '14100187', 'CAHYANTO AGUS PRANOTO', 13, 'Plant 2'),
(122, '14100190', 'AMIN ROIS ', 1, 'Plant 2'),
(123, '14100191', 'AKHYARI GIANTORO', 1, 'Plant 2'),
(124, '14100193', 'MUSTAJAB ', 4, 'Plant 1'),
(125, '14100194', 'AHMAD JUNAEDI ', 4, 'Plant 1'),
(126, '14100195', 'ENCAM ', 4, 'Plant 1'),
(127, '14100196', 'AHMAD SOBANI ', 4, 'Plant 1'),
(128, '14100197', 'SUPRIYADI ', 4, 'Plant 1'),
(129, '14100198', 'RAHMAT HIDAYAT ', 4, 'Plant 1'),
(130, '14100200', 'ZIKO BASTIAN', 13, 'Plant 2'),
(131, '14100201', 'TRIANJAYA AGUS SAPUTRA', 4, 'Plant 1'),
(132, '14110204', 'APIP MAULANA ', 9, ''),
(133, '14110205', 'SAMSUDIN ', 1, 'Plant 2'),
(134, '14110207', 'DIARIS ANKA P', 8, 'Plant 1'),
(135, '14110208', 'NURDIN AFRIAN ', 4, 'Plant 1'),
(136, '14110209', 'AANG GUNAWAN ', 4, 'Plant 1'),
(137, '14110210', 'DENNY SOEMARNO ', 10, ''),
(138, '14110215', 'EDIM', 4, 'Plant 1'),
(139, '14110216', 'TAMIN WIHARJA', 4, 'Plant 1'),
(140, '14110217', 'MOCHAMAD JUNAEDI ', 10, ''),
(141, '14110218', 'ADITYA HELMI PUTRANTO ', 4, 'Plant 1'),
(142, '14110219', 'CHANDRA FIRDAUS', 4, 'Plant 1'),
(143, '14110220', 'SUKARMIN ', 13, 'Plant 1'),
(144, '14110221', 'JANIAR USMAN ', 2, 'Plant 1'),
(145, '14120225', 'BARA CIKAL BATHARA ', 1, 'Plant 2'),
(146, '14120226', 'ZAINAL FURQON ', 9, ''),
(147, '14120227', 'ABDUL HOLID ', 9, ''),
(148, '14120229', 'ADI RAHMAN ', 13, ''),
(149, '15010231', 'RHAMCHUL PRASETYONO', 8, ''),
(150, '15010233', 'JAJAT', 9, ''),
(151, '15010234', 'SOPIYAN ', 13, ''),
(152, '15010235', 'SAEFUL ANWAR ', 7, ''),
(153, '15010236', 'RISDIYANTO ', 7, ''),
(154, '15010237', 'JAMAL MUHAMAD ', 7, ''),
(155, '15010238', 'ARIS RAMDANI ', 7, ''),
(156, '15010239', 'YUDISTIA HERLINGGA PRATAMA ', 7, ''),
(157, '15010240', 'MOHAMAD HADI TOSIN ', 7, ''),
(158, '15010242', 'REZA MUTAQIN ', 7, ''),
(159, '15010245', 'ADE KURNADI ', 5, 'Plant 1'),
(160, '15010246', 'SUGANDI', 7, ''),
(161, '15010250', 'SARWO NGUDI UTOMO ', 8, ''),
(162, '15010251', 'RESA PRATAMA ', 8, ''),
(163, '15010255', 'HELMI AZIZ ', 8, ''),
(164, '15010256', 'NURJAENI ', 8, ''),
(165, '15010257', 'RACHMAT AFRIANSYAH ', 8, 'Plant 2'),
(166, '15020260', 'SRI ENDAHNI ', 9, 'Plant 2'),
(167, '15020266', 'ANDRI DWI HARYANTO ', 1, 'Plant 2'),
(168, '15020273', 'DARMAS GARINSYAH HIDAYU ', 1, 'Plant 2'),
(169, '15020275', 'RAMDAN ACHMADI ', 7, ''),
(170, '15020279', 'JAJANG NURJAMAN ', 7, ''),
(171, '15020280', 'DODY AFANDI ', 7, ''),
(172, '15020286', 'PANPAN HERMAWAN ', 9, ''),
(173, '15020291', 'WAWAN FIJIYONO ', 9, ''),
(174, '15020294', 'KARNAEN ', 13, ''),
(175, '15020296', 'RETNO SEPTIANA ', 9, 'Plant 1'),
(176, '15020298', 'MUJI SETIYONO ', 4, 'Plant 1'),
(177, '15020299', 'YAYANG FRISMA DIANA ', 7, ''),
(178, '15020301', 'ABI KHOERI ', 7, ''),
(179, '15020304', 'TULUS SETIAWAN ', 7, ''),
(180, '15020305', 'IYUS RUSMANA ', 7, ''),
(181, '15020307', 'AAP FAUZAN ARIFIN ', 7, ''),
(182, '15020308', 'APIN HIDAYAT ', 7, ''),
(183, '15020311', 'SYAIFUL AMRI ', 7, ''),
(184, '15030318', 'SAEFULLOH', 7, ''),
(185, '15030321', 'IIN ', 13, ''),
(186, '15030325', 'ANGGI ANGGANA KOSASIH ', 4, 'Plant 1'),
(187, '15030331', 'HENGKI HERMAWAN ', 1, 'Plant 2'),
(188, '15030336', 'IWAN SANTOSO', 1, 'Plant 2'),
(189, '15040353', 'WIDIARTO ', 1, 'Plant 2'),
(190, '15040355', 'ANDRI SUHANDRI ', 9, ''),
(191, '15040357', 'MUJI RIYANTO', 9, ''),
(192, '15060370', 'DIDIN SARIFUDIN ', 9, 'Plant 1'),
(193, '15070373', 'IBNU SAPUTRA ', 13, 'Plant 1'),
(194, '15080375', 'INDRA LESMANA ', 1, 'Plant 2'),
(195, '15080379', 'ASEP SYARIFUDIN ', 1, 'Plant 2'),
(196, '15080383', 'DIAN SOPANDI ', 1, 'Plant 2'),
(197, '15080386', 'AKHMAD NUR KHOZI ', 1, 'Plant 2'),
(198, '15090390', 'SUDIYANTO ', 9, ''),
(199, '15090391', 'GUMAWAN', 13, ''),
(200, '15100397', 'MUHAMMAD ASEP TRIYANA ', 13, ''),
(201, '15100398', 'ASEP NURMANSYAH', 13, ''),
(202, '15100400', 'NONI SUGIARTO', 7, ''),
(203, '15100404', 'NANANG SETYAWAN ', 4, 'Plant 1'),
(204, '15110410', 'SIDIQ KUSUMAH', 8, ''),
(205, '15110411', 'AHMAD RAIVANI YUSRON', 8, ''),
(206, '15120412', 'AURUM MAYTA ', 12, 'Plant 1'),
(207, '16010413', 'VANI ROVALINA SAGALA ', 5, 'Plant 1'),
(208, '16010414', 'AGUNG PRASOJO ', 8, 'Plant 2'),
(209, '16020416', 'AGUSTIAN', 7, ''),
(210, '16020417', 'GALIH MUKHLISIN SALAM ', 7, ''),
(211, '16020419', 'TAUFIK RAMADHAN ', 7, ''),
(212, '16020420', 'CAHYANTO HARI WICAKSONO ', 9, 'Plant 1'),
(213, '16020422', 'SUPRIYANTO ', 5, 'Plant 1'),
(214, '16020423', 'MUID ALI ', 5, 'Plant 2'),
(215, '16040425', 'ADNAN HASYIM ', 5, 'Plant 1'),
(216, '16040428', 'AHMAD NURABADI ', 4, 'Plant 1'),
(217, '16050430', 'JAPAR SIDIK ', 4, 'Plant 1'),
(218, '16070437', 'SUMARDI ', 11, ''),
(219, '16070439', 'MUH IRFAN FEBRIAN ROMADHON ', 13, ''),
(220, '16080443', 'BAYU KUNCORO ADI ', 7, ''),
(221, '16080444', 'FEBRI DWI HIMAWAN ', 13, ''),
(222, '16080445', 'BAYU ANDI SETIAWAN ', 8, ''),
(223, '16080446', 'ERIVAL MULYO ZULIANTORO ', 8, ''),
(224, '16080447', 'KHOIRUL ANWAR ', 7, ''),
(225, '16080448', 'TOFIK SUPRIYONO ', 7, ''),
(226, '16090452', 'ALI NURDIN ', 11, ''),
(227, '16090453', 'ANANG KUNCORO ', 11, ''),
(228, '16090456', 'ROHENDI ', 7, ''),
(229, '16100459', 'SURYADI ', 9, ''),
(230, '16100461', 'ROCHMAT ', 3, 'Plant 1'),
(231, '16110463', 'AGUS PURNOMO ', 9, 'Plant 2'),
(232, '16120474', 'UJANG RAMDHAN', 1, 'Plant 2'),
(233, '17010476', 'HERI SETIAWAN ', 1, 'Plant 2'),
(234, '17010478', 'ARIF ARYANTO ', 7, ''),
(235, '17010481', 'SAHRO SUGIANTO ', 4, 'Plant 1'),
(236, '17010483', 'HENGKI HARTONO', 1, 'Plant 2'),
(237, '17010487', 'TRIYONO ', 4, 'Plant 1'),
(238, '17010488', 'RENDRA ANDREYANTO SALIM', 7, ''),
(239, '17010489', 'IMAT ALMASUM ', 7, ''),
(240, '17010490', 'DICKY HERLAMBANG ', 5, 'Plant 1'),
(241, '17020494', 'FERRY ARIANSYAH ', 4, 'Plant 1'),
(242, '17020495', 'WARI JAKARYA ', 4, 'Plant 1'),
(243, '17020498', 'HERDIANSAH ', 7, ''),
(244, '17020500', 'SONNYKA ADE YAUSHE ', 7, ''),
(245, '17020531', 'KURNIAWAN RAHAYU ', 8, ''),
(246, '17030535', 'FAJAR BAHARI ', 7, ''),
(247, '17030536', 'HAMDAN FIRMANSYAH ', 7, ''),
(248, '17030539', 'ABDUL GHOPARANA ', 4, 'Plant 1'),
(249, '17030543', 'RENDI IDHAM PRASETIA ', 1, 'Plant 2'),
(250, '17030546', 'ARI WARDOYO ', 1, 'Plant 2'),
(251, '17030550', 'WAHYU NURAHMAT ', 7, ''),
(252, '17040552', 'RULIANTO', 8, 'Plant 1'),
(253, '17040553', 'HENDRI SUDRAJAT ', 8, 'Plant 2'),
(254, '17040555', 'ANDRIYANTO ', 8, ''),
(255, '17040556', 'FREDY JULIANTO ', 8, ''),
(256, '17040558', 'AHMAD AL ROBBANI ', 4, 'Plant 1'),
(257, '17040559', 'AEP SAPRUDIN ', 4, 'Plant 1'),
(258, '17050569', 'AYEP SOFYAN ', 9, ''),
(259, '17060572', 'HILMAN FACHRUDIN ', 1, 'Plant 2'),
(260, '17070584', 'MOCH FAQIH FAILASUP ', 4, 'Plant 1'),
(261, '17070585', 'TRISNO SUSILO ', 13, 'Plant 1'),
(262, '17070586', 'SERLI RISMAWATI', 2, 'Plant 1'),
(263, '17070587', 'WAHYU PURNOMO', 9, ''),
(264, '17080589', 'DEWITA BUDIARTI ', 9, 'Plant 2'),
(265, '17110614', 'ARIS YULIYANTO', 7, 'Plant 1'),
(266, '17110616', 'ANDRY MULYADI ', 9, ''),
(267, '17120617', 'HILMAN DIMYATI', 4, 'Plant 1'),
(268, '17120619', 'DEDEN ACHMAD ROSADI', 4, 'Plant 1'),
(269, '18010645', 'M ARIS MA\'MUN ', 14, 'Plant 1'),
(270, '18010646', 'BUDIYANTO ', 1, 'Plant 2'),
(271, '18010648', 'WIDIYANTO', 1, 'Plant 2'),
(272, '18010649', 'CIPTO WIDIYONO', 7, 'Plant 2'),
(273, '18010650', 'CECEP HIDAYAT', 13, 'Plant 2'),
(274, '18020671', 'SITI ULFAH SOLIHAH ', 4, 'Plant 1'),
(275, '18020682', 'IKBAL ', 4, 'Plant 1'),
(276, '18030687', 'ILHAM ADYTIA PERMANA ', 11, ''),
(277, '18030688', 'NANI PARTIWI ', 14, 'Plant 1'),
(278, '18070700', 'YUDHA PRATAMA PANJAITAN', 5, 'Plant 1'),
(279, '18070701', 'OKA SUMINGRAT ', 4, 'Plant 1'),
(280, '18100712', 'MUHAMAD MAUSUL ', 4, 'Plant 1'),
(281, '20010844', 'AHMAD ROSYADI ', 4, 'Plant 1'),
(282, '20020852', 'MUSTOFA FARIS IZZUDDIN', 1, 'Plant 2'),
(283, '20120906', 'HENI PRIYANTI', 5, 'Plant 1'),
(284, '20120910', 'ZULFY TRIYOGA', 6, 'Plant 1'),
(285, '21010934', 'ALFIAN AJI DARMAWAN ', 7, ''),
(286, '21040954', 'DIKA ALAMSYAH', 1, 'Plant 2'),
(287, '21050961', 'SOPIAN SANTANG', 4, 'Plant 1'),
(288, '21070985', 'HARDIANSYAH PUTRA', 1, 'Plant 2'),
(289, '21111027', 'AGENG TIRTO UTOMO ', 5, 'Plant 1'),
(290, '22011067', 'IMAM MUALIF ', 9, ''),
(291, '22011068', 'SANUSI ', 9, ''),
(292, '22011070', 'AHMAD WAHYUDIN ', 7, ''),
(293, '22011072', 'APRIYAN ', 7, ''),
(294, '22011074', 'RAVINDRA AROFAIZUM PUTRA ', 8, ''),
(295, '22011075', 'ANDRIAN MUSTOFA', 13, ''),
(296, '22021076', 'KHAEDAR AZIS', 4, 'Plant 1'),
(297, '22021079', 'SUHENDI', 7, ''),
(298, '22021080', 'AGUNG MAULANA SEFTIAN RIZKI', 7, ''),
(299, '22021083', 'AGUS ADI WIJAYANTO', 8, ''),
(300, '22021084', 'ABDUL AZIS', 13, ''),
(301, '22021085', 'ADE SUMARNA ', 13, ''),
(302, '22021086', 'FAHRI RIZQI RAMADHAN ', 7, ''),
(303, '22021093', 'OKFIANTO SUPRASTYO ', 9, ''),
(304, '22031095', 'SIGIT  WIDIYANTO', 7, ''),
(305, '22031096', 'MUHAMAD MAHZAR ALAM ', 4, 'Plant 1'),
(306, '22031098', 'SUKYAN ', 1, 'Plant 2'),
(307, '22031099', 'SEPTIANA DWI PERMANA ', 1, 'Plant 2'),
(308, '22031100', 'PUTRA YULIANTO ', 1, 'Plant 2'),
(309, '22031101', 'ASEP MAUSUL ', 4, 'Plant 1'),
(310, '22031102', 'RESTU DWI FITRIYANTO ', 1, 'Plant 2'),
(311, '22031107', 'TEGAR ADITYA ', 1, 'Plant 2'),
(312, '22041114', 'GINTARA RAHMA ARDIS SAPUTRO ', 7, ''),
(313, '22041116', 'MUHAMMAD RIZKI ', 7, ''),
(314, '22041118', 'WAHYU  BUDI UTOMO ', 1, 'Plant 2'),
(315, '22061120', 'DWI CAHYONO', 6, 'Plant 1'),
(316, '22061122', 'RIZALDI LUTHFI RAMADHAN', 4, 'Plant 1'),
(317, '22071124', 'MOHAMAD AJI PRASETIYO', 9, ''),
(318, '22071125', 'MUHAMAD FAUZAN HAKIM', 1, 'Plant 2'),
(319, '22071126', 'FEBRIO EKA ARISTYANO', 1, 'Plant 2'),
(320, '22071127', 'ITA NIAR', 1, 'Plant 2'),
(321, '22071128', 'CANDRA NOVIAN', 1, 'Plant 2'),
(322, '22071129', 'M.TEGUH BUDI SANTOSO', 9, ''),
(323, '22071130', 'NADI KURNIAWAN', 9, ''),
(324, '22071131', 'FIKRI RIZAL RULHAK', 9, ''),
(325, '22071132', 'MUHAMAD TUBAGUS ANNUR', 7, ''),
(326, '22071133', 'RIVAL WIJAYA', 7, ''),
(327, '22071134', 'ARDHIKA REZA', 1, 'Plant 2'),
(328, '22071136', 'ADITYA FATKHURAHMAN', 1, 'Plant 2'),
(329, '22071137', 'WASDI MAULANA', 1, 'Plant 2'),
(330, '22071138', 'CANDRA MAESA ZENAR', 1, 'Plant 2'),
(331, '22071139', 'YOGI ARIZAL', 1, 'Plant 2'),
(332, '22071140', 'RIFQI MAULANA FAZRI', 1, 'Plant 2'),
(333, '22071141', 'LUKMAN NUL HAKIM ', 1, 'Plant 2'),
(334, '22071142', 'ABDUL LATIP ', 1, 'Plant 2'),
(335, '22081145', 'DEVI RAHMAWAN ', 1, 'Plant 2'),
(336, '22081146', 'MUHAMAD NAZARUDIN ', 1, 'Plant 2'),
(337, '22081147', 'AHMAD SAEFUL BAHRI ', 1, 'Plant 2'),
(338, '22081148', 'ARIZ NUR SAMSI ', 1, 'Plant 2'),
(339, '22081150', 'ANAFI HIBAN GHIFARI ', 1, 'Plant 2'),
(340, '22091151', 'ACHMAD FAUZI PRADITA ', 1, 'Plant 2'),
(341, '22091152', 'PERI ANDRIANSAH', 1, 'Plant 2'),
(342, '22091153', 'ADHI PRASETYO', 7, ''),
(343, '22091154', 'MUHAMAD RIFQI PUTRA SYAH', 13, ''),
(344, '22091157', 'WAHYU HIDAYAT', 9, ''),
(345, '22111158', 'DITA KRESAWULANDARI ', 13, 'Plant 2'),
(346, '22121161', 'MUHAMAD AR-RIVAN ', 7, ''),
(347, '22121163', 'ILHAM PRAYOGA', 1, 'Plant 2'),
(348, '22121164', 'ADITIA FIRMANSAH', 1, 'Plant 2'),
(349, '22121165', 'FIYAN NURPIANDI ', 13, ''),
(350, '22121167', 'MUHAMAD INDRA RIVALDI ', 1, 'Plant 2'),
(351, '22121168', 'SETIYANTO ', 1, 'Plant 2'),
(352, '23011169', 'MOH.KHAIRUL UMAM', 7, ''),
(353, '23021170', 'MIRINDA LESTARIANA AGUSTIANI ', 13, ''),
(354, '23021171', 'DEWI KARTINI ', 13, ''),
(355, '23021172', 'HAMBALI ', 13, ''),
(356, '23021173', 'RAHMAT HIDAYAT ', 13, ''),
(357, '23031174', 'MUHAMAD THORIK AZIZ ', 1, 'Plant 2'),
(358, '23031175', 'MUHAMAD YAHYA ', 1, 'Plant 2'),
(359, '23031176', 'RIZKI PAUJI', 9, ''),
(360, '23031177', 'FAOZAN SUHARSO ', 8, ''),
(361, '23041178', 'YUDI SUPRIYADI ', 9, ''),
(362, '23051179', 'MARIO ', 1, 'Plant 2'),
(363, '23051180', 'RAHMAT NURGIYANTO ', 1, 'Plant 2'),
(364, '23051181', 'GUSTI ERLANGGA ', 1, 'Plant 2'),
(365, '23051182', 'TRIAGAM SAPUTRA ', 1, 'Plant 2'),
(366, '23051183', 'RAMDANI ', 1, 'Plant 2'),
(367, '23051184', 'ADI BAGASKARA ', 1, 'Plant 2'),
(368, '23051185', 'RIZKY ARDIANA PRASETYO ', 9, ''),
(369, '23051186', 'DITA INDAH RAHUTAMI ', 3, 'Plant 1'),
(370, '23061187', 'DARAJAT BAGUS PRASETYO', 7, ''),
(371, '23061188', 'AHMAD JOHARUDIN ', 7, ''),
(372, '23061189', 'FARIDZ HAIKAL ', 1, 'Plant 2'),
(373, '23061190', 'ADNAN AL GANI ', 4, 'Plant 1'),
(374, '23061191', 'DENI NUGRAHA ', 7, ''),
(375, '23061192', 'RIO SAEFLINDA FAHRUDIN ', 1, 'Plant 2'),
(376, '23061193', 'RIKI NOFRIYANDI ', 1, 'Plant 2'),
(377, '23061194', 'SONY SYAIFUL ', 1, 'Plant 2'),
(378, '23061195', 'ALIKHTIAR DWI MAOLANA', 1, 'Plant 2'),
(379, '23061196', 'JOKO MULYANTO ', 1, 'Plant 2'),
(380, '23061197', 'ALFREDO ERI SAPUTRA ', 13, ''),
(381, '23061198', 'NOVI RAHMATYASTUTI ', 13, ''),
(382, '23061199', 'DICKY MELLIANO ', 1, 'Plant 2'),
(383, '23061200', 'ABDUL MAZID', 13, ''),
(384, '23061201', 'ANJAR FIRMANSAH ', 13, ''),
(385, '23071202', 'ADJI PRANATA KUSUMA ', 7, ''),
(386, '23071203', 'RHENDY MACHINI SINAGA ', 1, 'Plant 2'),
(387, '23071204', 'DIAN INDRA LESMANA ', 1, 'Plant 2'),
(388, '23071205', 'FIKRI MUHAMMAD HAEKAL ', 1, 'Plant 2'),
(389, '23071206', 'RIVAN SYAH GUNAWAN SAPUTRA ', 1, 'Plant 2'),
(390, '23071207', 'NOVI SANDI SUTISNA ', 13, ''),
(391, '23071208', 'ARIF DWI FADLUROHMAN ', 7, ''),
(392, '23071209', 'ABDUL SYUKUR ', 7, ''),
(393, '23071210', 'MUHAMAD NASIR', 1, 'Plant 2'),
(394, '23071211', 'MUHAMAD ABDUL GAPUR ', 7, ''),
(395, '23071212', 'RUSWADI ', 1, 'Plant 2'),
(396, '23071213', 'AZY MUNAWAR ', 1, 'Plant 2'),
(397, '23071214', 'MUHAMMAD FADHIL GHULAM', 1, 'Plant 2'),
(398, '23071215', 'FIKRI ABDUL GHOFAR ', 13, ''),
(399, '23071216', 'AYUP KURNIAWAN ', 13, ''),
(400, '23081217', 'MAULANA PAJAR MAHPUDIN ', 1, 'Plant 2'),
(401, '23081218', 'ZIKRI RAMADHAN ', 13, ''),
(402, '23081220', 'FADLI DWI SURYANTO ', 7, ''),
(403, '23091221', 'HAERUDINSYAH ', 3, 'Plant 1'),
(404, '23091222', 'DANI ALIF MUSTOFA ', 7, ''),
(405, '23091223', 'DIKI WAHYUDI', 9, ''),
(406, '23091224', 'DHIMAS ARIES RUDY PRATAMA ', 7, ''),
(407, '23091225', 'EGA PERMANA', 1, 'Plant 2'),
(408, '23091226', 'MUHAMAD YAYAN ANSORI ', 1, 'Plant 2'),
(409, '23091227', 'DIMAS ANGGARA ', 1, 'Plant 2'),
(410, '23091228', 'MUHAMMAD FEBRIANTO ', 1, 'Plant 2'),
(411, '23091229', 'ALDI MAULANA ', 1, 'Plant 2'),
(412, '23091230', 'GELIS NURAPRIANTI', 13, ''),
(413, '23091231', 'CHUCUN TRIYATNA SUGANDI ', 9, ''),
(414, '23101233', 'TONI ALFRED SUGIARTO ', 1, 'Plant 2'),
(415, '23101234', 'GUNUNG ARENA PAMUNGKAS ', 13, ''),
(416, '23101235', 'RINDI MELDANIA', 3, 'Plant 1'),
(417, '23101236', 'WIDIA KUS APRILA MANTO ', 13, ''),
(418, '23111237', 'RENDY PRODIPTA MARPAUNG', 13, ''),
(419, '23111238', 'SIDIK ABQORI ', 13, ''),
(420, '23111239', 'SOLAHUDIN  AL AYUBI ', 7, ''),
(421, '23111240', 'SATRIA ADI NUGROHO ', 13, ''),
(422, '23111241', 'TEGUH PAMUNGKAS ', 7, ''),
(423, '23111242', 'INDRA NUR ISKANDAR ', 13, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1704613364, 1),
(2, '2024-01-07-081446', 'App\\Database\\Migrations\\DepartementMigration', 'default', 'App', 1704615485, 2),
(3, '2024-01-08-021540', 'App\\Database\\Migrations\\KaryawanMigration', 'default', 'App', 1704682196, 3),
(4, '2024-01-08-031901', 'App\\Database\\Migrations\\SplMigration', 'default', 'App', 1704684907, 4);

-- --------------------------------------------------------

--
-- Table structure for table `spl`
--

CREATE TABLE `spl` (
  `spl_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(20) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `description` text NOT NULL,
  `approve_foreman` int(11) DEFAULT NULL,
  `approve_manager` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `spl`
--

INSERT INTO `spl` (`spl_id`, `date`, `shift`, `karyawan_id`, `from`, `to`, `description`, `approve_foreman`, `approve_manager`, `created_at`, `updated_at`, `deleted_at`) VALUES
(37, '2024-01-18', 'Shift 1', 277, '17:00:00', '20:00:00', 'Input Data', NULL, NULL, '2024-01-18 04:56:41', '2024-01-18 05:50:21', '0000-00-00 00:00:00'),
(38, '2024-01-18', 'Shift 2', 315, '17:00:00', '20:00:00', 'Install Ulang', NULL, NULL, '2024-01-18 05:53:00', '2024-01-18 05:53:00', '0000-00-00 00:00:00'),
(39, '2024-01-18', 'Shift 1', 231, '17:00:00', '20:00:00', 'Input Data', NULL, NULL, '2024-01-18 05:59:43', '2024-01-18 05:59:43', '0000-00-00 00:00:00'),
(40, '2024-01-18', 'Shift 1', 115, '17:00:00', '20:00:00', 'Input Data', NULL, NULL, '2024-01-18 06:08:49', '2024-01-18 06:08:49', '0000-00-00 00:00:00'),
(41, '2024-01-18', 'Shift 1', 101, '17:00:00', '20:00:00', 'Input Data', NULL, NULL, '2024-01-18 06:09:45', '2024-01-18 06:09:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `departement_id` int(10) UNSIGNED DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `departement_id`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dwi.cahyono@ijtt-id.com', 'Dwi Cahyono', 6, '$2y$10$Rhi23uMqy1LouN7nos4wI.jaffnnhpcQFbcggnEeoi/Xdki8e2E.a', NULL, NULL, NULL, '45c8d1185abf24f18ea759b29507b2c4', NULL, NULL, 1, 0, '2024-01-09 03:05:38', '2024-01-09 03:05:38', NULL),
(9, 'zulfy@ijtt-id.com', 'Zulfy Triyoga', 6, '$2y$10$5ZMoEOAudFX77i5BFTGogerfXp2P00dI9ccFExW5eqL8ts99VCytC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(12, 'rochmat@ijtt-id.com', 'Rochmat', 3, '$2y$10$BNq842Inj9UcRGofOzzkLOHQ7eCpJ4wHCL72zjZDLzSYv4nToiXYi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(13, 'corry@ijtt-id.com', 'Chorridatul Mahmudah', 3, '$2y$10$R6TUYXLVxMcYPmGpi6UFtulm3/Q10PYu9KK99iSa./LcRpc8KyEMS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(14, 'ai_fitria@ijtt-id.com', 'Ai Fitria', 5, '$2y$10$UW9lQjCFWgxp1fT2vuioZ.dZR7t9oZu2CkcFyZewVOV5jZAlaY8I6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(15, 'heni.priyanti@ijtt-id.com', 'Heni Priyanti', 5, '$2y$10$mX02zl0XhTY2m2SWNn6UB.NvJtqg4NVha5SQkLiH/BKv6FvWSTfYu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(16, 'ipul@ijtt-id.com', 'Muhamad Syaifulloh', 12, '$2y$10$X2mpNzRLAfkHW1QaVxhWjO5H0UlJHpC0nbf2PeTCe7n7K5tM3qQhi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(17, 'janiar@ijtt-id.com', 'Janiar Usman', 12, '$2y$10$KfsyF5ZlVruN0DBGGEqRreRG.QolzmxDYjCdX7cajc6lzOu.qOSui', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(18, 'ida.rusdiansyah@ijtt-id.com', 'Ida Rusdiansyah', 14, '$2y$10$Mz8VNO907.7Hl8u5VERGMO4Z1mQDT8kHjlRGIdtoPCPrWoMplnmEy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(19, 'aris.mamun@ijtt-id.com', 'Aris Ma\'Mun', 14, '$2y$10$kPL8vhpDpR/LZkrmJ3W.IeRwZ2Vy8gXIwOICARf8p4A26VjPB2.a6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`groups_users_id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spl`
--
ALTER TABLE `spl`
  ADD PRIMARY KEY (`spl_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `groups_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `departement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `karyawan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spl`
--
ALTER TABLE `spl`
  MODIFY `spl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
