-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 05:31 PM
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
(2, '2024-04-27 15:40:00', '2024-04-27 15:45:00', '$500', '$50', '$50', 0, 17, NULL);

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
(12);

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
(2, 14, NULL),
(3, 15, NULL),
(4, 16, NULL),
(5, 17, NULL),
(7, 19, NULL),
(8, 20, NULL),
(9, 21, NULL),
(10, 22, NULL),
(12, 25, NULL),
(13, 27, NULL),
(15, 29, NULL),
(16, 30, NULL),
(17, 31, NULL),
(18, 32, NULL),
(20, 35, NULL),
(21, 36, NULL);

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
(19, 14),
(21, 21),
(29, 30);

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
  `attachments` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `order_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `delivery_description`, `attachments`, `date`, `order_id`) VALUES
(3, 'this is my first delivery', 'Coursework.zip', '2024-04-25 13:24:04', 16),
(4, 'This is my second delivery with the unique file name', 'Coursework.zip', '2024-04-25 13:27:33', 16),
(5, 'This is my third delivery', NULL, '2024-04-25 14:26:09', 16),
(6, 'This is my fourth delivery', '20240425142803_Coursework.zip', '2024-04-25 14:28:03', 16),
(7, 'This is my fifth delivery', '20240425143112_Coursework.zip', '2024-04-25 14:31:12', 16),
(8, 'my sixth dlivery', '20240425143549_Coursework.zip', '2024-04-25 14:35:49', 16),
(9, '', '20240425150731_Coursework.zip', '2024-04-25 15:07:31', 16),
(10, '', '20240425151325_Coursework.zip', '2024-04-25 15:13:25', 16),
(11, '', '20240425152006_Coursework.zip', '2024-04-25 15:20:06', 16),
(12, '', '20240425192814_Coursework (1).zip', '2024-04-25 19:28:14', 16),
(14, 'This is my first delivery', '20240426052724_download.zip', '2024-04-26 05:27:24', 19),
(15, 'this is my first delivery for today', '20240426064203_Coursework.zip', '2024-04-26 06:42:03', 17),
(18, 'this is my first delivery', '20240428205327_Coursework.zip', '2024-04-28 20:53:27', 30);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `sender_user_id` int(10) UNSIGNED DEFAULT NULL,
  `receiver_user_id` int(10) UNSIGNED DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `rating` float DEFAULT NULL CHECK (`rating` >= 0 and `rating` <= 5),
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `sender_user_id`, `receiver_user_id`, `feedback_text`, `rating`, `feedback_date`) VALUES
(1, 1, 3, '', 4.8, '2024-04-25 18:58:16'),
(2, 1, 3, 'Good Seller, will work again with him', 0, '2024-04-25 20:51:36'),
(3, 1, 3, '', 5, '2024-04-25 20:54:43'),
(4, 1, 3, 'Good seller', 5, '2024-04-25 23:58:58'),
(5, 3, NULL, 'Good buyer,easy to work with', NULL, '2024-04-26 00:19:58'),
(6, 1, 3, 'Good seller,easy to work with, good communication', 4.9, '2024-04-26 00:59:41'),
(7, 3, 1, 'Good, good communication', NULL, '2024-04-26 01:04:07'),
(8, 3, 1, 'buyer is very good, genuine buyer and easy to work with', 4.9, '2024-04-26 01:07:58'),
(9, 1, 3, 'Nice seller, easy to work, will work with him again', 5, '2024-04-26 01:12:38'),
(10, 3, 1, 'nice buyer', 4.8, '2024-04-26 01:20:25'),
(11, 1, 13, '', 4.6, '2024-04-27 05:45:14'),
(12, 1, 13, '', 4.8, '2024-04-28 15:24:56');

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
(12, 'cvcxv', 'xcvccvc', 'Graphics & Design', 'C (1).jpg', 0, '0000-00-00 00:00:00', 'InActive', 1),
(15, 'I will do your html css javascript cpp java python programming projects', 'Greetings!\r\n\r\n<<Please contact me before placing an order>>\r\n\r\n\r\n\r\nWelcome to the solution of hub for all your programming needs, a professional programmer proficient in HTML CSS, JavaScript, C++, Java and Python. Whether you\'re looking to build a stunning website, optimize user experiences or develop robust software solutions? Then you are at right place.\r\n\r\n\r\n\r\nMy services:\r\n\r\n﻿Software Development\r\nDesktop Application\r\nWeb Development\r\nBug Fixing and Optimization\r\nResponsive Design\r\nAPI Integration\r\nDatabase Connectivity\r\n\r\n\r\nLanguage:\r\n\r\nHTML\r\nCSS\r\nJavaScript\r\nC++\r\nJava\r\nPython\r\n\r\n\r\nWhy Choose me?\r\n\r\nClient Satisfaction\r\nTailored Solution\r\nTimely Delivery\r\nUnlimited Revision\r\n\r\n\r\nNote: This Gig is Exclusively for Fiverr\r\n\r\n\r\n\r\nThanks\r\n\r\nRegards,\r\n\r\nAsad A', 'Programming & Tech', 'do-your-html-css-cpp-java-python-programming-projects.jpg', 0, '2024-01-29 10:36:56', 'InActive', 3),
(18, 'I wil create wordpress websites', '', 'Graphics & Design', 'skillsparq-1 (1)66264fcf728334.03248765_1713786831_38600.jpg', 0, '2024-04-22 13:53:51', 'InActive', 3),
(19, 'I will do unique modern and creative 3d business logo design', 'Hello!\r\n\r\nWelcome to my GIG of unique modern and creative 3d business logo design.\r\n\r\nWe will provide you a unique modern and creative 3d business logo design that will make your company branding stand out more as compared to your competitors.\r\n\r\nOur pros are following:\r\n\r\nunique modern and creative 3d business logo design\r\nFast and professional service\r\n100% Quality satisfaction\r\nOriginal and Custom Work ( No Copy-Paste \r\nTransparent logo file\r\nFriendly and fast communication\r\nUnlimited revisions ( Excluding basic package )\r\n24 hours EXPRESS delivery (Included in gig\'s extras\r\nOwnership rights\r\nHIGH RESOLUTION Final Files in ZIP ( In Premium Package )\r\nVector file (SVG/EPS) , Source File (PSD/Ai)\r\n\r\n\r\nProfessional | Modern | Innovative | Custom Design | Minimalist | Flat | Business | Company |  Colorful | Branding | 3D Logo | Creative | Re Design | Text logo | Branding | Brand Identity | Badge | Coin | Luxury | Vintage | Signature | Hand-drawn | Trendy | Mascot\r\n\r\n\r\n\r\nContact me:\r\n\r\nHave questions or any ideas for your business/brand\'s logo design? Feel free to reach out via Inbox. I\'ll be more than happy to assist you. \r\n\r\n\r\n\r\nOrder NOW, Let\'s do it!', 'Graphics & Design', 'do-professional-unique-and-modern-3d-business-logo-design6626a9e9ae95e9.61310852_1713809897_22642.jpg', 0, '2024-04-22 20:18:17', 'InActive', 3),
(20, 'sdfsd', 'sdfsfsdf', 'Graphics & Design', 'nshnhiklc5a71662b8f13e46dc0.12133010_1714130707_86502.jpg', 0, '2024-04-26 13:25:07', 'InActive', 3),
(21, 'I will provide iso 9001, 45001, 27001, 22000, 22716 gmp, and other certifications', 'We specialize in providing certification for a range of ISO standards, including:\r\n\r\n\r\n\r\nISO 9001:2015 (Quality Management System-QMS)\r\n\r\nISO 14001:2015 (Environmental Management System-EMS)\r\n\r\nISO 45001:2018 (Occupational Health & Safety Management System)\r\n\r\nISO 22000:2018 (Food Safety Management System-FSMS)\r\n\r\nISO 22716 (GMP - Good Manufacturing Practices)\r\n\r\nISO 27001:2022 (Information Security Management System-ISMS) \r\n\r\nISO 20000 (Information Services Management System)\r\n\r\nand many others\r\n\r\n\r\n\r\nOur services extend beyond these standards to encompass other national and international management systems, ensuring comprehensive coverage for your organization\'s needs.\r\n\r\n\r\n\r\nWhat sets us apart?\r\n\r\n\r\n\r\nAuthentic & hassle-free UK / USA Accreditation Certifications\r\nCarbon Footprint Mapping and GHG emission assessments\r\nOver a decade of experience dedicated to promoting quality & excellent culture in industries\r\nA vast clientele of 100% satisfied customers globally\r\n\r\n\r\nWhether you\'re a small business or a multinational corporation, we are dedicated to helping you achieve and maintain the highest standards of quality, safety, and environmental responsibility.\r\n\r\n\r\n\r\nReady to take your business to the next level? Contact us!', 'Business', '1662c12ffac3d13.05315394_1714164479_30922.png', 0, '2024-04-26 22:47:59', 'InActive', 13);

-- --------------------------------------------------------

--
-- Table structure for table `help_requests`
--

CREATE TABLE `help_requests` (
  `request_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(19, 'test complaint', 'test complaint', 'Coursework (1).zip662b89968b9f80.47364900_1714129302_dsahan_complaint.zip', NULL, 'unsolved', '2024-04-26 13:01:42', 1, 0, 'complaint'),
