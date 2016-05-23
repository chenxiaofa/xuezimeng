<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/5/23
 * Time: 16:30
 */

namespace app\modules\manage\controllers;


class ResourcesController extends ApplicationController
{
	public function actionImage()
	{
		return $this->render('image_list');
	}

	public function actionAddImage()
	{
		return $this->render('add_image');
	}
}