<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/4/29
 * Time: 19:12
 */

namespace app\modules\web\controllers;


class PlatformController extends ApplicationController
{
	public function actionList()
	{
		return $this->render('list');
	}
}