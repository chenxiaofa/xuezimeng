<?php
/**


 * User: 陈晓发
 * Date: 2016/3/18
 * Time: 19:08
 */

namespace app\weixin;


class XmlArray
{
	private $tag = 'item';
	private $array = array();
	public function __construct($tag)
	{
		$this->tag = $tag;
	}

	public function append($item)
	{
		$this->array[] = $item;
	}

	public function toXml()
	{
		$output = array();
		foreach($this->array as $item)
		{
			$itemXml = [];
			foreach($item as $k=>$v)
			{
				$itemXml[] = "<{$k}><![CDATA[{$v}]]></{$k}>";
			}
			$output[] = "<{$this->tag}>\n".implode("\n",$itemXml)."\n</{$this->tag}>";
		}
		return implode("\n",$output);
	}

	public function getCount()
	{
		return count($this->array);
	}


}