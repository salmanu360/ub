<?php

namespace frontend\modules\student;

/**
 * student module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\student\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
         if(!empty(\Yii::$app->user->identity) && \Yii::$app->user->identity->type == 2){
        if(!\Yii::$app->user->isGuest){
            return true;
          }
      }else{
        \Yii::$app->response->redirect(['site/login']);
      }

        // custom initialization code goes here
    }
  
}
