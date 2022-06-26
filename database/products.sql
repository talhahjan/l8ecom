-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 08:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `laravel`
--

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 13, 1, NULL, NULL),
(2, 13, 2, NULL, NULL),
(3, 7, 3, NULL, NULL),
(4, 8, 3, NULL, NULL),
(5, 7, 4, NULL, NULL),
(6, 8, 4, NULL, NULL),
(7, 7, 5, NULL, NULL),
(8, 8, 5, NULL, NULL),
(9, 15, 6, NULL, NULL),
(10, 15, 7, NULL, NULL),
(11, 12, 8, NULL, NULL),
(12, 12, 9, NULL, NULL),
(13, 12, 10, NULL, NULL),
(16, 14, 11, NULL, NULL),
(17, 7, 12, NULL, NULL),
(18, 7, 13, NULL, NULL),
(19, 9, 14, NULL, NULL),
(20, 9, 15, NULL, NULL);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `discount`, `discount_price`, `color`, `stock`, `size_range`, `slug`, `brand_id`, `status`, `featured`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Steve madden Wedge', 'sasasasasas', 3499, 1, '250', 'Silver', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'steve-madden-wedge', '8', 1, 1, '{\"Size\":null}', '2021-01-18 14:28:46', '2021-01-21 14:02:02', NULL),
(2, 'Stylish Wedge Sandal', 'sasasasasas', 3599, 1, '500', 'White', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'stylish-wedge-sandal', '8', 1, 1, NULL, '2021-01-18 14:29:50', '2021-01-18 15:43:52', NULL),
(3, 'Champion black', 'asasasasasas', 2499, 1, '300', 'Black', '[\"35-2\",\"36-2\",\"37-2\",\"38-2\",\"39-2\",\"40-2\"]', 35, 'champion-black', '8', 1, 1, '{\"Size\":null}', '2021-01-18 14:31:01', '2021-01-18 15:41:22', NULL),
(4, 'Pink slip-on', 'asasasasas', 2499, 0, '00', 'Pink', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'pink-slip-on', '4', 1, 1, '{\"Size\":null}', '2021-01-18 14:31:59', '2021-01-18 14:31:59', NULL),
(5, 'Nike Court Royale', 'asdsadadasdsadsad', 2499, 0, '2499', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'nike-court-royale', '8', 1, 1, '{\"Size\":null}', '2021-01-18 14:33:40', '2021-01-18 15:41:26', NULL),
(6, 'Stylish Bridal High Heel', 'short description&nbsp;', 6499, 1, '349', 'Golden', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'stylish-bridal-high-heel', '8', 1, 1, '{\"Size\":null}', '2021-01-21 13:25:10', '2021-01-21 14:01:37', NULL),
(7, 'Stylish Bridal Slip-on', 'short description', 6499, 1, '1000', 'Golden', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'stylish-bridal-slip-on', '8', 1, 1, NULL, '2021-01-21 13:27:32', '2021-01-21 13:27:32', NULL),
(8, 'School Shoes Magic', 'short decription', 1299, 1, '350', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'school-shoes-magic', '4', 1, 1, '{\"Size\":null}', '2021-01-21 13:35:15', '2021-01-21 13:35:15', NULL),
(9, 'School shoes lace', 'short description&nbsp; of this item', 1499, 1, '350', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'school-shoes-lace', '4', 1, 1, '{\"Size\":null}', '2021-01-21 13:36:35', '2021-01-21 14:01:33', NULL),
(10, 'School Pump', 'short description of this item', 1699, 1, '350', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'school-pump', '4', 1, 1, '{\"Size\":null}', '2021-01-21 13:37:52', '2021-01-21 13:37:52', NULL),
(11, 'Corona Men Slider', 'short description of this file ,', 1200, 1, '99', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'corona-men-slider', '8', 1, 1, '{\"Size\":null}', '2021-01-21 13:48:49', '2021-01-21 14:01:40', NULL),
(12, 'Men Printed Flip-flop', 'short description of this file ,', 700, 1, '99', 'Golden', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'men-printed-flip-flop', '8', 1, 1, '{\"Size\":null}', '2021-01-21 13:49:52', '2021-01-21 13:52:46', NULL),
(13, 'Men Multi Color Flip-Flop', 'short description of this file ,', 99, 1, '49', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'men-multi-color-flip-flop', '8', 1, 1, '{\"Size\":null}', '2021-01-21 13:53:20', '2021-01-21 14:01:46', NULL),
(14, 'Men\'s Corona Flip-Flop', 'short description of this file ,', 999, 1, '49', 'Black', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'mens-corona-flip-flop', '8', 1, 1, '{\"Size\":null}', '2021-01-21 13:54:39', '2021-01-21 14:01:48', NULL),
(15, 'Rider Eva Flip-Flop', 'short description of this file ,', 1199, 1, '100', 'Gray', '[\"39-2\",\"40-2\",\"41-2\",\"42-2\",\"43-2\",\"44-2\"]', 39, 'rider-eva-flip-flop', '8', 1, 1, '{\"Size\":null}', '2021-01-21 13:55:52', '2021-01-21 13:55:52', NULL);

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `path`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uploads/products/thumbnails/df50595e9a84f279528d9ef401cfb13c1610998126.jpg', 1, '2021-01-18 14:28:46', '2021-01-18 14:28:46', NULL),
(2, 'uploads/products/thumbnails/download1610998190.jpg', 2, '2021-01-18 14:29:50', '2021-01-18 14:29:50', NULL),
(3, 'uploads/products/thumbnails/images1610998261.jpg', 3, '2021-01-18 14:31:01', '2021-01-18 14:31:01', NULL),
(4, 'uploads/products/thumbnails/images (1)1610998319.jpg', 4, '2021-01-18 14:31:59', '2021-01-18 14:31:59', NULL),
(5, 'uploads/products/thumbnails/nike-court-royale.jpg', 5, NULL, NULL, NULL),
(6, 'uploads/products/thumbnails/Stylo-Shoes-Fangitcy-Wedding-Footwear-Collection-2016-2017-291611253510.jpg', 6, '2021-01-21 13:25:10', '2021-01-21 13:25:10', NULL),
(7, 'uploads/products/thumbnails/ac74bb81eb18ac7d53a867af72d037a41611253652.jpg', 7, '2021-01-21 13:27:32', '2021-01-21 13:27:32', NULL),
(8, 'uploads/products/thumbnails/855-6355_300x300_11611254115.jpeg', 8, '2021-01-21 13:35:15', '2021-01-21 13:35:15', NULL),
(9, 'uploads/products/thumbnails/download1611254195.jfif', 9, '2021-01-21 13:36:35', '2021-01-21 13:36:35', NULL),
(10, 'uploads/products/thumbnails/1455451611254272.webp', 10, '2021-01-21 13:37:52', '2021-01-21 13:37:52', NULL),
(11, 'uploads/products/thumbnails/flip-flops-flip-flop1611254993.jpg', 12, '2021-01-21 13:49:53', '2021-01-21 13:49:53', NULL),
(12, 'uploads/products/thumbnails/img-3042-500x5001611255127.jpg', 11, '2021-01-21 13:52:07', '2021-01-21 13:52:07', NULL),
(13, 'uploads/products/thumbnails/images (1)1611255200.jfif', 13, '2021-01-21 13:53:20', '2021-01-21 13:53:20', NULL),
(14, 'uploads/products/thumbnails/images1611255279.jfif', 14, '2021-01-21 13:54:39', '2021-01-21 13:54:39', NULL),
(15, 'uploads/products/thumbnails/capeblackgreen825642-191611255352.jpg', 15, '2021-01-21 13:55:52', '2021-01-21 13:55:52', NULL);
COMMIT;
