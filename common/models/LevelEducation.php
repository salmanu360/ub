<?php

namespace common\models;

use Yii;
use \common\models\base\LevelEducation as BaseLevelEducation;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "level_education".
 */
class LevelEducation extends BaseLevelEducation
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

    public static function getLevelOfEducation() 
    { 
        return ArrayHelper::map(self ::find()->all(), 'id', 'edu_name');       
    }

    public static function getLevelOfEducationById($id) 
    { 
        //return ArrayHelper::map(self ::find()->all(), 'id', 'edu_name');         
        return ArrayHelper::map(self ::find()->where(['country_id' => $id])->all(), 'id', 'edu_name');         
    }
}
