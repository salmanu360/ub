<?php

namespace common\models;

use Yii;
use \common\models\base\MouDetail as BaseMouDetail;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "mou_detail".
 */
class MouDetail extends BaseMouDetail
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
