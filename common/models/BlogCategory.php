<?php

namespace common\models;

use Yii;
use \common\models\base\BlogCategory as BaseBlogCategory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog_category".
 */
class BlogCategory extends BaseBlogCategory
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
