<?php

/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 17:16
 */

namespace app\components;

use yii\base\InvalidParamException;

/**
 * Class ParamValidator

 * @package app\components
 */
abstract class ParamValidator extends \yii\base\Model
{
	private $_attributes = [];

	public function attributes(){	return $this->parameterFields();}

	/**
	 * return parameter fields
	 * @return array
	 */
	abstract public function parameterFields();

	public function rules(){return $this->parameterRules();}

	/**
	 * return parameter check rules
	 * @return array
	 */
	abstract public function parameterRules();

	/**
	 * Returns a value indicating whether the model has an attribute with the specified name.
	 * @param string $name the name of the attribute
	 * @return boolean whether the model has an attribute with the specified name.
	 */
	public function hasAttribute($name)
	{
		return isset($this->_attributes[$name]) || in_array($name, $this->attributes());
	}


	/**
	 * Returns the named attribute value.
	 * If this record is the result of a query and the attribute is not loaded,
	 * null will be returned.
	 * @param string $name the attribute name
	 * @return mixed the attribute value. Null if the attribute is not set or does not exist.
	 * @see hasAttribute()
	 */
	public function getAttribute($name)
	{
		return isset($this->_attributes[$name]) ? $this->_attributes[$name] : null;
	}



	/**
	 * Sets the named attribute value.
	 * @param string $name the attribute name
	 * @param mixed $value the attribute value.
	 * @throws InvalidParamException if the named attribute does not exist.
	 * @see hasAttribute()
	 */
	public function setAttribute($name, $value)
	{
		if ($this->hasAttribute($name)) {
			$this->_attributes[$name] = $value;
		} else {
			throw new InvalidParamException(get_class($this) . ' has no attribute named "' . $name . '".');
		}
	}


	/**
	 * PHP getter magic method.
	 * This method is overridden so that attributes and related objects can be accessed like properties.
	 *
	 * @param string $name property name
	 * @return mixed if relation name is wrong
	 * @throws \yii\base\UnknownPropertyException
	 * @see getAttribute()
	 */
	public function __get($name)
	{
		if (isset($this->_attributes[$name]) || array_key_exists($name, $this->_attributes)) {
			return $this->_attributes[$name];
		} elseif ($this->hasAttribute($name)) {
			return null;
		} else {
			throw new \yii\base\UnknownPropertyException();
		}
	}

	/**
	 * PHP setter magic method.
	 * This method is overridden so that AR attributes can be accessed like properties.
	 * @param string $name property name
	 * @param mixed $value property value
	 */
	public function __set($name, $value)
	{
		if ($this->hasAttribute($name)) {
			$this->_attributes[$name] = $value;
		} else {
			parent::__set($name, $value);
		}
	}

	/**
	 * @return ParamValidator
	 * @throws \yii\base\InvalidConfigException
	 * @return static
	 */
	public static function createFromBodyParams()
	{
		return static::create(\Yii::$app->request->getBodyParams());
	}

	public static function createFromGetParams()
	{
		return static::create(\Yii::$app->request->get());
	}

	/**
	 * @param array $data
	 * @return static
	 */
	public static function create($data)
	{
		$model = new static();
		$model->setAttributes($data,false);
		return $model;
	}

	public function getErrorString()
	{
		$str = [];
		foreach($this->getErrors() as $field=>$errors)
		{
			$str[] = $field.':"'.implode('","',$errors).'"';
		}
		return implode(';',$str);
	}

	/**
	 * @throws
	 */
	public function T()
	{
		\app\exceptions\ValidateException::T($this->getErrorString());
	}

}