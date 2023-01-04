-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 04, 2023 at 08:48 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Market`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_area`
--

CREATE TABLE `tb_area` (
  `area_id` int(11) NOT NULL COMMENT 'ไอดีพื้นที',
  `market_id` int(11) NOT NULL COMMENT 'ไอดีตลาด',
  `area_name` varchar(50) NOT NULL COMMENT 'ชื่อแผงลอย',
  `area_description` text NOT NULL COMMENT 'รายละเอียดเพิ่มเติมแผงลอย',
  `area_row` int(11) NOT NULL COMMENT 'เลขที่แถว',
  `area_col` int(11) NOT NULL COMMENT 'บล็อกที่',
  `area_width` int(11) NOT NULL COMMENT 'ความกว้างแผงลอย',
  `area_length` int(11) NOT NULL COMMENT 'ความยาวแผงลอย',
  `area_DayPrice` varchar(11) NOT NULL COMMENT 'ราคาแผงลอยรายวัน',
  `area_MonthPrice` varchar(11) NOT NULL COMMENT 'ราคารายเดือน',
  `area_status` int(11) NOT NULL COMMENT 'สถานะ 1 ว่าง , 2  รอชำระเงิน 3 ชำระเงินแล้ว , 4 ปิดปรับปรุง',
  `area_date` text NOT NULL COMMENT 'เวลาที่เพิ่มแผงลอย',
  `del_status` int(11) NOT NULL COMMENT 'สถานะการลบ 0 ไม่ลบ  1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `bank_id` int(11) NOT NULL COMMENT 'ไอดีธนาคาร',
  `bank_name` varchar(50) NOT NULL COMMENT 'ชื่อธนาคาร',
  `bank_img` text NOT NULL COMMENT 'คิวอาโค้ด',
  `del_status` int(11) NOT NULL COMMENT 'สถานะลบ 0 ไม่ลบ 1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_profile` text NOT NULL,
  `banner_prefix` int(11) NOT NULL,
  `banner_fname` text NOT NULL,
  `banner_lname` text NOT NULL,
  `banner_tel` text NOT NULL,
  `banner_zipcode` text NOT NULL,
  `banner_address` text NOT NULL,
  `banner_descrption` text NOT NULL,
  `banner_img` text NOT NULL,
  `banner_title` text NOT NULL COMMENT 'ชื่อตลาด',
  `banner_detail` text NOT NULL COMMENT 'รายละเอียด',
  `banner_TelCon` text NOT NULL COMMENT 'เบอร์โทรติดต่อ',
  `banner_email` text NOT NULL COMMENT 'เมลล์ติดต่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_DetailMarket`
--

CREATE TABLE `tb_DetailMarket` (
  `dm_id` int(11) NOT NULL COMMENT 'ไอดีรายละเอียดตลาด',
  `dm_name` text NOT NULL COMMENT 'ชื่อตลาด',
  `dm_img` text NOT NULL COMMENT 'รูปตลาด',
  `dm_description` text NOT NULL COMMENT 'รายละเอียดตลาด',
  `del_status` int(11) NOT NULL COMMENT 'สถานะลบ 0 ไม่ลบ 1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_market`
--

CREATE TABLE `tb_market` (
  `market_id` int(11) NOT NULL COMMENT 'ไอดีตลาด',
  `market_name` varchar(100) NOT NULL COMMENT 'ชื่อตลาด',
  `market_address` text NOT NULL COMMENT 'ที่ตั้งตลาด',
  `market_row` int(11) NOT NULL COMMENT 'จำนวนแถว',
  `market_block` int(11) NOT NULL COMMENT 'จำนวน block',
  `del_status` int(11) NOT NULL COMMENT '0 ไม่ลบ 1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notify`
--

CREATE TABLE `tb_notify` (
  `noti_id` int(11) NOT NULL COMMENT 'ไอดีแจ้งเตือน',
  `rental_id` int(11) NOT NULL COMMENT 'ไอดีการเช่า',
  `type_status` int(11) NOT NULL COMMENT 'สถานะ การแจ้งเตือน 1 ผู้เช่า 2 แอดมิน',
  `noti_date` text NOT NULL COMMENT 'วันที่ แจ้งเตือน',
  `del_status` int(11) NOT NULL COMMENT 'สถานะ ไม่ลบ 0 1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rental`
--

CREATE TABLE `tb_rental` (
  `rental_id` int(11) NOT NULL COMMENT 'ไอดีเช่า',
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้เช่า',
  `rental_type` int(11) NOT NULL COMMENT 'ประเภทการเช่า 1 = รายวัน 2 = รายเดือน',
  `area_id` int(11) NOT NULL COMMENT 'ไอดีพื้นที่เช่า',
  `market_id` int(11) NOT NULL COMMENT 'ไอดีตลาด\r\n',
  `rental_slip` text NOT NULL COMMENT 'สลิปโอนเงิน ',
  `rental_money` varchar(11) NOT NULL COMMENT 'จำนวนเงิน',
  `rental_DateStart` text NOT NULL COMMENT 'วันที่เริ่มเช่า',
  `rental_DateEnd` text NOT NULL COMMENT 'วันสุดของการเช่า',
  `rental_RemainDay` varchar(2) NOT NULL COMMENT 'จำนวนวันคงเหลือ',
  `rental_date` date NOT NULL COMMENT 'วันที่เช่า',
  `del_status` int(11) NOT NULL COMMENT '0 ไม่ลบ 1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL COMMENT 'ไอดีผู้เช่า',
  `user_img` text NOT NULL COMMENT 'โปรไฟล์',
  `user_username` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `user_password` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `user_prefix` int(11) NOT NULL COMMENT 'คำนำหน้า 1 นาย 2 นาง 3 นางสาว',
  `user_fname` varchar(50) NOT NULL COMMENT 'ชื่อจริง',
  `user_lname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `user_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `user_address` text NOT NULL COMMENT 'รายละเอียดที่อยู่',
  `user_zipcode` int(11) NOT NULL COMMENT 'รหัสไปรษณี',
  `user_date` text NOT NULL COMMENT 'วันเวลาเข้าสู่ระบบ',
  `user_level` int(11) NOT NULL COMMENT '0 = ผู้เช่า , 1 = เจ้าของที่ 3 = แอดมิน',
  `user_status` int(11) NOT NULL COMMENT 'สถานะ 1 ลบ 0 ไม่ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_img`, `user_username`, `user_password`, `user_prefix`, `user_fname`, `user_lname`, `user_tel`, `user_address`, `user_zipcode`, `user_date`, `user_level`, `user_status`) VALUES
(3, '', 'admin@gmail.com', '11', 3, 'admin', 'admin', '0645356197', 'ที่60/1 เมืองจ.สุพรรณบุรี\r\nเนินหอม', 72000, '2023-01-04 15:34:24', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tb_DetailMarket`
--
ALTER TABLE `tb_DetailMarket`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indexes for table `tb_market`
--
ALTER TABLE `tb_market`
  ADD PRIMARY KEY (`market_id`);

--
-- Indexes for table `tb_notify`
--
ALTER TABLE `tb_notify`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `tb_rental`
--
ALTER TABLE `tb_rental`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีพื้นที', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีธนาคาร', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_DetailMarket`
--
ALTER TABLE `tb_DetailMarket`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีรายละเอียดตลาด', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_market`
--
ALTER TABLE `tb_market`
  MODIFY `market_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีตลาด', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_notify`
--
ALTER TABLE `tb_notify`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีแจ้งเตือน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rental`
--
ALTER TABLE `tb_rental`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีเช่า', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีผู้เช่า', AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
