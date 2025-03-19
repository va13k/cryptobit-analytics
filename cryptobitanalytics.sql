-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2025 at 10:10 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptobitanalytics`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `image`, `date`) VALUES
(1, 'Bitcoin Hits New All-Time High', 'Bitcoin (BTC) has surged past $75,000, setting a new record. Analysts believe institutional investments and global adoption are driving the rally. Many investors are now wondering if BTC will reach $100,000 by the end of the year.', 'jpg_png_images/articles/article01.png', '2025-03-17 17:40:07'),
(2, 'Ethereum 2.0 Update Brings Major Changes', 'Ethereum developers have successfully implemented the long-awaited Ethereum 2.0 upgrade. This update introduces proof-of-stake (PoS) consensus, reducing energy consumption and improving scalability. Experts say this will make Ethereum more sustainable and efficient.', 'jpg_png_images/articles/article02.png', '2025-03-17 17:47:07'),
(3, 'Crypto Regulations Tighten Worldwide', 'Governments across the globe are introducing new regulations to control cryptocurrency trading and taxation. Some countries have imposed strict laws, while others are embracing blockchain technology to enhance transparency in financial systems.', 'jpg_png_images/articles/article03.png', '2025-03-17 17:49:09'),
(4, 'NFT Market Boom: Are Digital Assets the Future?', 'Non-fungible tokens (NFTs) continue to attract massive investments. Artists, musicians, and even gaming companies are leveraging blockchain technology to create and sell unique digital assets. The market is expected to grow significantly in the coming years.', 'jpg_png_images/articles/article04.png', '2025-03-17 17:50:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
