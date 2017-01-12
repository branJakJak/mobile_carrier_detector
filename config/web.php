<?php


use app\components\RemoteCarrierFinder;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'MobileSearch',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'carrierFinder'=>[
            'class'=>RemoteCarrierFinder::className()
        ],
        'request' => [
            'cookieValidationKey' => 'GH45A2NJ48Ax34eqQ3945G2XP0W4vH95',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => array(
                '/api/create/<groupName:\w+>/<mobileNumber:\d+>' => '/api/create',
                '/group/<groupName:\w+>' => '/group/view',
                '/group/download/<groupName:\w+>' => '/group/download',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],        
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
