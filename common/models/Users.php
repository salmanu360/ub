<?php

namespace common\models;

use Yii;
use \common\models\base\Users as BaseUsers;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 */
class Users extends BaseUsers
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
