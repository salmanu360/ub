<?php

namespace common\models;

use Yii;
use \common\models\base\Setting as BaseSetting;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "setting".
 */
class Setting extends BaseSetting
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
             //[['logo'], 'file'],
           // [['logo'], 'required', 'on'=> 'create']
                # custom validation rules
            ]
        );
    }
}
