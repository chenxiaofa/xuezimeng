<?php

$params = [
    'adminEmail' => 'admin@example.com',
    'appName' => 'WebApp',
    'company' => 'xfa',
    'version'=>'0.1',
];


$config = [
    'id' => 'Web',
    'name'=>'学子梦培训',
    'basePath' => dirname(__DIR__),
    'defaultRoute'=>'index/index',
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'cache'=>[
            'class'=>'yii\caching\FileCache'
        ],
    ],
    'params'=>$params,
    'modules'=>[],
    'bootstrap'=>[],
];

$match = array();
if (preg_match('/^\/(manage|wx|api|rest|m)[\/]?/',$_SERVER['REQUEST_URI'],$match))
{
    include __DIR__ . sprintf('/../config.%s/web.php',$match[1]);
}
else
{
    include __DIR__ . '/../config.web/web.php';
}

return $config;
