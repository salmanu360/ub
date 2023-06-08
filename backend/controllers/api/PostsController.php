<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "PostsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PostsController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Posts';
}
