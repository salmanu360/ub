<?php

namespace common\models;

use Yii;
use \common\models\base\StudentCollegeAttended as BaseStudentCollegeAttended;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "student_school_attended".
 */
class StudentCollegeAttended extends BaseStudentCollegeAttended
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
