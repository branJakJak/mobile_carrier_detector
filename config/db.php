<?php

$dbConf = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];

if (YII_DEBUG) {
	$dbConf = [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=mobile_carrier_detector',
	    'username' => 'root',
	    'password' => '',
	    'charset' => 'utf8',
	];
}

return $dbConf;
