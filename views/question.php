<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuestionView {
    
    public static function renderlist($list,$currentpage,$totalpage) {
    ?>
        <div class="btn-toolbar">
            <a href="?r=question/add" class="btn btn-primary btn-lg active" role="button">New Question</a>
        </div>
        <div class="well">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>A</th>
                  <th>B</th>
                  <th>C</th>
                  <th>D</th>
                  <th>Result</th>
                  <th style="width: 106px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($list as $key => $value):
                ?>
                <tr>
                  <td><?= $key+1; ?></td>
                  <td><?= $value->title; ?></td>
                  <td><?= $value->a_description; ?></td>
                  <td><?= $value->b_description; ?></td>
                  <td><?= $value->c_description; ?></td>
                  <td><?= $value->d_description; ?></td>
                  <td><?= $value->result; ?></td>
                  <td>
                      <a href="?r=question/update&id=<?= $value->id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      <a href="#" data-href="?r=question/delete&id=<?= $value->id;?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                <li><a href="index.php?r=question/list&page=<?= $i?>"><?= $i?></a></li>
              <?php endfor;?>
              <?php if($currentpage<$totalpage): ?>  
              <li>
                <a href="index.php?r=question/list&page=<?= $currentpage+1?>" aria-label="Next">
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
    public static function renderupdate($item,$listtest) {
    ?>
        <p class="bg-success">Edit question</p>
        <form class="form-horizontal" action="?r=question/update&id=<?= $item->id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="is-form[title]"><?= $item->title; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">For Test</label>
              <div class="col-sm-10">
                <select class="form-control" name="is-form[testid]">
                    <?php foreach ($listtest as $test):?>
                       <option value="<?= $test->id; ?>" <?php if ( $item->testid == $test->id ) echo 'selected="selected"'; ?>><?= $test->name; ?></option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">A</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[a_description]" id="inputEmail3" value="<?= $item->a_description; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">B</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[b_description]" id="inputPassword3" value="<?= $item->b_description; ?>">
              </div>
            </div>            
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">C</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[c_description]" id="inputPassword3" value="<?= $item->c_description; ?>">
              </div>
            </div>            
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">D</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[d_description]" id="inputPassword3" value="<?= $item->d_description; ?>">
              </div>
            </div>            
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Result</label>
              <div class="col-sm-10">
                <select class="form-control" name="is-form[result]">
                    <option value="a" <?php if ( $item->result == 'a' ) echo 'selected="selected"'; ?>>A</option>
                    <option value="b" <?php if ( $item->result == 'b' ) echo 'selected="selected"'; ?>>B</option>
                    <option value="c" <?php if ( $item->result == 'c' ) echo 'selected="selected"'; ?>>C</option>
                    <option value="d" <?php if ( $item->result == 'd' ) echo 'selected="selected"'; ?>>D</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Audio</label>
              <div class="col-sm-10">
                  <input type="file" class="form-control" name="file-q" id="inputPassword3">
                  <input type="hidden" name="is-form[audio]" value="<?= $item->audio ?>">
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
