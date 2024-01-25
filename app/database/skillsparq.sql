-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 06:44 PM
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
(2);

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
(10, 1),
(11, 1),
(12, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customersupportassistants`
--

CREATE TABLE `customersupportassistants` (
  `customer_support_assistant_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customersupportassistants`
--

INSERT INTO `customersupportassistants` (`customer_support_assistant_id`) VALUES
(5),
(6);

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
(11, 'sdsd', 'sdsd', 'Graphics & Design', 'wp8971372-4k-oled-pc-wallpapers.jpg', 0, '0000-00-00 00:00:00', 'InActive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `helprequests`
--

CREATE TABLE `helprequests` (
  `request_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helprequests`
--

INSERT INTO `helprequests` (`request_id`) VALUES
(1),
(2),
(3),
(7),
(8),
(9);

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
(1, 'Web Development Project Inquiry', 'I need a freelancer for a web development project', 'project_details.docx', NULL, 'unsolved', '2024-01-25 22:39:25', 1, 5, 'help request'),
(2, 'Graphic Design Assistance', 'Looking for a graphic designer for my business logo', 'logo_sketch.jpg', NULL, 'unsolved', '2024-01-25 22:39:25', 2, 5, 'help request'),
(3, 'Content Writing Query', 'I require a content writer for my blog', NULL, NULL, 'unsolved', '2024-01-25 22:39:25', 3, 5, 'help request'),
(7, 'Mobile App Development Assistance', 'I\'m looking for a freelancer to develop a mobile app', 'app_requirements.pdf', NULL, 'unsolved', '2024-01-25 22:46:14', 1, 6, 'help request'),
(8, 'Translation Services Inquiry', 'Need a translator for a document', 'document_to_translate.pdf', NULL, 'unsolved', '2024-01-25 22:46:14', 2, 6, 'help request'),
(9, 'SEO Optimization Project', 'Searching for an SEO expert for my website', NULL, NULL, 'unsolved', '2024-01-25 22:46:14', 3, 6, 'help request'),
(10, 'Late Delivery Complaint', 'I have not received my project files on time', 'attachment_proof.jpg', NULL, 'unsolved', '2024-01-25 23:02:22', 1, 5, 'Complaint'),
(11, 'Communication Issue Complaint', 'The freelancer is not responding to my messages', NULL, NULL, 'unsolved', '2024-01-25 23:02:22', 2, 5, 'Complaint'),
(12, 'Quality Dispute', 'The delivered work does not meet my quality standards', 'quality_report.pdf', NULL, 'unsolved', '2024-01-25 23:02:22', 3, 5, 'Complaint'),
(18, 'Payment Dispute', 'I have issues with the payment for the project', 'payment_invoice.pdf', NULL, 'unsolved', '2024-01-25 23:03:48', 1, 6, 'Complaint'),
(19, 'Project Abandonment', 'The freelancer has abandoned the project midway', NULL, NULL, 'unsolved', '2024-01-25 23:03:48', 2, 6, 'Complaint'),
(20, 'Refund Request', 'I am not satisfied and would like a refund', 'refund_policy.docx', NULL, 'unsolved', '2024-01-25 23:03:48', 3, 6, 'Complaint'),
(21, 'Communication Breakdown', 'Unable to communicate effectively with the freelancer', NULL, NULL, 'unsolved', '2024-01-25 23:03:48', 1, 6, 'Complaint'),
(22, 'Project Scope Dispute', 'Disagreement with the freelancer on the project scope', 'scope_agreement.pdf', NULL, 'unsolved', '2024-01-25 23:03:48', 2, 6, 'Complaint'),
(23, 'Late Delivery Complaint', 'I have not received my project files on time', 'attachment_proof.jpg', NULL, 'unsolved', '2024-01-25 23:09:02', 1, 5, 'Complaint'),
(24, 'Communication Issue Complaint', 'The freelancer is not responding to my messages', NULL, NULL, 'unsolved', '2024-01-25 23:09:02', 2, 5, 'Complaint'),
(25, 'Quality Dispute', 'The delivered work does not meet my quality standards', 'quality_report.pdf', NULL, 'unsolved', '2024-01-25 23:09:02', 3, 5, 'Complaint'),
(26, 'Payment Dispute', 'I have issues with the payment for the project', 'payment_invoice.pdf', NULL, 'unsolved', '2024-01-25 23:09:06', 1, 6, 'Complaint'),
(27, 'Project Abandonment', 'The freelancer has abandoned the project midway', NULL, NULL, 'unsolved', '2024-01-25 23:09:06', 2, 6, 'Complaint'),
(28, 'Refund Request', 'I am not satisfied and would like a refund', 'refund_policy.docx', NULL, 'unsolved', '2024-01-25 23:09:06', 3, 6, 'Complaint'),
(29, 'Communication Breakdown', 'Unable to communicate effectively with the freelancer', NULL, NULL, 'unsolved', '2024-01-25 23:09:06', 1, 6, 'Complaint'),
(30, 'Project Scope Dispute', 'Disagreement with the freelancer on the project scope', 'scope_agreement.pdf', NULL, 'unsolved', '2024-01-25 23:09:06', 2, 6, 'Complaint');

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(10) UNSIGNED NOT NULL,
  `package_type` varchar(255) NOT NULL,
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

INSERT INTO `packages` (`package_id`, `package_type`, `package_price`, `no_of_delivery_days`, `time_period`, `no_of_revisions`, `package_description`, `created_at`, `gig_id`) VALUES
(1, 'Basic', 100, 0, 'timePeriod_1', '0', 'packageDescription_1', '2024-01-23 14:33:55', NULL),
(2, 'Standard', 200, 0, 'timePeriod_2', '0', 'packageDescription_2', '2024-01-23 14:33:55', NULL),
(3, 'Premium', 300, 0, 'timePeriod_3', '0', 'packageDescription_3', '2024-01-23 14:33:55', NULL),
(5, 'Basic', 100, 1, 'wewe', '0', '1', '2024-01-24 16:53:52', 9),
(6, 'Standard', 200, 1, 'wewe', '0', '1', '2024-01-24 16:53:52', 9),
(7, 'Premium', 300, 1, 'wewew', '2024', '1', '2024-01-24 16:53:52', 9),
(8, 'Basic', 100, 1, 'sdsdsds', '0', '1', '2024-01-24 16:57:00', 10),
(9, 'Standard', 200, 1, 'sdsdsd', '0', '1', '2024-01-24 16:57:00', 10),
(10, 'Premium', 300, 1, 'sdsdsdsds', '2024', '3', '2024-01-24 16:57:00', 10),
(11, 'Basic', 100, 1, 'sdsdsd', '0', '1', '2024-01-24 17:00:58', 11),
(12, 'Standard', 200, 1, 'sdsdsdsds', '0', '1', '2024-01-24 17:00:58', 11),
(13, 'Premium', 300, 1, 'sdsdsdsds', '2024', '3', '2024-01-24 17:00:58', 11);

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
  `languages` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_name`, `profile_pic`, `first_name`, `last_name`, `country`, `joined_date`, `last_seen`, `about`, `languages`, `skills`, `user_id`) VALUES
