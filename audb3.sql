-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 05:23 AM
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
-- Database: `audb3`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_day` date DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment` varchar(20) DEFAULT NULL,
  `total` int(20) NOT NULL DEFAULT 0,
  `cus_name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `user_id`, `address`, `note`, `created_day`, `last_updated`, `payment`, `total`, `cus_name`, `status`) VALUES
(54, 2, 'An Dương Vương', 'Giao cho em', '2023-05-17', '2023-05-17 06:11:24', 'bank', 29290000, 'Minh Trí', 3),
(55, 7, 'Thủ Đức', 'Giao trong ngày', '2023-05-17', '2023-05-17 06:11:29', 'bank', 29290000, 'B M Trí', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `created_day` date DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `quantity`, `price`, `created_day`, `last_updated`) VALUES
(63, 54, 7, 1, 29290000, '2023-05-17', '2023-05-17 03:08:04'),
(64, 55, 7, 1, 29290000, '2023-05-17', '2023-05-17 05:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'MOONDROP'),
(3, 'SONY'),
(4, 'Focal'),
(5, 'HiFiMan');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `order_purchase_id` int(11) DEFAULT NULL,
  `order_sale_id` int(11) DEFAULT NULL,
  `order_type` enum('purchase','sale') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `quantity`, `updated_at`, `order_purchase_id`, `order_sale_id`, `order_type`) VALUES
(118, 1, 20, '2023-05-10 22:06:31', NULL, NULL, 'purchase'),
(119, 2, 20, '2023-05-10 22:07:09', NULL, NULL, 'purchase'),
(120, 3, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(121, 4, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(122, 5, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(123, 6, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(124, 7, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(125, 8, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(126, 9, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(127, 10, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(128, 11, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(129, 12, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(130, 13, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(131, 14, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(132, 15, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(133, 16, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(134, 17, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(135, 18, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(136, 19, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(137, 20, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(138, 21, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(139, 22, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(140, 23, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(141, 24, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(142, 25, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(143, 26, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(144, 27, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(145, 28, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(146, 29, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(147, 31, 20, '2023-05-10 22:09:35', NULL, NULL, 'purchase'),
(149, 1, 20, '2023-05-10 22:25:15', 74, NULL, 'purchase'),
(150, 32, 123, '2023-05-11 13:25:32', 75, NULL, 'purchase'),
(153, 7, 19, '2023-05-17 10:08:04', NULL, 54, 'sale'),
(154, 7, 18, '2023-05-17 12:59:44', NULL, 55, 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `display` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `date`, `image`, `description`, `brand_id`, `type_id`, `display`) VALUES
(1, 'HiFiMan HE400SE', 3900000, '2023-05-10', '../assets/images/products/hifiman_he400se.jpg', '\"Loại tai nghe: Full-size | Open-back\",\"Tầng số đáp ứng: 20Hz - 20kHz\",\"Trở kháng: 25Ω\",\"Độ nhạy: 91dB\",\"Trọng lượng: 390g\"', 5, 1, 1),
(2, 'Focal Celestee', 23000000, '0000-00-00', '../assets/images/products/focal_celestee.jpg', '\"Focal Celestee kết hợp giữa thiết kế hiện đại, sang trọng và hiệu suất âm thanh ấn tượng. Các trình điều khiển loa độc quyền của Focal đảm bảo độ động tuyệt vời cùng với âm thanh có độ chính xác cao. Chụp tai đã trải qua quá trình xử lý âm học, hạn chế cộng hưởng và đạt được chất lượng âm thanh vượt trội: âm thanh rõ ràng, chính xác và có độ mở rộng âm trầm tốt.\"	', 4, 1, 0),
(3, 'Focal Radiance', 29990000, '0000-00-00', '../assets/images/products/focal_radiance.jpeg', '', 4, 1, 0),
(4, 'Apple AirPods Max', 11900000, '0000-00-00', '../assets/images/products/airpod_max.png', '\"Màu sắc: Space Gray, Silver\"', 1, 1, 0),
(5, 'Sony WH-1000XM4', 6390000, '0000-00-00', '../assets/images/products/wh1000xm4.png', '\"Màu sắc đang có sẵn (cập nhật ngày 01/12/2021): Black, Silver, Midnight Blue.\",\r\n      \"Sony WH-1000XM4 tiếp tục giữ vững ngôi vị tai nghe chống ồn tốt nhất trên thị trường hiện nay\",\r\n      \"Bluetooth 5.0 cùng khả năng kết nối 2 thiết bị\",\r\n      \"Thời lượng pin 30h, sạc nhanh 5 phút\",\r\n      \"Chế độ speak to chat thông minh duy nhất chỉ có trên WH-1000XM4\",\r\n      \"Sony WH-1000XM4 là tai nghe đầu tiên của Sony được trang bị DSEE EXTREME\",', 3, 1, 0),
(6, 'HiFiMan Sundara', 8500000, '0000-00-00', '../assets/images/products/hifiman_sundara.jpg', '\"Loại tai nghe: Full-size | Open-back\",      \"Dạng driver: Từ phẳng (Planar Magnetic)\",      \"Tầng số đáp ứng: 6Hz - 75kHz\",      \"Trở kháng: 37Ω\",      \"Độ nhạy: 94dB\",      \"Trọng lượng: 372g\",', 5, 1, 0),
(7, 'Focal Clear', 29290000, '0000-00-00', '../assets/images/products/focal_clear.jpg', '\"Clear là mẫu headphone trùm tai cao cấp được thiết kế kiểu open back cho chất lượng âm thanh như của những bộ loa tốt nhất. Thiết kế và sản xuất tại nhà máy Focal – Pháp, Clear được lấy cảm hứng từ chính bộ headphone đầu bảng Utopia. Có thể hiểu rằng Clear có khả năng diễn xuất vượt trội nhờ bộ driver toàn dải độc quyền của Focal cho những chi tiết âm nhỏ nhất trong tổng thể bản nhạc. Thiết kế vượt trên cả mẫu Elear xét về độ mở, Clear sẽ làm mất đi cảm giác bạn đang đeo headphone khi nghe nhạc, đồng thời loại bỏ cảm giác không gian bị thu hẹp cố hữu khi nghe bằng headphone. Với thiết kế bên ngoài đầy sáng tạo cùng với công nghệ chế tạo driver màng hợp kim Aluminium / Magnesium với dome hình chữ “M” cho khả năng trình diễn với độ động và độ trung thực cao cùng với chất âm cá tính đặc trưng và không trùng lắp.\",', 4, 1, 0),
(8, 'Apple Airpod Proz VN/A', 4990000, '0000-00-00', '../assets/images/products/airpod_pro.jpg', '', 1, 4, 0),
(9, 'Apple Airpod 3', 4750000, '0000-00-00', '../assets/images/products/airpod_3.jpg', '', 1, 4, 0),
(10, 'Sony WF-1000XM4', 5490000, '0000-00-00', '../assets/images/products/wf1000xm4.jpeg', '\"Tai nghe Truly Wireless Sony WF-1000XM4 nâng tầm chất lượng âm thanh và công nghệ chống ồn tiên phong lên một tầm cao mới. Với thiết kế mới mẻ vừa vặn với mọi đôi tai, cặp tai nghe này khiến trải nghiệm nghe trở nên thật tự nhiên nhờ vào nhiều tính năng thông minh giúp cá nhân hóa trải nghiệm của bạn trong mọi tình huống.\"', 3, 4, 0),
(11, 'Sony WF-C500', 1990000, '0000-00-00', '../assets/images/products/wfc500.jpg', '\"ản phẩm hiện đang có 3 màu: Black (đen), Coral Orange (cam) và Ice Green (Xanh lá). Quý khách vui lòng ghi chú màu đã chọn khi đặt hàng!\"', 3, 4, 0),
(12, 'Sony WF-1000XM3', 3150000, '0000-00-00', '../assets/images/products/wf1000xm3.jpg', '\"Digital Noise Cancelling with HD Noise Cancelling Processor QN1e and Dual Noise Sensor Technology\",\r\n      \"Truly wireless design with BLUETOOTH® wireless technology\",\r\n      \"Up to 24 hours of battery life for all-day listening\",\r\n      \"Quick Attention function lets you chat easily without removing your headphones\",\r\n      \"Modern classic design sits securely in your ears\",', 3, 4, 0),
(13, 'Apple Airpod 2', 3185000, '0000-00-00', '../assets/images/products/airpod_2.jpg', '\"Designed by Apple\",\r\n      \"Automatically on, automatically connected\",\r\n      \"Easy setup for all your Apple devices6\",\r\n      \"Quick access to Siri by saying “Hey Siri” or setting up double-tap\",\r\n      \"Double-tap to play or skip forward\",\r\n      \"Charges quickly in the case\",\r\n      \"Case can be charged with a Lightning connector\",\r\n      \"Rich, high-quality audio and voice\",\r\n      \"Seamless switching between devices\"', 1, 4, 0),
(14, 'Focal Sphear S', 3390000, '0000-00-00', '../assets/images/products/focal_sphear_s.jpg', '', 4, 2, 0),
(15, 'HiFiMan TWS600', 4900000, '0000-00-00', '../assets/images/products/hifiman_tws600.jpg', '', 5, 4, 0),
(16, 'HiFiMan RE-600S V2', 4900000, '0000-00-00', '../assets/images/products/hifiman_re600s.jpg', '', 5, 2, 0),
(17, 'HiFiMan Deva Pro', 7950000, '0000-00-00', '../assets/images/products/hifiman_deva_pro.jpg', '', 5, 1, 0),
(18, 'Moondrop KATO', 4350000, '0000-00-00', '../assets/images/products/moondrop_kato.jpg', '\"Newly-Developed ULT Super Linear Dynamic Driver.\",\r\n\r\n      \"3rd Generation DLC(Diamond-Like Carbon) Composite Diaphragm.\",\r\n      \r\n      \"Interchangeable Nozzle Design.\",\r\n      \r\n      \"3rd Generation Patented Anti-Blocking Acoustic Filter.\",\r\n      \r\n      \"Newly Designed Spring Silicone Ear Tips.\",\r\n      \r\n      \"Professional Tuning Following VDSF Target Response.\",\r\n      \r\n      \"High-Quality Copper Thick Silver-Plated Cable.\",\r\n      \r\n      \"Gold-Plated 2-pin 0.78mm Connectors.\"', 2, 2, 0),
(19, 'Moondrop Starfield', 2890000, '0000-00-00', '../assets/images/products/moondrop_starfield.png', '\"Driver: Carbon Nanotube diaphragm- 10mm Dual cavity dynamic driver Detachable\",\r\n\r\n      \"cable standard: 24AWG Litz 4N OFC  1.2M\",\r\n      \r\n      \"Interface: 0.78 2pin\",\r\n      \r\n      \"Sensitivity: 122dB/Vrms(@1khz)\",\r\n      \r\n      \"Impedance: 32Ω±15% (@1khz)\",\r\n      \r\n      \"Frequency response: 10Hz-36000 Hz (free field. 1/4 inch MIC)\",\r\n      \r\n      \"Effective frequency response: 20Hz-20000 Hz (IEC60318-4)\"', 2, 2, 0),
(20, 'Moondrop Aria', 1900000, '0000-00-00', '../assets/images/products/moondrop_aria.jpg', '\"Product name: Aria High Performance LCP Diaphragm Dynamic IEMs\",\r\n      \"Driver Unit: LCP liquid crystal diaphragm-10mm diameter double cavity magnetic Diaphragm Dynamic unit\",\r\n      \"Headphone Socket : 0.78pin\",\r\n      \"Sensitivity: 122dB/Vrms (@1kHz)\",\r\n      \"Frequency response : 5Hz-36000Hz Effective frequency response: 20Hz~20000Hz\"', 2, 2, 0),
(21, 'Moondrop SSP', 799000, '0000-00-00', '../assets/images/products/moondrop_ssp.jpg', '\"Transducer type:	Beryllium-Coated Dome with PU Suspension Ring and N52 High Density Magnetic circuit\",\r\n      \"Operating principle:	Vented\",\r\n      \"Frequency response:	20Hz-20kHz\",\r\n      \"Impedance:	16 Ω @ 1kHz\",\r\n      \"Sensitivity:	115dB / Vrms (@1khz)\"', 2, 2, 0),
(22, 'Moondrop KXXS', 3990000, '0000-00-00', '../assets/images/products/moondrop_kxxs.jpg', '\"Diaphragm material:  Diamond-Like-Carbon & PEEK\",\r\n\r\n      \"Coil: φ0.035mm-CCAW（Daikoku)\",\r\n      \r\n      \"Cavity:  Zn-Al alloy, die-casting, fine carving, polishing, electroplating\",\r\n      \r\n      \"Transducer: φ10mmelectrodynamic type transducer\",\r\n      \r\n      \"Frequency response: 10-80000Hz（free-field, 1/4inch MIC)\",\r\n      \r\n      \"Effective frequency: 20-20000Hz (IEC60318-4)\",\r\n      \r\n      \"Impedance:  32Ω (@1kHz)\",\r\n      \r\n      \"Sensitivity: 100dB (@1kHz)\",\r\n      \r\n      \"Quality control scope: ±1dB\",\r\n      \r\n      \"Cable: Lifz silver-plated 4N-OFC with 0.78-2pin and 3.5mm plug\"', 2, 2, 0),
(23, 'Moondrop Blessing 2', 7250000, '0000-00-00', '../assets/images/products/moondrop_blessing2.jpg', '\"Driver : 1 driver dynamic và 4BA mỗi bên\",\r\n      \"Trở kháng: 22 ohms\",\r\n      \"Độ nhạy: 117dB\",\r\n      \"Dải đáp ứng tần số: 9Hz-37kHz\",\r\n      \"Phạm vi đáp ứng tần số hiệu quả: 20Hz-20kHz\",\r\n      \"THD + N: <1%\",\r\n      \"Vỏ nhựa in 3D\",\r\n      \"Chuẩn 2pin 0.78mm\"', 2, 2, 0),
(24, 'Moondrop Solis', 22500000, '0000-00-00', '../assets/images/products/moondrop_solis.jpg', '\"Impedance: 7.5Ω±15% (@1khz)\",\r\n      \"Sensitivity: 120dB/Vrms(@1khz)\",                                                                                                                    \r\n      \"Frequency response: 20Hz-45000 Hz (free field. 1/4 inch MIC)\",\r\n      \"Effective frequency response: 20Hz-20000 Hz (IEC60318-4)\",\r\n      \"Detachable cable interface: 0.78-2pin \",\r\n      \"High frequency: Sonion EST (electrostatic)\",\r\n      \"Mid-frequency: Softears D-MID-A\",\r\n      \"Low frequency: Sonion 37Series \"', 2, 2, 0),
(25, 'Moondrop S8', 14500000, '0000-00-00', '../assets/images/products/moondrop_s8.jpg', '\"Eight Balanced Armature Driver Units each side\",\r\n      \"Impedance:- 16ohms @ 1kHz\",\r\n      \"Frequency Response:- 20Hz-40kHz\",\r\n      \"Effective Frequency Response:-20Hz-20kHz\",\r\n      \"Sensitivity:- 122dB\",\r\n      \"2-Pin 0.78mm Connector Cable\",\r\n      \"Medical UV acrylic housing shells\",\r\n      \"6N OFC 3.5mm cable\"', 2, 2, 0),
(26, 'Sony Z1R', 41990000, '0000-00-00', '../assets/images/products/z1r.jpg', '\"Originally designed\",\r\n      \"Frequency reposnse to 100kHz\",\r\n      \"Balanced Armature driver\",\r\n      \"12nm dynamic drivers diaphragm, with magnesium done and aluminium-coated LCP\",\r\n      \"Audio grade capacitor without distortion\",\r\n      \"Perfectly straight sound path with ulta-wide frequency reponse up to 100kHz\",\r\n      \"Naturally controlled acoustics\",\r\n      \"Refined-phase structure for accurate acoustics blending\",\r\n      \"Quality cable for preserving signal purity\",\r\n      \"Sound space control for wide sound space\",', 3, 2, 0),
(27, 'Moondrop Liebesleid', 6300000, '0000-00-00', '../assets/images/products/moondrop_liebesleid_2.jpg', '\"Unit type:Dynamic\",\r\n\r\n      \"Unit diameter:13.5mm\",\r\n      \r\n      \"Cavity diameter:15.8mm\",\r\n      \r\n      \"Frequency response:10-45kHz\",\r\n      \r\n      \"Effective frequency response:20-20kHz\",\r\n      \r\n      \"Impedance:24Ω（±15%）\",\r\n      \r\n      \"THD:≤0.5%@1kHz\",\r\n      \r\n      \"Resolution discrepancies between right and left channel:≤1dB\",\r\n      \r\n      \"Cable material:8um silver plated 4N OFC\",', 2, 3, 0),
(28, 'Sony MDR_E9LP', 150000, '0000-00-00', '../assets/images/products/mdr_e9lp.jpg', '\"Kiểu: Dynamic, Open Air\",\r\n      \"Kích thước tai nghe: 13.5mm\",\r\n      \"Độ nhạy: 104dB/mW\",\r\n      \"Công suất hoạt động: 100mW\",\r\n      \"Trở kháng: 16 ohms/ kHz\",\r\n      \"Tần số đáp ứng: 18-22,000Hz\",\r\n      \"Chiều dài dây đeo: 1.2m\",\r\n      \"Đầu cắm: Chữ L ( 3.5 mm )\",\r\n      \"Khối lượng: 6g\",', 3, 3, 0),
(29, 'Moondrop VX Classic', 1290000, '0000-00-00', '../assets/images/products/moondrop_vx.jpg', '', 2, 3, 0),
(31, 'Messi', 55555600, '0000-00-00', '../assets/images/products/women-asian-portrait-face-red-clothing-hd-wallpaper-preview.jpg', '', 2, 1, 0),
(32, 'Hoàng chó', 50000000, '2023-05-11', '../assets/images/products/women-asian-portrait-face-red-clothing-hd-wallpaper-preview.jpg', '', 3, 1, 0),
(33, 'Ronaldo', 1231230, '2023-05-12', NULL, '', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_day` date DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `product_id`, `quantity`, `created_day`, `last_updated`) VALUES
(74, 1, 20, '0000-00-00', '0000-00-00 00:00:00'),
(75, 32, 123, '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'full-sized'),
(2, 'inear'),
(3, 'earbud'),
(4, 'true-wireless');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `isBlock` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `role`, `isBlock`) VALUES
(1, 'admin', '$2y$10$o.KGaqLig5/Ec0a2c3Ui.undarCldCUG1TMbOh0xIZfRUvx.m9pjG', 'admin@gmail.com', '0909090909', '1', NULL),
(2, 'xiemcho123', '$2y$10$Bafu/g70m9NC2rU5cpiz0u2kEa8ghEcrgePmsUDWmOwwixvZzRKCW', 'ronaldo123@gmail.com', '0844445566', '0', '0'),
(4, 'tri123', '$2y$10$9FaRi7Rq8Gbt9TRdEyirNuol2WZ5rbkURtYL1gweJmzShLM9LUNhW', 'ronaldo123@gmail.com', '0844445566', '0', '1'),
(6, 'az123', '$2y$10$5pcwCU3bIPkmly9/WdM40OjtLlWBkZ.JJxhsArzP5EpaS4RcoFXMK', 'minhtri180522@gmail.com', '0869146558', '0', '0'),
(7, 'zxczxc213', '$2y$10$XMb3pV.AGwx1493gdwyebuUmr0DcKAFdivpEHVEe37eABNYHZeyaW', 'mt1805@gmail.com', '0869146558', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_purchase_id` (`order_purchase_id`),
  ADD KEY `inventory_ibfk_3` (`order_sale_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`order_purchase_id`) REFERENCES `purchase_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`order_sale_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
