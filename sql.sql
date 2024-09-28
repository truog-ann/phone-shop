-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2024 at 01:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm_php3`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title_banner`, `created_at`, `updated_at`) VALUES
(1, 'Banner tháng 4', '2024-03-30 08:30:43', '2024-04-03 10:24:45'),
(2, 'Tháng 5', '2024-04-05 12:42:23', '2024-04-05 12:42:23'),
(3, 'Thang 6', '2024-04-06 00:55:18', '2024-04-06 00:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name_cate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_cate`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', NULL, NULL),
(2, 'SamSung', NULL, NULL),
(3, 'Oppo', NULL, NULL),
(4, 'Huawei', NULL, NULL),
(22, 'Xiaomi', '2024-04-06 00:50:29', '2024-04-06 00:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_banners`
--

CREATE TABLE `img_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_id` bigint UNSIGNED NOT NULL,
  `img_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img_banners`
--

INSERT INTO `img_banners` (`id`, `banner_id`, `img_banner`, `created_at`, `updated_at`) VALUES
(9, 1, '1712140008_1.png', '2024-04-03 10:26:48', '2024-04-03 10:26:48'),
(10, 1, '1712140008_Galaxy-S23-series-lo-poster-truoc-ngay-ra-mat-2.jpg', '2024-04-03 10:26:48', '2024-04-03 10:26:48'),
(12, 1, '1712140008_OPPO-F17-1.jpg', '2024-04-03 10:26:48', '2024-04-03 10:26:48'),
(13, 1, '1712140029_Apple-iPhone-15-promo-banner-buy-now-scaled.jpg', '2024-04-03 10:27:09', '2024-04-03 10:27:09'),
(14, 2, '1712320943_bn3.webp', '2024-04-05 12:42:23', '2024-04-05 12:42:23'),
(15, 2, '1712320943_bn2.webp', '2024-04-05 12:42:23', '2024-04-05 12:42:23'),
(16, 2, '1712320943_bn1.webp', '2024-04-05 12:42:23', '2024-04-05 12:42:23'),
(17, 3, '1712364918_bn2.webp', '2024-04-06 00:55:18', '2024-04-06 00:55:18'),
(18, 3, '1712364918_bn1.webp', '2024-04-06 00:55:18', '2024-04-06 00:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_03_28_122607_create_roles_table', 2),
(5, '2024_03_28_123020_create_users_table', 3),
(14, '2024_03_28_124315_create_banners_table', 4),
(15, '2024_03_28_124341_create_categories_table', 4),
(16, '2024_03_28_124458_create_promotions_table', 4),
(17, '2024_03_28_124603_create_img_banners_table', 4),
(18, '2024_03_28_124713_create_products_table', 4),
(19, '2024_03_28_124958_create_orders_table', 5),
(20, '2024_03_28_125150_create_order_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_products` int NOT NULL,
  `total` int DEFAULT NULL,
  `date_order` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `quantity_products`, `total`, `date_order`, `status`, `paid`, `created_at`, `updated_at`) VALUES
(24, 10, 'Truong An', 'truongan2k2tb@gmail.com', 'Ha Noi', '0123456789', 2, 1800000, '2024-04-06', 'Hoàn thành', 1, '2024-04-06 00:52:06', '2024-04-06 00:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_cate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name_product`, `name_cate`, `img`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(22, 24, 'Xiaomi', 'Xiaomi', '1712364665_sp5.webp', 900000, 2, 1800000, '2024-04-06 00:52:06', '2024-04-06 00:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_prod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `price_promotion` int NOT NULL,
  `cate_id` bigint UNSIGNED NOT NULL,
  `promotion_id` bigint UNSIGNED NOT NULL,
  `views` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `img_prod`, `quantity`, `desc`, `price`, `price_promotion`, `cate_id`, `promotion_id`, `views`, `created_at`, `updated_at`) VALUES
(22, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', '1712321178_iphone-15-pro-max_3.webp', 18, 'iPhone 15 Pro Max thiết kế mới với chất liệu titan chuẩn hàng không vũ trụ bền bỉ, trọng lượng nhẹ, đồng thời trang bị nút Action và cổng sạc USB-C tiêu chuẩn giúp nâng cao tốc độ sạc. Khả năng chụp ảnh đỉnh cao của iPhone 15 bản Pro Max đến từ camera chính 48MP, camera UltraWide 12MP và camera telephoto có khả năng zoom quang học đến 5x. Bên cạnh đó, iPhone 15 ProMax sử dụng chip A17 Pro mới mạnh mẽ. Xem thêm chi tiết những điểm nổi bật của sản phẩm qua thông tin sau!', 30000000, 27000000, 1, 3, 1, '2024-04-05 12:46:18', '2024-04-06 01:35:53'),
(23, 'iPhone 13 128GB | Chính hãng VN/A', '1712321284_iphone-13_2_.webp', 17, 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học\r\nTối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút', 13900000, 13400000, 1, 4, 1, '2024-04-05 12:48:04', '2024-04-06 01:38:36'),
(24, 'iPhone 15 128GB | Chính hãng VN/A', '1712321363_iphone-15-plus_1__1.webp', 50, 'Thiết kế thời thượng và bền bỉ - Mặt lưng kính được pha màu xu hướng cùng khung viền nhôm bền bỉ\r\nDynamic Island hiển thị linh động mọi thông báo ngay lập tức giúp bạn nắm bắt mọi thông tin\r\nChụp ảnh đẹp nức lòng - Camera chính 48MP, Độ phân giải lên đến 4x và Tele 2x chụp chân dung hoàn hảo\r\nPin dùng cả ngày không lắng lo - Thời gian xem video lên đến 20 giờ và sạc nhanh qua cổng USB-C tiện lợi\r\nCải tiến hiệu năng vượt bậc - A16 Bionic mạnh mẽ giúp bạn cân mọi tác vụ dù có yêu cầu đồ hoạ cao', 19000000, 19000000, 1, 1, 0, '2024-04-05 12:49:23', '2024-04-05 12:49:23'),
(25, 'iPhone 14 Pro Max 128GB | Chính hãng VN/A', '1712321455_iphone-14-pro_2__5.webp', 15, 'Màn hình Dynamic Island - Sự biến mất của màn hình tai thỏ thay thế bằng thiết kế viên thuốc, OLED 6,7 inch, hỗ trợ always-on display\r\nCấu hình iPhone 14 Pro Max mạnh mẽ, hiệu năng cực khủng từ chipset A16 Bionic\r\nLàm chủ công nghệ nhiếp ảnh - Camera sau 48MP, cảm biến TOF sống động\r\nPin liền lithium-ion kết hợp cùng công nghệ sạc nhanh cải tiến', 27000000, 24300000, 1, 3, 0, '2024-04-05 12:50:55', '2024-04-05 12:50:55'),
(26, 'iPhone 15 Plus 128GB | Chính hãng VN/A', '1712321525_iphone-15-plus_1_.webp', 20, 'Thiết kế dẫn đầu xu hướng - Nhiều màu sắc trendy cùng chất liệu kính pha màu và khung nhôm vô cùng bền bỉ\r\nNắm bắt và tương tác mọi thông tin dễ dàng hơn với Dynamic Island mở rộng\r\nChụp ảnh chân dung xuất sắc mọi khoảnh khắc - Camera chính 48MP với tele 2X và chế độ chỉnh sửa đa dạng\r\nHiệu năng cân mọi tác vụ - A16 Bionic mạnh mẽ cho mọi thao tác mượt mà và nhanh chóng', 22790000, 22790000, 1, 1, 0, '2024-04-05 12:52:05', '2024-04-05 12:52:05'),
(27, 'iPhone 15 Pro 128GB | Chính hãng VN/A', '1712321593_iphone-15-pro-max_4.webp', 100, 'Thiết kế khung viền từ titan mới - Vật liệu cực nhẹ, bền cùng viền cạnh mỏng cho cảm giác cầm nắm thoải mái\r\nLuôn mạnh mẽ ở bất kì tác vụ nào với Chip A17 Pro cho đồ họa có độ phân giải cao nhưng tiêu thụ điện năng ít hơn\r\nDynamic Island hiển thị linh động các cảnh báo giúp bạn không bỏ lỡ thông tin nào\r\nBắt trọn khoảng khắc bạn yêu - Cụm 3 camera sau đến 48MP chụp đêm và chân dung hoàn hảo\r\nNút tác vụ mới giúp nhanh chóng kích hoạt tính năng yêu thích của bạn', 25490000, 24990000, 1, 4, 0, '2024-04-05 12:53:13', '2024-04-05 12:53:13'),
(28, 'Samsung Galaxy S24 Ultra 12GB 256GB', '1712321707_sp1.webp', 200, 'Mở khoá giới hạn tiềm năng với AI - Hỗ trợ phiên dịch cuộc gọi, khoanh vùng tìm kiếm, Trợ lí Note và chình sửa anh\r\nTuyệt tác thiết kế bền bỉ và hoàn hảo - Vỏ ngoài bằng titan mới cùng màu sắc lấy cảm hứng từ chất liệu đá tự nhiên\r\nTích hợp S-Pen cực nhạy - Thoải mát viết, chạm thật chính xác trên màn hình cùng nhiều tính năng tiện ích\r\nNắm trong tay trọn bộ chi tiết chân thực nhất - Camera 200MP hỗ trợ khả năng xử lý AI cải thiện độ nét và tông màu', 27000000, 26500000, 2, 4, 0, '2024-04-05 12:55:07', '2024-04-05 12:55:07'),
(29, 'Samsung Galaxy S23 Ultra 256GB', '1712321745_sp2.webp', 50, 'Thoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh\r\nChiến game bùng nổ - chip Snapdragon 8 Gen 2 8 nhân tăng tốc độ xử lí, màn hình 120Hz, pin 5.000mAh\r\nNâng cao hiệu suất làm việc với Siêu bút S Pen tích hợp, dễ dàng đánh dấu sự kiện từ hình ảnh hoặc video\r\nThiết kế bền bỉ, thân thiện - Màu sắc lấy cảm hứng từ thiên nhiên, chất liệu kính và lớp phim phủ PET tái chế', 22890000, 22890000, 2, 1, 0, '2024-04-05 12:55:45', '2024-04-05 12:55:45'),
(30, 'Samsung Galaxy Z Flip5 512GB', '1712321782_sp3.webp', 100, 'Thần thái nổi bật, cân mọi phong cách- Lấy cảm hứng từ thiên nhiên với màu sắc thời thượng, xu hướng\r\nThiết kế thu hút ánh nhìn - Gập không kẽ hỡ, dẫn đầu công nghệ bản lề Flex\r\nTuyệt tác selfie thoả sức sáng tạo - Camera sau hỗ trợ AI xử lí cực sắc nét ngay cả trên màn hình ngoài\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IPX8 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước', 20000000, 18000000, 2, 3, 0, '2024-04-05 12:56:22', '2024-04-05 12:56:22'),
(31, 'Samsung Galaxy Z Fold5 12GB 256GB', '1712321822_sp4.webp', 19, 'Thiết kế tinh tế với nếp gấp vô hình - Cải tiến nếp gấp thẩm mĩ hơn và gập không kẽ hở\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IPX8 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước\r\nMở ra không gian giải trí cực đại với màn hình trong 7.6\"\" cùng bản lề Flex dẫn đầu công nghệ\r\nThoải mái sáng tạo mọi lúc - Bút Spen tiện dụng giúp bạn phác hoạ và ghi chép không cần đến sổ tay\r\nHiệu năng cân mọi tác vụ - Snapdragon® 8 Gen 2 for Galaxy xử lí mượt mà, đa nhiệm mượt mà', 32000000, 31500000, 2, 4, 1, '2024-04-05 12:57:02', '2024-04-05 13:08:30'),
(32, 'Samsung Galaxy A55 5G 8GB 128GB', '1712321854_sp5.webp', 10, 'Chip Exynos 1480 4nm - Sử dụng mượt mà, linh hoạt với các tác vụ nặng nề mà không gặp trở ngại.\r\nVới camera góc rộng 12MP mang đến khả năng thu trọn mọi khung cảnh vào khung hình.\r\nTần số quét 120Hz - Mỗi hành động trên màn hình đều trở nên mượt mà đáng kinh ngạc.\r\nPin 5000 mAh kết hợp cùng sạc nhanh 25W - Sử dụng thoải mái trong mọi hoạt động hằng ngày.', 10000000, 9000000, 2, 3, 0, '2024-04-05 12:57:34', '2024-04-05 12:57:34'),
(33, 'Xiaomi 14 (12GB 256GB)', '1712321946_sp1.webp', 20, 'Mạnh mẽ cân mọi tác vụ, đa nhiệm cực đỉnh - Chip Snapdragon 8 Gen 3 (4nm) mượt mà đi kèm RAM 12GB\r\nTrải nghiệm hình ảnh sống động - Màn hình 6.36” vừa vặn, công nghệ LTPO OLED, tần số quét 120Hz\r\nTuyệt tác camera, chụp ảnh sắc nét - Bộ 3 camera 50MP ống kính Leica cùng chống rung OIS\r\nNăng lượng tràn đầy, thoả sức sức tạo - Dung lượng pin lớn 4610mAh, sạc nhanh 90W', 21000000, 20500000, 4, 4, 0, '2024-04-05 12:59:06', '2024-04-05 12:59:06'),
(34, 'Xiaomi Redmi Note 12 8GB 128GB', '1712321978_sp2.webp', 50, 'Trải nghiệm hình ảnh mượt mà và liền mạch nhờ tốc độ làm mới cao 120Hz.\r\nHiệu năng vượt trội và được tăng cường với chip xử lý Snapdragon® 685 6nm mạnh mẽ.\r\nNăng lượng cho cả ngày dài nhờ vào viên pin lên đến 5000mAh đi kèm sạc nhanh 33W\r\nBắt trọn mọi khoảnh khắc của bạn với bộ 3 camera 50MP.', 4290000, 4290000, 4, 1, 0, '2024-04-05 12:59:38', '2024-04-05 12:59:38'),
(35, 'Xiaomi Redmi Note 13 Pro 4G', '1712322018_sp3.webp', 40, 'Thu hút mọi ánh nhìn với thiết kế đẹp mắt, mặt lưng và khung nhựa nhẹ được làm bóng.\r\nCông nghệ âm thanh Dolby Atmos - Trải nghiệm âm thanh sống động, chi tiết và mạnh mẽ.\r\nMàn hình lớn Full HD+ đi kèm tần số quét cao 120 Hz - Cho phép người dùng tận hưởng mọi chi tiết một cách rõ ràng.\r\nHiệu năng mạnh mẽ, phù hợp với nhu cầu sử dụng đa nhiệm của người dùng hiện nay với chip MediaTek Helio G99-Ultra.', 7000000, 6300000, 4, 3, 0, '2024-04-05 13:00:18', '2024-04-05 13:00:18'),
(36, 'Xiaomi Redmi Note 13 6GB 128GB', '1712322060_sp4.webp', 20, 'Bắt trọn khoảnh khắc - Cụm camera đến 108MP mạnh mẽ cùng khả năng thu phóng 3x\r\nMàn hình đẳng cấp - Kích thước lớn 6.67\" AMOLED 120hz cuộn lướt mượt mà\r\nHiệu suất ổn định, đa nhiệm dễ dàng - Snapdragon 685 8 nhân cùng RAM 6GB\r\nTrải nghiệm cả ngày không lo lắng - pin 5000mAh cùng sạc nhanh 33W', 4690000, 4690000, 4, 1, 0, '2024-04-05 13:01:00', '2024-04-05 13:01:00'),
(37, 'Xiaomi 13T Pro 5G (12GB - 512GB)', '1712322093_sp5.webp', 50, 'Nhiếp ảnh chuyên ngiệp, nắm giữ tuyệt tác trong tầm tay - Cụm camera đến, ống kính Leica với 2 phong cách ảnh\r\nHiệu năng bất chấp mọi tác vụ - Bộ vi xử lý Dimensity 9200+ Ultra mạnh mẽ cùng RAM 12GB cho đa nhiệm mượt mà\r\nNăng lượng bất tận cả ngày - Pin 5000mAh cùng sạc nhanh 120W, sạc đầy chỉ trong 19 phút\r\nMàn hình sáng rực rỡ, cuộn lướt thật mượt mà - Màn hình 144hz cùng công nghệ AMOLED CrystalRes', 15000000, 14500000, 4, 4, 0, '2024-04-05 13:01:33', '2024-04-05 13:01:33'),
(38, 'OPPO Reno11 F 5G 8GB 256GB', '1712322178_sp1.webp', 20, 'Thoải mái sáng tạo nhiếp ảnh - Với cụm 3 camera lên đến 64MP đi kèm nhiều tính năng chỉnh sửa thú vị\r\nRực rỡ mọi góc nhìn - Màn hình AMOLED 120Hz, cùng khả năng hiển thị trên 1 tỉ màu\r\nGiải trí mượt mà, đa dạng tác vụ - Chip xử lí mạnh mẽ Dimensity 7050 5G cùng RAM 8GB\r\nNăng lượng bền bỉ cả ngày dài - Pin lớn 5.000mAh cùng chế độ sạc nhanh 67W', 8900000, 8400000, 3, 4, 0, '2024-04-05 13:02:58', '2024-04-05 13:02:58'),
(39, 'OPPO Reno10 5G 8GB 256GB', '1712322219_sp2.webp', 50, 'Chuyên gia chân dung thế hệ thứ 10 - Camera chân dung 32MP siêu nét, chụp xa từ 2X-5X không lo biến dạng khung hình\r\nThiết kế nổi bật, dẫn đầu xu hướng - Cạnh viền cong 3D, các phiên bản màu sắc phù hợp đa cá tính, thu hút mọi ánh nhìn\r\nĐa nhiệm mạnh mẽ hơn ai hết - RAM mở rộng 8GB, ROM 256GB mang đến trải nghiệm đa tác vụ thoải mái\r\nPin bất tận, sạc siêu tốc - pin 5000mAh và sạc nhanh 67W cùng chế độ tiết kiệm pin siêu tiện ích', 9000000, 8100000, 3, 3, 0, '2024-04-05 13:03:39', '2024-04-05 13:03:39'),
(40, 'OPPO A77s 8GB 128GB', '1712322245_sp3.webp', 50, 'Nâng tầm trải nghiệm thị giác - Tấm nền IPS LCD với kích thước 6.56 inch, tần số quét 90Hz\r\nNăng lượng tiếp sức cho cả ngày dài - 5000 mAh, sạc siêu nhanh SuperVOOC 33 W\r\nLong lanh từ trong ra ngoài với thiết kế OPPO Glow, mặt lưng hoàn thiện từ thủy tinh hữu cơ\r\nTrải nghiệm ổn định mọi tác vụ - Chip Snapdragon 680 8, RAM 8 GB và khả năng mở rộng RAM', 5000000, 5000000, 3, 1, 0, '2024-04-05 13:04:05', '2024-04-05 13:04:05'),
(41, 'OPPO A58 4G 6GB 128GB', '1712322298_sp4.webp', 50, 'Trang bị chip Helio G85 đáp ứng nhu cầu giải trí hàng ngày của bạn một cách dễ dàng hơn.\r\nNăng lượng bền bỉ từ sáng đến đêm với pin 5000mAh kết hợp cùng công nghệ sạc nhanh 33W.\r\nTrang bị cụm 2 camera với camera chính 50MP - Chụp ảnh sắc nét và quay video chất lượng tốt.\r\nTận hưởng cảm giác mượt mà với màn hình hiển thị sáng chân thực IPS LCD.', 5490000, 4990000, 3, 4, 0, '2024-04-05 13:04:58', '2024-04-05 13:04:58'),
(42, 'OPPO Find N3 16GB 512GB', '1712322332_sp5.webp', 99, 'Bậc thầy thiết kế, siêu mỏng nhe - Mỏng chỉ 239g, nhẹ chỉ 5.8mm với nếp gấp tàng hình\r\nRực rõ mọi màn hình hiển thị - Kích thước lên đến 7.8mm, độ phân giải 2K+ cùng tần số quét 120Hz mượt mà\r\nBậc thầy nhiếp ảnh - 3 camera hàng đầu đến 64MP kết hợp cùng đa dạng chế độ chụp hoàn hảo\r\nNâng cao hiệu suất sử dụng - Chip MediaTek Dimensity 9200 5G mạnh mẽ cùng hàng loạt tính năng đa nhiệm thông tinh', 44000000, 39600000, 3, 3, 1, '2024-04-05 13:05:33', '2024-04-05 13:08:30'),
(43, 'Xiaomi', '1712364665_sp5.webp', 8, 'Ko co', 1000000, 1000000, 22, 3, 1, '2024-04-06 00:51:05', '2024-04-06 01:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `title_promotion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title_promotion`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'Không khuyến mại', '2024-03-30', '2030-01-01', '2024-03-29 03:31:02', '2024-03-29 03:31:02'),
(3, 'Giảm 10%', '2024-04-04', '2024-04-10', '2024-04-03 11:22:24', '2024-04-03 11:22:24'),
(4, 'Giảm 500k', '2024-04-06', '2024-04-10', '2024-04-05 12:39:40', '2024-04-05 12:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-03-28 05:35:41', '2024-03-28 05:35:41'),
(2, 'staff', '2024-03-28 05:36:01', '2024-03-28 05:36:01'),
(3, 'user', '2024-03-28 05:37:25', '2024-03-28 05:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_user`, `email`, `password`, `phone`, `address`, `role_id`, `created_at`, `updated_at`) VALUES
(8, 'Truong An', 'annttph29957@fpt.edu.vn', '$2y$10$9doFFPIhxr4rPyOiYXOF4ezq33f8wewM7TdretG1GDUxo9WSMPHry', '0123456789', 'Trinh Van Bo', 1, '2024-04-04 19:04:46', '2024-04-05 13:08:22'),
(10, 'Truong An', 'truongan2k2tb@gmail.com', '$2y$10$/ljU5rYcUZRaQCFhtOto6.lXR303NIgbW7.l8Wwd//NAOjB8MdGwC', '0123456789', 'Ha Noi', 2, '2024-04-06 00:51:47', '2024-04-06 00:54:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `img_banners`
--
ALTER TABLE `img_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_banners_banner_id_foreign` (`banner_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`),
  ADD KEY `products_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_banners`
--
ALTER TABLE `img_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `img_banners`
--
ALTER TABLE `img_banners`
  ADD CONSTRAINT `img_banners_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
