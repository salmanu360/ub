<?php

namespace common\models;

use Yii;
use \common\models\base\ApplyStudent as BaseApplyStudent;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "apply_student".
 */
class ApplyStudent extends BaseApplyStudent
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
