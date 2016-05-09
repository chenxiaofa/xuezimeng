<?php

$params = require(__DIR__ . '/../config/params.php');
$menu   = require(__DIR__ . '/../config/menu.php');
$route  = require(__DIR__ . '/routes.php');
$db     = require(__DIR__ . '/../config/db.php');

$config = [
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'components' => [
        'view'=>[
            'class'=>'app\modules\manage\View',
            'menu'=>$menu,
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'sessionTable' => 'm_php_session',
        ],
        'authManager' => [
            'class' => 'app\rbac\RbacManager',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => $route,
        ],
        'db' => $db,
    ],
    'params' => $params,
    'modules'=>[
        'manage'=>[
            'class'=>'app\modules\manage\Module',
        ],
    ],
];


return $config;
