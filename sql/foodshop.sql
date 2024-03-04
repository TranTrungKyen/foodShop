-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 12:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `total_money`) VALUES
(11, 2, 2, 2, 238000),
(18, 2, 7, 1, 49000),
(45, 1, 1, 1, 269000),
(46, 1, 2, 1, 119000),
(47, 1, 3, 1, 129000),
(49, 1, 11, 1, 53100),
(50, 50, 1, 1, 269000),
(51, 50, 11, 1, 53100),
(57, 2, 11, 1, 53100);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `thumbnail`) VALUES
(1, 'Pizza', 'category_65d43d6416fb1.jpg'),
(2, 'Burger', 'category_65d43d8fed2e1.jpg'),
(3, 'Drink', 'category_65d46af535d17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 00:49:08', 3, 269000),
(2, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 00:51:25', 1, 269000),
(3, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 00:51:29', 3, 269000),
(4, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 00:52:40', 3, 269000),
(7, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 01:02:29', 1, 269000),
(9, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', 'note', '2024-03-02 01:09:29', 2, 829000),
(10, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 01:24:53', 0, 560000),
(11, 1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '', '2024-03-02 01:32:27', 0, 570100),
(12, 50, 'Anastasia Stout', 'kientt@gmail.com', '0113 255 752', 'Velit enim distincti', '', '2024-03-02 01:33:43', 1, 322100),
(13, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', 'Nha van hoa to 12', '2024-03-03 13:06:03', 0, 490100),
(14, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', '', '2024-03-03 13:10:21', 0, 490100),
(15, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', '', '2024-03-03 13:11:21', 0, 539100),
(16, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', '', '2024-03-03 13:12:19', 0, 808100),
(17, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', '', '2024-03-03 13:38:17', 2, 1116100),
(18, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', 'test', '2024-03-03 13:39:28', 0, 609100),
(19, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', 'test1', '2024-03-03 13:39:45', 0, 1147100),
(20, 2, 'Tran Tien Dung', 'user@gmail.com', '0123456789', 'Ha Nam', '', '2024-03-03 13:57:26', 0, 340100);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 1, 1, 269000, 1, 269000),
(2, 2, 1, 269000, 1, 269000),
(3, 3, 1, 269000, 1, 269000),
(4, 4, 1, 269000, 1, 269000),
(5, 7, 1, 269000, 1, 269000),
(6, 9, 1, 269000, 2, 538000),
(7, 9, 4, 69000, 2, 138000),
(8, 9, 7, 49000, 2, 98000),
(9, 9, 6, 55000, 1, 55000),
(10, 10, 4, 69000, 2, 138000),
(11, 10, 7, 49000, 2, 98000),
(12, 10, 6, 55000, 1, 55000),
(13, 10, 1, 269000, 1, 269000),
(14, 11, 1, 269000, 1, 269000),
(15, 11, 2, 119000, 1, 119000),
(16, 11, 3, 129000, 1, 129000),
(17, 11, 11, 53100, 1, 53100),
(18, 12, 1, 269000, 1, 269000),
(19, 12, 11, 53100, 1, 53100),
(20, 13, 2, 119000, 1, 119000),
(21, 13, 7, 49000, 1, 49000),
(22, 13, 1, 269000, 1, 269000),
(23, 13, 11, 53100, 1, 53100),
(24, 14, 2, 119000, 1, 119000),
(25, 14, 7, 49000, 2, 98000),
(26, 14, 1, 269000, 1, 269000),
(27, 14, 11, 53100, 1, 53100),
(28, 15, 2, 119000, 1, 119000),
(29, 15, 7, 49000, 2, 98000),
(30, 15, 1, 269000, 2, 538000),
(31, 15, 11, 53100, 1, 53100),
(32, 16, 2, 119000, 4, 476000),
(33, 16, 7, 49000, 2, 98000),
(34, 16, 1, 269000, 2, 538000),
(35, 16, 11, 53100, 1, 53100),
(36, 17, 2, 119000, 4, 476000),
(37, 17, 7, 49000, 1, 49000),
(38, 17, 1, 269000, 2, 538000),
(39, 17, 11, 53100, 1, 53100),
(40, 18, 2, 119000, 2, 238000),
(41, 18, 7, 49000, 1, 49000),
(42, 18, 1, 269000, 1, 269000),
(43, 18, 11, 53100, 1, 53100),
(44, 19, 2, 119000, 2, 238000),
(45, 19, 7, 49000, 1, 49000),
(46, 19, 1, 269000, 3, 807000),
(47, 19, 11, 53100, 1, 53100),
(48, 20, 2, 119000, 2, 238000),
(49, 20, 7, 49000, 1, 49000),
(50, 20, 11, 53100, 1, 53100);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Pizza Tôm Vương Sỉu Mại', 269000, 0, 'food_65d714ba496a8.jpg', 'Tôm, Thịt Gà, Thịt Xông Khói, Phô Mai, Nấm, Ớt Chuông, Hành Tây', '2024-02-21 18:53:16', '2024-02-22 16:32:42', 0),
(2, 1, 'Pizza Phô Mai', 119000, 0, 'food_65d639b28bd80.jpg', 'Thưởng thức vị gà Karaage chiên giòn cắt lát trên nền pizza đậm vị, cùng nấm tươi, hành tây hoà quyện xốt phô mai', '2024-02-22 00:58:10', '2024-02-22 00:58:10', 0),
(3, 1, 'Pizza Hải Sản Nhiệt Đới', 129000, 0, 'food_65d63f8a0e5cc.jpg', 'Khi biển cả cũng được thu gọn trong một chiếc pizza với đầy ắp tôm, thanh cua, xen lẫn cà chua, bắp, thơm, thì là trên nền phô mai đậm vị', '2024-02-22 01:23:06', '2024-02-22 01:23:06', 0),
(4, 2, 'Charcoal crispy salmon burger', 69000, 0, 'food_65d640a37fae0.jpg', 'Burger cá hồi giòn vỏ than tre', '2024-02-22 01:27:47', '2024-02-22 01:27:47', 0),
(5, 3, 'Exercitationem quas ', 326, 80, 'food_65d702caab77a.jpg', 'Laudantium ea quae ', '2024-02-22 15:16:10', '2024-02-22 15:16:10', 1),
(6, 2, 'BURGER WHOPPER JR', 55000, 0, 'food_65d726ba3eb8e.jpg', 'Burger bò nướng Whopper ( cỡ vừa )', '2024-02-22 15:42:23', '2024-02-22 17:52:44', 0),
(7, 2, 'FISH BURGER', 49000, 0, 'food_65d7208d9d53b.jpg', 'Burger Cá giòn', '2024-02-22 17:23:09', '2024-02-22 17:23:09', 0),
(8, 3, 'TRÀ HIBISCUS THANH YÊN 330ML', 59000, 0, 'food_65d7213788d71.jpg', 'Trà xanh hoa lài Đài Loan, hoa lạc thần, mứt thanh yên Nhật, trân châu trắng', '2024-02-22 17:25:59', '2024-02-22 17:25:59', 0),
(9, 3, 'CHÈ DƯỠNG NHAN 330ML', 53000, 0, 'food_65d7282c345f9.jpg', 'Đông trùng hạ thảo, hạt chia, táo đỏ, hạt sen, long nhãn, nấm tuyết, tuyết yến, nhựa đào, kỷ tử, táo cắt, lá dứa, đường phèn', '2024-02-22 17:55:40', '2024-02-22 17:55:40', 0),
(10, 3, 'TRÀ SỮA OLOONG 330ML', 53000, 0, 'food_65d7286ba57fe.jpg', 'Trà sữa Oolong TASTY là sự hòa quyện của tinh túy giữa trà oolong vùng Bảo Lộc trứ danh và bột sữa thơm béo. Với tỷ lệ trà, sữa và đường phù hợp, mỗi ly trà sữa oolong có vị ngọt thanh dịu nhẹ, dễ dàng làm xiêu lòng mọi tín đồ trà sữa. TASTY Kitchen hy vọng, mỗi ly trà sữa oloong sẽ giúp quý khách tận hưởng vị ngon lan tỏa đến từng giác quan và tiếp thêm năng lượng cho ngày tươi mới.', '2024-02-22 17:56:43', '2024-02-22 17:56:43', 0),
(11, 3, 'Trà lài nhãn 330ml', 59000, 10, 'food_65e21e90cd6f3.jpg', 'Trà lài luôn là khởi đầu dễ chịu để sáng tạo nên những thức uống thanh nhiệt thú vị. Khi kết hợp cùng long nhãn, trà lài được cân bằng độ chát nhẹ bằng vị ngọt dịu thanh nhã, tạo nên một thức uống giải nhiệt, an thần hiệu quả.', '2024-03-02 01:29:36', '2024-03-02 01:29:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Tran Trung Kien', 'admin@gmail.com', '0123456789', 'Ha Noi', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-10 12:41:34', '2024-02-10 12:41:34', 0),
(2, 'Tran Tien Dung', 'user@gmail.com', '033333333', 'Tây Ninh', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 18:31:34', '2024-03-04 00:58:15', 0),
(3, 'Hedy Mcconnell', 'nemehenisa@mailinator.com', '+1 (119) 549-5228', 'Et laborum animi ma', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 20:23:56', '2024-02-10 20:23:56', 0),
(5, 'Yael King', 'pajededo@mailinator.com', '+1 (744) 729-4475', 'Praesentium reiciend', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 20:25:52', '2024-02-10 20:25:52', 0),
(6, 'Bethany Wood', 'vefazany@mailinator.com', '+1 (798) 376-7278', 'Qui quia et repellen', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 20:26:45', '2024-02-10 20:26:45', 0),
(7, 'Audrey Beard', 'qyjacuju@mailinator.com', '+1 (961) 829-5744', 'A dolor excepturi cu', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 20:27:41', '2024-02-10 20:27:41', 0),
(8, 'Xena Powell', 'zecehiz@mailinator.com', '+1 (937) 654-4151', 'Fugiat eum sit numq', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 20:28:49', '2024-02-10 20:28:49', 0),
(9, 'Bruno Pruitt', 'qugexupo@mailinator.com', '+1 (744) 786-8061', 'Voluptate fuga Sunt', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 21:00:44', '2024-02-10 21:00:44', 0),
(10, 'Hollee Fisher', 'dywiziryne@mailinator.com', '+1 (996) 854-8003', 'Voluptas voluptate d', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-10 21:01:05', '2024-02-10 21:01:05', 0),
(11, 'Ariana Bass', 'kavy@gmail.com', '0587 142 366', 'Ut duis quis incidid', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-10 21:02:42', '2024-02-10 21:02:42', 0),
(12, 'Lionel Bailey', 'sacavud@gmail.com', '0218 921 134', 'Excepteur laborum re', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-10 21:02:48', '2024-02-10 21:02:48', 0),
(13, 'Rowan Mcgee', 'damo@mailinator.com', '+1 (638) 729-4218', 'Non dolore id dicta ', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-10 21:03:59', '2024-02-10 21:03:59', 0),
(17, 'Cameran Reed', 'xibityxefu@mailinator.com', '+1 (474) 739-4542', 'Similique Nam earum ', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1, '2024-02-13 00:45:50', '2024-02-13 00:45:50', 0),
(18, 'Lesley Black', 'lubecefogu@mailinator.com', '+1 (655) 805-4424', 'Asperiores dolor cum', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-13 00:47:41', '2024-02-13 00:47:41', 0),
(19, 'Thomas Acosta', 'tohu@mailinator.com', '+1 (546) 243-9206', 'Suscipit error quo e', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-13 10:18:04', '2024-02-13 10:18:04', 0),
(20, 'Reed Miller', 'kihopahaz@mailinator.com', '+1 (971) 785-2369', 'Consequuntur do ab v', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-16 10:21:08', '2024-02-16 10:21:08', 0),
(21, 'Noelle Kemp', 'wimyzajaxa@mailinator.com', '+1 (375) 422-2132', 'Quis libero cumque l', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:27:05', '2024-02-18 23:27:05', 0),
(22, 'Cyrus Russo', 'vywify@mailinator.com', '+1 (921) 612-3297', 'Quaerat accusamus et', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:27:40', '2024-02-18 23:27:40', 0),
(23, 'Aaron Macdonald', 'nemal@mailinator.com', '+1 (802) 948-2124', 'Velit facere consequ', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:30:49', '2024-02-18 23:30:49', 0),
(24, 'Maile Garner', 'webo@mailinator.com', '+1 (423) 214-8047', 'Qui explicabo Disti', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:32:32', '2024-02-18 23:32:32', 0),
(25, 'Boris Vang', 'kukyqud@mailinator.com', '+1 (866) 477-5885', 'Ullamco omnis ut et ', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:35:17', '2024-02-18 23:35:17', 0),
(26, 'Hilary Brooks', 'paqibufyta@mailinator.com', '+1 (703) 146-1688', 'Ratione enim in eum ', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:37:25', '2024-02-18 23:37:25', 0),
(27, 'Merrill Ortiz', 'zejityn@mailinator.com', '+1 (634) 675-4862', 'Et nulla ex voluptat', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:38:09', '2024-02-18 23:38:09', 1),
(28, 'Fritz Sheppard', 'bexokaniva@mailinator.com', '+1 (306) 284-1327', 'Ducimus est sunt e', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-18 23:45:02', '2024-02-18 23:45:02', 1),
(29, 'Tana Brock', 'tixoso@mailinator.com', '+1 (835) 289-6752', 'Velit est minim ipsa', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-19 00:05:07', '2024-02-19 00:05:07', 1),
(30, 'Joy Rasmussen', 'sabivylut@gmail.com', '0403 672 943', 'Anim neque pariatur', '7694f4a66316e53c8cdd9d9954bd611d', 1, '2024-02-19 00:05:18', '2024-02-19 00:05:18', 1),
(31, 'Igor Miles', 'kibafu@mailinator.com', '+1 (478) 154-7282', 'Aut molestiae consec', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 00:05:31', '2024-02-19 00:05:31', 0),
(32, 'Wendy Caldwell', 'fybybanexa@mailinator.com', '+1 (301) 498-3699', 'Corrupti ut nostrum', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 00:06:28', '2024-02-19 00:06:28', 0),
(33, 'Honorato Wheeler', 'taba@mailinator.com', '+1 (391) 759-5114', 'Eiusmod minima unde ', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 00:07:05', '2024-02-19 00:07:05', 0),
(34, 'Tanner Skinner', 'jaroqufy@mailinator.com', '+1 (474) 631-6618', 'Quia nostrum sint to', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-19 00:08:51', '2024-02-19 00:08:51', 1),
(35, 'Yeo Lucas', 'lywyquwiho@mailinator.com', '+1 (981) 826-9366', 'Quisquam aute ipsum', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 00:09:01', '2024-02-19 00:09:01', 0),
(36, 'Lane Nguyen', 'nesolime@gmail.com', '0146 053 875', 'Ad ab voluptas cupid', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, '2024-02-19 00:14:23', '2024-02-19 00:14:23', 0),
(37, 'Lucy Stein', 'xyfi@gmail.com', '0731 565 504', 'Magna repudiandae te', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-19 12:26:39', '2024-02-19 12:26:39', 1),
(38, 'Martin Manning', 'qaza@gmail.com', '0548 314 539', 'Ea quia tempore ame', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1, '2024-02-19 12:27:04', '2024-02-19 12:27:04', 1),
(39, 'Cody Blake', 'kahihyxunu@gmail.com', '0744 467 118', 'Ratione similique li', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-19 12:28:28', '2024-02-19 12:28:28', 1),
(40, 'Eaton Mills', 'xogixer@gmail.com', '0892 717 596', 'Reprehenderit in se', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 12:30:40', '2024-02-19 12:30:40', 0),
(41, 'Helen Casey', 'zope@gmail.com', '0521 861 703', 'Voluptate officia iu', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, '2024-02-19 12:51:18', '2024-02-19 12:51:18', 1),
(42, 'Rogan Graham', 'lirysifo@gmail.com', '0332 362 995', 'Maiores et duis pari', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1, '2024-02-19 12:53:15', '2024-02-19 12:53:15', 1),
(43, 'Adena Hartman', 'gozyduhyv@gmail.com', '0541 831 284', 'Omnis numquam do fug', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, '2024-02-19 12:54:33', '2024-02-19 12:54:33', 1),
(44, 'Hedy Farley', 'zowo@gmail.com', '0202 959 118', 'Ipsam labore est re', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, '2024-02-19 12:58:15', '2024-02-19 12:58:15', 1),
(45, 'Brooke Nolan', 'vodoxawyko@gmail.com', '0415 691 232', 'Quia dicta quis natu', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, '2024-02-19 12:58:38', '2024-02-19 12:58:38', 0),
(46, 'Glenna Foley', 'cidyza@gmail.com', '0411 767 248', 'Quia incididunt in t', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 13:01:40', '2024-02-19 13:01:40', 0),
(47, 'Norman Dejesus', 'kemucydej@gmail.com', '0719 457 328', 'Cum exercitation ist', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-19 13:13:17', '2024-02-19 13:13:17', 1),
(49, 'Kylie George', 'mabyg@gmail.com', '0939 922 759', 'Aut est ducimus inc', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-19 13:29:09', '2024-02-19 13:29:09', 1),
(50, 'Anastasia Stout', 'kientt@gmail.com', '0113 255 752', 'Velit enim distincti', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-26 20:40:10', '2024-02-26 20:40:10', 0),
(51, 'Ezekiel Roberson', 'kientt@gmail.com', '0285 448 348', 'Impedit eius beatae', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-26 20:41:12', '2024-02-26 20:41:12', 0),
(52, 'Wyatt Mcfadden', 'dywa@gmail.com', '0686 789 904', 'Cum labore eum sapie', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-29 23:22:50', '2024-02-29 23:22:50', 1),
(53, 'Rogan Rogers', 'dywa@gmail.com', '0959 095 161', 'Alias enim id quaer', '0cc175b9c0f1b6a831c399e269772661', 2, '2024-02-29 23:25:30', '2024-02-29 23:25:30', 0),
(54, 'Abel Joyce', 'rihyfar@gmail.com', '0185 662 736', 'Nobis ex esse eaque ', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-29 23:53:50', '2024-02-29 23:53:50', 1),
(55, 'Samson Britt', 'qicacuzyma@gmail.com', '0405 169 303', 'Doloribus minima ani', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-29 23:55:58', '2024-02-29 23:55:58', 1),
(56, 'Josiah Patterson', 'lyso@gmail.com', '0545 835 705', 'Modi laboris ullamco', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-29 23:56:14', '2024-02-29 23:56:14', 1),
(57, 'Marny Maxwell', 'jusod@gmail.com', '0963 477 882', 'Cum corporis sit ex', '0cc175b9c0f1b6a831c399e269772661', 1, '2024-02-29 23:56:44', '2024-02-29 23:56:44', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
