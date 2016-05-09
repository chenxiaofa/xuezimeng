<?php
$params = require(__DIR__ . '/../config/params.php');

$config = [
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'defaultRoute'=>'index/index',
    'components' => [

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
        ]
    ],
];

return $config;
