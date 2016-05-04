<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Account - <?php echo \Yii::$app->params['appName'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="/css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/css/font-awesome.min.css"/>

	<!-- ace styles -->
	<link rel="stylesheet" href="/css/ace.min.css"/>
	<link rel="stylesheet" href="/css/ace-rtl.min.css"/>
	<script src="/js/jquery-2.0.3.min.js"></script>
	<script src="/js/api.js"></script>
</head>
<body class="login-layout">
<div class="main-container">
	<div class="main-content">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="login-container">
					<div class="center">
						<h1>
							<span class="white"><?php echo \Yii::$app->params['appName']?></span>
						</h1>
					</div>
					<div class="space-6"></div>
					<div class="position-relative">
						<?php echo $content ?>
					</div><!-- /position-relative -->
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
</div><!-- /.main-container -->
</body>
</html>
