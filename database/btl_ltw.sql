-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 03:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl_ltw`
--
CREATE DATABASE IF NOT EXISTS btl_ltw DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE btl_ltw;
-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `userName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `pass`, `phone`, `userName`) VALUES
(1, 'unieat@gmail.com', '51fc6b7438058dc6899fa4e969865fc83238011bf6fe076d173c9e048d0b8493', '0765710073', 'unieat'),
(2, 'ngocyen@gmail.com', '615329269eab7b16e725193b7d556f4da727bd135158513f11fecd57021a543a', '0904653345', 'Yến'),
(3, 'minhnhat@gmail.com', '8134803b59051f57c50bc07b4160c9e3379d9cd5013b779228990a791366ee12', '0123456789', 'Nhật'),
(4, 'chouchou@gmail.com', 'ae7b75c7372b1bd3d2218cb17a165fac9fb41b9a81389d5fa0ab28dc4956c416', '0902361779', 'Chou'),
(5, 'nana@gmail.com', '1e58a672479292cc17e578521440baf7c98258c0e50d911aaa2ad77b64bb97db', '0765710073', 'Na');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `idSeller` int(11) NOT NULL,
  `header` mediumtext NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `content`, `idSeller`, `header`, `isDelete`, `image`) VALUES
(20, 'Xin chào các tín đồ của trà sữa và trân châu đen!<br/>🌟 Bạn đã bao giờ trải nghiệm hương vị mới lạ đầy thú vị chưa? Nếu chưa, thì hãy đến với Quán Trà Sữa Trân Châu Xanh ngay hôm nay để khám phá những ly trà sữa độc đáo và hấp dẫn nhất!<br/>🌟 Tại Quán Trà Sữa Trân Châu Xanh, chúng tôi tự hào mang đến cho quý khách hàng không chỉ là những ly trà sữa thơm ngon mà còn là trải nghiệm độc đáo không thể nào quên. Với sự kết hợp tinh tế giữa trà sữa và những viên trân châu mềm mại, bạn sẽ được thưởng thức một loạt các loại đồ uống phong phú và đa dạng.<br/>🥤 Đừng bỏ lỡ các món đặc biệt tại Quán Trà Sữa Trân Châu Xanh: - Trà sữa trân châu xanh cổ điển, thơm ngon và béo ngậy. - Trà sữa trân châu đặc biệt, kết hợp hương vị trái cây tươi mới. - Trà sữa trân châu socola, một sự kết hợp hoàn hảo giữa trà sữa và socola thơm ngon. - Và còn nhiều món ăn nhẹ và thức uống khác để bạn lựa chọn! Đến với Quán Trà Sữa Trân Châu Xanh, không chỉ là để thưởng thức đồ uống ngon lành mà còn là để tận hưởng không gian ấm cúng và dịch vụ chu đáo từ đội ngũ nhân viên chuyên nghiệp của chúng tôi.<br/>📍 Địa chỉ: [Địa chỉ của quán] 📞 Liên hệ: [Số điện thoại]<br/>Hãy đến và cảm nhận sự khác biệt tại Quán Trà Sữa Trân Châu Xanh ngay hôm nay! Đừng bỏ lỡ cơ hội thưởng thức hương vị mới lạ và độc đáo chỉ có tại chúng tôi! Cảm ơn bạn đã ủng hộ và chia sẻ thông điệp này đến cộng đồng! 🌟', 1, 'Khám phá hương vị mới tại Quán Trà Sữa Trân Châu Xanh!', 0, '/BTL/public/BlogImage/blog1.png'),
(21, 'Có 2 cách pha chế:<br/>⚡️Cho tất cả hỗn hợp với chút nước sôi 35-40 độ trộn đều là ăn đc (với bạn thích ăn ấm nóng)<br/>⚡️với bạn thích ăn lạnh có thể thả thêm đá nếu muốn.<br/>🌈🌈3 vị cho mn chọn: <br/>• 🍑 Ngũ cốc ĐÀO 🍑 •<br/>• 🍒 Ngũ cốc việt quất 🍒 •<br/>• 🥭 Ngũ cốc XOÀI 🥭', 1, '🥗🥙 NGŨ CỐC TRÁI CÂY TAOZHEN #kèm_sữa_chua 🥗🥙', 0, '/BTL/public/BlogImage/blog2.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userId`, `total`) VALUES
(2, 20000),
(3, 90000),
(4, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `typeName` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `typeName`, `image`) VALUES
(1, 'Best Seller', 'https://static.vecteezy.com/system/resources/previews/005/677/351/original/best-seller-badge-icon-best-seller-award-logo-isolated-vector.jpg'),
(2, 'Đồ ăn Hàn Quốc', 'https://nypost.com/wp-content/uploads/sites/2/2015/10/sushi-main.jpg?quality=90&strip=all&w=1200'),
(3, 'Cơm - Mì - Bún', 'https://images.foody.vn/res/g105/1044094/prof/s640x400/foody-upload-api-foody-mobile-av-262394be-221219140705.jpeg'),
(4, 'Ăn vặt', 'https://giochabobich.com/wp-content/uploads/2022/12/banh-trang-cuon-cha-gio-1000x565.jpg'),
(5, 'Trà sữa', 'https://posapp.vn/wp-content/uploads/2018/03/Tra-sua-tran-chau.png'),
(6, 'Trà trái cây', 'https://bizweb.dktcdn.net/100/290/576/files/hongtratraicay-copy.jpg?v=1620121607830'),
(7, 'Sinh tố', 'https://i.ytimg.com/vi/1U_8Yjy8kX4/maxresdefault.jpg'),
(8, 'Nước ngọt', 'https://genk.mediacdn.vn/2017/95y56z78-1496903896-1498248535506.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idAccount` int(11) NOT NULL,
  `idBlog` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `idAccount`, `idBlog`, `content`) VALUES
(1, 2, 20, 'Có ngon thiệt hong dọ ??'),
(2, 5, 20, 'Ngon thiệt á mấy bà ơi :v'),
(3, 4, 20, 'Tui làm bên đó luồng luồng ra nè, ngon nhaaaaaa :)))'),
(4, 3, 21, 'Có ai làm theo chưa cả nhà?'),
(5, 2, 21, 'Làm theo ròi mà hỏng có ra ~~'),
(6, 5, 21, 'Tại bà dở đó :)))'),
(7, 4, 21, 'Làm theo ròi nhaaaa. Sau khong làm theo nữa :)');

--
-- Triggers `comments`
--
DELIMITER $$
CREATE TRIGGER `comment_notification_trigger` AFTER INSERT ON `comments` FOR EACH ROW BEGIN
    DECLARE user_name VARCHAR(255);
    DECLARE time_noti DATETIME;
    DECLARE notification_id INT;

    -- Get the user name associated with the new comment
    SELECT userName INTO user_name FROM accounts WHERE id = NEW.idAccount;

    -- Set the time of the notification
    SET time_noti = NOW();

    -- Insert into notifications table
    INSERT INTO notifications (message, timeNoti, title)
    VALUES (CONCAT('Khách hàng ', user_name, ' đã bình luận vào bài viết của bạn.'), time_noti, 'Có bình luận mới trên bài viết!');

    -- Get the ID of the newly inserted notification
    SELECT LAST_INSERT_ID() INTO notification_id;

    -- Insert into notify table
    INSERT INTO notify (idAccount, idNotifications)
    VALUES (1, notification_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timeNoti` datetime NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `timeNoti`, `title`) VALUES
(5, 'Đơn hàng (Mã đơn: 6) nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2024-05-05 15:53:54', 'Bạn có đơn hàng mới'),
(6, 'Sản phẩm (Mã sản phẩm: 11) vừa bị báo cáo. Bạn hãy đến xem xét và xử lý nhanh nào!', '2024-05-05 16:02:43', 'Bạn có sản phẩm bị báo cáo'),
(7, 'Đơn hàng (Mã đơn: 7) nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2024-05-06 00:51:14', 'Bạn có đơn hàng mới'),
(8, 'Đơn hàng (Mã đơn: 8) nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2024-05-06 02:06:51', 'Bạn có đơn hàng mới'),
(9, 'Khách hàng Na đã bình luận vào bài viết của bạn.', '2024-05-07 21:54:54', 'Có bình luận mới trên bài viết!'),
(10, 'Khách hàng Chou đã bình luận vào bài viết của bạn.', '2024-05-07 21:59:13', 'Có bình luận mới trên bài viết!');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `idAccount` int(11) NOT NULL,
  `idNotifications` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`idAccount`, `idNotifications`, `isRead`, `isDeleted`) VALUES
(1, 5, 0, 0),
(1, 6, 0, 0),
(1, 7, 0, 0),
(1, 8, 0, 0),
(1, 9, 0, 0),
(1, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `payment` text DEFAULT NULL,
  `statusOrder` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `address` text NOT NULL,
  `isCanceled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `payment`, `statusOrder`, `note`, `dateCreated`, `total`, `address`, `isCanceled`) VALUES
(1, 2, 'Ship COD', 'Đã hoàn thành', 'Giao rào A9 giúp em', '2024-04-08 10:30:32', 90000.00, 'Ký túc xá khu A', 0),
(2, 2, 'Ship COD', 'Đã hoàn thành', 'Giao rào A9 giúp em', '2024-03-04 10:31:56', 150000.00, 'Ký túc xá khu A', 1),
(3, 3, 'MOMO', 'Đã hoàn thành', 'Giao cổng KTX ạ', '2024-05-01 20:38:42', 105000.00, 'Ký túc xá khu B', 0),
(4, 3, 'MOMO', 'Đã hoàn thành', 'Tới thì gọi em trước 10p ạ', '2024-03-11 17:39:18', 40000.00, 'Ký túc xá khu A', 1),
(5, 4, 'MOMO', 'Đang giao hàng', 'A8-313', '2024-05-05 14:46:18', 80000.00, 'Ký túc xá khu A', 0),
(6, 5, 'Ship COD', 'Đang giao hàng', 'Gọi em trước 5p ạ', '2024-05-05 15:00:19', 35000.00, 'Ký túc xá khu B', 0),
(7, 2, 'MOMO', 'Chờ chuẩn bị', 'A8-300', '2024-05-05 19:51:14', 309000.00, 'KTX khu A', 0),
(8, 2, 'MOMO', 'Chờ chuẩn bị', 'Giao rào A4 giúp em ạ', '2024-05-05 21:06:51', 130000.00, 'KTX khu A', 0);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `notify_new_order` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE new_notification_id INT;

    -- Insert into notifications table
    INSERT INTO notifications (message, title, timeNoti)
    VALUES (CONCAT('Đơn hàng (Mã đơn: ', NEW.id, ') nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!'), 'Bạn có đơn hàng mới', NOW());

    -- Get the ID of the newly inserted notification
    SET new_notification_id = LAST_INSERT_ID();

    -- Insert into notify table
    INSERT INTO notify (idAccount, idNotifications)
    VALUES (1, new_notification_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT 0,
  `isHidden` tinyint(1) DEFAULT 0,
  `isReported` tinyint(1) DEFAULT 0,
  `price` decimal(10,2) NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `deliveryType` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rate` decimal(3,1) DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `description`, `isDeleted`, `isHidden`, `isReported`, `price`, `idCategory`, `deliveryType`, `image`, `rate`) VALUES
(1, 'Trà sữa ba anh em', 100, 'Có 3 loại topping: thạch, trân châu, bánh flan', 0, 0, 0, 25000.00, 5, 'Cửa hàng tự vận chuyển', 'https://product.hstatic.net/1000360860/product/tra_sua_toco_517ae6b8d48942a3b0ff7f40fbe2fcc2_master.jpg', 0.0),
(2, 'Sữa tươi trân châu đường đen', 90, 'Cửa hàng tự vận chuyển', 0, 0, 0, 30000.00, 1, 'Cửa hàng tự vận chuyển', 'https://feelingteaonline.com/wp-content/uploads/2020/08/s%C6%B0a-tuoi-tc-%C4%91%C6%B0%E1%BB%9Dng-%C4%91en.jpg', 0.0),
(3, 'Trà trái cây nhiệt đới', 200, 'Trái cây bao gồm: dâu, cam, dưa lưới, xoài, ổi', 0, 0, 0, 25000.00, 6, 'Cửa hàng tự vận chuyển', 'https://congthucphache.com/wp-content/uploads/2022/11/tra-trai-cay-nhiet-doi.jpg', 0.0),
(4, 'Trà bí đao hạt chia', 50, 'Trà bí đao hạt chia giải nhiệt, thích hợp cho mùa hè nóng bức!!! <3', 0, 0, 0, 15000.00, 6, 'Cửa hàng tự vận chuyển', 'https://images.foody.vn/res/g79/781003/s800/foody-tra-bi-dao-hat-chia-ba-trieu-252-636746014125974092.jpg', 0.0),
(5, 'Trà sữa ô long', 85, 'Trà ô long tự nhiên, thanh nhiệt!', 0, 0, 0, 27000.00, 5, 'Cửa hàng tự vận chuyển', 'https://feelingteaonline.com/wp-content/uploads/2020/08/Tr%C3%A0-Olong-s%E1%BB%AFa.jpg', 0.0),
(6, 'Sinh tố dâu', 43, 'Dâu tây từ Đà Lạt. Mùa này dâu hơi mắc, quý khách cân nhắc khi mua', 0, 0, 0, 35000.00, 7, 'Cửa hàng tự vận chuyển', 'https://www.hoidaubepaau.com/wp-content/uploads/2015/12/sinh-to-dau.jpg', 0.0),
(7, 'Coca-Pepsi-7up', 100, 'Quý khách chọn 1 trong 3', 0, 0, 0, 10000.00, 8, 'Cửa hàng tự vận chuyển', 'https://cdn.tgdd.vn/Files/2017/04/12/971458/cach-lua-chon-va-su-dung-nuoc-ngot-khong-gay-hai-suc-khoe-2_760x506.jpg', 0.0),
(8, 'Trà sữa truyền thống', 190, 'Trà sữa thương hiệu của quán <3', 0, 0, 0, 20000.00, 1, 'Cửa hàng tự vận chuyển', 'https://kiwixanh.com/wp-content/uploads/2021/12/tra-sua-truyen-thong-1.jpg', 0.0),
(9, 'Cơm chiên dương châu', 40, 'Cơm chiên dương châu luôn là sự lựa chọn của bạn ^^', 0, 0, 0, 30000.00, 3, 'Cửa hàng tự vận chuyển', 'https://4.bp.blogspot.com/-F5b2m7upMiw/WkSt1qhi7_I/AAAAAAAAADY/doli22ApRcU6IJIKo35JjH8LHhjgDSRmACLcBGAs/s1600/com-chien-duong-chau-2018.jpg', 0.0),
(10, 'Mì ý sốt thịt bò bằm', 40, '89% là thịt :>', 0, 0, 0, 40000.00, 3, 'Cửa hàng tự vận chuyển', 'https://forza.com.vn/wp-content/uploads/2021/07/cach-lam-mi-y-thom-ngon-chuan-vi-tai-nha-6.jpeg', 0.0),
(11, 'Tokbokki phô mai', 40, 'Có kèm 1 trứng lòng đào ^^', 0, 0, 0, 35000.00, 2, 'Cửa hàng tự vận chuyển', 'https://cdn.shopify.com/s/files/1/0617/2497/files/cach-lam-tokbokki_a2179426-f894-4dda-a709-52fe9f07d6ab.jpg', 0.0),
(12, 'Bánh tráng trộn', 40, 'Bánh tráng trộn tại gia :))', 0, 0, 0, 25000.00, 4, 'Cửa hàng tự vận chuyển', 'https://media.cooky.vn/recipe/g1/1615/s800x500/recipe-cover-r1615.jpg', 0.0),
(13, 'Cơm gà xối mỡ', 57, 'Da giòn thịt mềm. Sự lựa chọn lý tưởng cho bữa ăn của bạn <3', 0, 0, 0, 30000.00, 3, 'Cửa hàng tự vận chuyển', 'https://cdn.tgdd.vn/2021/01/CookProduct/1-1200x676-22.jpg', 0.0),
(14, 'Cơm trộn thịt bò bằm', 40, 'Cơm trộn Hàn quắc, ăn ngon như ăn ở Hàn quắc ^^', 0, 0, 0, 35000.00, 2, 'Cửa hàng tự vận chuyển', 'https://toplist.vn/images/800px/com-tron-ba-chi-bo-octopus-king-vua-bach-tuoc-han-200844.jpg', 0.0),
(15, 'Bún bò Huế', 50, 'Bún bò Huế: 1 sự lựa chọn bình dân cho mọi nhà :>', 0, 0, 0, 30000.00, 3, 'Cửa hàng tự vận chuyển', 'https://digifood.vn/blog/wp-content/uploads/2021/10/cac-nau-bun-bo-8.jpg', 0.0),
(16, 'Sinh tố bơ', 15, 'Sinh tố bơ làm từ bơ nguyên chất ~~', 0, 0, 0, 29000.00, 7, 'Cửa hàng tự vận chuyển', 'https://vuaphache.net/wp-content/uploads/2021/02/cach-pha-sinh-to-bo.jpg', 0.0),
(17, 'Bún mọc', 48, 'Khong ngon khong lấy liền :))', 0, 0, 0, 30000.00, 3, 'Cửa hàng tự vận chuyển', 'https://img-global.cpcdn.com/recipes/e69d058438bc267c/680x482cq70/bun-m%E1%BB%8Dc-recipe-main-photo.jpg', 0.0),
(18, 'Combo đồ chiên nhà tui', 30, 'Combo gồm có: cá viên chiên, bò viên, chả cá chiên, cốm chiên, tôm chiên, phô mai que, đậu bắp, xúc xích', 0, 0, 0, 30000.00, 4, 'Cửa hàng tự vận chuyển', 'https://hoangviettravel.vn/wp-content/uploads/2020/09/ca-vien-chien-quan-1-05.jpg', 0.0),
(19, 'Trà dâu', 15, 'Dâu tươi từ Đà Lạt, em mới đi hôm qua :))', 0, 0, 0, 45000.00, 6, 'Cửa hàng tự vận chuyển', 'https://cdn.tgdd.vn/Files/2019/12/29/1229060/cach-lam-tra-dau-dong-du-mat-lanh-giai-nhiet-don-gian-tai-nha-202209011546111121.jpg', 0.0),
(20, 'Sinh tố dừa', 25, 'Sinh tố dừa ngọt béo giải nhiệt tức thì !', 0, 0, 0, 30000.00, 7, 'Cửa hàng tự vận chuyển', 'https://cdn.tgdd.vn/Files/2020/02/17/1236915/cach-lam-sinh-to-dua-ngot-beo-giai-nhiet-tuc-thi-202111011153261280.jpg', 0.0),
(21, 'Nước suối', 20, 'Nước suối nhà nhà đều có nhưng uống thêm cho vui :*', 0, 0, 0, 7000.00, 8, 'Cửa hàng tự vận chuyển', 'https://product.hstatic.net/1000242782/product/aquafina-500ml_e2d2f301b6454680a442989093e13c1c_grande.png', 0.0),
(22, 'Cơm cuộn rong biển', 45, 'Kimpap hàn quốc ^^', 0, 0, 0, 33000.00, 2, 'Cửa hàng tự vận chuyển', 'https://www.cet.edu.vn/wp-content/uploads/2022/07/kimbap-han-quoc-chay.jpg', 0.0),
(23, 'Cơm chay', 35, 'Tịnh tâm', 0, 0, 0, 25000.00, 3, 'Cửa hàng tự vận chuyển', 'https://tintuc.vnshop.vn/wp-content/uploads/2020/05/m%C3%B3n-%C4%83n-chay-t%E1%BB%AB-%C4%91%E1%BA%ADu-ph%E1%BB%A5-%C4%91%E1%BA%ADu-ph%E1%BB%A5-kho-chay.jpg', 0.0);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `notify_report_product` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    DECLARE new_notification_id INT; -- Declare variable outside of BEGIN...END block

    IF OLD.isReported = 0 AND NEW.isReported = 1 THEN
        -- Insert into notifications table
        INSERT INTO notifications (message, title, timeNoti)
        VALUES (CONCAT('Sản phẩm (Mã sản phẩm: ', NEW.id, ') vừa bị báo cáo. Bạn hãy đến xem xét và xử lý nhanh nào!'), 'Bạn có sản phẩm bị báo cáo', NOW());

        -- Get the ID of the newly inserted notification
        SET new_notification_id = LAST_INSERT_ID();

        -- Insert into notify table
        INSERT INTO notify (idAccount, idNotifications)
        VALUES (1, new_notification_id);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_in_cart`
--

CREATE TABLE `product_in_cart` (
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_in_cart`
--

INSERT INTO `product_in_cart` (`idUser`, `idProduct`, `quantity`, `note`, `id`) VALUES
(2, 8, 2, 'Lấy ít đá cả 2 ly ạ', 1),
(2, 10, 2, 'không lấy thịt nha', 2),
(2, 10, 2, '2 phần này thì lấy thịt khong lấy mì nha', 3),
(3, 17, 3, NULL, 4),
(4, 18, 2, 'Cho em 2 phần tương: 1 tương đen 1 tương ớt', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_in_order`
--

CREATE TABLE `product_in_order` (
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_in_order`
--

INSERT INTO `product_in_order` (`idProduct`, `idOrder`, `price`, `quantity`, `note`, `id`) VALUES
(1, 3, 25000.00, 1, 'Ít đá', 1),
(6, 1, 35000.00, 1, NULL, 2),
(7, 4, 40000.00, 4, NULL, 3),
(8, 3, 20000.00, 1, 'Ít đá\r\n', 4),
(9, 1, 30000.00, 1, NULL, 5),
(9, 3, 60000.00, 2, NULL, 6),
(10, 2, 80000.00, 2, NULL, 7),
(10, 5, 80000.00, 2, NULL, 8),
(11, 2, 70000.00, 2, 'Có thể làm ít cay không ạ', 9),
(11, 6, 35000.00, 1, 'Ít cay', 10),
(12, 1, 25000.00, 1, 'Không cay ạ', 11),
(1, 7, 50000.00, 2, '70 duong, da', 12),
(2, 7, 60000.00, 2, 'nhieu duong giup em', 13),
(5, 7, 54000.00, 2, 'Lay com them', 14),
(3, 7, 75000.00, 3, NULL, 15),
(11, 7, 70000.00, 2, 'khong lay trung hong dao', 16),
(11, 8, 70000.00, 2, 'phomai c? l?n', 17),
(8, 8, 60000.00, 3, 'khong cho ??', 18);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ID` int(11) NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT 0,
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `respone` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `timeRating` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ID`, `isHidden`, `idOrder`, `idUser`, `respone`, `content`, `stars`, `timeRating`) VALUES
(1, 0, 1, 2, 'Cảm ơn em nhé! Lần sau ủng hộ quán tiếp nhé', 'Mới ăn lần đầu nhưng ngon lắm mn ạ ^^ ', 4, '2024-04-09 10:37:29'),
(2, 0, 2, 2, NULL, 'Em quay lại rồi đây và đồ ăn vẫn ngon như ngày nàoooo', 2, '2024-04-16 10:38:30'),
(3, 0, 3, 3, 'Cảm ơn em nhá <3', 'Ăn biết bao lần ròi, lần nào cũng hợp khẩu vị', 3, '2024-05-01 10:39:12'),
(4, 0, 2, 2, NULL, 'quá ngon luôn', 5, '2024-05-05 22:03:37'),
(5, 0, 8, 2, NULL, 'Là có ngon chưa', 2, '2024-05-07 21:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `idAccount` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `timeReport` datetime DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`idAccount`, `idProduct`, `timeReport`, `content`) VALUES
(2, 2, '2024-05-13 00:21:02', 'Hong có ngon :>'),
(2, 3, '2024-04-02 10:23:30', 'Test thử'),
(2, 4, '2024-03-11 10:24:01', 'Test thử\r\n'),
(3, 1, '2024-05-22 00:09:43', 'Sản phẩm được báo cáo chứa quá nhiều trân châu có nghi ngờ xuất xứ không rõ ràng, cần được kiểm tra trước khi kinh doanh trở lại.');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `idAccount` int(11) NOT NULL,
  `nameStore` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `isClose` tinyint(1) DEFAULT 0,
  `money` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`idAccount`, `nameStore`, `address`, `tiktok`, `instagram`, `facebook`, `isClose`, `money`) VALUES
(1, 'UniEat', 'Làng Đại Học', 'https://www.tiktok.com/@t1', 'https://www.instagram.com/t1lol/?igsh=aWFudmQ0Y2kzemVk', 'https://www.facebook.com/T1LoL', 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idAccount` int(11) NOT NULL,
  `isReported` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idAccount`, `isReported`) VALUES
(2, 0),
(3, 0),
(4, 0),
(5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSeller` (`idSeller`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAccount` (`idAccount`),
  ADD KEY `idBlog` (`idBlog`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`idAccount`,`idNotifications`),
  ADD KEY `idNotifications` (`idNotifications`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduct` (`idProduct`) USING BTREE,
  ADD KEY `fk_user_id` (`idUser`);

--
-- Indexes for table `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `product_in_order_ibfk_1` (`idProduct`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idAccount`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`idAccount`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idAccount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_in_cart`
--
ALTER TABLE `product_in_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_in_order`
--
ALTER TABLE `product_in_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`idSeller`) REFERENCES `sellers` (`idAccount`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`idAccount`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`id`);

--
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `notify_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `notify_ibfk_2` FOREIGN KEY (`idNotifications`) REFERENCES `notifications` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Constraints for table `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD CONSTRAINT `product_in_order_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_in_order_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
