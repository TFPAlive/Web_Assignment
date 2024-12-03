-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 10:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` bigint(20) NOT NULL,
  `NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONE` varchar(10) DEFAULT NULL,
  `ADDRESS` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `USERNAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMG_URL` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `NAME`, `PHONE`, `ADDRESS`, `USERNAME`, `EMAIL`, `IMG_URL`) VALUES
(1, 'Nguyễn Phan Duy Minh', '0786201662', 'Tây Ninh', 'minh123', 'minh.nguyendyingobelink1@hcmut.edu.vn', './Views/images/Orion.jpg'),
(2, 'Đặng Thành Anh', '0906482890', 'quận 12 TP HCM', 'anh123', 'minh.ngo147596382@hcmut.edu.vn', './Views/images/anh.jpg'),
(3, 'Nguyễn Hữu Nhật Minh', '0328424319', 'quận 10, TP HCM', 'nyattomin', 'huy.dangthanh1006@gmail.com', './Views/images/nhatminh.jpg'),
(4, 'Hồng Anh Quân', '0338375019', '268 Lý Thường Kiệt, Phường 14, Quận 10, Hồ Chí Minh', 'quan123', 'quan.anh@gmail.com', './Views/images/UI_Card_Icon_101883.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` bigint(20) NOT NULL,
  `PID` bigint(20) NOT NULL,
  `UID` bigint(20) NOT NULL,
  `STAR` int(11) DEFAULT 5,
  `CONTENT` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIME` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `PID`, `UID`, `STAR`, `CONTENT`, `TIME`) VALUES
(1, 1, 1, 5, 'Rất tốt ạ', '2022-11-18'),
(2, 1, 1, 3, 'Bình thường', '2024-06-16'),
(3, 1, 1, 1, 'Không thích :v', '2022-06-10'),
(4, 1, 2, 5, 'Tuyệt vời', '0000-00-00'),
(5, 2, 1, 3, 'Giá hơi cao', '2022-05-20'),
(6, 3, 1, 4, 'Tạm ổn', '2022-05-19'),
(7, 10, 1, 5, 'đẹp', '2024-04-16'),
(8, 10, 1, 4, 'Ngầu lòi', '2024-11-07'),
(9, 8, 1, 4, 'qaaa', '2024-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` bigint(20) NOT NULL,
  `UID` bigint(20) NOT NULL,
  `TIME` date DEFAULT NULL,
  `TOTAL` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ID`, `UID`, `TIME`, `TOTAL`) VALUES
(1, 1, '2022-11-08', 100000),
(2, 1, '2024-11-06', 200000),
(3, 1, '2024-11-06', 360000),
(4, 1, '2024-11-06', 20000),
(5, 1, '2024-11-16', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` bigint(20) NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `IMG_URL` varchar(250) DEFAULT NULL,
  `NUMBER` int(11) DEFAULT NULL,
  `DECS` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CATEGORY` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TOP_PRODUCT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `NAME`, `PRICE`, `IMG_URL`, `NUMBER`, `DECS`, `CATEGORY`, `TOP_PRODUCT`) VALUES
(1, 'PC Gaming ASUS ROG Strix GT15 G15', 24000000, 'https://tfpalive.github.io/Web/1.jpg', 10, 'PC gaming ASUS ROG Strix với card đồ họa NVIDIA GeForce RTX 3070 và CPU Intel i7, đảm bảo hiệu năng mượt mà cho mọi tựa game.', 'PC Gaming', 1),
(2, 'Laptop Gaming MSI Raider GE78', 35000000, 'https://tfpalive.github.io/Web/2.jpg', 15, 'Laptop gaming MSI Raider GE78 với màn hình 17 inch QHD, card RTX 3080 và RAM 16GB, giúp bạn trải nghiệm game tuyệt vời mọi lúc.', 'Laptop Gaming', 1),
(3, 'Sony PlayStation 5', 15000000, 'https://tfpalive.github.io/Web/3.jpg', 5, 'Máy chơi game console Sony PlayStation 5, hỗ trợ 4K HDR và khả năng tương thích ngược với nhiều tựa game PS4.', 'Console', 1),
(4, 'Xbox Series X', 14000000, 'https://tfpalive.github.io/Web/4.jpg', 7, 'Console Xbox Series X của Microsoft, hiệu năng ấn tượng với SSD 1TB, giúp load game nhanh chóng và trải nghiệm đồ họa tuyệt đẹp.', 'Console', 1),
(5, 'PC Gaming Acer Predator Orion', 28000000, 'https://tfpalive.github.io/Web/5.jpg', 8, 'PC gaming Acer Predator Orion với CPU Intel i9, card đồ họa RTX 3080 và khả năng làm mát vượt trội, mang đến trải nghiệm game mạnh mẽ.', 'PC Gaming', 0),
(6, 'Laptop Gaming ASUS TUF', 20000000, 'https://tfpalive.github.io/Web/6.jpg', 12, 'Laptop gaming ASUS TUF với màn hình Full HD 144Hz, card GTX 1660Ti và RAM 8GB, thiết kế bền bỉ cho game thủ.', 'Laptop Gaming', 0),
(7, 'PC Gaming Dell Alienware Aurora', 32000000, 'https://tfpalive.github.io/Web/7.jpg', 6, 'PC gaming Dell Alienware Aurora với CPU AMD Ryzen 7, card RTX 3070, thiết kế độc đáo và hiệu năng cao.', 'PC Gaming', 1),
(8, 'Nintendo Switch OLED', 9000000, 'https://tfpalive.github.io/Web/8.jpg', 10, 'Nintendo Switch OLED phiên bản cải tiến với màn hình OLED 7 inch, hỗ trợ chế độ chơi console và handheld linh hoạt.', 'Console', 0),
(9, 'Bàn phím cơ Razer BlackWidow', 2500000, 'https://tfpalive.github.io/Web/9.jpg', 20, 'Bàn phím cơ Razer BlackWidow với đèn RGB và thiết kế chắc chắn, mang đến trải nghiệm chơi game tuyệt vời.', 'Accessories', 1),
(10, 'Chuột gaming Logitech G502', 1500000, 'https://tfpalive.github.io/Web/10.jpg', 25, 'Chuột gaming Logitech G502 với cảm biến HERO 25K, thiết kế công thái học và 11 nút lập trình, phù hợp cho mọi game thủ.', 'Accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_in_order`
--

