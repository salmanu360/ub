<?php

namespace common\models;

use Yii;
use \common\models\base\Posts as BasePosts;
use yii\helpers\ArrayHelper;
use common\models\TagCategory;
use common\models\BlogCategory;


/**
 * This is the model class for table "posts".
 */
class Posts extends BasePosts
{
   public $blog_tags=[];
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

    public static function optsCategory(){
     // return TagCategory::find()->asArray()->all();

     $data=BlogCategory::find()->select(['id','name'])->asArray()->all();
     
     return $data;

    }

    public static function optsTags(){
        $data=TagCategory::find()->select(['id','tag_name'])->asArray()->all();
       
         return $data;

        
    }
}
