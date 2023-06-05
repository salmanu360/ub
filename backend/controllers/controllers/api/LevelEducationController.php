<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "LevelEducationController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class LevelEducationController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\LevelEducation';
}
