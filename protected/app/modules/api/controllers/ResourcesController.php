<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/5/23
 * Time: 18:58
 */

namespace app\modules\api\controllers;


use app\managers\ResourceManager;
use app\models\Resources;
use app\modules\api\validators\ResourceUploadValidator;

class ResourcesController extends ApiController
{
	public function actionUpload()
	{
		$v = ResourceUploadValidator::create($_FILES['file']);
		if (!$v->validate())
		{
			$v->T();
		}
		return ResourceManager::getInstance()->addResource($v->name,$v->tmp_name);
	}

}