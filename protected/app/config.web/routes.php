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
	'GET /about'=>'web/index/about',
	'GET /courses'=>'web/index/courses',



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