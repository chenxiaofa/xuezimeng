<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/5/23
 * Time: 11:38
 */

namespace app\weixin\api;


class TemplateApi extends Api
{
	protected $method = 'POST';
	protected $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send';

	protected $templateData = [];
	protected $receiver = '';
	protected $templateId = '';
	protected $redirectUrl = '';
	protected function _sendTemplate($templateId,$receiver,$url,$data)
	{
		return $this->setBodyParameter('touser',$receiver)
			->setBodyParameter('template_id',$templateId)
			->setBodyParameter('url',$url)
			->setBodyParameter('data',$data)
			->send();
	}

	public function setTemplateId($templateId)
	{
		$this->templateId = $templateId;
		return $this;
	}
	public function setReceiver($openId)
	{
		$this->receiver = $openId;
		return $this;
	}
	public function addTempldateParam($name,$value,$color)
	{
		$this->templateData[$name] = ['value'=>$value,'color'=>$color];
		return $this;
	}

	public function sendTemplate()
	{
		return $this->_sendTemplate(
			$this->templateId,
			$this->receiver,
			$this->redirectUrl,
			$this->templateData
		);
	}

}