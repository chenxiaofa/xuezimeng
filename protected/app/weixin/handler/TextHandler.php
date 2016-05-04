<?php
/**


 * User: 陈晓发
 * Date: 2016/3/18
 * Time: 15:37
 */

namespace app\weixin\handler;


use app\weixin\Request;

class TextHandler extends Handler
{
	protected $content = '';
	public function handle()
	{
		$this->content = $this->request->getContent();
		\Yii::trace($this->content,WEIXIN_CATEGORY.'Message Content');
		if ($this->content == 'me')
		{
			return $this->request->createTextResponse($this->wxUser->nickname);
		}

		return $this->request->createTextResponse(
				"回复 me 查看我的昵称 \n".
				"回复 help 查看帮助"
		);
	}
}