CREATE TABLE `product_in_order` (
  `ID` bigint(20) NOT NULL,
  `PID` bigint(20) NOT NULL,
  `OID` bigint(20) NOT NULL,
  `QUANTITY` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_in_order`
--

INSERT INTO `product_in_order` (`ID`, `PID`, `OID`, `QUANTITY`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 10, 4, 2),
(5, 7, 5, 1),
(6, 7, 5, 1),
(7, 7, 5, 1),
(8, 7, 5, 1),
(9, 7, 5, 1),
(10, 7, 5, 1),
(11, 7, 5, 1),
(12, 7, 5, 1),
(13, 7, 5, 1),
(14, 7, 5, 1),
(15, 3, 5, 1),
(16, 2, 5, 1),
(17, 2, 2, 1),
(18, 3, 3, 1),
(19, 4, 4, 1),
(20, 1, 2, 1),
(21, 1, 4, 1),
(22, 1, 3, 1),
(23, 1, 1, 1),
(24, 1, 2, 1),
(25, 1, 1, 1),
(26, 1, 1, 1),
(27, 1, 2, 1),
(28, 1, 3, 1),
(29, 1, 3, 1),
(30, 2, 4, 1),
(31, 1, 5, 1),
(32, 1, 2, 1),
(33, 3, 2, 5),
(34, 2, 2, 5),
(35, 1, 3, 1),
(36, 1, 4, 1),
(37, 1, 1, 1),
(38, 1, 1, 1),
(39, 1, 2, 1),
(40, 1, 3, 1),
(41, 1, 4, 1),
(42, 1, 5, 1),
(43, 1, 1, 1),
(44, 1, 2, 1),
(45, 1, 3, 1),
(46, 1, 4, 1),
(47, 2, 1, 1),
(48, 1, 1, 1),
(49, 1, 2, 1),
(50, 2, 3, 1),
(51, 1, 4, 1),
(52, 2, 5, 1),
(53, 3, 1, 1),
(54, 4, 1, 1),
(55, 1, 2, 1),
(56, 10, 3, 5),
(57, 7, 4, 7),
(58, 9, 1, 1),
(59, 3, 1, 1),
(60, 3, 2, 1),
(61, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_img_url`
--

CREATE TABLE `sub_img_url` (
  `ID` bigint(20) NOT NULL,
  `PID` bigint(20) NOT NULL,
  `IMG_URL` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_img_url`
--

INSERT INTO `sub_img_url` (`ID`, `PID`, `IMG_URL`) VALUES
(1, 1, './Views/images/'),
(2, 1, './Views/images/'),
(3, 1, './Views/images/'),
(4, 2, './Views/images/laptop_msi_raider_01.png'),
(5, 2, './Views/images/laptop_msi_raider_02.png'),
(6, 2, './Views/images/ps5_01.jpeg'),
(7, 3, './Views/images/ps5_02.jpeg'),
(8, 3, './Views/images/ps5_03.jpeg'),
(9, 3, './Views/images/xbox_series_x_01.jpeg'),
(10, 4, './Views/images/xbox_series_x_02.jpeg'),
(11, 4, './Views/images/pc_acer_predator_01.jpeg'),
(12, 4, './Views/images/pc_acer_predator_02.jpg'),
(13, 5, './Views/images/laptop_asus_tuf_01.jpeg'),
(14, 5, './Views/images/laptop_asus_tuf_02.jpeg'),
(15, 5, './Views/images/nintendo_switch_oled_01.jpeg'),
(16, 6, './Views/images/nintendo_switch_oled_02.jpeg'),
(17, 6, './Views/images/razer_blackwidow_01.jpeg'),
(18, 6, './Views/images/razer_blackwidow_02.jpeg'),
(19, 7, './Views/images/logitech_g502_01.jpeg'),
(20, 7, './Views/images/logitech_g502_02.jpeg'),
(21, 7, './Views/images/default_image.png'),
(22, 7, './Views/images/default_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROMOTION` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`ID`, `CODE`, `PROMOTION`) VALUES
(1, 'VOUCHER1', 15000),
(2, 'VOUCHER123', 100000),
(3, 'VOUCHERVIP', 1699000),
(4, 'SUKIENVIP', 1799000),
(5, 'GIAMGIA50', 500000),
(6, '11122222', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `OID` (`OID`);

--
-- Indexes for table `sub_img_url`
--
ALTER TABLE `sub_img_url`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_in_order`
--
ALTER TABLE `product_in_order`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `sub_img_url`
--
ALTER TABLE `sub_img_url`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `account` (`ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `account` (`ID`);

--
-- Constraints for table `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD CONSTRAINT `product_in_order_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `product_in_order_ibfk_2` FOREIGN KEY (`OID`) REFERENCES `order` (`ID`);

--
-- Constraints for table `sub_img_url`
--
ALTER TABLE `sub_img_url`
  ADD CONSTRAINT `sub_img_url_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
