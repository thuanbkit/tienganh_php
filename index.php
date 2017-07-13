<?php
session_start();
define("APP", __DIR__);
define('_JEXEC', true);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'template/head.html'; ?>
    </head>
    <body>
        <!--menu-starts-->
        <?php include 'template/menu.php';?>
        <!--menu-starts-->
        <?php
        $r = isset($_GET["r"]) ? $_GET["r"] : '';
        if ($r):
            $rc = explode('/', $r, 2);
            $controllerid = $rc[0];
            if (file_exists(APP . "/controllers/$controllerid.php")) {

                include "controllers/$controllerid.php";
                $controller = ucfirst($controllerid) . 'Controller';

                $action = isset($rc[1]) ? 'action' . $rc[1] : 'actionindex';
                $content = new $controller;
                $html = $content->$action();
                echo $html;
            } else {
                echo 'Nội dung không tồn tại';
            }
        else :
            ?>
        <!--slider-starts-->
        <?php include 'template/slide.html';?>
        <!-- slider ends-->
        
        <!-- content1 starts-->
        <?php include 'template/content.html';?>
        <!-- content1 end -->
        
        <?php endif;?>
        
        <!-- footer starts -->
        <?php include 'template/footer.html';?>
        <!-- footer end -->
    </body>
</html>

    