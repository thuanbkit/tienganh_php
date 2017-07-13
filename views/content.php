<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ContentView {
    public static function render($item) {
     ?>
    <p><?=$item->title;?></p>
    <p><?=$item->text;?></p>   
    <?php    
    }
    public static function renderlist($list,$currentpage,$totalpage) {
    ?>
        <div class="btn-toolbar">
            <a href="?r=content/add" class="btn btn-primary btn-lg active" role="button">New Content</a>
        </div>
        <div class="well">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Fulltext</th>
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
                  <td><?= $value->text; ?></td>
                  <td>
                      <a href="?r=content/update&id=<?= $value->id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      <a href="#" data-href="?r=content/delete&id=<?= $value->id;?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                <a href="index.php?r=user/list&page=<?= $currentpage-1?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php endif;?>
              <?php for($i=1;$i<=$totalpage;$i++): ?>
                <li><a href="index.php?r=user/list&page=<?= $i?>"><?= $i?></a></li>
              <?php endfor;?>
              <?php if($currentpage<$totalpage): ?>  
              <li>
                <a href="index.php?r=user/list&page=<?= $currentpage+1?>" aria-label="Next">
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
        <p class="bg-success">Edit content</p>
        <form class="form-horizontal" action="?r=content/update&id=<?= $item->id; ?>" method="POST">
            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">title</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[title]" id="inputEmail3" value="<?= $item->title; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Fulltext</label>
              <div class="col-sm-10">
                  <textarea class="form-control" rows="10" name="is-form[text]"><?= $item->text; ?></textarea>
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
