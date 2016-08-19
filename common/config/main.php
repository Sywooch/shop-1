<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.sina.com',
                'username' => 'evil3344@sina.com',
                'password' => 'yibeizi21.',
                'port' => '465',
                'encryption' => 'ssl',//tls/ssl
              ],
        ],
        'redis'=>[
            'class' => 'yii\redis\Connection',

            'hostname' => 'localhost',  //你的redis地址

            'port' => 6379, //端口

            'database' => 0,
        ],
    ],
];
