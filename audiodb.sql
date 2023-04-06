-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 03:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audiodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productsid` text NOT NULL,
  `amount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `type` text NOT NULL,
  `brand` text NOT NULL,
  `date` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `descriptions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type`, `brand`, `date`, `image`, `descriptions`) VALUES
(1, 'HiFiMan HE400SE', 3990000, 'full-sized', 'HiFiMan', 0, 'assets/images/products/hifiman_he400se.jpg', '\"Loại tai nghe: Full-size | Open-back\",\"Tầng số đáp ứng: 20Hz - 20kHz\",\"Trở kháng: 25Ω\",\"Độ nhạy: 91dB\",\"Trọng lượng: 390g\"'),
(2, 'Focal Celestee', 23000000, 'full-sized', 'Focal', 0, 'assets/images/products/focal_celestee.jpg', '\"Focal Celestee kết hợp giữa thiết kế hiện đại, sang trọng và hiệu suất âm thanh ấn tượng. Các trình điều khiển loa độc quyền của Focal đảm bảo độ động tuyệt vời cùng với âm thanh có độ chính xác cao. Chụp tai đã trải qua quá trình xử lý âm học, hạn chế cộng hưởng và đạt được chất lượng âm thanh vượt trội: âm thanh rõ ràng, chính xác và có độ mở rộng âm trầm tốt.\"	'),
(3, 'Focal Radiance', 29990000, 'full-sized', 'Focal', 0, 'assets/images/products/focal_radiance.jpeg', ''),
(4, 'Apple AirPods Max', 11900000, 'full-sized', 'Apple', 0, 'assets/images/products/airpod_max.png', '\"Màu sắc: Space Gray, Silver\"'),
(5, 'Sony WH-1000XM4', 6390000, 'full-sized', 'SONY', 0, 'assets/images/products/wh1000xm4.png', '\"Màu sắc đang có sẵn (cập nhật ngày 01/12/2021): Black, Silver, Midnight Blue.\",\r\n      \"Sony WH-1000XM4 tiếp tục giữ vững ngôi vị tai nghe chống ồn tốt nhất trên thị trường hiện nay\",\r\n      \"Bluetooth 5.0 cùng khả năng kết nối 2 thiết bị\",\r\n      \"Thời lượng pin 30h, sạc nhanh 5 phút\",\r\n      \"Chế độ speak to chat thông minh duy nhất chỉ có trên WH-1000XM4\",\r\n      \"Sony WH-1000XM4 là tai nghe đầu tiên của Sony được trang bị DSEE EXTREME\",'),
(6, 'HiFiMan Sundara', 8500000, 'full-sized', 'HiFiMan', 0, 'assets/images/products/hifiman_sundara.jpg', '\"Loại tai nghe: Full-size | Open-back\",\r\n      \"Dạng driver: Từ phẳng (Planar Magnetic)\",\r\n      \"Tầng số đáp ứng: 6Hz - 75kHz\",\r\n      \"Trở kháng: 37Ω\",\r\n      \"Độ nhạy: 94dB\",\r\n      \"Trọng lượng: 372g\",'),
(7, 'Focal Clear', 29290000, 'full-sized', 'Focal', 0, 'assets/images/products/focal_clear.jpg', '\"Clear là mẫu headphone trùm tai cao cấp được thiết kế kiểu open back cho chất lượng âm thanh như của những bộ loa tốt nhất. Thiết kế và sản xuất tại nhà máy Focal – Pháp, Clear được lấy cảm hứng từ chính bộ headphone đầu bảng Utopia. Có thể hiểu rằng Clear có khả năng diễn xuất vượt trội nhờ bộ driver toàn dải độc quyền của Focal cho những chi tiết âm nhỏ nhất trong tổng thể bản nhạc. Thiết kế vượt trên cả mẫu Elear xét về độ mở, Clear sẽ làm mất đi cảm giác bạn đang đeo headphone khi nghe nhạc, đồng thời loại bỏ cảm giác không gian bị thu hẹp cố hữu khi nghe bằng headphone. Với thiết kế bên ngoài đầy sáng tạo cùng với công nghệ chế tạo driver màng hợp kim Aluminium / Magnesium với dome hình chữ “M” cho khả năng trình diễn với độ động và độ trung thực cao cùng với chất âm cá tính đặc trưng và không trùng lắp.\",'),
(8, 'Apple Airpod Proz VN/A', 4990000, 'true-wireless', 'Apple', 0, 'assets/images/products/airpod_pro.jpg', ''),
(9, 'Apple Airpod 3', 4750000, 'true-wireless', 'Apple', 0, 'assets/images/products/airpod_3.jpg', ''),
(10, 'Sony WF-1000XM4', 5490000, 'true-wireless', 'SONY', 0, 'assets/images/products/wf1000xm4.jpeg', '\"Tai nghe Truly Wireless Sony WF-1000XM4 nâng tầm chất lượng âm thanh và công nghệ chống ồn tiên phong lên một tầm cao mới. Với thiết kế mới mẻ vừa vặn với mọi đôi tai, cặp tai nghe này khiến trải nghiệm nghe trở nên thật tự nhiên nhờ vào nhiều tính năng thông minh giúp cá nhân hóa trải nghiệm của bạn trong mọi tình huống.\"'),
(11, 'Sony WF-C500', 1990000, 'true-wireless', 'SONY', 0, 'assets/images/products/wfc500.jpg', '\"ản phẩm hiện đang có 3 màu: Black (đen), Coral Orange (cam) và Ice Green (Xanh lá). Quý khách vui lòng ghi chú màu đã chọn khi đặt hàng!\"'),
(12, 'Sony WF-1000XM3', 3150000, 'true-wireless', 'SONY', 0, 'assets/images/products/wf1000xm3.jpg', '\"Digital Noise Cancelling with HD Noise Cancelling Processor QN1e and Dual Noise Sensor Technology\",\r\n      \"Truly wireless design with BLUETOOTH® wireless technology\",\r\n      \"Up to 24 hours of battery life for all-day listening\",\r\n      \"Quick Attention function lets you chat easily without removing your headphones\",\r\n      \"Modern classic design sits securely in your ears\",'),
(13, 'Apple Airpod 2', 3185000, 'true-wireless', 'Apple', 0, 'assets/images/products/airpod_2.jpg', '\"Designed by Apple\",\r\n      \"Automatically on, automatically connected\",\r\n      \"Easy setup for all your Apple devices6\",\r\n      \"Quick access to Siri by saying “Hey Siri” or setting up double-tap\",\r\n      \"Double-tap to play or skip forward\",\r\n      \"Charges quickly in the case\",\r\n      \"Case can be charged with a Lightning connector\",\r\n      \"Rich, high-quality audio and voice\",\r\n      \"Seamless switching between devices\"'),
(14, 'Focal Sphear S', 3390000, 'inear', 'Focal', 0, 'assets/images/products/focal_sphear_s.jpg', ''),
(15, 'HiFiMan TWS600', 4900000, 'true-wireless', 'HiFiMan', 0, 'assets/images/products/hifiman_tws600.jpg', ''),
(16, 'HiFiMan RE-600S V2', 4900000, 'inear', 'HiFiMan', 0, 'assets/images/products/hifiman_re600s.jpg', ''),
(17, 'HiFiMan Deva Pro', 7950000, 'full-sized', 'HiFiMan', 0, 'assets/images/products/hifiman_deva_pro.jpg', ''),
(18, 'Moondrop KATO', 4350000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_kato.jpg', '\"Newly-Developed ULT Super Linear Dynamic Driver.\",\r\n\r\n      \"3rd Generation DLC(Diamond-Like Carbon) Composite Diaphragm.\",\r\n      \r\n      \"Interchangeable Nozzle Design.\",\r\n      \r\n      \"3rd Generation Patented Anti-Blocking Acoustic Filter.\",\r\n      \r\n      \"Newly Designed Spring Silicone Ear Tips.\",\r\n      \r\n      \"Professional Tuning Following VDSF Target Response.\",\r\n      \r\n      \"High-Quality Copper Thick Silver-Plated Cable.\",\r\n      \r\n      \"Gold-Plated 2-pin 0.78mm Connectors.\"'),
(19, 'Moondrop Starfield', 2890000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_starfield.png', '\"Driver: Carbon Nanotube diaphragm- 10mm Dual cavity dynamic driver Detachable\",\r\n\r\n      \"cable standard: 24AWG Litz 4N OFC  1.2M\",\r\n      \r\n      \"Interface: 0.78 2pin\",\r\n      \r\n      \"Sensitivity: 122dB/Vrms(@1khz)\",\r\n      \r\n      \"Impedance: 32Ω±15% (@1khz)\",\r\n      \r\n      \"Frequency response: 10Hz-36000 Hz (free field. 1/4 inch MIC)\",\r\n      \r\n      \"Effective frequency response: 20Hz-20000 Hz (IEC60318-4)\"'),
(20, 'Moondrop Aria', 1900000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_aria.jpg', '\"Product name: Aria High Performance LCP Diaphragm Dynamic IEMs\",\r\n      \"Driver Unit: LCP liquid crystal diaphragm-10mm diameter double cavity magnetic Diaphragm Dynamic unit\",\r\n      \"Headphone Socket : 0.78pin\",\r\n      \"Sensitivity: 122dB/Vrms (@1kHz)\",\r\n      \"Frequency response : 5Hz-36000Hz Effective frequency response: 20Hz~20000Hz\"'),
(21, 'Moondrop SSP', 799000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_ssp.jpg', '\"Transducer type:	Beryllium-Coated Dome with PU Suspension Ring and N52 High Density Magnetic circuit\",\r\n      \"Operating principle:	Vented\",\r\n      \"Frequency response:	20Hz-20kHz\",\r\n      \"Impedance:	16 Ω @ 1kHz\",\r\n      \"Sensitivity:	115dB / Vrms (@1khz)\"'),
(22, 'Moondrop KXXS', 3990000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_kxxs.jpg', '\"Diaphragm material:  Diamond-Like-Carbon & PEEK\",\r\n\r\n      \"Coil: φ0.035mm-CCAW（Daikoku)\",\r\n      \r\n      \"Cavity:  Zn-Al alloy, die-casting, fine carving, polishing, electroplating\",\r\n      \r\n      \"Transducer: φ10mmelectrodynamic type transducer\",\r\n      \r\n      \"Frequency response: 10-80000Hz（free-field, 1/4inch MIC)\",\r\n      \r\n      \"Effective frequency: 20-20000Hz (IEC60318-4)\",\r\n      \r\n      \"Impedance:  32Ω (@1kHz)\",\r\n      \r\n      \"Sensitivity: 100dB (@1kHz)\",\r\n      \r\n      \"Quality control scope: ±1dB\",\r\n      \r\n      \"Cable: Lifz silver-plated 4N-OFC with 0.78-2pin and 3.5mm plug\"'),
(23, 'Moondrop Blessing 2', 7250000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_blessing2.jpg', '\"Driver : 1 driver dynamic và 4BA mỗi bên\",\r\n      \"Trở kháng: 22 ohms\",\r\n      \"Độ nhạy: 117dB\",\r\n      \"Dải đáp ứng tần số: 9Hz-37kHz\",\r\n      \"Phạm vi đáp ứng tần số hiệu quả: 20Hz-20kHz\",\r\n      \"THD + N: <1%\",\r\n      \"Vỏ nhựa in 3D\",\r\n      \"Chuẩn 2pin 0.78mm\"'),
(24, 'Moondrop Solis', 22500000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_solis.jpg', '\"Impedance: 7.5Ω±15% (@1khz)\",\r\n      \"Sensitivity: 120dB/Vrms(@1khz)\",                                                                                                                    \r\n      \"Frequency response: 20Hz-45000 Hz (free field. 1/4 inch MIC)\",\r\n      \"Effective frequency response: 20Hz-20000 Hz (IEC60318-4)\",\r\n      \"Detachable cable interface: 0.78-2pin \",\r\n      \"High frequency: Sonion EST (electrostatic)\",\r\n      \"Mid-frequency: Softears D-MID-A\",\r\n      \"Low frequency: Sonion 37Series \"'),
(25, 'Moondrop S8', 14500000, 'inear', 'MOONDROP', 0, 'assets/images/products/moondrop_s8.jpg', '\"Eight Balanced Armature Driver Units each side\",\r\n      \"Impedance:- 16ohms @ 1kHz\",\r\n      \"Frequency Response:- 20Hz-40kHz\",\r\n      \"Effective Frequency Response:-20Hz-20kHz\",\r\n      \"Sensitivity:- 122dB\",\r\n      \"2-Pin 0.78mm Connector Cable\",\r\n      \"Medical UV acrylic housing shells\",\r\n      \"6N OFC 3.5mm cable\"'),
(26, 'Sony Z1R', 41990000, 'inear', 'SONY', 0, 'assets/images/products/z1r.jpg', '\"Originally designed\",\r\n      \"Frequency reposnse to 100kHz\",\r\n      \"Balanced Armature driver\",\r\n      \"12nm dynamic drivers diaphragm, with magnesium done and aluminium-coated LCP\",\r\n      \"Audio grade capacitor without distortion\",\r\n      \"Perfectly straight sound path with ulta-wide frequency reponse up to 100kHz\",\r\n      \"Naturally controlled acoustics\",\r\n      \"Refined-phase structure for accurate acoustics blending\",\r\n      \"Quality cable for preserving signal purity\",\r\n      \"Sound space control for wide sound space\",'),
(27, 'Moondrop Liebesleid', 6300000, 'earbud', 'MOONDROP', 0, 'assets/images/products/moondrop_liebesleid_2.jpg', '\"Unit type:Dynamic\",\r\n\r\n      \"Unit diameter:13.5mm\",\r\n      \r\n      \"Cavity diameter:15.8mm\",\r\n      \r\n      \"Frequency response:10-45kHz\",\r\n      \r\n      \"Effective frequency response:20-20kHz\",\r\n      \r\n      \"Impedance:24Ω（±15%）\",\r\n      \r\n      \"THD:≤0.5%@1kHz\",\r\n      \r\n      \"Resolution discrepancies between right and left channel:≤1dB\",\r\n      \r\n      \"Cable material:8um silver plated 4N OFC\",'),
(28, 'Sony MDR_E9LP', 150000, 'earbud', 'SONY', 0, 'assets/images/products/mdr_e9lp.jpg', '\"Kiểu: Dynamic, Open Air\",\r\n      \"Kích thước tai nghe: 13.5mm\",\r\n      \"Độ nhạy: 104dB/mW\",\r\n      \"Công suất hoạt động: 100mW\",\r\n      \"Trở kháng: 16 ohms/ kHz\",\r\n      \"Tần số đáp ứng: 18-22,000Hz\",\r\n      \"Chiều dài dây đeo: 1.2m\",\r\n      \"Đầu cắm: Chữ L ( 3.5 mm )\",\r\n      \"Khối lượng: 6g\",'),
(29, 'Moondrop VX Classic', 1290000, 'earbud', 'MOONDROP', 0, 'assets/images/products/moondrop_vx.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionid` int(11) NOT NULL,
  `userid` int(50) NOT NULL,
  `session` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartid`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `productsid` (`productsid`(768));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
