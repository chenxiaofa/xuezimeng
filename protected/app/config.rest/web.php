<?php

/** @var array $config */
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
        'enableStrictParsing' => false,
        'rules' => [
            ['class' => 'app\rest\UrlRule', 'controller' => ['rest/resources']],
            ['class' => 'app\rest\UrlRule', 'controller' => ['rest/articles']],
        ],
    ],
];
$modules = [
    'rest'=>[
        'class'=>'app\modules\rest\Module'
    ]
];

$config['components'] = array_merge($config['components'],$components);
$config['modules'] = array_merge($config['modules'],$modules);



