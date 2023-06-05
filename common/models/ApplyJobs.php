<?php

namespace common\models;

use Yii;
use \common\models\base\ApplyJobs as BaseApplyJobs;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "applied_jobs".
 */
class ApplyJobs extends BaseApplyJobs
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
