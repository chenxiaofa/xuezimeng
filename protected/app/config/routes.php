<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 13:49
 * Framework: Codeigniter
 * Module:
 * Class:
 */
return [


	//PC端
	'GET /'=>'web/index/index',
	'GET /index'=>'web/index/index',

	//微信接口
	'POST wx/<app_id:\d+>'=>'weixin/index/index',
	'GET wx/<app_id:\d+>'=>'weixin/index/join',
	'POST,GET api/weixin/<app_id:\d+>/set-menu'=>'api/weixin/set-menu',



	
	
	//微信管理
	'GET platform/list'=>'web/platform/list',

	//管理端
	'GET manage'=>'manage/welcome/index',
	'GET manage/login'=>'manage/account/sign-up',
	//'GET manage/register'=>'web/account/sign-in',



	//移动端
	'GET m'=>'mobile/index/index',
	'GET m/about'=>'mobile/index/about',
	'GET exam'=>'mobile/exam/welcome',
	'GET exam/start'=>'mobile/exam/index',
	'GET exam/finished'=>'mobile/exam/finished',

	'GET survey'=>'mobile/exam/welcome',
	'GET survey/start'=>'mobile/exam/index',
	'GET survey/finished'=>'mobile/exam/finished',
];