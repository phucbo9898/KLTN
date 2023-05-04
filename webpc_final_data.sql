-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 04, 2023 lúc 03:19 PM
-- Phiên bản máy phục vụ: 5.7.39
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webpc_final`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `type`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bộ nhớ Ram', 'bo-nho-ram', 'select', '2GB; 4GB; 6GB; 8GB; 16GB; 32GB', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(2, 'Độ phân giải', 'do-phan-giai', 'text', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(3, 'Kích thước', 'kick-thuoc', 'text', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(4, 'Socket', 'socket', 'text', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(5, 'Khe cắm ram', 'khe-cam-ram', 'text', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(6, 'Nhà sản xuất', 'nha-san-xuat', 'text', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(7, 'Tốc độ xử lý', 'toc-do-xu-ly', 'text', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(8, 'Số luồng', 'so-luong', 'number', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(9, 'Số nhân', 'so-nhan', 'number', '', '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'AMD Ryzen™ Processors', '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(2, 7, '3.5 GHz Upto 4.4GHz', '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(3, 8, '12', '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(4, 9, '6', '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(5, 7, '3.8 GHz Upto 4.7GHz', '2023-05-04 07:49:40', '2023-05-04 07:49:40', NULL),
(6, 8, '16', '2023-05-04 07:49:40', '2023-05-04 07:49:40', NULL),
(7, 9, '8', '2023-05-04 07:49:41', '2023-05-04 07:49:41', NULL),
(8, 7, '3.6GHz turbo up to 4.1GHz', '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(9, 8, '6', '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(10, 7, '3.5GHz', '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(11, 8, '4', '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(12, 9, '2', '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(13, 7, '4.7 GHz Upto 5.6GHz', '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(14, 8, '24', '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(15, 9, '12', '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(16, 6, 'Intel', '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(17, 7, '3.4GHz', '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(18, 8, '2', '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(19, 7, '3.3GHz turbo up to 4.3GHz', '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(20, 8, '8', '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(21, 9, '4', '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(22, 7, 'Upto 4.4Ghz', '2023-05-04 08:00:09', '2023-05-04 08:00:09', NULL),
(23, 7, '3.0GHz turbo up to 5.8Ghz', '2023-05-04 08:01:20', '2023-05-04 08:01:20', NULL),
(24, 8, '32', '2023-05-04 08:01:20', '2023-05-04 08:01:20', NULL),
(25, 9, '24', '2023-05-04 08:01:21', '2023-05-04 08:01:21', NULL),
(26, 7, '4.1GHz', '2023-05-04 08:02:56', '2023-05-04 08:02:56', NULL),
(27, 7, '3.3GHz turbo up to 5.0GHz', '2023-05-04 08:04:33', '2023-05-04 08:04:33', NULL),
(28, 7, '2.6GHz turbo up to 4.4Ghz', '2023-05-04 08:05:49', '2023-05-04 08:05:49', NULL),
(29, 7, '(2.5GHz turbo up to 4.9Ghz', '2023-05-04 08:06:58', '2023-05-04 08:06:58', NULL),
(30, 7, '3.4GHz turbo up to 5.4Ghz', '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(31, 9, '16', '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(32, 7, '2.9GHz turbo up to 4.3Ghz', '2023-05-04 08:09:41', '2023-05-04 08:09:41', NULL),
(33, 7, '4.0GHz turbo up to 5.1GHz', '2023-05-04 08:10:42', '2023-05-04 08:10:42', NULL),
(34, 7, '3.6GHz turbo up to 4.0GHz', '2023-05-04 08:11:51', '2023-05-04 08:11:51', NULL),
(35, 7, '3.6 GHz Upto 4.2GHz', '2023-05-04 08:12:40', '2023-05-04 08:12:40', NULL),
(36, 4, '1200', '2023-05-04 08:15:10', '2023-05-04 08:15:10', NULL),
(37, 5, '4', '2023-05-04 08:15:10', '2023-05-04 08:15:10', NULL),
(38, 4, '2066', '2023-05-04 08:17:26', '2023-05-04 08:17:26', NULL),
(39, 5, '8', '2023-05-04 08:17:26', '2023-05-04 08:17:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CPU - Bộ vi xử lý', 'cpu-bo-vi-xu-ly', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(2, 'VGA - Card màn hình', 'vga-card-man-hinh', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(3, 'Mainbroad - Bo mạch chủ', 'mainbroad-bo-mach-chu', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(4, 'RAM - Bộ nhớ', 'ram-bo-nho', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(5, 'PSU - Nguồn máy tính', 'psu-nguon-may-tinh', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(6, 'CPU - Bộ vi xử lý', 'cpu-bo-vi-xu-ly', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(7, 'Tai nghe', 'tai-nghe', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(8, 'Chuột - Bàn phím', 'chuot-ban-phim', 'active', NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_attribute`
--

CREATE TABLE `category_attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_attribute`
--

INSERT INTO `category_attribute` (`id`, `category_id`, `attribute_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 6, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(2, 1, 7, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(3, 1, 8, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(4, 1, 9, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(5, 2, 1, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(6, 2, 3, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(7, 2, 6, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(8, 3, 4, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL),
(9, 3, 5, '2023-05-04 07:44:44', '2023-05-04 07:44:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` int(11) NOT NULL,
  `expire_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `category_id`, `code`, `sale`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'SALE5', 5, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(2, 2, 'SALE10', 10, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(3, 3, 'SALE15', 15, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(4, 4, 'SALE20', 20, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(5, 5, 'SALE25', 25, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(6, 6, 'SALE30', 30, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(7, 7, 'SALE35', 35, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(8, 8, 'SALE40', 40, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(9, 8, 'SALE50', 50, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(10, 1, 'SALE90', 90, '2023-06-03 07:44:44', '2023-05-04 07:44:44', '2023-05-04 07:44:44');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_product`
--

CREATE TABLE `favorite_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2018_12_23_120000_create_shoppingcart_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_11_19_092646_create_database', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `sale` int(11) NOT NULL,
  `payment_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sale` tinyint(4) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_pay` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `number_of_reviewers` int(11) DEFAULT NULL,
  `total_star` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `name_full`, `slug`, `category_id`, `price`, `author_id`, `sale`, `status`, `hot`, `content`, `image`, `qty_pay`, `quantity`, `number_of_reviewers`, `total_star`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CPU AMD Ryzen 5 5600', 'CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4)', 'cpu-amd-ryzen-5-5600', 1, 3999000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4)</h2>\r\n\r\n<p><strong>CPU AMD Ryzen 5 5600&nbsp;</strong>l&agrave; 1 trong những CPU mới nhất của Series Ryzen 5000 của AMD. CPU vẫn sử dụng Socket AM4 v&agrave; c&oacute; 6 nh&acirc;n 12 luồng c&ugrave;ng xung nhịp tối đa 4.4Ghz.&nbsp;</p>\r\n\r\n<h3>Kiến tr&uacute;c Zen 3</h3>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4) (ID: 65333)\" src=\"https://hanoicomputercdn.com/media/lib/25-04-2022/zen-3-amd.jpg\" width=\"100%\" /></p>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-bo-vi-xu-ly\" rel=\"noopener\" target=\"_blank\">CPU</a>&nbsp;Ryzen 5000 Series sở hữu kiến tr&uacute;c Zen 3 với nhiều thay đổi mang lại hiệu năng rất cao so với thế hệ cũ. Mỗi CCX giờ đ&acirc;y sẽ c&oacute; 8 nh&acirc;n/CCX, thay v&igrave; 4 nh&acirc;n/CCX như Zen 2. C&aacute;c CCX c&oacute; thể chạy tr&ecirc;n chế độ Single Thread hoặc Two Thread SMT, cho tối đa 16 luồng/CCX. Từ đ&oacute; sẽ cho ra tối đa 16 nh&acirc;n/32 luồng. Mỗi CCD giờ đ&acirc;y sẽ chỉ chứa 1 CCX, thay v&igrave; 2 như thế hệ tiền nhiệm.</p>\r\n\r\n<p>Mỗi nh&acirc;n Zen 3 tr&ecirc;n Ryzen 5000 sẽ c&oacute; 512kB Cache L2. Từ đ&oacute; c&oacute; 4MB cache L2/CCD v&agrave; nếu CPU c&oacute; 2 CCD th&igrave; tổng lượng cache L2 sẽ l&agrave; 8MB. Đi c&ugrave;ng với đ&oacute;, mỗi CCD sẽ c&oacute; th&ecirc;m 32MB cache L3 v&agrave; sẽ hợp nhất lại th&agrave;nh 1, thay v&igrave; chia l&agrave;m đ&ocirc;i như thế hệ trước.&nbsp;</p>\r\n\r\n<p>Tất cả những cải tiến đ&oacute; cho ph&eacute;p:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Xung boost cao hơn</li>\r\n	<li>IPC tăng l&ecirc;n tới 19%</li>\r\n	<li>Giảm thiểu đ&aacute;ng kể độ trễ bộ nhớ</li>\r\n	<li>Tăng tốc giao tiếp giữa nh&acirc;n v&agrave; cache</li>\r\n</ul>', 'upload/product/2023-05-04_65333_cpu_amryzen_5_5600.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(2, 'CPU AMD Ryzen 7 5800X', 'CPU AMD Ryzen 7 5800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)', 'cpu-amd-ryzen-7-5800x', 1, 6899000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD&nbsp;Ryzen 7 5800X Ch&iacute;nh H&atilde;ng | Sức Mạnh Gaming Tuyệt Đối</h2>\r\n\r\n<p><strong><a href=\"https://www.hacom.vn/cpu-amd-ryzen-7-5800x\">CPU AMD Ryzen 7 5800X</a></strong>&nbsp;&nbsp;l&agrave; 1 trong những CPU đầu bảng Series Ryzen 5000 của AMD. CPU vẫn sử dụng Socket AM4 v&agrave; c&oacute; 8 nh&acirc;n 16 luồng c&ugrave;ng xung nhịp tối đa 4.7Ghz.&nbsp;</p>\r\n\r\n<h3><img alt=\"CPU AMD Ryzen 7 5800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)\" src=\"https://hanoicomputercdn.com/media/lib/04-08-2022/cpu-amd-ryzen-7-5800x-mota2.jpg\" width=\"100%\" /><br />\r\nKiến tr&uacute;c Zen 3</h3>\r\n\r\n<p>Ryzen 5000 Series sở hữu kiến tr&uacute;c Zen 3 với nhiều thay đổi mang lại hiệu năng rất cao so với thế hệ cũ. Mỗi CCX giờ đ&acirc;y sẽ c&oacute; 8 nh&acirc;n/CCX, thay v&igrave; 4 nh&acirc;n/CCX như Zen 2. C&aacute;c CCX c&oacute; thể chạy tr&ecirc;n chế độ Single Thread hoặc Two Thread SMT, cho tối đa 16 luồng/CCX. Từ đ&oacute; sẽ cho ra tối đa 16 nh&acirc;n/32 luồng. Mỗi CCD giờ đ&acirc;y sẽ chỉ chứa 1 CCX, thay v&igrave; 2 như thế hệ tiền nhiệm.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 7 5800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)\" src=\"https://hanoicomputercdn.com/media/lib/04-08-2022/cpu-amd-ryzen-7-5800x-mota3.jpg\" width=\"100%\" /></p>\r\n\r\n<p><br />\r\nMỗi nh&acirc;n Zen 3 tr&ecirc;n Ryzen 5000 sẽ c&oacute; 512kB Cache L2. Từ đ&oacute; c&oacute; 4MB cache L2/CCD v&agrave; nếu CPU c&oacute; 2 CCD th&igrave; tổng lượng cache L2 sẽ l&agrave; 8MB. Đi c&ugrave;ng với đ&oacute;, mỗi CCD sẽ c&oacute; th&ecirc;m 32MB cache L3 v&agrave; sẽ hợp nhất lại th&agrave;nh 1, thay v&igrave; chia l&agrave;m đ&ocirc;i như thế hệ trước.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 7 5800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)\" src=\"https://hanoicomputercdn.com/media/lib/04-08-2022/cpu-amd-ryzen-7-5800x-mota1.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Tất cả những cải tiến đ&oacute; cho ph&eacute;p:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Xung boost cao hơn</li>\r\n	<li>IPC tăng l&ecirc;n tới 19%</li>\r\n	<li>Giảm thiểu đ&aacute;ng kể độ trễ bộ nhớ</li>\r\n	<li>Tăng tốc giao tiếp giữa nh&acirc;n v&agrave; cache</li>\r\n	<li>Sức mạnh của Ryzen 7 - 5800X</li>\r\n</ul>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 7 5800X\" src=\"https://hacom.vn/media/lib/05-11-2020/cpuamdryzen75800x.png\" width=\"100%\" /></p>\r\n\r\n<h3>AMD Ryzen 7 5800X: Thay đổi để vươn l&ecirc;n</h3>\r\n\r\n<p>Những thay đổi cơ bản m&agrave; người d&ugrave;ng c&oacute; thể thấy được ở sản phẩm n&agrave;y ch&iacute;nh l&agrave; xung nhịp đ&atilde; được cải thiện l&ecirc;n cụ thể l&agrave; 3.8 GHz v&agrave; turbo l&ecirc;n 4.7 GHz, c&ograve;n lại ch&uacute;ng ta vẫn sẽ c&oacute; 8 nh&acirc;n v&agrave; 16 luồng cũng như hỗ trợ Socket AM4 tương th&iacute;ch với bo mạch chủ cũ như X570, B550 v&agrave; sắp tới c&oacute; thể l&agrave; B450 nữa. Sự gần gũi trong việc n&acirc;ng cấp kh&ocirc;ng cần thay bo mạch chủ ấy khiến AMD Ryzen được sự thiện cảm với người d&ugrave;ng.</p>\r\n\r\n<p>Nhưng đ&oacute; chưa phải thay đổi nổi bật m&agrave; chỉ khi trải nghiệm ch&uacute;ng ta mới cảm nhận được, đ&oacute; l&agrave; việc giữ xung nhịp all core tốt hơn, xung nhịp đơn nh&acirc;n đ&atilde; được cải thiện đ&aacute;ng kể gi&uacute;p trải nghiệm l&agrave;m việc tr&ecirc;n c&aacute;c phần mềm như Adobe, 3D Max,... được cải thiện đ&aacute;ng kể. Chưa hết, sự thống trị trong ph&acirc;n kh&uacute;c gaming của Intel cũng đ&atilde; bị lung lay khi c&aacute;c kết quả cho thấy CPU AMD đều nh&igrave;nh hơn Intel. Một sự cải tiến c&oacute; thể n&oacute;i l&agrave; ho&agrave;n hảo vốn trước kia l&agrave; thứ khiến người d&ugrave;ng đắn đo khi chọn mua CPU Ryzen của AMD.</p>\r\n\r\n<p>AMD Ryzen 7 5800X ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo kh&ocirc;ng chỉ l&agrave;m việc m&agrave; c&ograve;n giải tr&iacute;, một bước tiến cho đội đỏ v&agrave; cũng l&agrave; sản phẩm đ&aacute;ng để người d&ugrave;ng quan t&acirc;m, sở hữu.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 7 5800X\" src=\"https://hanoicomputercdn.com/media/product/56283_cpu_amd_ryzen_7_5800x_44.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>AMD StoreMI</h3>\r\n\r\n<p>C&ocirc;ng nghệ AMD StoreMI đ&atilde; được x&acirc;y dựng lại từ đầu với một thuật to&aacute;n mới gi&uacute;p sử dụng an to&agrave;n v&agrave; đơn giản. Giờ đ&acirc;y, cấu h&igrave;nh StoreMI chỉ đơn giản l&agrave; phản chiếu c&aacute;c tệp được sử dụng nhiều nhất của bạn v&agrave;o ổ SSD m&agrave; bạn chọn, giữ nguy&ecirc;n bản sao gốc. Phần mềm chuyển hướng liền mạch Windows&reg; v&agrave; c&aacute;c ứng dụng của bạn để sử dụng bản sao được phản chiếu nhanh hơn. Việc x&oacute;a hoặc tắt bộ nhớ cache SSD sẽ để lại tất cả c&aacute;c tệp của bạn tr&ecirc;n ổ cứng, ngay tại nơi ch&uacute;ng bắt đầu.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 7 5800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)\" src=\"https://hanoicomputercdn.com/media/lib/04-08-2022/cpu-amd-ryzen-7-5800x-ami.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Nếu bạn c&oacute; bo mạch chủ AMD X570, B550, 400 Series, X399 hoặc TRX40, bạn c&oacute; thể tải xuống AMD StoreMI miễn ph&iacute;.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 7 5800X\" src=\"https://hanoicomputercdn.com/media/product/56283_cpu_amd_ryzen_7_5800x_33.jpg\" width=\"100%\" /></p>', 'upload/product/2023-05-04_amd_5800x.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:49:40', '2023-05-04 07:49:40', NULL),
