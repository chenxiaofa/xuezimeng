<?php
/**


 * User: 陈晓发
 * Date: 2016/3/8
 * Time: 18:49
 */

namespace app\weixin;


use app\exceptions\Exception;

/**
 * Class WeixinRequest
 * @package app\weixin
 */
class TextResponse extends Response
{

	protected $responseType = self::MSG_TYPE_TEXT;
	public $textContent = '';
	protected function getContent()
	{
		return array(
			'Content'=>$this->textContent
		);
	}




}