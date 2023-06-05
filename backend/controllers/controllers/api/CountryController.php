<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "CountryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class CountryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Country';
}
