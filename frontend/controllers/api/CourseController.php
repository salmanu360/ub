<?php

namespace frontend\controllers\api;

/**
* This is the class for REST controller "CourseController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class CourseController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Course';
}
