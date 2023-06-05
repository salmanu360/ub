<?php

namespace common\models;

use Yii;
use \common\models\base\AppliedCouncilStudent as BaseAppliedCouncilStudent;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "applied_council_student".
 */
class AppliedCouncilStudent extends BaseAppliedCouncilStudent
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
