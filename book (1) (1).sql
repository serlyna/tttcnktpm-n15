-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2024 lúc 06:53 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `audio` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `information` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`id_author`, `name`, `image`, `status`, `information`) VALUES
(1, 'Nguyễn Quốc Trí', '', 1, ''),
(2, 'Vũ Thị Gấm', '', 1, ''),
(3, 'Dale Carnegie', '', 1, ''),
(4, 'Vũ Trọng Phụng', '', 1, ''),
(5, 'Lôi Mễ', '', 1, ''),
(6, 'Nguyễn Tuấn Anh', '', 1, ''),
(7, 'Nhiều tác giả', '', 1, ''),
(8, 'Thích Nhất Hạnh', '', 1, ''),
(9, 'Nguyên Phong', '', 1, ''),
(10, 'Mayuko Kanba', '', 1, ''),
(11, 'Gosho Aoyama', '', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`, `status`) VALUES
(1, 'Sách Giáo Khoa', 1),
(2, 'Văn học', 1),
(3, 'Kinh tế/Kinh doanh', 1),
(4, 'Kỹ năng sống đẹp', 1),
(5, 'Thiếu nhi', 1),
(6, 'Teen', 1),
(7, 'Tâm lý/Giáo dục', 1),
(8, 'Kiến trúc/Hội họa/Điện ảnh', 1),
(9, 'Văn hóa/Du lịch', 1),
(10, 'Tâm linh/Tôn giáo', 1),
(11, 'Truyện tranh/Manga/Comic', 1),
(12, 'Thưởng thức/Đời sống', 1),
(13, 'Sách chuyên ngành', 1),
(14, 'Sách ngoại ngữ/Từ điển', 1),
(15, 'Tạp chí', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(110) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id_customer`, `user`, `password`, `fullname`, `gender`, `phone_number`, `address`, `email`, `status`) VALUES
(1, 'user', '123456', 'user', 1, '123456789', 'Hà Nội', 'user@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `datetime_note` datetime NOT NULL,
  `note` varchar(10000) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_pub` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `information` mediumtext NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `number_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_author`, `id_pub`, `id_category`, `name`, `cost`, `price`, `image1`, `image2`, `image3`, `information`, `quantity`, `size`, `number_page`) VALUES
(1, 1, 1, 1, 'Làm Chủ Kiến Thức Ngữ Văn Bằng Sơ Đồ Tư Duy Lớp 8 Tập 2 - Bộ Kết Nối Tri Thức Với Cuộc Sống', 119000, 109000, 'lam-chu-kien-thuc-ngu-van-bang-so-do-tu-duy-lop-8-tap-2-mockup.jpg', 'lam-chu-kien-thuc-ngu-van-bang-so-do-tu-duy-lop-8-tap-2-b04.jpg', 'lam-chu-kien-thuc-ngu-van-bang-so-do-tu-duy-lop-8-tap-2-mockup (1).jpg', 'Với mong muốn truyền cảm hứng học môn Ngữ Văn, đặc biệt phát triển các kỹ năng đọc hiểu, viết lách và nâng cao khả năng sử dụng ngôn từ cho học sinh, cuốn sách Làm chủ kiến thức Ngữ Văn bằng sơ đồ tư duy lớp 8 – Tập 2 ra đời giúp học sinh đạt được những yêu cầu của chương trình học ở trường.\r\n<br>\r\nBộ sách được biên soạn theo Bộ sách Kết nối tri thức với cuộc sống của Nhà Xuất bản Giáo dục; được chia làm 2 tập, tương ứng với 2 học kỳ; mỗi tập bao gồm 5 bài theo motip: Hoạt động đọc, thực hành Tiếng Việt, hoạt động viết, nói và nghe. Trình tự này giúp học sinh vừa có thể nắm bắt kiến thức một cách dễ dàng, vừa hình thành năng lực đọc – viết – nói – nghe theo yêu cầu cần đạt của chương trình Giáo dục phổ thông môn Ngữ Văn 2018.\r\n<br>\r\nĐặc biệt, cuối mỗi bài đọc hiểu đều có hệ thống sơ đồ tư duy, hướng dẫn học sinh đọc hiểu theo từng thể loại. Việc học bằng sơ đồ tư duy sẽ giúp học sinh hệ thống hóa kiến thức tốt hơn, nhớ lâu và sâu hơn.\r\n<br>\r\nNội dung cuốn sách Làm chủ kiến thức Ngữ Văn bằng sơ đồ tư duy lớp 8 – Tập 2:\r\n<br>\r\nPhần Đọc hiểu: Được triển khai theo motip: Đặc trưng thể loại, khái quát chung về văn bản đọc, trọng tâm kiến thức, kết nối với cuộc sống. Cuối phần có hệ thống sơ đồ hướng dẫn cách đọc hiểu theo thể loại.\r\n<br>\r\nPhần Thực hành Tiếng Việt: Hệ thống hóa lượng kiến thức tiếng Việt cần thực hành trong một đơn vị bài học, có hướng dẫn thực hiện bài tập trong sách giáo khoa.\r\n<br>\r\nPhần Viết: Cung cấp hệ thống kiến thức trọng tâm, chi tiết để thực hành viết, cuối phần có bài viết tham khảo để học sinh bổ trợ kỹ năng viết.\r\n<br>\r\nPhần Nói và nghe: Cung cấp hệ thống kiến thức các yêu cầu đối với bài nói và chủ đề nói, cuối phần sẽ có bài nói hoặc chủ để nói tham khảo để nâng cao kỹ năng nói cho học sinh.\r\n<br>\r\nĐiểm đặc biệt của cuốn sách Làm chủ kiến thức Ngữ Văn bằng sơ đồ tư duy lớp 8 – Tập 2:\r\n<br>\r\nHướng dẫn chi tiết nội dung bài học nhằm hình thành năng lực đọc – viết – nghe – nói theo yêu cầu của chương trình GDPT 2018\r\n<br>\r\nGhi nhớ nhanh bằng phương pháp sơ đồ tư duy\r\n<br>\r\nHệ thống các bài viết tham khảo và chủ đề nói chi tiết\r\n<br>\r\nTổng hợp đánh giá với hệ thống để kiểm tra giữa kì và cuối kì', 100, '17 x 24 x 1 cm', 176),
(2, 1, 1, 2, 'Làm Chủ Kiến Thức Ngữ Văn Bằng Sơ Đồ Tư Duy Lớp 8 Tập 1 - Bộ Kết Nối Tri Thức Với Cuộc Sống', 129000, 109000, 'lam-chu-kien-thuc-ngu-van-bang-so-do-tu-duy-lop-8-tap-1.jpg', 'lam-chu-kien-thuc-ngu-van-bang-so-do-tu-duy-lop-8-tap-1-b04.jpg', 'lam-chu-kien-thuc-ngu-van-bang-so-do-tu-duy-lop-8-tap-1-mockup.jpg', 'Chương trình sách giáo khoa Ngữ văn 8 mới có nhiều cải tiến giúp các em học sinh phát triển được toàn diện năng lực và phẩm chất cá nhân. Vì vậy học sinh cần phải rèn luyện kỹ năng đọc hiểu đồng thời với kỹ năng nghe – nói – đọc – viết. Nhằm giúp các em đáp ứng những yêu cầu cần đạt của chương trình, xin giới thiệu cuốn sách Làm Chủ Kiến Thức Ngữ Văn Bằng Sơ Đồ Tư Duy Lớp 8 Tập 1. Bộ sách có nội dung bám sát theo chương trình Ngữ Văn 8 (Kết nối tri thức với cuộc sống).\r\n<br>\r\nKiến thức đạt được sau khi học cuốn sách Làm Chủ Kiến Thức Ngữ Văn Bằng Sơ Đồ Tư Duy Lớp 8 Tập 1\r\n<br>\r\nKiến thức văn bản và kỹ năng đọc hiểu theo đặc trưng theo từng thể loại<br>\r\nNắm chắc yêu cầu, cách thức triển khai bài viết, bài nói và từ đó hình thành kỹ năng nghe – nói – đọc – viết vừng vàng<br>\r\nRèn luyện kỹ năng làm bài qua các bộ đề kiểm tra, thực hành<br>\r\nNội dung cuốn sách Làm Chủ Kiến Thức Ngữ Văn Bằng Sơ Đồ Tư Duy Lớp 8 Tập 1<br>\r\n<br>\r\nCác bài học trong chương trình Ngữ Văn lớp 8 học kì 1 được sắp xếp khoa học nhằm đáp ứng những yêu cầu cần đạt của chương trình Giáo dục phổ thông môn Ngữ Văn 2018 với motip chung như sau:<br>\r\n<br>\r\nPhần 1 – Đọc hiểu: giúp các em vừa dễ nắm bắt kiến thức của từng tác phẩm để cảm nhận được nét đặc sắc riêng của mỗi bài, vừa có sự đối chiếu với tác phẩm khác để rút ra phương pháp chung tiếp cận thể loại với các phần sau. Cuối phần này sẽ có sơ đồ tư duy trên app điện thoại để hướng dẫn học sinh cách đọc hiểu theo thể loại<br>\r\n<br>\r\nĐặc trưng thể loại<br>\r\nKhái quát chung về văn bản đọc<br>\r\nTrọng tâm kiến thức<br>\r\nKết nối với cuộc sống<br>\r\nPhần 2 – Thực hành tiếng Việt: cung cấp kiến thức tiếng Việt cần thực hành trong một đơn vị bài học, đi kèm với hướng dẫn làm bài tập trong sách giáo khoa<br>\r\n<br>\r\nPhần 3 – Thực hành viết: cung cấp các yêu cầu đối với kiểu bài cần tạo lập và các bước thực hành viết. Cuối phần này sẽ có những bài viết tham khảo để học sinh rèn luyện bổ trợ thêm kỹ năng viết cho mình.<br>\r\n<br>\r\nPhần 4 – Nói và Nghe: nội dung bao gồm các yêu cầu đối với bài nói và chủ đề nói, cùng với một số bài nói hoặc chủ đề nói tham khảo để góp phần nâng cao kỹ năng nói cho các em.<br>\r\n<br>\r\nĐiểm đặc biệt của cuốn sách<br>\r\n<br>\r\nCác em được hướng dẫn cách học sao cho hiểu và ứng dụng được kiến thức vào bài tập thực hành cùng lời giải chi tiết\r\nHệ thống sơ đồ tư duy theo mỗi chủ đề bằng từ khóa giúp các em ghi nhớ sâu kiến thức một cách sinh động, nhanh chóng<br>\r\nCác bài viết và bài chủ đề nói được tuyển chọn và biên soạn kỹ lưỡng tạo nên nguồn tham khảo tin cậy, hiệu quả cho các em<br>\r\nTài liệu bổ trợ được tích hợp trên ứng dụng điện thoại rất thuận tiện cho các em trong việc tra cứu, thực hành. Tài liệu bao gồm các nội dung: thông tin tác giả, bài viết tham khảo, đề và đáp án cũng như sơ đồ tư duy.<br>\r\n<br>\r\nNếu còn đang băn khoăn chưa biết phương pháp học Ngữ Văn lớp 8 theo chương trình mới sao cho hiệu quả thì cuốn sách Làm Chủ Kiến Thức Ngữ Văn Bằng Sơ Đồ Tư Duy Lớp 8 tập 1 là một tài liệu tham khảo hữu ích cho các em học sinh. Hy vọng rằng với cuốn sách này, các em sẽ học tập chăm chỉ, tự luyện đề để đạt được điểm số cao trên lớp.<br>', 100, '17 x 24 x 1 cm', 195),
(3, 2, 1, 1, '50 Đề Tăng Điểm Nhanh Tiếng Việt Lớp 4 - Bộ Kết Nối Tri Thức Với Cuộc Sống', 109000, 85000, '50-de-tang-diem-nhanh-tieng-viet-lop-4.img', '50-de-tang-diem-nhanh-tieng-viet-lop-4-b04.jpg', '50-de-tang-diem-nhanh-tieng-viet-lop-4-mockup.jpg', 'Để giúp các em củng cố kiến thức và tự tin vượt qua những bài thi môn Tiếng Việt, TKBooks hân hạnh giới thiệu đến quý phụ huynh và các em học sinh cuốn sách “50 Đề Tăng Nhanh Điểm Tiếng Việt Lớp 4”.<br>\r\n<br>\r\nCuốn sách được biên soạn theo chương trình giáo dục phổ thông 2018. Những đề kiểm tra trong sách có nội dung kiến thức tương đương với tuần học trong sách giáo khoa Tiếng Việt 4 – Bộ sách Kết nối tri thức và cuộc sống. Mỗi đề sẽ giúp các em hình thành kĩ năng đọc hiểu sâu, kĩ năng sử dụng ngôn ngữ và kĩ năng viết bài văn.<br>\r\n<br>\r\nCuốn sách 50 Đề Tăng Nhanh Điểm Tiếng Việt Lớp 4 sẽ giúp các em vững vàng thêm nền tảng kiến thức để tăng điểm vào cuối mỗi kì thi.<br>\r\n<br>\r\nNội dung cuốn sách 50 Đề Tăng Điểm Nhanh Tiếng Việt Lớp 4<br>\r\n<br>\r\nMỗi đề thi gồm 3 phần chính: Đọc hiểu, Luyện từ và câu, Viết.<br>\r\n<br>\r\nMỗi bài đọc – hiểu là một câu chuyện hay bài thơ lí thú, bổ ích. Qua đó, em sẽ rút ra được những bài học cho bản thân và thấy được những thông điệp nhằm lan tỏa đến người đọc.<br>\r\n<br>\r\nSau mỗi bài đọc, các em sẽ được thực hành sử dụng ngôn ngữ trong văn cảnh để nâng cao kĩ năng sử dụng từ và câu cho bản thân. Các em sẽ được mở rộng vốn từ theo chủ điểm, củng cố về từ loại, các dấu câu và tác dụng của dấu câu, các biện pháp nhân hóa,…<br>\r\n<br>\r\nNội dung viết đa dạng, phong phú, gắn với thực tế trải nghiệm của các em. Mỗi dạng đề sẽ phát triển cho các em kĩ năng quan sát, kĩ năng lựa chọn từ ngữ, hình ảnh nhằm tạo lập được những văn bản có cấu trúc chặt chẽ, sinh động, hấp dẫn người đọc.<br>\r\n<br>\r\nĐiểm đặc biệt của cuốn sách<br>\r\n<br>\r\nBám sát nội dung sách Giáo khoa Tiếng Việt 4 – Bộ sách Kết nối tri thức và cuộc sống.<br>\r\nTừng đề thi được phân tích cụ thể, rõ ràng giúp các em dễ hiểu và ghi nhớ kiến thức.<br>\r\nSách in màu, thiết kế bắt mắt giúp các em hứng thú hơn trong việc luyện đề.<br>\r\nChúng tôi tin rằng, “50 Đề Tăng Nhanh Điểm Tiếng Việt Lớp 4” sẽ trở thành một người bạn đồng hành đáng tin cậy, mang lại sự tự tin và bứt phá về điểm số cho các em trong hành trình học tập của mình.<br>', 100, '17 x 24 x 1 cm', 176),
(4, 3, 2, 2, 'Tổng Thống Lincoln Và Những Điều Bạn Chưa Biết (Song ngữ Anh-Việt)', 279000, 251100, 'tong-thong-lincoln-va-nhung-dieu-ban-chua-biet-b01.img', 'tong-thong-lincoln-va-nhung-dieu-ban-chua-biet-b02.jpg', 'tong-thong-lincoln-va-nhung-dieu-ban-chua-biet-b03.jpg', 'Tám mươi bảy năm trước, ông cha ta đã tạo dựng trên lục địa này, một quốc gia mới, được thai nghén trong tự do, được cung hiến trong niềm tin rằng mọi người sinh ra đều bình đẳng.\r\n<br>\r\nGiờ đây chúng ta đang chiến đấu trong một cuộc nội chiến vĩ đại để thử thách liệu rằng quốc gia này, hay bất kỳ quốc gia nào khác được thai nghén trong tự do và cung hiến trong bình đẳng như vậy, có thể trường tồn được hay không. Chúng ta gặp nhau trên một chiến trường khốc liệt của cuộc chiến này. Chúng ta đã đến đây để cung hiến một phần đất của chiến trường này trở thành nơi yên nghỉ cuối cùng cho những người lính đã hy sinh mạng sống của họ để tổ quốc được sống. Buổi lễ cung hiến này là hoàn toàn xứng đáng và phù hợp.\r\n<br>\r\nNhưng, trong một ý nghĩa rộng lớn hơn, chúng ta không thể cung hiến, chúng ta không thể hiến dâng và chúng ta cũng không thể thánh hóa mảnh đất này. Những người lính dũng cảm, dù còn sống hay đã chết, những người đã chiến đâu ở đây đã hiến dâng cho mảnh đất này những điều mà năng lực thấp kém của chúng ta chẳng thể thêm vào hay bớt đi. Thế giới sẽ chú ý rất ít và cũng sẽ chẳng nhớ lâu tới những điều chúng ta nói ở đây, nhưng thế giới sẽ không bao giờ quên được những điều mà những người lính đã thực hiện ở đây. Nhiệm vụ của chúng ta, những người còn sống, là tận hiến bản thân chúng ta ngay tại đây cho những nhiệm vụ còn đang dang dở mà những người lính đã chiến đấu đầy cao quý ở đây. Nhiệm vụ của chúng ta là tận hiến cho nhiệm vụ vĩ đại còn đang ở phía trước rằng từ những sự hy sinh cao quý này, chúng ta tăng thêm lòng tận tụy cho chính nghĩa điều mà họ đã sẵn sàng hy sinh cả mạng sống. Rằng ngay tại đây chúng ta quyết tâm để những sự hy sinh này sẽ không trở nên vô ích, rằng quốc gia này, dưới sự quan phòng của Chúa, sẽ sản sinh một nền tự do mới. Và chính phủ của dân, do dân, vì dân này sẽ không bao giờ lụi tàn khỏi mặt đất.<br>\r\n<br>\r\nTổng thống Abraham Lincoln<br>\r\nNgày 19/11/1863, Nghĩa Trang Gettysburg, Bang Pennsylvania<br>\r\n<br>\r\n(Diễn văn Gettyburg)\r\n<br>\r\n------\r\n<br>\r\nCuốn sách Tổng Thống Lincoln Và Những Điều Bạn Chưa Biết của tác giả Dale Carnegie, được Mercy English: <br>Encouragement & Wisdom dịch và chia sẻ.<br>\r\n<br>\r\nMercy English là một dự án tiếng Anh có mục đích giúp đỡ các bạn trẻ Việt Nam học và sử dụng tiếng Anh hiệu quả, trong thời gian ngắn và với chi phí thấp. Nhận thấy khả năng đọc-hiểu tiếng Anh của một số bạn còn hạn chế nên Mercy giới thiệu cuốn sách này, với hy vọng qua việc đọc cuốn sách dưới định dạng song ngữ Anh-Việt, các bạn sẽ gia tăng vốn từ vựng tiếng Anh, nắm vững hơn các cấu trúc ngữ pháp, đồng thời được truyền cảm hứng bởi tấm gương vượt khó và sự lãnh đạo hiệu quả qua sự BAO DUNG và KIÊN NHẪN của Tổng thống Abraham Lincoln — người lãnh đạo đã dẫn dắt người dân Mỹ vượt qua cuộc nội chiến đẫm máu và đau thương để xây dựng một nền tự do mới, với khát vọng mọi người đều được bình đẳng trong việc tìm kiếm cơ hội và vươn lên trong cuộc sống, như chính Tổng thống Lincoln đã nỗ lực vươn lên trong nghèo khó và thành công trong sự nghiệp chính trị.<br>', 100, '16 x 24 x 3 cm', 550),
(5, 4, 3, 2, 'Vỡ Đê (Tái bản năm 2022)', 75000, 65000, 'vo-de-tb-2022.img', '', '0', 'Vũ Trọng Phụng (1912-1939) là một nhà văn, nhà báo nổi tiếng của Việt Nam vào đầu thế kỷ 20. Tuy thời gian cầm bút rất ngắn ngủi, với tác phẩm đầu tiên là truyện ngắn Chống nạng lên đường đăng trên Ngọ báo vào năm 1930, ông đã để lại một kho tác phẩm đáng kinh ngạc: hơn 30 truyện ngắn, 9 tập tiểu thuyết, 9 tập phóng sự, 7 vở kịch, cùng 1 bản dịch vở kịch từ tiếng Pháp, một số bài viết phê bình, tranh luận NXB Văn Học và hàng trăm bài báo viết về các vấn đề chính trị, xã hội, văn hóa.<br>\r\n<br>\r\n“Trong bộ ba tiểu thuyết Giông tố, Số đỏ, Vỡ đê, chất phóng sự được thể hiện khá rõ ở việc phản ánh kịp thời những vấn đề thời sự của đời sống chính trị, xã hội đương thời vào tác phẩm. Bức tranh hiện thực trong ba tác phẩm nói trên rất rộng lớn, bao quát cả cái xã hội thuộc địa thối nát và có giá tri như những cuốn biên niên sử ghi lại những sự kiện, những vấn đề thời sự của xã hội Việt Nam những năm 30 của thế kỷ này.<br>', 100, '13 x 18 cm', 276),
(6, 5, 3, 2, 'Độc Giả Thứ 7', 165000, 165000, 'doc-gia-thu-bay.jpg', '', '0', 'Độc giả thứ 7 thực chất là tác phẩm đầu tay của Lôi Mễ, được đăng tải nhiều kì trên tạp chí truyện trinh thám của Trung Quốc. Tuy nhiên, đến gần đây Lôi Mễ mới cho xuất bản quyển sách. Trong phiên bản này, Lôi Mễ đã có chỉnh sửa một vài chi tiết và thêm vào đó ngoại truyện của các truyện xuất bản trước, giúp bạn đọc hiểu rõ hơn diễn biến tâm lý của các nhân vật.\r\n<br>\r\nĐộc giả thứ 7 lấy bối cảnh khu ký túc xa nam sinh ở trường đại học của Phương Mộc. Tại nơi đây, các chàng trai cùng trải qua những năm tháng thanh xuân đầy nhiệt huyết và tiếng cười. Cho đến một ngày, một nam sinh bị giết hại và tiếp theo đó là cái chết hàng loạt của nhiều nam sinh khác. Với tài năng đặc biệt trong việc tìm hiểu tâm lý tội phạm , Phương Mộc đã lần theo dấu vết hung thủ và tìm ra được mối liên hệ giữa các nam sinh bi giết: tất cả họ đều có tên trong cùng một tấm thẻ mượn sách. Bằng tất cả khả năng của mình, Phương Mộc cố gắng truy đuổi kẻ thủ ác và cứu bạn bè của mình.', 100, '14.5 x 20.5 cm', 541),
(7, 6, 4, 4, 'Trường Học Hay Trường Đời', 150000, 150000, '238.img', '', '0', 'Trường Học Hay Trường Đời\r\n\r\n•  Kèm theo là một chuỗi chương trình toạ đàm hướng nghiệp cùng tên tại nhiều trường đại học.\r\n•  Đăng trước một số nội dung trong cuốn sách sắp ra mắt của TS Lê Thẩm Dương.\r\n•  Sinh viên, thanh niên, phụ huynh... ai cũng nên đọc.\r\n\r\nTại sao nhiều bạn trẻ đọc sách về hướng nghiệp, việc làm, được các thầy cô ở trường tư vấn kỹ càng mà vẫn chọn sai ngành học, tốt nghiệp ra trường vẫn phải làm trái ngành nghề được đào tạo? Tại sao sinh viên ra trường thất nghiệp ngày càng đông, trong khi các doanh nghiệp ngày càng khó tuyển dụng được nhân sự như ý? Làm thế nào để biết mình đã chọn đúng nghề, chọn đúng sếp, chọn đúng công ty? Doanh nghiệp thực sự đang cần điều gì nhất ở người lao động? Nếu trượt đại học thì phải làm sao? Sinh viên có nên đi làm thêm không? Khi nào thì phụ huynh nên cho con em mình đi du học? Khi nào thì nên khởi sự kinh doanh? Thời cách mạng công nghiệp 4.0 thì nên chọn mô hình kinh doanh nào cho hiệu quả?...\r\n\r\nHàng loạt những câu hỏi sát sườn với người trẻ, từ hướng nghiệp đến việc làm, được nhà báo Nguyễn Tuấn Anh lý giải khoa học, dễ hiểu, gẫn gũi nhờ gần 20 năm làm việc với nhiều thế hệ sinh viên Việt Nam và các doanh nghiệp trong nước và quốc tế. Nhà báo Nguyễn Tuấn Anh cũng là người viết sách cho nhiều nhân vật nổi tiếng, trong đó có TS Lê Thẩm Dương (Trưởng khoa Tài chính – Trường Đại học Ngân hàng TP.HCM; diễn giả hàng đầu Việt Nam), TS Alok Bharadwaj (Nguyên Chủ tịch Hiệp hội Giám đốc Marketing châu Á, Phó Chủ tịch cao cấp phụ trách chiến lược của Canon châu Á)... Nhà báo Nguyễn Tuấn Anh hiện là Trưởng ban biên tập, Thư ký Toà soạn báo Sinh Viên Việt Nam.\r\n\r\nLý giải về tên cuốn sách, tác giả, nhà báo Nguyễn Tuấn Anh cho biết: “Trường học hay trường đời, trường nào thì cũng phải học. Nhưng nếu biết cách học và được học từ những người phù hợp nhất thì sẽ thành công nhanh hơn. Đây cũng là “kim chỉ nam” để chúng tôi xây dựng nội dung cuốn sách này”.\r\n\r\nTrường Học Hay Trường Đời có 8 chương:\r\n\r\n1.  Trước ngưỡng cửa tự lập;\r\n\r\n2.  Trường học hay trường đời?;\r\n\r\n3.  Những câu hỏi có giá nghìn tỉ đồng;\r\n\r\n4.  Uống rượu, đọc sách, xem phim và bóng đá;\r\n\r\n5.  “Di sản” của người quê;\r\n\r\n6.  Học từ những người giỏi nhất;\r\n\r\n7.  Những bài học từ TS Lê Thẩm Dương;\r\n\r\n8.  Thắng được mình thì hết kẻ thù.\r\n\r\nĐặc biệt, một số nội dung trong cuốn sách “Cảm xúc là kẻ thù số một của thành công 2” sắp ra mắt của TS Lê Thẩm Dương được trích đăng trong cuốn sách này.', 10, '', 0),
(8, 7, 4, 4, 'Bí Mật Của Hạnh Phúc', 58000, 56000, 'bi-mat-cua-hanh-phuc.img', '', '0', 'BÍ MẬT CỦA HẠNH PHÚC\r\n\r\nTrước tuổi trưởng thành, người trẻ nào cũng đi qua một giai đoạn khó khăn, thậm chí là khủng hoảng liên quan đến tình yêu, giới tính, thậm chí cả tình dục. Nhu cầu cần được giải đáp, giải thích về tình yêu, giới tính, tình dục một cách khoa học của người trẻ là chính đáng và cần thiết. Những giải thích thiếu khoa học hoặc chỉ mang tính chất câu khách rẻ tiền trong một xã hội tràn ngập thông tin, cộng thêm việc không hiểu tâm sinh lý của con em từ chính các phụ huynh, nhiều khi đẩy người trẻ đến những bị kịch thương tâm.\r\n\r\n\r\nTiến sĩ tâm lý, bác sĩ tâm thần học Lương Cần Liêm là giảng viên của Đại học Y Paris (Pháp). Ông là Chủ tịch Hội khoa học tâm lý tâm thần Pháp - Việt, là tác giả của hàng chục đầu sách về tâm lý, tâm thần và đạo Phật được phát hành rộng rãi ở Pháp và châu Âu. Hằng năm, ông đều trở về Việt Nam để chủ trì các hội thảo quốc tế.\r\n\r\n\r\nSự hợp tác giữa báo Sinh Viên Việt Nam với tiến sĩ tâm lý, bác sĩ tâm thần học Lương Cần Liêm đã cho ra đời một chuyên mục được bạn đọc đặc biệt yêu thích: Yêu thực sự. Các trả lời của bác sĩ Lương Cần Liêm là sự kết hợp nhuần nhuyễn giữa kiến thức khoa học hiện đại với văn hóa phương Đông, không né tránh và rất hợp lý dưới góc độ tâm lý, tâm thần của con người. Trong suốt 5 năm qua, hàng nghìn bạn đọc đã tin tưởng, yêu mến viết thư cho chuyên mục và hàng trăm bạn đã nhận được tư vấn. Hiếm có chuyên mục nào được bạn đọc nhiều thành phần yêu thích đến thế: Học sinh, sinh viên, giáo viên, giảng viên, phụ huynh…\r\n\r\n\r\nViệc tuyển chọn các tình huống của bạn đọc và phần tư vấn của bác sĩ Lương Cần Liêm thành một cuốn sách là yêu cầu tha thiết của rất nhiều bạn đọc, nhưng đồng thời cũng là một việc khó: \"Việc tuyển chọn và tập hợp các bài trả lời của tôi trên báo Sinh Viên Việt Nam thành một cuốn sách đã được chúng tôi nghĩ đến từ hơn 3 năm nay với hy vọng những giải đáp của tôi đến được với các bạn trẻ Việt Nam nhiều hơn nữa. Tuy nhiên, đến thời điểm hôm nay, cuốn sách này mới đến được với đông đảo bạn đọc. Hy vọng những gì chúng tôi chia sẻ trong cuốn sách này sẽ giúp các bạn trẻ tự tìm được lời đáp cho câu hỏi: Làm sao để sống hạnh phúc?\" (Bác sĩ Lương Cần Liêm).\r\n\r\n\r\nNhà báo Lê Thanh Hà - Phó Tổng Biên tập báo Sinh Viên Việt Nam- Hoa Học Trò nhận xét: \"Trong quá trình đọc duyệt các bài trả lời bạn đọc của Bác sĩ Lương Cần Liêm trên báo Sinh Viên Việt Nam, tôi đã đúc rút được hai điều thực sự ý nghĩa với mình. Điều thứ nhất liên quan tới một từ khóa, đấy là giáo dục tình cảm có ý nghĩa quan trọng hơn, thay vì chỉ giáo dục giới tính. Việc có quan hệ tình dục sai với một ai đó có thể chỉ là một tai nạn, nhưng yêu đương lầm lạc với một ai đó có thể là thảm họa của cả một đời người. Điều thứ hai tôi tâm đắc là cách giải đáp theo hướng giải tỏa của Bác sĩ Lương Cần Liêm. Giải tỏa để những người trẻ đi qua được giai đoạn khó khăn, khủng hoảng thường là nhất thời trong cuộc đời mỗi con người. Bởi rồi một ngày họ sẽ đến được giai đoạn trưởng thành, tìm được câu trả lời cũng như tìm được đúng người để trao gửi tình cảm thật sự\".\r\n\r\n* * * * *\r\n\r\n- Đây là dòng sách kỹ năng, không giống các loại sách tòa soạn báo SVVN-HHT đã từng phát hành.\r\n\r\n\r\n- Đây là chủ đề nóng, gây tò mò, thu hút người đọc, đã được tòa soạn chuẩn bị kỹ càng, nghiêm túc trong 3 năm qua.\r\n\r\n\r\n- Nội dung không chỉ có chuyện yêu đương của con trẻ, mà còn có nhiều tình huống liên quan đến gia đình (quan hệ bố mẹ- con cái, anh chị em…). Nhiều bố mẹ/Phụ huynh cũng sẽ tìm đọc để hiểu tâm sinh lý của con em mình, từ đó đồng hành với con em mình vượt qua giai đoạn khủng hoảng của tuổi trưởng thành.\r\n\r\n\r\n- Cách lý giải khoa học, hiện đại, không né tránh những câu hỏi khóvề giới tính, tình dục của giáo sư, bác sĩ Lương Cần Liêm, nhưng hợp lý với văn hóa Á Đông.\r\n\r\n\r\n- Người trả lời là một nhân vật uy tín được thế giới công nhận: Giáo sư, bác sĩ Lương Cần Liêm đang làm việc tại trường Đại học Y Paris (Pháp), Chủ tịch Hội khoa học Tâm lý tâm thần Pháp- Việt, tác giả của hàng chục đầu sách nổi tiếng về tâm lý, tâm thần, đạo Phật được phát hành ở Pháp và châu Âu.\r\n\r\n\r\n- Mỹ thuật được trình bày công phu: Gồm 2 bìa, bìa áo và bìa chính có chữ nhũ.', 50, '13 x 20 cm', 160),
(9, 8, 5, 10, 'Thích Nhất Hạnh: Người Thắp Sáng Con Đường Tỉnh Thức', 115000, 98000, 'thich-nhat-hanh-nguoi-thap-sang-con-duong-tinh-thuc.jpg', '', '0', '\r\nMô tả sản phẩm\r\n\r\n\"Mỗi người chúng ta nên tự hỏi mình: Tôi thật sự muốn gì? Trở thành người thành công số 1? Hay đơn giản là người hạnh phúc? Để thành công, bạn có thể phải hi sinh hạnh phúc của mình. Bạn có thể trở thành nạn nhân của thành công, nhưng bạn không bao giờ là nạn nhân của hạnh phúc.\r\n\r\nThấu hiểu nỗi đau của người khác là món quà to lớn nhất mà bạn có thể trao tặng họ. Thấu hiểu là tên gọi khác của yêu thương.\"\r\n\r\n-- Thích Nhất Hạnh\r\n\r\nTrong tập sách này, với mong muốn phần nào giúp bạn đọc hiểu hơn về cuộc đời và sự nghiệp hoằng pháp của một bậc tôn sư uyên bác, tài năng, chúng tôi tập hợp bài viết của nhiều tác giả thể hiện cảm nhận về những triết lý của Thiền sư Thích Nhất Hạnh. Những cảm nhận có nhiều cung bậc ở các góc độ khác nhau, nhưng tất cả đều hướng tới giá trị của thực hành tỉnh thức, nuôi dưỡng an lạc trong tâm, thực hành ý nguyện về sự hòa hiếu, hòa hợp, cùng chung tay xây dựng đời sống an bình, tràn đầy tình yêu thương.', 12, '15 x 23 cm', 256),
(10, 9, 5, 7, 'Muôn Kiếp Nhân Sinh ', 98000, 88200, 'muon-kiep-nhan-sinh-kho-nho.jpg', 'Muon-kiep-nhan-sinh-1.jpg', 'Muon-kiep-nhan-sinh-1(1)', 'Muôn Kiếp Nhân Sinh là tác phẩm do Giáo sư John Vũ - Nguyên Phong viết từ năm 2017 và hoàn tất đầu năm 2020 ghi lại những câu chuyện, trải nghiệm tiền kiếp kỳ lạ từ nhiều kiếp sống của người bạn tâm giao lâu năm, ông Thomas – một nhà kinh doanh tài chính nổi tiếng ở New York. Những câu chuyện chưa từng tiết lộ này sẽ giúp mọi người trên thế giới chiêm nghiệm, khám phá các quy luật về luật Nhân quả và luân hồi của vũ trụ giữa lúc trái đất đang gặp nhiều tai ương, biến động, khủng hoảng từng ngày.\r\n\r\nMuôn Kiếp Nhân Sinh là một bức tranh lớn với vô vàn mảnh ghép cuộc đời, là một cuốn phim đồ sộ, sống động về những kiếp sống huyền bí, trải dài từ nền văn minh Atlantis hùng mạnh đến vương quốc Ai Cập cổ đại của các Pharaoh quyền uy, đến Hợp Chủng Quốc Hoa Kỳ ngày nay.\r\n\r\nMuôn Kiếp Nhân Sinh cung cấp cho bạn đọc kiến thức mới mẻ, vô tận của nhân loại lần đầu được hé mở, cùng những phân tích uyên bác, tiên đoán bất ngờ về hiện tại và tương lai thế giới của những bậc hiền triết thông thái. Đời người tưởng chừng rất dài nhưng lại trôi qua rất nhanh, sinh vượng suy tử, mong manh như sóng nước. Luật nhân quả cực kỳ chính xác, chi tiết, phức tạp được thu thập qua nhiều đời, nhiều kiếp, liên hệ tương hỗ đan xen chặt chữ lẫn nhau, không ai có thể tính được tích đức này có thể trừ được nghiệp kia không, không ai có thể biết được khi nào nhân sẽ trổ quả. Nhưng, một khi đã gây ra nhân thì chắc chắn sẽ gặt quả - luật Nhân quả của vũ trụ trước giờ không bao giờ sai.\r\n\r\nLuật Luân hồi và Nhân quả đã tạo nhân duyên để người này gặp người kia. Gặp nhau có khi là duyên, có khi là nợ; gặp nhau có lúc để trả nợ, có lúc để nối lại duyên xưa. Có biết bao việc diễn ra trong đời, tưởng chừng như là ngẫu nhiên nhưng thật ra đã được sắp đặt từ trước. Luân hồi là một ngôi trường rộng lớn, nơi tất cả con người, tất cả sinh vật đều phải học bài học của riêng mình cho đến khi thật hoàn thiện mới thôi. Nếu không chịu học hay chưa học được trọn vẹn thì buộc phải học lại, chính xác theo quy luật của Nhân quả.\r\n\r\nThomas đã chia sẻ vì sao đã kể những câu chuyện riêng tư huyền bí này với Giáo sư John Vũ để thực hiện tác phẩm Muôn Kiếp Nhân Sinh:\r\n\r\n“Hiện nay thế giới đang trải qua giai đoạn hỗn loạn, xáo trộn, mà thật ra thì mọi quốc gia đều đang gánh chịu những nghiệp quả mà họ đã gây ra trong quá khứ. Mỗi quốc gia, cũng như mọi cá nhân, đều có những nghiệp quả riêng do những nhân mà họ đã gây ra. Cá nhân thì có ‘biệt nghiệp‘ riêng của từng người, nhưng quốc gia thì có ‘cộng nghiệp‘ mà tất cả những người sống trong đó đều phải trả.\r\n\r\nThường thì con người, khi hành động, ít ai nghĩ đến hậu quả, nhưng một khi hậu quả xảy đến thì họ nghĩ gì, làm gì? Họ oán hận, trách trời, trách đất, trách những người chung quanh đã gây ra những hậu quả đó? Có mấy ai biết chiêm nghiệm, tự trách mình và thay đổi không?\r\n\r\nTôi mong chúng ta - những cánh bướm bé nhỏ rung động mong manh cũng có thể tạo nên những trận cuồng phong mãnh liệt để thức tỉnh mọi người.\r\n\r\nTương lai của mỗi con người, mỗi tổ chức, mỗi quốc gia và cả hành tinh này sẽ ra sao trong giai đoạn sắp tới là tùy thuộc vào thái độ ứng xử, nhìn nhận và thức tỉnh của từng cá nhân, từng tổ chức, từng quốc gia đó tạo nên. Nếu muốn thay đổi, cần khởi đầu bằng việc nhận thức, chuyển đổi tâm thức, lan tỏa yêu thương và chia sẻ sự hiểu biết từ mỗi người chúng ta trước.\r\n\r\nNhân quả đừng đợi thấy mới tin.\r\n\r\nNhân quả là bảng chỉ đường, giúp con người tìm về thiện lương“', 100, '11.5 x 16.5 cm', 476),
(11, 9, 5, 7, 'Muôn Kiếp Nhân Sinh 2', 268000, 241000, 'muon-kiep-nhan-sinh-2.jpg', 'MKNS2.jpg', 'muon-kiep-nhan-sinh-2(1).jpg', 'Muôn Kiếp Nhân Sinh 2 của tác giả Nguyên Phong tiếp tục là những câu chuyện tiền kiếp, nhân quả luân hồi hấp dẫn gắn liền với những kiến giải uyên bác về quá khứ, hiện tại, tương lai của nhân loại và thế giới thông qua góc nhìn của cả khoa học và tâm linh. Chúng ta là ai, chúng ta đến từ đâu và sẽ đi về đâu? Làm cách nào để chữa lành thế giới này, hành tinh này trước những biến cố lớn đang và sẽ diễn ra trong tương lai gần?\r\n\r\nTrong tập 2, hành trình thức tỉnh tâm linh của nhân vật Thomas sẽ dẫn dắt người đọc đến với những tầng cõi năng lượng gắn chặt với thế giới hữu hình của con người thông qua sự vận động của nghiệp lực, nhân quả, để giải thích về thứ năng lượng huyền bí luôn biến chuyển trong chu kỳ bất tận của vũ trụ. Không chỉ là trải nghiệm ly kỳ tại tiền kiếp cổ đại ở Assiria, Hy Lạp, độc giả còn được khám phá hành trình của linh hồn đến những tầng cõi – trạm trung chuyển khác nhau, được xâu chuỗi lại bằng cả triết học, tín ngưỡng, lịch sử và khoa học thế giới từ Đông sang Tây, từ cổ đại đến hiện đại. Năng lượng không tự nhiên sinh ra và cũng không tự nhiên mất đi, sự sống này cũng vậy, khởi đầu và kết thúc - tuy hai mà một, và chỉ có nhân quả sẽ luôn tuần hoàn vận hành bất tận.\r\n\r\nMuôn Kiếp Nhân Sinh 2 lý giải rằng vạn vật trên thế giới như cỏ cây, hoa lá, côn trùng, thú vật và con người tuy bề ngoài có vẻ khác biệt nhưng tinh hoa bên trong vẫn là một, đó là sự sống hay năng lượng khởi thủy uyên nguyên. Tinh hoa đó như là “Nước”, còn vạn vật chỉ là “Sóng”. Sóng thì muôn trùng, sóng lớn, sóng nhỏ… nhưng chúng vẫn chỉ là nước. Nếu chân ngã là đại dương thì bản ngã chỉ là nước chứa đựng trong cái chén. Vấn đề là làm sao phá vỡ cái chén để nước trở về với đại dương và đó cũng chính là hành trình của Thomas từ một doanh nhân với niềm tin duy vật hoàn toàn đã từng bước giác ngộ, thức tỉnh để khám phá về luân hồi, nhân quả, chuyển hóa nghiệp quả, chuyển đổi tâm thức và gửi gắm những thông điệp nhân sinh tốt đẹp đến độc giả.\r\n\r\nTác giả Nguyên Phong chia sẻ trong cuốn sách rằng, mọi việc dù lớn hay nhỏ cũng sẽ góp phần ảnh hưởng trực tiếp đến cuộc sống hiện tại hoặc trong tương lai, thậm chí đến tận kiếp sau. Đó là những nghiệp báo ở kiếp trước cộng nghiệp với hành vi của chúng ta trong kiếp này để hình thành nên bánh xe nghiệp lực khổng lồ phức tạp nhưng lại không bỏ sót bất cứ ai, bất cứ quốc gia nào và không bỏ sót bất cứ hành vi hay tư tưởng nào. Bởi lẽ, chúng ta đều là phần tử\r\ncủa một sự sống vĩ đại thuộc về một năng lượng khởi thuỷ, được sắp đặt khéo léo bởi những định luật trong vũ trụ.\r\n\r\nBằng những câu chuyện thú vị, sâu sắc, liên kết với nhau một cách chặt chẽ, Muôn Kiếp Nhân Sinh 2 sẽ đưa độc giả vào cuộc hành trình trên chuyến tàu thời gian từ phố Wall nước Mỹ đến những cuộc chinh phạt của Alexander Đại Đế, bí ẩn lăng mộ Tần Thủy Hoàng, những cõi giới linh hồn, rồi quay ngược lại cuộc sống đời thường mà bất cứ ai cũng thấy có mình ở trong đó. Để cùng suy ngẫm về những giá trị đẹp đẽ của đời sống. Để nắm lấy những thời khắc còn lại của cuộc đời mình và xoay chuyển số phận, nghiệp lực theo chiều hướng tỉnh thức và nhân ái. Và trên hết, đó là cùng chung tay xây dựng một thế giới tốt đẹp trên nền tảng của yêu thương và chữa lành. \r\n\r\n“Nếu chúng ta có thể cùng nhau chuyển hoá những tư tưởng thù hận, tham lam, ích kỷ bằng những tư tưởng cao thượng, tốt lành; chuyển hóa các hành động hận thù, giết chóc bằng tình thương yêu rộng lớn thì mọi việc có thể thay đổi” – trích Muôn Kiếp Nhân Sinh 2. \r\n\r\nThông tin tác giả\r\n\r\nTác giả Nguyên Phong (Vũ Văn Du) du học ở Mỹ từ năm 1968, tốt nghiệp cao học Sinh vật học, Điện toán. Ông từng là Kỹ sư trưởng của Tập đoàn Boeing của Mỹ, Viện trưởng Viện Công nghệ Sinh học Đại học Carnegie Mellon. Ông được mọi người biết tới là Giáo sư John Vu – Nhà khoa học uy tín về công nghệ thông tin. , CMMI và từng giảng dạy ở nhiều trường đại học trên thế giới.\r\n\r\nNguyên Phong là bút danh của bộ sách văn hóa tâm linh được dịch, viết phóng tác từ trải nghiệm, tiềm thức và quá trình nghiên cứu, khám phá các giá trị tinh thần Đông phương. Ông đã viết phóng tác tác phẩm bất hủ Hành trình về Phương Đông năm 24 tuổi (1974).\r\n\r\nCác tác phẩm khác của Nguyên Phong được bạn đọc nhiều thế hệ yêu thích: Ngọc sáng trong hoa sen, Bên rặng tuyết sơn, Hoa sen trên tuyết, Hoa trôi trên sóng nước, Huyền thuật và các đạo sĩ Tây Tạng, Trở về từ xứ tuyết, Trở về từ cõi sáng, Minh triết trong đời sống, Đường mây qua xứ tuyết, Dấu chân trên cát, Đường mây trong cõi mộng, Đường mây trên đất hoa… và bộ sách dành cho sinh viên, thầy cô: Khởi hành, Kết nối, Bước ra thế giới, Kiến tạo thế hệ Việt Nam ưu việt, GS John Vu và lời khuyên dành cho thầy cô, GS John Vu và lời khuyên dành cho các bậc cha mẹ.', 100, '14.5 x 20.5 cm', 568),
(12, 9, 5, 7, 'Muôn kiếp nhân sinh 3', 288000, 259200, 'muon-kiep-nhan-sinh-3-bia-cung.jpg', 'muon-kiep-nhan-sinh-3-bia-cung-b4.jpg', 'muon-kiep-nhan-sinh-3-bia-cung-mockup.jpg', 'Nối tiếp câu chuyện và tinh thần của tập 1 và tập 2, Muôn Kiếp Nhân Sinh 3 tiếp tục đưa bạn đọc đi qua hành trình thức tỉnh tâm linh của nhân vật chính Thomas. Không chỉ là hồi tiếp theo trong chuyến phiêu lưu của linh hồn, tập mới nhất và cũng là tập cuối cùng của bộ sách sẽ bàn luận sâu hơn về hiện tại và tương lai của nhân loại, đồng thời nhẹ nhàng khép lại câu chuyện tiền kiếp nhiều trăn trở, nhiều bài học của Thomas và giải đáp những câu hỏi còn bỏ ngỏ từ hai tập trước.\r\n\r\nNếu tập 1 và tập 2 tập trung lý giải hai quy luật vũ trụ là Nhân quả và Luân hồi, thì tập 3 bàn về khía cạnh đạo đức của con người, đặc biệt là lòng tham và cực đối lập của nó – thái độ sống cho đi. Qua đó, tác giả cùng nhân vật chính Thomas và bậc thầy giác ngộ Kris đã gửi gắm vào quyển sách những thông điệp mạnh mẽ về tương lai nhân loại.\r\n\r\nNếu con người muốn thay đổi tương lai, trước hết phải bắt đầu bằng thay đổi tâm thức. Thay đổi tâm thức bắt nguồn từ việc hiểu rằng, tự do ý chí của con người là một phép thử, cho phép chúng ta lựa chọn cái tốt hoặc cái xấu. Và việc lựa chọn cái tốt mới là nền tảng cho mọi sự thay đổi trong tương lai. Mấu chốt của cuộc cách mạng chuyển đổi tâm thức là để ánh sáng tâm linh trong mỗi người có cơ hội phát triển. Khi ánh sáng khoa học và tâm linh kết hợp sẽ có thể dẫn đường cho nhân loại đi đến nền tảng trí tuệ cao hơn.\r\n\r\nTrong một chiêm nghiệm khác, nhân vật của chúng ta được khai ngộ về các giác quan tinh thần, hay giác quan linh hồn, qua đó trả lời cho câu hỏi lớn của cuộc đời – “Ta là ai?”, đồng thời hiểu được rằng, con người càng chú trọng nhu cầu thân xác bao nhiêu thì nhu cầu tâm linh càng bị hạn chế bấy nhiêu. Do đó, muốn phát triển giác quan linh hồn thì ta phải biết giới hạn hoạt động của giác quan thân xác. Thiền định hay các hình thức tu tập tĩnh tâm khác chính là phương pháp giúp khai mở các giác quan này, từ đó đưa con người đến với trí tuệ thật sự.\r\n\r\nVẫn bằng giọng văn giản dị và chừng mực, tác giả Nguyên Phong một lần nữa đưa độc giả đi qua các kiếp sống khác nhau, từ Hy Lạp, La Mã, đến Pháp thời trung cổ, rồi quay về nước Mỹ hiện đại. Ở đó, ta được trải nghiệm những hoàn cảnh khác nhau, đồng cảm với nỗi đau của nhân vật và chứng kiến sự trưởng thành của trí tuệ, để lần nữa khẳng định được rằng chính ý nghĩ, lời nói và hành động của chúng ta ở kiếp này sẽ dẫn dắt chúng ta đi về đâu ở kiếp sau. Chẳng có thần linh hay thế lực nào quyết định, chúng ta hoàn toàn chịu trách nhiệm về cuộc đời mình.\r\n\r\nNhững cuộc đối thoại dài chứa đầy kiến thức, chiêm nghiệm cùng các câu hỏi gợi mở đã luôn là đặc tính của bộ sách “Muôn Kiếp Nhân Sinh”, và sự trở lại lần này với tác phẩm mới nhất cũng không đánh mất bản sắc ấy. Với vai trò khép lại câu chuyện, Muôn Kiếp Nhân Sinh 3 đã xâu chuỗi lại những mối liên hệ tiền kiếp, vừa làm sáng tỏ cách vận hành của luật Nhân quả và Luân hồi vừa giúp chúng ta thấu hiểu và trân trọng những nhân duyên gặp gỡ của mình trong hiện tại.\r\n\r\nThông qua 10 chương sách đan xen giữa quá khứ và hiện tại, giữa kể chuyện và lý luận, giữa hiện thực và huyền ảo, cuốn sách gợi ra những suy tư về vị thế và vai trò của con người nhỏ bé giữa vũ trụ bao la. Sau cùng, bảo toàn và phát huy tinh thần của hai tập trước, Muôn Kiếp Nhân Sinh 3 tiếp tục là một nỗ lực góp phần đưa con người về nẻo thiện, hướng đến một nhân loại hòa bình, bác ái, vị tha, bất kể màu da, quốc tịch và tôn giáo.\r\n\r\nThông tin tác giả\r\n\r\nNguyên Phong (John Vu) tên thật là Vũ Văn Du, ông sống ở Mỹ từ năm 1968.\r\n\r\nJohn Vu là Giáo sư ưu tú ngành Khoa học Máy tính, Giám đốc Chương trình Đổi mới Công nghệ Sinh học và Tính toán (Biotechnology Innovation and Computation), đồng Giám đốc chương trình Trí tuệ Nhân tạo (Artificial Intelligence) tại Đại học Carnegie Mellon. Hiện ông đã nghỉ hưu.\r\n\r\nTrước khi bước vào giới học viện giảng dạy, John là Kỹ sư trưởng và Technical Fellow (chức danh danh dự cao cấp nhất của chuyên viên kỹ thuật) tại Công ty Boeing. Tại đây, ông đã dẫn dắt thành công một số chương trình nghiên cứu không gian vũ trụ, bao gồm cải tiến phần mềm cho máy bay 777.\r\n\r\nJohn có hơn 35 năm kinh nghiệm trong lĩnh vực phát triển phần mềm và hệ thống, cũng như quản lý một số chương trình tích hợp quy mô lớn, trong đó sản phẩm cuối cùng đòi hỏi tích hợp các thành phần nội bộ với các sản phẩm thương mại có sẵn trên thị trường và các nhà cung cấp thuê ngoài.\r\n\r\nNguyên Phong là bút danh ông dùng cho bộ sách văn hóa tâm linh được dịch, viết phóng tác từ trải nghiệm, tiềm thức và quá trình nghiên cứu, khám phá các giá trị tinh thần phương Đông. Ông đã viết phóng tác tác phẩm bất hủ “Hành trình về Phương Đông” năm 24 tuổi (1974).\r\n\r\nCác tác phẩm khác của Nguyên Phong được bạn đọc nhiều thế hệ yêu thích:\r\n\r\nNgọc sáng trong hoa sen, Bên rặng tuyết sơn, Hoa sen trên tuyết, Hoa trôi trên sóng nước, Huyền thuật và các đạo sĩ Tây Tạng, Trở về từ xứ tuyết, Trở về từ cõi sáng, Minh triết trong đời sống, Đường mây qua xứ tuyết, Muôn kiếp nhân sinh, Đường mây trên cõi mộng, Đường mây trên đất hoa… và bộ sách dành cho sinh viên, thầy cô.  ', 32, '14.5 x 20.5 x 2.6 cm', 464),
(13, 10, 6, 11, 'Thám Tử Lừng Danh Conan - Hanzawa Chàng Hung Thủ Số Nhọ - Tập 6', 25000, 23000, 'hanzawa-chang-hung-thu-so-nho-tap-6.jpg', 'hanzawa-chang-hung-thu-so-nho-tap-6-b04.jpg', 'hanzawa-chang-hung-thu-so-nho-tap-6-mockup.jpg', 'Beika – Nơi xảy ra án mạng nhiều đến nỗi 1 năm ngỡ như dài cả thế kỉ...\r\n\r\nHanzawa đã khăn gói đến nơi được mệnh danh là khu phố tội phạm nức tiếng thế giới với mục đích thủ tiêu “gã đó”. Và rồi người Hanzawa tìm kiếm bấy lâu đã xuất hiện trên TV. Nơi “gã đó” đang ở chính là... Kyoto.', 158, '11.3 x 17.6 x 1 cm', 152),
(14, 11, 6, 11, 'Thám Tử Lừng Danh Conan - Tập 102', 25000, 25000, 'tham-tu-lung-danh-conan-tap-102.jpg', 'tham-tu-lung-danh-conan-tap-102-b4.jpg', 'tham-tu-lung-danh-conan-tap-102-mockup.jpg', 'Jugo Yokomizo tình cờ gặp Chihaya Hagiwara tại bữa tiệc mai mối!\r\nĐiều gì hiện lên trong tâm trí Chihaya khi cô chăm chú nhìn Wataru Takagi!?\r\nChí nguyện “hoa anh đào” được tiếp nối qua bao thế hệ...\r\nVà...\r\nChẳng hề báo trước, tập truyện này sẽ mở ra những diễn biến đầy bất ngờ.', 120, '11.3 x 17.6 x 1 cm', 180),
(15, 11, 6, 11, '[Tiểu thuyết] Thám Tử Lừng Danh Conan - Tàu Ngầm Sắt Màu Đen', 50000, 50000, 'tham-tu-lung-danh-conan-tau-ngam-sat-mau-den.jpg', 'tham-tu-lung-danh-conan-tau-ngam-sat-mau-den-b1.jpg', 'tham-tu-lung-danh-conan-tau-ngam-sat-mau-den-3d.jpg', 'Lần đầu tiên được phát hành đồng thời cùng phim điện ảnh.\r\n\r\nVào ngày 21/7 bộ phim chính thức khởi chiếu tại Việt Nam sau khi trở thành bom tấn phòng vé với doanh thu hơn 13 tỉ Yên tại Nhật.\r\n\r\nTÀU NGẦM SẮT MÀU ĐEN là một vụ án quy mô lớn, phức tạp với bối cảnh là đảo Hachijo-jima, nơi thám tử Conan, tổ chức FBI và lực lượng cảnh sát Nhật Bản sẽ đụng độ với những thành viên cộm cán nhất của tổ chức Áo đen.\r\n\r\nPhao Thái Bình Dương là cơ sở công nghệ cao kết nối mạng lưới máy quay an ninh toàn cầu. Kĩ sư từ khắp thế giới tề tựu về đây cùng thử nghiệm hệ thống camera tối tân “Xác thực già trẻ” do kĩ sư thiên tài Naomi chế tạo. Nhưng Naomi bị bắt cóc cùng với usb chứa bí mật…\r\n\r\nTổ chức Áo đen xuất hiện với nạn nhân mới là Haibara Ai. Không chỉ thân phận của cô có nguy cơ bại lộ mà tính mạng cũng bị đe dọa. Conan chứng kiến chiếc xe chở Haibara đã lao thẳng xuống biển… Số phận của Haibara sẽ ra sao? Conan làm cách nào để cứu được cô bạn? Những câu chuyện quá khứ, những cuộc chạm trán đầy duyên nợ, những bí mật nào tưởng đã chôn giấu dưới đáy biển lại trồi lên?\r\n\r\nMột vụ án li kì gay cấn, hồi hộp thót tim nhưng cũng chứa đựng những cảm xúc mãnh liệt về tình bạn, chính nghĩa và hòa bình cho nhân loại.\r\n\r\nĐây là lần đầu tiên tiểu thuyết được phát hành gần như đồng thời cùng với phim điện ảnh, một nỗ lực thực sự của ban biên tập nói riêng và của NXB nói chung.\r\n\r\nTIỂU THUYẾT THÁM TỬ LỪNG DANH CONAN TÀU NGẦM SẮT MÀU ĐEN cuốn hút bạn đọc bởi câu chuyện vụ án li kì, diễn biến bất ngờ, những suy luận sắc sảo. Ngôn ngữ trong sáng, đơn giản, cách kể chuyện tuyến tính phù hợp với độc giả tuổi thiếu niên, những fan hâm mộ manga quen đọc truyện tranh sẽ thấy quen thuộc gần gũi và dễ dàng tiếp cận. 8 trang tranh màu đính kèm giới thiệu nhân vật và diễn biến vụ án cũng là điểm nhấn của cuốn sách như một món quà tặng kèm.\r\n\r\nVới sự xuất hiện của tiểu thuyết light novel bên cạnh manga cũng làm phong phú thêm đề tài Conan được độc giả ưa chuộng, đồng thời có thể thỏa mãn phần nhỏ sự khó tính của các phụ huynh và các nhà giáo dục. Độc giả từ thích đọc manga mà chuyển sang đọc light novel và sau đó sẽ thấy dễ dàng hơn với đọc sách văn học – sách chữ. Đó không phải là một hi vọng hão huyền không có cơ sở!\r\n\r\nPhim điện ảnh Tiểu thuyết Thám tử lừng danh Conan Tàu ngầm sắt màu đen được khởi chiếu ngày 21.7.2023', 10, '13 x 19 x 1.4 cm', 224);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publishing_company`
--

CREATE TABLE `publishing_company` (
  `id_pub` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `publishing_company`
--

INSERT INTO `publishing_company` (`id_pub`, `name`, `status`) VALUES
(1, 'NXB Dân Trí', 1),
(2, 'Alphabooks', 1),
(3, 'NXB Văn Học', 1),
(4, 'Báo Sinh Viên VN - Hoa Học Trò', 1),
(5, 'NXB Tổng Hợp TP. HCM', 1),
(6, 'NXB Kim Đồng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlish` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `publishing_company`
--
ALTER TABLE `publishing_company`
  ADD PRIMARY KEY (`id_pub`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlish`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
