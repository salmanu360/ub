<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\ForPaymentHistory as BaseForPaymentHistory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "for_payment_history".
 */
class ForPaymentHistory extends BaseForPaymentHistory
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
