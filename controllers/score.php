<?php
defined('_JEXEC') or die('error!');
require_once APP . '/models/score.php';
require_once APP . '/views/score.php';

class ScoreController {
    public function actionpostform() {
        if(isset($_SESSION["user"])) {
            if(isset($_POST['score'])) {
                $score = $_POST['score'];
                $user = $_SESSION["user"];
                $item['user_id'] = $user->id;
                $item['mark'] = $score;
                $model = new ScoreModel('localhost', 'root', '', 'etx2y_score');
                $model->addOne($item);
                header("Location:index.php");
            } else {
                echo 'error!';
            }
        } else {
            header("Location:index.php?r=user/login");
        }    

    }

}
?>
