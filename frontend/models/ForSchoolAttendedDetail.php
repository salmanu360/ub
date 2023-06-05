<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\ForSchoolAttendedDetail as BaseForSchoolAttendedDetail;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "for_school_attended_detail".
 */
class ForSchoolAttendedDetail extends BaseForSchoolAttendedDetail
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
