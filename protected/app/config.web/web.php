<?php
$params = require(__DIR__ . '/../config/params.php');

$config = [
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'defaultRoute'=>'index/index',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'web-push-portal',
            'enableCsrfValidation'=>false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache'=>[
            'class'=>'yii\caching\FileCache'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => require(__DIR__ . '/routes.php'),
        ],
        'db' => require(__DIR__ . '/../config/db.php'),
    ],
    'params' => $params,
    'modules'=>[
        'web'=>[
            'class'=>'app\modules\web\Module',
        ],
        'm'=>[
            'class'=>'app\modules\mobile\Module',
        ],
    ],
];


if (1)
{
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
    $config['modules']['debug'] = [
        'class'=>'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['bootstrap'][] = 'debug';
}

return $config;
