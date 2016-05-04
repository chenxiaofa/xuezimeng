<?php
namespace app\weixin\api;
use yii\base\Object;
use app\models\WxApp;
use yii\httpclient\Client;
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/3/22
 * Time: 9:54
 *
 */
class Api
{


	protected $method = 'GET';
	protected $url = null;
	/** @var WxApp */
	protected $wxAppModel = null;
	protected $urlParams = [];
	protected $bodyParams = [];
	protected $errorCode = 0;
	protected $errorString = 0;
	protected function __construct($wxAppModel)
	{
		$this->wxAppModel = $wxAppModel;
		$this->setUrlParameter('access_token',$wxAppModel->wx_access_token);

		$this->init();
	}

	protected function init()
	{

	}

	public function getErrorString()
	{
		return $this->errorString;
	}

	/**
	 * @param $url
	 * @param $method
	 * @param null $body
	 * @return array
	 */
	protected function request($url,$method,$body = null)
	{
		\Yii::info($url,WEIXIN_CATEGORY.'request weixin url:');
		\Yii::info($method,WEIXIN_CATEGORY.'request weixin method:');
		\Yii::info($body,WEIXIN_CATEGORY.'request weixin body:');
		try
		{
			$response = (new Client())->createRequest()
				->setUrl($url)
				->setMethod($method)
				->addHeaders(['content-type' => 'application/json'])
				->setContent($body)
				->send();

			\Yii::info($response->getContent(),WEIXIN_CATEGORY.'request weixin response:');

			$result = $response->setFormat(Client::FORMAT_JSON)->getData();
		}
		catch(\Exception $e)
		{
			$result = [
				'errcode'=>$e->getCode(),
				'errmsg'=>$e->getMessage()
			];
		}


		\Yii::info(var_export($result,true),WEIXIN_CATEGORY.'request weixin decoded:');

		return $result;

	}

	protected function getFullUrl()
	{
		if (!empty($this->urlParams))
		{
			return implode('',[$this->url,'?',http_build_query($this->urlParams)]);
		}
		return $this->url;
	}


	public function send()
	{
		$url = $this->getFullUrl();
		$body = null;

		if (strtoupper($this->method) === 'POST')
		{
			$body = json_encode($this->bodyParams);
		}

		$result = $this->request($url,$this->method,$body);


		return $this->_check_result($result);

	}


	private function _check_result($result)
	{
		if (!is_array($result))
		{
			$this->errorCode = -1;
			$this->errorString = 'decode weixin response failed';
			return false;
		}

		if (array_key_exists('errcode',$result))
		{
			$this->errorCode = $result['errcode'];
			$this->errorString = $result['errmsg'];
			return false;
		}

		return $this->check_result($result);
	}

	protected function check_result($result)
	{
		return true;
	}




	public function setUrlParameter($k,$v)
	{
		$this->urlParams[$k] = $v;
		return $this;
	}

	public function clearUrlParameters()
	{
		$this->urlParams = [];
		return $this;
	}

	public function setBodyParameter($k,$v)
	{
		$this->bodyParams[$k] = $v;
		return $this;
	}

	/**
	 * @param $wxAppModel
	 * @return static
	 */
	public static function create($wxAppModel)
	{
		return new static ($wxAppModel);
	}


	protected function fetchAccessToken()
	{
		$returns = $this->getFromWeixin('https://api.weixin.qq.com/cgi-bin/token',
			[
				'grant_type'=>'client_credential',
				'appid'=>$this->appModel->wx_app_id,
				'secret'=>$this->appModel->wx_app_sec,
			]
		);
		return [$returns['access_token'],$returns['expires_in']];
	}

	public function toString()
	{
		return sprintf('code:%s,error:%s',$this->errorCode,$this->errorString);
	}


}
