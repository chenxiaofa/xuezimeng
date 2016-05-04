<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 16:34
 */

namespace app\modules\api\controllers;


use app\managers\AccountManager;
use app\modules\api\validators\LoginValidator;
use app\modules\api\validators\SignInValidator;
use app\modules\api\validators\SignUpValidator;

class AccountController extends ApiController
{

	/**
	 * @return string
	 */
	public function actionSignUp()
	{
		$vSignUp = SignUpValidator::createFromBodyParams();
		if (!$vSignUp->validate())
		{
			$vSignUp->T();
		}

		$mgr = AccountManager::getInstance();
		return $mgr->userLogin($vSignUp);

	}

	/**
	 * @return array
	 */
	public function actionSignIn()
	{
		$vSignIn = SignInValidator::createFromBodyParams();
		if (!$vSignIn->validate())
		{

			$vSignIn->T();
		}
		$mgr = AccountManager::getInstance();
		return $mgr->addAccount($vSignIn);
	}

	/**
	 * @return array
	 */
	public function actionSignOut()
	{
		$mgr = AccountManager::getInstance();
		return $mgr->userLogout();
	}

	public function actionInfo()
	{
		return AccountManager::getInstance()->getMyAccountInfo();
	}
}