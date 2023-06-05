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
            //'class' => 'yii\web\DbSession',
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
        'smsOtpApiRequest' => [
            'class' => 'frontend\components\SmsOtpApiRequest',
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
                //'search-college/<slug:\w+(-\w+)+>' => 'search-college/detail',
                'notifications/poll' => '/notifications/notifications/poll',
                'notifications/rnr' => '/notifications/notifications/rnr',
                'notifications/read' => '/notifications/notifications/read',
                'notifications/read-all' => '/notifications/notifications/read-all',
                'notifications/delete-all' => '/notifications/notifications/delete-all',
                'notifications/delete' => '/notifications/notifications/delete',
                'notifications/flash' => '/notifications/notifications/flash',
                '<alias:index|best-universities-in-canada|united-states|new-zeeland|best-universities-in-aus|best-universities-in-uk|study-abroad-destinations|canada|uk|aus|eur|usa|new|europe>' => 'site/<alias>',
                
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
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
        ],             
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
        'notifications' => [
            'class' => 'machour\yii2\notifications\NotificationsModule',
            // Point this to your own Notification class
            // See the "Declaring your notifications" section below
            'notificationClass' => 'common\components\Notification',
            // Allow to have notification with same (user_id, key, key_id)
            // Default to FALSE
            'allowDuplicate' => false,
            // Allow custom date formatting in database
            'dbDateFormat' => 'Y-m-d H:i:s',
            // This callable should return your logged in user Id
            'userId' => function () {
                return \Yii::$app->user->id;
            },
        ],
    ],
    'params' => $params,
];