<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TestView {

    public static function render($list) {
        ?>
        <!--<input type="button" value="Start Test!" id="start-test">-->
        <form name="cd" id="count-down">
            <input id="txt" readonly="true" type="text" value="30:00" border="0" name="disp">
        </form>
        <div id="answers">
            <?php
            $total = count($list);
            for ($j = 0; $j < 3; $j++):
            ?>
                <div id="first<?= $j + 1; ?>">
                    <?php
                    for ($i = 0; $i < 10; $i++):
                        if (!isset($list[$i + ($j * 10)])) {
                            break;
                        }
                        ?>
                        <div id="q_select_<?= $i + ($j * 10) + 1; ?>" data-item="<?= $list[$i + ($j * 10)]->result; ?>">
                            <div>Câu: <strong><?= $i + ($j * 10) + 1; ?></strong></div>	
                            <div><?= $list[$i + ($j * 10)]->title; ?></div>
                            <?php if($list[$i + ($j * 10)]->audio) : ?>
                            <audio src="<?= $list[$i + ($j * 10)]->audio ?>" preload controls></audio>
                            <?php endif; ?>
                            <?php if($list[$i + ($j * 10)]->image) : ?>
                            <img src="<?= $list[$i + ($j * 10)]->image ?>" width="450px"></img>
                            <?php endif; ?>
                            
                            <div class="radio">
                                <label>
                                    <input type="radio" name="options[<?= $i + ($j * 10) + 1; ?>]" value="a">
                                    <?= $list[$i + ($j * 10)]->a_description; ?>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="options[<?= $i + ($j * 10) + 1; ?>]" value="b">
                                    <?= $list[$i + ($j * 10)]->b_description; ?>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="options[<?= $i + ($j * 10) + 1; ?>]"  value="c">
                                    <?= $list[$i + ($j * 10)]->c_description; ?>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="options[<?= $i + ($j * 10) + 1; ?>]" value="d">
                                    <?= $list[$i + ($j * 10)]->d_description; ?>
                                </label>
                            </div>
                        </div>
                    <?php
                    endfor;
                    ?>
                </div>
            <?php endfor; ?>   
            <br><br>
            <div class="pagination">
                <ul>
                    <li><a id="get_first" href="#">1</a></li>
                    <li><a id="get_second" href="#">2</a></li>
                    <li><a id="get_third" href="#">3</a></li>
                </ul>
            </div>
            <input type="submit" value="Nộp bài" class="btn btn-large btn-primary oktest">
            <form id="page-result" action="index.php?r=score/postform" method="POST" style="display:none;">
                <div>Result:<span id="number-true"></span></div>
                <input type="hidden" value="" id="score-user" name="score">
                <input type="submit" value="Lưu kết quả" class="btn btn-large btn-primary">
            </form>
        </div>
        <script>
            $(document).ready(function ($) {
                cd();
                $('.oktest').click(function() {
                    result_true = 0;
                    for(i=1;i<=<?= $total?>;i++) {
                        q_result = $("#q_select_"+i).data("item");
                        $("input[name='options["+i+"]'][value='" + q_result + "']").parent().css("color", "red");
                        q_choise = $("input[name='options["+i+"]']:checked").val();
                        if(q_result == q_choise) {
                            result_true++;
                        }    
                    }
                    result = result_true + '/' + <?= $total?> ;
                    $('.oktest').hide();
                    $("#count-down").hide();
                    $("#number-true").text(result);
                    $("#score-user").val(result);
                    $("#page-result").show();
                });
            });
            $('#get_first').click(function () {
                $('#first1').show();
                $('#first2').hide();
                $('#first3').hide();
            });
            $('#get_second').click(function () {
                $('#first1').hide();
                $('#first2').show();
                $('#first3').hide();
            });
            $('#get_third').click(function () {
                $('#first1').hide();
                $('#first2').hide();
                $('#first3').show();
            });
            var mins
            var secs;

            function cd() {
                mins = 1 * m("10"); // change minutes here
                secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
                redo();
            }

            function m(obj) {
                for (var i = 0; i < obj.length; i++) {
                    if (obj.substring(i, i + 1) == ":")
                        break;
                }
                return(obj.substring(0, i));
            }

            function s(obj) {
                for (var i = 0; i < obj.length; i++) {
                    if (obj.substring(i, i + 1) == ":")
                        break;
                }
                return(obj.substring(i + 1, obj.length));
            }

            function dis(mins, secs) {
                var disp;
                if (mins <= 9) {
                    disp = " 0";
                } else {
                    disp = " ";
                }
                disp += mins + ":";
                if (secs <= 9) {
                    disp += "0" + secs;
                } else {
                    disp += secs;
                }
                return(disp);
            }

            function redo() {
                secs--;
                if (secs == -1) {
                    secs = 59;
                    mins--;
                }
                document.cd.disp.value = dis(mins, secs); // setup additional displays here.
                if ((mins == 0) && (secs == 0)) {
                    $('#answers').submit();
                } else {
                    cd = setTimeout("redo()", 1000);
                }
            }
        </script>
    <?php
    }
    public static function renderlist($list,$currentpage,$totalpage) {
    ?>
        <div class="btn-toolbar">
            <a href="?r=test/add" class="btn btn-primary btn-lg active" role="button">New Test</a>
        </div>
        <div class="well">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th style="width: 106px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($list as $key => $value):
                    switch ($value->catid) {
                        case 1:
                            $namecat = "Kiểm tra trình độ";
                            break;
                        case 2:
                            $namecat = "Chứng chỉ Toeic";
                            break;
                        case 3:
                            $namecat = "Chứng chỉ A2";
                            break;
                        default:
                            break;
                    }
                ?>
                <tr>
                  <td><?= $key+1; ?></td>
                  <td><?= $value->name; ?></td>
                  <td><?= $namecat; ?></td>
                  <td><?= $value->description; ?></td>
                  <td>
                      <a href="?r=test/update&id=<?= $value->id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      <a href="#" data-href="?r=test/delete&id=<?= $value->id;?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                </tr>
                  
                <?php  
                endforeach;
                ?>
              </tbody>
            </table>
        </div>
        <?php if($totalpage>1):?>
        <nav>
            <ul class="pagination">
              <?php if($currentpage>1): ?>  
              <li>
                <a href="index.php?r=test/list&page=<?= $currentpage-1?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php endif;?>
              <?php for($i=1;$i<=$totalpage;$i++): ?>
                <li><a href="index.php?r=test/list&page=<?= $i?>"><?= $i?></a></li>
              <?php endfor;?>
              <?php if($currentpage<$totalpage): ?>  
              <li>
                <a href="index.php?r=test/list&page=<?= $currentpage+1?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
              <?php endif;?>
            </ul>
        </nav>
        <?php endif;?>
        <!-- Modal HTML -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                    </div>

                    <div class="modal-body">
                        <p>Do you want to proceed?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                });
            });    
        </script>
    <?php
    }
    public static function renderupdate($item) {
    ?>
        <p class="bg-success">Edit test</p>
        <form class="form-horizontal" action="?r=test/update&id=<?= $item->id; ?>" method="POST">
            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[name]" id="inputEmail3" value="<?= $item->name; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">category</label>
              <div class="col-sm-10">
                <select class="form-control" name="is-form[catid]">
                    <option value="1" <?php if ( $item->catid == 1 ) echo 'selected="selected"'; ?>>Kiểm tra trình độ</option>
                    <option value="2" <?php if ( $item->catid == 2 ) echo 'selected="selected"'; ?>>Chứng chỉ Toeic</option>
                    <option value="3" <?php if ( $item->catid == 3 ) echo 'selected="selected"'; ?>>Chứng chỉ A2</option>
                </select>
              </div>    
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="is-form[description]"><?= $item->description; ?></textarea>
              </div>
            </div>            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="is-form[id]" value="<?= $item->id; ?>">
                <button type="submit" class="btn btn-default">Update</button>
              </div>
            </div>
          </form>
    <?php    
    }

}