(20, 'Web Development Project Inquiry', 'I need a freelancer for a web development project', 'project_details.docx', NULL, 'unsolved', '2024-04-26 16:34:26', 1, 5, 'help request'),
(21, 'Graphic Design Assistance', 'Looking for a graphic designer for my business logo', 'logo_sketch.jpg', NULL, 'unsolved', '2024-04-26 16:34:26', 2, 5, 'help request'),
(22, 'Content Writing Query', 'I require a content writer for my blog', NULL, NULL, 'unsolved', '2024-04-26 16:34:26', 3, 5, 'help request'),
(23, 'Mobile App Development Assistance', 'I\'m looking for a freelancer to develop a mobile app', 'app_requirements.pdf', NULL, 'unsolved', '2024-04-26 16:34:27', 1, 6, 'help request'),
(24, 'Translation Services Inquiry', 'Need a translator for a document', 'document_to_translate.pdf', NULL, 'unsolved', '2024-04-26 16:34:27', 2, 6, 'help request'),
(25, 'SEO Optimization Project', 'Searching for an SEO expert for my website', NULL, NULL, 'unsolved', '2024-04-26 16:34:27', 3, 6, 'help request'),
(26, 'Late Delivery Complaint', 'I have not received my project files on time', 'attachment_proof.jpg', NULL, 'unsolved', '2024-04-26 16:34:27', 1, 5, 'Complaint'),
(27, 'Communication Issue Complaint', 'The freelancer is not responding to my messages', NULL, NULL, 'unsolved', '2024-04-26 16:34:27', 2, 5, 'Complaint'),
(28, 'Quality Dispute', 'The delivered work does not meet my quality standards', 'quality_report.pdf', NULL, 'unsolved', '2024-04-26 16:34:27', 3, 5, 'Complaint'),
(29, 'test complaint', 'test description', 'Coursework (1).zip662d8594b0a420.41166426_1714259348_dsahan_complaint.zip', NULL, 'unsolved', '2024-04-28 04:39:08', 1, 0, 'complaint');

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
  `buyer_id` int(10) UNSIGNED DEFAULT NULL,
  `ongoing_order_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `description`, `file`, `category`, `deadline`, `publish_mode`, `amount`, `flexible_amount`, `created_at`, `buyer_id`, `ongoing_order_count`) VALUES
(11, 'JOB #0001', 'I WANT TO CREATE A MOBILE APPLICATION WITH FLUTTER', '', 'Programming & Tech', '2024-04-24 00:00:00', 'Auction Mode', '$200', 0, '2024-04-20 16:20:44', 9, 0),
(12, 'JOB #002', 'I JUST WANT A VIDEO EDITOR WHO IS FLUENT IN HANDLING PREMIER PRO', '', 'Video & Animation', '2024-05-01 00:00:00', 'Standard Mode', '$400', 1, '2024-04-20 16:21:36', 9, 0),
(13, 'JOB #003', 'WANT THE EXPERTISE OF A DATA SCIENTIST WHO HAS EXPERIENCE IN PANDAS LIBRARY.', '', 'Data', '2024-05-02 00:00:00', 'Auction Mode', '$500', 0, '2024-04-20 16:22:45', 9, 0),
(14, 'JOB #004', 'I NEED TO EDIT A MUSIC TRACK THAT HAVE SOME BACKGROUND NOISES.', '', 'Music & Audio', '2024-05-23 00:00:00', 'Standard Mode', '$600', 1, '2024-04-20 16:23:53', 9, 0),
(15, 'JOB #005', 'I NEED A PROOF READER WHO CAN PROOF READ A THESIS WHICH HAVE 1000 WORDS.', '', 'Writing & Translation', '2024-05-01 00:00:00', 'Auction Mode', '$400', 0, '2024-04-20 16:25:18', 9, 0),
(17, 'I need a mobile app developer experience in flutter', 'This will help get your brief to the right talent. Specifics help here.This will help get your brief to the right talent. Specifics help here.This will help get your brief to the right talent. Specifics help here.This will help get your brief to the right talent. Specifics help here.This will help get your brief to the right talent. Specifics help here.This will help get your brief to the right talent. Specifics help here.', '', 'Music & Audio', '2024-04-28 00:00:00', 'Auction Mode', '$500', 0, '2024-04-27 12:07:41', NULL, 0),
(20, ' Design Logo for New Tech Startup', 'I need a modern and professional logo created for my new tech startup. The logo should reflect innovation, creativity, and forward-thinking. Please provide a few initial concepts for me to choose from.', '', 'Graphics & Design', '2024-04-30 00:00:00', 'Standard Mode', '$100', 0, '2024-04-27 22:44:37', 1, 0),
(21, 'Develop E-commerce Website for Fashion Boutique', 'I am looking to build a fully functional e-commerce website for my fashion boutique. The website should have user-friendly navigation, an attractive design, secure payment gateway integration, and support for multiple product categories. Additionally, I need features like customer accounts, order tracking, inventory management, and a responsive design for mobile devices. Please provide examples of your previous work in e-commerce website development.', '', 'Programming & Tech', '2024-05-03 00:00:00', 'Standard Mode', '$500', 0, '2024-04-28 08:14:45', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_orders`
--

