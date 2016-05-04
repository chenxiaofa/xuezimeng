<?php

namespace app\managers;
use app\exceptions\BusinessLogicException;
use app\models\Users;
use app\modules\api\validators\SignInValidator;
use app\modules\api\validators\SignUpValidator;
use Yii;

/**


 * User: 陈晓发
 * Date: 2016/1/25
 * Time: 11:00
 */
class AccountManager extends Manager
{
	/**
	 * @param SignInValidator $vSignIn
	 * @return array
	 * @throws
	 */
	public function addAccount(SignInValidator $vSignIn)
	{
		$u = new Users();
		$u->username = $vSignIn->username;
		$u->email = $vSignIn->email;
		$u->setPassword($vSignIn->password);
		if (!$u->save())
		{
			BusinessLogicException::T('save user info failed');
		}
		return ['username'=>$u->username,'email'=>$u->email,'id'=>$u->id];
	}

	/**
	 * @param SignUpValidator $vSignUp
	 * @return array
	 */
	public function userLogin(SignUpValidator $vSignUp)
	{
		/** @var Users $userModel */
		$userModel = $vSignUp->userModel;
		$expire = 0;
		if ($vSignUp->remember)
		{
			$expire = 7200;
		}
		if ( !$userModel->checkPassword($vSignUp->password) )
		{
			BusinessLogicException::T('invalid password');
		}
		Yii::$app->user->login($userModel,$expire);
		$userModel->last_login_time = time();
		$userModel->save();
		return ['last_login_time'=>$userModel->last_login_time,'id'=>$userModel->id,'username'=>$userModel->username,'email'=>$userModel->email];
	}


	public function userLogout()
	{
		Yii::$app->user->logout(true);
		return [];
	}


	public function getMyAccountInfo()
	{
		return ['email'=>Yii::$app->user->identity->email,'username'=>Yii::$app->user->identity->username];
	}

}