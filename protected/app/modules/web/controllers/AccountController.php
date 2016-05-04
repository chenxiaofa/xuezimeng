<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 13:50
 */

namespace app\modules\web\controllers;

/**
 * 帐号相关页面控制器
 * Class AccountController
 * @package app\modules\web\controllers
 */
class AccountController extends ApplicationController
{
	protected $publicActions = ['sign-in','sign-up'];
	public $layout = 'account';

	/**
	 * 登录页面
	 */
	public function actionSignUp()
	{
		return $this->render('sign-up');
	}

	/**
	 * 注册页面
	 */
	public function actionSignIn()
	{
		return $this->render('sign-in');
	}
}