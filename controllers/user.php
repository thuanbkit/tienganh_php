<?php

defined('_JEXEC') or die('error!');
require_once APP . '/models/user.php';
require_once APP . '/views/user.php';

class UserController {

    public function actionlogin() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $model = new UserModel('localhost', 'root', '', 'etx2y_user');
            $email = $_POST['username'];
            $password = $_POST['password'];
            $user = $model->findOne($email, $password);
            if ($user) {
                $_SESSION["user"] = $user;
                header('Location: index.php');
            } else {
                $result = 'no user!';
            }
        } else {
            $result = UserView::renderlogin();
        }
        return $result;
    }
    public function actionregister() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $model = new UserModel('localhost', 'root', '', 'etx2y_user');
            $usernew = $_POST;
            $usernew['password'] = md5($usernew['password']);
            unset($usernew['password_confirm']);
            $user = $model->update($usernew);
            if ($user) {
                $_SESSION["user"] = (object)$usernew;
                header('Location: index.php');
            } else {
                $result = 'register error';
            }
        } else {
            $result = UserView::renderregister();
        }        
        return $result;
    }

    public function actionlogout() {
        unset($_SESSION['user']);
        header('Location: index.php');
    }
    
    public function actionlist() {
        $limit = 2;
        $currentpage = isset($_GET['page']) ? $_GET['page']:1;
        $offset = ($currentpage -1) * $limit;
        $model = new UserModel('localhost', 'root', '', 'etx2y_user');
        $list = $model->findAll($limit,$offset);
        if ($list) {
            $count = $model->Count_record();
            $totalpage = round($count/$limit);
            $result = UserView::renderlist($list,$currentpage,$totalpage);
        } else {
            $result = 'error!';
        }
        return $result;
    }
    
        public function actionupdate() {
        if(isset($_POST['is-form'])) {
            $model = new UserModel('localhost', 'root', '', 'etx2y_user');
            $item = $_POST['is-form'];
            if(!empty($_GET['id'])) {
                $model->updateOne($item);
            } else {
                $model->addOne($item);
            }
            header("Location:?r=user/list");
        } else {    
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $model = new UserModel('localhost', 'root', '', 'etx2y_user');

                $item = $model->findId($id);
                if ($item) {
                    $result = UserView::renderupdate($item);
                } else {
                    $result = 'error!';
                }
            } else {
                $result = 'error!';
            }
            return $result;
        }
    } 
    
    public function actionadd() {
        $item = new stdClass();
        $item->id = '';
        $item->username = '';
        $item->email = '';
        $item->password = '';
        $item->role = '';
        $result = UserView::renderupdate($item);    
        return $result;
    } 
    
    public function actiondelete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new UserModel('localhost', 'root', '', 'etx2y_user');
            $model->delete($id);
            header("Location:?r=user/list");
        } else {
            $result = 'error!';
        }
        return $result;
    }   

}

?>
