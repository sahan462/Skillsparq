-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 03:18 AM
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
(1, '2024-04-22 01:45:00', '2024-04-25 01:45:00', '$50', '$5', '$5', 0, 16, 1);

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
(9);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `inquiry_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `order_id`, `inquiry_id`) VALUES
(1, 13, NULL),
(2, 14, NULL),
(3, 15, NULL),
(4, 16, NULL),
(5, 17, NULL),
(6, 18, NULL),
(7, 19, NULL),
(8, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `order_id`) VALUES
(9, 16),
(10, 16),
(11, 16),
(12, 16),
(17, 16);

-- --------------------------------------------------------

--
-- Table structure for table `customer_support_assistants`
--

CREATE TABLE `customer_support_assistants` (
  `customer_support_assistant_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(10) UNSIGNED NOT NULL,
  `delivery_description` varchar(255) DEFAULT 'Not Available',
  `attachements` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL
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
  `cover_image` varchar(255) NOT NULL,
  `ongoing_order_count` int(10) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `state` varchar(50) DEFAULT 'InActive',
  `seller_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`gig_id`, `title`, `description`, `category`, `cover_image`, `ongoing_order_count`, `created_at`, `state`, `seller_id`) VALUES
(1, 'I will build responsive wordpress landing page design, elementor landing page', 'Hello there,\r\n\r\n\r\n\r\nAre you looking for someone to make a Responsive Wordpress website or Landing page?\r\n\r\nif yes, I am the one you\'re looking for. I will design your website or landing page by using the elementor pro page builder, which is fully responsive to any device.\r\n\r\n\r\n\r\nI have been working on WordPress jobs for a very long time and I can honestly say that I have gathered much experience in this field.\r\n\r\n\r\n\r\nSee Portfolio here: https://bit.ly/2rU2mrY\r\n\r\n\r\n\r\nServices of this gig:\r\n\r\n\r\n\r\nWordpress responsive Landing page\r\nResponsive Animation\r\nContact form\r\nSocial media integration\r\nPopup functionality\r\nLive chat feature\r\nMailchimp\r\nFast load website\r\nGoogle map \r\n\r\n\r\nWhy you should select me for this job:\r\n\r\n\r\n\r\nHighly professional and top-notch service\r\nSEO ready, optimized, lightweight, super-fast workmanship.\r\nYou will get 100% up to your satisfaction\r\nFluent and friendly communication\r\n$$ back Guarantee\r\n\r\n\r\nYou are ready now? Let\'s go to the next stage Be sure to contact me first before placing an order to get a special offer.', 'Programming & Tech', 'design-elementor-wordpress-website-or-elementor-landing-page.jpeg', 0, '2023-12-10 15:49:59', 'InActive', 1),
(2, 'I will generative ai and machine learning projects using python', 'Hello,\r\n\r\n\r\n\r\nI\'m Syed, your machine learning expert for generative AI tasks. I\'m Master\'s in Data Science with 2 years of experience in machine learning and with large language models. I have expertise in writing robust code in Python for the implementation of LLMs for data generation.\r\n\r\n\r\n\r\nutilizing the power of machine learning and state-of-the-art large language models like GPT-3.5! I can create bespoke applications and solutions utilizing these models, enabling your projects to comprehend and generate human-like data seamlessly using Python.\r\n\r\n\r\n\r\nMain Services:\r\n\r\n\r\n\r\nLarge Language Models (LLMs) Implementation\r\nPrompt Engineering\r\nDiffusion models\r\nChatbot creation\r\nLangchain application development\r\nOther Generative AI Tasks\r\n\r\n\r\nLLMs Models:\r\n\r\n\r\n\r\nOpen Ai\r\nLatent and stable diffusion models\r\nHugging face\r\nCohere\r\nGANs\r\nFoundation models\r\nPre-trained models\r\nlatest transformers and large language models (LLMs)\r\n\r\n\r\nPython Libraries:\r\n\r\n\r\n\r\nCohere\r\nPandas\r\nOpen Ai\r\nLangchain\r\nHugging face\r\n\r\n\r\nWhy Me?\r\n\r\n\r\n\r\nOn Time Completion\r\nQuick Responses\r\nQuality Work\r\nFriendly Conversation.', 'Data', '2.jpg', 0, '2023-12-19 06:05:57', 'InActive', 1),
(3, 'erer', 'erer', 'Graphics & Design', 'wp8971443-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(4, 'erer', 'erer', 'Graphics & Design', 'wp8971443-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(5, 'erer', 'erer', 'Graphics & Design', 'wp8971443-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(6, 'erer', 'erer', 'Graphics & Design', 'wp8971443-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(7, 'erer', 'erer', 'Graphics & Design', 'wp8971443-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(8, 'ewrwew', 'wewewe', 'Graphics & Design', 'peter-forster-bk2qXh1L7xc-unsplash.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(9, 'ewrwew', 'wewewe', 'Graphics & Design', 'peter-forster-bk2qXh1L7xc-unsplash.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(10, 'sdsds', 'sdsd', 'Graphics & Design', 'wp7463261-black-amoled-full-screen-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(11, 'sdsd', 'sdsd', 'Graphics & Design', 'wp8971372-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(12, 'cvcxv', 'xcvccvc', 'Graphics & Design', 'C (1).jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(15, 'I will do your html css javascript cpp java python programming projects', 'Greetings!\r\n\r\n<<Please contact me before placing an order>>\r\n\r\n\r\n\r\nWelcome to the solution of hub for all your programming needs, a professional programmer proficient in HTML CSS, JavaScript, C++, Java and Python. Whether you\'re looking to build a stunning website, optimize user experiences or develop robust software solutions? Then you are at right place.\r\n\r\n\r\n\r\nMy services:\r\n\r\n﻿Software Development\r\nDesktop Application\r\nWeb Development\r\nBug Fixing and Optimization\r\nResponsive Design\r\nAPI Integration\r\nDatabase Connectivity\r\n\r\n\r\nLanguage:\r\n\r\nHTML\r\nCSS\r\nJavaScript\r\nC++\r\nJava\r\nPython\r\n\r\n\r\nWhy Choose me?\r\n\r\nClient Satisfaction\r\nTailored Solution\r\nTimely Delivery\r\nUnlimited Revision\r\n\r\n\r\nNote: This Gig is Exclusively for Fiverr\r\n\r\n\r\n\r\nThanks\r\n\r\nRegards,\r\n\r\nAsad A', 'Programming & Tech', 'do-your-html-css-cpp-java-python-programming-projects.jpg', 0, '2024-01-29 10:36:56', 'InActive', 3),
(17, '', '', 'Graphics & Design', 'sterling-davis-4iXagiKXn3Y-unsplash66264cf06abc47.47482953_1713786096_68561.jpg', 0, '2024-04-22 13:41:36', 'InActive', 3),
(18, 'I wil create wordpress websites', '', 'Graphics & Design', 'skillsparq-1 (1)66264fcf728334.03248765_1713786831_38600.jpg', 0, '2024-04-22 13:53:51', 'InActive', 3),
(19, 'I will do unique modern and creative 3d business logo design', 'Hello!\r\n\r\nWelcome to my GIG of unique modern and creative 3d business logo design.\r\n\r\nWe will provide you a unique modern and creative 3d business logo design that will make your company branding stand out more as compared to your competitors.\r\n\r\nOur pros are following:\r\n\r\nunique modern and creative 3d business logo design\r\nFast and professional service\r\n100% Quality satisfaction\r\nOriginal and Custom Work ( No Copy-Paste \r\nTransparent logo file\r\nFriendly and fast communication\r\nUnlimited revisions ( Excluding basic package )\r\n24 hours EXPRESS delivery (Included in gig\'s extras\r\nOwnership rights\r\nHIGH RESOLUTION Final Files in ZIP ( In Premium Package )\r\nVector file (SVG/EPS) , Source File (PSD/Ai)\r\n\r\n\r\nProfessional | Modern | Innovative | Custom Design | Minimalist | Flat | Business | Company |  Colorful | Branding | 3D Logo | Creative | Re Design | Text logo | Branding | Brand Identity | Badge | Coin | Luxury | Vintage | Signature | Hand-drawn | Trendy | Mascot\r\n\r\n\r\n\r\nContact me:\r\n\r\nHave questions or any ideas for your business/brand\'s logo design? Feel free to reach out via Inbox. I\'ll be more than happy to assist you. \r\n\r\n\r\n\r\nOrder NOW, Let\'s do it!', 'Graphics & Design', 'do-professional-unique-and-modern-3d-business-logo-design6626a9e9ae95e9.61310852_1713809897_22642.jpg', 0, '2024-04-22 20:18:17', 'InActive', 3);

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
(4),
(5),
(6),
(13),
(14),
(15),
(16);

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
(4, 's1', 'dwss', 'ATM simulation.zip65d22908b70559.56897153_1708271880_dsahan_help request.zip', NULL, 'unsolved', '2024-02-18 16:58:00', 1, 0, 'help request'),
(5, '', '', '', NULL, 'unsolved', '2024-04-24 00:04:30', 3, 0, 'help request'),
(6, 'hi', 'hi', '', NULL, 'unsolved', '2024-04-24 05:25:11', 3, 0, 'help request'),
(7, 'test1', 'tes', '', NULL, 'unsolved', '2024-04-24 08:54:49', 3, 0, 'complaint'),
(8, 'test1', 'test2', '', NULL, 'unsolved', '2024-04-24 08:55:33', 3, 0, 'complaint'),
(9, 'test1', 'test2', '', NULL, 'unsolved', '2024-04-24 08:56:37', 3, 0, 'complaint'),
(10, 'test1', 'test2', '', NULL, 'unsolved', '2024-04-24 08:56:54', 3, 0, 'complaint'),
(11, 'last complaint test', 'last description test', '', NULL, 'unsolved', '2024-04-24 08:58:07', 1, 0, 'complaint'),
(12, 'test case 5', 'test case 5', '', NULL, 'unsolved', '2024-04-24 12:39:02', 3, 0, 'complaint'),
(13, 'test case 5', 'test', '', NULL, 'unsolved', '2024-04-24 13:14:27', 3, 0, 'help request'),
(14, 'help request test', 'help request test', '', NULL, 'unsolved', '2024-04-24 13:15:29', 3, 0, 'help request'),
(15, 'test seller help', 'test seller desc', '', NULL, 'unsolved', '2024-04-24 13:26:23', 3, 0, 'help request'),
(16, 'Unable to Access Account', 'I\'m experiencing difficulty accessing my account. Whenever I try to log in, I receive an error message saying \'Invalid credentials.\' I\'ve double-checked my username and password, but I still can\'t log in. I\'ve also tried resetting my password, but I\'m not receiving the password reset email. This issue is preventing me from accessing important features on the platform. Can you please assist me in resolving this issue as soon as possible? Thank you.', 'Coursework.zip6628ed36245782.38753442_1713958198_KSPerera_help request.zip', NULL, 'unsolved', '2024-04-24 13:29:58', 3, 0, 'help request'),
(17, 'Unauthorized Transaction Dispute', 'I recently noticed an unauthorized transaction on my account statement dated [date]. The transaction was made to [merchant name] for the amount of [transaction amount]. I did not authorize this transaction, nor do I recognize the merchant name. I suspect that my account may have been compromised, and I would like to dispute this transaction and ensure that my account is secure. Please investigate this matter urgently and take appropriate action to resolve it. Thank you.', 'skillsparq-logos.zip6628edaa5b9418.63169934_1713958314_KSPerera_complaint.zip', NULL, 'unsolved', '2024-04-24 13:31:54', 3, 0, 'complaint');

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
(15, 'JOB #005', 'I NEED A PROOF READER WHO CAN PROOF READ A THESIS WHICH HAVE 1000 WORDS.', '', 'Writing & Translation', '2024-05-01 00:00:00', 'Auction Mode', '$400', 0, '2024-04-20 16:25:18', 9),
(16, 'I need you to create a wordpress web app for my company ', 'blah blah blah', '', 'Programming & Tech', '2024-04-30 00:00:00', 'Auction Mode', '$50', 0, '2024-04-21 22:15:38', 1);

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `file` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `seen` int(10) UNSIGNED DEFAULT 0,
  `received` int(10) UNSIGNED DEFAULT 0,
  `chat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `file`, `date`, `seen`, `received`, `chat_id`, `sender_id`, `receiver_id`) VALUES
