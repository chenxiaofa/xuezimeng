<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/6/3
 * Time: 19:36
 */

namespace app\managers;


use app\models\Resources;
class ResourceManager extends Manager
{
	public function addResource($name,$file)
	{
		$path = Resources::getSavePath($name);
		$newFilename = Resources::getNewFileName($name);
		$savePath = \Yii::getAlias('@webroot').$path;
//		if (!file_exists($savePath))
//		{
//			@mkdir($savePath,644,true);
//		}
		@move_uploaded_file($file,$savePath.$newFilename);
		$model = new Resources();
		$model->create_time = time();
		$model->type = Resources::RESOURCE_TYPE_IMAGE;
		$model->name = $name;
		$model->url = $path.$newFilename;
		$model->owner = \Yii::$app->user->identity->id;
		$model->save();
		return $model;
	}
}