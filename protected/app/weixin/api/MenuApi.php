<?php
/**


 * User: 陈晓发
 * Date: 2016/3/22
 * Time: 16:08
 */

namespace app\weixin\api;


use app\models\WxMenu;

class MenuApi extends Api
{
	const TYPE_CLICK = 'click';
	const TYPE_VIEW = 'view';
	const TYPE_SCANCODE_PUSH = 'scancode_push';
	const TYPE_SCANCODE_WAITMSG = 'scancode_waitmsg';
	const TYPE_PIC_SYSPHOTO = 'pic_sysphoto';
	const TYPE_PIC_PHOTO_OR_ALBUM = 'pic_photo_or_album';
	const TYPE_PIC_WEIXIN = 'pic_weixin';
	const TYPE_LOCATION_SELECT = 'location_select';
	const TYPE_MEDIA_ID = 'media_id';
	const TYPE_VIEW_LIMITED = 'view_limited';

	protected $method = 'POST';
	protected $url    = 'https://api.weixin.qq.com/cgi-bin/menu/create';
	private $button = [];

	protected function init()
	{
		parent::init();
		$this->setBodyParameter('button',[]);
		$this->button = &$this->bodyParams['button'];
	}

	public static function createClickButton($name,$key)
	{
		return [
			'type'=>self::TYPE_CLICK,
			'name'=>$name,
			'key'=>$key,
		];
	}

	public static function createViewButton($name,$url)
	{
		return [
			'type'=>self::TYPE_VIEW,
			'name'=>$name,
			'url'=>$url,
		];
	}

	public static function createTakePhotoButton($name,$key)
	{
		return [
			'type'=>self::TYPE_PIC_SYSPHOTO,
			'name'=>$name,
			'key'=>$key,
		];
	}

	public function addButton($button)
	{
		$this->button[] = $button;
		return $this;
	}

	public function addButtonList($name,$buttons)
	{
		$this->button[] = [
			'name'=>$name,
			'sub_button'=>$buttons,
		];
		return $this;
	}

	public static function createButtonByType($type,$name,$param)
	{
		switch($type)
		{
			case WxMenu::TYPE_CLICK:
			default:
				return self::createClickButton($name,$param);
		}
	}

}