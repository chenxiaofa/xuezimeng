<?php
define('DB_HOST','*');
define('DB_PORT','*');
define('DB_NAME','*');
define('DB_USER','*');
define('DB_PASSWORD','*');
define('DB_TABLE_PREFIX','');
return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME,
	'username' => DB_USER,
	'password' => DB_PASSWORD,
	'charset' => 'utf8',
	'tablePrefix' => DB_TABLE_PREFIX,
]; 
