<?php

class UserView {

    public static function renderlogin() {
        ?>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

            <div id="login-overlay" class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myModalLabel">Login to site.com</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-xs-6">
                              <div class="well">
                                  <form id="loginForm" method="POST" action="?r=user/login" novalidate="novalidate">
                                      <div class="form-group">
                                          <label for="username" class="control-label">Username</label>
                                          <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                          <span class="help-block"></span>
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label">Password</label>
                                          <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                          <span class="help-block"></span>
                                      </div>
                                      <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="remember" id="remember"> Remember login
                                          </label>
                                          <p class="help-block">(if this is a private computer)</p>
                                      </div>
                                      <button type="submit" class="btn btn-success btn-block">Login</button>
                                      <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                                  </form>
                              </div>
                          </div>
                          <div class="col-xs-6">
                              <p class="lead">Register now for <span class="text-success">FREE</span></p>
                              <ul class="list-unstyled" style="line-height: 2">
                                  <li><span class="fa fa-check text-success"></span> See all your orders</li>
                                  <li><span class="fa fa-check text-success"></span> Fast re-order</li>
                                  <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                                  <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                                  <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                                  <li><a href="/read-more/"><u>Read more</u></a></li>
                              </ul>
                              <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public static function renderregister() {
        ?>
        <form class="form-horizontal" action='?r=user/register' method="POST">
            <fieldset>
                <div id="legend">
                    <legend class="">Register</legend>
                </div>
                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">Username</label>
                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                        <p class="help-block">Please provide your E-mail</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                        <p class="help-block">Password should be at least 4 characters</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password -->
                    <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                    <div class="controls">
                        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                        <p class="help-block">Please confirm password</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>
    <?php
    }
    public static function renderlist($list,$currentpage,$totalpage) {     
    ?>    
        <div class="btn-toolbar">
            <a href="?r=user/add" class="btn btn-primary btn-lg active" role="button">New User</a>
        </div>
        <div class="well">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>username</th>
                  <th>email</th>
                  <th>role</th>
                  <th style="width: 106px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($list as $key => $value):
                    switch ($value->role) {
                        case 1:
                            $role = 'register';
                            break;
                        case 2:
                            $role = 'admin';
                            break;
                        default:
                            break;
                    }
                ?>
                <tr>
                  <td><?= $key+1; ?></td>
                  <td><?= $value->username; ?></td>
                  <td><?= $value->email; ?></td>
                  <td><?= $role; ?></td>
                  <td>
                      <a href="?r=user/update&id=<?= $value->id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      <a href="#" data-href="?r=user/delete&id=<?= $value->id;?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
        <p class="bg-success">Edit user</p>
        <form class="form-horizontal" action="?r=user/update&id=<?= $item->id; ?>" method="POST">            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[username]" id="inputEmail3" value="<?= $item->username; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="is-form[email]" id="inputEmail3" value="<?= $item->email; ?>">
              </div>
            </div>
                              
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Role</label>
              <div class="col-sm-10">
                <select class="form-control" name="is-form[role]">
                    <option value="1" <?php if ( $item->role == '1' ) echo 'selected="selected"'; ?>>Register</option>
                    <option value="2" <?php if ( $item->role == '2' ) echo 'selected="selected"'; ?>>Admin</option>
                </select>
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
?>
