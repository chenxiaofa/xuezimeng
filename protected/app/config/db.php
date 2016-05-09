<?php
define('DB_HOST','127.0.0.1');
define('DB_PORT','3306');
define('DB_NAME','xzm');
define('DB_USER','root');
define('DB_PASSWORD','qweasd');
define('DB_TABLE_PREFIX','m_');
return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME,
	'username' => DB_USER,
	'password' => DB_PASSWORD,
	'charset' => 'utf8',
	'tablePrefix' => DB_TABLE_PREFIX,
]; 
