<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "UsersController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UsersController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Users';
}
