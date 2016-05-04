<?php

/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 17:00
 */

namespace app\exceptions;

use yii\web\HttpException;

class Exception extends HttpException
{
	/** 错误代码 */
	const CODE = 500;
	/** 错误名称 */
	const NAME = null;

	/**
	 * @param $message
	 * @throws static
	 */
	static function T($message)
	{
		throw new static(static::CODE,$message);
	}

	/**
	 * @param $status
	 * @param $message
	 * @throws static
	 */
	static function customThrow($status,$message)
	{
		throw new static($status,$message);
	}

	/**
	 * 错误名称
	 * @return null|string
	 */
	public function getName()
	{
		if (is_null(static::NAME) || !is_string(static::NAME))
		{
			return parent::getName();
		}
		else
		{
			return static::NAME;
		}

	}
}