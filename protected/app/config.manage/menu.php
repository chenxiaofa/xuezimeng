<?php
/**


 * User: 陈晓发
 * Date: 2016/3/1
 * Time: 16:59
 */
return [
	[
		'name'=>'控制台',
		'icon'=>'icon-dashboard',
		'url'=>'/manage'
	],
	[
		'name'=>'学生管理',
		'icon'=>'icon-user',
		'sub_menu'=>
				[
					//['name'=>'学生列表','url'=>'/manage/student/list'],
					['name'=>'报名咨询','url'=>'/manage/survey/list'],
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