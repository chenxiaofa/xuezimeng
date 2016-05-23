<?php

$routes  = [
    'POST wx/<app_id:\d+>'=>'weixin/index/index',
    'GET wx/<app_id:\d+>'=>'weixin/index/join',
];
$components = [
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'enableStrictParsing' => false,
        'rules' => $routes,
    ],
];

$modules = [
    'weixin'=>[
        'class'=>'app\modules\weixin\Module',
    ]
];

/** @var array $config */
$config['components'] = array_merge($config['components'],$components);
$config['modules'] = array_merge($config['modules'],$modules);