CREATE TABLE `job_orders` (
  `job_order_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `job_proposal_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_orders`
--

INSERT INTO `job_orders` (`job_order_id`, `job_id`, `job_proposal_id`) VALUES
(29, 19, 5),
(30, 20, 6),
(31, 21, 7);

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
(5, 'hi this is the test proposal', NULL, 'Coursework (1)662d53886a0715.21032404_1714246536_77679.zip', 19, 1, 13, 'Accepted'),
(6, 'hi i can do this for you', NULL, 'Coursework662d64b784f946.40244871_1714250935_19827.zip', 20, 1, 13, 'Accepted'),
(7, 'hi im interested', NULL, 'Coursework662db87956dca4.76801633_1714272377_88948.zip', 21, 1, 13, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `file` text DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `chat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `file`, `file_type`, `date`, `chat_id`, `sender_id`, `receiver_id`) VALUES
(1, 'hi', '', NULL, '2024-04-27 07:30:34', 10, 1, 13),
(2, 'hello can you help me', '', NULL, '2024-04-27 07:35:55', 10, 1, 13),
(3, 'hi', '', NULL, '2024-04-27 10:53:05', 10, 1, 13),
(4, 'hi', '', NULL, '2024-04-27 23:25:32', 16, 1, 13),
(5, 'hi', '', NULL, '2024-04-28 20:27:28', 21, 13, 1),
(6, 'hi', '', NULL, '2024-04-28 20:38:18', 17, 1, 13);

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
(14, 'Running', 'package', '2024-04-22 20:51:36', 1, 3),
(15, 'Completed', 'package', '2024-04-22 20:53:26', 1, 3),
(16, 'Completed', 'package', '2024-04-22 21:28:04', 1, 3),
(17, 'Completed', 'package', '2024-04-24 02:10:48', 1, 3),
(19, 'Completed', 'package', '2024-04-24 02:15:48', 1, 3),
(20, 'Cancelled', 'package', '2024-04-24 18:21:50', 1, 3),
(21, 'Cancelled', 'package', '2024-04-26 14:27:05', 1, 3),
(22, 'Accepted/Pending Payments', 'package', '2024-04-26 22:51:38', 1, 13),
(25, 'Cancelled', 'package', '2024-04-27 13:52:42', 1, 3),
(27, 'Requested', 'job', '2024-04-27 18:34:59', 1, 13),
(29, 'Requested', 'job', '2024-04-27 19:37:00', 1, 13),
(30, 'Completed', 'job', '2024-04-27 20:50:17', 1, 13),
(31, 'Accepted/Pending Payments', 'job', '2024-04-28 02:46:46', 1, 13),
(32, 'Cancelled', 'package', '2024-04-28 15:27:06', 1, 13),
(35, 'Requested', 'package', '2024-04-28 18:03:10', 1, 3),
(36, 'Accepted/Pending Payments', 'package', '2024-04-28 18:45:39', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `history_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`history_id`, `date`, `description`, `order_id`) VALUES
(1, '2024-04-28 09:57:06', NULL, 32),
(4, '2024-04-28 10:26:58', 'order state change from undefined to cancelled', 32),
(5, '2024-04-28 10:36:38', 'order state change from Requested to cancelled', 25),
(7, '2024-04-28 11:05:57', 'order state change from Requested to Accepted/Pending Payments', 31),
(11, '2024-04-28 12:33:10', 'order request is sent', 35),
(12, '2024-04-28 13:15:39', 'order request is sent', 36),
(13, '2024-04-28 15:07:55', 'order state change from Requested to Accepted/Pending Payments', 36),
(14, '2024-04-28 15:24:56', 'order state change from Running to Completed', 30);

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
(19, 'Basic', 100, 1, '3', 'Days', 'I will do my best', '0000-00-00 00:00:00', 18),
(20, 'Standard', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 18),
(21, 'Premium', 0, 1, '0', 'Days', '', '0000-00-00 00:00:00', 18),
(22, 'Basic', 100, 3, 'Days', '3', 'BASIC 2 Company Logo Concepts + JPG + PNG\r\n2 concepts included\r\nLogo transparency\r\nVector file\r\nPrintable file\r\nInclude 3D mockup\r\nInclude source file\r\nInclude social media kit', '0000-00-00 00:00:00', 19),
(23, 'Basic', 100, 4, 'Days', '1', 'dfsfsf', '0000-00-00 00:00:00', 20),
(24, 'Basic', 150, 1, 'Months', '3', 'ISO Certificate (ISO 1001 or ISO 11001 or ISO 5001)', '0000-00-00 00:00:00', 21),
(25, '550', 0, 5, '3', 'Months', 'ISO Certificate (ISO 9001 or ISO 14001 or ISO 45001)', '0000-00-00 00:00:00', 21),
(26, '1000', 0, 7, '1', 'Years', 'ISO Certification with complete documentation (ISO 9001 or ISO 14001 or ISO 45001)', '0000-00-00 00:00:00', 21);

-- --------------------------------------------------------

--
-- Table structure for table `package_orders`
--

CREATE TABLE `package_orders` (
  `package_order_id` int(10) UNSIGNED NOT NULL,
  `order_description` text DEFAULT NULL,
  `order_attachement` varchar(255) DEFAULT NULL,
  `gig_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `deadline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_orders`
--

INSERT INTO `package_orders` (`package_order_id`, `order_description`, `order_attachement`, `gig_id`, `package_id`, `deadline`) VALUES
(1, 'I need to build a website using html, css, js python and django', 'ATM simulation.zip', 15, 10, ''),
(2, 'I need to build a website using html, css, js python and django', 'markawali-attachments.zip', 15, 10, ''),
(3, 'dfdfd', 'markawali-attachments.zip', 15, 10, ''),
(4, '', 'ATM simulation.zip', 15, 10, ''),
(6, 'I need to get this html css web page done', 'ATM simulation.zip', 15, 10, ''),
(7, 'sada', '', 15, 10, ''),
(8, 'sada', '', 15, 10, ''),
(9, '', '', 15, 10, ''),
(10, 'h', 'ATM simulation.zip', 15, 10, ''),
(11, 'sffdfd', '', 15, 10, ''),
(12, 'hi i need to create a e commerce web site', 'ATM simulation.zip', 15, 10, ''),
(14, 'hi, I need to create a logo for my new start up. can you help me?', '', 19, 22, ''),
(15, 'hi, I need to create a logo for my new start up. can you help me?', '', 19, 22, ''),
(16, 'create a new logo', 'Coursework (1).zip', 19, 22, ''),
(17, 'Hi i need you to do something ', '', 19, 22, ''),
(19, 'i need this work to be done', '', 19, 22, ''),
(20, 'hellp kaveeja, i need you to create a logo for my new website', '', 19, 22, ''),
(21, 'Hello kaveeja, i need you to design a logo for my company', 'Coursework (1).zip', 19, 22, ''),
(22, 'Hi, i need to get iso 9001 certification for my product', '', 21, 24, ''),
(25, 'new test', '', 19, 22, ''),
(32, 'hi i need to get iso 9001', 'Coursework (1).zip', 21, 24, ''),
(35, 'test', '', 19, 22, '2024-05-01'),
(36, 'test', '', 21, 24, '2024-05-28');

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payer_id`, `payee_id`, `amount`, `payment_date`, `payment_description`, `payment_state`, `order_id`) VALUES
(2, 8, 3, 1500, '2024-04-25', 'xvv', 'holdForRefund', 21);

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
('dddssahan', '1714119576_dddssahan_19602.jpg662b6398841343.6479071619602.jpg', 'Damitha', 'Sahan', 'Afghanistan', '2024-04-26', '04/26/2024 08:28:41 am', '', 12),
('dsahan', '1713547757_dsahan_istockphoto-1300512215-612x612.jpg6622a9ed7f62a4.25766803istockphoto-1300512215-612x612.jpg', 'Dami', 'Sahan', 'Monaco', '2023-11-07', 'online', 'Hello there! I\'m Damitha. I\'m an enthusiastic individual with a passion for exploring the boundless realms of knowledge and creativity. My journey through life has been shaped by a relentless curiosity and a love for learning, propelling me to embrace diverse experiences and perspectives. Whether delving into the intricacies of technology, savoring the nuances of literature, or immersing myself in the beauty of nature, I find joy in the multifaceted tapestry of existence. A seeker of wisdom and a fervent advocate for positive change, I am committed to continuous self-improvement and contributing to the betterment of the world around me. In my downtime, you might find me immersed in a good book, tinkering with new ideas, or enjoying the simple pleasures of life. Let\'s embark on this journey of discovery together!', 1),
('dsahan', 'dummyprofile.jpg', 'damitha', 'sahan', NULL, '2024-04-25', 'online', NULL, 11),
('kPerera', 'istockphoto-1300512215-612x612.jpg65bd1301592ec4.33593279_1706889985_kPerera', 'kaveeja', 'sachintha perera', 'France', '2024-02-02', '02/02/2024 04:06:49 pm', 'Hello, I am Kaveeja Perera', 7),
('KSPerera', 'dummyprofile.jpg', 'kaveeja', 'perera', NULL, '2024-01-09', '04/26/2024 08:02:05 pm', '', 3),
('LochanaE', 'photo_2024-04-27_04-03-27.jpg662c2bde27c914.39225870_1714170846_LochanaE.jpg', 'Lochana', 'Ekanayake', NULL, '2024-04-26', 'online', '', 13),
('namal', 'dummyprofile.jpg', 'namal', 'fernando', NULL, '2024-02-19', '02/21/2024 03:10:25 am', NULL, 9),
('sfs', 'dummyprofile.jpg', 'manik', 'twenu', NULL, '2024-04-27', '2024-04-27 11:56:41', NULL, 16);

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

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`payment_id`, `refund_issuer_id`, `refund_receiver_id`, `refund_date`, `refund_cause`, `responseCSA`, `refund_state`) VALUES
(2, 1, 3, '2024-04-27', 'damith', '1', 'refunded');

-- --------------------------------------------------------

--
-- Table structure for table `regular_order_deliveries`
--

CREATE TABLE `regular_order_deliveries` (
  `delivery_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regular_order_deliveries`
--

INSERT INTO `regular_order_deliveries` (`delivery_id`) VALUES
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(14),
(15),
(18);

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
(8, '+94711944422'),
(13, '+94723321268');

-- --------------------------------------------------------

--
-- Table structure for table `seller_profile`
--

CREATE TABLE `seller_profile` (
  `user_name` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `languages` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `education` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_profile`
--

INSERT INTO `seller_profile` (`user_name`, `user_id`, `languages`, `skills`, `education`) VALUES
('LochanaE', 13, NULL, NULL, NULL);

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
(2, 'do-professional-unique-and-modern-3d-business-logo-design (1)6626a9e9af6222.18792283_1713809897_28076.jpg', 'I will do professional modern and innovative 3d company logo design -4_nk5sfs6626a9e9afcec6.53565699_1713809897_91915.jpg', NULL, NULL, 19),
(3, NULL, NULL, NULL, NULL, 20),
(4, '2662c12ffac60b5.45847312_1714164479_33647.png', NULL, NULL, NULL, 21);

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
  `black_List` tinyint(4) NOT NULL,
  `Black_Listed_Until` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `role`, `agreement`, `black_List`, `Black_Listed_Until`) VALUES
