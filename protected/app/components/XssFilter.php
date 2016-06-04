<?php
/**
 * 珠海魅族科技有限公司
 * Copyright (c) 2012 - 2013 meizu.com ZhuHai Inc. (http://www.meizu.com)
 * User: 陈晓发
 * Date: 2016/6/4
 * Time: 19:07
 */

namespace app\components;


class XssFilter
{
	public $black_list_protocol = array(
		'javascript\s*:',
		'vbscript\s*:', // IE, surprise!
		'wscript\s*:', // IE
		'jscript\s*:', // IE
		'vbs\s*:', // IE
	);

	/**
	 * 从数组中获取指定key的值,并过滤敏感标签属性,如果key不存在,返回默认值
	 * @param $array
	 * @param $key
	 * @param string $default
	 * @return string
	 */
	protected function get_var($array,$key,$default='')
	{
		if (!array_key_exists($key,$array))
		{
			return $default;
		}
		return $array[$key];

	}

	/**
	 * 从$_GET中获取指定key的值,并过滤敏感标签属性
	 * @param $key
	 * @param string $default
	 * @return string
	 */
	public function get($key,$default='')
	{
		return $this->do_filter(stripslashes($this->get_var($_GET,$key,$default)));
	}

	/**
	 * 从$_POST中获取指定key的值,并过滤敏感标签属性
	 * @param $key
	 * @param string $default
	 * @return string
	 */
	public function post($key,$default='')
	{
		return $this->do_filter(stripslashes($this->get_var($_POST,$key,$default)));
	}



	/** @var array 黑名单标签 */
	public $black_list_dom = array(
		'layer',
		'base',
		'basefont',
		'head',
		'html',
		'body',
		'applet',
		/*'object',*/
		'iframe',
		'frame',
		'frameset',
		'script',
		'scriptlet',
		'ilayer',
		/*'embed',*/
		'bgsound',
		'link',
		'meta',
		'style',
		'ievbs' //规则是<!if
	);

	public $black_list_attribute = array(
		'autofocus',
		'on\w*',
//			'style',
		'xmlns',
		'formaction',
		'form',
		'xlink:href',
		'FSCommand',
		'seekSegmentTime'
	);

	public $black_list_css = array(
		'position',
		'display',
		'z-index',
	);

	/**
	 * 过滤无效字符
	 * @param $str
	 * @param bool|TRUE $url_encoded
	 * @return mixed
	 */
	function remove_invisible_characters($str, $url_encoded = TRUE)
	{
		$non_displayables = array();

		// every control character except newline (dec 10)
		// carriage return (dec 13), and horizontal tab (dec 09)

		if ($url_encoded)
		{
			$non_displayables[] = '/%0[0-8bcef]/';	// url encoded 00-08, 11, 12, 14, 15
			$non_displayables[] = '/%1[0-9a-f]/';	// url encoded 16-31
		}

		$non_displayables[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';	// 00-08, 11, 12, 14-31, 127

		do
		{
			$str = preg_replace($non_displayables, '', $str, -1, $count);
		}
		while ($count);

		return $str;
	}

	/**
	 *  对输入html文本做过滤
	 * @param string $content
	 * @return string
	 */
	public function do_filter($content)
	{
		$content = $this->remove_invisible_characters($content);
		$content = $this->do_xss_attr_filter($content);
		$content = $this->do_xss_dom_filter($content);
		return $content;
	}

	/**
	 * 过滤危险dom标签
	 * @param string $content
	 * @return string
	 */
	public function do_xss_dom_filter($content)
	{
		do {
			$count = $temp_count = 0;
			// replace occurrences of illegal attribute strings with quotes (042 and 047 are octal quotes)
			$content = preg_replace('/(<)(\s*\/?\s*)('.implode('|',$this->black_list_dom).')([^>]*)(>)/is', '&lt;$2$3$4&gt;', $content, -1, $temp_count);
			$count += $temp_count;

		}
		while ($count);
		return $content;
	}

	/**
	 * 过滤危险dom属性
	 * @param string $str
	 * @return string
	 */
	protected function do_xss_attr_filter($str)
	{
		$evil_attributes = $this->black_list_attribute;

		//过滤 带引号\双引号 的属性
		do {
			$count = $temp_count = 0;
			// replace occurrences of illegal attribute strings with quotes (042 and 047 are octal quotes)
			$str = preg_replace('/(<[^>]+)(?<!\w)('.implode('|', $evil_attributes).')\s*=\s*(\042|\047)([^\\3]*?)(\\3)/is', '$1', $str, -1, $temp_count);
			$count += $temp_count;

		}
		while ($count);

		//过滤 不带引号 的属性
		do {
			$count = $temp_count = 0;

			// find occurrences of illegal attribute strings without quotes
			$str = preg_replace('/(<[^>]+)(?<!\w)('.implode('|', $evil_attributes).')\s*=\s*([^\s>]*)/is', '$1', $str, -1, $temp_count);
			$count += $temp_count;
		}
		while ($count);

		//过滤不带值的属性
		do {
			$count = $temp_count = 0;

			// find occurrences of illegal attribute strings without quotes
			$str = preg_replace('/(<[^>]+)(?<!\w)('.implode('|', $evil_attributes).')\s*/is', '$1', $str, -1, $temp_count);
			$count += $temp_count;
		}
		while ($count);

		//过滤 危险协议 如 javascript:alert(1);
		do {
			$count = $temp_count = 0;

			// find occurrences of illegal attribute strings without quotes
			$str = preg_replace('/(<[^>]+)(?<!\w)(href|src)\s*=\s*(\042|\047)(\s*)('.implode('|', $this->black_list_protocol).')([^\\3]*?)(\\3)/is', '$1$2=$3#$7', $str, -1, $temp_count);
			$count += $temp_count;
		}
		while ($count);

		//过滤 危险CSS属性
		do {
			$count = $temp_count = 0;

			// find occurrences of illegal attribute strings without quotes
			$str = preg_replace('/(<[^>]+)(?<!\w)(style)\s*(=)\s*(\042|\047)(\s*)(.*)('.implode('|', $this->black_list_css).')(.*)([^\\4]*?)(\\4)/is', '$1$2$3$4$5$6blocked_css$8$9$10', $str, -1, $temp_count);
			$count += $temp_count;
		}
		while ($count);

		return $str;
	}


}