<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "PagesController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PagesController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Pages';
}
