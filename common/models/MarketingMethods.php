<?php

namespace common\models;

use Yii;
use \common\models\base\MarketingMethods as BaseMarketingMethods;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "marketing_methods".
 */
class MarketingMethods extends BaseMarketingMethods
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
