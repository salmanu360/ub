<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "BlogCategoryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BlogCategoryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\BlogCategory';
}
