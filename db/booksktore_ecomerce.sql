-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 06:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksktore_ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `cover_image` text DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL,
  `feature` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `detailDescription` text DEFAULT NULL,
  `pending` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `cover_image`, `categoryId`, `authorId`, `feature`, `description`, `detailDescription`, `pending`, `created_at`, `updated_at`) VALUES
(1, 'momi', 'Vendor_Images/YLft2gmyVyfOTDTK7Nfge0oBiYHWWhNj5vTLwfWK.png', 1, 1, 1, 'asddsaasddas', '&lt;p&gt;dasadssad&lt;/p&gt;', 0, '2021-04-05 17:22:33', '2021-04-06 08:30:12'),
(3, 'momi', NULL, 1, 1, 0, 'test', '&lt;p&gt;test&lt;/p&gt;', 0, '2021-04-06 08:28:32', '2021-04-06 08:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Comedy', '2021-04-05 16:48:54', '2021-04-05 16:52:12'),
(3, 'Funny', '2021-04-05 17:45:38', '2021-04-05 17:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstName` text DEFAULT NULL,
  `lastName` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `block` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstName`, `lastName`, `email`, `password`, `block`, `created_at`, `updated_at`) VALUES
(1, 'momi', 'test', 'rmomi786@gmail.com', '$2y$10$csvZXs3mvlqyluSNYnq0qe5Ijs.YsInnWH7KWgEcijyDeEGpctpyC', 0, '2021-04-07 13:44:55', '2021-04-07 13:44:55'),
(3, 'Momi', 'Rana', 'areenasoft123.solution@gmail.com', '$2y$10$csvZXs3mvlqyluSNYnq0qe5Ijs.YsInnWH7KWgEcijyDeEGpctpyC', 0, '2021-04-07 13:59:23', '2021-04-07 13:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, '2021-04-07 08:09:45', '2021-04-07 08:09:45'),
(2, 'About', 'about', '2021-04-07 08:10:13', '2021-04-07 08:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `main_slider`
--

CREATE TABLE `main_slider` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `h1` text DEFAULT NULL,
  `h2` text DEFAULT NULL,
  `h3` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link1` text DEFAULT NULL,
  `link1title` text DEFAULT NULL,
  `link2` text DEFAULT NULL,
  `link2title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_slider`
--

INSERT INTO `main_slider` (`id`, `image`, `h1`, `h2`, `h3`, `description`, `link1`, `link1title`, `link2`, `link2title`, `created_at`, `updated_at`) VALUES
(1, 'Slider_Images/2Rfw0QOe1FKrq5VeNCC6B9FGAg2hAgKSLQuq8eQN.png', 'Back To School', 'Specail 50% OFF', 'For Our Student Community', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet corrupti, maiores fugit facilis placeat saepe illum non voluptas mollitia.', '#', 'Get The Deal', '#', 'See Other Promos', '2021-04-07 08:37:49', '2021-04-07 08:38:33'),
(2, 'Slider_Images/pM4HvMN1F0odwB10YCyqvCU49InQFwsNTQ8WALOi.png', 'ascsa', 'assaasv', 'scscasa', 'dfhgjhkl;;\'', 'zcss', 'sddsdc', 'dscsac', 'saa', '2021-04-07 16:27:52', '2021-04-07 16:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newsImg` text DEFAULT NULL,
  `newsTitle` text DEFAULT NULL,
  `shotDes` text DEFAULT NULL,
  `detailDes` text DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newsImg`, `newsTitle`, `shotDes`, `detailDes`, `authorId`, `created_at`, `updated_at`) VALUES
(2, 'News_Images/7617ZCwVqQIFUW4UV676JbU2kLn2epcA6Mtjpoco.png', 'momi', 'fewfjwekf', '&lt;p&gt;,asfcwkjvkllkkewevlkaele&lt;/p&gt;', NULL, '2021-04-06 08:24:23', '2021-04-06 08:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `icon` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `icon`, `title`, `created_at`, `updated_at`) VALUES
(1, 'f39e', 'Facebook', '2021-03-30 20:01:39', '2021-03-30 20:05:05'),
(2, 'f099', 'Twitter', '2021-03-30 20:04:48', '2021-03-30 20:04:48'),
(3, 'f16d', 'Instagram', '2021-04-06 11:03:49', '2021-04-06 11:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$BXoa.AaaA3Mlh.Q5SR7uguHUSIdfkMvsoOQFVx/MabMDTtk1brpQm', 1, '2021-03-11 19:56:01', '2021-04-05 17:43:57'),
(2, 'MomiRana123', '$2y$10$GrRFbSrW1AVhFRtLRfBQsO5Q0jyysBOOHIVxJz0Goml0gGRIYyVNi', 2, '2021-04-06 11:40:31', '2021-04-06 11:40:31'),
(3, 'dsa', '$2y$10$GQm0aZahIZBA4uh4IqVzV.TuKZhBR2ceBBEKYh4PAd7HR8noTOT0m', 2, '2021-04-06 11:46:49', '2021-04-06 11:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `social_sites` text DEFAULT NULL,
  `social_link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `name`, `image`, `social_sites`, `social_link`, `description`, `userId`, `created_at`, `updated_at`) VALUES
(1, 'C:\\xampp\\tmp\\php8BD1.tmp', NULL, NULL, NULL, 'dasasdadsdsa', 2, '2021-04-06 11:40:31', '2021-04-06 11:40:31'),
(2, 'momiads', 'User_Images/3mMWnoI3wkUacxz5gwrGQrXLZ03YLUprxxYnArhK.png', '2@1', 'sdaasdads@https://facebook.com/momi', 'saddasdsa', 3, '2021-04-06 11:46:50', '2021-04-06 12:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `usertype` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-04-06 15:08:05', '2021-04-06 15:08:05'),
(2, 'Author', '2021-04-06 15:08:05', '2021-04-06 15:08:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_slider`
--
ALTER TABLE `main_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_slider`
--
ALTER TABLE `main_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
