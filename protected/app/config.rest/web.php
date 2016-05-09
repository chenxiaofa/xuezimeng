<?php

$params = require(__DIR__ . '/../config/params.php');
$db     = require(__DIR__ . '/../config/db.php');

$config = [
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'components' => [
        'session' => [
            'class' => 'yii\web\DbSession',
            'sessionTable' => 'm_php_session',
        ],
        'authManager' => [
            'class' => 'app\rbac\RbacManager',
        ],
        'request' => [
            'cookieValidationKey' => 'web-push-portal',
            'enableCsrfValidation'=>false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
        ],
        'db' => $db,
    ],
    'params' => $params,
    'modules'=>[
        'rest'=>[
            'class'=>'app\modules\rest\Module'
        ]
    ],
];

return $config;
