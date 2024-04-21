-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 09:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillsparq`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `auction_id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `starting_bid` varchar(255) NOT NULL,
  `min_bid_amount` varchar(255) NOT NULL,
  `current_highest_bid` varchar(255) DEFAULT NULL,
  `winning_bidder_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED DEFAULT NULL,
  `buyer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`auction_id`, `start_time`, `end_time`, `starting_bid`, `min_bid_amount`, `current_highest_bid`, `winning_bidder_id`, `job_id`, `buyer_id`) VALUES
(1, '2024-04-29 19:50:00', '2024-05-23 19:50:00', '$200', '$30', '$30', 0, 11, 9),
(2, '2024-04-22 19:52:00', '2024-05-10 19:52:00', '$500', '$30', '$30', 0, 13, 9),
(3, '2024-05-07 19:54:00', '2024-05-31 22:55:00', '$400', '$50', '$50', 0, 15, 9);

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`) VALUES
(1),
(2),
(7),
(9),
(10),
(15);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_support_assistants`
--

CREATE TABLE `customer_support_assistants` (
  `customer_support_assistant_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `gig_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `ongoing_order_count` int(10) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `state` varchar(50) DEFAULT 'InActive',
  `seller_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`gig_id`, `title`, `description`, `category`, `cover_image`, `ongoing_order_count`, `created_at`, `state`, `seller_id`) VALUES
(12, 'cvcxv', 'xcvccvc', 'Graphics & Design', 'C (1).jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(15, 'I will do your html css javascript cpp java python programming projects', 'Greetings!\r\n\r\n<<Please contact me before placing an order>>\r\n\r\n\r\n\r\nWelcome to the solution of hub for all your programming needs, a professional programmer proficient in HTML CSS, JavaScript, C++, Java and Python. Whether you\'re looking to build a stunning website, optimize user experiences or develop robust software solutions? Then you are at right place.\r\n\r\n\r\n\r\nMy services:\r\n\r\n﻿Software Development\r\nDesktop Application\r\nWeb Development\r\nBug Fixing and Optimization\r\nResponsive Design\r\nAPI Integration\r\nDatabase Connectivity\r\n\r\n\r\nLanguage:\r\n\r\nHTML\r\nCSS\r\nJavaScript\r\nC++\r\nJava\r\nPython\r\n\r\n\r\nWhy Choose me?\r\n\r\nClient Satisfaction\r\nTailored Solution\r\nTimely Delivery\r\nUnlimited Revision\r\n\r\n\r\nNote: This Gig is Exclusively for Fiverr\r\n\r\n\r\n\r\nThanks\r\n\r\nRegards,\r\n\r\nAsad A', 'Programming & Tech', 'do-your-html-css-cpp-java-python-programming-projects.jpg', 0, '2024-01-29 10:36:56', 'InActive', 3),
(20, 'lsjdflskfj', 'ksjdflnksdf', 'Graphics & Design', 'intellihackwshop26623c573600de9.96167435_1713620339_88873.jpg', 0, '2024-04-20 15:38:59', 'InActive', 3),
(21, 'I will create mobile application with flutter, React Native and Android Native.', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Writing & Translation', 'multipleselecttag6623dc8fdb01d2.23249141_1713626255_41558.jpg', 0, '2024-04-20 17:17:35', 'InActive', 3),
(22, 'hey yaluwe api awa ', 'skdjfklsdnpoiwvjepfimaposvms', 'Business', NULL, 0, '2024-04-20 18:54:26', 'InActive', 3);

-- --------------------------------------------------------

--
-- Table structure for table `help_requests`
--

CREATE TABLE `help_requests` (
  `request_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help_requests`
--

INSERT INTO `help_requests` (`request_id`) VALUES
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(10) UNSIGNED NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `attachements` varchar(255) DEFAULT NULL,
  `response` text DEFAULT NULL,
  `inquiry_status` varchar(255) NOT NULL DEFAULT 'unsolved',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `inquiry_originator_id` int(10) UNSIGNED NOT NULL,
  `customer_support_assistant_id` int(10) UNSIGNED NOT NULL,
  `inquiry_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `subject`, `description`, `attachements`, `response`, `inquiry_status`, `created_at`, `inquiry_originator_id`, `customer_support_assistant_id`, `inquiry_type`) VALUES
