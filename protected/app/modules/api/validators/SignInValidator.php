<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/1/25
 * Time: 10:25
 */

namespace app\modules\api\validators;

use app\models\Users;

/**
 * Class SignInValidator
 * @package app\modules\api\validators
 * @property mixed username
 * @property mixed email
 * @property mixed password
*/
class SignInValidator extends ApiParamValidator
{

	/**
	 * return parameter fields
	 * @return array
	 */
	public function parameterFields()
	{
		return [
			'username','email','password','re-password'
		];
	}

	/**
	 * return parameter check rules
	 * @return array
	 */
	public function parameterRules()
	{
		return [
			[['username','email','password','re-password'],'required'],
			['username','string','max'=>16],
			['email','string','max'=>64],
			['password','string','min'=>6,'max'=>64],
			['email', 'email'],
			['password', 'compare','compareAttribute'=>'re-password','operator'=>'==','message'=>'{attribute} must equal to re-password'],
			//['email', 'inlineEmailExists'],
			['username','inlineUsernameExists'],
		];
	}

	public function inlineUsernameExists($attribute)
	{
		$u = Users::findOne(['username'=>$this->username]);

		if (!is_null($u))
		{
			$this->addErrorMessage($attribute,'username already exists');
			return false;
		}
		return true;
	}


	public function inlineEmailExists($attribute)
	{
		$u = Users::findOne(['email'=>$this->email]);
		if (!is_null($u))
		{
			$this->addErrorMessage($attribute,'email already exists');
			return false;
		}
		return true;
	}


}