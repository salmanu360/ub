<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "GradingSchemeController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class GradingSchemeController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\GradingScheme';
}
