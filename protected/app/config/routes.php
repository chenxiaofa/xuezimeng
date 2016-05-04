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
	'GET login'=>'web/account/sign-up',
	'GET register'=>'web/account/sign-in',
	'POST wx/<app_id:\d+>'=>'weixin/index/index',
	'GET wx/<app_id:\d+>'=>'weixin/index/join',
	'POST,GET api/weixin/<app_id:\d+>/set-menu'=>'api/weixin/set-menu',


	//微信管理
	'GET platform/list'=>'web/platform/list',


	//移动端
	'GET exam'=>'mobile/exam/index',
	'GET exam/finished'=>'mobile/exam/finished',
	'GET survey'=>'mobile/exam/index',
	'GET survey/finished'=>'mobile/exam/finished',
];