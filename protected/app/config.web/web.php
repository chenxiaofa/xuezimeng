<?php

$routes = [

    //PC端
    'GET /'=>'web/index/index',
    'GET /index.html'=>'web/index/index',
    'GET /about'=>'web/index/about',
    'GET /courses'=>'web/index/courses',
    'GET /contact'=>'web/index/contact',
    'GET /price'=>'web/index/price',
    'GET /preferential'=>'web/index/preferential',
    'GET /articles/<aid:\d+>.html'=>'/web/articles/view',


    //移动端
    'GET m'=>'m/index/index',
    'GET m/about'=>'m/index/about',
    'GET exam'=>'m/exam/welcome',
    'GET exam/start'=>'m/exam/index',
    'GET exam/finished'=>'m/exam/finished',
    'GET survey'=>'m/exam/welcome',
    'GET survey/start'=>'m/exam/index',
    'GET survey/finished'=>'m/exam/finished',

];

/** @var array $config */
$config['components'] = array_merge($config['components'],[
    'request'=>[
        'cookieValidationKey' => 'web-push-portal',
        'enableCsrfValidation'=>false,
        'parsers' => [
            'application/json' => 'yii\web\JsonParser',
        ],
    ],
    'urlManager'=>[
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'enableStrictParsing' => false,
        'rules' => $routes,
    ],
]);

$config['modules'] = array_merge($config['modules'],[
    'web'=>[
        'class'=>'app\modules\web\Module',
    ],
    'm'=>[
        'class'=>'app\modules\mobile\Module',
    ],
]);


if (0)
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