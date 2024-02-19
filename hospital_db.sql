-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 19, 2024 lúc 04:14 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hospital_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patients`
--

CREATE TABLE `patients` (
  `khoa` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`khoa`, `id_card`, `name`, `dob`, `gender`, `address`, `reason`, `created_at`) VALUES
('', '', '', '0000-00-00', 'male', '', '', '2024-02-19 15:04:56'),
('Khoa Nội', '034567899876', 'Do Phuong', '2024-02-07', 'female', 'Ha Noi', 'mệt', '2024-02-18 16:03:58'),
('Khoa Nội', '038345322345', 'Nguyễn Vũ Linh', '2004-06-05', 'female', 'Ha Noi', 'Bị sốt xuất huyết', '2024-02-19 15:02:11'),
('Khoa Ngoại', '038345679809', 'Phạm Hoàng Minh', '2004-06-01', 'male', 'Thanh Hóa', 'Bị sốt xuất huyết', '2024-02-19 15:01:28'),
('Khoa Sản', '0384564345432', 'Trần Thanh Thanh', '2004-06-02', 'female', 'Ha Noi', 'Sinh non', '2024-02-19 15:03:26'),
('Khoa Ngoại', '098765434577', 'Nguyễn Mai Anh', '2021-06-09', 'male', 'Phú Thọ', 'Bị đau chân ', '2024-02-19 15:00:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_card`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
