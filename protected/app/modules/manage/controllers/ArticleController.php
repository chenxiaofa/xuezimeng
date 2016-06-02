<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/5/22
 * Time: 13:19
 */

namespace app\modules\manage\controllers;


use app\managers\WeixinManager;
use app\models\Articles;

class ArticleController extends ApplicationController
{
	public function actionList()
	{

	}

	/**
	 * 站点模块管理
	 * @return string
	 */
	public function actionModules()
	{
		return $this->render('list',['type'=>Articles::TYPE_WEB_MODULE]);
	}

	/**
	 * 学子梦课程介绍
	 */
	public function actionTopic()
	{
		return $this->render('list',['type'=>Articles::TYPE_TOPIC]);
	}

	/**
	 * 学子梦动态管理
	 */
	public function actionNews()
	{
		return $this->render('list',['type'=>Articles::TYPE_NEWS]);
	}


	/**
	 * 添加文章
	 * @param $type
	 * @return string
	 */
	public function actionAdd($type)
	{
		return $this->render('add_umedit.php',['type'=>$type]);
	}

	/**
	 * 添加文章
	 * @param $aid
	 * @return string
	 */
	public function actionEdit($aid)
	{
		$model = Articles::findOne(['id'=>$aid]);
		return $this->render('edit_umedit.php',['model'=>$model]);
	}


}