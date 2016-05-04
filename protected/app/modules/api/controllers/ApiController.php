<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 16:32
 */

namespace app\modules\api\controllers;


use Yii;
use app\rbac\AccessControl;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Class ApiController
 * @package app\modules\api\controllers
 */
class ApiController extends Controller
{
	protected $publicActions = [''];
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
				],
			],
			'access' => [
				'class' => AccessControl::className(),
			],
		];
	}

}