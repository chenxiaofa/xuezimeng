<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 17:53
 */

namespace app\rbac\rules;


use yii\web\ForbiddenHttpException;

class WeixinSetMenuRule extends WeixinAccessRule
{

	/**
	 * @throws ForbiddenHttpException
	 */
	protected function checkOperaPermission()
	{
		if (!\app\models\WxAppPermission::findOne(['uid'=>$this->userModel->id,'app_id'=>$this->appModel->id,'type'=>self::WEINXIN_PERMISSION_TYPE_SET_MENU]))
		{
			throw new ForbiddenHttpException('access denied');
		}
		return true;
	}
}