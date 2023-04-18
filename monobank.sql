-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2023 at 06:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monobank`
--

-- --------------------------------------------------------

--
-- Table structure for table `aza`
--

CREATE TABLE `aza` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num` varchar(10) NOT NULL,
  `status` enum('active','inactive','held','suspended') NOT NULL DEFAULT 'active',
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `reason_for_block` varchar(191) DEFAULT NULL,
  `balance` varchar(191) NOT NULL DEFAULT '0',
  `routing` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aza_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aza`
--

INSERT INTO `aza` (`id`, `num`, `status`, `is_blocked`, `reason_for_block`, `balance`, `routing`, `user_id`, `aza_type_id`, `created_at`, `updated_at`) VALUES
(2, '0593966594', 'held', 1, 'conflict', '540', NULL, 1, 1, '2023-04-03 14:10:03', '2023-04-05 17:10:40'),
(3, '1485386654', 'active', 0, NULL, '0', NULL, 2, 1, '2023-04-03 15:29:29', '2023-04-03 16:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `aza_types`
--

CREATE TABLE `aza_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aza_types`
--

INSERT INTO `aza_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'savings', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(2, 'checking', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(3, 'joint', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(4, 'loan', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(5, 'fixed', '2023-04-02 23:14:46', '2023-04-02 23:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_num` varchar(191) NOT NULL,
  `pan` varchar(10) DEFAULT NULL,
  `balance` varchar(15) DEFAULT NULL,
  `pin` varchar(4) NOT NULL DEFAULT '0000',
  `cvv` varchar(4) NOT NULL DEFAULT '111',
  `expiry` varchar(5) NOT NULL,
  `expiry_timestamp` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `card_kind_id` bigint(20) UNSIGNED NOT NULL,
  `card_type_id` bigint(20) UNSIGNED NOT NULL,
  `card_group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_num`, `pan`, `balance`, `pin`, `cvv`, `expiry`, `expiry_timestamp`, `status`, `card_kind_id`, `card_type_id`, `card_group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '587098098948965', '2620817170', '1', '0000', '539', '04/26', '2026-04-03 10:33:24', 1, 1, 2, 2, 1, '2023-04-03 14:33:24', '2023-04-03 14:33:24'),
(3, '4250547721018193', NULL, '1', '0000', '927', '04/26', '2026-04-03 11:29:36', 1, 1, 1, 1, 1, '2023-04-03 15:29:38', '2023-04-03 15:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `card_groups`
--

CREATE TABLE `card_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_groups`
--

INSERT INTO `card_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'visa', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(2, 'master card', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(3, 'verve', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(4, 'american express', '2023-04-02 23:14:45', '2023-04-02 23:14:45'),
(5, 'discover', '2023-04-02 23:14:45', '2023-04-02 23:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `card_kinds`
--

CREATE TABLE `card_kinds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_kinds`
--

INSERT INTO `card_kinds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'virtual', '2023-04-02 23:14:44', '2023-04-02 23:14:44'),
(2, 'physical', '2023-04-02 23:14:44', '2023-04-02 23:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `card_types`
--

CREATE TABLE `card_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `card_types`
--

INSERT INTO `card_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'debit', '2023-04-02 23:14:44', '2023-04-02 23:14:44'),
(2, 'credit', '2023-04-02 23:14:45', '2023-04-02 23:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(15) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` longtext NOT NULL,
  `subject` varchar(100) DEFAULT 'Contact Form Message',
  `acc_num` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `type`, `fullname`, `email`, `phone`, `message`, `subject`, `acc_num`, `created_at`, `updated_at`) VALUES
(1, 'contact', 'Nina Everett', 'veredo@mailinator.com', '+1374647-1849', 'Ut non possimus con', 'Officiis esse in eos', NULL, '2023-04-03 10:33:46', '2023-04-03 10:33:46'),
(2, 'suspension', 'Herman Macdonald Kay Paul', 'qisiqevi@mailinator.com', '+1952932-8827', 'Magna amet quia ut', 'Ut qui sint quis et', 'Voluptate', '2023-04-04 13:36:08', '2023-04-04 13:36:08'),
(3, 'suspension', 'Sybil Bowman Sybil Fernandez', 'wifa@mailinator.com', '+1624973-6566', 'Repudiandae repudian', 'Eos et illum est q', 'Reprehende', '2023-04-04 13:46:09', '2023-04-04 13:46:09'),
(4, 'suspension', 'Grady Joyner Ramona Peck', 'byked@mailinator.com', '+1262489-4294', 'Sed ut aperiam volup', 'Qui expedita natus m', 'Porro anim', '2023-04-04 13:47:43', '2023-04-04 13:47:43'),
(5, 'suspension', 'Roary Booth Olga Crawford', 'nafahoj@mailinator.com', '+1199439-4991', 'Est quia quaerat sin', 'Recusandae Esse ma', 'Tempor deb', '2023-04-04 13:49:08', '2023-04-04 13:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_31_143603_create_card_kinds_table', 1),
(6, '2022_07_31_143837_create_card_groups_table', 1),
(7, '2022_07_31_143859_create_card_types_table', 1),
(8, '2022_07_31_144957_create_cards_table', 1),
(9, '2022_08_02_085135_create_aza_table', 1),
(10, '2022_08_02_105305_create_profiles_table', 1),
(11, '2022_10_29_095016_create_aza_types_table', 1),
(12, '2022_10_31_082730_create_payments_table', 1),
(13, '2023_03_25_230121_create_contact_messages_table', 1),
(14, '2023_03_30_031953_add_photo_url_to_users_table', 1),
(15, '2023_03_31_204334_add_international_transfer_fields_to_payments_table', 1),
(16, '2023_04_01_005847_add_iban_number_to_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(20) NOT NULL,
  `sender_bank` varchar(50) NOT NULL,
  `sender_acc` varchar(10) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `receiver_bank` varchar(50) NOT NULL,
  `receiver_acc` varchar(10) NOT NULL,
  `receiver` varchar(40) NOT NULL,
  `receiver_routing_num` int(11) NOT NULL DEFAULT 123456789,
  `recipient_iban_num` varchar(35) NOT NULL DEFAULT 'iban_num_from_34_to_35_digits',
  `type` enum('credit','debit') NOT NULL,
  `medium` varchar(50) NOT NULL,
  `amount` double(15,2) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `status` enum('pending','successful','failed','declined') NOT NULL DEFAULT 'successful',
  `trx_email` longtext DEFAULT NULL,
  `trx_sms` longtext DEFAULT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `mod_trx_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_foreign` tinyint(1) NOT NULL DEFAULT 0,
  `recipient_current_address` varchar(200) NOT NULL DEFAULT 'n/a',
  `recipient_bank_address` varchar(200) NOT NULL DEFAULT 'n/a',
  `recipient_bank_account_type` enum('savings','checking') NOT NULL DEFAULT 'savings',
  `jurisdiction` enum('domestic','foreign') NOT NULL DEFAULT 'domestic',
  `recipient_swift_or_bic_code` varchar(35) NOT NULL DEFAULT 'n/a',
  `recipient_phone` varchar(17) NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `uid`, `sender_bank`, `sender_acc`, `sender`, `receiver_bank`, `receiver_acc`, `receiver`, `receiver_routing_num`, `recipient_iban_num`, `type`, `medium`, `amount`, `remarks`, `status`, `trx_email`, `trx_sms`, `sender_id`, `receiver_id`, `mod_trx_date`, `created_at`, `updated_at`, `is_foreign`, `recipient_current_address`, `recipient_bank_address`, `recipient_bank_account_type`, `jurisdiction`, `recipient_swift_or_bic_code`, `recipient_phone`) VALUES
(5, '093642be7279bfb8', 'Bluebird', '0593966594', 'Webdev587', 'Bluebird', '0593966594', 'Webdev587', 123456789, 'iban_num_from_34_to_35_digits', 'credit', 'cash', 800.00, 'cash deposit', 'successful', NULL, NULL, 1, 1, NULL, '2023-04-04 13:00:23', '2023-04-04 13:00:23', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(6, '093642beca3b3e48', 'Bluebird', '0593966594', 'Webdev587', 'chase', '5135135135', 'Illana Heath', 797979793, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 75.00, 'Transfer of $75 from Webdev587 to Illana Heath', 'successful', NULL, NULL, 1, 0, NULL, '2023-04-04 13:23:47', '2023-04-04 13:23:47', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(7, '093642beca510ca2', 'Bluebird', '0593966594', 'Webdev587', 'chase', '5135135135', 'Illana Heath', 797979793, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 75.00, 'Transfer of $75 from Webdev587 to Illana Heath', 'successful', NULL, NULL, 1, 0, NULL, '2023-04-04 13:23:49', '2023-04-04 13:23:49', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(8, '093642becd493831', 'Bluebird', '0593966594', 'Webdev587', 'chase', '7353893893', 'Ryan Daugherty', 389389389, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 50.00, 'Transfer of $50 from Webdev587 to Ryan Daugherty', 'successful', NULL, NULL, 1, 0, NULL, '2023-04-04 13:24:36', '2023-04-04 13:24:36', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(9, '093642bed407f1e7', 'Bluebird', '0593966594', 'Webdev587', 'chase', '3893893893', 'Cole Stein', 387389389, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 50.00, 'Transfer of $50 from Webdev587 to Cole Stein', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:26:24', '2023-04-04 13:26:24', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(10, '093642bedd3009e3', 'Bluebird', '0593966594', 'Webdev587', 'Maxine Moody', '9841841841', 'Cassandra Glenn', 418418418, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 39.00, 'Transfer of $39 from Webdev587 to Cassandra Glenn', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:28:51', '2023-04-04 13:28:51', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(11, '093642bee38396c0', 'Bluebird', '0593966594', 'Webdev587', 'chase', '5525525521', 'Eugenia Horton', 552552552, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 26.00, 'Transfer of $26 from Webdev587 to Eugenia Horton', 'successful', NULL, NULL, 1, 0, NULL, '2023-04-04 13:30:32', '2023-04-04 13:30:32', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(12, '093642bee3d16e4a', 'Bluebird', '0593966594', 'Webdev587', 'chase', '5525525521', 'Eugenia Horton', 552552552, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 26.00, 'Transfer of $26 from Webdev587 to Eugenia Horton', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:30:37', '2023-04-04 13:30:37', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(13, '093642bee42a9313', 'Bluebird', '0593966594', 'Webdev587', 'chase', '5525525521', 'Eugenia Horton', 552552552, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 26.00, 'Transfer of $26 from Webdev587 to Eugenia Horton', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:30:42', '2023-04-04 13:30:43', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(14, '093642bef759b45e', 'Bluebird', '0593966594', 'Webdev587', 'chase', '5525525521', 'Eugenia Horton', 552552552, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 26.00, 'Transfer of $26 from Webdev587 to Eugenia Horton', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:35:49', '2023-04-04 13:35:49', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(15, '093642bf0de30a8d', 'Bluebird', '0593966594', 'Webdev587', 'Clementine Gross', '8498498419', 'Jena Rowe', 192929292, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 60.00, 'Transfer of $60 from Webdev587 to Jena Rowe', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:41:50', '2023-04-04 13:41:50', 1, 'A eos quae voluptat', 'Qui id consequuntur', 'checking', 'foreign', 'Nostrud quaerat inve', '2236946502'),
(16, '093642bf148adbc8', 'Bluebird', '0593966594', 'Webdev587', 'chase', '8718718718', 'Rajah Hayden', 871871871, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 70.00, 'Transfer of $70 from Webdev587 to Rajah Hayden', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:43:36', '2023-04-04 13:43:37', 1, 'Laborum Similique v', 'Vel aperiam facere s', 'checking', 'foreign', 'Aut ad veniam rerum', '+1 (396) 923-9748'),
(17, '093642bf1ac964c3', 'Bluebird', '0593966594', 'Webdev587', 'herthabsc', '4094094092', 'Herman Gamble', 0, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 69.00, 'Transfer of $69 from Webdev587 to Herman Gamble', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:45:16', '2023-04-04 13:45:17', 1, 'Sunt nobis error rep', 'Itaque temporibus do', 'checking', 'foreign', 'Sequi nostrud sed qu', '+1 (585) 868-7801'),
(18, '093642bf1d51f0f6', 'Bluebird', '0593966594', 'Webdev587', 'herthabsc', '4094094092', 'Herman Gamble', 0, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 69.00, 'Transfer of $69 from Webdev587 to Herman Gamble', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:45:57', '2023-04-04 13:45:57', 1, 'Sunt nobis error rep', 'Itaque temporibus do', 'checking', 'foreign', 'Sequi nostrud sed qu', '+1 (585) 868-7801'),
(19, '093642bf22f344cc', 'Bluebird', '0593966594', 'Webdev587', 'Keegan Wheeler', '6102172171', 'Autumn Coffey', 217217217, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 80.00, 'Transfer of $80 from Webdev587 to Autumn Coffey', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:47:27', '2023-04-04 13:47:27', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(20, '093642bf28af1def', 'Bluebird', '0593966594', 'Webdev587', 'hertha', '7997997997', 'Stephen Chapman', 0, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 20.00, 'Transfer of $20 from Webdev587 to Stephen Chapman', 'pending', NULL, NULL, 1, 0, NULL, '2023-04-04 13:48:58', '2023-04-04 13:48:59', 1, 'Et hic accusantium e', 'Nisi aut eos veniam', 'savings', 'foreign', 'In iusto possimus d', '+1 (219) 811-6733'),
(21, '093642bf2da2e4e2', 'Bluebird', '0593966594', 'Webdev587', 'Aurora', '7997995497', 'Rinah Justice', 121799799, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 10.00, 'Transfer of $10 from Webdev587 to Rinah Justice', 'successful', NULL, NULL, 1, 0, NULL, '2023-04-04 13:50:18', '2023-04-04 13:50:18', 0, 'n/a', 'n/a', 'savings', 'domestic', 'n/a', 'n/a'),
(22, '093642bf322580dc', 'Bluebird', '0593966594', 'Webdev587', 'Aurora', '7997997994', 'Anastasia Cole', 799799799, 'iban_num_from_34_to_35_digits', 'debit', 'local_transfer', 24.00, 'Transfer of $24 from Webdev587 to Anastasia Cole', 'successful', NULL, NULL, 1, 0, NULL, '2023-04-04 13:51:30', '2023-04-04 13:51:30', 1, 'Obcaecati id et cor', 'Atque velit quis dol', 'savings', 'foreign', 'Quam ut laborum Lab', '+1 (386) 649-7367');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `midname` varchar(50) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `dob` varchar(191) DEFAULT NULL,
  `sex` enum('male','female','others') DEFAULT NULL,
  `marital_status` enum('single','married','others') DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `nok_name` varchar(191) DEFAULT NULL,
  `nok_relationship` varchar(191) DEFAULT NULL,
  `nok_address` varchar(191) DEFAULT NULL,
  `nok_phone` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `fname`, `lname`, `midname`, `phone`, `dob`, `sex`, `marital_status`, `address`, `nok_name`, `nok_relationship`, `nok_address`, `nok_phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'webdev587', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-04-02 23:14:46', '2023-04-02 23:14:46'),
(2, 'webdev587', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-04-03 14:10:02', '2023-04-03 14:10:02'),
(3, 'peterparker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-04-03 15:29:25', '2023-04-03 15:29:25'),
(4, 'peterparker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-04-03 15:29:26', '2023-04-03 15:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dp` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `dp`) VALUES
(1, 'webdev587', 'webdev587@gmail.com', NULL, '$2y$10$qZFRMztT1lJ8EMH5WTStweJ6eLDf9wvDfzip2iQwrCmjqQJdU/UHG', 0, NULL, '2023-04-02 23:14:46', '2023-04-03 01:05:01', 'public/avatarz/AaPMoDHlww5gQrhWm1t4DR3y30CLeTwxZ7adHYHr.jpg'),
(2, 'peterparker', 'peterparker@gmail.com', NULL, '$2y$10$6nv3AenYlckxafQ1I0cDmuNfAq6TlbzVuxwf.lzdg0KbtsKjeTZxC', 0, NULL, '2023-04-03 15:28:04', '2023-04-03 15:28:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aza`
--
ALTER TABLE `aza`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aza_num_unique` (`num`);

--
-- Indexes for table `aza_types`
--
ALTER TABLE `aza_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_groups`
--
ALTER TABLE `card_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_kinds`
--
ALTER TABLE `card_kinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_types`
--
ALTER TABLE `card_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_uid_unique` (`uid`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aza`
--
ALTER TABLE `aza`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aza_types`
--
ALTER TABLE `aza_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card_groups`
--
ALTER TABLE `card_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_kinds`
--
ALTER TABLE `card_kinds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `card_types`
--
ALTER TABLE `card_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
