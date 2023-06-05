<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "MarketingMethodsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MarketingMethodsController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\MarketingMethods';
}
