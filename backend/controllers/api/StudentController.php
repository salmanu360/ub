<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "StudentController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class StudentController extends \yii\rest\ActiveController
{
public $modelClass = 'frontend\models\ForStudents';
}
