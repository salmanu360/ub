<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "RecruitersController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class RecruitersController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Recruiters';
}
