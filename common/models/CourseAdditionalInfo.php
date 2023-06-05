<?php

namespace common\models;

use Yii;
use \common\models\base\CourseAdditionalInfo as BaseCourseAdditionalInfo;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "course_additional_info".
 */
class CourseAdditionalInfo extends BaseCourseAdditionalInfo
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
