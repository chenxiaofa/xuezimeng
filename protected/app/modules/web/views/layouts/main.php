<?php
$currPage = \Yii::$app->controller->action->id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo \Yii::$app->name;?></title>
    <link rel="favicon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.html">
                <img src="assets/images/logo.png" alt="学子梦培训"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="<?php if ($currPage === 'index') echo "active";?>"><a href="/">首页</a></li>
                <li class="<?php if ($currPage === 'about') echo "active";?>"><a href="/about">关于</a></li>
                <li class="<?php if ($currPage === 'courses') echo "active";?>"><a href="/courses">课程</a></li>
                <li class="<?php if ($currPage === 'price') echo "active";?>"><a href="/price">价格</a></li>
                <li class="<?php if ($currPage === 'contact') echo "active";?>"><a href="/contact">联系我们</a></li>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->
<?php echo $content;?>

<footer id="footer">

    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259104113'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259104113%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
                    </div>
                </div>

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="text-right">
                            Copyright &copy; 2016.
                        </p>
                    </div>
                </div>

            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>
<div class="contact_block">
    <a class="qq" href="javascript:void(0);"></a>
    <a class="wx" href="javascript:void(0);">
        <div class="qrcode">
            <img src="/static/images/weixin_qrcode.jpg" />
        </div>
    </a>
    <a class="phone" href="javascript:void(0);"></a>
</div>
</body>
</html>
