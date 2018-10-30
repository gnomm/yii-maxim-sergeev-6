<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'sourceLanguage' => 'en',
    'language' => 'en',
    //    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'createTaskEvents'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'PLDxj0-gGBFhlC6MW7raSR1M0EPpamZn',
//            'baseUrl' => ''
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
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
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
        'db' => $db,
        'createTaskEvents' => [
            'class' => \app\components\CreateTaskEventsComponents::class
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@app/messages'
                ],
            ],
        ],
        'urlManager' => [
//            'showScriptName' => false, //отключаем r=routes
//            'enablePrettyUrl' => true, //отключаем index.php
//            'enableStrictParsing' => true,
//            'enablePrettyUrl' => true,
//            'showScriptName' => true,
//            'enableStrictParsing' =>false,
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en', 'ru'],
//            'enableDefaultLanguageUrlCode' => true,
            'rules' => [
//                '/' => 'post/index', //для главной страницы
//                'page/<view:[a-zA-Z0-9-]+>' => 'site/page',
//                '/' => 'site/default/index'

            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}


return $config;
