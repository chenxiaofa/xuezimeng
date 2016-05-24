<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>学子梦</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.bootcss.com/weui/0.4.0/style/weui.min.css">
	<link rel="stylesheet" href="/static/css/mobile/main.css?20160505">
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/static/js/api.js?20160505"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-menu" aria-expanded="false">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img width="40" alt="学子梦" src="/static/images/banner.png">
				</a>
				<div class="navbar-title">学子梦</div>
			</div>
			<div class="collapse navbar-collapse" id="header-menu">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/about">关于</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid content-body">
		<?php echo $content;?>
	</div>


</body>
</html>