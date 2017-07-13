<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoryView {

    public static function render($list) {
    ?>
    
        <div class="row">
            <div class="span5">
                <h1>Danh sách đề thi</h1>
                <ul>
                <?php foreach ($list as $value):?> 
                    <li>
                        <a href="#tienganhStep<?= $value->id?>" role="button" class="btn" data-toggle="modal"><?= $value->name?></a>
                        <!-- Modal -->
                        <div id="tienganhStep<?= $value->id?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="tienganhStep1Title">Thi thử môn Tiếng Anh</h4>
                            </div>
                            <div class="modal-body">
                                <p class="md-mes">Hãy đảm bảo bạn có đủ thời gian <strong style="color: #FF0000;">(ít nhất 10 phút)</strong> hoàn thành bài thi để nhận được kết quả <br>
                                phân tích bài làm, tư vấn phương pháp, lộ trình học tập chính xác và hiệu quả nhất.</p>
                                <a class="mpcf test-start" data-toggle="modal" href="index.php?r=test&id=<?= $value->id?>" data-subject="tienganh">BẮT ĐẦU THI</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>
                </ul>    
            </div>
            <div class="span7">
                <h2>Toeic là gì?</h2>
                <p>Chứng chỉ TOEIC (Test of English For International Communication) là chương trình kiểm tra và xây dựng tiêu chuẩn Anh ngữ trong môi trường giao tiếp và làm việc quốc tế. TOEIC chỉ đánh giá khả năng sử dụng tiếng Anh và không đòi hỏi vốn từ vựng hay kiến thức chuyên ngành. Kết quả đánh giá của TOEIC được công nhận rộng rãi trên toàn thế giới.</p>
                <h2>Kiểu bài thi Toeic</h2>
                <p>
                    <strong class="cl-green1">Bài thi TOEIC mới gồm 7 phần:</strong><br>
                </p>
                <ul>
                    <li>
                        <span class="cl-green1">* Phần 1</span> – Picture Description (Miêu tả tranh)
                    </li>
                    <li>
                        <span class="cl-green1">* Phần 2</span> - Question – Response
                    </li>
                    <li>
                        <span class="cl-green1">* Phần 3</span> - Short conversation
                    </li>
                    <li>
                        <span class="cl-green1">* Phần 4</span> - Short Talk
                    </li>
                    <li>
                        <span class="cl-green1">* Phần 5</span> - Incomplete Sentences
                    </li>
                    <li>
                        <span class="cl-green1">* Phần 6</span> - Incomplete Texts
                    </li>
                    <li>
                        <span class="cl-green1">* Phần 7</span> - Reading Comprehension
                    </li>
                </ul>
            </div>
        </div>

        <?php
    }

}
