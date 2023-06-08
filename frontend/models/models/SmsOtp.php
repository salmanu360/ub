<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\SmsOtp as BaseSmsOtp;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sms_otp".
 */
class SmsOtp extends BaseSmsOtp
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
