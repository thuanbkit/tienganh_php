<section id="header" class="clearfix hifix">
    <h1 class="size0">IELTS TOEIC TOEFL Chứng chỉ B1 B2 châu âu Chứng chỉ A B C Chứng chỉ Tesol Luyện thi tốt nghiệp</h1>
    <div class="container">
        <div class="row">
            <nav class="span8 right" id="main">
                <a href="#" id="pull"><span class="padLeft10">Menu</span></a>
                <ul>
                    <li id="mn1" class="current">
                        <a href="index.php" title="Trang chủ">
                            <img class="mt_5" src="./assets/images/icon-news-home.png" alt="Trang chủ" title="Trang chủ">
                        </a>
                    </li>
                    <li id="mn2">
                        <a href="?r=content&id=1">Hỏi đáp</a>
                    </li>
                    <li id="mn3">
                        <a href="?r=content&id=2">Kinh nghiệm thi</a>
                    </li>
                    <li id="mn4">
                        <a href="?r=content&id=3">Hướng dẫn thi</a>
                    </li>
                    <?php if(!isset($_SESSION['user'])): ?>
                        <li id="mn5"><a href="?r=user/register">Register</a></li>
                        <li id="mn6"><a href="?r=user/login">Login</a></li>
                    <?php 
                    else:
                        $user = $_SESSION['user'];
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $user->email;?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="?r=user/logout&id=<?= $user->id;?>">Logout</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>