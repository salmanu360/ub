<?php

namespace common\models;

use Yii;
use \common\models\base\GradingScheme as BaseGradingScheme;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "grading_scheme".
 */
class GradingScheme extends BaseGradingScheme
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

    public static function getGradingScheme() 
    {       
        return ArrayHelper::map(self ::find()->all(), 'id', 'name');         
    }

    public static function getGradingSchemeById($id) 
    {       
        return ArrayHelper::map(self ::find()->where(['edu_id' => $id])->all(), 'id', 'name');         
    }
}
