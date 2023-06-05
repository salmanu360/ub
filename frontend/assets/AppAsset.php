<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        // 'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
        'css/bootstrap.min.css',
        'css/style.css',
        'css/dashboard.css',
        'css/custom.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-3.2.1.min.js',
        'js/bootstrap.bundle.min.js',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        'js/custom.js',
        //'js/owl.carousel.min.js',
        //'js/vendor.js',        
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}

?>