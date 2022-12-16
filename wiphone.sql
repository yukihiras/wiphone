-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220620.e708520a97
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 16, 2022 lúc 04:58 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wiphone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Banner Iphone', 'uploadWebImage/1669996268_iphone-13-webbbb-123.png', '2022-12-02 08:51:08', '2022-12-02 08:51:08'),
(2, 'Banner Xiaomi', 'uploadWebImage/1670127377_xiaomi-thang-11-1200x382.jpg', '2022-12-03 21:16:17', '2022-12-03 21:16:17'),
(3, 'Banner Samsung', 'uploadWebImage/1670127390_web-galaxy-tab-01.jpg', '2022-12-03 21:16:30', '2022-12-03 21:16:30'),
(4, 'Banner Amazfit', 'uploadWebImage/1670128287_amazfit-gts-2-mini-1200x382_638052538895921506.jpg', '2022-12-03 21:31:27', '2022-12-03 21:31:27'),
(6, 'Banner Vivo', 'uploadWebImage/1670161344_landing-pre-order-v25-pro-1200x382.jpg', '2022-12-04 06:42:24', '2022-12-04 06:42:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', '2022-12-02 06:42:49', '2022-12-02 06:42:49'),
(2, 'Samsung', '2022-12-02 06:42:54', '2022-12-02 06:42:54'),
(3, 'Iphone', '2022-12-02 06:42:59', '2022-12-02 06:42:59'),
(4, 'Oppo', '2022-12-02 07:11:15', '2022-12-02 07:11:15'),
(5, 'Vivo', '2022-12-02 08:27:52', '2022-12-02 08:27:52'),
(6, 'Realme', '2022-12-03 23:14:11', '2022-12-03 23:14:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(107, '2014_10_12_000000_create_users_table', 1),
(108, '2014_10_12_100000_create_password_resets_table', 1),
(109, '2019_08_19_000000_create_failed_jobs_table', 1),
(110, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(111, '2022_11_15_065943_create_roles_table', 1),
(112, '2022_11_15_070052_create_orders_table', 1),
(113, '2022_11_15_070242_create_order_detail_table', 1),
(114, '2022_11_15_070319_create_banner_table', 1),
(115, '2022_11_15_070338_create_comments_table', 1),
(116, '2022_11_20_020734_create_categories_table', 1),
(117, '2022_11_20_021100_create_products_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPrice` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customerName`, `address`, `phoneNumber`, `email`, `description`, `totalPrice`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Đỗ Minh Thành', 'Hà Nội', '01654135241', 'thanhdo12a10@gmail.com', 'Mua 2 iphone', 152000000, 1, '2022-12-02 19:44:32', '2022-12-02 19:44:32'),
(2, 'Bùi Vân Nga', 'Thanh xuân', '076465466', 'nga12124@gmail.com', 'Mua 1 cái xiaomi', 17500000, 5, '2022-12-02 19:45:13', '2022-12-02 19:45:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `cate_id`, `created_at`, `updated_at`) VALUES
(6, 'iPhone 11 - 128GB', 11200000, 'uploadWebImage/1670122355_anh-chup-man-hinh-2022-09-08-luc-01-59-53-removebg-preview.png', 'iPhone 11 vẫn sở hữu thiết kế tràn viền với “tai thỏ” giống iPhone X. Viền bezel phía trên và dưới cũng được làm gọn lại nhằm tối đa màn hình sử dụng. Cùng với đó, 4 góc của máy cũng được bo tròn nhẹ tạo cảm giác chắc chắn khi cầm trên tay. Mặt lưng iPhone 11 làm từ chất liệu kính nên rất sang trọng, tinh tế. Khác với các dòng iPhone trước, sản phẩm này sẽ có 6 màu bản bạc, vàng, xanh lá, trắng, đen đỏ.\r\n\r\nCông nghệ màn hình LCD Retina mang đến chất lượng tốt nhất. Độ phân giải màn hình 1125 x 2436 pixels hiển thị màu sắc chính xác và cho hình ảnh sắc nét. Màn hình rộng 6.1 inch giúp người sử dụng thoải mái trải nghiệm xem phim, lướt web… Đặc biệt Apple đã trang bị tần số quét từ 90 đến 120 Hz với 463 điểm màu.', 3, '2022-12-03 19:52:35', '2022-12-03 19:52:35'),
(7, 'Vivo V23e', 5690000, 'uploadWebImage/1670133754_image-removebg-preview-7.png', 'Đối với một chiếc smartphone hiện nay, camera chính là yếu tố được chú ý tới nhiều nhất. Tiếp nối ưu điểm của các sản phẩm Vivo, Vivo V23e càng chú trọng nhiều hơn vào hệ thống camera.\r\n\r\nVivo V23e cũng không chịu kém cạnh những đàn anh với danh hiệu “camera selfie 50MP đầu tiên trên thế giới”. Đi kèm thông số ấn tượng sẽ là phần mềm thông minh. Chúng ta sẽ có rất nhiều lựa chọn phù hợp trong chế độ Làm đẹp. Máy sẽ gợi ý các tùy chọn góc nghiêng, chụp một mình hoặc cho tập thể,… khá thú vị. Ở chế độ này, làn da sẽ được làm mịn hơn, màu da vẫn khá tự nhiên, cho ra các bức ảnh lung linh.', 5, '2022-12-03 23:02:34', '2022-12-03 23:02:34'),
(8, 'Samsung Galaxy Z Fold4', 39650000, 'uploadWebImage/1670133824_image-removebg-preview-49.png', 'Có lẽ điện thoại Samsung Galaxy Z Fold mới sẽ không có những thay đổi lớn về thiết kế so với phiên bản tiền nhiệm. Điều này tương đối dễ hiểu bởi các hãng smartphone hiện nay có xu hướng sẽ không liên tục thay đổi các thiết kế điện thoại của mình, nhất là khi chúng có sự thay đổi lớn về thiết kế.', 2, '2022-12-03 23:03:44', '2022-12-03 23:03:44'),
(9, 'Xiaomi 12 Pro', 21990000, 'uploadWebImage/1670133885_image-removebg-preview_637875529202208799.png', 'Điện thoại cao cấp Xiaomi 12 Pro với kích thước lần lượt là 163.60x 74.60 x 8.16mm và trọng lượng 205g, các góc cạnh của điện thoại được thiết kế theo hướng bo tròn vô cùng mượt mà, tinh tế đem lại cảm giác mượt mịn trên tay. Ba màu sắc rực rỡ đi kèm với Xiaomi 12 Pro đó là xanh dương, tím và xám tạo nên sự mới mẻ và gây được ấn tượng nổi bật đầu tiên với bất kỳ ai sử dụng chúng. \r\n\r\nMặt trước của sản phẩm là màn hình 120Hz được trang bị kính cường lực Corning Gorilla Victus để tránh va đập. Trong khi mặt sau nổi bật là cụm camera đặc trưng được làm bằng kim loại cao cấp thu hút mọi ánh mắt của người đối diện. Nhìn chung, Xiaomi đã thành công trong việc nâng tầm một flagship chuẩn chất hiện đại, làm tô điểm phong cách cho mọi đối tượng đang sở hữu chúng.', 1, '2022-12-03 23:04:45', '2022-12-03 23:04:45'),
(10, 'Xiaomi Note 9', 3990000, 'uploadWebImage/1670134084_thumb-a94.png', 'Xiaomi Redmi Note 9 là một đại diện mới trong gia đình Redmi năm nay. Redmi Note 9 hội tụ tất cả những gì con người cần ở một chiếc smartphone và có thể đáp ứng nhu cầu đa dạng của người tiêu dùng trong cuộc sống hàng ngày.', 1, '2022-12-03 23:08:04', '2022-12-03 23:08:04'),
(11, 'OPPO A55', 3950000, 'uploadWebImage/1670134135_image-removebg-preview-12.png', 'Gần đây, mẫu điện thoại di động OPPO A55 chính thức được OPPO ra mắt đã khiến cho cộng đồng người yêu công nghệ thích thú.', 4, '2022-12-03 23:08:55', '2022-12-03 23:08:55'),
(12, 'Realme C35 - 4GB/128GB', 4490000, 'uploadWebImage/1670134525_realmec35.png', 'Realme hiện đang là một trong những hãng điện thoại được nhiều người dùng săn đón và yêu thích. Hãy cùng tìm hiểu em điện thoại mới được  Realme ra mắt trong thời gian gần đây - Realme C35 - 4GB/128GB nhé!', 6, '2022-12-03 23:15:25', '2022-12-03 23:15:25'),
(13, 'Samsung Galaxy A73 5G', 9890000, 'uploadWebImage/1670134590_image-removebg-preview-2.png', 'Điện thoại Samsung Galaxy A73 5G sử dụng kiểu thiết kế Ambient EDGE tạo ra tổng thể mỏng và đối xứng hoàn hảo mà vẫn đảm bảo được các yếu tố về cấu hình bên trong không bị cắt giảm. Viền điện thoại được thiết kế siêu mỏng cùng các góc cạnh bo tròn tạo cho người dùng trải nghiệm cầm nắm rất đằm tay, thoải mái dùng trong cả ngày dài.', 2, '2022-12-03 23:16:30', '2022-12-03 23:16:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-12-02 06:29:14', '2022-12-02 06:29:14'),
(2, 'nhân viên', '2022-12-02 06:29:19', '2022-12-02 06:29:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `avatar`, `phoneNumber`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thanh1709', 'thanhdo12a10@gmail.com', 'uploadWebImage/1669988195_luffylogo.jpg', '041654351', '$2y$10$YKK3XbRYn/7VELlXiwdjce2Mn6P6bItecKyV5.ljVUrSerorrIlB2', 1, NULL, '2022-12-02 13:26:00', '2022-12-02 13:26:00'),
(3, 'minhle56453', 'leminhnhat123@gmail.com', 'uploadWebImage/1669988401_franky.png', '07453435', '$2y$10$NmTQrdej38iNGvGGa63L0uKq7uffnqYah4eNe1N2mP9ojz6y0Gd5.', 2, NULL, '2022-12-02 06:40:01', '2022-12-02 06:40:01'),
(4, 'poly123456', 'poly@gmail.com', 'uploadWebImage/1669995027_namilogo.jpg', '03213416515', '$2y$10$Qr50ml9zrxlybth8TjPcM.H0Ic49zmXyx2IgGo.w2Tx8nlKRq.exa', 2, NULL, '2022-12-02 08:30:27', '2022-12-02 08:30:27'),
(5, 'nga123153', 'nga12124@gmail.com', 'uploadWebImage/1669996085_robinlogo.png', '01654135241', '$2y$10$DxkSpSszIOp7kYPop6ioJ.64ueNDArksmAtCRDahbGRyv.hk1C10y', 2, NULL, '2022-12-02 08:47:57', '2022-12-02 08:47:57'),
(6, 'zoro', 'hidekiyuta1231@gmail.com', 'uploadWebImage/1670936029_zorologo.png', '045313165', '$2y$10$8fsznvnjULZSli3VknjAjuVfBlsWnzsLY0noz0f6Pd8eumxQpIfZe', 2, NULL, '2022-12-13 05:53:49', '2022-12-13 05:53:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
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
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
