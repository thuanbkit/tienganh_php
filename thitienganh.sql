-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2015 at 12:29 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thitienganh`
--
CREATE DATABASE IF NOT EXISTS `thitienganh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `thitienganh`;

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_categories`
--

CREATE TABLE IF NOT EXISTS `etx2y_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `etx2y_categories`
--

INSERT INTO `etx2y_categories` (`id`, `name`, `description`) VALUES
(1, 'Kiểm tra trình độ', '0'),
(2, 'Chứng chỉ Toeic', ''),
(3, 'Chứng chỉ A2', '');

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_content`
--

CREATE TABLE IF NOT EXISTS `etx2y_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `etx2y_content`
--

INSERT INTO `etx2y_content` (`id`, `title`, `text`) VALUES
(1, 'Hỏi đáp', '                   \r\n                    <h1>Câu hỏi Ielts</h1>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/ielts-la-gi-1">1. Ielts là gì ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/tai-sao-nen-thi-ielts-3">2. Tại sao nên thi Ielts ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/cau-truc-de-thi-ielts-nhu-the-nao-4">3. Cấu trúc đề thi Ielts như thế nào ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/thang-diem-cua-ielts-5">4. Thang điểm của Ielts ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/toi-co-the-su-dung-nhung-giay-to-gi-thay-the-neu-khong-co-hoac-bi-mat-chung-minh-thu-hoac-ho-chieu-6">5. Tôi có thể sử dụng những giấy tờ gì thay thế nếu không có hoặc bị mất Chứng minh thư hoặc Hộ chiếu ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/lam-the-nao-de-biet-chac-chan-toi-da-dang-ky-duoc-ngay-thi-ielts-chinh-thuc-7">6. Làm thế nào để biết chắc chắn tôi đã đăng ký được ngày thi IELTS chính thức ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/toi-co-the-nho-nguoi-than-dang-ky-ho-khong-8">7. Tôi có thể nhờ người thân đăng ký hộ không ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-ielts/thi-sinh-co-duoc-nghi-giua-cac-bai-thi-viet-khong-9">8. Thí sinh có được nghỉ giữa các bài thi Viết không ?</a>\r\n                            </p>\r\n                    <h1>Câu hỏi Toeic</h1>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/toeic-la-gi-2">1. TOEIC là gì ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/hinh-thuc-thi-toeic-10">2. Hình thức thi Toeic ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/doi-tuong-va-ly-do-du-thi-11">3. Đối tượng và lý do dự thi ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/thi-toeic-o-dau-12">4. Thi TOEIC ở đâu ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/ket-qua-toeic-duoc-chap-nhan-o-dau-13">5. Kết quả TOEIC được chấp nhận ở đâu ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/bai-thi-toeic-nghe-va-doc-danh-gia-cai-gi-14">6. Bài thi TOEIC nghe và đọc đánh giá cái gì ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/hinh-thuc-bai-thi-nghe-va-doc-15">7. Hình thức bài thi nghe và đọc ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/thoi-gian-thi-nghe-va-doc-16">8. Thời gian thi nghe và đọc ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/bai-thi-nghe-va-doc-duoc-to-chuc-nhu-the-nao-17">9. Bài thi nghe và đọc được tổ chức như thế nào ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/cac-cau-hoi-nghe-va-doc-co-duoc-lay-tu-nhung-ngu-canh-cu-the-khong-18">10. Các câu hỏi nghe và đọc có được lấy từ những ngữ cảnh cụ thể không ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/bai-thi-nghe-va-doc-duoc-cham-diem-nhu-the-nao-19">11. Bài thi nghe và đọc được chấm điểm như thế nào ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/ly-do-du-thi-bai-thi-nghe-va-doc-20">12. Lý do dự thi bài thi nghe và đọc ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/nguoi-du-thi-co-the-bi-truot-khong-23">13. Người dự thi có thể bị trượt không ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/doi-tuong-du-thi-24">14. Đối tượng dự thi ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/doi-tuong-cua-bai-thi-toeic-noi-va-viet-25">15. Đối tượng của bài thi TOEIC Nói và Viết ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/cac-bai-thi-noi-va-viet-danh-gia-cai-gi-26">16. Các bài thi nói và viết đánh giá cái gì ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/diem-dat-cua-cac-bai-thi-la-bao-nhieu-27">17. Điểm đạt của các bài thi là bao nhiêu ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/cac-bai-thi-duoc-to-chuc-nhu-the-nao-28">18. Các bài thi được tổ chức như thế nào ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/chi-phi-cho-moi-bai-thi-29">19. Chi phí cho mỗi bài thi ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/thoi-gian-nhan-ket-qua-thi-noi-va-viet-30">20. Thời gian nhận kết quả thi nói và viết ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/voi-viec-kiem-tra-tat-ca-bon-ky-nang-giao-tiep-nhan-vien-can-lam-bai-thi-nao-truoc-nghe-va-doc-hay-noi-va-viet-31">21. Với việc kiểm tra tất cả bốn kỹ năng giao tiếp, nhân viên cần làm bài thi nào trước Nghe và Đọc, hay Nói và Viết ?</a>\r\n                            </p>\r\n                            <p>\r\n                                <a href="/hoi-dap/cau-hoi-toeic/vi-sao-diem-thi-chi-co-hieu-luc-trong-2-nam-32">22. Vì sao điểm thi chỉ có hiệu lực trong 2 năm ?</a>\r\n                            </p>'),
(2, 'Kinh nghiệm thi', '                    <h1>10 lời khuyên giúp học TOEIC tốt</h1>\r\n                    <div class="summary">Sau khi sưu tầm chúng tôi xin đưa ra những lời khuyên dành cho các bạn đang muốn học và thi TOEIC nhé.</div>\r\n                    <div>\r\n<p style="text-align:center"><a href="http://cfl.edu.vn/xmedia/2013/01/nguyen-tac-hoc-tieng-anh-hieu-qua.jpg"><img alt="Nguyen-tac-hoc-tieng-anh-hieu-qua" class="aligncenter size-full wp-image-2227" src="http://cfl.edu.vn/xmedia/2013/01/nguyen-tac-hoc-tieng-anh-hieu-qua.jpg" style="height:266px; width:400px"></a></p>\r\n\r\n<p><span style="color:#FF0000"><strong>1. Thiết lập một mục tiêu</strong></span></p>\r\n\r\n<p><br>\r\nBạn đã quyết định thi TOEIC. Xin chúc mừng! Điều đầu tiên bạn nên làm là thiết lập một mục tiêu. Nếu bạn đang muốn sử dụng chứng chỉ này để tìm kiếm một công việc tốt hơn, hãy tìm hiểu mức độ tiếng Anh mà công việc đó yêu cầu.</p>\r\n\r\n<p>Hãy chọn một mục tiêu mà có thể đạt được. Nếu bạn đặt mục tiêu quá cao, bạn sẽ dễ dàng nản chí. Hãy thi thử <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000"><strong>TOEIC</strong></span></a> tập dượt trước kì thi thật để bạn quen với bài thi và rèn luyện kĩ năng,</p>\r\n\r\n<p><span style="color:#FF0000"><strong>2. Hiểu biết về bài thi TOEIC</strong></span></p>\r\n\r\n<p><br>\r\nTrước khi bạn bắt đầu học cho kỳ thi này, hãy chắc chắn rằng bạn nắm được cấu trúc bài thi <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a>. Ở bài thi TOEIC, bạn sẽ phải<span style="color:#FF0000"> thi 2 kỹ năng: nghe và đọc hiểu</span>. Bằng cách làm các bài thi mẫu, đề thi <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a> sẽ dần trở nên quen thuộc hơn với bạn.</p>\r\n\r\n<p><span style="color:#FF0000"><strong>3. Lên một kế hoạch học tập</strong></span></p>\r\n\r\n<p><br>\r\nSự trì hoãn là một trong những lý do chính khiến sinh viên không đạt điểm cao trong các kì thi <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a>. Bạn có thể đăng kí tháng thi TOEIC của bạn trước. Tuy nhiên, ngày bạn quyết định thi TOEIC nên là ngày bạn bắt đầu học.</p>\r\n\r\n<p>Bạn sẽ phải quyết định bạn sẽ tự học <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a> với các nguồn tài liệu đáng tin cậy hay là bạn tham gia một lớp luyện thi TOEIC. Để có được kết quả tốt nhất, bạn nên làm cả hai. Nếu bạn không thể đủ khả năng để theo học một lớp TOEIC, hãy chọn một cuốn sách TOEIC có câu trả lời có giải thích đầy đủ. Bạn cũng sẽ cần có một giáo viên hoặc gia sư để bạn có thể hỏi những thắc mắc trong quá trình học.</p>\r\n\r\n<p>Nếu bạn chọn cách theo học một lớp luyện thi TOEIC, hãy chắc chắn rằng bạn tin tưởng giáo viên của bạn và cảm thấy thoải mái trong lớp học. Hãy đi học với một vài người bạn và làm cho một cam kết để cùng nhau học tập trong lớp cũng như ngoài giờ học trên lớp.</p>\r\n\r\n<p>Học tập rèn luyện hằng ngày là một cách tốt để cải thiện số điểm của bạn. Hãy viết ra kế hoạch học tập của bạn và ký tên cam kết là bạn sẽ thực hiện nghiêm túc nó!</p>\r\n\r\n<p><span style="color:#FF0000"><strong>4. Chia thời gian học một cách thích hợp</strong></span></p>\r\n\r\n<p><br>\r\nMỗi phần trong bài thi TOEIC tương ứng với một số điểm nhất định. Đừng dành quá nhiều thời gian nghiên cứu một phần. Nhiều sinh viên mắc phải sai lầm là chỉ tập trung học phần mà họ thích nhất. Thực chất đây lại là phần bạn nên dành ít thời gian nhất</p>\r\n\r\n<p><span style="color:#FF0000"><strong>5. Xây dựng một vốn từ vựng mạnh</strong></span></p>\r\n\r\n<p><br>\r\nMột lý do sinh viên không kiểm tra <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a> là họ có một vốn từ vựng rất hạn chế. Khi bạn quyết định để có những bài thi TOEIC, bạn nên làm cho mình một từ điển trống. Sử dụng một cuốn sổ và ghi nhớ tất cả các từ mới mà bạn học được trong quá trình học. Sẽ rất khó cho bạn nếu bạn học từ mới theo kiểu ghi từ mới thành một danh sách. Sẽ dễ dàng hơn nếu bạn bạn học từ mới theo từng ngữ cảnh. Đối với mỗi tiêu đề, hãy viết từ mới và đặt câu cho nó. Vào cuối tuần, bạn nên viết một bức thư ngắn hoặc một đoạn văn ngắn và cố gắng dùng nhiều từ mới nhất có thể.</p>\r\n\r\n<p>Đây có lẽ là lúc bạn nên ngừng sử dụng từ điển dịch thuật của mình. Kim từ điển làm cho việc tra từ mới quá đơn giản! Và bạn sẽ rất khó để nhớ các từ nếu bạn không mất bất cứ nỗ lực nào để hiểu nó.</p>\r\n\r\n<p>Hãy ghi nhớ rằng các bài thi <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a> thường có một chủ đề kinh doanh. Bạn nên học từ vựng từ các chủ đề như du lịch, ngân hàng, y tế, nhà hàng, văn phòng, vv Bạn cũng nên tìm hiểu các cách diễn đạt thành ngữ hàng ngày.</p>\r\n\r\n<p><span style="color:#FF0000"><strong>6. Khắc phục những điểm yếu của bạn</strong></span></p>\r\n\r\n<p><br>\r\nSau khi bạn đã luyện thi <a href="http://thitienganh.click2learn.vn/thi-toeic"><span style="color:#FF0000">TOEIC</span></a> một thời gian bạn sẽ nhận ra được phần nào trong bài thi gây khó khăn cho bạn nhất. Bạn nên thay đổi cách bạn phân chia thời gian của bạn. Có một vài điểm ngữ pháp nhất định mà nhiều sinh viên thường dễ làm sai. Nếu theo học một lớp TOEIC, hãy yêu cầu giáo viên giao thêm nhiều bài tập luyện về những phần này. Nếu bạn đang tự học, bạn có thể tìm kiếm câu trả lời trong các cuốn sách đáng tin cậy hoặc tìm kiếm trên internet các trang web học tiếng Anh tốt.</p>\r\n\r\n<p><span style="color:#FF0000"><strong>7. Loại bỏ những đáp án sai</strong></span></p>\r\n\r\n<p><br>\r\nTrong mỗi câu hỏi TOEIC, <span style="color:#FF0000">có ít nhất hai đáp án sai</span> (là những đáp án sai mà người ra để sử dụng để lừa bạn). Có rất nhiều loại đáp án sai như từ đồng âm, những từ có phát âm hơi giống nhau, các từ lặp đi lặp lại, vv Khi bạn học, hãy tự thống kê một danh sách các đáp án sai. Khi bạn gặp chúng, bạn sẽ có thể dễ dàng loại bỏ chúng dễ dàng hơn.</p>\r\n\r\n<p><span style="color:#FF0000"><strong>8. Tin tưởng vào trực giác của bạn</strong></span></p>\r\n\r\n<p><br>\r\nĐôi khi câu trả lời ngay lập tức hiện ra trước mắt bạn. Nếu bạn đã học tập rất chăm chỉ, hãy để cho bộ não của bạn lựa chọn đáp án. Đừng thay đổi câu trả lời của bạn sau khi bạn đã chọn theo trực giác của mình. Nếu bạn quyết định thay đổi một câu trả lời, hãy xóa cẩn thận. Hãy chắc chắn là các ô đáp án được tô kín ô tròn. <span style="color:#FF0000">Hãy mang thêm bút chì, tẩy, và một gọt bút chì</span>!</p>\r\n\r\n<p><span style="color:#FF0000"><strong>9. Đừng cố gắng dịch</strong></span></p>\r\n\r\n<p><br>\r\nDịch từ vựng và câu tốn rất nhiều thời gian. Rất hiếm khi sinh viên có thừa thời gian làm bài TOEIC. Nếu bạn không biết một từ, nhìn vào bối cảnh của câu và những từ xung quanh nó và đoán nghĩa của từ. Lưu ý, trong phòng thi TOEIC bạn không được sử dụng từ điển.</p>\r\n\r\n<p><span style="color:#FF0000"><strong>10. Đoán đáp án là một phương sách cuối cùng</strong></span></p>\r\n\r\n<p><br>\r\nVào ngày thi, thậm chí bạn đã loại bỏ tất cả các đáp án sai, bạn vẫn không biết câu trả lời, tuy nhiên đừng để ô trống. Giả sử bạn không có thời gian quay lại để suy nghĩ tiếp câu hỏi này thì bạn sẽ mất điểm. Bạn vẫn có 25% cơ hội nhận được câu trả lời đúng nếu bạn đoán mò.</p>\r\n\r\n<p>Chúc bạn thi tốt.</p>\r\n\r\n                    </div>');

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_level`
--

CREATE TABLE IF NOT EXISTS `etx2y_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_question`
--

CREATE TABLE IF NOT EXISTS `etx2y_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `testid` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `a_description` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `b_description` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `c_description` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `d_description` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `audio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `etx2y_question`
--

INSERT INTO `etx2y_question` (`id`, `title`, `result`, `testid`, `level_id`, `a_description`, `b_description`, `c_description`, `d_description`, `audio`, `image`) VALUES
(1, 'Mark the letter A, B, C or D on your answer sheet to indicate the word whose stress pattern is different from that of the others in the following question.', 'b', 10, 0, 'multiply1', 'contribute', 'criticize', 'simplify', './assets/audio/tes1.mp3', NULL),
(2, 'Choose A, B, C or D to indicate the correct answer to the following question:\r\n“Your fur coat looks very expensive.”\r\n“________ . It was secondhand.”', 'b', 10, 0, 'Yes, it does', 'Really? It wasn’t expensive', 'No, it isn’t', 'I’m sorry', '/assets/audio/yes.png', NULL),
(3, 'Choose A, B, C or D to indicate the correct answer to the following question:\r\nHe wasn’t sure if he’d be any good at tennis, but actually he took ________ it immediately.', 'd', 10, 0, 'in', 'to', 'on', 'after', '', NULL),
(7, '1', 'a', 10, 0, '', '', '', '', '/assets/audio/yes.png', NULL),
(10, 'aa', 'a', 10, 0, 'a', 'a', '', 'a', '/assets/audio/yes.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_score`
--

