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
 * Class ExamSaveValidator
 * @package app\modules\api\validators
 * @property mixed username
 * @property mixed email
 * @property mixed password
*/
class ExamSaveValidator extends ApiParamValidator
{

	/**
	 * return parameter fields
	 * @return array
	 */
	public function parameterFields()
	{
		return [
			'waid','openid','name','phone','sex','age','stage','eqoid' ,'school','class','fillable','qq'
		];
	}

	/**
	 * return parameter check rules
	 * @return array
	 */
	public function parameterRules()
	{
		return [

		];
	}


}