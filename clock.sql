-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 13, 2026 lúc 11:41 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clock`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collection_clock`
--

CREATE TABLE `collection_clock` (
  `id_collection` int(11) NOT NULL,
  `name_collection` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `collection_clock`
--

INSERT INTO `collection_clock` (`id_collection`, `name_collection`, `description`) VALUES
(1, 'phong cách thể thao năng động', 'Một biến thể thể thao và lớn hơn của dòng Royal Oak, nổi bật với thiết kế mạnh mẽ và các tính năng chuyên dụng. Dòng này được biết đến với độ bền và khả năng chống nước tốt, thường được sử dụng cho các hoạt động thể thao và ngoài trời.'),
(2, 'xu hướng cổ điển', ' Một dòng sản phẩm nằm trong bộ sưu tập Audemars Piguet, thường mang phong cách cổ điển và có thể là những phiên bản cải tiến của các mẫu đồng hồ trước đó.'),
(3, 'hơi hướng hiện đại', 'Một dòng sản phẩm mới hơn của Audemars Piguet, nổi bật với thiết kế hiện đại và tinh tế. Dòng này được xem là bước đột phá trong thiết kế đồng hồ của thương hiệu, kết hợp giữa truyền thống và hiện đại.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_product`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'sản phẩm đẹp lắm nhân viên tư vấn nhiệt tình', '2024-12-09 04:12:10', '2024-12-09 04:12:10'),
(2, 1, 1, 'ff', '2024-12-09 06:36:37', '2024-12-09 06:36:37'),
(4, 1, 1, 'sản phẩm tốt lắm nhân viên rất nhiệt tình cảm ơn shop', '2024-12-09 20:37:08', '2024-12-09 20:37:08'),
(6, 23, 6, 'sản phẩm đẹp quá', '2024-12-23 07:12:37', '2024-12-23 07:12:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `described`
--

CREATE TABLE `described` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `describe_sample` varchar(250) NOT NULL,
  `describe_case_sample` varchar(250) NOT NULL,
  `describe_dial_sample` varchar(250) NOT NULL,
  `describe_bracelet_sample` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `described`
--

INSERT INTO `described` (`id`, `id_product`, `describe_sample`, `describe_case_sample`, `describe_dial_sample`, `describe_bracelet_sample`) VALUES
(1, 4, 'đồng hồ bằng vàng trắng 18 carat, mặt kính sapphire ', 'Vỏ đồng hồ bằng vàng trắng 18 carat, mặt kính sapphire chống lóa và nắp lưng đồng hồ.', 'Mặt số bằng vàng trắng 18 carat và NAC, mặt phụ màu xám và vùng ngoài màu đen, kim bằng vàng trắng..', 'Dây đeo cá sấu đen với khóa gập AP bằng vàng trắng 18 cara.'),
(2, 1, 'Vỏ titan của phiên bản Royal Oak Concept Flying Tourbillon GMT 44mm mới được hoàn thiện bằng vành gốm màu xanh lá cây', 'Vỏ titan phun cát và vành bezel bằng gốm xanh, mặt kính sapphire chống lóa và mặt sau bằng gốm xanh, nút bấm bằng gốm xanh và núm vặn khóa bằng vít, bộ phận bảo vệ nút bấm bằng titan phun cát.', 'Kim chỉ múi giờ thứ hai ở vị trí 3 giờ trên tấm sapphire, kim chỉ vị trí núm điều chỉnh ở vị trí 6 giờ, kim Royal Oak bằng vàng hồng phủ chất phát quang, vành bezel bên trong màu đen.', 'Dây đeo cao su màu xanh lá cây có kết cấu với khóa gấp AP bằng titan phun cát. Dây đeo cao su màu đen bổ sung.'),
(3, 6, 'Chiếc đồng hồ 41 mm này được chế tác bằng vàng cát, một hợp kim vàng 18 carat mới, nằm giữa vàng trắng và vàng hồng và phản chiếu ánh sáng. Bộ máy nhiều lớp, hở của nó kết hợp tông màu vàng cát và rhodium.', 'Vỏ đồng hồ bằng vàng cát 18 carat, mặt kính sapphire chống lóa và nắp lưng đồng hồ.', 'Vành đồng hồ bên trong tông màu vàng cát, các vạch chỉ giờ bằng vàng trắng và kim đồng hồ Royal Oak phủ lớp phát quang.', 'Vòng tay vàng cát 18 cara có khóa gập AP.'),
(4, 7, 'Phiên bản giới hạn 200 chiếc của Royal Oak Perpetual Calendar Openworked “Cactus Jack” được chế tác bằng gốm màu nâu—lần đầu tiên tại Audemars Piguet', 'Phiên bản giới hạn 200 chiếc của Royal Oak Perpetual Calendar Openworked “Cactus Jack” được chế tác bằng gốm màu nâu—lần đầu tiên tại Audemars Piguet', 'Mặt số bằng sapphire, các vùng bên ngoài của mặt số màu khói, các vạch chỉ giờ màu nâu và kim Royal Oak phủ chất phát quang, vành bezel bên trong màu nâu.', 'Dây đeo bằng da bê màu nâu với khóa gập vàng hồng đặc biệt.'),
(5, 6, 'Vỏ đồng hồ bằng vàng cát 18 carat, mặt kính sapphire chống chói', 'Vỏ đồng hồ bằng vàng cát 18 carat, mặt kính sapphire chống chói và nắp lưng đồng hồ.\r\n', 'Vành đồng hồ bên trong tông màu vàng cát, các vạch chỉ giờ bằng vàng trắng và kim đồng hồ Royal Oak phủ lớp phát quang.', 'Vòng tay vàng cát 18 cara có khóa gập AP.\r\n\r\n'),
(6, 3, 'Vỏ đồng hồ bằng vàng hồng 18 carat kết hợp với mặt số nổi màu xanh lá cây mới của bộ sưu tập và dây đeo phủ cao su đồng bộ tạo nên vẻ ngoài thanh lịch vượt thời gian.', 'Vỏ đồng hồ bằng vàng hồng 18 carat, mặt kính sapphire chống ngọc và dưỡng thắt lưng đồng hồ.\r\n\r\n', 'Mặt đồng hồ màu xanh lá cây, vạch chỉ giờ và kim đồng hồ bằng vàng hồng có lớp phủ phát quang, vành đồng hồ bên trong màu xanh lá cây.', 'Dây đeo phủ cao su xanh lá cây có khóa cài bằng vàng hồng 18 cara.'),
(8, 2, 'Chiếc đồng hồ Royal Oak Selfwinding Flying Tourbillon 41 mm này kết hợp giữa thép không gỉ với mặt số màu đỏ tía khói tạo nên sự tương phản nổi bật.', 'Vỏ thép không gỉ, mặt kính sapphire chống lóa và mặt sau đồng hồ.', 'Mặt đồng hồ màu đỏ tía khói, vạch chỉ giờ bằng vàng trắng và kim đồng hồ Royal Oak phủ lớp phát quang.', 'Vòng đeo tay bằng thép không gỉ có khóa gập AP.'),
(9, 5, 'Vỏ thép không gỉ, mặt kính sapphire chống lóa kép và mặt sau đồng hồ.', 'Vỏ thép không gỉ, mặt kính sapphire chống lóa kép và mặt sau đồng hồ.', 'Mặt số màu xanh lá cây, các mặt phụ màu xanh lá cây và vùng bên ngoài tông màu rhodium, mặt phụ màu xanh lá cây ở vị trí 6 giờ, các vạch chỉ giờ và kim bằng vàng trắng phủ chất phát quang, vành bezel bên trong màu xanh lá cây.', 'Dây đeo phủ cao su màu xanh lá cây có khóa cài bằng thép không gỉ.'),
(10, 8, 'Chiếc đồng hồ 38 mm bằng vàng hồng 18 carat này mang đến vẻ đẹp hai tông màu đương đại', 'Vỏ đồng hồ bằng vàng hồng 18 carat đính kim cương cắt sáng, mặt kính sapphire chống lóa kép và nắp lưng đồng hồ.\r\n\r\n', 'Mặt đồng hồ được đính đá sapphire xanh và kim cương cắt sáng bóng, vạch chỉ giờ bằng vàng hồng, kim đồng hồ bằng vàng hồng phủ chất phát quang, vành đồng hồ bên trong màu xanh.', 'Dây đeo bằng da cá sấu hình vuông lớn màu xanh lam đậm với khóa gập AP bằng vàng hồng 18 carat đính kim cương cắt sáng bóng.'),
(11, 42, 'dep', 'sss', ' jjj', 'ss');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `described_news`
--

CREATE TABLE `described_news` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `data_news` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data_news`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `described_news`
--

INSERT INTO `described_news` (`id`, `id_news`, `data_news`) VALUES
(1, 1, '{\r\n  \"public_exhibition1\": \"Triển lãm công cộng Shaping Materials sẽ được tổ chức từ ngày 3 đến ngày 16 tháng 6 năm 2024 tại Piazza del Quadrilatero của Portrait Milano, ngay trung tâm thành phố Milan. Hành trình đắm chìm vào thế giới của Manufacture này nhằm tôn vinh tinh thần táo bạo và sáng tạo đã thúc đẩy nhiều thế hệ thợ đồng hồ và thợ thủ công đưa ra những ý tưởng mới và định hình thế giới của Audemars Piguet.\",\r\n \"image_header\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\r\n  \"public_exhibition2\": \"Sau khi khai trương AP House Milano mới của thương hiệu tại tòa nhà Garage Traversi cũ trên phố Via Bagutta, triển lãm này củng cố mối quan hệ địa phương của Audemars Piguet với Milan, một thành phố mà Audemars Piguet cùng chia sẻ cam kết mạnh mẽ về di sản, sự sáng tạo và hiện đại.\",\r\n  \"discovery_name\": \"KHÔNG NGỪNG KHÁM PHÁ <br><span>NHỮNG CHÂN TRỜI SÁNG TẠO MỚI</span>\",\r\n  \"discovery_content1_block1\": \"Tài liệu định hình kể về câu chuyện của Audemars Piguet trong quá trình hành động không ngừng nghỉ tìm kiếm các kỹ thuật và sáng tạo thiết kế, bắt đầu từ vật liệu và cách chúng có thể biến đổi thành các thành phần đồng hồ trước đó khi được hoàn thiện bởi những nghệ nhân lành nghề. Trong khi một số loại kim loại, có tính chất như vàng và bạch kim, vốn có giá trị chất chất, thì những vật liệu khác, như thép, titan, carbon và gốm, đã trở nên quý giá thông qua công việc tỉ mỉ của những người thợ thủ công.\",\r\n  \"discovery_content1_block2\": \"Phòng trưng bày cũng nhấn mạnh cách thức thương hiệu này tự tạo ra con đường riêng về thiết kế hình thức, thường mang lại cảm giác đột phá từ thế giới văn hóa rộng hơn cũng như các phong cách kiến ​​trúc và nghệ thuật.\",\r\n  \"discovery_content1_block3\": \"Được chia thành năm phòng, triển lãm sẽ trưng bày một số mẫu đồng hồ cổ điển và đương đại, bao gồm một số sáng tạo mới nhất của thương hiệu và một loạt đồng hồ dành riêng cho cổ tay thanh mảnh nhất đã đánh dấu lịch sử của Nhà sản xuất về mặt thiết kế thu nhỏ, thay đổi vật liệu mới hoặc đính đá quý.\",\r\n  \"discovery_content2_block1\": \"Trong hơn một thế kỷ, vỏ đồng hồ Audemars Piguet đã được giải quyết theo nhiều kích thước, vật liệu và dạng hình khác nhau, sử dụng hệ thống truyền hình học tròn, vuông và chữ nhật, riêng lẻ hoặc kết hợp với các dạng hình học bất ngờ như hình thang và hình bát giác. Sự sáng tạo không có giới hạn khi vật liệu và ngôn ngữ hình thức kết hợp với mặt số sáng tạo, màu sắc và kỹ thuật gắn đá quý để thổi hồn vào các thiết kế biểu cảm phản ánh ánh tinh thần tiên phong mà Nhà sản xuất đã được giữ và nuôi dưỡng qua nhiều thế hệ.\",\r\n  \"discovery_content2_block2\": \"Màn hình sẽ đi kèm với nội dung giáo dục giải trí để mang lại sự chìm đắm và thú vị hoàn toàn.\",\"img_list1\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x2763_narrow_shaping_materials_02?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\"img_list2\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/lookbook_material2?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\"img_list3\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/SHAPING-MATERIALS_GENERIC-KV_Master_apcom?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\"header_video\":\"https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/AP_Exhibition_MainFilm_16x9_45sec_1920x1080?dpr=off\"\r\n}'),
(2, 2, '{\r\n\r\n  \"LE_BRASSUS_introduce1\": \"Một lần nữa, chúng tôi muốn chia sẻ những lời chúc tốt đẹp nhất bằng video chào mừng có sự tham gia của các thành viên AP… và hai khách mời đặc biệt!\",\r\n  \"LE_BRASSUS_introduce2\": \"Hãy theo chân đoàn làm phim khi họ khám phá trụ sở chính của chúng tôi tại Le Brassus, một nơi truyền cảm hứng đã tạo nên con người chúng tôi ngày hôm nay và tiếp tục định hình tương lai của chúng tôi.\",\r\n\"image_welcome_TO_ITALIA\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/img1_2024_v3?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\r\n  \"WELCOME_TO_ILARIA_introduce1_ct1\": \"The AP family is delighted to welcome Ilaria Resta, who will assume the role of Chief Executive Director on January 1, 2024. It is with great pleasure that we give her the floor to share our special end-of-year wishes with François-Henry Bennahmias, whose extraordinary career at AP is coming to an end.\",\r\n  \"WELCOME_TO_ILARIA_introduce1_ct2\": \"During her rich onboarding period, Ilaria has had the opportunity to meet the teams, experience first-hand our watchmaking expertise, and be inspired by our pursuit of excellence. This spirit, born more than a century ago, unites us across time and geography.\",\r\n  \"WELCOME_TO_ILARIA_introduce2_ct1\": \"A chapter ends. A new one begins. The journey continues for the entire AP family.\",\r\n  \"WELCOME_TO_ILARIA_introduce2_ct2\": \"From all of us in Le Brassus and around the world, we wish you all the best for the New Year, and we look forward to sharing our passion with you in 2024!\",\r\n  \"WELCOME_TO_ILARIA_introduce2_ct3\": \"Greetings from Le Brassus.\"\r\n}\r\n'),
(3, 3, '{\r\n  \"public_exhibition1\": \"Audemars Piguet rất vui mừng được tham gia Tuần lễ đồng hồ Dubai lần thứ 6 diễn ra từ ngày 16 đến ngày 20 tháng 11 năm 2023 tại cổng Trung tâm tài chính quốc tế Dubai (DIFC).  Không gian thương hiệu sẽ tổ chức một phòng triển lãm mô-đun lớn mang tên  Seek Beyond  , khám phá tiến trình bất tận của Nhà sản xuất đến những chân trời mới.z\",\r\n \"image_header\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/dubai2023_1920x839_header?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\r\n  \"public_exhibition2\": \"Được chia thành ba phòng, triển lãm sẽ trưng bày một số đồng hồ di sản phẩm và đương đại, bao gồm cả Mã 11.59 của Audemars Piguet Ultra-Complication Universelle (RD#4) được ra mắt vào đầu năm. Những chiếc đồng hồ này kết hợp giữa bí quyết của tổ tiên và kỹ thuật hiện đại với công thái học và thẩm mỹ đại.\",\r\n  \"discovery_name\": \"Tuần lễ đồng hồ Dubai <br><span>lần thứ 6</span>\",\r\n  \"discovery_content1_block1\": \"Triển lãm cũng sẽ làm sáng tỏ quá trình tìm kiếm vật liệu, đá quý, ngôn ngữ hình thức và màu sắc của Audemars Piguet. Ngoài ra, một số nghệ nhân của Manufacture sẽ có mặt tại chỗ để giới thiệu di sản và bí quyết của thương hiệu. Du khách sẽ có thể khám phá nhiều loại vật liệu và đá quý khác nhau, để hiểu rõ hơn về các đặc tính vật lý của chúng và hành trình biến đổi của chúng thành các thiết kế đồng hồ công thái học cao cấp. Audemars Piguet cũng sẽ tham gia chương trình hội thảo thực hành của Dubai Watch Week, với hai lớp học nâng cao do các chuyên gia hướng dẫn.\",\r\n  \"discovery_content1_block2\": \"Phòng trưng bày cũng nhấn mạnh cách thức thương hiệu này tự tạo ra con đường riêng về thiết kế hình thức, thường mang lại cảm giác đột phá từ thế giới văn hóa rộng hơn cũng như các phong cách kiến ​​trúc và nghệ thuật.\",\r\n  \"discovery_content1_block3\": \"Chúng tôi rất vui mừng được tham gia vào phiên bản thứ 6 của Tuần lễ đồng hồ Dubai, một trong những nền tảng đồng hồ hàng đầu về kiến ​​thức\",\r\n  \"discovery_content2_block1\": \"Là trung tâm lớn của văn hóa và đổi mới, nơi đây cung cấp bối cảnh hoàn hảo để gặp gỡ, thảo luận và thúc đẩy ngành công nghiệp đồng hồ phát triển.\",\r\n  \"discovery_content2_block2\": \"Màn hình sẽ đi kèm với nội dung giáo dục giải trí để mang lại sự chìm đắm và thú vị hoàn toàn.\",\"img_list1\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car16_dubai2023?size=1146,0&fmt=avif-alpha&dpr=off\",\"img_list2\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car4_dubai2023?size=1146,0&fmt=avif-alpha&dpr=off\",\"img_list3\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car18_dubai2023?size=1146,0&fmt=avif-alpha&dpr=off\",\"header_video\":\"https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/AP_Exhibition_MainFilm_16x9_45sec_1920x1080?dpr=off\"\r\n}'),
(4, 4, '{\r\n  \"public_exhibition1\": \"Triển lãm công cộng Shaping Materials sẽ được tổ chức từ ngày 3 đến ngày 16 tháng 6 năm 2024 tại Piazza del Quadrilatero của Portrait Milano, ngay trung tâm thành phố Milan. Hành trình đắm chìm vào thế giới của Manufacture này nhằm tôn vinh tinh thần táo bạo và sáng tạo đã thúc đẩy nhiều thế hệ thợ đồng hồ và thợ thủ công đưa ra những ý tưởng mới và định hình thế giới của Audemars Piguet.\",\r\n \"image_header\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\r\n  \"public_exhibition2\": \"Sau khi khai trương AP House Milano mới của thương hiệu tại tòa nhà Garage Traversi cũ trên phố Via Bagutta, triển lãm này củng cố mối quan hệ địa phương của Audemars Piguet với Milan, một thành phố mà Audemars Piguet cùng chia sẻ cam kết mạnh mẽ về di sản, sự sáng tạo và hiện đại.\",\r\n  \"discovery_name\": \"KHÔNG NGỪNG KHÁM PHÁ <br><span>NHỮNG CHÂN TRỜI SÁNG TẠO MỚI</span>\",\r\n  \"discovery_content1_block1\": \"Tài liệu định hình kể về câu chuyện của Audemars Piguet trong quá trình hành động không ngừng nghỉ tìm kiếm các kỹ thuật và sáng tạo thiết kế, bắt đầu từ vật liệu và cách chúng có thể biến đổi thành các thành phần đồng hồ trước đó khi được hoàn thiện bởi những nghệ nhân lành nghề. Trong khi một số loại kim loại, có tính chất như vàng và bạch kim, vốn có giá trị chất chất, thì những vật liệu khác, như thép, titan, carbon và gốm, đã trở nên quý giá thông qua công việc tỉ mỉ của những người thợ thủ công.\",\r\n  \"discovery_content1_block2\": \"Phòng trưng bày cũng nhấn mạnh cách thức thương hiệu này tự tạo ra con đường riêng về thiết kế hình thức, thường mang lại cảm giác đột phá từ thế giới văn hóa rộng hơn cũng như các phong cách kiến ​​trúc và nghệ thuật.\",\r\n  \"discovery_content1_block3\": \"Được chia thành năm phòng, triển lãm sẽ trưng bày một số mẫu đồng hồ cổ điển và đương đại, bao gồm một số sáng tạo mới nhất của thương hiệu và một loạt đồng hồ dành riêng cho cổ tay thanh mảnh nhất đã đánh dấu lịch sử của Nhà sản xuất về mặt thiết kế thu nhỏ, thay đổi vật liệu mới hoặc đính đá quý.\",\r\n  \"discovery_content2_block1\": \"Trong hơn một thế kỷ, vỏ đồng hồ Audemars Piguet đã được giải quyết theo nhiều kích thước, vật liệu và dạng hình khác nhau, sử dụng hệ thống truyền hình học tròn, vuông và chữ nhật, riêng lẻ hoặc kết hợp với các dạng hình học bất ngờ như hình thang và hình bát giác. Sự sáng tạo không có giới hạn khi vật liệu và ngôn ngữ hình thức kết hợp với mặt số sáng tạo, màu sắc và kỹ thuật gắn đá quý để thổi hồn vào các thiết kế biểu cảm phản ánh ánh tinh thần tiên phong mà Nhà sản xuất đã được giữ và nuôi dưỡng qua nhiều thế hệ.\",\r\n  \"discovery_content2_block2\": \"Màn hình sẽ đi kèm với nội dung giáo dục giải trí để mang lại sự chìm đắm và thú vị hoàn toàn.\",\"img_list1\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x2763_narrow_shaping_materials_02?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\"img_list2\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/lookbook_material2?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\"img_list3\":\"https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/SHAPING-MATERIALS_GENERIC-KV_Master_apcom?size=1920,0&wid=1920&fmt=avif-alpha&dpr=off\",\"header_video\":\"https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/AP_Exhibition_MainFilm_16x9_45sec_1920x1080?dpr=off\"\r\n}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `name_news` varchar(200) NOT NULL,
  `date_news` date NOT NULL,
  `describe_news_sample` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `name_news`, `date_news`, `describe_news_sample`) VALUES
(1, 'triển lãm mới<br><span>\"vật liệu định hình\" tại Milan </span>', '2024-10-16', 'Triển lãm công cộng mới mang tên \"Shaping Materials\" sẽ được tổ chức từ ngày 3 đến ngày 16 tháng 6 năm 2024 tại Piazza del Quadrilatero của Portrait Milano, ngay trung tâm thành phố Milan.'),
(2, 'Lời chào năm 2024 từ Le Brassus: Một chương mới bắt đầu', '2024-10-16', 'Một lần nữa, chúng tôi muốn chia sẻ những lời chúc tốt đẹp nhất bằng một video chào mừng có sự tham gia của các thành viên AP… và hai khách mời đặc biệt!'),
(3, 'Audemars Piguet tại Tuần lễ đồng hồ Dubai 2023', '2024-10-16', 'Audemars Piguet rất vui mừng được tham gia Tuần lễ đồng hồ Dubai lần thứ 6 diễn ra từ ngày 16 đến ngày 20 tháng 11 năm 2023 tại cổng Trung tâm tài chính quốc tế Dubai (DIFC).'),
(4, 'Lời chào năm 2023 từ Le Brassus: Bữa tiệc cuối năm \"Octagon\"', '2023-10-06', 'Một lần nữa, chúng tôi muốn chia sẻ lời chúc tốt đẹp nhất thông qua video chào mừng có sự tham gia của những người dân AP.\r\n\r\n'),
(6, 'ddd', '0077-07-07', '88'),
(7, '', '0000-00-00', '{\"muc_1\":\"addd\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_image`
--

CREATE TABLE `news_image` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `news_image_main` varchar(300) NOT NULL,
  `news_video_main` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news_image`
--

INSERT INTO `news_image` (`id`, `id_news`, `news_image_main`, `news_video_main`) VALUES
(1, 1, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?wid=560&hei=401&scl=2.0&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?wid=560&hei=401&scl=2.0&dpr=off'),
(2, 2, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/header_1920X839_2024_v4?wid=560&hei=401&scl=2.0&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/1920x839_header_shaping_materials_02?wid=560&hei=401&scl=2.0&dpr=off'),
(3, 3, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/dubai2023_1920x839_header?wid=560&hei=401&scl=2.0&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/dubai2023_1920x839_header?wid=560&hei=401&scl=2.0&dpr=off'),
(4, 4, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/gc_2023_header_1920x839_v2?wid=560&hei=401&scl=2.0&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/gc_2023_header_1920x839_v2?wid=560&hei=401&scl=2.0&dpr=off');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','shipped','delivered','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id_order`, `order_number`, `user_id`, `status`, `created_at`, `updated_at`, `total_cost`) VALUES
(31, 'ORD20241126001', 1, 'delivered', '2024-11-26 10:59:28', '2024-12-23 06:52:53', 20),
(32, 'ORD20241126002', 1, 'pending', '2024-11-26 11:50:09', '2024-11-26 11:50:09', 20),
(33, 'ORD20241126003', 1, 'pending', '2024-11-26 11:56:37', '2024-11-26 11:56:37', 0),
(34, 'ORD20241127001', 1, 'shipped', '2024-11-27 19:29:37', '2024-11-27 19:46:32', 50),
(35, 'ORD20241127002', 1, 'pending', '2024-11-27 20:10:50', '2024-11-27 20:10:50', 50),
(36, 'ORD20241128003', 1, 'pending', '2024-11-28 01:57:39', '2024-11-28 01:57:39', 10),
(37, 'ORD20241203001', 1, 'cancelled', '2024-12-03 01:38:14', '2024-12-03 01:38:47', 10),
(38, 'ORD20241209001', 1, 'pending', '2024-12-09 06:53:29', '2024-12-09 06:53:29', 10),
(39, 'ORD20241209002', 2, 'cancelled', '2024-12-09 06:57:08', '2024-12-09 06:57:24', 30),
(40, 'ORD20241209003', 1, 'pending', '2024-12-09 13:34:45', '2024-12-09 13:34:45', 40),
(41, 'ORD20241221001', 1, 'pending', '2024-12-21 04:13:52', '2024-12-21 04:13:52', 20),
(42, 'ORD20241222001', 2, 'pending', '2024-12-22 16:00:03', '2024-12-22 16:00:03', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `id_product`, `quantity`) VALUES
(13, 31, 1, 1),
(14, 32, 1, 1),
(15, 34, 1, 1),
(16, 34, 4, 1),
(17, 35, 1, 1),
(18, 35, 4, 1),
(19, 36, 8, 1),
(20, 37, 8, 1),
(21, 38, 8, 1),
(22, 39, 6, 1),
(23, 40, 8, 4),
(24, 41, 1, 1),
(25, 42, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(200) NOT NULL,
  `date_release_clock` date NOT NULL,
  `model_watch` varchar(200) NOT NULL,
  `code_clock` varchar(200) NOT NULL,
  `id_collection` int(11) DEFAULT NULL,
  `video_pr` varchar(400) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `date_release_clock`, `model_watch`, `code_clock`, `id_collection`, `video_pr`, `price`) VALUES
(1, 'Royal Oak \r\n', '2024-10-03', 'có dây cót', '26589IO.OO.D056CA.01', 3, 'https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/ROO_26420TI_Lifestyle_Harder_Stronger_Strap_VI_2021_15s_16-9_FullHD_No_logo_MP4%201920x1080_1?dpr=off', 20),
(2, 'royal oak', '2024-10-09', 'tự động', '26589IO.OO.D500CA.01', 2, 'https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/AUDEMARS_60s_16-9%20(1)_1?dpr=off', 20),
(3, 'royal oak', '2024-10-09', 'tự động', '26589IO.OO.D056CA.01\r\n', 1, 'https://dynamicmedia.audemarspiguet.com/is/content/audemarspiguet/RO%2026735SG.OO.1320SG.01%20VIDEO%20MOOD%20169-1?dpr=off', 10),
(4, 'royal modern', '2024-10-09', 'tự động', '\r\n26393ST.OO.A056KB.01\r\n', 3, '', 30),
(5, 'royal classical', '2022-10-13', 'tự động', '26420ST.OO.A828CR.01', 2, '', 20),
(6, 'royal modern plus', '2023-10-11', 'tự động', '\r\n26735SG.OO.1320SG.01\r\n', 3, '', 30),
(7, 'royal modern sport', '2024-10-09', 'tự động', '\r\n26735SG.O3.1320SG.01\r\n', 3, '', 20),
(8, 'royal luxury', '2024-10-10', 'tự động', '26589IO.O2.D500CA.01', 2, '', 10),
(9, 'royal oak(classical)', '2024-10-09', 'lên dây cót', '26589IO.O4.D500CA.01', 2, '', 10),
(24, '2', '2024-10-11', '4', '77777', 3, '2', 30),
(42, 'hh', '2024-10-11', ' 1', '77777', 1, 'jj', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `size` int(50) NOT NULL,
  `material` varchar(100) NOT NULL,
  `Water_Resistance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `id_product`, `size`, `material`, `Water_Resistance`) VALUES
(1, 1, 0, '18-carat white gold', 50),
(2, 2, 40, '18-carat pink gold\r\n', 40),
(3, 3, 36, 'goal', 50),
(4, 4, 36, 'black ceramic', 50),
(5, 6, 38, 'Titanium and gold', 60),
(6, 7, 40, 'Titanium\r\n', 55),
(7, 5, 43, 'gold', 54),
(8, 8, 38, '18-carat pink gold', 55),
(9, 9, 55, '18-carat pink caborn', 66),
(12, 24, 77, ' gold', 30),
(13, 42, 77, ' gold', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `image_main` varchar(200) NOT NULL,
  `images_case` varchar(300) NOT NULL,
  `image_dial` varchar(300) NOT NULL,
  `image_bracelet` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `id_product`, `image_main`, `images_case`, `image_dial`, `image_bracelet`) VALUES
(1, 1, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-833?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-727?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-727)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-727?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-727)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-727?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-727)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(2, 2, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1132?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1031?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1031)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1031?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1031)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1031?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1031)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(3, 3, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1016?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1020?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1020)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1020?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1020)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1020?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1020)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(4, 4, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-638?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-928?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-928)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-533?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-533)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-533?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-533)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(5, 6, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1131?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1033?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1033)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1033?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1033)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1033?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1033)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(6, 7, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1128?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1019?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1019)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1019?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1019)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1019?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1019)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(7, 5, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1003?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-937?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-937)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-937?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-937)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-937?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-937)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(8, 8, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1229?fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-112?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-112)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-112?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-112)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-112?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-112)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off'),
(9, 9, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/standup-1096?fmt=avif-alpha&dpr=off', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image_detail`
--

CREATE TABLE `product_image_detail` (
  `id_product` int(11) NOT NULL,
  `product_image_detail` varchar(300) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image_detail`
--

INSERT INTO `product_image_detail` (`id_product`, `product_image_detail`, `id`) VALUES
(2, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1031?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1031)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 1),
(2, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1031?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1031)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 2),
(2, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1031?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1031)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off', 3),
(4, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car2_26398BC.OO.D002CR.02?size=1146,0&fmt=avif-alpha&dpr=off', 4),
(4, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car1_26398BC.OO.D002CR.02?size=1146,0&fmt=avif-alpha&dpr=off', 5),
(4, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car3_26398BC.OO.D002CR.02?size=1146,0&fmt=avif-alpha&dpr=off', 6),
(1, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car1_26589IO.OO.D056CA.01?size=1146,0&fmt=avif-alpha&dpr=off', 7),
(1, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car2_26589IO.OO.D056CA.01?size=1146,0&fmt=avif-alpha&dpr=off', 8),
(1, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car3_26589IO.OO.D056CA.01?size=1146,0&fmt=avif-alpha&dpr=off', 9),
(6, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car1_26735SG.OO.1320SG.01?size=1146,0&fmt=avif-alpha&dpr=off', 10),
(6, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car2_26735SG.OO.1320SG.01?size=1146,0&fmt=avif-alpha&dpr=off', 11),
(6, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car4_26735SG.OO.1320SG.01?size=1146,0&fmt=avif-alpha&dpr=off', 12),
(3, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1020?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1020)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 13),
(3, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1020?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1020)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 14),
(3, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1020?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1020)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off', 15),
(7, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1019?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1019)&scl=1.5&rotate=330&pos=80,80&dpr=off&fmt=avif-alpha&dpr=off', 19),
(7, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1019?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1019)&scl=1&pos=-190,130&dpr=off&fmt=avif-alpha&dpr=off', 20),
(7, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/watch-1019?layer=0&hide=1&wid=955&hei=750&layer=2&src=is(audemarspiguet/watch-1019)&scl=1.2&rotate=45&pos=350,-390&dpr=off&fmt=avif-alpha&dpr=off', 21),
(5, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car1_26393ST.OO.A056KB.01?size=1146,0&fmt=avif-alpha&dpr=off', 22),
(5, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car5_15210ST.OO.A056KB.01?size=1146,0&fmt=avif-alpha&dpr=off', 23),
(5, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car5_15210ST.OO.A056KB.01?size=1146,0&fmt=avif-alpha&dpr=off', 24),
(8, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car3_77410OR.ZZ.D343CR.01?size=568,0&fmt=avif-alpha&dpr=off', 25),
(8, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car2_77410OR.ZZ.D343CR.01?size=568,0&fmt=avif-alpha&dpr=off', 26),
(8, 'https://dynamicmedia.audemarspiguet.com/is/image/audemarspiguet/car1_77410OR.ZZ.D343CR.01?size=568,0&fmt=avif-alpha&dpr=off', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(300) DEFAULT NULL,
  `token_expiration` datetime DEFAULT NULL,
  `firtlast_Name` varchar(100) NOT NULL,
  `gioi_tinh` enum('nam','nữ','khác') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`, `reset_token`, `token_expiration`, `firtlast_Name`, `gioi_tinh`) VALUES
(1, 'thaontt', 'Thao041005', 'nguyenthao.041005@gmail.com', '2024-10-29 07:04:50', '2024-11-03 02:04:18', NULL, NULL, 'nguyễn thảo', 'nam'),
(2, 'ngongz', 'huythong@', 'huythong@gmail.com', '2024-10-29 07:04:50', '2024-11-03 02:04:18', NULL, NULL, 'nguyễn thông', 'nam'),
(22, 'thuct', 'thu123', '', '2024-11-27 08:10:25', '2024-12-26 00:09:59', '517ee0c1991f95ebe5f0f70e53ef6fd1dfd653d40b9d9e244a44fd584be77ea424d49ba4650648cdd320d43ec7e6a949233c', '2024-12-26 08:09:59', 'nguyễn anh thư', ''),
(23, 'thuctj', 'thao123', 'nguyenthaoz.@gmail.com', '2024-12-23 00:06:42', '2024-12-23 04:24:01', NULL, NULL, 'nguyễn thuận thảo', ''),
(27, 'kk', 'thao123', 'nguyenthaozn.@gmail.com', '2024-12-24 03:03:51', '2024-12-24 07:07:06', NULL, NULL, 'hh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `address`, `date_of_birth`) VALUES
(1, 2, '0374588554', 'tổ 5 ,thôn tân an,xã bình minh,huyện thăng bình,quảng nam', '2005-10-04'),
(3, 1, '0374588554', 'bình minh', '2007-09-11'),
(6, 23, '0905314641', 'xã bình minh,huyện thăng bình', '2024-12-19'),
(10, 27, '0905314641', 'xã bình minh,huyện thăng bình', '2024-12-28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `collection_clock`
--
ALTER TABLE `collection_clock`
  ADD PRIMARY KEY (`id_collection`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_product` (`id_product`);

--
-- Chỉ mục cho bảng `described`
--
ALTER TABLE `described`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `described_news`
--
ALTER TABLE `described_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`id_news`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fknews_id` (`id_news`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_collection` (`id_collection`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product_image_detail`
--
ALTER TABLE `product_image_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `collection_clock`
--
ALTER TABLE `collection_clock`
  MODIFY `id_collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `described`
--
ALTER TABLE `described`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `described_news`
--
ALTER TABLE `described_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news_image`
--
ALTER TABLE `news_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_image_detail`
--
ALTER TABLE `product_image_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `described`
--
ALTER TABLE `described`
  ADD CONSTRAINT `described_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `described_news`
--
ALTER TABLE `described_news`
  ADD CONSTRAINT `news_id` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`);

--
-- Các ràng buộc cho bảng `news_image`
--
ALTER TABLE `news_image`
  ADD CONSTRAINT `fknews_id` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_collection`) REFERENCES `collection_clock` (`id_collection`);

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `product_image_detail`
--
ALTER TABLE `product_image_detail`
  ADD CONSTRAINT `product_image_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
