<?php

namespace common\models;

use Yii;
use \common\models\base\College as BaseCollege;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "college".
 */
class College extends BaseCollege
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
