-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 28, 2021 lúc 02:52 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pemytech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mt_mcu`
--

CREATE TABLE `mt_mcu` (
  `mcu_id` int(11) NOT NULL,
  `mcu_key` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mcu_name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mcu_lasttime` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mt_mcu`
--

INSERT INTO `mt_mcu` (`mcu_id`, `mcu_key`, `mcu_name`, `mcu_lasttime`) VALUES
(1, 'tPmAT5Ab3j7F9', 'ESP 32S', '1632790125'),
(2, 'tPmAT5Ab3j7F8', 'ESP 32', '1632790124');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mt_tag`
--

CREATE TABLE `mt_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tag_type` int(11) NOT NULL,
  `tag_unit` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tag_icon` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `tag_value1` int(11) NOT NULL,
  `tag_value2` int(11) NOT NULL,
  `tag_min` int(11) NOT NULL,
  `tag_max` int(11) NOT NULL,
  `delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mt_tag`
--

INSERT INTO `mt_tag` (`tag_id`, `tag_name`, `tag_type`, `tag_unit`, `tag_icon`, `room_id`, `tag_value1`, `tag_value2`, `tag_min`, `tag_max`, `delete`) VALUES
(1, 'Đèn 1', 1, '0', '0', 1, 0, 0, 0, 0, 0),
(2, 'Đèn 2', 1, '0', '0', 1, 0, 0, 0, 0, 0),
(3, 'Sensor 1', 2, '°C', '0', 0, 57, 0, 0, 100, 0),
(4, 'Đèn Nhà Tắm', 1, '0', '0', 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mt_user`
--

CREATE TABLE `mt_user` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_fullname` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_email` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_password` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_pemission` int(11) NOT NULL,
  `user_avatar` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mt_user`
--

INSERT INTO `mt_user` (`user_id`, `user_name`, `user_fullname`, `user_email`, `user_password`, `user_pemission`, `user_avatar`) VALUES
(1, 'okeynhat', 'Trần Minh Thức', 'okeynhat@gmail.com', '12345', 1, 'https://www.dungplus.com/wp-content/uploads/2019/12/girl-xinh-1-480x600.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `mt_mcu`
--
ALTER TABLE `mt_mcu`
  ADD PRIMARY KEY (`mcu_id`);

--
-- Chỉ mục cho bảng `mt_tag`
--
ALTER TABLE `mt_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Chỉ mục cho bảng `mt_user`
--
ALTER TABLE `mt_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `mt_mcu`
--
ALTER TABLE `mt_mcu`
  MODIFY `mcu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mt_tag`
--
ALTER TABLE `mt_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mt_user`
--
ALTER TABLE `mt_user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