(1, 'hi', NULL, '2024-04-17 17:46:17', 0, 0, NULL, 3, 1),
(2, 'hello there', NULL, '2024-04-17 17:49:54', 0, 0, NULL, 1, 3),
(3, 'hello there', NULL, '2024-04-17 17:49:54', 0, 0, NULL, 1, 3),
(4, 'how are you', NULL, '2024-04-17 17:50:11', 0, 0, NULL, 1, 3),
(5, 'how are you', NULL, '2024-04-17 17:51:18', 0, 0, NULL, 1, 3),
(6, 'how are you', NULL, '2024-04-17 17:52:29', 0, 0, NULL, 1, 3),
(7, 'how are you', NULL, '2024-04-17 17:52:33', 0, 0, NULL, 1, 3),
(8, 'hi', NULL, '2024-04-17 18:15:00', 0, 0, NULL, 1, 3),
(9, 'hi', NULL, '2024-04-17 18:18:17', 0, 0, NULL, 1, 3),
(10, 'hi', NULL, '2024-04-17 18:28:43', 0, 0, NULL, 1, 3),
(11, 'hi', NULL, '2024-04-17 19:13:33', 0, 0, 1, 1, 3),
(14, 'hi', NULL, '2024-04-17 19:23:18', 0, 0, 1, 3, 1),
(15, 'i need to get this work on or before 22', NULL, '2024-04-17 19:23:38', 0, 0, 1, 3, 1),
(16, 'hi', '', '2024-04-20 03:22:38', 0, 0, 1, 1, 3),
(17, 'hi', '', '2024-04-20 03:22:38', 0, 0, 1, 1, 3),
(18, 'hello there', '', '2024-04-20 03:23:17', 0, 0, 1, 1, 3),
(19, 'hello there', '', '2024-04-20 03:23:17', 0, 0, 1, 1, 3),
(20, 'this is the third message', '', '2024-04-20 03:23:47', 0, 0, 1, 1, 3),
(21, 'hi', '', '2024-04-20 03:27:40', 0, 0, 1, 1, 3),
(22, 'hello there', '', '2024-04-20 03:27:47', 0, 0, 1, 1, 3),
(23, 'hello there', '', '2024-04-20 03:28:25', 0, 0, 1, 1, 3),
(24, 'hello i am kaveeja', '', '2024-04-20 03:29:38', 0, 0, 1, 3, 1),
(25, 'hello I am sahan', '', '2024-04-20 03:29:52', 0, 0, 1, 1, 3),
(26, 'hello i am kaveeja', '', '2024-04-20 03:34:08', 0, 0, 1, 3, 1),
(27, 'hi', '', '2024-04-20 03:35:18', 0, 0, 1, 3, 1),
(28, 'hello I am sahan', '', '2024-04-20 03:35:30', 0, 0, 1, 1, 3),
(29, 'hello I am sahan', '', '2024-04-20 03:40:44', 0, 0, 1, 1, 3),
(30, 'hi', '', '2024-04-20 03:41:00', 0, 0, 1, 1, 3),
(31, 'hi', '', '2024-04-20 03:41:22', 0, 0, 1, 3, 1),
(32, 'hi', '', '2024-04-20 03:41:50', 0, 0, 1, 3, 1),
(33, 'hi', '', '2024-04-20 03:58:43', 0, 0, 1, 1, 3),
(34, 'hello', '', '2024-04-20 03:58:53', 0, 0, 1, 3, 1),
(35, 'hi', '', '2024-04-20 04:01:31', 0, 0, 1, 1, 3),
(36, 'hi', '', '2024-04-20 04:07:13', 0, 0, 1, 1, 3),
(37, 'hello', '', '2024-04-20 04:07:39', 0, 0, 1, 3, 1),
(38, 'hi', '', '2024-04-20 04:08:52', 0, 0, 1, 3, 1),
(39, 'hi', '', '2024-04-20 04:09:35', 0, 0, 1, 3, 1),
(40, 'hello', '', '2024-04-20 04:10:03', 0, 0, 1, 1, 3),
(41, 'hi', '', '2024-04-20 04:11:44', 0, 0, 1, 3, 1),
(42, 'hi', '', '2024-04-20 04:12:02', 0, 0, 1, 3, 1),
(43, 'hello', '', '2024-04-20 04:12:09', 0, 0, 1, 3, 1),
(44, 'hello i am kaveeja', '', '2024-04-20 04:13:10', 0, 0, 1, 3, 1),
(45, 'hi', '', '2024-04-20 04:13:17', 0, 0, 1, 1, 3),
(46, 'hi', '', '2024-04-20 08:35:37', 0, 0, 1, 3, 1),
(47, 'hello there', '', '2024-04-20 08:35:47', 0, 0, 1, 1, 3),
(48, 'hi', '', '2024-04-20 08:48:42', 0, 0, 1, 1, 3),
(49, 'hi', '', '2024-04-20 08:49:07', 0, 0, 1, 3, 1),
(50, 'hello there i am sahan', '', '2024-04-20 08:50:38', 0, 0, 1, 1, 3),
(51, 'hello i am kaveeja', '', '2024-04-20 08:50:57', 0, 0, 1, 3, 1),
(52, 'i need to get this work done in two days', '', '2024-04-20 08:51:52', 0, 0, 1, 1, 3),
(53, 'hi im seller', '', '2024-04-20 08:52:49', 0, 0, 1, 3, 1),
(54, 'hi im buyer', '', '2024-04-20 08:53:01', 0, 0, 1, 1, 3),
(55, 'hi im seller', '', '2024-04-20 08:53:31', 0, 0, 1, 3, 1),
(56, 'hi im buyer', '', '2024-04-20 08:53:38', 0, 0, 1, 1, 3),
(57, 'can you provide me details about the task', '', '2024-04-20 08:54:37', 0, 0, 1, 3, 1),
(58, 'yeah sure, i need you to create a wordpress website for an e commerce platform', '', '2024-04-20 08:55:11', 0, 0, 1, 1, 3),
(59, 'yeah sure, i can do it for you', '', '2024-04-20 08:55:45', 0, 0, 1, 3, 1),
(60, 'can you please let me know the exact deadline for your task', '', '2024-04-20 08:56:10', 0, 0, 1, 3, 1),
(61, 'yeah sure, i need you to create a wordpress website for an e commerce platform', '', '2024-04-20 09:01:39', 0, 0, 1, 1, 3),
(62, 'hi', '', '2024-04-20 18:57:27', 0, 0, 1, 1, 3),
(63, 'hi', '', '2024-04-20 18:58:23', 0, 0, 1, 3, 1),
(64, 'hello', '', '2024-04-20 18:59:26', 0, 0, 1, 3, 1),
(65, 'hi', '', '2024-04-20 19:18:43', 0, 0, 1, 1, 3),
(66, 'hi', '', '2024-04-21 21:43:36', 0, 0, 1, 1, 3),
(67, 'hi', '', '2024-04-21 23:29:22', 0, 0, 1, 1, 3),
(68, 'hi', '', '2024-04-22 14:48:35', 0, 0, 1, 3, 1),
(69, 'hi', '', '2024-04-22 20:54:34', 0, 0, 3, 1, 3),
(70, 'hi', '', '2024-04-22 23:05:04', 0, 0, 3, 1, 3),
(71, 'hi', '', '2024-04-23 10:25:57', 0, 0, 3, 3, 1),
(72, 'hi', '', '2024-04-23 11:42:45', 0, 0, 3, 3, 1),
(73, 'hi', '', '2024-04-23 15:22:33', 0, 0, 3, 3, 1),
(74, 'hi', '', '2024-04-23 18:56:58', 0, 0, 4, 3, 1),
(75, 'hi', '', '2024-04-23 18:57:12', 0, 0, 4, 3, 1),
(76, 'hi', '', '2024-04-23 22:24:14', 0, 0, 4, 3, 1),
(77, 'hi', '', '2024-04-24 02:19:39', 0, 0, 7, 1, 3),
(78, 'hi', '', '2024-04-24 07:48:07', 0, 0, 7, 3, 1),
(79, 'hi', '', '2024-04-24 12:16:35', 0, 0, 4, 3, 1),
(80, '', '', '2024-04-24 12:16:59', 0, 0, 4, 3, 1),
(81, 'hi', '', '2024-04-24 17:23:32', 0, 0, 4, 3, 1);

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
-- Table structure for table `milestone_order_deliveries`
--

