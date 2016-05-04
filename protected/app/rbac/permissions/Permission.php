<?php

namespace app\rbac\permissions;
use yii\base\Object;
use app\rbac\rules\RuleInterface;
/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 14:09
 */
class Permission extends Object
{
	const ACCESS_TYPE_PROTECTED = 1;
	const ACCESS_TYPE_PUBLIC = 0;
	public $name = '';
	public $access = 0;
	public $actions = [];
	public $rules = [];

	/**
	 * @return bool
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ForbiddenHttpException
	 */
	public function check()
	{
		if ( empty($this->rules) )
		{
			return true;
		}
		foreach($this->rules as $rule)
		{
			/** @var RuleInterface $rule */
			$rule = \Yii::createObject($rule);
			$rule->check();
		}
		return true;
	}

}