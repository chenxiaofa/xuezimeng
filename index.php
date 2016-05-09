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
$match = array();
if (preg_match('/^\/(manage|wx|api|rest|m)[\/]?/',$_SERVER['REQUEST_URI'],$match))
{
    $config = require(__DIR__ . sprintf('/protected/app/config.%s/web.php',$match[1])); 
}
else
{
    $config = require(__DIR__ . '/protected/app/config.web/web.php');
}


(new yii\web\Application($config))->run();
