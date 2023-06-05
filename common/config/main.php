<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'socialShare' => [
            'class' => \ymaker\social\share\configurators\Configurator::class,
            'enableIcons' => true,
               
            'socialNetworks' => [
                'pinterest' => [
                    'class' => \ymaker\social\share\drivers\Pinterest::class,
                ],
                'facebook' => [
                    'class' => \ymaker\social\share\drivers\Facebook::class,
                ],
                'linkedin' => [
                    'class' => \ymaker\social\share\drivers\LinkedIn::class,
                ],

                'twitter' => [
                    'class' => \ymaker\social\share\drivers\Twitter::class,
                ],
                 'WzzsApp' => [
                    'class' => \ymaker\social\share\drivers\WhatsApp::class,
                ],
                 'Gmail' => [
                    'class' => \ymaker\social\share\drivers\Gmail::class,
                ],
               
                //  'googleplus' => [
                //     'class' => \ymaker\social\share\drivers\GooglePlus::class,
                // ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap'        => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
];
