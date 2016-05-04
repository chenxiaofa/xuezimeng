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
 * @method string getFromUserName()
 * @method string getContent()
 * @method string getToUserName()
 * @method integer getCreateTime()
 * @method integer getMsgType()
 * @method integer getMsgMsgId()
 */
class Request
{
	protected $rawXml = '';
	protected $reqDataXml = null;
	protected $reqDataArray = null;


	public $success = true;

	public function __construct($xml)
	{
		$this->rawXml = $xml;
		$this->_decode();
	}

	/**
	 * 解析微信内容
	 */
	private function _decode()
	{
		try
		{
			$this->reqDataXml 	= simplexml_load_string ( $this->rawXml, 'SimpleXMLElement', LIBXML_NOCDATA );
			$this->reqDataArray = json_decode ( json_encode ( $this->reqDataXml ), true );

			\Yii::trace("\n".var_export($this->reqDataArray,true),WEIXIN_CATEGORY.'Request Data');

		}catch (\Exception $e)
		{
			$this->success = false;
		}
	}

	/**
	 * @return static
	 */
	public static function decodeFromPost()
	{
		return new static(\Yii::$app->request->getRawBody());
	}


	/**
	 * @param $name
	 * @param $args
	 * @return null
	 * @throws Exception
	 */
	public function __call($name, $args)
	{
		$match = array();
		if (preg_match('/get(.*)/',$name,$match) !== false)
		{
			if (array_key_exists($match[1],$this->reqDataArray))
			{
				return $this->reqDataArray[$match[1]];
			}
			else
			{
				return null;
			}
		}
		throw new Exception('unknow method');
	}

	public function createTextResponse($text)
	{
		return Response::createText($this->getToUserName(),$this->getFromUserName(),$text);
	}

	public function createNewsResponse()
	{
		return Response::createNews($this->getToUserName(),$this->getFromUserName());
	}


}