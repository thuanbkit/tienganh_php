<?php

defined('_JEXEC') or die('error!');
require_once APP . '/models/content.php';
require_once APP . '/views/content.php';

class ContentController {

    public function actionindex() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new ContentModel('localhost', 'root', '', 'etx2y_content');

            $item = $model->findOne($id);
            if ($item) {
                $result = ContentView::render($item);
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
        $model = new ContentModel('localhost', 'root', '', 'etx2y_content');
        $list = $model->findAll($limit,$offset);
        if ($list) {
            $count = $model->Count_record();
            $totalpage = round($count/$limit);
            $result = ContentView::renderlist($list,$currentpage,$totalpage);
        } else {
            $result = 'error!';
        }
        return $result;
    }
    public function actionupdate() {
        if(isset($_POST['is-form'])) {
            $model = new ContentModel('localhost', 'root', '', 'etx2y_content');
            $item = $_POST['is-form']; 
            if(!empty($_GET['id'])) {
                $model->updateOne($item);
            } else {
                $model->addOne($item);
            }
            header("Location:?r=content/list");
        } else {    
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $model = new ContentModel('localhost', 'root', '', 'etx2y_content');

                $item = $model->findOne($id);
                if ($item) {
                    $result = ContentView::renderupdate($item);
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
        $item->title = '';
        $item->text = '';
        $result = ContentView::renderupdate($item);    
        return $result;
    }    
    public function actiondelete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new ContentModel('localhost', 'root', '', 'etx2y_content');
            $model->delete($id);
            header("Location:?r=content/list");
        } else {
            $result = 'error!';
        }
        return $result;
    }    
}

?>
