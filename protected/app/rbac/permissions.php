<?php
/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 13:37
 */

use app\rbac\permissions\Permission;



return [
	'SignUp'=>[
		'access'=>Permission::ACCESS_TYPE_PUBLIC,
		'actions'=>['app\modules\api\controllers\AccountController::sign-up','app\modules\manage\controllers\AccountController::sign-up']
	],
	'SignIn'=>[
		'access'=>Permission::ACCESS_TYPE_PUBLIC,
		'actions'=>['app\modules\api\controllers\AccountController::sign-in','app\modules\manage\controllers\AccountController::sign-in']
	],
	'SetMenu'=>[
		'access'=>Permission::ACCESS_TYPE_PUBLIC,
		'actions'=>['app\modules\api\controllers\WeixinController::set-menu'],
		'rules'=>['app\rbac\rules\WeixinSetMenuRule']
	],
	'PlatformList'=>[
		'access'=>Permission::ACCESS_TYPE_PROTECTED,
		'actions'=>['app\modules\web\controllers\PlatformController::list']
	],
	'ExamSave'=>[
	'access'=>Permission::ACCESS_TYPE_PUBLIC,
	'actions'=>['app\modules\api\controllers\ExamController::save']
	],
];