('ChFernando', 'dummyprofile.jpg', 'Chamal', 'Fernando', NULL, '2023-11-16', NULL, NULL, NULL, NULL, 2),
('dsahan', 'dummyprofile.jpg', 'Damitha', 'Sahan', NULL, '2023-11-07', NULL, NULL, NULL, NULL, 1),
('KSPerera', 'dummyprofile.jpg', 'kaveeja', 'perera', NULL, '2024-01-09', NULL, NULL, NULL, NULL, 3);

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
(3, '+94703819255');

-- --------------------------------------------------------

--
-- Table structure for table `slide_images`
--

CREATE TABLE `slide_images` (
  `side_images_id` int(10) UNSIGNED NOT NULL,
  `side_image_1` varchar(255) NOT NULL,
  `side_image_2` varchar(255) NOT NULL,
  `side_image_3` varchar(255) NOT NULL,
  `side_image_4` varchar(255) NOT NULL,
  `gig_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, 'dummyemail2@gmail.com', '$2y$10$jgUKSXjNbUn.rv8Z5bDDfe5uDH4oaBjh3iXbU/IhT22IKDHPudlAu', 'CSA', 1);

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
-- Indexes for table `customersupportassistants`
--
ALTER TABLE `customersupportassistants`
  ADD KEY `customer_support_assistant_id` (`customer_support_assistant_id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`gig_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `helprequests`
--
ALTER TABLE `helprequests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `inquiry_originator_id` (`inquiry_originator_id`),
  ADD KEY `customer_support_assistant_id` (`customer_support_assistant_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `fk_gig_id` (`gig_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_name`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

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
  MODIFY `auction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `gig_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `side_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `customersupportassistants`
--
ALTER TABLE `customersupportassistants`
  ADD CONSTRAINT `customersupportassistants_ibfk_1` FOREIGN KEY (`customer_support_assistant_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `helprequests`
--
ALTER TABLE `helprequests`
  ADD CONSTRAINT `helprequests_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `inquiries` (`inquiry_id`);

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`inquiry_originator_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `inquiries_ibfk_2` FOREIGN KEY (`customer_support_assistant_id`) REFERENCES `customersupportassistants` (`customer_support_assistant_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `fk_gig_id` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `slide_images`
--
ALTER TABLE `slide_images`
  ADD CONSTRAINT `slide_images_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`gig_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
