-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 01:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--
CREATE DATABASE IF NOT EXISTS `events` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `events`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `image`, `capacity`, `email`, `phone`, `location`, `url`, `type`, `date`, `description`) VALUES
(1, 'Rob Zombie', 'rob.jpg', 15000, 'robbie@zombieworld@com', '0699 11223344', 'Stadthalle Wien: Roland-Rainer-Platz 1, 1150 Wien', 'https://robzombie.com', 'Industrial Metal', '2020-09-01 20:00:00', 'Finally Rob Zombie is back! do not miss this opportunity for his spectaculous horror show with mindblowing guitar riffs!'),
(3, 'Joan Jett', 'joanjett.png', 15000, 'joanjett@heroines.com', '0664 11223344', 'Stadthalle Wien: Guglgasse 6, 1110 Wien', 'http://joanjett.com/', 'Hard Rock', '2020-09-14 20:00:00', 'Joan Jett and the Black Hearts! Rock History! Enjoy this unforgettable evening with ballads that made generations of people rock!'),
(4, 'Sunrise Avenue', 'sunriseavenue.jpg', 10, 'surise@avenue.com', '0664 11223344', 'Stadthalle Wien: Guglgasse 6, 1110 Wien', 'https://www.sunriseave.com/', 'Alternative Rock', '2020-09-24 20:00:00', 'The absolutely last opportunity to see these boys united before they separate!'),
(5, 'Alice Cooper', 'alice.jpg', 200000, 'alicecooper@golfconsult.com', '06601236666', 'Pannonia Fields @ NOVA ROCK 2021 - 2425 Nickelsdorf', 'https://alicecooper.com/', 'Hard Rock', '2020-10-13 21:00:00', 'Alice Cooper is looking forward to spending an evening with you! Are you brave enough to accept his invitation? Be!'),
(15, 'Jimmy Eat World', 'jimmyeatworld.jpg', 15000, 'jimmy@eatworld.com', '0664 11223344', 'Stadthalle Wien: Guglgasse 6, 1110 Wien', 'https://www.jimmyeatworld.com', 'Alternative Rock', '2020-09-01 20:00:00', 'Who does not know the hymns of that great band? Do not miss the date! You never know when these guys decide to make another tour!'),
(16, 'Alpenrebellen', 'alpenrebellen.jpg', 2000, 'andi@rebell.at', '0664 55566677', 'Aufsteirern: Grazer Hauptplatz 1, 8010 Graz', 'http://www.alpenrebellen.at/', 'Volx Rock', '2020-10-19 12:00:00', 'Not for everyone! But if you are strong and brave and not afraid of folklore elements in a rock setting: enjoy the Show!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
