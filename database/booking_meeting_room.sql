-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2021 lúc 12:07 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

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
(1, 'Công ty TNHH MTV Tân Trường Phát', NULL, NULL),
(2, 'Công ty giải pháp phần mềm An An', NULL, NULL),
(5, 'công ty abc', '2021-11-22 10:03:46', '2021-11-22 10:03:46'),
(6, 'công ty 123', '2021-11-22 10:07:58', '2021-11-22 10:07:58'),
(7, 'ADC Book', '2021-12-04 14:38:44', '2021-12-04 14:38:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` datetime DEFAULT NULL,
  `ending_time` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `room_id`, `name`, `starting_time`, `ending_time`, `description`, `note`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Test 1', '2021-12-04 03:24:00', '2021-12-04 20:24:00', NULL, NULL, NULL, '2021-12-03 13:24:20', '2021-12-03 13:24:20', NULL),
(2, 1, 'test 2', '2021-12-04 03:28:00', '2021-12-03 20:34:00', NULL, NULL, NULL, '2021-12-03 13:29:08', '2021-12-03 13:29:08', NULL),
(3, 1, 'nnnnn', '2021-12-18 03:56:00', '2021-12-22 20:56:00', NULL, NULL, NULL, '2021-12-03 13:56:20', '2021-12-03 13:56:20', NULL),
(4, 1, 'Test 10', '2021-12-23 17:48:00', '2021-12-24 10:48:00', NULL, NULL, NULL, '2021-12-04 03:48:28', '2021-12-04 03:48:28', NULL),
(5, 1, 'Check datetime', '2021-12-30 18:49:00', '2021-12-31 11:49:00', NULL, NULL, NULL, '2021-12-04 04:49:16', '2021-12-04 04:49:16', NULL);

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
(2, 4),
(3, 6),
(4, 1),
(4, 4),
(4, 6),
(5, 1);

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
(1, 'Điều hòa', NULL, NULL),
(2, 'Tivi', NULL, NULL),
(3, 'Máy chiếu', NULL, NULL),
(4, 'Loa', NULL, NULL),
(5, 'Micro', NULL, NULL),
(6, 'Máy tính để bàn', NULL, NULL),
(7, 'Bảng từ', NULL, NULL);

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
(1, 5),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 5),
(3, 7);

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
(4, 1, 'aaaaaaaaa', NULL, NULL),
(5, 1, 'aaaaaaaaa', NULL, NULL);

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
(1, '101', 30, 50, 'Active', NULL, NULL, NULL),
(2, '102', 35, 40, 'Repairing', NULL, NULL, NULL),
(3, '103', 12, 30, 'Active', NULL, NULL, NULL);

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
(1, 'Phạm Ngọc Ánh', 'ngocanhpham197@gmail.com', 0, '2021-11-30', '0859662379', 2, 'Khác', NULL, '$2y$10$GdayqfI0m.87/TTBFG5WBeN1QTt/yueslHDuWd5ql8JKfgGnnQtUq', 'kg6GUzm1PReJUiXenUExDadwpZLLi7UmMQReOvrQy1oaekPg8f32cbq1Fl8o', '2021-11-13 04:04:22', '2021-12-01 12:56:23'),
(2, 'Ánh Phạm', 'anhpnFX12745@funix.edu.vn', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$l0jc.CBFA/vfhggoGwzbeOwWiHFcofPcJtV7/7XKKJdYil/rpdTrW', NULL, '2021-11-22 02:34:22', '2021-11-22 02:34:22'),
(3, 'Bùi Cao Chinh', 'chinhngungok@gmail.com', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$GJUjakxKdRHB3StOXohzXur7KNxOGWhrj1nhZ3zWSLxUJWK7z24I.', NULL, '2021-11-22 09:31:56', '2021-11-22 09:31:56'),
(4, 'Mai Tân Tân', 'maiteoteo@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$AAtgAxl62E7Q/nDW20JKBuLyvAOqNSAahAp4bIkstpOZ1zcpp/65C', NULL, '2021-11-22 09:35:35', '2021-11-22 09:35:35'),
(5, 'Mai Thành Vũ', 'vuchoancutcho@gmail.com', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$UXCK17mXZBKKsU4yjWe5juWp/Ic.nlT2tUSlYnDV3TUNsC4E4rtTG', NULL, '2021-11-22 09:37:32', '2021-11-22 09:37:32'),
(6, 'Đỗ Thị Hồng Gấm', 'gamdo@gmail.com', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$sx/QdCOIJ6fcPF7chtrVcu7vMHpm3ngd6qI/lXmbqr2lbII42lcd6', NULL, '2021-11-22 09:40:07', '2021-11-22 09:40:07'),
(7, 'Lương Thành Công', 'congcut@gmail.com', 0, '2001-09-27', '1111111111', 6, 'Nam', NULL, '$2y$10$SugX1Y3dR7R3HTfQY6hq2O6h48dRbtdxaF161sxo8pdOjLaTBCVOy', NULL, '2021-11-22 10:07:58', '2021-11-22 11:33:31'),
(8, 'Admin', 'admin@kath.vn', 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$NVQihscQ0.k7h5kvO6xmDOwxEwgkOQpGupNO1phrbnEs2fIYbms..', 'PEp0f6lClLkvAwApJG3ojm1W0ac2NwgB0YwISc7puaebWIdjE41Z402QuuyP', '2021-12-03 02:40:02', '2021-12-03 02:40:02'),
(9, 'Not admin', 'notadmin@gmail.com', 0, NULL, NULL, 7, NULL, NULL, '$2y$10$4w.KHDivXPKT8MSDAtWWwuI1Ty2djwteG7PwLmafU8OCR.IkEFA0e', NULL, '2021-12-04 14:38:44', '2021-12-04 14:38:44'),
(10, 'adsh', 'jvnwe@vqef', 0, NULL, NULL, 1, NULL, NULL, '$2y$10$AiK4ocLw6qOFWXWMZv0DaepA7DWH404oVGZNCySbD/5hYT3sa0z5e', NULL, '2021-12-04 14:42:55', '2021-12-04 14:42:55'),
(11, 'qg3t32t', 'afqw@webew', 0, NULL, NULL, 6, NULL, NULL, '$2y$10$vXCSIA9OWb9OWSFJrEL2gOCzlZ8LimQ/HZfnDhZ7bB.1oBs93o.JK', NULL, '2021-12-04 14:52:42', '2021-12-04 14:52:42'),
(12, 'qwgg3', 'gefr@geg', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$6einpz/MN6sUgf1d9negpe7DnmqZ4mVZVZMcVBMFq.dUwNWhnlHMW', NULL, '2021-12-04 14:57:07', '2021-12-04 14:57:07'),
(13, 'nhhfuw', 'nqhg@navc', 0, NULL, NULL, 2, NULL, NULL, '$2y$10$FwaWlUZevukMEoQGX/pCf.pIU8..x9z/lwur78pJp4UOMWtygNR8O', NULL, '2021-12-04 16:05:17', '2021-12-04 16:05:17');

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
  ADD KEY `fk_room_event` (`room_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_room_event` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `fk_event_user` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_user_event` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `facility_room`
--
ALTER TABLE `facility_room`
  ADD CONSTRAINT `fk_facility_room` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_room_facility` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_rate` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
