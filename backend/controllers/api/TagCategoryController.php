<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "TagCategoryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class TagCategoryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\TagCategory';
}
