<?php

defined('_JEXEC') or die('error!');
require_once APP . '/models/question.php';
require_once APP . '/models/test.php';
require_once APP . '/views/question.php';

class QuestionController {

    public function actionindex() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new QuestionModel('localhost', 'root', '', 'etx2y_question');

            $list = $model->findAllCat($id);
            if ($list) {
                $result = QuestionView::render($list);
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
        $model = new QuestionModel('localhost', 'root', '', 'etx2y_question');
        $list = $model->findAll($limit,$offset);
        if ($list) {
            $count = $model->Count_record();
            $totalpage = round($count/$limit);
            $result = QuestionView::renderlist($list,$currentpage,$totalpage);
        } else {
            $result = 'error!';
        }
        return $result;
    }
    public function actionupdate() {
        if(isset($_POST['is-form'])) {
            $item = $_POST['is-form'];
            $temp_name = $_FILES['file-q']['tmp_name'];
            if(!empty($temp_name) && is_uploaded_file( $temp_name )) {
                $name = $_FILES['file-q']['name'];
                $url = "/assets/audio/$name";
                $destination = APP.$url;
                move_uploaded_file($temp_name, $destination);
                $item['audio'] = ".$url";
            }
            $model = new QuestionModel('localhost', 'root', '', 'etx2y_question');
            if(!empty($_GET['id'])) {
                $model->updateOne($item);
            } else {
                $model->addOne($item);
            }
            header("Location:?r=question/list");
        } else {    
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $model = new QuestionModel('localhost', 'root', '', 'etx2y_question');

                $item = $model->findOne($id);
                if ($item) {
                    $modeltest = new QuestionModel('localhost', 'root', '', 'etx2y_test');
                    $list = $modeltest->findAll1();
                    $result = QuestionView::renderupdate($item,$list);
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
        $item->testid = '';
        $item->a_description = '';
        $item->b_description = '';
        $item->c_description = '';
        $item->d_description = '';
        $item->result = '';
        $modeltest = new QuestionModel('localhost', 'root', '', 'etx2y_test');
        $list = $modeltest->findAll1();
        $result = QuestionView::renderupdate($item,$list);    
        return $result;
    }    
    public function actiondelete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new QuestionModel('localhost', 'root', '', 'etx2y_question');
            $model->delete($id);
            header("Location:?r=question/list");
        } else {
            $result = 'error!';
        }
        return $result;
    }    
}

?>
