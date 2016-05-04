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
class Response
{

	const MSG_TYPE_TEXT = 'text';
	const MSG_TYPE_NEWS = 'news';

	protected $responseType = '';
	public $wxFromUserName = '';
	public $wxToUserName = '';


	public function __construct($config)
	{
		foreach($config as $k=>$v)
		{
			$this->$k=$v;
		}

	}

	public function encode()
	{
		return sprintf("<xml>\n%s\n</xml>",
			$this->toXml(
				array_merge(
					[
						'ToUserName'=>$this->wxToUserName,
						'FromUserName'=>$this->wxFromUserName,
						'CreateTime'=>time(),
						'MsgType'=>$this->responseType,
					]

						,$this->getContent()
				)
			)
		);
	}

	protected function getContent()
	{
		return [];
	}

	protected function toXml($arr)
	{
		$item = array();
		foreach($arr as $k=>$v)
		{
			if (is_numeric($k)) $k = 'item';
			if ($v instanceof XmlArray)
			{
				$item[] = "<{$k}>\n{$v->toXml()}\n</{$k}>";
			}
			elseif (is_array($v))
			{
				$item[] = "<{$k}>\n{$this->toXml($v)}\n</{$k}>";
			}
			else
			{
				$item[] = "<{$k}><![CDATA[{$v}]]></{$k}>";
			}
		}
		return implode("\n",($item));
	}


	public final static function createText($toUserName,$fromUserName,$text)
	{
		return new TextResponse(array(
			'wxFromUserName'=>$toUserName,
			'wxToUserName'=>$fromUserName,
			'textContent'=>$text
		));
	}


	public final static function createNews($toUserName,$fromUserName)
	{
		return new NewsResponse(array(
				'wxFromUserName'=>$toUserName,
				'wxToUserName'=>$fromUserName
		));
	}

}