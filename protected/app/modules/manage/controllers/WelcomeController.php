<?php
/**
 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 13:59
 */

namespace app\modules\manage\controllers;


class WelcomeController extends ApplicationController
{

	/**
	 * Dashboard
	 * @return string
	 */
	public function actionIndex()
	{
		return $this->render('index',[]);
	}
}