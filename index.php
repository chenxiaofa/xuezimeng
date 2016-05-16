<?php
ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
//phpinfo();exit;
define('VENDOR_DIR',__DIR__.'/protected/app/vendor');
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(VENDOR_DIR.'/autoload.php');
require(VENDOR_DIR.'/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/protected/app/config/web.php');

(new yii\web\Application($config))->run();