CREATE TABLE `milestone_order_deliveries` (
  `delivery_id` int(10) UNSIGNED NOT NULL,
  `milestone_id` int(10) UNSIGNED DEFAULT NULL
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
(1, 'Requested', 'package', '2024-02-21 13:27:05', 1, 3),
(2, 'Requested', 'package', '2024-02-21 13:28:17', 1, 3),
(3, 'Requested', 'package', '2024-02-23 17:25:22', 1, 3),
(4, 'Requested', 'package', '2024-02-25 07:07:44', 1, 3),
(6, 'Requested', 'package', '2024-02-28 12:58:16', 1, 3),
(7, 'Requested', 'package', '2024-04-06 18:19:05', 1, 3),
(8, 'Requested', 'package', '2024-04-06 18:19:50', 1, 3),
(9, 'Accepted/Pending Payments', 'package', '2024-04-06 18:24:54', 1, 3),
(10, 'Running', 'package', '2024-04-06 18:26:48', 1, 3),
(11, 'Cancelled', 'package', '2024-04-06 18:28:58', 1, 3),
(12, 'Requested', 'package', '2024-04-17 16:26:37', 1, 3),
(13, 'Running', 'package', '2024-04-17 16:27:34', 1, 3),
(14, 'Requested', 'package', '2024-04-22 20:51:36', 1, 3),
(15, 'Completed', 'package', '2024-04-22 20:53:26', 1, 3),
(16, 'Running', 'package', '2024-04-22 21:28:04', 1, 3),
(17, 'Requested', 'package', '2024-04-24 02:10:48', 1, 3),
(18, 'Requested', 'package', '2024-04-24 02:11:38', 1, 3),
(19, 'Requested', 'package', '2024-04-24 02:15:48', 1, 3),
(20, 'Requested', 'package', '2024-04-24 18:21:50', 1, 3);

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
(16, 'Basic', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 17),
(17, 'Standard', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 17),
(18, 'Premium', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 17),
(19, 'Basic', 100, 1, '3', 'Days', 'I will do my best', '0000-00-00 00:00:00', 18),
(20, 'Standard', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 18),
(21, 'Premium', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 18),
(22, 'Basic', 100, 3, 'Days', '3', 'BASIC 2 Company Logo Concepts + JPG + PNG\r\n2 concepts included\r\nLogo transparency\r\nVector file\r\nPrintable file\r\nInclude 3D mockup\r\nInclude source file\r\nInclude social media kit', '0000-00-00 00:00:00', 19);

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
(1, 'I need to build a website using html, css, js python and django', 'ATM simulation.zip', 15, 10),
(2, 'I need to build a website using html, css, js python and django', 'markawali-attachments.zip', 15, 10),
(3, 'dfdfd', 'markawali-attachments.zip', 15, 10),
(4, '', 'ATM simulation.zip', 15, 10),
(6, 'I need to get this html css web page done', 'ATM simulation.zip', 15, 10),
(7, 'sada', '', 15, 10),
(8, 'sada', '', 15, 10),
(9, '', '', 15, 10),
(10, 'h', 'ATM simulation.zip', 15, 10),
(11, 'sffdfd', '', 15, 10),
(12, 'hi i need to create a e commerce web site', 'ATM simulation.zip', 15, 10),
(13, 'hi i need to create a e commerce web site', 'ATM simulation.zip', 15, 10),
(14, 'hi, I need to create a logo for my new start up. can you help me?', '', 19, 22),
(15, 'hi, I need to create a logo for my new start up. can you help me?', '', 19, 22),
(16, 'create a new logo', 'Coursework (1).zip', 19, 22),
(17, 'Hi i need you to do something ', '', 19, 22),
(18, 'Hi i need you to do something ', '', 19, 22),
(19, 'i need this work to be done', '', 19, 22),
(20, 'hellp kaveeja, i need you to create a logo for my new website', '', 19, 22);

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
  `payment_state` varchar(30) NOT NULL,
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
('chamal', 'Bard_Generated_Image.jpg65d30b59193349.42435934_1708329817_chamal', 'chamal', 'fernando', NULL, '2024-02-19', '02/19/2024 08:04:01 am', 'Package Details', 8),
('ChFernando', '1667170773982.jpg65b6ee9167aa73.77042511_1706487441_ChFernando', 'Elon', 'Musk', 'Australia', '2023-11-16', '01/29/2024 12:21:26 am', 'Elon Musk (born June 28, 1971, Pretoria, South Africa) South African-born American entrepreneur who cofounded the electronic-payment firm PayPal and formed SpaceX, maker of launch vehicles and spacecraft. He was also one of the first significant investors in, as well as chief executive officer of, the electric car manufacturer Tesla. In addition, Musk acquired Twitter (later X) in 2022.', 2),
('dsahan', '1713547757_dsahan_istockphoto-1300512215-612x612.jpg6622a9ed7f62a4.25766803istockphoto-1300512215-612x612.jpg', 'Dami', 'Sahan', 'Monaco', '2023-11-07', 'online', 'Hello there! I\'m Damitha. I\'m an enthusiastic individual with a passion for exploring the boundless realms of knowledge and creativity. My journey through life has been shaped by a relentless curiosity and a love for learning, propelling me to embrace diverse experiences and perspectives. Whether delving into the intricacies of technology, savoring the nuances of literature, or immersing myself in the beauty of nature, I find joy in the multifaceted tapestry of existence. A seeker of wisdom and a fervent advocate for positive change, I am committed to continuous self-improvement and contributing to the betterment of the world around me. In my downtime, you might find me immersed in a good book, tinkering with new ideas, or enjoying the simple pleasures of life. Let\'s embark on this journey of discovery together!', 1),
('kPerera', 'istockphoto-1300512215-612x612.jpg65bd1301592ec4.33593279_1706889985_kPerera', 'kaveeja', 'sachintha perera', 'France', '2024-02-02', '02/02/2024 04:06:49 pm', 'Hello, I am Kaveeja Perera', 7),
('KSPerera', 'dummyprofile.jpg', 'kaveeja', 'perera', NULL, '2024-01-09', 'online', '', 3),
('namal', 'dummyprofile.jpg', 'namal', 'fernando', NULL, '2024-02-19', '02/21/2024 03:10:25 am', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `refund_issuer_id` int(10) UNSIGNED DEFAULT NULL,
  `refund_receiver_id` int(10) UNSIGNED DEFAULT NULL,
  `refund_date` date NOT NULL,
  `refund_cause` text NOT NULL,
  `responseCSA` varchar(255) NOT NULL,
  `refund_state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regular_order_deliveries`
--

CREATE TABLE `regular_order_deliveries` (
  `delivery_id` int(10) UNSIGNED NOT NULL
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
(8, '+94711944422');

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
(1, NULL, NULL, NULL, NULL, 18),
(2, 'do-professional-unique-and-modern-3d-business-logo-design (1)6626a9e9af6222.18792283_1713809897_28076.jpg', 'I will do professional modern and innovative 3d company logo design -4_nk5sfs6626a9e9afcec6.53565699_1713809897_91915.jpg', NULL, NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `agreement` tinyint(1) DEFAULT 0,
  `black_listed` tinyint(4) NOT NULL,
  `black_listed_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `role`, `agreement`, `black_listed`, `black_listed_until`) VALUES
(1, 'sahanchandrasena462@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'Buyer', 1, 0, NULL),
(2, '2021cs030@stu.ucsc.cmb.ac.lk', '$2y$10$zsnCHK1P0EA1yVIEPPjWo.ccwS3iMbBZeYEU1QXjbyKkLjmpeVV1S', 'Buyer', 1, 0, NULL),
(3, NULL, '$2y$10$germmkn5veGmFNG0DMptgumadBxDyxe1GgNWdLSvmwLwxIixjDPfu', 'Seller', 1, 0, NULL),
(5, 'dummyemail@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'csa', 1, 0, NULL),
(6, 'dummyemail2@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'CSA', 1, 0, NULL),
(7, 'IT21080494@my.sliit.lk', '$2y$10$7nTy9bmk7L/WOE/T8ecRq.oAhi8I87LjX5NVCJbw8H7Ml23GK6ZwK', 'Buyer', 1, 0, NULL),
(8, NULL, '$2y$10$8R.dkr9feJ2aaBg1x1CkVuHJpA3nnfxuNVTKbweFIXbAohBhQVmxa', 'Seller', 1, 0, NULL),
(9, 'chamaldeshitha2001@gmail.com', '$2y$10$Ae5499yya4.ZXfLSmJhrnOGU.8ipC9GdkLJXceAWfrSI8RDgDbrpa', 'Buyer', 1, 0, NULL);

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
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `inquiry_id` (`inquiry_id`);

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
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_id` (`order_id`);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `chat_id` (`chat_id`);

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
-- Indexes for table `milestone_order_deliveries`
--
ALTER TABLE `milestone_order_deliveries`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `milestone_id` (`milestone_id`);

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
-- Indexes for table `regular_order_deliveries`
--
ALTER TABLE `regular_order_deliveries`
  ADD PRIMARY KEY (`delivery_id`);

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
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_email_2` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `auction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `gig_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `side_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`inquiry_id`);

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
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

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
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`chat_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`user_id`);

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
-- Constraints for table `milestone_order_deliveries`
--
ALTER TABLE `milestone_order_deliveries`
  ADD CONSTRAINT `milestone_order_deliveries_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`delivery_id`),
  ADD CONSTRAINT `milestone_order_deliveries_ibfk_2` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`milestone_id`);

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
-- Constraints for table `regular_order_deliveries`
--
ALTER TABLE `regular_order_deliveries`
  ADD CONSTRAINT `regular_order_deliveries_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`delivery_id`);

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
