<?php

namespace common\models;

use Yii;
use \common\models\base\SchoolImage as BaseSchoolImage;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "school_images".
 */
class SchoolImage extends BaseSchoolImage
{
    public $file;
    
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
               
                    [['file'], 'file'],
                
            ]
        );
    }
}
