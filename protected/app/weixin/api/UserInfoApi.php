<?php
/**


 * User: 陈晓发
 * Date: 2016/3/22
 * Time: 16:08
 */

namespace app\weixin\api;



class UserInfoApi extends Api
{

	protected $method = 'GET';
	protected $url    = 'https://api.weixin.qq.com/cgi-bin/user/info';

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


}