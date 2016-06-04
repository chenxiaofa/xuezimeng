<?php
define('WEIXIN_CATEGORY','WeiXin:');
$params = [
    'adminEmail' => 'admin@example.com',
    'appName' => 'WebApp',
    'company' => 'xfa',
    'version'=>'0.1',
];


$config = [
    'language'=>'zh-CN',
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'runtimePath'=> dirname(__DIR__).'/../runtime',
    'defaultRoute'=>'index/index',
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'cache'=>[
            'class'=>'yii\caching\FileCache'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info','warning','error'],
                    'logVars'=>[],
                    'logFile'=> '@runtime/logs/yii.log'
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'web-push-portal',
            'enableCsrfValidation'=>false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
    ],
    'params'=>$params,
    'modules'=>[],
    'bootstrap'=>['log'],
];

$match = array();
if (preg_match('/^\/(manage|wx|api|rest|m)[\/]?/',$_SERVER['REQUEST_URI'],$match))
{
    include __DIR__ . sprintf('/../config.%s/web.php',$match[1]);
}
else
{
    include __DIR__ . '/../config.web/web.php';
}

return $config;