(3, 'CPU AMD Ryzen 5 3500', 'CPU AMD Ryzen 5 3500 (3.6GHz turbo up to 4.1GHz, 6 nhân 6 luồng, 16MB Cache, 65W) - Socket AMD AM4', 'cpu-amd-ryzen-5-3500', 1, 3299000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 5 3500 Tối Ưu Chi Ph&iacute; Cho Bộ M&aacute;y Chơi Game</h2>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-amd-ryzen-5-3500-3-6ghz-4-1ghz-6-nhan-6-luong-16mb-cache-65w-socket-am4\">AMD Ryzen 5 3500</a>&nbsp;l&agrave; CPU Ryzen thế hệ thứ 3 dựa tr&ecirc;n chế tạo FinFET 7nm. So với đối t&aacute;c của Intel, CPU n&agrave;y sẽ hiệu quả hơn (ti&ecirc;u thụ &iacute;t năng lượng hơn), điều n&agrave;y b&ugrave; lại tạo ra &iacute;t nhiệt hơn.</p>\r\n\r\n<p>Kh&ocirc;ng giống như Ryzen 5 3600, Ryzen 5 3500 kh&ocirc;ng hỗ trợ si&ecirc;u ph&acirc;n luồng, v&igrave; vậy, bộ xử l&yacute; n&agrave;y cung cấp tổng cộng s&aacute;u l&otilde;i v&agrave; s&aacute;u luồng. N&oacute; cung cấp 19 MB bộ nhớ cache hệ thống, cao hơn hầu hết c&aacute;c CPU ở mức gi&aacute; n&agrave;y.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 5 3500\" src=\"https://hanoicomputercdn.com/media/product/49430_cpu_amd_ryzen_5_3500_3_6ghz_4_1ghz_6_nhan_6_luong_16mb_cache_65w_socket_am4_222.jpg\" width=\"100%\" /></p>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-bo-vi-xu-ly\" rel=\"noopener\" target=\"_blank\">CPU</a>&nbsp;c&oacute; thể được sử dụng tr&ecirc;n bo mạch chủ với Ổ cắm AM4 v&agrave; n&oacute; hỗ trợ bộ nhớ k&ecirc;nh đ&ocirc;i, v&igrave; vậy h&atilde;y đảm bảo rằng bạn c&oacute; hai thanh RAM đi c&ugrave;ng với bản dựng PC để cải thiện hiệu suất, đặc biệt nếu bạn xử l&yacute; phần mềm chuy&ecirc;n nghiệp. Tr&ecirc;n giấy tờ, AMD Ryzen 5 3500 thế hệ thứ 3 c&oacute; vẻ như l&agrave; một CPU tuyệt vời, nhờ tốc độ xung nhịp cơ bản cao hơn một ch&uacute;t, điều n&agrave;y khiến n&oacute; trở th&agrave;nh sự lựa chọn tuyệt vời cho một PC chơi game hạng trung.</p>\r\n\r\n<p>Bỏ qua kh&iacute;a cạnh chung của AMD Ryzen 5 3500 thế hệ thứ 3, ch&uacute;ng t&ocirc;i đ&atilde; chạy một v&agrave;i điểm chuẩn để kiểm tra hiệu năng v&agrave; so s&aacute;nh n&oacute; với những người c&ugrave;ng thời. Xin lưu &yacute; rằng, c&aacute;c kết quả n&agrave;y l&agrave; d&agrave;nh ri&ecirc;ng cho thiết bị v&agrave; điểm số sẽ thay đổi t&ugrave;y theo thiết bị, t&ugrave;y thuộc v&agrave;o c&aacute;c th&agrave;nh phần kh&aacute;c.</p>\r\n\r\n<h3>Geekbench 5 PC Benchmark&nbsp;cho AMD Ryzen 5 3500</h3>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 5 3500\" src=\"https://hanoicomputercdn.com/media/product/49430_cpu_amd_ryzen_5_3500_3_6ghz_4_1ghz_6_nhan_6_luong_16mb_cache_65w_socket_am4_111.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Cinebench R20 Benchmark cho AMD Ryzen 5 3500</h3>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 5 3500\" height=\"337\" src=\"https://hanoicomputercdn.com/media/lib/49430_CPUAMDRyzen535001.jpg\" width=\"600\" /></p>', 'upload/product/2023-05-04_amd_ryzen_5_3500.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(4, 'CPU AMD Athlon 3000G', 'CPU AMD Athlon 3000G (3.5GHz, 2 nhân 4 luồng , 5MB Cache, 35W) - Socket AMD AM4', 'cpu-amd-athlon-3000g', 1, 1399000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD Athlon 3000G giải ph&aacute;p chơi game gi&aacute; rẻ, hiệu năng cao</h2>\r\n\r\n<p><a href=\"https://hacom.vn/cpu-amd-athlon-3300g\"><strong>CPU AMD Athlon 3000G</strong></a>&nbsp;l&agrave; d&ograve;ng CPU gi&aacute; rẻ phục vụ cho nhu cầu cơ bản. Đ&acirc;y l&agrave; d&ograve;ng vi xử l&yacute; b&igrave;nh d&acirc;n được t&iacute;ch hợp sẵn nh&acirc;n đồ họa Radeon c&oacute; thể chơi được nhiều tựa game online ở mức c&agrave;i đặt cơ bản.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU AMD Athlon 3000G\" src=\"https://hanoicomputercdn.com/media/product/53258_cpu_amd_athlon_3300g_1111.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Đủ sức mạnh cho người d&ugrave;ng phổ th&ocirc;ng</h3>\r\n\r\n<p>Với kiến tr&uacute;c mới v&agrave; 2 nh&acirc;n 4 luồng c&ugrave;ng xung nhịp l&ecirc;n đến 3.5Ghz, CPU AMD Athlon kh&ocirc;ng hề yếu. Với người d&ugrave;ng phổ th&ocirc;ng,&nbsp;<a href=\"https://www.hacom.vn/cpu-bo-vi-xu-ly\" rel=\"noopener\" target=\"_blank\">CPU</a>&nbsp;n&agrave;y c&oacute; thể ho&agrave;n th&agrave;nh trơn tru c&aacute;c t&aacute;c vụ văn ph&ograve;ng như Word, Excel,.. hay chỉnh sửa ảnh cơ bản.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU AMD Athlon 3000G\" src=\"https://hanoicomputercdn.com/media/product/53258_cpu_amd_athlon_3000g_2.png\" width=\"100%\" /></p>\r\n\r\n<p>Với nh&acirc;n đồ họa t&iacute;ch hợp Radeon, bạn ho&agrave;n to&agrave;n c&oacute; thể chơi được nhiều tựa game từ online đến offline m&agrave; kh&ocirc;ng cần sự hỗ trợ của card đồ họa rời.&nbsp;</p>', 'upload/product/2023-05-04_cpu_amd_athlon_3000g.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(5, 'CPU AMD Ryzen 9 7900X', 'CPU AMD Ryzen 9 7900X (4.7 GHz Upto 5.6GHz / 76MB / 12 Cores, 24 Threads / 170W / Socket AM5)', 'cpu-amd-ryzen-9-7900x', 1, 12299000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 9 7900X (4.7 GHz Upto 5.6GHz / 76MB / 12 Cores, 24 Threads / 170W / Socket AM5)</h2>\r\n\r\n<h3>Kiến tr&uacute;c Zen 4</h3>\r\n\r\n<p>Zen 4 sử dụng phần lớn thiết kế m&agrave; AMD đưa ra với Zen 3, bao gồm cấu tr&uacute;c li&ecirc;n kết bộ nhớ cache v&agrave; phức hợp t&aacute;m l&otilde;i. Điều đ&oacute; n&oacute;i rằng, đ&atilde; c&oacute; những cải tiến đ&aacute;ng kể trong thiết kế, cho ph&eacute;p tăng xung nhịp cao hơn, l&ecirc;n đến 5,7 GHz tr&ecirc;n 7950X, bộ nhớ đệm L2 lớn hơn v&agrave; cuối c&ugrave;ng l&agrave; đồ họa t&iacute;ch hợp từ họ RDNA2.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 9 7900X \" src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/zen4.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Chuyển sang Zen 4, thiết kế CPU AMD Ryzen 9 7900X đ&atilde; được tinh chỉnh để th&ecirc;m bộ nhớ đệm Op lớn hơn, IRQ v&agrave; thanh ghi FP lớn hơn. AMD cũng đ&atilde; đưa bộ đệm s&acirc;u hơn v&agrave;o thiết kế v&agrave; bổ sung hỗ trợ AVX512.</p>\r\n\r\n<p>Zen 4 bao gồm cải tiến dự đo&aacute;n nh&aacute;nh tr&ecirc;n giao diện người d&ugrave;ng với L1 lớn hơn 50% v&agrave; bộ nhớ đệm Op tổng thể lớn hơn 68%.</p>\r\n\r\n<p>Với Zen 4, cuối c&ugrave;ng ch&uacute;ng ta cũng c&oacute; được IOD tốt hơn - một thiết kế 6nm nhỏ hơn nhiều với đồ họa RDNA2, hỗ trợ DDR5 v&agrave; 28 l&agrave;n PCIe 5.0.</p>\r\n\r\n<p>CPU AMD Ryzen 9 7900X sẽ kết hợp nhu cầu của cả người đam m&ecirc; v&agrave; game thủ v&agrave;o một CPU tuyệt vời!</p>\r\n\r\n<h3>N&acirc;ng cấp hiệu năng</h3>\r\n\r\n<p>CPU AMD Ryzen 9 7900X c&oacute; tốc độ cơ bản 4,70 GHz, với tần số tăng 5,60 GHz ấn tượng. Bộ xử l&yacute; đi k&egrave;m với c&aacute;c giới hạn c&ocirc;ng suất 170 W TDP v&agrave; 230 W PPT như 7950X, với &iacute;t l&otilde;i hơn để ph&acirc;n phối năng lượng đ&oacute; cho nhau, c&oacute; nghĩa l&agrave; tần số cư tr&uacute; được tăng cường tốt hơn. AMD r&otilde; r&agrave;ng về nhu cầu &iacute;t nhất phải c&oacute; bộ l&agrave;m m&aacute;t CPU AIO chất lỏng hậu m&atilde;i 240 mm hoặc 280 mm đi k&egrave;m với 7900X; tin tốt l&agrave; Socket AM5 mới tương th&iacute;ch tốt hơn với AM4 để bạn c&oacute; nhiều sự lựa chọn hơn.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 9 7900X \" src=\"https://hanoicomputercdn.com/media/lib/29-11-2022/cpu-amd-ryzen-9-7900x-47-ghz-upto-56ghz-76mb-12-cores-24-threads-170w-socket-am5-mt.jpg\" width=\"100%\" /></p>\r\n\r\n<p>C&oacute; hai t&iacute;nh năng bổ sung quan trọng cho d&ograve;ng Ryzen 7000 đ&atilde; qu&aacute; hạn từ l&acirc;u v&agrave; điều n&agrave;y c&oacute; thể l&agrave;m dịu thỏa thuận cho CPU AMD Ryzen 9 7900X. Đầu ti&ecirc;n, l&agrave; sự bao gồm của đồ họa t&iacute;ch hợp. S&acirc;n chơi với Intel hiện đ&atilde; được san bằng v&agrave; tất cả những ai muốn những con chip n&agrave;y chỉ v&igrave; sức mạnh xử l&yacute; của ch&uacute;ng v&agrave; kh&ocirc;ng cần card đồ họa; sẽ nhận được một iGPU c&oacute; khả năng tương tự như c&aacute;c iGPU m&agrave; Intel đưa v&agrave;o bộ vi xử l&yacute; m&aacute;y t&iacute;nh để b&agrave;n Core i9 của m&igrave;nh.&nbsp;</p>\r\n\r\n<p>T&iacute;nh năng thứ hai sẽ đặc biệt thu h&uacute;t đ&aacute;m đ&ocirc;ng học s&acirc;u AI, đ&oacute; l&agrave; việc bổ sung c&aacute;c tập lệnh AVX-512, VNNI v&agrave; BFLOAT16. Việc triển khai AVX-512 của AMD kh&ocirc;ng đi k&egrave;m với chi ph&iacute; năng lượng bổ sung v&agrave; sẽ kh&ocirc;ng dẫn đến tốc độ xung nhịp thấp hơn để giảm ti&ecirc;u thụ / ti&ecirc;u thụ điện năng khi chạy m&atilde; sử dụng n&oacute;.</p>', 'upload/product/2023-05-04_cpu_amd_ryzen_9_7900.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(6, 'CPU Intel Celeron G6900', 'CPU Intel Celeron G6900 (3.4GHz, 2 nhân 2 luồng, 4MB Cache, 46W) - Socket Intel LGA 1700)', 'cpu-intel-celeron-g6900', 1, 1299000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Celeron G6900 (3.7GHz, 2 nh&acirc;n 2 luồng, 4MB Cache, 46W) - Socket Intel LGA 1700)</h2>\r\n\r\n<p><a href=\"https://hacom.vn/cpu-intel-celeron-g6900-lga-1700\"><strong>CPU Intel Celeron G6900</strong></a>&nbsp;l&agrave; d&ograve;ng CPU phổ th&ocirc;ng cho hệ m&aacute;y văn ph&ograve;ng ho&agrave;n to&agrave;n mới thuộc thế hệ Alder Lake của Intel. Nổi bật nhất l&agrave; hiệu năng đơn nh&acirc;n của thế hệ n&agrave;y đ&atilde; được cải tiến rất mạnh so với thế hệ tiền nhiệm, gi&uacute;p việc xử l&yacute; c&aacute;c t&aacute;c vụ nhanh ch&oacute;ng v&agrave; mượt m&agrave; hơn.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Celeron G6900\" src=\"https://hacom.vn/media/lib/22-02-2022/cpuintelcelerong6900-1.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Intel Celeron thế hệ Alder Lake c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</h3>\r\n\r\n<ul>\r\n	<li>Hỗ trợ cả DDR4 v&agrave; DDR5 với bus tối đa 3200 Mhz với DDR4 v&agrave; 4800 Mhz với DDR5</li>\r\n	<li>Đồ họa t&iacute;ch hợp HD710 mới c&oacute; hiệu năng đủ khỏe để c&oacute; thể giải tr&iacute; nhẹ nh&agrave;ng với c&aacute;c game online phổ th&ocirc;ng như LOL</li>\r\n</ul>\r\n\r\n<p><img alt=\"CPU Intel Celeron G6900\" src=\"https://hacom.vn/media/lib/22-02-2022/cpuintelcelerong6900-2.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>T&iacute;nh tương th&iacute;ch</h3>\r\n\r\n<p>CPU Intel Celeron G6900 sử dụng Socket LGA 1700 ho&agrave;n to&agrave;n mới v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H610, B660, H670 &amp; Z690.</p>', 'upload/product/2023-05-04_cpu_intel_celeron_g6900.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(7, 'CPU Intel Core i3-12100', 'CPU Intel Core i3-12100 (3.3GHz turbo up to 4.3GHz, 4 nhân 8 luồng, 12MB Cache, 58W)- Socket Intel LGA 1700)', 'cpu-intel-core-i3-12100', 1, 3349000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i3-12100 (3.3GHz turbo up to 4.3GHz, 4 nh&acirc;n 8 luồng, 12MB Cache, 58W)- Socket Intel LGA 1700)</h2>\r\n\r\n<p><a href=\"https://hacom.vn/cpu-intel-core-i3-12100\"><strong>CPU Intel Core i3-12100</strong></a>&nbsp;l&agrave; CPU thế hệ thứ 12 của Intel (Alder Lake) tr&ecirc;n nền Socket LGA 1700 với kiến tr&uacute;c ho&agrave;n to&agrave;n mới cho hiệu năng vượt trội so với người tiền nhiệm.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i3-12100\" src=\"https://hanoicomputercdn.com/media/product/64368_cpu_intel_core_i3_12100_3.JPG\" width=\"100%\" /></p>\r\n\r\n<h3>Thế hệ Intel Core i3 thứ 12 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</h3>\r\n\r\n<ul>\r\n	<li>Hỗ trợ PCI-E Gen 5 mới nhất c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 4</li>\r\n	<li>Nh&acirc;n đồ họa t&iacute;ch hợp (tr&ecirc;n c&aacute;c model kh&ocirc;ng c&oacute; k&yacute; tự F) UHD 770 mạnh hơn, c&oacute; khả năng xuất h&igrave;nh đạt độ ph&acirc;n giải 8K.&nbsp;</li>\r\n	<li>Sức mạnh tr&ecirc;n mỗi nh&acirc;n được tăng rất nhiều so với thế hệ 11</li>\r\n</ul>\r\n\r\n<p>&nbsp;&nbsp;<img alt=\"CPU Intel Core i3-12100\" src=\"https://hanoicomputercdn.com/media/product/64368_cpu_intel_core_i3_12100_2.JPG\" width=\"100%\" /></p>\r\n\r\n<h3>T&iacute;nh tương th&iacute;ch</h3>\r\n\r\n<p>CPU Intel Core i3-12100 sử dụng Socket LGA 1700 ho&agrave;n to&agrave;n mới v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H610, B660, H670 &amp; Z690.&nbsp;</p>\r\n\r\n<h3>Intel Core i3 d&agrave;nh cho ai?&nbsp;</h3>\r\n\r\n<p>L&agrave; CPU tầm trung nhắm đến hiệu năng tr&ecirc;n gi&aacute; của Intel, Core i3 sẽ ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y từ tầm trung đến cao cấp, phục vụ mục đ&iacute;ch l&agrave;m việc, Gaming với mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute;.&nbsp;</p>', 'upload/product/2023-05-04_cpu_intel_core_i3_12100.jpg', NULL, NULL, NULL, NULL, '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(8, 'CPU Intel Core i5-12400F', 'CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nhân 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700)', 'cpu-intel-core-i5-12400f', 1, 4159000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nh&acirc;n 12 luồng)</h2>\r\n\r\n<p><strong>CPU Intel Core i5-12400F</strong>&nbsp;l&agrave; CPU thế hệ thứ 12 của Intel (Alder Lake) tr&ecirc;n nền Socket LGA 1700 với kiến tr&uacute;c ho&agrave;n to&agrave;n mới cho hiệu năng vượt trội so với người tiền nhiệm.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; phi&ecirc;n bản kh&ocirc;ng t&iacute;ch hợp iGPU để giảm gi&aacute; th&agrave;nh, khi sử dụng bắt buộc phải c&oacute; card đồ họa rời.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-12400F\" src=\"https://hanoicomputercdn.com/media/product/62476_cpu_intel_core_i5_12400f_22.JPG\" width=\"100%\" /></p>\r\n\r\n<h3>Thế hệ Intel Core i5 thứ 12 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</h3>\r\n\r\n<ul>\r\n	<li>Hỗ trợ PCI-E Gen 5 mới nhất c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 4</li>\r\n	<li>Sức mạnh tr&ecirc;n mỗi nh&acirc;n được tăng rất nhiều so với thế hệ 11</li>\r\n</ul>\r\n\r\n<p>&nbsp;&nbsp;<img alt=\"CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nhân 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700) \" src=\"https://hanoicomputercdn.com/media/lib/22-08-2022/cpu-intel-core-i5-12400f-igpu.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>T&iacute;nh tương th&iacute;ch</h3>\r\n\r\n<p><img alt=\"CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nhân 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700) \" src=\"https://hanoicomputercdn.com/media/lib/22-08-2022/cpu-intel-core-i5-12400f-mb.jpg\" width=\"100%\" /></p>\r\n\r\n<p>CPU Intel Core i5-12400F sử dụng Socket LGA 1700 ho&agrave;n to&agrave;n mới v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H610, B660, H670 &amp; Z690.&nbsp;</p>\r\n\r\n<h3>Intel Core i5 d&agrave;nh cho ai?&nbsp;</h3>\r\n\r\n<p><img alt=\"CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nhân 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700) \" src=\"https://hanoicomputercdn.com/media/lib/22-08-2022/cpu-intel-core-i5-12400f-pk.jpg\" width=\"100%\" /></p>', 'upload/product/2023-05-04_cpu_intel_core_i5_12400f.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:00:09', '2023-05-04 08:00:09', NULL),
(9, 'CPU Intel Core i9-13900KF', 'CPU Intel Core i9-13900KF (3.0GHz turbo up to 5.8Ghz, 24 nhân 32 luồng, 32MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)', 'cpu-intel-core-i9-13900kf', 1, 14899000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i9-13900KF (3.0GHz turbo up to 5.8Ghz, 24 nh&acirc;n 32 luồng, 32MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)</h2>\r\n\r\n<h3>Thiết kế</h3>\r\n\r\n<p><img alt=\"CPU Intel Core i9-13900 Series\" src=\"https://hanoicomputercdn.com/media/lib/28-11-2022/68378_cpu_intel_core_i9_13900k_3_0ghz_turbo_up_to_5_8ghz_24_nhan_32_luong_32mb_cache_125w_socket_intel_lga_1700_alder_lake_at1-x.jpg\" width=\"100%\" /></p>\r\n\r\n<p>CPU Intel Core i9 13900KF l&agrave; CPU thế hệ thứ 13 của Intel. L&agrave; đứa con mạnh mẽ v&agrave; cao cấp nhất n&ecirc;n i9 13900K được ưu &aacute;i dựa tr&ecirc;n Socket LGA 1700 v&agrave; &aacute;p dụng kiến ​​tr&uacute;c mới v&agrave; c&oacute; hiệu năng vượt trội so với c&aacute;c sản phẩm thế hệ trước. Intel Core i9 13900KF sẽ l&agrave; sự lựa chọn tuyệt vời nếu bạn muốn x&acirc;y dựng một d&agrave;n PC gaming tốt nhất hiện nay. Với số nh&acirc;n, số luồng v&agrave; tốc độ xung nhịp cao, n&oacute; sẽ ph&ugrave; hợp với c&aacute;c thiết bị cao cấp, dịch vụ ph&aacute;t trực tuyến, tr&ograve; chơi hoặc sử dụng phần mềm chuy&ecirc;n nghiệp.</p>\r\n\r\n<h3>Cải tiến&nbsp;</h3>\r\n\r\n<p><img alt=\"CPU Intel Core i9-13900 Series\" src=\"https://hanoicomputercdn.com/media/lib/28-11-2022/cpu-intel-core-i9-13900k-30ghz-turbo-up-to-52.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Intel Core i9 13900KF c&oacute; thể đạt được sự gia tăng đ&aacute;ng kể về hiệu suất đa l&otilde;i, chủ yếu l&agrave; nhờ v&agrave;o 8 l&otilde;i E-core bổ sung m&agrave; d&ograve;ng Alder Lake thế hệ trước chưa c&oacute; được. Tiếp theo l&agrave; một loạt c&aacute;c cải tiến chung (IPC) cho mỗi chu kỳ. Raptor Lake-S sở hữu 24 nh&acirc;n v&agrave; 32 luồng. Sự đầu tư hẳn hoi của h&atilde;ng đ&atilde; hiển nhi&ecirc;n đưa Intel Core i9 13900K l&ecirc;n vị tr&iacute; dẫn đầu hiện nay.</p>\r\n\r\n<p>Nhiều trường hợp c&ograve;n ghi nhận Intel Core i9 13900K thậm ch&iacute; c&ograve;n đạt tần số 6GHz th&ocirc;ng qua thử nghiệm đơn nh&acirc;n của phần mềm CPU-Z. Người d&ugrave;ng cũng kh&ocirc;ng cần tản nhiệt đặc biệt để đạt được xung nhịp 6085 MHz. Một bộ tản nhiệt AIO l&agrave; đủ, nhưng nhiệt độ v&agrave; mức ti&ecirc;u thụ điện năng cho thấy CPU kh&ocirc;ng qu&aacute; nặng để chạy hết c&ocirc;ng suất.</p>\r\n\r\n<h3>N&acirc;ng cấp hiệu năng</h3>\r\n\r\n<p><img alt=\"CPU Intel Core i9-13900 Series\" src=\"https://hanoicomputercdn.com/media/lib/28-11-2022/cpu-intel-core-i9-13900k-30ghz-turbo-up-to-51.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Intel x&aacute;c nhận d&ograve;ng CPU n&agrave;y sẽ sử dụng tiến tr&igrave;nh Intel 7, l&ecirc;n đến 24 nh&acirc;n v&agrave; 32 luồng, tức l&agrave; 8 nh&acirc;n P + 16 nh&acirc;n E, khả năng &eacute;p xung si&ecirc;u khủng, tương th&iacute;ch với nền tảng Intel Core gen 12. Do đ&oacute;, hiệu năng tr&ecirc;n Intel Core i9 13900KF được n&acirc;ng cao đ&aacute;ng kể. Song song đ&oacute;, bo mạch chủ Z790 cũng sẽ được ph&aacute;t h&agrave;nh c&ugrave;ng thời điểm. V&agrave; c&aacute;c bo mạch chủ d&ograve;ng B760 v&agrave; H710 cũng dự kiến ra mắt v&agrave;o năm sau để người d&ugrave;ng c&oacute; nhiều sự lựa chọn hơn.</p>', 'upload/product/2023-05-04_cpu_intel_core_i9_13900kf.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:01:20', '2023-05-04 08:01:20', NULL),
(10, 'CPU Intel Pentium Gold G6405', 'CPU Intel Pentium Gold G6405 (4.1GHz, 2 nhân 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)', 'cpu-intel-pentium-gold-g6405', 1, 1599000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Pentium Gold G6405 (4.1GHz, 2 nh&acirc;n 4 luồng)</h2>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-intel-pentium-gold-g6405\"><strong>CPU Intel Pentium Gold G6405</strong></a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp nhẹ của G6400 với xung nhịp tăng th&ecirc;m 0.1Ghz. Với 2 nh&acirc;n 4 luồng, đ&acirc;y l&agrave; CPU ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y gi&aacute; rẻ, văn ph&ograve;ng hoặc giải tr&iacute; nhẹ nh&agrave;ng.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Pentium Gold G6405 (4.1GHz, 2 nhân 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)\" src=\"https://hanoicomputercdn.com/media/product/58752_cpu_intel_pentium_gold_g6405_5.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>N&acirc;ng cấp của CPU Intel Pentium Gold G6405</h3>\r\n\r\n<ul>\r\n	<li>Xung nhịp tăng nhẹ 0.1Ghz gi&uacute;p hiệu năng tăng l&ecirc;n trong khi gi&aacute; vẫn kh&ocirc;ng đổi so với thế hệ cũ</li>\r\n</ul>\r\n\r\n<p><img alt=\"CPU Intel Pentium Gold G6405 (4.1GHz, 2 nhân 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)\" src=\"https://hanoicomputercdn.com/media/product/58752_cpu_intel_pentium_gold_g6405_2.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>T&iacute;nh tương th&iacute;ch</h3>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-bo-vi-xu-ly\">CPU</a>&nbsp;Intel Pentium Gold G6405 vẫn sử dụng socket LGA 1200 v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H410, B460, H470, Z490&nbsp; v&agrave; c&aacute;c bo mạch chủ thế hệ mới H510, B560, Z590.&nbsp;</p>\r\n\r\n<h3>CPU Intel Pentium Gold G6405 d&agrave;nh cho ai?&nbsp;</h3>\r\n\r\n<p>CPU Intel Pentium Gold G6405 với 2 nh&acirc;n v&agrave; 4 luồng xử l&yacute; c&ugrave;ng mức gi&aacute; dễ tiếp cận sẽ ph&ugrave; hợp cho c&aacute;c cấu h&igrave;nh m&aacute;y bộ văn ph&ograve;ng, học sinh - sinh vi&ecirc;n vừa l&agrave;m việc, học tập v&agrave; giải tr&iacute; nhẹ nh&agrave;ng.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Pentium Gold G6405 (4.1GHz, 2 nhân 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)\" src=\"https://hanoicomputercdn.com/media/product/58752_cpu_intel_pentium_gold_g6405_6.jpg\" width=\"100%\" /></p>', 'upload/product/2023-05-04_cpu_intel_pentium_gold_g6405.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:02:56', '2023-05-04 08:02:56', NULL),
(11, 'CPU Intel Xeon W-1350', 'CPU Intel Xeon W-1350 (3.3GHz turbo up to 5.0GHz, 6 nhân 12 luồng, 12MB Cache, 80W) - Socket Intel LGA 1200', 'cpu-intel-xeon-w-1350', 1, 7499000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Xeon W-1350 (3.3GHz turbo up to 5.0GHz, 6 nh&acirc;n 12 luồng, 12MB Cache, 80W) - Socket Intel LGA 1200</h2>\r\n\r\n<p>CPU Intel Xeon W-1350 Socket LGA 1200 l&agrave; d&ograve;ng CPU mạnh nhất tr&ecirc;n nền tảng Socket LGA với 6 nh&acirc;n &nbsp;v&agrave; 12 luồng. Đ&acirc;y l&agrave; CPU th&iacute;ch hợp cho c&aacute;c bộ m&aacute;y l&agrave;m việc hiệu năng cao, workstation PC...</p>\r\n\r\n<p><br />\r\nCPU n&agrave;y khi đi c&ugrave;ng với 1 chiếc bo mạch chủ W480 l&agrave; sự kết hợp ho&agrave;n hảo n&agrave;y gi&uacute;p cho bộ m&aacute;y trở n&ecirc;n bền bỉ hơn.</p>\r\n\r\n<h3>Th&ocirc;ng số kỹ thuật</h3>\r\n\r\n<p>Bộ sưu tập sản phẩm Bộ xử l&yacute; Intel&reg; Xeon&reg; W<br />\r\nModel : W-1350<br />\r\nCấu tr&uacute;c CPU: 14nm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\nSố nh&acirc;n: 6<br />\r\nSố luồng: 12<br />\r\nXung nhịp cơ bản 3.30 GHz<br />\r\nXung nhịp Turbo: 5,0 GHz<br />\r\nBộ nhớ đệm: 12 MB<br />\r\nTDP: 80 W<br />\r\nLoại bộ nhớ: DDR4-3200<br />\r\nHỗ trợ tối đa dung lượng bộ nhớ: 128GB</p>', 'upload/product/2023-05-04_cpu_intel_xeon_w_1350.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:04:33', '2023-05-04 08:04:33', NULL),
(12, 'CPU Intel Core i5-11400F', 'CPU Intel Core i5-11400F (2.6GHz turbo up to 4.4Ghz, 6 nhân 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200', 'cpu-intel-core-i5-11400f', 1, 2999000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i5-11400F (2.6GHz turbo up to 4.4Ghz, 6 nh&acirc;n 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200</h2>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-intel-core-i5-11400f-2.6ghz-turbo-up-to-4.4ghz-6-nhan-12-luong-12mb-cache-65w-socket-intel-lga-1200\"><strong>CPU Intel Core i5-11400F</strong></a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp của i5-10400F với xung nhịp tăng nhẹ v&agrave; hiệu suất tr&ecirc;n mỗi nh&acirc;n được cải thiện. Với 6 nh&acirc;n 12 luồng, đ&acirc;y l&agrave; CPU c&oacute; hiệu năng tr&ecirc;n gi&aacute; th&agrave;nh tốt nhất của Intel.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-11400F\" src=\"https://hanoicomputercdn.com/media/product/58403_cpu_intel_core_i5_11400f_2_6ghz_turbo_up_to_4_4ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_012.jpg\" width=\"1000\" /></p>\r\n\r\n<h3><strong>Thế hệ Intel Core i5 thứ 11 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</strong></h3>\r\n\r\n<ul>\r\n	<li>Hỗ trợ PCI-E Gen 4 c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 3 ở thế hệ cũ</li>\r\n	<li>Nh&acirc;n đồ họa t&iacute;ch hợp (tr&ecirc;n c&aacute;c model kh&ocirc;ng c&oacute; k&yacute; tự F) UHD 750 mạnh hơn, c&oacute; khả năng xuất h&igrave;nh đạt độ ph&acirc;n giải 5K.&nbsp;</li>\r\n	<li>Hỗ trợ tập lệnh AVX-512 tăng sức mạnh t&iacute;nh to&aacute;n với khả năng xử l&yacute; dữ liễu cỡ lớn, cải thiện hiệu năng xử l&yacute; với c&aacute;c t&aacute;c vụ giải m&atilde;, render, m&atilde; ho&aacute; v&agrave; m&aacute;y học (Deep Learning)</li>\r\n</ul>\r\n\r\n<p><img alt=\"CPU Intel Core i5-11400F\" src=\"https://hanoicomputercdn.com/media/product/58403_cpu_intel_core_i5_11400f_2_6ghz_turbo_up_to_4_4ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_011.jpg\" width=\"1000\" /></p>\r\n\r\n<h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>\r\n\r\n<p>CPU Intel Core i5-11400F vẫn sử dụng socket LGA 1200 v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ&nbsp; H470, Z490 (sau khi update Bios) v&agrave; c&aacute;c bo mạch chủ thế hệ mới H510, B560, Z590.&nbsp;</p>\r\n\r\n<h3><strong>Intel Core i5 d&agrave;nh cho ai?&nbsp;</strong></h3>\r\n\r\n<p>Với 6 nh&acirc;n 12 luồng v&agrave; hiệu năng tr&ecirc;n mỗi nh&acirc;n được n&acirc;ng cấp, Intel Core i5 sẽ ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y tầm trung, phục vụ mục đ&iacute;ch Stream, Gaming hoặc l&agrave;m việc với c&aacute;c phần mềm chuy&ecirc;n dụng.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-11400F\" src=\"https://hanoicomputercdn.com/media/product/58403_cpu_intel_core_i5_11400f_2_6ghz_turbo_up_to_4_4ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_111.jpg\" width=\"100%\" /></p>', 'upload/product/2023-05-04_CPU-i5-11400F.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:05:49', '2023-05-04 08:05:49', NULL),
(13, 'CPU Intel Core i7-11700', 'CPU Intel Core i7-11700 (2.5GHz turbo up to 4.9Ghz, 8 nhân 16 luồng, 16MB Cache, 65W) - Socket Intel LGA 1200', 'cpu-intel-core-i7-11700', 1, 7299000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i7-11700 (2.5GHz turbo up to 4.9Ghz, 8 nh&acirc;n 16 luồng, 16MB Cache, 65W)</h2>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-intel-core-i7-11700-2.5ghz-turbo-up-to-4.9ghz-8-nhan-16-luong-16mb-cache-65w-socket-intel-lga-1200\"><strong>CPU Intel Core i7-11700</strong></a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp với xung nhịp tăng nhẹ v&agrave; hiệu suất tr&ecirc;n mỗi nh&acirc;n được cải thiện. Với 8 nh&acirc;n 16 luồng, đ&acirc;y l&agrave; một trong những CPU c&oacute; hiệu năng chơi game tốt nhất của Intel.&nbsp;</p>\r\n\r\n<p><img alt=\"CPU Intel Core i7-11700\" src=\"https://hanoicomputercdn.com/media/product/58407_cpu_intel_core_i7_11700_2_5ghz_turbo_up_to_4_9ghz_8_nhan_16_luong_16mb_cache_65w_socket_intel_lga_1200_012.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Thế hệ Intel Core i7 thứ 11 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</h3>\r\n\r\n<ul>\r\n	<li>Hỗ trợ PCI-E Gen 4 c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 3 ở thế hệ cũ</li>\r\n	<li>Nh&acirc;n đồ họa t&iacute;ch hợp (tr&ecirc;n c&aacute;c model kh&ocirc;ng c&oacute; k&yacute; tự F) UHD 750 mạnh hơn, c&oacute; khả năng xuất h&igrave;nh đạt độ ph&acirc;n giải 5K.&nbsp;</li>\r\n	<li>Hỗ trợ tập lệnh AVX-512 tăng sức mạnh t&iacute;nh to&aacute;n với khả năng xử l&yacute; dữ liễu cỡ lớn, cải thiện hiệu năng xử l&yacute; với c&aacute;c t&aacute;c vụ giải m&atilde;, render, m&atilde; ho&aacute; v&agrave; m&aacute;y học (Deep Learning)</li>\r\n</ul>\r\n\r\n<p><img alt=\"CPU Intel Core i7-11700\" src=\"https://hanoicomputercdn.com/media/product/58407_cpu_intel_core_i7_11700_2_5ghz_turbo_up_to_4_9ghz_8_nhan_16_luong_16mb_cache_65w_socket_intel_lga_1200_111.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>T&iacute;nh tương th&iacute;ch</h3>\r\n\r\n<p>CPU Intel Core i7-11700 vẫn sử dụng socket LGA 1200 v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H470, Z490 (sau khi update Bios) v&agrave; c&aacute;c bo mạch chủ thế hệ mới H510, B560, Z590. Tuy nhi&ecirc;n bạn n&ecirc;n sử dụng chung với c&aacute;c bo mạch chủ B560, Z490 v&agrave; Z590 để CPU c&oacute; thể hoạt động tốt nhất.&nbsp;</p>\r\n\r\n<h3>Intel Core i7 d&agrave;nh cho ai?&nbsp;</h3>\r\n\r\n<p>Với 8 nh&acirc;n 16 luồng v&agrave; hiệu năng tr&ecirc;n mỗi nh&acirc;n được n&acirc;ng cấp, Intel Core i7 sẽ ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y tầm trung v&agrave; cao cấp, phục vụ mục đ&iacute;ch Stream, Gaming hoặc l&agrave;m việc với c&aacute;c phần mềm chuy&ecirc;n dụng.&nbsp;</p>', 'upload/product/2023-05-04_cpu-i7-11700.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:06:58', '2023-05-04 08:06:58', NULL),
(14, 'CPU Intel Core i7-13700K', 'CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nhân 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)', 'cpu-intel-core-i7-13700k', 1, 11199000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nh&acirc;n 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)</h2>\r\n\r\n<h3>Th&ocirc;ng số kỹ thuật</h3>\r\n\r\n<p>CPU Intel Core i7-13700K được trang bị tổng cộng 16 nh&acirc;n v&agrave; 24 luồng. Trong đ&oacute; bao gồm 8 P-Core (nh&acirc;n hiệu năng cao) dựa tr&ecirc;n kiến ​​tr&uacute;c Raptor Cove v&agrave; 8 E-Core (nh&acirc;n tiết kiệm điện) dựa tr&ecirc;n kiến ​​tr&uacute;c l&otilde;i Grace Mont. CPU đi k&egrave;m với 30 MB bộ nhớ đệm L3 v&agrave; 24 MB bộ đệm L2 cho tổng số 54 MB bộ nhớ đệm kết hợp. CPU thế hệ thứ 13 của Intel vẫn sử dụng socket LGA 1700 như thế hệ 12 tiền nhiệm n&ecirc;n người d&ugrave;ng cũng kh&ocirc;ng phải lo lắng qu&aacute; nhiều về việc phải n&acirc;ng cấp bo mạch chủ nếu muốn sở hữu những chiếc CPU n&agrave;y.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nhân 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake) (ID: 68380)\" src=\"https://hanoicomputercdn.com/media/product/68380_cpu_intel_core_i7_13700k_3_4ghz_turbo_up_to_5__1_.JPG\" width=\"100%\" /></p>\r\n\r\n<h3>Hiệu năng</h3>\r\n\r\n<p>&nbsp;i7-13700K c&oacute; thể đạt đến ngưỡng xung nhịp l&agrave; 6.2 MHz với 8 nh&acirc;n P-core (nh&acirc;n hiệu năng cao) v&agrave; đạt 4189 MHz với 8 nh&acirc;n E-core (nh&acirc;n tiết kiệm điện). Hơn nữa, theo như một b&agrave;i test kh&aacute;c tr&ecirc;n CPU-Z, điểm chuẩn đơn nh&acirc;n của chiếc CPU đạt 1010 điểm, rất nhanh v&agrave; vượt xa những lần rỏ rỉ th&ocirc;ng tin trước đ&acirc;y ch&uacute;ng ta đ&atilde; thấy. Điểm chuẩn đa nh&acirc;n th&igrave; &iacute;t ấn tượng hơn ch&uacute;t với số điểm l&agrave; 11877 điểm.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nhân 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake) (ID: 68380)\" src=\"https://hanoicomputercdn.com/media/product/68380_cpu_intel_core_i7_13700k_3_4ghz_turbo_up_to_5__7_.JPG\" width=\"100%\" /></p>\r\n\r\n<p>&nbsp;i7-13700K sẽ đạt được mức hiệu năng rất vượt trội khi được trang bị c&ugrave;ng với RAM DDR5, tương tự với thế hệ thứ 12 trước đ&oacute; nhưng lần n&agrave;y thậm ch&iacute; c&ograve;n mạnh mẽ hơn. Bởi c&oacute; một ph&aacute;t hiện mới khi sử dụng Intel Core i7 13700K chạy tr&ecirc;n c&ugrave;ng một nền tảng nhưng với biến thể RAM DDR5 c&ugrave;ng Z690 Steel Legend của AsRock v&agrave; đạt điểm số cao hơn nhiều về hiệu năng đa nh&acirc;n. C&oacute; thể thấy CPU chạy tr&ecirc;n mức xung nhịp 5.3 GHz ở tất cả c&aacute;c nh&acirc;n v&agrave; mang lại điểm đa luồng tối đa l&agrave; 19811 điểm, tăng 20% so với khi sử dụng RAM DDR4.</p>\r\n\r\n<h3>Tương th&iacute;ch</h3>\r\n\r\n<p>Được biết rằng d&ograve;ng CPU Core thế hệ thứ 13 của Intel sẽ được ph&aacute;t h&agrave;nh v&agrave;o nửa cuối năm nay. Intel hiện đ&atilde; x&aacute;c nhận rằng loạt CPU n&agrave;y sẽ sử dụng quy tr&igrave;nh Intel 7, cải thiện hiệu năng rất nhiều với tối đa l&agrave; 24 nh&acirc;n v&agrave; 32 luồng, tức l&agrave; 8 nh&acirc;n P-core + 16 nh&acirc;n E-core, với khả năng &eacute;p xung vượt trội, tương th&iacute;ch với Nền tảng Core thế hệ thứ 12. C&aacute;c đối t&aacute;c của Intel cũng sẽ ph&aacute;t h&agrave;nh bo mạch chủ Z790 c&ugrave;ng l&uacute;c v&agrave; c&aacute;c bo mạch chủ d&ograve;ng B760 v&agrave; H710 c&oacute; thể được tung ra thị trường v&agrave;o năm sau, tạo cho người d&ugrave;ng th&ecirc;m nhiều sự lựa chọn hơn trong việc chọn lựa bo mạch chủ cho cả 2 thế hệ.</p>', 'upload/product/2023-05-04_cpu-i7-13700K.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(15, 'CPU Intel Core i5-10400F', 'CPU Intel Core i5-10400F (2.9GHz turbo up to 4.3Ghz, 6 nhân 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200', 'cpu-intel-core-i5-10400f', 1, 2599000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Core i5-10400F Hiệu suất cao, xứng đ&aacute;ng để n&acirc;ng cấp</h2>\r\n\r\n<h2>Chiếc i5 c&oacute; mức gi&aacute; dễ chịu nhất</h2>\r\n\r\n<p>Ph&acirc;n kh&uacute;c CPU tầm trung sẽ chẳng c&ograve;n y&ecirc;n ả với sự xuất hiện của&nbsp;<a href=\"https://hacom.vn/cpu-intel-core-i5-10400f-2.9ghz-turbo-up-to-4.3ghz-6-nhan-12-luong-12mb-cache-65w-socket-intel-lga-1200\" rel=\"noopener\" target=\"_blank\" title=\"Intel Core i5-10400F\">Intel Core i5-10400F</a>, tiếp tục truyền thống l&agrave; chiếc i5 gi&aacute; rẻ nhất của 9400F hồi năm ngo&aacute;i, kh&ocirc;ng ngạc nhi&ecirc;n nếu 10400F dẫn đầu top những sản phẩm b&aacute;n chạy của&nbsp;<a href=\"https://hacom.vn/\" rel=\"noopener\" target=\"_blank\" title=\"HANOICOMPUTER\">HANOICOMPUTER</a>.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-10400F\" src=\"https://hanoicomputercdn.com/media/product/52365_cpu_intel_core_i5_10400f_2_9ghz_turbo_up_to_4_3ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_111.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Mức gi&aacute; hấp dẫn kh&ocirc;ng thể chối từ</h3>\r\n\r\n<p>6 nh&acirc;n 12 luồng chỉ c&ograve;n loanh quanh trong mức gi&aacute; khoảng 4 triệu, c&aacute;ch đ&acirc;y khoảng 2 năm đ&acirc;y c&ograve;n l&agrave; điều kh&ocirc;ng tưởng khi i7-8700 ra đời. Nhưng hiện taị mọi chuyện đ&atilde; thay đổi khi Intel đ&atilde; ch&iacute;nh thức bước v&agrave;o cuộc đua về th&ocirc;ng số v&agrave; gi&aacute; cả với đối thủ truyền kiếp AMD, cơ hội để bạn sở hữu một d&agrave;n m&aacute;y chất lượng ch&iacute;nh l&agrave; thời điểm hiện tại.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-10400F\" src=\"https://hanoicomputercdn.com/media/product/52365_cpu_intel_core_i5_10400f_2_9ghz_turbo_up_to_4_3ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_222.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Thuần game, gọi t&ecirc;n 10400F</h3>\r\n\r\n<p>Những game thủ sẽ rất th&iacute;ch th&uacute; trước viễn cảnh c&oacute; thể livestream hay chơi c&aacute;c tựa game AAA trong v&ograve;ng 2-3 năm nữa m&agrave; kh&ocirc;ng cần nh&igrave;n cấu h&igrave;nh, tại sao kh&ocirc;ng khi hiện nay những game ăn phần cứng nhất đều y&ecirc;u cầu một d&agrave;n m&aacute;y c&oacute; CPU 6 nh&acirc;n thực trở l&ecirc;n?</p>\r\n\r\n<h3>Dễ d&agrave;ng lựa chọn linh kiện</h3>\r\n\r\n<p>Dễ t&iacute;nh nhất trong số c&aacute;c CPU hiệu suất cao lần n&agrave;y của&nbsp;<a href=\"https://hacom.vn/cpu-intel\" rel=\"noopener\" target=\"_blank\" title=\"Intel\">Intel</a>, 10400F c&oacute; thể chạy tốt tr&ecirc;n c&aacute;c bo mạch chủ B460 gi&aacute; rẻ v&agrave; chỉ cần tản nhiệt đi k&egrave;m từ h&atilde;ng l&agrave; c&oacute; thể bon bon về đ&iacute;ch. Chi ph&iacute; tối thiểu nhưng hiệu suất phải l&agrave; tối đa, Intel đang lắng nghe người d&ugrave;ng của m&igrave;nh hơn bao giờ hết.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-10400F\" src=\"https://hanoicomputercdn.com/media/product/52365_cpu_intel_core_i5_10400f_2_9ghz_turbo_up_to_4_3ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_333.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Stream sẽ kh&ocirc;ng c&ograve;n l&agrave; trở ngại</h3>\r\n\r\n<p>Điều khiến i5-9400F &ndash; tiền nhiệm của 10400F trở n&ecirc;n mất điểm trong mắt nhiều người d&ugrave;ng ch&iacute;nh l&agrave; khả năng g&aacute;nh v&aacute;c việc stream tr&ecirc;n nhiều nền tảng của n&oacute; kh&ocirc;ng được tốt lắm. Kể cả khi được hỗ trợ bởi một &ldquo;rổ&rdquo; RAM, n&oacute; vẫn kh&aacute; chật vật khi phải stream tr&ecirc;n con số 3 nền tảng, trong khi đ&oacute;, đối thủ AMD Ryzen 5 3600 lại tỏ ra sung sức. Giữa thời buổi nh&agrave; nh&agrave; stream, người người stream như thế n&agrave;y th&igrave; đ&acirc;y kh&ocirc;ng phải l&agrave; c&aacute;i g&igrave; đ&oacute; th&uacute; vị v&agrave; 10400F với th&ocirc;ng số kỹ thuật rất tốt hứa hẹn sẽ sửa chữa sai lầm n&agrave;y.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-10400F\" src=\"https://hanoicomputercdn.com/media/product/52365_cpu_intel_core_i5_10400f_2_9ghz_turbo_up_to_4_3ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_444.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Th&ocirc;ng số l&yacute; tưởng</h3>\r\n\r\n<p>6 nh&acirc;n 12 luồng, mức xung mặc định 2.9GHz v&agrave; c&oacute; thể l&ecirc;n đến 4.3GHz nhờ c&ocirc;ng ngh&ecirc; Turbo Boost 2.0, cache 12MB thật sự l&agrave; một m&oacute;n hời trong tầm gi&aacute; với những người d&ugrave;ng cơ bản.</p>\r\n\r\n<h3>Intel Core i5-10400F sẽ d&agrave;nh cho ai?</h3>\r\n\r\n<p>C&aacute;c gamer sẽ đặc biệt h&agrave;i l&ograve;ng với 10400F, c&ograve;n những người l&agrave; d&acirc;n văn ph&ograve;ng, nh&agrave; s&aacute;ng tạo nội dung th&igrave; h&atilde;y chọn sang 10400, 10500 hoặc 10600 để thỏa m&atilde;n nhu cầu l&agrave;m việc của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"CPU Intel Core i5-10400F\" src=\"https://hanoicomputercdn.com/media/product/52365_cpu_intel_core_i5_10400f_1.png\" width=\"100%\" /></p>', 'upload/product/2023-05-04_intel_core_i5_10400.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:09:41', '2023-05-04 08:09:41', NULL),
(16, 'CPU Intel Xeon W-1350P', 'CPU Intel Xeon W-1350P (4.0GHz turbo up to 5.1GHz, 6 nhân 12 luồng, 12MB Cache, 125W) - Socket Intel LGA 1200', 'cpu-intel-xeon-w-1350p', 1, 8999000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU Intel Xeon W-1350P (4.0GHz turbo up to 5.1GHz, 6 nh&acirc;n 12 luồng, 12MB Cache, 125W) - Socket Intel LGA 1200</h2>\r\n\r\n<p>CPU Intel Xeon W-1350P Socket LGA 1200 l&agrave; d&ograve;ng CPU mạnh nhất tr&ecirc;n nền tảng Socket LGA với 6 nh&acirc;n&nbsp; v&agrave; 12 luồng. Đ&acirc;y l&agrave; CPU th&iacute;ch hợp cho c&aacute;c bộ m&aacute;y l&agrave;m việc hiệu năng cao, workstation PC...</p>\r\n\r\n<p><br />\r\nCPU n&agrave;y khi đi c&ugrave;ng với 1 chiếc bo mạch chủ W480 l&agrave; sự kết hợp ho&agrave;n hảo n&agrave;y gi&uacute;p cho bộ m&aacute;y trở n&ecirc;n bền bỉ hơn.</p>\r\n\r\n<h3>Th&ocirc;ng số kỹ thuật</h3>\r\n\r\n<ul>\r\n	<li>Bộ sưu tập sản phẩm Bộ xử l&yacute; Intel&reg; Xeon&reg; W</li>\r\n	<li>Model : W-1350P</li>\r\n	<li>Cấu tr&uacute;c CPU: 14nm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>\r\n	<li>Số nh&acirc;n: 6</li>\r\n	<li>Số luồng: 12</li>\r\n	<li>Xung nhịp cơ bản 4.00 GHz</li>\r\n	<li>Xung nhịp Turbo: 5,10 GHz</li>\r\n	<li>Bộ nhớ đệm: 12 MB</li>\r\n	<li>TDP: 125 W</li>\r\n	<li>Loại bộ nhớ: DDR4-3200</li>\r\n	<li>Hỗ trợ tối đa dung lượng bộ nhớ: 128GB</li>\r\n</ul>', 'upload/product/2023-05-04_intel_xeon_w-1250P.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:10:42', '2023-05-04 08:10:42', NULL);
INSERT INTO `products` (`id`, `name`, `name_full`, `slug`, `category_id`, `price`, `author_id`, `sale`, `status`, `hot`, `content`, `image`, `qty_pay`, `quantity`, `number_of_reviewers`, `total_star`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'CPU AMD Ryzen 3 3200G', 'CPU AMD Ryzen 3 3200G (3.6GHz turbo up to 4.0GHz, 4 nhân 4 luồng, 4MB Cache, Radeon Vega 8, 65W) - Socket AMD AM4', 'cpu-amd-ryzen-3-3200g', 1, 2299000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 3 3200G tăng xung tăng hiệu năng</h2>\r\n\r\n<h3>Những điểm nổi bật của AMD Ryzen 3 3200G</h3>\r\n\r\n<p>Đ&uacute;ng theo lộ tr&igrave;nh đ&atilde; định sẵn, v&agrave;o ng&agrave;y 7/7 c&aacute;c bộ CPU Ryzen thế hệ thứ 3 của AMD đồng loạt được b&agrave;y b&aacute;n tr&ecirc;n khắp c&aacute;c cửa h&agrave;ng b&aacute;n lẻ tr&ecirc;n to&agrave;n cầu, đ&aacute;nh dấu sự khởi đầu của một cuộc c&aacute;ch mạng mới đối với cộng đồng y&ecirc;u c&ocirc;ng nghệ n&oacute;i ri&ecirc;ng v&agrave; sử ph&aacute;t triển của c&ocirc;ng nghệ sản xuất CPU n&oacute;i chung.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 3 3200G\" src=\"https://hanoicomputercdn.com/media/product/47180_cpu_amdryzen_3_3200g_3_6_ghz_4_0_ghz_with_boost_6mb_4_cores_4_threads_radeon_vega_8__65w_1111.jpg\" width=\"100%\" /></p>\r\n\r\n<p>C&aacute;ch đ&acirc;y v&agrave;i năm, trước khi AMD giới thiệu kiến tr&uacute;c Zen th&igrave; việc chơi game đối với bộ xử l&yacute; đồ họa t&iacute;ch hợp tr&ecirc;n CPU gần như l&agrave; điều kh&ocirc;ng thể với rất nhiều hạn chế về khả năng xử l&yacute;. Với sự ra mắt của Ryzen 3 2200G v&agrave; Ryzen 5 2400G, 2 đại diện Raven Ridge ti&ecirc;u biểu dựa tr&ecirc;n kiến tr&uacute;c Zen+ của AMD, đem lại sự linh hoạt rất cao cho người d&ugrave;ng cả về hiệu năng lẫn khả năng n&acirc;ng cấp. Mới đ&acirc;y tại sự kiện Computex 2019, AMD vừa tung ra&nbsp;<a href=\"https://www.hacom.vn/cpu-amdryzen-3-3200g-3.6-ghz-4.0-ghz-with-boost-6mb-4-cores-4-threads-radeon-vega-8-/-65w\">Ryzen 3 3200G</a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp của Ryzen 3 2200G với hiệu năng đồ họa được cải thiện một c&aacute;ch r&otilde; rệt.</p>\r\n\r\n<h3>Hiệu năng</h3>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 3 3200G\" src=\"https://hanoicomputercdn.com/media/lib/47180_HNC-AMD-Ryzen-3-3200G.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Điểm thay đổi lớn nhất của Ryzen 3 3200G so với&nbsp;<a href=\"https://www.hacom.vn/cpu-amd-ryzen-3-2200g-35-ghz-37-ghz-with-boost-6mb-4-cores-4-threads-radeon-vega-8-socket-am4\" rel=\"noopener\" target=\"_blank\">2200G</a>&nbsp;đ&oacute; ch&iacute;nh l&agrave; về tốc độ xử l&yacute; đ&atilde; được cải thiện l&ecirc;n kh&aacute; đ&aacute;ng kể, cả về CPU lẫn bộ xử l&yacute; đồ họa t&iacute;ch hợp Vega 8. Với hiệu năng chơi game tr&ecirc;n độ ph&acirc;n giải 1080p, nhờ v&agrave;o việc được cải thiện tốc độ xử l&yacute;, Ryzen 3 3200G chắc chắn sẽ đem lại trải nghiệm mượt m&agrave; đối với c&aacute;c tựa game e-Sport phổ biến hiện nay.</p>\r\n\r\n<h3>D&agrave;nh cho ai?</h3>\r\n\r\n<p>Sẽ thật kh&oacute; c&oacute; thể thuyết phục một game thủ hay một content creator lựa chọn Ryzen 3 3200G, v&igrave; d&ugrave; g&igrave; đi nữa đ&acirc;y vẫn l&agrave; một chiếc CPU dựa tr&ecirc;n kiến tr&uacute;c cũ (Zen+) của AMD với hiệu năng được cải thiện kh&ocirc;ng nhiều so với 2200G.</p>\r\n\r\n<p><img alt=\"CPU AMD Ryzen 3 3200G\" src=\"https://hanoicomputercdn.com/media/lib/47180_HNC-AMD-Ryzen-3-3200G2.jpg\" width=\"100%\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n, nếu bạn l&agrave; một người đơn giản chỉ cần một bộ m&aacute;y t&iacute;nh nhỏ gọn với hiệu năng xử l&yacute; tốt nhất c&oacute; thể một c&aacute;ch to&agrave;n diện. Hay như đơn giản chỉ l&agrave; bạn đang bị giới hạn bởi chi ph&iacute; v&agrave; muốn c&oacute; được khả năng n&acirc;ng cấp tốt về l&acirc;u d&agrave;i th&igrave; Ryzen 3 3200G vẫn l&agrave; một lựa chọn rất đ&aacute;ng để tham khảo.</p>', 'upload/product/2023-05-04_ryzen_3-3200G.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:11:51', '2023-05-04 08:11:51', NULL),
(18, 'CPU AMD Ryzen 5 5500', 'CPU AMD Ryzen 5 5500 (3.6 GHz Upto 4.2GHz / 19MB / 6 Cores, 12 Threads / 65W / Socket AM4)', 'cpu-amd-ryzen-5-5500', 1, 2699000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 5 5500 (3.6 GHz Upto 4.2GHz / 19MB / 6 Cores, 12 Threads / 65W / Socket AM4)</h2>\r\n\r\n<p><strong>CPU AMD Ryzen 5 5500&nbsp;</strong>l&agrave; 1 trong những CPU mới nhất của Series Ryzen 5000 của AMD. CPU vẫn sử dụng Socket AM4 v&agrave; c&oacute; 6 nh&acirc;n 12 luồng c&ugrave;ng xung nhịp tối đa 4.2Ghz.&nbsp;</p>\r\n\r\n<h3>Kiến tr&uacute;c Zen 3</h3>\r\n\r\n<p><img alt=\"kiến trúc zen 3 AMD\" src=\"https://hanoicomputercdn.com/media/lib/25-04-2022/zen-3-amd.jpg\" width=\"100%\" /></p>\r\n\r\n<p><a href=\"https://www.hacom.vn/cpu-bo-vi-xu-ly\" rel=\"noopener\" target=\"_blank\">CPU</a>&nbsp;Ryzen 5000 Series sở hữu kiến tr&uacute;c Zen 3 với nhiều thay đổi mang lại hiệu năng rất cao so với thế hệ cũ. Mỗi CCX giờ đ&acirc;y sẽ c&oacute; 8 nh&acirc;n/CCX, thay v&igrave; 4 nh&acirc;n/CCX như Zen 2. C&aacute;c CCX c&oacute; thể chạy tr&ecirc;n chế độ Single Thread hoặc Two Thread SMT, cho tối đa 16 luồng/CCX. Từ đ&oacute; sẽ cho ra tối đa 16 nh&acirc;n/32 luồng. Mỗi CCD giờ đ&acirc;y sẽ chỉ chứa 1 CCX, thay v&igrave; 2 như thế hệ tiền nhiệm.</p>\r\n\r\n<p>Mỗi nh&acirc;n Zen 3 tr&ecirc;n Ryzen 5000 sẽ c&oacute; 512kB Cache L2. Từ đ&oacute; c&oacute; 4MB cache L2/CCD v&agrave; nếu CPU c&oacute; 2 CCD th&igrave; tổng lượng cache L2 sẽ l&agrave; 8MB. Đi c&ugrave;ng với đ&oacute;, mỗi CCD sẽ c&oacute; th&ecirc;m 32MB cache L3 v&agrave; sẽ hợp nhất lại th&agrave;nh 1, thay v&igrave; chia l&agrave;m đ&ocirc;i như thế hệ trước.&nbsp;</p>\r\n\r\n<p>Tất cả những cải tiến đ&oacute; cho ph&eacute;p:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Xung boost cao hơn</li>\r\n	<li>IPC tăng l&ecirc;n tới 19%</li>\r\n	<li>Giảm thiểu đ&aacute;ng kể độ trễ bộ nhớ</li>\r\n	<li>Tăng tốc giao tiếp giữa nh&acirc;n v&agrave; cache</li>\r\n</ul>', 'upload/product/2023-05-04_ryzen_5_5500.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:12:40', '2023-05-04 08:12:40', NULL),
(19, 'Mainboard Gigabyte B460M AORUS PRO', 'Mainboard Gigabyte B460M AORUS PRO (Intel B460, Socket 1200, m-ATX, 4 khe RAM DDR4)', 'mainboard-gigabyte-b460m-aorus-pro', 3, 2729000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; Mainboard Gigabyte B460M AORUS PRO Chơi Game Đỉnh Cao</h2>\r\n\r\n<p>Mainboard Gigabyte B460M Aorus Pro l&agrave; một trong những chiếc mainboard mới nhất của Gigabyte tr&ecirc;n nền tảng socket 1200. Hỗ trợ c&aacute;c d&ograve;ng CPU thế hệ thứ 10 của Intel v&agrave; được trang bị đầy đủ c&aacute;c t&iacute;nh năng cơ bản, ph&ugrave; hợp với c&aacute;c cấu h&igrave;nh chơi game tầm trung của game thủ.</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_11.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Hiệu năng</h3>\r\n\r\n<p>Nhờ v&agrave;o thiết kế tối ưu,&nbsp;Gigabyte B460M Aorus Pro c&oacute; khả năng hỗ trợ RAM rất tốt v&agrave; ổn định với tốc độ tối đa l&ecirc;n tới 2933MHz, gi&uacute;p game thủ tận dụng tối đa hiệu năng của c&aacute;c bộ CPU Intel mạnh mẽ.</p>\r\n\r\n<p>Về lưu trữ,&nbsp;Gigabyte B460M Aorus Pro c&oacute; t&iacute;ch hợp sẵn một khe cắm M.2 PCIe 3.0 hỗ trợ tất cả c&aacute;c d&ograve;ng M.2 SSD NVME cao cấp với băng th&ocirc;ng l&ecirc;n tới 32Gb/s. Kh&ocirc;ng những vậy khe cắm M.2 n&agrave;y c&ograve;n hỗ trợ c&aacute;c d&ograve;ng M.2 SSD cũ chỉ hoạt động tr&ecirc;n giao thức SATA.</p>\r\n\r\n<p>&nbsp;<img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_44.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>LAN</h3>\r\n\r\n<p>Nhằm đem tốc độ truy cập Internet tốt nhất, B460M Aorus Pro được Gigabyte trang bị sẵn bộ xử l&yacute; mạng Intel LAN độ trễ cực thấp. Đảm bảo đ&aacute;p ứng được cả về nhu cầu chơi game cũng như truyền tải dữ liệu lớn.</p>\r\n\r\n<p>&nbsp;<img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_77.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>&Acirc;m thanh</h3>\r\n\r\n<p>Gigabyte B460M Aorus Pro sử dụng bộ giải m&atilde; &acirc;m thanh&nbsp;Realtek&reg; ALC1200, đồng thời phần mạch xử l&yacute; &acirc;m thanh cũng được thiết kế tối ưu với một lớp chống nhiễu gi&uacute;p t&aacute;ch biệt c&aacute;c linh kiện &acirc;m thanh ra khỏi c&aacute;c khu vực kh&aacute;c của mainboard. Đ&acirc;y l&agrave; thiết kế thường thấy tr&ecirc;n c&aacute;c&nbsp;mainboard cao cấp nhằm đem lại trải nghiệm &acirc;m thanh tốt nhất.</p>\r\n\r\n<p>&nbsp;<img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_33.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Thiết kế Phase nguồn</h3>\r\n\r\n<p>Gigabyte B460M Aorus Pro c&oacute; thiết kế phase nguồn vừa đủ cho những CPU tầm trung mới nhất của Intel, với d&agrave;n linh kiện chất lượng rất cao, chiếc bo mạch chủ ph&ugrave; hợp cho những CPU Intel Core i5 non-K trở xuống.</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_55.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Khe cắm mở rộng được gia cố</h3>\r\n\r\n<p>Tự tin hơn khi lắp những VGA c&oacute; k&iacute;ch thước lớn, cơ chế kh&oacute;a 2 lần Gigabyte &aacute;p dụng sẽ hạn chế t&igrave;nh trạng cong v&ecirc;nh, gập uốn mất thẩm mỹ khi sử dụng thời gian d&agrave;i.</p>\r\n\r\n<p><img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_66.jpg\" width=\"100%\" /></p>\r\n\r\n<h3>Ch&acirc;n PIN đa dụng</h3>\r\n\r\n<p>Thoải m&aacute;i lắp c&aacute;c phụ kiện tản nước nếu bạn th&iacute;ch, đ&oacute; l&agrave; mục đ&iacute;ch của Gigabyte khi tạo ra ch&acirc;n pin đa dụng d&agrave;nh cho loại h&igrave;nh tản nhiệt cực kỳ văn minh n&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hanoicomputercdn.com/media/lib/52907_B460M-AORUS-PRO-Hybrid-Fan-Pin.jpg\" width=\"1200\" /></p>\r\n\r\n<h3>BIOS</h3>\r\n\r\n<p>Tất cả c&aacute;c&nbsp;mainboard của&nbsp;Gigabyte đều sở hữu giao diện BIOS cực k&igrave; th&acirc;n thiện v&agrave; dễ sử dụng, đ&aacute;p ứng được cả nhu cầu cơ bản cũng như n&acirc;ng cao của game thủ.</p>\r\n\r\n<p><img alt=\"\" src=\"https://hanoicomputercdn.com/media/lib/52907_B460M-AORUS-PRO-BIOS.png\" /></p>\r\n\r\n<h3>Phụ kiện</h3>\r\n\r\n<p><img alt=\"Mainboard Gigabyte B460M AORUS PRO\" src=\"https://hanoicomputercdn.com/media/product/52907_mainboard_gigabyte_b460m_aorus_pro_22.jpg\" width=\"100%\" /></p>', 'upload/product/2023-05-04_gigabyte_b460_aorus_pro_ac.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:15:10', '2023-05-04 08:15:10', NULL),
(20, 'Mainboad ASUS ROG RAMPAGE VI EXTREME ENCORE', 'Mainboad ASUS ROG RAMPAGE VI EXTREME ENCORE (Intel X299, Socket 2066, E-ATX, 8 khe RAM DDR4)', 'mainboad-asus-rog-rampage-vi-extreme-encore', 3, 18789000, NULL, 0, 'active', 'no', '<h2>Đ&aacute;nh gi&aacute; Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE | HACOM</h2>\r\n\r\n<h3><strong>HIỆU NĂNG KH&Ocirc;NG ĐỐI THỦ</strong></h3>\r\n\r\n<p>Rampage ROG - được hồi sinh. Bo mạch chủ ASUS ROG Rampage VI Extreme Encore EATX mang đến hiệu năng vượt trội v&agrave; kh&ocirc;ng đối thủ</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"432\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-1.png\" width=\"1837\" /></p>\r\n\r\n<p>CPU hiện đại chuyển từ chế độ tiết kiệm năng lượng s&acirc;u sang tải đầy đủ gần như ngay lập tức. Kiến tr&uacute;c VRM mới nhất của ch&uacute;ng t&ocirc;i vượt qua th&aacute;ch thức bằng c&aacute;ch sử dụng c&aacute;c phase cao cấp nhanh ch&oacute;ng xoay chuyển d&ograve;ng điện, trong khi vẫn duy tr&igrave; hiệu suất nhiệt mẫu mực. Ch&uacute;ng t&ocirc;i đ&atilde; trở th&agrave;nh nh&agrave; sản xuất đầu ti&ecirc;n triển khai bộ nh&acirc;n đ&ocirc;i pha khi ch&uacute;ng t&ocirc;i chuyển chiếc A8N32-SLI Deluxe trở lại v&agrave;o năm 2005. VRM của bo mạch được khen ngợi v&igrave; đ&atilde; khắc phục một c&aacute;ch to&agrave;n bộ khả năng xử l&yacute; năng lượng của c&aacute;c bộ phận c&oacute; sẵn tại thời điểm đ&oacute; v&agrave; cũng l&agrave;m giảm gợn điện &aacute;p. Những lợi &iacute;ch đ&oacute; dẫn đến việc nh&acirc;n đ&ocirc;i pha trở n&ecirc;n được chấp nhận phổ biến trong ng&agrave;nh v&agrave; ch&uacute;ng vẫn được sử dụng cho c&aacute;c mục đ&iacute;ch tương tự ng&agrave;y nay. Tuy nhi&ecirc;n, bộ CPU hiện tại đ&oacute;ng g&oacute;i nhiều l&otilde;i hơn so với phi&ecirc;n bản trước v&agrave; bộ hướng dẫn mới nhất cho ph&eacute;p ch&uacute;ng xử l&yacute; khối lượng c&ocirc;ng việc d&agrave;y đặc t&iacute;nh to&aacute;n với tốc độ đ&aacute;ng kinh ngạc. Nhưng ch&uacute;ng cũng ti&ecirc;u thụ &iacute;t năng lượng hơn khi kh&ocirc;ng hoạt động v&agrave; c&oacute; thể chuyển đổi giữa c&aacute;c trạng th&aacute;i tải nhanh hơn nhiều. Những cải tiến n&agrave;y đ&ograve;i hỏi phải đ&aacute;nh gi&aacute; lại c&aacute;c thiết kế c&ocirc;ng suất v&igrave; bộ nh&acirc;n đ&ocirc;i pha th&ecirc;m độ trễ lan truyền l&agrave;m cản trở phản ứng nhất thời. May mắn thay, c&aacute;c th&agrave;nh phần năng lượng t&iacute;ch hợp mới nhất c&oacute; thể xử l&yacute; d&ograve;ng điện cao hơn c&aacute;c thiết bị cũ, cho ph&eacute;p thực hiện một cấu tr&uacute;c li&ecirc;n kết mạch đơn giản m&agrave; kh&ocirc;ng bị cản trở bởi độ trễ xử l&yacute; của bộ nh&acirc;n đ&ocirc;i pha. Đ&oacute; l&agrave; l&yacute; do tại sao bo mạch chủ X299 của ch&uacute;ng t&ocirc;i sử dụng c&aacute;c phase nguồn được hợp t&aacute;c để cung cấp d&ograve;ng điện bất chợt cao hơn cho mỗi pha, trong khi vẫn duy tr&igrave; hiệu suất nhiệt của c&aacute;c thiết kế nh&acirc;n đ&ocirc;i pha.</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"375\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-2.png\" width=\"1879\" /></p>\r\n\r\n<p>OptiMem III l&agrave; một cột mốc quan trọng trong nỗ lực của ch&uacute;ng t&ocirc;i để tạo ra c&aacute;c bo mạch chủ cung cấp nhiều khoảng trống &eacute;p xung bộ nhớ nhất. Khi được &aacute;p dụng cho nền tảng X299, OptiMem III tăng bi&ecirc;n tần số đến mức bảng kh&ocirc;ng c&ograve;n l&agrave; n&uacute;t cổ chai. Gh&eacute;p nối Extreme Encore với bộ chip v&agrave; bộ nhớ c&oacute; khả năng v&agrave; đạt được tần số l&ecirc;n tới DDR4-4300 MHz trong cấu h&igrave;nh 4 hoặc 8-DIMM.</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"486\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-3.png\" width=\"1841\" /></p>\r\n\r\n<h3><strong>L&Agrave;M M&Aacute;T</strong></h3>\r\n\r\n<p>l&agrave;m m&aacute;t hiệu quả l&agrave; v&ocirc; c&ugrave;ng quan trọng để xử l&yacute; CPU c&oacute; đến 18 l&otilde;i. ROG Rampage VI Extreme Encore được trang bị đầy đủ nhiều tản nhiệt v&agrave; tấm ốp để cung cấp nền tảng tốt nhất cho c&aacute;c hệ thống PC, cho ph&eacute;p hiệu suất cao hơn ở nhiệt độ thấp hơn.</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"386\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-4.png\" width=\"1793\" /></p>\r\n\r\n<p>Quạt Delta Superflo t&ugrave;y chỉnh được đặt hoạt động khi hệ thống tr&ecirc;n 60 &deg; C v&agrave; cho ph&eacute;p Rampage VI Extreme Encore xử l&yacute; việc cung cấp li&ecirc;n tục 500 watt điện. Một nắp I / O bằng nh&ocirc;m được kết nối với tản nhiệt ch&iacute;nh th&ocirc;ng qua một ống tản nhiệt nh&uacute;ng, tăng khối lượng v&agrave; diện t&iacute;ch bề mặt. Vỏ tản nhiệt được chế tạo từ nh&ocirc;m nguy&ecirc;n chất để l&agrave;m m&aacute;t hiệu quả hai ổ M.2 tr&ecirc;n bo mạch. M&ocirc;-đun ROG DIMM.2 b&acirc;y giờ l&agrave;m m&aacute;t thụ động c&aacute;c ổ M.2 với c&aacute;c tản nhiệt kim loại cũng giữ cho hệ thống của bạn tr&ocirc;ng sạch sẽ. Một tấm ốp bằng th&eacute;p, mạ kẽm, c&aacute;n nguội, củng cố bo mạch chủ để chống uốn cong, v&agrave; th&ecirc;m khối lượng bổ sung để h&uacute;t nhiệt từ VRM. Tản nhiệt PCH kết hợp ho&agrave;n hảo với nắp tản nhiệt bằng nh&ocirc;m v&agrave; nổi bật với logo ROG.</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"705\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-5.png\" width=\"1885\" /></p>\r\n\r\n<h3><strong>&Eacute;P XUNG</strong></h3>\r\n\r\n<p>Rampage VI Extreme Encore được t&iacute;ch hợp nhiều c&ocirc;ng cụ trực quan v&agrave; linh hoạt cho ph&eacute;p bạn t&ugrave;y chỉnh mọi kh&iacute;a cạnh của hệ thống để cung cấp hiệu suất v&agrave; t&iacute;nh năng bạn muốn. Tận dụng 5-Way Optimization để &eacute;p xung th&ocirc;ng minh, tự động. Hoặc tận hưởng điều khiển thủ c&ocirc;ng ho&agrave;n to&agrave;n th&ocirc;ng qua c&aacute;c c&agrave;i đặt UEFI BIOS to&agrave;n diện.</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"385\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-6.png\" width=\"1777\" /></p>\r\n\r\n<p>ASUS AI Overclocking gi&uacute;p điều chỉnh tự động nhanh hơn v&agrave; th&ocirc;ng minh hơn bao giờ hết. C&oacute; sẵn trong Windows hoặc trực tiếp th&ocirc;ng qua UEFI, n&oacute; cấu h&igrave;nh CPU v&agrave; bộ l&agrave;m m&aacute;t để dự đo&aacute;n cấu h&igrave;nh tối ưu cho từng hệ thống ri&ecirc;ng lẻ. C&aacute;c bo mạch chủ th&ocirc;ng thường sử dụng cảm biến một đầu được ghi nhận từ một vị tr&iacute; kh&ocirc;ng l&yacute; tưởng, dẫn đến sự ch&ecirc;nh lệch lớn giữa điện &aacute;p thực tế được cung cấp cho CPU v&agrave; gi&aacute; trị được b&aacute;o c&aacute;o cho phần mềm. Encore c&oacute; mạch cảm biến vi sai gi&uacute;p đơn giản h&oacute;a việc &eacute;p xung v&agrave; điều chỉnh bằng c&aacute;ch cho ph&eacute;p bạn theo d&otilde;i điện &aacute;p ch&iacute;nh x&aacute;c hơn.</p>\r\n\r\n<h3><strong>WIFI 6 ( AX200 )</strong></h3>\r\n\r\n<p>Được thiết kế để đ&aacute;p ứng c&aacute;c y&ecirc;u cầu khắt khe của người d&ugrave;ng v&agrave; người tạo nội dung, Ethernet 10 Gbps tr&ecirc;n bo mạch cung cấp một cấp độ mới của mạng gia đ&igrave;nh. Với băng th&ocirc;ng l&ecirc;n tới 10 lần băng th&ocirc;ng rộng của gigabit Ethernet ti&ecirc;u chuẩn, bạn sẽ tận hưởng việc truyền ph&aacute;t video 4K UHD kh&ocirc;ng n&eacute;n, sao lưu v&agrave; truyền tệp nhanh hơn bao giờ hết. ROG Rampage VI Extreme Encore c&oacute; Intel&reg; Ethernet (I219-V) mới nhất để chơi game nhanh hơn, mượt m&agrave; hơn. Bộ điều khiển Intel n&agrave;y c&oacute; sức mạnh tổng hợp tự nhi&ecirc;n với bộ xử l&yacute; v&agrave; chipset Intel, giảm chi ph&iacute; CPU v&agrave; cung cấp th&ocirc;ng lượng TCP v&agrave; UDP đặc biệt cao - v&igrave; vậy sẽ c&oacute; nhiều năng lượng hơn cho c&aacute;c tr&ograve; chơi v&agrave; c&aacute;c t&aacute;c vụ kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Mainboad ASUS ROG RAMPAGE VI EXTREME ENCONRE\" height=\"513\" src=\"https://hanoicomputercdn.com/media/lib/49688_mainboad-asus-rog-rampage-vi-extreme-enconre-7.png\" width=\"1783\" /></p>', 'upload/product/2023-05-04_mainboad_asus_rog_rampage_vi_extreme_enconre_0001_2.jpg', NULL, NULL, NULL, NULL, '2023-05-04 08:17:26', '2023-05-04 08:17:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `product_id`, `attribute_value_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(2, 1, 2, '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(3, 1, 3, '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(4, 1, 4, '2023-05-04 07:48:07', '2023-05-04 07:48:07', NULL),
(5, 2, 1, '2023-05-04 07:49:40', '2023-05-04 07:49:40', NULL),
(6, 2, 5, '2023-05-04 07:49:40', '2023-05-04 07:49:40', NULL),
(7, 2, 6, '2023-05-04 07:49:40', '2023-05-04 07:49:40', NULL),
(8, 2, 7, '2023-05-04 07:49:41', '2023-05-04 07:49:41', NULL),
(9, 3, 1, '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(10, 3, 8, '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(11, 3, 9, '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(12, 3, 4, '2023-05-04 07:51:32', '2023-05-04 07:51:32', NULL),
(13, 4, 1, '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(14, 4, 10, '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(15, 4, 11, '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(16, 4, 12, '2023-05-04 07:54:10', '2023-05-04 07:54:10', NULL),
(17, 5, 1, '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(18, 5, 13, '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(19, 5, 14, '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(20, 5, 15, '2023-05-04 07:55:26', '2023-05-04 07:55:26', NULL),
(21, 6, 16, '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(22, 6, 17, '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(23, 6, 18, '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(24, 6, 12, '2023-05-04 07:57:12', '2023-05-04 07:57:12', NULL),
(25, 7, 16, '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(26, 7, 19, '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(27, 7, 20, '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(28, 7, 21, '2023-05-04 07:58:39', '2023-05-04 07:58:39', NULL),
(29, 8, 16, '2023-05-04 08:00:09', '2023-05-04 08:00:09', NULL),
(30, 8, 22, '2023-05-04 08:00:09', '2023-05-04 08:00:09', NULL),
(31, 8, 3, '2023-05-04 08:00:09', '2023-05-04 08:00:09', NULL),
(32, 8, 4, '2023-05-04 08:00:09', '2023-05-04 08:00:09', NULL),
(33, 9, 16, '2023-05-04 08:01:20', '2023-05-04 08:01:20', NULL),
(34, 9, 23, '2023-05-04 08:01:20', '2023-05-04 08:01:20', NULL),
(35, 9, 24, '2023-05-04 08:01:21', '2023-05-04 08:01:21', NULL),
(36, 9, 25, '2023-05-04 08:01:21', '2023-05-04 08:01:21', NULL),
(37, 10, 16, '2023-05-04 08:02:56', '2023-05-04 08:02:56', NULL),
(38, 10, 26, '2023-05-04 08:02:56', '2023-05-04 08:02:56', NULL),
(39, 10, 11, '2023-05-04 08:02:56', '2023-05-04 08:02:56', NULL),
(40, 10, 12, '2023-05-04 08:02:56', '2023-05-04 08:02:56', NULL),
(41, 11, 16, '2023-05-04 08:04:33', '2023-05-04 08:04:33', NULL),
(42, 11, 27, '2023-05-04 08:04:33', '2023-05-04 08:04:33', NULL),
(43, 11, 3, '2023-05-04 08:04:33', '2023-05-04 08:04:33', NULL),
(44, 11, 4, '2023-05-04 08:04:33', '2023-05-04 08:04:33', NULL),
(45, 12, 16, '2023-05-04 08:05:49', '2023-05-04 08:05:49', NULL),
(46, 12, 28, '2023-05-04 08:05:49', '2023-05-04 08:05:49', NULL),
(47, 12, 3, '2023-05-04 08:05:49', '2023-05-04 08:05:49', NULL),
(48, 12, 4, '2023-05-04 08:05:49', '2023-05-04 08:05:49', NULL),
(49, 13, 16, '2023-05-04 08:06:58', '2023-05-04 08:06:58', NULL),
(50, 13, 29, '2023-05-04 08:06:58', '2023-05-04 08:06:58', NULL),
(51, 13, 6, '2023-05-04 08:06:58', '2023-05-04 08:06:58', NULL),
(52, 13, 7, '2023-05-04 08:06:58', '2023-05-04 08:06:58', NULL),
(53, 14, 16, '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(54, 14, 30, '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(55, 14, 14, '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(56, 14, 31, '2023-05-04 08:08:06', '2023-05-04 08:08:06', NULL),
(57, 15, 16, '2023-05-04 08:09:41', '2023-05-04 08:09:41', NULL),
(58, 15, 32, '2023-05-04 08:09:41', '2023-05-04 08:09:41', NULL),
(59, 15, 3, '2023-05-04 08:09:41', '2023-05-04 08:09:41', NULL),
(60, 15, 4, '2023-05-04 08:09:41', '2023-05-04 08:09:41', NULL),
(61, 16, 16, '2023-05-04 08:10:42', '2023-05-04 08:10:42', NULL),
(62, 16, 33, '2023-05-04 08:10:42', '2023-05-04 08:10:42', NULL),
(63, 16, 3, '2023-05-04 08:10:42', '2023-05-04 08:10:42', NULL),
(64, 16, 4, '2023-05-04 08:10:42', '2023-05-04 08:10:42', NULL),
(65, 17, 1, '2023-05-04 08:11:51', '2023-05-04 08:11:51', NULL),
(66, 17, 34, '2023-05-04 08:11:51', '2023-05-04 08:11:51', NULL),
(67, 17, 11, '2023-05-04 08:11:51', '2023-05-04 08:11:51', NULL),
(68, 17, 21, '2023-05-04 08:11:51', '2023-05-04 08:11:51', NULL),
(69, 18, 1, '2023-05-04 08:12:40', '2023-05-04 08:12:40', NULL),
(70, 18, 35, '2023-05-04 08:12:40', '2023-05-04 08:12:40', NULL),
(71, 18, 3, '2023-05-04 08:12:40', '2023-05-04 08:12:40', NULL),
(72, 18, 4, '2023-05-04 08:12:40', '2023-05-04 08:12:40', NULL),
(73, 19, 36, '2023-05-04 08:15:10', '2023-05-04 08:15:10', NULL),
(74, 19, 37, '2023-05-04 08:15:10', '2023-05-04 08:15:10', NULL),
(75, 20, 38, '2023-05-04 08:17:26', '2023-05-04 08:17:26', NULL),
(76, 20, 39, '2023-05-04 08:17:26', '2023-05-04 08:17:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_history`
--

CREATE TABLE `product_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `number_import` int(11) DEFAULT NULL,
  `number_export` int(11) DEFAULT NULL,
  `time_import` timestamp NULL DEFAULT NULL,
  `time_export` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Slide 1', 'upload/slide/2023-05-04_banner1.png', NULL, '2023-05-04 07:45:14', '2023-05-04 07:45:14', NULL),
(2, 'Slide 2', 'upload/slide/2023-05-04_banner2.png', NULL, '2023-05-04 07:45:21', '2023-05-04 07:45:21', NULL),
(3, 'Slide 3', 'upload/slide/2023-05-04_banner3.png', NULL, '2023-05-04 07:45:30', '2023-05-04 07:45:30', NULL),
(4, 'Slide 4', 'upload/slide/2023-05-04_banner4.jpg', NULL, '2023-05-04 07:45:39', '2023-05-04 07:45:39', NULL),
(5, 'Slide 5', 'upload/slide/2023-05-04_banner5.jpg', NULL, '2023-05-04 07:45:50', '2023-05-04 07:45:50', NULL),
(6, 'Slide 6', 'upload/slide/2023-05-04_banner6.jpg', NULL, '2023-05-04 07:45:58', '2023-05-04 07:45:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` bigint(20) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_payment` enum('vnpay','momo','normal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','system_admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `address`, `role`, `status`, `email_verified_at`, `password`, `code`, `time_code`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0969908298', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVki-W_uujCaTvpNM11TDow7Quak0v3sC-4HKViNS4pdPnqUdydTBFn0TQunXiPzQOUM&usqp=CAU', NULL, 'admin', 'active', NULL, '$2y$10$8sC4YfcgPYtNsqV1I8qwT.ReZ5IvUbQ1CZAF1uqE0SEn8tv6Hd/Fa', NULL, NULL, NULL, NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(2, 'Company', 'user@gmail.com', '0964938256', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVki-W_uujCaTvpNM11TDow7Quak0v3sC-4HKViNS4pdPnqUdydTBFn0TQunXiPzQOUM&usqp=CAU', NULL, 'user', 'active', NULL, '$2y$10$KOMNSaB2HipkLkKqF/2ROOWwX/cKHZItNiSAkYEMA2inMbtRfbuhW', NULL, NULL, NULL, NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44'),
(3, 'System Admin', 'phucbo9898@gmail.com', '0969908298', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVki-W_uujCaTvpNM11TDow7Quak0v3sC-4HKViNS4pdPnqUdydTBFn0TQunXiPzQOUM&usqp=CAU', NULL, 'system_admin', 'active', NULL, '$2y$10$vFJilfE4uciDiJQjgNYI5.8/5glxKDLrVwxgIZhEpKh1XixlpQVTa', NULL, NULL, NULL, NULL, '2023-05-04 07:44:44', '2023-05-04 07:44:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_value_attribute_id_foreign` (`attribute_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_attribute`
--
ALTER TABLE `category_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attribute_category_id_foreign` (`category_id`),
  ADD KEY `category_attribute_attribute_id_foreign` (`attribute_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_product_product_id_foreign` (`product_id`),
  ADD KEY `favorite_product_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_transaction_id_foreign` (`transaction_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

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
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Chỉ mục cho bảng `product_history`
--
ALTER TABLE `product_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_history_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category_attribute`
--
ALTER TABLE `category_attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favorite_product`
--
ALTER TABLE `favorite_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `product_history`
--
ALTER TABLE `product_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribute_value_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `category_attribute`
--
ALTER TABLE `category_attribute`
  ADD CONSTRAINT `category_attribute_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_attribute_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD CONSTRAINT `favorite_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_value` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_history`
--
ALTER TABLE `product_history`
  ADD CONSTRAINT `product_history_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
