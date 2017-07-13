<div id="wrapper">
    <?php
        include 'menu.php';
    ?>
    <!-- /#page-wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">
        <?php
            $r = isset($_GET["r"]) ? $_GET["r"] : '';
            if ($r):
                $rc = explode('/', $r, 2);
                $controllerid = $rc[0];
                if (file_exists(APP . "/controllers/$controllerid.php")) {
                    include(APP."/controllers/$controllerid.php");
                    $controller = ucfirst($controllerid) . 'Controller';
                    $action = isset($rc[1]) ? 'action' . $rc[1] : 'actionindex';
                    $content = new $controller;
                    $html = $content->$action();
                    echo $html;
                } else {
                    echo 'Nội dung không tồn tại';
                }
            else :
                include 'page-wrapper.php';
            endif;
        ?>
        </div>
        <!-- /.container-fluid -->
    </div>

</div>
<!-- /#wrapper -->