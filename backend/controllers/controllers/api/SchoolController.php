<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "SchoolController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SchoolController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\School';
}
