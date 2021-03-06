<?php
/**
 * User: 陈晓发
 * Date: 2016/5/2
 * Time: 16:18
 */

namespace app\modules\mobile\controllers;


use app\models\ExamQuestionOptions;
use app\models\ExamQuestions;
use yii\web\Controller;

class ExamController extends Controller
{
	/** @var \app\modules\mobile\Module */
	public $module = null;
	public $openid = null;
	public $waid = null;
	public  $layout = 'bootstrap3';

	public function beforeAction($action)
	{
		$session = \Yii::$app->session;
		$session->open();
		$this->waid   = $session->get('waid');
		$this->openid = $session->get('openid');
		if (!($this->openid))
		{
			if (false/*  */ && preg_match('/MicroMessenger/i',\Yii::$app->request->userAgent))
			{
				$this->openid = $this->module->wxMgr->authWithSnsapiBase();
				$this->waid   = $this->module->wxMgr->wxAppModel->id;
			}
			else
			{
				$this->waid = -1;
				$this->openid = sha1(microtime().rand(0,100000000));
			}
			if ($this->openid !== false)
			{
				$session->set('waid',$this->waid);
				$session->set('openid',$this->openid);
			}
		}

		return parent::beforeAction($action); // TODO: Change the autogenerated stub
	}

	public function actionWelcome()
	{
		$this->layout = false;
		return $this->render('welcome');
	}

	public function actionIndex()
	{
		$questions = ExamQuestions::find()->orderBy('order')->where('status = :status',['status'=>1])->all();
		$getOptions = function($qid)
		{
			return ExamQuestionOptions::find()->orderBy('order')->where('eqid = :eqid',['eqid'=>$qid])->all();
		};


		return $this->render('index',
			[
				'questions'=>$questions,
				'getOptions'=>$getOptions,
				'waid'=>$this->waid,
				'openid'=>$this->openid,
			]
		);
	}

	public function actionFinished()
	{
		return $this->render('finished');
	}

}