<?php

namespace common\models;

use Yii;
use \common\models\base\Pages as BasePages;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pages".
 */
class Pages extends BasePages
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
