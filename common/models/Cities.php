<?php

namespace common\models;

use Yii;
use \common\models\base\Cities as BaseCities;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cities".
 */
class Cities extends BaseCities
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviorsmok
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
