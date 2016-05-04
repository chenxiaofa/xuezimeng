<?php
/**


 * User: 陈晓发
 * Date: 2016/1/21
 * Time: 17:10
 */

namespace app\exceptions;


class ValidateException extends Exception
{
	const CODE = 422;
	const NAME = 'Validate Failed';
}