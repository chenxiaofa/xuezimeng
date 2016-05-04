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
class SignUpValidator extends ApiParamValidator
{
	public $userModel = null;
	public $account = null;
	public $password = null;
	public $remember = null;

	/**
	 * return parameter fields
	 * @return array
	 */
	public function parameterFields()
	{
		return ['account','password','remember'];
	}

	/**
	 * return parameter check rules
	 * @return array
	 */
	public function parameterRules()
	{
		return [
			[['account','password'],'required'],
			['account','inlineAccountExists'],
			['remember','default','value'=>0],
			['remember','in','range'=>[0,1]]
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

}