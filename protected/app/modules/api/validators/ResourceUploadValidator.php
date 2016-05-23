<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/5/23
 * Time: 19:04
 */

namespace app\modules\api\validators;

/**
 * Class ResourceUploadValidator
 * @package app\modules\api\validators
 * @property string name
 * @property string type
 * @property string tmp_name
 * @property integer error
 * @property integer size
 */
class ResourceUploadValidator extends ApiParamValidator
{

	/**
	 * return parameter fields
	 * @return array
	 */
	public function parameterFields()
	{
		return ['name','type','tmp_name','error','size'];
	}

	/**
	 * return parameter check rules
	 * @return array
	 */
	public function parameterRules()
	{
		return [
			[['name','type','tmp_name','error','size'],'required'],
			[['error','size'],'integer'],
		];
	}


}