CREATE TABLE IF NOT EXISTS `etx2y_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `markread` int(11) NOT NULL,
  `marklisting` int(11) NOT NULL,
  `markwrite` int(11) NOT NULL,
  `mark` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `etx2y_score`
--

INSERT INTO `etx2y_score` (`id`, `user_id`, `cat_id`, `markread`, `marklisting`, `markwrite`, `mark`) VALUES
(1, 368, 0, 0, 0, 0, '2/2'),
(2, 368, 0, 0, 0, 0, '0/2'),
(3, 368, 0, 0, 0, 0, '2/2');

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_test`
--

CREATE TABLE IF NOT EXISTS `etx2y_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `etx2y_test`
--

INSERT INTO `etx2y_test` (`id`, `catid`, `name`, `description`) VALUES
(10, 1, 'Đề số 12', '22'),
(14, 2, 'Đề ngày 22/11', '2'),
(15, 3, 'ngày 22/12', 'tại đại học thái nguyên'),
(18, 1, 'ngày 26/4', 'tại đại học thái nguyên');

-- --------------------------------------------------------

--
-- Table structure for table `etx2y_user`
--

CREATE TABLE IF NOT EXISTS `etx2y_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `role` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  `otpKey` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Two factor authentication encrypted keys',
  `otep` varchar(1000) NOT NULL DEFAULT '' COMMENT 'One time emergency passwords',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=370 ;

--
-- Dumping data for table `etx2y_user`
--

INSERT INTO `etx2y_user` (`id`, `username`, `email`, `password`, `role`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`, `otpKey`, `otep`) VALUES
(368, 'admin', 'doangia.sw@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2015-01-13 16:25:49', '2015-04-05 01:20:26', '0', '', '0000-00-00 00:00:00', 0, '', ''),
(369, 'dadad', 'dada@is2b.vn', 'aced3598a34a561715dacfe32a328c1c', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
