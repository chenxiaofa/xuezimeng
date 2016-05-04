<?php
	$appName = \Yii::$app->name;
	$curUserName = \Yii::$app->user->identity->username;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>控制台 - <?php echo $appName;?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- basic styles -->
	<link href="{__STATIC__}/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="{__STATIC__}/css/font-awesome.min.css" />




	<!-- fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
	<!-- ace styles -->
	<link rel="stylesheet" href="/m/css/ace.min.css" />
	<link rel="stylesheet" href="/m/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="/m/css/ace-skins.min.css" />
	<script src="/m/js/ace-extra.min.js"></script>


</head>

<body>
<div class="navbar navbar-default" id="navbar">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

	<div class="navbar-container" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand">
				<small>
					<i class="icon-leaf"></i>
					<?php echo $appName;?>
				</small>
			</a><!-- /.brand -->
		</div><!-- /.navbar-header -->

		<div class="navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="/m/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo $curUserName;?>
								</span>
						<i class="icon-caret-down"></i>
					</a>
					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="#">
								<i class="icon-cog"></i>
								设置
							</a>
						</li>

						<li>
							<a href="#">
								<i class="icon-user"></i>
								个人资料
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="#">
								<i class="icon-off"></i>
								退出
							</a>
						</li>
					</ul>
				</li>
			</ul><!-- /.ace-nav -->
		</div><!-- /.navbar-header -->
	</div><!-- /.container -->
</div>

<div class="main-container" id="main-container">
	<script type="text/javascript">
		try{ace.settings.check('main-container' , 'fixed')}catch(e){}
	</script>

	<div class="main-container-inner">
		<a class="menu-toggler" id="menu-toggler" href="#">
			<span class="menu-text"></span>
		</a>

		<div class="sidebar" id="sidebar">
			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
			</script>


			<?php include 'menu.php';?>

			<div class="sidebar-collapse" id="sidebar-collapse">
				<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
			</div>

			<script type="text/javascript">
				try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
			</script>
		</div>

		<div class="main-content">


			<div class="page-content">

			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="icon-double-angle-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<script src="/m/js/jquery-2.0.3.min.js"></script>
<script src="/m/js/bootstrap.min.js"></script>
<script src="/m/js/typeahead-bs2.min.js"></script>
<script src="/m/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/m/js/jquery.ui.touch-punch.min.js"></script>
<script src="/m/js/jquery.slimscroll.min.js"></script>
<script src="/m/js/jquery.easy-pie-chart.min.js"></script>
<script src="/m/js/jquery.sparkline.min.js"></script>
<script src="/m/js/flot/jquery.flot.min.js"></script>
<script src="/m/js/flot/jquery.flot.pie.min.js"></script>
<script src="/m/js/flot/jquery.flot.resize.min.js"></script>
<script src="/m/js/ace-elements.min.js"></script>
<script src="/m/js/ace.min.js"></script>
</body>
</html>

