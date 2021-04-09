-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 12:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

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
(1, '2021_03_31_130420_create_roles_table', 1),
(2, '2021_03_31_131046_create_users_table', 2),
(3, '2021_04_01_110608_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `img`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'sequi', 'Laboriosam omnis quia aliquam natus quo maxime. Sunt sed commodi est fugit esse error ut. Dicta numquam repellat voluptatem dolores amet dolores. Commodi molestiae earum vel iste ipsa.', 'book.jpg', 2, NULL, NULL, 1),
(2, 'et', 'Amet quos natus non ipsa nisi. Nam asperiores temporibus beatae ad incidunt rerum numquam. Et eos est dolor quod.', 'girl.jpg', 4, NULL, NULL, 1),
(3, 'error', 'Similique sequi natus voluptatum. Molestias aspernatur reprehenderit eius quas voluptas. Esse qui voluptatem repudiandae hic.', 'coffee.jpg', 3, NULL, NULL, 1),
(4, 'maxime', 'Quasi repellat rerum molestias ut ut sunt non. Quibusdam ratione corrupti fugit earum sit facilis. Quis error deserunt commodi cumque. Velit sint maxime debitis.', 'green.jpg', 5, NULL, NULL, 1),
(5, 'dolorum', 'Necessitatibus velit aliquam dicta et placeat eligendi. Voluptates incidunt omnis excepturi ut. Reiciendis commodi recusandae ut aut odit. Magnam harum sequi aut accusantium ea et.', 'mirror.jpg', 2, NULL, NULL, 1),
(6, 'ut', 'Quae eum praesentium autem laudantium. Omnis ut dolorum culpa quibusdam. Porro in enim repudiandae occaecati voluptas non et. Sit fugit odio praesentium cupiditate. Ratione aut sequi omnis.', 'tattoo.jpg', 3, NULL, NULL, 1),
(7, 'nesciunt', 'Quas ut eos quasi iure sunt eius. Iusto dolores modi tenetur explicabo et commodi tempora. Nihil quis minus a inventore harum dignissimos vitae.', 'cupcake.jpg', 4, NULL, NULL, 1),
(8, 'facilis', 'Officiis rerum omnis modi tempore ea voluptates beatae. Iusto vero ea nostrum. Soluta ullam eius iure quae.', 'balcony.jpg', 5, NULL, NULL, 1),
(9, 'aliquam', 'Et cum quia quae qui. Mollitia id et numquam consectetur quaerat vero. Maiores voluptas ab aliquam dolor sit perferendis est aut. Reprehenderit voluptates aliquid aut quisquam qui consequatur id.', 'paris.jpg', 2, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Katarina', 'Raic', 'katarinaraic98@gmail.com', '59dda66f74e8c549f1cffbdb83cd699c', 1, NULL, NULL),
(2, 'Pera', 'Peric', 'peraperic@gmail.com', '26e86eef950d46dde5c45c49054efa84', 2, NULL, NULL),
(3, 'Laza', 'Lazarevic', 'lazalazarevic@gmail.com', '7f4f25b5caf96827cf793deb65ec3b25', 2, NULL, NULL),
(4, 'Nikola', 'Nikolic', 'nikolanikolic@gmail.com', '29450dc1afabf31f3663868720e0824c', 2, NULL, NULL),
(5, 'Marija', 'Vasic', 'marijavasic@gmail.com', '12776172cc30ee8649a9cdc245372734', 2, NULL, NULL),
(8, 'Nikola', 'Krstic', 'nikolakrstic@gmail.com', 'a646e457db47ad218d6d9d3ce325878b', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
