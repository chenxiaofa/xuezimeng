<?php
namespace app\rbac\rules;
/**


 * User: 陈晓发
 * Date: 2016/3/21
 * Time: 16:50
 */
interface RuleInterface
{
	/**
	 * @return mixed
	 * @throws \yii\web\ForbiddenHttpException;
	 */
	public function check();
}