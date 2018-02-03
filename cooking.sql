-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 09:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(2, '2017-04-18 10:10:51', '2017-04-18 10:10:51', 'Vegetarian'),
(3, '2017-04-19 07:17:43', '2017-04-19 07:17:43', 'Snacks'),
(4, '2017-04-19 07:18:09', '2017-04-19 07:18:09', 'Salads'),
(5, '2017-04-19 09:23:07', '2017-04-19 07:23:07', 'Non-vegetarian'),
(6, '2017-04-19 07:19:08', '2017-04-19 07:19:08', 'Desserts'),
(7, '2017-04-19 07:19:55', '2017-04-19 07:19:55', 'Soups&Stews'),
(8, '2017-04-19 07:20:40', '2017-04-19 07:20:40', 'Drinks'),
(9, '2017-04-19 07:22:08', '2017-04-19 07:22:08', 'Bread, Muffins & Scones'),
(10, '2017-04-19 07:22:40', '2017-04-19 07:22:40', 'Seafood'),
(11, '2017-04-19 07:24:46', '2017-04-19 07:24:46', 'Dips, Salad Dressings, Salsas and Sauces');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `created_at`, `updated_at`, `user_id`, `recipe_id`) VALUES
(1, '2017-04-25 09:56:37', '2017-04-25 09:56:37', 1, 32),
(2, '2017-04-25 10:04:32', '2017-04-25 10:04:32', 1, 1),
(3, '2017-04-27 07:09:09', '2017-04-27 07:09:09', 2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `created_at`, `updated_at`, `name`) VALUES
(4, '2017-04-19 10:25:40', '2017-04-19 10:25:40', 'egg'),
(5, '2017-04-19 10:25:40', '2017-04-19 10:25:40', 'milk'),
(6, '2017-04-19 10:26:03', '2017-04-19 10:26:03', 'chicken'),
(7, '2017-04-19 10:26:03', '2017-04-19 10:26:03', 'garlic'),
(8, '2017-04-19 10:26:58', '2017-04-19 10:26:58', 'butter'),
(9, '2017-04-19 10:26:59', '2017-04-19 10:26:59', 'sugar'),
(18, '2017-04-24 07:20:05', '2017-04-24 07:20:05', 'oil'),
(19, '2017-04-24 07:20:05', '2017-04-24 07:20:05', 'flour'),
(21, '2017-04-24 08:15:44', '2017-04-24 08:15:44', 'baking powder'),
(22, '2017-04-24 08:20:46', '2017-04-24 08:20:46', 'onion'),
(23, '2017-04-24 09:14:08', '2017-04-24 09:14:08', 'apple'),
(24, '2017-04-24 09:18:36', '2017-04-24 09:18:36', 'lemon'),
(25, '2017-04-24 09:19:51', '2017-04-24 09:19:51', 'orange'),
(26, '2017-04-24 09:26:12', '2017-04-24 09:26:12', 'mango'),
(27, '2017-04-24 09:29:39', '2017-04-24 09:29:39', 'strawberry'),
(28, '2017-04-26 08:25:10', '2017-04-26 08:25:10', 'chilli'),
(29, '2017-04-27 07:53:48', '2017-04-27 07:53:48', 'gh'),
(30, '2017-04-27 09:29:29', '2017-04-27 09:29:29', 'yeast'),
(31, '2017-04-27 09:29:29', '2017-04-27 09:29:29', 'water'),
(32, '2017-11-08 11:04:12', '2017-11-08 11:04:12', 'test'),
(33, '2017-11-08 12:42:02', '2017-11-08 12:42:02', 'test123'),
(34, '2017-11-08 12:43:20', '2017-11-08 12:43:20', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(1, '2017-04-27 08:39:36', '2017-04-27 06:39:36', 'news 1', 'ugfgjhefgjhj\r\ngglkglksrjhkljkhljs\r\n\r\nedited'),
(3, '2017-04-27 06:41:55', '2017-04-27 06:41:55', 'news 2', 'new 2 desjhgf\r\njgkfgjskhkgh'),
(4, '2017-04-27 06:42:08', '2017-04-27 06:42:08', 'news 3', 'erterwywery\r\ntrkhrthjrtkh'),
(5, '2017-04-27 06:42:17', '2017-04-27 06:42:17', 'news 4', 'fergrhesth'),
(6, '2017-04-27 06:42:30', '2017-04-27 06:42:30', 'news 5', 'erjksghrkjgekrht'),
(7, '2017-04-27 06:42:40', '2017-04-27 06:42:40', 'news 6', 'herighersjgetk');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(2, '2017-04-20 05:52:58', '2017-04-20 05:52:58', 'Om os', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(3, '2017-04-20 09:39:19', '2017-04-20 07:39:19', 'Regler & Vilkår', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `recipeingredients`
--

CREATE TABLE `recipeingredients` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `amount` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `recipeingredients`
--

INSERT INTO `recipeingredients` (`id`, `created_at`, `updated_at`, `recipe_id`, `ingredient_id`, `amount`) VALUES
(7, '2017-04-24 08:20:46', '2017-04-24 08:20:46', 32, 6, '500 g'),
(27, '2017-04-26 08:25:10', '2017-04-26 08:25:10', 32, 6, '500 g'),
(63, '2017-11-08 12:24:18', '2017-11-08 12:24:18', 32, 22, '2'),
(64, '2017-11-08 12:24:18', '2017-11-08 12:24:18', 32, 7, '10'),
(65, '2017-11-08 12:24:19', '2017-11-08 12:24:19', 32, 28, '50g'),
(66, '2017-11-08 12:41:23', '2017-11-08 12:41:23', 32, 32, ''),
(67, '2017-11-08 12:42:02', '2017-11-08 12:42:02', 32, 33, '100'),
(68, '2017-11-08 12:43:20', '2017-11-08 12:43:20', 32, 34, '100'),
(69, '2017-11-08 13:09:24', '2017-11-08 13:09:24', 1, 23, '5'),
(70, '2017-11-08 13:09:24', '2017-11-08 13:09:24', 1, 4, '3'),
(71, '2017-11-08 13:11:18', '2017-11-08 13:11:18', 1, 5, '5 litr');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `created_at`, `updated_at`, `name`, `user_id`, `cat_id`, `description`, `image`, `votes`) VALUES
(1, '2017-11-08 14:11:18', '2017-11-08 13:11:18', 'Pancake', 2, 9, 'gdfgdfhghhf', '748d640a4c1208365887eed1eec5a25e', 2),
(2, '2017-04-27 07:56:57', '2017-04-25 06:51:31', 'vanilla cake', 2, 9, 'fgegt', 'd3f89066e664a346711da48c63fea797', 0),
(32, '2017-11-08 14:02:19', '2017-11-08 13:02:19', 'chilli chicken', 3, 6, 'chicken chilli recipe bgh<br /><br /><br /><br /><br /><br /><br /><br /><br />\r\nadded chilli- 50g', '8b8f7a8ede6b431a96b7bb2a1330d7ba', 1),
(33, '2017-04-27 09:13:33', '2017-04-27 07:13:33', 'egg roll', 4, 9, 'egg roll recipe bgh', 'f42d16f73cfead4a206a1029bdde35ff', 0),
(39, '2017-04-27 09:14:07', '2017-04-27 07:14:07', 'fruit salad', 4, 9, 'fbygvrhtkhjsklghjgfh', '9ccceb101c026e6faba00960b1ee4875', 0),
(42, '2017-04-27 09:29:29', '2017-04-27 09:29:29', 'brown bread', 6, 4, 'gfdrhdurdytyikd', 'e6d645c310b9d3aaf48d570bb2d60d94', 0);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `search` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `created_at`, `updated_at`, `user_id`, `search`) VALUES
(1, '2017-04-27 08:49:04', '2017-04-27 08:49:04', 6, 'egg'),
(2, '2017-04-27 09:00:58', '2017-04-27 09:00:58', 6, 'chicken'),
(3, '2017-04-27 09:21:53', '2017-04-27 09:21:53', 6, 'eby');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `username`, `password`, `email`, `remember_token`, `admin`, `image`, `votes`) VALUES
(1, '2017-04-27 10:42:27', '2017-04-27 08:42:27', 'admin', '$2y$10$WX03a2yONVpwrO9vvLTjOO/CdtkGi.ntkb3XVvfJzQcbt4St6K8qS', 'admin@admin.com', 'JAjoDZqc8RcUTol495iORFr7qaAljZvJuJoBJCA9aLCdEbW7FQZ48SXZJQ7x', 1, 'a359dc8ff2da66f77eec242fd277b274', 8),
(2, '2017-04-27 10:20:11', '2017-04-27 08:20:11', 'eby', '$2y$10$P9dbizJc394NWRBWwGWsGOVLZHaSg40NdaknZLS6TPJvlV2pzdD/C', 'eby@eby.com', 'k0pvneJxHNQJFzj7VbTL16Lhb82OLCUQiCdqz2CpEvQrHBeTIMd0FakbTLDO', 0, '5c1b768f9a6727b04386b1f81a87b3f3', 11),
(3, '2017-11-08 14:08:14', '2017-11-08 13:08:14', 'mads', '$2y$10$.yHJ9cdeuVEJvzr.vrEoleMTlvKmBt0YfKzqguGbhM672TXJWl5dS', 'mads@m.dk', 'TKLf6wV1a6mugtXZf9xZDPUaiWwJmzc7z9HYnsQx8UpgoSpwV2qya45Wjqxg', 0, '50d771a9fd3ade5cf25eed052e5aee4b', 1),
(4, '2017-04-27 09:16:38', '2017-04-27 07:14:18', 'kasper', '$2y$10$nfz28ZqSu14hZTGq0mrkbeOKxTdPIJz15ldJZUu46iukoEGxvyslW', 'k@k.dk', '3KdaxLC9e0ISQ4iXUCxFfsjz4opFWH8g1QLNFBi36jjZBg3N91mix84SlSb5', 0, 'a4b6896ef457967f26765a79bf6c5772', 34),
(5, '2017-04-27 09:17:29', '2017-04-27 07:17:29', 'dennis', '$2y$10$NqFwop6vePP.phlrORlcX.OGSWRbBtNkjFMxlXaeogCe/JqEEjCOG', 'd@d.dk', '6rqOxEqHs9zKcHR6BsWnXPL9k4vYpoZ1HX7f2R30WCF7o6TheRSRAK5lCgMz', 0, 'b49a1129973adb298e3deb6cd3baf993', 0),
(6, '2017-04-27 09:52:15', '2017-04-27 07:52:15', 'Sandra', '$2y$10$t3noSKoNXRXvPuGvaxX49.QMsmpYX8OZsofEbpdsWySY.j7fxIw0C', 's@s.dk', '6PVhgywiTPNrZQic5lcAScs9GYGUUhzowQNAEB00MFs6IZ8IG2pUnCqiGGou', 0, '016b6c1b2c6639b2a7fe053b90e01530', 5),
(10, '2017-04-27 09:36:01', '2017-04-27 07:36:01', 'orange', '$2y$10$52MYQzeEI/qFjpMhxcT9KuKrGsnoyE0c7yZTOk0HhuQ1LKExwvT2a', 'ohf@fhgh.dk', 'kv0vpYzAd6HZbYtMtq8Fyhl9X4MPsqtmfurGZxLwu24CMmuIuNabLsY6xgK4', 0, 'e48928d103e1286989dca4854c9406fa', 0),
(11, '2017-04-27 09:28:43', '2017-04-27 07:28:43', 'apple', '$2y$10$ViAbRcGC9pAJP3UKJKAex.xmybdoQ/3e6xdQ/ms1CM3bXV1/yMjre', 'app@hgdsjf.fdf', 'rDyKDwlGh9b2UxB4rYoqQOnVgPWfpkthQ8S5gU3RhZJcZ5CE22r9K6lD9dwC', 0, '46f8d01c1d9b39e7dd7228f6d2f8327e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
