<?php

defined('_JEXEC') or die('error!');
require_once APP . '/models/test.php';
require_once APP . '/views/test.php';

class TestController {
    
    public function actionindex() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new TestModel('localhost', 'root', '', 'etx2y_test');

            $list = $model->findAllCat($id);
            if ($list) {
                $result = TestView::render($list);
            } else {
                $result = 'error!';
            }
        } else {
            $result = 'error!';
        }
        return $result;
    }

    public function actionlist() {
        $limit = 2;
        $currentpage = isset($_GET['page']) ? $_GET['page']:1;
        $offset = ($currentpage -1) * $limit;
        $model = new TestModel('localhost', 'root', '', 'etx2y_test');
        $list = $model->findAll($limit,$offset);
        if ($list) {
            $count = $model->Count_record();
            $totalpage = round($count/$limit);
            $result = TestView::renderlist($list,$currentpage,$totalpage);
        } else {
            $result = 'error!';
        }
        return $result;
    }
    public function actionupdate() {
        if(isset($_POST['is-form'])) {
            $model = new TestModel('localhost', 'root', '', 'etx2y_test');
            $item = $_POST['is-form']; 
            if(!empty($_GET['id'])) {
                $model->updateOne($item);
            } else {
                $model->addOne($item);
            }
            header("Location:?r=test/list");
        } else {    
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $model = new TestModel('localhost', 'root', '', 'etx2y_test');

                $item = $model->findOne($id);
                if ($item) {
                    $result = TestView::renderupdate($item);
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
        $item->name = '';
        $item->catid = '';
        $item->description = '';
        $result = TestView::renderupdate($item);    
        return $result;
    }    
    public function actiondelete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new TestModel('localhost', 'root', '', 'etx2y_test');
            $model->delete($id);
            header("Location:?r=test/list");
        } else {
            $result = 'error!';
        }
        return $result;
    }    
}

?>
