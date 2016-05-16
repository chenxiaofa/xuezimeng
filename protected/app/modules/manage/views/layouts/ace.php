<?php
use yii\helpers\Url;

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
	<link href="/static/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/static/css/font-awesome.min.css" />




	<!-- fonts -->
	<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->
	<!-- ace styles -->
	<link rel="stylesheet" href="/static/css/ace.min.css" />
	<link rel="stylesheet" href="/static/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="/static/css/ace-skins.min.css" />
	<link rel="stylesheet" href="/static/css/manage/manage.css" />
	<script src="/static/js/ace-extra.min.js"></script>
	<!-- basic scripts -->

	<script src="/static/js/jquery-2.0.3.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
	<script src="/static/js/typeahead-bs2.min.js"></script>
	<script src="/static/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="/static/js/jquery.ui.touch-punch.min.js"></script>
	<script src="/static/js/jquery.slimscroll.min.js"></script>
	<script src="/static/js/jquery.easy-pie-chart.min.js"></script>
	<script src="/static/js/jquery.sparkline.min.js"></script>
	<script src="/static/js/flot/jquery.flot.min.js"></script>
	<script src="/static/js/flot/jquery.flot.pie.min.js"></script>
	<script src="/static/js/flot/jquery.flot.resize.min.js"></script>
	<script src="/static/js/ace-elements.min.js"></script>
	<script src="/static/js/ace.min.js"></script>
	<script src="/static/js/api.js"></script>
	<script src="/static/js/manage/util.js"></script>

</head>

<body>
<div class="navbar navbar-default" id="navbar">
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
<!--						<img class="nav-user-photo" src="/static/avatars/user.jpg" alt="Jason's Photo" />-->
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
							<a href="javascript:void(0);" id="logout">
								<i class="icon-off"></i>
								退出
							</a>
						</li>
						<script>
							(function()
							{
								var logoutFunction = function()
								{
									$('#logout').on(
										'click',
										function()
										{
											Api.apiSignOut()
												.setCompleteCallback(
													function()
													{
														window.location.href = '<?php echo Url::to(['account/sign-up'])?>';
													}
												).send()
										
										}
									);
								};
								$(logoutFunction);
							})();
						</script>
					</ul>
				</li>
			</ul><!-- /.ace-nav -->
		</div><!-- /.navbar-header -->
	</div><!-- /.container -->
</div>

<div class="main-container" id="main-container">
	<div class="main-container-inner">
		<a class="menu-toggler" id="menu-toggler" href="#">
			<span class="menu-text"></span>
		</a>

		<div class="sidebar" id="sidebar">
			<ul class="nav nav-list">
				<?php
				foreach($this->menu as $menu):
					$text = array_key_exists('name',$menu)?$menu['name']:'';
					$icon = array_key_exists('icon',$menu)?$menu['icon']:'';
					$url = array_key_exists('url',$menu)?$menu['url']:'javascript:void(0);';
					$subMenu = array_key_exists('sub_menu',$menu)?$menu['sub_menu']:array();
					$hasMenu = !empty($subMenu);
					$isActive = array_key_exists('is_active',$menu);
					?>
					<li class="<?php if ($isActive)echo 'active'; ?>">
						<a href="<?php echo $url;?>" class="<?php if ($hasMenu)echo 'dropdown-toggle'; ?>">
							<i class="<?php echo $icon?>"></i>
							<span class="menu-text"> <?php echo $text?> </span>
							<?php if ($hasMenu && !$isActive): ?><b class="arrow icon-angle-down"></b><?php endif;?>
						</a>
						<?php if ($hasMenu): ?>
							<ul class="submenu">
								<?php foreach($subMenu as $m):
									$text = array_key_exists('name',$m)?$m['name']:'';
									$icon = array_key_exists('icon',$m)?$m['icon']:'';
									$url = array_key_exists('url',$m)?$m['url']:'javascript:void(0);';
									$subIsActive = array_key_exists('is_active',$m);
									?>
									<li class="<?php if ($subIsActive)echo 'active'; ?>">
										<a  href="<?php echo $url;?>">
											<i class="<?php echo $icon;?>"></i>
											<?php echo $text;?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif;?>
					</li>
				<?php endforeach;?>
			</ul><!-- /.nav-list -->

			<div class="sidebar-collapse" id="sidebar-collapse">
				<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs" style="display: none;">
				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="/manage/">首页</a>
					</li>
				</ul><!-- .breadcrumb -->

				<div class="nav-search" id="nav-search">
					<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
									<i class="icon-search nav-search-icon"></i>
								</span>
					</form>
				</div><!-- #nav-search -->
			</div>
			<div class="page-content">
				<div class="page-header">
					<h1>
						<?php echo $this->header;?>
					</h1>
				</div>
				<?php echo $content; ?>
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="icon-double-angle-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->


</body>
</html>

