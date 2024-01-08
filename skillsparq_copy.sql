-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 11:26 AM
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
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `gig_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `custom_name_1` varchar(255) DEFAULT NULL,
  `no_of_delivery_days_1` int(10) DEFAULT 1,
  `time_period_1` varchar(50) DEFAULT NULL,
  `no_of_revisions_1` varchar(50) DEFAULT NULL,
  `package_description_1` text DEFAULT NULL,
  `custom_name_2` varchar(255) DEFAULT NULL,
  `no_of_delivery_days_2` int(10) DEFAULT 1,
  `time_period_2` varchar(50) DEFAULT NULL,
  `no_of_revisions_2` varchar(50) DEFAULT NULL,
  `package_description_2` text DEFAULT NULL,
  `custom_name_3` varchar(255) DEFAULT NULL,
  `no_of_delivery_days_3` int(10) DEFAULT 1,
  `time_period_3` varchar(50) DEFAULT NULL,
  `no_of_revisions_3` varchar(50) DEFAULT NULL,
  `package_description_3` text DEFAULT NULL,
  `ongoing_order_count` int(10) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `state` varchar(50) DEFAULT 'InActive',
  `seller_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`gig_id`, `title`, `description`, `category`, `cover_image`, `custom_name_1`, `no_of_delivery_days_1`, `time_period_1`, `no_of_revisions_1`, `package_description_1`, `custom_name_2`, `no_of_delivery_days_2`, `time_period_2`, `no_of_revisions_2`, `package_description_2`, `custom_name_3`, `no_of_delivery_days_3`, `time_period_3`, `no_of_revisions_3`, `package_description_3`, `ongoing_order_count`, `created_at`, `state`, `seller_id`) VALUES
(1, 'I will build responsive wordpress landing page design, elementor landing page', 'Hello there,\r\n\r\n\r\n\r\nAre you looking for someone to make a Responsive Wordpress website or Landing page?\r\n\r\nif yes, I am the one you\'re looking for. I will design your website or landing page by using the elementor pro page builder, which is fully responsive to any device.\r\n\r\n\r\n\r\nI have been working on WordPress jobs for a very long time and I can honestly say that I have gathered much experience in this field.\r\n\r\n\r\n\r\nSee Portfolio here: https://bit.ly/2rU2mrY\r\n\r\n\r\n\r\nServices of this gig:\r\n\r\n\r\n\r\nWordpress responsive Landing page\r\nResponsive Animation\r\nContact form\r\nSocial media integration\r\nPopup functionality\r\nLive chat feature\r\nMailchimp\r\nFast load website\r\nGoogle map \r\n\r\n\r\nWhy you should select me for this job:\r\n\r\n\r\n\r\nHighly professional and top-notch service\r\nSEO ready, optimized, lightweight, super-fast workmanship.\r\nYou will get 100% up to your satisfaction\r\nFluent and friendly communication\r\n$$ back Guarantee\r\n\r\n\r\nYou are ready now? Let\'s go to the next stage Be sure to contact me first before placing an order to get a special offer.', 'Programming & Tech', 'design-elementor-wordpress-website-or-elementor-landing-page.jpeg', 'Basic', 1, 'Days', '1', 'BASIC PAGE ✓ 3 Section ✓ Responsive design', 'Standard', 1, 'Weeks', '1', 'BEST SELLING ✓ Landing page ✓ 6 Sections ✓ Responsive design ✓ Mailchimp integration', 'Premium', 1, 'Months', '6', 'HIGHLY CONVERTING ✓ Premium design ✓ 10 Sections ✓ Sales Booster ✓ Autoresponder ✓ VIP Support', 0, '2023-12-10 15:49:59', 'InActive', 1),
(2, 'I will generative ai and machine learning projects using python', 'Hello,\r\n\r\n\r\n\r\nI\'m Syed, your machine learning expert for generative AI tasks. I\'m Master\'s in Data Science with 2 years of experience in machine learning and with large language models. I have expertise in writing robust code in Python for the implementation of LLMs for data generation.\r\n\r\n\r\n\r\nutilizing the power of machine learning and state-of-the-art large language models like GPT-3.5! I can create bespoke applications and solutions utilizing these models, enabling your projects to comprehend and generate human-like data seamlessly using Python.\r\n\r\n\r\n\r\nMain Services:\r\n\r\n\r\n\r\nLarge Language Models (LLMs) Implementation\r\nPrompt Engineering\r\nDiffusion models\r\nChatbot creation\r\nLangchain application development\r\nOther Generative AI Tasks\r\n\r\n\r\nLLMs Models:\r\n\r\n\r\n\r\nOpen Ai\r\nLatent and stable diffusion models\r\nHugging face\r\nCohere\r\nGANs\r\nFoundation models\r\nPre-trained models\r\nlatest transformers and large language models (LLMs)\r\n\r\n\r\nPython Libraries:\r\n\r\n\r\n\r\nCohere\r\nPandas\r\nOpen Ai\r\nLangchain\r\nHugging face\r\n\r\n\r\nWhy Me?\r\n\r\n\r\n\r\nOn Time Completion\r\nQuick Responses\r\nQuality Work\r\nFriendly Conversation.', 'Data', '2.jpg', 'Basic', 3, 'Days', '3', 'Generative model implementation and data generation with application development\r\n\r\n', 'Standard', 5, 'Days', '7', 'Project with Moderate Software Architecture. Feel free to contact for discussion.\r\n\r\n', 'Premium', 5, 'Days', 'Unlimited', 'Project with Advanced Software Architecture. Feel free to contact for discussion.\r\n\r\n', 0, '2023-12-19 06:05:57', 'InActive', 1);

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
(8, 'weeqe', 'qweqew', '', 'Graphics & Design', '2024-01-18 00:00:00', 'Standard Mode', '$', 0, '2024-01-08 11:06:09', 1);

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
('dsahan', 'dummyprofile.jpg', 'Damitha', 'Sahan', NULL, '2023-11-07', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, '2021cs029@stu.ucsc.cmb.ac.lk', '$2y$10$zsnCHK1P0EA1yVIEPPjWo.ccwS3iMbBZeYEU1QXjbyKkLjmpeVV1S', 'Buyer', 1);

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
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`gig_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `buyer_id` (`buyer_id`);

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
  MODIFY `gig_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `side_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`);

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
