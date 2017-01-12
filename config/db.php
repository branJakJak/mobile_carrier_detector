<?php

$dbConf = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];

if (YII_ENV !== 'dev') {
	$dbConf = [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=site8_mobilecarrier',
	    'username' => 'site8_mobilecar',
	    'password' => 'hitman052529',
	    'charset' => 'utf8',
	];
}

return $dbConf;
