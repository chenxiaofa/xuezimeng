<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title ?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <a href="/welcome" class="navbar-brand">Banner</a>
        </div>
        <nav id="bs-navbar" class="collapse navbar-collapse">
<!--            <ul class="nav navbar-nav">-->
<!--                <li>-->
<!--                    <a href="/welcome">首页</a>-->
<!--                </li>-->
<!--            </ul>-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register">Sign Up</a></li>
                <li><a href="/login">Sign In</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="content">

</div>
<div class="container">
        <?php echo $content ?>
</div>
<footer class="footer ">
    <div class="container">
        <div class="row footer-top">
            <div class="col-sm-6 col-lg-6">
                <h4>
                    <?php echo Yii::powered() ?> + Bootstrap V3
                </h4>
            </div>

        </div>
        <hr>
        <div class="row footer-bottom">
            <ul class="list-inline text-center">
<!--                <li><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>-->
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
