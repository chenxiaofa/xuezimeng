<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 18:21
 */

namespace app\components;


use yii\base\ActionFilter;

class jsonParser extends ActionFilter
{
	public function beforeAction($action)
	{
		$request = \Yii::$app->request;
		if (
			in_array(
				strtoupper($request->getMethod()),
				array('POST','PUT')
			)
		)
		{
			if (strpos(strtolower($request->getContentType()),'json') !== false)
			{
				$jsonArray = json_decode($request->getRawBody(),true);
				if (!is_null($jsonArray))
				{
					$request->setBodyParams($jsonArray);
				}
			}
		}
		return parent::beforeAction($action);
	}
}