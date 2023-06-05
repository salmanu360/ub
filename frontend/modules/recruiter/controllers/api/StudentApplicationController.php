<?php

namespace frontend\modules\recruiter\controllers\api;

/**
* This is the class for REST controller "StudentApplicationController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class StudentApplicationController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\StudentCollegeApplied';
}
