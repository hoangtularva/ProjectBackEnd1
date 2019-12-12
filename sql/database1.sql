-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2019 lúc 04:33 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_password`, `admin_email`, `admin_role`) VALUES
(1, 'admin', '12345', 'admin@gmail.com', 'admin'),
(2, 'hoangtu', '12345', 'hoangtukg295@gmail.com', 'admin'),
(3, 'vanlong', '12345', 'vanlong@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Accessories'),
(2, 'Mavic'),
(3, 'Phantom');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_image`) VALUES
(1, 'YUNEEC – Typhoon H Hexacopter Pro with Intel RealSense Technology', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n\r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '895.00', 'mt-1169_products_img10.jpg'),
(2, 'YUNEEC – Typhoon H Hexacopter – Gun Metal Gray', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n\r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '985.00', 'mt-1169_products_img09.jpg'),
(3, 'YUNEEC – Typhoon 4K Quadcopter with Carrying Case', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n\r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '754.00', 'mt-1169_products_img08.jpg'),
(4, 'WebRC – XDrone 2 Remote-Controlled Quadcopter – Black', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n\r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '652.00', 'mt-1169_products_img07.jpg'),
(5, 'Riviera RC – Raptor Drone with Remote Controller', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n \r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '765.00', 'mt-1169_products_img06.jpg'),
(6, 'Protocol – Neo-Drone Mini RC Drone', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n \r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '458.00', 'mt-1169_products_img05.jpg'),
(7, 'Parrot – Bebop 2 Quadcopter with Skycontroller 2 and Cockpit FPV Glasses', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n \r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '1241.00', 'mt-1169_products_img04.jpg'),
(8, 'EHANG – Ghostdrone 2.0 VR Drone (Apple iOS Compartible)', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n \r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '876.00', 'mt-1169_products_img03.jpg'),
(9, 'Autel Robotics – X-Star Premium Quadcopter with Remote Controller', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n \r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '876.00', 'mt-1169_products_img02.jpg'),
(10, '3DR – Solo Drone – Black', 'This is a multi-functional, 4K camera-equipped new quadcopter model by the Lindara gadget brand.\r\n\r\n \r\n\r\nAs it comes with a true ultra-definition camera, UK99 is capable of capturing some most stunning videos and images from the above!', '1098.00', 'mt-1169_products_img01.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_role`) VALUES
(1, 'hoangtu', 'hoangtu', 'Hoàng Tú', 'member');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
