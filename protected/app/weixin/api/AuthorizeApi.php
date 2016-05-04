<?php
/**


 * User: 陈晓发
 * Date: 2016/3/22
 * Time: 16:08
 */

namespace app\weixin\api;



class AuthorizeApi extends Api
{

	protected $method = 'GET';
	protected $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
	private $authUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize';
	public function getByOpenID($openId)
	{
		return $this->setUrlParameter('openid',$openId)
			->setUrlParameter('lang','zh_CN')
			->send();
	}

	protected function check_result($result)
	{
		return $result;
	}

	public function genAuthUrl($callback)
	{
		return $this->authUrl.'?'.http_build_query(
			[
				'appid'=>$this->wxAppModel->wx_app_id,
				'redirect_uri'=>$callback,
				'response_type'=>'code',
				'scope'=>'snsapi_base'
			]
		).'#wechat_redirect';
	}

	public function getCode()
	{
		$code = \Yii::$app->request->get('code');
		$callback = \Yii::$app->request->absoluteUrl;
		if (is_null($code))
		{
			\Yii::$app->response->redirect($this->genAuthUrl($callback))->send();
		}
		return $code;
	}

	/**
	 * snsapi_base 授权,返回openID
	 */
	public function authWithSnsapiBase()
	{
		$code = $this->getCode();
		$result = $this->clearUrlParameters()
					->setUrlParameter('grant_type','authorization_code')
					->setUrlParameter('code',$code)
					->setUrlParameter('appid',$this->wxAppModel->wx_app_id)
					->setUrlParameter('secret',$this->wxAppModel->wx_app_sec)
					->send();

		if ($result !== false)
		{
			return $result['openid'];
		}
		return false;
	}
	
}