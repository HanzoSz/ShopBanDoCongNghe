-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 17, 2024 lúc 02:18 PM
-- Phiên bản máy phục vụ: 10.6.15-MariaDB-cll-lve-log
-- Phiên bản PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `idokurcghosting_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminName` varchar(225) NOT NULL,
  `adminEmail` varchar(225) NOT NULL,
  `adminUser` varchar(225) NOT NULL,
  `adminPass` varchar(225) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Dell'),
(3, 'SamSung'),
(5, 'Apple'),
(6, 'NVIDIA'),
(7, 'ASUS'),
(8, 'MSI'),
(9, 'Intel'),
(10, 'AMD'),
(11, 'KINGSTON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `sId` varchar(225) NOT NULL,
  `productName` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `product_Id`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(20, 4, '4hvat4akl2ajutcb0b98lnmtg8', 'RTX3060', '3000', 3, '7102ba089e.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Laptop'),
(2, 'Desktop'),
(3, 'Mobile Phone'),
(14, 'Video Card'),
(15, 'MainBoard'),
(16, 'CPU'),
(17, 'RAM'),
(18, 'SSD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `zipcode` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'sova', 'Russian', 'Russian', 'AF', '123', '097884545', 'sova@gmail.com', 'sova'),
(2, 'reyna', 'New York', 'New York', 'US', '234', '0999999', 'reyna@gmail.com', 'reyna'),
(3, 'hade267', 'vn@gmail.com', 'tn', 'VN', '123', '123', 'vn@gmail.com', '123456789'),
(4, 'Đức Vũ Văn', 'Bac Giang', 'Bac Giang', 'VN', '26000', '0373853243', 'vminhduc8@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `productName` varchar(225) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(225) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_Id`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(7, 4, 'RTX3060', 1, 5, '15000', '7102ba089e.png', 2, '2024-03-24 11:43:44'),
(8, 4, 'RTX3060', 2, 3, '9000', '7102ba089e.png', 0, '2024-03-26 09:30:28'),
(9, 13, 'NVIDIA RTX 4060', 3, 1, '1500', '330ffcb64f.jpg', 0, '2024-04-05 14:32:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_Id` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_Id`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(1, 'sss24', 3, 5, '<p>nhulon</p>', 1, '1500', '45a4f128f3.jpg'),
(2, 'ManHinhZ300', 2, 1, '<p>dc vai lon em oi</p>', 1, '1500', '94d61442ca.jpg'),
(3, 'IPHONE 15', 3, 5, '<p>DAT VL</p>', 1, '2000', '02ebe0d523.png'),
(4, 'RTX3060', 14, 6, '<p>Card Khoe Vai Lon</p>', 1, '3000', '7102ba089e.png'),
(5, 'I9 9999K', 16, 9, '<p>CPU I9 999K</p>', 1, '2000', '580237f6c3.jpg'),
(6, 'DDR4 8GB', 17, 11, '<p>RAM 8G DDR4</p>', 1, '100', 'e0ac402812.jpg'),
(7, 'Z1000', 15, 7, '<p>Main ASUS Z1000</p>', 1, '250', '6f3c678ea4.png'),
(8, 'Mainboard ASUS B360', 15, 7, '<p>Mua di</p>', 1, '1000', '6093fde1dc.jpg'),
(9, 'Mainboard ASUS PRIME B660M', 15, 7, '<p>Mua di nao</p>', 1, '1000', 'fa52a0f2ba.jpg'),
(10, 'Mainboard ASUS Maximus XII', 15, 7, '<p>Main khoe</p>', 1, '1000', 'a266ae52f6.png'),
(11, 'NVIDIA RTX 3060', 14, 6, '<p>Card re ngon</p>', 1, '1500', '2cfbe6928d.jpg'),
(12, 'NVIDIA RTX 3050', 14, 6, '<p>Card ngon bo re</p>', 1, '1500', 'a30f5b1a74.jpg'),
(13, 'NVIDIA RTX 4060', 14, 6, '<p>Card ngon do</p>', 1, '1500', '330ffcb64f.jpg'),
(14, 'CPU Intel I9-9920x', 16, 9, '<p>Chip ngon re</p>', 1, '1000', '409f01b212.jpg'),
(15, 'CPU Intel I9-11900K', 16, 9, '<p>Chip da nhan da luong</p>', 1, '1000', '2ff4564bc7.jpg'),
(16, 'CPU Intel I7-14700', 16, 9, '<p>chip da nhan da luong</p>', 1, '1000', '3eaeddb7e2.jpg'),
(17, 'Ram 12G', 0, 0, '<p>12G do</p>', 1, '500', 'e555c12cda.jpg'),
(18, 'Ram 12G', 17, 11, '<p>ram re</p>', 1, '500', '56c6b9feba.jpg'),
(19, 'Ram 16G', 17, 11, '<p>ram re</p>', 1, '500', '4e819ccc80.jpg'),
(20, 'Ram 32G', 17, 11, '<p>ram ngon</p>', 1, '500', '65bc6ae381.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(225) NOT NULL,
  `slider_image` varchar(225) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(1, 'Slide 1', 'f0931c6d1e.png', 1),
(3, 'Slider 3', '54c3f17c3b.jpg', 1),
(4, 'Slider 4', 'f2564d92cb.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_Id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
