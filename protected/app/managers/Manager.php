<?php

namespace app\managers;
use yii\base\Object;

/**


 * User: 陈晓发
 * Date: 2016/1/25
 * Time: 11:00
 */
class Manager extends Object
{
	private static $_instances = [];

	/**
	 * @return static
	 */
	public static function getInstance($config=[])
	{
		$class = static::className();
		if (!array_key_exists($class,self::$_instances))
		{
			self::$_instances[$class] = new static($config);
		}
		return self::$_instances[$class];
	}


}