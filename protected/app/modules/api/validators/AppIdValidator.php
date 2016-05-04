<?php
/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 18:21
 */

namespace app\modules\api\validators;

/**
 * Class AppIdValidator
 * @property integer app_id
 * @package app\modules\api\validators
 */
class AppIdValidator extends ApiParamValidator
{
	/** @var WxApp */
	public $wxAppModel = null;

	/**
	 * return parameter fields
	 * @return array
	 */
	public function parameterFields()
	{
		return ['app_id'];
	}

	/**
	 * return parameter check rules
	 * @return array
	 */
	public function parameterRules()
	{
		return [
			['app_id','required'],
			['app_id','integer'],
			['app_id','checkAppId'],
		];
	}

	public function checkAppId()
	{
		$this->wxAppModel = \app\models\WxApp::findOne($this->app_id);
		if (empty($this->wxAppModel))
		{
			$this->addErrorMessage('app_id','invalid app id');
		}
	}
}