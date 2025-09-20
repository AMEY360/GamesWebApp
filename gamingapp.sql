-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 02:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `platform` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sale_status` enum('On Sale','Not on Sale') NOT NULL DEFAULT 'Not on Sale',
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `genre`, `platform`, `price`, `sale_status`, `image_url`) VALUES
(1, 'Adventure Quest', 'Adventure', 'PC', 0.00, 'On Sale', 'images/adventure_quest.jpg'),
(2, 'RPG Hero', 'RPG', 'PlayStation', 49.99, 'Not on Sale', 'images/rpg_hero.jpg'),
(3, 'Shooter Pro', 'Shooter', 'Xbox', 59.99, 'On Sale', 'images/shooter_pro.jpg'),
(4, 'Sports Champ', 'Sports', 'PC', 0.00, 'Not on Sale', 'images/sports_champ.jpg'),
(5, 'Mystery Island', 'Adventure', 'Mobile', 0.00, 'On Sale', 'images/mystery_island.jpg'),
(6, 'Battle Royale', 'Shooter', 'PC', 19.99, 'Not on Sale', 'images/battle_royale.jpg'),
(7, 'Soccer Star', 'Sports', 'PlayStation', 29.99, 'On Sale', 'images/soccer_star.jpg'),
(8, 'Dragon Slayer', 'RPG', 'Xbox', 39.99, 'On Sale', 'images/dragon_slayer.jpg'),
(9, 'Fantasy World', 'Adventure', 'PC', 0.00, 'Not on Sale', 'images/fantasy_world.jpg'),
(10, 'Zombie Attack', 'Shooter', 'Mobile', 0.00, 'On Sale', 'images/zombie_attack.jpg'),
(11, 'Ultimate Racer', 'Sports', 'PC', 24.99, 'Not on Sale', 'images/ultimate_racer.jpg'),
(12, 'Magic Quest', 'RPG', 'PlayStation', 0.00, 'On Sale', 'images/magic_quest.jpg'),
(13, 'Space Odyssey', 'Adventure', 'Xbox', 59.99, 'On Sale', 'images/space_odyssey.jpg'),
(14, 'Sniper Elite', 'Shooter', 'PC', 49.99, 'Not on Sale', 'images/sniper_elite.jpg'),
(15, 'Football Legends', 'Sports', 'Mobile', 0.00, 'On Sale', 'images/football_legends.jpg'),
(16, 'Kingdom Heroes', 'RPG', 'PC', 19.99, 'Not on Sale', 'images/kingdom_heroes.jpg'),
(17, 'Jungle Adventure', 'Adventure', 'PlayStation', 0.00, 'On Sale', 'images/jungle_adventure.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
