<?php
namespace app\weixin\exceptions;
use app\exceptions\Exception;

/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/4/29
 * Time: 14:16
 */
class WeixinApiException extends Exception
{
	/** 错误代码 */
	const CODE = 550;
	/** 错误名称 */
	const NAME = 'WeiXin Api Exception';
}