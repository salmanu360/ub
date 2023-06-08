<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "StateController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class StateController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\State';
}
