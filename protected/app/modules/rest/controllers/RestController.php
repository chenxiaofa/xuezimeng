<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 16:22
 */

namespace app\modules\rest\controllers;


use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;

class RestController extends Controller
{

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'contentNegotiator' => [
				'class' => ContentNegotiator::className(),
				'formats' => [
					'application/json' => Response::FORMAT_JSON,
					'application/xml' => Response::FORMAT_XML,
				],
			],
			'authenticator' => [
				'class' => CompositeAuth::className(),
			],
		];
	}

}