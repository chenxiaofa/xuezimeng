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

	//微信接口
	'POST wx/<app_id:\d+>'=>'weixin/index/index',
	'GET wx/<app_id:\d+>'=>'weixin/index/join',

];