<?php
/**


 * User: 陈晓发
 * Date: 2016/3/22
 * Time: 9:56
 */

namespace app\weixin\api;


class TokenApi extends Api
{
	protected $method = 'GET';
	protected $url = 'https://api.weixin.qq.com/cgi-bin/token';

	public $accessToken = null;
	public $expire		 = null;

	/**
	 * @return AccessTokenResponse
	 */
	public function send()
	{
		$this->setUrlParameter('grant_type','client_credential')
			->setUrlParameter('appid',$this->wxAppModel->wx_app_id)
			->setUrlParameter('secret',$this->wxAppModel->wx_app_sec);
		return parent::send();
	}



	protected function check_result($result)
	{
		if (!array_key_exists('access_token',$result) || !array_key_exists('expires_in',$result))
		{
			$this->errorCode = -1;
			$this->errorString = 'missing access_token or expire ';
			return false;
		}
		$this->accessToken = $result['access_token'];
		$this->expire = $result['expires_in'];
		return true;
	}

}