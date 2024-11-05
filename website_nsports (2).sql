-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2024 lúc 06:59 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_nsports`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `cartegory_id`, `brand_name`) VALUES
(20, 6, 'Áo đội tuyển quốc gia'),
(21, 6, 'Áo câu lạc bộ'),
(22, 7, 'Giày đá bóng futsal'),
(23, 7, 'Giày đá bóng sân cỏ tự nhiên'),
(24, 7, 'Giày đá bóng sân cỏ nhân tạo'),
(25, 8, 'Giày cầu lông'),
(26, 8, 'Giày chay bộ'),
(27, 9, 'Áo khoác câu lạc bộ'),
(28, 9, 'Áo khoác gió'),
(29, 10, 'Banh bóng đá'),
(30, 10, 'Tất, vớ thể thao'),
(31, 10, 'Vợt cầu lông'),
(32, 6, 'Áo custom');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(6, 'Áo Quần Bóng Đá'),
(7, 'Giày Bóng Đá'),
(8, 'Giày Thể Thao'),
(9, 'Áo Khoác Thể Thao'),
(10, 'Phụ Kiện Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_data_keyseach`
--

CREATE TABLE `tbl_data_keyseach` (
  `id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `key_seach` varchar(100) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_data_keyseach`
--

INSERT INTO `tbl_data_keyseach` (`id`, `email`, `key_seach`, `create_at`) VALUES
(1, 'hieu@gmail.com', 'Áo', '2024-10-28'),
(2, 'hieu@gmail.com', 'giày thể thao', '2024-10-28'),
(8, 'hieu@gmail.com', 'Quần', '2024-10-28'),
(9, 'hieu@gmail.com', 'giày thể thao', '2024-10-29'),
(10, 'hieu@gmail.com', 'Quần', '2024-10-29'),
(12, 'hieu@gmail.com', 'Quần', '2024-10-29'),
(13, 'hieu@gmail.com', 'giày', '2024-10-29'),
(14, 'hieu@gmail.com', 'áo', '2024-10-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_data_log_user`
--

CREATE TABLE `tbl_data_log_user` (
  `id` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `time_spent` int(255) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_data_log_user`
--

INSERT INTO `tbl_data_log_user` (`id`, `email`, `product_id`, `time_spent`, `create_at`) VALUES
(2, 'hieu@gmail.com', 11, 9, '2024-10-31'),
(3, 'hieu@gmail.com', 14, 5, '2024-10-31'),
(4, 'hieu@gmail.com', 15, 3, '2024-10-31'),
(5, 'hieu@gmail.com', 14, 2, '2024-10-31'),
(6, 'hieu@gmail.com', 20, 7, '2024-11-01'),
(7, 'hieu@gmail.com', 19, 1, '2024-11-02'),
(8, 'hieu@gmail.com', 23, 6, '2024-11-02'),
(9, 'hieu@gmail.com', 18, 1, '2024-11-02'),
(10, 'hieu@gmail.com', 19, 4, '2024-11-02'),
(11, 'hieu@gmail.com', 15, 3, '2024-11-02'),
(12, 'hieu@gmail.com', 18, 3, '2024-11-02'),
(13, 'hieu@gmail.com', 23, 8, '2024-11-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_oder`
--

CREATE TABLE `tbl_oder` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `order_code` int(20) NOT NULL,
  `price` int(110) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `deliveryAddress` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_id` int(110) NOT NULL,
  `day_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_oder`
--

INSERT INTO `tbl_oder` (`id`, `email`, `phone`, `order_code`, `price`, `payment_method`, `payment_status`, `deliveryAddress`, `quantity`, `product_id`, `day_create`) VALUES
(11, 'hieu@gmail.com', '0975816808', 22321, 500000, 'COD', 'Đã thanh toán', 'Hà nội', 1, 14, '2024-10-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_new` varchar(255) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cartegory_id`, `brand_id`, `product_price`, `product_price_new`, `product_desc`, `product_img`) VALUES
(11, 'Áo Bóng Đá Đội Tuyển Bỉ Bã Trầu Euro 2024', 6, 20, '500000', '249000', 'Áo Bóng Đá Sân Nhà Đội Tuyển Bỉ Bã Trầu Euro 2024', 'sp1.1.jpg'),
(14, 'Áo Bóng Đá AL Nassr Trắng 2023-2024', 6, 21, '300000', '149000', 'N-SPORTS - Cung cấp áo bóng đá và phụ kiện thể thao.\n\nChuyên nghiệp và uy tín hàng đầu!\n\nCam kết chất lượng và giá cả cực tốt, sp như hình 100%\n\nChất liệu thun lạnh cao cấp, co dãn tốt, thấm hút mồ hôi tốt\n\nĐa dạng về mẫu mã, phong phú về màu sắc, luôn cập nhật các mẫu HOT nhất thị trường\n\nPhom dáng chuẩn người VN, đường may tỉ mỉ, độ hoàn thiện cao, Logo được thêu chắc chắn\n\nHãy mua hàng và trải nghiệm chất lượng sản phẩm shop mang lại nhé !', '1.jpg'),
(15, 'Áo Bóng Đá Manchester City sân nhà 2024-2025', 6, 21, '300000', '159000', 'N-SPORTS - Cung cấp áo bóng đá và phụ kiện thể thao.\r\n\r\nChuyên nghiệp và uy tín hàng đầu!\r\n\r\nCam kết chất lượng và giá cả cực tốt, sp như hình 100%\r\n\r\nChất liệu thun lạnh cao cấp, co dãn tốt, thấm hút mồ hôi tốt\r\n\r\nĐa dạng về mẫu mã, phong phú về màu sắc, luôn cập nhật các mẫu HOT nhất thị trường\r\n\r\nPhom dáng chuẩn người VN, đường may tỉ mỉ, độ hoàn thiện cao, Logo được thêu chắc chắn\r\n\r\nHãy mua hàng và trải nghiệm chất lượng sản phẩm shop mang lại nhé !', 'mc1.jpg'),
(16, 'Banh đá bóng chất lượng', 10, 29, '300000', '199000', 'N-SPORTS - Cung cấp áo bóng đá và phụ kiện thể thao.\r\n\r\nChuyên nghiệp và uy tín hàng đầu!\r\n\r\nCam kết chất lượng và giá cả cực tốt, sp như hình 100%\r\n\r\nChất liệu thun lạnh cao cấp, co dãn tốt, thấm hút mồ hôi tốt\r\n\r\nĐa dạng về mẫu mã, phong phú về màu sắc, luôn cập nhật các mẫu HOT nhất thị trường\r\n\r\nPhom dáng chuẩn người VN, đường may tỉ mỉ, độ hoàn thiện cao, Logo được thêu chắc chắn\r\n\r\nHãy mua hàng và trải nghiệm chất lượng sản phẩm shop mang lại nhé !', 'bong (1).jpg'),
(18, 'Giày đá bóng sân cỏ nhân tao', 7, 24, '600000', '349000', 'N-SPORTS - Cung cấp áo bóng đá và phụ kiện thể thao.\r\n\r\nChuyên nghiệp và uy tín hàng đầu!\r\n\r\nCam kết chất lượng và giá cả cực tốt, sp như hình 100%\r\n\r\nChất liệu thun lạnh cao cấp, co dãn tốt, thấm hút mồ hôi tốt\r\n\r\nĐa dạng về mẫu mã, phong phú về màu sắc, luôn cập nhật các mẫu HOT nhất thị trường\r\n\r\nPhom dáng chuẩn người VN, đường may tỉ mỉ, độ hoàn thiện cao, Logo được thêu chắc chắn\r\n\r\nHãy mua hàng và trải nghiệm chất lượng sản phẩm shop mang lại nhé !', 'giaysannhantao (1).jpg'),
(19, 'Áo Bóng Đá Real Madrid sân nhà 2024-2025', 6, 21, '300000', '149000', 'N-SPORTS - Cung cấp áo bóng đá và phụ kiện thể thao.\r\n\r\nChuyên nghiệp và uy tín hàng đầu!\r\n\r\nCam kết chất lượng và giá cả cực tốt, sp như hình 100%\r\n\r\nChất liệu thun lạnh cao cấp, co dãn tốt, thấm hút mồ hôi tốt\r\n\r\nĐa dạng về mẫu mã, phong phú về màu sắc, luôn cập nhật các mẫu HOT nhất thị trường\r\n\r\nPhom dáng chuẩn người VN, đường may tỉ mỉ, độ hoàn thiện cao, Logo được thêu chắc chắn\r\n\r\nHãy mua hàng và trải nghiệm chất lượng sản phẩm shop mang lại nhé !', 'real (2).webp'),
(23, 'Áo Bóng Đá Manchester United 2024', 6, 21, '500000', '300000', 'Áo đẹp lắm', 'images.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_img_desc`
--

INSERT INTO `tbl_product_img_desc` (`product_id`, `product_img_desc`) VALUES
(9, 'adidas.png'),
(9, 'aokhoackvien.png'),
(9, 'aokhoacmcden.jpg'),
(9, 'bulbal.webp'),
(9, 'coupon_1_img.webp'),
(9, 'coupon_2_img.webp'),
(10, 'list-1.jpg'),
(11, 'sp1.1.jpg'),
(11, 'sp1.2.jpg'),
(11, 'sp1.3.jpg'),
(11, 'sp1.4.jpg'),
(12, 'ss_img_2.jpg'),
(12, 'ss_img_3.jpg'),
(12, 'ss_img_4.jpg'),
(12, 'ss_img_5.jpg'),
(13, 'adidas.png'),
(13, 'list-7.jpg'),
(13, 'list-8.jpg'),
(13, 'logo-molten-icon-1.webp'),
(14, '1.jpg'),
(14, '2.jpg'),
(14, '3.jpg'),
(14, '4.jpg'),
(15, 'mc1.jpg'),
(15, 'mc2.jpg'),
(15, 'mc3.jpg'),
(15, 'mc4.png'),
(16, 'bong (1).jpg'),
(16, 'bong (2).jpg'),
(16, 'bong (3).jpg'),
(16, 'bong (4).jpg'),
(17, 'aokhoacmc (1).png'),
(17, 'aokhoacmc (2).png'),
(18, 'giaysannhantao (1).jpg'),
(18, 'giaysannhantao (2).jpg'),
(18, 'giaysannhantao (3).webp'),
(18, 'giaysannhantao (4).webp'),
(19, 'real (1).webp'),
(19, 'real (2).webp'),
(19, 'real (3).webp'),
(19, 'real (4).webp'),
(20, 'totga (1).jpg'),
(20, 'totga (1).webp'),
(20, 'totga (2).webp'),
(20, 'totga (3).webp'),
(21, 'giaychaybo (1).webp'),
(21, 'giaychaybo (2).webp'),
(21, 'giaychaybo (3).webp'),
(21, 'giaychaybo (4).webp'),
(22, 'download.jpg'),
(22, 'images.jpg'),
(23, 'mu.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `rule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `rule`) VALUES
(10, 'ggg', '123@gmail.com', '$2y$10$yZZiHDDKayR66/xOdsKwreY96J5fo6jVrbMaXWjAZacO9RZ8frE.y', '', 0),
(11, 'gád', 'hahah@gmail.com', '$2y$10$YZQ.2cszQeig8O.uIePTgOmzsEfszVps3554//u9xFBnLx2RMaaIW', '', 0),
(12, 'thuc', 'admin@gmail.com', '$2y$10$F/9deFlfPzRb4ST7k/x3o.1jo1rJ9IWQu/LiClD0h5Qd9DKgHJZJ.', 'RI001EMrIzFXLqvV6gN7d55Wovhukn', 0),
(13, 'Nguyễn Tất Ngọc', 'ngoc@gmail.com', '$2y$10$n6OLHq0Sh/n1vY50QeW6K.4viXDMpD74wHGuk4KW509rbg1qC1v66', '', 1),
(14, 'Nguyễn Đức Thức', 'hieu@gmail.com', '$2y$10$HQEdYJdG1i7FH5uW0ggn7.NJnzE10HDWQttqVL/iTStiY8Xua2L3C', 'muqdcQevJimxCUVfokG3It5MGiU19Z', 0),
(15, 'ngngngn', 'abc@gmail.com', '$2y$10$5.laezU0JDqc5om2phjPY.WV6xECHhVhbxGZsP6T6hGaIbOXKHTDa', '', 0),
(16, 'nguyen tat ngoc', 'ngoc123@gmail.com', '$2y$10$QJUTzYAQ/USx0HoK.VidfO.Tsv0k6CXo6l.Pzd/mrbej1YztnMhUu', '', 0),
(17, 'test', 'test@gmail.com', '$2y$10$dM6cV2dtf/WrZn9hmcdbWuhm1WBT1XywNj2EuHs1NcOVrfN4j2bra', '', 0),
(19, 'NguyenThuc', 'minhtientq112@gmail.com', '$2y$10$amZ.BjoFzooEgxf4Ed1C/ua8T8jsXchsMnE2IM5QM7PMWowZgXBuG', 'hQCB7jILB1QMOE4xhXJVDWNaPvpQ3R', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_data_keyseach`
--
ALTER TABLE `tbl_data_keyseach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_data_log_user`
--
ALTER TABLE `tbl_data_log_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_oder`
--
ALTER TABLE `tbl_oder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_data_keyseach`
--
ALTER TABLE `tbl_data_keyseach`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_data_log_user`
--
ALTER TABLE `tbl_data_log_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_oder`
--
ALTER TABLE `tbl_oder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
