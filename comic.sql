-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 07:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comic`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `bio`, `profile_image`, `created_at`) VALUES
(1, 'Yuki Tabata', 'Author of hit manga series.', 'yuki_tabata.jpg', '2025-01-09 01:38:06'),
(2, 'Aya Hirano', 'Romantic and fantasy stories.', 'aya_hirano.jpg', '2025-01-09 01:38:06'),
(3, 'Yuki Tabata', 'Author of hit manga series.', 'yuki_tabata.jpg', '2025-01-09 01:38:27'),
(4, 'Aya Hirano', 'Romantic and fantasy stories.', 'aya_hirano.jpg', '2025-01-09 01:38:27'),
(5, 'Takeshi Obata', 'Manga artist known for drawing Death Note.', 'takeshi_obata.jpg', '2025-01-08 18:38:06'),
(6, 'Eiichiro Oda', 'Creator of the One Piece manga series.', 'eiichiro_oda.jpg', '2025-01-08 18:38:06'),
(7, 'Masashi Kishimoto', 'Creator of Naruto.', 'masashi_kishimoto.jpg', '2025-01-08 18:38:06'),
(8, 'Hiro Mashima', 'Creator of Fairy Tail and Rave Master.', 'hiro_mashima.jpg', '2025-01-08 18:38:06'),
(9, 'Akira Toriyama', 'Creator of Dragon Ball and Dr. Slump.', 'akira_toriyama.jpg', '2025-01-08 18:38:06'),
(10, 'Nobuhiro Watsuki', 'Creator of Rurouni Kenshin.', 'nobuhiro_watsuki.jpg', '2025-01-08 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comic_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`bookmark_id`, `user_id`, `comic_id`, `created_at`) VALUES
(1, 1, 1, '2025-02-26 00:30:00'),
(2, 1, 2, '2025-02-26 00:35:00'),
(3, 2, 3, '2025-02-26 00:40:00'),
(4, 2, 4, '2025-02-26 00:45:00'),
(5, 3, 5, '2025-02-26 00:50:00'),
(6, 3, 6, '2025-02-26 00:55:00'),
(7, 4, 7, '2025-02-26 01:00:00'),
(8, 4, 8, '2025-02-26 01:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Fantasy'),
(5, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` int(11) NOT NULL,
  `comic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `chapter_number` int(11) NOT NULL,
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `comic_id`, `title`, `content`, `chapter_number`, `views`, `created_at`) VALUES
(1, 1, 'Chapter 1: The Beginning', 'Content of chapter 1.', 1, 500, '2025-01-09 01:38:06'),
(2, 1, 'Chapter 2: The Journey', 'Content of chapter 2.', 2, 300, '2025-01-09 01:38:06'),
(3, 2, 'Chapter 1: A Magical Encounter', 'Content of chapter 1.', 1, 400, '2025-01-09 01:38:06'),
(4, 3, 'Chapter 1: The Notebook', 'Content of chapter 1.', 1, 700, '2025-01-08 18:38:06'),
(5, 3, 'Chapter 2: The Rules', 'Content of chapter 2.', 2, 600, '2025-01-08 18:38:06'),
(6, 4, 'Chapter 1: Romance Dawn', 'Content of chapter 1.', 1, 2000, '2025-01-08 18:38:06'),
(7, 4, 'Chapter 2: The Pirate King', 'Content of chapter 2.', 2, 1800, '2025-01-08 18:38:06'),
(8, 5, 'Chapter 1: Uzumaki Naruto', 'Content of chapter 1.', 1, 1500, '2025-01-08 18:38:06'),
(9, 5, 'Chapter 2: Team 7', 'Content of chapter 2.', 2, 1400, '2025-01-08 18:38:06'),
(10, 6, 'Chapter 1: The Fairy Tail Guild', 'Content of chapter 1.', 1, 1000, '2025-01-08 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `comic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status` enum('ongoing','completed') DEFAULT 'ongoing',
  `cover_image` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `favorites` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`comic_id`, `title`, `description`, `author_id`, `status`, `cover_image`, `views`, `favorites`, `created_at`) VALUES
(1, 'Dragon Quest', 'A young hero embarks on a quest.', 1, 'ongoing', '67beca1f49750.jpeg', 1000, 500, '2025-01-09 01:38:06'),
(2, 'Romantic Chaos', 'Love and chaos in a magical world.', 2, 'completed', '67bec7a1a4491.jpeg', 750, 300, '2025-01-09 01:38:06'),
(3, 'Death Note', 'A high school student discovers a supernatural notebook.', 5, 'completed', '67bec79a8efd0.jpeg', 1200, 600, '2025-01-08 18:38:06'),
(4, 'One Piece', 'A pirate adventure to find the ultimate treasure.', 6, 'ongoing', '67bec794ca0cf.jpeg', 5000, 2500, '2025-01-08 18:38:06'),
(5, 'Naruto', 'A young ninja seeks recognition and dreams of becoming the Hokage.', 7, 'completed', '67bec78ec94c9.jpeg', 3000, 1500, '2025-01-08 18:38:06'),
(6, 'Fairy Tail', 'A guild of wizards takes on various missions and adventures.', 8, 'completed', '67bec782472e8.jpeg', 2000, 1000, '2025-01-08 18:38:06'),
(7, 'Dragon Ball', 'A martial artist searches for the seven Dragon Balls.', 9, 'completed', '67bec7735e17f.jpeg', 4000, 2000, '2025-01-08 18:38:06'),
(8, 'Rurouni Kenshin', 'A wandering swordsman seeks redemption for his past.', 10, 'completed', '67bec76cb0121.jpeg', 1500, 750, '2025-01-08 18:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `comic_categories`
--

CREATE TABLE `comic_categories` (
  `comic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comic_categories`
--

INSERT INTO `comic_categories` (`comic_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 4),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comic_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comic_id`, `chapter_id`, `user_id`, `content`, `created_at`) VALUES
(1, 1, 1, 1, 'Great chapter!', '2025-02-26 00:30:00'),
(2, 1, 2, 2, 'Awesome story!', '2025-02-26 00:35:00'),
(3, 2, 3, 3, 'Love this manga!', '2025-02-26 00:40:00'),
(4, 3, 4, 4, 'Very intense!', '2025-02-26 00:45:00'),
(5, 4, 6, 5, 'Exciting start!', '2025-02-26 00:50:00'),
(6, 5, 8, 1, 'Naruto is the best!', '2025-02-26 00:55:00'),
(7, 6, 10, 2, 'Fairy Tail forever!', '2025-02-26 01:00:00'),
(8, 7, NULL, 3, 'Dragon Ball is classic!', '2025-02-26 01:05:00'),
(9, 8, NULL, 4, 'Kenshin is amazing!', '2025-02-26 01:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `content`, `is_read`, `created_at`) VALUES
(1, 1, 'New chapter of Dragon Quest is out!', 0, '2025-02-26 00:30:00'),
(2, 2, 'New chapter of Romantic Chaos is out!', 0, '2025-02-26 00:35:00'),
(3, 3, 'New chapter of Death Note is out!', 0, '2025-02-26 00:40:00'),
(4, 4, 'New chapter of One Piece is out!', 0, '2025-02-26 00:45:00'),
(5, 5, 'New chapter of Naruto is out!', 0, '2025-02-26 00:50:00'),
(6, 1, 'New chapter of Fairy Tail is out!', 0, '2025-02-26 00:55:00'),
(7, 2, 'New chapter of Dragon Ball is out!', 0, '2025-02-26 01:00:00'),
(8, 3, 'New chapter of Rurouni Kenshin is out!', 0, '2025-02-26 01:05:00'),
(9, 4, 'New chapter of Attack on Titan is out!', 0, '2025-02-26 01:10:00'),
(10, 5, 'New chapter of My Hero Academia is out!', 0, '2025-02-26 01:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `amount`, `payment_date`) VALUES
(1, 1, 19.99, '2025-02-26 00:30:00'),
(2, 2, 9.99, '2025-02-26 00:35:00'),
(3, 3, 12.99, '2025-02-26 00:40:00'),
(4, 4, 12.99, '2025-02-26 00:45:00'),
(5, 5, 25.00, '2025-02-26 00:50:00'),
(6, 1, 13.99, '2025-02-26 00:55:00'),
(7, 2, 29.99, '2025-02-26 01:00:00'),
(8, 3, 8.99, '2025-02-26 01:05:00'),
(9, 4, 34.99, '2025-02-26 01:10:00'),
(10, 5, 5.99, '2025-02-26 01:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `comic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`product_id`, `product_name`, `description`, `price`, `stock_quantity`, `image`, `created_at`, `user_id`) VALUES
(2, 'Romantic Chaos Poster', 'A high-quality poster of Romantic Chaos.', 9.99, 50, 'romantic_chaos_poster.jpg', '2025-02-25 03:05:00', 1),
(3, 'Dragon Quest Manga Volume 1', 'The first volume of Dragon Quest Manga series.', 12.99, 200, 'dragon_quest_manga_1.jpg', '2025-02-25 03:10:00', 1),
(4, 'Romantic Chaos Manga Volume 1', 'The first volume of Romantic Chaos Manga series.', 12.99, 150, 'romantic_chaos_manga_1.jpg', '2025-02-25 03:15:00', 1),
(5, 'Action Figure: Dragon Quest Hero', 'A limited edition action figure of the Dragon Quest hero.', 25.00, 30, 'dragon_quest_hero_figure.jpg', '2025-02-25 03:20:00', 1),
(6, 'Romantic Chaos Manga Volume 2', 'The second volume of Romantic Chaos Manga series.', 13.99, 180, 'romantic_chaos_manga_2.jpg', '2025-02-25 03:25:00', 1),
(7, 'Dragon Quest Backpack', 'A cool backpack with Dragon Quest artwork.', 29.99, 70, 'dragon_quest_backpack.jpg', '2025-02-25 03:30:00', 1),
(8, 'Romantic Chaos Mug', 'A cute mug featuring characters from Romantic Chaos.', 8.99, 120, 'romantic_chaos_mug.jpg', '2025-02-25 03:35:00', 1),
(9, 'Dragon Quest Hoodie', 'A cozy hoodie with Dragon Quest design.', 34.99, 60, 'dragon_quest_hoodie.jpg', '2025-02-25 03:40:00', 1),
(10, 'Romantic Chaos Keychain', 'A keychain with characters from Romantic Chaos.', 5.99, 200, 'romantic_chaos_keychain.jpg', '2025-02-25 03:45:00', 1),
(11, 'Dragon Questttt', '', 100.00, 17, '10.jpeg', '2025-02-26 16:02:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password`, `username`, `role`, `created_at`) VALUES
(1, 'haid77719@gmail.com', '$2y$10$fFLIf1Ne.CY1OmMg9//ZMuhNnRql/vM4Xat2eMstuNlK74Fo8rTsq', 'haidang1303', 'user', '2025-02-25 18:08:32'),
(2, 'nguyenvy01052005@gmail.com', 'vypro152505', 'admin', 'admin', '2025-02-26 01:29:08'),
(3, 'admin@example.com', '0192023a7bbd73250516f069df18b500', 'admin', 'user', '2025-02-26 01:42:14'),
(4, 'user1@example.com', '6ad14ba9986e3615423dfca256d04e3f', 'user1', 'user', '2025-02-26 01:42:14'),
(5, 'user2@example.com', '6ad14ba9986e3615423dfca256d04e3f', 'user2', 'user', '2025-02-26 01:42:14'),
(6, 'nguyenvy0105@gmail.com', '$2y$10$TRj1hlvm4KQVOsLIhXcQMuKjCBG1g6kCg.NmbbZfPpqMYxbTr8fB6', 'admin1', 'admin', '2025-02-26 02:13:45'),
(11, 'john.doe@example.com', 'password123', 'john_doe', 'user', '2025-02-25 22:43:00'),
(12, 'jane.smith@example.com', 'password123', 'jane_smith', 'user', '2025-02-25 22:43:00'),
(13, 'admin1@example.com', 'admin123', 'admin_user', 'admin', '2025-02-25 22:43:00'),
(14, 'charlie.brown@example.com', 'password123', 'charlie_brown', 'user', '2025-02-25 22:43:00'),
(15, 'haid7771119@gmail.com', '$2y$10$TcbCNTsXcgrlZqljrboe7ekhwemDRw7oQgBCf1B1YVN.EalNu3Vcy', 'admin12', 'user', '2025-02-26 16:00:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmark_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comic_id` (`comic_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `comic_id` (`comic_id`);

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`comic_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `comic_categories`
--
ALTER TABLE `comic_categories`
  ADD PRIMARY KEY (`comic_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comic_id` (`comic_id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `comic_id` (`comic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `store_ibfk_1` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `comic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`comic_id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`comic_id`) ON DELETE CASCADE;

--
-- Constraints for table `comics`
--
ALTER TABLE `comics`
  ADD CONSTRAINT `comics_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE SET NULL;

--
-- Constraints for table `comic_categories`
--
ALTER TABLE `comic_categories`
  ADD CONSTRAINT `comic_categories_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`comic_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comic_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`comic_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`comic_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
