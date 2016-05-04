<?php

namespace app\modules\api\validators;
use app\components\ParamValidator;
use Yii;

/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 17:27
 */
abstract class ApiParamValidator extends ParamValidator
{
	public function addErrorMessage($attribute,$message,$params=[])
	{
		//$this->addError($attribute,Yii::t($this->getI18nTemplate(),$message,$params));
		$this->addError($attribute,strtr($message,$params));
	}
	private function getI18nTemplate()
	{
		//return sprintf()
		return '';
	}
}