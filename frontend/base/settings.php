<?php

namespace frontend\base;

use Yii;
use yii\base\BootstrapInterface;
use common\models\Setting;

/*
/* The base class that you use to retrieve the settings from the database
*/

class Settings implements BootstrapInterface {

    private $db;

    public function __construct() {
        $this->db = Yii::$app->db;
    }

    /**
    * Bootstrap method to be called during application bootstrap stage.
    * Loads all the settings into the Yii::$app->params array
    * @param Application $app the application currently running
    */

    public function bootstrap($app) {
        $setting = Setting::find()->one();        
        Yii::$app->params['setting'] = $setting->attributes;
    }
}
?>