<?php
defined('_JEXEC') or die('error!');
require_once APP . '/models/category.php';
require_once APP . '/views/category.php';

class CategoryController {
    public function actionindex() {
        if(isset($_SESSION['user'])) {
            if(isset($_GET['catid'])) {
                $catid = $_GET['catid'];
                $model = new CategoryModel('localhost', 'root', '', 'etx2y_category');

                $list = $model->findAllCat($catid);
                if($list) {
                    $result = CategoryView::render($list);
                } else {
                    $result = 'no content!';
                }

            } else {
                $result = 'error!';
            }
            return $result;
        } else {
            header("Location:index.php?r=user/login");
        }
        
    }
    public function actionpostform() {
        $success = $_POST['success'];
        $answers = $_POST['options'];
        $dem=0;
        foreach ($answers as $key => $value) {
            if($value==$success[$key]) $dem++;
        }
        $sum = count($success);
        echo "<p class='bg-primary'>Kết quả:$dem/$sum</p>";
        echo '<form id="answers" action="index.php?r=category/postform" method="POST" style="display:none;">';
        echo '<button class="btn btn-primary" type="button">Lưu kết quả</button>';
        echo '</form>';

    }

}
?>
