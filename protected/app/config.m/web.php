<?php

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
        'session' => [
            'class' => 'yii\web\DbSession',
            'sessionTable' => 'm_php_session', 
        ],

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
        'm'=>[
            'class'=>'app\modules\mobile\Module',
        ],
    ],
];

//if (1)
//{
//    $config['modules']['gii'] = [
//        'class'=>'yii\gii\Module',
//        'allowedIPs' => ['*'],
//    ];
//    $config['modules']['debug'] = [
//        'class'=>'yii\debug\Module',
//        'allowedIPs' => ['*'],
//    ];
//    $config['bootstrap'][] = 'gii';
//    $config['bootstrap'][] = 'debug';
//}

if (preg_match('/^\/manage/',$_SERVER['REQUEST_URI']))
{
    $config['components']['view'] = [
        'class'=>'app\modules\manage\View',
        'menu'=>include 'menu.php',
    ];
}

return $config;
