<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 11:28
 * Framework: Codeigniter
 * Module:
 * Class:
 */

namespace app\modules\manage\controllers;


use app\rbac\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Class ApplicationController
 * @package app\controllers
 */
class ApplicationController extends Controller
{
	protected $publicActions = [''];
	public $layout = 'ace';
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'denyCallback'=>[$this,'onDeny']
			],
		];
	}

	public function onDeny($action)
	{
		$this->redirect('/manage/login');
	}
	
	

}