<?php

namespace app\modules\api\validators;
use app\models\Users;
use yii\validators\EmailValidator;

/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 17:26
 * @property \app\models\Users $userModel
 */
class ChangePasswordValidator extends ApiParamValidator
{
	public $userModel = null;
	public $account = null;
	public $password = null;
	public $new_password = null;
	public $re_new_password = null;

	/**
	 * return parameter fields
	 * @return array
	 */
	public function parameterFields()
	{
		return ['account','password','new_password','re_new_password'];
	}

	/**
	 * return parameter check rules
	 * @return array
	 */
	public function parameterRules()
	{
		return [
			[['account','password','new_password','re_new_password'],'required'],
			['account','inlineAccountExists'],
			['password','inlineCheckPassword'],
			['new_password','compare','compareAttribute'=>'re_new_password','operator'=>'==='],
		];
	}

	public function inlineAccountExists($attribute)
	{
		$vEmail = new EmailValidator();
		$account = $this->account;
		if ( $vEmail->validate($account) )
		{
			$u = Users::findOne(['email'=>$account]);
		}
		else
		{
			$u = Users::findOne(['username'=>$account]);
		}
		if ( is_null($u) )
		{
			$this->addErrorMessage($attribute,'Invalid account');
			return false;
		}
		$this->userModel = $u;
		return true;

	}

	public function inlineCheckPassword($attribute)
	{
		if ($this->hasErrors())
			return false;

		if ( !$this->userModel->checkPassword($this->password) )
		{
			$this->addErrorMessage($attribute,'Invalid original Password');
			return false;
		}

		return true;

	}

}