(1, 'rerere', 'rerererer', 'ATM simulation.zip65b7b7540eb393.02237679_1706538836_dsahan_help request.zip', NULL, 'unsolved', '2024-01-29 15:33:56', 1, 0, 'help request'),
(2, 'wewe', 'wewe', 'ATM simulation.zip65b7b7aa3edf18.81857004_1706538922_dsahan_help request.zip', NULL, 'unsolved', '2024-01-29 15:35:22', 1, 0, 'help request'),
(3, 'df', 'df', '', NULL, 'unsolved', '2024-01-30 21:05:09', 1, 0, 'help request'),
(4, 's1', 'dwss', 'ATM simulation.zip65d22908b70559.56897153_1708271880_dsahan_help request.zip', NULL, 'unsolved', '2024-02-18 16:58:00', 1, 0, 'help request');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `deadline` datetime NOT NULL DEFAULT current_timestamp(),
  `publish_mode` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `flexible_amount` tinyint(4) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `buyer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `description`, `file`, `category`, `deadline`, `publish_mode`, `amount`, `flexible_amount`, `created_at`, `buyer_id`) VALUES
(11, 'JOB #0001', 'I WANT TO CREATE A MOBILE APPLICATION WITH FLUTTER', '', 'Programming & Tech', '2024-04-24 00:00:00', 'Auction Mode', '$200', 0, '2024-04-20 16:20:44', 9),
(12, 'JOB #002', 'I JUST WANT A VIDEO EDITOR WHO IS FLUENT IN HANDLING PREMIER PRO', '', 'Video & Animation', '2024-05-01 00:00:00', 'Standard Mode', '$400', 1, '2024-04-20 16:21:36', 9),
(13, 'JOB #003', 'WANT THE EXPERTISE OF A DATA SCIENTIST WHO HAS EXPERIENCE IN PANDAS LIBRARY.', '', 'Data', '2024-05-02 00:00:00', 'Auction Mode', '$500', 0, '2024-04-20 16:22:45', 9),
(14, 'JOB #004', 'I NEED TO EDIT A MUSIC TRACK THAT HAVE SOME BACKGROUND NOISES.', '', 'Music & Audio', '2024-05-23 00:00:00', 'Standard Mode', '$600', 1, '2024-04-20 16:23:53', 9),
(15, 'JOB #005', 'I NEED A PROOF READER WHO CAN PROOF READ A THESIS WHICH HAVE 1000 WORDS.', '', 'Writing & Translation', '2024-05-01 00:00:00', 'Auction Mode', '$400', 0, '2024-04-20 16:25:18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `job_orders`
--

CREATE TABLE `job_orders` (
  `job_order_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `job_proposal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_proposals`
--

