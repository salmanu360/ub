<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;
use kartik\mpdf\Pdf;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl()); // you set override the frontend/web with blank space and it will return the baseUrl.

return [
    'id' => 'universitybureau-frontend',
    'name' => 'University Bureau',
    'defaultRoute' => 'site/home',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'frontend\base\settings',
    ],
    'controllerNamespace' => 'frontend\controllers',
    
    'components' => [
       'reCaptcha' => [
               'name' => 'reCaptcha',
               'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
               'siteKey' => '6LfMe2EfAAAAAFPVnVm2fnY_wOL4TmiM0QF9Z5aP',
               'secret' => '6LfMe2EfAAAAAA20OxxeOOKc-i3GCF9o9ZqsCMRj',
         ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
           // 'autoStart' => true,
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
           // 'viewPath' => '@frontend/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.universitybureau.com',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'baseUrl' => $baseUrl,
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
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'recruiter/<action>' => 'recruiter/default/<action>',
                'school/<action>' => 'school/default/<action>',
                'student/<action>' => 'student/default/<action>',
                'blogs/index' => 'blogs/index',
                'blogs/<slug:[a-zA-Z0-9_ -]+>' => 'blogs/view',
                'page/<slug:[a-zA-Z0-9_ -]+>' => 'page/view',                 
                'search-college/index' => 'search-college/index',
                'search-college/<slug>' => 'search-college/detail',
                'college/<slug>' => 'search-college/detail',
                '<alias:index|about|canada>' => 'site/<alias>',
                //'search-college/<slug:\w+(-\w+)+>' => 'search-college/detail',
                
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii2mod\alert\AlertAsset' => [
                'css' => [
                    'dist/sweetalert.css',
                    'themes/twitter/twitter.css',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@frontend/dir',
                'baseUrl' => '@frontend/dir',
                'pathMap' => [
                    '@frontend/views' => '@frontend/dir'
                ],
            ],
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ]        
    ],
    'modules' => [
        'school' => [
            'class' => 'frontend\modules\school\Module',
            'defaultRoute' => 'default/index',
            'layout' => '/home-layout'
        ],
        'recruiter' => [
            'class' => 'frontend\modules\recruiter\Module',
            'defaultRoute' => 'default/register',
            'layout' => '/home-layout'
        ],
        'student' => [
            'class' => 'frontend\modules\student\Module',
            'defaultRoute' => 'default/index',
            'layout' => '/home-layout'
        ],
    ],
    'params' => $params,
];