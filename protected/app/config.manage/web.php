<?php
/** @var array $config */
$menu   = [
    [
        'name'=>'控制台',
        'icon'=>'icon-dashboard',
        'url'=>'/manage'
    ],
//    [
//        'name'=>'网站设置',
//        'icon'=>'icon-user',
//        'sub_menu'=>
//            [
//                ['name'=>'B','url'=>'/manage/survey/list'],
//            ]
//    ],
    [
        'name'=>'学生管理',
        'icon'=>'icon-user',
        'sub_menu'=>
            [
                //['name'=>'学生列表','url'=>'/manage/student/list'],
                ['name'=>'报名咨询','url'=>'/manage/survey/list'],
            ]
    ],
    [
        'name'=>'系统管理',
        'icon'=>'icon-cog',
        'sub_menu'=>
            [
                ['name'=>'修改密码','url'=>'/manage/account/change-password'],
            ]
    ],
    [
        'name'=>'素材管理',
        'icon'=>'icon-picture',
        'sub_menu'=>
            [
                ['name'=>'图片素材','url'=>'/manage/resources/image'],
                ['name'=>'添加图片素材','url'=>'/manage/resources/add-image'],
            ]
    ],
    [
        'name'=>'内容管理',
        'icon'=>'icon-book',
        'sub_menu'=>
            [
                ['name'=>'站点模块','url'=>'/manage/article/modules'],
                ['name'=>'课程介绍','url'=>'/manage/article/topic'],
                ['name'=>'学子梦动态','url'=>'/manage/article/news'],
            ]
    ],
//	[
//		'name'=>'微信管理',
//		'icon'=>' icon-comments-alt',
//		'sub_menu'=>
//			[
//				['name'=>'公众号管理','url'=>'/manage/platform/list'],
//				['']
//			]
//	]
];
$route  = [
    //管理端
    'GET manage'=>'manage/welcome/index',
    'GET manage/login'=>'manage/account/sign-up',
    //'GET manage/register'=>'web/account/sign-in',
    'GET manage/article/add/<type:\d+>'=>'manage/article/add',
    'GET manage/article/edit/<aid:\d+>'=>'manage/article/edit', 
];
$components = [
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
];

$modules = [
    'manage'=>[
        'class'=>'app\modules\manage\Module',
    ],
];

$config['components'] = array_merge($config['components'],$components);
$config['modules'] = array_merge($config['modules'],$modules);


