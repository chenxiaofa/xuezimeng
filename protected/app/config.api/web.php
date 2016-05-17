<?php

define('WEIXIN_CATEGORY','WeiXin:');

$route  = [
    //微信接口
    'POST,GET api/weixin/<app_id:\d+>/set-menu'=>'api/weixin/set-menu',
];

$components = [
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
        'enableStrictParsing' => false
    ],
];
$modules = [
    'api'=>[
        'class'=>'app\modules\api\Module'
    ],
];

/** @var array $config */
$config['components'] = array_merge($config['components'],$components);
$config['modules'] = array_merge($config['modules'],$modules);


