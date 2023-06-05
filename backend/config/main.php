<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'admin',
    'name' => 'University Bureau',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'site/login',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','simplechat'],
    'modules' => [
        'simplechat' => [
            'class' => 'bubasuma\simplechat\Module',
        ],
    ],
    'components' => [


        // 'MyGlobalClass'=>[
        //     'class'=>'common\components\MyGlobalClass'
        //  ],
        'userAccess'=>[
            'class'=>'common\components\UserAccess'
         ],
        'request' => [
            'csrfParam' => '_csrf-admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
            'identityCookie' => ['name' => '_identity-admin', 'httpOnly' => true],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
           // 'viewPath' => '@frontend/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.universitybureau.com',
                // 'username' => 'noreply@universitybureau.com',
                'username' => 'salman@universitybureau.com',
                'password' => '3ovj))2QQNzw',
                // 'password' => 'Admin.ub@1234',
                'port' => '465',
                'encryption' => 'ssl',
                'streamOptions' => [
                    'ssl' => [
                        'verify_peer' => true,
                        'allow_self_signed' => false
                    ],
                ],
            ],
        ],


        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '../../../frontend/web/', //Access frontend web url
        ],

        'as beforeRequest' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'actions' => ['login', 'error'],
                    'allow' => true,
                ],
                [
    
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],

        /* 'session' => [
            'name' => 'backend-session',
        ],
 */
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'backend-session',
            //'enableAutoLogin' => false,
            //'savePath' => __DIR__ . '/../tmp',
            'timeout' => 3600*20, //session expire
            'useCookies' => true,
        ],

        /* 'user' => [
            'identityClass' => 'common\models\Users',
            'enableAutoLogin' => false,
            'authTimeout' => 3600, // auth expire 
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 4],
            'timeout' => 3600*4, //session expire
            'useCookies' => true,
        ], */
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@app/views'
                ],
            ],
       ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
            'forceCopy' => true,             
        ],  
    ],
    'params' => $params,
];