(1, 'sahanchandrasena462@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'Buyer', 1, 0, NULL),
(2, '2021cs030@stu.ucsc.cmb.ac.lk', '$2y$10$zsnCHK1P0EA1yVIEPPjWo.ccwS3iMbBZeYEU1QXjbyKkLjmpeVV1S', 'Buyer', 1, 0, NULL),
(3, NULL, '$2y$10$germmkn5veGmFNG0DMptgumadBxDyxe1GgNWdLSvmwLwxIixjDPfu', 'Seller', 1, 0, NULL),
(5, 'dummyemail@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'csa', 1, 0, NULL),
(6, 'dummyemail2@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'CSA', 1, 0, NULL),
(7, 'IT21080494@my.sliit.lk', '$2y$10$7nTy9bmk7L/WOE/T8ecRq.oAhi8I87LjX5NVCJbw8H7Ml23GK6ZwK', 'Buyer', 1, 0, NULL),
(8, NULL, '$2y$10$8R.dkr9feJ2aaBg1x1CkVuHJpA3nnfxuNVTKbweFIXbAohBhQVmxa', 'Seller', 1, 0, NULL),
(9, 'chamaldeshitha2001@gmail.com', '$2y$10$Ae5499yya4.ZXfLSmJhrnOGU.8ipC9GdkLJXceAWfrSI8RDgDbrpa', 'Buyer', 1, 0, NULL),
(11, '2021cs028@stu.ucsc.cmb.ac.lk', '$2y$10$bN5CdTF4KkjAuvrEU1z1T.AfBQPSK4Zlp98KBUVfPAy/a4T1bImRO', 'csa', 1, 0, NULL),
(12, '2021cs029@stu.ucsc.cmb.ac.lk', '$2y$10$yE7Stg8zyQfwmFXbuGqosuGdXKggB40S72wZv6CfTOQ4ZldA/SYgm', 'Buyer', 1, 0, NULL),
(13, NULL, '$2y$10$8RYAjToL1AF2zqPpzZpdV.rxk5WOh3wJH4nBHMAPwJKI67AiDQ/Ou', 'Seller', 1, 0, NULL),
(16, 'maniltenuka@gmail.com', '$2y$10$zW1d2o3r8esPzZzvvdItEOzaW1RCyZmXkcOsvB4Au1hKGhtFVxxrS', 'csa', 1, 0, NULL);

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
  ADD KEY `deliveries_ibfk_1` (`order_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedbacks_ibfk_1` (`sender_user_id`),
  ADD KEY `feedbacks_ibfk_2` (`receiver_user_id`);

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
  ADD KEY `job_proposal_id` (`job_proposal_id`);

--
-- Indexes for table `job_proposals`
--
ALTER TABLE `job_proposals`
  ADD PRIMARY KEY (`proposal_id`);

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
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `order_history_ibfk_1` (`order_id`);

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
  MODIFY `auction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `gig_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_proposals`
--
ALTER TABLE `job_proposals`
  MODIFY `proposal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `history_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `side_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`inquiry_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `inquiries` (`inquiry_id`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_support_assistants`
--
ALTER TABLE `customer_support_assistants`
  ADD CONSTRAINT `customer_support_assistants_ibfk_1` FOREIGN KEY (`customer_support_assistant_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`sender_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`receiver_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `job_orders_ibfk_1` FOREIGN KEY (`job_proposal_id`) REFERENCES `job_proposals` (`proposal_id`);

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
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);

--
-- Constraints for table `package_orders`
--
ALTER TABLE `package_orders`
  ADD CONSTRAINT `package_orders_ibfk_1` FOREIGN KEY (`package_order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `regular_order_deliveries_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`delivery_id`) ON DELETE CASCADE;

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
