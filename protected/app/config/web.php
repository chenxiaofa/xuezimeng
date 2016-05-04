<?php


define('WEIXIN_CATEGORY','WeiXin:');
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'Web',
    'name'=>'学子梦',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute'=>'index/index',
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
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => require(__DIR__ . '/routes.php'),
        ],
//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'categories' => ['yii\*'],
                    'logFile'=> '@runtime/logs/yii.error.log'
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'categories' => ['app*'],
                    'logFile'=> '@runtime/logs/app.error.log'
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [],
                    'categories' => ['app*'],
                    'logFile'=> '@runtime/logs/app.trace.log'
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [],
                    'categories' => ['WeiXin*'],
                    'logVars'=>[],
                    'logFile'=> '@runtime/logs/weixin.log'
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
    'modules'=>[
        'rest'=>[
            'class'=>'app\modules\rest\Module'
        ],
        'api'=>[
            'class'=>'app\modules\api\Module'
        ],
        'weixin'=>[
            'class'=>'app\modules\weixin\Module',
        ],
        'web'=>[
            'class'=>'app\modules\web\Module',
        ],
        'mobile'=>[
            'class'=>'app\modules\mobile\Module',
        ],
        'manage'=>[
            'class'=>'app\modules\manage\Module',
        ],
    ],
];

if (false)
{
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
//    $config['modules']['debug'] = [
//        'class'=>'yii\debug\Module',
//        'allowedIPs' => ['*'],
//    ];
    $config['bootstrap'][] = 'gii';
//    $config['bootstrap'][] = 'debug';
}

return $config;