CREATE TABLE `job_proposals` (
  `proposal_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `bid_amount` int(10) DEFAULT NULL,
  `attachments` varchar(255) NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_proposals`
--

INSERT INTO `job_proposals` (`proposal_id`, `description`, `bid_amount`, `attachments`, `job_id`, `buyer_id`, `seller_id`, `Status`) VALUES
(1, 'slfdjklskdfjslnf', NULL, 'intellihackwshop36623d192abdf02.28394408_1713623442_17736.jpg', 12, 9, 3, 'pending'),
(2, 'slakjflskdnclsdkvmlsakjfldakfjcndsalkvjsoivwr9j83749823ru90387t390823ye9w8fw8h76ava9s8daujw09r2ijd987ds9v8yh492r23joiduv9s8vijoifkjsovisyv8a7rywujdnkcms,cZx\'kapoidjqnk', 45, '0066624aea422b5f2.61901097_1713680036_16565.jpg', 13, 9, 3, 'pending'),
(3, 'sldfkmsndlknslvk', 20, '0126624e6379f4a67.08725785_1713694263_62495.jpg', 13, 9, 3, 'pending'),
(4, 'slkdjflskdfjlsndvkjoifujk                                                                                          hey yaluwe api awa \r\n\r\n\r\n\r\n\r\n', NULL, '0106625050b5f35b9.83844880_1713702155_43978.jpg', 12, 9, 3, 'Rejected'),
(5, 'lskdflskdf nsldkvjmspdoifkjweoflksmdlcksdlmck', 300, '007662523384eb004.78317331_1713709880_74501.jpg', 15, 9, 3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `milestone_id` int(10) UNSIGNED NOT NULL,
  `subject` text DEFAULT NULL,
  `no_of_revisions` int(10) DEFAULT NULL,
  `amount_of_delivery_time` int(10) DEFAULT NULL,
  `time_category` varchar(255) DEFAULT NULL,
  `milestone_price` decimal(10,0) DEFAULT NULL,
  `attachements` varchar(255) DEFAULT NULL,
  `milestone_description` text DEFAULT NULL,
  `milestone_order_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestone_orders`
--

CREATE TABLE `milestone_orders` (
  `milestone_order_id` int(10) UNSIGNED NOT NULL,
  `gig_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestone_payments`
--

CREATE TABLE `milestone_payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `milestone_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `notification` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'unread',
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_state` varchar(255) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `order_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_state`, `order_type`, `order_created_date`, `buyer_id`, `seller_id`) VALUES
(1, 'request', 'package', '2024-02-21 13:27:05', 1, 3),
(2, 'request', 'package', '2024-02-21 13:28:17', 1, 3),
(3, 'request', 'package', '2024-02-23 17:25:22', 1, 3),
(4, 'request', 'package', '2024-02-25 07:07:44', 1, 3),
(6, 'request', 'package', '2024-02-28 12:58:16', 1, 3),
(7, 'request', 'package', '2024-04-06 18:19:05', 1, 3),
(8, 'request', 'package', '2024-04-06 18:19:50', 1, 3),
(9, 'request', 'package', '2024-04-06 18:24:54', 1, 3),
(10, 'request', 'package', '2024-04-06 18:26:48', 1, 3),
(11, 'Cancelled', 'package', '2024-04-06 18:28:58', 1, 3),
(12, 'Requested', 'package', '2024-04-20 16:10:51', 9, 3),
(13, 'Requested', 'package', '2024-04-20 16:12:52', 9, 3),
(14, 'Requested', 'package', '2024-04-20 16:13:49', 9, 3),
(15, 'Requested', 'package', '2024-04-20 16:14:30', 9, 3),
(16, 'Requested', 'package', '2024-04-20 16:29:40', 9, 3),
(17, 'Cancelled', 'package', '2024-04-20 16:30:18', 9, 3),
(19, 'Cancelled', 'package', '2024-04-20 16:58:21', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(10) UNSIGNED NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` float NOT NULL,
  `no_of_delivery_days` int(10) DEFAULT 1,
  `time_period` varchar(50) NOT NULL,
  `no_of_revisions` varchar(50) NOT NULL,
  `package_description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `gig_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `package_price`, `no_of_delivery_days`, `time_period`, `no_of_revisions`, `package_description`, `created_at`, `gig_id`) VALUES
(1, 'Basic', 100, 1, 'cvcv', '0', '2', '2024-01-25 22:45:05', 12),
(2, 'Standard', 200, 1, 'cvcvc', '0', '3', '2024-01-25 22:45:05', 12),
(3, 'Premium', 300, 1, 'cvcvccv', '2024', '3', '2024-01-25 22:45:05', 12),
(10, 'Basic', 100, 3, 'Days', '3', 'Basic Programming Projects + Bug Fixing\r\n\r\n2 Days Delivery\r\nUnlimited Revisions\r\nDesign customization\r\nResponsive design\r\nSource code\r\nDetailed code comments', '2024-01-29 10:36:56', 15),
(11, 'Standard', 200, 5, 'Days', '5', 'Medium Programming Projects + Database Connectivity\r\n\r\n3 Days Delivery\r\nUnlimited Revisions\r\nDesign customization\r\nResponsive design\r\nSource code\r\nDetailed code comments', '2024-01-29 10:36:56', 15),
(12, 'Premium', 300, 5, 'Weeks', '0', 'Advance Programming Projects + GUI + API Integration\r\n\r\n4 Days Delivery\r\nUnlimited Revisions\r\nDesign customization\r\nResponsive design\r\nSource code\r\nDetailed code comments', '2024-01-29 10:36:56', 15),
(19, 'lskjdflskdfmspdvojspdov', 100, 1, '4', 'Days', 'lsdknfvoijowirjpowijefospfijosanickjp', '0000-00-00 00:00:00', 20),
(20, '', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 20),
(21, '', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 20),
(22, 'basic package', 100, 3, '2', 'Months', 'salfkjsldkfjnslvkjsmlkjvWhat is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '0000-00-00 00:00:00', 21),
(23, 'standard package', 200, 5, '1', 'Months', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '0000-00-00 00:00:00', 21),
(24, 'premium', 400, 0, '7', 'Days', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '0000-00-00 00:00:00', 21),
(25, 'osidfjslkfmk', 23, 4, '23', 'Days', '<?php $gig[0][\'package_name\']?>', '0000-00-00 00:00:00', 22),
(26, 'lksdmflksdmf', 33, 5, '1', 'Months', '<?php $game\']?>', '0000-00-00 00:00:00', 22),
(27, 'lsidfjiwpoim', 56, 0, '2', 'Days', '<?php $gig[0][\'package_name\']?><?php $gig[0][\'package_name\']?><?php $gig[0][\'package_name\']?><?php $gig[0][\'package_name\']?>', '0000-00-00 00:00:00', 22);

-- --------------------------------------------------------

--
-- Table structure for table `package_orders`
--

CREATE TABLE `package_orders` (
  `package_order_id` int(10) UNSIGNED NOT NULL,
  `order_description` text DEFAULT NULL,
  `order_attachement` varchar(255) DEFAULT NULL,
  `gig_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_orders`
--

INSERT INTO `package_orders` (`package_order_id`, `order_description`, `order_attachement`, `gig_id`, `package_id`) VALUES
(2, 'I need to build a website using html, css, js python and django', 'markawali-attachments.zip', 15, 10),
(3, 'dfdfd', 'markawali-attachments.zip', 15, 10),
(4, '', 'ATM simulation.zip', 15, 10),
(6, 'I need to get this html css web page done', 'ATM simulation.zip', 15, 10),
(7, 'sada', '', 15, 10),
(8, 'sada', '', 15, 10),
(9, '', '', 15, 10),
(10, 'h', 'ATM simulation.zip', 15, 10),
(11, 'sffdfd', '', 15, 10),
(16, 'lskajdkflsd', 'Hithere', 20, 19),
(17, 'hey theri lsknowk o sp\r\n\r\n\r\n\r\nsdlfnsodfkmsld', 'Hithere', 20, 21),
(19, 'slkdkfjsldknfsdlmf', 'Hithere', 22, 25);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payer_id` int(10) UNSIGNED DEFAULT NULL,
  `payee_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL CHECK (`amount` >= 0),
  `payment_date` date NOT NULL,
  `payment_description` varchar(255) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_name` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `last_seen` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_name`, `profile_pic`, `first_name`, `last_name`, `country`, `joined_date`, `last_seen`, `about`, `user_id`) VALUES
('Carwow', 'dummyprofile.jpg', 'mathew', 'Watson', NULL, '2024-04-21', 'online', NULL, 14),
('ChFernando', '1667170773982.jpg65b6ee9167aa73.77042511_1706487441_ChFernando', 'Elon', 'Musk', 'Australia', '2023-11-16', '01/29/2024 12:21:26 am', 'Elon Musk (born June 28, 1971, Pretoria, South Africa) South African-born American entrepreneur who cofounded the electronic-payment firm PayPal and formed SpaceX, maker of launch vehicles and spacecraft. He was also one of the first significant investors in, as well as chief executive officer of, the electric car manufacturer Tesla. In addition, Musk acquired Twitter (later X) in 2022.', 2),
('dsahan', 'istockphoto-1300512215-612x612.jpg65bf2b74aad2b6.04036693_1707027316_dsahan', 'Damitha', 'Sahan', 'Myanmar', '2023-11-07', '04/21/2024 06:02:17 pm', 'Hello there! I\'m Damitha. I\'m an enthusiastic individual with a passion for exploring the boundless realms of knowledge and creativity. My journey through life has been shaped by a relentless curiosity and a love for learning, propelling me to embrace diverse experiences and perspectives. Whether delving into the intricacies of technology, savoring the nuances of literature, or immersing myself in the beauty of nature, I find joy in the multifaceted tapestry of existence. A seeker of wisdom and a fervent advocate for positive change, I am committed to continuous self-improvement and contributing to the betterment of the world around me. In my downtime, you might find me immersed in a good book, tinkering with new ideas, or enjoying the simple pleasures of life. Let us embark on this journey of discovery together!', 1),
('K@m3shW!j3', 'dummyprofile.jpg', 'kamesh', 'wijesekara', NULL, '2024-04-21', '04/21/2024 07:02:49 pm', NULL, 15),
('Kamalananda', 'dummyprofile.jpg', 'kamal', 'Addaraarachchi', NULL, '2024-04-21', 'online', NULL, 10),
('kamalBro', 'dummyprofile.jpg', 'kamal', 'mohottala', NULL, '2024-04-21', '04/21/2024 06:54:10 pm', NULL, 13),
('kPerera', 'istockphoto-1300512215-612x612.jpg65bd1301592ec4.33593279_1706889985_kPerera', 'kaveeja', 'sachintha perera', 'France', '2024-02-02', '02/02/2024 04:06:49 pm', 'Hello, I am Kaveeja Perera', 7),
('KSPerera', 'fileuploadfetchapi.jpg6623c631409155.97491830_1713620529_KSPerera', 'kaveeja', 'perera', NULL, '2024-01-09', '04/20/2024 01:07:07 pm', 'Hey there !\r\nI am a photographer which is most famous among wild life photography.', 3),
('namal', 'dummyprofile.jpg', 'namal', 'fernando', NULL, '2024-02-19', '04/21/2024 06:01:58 pm', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `refund_issuer_id` int(10) UNSIGNED DEFAULT NULL,
  `refund_receiver_id` int(10) UNSIGNED DEFAULT NULL,
  `refund_date` date NOT NULL,
  `refund_cause` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regular_payments`
--

CREATE TABLE `regular_payments` (
  `payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `phone_number`) VALUES
(3, '+94703819255'),
(14, '+94711944422'),
(13, '+94741519337');

-- --------------------------------------------------------

--
-- Table structure for table `seller_profile`
--

CREATE TABLE `seller_profile` (
  `user_name` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `languages` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `portfolio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_profile`
--

INSERT INTO `seller_profile` (`user_name`, `user_id`, `languages`, `skills`, `education`, `portfolio`) VALUES
('Carwow', 14, NULL, NULL, NULL, NULL),
('kamalBro', 13, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide_images`
--

CREATE TABLE `slide_images` (
  `side_images_id` int(10) UNSIGNED NOT NULL,
  `side_image_1` varchar(255) DEFAULT NULL,
  `side_image_2` varchar(255) DEFAULT NULL,
  `side_image_3` varchar(255) DEFAULT NULL,
  `side_image_4` varchar(255) DEFAULT NULL,
  `gig_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide_images`
--

INSERT INTO `slide_images` (`side_images_id`, `side_image_1`, `side_image_2`, `side_image_3`, `side_image_4`, `gig_id`) VALUES
(2, NULL, 'c4model6623c573609aa6.22340918_1713620339_75043.jpg', NULL, NULL, 20),
(3, '0076623dc8fdd0575.08237861_1713626255_54208.jpg', '0116623dc8fddcfb1.11734575_1713626255_73372.jpg', '0056623dc8fde4670.21635102_1713626255_94131.jpg', '0086623dc8fded216.52049209_1713626255_50133.jpg', 21),
(4, '0076623f342170047.88262211_1713632066_40267.jpg', '0066623f34217b641.57288839_1713632066_50556.jpg', '0126623f342184504.50501118_1713632066_11676.jpg', NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `agreement` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `role`, `agreement`) VALUES
(1, 'sahanchandrasena462@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'Buyer', 1),
(2, '2021cs029@stu.ucsc.cmb.ac.lk', '$2y$10$zsnCHK1P0EA1yVIEPPjWo.ccwS3iMbBZeYEU1QXjbyKkLjmpeVV1S', 'Buyer', 1),
(3, NULL, '$2y$10$germmkn5veGmFNG0DMptgumadBxDyxe1GgNWdLSvmwLwxIixjDPfu', 'Seller', 1),
(5, 'dummyemail@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'csa', 1),
(6, 'dummyemail2@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'CSA', 1),
(7, 'IT21080494@my.sliit.lk', '$2y$10$7nTy9bmk7L/WOE/T8ecRq.oAhi8I87LjX5NVCJbw8H7Ml23GK6ZwK', 'Buyer', 1),
(9, 'chamaldeshitha2001@gmail.com', '$2y$10$Ae5499yya4.ZXfLSmJhrnOGU.8ipC9GdkLJXceAWfrSI8RDgDbrpa', 'Buyer', 1),
(10, 'chamal404fido@gmail.com', '$2y$10$hCxQ9Xh9mRxRXnWBkDEFIeHNyMdmsmO4PUswvRVD77hTBJvlg7fMS', 'Buyer', 1),
(12, NULL, '$2y$10$GmJMdVeODzeMaEslrMSMiujL/gz/38F0svlSWu/T1hcCIeVInyrRK', 'Seller', 1),
(13, NULL, '$2y$10$GmJMdVeODzeMaEslrMSMiujL/gz/38F0svlSWu/T1hcCIeVInyrRK', 'Seller', 1),
(14, NULL, '$2y$10$O8t8lPSdn7hQbIU35A2X5uaDBrcvwcfwc2n9SHHdz2J.aPkWVAuu.', 'Seller', 1),
(15, 'chamaldeshitha3@gmail.com', '$2y$10$4homv88NBGvR1myYvwUj8usJnbBSAY56d9g7PZxUchpzE1QHaRu9q', 'Buyer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`auction_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `customer_support_assistants`
--
ALTER TABLE `customer_support_assistants`
  ADD KEY `customer_support_assistant_id` (`customer_support_assistant_id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`gig_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `help_requests`
--
ALTER TABLE `help_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `inquiry_originator_id` (`inquiry_originator_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `job_orders`
--
ALTER TABLE `job_orders`
  ADD PRIMARY KEY (`job_order_id`),
  ADD KEY `Cons_Job_Id_Job_Order_Table` (`job_id`),
  ADD KEY `Cons_Job_Prop_Id_Order_Table` (`job_proposal_id`);

--
-- Indexes for table `job_proposals`
--
ALTER TABLE `job_proposals`
  ADD PRIMARY KEY (`proposal_id`),
  ADD KEY `FK_buyer_id` (`buyer_id`),
  ADD KEY `FK_job_id` (`job_id`),
  ADD KEY `FK_seller_id` (`seller_id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`milestone_id`),
  ADD KEY `milestone_order_id` (`milestone_order_id`);

--
-- Indexes for table `milestone_orders`
--
ALTER TABLE `milestone_orders`
  ADD PRIMARY KEY (`milestone_order_id`),
  ADD KEY `gig_id` (`gig_id`);

--
-- Indexes for table `milestone_payments`
--
ALTER TABLE `milestone_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `milestone_id` (`milestone_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `gig_id` (`gig_id`);

--
-- Indexes for table `package_orders`
--
ALTER TABLE `package_orders`
  ADD PRIMARY KEY (`package_order_id`),
  ADD KEY `gig_id` (`gig_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payer_id` (`payer_id`),
  ADD KEY `payee_id` (`payee_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_name`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `refund_issuer_id` (`refund_issuer_id`),
  ADD KEY `refund_receiver_id` (`refund_receiver_id`);

--
-- Indexes for table `regular_payments`
--
ALTER TABLE `regular_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `seller_profile`
--
ALTER TABLE `seller_profile`
  ADD PRIMARY KEY (`user_name`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `slide_images`
--
ALTER TABLE `slide_images`
  ADD PRIMARY KEY (`side_images_id`),
  ADD KEY `gig_id` (`gig_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `auction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `gig_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_orders`
--
ALTER TABLE `job_orders`
  MODIFY `job_order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_proposals`
--
ALTER TABLE `job_proposals`
  MODIFY `proposal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `milestone_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `side_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `auctions_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `inquiries` (`inquiry_id`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `customer_support_assistants`
--
ALTER TABLE `customer_support_assistants`
  ADD CONSTRAINT `customer_support_assistants_ibfk_1` FOREIGN KEY (`customer_support_assistant_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `help_requests`
--
ALTER TABLE `help_requests`
  ADD CONSTRAINT `help_requests_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `inquiries` (`inquiry_id`);

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`inquiry_originator_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `job_orders`
--
ALTER TABLE `job_orders`
  ADD CONSTRAINT `Cons_Job_Id_Job_Order_Table` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `Cons_Job_Order_Id` FOREIGN KEY (`job_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `Cons_Job_Prop_Id_Order_Table` FOREIGN KEY (`job_proposal_id`) REFERENCES `job_proposals` (`proposal_id`);

--
-- Constraints for table `job_proposals`
--
ALTER TABLE `job_proposals`
  ADD CONSTRAINT `FK_buyer_id` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `FK_job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `FK_seller_id` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_ibfk_1` FOREIGN KEY (`milestone_order_id`) REFERENCES `milestone_orders` (`milestone_order_id`);

--
-- Constraints for table `milestone_orders`
--
ALTER TABLE `milestone_orders`
  ADD CONSTRAINT `milestone_orders_ibfk_1` FOREIGN KEY (`milestone_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `milestone_orders_ibfk_2` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);

--
-- Constraints for table `milestone_payments`
--
ALTER TABLE `milestone_payments`
  ADD CONSTRAINT `milestone_payments_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`),
  ADD CONSTRAINT `milestone_payments_ibfk_2` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`milestone_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);

--
-- Constraints for table `package_orders`
--
ALTER TABLE `package_orders`
  ADD CONSTRAINT `package_orders_ibfk_1` FOREIGN KEY (`package_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `package_orders_ibfk_2` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`),
  ADD CONSTRAINT `package_orders_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`payer_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`payee_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`),
  ADD CONSTRAINT `refunds_ibfk_2` FOREIGN KEY (`refund_issuer_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `refunds_ibfk_3` FOREIGN KEY (`refund_receiver_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `regular_payments`
--
ALTER TABLE `regular_payments`
  ADD CONSTRAINT `regular_payments_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `seller_profile`
--
ALTER TABLE `seller_profile`
  ADD CONSTRAINT `seller_profile_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `profile` (`user_name`),
  ADD CONSTRAINT `seller_profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`);

--
-- Constraints for table `slide_images`
--
ALTER TABLE `slide_images`
  ADD CONSTRAINT `slide_images_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
