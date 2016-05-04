<?php
/**


 * User: 陈晓发
 * Date: 2016/1/25
 * Time: 13:38
 */

namespace app\exceptions;


class BusinessLogicException extends Exception
{
	const CODE = 423;
	const NAME = 'Business Logic Failed';
}