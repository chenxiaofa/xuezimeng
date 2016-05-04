<?php
/**


 * User: 陈晓发
 * Date: 2016/3/8
 * Time: 18:49
 */

namespace app\weixin;

/**
 * Class WeixinNewsResponse
 * @package app\weixin
 */
class NewsResponse extends Response
{

	protected $responseType = self::MSG_TYPE_NEWS;
	protected  $items = null;

	public function __construct($config)
	{
		$this->items = new XmlArray('item');
		parent::__construct($config);
	}


	protected function getContent()
	{
		return array(
			'ArticleCount'=>$this->items->getCount(),
			'Articles'=>$this->items
		);
	}

	/**
	 * @param $title
	 * @param $description
	 * @param $picUrl
	 * @param $url
	 * @return $this
	 */
	public function append($title,$description,$picUrl,$url)
	{
		$this->items->append(
				array(
						'Title'=>$title,
						'Description'=>$description,
						'PicUrl'=>$picUrl,
						'Url'=>$url
				)
		);
		return $this;
	}






}