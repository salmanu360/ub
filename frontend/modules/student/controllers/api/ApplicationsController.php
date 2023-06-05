<?php

namespace frontend\modules\student\controllers\api;

/**
* This is the class for REST controller "ApplicationsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ApplicationsController extends \yii\rest\ActiveController
{
public $modelClass = 'frontend\models\ForStudentApplications';
}
