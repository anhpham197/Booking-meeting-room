-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2021 lúc 02:00 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `booking_meeting_room`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', NULL, NULL),
(2, 'Alphabet (Google)', NULL, NULL),
(3, 'Meta', NULL, NULL),
(4, 'Amazon', NULL, NULL),
(5, 'Tesla', NULL, NULL),
(6, 'IBM', NULL, NULL),
(7, 'NVIDIA', NULL, NULL),
(8, 'Samsung', NULL, NULL),
(9, 'Tencent', NULL, NULL),
(10, 'Alibaba', NULL, NULL),
(11, 'Oracle', NULL, NULL),
(12, 'Adobe', NULL, NULL),
(13, 'Netflix', NULL, NULL),
(14, 'Paypal', NULL, NULL),
(15, 'QUALCOMM', NULL, NULL),
(16, 'Shopify', NULL, NULL),
(17, 'Magento', NULL, NULL),
(18, 'Sony', NULL, NULL),
(19, 'Texas Instruments', NULL, NULL),
(20, 'Airbnb', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` datetime DEFAULT NULL,
  `ending_time` timestamp NULL DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `room_id`, `user_id`, `name`, `starting_time`, `ending_time`, `note`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Weekly team meeting', '2021-12-08 02:31:00', '2021-12-07 20:29:00', 'I need whiteboard', '1638905430.jpg', '2021-12-07 12:30:30', '2021-12-07 12:30:30', NULL),
(2, 2, 15, 'Marketing plan', '2021-12-08 10:30:00', '2021-12-08 04:33:00', NULL, NULL, '2021-12-07 12:33:37', '2021-12-07 12:33:37', NULL),
(3, 15, 1, 'New project in Jakarta', '2021-12-12 02:43:00', '2021-12-14 19:44:00', 'We need 10 bottles of water! Thanks!', '', '2021-12-07 12:46:40', '2021-12-07 19:29:37', NULL),
(4, 13, 1, 'Product handover', '2022-01-08 09:31:00', '2022-01-08 03:31:00', NULL, '1638930741.pdf', '2021-12-07 19:32:21', '2021-12-07 19:51:29', '2021-12-07 19:51:29'),
(5, 12, 1, 'Họp cuối năm', '2021-12-08 10:55:00', '2021-12-10 02:55:00', 'Cung cấp nước uống cho tất cả những người tham gia cuộc họp!', '1638932229.pdf', '2021-12-07 19:57:09', '2021-12-07 19:57:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_user`
--

CREATE TABLE `event_user` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `event_user`
--

INSERT INTO `event_user` (`event_id`, `user_id`) VALUES
(1, 1),
(1, 15),
(2, 1),
(2, 4),
(3, 1),
(3, 14),
(3, 15),
(4, 1),
(4, 14),
(4, 15),
(5, 1),
(5, 6),
(5, 14),
(5, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Smart Board', NULL, NULL),
(2, 'Projection Screen', NULL, NULL),
(3, 'Wi-Fi', NULL, NULL),
(4, 'Air-conditioned', NULL, NULL),
(5, 'Printing', NULL, NULL),
(6, 'Television', NULL, NULL),
(7, 'Speaker', NULL, NULL),
(8, 'Wireless microphones', NULL, NULL),
(9, 'Round table', NULL, NULL),
(10, 'Chair', NULL, NULL),
(11, 'Ceiling fans', NULL, NULL),
(12, 'Refrigerator', NULL, NULL),
(13, 'Washing machine', '2021-12-07 15:52:23', '2021-12-07 15:52:23'),
(14, 'Sofa', '2021-12-07 15:52:23', '2021-12-07 15:52:23'),
(17, 'Brush', '2021-12-07 15:59:20', '2021-12-07 15:59:20'),
(18, 'bảng đen', '2021-12-07 20:09:43', '2021-12-07 20:09:43'),
(19, 'phấn', '2021-12-07 20:09:43', '2021-12-07 20:09:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facility_room`
--

CREATE TABLE `facility_room` (
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `facility_room`
--

INSERT INTO `facility_room` (`room_id`, `facility_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(1, 7),
(2, 6),
(2, 8),
(2, 9),
(3, 7),
(3, 12),
(4, 1),
(4, 11),
(5, 4),
(5, 5),
(5, 9),
(5, 10),
(5, 12),
(6, 3),
(6, 10),
(7, 2),
(7, 9),
(8, 1),
(8, 7),
(9, 1),
(9, 12),
(10, 2),
(10, 7),
(11, 1),
(11, 3),
(12, 1),
(12, 10),
(13, 3),
(13, 5),
(13, 10),
(14, 7),
(14, 9),
(15, 3),
(15, 5),
(15, 6),
(16, 2),
(16, 5),
(17, 9),
(17, 11),
(18, 3),
(18, 6),
(18, 8),
(19, 6),
(19, 8),
(19, 12),
(20, 1),
(20, 4),
(20, 5),
(20, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2021_10_28_043728_create_company_table', 2),
(18, '2021_10_31_032731_create_events_table', 3),
(19, '2021_10_31_040715_create_rooms_table', 3),
(20, '2021_11_01_015440_create_event_room_pivot_table', 3),
(21, '2021_11_29_094623_create_furniture_table', 4),
(22, '2021_11_29_094824_create_furnitures_table', 5),
(25, '2021_11_29_095153_create_facilities_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ngocanhpham197@gmail.com', '$2y$10$ozsbrQ7Wd2CsGROxALBAz.jiZ2sZYPyUsSUi/ujn55a172NRjMbGK', '2021-12-02 01:09:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`event_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phòng hơi chật', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `status` enum('Active','Repairing') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `capacity`, `area`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '501', 4, 8, 'Active', NULL, '2021-12-07 20:08:51', NULL),
(2, '102', 25, 40, 'Active', NULL, NULL, NULL),
(3, '103', 20, 40, 'Repairing', NULL, NULL, NULL),
(4, '104', 15, 30, 'Repairing', NULL, NULL, NULL),
(5, '105', 50, 60, 'Active', NULL, NULL, NULL),
(6, '201', 4, 8, 'Active', NULL, '2021-12-07 15:19:19', '2021-12-07 15:19:19'),
(7, '202', 8, 15, 'Active', NULL, NULL, NULL),
(8, '203', 12, 20, 'Active', NULL, NULL, NULL),
(9, '204', 20, 40, 'Active', NULL, NULL, NULL),
(10, '205', 100, 150, 'Active', NULL, NULL, NULL),
(11, '301', 4, 8, 'Repairing', NULL, NULL, NULL),
(12, '302', 8, 15, 'Active', NULL, NULL, NULL),
(13, '303', 12, 20, 'Active', NULL, NULL, NULL),
(14, '304', 20, 40, 'Active', NULL, NULL, NULL),
(15, '305', 50, 100, 'Active', NULL, NULL, NULL),
(16, '401', 10, 20, 'Repairing', NULL, NULL, NULL),
(17, '402', 15, 30, 'Active', NULL, NULL, NULL),
(18, '403', 20, 40, 'Active', NULL, NULL, NULL),
(19, '404', 80, 100, 'Active', NULL, NULL, NULL),
(20, '405', 40, 80, 'Active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `isAdmin`, `date_of_birth`, `phone`, `company_id`, `gender`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Ngọc Ánh', 'ngocanhpham197@gmail.com', 0, '2001-07-19', '0859662379', 2, 'Khác', NULL, '$2y$10$Vu1F8myC3nFC60TIYf3WOuU2cMNRnOQzvKcktUzMwAOK/zz3E0Dgu', 'a1i4dnd8KGZWiiHbWpYN8P3EZCUyn9rC0RBgWIXsgjCVdk3DwBNfkGm3eJQ7', '2021-11-13 04:04:22', '2021-12-07 19:49:37'),
(2, 'Trần Kiều Trang', 'anhpnFX12745@funix.edu.vn', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$l0jc.CBFA/vfhggoGwzbeOwWiHFcofPcJtV7/7XKKJdYil/rpdTrW', NULL, '2021-11-22 02:34:22', '2021-11-22 02:34:22'),
(3, 'Bùi Cao Chinh', 'chinhngungok@gmail.com', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$GJUjakxKdRHB3StOXohzXur7KNxOGWhrj1nhZ3zWSLxUJWK7z24I.', NULL, '2021-11-22 09:31:56', '2021-11-22 09:31:56'),
(4, 'Mai Tân Tân', 'maiteoteo@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$AAtgAxl62E7Q/nDW20JKBuLyvAOqNSAahAp4bIkstpOZ1zcpp/65C', NULL, '2021-11-22 09:35:35', '2021-11-22 09:35:35'),
(5, 'Mai Thành Vũ', 'thanhvu3011@gmail.com', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$UXCK17mXZBKKsU4yjWe5juWp/Ic.nlT2tUSlYnDV3TUNsC4E4rtTG', NULL, '2021-11-22 09:37:32', '2021-11-22 09:37:32'),
(6, 'Đỗ Thị Hồng Gấm', 'gamdo@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$sx/QdCOIJ6fcPF7chtrVcu7vMHpm3ngd6qI/lXmbqr2lbII42lcd6', NULL, '2021-11-22 09:40:07', '2021-11-22 09:40:07'),
(7, 'Lương Thành Công', 'luongthanhcong@gmail.com', 0, '2001-09-27', '0234779948', 6, 'Nam', NULL, '$2y$10$SugX1Y3dR7R3HTfQY6hq2O6h48dRbtdxaF161sxo8pdOjLaTBCVOy', NULL, '2021-11-22 10:07:58', '2021-11-22 11:33:31'),
(8, 'Admin', 'admin@kath.vn', 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$NVQihscQ0.k7h5kvO6xmDOwxEwgkOQpGupNO1phrbnEs2fIYbms..', 'l3SAcKyhG7Oy70decEb4jn6AyXWbifNvjV7GzIYR3Sbvcx35aoH1alveOHNi', '2021-12-03 02:40:02', '2021-12-03 02:40:02'),
(14, 'Bùi Cao Chinh', 'chinhbc0811@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$yuIw9136TP1M.VW384rgMOr.y9EF0Svo6vTuhW5YDLN8i19rbhgQa', NULL, '2021-12-06 20:02:52', '2021-12-06 20:02:52'),
(15, 'Kiều Văn Tuyên', 'tuyenkieuvan@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$144jtatWAlGSBAiDqyCvrOtWIseGNni69Qlx1Icv5nTaJUXCfPaYC', NULL, '2021-12-06 20:56:29', '2021-12-06 20:56:29'),
(16, 'Trần Hồng Hạnh', 'hanhtran@gmail.com', 0, NULL, NULL, 7, NULL, NULL, '$2y$10$AiGrYsp4r5pqFNPd5GqMie/AM6Xv9ufhvEXIhgq0IK6XM6uLphO0m', NULL, '2021-12-07 12:51:01', '2021-12-07 12:51:01'),
(17, 'Đào Thu Hà', 'hadao96@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$Zd4pCDQfSObzL6ZSG4KGfOjiRbKK28073ZNX7hdC880lKluZq4pB6', NULL, '2021-12-07 12:51:57', '2021-12-07 12:51:57'),
(18, 'Cao Nguyên Minh', 'minhcaonguyen@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$ohHuyfm0LPbn.vD8gmbW9.WzxXxi4lXRYI6X59h2pVXGPOOgV3Jjq', NULL, '2021-12-07 12:53:21', '2021-12-07 12:53:21'),
(19, 'Phạm Thị Mai Phương', 'phuongpham@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$ZWHYfnB..XIBecOwR6g.ru6Yx9RfidVyp9TNv0577Iu.NHQOtBoIG', NULL, '2021-12-07 12:54:07', '2021-12-07 12:54:07'),
(20, 'Phạm Khánh Linh', 'linhpham62@vnu.edu.vn', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$R5tR/UnepU/U7I3m8joLXOxHeTEMSiBZu2V3ZuBNBAaSkoXpJ5xsm', NULL, '2021-12-07 12:55:31', '2021-12-07 12:55:31'),
(21, 'John Hopkins', '19021219@vnu.edu.vn', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$Wmqnm6L7Pn4KrcDZZONnB.WVFcn83aGs/rJk3gzBIybuPMcroS8eq', NULL, '2021-12-07 12:56:21', '2021-12-07 12:56:21'),
(23, 'Nguyễn Công Trí', 'tringuyen@vnu.edu.vn', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$M1.X7dRGd7h7de4DqjQWb.99hlf6Io.7nHsdjkreRjs.p/UIfWFEy', NULL, '2021-12-07 12:59:21', '2021-12-07 12:59:21'),
(24, 'Cao Thanh Thảo', 'thanhthao@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$wC9TuTIAEcprMMPxNwSQOOX4DpY2IxI3Oj7kbTubIbQNtMHW6pDZy', NULL, '2021-12-07 13:00:24', '2021-12-07 13:00:24'),
(25, 'Đặng Tiến Khánh', 'penzz1407@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$xdE0ZiV4jNyYv39.qqOXJeO42Ev21KYsemH7W4d3/JmAJB/csE8uO', NULL, '2021-12-07 13:01:05', '2021-12-07 13:01:05'),
(26, 'Đặng Minh Hiếu', 'hieudang@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$IdSHSabVRXWbl9eBBkL1I.QGF.vohlgICwWv0/yf4MIePfjElb6RS', NULL, '2021-12-07 13:01:40', '2021-12-07 13:01:40'),
(27, 'Trịnh Thu Trang', 'trangtrinh@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$2kaW7VFS03KauywX7ax66eCug/MNN0uFrM9UAbVNqRNI2fRDaGNii', NULL, '2021-12-07 13:03:39', '2021-12-07 13:03:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_event` (`room_id`),
  ADD KEY `fk_host` (`user_id`);

--
-- Chỉ mục cho bảng `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`event_id`,`user_id`),
  ADD KEY `fk_user_event` (`user_id`);

--
-- Chỉ mục cho bảng `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `facility_room`
--
ALTER TABLE `facility_room`
  ADD PRIMARY KEY (`room_id`,`facility_id`),
  ADD KEY `fk_facility_room` (`facility_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`event_id`,`user_id`),
  ADD KEY `fk_user_rate` (`user_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_user_company` (`company_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_host` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_room_event` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `fk_event_user` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_event` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `facility_room`
--
ALTER TABLE `facility_room`
  ADD CONSTRAINT `fk_facility_room` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_room_facility` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `fk_user_rate` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
