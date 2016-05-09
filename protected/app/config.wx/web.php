<?php

define('WEIXIN_CATEGORY','WeiXin:');
$params = require(__DIR__ . '/../config/params.php');
$db     = require(__DIR__ . '/../config/db.php');
$routes  = require(__DIR__ . '/routes.php');

$config = [
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute'=>'index/index',
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => $routes,
        ],
        'db' => $db,
    ],
    'params' => $params,
    'modules'=>[
        'weixin'=>[
            'class'=>'app\modules\weixin\Module',
        ] 
    ],
];
return $config;
